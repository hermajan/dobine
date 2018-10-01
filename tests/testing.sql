-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 03. led 2017, 23:27
-- Verze serveru: 10.1.16-MariaDB
-- Verze PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `testing`
--
CREATE DATABASE IF NOT EXISTS `testing` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `testing`;

-- --------------------------------------------------------

--
-- Struktura tabulky `heroes`
--
-- Vytvořeno: Úte 03. led 2017, 21:04
--

DROP TABLE IF EXISTS `heroes`;
CREATE TABLE `heroes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nick` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `sex` enum('female','male') COLLATE utf8_bin DEFAULT NULL,
  `city` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `year` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Vypisuji data pro tabulku `heroes`
--

INSERT INTO `heroes` (`id`, `name`, `nick`, `sex`, `city`, `year`) VALUES
(1, 'Tony Stark', 'Iron Man', 'male', 'New York', 2008),
(2, 'Peter Parker', 'Spider-Man', 'male', 'New York', 2016),
(3, 'Daisy Johnson', 'Quake', 'female', 'Hunan', 2013),
(4, 'Carol Danvers', 'Captain Marvel', 'female', 'Boston', 2019);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `heroes`
--
ALTER TABLE `heroes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `heroes`
--
ALTER TABLE `heroes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
