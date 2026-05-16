<?php

$routes->group('wishlist', [
    'namespace' => 'Modul\Wishlists\Controllers',
], function ($routes) {
    $routes->post('toggle', 'Wishlists::toggle');
    $routes->post('remove', 'Wishlists::remove');
    $routes->get('list', 'Wishlists::list');
});