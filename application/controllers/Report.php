<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
  public function  __construct(){
    parent:: __construct();
    $this->session->set_userdata('tahun', '2018');
    date_default_timezone_set('Asia/Jakarta');
    $this->load->helper('url');
    $this->load->library('upload');
    $this->load->library('image_lib');
    error_reporting(0);
  }
  public function index()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('dashboard');
    $this->load->view('footer-js');
  }

  /////////////////
  // DAILY SALES //
  /////////////////

  public function show_ko()
  {
    $id_distributor = $this->input->post('id_distributor');
    $id_detailer = $this->input->post('id_detailer');
    $id_outlet = $this->input->post('id_outlet');
    $id_produk = $this->input->post('id_produk');
    $id_ko = $this->input->post('id_ko');
    $data = $this->ako->get_data_by_sales($id_distributor, $id_detailer, $id_outlet, $id_produk, $id_ko, 'a.id_ko, UPPER(b.nama) as nama_produk, a.jumlah, a.on_total, a.off_total');
    echo json_encode($data['data']->result_array());
  }

  public function show_stok()
  {
    $id_distributor = $this->input->post('id_distributor');
    $id_produk = $this->input->post('id_produk');
    $data = $this->stokd->show($id_distributor, $id_produk, 'stok');
    echo json_encode($data['data']->result_array());
  }

  private function check_if_any_produk_outlet($id_produk, $id_outlet)
  {
    $flag = TRUE;
    $result = $this->Produk->show_by_produk_outlet($id_produk, $id_outlet);
    $row = $result['data']->num_rows();

    if ($row == 0) {
      $flag = FALSE;
    } 

    return $flag;
  }

  public function store_daily_sales($key = null)
  {
    $this->db->trans_begin();
    if ($key == 'delete') {
      # code...
    } elseif ($key == 'edit') {
      # code...
    } else {
      $input_var = $this->input->post();

      $sal = array();
      $saldo = array();
      $produk_outlet = array();

      foreach ($input_var['id_produk'] as $key => $value) {
        // check if any produk_outlet
        // jika tidak insert di produk_outlet
        if ($this->check_if_any_produk_outlet($value, $input_var['id_outlet']) === FALSE) {
          $produk_outlet['id_produk'] = $value;
          $produk_outlet['id_outlet'] = $input_var['id_outlet'];
          // var_dump($produk_outlet);
          $this->Produk->store_produk_outlet($produk_outlet);
        } 

        $sal['id'] = $this->nsu->digit_id_generator(5, 'sal');
        $sal['tahun'] = date('Y');
        $sal['id_produk'] = $value;
        $sal['id_distributor'] = $input_var['id_distributor'];
        $sal['id_detailer'] = $input_var['id_detailer'];
        $sal['id_outlet'] = $input_var['id_outlet'];
        $sal['tanggal'] = $input_var['tanggal'];
        $sal['jumlah'] = $input_var['jumlah'][$key];
        $sal['target'] = $input_var['target'][$key];
        // var_dump($sal);
        $this->salo->store($sal);

        if ($input_var['id_ko'][$key] !== '') {
          $cek_ako = $this->ako->get_data_by_sales($sal['id_distributor'], $sal['id_detailer'], $sal['id_outlet'], $sal['id_produk'], $input_var['id_ko'][$key]);
          if ($cek_ako['data']->num_rows() > 0) {
            $saldo['id_sales_outlet'] = $sal['id'];
            $saldo['id_ko'] = $input_var['id_ko'][$key];
            $saldo['diskon_on'] = $input_var['diskon_on'][$key];
            $saldo['diskon_off'] = $input_var['diskon_off'][$key];
            // var_dump($saldo);
            $this->salo->store_diskon($saldo);
          }
        }

        // barang keluar -- kurangi stok
        $this->store_barang_keluar($sal);
      }

      // var_dump($input_var);
      // die();

      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->session->set_flashdata('error_msg', 'Penambahan daily sales <strong>gagal</strong>.');
      } else {
        // $this->db->trans_rollback();
        $this->db->trans_commit();
        $this->session->set_flashdata('success_msg', 'Daily sales <strong>berhasil</strong> disimpan.');
      }
    }
    
    redirect('/daily-sales-product');
  }

  public function store_barang_keluar($data = array())
  {
    $barang_keluar = array();
    $barang_stok_bulanan = array();
    $barang_stok = array();

    // var_dump($data);
    $barang_keluar['id_barang'] = $data['id_produk'];
    $barang_keluar['id_distributor'] = $data['id_distributor'];
    $barang_keluar['tahun'] = date('Y');
    $barang_keluar['tanggal_keluar'] = date('Y-m-d H:i:s');
    $barang_keluar['jumlah_keluar'] = $data['jumlah'];
    // var_dump($barang_keluar);
    $this->stokkd->store($barang_keluar);

    $barang_stok_bulanan['id_barang'] = $data['id_produk'];
    $barang_stok_bulanan['id_distributor'] = $data['id_distributor'];
    $barang_stok_bulanan['jumlah_keluar'] = $data['jumlah'];
    // var_dump($barang_stok_bulanan);
    $this->store_stok_bulanan_keluar($barang_stok_bulanan, 'keluar');

    $barang_stok['id_barang'] = $data['id_produk'];
    $barang_stok['id_distributor'] = $data['id_distributor'];
    $barang_stok['tahun'] = date('Y');
    $barang_stok['stok'] = $data['jumlah'];
    // var_dump($barang_stok);
    $this->store_stok_keluar($barang_stok, 'keluar');
  }

  public function store_stok_bulanan_keluar($data = array(), $flag)
  {
    if ($this->cek_laporan_by_tahun_bulan_keluar($data['id_barang'], $data['id_distributor']) === false) {
      $data['bulan'] = date('m');
      $data['tahun'] = date('Y');
      $data['sisa'] = $data['jumlah_keluar'];
      $this->stokbd->store($data);
    } else {
      $this->stokbd->update_laporan($data['id_barang'], $data['id_distributor'], date('m'), date('Y'), $data['jumlah_keluar'], $flag);
    }
  }

  public function cek_laporan_by_tahun_bulan_keluar($id_barang, $id_distributor)
  {
    return $this->stokbd->cek_laporan_by_tahun_bulan($id_barang, $id_distributor, date('Y'), date('m'));
  }

  public function store_stok_keluar($data = array(), $flag)
  {
    if ($this->cek_stok_keluar($data['id_barang'], $data['id_distributor']) === false) {
      $this->stokd->store($data);
    } else {
      $this->stokd->update_stok($data['id_barang'], $data['id_distributor'], $data['stok'], $flag);
    }
  }

  private function cek_stok_keluar($id_barang, $id_distributor)
  {
    return $this->stokd->cek_stok($id_barang, $id_distributor);
  }

  // PER PRODUCT

  public function result_builder_sales_produk($result_base)
  {
    $result = $result_base['data']->result_array();
    $replacement = array();
    $col = array('jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'des');
    
    $data = $this->salo->get_data_per_produk('a.id_produk,
      a.tanggal,
      CONCAT(a.id_produk, d.alias_area, DATE_FORMAT(a.tanggal, \'%m\')) as produk_month,
      SUM((a.jumlah * c.harga_master)) - SUM((a.jumlah * c.harga_master) * ((COALESCE(e.diskon_on, 0) + COALESCE(e.diskon_off, 0)) / 100)) as nominal_penjualan');

    foreach ($data['data']->result_array() as $key => $value) {
      $replacement[$value['produk_month']] = $value['nominal_penjualan'];
    }

    foreach ($result as $key => $value) {
      foreach ($value as $index => $item) {
        if (in_array($index, $col)) {
          $result[$key][$index] = str_replace(array_keys($replacement), $replacement, $result[$key][$index], $count);
          if ($count == 0) {
            $result[$key][$index] = 0;
          }
        }
      }
    }

    return $result;
  }

  public function daily_sales_produk()
  {
    $data['distributor'] = $this->Distributor->get_data('a.id, upper(a.nama) as nama, upper(c.alias_area) as alias_area, upper(c.area) as area, upper(b.alias_distributor) as alias_distributor');
    $data['detailer'] = $this->Detailer->get_data('a.id, upper(c.alias_area) as alias_area, upper(a.nama) as nama');
    $data['outlet'] = $this->Outlet->get_data('a.id, upper(a.nama) as nama, upper(d.alias_area) as alias_area');
    $data['produk'] = $this->Produk->get_data('id, nama');
    $data['diskon'] = $this->ako->get_data(' DISTINCT a.id_ko, UPPER(a.jenis) as jenis');

    /**
     * Result builder for daily sales product
     */
    $result_base = $this->salo->get_data_concat_product_months('a.id_produk, 
        upper(c.nama) as nama_produk,
        upper(d.area) as area,
        upper(d.alias_area) as alias_area,
        SUM((a.jumlah * c.harga_master)) - SUM((a.jumlah * c.harga_master) * ((COALESCE(e.diskon_on, 0) + COALESCE(e.diskon_off, 0)) / 100)) as nominal_penjualan,
        SUM((a.target * c.harga_master)) - SUM((a.jumlah * c.harga_master) * ((COALESCE(e.diskon_on, 0) + COALESCE(e.diskon_off, 0)) / 100)) as nominal_target,
        CONCAT(a.id_produk, d.alias_area, "01") as jan, 
        CONCAT(a.id_produk, d.alias_area, "02") as feb, 
        CONCAT(a.id_produk, d.alias_area, "03") as mar, 
        CONCAT(a.id_produk, d.alias_area, "04") as apr, 
        CONCAT(a.id_produk, d.alias_area, "05") as may, 
        CONCAT(a.id_produk, d.alias_area, "06") as jun, 
        CONCAT(a.id_produk, d.alias_area, "07") as jul, 
        CONCAT(a.id_produk, d.alias_area, "08") as aug, 
        CONCAT(a.id_produk, d.alias_area, "09") as sep, 
        CONCAT(a.id_produk, d.alias_area, "10") as oct, 
        CONCAT(a.id_produk, d.alias_area, "11") as nov, 
        CONCAT(a.id_produk, d.alias_area, "12") as des');
    $data['dsales_produk'] = $this->result_builder_sales_produk($result_base);

    if ($data['dsales_produk']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['dsales_produk']['data']);
    }

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/daily-sales/daily-sales-product', $data);
    $this->load->view('footer-js');
  }

  // PER OUTLET

  public function result_builder_sales_outlet($result_base)
  {
    $result = $result_base['data']->result_array();
    $replacement = array();
    $col = array('jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'des');
    $opcounter = 0;
    

    $data = $this->salo->get_data_per_outlet_month('a.id_outlet,
      a.tanggal,
      CONCAT(a.id_outlet, DATE_FORMAT(a.tanggal, \'%m\')) as outlet_month,
      SUM((a.jumlah * c.harga_master)) - SUM((a.jumlah * c.harga_master) * ((COALESCE(d.diskon_on, 0) + COALESCE(d.diskon_off, 0)) / 100)) as nominal_penjualan');

    // var_dump($data['data']->result_array());
    // var_dump($result_base['data']->result_array());

    foreach ($data['data']->result_array() as $key => $value) {
      $replacement[$value['outlet_month']] = $value['nominal_penjualan'];
    }

    // var_dump($replacement);
    // var_dump($result);

    foreach ($result as $key => $value) {
      foreach ($value as $index => $item) {
        if (in_array($index, $col)) {
          $result[$key][$index] = str_replace(array_keys($replacement), $replacement, $result[$key][$index], $count);
          if ($count == 0) {
            $result[$key][$index] = 0;
          }
        }
      }
    }
    // var_dump($result);

    return $result;
  }

  public function daily_sales_outlet()
  {
    $data['area'] = $this->Area->get_data('id, upper(area) as area, upper(alias_area) as alias_area');
    $data['distributor'] = $this->Distributor->get_data('a.id, upper(a.nama) as nama, upper(c.alias_area) as alias_area, upper(c.area) as area, upper(b.alias_distributor) as alias_distributor');
    $data['detailer'] = $this->Detailer->get_data('a.id, upper(c.alias_area) as alias_area, upper(a.nama) as nama');
    $data['outlet'] = $this->Outlet->get_data('a.id, upper(a.nama) as nama, upper(d.alias_area) as alias_area');
    $data['produk'] = $this->Produk->get_data('id, nama');
    $data['diskon'] = $this->ako->get_data(' DISTINCT a.id_ko, UPPER(a.jenis) as jenis');

    /**
     * Result builder for daily sales outlet
     */
    
    $result_base = $this->salo->get_data_concat_months('a.id_outlet, 
      UPPER(b.nama) as nama_outlet,
      UPPER(d.area) as area,
      UPPER(d.alias_area) as alias_area,
      SUM((a.jumlah * c.harga_master)) - SUM((a.jumlah * c.harga_master) * ((COALESCE(e.diskon_on, 0) + COALESCE(e.diskon_off, 0)) / 100)) as nominal_penjualan,
      SUM((a.target * c.harga_master)) - SUM((a.jumlah * c.harga_master) * ((COALESCE(e.diskon_on, 0) + COALESCE(e.diskon_off, 0)) / 100)) as nominal_target,
      CONCAT(a.id_outlet, "01") as jan, 
      CONCAT(a.id_outlet, "02") as feb, 
      CONCAT(a.id_outlet, "03") as mar, 
      CONCAT(a.id_outlet, "04") as apr, 
      CONCAT(a.id_outlet, "05") as may, 
      CONCAT(a.id_outlet, "06") as jun, 
      CONCAT(a.id_outlet, "07") as jul, 
      CONCAT(a.id_outlet, "08") as aug, 
      CONCAT(a.id_outlet, "09") as sep, 
      CONCAT(a.id_outlet, "10") as oct, 
      CONCAT(a.id_outlet, "11") as nov, 
      CONCAT(a.id_outlet, "12") as des');
    $data['msales_outlet'] = $this->result_builder_sales_outlet($result_base);
    
    if ($data['msales_outlet']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['msales_outlet']['data']);
    }

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/daily-sales/daily-sales-outlet', $data);
    $this->load->view('footer-js');
  }

  //////////////////////////////////
  // detail data sales per outlet //
  //////////////////////////////////

  public function result_builder_sales_outlet_produk($id_outlet, $result_base)
  {
    $result = $result_base['data']->result_array();
    $replacement = array();
    $col = array('jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'des');
    

    $data = $this->salo->get_data_produk_by_outlet($id_outlet, 'a.id_produk, 
      a.tanggal, CONCAT(a.id_produk, 
      DATE_FORMAT(a.tanggal, \'%m\')) as produk_month, 
      SUM((a.jumlah * b.harga_master)) - SUM((a.jumlah * b.harga_master) * ((COALESCE(c.diskon_on, 0) + COALESCE(c.diskon_off, 0)) / 100)) as nominal_penjualan');

    // die();

    // var_dump($data['data']->result_array());
    // var_dump($result_base['data']->result_array());

    foreach ($data['data']->result_array() as $key => $value) {
      $replacement[$value['produk_month']] = $value['nominal_penjualan'];
    }

    // var_dump($replacement);
    // var_dump($result);

    foreach ($result as $key => $value) {
      foreach ($value as $index => $item) {
        if (in_array($index, $col)) {
          $result[$key][$index] = str_replace(array_keys($replacement), $replacement, $result[$key][$index], $count);
          if ($count == 0) {
            $result[$key][$index] = 0;
          }
        }
      }
    }
    // var_dump($result);

    return $result;
  }

  public function daily_sales_outlet_produk($id_outlet)
  {
    $data['area'] = $this->Area->get_data('id, upper(area) as area, upper(alias_area) as alias_area');
    $data['outlet'] = $this->Outlet->show($id_outlet, 'upper(a.nama) as nama_outlet, upper(d.area) as area, upper(d.alias_area) as alias_area');

    /**
     * Result builder for daily sales outlet
     */
    
    $result_base = $this->salo->get_data_concat_outlet_produk_by_outlet($id_outlet, 'a.id_produk, 
      UPPER(b.nama) as nama_produk,
      SUM((a.jumlah * b.harga_master)) - SUM((a.jumlah * b.harga_master) * ((COALESCE(c.diskon_on, 0) + COALESCE(c.diskon_off, 0)) / 100)) as nominal_penjualan,
      SUM(a.jumlah),
      SUM((a.target * b.harga_master)) - SUM((a.jumlah * b.harga_master) * ((COALESCE(c.diskon_on, 0) + COALESCE(c.diskon_off, 0)) / 100)) as nominal_target,
      CONCAT(a.id_produk, "01") as jan, 
      CONCAT(a.id_produk, "02") as feb, 
      CONCAT(a.id_produk, "03") as mar, 
      CONCAT(a.id_produk, "04") as apr, 
      CONCAT(a.id_produk, "05") as may, 
      CONCAT(a.id_produk, "06") as jun, 
      CONCAT(a.id_produk, "07") as jul, 
      CONCAT(a.id_produk, "08") as aug, 
      CONCAT(a.id_produk, "09") as sep, 
      CONCAT(a.id_produk, "10") as oct, 
      CONCAT(a.id_produk, "11") as nov, 
      CONCAT(a.id_produk, "12") as des');
    $data['produk_by_outlet'] = $this->result_builder_sales_outlet_produk($id_outlet, $result_base);
    
    if ($data['produk_by_outlet']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['dsales_outlet']['data']);
    }

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/daily-sales/daily-sales-outlet-product', $data);
    $this->load->view('footer-js');
  }

  ///////////////////////
  // SALES DISTRIBUTOR //
  ///////////////////////

  public function result_builder_sales_distributor($data = array())
  {
    $sales_per_area = 0;
    $placeholder = $data;
    $replacement = array();
    $result = array();
    $col = array('jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'des');
    $empty_col = array('jan' => '01',
      'feb' => '02',
      'mar' => '03',
      'apr' => '04',
      'may' => '05',
      'jun' => '06',
      'jul' => '07',
      'aug' => '08',
      'sep' => '09',
      'oct' => '10',
      'nov' => '11',
      'des' => '12');
    $arld = $this->saldis->get_title('c.id as id_distributor, c.alias_distributor');
    $list_distributor = $arld['data']->result_array();
    $ara = $this->saldis->get_placeholder_per_month('d.id as id_area, d.alias_area, d.area');
    $area = $ara['data']->result_array();

    // var_dump($placeholder);
    $data_r = $this->saldis->get_data_per_month('d.id as id_area,
      d.area,
      b.id as id_distributor,
      c.id as alias_distributor,
      CONCAT(c.alias_distributor, d.alias_area, DATE_FORMAT(a.tanggal, \'%m\')) as placeholder,
      SUM((a.jumlah * e.harga_master)) - SUM((a.jumlah * e.harga_master) * ((COALESCE(f.diskon_on, 0) + COALESCE(f.diskon_off, 0)) / 100)) as nominal_penjualan,
      SUM((a.target * e.harga_master)) - SUM((a.jumlah * e.harga_master) * ((COALESCE(f.diskon_on, 0) + COALESCE(f.diskon_off, 0)) / 100)) as nominal_target');
    foreach ($data_r['data']->result_array() as $key => $value) {
      $replacement[$value['placeholder']] = $value['nominal_penjualan'];
    }
    // var_dump($replacement);
    // var_dump($result);
    
    // isi result dengan key berdasarkan id area
    foreach ($placeholder as $key => $value) {
      $result[$value['id_area']] = array();
    }

    // var_dump($placeholder);
    // isi result dengan label = id area / alias distributor
    // isi result dengan alias area = alias area
    foreach ($result as $key => $value) {
      foreach ($area  as $ak => $ai) {
        if ($key == $ai['id_area']) {
          $result[$key][0]['label'] = $ai['area'];
          $result[$key][0]['alias_area'] = $ai['alias_area'];
        }
      }

      foreach ($list_distributor as $ldk => $ldv) {
          $result[$key][$ldk+1]['label'] = $ldv['alias_distributor'];
      }
    }
    // var_dump($result);

    // isi result dengan alias area = alias area pada key yang bukan 0
    foreach ($result as $key => $value) {
      foreach ($value as $vk => $vv) {
        if ($vk != 0) {
          foreach ($area as $ak => $av) {
            if ($key == $av['id_area']) {
              $result[$key][$vk]['alias_area'] = $av['alias_area'];
            }
          }
        }
      }
    }

    // isi result dengan placeholder per bulan
    foreach ($result as $key => $value) {
      foreach ($value as $k => $v) {
        foreach ($empty_col as $eck => $ecv) {
          $result[$key][$k][$eck] = $result[$key][$k]['label'].$result[$key][$k]['alias_area'].$ecv;
        }
      }
    }
    // var_dump($result);

    foreach ($result as $key => $value) {
      foreach ($value as $index => $item) {
        foreach ($item as $k => $v) {
          if (in_array($k, $col)) {
            $result[$key][$index][$k] = str_replace(array_keys($replacement), $replacement, $result[$key][$index][$k], $count);
            if ($count == 0) {
              $result[$key][$index][$k] = 0;
            }             
          }
        }
      }
    }
    // var_dump($result);
    
    // var_dump(ksort($result));
    // die();
    ksort($result);
    // var_dump($result);
    return $result;
  }

  public function data_sales_distributor_jenis_product()
  {
    $data['thead'] = $this->saldis->get_placeholder_per_month('d.id as id_area,
      UPPER(d.area) as area,
      UPPER(d.alias_area) as alias_area');
    $data['list_distributor'] = $this->saldis->get_title('UPPER(c.alias_distributor) as alias_distributor');
    $result_builder = $this->saldis->get_data_per_month('d.id as id_area,
      d.area,
      b.id as id_distributor,
      c.id as alias_distributor,
      CONCAT(c.alias_distributor, d.alias_area, "01") as jan, 
      CONCAT(c.alias_distributor, d.alias_area, "02") as feb, 
      CONCAT(c.alias_distributor, d.alias_area, "03") as mar, 
      CONCAT(c.alias_distributor, d.alias_area, "04") as apr, 
      CONCAT(c.alias_distributor, d.alias_area, "05") as may, 
      CONCAT(c.alias_distributor, d.alias_area, "06") as jun, 
      CONCAT(c.alias_distributor, d.alias_area, "07") as jul, 
      CONCAT(c.alias_distributor, d.alias_area, "08") as aug, 
      CONCAT(c.alias_distributor, d.alias_area, "09") as sep, 
      CONCAT(c.alias_distributor, d.alias_area, "10") as oct, 
      CONCAT(c.alias_distributor, d.alias_area, "11") as nov, 
      CONCAT(c.alias_distributor, d.alias_area, "12") as des');
    $data['sales_distributor'] = $this->result_builder_sales_distributor($result_builder['data']->result_array());

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/sales-distributor/data-sales-distributor-jenis-product', $data);
    $this->load->view('footer-js');
  }

  //////////////////
  // STOCK PRODUK //
  //////////////////

  public function stock_produk_pabrik()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/stock-produk/stock_produk_pabrik');
    $this->load->view('footer-js');
  }

  // stok nucleus
  public function stock_produk_nucleus()
  {
    $data['stok_nucleus'] = $this->stokn->get_data('b.id, UPPER(b.nama) as nama, UPPER(b.kemasan) as kemasan, a.stok as jumlah');
    $data['no_surat'] = $this->nsu->letter_number_generator('NPB');
    $data['produk'] = $this->Produk->get_data('id, nama');
    $data['permohonan'] = $this->ppn->get_data_non_delivered('a.id, a.tanggal_permohonan, a.tanggal_target, a.status');
    $data['permohonan_delivered'] = $this->ppn->get_data_delivered('a.id, a.tanggal_permohonan, a.tanggal_target, a.status');

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/stock-product/nucleus/stock_produk_nucleus', $data);
    $this->load->view('footer-js');
  }

  public function detail_permohonan_barang_nucleus($id)
  {
    $data['permohonan_detail'] = $this->ppn->show($id, 'a.id, a.tanggal_permohonan, a.tanggal_target, a.status');
    $data['permohonan'] = $this->ppnd->show($id, 'a.id as id_permohonan, c.id as id_produk, UPPER(c.nama) as nama_produk, UPPER(c.kemasan) as kemasan, b.jumlah');

    if ($data['permohonan']['status'] == 'error') {
      $this->session->set_flashdata('query_msg', $data['permohonan']['data']);
    }

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/stock-product/nucleus/detail-nucleus-pabrik', $data);
    $this->load->view('footer-js');
  }

  public function store_permohonan_barang_nucleus($key = NULL)
  {
    // begin transaction
    $this->db->trans_begin();
    if ($key == 'delete') {
      # code...
    } elseif ($key == 'edit') {
      # code...
    } else {
      $input_var = $this->input->post();
      $input_var['id'] = $this->session->flashdata('no_surat');

      $pmh = array();
      $pmh_detail = array();
      $pmh_status = array();
      $status = strtolower('waiting');

      $pmh = $input_var;
      $pmh['status'] = $status;
      $pmh['tahun'] = date('Y');
      unset($pmh['id_produk']);
      unset($pmh['jumlah']);
      $this->ppn->store($pmh);

      // repopulate and store data permohonan
      foreach ($input_var['id_produk'] as $key => $value) {
        $pmh_detail['id_permohonan'] = $input_var['id'];
        $pmh_detail['id_produk'] = $value;
        $pmh_detail['jumlah'] = $input_var['jumlah'][$key];
        $this->ppnd->store($pmh_detail);
      }

      $pmh_status['id_permohonan'] = $input_var['id'];
      $pmh_status['status'] = $status;
      $pmh_status['tanggal'] = date('Y-m-d H:i:s');
      $this->ppns->store($pmh_status);

      // var_dump($input_var);
      // die();

      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->session->set_flashdata('error_msg', 'Penambahan data permohonan barang <strong>gagal</strong>.');
      } else {
        $this->db->trans_commit();
        $this->session->set_flashdata('success_msg', 'Data permohonan barang <strong>berhasil</strong> disimpan.');
      }
    }
    redirect('/stock-produk-nucleus');
  }

  public function show_verifikasi_pbn()
  {
    $id = $this->input->post('id');
    $result = $this->ppnd->show($id, 'c.id as id_produk, UPPER(c.nama) as nama_produk, UPPER(c.kemasan) as kemasan, b.jumlah');
    echo json_encode($result['data']->result_array());
  }

  public function store_verifikasi_barang_nucleus()
  {
    $input_var = $this->input->post();
    $ppn = array();
    $ppns = array();

    $this->db->trans_begin();

    // permohonan produk nucleus status
    $ppns['id_permohonan'] = $input_var['kode_permohonan'];
    $ppns['tanggal'] = date('Y-m-d H:i:s');
    $ppns['status'] = $input_var['status'];
    // var_dump($ppns);
    $this->ppns->store($ppns);

    // permohonan produk nucleus
    $ppn['status'] = $input_var['status'];
    // var_dump($ppn);
    $this->ppn->update($input_var['kode_permohonan'], $ppn);

    if ($input_var['status'] == 'delivered') {
      $data = $this->ppnd->show($input_var['kode_permohonan'], 'b.id_produk, b.jumlah');
      $this->store_barang_masuk($data['data']->result_array());
    }

    // check transaction status
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $this->session->set_flashdata('error_msg', 'Verifikasi status permohonan barang <strong>gagal</strong>.');
    } else {
      // $this->db->trans_rollback();
      $this->db->trans_commit();
      $this->session->set_flashdata('success_msg', 'Status permohonan barang <strong>berhasil</strong> disimpan.');
    }

    redirect('/stock-produk-nucleus');
  }

  public function store_barang_masuk($data = array())
  {
    $barang_masuk = array();
    $barang_stok_bulanan = array();
    $barang_stok = array();

    foreach ($data as $key => $value) {
      $barang_masuk['id_barang'] = $value['id_produk'];
      $barang_masuk['tahun'] = date('Y');
      $barang_masuk['tanggal_masuk'] = date('Y-m-d H:i:s');
      $barang_masuk['jumlah_masuk'] = $value['jumlah'];
      $this->stokmn->store($barang_masuk);

      $barang_stok_bulanan['id_barang'] = $value['id_produk'];
      $barang_stok_bulanan['jumlah_masuk'] = $value['jumlah'];
      $this->store_stok_bulanan($barang_stok_bulanan, 'masuk');

      $barang_stok['id_barang'] = $value['id_produk'];
      $barang_stok['tahun'] = date('Y');
      $barang_stok['stok'] = $value['jumlah'];
      $this->store_stok($barang_stok, 'masuk');
    }
  }

  public function store_stok_bulanan($data = array(), $flag)
  {
    if ($this->cek_laporan_by_tahun_bulan($data['id_barang']) === false) {
      $data['bulan'] = date('m');
      $data['tahun'] = date('Y');
      $data['sisa'] = $data['jumlah_masuk'];
      $this->stokbn->store($data);
    } else {
      $this->stokbn->update_laporan($data['id_barang'], date('m'), date('Y'), $data['jumlah_masuk'], $flag);
    }
  }

  public function cek_laporan_by_tahun_bulan($id_barang)
  {
    return $this->stokbn->cek_laporan_by_tahun_bulan($id_barang, date('Y'), date('m'));
  }

  public function store_stok($data = array(), $flag)
  {
    if ($this->cek_stok($data['id_barang']) === false) {
      $this->stokn->store($data);
    } else {
      $this->stokn->update_stok($data['id_barang'], $data['stok'], $flag);
    }
  }

  private function cek_stok($id_barang)
  {
    return $this->stokn->cek_stok($id_barang);
  }

  // stok distributor
  public function stock_produk_distributor()
  {
    $data['stok_distributor'] = $this->stokd->get_data('a.id_distributor, UPPER(c.nama) as nama_distributor, UPPER(d.alias_distributor) as alias_distributor, UPPER(e.area) as area, b.id, UPPER(b.nama) as nama, UPPER(b.kemasan) as kemasan, a.stok as jumlah');

    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/stock-product/distributor/stock_produk_distributor', $data);
    $this->load->view('footer-js');
  }

  public function analisa_sales($key= null)
  {
    if($key== null){
      $this->load->view('head');
      $this->load->view('navbar');
      $this->load->view('report/analisa_sales');
      $this->load->view('footer-js');
    }else{
      $this->load->view('head');
      $this->load->view('navbar');
      $this->load->view('report/analisa_sales_sales');
      $this->load->view('footer-js');

    }
  }

  public function pemindahan_sales()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/pemindahan_sales');
    $this->load->view('footer-js');
  }
  public function klm_dana()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/daily-sales-product');
    $this->load->view('footer-js');
  }
  public function klm_sales()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/daily-sales-product');
    $this->load->view('footer-js');
  }
  public function donasi()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/donasi');
    $this->load->view('footer-js');
  }
  public function actual_sales()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/actual_sales');
    $this->load->view('footer-js');
  }

  /////////////////////////////////
  // EVALUASI ANALISIS BREAKDOWN //
  /////////////////////////////////

  public function analisis_sales_general()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/laporan-sales-med');
    $this->load->view('footer-js');
  }

  public function detail_analisis_sales_general()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/detail-laporan-sales-med');
    $this->load->view('footer-js');
  }

  public function analisis_sales_per_produk()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/laporan-sales-med-per-produk');
    $this->load->view('footer-js');
  }

  public function detail_analisis_sales_per_produk()
  {
    $this->load->view('head');
    $this->load->view('navbar');
    $this->load->view('report/detail-laporan-sales-med-per-produk');
    $this->load->view('footer-js');
  }
  
}

