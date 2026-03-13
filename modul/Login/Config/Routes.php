<?php

$routes->group('login', ['namespace' => 'Modul\Login\Controllers'], function ($routes) {
    $routes->get('/', 'Login::index');
    $routes->post('doLogin', 'Login::doLogin');
    $routes->add('logout', 'Login::logout');
});

$routes->group('api/auth', ['namespace' => 'Modul\Login\Controllers'], function ($routes) {
    $routes->post('login',   'Login::apiLogin');
    $routes->post('refresh', 'Login::apiRefresh');
    $routes->post('logout',  'Login::apiLogout');
});