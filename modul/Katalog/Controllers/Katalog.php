<?php

namespace Modul\Katalog\Controllers;

use App\Controllers\BaseController;

class Katalog extends BaseController
{
    public function index()
    {
        $products = $this->getProducts();

        $categories = $this->db->table('category_products')
            ->select('
                category_products.id,
                category_products.category_name,
                COUNT(products.id) as total_products
            ')
            ->join('products', 'products.category_id = category_products.id AND products.status = 1', 'left')
            ->where('category_products.status', '1')
            ->groupBy('category_products.id, category_products.category_name')
            ->orderBy('category_products.category_name', 'ASC')
            ->get()
            ->getResultArray();

        $umkms = $this->db->table('products')
            ->select('umkm_name, COUNT(id) as total_products')
            ->where('status', '1')
            ->where('umkm_name !=', '')
            ->groupBy('umkm_name')
            ->orderBy('umkm_name', 'ASC')
            ->get()
            ->getResultArray();

        $sizes = $this->db->table('products_details a')
            ->select('a.size, COUNT(b.id) as total_products')
            ->join('products b', 'b.id = a.product_id AND b.status = 1', 'left')
            ->where('a.size !=', '')
            ->groupBy('a.size')
            ->orderBy('a.size', 'ASC')
            ->get()
            ->getResultArray();

        $colors = $this->db->table('products_details a')
            ->select('a.color, COUNT(b.id) as total_products')
            ->join('products b', 'b.id = a.product_id AND b.status = 1', 'left')
            ->where('a.color !=', '')
            ->groupBy('a.color')
            ->orderBy('a.color', 'ASC')
            ->get()
            ->getResultArray();

        $data = [
            'menu'       => 'katalog',
            'submenu'    => '',
            'title'      => 'Katalog Produk',
            'products'   => $products,
            'categories' => $categories,
            'umkms'      => $umkms,
            'sizes'      => $sizes,
            'colors'     => $colors,
        ];

        return view('Modul\Katalog\Views\viewKatalog', $data);
    }

    public function filter()
    {
        $products = $this->getProducts([
            'category_id' => $this->request->getPost('category_id'),
            'umkm'        => $this->request->getPost('umkm'),
            'size'        => $this->request->getPost('size'),
            'color'       => $this->request->getPost('color'),
            'min_price'   => $this->request->getPost('min_price'),
            'max_price'   => $this->request->getPost('max_price'),
            'sort'        => $this->request->getPost('sort'),
            'keyword'     => $this->request->getPost('keyword'),
        ]);

        $html = view('Modul\Katalog\Views\viewKatalog_list', [
            'products' => $products,
        ]);

        $respond = [
            'status' => true,
            'html'   => $html,
            'count'  => count($products),
        ];

        echo json_encode($respond);
    }

    public function detail($encryptedId)
    {
        $id = function_exists('decrypt_url') ? decrypt_url($encryptedId) : $encryptedId;

        if (empty($id)) {
            return redirect()->to(base_url('katalog'));
        }

        $product = $this->db->table('products')
            ->select('
                products.id,
                products.category_id,
                products.product_name,
                products.price,
                products.stock,
                products.umkm_name,
                products.region,
                products.status,
                category_products.category_name,
                products_details.size,
                products_details.motif,
                products_details.description,
                products_details.color,
                products_details.weight
            ')
            ->join('category_products', 'category_products.id = products.category_id', 'left')
            ->join('products_details', 'products_details.product_id = products.id', 'left')
            ->where('products.id', $id)
            ->where('products.status', '1')
            ->get()
            ->getRowArray();

        if (!$product) {
            return redirect()->to(base_url('katalog'));
        }

        $images = $this->db->table('products_images')
            ->select('id, product_id, image_path, is_primary')
            ->where('product_id', $id)
            ->orderBy('is_primary', 'DESC')
            ->orderBy('id', 'ASC')
            ->get()
            ->getResultArray();

        $relatedProducts = $this->db->table('products')
            ->select('
                products.id,
                products.product_name,
                products.price,
                products.stock,
                products.umkm_name,
                products.region,
                category_products.category_name,
                products_details.size,
                products_details.motif,
                products_details.color,
                products_images.image_path
            ')
            ->join('category_products', 'category_products.id = products.category_id', 'left')
            ->join('products_details', 'products_details.product_id = products.id', 'left')
            ->join('products_images', 'products_images.product_id = products.id AND products_images.is_primary = 1', 'left')
            ->where('products.status', '1')
            ->where('products.id !=', $id)
            ->where('products.category_id', $product['category_id'])
            ->orderBy('products.id', 'DESC')
            ->limit(8)
            ->get()
            ->getResultArray();

        $data = [
            'menu'            => 'katalog',
            'submenu'         => '',
            'title'           => $product['product_name'],
            'product'         => $product,
            'images'          => $images,
            'relatedProducts' => $relatedProducts,
        ];

        return view('Modul\Katalog\Views\viewDetail', $data);
    }

    private function getProducts($filter = [])
    {
        $builder = $this->db->table('products')
            ->select('
                products.id,
                products.product_name,
                products.price,
                products.stock,
                products.umkm_name,
                products.region,
                products.status,
                category_products.category_name,
                products_details.size,
                products_details.motif,
                products_details.description,
                products_details.color,
                products_details.weight,
                products_images.image_path
            ')
            ->join('category_products', 'category_products.id = products.category_id', 'left')
            ->join('products_details', 'products_details.product_id = products.id', 'left')
            ->join('products_images', 'products_images.product_id = products.id AND products_images.is_primary = 1', 'left')
            ->where('products.status', '1');

        if (!empty($filter['category_id'])) {
            $categoryId = explode(',', $filter['category_id']);
            $builder->whereIn('products.category_id', $categoryId);
        }

        if (!empty($filter['umkm'])) {
            $umkm = explode(',', $filter['umkm']);
            $builder->whereIn('products.umkm_name', $umkm);
        }

        if (!empty($filter['size'])) {
            $size = explode(',', $filter['size']);
            $builder->whereIn('products_details.size', $size);
        }

        if (!empty($filter['color'])) {
            $color = explode(',', $filter['color']);
            $builder->whereIn('products_details.color', $color);
        }

        if (!empty($filter['min_price'])) {
            $builder->where('products.price >=', $filter['min_price']);
        }

        if (!empty($filter['max_price'])) {
            $builder->where('products.price <=', $filter['max_price']);
        }

        if (!empty($filter['keyword'])) {
            $builder->groupStart()
                ->like('products.product_name', $filter['keyword'])
                ->orLike('products.umkm_name', $filter['keyword'])
                ->orLike('products.region', $filter['keyword'])
                ->orLike('category_products.category_name', $filter['keyword'])
                ->orLike('products_details.motif', $filter['keyword'])
                ->orLike('products_details.color', $filter['keyword'])
                ->groupEnd();
        }

        if (!empty($filter['sort'])) {
            if ($filter['sort'] == 'terbaru') {
                $builder->orderBy('products.id', 'DESC');
            } elseif ($filter['sort'] == 'harga-terendah') {
                $builder->orderBy('products.price', 'ASC');
            } elseif ($filter['sort'] == 'harga-tertinggi') {
                $builder->orderBy('products.price', 'DESC');
            } elseif ($filter['sort'] == 'stok-terbanyak') {
                $builder->orderBy('products.stock', 'DESC');
            } else {
                $builder->orderBy('products.id', 'DESC');
            }
        } else {
            $builder->orderBy('products.id', 'DESC');
        }

        return $builder->get()->getResultArray();
    }
}