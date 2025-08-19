-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2025 at 05:04 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `databarang2`
--

CREATE TABLE `databarang2` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nib` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `bahan` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `ukuran` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `databarang2`
--

INSERT INTO `databarang2` (`id`, `kode_barang`, `nib`, `nama_barang`, `tipe`, `bahan`, `tahun`, `ukuran`, `kondisi`, `jumlah`, `harga`, `keterangan`, `gambar`) VALUES
(25, '1.3.2.05.001.004.001', '000001', 'Lemari Besi/Metal', 'BROTHER', 'besi', '2019', '10', 'Baik', '1', '2000000', 'Di resepsionis', '1755337346_146538e50114dc0ea9ad.jpg'),
(27, '1.3.2.02.001.001.003', '000001', 'Station Wagon', 'TOYOTA  INNOVA  G / TGN40R  GKMDKD', 'Besi', '2007', '2 x 5', 'Baik', '1', '192950000', 'dipakai bidang 2', '1755339082_867fddd35f12da3c0fa0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'test', 'testpass'),
(2, '1212131', '$2y$10$CrapziKPHuwtujTRB0xdeOk6pMBf7VE4lrnW2gwiCMTmk.cT/Dllu'),
(3, '122', '$2y$10$D8.BNgRqyI1ZbAXDBEjlVekyn8/DIVpTIsQbTtNqzRDGMrPE1eYqW'),
(4, 'annas', '$2y$10$nsiHzTaivkrJEZLyBY9twu01xMR0LJxe.ulgcxVfpzhGoEARiwqKG'),
(5, '1234', '$2y$10$8sKB29ie7vJIJZVaHcNZRe6a6.Aotl06vBYy.zYhrK8cGrUIQnN9q'),
(6, 'deedde', '$2y$10$AQQcF.rsytvPjLGAXtlySu0amjYYGJTWU1b5Q/bGwcAyrnHX12Tji'),
(7, 'qwerty', '$2y$10$wijoBZlZuOPP6fsSyCocBOZufVWPG6vQZtIXruVj2LquKq4cxfsEW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `databarang2`
--
ALTER TABLE `databarang2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `databarang2`
--
ALTER TABLE `databarang2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
