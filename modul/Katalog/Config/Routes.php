<?php
$routes->group('katalog', [
    'namespace' => 'Modul\Katalog\Controllers',
    'filter'    => 'auth',   // ← balik ke session, bukan jwtAuth
], function ($routes) {
    $routes->get('/', 'Katalog::index');
});