<?php $routes->group('product-categories', ['namespace' => 'Modul\Product_categories\Controllers', 'filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Product_categories::index');
    $routes->post('datatable', 'Product_categories::datatable');
    $routes->post('setStatus', 'Product_categories::setStatus');
    $routes->post('save', 'Product_categories::save');
    $routes->post('getdata', 'Product_categories::getdata');
    $routes->post('remove', 'Product_categories::remove');
});
