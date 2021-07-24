-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 06:33 AM
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
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `id_invoice`, `id_produk`, `jumlah`) VALUES
(4, 10, 6, 2),
(5, 10, 5, 1),
(6, 11, 6, 2),
(7, 11, 5, 1),
(8, 12, 6, 2),
(9, 13, 6, 2),
(10, 13, 5, 1),
(11, 14, 6, 2),
(12, 14, 5, 1),
(13, 15, 6, 2),
(14, 15, 5, 1),
(15, 16, 6, 2),
(16, 16, 5, 1),
(17, 17, 5, 5),
(18, 19, 5, 1),
(19, 21, 5, 2),
(20, 23, 5, 4),
(21, 24, 43, 2),
(22, 25, 23, 1),
(23, 25, 24, 1),
(24, 25, 5, 1),
(25, 26, 36, 1),
(26, 26, 32, 1),
(27, 27, 34, 1),
(28, 27, 6, 1),
(29, 28, 1, 2),
(30, 29, 7, 1),
(31, 29, 6, 1),
(32, 29, 21, 1),
(33, 29, 23, 1),
(34, 30, 28, 1),
(35, 30, 33, 1),
(36, 31, 6, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
