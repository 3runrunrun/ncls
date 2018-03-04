<?php 

class Permohonan_Produk_Distributor_Detail extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function get_data($column = '*')
  {
    $this->db->select($column);
    $this->db->where('hapus', null);
    $result = $this->db->get('permohonan_produk_distributor_detail');
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

  public function show($id, $column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('permohonan_produk_distributor a');
    $this->db->join('permohonan_produk_distributor_detail b', 'a.id = b.id_permohonan');
    $this->db->join('produk c', 'b.id_produk = c.id');
    $this->db->where('a.id', $id);
    $this->db->where('a.hapus', null);
    $this->db->where('b.hapus', null);
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
    $query = $this->db->set($data)->get_compiled_insert('permohonan_produk_distributor_detail');
    $this->db->query($query);
  }
}