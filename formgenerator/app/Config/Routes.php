<?php

namespace Config;

// Imports
use App\Controllers\TemplateDashboard;
use App\Controllers\UsersDashboard;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('TemplateDashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */


// We get a performance increase by specifying the default
// route since we don't have to scan directories.

/* Template Dashboard */
$routes->get('/', [TemplateDashboard::class, 'index']);                                                         // Base view
$routes->match(['get', 'post'], '/template/create', [TemplateDashboard::class, 'createForm']);                  // View to create a new form template
$routes->get('/template/(:num)', [TemplateDashboard::class, 'readForm']);                                       // View to read a specified form template
$routes->match(['get', 'post'], '/template/update/(:num)', [TemplateDashboard::class, 'updateForm']);           // View to update a specified form template
$routes->get('/template/activate/(:num)', [TemplateDashboard::class, 'activateForm']);                          // View to activate a specified form template
$routes->get('/template/delete/(:num)', [TemplateDashboard::class, 'deleteForm']);                              // View to delete a specified form template
$routes->get('/template/deleteAll/(:num)', [TemplateDashboard::class, 'deleteAllForm']);                        // View to delete all versions of a specified form template

/* User Dashboard */
$routes->get('/users', [UsersDashboard::class, 'index']);
$routes->match(['get', 'post'], '/users/newUser', [UsersDashboard::class, 'newUser']);
$routes->post('/users/submit', 'UsersDashboard::submitForm');
$routes->get('/users/createForm/(:segment)', [UsersDashboard::class, 'createForm']);
$routes->get('/users/(:num)/readForm/(:num)', [UsersDashboard::class, 'readForm']);
$routes->get('/users/(:num)/updateForm/(:num)', [UsersDashboard::class, 'updateForm']);
$routes->get('/users/(:num)/deleteForm/(:num)', [UsersDashboard::class, 'deleteForm']);

/* Testing Routes  */
$routes->get('/form', 'FormController::index');
$routes->get('/new', 'AdminController::index');
$routes->get('/test', 'Sample::index');
use App\Controllers\Survey;

$routes->get('/page', 'Survey::retrieve');
$routes->match(['get', 'post'], 'survey', [Survey::class, 'create']);


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}