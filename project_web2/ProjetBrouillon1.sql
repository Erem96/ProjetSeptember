/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 8.0.21 : Database - projectfinal
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`projectfinal` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `projectfinal`;

/*Table structure for table `commandes` */

DROP TABLE IF EXISTS `commandes`;

CREATE TABLE `commandes` (
  `refCommande` int NOT NULL AUTO_INCREMENT,
  `creationDate` date DEFAULT NULL,
  `LastModifDateTime` datetime DEFAULT NULL,
  `NumberLines` int DEFAULT NULL,
  `total` float DEFAULT NULL,
  `refAcheteur` int DEFAULT NULL,
  `AcheteurName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`refCommande`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `commandes` */

insert  into `commandes`(`refCommande`,`creationDate`,`LastModifDateTime`,`NumberLines`,`total`,`refAcheteur`,`AcheteurName`) values 
(5,'2021-03-08',NULL,1,15.9,1,'Alexisa Scailquin'),
(6,'2021-03-08',NULL,1,15.9,1,'Alexisa Scailquin'),
(7,'2021-03-08',NULL,1,15.9,2,'Machin Jeremy'),
(8,'2021-03-08',NULL,0,0,0,NULL),
(9,'2021-03-08',NULL,0,0,0,NULL),
(10,'2021-03-08',NULL,0,0,0,NULL),
(11,'2021-03-08',NULL,0,0,0,NULL),
(12,'2021-03-08',NULL,0,0,0,NULL),
(13,'2021-03-08',NULL,0,0,0,NULL),
(14,'2021-03-08',NULL,0,0,0,NULL),
(15,'2021-03-08',NULL,0,0,0,NULL),
(16,'2021-03-08',NULL,0,0,0,NULL),
(17,'2021-03-08',NULL,0,0,0,NULL),
(18,'2021-03-08',NULL,1,80,0,NULL),
(19,'2021-03-09',NULL,1,31.8,0,NULL);

/*Table structure for table `factures` */

DROP TABLE IF EXISTS `factures`;

CREATE TABLE `factures` (
  `refFacture` int NOT NULL AUTO_INCREMENT,
  `total` float DEFAULT NULL,
  `nbreLignes` int DEFAULT NULL,
  `refAcheteur` int DEFAULT NULL,
  `nomAcheteur` varchar(50) DEFAULT NULL,
  `dateAchat` date DEFAULT NULL,
  PRIMARY KEY (`refFacture`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `factures` */

insert  into `factures`(`refFacture`,`total`,`nbreLignes`,`refAcheteur`,`nomAcheteur`,`dateAchat`) values 
(1,950316,6,NULL,NULL,'2021-01-27');

/*Table structure for table `journal` */

DROP TABLE IF EXISTS `journal`;

CREATE TABLE `journal` (
  `OperationRef` int NOT NULL AUTO_INCREMENT,
  `OperationType` varchar(50) DEFAULT NULL,
  `ConcernedTable` varchar(50) DEFAULT NULL,
  `refModifiedObject` int DEFAULT NULL,
  `UserRef` int DEFAULT NULL,
  `operationDescription` varchar(1000) DEFAULT NULL,
  `operationDate` date DEFAULT NULL,
  PRIMARY KEY (`OperationRef`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `journal` */

insert  into `journal`(`OperationRef`,`OperationType`,`ConcernedTable`,`refModifiedObject`,`UserRef`,`operationDescription`,`operationDate`) values 
(1,'insert','personnes',1,1,'','2021-01-27'),
(2,'insert','personnes',2,2,'','2021-01-27'),
(3,'insert','personnes',3,1,'','2021-01-27'),
(4,'Update','Personnes',3,3,'set nom =Fiskuset prenom =Bruset pseudo =Fibreset adresseMail =Fisk@gmail.comset motDePasse =Fib','2021-01-27'),
(5,'Update','Personnes',3,1,'set nom =Fiskiset prenom =Bruset pseudo =Fibreset adresseMail =Fisk@gmail.comset motDePasse =Fib','2021-01-27'),
(6,'Read','Personnes',0,1,'','2021-01-27'),
(7,'readFiche','personne',2,1,'','2021-01-27'),
(8,'connection','personne',1,1,'','2021-01-27'),
(9,'connection','personne',1,1,'','2021-01-27'),
(10,'insert','produits',2,1,'','2021-01-27'),
(11,'insert','produits',3,2,'','2021-01-27'),
(12,'Update','produit',2,1,'set nomProduit =Caviar proutproutset descriptionProduit =test1set PictureLink =','2021-01-27'),
(13,'Read','Produits',0,1,'Read all existant products','2021-01-27'),
(14,'Read','Produits',2,1,'','2021-01-27'),
(15,'Read','Produits',2,2,'','2021-01-27'),
(16,'Read','Stocks',0,1,'','2021-01-27'),
(17,'Insert','commandes',1,1,'','2021-01-27'),
(18,'Update','commande',1,1,'set total=99999.8046875','2021-01-27'),
(19,'Insert','lignescommandes',1,1,'','2021-01-27'),
(20,'Insert','commandes',2,1,'','2021-01-27'),
(21,'Update','commande',2,1,'set total=149999.703125','2021-01-27'),
(22,'Insert','lignescommandes',2,1,'','2021-01-27'),
(23,'Update','commande',1,1,'set total=249999.515625','2021-01-27'),
(24,'update','lignescommandes',1,1,'Set qtt =30','2021-01-27'),
(25,'Update','commande',1,1,'set total=250158.515625','2021-01-27'),
(26,'Insert','lignescommandes',3,1,'','2021-01-27'),
(27,'Insert','commandes',3,1,'','2021-01-27'),
(28,'Update','commande',3,1,'set total=99999.8046875','2021-01-27'),
(29,'Insert','lignescommandes',4,1,'','2021-01-27'),
(30,'Insert','commandes',4,1,'','2021-01-27'),
(31,'Update','commande',4,1,'set total=149999.703125','2021-01-27'),
(32,'Insert','lignescommandes',5,1,'','2021-01-27'),
(33,'Update','commande',1,1,'set total=400158.21875','2021-01-27'),
(34,'update','lignescommandes',1,1,'Set qtt =30','2021-01-27'),
(35,'Update','commande',1,1,'set total=400317.21875','2021-01-27'),
(36,'update','lignescommandes',3,1,'Set qtt =30','2021-01-27'),
(37,'Read','Commandes',1,1,'Read all existants commandes concerning this buyer','2021-01-27'),
(38,'Read','LignesCommandes',1,1,'Read all existants lignes concerning this command','2021-01-27'),
(39,'Update','Facture',1,NULL,'put total=399999.21875','2021-01-27'),
(40,'Update','commande',1,1,'modify numberLine refCommande','2021-01-27'),
(41,'Update','Stock for',2,1,'remove 80unit','2021-01-27'),
(42,'Update','Facture',1,NULL,'set total=549998.9375','2021-01-27'),
(43,'Update','commande',2,1,'modify numberLine refCommande','2021-01-27'),
(44,'Delete','commande',2,NULL,'','2021-01-27'),
(45,'Update','Stock for',2,1,'remove 30unit','2021-01-27'),
(46,'Update','Facture',1,NULL,'set total=550316.9375','2021-01-27'),
(47,'Update','commande',1,1,'modify numberLine refCommande','2021-01-27'),
(48,'Delete','commande',1,NULL,'','2021-01-27'),
(49,'Update','Stock for',1,1,'remove 60unit','2021-01-27'),
(50,'Update','Facture',1,NULL,'set total=650316.75','2021-01-27'),
(51,'Update','commande',3,1,'modify numberLine refCommande','2021-01-27'),
(52,'Delete','commande',3,NULL,'','2021-01-27'),
(53,'Update','Stock for',2,1,'remove 20unit','2021-01-27'),
(54,'Update','Facture',1,NULL,'set total=800316.4375','2021-01-27'),
(55,'Update','commande',4,1,'modify numberLine refCommande','2021-01-27'),
(56,'Delete','commande',4,NULL,'','2021-01-27'),
(57,'Update','Stock for',2,1,'remove 30unit','2021-01-27'),
(58,'Update','Facture',1,NULL,'set total=950316.125','2021-01-27'),
(59,'Update','Stock for',2,1,'remove 30unit','2021-01-27'),
(60,'Delete','LigneCommandes',1,1,'Delete all ligne from the refCommande in the reference','2021-01-27'),
(61,'Validate','Commande',1,1,'','2021-01-27'),
(62,'connection','personne',1,1,'','2021-02-01'),
(63,'Read','Personnes',0,1,'','2021-02-01'),
(64,'Read','Personnes',0,1,'','2021-02-01'),
(65,'Read','Personnes',0,1,'','2021-02-01'),
(66,'Read','Personnes',0,1,'','2021-02-01'),
(67,'Read','Produits',0,1,'Read all existant products','2021-02-01'),
(68,'Read','Commandes',1,1,'Read all existants commandes concerning this buyer','2021-02-01'),
(69,'delete','lignesCommande',0,0,'Suppression des commandes liées a ce client','2021-02-28'),
(70,'Insert','commandes',5,1,'','2021-03-08'),
(71,'Update','commande',5,1,'set total=15.90000057220459','2021-03-08'),
(72,'Insert','lignescommandes',6,1,'','2021-03-08'),
(73,'Insert','commandes',6,1,'','2021-03-08'),
(74,'Update','commande',6,1,'set total=15.90000057220459','2021-03-08'),
(75,'Insert','lignescommandes',7,1,'','2021-03-08'),
(76,'Insert','commandes',7,2,'','2021-03-08'),
(77,'Update','commande',7,2,'set total=15.90000057220459','2021-03-08'),
(78,'Insert','lignescommandes',8,2,'','2021-03-08'),
(79,'Update','commande',18,0,'set total=80','2021-03-08'),
(80,'Update','commande',19,0,'set total=31.80000114440918','2021-03-09');

/*Table structure for table `lignescommandes` */

DROP TABLE IF EXISTS `lignescommandes`;

CREATE TABLE `lignescommandes` (
  `refLignes` int NOT NULL AUTO_INCREMENT,
  `refProduit` int DEFAULT NULL,
  `refCommande` int DEFAULT NULL,
  `QTT` int DEFAULT NULL,
  `encoderRef` int DEFAULT NULL,
  `CreationDate` date DEFAULT NULL,
  `IpAdress` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`refLignes`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `lignescommandes` */

insert  into `lignescommandes`(`refLignes`,`refProduit`,`refCommande`,`QTT`,`encoderRef`,`CreationDate`,`IpAdress`) values 
(6,1,5,3,1,'2021-03-08',NULL),
(7,1,6,3,1,'2021-03-08',NULL),
(8,1,7,3,2,'2021-03-08',NULL),
(9,4,18,8,NULL,NULL,NULL),
(10,1,19,6,NULL,NULL,NULL);

/*Table structure for table `lignesfactures` */

DROP TABLE IF EXISTS `lignesfactures`;

CREATE TABLE `lignesfactures` (
  `refLignes` int DEFAULT NULL,
  `refProduit` int DEFAULT NULL,
  `refFacture` int DEFAULT NULL,
  `QTT` int DEFAULT NULL,
  `confirmationDate` date DEFAULT NULL,
  `encoderRef` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `lignesfactures` */

insert  into `lignesfactures`(`refLignes`,`refProduit`,`refFacture`,`QTT`,`confirmationDate`,`encoderRef`) values 
(NULL,2,1,80,'2021-01-27',NULL),
(NULL,2,1,30,'2021-01-27',NULL),
(NULL,1,1,60,'2021-01-27',NULL),
(NULL,2,1,20,'2021-01-27',NULL),
(NULL,2,1,30,'2021-01-27',NULL),
(NULL,2,1,30,'2021-01-27',NULL);

/*Table structure for table `personnes` */

DROP TABLE IF EXISTS `personnes`;

CREATE TABLE `personnes` (
  `refPersonnes` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `adresseMail` varchar(50) DEFAULT NULL,
  `motDePasse` varchar(20) DEFAULT NULL,
  `statut` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`refPersonnes`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `personnes` */

insert  into `personnes`(`refPersonnes`,`nom`,`prenom`,`pseudo`,`adresseMail`,`motDePasse`,`statut`) values 
(1,'Alexisa','Scailquin','Epialtes','ScailquinAlexis@gmail.com','21101994','seller'),
(2,'Machin','Jeremy','MaJe','Machin@gmail.com','abcde','client'),
(3,'Fiski','Bru','Fibre','Fisk@gmail.com','Fib','client');

/*Table structure for table `produits` */

DROP TABLE IF EXISTS `produits`;

CREATE TABLE `produits` (
  `refProduit` int NOT NULL AUTO_INCREMENT,
  `nomProduit` varchar(50) DEFAULT NULL,
  `descriptionProduit` varchar(300) DEFAULT NULL,
  `prixAchatParUnit` float DEFAULT NULL,
  `prixVenteParUnit` float DEFAULT NULL,
  `unit` varchar(10) DEFAULT NULL,
  `illustrationUrl` varchar(100) DEFAULT NULL,
  `dateEncodage` date DEFAULT NULL,
  `UserCreator` int DEFAULT NULL,
  PRIMARY KEY (`refProduit`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `produits` */

insert  into `produits`(`refProduit`,`nomProduit`,`descriptionProduit`,`prixAchatParUnit`,`prixVenteParUnit`,`unit`,`illustrationUrl`,`dateEncodage`,`UserCreator`) values 
(1,'Cafetiere','Une jolie cafetiere ou faire du cafe',2,5.3,'piece','Cafetiere.png','2021-01-27',1),
(2,'Caviara','test1',10,4999.99,'kg','caviar.png','2021-01-27',2),
(4,'bol','Descrvfdffdiption',5,10,'20','test.png','2021-03-01',NULL);

/*Table structure for table `stocks` */

DROP TABLE IF EXISTS `stocks`;

CREATE TABLE `stocks` (
  `refStock` int NOT NULL AUTO_INCREMENT,
  `refProduit` int DEFAULT NULL,
  `QTT` int DEFAULT NULL,
  PRIMARY KEY (`refStock`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `stocks` */

insert  into `stocks`(`refStock`,`refProduit`,`QTT`) values 
(1,2,-160);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
