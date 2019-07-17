-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2019 at 08:21 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

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
-- Table structure for table `fst`
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
-- Dumping data for table `fst`
--

INSERT INTO `fst` (`ID_fas`, `ID_ins`, `poli`, `R_inap`, `D_sps`, `ambulance`, `kelebihan`, `alat_k`) VALUES
('fas0001', 'A0001', 'poli gigi , poli anak ', '2 kamar , 1 ugd', '-', 1, '-', 'reterogen -'),
('fas0002', 'A0002', 'poli gigi , poli anak  , poli andri ', '4 kamr , 1 ugd', 'dokter kandungan ', 0, '-', 'usg kandungan ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fst`
--
ALTER TABLE `fst`
  ADD PRIMARY KEY (`ID_fas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
