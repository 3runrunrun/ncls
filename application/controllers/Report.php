<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
  public function  __construct(){
    parent:: __construct();
    $this->session->set_userdata('tahun', '2018');
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

  /////////////////
  // DAILY SALES //
  /////////////////

  public function daily_sales_product()
  {
    $data['outlet'] = $this->Outlet->get_data('a.id, upper(a.nama) as nama, upper(d.alias_area) as alias_area');
    $data['produk'] = $this->Produk->get_data('id, nama');
    $data['dsales_produk'] = $this->salo->get_data_daily_produk('a.id_produk, upper(c.nama) as nama_produk, d.total, d.target, SUM(a.jumlah) as penjualan, a.tanggal');

    if ($data['dsales_produk']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['dsales_produk']['data']);
    }

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/daily-sales/daily-sales-product', $data);
    $this->load->view('footer-js');
  }

  public function daily_sales_outlet()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/daily-sales/daily-sales-outlet');
    $this->load->view('footer-js');
  }

  public function store_daily_sales($key = null)
  {
    $this->db->trans_begin();
    if ($key == 'delete') {
      # code...
    } elseif ($key == 'edit') {
      # code...
    }else {
      $input_var = $this->input->post();

      $sal = array();
      $produk_outlet = array();

      foreach ($input_var['id_produk'] as $key => $value) {
        // check if any produk_outlet
        // jika tidak insert di produk_outlet
        if ($this->check_if_any_produk_outlet($value, $input_var['id_outlet']) === FALSE) {
          $produk_outlet['id_produk'] = $value;
          $produk_outlet['id_outlet'] = $input_var['id_outlet'];
          // var_dump($produk_outlet);
          $this->Produk->store_produk_outlet($produk_outlet);
        } 

        $sal['id'] = $this->nsu->digit_id_generator(5, 'sal');
        $sal['tahun'] = date('Y');
        $sal['id_produk'] = $value;
        $sal['id_outlet'] = $input_var['id_outlet'];
        $sal['tanggal'] = $input_var['tanggal'];
        $sal['jumlah'] = $input_var['jumlah'][$key];
        $sal['target'] = $input_var['target'][$key];
        // var_dump($sal);
        $this->salo->store($sal);
      }

      // var_dump($input_var);
      // die();

      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->session->set_flashdata('error_msg', 'Penambahan daily sales <strong>gagal</strong>.');
      } else {
        $this->db->trans_commit();
        $this->session->set_flashdata('success_msg', 'Daily sales <strong>berhasil</strong> disimpan.');
      }
    }
    
    redirect('/daily-sales-product');
  }

  private function check_if_any_produk_outlet($id_produk, $id_outlet)
  {
    $flag = TRUE;
    $result = $this->Produk->show_by_produk_outlet($id_produk, $id_outlet);
    $row = $result['data']->num_rows();

    if ($row == 0) {
      $flag = FALSE;
    } 

    return $flag;
  }


  public function data_sales_distributor_jenis_product()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/data-sales-distributor-jenis-product');
    $this->load->view('footer-js');
  }
  
  public function stock_produk_pabrik()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/stock-produk/stock_produk_pabrik');
    $this->load->view('footer-js');
  }
  public function stock_produk_nucleus()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/stock-produk/stock_produk_nucleus');
    $this->load->view('footer-js');
  }
  public function analisa_sales($key= null)
  {
    if($key== null){
      $this->load->view('head');
      $this->load->view('navbar');
      $this->load->view('report/analisa_sales');
      $this->load->view('footer-js');
    }else{
      $this->load->view('head');
      $this->load->view('navbar');
      $this->load->view('report/analisa_sales_sales');
      $this->load->view('footer-js');

    }
  }
  public function pemindahan_sales()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/pemindahan_sales');
    $this->load->view('footer-js');
  }
  public function klm_dana()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/daily-sales-product');
    $this->load->view('footer-js');
  }
  public function klm_sales()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/daily-sales-product');
    $this->load->view('footer-js');
  }
  public function donasi()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/donasi');
    $this->load->view('footer-js');
  }
  public function actual_sales()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/actual_sales');
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

