-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2023 at 04:48 AM
-- Server version: 8.0.34-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum_pengajar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar_pelajar`
--

CREATE TABLE `tb_daftar_pelajar` (
  `id_pelajar` int NOT NULL,
  `nama_pelajar` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `status_pembayaran` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kode_program` varchar(4) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_daftar_pelajar`
--

INSERT INTO `tb_daftar_pelajar` (`id_pelajar`, `nama_pelajar`, `status_pembayaran`, `kode_program`) VALUES
(4, 'Alex', 'Lunas', 'SD1R'),
(5, 'Xandria', 'Lunas', 'SD1R'),
(6, 'Nadya', 'Belum Lunas', 'SD4S'),
(7, 'Christina', 'Belum Lunas', 'SMPR'),
(15, 'Nugraha', 'Lunas', 'SD1R'),
(16, 'Nugroho', 'Belum Lunas', 'SD1R'),
(17, 'Nugrihi', 'Belum Lunas', 'SD1S'),
(18, 'Nugruhu', 'Lunas', 'SD1S'),
(20, 'Syaiton', 'Lunas', 'SD1R'),
(22, 'Anie', 'Belum Lunas', 'SD4S'),
(23, 'Julius', 'Lunas', 'SMAR'),
(24, 'Gerry', 'Lunas', 'SMAS'),
(25, 'Fina', 'Lunas', 'SMAR'),
(26, 'Anna', 'Lunas', 'SMPS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar_pengajar`
--

CREATE TABLE `tb_daftar_pengajar` (
  `id_pengajar` int NOT NULL,
  `nama_pengajar` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telepon` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `foto_pengajar` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_daftar_pengajar`
--

INSERT INTO `tb_daftar_pengajar` (`id_pengajar`, `nama_pengajar`, `no_telepon`, `foto_pengajar`) VALUES
(1, 'Adhimas Yanto Timur', '081222333889', NULL),
(13, 'Muhammad Zein Maulana Akbar', '081222333444', NULL),
(14, 'Muhammad Ariq Hammadi', '081222333445', NULL),
(15, 'Ahnaf Muzaki Yulianto', '081222333489', NULL),
(19, 'Devin Arjuna Christyantino', '081888999888', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar_program`
--

CREATE TABLE `tb_daftar_program` (
  `kode_program` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  `jenjang_program` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_program` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `biaya` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_daftar_program`
--

INSERT INTO `tb_daftar_program` (`kode_program`, `jenjang_program`, `jenis_program`, `biaya`) VALUES
('SD1R', 'SD Kelas 1,2,3', 'Reguler', 500000),
('SD1S', 'SD Kelas 1,2,3', 'Intensif', 750000),
('SD4R', 'SD Kelas 4,5,6', 'Reguler', 1000000),
('SD4S', 'SD Kelas 4,5,6', 'Intensif', 1250000),
('SMAR', 'SMA Kelas 10,11,12', 'Reguler', 2500000),
('SMAS', 'SMA Kelas 10,11,12', 'Intensif', 5000000),
('SMPR', 'SMP Kelas 7,8,9', 'Reguler', 1500000),
('SMPS', 'SMP Kelas 7,8,9', 'Intensif', 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `nama`, `password`) VALUES
(1, 'admin00', 'admin00', 'a5a30bc4c47888cd59c4e9df68d80242'),
(2, 'admin01', 'admin01', '18c6d818ae35a3e8279b5330eda01498');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_daftar_pelajar`
--
ALTER TABLE `tb_daftar_pelajar`
  ADD PRIMARY KEY (`id_pelajar`),
  ADD KEY `kode_program` (`kode_program`);

--
-- Indexes for table `tb_daftar_pengajar`
--
ALTER TABLE `tb_daftar_pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indexes for table `tb_daftar_program`
--
ALTER TABLE `tb_daftar_program`
  ADD PRIMARY KEY (`kode_program`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_daftar_pelajar`
--
ALTER TABLE `tb_daftar_pelajar`
  MODIFY `id_pelajar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_daftar_pengajar`
--
ALTER TABLE `tb_daftar_pengajar`
  MODIFY `id_pengajar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_daftar_pelajar`
--
ALTER TABLE `tb_daftar_pelajar`
  ADD CONSTRAINT `tb_daftar_pelajar_ibfk_1` FOREIGN KEY (`kode_program`) REFERENCES `tb_daftar_program` (`kode_program`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
