CREATE TABLE `tblkommentar` (
  `kommentarId` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `kommentarTischId` int(11) NOT NULL,
  `kommentarName` varchar(50) NOT NULL,
  `kommentarText` varchar(50) NOT NULL,
  `kommentarTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

CREATE TABLE `tblpic` (
  `picId` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `picUrl` varchar(100) NOT NULL,
  `picRaumId` int(11) NOT NULL
);

INSERT INTO `tblpic` (`picUrl`, `picRaumId`) VALUES
('/Bilder/raum1', 1),
('/Bilder/raum2', 2),
('/Bilder/raum3', 3);

CREATE TABLE `tblraum` (
  `raumId` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `raumBezeichnung` varchar(50) NOT NULL
);

INSERT INTO `tblraum` (`raumBezeichnung`) VALUES
('Raum 1'),
('Raum 2'),
('Raum 3');

CREATE TABLE `tblscan` (
  `scanId` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `scanName` varchar(50) NOT NULL,
  `scanTischId` int(11) NOT NULL,
  `scanErgebniss` tinyint(1) NOT NULL,
  `scanKommentar` varchar(250) DEFAULT NULL,
  `scanTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

CREATE TABLE `tbltisch` (
  `tischId` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `tischRaumId` int(11) NOT NULL,
  `tischNummer` int(11) NOT NULL
);

INSERT INTO `tbltisch` (`tischRaumId`, `tischNummer`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(3, 17),
(3, 18),
(3, 19);

ALTER TABLE `tblkommentar`
  ADD CONSTRAINT `fk_Kommentar_Tisch` FOREIGN KEY (`kommentarTischId`) REFERENCES `tbltisch` (`tischId`);

ALTER TABLE `tblpic`
  ADD CONSTRAINT `fk_Pic_Raum` FOREIGN KEY (`picRaumId`) REFERENCES `tblraum` (`raumId`);

ALTER TABLE `tblscan`
  ADD CONSTRAINT `fk_Scan_Tisch` FOREIGN KEY (`scanTischId`) REFERENCES `tbltisch` (`tischId`);

ALTER TABLE `tbltisch`
  ADD CONSTRAINT `fk_Tisch_Raum` FOREIGN KEY (`tischRaumId`) REFERENCES `tblraum` (`raumId`);