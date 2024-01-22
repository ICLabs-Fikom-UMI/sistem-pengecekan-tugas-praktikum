-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for sipeta
CREATE DATABASE IF NOT EXISTS `sipeta` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `sipeta`;

-- Dumping structure for table sipeta.mst_administrator
CREATE TABLE IF NOT EXISTS `mst_administrator` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_admin`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sipeta.mst_asisten
CREATE TABLE IF NOT EXISTS `mst_asisten` (
  `id_asisten` int(11) NOT NULL,
  `nim_asisten` varchar(11) NOT NULL,
  `nama_asisten` varchar(50) NOT NULL,
  `kelas` char(5) NOT NULL,
  `prodi` enum('Teknik Informatika','Sistem Informasi') NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_asisten`),
  UNIQUE KEY `nim_asisten` (`nim_asisten`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sipeta.mst_dosen
CREATE TABLE IF NOT EXISTS `mst_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip_dosen` varchar(20) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `kelas` char(5) NOT NULL,
  PRIMARY KEY (`id_dosen`),
  KEY `id_matkul` (`id_matkul`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sipeta.mst_matkul
CREATE TABLE IF NOT EXISTS `mst_matkul` (
  `id_matkul` int(11) NOT NULL,
  `kode_matkul` char(10) NOT NULL,
  `nama_matkul` varchar(30) NOT NULL,
  `prodi` enum('Teknik Informatika','Sistem Informasi') NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  PRIMARY KEY (`id_matkul`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sipeta.mst_praktikan
CREATE TABLE IF NOT EXISTS `mst_praktikan` (
  `id_praktikan` int(11) NOT NULL,
  `nim_praktikan` varchar(11) NOT NULL,
  `nama_praktikan` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `prodi` enum('Teknik Informatika','Sistem Informasi') NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_frekuensi` int(11) NOT NULL,
  PRIMARY KEY (`id_praktikan`),
  UNIQUE KEY `nim_praktikan` (`nim_praktikan`),
  KEY `id_user` (`id_user`),
  KEY `id_frekuensi` (`id_frekuensi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sipeta.mst_user
CREATE TABLE IF NOT EXISTS `mst_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` enum('Administrator','Asisten','Praktikan') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sipeta.trx_frekuensi
CREATE TABLE IF NOT EXISTS `trx_frekuensi` (
  `id_frekuensi` int(11) NOT NULL,
  `nama_frekuensi` varchar(10) NOT NULL,
  `kelas` char(5) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_asisten` int(11) NOT NULL,
  PRIMARY KEY (`id_frekuensi`),
  KEY `id_dosen` (`id_dosen`),
  KEY `id_asisten` (`id_asisten`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sipeta.trx_tugas
CREATE TABLE IF NOT EXISTS `trx_tugas` (
  `id_tugas` int(11) NOT NULL,
  `nama_tugas` varchar(30) NOT NULL,
  `deskripsi_tugas` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `tgl_tugas` date NOT NULL,
  `tgl_pengecekan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_asisten` int(11) NOT NULL,
  `id_praktikan` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  KEY `id_asisten` (`id_asisten`),
  KEY `id_praktikan` (`id_praktikan`),
  KEY `id_dosen` (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
