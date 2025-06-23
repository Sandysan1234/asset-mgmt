<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'pages::index');
$routes->get('/', 'home::index');
$routes->get('/home/login', 'home::login');
$routes->get('/home/register', 'home::register');
$routes->get('/home/user', 'home::user');
$routes->get('pages', 'Pages::index');
$routes->get('pages/about', 'Pages::about');
$routes->get('pages/contact', 'Pages::contact');
$routes->get('komik', 'komik::index');
$routes->get('vendor', 'vendor::vendor');
$routes->get('vendor', 'vendor::vendor');
