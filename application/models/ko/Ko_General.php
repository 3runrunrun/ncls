<?php 

class Ko_General extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function get_data($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('ko_general a');
    $this->db->join('detailer b', 'a.id_detailer = b.id');
    $this->db->join('distributor c', 'a.id_distributor = c.id');
    $this->db->join('ko_general_detail d', 'a.id = d.id_ko');
    $this->db->where('a.hapus', null);
    $this->db->where('a.tahun', $this->session->userdata('tahun'));
    $this->db->group_by('a.id');
    $this->db->order_by('a.tanggal', 'desc');
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
    $query = $this->db->set($data)->get_compiled_insert('ko_general');
    $this->db->query($query);
  }

  public function store_detail($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('ko_general_detail');
    $this->db->query($query);
  }

  public function store_onoff($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('ko_general_onoff');
    $this->db->query($query);
  }

  public function store_onoff_total($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('ko_general_onoff_total');
    $this->db->query($query);
  }

  public function store_status($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('ko_general_status');
    $this->db->query($query);
  }
}