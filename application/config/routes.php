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
$route['default_controller'] = 'Admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// MASTER
$route['master-area'] = 'Master/master_area';
$route['store-area'] = 'Master/store_master_area';

$route['master-distributor'] = 'Master/master_distributor';
$route['store-m-distributor'] = 'Master/store_core_distributor';
$route['store-distributor'] = 'Master/store_master_distributor';

$route['master-customer'] = 'Master/master_customer';
$route['master-customer/(:any)'] = 'Master/master_customer/$1';
$route['show-customer-by-area'] = 'Master/show_customer_by_area';
$route['store-customer/(:any)'] = 'Master/store_master_customer/$1';

$route['master-produk'] = 'Master/master_produk';
$route['store-produk/(:any)'] = 'Master/store_master_produk/$1';

$route['master-stok'] = 'Master/master_stok';
$route['master-stok/(:any)'] = 'Master/master_stok/$1';
$route['store-stok'] = 'Master/store_master_stok';

$route['master-outlet'] = 'Master/master_outlet';
$route['master-outlet/(:any)'] = 'Master/master_outlet/$1';
$route['show-distributor-by-area'] = 'Master/show_distributor_by_area';
$route['show-detailer-by-area'] = 'Master/show_detailer_by_area';
$route['show-outlet-by-dist-area'] = 'Master/show_outlet_by_dist_area';
$route['store-outlet'] = 'Master/store_master_outlet';

$route['master-customer-non'] = 'Master/master_customer_non';
$route['master-customer-non/(:any)'] = 'Master/master_customer_non/$1';
$route['show-customer-non-by-area'] = 'Master/show_customer_non_by_area';
$route['store-customer-non/(:any)'] = 'Master/store_master_customer_non/$1';

$route['master-detailer'] = 'Master/master_detailer';
$route['store-detailer'] = 'Master/store_master_detailer';

// TRANSACTION
$route['subdist'] = 'Transaction/subdist';
$route['prospek-ineks'] = 'Transaction/prospek_ineks';
$route['fixed-cost'] = 'Transaction/fixed_cost';
$route['evaluasi-target-customer'] = 'Transaction/evaluasi_target_customer';
$route['wpr'] = 'Transaction/wpr';
$route['promo-trial'] = 'Transaction/promo_trial';

$route['daftar-faktur'] = 'Transaction/daftar_permohonan_factur';
$route['faktur-diskon-general'] = 'Transaction/factur_discount_general';
$route['faktur-diskon-tender'] = 'Transaction/factur_discount_tender';
