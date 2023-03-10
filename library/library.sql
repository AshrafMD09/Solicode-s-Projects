-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 05:51 PM
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
-- Database: `library`
--
CREATE DATABASE IF NOT EXISTS `library` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `library`;

-- --------------------------------------------------------

--
-- Table structure for table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE `adherent` (
  `id_user` int(50) NOT NULL,
  `firstname` int(50) DEFAULT NULL,
  `lastname` int(50) DEFAULT NULL,
  `c.i.n` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `type_user` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `date_inscription` date DEFAULT NULL,
  `score` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id_admin` int(50) NOT NULL,
  `firstname` int(50) DEFAULT NULL,
  `lastname` int(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emprunt`
--

DROP TABLE IF EXISTS `emprunt`;
CREATE TABLE `emprunt` (
  `id_emprunt` int(50) NOT NULL,
  `date_emprunt` date DEFAULT NULL,
  `date_retour` date DEFAULT NULL,
  `id_reservation` int(50) NOT NULL,
  `id_admin` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exemplaire`
--

DROP TABLE IF EXISTS `exemplaire`;
CREATE TABLE `exemplaire` (
  `id_exemplaire` int(50) NOT NULL,
  `etat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ouvrage`
--

DROP TABLE IF EXISTS `ouvrage`;
CREATE TABLE `ouvrage` (
  `id_ouvrage` int(50) NOT NULL,
  `titre` int(50) DEFAULT NULL,
  `autheur` int(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `date_edition` date DEFAULT NULL,
  `date_achat` date DEFAULT NULL,
  `nombre-pages` int(50) DEFAULT NULL,
  `id_exemplaire` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE `reservation` (
  `id_reservation` int(50) NOT NULL,
  `date_reservation` date DEFAULT NULL,
  `id_user` int(50) NOT NULL,
  `id_exemplaire` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id_emprunt`),
  ADD KEY `id_reservation` (`id_reservation`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD PRIMARY KEY (`id_exemplaire`);

--
-- Indexes for table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD PRIMARY KEY (`id_ouvrage`),
  ADD KEY `id_exemplaire` (`id_exemplaire`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_exemplaire` (`id_exemplaire`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`id_reservation`) REFERENCES `reservation` (`id_reservation`) ON DELETE CASCADE,
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE;

--
-- Constraints for table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD CONSTRAINT `ouvrage_ibfk_1` FOREIGN KEY (`id_exemplaire`) REFERENCES `exemplaire` (`id_exemplaire`) ON DELETE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `adherent` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_exemplaire`) REFERENCES `exemplaire` (`id_exemplaire`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
