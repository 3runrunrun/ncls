<?php 

class Home_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		date_default_timezone_set("Asia/Jakarta");
	}
	public function get_slider()
	{
		return $this->db->get('slider');
	}
	public function get_merk_jumlah()
	{
		return $this->db->query("SELECT merk, merk.id_merk, COUNT(id_produk) AS jumlah FROM merk JOIN produk ON merk.id_merk= produk.id_merk;");
	}
	public function get_produk($page)
	{
		$start= ($page*6)-6;
		$end= $page*6;
		$query= "SELECT produk.id_produk, nama_produk, produk.id_jenis, produk.id_merk, tanggal_input,
		  stok, status_produk, ukuran, warna, spesifikasi, harga_1, 
		  harga_2, harga_3, harga_4, harga_5, harga_beli, lain_lain, merk,
		  jenis_produk, jenis_room, gambar_produk
		  FROM produk 
		  JOIN gambar_produk ON gambar_produk.id_produk= produk.id_produk 
		  JOIN merk ON merk.id_merk= produk.id_merk 
		  JOIN jenis_produk ON jenis_produk.id_jenis= produk.id_jenis limit ".$start.",".$end;
		return $this->db->query($query);
	}
	public function get_produk_jenis($id, $page)
	{
		$start= ($page*6)-6;
		$end= $page*6;
		$query= "SELECT produk.id_produk, nama_produk, produk.id_jenis, produk.id_merk, tanggal_input,
		  stok, status_produk, ukuran, warna, spesifikasi, harga_1, 
		  harga_2, harga_3, harga_4, harga_5, harga_beli, lain_lain, merk,
		  jenis_produk, jenis_room, gambar_produk
		  FROM produk 
		  JOIN gambar_produk ON gambar_produk.id_produk= produk.id_produk 
		  JOIN merk ON merk.id_merk= produk.id_merk 
		  JOIN jenis_produk ON jenis_produk.id_jenis= produk.id_jenis where jenis_produk.id_jenis='$id' limit ".$start.",".$end;
		return $this->db->query($query);
	}
	public function get_produk_merek($id, $page)
	{
		$start= ($page*6)-6;
		$end= $page*6;
		$query= "SELECT produk.id_produk, nama_produk, produk.id_jenis, produk.id_merk, tanggal_input,
		  stok, status_produk, ukuran, warna, spesifikasi, harga_1, 
		  harga_2, harga_3, harga_4, harga_5, harga_beli, lain_lain, merk,
		  jenis_produk, jenis_room, gambar_produk
		  FROM produk 
		  JOIN gambar_produk ON gambar_produk.id_produk= produk.id_produk 
		  JOIN merk ON merk.id_merk= produk.id_merk 
		  JOIN jenis_produk ON jenis_produk.id_jenis= produk.id_jenis where merk.id_merk='$id' limit ".$start.",".$end;
		return $this->db->query($query);
	}
	public function get_produk_new()
	{
		return $this->db->query("SELECT produk.id_produk, nama_produk, produk.id_jenis, produk.id_merk, tanggal_input,
		  stok, status_produk, ukuran, warna, spesifikasi, harga_1, 
		  harga_2, harga_3, harga_4, harga_5, harga_beli, lain_lain, merk,
		  jenis_produk, jenis_room, gambar_produk
		  FROM produk 
		  JOIN gambar_produk ON gambar_produk.id_produk= produk.id_produk 
		  JOIN merk ON merk.id_merk= produk.id_merk 
		  JOIN jenis_produk ON jenis_produk.id_jenis= produk.id_jenis ORDER BY produk.id_produk LIMIT 0, 6;");
	}
	public function get_produk_rand()
	{
		return $this->db->query("SELECT produk.id_produk, nama_produk, produk.id_jenis, produk.id_merk, tanggal_input,
		  stok, status_produk, ukuran, warna, spesifikasi, harga_1, 
		  harga_2, harga_3, harga_4, harga_5, harga_beli, lain_lain, merk,
		  jenis_produk, jenis_room, gambar_produk
		  FROM produk 
		  JOIN gambar_produk ON gambar_produk.id_produk= produk.id_produk 
		  JOIN merk ON merk.id_merk= produk.id_merk 
		  JOIN jenis_produk ON jenis_produk.id_jenis= produk.id_jenis ORDER BY rand() LIMIT 0, 3;");
	}
	public function count_produk()
	{
		return $this->db->query("SELECT COUNT(id_produk)/12 AS pagging FROM produk;");
	}
	public function count_jenis($id)
	{
		return $this->db->query("SELECT COUNT(id_produk)/12 AS pagging FROM produk where id_jenis= '$id';");
		# code...
	}
	public function count_merek($id)
	{
		return $this->db->query("SELECT COUNT(id_produk)/12 AS pagging FROM produk where id_merk= '$id';");
		# code...
	}
	public function get_promo()
	{
		return $this->db->query("SELECT produk.id_produk, nama_produk, produk.id_jenis, produk.id_merk, tanggal_input,
 stok, status_produk, ukuran, warna, spesifikasi, harga_1, harga_2, harga_3, harga_4, harga_5,
 harga_beli, lain_lain, merk, tanggal_berlaku, tanggal_mulai,id_promo , kebijakan_promo, nama_promo, jenis_produk, jenis_room, gambar_produk 
FROM produk JOIN gambar_produk ON gambar_produk.id_produk= produk.id_produk 
JOIN merk ON merk.id_merk= produk.id_merk JOIN jenis_produk ON jenis_produk.id_jenis= produk.id_jenis
 JOIN promo ON produk.id_produk= promo.id_produk ORDER BY produk.id_produk LIMIT 0,4 ");
	}
	public function get_promo_all()
	{
		return $this->db->query("SELECT produk.id_produk, nama_produk, produk.id_jenis, produk.id_merk, tanggal_input,
 stok, status_produk, ukuran, warna, spesifikasi, harga_1, harga_2, id_promo, harga_3, harga_4, harga_5,
 harga_beli, lain_lain, merk, tanggal_berlaku, tanggal_mulai, kebijakan_promo, nama_promo, jenis_produk, jenis_room, gambar_produk 
FROM produk JOIN gambar_produk ON gambar_produk.id_produk= produk.id_produk 
JOIN merk ON merk.id_merk= produk.id_merk JOIN jenis_produk ON jenis_produk.id_jenis= produk.id_jenis
 JOIN promo ON produk.id_produk= promo.id_produk ORDER BY produk.id_produk ");
	}
	public function get_promo_detail($id_promo)
	{
		return $this->db->query("SELECT produk.id_produk, nama_produk, produk.id_jenis, produk.id_merk, tanggal_input,
 stok, status_produk, ukuran, warna, spesifikasi, harga_1, harga_2, harga_3, harga_4, harga_5,
 harga_beli, lain_lain, merk, tanggal_berlaku, tanggal_mulai, id_promo, kebijakan_promo, nama_promo, jenis_produk, jenis_room, gambar_produk 
FROM produk JOIN gambar_produk ON gambar_produk.id_produk= produk.id_produk 
JOIN merk ON merk.id_merk= produk.id_merk JOIN jenis_produk ON jenis_produk.id_jenis= produk.id_jenis
 JOIN promo ON produk.id_produk= promo.id_produk where id_promo= '$id_promo'");
	}
	public function set_register($nama, $alamat, $nomo_hp, $email, $password)
	{
		$data = array('nama' => $nama, 'alamat'=> $alamat, 'nomor_hp'=> $nomo_hp, 'email'=>$email, 'password'=> $password );
		$this->db->insert('customer', $data);
	}
	public function get_customer($email)
	{
		$this->db->where('email', $email);
		return $this->db->get('customer');
	}
	public function login($email, $password)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		return $this->db->get('customer');
	}
	public function get_akun($id)
	{
		$this->db->where('id_customer', $id);
		return $this->db->get('customer');
	}
	public function search($key)
	{
		return $this->db->query("SELECT produk.id_produk, nama_produk, produk.id_jenis, produk.id_merk, tanggal_input,
		  stok, status_produk, ukuran, warna, spesifikasi, harga_1, 
		  harga_2, harga_3, harga_4, harga_5, harga_beli, lain_lain, merk,
		  jenis_produk, jenis_room, gambar_produk
		  FROM produk 
		  JOIN gambar_produk ON gambar_produk.id_produk= produk.id_produk 
		  JOIN merk ON merk.id_merk= produk.id_merk 
		  JOIN jenis_produk ON jenis_produk.id_jenis= produk.id_jenis LIKE nama_produk='%$key%';");
	}

}