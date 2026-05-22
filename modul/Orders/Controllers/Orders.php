<?php

namespace Modul\Orders\Controllers;

use App\Controllers\BaseController;

class Orders extends BaseController
{
    private function customerId()
    {
        return $this->session->get('customer_id');
    }

    private function userId()
    {
        return $this->session->get('user_id');
    }

    private function checkLogin()
    {
        if (!$this->customerId()) {
            return false;
        }

        return true;
    }

    public function detail()
    {
        if (!$this->checkLogin()) {
            return redirect()->to(base_url('login'))->with('error', 'Silakan login terlebih dahulu untuk melanjutkan checkout.');
        }

        $customerId = $this->customerId();
        $source     = $this->session->get('checkout_source') ?: 'cart';

        $customer = $this->db->table('customers')
            ->where('id', $customerId)
            ->get()
            ->getRowArray();

        if (!$customer) {
            return redirect()->to(base_url('login'))->with('error', 'Data customer tidak ditemukan.');
        }

        $items = $this->getCheckoutItems($customerId, $source);

        if (empty($items)) {
            return redirect()->to(base_url('katalog'))->with('error', 'Produk checkout belum tersedia.');
        }

        $subtotal = 0;

        foreach ($items as $item) {
            $subtotal += ((float) $item['price'] * (int) $item['qty']);
        }

        $shippingCost = 15000;
        $grandTotal   = $subtotal + $shippingCost;

        $data = [
            'menu'         => 'orders',
            'submenu'      => '',
            'title'        => 'Checkout',
            'customer'     => $customer,
            'items'        => $items,
            'subtotal'     => $subtotal,
            'shippingCost' => $shippingCost,
            'grandTotal'   => $grandTotal,
            'source'       => $source,
        ];

        return view('Modul\Orders\Views\viewDetail', $data);
    }

