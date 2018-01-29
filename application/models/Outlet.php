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
    $this->db->join('area b', 'a.id_area_ptkp = b.id', 'left');
    $this->db->join('detailer c', 'a.id_detailer = c.id', 'left');
    $this->db->join('area d', 'a.id_area_ppg = d.id', 'left');
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
    $this->db->join('area b', 'a.id_area_ptkp = b.id', 'left');
    $this->db->join('detailer c', 'a.id_detailer = c.id', 'left');
    $this->db->join('area d', 'a.id_area_ppg = d.id', 'left');
    $this->db->where('a.hapus', null);
    if ($distributor == 'ptkp') {
      $this->db->where('b.id', $id_area);
    } elseif ($distributor == 'ppg') {
      $this->db->where('d.id', $id_area);
    }
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
  }
}