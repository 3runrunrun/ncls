<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
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

  /////////////////////////////////
  // EVALUASI ANALISIS BREAKDOWN //
  /////////////////////////////////

  public function analisis_sales_general()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/laporan-sales-med');
    $this->load->view('footer-js');
  }

  public function detail_analisis_sales_general()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/detail-laporan-sales-med');
    $this->load->view('footer-js');
  }

  public function analisis_sales_per_produk()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/laporan-sales-med-per-produk');
    $this->load->view('footer-js');
  }

  public function detail_analisis_sales_per_produk()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/detail-laporan-sales-med-per-produk');
    $this->load->view('footer-js');
  }
  
}

