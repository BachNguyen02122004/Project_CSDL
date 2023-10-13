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
INSERT INTO `brand` VALUES (1,'Apple'),(2,'True Wireless'),(3,'Kanen '),(4,'MSI'),(5,'HP'),(6,'Lenovo'),(7,'Asus'),(8,'OPPO'),(9,'SAMSUNG'),(10,'VIVO'),(11,'XIAOMI'),(12,'NOKIA'),(13,'RAPOO'),(14,'DAREU'),(15,'Microsoft'),(16,'Logitech'),(17,'Corsair'),(18,'Razer'),(19,'BeFit'),(20,'Amazfit'),(21,'Honor'),(22,'LG'),(23,'Sony'),(24,'Fujifilm'),(25,'Canon'),(26,'Leica'),(27,'Nikon');
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
INSERT INTO `danhmuc_sp` VALUES (1,'LapTop'),(2,'Phone'),(3,'Tai nghe'),(4,'Chuot'),(5,'Ban phim co'),(6,'Dong ho'),(7,'Tivi '),(8,'Máy ảnh');
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
INSERT INTO `product` VALUES (1,'Tai nghe Bluetooth AirPods Pro (2nd Gen) USB-C Charge Apple',NULL,990000,1,'../image/earphone1.png',1,3),(2,'MSI Gaming GF63 Thin 11SC i5 11400H (664VN)',NULL,16490000,1,'../image/laptop1.png',4,1),(3,'iPhone 14 Pro Max',NULL,29990000,1,'../image/phone1.png',1,2),(4,'OPPO Reno10 5G',NULL,9900000,1,'../image/phone2.png',8,2),(5,'Tai nghe Bluetooth True Wireless AVA+ Buds Life Rider GT07',NULL,440000,1,'../image/earphone2.png',2,3),(6,'HP Gaming VICTUS 15 fa0144TX i5 12450H',NULL,27990000,1,'../image/laptop2.png',5,1),(7,'Samsung Galaxy Z Fold5 5G',NULL,40990000,1,'../image/phone3.png',9,2),(8,'Lenovo Legion 5 15IAH7 i5 12500H',NULL,35490000,1,'../image/laptop3.png',6,1),(9,'Tai nghe Bluetooth True Wireless AVA+ Buds Life Air 2',NULL,490000,1,'../image/earphone3.png',3,3),(10,'Asus TUF Gaming F15 FX506HX i5 11400H',NULL,23990000,1,'../image/laptop4.png',7,1),(11,'Tai nghe Bluetooth True Wireless AVA+ FreeGo A20',NULL,290000,1,'../image/earphone4.png',2,3),(12,'OPPO Find N2 Flip 5G',NULL,19000000,1,'../image/phone4.png',8,2),(13,'MSI Gaming GF63 Thin 12VE i5 12450H ( 460VN)',NULL,22490000,1,'../image/laptop5.png',4,1),(14,'vivo Y36',NULL,6290000,1,'../image/phone5.png',10,2),(15,'Tai nghe Bluetooth True Wireless HAVIT TW945',NULL,450000,1,'../image/earphone5.png',2,3),(16,'Lenovo LOQ Gaming 15IRH8 i5 13420H',NULL,28990000,1,'../image/laptop6.png',6,1),(17,'Xiaomi Redmi 12C',NULL,3590000,1,'../image/phone6.png',11,2),(18,'Tai nghe Bluetooth True Wireless AVA+ FreeGo Plus PT19',NULL,390000,1,'../image/earphone6.png',2,3),(19,'MSI Gaming GF66 12UCK i7 12650 (840VN)',NULL,27490000,1,'../image/laptop7.png',4,1),(20,'iPhone 11',NULL,11990000,1,'../image/phone7.png',1,2),(21,'Tai nghe Bluetooth True Wireless AVA+ DS206',NULL,790000,1,'../image/earphone7.png',2,3),(22,'Asus Gaming TUF Dash F15 FX517ZE i5 12450H (HN045W)',NULL,24990000,1,'../image/laptop8.png',7,1),(23,'Samsung Galaxy s23 Ultra 5G',NULL,31990000,1,'../image/phone8.png',9,2),(24,'Tai nghe Bluetooth True Wireless Baseus AirNora 2',NULL,1400000,1,'../image/earphone8.png',2,3),(25,'Asus Gaming ROG Strix G17 G713RW R9 6900HX (LL178W)',NULL,57990000,1,'../image/laptop9.png',7,1),(26,'Nokia 105',NULL,820000,1,'../image/phone9.png',12,2),(27,'Tai nghe Bluetooth True Wireless vivo Air XEW25',NULL,790000,1,'../image/earphone9.png',2,3),(28,'Lenovo Gaming Legion 5 16IRH8 i7 13700H (82YA00DTVN)',NULL,44990000,1,'../image/laptop10.png',6,1),(29,'Tai nghe Bluetooth Chup Tai Kanen K6',NULL,600000,1,'../image/earphone10.png',3,3),(30,'Chuot khong day Rapoo B2',NULL,150000,1,'../image/mouse1.png',13,4),(31,'Chuot khong day DareU LM106G',NULL,150000,1,'../image/mouse2.png',14,4),(32,'Chuot khong day Bluetooth Silent Rapoo M500',NULL,500000,1,'../image/mouse3.png',13,4),(33,'Chuot co day Gaming Asus TUF M3',NULL,550000,1,'../image/mouse4.png',7,4),(34,'Chuot Bluetooth Microsoft Arc',NULL,2600000,1,'../image/mouse5.png',15,4),(35,'Chuot Khong day Bluetooth Silent Rapoo M300',NULL,490000,1,'../image/mouse6.png',13,4),(36,'Chuot khong day Logitech M190',NULL,390000,1,'../image/mouse7.png',16,4),(37,'Chuot Bluetooth Microsoft Modern Mobile KTF',NULL,965000,1,'../image/mouse8.png',15,4),(38,'Chuot co day Gaming Corsair M55 RGB Pro',NULL,920000,1,'../image/mouse9.png',17,4),(39,'Chuot Bluetooth Apple MK2E3',NULL,2490000,1,'../image/mouse10.png',1,4),(40,'Ban phim co co Day Gaming Razer BlackWidow',NULL,3200000,1,'../image/keyboard1.png',18,5),(41,'Ban Phim Co Day Gaming Asus TUF k1',NULL,990000,1,'../image/keyboard2.png',7,5),(42,'Ban Phim Co Day Gaming Silent Razer BlackWidow Lite',NULL,2390000,1,'../image/keyboard3.png',18,5),(43,'Ban Phim Khong Day Bluetooth Rapoo 8000M',NULL,500000,1,'../image/keyboard4.png',13,5),(44,'Ban Phim Co Co Day Gaming Razer BlackWidow V3',NULL,3640000,1,'../image/keyboard5.png',18,5),(45,'Ban Phim Co Co Day Gaming Razer Huntsman Tournament',NULL,3550000,1,'../image/keyboard6.png',18,5),(46,'Ban Phim Co Co Day Gaming Corsair K68 RGB Mechanical',NULL,3100000,1,'../image/keyboard7.png',17,5),(47,'Ban Phim Co Day Gaming Rapoo V50S',NULL,390000,1,'../image/keyboard8.png',13,5),(48,'Ban Phim Co Bluetooth Dareu EK75 Pro',NULL,1390000,1,'../image/keyboard9.png',14,5),(49,'Ban Phim Co Co Day Dareu EK75',NULL,790000,1,'../image/keyboard10.png',14,5),(50,'Samsung Galaxy Watch5 40mm day silicone',NULL,5990000,1,'../image/watch1.png',9,6),(51,'Apple Watch SE 2022 40mm vien nhom day silicone',NULL,7490000,1,'../image/watch2.png',1,6),(52,'BeFit WatchS 45mm day silicone',NULL,1490000,1,'../image/watch3.png',19,6),(53,'AmazFit Bip 3 44.12mm day silicone',NULL,1190000,1,'../image/watch4.png',20,6),(54,'Xiaomi Watch S1 46.5mm day da',NULL,5990000,1,'../image/watch5.png',11,6),(55,'Honor Watch GS3 45.9mm day da',NULL,5990000,1,'../image/watch6.png',21,6),(56,'BeFit B3 44mm day silicone',NULL,1290000,1,'../image/watch7.png',19,6),(57,'Samsung Galaxy Watch4 40mm day silicone',NULL,3990000,1,'../image/watch8.png',9,6),(58,'Amazfit GTS 4 mini 41.8mm day silicone',NULL,2590000,1,'../image/watch9.png',20,6),(59,'Samsung Galaxy Watch4 LTE Classic 46mm day silicone',NULL,9900000,1,'../image/watch10.png',9,6),(60,'LG Smart TV NanoCell 55NANO76SQA',NULL,22900000,1,'../image/tivi1.png',22,7),(61,'Samsung Smart TV UA43AU7002',NULL,8390000,1,'../image/tivi2.png',9,7),(62,'Samsung Smart TV Crystal UHD UA65AU8100',NULL,16370000,1,'../image/tivi3.png',9,7),(63,'Sony Google TV KD-55X80K',NULL,17890000,1,'../image/tivi4.png',23,7),(64,'LG Smart TV 55UQ8000PSC',NULL,19990000,1,'../image/tivi5.png',22,7),(65,'Samsung Smart TV QLED QA50Q65A',NULL,14390000,1,'../image/tivi6.png',9,7),(66,'Samsung Smart TV CryStal UHD UA50AU8100',NULL,12390000,1,'../image/tivi7.png',9,7),(67,'Sony Google TV KD-50X75K',NULL,13890000,1,'../image/tivi8.png',23,7),(68,'Samsung Smart TV Crystal UHD UA55AU8100',NULL,13390000,1,'../image/tivi9.png',9,7),(69,'Samsung Smart TV Crystal UHD UA50AU7200',NULL,13890000,1,'../image/tivi10.png',9,7),(70,'May anh Fujifilm X-S20 (Body Only) | Chinh hang',NULL,31990000,1,'../image/camera1.png',24,8),(71,'May anh Canon EOS R3 (Body Only)',NULL,174990000,1,'../image/camera2.png',25,8),(72,'May anh Leica M11 (Silver)',NULL,238000000,1,'../image/camera3.png',26,8),(73,'May anh Canon EOS-1D X Mark III',NULL,158000000,1,'../image/camera4.png',25,8),(74,'May anh Canon EOS-R6 (Body Only) | Chinh hang',NULL,77880000,1,'../image/camera5.png',25,8),(75,'May anh Sony ALpha A7C (Black) +lens 28-60mm F/4-5.6 | Chinh hang',NULL,48990000,1,'../image/camera6.png',23,8),(76,'May anh Sony ALpha A9 Mark II | Chinh hang',NULL,99000000,1,'../image/camera7.png',23,8),(77,'May anh Nikon Z5 +Lens 24-200mm f/4-6.3',NULL,48690000,1,'../image/camera8.png',27,8),(78,'May anh Sony ZV-1 (Black) | Nhap Khau',NULL,17990000,1,'../image/camera9.png',23,8),(79,'May anh Sony Alpha A7R IVA (Nhap khau, Body Only)',NULL,63990000,1,'../image/camera10.png',23,8);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_detail`
--

DROP TABLE IF EXISTS `product_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_detail` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `chitiet_sp` text,
  `image_phu` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_detail`
