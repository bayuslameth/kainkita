<?php

$routes->group('katalog', [
    'namespace' => 'Modul\Katalog\Controllers',
], function ($routes) {
    $routes->get('/', 'Katalog::index');
    $routes->post('filter', 'Katalog::filter');

    // Detail produk: /katalog/{encrypt_id}
    $routes->get('(:any)', 'Katalog::detail/$1');
});