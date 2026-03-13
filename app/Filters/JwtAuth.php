<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;

class JwtAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $header = $request->getHeaderLine('Authorization');

        if (!$header || !str_starts_with($header, 'Bearer ')) {
            return service('response')
                ->setStatusCode(401)
                ->setJSON([
                    'status'  => false,
                    'message' => 'Token tidak ditemukan. Silakan login terlebih dahulu.'
                ]);
        }

        $token = substr($header, 7); // Ambil token setelah "Bearer "

        try {
            $secret = $_ENV['JWT_SECRET'];
            $decoded = JWT::decode($token, new Key($secret, 'HS256'));

            // Simpan payload ke request supaya bisa diakses controller
            $request->jwtPayload = $decoded;

        } catch (ExpiredException $e) {
            return service('response')
                ->setStatusCode(401)
                ->setJSON([
                    'status'  => false,
                    'message' => 'Token sudah kadaluarsa. Silakan refresh token.'
                ]);
        } catch (\Exception $e) {
            return service('response')
                ->setStatusCode(401)
                ->setJSON([
                    'status'  => false,
                    'message' => 'Token tidak valid.'
                ]);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu diisi
    }
}