-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Mrz 2022 um 09:00
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `wtc`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tblkommentar`
--

CREATE TABLE `tblkommentar` (
  `kommentarId` int(11) NOT NULL,
  `kommentarTischId` int(11) NOT NULL,
  `kommentarName` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `kommentarText` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `kommentarTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Daten für Tabelle `tblkommentar`
--

INSERT INTO `tblkommentar` (`kommentarId`, `kommentarTischId`, `kommentarName`, `kommentarText`, `kommentarTime`) VALUES
(1, 23, 'Sebastiani Isaac', 'Der Tisch ist an einer Ecke beschädigt.', '2022-01-31 13:35:18'),
(2, 4, 'Isz', '', '2022-01-31 18:33:25'),
(3, 4, 'Isz', '', '2022-01-31 18:33:38'),
(4, 4, 'Isz', '', '2022-01-31 18:33:52'),
(5, 4, 'Isz', '', '2022-01-31 18:33:53'),
(6, 4, 'Isz', '', '2022-01-31 18:34:12'),
(7, 4, 'dbsb', 'Gdhxb', '2022-01-31 18:35:57'),
(8, 3, 'Isaac', 'Tisch beschädigt', '2022-02-20 13:22:01'),
(9, 3, 'Felix', '1e', '2022-02-20 13:25:07'),
(10, 6, 'Sebastiani Isaac', 'Tisch Beschädigt', '2022-02-22 12:40:58');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tblpic`
--

CREATE TABLE `tblpic` (
  `picId` int(11) NOT NULL,
  `picUrl` varchar(100) COLLATE utf8_german2_ci NOT NULL,
  `picRaumId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `tblpic`
--

INSERT INTO `tblpic` (`picId`, `picUrl`, `picRaumId`) VALUES
(1, '/wtcg/Bilder/raum1.jpeg', 1),
(2, '/wtcg/Bilder/raum2.jpeg', 2),
(3, '/wtcg/Bilder/raum3.png', 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tblraum`
--

CREATE TABLE `tblraum` (
  `raumId` int(11) NOT NULL,
  `raumBezeichnung` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Daten für Tabelle `tblraum`
--

INSERT INTO `tblraum` (`raumId`, `raumBezeichnung`) VALUES
(1, 'Raum 1'),
(2, 'Raum 2'),
(3, 'Raum 3');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tblscan`
--

CREATE TABLE `tblscan` (
  `scanId` int(11) NOT NULL,
  `scanName` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `scanTischId` int(11) NOT NULL,
  `scanErgebniss` tinyint(1) NOT NULL,
  `scanKommentar` varchar(250) COLLATE utf8mb4_german2_ci DEFAULT NULL,
  `scanTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Daten für Tabelle `tblscan`
--

INSERT INTO `tblscan` (`scanId`, `scanName`, `scanTischId`, `scanErgebniss`, `scanKommentar`, `scanTime`) VALUES
(48, 'Sebastiani Isaac', 3, 1, NULL, '2022-02-22 12:29:47'),
(49, 'Sebastiani Isaac', 5, 1, NULL, '2022-02-22 12:39:25'),
(50, 'Sebastiani Isaac', 6, 0, 'Hammer, Schraubenzieher', '2022-02-22 12:40:07'),
(51, 'dhdhd', 23, 1, NULL, '2022-03-01 12:06:50');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbltisch`
--

CREATE TABLE `tbltisch` (
  `tischId` int(11) NOT NULL,
  `tischRaumId` int(11) NOT NULL,
  `tischNummer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Daten für Tabelle `tbltisch`
--

INSERT INTO `tbltisch` (`tischId`, `tischRaumId`, `tischNummer`) VALUES
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 2, 2),
(8, 2, 3),
(10, 2, 5),
(11, 2, 6),
(12, 3, 1),
(13, 3, 2),
(14, 3, 3),
(15, 3, 4),
(16, 3, 5),
(17, 3, 6),
(18, 3, 7),
(19, 3, 8),
(20, 1, 5),
(21, 1, 6),
(22, 1, 7),
(23, 1, 1),
(24, 1, 11),
(25, 1, 13);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tblkommentar`
--
ALTER TABLE `tblkommentar`
  ADD PRIMARY KEY (`kommentarId`),
  ADD KEY `fk_Kommentar_Tisch` (`kommentarTischId`);

--
-- Indizes für die Tabelle `tblpic`
--
ALTER TABLE `tblpic`
  ADD PRIMARY KEY (`picId`),
  ADD KEY `fk_Pic_Raum` (`picRaumId`);

--
-- Indizes für die Tabelle `tblraum`
--
ALTER TABLE `tblraum`
  ADD PRIMARY KEY (`raumId`);

--
-- Indizes für die Tabelle `tblscan`
--
ALTER TABLE `tblscan`
  ADD PRIMARY KEY (`scanId`),
  ADD KEY `fk_Scan_Tisch` (`scanTischId`);

--
-- Indizes für die Tabelle `tbltisch`
--
ALTER TABLE `tbltisch`
  ADD PRIMARY KEY (`tischId`),
  ADD KEY `fk_Tisch_Raum` (`tischRaumId`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tblkommentar`
--
ALTER TABLE `tblkommentar`
  MODIFY `kommentarId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `tblpic`
--
ALTER TABLE `tblpic`
  MODIFY `picId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `tblraum`
--
ALTER TABLE `tblraum`
  MODIFY `raumId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `tblscan`
--
ALTER TABLE `tblscan`
  MODIFY `scanId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT für Tabelle `tbltisch`
--
ALTER TABLE `tbltisch`
  MODIFY `tischId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `tblkommentar`
--
ALTER TABLE `tblkommentar`
  ADD CONSTRAINT `fk_Kommentar_Tisch` FOREIGN KEY (`kommentarTischId`) REFERENCES `tbltisch` (`tischId`);

--
-- Constraints der Tabelle `tblpic`
--
ALTER TABLE `tblpic`
  ADD CONSTRAINT `fk_Pic_Raum` FOREIGN KEY (`picRaumId`) REFERENCES `tblraum` (`raumId`);

--
-- Constraints der Tabelle `tblscan`
--
ALTER TABLE `tblscan`
  ADD CONSTRAINT `fk_Scan_Tisch` FOREIGN KEY (`scanTischId`) REFERENCES `tbltisch` (`tischId`);

--
-- Constraints der Tabelle `tbltisch`
--
ALTER TABLE `tbltisch`
  ADD CONSTRAINT `fk_Tisch_Raum` FOREIGN KEY (`tischRaumId`) REFERENCES `tblraum` (`raumId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
