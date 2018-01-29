<?php 

class Detailer extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function get_data($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('detailer a');
    $this->db->join('jabatan b', 'a.id_jabatan = b.id');
    $this->db->join('area c', 'a.id_area = c.id');
    $this->db->join('(select id, nama from detailer where id_jabatan = \'spv\') d', 'a.kode_supervisor = d.id', 'left', FALSE);
    $this->db->join('(select id, nama from detailer where id_jabatan = \'rm\') e', 'a.kode_rm = e.id', 'left', FALSE);
    $this->db->join('(select id, nama from detailer where id_jabatan = \'rsm\') f', 'a.kode_rsm = f.id', 'left', FALSE);
    $this->db->join('(select id, nama from detailer where id_jabatan = \'rm\') g', 'a.kode_rm_old = g.id', 'left', FALSE);
    $this->db->where('a.status', 'on');
    $this->db->where('a.hapus', null);
    $result = $this->db->get();
    // echo $this->db->last_query();
    // die();
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

  public function get_data_by_jabatan($id_jabatan, $column = '*')
  {
    $this->db->select($column);
    $this->db->from('detailer a');
    $this->db->join('jabatan b', 'a.id_jabatan = b.id');
    $this->db->where('b.id', $id_jabatan);
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
    $query = $this->db->set($data)->get_compiled_insert('detailer');
    $this->db->query($query);
  }
}