<?php

namespace Modul\Katalog\Controllers;

use App\Controllers\BaseController;

class Katalog extends BaseController
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
            ->get()
            ->getResultArray();

        $categories = $this->db->table('category_products')
            ->select('
                category_products.id,
                category_products.category_name,
                COUNT(products.id) as total_products
            ')
            ->join('products', 'products.category_id = category_products.id AND products.status = 1', 'left')
            ->where('category_products.status', '1')
            ->groupBy('category_products.id')
            ->orderBy('category_products.category_name', 'ASC')
            ->get()
            ->getResultArray();

        $data = [
            'menu'       => 'katalog',
            'submenu'    => '',
            'title'      => 'Katalog Produk',
            'products'   => $products,
            'categories' => $categories,
        ];

        return view('Modul\Katalog\Views\viewKatalog', $data);
    }
}