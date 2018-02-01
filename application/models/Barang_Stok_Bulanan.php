<?php 

class Barang_Stok_Bulanan extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function cek_laporan_by_tahun_bulan($id_barang, $tahun, $bulan)
  {
    $ret_val = false;

    $this->db->where('id_barang', $id_barang);
    $this->db->where('tahun', $tahun);
    $this->db->where('bulan', $bulan);
    $result = $this->db->get('barang_stok_bulanan');

    // jika ada laporan tahun dan bulan ini, maka set return value menjadi true
    if ($result->num_rows() > 0) {
      $ret_val = true;
    }

    return $ret_val;
  }

  public function store($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('barang_stok_bulanan');
    $this->db->query($query);
  }

  public function update_laporan($id_barang, $bulan, $tahun, $jumlah, $flag)
  {
    if ($flag == 'masuk') {
      $this->db->set('jumlah_masuk', "jumlah_masuk + $jumlah", false);
      $this->db->set('sisa', "sisa + $jumlah", false);
    } elseif ($flag == 'keluar') {
      $this->db->set('jumlah_keluar', "jumlah_keluar + $jumlah", false);
      $this->db->set('sisa', "sisa - $jumlah", false);
    }
    $this->db->where('id_barang', $id_barang);
    $this->db->where('bulan', $bulan);
    $this->db->where('tahun', $tahun);
    $query = $this->db->get_compiled_update('barang_stok_bulanan');
    $this->db->query($query);
  }

  public function undo_update_laporan($id_barang, $bulan, $tahun, $jumlah, $flag)
  {
    if ($flag == 'masuk') {
      $this->db->set('jumlah_masuk', "jumlah_masuk - $jumlah", false);
      $this->db->set('sisa', "sisa - $jumlah", false);
    } elseif ($flag == 'keluar') {
      $this->db->set('jumlah_keluar', "jumlah_keluar - $jumlah", false);
      $this->db->set('sisa', "sisa + $jumlah", false);
    }
    $this->db->where('id_barang', $id_barang);
    $this->db->where('bulan', $bulan);
    $this->db->where('tahun', $tahun);
    $query = $this->db->get_compiled_update('barang_stok_bulanan');
    $this->db->query($query);
  }
}