-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: polish_nantes
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

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
-- Table structure for table `rendez_vous`
--

DROP TABLE IF EXISTS `rendez_vous`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rendez_vous` (
  `id_rendez_vous` int(11) NOT NULL,
  `date` varchar(1000) NOT NULL,
  `heure` varchar(1000) NOT NULL,
  `formule` varchar(1000) NOT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `statue` varchar(50) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `voiture` varchar(200) DEFAULT NULL,
  `model` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_rendez_vous`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rendez_vous`
--

LOCK TABLES `rendez_vous` WRITE;
/*!40000 ALTER TABLE `rendez_vous` DISABLE KEYS */;
INSERT INTO `rendez_vous` VALUES (0,'2024-04-30','17H 30','formule 3','          ',210,'supprimer',658338,'bmw','GRAND SUV'),(357,'2024-02-24','10H','formule 2','          ',180,'terminer',859221,'ds','SUV'),(7180,'2024-02-15','10H','formule 3','          c',210,'terminer',658338,' c','Berline'),(53209,'2024-02-15','12H 30','formule 3','          ',210,'terminer',658338,'bm','Berline'),(88134,'2024-02-21','12H 30','formule 3','          ',210,'terminer',658338,'x','SUV'),(89727,'2024-02-09','12H 30','formule 2','          ',180,'terminer',859221,'s','SUV'),(110826,'2024-02-23','12H 30','formule 3','          ',210,'terminer',658338,'bmw','Berline'),(277008,'2024-02-22','10H','formule 3','          ',210,'terminer',658338,'bmw','Berline'),(324038,'2024-02-23','10H','formule 3','          d',210,'terminer',658338,'d','Coupé'),(353331,'2024-02-22','12H 30','formule 3','          ',210,'terminer',658338,'bmw','Berline'),(370083,'2024-02-16','12H 30','formule 2','          ',180,'terminer',859221,'d','Coupé'),(407242,'2024-02-24','12H 30','formule 2','          ',180,'terminer',859221,'c','SUV'),(411724,'2024-02-22','12H 30','formule 2','          s',180,'terminer',859221,'d','Coupé'),(420606,'2024-02-14','17H 30','formule 2','          sd',180,'terminer',859221,'d','Berline'),(434704,'2024-02-13','10H','formule 3','          ',210,'terminer',658338,'d','Berline'),(443851,'2024-02-15','12H 30','formule 3','          d',210,'terminer',658338,'cx','Coupé'),(464613,'2024-02-02','12H 30','formule 1','          ',130,'terminer',859221,'rfd','Coupé'),(464873,'2024-02-08','10H','formule 3','          ggfdsqggggg',210,'terminer',658338,'bmw','Crossover'),(480114,'2024-02-23','12H 30','formule 1','          df',130,'terminer',658338,'vdf','Coupé'),(606167,'2024-02-24','19h','formule 3','          lqdksffffffffffffffffffffffffffffffffffffffffffb kqnf klndqkl nfk lnd fkln klndkn lkndfnk dkln nkdlf',210,'terminer',658338,'bmw','Coupé'),(670429,'2024-02-15','12H 30','formule 3','          d',210,'terminer',658338,'cx','Coupé'),(689614,'2024-02-15','10H','formule 2','          ds',180,'terminer',658338,'d','Coupé'),(775752,'2024-02-08','10H','formule 3','          ',210,'terminer',658338,'d','Camionnette'),(851420,'2024-02-22','12H 30','formule 2','          ',180,'terminer',859221,'ds','SUV'),(901134,'2024-02-09','12H 30','formule 3','          ',210,'terminer',658338,'cdc','Berline'),(904512,'2024-02-23','12H 30','formule 2','          c',180,'terminer',658338,'x','SUV'),(924341,'2024-02-01','10H','formule 3','          ',210,'terminer',658338,'n','Berline'),(978685,'2024-02-20','15H','formule 2','          v',180,'terminer',658338,'s','Berline');
/*!40000 ALTER TABLE `rendez_vous` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `polish_nantes`.`rendez_vous_AFTER_INSERT` AFTER INSERT ON `rendez_vous` FOR EACH ROW
BEGIN
insert into polish_nantes_log.logs(timestamp,action,description)
values (now(),'ajouter',concat('rendez vous ajouter est l\'ID ', new.id_rendez_vous));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `polish_nantes`.`rendez_vous_AFTER_UPDATE` AFTER UPDATE ON `rendez_vous` FOR EACH ROW
BEGIN
insert into polish_nantes_log.logs(timestamp,action,description)
values (now(),'modifier',concat('rendez vous modifier est l\'ID ', new.id_rendez_vous));
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `polish_nantes`.`rendez_vous_AFTER_DELETE` AFTER DELETE ON `rendez_vous` FOR EACH ROW
BEGIN
insert into polish_nantes_log.logs(timestamp,action,description)
values (now(),'supprimer',concat('rendez vous supprimer est l\'ID ', old.id_rendez_vous));
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

-- Dump completed on 2024-04-30 16:24:15
