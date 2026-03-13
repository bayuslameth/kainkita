<?php

namespace Modul\Login\Controllers;

use App\Controllers\BaseController;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;

class Login extends BaseController
{

    public function index()
    {
        $user_id = $this->session->get('user_id');
        $role    = $this->session->get('role');

        if ($user_id) {
            if ($role == 1) {
                return redirect()->to(base_url('dashboard'));
            } else {
                return redirect()->to(base_url('home'));
            }
        } else {
            $data = ['Title' => 'KainKita | Masuk Akun'];
            return view('Modul\Login\Views\viewLogin', $data);
        }
    }

    public function doLogin()
    {
        $rules = $this->validate([
            'email'    => ['label' => 'Email',    'rules' => 'required|valid_email'],
            'password' => ['label' => 'Password', 'rules' => 'required'],
        ]);

        if (!$rules) {
            return $this->response->setJSON([
                'status_form' => false,
                'errors'      => [
                    'email'    => $this->validation->getError('email'),
                    'password' => $this->validation->getError('password'),
                ],
            ]);
        }

        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->db->table('auth_users')
                         ->select('id, role, password, status')
                         ->where('email', $email)
                         ->get()->getRow();

        if ($user && password_verify($password, $user->password)) {
            if ($user->status == 1) {
                $this->session->set([
                    'user_id'   => $user->id,
                    'role'      => $user->role,
                    'logged_in' => true,
                ]);
                $menu = ($user->role == 1) ? 'dashboard' : 'home';
                return $this->response->setJSON(['status' => true, 'menu' => $menu]);
            }
            return $this->response->setJSON(['status' => false, 'message' => 'Akun tidak aktif.']);
        }

        return $this->response->setJSON(['status' => false, 'message' => 'Email atau kata sandi salah.']);
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('login'));
    }

    public function apiLogin()
    {
        // Ambil input JSON
        $input    = $this->request->getJSON(true);
        $email    = $input['email']    ?? '';
        $password = $input['password'] ?? '';

        // Validasi sederhana
        if (empty($email) || empty($password)) {
            return $this->response->setStatusCode(400)->setJSON([
                'status'  => false,
                'message' => 'Email dan password wajib diisi.',
            ]);
        }

        // Cari user
        $user = $this->db->table('auth_users')
                         ->select('id, email, role, password, status')
                         ->where('email', $email)
                         ->get()->getRow();

        if (!$user || !password_verify($password, $user->password)) {
            return $this->response->setStatusCode(401)->setJSON([
                'status'  => false,
                'message' => 'Email atau kata sandi salah.',
            ]);
        }

        if ($user->status != 1) {
            return $this->response->setStatusCode(403)->setJSON([
                'status'  => false,
                'message' => 'Akun tidak aktif.',
            ]);
        }

        $tokens = $this->generateTokens($user->id, $user->role);

        $this->db->table('auth_users')
                ->where('id', $user->id)
                ->update(['refresh_token' => $tokens['refresh_token']]);

        // ← TAMBAHKAN INI: set session juga supaya halaman web bisa diakses
        $this->session->set([
            'user_id'   => $user->id,
            'role'      => $user->role,
            'logged_in' => true,
        ]);

        return $this->response->setStatusCode(200)->setJSON([
            'status'  => true,
            'message' => 'Login berhasil.',
            'data'    => $tokens,
        ]);
    }

    public function apiRefresh()
    {
        $input         = $this->request->getJSON(true);
        $refreshToken  = $input['refresh_token'] ?? '';

        if (empty($refreshToken)) {
            return $this->response->setStatusCode(400)->setJSON([
                'status'  => false,
                'message' => 'Refresh token wajib diisi.',
            ]);
        }

        try {
            $secret = $_ENV['JWT_SECRET'];
            $decoded = JWT::decode($refreshToken, new Key($secret, 'HS256'));
        } catch (ExpiredException $e) {
            return $this->response->setStatusCode(401)->setJSON([
                'status'  => false,
                'message' => 'Refresh token sudah kadaluarsa. Silakan login ulang.',
            ]);
        } catch (\Exception $e) {
            return $this->response->setStatusCode(401)->setJSON([
                'status'  => false,
                'message' => 'Refresh token tidak valid.',
            ]);
        }

        if (($decoded->type ?? '') !== 'refresh') {
            return $this->response->setStatusCode(401)->setJSON([
                'status'  => false,
                'message' => 'Token bukan refresh token.',
            ]);
        }

        $user = $this->db->table('auth_users')
                         ->where('id', $decoded->sub)
                         ->where('refresh_token', $refreshToken)
                         ->get()->getRow();

        if (!$user) {
            return $this->response->setStatusCode(401)->setJSON([
                'status'  => false,
                'message' => 'Refresh token tidak dikenali atau sudah diinvalidasi.',
            ]);
        }

        $tokens = $this->generateTokens($user->id, $user->role);

        $this->db->table('auth_users')
                 ->where('id', $user->id)
                 ->update(['refresh_token' => $tokens['refresh_token']]);

        return $this->response->setStatusCode(200)->setJSON([
            'status'  => true,
            'message' => 'Token berhasil diperbarui.',
            'data'    => $tokens,
        ]);
    }

    public function apiLogout()
    {
        $input        = $this->request->getJSON(true);
        $refreshToken = $input['refresh_token'] ?? '';

        if (!empty($refreshToken)) {
            $this->db->table('auth_users')
                     ->where('refresh_token', $refreshToken)
                     ->update(['refresh_token' => null]);
        }

        return $this->response->setStatusCode(200)->setJSON([
            'status'  => true,
            'message' => 'Logout berhasil.',
        ]);
    }

    private function generateTokens(int $userId, int $role): array
    {
        $secret     = $_ENV['JWT_SECRET'];
        $now        = time();
        $accessExp  = $now + (int) $_ENV['JWT_ACCESS_EXPIRE'];
        $refreshExp = $now + (int) $_ENV['JWT_REFRESH_EXPIRE'];

        $accessPayload = [
            'iss'  => base_url(),
            'iat'  => $now,
            'exp'  => $accessExp,
            'sub'  => $userId,
            'role' => $role,
            'type' => 'access',
        ];

        $refreshPayload = [
            'iss'  => base_url(),
            'iat'  => $now,
            'exp'  => $refreshExp,
            'sub'  => $userId,
            'type' => 'refresh',
        ];

        return [
            'access_token'  => JWT::encode($accessPayload, $secret, 'HS256'),
            'refresh_token' => JWT::encode($refreshPayload, $secret, 'HS256'),
            'token_type'    => 'Bearer',
            'expires_in'    => (int) $_ENV['JWT_ACCESS_EXPIRE'],
        ];
    }
}