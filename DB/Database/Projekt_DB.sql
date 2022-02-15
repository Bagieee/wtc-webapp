

create Table tblRaum
(
    raumId int not null AUTO_INCREMENT PRIMARY KEY,
    raumBezeichnung varchar(50) not null
);

create Table tblTisch
(
    tischId int not null AUTO_INCREMENT PRIMARY KEY,
    tischRaumId int not null,
    tischNummer int not null
    
);

create Table tblScan
(
    scanId int not null AUTO_INCREMENT PRIMARY KEY,
    scanTischId int not null,
    scanErgebniss varchar(50) not null,
    scanTime timestamp not null
);

create Table tblKommentar
(
    kommentarId int not null AUTO_INCREMENT PRIMARY KEY,
    kommentarTischId int not null,
    kommentarName varchar(50) not null,
    kommentarText varchar(50) not null,
    kommentarTime timestamp not null
);


alter table tblTisch add Constraint fk_Tisch_Raum foreign key(tischRaumId) references tblRaum(raumId);
alter table tblScan add Constraint fk_Scan_Tisch foreign key(scanTischId) references tblTisch(tischId);
alter table tblKommentar add Constraint fk_Kommentar_Tisch foreign key(kommentarTischId) references tblTisch(tischId);
