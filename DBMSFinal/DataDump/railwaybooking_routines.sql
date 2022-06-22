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
-- Temporary view structure for view `passenger_booking_details_1`
--

DROP TABLE IF EXISTS `passenger_booking_details_1`;
/*!50001 DROP VIEW IF EXISTS `passenger_booking_details_1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `passenger_booking_details_1` AS SELECT 
 1 AS `name`,
 1 AS `age`,
 1 AS `gender`,
 1 AS `Train_number`,
 1 AS `source`,
 1 AS `destination`,
 1 AS `date`,
 1 AS `coach_no`,
 1 AS `seat_no`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `train_schedule_view`
--

DROP TABLE IF EXISTS `train_schedule_view`;
/*!50001 DROP VIEW IF EXISTS `train_schedule_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `train_schedule_view` AS SELECT 
 1 AS `station_id`,
 1 AS `Platform_No`,
 1 AS `Arrival_Time`,
 1 AS `Departure_Time`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `passenger_booking_details_1`
--

/*!50001 DROP VIEW IF EXISTS `passenger_booking_details_1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `passenger_booking_details_1` AS select `p`.`Name` AS `name`,`p`.`Age` AS `age`,`p`.`Gender` AS `gender`,`t`.`Train_Number` AS `Train_number`,`t`.`Source` AS `source`,`t`.`Destination` AS `destination`,`t`.`Date` AS `date`,`ts`.`Coach_No` AS `coach_no`,`ts`.`Seat_No` AS `seat_no` from ((`passenger` `p` join `ticket` `t` on(((`p`.`Passenger_ID` = `UTL`()) and (`p`.`Passenger_ID` = `t`.`Passenger_ID`)))) join `train_status` `ts` on(((`p`.`Passenger_ID` = `UTL`()) and (`ts`.`Pid` = `p`.`Passenger_ID`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `train_schedule_view`
--

/*!50001 DROP VIEW IF EXISTS `train_schedule_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `train_schedule_view` AS select `train_schedule`.`Station_ID` AS `station_id`,`train_schedule`.`Platform_No` AS `Platform_No`,`train_schedule`.`Arrival_Time` AS `Arrival_Time`,`train_schedule`.`Departure_Time` AS `Departure_Time`,`train_schedule`.`Status` AS `status` from `train_schedule` where (`train_schedule`.`Train_number` = `UTL`()) order by `train_schedule`.`Arrival_Time` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Dumping events for database 'railwaybooking'
--

--
-- Dumping routines for database 'railwaybooking'
--
/*!50003 DROP FUNCTION IF EXISTS `utl` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `utl`() RETURNS int
    NO SQL
    DETERMINISTIC
RETURN @utl ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `check_phone_registered` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `check_phone_registered`(IN `in_pnum` VARCHAR(50))
    NO SQL
BEGIN
	DECLARE phone_num VARCHAR(50);
    DECLARE message VARCHAR(128) DEFAULT '';
    DECLARE finished INT DEFAULT 0;
	DEClARE user_phone CURSOR
    	FOR SELECT Phone_Number FROM user;
	DECLARE CONTINUE HANDLER 
    	FOR NOT FOUND SET finished = 1;
        
    OPEN user_phone;

	get_phone: LOOP
		FETCH user_phone INTO phone_num;
		IF finished = 1 THEN 
			LEAVE get_phone;
		END IF;
        IF phone_num = in_pnum THEN
        	SET message = 'Phone Number already registered';
        END IF;
 
	END LOOP get_phone;
	CLOSE user_phone;
    
    IF message != '' THEN
		SIGNAL SQLSTATE '45000'
    	SET MESSAGE_TEXT = message;
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `check_user_credentials` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `check_user_credentials`(IN `n` INT, IN `p` VARCHAR(50))
    NO SQL
BEGIN
	DECLARE uid INT;
	DECLARE pass VARCHAR(50);
    DECLARE message VARCHAR(128) DEFAULT '';
    DECLARE finished INT DEFAULT 0;
	DEClARE user_info CURSOR
    	FOR SELECT User_ID, Password FROM user;
	DECLARE CONTINUE HANDLER 
    	FOR NOT FOUND SET finished = 1;
        
    OPEN user_info;

	get_info: LOOP
		FETCH user_info INTO uid, pass;
		IF finished = 1 THEN 
			LEAVE get_info;
		END IF;
        IF uid = n AND pass = p THEN
        	SET message = 'Found';
        END IF;
 
	END LOOP get_info;
	CLOSE user_info;
    
    IF message like '' THEN
		SIGNAL SQLSTATE '45000'
    	SET MESSAGE_TEXT = 'Invalid Username or Password';
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `find_no_of_stations` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `find_no_of_stations`(in tn varchar(50), in src varchar(50), in dt varchar(50))
BEGIN

SELECT 
    COUNT(*)
FROM
    train_schedule s
WHERE
    s.Train_number IN (SELECT 
            train_number
        FROM
            train
        WHERE
            train_name = tn)
        AND s.departure_time < (SELECT 
            arrival_time
        FROM
            train_schedule
        WHERE
            station_id IN (SELECT 
                    station_id
                FROM
                    station
                WHERE
                    station_name = src)
                AND train_number IN (SELECT 
                    train_number
                FROM
                    train
                WHERE
                    train_name = tn));


SELECT 
    COUNT(*)
FROM
    train_schedule s
WHERE
    s.Train_number IN (SELECT 
            train_number
        FROM
            train
        WHERE
            train_name = tn)
        AND s.departure_time < (SELECT 
            arrival_time
        FROM
            train_schedule
        WHERE
            station_id IN (SELECT 
                    station_id
                FROM
                    station
                WHERE
                    station_name = dt)
                AND train_number IN (SELECT 
                    train_number
                FROM
                    train
                WHERE
                    train_name = tn));

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_new_user_id` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_new_user_id`(OUT `id` INT)
BEGIN
	SELECT newUID FROM variables INTO id;
	UPDATE variables SET newUID = id+1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `search_train` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `search_train`(IN `src` varchar(64), IN `dest` varchar(64), IN `cdate` date)
BEGIN
	declare sid int;
    declare did int;
    declare tn int;
    declare ftn int;
    declare dt time;
    declare dte date;


	SELECT 
    station_id
FROM
    station S
WHERE
    S.Station_name = src INTO sid;


	SELECT 
    station_id
FROM
    station S
WHERE
    S.Station_name = dest INTO did;


	SELECT 
    Train_number, Departure_Time
FROM
    train_schedule T
WHERE
    T.Status = 2 AND T.Station_ID = sid
        AND T.Date = cdate INTO tn , dt;


	SELECT 
    Train_number
FROM
    train_schedule
WHERE
    Train_number = tn AND Date = cdate
        AND Station_ID = did
        AND Arrival_Time > dt INTO ftn;


	SELECT 
    Train_Name
FROM
    train
WHERE
    Train_Number = ftn;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updateTrain_status` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateTrain_status`(in pid int, in tno int, in cno varchar(1), in sno int, in dat date)
BEGIN
	UPDATE train_status T 
SET 
    Booking_status = 1,
    T.Pid = pid
WHERE
    T.Booking_status = 0
        AND T.Train_no = tno
        AND T.coach_no = cno
        And T.seat_no = sno
        AND T.date = dat;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `updateTrain_status_date` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateTrain_status_date`()
BEGIN
DECLARE cur date;
declare cur2 int;
declare cur3 date;
declare temp date;
declare temp1 date;
declare temp2 date;
declare temp3 date;
declare temp4 date;
declare temp5 int;
	

SELECT 
    MAX(date)
FROM
    train_status INTO cur;
SELECT 
    COUNT(*)
FROM
    train_status
WHERE
    date = CURDATE() INTO cur2;
SELECT 
    MIN(date)
FROM
    train_status INTO cur3;


if cur = curDate() then 
	update train_status set date = date_add(date, interval 3 day) where date != curDate();
UPDATE train_status 
SET 
    booking_status = 0,
    pid = 0;
    
elseif cur2 = 0 then 
	select min(date) from train_status into temp;
	UPDATE train_status 
SET 
    date = CURDATE()
WHERE
    date = temp;
SELECT 
    MIN(date)
FROM
    train_status INTO temp1;
UPDATE train_status 
SET 
    date = DATE_ADD(CURDATE(), INTERVAL 1 DAY)
WHERE
    date = temp1;
SELECT 
    MIN(date)
FROM
    train_status INTO temp2;
UPDATE train_status 
SET 
    date = DATE_ADD(CURDATE(), INTERVAL 2 DAY)
WHERE
    date = temp2;
	UPDATE train_status 
SET 
    booking_status = 0,
    pid = 0;

elseif cur3 = curdate() then 
	select count(*) from train_status into temp5;
    
else
		select min(date) from train_status into temp4;
		UPDATE train_status 
SET 
    date = DATE_ADD(date, INTERVAL 3 DAY)
WHERE
    date = temp4;
		UPDATE train_status 
SET 
    booking_status = 0,
    pid = 0;
end if;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `update_trainSchedule_status` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_trainSchedule_status`()
BEGIN
	UPDATE train_schedule 
SET 
    status = 0
WHERE
    CURTIME() > Departure_Time and date = curDate() ;
    
    
	UPDATE train_schedule 
SET 
    status = 2
WHERE
    CURTIME() < Departure_Time and date = curDate();
    
    
    
	UPDATE train_schedule
SET 
    status = 1
WHERE
    CURTIME() < Departure_Time
        AND CURTIME() > arrival_time and date = curDate();
        
UPDATE train_schedule 
SET 
    Date = CURDATE()
WHERE
    Date < CURDATE();
END ;;
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

-- Dump completed on 2022-04-30 18:36:27
