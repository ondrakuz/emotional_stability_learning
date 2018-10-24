-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vytvořeno: Stř 24. říj 2018, 13:13
-- Verze serveru: 5.7.22-0ubuntu0.16.04.1
-- Verze PHP: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktura tabulky `kognitivni_schema`
--

CREATE TABLE `kognitivni_schema` (
  `id` int(11) NOT NULL,
  `nazev` varchar(40) COLLATE utf8_czech_ci NOT NULL,
  `smazano` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `kognitivni_schema`
--

INSERT INTO `kognitivni_schema` (`id`, `nazev`, `smazano`) VALUES
(1, 'ChybnÃ¡ odpovÄ›Ä', 0),
(2, 'OtÃ¡ÄenÃ­ emocÃ­', 0),
(3, 'Princip subjektivity', 0),
(4, 'VÃ­ra v Boha', 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `odpoved`
--

CREATE TABLE `odpoved` (
  `id_problemu` int(11) NOT NULL,
  `id_kog_schematu` int(11) NOT NULL,
  `odpoved` text COLLATE utf8_czech_ci NOT NULL,
  `smazano` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `odpoved`
--

INSERT INTO `odpoved` (`id_problemu`, `id_kog_schematu`, `odpoved`, `smazano`) VALUES
(1, 1, 'Je to dost nepÅ™Ã­jemnÃ©, dost mÄ› to zlobÃ­ a ovlivÅˆuje dalÅ¡Ã­ vÄ›ci.', 0),
(1, 2, 'MÅ¯Å¾e to bÃ½t dobrÃ© k tomu, Å¾e ÄlovÄ›k hned vidÃ­ koho si nevÅ¡Ã­mat.', 0),
(1, 3, 'NedÃ¡ se s tÃ­m nic dÄ›lat, ale je to bezvÃ½znamnÃ©.', 0),
(1, 4, 'NedÃ¡ se s tÃ­m nic dÄ›lat, ale bÅ¯h tomu tak zÅ™ejmÄ› z nÄ›jakÃ©ho dÅ¯vodu chce.', 0),
(2, 1, 'ZtrÃ¡ta zamÄ›stnÃ¡nÃ­ je velmi Å¡patnÃ¡ a mÃ¡ spoustu negativnÃ­ch dÅ¯sledkÅ¯', 0),
(2, 2, 'MÅ¯Å¾e to bÃ½t dobrÃ© k tomu, Å¾e ÄlovÄ›k bude mÃ­t nÄ›jakou dobu vÃ­ce Äasu, a pak tÅ™eba poznÃ¡ zase jinÃ© zamÄ›stnÃ¡nÃ­.', 0),
(2, 3, 'ZtrÃ¡ta zamÄ›stnÃ¡nÃ­ ani Å¾Ã¡dnÃ½ jejÃ­ dÅ¯sledek ve skuteÄnosti nebrÃ¡nÃ­ tomu, aby byl ÄlovÄ›k spokojen.', 0),
(2, 4, 'ZtrÃ¡ta zamÄ›stnÃ¡nÃ­ je moÅ¾nÃ¡ nÄ›jakÃ¡ vyÅ¡Å¡Ã­ vÅ¯le a nemÃ¡ cenu se s tÃ­m nÄ›jak trÃ¡pit.', 0),
(3, 1, 'Je to nanic, spoustu vÄ›cÃ­ musÃ­m odloÅ¾it a cÃ­tÃ­m se zle.', 0),
(3, 2, 'OnemocnÄ›t Äas od Äasu zaktivuje imunitnÃ­ systÃ©m', 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `problem`
--

CREATE TABLE `problem` (
  `id` int(11) NOT NULL,
  `nazev` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `popis` text COLLATE utf8_czech_ci,
  `smazano` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `problem`
--

INSERT INTO `problem` (`id`, `nazev`, `popis`, `smazano`) VALUES
(1, 'VÃ½smÄ›ch okolnÃ­ch lidÃ­', '', 0),
(2, 'ZtrÃ¡ta zamÄ›stnÃ¡nÃ­', '', 0),
(3, 'MÃ¡m chÅ™ipku', '', 0),
(4, 'Nic nestÃ­hÃ¡m, jde mi vÅ¡echno straÅ¡nÄ› pomalu', '', 0),
(6, 'ZtrÃ¡ta partnera', '', 0),
(7, 'ProblÃ©my v rodinÄ›', '', 0),
(8, 'ZtrÃ¡ta penÄ›Å¾enky', '', 0),
(9, 'Å patnÃ© investice penÄ›z', '', 0),
(10, 'Nerozhodnost', '', 0),
(11, 'Hlasy', '', 0),
(12, 'Å patnÃ½ spÃ¡nek', '', 0),
(13, 'Å patnÃ© vstÃ¡vÃ¡nÃ­', '', 0);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `kognitivni_schema`
--
ALTER TABLE `kognitivni_schema`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `odpoved`
--
ALTER TABLE `odpoved`
  ADD PRIMARY KEY (`id_problemu`,`id_kog_schematu`);

--
-- Klíče pro tabulku `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `kognitivni_schema`
--
ALTER TABLE `kognitivni_schema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pro tabulku `problem`
--
ALTER TABLE `problem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
