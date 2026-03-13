<?php $routes->group('register', ['namespace' => 'Modul\Register\Controllers'], function ($routes) {
    $routes->get('/', 'Register::index');
    $routes->post('save', 'Register::save');
});
