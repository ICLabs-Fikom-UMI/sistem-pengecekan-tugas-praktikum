-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2024 at 12:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipeta`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_asisten` (IN `in_nim_asisten` VARCHAR(15), IN `in_nama_asisten` VARCHAR(50), IN `in_kelas` CHAR(5), IN `in_prodi` ENUM('Teknik Informatika','Sistem Informasi'))   BEGIN
    DECLARE v_id_user INT;

    -- Menambahkan data ke tabel mst_user
    INSERT INTO mst_user (username, password, role) 
    VALUES (in_nim_asisten, 'asisten', 'Asisten');

    -- Mendapatkan ID terakhir yang diinsert di tabel mst_user
    SET v_id_user = LAST_INSERT_ID();

    -- Menambahkan data ke tabel mst_asisten
    INSERT INTO mst_asisten (nim_asisten, nama_asisten, kelas, prodi, id_user) 
    VALUES (in_nim_asisten, in_nama_asisten, in_kelas, in_prodi, v_id_user);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_praktikan` (IN `in_nim_praktikan` VARCHAR(11), IN `in_nama_praktikan` VARCHAR(50), IN `in_id_frekuensi` INT)   BEGIN
    DECLARE v_id_user INT;

    -- Menambahkan data ke tabel mst_user
    INSERT INTO mst_user (username, password, role) 
    VALUES (in_nim_praktikan, in_nim_praktikan, 'Praktikan');

    -- Mendapatkan ID terakhir yang diinsert di tabel mst_user
    SET v_id_user = LAST_INSERT_ID();

    -- Menambahkan data ke tabel mst_praktikan
    INSERT INTO mst_praktikan (nim_praktikan, nama_praktikan, id_user, id_frekuensi) 
    VALUES (in_nim_praktikan, in_nama_praktikan, v_id_user, in_id_frekuensi);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mst_administrator`
--

CREATE TABLE `mst_administrator` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_administrator`
--

INSERT INTO `mst_administrator` (`id_admin`, `nama_admin`, `id_user`) VALUES
(1, 'Fatimah A.R Tuasamu, S.Kom, MTA', 11);

-- --------------------------------------------------------

--
-- Table structure for table `mst_asisten`
--

CREATE TABLE `mst_asisten` (
  `id_asisten` int(11) NOT NULL,
  `nim_asisten` varchar(15) NOT NULL,
  `nama_asisten` varchar(50) NOT NULL,
  `kelas` char(5) NOT NULL,
  `prodi` enum('Teknik Informatika','Sistem Informasi') NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_asisten`
--

INSERT INTO `mst_asisten` (`id_asisten`, `nim_asisten`, `nama_asisten`, `kelas`, `prodi`, `id_user`) VALUES
(30, '13120210008', 'Muhammad Akbar', 'A1', 'Sistem Informasi', 36),
(31, '13020210287', 'Athar Fathana Rakasyah ', 'A3', 'Teknik Informatika', 37),
(32, '13020210066', 'Nurul Azmi', 'B3', 'Teknik Informatika', 38),
(33, '13020210205', 'Naufal Abiyyu Supriadi ', 'A4', 'Teknik Informatika', 39),
(34, '13020210134', 'Nasrullah', 'A1', 'Teknik Informatika', 40),
(35, '13020210048', 'Ahmad Rendi', 'A1', 'Teknik Informatika', 41),
(37, '13020200103', 'Adam Adnan', 'A3', 'Teknik Informatika', 43),
(38, '13120210005', 'Furqon Fatahillah', 'A1', 'Sistem Informasi', 44);

-- --------------------------------------------------------

--
-- Table structure for table `mst_dosen`
--

