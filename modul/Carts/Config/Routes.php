<?php

$routes->group('cart', [
    'namespace' => 'Modul\Carts\Controllers',
], function ($routes) {
    $routes->post('add', 'Carts::add');
    $routes->post('remove', 'Carts::remove');
    $routes->post('updateQty', 'Carts::updateQty');
    $routes->get('list', 'Carts::list');
});