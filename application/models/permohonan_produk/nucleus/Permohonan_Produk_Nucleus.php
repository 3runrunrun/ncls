<?php 

class Permohonan_Produk_Nucleus extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function get_data($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('permohonan_produk_nucleus a');
    $this->db->join('permohonan_produk_nucleus_status b', 'a.id = b.id_permohonan AND a.status = b.status');
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

  public function get_data_delivered($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('permohonan_produk_nucleus a');
    $this->db->join('permohonan_produk_nucleus_status b', 'a.id = b.id_permohonan AND a.status = b.status');
    $this->db->where('a.hapus', null);
    $this->db->where('a.status', 'delivered');
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

  public function get_data_non_delivered($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('permohonan_produk_nucleus a');
    $this->db->join('permohonan_produk_nucleus_status b', 'a.id = b.id_permohonan AND a.status = b.status');
    $this->db->where('a.hapus', null);
    $this->db->where('a.status <>', 'delivered');
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

  public function show($id, $column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('permohonan_produk_nucleus a');
    $this->db->join('permohonan_produk_nucleus_status b', 'a.id = b.id_permohonan AND a.status = b.status');
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
    $query = $this->db->set($data)->get_compiled_insert('permohonan_produk_nucleus');
    $this->db->query($query);
  }

  public function update($id, $data = array())
  {
    $this->db->set($data);
    $this->db->where('id', $id);
    $query = $this->db->get_compiled_update('permohonan_produk_nucleus');
    $this->db->query($query);
  }
}