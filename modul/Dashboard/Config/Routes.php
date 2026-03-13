<?php $routes->group('dashboard', ['namespace' => 'Modul\Dashboard\Controllers', 'filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
});
