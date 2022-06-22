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
-- Table structure for table `train_schedule`
--

DROP TABLE IF EXISTS `train_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `train_schedule` (
  `Train_number` int NOT NULL,
  `Arrival_Time` time NOT NULL,
  `Departure_Time` time NOT NULL,
  `Date` date NOT NULL,
  `Station_ID` int NOT NULL,
  `Platform_No` int NOT NULL,
  `Status` int NOT NULL,
  KEY `tnumber` (`Train_number`,`Station_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `train_schedule`
--

LOCK TABLES `train_schedule` WRITE;
/*!40000 ALTER TABLE `train_schedule` DISABLE KEYS */;
INSERT INTO `train_schedule` VALUES (1,'00:00:00','00:15:00','2022-04-30',1,3,0),(1,'03:00:00','03:15:00','2022-04-30',2,2,0),(1,'05:00:00','05:15:00','2022-04-30',3,4,0),(1,'06:30:00','06:45:00','2022-04-30',4,3,0),(1,'09:00:00','09:15:00','2022-04-30',5,1,0),(1,'10:30:00','10:45:00','2022-04-30',6,1,0),(1,'12:00:00','12:15:00','2022-04-30',7,3,0),(1,'14:30:00','14:45:00','2022-04-30',8,2,0),(1,'16:00:00','16:15:00','2022-04-30',9,1,0),(1,'19:00:00','19:15:00','2022-04-30',10,6,2),(2,'00:00:00','00:15:00','2022-04-30',11,3,0),(2,'03:00:00','03:15:00','2022-04-30',12,5,0),(2,'05:00:00','05:15:00','2022-04-30',13,3,0),(2,'06:30:00','06:45:00','2022-04-30',14,1,0),(2,'09:00:00','09:15:00','2022-04-30',15,3,0),(2,'10:30:00','10:45:00','2022-04-30',16,1,0),(2,'12:00:00','12:15:00','2022-04-30',17,2,0),(2,'14:30:00','14:45:00','2022-04-30',18,6,0),(2,'16:00:00','16:15:00','2022-04-30',19,1,0),(2,'19:00:00','19:15:00','2022-04-30',20,2,2),(3,'00:00:00','00:15:00','2022-04-30',21,4,0),(3,'03:00:00','03:15:00','2022-04-30',22,2,0),(3,'05:00:00','05:15:00','2022-04-30',23,1,0),(3,'06:30:00','06:45:00','2022-04-30',24,4,0),(3,'09:00:00','09:15:00','2022-04-30',25,2,0),(3,'10:30:00','10:45:00','2022-04-30',26,2,0),(3,'12:00:00','12:15:00','2022-04-30',27,6,0),(3,'14:30:00','14:45:00','2022-04-30',28,1,0),(3,'16:00:00','16:15:00','2022-04-30',29,4,0),(3,'19:00:00','19:15:00','2022-04-30',30,1,2),(4,'00:00:00','00:15:00','2022-04-30',31,2,0),(4,'03:00:00','03:15:00','2022-04-30',32,3,0),(4,'05:00:00','05:15:00','2022-04-30',33,6,0),(4,'06:30:00','06:45:00','2022-04-30',34,4,0),(4,'09:00:00','09:15:00','2022-04-30',35,1,0),(4,'10:30:00','10:45:00','2022-04-30',36,5,0),(4,'12:00:00','12:15:00','2022-04-30',37,2,0),(4,'14:30:00','14:45:00','2022-04-30',38,5,0),(4,'16:00:00','16:15:00','2022-04-30',39,1,0),(4,'19:00:00','19:15:00','2022-04-30',40,3,2),(5,'00:00:00','00:15:00','2022-04-30',41,1,0),(5,'03:00:00','03:15:00','2022-04-30',42,2,0),(5,'05:00:00','05:15:00','2022-04-30',43,5,0),(5,'06:30:00','06:45:00','2022-04-30',44,3,0),(5,'09:00:00','09:15:00','2022-04-30',45,3,0),(5,'10:30:00','10:45:00','2022-04-30',46,5,0),(5,'12:00:00','12:15:00','2022-04-30',47,4,0),(5,'14:30:00','14:45:00','2022-04-30',48,1,0),(5,'16:00:00','16:15:00','2022-04-30',49,2,0),(5,'19:00:00','19:15:00','2022-04-30',50,4,2),(3,'20:00:00','20:15:00','2022-04-30',5,1,2),(3,'21:00:00','21:15:00','2022-04-30',7,1,2),(6,'23:00:00','23:15:00','2022-04-30',1,1,2),(6,'23:30:00','23:45:00','2022-04-30',49,1,2);
/*!40000 ALTER TABLE `train_schedule` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `train_schedule_BEFORE_UPDATE` BEFORE UPDATE ON `train_schedule` FOR EACH ROW BEGIN
	DECLARE msg varchar(128) default '';
    DECLARE tno int;
    declare sno int;
    declare temp int;
    
    select count(*) from train_schedule where train_number = NEW.train_number AND station_id = NEW.station_id into temp;
	IF temp = 0
    THEN SET msg = "Station is not present in the train's route";
    END IF;
    
    IF msg != '' THEN SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = msg;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-30 18:36:26
