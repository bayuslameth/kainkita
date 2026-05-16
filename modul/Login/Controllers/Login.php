<?php

namespace Modul\Login\Controllers;

use App\Controllers\BaseController;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;
use Google\Client as GoogleClient;
use Google\Service\Oauth2;

class Login extends BaseController
{

    public function index()
    {
        $userId = $this->session->get('user_id');
        $role   = $this->session->get('role');

        if ($userId) {
            return redirect()->to(base_url($this->getRedirectRoute($role)));
        }

        $data = ['Title' => 'KainKita | Masuk Akun'];
        return view('Modul\Login\Views\viewLogin', $data);
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

        if (!$user || md5(md5($password)) !== $user->password) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Email atau password salah.',
            ]);
        }

        if ($user->status != 1) {
            return $this->response->setJSON([
                'status'  => false,
                'message' => 'Akun tidak aktif.',
            ]);
        }

        $this->session->set([
            'user_id'   => $user->id,
            'role'      => $user->role,
            'logged_in' => true,
        ]);

        return $this->response->setJSON([
            'status'      => true,
            'redirect_to' => $this->getRedirectRoute($user->role),
        ]);
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

    private function getRedirectRoute($role): string
    {
        if ($role == 1) {
            return 'dashboard';
        } elseif ($role == 2) {
            return 'home';
        } else {
            return 'home'; // default to home for other roles
        }
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

    private function googleClient()
    {
        $client = new GoogleClient();

        $client->setClientId(getenv('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(getenv('GOOGLE_REDIRECT_URI'));

        $client->addScope('email');
        $client->addScope('profile');

        return $client;
    }

    public function google()
    {
        $client = $this->googleClient();

        return redirect()->to($client->createAuthUrl());
    }

    public function googleCallback()
    {
        $code = $this->request->getGet('code');

        if (!$code) {
            return redirect()->to(base_url('login'))->with('error', 'Login Google dibatalkan.');
        }

        $client = $this->googleClient();

        try {
            $token = $client->fetchAccessTokenWithAuthCode($code);

            if (isset($token['error'])) {
                return redirect()->to(base_url('login'))->with('error', 'Gagal login dengan Google.');
            }

            $client->setAccessToken($token);

            $googleService = new Oauth2($client);
            $googleUser    = $googleService->userinfo->get();

            $googleId = $googleUser->id;
            $email    = $googleUser->email;
            $name     = $googleUser->name;
            $avatar   = $googleUser->picture;

            if (!$email) {
                return redirect()->to(base_url('login'))->with('error', 'Email Google tidak ditemukan.');
            }

            $user = $this->db->table('auth_users')
                ->where('google_id', $googleId)
                ->orWhere('email', $email)
                ->get()
                ->getRow();

            if ($user) {
                $this->db->table('auth_users')
                    ->where('id', $user->id)
                    ->update([
                        'google_id' => $googleId,
                        'name'      => $name,
                        'avatar'    => $avatar,
                        'status'    => 1,
                    ]);

                $userId = $user->id;
                $role   = $user->role;
            } else {
                $dataUser = [
                    'google_id' => $googleId,
                    'name'      => $name,
                    'email'     => $email,
                    'password'  => md5(md5(bin2hex(random_bytes(16)))),
                    'role'      => 2,
                    'status'    => 1,
                ];

                $this->db->table('auth_users')->insert($dataUser);

                $userId = $this->db->insertID();
                $role   = 2;
            }

            $customer = $this->db->table('customers')
                ->where('user_id', $userId)
                ->get()
                ->getRowArray();

            if (!$customer) {
                $this->db->table('customers')->insert([
                    'user_id'    => $userId,
                    'full_name'  => $name,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

                $customerId = $this->db->insertID();
            } else {
                $customerId = $customer['id'];
            }

            $this->session->set([
                'user_id'       => $userId,
                'customer_id'   => $customerId,
                'role'          => $role,
                'logged_in'     => true,
            ]);

            return redirect()->to(base_url($this->getRedirectRoute($role)));
        } catch (\Throwable $e) {
    dd($e->getMessage(), $e->getFile(), $e->getLine());
}
    }
}