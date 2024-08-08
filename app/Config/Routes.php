<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('blog', 'Home::blog');
$routes->get('blog-detail', 'Home::blog_detail');
$routes->get('privacy', 'Home::privacy');
$routes->get('cookie', 'Home::cookie');

$routes->get('reff/(:any)', 'Auth::refflink/$1');
$routes->post('authorize', 'Auth::login');
$routes->get('logout', 'Auth::logout');

$routes->get('reffer', 'Account::reffer');
$routes->get('withdraw', 'Account::withdraw');
// $routes->get('ptc', 'Account::ptc');
$routes->get('faucet', 'Account::faucet');
// $routes->get('advertise', 'Advertise::ads_index');
// $routes->get('advertise/create', 'Advertise::ads_create');
// $routes->get('advertise/manage', 'Advertise::ads_manage');
// $routes->get('advertise/deposit', 'Advertise::ads_deposit');
// $routes->get('shortlinks', 'Account::shortlinks');

$routes->post('faucet-run', 'Utility\FaucetController::running');