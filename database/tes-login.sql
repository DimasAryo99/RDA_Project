-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 06:38 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

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
(5, 'Rafif', 'rafif@gmail.com', 'default.jpg', '$2y$10$d9BWSmfO66EPKnS9G2hEPucWCNjfOykBQheQy2RJoQAUAszsmePSy', 2, 1, 1624199135, 15);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama_kategori`, `url`) VALUES
(9, 'Laptop', 'produk/laptop'),
(10, 'Handphone', 'produk/handphone'),
(11, 'Earphone', 'produk/earphone');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `jumlah` int(128) NOT NULL,
  `toko_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `kurir_id` int(11) NOT NULL,
  `nama_kurir` varchar(128) NOT NULL,
  `layanan_kurir` varchar(128) NOT NULL,
  `ongkos_kurir` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`kurir_id`, `nama_kurir`, `layanan_kurir`, `ongkos_kurir`) VALUES
(2, 'SiCepat', 'Reguler', 9000),
(3, 'JNE', 'Reguler', 9000);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `username`, `password`, `role_id`, `image`, `email`) VALUES
(2, 'tes123', 'dimas', '1234', 3, 'default.jpg', 'tes123@mail.com'),
(3, 'Dimas', 'Dimas', '1234', 3, 'default.jpg', 'dimasaryo819@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(128) NOT NULL,
  `ket_produk` varchar(128) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `gambar_produk` varchar(128) NOT NULL,
  `toko_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `ket_produk`, `harga_produk`, `stok_produk`, `gambar_produk`, `toko_id`, `kategori_id`) VALUES
(1, 'iPhone 12 Mini', 'Produk terbaru keluaran Apple', 10999999, 4, 'apple_apple_iphone_12_mini_-64gb-_garansi_resmi_ibox_full01_o1f4z5t5.jpg', 11, 10),
(5, 'Iphone 12 Pro', 'Merupakan produk flagship terbaru dari apple', 21500000, 2, 'Hp2.jpeg', 15, 10),
(6, 'Google Pixel 3', 'Merupakan handphone flagship keluaran dari google ', 6500000, 10, 'Hp1.jpeg', 12, 10),
(7, 'Airpods 3', 'Merupakan produk keluaran terbaru dari apple', 2000000, 10, 'Earphone1.jpeg', 15, 11),
(8, 'Pixel Buds', 'Keluaran Earphone terbaru dari google', 1000000, 10, 'Earphone2.jpg', 12, 11),
(18, 'Asus Zenbook Pro', 'Merupakan keluaran laptop asus terbaru', 15000000, 4, 'Laptop1.jpeg', 11, 9),
(21, 'Earphone Philips Muraahh!', 'Earphone Philips super bass', 15000, 6, 'a1a9210e6da205666a12fc3f44e75ade.jpg', 11, 11),
(23, 'Asus TUF Gaming', 'Laptop keluaran Asus cocok untuk gaming dengan spesifikasi gahar', 12500000, 3, '5fbdd0cac23ef.jpg', 11, 9),
(24, 'Xiaomi Redmi Note 10', 'Handphone Xiaomi dengan harga murah sudah mendapatkan layar Super AMOLED', 2500000, 6, 'xiaomi_xiaomi_redmi_note_10_pro_smartphone_-8gb-128gb-_full15_koweda3o.jpg', 11, 10),
(27, 'Asus ROG Strix', 'Laptop khusus gaming dari Asus. Asus terkenal dengan durabilitynya mampu bersaing dengan laptop lain', 13000000, 5, '64681733_ac210967-8deb-440a-ae6f-93acd5665fca_721_721.jpg', 11, 9),
(28, 'Lenovo Legion', 'Laptop keluaran Lenovo cocok untuk anda grafis desainer dan suka bermain game', 10000000, 4, 'maxresdefault.jpg', 11, 9),
(30, 'Poco X3 NFC', 'Handphone Poco yang sudah memiliki fitur NFC di dalamnya', 3500000, 6, 'xiaomi_xiaomi_poco_x3_nfc_8-128_full01_ra1d262c.jpg', 11, 0),
(32, 'Asus VivoBook A516JA', 'Memiliki prosesor Intel Core i3 generasi terbaru dan RAM sebesar 4GB. Cocok untuk kebutuhan office', 7500000, 6, 'asus_asus_laptop_vivobook_a516ja_i3-1005g1_4gb_1tb-256gb_w10-ohs_full01_jlb816n7.jpg', 15, 9),
(33, 'Macbook Air M1', 'Macbook keluaran terbaru dengan inovasi prosesor yang lebih baik dari sebelumnya', 15999000, 7, 'macbook_air_m1_gold_1.jpg', 15, 9),
(34, 'iPhone 11 Pro Max 256GB', 'Sistem tiga kamera transformatif yang menambahkan kemampuan luar biasa tanpa kerumitan. Lompatan tak tertandingi dalam hal kekua', 19999999, 7, 'apple_iphone_11_pro_max_midnight_green_1_6_1.jpg', 15, 10),
(35, 'Xiaomi Redmi Note 9 Pro', 'Best seller product 2019', 3100000, 6, 'xiaomi_redmi_note_9_pro_aurora_blue_1.jpg', 15, 10),
(36, 'Poco M3 4/64', 'Handphone entry level yang dapat menyaingi handphone flagship lain', 1999999, 4, 'xiaomi_xiaomi_poco_m3_6-128_full01_oa4fg20s.jpg', 15, 10),
(37, 'Redmi Airdots 2 TWS Bluetooth Earphone', 'Xiaomi Mi AirDots generasi kedua ini merupakan Bluetooth 5.0 earphone memiliki bentuk mirip seperti Apple Airpods dengan tambaha', 250000, 7, 'xiaomi-redmi-airdots-2-tws-bluetooth-earphone-black-1.jpg', 15, 11),
(39, 'AirPods Gen 2 With Charging Case', 'AirPods terbaru keluaran Apple', 2299999, 5, 'd49af97f-2243-416c-b843-0c6f58862888.jpg', 15, 11),
(42, 'Google Pixel 6 Pro', 'Hp flagship besutan google keluaran 2021', 10000000, 3, 'csm_E1hyFy6WQAEpJPV_ab27e1db46.jpg', 12, 10),
(43, 'TWS Haylou GT3', 'Earphone bluetooth keluaran Xiaomi ini cocok untu bermain game, mendengarkan musik, dan menonton film', 300000, 5, 'Ha35502c113034e3c8bfd6b38f4acbf69M.jpg', 12, 11);

-- --------------------------------------------------------

--
-- Table structure for table `status_invoice`
--

CREATE TABLE `status_invoice` (
  `id_statusinv` int(3) NOT NULL,
  `nama_status` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_invoice`
--

INSERT INTO `status_invoice` (`id_statusinv`, `nama_status`, `role_id`) VALUES
(1, 'Diproses', 1),
(2, 'Terkirim', 2),
(3, 'Sampai', 3);

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
(23, 'asdas', 'asdasd', 'asdas', '2021-06-09 11:32:44', '2021-06-09 13:32:44', 'selesai', '', 2, 3, 'BNI-234234324324');

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
(20, 23, 5, 4);

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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'dimas', 'dimas.aryo@if.uai.ac.id', 'default.jpg', '$2y$10$8kGozI7cVaoab3E96hlupuizUMnoQvVUismdVeqZJzOV9R1jyRfcO', 1, 1, 1622710133);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `accessmenu_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`accessmenu_id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `menu_id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`menu_id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'member'),
(3, 'pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `submenu_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `tittle` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`submenu_id`, `menu_id`, `tittle`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'Superadmin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Dashboard', 'Admintoko', 'fas fa-fw fa-tachometer-alt', 1),
(3, 1, 'Toko', 'Superadmin/toko', 'fas fa-fw fa-store', 1),
(4, 1, 'Kategori', 'Superadmin/listkategori', 'fas fa-fw fa-tag', 1),
(5, 1, 'Kurir', 'Superadmin/kurir', 'fas fa-fw fa-shipping-fast', 1),
(6, 2, 'Produk', 'Admintoko/produk', 'fas fa-fw fa-gifts', 1),
(7, 1, 'Invoice', 'Superadmin/tampil_invoice', 'fas fa-envelope-open-text', 1),
(8, 1, 'Laporan', 'Superadmin/laporan', 'fas fa-book', 1),
(9, 2, 'Invoice', 'Admintoko/tampil_invoice', 'fas fa-envelope-open-text', 1),
(10, 2, 'Laporan ', 'Admintoko/laporan', 'fas fa-book', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_toko`
--
ALTER TABLE `admin_toko`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`kurir_id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `status_invoice`
--
ALTER TABLE `status_invoice`
  ADD PRIMARY KEY (`id_statusinv`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`toko_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`accessmenu_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`submenu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_toko`
--
ALTER TABLE `admin_toko`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `kurir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `status_invoice`
--
ALTER TABLE `status_invoice`
  MODIFY `id_statusinv` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id_invoice` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
