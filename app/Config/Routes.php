<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');


///////////////////// CUSTOM ROUTES BELOW//////////////////////////////

// auth routes
$routes->get('register', 'Web/User/UsersController::adminNewUserForm');
$routes->post('register', 'Web/User/UsersController::create');
$routes->get('login', 'Web/User/LoginController::index'); //show login form
$routes->post('login', 'Web/User/LoginController::login');


//////////////////  API ROUTES  /////////////////////////
$routes->group("api",[], function($routes){
    // work routes
    $routes->resource('work', ['controller' =>'Api\Work\WorkController']);
    $routes->get('force-delete-work/(:num)', 'Api\Work\WorkController::forceDelete/$id');
    $routes->get('trashed-work', 'Api\Work\WorkController::getTrashedWork');

    // department routes
    $routes->resource('department', ['controller' =>'Api\Department\DepartmentController']);
    $routes->get('force-delete-department/(:num)', 'Api\Department\DepartmentController::forceDelete/$id');
    $routes->get('trashed-department', 'Api\Department\DepartmentController::getTrashedDepartment');

});

///////////  WEB ROUTES  ////////////////////////////////////////////
// admin / user routes
 $routes->group("admin",["filter" => "auth"], function($routes){
    $routes->get('logout', 'Web/User/LoginController::logout');

    // dashboard routes
    $routes->get('dashboard', 'Web/Dashboard/DashboardController::index');

    //users routes
    $routes->post('new-user', 'Web\User\UsersController::adminCreateUser');
    $routes->get('admin-new-user', 'Web\User\UsersController::new');
    $routes->post('admin-new-user', 'Web\User\UsersController::adminCreateUser');
    $routes->get('users/(:alpha)', 'Web\User\UsersController::index/$1');
    $routes->get('edit-user/(:any)', 'Web\User\UsersController::edit/$1');
    $routes->post('update-user/(:any)', 'Web\User\UsersController::update/$1');
    $routes->get('del-user/(:num)', 'Web\User\UsersController::delete/$1');
    $routes->get('trashed-users', 'Web\User\UsersController::getTrashedUsers');
    $routes->get('registration-pending', 'Web\User\UsersController::registrationPending');
    $routes->get('registration-complete', 'Web\User\UsersController::registrationComplete');
    $routes->get('restore-user/(:any)', 'Web\User\UsersController::restoreDeletedUser/$1');
    $routes->get('parmanently-del-user/(:any)', 'Web\User\UsersController::parmanentlyDeleteUser/$1');

 });



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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
