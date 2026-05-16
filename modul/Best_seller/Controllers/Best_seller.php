<?php

namespace Modul\Best_seller\Controllers;

use App\Controllers\BaseController;

class Best_seller extends BaseController
{
    public function index()
    {
        $bestSellerProducts = $this->db->table('products')
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
            ->where('products.stock >', 0)
            ->orderBy('products.stock', 'DESC')
            ->orderBy('products.id', 'DESC')
            ->limit(12)
            ->get()
            ->getResultArray();

        $categories = $this->db->table('category_products')
            ->select('
                category_products.id,
                category_products.category_name,
                COUNT(products.id) AS total_products
            ')
            ->join('products', 'products.category_id = category_products.id AND products.status = 1', 'left')
            ->where('category_products.status', '1')
            ->groupBy('category_products.id')
            ->orderBy('category_products.category_name', 'ASC')
            ->get()
            ->getResultArray();

        $data = [
            'menu'               => 'best-seller',
            'submenu'            => '',
            'title'              => 'Best Seller',
            'bestSellerProducts' => $bestSellerProducts,
            'categories'         => $categories,
        ];

        return view('Modul\Best_seller\Views\viewBest_seller', $data);
    }
}