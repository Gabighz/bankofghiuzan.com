-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: finalproject
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

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
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currency` (
  `id` int(11) unsigned NOT NULL,
  `cur` varchar(255) NOT NULL,
  `amount` decimal(65,4) unsigned NOT NULL,
  PRIMARY KEY (`id`,`cur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currency`
--

LOCK TABLES `currency` WRITE;
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;
INSERT INTO `currency` VALUES (1,'EUR',1036.9600),(1,'GBP',2617.4232),(2,'GBP',1000.0000),(3,'GBP',1000.0000);
/*!40000 ALTER TABLE `currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `transaction` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (1,'DOMESTIC PAYMENT','2015-12-20 03:42:55','brocean1',100),(1,'DEPOSIT','2015-12-20 03:59:10','brocean',100);
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history-exchange`
--

DROP TABLE IF EXISTS `history-exchange`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history-exchange` (
  `id` int(11) unsigned NOT NULL,
  `amount` int(11) unsigned NOT NULL,
  `amount2` int(11) unsigned NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history-exchange`
--

LOCK TABLES `history-exchange` WRITE;
/*!40000 ALTER TABLE `history-exchange` DISABLE KEYS */;
INSERT INTO `history-exchange` VALUES (1,744,502,'2015-12-20 19:24:23','GBP to USD'),(1,66,72,'2015-12-20 19:27:15','USD to EUR'),(1,72,49,'2015-12-20 19:34:15','GBP to USD'),(1,100,67,'2015-12-20 19:39:53','GBP to USD'),(1,100,148,'2015-12-20 19:40:36','USD to GBP'),(1,100,137,'2015-12-20 21:15:34','EUR to GBP'),(1,100,137,'2015-12-20 21:16:02','GBP to EUR'),(1,100,137,'2015-12-20 21:56:39','GBP to EUR'),(1,100,137,'2015-12-20 21:56:47','EUR to GBP');
/*!40000 ALTER TABLE `history-exchange` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history-stock`
--

DROP TABLE IF EXISTS `history-stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history-stock` (
  `id` int(10) unsigned NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `shares` int(10) unsigned NOT NULL,
  `price` int(11) unsigned NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history-stock`
--

LOCK TABLES `history-stock` WRITE;
/*!40000 ALTER TABLE `history-stock` DISABLE KEYS */;
INSERT INTO `history-stock` VALUES (1,'IBM',10,1349,'2015-12-20 07:09:49','BUY'),(1,'IBM',10,1349,'2015-12-20 07:09:54','SALE'),(1,'GOOG',1,739,'2015-12-20 07:11:01','BUY'),(1,'IBM',10,1349,'2015-12-20 07:11:11','BUY'),(1,'FREE',1000,17,'2015-12-20 07:11:30','BUY'),(1,'FREE',1000,20,'2015-12-20 13:42:29','BUY'),(2,'FREE',1000,20,'2015-12-20 13:42:48','BUY'),(1,'FREE',1000,20,'2015-12-20 13:52:06','BUY'),(1,'IBM',10,1369,'2015-12-20 13:52:13','BUY'),(1,'GOOG',1,751,'2015-12-20 13:52:20','BUY'),(2,'FREE',1000,20,'2015-12-20 13:52:44','BUY');
/*!40000 ALTER TABLE `history-stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `places`
--

DROP TABLE IF EXISTS `places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `places` (
  `place_id` int(11) NOT NULL AUTO_INCREMENT,
  `place_fullname` varchar(255) NOT NULL,
  `place_name` varchar(180) NOT NULL,
  `latitude` decimal(7,4) NOT NULL,
  `longitude` decimal(7,4) NOT NULL,
  `accuracy` tinyint(4) NOT NULL,
  PRIMARY KEY (`place_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `places`
--

LOCK TABLES `places` WRITE;
/*!40000 ALTER TABLE `places` DISABLE KEYS */;
INSERT INTO `places` VALUES (1,'Bank of Ghiuzan subsidiary - Tudor Vladimirescu','sub1',47.1668,27.5945,6),(2,'Bank of Ghiuzan subsidiary - Podu ros','sub2',47.1508,27.5870,6),(3,'Bank of Ghiuzan ATM','atm1',47.1545,27.6062,6),(4,'Bank of Ghiuzan subsidiary - Negru Voda','sub3',44.4292,26.1051,6);
/*!40000 ALTER TABLE `places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolio-stock`
--

DROP TABLE IF EXISTS `portfolio-stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolio-stock` (
  `id` int(11) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `shares` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`,`symbol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio-stock`
--

LOCK TABLES `portfolio-stock` WRITE;
/*!40000 ALTER TABLE `portfolio-stock` DISABLE KEYS */;
INSERT INTO `portfolio-stock` VALUES (1,'FREE',1000),(1,'GOOG',1),(1,'IBM',10),(2,'FREE',1000);
/*!40000 ALTER TABLE `portfolio-stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `cash` decimal(65,4) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'brocean','$1$LukbVrmx$1C1xG8yS6d8/s..Eh/XDn/',10042.5176),(2,'brocean1','$1$m2ZM4gT2$P5.dTmET2su7iwoZDgvo71',10360.2000),(3,'brocean2','$1$vzHWGwrY$eXl8uZKXilp9tg93HMZ7t/',10000.0000);
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

-- Dump completed on 2015-12-24 17:04:36
