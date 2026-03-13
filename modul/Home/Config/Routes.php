<?php
$routes->group('home', [
    'namespace' => 'Modul\Home\Controllers',
    'filter'    => 'auth',   // ← balik ke session, bukan jwtAuth
], function ($routes) {
    $routes->get('/', 'Home::index');
});