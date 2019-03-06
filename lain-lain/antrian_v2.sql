-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2019 at 05:49 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrian_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `antri`
--

CREATE TABLE `antri` (
  `lokasi` varchar(50) NOT NULL,
  `sekarang` int(30) NOT NULL DEFAULT '0',
  `total` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `antri`
--

INSERT INTO `antri` (`lokasi`, `sekarang`, `total`) VALUES
('A001', 0, 1),
('A003', 0, 0),
('B001', 0, 1),
('C001', 2, 8),
('D001', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `ID_dk` varchar(5) NOT NULL,
  `username_dk` varchar(30) NOT NULL,
  `pasword_dk` varchar(30) NOT NULL,
  `id_praktek_dk` varchar(100) NOT NULL,
  `no_ijin_dk` varchar(50) NOT NULL,
  `alamat_tinngal_dk` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`ID_dk`, `username_dk`, `pasword_dk`, `id_praktek_dk`, `no_ijin_dk`, `alamat_tinngal_dk`) VALUES
('1', 'dokter', 'dokter', '001', '001', '001');

-- --------------------------------------------------------

--
-- Table structure for table `dokterumum`
--

CREATE TABLE `dokterumum` (
  `ID_dokterumum` varchar(10) NOT NULL,
  `nama_dokterumum` varchar(150) NOT NULL,
  `alamat_dokterumum` varchar(300) NOT NULL,
  `jambuka_dokterumum` varchar(100) NOT NULL,
  `jamtutup_dokterumum` varchar(50) NOT NULL,
  `pemilik_dokterumum` varchar(200) NOT NULL,
  `no_op_dokterumum` varchar(50) NOT NULL,
  `no_telp_dokterumum` varchar(20) NOT NULL,
  `cuti_dokterumum` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokterumum`
--

INSERT INTO `dokterumum` (`ID_dokterumum`, `nama_dokterumum`, `alamat_dokterumum`, `jambuka_dokterumum`, `jamtutup_dokterumum`, `pemilik_dokterumum`, `no_op_dokterumum`, `no_telp_dokterumum`, `cuti_dokterumum`) VALUES
('D001', 'andi', 'disini', '0100', '0500', 'kerbau', '0854784568', '022659599', '');

-- --------------------------------------------------------

--
-- Table structure for table `foto_lokasi`
--

CREATE TABLE `foto_lokasi` (
  `id_tempat` varchar(15) NOT NULL,
  `foto1` text NOT NULL,
  `foto2` text NOT NULL,
  `foto3` text NOT NULL,
  `foto4` text NOT NULL,
  `foto5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `klinik`
--

CREATE TABLE `klinik` (
  `ID_klinik` varchar(10) NOT NULL,
  `nama_klinik` varchar(150) NOT NULL,
  `alamat_klinik` varchar(300) NOT NULL,
  `jambuka_klinik` varchar(100) NOT NULL,
  `jamtutup_klinik` varchar(50) NOT NULL,
  `pemilik_klinik` varchar(200) NOT NULL,
  `no_op_klinik` varchar(50) NOT NULL,
  `no_telp_klinik` varchar(20) NOT NULL,
  `cuti_klinik` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klinik`
--

INSERT INTO `klinik` (`ID_klinik`, `nama_klinik`, `alamat_klinik`, `jambuka_klinik`, `jamtutup_klinik`, `pemilik_klinik`, `no_op_klinik`, `no_telp_klinik`, `cuti_klinik`) VALUES
('B001', 'budi dama', 'disini', '0200', '0600', 'andi', '0248', '05484', '');

-- --------------------------------------------------------

--
-- Table structure for table `nimda`
--

CREATE TABLE `nimda` (
  `ID_nimda` varchar(5) NOT NULL,
  `username_nimda` varchar(30) NOT NULL,
  `password_nimda` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nimda`
--

INSERT INTO `nimda` (`ID_nimda`, `username_nimda`, `password_nimda`) VALUES
('AD001', 'aku', 'aku');

-- --------------------------------------------------------

--
-- Table structure for table `oprator`
--

CREATE TABLE `oprator` (
  `ID_op` varchar(16) NOT NULL,
  `username_op` varchar(30) NOT NULL,
  `password_op` varchar(30) NOT NULL,
  `tingkat_op` varchar(2) NOT NULL,
  `nama_op` varchar(30) NOT NULL,
  `no_op` varchar(14) NOT NULL,
  `jk_op` varchar(1) NOT NULL,
  `alamat_op` varchar(50) NOT NULL,
  `lokasi_op` varchar(50) NOT NULL,
  `status_op` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oprator`
--

INSERT INTO `oprator` (`ID_op`, `username_op`, `password_op`, `tingkat_op`, `nama_op`, `no_op`, `jk_op`, `alamat_op`, `lokasi_op`, `status_op`) VALUES
('1', 'admin', 'admin', '1', '', '', '', '', 'A003', '2'),
('2', 'admin2', 'admin3', '2', '', '', '', '', 'A003', '1'),
('3', 'yuto', '123', '1', '', '', '', '', 'A001', '1'),
('5', 'coba2', 'coba2', '1', '', '', '', '', 'A003', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `ID_pasien` varchar(16) NOT NULL,
  `username_pasien` varchar(30) NOT NULL,
  `password_pasien` varchar(30) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `jenis_kelamin_pasien` varchar(1) NOT NULL,
  `alamat_pasien` varchar(300) NOT NULL,
  `no_hp_pasien` varchar(13) NOT NULL,
  `foto_profil_pasien` varchar(50) NOT NULL,
  `no_bpjs_pasien` varchar(13) DEFAULT NULL,
  `status_pasien` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`ID_pasien`, `username_pasien`, `password_pasien`, `nama_pasien`, `jenis_kelamin_pasien`, `alamat_pasien`, `no_hp_pasien`, `foto_profil_pasien`, `no_bpjs_pasien`, `status_pasien`) VALUES
('P000001', 'noob', 'noob', '', '', '', '', '', NULL, 1),
('P000002', 'noob', '', '', '', '', '', '', NULL, 1),
('P000003', 'dirimu', '', '', '', '', '', '', NULL, 1),
('P000004', 'd8iriku', '', '', '', '', '', '', NULL, 1),
('P000005', 'aku', '', '', '', '', '', '', NULL, 1),
('P000006', 'aku', '', '', '', '', '', '', NULL, 1),
('P000007', 'bagas', '', '', '', '', '', '', NULL, 0),
('P000008', 'aku', '', '', '', '', '', '', NULL, 0),
('P000009', 'noob', '', '', '', '', '', '', NULL, 0),
('P000010', 'noob', '', '', '', '', '', '', NULL, 0),
('P000011', 'aku', '', '', '', '', '', '', NULL, 0),
('P000012', 'aku', '', '', '', '', '', '', NULL, 1),
('P000013', 'bagas', '', '', '', '', '', '', NULL, 1),
('P000014', 'aji', '', '', '', '', '', '', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pukesmas`
--

CREATE TABLE `pukesmas` (
  `ID_pukesmas` varchar(10) NOT NULL,
  `nama_pukesmas` varchar(150) NOT NULL,
  `alamat_pukesmas` varchar(300) NOT NULL,
  `jambuka_pukesmas` varchar(100) NOT NULL,
  `jamtutup_pukesmas` varchar(50) NOT NULL,
  `pemilik_pukesmas` varchar(200) NOT NULL,
  `no_op_pukesmas` varchar(50) NOT NULL,
  `no_telp_pukesmas` varchar(20) NOT NULL,
  `cuti_pukesmas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pukesmas`
--

INSERT INTO `pukesmas` (`ID_pukesmas`, `nama_pukesmas`, `alamat_pukesmas`, `jambuka_pukesmas`, `jamtutup_pukesmas`, `pemilik_pukesmas`, `no_op_pukesmas`, `no_telp_pukesmas`, `cuti_pukesmas`) VALUES
('A001', 'ok', 'ya', '', '', '', '', '', ''),
('A003', 'disnin', 'alah mbuh', '0855', '0123', 'bagas', '023', '0122', '032');

-- --------------------------------------------------------

--
-- Table structure for table `rumahsakit`
--

CREATE TABLE `rumahsakit` (
  `ID_rumahsakit` varchar(10) NOT NULL,
  `nama_rumahsakit` varchar(150) NOT NULL,
  `alamat_rumahsakit` varchar(300) NOT NULL,
  `jambuka_rumahsakit` varchar(100) NOT NULL,
  `jamtutup_rumahsakit` varchar(50) NOT NULL,
  `pemilik_rumahsakit` varchar(200) NOT NULL,
  `no_op_rumahsakit` varchar(50) NOT NULL,
  `no_telp_rumahsakit` varchar(20) NOT NULL,
  `cuti_rumahsakit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rumahsakit`
--

INSERT INTO `rumahsakit` (`ID_rumahsakit`, `nama_rumahsakit`, `alamat_rumahsakit`, `jambuka_rumahsakit`, `jamtutup_rumahsakit`, `pemilik_rumahsakit`, `no_op_rumahsakit`, `no_telp_rumahsakit`, `cuti_rumahsakit`) VALUES
('C001', 'Al kemaruk', 'disnin', '0360', '0400', 'bagas', '054884', '456885', '');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id_user_temp` varchar(10) NOT NULL,
  `no_antrian` varchar(5) NOT NULL,
  `jam_ambil_antrian` varchar(10) NOT NULL,
  `lokasi` varchar(80) NOT NULL,
  `tgl` varchar(10) NOT NULL,
  `pin_temp` varchar(20) NOT NULL,
  `status_temp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id_user_temp`, `no_antrian`, `jam_ambil_antrian`, `lokasi`, `tgl`, `pin_temp`, `status_temp`) VALUES
('P000001', '1', '18:37:34', 'A001', '05/03/2019', '353260fV201686', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tempbesok`
--

CREATE TABLE `tempbesok` (
  `id_user_temp` varchar(10) NOT NULL,
  `no_antrian` varchar(5) NOT NULL,
  `jam_ambil_antrian` varchar(10) NOT NULL,
  `lokasi` varchar(80) NOT NULL,
  `tgl` varchar(10) NOT NULL,
  `id_oprator_temp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antri`
--
ALTER TABLE `antri`
  ADD PRIMARY KEY (`lokasi`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`ID_dk`);

--
-- Indexes for table `dokterumum`
--
ALTER TABLE `dokterumum`
  ADD PRIMARY KEY (`ID_dokterumum`);

--
-- Indexes for table `klinik`
--
ALTER TABLE `klinik`
  ADD PRIMARY KEY (`ID_klinik`);

--
-- Indexes for table `nimda`
--
ALTER TABLE `nimda`
  ADD PRIMARY KEY (`ID_nimda`);

--
-- Indexes for table `oprator`
--
ALTER TABLE `oprator`
  ADD PRIMARY KEY (`ID_op`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`ID_pasien`);

--
-- Indexes for table `pukesmas`
--
ALTER TABLE `pukesmas`
  ADD PRIMARY KEY (`ID_pukesmas`);

--
-- Indexes for table `rumahsakit`
--
ALTER TABLE `rumahsakit`
  ADD PRIMARY KEY (`ID_rumahsakit`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id_user_temp`);

--
-- Indexes for table `tempbesok`
--
ALTER TABLE `tempbesok`
  ADD PRIMARY KEY (`id_user_temp`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
