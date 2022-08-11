-- MySQL dump 10.13  Distrib 5.7.38, for Linux (x86_64)
--
-- Host: localhost    Database: aroma
-- ------------------------------------------------------
-- Server version	5.7.38-0ubuntu0.18.04.1

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
-- Table structure for table `final`
--

DROP TABLE IF EXISTS `final`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `final` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scientistId` int(11) NOT NULL,
  `quaterId` int(11) NOT NULL,
  `filename` varchar(20) DEFAULT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pptname` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `scientistId` (`scientistId`,`quaterId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `final`
--

LOCK TABLES `final` WRITE;
/*!40000 ALTER TABLE `final` DISABLE KEYS */;
INSERT INTO `final` VALUES (4,1,1,'file_1_1.pdf','csir mission aroma','2021-09-15 04:33:43','2021-09-15 04:33:43','ppt_1_1.pptx'),(5,10,1,'file_10_1.pdf','ajkbxhbaxs','2021-09-15 04:34:26','2021-09-15 04:34:26','ppt_10_1.pptx'),(6,2,3,'file_2_3.pdf','knlkjnjnkjl','2021-09-15 04:35:07','2021-09-15 04:35:07','ppt_2_3.pptx'),(7,2,4,'file_2_4.pdf','abcd','2021-09-15 09:47:46','2021-09-15 09:47:46','ppt_2_4.pptx'),(8,1,2,'file_1_2.pdf','faoihvxhgsj ','2022-04-19 06:10:18','2022-04-19 06:10:18','ppt_1_2.pptx');
/*!40000 ALTER TABLE `final` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quater`
--

DROP TABLE IF EXISTS `quater`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quater` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quater`
--

LOCK TABLES `quater` WRITE;
/*!40000 ALTER TABLE `quater` DISABLE KEYS */;
INSERT INTO `quater` VALUES (1,'January-March'),(2,'April-June'),(3,'July-September'),(4,'October - December');
/*!40000 ALTER TABLE `quater` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scientist`
--

DROP TABLE IF EXISTS `scientist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scientist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scientist`
--

LOCK TABLES `scientist` WRITE;
/*!40000 ALTER TABLE `scientist` DISABLE KEYS */;
INSERT INTO `scientist` VALUES (1,'Dr. D. Srinivasa Reddy'),(2,'Er. Abdul Rahim'),(3,'Er. Ranjesh Anand'),(4,'Dr. Vikas babu'),(5,'Er. Shaghaf Ansari'),(6,'Dr. Asha chaubey'),(7,'Dr. Dhiraj vyas'),(8,'Dr. Deepika singh'),(9,'Dr GD singh'),(10,'Dr. sumit gandhi'),(11,'Dr. shahid rasool'),(12,'Dr. meenu katoch'),(13,'Dr. Qazi parvaiz'),(14,'Dr. Nazia Abass'),(16,'Dr Shupla gupta'),(17,'Dr. kota srinawas'),(18,'Dr.sabha jeet'),(19,'Dr js Momo H anal'),(20,'Dr. Nasheeman Ashraf'),(21,'Dr. PL sangwan'),(22,'Dr. PN gupta'),(23,'Dr. padma Lay'),(24,'Dr. Prashant mishra'),(25,'Dr. parsoon kumar'),(26,'Dr. Rajendra Bhanwaria'),(27,'Dr. B Yogesh pandharinath'),(28,'Dr. Sheikh Tasaduq Abdullah'),(29,'Dr. Anil Ktare'),(30,'Dr. Firdous Ah Mir'),(31,'Dr. Syed khalid Yousuf'),(32,'VP Rahul'),(33,'Dr. Sumeet Gairola'),(34,'Dr. Mohd Jamal Dar'),(35,'Dr. Khursheed Bhat'),(36,'Dr. Syed Khalid Yousuf'),(37,'Dr. Yogesh Pandharinath'),(38,'Sumeet Gairola'),(41,'Dr. Phalisteen Sultan'),(42,'Dr. VP Rahul'),(43,'Dr. Ravail Singh'),(44,'Sumeet Gairola'),(45,'Dr. Utpal Nandi'),(46,'Er. Anil Katare'),(47,'Dr. Dhiraj Vyas');
/*!40000 ALTER TABLE `scientist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin@gmail.com','12346'),(2,'Admin_2','123456');
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

-- Dump completed on 2022-08-03 16:54:56
