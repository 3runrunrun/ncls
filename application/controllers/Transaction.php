<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {
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

  /////////////
  // SUBDIST //
  /////////////

  public function subdist()
  {
    $data['subdist_report'] = $this->Subdist_Permintaan_Produk_Detail->get_data_by_distributor('b.id as id_distributor, sum(a.jumlah) as jumlah, upper(b.nama) as nama, upper(c.alias_distributor) as alias_distributor, upper(d.area) as area, upper(d.alias_area) as alias_area');
    $data['distributor'] = $this->Distributor->get_data('a.id, upper(a.nama) as nama, upper(c.alias_area) as alias_area, upper(c.area) as area, upper(b.alias_distributor) as alias_distributor');
    $data['subdist'] = $this->Subdist->get_data('a.id, upper(a.nama) as nama, upper(b.alias_area) as alias_area');
    $data['area'] = $this->Area->get_data('id, upper(area) as area, upper(alias_area) as alias_area');
    $data['produk'] = $this->Produk->get_data('a.id, upper(a.nama) as nama');

    if ($data['subdist_report']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['subdist_report']['data']);
    }

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('transaction/subdist/subdist', $data);
    $this->load->view('footer-js');
  }

  public function subdist_detail($id_distributor)
  {
    $month = date('m');
    $data['subdist_detail'] = $this->Subdist_Permintaan_Produk->get_data_by_dist_month($id_distributor, $month, 'upper(b.nama) as nama, upper(d.nama) as nama_produk, a.tanggal, c.jumlah');
    $data['nama_distributor'] = $this->Distributor->show($id_distributor, 'upper(a.nama) as nama');

    if ($data['subdist_detail']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['subdist_detail']['data']);
    }

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('transaction/subdist/subdist-detail', $data);
    $this->load->view('footer-js');
  }

  public function show_subdist_by_dist_month()
  {
    $id = $this->input->post('id');
    $month = $this->input->post('month');
    $data['subdist_detail'] = $this->Subdist_Permintaan_Produk->get_data_by_dist_month($id, $month, 'upper(b.nama) as nama, upper(d.nama) as nama_produk, date_format(a.tanggal, \'%d-%M-%Y\') as tanggal, c.jumlah');
    echo json_encode($data['subdist_detail']['data']->result_array());

    // show-subdist-by-dist-month
  }

  public function store_subdist($key = null)
  {
    // begin transaction
    $this->db->trans_begin();
    if ($key == 'delete') {
      # code...
    } elseif ($key == 'edit') {
      # code...
    } else {
      $input_var = $this->input->post();
      $input_var['id'] = $this->nsu->digit_id_generator(5, 'sbd');

      $sbd_permintaan = array();
      $sbd_permintaan_detail = array();

      // store permintaan barang subdist
      $sbd_permintaan['id'] = $input_var['id'];
      $sbd_permintaan['id_subdist'] = $input_var['id_subdist'];
      $sbd_permintaan['tanggal'] = $input_var['tanggal'];
      $this->Subdist_Permintaan_Produk->store($sbd_permintaan);

      // store detail barang - permintaan barang subdist
      foreach ($input_var['id_produk'] as $key => $value) {
        $sbd_permintaan_detail['id_permintaan'] = $sbd_permintaan['id'];
        $sbd_permintaan_detail['id_distributor'] = $input_var['id_distributor'];
        $sbd_permintaan_detail['id_produk'] = $value;
        $sbd_permintaan_detail['jumlah'] = $input_var['jumlah'][$key];
        $this->Subdist_Permintaan_Produk_Detail->store($sbd_permintaan_detail);
      }

      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->session->set_flashdata('error_msg', 'Permintaan barang subdist <strong>gagal</strong>.');
      } else {
        // $this->db->trans_rollback();
        $this->db->trans_commit();
        $this->session->set_flashdata('success_msg', 'Permintaan barang subdist <strong>berhasil</strong> disimpan.');
      }
    }

    redirect('/subdist');
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

  ///////////////////////
  // PERMOHONAN BARANG //
  ///////////////////////

  public function permohonan_barang_nucleus()
  {
    $data['no_surat'] = $this->nsu->letter_number_generator('SPB');
    $data['produk'] = $this->Produk->get_data('a.id, a.nama');
    $data['permohonan'] = $this->Permohonan_Produk_Nucleus->get_data('id, tanggal_permohonan, tanggal_target, status');

    if ($data['permohonan']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['permohonan']['data']);
    }

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('transaction/permintaan-barang/nucleus-pabrik', $data);
    $this->load->view('footer-js');
  }

  public function store_permohonan_barang_nucleus($key = NULL)
  {
    // begin transaction
    $this->db->trans_begin();
    if ($key == 'delete') {
      # code...
    } elseif ($key == 'edit') {
      # code...
    } else {
      $input_var = $this->input->post();
      $input_var['id'] = $this->session->flashdata('no_surat');
      $input_var['status'] = strtolower('waiting');
      $permohonan = array();
      $status_permohonan = array();

      // repopulate and store data permohonan
      foreach ($input_var['id_barang'] as $key => $value) {
        $permohonan['id'] = $input_var['id'];
        $permohonan['id_barang'] = $value;
        $permohonan['tanggal_permohonan'] = $input_var['tanggal_permohonan'];
        $permohonan['tanggal_target'] = $input_var['tanggal_target'];
        $permohonan['status'] = $input_var['status'];
        $permohonan['jumlah'] = $input_var['jumlah'][$key];

        $status_permohonan['id_permohonan'] = $permohonan['id'];
        $status_permohonan['id_barang'] = $permohonan['id_barang'];
        $status_permohonan['status'] = $input_var['status'];

        $this->Permohonan_Produk_Nucleus->store($permohonan);
        $this->Status_Permohonan_Produk_Nucleus->store($status_permohonan);
      }

      // var_dump($input_var);
      // die();

      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->session->set_flashdata('error_msg', 'Penambahan data permohonan barang <strong>gagal</strong>.');
      } else {
        $this->db->trans_commit();
        $this->session->set_flashdata('success_msg', 'Data permohonan barang <strong>berhasil</strong> disimpan.');
      }
    }
    redirect('/permohonan-barang-nucleus');
  }
}
