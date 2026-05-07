<?php

namespace Modul\Dashboard\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $id = $this->session->get('user_id');

        if (!$id) {
            return redirect()->to('/login');
        }

        $role = $this->session->get('role');

        if ($role === '2') {
            return redirect()->to('/home');
        }
        
        $data = [
            'menu'         => 'dashboard',
            'submenu'      => '',
            'title'        => 'Dashboard',
        ];

        return view('Modul\Dashboard\Views\viewDashboard', $data);
    }
}