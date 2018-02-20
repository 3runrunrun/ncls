<?php 

class Subdist extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function get_data($column = '*')
  {
    $this->db->select($column);
    $this->db->from('subdist a');
    $this->db->join('distributor b', 'a.id_distributor = b.id');
    $this->db->join('master_distributor c', 'b.id_distributor = c.id');
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
    return $ret_val;
  }

  public function store($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('subdist');
    $this->db->query($query);
  }
}