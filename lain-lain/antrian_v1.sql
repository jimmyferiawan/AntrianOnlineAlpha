-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 Feb 2019 pada 07.00
-- Versi Server: 10.1.21-MariaDB
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
-- Struktur dari tabel `antri`
--

CREATE TABLE `antri` (
  `lokasi` varchar(50) NOT NULL,
  `now` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `antri`
--

INSERT INTO `antri` (`lokasi`, `now`) VALUES
('A003', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
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
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`ID_dk`, `username_dk`, `pasword_dk`, `id_praktek_dk`, `no_ijin_dk`, `alamat_tinngal_dk`) VALUES
('1', 'dokter', 'dokter', '001', '001', '001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokterumum`
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
-- Dumping data untuk tabel `dokterumum`
--

INSERT INTO `dokterumum` (`ID_dokterumum`, `nama_dokterumum`, `alamat_dokterumum`, `jambuka_dokterumum`, `jamtutup_dokterumum`, `pemilik_dokterumum`, `no_op_dokterumum`, `no_telp_dokterumum`, `cuti_dokterumum`) VALUES
('D001', 'andi', 'disini', '0100', '0500', 'kerbau', '0854784568', '022659599', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klinik`
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
  `cuti_klinik` varchar(100) NOT NULL,
  `antrian` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `klinik`
--

INSERT INTO `klinik` (`ID_klinik`, `nama_klinik`, `alamat_klinik`, `jambuka_klinik`, `jamtutup_klinik`, `pemilik_klinik`, `no_op_klinik`, `no_telp_klinik`, `cuti_klinik`, `antrian`) VALUES
('B001', 'budi dama', 'disini', '0200', '0600', 'andi', '0248', '05484', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nimda`
--

CREATE TABLE `nimda` (
  `ID_nimda` varchar(5) NOT NULL,
  `username_nimda` varchar(30) NOT NULL,
  `password_nimda` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `oprator`
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
-- Dumping data untuk tabel `oprator`
--

INSERT INTO `oprator` (`ID_op`, `username_op`, `password_op`, `tingkat_op`, `nama_op`, `no_op`, `jk_op`, `alamat_op`, `lokasi_op`, `status_op`) VALUES
('1', 'admin', 'admin', '1', '', '', '', '', '', ''),
('2', 'admin2', 'admin3', '2', '', '', '', '', '', ''),
('3', 'yuto', '123', '2', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
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
  `no_bpjs_pasien` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`ID_pasien`, `username_pasien`, `password_pasien`, `nama_pasien`, `jenis_kelamin_pasien`, `alamat_pasien`, `no_hp_pasien`, `foto_profil_pasien`, `no_bpjs_pasien`) VALUES
('P000001', 'pasien', 'pasien', 'Andi Noob', 'L', 'disini', '0854788451', '', '157448584'),
('P000002', 'aladyne', '', '', '', '', '', '', NULL),
('P000003', 'afelin', '', '', '', '', '', '', NULL),
('P000004', 'lijn', '', '', '', '', '', '', NULL),
('P000005', 'khgjfd', '', '', '', '', '', '', NULL),
('P000006', 'karra', '', '', '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pukesmas`
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
  `cuti_pukesmas` varchar(100) NOT NULL,
  `antrian` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pukesmas`
--

INSERT INTO `pukesmas` (`ID_pukesmas`, `nama_pukesmas`, `alamat_pukesmas`, `jambuka_pukesmas`, `jamtutup_pukesmas`, `pemilik_pukesmas`, `no_op_pukesmas`, `no_telp_pukesmas`, `cuti_pukesmas`, `antrian`) VALUES
('A001', 'Dinas Kesehatan kediri', 'disini', '0500', '0500', 'bagas', '0263', '56959596', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumahsakit`
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
  `cuti_rumahsakit` varchar(100) NOT NULL,
  `antrian` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rumahsakit`
--

INSERT INTO `rumahsakit` (`ID_rumahsakit`, `nama_rumahsakit`, `alamat_rumahsakit`, `jambuka_rumahsakit`, `jamtutup_rumahsakit`, `pemilik_rumahsakit`, `no_op_rumahsakit`, `no_telp_rumahsakit`, `cuti_rumahsakit`, `antrian`) VALUES
('C001', 'Al kemaruk', 'disnin', '0360', '0400', 'bagas', '054884', '456885', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp`
--

CREATE TABLE `temp` (
  `id_user_temp` varchar(10) NOT NULL,
  `no_antrian` varchar(5) NOT NULL,
  `jam_ambil_antrian` varchar(10) NOT NULL,
  `lokasi` varchar(80) NOT NULL,
  `tgl` varchar(10) NOT NULL,
  `id_oprator_temp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `temp`
--

INSERT INTO `temp` (`id_user_temp`, `no_antrian`, `jam_ambil_antrian`, `lokasi`, `tgl`, `id_oprator_temp`) VALUES
('P000002', '1', '04:54:32', '', '20-02-19', ''),
('P000003', '2', '04:54:37', '', '20-02-19', ''),
('P000004', '3', '04:54:43', '', '20-02-19', ''),
('P000005', '4', '05:03:09', '', '21-02-19', ''),
('P000006', '5', '03:30:18', '', '22-02-19', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempbesok`
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
