<?php 

class Customer extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function get_data($column = '*')
  {
    $this->db->select($column);
    $this->db->from('customer a');
    $this->db->join('area b', 'a.id_area = b.id');
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

  public function get_data_user($column = '*')
  {
    $this->db->select($column);
    $this->db->from('user_customer a');
    $this->db->join('area b', 'a.id_area = b.id');
    $this->db->join('customer c', 'a.id = c.id', 'left');
    $this->db->join('customer_non d', 'a.id = d.id', 'left');
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
    $this->db->select($column, FALSE);
    $this->db->from('customer a');
    $this->db->join('area b', 'a.id_area = b.id');
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
    $query = $this->db->set($data)->get_compiled_insert('customer');
    $this->db->query($query);
  }
}