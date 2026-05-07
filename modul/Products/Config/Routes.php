<?php

$routes->group('products', [
    'namespace' => 'Modul\Products\Controllers',
    'filter'    => 'auth',
], function ($routes) {
    $routes->get('/', 'Products::index');
    $routes->post('datatable', 'Products::datatable');
    $routes->post('setStatus', 'Products::setStatus');
    $routes->post('save', 'Products::save');
    $routes->post('getdata', 'Products::getdata');
    $routes->post('remove', 'Products::remove');
});