<?php

namespace Modul\Products\Controllers;

use App\Controllers\BaseController;
use Hermawan\DataTables\DataTable;
use Modul\Products\Models\Model_products;
use Modul\Products\Models\Model_products_details;
use Modul\Products\Models\Model_products_images;

class Products extends BaseController
{
    protected $product;
    protected $product_details;
    protected $products_images;

    public function __construct()
    {
        $this->product = new Model_products();
        $this->product_details = new Model_products_details();
        $this->products_images = new Model_products_images();
    }

    public function index()
    {
        $id = $this->session->get('user_id');

        if (!$id) {
            return redirect()->to('/login');
        }

        $role = $this->session->get('role');

        if ($role === '2') {
            return redirect()->to('/home');
        }
        
        $categories = $this->db->table('category_products')->where('status', '1')->orderBy('category_name', 'ASC')->get()->getResultArray();

        $data = [
            'menu'       => 'master-data',
            'submenu'    => 'products',
            'title'      => 'Katalog Produk',
            'categories' => $categories
        ];

        return view('Modul\Products\Views\viewProducts', $data);
    }

    public function datatable()
    {
        $builder = $this->db->table('products')
            ->select('
                products.id AS id,
                products.product_name AS product_name,
                products.price AS price,
                products.stock AS stock,
                products.status AS status,
                category_products.category_name AS category_name,
                products_images.image_path AS image_path
            ')
            ->join('category_products', 'category_products.id = products.category_id', 'left')
            ->join('products_images', 'products_images.product_id = products.id AND products_images.is_primary = 1', 'left')
            ->orderBy('products.id', 'DESC');

        return DataTable::of($builder)
            ->addNumbering('no')
            ->setSearchableColumns([
                'LOWER(products.product_name)',
                'LOWER(category_products.category_name)'
            ])
            ->add('image', function ($row) {
                $imgSrc = $row->image_path 
                    ? base_url($row->image_path) 
                    : base_url('assets/images/no-image.png');

                return '<a href="' . $imgSrc . '" data-fancybox="gallery" data-caption="' . $row->product_name . '">
                            <img src="' . $imgSrc . '" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                        </a>';
            })
            ->format('price', function ($value) {
                return 'Rp ' . number_format($value, 0, ',', '.');
            })
            ->add('status', function ($row) {
                return '<div class="form-switch">
                            <input type="checkbox" class="form-check-input" onclick="changeStatus(\'' . $row->id . '\');" id="set_active' . $row->id . '" ' . isChecked($row->status) . '>
                            <label class="form-check-label" for="set_active' . $row->id . '">' . isLabelChecked($row->status) . '</label>
                        </div>';
            })
            ->add('action', function ($row) {
                return '<button type="button" class="btn btn-light btn-sm" title="Edit" onclick="edit(' . $row->id . ')">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-light btn-sm" title="Hapus" onclick="confirmRemove(' . $row->id . ', \'' . htmlspecialchars($row->product_name, ENT_QUOTES) . '\')">
                            <i class="fas fa-trash"></i>
                        </button>';
            })
            ->toJson(true);
    }

    public function setStatus()
    {
        $builder = $this->db->table('products');
        $getData = $builder->where('id', $this->request->getPost('id'))->get()->getRowArray();

        if (!$getData) {
            $response = ['status' => false, 'errors' => 'Data Tidak Ditemukan.'];
        } else {
            $this->product->update($this->request->getPost('id'), ['status' => ($getData['status']) ? "0" : "1"]);
            $response = ['status' => TRUE];
        }

        echo json_encode($response);
    }

    public function save()
    {
        $rules = $this->validate([
            'product_name' => ['label' => 'Nama Produk', 'rules' => 'required', 'errors' => ['required' => '{field} harus diisi']],
            'category_id'  => ['label' => 'Kategori', 'rules' => 'required', 'errors' => ['required' => '{field} harus dipilih']],
            'price'        => ['label' => 'Harga', 'rules' => 'required|numeric', 'errors' => ['required' => '{field} harus diisi', 'numeric' => '{field} harus berupa angka']],
            'stock'        => ['label' => 'Stok', 'rules' => 'required|numeric', 'errors' => ['required' => '{field} harus diisi', 'numeric' => '{field} harus berupa angka']],
        ]);

        if (!$rules) {
            $respond = [
                'status' => FALSE,
                'errors' => [
                    'product_name' => $this->validation->getError('product_name'),
                    'category_id'  => $this->validation->getError('category_id'),
                    'price'        => $this->validation->getError('price'),
                    'stock'        => $this->validation->getError('stock'),
                ]
            ];
        } else {
            $id = $this->request->getPost('id');

            // Memulai Transaksi Database
            $this->db->transStart();

            // 1. Simpan Data Produk Utama
            $dataProduct = [
                'category_id'  => $this->request->getPost('category_id'),
                'product_name' => $this->request->getPost('product_name'),
                'price'        => $this->request->getPost('price'),
                'stock'        => $this->request->getPost('stock'),
                'umkm_name'    => $this->request->getPost('umkm_name'),
                'region'       => $this->request->getPost('region'),
            ];

            if (!$id) {
                $dataProduct['status'] = 1;
                $this->product->insert($dataProduct);
                $product_id = $this->product->getInsertID();
            } else {
                $this->product->update($id, $dataProduct);
                $product_id = $id;
            }

            // 2. Simpan Detail Produk
            $dataDetails = [
                'product_id'  => $product_id,
                'size'        => $this->request->getPost('size'),
                'motif'       => $this->request->getPost('motif'),
                'description' => $this->request->getPost('description'),
                'color'       => $this->request->getPost('color'),
                'weight'      => $this->request->getPost('weight'),
            ];

            // Cek apakah detail sudah ada (Upsert)
            $checkDetail = $this->product_details->where('product_id', $product_id)->first();
            if ($checkDetail) {
                $this->product_details->update($checkDetail['id'], $dataDetails);
            } else {
                $this->product_details->insert($dataDetails);
            }

            // 3. Simpan Gambar Produk (Jika diunggah)
            $imageFile = $this->request->getFile('image');
            if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
                $newName = $imageFile->getRandomName();
                $imageFile->move('uploads/products/', $newName);
                $imagePath = 'uploads/products/' . $newName;

                // Cek gambar lama dan hapus fisiknya jika ada
                $oldImage = $this->products_images->where('product_id', $product_id)->where('is_primary', 1)->first();
                if ($oldImage && file_exists(FCPATH . $oldImage['image_path'])) {
                    unlink(FCPATH . $oldImage['image_path']);
                }

                if ($oldImage) {
                    $this->products_images->update($oldImage['id'], ['image_path' => $imagePath]);
                } else {
                    $this->products_images->insert([
                        'product_id' => $product_id,
                        'image_path' => $imagePath,
                        'is_primary' => 1,
                        'sort'       => 1
                    ]);
                }
            }

            $this->db->transComplete();

            if ($this->db->transStatus() === FALSE) {
                $respond = ['status' => FALSE];
            } else {
                $respond = [
                    'status' => TRUE,
                    'notif'  => $id ? "Produk berhasil diperbaharui" : "Produk berhasil ditambahkan"
                ];
            }
        }
        echo json_encode($respond);
    }

