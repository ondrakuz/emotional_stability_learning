-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost
-- Vytvořeno: Pon 11. úno 2019, 15:20
-- Verze serveru: 10.1.37-MariaDB
-- Verze PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `emotions`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `fusers`
--

CREATE TABLE `fusers` (
  `id` int(5) NOT NULL,
  `nick` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `student` int(1) NOT NULL DEFAULT '1',
  `lector` int(1) NOT NULL DEFAULT '0',
  `password` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `gdpr` int(1) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `fusers`
--

INSERT INTO `fusers` (`id`, `nick`, `email`, `student`, `lector`, `password`, `gdpr`, `deleted`) VALUES
(1, 'rusuf', 'rusuf4476@gmail.com', 1, 0, 'acb91b9c2023d59475288215c620be0a920ac85b', 1, 0),
(2, 'ondrejk', 'ondrej.kuzel@gmail.com', 0, 1, '3190174a932c0f6ddfd8d4537037ce85f583c6ec', 1, 0),
(3, 'smazat', 'rusuf@seznam.cz', 1, 0, 'acb91b9c2023d59475288215c620be0a920ac85b', 1, 1),
(4, 'henryok', 'henryok.93@gmail.com', 1, 1, 'c4380f939262997cd4baa61113ccc095d3da10ee', 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `text_id` varchar(4) COLLATE utf8_czech_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_czech_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `languages`
--

INSERT INTO `languages` (`id`, `text_id`, `name`) VALUES
(1, 'cs', 'Čeština'),
(2, 'en', 'Angličtina'),
(3, 'fi', 'Finština'),
(4, 'fr', 'Francouzština'),
(5, 'it', 'Italština'),
(6, 'hu', 'Maďarština'),
(7, 'de', 'Němčina'),
(8, 'no', 'Norština'),
(9, 'pl', 'Polština'),
(10, 'pt', 'Portugalština'),
(11, 'ru', 'Ruština'),
(12, 'es', 'Španělština'),
(13, 'se', 'Švédština'),
(14, 'dk', 'Dánština');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `fusers`
--
ALTER TABLE `fusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick` (`nick`);

--
-- Klíče pro tabulku `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `text_id` (`text_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `fusers`
--
ALTER TABLE `fusers`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pro tabulku `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
