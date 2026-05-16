<?php
$routes->group('my-orders', [
    'namespace' => 'Modul\My_orders\Controllers',
    'filter'    => 'auth',   // ← balik ke session, bukan jwtAuth
], function ($routes) {
    $routes->get('/', 'My_orders::index');
});