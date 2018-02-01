<?php 

class Barang_Stok extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function cek_stok($id_barang)
  {
    $ret_val = false;

    $this->db->where('id_barang', $id_barang);
    $result = $this->db->get('barang_stok');

    // jika data stok ada, maka set return value menjadi true
    if ($result->num_rows() > 0) {
      $ret_val = true;
    }

    return $ret_val;
  }

  public function store($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('barang_stok');
    $this->db->query($query);
  }

  public function update_stok($id, $jumlah, $flag)
  {
    if ($flag == 'masuk') {
      $this->db->set('stok', "stok + $jumlah", false);
    } elseif ($flag == 'keluar') {
      $this->db->set('stok', "stok - $jumlah", false);
    }
    $query = $this->db->get_compiled_update('barang_stok');
    $this->db->query($query);
  }

  public function undo_update_stok($id, $jumlah, $flag)
  {
    if ($flag == 'masuk') {
      $this->db->set('stok', "stok - $jumlah", false);
    } elseif ($flag == 'keluar') {
      $this->db->set('stok', "stok + $jumlah", false);
    }
    $query = $this->db->get_compiled_update('barang_stok');
    $this->db->query($query);
  }
}