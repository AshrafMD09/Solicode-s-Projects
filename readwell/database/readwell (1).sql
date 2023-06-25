-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 03:23 AM
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
-- Database: `readwell`
--
CREATE DATABASE IF NOT EXISTS `readwell` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `readwell`;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `id_book` int(50) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `image_book` varchar(500) DEFAULT NULL,
  `type_book` varchar(50) DEFAULT NULL,
  `summary` varchar(500) DEFAULT NULL,
  `pager_number` int(50) DEFAULT NULL,
  `PDF_file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id_book`, `title`, `author`, `image_book`, `type_book`, `summary`, `pager_number`, `PDF_file`) VALUES
(1, 'Follow Me To Ground', 'Sue Rainsford', '../img/book1.jpg', 'Novel', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', 365, '../pdf_books/The-Invisible-Man.pdf'),
(2, 'Mere Science', 'Beethoven', '../img/science.jpg', 'Science', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', 195, '../pdf_books/The-Invisible-Man.pdf'),
(3, 'Harry Potter', 'Mozart', '../img/book2.jpg', 'Novel', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', 195, '../pdf_books/The-Invisible-Man.pdf'),
(4, 'Brown', 'Olivia Willson', '../img/brown.jpg', 'Novel', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', 175, '../pdf_books/The-Invisible-Man.pdf'),
(5, 'Dark Black Night', 'Nilson Chris', '../img/dark-black.jpg', 'Novel', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', 435, '../pdf_books/The-Invisible-Man.pdf'),
(6, 'Brown Mystery', 'Nilson Nolan', '../img/BrownMystery.jpg', 'Novel', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', 435, '../pdf_books/The-Invisible-Man.pdf'),
(7, 'Business Non Fiction', 'Olivia Willson', '../img/business.jpg', 'Business', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', 134, '../pdf_books/The-Invisible-Man.pdf'),
(8, 'Harry Potter', 'Murph Cooper', '../img/harry.jpg', 'Novel', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', 735, '../pdf_books/The-Invisible-Man.pdf'),
(26, 'Kite Runner', 'Khaled Hosseini', '../img/Kite-Runner.jpg', 'Novel', 'The Kite Runner is the first novel by Afghan-American author Khaled Hosseini.[1] Published in 2003 by Riverhead Books, it tells the story of Amir, a young boy from the Wazir Akbar Khan district of Kabul. The story is set against a backdrop of tumultuous events, from the fall of Afghanistan\'s monarchy through the Soviet invasion, the exodus of refugees to Pakistan and the United States, and the rise of the Taliban regime.', 371, '../pdf_books/the_kite_runner.pdf'),
(27, 'An Apartment In Paris', 'Guillaume Musso ', '../img/Musso-Guillaume-Un-Appartement-a-Paris-couverture-collector-e1518606458126.jpg', 'Novel', 'Fascinated by his genius and intrigued by his fatal destiny, Madeline and Gaspard decide to join forces in order to recover these supposedly extraordinary paintings. But to uncover the real secret of Sean Lorenz, they will first have to face their own demons in a tragic investigation that will change them forever.', 464, '../pdf_books/شقة في باريس(eloualid-book.com).pdf'),
(28, 'Zorba The Greek', 'Nikos Kazantzakis', '../img/zorba.jpg', 'Novel', 'It is the tale of a young Greek intellectual who ventures to escape his bookish life with the aid of the boisterous and mysterious Alexis Zorba. The novel was adapted into the successful 1964 film of the same name directed by Michael Cacoyannis, as well as a stage musical and a BBC radio play.', 216, '../pdf_books/Zorba_The_Greek.pdf'),
(29, 'The Invisible Man', 'H. G. Wells', '../img/cover-orig-7340.jpg', 'Science', 'The Invisible Man of the title is \'\'Griffin\'\', a scientist who theorizes that if a person\'s refractive index is changed to exactly that of air and his body does not absorb or reflect light, then he will not be visible. He successfully carries out this procedure on himself, but begins to become mentally unstable as a result...', 145, '../pdf_books/The-Invisible-Man.pdf'),
(30, 'A Tale of Two Cities', 'Charles Dickens', '../img/9780451530578.jpeg', 'History', 'A Tale of Two Cities is a historical novel published in 1859 by Charles Dickens, set in London and Paris before and during the French Revolution. The novel tells the story of the French Doctor Manette, his 18-year-long imprisonment in the Bastille in Paris, and his release to live in London with his daughter Lucie whom he had never met.', 372, '../pdf_books/A-Tale-of-Two-Cities.pdf'),
(31, 'Diet and Health', 'Lulu Hunt Peters', '../img/cover-cust-9634.jpg', 'Science', 'A breezy but practical message to the countless persons who want either to reduce or increase their weight.', 99, '../pdf_books/Diet-and-Health.pdf'),
(32, 'The Art of War', 'Zi Sun', '../img/cover-cust-7088.jpg', 'History', 'Translated from the Chinese with Introduction and Critical Notes by Lionel Giles, M.A.', 185, '../pdf_books/The-Art-of-War.pdf'),
(33, 'Relativity - The Special and General Theory', 'Albert Einstein', '../img/cover-cust-2473.jpg', 'Science', 'The purpose of mechanics is to describe how bodies change their position in space with \"time.\" I should load my conscience with grave sins against the sacred spirit of lucidity were I to formulate the aims of mechanics in this way, without serious reflection and detailed explanations. Let us proceed to disclose these sins.', 97, '../pdf_books/Relativity---The-Special-and-General-Theory.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id_comment` int(50) NOT NULL,
  `content` varchar(500) DEFAULT NULL,
  `date_comment` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` int(50) NOT NULL,
  `id_book` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE `favoris` (
  `id_user` int(50) NOT NULL,
  `id_book` int(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(50) NOT NULL,
  `firstname_user` varchar(50) DEFAULT NULL,
  `lastname_user` varchar(50) DEFAULT NULL,
  `email_user` varchar(50) DEFAULT NULL,
  `password_user` varchar(50) DEFAULT NULL,
  `type_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `firstname_user`, `lastname_user`, `email_user`, `password_user`, `type_user`) VALUES
(1, 'Mohamed Achraf', 'Jaouane', 'medachraf2012@gmail.com', '123456', 'user'),
(2, 'Samia', 'Taouali', 'samiacate@gmail.com', '123456', 'user'),
(3, 'Johan', 'Tenma', 'admin@gmail.com', '123456', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id_book`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_book` (`id_book`);

--
-- Indexes for table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id_user`,`id_book`),
  ADD KEY `id_book` (`id_book`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id_book` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_book`) REFERENCES `book` (`id_book`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`id_book`) REFERENCES `book` (`id_book`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
