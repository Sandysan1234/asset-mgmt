<?php

use App\Controllers\Lifetime;
use CodeIgniter\Commands\Utilities\Routes;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'pages::index');
// $routes->get('tes', 'home::index');
// $routes->get('/', 'home::index');
// $routes->get('login', 'Auth\Login::login');
// $routes->post('login', 'Auth\Login::login');
// dashboard
// Override login, register, logout

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::attemptLogin');

$routes->get('logout', 'AuthController::logout');
// $routes->get('register', 'AuthController::register', ['filter' => 'role:admin']);
// $routes->post('register', 'AuthController::attemptRegister', ['filter' => 'role:admin']);
// $routes->get('logout', 'Auth::logout');
// $routes->get('register', 'Auth::register');
// $routes->post('register', 'Auth::register');
// $routes->get('logout', 'Auth::logout');

$routes->get('/', 'User::index');
// $routes->get('/home/login', 'home::login');
// $routes->get('/home/register', 'home::register');
// $routes->get('/home/forgot', 'home::forgot');
$routes->get('pages', 'Pages::index');
$routes->get('pages/about', 'Pages::about');
$routes->get('pages/contact', 'Pages::contact');

$routes->get('komik', 'komik::index');
$routes->get('komik/create', 'komik::create');
$routes->get('komik/edit/(:segment)', 'komik::edit/$1');
$routes->post('komik/save', 'komik::save');
$routes->post('komik/update/(:any)', 'komik::update/$1');
$routes->delete('komik/(:num)', 'komik::delete/$1');
$routes->get('komik/(:any)', 'komik::detail/$1');

$routes->get('pemasok', 'Pemasok::index', ['filter' => 'role:admin']);
$routes->get('pemasok/create', 'Pemasok::create', ['filter' => 'role:admin']);

$routes->post('pemasok/save', 'Pemasok::save', ['filter' => 'role:admin']);
$routes->post('pemasok/update/(:any)', 'Pemasok::update/$1', ['filter' => 'role:admin']);
$routes->get('pemasok/edit/(:segment)', 'Pemasok::edit/$1', ['filter' => 'role:admin']);
$routes->delete('pemasok/(:num)', 'Pemasok::delete/$1', ['filter' => 'role:admin']);


// $routes->get('costcenter', 'Costcenter::index',['filter' => 'role:admin']);
// $routes->get('costcenter/create', 'Costcenter::create');
// $routes->post('costcenter/save', 'Costcenter::save');
// $routes->delete('costcenter/(:num)', 'Costcenter::delete/$1');
// $routes->get('costcenter/edit/(:segment)', 'Costcenter::edit/$1');
// $routes->post('costcenter/update/(:any)', 'Costcenter::update/$1');

$routes->get('costcenter', 'Costcenter::index', ['filter' => 'permission:ack_controlling']);
$routes->get('costcenter/create', 'Costcenter::create', ['filter' => 'permission:ack_controlling']);
$routes->post('costcenter/save', 'Costcenter::save', ['filter' => 'permission:ack_controlling']);
$routes->delete('costcenter/(:num)', 'Costcenter::delete/$1', ['filter' => 'permission:ack_controlling']);
$routes->get('costcenter/edit/(:segment)', 'Costcenter::edit/$1', ['filter' => 'permission:ack_controlling']);
$routes->post('costcenter/update/(:any)', 'Costcenter::update/$1', ['filter' => 'permission:ack_controlling']);




$routes->get('plant', 'Plant::index', ['filter' => 'role:admin']);
$routes->get('plant/create', 'Plant::create', ['filter' => 'role:admin']);
$routes->get('plant/edit/(:segment)', 'Plant::edit/$1', ['filter' => 'role:admin']);
$routes->post('plant/save', 'Plant::save', ['filter' => 'role:admin']);
$routes->delete('plant/(:num)', 'Plant::delete/$1', ['filter' => 'role:admin']);
$routes->post('plant/update/(:any)', 'Plant::update/$1', ['filter' => 'role:admin']);


$routes->get('lifetime', 'Lifetime::index', ['filter' => 'role:admin']);
$routes->get('lifetime/create', 'Lifetime::create', ['filter' => 'role:admin']);
$routes->post('lifetime/save', 'Lifetime::save', ['filter' => 'role:admin']);
$routes->delete('lifetime/(:num)', 'Lifetime::delete/$1', ['filter' => 'role:admin']);
$routes->get('lifetime/edit/(:segment)', 'Lifetime::edit/$1', ['filter' => 'role:admin']);
$routes->post('lifetime/update/(:any)', 'Lifetime::update/$1', ['filter' => 'role:admin']);

