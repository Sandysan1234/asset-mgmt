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

// $routes->get('komik', 'komik::index');
// $routes->get('komik/create', 'komik::create');
// $routes->get('komik/edit/(:segment)', 'komik::edit/$1');
// $routes->post('komik/save', 'komik::save');
// $routes->post('komik/update/(:any)', 'komik::update/$1');
// $routes->delete('komik/(:num)', 'komik::delete/$1');
// $routes->get('komik/(:any)', 'komik::detail/$1');

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

$routes->get('costcenter', 'Costcenter::index', ['filter' => 'permission:ttd_controlling']);
$routes->get('costcenter/create', 'Costcenter::create', ['filter' => 'permission:ttd_controlling']);
$routes->post('costcenter/save', 'Costcenter::save', ['filter' => 'permission:ttd_controlling']);
$routes->delete('costcenter/(:num)', 'Costcenter::delete/$1', ['filter' => 'permission:ttd_controlling']);
$routes->get('costcenter/edit/(:segment)', 'Costcenter::edit/$1', ['filter' => 'permission:ttd_controlling']);
$routes->post('costcenter/update/(:any)', 'Costcenter::update/$1', ['filter' => 'permission:ttd_controlling']);




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

$routes->get('assetclass', 'Assetclass::index', ['filter' => 'role:admin,finance,finance-manager']);
$routes->get('assetclass/create', 'Assetclass::create', ['filter' => 'role:admin,finance,finance-manager']);
$routes->post('assetclass/save', 'Assetclass::save', ['filter' => 'role:admin,finance,finance-manager']);
$routes->delete('assetclass/(:num)', 'Assetclass::delete/$1', ['filter' => 'role:admin,finance,finance-manager']);
$routes->get('assetclass/edit/(:segment)', 'Assetclass::edit/$1', ['filter' => 'role:admin,finance,finance-manager']);
$routes->post('assetclass/update/(:any)', 'Assetclass::update/$1', ['filter' => 'role:admin,finance,finance-manager']);



$routes->get('asset', 'Asset::index');
$routes->get('asset/create', 'Asset::create', ['filter' => 'role:admin,pic']);
$routes->post('asset/save', 'Asset::save');
$routes->delete('asset/(:num)', 'Asset::delete/$1', ['filter' => 'role:admin']);
$routes->get('asset/edit/(:segment)', 'Asset::edit/$1', ['filter' => 'role:admin,pic']);
$routes->post('asset/update/(:any)', 'Asset::update/$1');
$routes->get('asset/detail/(:num)', 'Asset::detail/$1');
// $routes->get('asset/perbaikan/(:num)', 'Perbaikan::edit/$1');
$routes->get('asset/dt', 'Asset::dt');   // endpoint server-side
$routes->post('asset/dt', 'Asset::dt');   // endpoint server-side
// untuk filter lokasi
$routes->get('asset/lokasi-by-plant/(:num)', 'Asset::getLokasiByPlant/$1');

$routes->get('assetlog', 'Assetlog::index', ['filter' => 'role:admin']);



$routes->get('transaksi', 'Transaksi::index', ['filter' => 'role:pic,kabag,approval,admin']);
$routes->get('transaksi/create', 'Transaksi::create', ['filter' => 'role:pic,admin']);
$routes->post('transaksi/save', 'Transaksi::save',['filter' => 'role:pic,admin']);
$routes->get('transaksi/edit/(:segment)', 'Transaksi::edit/$1', ['filter' => 'role:pic,kabag,approval']);
$routes->post('transaksi/update/(:any)', 'Transaksi::update/$1',['filter' => 'role:pic,kabag,approval']);
$routes->post('transaksi/cancel', 'Transaksi::cancel', ['filter' => 'role:finance,admin']);
$routes->delete('transaksi/(:num)', 'Transaksi::delete/$1', ['filter' => 'role:pic']);
$routes->get('transaksi/request-cancel/(:num)', 'Transaksi::requestCancel/$1', ['filter'=>'role:pic']);


// $routes->get('test-email', 'Transaksi::testKirim7Email');



$routes->get('api/assets/suggest', 'Transaksi::suggestAsset');



