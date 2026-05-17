<?php

$routes->group('katalog', [
    'namespace' => 'Modul\Katalog\Controllers',
    'filter'    => 'auth',
], function ($routes) {
    $routes->get('/', 'Katalog::index');
    $routes->post('filter', 'Katalog::filter');
});