-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for nucleus_db
CREATE DATABASE IF NOT EXISTS `nucleus_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `nucleus_db`;

-- Dumping structure for table nucleus_db.area
CREATE TABLE IF NOT EXISTS `area` (
  `id` varchar(5) NOT NULL,
  `area` varchar(200) DEFAULT NULL,
  `alias_area` varchar(5) DEFAULT NULL,
  `hapus` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table nucleus_db.area: ~7 rows (approximately)
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` (`id`, `area`, `alias_area`, `hapus`) VALUES
	('01', 'jakarta', 'jkt', NULL),
	('02', 'surabaya', 'sby', NULL),
	('03', 'bandung', 'bdg', NULL),
	('04', 'bandung', 'bdg', NULL),
	('05', 'pontianak', 'ptk', NULL),
	('06', 'yogyakarta', 'diy', NULL),
	('07', 'solo', 'sol', NULL);
/*!40000 ALTER TABLE `area` ENABLE KEYS */;

-- Dumping structure for table nucleus_db.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `kemasan` varchar(15) DEFAULT NULL,
  `harga_hna` decimal(15,2) DEFAULT NULL,
  `harga_h_askes` decimal(15,2) DEFAULT NULL,
  `harga_master` decimal(15,2) DEFAULT NULL,
  `kode_bum` varchar(5) DEFAULT NULL,
  `nama_bum` varchar(150) DEFAULT NULL,
  `golongan` varchar(2) DEFAULT NULL,
  `golongan1` varchar(2) DEFAULT NULL,
  `antibiotik` varchar(1) DEFAULT NULL,
  `barang_baru` varchar(1) DEFAULT NULL,
  `barang_askes` varchar(1) DEFAULT NULL,
  `fokus` varchar(1) DEFAULT NULL,
  `cn_new_barang` decimal(5,2) DEFAULT NULL,
  `dana_new_product` varchar(1) DEFAULT NULL,
  `start_regular` varchar(15) DEFAULT NULL,
  `reg_ask` varchar(1) DEFAULT NULL,
  `kondisi` decimal(5,2) DEFAULT NULL,
  `kondisi_user` decimal(5,2) DEFAULT NULL,
  `barang_master` varchar(50) DEFAULT NULL,
  `diskon` decimal(5,2) DEFAULT NULL,
  `region` varchar(5) DEFAULT NULL,
  `keterangan_region` varchar(200) DEFAULT NULL,
  `segmen` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table nucleus_db.barang: ~0 rows (approximately)
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;

