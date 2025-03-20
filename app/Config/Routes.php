<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 * 
 * 
 */$routes->post('register', 'AuthController::register');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');
$routes->get('check-session', 'AuthController::checkSession');

$routes->get('/', 'Home::index');
