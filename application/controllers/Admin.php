<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function  __construct(){
		parent:: __construct();
    $this->session->set_userdata('tahun', '2018');
		$this->load->helper('url');
		$this->load->library('upload');
		$this->load->library('image_lib');
		error_reporting(0);
	}

	public function index()
	{
		// daily sales activity
		$data['title'] = $this->saldis->get_title('a.id_distributor, UPPER(c.alias_distributor) as alias_distributor');
		$data['sales_area'] = $this->saldis->get_data_sales_per_area('d.id, c.alias_distributor, CONCAT(c.id, d.id) as area_dist, SUM((a.jumlah * e.harga_master)) as nominal_penjualan');
		$data['sales'] = $this->result_builder_daily_sales($data['sales_area']);
		
		// var_dump($data['title']['data']->result_array());
		// die();
		// end of - daily sales activity

		$data['sales_per_detailer'] = $this->sald->get_data_per_detailer('a.id_detailer, UPPER(c.nama) as nama_detailer, UPPER(e.area) as area, UPPER(e.alias_area) as alias_area,  SUM(a.target * d.harga_master) as nominal_target, SUM(a.jumlah * d.harga_master) as nominal_penjualan, (SUM(a.jumlah * d.harga_master) / SUM(a.target * d.harga_master) * 100) as achievement');

		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('dashboard', $data);
		$this->load->view('footer-js');
	}

	public function result_builder_daily_sales($data = array())
	{
		$sales_reg = 0;
		$area = $this->saldis->get_placeholder('d.id, UPPER(d.area) as area');
		$placeholder = $data['data']->result_array();
		$replacement = $this->saldis->get_data_sales_per_area('CONCAT(c.id, d.id) as area_dist, SUM((a.jumlah * e.harga_master)) as nominal_penjualan, c.alias_distributor');
		$result = array();

		// repopulate placeholder
		foreach ($area['data']->result_array() as $key => $value) {
			$result[$key] = array(
				'id_area' => $value['id'],
				'area' => $value['area'],
			);
		}
		// var_dump($result);

		// var_dump($placeholder);
		foreach ($result as $key => $value) {
			foreach ($placeholder as $index => $item) {
				if ($item['id'] == $result[$key]['id_area']) {
					$result[$key][$item['alias_distributor']] = $item['area_dist'];
				}
				else {
					$result[$key][$item['alias_distributor']] = 0;
				}
			}
		}

		// var_dump($replacement['data']->result_array());
		foreach ($result as $key => $value) {
			foreach ($replacement['data']->result_array() as $index => $item) {
				if ($item['area_dist'] === $result[$key][$item['alias_distributor']]) {
					$result[$key][$item['alias_distributor']] = $item['nominal_penjualan'];
				}
			}
		}
		// var_dump($result);
		return $result;
	}

	public function daily_sales_product()
	{
		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('report/daily-sales-product');
		$this->load->view('footer-js');
	}

	public function daily_sales_outlet()
	{
		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('report/daily-sales-outlet');
		$this->load->view('footer-js');
	}
	
}