-- Dumping structure for table nucleus_db.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `id` varchar(10) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `area` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table nucleus_db.customer: ~0 rows (approximately)
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- Dumping structure for table nucleus_db.detailer
CREATE TABLE IF NOT EXISTS `detailer` (
  `id` varchar(10) NOT NULL,
  `id_area` varchar(5) DEFAULT NULL,
  `id_jabatan` varchar(5) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_mutasi` date DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `agama` varchar(15) DEFAULT NULL,
  `golongan` varchar(3) DEFAULT NULL,
  `subarea` varchar(50) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `kode_supervisor` varchar(10) DEFAULT NULL,
  `kode_rm` varchar(10) DEFAULT NULL,
  `kode_rsm` varchar(10) DEFAULT NULL,
  `kode_rm_old` varchar(10) DEFAULT NULL,
  `status` varchar(3) DEFAULT NULL COMMENT 'on off - aktif atau tidak',
  `ktp` varchar(16) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `kewarganegaraan` varchar(50) DEFAULT NULL,
  `pendidikan_terakhir` varchar(20) DEFAULT NULL,
  `status_perkawinan` varchar(2) DEFAULT NULL,
  `hapus` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detailer_area` (`id_area`),
  KEY `fk_detailer_jabatan` (`id_jabatan`),
  CONSTRAINT `fk_detailer_area` FOREIGN KEY (`id_area`) REFERENCES `area` (`id`),
  CONSTRAINT `fk_detailer_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table nucleus_db.detailer: ~2 rows (approximately)
/*!40000 ALTER TABLE `detailer` DISABLE KEYS */;
INSERT INTO `detailer` (`id`, `id_area`, `id_jabatan`, `nama`, `tanggal_lahir`, `tanggal_masuk`, `tanggal_mutasi`, `tanggal_keluar`, `agama`, `golongan`, `subarea`, `keterangan`, `kode_supervisor`, `kode_rm`, `kode_rsm`, `kode_rm_old`, `status`, `ktp`, `jenis_kelamin`, `tempat_lahir`, `kewarganegaraan`, `pendidikan_terakhir`, `status_perkawinan`, `hapus`) VALUES
	('123879', '02', 'sal', 'sandita', '1993-01-02', '2018-01-01', '0000-00-00', '0000-00-00', '', '', 'rungkut', NULL, '', '', '', '', 'on', '2387420364701237', 'l', 'bekasi', 'wni', 's1', 'tk', NULL),
	('897645', '01', 'rm', 'Kristin', '1989-01-02', '2018-01-01', '0000-00-00', '0000-00-00', '', '', '', NULL, '', '', '', '', 'on', '1726980129019230', 'p', 'jakarta', 'wni', 's1', 'tk', NULL);
/*!40000 ALTER TABLE `detailer` ENABLE KEYS */;

-- Dumping structure for table nucleus_db.detailer_anak
CREATE TABLE IF NOT EXISTS `detailer_anak` (
  `id_detailer` varchar(10) DEFAULT NULL,
  `anak` varchar(200) DEFAULT NULL,
  KEY `fk_detaileranak_detailer` (`id_detailer`),
  CONSTRAINT `fk_detaileranak_detailer` FOREIGN KEY (`id_detailer`) REFERENCES `detailer` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table nucleus_db.detailer_anak: ~2 rows (approximately)
/*!40000 ALTER TABLE `detailer_anak` DISABLE KEYS */;
INSERT INTO `detailer_anak` (`id_detailer`, `anak`) VALUES
	('123879', ''),
	('897645', '');
/*!40000 ALTER TABLE `detailer_anak` ENABLE KEYS */;

-- Dumping structure for table nucleus_db.detailer_keluarga
CREATE TABLE IF NOT EXISTS `detailer_keluarga` (
  `id_detailer` varchar(10) DEFAULT NULL,
  `istri` varchar(200) DEFAULT NULL,
  KEY `fk_detailerkeluarga_detailer` (`id_detailer`),
  CONSTRAINT `fk_detailerkeluarga_detailer` FOREIGN KEY (`id_detailer`) REFERENCES `detailer` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table nucleus_db.detailer_keluarga: ~0 rows (approximately)
/*!40000 ALTER TABLE `detailer_keluarga` DISABLE KEYS */;
/*!40000 ALTER TABLE `detailer_keluarga` ENABLE KEYS */;

-- Dumping structure for table nucleus_db.jabatan
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id` varchar(5) NOT NULL,
  `jabatan` varchar(30) DEFAULT NULL,
  `hapus` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table nucleus_db.jabatan: ~5 rows (approximately)
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` (`id`, `jabatan`, `hapus`) VALUES
	('rm', 'regional manager', NULL),
	('rsm', 'regional sale manager', NULL),
	('sal', 'sales', NULL),
	('sd', 'sales director', NULL),
	('spv', 'supervisor', NULL);
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;

-- Dumping structure for table nucleus_db.outlet
CREATE TABLE IF NOT EXISTS `outlet` (
  `prefix_id` varchar(2) NOT NULL,
  `id` varchar(5) NOT NULL,
  `id_area_ptkp` varchar(5) DEFAULT NULL,
  `id_area_ppg` varchar(5) DEFAULT NULL,
  `id_detailer` varchar(10) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `npwp` varchar(15) DEFAULT NULL,
  `segmen` varchar(2) DEFAULT NULL,
  `dispensing` varchar(1) DEFAULT NULL,
  `periode` date DEFAULT NULL,
  `hapus` date DEFAULT NULL,
  PRIMARY KEY (`prefix_id`,`id`),
  KEY `fk_outlet_detailer` (`id_detailer`),
  KEY `fk_outletptkp_area` (`id_area_ptkp`),
  KEY `fk_outletppg_area` (`id_area_ppg`),
  CONSTRAINT `fk_outlet_detailer` FOREIGN KEY (`id_detailer`) REFERENCES `detailer` (`id`),
  CONSTRAINT `fk_outletppg_area` FOREIGN KEY (`id_area_ppg`) REFERENCES `area` (`id`),
  CONSTRAINT `fk_outletptkp_area` FOREIGN KEY (`id_area_ptkp`) REFERENCES `area` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table nucleus_db.outlet: ~2 rows (approximately)
/*!40000 ALTER TABLE `outlet` DISABLE KEYS */;
INSERT INTO `outlet` (`prefix_id`, `id`, `id_area_ptkp`, `id_area_ppg`, `id_detailer`, `nama`, `alamat`, `kota`, `npwp`, `segmen`, `dispensing`, `periode`, `hapus`) VALUES
	('B', '4134', NULL, '01', '897645', 'rumah sakit siti hajar', 'jalan jakarta', 'jakarta selatan', '348972645264520', 'a', 'n', '2016-09-05', NULL),
	('C', '1268', '02', NULL, '123879', 'rumah sakit persada husada', 'jalan kumis kucing', 'rungkut', '126679162391623', 'a', 'n', '2018-01-03', NULL),
	('C', '2637', '01', NULL, NULL, 'rumah sakit pusat jantung harapan kita', 'jalan banten', 'jakarta', '126091341204712', 'b', 'n', NULL, NULL);
/*!40000 ALTER TABLE `outlet` ENABLE KEYS */;

-- Dumping structure for table nucleus_db.user_account
CREATE TABLE IF NOT EXISTS `user_account` (
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(8) DEFAULT NULL,
  `jenis` varchar(15) DEFAULT NULL COMMENT 'ini diisi dengan kode jabatan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table nucleus_db.user_account: ~1 rows (approximately)
/*!40000 ALTER TABLE `user_account` DISABLE KEYS */;
INSERT INTO `user_account` (`username`, `password`, `jenis`) VALUES
	('sandita', 'KLQxGec3', 'sal'),
	('kristin', '3PYZTQyZ', 'rm');
/*!40000 ALTER TABLE `user_account` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
