<?php 

class Produk extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function get_data($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('produk');
    $this->db->where('hapus', null);
    $result = $this->db->get();
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

  public function get_data_stok($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('produk a');
    $this->db->join('barang_stok b', 'a.id = b.id_barang', 'left');
    $this->db->where('a.hapus', null);
    $result = $this->db->get();
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

  /**
   * Menampilkan data barang join dengan tabel stok
   * @param  string $id     id barang / kode barang
   * @param  string $column kolom yangingin ditampilkan
   * @return array
   */
  public function show_stok($id, $column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('produk a');
    $this->db->join('barang_stok b', 'a.id = b.id_barang', 'left');
    $this->db->where('a.id', $id);
    $this->db->where('a.hapus', null);
    $result = $this->db->get();
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

  public function store($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('produk');
    $this->db->query($query);
  }

  /**
   * Produk_Area
   */
  
  public function show_by_produk_area($id_produk, $id_region, $column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('produk_area');
    $this->db->where('id_produk', $id_produk);
    $this->db->where('id_region', $id_region);
    $this->db->where('hapus', null);
    $result = $this->db->get();
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

  public function store_produk_area($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('produk_area');
    $this->db->query($query);
  }

  /**
   * Produk_Distributor
   */
  
  public function store_produk_distributor($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('produk_distributor');
    $this->db->query($query);
  }

  /**
   * Produk_Outlet
   */
  
  public function show_by_produk_outlet($id_produk, $id_outlet, $column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('produk_outlet');
    $this->db->where('id_produk', $id_produk);
    $this->db->where('id_outlet', $id_outlet);
    $this->db->where('hapus', null);
    $result = $this->db->get();
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

  public function store_produk_outlet($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('produk_outlet');
    $this->db->query($query);
  }
}