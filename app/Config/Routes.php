<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Route utama website
$routes->get('/', 'Home::index', ['namespace' => 'Modul\Home\Controllers']);

// Route login tetap tersedia di /login
$routes->get('login', 'Login::index', ['namespace' => 'Modul\Login\Controllers']);

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

if (file_exists(ROOTPATH . 'modul')) {
    $modulesPath = ROOTPATH . 'modul/';
    $modules = scandir($modulesPath);

    foreach ($modules as $module) {
        if ($module === '.' || $module === '..') {
            continue;
        }

        if (is_dir($modulesPath . $module)) {
            $routesPath = $modulesPath . $module . '/Config/Routes.php';

            if (file_exists($routesPath)) {
                require $routesPath;
            }
        }
    }
}