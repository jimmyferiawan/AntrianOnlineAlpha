-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Mar 2019 pada 06.59
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `sekarang` int(30) NOT NULL DEFAULT '0',
  `total` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `antri`
--

INSERT INTO `antri` (`lokasi`, `sekarang`, `total`) VALUES
('A001', 0, 1),
('A003', 0, 0),
('B001', 0, 1),
('C001', 2, 8),
('D001', 0, 0);

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
('DK001', 'dokter1', 'dokter1', '-', '34.2.1.100.1.18.206248', 'kediri'),
('DK002', 'dokter2', 'dokter2', '-', '34.2.1.100.1.18.206249', 'NGANJUK'),
('DK003', 'dokter3', 'dokter3', '-', '34.2.1.100.1.18.206250', 'TULUNGAGUNG');

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
('DU001', 'dr. Andi Nirmalasari', 'kediri', '09.00', '13.00', 'dr. Andi Nirmalasari', '0888-0000-0000', '0888-0000-0000', '-'),
('DU002', 'dr. Irda Yulianti', 'kediri', '13.00', '16.00', 'dr. Irda Yulianti', '0888-0000-0000', '0888-0000-0000', '-'),
('DU003', 'dr. Maulina Yunus', 'kediri', '16.00', '20.00', 'dr. Maulina Yunus', '0888-0000-0000', '0888-0000-0000', '-'),
('DU004', 'dr. Nurul Indah Pratiwi', 'kediri', '13.00', '16.00', 'dr. Nurul Indah Pratiwi', '0888-0000-0000', '0888-0000-0000', '-'),
('DU005', 'dr. Firdaus', 'kediri', '18.00', '20.00', 'dr. Firdaus', '0888-0000-0000', '0888-0000-0000', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_lokasi`
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
  `cuti_klinik` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `klinik`
--

INSERT INTO `klinik` (`ID_klinik`, `nama_klinik`, `alamat_klinik`, `jambuka_klinik`, `jamtutup_klinik`, `pemilik_klinik`, `no_op_klinik`, `no_telp_klinik`, `cuti_klinik`) VALUES
('B001', 'Klinik Salsabila Medika', 'No.87, Kelurahan, Jl. Penanggungan, Lirboyo, Mojoroto, Kota Kediri, Jawa Timur 64117', '10.00', '21.00', '-', '0812-1671-694', '0812-1671-695', '-'),
('B002', 'Klinik Pusat Kesehatan PT. G', 'Jalan Selowarih No.69, Ngadirejo, Dandangan, Kec. Kota Kediri, Kediri, Jawa Timur 64129', '10.00', '16.00', '-', '(0354) 682090', '(0354) 682091', '-'),
('B003', 'Klinik Dahlia Medika', 'Jl. Sriwijaya No.84, Jagalan, Kec. Kota Kediri, Kota Kediri, Jawa Timur 64125', '10.00', '16.00', '-', '(0354) 692822', '(0354) 692823', '-'),
('B004', 'Klinik Ortopedi Samudra Husada Kusuma Official', 'No 15, 64121, Jl. Sultan Iskandar Muda, Semampir, Mojoroto, Kediri, Jawa Timur 64112', '24/7', '-', '-', '(0354) 699957', '(0354) 699958', '-'),
('B005', 'Klinik Mata Kediri (KliMaK)', 'Jl. Perumahan Mojoroto Indah No.mor 09, Mojoroto, Kota Kediri, Jawa Timur 64112', '06.00', '20.00', '-', '(0354) 774770', '(0354) 774771', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nimda`
--

CREATE TABLE `nimda` (
  `ID_nimda` varchar(5) NOT NULL,
  `username_nimda` varchar(30) NOT NULL,
  `password_nimda` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nimda`
--

INSERT INTO `nimda` (`ID_nimda`, `username_nimda`, `password_nimda`) VALUES
('AD001', 'dev1', 'dev1'),
('AD002', 'dev2', 'dev2'),
('AD003', 'dinkes', 'dinkes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oprator`
--

CREATE TABLE `oprator` (
  `ID_op` varchar(30) NOT NULL,
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
('OP1050241708900001', 'op1', 'op1', '1', 'yayan', '0888-0000-0000', '1', 'nganjuk', 'A0001', '1'),
('OP1050241708900002', 'op2', 'op2', '2', 'ardi', '0888-0000-0000', '1', 'kediri', 'A0002', '1'),
('OP1050241708900003', 'op3', 'op3', '2', 'tejo', '0888-0000-0000', '1', 'kediri', 'A0003', '1'),
('OP1050241708900004', 'op4', 'op4', '2', 'uno', '0888-0000-0000', '1', 'kediri', 'A0004', '1'),
('OP1050241708900005', 'op5', 'op5', '1', 'dany', '0888-0000-0000', '1', 'kediri', 'A0005', '1');

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
  `no_bpjs_pasien` varchar(13) DEFAULT NULL,
  `status_pasien` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`ID_pasien`, `username_pasien`, `password_pasien`, `nama_pasien`, `jenis_kelamin_pasien`, `alamat_pasien`, `no_hp_pasien`, `foto_profil_pasien`, `no_bpjs_pasien`, `status_pasien`) VALUES
('1050241708900001', 'pasien1', 'pasien1', 'anita nurrahmawati', '2', 'kediri', '088800000000', '', '-', 1),
('1050241708900002', 'pasien2', 'pasien2', 'andi fatkhurahman', '1', 'tulung agung', '088800000000', '', '-', 0),
('1050241708900003', 'pasien3', 'pasien3', 'jimmy feriawan', '1', 'kediri', '088800000000', '', NULL, 1),
('1050241708900004', 'pasien4', '', 'yulianto', '1', 'kertosono', '088800000000', '', '-', 1),
('1050241708900005', 'pasien5', 'pasien5', 'bagas aji nugroho', '1', 'blitar', '088800000000', '', '-', 2);

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
  `cuti_pukesmas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pukesmas`
--

INSERT INTO `pukesmas` (`ID_pukesmas`, `nama_pukesmas`, `alamat_pukesmas`, `jambuka_pukesmas`, `jamtutup_pukesmas`, `pemilik_pukesmas`, `no_op_pukesmas`, `no_telp_pukesmas`, `cuti_pukesmas`) VALUES
('A0001', 'Puskesmas Balowerti', 'Jl. Balowerti V, Balowerti, Kec. Kota Kediri, Kediri, Jawa Timur 64129', '08.00', '20.00', '-', '-', '-', '-'),
('A0002', 'Puskesmas Sukorame', 'Jl. Veteran No.50A, Mojoroto, Kec. Kota Kediri, Kota Kediri, Jawa Timur 64112', '08.55', '16.00', '-', '(0354) 778604', '(0354) 778604', '-'),
('A0003', 'Puskesmas Pembantu Lirboyo', 'Jalan Pondok Pesantren, Mojoroto, Bandar Lor, Mojoroto, Kediri, Jawa Timur 64117', '08.00', '20.00', '-', '-', '-', '-'),
('A0004', 'Puskesmas Pembantu Ngadirejo', 'Ngadirejo, Kec. Kota Kediri, Kota Kediri, Jawa Timur 64129', '08.00', '12.00', '-', '-', '-', 'jumat, sabtu, minggu'),
('A0005', 'Puskesmas Pesantren 2', 'Jl. Cendana No.30, Singonegaran, Pesantren, Kota Kediri, Jawa Timur 64132', '07.30', '11.30', '-', '(0354) 689055', '(0354) 689055', 'minggu');

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
  `cuti_rumahsakit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rumahsakit`
--

INSERT INTO `rumahsakit` (`ID_rumahsakit`, `nama_rumahsakit`, `alamat_rumahsakit`, `jambuka_rumahsakit`, `jamtutup_rumahsakit`, `pemilik_rumahsakit`, `no_op_rumahsakit`, `no_telp_rumahsakit`, `cuti_rumahsakit`) VALUES
('C001', 'Al kemaruk', 'disnin', '0360', '0400', 'bagas', '054884', '456885', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp`
--

CREATE TABLE `temp` (
  `id_user_temp` varchar(20) NOT NULL,
  `no_antrian` varchar(5) NOT NULL,
  `jam_ambil_antrian` varchar(10) NOT NULL,
  `lokasi` varchar(80) NOT NULL,
  `tgl` varchar(10) NOT NULL,
  `pin_temp` varchar(20) NOT NULL,
  `status_temp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `temp`
--

INSERT INTO `temp` (`id_user_temp`, `no_antrian`, `jam_ambil_antrian`, `lokasi`, `tgl`, `pin_temp`, `status_temp`) VALUES
('P000001', '1', '18:37:34', 'A001', '05/03/2019', '353260fV201686', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempbesok`
--

CREATE TABLE `tempbesok` (
  `id_user_temp` varchar(20) NOT NULL,
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
-- Indeks untuk tabel `antri`
--
ALTER TABLE `antri`
  ADD PRIMARY KEY (`lokasi`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`ID_dk`);

--
-- Indeks untuk tabel `dokterumum`
--
ALTER TABLE `dokterumum`
  ADD PRIMARY KEY (`ID_dokterumum`);

--
-- Indeks untuk tabel `klinik`
--
ALTER TABLE `klinik`
  ADD PRIMARY KEY (`ID_klinik`);

--
-- Indeks untuk tabel `nimda`
--
ALTER TABLE `nimda`
  ADD PRIMARY KEY (`ID_nimda`);

--
-- Indeks untuk tabel `oprator`
--
ALTER TABLE `oprator`
  ADD PRIMARY KEY (`ID_op`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`ID_pasien`);

--
-- Indeks untuk tabel `pukesmas`
--
ALTER TABLE `pukesmas`
  ADD PRIMARY KEY (`ID_pukesmas`);

--
-- Indeks untuk tabel `rumahsakit`
--
ALTER TABLE `rumahsakit`
  ADD PRIMARY KEY (`ID_rumahsakit`);

--
-- Indeks untuk tabel `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id_user_temp`);

--
-- Indeks untuk tabel `tempbesok`
--
ALTER TABLE `tempbesok`
  ADD PRIMARY KEY (`id_user_temp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
