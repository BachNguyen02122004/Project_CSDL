CREATE DATABASE  IF NOT EXISTS `os` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `os`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: os
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brand` (
  `ID` int NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (1,'Apple'),(2,'True Wireless'),(3,'Kanen '),(4,'MSI'),(5,'HP'),(6,'Lenovo'),(7,'Asus'),(8,'OPPO'),(9,'SAMSUNG'),(10,'VIVO'),(11,'XIAOMI'),(12,'NOKIA');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `danhmuc_sp`
--

DROP TABLE IF EXISTS `danhmuc_sp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `danhmuc_sp` (
  `DANHMUCSP_ID` int NOT NULL,
  `NAME` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`DANHMUCSP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `danhmuc_sp`
--

LOCK TABLES `danhmuc_sp` WRITE;
/*!40000 ALTER TABLE `danhmuc_sp` DISABLE KEYS */;
INSERT INTO `danhmuc_sp` VALUES (1,'LapTop'),(2,'Phone'),(3,'Tai nghe');
/*!40000 ALTER TABLE `danhmuc_sp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_detail` (
  `id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `gia_sp` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`ID`),
  CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail`
--

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
INSERT INTO `order_detail` VALUES (1,2,4,9900000),(2,3,1,990000),(3,1,6,27990000);
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `ID` int NOT NULL,
  `SUM` decimal(10,0) DEFAULT NULL,
  `STATUS` varchar(15) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,3,'1',1),(2,4,'0',2),(3,2,'1',2);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `ID` int NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `MIEUTA_SP` text,
  `GIA_SP` decimal(10,0) DEFAULT NULL,
  `NUMBER` int DEFAULT NULL,
  `IMAGE` varchar(100) DEFAULT NULL,
  `BRAND_ID` int DEFAULT NULL,
  `DANHMUCSP_ID` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `BRAND_ID` (`BRAND_ID`),
  KEY `DANHMUCSP_ID` (`DANHMUCSP_ID`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`BRAND_ID`) REFERENCES `brand` (`ID`),
  CONSTRAINT `product_ibfk_2` FOREIGN KEY (`DANHMUCSP_ID`) REFERENCES `danhmuc_sp` (`DANHMUCSP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Tai nghe Bluetooth AirPods Pro (2nd Gen) USB-C Charge Apple',NULL,990000,1,NULL,1,3),(2,'MSI Gaming GF63 Thin 11SC i5 11400H (664VN)',NULL,16490000,1,NULL,4,1),(3,'iPhone 14 Pro Max',NULL,29990000,1,NULL,1,2),(4,'OPPO Reno10 5G',NULL,9900000,1,NULL,8,2),(5,'Tai nghe Bluetooth True Wireless AVA+ Buds Life Rider GT07',NULL,440000,1,NULL,2,3),(6,'HP Gaming VICTUS 15 fa0144TX i5 12450H',NULL,27990000,1,NULL,5,1),(7,'Samsung Galaxy Z Fold5 5G',NULL,40990000,1,NULL,9,2),(8,'Lenovo Legion 5 15IAH7 i5 12500H',NULL,35490000,1,NULL,6,1),(9,'Tai nghe Bluetooth True Wireless AVA+ Buds Life Air 2',NULL,490000,1,NULL,3,3);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(22) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone` varchar(22) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Nguyen van A','243-HTM','0284389122','nva@gmail.com','user'),(2,'Pham van B','372-DL','047238234','pvb@gmail.com','user'),(3,'Tran van C',NULL,'09243824','Tvc@gmail.com','admin');
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

-- Dump completed on 2023-09-26 20:27:13
