-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2021 at 10:46 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_disposisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `adum`
--

CREATE TABLE `adum` (
  `id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `no_agenda` int(11) NOT NULL,
  `no_surat` int(11) NOT NULL,
  `jenis_surat` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `dokumen` text DEFAULT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `claim`
--

CREATE TABLE `claim` (
  `id_claim` int(11) NOT NULL,
  `claim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `kode_surat` varchar(50) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_kirim` date NOT NULL,
  `klaim` varchar(100) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `catatan` text NOT NULL,
  `dokumen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `no_agenda` varchar(100) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_entry` date NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `nama_peserta` varchar(50) NOT NULL,
  `nrp` varchar(100) NOT NULL,
  `no_ktpa` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_tlp` int(50) NOT NULL,
  `jenis_klaim` varchar(100) NOT NULL,
  `catatan` text NOT NULL,
  `dokumen` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'user', 'user@gmail.com', '579646aad11fae4dd295812fb4526245', '1'),
(2, 'admin', 'admin@admin.com', '25d55ad283aa400af464c76d713c07ad', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adum`
--
ALTER TABLE `adum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_surat` (`jenis_surat`);

--
-- Indexes for table `claim`
--
ALTER TABLE `claim`
  ADD PRIMARY KEY (`id_claim`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_klaim` (`jenis_klaim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adum`
--
ALTER TABLE `adum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `claim`
--
ALTER TABLE `claim`
  MODIFY `id_claim` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
