<?php 
class Wpr_Detail extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function get_promosi($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('wpr_detail a');
    $this->db->join('wpr b', 'a.id_wpr = b.id');
    $this->db->group_by('b.tahun');
    $this->db->where('b.status', 'approve');
    $this->db->where('b.tahun', $this->session->userdata('tahun'));
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
    # code...
  }

  public function store($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('wpr_detail');
    $this->db->query($query);
  }
}