--

LOCK TABLES `product_detail` WRITE;
/*!40000 ALTER TABLE `product_detail` DISABLE KEYS */;
INSERT INTO `product_detail` VALUES (1,4,NULL,'../image/phone2.1.png'),(2,4,NULL,'../image/phone2.2.png'),(3,4,NULL,'../image/phone2.3.png'),(4,4,NULL,'../image/phone2.4.png'),(5,4,NULL,'../image/phone2.5.png'),(6,7,NULL,'../image/phone3.1.png'),(7,7,NULL,'../image/phone3.2.png'),(8,7,NULL,'../image/phone3.3.png'),(9,7,NULL,'../image/phone3.4.png'),(10,7,NULL,'../image/phone3.5.png'),(11,12,NULL,'../image/phone4.1.png'),(12,12,NULL,'../image/phone4.2.png'),(13,12,NULL,'../image/phone4.3.png'),(14,12,NULL,'../image/phone4.4.png'),(15,12,NULL,'../image/phone4.5.png'),(16,14,NULL,'../image/phone5.1.png'),(17,14,NULL,'../image/phone5.2.png'),(18,14,NULL,'../image/phone5.3.png'),(19,14,NULL,'../image/phone5.4.png'),(20,14,NULL,'../image/phone5.5.png'),(21,17,NULL,'../image/phone6.1.png'),(22,17,NULL,'../image/phone6.2.png'),(23,17,NULL,'../image/phone6.3.png'),(24,17,NULL,'../image/phone6.4.png'),(25,17,NULL,'../image/phone6.5.png'),(26,20,NULL,'../image/phone7.1.png'),(27,20,NULL,'../image/phone7.2.png'),(28,20,NULL,'../image/phone7.3.png'),(29,20,NULL,'../image/phone7.4.png'),(30,20,NULL,'../image/phone7.5.png'),(31,23,NULL,'../image/phone8.1.png'),(32,23,NULL,'../image/phone8.2.png'),(33,23,NULL,'../image/phone8.3.png'),(34,23,NULL,'../image/phone8.4.png'),(35,23,NULL,'../image/phone8.5.png'),(36,26,NULL,'../image/phone9.1.png'),(37,26,NULL,'../image/phone9.2.png'),(38,26,NULL,'../image/phone9.3.png'),(39,26,NULL,'../image/phone9.4.png'),(40,26,NULL,'../image/phone9.5.png');
/*!40000 ALTER TABLE `product_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_img`
--

DROP TABLE IF EXISTS `product_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_img` (
  `productID` int DEFAULT NULL,
  `product_imgIMAGE` varchar(100) DEFAULT NULL,
  `product_imgID` int NOT NULL,
  PRIMARY KEY (`product_imgID`),
  KEY `productID` (`productID`),
  CONSTRAINT `product_img_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_img`
--

LOCK TABLES `product_img` WRITE;
/*!40000 ALTER TABLE `product_img` DISABLE KEYS */;
INSERT INTO `product_img` VALUES (3,'../image/phone1.1.png',1),(3,'../image/phone1.2.png',2),(3,'../image/phone1.3.png',3),(3,'../image/phone1.4.png',4),(3,'../image/phone1.5.png',5),(4,'../image/phone2.1.png',6),(4,'../image/phone2.2.png',7),(4,'../image/phone2.3.png',8),(4,'../image/phone2.4.png',9),(4,'../image/phone2.5.png',10),(7,'../image/phone3.1.png',11),(7,'../image/phone3.2.png',12),(7,'../image/phone3.3.png',13),(7,'../image/phone3.4.png',14),(7,'../image/phone3.5.png',15),(12,'../image/phone4.1.png',16),(12,'../image/phone4.2.png',17),(12,'../image/phone4.3.png',18),(12,'../image/phone4.4.png',19),(12,'../image/phone4.5.png',20),(14,'../image/phone5.1.png',21),(14,'../image/phone5.2.png',22),(14,'../image/phone5.3.png',23),(14,'../image/phone5.4.png',24),(14,'../image/phone5.5.png',25),(17,'../image/phone6.1.png',26),(17,'../image/phone6.2.png',27),(17,'../image/phone6.3.png',28),(17,'../image/phone6.4.png',29),(17,'../image/phone6.5.png',30),(20,'../image/phone7.1.png',31),(20,'../image/phone7.2.png',32),(20,'../image/phone7.3.png',33),(20,'../image/phone7.4.png',34),(20,'../image/phone7.5.png',35),(23,'../image/phone8.1.png',36),(23,'../image/phone8.2.png',37),(23,'../image/phone8.3.png',38),(23,'../image/phone8.4.png',39),(23,'../image/phone8.5.png',40),(26,'../image/phone9.1.png',41),(26,'../image/phone9.2.png',42),(26,'../image/phone9.3.png',43),(26,'../image/phone9.4.png',44),(26,'../image/phone9.5.png',45),(2,'../image/laptop1.1.png',46),(2,'../image/laptop1.2.png',47),(2,'../image/laptop1.3.png',48),(2,'../image/laptop1.4.png',49),(2,'../image/laptop1.5.png',50),(6,'../image/laptop2.1.png',51),(6,'../image/laptop2.2.png',52),(6,'../image/laptop2.3.png',53),(6,'../image/laptop2.4.png',54),(6,'../image/laptop2.5.png',55),(8,'../image/laptop3.1.png',56),(8,'../image/laptop3.2.png',57),(8,'../image/laptop3.3.png',58),(8,'../image/laptop3.4.png',59),(8,'../image/laptop3.5.png',60),(10,'../image/laptop4.1.png',61),(10,'../image/laptop4.2.png',62),(10,'../image/laptop4.3.png',63),(10,'../image/laptop4.4.png',64),(10,'../image/laptop4.5.png',65),(13,'../image/laptop5.1.png',66),(13,'../image/laptop5.2.png',67),(13,'../image/laptop5.3.png',68),(13,'../image/laptop5.4.png',69),(13,'../image/laptop5.5.png',70),(16,'../image/laptop6.1.png',71),(16,'../image/laptop6.2.png',72),(16,'../image/laptop6.3.png',73),(16,'../image/laptop6.4.png',74),(16,'../image/laptop6.5.png',75),(19,'../image/laptop7.1.png',76),(19,'../image/laptop7.2.png',77),(19,'../image/laptop7.3.png',78),(19,'../image/laptop7.4.png',79),(19,'../image/laptop7.5.png',80),(22,'../image/laptop8.1.png',81),(22,'../image/laptop8.2.png',82),(22,'../image/laptop8.3.png',83),(22,'../image/laptop8.4.png',84),(22,'../image/laptop8.5.png',85),(25,'../image/laptop9.1.png',86),(25,'../image/laptop9.2.png',87),(25,'../image/laptop9.3.png',88),(25,'../image/laptop9.4.png',89),(25,'../image/laptop9.5.png',90),(28,'../image/laptop10.1.png',91),(28,'../image/laptop10.2.png',92),(28,'../image/laptop10.3.png',93),(28,'../image/laptop10.4.png',94),(28,'../image/laptop10.5.png',95),(1,'../image/earphone1.1.png',96),(1,'../image/earphone1.2.png',97),(1,'../image/earphone1.3.png',98),(1,'../image/earphone1.4.png',99),(1,'../image/earphone1.5.png',100),(5,'../image/earphone2.1.png',101),(5,'../image/earphone2.2.png',102),(5,'../image/earphone2.3.png',103),(5,'../image/earphone2.4.png',104),(5,'../image/earphone2.5.png',105),(9,'../image/earphone3.1.png',106),(9,'../image/earphone3.2.png',107),(9,'../image/earphone3.3.png',108),(9,'../image/earphone3.4.png',109),(9,'../image/earphone3.5.png',110),(11,'../image/earphone4.1.png',111),(11,'../image/earphone4.2.png',112),(11,'../image/earphone4.3.png',113),(11,'../image/earphone4.4.png',114),(11,'../image/earphone4.5.png',115),(15,'../image/earphone5.1.png',116),(15,'../image/earphone5.2.png',117),(15,'../image/earphone5.3.png',118),(15,'../image/earphone5.4.png',119),(15,'../image/earphone5.5.png',120),(18,'../image/earphone6.1.png',121),(18,'../image/earphone6.2.png',122),(18,'../image/earphone6.3.png',123),(18,'../image/earphone6.4.png',124),(18,'../image/earphone6.5.png',125),(21,'../image/earphone7.1.png',126),(21,'../image/earphone7.2.png',127),(21,'../image/earphone7.3.png',128),(21,'../image/earphone7.4.png',129),(21,'../image/earphone7.5.png',130),(24,'../image/earphone8.1.png',131),(24,'../image/earphone8.2.png',132),(24,'../image/earphone8.3.png',133),(24,'../image/earphone8.4.png',134),(24,'../image/earphone8.5.png',135),(27,'../image/earphone9.1.png',136),(27,'../image/earphone9.2.png',137),(27,'../image/earphone9.3.png',138),(27,'../image/earphone9.4.png',139),(27,'../image/earphone9.5.png',140),(29,'../image/earphone10.1.png',141),(29,'../image/earphone10.2.png',142),(29,'../image/earphone10.3.png',143),(29,'../image/earphone10.4.png',144),(29,'../image/earphone10.5.png',145),(30,'../image/mouse1.1.png',146),(30,'../image/mouse1.2.png',147),(30,'../image/mouse1.3.png',148),(30,'../image/mouse1.4.png',149),(30,'../image/mouse1.5.png',150),(31,'../image/mouse2.1.png',151),(31,'../image/mouse2.2.png',152),(31,'../image/mouse2.3.png',153),(31,'../image/mouse2.4.png',154),(31,'../image/mouse2.5.png',155),(32,'../image/mouse3.1.png',156),(32,'../image/mouse3.2.png',157),(32,'../image/mouse3.3.png',158),(32,'../image/mouse3.4.png',159),(32,'../image/mouse3.5.png',160),(33,'../image/mouse4.1.png',161),(33,'../image/mouse4.2.png',162),(33,'../image/mouse4.3.png',163),(33,'../image/mouse4.4.png',164),(33,'../image/mouse4.5.png',165),(34,'../image/mouse5.1.png',166),(34,'../image/mouse5.2.png',167),(34,'../image/mouse5.3.png',168),(34,'../image/mouse5.4.png',169),(34,'../image/mouse5.5.png',170),(35,'../image/mouse6.1.png',171),(35,'../image/mouse6.2.png',172),(35,'../image/mouse6.3.png',173),(35,'../image/mouse6.4.png',174),(35,'../image/mouse6.5.png',175),(36,'../image/mouse7.1.png',176),(36,'../image/mouse7.2.png',177),(36,'../image/mouse7.3.png',178),(36,'../image/mouse7.4.png',179),(36,'../image/mouse7.5.png',180),(37,'../image/mouse8.1.png',181),(37,'../image/mouse8.2.png',182),(37,'../image/mouse8.3.png',183),(37,'../image/mouse8.4.png',184),(37,'../image/mouse8.5.png',185),(38,'../image/mouse9.1.png',186),(38,'../image/mouse9.2.png',187),(38,'../image/mouse9.3.png',188),(38,'../image/mouse9.4.png',189),(38,'../image/mouse9.5.png',190),(39,'../image/mouse10.1.png',191),(39,'../image/mouse10.2.png',192),(39,'../image/mouse10.3.png',193),(39,'../image/mouse10.4.png',194),(39,'../image/mouse10.5.png',195),(40,'../image/keyboard1.1.png',196),(40,'../image/keyboard1.2.png',197),(40,'../image/keyboard1.3.png',198),(40,'../image/keyboard1.4.png',199),(40,'../image/keyboard1.5.png',200),(41,'../image/keyboard2.1.png',201),(41,'../image/keyboard2.2.png',202),(41,'../image/keyboard2.3.png',203),(41,'../image/keyboard2.4.png',204),(41,'../image/keyboard2.5.png',205),(42,'../image/keyboard3.1.png',206),(42,'../image/keyboard3.2.png',207),(42,'../image/keyboard3.3.png',208),(42,'../image/keyboard3.4.png',209),(42,'../image/keyboard3.5.png',210),(43,'../image/keyboard4.1.png',211),(43,'../image/keyboard4.2.png',212),(43,'../image/keyboard4.3.png',213),(43,'../image/keyboard4.4.png',214),(43,'../image/keyboard4.5.png',215),(44,'../image/keyboard5.1.png',216),(44,'../image/keyboard5.2.png',217),(44,'../image/keyboard5.3.png',218),(44,'../image/keyboard5.4.png',219),(44,'../image/keyboard5.5.png',220),(45,'../image/keyboard6.1.png',221),(45,'../image/keyboard6.2.png',222),(45,'../image/keyboard6.3.png',223),(45,'../image/keyboard6.4.png',224),(45,'../image/keyboard6.5.png',225),(46,'../image/keyboard7.1.png',226),(46,'../image/keyboard7.2.png',227),(46,'../image/keyboard7.3.png',228),(46,'../image/keyboard7.4.png',229),(46,'../image/keyboard7.5.png',230),(47,'../image/keyboard8.1.png',231),(47,'../image/keyboard8.2.png',232),(47,'../image/keyboard8.3.png',233),(47,'../image/keyboard8.4.png',234),(47,'../image/keyboard8.5.png',235),(48,'../image/keyboard9.1.png',236),(48,'../image/keyboard9.2.png',237),(48,'../image/keyboard9.3.png',238),(48,'../image/keyboard9.4.png',239),(48,'../image/keyboard9.5.png',240),(49,'../image/keyboard10.1.png',241),(49,'../image/keyboard10.2.png',242),(49,'../image/keyboard10.3.png',243),(49,'../image/keyboard10.4.png',244),(49,'../image/keyboard10.5.png',245),(50,'../image/watch1.1.png',246),(50,'../image/watch1.2.png',247),(50,'../image/watch1.3.png',248),(50,'../image/watch1.4.png',249),(50,'../image/watch1.5.png',250),(51,'../image/watch2.1.png',251),(51,'../image/watch2.2.png',252),(51,'../image/watch2.3.png',253),(51,'../image/watch2.4.png',254),(51,'../image/watch2.5.png',255),(52,'../image/watch3.1.png',256),(52,'../image/watch3.2.png',257),(52,'../image/watch3.3.png',258),(52,'../image/watch3.4.png',259),(52,'../image/watch3.5.png',260),(53,'../image/watch4.1.png',261),(53,'../image/watch4.2.png',262),(53,'../image/watch4.3.png',263),(53,'../image/watch4.4.png',264),(53,'../image/watch4.5.png',265),(54,'../image/watch5.1.png',266),(54,'../image/watch5.2.png',267),(54,'../image/watch5.3.png',268),(54,'../image/watch5.4.png',269),(54,'../image/watch5.5.png',270),(55,'../image/watch6.1.png',271),(55,'../image/watch6.2.png',272),(55,'../image/watch6.3.png',273),(55,'../image/watch6.4.png',274),(55,'../image/watch6.5.png',275),(56,'../image/watch7.1.png',276),(56,'../image/watch7.2.png',277),(56,'../image/watch7.3.png',278),(56,'../image/watch7.4.png',279),(56,'../image/watch7.5.png',280),(57,'../image/watch8.1.png',281),(57,'../image/watch8.2.png',282),(57,'../image/watch8.3.png',283),(57,'../image/watch8.4.png',284),(57,'../image/watch8.5.png',285),(58,'../image/watch9.1.png',286),(58,'../image/watch9.2.png',287),(58,'../image/watch9.3.png',288),(58,'../image/watch9.4.png',289),(58,'../image/watch9.5.png',290),(59,'../image/watch10.1.png',291),(59,'../image/watch10.2.png',292),(59,'../image/watch10.3.png',293),(59,'../image/watch10.4.png',294),(59,'../image/watch10.5.png',295),(60,'../image/tivi1.1.png',296),(60,'../image/tivi1.2.png',297),(60,'../image/tivi1.3.png',298),(60,'../image/tivi1.4.png',299),(60,'../image/tivi1.5.png',300),(61,'../image/tivi2.1.png',301),(61,'../image/tivi2.2.png',302),(61,'../image/tivi2.3.png',303),(61,'../image/tivi2.4.png',304),(61,'../image/tivi2.5.png',305),(62,'../image/tivi3.1.png',306),(62,'../image/tivi3.2.png',307),(62,'../image/tivi3.3.png',308),(62,'../image/tivi3.4.png',309),(62,'../image/tivi3.5.png',310),(63,'../image/tivi4.1.png',311),(63,'../image/tivi4.2.png',312),(63,'../image/tivi4.3.png',313),(63,'../image/tivi4.4.png',314),(63,'../image/tivi4.5.png',315),(64,'../image/tivi5.1.png',316),(64,'../image/tivi5.2.png',317),(64,'../image/tivi5.3.png',318),(64,'../image/tivi5.4.png',319),(64,'../image/tivi5.5.png',320),(65,'../image/tivi6.1.png',321),(65,'../image/tivi6.2.png',322),(65,'../image/tivi6.3.png',323),(65,'../image/tivi6.4.png',324),(65,'../image/tivi6.5.png',325),(66,'../image/tivi7.1.png',326),(66,'../image/tivi7.2.png',327),(66,'../image/tivi7.3.png',328),(66,'../image/tivi7.4.png',329),(66,'../image/tivi7.5.png',330),(67,'../image/tivi8.1.png',331),(67,'../image/tivi8.2.png',332),(67,'../image/tivi8.3.png',333),(67,'../image/tivi8.4.png',334),(67,'../image/tivi8.5.png',335),(68,'../image/tivi9.1.png',336),(68,'../image/tivi9.2.png',337),(68,'../image/tivi9.3.png',338),(68,'../image/tivi9.4.png',339),(68,'../image/tivi9.5.png',340),(69,'../image/tivi10.1.png',341),(69,'../image/tivi10.2.png',342),(69,'../image/tivi10.3.png',343),(69,'../image/tivi10.4.png',344),(69,'../image/tivi10.5.png',345),(70,'../image/camera1.1.png',346),(70,'../image/camera1.2.png',347),(70,'../image/camera1.3.png',348),(70,'../image/camera1.4.png',349),(70,'../image/camera1.5.png',350),(71,'../image/camera2.1.png',351),(71,'../image/camera2.2.png',352),(71,'../image/camera2.3.png',353),(71,'../image/camera2.4.png',354),(71,'../image/camera2.5.png',355),(72,'../image/camera3.1.png',356),(72,'../image/camera3.2.png',357),(72,'../image/camera3.3.png',358),(72,'../image/camera3.4.png',359),(72,'../image/camera3.5.png',360),(73,'../image/camera4.1.png',361),(73,'../image/camera4.2.png',362),(73,'../image/camera4.3.png',363),(73,'../image/camera4.4.png',364),(73,'../image/camera4.5.png',365),(74,'../image/camera5.1.png',366),(74,'../image/camera5.2.png',367),(74,'../image/camera5.3.png',368),(74,'../image/camera5.4.png',369),(74,'../image/camera5.5.png',370),(75,'../image/camera6.1.png',371),(75,'../image/camera6.2.png',372),(75,'../image/camera6.3.png',373),(75,'../image/camera6.4.png',374),(75,'../image/camera6.5.png',375),(76,'../image/camera7.1.png',376),(76,'../image/camera7.2.png',377),(76,'../image/camera7.3.png',378),(76,'../image/camera7.4.png',379),(76,'../image/camera7.5.png',380),(77,'../image/camera8.1.png',381),(77,'../image/camera8.2.png',382),(77,'../image/camera8.3.png',383),(77,'../image/camera8.4.png',384),(77,'../image/camera8.5.png',385),(78,'../image/camera9.1.png',386),(78,'../image/camera9.2.png',387),(78,'../image/camera9.3.png',388),(78,'../image/camera9.4.png',389),(78,'../image/camera9.5.png',390),(79,'../image/camera10.1.png',391),(79,'../image/camera10.2.png',392),(79,'../image/camera10.3.png',393),(79,'../image/camera10.4.png',394),(79,'../image/camera10.5.png',395);
/*!40000 ALTER TABLE `product_img` ENABLE KEYS */;
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

-- Dump completed on 2023-10-13 14:59:43
