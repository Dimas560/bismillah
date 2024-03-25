-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 24, 2024 at 05:47 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasirlspp1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_order`
--

CREATE TABLE `tb_detail_order` (
  `id_dorder` int NOT NULL,
  `check_available` int NOT NULL,
  `id_order` varchar(50) NOT NULL,
  `id_masakan` int NOT NULL,
  `keterangan_dorder` text,
  `jumlah_dorder` int NOT NULL,
  `hartot_dorder` int NOT NULL,
  `id_user` int NOT NULL,
  `status_dorder` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_order`
--

INSERT INTO `tb_detail_order` (`id_dorder`, `check_available`, `id_order`, `id_masakan`, `keterangan_dorder`, `jumlah_dorder`, `hartot_dorder`, `id_user`, `status_dorder`) VALUES
(143, 1, 'ABC1', 24, '', 1, 30000, 2, 1),
(144, 2, 'ABC2', 24, '', 2, 60000, 2, 1),
(145, 2, 'ABC2', 28, '', 2, 44000, 2, 1),
(146, 2, 'ABC2', 18, '', 2, 14000, 2, 1),
(147, 2, 'ABC2', 19, 'manis', 2, 12000, 2, 1),
(148, 3, 'ABC3', 24, '', 1, 30000, 2, 1),
(149, 4, 'ABC4', 28, 'pedes', 1, 22000, 2, 1),
(151, 5, 'ABC5', 28, 'd', 1, 22000, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int NOT NULL,
  `level` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, 'Administrator'),
(2, 'Waiter'),
(3, 'Kasir'),
(4, 'Owner');

-- --------------------------------------------------------

--
-- Table structure for table `tb_masakan`
--

CREATE TABLE `tb_masakan` (
  `id_masakan` int NOT NULL,
  `kategori_masakan` varchar(128) NOT NULL,
  `nama_masakan` varchar(128) NOT NULL,
  `harga_masakan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_masakan`
--

INSERT INTO `tb_masakan` (`id_masakan`, `kategori_masakan`, `nama_masakan`, `harga_masakan`) VALUES
(18, 'Minuman', 'Es Teh ', 7000),
(19, 'Minuman', 'teh hangat', 6000),
(24, 'Makanan', 'Mie Rebus', 30000),
(28, 'Makanan', 'Nasi Goreng ', 22000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_meja`
--

CREATE TABLE `tb_meja` (
  `meja_id` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_meja`
--

INSERT INTO `tb_meja` (`meja_id`, `status`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` varchar(50) NOT NULL,
  `meja_order` int NOT NULL,
  `tanggal_order` int NOT NULL,
  `aTanggal_order` varchar(128) NOT NULL,
  `id_user` int NOT NULL,
  `keterangan_order` text,
  `status_order` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `meja_order`, `tanggal_order`, `aTanggal_order`, `id_user`, `keterangan_order`, `status_order`) VALUES
('ABC1', 9, 1711215331, '24-03-2024', 2, 'dd', '1'),
('ABC2', 8, 1711215438, '24-03-2024', 2, 'jon', '1'),
('ABC3', 8, 1711272370, '24-03-2024', 2, 'aa', '1'),
('ABC4', 12, 1711301283, '25-03-2024', 2, 'aFARHAN', '1'),
('ABC5', 2, 1711302211, '25-03-2024', 2, 's', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int NOT NULL,
  `id_order` varchar(50) NOT NULL,
  `tanggal_transaksi` int NOT NULL,
  `aTanggal_transaksi` varchar(50) NOT NULL,
  `totbar_transaksi` int NOT NULL,
  `uang_transaksi` int NOT NULL,
  `kembalian_transaksi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_order`, `tanggal_transaksi`, `aTanggal_transaksi`, `totbar_transaksi`, `uang_transaksi`, `kembalian_transaksi`) VALUES
(61, 'ABC1', 1711215346, '24-03-2024', 30000, 50000, 20000),
(62, 'ABC2', 1711215697, '24-03-2024', 130000, 200000, 70000),
(63, 'ABC3', 1711272470, '24-03-2024', 30000, 50000, 20000),
(64, 'ABC4', 1711301298, '25-03-2024', 22000, 40000, 18000),
(65, 'ABC5', 1711302259, '25-03-2024', 22000, 30000, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama_user` varchar(128) NOT NULL,
  `id_level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_user`, `id_level`) VALUES
(1, 'admin', '123', 'admin', 1),
(2, 'waiter', '123', 'waiter', 2),
(6, 'kasir', '123', 'kasir', 3),
(7, 'owner', '123', 'owner', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  ADD PRIMARY KEY (`id_dorder`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_masakan`
--
ALTER TABLE `tb_masakan`
  ADD PRIMARY KEY (`id_masakan`);

--
-- Indexes for table `tb_meja`
--
ALTER TABLE `tb_meja`
  ADD PRIMARY KEY (`meja_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  MODIFY `id_dorder` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_masakan`
--
ALTER TABLE `tb_masakan`
  MODIFY `id_masakan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_meja`
--
ALTER TABLE `tb_meja`
  MODIFY `meja_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
