-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 06:27 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `class`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_piket`
--

CREATE TABLE `jadwal_piket` (
  `id_jadwal_piket` int(11) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_piket`
--

INSERT INTO `jadwal_piket` (`id_jadwal_piket`, `hari`, `id_user`) VALUES
(94, 'Senin', 3),
(95, 'Selasa', 4),
(97, 'Kamis', 6),
(103, 'Jumat', 17),
(105, 'Selasa', 18),
(106, 'Rabu', 3),
(107, 'Kamis', 4),
(108, 'Jumat', 17),
(109, 'Senin', 18),
(112, 'Kamis', 6);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mata_pelajaran` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `guru` varchar(250) DEFAULT NULL,
  `waktu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mata_pelajaran`, `nama`, `hari`, `guru`, `waktu`) VALUES
(22, 'Matematika', 'Senin', 'Budi', '08:00 - 10:00'),
(23, 'Bahasa Indonesia', 'Selasa', 'Ani', '10:30 - 12:30'),
(24, 'IPA', 'Rabu', 'Rudi', '13:00 - 15:00'),
(25, 'Bahasa Inggris', 'Kamis', 'Dewi', '08:30 - 10:30'),
(26, 'Sejarah', 'Jumat', 'Eko', '11:00 - 13:00'),
(27, 'Seni Budaya', 'Senin', 'Ira', '10:00 - 12:00'),
(28, 'Olahraga', 'Selasa', 'Fauzi', '14:00 - 16:00'),
(29, 'Ekonomi', 'Rabu', 'Gita', '09:00 - 11:00'),
(30, 'Geografi', 'Kamis', 'Hadi', '12:00 - 14:00'),
(31, 'Sosiologi', 'Jumat', 'Ina', '13:30 - 15:30'),
(32, 'Fisika', 'Senin', 'Joko', '08:00 - 10:00'),
(33, 'Kimia', 'Selasa', 'Kiki', '10:30 - 12:30'),
(34, 'Biologi', 'Rabu', 'Lina', '13:00 - 15:00'),
(35, 'TIK', 'Kamis', 'Mila', '08:30 - 10:30'),
(36, 'Ekonomi Kreatif', 'Jumat', 'Nina', '11:00 - 13:00'),
(37, 'Bimbingan Konseling', 'Senin', 'Oki', '10:00 - 12:00'),
(38, 'Astronomi', 'Selasa', 'Putra', '14:00 - 16:00'),
(39, 'Pendidikan Agama', 'Rabu', 'Rina', '09:00 - 11:00'),
(40, 'Akuntansi', 'Kamis', 'Susi', '12:00 - 14:00'),
(41, 'Kewirausahaan', 'Jumat', 'Toni', '13:30 - 15:30');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id_tasks` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `completed` tinyint(1) DEFAULT 0,
  `id_mata_pelajaran` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id_tasks`, `name`, `deadline`, `completed`, `id_mata_pelajaran`, `id_user`) VALUES
(128, 'Tugas Matematika', '2023-07-30', 0, 22, 3),
(129, 'Tugas Bahasa Indonesia', '2023-07-31', 0, 23, 3),
(130, 'Tugas IPA', '2023-08-01', 0, 24, 3),
(131, 'Tugas Bahasa Inggris', '2023-08-02', 0, 25, 3),
(132, 'Tugas Sejarah', '2023-08-03', 0, 26, 3),
(133, 'Tugas Seni Budaya', '2023-08-04', 0, 27, 4),
(134, 'Tugas Olahraga', '2023-08-05', 0, 28, 4),
(135, 'Tugas Ekonomi', '2023-08-06', 0, 29, 4),
(136, 'Tugas Geografi', '2023-08-07', 0, 30, 4),
(137, 'Tugas Sosiologi', '2023-08-08', 0, 31, 4),
(138, 'Tugas Fisika', '2023-08-09', 0, 32, 6),
(139, 'Tugas Kimia', '2023-08-10', 0, 33, 6),
(140, 'Tugas Biologi', '2023-08-11', 0, 34, 6),
(141, 'Tugas TIK', '2023-08-12', 0, 35, 6),
(142, 'Tugas Ekonomi Kreatif', '2023-08-13', 0, 36, 6),
(143, 'Tugas Bimbingan Konseling', '2023-08-14', 0, 37, 17),
(144, 'Tugas Astronomi', '2023-08-15', 0, 38, 17),
(145, 'Tugas Pendidikan Agama', '2023-08-16', 0, 39, 17),
(146, 'Tugas Akuntansi', '2023-08-17', 0, 40, 17),
(147, 'Tugas Kewirausahaan', '2023-08-18', 0, 41, 17);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` enum('member','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `status`) VALUES
(2, 'admin', 'admin', 'admin'),
(3, 'emma', 'password789', 'member'),
(4, 'alex', 'pass123word', 'member'),
(5, 'sarah', 'pass456word', 'admin'),
(6, 'member1', 'member1', 'member'),
(7, 'admin', 'admin123', 'admin'),
(8, 'admin3', 'admin3', 'admin'),
(10, 'admin1', 'admin1', 'admin'),
(17, 'irfan', 'irfan123456', 'member'),
(18, 'member', '123456789', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal_piket`
--
ALTER TABLE `jadwal_piket`
  ADD PRIMARY KEY (`id_jadwal_piket`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mata_pelajaran`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_tasks`),
  ADD KEY `id_mata_pelajaran` (`id_mata_pelajaran`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_piket`
--
ALTER TABLE `jadwal_piket`
  MODIFY `id_jadwal_piket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mata_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_tasks` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