CREATE TABLE `mst_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip_dosen` varchar(20) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `kelas` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_dosen`
--

INSERT INTO `mst_dosen` (`id_dosen`, `nip_dosen`, `nama_dosen`, `id_matkul`, `kelas`) VALUES
(20, '0922088701', 'Siska Anraeni, S.Kom.,M.T.,MCF', 41, 'B1'),
(21, '0922118003', 'Ir. Lukman Syafie, S.Si.,M.Si.,MTA.', 42, 'B1'),
(22, '0917068601', 'Ir. Dedy Atmajaya, S.Kom.,M.Eng.,MTA.', 45, 'B1'),
(23, '0911039301', 'Ramdaniah, S.Kom., M.T.,MTA.', 47, 'B1'),
(24, '0921018902', 'Lutfi Budi Ilmawan, S.Kom.,M.Cs.,MTA.', 44, 'A1'),
(26, '0917068601', 'Ir. Dedy Atmajaya, S.Kom.,M.Eng.,MTA.', 45, 'A1'),
(27, '1302902', 'Fahmi, S.Kom., M.T.', 48, 'A1'),
(28, '0906078701', 'Mardiyyah Hasnawi, S.Kom.,M.T.,MTA.', 50, 'A1'),
(29, '0909029203', 'Muhammad Arfah Asis, S.Kom., M.T.,MTA.', 51, 'A1'),
(30, '090902920', 'Muhammad Arfah Asis, S.Kom., M.T.,MTA.', 54, 'A1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_matkul`
--

