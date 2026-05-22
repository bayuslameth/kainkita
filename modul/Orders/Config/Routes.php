<?php

$routes->group('orders', [
    'namespace' => 'Modul\Orders\Controllers',
], function ($routes) {
    $routes->get('/', 'Orders::detail');
    $routes->get('detail', 'Orders::detail');
    $routes->post('buyNow', 'Orders::buyNow');
    $routes->post('store', 'Orders::store');
    $routes->get('success/(:any)', 'Orders::success/$1');
});