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
    $data['area'] = $this->area->get_data();

    if ($data['area']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['area']['data']);
    }
    // var_dump($this->session->flashdata('query_msg'));
    // die();
    
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('master/area', $data);
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
      $this->session->set_flashdata('error_msg', 'Penambahan data area <strong>gagal</strong>.');
      $url = site_url() . '/master-area';
      header("Location: $url");
    } else {
      $this->db->trans_commit();
      $this->session->set_flashdata('success_msg', 'Data area baru <strong>berhasil</strong> disimpan.');
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

  ////////////
  // OUTLET //
  ////////////

  /**
   * Fungsi untuk menampilkan tabel dan form master outlet
   * @return void
   */
  public function master_outlet()
  {
    $data['outlet'] = $this->outlet->get_data('prefix_id, a.id, a.nama as nama_outlet, alamat, kota, npwp, segmen, dispensing, b.area as area_ptkp, b.alias_area as alias_area_ptkp, d.area as area_ppg, d.alias_area as alias_area_ppg, c.nama as nama_detailer, date_format(a.periode, \'%m-%Y\') as periode');
    $data['area'] = $this->area->get_data();
    $data['detailer'] = $this->detailer->get_data('a.id, a.nama');

    if ($data['outlet']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['outlet']['data']);
    }

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('master/outlet', $data);
    $this->load->view('footer-js');
  }

  public function show_outlet_by_dist_area()
  {
    // $_POST['id_area'] = '01';
    // $_POST['distributor'] = 'ptkp';
    $input_var = $this->input->post();
    $data['outlet'] = $this->outlet->show_by_dist_area($input_var['id_area'], $input_var['distributor'], 'prefix_id, a.id, a.nama as nama_outlet, alamat, kota, npwp, segmen, dispensing, b.area as area_ptkp, b.alias_area as alias_area_ptkp, d.area as area_ppg, d.alias_area as alias_area_ppg, c.nama as nama_detailer, date_format(a.periode, \'%m-%Y\') as periode');
    echo json_encode($data['outlet']['data']->result_array());
  }

  /**
   * Fungsi untuk menambah data outlet
   * @return void
   */
  public function store_master_outlet()
  {
    // init variable
    $input_var = $this->input->post();

    // begin transaction
    $this->db->trans_begin();
    $this->outlet->store($input_var);
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $this->session->set_flashdata('error_msg', 'Penambahan data outlet <strong>gagal</strong>.');
      $url = site_url() . '/master-outlet';
      header("Location: $url");
    } else {
      $this->db->trans_commit();
      $this->session->set_flashdata('success_msg', 'Data outlet baru <strong>berhasil</strong> disimpan.');
      $url = site_url() . '/master-outlet';
      header("Location: $url");
    }
  }

  //////////////
  // DETAILER //
  //////////////

  /**
   * Fungsi untuk menampilkan tabel dan form master detailer
   * @return void
   */
  public function master_detailer()
  {
    $data['detailer'] = $this->detailer->get_data("a.id, a.nama, case a.tanggal_lahir when '0' then '-' else a.tanggal_lahir end as tanggal_lahir, case a.tanggal_masuk when '0' then '-' else a.tanggal_masuk end as tanggal_masuk, case a.tanggal_mutasi when '0' then '-' else a.tanggal_mutasi end as tanggal_mutasi, case a.tanggal_keluar when '0' then '-' else a.tanggal_keluar end as tanggal_keluar, a.keterangan, c.area, a.agama, a.golongan, a.subarea, d.nama as nama_spv, e.nama as nama_rm, f.nama as nama_rsm, g.nama as nama_rm_old");
    // die();
    $data['area'] = $this->area->get_data();
    $data['jabatan'] = $this->jabatan->get_data();
    $data['supervisor'] = $this->detailer->get_data_by_jabatan('spv', 'a.id, a.nama, a.id_jabatan');
    $data['rm'] = $this->detailer->get_data_by_jabatan('rm', 'a.id, a.nama, a.id_jabatan');
    $data['rsm'] = $this->detailer->get_data_by_jabatan('rsm', 'a.id, a.nama, a.id_jabatan');
    $data['rm_lama'] = $this->detailer->get_data_by_jabatan('rm', 'a.id, a.nama, a.id_jabatan');

    if ($data['detailer']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['detailer']['data']);
    }

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('master/detailer', $data);
    $this->load->view('footer-js');
  }

  public function store_master_detailer()
  {
    // init variable
    $input_var = $this->input->post();
    $detailer_var = array();
    $detailer_keluarga_var = array();
    $detailer_anak_var = array();
    $user_account_var = array();

    // repopulating variable
    $username = explode(' ', $input_var['nama']);
    $user_account_var['username'] = strtolower($username[0]);
    $user_account_var['password'] = $this->nsu->password_generator(8); // cek libary "nsu" di folder application/libraries
    $user_account_var['jenis'] = $input_var['id_jabatan'];

    $detailer_var['id'] = $input_var['id'];
    $detailer_var['id_area'] = $input_var['id_area'];
    $detailer_var['id_jabatan'] = $input_var['id_jabatan'];
    $detailer_var['nama'] = $input_var['nama'];
    $detailer_var['tanggal_lahir'] = $input_var['tanggal_lahir'];
    $detailer_var['tanggal_masuk'] = $input_var['tanggal_masuk'];
    $detailer_var['tanggal_mutasi'] = $input_var['tanggal_mutasi'];
    $detailer_var['tanggal_keluar'] = $input_var['tanggal_keluar'];
    $detailer_var['agama'] = $input_var['agama'];
    $detailer_var['golongan'] = $input_var['golongan'];
    $detailer_var['subarea'] = $input_var['subarea'];
    $detailer_var['kode_supervisor'] = $input_var['kode_supervisor'];
    $detailer_var['kode_rm'] = $input_var['kode_rm'];
    $detailer_var['kode_rsm'] = $input_var['kode_rsm'];
    $detailer_var['kode_rm_old'] = $input_var['kode_rm_old'];
    $detailer_var['status'] = 'on';
    $detailer_var['ktp'] = $input_var['ktp'];
    $detailer_var['jenis_kelamin'] = $input_var['jenis_kelamin'];
    $detailer_var['tempat_lahir'] = $input_var['tempat_lahir'];
    $detailer_var['kewarganegaraan'] = $input_var['kewarganegaraan'];
    $detailer_var['pendidikan_terakhir'] = $input_var['pendidikan_terakhir'];
    $detailer_var['status_perkawinan'] = $input_var['status_perkawinan'];

    $detailer_keluarga_var['id_detailer'] = $detailer_var['id'];
    $detailer_keluarga_var['istri'] = $input_var['istri'];

    // trans begin
    $this->db->trans_begin();
    $this->detailer->store($detailer_var);
    $this->user_account->store($user_account_var);
    // jika tidak punya istri, tidak input data istri
    if ( ! empty($input_var['istri']) && ! empty($input_var['status_perkawinan'])) {
      $this->detailer_keluarga->store($detailer_keluarga_var);
    }
    // jika tidak punya anak, tidak input data anak
    if ( ! empty($input_var['anak'])) {
      foreach ($input_var['anak'] as $key => $value) {
        $detailer_anak_var['id_detailer'] = $detailer_var['id'];
        $detailer_anak_var['anak'] = $value;
        $this->detailer_anak->store($detailer_anak_var);
      }
    }

    // begin transaction
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $this->session->set_flashdata('error_msg', 'Penambahan data detailer <strong>gagal</strong>.');
      $url = site_url() . '/master-detailer';
      header("Location: $url");
    } else {
      // $this->db->trans_rollback();
      $this->db->trans_commit();
      $this->session->set_flashdata('success_msg', 'Data detailer baru <strong>berhasil</strong> disimpan.');
      $url = site_url() . '/master-detailer';
      header("Location: $url");
    }
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
