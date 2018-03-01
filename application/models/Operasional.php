<?php 

class Operasional extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function get_data($column = '*')
  {
    $this->db->select($column);
    $this->db->where('hapus', null);
    $result = $this->db->get('operasional');
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

  // by year
  public function get_total_operasional($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->where('hapus', null);
    $this->db->where('tahun', $this->session->userdata('tahun'));
    $this->db->group_by('tahun');
    $result = $this->db->get('operasional');
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
    $query = $this->db->set($data)->get_compiled_insert('operasional');
    $this->db->query($query);
  }

  public function destroy($id)
  {
    $this->db->set(array('hapus' => date('Y-m-d')));
    $this->db->where('id', $id);
    $query = $this->db->get_compiled_update('operasional');
    $this->db->query($query);
  }
}