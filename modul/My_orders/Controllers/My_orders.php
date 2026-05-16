<?php

namespace Modul\My_orders\Controllers;

use App\Controllers\BaseController;

class My_orders extends BaseController
{
    public function index()
    {
        $data = [
            'menu'         => 'my-orders',
            'submenu'      => '',
            'title'        => 'My Orders',
        ];

        return view('Modul\My_orders\Views\viewOrders', $data);
    }
}