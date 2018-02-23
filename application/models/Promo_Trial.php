<?php 

class Promo_Trial extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function get_data($column = '*')
  {
    $this->db->select($column);
    $this->db->from('promo_trial a');
    $this->db->join('promo_trial_detail d', 'a.id = d.id_promo_trial');
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
    $this->db->select($column);
    $this->db->from('promo_trial a');
    $this->db->join("detailer b", 'a.id_detailer = b.id');
    $this->db->join("user_customer c", 'a.id_user = c.id');
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
    // echo $this->db->last_query();
    // die();
    return $ret_val;
  }

  public function get_data_waiting($column = '*')
  {
    $this->db->select($column);
    $this->db->from('promo_trial a');
    $this->db->join("detailer b", 'a.id_detailer = b.id');
    $this->db->join("user_customer c", 'a.id_user = c.id');
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
    $query = $this->db->get_compiled_update('promo_trial');
    $this->db->query($query);
  }

  public function store($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('promo_trial');
    $this->db->query($query);
  }
}