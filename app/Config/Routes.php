<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('index', 'Home::index');

// auth
$routes->add('login', 'auth::login');
$routes->add('register', 'auth::register');
$routes->add('logout', 'auth::logout');
$routes->add('admin/login', 'Admin::login');
$routes->add('admin/update', 'Admin::update');

// dashboard
$routes->add('pengguna', 'Home::pengguna');
$routes->get('transaksi', 'Home::transaksi');
$routes->add('beli/(:num)', 'Home::beli');
$routes->add('hapus/(:num)', 'Home::hapus');
$routes->add('buktibayar/(:num)', 'Home::buktibayar');
$routes->add('transaksipengguna/(:num)', 'Home::transaksipengguna');


$routes->get('dashboard', 'Admin::index');
$routes->add('tambah', 'Admin::tambah');
$routes->add('editprod/tambah', 'Admin::tambah');
$routes->get('semuatransaksi', 'Admin::alltrans');
$routes->get('semuapengguna', 'Admin::allpengguna');
$routes->get('logout', 'auth::logout');
$routes->get('produk', 'Admin::produk');
$routes->get('rekaptransaksi', 'Admin::rekap');


// hapus edit
$routes->get('editprod/(:num)', 'Admin::editprod');
$routes->get('hapusprod/(:num)', 'Admin::hapusprod');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
