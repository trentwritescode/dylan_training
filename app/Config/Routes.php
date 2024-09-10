<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->get('/cta.js', 'CTAsPublicAPI::js');

// CTA routes
// App routes
$routes->get('/', 'CTAs::list');
$routes->get('/CTAs/list', 'CTAs::list');
$routes->get('/CTAs/newLightbox', 'CTAs::newLightbox');
$routes->get('/CTAs/newModal', 'CTAs::newModal');
$routes->get('/CTAs/newBanner', 'CTAs::newBanner');
$routes->get('/CTAs/newBug', 'CTAs::newBug');
$routes->get('/CTAs/dashboard/(:alphanum)', 'CTAs::dashboard/$1');

// API routes
$routes->get('/api/CTAs', 'CTAsAPI::get');
$routes->get('/api/CTAs/(:alphanum)', 'CTAsAPI::get/$1');
$routes->get('/api/Websites/(:alphanum)/CTAs', 'CTAsPublicAPI::getWebsiteCTAs/$1');
$routes->delete('/api/CTAs/(:alphanum)', 'CTAsAPI::delete/$1');
$routes->post('/api/CTAs', 'CTAsAPI::create');
$routes->post('/api/CTAs/savePriorities', 'CTAsAPI::savePriorities');
$routes->get('/api/CTAs/publish/(:alphanum)', 'CTAsAPI::publish/$1');
$routes->get('/api/CTAs/unpublish/(:alphanum)', 'CTAsAPI::unpublish/$1');

// Events routes
$routes->get('Events/stats/(:alphanum)/(:any)/(:any)', 'Events::stats/$1/$2/$3');
$routes->post('/Events/event', 'Events::event');

// Users routes
// App routes
$routes->get('/Users/list', 'Users::list');
$routes->get('/Users/create', 'Users::create');

// API routes
$routes->get('/api/Users', 'UsersAPI::get');
$routes->get('/api/Users/(:alphanum)', 'UsersAPI::get/$1');
$routes->delete('/api/Users/(:alphanum)', 'UsersAPI::delete/$1');
$routes->post('/api/Users', 'UsersAPI::create');

// Clients routes
// App routes
$routes->get('/Clients/list', 'Clients::list');
$routes->get('/Clients/create', 'Clients::create');

// API routes
$routes->get('/api/Clients', 'ClientsAPI::get');
$routes->get('/api/Clients/(:alphanum)', 'ClientsAPI::get/$1');
$routes->delete('/api/Clients/(:alphanum)', 'ClientsAPI::delete/$1');
$routes->post('/api/Clients', 'ClientsAPI::create');

// Websites routes
// App routes
$routes->get('/Websites/list', 'Websites::list');
$routes->get('/Websites/create', 'Websites::create');
$routes->get('/Websites/embedCode/(:alphanum)/(:alphanum)', 'Websites::embedCode/$1/$2');
$routes->get('/Websites/priorities/(:alphanum)', 'Websites::priorities/$1');

// API routes
$routes->get('/api/Websites', 'WebsitesAPI::get');
$routes->get('/api/Websites/(:alphanum)', 'WebsitesAPI::get/$1');
$routes->delete('/api/Websites/(:alphanum)', 'WebsitesAPI::delete/$1');
$routes->post('/api/Websites', 'WebsitesAPI::create');

// Auth routes
$routes->get('/Auth/login', 'Auth::index');
$routes->post('/Auth/login', 'Auth::login');
$routes->post('/Auth/verify', 'Auth::verify');
$routes->get('/Auth/logout', 'Auth::logout');

$routes->get('/google/login', 'Google::login');
$routes->get('/google/callback', 'Google::callback');
$routes->get('/google/events', 'Google::events');
$routes->get('/google/event-data', 'Google::eventData');
$routes->get('/google/getPropertyIds', 'Google::getPropertyIds');

// Example Routes
$routes->get('/Examples/animal_welfare', 'Examples::animalWelfare');
$routes->get('/Examples/animal_welfare/adopt', 'Examples::adopt');
$routes->get('/Examples/animal_welfare/volunteer', 'Examples::volunteer');
$routes->get('/Examples/animal_welfare/thank_you', 'Examples::thankYou');
$routes->get('/Examples/rescue_mission', 'Examples::rescueMission');
$routes->get('/Examples/food_bank', 'Examples::foodBank');
$routes->get('/Examples/seed', 'Examples::seedExampleData');