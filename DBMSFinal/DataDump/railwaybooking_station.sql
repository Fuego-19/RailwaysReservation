CREATE DATABASE  IF NOT EXISTS `railwaybooking` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `railwaybooking`;
-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: railwaybooking
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `station`
--

DROP TABLE IF EXISTS `station`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `station` (
  `Station_ID` int NOT NULL,
  `Station_Name` varchar(50) NOT NULL,
  `No_of_Platforms` int NOT NULL,
  PRIMARY KEY (`Station_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `station`
--

LOCK TABLES `station` WRITE;
/*!40000 ALTER TABLE `station` DISABLE KEYS */;
INSERT INTO `station` VALUES (1,'Delhi',5),(2,'Mumbai',3),(3,'Kolkata',4),(4,'Bangalore',6),(5,'Chennai',6),(6,'Hyderabad',2),(7,'Pune',3),(8,'Ahmedabad',4),(9,'Surat',6),(10,'Lucknow',6),(11,'Jaipur',3),(12,'Cawnpore',6),(13,'Mirzapur',5),(14,'Nagpur',5),(15,'Ghaziabad',5),(16,'Indore',2),(17,'Vadodara',3),(18,'Vishakhapatnam',6),(19,'Bhopal',2),(20,'Chinchvad',5),(21,'Patna',5),(22,'Ludhiana',4),(23,'agra',4),(24,'Kalyan',5),(25,'Madurai',4),(26,'Jamshedpur',2),(27,'Nasik',6),(28,'Faridabad',3),(29,'Aurangabad',5),(30,'Rajkot',3),(31,'Meerut',2),(32,'Jabalpur',3),(33,'Thane',6),(34,'Dhanbad',4),(35,'Allahabad',4),(36,'Varanasi',5),(37,'Srinagar',2),(38,'Amritsar',6),(39,'Aligarh',3),(40,'Bhiwandi',3),(41,'Gwalior',2),(42,'Bhilai',6),(43,'Haora',5),(44,'Ranchi',4),(45,'Bezwada',6),(46,'Chandigarh',5),(47,'Mysore',6),(48,'Raipur',2),(49,'Kota',4),(50,'Bareilly',4);
/*!40000 ALTER TABLE `station` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-30 18:36:27
