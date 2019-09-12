-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 Sep 2019 pada 15.14
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
  `sekarang` int(30) NOT NULL DEFAULT '0',
  `total` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `antri`
--

INSERT INTO `antri` (`lokasi`, `sekarang`, `total`) VALUES
('A0001', 5, 5),
('A0002', 0, 0),
('A0003', 0, 0),
('A0004', 0, 0),
('A0005', 0, 0);

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

--
-- Dumping data untuk tabel `foto_lokasi`
--

INSERT INTO `foto_lokasi` (`id_tempat`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`) VALUES
('A0001', 'A0001-6b02d9505cb63170d0d01cd1800b5b6f.png', 'A0001-f23ddb809ea8fb03a3958653921823b8.png', 'A0001-ae489b58d7fbdf6b6b83084511fd281b.png', 'A0001-861fb68945895ad148d2c626fc5759e9.png', 'A0001-d47c309aaec8a0d2ce61cc3abad99e31.png'),
('A0002', 'A0002-f3bd52761560d2cc9979b14c473c2c9a.png', 'A0002-8d5a34453d52ccc7e55e985664450255.png', 'A0002-20dc98e89a898e8a10acad60769704af.png', 'A0002-4a837d7aee440bfb747c322b70736ed6.png', 'A0002-901cdd7dafc4df28d12127d35a745a70.png'),
('A0003', 'A0003-d26c81b436d08c0967f220cb386fffad.png', 'A0003-63814e16499a89756d9ea2c02f580f6d.png', 'A0003-1ffadbf6e2778a94ff3b1f40839faed5.png', 'A0003-e3b829ba7503c02803cdb8ee64df898a.png', 'A0003-ecbf058478b1a195cd79a612c2c8baab.png'),
('A0004', 'A0004-358078e0dc64b450c3ec11e005053b2a.png', 'A0004-95414f90972f994491aaeeff0e2e7423.png', 'A0004-ea9c5c7d8bfa486e6c0cf32bad8f7c4b.png', 'A0004-358078e0dc64b450c3ec11e005053b2a.png', 'A0004-358078e0dc64b450c3ec11e005053b2a.png'),
('A0005', 'A0005-e70d43ff5bee187d38c7521ed57300c8.png', 'A0005-ae898f2899cd6f8c31a391892d016e9b.png', 'A0005-5f06494578189f5e07547374150270bb.png', 'A0005-281ff92e69584ad65fe824d0c378fa33.png', 'A0005-f452f251a3455f0e0dcbfced3bbebbf7.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fst`
--

CREATE TABLE `fst` (
  `ID_fas` varchar(10) NOT NULL,
  `ID_ins` varchar(30) NOT NULL,
  `poli` varchar(300) NOT NULL,
  `R_inap` varchar(200) NOT NULL,
  `D_sps` varchar(300) NOT NULL,
  `ambulance` int(20) NOT NULL,
  `kelebihan` varchar(1000) NOT NULL,
  `alat_k` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fst`
--

INSERT INTO `fst` (`ID_fas`, `ID_ins`, `poli`, `R_inap`, `D_sps`, `ambulance`, `kelebihan`, `alat_k`) VALUES
('fas0001', 'A0001', 'poli gigi , poli anak ', '2 kamar , 1 ugd', '-', 1, '-', 'reterogen -'),
('fas0002', 'A0002', 'poli gigi , poli anak  , poli andri ', '4 kamr , 1 ugd', 'dokter kandungan ', 0, '-', 'usg kandungan ');

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
('01', '', '', '', '', '', '', '', NULL, 1),
('02', '', '', '', '', '', '', '', NULL, 1),
('1050241708900001', 'pasien1', 'pasien1', 'anita nurrahmawati', '2', 'kediri', '088800000000', '', '-', 1),
('1050241708900002', 'pasien2', 'pasien2', 'andi fatkhurahman', '1', 'tulung agung', '088800000000', '', '-', 0),
('1050241708900003', 'pasien3', 'pasien3', 'jimmy feriawan', '1', 'kediri', '088800000000', '', 'bpj01', 1),
('1050241708900004', 'pasien4', '', 'yulianto', '1', 'kertosono', '088800000000', '', '-', 1),
('1050241708900005', 'pasien5', 'pasien5', 'bagas aji nugroho', '1', 'blitar', '088800000000', '', '-', 2),
('P000001', '', '', '', '', '', '', '', NULL, 1),
('P000002', '', '', '', '', '', '', '', NULL, 1),
('P000003', '', '', '', '', '', '', '', NULL, 1),
('P000004', '', '', '', '', '', '', '', NULL, 1),
('P000005', '', '', '', '', '', '', '', NULL, 1),
('P000006', '', '', '', '', '', '', '', NULL, 1);

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
  `no_antrian` int(5) NOT NULL,
  `jam_ambil_antrian` varchar(10) NOT NULL,
  `lokasi` varchar(80) NOT NULL,
  `tgl` varchar(10) NOT NULL,
  `pin_temp` varchar(20) NOT NULL,
  `status_temp` int(11) NOT NULL,
  `siklus_temp` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `temp`
--

INSERT INTO `temp` (`id_user_temp`, `no_antrian`, `jam_ambil_antrian`, `lokasi`, `tgl`, `pin_temp`, `status_temp`, `siklus_temp`) VALUES
('P000001', 1, '06:36:25', 'A0001', '07-09-19', '3373MyI8738DQW', 0, 0),
('P000003', 3, '06:36:35', 'A0001', '07-09-19', '3038ZrM6306wjO', 0, 0),
('P000004', 5, '06:37:55', 'A0001', '07-09-19', '2033YfI7857PsZ', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempbesok`
--

CREATE TABLE `tempbesok` (
  `id_user_temp` varchar(20) NOT NULL,
  `no_antrian` int(5) NOT NULL,
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
-- Indexes for table `fst`
--
ALTER TABLE `fst`
  ADD PRIMARY KEY (`ID_fas`);

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
