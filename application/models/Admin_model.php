<?php 

class Admin_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		date_default_timezone_set("Asia/Jakarta");
	}
	public function get_login($username, $password)
	{
		$this->db->where('username',$username);
		$this->db->where('password', $password);
		return $this->db->get('user_karyawan');
	}
	public function get_user()
	{
		return $this->db->get('user_karyawan');
	}
	public function insert_kecamatan($kecamatan)
	{
		$data = array('nama_kecamatan' => $kecamatan );
		$this->db->insert('kecamatan', $data);
	}
	public function get_kecamatan(){
		return $this->db->get('kecamatan');
	}
	public function insert_pengiriman($id_kecamatan, $nama_kelurahan, $harga_kirim){
		$data = array('id_kecamatan' => $id_kecamatan, 'nama_kelurahan'=> $nama_kelurahan, 'harga_kirim' => $harga_kirim);
		$this->db->insert('harga_pengiriman', $data);
	}
	public function update_pengiriman($id_kelurahan, $id_kecamatan, $nama_kelurahan, $harga_kirim)
	{
		$data = array('id_kecamatan' => $id_kecamatan, 'nama_kelurahan'=> $nama_kelurahan, 'harga_kirim' => $harga_kirim);
		$this->db->where('id_kelurahan', $id_kelurahan);
		$this->db->update('harga_pengiriman', $data);
	}
	public function get_pengiriman()
	{
		return $this->db->query("
SELECT harga_pengiriman.id_kelurahan, harga_pengiriman.id_kecamatan, nama_kecamatan,
harga_pengiriman.nama_kelurahan, harga_pengiriman.harga_kirim FROM harga_pengiriman 
  JOIN kecamatan ON harga_pengiriman.id_kecamatan= kecamatan.id_kecamatan;");
	}
	public function get_pengiriman_id($id_kelurahan){
		return $this->db->query("
SELECT harga_pengiriman.id_kelurahan, harga_pengiriman.id_kecamatan, nama_kecamatan,
harga_pengiriman.nama_kelurahan, harga_pengiriman.harga_kirim FROM harga_pengiriman 
  JOIN kecamatan ON harga_pengiriman.id_kecamatan= kecamatan.id_kecamatan where id_kelurahan='$id_kelurahan';");
	}

	public function delete_kecamatan($id_kecamatan){
		$this->db->query("DELETE FROM kecamatan where id_kecamatan='$id_kecamatan';");
	}
	public function insert_suplier($nama_suplier, $alamat, $kontak, $detail_produk){
		$data = array('nama' => $nama_suplier, 'alamat' => $alamat, 'kontak'=>$kontak, 'produk'=>$detail_produk);
		$this->db->insert('suplier', $data);
	}
	public function get_suplier(){
		return $this->db->get('suplier');
	}
	public function delete_suplier($id_supplier){
		$this->db->query("DELETE FROM suplier where id_supplier='$id_supplier';");
	}
	public function get_suplier_id($id_supplier){
		return $this->db->query("SELECT * FROM suplier where id_supplier='$id_supplier';");
	}
	public function save_edit_suplier($id_supplier, $nama_suplier, $alamat, $kontak, $detail_produk){
		$data = array('nama' => $nama_suplier, 'alamat' => $alamat, 'kontak'=>$kontak, 'produk'=>$detail_produk);
		$this->db->where('id_supplier', $id_supplier);
		$this->db->update('suplier', $data);
	}
	public function save_edit_merk($id_merk, $id_supplier, $merk)
	{
		$data = array('id_supplier' => $id_supplier, 'merk'=> $merk);
		$this->db->where('id_merk', $id_merk);
		$this->db->update('merk', $data);
	}
	public function insert_merk($id_supplier, $merk)
	{
		$data = array('merk' => $merk, 'id_supplier'=> $id_supplier );
		$this->db->insert('merk', $data);
	}
	public function delete_merk($id_merk){
		$this->db->query("DELETE FROM merk where id_merk='$id_merk';");
	}
	public function get_merk(){
		return $this->db->query("SELECT merk.id_merk, merk.merk, merk.id_supplier, suplier.nama from merk JOIN suplier ON merk.id_supplier= suplier.id_supplier;");
	}
	public function get_merk_id($id_merk){
		return $this->db->query("SELECT * FROM merk where id_merk='$id_merk';");
	}
	public function get_jenisroom()
	{
		return $this->db->get('jenis_produk');
	}
	public function get_jenisroom_id($id_jenis)
	{
		$this->db->where('id_jenis', $id_jenis);
		return $this->db->get('jenis_produk');
	}
	public function delete_jenis($id_jenis)
	{
		$this->db->query("DELETE FROM jenis_produk where id_jenis='$id_jenis';");
	}
	public function insert_jenisroom($jenis_produk, $jenis_room)
	{
		$data = array('jenis_produk' => $jenis_produk,'jenis_room'=>$jenis_room  );
		$this->db->insert('jenis_produk', $data);
	}
	public function save_edit_jenisroom($id_jenis, $jenis_room, $jenis_produk)
	{
		$data = array('jenis_room' => $jenis_room, 'jenis_produk' =>$jenis_produk );
		$this->db->where('id_jenis', $id_jenis);
		$this->db->update('jenis_produk', $data);
	}
	public function get_produk()
	{
		return $this->db->query("SELECT produk.id_produk, nama_produk, produk.id_jenis, produk.id_merk, tanggal_input,
		  stok, status_produk, ukuran, warna, spesifikasi, harga_1, 
		  harga_2, harga_3, harga_4, harga_5, harga_beli, lain_lain, merk,
		  jenis_produk, jenis_room, gambar_produk
		  FROM produk 
		  JOIN gambar_produk ON gambar_produk.id_produk= produk.id_produk 
		  JOIN merk ON merk.id_merk= produk.id_merk 
		  JOIN jenis_produk ON jenis_produk.id_jenis= produk.id_jenis;");
	}
	public function get_produk_id($id_produk)
	{
		return $this->db->query("SELECT produk.id_produk, nama_produk, produk.id_jenis, produk.id_merk, tanggal_input,
		  stok, status_produk, ukuran, warna, spesifikasi, harga_1, 
		  harga_2, harga_3, harga_4, harga_5, harga_beli, lain_lain, merk,
		  jenis_produk, jenis_room, gambar_produk
		  FROM produk 
		  JOIN gambar_produk ON gambar_produk.id_produk= produk.id_produk 
		  JOIN merk ON merk.id_merk= produk.id_merk 
		  JOIN jenis_produk ON jenis_produk.id_jenis= produk.id_jenis where produk.id_produk='$id_produk';");
	}
	public function insert_nota_masuk($kode_nota, $tanggal, $jumlah_produk, $jumlah_total_produk, $harga_total, $jatuh_tempo, $status_pembayaran, $id_user)
	{
		$data = array('kode_nota' => $kode_nota, 'tanggal'=> $tanggal, 'jumlah_produk' => $jumlah_produk, 'jumlah_total_produk' =>$jumlah_total_produk, 'harga_total'=> $harga_total, 'jatuh_tempo'=>$jatuh_tempo, 'status_pembayaran'=> $status_pembayaran, 'id_user'=> $id_user );
		$this->db->insert('nota_masuk', $data);

	}
	public  function insert_nota_produk($id_produk, $jumlah_produk, $harga_per_item)
	{
		$this->db->query("INSERT into log_barang (id_produk, total, harga_per_item, id_nota_masuk) VALUES('$id_produk','$jumlah_produk', '$harga_per_item',(SELECT id_nota FROM nota_masuk ORDER BY id_nota DESC LIMIT 1))
  		;");
  		$lama = $this->db->query(" SELECT produk.stok FROM produk WHERE id_produk = '$id_produk'")->result();
  		$stok_lama=0;
  		foreach ($lama as $key ) {
  			$stok_lama=$key->stok;
  		}
  		$stok_baru= $stok_lama+$jumlah_produk;
  		$this->db->query("UPDATE produk SET stok = '$stok_baru'  WHERE produk.id_produk= '$id_produk';");

	}
	public  function get_nota_masuk()
	{
		return $this->db->query("SELECT id_nota, kode_nota, tanggal as tanggal_nota, jumlah_total_produk, jumlah_produk, harga_total,
	    jatuh_tempo, status_pembayaran, id_user, tanggal_masuk
	    from nota_masuk;");
	}
	public  function get_nota_masuk_id($id_nota)
	{
		return $this->db->query("SELECT id_nota, kode_nota, tanggal as tanggal_nota, jumlah_total_produk, jumlah_produk, harga_total,
	    jatuh_tempo, status_pembayaran, id_user, tanggal_masuk
	    from nota_masuk where id_nota='$id_nota';");
	}
	public  function get_log()
	{
		return $this->db->query("SELECT id_log, log_barang.id_produk, total, id_nota_keluar, id_nota_masuk, id_perubahan_barang, harga_per_item
  , nama_produk 
  from log_barang JOIN produk ON produk.id_produk= log_barang.id_produk;");
	}
	public function get_log_nota_id($id_nota_masuk)
	{
		return $this->db->query("SELECT id_log, log_barang.id_produk, total, id_nota_keluar, id_nota_masuk, id_perubahan_barang, harga_per_item
  , nama_produk 
  from log_barang JOIN produk ON produk.id_produk= log_barang.id_produk where id_nota_masuk='$id_nota_masuk';");
	}
	public function insert_produk($nama_produk, $id_jenis, $id_merk, $warna, $ukuran, $harga_1, $harga_2, $harga_3, $harga_4, $harga_5, $harga_beli, $spesifikasi, $lain_lain, $foto){
		$data = array('nama_produk' => $nama_produk, 'id_jenis' =>$id_jenis, 'id_merk' => $id_merk, 'harga_beli' => $harga_beli, 'harga_1' =>$harga_1, 'harga_2'=>$harga_2, 'harga_3' => $harga_3, 'harga_4' => $harga_4, 'harga_5'=>$harga_5, 'spesifikasi' => $spesifikasi, 'lain_lain'=>$lain_lain, 'ukuran'=>$ukuran, 'warna'=>$warna );
		$this->db->insert('produk', $data);
		$this->db->query("INSERT into gambar_produk (id_produk, gambar_produk) VALUES((SELECT produk.id_produk FROM produk ORDER BY id_produk DESC LIMIT 1), '$foto')
  		;");
	}
	public function insert_promo($nama_promo, $kebijakan_promo, $tanggal_mulai, $tanggal_berlaku, $id_produk)
	{
		$data = array('nama_promo' => $nama_promo,'kebijakan_promo'=>$kebijakan_promo, 'tanggal_mulai'=> $tanggal_mulai, 'tanggal_berlaku'=> $tanggal_berlaku, 'id_produk'=> $id_produk );
		$this->db->insert('promo', $data);
	}
	public function delete_promo($id_promo)
	{
		$this->db->where('id_promo', $id_promo);
		$this->db->delete('promo');
	}
	public function insert_slider($headline, $sub_headline, $deskripsi, $gambar)
	{
		$data = array('headline' => $headline, 'sub_headline' =>$sub_headline, 'deskripsi'=>$deskripsi, 'gambar'=> $gambar );
		$this->db->insert('slider', $data);
	}
	public function delete_slider($id_slider)
	{
		$this->db->where('id_slider', $id_slider);
		$this->db->delete('slider');
	}
	public function get_sales()
	{
		return $this->db->query("SELECT * from user_karyawan WHERE jabatan= 'sales';");
	}
	public function get_key($key)
	{
		return $this->db->query("SELECT id_user from user_karyawan WHERE kode= '$key' and status= 1;");
	}
	public function insert_nota_keluar($id_nota, $tanggal_nota, $nama_pembeli, $id_kelurahan, $alamat_pembeli, $nomor_hp, $sales, $jenis_pembayaran, $id_owner)
	{
		$data = array('kode_nota' => $id_nota, 'tanggal'=>$tanggal_nota, 'nama_pembeli'=>$nama_pembeli, 'alamat'=> $alamat_pembeli, 'id_kelurahan'=>$id_kelurahan, 'nomor_hp'=>$nomor_hp, 'sales'=> $sales, 'jenis_pembayaran'=>$jenis_pembayaran, 'id_owner'=>$id_owner);
		$this->db->insert('nota_keluar', $data);
		return $this->db->query("SELECT id_nota from nota_keluar ORDER by id_nota desc LIMIT 1");
	}
	public function insert_produk_keluar($id_produk, $harga_produk, $jumlah_produk, $id_nota_keluar)
	{
		$data = array('id_produk' => $id_produk,'harga_per_item'=>$harga_produk, 'id_nota_keluar'=> $id_nota_keluar, 'total'=> $jumlah_produk );
		$this->db->insert('log_barang', $data);
		$sql="UPDATE produk set stok = stok - ".$jumlah_produk." where id_produk= ".$id_produk;
		$this->db->query($sql);
	}
	public function nota_keluar_id($id_nota)
	{
		return $this->db->query("SELECT id_nota, kode_nota, nama_kelurahan, harga_kirim, nama_pembeli, nomor_hp, harga_total
   , jenis_pembayaran, tanggal from nota_keluar JOIN harga_pengiriman ON harga_pengiriman.id_kelurahan= nota_keluar.id_kelurahan WHERE id_nota='id_nota';");
	}
	public function get_log_nota_keluar($id_nota)
	{
		return $this->db->query("SELECT id_log, total, log_barang.id_produk, harga_per_item, nama_produk from log_barang JOIN produk ON log_barang.id_produk= produk.id_produk WHERE id_nota_keluar='$id_nota'");
	}
	public function get_nota_keluar()
	{
		return $this->db->query("SELECT id_nota, kode_nota, alamat, nama_kelurahan, harga_kirim, nama_pembeli, nomor_hp, harga_total
   , jenis_pembayaran, sales, id_owner, tanggal from nota_keluar JOIN harga_pengiriman ON harga_pengiriman.id_kelurahan= nota_keluar.id_kelurahan;");
	}

}