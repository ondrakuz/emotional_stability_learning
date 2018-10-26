-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pát 26. říj 2018, 18:21
-- Verze serveru: 5.7.22
-- Verze PHP: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `ondrejkuzcz1`
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
(1, 'Chybná odpověď', 0),
(2, 'Otáčení emocí', 0),
(3, 'Princip subjektivity', 0),
(4, 'Ví­ra v Boha', 0);

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
(1, 1, 'Je to dost nepříjemné, dost mě to zlobí a ovlivňuje další věci', 0),
(1, 2, 'Může to být dobré k tomu, že člověk hned vidí koho si nevšímat.', 0),
(1, 3, 'Nedá se s tím nic dělat, ale je to bezvýznamné.', 0),
(1, 4, 'Nedá se s tím nic dělat, ale bůh tomu tak zřejmě z nějakého důvodu chce.', 0),
(2, 1, 'Ztráta zaměstnání je velmi špatná a má spoustu negativních důsledků', 0),
(2, 2, 'Může to být dobré k tomu, že člověk bude mít nějakou dobu více času, a pak třeba pozná zase jiné zaměstnání.', 0),
(2, 3, 'Ztráta zaměstnání ani žádný její důsledek ve skutečnosti nebrání tomu, aby byl člověk spokojen.', 0),
(2, 4, 'Ztráta zaměstnání je možná nějaká vyšší vůle a nemá cenu se s tím nějak trápit.', 0),
(3, 1, 'Je to nanic, spoustu věcí musím odložit a cítím se zle.', 0),
(3, 2, 'Onemocnět čas od času zaktivuje imunitní systém', 0),
(3, 3, 'Onemocnět chřipkou a všechny důsledky ve skutečnosti nejsou důležité, nebrání spokojenosti v přítomném okamžiku.', 0),
(3, 4, 'Zdraví lidí a věci s tím spojené jsou v rukou boha a každopádně je to v pořádku.', 0),
(4, 1, 'Asi bude moje budoucnost temná...', 0),
(4, 2, 'Alespoň v případě, že něco dělám špatně, toho nevyrobím špatně moc.', 0),
(4, 3, 'V případě, že mi jde všechno pomalu a neumím s tím nic udělat, rychlost mojí práce není podstatná.', 0),
(4, 4, 'Rychlost mojí práce je výslednicí sil přesahujících naše vědění.', 0);

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
(1, 'Výsměch okolních lidí', '', 0),
(2, 'Ztráta zaměstnání', '', 0),
(3, 'Mám chřipku', '', 0),
(4, 'Nic nestíhám, jde mi všechno strašně pomalu', '', 0),
(6, 'Ztráta partnera', '', 0),
(7, 'Problémy v rodině', '', 0),
(8, 'Ztráta peněženky', '', 0),
(9, 'Špatná investice peněz', '', 0),
(10, 'Nerozhodnost', '', 0),
(11, 'Hlasy', '', 0),
(12, 'Špatný spánek', '', 0),
(13, 'Špatné vstávání', '', 0);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
