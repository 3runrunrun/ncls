<?php 

class All_Ko extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function get_data($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('all_ko a');
    $this->db->join('produk b', 'a.id_produk = b.id');
    $this->db->where('a.tahun', $this->session->userdata('tahun'));
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

  public function get_data_by_sales($id_distributor, $id_detailer, $id_outlet, $id_produk, $id_ko, $column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('all_ko a');
    $this->db->join('produk b', 'a.id_produk = b.id');
    $this->db->where('a.id_distributor', $id_distributor);
    $this->db->where('a.id_detailer', $id_detailer);
    $this->db->where('a.id_outlet', $id_outlet);
    $this->db->where('a.id_produk', $id_produk);
    $this->db->where('a.id_ko', $id_ko);
    $this->db->where('a.tahun', $this->session->userdata('tahun'));
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
}