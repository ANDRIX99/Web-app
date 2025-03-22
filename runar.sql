-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 22, 2025 alle 22:54
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `runar`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `item`
--

CREATE TABLE `item` (
  `IdItem` int(11) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `item`
--

INSERT INTO `item` (`IdItem`, `Nome`) VALUES
(1, 'Andrea'),
(2, 'pasta'),
(3, 'farina'),
(4, 'acqua'),
(5, 'zucchero'),
(6, 'colorante nero'),
(7, 'caffellatte'),
(8, 'caffe'),
(9, 'latte'),
(10, 'pizza'),
(11, 'pomodoro'),
(12, 'mozzarella');

-- --------------------------------------------------------

--
-- Struttura della tabella `itemdetail`
--

CREATE TABLE `itemdetail` (
  `IdItemDetail` int(11) NOT NULL,
  `ItemId` int(11) DEFAULT NULL,
  `Amount` float DEFAULT NULL,
  `IdItem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `itemdetail`
--

INSERT INTO `itemdetail` (`IdItemDetail`, `ItemId`, `Amount`, `IdItem`) VALUES
(7, 0, 50, 2),
(8, 2, 10, 4),
(9, 2, 10, 3),
(12, 0, 50, 7),
(15, 7, 25, 8),
(16, 7, 25, 9),
(17, 0, 100, 10),
(18, 10, 50, 11),
(19, 10, 50, 12);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`IdItem`);

--
-- Indici per le tabelle `itemdetail`
--
ALTER TABLE `itemdetail`
  ADD PRIMARY KEY (`IdItemDetail`),
  ADD KEY `IdItem` (`IdItem`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `item`
--
ALTER TABLE `item`
  MODIFY `IdItem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `itemdetail`
--
ALTER TABLE `itemdetail`
  MODIFY `IdItemDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `itemdetail`
--
ALTER TABLE `itemdetail`
  ADD CONSTRAINT `itemdetail_ibfk_1` FOREIGN KEY (`IdItem`) REFERENCES `item` (`IdItem`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
