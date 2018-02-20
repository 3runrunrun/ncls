<?php 

class Subdist_Permintaan_Produk_Detail extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function get_data($column = '*')
  {
    $this->db->select($column);
    $this->db->from('subdist_permintaan_produk_detail');
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

  public function get_data_by_distributor($column = '*')
  {
    $this->db->select($column);
    $this->db->from('subdist_permintaan_produk_detail a');
    $this->db->join('distributor b', 'b.id = a.id_distributor');
    $this->db->join('master_distributor c', 'c.id = b.id_distributor');
    $this->db->join('area d', 'd.id = b.id_area');
    $this->db->group_by('id_distributor');
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
    $query = $this->db->set($data)->get_compiled_insert('subdist_permintaan_produk_detail');
    $this->db->query($query);
  }
}