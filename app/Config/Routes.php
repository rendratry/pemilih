<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('login', 'LoginController::index');
$routes->get('logout', 'LoginController::logout');
$routes->post('login-in', 'LoginController::login');

$routes->group('dashboard/admin', static function ($routes) {
    $routes->get('', 'DashboardController::index');
    $routes->get('data-pemilih', 'DashboardController::pemilihView');
    $routes->post('data-pemilih-filter', 'DashboardController::pemilihData');
    $routes->post('updatechecklist-data-pemilih', 'DashboardController::updateChecklist');
    $routes->get('import', 'DashboardController::importPage');
    $routes->post('import_data_pemilih', 'DashboardController::importPemilih');
});