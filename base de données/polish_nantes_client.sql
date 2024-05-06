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
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `id_client` int(255) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `telephone` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `mot_de_passe` varchar(500) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (4755,'SIMMOU','Ahmed',686045154,'simmou.soufiane@gmail.com','$2y$10$FiA2sk15tgUPUSarJ768weuVuTJPC0iSPp4xvVLIHycJ3z4Gn12jm'),(293520,'fsgfs','sgbd',750650403,'simmou.souf4@gmail.com','$2y$10$ypJUC5MWOHvCtoz1iXBRHOcExj505R3KH6ZnB.6Tf1NB5nHvi8e1.'),(412561,'karim','balda',673829429,'karim.balda@gmail.com','$2y$10$h0PfucGQ3Ir/x4OXR/uhLe1sljIYq6n1j9srdweggL8ceYffMTenu'),(617301,'Simmou','Khadija',665298843,'simm@gmail.com','$2y$10$R339SfiDJIAEf7A8Ys5W9e6X0MA8Zigjph20Qf0mrStndh9Gk1PiS'),(658338,'simmou','soufiane',676620057,'simmou.soufiane34@gmail.com','$2y$10$yuU7a7PHJ7IYS9SrSd9lkevPcgR9G20A61UmVc4SkTR5RtBVb8ZQW'),(659983,'younes','aa',676620057,'younesmtp@gmail.com','$2y$10$X/6FZKDyLe/zgvFu.Dvs.eQsJk2j24TVmaRiX6tG5PMX8d2a696x.'),(672376,'Simmou','Khadija',665298843,'sousou34games@gmail.com','$2y$10$wvML.MhJv90YRFYGsB4aBueBLtbId2rbH9f37FbXswILQiEVmm8m6'),(859221,'abouz','soufiane',665298843,'simmou.soufiane34@gmail.com','$2y$10$.OAOD/LN9FRyqHSLu66w.Oa0tARJsToK.hkVRZHvk1RQFGglG8zGC'),(972343,'medi','rabouch',485938584,'medi_rabouch@gmail.com','$2y$10$8MmtFTL5CbKGs5DSwfRBm.mP9XRw.klYr91oZRNrF891HgG2/XGKO');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `polish_nantes`.`client_AFTER_INSERT` AFTER INSERT ON `client` FOR EACH ROW
BEGIN
insert into polish_nantes_log.logs(timestamp,action,description)
values (now(),'ajouter',concat('client ajouter est l\'ID ', new.id_client));
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
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `polish_nantes`.`client_AFTER_UPDATE` AFTER UPDATE ON `client` FOR EACH ROW
BEGIN
insert into polish_nantes_log.logs(timestamp,action,description)
values (now(),'modifier',concat('client modifier est l\'ID ', new.id_client));
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
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `polish_nantes`.`client_AFTER_DELETE` AFTER DELETE ON `client` FOR EACH ROW
BEGIN
insert into polish_nantes_log.logs(timestamp,action,description)
values (now(),'supprimer',concat('client supprimer est l\'ID ', old.id_client));
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
