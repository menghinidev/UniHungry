-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 08, 2019 alle 18:12
-- Versione del server: 10.1.37-MariaDB
-- Versione PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unihungry`
--

DELIMITER $$
--
-- Procedure
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `unlock_user` (IN `id` INT)  NO SQL
BEGIN

UPDATE users SET locked=0 WHERE user_id = id;
DELETE FROM login_attempts WHERE user_id = id;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struttura della tabella `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `telefono` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `categorie`
--

CREATE TABLE `categorie` (
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `clienti`
--

CREATE TABLE `clienti` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `telefono` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `clienti`
--

INSERT INTO `clienti` (`id_cliente`, `nome`, `cognome`, `telefono`) VALUES
(1, 'Mario', 'Rossi', '123456789');

-- --------------------------------------------------------

--
-- Struttura della tabella `fornitori`
--

CREATE TABLE `fornitori` (
  `id_fornitore` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `telefono` char(10) NOT NULL,
  `nome_fornitore` varchar(50) NOT NULL,
  `descrizione` text,
  `descrizione_breve` char(50) NOT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `indirizzo` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `login_attempts`
--

CREATE TABLE `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `modifiche`
--

CREATE TABLE `modifiche` (
  `id_modifica` int(11) NOT NULL,
  `oggetto` char(100) NOT NULL,
  `descrizione` text NOT NULL,
  `query` text,
  `approvata` tinyint(1) DEFAULT NULL,
  `id_fornitore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `notifiche`
--

CREATE TABLE `notifiche` (
  `id_notifica` int(11) NOT NULL,
  `testo` tinytext NOT NULL,
  `visualizzata` tinyint(1) NOT NULL,
  `per_utente` tinyint(1) NOT NULL,
  `id_fornitore` int(11) NOT NULL,
  `id_ordine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `orari_giornalieri`
--

CREATE TABLE `orari_giornalieri` (
  `id_fornitore` int(11) NOT NULL,
  `giorno_settimana` enum('lunedì','martedì','mercoledì','giovedì','venerdì','sabato','domenica') NOT NULL,
  `apertura` time NOT NULL,
  `chiusura` time NOT NULL,
  `inizio_pausa` time DEFAULT NULL,
  `fine_pausa` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `ordinazioni`
--

CREATE TABLE `ordinazioni` (
  `id_prodotto` int(11) NOT NULL,
  `id_ordine` int(11) NOT NULL,
  `quantità` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `ordini`
--

CREATE TABLE `ordini` (
  `id_ordine` int(11) NOT NULL,
  `data` date NOT NULL,
  `ora_sottomissione` time NOT NULL,
  `ora_richiesta` time DEFAULT NULL,
  `luogo_ritiro` varchar(100) NOT NULL,
  `stato_ordine` enum('accettato','in consegna','consegnato','rifiutato','ricevuto') NOT NULL,
  `pagato` tinyint(1) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

CREATE TABLE `prodotti` (
  `id_prodotto` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `descrizione` varchar(100) NOT NULL,
  `prezzo_unitario` decimal(4,2) NOT NULL,
  `immagine` varchar(100) NOT NULL,
  `ingredienti` text NOT NULL,
  `id_fornitore` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `user_type` enum('Admin','Cliente','Fornitore') NOT NULL,
  `locked` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `salt`, `user_type`, `locked`) VALUES
(1, 'mariorossi@mail.com', 'c4fda3327216d581e8838198d278bbcb7b1c4b36c24e6a8d9fa1fe5f8c49d2adcaee8f52149500048e8c64043878775d49e4b58c55f7a79b6774ac1bbc0c8ef3', '83e1c74edcf51151c08e993812b83320147c134014d9ce1cfd4d4a2f2e157635ccdf14709ebdb91857f9aa8cd52c5f63c28f28ba85de2ad50b1e8cfba43d3760', 'Cliente', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indici per le tabelle `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`nome`);

--
-- Indici per le tabelle `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indici per le tabelle `fornitori`
--
ALTER TABLE `fornitori`
  ADD PRIMARY KEY (`id_fornitore`);

--
-- Indici per le tabelle `modifiche`
--
ALTER TABLE `modifiche`
  ADD PRIMARY KEY (`id_modifica`);

--
-- Indici per le tabelle `notifiche`
--
ALTER TABLE `notifiche`
  ADD PRIMARY KEY (`id_notifica`);

--
-- Indici per le tabelle `orari_giornalieri`
--
ALTER TABLE `orari_giornalieri`
  ADD PRIMARY KEY (`id_fornitore`,`giorno_settimana`);

--
-- Indici per le tabelle `ordinazioni`
--
ALTER TABLE `ordinazioni`
  ADD PRIMARY KEY (`id_ordine`,`id_prodotto`);

--
-- Indici per le tabelle `ordini`
--
ALTER TABLE `ordini`
  ADD PRIMARY KEY (`id_ordine`);

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id_prodotto`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `modifiche`
--
ALTER TABLE `modifiche`
  MODIFY `id_modifica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `notifiche`
--
ALTER TABLE `notifiche`
  MODIFY `id_notifica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `ordini`
--
ALTER TABLE `ordini`
  MODIFY `id_ordine` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `id_prodotto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
