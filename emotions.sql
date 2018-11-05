-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Počítač: localhost:22
-- Vytvořeno: Pon 05. lis 2018, 15:03
-- Verze serveru: 5.7.23-0ubuntu0.16.04.1
-- Verze PHP: 7.0.32-0ubuntu0.16.04.1

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
-- Struktura tabulky `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `id_problem` int(11) NOT NULL,
  `id_cog_schema` int(11) NOT NULL,
  `answer` text COLLATE utf8_czech_ci NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `answers`
--

INSERT INTO `answers` (`id`, `id_problem`, `id_cog_schema`, `answer`, `deleted`) VALUES
(1, 1, 1, 'Je to dost nepříjemné, dost mě to zlobí a ovlivňuje další věci', 0),
(2, 1, 2, 'Může to být dobré k tomu, že člověk hned vidí koho si nevšímat.', 0),
(3, 1, 3, 'Nedá se s tím nic dělat, ale je to bezvýznamné.', 0),
(4, 1, 4, 'Nedá se s tím nic dělat, ale bůh tomu tak zřejmě z nějakého důvodu chce.', 0),
(5, 2, 1, 'Ztráta zaměstnání je velmi špatná a má spoustu negativních důsledků', 0),
(6, 2, 2, 'Může to být dobré k tomu, že člověk bude mít nějakou dobu více času, a pak třeba pozná zase jiné zaměstnání.', 0),
(7, 2, 3, 'Ztráta zaměstnání ani žádný její důsledek ve skutečnosti nebrání tomu, aby byl člověk spokojen.', 0),
(8, 2, 4, 'Ztráta zaměstnání je možná nějaká vyšší vůle a nemá cenu se s tím nějak trápit.', 0),
(9, 3, 1, 'Je to nanic, spoustu věcí musím odložit a cítím se zle.', 0),
(10, 3, 2, 'Onemocnět čas od času zaktivuje imunitní systém', 0),
(11, 2, 2, 'Člověk si může nějakou dobu odpočinout.', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `cog_schema`
--

CREATE TABLE `cog_schema` (
  `id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8_czech_ci NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `cog_schema`
--

INSERT INTO `cog_schema` (`id`, `name`, `deleted`) VALUES
(1, 'Chybná odpověď', 0),
(2, 'Otáčení emocí', 0),
(3, 'Princip subjektivity', 0),
(4, 'Ví­ra v Boha', 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `problem`
--

CREATE TABLE `problem` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `decription` text COLLATE utf8_czech_ci,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `problem`
--

INSERT INTO `problem` (`id`, `name`, `decription`, `deleted`) VALUES
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

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8_czech_ci DEFAULT NULL,
  `surname` varchar(20) COLLATE utf8_czech_ci DEFAULT NULL,
  `nick` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_czech_ci NOT NULL,
  `permissions` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 - admin, 0- user'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `nick`, `password`, `permissions`) VALUES
(1, '', '', 'admin', 'aea3d8b41c3de679dbadef94dd94aa7ca9c41912', 1);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `cog_schema`
--
ALTER TABLE `cog_schema`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick` (`nick`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pro tabulku `cog_schema`
--
ALTER TABLE `cog_schema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pro tabulku `problem`
--
ALTER TABLE `problem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
