<?php 

class Sales_Outlet extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  /**
   * per detailer
   */
  
  public function get_data_per_detailer($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('sales_outlet a');
    $this->db->join('outlet b', 'a.id_outlet = b.id');
    $this->db->join('detailer c', 'a.id_detailer = c.id');
    $this->db->join('produk d', 'a.id_produk = d.id');
    $this->db->where('a.tahun', $this->session->userdata('tahun'));
    $this->db->where('a.hapus', null);
    $this->db->group_by('a.id_detailer');
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
   * per produk
   */
  
  // PRODUCE QUERY
  public function query_concat_product_months($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('sales_outlet a');
    $this->db->join('outlet b', 'a.id_outlet = b.id');
    $this->db->join('produk c', 'a.id_produk = c.id');
    $this->db->join('area d', 'b.id_area = d.id');
    $this->db->join('sales_outlet_diskon e', 'a.id = e.id_sales_outlet', 'left');
    $this->db->where('a.tahun', $this->session->userdata('tahun'));
    $this->db->where('a.hapus', null);
    $this->db->group_by('a.id_produk, b.id_area');
    $this->db->order_by('b.id_area, a.id_produk');
    $result = $this->db->get();
    // echo $this->db->last_query();
    // die();
    return $this->db->last_query();
  }

  public function get_data_concat_product_months($column = '*')
  {
    $query = $this->query_concat_product_months($column);
    $result = $this->db->query($query);
    
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
    // var_dump($ret_val['data']->result());
    // die();
    return $ret_val;
  }

  // PRODUCE QUERY
  public function query_per_produk($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('sales_outlet a');
    $this->db->join('outlet b', 'a.id_outlet = b.id');
    $this->db->join('produk c', 'a.id_produk = c.id');
    $this->db->join('area d', 'b.id_area = d.id');
    $this->db->join('sales_outlet_diskon e', 'a.id = e.id_sales_outlet', 'left');
    $this->db->where('a.tahun', $this->session->userdata('tahun'));
    $this->db->where('a.hapus', null);
    $this->db->group_by('CONCAT(a.id_produk, d.alias_area, DATE_FORMAT(a.tanggal, \'%m\'))', FALSE);
    $result = $this->db->get();
    // echo $this->db->last_query();
    // die();
    return $this->db->last_query();
  }

  public function get_data_per_produk($column = '*')
  {
    $query = $this->query_per_produk($column);
    $result = $this->db->query($query);

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
    // var_dump($ret_val['data']->result());
    // die();
    return $ret_val;
  }
  
  /**
   * per outlet
   */

  // PRODUCE QUERY
  public function query_concat_outlet_months($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('sales_outlet a');
    $this->db->join('outlet b', 'a.id_outlet = b.id');
    $this->db->join('produk c', 'a.id_produk = c.id');
    $this->db->join('area d', 'b.id_area = d.id');
    $this->db->join('sales_outlet_diskon e', 'a.id = e.id_sales_outlet', 'left');
    $this->db->where('a.tahun', $this->session->userdata('tahun'));
    $this->db->where('a.hapus', null);
    $this->db->group_by('id_outlet');
    $result = $this->db->get();
    return $this->db->last_query();
  }

  public function get_data_concat_months($column = '*')
  {
    $total = $this->query_concat_outlet_months($column);
    $result = $this->db->query($total);
    
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
    // var_dump($ret_val['data']->result());
    // die();
    return $ret_val;
  }

  // PRODUCE QUERY
  public function query_per_outlet_month($column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('sales_outlet a');
    $this->db->join('outlet b', 'a.id_outlet = b.id');
    $this->db->join('produk c', 'a.id_produk = c.id');
    $this->db->join('sales_outlet_diskon d', 'a.id = d.id_sales_outlet', 'left');
    $this->db->where('a.tahun', $this->session->userdata('tahun'));
    $this->db->where('a.hapus', null);
    $this->db->group_by('CONCAT(a.id_outlet, DATE_FORMAT(a.tanggal, \'%m\'))', FALSE);
    $result = $this->db->get();
    return $this->db->last_query();
  }

  public function get_data_per_outlet_month($column = '*')
  {
    $total = $this->query_per_outlet_month($column);
    $result = $this->db->query($total);
    
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
    // var_dump($ret_val['data']->result());
    // die();
    return $ret_val;
  }

  // detail data sales per outlet

  // PRODUCE QUERY
  public function query_concat_outlet_produk_by_outlet($id_outlet, $column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('sales_outlet a');
    $this->db->join('produk b', 'a.id_produk = b.id');
    $this->db->join('sales_outlet_diskon c', 'a.id = c.id_sales_outlet', 'left');
    $this->db->where('a.id_outlet', $id_outlet);
    $this->db->where('a.tahun', $this->session->userdata('tahun'));
    $this->db->where('a.hapus', null);
    $this->db->group_by('a.id_produk');
    $result = $this->db->get();
    return $this->db->last_query();
  }

  public function get_data_concat_outlet_produk_by_outlet($id_outlet, $column = '*')
  {
    $total = $this->query_concat_outlet_produk_by_outlet($id_outlet, $column);
    $result = $this->db->query($total);
    
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
    // var_dump($ret_val['data']->result());
    // die();
    return $ret_val;
  }

  // PRODUCE QUERY
  public function query_per_produk_by_outlet($id_outlet, $column = '*')
  {
    $this->db->select($column, FALSE);
    $this->db->from('sales_outlet a');
    $this->db->join('produk b', 'a.id_produk = b.id');
    $this->db->join('sales_outlet_diskon c', 'a.id = c.id_sales_outlet');
    $this->db->where('a.id_outlet', $id_outlet);
    $this->db->where('a.tahun', $this->session->userdata('tahun'));
    $this->db->where('a.hapus', null);
    $this->db->group_by('CONCAT(a.id_produk, DATE_FORMAT(a.tanggal, \'%m\'))', FALSE);
    $result = $this->db->get();
    // echo  $this->db->last_query();
    // die();
    return $this->db->last_query();
  }

  public function get_data_produk_by_outlet($id_outlet, $column = '*')
  {
    $total = $this->query_per_produk_by_outlet($id_outlet, $column);
    $result = $this->db->query($total);
    
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
    // var_dump($ret_val['data']->result());
    // die();
    return $ret_val;
  }

  /////////
  // CUD //
  /////////

  public function store($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('sales_outlet');
    $this->db->query($query);
  }

  public function store_diskon($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('sales_outlet_diskon');
    $this->db->query($query);
  }
}