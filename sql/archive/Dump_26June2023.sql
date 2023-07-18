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
  `Name` varchar(300) NOT NULL DEFAULT '',
  `Version` varchar(100) NOT NULL DEFAULT '1',
  `Datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Description` varchar(1000) NOT NULL DEFAULT '',
  `Structure` blob NOT NULL,
  PRIMARY KEY (`FormID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Form`
--

LOCK TABLES `Form` WRITE;
/*!40000 ALTER TABLE `Form` DISABLE KEYS */;
INSERT INTO `Form` VALUES (1,'My KuKuBird Size Chart','1','2023-06-19 21:20:25','',_binary 's:965:\"<form><div class=\"form-group\"><label for=\'Name\' class=\'Name-control\'>Name</label><input type=\'text\' name=\'Name\' class=\'form-control name-control\' placeholder=\'Enter your name\' required ></div><br><div class=\"form-group\"><label for=\'Message\' class=\'Message-control\'>Message</label><textarea name=\'Message\' class=\'form-control message-control\' placeholder=\'Enter your message\' required ></textarea></div><br><div class=\"form-group\"><label for=\'Sex\' class=\'sex-form\'>Sex</label><br><div class=\'checkbox-group\'><div class=\'form-check\'><input type=\'checkbox\' class=\'male_control form-check-input\' id=\'male\' name=\'male\' value=\'Male\'><label for=\'male\' class=\'male-label form-check-label\'>male</label></div><div class=\'form-check\'><input type=\'checkbox\' class=\'female_control form-check-input\' id=\'female\' name=\'female\' value=\'Female\'><label for=\'female\' class=\'female-label form-check-label\'>female</label></div></div></div><br><button type=\"submit\">Submit</button></form>\";'),(2,'My KuKuBird Size Chart','1','2023-06-19 21:20:28','',_binary 's:965:\"<form><div class=\"form-group\"><label for=\'Name\' class=\'Name-control\'>Name</label><input type=\'text\' name=\'Name\' class=\'form-control name-control\' placeholder=\'Enter your name\' required ></div><br><div class=\"form-group\"><label for=\'Message\' class=\'Message-control\'>Message</label><textarea name=\'Message\' class=\'form-control message-control\' placeholder=\'Enter your message\' required ></textarea></div><br><div class=\"form-group\"><label for=\'Sex\' class=\'sex-form\'>Sex</label><br><div class=\'checkbox-group\'><div class=\'form-check\'><input type=\'checkbox\' class=\'male_control form-check-input\' id=\'male\' name=\'male\' value=\'Male\'><label for=\'male\' class=\'male-label form-check-label\'>male</label></div><div class=\'form-check\'><input type=\'checkbox\' class=\'female_control form-check-input\' id=\'female\' name=\'female\' value=\'Female\'><label for=\'female\' class=\'female-label form-check-label\'>female</label></div></div></div><br><button type=\"submit\">Submit</button></form>\";'),(4,'My KuKuBird Size Chart','1','2023-06-21 17:42:21','',_binary 's:965:\"<form><div class=\"form-group\"><label for=\'Name\' class=\'Name-control\'>Name</label><input type=\'text\' name=\'Name\' class=\'form-control name-control\' placeholder=\'Enter your name\' required ></div><br><div class=\"form-group\"><label for=\'Message\' class=\'Message-control\'>Message</label><textarea name=\'Message\' class=\'form-control message-control\' placeholder=\'Enter your message\' required ></textarea></div><br><div class=\"form-group\"><label for=\'Sex\' class=\'sex-form\'>Sex</label><br><div class=\'checkbox-group\'><div class=\'form-check\'><input type=\'checkbox\' class=\'male_control form-check-input\' id=\'male\' name=\'male\' value=\'Male\'><label for=\'male\' class=\'male-label form-check-label\'>male</label></div><div class=\'form-check\'><input type=\'checkbox\' class=\'female_control form-check-input\' id=\'female\' name=\'female\' value=\'Female\'><label for=\'female\' class=\'female-label form-check-label\'>female</label></div></div></div><br><button type=\"submit\">Submit</button></form>\";'),(5,'My KuKuBird Size Chart','1','2023-06-21 18:03:16','',_binary 's:965:\"<form><div class=\"form-group\"><label for=\'Name\' class=\'Name-control\'>Name</label><input type=\'text\' name=\'Name\' class=\'form-control name-control\' placeholder=\'Enter your name\' required ></div><br><div class=\"form-group\"><label for=\'Message\' class=\'Message-control\'>Message</label><textarea name=\'Message\' class=\'form-control message-control\' placeholder=\'Enter your message\' required ></textarea></div><br><div class=\"form-group\"><label for=\'Sex\' class=\'sex-form\'>Sex</label><br><div class=\'checkbox-group\'><div class=\'form-check\'><input type=\'checkbox\' class=\'male_control form-check-input\' id=\'male\' name=\'male\' value=\'Male\'><label for=\'male\' class=\'male-label form-check-label\'>male</label></div><div class=\'form-check\'><input type=\'checkbox\' class=\'female_control form-check-input\' id=\'female\' name=\'female\' value=\'Female\'><label for=\'female\' class=\'female-label form-check-label\'>female</label></div></div></div><br><button type=\"submit\">Submit</button></form>\";'),(6,'My KuKuBird Size Chart','1','2023-06-21 18:45:04','',_binary 's:965:\"<form><div class=\"form-group\"><label for=\'Name\' class=\'Name-control\'>Name</label><input type=\'text\' name=\'Name\' class=\'form-control name-control\' placeholder=\'Enter your name\' required ></div><br><div class=\"form-group\"><label for=\'Message\' class=\'Message-control\'>Message</label><textarea name=\'Message\' class=\'form-control message-control\' placeholder=\'Enter your message\' required ></textarea></div><br><div class=\"form-group\"><label for=\'Sex\' class=\'sex-form\'>Sex</label><br><div class=\'checkbox-group\'><div class=\'form-check\'><input type=\'checkbox\' class=\'male_control form-check-input\' id=\'male\' name=\'male\' value=\'Male\'><label for=\'male\' class=\'male-label form-check-label\'>male</label></div><div class=\'form-check\'><input type=\'checkbox\' class=\'female_control form-check-input\' id=\'female\' name=\'female\' value=\'Female\'><label for=\'female\' class=\'female-label form-check-label\'>female</label></div></div></div><br><button type=\"submit\">Submit</button></form>\";'),(7,'My KuKuBird Size Chart','1','2023-06-21 18:45:49','',_binary 's:965:\"<form><div class=\"form-group\"><label for=\'Name\' class=\'Name-control\'>Name</label><input type=\'text\' name=\'Name\' class=\'form-control name-control\' placeholder=\'Enter your name\' required ></div><br><div class=\"form-group\"><label for=\'Message\' class=\'Message-control\'>Message</label><textarea name=\'Message\' class=\'form-control message-control\' placeholder=\'Enter your message\' required ></textarea></div><br><div class=\"form-group\"><label for=\'Sex\' class=\'sex-form\'>Sex</label><br><div class=\'checkbox-group\'><div class=\'form-check\'><input type=\'checkbox\' class=\'male_control form-check-input\' id=\'male\' name=\'male\' value=\'Male\'><label for=\'male\' class=\'male-label form-check-label\'>male</label></div><div class=\'form-check\'><input type=\'checkbox\' class=\'female_control form-check-input\' id=\'female\' name=\'female\' value=\'Female\'><label for=\'female\' class=\'female-label form-check-label\'>female</label></div></div></div><br><button type=\"submit\">Submit</button></form>\";'),(8,'My KuKuBird Size Chart','1','2023-06-21 22:16:16','',_binary 's:965:\"<form><div class=\"form-group\"><label for=\'Name\' class=\'Name-control\'>Name</label><input type=\'text\' name=\'Name\' class=\'form-control name-control\' placeholder=\'Enter your name\' required ></div><br><div class=\"form-group\"><label for=\'Message\' class=\'Message-control\'>Message</label><textarea name=\'Message\' class=\'form-control message-control\' placeholder=\'Enter your message\' required ></textarea></div><br><div class=\"form-group\"><label for=\'Sex\' class=\'sex-form\'>Sex</label><br><div class=\'checkbox-group\'><div class=\'form-check\'><input type=\'checkbox\' class=\'male_control form-check-input\' id=\'male\' name=\'male\' value=\'Male\'><label for=\'male\' class=\'male-label form-check-label\'>male</label></div><div class=\'form-check\'><input type=\'checkbox\' class=\'female_control form-check-input\' id=\'female\' name=\'female\' value=\'Female\'><label for=\'female\' class=\'female-label form-check-label\'>female</label></div></div></div><br><button type=\"submit\">Submit</button></form>\";'),(9,'My KuKuBird Size Chart','1','2023-06-21 22:16:48','',_binary 's:965:\"<form><div class=\"form-group\"><label for=\'Name\' class=\'Name-control\'>Name</label><input type=\'text\' name=\'Name\' class=\'form-control name-control\' placeholder=\'Enter your name\' required ></div><br><div class=\"form-group\"><label for=\'Message\' class=\'Message-control\'>Message</label><textarea name=\'Message\' class=\'form-control message-control\' placeholder=\'Enter your message\' required ></textarea></div><br><div class=\"form-group\"><label for=\'Sex\' class=\'sex-form\'>Sex</label><br><div class=\'checkbox-group\'><div class=\'form-check\'><input type=\'checkbox\' class=\'male_control form-check-input\' id=\'male\' name=\'male\' value=\'Male\'><label for=\'male\' class=\'male-label form-check-label\'>male</label></div><div class=\'form-check\'><input type=\'checkbox\' class=\'female_control form-check-input\' id=\'female\' name=\'female\' value=\'Female\'><label for=\'female\' class=\'female-label form-check-label\'>female</label></div></div></div><br><button type=\"submit\">Submit</button></form>\";'),(10,'My KuKuBird Size Chart','1','2023-06-22 13:54:47','',_binary 's:965:\"<form><div class=\"form-group\"><label for=\'Name\' class=\'Name-control\'>Name</label><input type=\'text\' name=\'Name\' class=\'form-control name-control\' placeholder=\'Enter your name\' required ></div><br><div class=\"form-group\"><label for=\'Message\' class=\'Message-control\'>Message</label><textarea name=\'Message\' class=\'form-control message-control\' placeholder=\'Enter your message\' required ></textarea></div><br><div class=\"form-group\"><label for=\'Sex\' class=\'sex-form\'>Sex</label><br><div class=\'checkbox-group\'><div class=\'form-check\'><input type=\'checkbox\' class=\'male_control form-check-input\' id=\'male\' name=\'male\' value=\'Male\'><label for=\'male\' class=\'male-label form-check-label\'>male</label></div><div class=\'form-check\'><input type=\'checkbox\' class=\'female_control form-check-input\' id=\'female\' name=\'female\' value=\'Female\'><label for=\'female\' class=\'female-label form-check-label\'>female</label></div></div></div><br><button type=\"submit\">Submit</button></form>\";'),(11,'My KuKuBird Size Chart','1','2023-06-22 21:51:31','',_binary 'a:3:{s:4:\"name\";a:1:{s:5:\"group\";s:188:\"<div class=\'row-1 col-md-9 mt-5\'><label for=\'name\' >Name</label><input type=\"text\" name=\"name\" value=\"\" class=\"form-control\" id=\"name-control\" placeholder=\"Enter your name\" required></div>\";}s:7:\"message\";a:1:{s:5:\"group\";s:229:\"<div class=\'row-2 col-md-9 \'><label for=\'message\' class=\"message-label-control\">Message</label><textarea name=\"message\" value=\"1\" class=\"form-control message-control\" placeholder=\"Enter you message\" required=\"1\"></textarea></div>\";}s:8:\"sex-help\";a:1:{s:5:\"group\";s:639:\"<div class=\'row  \'><div class=\' col-md-2 \'><label for=\'sex-help\' >How to sex</label><p name=\"sex-help\" id=\"sex-helper\">Key in which sex group you are</p></div><div class=\' col-md-5 radio-control\'><label for=\'gender\' >Choose Gender:</label><br><div class=\'  form-check form-check-inline\'><input type=\"radio\" name=\"gender\" value=\"male\" id=\"male\" class=\"form-check-input\" ><label for=\'male\' class=\"form-check-label\">Male</label></div><div class=\'  form-check form-check-inline\'><input type=\"radio\" name=\"gender\" value=\"female\" id=\"female\" class=\"form-check-input\" ><label for=\'female\' class=\"form-check-label\">Female</label></div></div></div>\";}}'),(12,'My KuKuBird Size Chart','1','2023-06-23 22:28:45','',_binary 's:1001:\"<form method=\"POST\" action=\"/submit-form\"><div class=\"form-group\"><label for=\'Name\' class=\'Name-control\'>Name</label><input type=\'text\' name=\'Name\' class=\'form-control name-control\' placeholder=\'Enter your name\' required ></div><br><div class=\"form-group\"><label for=\'Message\' class=\'Message-control\'>Message</label><textarea name=\'Message\' class=\'form-control message-control\' placeholder=\'Enter your message\' required ></textarea></div><br><div class=\"form-group\"><label for=\'Sex\' class=\'sex-form\'>Sex</label><br><div class=\'checkbox-group\'><div class=\'form-check\'><input type=\'checkbox\' class=\'male_control form-check-input\' id=\'male\' name=\'male\' value=\'Male\'><label for=\'male\' class=\'male-label form-check-label\'>male</label></div><div class=\'form-check\'><input type=\'checkbox\' class=\'female_control form-check-input\' id=\'female\' name=\'female\' value=\'Female\'><label for=\'female\' class=\'female-label form-check-label\'>female</label></div></div></div><br><button type=\"submit\">Submit</button></form>\";'),(13,'Meow Meow Chart','1','2023-06-24 11:43:42','',_binary 'a:3:{s:4:\"name\";a:1:{s:5:\"group\";s:188:\"<div class=\'row-1 col-md-9 mt-5\'><label for=\'name\' >Name</label><input type=\"text\" name=\"name\" value=\"\" class=\"form-control\" id=\"name-control\" placeholder=\"Enter your name\" required></div>\";}s:7:\"message\";a:1:{s:5:\"group\";s:229:\"<div class=\'row-2 col-md-9 \'><label for=\'message\' class=\"message-label-control\">Message</label><textarea name=\"message\" value=\"1\" class=\"form-control message-control\" placeholder=\"Enter you message\" required=\"1\"></textarea></div>\";}s:8:\"sex-help\";a:1:{s:5:\"group\";s:639:\"<div class=\'row  \'><div class=\' col-md-2 \'><label for=\'sex-help\' >How to sex</label><p name=\"sex-help\" id=\"sex-helper\">Key in which sex group you are</p></div><div class=\' col-md-5 radio-control\'><label for=\'gender\' >Choose Gender:</label><br><div class=\'  form-check form-check-inline\'><input type=\"radio\" name=\"gender\" value=\"male\" id=\"male\" class=\"form-check-input\" ><label for=\'male\' class=\"form-check-label\">Male</label></div><div class=\'  form-check form-check-inline\'><input type=\"radio\" name=\"gender\" value=\"female\" id=\"female\" class=\"form-check-input\" ><label for=\'female\' class=\"form-check-label\">Female</label></div></div></div>\";}}'),(14,'My KuKuBird Size Chart','1','2023-06-24 23:53:15','',_binary 's:965:\"<form><div class=\"form-group\"><label for=\'Name\' class=\'Name-control\'>Name</label><input type=\'text\' name=\'Name\' class=\'form-control name-control\' placeholder=\'Enter your name\' required ></div><br><div class=\"form-group\"><label for=\'Message\' class=\'Message-control\'>Message</label><textarea name=\'Message\' class=\'form-control message-control\' placeholder=\'Enter your message\' required ></textarea></div><br><div class=\"form-group\"><label for=\'Sex\' class=\'sex-form\'>Sex</label><br><div class=\'checkbox-group\'><div class=\'form-check\'><input type=\'checkbox\' class=\'male_control form-check-input\' id=\'male\' name=\'male\' value=\'Male\'><label for=\'male\' class=\'male-label form-check-label\'>male</label></div><div class=\'form-check\'><input type=\'checkbox\' class=\'female_control form-check-input\' id=\'female\' name=\'female\' value=\'Female\'><label for=\'female\' class=\'female-label form-check-label\'>female</label></div></div></div><br><button type=\"submit\">Submit</button></form>\";');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
  `name` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey`
--

LOCK TABLES `survey` WRITE;
/*!40000 ALTER TABLE `survey` DISABLE KEYS */;
INSERT INTO `survey` VALUES (1,'test','testing123'),(2,'another1','ANOTHERANOTHER'),(6,'M??Bg/??0?ni??DB\'с?,?)?~???N??ƊJ???????37?я?^???vm??????R8D??f??O?V??6','???8_?^g?{??ϥ???<??`?$I???&??O\'?ev?܆????s??Gn????^?	??H????K??mp???z??ʄi?\"&%\'???\n'),(7,'u}???Jt???HM?????tt?Ã\Z???d??X?|/D???\ZW??OasV?A??0r?z??0?{??????>?i???r9','slN??%+=??>?p?<G+XĦ_?\"ˋ1?l2{?H??>\ZOX?\Z-;6????,F?}?Xmu??@?(v?E/۩̉???kT??~9/H9???Ƒ-/8'),(8,'PO(E!??o?Z\'l??y?]j?\0?t%?}\n????CU/???d\Z0$?N?t=????z?s??s??E????Qm???sb\0???w?0','G?E???????!???^Ȍ??m?N??5&???[?qr??g???$?2?$??p<?ϧ???8v֝:?????????I{??9Lc??+?&????!??{?fX'),(9,'?tzh?ۣ?tW????RQ?\r?깚???5???{?ڐ??^w?\'!???1???h??>KJ???Di?~EWf?k?????E?Q??','???????d?t?]??f??M??ϔ??M7?I?v????da?$??	*Fչ[?k???o??,s0???Z^???vKp???v5?j^n{?f??g'),(10,'?0???AWLWOG(&?%k??U ?R?<ЋM|??0??G???wA=?@*!;M?|?P>??Kq3T??gҌ?u???[,??ʂ???','hk	??2?7Ȁg?G????.???{??_c?h??n{???4?	???????????h?X???9?~2*׮ޏUF%??Jݙ,?{?Ͽ?s');
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

-- Dump completed on 2023-06-26 23:42:53
