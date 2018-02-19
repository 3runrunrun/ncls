<?php 

class Detailer_FF extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function get_data($column = '*')
  {
    $this->db->select($column);
    $this->db->where('hapus', null);
    $result = $this->db->get('detailer_field_force');
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
    $query = $this->db->set($data)->get_compiled_insert('detailer_field_force');
    $this->db->query($query);
  }

  public function update_by_detailer($id_detailer, $data = array())
  {
    $this->db->set($data);
    $this->db->where('id_detailer', $id);
    $query = $this->db->get_compiled_update('detailer_field_force');
    $this->db->query($query);
  }
}