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
    $data['produk'] = $this->Produk->get_data('id, upper(nama) as nama');

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
    $data['operasional'] = $this->Operasional->get_total_operasional('sum(total) as total');

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
    $data['produk'] = $this->Produk->get_data('id, upper(nama) as nama');

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

    $data['ko_general'] = $this->kog->get_data('a.id, 
      UPPER(b.nama) as nama_detailer, 
      a.tanggal, 
      CASE
      WHEN SUM(d.on_total > 0) AND SUM(d.off_total > 0) THEN "onoff" 
      WHEN SUM(d.on_total < 1) AND SUM(d.off_total > 0) THEN "off"
      WHEN SUM(d.on_total > 0) AND SUM(d.off_total < 1) THEN "on"
      END AS jenis_ko,
      a.tgl_spv,
      a.tgl_rm,
      a.tgl_direktur,
      CASE
      WHEN a.tgl_spv IS NULL AND a.tgl_rm IS NULL AND a.tgl_direktur IS NULL THEN "belum"
      WHEN a.tgl_spv IS NOT NULL AND a.tgl_rm IS NULL AND a.tgl_direktur IS NULL THEN "spv"
      WHEN a.tgl_spv IS NOT NULL AND a.tgl_rm IS NOT NULL AND a.tgl_direktur IS NULL THEN "rm"
      WHEN a.tgl_spv IS NOT NULL AND a.tgl_rm IS NOT NULL AND a.tgl_direktur IS NOT NULL THEN "rilis" END AS status');
    $data['ko_tender'] = $this->kot->get_data('a.id, 
      UPPER(a.sp) as sp, 
      UPPER(b.nama) as nama_detailer, 
      a.tanggal, 
      CASE
      WHEN SUM(d.on_total > 0) AND SUM(d.off_total > 0) THEN "onoff"
      WHEN SUM(d.on_total < 1) AND SUM(d.off_total > 0) THEN "off"
      WHEN SUM(d.on_total > 0) AND SUM(d.off_total < 1) THEN "on"
      END AS jenis_ko,
      a.tgl_spv,
      a.tgl_rm,
      a.tgl_direktur,
      CASE
      WHEN a.tgl_spv IS NULL AND a.tgl_rm IS NULL AND a.tgl_direktur IS NULL THEN "belum"
      WHEN a.tgl_spv IS NOT NULL AND a.tgl_rm IS NULL AND a.tgl_direktur IS NULL THEN "spv"
      WHEN a.tgl_spv IS NOT NULL AND a.tgl_rm IS NOT NULL AND a.tgl_direktur IS NULL THEN "rm"
      WHEN a.tgl_spv IS NOT NULL AND a.tgl_rm IS NOT NULL AND a.tgl_direktur IS NOT NULL THEN "rilis" END AS status');

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
    $data_rows = $this->kog->get_data();
    $rows = $data_rows['data']->num_rows();

    $data['q_faktur'] = $this->nsu->zerofill_generator('4', "$rows");
    $data['detailer'] = $this->Detailer->get_data('a.id, upper(c.alias_area) as alias_area, upper(a.nama) as nama');
    $data['distributor'] = $this->Distributor->get_data('a.id, upper(a.nama) as nama, upper(c.alias_area) as alias_area, upper(c.area) as area, upper(b.alias_distributor) as alias_distributor');
    $data['outlet'] = $this->Outlet->get_data('a.id, upper(a.nama) as nama, upper(d.alias_area) as alias_area');
    $data['produk'] = $this->Produk->get_data('id, nama');

    // die();
    
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('transaction/factur/general', $data);
    $this->load->view('footer-js');
  }

  public function store_ko_general($key = null)
  {
    $this->db->trans_begin();
    if ($key == 'delete') {
      # code...
    } elseif ($key == 'edit') {
      # code...
    } else {
      $input_var = $this->input->post();

      $ko = array();
      $ko_detail = array();
      $ko_onoff = array();
      $ko_onoff_total = array();
      $ko_status = array();

      // ko
      $ko['id'] = $this->session->userdata('id_faktur');
      $this->session->unset_userdata('id_faktur');
      $ko['tahun'] = date('Y');
      $ko['id_detailer'] = $input_var['id_detailer'];
      $ko['tanggal'] = $input_var['tanggal'];
      $ko['id_distributor'] = $input_var['id_distributor'];
      $ko['id_rm'] = $input_var['id_rm'];
      $ko['id_direktur'] = $input_var['id_direktur'];
      // var_dump($ko);
      $this->kog->store($ko);

      // ko detail
      foreach ($input_var['id_outlet'] as $key => $value) {
        $ko_detail['id_ko'] = $ko['id'];
        $ko_detail['id_outlet'] = $value;
        $ko_detail['on_diskon_distributor'] = $input_var['on_diskon_distributor'][$key];
        $ko_detail['on_nf'] = $input_var['on_nf'][$key];
        $ko_detail['on_total'] = $input_var['on_total'][$key];
        $ko_detail['off_diskon_distributor'] = $input_var['off_diskon_distributor'][$key];
        $ko_detail['off_nf'] = $input_var['off_nf'][$key];
        $ko_detail['off_total'] = $input_var['off_total'][$key];
        $ko_detail['id_produk'] = $input_var['id_produk'][$key];
        $ko_detail['jumlah'] = $input_var['jumlah'][$key];
        $ko_detail['keterangan'] = $input_var['keterangan'][$key];
        // var_dump($ko_detail);
        $this->kog->store_detail($ko_detail);
      }

      // ko on off
      foreach ($input_var['cn'] as $key => $value) {
        $ko_onoff['id_ko'] = $ko['id'];
        $ko_onoff['cn'] = $value;
        $ko_onoff['diskon'] = $input_var['diskon'][$key];
        // var_dump($ko_onoff);
        $this->kog->store_onoff($ko_onoff);
      }

      // ko on off total
      $ko_onoff_total['id_ko'] = $ko['id'];
      $ko_onoff_total['total_onoff'] = $input_var['total_onoff'];
      // var_dump($ko_onoff_total);
      $this->kog->store_onoff_total($ko_onoff_total);

      // ko status
      $ko_status['id_ko'] = $ko['id'];
      $ko_status['status'] = strtolower('belum');
      $ko_status['tanggal'] = date('Y-m-d H:i:s');
      // var_dump($ko_status);
      $this->kog->store_status($ko_status);

      // die();

      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->session->set_flashdata('error_msg', 'Permohonan diskon <strong>gagal</strong>.');
      } else {
        $this->db->trans_commit();
        $this->session->set_flashdata('success_msg', 'Faktur KO <strong>berhasil</strong> disimpan.');
      }
    }
    
    redirect('/faktur-diskon-general');
  }

  /**
   * Fungsi untuk menampilkan tabel dan form permohonan faktur diskon tender
   * @return void
   */
  public function factur_discount_tender()
  {
    $data_rows = $this->kot->get_data();
    $rows = $data_rows['data']->num_rows();

    $data['q_faktur'] = $this->nsu->zerofill_generator('4', "$rows");
    $data['detailer'] = $this->Detailer->get_data('a.id, upper(c.alias_area) as alias_area, upper(a.nama) as nama');
    $data['distributor'] = $this->Distributor->get_data('a.id, upper(a.nama) as nama, upper(c.alias_area) as alias_area, upper(c.area) as area, upper(b.alias_distributor) as alias_distributor');
    $data['outlet'] = $this->Outlet->get_data('a.id, upper(a.nama) as nama, upper(d.alias_area) as alias_area');
    $data['produk'] = $this->Produk->get_data('id, nama');

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('transaction/factur/tender', $data);
    $this->load->view('footer-js');
  }

  public function store_ko_tender($key = null)
  {
    $this->db->trans_begin();
    if ($key == 'delete') {
      # code...
    } elseif ($key == 'edit') {
      # code...
    } else {
      $input_var = $this->input->post();

      $ko = array();
      $ko_detail = array();
      $ko_onoff = array();
      $ko_onoff_total = array();
      $ko_status = array();

      // ko
      $ko['id'] = $this->session->userdata('id_faktur_tender');
      $this->session->unset_userdata('id_faktur_tender');
      $ko['tahun'] = date('Y');
      $ko['sp'] = $input_var['sp'];
      $ko['id_detailer'] = $input_var['id_detailer'];
      $ko['tanggal'] = $input_var['tanggal'];
      $ko['id_distributor'] = $input_var['id_distributor'];
      $ko['id_rm'] = $input_var['id_rm'];
      $ko['id_direktur'] = $input_var['id_direktur'];
      // var_dump($ko);
      $this->kot->store($ko);

      // ko detail
      foreach ($input_var['id_outlet'] as $key => $value) {
        $ko_detail['id_ko'] = $ko['id'];
        $ko_detail['id_outlet'] = $value;
        $ko_detail['on_diskon_distributor'] = $input_var['on_diskon_distributor'][$key];
        $ko_detail['on_nf'] = $input_var['on_nf'][$key];
        $ko_detail['on_total'] = $input_var['on_total'][$key];
        $ko_detail['off_diskon_distributor'] = $input_var['off_diskon_distributor'][$key];
        $ko_detail['off_nf'] = $input_var['off_nf'][$key];
        $ko_detail['off_total'] = $input_var['off_total'][$key];
        $ko_detail['id_produk'] = $input_var['id_produk'][$key];
        $ko_detail['jumlah'] = $input_var['jumlah'][$key];
        $ko_detail['keterangan'] = $input_var['keterangan'][$key];
        // var_dump($ko_detail);
        $this->kot->store_detail($ko_detail);
      }

      // ko on off
      foreach ($input_var['cn'] as $key => $value) {
        $ko_onoff['id_ko'] = $ko['id'];
        $ko_onoff['cn'] = $value;
        $ko_onoff['diskon'] = $input_var['diskon'][$key];
        // var_dump($ko_onoff);
        $this->kot->store_onoff($ko_onoff);
      }

      // ko on off total
      $ko_onoff_total['id_ko'] = $ko['id'];
      $ko_onoff_total['total_onoff'] = $input_var['total_onoff'];
      // var_dump($ko_onoff_total);
      $this->kot->store_onoff_total($ko_onoff_total);

      // ko status
      $ko_status['id_ko'] = $ko['id'];
      $ko_status['status'] = strtolower('belum');
      $ko_status['tanggal'] = date('Y-m-d H:i:s');
      // var_dump($ko_status);
      $this->kot->store_status($ko_status);

      // die();

      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->session->set_flashdata('error_msg', 'Permohonan diskon <strong>gagal</strong>.');
      } else {
        $this->db->trans_commit();
        $this->session->set_flashdata('success_msg', 'Faktur KO Tender <strong>berhasil</strong> disimpan.');
      }
    }
    
    redirect('/faktur-diskon-tender');
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

  /**
   * Distributor
   */

  public function permohonan_barang_distributor()
  {
    $data['no_surat'] = $this->nsu->letter_number_generator('DPB');
    $data['produk'] = $this->Produk->get_data('id, nama');
    $data['permohonan'] = $this->ppd->get_data('id, tanggal, status');
    $data['distributor'] = $this->Distributor->get_data('a.id, upper(a.nama) as nama, upper(c.alias_area) as alias_area, upper(c.area) as area, upper(b.alias_distributor) as alias_distributor');

    if ($data['permohonan']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['permohonan']['data']);
    }

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('transaction/permintaan-barang/distributor/distributor-nucleus', $data);
    $this->load->view('footer-js');
  }

  public function store_permohonan_barang_distributor($key = NULL)
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

      $pmh = array();
      $pmh_detail = array();
      $pmh_status = array();
      $produk_area = array();
      $produk_distributor = array();

      $status = strtolower('waiting');
      $result_area = $this->Distributor->show($input_var['id_distributor'], 'id_area');
      $id_area = $result_area['data']->result();

      $pmh = $input_var;
      $pmh['status'] = $status;
      $pmh['tahun'] = date('Y');
      unset($pmh['id_produk']);
      unset($pmh['jumlah']);
      $this->ppd->store($pmh);

      // repopulate and store data permohonan
      foreach ($input_var['id_produk'] as $key => $value) {
        $pmh_detail['id_permohonan'] = $input_var['id'];
        $pmh_detail['id_produk'] = $value;
        $pmh_detail['jumlah'] = $input_var['jumlah'][$key];
        $this->ppdd->store($pmh_detail);

        // check if any produk-area
        // then store data to produk_area
        if ($this->check_if_any_produk_area($value, $id_area[0]->id_area) === FALSE) {
          $produk_area['id_produk'] = $value;
          $produk_area['id_region'] =  $id_area[0]->id_area;
          // var_dump($id_area[0]->id_area);
          // $this->db->trans_rollback();
          // die();
          $this->Produk->store_produk_area($produk_area);
        }
        
        // then store data to produk_distributor
        $produk_distributor['id_distributor'] = $input_var['id_distributor'];
        $produk_distributor['id_produk'] = $value;
        $this->Produk->store_produk_distributor($produk_distributor);
      }

      $pmh_status['id_permohonan'] = $input_var['id'];
      $pmh_status['status'] = $status;
      $pmh_status['tanggal'] = date('Y-m-d H:i:s');
      $this->ppds->store($pmh_status);

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
    redirect('/permohonan-barang-distributor');
  }

  public function check_if_any_produk_area($id_produk, $id_area)
  {
    $flag = TRUE;
    $result = $this->Produk->show_by_produk_area($id_produk, $id_area);
    $row = $result['data']->num_rows();

    if ($row == 0) {
      $flag = FALSE;
    } 

    return $flag;
  }
  
  /**
   * Outlet
   */
  
  public function permohonan_barang_outlet()
  {
    $data['no_surat'] = $this->nsu->letter_number_generator('OPB');
    $data['produk'] = $this->Produk->get_data('id, nama');
    $data['distributor'] = $this->Distributor->get_data('a.id, upper(a.nama) as nama, upper(c.alias_area) as alias_area, upper(c.area) as area, upper(b.alias_distributor) as alias_distributor');
    $data['outlet'] = $this->Outlet->get_data('a.id, upper(a.nama) as nama, upper(d.alias_area) as alias_area');
    $data['permohonan'] = $this->ppo->get_data('id, tanggal, status');

    if ($data['permohonan']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['permohonan']['data']);
    }

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('transaction/permintaan-barang/outlet/outlet-dist', $data);
    $this->load->view('footer-js');
  }

  public function show_area_by_outlet()
  {
    $id = $this->input->post('id');
    $data = $this->Outlet->get_data_area($id, 'a.id_area, upper(b.alias_area) as alias_area, upper(b.area) as area');
    echo json_encode($data['data']->result_array());
  }

  public function show_distributor_by_area()
  {
    $id = $this->input->post('id');
    $data = $this->Distributor->show_by_area($id, 'a.id, upper(c.alias_area) as alias_area, upper(a.nama) as nama, upper(b.alias_distributor) as alias_distributor');
    echo json_encode($data['data']->result_array());
  }

  public function store_permohonan_barang_outlet($key = NULL)
  {
    $this->db->trans_begin();
    if ($key == 'delete') {
      # code...
    } elseif ($key == 'edit') {
      # code...
    } else {
      $input_var = $this->input->post();
      $input_var['id'] = $this->session->userdata('no_surat');
      $this->session->unset_userdata('no_surat');

      // var_dump($input_var);
      // die();

      $pmh = array();
      $pmh_detail = array();
      $pmh_status = array();

      $status = strtolower('waiting');

      $pmh['id'] = $input_var['id'];
      $pmh['id_outlet'] = $input_var['id_outlet'];
      $pmh['id_area'] = $input_var['id_area'];
      $pmh['tahun'] = date('Y');
      $pmh['tanggal'] = $input_var['tanggal'];
      $pmh['status'] = $status;
      $this->ppo->store($pmh);

      foreach ($input_var['id_distributor'] as $key => $value) {
        $pmh_detail['id_permohonan'] = $pmh['id'];
        $pmh_detail['id_distributor'] = $value;
        $pmh_detail['id_produk'] = $input_var['id_produk'][$key];
        $pmh_detail['jumlah'] = $input_var['jumlah'][$key];
        $this->ppod->store($pmh_detail);
      }

      $pmh_status['id_permohonan'] = $pmh['id'];
      $pmh_status['status'] = $status;
      $pmh_status['tanggal'] = date('Y-m-d H:i:s');
      $this->ppos->store($pmh_status);

      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->session->set_flashdata('error_msg', 'Permohonan barang <strong>gagal</strong>.');
      } else {
        $this->db->trans_commit();
        $this->session->set_flashdata('success_msg', 'Permohonan barang <strong>berhasil</strong> disimpan.');
      }
    }
    
    redirect('/permohonan-barang-outlet');
  }
}
