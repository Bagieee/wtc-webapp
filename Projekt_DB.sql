create database WTC;
go

use WTC
go

create Table tblRaum
(
    raumId int not null IDENTITY(1,1) PRIMARY KEY,
    raumBezeichnung varchar(50) not null
);

create Table tblTisch
(
    tischId int not null IDENTITY(1,1) PRIMARY KEY,
    tischRaumId int not null,
    tischNummer int not null
    
);

create Table tblScan
(
    scanId int not null IDENTITY(1,1) PRIMARY KEY,
    scanTischId int not null,
    scanErgebniss varchar(50) not null,
    scanTime smalldatetime not null
);

create Table tblKommentar
(
    kommentarId int not null IDENTITY(1,1) PRIMARY KEY,
    kommentarTischId int not null,
    kommentarName varchar(50) not null,
    kommentarText ntext not null,
    kommentarTime smalldatetime not null
);
go

alter table tblTisch add Constraint fk_Tisch_Raum foreign key(tischRaumId) references tblRaum(raumId);
alter table tblScan add Constraint fk_Scan_Tisch foreign key(scanTischId) references tblTisch(tischId);
alter table tblKommentar add Constraint fk_Kommentar_Tisch foreign key(kommentarTischId) references tblTisch(tischId);
go