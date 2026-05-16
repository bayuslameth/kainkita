<?php

namespace Modul\Wishlists\Controllers;

use App\Controllers\BaseController;
use Modul\Wishlists\Models\Model_wishlists;

class Wishlists extends BaseController
{
    protected $wishlist;

    public function __construct()
    {
        $this->wishlist = new Model_wishlists();
    }

    private function customerId()
    {
        return $this->session->get('customer_id');
    }

    public function toggle()
    {
        $customerId = $this->customerId();

        if (!$customerId) {
            return $this->response->setJSON([
                'status'  => false,
                'code'    => 'login_required',
                'message' => 'Silakan login terlebih dahulu untuk menyimpan produk ke wishlist.'
            ]);
        }

        $productId = $this->request->getPost('product_id');

        if (!$productId) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Produk tidak valid.'
            ]);
        }

        $product = $this->db->table('products')
            ->where('id', $productId)
            ->where('status', '1')
            ->get()
            ->getRowArray();

        if (!$product) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Produk tidak ditemukan atau tidak aktif.'
            ]);
        }

        $existing = $this->wishlist
            ->where('customer_id', $customerId)
            ->where('product_id', $productId)
            ->first();

        if ($existing) {
            $this->wishlist->delete($existing['id']);

            return $this->response->setJSON([
                'status'         => true,
                'action'         => 'removed',
                'message'        => 'Produk dihapus dari wishlist.',
                'wishlist_count' => $this->wishlistCount($customerId),
            ]);
        }

        $this->wishlist->insert([
            'customer_id' => $customerId,
            'product_id'  => $productId,
            'created_at'  => date('Y-m-d H:i:s'),
        ]);

        return $this->response->setJSON([
            'status'         => true,
            'action'         => 'added',
            'message'        => 'Produk berhasil ditambahkan ke wishlist.',
            'wishlist_count' => $this->wishlistCount($customerId),
        ]);
    }

    public function list()
    {
        $customerId = $this->customerId();

        if (!$customerId) {
            return $this->response->setJSON([
                'status'  => false,
                'code'    => 'login_required',
                'message' => 'Silakan login terlebih dahulu.'
            ]);
        }

        $items = $this->db->table('wishlists w')
            ->select('
                w.id,
                w.product_id,
                products.product_name,
                products.price,
                products_images.image_path
            ')
            ->join('products', 'products.id = w.product_id', 'left')
            ->join('products_images', 'products_images.product_id = products.id AND products_images.is_primary = 1', 'left')
            ->where('w.customer_id', $customerId)
            ->orderBy('w.id', 'DESC')
            ->get()
            ->getResultArray();

        return $this->response->setJSON([
            'status' => true,
            'items'  => $items,
            'count'  => count($items),
        ]);
    }

    public function remove()
    {
        $customerId = $this->customerId();

        if (!$customerId) {
            return $this->response->setJSON([
                'status' => false,
                'code'   => 'login_required',
            ]);
        }

        $id = $this->request->getPost('id');

        if (!$id) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Data tidak valid.'
            ]);
        }

        $this->wishlist
            ->where('customer_id', $customerId)
            ->where('id', $id)
            ->delete();

        return $this->response->setJSON([
            'status'         => true,
            'message'        => 'Wishlist berhasil dihapus.',
            'wishlist_count' => $this->wishlistCount($customerId),
        ]);
    }

    private function wishlistCount($customerId)
    {
        return $this->wishlist
            ->where('customer_id', $customerId)
            ->countAllResults();
    }
}