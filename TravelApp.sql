CREATE DATABASE  IF NOT EXISTS `travel_exam` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `travel_exam`;
-- MySQL dump 10.13  Distrib 5.6.19, for osx10.7 (i386)
--
-- Host: 127.0.0.1    Database: travel_exam
-- ------------------------------------------------------
-- Server version	5.5.38

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
-- Table structure for table `joinups`
--

DROP TABLE IF EXISTS `joinups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `joinups` (
  `user_id` int(11) NOT NULL,
  `travel_id` int(11) NOT NULL,
  KEY `fk_joinups_users1_idx` (`user_id`),
  KEY `fk_joinups_travels1_idx` (`travel_id`),
  CONSTRAINT `fk_joinups_travels1` FOREIGN KEY (`travel_id`) REFERENCES `travels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_joinups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `joinups`
--

LOCK TABLES `joinups` WRITE;
/*!40000 ALTER TABLE `joinups` DISABLE KEYS */;
INSERT INTO `joinups` VALUES (3,7),(4,7),(4,10),(4,9),(3,9),(2,12),(5,7),(5,10);
/*!40000 ALTER TABLE `joinups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `travels`
--

DROP TABLE IF EXISTS `travels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `travels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `destination` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `date_from` datetime DEFAULT NULL,
  `date_to` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_travels_users_idx` (`user_id`),
  CONSTRAINT `fk_travels_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `travels`
--

LOCK TABLES `travels` WRITE;
/*!40000 ALTER TABLE `travels` DISABLE KEYS */;
INSERT INTO `travels` VALUES (7,1,'Seattle','Stuff 1','2016-06-25 00:00:00','2016-06-28 00:00:00','2016-06-25 22:31:15','2016-06-25 22:31:15'),(8,2,'Bellingham','Bellingjam!','2016-06-29 00:00:00','2016-07-02 00:00:00','2016-06-25 22:33:08','2016-06-25 22:33:08'),(9,2,'Bellevue','Steve Trip 2','2016-07-02 00:00:00','2016-07-06 00:00:00','2016-06-25 22:36:21','2016-06-25 22:36:21'),(10,1,'San Jose','Stuff 2','2016-07-01 00:00:00','2016-07-08 00:00:00','2016-06-25 22:36:57','2016-06-25 22:36:57'),(11,3,'Hawaii','FUN!','2016-06-28 00:00:00','2016-07-02 00:00:00','2016-06-25 23:10:07','2016-06-25 23:10:07'),(12,3,'Kauai','Hanalei','2016-07-21 00:00:00','2016-07-30 00:00:00','2016-06-25 23:33:20','2016-06-25 23:33:20'),(13,3,'Maui','It\'s MAUI!','2016-07-21 00:00:00','2016-07-30 00:00:00','2016-07-18 11:33:21','2016-07-18 11:33:21'),(14,5,'Iceland','Cool!','2016-08-04 00:00:00','2016-08-19 00:00:00','2016-07-28 15:05:04','2016-07-28 15:05:04');
/*!40000 ALTER TABLE `travels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `password_confirm` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Taylor','twing','11111111','11111111','2016-06-26 01:55:39','2016-06-26 01:55:39'),(2,'Steve','swing','11111111','11111111','2016-06-26 04:27:29','2016-06-26 04:27:29'),(3,'Joyce','jwing','11111111','11111111','2016-06-26 08:09:09','2016-06-26 08:09:09'),(4,'Yo-Yo Ma','yomama','11111111','11111111','2016-07-15 20:04:09','2016-07-15 20:04:09'),(5,'Erin','emoney','11111111','11111111','2016-07-29 00:01:28','2016-07-29 00:01:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-29 11:29:36
