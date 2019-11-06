-- Base de donnée drive
-- 08/02/2019

-- mysql

-- Suppression des tables
DROP DATABASE newworld;
CREATE DATABASE newworld;

USE newworld;

CREATE TABLE `rayons`(`rayonId` INTEGER,`rayonLib` VARCHAR(50),`rayonDesc` VARCHAR(50),`rayonImg` VARCHAR(50),`rayonValid` INTEGER,primary key(`rayonId`));

CREATE TABLE `typeProduit`(`typeProduitId` INTEGER,`typeProduitLib` VARCHAR(25),`rayonId` INTEGER NOT NULL, foreign key (`rayonId`) references rayons(`rayonId`),primary key(`typeProduitId`));

CREATE TABLE `role`(`roleId` INTEGER,`roleLib` VARCHAR(80),primary key(`roleId`));

CREATE TABLE `utilisateur`(`userId` INTEGER,`userNom` VARCHAR(50),`userPrenom` VARCHAR(50),`userEmail` VARCHAR(50),`userTelFixe` VARCHAR(10),`userTelPort` VARCHAR(10),`userPasswd` VARCHAR(50),`userRole` INTEGER,`userDateInscription` date,`userKey` VARCHAR(50),`userConfirm` BOOL, foreign key (`userRole`) references role(`roleId`),primary key(`userId`));

CREATE TABLE `producteurs`(`prodId` INTEGER,`prodnomEnt` VARCHAR(50),`prodActivite` VARCHAR(50),`prodAdresse` VARCHAR(50),`prodPays` VARCHAR(50),`prodVille` VARCHAR(50),`prodCP` VARCHAR(5),`prodSIREN` VARCHAR(50),`userId` INTEGER NOT NULL, foreign key (`userId`) references utilisateur(`userId`),primary key(`prodId`));

CREATE TABLE `clients`(`cliId` INTEGER,`userId` INTEGER NOT NULL, foreign key (`userId`) references utilisateur(`userId`),primary key(`cliId`));

CREATE TABLE `produits`(`produitId` INTEGER,`produitLib` VARCHAR(50),`produitDesc` VARCHAR(50),`produitImg` VARCHAR(50),`produitPU` FLOAT,`produitQuantite` INTEGER,`produitValid` INTEGER,`prodId` INTEGER NOT NULL,`typeProduitId` INTEGER NOT NULL, foreign key (`prodId`) references producteurs(`prodId`), foreign key (`typeProduitId`) references typeProduit(`typeProduitId`),primary key(`produitId`));

CREATE TABLE `administrateur`(`adminId` INTEGER,`superAdmin` BOOL,`userId` INTEGER NOT NULL, foreign key (`userId`) references utilisateur(`userId`),primary key(`adminId`));

CREATE TABLE `pointRelai`(`relaiId` INTEGER,`relaiNom` VARCHAR(25),`relaiPays` VARCHAR(50),`relaiVille` VARCHAR(50),`relaiCP` VARCHAR(5),`relaiAdresse` VARCHAR(80),`relaiDateOuverture` date,`relaiDateFermeture` date,`userId` INTEGER NOT NULL, foreign key (`userId`) references utilisateur(`userId`),primary key(`relaiId`));

CREATE TABLE `commandes`(`commandeId` INTEGER,`libellecommandes` VARCHAR(25),`cliId` INTEGER NOT NULL,`produitId` INTEGER NOT NULL, foreign key (`cliId`) references clients(`cliId`), foreign key (`produitId`) references produits(`produitId`),primary key(`commandeId`));

CREATE TABLE `choix`(`relaiId` INTEGER NOT NULL,`prodId` INTEGER NOT NULL, foreign key (`relaiId`) references pointRelai(`relaiId`), foreign key (`prodId`) references producteurs(`prodId`),primary key(`relaiId`,`prodId`));

CREATE TABLE `selection`(`relaiId` INTEGER NOT NULL,`cliId` INTEGER NOT NULL, foreign key (`relaiId`) references pointRelai(`relaiId`), foreign key (`cliId`) references clients(`cliId`),primary key(`relaiId`,`cliId`));


-- Création des tables
/*CREATE TABLE producteurs(
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
  rayonValid tinyint,
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
  produitValid tinyint,
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

CREATE TABLE pointRelai(
  relaiId int primary key not null auto_increment,
  relaiNom varchar(50),
  relaiPays varchar(50),
  relaiVille varchar(50),
  relaiCP char(5),
  relaiAdresse varchar(80),
  relaiDateOuverture date,
  relaiDateFermeture date
) ENGINE=innodb CHARSET=utf8;

CREATE TABLE commandes(
  commandeId int primary key not null auto_increment,
  commande
)*/
