<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin::login');
$routes->get('admin/login', 'Admin::login');
$routes->get('admin/dashboard', 'Admin::dashboard'); // Add more routes for managing blogs and news
$routes->match(['get', 'post'], 'admin/login', 'Admin::login');
$routes->get('admin/dashboard', 'Admin::dashboard'); // Add more routes for managing blogs and news
$routes->get('admin/logout', 'Admin::logout');
$routes->get('admin/news', 'Admin::news');
$routes->get('admin/add', 'Admin::add');
$routes->post('admin/save_news', 'Admin::save_news');
$routes->get('admin/listNews', 'Admin::listNews');
$routes->get('admin/viewNews/(:segment)', 'Admin::viewNews/$1');
$routes->get('admin/save_news', 'Admin::save_news');
$routes->get('admin/viewnews/(:num)', 'Admin::viewnews/$1');
$routes->get('admin/viewnews', 'Admin::viewnews/$1');
$routes->get('admin/deletenews/(:num)', 'Admin::deleteNews/$1');
$routes->get('admin/editnews/(:num)', 'Admin::editnews/$1');
$routes->post('admin/updateNews/(:num)', 'Admin::updateNews/$1');
