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

    public function apiRegister()
    {
        $input       = $this->request->getJSON(true);
        $full_name   = trim($input['full_name']   ?? '');
        $email       = trim($input['email']       ?? '');
        $password    = $input['password']         ?? '';
        $passConfirm = $input['pass_confirm']     ?? '';

        // Validasi manual (karena input JSON, bukan form POST)
        $errors = [];

        if (empty($full_name)) {
            $errors['full_name'] = 'Nama lengkap wajib diisi.';
        }

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Format email tidak valid.';
        }

        // Cek email unik
        if (!empty($email)) {
            $exists = $this->db->table('auth_users')->where('email', $email)->countAllResults();
            if ($exists > 0) {
                $errors['email'] = 'Email sudah digunakan. Coba email lain.';
            }
        }

        if (strlen($password) < 6) {
            $errors['password'] = 'Kata sandi minimal 6 karakter.';
        }

        if ($password !== $passConfirm) {
            $errors['pass_confirm'] = 'Konfirmasi kata sandi tidak cocok.';
        }

        if (!empty($errors)) {
            return $this->response->setStatusCode(400)->setJSON([
                'status'  => false,
                'message' => 'Validasi gagal.',
                'errors'  => $errors,
            ]);
        }

        // Simpan ke database
        $this->db->transStart();

        $this->db->table('auth_users')->insert([
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role'     => 2,
            'status'   => 1,
        ]);
        $userId = $this->db->insertID();

        $this->db->table('customers')->insert([
            'user_id'   => $userId,
            'full_name' => $full_name,
        ]);

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return $this->response->setStatusCode(500)->setJSON([
                'status'  => false,
                'message' => 'Registrasi gagal. Silakan coba lagi.',
            ]);
        }

        return $this->response->setStatusCode(201)->setJSON([
            'status'  => true,
            'message' => 'Registrasi berhasil. Silakan login.',
        ]);
    }
}