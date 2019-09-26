-- Base de donnée drive
-- 08/02/2019

-- mysql

-- Suppression des tables
DROP TABLE if exists produits;
DROP TABLE if exists rayons;
DROP TABLE if exists producteurs;
DROP TABLE if exists clients;
DROP TABLE if exists administrateur;
DROP TABLE if exists superAdministrateur;

-- Création des tables
CREATE TABLE producteurs(
  prodId int primary key not null auto_increment,
  prodNom varchar(50),
  prodPrenom varchar(50),
  prodEmail varchar(50),
  prodPw text,
  prodTelFix char(10) null,
  prodTelPort char(10),
  prodNomEnt varchar(50),
  prodActivite varchar(50),
  prodAdresse varchar(50),
  prodSIREN varchar(50),
  prodKey char(50),
  prodConfirme boolean
) ENGINE=innodb CHARSET=utf8;

CREATE TABLE clients(
  cliId int primary key not null auto_increment,
  cliNom varchar(50),
  cliPrenom varchar(50),
  cliEmail varchar(50),
  cliPw text,
  cliTelFix char(10) null,
  cliTelPort char(10) not null,
  cliKey char(50),
  cliConfirme boolean
) ENGINE=innodb CHARSET=utf8;

CREATE TABLE rayons(
  rayonId int not null auto_increment,
  prodId int, -- Appartient à quel producteur
  rayonLib varchar(20),
  rayonDesc text,
  rayonImg varchar(50),
  primary key (rayonId, prodId),
  foreign key (prodId) references producteurs(prodId)
)ENGINE=innodb CHARSET=utf8;

CREATE TABLE produits(
  produitId int primary key not null auto_increment,
  produitRayon int,
  produitLib varchar(20),
  produitDesc text,
  produitImg varchar(50),
  produitPU float,
  produitQuantite smallint,
  produitValid boolean,
  foreign key (produitRayon) references rayons(rayonId)
) ENGINE=innodb CHARSET=utf8;

CREATE TABLE administrateur(
  adminId int primary key not null auto_increment,
  adminNom varchar(20),
  adminUser varchar(20),
  adminPasswd text,
  adminMail text,
  adminTel char(10)
) ENGINE=innodb CHARSET=utf8;

CREATE TABLE superAdministrateur(
  supAdminId int primary key not null auto_increment,
  supAdminNom varchar(20),
  supAdminUser varchar(20),
  supAdminPasswd text,
  supAdminMail text,
  supAdminTel char(10)
) ENGINE=innodb CHARSET=utf8;
