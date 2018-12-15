-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 15, 2018 alle 17:29
-- Versione del server: 10.1.37-MariaDB
-- Versione PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybluefinder`
--
CREATE DATABASE IF NOT EXISTS `mybluefinder` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mybluefinder`;

-- --------------------------------------------------------

--
-- Struttura della tabella `availabilities`
--
-- Creazione: Dic 15, 2018 alle 16:22
--

DROP TABLE IF EXISTS `availabilities`;
CREATE TABLE `availabilities` (
  `id` int(4) NOT NULL,
  `date` date NOT NULL,
  `availability` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Svuota la tabella prima dell'inserimento `availabilities`
--

TRUNCATE TABLE `availabilities`;
-- --------------------------------------------------------

--
-- Struttura della tabella `seaports`
--
-- Creazione: Dic 15, 2018 alle 16:25
--

DROP TABLE IF EXISTS `seaports`;
CREATE TABLE `seaports` (
  `id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `geocode_lang` varchar(255) NOT NULL,
  `geocode_long` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Svuota la tabella prima dell'inserimento `seaports`
--

TRUNCATE TABLE `seaports`;
-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--
-- Creazione: Dic 15, 2018 alle 16:23
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Svuota la tabella prima dell'inserimento `users`
--

TRUNCATE TABLE `users`;
--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `availabilities`
--
ALTER TABLE `availabilities`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `seaports`
--
ALTER TABLE `seaports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `availabilities`
--
ALTER TABLE `availabilities`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `seaports`
--
ALTER TABLE `seaports`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `seaports`
--
ALTER TABLE `seaports`
  ADD CONSTRAINT `seaports_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
