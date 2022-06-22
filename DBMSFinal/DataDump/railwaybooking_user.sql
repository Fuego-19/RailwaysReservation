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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `User_ID` int NOT NULL,
  `Name` text NOT NULL,
  `Phone_Number` text NOT NULL,
  `Gender` text NOT NULL,
  `Password` text NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (-1,'ADMIN','8882116058','M','admin'),(1,'Jade Thatcher','1-360-286-3115','F','64Dj0lHdAl'),(2,'Elena Clarke','1-626-535-4848','F','X1p9CfxK1r'),(3,'Audrey Samuel','5-744-755-4202','F','onxEQBWHVd'),(4,'Chad Emerson','8-008-842-6884','M','EF7UpHzWbX'),(5,'Ramon Drake','5-503-410-0874','M','jTgAxrtQ8L'),(6,'Lucas Graham','5-380-052-0737','M','ZdsbEGNesG'),(7,'Sloane Wheeler','5-616-136-5477','F','76RPkr7qsX'),(8,'Agnes Waterhouse','8-068-055-5638','F','Tu6Hr1p2PG'),(9,'Carter Snow','1-375-524-0712','M','qcORiPiYKR'),(10,'Gabriel Andrews','0-441-578-7681','M','BDGa8ahmIB'),(11,'Marissa Varley','6-754-074-7056','F','8SaYL9eEih'),(12,'Russel Exton','1-733-381-0478','M','RmGr58aWfA'),(13,'David Tennant','8-083-016-1578','M','ZlnlybafE3'),(14,'Domenic Jones','5-560-416-2148','M','uesPLstHof'),(15,'Hailey Holmes','6-565-106-4035','F','EGsQuOHpXE'),(16,'Winnie Edler','7-152-611-8265','F','rAaSstEGUG'),(17,'Gabriel Hobson','8-221-355-8327','M','OSSZ7uUHND'),(18,'Carina Gray','5-275-875-5377','F','06J8DVsiPe'),(19,'Enoch Powell','3-328-570-4662','M','XaeRbxebdH'),(20,'Ethan Briggs','1-641-117-0843','M','rx7yYFO1Oq'),(21,'Analise Palmer','7-682-125-1641','F','YnhZnc2F8t'),(22,'Caleb Townend','0-052-847-2724','M','wqR1L6U0S9'),(23,'Cadence Darcy','5-101-206-3612','F','x19UOhUCd0'),(24,'Naomi Ventura','7-766-205-7722','F','JiOyfEiD2X'),(25,'Callie Payne','0-415-864-3842','F','tXDpG6jtjE'),(26,'Roger Kelly','8-624-336-2125','M','P2gyUOD7yw'),(27,'Aiden James','6-345-884-0308','M','4jEipiHZO0'),(28,'William Dixon','2-781-310-6158','M','sOQKXz0hkZ'),(29,'Grace Robinson','1-150-183-4661','F','4905fv9FV7'),(30,'Juliet Parr','7-014-371-8628','F','n8omuCiHnc'),(31,'Marie Hunter','0-557-018-6728','F','8V17jMs2c1'),(32,'Nate Reading','5-866-531-1721','M','FoEEtxqucv'),(33,'Julius Redwood','0-211-127-2342','M','9O4s6FFqad'),(34,'Catherine Clarke','6-005-072-0541','F','EtBSNqLx6t'),(35,'Shelby Hastings','4-658-656-4231','F','sYnCCZrwo2'),(36,'Ally Villiger','1-737-704-3541','F','G05YlvT1he'),(37,'Angelica Gunn','8-278-352-4547','F','mcZqaI2eZ6'),(38,'Remy Brown','0-101-764-7086','F','VM2yGeUIA8'),(39,'Karen Ralph','0-330-386-0534','F','TuxRkhgsEF'),(40,'Ronald Stewart','2-325-307-1063','M','ut86gu1Vgw'),(41,'Caleb Broomfield','3-371-003-3304','M','aNQsJRAbL0'),(42,'Angelica Stone','4-205-146-6785','F','77s6rXqbcF'),(43,'Harry Noon','3-460-555-2346','M','uMfzwnQnqM'),(44,'Parker Young','4-410-247-4070','F','oIXBxiaBm6'),(45,'Gwen Fisher','6-428-811-4511','F','HFE3zsYe2H'),(46,'Emmanuelle Irving','7-572-742-8458','F','hEnzfE7Php'),(47,'Chadwick Vass','7-266-648-3304','M','Mrn0gmbEVR'),(48,'Joseph Appleton','3-045-011-4102','M','RvFBLMAIfS'),(49,'Bryon Fulton','0-002-745-0034','M','sQ1TxFmUUP'),(50,'Denny Vaughn','1-055-105-1201','M','OUiseQZkkd'),(51,'Marvin Whatson','6-160-061-5253','M','Y1R0PdNrIj'),(52,'Alba Cowan','7-836-461-4737','F','LJR6f8qHvF'),(53,'Carl Baldwin','2-063-614-6327','M','3w7Qcmba5E'),(54,'Adalie Kennedy','5-508-765-2016','F','DFQYNx5eKl'),(55,'Julian Gibbons','2-486-726-6605','M','ticLc1oSxY'),(56,'Abbey Gates','6-234-503-3042','F','lO29sWBr9e'),(57,'Ruby Dyson','6-643-088-7508','F','SGCKEoBJh1'),(58,'Amy Redfern','0-044-020-8172','F','3BlX16H3ra'),(59,'Kieth Oswald','8-713-671-6188','M','Tl26YIOvSK'),(60,'Hazel Holmes','6-847-556-4813','F','jXBJGvBs8i'),(61,'Daria Roth','2-202-261-7508','F','3hUH3YddGz'),(62,'Jocelyn Uttridge','1-356-715-2823','F','RqXLD9SFgN'),(63,'Kamila Russell','0-176-744-7503','F','Dx8VW8O7Xl'),(64,'David Nanton','0-741-081-8168','M','dDz05poBk9'),(65,'Jaylene Collingwood','1-206-144-6475','F','qgCLq6FAn3'),(66,'Lorraine Wright','4-800-605-1386','F','L4Og8APLxP'),(67,'Rick Booth','8-002-022-5564','M','pwu94SkRAf'),(68,'Manuel Ogilvy','5-861-217-3270','M','zRpcjiIrIS'),(69,'Shannon Cunningham','8-852-730-2743','F','XTjt6a9tcE'),(70,'Daniel Mitchell','3-871-336-1032','M','HaY9RA0S0L'),(71,'Keira Alcroft','1-726-678-5434','F','FdErZW3Ufz'),(72,'Harry Kennedy','1-015-826-2114','M','bSlRklC60L'),(73,'Joseph Higgs','3-732-437-5846','M','BhHtz3TkQ8'),(74,'Daron Quinton','8-285-884-3043','M','Etymybv0fi'),(75,'Carter Mullins','0-211-346-0141','M','9FiNWAAqWu'),(76,'Aiden Wilkinson','4-424-431-0376','M','OqFqU2Lqsy'),(77,'Dorothy Olivier','1-402-721-6178','F','kpL81iN03H'),(78,'Daniel Cooper','0-787-251-0737','M','xjljlBxKOu'),(79,'Janelle Vernon','7-213-602-1273','F','38PtWvRX2D'),(80,'Chloe Emmott','2-046-725-8033','F','tEWk6juLZr'),(81,'George Kaur','7-885-772-4048','M','ZbjvMxk3qm'),(82,'Carter Wise','8-423-750-8282','M','UQkEgpmb2h'),(83,'Shay Hammond','1-845-622-0782','F','FM21tFhSC1'),(84,'Kieth Allwood','1-804-833-0056','M','Tjo7reXSAb'),(85,'Boris Walker','1-457-333-4752','M','h4e6AEhNPa'),(86,'Leslie Turner','3-316-764-2878','F','KnTRKc9VrJ'),(87,'Bree Vince','0-384-368-6408','F','uC1y5oIhLz'),(88,'Wade Dixon','0-844-517-2373','M','xiDBDmlUEZ'),(89,'Carl Marshall','6-433-118-6526','M','K50L6XOgPI'),(90,'Leilani Nelson','1-178-754-3876','F','6Nna1MRTm2'),(91,'Matthew Murphy','1-015-253-3708','M','xtlNAKFKzA'),(92,'Harry Lewis','3-876-724-0665','M','xrMP9GMpVD'),(93,'Kamila Corbett','5-655-217-5486','F','l6ua8DA82N'),(94,'Josh Ward','7-888-624-1524','M','gZmutRwenY'),(95,'Victoria Crawley','3-046-232-6542','F','pulOe6pNfb'),(96,'Domenic Ventura','1-863-246-4632','M','Ya1SM25X0D'),(97,'Javier Porter','1-342-683-0404','M','UWCfY9XSMG'),(98,'Erick Uddin','2-560-303-4110','M','R6c674UYt2'),(99,'Josh Thomas','4-017-008-6233','M','DGBEBMOCSH'),(100,'Carter Stewart','2-113-130-7180','M','oEFFf8gGS4'),(8590,'test','8882116058','M','00000000');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `check_phone_registered` BEFORE INSERT ON `user` FOR EACH ROW BEGIN	
	DECLARE message VARCHAR(128) DEFAULT '';
	declare pnum varchar(10);
    
    if NEW.phone_number in (select phone_number from user) then
		set message = "Phone Number already registered";
	end if;
	
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
