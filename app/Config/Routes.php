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
$routes->get('/prueba_de_qr', 'QR_test_controller::index');

/*
 * --------------------------------------------------------------------
 * Gestion Proyectos
 * --------------------------------------------------------------------
 */

/*
 * --------------------------------------------------------------------
 * Gestion Comedores
 * --------------------------------------------------------------------
 */
$routes->get('/gestion_proyectos/gestion_comedores/comedor', 'Dining_area_controller::diningArea');
$routes->get('/gestion_proyectos/gestion_comedores/visualizar_comedores', 'Dining_area_controller::index');
$routes->post('/gestion_proyectos/gestion_comedores/comedor/registrar_comedor', 'Dining_area_controller::registerDiningArea');
$routes->get('/gestion_proyectos/gestion_comedores/visualizar_comedores/eliminar_comedor/(:num)', 'Dining_area_controller::deleteDiningArea/$1');
$routes->get('/gestion_proyectos/gestion_comedores/getFoodTimes', 'Dining_area_controller::getFoodTimes');
$routes->post('/gestion_proyectos/gestion_comedores/crudFoodTimes', 'Dining_area_controller::crudFoodTimes');

/*
 * --------------------------------------------------------------------
 * Gestion Nutricional
 * --------------------------------------------------------------------
 */
$routes->get('/gestion_nutricional/tabla_nutricional', 'Nutritional_table_controller::index');
$routes->get('/gestion_nutricional/getSupplyTable', 'Nutritional_table_controller::getSupplyTable');
$routes->post('/gestion_nutricional/crudSupply', 'Nutritional_table_controller::crudSupply');
$routes->get('/gestion_nutricional/getOptionsSupplyType', 'Nutritional_table_controller::getOptionsSupplyType');


/*
 * --------------------------------------------------------------------
 * Recursos Humanos
 * --------------------------------------------------------------------
 */
$routes->get('/recursos_humanos/personal_de_trabajo','Employee_controller::index');
$routes->post('/recursos_humanos/personal_de_trabajo/registrar_tipo_de_empleado','Employee_controller::registerEmployeeType');
$routes->get('/recursos_humanos/planillas/memorandum','Employee_controller::employeeMemorandum');
$routes->post('/recursos_humanos/planillas/memorandum/registrar_memorandum','Employee_controller::registerEmployeeMemorandum');
$routes->get('/recursos_humanos/planillas/permisos_vacaciones','Employee_controller::employeePermit');
$routes->post('/recursos_humanos/planillas/permisos_vacaciones/registrar_permiso_vacacion','Employee_controller::registerEmployeePermit');
$routes->get('/recursos_humanos/empleados/perfil_empleado', 'Employee_controller::showEmployeeProfile');
$routes->get('/recursos_humanos/empleados','Employee_controller::listEmployees');
$routes->post('/recursos_humanos/empleados/eliminar_empleado/(:num)', 'Employee_controller::deleteEmployee/$1');
$routes->get('/recursos_humanos/empleados/nuevo_registro', 'Employee_controller::registerEmployeeView');
$routes->post('/recursos_humanos/empleados/nuevo_registro/registrar_empleado', 'Employee_controller::registerEmployee');
$routes->post('/recursos_humanos/empleados/actualizar_nombre', 'Employee_controller::updateEmployeeName');
$routes->post('/recursos_humanos/empleados/actualizar_primer_apellido', 'Employee_controller::updateEmployeeLastName1');
$routes->post('/recursos_humanos/empleados/actualizar_segundo_apellido', 'Employee_controller::updateEmployeeLastName2');
$routes->post('/recursos_humanos/empleados/actualizar_numero_telefonico', 'Employee_controller::updateEmployeePhoneNumber');
$routes->post('/recursos_humanos/empleados/actualizar_carnet', 'Employee_controller::updateEmployeeCI');
$routes->post('/recursos_humanos/empleados/actualizar_genero', 'Employee_controller::updateEmployeeGender');
$routes->post('/recursos_humanos/empleados/actualizar_fecha_de_nacimiento', 'Employee_controller::updateEmployeeDateOfBirth');

/*
 * --------------------------------------------------------------------
 * Gestion de Clientes
 * --------------------------------------------------------------------
 */
$routes->get('/gestion_proyectos/gestion_de_clientes/lista_de_clientes','Client_list_controller::index');
$routes->get('/gestion_proyectos/gestion_de_clientes/getClients','Client_list_controller::getClients');
$routes->post('/gestion_proyectos/gestion_de_clientes/crudClient','Client_list_controller::crudClient');

/*
 * --------------------------------------------------------------------
 * Gestion de Proveedores
 * --------------------------------------------------------------------
 */
$routes->get('/aprovisionamiento/proveedores/lista_proveedores','Supplier_controller::index');
$routes->post('/aprovisionamiento/proveedores/lista_proveedores/registrar_proveedor', 'Supplier_controller::registerSupplier');
$routes->post('/aprovisionamiento/proveedores/lista_proveedores/editar_proveedor/(:num)', 'Supplier_controller::updateSupplier/$1');
$routes->get('/aprovisionamiento/proveedores/lista_proveedores/eliminar_proveedor/(:num)', 'Supplier_controller::deleteSupplier/$1');

/*
 * --------------------------------------------------------------------
 * Gestion de Contabilidad
 * --------------------------------------------------------------------
 */
$routes->get('/contabilidad/caja_chica','Accounting_controller::index');
$routes->get('/contabilidad/costos_fijos','Accounting_controller::fixedCost');
$routes->get('/contabilidad/costos_variables','Accounting_controller::variableCost');
$routes->post('/contabilidad/retirar_caja_chica','Accounting_controller::withdrawPettyCash');
$routes->post('/contabilidad/depositar_caja_chica','Accounting_controller::depositPettyCash');

/*
 * --------------------------------------------------------------------
 * Aprovisionamiento
 * --------------------------------------------------------------------
 */
$routes->get('/aprovisionamiento/productos','Products_list_controller::index');
$routes->get('/aprovisionamiento/productos/getProducts','Products_list_controller::getProducts');
$routes->get('/aprovisionamiento/productos/getOptionsProductCategory','Products_list_controller::getOptionsProductCategory');
$routes->post('/aprovisionamiento/productos/crudProduct','Products_list_controller::crudProduct');

/*
 * --------------------------------------------------------------------
 * Pedidos
 * --------------------------------------------------------------------
 */
/*
* Pedidos Productos
*/
$routes->get('/aprovisionamiento/pedidos/pedido_productos','Order_controller::index');
/*
* Pedidos Insumos
*/
$routes->get('/aprovisionamiento/pedidos/pedido_insumos','Order_controller::indexSupply');

/*
 * --------------------------------------------------------------------
 * Ventas
 * --------------------------------------------------------------------
 */
$routes->get('/ventas/realizar_venta','Make_sale_controller::index');
$routes->post('/ventas/procesando_venta','Make_sale_controller::insertSale');
$routes->get('/ventas/get_products','Make_sale_controller::getProductsForSale');
$routes->get('/ventas/anular_ventas','Cancel_sale_controller::index');
$routes->get('/ventas/getSales','Cancel_sale_controller::getSales');
$routes->get('/ventas/getSaleDetails/(:num)','Cancel_sale_controller::getSaleDetails/$1');
$routes->post('/ventas/cancel_sale','Cancel_sale_controller::cancel_sale');


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