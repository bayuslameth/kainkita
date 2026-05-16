<?php

namespace Modul\Carts\Controllers;

use App\Controllers\BaseController;
use Modul\Carts\Models\Model_carts;
use Modul\Carts\Models\Model_carts_details;

class Carts extends BaseController
{
    protected $cart;
    protected $cartDetail;

    public function __construct()
    {
        $this->cart       = new Model_carts();
        $this->cartDetail = new Model_carts_details();
    }

    private function customerId()
    {
        return $this->session->get('customer_id');
    }

    public function add()
    {
        $customerId = $this->customerId();

        if (!$customerId) {
            return $this->response->setJSON([
                'status'  => false,
                'code'    => 'login_required',
                'message' => 'Silakan login terlebih dahulu untuk menambahkan produk ke keranjang.'
            ]);
        }

        $productId = $this->request->getPost('product_id');
        $qty       = $this->request->getPost('qty') ?: 1;

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

        if ((int) $product['stock'] <= 0) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Stok produk sedang kosong.'
            ]);
        }

        $this->db->transStart();

        $cart = $this->cart
            ->where('customer_id', $customerId)
            ->where('status', 'active')
            ->first();

        if (!$cart) {
            $this->cart->insert([
                'customer_id' => $customerId,
                'status'      => 'active',
            ]);

            $cartId = $this->cart->getInsertID();
        } else {
            $cartId = $cart['id'];
        }

        $cartDetail = $this->cartDetail
            ->where('cart_id', $cartId)
            ->where('product_id', $productId)
            ->first();

        if ($cartDetail) {
            $newQty = (int) $cartDetail['qty'] + (int) $qty;

            $this->cartDetail->update($cartDetail['id'], [
                'qty'   => $newQty,
                'price' => $product['price'],
            ]);
        } else {
            $this->cartDetail->insert([
                'cart_id'    => $cartId,
                'product_id' => $productId,
                'qty'        => $qty,
                'price'      => $product['price'],
            ]);
        }

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Gagal menambahkan produk ke keranjang.'
            ]);
        }

        return $this->response->setJSON([
            'status'     => true,
            'message'    => 'Produk berhasil ditambahkan ke keranjang.',
            'cart_count' => $this->cartCount($customerId),
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

        $cart = $this->cart
            ->where('customer_id', $customerId)
            ->where('status', 'active')
            ->first();

        if (!$cart) {
            return $this->response->setJSON([
                'status' => true,
                'items'  => [],
                'total'  => 0,
                'count'  => 0,
            ]);
        }

        $items = $this->db->table('carts_details cd')
            ->select('
                cd.id,
                cd.cart_id,
                cd.product_id,
                cd.qty,
                cd.price,
                products.product_name,
                products_images.image_path
            ')
            ->join('products', 'products.id = cd.product_id', 'left')
            ->join('products_images', 'products_images.product_id = products.id AND products_images.is_primary = 1', 'left')
            ->where('cd.cart_id', $cart['id'])
            ->get()
            ->getResultArray();

        $total = 0;
        $count = 0;

        foreach ($items as $item) {
            $total += ((float) $item['price'] * (int) $item['qty']);
            $count += (int) $item['qty'];
        }

        return $this->response->setJSON([
            'status' => true,
            'items'  => $items,
            'total'  => $total,
            'count'  => $count,
        ]);
    }

    public function updateQty()
    {
        $customerId = $this->customerId();

        if (!$customerId) {
            return $this->response->setJSON([
                'status' => false,
                'code'   => 'login_required',
            ]);
        }

        $id  = $this->request->getPost('id');
        $qty = (int) $this->request->getPost('qty');

        if (!$id || $qty < 1) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Jumlah produk tidak valid.'
            ]);
        }

        $this->cartDetail->update($id, [
            'qty' => $qty,
        ]);

        return $this->response->setJSON([
            'status'  => true,
            'message' => 'Jumlah produk berhasil diperbarui.'
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

        $this->cartDetail->delete($id);

        return $this->response->setJSON([
            'status'  => true,
            'message' => 'Produk berhasil dihapus dari keranjang.'
        ]);
    }

    private function cartCount($customerId)
    {
        $cart = $this->cart
            ->where('customer_id', $customerId)
            ->where('status', 'active')
            ->first();

        if (!$cart) {
            return 0;
        }

        $row = $this->db->table('carts_details')
            ->selectSum('qty')
            ->where('cart_id', $cart['id'])
            ->get()
            ->getRowArray();

        return (int) ($row['qty'] ?? 0);
    }
}