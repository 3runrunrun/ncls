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
    $this->db->join('detailer_field_force h', 'a.id = h.id_detailer');
    $this->db->join('jabatan b', 'h.id_jabatan = b.id');
    $this->db->join('area c', 'h.id_area = c.id');
    $this->db->join('(select detailer.id, nama from detailer join detailer_field_force on detailer.id = detailer_field_force.id_detailer where detailer_field_force.id_jabatan = \'spv\') d', 'h.id_supervisor = d.id', 'left', FALSE);
    $this->db->join('(select detailer.id, nama from detailer join detailer_field_force on detailer.id = detailer_field_force.id_detailer where detailer_field_force.id_jabatan = \'rm\') e', 'h.id_rm = e.id', 'left', FALSE);
    $this->db->join('(select detailer.id, nama from detailer join detailer_field_force on detailer.id = detailer_field_force.id_detailer where detailer_field_force.id_jabatan = \'rsm\') f', 'h.id_rsm = f.id', 'left', FALSE);
    $this->db->join('(select detailer.id, nama from detailer join detailer_field_force on detailer.id = detailer_field_force.id_detailer where detailer_field_force.id_jabatan = \'rm\') g', 'h.id_rm_old = g.id', 'left', FALSE);
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

  public function get_data_by_area($id_area, $column = '*')
  {
    $this->db->select($column);
    $this->db->from('detailer a');
    $this->db->join('detailer_field_force b', 'a.id = b.id_detailer');
    $this->db->where('b.id_area', $id_area);
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

  public function get_data_by_jabatan($id_jabatan, $column = '*')
  {
    $this->db->select($column);
    $this->db->from('detailer a');
    $this->db->join('detailer_field_force c', 'a.id = c.id_detailer');
    $this->db->join('jabatan b', 'c.id_jabatan = b.id');
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

  public function show($id, $column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('detailer a');
    $this->db->join('detailer_field_force h', 'a.id = h.id_detailer');
    $this->db->join('jabatan b', 'h.id_jabatan = b.id');
    $this->db->join('area c', 'h.id_area = c.id');
    $this->db->join('(select detailer.id, nama from detailer join detailer_field_force on detailer.id = detailer_field_force.id_detailer where detailer_field_force.id_jabatan = \'spv\') d', 'h.id_supervisor = d.id', 'left', FALSE);
    $this->db->join('(select detailer.id, nama from detailer join detailer_field_force on detailer.id = detailer_field_force.id_detailer where detailer_field_force.id_jabatan = \'rm\') e', 'h.id_rm = e.id', 'left', FALSE);
    $this->db->join('(select detailer.id, nama from detailer join detailer_field_force on detailer.id = detailer_field_force.id_detailer where detailer_field_force.id_jabatan = \'rsm\') f', 'h.id_rsm = f.id', 'left', FALSE);
    $this->db->join('(select detailer.id, nama from detailer join detailer_field_force on detailer.id = detailer_field_force.id_detailer where detailer_field_force.id_jabatan = \'rm\') g', 'h.id_rm_old = g.id', 'left', FALSE);
    $this->db->where('a.status', 'on');
    $this->db->where('a.hapus', null);
    $this->db->where('a.id', $id);
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

  public function store($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('detailer');
    $this->db->query($query);
  }

  public function update($id, $data = array())
  {
    $this->db->set($data);
    $this->db->where('id', $id);
    $query = $this->db->get_compiled_update('detailer');
    $this->db->query($query);
  }
}