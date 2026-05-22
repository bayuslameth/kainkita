<?php

$routes->group('sales', [
    'namespace' => 'Modul\Sales\Controllers',
    'filter'    => 'auth',
], function ($routes) {
    $routes->get('/', 'Sales::index');
    $routes->post('datatable', 'Sales::datatable');
    $routes->post('getdetail', 'Sales::getdetail');
});