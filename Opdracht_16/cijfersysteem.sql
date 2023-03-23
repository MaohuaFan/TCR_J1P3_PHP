-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 09:30 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cijfersysteem`
--

-- --------------------------------------------------------

--
-- Table structure for table `cijfersysteem`
--

CREATE TABLE `cijfersysteem` (
  `id` int(9) NOT NULL,
  `leerling` varchar(50) NOT NULL,
  `cijfer` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cijfersysteem`
--

INSERT INTO `cijfersysteem` (`id`, `leerling`, `cijfer`) VALUES
(1, 'Jarvis Bartow', 7.4),
(2, 'Lance Swinger', 6.2),
(3, 'Vernice Oxner', 3.5),
(4, 'Adelina Kress', 9.3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cijfersysteem`
--
ALTER TABLE `cijfersysteem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cijfersysteem`
--
ALTER TABLE `cijfersysteem`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
