-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: zoom
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1-log

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
-- Table structure for table `appt`
--

DROP TABLE IF EXISTS `appt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appt` (
  `userName` varchar(255) NOT NULL,
  `vin` varchar(255) NOT NULL,
  KEY `userName` (`userName`),
  KEY `vin` (`vin`),
  CONSTRAINT `appt_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `user` (`userName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appt`
--

LOCK TABLES `appt` WRITE;
/*!40000 ALTER TABLE `appt` DISABLE KEYS */;
/*!40000 ALTER TABLE `appt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cars` (
  `userName` varchar(255) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `vin` varchar(255) NOT NULL,
  PRIMARY KEY (`vin`),
  KEY `fk_userName` (`userName`),
  CONSTRAINT `fk_userName` FOREIGN KEY (`userName`) REFERENCES `user` (`userName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES ('Jdoe11','Honda','Civiv',2018,'blue','1JCCF87A5FT180431'),('Jdoe14','Toyota','Camry',1995,'black','1N4AB41DXWC732852'),('Jdoe14','Ford','Explorer',2018,'red','2GCEC19Z8L1159877'),('Jdoe12','BMW','S3',2004,'black','3B7HC13Z7TG112627'),('Jdoe13','Nissan','Altima',2007,'black','JH4DA3350HS000229'),('Jdoe11','Toyota','Camry',2012,'green','JH4NA1150MT000683'),('Jdoe13','Lexus','RC-500',2016,'silver','W06VR52R9WR220134');
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `userName` varchar(255) NOT NULL,
  `vin` varchar(255) NOT NULL,
  `comment` varchar(500) NOT NULL,
  KEY `userName` (`userName`),
  KEY `vin` (`vin`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `user` (`userName`),
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`vin`) REFERENCES `cars` (`vin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userName` varchar(255) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `type` varchar(1) NOT NULL,
  PRIMARY KEY (`userName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('Jdoe11','$2y$10$wYk86ZtKc8bb81N3isYOWuwFrnBqNwm0DltS3N0uT3O.by5Wi2P0.','Doe2','Jane2','janedoe2@mail.com','U'),('Jdoe12','$2y$10$LQfXZ9TbPztQYPXwVjGvSegpfTJMspDuUs2jZQeMFXE6U0taCU6s.','Doe2','Jane2','janedoe2@mail.com','A'),('Jdoe13','$2y$10$Ig/3Y36CRGeDJuMirRuIG.bCqP6IslSCnbC77xIPOiNXvD43JTRzm','Doe3','Jane3','janedoe3@mail.com','A'),('Jdoe14','$2y$10$j3ZhSEctXnMd.R/eeYdfOOg8QknJfYJ5C43w2PVmNVN7QfmUh0xXG','Doe4','Jane4','janedoe3@mail.com','U');
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

-- Dump completed on 2018-05-08 23:59:01
