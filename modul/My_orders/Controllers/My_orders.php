<?php

namespace Modul\My_orders\Controllers;

use App\Controllers\BaseController;
use Modul\Customers\Models\Model_customers;

class My_orders extends BaseController
{
    public function __construct()
    {
        $this->customers = new Model_customers();
    }

    public function index()
    {
        $id = $this->session->get('user_id');

        if (!$id) {
            return redirect()->to('/login');
        }

        $customer = $this->customers->getProfile($id);

        if (!$customer) {
            return redirect()->to('/home');
        }

        $orders = $this->getOrders($customer->id);

        $orderCount = $this->db->table('sales')
            ->where('customer_id', $customer->id)
            ->countAllResults();

        $wishlistCount = $this->db->table('wishlists')
            ->where('customer_id', $customer->id)
            ->countAllResults();

        $data = [
            'menu'          => 'my-orders',
            'submenu'       => '',
            'title'         => 'My Orders',
            'customer'      => $customer,
            'orders'        => $orders,
            'orderCount'    => $orderCount,
            'wishlistCount' => $wishlistCount,
        ];

        return view('Modul\My_orders\Views\viewOrders', $data);
    }

    public function filter()
    {
        $user_id = $this->session->get('user_id');

        if (!$user_id) {
            $respond = [
                'status' => FALSE,
                'notif'  => 'Session telah berakhir, silakan login kembali'
            ];
        } else {
            $customer = $this->customers->getProfile($user_id);

            if (!$customer) {
                $respond = [
                    'status' => FALSE,
                    'notif'  => 'Data customer tidak ditemukan'
                ];
            } else {
                $status = $this->request->getPost('status');
                $period = $this->request->getPost('period');

                $orders = $this->getOrders($customer->id, $status, $period);

                $html = view('Modul\My_orders\Views\viewOrders_list', [
                    'orders' => $orders
                ]);

                $respond = [
                    'status' => TRUE,
                    'html'   => $html,
                    'count'  => count($orders)
                ];
            }
        }

        echo json_encode($respond);
    }

    public function detail()
    {
        $user_id = $this->session->get('user_id');
        $id      = $this->request->getPost('id');

        if (!$user_id) {
            $respond = [
                'status' => FALSE,
                'notif'  => 'Session telah berakhir, silakan login kembali'
            ];
        } else {
            $customer = $this->customers->getProfile($user_id);

            if (!$customer) {
                $respond = [
                    'status' => FALSE,
                    'notif'  => 'Data customer tidak ditemukan'
                ];
            } else {
                $order = $this->db->table('sales a')
                    ->select('
                        a.*,
                        b.full_name,
                        b.phone_number
                    ')
                    ->join('customers b', 'b.id = a.customer_id', 'left')
                    ->where('a.id', $id)
                    ->where('a.customer_id', $customer->id)
                    ->get()
                    ->getRow();

                if (!$order) {
                    $respond = [
                        'status' => FALSE,
                        'notif'  => 'Pesanan tidak ditemukan'
                    ];
                } else {
                    $details = $this->db->table('sales_detail a')
                        ->select('
                            a.*,
                            b.product_name,
                            b.umkm_name,
                            c.image_path
                        ')
                        ->join('products b', 'b.id = a.product_id', 'left')
                        ->join('products_images c', 'c.product_id = b.id AND c.is_primary = 1', 'left')
                        ->where('a.sales_id', $order->id)
                        ->get()
                        ->getResult();

                    $payment = $this->db->table('payment_transactions')
                        ->where('sales_id', $order->id)
                        ->orderBy('id', 'DESC')
                        ->get()
                        ->getRow();

                    $html = view('Modul\My_orders\Views\viewOrders_detail', [
                        'order'   => $order,
                        'details' => $details,
                        'payment' => $payment,
                    ]);

                    $respond = [
                        'status' => TRUE,
                        'html'   => $html
                    ];
                }
            }
        }

        echo json_encode($respond);
    }

    public function cancel()
    {
        $rules = $this->validate([
            'id' => [
                'label'  => 'Pesanan',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak ditemukan',
                ]
            ],
        ]);

        if (!$rules) {
            $errors = [
                'id' => $this->validation->getError('id'),
            ];

            $respond = [
                'status' => FALSE,
                'errors' => $errors
            ];
        } else {
            $user_id = $this->session->get('user_id');
            $id      = $this->request->getPost('id');

            $customer = $this->customers->getProfile($user_id);

            if (!$customer) {
                $respond = [
                    'status' => FALSE,
                    'notif'  => 'Data customer tidak ditemukan'
                ];
            } else {
                $order = $this->db->table('sales')
                    ->where('id', $id)
                    ->where('customer_id', $customer->id)
                    ->get()
                    ->getRow();

                if (!$order) {
                    $respond = [
                        'status' => FALSE,
                        'notif'  => 'Pesanan tidak ditemukan'
                    ];
                } elseif (!in_array($order->status_pesanan, ['pending', 'processing'])) {
                    $respond = [
                        'status' => FALSE,
                        'notif'  => 'Pesanan tidak dapat dibatalkan'
                    ];
                } else {
                    $this->db->table('sales')
                        ->where('id', $id)
                        ->update([
                            'status_pesanan' => 'cancelled',
                        ]);

                    $respond = [
                        'status' => TRUE,
                        'notif'  => 'Pesanan berhasil dibatalkan'
                    ];
                }
            }
        }

        echo json_encode($respond);
    }

    private function getOrders($customer_id, $status = null, $period = null)
    {
        $builder = $this->db->table('sales a')
            ->select('
                a.*,
                COUNT(b.id) as total_item
            ')
            ->join('sales_detail b', 'b.sales_id = a.id', 'left')
            ->where('a.customer_id', $customer_id)
            ->groupBy('a.id')
            ->orderBy('a.id', 'DESC');

        if ($status) {
            $builder->where('a.status_pesanan', $status);
        }

        if ($period) {
            if ($period == 'last-year') {
                $builder->where('a.created_at >=', date('Y-m-d H:i:s', strtotime('-1 year')));
            } elseif ($period == 'last-3-months') {
                $builder->where('a.created_at >=', date('Y-m-d H:i:s', strtotime('-3 months')));
            } elseif ($period == 'last-30-days') {
                $builder->where('a.created_at >=', date('Y-m-d H:i:s', strtotime('-30 days')));
            } elseif ($period == 'last-week') {
                $builder->where('a.created_at >=', date('Y-m-d H:i:s', strtotime('-7 days')));
            }
        }

        $orders = $builder->get()->getResult();

        foreach ($orders as $order) {
            $order->items = $this->db->table('sales_detail a')
                ->select('
                    a.*,
                    b.product_name,
                    c.image_path
                ')
                ->join('products b', 'b.id = a.product_id', 'left')
                ->join('products_images c', 'c.product_id = b.id AND c.is_primary = 1', 'left')
                ->where('a.sales_id', $order->id)
                ->limit(4)
                ->get()
                ->getResult();
        }

        return $orders;
    }
}