<?php

namespace Modul\Profile\Controllers;

use App\Controllers\BaseController;
use Modul\Customers\Models\Model_customers;

class Profile extends BaseController
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

        $role = $this->session->get('role');

        if ($role === '1') {
            return redirect()->to('/admin');
        }

        $customer = $this->customers->getProfile($id);

        $orderCount = 0;
        $wishlistCount = 0;

        if ($customer) {
            $orderCount = $this->db->table('sales')
                ->where('customer_id', $customer->id)
                ->countAllResults();

            $wishlistCount = $this->db->table('wishlists')
                ->where('customer_id', $customer->id)
                ->countAllResults();
        }

        $data = [
            'menu'          => 'profile',
            'submenu'       => '',
            'title'         => 'My Profile',
            'customer'      => $customer,
            'orderCount'    => $orderCount,
            'wishlistCount' => $wishlistCount,
            'provinces'     => $this->db->table('provinces')->orderBy('province_name', 'ASC')->get()->getResult(),
            'cities'        => $this->db->table('cities')->orderBy('city_name', 'ASC')->get()->getResult(),
            'subdistricts'  => $this->db->table('subdistricts')->orderBy('subdistrict_name', 'ASC')->get()->getResult(),
        ];

        return view('Modul\Profile\Views\viewProfile', $data);
    }

    public function update()
    {
        $rules = $this->validate([
            'full_name' => [
                'label'  => 'Nama lengkap',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required'    => '{field} harus diisi',
                    'valid_email' => '{field} tidak valid',
                ]
            ],
            'phone_number' => [
                'label'  => 'Nomor telepon',
                'rules'  => 'permit_empty|max_length[15]',
                'errors' => [
                    'max_length' => '{field} maksimal 15 karakter',
                ]
            ],
            'postal_code' => [
                'label'  => 'Kode pos',
                'rules'  => 'permit_empty|max_length[10]',
                'errors' => [
                    'max_length' => '{field} maksimal 10 karakter',
                ]
            ],
        ]);

        if (!$rules) {
            $errors = [
                'full_name'    => $this->validation->getError('full_name'),
                'email'        => $this->validation->getError('email'),
                'phone_number' => $this->validation->getError('phone_number'),
                'postal_code'  => $this->validation->getError('postal_code'),
            ];

            $respond = [
                'status' => FALSE,
                'errors' => $errors
            ];
        } else {
            $user_id        = $this->session->get('user_id');
            $full_name      = $this->request->getPost('full_name');
            $email          = $this->request->getPost('email');
            $phone_number   = $this->request->getPost('phone_number');
            $address        = $this->request->getPost('address');
            $postal_code    = $this->request->getPost('postal_code');
            $province_id    = $this->request->getPost('province_id');
            $city_id        = $this->request->getPost('city_id');
            $subdistrict_id = $this->request->getPost('subdistrict_id');

            $checkEmail = $this->db->table('auth_users')
                ->where('email', $email)
                ->where('id !=', $user_id)
                ->get()
                ->getRow();

            if ($checkEmail) {
                $respond = [
                    'status' => FALSE,
                    'errors' => [
                        'email' => 'Email sudah digunakan oleh akun lain'
                    ]
                ];
            } else {
                $this->db->transStart();

                $this->db->table('auth_users')
                    ->where('id', $user_id)
                    ->update([
                        'name'  => $full_name,
                        'email' => $email,
                    ]);

                $customer = $this->db->table('customers')
                    ->where('user_id', $user_id)
                    ->get()
                    ->getRow();

                $data = [
                    'user_id'        => $user_id,
                    'full_name'      => $full_name,
                    'phone_number'   => $phone_number,
                    'address'        => $address,
                    'postal_code'    => $postal_code,
                    'province_id'    => $province_id ?: NULL,
                    'city_id'        => $city_id ?: NULL,
                    'subdistrict_id' => $subdistrict_id ?: NULL,
                ];

                if ($customer) {
                    $this->customers->update($customer->id, $data);
                } else {
                    $this->customers->insert($data);
                }

                $this->db->transComplete();

                if ($this->db->transStatus() === FALSE) {
                    $respond = [
                        'status' => FALSE,
                        'notif'  => 'Profil gagal diperbaharui'
                    ];
                } else {
                    $this->session->set([
                        'name'  => $full_name,
                        'email' => $email,
                    ]);

                    $respond = [
                        'status' => TRUE,
                        'notif'  => 'Profil berhasil diperbaharui'
                    ];
                }
            }
        }

        echo json_encode($respond);
    }

    public function changePassword()
    {
        $rules = $this->validate([
            'current_password' => [
                'label'  => 'Password lama',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'new_password' => [
                'label'  => 'Password baru',
                'rules'  => 'required|min_length[6]',
                'errors' => [
                    'required'   => '{field} harus diisi',
                    'min_length' => '{field} minimal 6 karakter',
                ]
            ],
            'confirm_password' => [
                'label'  => 'Konfirmasi password',
                'rules'  => 'required|matches[new_password]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'matches'  => '{field} tidak sama dengan password baru',
                ]
            ],
        ]);

        if (!$rules) {
            $errors = [
                'current_password' => $this->validation->getError('current_password'),
                'new_password'     => $this->validation->getError('new_password'),
                'confirm_password' => $this->validation->getError('confirm_password'),
            ];

            $respond = [
                'status' => FALSE,
                'errors' => $errors
            ];
        } else {
            $user_id          = $this->session->get('user_id');
            $current_password = $this->request->getPost('current_password');
            $new_password     = $this->request->getPost('new_password');

            $user = $this->db->table('auth_users')
                ->where('id', $user_id)
                ->get()
                ->getRow();

            if (!$user) {
                $respond = [
                    'status' => FALSE,
                    'notif'  => 'User tidak ditemukan'
                ];
            } else {
                $passwordValid = FALSE;

                if (password_verify($current_password, $user->password)) {
                    $passwordValid = TRUE;
                }

                if (md5($current_password) === $user->password) {
                    $passwordValid = TRUE;
                }

                if (!$passwordValid) {
                    $respond = [
                        'status' => FALSE,
                        'errors' => [
                            'current_password' => 'Password lama tidak sesuai'
                        ]
                    ];
                } else {
                    $this->db->table('auth_users')
                        ->where('id', $user_id)
                        ->update([
                            'password' => password_hash($new_password, PASSWORD_DEFAULT),
                        ]);

                    $respond = [
                        'status' => TRUE,
                        'notif'  => 'Password berhasil diperbaharui'
                    ];
                }
            }
        }

        echo json_encode($respond);
    }

    public function getdata()
    {
        $user_id = $this->session->get('user_id');
        $data = $this->customers->getProfile($user_id);

        if ($data) {
            $respond = [
                'status' => TRUE,
                'data'   => $data
            ];
        } else {
            $respond = [
                'status' => FALSE
            ];
        }

        echo json_encode($respond);
    }
}