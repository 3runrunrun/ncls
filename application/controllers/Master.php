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
    $data['area'] = $this->Area->get_data();

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
    $this->Area->store($input_var);
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

  /////////////////
  // DISTRIBUTOR //
  /////////////////
  public function master_distributor()
  {
    $data['distributor'] = $this->Distributor->get_data('a.id_distributor, a.nama, b.distributor, b.alias_distributor,  c.area, c.alias_area');
    $data['master_distributor'] = $this->Master_Distributor->get_data();
    $data['area'] = $this->Area->get_data('id, area');

    if ($data['area']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['area']['data']);
    }
    // var_dump($this->session->flashdata('query_msg'));
    // die();
    
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('master/distributor', $data);
    $this->load->view('footer-js');
  }

  public function store_core_distributor()
  {
    // init variable
    $input_var = $this->input->post();
    // var_dump($input_var);
    // die();

    // begin transaction
    $this->db->trans_begin();
    $this->Master_Distributor->store($input_var);
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $this->session->set_flashdata('error_msg', 'Penambahan data (master) distributor <strong>gagal</strong>.');
      $url = site_url() . '/master-distributor';
      header("Location: $url");
    } else {
      $this->db->trans_commit();
      $this->session->set_flashdata('success_msg', 'Data (master) distributor baru <strong>berhasil</strong> disimpan.');
      $url = site_url() . '/master-distributor';
      header("Location: $url");
    }
  }

  public function store_master_distributor()
  {
    // init variable
    $input_var = $this->input->post();
    // var_dump($input_var);
    // die();

    // begin transaction
    $this->db->trans_begin();
    $this->Distributor->store($input_var);
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $this->session->set_flashdata('error_msg', 'Penambahan data  distributor <strong>gagal</strong>.');
    } else {
      $this->db->trans_commit();
      $this->session->set_flashdata('success_msg', 'Data  distributor baru <strong>berhasil</strong> disimpan.');
    }
    redirect('master-distributor');
  }

  ////////////
  // PRODUK //
  ////////////

  /**
   * Fungsi untuk menampilkan tabel dan form master produk
   * @return void
   */
  public function master_produk()
  {
    $data['produk'] = $this->Produk->get_data('a.id, a.nama, a.kemasan, a.harga_hna, a.harga_h_askes, a.harga_master, a.golongan, a.golongan1, COALESCE(a.antibiotik, \'n\') as antibiotik, COALESCE(a.barang_baru, \'N\') as barang_baru, COALESCE(a.barang_ask, \'n\') as barang_ask, coalesce(a.new_cn, \'n\') as new_cn, a.cn_new_barang, coalesce(a.start_regular, \'-\') as start_regular, coalesce(a.barang_master, \'n\') as barang_master, coalesce(a.diskon, \'0\') as diskon, b.area, coalesce(a.keterangan_region, \'-\') as keterangan_region, coalesce(a.segmen, \'-\') as segmen');
    $data['area'] = $this->Area->get_data();
    $data['barang_master'] = $this->Produk->get_data('a.id, a.nama');

    if ($data['produk']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['produk']['data']);
    }

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('master/produk', $data);
    $this->load->view('footer-js');
  }

  public function store_master_produk($key = null)
  {
    // begin transaction
    $this->db->trans_begin();
    if ($key == 'store') {
      // init var
      $input_var = $this->input->post();
      
      // store data
      $this->Produk->store($input_var);
      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->session->set_flashdata('error_msg', 'Penambahan data produk <strong>gagal</strong>.');
        redirect('master-produk');
      } else {
        $this->db->trans_commit();
        $this->session->set_flashdata('success_msg', 'Data produk baru <strong>berhasil</strong> disimpan.');
        redirect('master-produk');
      }
    } else {
      redirect('master-produk');
    }
  }

  //////////
  // STOK //
  //////////

  public function master_stok($kode_produk = null)
  {
    $data['stok'] = $this->Produk->get_data_stok('a.id, a.nama, a.kemasan, a.harga_hna, a.harga_h_askes, a.harga_master, coalesce(b.stok, 0) as stok');

    if ($kode_produk !== null) {
      $data['tambah_stok'] = $this->Produk->show_stok($kode_produk, 'a.id, a.kemasan, coalesce(b.stok, 0) as stok');
    }

    if ($data['stok']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['stok']['data']);
    }

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('master/stok', $data);
    $this->load->view('footer-js');
  }

  public function store_master_stok()
  {
    // init var
    $input_var = $this->input->post();
    $barang_masuk = array();
    $barang_stok_bulanan = array();
    $barang_stok = array();

    // repopulate var & begin transaction
    $this->db->trans_begin();

    // barang masuk
    $barang_masuk['id_barang'] = $input_var['id_barang'];
    $barang_masuk['tanggal_masuk'] = date('Y-m-d H:i:s');
    $barang_masuk['jumlah_masuk'] = $input_var['stok'];
    $this->Barang_Masuk->store($barang_masuk);

    // die();

    // barang stok bulanan
    $barang_stok_bulanan['id_barang'] = $input_var['id_barang'];
    $barang_stok_bulanan['jumlah_masuk'] = $input_var['stok'];
    $this->store_barang_stok_bulanan($barang_stok_bulanan, 'masuk');

    // barang stok
    $barang_stok['id_barang'] = $input_var['id_barang'];
    $barang_stok['stok'] = $input_var['stok'];
    $this->store_barang_stok($barang_stok, 'masuk');

    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $this->session->set_flashdata('error_msg', 'Penambahan stok produk <strong>gagal</strong>.');
    } else {
      $this->db->trans_commit();
      $this->session->set_flashdata('success_msg', 'Data stok produk <strong>berhasil</strong> disimpan.');
    }

    redirect('master-stok');
    // var_dump($input_var);
  }

  private function store_barang_stok_bulanan($data = array(), $flag)
  {
    if ($this->cek_laporan_by_tahun_bulan($data['id_barang']) === false) {
      $data['bulan'] = date('m');
      $data['tahun'] = date('Y');
      $data['sisa'] = $data['jumlah_masuk'];
      $this->Barang_Stok_Bulanan->store($data);
    } else {
      $this->Barang_Stok_Bulanan->update_laporan($data['id_barang'], date('m'), date('Y'), $data['jumlah_masuk'], $flag);
    }
  }

  private function cek_laporan_by_tahun_bulan($id_barang)
  {
    return $this->Barang_Stok_Bulanan->cek_laporan_by_tahun_bulan($id_barang, date('Y'), date('m'));
  }

  private function store_barang_stok($data = array(), $flag)
  {
    if ($this->cek_stok($data['id_barang']) === false) {
      $this->Barang_Stok->store($data);
    } else {
      $this->Barang_Stok->update_stok($data['id_barang'], $data['stok'], $flag);
    }
  }

  private function cek_stok($id_barang)
  {
    return $this->Barang_Stok->cek_stok($id_barang);
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
    $data['outlet'] = $this->Outlet->get_data('a.id, a.nama as nama_outlet, segmen, alamat, kota, upper(e.alias_distributor) as alias_distributor, d.area, upper(d.alias_area) as alias_area, \'-\' as kode_lam, c.nama as nama_detailer, date_format(a.periode, \'%m-%Y\') as periode, dispensing');
    $data['master_distributor'] = $this->Master_Distributor->get_data();
    $data['area'] = $this->Area->get_data();
    $data['detailer'] = $this->Detailer->get_data('a.id, a.nama');

    if ($data['outlet']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['outlet']['data']);
    }

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('master/outlet', $data);
    $this->load->view('footer-js');
  }

  public function show_distributor_by_area()
  {
    $input_var = $this->input->post();
    $data['distributor'] = $this->Distributor->show_by_area($input_var['id_area'], 'a.id, upper(b.alias_distributor) as alias_distributor');
    echo json_encode($data['distributor']['data']->result_array());
  }

  public function show_detailer_by_area()
  {
    $input_var = $this->input->post();
    $data['detailer'] = $this->Detailer->get_data_by_area($input_var['id_area'], 'a.id, upper(a.nama) as nama');
    echo json_encode($data['detailer']['data']->result_array());
  }

  /**
   * !!! Jangan diubah ya !!!
   * Fungsi untuk menampilkan data pada pencarian outlet
   * @return json
   */
  public function show_outlet_by_dist_area()
  {
    $input_var = $this->input->post();
    $data['outlet'] = $this->Outlet->show_by_dist_area($input_var['id_area'], $input_var['distributor'], 'a.id, upper(a.nama) as nama_outlet, upper(segmen) as segmen, upper(alamat) as alamat, upper(kota) as kota, upper(e.alias_distributor) as alias_distributor, upper(concat(concat(\'(\', d.alias_area, \')\', \' \', d.area))) as area, \'-\' as kode_lam, upper(c.nama) as nama_detailer, date_format(a.periode, \'%m-%Y\') as periode, upper(dispensing) as dispensing');
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
    $input_var['id'] = $input_var['prefix_id'].$input_var['id'];
    unset($input_var['prefix_id']);

    // begin transaction
    $this->db->trans_begin();
    $this->Outlet->store($input_var);
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $this->session->set_flashdata('error_msg', 'Penambahan data outlet <strong>gagal</strong>.');
    } else {
      $this->db->trans_commit();
      $this->session->set_flashdata('success_msg', 'Data outlet baru <strong>berhasil</strong> disimpan.');
    }
    redirect('master-outlet');
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
    $data['detailer'] = $this->Detailer->get_data("a.id, upper(a.nama) as nama, case h.tanggal_masuk when '0' then '-' else h.tanggal_masuk end as tanggal_masuk, case h.tanggal_mutasi when '0' then '-' else h.tanggal_mutasi end as tanggal_mutasi, case h.tanggal_keluar when '0' then '-' else h.tanggal_keluar end as tanggal_keluar, a.keterangan, upper(c.area) as area, upper(a.agama) as agama, upper(a.golongan) as golongang, upper(h.subarea) as subarea, a.status, upper(d.nama) as nama_spv, upper(e.nama) as nama_rm, upper(f.nama) as nama_rsm, upper(g.nama) as nama_rm_old");
    // die();
    $data['area'] = $this->Area->get_data();
    $data['jabatan'] = $this->Jabatan->get_data();
    $data['supervisor'] = $this->Detailer->get_data_by_jabatan('spv', 'a.id, a.nama, c.id_jabatan');
    $data['rm'] = $this->Detailer->get_data_by_jabatan('rm', 'a.id, a.nama, c.id_jabatan');
    $data['rsm'] = $this->Detailer->get_data_by_jabatan('rsm', 'a.id, a.nama, c.id_jabatan');
    $data['rm_lama'] = $this->Detailer->get_data_by_jabatan('rm', 'a.id, a.nama, c.id_jabatan');
    $data['detailer_exchange'] = $this->Detailer->get_data('a.id, a.nama');

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
    $detailerff_var = array();
    $detailer_keluarga_var = array();
    $detailer_anak_var = array();
    $user_account_var = array();

    // repopulating variable
    $username = explode(' ', $input_var['nama']);
    $user_account_var['username'] = strtolower($username[0]);
    $user_account_var['password'] = $this->nsu->password_generator(8); // cek libary "nsu" di folder application/libraries
    $user_account_var['jenis'] = $input_var['id_jabatan'];

    $detailer_var['id'] = $input_var['id'];
    $detailer_var['ktp'] = $input_var['ktp'];
    $detailer_var['nama'] = $input_var['nama'];
    $detailer_var['golongan'] = $input_var['golongan'];
    $detailer_var['tempat_lahir'] = $input_var['tempat_lahir'];
    $detailer_var['tanggal_lahir'] = $input_var['tanggal_lahir'];
    $detailer_var['jenis_kelamin'] = $input_var['jenis_kelamin'];
    $detailer_var['agama'] = $input_var['agama'];
    $detailer_var['kewarganegaraan'] = $input_var['kewarganegaraan'];
    $detailer_var['pendidikan_terakhir'] = $input_var['pendidikan_terakhir'];
    $detailer_var['status_perkawinan'] = $input_var['status_perkawinan'];
    $detailer_var['status'] = 'on';
    $detailer_var['keterangan'] = $input_var['keterangan'];
    // var_dump($detailer_var);

    $detailerff_var['id_detailer'] = $input_var['id'];
    $detailerff_var['id_area'] = $input_var['id_area'];
    $detailerff_var['subarea'] = $input_var['subarea'];
    $detailerff_var['id_jabatan'] = $input_var['id_jabatan'];
    $detailerff_var['tanggal_masuk'] = $input_var['tanggal_masuk'];
    $detailerff_var['tanggal_mutasi'] = $input_var['tanggal_mutasi'];
    $detailerff_var['tanggal_keluar'] = $input_var['tanggal_keluar'];
    $detailerff_var['id_rm'] = $input_var['id_rm'];
    $detailerff_var['id_rsm'] = $input_var['id_rsm'];
    $detailerff_var['id_rm_old'] = $input_var['id_rm_old'];
    $detailerff_var['id_supervisor'] = $input_var['id_supervisor'];
    $detailerff_var['telp_rumah'] = $input_var['telp_rumah'];
    $detailerff_var['no_hp'] = $input_var['no_hp'];
    $detailerff_var['net_salary'] = $input_var['net_salary'];
    $detailerff_var['housing'] = $input_var['housing'];
    $detailerff_var['tunjangan'] = $input_var['tunjangan'];
    $detailerff_var['sewa_kendaraan'] = $input_var['sewa_kendaraan'];
    $detailerff_var['bank'] = $input_var['bank'];
    $detailerff_var['akun'] = $input_var['akun'];
    $detailerff_var['id_detailer_exchange'] = $input_var['id_detailer_exchange'];
    $detailerff_var['status'] = 'new';
    $detailerff_var['keterangan'] = $input_var['keterangan'];
    // var_dump($detailerff_var);

    $detailer_keluarga_var['id_detailer'] = $detailer_var['id'];
    $detailer_keluarga_var['istri'] = $input_var['istri'];
    // var_dump($detailer_keluarga_var);

    // die();

    // trans begin
    $this->db->trans_begin();
    $this->Detailer->store($detailer_var);
    $this->Detailer_FF->store($detailerff_var);
    $this->User_Account->store($user_account_var);
    // jika tidak punya istri, tidak input data istri
    if ( ! empty($input_var['istri']) && ! empty($input_var['status_perkawinan'])) {
      $this->Detailer_Keluarga->store($detailer_keluarga_var);
    }
    // jika tidak punya anak, tidak input data anak
    if ( ! empty($input_var['anak'])) {
      foreach ($input_var['anak'] as $key => $value) {
        $detailer_anak_var['id_detailer'] = $detailer_var['id'];
        $detailer_anak_var['anak'] = $value;
        $this->Detailer_Anak->store($detailer_anak_var);
      }
    }

    // begin transaction
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $this->session->set_flashdata('error_msg', 'Penambahan data detailer <strong>gagal</strong>.');
    } else {
      // $this->db->trans_rollback();
      $this->db->trans_commit();
      $this->session->set_flashdata('success_msg', 'Data detailer baru <strong>berhasil</strong> disimpan.');
    }
    redirect('master-detailer');
  }

  //////////////
  // CUSTOMER //
  //////////////

  /**
   * Fungsi untuk menampilkan tabel dan form master customer
   * @return void
   */
  public function master_customer($kode_customer = null)
  {
    $data['customer'] = $this->Customer->get_data('a.id, a.nama, a.spesialis, a.nama_lokasi_praktik, a.alamat, b.alias_area, b.area');
    $data['area'] = $this->Area->get_data();
    $data['detailer'] = $this->Detailer->get_data_by_jabatan('rm', 'a.id, a.nama');

    if ($data['customer']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['customer']['data']);
    }

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('master/customer', $data);
    $this->load->view('footer-js');
  }

  public function show_customer_by_area()
  {
    // $_POST['id_area'] = '03';
    $input_var = $this->input->post();
    $data['customer'] = $this->Customer->show_by_area($input_var['id_area'], 'upper(a.id) as id, upper(a.nama) as nama, upper(a.spesialis) as spesialis, upper(a.nama_lokasi_praktik) as nama_lokasi_praktik, upper(alamat) as alamat, concat(upper(b.area), \' \', concat(\'(\', upper(b.alias_area),\')\')) as area');
    echo json_encode($data['customer']['data']->result_array());
  }

  /**
   * Fungsi untuk menambah data customer baru
   * @param  String $key jenis transaksi yang akan dilakukan
   * @return void
   */
  public function store_master_customer($key = null)
  {
    // begin transaction
    $this->db->trans_begin();
    if ($key == 'store') {
      // init var
      $input_var = $this->input->post();

      $this->Customer->store($input_var);
      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->session->set_flashdata('error_msg', 'Penambahan data customer <strong>gagal</strong>.');
        $url = site_url() . '/master-customer';
        header("Location: $url");
      } else {
        // $this->db->trans_rollback();
        $this->db->trans_commit();
        $this->session->set_flashdata('success_msg', 'Data customer baru <strong>berhasil</strong> disimpan.');
        $url = site_url() . '/master-customer';
        header("Location: $url");
      }
    } else {
      $url = site_url() . '/master-customer';
      header("Location: $url");
    }
  }

  //////////////////
  // CUSTOMER NON //
  //////////////////

  /**
   * Fungsi untuk menampilkan tabel dan form master customer-non
   * @return void
   */
  public function master_customer_non()
  {
    $data['customer_non'] = $this->Customer_Non->get_data('a.id, a.nama, a.spesialis, a.nama_lokasi_praktik, a.alamat, b.alias_area, b.area');
    $data['area'] = $this->Area->get_data();
    $data['detailer'] = $this->Detailer->get_data_by_jabatan('rm', 'a.id, a.nama');

    if ($data['customer_non']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['customer_non']['data']);
    }

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('master/customer-non', $data);
    $this->load->view('footer-js');
  }

  public function show_customer_non_by_area()
  {
    $input_var = $this->input->post();
    $data['customer_non'] = $this->Customer_Non->show_by_area($input_var['id_area'], 'upper(a.id) as id, upper(a.nama) as nama, upper(a.spesialis) as spesialis, upper(a.nama_lokasi_praktik) as nama_lokasi_praktik, upper(alamat) as alamat, concat(upper(b.area), \' \', concat(\'(\', upper(b.alias_area),\')\')) as area');
    echo json_encode($data['customer_non']['data']->result_array());
  }

  /**
   * Fungsi untuk menambah data customer (non) baru
   * @param  String $key jenis transaksi yang akan dilakukan
   * @return void
   */
  public function store_master_customer_non($key = null)
  {
    // begin transaction
    $this->db->trans_begin();
    if ($key == 'store') {
      // init var
      $input_var = $this->input->post();

      $this->Customer_Non->store($input_var);
      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->session->set_flashdata('error_msg', 'Penambahan data customer (non) <strong>gagal</strong>.');
        $url = site_url() . '/master-customer-non';
        header("Location: $url");
      } else {
        // $this->db->trans_rollback();
        $this->db->trans_commit();
        $this->session->set_flashdata('success_msg', 'Data customer (non) baru <strong>berhasil</strong> disimpan.');
        $url = site_url() . '/master-customer-non';
        header("Location: $url");
      }
    } else {
      $url = site_url() . '/master-customer';
      header("Location: $url");
    }
  }

  /////////////////
  // OPERASIONAL //
  /////////////////

  public function master_operasional()
  {
    $data['detailer'] = $this->Detailer->get_data('a.id, a.nama');
    $data['operasional'] = $this->Operasional->get_data();
    $data['total_by_year'] = $this->Operasional->get_total_by_year(date('Y'));

    if ($data['operasional']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['operasional']['data']);
    }

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('master/operasional', $data);
    $this->load->view('footer-js');
  }

  public function store_master_operasional($key = NULL)
  {
    $this->db->trans_begin();
    if ($key == 'delete') {
      $id = $this->input->post('id');
      $this->Operasional->destroy($id);
      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->session->set_flashdata('error_msg', 'Hapus data biaya operasional <strong>gagal</strong>.');
      } else {
        // $this->db->trans_rollback();
        $this->db->trans_commit();
        $this->session->set_flashdata('success_msg', 'Data biaya operasional <strong>berhasil</strong> dihapus.');
      }
    } elseif ($key == 'edit') {
      # code...
    } else {
      // Buat masukin data baru
      $input_var = $this->input->post();
      $input_var['id'] = $this->nsu->time_id_generator();

      $this->Operasional->store($input_var);
      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->session->set_flashdata('error_msg', 'Penambahan data biaya operasional <strong>gagal</strong>.');
      } else {
        // $this->db->trans_rollback();
        $this->db->trans_commit();
        $this->session->set_flashdata('success_msg', 'Data biaya operasional <strong>berhasil</strong> disimpan.');
      }
    }
    redirect('master-operasional');
  }

  //////////
  // COGM //
  //////////

  public function master_cogm()
  {
    $data['jenis_cogm'] = $this->Cogm_Jenis->get_data();
    $data['cogm'] = $this->Cogm->get_data('a.tanggal, b.jenis, a.biaya');
    /*$data['total_by_year'] = $this->Operasional->get_total_by_year(date('Y'));*/

    if ($data['cogm']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['operasional']['data']);
    }

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('master/cogm', $data);
    $this->load->view('footer-js');
  }

  public function store_master_cogm($key = null)
  {
    // begin transaction
    $this->db->trans_begin();
    if ($key == 'delete') {
      $id = $this->input->post('id');
      $this->Cogm->destroy($id);
      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->session->set_flashdata('error_msg', 'Hapus data COGM <strong>gagal</strong>.');
      } else {
        // $this->db->trans_rollback();
        $this->db->trans_commit();
        $this->session->set_flashdata('success_msg', 'Data COGM <strong>berhasil</strong> dihapus.');
      }
    } elseif ($key == 'edit') {
      # code...
    } else {
      $input_var = $this->input->post();
      $cogm = array();

      // store data
      foreach ($input_var['id_jenis_cogm'] as $key => $value) {
        $cogm['id'] = $this->nsu->time_id_generator();
        $cogm['id_jenis_cogm'] = $value;
        $cogm['biaya'] = $input_var['biaya'][$key];
        $cogm['tanggal'] = $input_var['tanggal'];

        $this->Cogm->store($cogm);
      }
      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->session->set_flashdata('error_msg', 'Penambahan data COGM <strong>gagal</strong>.');
      } else {
        // $this->db->trans_rollback();
        $this->db->trans_commit();
        $this->session->set_flashdata('success_msg', 'Data COGM <strong>berhasil</strong> disimpan.');
      }
    }
    redirect('master-cogm');
  }
}
