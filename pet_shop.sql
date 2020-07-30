-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 31. Jul 2020 um 01:15
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `pet_shop_codereview11`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pet_shop`
--

CREATE TABLE `pet_shop` (
  `Pet_ID` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `age` int(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `type` varchar(25) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `hobbies` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `pet_shop`
--

INSERT INTO `pet_shop` (`Pet_ID`, `name`, `image`, `age`, `description`, `type`, `address`, `zip_code`, `city`, `hobbies`, `price`) VALUES
(1, 'sunshine', 'https://i.pinimg.com/originals/4f/f3/d9/4ff3d925ffdf2abb3ce0982cfa420a6e.jpg', 11, 'cute little bunny', 'small', 'Praterstrasse 17', 1160, 'Vienna', 'jumping,eating', 65),
(2, 'sunny', 'https://i0.wp.com/wildbeimwild.com/wp-content/uploads/2019/06/Paarungsverhalten-afrikanischer-Elefanten.jpg', 10, 'funny', 'senior', 'Musterstrasse', 1170, 'Vienna', 'funny', 165),
(3, 'White Baby-Tiger', 'https://i.pinimg.com/originals/89/3e/ca/893eca02fbb2c0cbaeca530d94b5a378.jpg', 1, 'Cute little baby tiger', 'small', 'Herrengasse 22', 1010, 'Vienna', 'eating,sleeping', 200),
(4, 'Baby Panda', 'https://i.pinimg.com/originals/93/fa/c0/93fac00692c54e9df0327528967f4741.jpg', 1, 'Cute Panda', 'big', 'Pandagasse 1', 1020, 'Vienna', 'looking cute, sleeping', 150),
(5, 'Puma', 'https://i.pinimg.com/originals/78/78/88/7878889ad2db7c58b86049143198db3e.jpg', 9, 'Cool Puma', 'senior', 'Pumagasse 8', 1150, 'Vienna', 'running, eating', 650),
(6, 'Welpe', 'https://www.fast-alles.net/pictures/11dcd0846e3c8de6ab0662515743f.jpg', 1, 'cute puppy', 'junior', 'Welpengasse 6', 1050, 'Vienna', 'just beeing cute', 350),
(7, 'Clay', 'https://www.animalabs.com/update/wp-content/uploads/2015/10/German-Shepherd.jpg', 9, 'Amazing Dog', 'senior', 'Avenue Street 45', 1010, 'Vienna', 'running', 1500);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `pet_shop`
--
ALTER TABLE `pet_shop`
  ADD PRIMARY KEY (`Pet_ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `pet_shop`
--
ALTER TABLE `pet_shop`
  MODIFY `Pet_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
