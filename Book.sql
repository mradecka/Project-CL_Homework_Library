-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 23 Mar 2017, 11:25
-- Wersja serwera: 5.7.17-0ubuntu0.16.04.1
-- Wersja PHP: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `Project_CL_Homework_Library`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Book`
--

CREATE TABLE `Book` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `Book`
--

INSERT INTO `Book` (`id`, `name`, `author`, `description`) VALUES
(56, 'Życie na pełnej petardzie czyli wiara, polędwica i miłość', 'Jan Kaczkowski, Piotr Żyłka', 'Książka nagrodzona tytułem Książki Roku 2015 lubimyczytać.pl w kategorii Autobiografia, biografia, wspomnienia. Jeden z najbardziej lubianych polskich księży w rozmowie życia. Ceniony za swój autent...'),
(57, 'Światło między oceanami', 'M.L. Stedman', 'Poruszająca opowieść o niszczycielskiej sile niewłaściwych wyborów. O złych decyzjach dobrych ludzi. O szczęściu, z którego tak trudno zrezygnować… Rok 1920. Tom Sherbourne, inżynier z Sydney, wciąż...'),
(58, 'Przeznaczeni', 'Katarzyna Grochola', 'Poruszająca opowieść o niszczycielskiej sile niewłaściwych wyborów. O złych decyzjach dobrych ludzi. O szczęściu, z którego tak trudno zrezygnować… Rok 1920. Tom Sherbourne, inżynier z Sydney, wciąż... Do biblioteczki  Kup książkę'),
(59, 'Wotum nieufności', 'Remigiusz Mróz', 'Marszałek sejmu, Daria Seyda, budzi się w pokoju hotelowym, nie pamiętając, jak się w nim znalazła ani co się z nią działo przez ostatnich dziesięć godzin. Jest przekonana, że stała się ofiarą manipul...'),
(60, 'Sto milionów dolarów', 'Lee Child', 'Rok 1996. Jack Reacher nadal służy w wojsku i w ciągu jednego dnia otrzymuje medal, po czym niczym uczniak zostaje odesłany do szkoły. W szkolnej klasie zastaje dwóch mężczyzn: agenta FBI oraz anality...'),
(61, 'Dasz radę. Ostatnia rozmowa', 'Joanna Podsadecka, Jan Kaczkowski', 'Był inspiracją dla milionów ludzi - wierzących i niewierzących. Każdy, kto go słuchał, czuł: on mnie rozumie. Ksiądz Jan nie oferował tanich rad ani łatwych pocieszeń. Swoim życiem mówił: nie odpuszcz...');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Book`
--
ALTER TABLE `Book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
