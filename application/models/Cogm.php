<?php 

class Cogm extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function get_data($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('cogm a');
    $this->db->join('cogm_jenis b', 'a.id_jenis_cogm = b.id');
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

  // by year
  public function get_total_cogm($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('cogm');
    $this->db->where('tahun', $this->session->userdata('tahun'));
    $this->db->where('hapus', null);
    $this->db->group_by('tahun');
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

  public function get_total_per_jenis($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('cogm a');
    $this->db->join('cogm_jenis b', 'a.id_jenis_cogm = b.id');
    $this->db->where('a.tahun', $this->session->userdata('tahun'));
    $this->db->where('a.hapus', null);
    $this->db->group_by('b.id');
    $this->db->order_by('b.id', 'asc');
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

  /**
   * data total COGM per bulan
   */

  public function get_data_concat_total($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('cogm a');
    $this->db->join('cogm_jenis b', 'a.id_jenis_cogm = b.id');
    $this->db->where('a.tahun', $this->session->userdata('tahun'));
    $this->db->where('a.hapus', null);
    $this->db->order_by('b.id');
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

  public function get_data_total($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('cogm a');
    $this->db->join('cogm_jenis b', 'a.id_jenis_cogm = b.id');
    $this->db->where('a.tahun', $this->session->userdata('tahun'));
    $this->db->where('a.hapus', null);
    $this->db->group_by('CONCAT(DATE_FORMAT(a.tanggal, \'%m%Y\'), a.id_jenis_cogm)', FALSE);
    $this->db->order_by('b.id', 'asc');
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

  // BATAS

  public function store($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('cogm');
    $this->db->query($query);
  }

  public function destroy($id)
  {
    $this->db->set(array('hapus' => date('Y-m-d')));
    $this->db->where('id', $id);
    $query = $this->db->get_compiled_update('cogm');
    $this->db->query($query);
  }
}