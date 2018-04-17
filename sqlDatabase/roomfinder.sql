-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: roomfinder
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
-- Table structure for table `flat_detail`
--

DROP TABLE IF EXISTS `flat_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flat_detail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `contact` varchar(15) DEFAULT NULL,
  `available` int(1) DEFAULT '0',
  `flat_address` varchar(1000) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `no_rooms` varchar(10) DEFAULT NULL,
  `rent` int(10) DEFAULT NULL,
  `area` varchar(10) DEFAULT NULL,
  `overlooking` varchar(1000) DEFAULT NULL,
  `balconies` varchar(10) DEFAULT NULL,
  `bathrooms` varchar(10) DEFAULT NULL,
  `detail` varchar(1000) DEFAULT NULL,
  `flat_for` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flat_detail`
--

LOCK TABLES `flat_detail` WRITE;
/*!40000 ALTER TABLE `flat_detail` DISABLE KEYS */;
INSERT INTO `flat_detail` VALUES (1,'8527568626',1,'asds','Muzaffarnagar','Uttar Pradesh','3',150000,'1500','sljkfnsk d','1','2','<pre style=\"color:white;background:rgba(0,0,0,.3);font-family:Georgia;;font-size:18px;\">jsbj sdhc</pre>','For Sale only');
/*!40000 ALTER TABLE `flat_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hostel_detail`
--

DROP TABLE IF EXISTS `hostel_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hostel_detail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `contact` varchar(15) DEFAULT NULL,
  `available` int(1) DEFAULT '0',
  `hostel_for` varchar(100) DEFAULT NULL,
  `hostel_location` varchar(100) DEFAULT NULL,
  `hostel_city` varchar(100) DEFAULT NULL,
  `hostel_state` varchar(100) DEFAULT NULL,
  `hostel_near_by` varchar(100) DEFAULT NULL,
  `hostel_no_of_rooms` varchar(10) DEFAULT NULL,
  `hostel_rent` int(10) DEFAULT NULL,
  `hostel_food` varchar(50) DEFAULT NULL,
  `hostel_internet` varchar(10) DEFAULT NULL,
  `hostel_bed_fan` varchar(10) DEFAULT NULL,
  `hostel_laundry` varchar(10) DEFAULT NULL,
  `hostel_kitchen` varchar(10) DEFAULT NULL,
  `hostel_for_whom` varchar(10) DEFAULT NULL,
  `hostel_facility` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hostel_detail`
--

LOCK TABLES `hostel_detail` WRITE;
/*!40000 ALTER TABLE `hostel_detail` DISABLE KEYS */;
INSERT INTO `hostel_detail` VALUES (1,'8527568626',1,'For Rent only','sector 83','noida','Uttar Pradesh','iit','2',5000,'No','Yes','No','Yes','No','Families','<pre style=\"color:white;background:rgba(0,0,0,.3);font-family:Georgia;;font-size:18px;\">jhBXJKABD</pre>');
/*!40000 ALTER TABLE `hostel_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paying_guest_detail`
--

DROP TABLE IF EXISTS `paying_guest_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paying_guest_detail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `contact` varchar(15) DEFAULT NULL,
  `available` int(1) DEFAULT '0',
  `pg_for` varchar(100) DEFAULT NULL,
  `pg_location` varchar(100) DEFAULT NULL,
  `pg_city` varchar(100) DEFAULT NULL,
  `pg_state` varchar(100) DEFAULT NULL,
  `pg_near_by` varchar(100) DEFAULT NULL,
  `pg_no_of_rooms` varchar(10) DEFAULT NULL,
  `pg_rent` int(10) DEFAULT NULL,
  `pg_food` varchar(50) DEFAULT NULL,
  `pg_internet` varchar(10) DEFAULT NULL,
  `pg_bed_fan` varchar(10) DEFAULT NULL,
  `pg_laundry` varchar(10) DEFAULT NULL,
  `pg_kitchen` varchar(10) DEFAULT NULL,
  `pg_facility` varchar(1000) DEFAULT NULL,
  `pg_for_whom` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paying_guest_detail`
--

LOCK TABLES `paying_guest_detail` WRITE;
/*!40000 ALTER TABLE `paying_guest_detail` DISABLE KEYS */;
INSERT INTO `paying_guest_detail` VALUES (1,'8527568626',1,'For Rent only','sector 83','noida','Uttar Pradesh','GBPEC','2',5000,'Yes','No','Yes','Yes','No','<pre style=\"color:white;background:rgba(0,0,0,.3);font-family:Georgia;;font-size:18px;\">KHASBK</pre>','Families');
/*!40000 ALTER TABLE `paying_guest_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pg_detail`
--

DROP TABLE IF EXISTS `pg_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pg_detail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `contact` varchar(15) DEFAULT NULL,
  `available` int(1) DEFAULT '0',
  `pg_for` varchar(10) DEFAULT NULL,
  `pg_location` varchar(100) DEFAULT NULL,
  `pg_city` varchar(100) DEFAULT NULL,
  `pg_state` varchar(100) DEFAULT NULL,
  `pg_near_by` varchar(100) DEFAULT NULL,
  `pg_no_of_rooms` varchar(10) DEFAULT NULL,
  `pg_rent` int(10) DEFAULT NULL,
  `pg_food` varchar(50) DEFAULT NULL,
  `pg_internet` varchar(10) DEFAULT NULL,
  `pg_bed_fan` varchar(10) DEFAULT NULL,
  `pg_laundry` varchar(10) DEFAULT NULL,
  `pg_kitchen` varchar(10) DEFAULT NULL,
  `pg_facility` varchar(1000) DEFAULT NULL,
  `pg_for_whom` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pg_detail`
--

LOCK TABLES `pg_detail` WRITE;
/*!40000 ALTER TABLE `pg_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `pg_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_detail`
--

DROP TABLE IF EXISTS `room_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_detail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `contact` varchar(15) DEFAULT NULL,
  `available` int(1) NOT NULL DEFAULT '0',
  `location` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `near_by` varchar(100) DEFAULT NULL,
  `rent` int(10) DEFAULT NULL,
  `food` varchar(50) DEFAULT NULL,
  `internet` varchar(10) DEFAULT NULL,
  `bed_fan` varchar(10) DEFAULT NULL,
  `laundry` varchar(10) DEFAULT NULL,
  `kitchen` varchar(10) DEFAULT NULL,
  `for_whom` varchar(10) DEFAULT NULL,
  `no_of_rooms` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_detail`
--

LOCK TABLES `room_detail` WRITE;
/*!40000 ALTER TABLE `room_detail` DISABLE KEYS */;
INSERT INTO `room_detail` VALUES (1,'8527568626',1,'sector 83','noida','Uttar Pradesh','webkul',5000,'Yes','Yes','Yes','Yes','Yes','All',2),(2,'8527568626',1,'adgfs','sefrf','Karnataka','ewwef',132,'Yes','Yes','No','No','No','All',2);
/*!40000 ALTER TABLE `room_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_detail`
--

DROP TABLE IF EXISTS `shop_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_detail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `contact` varchar(15) DEFAULT NULL,
  `available` int(1) NOT NULL DEFAULT '0',
  `shop_for` varchar(100) DEFAULT NULL,
  `shop_city` varchar(100) DEFAULT NULL,
  `shop_state` varchar(100) DEFAULT NULL,
  `shop_address` varchar(100) DEFAULT NULL,
  `shop_rent` int(10) DEFAULT NULL,
  `no_shop` varchar(50) DEFAULT NULL,
  `shop_first_pref` varchar(100) DEFAULT NULL,
  `shop_area` varchar(10) DEFAULT NULL,
  `shop_detail` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_detail`
--

LOCK TABLES `shop_detail` WRITE;
/*!40000 ALTER TABLE `shop_detail` DISABLE KEYS */;
INSERT INTO `shop_detail` VALUES (1,'8527568626',1,'For Rent only','noida','Uttar Pradesh','sector 83',5000,'2','webkul','1500','<pre style=\"color:white;background:rgba(0,0,0,.3);font-family:Georgia;;font-size:18px;\">sakjujc dcjbskj bcskj sdkjcbasjk</pre>');
/*!40000 ALTER TABLE `shop_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temp`
--

DROP TABLE IF EXISTS `temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temp` (
  `username` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`contact`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temp`
--

LOCK TABLES `temp` WRITE;
/*!40000 ALTER TABLE `temp` DISABLE KEYS */;
/*!40000 ALTER TABLE `temp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `employer` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`contact`),
  UNIQUE KEY `sno` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (5,'sdff','353','aaaa','sgs','sg','gdg','TCS'),(2,'anant','8527568626','anant','sector 83','noida','up','Google'),(3,'anant2','85858','afsfsf','adff','aefa','fsvasae','Fresher'),(4,'anant','8687687','uk','sdbhad','vajda','uk','Other');
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

-- Dump completed on 2018-04-17  8:02:11
