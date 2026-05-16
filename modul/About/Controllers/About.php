<?php

namespace Modul\About\Controllers;

use App\Controllers\BaseController;

class About extends BaseController
{
    public function index()
    {
        $data = [
            'menu'         => 'about',
            'submenu'      => '',
            'title'        => 'Tentang Kami',
        ];

        return view('Modul\About\Views\viewAbout', $data);
    }
}