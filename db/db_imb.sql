-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 08:29 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_imb`
--

-- --------------------------------------------------------

--
-- Table structure for table `syarat`
--

CREATE TABLE `syarat` (
  `id` int(11) NOT NULL,
  `fotocopy_ktp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bangunan`
--

CREATE TABLE `tbl_bangunan` (
  `id_bangunan` int(11) NOT NULL,
  `id_jenis_bangunan` int(11) NOT NULL,
  `alamat_bangunan` varchar(50) NOT NULL,
  `luas_tanah` varchar(20) NOT NULL,
  `luas_bangunan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bangunan`
--

INSERT INTO `tbl_bangunan` (`id_bangunan`, `id_jenis_bangunan`, `alamat_bangunan`, `luas_tanah`, `luas_bangunan`) VALUES
(9, 4, 'jl. Mas ', '25000', '10000'),
(10, 1, 'jl. Rambutan', '4000', '15000'),
(11, 3, 'jl. durian', '3000', '1000'),
(12, 2, 'jl. kelinci', '12000', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis`
--

CREATE TABLE `tbl_jenis` (
  `id_jenis_bangunan` int(11) NOT NULL,
  `nama_jenis_bangunan` varchar(255) NOT NULL,
  `pajak_bangunan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jenis`
--

INSERT INTO `tbl_jenis` (`id_jenis_bangunan`, `nama_jenis_bangunan`, `pajak_bangunan`) VALUES
(1, 'Perkantoran', 10000),
(2, 'Permukiman', 20000),
(3, 'Perdanganan', 30000),
(4, 'Pabrik', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permohonan`
--

CREATE TABLE `tbl_permohonan` (
  `id_permohonan` int(11) NOT NULL,
  `id_jenis_bangunan` int(11) NOT NULL,
  `nama_pemohon` varchar(20) NOT NULL,
  `nik` int(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `tanggal_pengajuan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_permohonan`
--

INSERT INTO `tbl_permohonan` (`id_permohonan`, `id_jenis_bangunan`, `nama_pemohon`, `nik`, `alamat`, `tanggal_pengajuan`) VALUES
(12, 1, 'nuraini', 2147483647, 'buntu maraja', '2020-12-29'),
(13, 2, 'nuraini', 2147483647, 'Medan, Deli', '2020-12-29'),
(14, 3, 'Dodi ', 2147483647, 'jl.lintas sumatera', '2020-12-29'),
(15, 3, 'nuraini', 2147483647, 'buntu maraja', '2020-12-29'),
(16, 1, 'Jeki Sitohang', 2147483647, 'Jl. Rivai', '2020-12-29'),
(17, 2, 'Mardalius', 129839123, 'gatau', '2020-12-29'),
(18, 2, 'henu', 213123, 'asdasd', '2020-12-29'),
(19, 4, 'Ferdiansyah', 2147483647, 'jl. nugroho kisaran barat', '2020-12-29'),
(20, 3, 'Dodi sahbudi sitorus', 2147483647, 'Jl. Lintas Sumatera Utara', '2020-12-29'),
(21, 4, 'Bagas', 2147483647, 'Jl. Batu Nasi', '2020-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `syarat`
--
ALTER TABLE `syarat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bangunan`
--
ALTER TABLE `tbl_bangunan`
  ADD PRIMARY KEY (`id_bangunan`);

--
-- Indexes for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  ADD PRIMARY KEY (`id_jenis_bangunan`);

--
-- Indexes for table `tbl_permohonan`
--
ALTER TABLE `tbl_permohonan`
  ADD PRIMARY KEY (`id_permohonan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `syarat`
--
ALTER TABLE `syarat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_bangunan`
--
ALTER TABLE `tbl_bangunan`
  MODIFY `id_bangunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  MODIFY `id_jenis_bangunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_permohonan`
--
ALTER TABLE `tbl_permohonan`
  MODIFY `id_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
