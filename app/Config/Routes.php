<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('contact-us', 'Home::contactUs');
$routes->get('about-us', 'Home::aboutUs');
$routes->get('blog', 'Blog::index');
$routes->get('{locale}', 'Home::index');
$routes->get('{locale}/contact-us', 'Home::contactUs');
$routes->get('{locale}/about-us', 'Home::aboutUs');
$routes->get('{locale}/blog', 'Blog::index');