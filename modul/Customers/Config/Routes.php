<?php

$routes->group('customers', [
    'namespace' => 'Modul\Customers\Controllers',
    'filter'    => 'auth',
], function ($routes) {
    $routes->get('/', 'Customers::index');
    $routes->post('datatable', 'Customers::datatable');
    $routes->post('save', 'Customers::save');
    $routes->post('getdata', 'Customers::getdata');
    $routes->post('remove', 'Customers::remove');
});