<?php

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
$routes->delete('pemasok/(:num)', 'pemasok::delete/$1');
$routes->post('pemasok/save', 'pemasok::save');

$routes->get('costcenter', 'Costcenter::index');
$routes->get('costcenter/create', 'Costcenter::create');
$routes->delete('costcenter/(:num)','Costcenter::delete/$1');
$routes->post('costcenter/save', 'Costcenter::save');



$routes->get('plant', 'Plant::index');
$routes->post('plant/save', 'Plant::save');




