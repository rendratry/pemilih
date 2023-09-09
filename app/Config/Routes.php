<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('import', 'Home::importPage');
$routes->post('import_data_pemilih', 'Home::importPemilih');