-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2024 at 01:37 PM
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
(1, 'Nurul Azmi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mst_asisten`
--

CREATE TABLE `mst_asisten` (
  `id_asisten` int(11) NOT NULL,
  `nim_asisten` varchar(11) NOT NULL,
  `nama_asisten` varchar(50) NOT NULL,
  `kelas` char(5) NOT NULL,
  `prodi` enum('Teknik Informatika','Sistem Informasi') NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_asisten`
--

INSERT INTO `mst_asisten` (`id_asisten`, `nim_asisten`, `nama_asisten`, `kelas`, `prodi`, `id_user`) VALUES
(1, '13020210066', 'Nurul Azmi', 'B1', 'Teknik Informatika', 3),
(2, '13020210242', 'Nirmala', 'B3', 'Teknik Informatika', 5);

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
(15, '123458693', 'azmi', 30, 'B1'),
(16, '1028475192375', 'Fadillah, S.Kom', 29, 'A7');

-- --------------------------------------------------------

--
-- Table structure for table `mst_matkul`
--

CREATE TABLE `mst_matkul` (
  `id_matkul` int(11) NOT NULL,
  `kode_matkul` char(10) NOT NULL,
  `nama_matkul` varchar(30) NOT NULL,
  `prodi` enum('Teknik Informatika','Sistem Informasi') NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_matkul`
--

INSERT INTO `mst_matkul` (`id_matkul`, `kode_matkul`, `nama_matkul`, `prodi`, `semester`) VALUES
(28, 'siapa', 'anyong', 'Teknik Informatika', 'Ganjil'),
(29, 'MK001', 'Pembrograman Web', 'Sistem Informasi', 'Ganjil'),
(30, 'MK002', 'Data Base I', 'Teknik Informatika', 'Ganjil'),
(31, 'MK003', 'kasdajsufghwau', 'Teknik Informatika', 'Ganjil'),
(32, 'MK004', 'kasdajsufghwau', 'Teknik Informatika', 'Ganjil'),
(34, 'MK005', 'BD1', 'Sistem Informasi', 'Genap'),
(35, 'MK006', 'BD1', 'Sistem Informasi', 'Genap'),
(36, 'DASD', 'SDAS', 'Teknik Informatika', 'Ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `mst_praktikan`
--

CREATE TABLE `mst_praktikan` (
  `id_praktikan` int(11) NOT NULL,
  `nim_praktikan` varchar(11) NOT NULL,
  `nama_praktikan` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `prodi` enum('Teknik Informatika','Sistem Informasi') NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_frekuensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_praktikan`
--

INSERT INTO `mst_praktikan` (`id_praktikan`, `nim_praktikan`, `nama_praktikan`, `jenis_kelamin`, `prodi`, `email`, `no_hp`, `id_user`, `id_frekuensi`) VALUES
(1, '13020210066', 'Putri ', 'Perempuan', 'Teknik Informatika', 'putri@gmail.com', '083942375293', 5, 7),
(2, '13020210006', 'Putri Nadia', 'Perempuan', 'Teknik Informatika', 'pudnad@gmail.com', '082945738590', 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE `mst_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` enum('Administrator','Asisten','Praktikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`id_user`, `username`, `password`, `role`) VALUES
(2, 'admin', 'admin', 'Administrator'),
(3, '13020210066', '1302021006', 'Administrator'),
(4, '13020210061', '1302021006', 'Administrator'),
(5, 'A', 'A', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `trx_frekuensi`
--

CREATE TABLE `trx_frekuensi` (
  `id_frekuensi` int(11) NOT NULL,
  `nama_frekuensi` varchar(15) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_asisten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trx_frekuensi`
--

INSERT INTO `trx_frekuensi` (`id_frekuensi`, `nama_frekuensi`, `id_dosen`, `id_asisten`) VALUES
(7, 'TI_BD-11 (A1)', 15, 2),
(8, 'TI_WEB-7 (A7)', 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trx_tugas`
--

CREATE TABLE `trx_tugas` (
  `id_tugas` int(11) NOT NULL,
  `nama_tugas` varchar(30) NOT NULL,
  `deskripsi_tugas` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `tgl_tugas` date NOT NULL,
  `tgl_pengecekan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_asisten` int(11) NOT NULL,
  `id_praktikan` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `id_asisten` (`id_asisten`),
  ADD KEY `id_asisten1` (`id_asisten`),
  ADD KEY `id_asisten_2` (`id_asisten`);

--
-- Indexes for table `trx_tugas`
--
ALTER TABLE `trx_tugas`
  ADD KEY `id_asisten` (`id_asisten`),
  ADD KEY `id_praktikan` (`id_praktikan`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_asisten`
--
ALTER TABLE `mst_asisten`
  MODIFY `id_asisten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mst_dosen`
--
ALTER TABLE `mst_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mst_matkul`
--
ALTER TABLE `mst_matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `mst_praktikan`
--
ALTER TABLE `mst_praktikan`
  MODIFY `id_praktikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trx_frekuensi`
--
ALTER TABLE `trx_frekuensi`
  MODIFY `id_frekuensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
