-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec  4 2018              
-- * Generation date: Mon Apr  1 17:13:25 2019 
-- * LUN file: C:\Users\samuele.burattini\Desktop\TechWeb.lun 
-- * Schema: FoodCampusLOGICO/1-1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database UniHungry;
use UniHungry;


-- Tables Section
-- _____________ 

create table ADMIN (
     id_admin INT NOT NULL AUTO_INCREMENT,
     nome VARCHAR(20) not null,
     cognome VARCHAR(30) not null,
     email VARCHAR(50) not null,
     password CHAR(128) not null,
     salt CHAR(128) not null,
     telefono CHAR(10) not null,
     constraint IDADMIN primary key (id_admin));

create table CATEGORIA (
     nome VARCHAR(30)  not null,
     constraint IDCATEGORIA primary key (nome));

create table CLIENTE (
     id_cliente INT NOT NULL AUTO_INCREMENT,
     nome VARCHAR(20) not null,
     cognome VARCHAR(30) not null,
     email VARCHAR(50) not null,
     password CHAR(128) not null,
     salt CHAR(128) not null,
     telefono CHAR(10) not null,
     constraint IDCLIENTE primary key (id_cliente));

create table FORNITORE (
     id_fornitore INT NOT NULL AUTO_INCREMENT,     
     nome VARCHAR(20) not null,
     cognome VARCHAR(30) not null,
     email VARCHAR(50) not null,
     password CHAR(128) not null,
     salt CHAR(128) not null,
     telefono CHAR(10) not null,
     nome_fornitore VARCHAR(50) not null,
     descrizione TEXT not null,
     descrizione_breve char(50) not null,
     logo VARCHAR(200) not null,
     constraint IDFORNITORE primary key (id_fornitore));

create table MODIFICA (
     id_modifica INT NOT NULL AUTO_INCREMENT,
     oggetto char(30) not null,
     descrizione TEXT not null,
     query TEXT,
     approvata TINYINT(1),
     id_admin INT not null,
     id_fornitore INT not null,
     constraint IDMODIFICA primary key (id_modifica));

create table ORARIO_GIORNALIERO (
     id_fornitore INT not null,
     giorno_settimana ENUM('lunedì', 'martedì', 'mercoledì', 'giovedì', 'venerdì', 'sabato', 'domenica') not null,
     apertura TIME not null,
     chiusura TIME not null,
     inizio_pausa TIME,
     fine_pausa TIME,
     constraint IDORARIO_GIORNALIERO primary key (id_fornitore, giorno_settimana));

create table NOTIFICA (
     id_notifica INT NOT NULL AUTO_INCREMENT,
     testo TINYTEXT not null,
     visualizzata TINYINT(1) not null,
     per_utente TINYINT(1) not null,
     id_fornitore INT not null,
     id_ordine INT not null,
     constraint IDNOTIFICA primary key (id_notifica));

create table ORDINAZIONE (
     id_prodotto INT not null,
     id_ordine INT not null,
     quantità int not null,
     constraint IDORDINAZIONE primary key (id_ordine, id_prodotto));

create table ORDINE (
     id_ordine INT NOT NULL AUTO_INCREMENT,
     data DATE not null,
     ora_sottomissione TIME not null,
     ora_richiesta TIME,
     luogo_ritiro VARCHAR(100) not null,
     stato_ordine ENUM('accettato', 'in consegna', 'consegnato', 'rifiutato', 'ricevuto') not null,
     pagato TINYINT(1) not null,
     id_cliente INT not null,
     constraint IDORDINE_ID primary key (id_ordine));

create table PRODOTTO (
     id_prodotto INT NOT NULL AUTO_INCREMENT,
     nome VARCHAR(30) not null,
     descrizione VARCHAR(100) not null,
     prezzo_unitario DECIMAL(4,2) not null,
     immagine VARCHAR(100) not null,
     ingredienti TEXT not null,
     id_fornitore INT not null,
     categoria VARCHAR(30) not null,
     constraint IDPRODOTTO primary key (id_prodotto));

CREATE TABLE `login_attempts` (
  `user_id` INT(11) NOT NULL,
  `time` VARCHAR(30) NOT NULL 
);

-- Constraints Section
-- ___________________ 

alter table MODIFICA add constraint FKaccettazione
     foreign key (id_admin)
     references ADMIN (id_admin);

alter table MODIFICA add constraint FKrichiesta
     foreign key (id_fornitore)
     references FORNITORE (id_fornitore);

alter table ORARIO_GIORNALIERO add constraint FKorario_fornitore
     foreign key (id_fornitore)
     references FORNITORE (id_fornitore);

alter table NOTIFICA add constraint FKcomunicazione
     foreign key (id_fornitore)
     references FORNITORE (id_fornitore);

alter table NOTIFICA add constraint FKriferita_a
     foreign key (id_ordine)
     references ORDINE (id_ordine);

alter table ORDINAZIONE add constraint FKcom_ORD
     foreign key (id_ordine)
     references ORDINE (id_ordine);

alter table ORDINAZIONE add constraint FKcom_PRO
     foreign key (id_prodotto)
     references PRODOTTO (id_prodotto);

-- Not implemented
-- alter table ORDINE add constraint IDORDINE_CHK
--     check(exists(select * from ORDINAZIONE
--                  where ORDINAZIONE.id_ordine = id_ordine)); 

alter table ORDINE add constraint FKordinazione
     foreign key (id_cliente)
     references CLIENTE (id_cliente);

alter table PRODOTTO add constraint FKlistino
     foreign key (id_fornitore)
     references FORNITORE (id_fornitore);

alter table PRODOTTO add constraint FKappartenenza
     foreign key (categoria)
     references CATEGORIA (nome);


-- Index Section
-- _____________ 

