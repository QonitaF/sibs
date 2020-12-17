-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 09 Nov 2020 pada 09.16
-- Versi server: 10.3.24-MariaDB-log-cll-lve
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khoiron1_sibs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_about`
--

CREATE TABLE `tbl_about` (
  `id_about` int(11) NOT NULL,
  `nama_about` varchar(256) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_about`
--

INSERT INTO `tbl_about` (`id_about`, `nama_about`, `keterangan`, `gambar`) VALUES
(1, 'SISTEM INFORMASI BANK SAMPAH SE 18', 'Bank Sampah adalah sebuah', 'asa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis_sampah`
--

CREATE TABLE `tbl_jenis_sampah` (
  `id_jenis_sampah` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `nama_jenis_sampah` varchar(128) NOT NULL,
  `time_create_jenis_sampah` datetime NOT NULL,
  `time_update_jenis_sampah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jenis_sampah`
--

INSERT INTO `tbl_jenis_sampah` (`id_jenis_sampah`, `id_users`, `nama_jenis_sampah`, `time_create_jenis_sampah`, `time_update_jenis_sampah`) VALUES
(1, 1, 'Organik', '2020-11-04 18:10:42', '2020-11-04 18:10:42'),
(2, 1, 'Industri', '2020-11-04 18:10:42', '2020-11-04 18:10:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_katalog`
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
-- Dumping data untuk tabel `tbl_katalog`
--

INSERT INTO `tbl_katalog` (`id_katalog`, `id_users`, `nama_katalog`, `id_jenis_katalog_sampah`, `satuan_katalog`, `harga_katalog`, `gambar_katalog`, `keterangan_katalog`, `time_create_katalog`, `time_update_katalog`) VALUES
(1, 1, 'Botol Minum Plastik', 1, 'kg', 1500000, 'botol.jpg', 'bersih mantab', '2020-11-04 18:13:30', '2020-11-06 01:02:11'),
(2, 1, 'Tong Besi', 2, 'kg', 100000, 'Steel-Drums_45.jpg', 'Tong bekas Berkualitas', '2020-11-05 05:01:08', '2020-11-05 05:01:08'),
(4, 1, 'Kertas', 1, 'kg', 2000, 'LUTUNG.jpg', 'Buku', '2020-11-06 06:53:38', '2020-11-06 06:53:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_katalog` int(11) NOT NULL,
  `berat_penjualan` varchar(128) NOT NULL,
  `harga_penjualan` varchar(255) NOT NULL,
  `total_penjualan` varchar(128) NOT NULL,
  `time_create_penjualan` datetime NOT NULL,
  `time_update_penjualan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`id_penjualan`, `id_users`, `id_katalog`, `berat_penjualan`, `harga_penjualan`, `total_penjualan`, `time_create_penjualan`, `time_update_penjualan`) VALUES
(17, 7, 2, '12', '100000', '1200000', '2020-11-06 16:27:00', '0000-00-00 00:00:00'),
(23, 13, 4, '2', '2000', '4000', '2020-11-01 19:00:00', '0000-00-00 00:00:00'),
(24, 13, 2, '10', '100000', '1000000', '2020-11-01 19:02:00', '0000-00-00 00:00:00'),
(25, 14, 4, '78', '2000', '156000', '2020-11-06 21:25:00', '0000-00-00 00:00:00'),
(26, 14, 1, '56', '1500000', '84000000', '2020-10-30 21:25:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
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
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id_users`, `name`, `email`, `password`, `level`, `time_login_users`, `time_logout_users`, `rt_users`, `rw_users`, `alamat_users`, `telepon_users`, `gambar_users`, `time_create_users`, `time_update_users`) VALUES
(1, 'Nita', 'nita@gmail.com', '$2y$10$IQiVAcLK7AENrQb1137yB.Vu6D7KRw6LCsBv93VQbzAaCmua6MH6i', 'admin', '2020-11-08 08:39:45', '2020-11-07 16:49:00', '2', '1', 'Jl. Jambu Batu', '12', 'admin.png', '2020-11-04 10:02:20', '0000-00-00 00:00:00'),
(3, 'Ketua', 'ketua.nita@gmail.com', '$2y$10$aVT..oQ8nl1rd/H4VyOT7OTVz7p.d8Atr5JYT6JCNlDRAIjk1nJx6', 'ketua', '2020-11-06 22:40:30', '2020-11-06 22:47:15', '3', '4', 'Jl. mancasan Kidul', '08523487728', 'admin1.png', '2020-11-04 18:24:41', '0000-00-00 00:00:00'),
(7, 'khoironi', 'khoironi@gmail.com', '', 'nasabah', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2', '', 'Jl. Jambu Batu', '085123817434', '', '2020-11-07 07:43:23', '0000-00-00 00:00:00'),
(13, 'Ani', 'ani@gmail.com', '', 'nasabah', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3', '', 'Jl. Sutomo No.1 Cilacap', '081234567890', '', '2020-11-07 07:43:00', '0000-00-00 00:00:00'),
(14, 'arka din samana', 'arka@gmail.com', '$2y$10$GiDXyGAjMjyiT7UgPwkHg.7TzZ5anrK.ixTkXLIElyP48jAc77E4G', 'nasabah', '2020-11-07 16:44:53', '2020-11-07 16:45:54', '12', '4', 'Jl. Jambu Batu e', '08512323434', 'admin2.png', '2020-11-06 21:23:56', '0000-00-00 00:00:00'),
(15, 'risik ibad', 'risik@gmail.com', '$2y$10$ExXiRBtmDW2qcR461KYGE.G/rqKjCX3dbnLuLSGM1jlo/q3186c22', 'nasabah', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12', '', 'Jl. Jambu Batu', '08122387434', '', '2020-11-06 22:14:06', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indeks untuk tabel `tbl_jenis_sampah`
--
ALTER TABLE `tbl_jenis_sampah`
  ADD PRIMARY KEY (`id_jenis_sampah`);

--
-- Indeks untuk tabel `tbl_katalog`
--
ALTER TABLE `tbl_katalog`
  ADD PRIMARY KEY (`id_katalog`);

--
-- Indeks untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_jenis_sampah`
--
ALTER TABLE `tbl_jenis_sampah`
  MODIFY `id_jenis_sampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_katalog`
--
ALTER TABLE `tbl_katalog`
  MODIFY `id_katalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
