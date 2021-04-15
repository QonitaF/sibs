-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 15, 2021 at 08:25 PM
-- Server version: 5.7.24-log
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `id_about` int(11) NOT NULL,
  `nama_about` varchar(256) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id_about`, `nama_about`, `keterangan`, `gambar`) VALUES
(1, 'SISTEM INFORMASI BANK SAMPAH ENVIRO\'18', 'Bank Sampah Enviro\'18 adalah salah satu program yang dijalankan oleh mahasiswa teknik lingkungan yang merupakan suatu badan usaha yang bergerak pada bidang sosial yang melakukan pengelolaan dan pemanfaatan sampah dengan tujuan untuk memelihara kelestarian lingkungan .....', 'asa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_sampah`
--

CREATE TABLE `tbl_jenis_sampah` (
  `id_jenis_sampah` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `nama_jenis_sampah` varchar(128) NOT NULL,
  `time_create_jenis_sampah` datetime NOT NULL,
  `time_update_jenis_sampah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_sampah`
--

INSERT INTO `tbl_jenis_sampah` (`id_jenis_sampah`, `id_users`, `nama_jenis_sampah`, `time_create_jenis_sampah`, `time_update_jenis_sampah`) VALUES
(1, 1, 'Organik', '2020-11-04 18:10:42', '2020-11-04 18:10:42'),
(2, 1, 'Industri', '2020-11-04 18:10:42', '2020-11-04 18:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_katalog`
--

CREATE TABLE `tbl_katalog` (
  `id_katalog` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `nama_katalog` varchar(256) NOT NULL,
  `id_jenis_katalog_sampah` int(11) NOT NULL,
  `satuan_katalog` varchar(128) NOT NULL,
  `harga_katalog` float NOT NULL,
  `gambar_katalog` varchar(256) NOT NULL,
  `keterangan_katalog` varchar(256) NOT NULL,
  `time_create_katalog` datetime NOT NULL,
  `time_update_katalog` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_katalog`
--

INSERT INTO `tbl_katalog` (`id_katalog`, `id_users`, `nama_katalog`, `id_jenis_katalog_sampah`, `satuan_katalog`, `harga_katalog`, `gambar_katalog`, `keterangan_katalog`, `time_create_katalog`, `time_update_katalog`) VALUES
(12, 1, 'Aqua Botol Bersih', 1, 'Kg', 2000, 'WFqv8k7cfP.jpg', 'Bersih', '2021-01-09 04:42:22', '2021-01-09 04:44:44'),
(13, 1, 'Aqua Botol Kotor', 1, 'Kg', 1500, 'akua_kotor.jpg', 'Kotor', '2021-01-09 04:45:43', '2021-01-09 04:45:43'),
(14, 1, 'Plastik', 1, 'Kg', 800, 'plastik.jpg', 'Plastik', '2021-01-09 04:46:29', '2021-01-25 11:50:26'),
(15, 1, 'Atum Campur', 1, 'Kg', 1500, 'atum.png', 'Campur', '2021-01-09 04:47:14', '2021-01-09 04:47:14'),
(16, 1, 'Oli', 1, 'Kg', 2000, 'oli.jpg', 'Oli', '2021-01-09 04:47:47', '2021-01-09 04:47:47'),
(17, 1, 'Dus Tebal', 1, 'Kg', 1300, 'dus_tebal.jpg', 'Tebal', '2021-01-09 04:48:35', '2021-01-09 04:48:35'),
(18, 1, 'Dus Tipis', 1, 'Kg', 1000, 'dus_tipis.jpg', 'Tipis', '2021-01-09 04:49:15', '2021-01-09 04:49:15'),
(19, 1, 'Duplex', 1, 'Kg', 300, 'duplex.jpg', 'Kardus kotak makanan', '2021-01-09 04:51:41', '2021-01-09 04:51:41'),
(20, 1, 'Kertas Buram', 1, 'Kg', 1000, 'kertas_buram.jpg', 'buku LKS dll', '2021-01-09 04:53:01', '2021-01-09 04:53:01'),
(21, 1, 'Kertas HVs', 1, 'Kg', 1300, 'hvs.jpg', 'halaman buku cetak, buku tulis dll', '2021-01-09 04:54:03', '2021-01-09 04:54:03'),
(22, 1, 'Kaleng', 1, 'Kg', 800, 'kaleng.jpg', 'kaleng minuman dll', '2021-01-09 04:56:28', '2021-01-09 04:56:28'),
(23, 1, 'Seng', 1, 'Kg', 700, 'seng.jpg', 'seng', '2021-01-09 04:58:03', '2021-01-09 04:58:03'),
(24, 1, 'Tutup Botol', 1, 'Kg', 700, 'tutup_botol.jpg', 'tutup botol', '2021-01-09 04:59:48', '2021-01-09 04:59:48'),
(25, 1, 'Aluminium', 1, 'Kg', 7000, 'aluminium.jpg', 'panci, wajan, dll', '2021-01-09 05:02:17', '2021-01-09 05:02:17'),
(26, 1, 'Besi', 1, 'Kg', 2700, 'besi.jpg', 'besi', '2021-01-09 05:03:04', '2021-01-09 05:03:04'),
(28, 1, 'Aqua Gelas Kotor', 1, 'Kg', 2500, 'aqua_gelas_kotor.jpeg', 'Kotor', '2021-01-09 05:05:44', '2021-01-09 05:05:44'),
(29, 1, 'Botol Sirup ABC', 1, 'pcs', 200, 'botol_sirup_abc.jpg', 'botol kaca', '2021-01-09 05:07:14', '2021-01-09 09:34:09'),
(30, 1, 'Botol Anggur', 1, 'pcs', 200, 'botol_anggur.jpg', 'kaca', '2021-01-09 05:08:02', '2021-01-09 09:33:19'),
(31, 1, 'Botol Kecap ', 1, 'pcs', 200, 'botol_kecap.jpg', 'kaca', '2021-01-09 05:09:24', '2021-01-09 09:32:53'),
(32, 1, 'Aqua Gelas Bersih', 1, 'Kg', 3000, 'Harga-Gelas-Plastik-Bekas.jpg', 'bersih', '2021-01-09 09:46:30', '2021-01-09 09:48:29'),
(33, 1, 'Aqua botol bersih', 1, 'Kg', 2000, '', 'bersih', '2021-01-25 12:05:57', '2021-01-25 12:05:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_katalog` int(11) NOT NULL,
  `berat_penjualan` varchar(128) NOT NULL,
  `harga_penjualan` varchar(255) NOT NULL,
  `total_penjualan` varchar(128) NOT NULL,
  `time_create_penjualan` datetime NOT NULL,
  `time_update_penjualan` datetime NOT NULL,
  `bulan` varchar(70) DEFAULT NULL,
  `tahun` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`id_penjualan`, `id_users`, `id_katalog`, `berat_penjualan`, `harga_penjualan`, `total_penjualan`, `time_create_penjualan`, `time_update_penjualan`, `bulan`, `tahun`) VALUES
(17, 7, 2, '12', '100000', '1200000', '2020-11-06 16:27:00', '0000-00-00 00:00:00', NULL, NULL),
(23, 13, 4, '2', '2000', '4000', '2020-11-01 19:00:00', '0000-00-00 00:00:00', NULL, NULL),
(24, 13, 2, '10', '100000', '1000000', '2020-11-01 19:02:00', '0000-00-00 00:00:00', NULL, NULL),
(30, 13, 4, '1', '2000', '7000', '2020-12-17 09:31:09', '0000-00-00 00:00:00', NULL, NULL),
(38, 14, 12, '2', '2000', '4000', '2021-01-27 06:49:11', '0000-00-00 00:00:00', '01', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_users` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` enum('admin','nasabah','ketua') NOT NULL,
  `time_login_users` datetime NOT NULL,
  `time_logout_users` datetime NOT NULL,
  `rt_users` varchar(128) NOT NULL,
  `rw_users` varchar(128) NOT NULL,
  `alamat_users` varchar(128) NOT NULL,
  `telepon_users` varchar(128) NOT NULL,
  `gambar_users` varchar(128) NOT NULL,
  `time_create_users` datetime NOT NULL,
  `time_update_users` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_users`, `name`, `email`, `password`, `level`, `time_login_users`, `time_logout_users`, `rt_users`, `rw_users`, `alamat_users`, `telepon_users`, `gambar_users`, `time_create_users`, `time_update_users`) VALUES
(1, 'ADMIN', 'admin', '$2y$10$IQiVAcLK7AENrQb1137yB.Vu6D7KRw6LCsBv93VQbzAaCmua6MH6i', 'admin', '2021-04-05 10:57:56', '2021-04-05 10:58:22', '2', '1', 'Jl. Jambu Batu', '12', 'profile-3-1_3e702c5b.png', '2020-11-04 10:02:20', '0000-00-00 00:00:00'),
(3, 'Ketua', 'ketua.nita@gmail.com', '$2y$10$aVT..oQ8nl1rd/H4VyOT7OTVz7p.d8Atr5JYT6JCNlDRAIjk1nJx6', 'ketua', '2021-01-25 12:47:46', '2021-01-09 16:10:34', '3', '4', 'Jl. mancasan Kidul', '08523487728', 'admin1.png', '2020-11-04 18:24:41', '0000-00-00 00:00:00'),
(7, 'khoironi', 'khoironi@gmail.com', '', 'nasabah', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2', '', 'Jl. Jambu Batu', '085123817434', '', '2020-11-07 07:43:23', '0000-00-00 00:00:00'),
(13, 'Ani', 'ani@gmail.com', '', 'nasabah', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3', '', 'Jl. Sutomo No.1 Cilacap', '081234567890', '', '2021-01-25 11:50:56', '0000-00-00 00:00:00'),
(14, 'arka din samana', 'arka@gmail.com', '$2y$10$GiDXyGAjMjyiT7UgPwkHg.7TzZ5anrK.ixTkXLIElyP48jAc77E4G', 'nasabah', '2021-01-27 18:53:03', '2021-01-27 18:48:26', '2', '4', 'Jl. Jambu Batu e', '08512323434', 'admin2.png', '2021-01-25 11:27:32', '0000-00-00 00:00:00'),
(15, 'risik ibad', 'risik@gmail.com', '$2y$10$ExXiRBtmDW2qcR461KYGE.G/rqKjCX3dbnLuLSGM1jlo/q3186c22', 'nasabah', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12', '', 'Jl. Jambu Batu', '08122387434', '', '2020-11-06 22:14:06', '0000-00-00 00:00:00'),
(16, 'Santa Syahrani', 'Santaputri@gmail.com', '$2y$10$uM.FKkfRE.ezfEs53P0tne5yxSzDUUZQsz7ZVAKZ7VKbt2X1/I/B6', 'nasabah', '2021-04-05 10:59:06', '2021-01-27 18:43:38', '2', '', 'Jl. Gunapati, Maos', '081327890123', '', '2020-12-30 23:39:30', '0000-00-00 00:00:00'),
(17, 'Anisa Indah Pratiwi', 'anisa', '$2y$10$F7opXUi9BtRBRZePu26.8eDAqfPgkSZTS/4qscbVH0IlAowOr4DxS', 'nasabah', '2021-01-25 11:58:33', '2021-01-25 11:59:44', '4', '3', 'Jl. Masjid, Kalisabuk', '081327249523', '', '2021-01-25 11:53:30', '0000-00-00 00:00:00'),
(18, 'Aulia Nur Alifah', 'aulianuralifah@gmail.com', '$2y$10$VXbaQtM4wg.gjIwUO7unEOv5swkrcCv.IMjvYQz3IBBJJ/fx7p8u2', 'nasabah', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', 'Jl. Ismoyo Baru', '08987654321', '', '2021-01-25 12:38:12', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `tbl_jenis_sampah`
--
ALTER TABLE `tbl_jenis_sampah`
  ADD PRIMARY KEY (`id_jenis_sampah`);

--
-- Indexes for table `tbl_katalog`
--
ALTER TABLE `tbl_katalog`
  ADD PRIMARY KEY (`id_katalog`);

--
-- Indexes for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_jenis_sampah`
--
ALTER TABLE `tbl_jenis_sampah`
  MODIFY `id_jenis_sampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_katalog`
--
ALTER TABLE `tbl_katalog`
  MODIFY `id_katalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
