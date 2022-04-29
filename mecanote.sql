-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2022 at 08:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mecanote`
--

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

CREATE TABLE `hutang` (
  `id_hutang` int(11) NOT NULL,
  `tanggal_hutang` datetime NOT NULL,
  `jenis_hutang` varchar(30) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga_satuan` int(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `subtotal` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hutang`
--

INSERT INTO `hutang` (`id_hutang`, `tanggal_hutang`, `jenis_hutang`, `jumlah`, `harga_satuan`, `keterangan`, `subtotal`) VALUES
(1, '2022-04-17 08:15:12', 'hutang madu', 8, 50000, 'hutang bulan april minggu 1', 400000),
(2, '2022-04-18 13:15:12', 'hutang bahan baku', 10, 20000, 'hutang bulan april minggu 2', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `tanggal_pemasukan` datetime NOT NULL,
  `jenis_pemasukan` varchar(30) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga_satuan` int(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `subtotal` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `tanggal_pemasukan`, `jenis_pemasukan`, `jumlah`, `harga_satuan`, `keterangan`, `subtotal`) VALUES
(1, '2022-04-17 08:34:20', 'uangmadu1', 5, 40000, 'uang hasil penjualan madu bulan april minggu 1', 200000),
(2, '2022-04-18 08:34:20', 'uangmadu2', 10, 30000, 'uang hasil penjualan madu bulan april minggu 2', 300000);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `tanggal_pengeluaran` datetime NOT NULL,
  `jenis_pengeluaran` varchar(30) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga_satuan` int(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `subtotal` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `tanggal_pengeluaran`, `jenis_pengeluaran`, `jumlah`, `harga_satuan`, `keterangan`, `subtotal`) VALUES
(1, '2022-04-17 10:02:15', 'Biaya Kemasan', 5, 20000, 'biaya pengeluaran april minggu 1', 100000),
(2, '2022-04-17 05:02:14', 'Biaya Perawatan Lebah', 10, 10000, 'biaya pengeluaran april minggu 2', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

CREATE TABLE `piutang` (
  `id_piutang` int(11) NOT NULL,
  `tanggal_piutang` datetime NOT NULL,
  `jenis_piutang` varchar(30) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga_satuan` int(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `subtotal` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `piutang`
--

INSERT INTO `piutang` (`id_piutang`, `tanggal_piutang`, `jenis_piutang`, `jumlah`, `harga_satuan`, `keterangan`, `subtotal`) VALUES
(1, '2022-04-17 08:07:31', 'uang piutang', 5, 20000, 'uang piutang bulan april minggu 1', 100000),
(2, '2022-04-18 13:07:31', 'uang piutang', 10, 30000, 'uang piutang bulan april minggu 2', 300000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id_hutang`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`id_piutang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id_hutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `id_piutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
