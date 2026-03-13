<?php

namespace Modul\Product_categories\Controllers;

use App\Controllers\BaseController;
use Hermawan\DataTables\DataTable;
use Modul\Product_categories\Models\Model_product_categories;

class Product_categories extends BaseController
{
    public function __construct()
    {
        $this->categories = new Model_product_categories();
    }

    public function index()
    {
        $data = [
            'menu'         => 'master-data',
            'submenu'      => 'product-categories',
            'title'        => 'Kategori Produk',
        ];

        return view('Modul\Product_categories\Views\viewCategories', $data);
    }

    public function datatable()
    {
        $builder = $this->db->table('category_products')->orderBy('id', 'DESC');

        return DataTable::of($builder)
            ->addNumbering('no')
            ->setSearchableColumns(['LOWER(name)'])
            ->add('action', function ($row) {
                return '<button type="button" class="btn btn-light btn-sm" title="Edit" onclick="edit(' . $row->id . ')">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-light btn-sm" title="Hapus" onclick="confirmRemove(' . $row->id . ', \'' . $row->name . '\')">
                            <i class="fas fa-trash"></i>
                        </button>';
            })
            ->add('status', function ($row) {
                return '<div class="form-switch">
                            <input type="checkbox" class="form-check-input" onclick="changeStatus(\'' . $row->id . '\');" id="set_active' . $row->id . '" ' . isChecked($row->status) . '>
                            <label class="form-check-label" for="set_active' . $row->id . '">' . isLabelChecked($row->status) . '</label>
                        </div>';
            })
            ->toJson(true);
    }

    public function setStatus()
    {
        $user_id = $this->session->get('user_id');

        $builder = $this->db->table('category_products');

        $getData = $builder->where('id', $this->request->getPost('id'))->get()->getRowArray();

        if (!$getData) {
            $response = [
                'status' => false,
                'errors' => 'Data Tidak Ditemukan.'
            ];
        } else {
            $this->categories->update($this->request->getPost('id'), ['status' => ($getData['status']) ? "0" : "1"]);

            $response = [
                'status'   => TRUE,
            ];
        }

        echo json_encode($response);
    }

    public function save()
    {
        $rules = $this->validate([
            'name' => [
                'label'  => 'Nama kategori',
                'rules'  => 'required',
                'errors' => [
                    'required'   => '{field} harus diisi',
                ]
            ]
        ]);

        if (!$rules) {
            $errors = [
                'name' => $this->validation->getError('name'),
            ];

            $respond = [
                'status' => FALSE,
                'errors' => $errors
            ];
        } else {
            $user_id = $this->session->get('user_id');
            $id      = $this->request->getPost('id');
            $name    = $this->request->getPost('name');

            $data = [
                'id'   => $id,
                'name' => $name,
            ];

            if (!$id) {
                $data['status']   = 1;
            }

            if ($this->categories->save($data)) {
                if ($id) {
                    $notif = "Kategori berhasil diperbaharui";
                } else {
                    $notif = "Kategori berhasil ditambahkan";
                }

                $respond = [
                    'status' => TRUE,
                    'notif'  => $notif
                ];
            } else {
                $respond = [
                    'status' => FALSE
                ];
            }
        }
        echo json_encode($respond);
    }

    public function getdata()
    {
        $id = $this->request->getPost("id");
        $data = $this->db->table("category_products")->where("id", $id)->get()->getRow();

        if ($data) {
            $respond = [
                'status'    => true,
                'data'      => $data
            ];
        } else {
            $respond = [
                'status'    => false
            ];
        }

        echo json_encode($respond);
    }

    public function remove()
    {
        $user_id = $this->session->get('user_id');
        $id      = $this->request->getPost('id');
        $name    = $this->request->getPost('name');

        try {
            $this->categories->delete($id);

            return $this->response->setJSON(['status' => true, 'name' => $name]);
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            $errorMessage = $e->getMessage();

            if (strpos($errorMessage, 'foreign key constraint') !== false) {
                return $this->response->setJSON(['status' => false, 'name' => $name]);
            } else {
                return $this->response->setJSON(['status' => false, 'name' => $name]);
            }
        }
    }
}
