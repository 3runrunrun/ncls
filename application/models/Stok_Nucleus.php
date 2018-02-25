<?php 

class Stok_Nucleus extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  ///////////
  // MASUK //
  ///////////

  public function get_data_masuk($column = '*')
  {
    $this->db->select($column);
    $this->db->where('hapus', null);
    $result = $this->db->get('produk_masuk_nucleus');
    if ( ! $result) {
      $ret_val = array(
        'status' => 'error',
        'data' => $this->db->error()
        );
    } else {
      $ret_val = array(
        'status' => 'success',
        'data' => $result
        );
    }
    return $ret_val;
  }

  public function store_masuk($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('produk_masuk_nucleus');
    $this->db->query($query);
  }

  ////////////
  // KELUAR //
  ////////////

  public function get_data_keluar($column = '*')
  {
    $this->db->select($column);
    $this->db->where('hapus', null);
    $result = $this->db->get('produk_keluar_nucleus');
    if ( ! $result) {
      $ret_val = array(
        'status' => 'error',
        'data' => $this->db->error()
        );
    } else {
      $ret_val = array(
        'status' => 'success',
        'data' => $result
        );
    }
    return $ret_val;
  }

  public function store_keluar($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('produk_keluar_nucleus');
    $this->db->query($query);
  }

  /////////////
  // BULANAN //
  /////////////

  public function get_data_bulanan($column = '*')
  {
    $this->db->select($column);
    $this->db->where('hapus', null);
    $result = $this->db->get('produk_stok_bulanan_nucleus');
    if ( ! $result) {
      $ret_val = array(
        'status' => 'error',
        'data' => $this->db->error()
        );
    } else {
      $ret_val = array(
        'status' => 'success',
        'data' => $result
        );
    }
    return $ret_val;
  }

  public function store_bulanan($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('produk_stok_bulanan_nucleus');
    $this->db->query($query);
  }
}