$routes->get('perbaikan', 'Perbaikan::index', ['filter' => 'permission:it']); //['filter' => 'permission:it'] atau ['filter' => 'role:admin']//
$routes->get('perbaikan/create', 'Perbaikan::create', ['filter' => 'permission:it']); //['filter' => 'permission:it'] atau ['filter' => 'role:admin']//
$routes->post('perbaikan/save', 'Perbaikan::save',['filter' => 'permission:it']);
$routes->get('perbaikan/edit/(:segment)', 'Perbaikan::edit/$1', ['filter' => 'permission:it']);
$routes->post('perbaikan/update/(:any)', 'Perbaikan::update/$1',['filter' => 'permission:it']);
$routes->delete('perbaikan/(:num)', 'Perbaikan::delete/$1', ['filter' => 'permission:it']);

// $routes->get('perbaikan', 'Perbaikan::index', ['filter' => 'permission:it']); 
// $routes->get('perbaikan/create', 'Perbaikan::create', ['filter' => 'permission:it']); 


$routes->get('qr', 'Qrbarcode::index', ['filter' => 'role:admin,pic']);
$routes->post('qr/save', 'Qrbarcode::multiple');

$routes->get('users', 'Users::index', ['filter' => 'role:admin']);


$routes->get('stock-opname', 'Stockopname::index');
$routes->get('stock-opname/create', 'Stockopname::create');
$routes->get('stock-opname/cekAsset', 'Stockopname::cekAsset');
$routes->post('stock-opname/saveAll', 'Stockopname::saveAll');
$routes->get('stock-opname/cekAssetByNo', 'Stockopname::cekAssetByNo');

// $routes->get('roles', 'Admin\Roles::index');

// $routes->get('roles/users/(:num)', 'Admin\Roles::users/$1');
// $routes->post('roles/assign-user', 'Admin\Roles::assignUserToRole');
// $routes->get('roles/remove-user/(:num)/(:num)', 'Admin\Roles::removeUserFromRole/$1/$2');


$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    // Role management
    $routes->get('roles', 'Admin\Roles::index');
    $routes->get('roles/manage/(:num)', 'Admin\Roles::manage/$1');
    $routes->post('roles/create', 'Admin\Roles::createRole');
    $routes->get('roles/delete/(:num)', 'Admin\Roles::deleteRole/$1');

    // Permission
    $routes->post('roles/add-permission', 'Admin\Roles::addPermission');
    $routes->get('roles/remove-permission/(:num)/(:num)', 'Admin\Roles::removePermission/$1/$2');
    // User
    $routes->post('roles/add-user', 'Admin\Roles::addUser');
    $routes->get('roles/remove-user/(:num)/(:num)', 'Admin\Roles::removeUser/$1/$2');

    $routes->get('roles/edit/(:num)', 'Admin\Roles::edit/$1');
    $routes->post('roles/update/(:num)', 'Admin\Roles::update/$1');
    
    $routes->get('users', 'Admin\Users::index');
    $routes->get('users/create', 'Admin\Users::create');
    $routes->post('users/store', 'Admin\Users::store');
    $routes->get('users/edit/(:num)', 'Admin\Users::edit/$1');
    $routes->post('users/update/(:num)', 'Admin\Users::update/$1');
    $routes->get('users/delete/(:num)', 'Admin\Users::delete/$1');

    
    $routes->get('sesi-audit', 'Admin\SesiAudit::index');
    $routes->get('sesi-audit/new', 'Admin\SesiAudit::new');
    $routes->post('sesi-audit/create', 'Admin\SesiAudit::create');
    $routes->get('sesi-audit/detail/(:num)', 'Admin\SesiAudit::detail/$1');
    $routes->post('sesi-audit/close/(:num)', 'Admin\SesiAudit::close/$1');
    $routes->delete('sesi-audit/delete/(:num)', 'Admin\SesiAudit::delete/$1');


});

$routes->group('pic', ['filter'=> 'role:pic'], function($routes){
    $routes->get('audit', 'PIC\AuditController::index'); // Dashboard PIC
    $routes->get('audit/scan', 'PIC\AuditController::scan'); 
});
$routes->group('api', ['filter' => 'role:pic'], static function ($routes) {
    $routes->post('audit/check', 'PIC\AuditController::checkAsset');
    $routes->post('audit/manual-verify', 'PIC\AuditController::verifyByInput'); // Untuk Input Manual (BARU)
});