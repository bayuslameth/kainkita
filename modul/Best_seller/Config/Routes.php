<?php

$routes->group('best-seller', [
    'namespace' => 'Modul\Best_seller\Controllers',
], function ($routes) {
    $routes->get('/', 'Best_seller::index');
});