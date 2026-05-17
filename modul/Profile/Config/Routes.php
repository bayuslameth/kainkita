<?php

$routes->group('profile', [
    'namespace' => 'Modul\Profile\Controllers',
], function ($routes) {
    $routes->get('/', 'Profile::index');
    $routes->post('getdata', 'Profile::getdata');
    $routes->post('update', 'Profile::update');
    $routes->post('change-password', 'Profile::changePassword');
});