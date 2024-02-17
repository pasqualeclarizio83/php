-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Gen 22, 2024 alle 22:30
-- Versione del server: 5.7.42-0ubuntu0.18.04.1
-- Versione PHP: 7.2.24-0ubuntu0.18.04.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_esempi`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Citta`
--

CREATE TABLE `Citta` (
  `ID` int(11) NOT NULL,
  `NomeCitta` varchar(50) DEFAULT NULL,
  `Provincia` varchar(50) DEFAULT NULL,
  `Latitudine` decimal(9,6) DEFAULT NULL,
  `Longitudine` decimal(9,6) DEFAULT NULL,
  `CAP` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dump dei dati per la tabella `Citta`
--

INSERT INTO `Citta` (`ID`, `NomeCitta`, `Provincia`, `Latitudine`, `Longitudine`, `CAP`) VALUES
(1, 'Capurso', 'Bari', '0.000000', '0.000000', '70010'),
(2, 'Roma', 'Roma', '0.000000', '0.000000', '00042');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Citta`
--
ALTER TABLE `Citta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CAP` (`CAP`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Citta`
--
ALTER TABLE `Citta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `Citta`
--
ALTER TABLE `Citta`
  ADD CONSTRAINT `Citta_ibfk_1` FOREIGN KEY (`CAP`) REFERENCES `CAP` (`CAP`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
