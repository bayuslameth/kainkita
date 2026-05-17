<?php

namespace Modul\Wishlists\Controllers;

use App\Controllers\BaseController;
use Modul\Wishlists\Models\Model_wishlists;
use Modul\Customers\Models\Model_customers;

class Wishlists extends BaseController
{
    public function __construct()
    {
        $this->wishlist = new Model_wishlists();
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

        $items = $this->getWishlistItems($customer->id);

        $orderCount = $this->db->table('sales')
            ->where('customer_id', $customer->id)
            ->countAllResults();

        $wishlistCount = $this->db->table('wishlists')
            ->where('customer_id', $customer->id)
            ->countAllResults();

        $data = [
            'menu'          => 'wishlist',
            'submenu'       => '',
            'title'         => 'Wishlist',
            'customer'      => $customer,
            'items'         => $items,
            'orderCount'    => $orderCount,
            'wishlistCount' => $wishlistCount,
        ];

        return view('Modul\Wishlists\Views\viewWishlist', $data);
    }

    private function customerId()
    {
        $customer_id = $this->session->get('customer_id');

        if ($customer_id) {
            return $customer_id;
        }

        $user_id = $this->session->get('user_id');

        if (!$user_id) {
            return null;
        }

        $customer = $this->db->table('customers')
            ->where('user_id', $user_id)
            ->get()
            ->getRow();

        if ($customer) {
            $this->session->set('customer_id', $customer->id);
            return $customer->id;
        }

        return null;
    }

    public function toggle()
    {
        $customerId = $this->customerId();

        if (!$customerId) {
            $respond = [
                'status'  => FALSE,
                'code'    => 'login_required',
                'message' => 'Silakan login terlebih dahulu untuk menyimpan produk ke wishlist.'
            ];
        } else {
            $productId = $this->request->getPost('product_id');

            if (!$productId) {
                $respond = [
                    'status'  => FALSE,
                    'message' => 'Produk tidak valid.'
                ];
            } else {
                $product = $this->db->table('products')
                    ->where('id', $productId)
                    ->where('status', '1')
                    ->get()
                    ->getRowArray();

                if (!$product) {
                    $respond = [
                        'status'  => FALSE,
                        'message' => 'Produk tidak ditemukan atau tidak aktif.'
                    ];
                } else {
                    $existing = $this->wishlist
                        ->where('customer_id', $customerId)
                        ->where('product_id', $productId)
                        ->first();

                    if ($existing) {
                        $this->wishlist->delete($existing['id']);

                        $respond = [
                            'status'         => TRUE,
                            'action'         => 'removed',
                            'message'        => 'Produk dihapus dari wishlist.',
                            'wishlist_count' => $this->wishlistCount($customerId),
                        ];
                    } else {
                        $this->db->table('wishlists')->insert([
                            'customer_id' => $customerId,
                            'product_id'  => $productId,
                            'created_at'  => date('Y-m-d H:i:s'),
                        ]);

                        $respond = [
                            'status'         => TRUE,
                            'action'         => 'added',
                            'message'        => 'Produk berhasil ditambahkan ke wishlist.',
                            'wishlist_count' => $this->wishlistCount($customerId),
                        ];
                    }
                }
            }
        }

        echo json_encode($respond);
    }

    public function getList()
    {
        $customerId = $this->customerId();

        if (!$customerId) {
            $respond = [
                'status'  => FALSE,
                'code'    => 'login_required',
                'message' => 'Silakan login terlebih dahulu.'
            ];
        } else {
            $sort = $this->request->getPost('sort');

            $items = $this->getWishlistItems($customerId, $sort);

            $html = view('Modul\Wishlists\Views\viewWishlist_list', [
                'items' => $items
            ]);

            $respond = [
                'status' => TRUE,
                'html'   => $html,
                'count'  => count($items),
            ];
        }

        echo json_encode($respond);
    }

    public function remove()
    {
        $customerId = $this->customerId();

        if (!$customerId) {
            $respond = [
                'status' => FALSE,
                'code'   => 'login_required',
                'message' => 'Silakan login terlebih dahulu.'
            ];
        } else {
            $id = $this->request->getPost('id');

            if (!$id) {
                $respond = [
                    'status'  => FALSE,
                    'message' => 'Data tidak valid.'
                ];
            } else {
                $wishlist = $this->db->table('wishlists')
                    ->where('id', $id)
                    ->where('customer_id', $customerId)
                    ->get()
                    ->getRow();

                if (!$wishlist) {
                    $respond = [
                        'status'  => FALSE,
                        'message' => 'Wishlist tidak ditemukan.'
                    ];
                } else {
                    $this->wishlist
                        ->where('customer_id', $customerId)
                        ->where('id', $id)
                        ->delete();

                    $respond = [
                        'status'         => TRUE,
                        'message'        => 'Wishlist berhasil dihapus.',
                        'wishlist_count' => $this->wishlistCount($customerId),
                    ];
                }
            }
        }

        echo json_encode($respond);
    }

