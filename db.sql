-- MySQL dump 10.16  Distrib 10.3.7-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: quidditch
-- ------------------------------------------------------
-- Server version	10.3.7-MariaDB-1:10.3.7+maria~artful

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
-- Current Database: `quidditch`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `quidditch` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `quidditch`;

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
INSERT INTO `contact` VALUES (1,'Adresse','Ecole de sorcellerie de Poudlard,\r\nGlenfinnan,\r\nEcosse'),(2,'Volière Hiboux','Poudlard\r\nVolière de la tour d\'astronomie'),(3,'e-mail','gryffondor@poudlard.fr');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game`
--

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` VALUES (1,'2017-11-04 15:00:00',1,170,2,60),(2,'2017-11-18 15:00:00',3,80,4,120),(3,'2018-01-06 15:00:00',2,180,3,60),(4,'2018-02-03 15:00:00',1,140,4,70),(5,'2018-05-05 15:00:00',2,120,4,10),(7,'2018-04-29 01:00:00',1,NULL,3,NULL),(8,'2018-05-01 05:32:00',4,NULL,3,NULL),(12,'2017-01-03 10:00:00',1,250,4,5),(13,'2018-11-21 08:00:00',1,NULL,3,NULL),(14,'2016-11-23 18:00:00',2,250,4,80),(15,'2018-05-18 00:04:00',2,120,3,20);
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
INSERT INTO `player` VALUES (1,'Potter','Harry',175,'1990-07-31','/assets/images/players/1.jpg',4,3,1),(2,'Dubois','Olivier',180,'1985-06-13','/assets/images/players/2.jpg',3,5,1),(3,'Weasley','Fred',185,'1987-03-09','/assets/images/players/3.jpg',2,5,1),(4,'Weasley','George',185,'1987-03-09','/assets/images/players/4.jpg',2,5,1),(5,'Johnson','Angelina',163,'1987-10-17','/assets/images/players/5.jpg',1,6,1),(6,'Weasley','Ginevra',161,'1991-08-11','/assets/images/players/6.jpg',1,2,1),(7,'Weasley','Ron',185,'1990-08-25','/assets/images/players/7.jpg',1,4,1);
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
INSERT INTO `presentation` VALUES (1,'Historique','<p><span style=\"text-decoration: underline;\">Ut enim quisque</span><strong> sibi plurimum</strong> confidit et ut quisque <em>maxime</em> virtute et sapientia sic munitus est, ut nullo egeat suaque omnia in se ipso posita iudicet, ita in <em>amicitiis</em> expetendis colendisque maxime excellit. Quid enim? Africanus indigens mei? Minime hercule! ac ne ego <strong>quidem illius;</strong> sed ego admiratione quadam virtutis eius, ille vicissim opinione fortasse non nulla, quam de meis moribus habebat, me dilexit; auxit benevolentiam <strong>consuetudo</strong>. Sed quamquam utilitates multae et magnae consecutae sunt, non sunt tamen ab earum spe causae diligendi profectae.</p>','/assets/images/presentation/11.jpg','/assets/images/presentation/12.jpg','/assets/images/presentation/13.jpg','/assets/images/presentation/hat.png'),(2,'Nos valeurs','<p>Quam quidem partem <strong>accusationis</strong> admiratus sum et moleste tuli potissimum esse Atratino datam. Neque enim decebat neque aetas illa postulabat neque, id quod animadvertere poteratis, pudor patiebatur optimi adulescentis in tali illum oratione versari. Vellem aliquis ex <span style=\"text-decoration: underline;\">vobis robustioribus</span> hunc male dicendi locum suscepisset; aliquanto liberius et fortius et magis more nostro refutaremus istam male dicendi licentiam. Tecum, Atratine, agam lenius, quod et pudor tuus <strong>moderatur orationi</strong> meae et meum erga te parentemque tuum beneficium tueri debeo.</p>','/assets/images/presentation/21.jpg','/assets/images/presentation/22.jpg','/assets/images/presentation/23.jpg','/assets/images/presentation/marmite.svg'),(3,'Nos engagements','<p>Post haec Gallus Hierapolim profecturus ut <span style=\"text-decoration: underline;\">expeditioni</span> specie tenus adesset, Antiochensi<strong> plebi suppliciter</strong> obsecranti ut inediae dispelleret metum, quae per multas difficilisque causas adfore iam sperabatur, non ut mos est principibus, quorum diffusa potestas localibus subinde medetur aerumnis, disponi quicquam statuit vel ex provinciis alimenta transferri conterminis, sed consularem Syriae <strong>Theophilum</strong> prope adstantem ultima metuenti multitudini dedit id adsidue replicando quod invito rectore nullus egere poterit victu.</p>','/assets/images/presentation/31.jpg','/assets/images/presentation/32.jpg','/assets/images/presentation/33.jpg','/assets/images/presentation/harryp.png');
/*!40000 ALTER TABLE `presentation` ENABLE KEYS */;
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

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(32) NOT NULL,
  `failedTry` tinyint(4) DEFAULT NULL,
  `lockedUntil` datetime DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3',3,'2018-06-29 10:24:00','gryffondor.quidditch@gmail.com');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