    public function getdata()
    {
        $id = $this->request->getPost("id");
        
        $product = $this->db->table("products")
            ->select('products.*, pd.size, pd.motif, pd.description, pd.color, pd.weight')
            ->join('products_details pd', 'pd.product_id = products.id', 'left')
            ->where("products.id", $id)
            ->get()->getRowArray();

        if ($product) {
            $respond = [
                'status' => true,
                'data'   => $product
            ];
        } else {
            $respond = ['status' => false];
        }

        echo json_encode($respond);
    }

    public function remove()
    {
        $id   = $this->request->getPost('id');
        $name = $this->request->getPost('name');

        try {
            // Hapus gambar fisik sebelum hapus dari DB
            $images = $this->products_images->where('product_id', $id)->findAll();
            foreach ($images as $img) {
                if (file_exists(FCPATH . $img['image_path'])) {
                    unlink(FCPATH . $img['image_path']);
                }
            }

            // Hapus detail dan gambar (bisa otomatis jika database di-set ON DELETE CASCADE)
            $this->products_images->where('product_id', $id)->delete();
            $this->product_details->where('product_id', $id)->delete();
            $this->product->delete($id);

            return $this->response->setJSON(['status' => true, 'name' => $name]);
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return $this->response->setJSON(['status' => false, 'name' => $name]);
        }
    }
}