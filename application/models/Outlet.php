<?php 

class Outlet extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function get_data($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('outlet a');
    $this->db->join('distributor b', 'a.id_distributor = b.id');
    $this->db->join('master_distributor e', 'b.id_distributor = e.id');
    $this->db->join('detailer c', 'a.id_detailer = c.id', 'left');
    $this->db->join('area d', 'b.id_area = d.id');
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

  public function get_data_area($id, $column='*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('outlet a');
    $this->db->join('area b', 'a.id_area = b.id');
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

  public function show_by_dist_area($id_area, $distributor = 'all', $column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('outlet a');
    $this->db->join('distributor b', 'a.id_distributor = b.id');
    $this->db->join('master_distributor e', 'b.id_distributor = e.id');
    $this->db->join('detailer c', 'a.id_detailer = c.id', 'left');
    $this->db->join('area d', 'b.id_area = d.id');
    $this->db->where('e.id', $distributor);
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
    return $ret_val;
  }

  public function store($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('outlet');
    $this->db->query($query);
    // echo $this->db->last_query();
    // die();
  }
}