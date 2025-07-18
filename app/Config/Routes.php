<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->group('api', function($routes){
    $routes->options('(:any)', 'Api\Auth::options');
    $routes->get('users', 'Api\Users::index');
    $routes->post('auth', 'Api\Auth::login');
});
