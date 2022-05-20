-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: zachetka
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `by_subjects`
--

DROP TABLE IF EXISTS `by_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `by_subjects` (
  `link ID` int NOT NULL AUTO_INCREMENT,
  `Teacher` int NOT NULL,
  `Subject` int NOT NULL,
  PRIMARY KEY (`link ID`),
  KEY `by_subjects_ibfk_2` (`Teacher`),
  KEY `Subject` (`Subject`),
  CONSTRAINT `by_subjects_ibfk_2` FOREIGN KEY (`Teacher`) REFERENCES `users` (`User ID`),
  CONSTRAINT `by_subjects_ibfk_3` FOREIGN KEY (`Subject`) REFERENCES `subject_list` (`Subject ID`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `by_subjects`
--

LOCK TABLES `by_subjects` WRITE;
/*!40000 ALTER TABLE `by_subjects` DISABLE KEYS */;
INSERT INTO `by_subjects` VALUES (2,1,4),(3,8,5),(4,8,3),(88,1,5);
/*!40000 ALTER TABLE `by_subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grops_teachers`
--

DROP TABLE IF EXISTS `grops_teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grops_teachers` (
  `Teacher_groups ID` int NOT NULL AUTO_INCREMENT,
  `purpose` int NOT NULL,
  `Group_n` int NOT NULL,
  PRIMARY KEY (`Teacher_groups ID`),
  KEY `purpose` (`purpose`),
  KEY `Group_n` (`Group_n`),
  CONSTRAINT `grops_teachers_ibfk_1` FOREIGN KEY (`purpose`) REFERENCES `by_subjects` (`link ID`),
  CONSTRAINT `grops_teachers_ibfk_2` FOREIGN KEY (`Group_n`) REFERENCES `groups` (`Groups ID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grops_teachers`
--

LOCK TABLES `grops_teachers` WRITE;
/*!40000 ALTER TABLE `grops_teachers` DISABLE KEYS */;
INSERT INTO `grops_teachers` VALUES (2,2,2),(3,3,2),(4,3,5),(5,4,5),(6,2,5);
/*!40000 ALTER TABLE `grops_teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `groups` (
  `Groups ID` int NOT NULL AUTO_INCREMENT,
  `Group_n` varchar(10) NOT NULL,
  PRIMARY KEY (`Groups ID`),
  UNIQUE KEY `Group_n` (`Group_n`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (2,'ИКБО-01-19'),(5,'ИКБО-02-19'),(6,'ИКБО-03-19'),(7,'ИКБО-04-19'),(8,'ИКБО-05-19'),(9,'ИКБО-06-19'),(10,'ИКБО-07-19'),(11,'ИКБО-08-19'),(13,'ИКБО-12-19'),(12,'ИКБО-20-19'),(1,'Учитель');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marks`
--

DROP TABLE IF EXISTS `marks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marks` (
  `marks ID` int NOT NULL AUTO_INCREMENT,
  `Student` int NOT NULL,
  `mark` varchar(7) NOT NULL,
  `date_p` date NOT NULL,
  `grops_teachers_ID` int NOT NULL,
  PRIMARY KEY (`marks ID`,`grops_teachers_ID`),
  KEY `fk_marks_grops_teachers1_idx` (`grops_teachers_ID`),
  CONSTRAINT `fk_marks_grops_teachers1` FOREIGN KEY (`grops_teachers_ID`) REFERENCES `grops_teachers` (`Teacher_groups ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marks`
--

LOCK TABLES `marks` WRITE;
/*!40000 ALTER TABLE `marks` DISABLE KEYS */;
INSERT INTO `marks` VALUES (9,2,'4','2021-12-22',3),(11,2,'Неявка','2021-12-22',2);
/*!40000 ALTER TABLE `marks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_list`
--

DROP TABLE IF EXISTS `subject_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subject_list` (
  `Subject ID` int NOT NULL AUTO_INCREMENT,
  `subject` varchar(45) NOT NULL,
  `semester` int NOT NULL,
  PRIMARY KEY (`Subject ID`),
  UNIQUE KEY `subject` (`subject`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_list`
--

LOCK TABLES `subject_list` WRITE;
/*!40000 ALTER TABLE `subject_list` DISABLE KEYS */;
INSERT INTO `subject_list` VALUES (1,'Объектно ориентированное программировани',2),(2,'Тестирование и верификация ПО',5),(3,'Основы Сетевых Технологий',5),(4,'Информатика',1),(5,'Разработка баз данных',4);
/*!40000 ALTER TABLE `subject_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `User ID` int NOT NULL AUTO_INCREMENT,
  `Login` text NOT NULL,
  `Group_n` varchar(10) NOT NULL,
  `Password` text NOT NULL,
  `Allowment` int NOT NULL,
  PRIMARY KEY (`User ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'karpov','0','12345',1),(2,'Кударенко стас','ИКБО-01-19','Nopass',0),(3,'Алмаз','ИКБО-01-19','1234',0),(5,'Александр Подгорнов','ИКБО-02-19','12345',0),(6,'Николай Алексеевич','ИКБО-02-19','12345',0),(7,'root','ИКБО-01-19','root',2),(8,'Макаров М.А.','Преподав','1234',1),(9,'Ефимов А.Н.','ИКБО-12-19','1234',0);
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

-- Dump completed on 2022-05-20 17:55:11
