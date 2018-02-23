<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {
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
    $data['promosi'] = $this->Wpr_Detail->get_promosi('sum(a.dana) as promosi');
    $data['cogm'] = $this->Cogm->get_total_cogm('sum(biaya) as cogm');

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('transaction/fixed-cost/fixed-cost', $data);
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
    $data['wpr_approved'] = $this->Wpr->get_data_approved('a.id, upper(a.no_wpr) as no_wpr, upper(f.nama) as nama_detailer, sum(d.dana) as dana, a.status');
    $data['wpr_new'] = $this->Wpr->get_data_waiting('a.id, upper(a.no_wpr) as no_wpr, upper(f.nama) as nama_detailer, sum(d.dana) as dana, a.status');

    $data['user_customer'] = $this->Customer->get_data_user('a.id, upper(a.nama) as nama, upper(b.alias_area) as alias_area');
    $data['detailer'] = $this->Detailer->get_data('a.id, upper(c.alias_area) as alias_area, upper(a.nama) as nama');

    if ($data['wpr_approved']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['wpr_approved']['data']);
    }
    if ($data['wpr_new']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['wpr_new']['data']);
    }

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('transaction/wpr/wpr', $data);
    $this->load->view('footer-js');
  }

  public function wpr_detail($id)
  {
    $data['wpr'] = $this->Wpr->get_data_approved('a.id, upper(a.no_wpr) as no_wpr, upper(b.nama) as nama_outlet, upper(c.nama) as nama_user, upper(c.spesialis) as spesialis, sum(d.dana) as dana, a.status');

    if ($data['wpr']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['wpr']['data']);
    }

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('transaction/wpr/wpr-detail', $data);
    $this->load->view('footer-js');
  }

  public function store_wpr($key = NULL)
  {
    // begin transaction
    $this->db->trans_begin();
    if ($key == 'delete') {
      # code...
    } elseif ($key == 'edit') {
      # code...
    } elseif ($key == 'approve') {
      $id = $this->input->post('id');
      $no_wpr = $this->input->post('no_wpr');

      $this->approve_wpr($id, $no_wpr);
      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->session->set_flashdata('error_msg', 'Proses persetujuan WPR <strong>gagal</strong>.');
      } else {
        // $this->db->trans_rollback();
        $this->db->trans_commit();
        $this->session->set_flashdata('success_msg', 'WPR <strong>disetujui</strong>.');
      }
    } else {
      $input_var = $this->input->post();
      $input_var['id'] = $this->nsu->digit_id_generator('4', 'wpr');
      $input_var['no_wpr'] = $input_var['prefix'] . $this->session->userdata('no_wpr');
      unset($input_var['prefix']);
      $this->session->unset_userdata('no_wpr');

      $wpr = array();
      $wpr_status = array();
      $wpr_detail = array();

      $status = 'waiting';

      // var_dump($input_var);
      // echo $input_var['no_wpr'];
      // die();

      // insert to table wpr
      $wpr['id'] = $input_var['id'];
      $wpr['no_wpr'] = $input_var['no_wpr'];
      $wpr['tahun'] = date('Y');
      $wpr['id_detailer'] = $input_var['id_detailer'];
      $wpr['keterangan'] = $input_var['keterangan'];
      $wpr['status'] = $status;
      $this->Wpr->store($wpr);

      // insert to table wpr_status
      $wpr_status['id_wpr'] = $wpr['id'];
      $wpr_status['no_wpr'] = $wpr['no_wpr'];
      $wpr_status['status'] = $status;
      $wpr_status['tanggal'] = date('Y-m-d H:i:s');
      $this->Wpr_Status->store($wpr_status);

      // insert to table wpr_detail
      foreach ($input_var['dana'] as $key => $value) {
        $wpr_detail['id_wpr'] = $wpr['id'];
        $wpr_detail['no_wpr'] = $wpr['no_wpr'];
        $wpr_detail['id_user'] = $input_var['id_user'][$key];
        $wpr_detail['bank'] = $input_var['bank'][$key];
        $wpr_detail['no_rekening'] = $input_var['no_rekening'][$key];
        $wpr_detail['atas_nama'] = $input_var['atas_nama'][$key];
        $wpr_detail['dari'] = $input_var['dari'][$key];
        $wpr_detail['sampai'] = $input_var['sampai'][$key];
        $wpr_detail['dana'] = $value;
        $this->Wpr_Detail->store($wpr_detail);
      }

      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->session->set_flashdata('error_msg', 'Pengajuan WPR <strong>gagal</strong>.');
      } else {
        // $this->db->trans_rollback();
        $this->db->trans_commit();
        $this->session->set_flashdata('success_msg', 'Pengajuan WPR <strong>berhasil</strong> disimpan.');
      }
    }
    
    redirect('/wpr');
  }

  public function approve_wpr($id, $no_wpr)
  {
    $wpr_status = array();

    $wpr_status['id_wpr'] = $id;
    $wpr_status['no_wpr'] = $no_wpr;
    $wpr_status['status'] = 'approve';
    $wpr_status['tanggal'] = date('Y-m-d H:i:s');

    $this->Wpr_Status->store($wpr_status);
    $this->Wpr->update($id, array('status' => $wpr_status['status']));
  }

  /////////////////
  // PROMO TRIAL //
  /////////////////

  public function promo_trial()
  {
    $data['promo_approved'] = $this->Promo_Trial->get_data_approved('a.id, upper(a.no_promo) as no_promo, upper(b.nama) as nama_detailer, upper(c.nama) as nama_user, a.status');
    $data['promo_waiting'] = $this->Promo_Trial->get_data_waiting('a.id, upper(a.no_promo) as no_promo, upper(b.nama) as nama_detailer, upper(c.nama) as nama_user, a.status');

    $data['user_customer'] = $this->Customer->get_data_user('a.id, upper(a.nama) as nama, upper(b.alias_area) as alias_area');
    $data['detailer'] = $this->Detailer->get_data('a.id, upper(c.alias_area) as alias_area, upper(a.nama) as nama');
    $data['produk'] = $this->Produk->get_data('a.id, upper(a.nama) as nama');

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('transaction/promo-trial/promo-trial', $data);
    $this->load->view('footer-js');
  }

  public function store_pt($key = NULL)
  {
    // begin transaction
    $this->db->trans_begin();
    if ($key == 'delete') {
      # code...
    } elseif ($key == 'edit') {
      # code...
    } elseif ($key == 'approve') {
      $id = $this->input->post('id');
      $no_promo = $this->input->post('no_promo');

      $this->approve_pt($id, $no_promo);
      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->session->set_flashdata('error_msg', 'Proses persetujuan promo <strong>gagal</strong>.');
      } else {
        // $this->db->trans_rollback();
        $this->db->trans_commit();
        $this->session->set_flashdata('success_msg', 'Promo <strong>disetujui</strong>.');
      }
    } else {
      $input_var = $this->input->post();
      $input_var['id'] = $this->nsu->digit_id_generator('4', 'fpt');
      $input_var['no_promo'] =$this->session->userdata('no_promo');
      $this->session->unset_userdata('no_promo');

      $pt = array();
      $pt_status = array();
      $pt_detail = array();

      $status = 'waiting';

      // var_dump($input_var);
      // echo $input_var['no_promo'];
      // die();

      // insert to table wpr
      $pt['id'] = $input_var['id'];
      $pt['no_promo'] = $input_var['no_promo'];
      $pt['tahun'] = date('Y');
      $pt['id_detailer'] = $input_var['id_detailer'];
      $pt['id_user'] = $input_var['id_user'];
      $pt['status'] = $status;
      $this->Promo_Trial->store($pt);

      // insert to table wpr_status
      $pt_status['id_promo_trial'] = $pt['id'];
      $pt_status['no_promo'] = $pt['no_promo'];
      $pt_status['status'] = $status;
      $pt_status['tanggal'] = date('Y-m-d H:i:s');
      $this->Promo_Trial_Status->store($pt_status);

      // insert to table wpr_detail
      foreach ($input_var['id_produk'] as $key => $value) {
        $pt_detail['id_promo_trial'] = $pt['id'];
        $pt_detail['no_promo'] = $pt['no_promo'];
        $pt_detail['id_produk'] = $value;
        $pt_detail['jumlah'] = $input_var['jumlah'][$key];
        $this->Promo_Trial_Detail->store($pt_detail);
      }

      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->session->set_flashdata('error_msg', 'Pengajuan Promo Trial <strong>gagal</strong>.');
      } else {
        // $this->db->trans_rollback();
        $this->db->trans_commit();
        $this->session->set_flashdata('success_msg', 'Pengajuan Promo Trial <strong>berhasil</strong> disimpan.');
      }
    }
    
    redirect('/promo-trial');
  }

  public function approve_pt($id, $no_promo)
  {
    $pt_status = array();

    $pt_status['id_promo_trial'] = $id;
    $pt_status['no_promo'] = $no_promo;
    $pt_status['status'] = 'approve';
    $pt_status['tanggal'] = date('Y-m-d H:i:s');

    $this->Promo_Trial_Status->store($pt_status);
    $this->Promo_Trial->update($id, array('status' => $pt_status['status']));
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
