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
		$data['sales_per_detailer'] = $this->sald->get_data_per_detailer('a.id_detailer, UPPER(c.nama) as nama_detailer, UPPER(e.area) as area, UPPER(e.alias_area) as alias_area,  SUM(a.target * d.harga_master) as nominal_target, SUM(a.jumlah * d.harga_master) as nominal_penjualan, (SUM(a.jumlah * d.harga_master) / SUM(a.target * d.harga_master) * 100) as achievement');

		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('dashboard', $data);
		$this->load->view('footer-js');
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
