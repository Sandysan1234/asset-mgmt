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
$routes->post('komik/save', 'komik::save');
$routes->get('komik/(:segment)', 'komik::detail/$1');
$routes->get('pemasok', 'pemasok::index');
$routes->get('pemasok/create', 'pemasok::create');
// $routes->get('pemasok', 'pemasok::pemasok');
$routes->post('pemasok/save', 'pemasok::save');
