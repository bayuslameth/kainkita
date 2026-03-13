<?php $routes->group('home', ['namespace' => 'Modul\Home\Controllers', 'filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Home::index');
});
