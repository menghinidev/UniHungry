-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 02, 2019 alle 17:44
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

-- --------------------------------------------------------

--
-- Struttura della tabella `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `telefono` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `telefono` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `fornitore`
--

CREATE TABLE `fornitore` (
  `id_fornitore` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `telefono` char(10) NOT NULL,
  `nome_fornitore` varchar(50) NOT NULL,
  `descrizione` text NOT NULL,
  `descrizione_breve` char(50) NOT NULL,
  `logo` varchar(200) NOT NULL,
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
-- Struttura della tabella `modifica`
--

CREATE TABLE `modifica` (
  `id_modifica` int(11) NOT NULL,
  `oggetto` char(30) NOT NULL,
  `descrizione` text NOT NULL,
  `query` text,
  `approvata` tinyint(1) DEFAULT NULL,
  `id_admin` int(11) NOT NULL,
  `id_fornitore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `notifica`
--

CREATE TABLE `notifica` (
  `id_notifica` int(11) NOT NULL,
  `testo` tinytext NOT NULL,
  `visualizzata` tinyint(1) NOT NULL,
  `per_utente` tinyint(1) NOT NULL,
  `id_fornitore` int(11) NOT NULL,
  `id_ordine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `orario_giornaliero`
--

CREATE TABLE `orario_giornaliero` (
  `id_fornitore` int(11) NOT NULL,
  `giorno_settimana` enum('lunedì','martedì','mercoledì','giovedì','venerdì','sabato','domenica') NOT NULL,
  `apertura` time NOT NULL,
  `chiusura` time NOT NULL,
  `inizio_pausa` time DEFAULT NULL,
  `fine_pausa` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `ordinazione`
--

CREATE TABLE `ordinazione` (
  `id_prodotto` int(11) NOT NULL,
  `id_ordine` int(11) NOT NULL,
  `quantità` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE `ordine` (
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
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `id_prodotto` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `descrizione` varchar(100) NOT NULL,
  `prezzo_unitario` decimal(4,2) NOT NULL,
  `immagine` varchar(100) NOT NULL,
  `ingredienti` text NOT NULL,
  `id_fornitore` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`nome`);

--
-- Indici per le tabelle `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indici per le tabelle `fornitore`
--
ALTER TABLE `fornitore`
  ADD PRIMARY KEY (`id_fornitore`);

--
-- Indici per le tabelle `modifica`
--
ALTER TABLE `modifica`
  ADD PRIMARY KEY (`id_modifica`);

--
-- Indici per le tabelle `notifica`
--
ALTER TABLE `notifica`
  ADD PRIMARY KEY (`id_notifica`);

--
-- Indici per le tabelle `orario_giornaliero`
--
ALTER TABLE `orario_giornaliero`
  ADD PRIMARY KEY (`id_fornitore`,`giorno_settimana`);

--
-- Indici per le tabelle `ordinazione`
--
ALTER TABLE `ordinazione`
  ADD PRIMARY KEY (`id_ordine`,`id_prodotto`);

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`id_ordine`);

--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`id_prodotto`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `fornitore`
--
ALTER TABLE `fornitore`
  MODIFY `id_fornitore` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `modifica`
--
ALTER TABLE `modifica`
  MODIFY `id_modifica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `notifica`
--
ALTER TABLE `notifica`
  MODIFY `id_notifica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `ordine`
--
ALTER TABLE `ordine`
  MODIFY `id_ordine` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `id_prodotto` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
