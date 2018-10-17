-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost
-- Vytvořeno: Ned 30. zář 2018, 09:20
-- Verze serveru: 10.1.35-MariaDB
-- Verze PHP: 5.6.38

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
(4, 'VÃ­ra v Boha', 0),
(5, 'schema, kt. se mi nelibi', 1);

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
(2, 4, 'ZtrÃ¡ta zamÄ›stnÃ¡nÃ­ je moÅ¾nÃ¡ nÄ›jakÃ¡ vyÅ¡Å¡Ã­ vÅ¯le a nemÃ¡ cenu se s tÃ­m nÄ›jak trÃ¡pit.', 0);

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
(4, 'MÃ¡m chÅ™ipku', '', 1),
(5, 'Nic nestÃ­hÃ¡m, jde mi vÅ¡echno straÅ¡nÄ› pomalu', '', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
