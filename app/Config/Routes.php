<?php

use App\Controllers\Lifetime;
use CodeIgniter\Commands\Utilities\Routes;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'pages::index');
$routes->get('/home/user', 'home::user');
// $routes->get('/', 'home::index');

// dashboard
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

$routes->get('pemasok', 'Pemasok::index',['filter' => 'role:admin']);
$routes->get('pemasok/create', 'Pemasok::create',['filter' => 'role:admin']);

$routes->post('pemasok/save', 'Pemasok::save',['filter' => 'role:admin']);
$routes->post('pemasok/update/(:any)', 'Pemasok::update/$1',['filter' => 'role:admin']);
$routes->get('pemasok/edit/(:segment)', 'Pemasok::edit/$1',['filter' => 'role:admin']);
$routes->delete('pemasok/(:num)', 'Pemasok::delete/$1',['filter' => 'role:admin']);


// $routes->get('costcenter', 'Costcenter::index',['filter' => 'role:admin']);
// $routes->get('costcenter/create', 'Costcenter::create');
// $routes->post('costcenter/save', 'Costcenter::save');
// $routes->delete('costcenter/(:num)', 'Costcenter::delete/$1');
// $routes->get('costcenter/edit/(:segment)', 'Costcenter::edit/$1');
// $routes->post('costcenter/update/(:any)', 'Costcenter::update/$1');

$routes->get('costcenter', 'Costcenter::index', ['filter' => 'role:admin']);
$routes->get('costcenter/create', 'Costcenter::create', ['filter' => 'role:admin']);
$routes->post('costcenter/save', 'Costcenter::save', ['filter' => 'role:admin']);
$routes->delete('costcenter/(:num)', 'Costcenter::delete/$1', ['filter' => 'role:admin']);
$routes->get('costcenter/edit/(:segment)', 'Costcenter::edit/$1', ['filter' => 'role:admin']);
$routes->post('costcenter/update/(:any)', 'Costcenter::update/$1', ['filter' => 'role:admin']);




$routes->get('plant', 'Plant::index',['filter' => 'role:admin']);
$routes->get('plant/create', 'Plant::create',['filter' => 'role:admin']);
$routes->get('plant/edit/(:segment)', 'Plant::edit/$1',['filter' => 'role:admin']);
$routes->post('plant/save', 'Plant::save',['filter' => 'role:admin']);
$routes->delete('plant/(:num)', 'Plant::delete/$1',['filter' => 'role:admin']);
$routes->post('plant/update/(:any)', 'Plant::update/$1',['filter' => 'role:admin']);


$routes->get('lifetime', 'Lifetime::index',['filter' => 'role:admin']);
$routes->get('lifetime/create', 'Lifetime::create',['filter' => 'role:admin']);
$routes->post('lifetime/save', 'Lifetime::save',['filter' => 'role:admin']);
$routes->delete('lifetime/(:num)', 'Lifetime::delete/$1',['filter' => 'role:admin']);
$routes->get('lifetime/edit/(:segment)', 'Lifetime::edit/$1',['filter' => 'role:admin']);
$routes->post('lifetime/update/(:any)', 'Lifetime::update/$1',['filter' => 'role:admin']);

$routes->get('location', 'Location::index',['filter' => 'role:admin']);
$routes->get('location/create', 'Location::create',['filter' => 'role:admin']);
$routes->post('location/save', 'Location::save',['filter' => 'role:admin']);
$routes->delete('location/(:num)', 'Location::delete/$1',['filter' => 'role:admin']);
$routes->get('location/edit/(:segment)', 'Location::edit/$1',['filter' => 'role:admin']);
$routes->post('location/update/(:any)', 'Location::update/$1',['filter' => 'role:admin']);

$routes->get('assetclass', 'Assetclass::index',['filter' => 'role:admin']);
$routes->get('assetclass/create', 'Assetclass::create',['filter' => 'role:admin']);
$routes->post('assetclass/save', 'Assetclass::save',['filter' => 'role:admin']);
$routes->delete('assetclass/(:num)', 'Assetclass::delete/$1',['filter' => 'role:admin']);
$routes->get('assetclass/edit/(:segment)', 'Assetclass::edit/$1',['filter' => 'role:admin']);
$routes->post('assetclass/update/(:any)', 'Assetclass::update/$1',['filter' => 'role:admin']);



$routes->get('asset', 'Asset::index');
$routes->get('asset/create', 'Asset::create');
$routes->post('asset/save', 'Asset::save');
$routes->delete('asset/(:num)', 'Asset::delete/$1');
$routes->get('asset/edit/(:segment)', 'Asset::edit/$1');
$routes->post('asset/update/(:any)', 'Asset::update/$1');
$routes->get('asset/detail/(:num)', 'Asset::detail/$1');
$routes->match(['get', 'post'], 'asset/dt', 'Asset::dt');   // endpoint server-side



$routes->get('transaksi', 'Transaksi::index',['filter' => 'role:pic,kabag,approval']);
$routes->get('transaksi/create', 'Transaksi::create',['filter' => 'role:pic']);
$routes->post('transaksi/save', 'Transaksi::save');
$routes->get('transaksi/edit/(:segment)', 'Transaksi::edit/$1', ['filter' => 'role:pic,kabag,approval']);
$routes->post('transaksi/update/(:any)', 'Transaksi::update/$1');
$routes->delete('transaksi/(:num)', 'Transaksi::delete/$1',['filter' => 'role:pic']);

$routes->get('api/assets/suggest', 'Transaksi::suggestAsset');



$routes->get('qr', 'Qrbarcode::index');
$routes->post('qr/save', 'Qrbarcode::multiple');

$routes->get('users', 'Users::index', ['filter' => 'role:admin']);