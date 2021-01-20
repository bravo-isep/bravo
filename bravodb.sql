CREATE DATABASE  IF NOT EXISTS `bravo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bravo`;
-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: bravo
-- ------------------------------------------------------
-- Server version	8.0.22

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
-- Table structure for table `ac_sys`
--

DROP TABLE IF EXISTS `ac_sys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ac_sys` (
  `idac_sys` int NOT NULL,
  `tempereture` int NOT NULL DEFAULT '26',
  `fanspeed` int NOT NULL DEFAULT '-1',
  `mode` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'cold',
  `idroom` int NOT NULL,
  PRIMARY KEY (`idac_sys`),
  KEY `ac_sys_idroom_idx` (`idroom`),
  CONSTRAINT `ac_sys_idroom` FOREIGN KEY (`idroom`) REFERENCES `room` (`idroom`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_sys`
--

LOCK TABLES `ac_sys` WRITE;
/*!40000 ALTER TABLE `ac_sys` DISABLE KEYS */;
INSERT INTO `ac_sys` VALUES (0,26,-1,'cold',601),(1,26,-1,'cold',602),(2,26,-1,'cold',603),(3,26,-1,'cold',301),(4,26,-1,'cold',302);
/*!40000 ALTER TABLE `ac_sys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alarm`
--

DROP TABLE IF EXISTS `alarm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alarm` (
  `idalarm` int NOT NULL,
  `type` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `idsensor` int NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`idalarm`),
  KEY `alarm_idsensor_idx` (`idsensor`),
  CONSTRAINT `alarm_idsensor` FOREIGN KEY (`idsensor`) REFERENCES `sensor` (`idsensor`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alarm`
--

LOCK TABLES `alarm` WRITE;
/*!40000 ALTER TABLE `alarm` DISABLE KEYS */;
/*!40000 ALTER TABLE `alarm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `body_temperature_detection`
--

DROP TABLE IF EXISTS `body_temperature_detection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `body_temperature_detection` (
  `idbtd` int NOT NULL,
  `idsensor` int NOT NULL,
  `iduser` int NOT NULL,
  `temperature` float NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`idbtd`),
  KEY `btd_idsensor_idx` (`idsensor`),
  KEY `btd_iduser_idx` (`iduser`),
  CONSTRAINT `btd_idsensor` FOREIGN KEY (`idsensor`) REFERENCES `sensor` (`idsensor`) ON UPDATE CASCADE,
  CONSTRAINT `btd_iduser` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `body_temperature_detection`
--

LOCK TABLES `body_temperature_detection` WRITE;
/*!40000 ALTER TABLE `body_temperature_detection` DISABLE KEYS */;
INSERT INTO `body_temperature_detection` VALUES (0,25,0,36.2,'2021-01-20 08:03:00'),(1,25,1,37.3,'2021-01-20 09:03:00'),(2,25,2,39.8,'2021-01-20 09:09:00');
/*!40000 ALTER TABLE `body_temperature_detection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lighting_sys`
--

DROP TABLE IF EXISTS `lighting_sys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lighting_sys` (
  `idlighting_sys` int NOT NULL,
  `light_brightness` int NOT NULL DEFAULT '-1',
  `curtain_position` int NOT NULL DEFAULT '-1',
  `idroom` int NOT NULL,
  PRIMARY KEY (`idlighting_sys`),
  KEY `lighting_sys_idroom_idx` (`idroom`),
  CONSTRAINT `lighting_sys_idroom` FOREIGN KEY (`idroom`) REFERENCES `room` (`idroom`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lighting_sys`
--

LOCK TABLES `lighting_sys` WRITE;
/*!40000 ALTER TABLE `lighting_sys` DISABLE KEYS */;
INSERT INTO `lighting_sys` VALUES (0,-1,-1,601),(1,-1,-1,602),(2,-1,-1,603),(3,-1,-1,301),(4,-1,-1,302);
/*!40000 ALTER TABLE `lighting_sys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meeting`
--

DROP TABLE IF EXISTS `meeting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `meeting` (
  `idmeeting` int NOT NULL,
  `idroom` int NOT NULL,
  `time_start` datetime NOT NULL,
  `time_end` datetime NOT NULL,
  PRIMARY KEY (`idmeeting`),
  KEY `meeting_idroom_idx` (`idroom`),
  CONSTRAINT `meeting_idroom` FOREIGN KEY (`idroom`) REFERENCES `room` (`idroom`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meeting`
--

LOCK TABLES `meeting` WRITE;
/*!40000 ALTER TABLE `meeting` DISABLE KEYS */;
/*!40000 ALTER TABLE `meeting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meeting_user`
--

DROP TABLE IF EXISTS `meeting_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `meeting_user` (
  `idmeeting_user` int NOT NULL,
  `idmeeting` int NOT NULL,
  `iduser` int NOT NULL,
  PRIMARY KEY (`idmeeting_user`),
  KEY `meeting_user_idmeeting_idx` (`idmeeting`),
  KEY `meeting_user_iduser_idx` (`iduser`),
  CONSTRAINT `meeting_user_idmeeting` FOREIGN KEY (`idmeeting`) REFERENCES `meeting` (`idmeeting`),
  CONSTRAINT `meeting_user_iduser` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meeting_user`
--

LOCK TABLES `meeting_user` WRITE;
/*!40000 ALTER TABLE `meeting_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `meeting_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `room` (
  `idroom` int NOT NULL,
  `type` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `room_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`idroom`),
  UNIQUE KEY `room_name_UNIQUE` (`room_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES (101,'public area','Front door'),(301,'meeting room','M-301'),(302,'meeting room','M-302'),(601,'office','A-601'),(602,'office','A-602'),(603,'office','A-603');
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sensor`
--

DROP TABLE IF EXISTS `sensor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sensor` (
  `idsensor` int NOT NULL,
  `type` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `value` float DEFAULT NULL,
  `idroom` int NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idsensor`),
  KEY `idroom_idx` (`idroom`),
  CONSTRAINT `sensor_idroom` FOREIGN KEY (`idroom`) REFERENCES `room` (`idroom`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sensor`
--

LOCK TABLES `sensor` WRITE;
/*!40000 ALTER TABLE `sensor` DISABLE KEYS */;
INSERT INTO `sensor` VALUES (0,'temperature',27.9,301,'2021-01-20 15:15:51'),(1,'temperature',28.7,302,'2021-01-20 15:15:51'),(2,'temperature',27.6,601,'2021-01-20 15:15:51'),(3,'temperature',18.5,602,'2021-01-20 15:15:51'),(4,'temperature',31.3,603,'2021-01-20 15:15:51'),(5,'humidity',20.9,301,'2021-01-20 15:15:51'),(6,'humidity',50.7,302,'2021-01-20 15:15:51'),(7,'humidity',45.2,601,'2021-01-20 15:15:51'),(8,'humidity',33.9,602,'2021-01-20 15:15:51'),(9,'humidity',42,603,'2021-01-20 15:15:51'),(10,'brightness',23.4,301,'2021-01-20 15:15:51'),(11,'brightness',36.7,302,'2021-01-20 15:15:51'),(12,'brightness',90.6,601,'2021-01-20 15:15:51'),(13,'brightness',6.7,602,'2021-01-20 15:15:51'),(14,'brightness',86.7,603,'2021-01-20 15:15:51'),(15,'smoke',0,301,'2020-12-03 05:11:46'),(16,'smoke',0,302,'2020-12-03 05:11:46'),(17,'smoke',0,601,'2020-12-03 05:11:46'),(18,'smoke',0,602,'2020-12-03 05:11:47'),(19,'smoke',0,603,'2020-12-03 05:11:47'),(20,'Intrusion ',0,301,'2020-12-03 05:11:48'),(21,'Intrusion ',0,302,'2020-12-03 05:11:48'),(22,'Intrusion ',0,601,'2020-12-03 05:11:49'),(23,'Intrusion ',0,602,'2020-12-03 05:11:49'),(24,'Intrusion ',0,603,'2020-12-03 05:11:50'),(25,'body temperature',35.7,101,'2021-01-20 15:15:51');
/*!40000 ALTER TABLE `sensor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `iduser` int NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `userlevel` tinyint unsigned NOT NULL DEFAULT '0',
  `idroom` int NOT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `iduser_UNIQUE` (`iduser`),
  KEY `idroom_idx` (`idroom`),
  CONSTRAINT `user_idroom` FOREIGN KEY (`idroom`) REFERENCES `room` (`idroom`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (0,'employee','30274c47903bd1bac7633bbf09743149ebab805f',1,601),(1,'manager','30274c47903bd1bac7633bbf09743149ebab805f',2,602),(2,'administrator','30274c47903bd1bac7633bbf09743149ebab805f',3,603);
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

-- Dump completed on 2021-01-20 23:16:02
