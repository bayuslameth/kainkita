<?php

namespace Modul\Home\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'menu'         => 'home',
            'submenu'      => '',
            'title'        => 'Home',
        ];

        return view('Modul\Home\Views\viewHome', $data);
    }
}
