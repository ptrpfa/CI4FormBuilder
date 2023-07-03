-- MySQL dump 10.13  Distrib 8.0.33, for macos13.3 (arm64)
--
-- Host: 34.126.112.238    Database: FormBuilder
-- ------------------------------------------------------
-- Server version	8.0.26-google

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
-- SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
-- SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

-- SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '';

--
-- Current Database: `FormBuilder`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `FormBuilder` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `FormBuilder`;

--
-- Table structure for table `Form`
--

DROP TABLE IF EXISTS `Form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Form` (
  `FormID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `Version` varchar(100) NOT NULL DEFAULT '1',
  `Datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Description` varchar(1000) NOT NULL DEFAULT '',
  `Structure` blob NOT NULL,
  `Status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`FormID`),
  UNIQUE KEY `Form_UN` (`Name`,`Version`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Form`
--

LOCK TABLES `Form` WRITE;
/*!40000 ALTER TABLE `Form` DISABLE KEYS */;
INSERT INTO `Form` VALUES (1,'Test','1','2023-06-24 11:43:42','Test Form',_binary 's:1263:\"<form action=\"/users/submit\" method=\"post\" ><div class=\'row-1 col-md-9 mt-4\'><label for=\'name\' >Name</label><input type=\"text\" name=\"name\" value=\"\" class=\"form-control\" id=\"name-control\" placeholder=\"Enter your name\" required></div><div class=\'row-2 col-md-9 \'><label for=\'message\' class=\"message-label-control\">Message</label><textarea name=\"message\" value=\"\" class=\"form-control message-control\" placeholder=\"Enter you message\" required=\"1\"></textarea></div><div class=\'row  \'><div class=\' col-md-2 \'><label for=\'sex-help\' >How to sex</label><p id=\"sex-helper\">Key in which sex group you are</p></div><div class=\' col-md-5 radio-control\'><label for=\'gender\' >Choose Gender:</label><br><div class=\'  form-check form-check-inline\'><input type=\"radio\" name=\"gender\" value=\"male\" id=\"male\" class=\"form-check-input\" ><label for=\'male\' class=\"form-check-label\">Male</label></div><div class=\'  form-check form-check-inline\'><input type=\"radio\" name=\"gender\" value=\"female\" id=\"female\" class=\"form-check-input\" ><label for=\'female\' class=\"form-check-label\">Female</label></div></div></div><div style=\"text-align: center; margin-top: 20px;\">\n                    <button type=\"submit\" class=\"btn btn-primary\">Submit</button>\n                </div>\n                </form>\";',1),(2,'Login Test','1','2023-06-29 23:00:07','Login form',_binary 's:765:\"<form>\r\n  <div class=\"mb-3\">\r\n    <label for=\"exampleInputEmail1\" class=\"form-label\">Email address</label>\r\n    <input type=\"email\" class=\"form-control\" id=\"exampleInputEmail1\" aria-describedby=\"emailHelp\">\r\n    <div id=\"emailHelp\" class=\"form-text\">We\'ll never share your email with anyone else.</div>\r\n  </div>\r\n  <div class=\"mb-3\">\r\n    <label for=\"exampleInputPassword1\" class=\"form-label\">Password</label>\r\n    <input type=\"password\" class=\"form-control\" id=\"exampleInputPassword1\">\r\n  </div>\r\n  <div class=\"mb-3 form-check\">\r\n    <input type=\"checkbox\" class=\"form-check-input\" id=\"exampleCheck1\">\r\n    <label class=\"form-check-label\" for=\"exampleCheck1\">Check me out</label>\r\n  </div>\r\n  <button type=\"submit\" class=\"btn btn-primary\">Submit</button>\r\n</form>\";',1),(3,'Sample','1','2023-06-30 17:11:51','Sample meow meow',_binary 's:2297:\"<form action=\"/users/submit\" method=\"post\" ><div class=\'  row d-flex justify-content-center mx-auto w-75 text-start\'><div class=\'  col col-md-5\'><div class=\'  form-floating\'><input type=\"text\" name=\"firstname\" value=\"\" class=\"form-control\"><label for=\'firstname\' >Your First name and Middle initial</label></div></div><div class=\'  col col-md-4\'><div class=\'  form-floating\'><input type=\"text\" name=\"lastname\" value=\"\" class=\"form-control\"><label for=\'lastname\' >Last Name</label></div></div><div class=\'  col col-md-3\'><div class=\'  form-floating\'><input type=\"text\" name=\"securitynumber\" value=\"\" class=\"form-control\"><label for=\'securitynumber\' >  Your Social Security Number</label></div></div></div><div class=\'  row d-flex justify-content-center mx-auto w-75 text-start\'><div class=\'  col col-md-5\'><div class=\'  form-floating\'><input type=\"text\" name=\"firstname\" value=\"\" class=\"form-control\"><label for=\'firstname\' >Your First name and Middle initial</label></div></div><div class=\'  col col-md-4\'><div class=\'  form-floating\'><input type=\"text\" name=\"lastname\" value=\"\" class=\"form-control\"><label for=\'lastname\' >Last Name</label></div></div><div class=\'  col col-md-3\'><div class=\'  form-floating\'><input type=\"text\" name=\"securitynumber\" value=\"\" class=\"form-control\"><label for=\'securitynumber\' >Your Social Security Number</label></div></div></div><hr class=\"mx-auto mt-3\"></hr><div class=\'  row d-flex justify-content-center mx-auto w-75 text-start\'><div class=\'  col col-md-5\'><div class=\'  form-floating\'><input type=\"text\" name=\"spouse-firstname\" value=\"\" class=\"form-control\"><label for=\'spouse-firstname\' >If joint return, spouse\'s first name and middle initial</label></div></div><div class=\'  col col-md-4\'><div class=\'  form-floating\'><input type=\"text\" name=\"spouse-lastname\" value=\"\" class=\"form-control\"><label for=\'spouse-lastname\' >Last Name</label></div></div><div class=\'  col col-md-3\'><div class=\'  form-floating\'><input type=\"text\" name=\"spouse-securitynumber\" value=\"\" class=\"form-control\"><label for=\'spouse-securitynumber\' >Spouse\'s Social Security Number</label></div></div></div><div style=\"text-align: center; margin-top: 20px;\">\n                    <button type=\"submit\" class=\"btn btn-primary\">Submit</button>\n                </div>\n                </form>\";',1);
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
  KEY `Response_FK` (`FormID`),
  CONSTRAINT `Response_FK` FOREIGN KEY (`FormID`) REFERENCES `Form` (`FormID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Response`
--

LOCK TABLES `Response` WRITE;
/*!40000 ALTER TABLE `Response` DISABLE KEYS */;
/*!40000 ALTER TABLE `Response` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey`
--

DROP TABLE IF EXISTS `survey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `survey` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` blob,
  `message` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey`
--

LOCK TABLES `survey` WRITE;
/*!40000 ALTER TABLE `survey` DISABLE KEYS */;
INSERT INTO `survey` VALUES (1,_binary 'sN�`�\�\�\�\Z8l\�@���3��\�\�\��ԣ�\�D�\�%j\�^Ѷ\�W-�օZ-\�{�\�Z�-�H���k3D��=��iR}\Z���W�',_binary '\�#w	\�\�\�b\�\�\�\�b\�\�z���\�\��\��v���4\�\�.O�Ԉ�77\�.�\�k⨶\�L%��O��.\�ad\�\�TN=\�d�%l�F��[6�\�i�ke\�<\�'),(2,_binary '��������\�JήF\�\�.\�R���\rO\�4�\�_T\�\�\�\��񽭪\�\'e2�%���\�P�j7h�\�ޡ\�S9�\�pq�\��!\�\nx%t',_binary '�#��A\�\�\�{1A�\0\�UM�7\���k�m�\�$\�Z��\�#\��c$\0�\�nGg,\�ȇ�伂_2�|�ºT�g}\�W銖��:\�Uz�\�\Zo�Ԫ\�ʛ|{��ɤ'),(3,_binary '\��c�\0\���lö�\�\�u\�\�c0�/Ս6\���\'\�qC<��,\'tW�\�\�ԑ#���3ߦ� \�s1\�M�\�}wΦ7\��\�\��V\�\�.\�\�`Nq۠~l',_binary '\��6=�\�\�їG\��~�\�w>}��E\�\��B>n�-Oa��KzSu\�J\�\�4\�2|g@�i%����,�2C\Z\�	AQ�u\�\��\�4M�}�/H\�\�ƻ)'),(4,_binary '�͈��0S�\�\�V%8�\�f$\�wp�n��\�Z�\�%5\�\�gl\��\�\�\�r�^��+�\�\�:\�wRwZx\n�e\�p�ݛ\�A�-J�\"��\�I�\�N�\�ȧ������N�;�L�_\'\�3��\�',_binary '\�I�\Z�S]�� �f�]\�).ȿ�S|�gaϤ\�|\��򐈁Ţ{\�G����+f�a*\�&+sꞺN\�B�R�X\�4\�}+(\�@\�\��g��\�$��\��_H-j��)-?y8\�%W\�<,�\�G?*a');
/*!40000 ALTER TABLE `survey` ENABLE KEYS */;
UNLOCK TABLES;
-- SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-02 18:25:51
