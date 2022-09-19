-- MySQL dump 10.19  Distrib 10.3.36-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: intranet_obendb
-- ------------------------------------------------------
-- Server version	10.3.36-MariaDB-0+deb10u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `app_employee_lenguages`
--

DROP TABLE IF EXISTS `app_employee_lenguages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_employee_lenguages` (
  `mlen_id` int(11) NOT NULL AUTO_INCREMENT,
  `mlen__emp_id` int(11) NOT NULL,
  `mlen__len_id` int(11) NOT NULL,
  `mlen_default` tinyint(1) NOT NULL DEFAULT 0,
  `mlen_status` tinyint(2) NOT NULL DEFAULT 1,
  `mlen_created_at` datetime DEFAULT NULL,
  `mlen_updated_at` datetime DEFAULT NULL,
  `mlen_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`mlen_id`),
  KEY `app_employee_lenguages_len_status_IDX` (`mlen_status`) USING BTREE,
  KEY `app_employee_lenguages_len__emp_id_IDX` (`mlen__emp_id`) USING BTREE,
  KEY `app_employee_lenguages_len__len_id_IDX` (`mlen__len_id`) USING BTREE,
  CONSTRAINT `app_employee_lenguages_FK` FOREIGN KEY (`mlen__emp_id`) REFERENCES `app_employees` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `app_employee_lenguages_FK_1` FOREIGN KEY (`mlen__len_id`) REFERENCES `app_lenguages` (`len_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Tabla de registro para idiomas del empleado';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_employee_lenguages`
--

LOCK TABLES `app_employee_lenguages` WRITE;
/*!40000 ALTER TABLE `app_employee_lenguages` DISABLE KEYS */;
INSERT INTO `app_employee_lenguages` VALUES (1,1,2,1,2,'2022-09-07 13:15:07','2022-09-19 13:27:30',NULL),(2,1,1,0,2,'2022-09-07 13:28:54','2022-09-19 13:27:29',NULL),(6,1,3,0,2,'2022-09-10 12:19:32','2022-09-19 13:27:29',NULL);
/*!40000 ALTER TABLE `app_employee_lenguages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_employees`
--

DROP TABLE IF EXISTS `app_employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_employees` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_number_identification` varchar(50) DEFAULT NULL,
  `emp_type_identification` varchar(20) DEFAULT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_lastname` varchar(100) DEFAULT NULL,
  `emp_phone` varchar(25) DEFAULT NULL,
  `emp_email` varchar(150) NOT NULL,
  `emp_address` varchar(250) DEFAULT NULL,
  `emp_observations` varchar(250) DEFAULT NULL,
  `emp_search` text DEFAULT NULL,
  `emp_status` tinyint(2) NOT NULL DEFAULT 1,
  `emp_created_at` datetime DEFAULT NULL,
  `emp_updated_at` datetime DEFAULT NULL,
  `emp_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `app_employee_emp_status_IDX` (`emp_status`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Tabla de registro para los empleados';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_employees`
--

LOCK TABLES `app_employees` WRITE;
/*!40000 ALTER TABLE `app_employees` DISABLE KEYS */;
INSERT INTO `app_employees` VALUES (1,'123456789','immigration','Jhonny','Gonzalez','946761555','jgonzalez@creasoftweb.com','Lima','Usuario de pruebas en sistema','Jhonny Gonzalez 946761555 jgonzalez@creasoftweb.com Lima usuario de pruebas en sistema',2,'2022-08-09 12:09:32','2022-08-09 12:09:34',NULL);
/*!40000 ALTER TABLE `app_employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_lenguages`
--

DROP TABLE IF EXISTS `app_lenguages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_lenguages` (
  `len_id` int(11) NOT NULL AUTO_INCREMENT,
  `len_code` varchar(10) NOT NULL,
  `len_name` varchar(50) NOT NULL,
  `len_flag` varchar(100) NOT NULL,
  `len_status` tinyint(2) NOT NULL DEFAULT 1,
  `len_created_at` datetime DEFAULT NULL,
  `len_updated_at` datetime DEFAULT NULL,
  `len_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`len_id`),
  KEY `app_lenguages_len_status_IDX` (`len_status`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Tabla de registro para los leguajes dentro del proyecto';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_lenguages`
--

LOCK TABLES `app_lenguages` WRITE;
/*!40000 ALTER TABLE `app_lenguages` DISABLE KEYS */;
INSERT INTO `app_lenguages` VALUES (1,'en','english','united-states.svg',2,'2022-09-07 13:11:20','2022-09-19 13:27:29',NULL),(2,'es','spanish','spain.svg',2,'2022-09-07 13:12:40','2022-09-19 13:27:30',NULL),(3,'pt','portuguese','portugal.svg',2,'2022-09-07 14:04:55','2022-09-19 13:27:29',NULL);
/*!40000 ALTER TABLE `app_lenguages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_modules`
--

DROP TABLE IF EXISTS `sys_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_modules` (
  `mod_id` int(11) NOT NULL AUTO_INCREMENT,
  `mod__mod_id` int(11) DEFAULT NULL,
  `mod_name` varchar(150) NOT NULL,
  `mod_route` varchar(100) DEFAULT NULL,
  `mod_icon_menu` varchar(100) NOT NULL,
  `mod_position` tinyint(4) NOT NULL DEFAULT 1,
  `mod_status` tinyint(3) NOT NULL DEFAULT 1,
  `mod_created_at` datetime DEFAULT NULL,
  `mod_updated_at` datetime DEFAULT NULL,
  `mod_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`mod_id`),
  KEY `sys_modules_mod_status_IDX` (`mod_status`) USING BTREE,
  KEY `sys_modules_name_route_IDX` (`mod_route`) USING BTREE,
  KEY `sys_modules_FK` (`mod__mod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Tabla de registro para los modulos del sistema';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_modules`
--

LOCK TABLES `sys_modules` WRITE;
/*!40000 ALTER TABLE `sys_modules` DISABLE KEYS */;
INSERT INTO `sys_modules` VALUES (1,NULL,'Profile Management','manager.profile.index','bi-diagram-3 fs-3',1,2,'2022-09-12 11:38:16','2022-09-12 11:38:21',NULL);
/*!40000 ALTER TABLE `sys_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_privileges`
--

DROP TABLE IF EXISTS `sys_privileges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_privileges` (
  `pri_id` int(11) NOT NULL AUTO_INCREMENT,
  `pri__pro_id` int(11) NOT NULL,
  `pri__mod_id` int(11) NOT NULL,
  `pri_permission` varchar(10) NOT NULL,
  `pri_position` tinyint(4) NOT NULL DEFAULT 1,
  `pri_status` tinyint(3) DEFAULT NULL,
  `pri_created_at` datetime DEFAULT NULL,
  `pri_updated_at` datetime DEFAULT NULL,
  `pri_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`pri_id`),
  KEY `privileges_indexes` (`pri__pro_id`,`pri__mod_id`,`pri_status`) USING BTREE,
  KEY `sk_privileges_FK_1` (`pri__mod_id`),
  KEY `sys_privileges_pri_position_IDX` (`pri_position`) USING BTREE,
  CONSTRAINT `sk_privileges_FK` FOREIGN KEY (`pri__pro_id`) REFERENCES `sys_profiles` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sk_privileges_FK_1` FOREIGN KEY (`pri__mod_id`) REFERENCES `sys_modules` (`mod_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Tabla de registros de los privilegios del perfil';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_privileges`
--

LOCK TABLES `sys_privileges` WRITE;
/*!40000 ALTER TABLE `sys_privileges` DISABLE KEYS */;
INSERT INTO `sys_privileges` VALUES (1,1,1,'rui',1,2,'2022-09-12 11:47:21','2022-09-12 11:47:25',NULL);
/*!40000 ALTER TABLE `sys_privileges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_profiles`
--

DROP TABLE IF EXISTS `sys_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_profiles` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(50) NOT NULL,
  `pro_description` varchar(255) DEFAULT NULL,
  `pro_status` tinyint(3) NOT NULL DEFAULT 1,
  `pro_created_at` datetime DEFAULT NULL,
  `pro_updated_at` datetime DEFAULT NULL,
  `pro_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `profile_indexes` (`pro_status`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Tabla de registros para los perfiles de los usuarios';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_profiles`
--

LOCK TABLES `sys_profiles` WRITE;
/*!40000 ALTER TABLE `sys_profiles` DISABLE KEYS */;
INSERT INTO `sys_profiles` VALUES (1,'Root','Superusuario',2,'2022-09-12 11:44:35','2022-09-12 11:44:43',NULL);
/*!40000 ALTER TABLE `sys_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_users`
--

DROP TABLE IF EXISTS `sys_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user__emp_id` int(11) NOT NULL COMMENT 'Id de relación para tabla de empleados',
  `user__pro_id` int(11) NOT NULL,
  `user_login` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `user_status` tinyint(2) NOT NULL DEFAULT 1,
  `user_created_at` datetime DEFAULT NULL,
  `user_updated_at` datetime DEFAULT NULL,
  `user_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `sys_user_UN` (`user_login`),
  KEY `sys_user_FK` (`user__emp_id`),
  KEY `sys_user_user_status_IDX` (`user_status`) USING BTREE,
  KEY `sys_user_user_login_IDX` (`user_login`) USING BTREE,
  KEY `sys_users_FK` (`user__pro_id`),
  CONSTRAINT `sys_user_FK` FOREIGN KEY (`user__emp_id`) REFERENCES `app_employees` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sys_users_FK` FOREIGN KEY (`user__pro_id`) REFERENCES `sys_profiles` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Tabla de registro para los usuarios del sistema';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_users`
--

LOCK TABLES `sys_users` WRITE;
/*!40000 ALTER TABLE `sys_users` DISABLE KEYS */;
INSERT INTO `sys_users` VALUES (1,1,1,'jgonzalez@creasoftweb.com','$2y$13$ZBop4d94oJK7E8B4ke0Mm.vmntJ4ZTZpEYbma9ft/tpxqQJSRrKzC',NULL,2,'2022-08-09 12:12:00','2022-08-09 12:12:03',NULL);
/*!40000 ALTER TABLE `sys_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'intranet_obendb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-19 13:50:05
