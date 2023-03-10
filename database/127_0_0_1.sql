-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 24 jan 2023 om 09:48
-- Serverversie: 5.7.31
-- PHP-versie: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-pdo-crud-2209a`
--
CREATE DATABASE IF NOT EXISTS `php-pdo-crud-2209a` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `php-pdo-crud-2209a`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Persoon`
--

DROP TABLE IF EXISTS `Persoon`;
CREATE TABLE IF NOT EXISTS `Persoon` (
  `Id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Voornaam` varchar(60) NOT NULL,
  `Tussenvoegsel` varchar(10) NOT NULL,
  `Achternaam` varchar(60) NOT NULL,
  `Telefoonnummer` varchar(10) NOT NULL,
  `Straatnaam` varchar(60) NOT NULL,
  `huisnummer` varchar(4) NOT NULL,
  `woonplaats` varchar(60) NOT NULL,
  `postcode` varchar(4) NOT NULL,
  `landnaam` varchar(60) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Persoon`
--

INSERT INTO `Persoon` (`Id`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Telefoonnummer`, `Straatnaam`, `huisnummer`, `woonplaats`, `postcode`, `landnaam`) VALUES
(13, 'Arjan', 'de', 'Ruijter','0612345678', 'Daltonlaan', '300', 'Utrecht', '3515', 'Nederland');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
