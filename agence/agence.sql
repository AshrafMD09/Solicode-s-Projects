-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2023 at 10:00 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agence`
--
CREATE DATABASE IF NOT EXISTS `agence` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `agence`;

-- --------------------------------------------------------

--
-- Table structure for table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE `annonce` (
  `id` int(11) NOT NULL,
  `titre` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `superficie` int(50) NOT NULL,
  `adresse` varchar(500) NOT NULL,
  `montant` decimal(50,0) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `annonce`
--

INSERT INTO `annonce` (`id`, `titre`, `image`, `description`, `superficie`, `adresse`, `montant`, `date`, `type`) VALUES
(71, 'House 4', 'image4.jpg', '6 guests3 bedrooms 3 beds 3 baths', 80, 'La Casa de caravagio, cadiz, Spain casao', '800', '2023-02-03', 'location'),
(93, 'House 4', 'image4.jpg', '6 guests3 bedrooms 3 beds 3 baths', 80, 'La Casa de caravagio, cadiz, Spain casao', '800', '2023-02-03', 'location'),
(94, 'House 1', 'image1.jpg', '6 guests3 bedrooms8 beds2 baths', 90, 'Larbaa Beni Hassen, Tanger-Tétouan, Morocco', '5000', '2023-02-03', 'vente'),
(97, 'House 4', 'image4.jpg', '6 guests3 bedrooms 3 beds 3 baths', 80, 'La Casa de caravagio, cadiz, Spain', '800', '2023-02-03', 'location'),
(98, 'House 5', 'image5.jpg', '2 guests3 bedrooms3  beds 1 bath', 120, ' mallorca , cadiz, Spain', '20000', '2023-02-01', 'vente'),
(99, 'House 66', 'image6.jpg', '3 guests 2 bedrooms 2 beds 2 baths', 90, 'street n3002, barcelona, Spain', '9000', '2023-02-15', 'location');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
