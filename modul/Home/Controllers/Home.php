<?php

namespace Modul\Home\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $products = $this->db->table('products')
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
            ->where('products.status', '1')
            ->orderBy('products.id', 'DESC')
            ->limit(8)
            ->get()
            ->getResultArray();

        $popularProducts = $this->db->table('products')
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
            ->where('products.status', '1')
            ->orderBy('products.stock', 'DESC')
            ->limit(6)
            ->get()
            ->getResultArray();

        $data = [
            'menu'            => 'home',
            'submenu'         => '',
            'title'           => 'Home',
            'products'        => $products,
            'popularProducts' => $popularProducts,
        ];

        return view('Modul\Home\Views\viewHome', $data);
    }
}