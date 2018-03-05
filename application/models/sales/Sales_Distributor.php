<?php 

class Sales_Distributor extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  // kebutuhan dashboard
  public function get_title($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('sales_outlet a');
    $this->db->join('distributor b', 'a.id_distributor = b.id');
    $this->db->join('master_distributor c', 'b.id_distributor = c.id');
    $this->db->where('a.tahun', $this->session->userdata('tahun'));
    $this->db->where('a.hapus', null);
    $this->db->group_by('c.alias_distributor');
    $this->db->order_by('c.alias_distributor');
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

  public function get_placeholder($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('sales_outlet a');
    $this->db->join('distributor b', 'a.id_distributor = b.id');
    $this->db->join('master_distributor c', 'b.id_distributor = c.id');
    $this->db->join('area d', 'b.id_area = d.id');
    $this->db->where('a.tahun', $this->session->userdata('tahun'));
    $this->db->where('a.hapus', null);
    $this->db->group_by('d.id');
    $this->db->order_by('c.alias_distributor');
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

  public function get_data_sales_per_area($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('sales_outlet a');
    $this->db->join('distributor b', 'a.id_distributor = b.id');
    $this->db->join('master_distributor c', 'b.id_distributor = c.id');
    $this->db->join('area d', 'b.id_area = d.id');
    $this->db->join('produk e', 'a.id_produk = e.id');
    $this->db->where('a.tahun', $this->session->userdata('tahun'));
    $this->db->where('a.hapus', null);
    $this->db->group_by('CONCAT(c.id, d.id)', FALSE);
    $this->db->order_by('c.alias_distributor');
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

  // End of - kebutuhan dashboard

}