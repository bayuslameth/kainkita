<?php

$routes->group('products', [
    'namespace' => 'Modul\Product\Controllers',
    'filter'    => 'auth',
], function ($routes) {
    $routes->get('/', 'Product::index');
    $routes->post('datatable', 'Product::datatable');
    $routes->post('setStatus', 'Product::setStatus');
    $routes->post('save', 'Product::save');
    $routes->post('getdata', 'Product::getdata');
    $routes->post('remove', 'Product::remove');
});

$routes->group('api/product', [
    'namespace' => 'Modul\Product\Controllers',
    'filter'    => 'jwtAuth', 
], function ($routes) {
    $routes->get('/',        'Product::apiIndex');   // GET semua
    $routes->get('(:num)',   'Product::apiShow/$1'); // GET by ID
    $routes->post('/',       'Product::apiCreate');  // POST tambah
    $routes->put('(:num)',   'Product::apiUpdate/$1'); // PUT edit
    $routes->delete('(:num)','Product::apiDelete/$1'); // DELETE
});