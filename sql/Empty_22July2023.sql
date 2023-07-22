-- MySQL dump 10.13  Distrib 8.0.33, for macos13.3 (arm64)
--
-- Host: localhost    Database: FormBuilder
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `FormBuilder`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `FormBuilder` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `FormBuilder`;

--
-- Table structure for table `auth_groups_users`
--

DROP TABLE IF EXISTS `auth_groups_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_groups_users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups_users`
--

LOCK TABLES `auth_groups_users` WRITE;
/*!40000 ALTER TABLE `auth_groups_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_groups_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_identities`
--

DROP TABLE IF EXISTS `auth_identities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_identities` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `secret` varchar(255) NOT NULL,
  `secret2` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `extra` text,
  `force_reset` tinyint(1) NOT NULL DEFAULT '0',
  `last_used_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_secret` (`type`,`secret`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_identities`
--

LOCK TABLES `auth_identities` WRITE;
/*!40000 ALTER TABLE `auth_identities` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_identities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_logins`
--

DROP TABLE IF EXISTS `auth_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_logins` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type_identifier` (`id_type`,`identifier`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_logins`
--

LOCK TABLES `auth_logins` WRITE;
/*!40000 ALTER TABLE `auth_logins` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_permissions_users`
--

DROP TABLE IF EXISTS `auth_permissions_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_permissions_users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `permission` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_permissions_users_user_id_foreign` (`user_id`),
  CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_permissions_users`
--

LOCK TABLES `auth_permissions_users` WRITE;
/*!40000 ALTER TABLE `auth_permissions_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_permissions_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_remember_tokens`
--

DROP TABLE IF EXISTS `auth_remember_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_remember_tokens` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int unsigned NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `selector` (`selector`),
  KEY `auth_remember_tokens_user_id_foreign` (`user_id`),
  CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_remember_tokens`
--

LOCK TABLES `auth_remember_tokens` WRITE;
/*!40000 ALTER TABLE `auth_remember_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_remember_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_token_logins`
--

DROP TABLE IF EXISTS `auth_token_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_token_logins` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type_identifier` (`id_type`,`identifier`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_token_logins`
--

LOCK TABLES `auth_token_logins` WRITE;
/*!40000 ALTER TABLE `auth_token_logins` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_token_logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci4_migrations`
--

DROP TABLE IF EXISTS `ci4_migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ci4_migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci4_migrations`
--

LOCK TABLES `ci4_migrations` WRITE;
/*!40000 ALTER TABLE `ci4_migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci4_migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Form`
--

DROP TABLE IF EXISTS `Form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Form` (
  `FormID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(500) NOT NULL DEFAULT '',
  `Version` varchar(100) NOT NULL DEFAULT '1',
  `Datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Description` varchar(1000) NOT NULL DEFAULT '',
  `Structure` blob NOT NULL,
  `Status` int NOT NULL DEFAULT '1',
  `deletedAt` datetime DEFAULT NULL,
  `Rules` blob,
  PRIMARY KEY (`FormID`),
  UNIQUE KEY `UN_Form` (`Name`,`Version`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Form`
--

LOCK TABLES `Form` WRITE;
/*!40000 ALTER TABLE `Form` DISABLE KEYS */;
/*!40000 ALTER TABLE `Form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Response`
--

DROP TABLE IF EXISTS `Response`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Response` (
  `ResponseID` int NOT NULL AUTO_INCREMENT,
  `FormID` int NOT NULL,
  `Datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `User` varchar(300) NOT NULL,
  `Response` blob NOT NULL,
  PRIMARY KEY (`ResponseID`),
  KEY `FK_Response` (`FormID`),
  CONSTRAINT `FK_Response` FOREIGN KEY (`FormID`) REFERENCES `Form` (`FormID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Response`
--

LOCK TABLES `Response` WRITE;
/*!40000 ALTER TABLE `Response` DISABLE KEYS */;
/*!40000 ALTER TABLE `Response` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `class` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text,
  `type` varchar(31) NOT NULL DEFAULT 'string',
  `context` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `last_active` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2023-07-22 18:12:53
