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
    $this->db->from('produk a');
    $this->db->join('area b', 'a.region = b.id');
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
}