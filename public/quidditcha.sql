-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: quidditch
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `broomstick`
--

DROP TABLE IF EXISTS `broomstick`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `broomstick` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(50) NOT NULL,
  `speed` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `broomstick`
--

LOCK TABLES `broomstick` WRITE;
/*!40000 ALTER TABLE `broomstick` DISABLE KEYS */;
INSERT INTO `broomstick` VALUES (1,'Nimbus 2000',190),(2,'Nimbus 2001',200),(3,'Eclair de Feu',240),(4,'Comète 260',125),(5,'Brossdur 11',100),(6,'Nimbus 1000',170);
/*!40000 ALTER TABLE `broomstick` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `titre` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'Adresse','Ecole de sorcellerie de Poudlard,\r\nGlenfinnan,\r\nEcosse'),(2,'Volière Hiboux','Poudlard\r\nVolière de la tour d\'astronomie'),(3,'e-mail','gryffondor@poudlard.uk');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateTimeGame` datetime NOT NULL,
  `idTeam1` int(11) NOT NULL,
  `score1` smallint(5) unsigned DEFAULT NULL,
  `idTeam2` int(11) NOT NULL,
  `score2` smallint(5) unsigned DEFAULT NULL,
  `idStadium` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_rencontre_id_stade` (`idStadium`),
  CONSTRAINT `FK_game_id_stadium` FOREIGN KEY (`idStadium`) REFERENCES `stadium` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game`
--

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` VALUES (1,'2017-11-04 15:00:00',1,170,2,60,1),(2,'2017-11-18 15:00:00',3,80,4,120,1),(3,'2018-01-06 15:00:00',2,180,3,60,1),(4,'2018-02-03 15:00:00',1,140,4,70,1),(5,'2018-05-05 15:00:00',2,NULL,4,NULL,1),(6,'2018-05-26 15:00:00',1,NULL,3,NULL,1);
/*!40000 ALTER TABLE `game` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player`
--

DROP TABLE IF EXISTS `player`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastName` varchar(50) DEFAULT NULL,
  `firstName` varchar(50) NOT NULL,
  `size` tinyint(4) unsigned NOT NULL,
  `birthDate` date NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `idPosition` int(11) NOT NULL,
  `idBroomstick` int(11) DEFAULT NULL,
  `idTeam` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_joueur_id_poste` (`idPosition`),
  KEY `FK_joueur_id_balai` (`idBroomstick`),
  KEY `FK_joueur_id_equipe` (`idTeam`),
  CONSTRAINT `FK_player_id_broomstick` FOREIGN KEY (`idBroomstick`) REFERENCES `broomstick` (`id`),
  CONSTRAINT `FK_player_id_position` FOREIGN KEY (`idPosition`) REFERENCES `position` (`id`),
  CONSTRAINT `FK_player_id_team` FOREIGN KEY (`idTeam`) REFERENCES `team` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player`
--

LOCK TABLES `player` WRITE;
/*!40000 ALTER TABLE `player` DISABLE KEYS */;
INSERT INTO `player` VALUES (1,'Potter','Harry',175,'1990-07-31','/assets/images/players/Harry_Potter.jpg',4,3,1),(2,'Dubois','Olivier',180,'1985-05-12','/assets/images/players/Olivier_Dubois.jpg',3,2,1),(3,'Weasley','Fred',185,'1987-03-09','/assets/images/players/Fred_Weasley.jpg',2,5,1),(4,'Weasley','George',185,'1987-03-09','/assets/images/players/George_Weasley.jpg',2,5,1),(5,'Johnson','Angelina',163,'1987-10-17','/assets/images/players/AngelinaJohnson.jpg',1,6,1),(6,'Weasley','Ginevra',161,'1991-08-11','/assets/images/players/Ginevra_Weasley.jpg',1,2,1),(7,'Weasley','Ron',185,'1990-08-25','/assets/images/players/Ron_Weasley.jpg',1,4,1);
/*!40000 ALTER TABLE `player` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `position`
--

LOCK TABLES `position` WRITE;
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `position` VALUES (1,'Poursuiveur'),(2,'Batteur'),(3,'Gardien'),(4,'Attrapeur');
/*!40000 ALTER TABLE `position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presentation`
--

DROP TABLE IF EXISTS `presentation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presentation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `picture1` varchar(255) DEFAULT NULL,
  `picture2` varchar(255) NOT NULL,
  `picture3` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presentation`
--

LOCK TABLES `presentation` WRITE;
/*!40000 ALTER TABLE `presentation` DISABLE KEYS */;
INSERT INTO `presentation` VALUES (1,'Notre histoire','But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.','/assets/images/lieu_1.jpg','/assets/images/lieu_2.jpg','/assets/images/lieu_3.jpg','/assets/images/hat.png'),(2,'Nos valeurs','But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.','/assets/images/pres_valeurs.jpg','/assets/images/pres_valeurs2.jpg','/assets/images/pres_valeurs3.jpg','/assets/images/marmite.svg'),(3,'Nos engagements','But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.','/assets/images/pres_engagements.jpg','/assets/images/pres_engagements2.jpg','/assets/images/pres_engagements3.jpg','/assets/images/harryp.png');
/*!40000 ALTER TABLE `presentation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stadium`
--

DROP TABLE IF EXISTS `stadium`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stadium` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stadium`
--

LOCK TABLES `stadium` WRITE;
/*!40000 ALTER TABLE `stadium` DISABLE KEYS */;
INSERT INTO `stadium` VALUES (1,'Poudlard',3000);
/*!40000 ALTER TABLE `stadium` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `idStadium` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_equipe_id_stade` (`idStadium`),
  CONSTRAINT `FK_team_id_stadium` FOREIGN KEY (`idStadium`) REFERENCES `stadium` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (1,'Gryffondor',1,'/assets/images/teams/Gryffondor.png'),(2,'Serpentard',1,'/assets/images/teams/Serpentard.png'),(3,'Serdaigle',1,'/assets/images/teams/Serdaigle.png'),(4,'Poufsouffle',1,'/assets/images/teams/Poufsouffle.png');
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-25 12:07:45
