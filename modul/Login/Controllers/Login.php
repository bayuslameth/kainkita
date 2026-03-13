<?php

namespace Modul\Login\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        // Cek apakah user sudah login
        $user_id = $this->session->get('user_id');
        $role    = $this->session->get('role');

        if ($user_id) {
            // Arahkan ke halaman sesuai role kalau sudah login
            if ($role == 1) {
                return redirect()->to(base_url('admin')); // Sesuaikan route admin kamu
            } else {
                return redirect()->to(base_url('home')); // Sesuaikan route customer kamu
            }
        } else {
            $data = [
                'Title' => 'KainKita | Masuk Akun',
            ];
            return view('Modul\Login\Views\viewLogin', $data);
        }
    }

    public function doLogin()
    {
        $rules = $this->validate([
            'email'  => [
                'label'  => 'Email',
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required'    => '{field} nggak boleh kosong ya!',
                    'valid_email' => 'Format {field} kayaknya kurang pas deh.'
                ]
            ],
            'password'  => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required'    => '{field} nggak boleh kosong!'
                ]
            ]
        ]);

        if (!$rules) {
            $errors = [
                'email'    => $this->validation->getError('email'),
                'password' => $this->validation->getError('password')
            ];

            $respond = [
                'status_form' => FALSE,
                'errors'      => $errors,
            ];
        } else {
            $email    = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            // Sesuaikan dengan tabel auth_users di database kamu
            $user = $this->db->table("auth_users")
                             ->select('id, role, password, status')
                             ->where('email', $email)
                             ->get()
                             ->getRow();

            // Cek apakah user ada dan password cocok
            if ($user && password_verify($password, $user->password)) {
                
                // Cek status aktif (1 = aktif)
                if ($user->status == 1) {
                    
                    // Set Session
                    $ses_data = [
                        'user_id'   => $user->id,
                        'role'      => $user->role,
                        'logged_in' => TRUE
                    ];
                    $this->session->set($ses_data);

                    // Tentukan menu/redirect berdasarkan role (1: Admin, 2: Customer)
                    $redirect_menu = ($user->role == 1) ? 'admin' : 'home';

                    $respond = [
                        'status'  => TRUE,
                        'menu'    => $redirect_menu,
                        'message' => 'Berhasil masuk!'
                    ];
                } else {
                    $respond = [
                        'status'  => FALSE,
                        'message' => 'Akun kamu sedang tidak aktif nih.'
                    ];
                }
            } else {
                $respond = [
                    'status'  => FALSE,
                    'message' => 'Email atau kata sandi salah. Cek lagi ya!'
                ];
            }
        }
        
        return $this->response->setJSON($respond);
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('login'));
    }
}