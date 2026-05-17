<?php

$routes->group('my-orders', [
    'namespace' => 'Modul\My_orders\Controllers',
    'filter'    => 'auth',
], function ($routes) {
    $routes->get('/', 'My_orders::index');
    $routes->post('filter', 'My_orders::filter');
    $routes->post('detail', 'My_orders::detail');
    $routes->post('cancel', 'My_orders::cancel');
});