-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2023 at 05:28 PM
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
-- Database: `testt`
--
CREATE DATABASE IF NOT EXISTS `testt` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `testt`;

-- --------------------------------------------------------

--
-- Table structure for table `test1`
--

DROP TABLE IF EXISTS `test1`;
CREATE TABLE `test1` (
  `id1` int(50) NOT NULL,
  `etat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test2`
--

DROP TABLE IF EXISTS `test2`;
CREATE TABLE `test2` (
  `id2` int(50) NOT NULL,
  `gg` varchar(50) DEFAULT NULL,
  `id1` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test1`
--
ALTER TABLE `test1`
  ADD PRIMARY KEY (`id1`);

--
-- Indexes for table `test2`
--
ALTER TABLE `test2`
  ADD PRIMARY KEY (`id2`),
  ADD KEY `id1` (`id1`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `test2`
--
ALTER TABLE `test2`
  ADD CONSTRAINT `test2_ibfk_1` FOREIGN KEY (`id1`) REFERENCES `test1` (`id1`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
