<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::index1');
$routes->get('login', 'LoginController::index');
$routes->get('logout', 'LoginController::logout');
$routes->post('login-in', 'LoginController::login');

$routes->group('tabulasi/tps', static function ($routes) {
    $routes->get('', 'TabulasiController::index', ['filter' => 'role:mejayan,saradan']);
    $routes->post('pilih-tps','TabulasiController::selectTps',['filter' => 'role:mejayan,saradan']);
    $routes->post('input-tabulasi','TabulasiController::tabulasi',['filter' => 'role:mejayan,saradan']);
    $routes->post('input-tabulasi-submit','TabulasiController::tabulasiSubmit',['filter' => 'role:mejayan,saradan']);
});
$routes->group('dashboard/admin', static function ($routes) {
    $routes->get('', 'DashboardController::index', ['filter' => 'role:admin']);
    $routes->get('data-pemilih', 'DashboardController::pemilihView', ['filter' => 'role:admin']);
    $routes->get('data-tabulasi', 'DashboardController::tabulasiView', ['filter' => 'role:admin']);
    $routes->get('quick-count', 'DashboardController::quickCount', ['filter' => 'role:admin']);
    $routes->post('data-tabulasi-detail', 'DashboardController::tabulasiData', ['filter' => 'role:admin']);
    $routes->post('data-pemilih-filter', 'DashboardController::pemilihData', ['filter' => 'role:admin']);
    $routes->post('updatechecklist-data-pemilih', 'DashboardController::updateChecklist', ['filter' => 'role:admin']);
    $routes->get('import', 'DashboardController::importPage', ['filter' => 'role:admin']);
    $routes->post('import_data_pemilih', 'DashboardController::importPemilihCustom', ['filter' => 'role:admin']);
});