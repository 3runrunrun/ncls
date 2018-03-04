<?php 

class Barang_Stok_Distributor extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function get_data($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('barang_stok_distributor a');
    $this->db->join('produk b', 'a.id_barang = b.id');
    $this->db->join('distributor c', 'a.id_distributor = c.id');
    $this->db->join('master_distributor d', 'c.id_distributor = d.id');
    $this->db->where('a.tahun', $this->session->userdata('tahun'));
    $this->db->where('a.hapus', null);
    $this->db->order_by('a.id_distributor, a.id_barang');
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

  public function cek_stok($id_barang, $id_distributor)
  {
    $ret_val = false;

    $this->db->where('id_barang', $id_barang);
    $this->db->where('id_distributor', $id_distributor);
    $result = $this->db->get('barang_stok_distributor');

    // jika data stok ada, maka set return value menjadi true
    if ($result->num_rows() > 0) {
      $ret_val = true;
    }

    return $ret_val;
  }

  public function store($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('barang_stok_distributor');
    $this->db->query($query);
  }

  public function update_stok($id, $id_distributor, $jumlah, $flag)
  {
    if ($flag == 'masuk') {
      $this->db->set('stok', "stok + $jumlah", false);
    } elseif ($flag == 'keluar') {
      $this->db->set('stok', "stok - $jumlah", false);
    }
    $this->db->where('id_barang', $id);
    $this->db->where('id_distributor', $id_distributor);
    $this->db->where('tahun', $this->session->userdata('tahun'));
    $query = $this->db->get_compiled_update('barang_stok_distributor');
    $this->db->query($query);
  }

  public function undo_update_stok($id, $id_distributor, $jumlah, $flag)
  {
    if ($flag == 'masuk') {
      $this->db->set('stok', "stok - $jumlah", false);
    } elseif ($flag == 'keluar') {
      $this->db->set('stok', "stok + $jumlah", false);
    }
    $this->db->where('id_barang', $id);
    $this->db->where('id_distributor', $id_distributor);
    $query = $this->db->get_compiled_update('barang_stok_distributor');
    $this->db->query($query);
  }
}