<?php
$routes->group('about-us', [
    'namespace' => 'Modul\About\Controllers',
    'filter'    => 'auth',   // ← balik ke session, bukan jwtAuth
], function ($routes) {
    $routes->get('/', 'About::index');
});