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

$routes->get('pemasok', 'pemasok::index');
$routes->get('pemasok/create', 'pemasok::create');
$routes->post('pemasok/save', 'pemasok::save');
$routes->post('pemasok/update/(:any)', 'pemasok::update/$1');
$routes->get('pemasok/edit/(:segment)', 'pemasok::edit/$1');
$routes->delete('pemasok/(:num)', 'pemasok::delete/$1');



$routes->get('costcenter', 'Costcenter::index');
$routes->get('costcenter/create', 'Costcenter::create');
$routes->post('costcenter/save', 'Costcenter::save');
$routes->delete('costcenter/(:num)', 'Costcenter::delete/$1');
$routes->get('costcenter/edit/(:segment)', 'Costcenter::edit/$1');
$routes->post('costcenter/update/(:any)', 'Costcenter::update/$1');




$routes->get('plant', 'Plant::index');
$routes->get('plant/create', 'Plant::create');
$routes->get('plant/edit/(:segment)', 'Plant::edit/$1');
$routes->post('plant/save', 'Plant::save');
$routes->delete('plant/(:num)', 'Plant::delete/$1');
$routes->post('plant/update/(:any)', 'Plant::update/$1');


$routes->get('lifetime', 'Lifetime::index');
$routes->get('lifetime/create', 'Lifetime::create');

$routes->get('location', 'Location::index');
