<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('login', 'Login::index');
$routes->post('login/process', 'Login::process');
$routes->get('logout', 'Login::logout');
$routes->get('registrasi', 'Register::index');
$routes->post('registrasi/process', 'Register::save');
$routes->setAutoRoute(false);
$routes->get('barang/(:num)', 'Barang::detail/$1');
$routes->get('barang/detail/(:num)', 'Barang::detail/$1');
$routes->get('barang/qrcode/(:num)', 'Barang::qrcode/$1');
$routes->get('clear-cache', function () {
    $phpPath = '/opt/plesk/php/8.1/bin/php';
    $projectPath = realpath(APPPATH . '../');
    $sparkCommand = "$phpPath $projectPath/spark clear-cache";

    $output = shell_exec($sparkCommand);

    return "<pre>$output</pre>";
});
// Grup yang membutuhkan auth
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('barang', 'Barang::index');
    $routes->get('barang/create', 'Barang::create');
    $routes->post('barang/save', 'Barang::save');
    $routes->get('barang/edit/(:num)', 'Barang::edit/$1');
    $routes->post('barang/update/(:num)', 'Barang::update/$1');
    $routes->delete('barang/(:num)', 'Barang::delete/$1');
});
