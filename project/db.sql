-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 11:45 AM
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
(3, 'Wednesday', 3),
(4, 'Thursday', 4);

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
(1, 'Mathematics', 'Senin', 'Lusi', '10:10 - 11:30'),
(2, 'English', 'Tuesday', NULL, NULL),
(3, 'Science', 'Wednesday', NULL, NULL),
(4, 'History', 'Thursday', NULL, NULL),
(5, 'Geography', 'Friday', NULL, NULL),
(6, 'Fisika', 'Thursday', NULL, NULL),
(7, 'Fisika', 'Monday', NULL, NULL),
(10, 'Kimia', 'Monday', NULL, NULL),
(19, 'olahraga2', 'Senin', 'Jarwo', '09:00 - 10:00');

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
(2, 'Write an essay', '2023-07-12', 0, 2, 2),
(3, 'Conduct Science experiment', '2023-07-15', 0, 3, 3),
(4, 'Read History chapter', '2023-07-13', 0, 4, 4),
(5, 'Prepare Geography presentation', '2023-07-11', 0, 5, 5),
(10, 'task 1', '2023-07-04', 1, 2, 3),
(11, 'task 2', '2023-07-04', 1, 2, 3),
(12, 'task 2', '2023-07-04', 0, 2, 4),
(13, 'task 3', '2023-07-04', 1, 2, 4),
(14, 'task 1', '2023-07-04', 1, 3, 3),
(15, 'task 4', '2023-07-04', 1, 2, 3),
(16, 'task 1', '2023-07-19', 0, 1, NULL),
(17, 'task 1', '2023-07-19', 1, 1, 3),
(18, 'task 1', '2023-07-19', 0, 1, 4),
(19, 'task 1', '2023-07-19', 1, 1, 6),
(20, 'task10', '2023-07-19', 0, 1, NULL),
(21, 'task10', '2023-07-19', 0, 1, 3),
(22, 'task10', '2023-07-19', 0, 1, 4),
(23, 'task10', '2023-07-19', 0, 1, 6),
(24, 'task 1', '2023-07-05', 0, 2, NULL),
(25, 'task 1', '2023-07-05', 0, 2, 6),
(26, 'irfan', '2023-07-22', 0, 1, NULL),
(28, 'irfan', '2023-07-22', 0, 1, 4),
(29, 'irfan', '2023-07-22', 0, 1, 6),
(30, 'task 1', '2023-07-20', 0, 4, NULL),
(31, 'task 1', '2023-07-20', 0, 4, 6),
(32, 'task 1', '2023-07-20', 0, 5, NULL),
(33, 'task 1', '2023-07-20', 0, 5, 3),
(34, 'task 11', '2023-07-06', 0, 5, NULL),
(36, 'task 11', '2023-07-06', 0, 5, 4),
(37, 'task 11', '2023-07-06', 0, 5, 6);

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
(10, 'admin1', 'admin1', 'admin');

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
  MODIFY `id_jadwal_piket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mata_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_tasks` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_piket`
--
ALTER TABLE `jadwal_piket`
  ADD CONSTRAINT `jadwal_piket_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`id_mata_pelajaran`) REFERENCES `mata_pelajaran` (`id_mata_pelajaran`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
