<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| AUTO-LOADER
| -------------------------------------------------------------------
| This file specifies which systems should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default. For example,
| the database is not connected to automatically since no assumption
| is made regarding whether you intend to use it.  This file lets
| you globally define which systems you would like loaded with every
| request.
|
| -------------------------------------------------------------------
| Instructions
| -------------------------------------------------------------------
|
| These are the things you can load automatically:
|
| 1. Packages
| 2. Libraries
| 3. Drivers
| 4. Helper files
| 5. Custom config files
| 6. Language files
| 7. Models
|
*/

/*
| -------------------------------------------------------------------
|  Auto-load Packages
| -------------------------------------------------------------------
| Prototype:
|
|  $autoload['packages'] = array(APPPATH.'third_party', '/usr/local/shared');
|
*/
$autoload['packages'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
| These are the classes located in system/libraries/ or your
| application/libraries/ directory, with the addition of the
| 'database' library, which is somewhat of a special case.
|
| Prototype:
|
|	$autoload['libraries'] = array('database', 'email', 'session');
|
| You can also supply an alternative library name to be assigned
| in the controller:
|
|	$autoload['libraries'] = array('user_agent' => 'ua');
*/
$autoload['libraries'] = array(
  // NUCLEUS LIBARRY -- application/libraries
  'Nucleus_Sales_Utility' => 'nsu',
  
  'database',
  'session',
);

/*
| -------------------------------------------------------------------
|  Auto-load Drivers
| -------------------------------------------------------------------
| These classes are located in system/libraries/ or in your
| application/libraries/ directory, but are also placed inside their
| own subdirectory and they extend the CI_Driver_Library class. They
| offer multiple interchangeable driver options.
|
| Prototype:
|
|	$autoload['drivers'] = array('cache');
|
| You can also supply an alternative property name to be assigned in
| the controller:
|
|	$autoload['drivers'] = array('cache' => 'cch');
|
*/
$autoload['drivers'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['helper'] = array('url', 'file');
*/
$autoload['helper'] = array(
  'form',
);

/*
| -------------------------------------------------------------------
|  Auto-load Config files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['config'] = array('config1', 'config2');
|
| NOTE: This item is intended for use ONLY if you have created custom
| config files.  Otherwise, leave it blank.
|
*/
$autoload['config'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Language files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['language'] = array('lang1', 'lang2');
|
| NOTE: Do not include the "_lang" part of your file.  For example
| "codeigniter_lang.php" would be referenced as array('codeigniter');
|
*/
$autoload['language'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['model'] = array('first_model', 'second_model');
|
| You can also supply an alternative model name to be assigned
| in the controller:
|
|	$autoload['model'] = array('first_model' => 'first');
*/
$autoload['model'] = array(
  'Area',
  'Master_Distributor',
  'Distributor',
  'Subdist',
  'Outlet',
  'User_Account',
  'Jabatan',
  'Detailer',
  'Detailer_Keluarga',
  'Detailer_Anak',
  'Detailer_FF',
  'Customer',
  'Customer_Non',
  'Operasional',
  'Cogm',
  'Cogm_Jenis',
  'Aset',
  // BARANG == PRODUK
  'Produk',
  'stock/nucleus/Barang_Masuk_Nucleus' => 'stokmn',
  'stock/nucleus/Barang_Keluar_Nucleus' => 'stokkn',
  'stock/nucleus/Barang_Stok_Nucleus' => 'stokn',
  'stock/nucleus/Barang_Stok_Bulanan_Nucleus' => 'stokbn',
  'stock/distributor/Barang_Masuk_Distributor' => 'stokmd',
  'stock/distributor/Barang_Keluar_Distributor' => 'stokkd',
  'stock/distributor/Barang_Stok_Distributor' => 'stokd',
  'stock/distributor/Barang_Stok_Bulanan_Distributor' => 'stokbd',
  // TRANSACTION
  'Subdist_Permintaan_Produk',
  'Subdist_Permintaan_Produk_Detail',
  'Wpr',
  'Wpr_Status',
  'Wpr_Detail',
  'Promo_Trial',
  'Promo_Trial_Detail',
  'Promo_Trial_Status',
  'ko/Ko_General' => 'kog',
  'ko/Ko_Tender' => 'kot',
  'ko/All_Ko' => 'ako',
  // -- permohonan produk
  'permohonan_produk/nucleus/Permohonan_Produk_Nucleus' => 'ppn',
  'permohonan_produk/nucleus/Permohonan_Produk_Nucleus_Detail' => 'ppnd',
  'permohonan_produk/nucleus/Permohonan_Produk_Nucleus_Status' => 'ppns',
  'permohonan_produk/distributor/Permohonan_Produk_Distributor' => 'ppd',
  'permohonan_produk/distributor/Permohonan_Produk_Distributor_Detail' => 'ppdd',
  'permohonan_produk/distributor/Permohonan_Produk_Distributor_Status' => 'ppds',
  'Permohonan_Produk_Outlet' => 'ppo',
  'Permohonan_Produk_Outlet_Detail' => 'ppod',
  'Permohonan_Produk_Outlet_Status' => 'ppos',
  // REPORT
  // -- daily sales
  'sales/Sales_Outlet' => 'salo',
  'sales/Sales_Detailer' => 'sald',
  'sales/Sales_Distributor' => 'saldis',
);
