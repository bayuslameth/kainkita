<?php

namespace Modul\Dashboard\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'menu'         => 'dashboard',
            'submenu'      => '',
            'title'        => 'Dashboard',
        ];

        return view('Modul\Dashboard\Views\viewDashboard', $data);
    }
}
