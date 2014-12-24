<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "envysea";
$route['404_override'] = '';

//CUSTOMER SUPPLIER
$route['customer-supplier'] = 'customer_supplier';
$route['customer-supplier/new'] = 'customer_supplier/new_customer';
$route['customer-supplier/save'] = 'customer_supplier/save';
$route['customer-supplier/delete/(:any)'] = 'customer_supplier/delete/$1';
$route['customer-supplier/edit/(:any)'] = 'customer_supplier/edit/$1';

// BUSINESS UNIT
$route['business-unit'] = 'business_unit';
$route['business-unit/new'] = 'business_unit/new_unit';
$route['business-unit/save'] = 'business_unit/save';
$route['business-unit/delete/(:any)'] = 'business_unit/delete/$1';
$route['business-unit/edit/(:any)'] = 'business_unit/edit/$1';

// PROJECTS
$route['projects/new'] = 'projects/new_project';

// PRODUCTS
$route['products/new'] = 'products/new_product';

// CONCEPTOS	
$route['conceptos/(:num)'] = 'conceptos/index/$1';
$route['conceptos/new/(:num)'] = 'conceptos/new_concepto/$1';

// CUENTAS	
$route['cuentas/new'] = 'cuentas/new_account';

// GASTOS
$route['gastos/new'] = 'gastos/new_gasto';

$route['pendientes/por-prospecto/(:num)'] = 'pendientes/por_prospecto/$1';
$route['productos'] = 'productos/index/producto';
$route['servicios'] = 'productos/index/servicio';
$route['servicios/nuevo'] = 'productos/nuevo/servicio';
$route['productos/nuevo'] = 'productos/nuevo/producto';

$route['servicios/delete/(:num)'] = 'productos/delete/$1';
$route['servicios/edit/(:num)'] = 'productos/edit/$1';
$route['seguimientos/pp/(:num)'] = 'seguimientos/por_prospecto/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */