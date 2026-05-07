<?php
$routes->group('settings', [
    'namespace' => 'Modul\Settings\Controllers',
    'filter'    => 'auth',   // ← balik ke session, bukan jwtAuth
], function ($routes) {
    $routes->get('/', 'Settings::index');
    $routes->post('save', 'Settings::save');
});