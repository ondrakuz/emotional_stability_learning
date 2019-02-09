-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost
-- Vytvořeno: Sob 09. úno 2019, 20:50
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
-- Struktura tabulky `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `id_lang` int(11) NOT NULL,
  `id_problem` int(11) NOT NULL,
  `id_cog_schema` int(11) NOT NULL,
  `answer` text COLLATE utf8_czech_ci NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `answers`
--

INSERT INTO `answers` (`id`, `id_lang`, `id_problem`, `id_cog_schema`, `answer`, `deleted`) VALUES
(1, 1, 1, 1, 'Je to dost nepříjemné, dost mě to zlobí a ovlivňuje další věci', 0),
(2, 1, 1, 2, 'Může to být dobré k tomu, že člověk hned vidí koho si nevšímat.', 0),
(3, 1, 1, 3, 'Nedá se s tím nic dělat, ale je to bezvýznamné.', 0),
(4, 1, 1, 4, 'Nedá se s tím nic dělat, ale bůh tomu tak zřejmě z nějakého důvodu chce.', 0),
(5, 1, 2, 1, 'Ztráta zaměstnání je velmi špatná a má spoustu negativních důsledků', 0),
(6, 1, 2, 2, 'Může to být dobré k tomu, že člověk bude mít nějakou dobu více času, a pak třeba pozná zase jiné zaměstnání.', 0),
(7, 1, 2, 3, 'Ztráta zaměstnání ani žádný její důsledek ve skutečnosti nebrání tomu, aby byl člověk spokojen.', 0),
(8, 1, 2, 4, 'Ztráta zaměstnání je možná nějaká vyšší vůle a nemá cenu se s tím nějak trápit.', 0),
(9, 1, 3, 1, 'Je to nanic, spoustu věcí musím odložit a cítím se zle.', 0),
(10, 1, 3, 2, 'Onemocnět čas od času zaktivuje imunitní systém', 0),
(11, 1, 2, 2, 'Člověk si může nějakou dobu odpočinout.', 1),
(12, 1, 3, 3, 'Chřipka ani všechny její důsledky nejsou ve skutečnosti důležité, můžu v klidu odpočívat než se uzdravím.', 0),
(13, 1, 3, 4, 'Zdraví lidí je řízeno vyšší mocí a nemá cenu se kvůli tomu trápit.', 0),
(14, 1, 4, 1, 'Je to strašné, vše mi jde tak pomalu, že ničeho v životě nedosáhnu.', 0),
(15, 1, 4, 2, 'Když mi jdou věci pomalu, alespoň toho nestihnu moc pokazit.', 0),
(16, 1, 4, 3, 'To, že jdou člověku věci pomalu není podstatné, pokud s tím neumí nic udělat.', 0),
(17, 1, 4, 4, 'Rychlost, jakou se věci v lidském světě dějí, řídí bůh. Pokud něco můžu zvládnout rychleji, udělám to, jinak je to v pořádku i pomalu.', 0),
(18, 1, 6, 1, 'Nikdy s nikým nevydržím nebo mě jiní opustí, a štěstí v životě nikdy nedosáhnu.', 0),
(19, 1, 6, 2, 'Nedá se nic dělat, mám teď čas si vše srovnat v hlavě a v budoucnu se třeba ještě seznámit s někým jiným.', 0),
(20, 1, 6, 3, 'Pokud se ztrátou partnera nemůžu už nic udělat, není to téhle chvíli důležité.', 0),
(21, 1, 6, 4, 'Láska a vztahy mezi lidmi jsou řízeny vyšší mocí.', 0),
(22, 1, 7, 1, 'Špatné vztahy v rodině negativně ovlivňují všechny ostatní oblasti života.', 0),
(23, 1, 7, 2, 'Je to dobré k tomu, že mě to vede k samostatnosti.', 0),
(24, 1, 7, 3, 'Chování ostatních lidí se nedá moc ovlivnit, takže to není důležité.', 0),
(25, 1, 7, 4, 'Chování ostatních lidí je projevem boží vůle - asi v tom je nějaký vyšší smysl a nemá cenu se kvůli tomu trápit.', 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `cog_schema`
--

CREATE TABLE `cog_schema` (
  `id` int(11) NOT NULL,
  `id_lang` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8_czech_ci NOT NULL,
  `wrong` int(1) NOT NULL DEFAULT '0',
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `cog_schema`
--

INSERT INTO `cog_schema` (`id`, `id_lang`, `name`, `wrong`, `deleted`) VALUES
(1, 1, 'Chybná odpověď', 1, 0),
(2, 1, 'Otáčení emocí', 0, 0),
(3, 1, 'Princip subjektivity', 0, 0),
(4, 1, 'Ví­ra v Boha', 0, 0),
(5, 1, 'Přijímání a rušení problémů', 0, 0),
(6, 2, 'Wrong answer', 1, 0),
(7, 2, 'Turning emotions', 0, 0),
(8, 2, 'The principle of subjectivity', 0, 0),
(9, 2, 'Belief in God', 0, 0),
(10, 2, 'Accepting and canceling problems', 0, 0);

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

-- --------------------------------------------------------

--
-- Struktura tabulky `lectors`
--

CREATE TABLE `lectors` (
  `student` int(5) NOT NULL,
  `lector` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `lectors`
--

INSERT INTO `lectors` (`student`, `lector`) VALUES
(1, 2),
(1, 4);

-- --------------------------------------------------------

--
-- Struktura tabulky `problem`
--

CREATE TABLE `problem` (
  `id` int(11) NOT NULL,
  `id_lang` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `description` text COLLATE utf8_czech_ci,
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `problem`
--

INSERT INTO `problem` (`id`, `id_lang`, `name`, `description`, `deleted`) VALUES
(1, 1, 'Výsměch okolních lidí', '', 0),
(2, 1, 'Ztráta zaměstnání', '', 0),
(3, 1, 'Mám chřipku', '', 0),
(4, 1, 'Nic nestíhám, jde mi všechno strašně pomalu', '', 0),
(6, 1, 'Ztráta partnera', '', 0),
(7, 1, 'Problémy v rodině', '', 0),
(8, 1, 'Ztráta peněženky', '', 0),
(9, 1, 'Špatná investice peněz', '', 0),
(10, 1, 'Nerozhodnost', '', 0),
(11, 1, 'Hlasy', '', 0),
(12, 1, 'Špatný spánek', '', 0),
(13, 1, 'Špatné vstávání', '', 0),
(14, 1, 'Špatná finanční situace', '', 0),
(15, 2, 'Ridicule of surrounding people', '', 0);

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
  `permissions` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 - admin, 0- user',
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `nick`, `password`, `permissions`, `deleted`) VALUES
(1, '', '', 'admin', 'aea3d8b41c3de679dbadef94dd94aa7ca9c41912', 1, 0);

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
-- Klíče pro tabulku `lectors`
--
ALTER TABLE `lectors`
  ADD UNIQUE KEY `relace` (`student`,`lector`) USING BTREE;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pro tabulku `cog_schema`
--
ALTER TABLE `cog_schema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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

--
-- AUTO_INCREMENT pro tabulku `problem`
--
ALTER TABLE `problem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
