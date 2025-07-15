<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('about-us', 'Home::aboutUs');
$routes->get('contact-us', 'Home::contactUs');
$routes->get('terms-and-conditions', 'Home::termsAndConditions');
$routes->get('privacy-policy', 'Home::privacyPolicy');
$routes->get('blog', 'Home::blog'); // p=?&tag=?&q=? (page, tag, search)
$routes->get('blog/view/(:any)', 'Home::blogView/$1');
// SITEMAP.XML
$routes->get('sitemap.xml', 'Home::sitemap');
// with locale
$routes->get('{locale}/about-us', 'Home::aboutUs');
$routes->get('{locale}/contact-us', 'Home::contactUs');
$routes->get('{locale}/terms-and-conditions', 'Home::termsAndConditions');
$routes->get('{locale}/privacy-policy', 'Home::privacyPolicy');
$routes->get('{locale}/blog', 'Home::blog'); // p=?&tag=?&q=? (page, tag, search)
$routes->get('{locale}/blog/view/(:any)', 'Home::blogView/$1');
$routes->get('{locale}', 'Home::index');
// POST
$routes->post('contact-us', 'Home::contactUsScript');