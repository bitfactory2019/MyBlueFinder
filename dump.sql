-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: mybluefinder
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB

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
-- Table structure for table `availabilities`
--

DROP TABLE IF EXISTS `availabilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `availabilities` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `availability` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `availabilities`
--

LOCK TABLES `availabilities` WRITE;
/*!40000 ALTER TABLE `availabilities` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `availabilities` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `langs`
--

DROP TABLE IF EXISTS `langs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `langs` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `langs`
--

LOCK TABLES `langs` WRITE;
/*!40000 ALTER TABLE `langs` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `langs` VALUES (1,'Italiano','it'),(2,'English','en');
/*!40000 ALTER TABLE `langs` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `marinas`
--

DROP TABLE IF EXISTS `marinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marinas`
--

LOCK TABLES `marinas` WRITE;
/*!40000 ALTER TABLE `marinas` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `marinas` VALUES (1,'Sud Cantieri','Boatyard in Naples'),(2,'P&O Marinas','World class superyacht marinas'),(3,'Marina di Villasimius S.r.l.','Superyacht marina in Sardinia, Italy'),(4,'Port of Nice','A key hub on the French Riviera');
/*!40000 ALTER TABLE `marinas` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `marinas_files`
--

DROP TABLE IF EXISTS `marinas_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marinas_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marina_id` int(11) NOT NULL,
  `path` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `marina_id` (`marina_id`),
  CONSTRAINT `marinas_files_marina_id` FOREIGN KEY (`marina_id`) REFERENCES `marinas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marinas_files`
--

LOCK TABLES `marinas_files` WRITE;
/*!40000 ALTER TABLE `marinas_files` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `marinas_files` VALUES (1,1,'inc/images/marinas/sud-cantieri.jpg'),(2,2,'inc/images/marinas/p-o-marinas.jpg'),(3,3,'inc/images/marinas/marina-villasimius.jpg'),(4,4,'inc/images/marinas/port-of-nice.jpg');
/*!40000 ALTER TABLE `marinas_files` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `marinas_langs`
--

DROP TABLE IF EXISTS `marinas_langs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marinas_langs` (
  `marina_id` int(11) NOT NULL,
  `lang_id` int(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`marina_id`,`lang_id`),
  KEY `lang_id` (`lang_id`),
  KEY `marina_id` (`marina_id`),
  CONSTRAINT `marinas_langs_lang_id` FOREIGN KEY (`lang_id`) REFERENCES `langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `marinas_langs_marina_is` FOREIGN KEY (`marina_id`) REFERENCES `marinas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marinas_langs`
--

LOCK TABLES `marinas_langs` WRITE;
/*!40000 ALTER TABLE `marinas_langs` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `marinas_langs` VALUES (1,1,'Sud Cantieri','Boatyard in Naples'),(1,2,'Sud Cantieri','Boatyard in Naples'),(2,1,'P&O Marinas','World class superyacht marinas'),(2,2,'P&O Marinas','World class superyacht marinas'),(3,1,'Marina di Villasimius S.r.l.','Superyacht marina in Sardinia, Italy'),(3,2,'Marina di Villasimius S.r.l.','Superyacht marina in Sardinia, Italy'),(4,1,'Port of Nice','A key hub on the French Riviera'),(4,2,'Port of Nice','A key hub on the French Riviera');
/*!40000 ALTER TABLE `marinas_langs` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `marinas_services`
--

DROP TABLE IF EXISTS `marinas_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marinas_services` (
  `marina_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY (`marina_id`,`service_id`),
  KEY `marinas_services_service_id` (`service_id`),
  CONSTRAINT `marinas_services_marina_id` FOREIGN KEY (`marina_id`) REFERENCES `marinas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `marinas_services_service_id` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marinas_services`
--

LOCK TABLES `marinas_services` WRITE;
/*!40000 ALTER TABLE `marinas_services` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `marinas_services` VALUES (1,1),(1,2),(1,3),(1,4),(2,1),(2,2),(2,3),(2,4),(3,1),(3,2),(3,3),(3,4),(4,1),(4,2),(4,3),(4,4);
/*!40000 ALTER TABLE `marinas_services` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `seaports`
--

DROP TABLE IF EXISTS `seaports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seaports` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` int(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `geocode_lang` varchar(255) NOT NULL,
  `geocode_long` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `seaports_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seaports`
--

LOCK TABLES `seaports` WRITE;
/*!40000 ALTER TABLE `seaports` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `seaports` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('hotel','flight') NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `services` VALUES (1,'hotel','Servizio 1','Descrizione 1'),(2,'flight','Servizio 2','Descrizione 2'),(3,'hotel','Servizio 3','Descrizione 3'),(4,'flight','Servizio 4','Descrizione 4');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `services_langs`
--

DROP TABLE IF EXISTS `services_langs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services_langs` (
  `service_id` int(11) NOT NULL,
  `lang_id` int(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`service_id`,`lang_id`) USING BTREE,
  KEY `services_langs_lang_id` (`lang_id`),
  CONSTRAINT `services_langs_lang_id` FOREIGN KEY (`lang_id`) REFERENCES `langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `services_langs_service_id` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services_langs`
--

LOCK TABLES `services_langs` WRITE;
/*!40000 ALTER TABLE `services_langs` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `services_langs` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
commit;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-23 18:34:25
