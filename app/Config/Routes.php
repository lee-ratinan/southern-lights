<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
# $routes->get('/', 'Home::index'); // to swap out once it's launched
$routes->get('/', 'Home::under_construction');
$routes->get('about-us', 'Home::aboutUs');
$routes->get('services', 'Home::services');
$routes->get('services/view', 'Home::serviceView');
$routes->get('promotions', 'Home::promotions');
$routes->get('promotions/view', 'Home::promotionView');
$routes->get('contact-us', 'Home::contactUs');
$routes->get('terms-and-conditions', 'Home::termsAndConditions');
$routes->get('privacy-policy', 'Home::privacyPolicy');
$routes->get('blog', 'Home::blog'); // p=?&tag=?&q=? (page, tag, search)
$routes->get('blog/view', 'Home::blogView'); // s=?
// SITEMAP.XML
$routes->get('sitemap.xml', 'Home::sitemap');
// with locale
$routes->get('{locale}/about-us', 'Home::aboutUs');
$routes->get('{locale}/services', 'Home::services');
$routes->get('{locale}/services/view', 'Home::serviceView');
$routes->get('{locale}/promotions', 'Home::promotions');
$routes->get('{locale}/promotions/view', 'Home::promotionView');
$routes->get('{locale}/contact-us', 'Home::contactUs');
$routes->get('{locale}/terms-and-conditions', 'Home::termsAndConditions');
$routes->get('{locale}/privacy-policy', 'Home::privacyPolicy');
$routes->get('{locale}/blog', 'Home::blog'); // p=?&tag=?&q=? (page, tag, search)
$routes->get('{locale}/blog/view', 'Home::blogView'); // s=?
$routes->get('verify-wp', 'Home::verifyWP'); /* *** !!! TEMP !!! ****/
$routes->get('{locale}', 'Home::index');
// POST
$routes->post('contact-us', 'Home::contactUsScript');