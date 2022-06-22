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
-- Table structure for table `passenger`
--

DROP TABLE IF EXISTS `passenger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `passenger` (
  `Name` text NOT NULL,
  `Passenger_ID` int NOT NULL,
  `Age` int NOT NULL,
  `Gender` text NOT NULL,
  PRIMARY KEY (`Passenger_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passenger`
--

LOCK TABLES `passenger` WRITE;
/*!40000 ALTER TABLE `passenger` DISABLE KEYS */;
INSERT INTO `passenger` VALUES ('Jade Thatcher',1,79,'F'),('Elena Clarke',2,47,'F'),('Audrey Samuel',3,8,'F'),('Chad Emerson',4,40,'M'),('Ramon Drake',5,45,'M'),('Lucas Graham',6,76,'M'),('Sloane Wheeler',7,55,'F'),('Agnes Waterhouse',8,42,'F'),('Carter Snow',9,65,'M'),('Gabriel Andrews',10,28,'M'),('Marissa Varley',11,27,'F'),('Russel Exton',12,80,'M'),('David Tennant',13,54,'M'),('Domenic Jones',14,31,'M'),('Hailey Holmes',15,64,'F'),('Winnie Edler',16,66,'F'),('Gabriel Hobson',17,52,'M'),('Carina Gray',18,41,'F'),('Enoch Powell',19,77,'M'),('Ethan Briggs',20,5,'M'),('Analise Palmer',21,77,'F'),('Caleb Townend',22,69,'M'),('Cadence Darcy',23,28,'F'),('Naomi Ventura',24,43,'F'),('Callie Payne',25,26,'F'),('Roger Kelly',26,16,'M'),('Aiden James',27,40,'M'),('William Dixon',28,6,'M'),('Grace Robinson',29,25,'F'),('Juliet Parr',30,55,'F'),('Marie Hunter',31,30,'F'),('Nate Reading',32,64,'M'),('Julius Redwood',33,2,'M'),('Catherine Clarke',34,62,'F'),('Shelby Hastings',35,18,'F'),('Ally Villiger',36,68,'F'),('Angelica Gunn',37,76,'F'),('Remy Brown',38,16,'F'),('Karen Ralph',39,60,'F'),('Ronald Stewart',40,19,'M'),('Caleb Broomfield',41,3,'M'),('Angelica Stone',42,66,'F'),('Harry Noon',43,69,'M'),('Parker Young',44,84,'F'),('Gwen Fisher',45,51,'F'),('Emmanuelle Irving',46,32,'F'),('Chadwick Vass',47,4,'M'),('Joseph Appleton',48,37,'M'),('Bryon Fulton',49,79,'M'),('Denny Vaughn',50,58,'M'),('veer kumar',51,25,'M');
/*!40000 ALTER TABLE `passenger` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `passenger_BEFORE_INSERT` BEFORE INSERT ON `passenger` FOR EACH ROW BEGIN
	DECLARE msg varchar(128) default '';
	IF NEW.age < 3 OR NEW.age > 120 
    THEN SET msg = "Age should be between 3 and 120";
    END IF;
    
    IF msg != '' 
    THEN SIGNAL SQLSTATE '45000' 
    SET MESSAGE_TEXT = msg;
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
