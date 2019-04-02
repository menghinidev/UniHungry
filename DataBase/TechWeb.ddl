-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec  4 2018              
-- * Generation date: Mon Apr  1 17:13:12 2019 
-- * LUN file: C:\Users\samuele.burattini\Desktop\TechWeb.lun 
-- * Schema: FoodCampusLOGICO/1-1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database FoodCampusLOGICO;
use FoodCampusLOGICO;


-- Tables Section
-- _____________ 

create table ADMIN (
     id_admin char(1) not null,
     nome char(1) not null,
     cognome char(1) not null,
     email char(1) not null,
     password char(1) not null,
     telefono char(1) not null,
     constraint IDADMIN primary key (id_admin));

create table CATEGORIA (
     nome char(1) not null,
     constraint IDCATEGORIA primary key (nome));

create table CLIENTE (
     id_cliente char(1) not null,
     nome char(1) not null,
     cognome char(1) not null,
     email char(1) not null,
     password char(1) not null,
     telefono char(1) not null,
     constraint IDCLIENTE primary key (id_cliente));

create table FORNITORE (
     id_fornitore char(1) not null,
     nome char(1) not null,
     cognome char(1) not null,
     email char(1) not null,
     password char(1) not null,
     telefono char(1) not null,
     nome_fornitore char(1) not null,
     descrizione char(1) not null,
     descrizione_breve char(1) not null,
     logo char(1),
     constraint IDFORNITORE primary key (id_fornitore));

create table MODIFICA (
     id_modifica char(1) not null,
     oggetto char(1) not null,
     descrizione char(1) not null,
     query char(1),
     approvata char(1) not null,
     id_admin char(1) not null,
     id_fornitore char(1) not null,
     constraint IDMODIFICA primary key (id_modifica));

create table ORARIO_GIORNALIERO (
     id_fornitore char(1) not null,
     giorno_settimana char(1) not null,
     apertura char(1) not null,
     chiusura char(1) not null,
     inizio_pausa char(1) not null,
     fine_pausa char(1) not null,
     constraint IDORARIO_GIORNALIERO primary key (id_fornitore, giorno_settimana));

create table NOTIFICA (
     id_notifica char(1) not null,
     testo char(1) not null,
     visualizzata char(1) not null,
     per_utente char not null,
     id_fornitore char(1) not null,
     id_ordine char(1) not null,
     constraint IDNOTIFICA primary key (id_notifica));

create table ORDINAZIONE (
     id_prodotto char(1) not null,
     id_ordine char(1) not null,
     quantità int not null,
     constraint IDORDINAZIONE primary key (id_ordine, id_prodotto));

create table ORDINE (
     id_ordine char(1) not null,
     data char(1) not null,
     ora_sottomissione char(1) not null,
     ora_richiesta char(1),
     luogo_ritiro char(1) not null,
     stato_ordine char(1) not null,
     pagato char not null,
     id_cliente char(1) not null,
     constraint IDORDINE_ID primary key (id_ordine));

create table PRODOTTO (
     id_prodotto char(1) not null,
     nome char(1) not null,
     descrizione char(1) not null,
     prezzo_unitario char(1) not null,
     immagine char(1) not null,
     ingredienti char(1) not null,
     id_fornitore char(1) not null,
     categoria char(1) not null,
     constraint IDPRODOTTO primary key (id_prodotto));


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

