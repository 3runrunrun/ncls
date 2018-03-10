<?php 

class Sales_Detailer extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  // per detailer
  
  public function query_field_force($column = '*')
  {
    $this->db->select($column);
    $this->db->from('detailer a');
    $this->db->join('detailer_field_force b', 'a.id = b.id_detailer');
    $this->db->where('a.hapus', null);
    $this->db->where('b.tanggal_mutasi', null);
    $result = $this->db->get();
    return $this->db->last_query();
  }

  public function get_data_per_detailer($column = '*')
  {
    $detailer = $this->query_field_force('a.id, a.nama, b.id_area');
    $this->db->select($column, FALSE);
    $this->db->from('sales_outlet a');
    $this->db->join('outlet b', 'a.id_outlet = b.id');
    $this->db->join("($detailer) c", 'a.id_detailer = c.id', FALSE);
    $this->db->join('produk d', 'a.id_produk = d.id');
    $this->db->join('area e', 'c.id_area = e.id');
    $this->db->join('sales_outlet_diskon f', 'a.id = f.id_sales_outlet', 'left');
    $this->db->where('a.tahun', $this->session->userdata('tahun'));
    $this->db->where('a.hapus', null);
    $this->db->group_by('a.id_detailer');
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

  // end of - per detailer
  
  public function show_best_detailer($column = '*')
  {
    $detailer = $this->query_field_force('a.id, a.nama, b.id_area');
    $this->db->select($column, FALSE);
    $this->db->from('sales_outlet a');
    $this->db->join('outlet b', 'a.id_outlet = b.id');
    $this->db->join("($detailer) c", 'a.id_detailer = c.id', FALSE);
    $this->db->join('area d', 'c.id_area = d.id');
    $this->db->like('DATE_FORMAT(a.tanggal, \'%m\')', date('m'), FALSE);
    $this->db->where('a.tahun', $this->session->userdata('tahun'));
    $this->db->where('a.hapus', null);
    $this->db->group_by('a.id_detailer');
    $this->db->order_by('SUM((a.jumlah / a.target))', 'desc', FALSE);
    $this->db->limit(1);
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

}