<?php 
class Promo_Trial_Detail extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function show($id, $column = '*')
  {
    # code...
  }

  public function store($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('promo_trial_detail');
    $this->db->query($query);
  }
}