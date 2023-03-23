-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 09:31 AM
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
-- Database: `fietsenmaker`
--

-- --------------------------------------------------------

--
-- Table structure for table `optie`
--

CREATE TABLE `optie` (
  `id` int(3) NOT NULL,
  `poll` int(3) NOT NULL,
  `optie` varchar(255) NOT NULL,
  `stemmen` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `optie`
--

INSERT INTO `optie` (`id`, `poll`, `optie`, `stemmen`) VALUES
(1, 1, 'Inderdaad, PHP is het helemaal', 22),
(2, 1, 'PHP is leuk, maar niet het leukste', 20),
(3, 1, 'PHP is saai', 7),
(4, 1, 'Geen mening', 47);

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `id` int(3) NOT NULL,
  `vraag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`id`, `vraag`) VALUES
(1, 'Stelling van de maand: \"PHP is de leukste programmeertaal\"');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `optie`
--
ALTER TABLE `optie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poll` (`poll`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `optie`
--
ALTER TABLE `optie`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