    public function buyNow()
    {
        if (!$this->checkLogin()) {
            $respond = [
                'status'  => false,
                'code'    => 'login_required',
                'message' => 'Silakan login terlebih dahulu untuk membeli produk.',
            ];

            echo json_encode($respond);
            return;
        }

        $productId = $this->request->getPost('product_id');
        $qty       = (int) ($this->request->getPost('qty') ?: 1);

        if (empty($productId) || $qty < 1) {
            $respond = [
                'status'  => false,
                'message' => 'Produk atau jumlah pembelian tidak valid.',
            ];

            echo json_encode($respond);
            return;
        }

        $product = $this->db->table('products')
            ->select('
                products.id,
                products.product_name,
                products.price,
                products.stock,
                products.status,
                products.umkm_name,
                products.region,
                products_images.image_path
            ')
            ->join('products_images', 'products_images.product_id = products.id AND products_images.is_primary = 1', 'left')
            ->where('products.id', $productId)
            ->where('products.status', '1')
            ->get()
            ->getRowArray();

        if (!$product) {
            $respond = [
                'status'  => false,
                'message' => 'Produk tidak ditemukan atau tidak aktif.',
            ];

            echo json_encode($respond);
            return;
        }

        if ((int) $product['stock'] < $qty) {
            $respond = [
                'status'  => false,
                'message' => 'Stok produk tidak mencukupi.',
            ];

            echo json_encode($respond);
            return;
        }

        $this->session->set([
            'checkout_source' => 'buy_now',
            'buy_now_item'    => [
                'product_id'   => $product['id'],
                'product_name' => $product['product_name'],
                'price'        => $product['price'],
                'qty'          => $qty,
                'stock'        => $product['stock'],
                'umkm_name'    => $product['umkm_name'],
                'region'       => $product['region'],
                'image_path'   => $product['image_path'],
            ],
        ]);

        $respond = [
            'status'       => true,
            'message'      => 'Produk siap untuk checkout.',
            'redirect_url' => base_url('orders/detail'),
        ];

        echo json_encode($respond);
    }

    public function store()
    {
        if (!$this->checkLogin()) {
            $respond = [
                'status'  => false,
                'code'    => 'login_required',
                'message' => 'Silakan login terlebih dahulu.',
            ];

            echo json_encode($respond);
            return;
        }

        $customerId = $this->customerId();
        $source     = $this->session->get('checkout_source') ?: 'cart';

        $rules = $this->validate([
            'full_name'      => ['label' => 'Nama Lengkap', 'rules' => 'required'],
            'phone_number'   => ['label' => 'Nomor HP', 'rules' => 'required'],
            'address'        => ['label' => 'Alamat Pengiriman', 'rules' => 'required'],
            'payment_method' => ['label' => 'Metode Pembayaran', 'rules' => 'required'],
            'kurir'          => ['label' => 'Kurir', 'rules' => 'required'],
        ]);

        if (!$rules) {
            $respond = [
                'status'  => false,
                'message' => 'Validasi gagal.',
                'errors'  => $this->validator->getErrors(),
            ];

            echo json_encode($respond);
            return;
        }

        $items = $this->getCheckoutItems($customerId, $source);

        if (empty($items)) {
            $respond = [
                'status'  => false,
                'message' => 'Produk checkout tidak ditemukan.',
            ];

            echo json_encode($respond);
            return;
        }

        $subtotal = 0;

        foreach ($items as $item) {
            $subtotal += ((float) $item['price'] * (int) $item['qty']);
        }

        $shippingCost = 15000;
        $grandTotal   = $subtotal + $shippingCost;
        $invoice      = $this->generateInvoice();

        $fullName      = $this->request->getPost('full_name');
        $phoneNumber   = $this->request->getPost('phone_number');
        $address       = $this->request->getPost('address');
        $postalCode    = $this->request->getPost('postal_code');
        $paymentMethod = $this->request->getPost('payment_method');
        $kurir         = $this->request->getPost('kurir');
        $catatan       = $this->request->getPost('catatan');

        $alamatPengiriman = trim($fullName . "\n" .
            $phoneNumber . "\n" .
            $address . "\n" .
            (!empty($postalCode) ? 'Kode Pos: ' . $postalCode : '')
        );

        $this->db->transStart();

        $this->db->table('customers')
            ->where('id', $customerId)
            ->update([
                'full_name'    => $fullName,
                'phone_number' => $phoneNumber,
                'address'      => $address,
                'postal_code'  => $postalCode,
                'updated_at'   => date('Y-m-d H:i:s'),
            ]);

        foreach ($items as $item) {
            $product = $this->db->table('products')
                ->where('id', $item['product_id'])
                ->get()
                ->getRowArray();

            if (!$product || (int) $product['stock'] < (int) $item['qty']) {
                $this->db->transRollback();

                $respond = [
                    'status'  => false,
                    'message' => 'Stok produk "' . ($item['product_name'] ?? 'produk') . '" tidak mencukupi.',
                ];

                echo json_encode($respond);
                return;
            }
        }

        $this->db->table('sales')->insert([
            'customer_id'        => $customerId,
            'invoice_number'     => $invoice,
            'total_price'        => $subtotal,
            'shipping_cost'      => $shippingCost,
            'grand_total'        => $grandTotal,
            'payment_method'     => $paymentMethod,
            'status_pembayaran'  => $paymentMethod == 'cod' ? 'pending' : 'pending',
            'status_pesanan'     => 'pending',
            'resi_pengiriman'    => null,
            'kurir'              => $kurir,
            'alamat_pengiriman'  => $alamatPengiriman,
            'catatan'            => $catatan,
            'paid_at'            => null,
            'shipped_at'         => null,
            'delivered_at'       => null,
            'created_at'         => date('Y-m-d H:i:s'),
            'updated_at'         => date('Y-m-d H:i:s'),
        ]);

        $salesId = $this->db->insertID();

        foreach ($items as $item) {
            $qty      = (int) $item['qty'];
            $price    = (float) $item['price'];
            $subtotalItem = $qty * $price;

            $this->db->table('sales_detail')->insert([
                'sales_id'     => $salesId,
                'product_id'   => $item['product_id'],
                'product_name' => $item['product_name'],
                'qty'          => $qty,
                'price'        => $price,
                'subtotal'     => $subtotalItem,
                'created_at'   => date('Y-m-d H:i:s'),
            ]);

            $this->db->table('products')
                ->where('id', $item['product_id'])
                ->set('stock', 'stock - ' . $qty, false)
                ->update();
        }

        if ($source == 'cart') {
            $cart = $this->db->table('carts')
                ->where('customer_id', $customerId)
                ->where('status', 'active')
                ->get()
                ->getRowArray();

            if ($cart) {
                $this->db->table('carts_details')
                    ->where('cart_id', $cart['id'])
                    ->delete();
            }
        }

        if ($source == 'buy_now') {
            $this->session->remove('buy_now_item');
        }

        $this->session->remove('checkout_source');

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            $respond = [
                'status'  => false,
                'message' => 'Order gagal disimpan.',
            ];

            echo json_encode($respond);
            return;
        }

        $respond = [
            'status'       => true,
            'message'      => 'Order berhasil dibuat.',
            'redirect_url' => base_url('orders/success/' . $invoice),
        ];

        echo json_encode($respond);
    }

