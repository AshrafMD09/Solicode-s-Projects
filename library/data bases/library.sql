-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 01:15 AM
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
  `id_adherent` int(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
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

--
-- Dumping data for table `adherent`
--

INSERT INTO `adherent` (`id_adherent`, `firstname`, `lastname`, `c.i.n`, `email`, `telephone`, `birthday`, `adresse`, `type_user`, `username`, `password`, `date_inscription`, `score`) VALUES
(1, 'Ashraf', 'Jaouane', 'k560367', 'medachraf2012@gmail.com', '0693780172', '1999-10-31', 'Tanger Merchan 45 9000', 'Etudiant', 'Ashrafmd', '123456', '2023-03-13', 0),
(15, 'test', 'test', 'k765334', 'test.test@test.com', '0192873654', '1999-10-31', 'adresse test 123', 'Fonctionnaire', 'testusername', '1234', '2023-03-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id_admin` int(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `firstname`, `lastname`, `username`, `password`) VALUES
(1, 'med', 'ashraf', 'ashrafmd', '1234'),
(2, 'mohamed', 'jaouane', 'ashrafmd09', '1234');

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
  `etat` varchar(50) NOT NULL,
  `id_ouvrage` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exemplaire`
--

INSERT INTO `exemplaire` (`id_exemplaire`, `etat`, `id_ouvrage`) VALUES
(62, 'test1', 24),
(63, 'h', 24);

-- --------------------------------------------------------

--
-- Table structure for table `ouvrage`
--

DROP TABLE IF EXISTS `ouvrage`;
CREATE TABLE `ouvrage` (
  `id_ouvrage` int(50) NOT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `autheur` varchar(50) DEFAULT NULL,
  `ouvrageType` varchar(50) DEFAULT NULL,
  `ouvrageImg` varchar(500) NOT NULL,
  `date_edition` date DEFAULT NULL,
  `date_achat` date DEFAULT NULL,
  `nombre_pages` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ouvrage`
--

INSERT INTO `ouvrage` (`id_ouvrage`, `titre`, `autheur`, `ouvrageType`, `ouvrageImg`, `date_edition`, `date_achat`, `nombre_pages`) VALUES
(24, 'ew', 'ih', 'Book', 'Der-Medicus.jpg', '2023-03-04', '2023-03-13', 12);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE `reservation` (
  `id_reservation` int(50) NOT NULL,
  `date_reservation` date DEFAULT NULL,
  `id_adherent` int(50) NOT NULL,
  `id_exemplaire` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id_adherent`);

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
  ADD PRIMARY KEY (`id_exemplaire`),
  ADD KEY `id_ouvrage` (`id_ouvrage`);

--
-- Indexes for table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD PRIMARY KEY (`id_ouvrage`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_adherent` (`id_adherent`),
  ADD KEY `id_exemplaire` (`id_exemplaire`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `id_adherent` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id_emprunt` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exemplaire`
--
ALTER TABLE `exemplaire`
  MODIFY `id_exemplaire` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `ouvrage`
--
ALTER TABLE `ouvrage`
  MODIFY `id_ouvrage` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`id_reservation`) REFERENCES `reservation` (`id_reservation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD CONSTRAINT `exemplaire_ibfk_1` FOREIGN KEY (`id_ouvrage`) REFERENCES `ouvrage` (`id_ouvrage`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id_adherent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_exemplaire`) REFERENCES `exemplaire` (`id_exemplaire`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
