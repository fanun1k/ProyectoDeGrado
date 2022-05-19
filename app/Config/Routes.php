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
$routes->setDefaultController('Login_controller');
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
$routes->get('/', 'Login_controller::index');
$routes->get('/inicio', 'Home_controller::index');
$routes->get('/iniciar_sesion', 'Login_controller::index');
$routes->post('/iniciando_sesion', 'Login_controller::login');
$routes->get('/cerrando_sesion', 'Login_controller::logout');
$routes->post('/recuperando_cuenta', 'Login_controller::recoverPassword');
$routes->get('/recuperar_cuenta', 'Login_controller::recoverPasswordPage');
$routes->post('/cambiar_contrasena', 'Login_controller::changePassword');

/*
 * --------------------------------------------------------------------
 * Gestion Proyectos
 * --------------------------------------------------------------------
 */

 //Gestion Comedores
$routes->get('/gestion_proyectos/gestion_comedores/comedor', 'Dining_area_controller::diningArea');
$routes->get('/gestion_proyectos/gestion_comedores/visualizar_comedores', 'Dining_area_controller::index');
$routes->post('/gestion_proyectos/gestion_comedores/comedor/registrar_comedor', 'Dining_area_controller::registerDiningArea');
$routes->get('/gestion_proyectos/gestion_comedores/visualizar_comedores/eliminar_comedor/(:num)', 'Dining_area_controller::deleteDiningArea/$1');

//Gestion Nutricional
$routes->get('/gestion_nutricional/tabla_nutricional', 'Nutritional_table_controller::index');
$routes->post('/gestion_nutricional/tabla_nutricional/registrar_insumo', 'Nutritional_table_controller::registerNewSupply');
$routes->post('/gestion_nutricional/tabla_nutricional/editar_insumo/(:num)', 'Nutritional_table_controller::updateSupply/$1');
$routes->get('/gestion_nutricional/tabla_nutricional/eliminar_insumo/(:num)', 'Nutritional_table_controller::deleteSupply/$1');


/*
 * --------------------------------------------------------------------
 * Recursos Humanos
 * --------------------------------------------------------------------
 */
$routes->get('/recursos_humanos/personal_de_trabajo','Employee_controller::index');
$routes->post('/recursos_humanos/personal_de_trabajo/registrar_tipo_de_empleado','Employee_controller::registerEmployeeType');
$routes->get('/recursos_humanos/planillas/memorandum','Employee_controller::employeeMemorandum');
$routes->post('/recursos_humanos/planillas/memorandum/registrar_memorandum','Employee_controller::registerEmployeeMemorandum');
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