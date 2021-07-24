-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 07:02 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tes-login`
--

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `toko_id` int(11) NOT NULL,
  `nama_toko` varchar(128) NOT NULL,
  `deskripsi_toko` varchar(128) NOT NULL,
  `alamat_toko` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`toko_id`, `nama_toko`, `deskripsi_toko`, `alamat_toko`, `url`) VALUES
(11, 'A Store', 'Kami menyediakan laptop-laptop terbaik', 'Jakarta Barat', 'produk/astore'),
(12, 'D Store', 'Toko distributor resmi google pixel', 'Bekasi', 'produk/dstore'),
(15, 'I Store', 'Kami menjual produk - produk dari apple', 'Bogor', 'produk/istore');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`toko_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `toko_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
