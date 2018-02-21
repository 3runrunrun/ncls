<?php 

class Wpr extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function get_data($column = '*')
  {
    $this->db->select($column);
    $this->db->from('wpr a');
    $this->db->join('wpr_detail d', 'a.id = d.id_wpr');
    $this->db->join('outlet b', 'd.id_outlet = b.id', 'left');
    $this->db->join('user_customer c', 'd.id_user = c.id', 'left');
    $this->db->group_by('a.id');
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

  private function get_query_user_customer($column = '*')
  {
    $this->db->select($column);
    $this->db->join('user_customer b', 'a.id = b.id');
    $result = $this->db->get('customer a');
    return $this->db->last_query();
  }

  private function get_query_user_customer_non($column = '*')
  {
    $this->db->select($column);
    $this->db->join('user_customer b', 'a.id = b.id');
    $result = $this->db->get('customer_non a');
    return $this->db->last_query();
  }

  private function get_query_user_outlet($column = '*')
  {
    $this->db->select($column);
    $this->db->join('user_customer b', 'a.id = b.id');
    $result = $this->db->get('outlet a');
    return $this->db->last_query();
  }

  public function get_data_approved($column = '*')
  {
    $user_customer = $this->get_query_user_customer('b.id as id_customer, a.nama, a.spesialis');
    $user_customer_non = $this->get_query_user_customer_non('b.id as id_customer_non, a.nama, a.spesialis');
    $user_outlet = $this->get_query_user_outlet('b.id as id_outlet, a.nama');

    $this->db->select($column);
    $this->db->from('wpr a');
    $this->db->join('wpr_detail d', 'a.id = d.id_wpr');
    $this->db->join("detailer f", 'a.id_detailer = f.id');
    $this->db->join("($user_outlet) b", 'd.id_user = b.id_outlet', 'left', FALSE);
    $this->db->join("($user_customer) c", 'd.id_user = c.id_customer', 'left', FALSE);
    $this->db->join("($user_customer_non) e", 'd.id_user = e.id_customer_non', 'left', FALSE);
    $this->db->group_by('a.id');
    $this->db->where('a.status <>', 'waiting');
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

  public function get_data_waiting($column = '*')
  {
    $user_customer = $this->get_query_user_customer('b.id as id_customer, a.nama, a.spesialis');
    $user_customer_non = $this->get_query_user_customer_non('b.id as id_customer_non, a.nama, a.spesialis');
    $user_outlet = $this->get_query_user_outlet('b.id as id_outlet, a.nama');

    $this->db->select($column);
    $this->db->from('wpr a');
    $this->db->join('wpr_detail d', 'a.id = d.id_wpr');
    $this->db->join("detailer f", 'a.id_detailer = f.id');
    $this->db->join("($user_outlet) b", 'd.id_user = b.id_outlet', 'left', FALSE);
    $this->db->join("($user_customer) c", 'd.id_user = c.id_customer', 'left', FALSE);
    $this->db->join("($user_customer_non) e", 'd.id_user = e.id_customer_non', 'left', FALSE);
    $this->db->group_by('a.id');
    $this->db->where('a.status', 'waiting');
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

  public function update($id, $data = array())
  {
    $this->db->set($data);
    $this->db->where('id', $id);
    $query = $this->db->get_compiled_update('wpr');
    $this->db->query($query);
  }

  public function store($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('wpr');
    $this->db->query($query);
  }
}