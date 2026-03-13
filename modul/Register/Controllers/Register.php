<?php

namespace Modul\Register\Controllers;

use App\Controllers\BaseController;

class Register extends BaseController
{
    public function index()
    {
        // Cek apakah user sudah login, kalau udah tendang aja ke halamannya
        $user_id = $this->session->get('user_id');
        $role    = $this->session->get('role');

        if ($user_id) {
            if ($role == 1) {
                return redirect()->to(base_url('admin'));
            } else {
                return redirect()->to(base_url('home'));
            }
        } else {
            $data = [
                'Title' => 'KainKita | Daftar Akun',
            ];
            // Ubah bagian ini arahkan ke file View Register kamu
            return view('Modul\Register\Views\viewRegister', $data); 
        }
    }

    public function save()
    {
        // 1. Atur Validasi (Nama, Email, Password, Konfirmasi Password)
        $rules = $this->validate([
            'full_name' => [
                'label'  => 'Nama Lengkap',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Tulis nama kamu dulu ya!'
                ]
            ],
            'email'  => [
                'label'  => 'Email',
                'rules'  => 'required|valid_email|is_unique[auth_users.email]', // Cek email unik
                'errors' => [
                    'required'    => '{field} nggak boleh kosong ya!',
                    'valid_email' => 'Format {field} kayaknya kurang pas deh.',
                    'is_unique'   => 'Yah, email ini udah pernah dipakai. Coba email lain.'
                ]
            ],
            'password'  => [
                'label'  => 'Password',
                'rules'  => 'required|min_length[6]', // Minimal 6 karakter
                'errors' => [
                    'required'   => 'Kata sandi nggak boleh kosong!',
                    'min_length' => 'Kata sandinya minimal 6 karakter biar aman.'
                ]
            ],
            'pass_confirm' => [
                'label'  => 'Konfirmasi Password',
                'rules'  => 'matches[password]',
                'errors' => [
                    'matches' => 'Kata sandinya beda nih, coba samain lagi.'
                ]
            ]
        ]);

        // 2. Cek kalau validasi gagal
        if (!$rules) {
            $errors = [
                'full_name'    => $this->validation->getError('full_name'),
                'email'        => $this->validation->getError('email'),
                'password'     => $this->validation->getError('password'),
                'pass_confirm' => $this->validation->getError('pass_confirm'),
            ];

            $respond = [
                'status_form' => FALSE,
                'errors'      => $errors,
            ];
        } else {
            // 3. Kalau lolos validasi, ambil data
            $full_name = $this->request->getPost('full_name');
            $email     = $this->request->getPost('email');
            $password  = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            // Kita mulai transaksi database biar kalau error satu, gagal semua (aman)
            $this->db->transStart();

            // Simpan ke tabel auth_users dulu (Role 2 = Customer)
            $data_auth = [
                'email'      => $email,
                'password'   => $password,
                'role'       => 2, 
                'status'     => 1, // Langsung aktif
            ];
            $this->db->table('auth_users')->insert($data_auth);
            
            // Ambil ID user yang barusan di-insert
            $user_id = $this->db->insertID();

            // Simpan nama ke tabel customers pakai ID yang baru didapet
            $data_customer = [
                'user_id'   => $user_id,
                'full_name' => $full_name,
            ];
            $this->db->table('customers')->insert($data_customer);

            // Selesaikan transaksi
            $this->db->transComplete();

            // 4. Cek hasil transaksi database
            if ($this->db->transStatus() === FALSE) {
                // Transaksi Gagal
                $respond = [
                    'status'  => FALSE,
                    'message' => 'Waduh, gagal bikin akun nih. Coba lagi nanti ya!'
                ];
            } else {
                // Transaksi Berhasil! Langsung kita loginkan aja biar nggak usah login ulang.
                $ses_data = [
                    'user_id'   => $user_id,
                    'role'      => 2,
                    'logged_in' => TRUE
                ];
                $this->session->set($ses_data);

                $respond = [
                    'status'  => TRUE,
                    'menu'    => 'home', // Lempar ke halaman depan
                    'message' => 'Yey! Akun berhasil dibuat.'
                ];
            }
        }
        
        return $this->response->setJSON($respond);
    }
}