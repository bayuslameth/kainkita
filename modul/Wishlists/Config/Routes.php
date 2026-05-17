<?php

$routes->group('wishlist', [
    'namespace' => 'Modul\Wishlists\Controllers',
    'filter'    => 'auth',
], function ($routes) {
    $routes->get('/', 'Wishlists::index');
    $routes->post('toggle', 'Wishlists::toggle');
    $routes->post('remove', 'Wishlists::remove');
    $routes->post('remove-selected', 'Wishlists::removeSelected');
    $routes->post('list', 'Wishlists::getList');
    $routes->post('add-to-cart', 'Wishlists::addToCart');
});