    public function removeSelected()
    {
        $customerId = $this->customerId();

        if (!$customerId) {
            $respond = [
                'status'  => FALSE,
                'message' => 'Silakan login terlebih dahulu.'
            ];
        } else {
            $ids = $this->request->getPost('ids');

            if (!$ids) {
                $respond = [
                    'status'  => FALSE,
                    'message' => 'Pilih minimal satu produk wishlist.'
                ];
            } else {
                $ids = explode(',', $ids);

                $this->db->table('wishlists')
                    ->where('customer_id', $customerId)
                    ->whereIn('id', $ids)
                    ->delete();

                $respond = [
                    'status'         => TRUE,
                    'message'        => 'Wishlist terpilih berhasil dihapus.',
                    'wishlist_count' => $this->wishlistCount($customerId),
                ];
            }
        }

        echo json_encode($respond);
    }

    public function addToCart()
    {
        $customerId = $this->customerId();

        if (!$customerId) {
            $respond = [
                'status'  => FALSE,
                'message' => 'Silakan login terlebih dahulu.'
            ];
        } else {
            $productId = $this->request->getPost('product_id');

            if (!$productId) {
                $respond = [
                    'status'  => FALSE,
                    'message' => 'Produk tidak valid.'
                ];
            } else {
                $product = $this->db->table('products')
                    ->where('id', $productId)
                    ->where('status', 1)
                    ->get()
                    ->getRow();

                if (!$product) {
                    $respond = [
                        'status'  => FALSE,
                        'message' => 'Produk tidak ditemukan atau tidak aktif.'
                    ];
                } elseif ($product->stock <= 0) {
                    $respond = [
                        'status'  => FALSE,
                        'message' => 'Stok produk kosong.'
                    ];
                } else {
                    $cart = $this->db->table('carts')
                        ->where('customer_id', $customerId)
                        ->where('status', 'active')
                        ->get()
                        ->getRow();

                    if (!$cart) {
                        $this->db->table('carts')->insert([
                            'customer_id' => $customerId,
                            'status'      => 'active',
                            'created_at'  => date('Y-m-d H:i:s'),
                            'updated_at'  => date('Y-m-d H:i:s'),
                        ]);

                        $cartId = $this->db->insertID();
                    } else {
                        $cartId = $cart->id;
                    }

                    $cartDetail = $this->db->table('carts_details')
                        ->where('cart_id', $cartId)
                        ->where('product_id', $productId)
                        ->get()
                        ->getRow();

                    if ($cartDetail) {
                        $qty = $cartDetail->qty + 1;

                        if ($qty > $product->stock) {
                            $respond = [
                                'status'  => FALSE,
                                'message' => 'Jumlah produk di keranjang melebihi stok.'
                            ];
                        } else {
                            $this->db->table('carts_details')
                                ->where('id', $cartDetail->id)
                                ->update([
                                    'qty'        => $qty,
                                    'price'      => $product->price,
                                    'updated_at' => date('Y-m-d H:i:s'),
                                ]);

                            $respond = [
                                'status'  => TRUE,
                                'message' => 'Jumlah produk di keranjang berhasil diperbarui.'
                            ];
                        }
                    } else {
                        $this->db->table('carts_details')->insert([
                            'cart_id'    => $cartId,
                            'product_id' => $productId,
                            'qty'        => 1,
                            'price'      => $product->price,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]);

                        $respond = [
                            'status'  => TRUE,
                            'message' => 'Produk berhasil ditambahkan ke keranjang.'
                        ];
                    }
                }
            }
        }

        echo json_encode($respond);
    }

    private function getWishlistItems($customerId, $sort = null)
    {
        $reviewSubquery = $this->db->table('products_reviews')
            ->select('
                product_id,
                COUNT(id) as total_review,
                COALESCE(AVG(rating), 0) as rating
            ')
            ->groupBy('product_id')
            ->getCompiledSelect();

        $builder = $this->db->table('wishlists a')
            ->select('
                a.id,
                a.product_id,
                a.created_at,
                b.product_name,
                b.price,
                b.stock,
                b.umkm_name,
                b.region,
                b.status,
                c.image_path,
                COALESCE(d.total_review, 0) as total_review,
                COALESCE(d.rating, 0) as rating
            ')
            ->join('products b', 'b.id = a.product_id', 'left')
            ->join('products_images c', 'c.product_id = b.id AND c.is_primary = 1', 'left')
            ->join('(' . $reviewSubquery . ') d', 'd.product_id = b.id', 'left')
            ->where('a.customer_id', $customerId);

        if ($sort == 'price-ascend') {
            $builder->orderBy('b.price', 'ASC');
        } elseif ($sort == 'price-descend') {
            $builder->orderBy('b.price', 'DESC');
        } elseif ($sort == 'rating') {
            $builder->orderBy('d.rating', 'DESC');
        } else {
            $builder->orderBy('a.id', 'DESC');
        }

        return $builder->get()->getResult();
    }

    private function wishlistCount($customerId)
    {
        return $this->db->table('wishlists')
            ->where('customer_id', $customerId)
            ->countAllResults();
    }
}