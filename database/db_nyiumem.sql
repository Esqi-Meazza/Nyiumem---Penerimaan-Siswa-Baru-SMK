-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20251013.473a0e56b5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2025 at 02:17 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nyiumem`
--

-- --------------------------------------------------------

--
-- Table structure for table `casis`
--

CREATE TABLE `casis` (
  `id_casis` int NOT NULL,
  `id_user` int NOT NULL,
  `id_jurusan` int NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `NISN` int DEFAULT NULL,
  `jenis_kelamin` enum('P','L') DEFAULT NULL,
  `jurusan` enum('RPL','TKJ','DKV','Animasi') DEFAULT NULL,
  `alamat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` enum('DITERIMA','TIDAK DITERIMA') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `casis`
--

INSERT INTO `casis` (`id_casis`, `id_user`, `id_jurusan`, `nama`, `email`, `NISN`, `jenis_kelamin`, `jurusan`, `alamat`, `no_hp`, `foto`, `status`) VALUES
(7, 13, 3, 'Muhammad Rizky', 'moci@gmail.com', 12345, 'L', 'DKV', 'Ujung Berung', '822372492462', '../assets/upload/moci.jpg', 'DITERIMA'),
(8, 14, 3, 'Albie Putra', 'albie@gmail.com', 23443645, 'L', 'DKV', 'Las Wie', '35243745', '../assets/upload/braddpit.jpeg', 'TIDAK DITERIMA'),
(9, 15, 4, 'Muhammad Daffa', 'dapa@gmail.com', 3894692, 'L', 'Animasi', 'Las Wie The Pananjung', '76529489', '../assets/upload/braddpit.jpeg', 'TIDAK DITERIMA'),
(10, 16, 3, 'Alwi Rahawian', 'wi@gmail.com', 34355353, 'L', 'DKV', 'The Laswi Van Panansea', '354453551', '../assets/upload/images.jpeg', 'DITERIMA'),
(11, 17, 1, 'Panji Arya', 'mixo@gmail.com', 21436, 'P', 'RPL', 'Cibangkong', '5523345', '../assets/upload/Screenshot 2025-05-04 115400.png', 'TIDAK DITERIMA'),
(12, 12, 2, 'Muhammmad Sultan', 'sltn@gmail.com', 2443634, 'P', 'TKJ', 'Sadang Serang', '35345325', '../assets/upload/WIN_20251021_09_33_46_Pro.jpg', 'DITERIMA');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int NOT NULL,
  `nama_jurusan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'RPL'),
(2, 'TKJ'),
(3, 'DKV'),
(4, 'Animasi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(12) DEFAULT NULL,
  `level` enum('admin','casis') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin123', 'admin'),
(3, 'Esqi Meazzanapwi', 'esqimz', 'esqimz123', 'casis'),
(12, 'Muhammad Sultan', 'Ibing', 'ibing123', 'casis'),
(13, 'Muhammad Rizky', 'Moci', 'moci123', 'casis'),
(14, 'Albie Putra', 'albie', 'albi123', 'casis'),
(15, 'Muhammad Daffa ', 'dapa', 'dapa123', 'casis'),
(16, 'Alwi Rahawian', 'alwi', 'wi123', 'casis'),
(17, 'Panji Arya', 'mixo', 'mixo123', 'casis'),
(18, 'Indra', 'indra', 'dra123', 'casis');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `casis`
--
ALTER TABLE `casis`
  ADD PRIMARY KEY (`id_casis`),
  ADD UNIQUE KEY `id_admin` (`id_user`,`id_jurusan`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `casis`
--
ALTER TABLE `casis`
  MODIFY `id_casis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
