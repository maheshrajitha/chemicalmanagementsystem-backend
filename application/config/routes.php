<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Auth_Controller';
$route['404_override'] = '';
$route['admin'] = 'Admin_Controller';
$route['admin/logout'] = 'Auth_Controller/logout';
$route['admin/suppliers/(:any)'] = 'Supplier_Controller/index/$1';
$route['admin/chemicals/(:any)'] = 'Chemical_Controller/index/$1';
$route['admin/search-chemicals/(:any)'] = 'Chemical_Controller/search_fixed_chemicals/$1';
$route['admin/suppliers/search-suppliers/(:any)'] = 'Supplier_Controller/search_supplier_name/$1';
$route['admin/customers/(:any)'] = 'Customer_Controller/index/$1';
$route['admin/settings'] = 'Settings_Controller';
$route['admin/sales'] = 'Sales_Controller';
$route['admin/check-chemical-availability/(:any)'] = 'Chemical_Controller/check_chemical_availability/$1';
$route['user/signup'] = 'User_Controller';
$route['admin/sales/chemical/(:any)'] = 'Sales_Controller/put_an_order/$1';
$route['admin/employees/(:any)'] = 'Employees_Controller/index/$1';
$route['admin/employees/check-by-contact-number/(:any)'] = 'Employees_Controller/check_employee_by_contact_number/$1';
$route['translate_uri_dashes'] = FALSE;
