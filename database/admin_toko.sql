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
-- Table structure for table `admin_toko`
--

CREATE TABLE `admin_toko` (
  `admin_id` int(11) NOT NULL,
  `name_admin` varchar(128) NOT NULL,
  `email_admin` varchar(128) NOT NULL,
  `image_admin` varchar(128) NOT NULL,
  `password_admin` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `toko_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_toko`
--

INSERT INTO `admin_toko` (`admin_id`, `name_admin`, `email_admin`, `image_admin`, `password_admin`, `role_id`, `is_active`, `date_created`, `toko_id`) VALUES
(3, 'Aryo', 'dimasaryo819@gmail.com', 'default.jpg', '$2y$10$Wea62eX3V5BOQ5nVEBSm9.U998eIDQwUkKgzn1/kKsPK2URj4Tj4y', 2, 1, 1624081415, 12),
(4, 'Aldrian', 'aldrian@gmail.com', 'default.jpg', '$2y$10$gPd6QHG6iXLH2.cV2bf5pelKuj3o.uOA/3itHRqBXaxX8oB9qDw5a', 2, 1, 1624104589, 11),
(5, 'Rafif', 'rafif@gmail.com', 'default.jpg', '$2y$10$d9BWSmfO66EPKnS9G2hEPucWCNjfOykBQheQy2RJoQAUAszsmePSy', 2, 1, 1624199135, 15),
(6, 'Jono', 'jono@gmail.com', 'default.jpg', '$2y$10$yLuLtk2vGHCI5tR5RraUBeXrryuB69Y1fwMGQbFVmHjPbbK4UB4jm', 2, 1, 1627019866, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_toko`
--
ALTER TABLE `admin_toko`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_toko`
--
ALTER TABLE `admin_toko`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
