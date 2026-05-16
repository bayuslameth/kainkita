<?php
$routes->group('contact', [
    'namespace' => 'Modul\Contact\Controllers',
    'filter'    => 'auth',   // ← balik ke session, bukan jwtAuth
], function ($routes) {
    $routes->get('/', 'Contact::index');
});