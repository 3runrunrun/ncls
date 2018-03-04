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

$route['master-subdist'] = 'Master/master_subdist';
$route['master-subdist/(:any)'] = 'Master/master_subdist/$1';
$route['store-subdist'] = 'Master/store_master_subdist';
$route['store-subdist/(:any)'] = 'Master/store_master_subdist/$1';

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
$route['master-detailer/(:any)'] = 'Master/master_detailer/$1';
$route['store-detailer'] = 'Master/store_master_detailer';
$route['store-detailer/(:any)'] = 'Master/store_master_detailer/$1';

$route['master-operasional'] = 'Master/master_operasional';
$route['store-operasional'] = 'Master/store_master_operasional';
$route['store-operasional/(:any)'] = 'Master/store_master_operasional/$1';

$route['master-cogm'] = 'Master/master_cogm';
$route['store-cogm'] = 'Master/store_master_cogm';
$route['store-cogm/(:any)'] = 'Master/store_master_cogm/$1';

$route['master-aset'] = 'Master/master_aset';
$route['store-aset'] = 'Master/store_master_aset';
$route['store-aset/(:any)'] = 'Master/store_master_aset/$1';

// TRANSACTION
$route['subdist'] = 'Transaction/subdist';
$route['subdist-detail/(:any)'] = 'Transaction/subdist_detail/$1';
$route['show-subdist-by-dist-month'] = 'Transaction/show_subdist_by_dist_month';
$route['store-subdist'] = 'Transaction/store_subdist';

$route['prospek-ineks'] = 'Transaction/prospek_ineks';
$route['fixed-cost'] = 'Transaction/fixed_cost';
$route['evaluasi-target-customer'] = 'Transaction/evaluasi_target_customer';

$route['wpr'] = 'Transaction/wpr';
$route['wpr-detail/(:any)'] = 'Transaction/wpr/$1';
$route['store-wpr'] = 'Transaction/store_wpr';
$route['store-wpr/(:any)'] = 'Transaction/store_wpr/$1';

$route['promo-trial'] = 'Transaction/promo_trial';
$route['store-pt'] = 'Transaction/store_pt';
$route['store-pt/(:any)'] = 'Transaction/store_pt/$1';

$route['daftar-faktur'] = 'Transaction/daftar_permohonan_factur';
$route['detail-faktur-general/(:any)'] = 'Transaction/detail_permohonan_factur_general/$1';
$route['faktur-diskon-general'] = 'Transaction/factur_discount_general';
$route['store-ko-general'] = 'Transaction/store_ko_general';
$route['store-ko-general/(:any)'] = 'Transaction/store_ko_general/$1';
$route['verifikasi-ko-general'] = 'Transaction/store_verifikasi_faktur_general';

$route['detail-faktur-tender/(:any)'] = 'Transaction/detail_permohonan_factur_tender/$1';
$route['faktur-diskon-tender'] = 'Transaction/factur_discount_tender';
$route['store-ko-tender'] = 'Transaction/store_ko_tender';
$route['store-ko-tender/(:any)'] = 'Transaction/store_ko_tender/$1';
$route['verifikasi-ko-tender'] = 'Transaction/store_verifikasi_faktur_tender';

$route['pemindahan-sales'] = 'Transaction/pemindahan_sales';

/*$route['permohonan-barang-nucleus'] = 'Transaction/permohonan_barang_nucleus';
$route['detail-permohonan-barang-nucleus/(:any)'] = 'Transaction/detail_permohonan_barang_nucleus/$1';
$route['simpan-permohonan-barang-nucleus'] = 'Transaction/store_permohonan_barang_nucleus';
$route['simpan-permohonan-barang-nucleus/(:any)'] = 'Transaction/store_permohonan_barang_nucleus/$1';
$route['show-verifikasi-pbn'] = 'Transaction/show_verifikasi_pbn';
$route['verifikasi-pbn'] = 'Transaction/store_verifikasi_barang_nucleus';*/

$route['permohonan-barang-distributor'] = 'Transaction/permohonan_barang_distributor';
$route['simpan-permohonan-barang-distributor'] = 'Transaction/store_permohonan_barang_distributor';
$route['simpan-permohonan-barang-distributor/(:any)'] = 'Transaction/store_permohonan_barang_distributor/$1';

$route['permohonan-barang-outlet'] = 'Transaction/permohonan_barang_outlet';
$route['show-area-by-outlet'] = 'Transaction/show_area_by_outlet';
$route['show-distributor-by-area'] = 'Transaction/show_distributor_by_area';
$route['simpan-permohonan-barang-outlet'] = 'Transaction/store_permohonan_barang_outlet';
$route['simpan-permohonan-barang-outlet/(:any)'] = 'Transaction/store_permohonan_barang_outlet/$1';

// REPORT
// -- daily sales
$route['daily-sales-product'] = 'Report/daily_sales_produk';
$route['store-daily-sales'] = 'Report/store_daily_sales';
$route['store-daily-sales/(:any)'] = 'Report/store_daily_sales/$1';

$route['daily-sales-outlet'] = 'Report/daily_sales_outlet';
$route['daily-sales-outlet-product/(:any)'] = 'Report/daily_sales_outlet_produk/$1';

// -- stok
$route['stock-produk-nucleus'] = 'Report/stock_produk_nucleus';
$route['detail-permohonan-barang-nucleus/(:any)'] = 'Report/detail_permohonan_barang_nucleus/$1';
$route['simpan-permohonan-barang-nucleus'] = 'Report/store_permohonan_barang_nucleus';
$route['simpan-permohonan-barang-nucleus/(:any)'] = 'Report/store_permohonan_barang_nucleus/$1';
$route['show-verifikasi-pbn'] = 'Report/show_verifikasi_pbn';
$route['verifikasi-pbn'] = 'Report/store_verifikasi_barang_nucleus';

$route['stock-produk-distributor'] = 'Report/stock_produk_distributor';

$route['analisis-sales-general'] = 'Report/analisis_sales_general';
$route['detail-analisis-sales-general'] = 'Report/detail_analisis_sales_general';
$route['analisis-sales-per-produk'] = 'Report/analisis_sales_per_produk';
$route['detail-analisis-sales-per-produk'] = 'Report/detail_analisis_sales_per_produk';