    public function success($invoice)
    {
        if (!$this->checkLogin()) {
            return redirect()->to(base_url('login'));
        }

        $customerId = $this->customerId();

        $order = $this->db->table('sales')
            ->where('invoice_number', $invoice)
            ->where('customer_id', $customerId)
            ->get()
            ->getRowArray();

        if (!$order) {
            return redirect()->to(base_url('katalog'));
        }

        $items = $this->db->table('sales_detail sd')
            ->select('
                sd.id,
                sd.sales_id,
                sd.product_id,
                sd.product_name,
                sd.qty,
                sd.price,
                sd.subtotal,
                products_images.image_path
            ')
            ->join('products_images', 'products_images.product_id = sd.product_id AND products_images.is_primary = 1', 'left')
            ->where('sd.sales_id', $order['id'])
            ->get()
            ->getResultArray();

        $data = [
            'menu'    => 'orders',
            'submenu' => '',
            'title'   => 'Order Berhasil',
            'order'   => $order,
            'items'   => $items,
        ];

        return view('Modul\Orders\Views\viewSuccess', $data);
    }

    private function getCheckoutItems($customerId, $source = 'cart')
    {
        if ($source == 'buy_now') {
            $item = $this->session->get('buy_now_item');

            if (!$item) {
                return [];
            }

            return [$item];
        }

        $cart = $this->db->table('carts')
            ->where('customer_id', $customerId)
            ->where('status', 'active')
            ->get()
            ->getRowArray();

        if (!$cart) {
            return [];
        }

        return $this->db->table('carts_details cd')
            ->select('
                cd.id,
                cd.cart_id,
                cd.product_id,
                cd.qty,
                cd.price,
                products.product_name,
                products.stock,
                products.umkm_name,
                products.region,
                products_images.image_path
            ')
            ->join('products', 'products.id = cd.product_id', 'left')
            ->join('products_images', 'products_images.product_id = products.id AND products_images.is_primary = 1', 'left')
            ->where('cd.cart_id', $cart['id'])
            ->get()
            ->getResultArray();
    }

    private function generateInvoice()
    {
        $prefix = 'INV-' . date('Ymd') . '-';

        $last = $this->db->table('sales')
            ->select('invoice_number')
            ->like('invoice_number', $prefix, 'after')
            ->orderBy('id', 'DESC')
            ->get()
            ->getRowArray();

        if (!$last) {
            return $prefix . '0001';
        }

        $lastNumber = (int) substr($last['invoice_number'], -4);
        $newNumber  = $lastNumber + 1;

        return $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }
}