<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
  public function  __construct(){
    parent:: __construct();
    date_default_timezone_set('Asia/Jakarta');
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

  //////////
  // AREA //
  //////////

  /**
   * Fungsi untuk menampilkan tabel dan form master area
   * @return void
   */
  public function master_area()
  {
    // die();
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('master/area');
    $this->load->view('footer-js');
  }

  public function store_master_area()
  {
    // init variable
    $input_var = $this->input->post();

    // begin transaction
    $this->db->trans_begin();
    $this->area->store($input_var);
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $this->session->flashdata('request_msg', 'Penambahan data area gagal.');
      $url = site_url() . '/master-area';
      header("Location: $url");
    } else {
      $this->db->trans_commit();
      $this->session->flashdata('request_msg', 'Penambahan data area berhasil.');
      $url = site_url() . '/master-area';
      header("Location: $url");
    }
  }

  /**
   * Fungsi untuk menampilkan tabel dan form master produk
   * @return void
   */
  public function master_produk()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('master/produk');
    $this->load->view('footer-js');
  }

  /**
   * Fungsi untuk menampilkan tabel dan form master outlet
   * @return void
   */
  public function master_outlet()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('master/outlet');
    $this->load->view('footer-js');
  }

  /**
   * Fungsi untuk menampilkan tabel dan form master detailer
   * @return void
   */
  public function master_detailer()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('master/detailer');
    $this->load->view('footer-js');
  }

  /**
   * Fungsi untuk menampilkan tabel dan form master customer
   * @return void
   */
  public function master_customer()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('master/customer');
    $this->load->view('footer-js');
  }

  /**
   * Fungsi untuk menampilkan tabel dan form master customer-non
   * @return void
   */
  public function master_customer_non()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('master/customer-non');
    $this->load->view('footer-js');
  }  
}
