<?php

$routes->group('product-categories', [
    'namespace' => 'Modul\Product_categories\Controllers',
    'filter'    => 'auth',
], function ($routes) {
    $routes->get('/', 'Product_categories::index');
    $routes->post('datatable', 'Product_categories::datatable');
    $routes->post('setStatus', 'Product_categories::setStatus');
    $routes->post('save', 'Product_categories::save');
    $routes->post('getdata', 'Product_categories::getdata');
    $routes->post('remove', 'Product_categories::remove');
});

$routes->group('api/product-categories', [
    'namespace' => 'Modul\Product_categories\Controllers',
    'filter'    => 'jwtAuth', 
], function ($routes) {
    $routes->get('/',        'Product_categories::apiIndex');   // GET semua
    $routes->get('(:num)',   'Product_categories::apiShow/$1'); // GET by ID
    $routes->post('/',       'Product_categories::apiCreate');  // POST tambah
    $routes->put('(:num)',   'Product_categories::apiUpdate/$1'); // PUT edit
    $routes->delete('(:num)','Product_categories::apiDelete/$1'); // DELETE
});