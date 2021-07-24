-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 06:13 AM
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
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id_invoice` int(128) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `nomor_telepon` varchar(128) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `status_invoice` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `kurir_id` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `bank` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id_invoice`, `nama`, `alamat`, `nomor_telepon`, `tgl_pesan`, `batas_bayar`, `status_invoice`, `foto`, `kurir_id`, `id_pengguna`, `bank`) VALUES
(10, 'asdas', 'asdsadsa', 'asdadsdas', '2020-07-03 23:06:33', '2020-07-03 00:30:33', 'menunggu Konfirmasi', '', 2, 3, ''),
(11, 'asdas', 'asdasd', 'asdas', '2020-07-06 17:00:02', '2020-07-06 19:00:02', 'selesai', '', 2, 3, ''),
(12, 'asdas', 'asdasd', 'asdas', '2020-07-08 15:22:57', '2020-07-08 17:22:57', 'selesai', '', 2, 3, ''),
(13, 'asdas', 'asdasd', 'asdas', '2020-07-16 20:45:13', '2020-07-16 22:45:13', 'selesai', '', 2, 3, ''),
(14, 'asdsad', 'asdas', 'asdsa', '2020-11-07 23:23:21', '2020-11-07 00:23:21', 'selesai', '', 3, 3, ''),
(15, 'asdsad', 'asdas', 'asdas', '2020-11-13 11:24:29', '2020-11-13 13:24:29', 'selesai', '', 2, 3, ''),
(16, 'dsffsa', 'asdas', 'asdsa', '2021-01-12 14:26:54', '2021-01-12 16:26:54', 'selesai', '', 3, 3, ''),
(17, 'asdsad', 'asdas', 'asdas', '2021-01-17 00:15:06', '2021-01-17 00:15:06', 'selesai', '', 2, 3, ''),
(18, 'asdsad', 'asdas', 'asdas', '2021-02-25 00:15:41', '2021-02-25 00:15:41', 'selesai', '', 2, 3, ''),
(19, 'dsfds', 'dsfds', 'dsfdsffds', '2021-03-16 00:16:39', '2021-03-16 00:16:39', 'selesai', '', 3, 3, ''),
(20, 'asdasd', 'asdsadsad', 'asdsaas', '2021-05-12 16:26:29', '2021-05-12 16:26:29', 'selesai', '', 2, 3, ''),
(21, 'qwewqe', 'qwewqe', 'qweqw', '2021-05-12 21:37:14', '2021-05-12 21:37:14', 'selesai', '', 2, 3, ''),
(22, 'asdas', 'asdasd', 'asdas', '2021-06-09 06:50:04', '2021-06-09 06:50:04', 'selesai', '', 2, 3, 'BNI-234234324324'),
(23, 'asdas', 'asdasd', 'asdas', '2021-06-09 11:32:44', '2021-06-09 13:32:44', 'selesai', '', 2, 3, 'BNI-234234324324'),
(24, 'charlie', 'ancol', '9998762364', '2021-07-24 11:02:47', '2021-07-25 11:02:47', '', '', 2, 3, 'BNI-234234324324'),
(25, 'mike', 'senopati', '0811133294', '2021-07-24 11:04:18', '2021-07-25 11:04:18', '', '', 2, 3, 'BNI-234234324324'),
(26, 'will', 'gading serpong', '087877456783', '2021-07-24 11:05:09', '2021-07-25 11:05:09', '', '', 2, 3, 'Mandiri-234324324342'),
(27, 'akram', 'cempaka putih', '08786661723', '2021-07-24 11:07:21', '2021-07-25 11:07:21', '', '', 2, 3, 'BRI-5646501651'),
(28, 'olivia', 'simprug', '0813145450465', '2021-07-24 11:08:52', '2021-07-25 11:08:52', '', '', 2, 3, 'Mandiri-234324324342'),
(29, 'chandra', 'gatot subroto', '0813145450465', '2021-07-24 11:10:12', '2021-07-25 11:10:12', '', '', 3, 3, 'BNI-234234324324'),
(30, 'hanif', 'kebon jeruk', '0857123456', '2021-07-24 11:11:44', '2021-07-25 11:11:44', '', '', 3, 3, 'Mandiri-234324324342'),
(31, 'nabilah', 'taman aries', '087877456783', '2021-07-24 11:12:49', '2021-07-25 11:12:49', '', '', 3, 3, 'BCA-324234324234234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id_invoice` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