$routes->get('location', 'Location::index', ['filter' => 'role:admin']);
$routes->get('location/create', 'Location::create', ['filter' => 'role:admin']);
$routes->post('location/save', 'Location::save', ['filter' => 'role:admin']);
$routes->delete('location/(:num)', 'Location::delete/$1', ['filter' => 'role:admin']);
$routes->get('location/edit/(:segment)', 'Location::edit/$1', ['filter' => 'role:admin']);
$routes->post('location/update/(:any)', 'Location::update/$1', ['filter' => 'role:admin']);

$routes->get('assetclass', 'Assetclass::index', ['filter' => 'role:admin']);
$routes->get('assetclass/create', 'Assetclass::create', ['filter' => 'role:admin']);
$routes->post('assetclass/save', 'Assetclass::save', ['filter' => 'role:admin']);
$routes->delete('assetclass/(:num)', 'Assetclass::delete/$1', ['filter' => 'role:admin']);
$routes->get('assetclass/edit/(:segment)', 'Assetclass::edit/$1', ['filter' => 'role:admin']);
$routes->post('assetclass/update/(:any)', 'Assetclass::update/$1', ['filter' => 'role:admin']);



$routes->get('asset', 'Asset::index');
$routes->get('asset/create', 'Asset::create', ['filter' => 'role:admin']);
$routes->post('asset/save', 'Asset::save');
$routes->delete('asset/(:num)', 'Asset::delete/$1', ['filter' => 'role:admin']);
$routes->get('asset/edit/(:segment)', 'Asset::edit/$1', ['filter' => 'role:admin']);
$routes->post('asset/update/(:any)', 'Asset::update/$1');
$routes->get('asset/detail/(:num)', 'Asset::detail/$1');
// $routes->get('asset/perbaikan/(:num)', 'Perbaikan::edit/$1');
$routes->get('asset/dt', 'Asset::dt');   // endpoint server-side
$routes->post('asset/dt', 'Asset::dt');   // endpoint server-side
// untuk filter lokasi
$routes->get('asset/lokasi-by-plant/(:num)', 'Asset::getLokasiByPlant/$1');


$routes->get('transaksi', 'Transaksi::index', ['filter' => 'role:pic,kabag,approval,admin']);
$routes->get('transaksi/create', 'Transaksi::create', ['filter' => 'role:pic,admin']);
$routes->post('transaksi/save', 'Transaksi::save');
$routes->get('transaksi/edit/(:segment)', 'Transaksi::edit/$1', ['filter' => 'role:pic,kabag,approval']);
$routes->post('transaksi/update/(:any)', 'Transaksi::update/$1');
$routes->post('transaksi/cancel', 'Transaksi::cancel');
$routes->delete('transaksi/(:num)', 'Transaksi::delete/$1', ['filter' => 'role:pic']);

// $routes->get('test-email', 'Transaksi::testKirim7Email');



$routes->get('api/assets/suggest', 'Transaksi::suggestAsset');



$routes->get('perbaikan', 'Perbaikan::index', ['filter' => 'role:admin']); //['filter' => 'permission:it'] atau ['filter' => 'role:admin']//
$routes->get('perbaikan/create', 'Perbaikan::create', ['filter' => 'role:admin']); //['filter' => 'permission:it'] atau ['filter' => 'role:admin']//
$routes->post('perbaikan/save', 'Perbaikan::save');
$routes->get('perbaikan/edit/(:segment)', 'Perbaikan::edit/$1', ['filter' => 'role:admin']);
$routes->post('perbaikan/update/(:any)', 'Perbaikan::update/$1');
$routes->delete('perbaikan/(:num)', 'perbaikan::delete/$1', ['filter' => 'role:admin']);

// $routes->get('perbaikan', 'Perbaikan::index', ['filter' => 'permission:it']); 
// $routes->get('perbaikan/create', 'Perbaikan::create', ['filter' => 'permission:it']); 


$routes->get('qr', 'Qrbarcode::index');
$routes->post('qr/save', 'Qrbarcode::multiple');

$routes->get('users', 'Users::index', ['filter' => 'role:admin']);


$routes->get('stock-opname', 'stockopname::index');
$routes->get('stock-opname/create', 'stockopname::create');
$routes->get('stock-opname/cekAsset', 'stockopname::cekAsset');
$routes->post('stock-opname/saveAll', 'stockopname::saveAll');
