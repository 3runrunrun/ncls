<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {
  public function  __construct(){
    parent:: __construct();
    $this->load->helper('url');
    $this->load->library('upload');
    $this->load->library('image_lib');
    error_reporting(0);
  }
  public function index()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('dashboard');
    $this->load->view('footer-js');
  }

  /////////////
  // SUBDIST //
  /////////////

  public function subdist()
  {
    $data['area'] = $this->Area->get_data('id, area, alias_area');
    $data['distributor'] = $this->Distributor->get_data('a.id, upper(b.alias_distributor) as alias_distributor, upper(c.area) as area');

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('transaction/subdist/subdist', $data);
    $this->load->view('footer-js');
  }

  /////////////////////
  // INTENS & EKSTEN //
  /////////////////////

  public function prospek_ineks()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('transaction/prospek-intens-eksten/prospek-intens-eksten');
    $this->load->view('footer-js');
  }

  ////////////////
  // FIXED COST //
  ////////////////

  public function fixed_cost()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('transaction/fixed-cost/fixed-cost');
    $this->load->view('footer-js');
  }

  //////////////////////////////
  // EVALUASI TARGET CUSTOMER //
  //////////////////////////////

  public function evaluasi_target_customer()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('transaction/evaluasi-target-customer/evaluasi-target-customer');
    $this->load->view('footer-js');
  }

  /////////
  // WPR //
  /////////

  public function wpr()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('transaction/wpr/wpr');
    $this->load->view('footer-js');
  }

  /////////////////
  // PROMO TRIAL //
  /////////////////

  public function promo_trial()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('transaction/promo-trial/promo-trial');
    $this->load->view('footer-js');
  }

  ////////////
  // FAKTUR //
  ////////////

  public function daftar_permohonan_factur()
  {
    $data['master_distributor'] = $this->Master_Distributor->get_data('id, alias_distributor');

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('transaction/factur/daftar-permohonan', $data);
    $this->load->view('footer-js');
  }

  /**
   * Fungsi untuk menampilkan tabel dan form permohonan faktur diskon general
   * @return void
   */
  public function factur_discount_general()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('transaction/factur/general');
    $this->load->view('footer-js');
  }

  /**
   * Fungsi untuk menampilkan tabel dan form permohonan faktur diskon tender
   * @return void
   */
  public function factur_discount_tender()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('transaction/factur/tender');
    $this->load->view('footer-js');
  }

  //////////////////////
  // PEMINDAHAN SALES //
  //////////////////////

  public function pemindahan_sales()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('transaction/pemindahan-sales');
    $this->load->view('footer-js');
  }
}
