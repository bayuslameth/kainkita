<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $uri     = service('uri');
        $segment = $uri->getSegment(1);

        // if (!$session->get('logged_in')) {
        //     return redirect()->to(base_url('login'));
        // } 

        // $role = $session->get('role');

        // if ($role == 2 && $segment == 'admin') {
        //     return redirect()->to(base_url('home'));
        // }
        
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}