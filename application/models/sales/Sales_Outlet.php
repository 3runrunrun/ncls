<?php 

class Sales_Outlet extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function query_per_produk($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('sales_outlet');
    $this->db->where('tahun', $this->session->userdata('tahun'));
    $this->db->where('hapus', null);
    $this->db->group_by('id_produk');
    $result = $this->db->get();
    return $this->db->last_query();
  }

  public function get_data_daily_produk($column = '*')
  {
    $total = $this->query_per_produk('id_produk, sum(jumlah) as total, sum(target) as target');

    $this->db->select($column, FALSE);
    $this->db->from('sales_outlet a');
    $this->db->join('outlet b', 'a.id_outlet = b.id');
    $this->db->join('produk c', 'a.id_produk = c.id');
    $this->db->join("($total) d", 'a.id_produk = d.id_produk');
    $this->db->where('a.tahun', $this->session->userdata('tahun'));
    $this->db->where('a.hapus', null);
    $this->db->group_by('a.tanggal, a.id_produk');
    $this->db->order_by('a.id_produk');
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
    $query = $this->db->set($data)->get_compiled_insert('sales_outlet');
    $this->db->query($query);
  }
}