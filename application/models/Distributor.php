<?php 

class Distributor extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function get_data($column = '*')
  {
    $this->db->select($column);
    $this->db->from('distributor a');
    $this->db->join('master_distributor b', 'a.id_distributor = b.id');
    $this->db->join('area c', 'a.id_area = c.id');
    $this->db->order_by('c.id');
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

  public function show_by_area($id_area, $column = '*')
  {
    $this->db->select($column);
    $this->db->from('distributor a');
    $this->db->join('master_distributor b', 'a.id_distributor = b.id');
    $this->db->join('area c', 'a.id_area = c.id');
    $this->db->where('a.id_area', $id_area);
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
    // echo $this->db->last_query();
    // die();
    return $ret_val;
  }

  public function show($id, $column = '*')
  {
    $this->db->select($column, false);
    $this->db->from('distributor a');
    $this->db->join('master_distributor b', 'a.id_distributor = b.id');
    $this->db->join('area c', 'a.id_area = c.id');
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
    // echo $this->db->last_query();
    // die();
    return $ret_val;
  }

  public function store($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('distributor');
    $this->db->query($query);
  }
}

