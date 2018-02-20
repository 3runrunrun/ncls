<?php 

class Subdist_Permintaan_Produk extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function get_data($column = '*')
  {
    $this->db->select($column);
    $this->db->from('subdist_permintaan_produk');
    $this->db->where('hapus', NULL);
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
   * Menampilkan data per distributor per bulan
   * @param  string $id     kode distributor
   * @param  string $month  bulan dalam angka
   * @param  string $column kolom tabel
   * @return array
   */
  public function get_data_by_dist_month($id, $month, $column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('subdist_permintaan_produk a');
    $this->db->join('subdist b', 'a.id_subdist = b.id');
    $this->db->join('subdist_permintaan_produk_detail c', 'a.id = c.id_permintaan');
    $this->db->join('produk d', 'c.id_produk = d.id');
    $this->db->where('c.id_distributor', $id);
    $this->db->like('DATE_FORMAT(a.tanggal, \'%m\')', $month);
    $this->db->where('a.hapus', NULL);
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

  /**
   * Menampilkan total permintaan per bulan
   * @param  string $id     kode distributor
   * @param  string $month  bulan dalam angka
   * @return array
   */
  public function get_data_total_by_dist_month($id, $month, $column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('subdist_permintaan_produk a');
    $this->db->join('subdist_permintaan_produk_detail b', 'a.id = b.id_permintaan');
    $this->db->where('a.id_distributor', $id);
    $this->db->where('a.hapus', NULL);
    $this->db->group_by('a.id_distributor');
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
    $query = $this->db->set($data)->get_compiled_insert('subdist_permintaan_produk');
    $this->db->query($query);
  }
}