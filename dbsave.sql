-- MySQL dump 10.16  Distrib 10.1.44-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: newworld
-- ------------------------------------------------------
-- Server version	10.1.44-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrateur` (
  `adminId` int(11) NOT NULL,
  `superAdmin` tinyint(1) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`adminId`),
  KEY `userId` (`userId`),
  CONSTRAINT `administrateur_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `utilisateur` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrateur`
--

LOCK TABLES `administrateur` WRITE;
/*!40000 ALTER TABLE `administrateur` DISABLE KEYS */;
INSERT INTO `administrateur` VALUES (1,0,1);
/*!40000 ALTER TABLE `administrateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `cliId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `cliRue` varchar(80) DEFAULT NULL,
  `cliCP` char(5) DEFAULT NULL,
  `cliVille` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`cliId`),
  KEY `userId` (`userId`),
  CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `utilisateur` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,3,'boulevard Longchamps','05000','GAP'),(2,1,'boulevard Longchamps','05000','GAP');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commandes` (
  `commandeId` int(11) NOT NULL,
  `libellecommandes` varchar(25) DEFAULT NULL,
  `cliId` int(11) NOT NULL,
  `produitId` int(11) NOT NULL,
  PRIMARY KEY (`commandeId`),
  KEY `cliId` (`cliId`),
  KEY `produitId` (`produitId`),
  CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`cliId`) REFERENCES `clients` (`cliId`),
  CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`produitId`) REFERENCES `produits` (`produitId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commandes`
--

LOCK TABLES `commandes` WRITE;
/*!40000 ALTER TABLE `commandes` DISABLE KEYS */;
/*!40000 ALTER TABLE `commandes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pointRelai`
--

DROP TABLE IF EXISTS `pointRelai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pointRelai` (
  `relaiId` int(11) NOT NULL,
  `relaiNom` varchar(25) DEFAULT NULL,
  `relaiPays` varchar(50) DEFAULT NULL,
  `relaiVille` varchar(50) DEFAULT NULL,
  `relaiCP` varchar(5) DEFAULT NULL,
  `relaiAdresse` varchar(80) DEFAULT NULL,
  `relaiDateOuverture` datetime DEFAULT NULL,
  `relaiDateFermeture` datetime DEFAULT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`relaiId`),
  KEY `userId` (`userId`),
  CONSTRAINT `pointRelai_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `utilisateur` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pointRelai`
--

LOCK TABLES `pointRelai` WRITE;
/*!40000 ALTER TABLE `pointRelai` DISABLE KEYS */;
INSERT INTO `pointRelai` VALUES (1,'Relai1','FRANCE','GAP','05000','6 rue des remparts','2019-11-07 15:29:29','2019-11-07 15:29:29',4),(2,'Relai2','FRANCE','Tallars','05000','48 rue de la pousterle','2019-11-05 00:00:00','2019-11-15 00:00:00',5);
/*!40000 ALTER TABLE `pointRelai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producteurs`
--

DROP TABLE IF EXISTS `producteurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producteurs` (
  `prodId` int(11) NOT NULL,
  `prodnomEnt` varchar(50) DEFAULT NULL,
  `prodActivite` varchar(50) DEFAULT NULL,
  `prodAdresse` varchar(50) DEFAULT NULL,
  `prodPays` varchar(50) DEFAULT NULL,
  `prodVille` varchar(50) DEFAULT NULL,
  `prodCP` varchar(5) DEFAULT NULL,
  `prodSIREN` varchar(50) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`prodId`),
  KEY `userId` (`userId`),
  CONSTRAINT `producteurs_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `utilisateur` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producteurs`
--

LOCK TABLES `producteurs` WRITE;
/*!40000 ALTER TABLE `producteurs` DISABLE KEYS */;
INSERT INTO `producteurs` VALUES (1,'Le chat qui fume','Commerçant','6 rue des remparts','France','05000','Gap','166862025423',1),(2,'AgriBio','Agriculteur','lieu-dit l\'olivette','France','05000','Gap','45324564135456',1),(3,'La poissonerie','Bouché','Lieu dit l\'olivette','FRANCE','Valernes','04200','154581245421',2);
/*!40000 ALTER TABLE `producteurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produits`
--

DROP TABLE IF EXISTS `produits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produits` (
  `produitId` int(11) NOT NULL AUTO_INCREMENT,
  `produitLib` varchar(50) DEFAULT NULL,
  `produitDesc` varchar(50) DEFAULT NULL,
  `produitImg` varchar(50) DEFAULT NULL,
  `produitPU` float DEFAULT NULL,
  `produitQuantite` int(11) DEFAULT NULL,
  `produitValid` int(11) DEFAULT NULL,
  `prodId` int(11) NOT NULL,
  `typeProduitId` int(11) NOT NULL,
  PRIMARY KEY (`produitId`),
  KEY `prodId` (`prodId`),
  KEY `typeProduitId` (`typeProduitId`),
  CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`prodId`) REFERENCES `producteurs` (`prodId`),
  CONSTRAINT `produits_ibfk_2` FOREIGN KEY (`typeProduitId`) REFERENCES `typeProduit` (`typeProduitId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produits`
--

LOCK TABLES `produits` WRITE;
/*!40000 ALTER TABLE `produits` DISABLE KEYS */;
INSERT INTO `produits` VALUES (5,'Poulet fermier','Miam !','poulet-fermier.jpg',7,18,0,1,1);
/*!40000 ALTER TABLE `produits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rayons`
--

DROP TABLE IF EXISTS `rayons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rayons` (
  `rayonId` int(11) NOT NULL,
  `rayonLib` varchar(50) DEFAULT NULL,
  `rayonImg` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`rayonId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rayons`
--

LOCK TABLES `rayons` WRITE;
/*!40000 ALTER TABLE `rayons` DISABLE KEYS */;
INSERT INTO `rayons` VALUES (1,'Bio','bio.png'),(2,'Viandes Poissons','viandes.png'),(3,'Fruits Légumes','fruits-legumes.png'),(4,'Pains Pâtisseries','pains.png'),(5,'Frais','frais.png'),(6,'Surgelés','surgeles.png'),(7,'Epicerie Salée','epicerie-salee.png'),(8,'Epicerie Sucrée','epicerie-sucree.png'),(9,'Boissons','boissons.png'),(10,'Bébé','bebe.png'),(11,'Hygiène Beauté','hygiène-beaute.png'),(12,'Entretien Nettoyage','entretien-nettoyage.png'),(13,'Animalerie','animalerie.png');
/*!40000 ALTER TABLE `rayons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `roleId` int(11) NOT NULL,
  `roleLib` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'administrateur'),(2,'producteur'),(3,'client'),(4,'point relai');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `selection`
--

DROP TABLE IF EXISTS `selection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `selection` (
  `relaiId` int(11) NOT NULL,
  `cliId` int(11) NOT NULL,
  PRIMARY KEY (`relaiId`,`cliId`),
  KEY `cliId` (`cliId`),
  CONSTRAINT `selection_ibfk_1` FOREIGN KEY (`relaiId`) REFERENCES `pointRelai` (`relaiId`),
  CONSTRAINT `selection_ibfk_2` FOREIGN KEY (`cliId`) REFERENCES `clients` (`cliId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `selection`
--

LOCK TABLES `selection` WRITE;
/*!40000 ALTER TABLE `selection` DISABLE KEYS */;
INSERT INTO `selection` VALUES (1,1),(1,2),(2,2);
/*!40000 ALTER TABLE `selection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typeProduit`
--

DROP TABLE IF EXISTS `typeProduit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typeProduit` (
  `typeProduitId` int(11) NOT NULL AUTO_INCREMENT,
  `typeProduitLib` varchar(25) DEFAULT NULL,
  `rayonId` int(11) NOT NULL,
  `prodId` int(11) NOT NULL,
  PRIMARY KEY (`typeProduitId`),
  KEY `rayonId` (`rayonId`),
  KEY `typeProduit_ibfk_2` (`prodId`),
  CONSTRAINT `typeProduit_ibfk_1` FOREIGN KEY (`rayonId`) REFERENCES `rayons` (`rayonId`),
  CONSTRAINT `typeProduit_ibfk_2` FOREIGN KEY (`prodId`) REFERENCES `producteurs` (`prodId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typeProduit`
--

LOCK TABLES `typeProduit` WRITE;
/*!40000 ALTER TABLE `typeProduit` DISABLE KEYS */;
INSERT INTO `typeProduit` VALUES (1,'viande blanche',2,1);
/*!40000 ALTER TABLE `typeProduit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateur` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userNom` varchar(50) DEFAULT NULL,
  `userPrenom` varchar(50) DEFAULT NULL,
  `userPseudo` varchar(80) NOT NULL,
  `userEmail` varchar(50) DEFAULT NULL,
  `userTelFixe` varchar(10) DEFAULT NULL,
  `userTelPort` varchar(10) DEFAULT NULL,
  `userPasswd` varchar(50) DEFAULT NULL,
  `userRole` int(11) DEFAULT NULL,
  `userDateInscription` date DEFAULT NULL,
  `userKey` varchar(50) DEFAULT NULL,
  `userConfirm` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  KEY `userRole` (`userRole`),
  CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`userRole`) REFERENCES `role` (`roleId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,'AUTHEMAN','Victor','vautheman','authirard.victor@gmail.com',NULL,'0649259506','ij4udh1A*',1,'2019-10-17','5654623215213',1),(2,'BREGEARD','Rémi','remib','remib@gmail.com','0612345678','0612345678','ij4udh1A*',2,'2019-11-14','1245488764',1),(3,'COMITI','Léo','comitiLeo','comiti.leo@yahoo.fr','0612345678','0612345678','ij4udh1A*',3,'2019-11-05','2359877412456',1),(4,'LE PIVERT','Julie','patate','lpjulie@gmail.com','0612345678','0612345678','ij4udh1A*',4,'2019-11-06','2359856451',1),(5,'GRANIER','Nicolas','nico','pandalas@gmail.com','0612345678','0612345678','ij4udh1A*',4,'2019-11-14','1597624876',1);
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-02 11:55:33
