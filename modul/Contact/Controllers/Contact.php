<?php

namespace Modul\Contact\Controllers;

use App\Controllers\BaseController;

class Contact extends BaseController
{
    public function index()
    {
        $data = [
            'menu'         => 'contact',
            'submenu'      => '',
            'title'        => 'Kontak Kami',
        ];

        return view('Modul\Contact\Views\viewContact', $data);
    }
}