CREATE TABLE `mst_matkul` (
  `id_matkul` int(11) NOT NULL,
  `kode_matkul` char(10) NOT NULL,
  `nama_matkul` varchar(30) NOT NULL,
  `prodi` enum('Teknik Informatika','Sistem Informasi') NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `tingkat_semester` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_matkul`
--

INSERT INTO `mst_matkul` (`id_matkul`, `kode_matkul`, `nama_matkul`, `prodi`, `semester`, `tingkat_semester`) VALUES
(41, '1303PPA105', 'Algoritma dan Pemrograman 1', 'Teknik Informatika', 'Ganjil', 1),
(42, '1303PPA104', 'Pengantar Teknologi Informasi', 'Teknik Informatika', 'Ganjil', 1),
(43, '1303KKA203', 'Elektronika Dasar', 'Teknik Informatika', 'Genap', 2),
(44, '1303PPA205', 'Algoritma & Pemrograman 2', 'Teknik Informatika', 'Genap', 2),
(45, '1303PPA207', 'Basis Data I', 'Teknik Informatika', 'Genap', 2),
(46, '1303PPA304', 'Basis Data II', 'Teknik Informatika', 'Ganjil', 3),
(47, '1303PPA302', 'Struktur Data', 'Teknik Informatika', 'Ganjil', 3),
(48, '1303KKA407', 'Jaringan Komputer', 'Teknik Informatika', 'Genap', 4),
(50, '1303KKA403', 'Pemrograman Berorientasi Objek', 'Teknik Informatika', 'Genap', 4),
(51, '1303KKA408', 'Pemrograman Web', 'Teknik Informatika', 'Genap', 4),
(52, '1303KKA504', 'Microcontroller', 'Teknik Informatika', 'Ganjil', 5),
(54, '1303KKA713', 'Pembrograman Mobile', 'Teknik Informatika', 'Ganjil', 7),
(55, '1313KKB107', 'Algoritma Pemrograman', 'Sistem Informasi', 'Ganjil', 1),
(56, '1313KKB109', 'Sistem dan Teknologi Informasi', 'Sistem Informasi', 'Ganjil', 1),
(57, '1313KKB204', 'Basis Data I', 'Sistem Informasi', 'Genap', 2),
(58, '1313KKB205', 'Algoritma & Struktur Data', 'Sistem Informasi', 'Genap', 2),
(59, '1313KKB309', 'Basis Data II', 'Sistem Informasi', 'Ganjil', 3),
(60, '1313KKB304', 'Jaringan Komputer', 'Sistem Informasi', 'Ganjil', 3),
(61, '1313KKB306', 'Pemrograman Web', 'Sistem Informasi', 'Ganjil', 3),
(62, '1313KKB401', 'Pemrograman Berorientasi Objek', 'Sistem Informasi', 'Genap', 4),
(63, '1313KKB402', 'Desain Grafis', 'Sistem Informasi', 'Genap', 4),
(64, '1313PPB507', 'Aplikasi Akuntansi ', 'Sistem Informasi', 'Ganjil', 5),
(65, '1313KKB503', 'Sistem Operasi', 'Sistem Informasi', 'Ganjil', 5),
(66, '1313KKB407', 'Pemrograman Mobile', 'Sistem Informasi', 'Genap', 4);

-- --------------------------------------------------------

--
-- Table structure for table `mst_praktikan`
--

CREATE TABLE `mst_praktikan` (
  `id_praktikan` int(11) NOT NULL,
  `nim_praktikan` varchar(11) NOT NULL,
  `nama_praktikan` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_frekuensi` int(11) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `prodi` enum('Teknik Informatika','Sisitem Informasi') DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_praktikan`
--

INSERT INTO `mst_praktikan` (`id_praktikan`, `nim_praktikan`, `nama_praktikan`, `id_user`, `id_frekuensi`, `jk`, `prodi`, `email`, `no_hp`) VALUES
(36, '13020230002', 'ARDIANSYAH HIDAYAT', 49, 25, NULL, NULL, NULL, NULL),
(37, '13020230003', 'MOH. FATHUR RAHMANSYAH', 50, 25, NULL, NULL, NULL, NULL),
(38, '13020230005', 'MUH. KHALIL GIBRAN ABBAS', 51, 25, NULL, NULL, NULL, NULL),
(39, '13020230006', 'MUHAMMAD FIDEL SALIM', 52, 25, NULL, NULL, NULL, NULL),
(40, '13020230007', 'MUHAMMAD NUR KHADAFI H.UMAR', 53, 25, NULL, NULL, NULL, NULL),
(41, '13020230008', 'MUH. ALFARIZI DWI AKSA PUTRA', 54, 25, NULL, NULL, NULL, NULL),
(42, '13020230009', 'MEYDIL EKA SYAH PUTRA', 55, 25, NULL, NULL, NULL, NULL),
(43, '13020230013', 'REYHAN SAVERO', 56, 25, NULL, NULL, NULL, NULL),
(44, '13020230016', 'MUH.RAYA FACHRIL KADARI', 57, 25, NULL, NULL, NULL, NULL),
(45, '13020230017', 'MUH. AZHAR HARUNA', 58, 25, NULL, NULL, NULL, NULL),
(46, '13020230018', 'ZULFATTAH', 59, 25, NULL, NULL, NULL, NULL),
(47, '13020230019', 'MARSYAL', 60, 25, NULL, NULL, NULL, NULL),
(48, '13020230020', 'FAUZAN HAADI', 61, 25, NULL, NULL, NULL, NULL),
(49, '13020230021', 'M. ERIL KAUTSAR', 62, 25, NULL, NULL, NULL, NULL),
(50, '13020230022', 'WAHYU SAPUTRA PERDANA', 63, 25, NULL, NULL, NULL, NULL),
(51, '13020230023', 'MUH MAHDI', 64, 25, NULL, NULL, NULL, NULL),
(52, '13020230024', 'JULKARNAIN HATTA', 65, 25, NULL, NULL, NULL, NULL),
(53, '13020230025', 'MUH. FAJAR ISTIQAMAH RAMDANY', 66, 25, NULL, NULL, NULL, NULL),
(54, '13020230027', 'MUHAMMAD ALDI MAULANA', 67, 25, NULL, NULL, NULL, NULL),
(55, '13020230030', 'MUHAMMAD NUR FUAD', 68, 25, NULL, NULL, NULL, NULL),
(56, '13020230031', 'RANGGA ARYA WARACHMAT', 69, 25, NULL, NULL, NULL, NULL),
(57, '13020230033', 'MUHAMMAD AIDIL', 70, 25, NULL, NULL, NULL, NULL),
(58, '13020230034', 'AHMAD FAWZAR', 71, 25, NULL, NULL, NULL, NULL),
(59, '13020230035', 'MUHAMMAD IKRAM GHIFARI', 72, 25, NULL, NULL, NULL, NULL),
(60, '13020230036', 'ASRUL', 73, 25, NULL, NULL, NULL, NULL),
(61, '13020230335', 'MUHAMMAD FADHEL SYAMSURI', 74, 25, NULL, NULL, NULL, NULL),
(88, '13020210001', 'ALEXA', 132, 33, NULL, NULL, NULL, NULL),
(89, '13020200002', 'AHMAD RUSLANDIA PAPUA', 209, 35, NULL, NULL, NULL, NULL),
(90, '13020200004', 'M. IQBAL FIRMANSYAH', 210, 35, NULL, NULL, NULL, NULL),
(91, '13020200016', 'MUHAMMAD RAIHAN SAPUTRA', 211, 35, NULL, NULL, NULL, NULL),
(92, '13020200028', 'MUH. WAHYU HIDAYAT', 212, 35, NULL, NULL, NULL, NULL),
(93, '13020200034', 'ARIF RAHMAN', 213, 35, NULL, NULL, NULL, NULL),
(94, '13020200036', 'MUHAMMAD SYAWAL ARMA', 214, 35, NULL, NULL, NULL, NULL),
(95, '13020200045', 'FADHIL HIDAYAT IBRAHIM', 215, 35, NULL, NULL, NULL, NULL),
(96, '13020200051', 'ADAM MALIK', 216, 35, NULL, NULL, NULL, NULL),
(97, '13020200081', 'ADRIANSYAH SAPUTRA', 217, 35, NULL, NULL, NULL, NULL),
(98, '13020200127', 'MUHAMMAD FAHMI', 218, 35, NULL, NULL, NULL, NULL),
(99, '13020200135', 'AINUR RIDHO FAHAY', 219, 35, NULL, NULL, NULL, NULL),
(100, '13020200151', 'ACHMAD FADLI', 220, 35, NULL, NULL, NULL, NULL),
(101, '13020200152', 'HAMDANI SIDENG', 221, 35, NULL, NULL, NULL, NULL),
(102, '13020200155', 'FATHURRAHMAN', 222, 35, NULL, NULL, NULL, NULL),
(103, '13020200157', 'MUHAMMAD AKRAM', 223, 35, NULL, NULL, NULL, NULL),
(104, '13020200158', 'SAIF SYARIF', 224, 35, NULL, NULL, NULL, NULL),
(105, '13020200159', 'M. FAHMI ADRIAN RIDWAN', 225, 35, NULL, NULL, NULL, NULL),
(106, '13020200163', 'ANDI MUHAMMAD FARHAN FATUR RAHMAN PUTRA', 226, 35, NULL, NULL, NULL, NULL),
(107, '13020200167', 'FATHUR RAHMAN', 227, 35, NULL, NULL, NULL, NULL),
(108, '13020200169', 'FARHAN SYARIF', 228, 35, NULL, NULL, NULL, NULL),
(109, '13020200170', 'AQIFAH KADIR', 229, 35, NULL, NULL, NULL, NULL),
(110, '13020200172', 'M.IQBAL GIBRAN', 230, 35, NULL, NULL, NULL, NULL),
(111, '13020200183', 'AZHAR MOHAMMAD RACHMADANI', 231, 35, NULL, NULL, NULL, NULL),
(112, '13020200185', 'MUHAMMAD LUTHFI ALDIANSYAH', 232, 35, NULL, NULL, NULL, NULL),
(113, '13020200186', 'THIRMIDZI KHOMSA ALI AKBAR', 233, 35, NULL, NULL, NULL, NULL),
(114, '13020200191', 'MUHAMMAD RAHMAT ALI', 234, 35, NULL, NULL, NULL, NULL),
(115, '13020200193', 'YUSUF PALLOT', 235, 35, NULL, NULL, NULL, NULL),
(116, '13020200195', 'MUHAMMAD ABDILLAH FATHIN', 236, 35, NULL, NULL, NULL, NULL),
(117, '13020200197', 'MUH. ARHAM', 237, 35, NULL, NULL, NULL, NULL),
(118, '13020200201', 'FAJRUL JUANDA', 238, 35, NULL, NULL, NULL, NULL),
(119, '13020200204', 'LA ODE RAJANTARA', 239, 35, NULL, NULL, NULL, NULL),
(120, '13020200207', 'VERDIANSYAH S BANDOE', 240, 35, NULL, NULL, NULL, NULL),
(121, '13020200230', 'MUH ICHSAN ISMAIL', 241, 35, NULL, NULL, NULL, NULL),
(122, '13020200252', 'YUSMAN', 242, 35, NULL, NULL, NULL, NULL),
(123, '13020200290', 'MUHAMMAD HARI BANGSAWAN', 243, 35, NULL, NULL, NULL, NULL),
(124, '13020200316', 'MUHAMMAD RIDZKY', 244, 35, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE `mst_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `role` enum('Administrator','Asisten','Praktikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`id_user`, `username`, `password`, `role`) VALUES
(11, 'admin', 'admin', 'Administrator'),
(36, '13120210008', 'asisten', 'Asisten'),
(37, '13020210287', 'asisten', 'Asisten'),
(38, '13020210066', 'asisten', 'Asisten'),
(39, '13020210205', 'asisten', 'Asisten'),
(40, '13020210134', 'asisten', 'Asisten'),
(41, '13020210048', 'asisten', 'Asisten'),
(43, '13020200103', 'asisten', 'Asisten'),
(44, '13120210005', 'asisten', 'Asisten'),
(49, '13020230002', '12345678', 'Praktikan'),
(50, '13020230003', '13020230003', 'Praktikan'),
(51, '13020230005', '13020230005', 'Praktikan'),
(52, '13020230006', '13020230006', 'Praktikan'),
(53, '13020230007', '13020230007', 'Praktikan'),
(54, '13020230008', '13020230008', 'Praktikan'),
(55, '13020230009', '13020230009', 'Praktikan'),
(56, '13020230013', '13020230013', 'Praktikan'),
(57, '13020230016', '13020230016', 'Praktikan'),
(58, '13020230017', '13020230017', 'Praktikan'),
(59, '13020230018', '13020230018', 'Praktikan'),
(60, '13020230019', '13020230019', 'Praktikan'),
(61, '13020230020', '13020230020', 'Praktikan'),
(62, '13020230021', '13020230021', 'Praktikan'),
(63, '13020230022', '13020230022', 'Praktikan'),
(64, '13020230023', '13020230023', 'Praktikan'),
(65, '13020230024', '13020230024', 'Praktikan'),
(66, '13020230025', '13020230025', 'Praktikan'),
(67, '13020230027', '13020230027', 'Praktikan'),
(68, '13020230030', '13020230030', 'Praktikan'),
(69, '13020230031', '13020230031', 'Praktikan'),
(70, '13020230033', '13020230033', 'Praktikan'),
(71, '13020230034', '13020230034', 'Praktikan'),
(72, '13020230035', '13020230035', 'Praktikan'),
(73, '13020230036', '13020230036', 'Praktikan'),
(74, '13020230335', '13020230335', 'Praktikan'),
(90, '13020210023', 'asisten', 'Asisten'),
(91, '13020210023', 'asisten', 'Asisten'),
(92, '13020210020', 'asisten', 'Asisten'),
(93, '13020210020', 'asisten', 'Asisten'),
(94, '13020210020', 'asisten', 'Asisten'),
(95, '13020210020', 'asisten', 'Asisten'),
(96, '13020210020', 'asisten', 'Asisten'),
(97, '13020210020', 'asisten', 'Asisten'),
(98, '13020210020', 'asisten', 'Asisten'),
(99, '13020210020', 'asisten', 'Asisten'),
(100, '13020210020', 'asisten', 'Asisten'),
(101, '13020210020', 'asisten', 'Asisten'),
(102, '13020210020', 'asisten', 'Asisten'),
(103, '13020220217', '13020220217', 'Praktikan'),
(104, '13020220218', '13020220218', 'Praktikan'),
(105, '13020220224', '13020220224', 'Praktikan'),
(106, '13020220228', '13020220228', 'Praktikan'),
(107, '13020220230', '13020220230', 'Praktikan'),
(108, '13020220236', '13020220236', 'Praktikan'),
(109, '13020220239', '13020220239', 'Praktikan'),
(110, '13020220249', '13020220249', 'Praktikan'),
(111, '13020220251', '13020220251', 'Praktikan'),
(112, '13020220252', '13020220252', 'Praktikan'),
(113, '13020220253', '13020220253', 'Praktikan'),
(114, '13020220267', '13020220267', 'Praktikan'),
(115, '13020220273', '13020220273', 'Praktikan'),
(116, '13020220274', '13020220274', 'Praktikan'),
(117, '13020220275', '13020220275', 'Praktikan'),
(118, '13020220281', '13020220281', 'Praktikan'),
(119, '13020220282', '13020220282', 'Praktikan'),
(120, '13020220284', '13020220284', 'Praktikan'),
(121, '13020220285', '13020220285', 'Praktikan'),
(122, '13020220289', '13020220289', 'Praktikan'),
(123, '13020220291', '13020220291', 'Praktikan'),
(124, '13020220292', '13020220292', 'Praktikan'),
(125, '13020220294', '13020220294', 'Praktikan'),
(126, '13020220297', '13020220297', 'Praktikan'),
(127, '13020220298', '13020220298', 'Praktikan'),
(128, '13020210020', 'asisten', 'Asisten'),
(129, '13020210020', 'asisten', 'Asisten'),
(130, '13020210020', 'asisten', 'Asisten'),
(131, '13020210020', 'asisten', 'Asisten'),
(132, '13020210069', '13020210069', 'Praktikan'),
(133, '13020210089', 'asisten', 'Asisten'),
(134, '13020210089', 'asisten', 'Asisten'),
(135, '13020210089', 'asisten', 'Asisten'),
(136, '13020210089', 'asisten', 'Asisten'),
(209, '13020200002', '13020200002', 'Praktikan'),
(210, '13020200004', '13020200004', 'Praktikan'),
(211, '13020200016', '13020200016', 'Praktikan'),
(212, '13020200028', '13020200028', 'Praktikan'),
(213, '13020200034', '13020200034', 'Praktikan'),
(214, '13020200036', '13020200036', 'Praktikan'),
(215, '13020200045', '13020200045', 'Praktikan'),
(216, '13020200051', '13020200051', 'Praktikan'),
(217, '13020200081', '13020200081', 'Praktikan'),
(218, '13020200127', '13020200127', 'Praktikan'),
(219, '13020200135', '13020200135', 'Praktikan'),
(220, '13020200151', '13020200151', 'Praktikan'),
(221, '13020200152', '13020200152', 'Praktikan'),
(222, '13020200155', '13020200155', 'Praktikan'),
(223, '13020200157', '13020200157', 'Praktikan'),
(224, '13020200158', '13020200158', 'Praktikan'),
(225, '13020200159', '13020200159', 'Praktikan'),
(226, '13020200163', '13020200163', 'Praktikan'),
(227, '13020200167', '13020200167', 'Praktikan'),
(228, '13020200169', '13020200169', 'Praktikan'),
(229, '13020200170', '13020200170', 'Praktikan'),
(230, '13020200172', '13020200172', 'Praktikan'),
(231, '13020200183', '13020200183', 'Praktikan'),
(232, '13020200185', '13020200185', 'Praktikan'),
(233, '13020200186', '13020200186', 'Praktikan'),
(234, '13020200191', '13020200191', 'Praktikan'),
(235, '13020200193', '13020200193', 'Praktikan'),
(236, '13020200195', '13020200195', 'Praktikan'),
(237, '13020200197', '13020200197', 'Praktikan'),
(238, '13020200201', '13020200201', 'Praktikan'),
(239, '13020200204', '13020200204', 'Praktikan'),
(240, '13020200207', '13020200207', 'Praktikan'),
(241, '13020200230', '13020200230', 'Praktikan'),
(242, '13020200252', '13020200252', 'Praktikan'),
(243, '13020200290', '13020200290', 'Praktikan'),
(244, '13020200316', '13020200316', 'Praktikan'),
(245, '13020210089', 'asisten', 'Asisten'),
(246, '13020210089', 'asisten', 'Asisten'),
(247, '13020210089', 'asisten', 'Asisten'),
(248, '130202100', 'asisten', 'Asisten'),
(249, '', '', 'Praktikan'),
(250, '131', 'asisten', 'Asisten'),
(251, '130', '130', 'Praktikan'),
(252, '130', '130', 'Praktikan');

-- --------------------------------------------------------

--
-- Table structure for table `trx_frekuensi`
--

CREATE TABLE `trx_frekuensi` (
  `id_frekuensi` int(11) NOT NULL,
  `nama_frekuensi` varchar(15) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_asisten1` int(11) NOT NULL,
  `id_asisten2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trx_frekuensi`
--

INSERT INTO `trx_frekuensi` (`id_frekuensi`, `nama_frekuensi`, `id_dosen`, `id_asisten1`, `id_asisten2`) VALUES
(21, 'TI_ALPRO1-19', 20, 31, 32),
(25, 'TI_ALPRO2-2', 24, 32, 31),
(26, 'TI_BD1-1', 26, 37, 30),
(28, 'TI_PBO-1', 28, 35, 38),
(31, 'TI_JAR-1 (B1)', 27, 32, 37),
(32, 'TI_BD-11 (A1)', 26, 33, 37),
(33, 'TI_JAR-3', 27, 33, 38),
(35, 'TI_MOBILE-1', 30, 38, 32);

-- --------------------------------------------------------

--
-- Table structure for table `trx_pengecekan`
--

CREATE TABLE `trx_pengecekan` (
  `id_pengecekan` int(11) NOT NULL,
  `id_praktikan` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `status_pengecekan` varchar(25) DEFAULT NULL,
  `tgl_pengecekan` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trx_tugas`
--

CREATE TABLE `trx_tugas` (
  `id_tugas` int(11) NOT NULL,
  `nama_tugas` varchar(30) DEFAULT NULL,
  `deskripsi_tugas` text DEFAULT NULL,
  `status_tugas` varchar(10) DEFAULT NULL,
  `tgl_tugas` date NOT NULL,
  `id_frekuensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trx_tugas`
--

INSERT INTO `trx_tugas` (`id_tugas`, `nama_tugas`, `deskripsi_tugas`, `status_tugas`, `tgl_tugas`, `id_frekuensi`) VALUES
(29, 'Tugas Evaluasi Praktikum II', '1. Interaksi yang terjadi antara manusia dengan perangkat komputer melalui sebuah media disebut dengan…\r\n\r\nA. Algoritma\r\nB. Brainware \r\nC. Robomind\r\nD. Antarmuka\r\n\r\n2. Ilmu algoritma, namanya terinspirasi dari nama seorang ilmuwan yaitu…\r\n\r\nA. Al-Khawarizmi\r\nB. Al-Goritma\r\nC. Al-Khawarits\r\nD. Al-Gorism\r\n\r\n3. Berikut ini yang merupakan bahasa pemrograman adalah…\r\n\r\nA. Jawa\r\nB. Sunda\r\nC. English\r\nD. HTML', '', '2024-02-01', 33);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_administrator`
--
ALTER TABLE `mst_administrator`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `mst_asisten`
--
ALTER TABLE `mst_asisten`
  ADD PRIMARY KEY (`id_asisten`),
  ADD UNIQUE KEY `nim_asisten` (`nim_asisten`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `mst_dosen`
--
ALTER TABLE `mst_dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- Indexes for table `mst_matkul`
--
ALTER TABLE `mst_matkul`
  ADD PRIMARY KEY (`id_matkul`),
  ADD UNIQUE KEY `kode_matkul` (`kode_matkul`);

--
-- Indexes for table `mst_praktikan`
--
ALTER TABLE `mst_praktikan`
  ADD PRIMARY KEY (`id_praktikan`),
  ADD UNIQUE KEY `nim_praktikan` (`nim_praktikan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_frekuensi` (`id_frekuensi`);

--
-- Indexes for table `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `trx_frekuensi`
--
ALTER TABLE `trx_frekuensi`
  ADD PRIMARY KEY (`id_frekuensi`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_asisten` (`id_asisten1`),
  ADD KEY `id_asisten1` (`id_asisten1`),
  ADD KEY `id_asisten_2` (`id_asisten1`),
  ADD KEY `id_asisten2` (`id_asisten2`);

--
-- Indexes for table `trx_pengecekan`
--
ALTER TABLE `trx_pengecekan`
  ADD PRIMARY KEY (`id_pengecekan`),
  ADD KEY `id_praktikan` (`id_praktikan`),
  ADD KEY `id_tugas` (`id_tugas`);

--
-- Indexes for table `trx_tugas`
--
ALTER TABLE `trx_tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `id_frekuensi` (`id_frekuensi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_administrator`
--
ALTER TABLE `mst_administrator`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mst_asisten`
--
ALTER TABLE `mst_asisten`
  MODIFY `id_asisten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `mst_dosen`
--
ALTER TABLE `mst_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `mst_matkul`
--
ALTER TABLE `mst_matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `mst_praktikan`
--
ALTER TABLE `mst_praktikan`
  MODIFY `id_praktikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `trx_frekuensi`
--
ALTER TABLE `trx_frekuensi`
  MODIFY `id_frekuensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `trx_pengecekan`
--
ALTER TABLE `trx_pengecekan`
  MODIFY `id_pengecekan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trx_tugas`
--
ALTER TABLE `trx_tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mst_administrator`
--
ALTER TABLE `mst_administrator`
  ADD CONSTRAINT `admin_user` FOREIGN KEY (`id_user`) REFERENCES `mst_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mst_asisten`
--
ALTER TABLE `mst_asisten`
  ADD CONSTRAINT `praktikan_user` FOREIGN KEY (`id_user`) REFERENCES `mst_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mst_praktikan`
--
ALTER TABLE `mst_praktikan`
  ADD CONSTRAINT `praktikan_frekuensi` FOREIGN KEY (`id_frekuensi`) REFERENCES `trx_frekuensi` (`id_frekuensi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `praktikan_userr` FOREIGN KEY (`id_user`) REFERENCES `mst_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_frekuensi`
--
ALTER TABLE `trx_frekuensi`
  ADD CONSTRAINT `frekuensi_asisten1` FOREIGN KEY (`id_asisten1`) REFERENCES `mst_asisten` (`id_asisten`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `frekuensi_asisten2` FOREIGN KEY (`id_asisten2`) REFERENCES `mst_asisten` (`id_asisten`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `frekuensi_dosen` FOREIGN KEY (`id_dosen`) REFERENCES `mst_dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_pengecekan`
--
ALTER TABLE `trx_pengecekan`
  ADD CONSTRAINT `oengecekan_praktikan` FOREIGN KEY (`id_praktikan`) REFERENCES `mst_praktikan` (`id_praktikan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengecekan_tugas` FOREIGN KEY (`id_tugas`) REFERENCES `trx_tugas` (`id_tugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trx_tugas`
--
ALTER TABLE `trx_tugas`
  ADD CONSTRAINT `fk_tugas_frekuensi` FOREIGN KEY (`id_frekuensi`) REFERENCES `trx_frekuensi` (`id_frekuensi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
