-- MySQL dump 10.13  Distrib 8.0.33, for macos13.3 (arm64)
--
-- Host: localhost    Database: FormBuilder
-- ------------------------------------------------------
-- Server version	8.0.33

--
-- Current Database: `FormBuilder`
--

CREATE DATABASE `FormBuilder`;

USE `FormBuilder`;

--
-- Table structure for table `Form`
--

DROP TABLE IF EXISTS `Form`;
CREATE TABLE `Form` (
  `FormID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(300) NOT NULL DEFAULT '',
  `Version` varchar(100) NOT NULL DEFAULT '1',
  `Datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Description` varchar(1000) NOT NULL DEFAULT '',
  `Structure` blob NOT NULL,
  PRIMARY KEY (`FormID`)
);

--
-- Table structure for table `Response`
--

DROP TABLE IF EXISTS `Response`;
CREATE TABLE `Response` (
  `ResponseID` int NOT NULL AUTO_INCREMENT,
  `FormID` int NOT NULL,
  `Datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `User` varchar(300) NOT NULL,
  `Response` blob NOT NULL,
  PRIMARY KEY (`ResponseID`),
  KEY `Response_FK` (`FormID`),
  CONSTRAINT `Response_FK` FOREIGN KEY (`FormID`) REFERENCES `Form` (`FormID`)
) ;

-- Dump completed on 2023-05-27 20:19:21
