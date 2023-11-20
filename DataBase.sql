-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: test_project
-- ------------------------------------------------------
-- Server version	8.1.0

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
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `address` (
  `id` int NOT NULL,
  `address_line1` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address_line2` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `postal_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `name` char(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (1,'hagd vuagdvs',NULL,NULL,'1938128319','xhadwb d'),(2,'asjdbadbhsa',NULL,NULL,'291030122','ajdhad');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_shopcart_user` (`user_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (1,1),(2,2),(3,3),(4,4),(5,5);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_detail`
--

DROP TABLE IF EXISTS `cart_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_detail` (
  `id` int NOT NULL,
  `cart_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `is_selected` tinyint(1) DEFAULT NULL,
  `option_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_shopcartitem_shopcart` (`cart_id`),
  KEY `fk_shopcartitem_proditem` (`product_id`),
  KEY `cart_detail_variation_opt` (`option_id`),
  CONSTRAINT `cart_detail_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  CONSTRAINT `cart_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `cart_detail_variation_opt` FOREIGN KEY (`option_id`) REFERENCES `variation_option` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_detail`
--

LOCK TABLES `cart_detail` WRITE;
/*!40000 ALTER TABLE `cart_detail` DISABLE KEYS */;
INSERT INTO `cart_detail` VALUES (1,3,25,3,1,2),(2,3,2,1,1,1),(3,3,4,2,0,4),(4,3,63,1,0,NULL),(5,3,63,1,0,NULL),(6,3,63,1,0,NULL),(7,3,63,4,0,NULL),(8,3,63,1,0,NULL),(9,3,63,1,0,NULL),(10,3,63,3,0,22);
/*!40000 ALTER TABLE `cart_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `shipping_address` int DEFAULT NULL,
  `order_total` int DEFAULT NULL,
  `order_status` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_shoporder_user` (`user_id`),
  KEY `fk_shoporder_shipaddress` (`shipping_address`),
  KEY `fk_shoporder_status` (`order_status`),
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`shipping_address`) REFERENCES `address` (`id`),
  CONSTRAINT `order_ibfk_3` FOREIGN KEY (`order_status`) REFERENCES `order_status` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `order_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,3,'2023-11-19 12:05:07',2,1,1),(2,3,'2023-11-19 12:08:25',2,1,1),(3,3,'2023-11-19 12:09:29',2,0,1),(4,3,'2023-11-19 12:10:27',2,1,1),(5,3,'2023-11-19 12:10:52',2,1,1),(6,3,'2023-11-20 18:07:19',2,2,0),(7,3,'2023-11-20 19:04:18',2,1,0),(8,3,'2023-11-20 19:04:45',2,1,0),(9,3,'2023-11-20 19:05:54',2,1,0),(10,3,'2023-11-20 19:06:58',1,1,0),(11,3,'2023-11-20 19:26:24',1,1,0),(12,3,'2023-11-20 19:27:06',2,1,0);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_details` (
  `product_id` int NOT NULL,
  `order_id` int NOT NULL,
  `quantity` int DEFAULT NULL,
  `option_id` int NOT NULL,
  PRIMARY KEY (`product_id`,`order_id`,`option_id`),
  KEY `fk_orderline_proditem` (`product_id`),
  KEY `fk_orderline_order` (`order_id`),
  KEY `option_id` (`option_id`),
  CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`option_id`) REFERENCES `variation_option` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (3,9,1,4),(3,10,1,4),(4,1,1,6),(4,2,1,6),(4,4,1,6),(4,5,1,4),(4,11,1,4),(7,6,3,5),(7,8,1,4),(7,12,1,4),(32,6,3,12),(48,7,1,13);
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_status` (
  `id` int NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_status`
--

LOCK TABLES `order_status` WRITE;
/*!40000 ALTER TABLE `order_status` DISABLE KEYS */;
INSERT INTO `order_status` VALUES (0,'Đang chuẩn bị hàng'),(1,'Đang giao hàng'),(2,'Đã nhận hàng'),(3,'Đã hủy');
/*!40000 ALTER TABLE `order_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL,
  `productline_id` int DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `description` varchar(4000) DEFAULT NULL,
  `quantity_in_stock` int DEFAULT NULL,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productline_id` (`productline_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`productline_id`) REFERENCES `productline` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,3,'Tai nghe Bluetooth AirPods Pro (2nd Gen) USB-C Charge Apple',NULL,931,990000),(2,1,'MSI Gaming GF63 Thin 11SC i5 11400H (664VN)',NULL,423,16490000),(3,2,'iPhone 14 Pro Max',NULL,486,29990000),(4,2,'OPPO Reno10 5G',NULL,99,9900000),(5,3,'Tai nghe Bluetooth True Wireless AVA+ Buds Life Rider GT07',NULL,914,440000),(6,1,'HP Gaming VICTUS 15 fa0144TX i5 12450H',NULL,218,27990000),(7,2,'Samsung Galaxy Z Fold5 5G',NULL,597,40990000),(8,1,'Lenovo Legion 5 15IAH7 i5 12500H',NULL,133,35490000),(9,3,'Tai nghe Bluetooth True Wireless AVA+ Buds Life Air 2',NULL,413,490000),(10,1,'Asus TUF Gaming F15 FX506HX i5 11400H',NULL,921,23990000),(11,3,'Tai nghe Bluetooth True Wireless AVA+ FreeGo A20',NULL,349,290000),(12,2,'OPPO Find N2 Flip 5G',NULL,874,19000000),(13,1,'MSI Gaming GF63 Thin 12VE i5 12450H ( 460VN)',NULL,577,22490000),(14,2,'vivo Y36',NULL,290,6290000),(15,3,'Tai nghe Bluetooth True Wireless HAVIT TW945',NULL,924,450000),(16,1,'Lenovo LOQ Gaming 15IRH8 i5 13420H',NULL,717,28990000),(17,2,'Xiaomi Redmi 12C',NULL,163,3590000),(18,3,'Tai nghe Bluetooth True Wireless AVA+ FreeGo Plus PT19',NULL,152,390000),(19,1,'MSI Gaming GF66 12UCK i7 12650 (840VN)',NULL,265,27490000),(20,2,'iPhone 11',NULL,288,11990000),(21,3,'Tai nghe Bluetooth True Wireless AVA+ DS206',NULL,908,790000),(22,1,'Asus Gaming TUF Dash F15 FX517ZE i5 12450H (HN045W)',NULL,853,24990000),(23,2,'Samsung Galaxy s23 Ultra 5G',NULL,298,31990000),(24,3,'Tai nghe Bluetooth True Wireless Baseus AirNora 2',NULL,787,1400000),(25,1,'Asus Gaming ROG Strix G17 G713RW R9 6900HX (LL178W)',NULL,606,57990000),(26,2,'Nokia 105',NULL,789,820000),(27,3,'Tai nghe Bluetooth True Wireless vivo Air XEW25',NULL,527,790000),(28,1,'Lenovo Gaming Legion 5 16IRH8 i7 13700H (82YA00DTVN)',NULL,860,44990000),(29,3,'Tai nghe Bluetooth Chup Tai Kanen K6',NULL,990,600000),(30,4,'Chuot khong day Rapoo B2',NULL,933,150000),(31,4,'Chuot khong day DareU LM106G',NULL,822,150000),(32,4,'Chuot khong day Bluetooth Silent Rapoo M500',NULL,408,500000),(33,4,'Chuot co day Gaming Asus TUF M3',NULL,632,550000),(34,4,'Chuot Bluetooth Micrprojectoft Arc',NULL,299,2600000),(35,4,'Chuot Khong day Bluetooth Silent Rapoo M300',NULL,774,490000),(36,4,'Chuot khong day Logitech M190',NULL,723,390000),(37,4,'Chuot Bluetooth Micrprojectoft Modern Mobile KTF',NULL,434,965000),(38,4,'Chuot co day Gaming Corsair M55 RGB Pro',NULL,260,920000),(39,4,'Chuot Bluetooth Apple MK2E3',NULL,942,2490000),(40,5,'Ban phim co co Day Gaming Razer BlackWidow',NULL,535,3200000),(41,5,'Ban Phim Co Day Gaming Asus TUF k1',NULL,117,990000),(42,5,'Ban Phim Co Day Gaming Silent Razer BlackWidow Lite',NULL,101,2390000),(43,5,'Ban Phim Khong Day Bluetooth Rapoo 8000M',NULL,692,500000),(44,5,'Ban Phim Co Co Day Gaming Razer BlackWidow V3',NULL,246,3640000),(45,5,'Ban Phim Co Co Day Gaming Razer Huntsman Tournament',NULL,371,3550000),(46,5,'Ban Phim Co Co Day Gaming Corsair K68 RGB Mechanical',NULL,928,3100000),(47,5,'Ban Phim Co Day Gaming Rapoo V50S',NULL,377,390000),(48,5,'Ban Phim Co Bluetooth Dareu EK75 Pro',NULL,750,1390000),(49,5,'Ban Phim Co Co Day Dareu EK75',NULL,975,790000),(50,6,'Samsung Galaxy Watch5 40mm day silicone',NULL,462,5990000),(51,6,'Apple Watch SE 2022 40mm vien nhom day silicone',NULL,977,7490000),(52,6,'BeFit WatchS 45mm day silicone',NULL,477,1490000),(53,6,'AmazFit Bip 3 44.12mm day silicone',NULL,347,1190000),(54,6,'Xiaomi Watch S1 46.5mm day da',NULL,564,5990000),(55,6,'Honor Watch GS3 45.9mm day da',NULL,678,5990000),(56,6,'BeFit B3 44mm day silicone',NULL,997,1290000),(57,6,'Samsung Galaxy Watch4 40mm day silicone',NULL,658,3990000),(58,6,'Amazfit GTS 4 mini 41.8mm day silicone',NULL,382,2590000),(59,6,'Samsung Galaxy Watch4 LTE Classic 46mm day silicone',NULL,766,9900000),(60,7,'LG Smart TV NanoCell 55NANO76SQA',NULL,117,22900000),(61,7,'Samsung Smart TV UA43AU7002',NULL,465,8390000),(62,7,'Samsung Smart TV Crystal UHD UA65AU8100',NULL,881,16370000),(63,7,'Sony Google TV KD-55X80K',NULL,437,17890000),(64,7,'LG Smart TV 55UQ8000PSC',NULL,487,19990000),(65,7,'Samsung Smart TV QLED QA50Q65A',NULL,142,14390000),(66,7,'Samsung Smart TV CryStal UHD UA50AU8100',NULL,348,12390000),(67,7,'Sony Google TV KD-50X75K',NULL,572,13890000),(68,7,'Samsung Smart TV Crystal UHD UA55AU8100',NULL,655,13390000),(69,7,'Samsung Smart TV Crystal UHD UA50AU7200',NULL,290,13890000),(70,8,'May anh Fujifilm X-S20 (Body Only) | Chinh hang',NULL,763,31990000),(71,8,'May anh Canon Eproject R3 (Body Only)',NULL,613,174990000),(72,8,'May anh Leica M11 (Silver)',NULL,927,238000000),(73,8,'May anh Canon Eproject-1D X Mark III',NULL,924,158000000),(74,8,'May anh Canon Eproject-R6 (Body Only) | Chinh hang',NULL,617,77880000),(75,8,'May anh Sony ALpha A7C (Black) +lens 28-60mm F/4-5.6 | Chinh hang',NULL,178,48990000),(76,8,'May anh Sony ALpha A9 Mark II | Chinh hang',NULL,688,99000000),(77,8,'May anh Nikon Z5 +Lens 24-200mm f/4-6.3',NULL,687,48690000),(78,8,'May anh Sony ZV-1 (Black) | Nhap Khau',NULL,917,17990000),(79,8,'May anh Sony Alpha A7R IVA (Nhap khau, Body Only)',NULL,513,63990000);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_configuration`
--

DROP TABLE IF EXISTS `product_configuration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_configuration` (
  `product_id` int NOT NULL,
  `variation_option_id` int NOT NULL,
  PRIMARY KEY (`product_id`,`variation_option_id`),
  KEY `fk_prodconf_proditem` (`product_id`),
  KEY `fk_prodconf_varoption` (`variation_option_id`),
  CONSTRAINT `fk_prodconf_varoption` FOREIGN KEY (`variation_option_id`) REFERENCES `variation_option` (`id`),
  CONSTRAINT `product_configuration_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_configuration`
--

LOCK TABLES `product_configuration` WRITE;
/*!40000 ALTER TABLE `product_configuration` DISABLE KEYS */;
INSERT INTO `product_configuration` VALUES (1,9),(1,10),(2,1),(2,2),(2,3),(3,4),(3,5),(3,6),(3,7),(3,8),(4,4),(4,5),(4,6),(4,7),(4,8),(5,9),(5,10),(6,1),(6,2),(6,3),(7,4),(7,5),(7,6),(7,7),(7,8),(8,1),(8,2),(8,3),(9,9),(9,10),(10,1),(10,2),(10,3),(11,9),(11,10),(12,4),(12,5),(12,6),(12,7),(12,8),(13,1),(13,2),(13,3),(14,4),(14,5),(14,6),(14,7),(14,8),(15,9),(15,10),(16,1),(16,2),(16,3),(17,4),(17,5),(17,6),(17,7),(17,8),(18,9),(18,10),(19,1),(19,2),(19,3),(20,4),(20,5),(20,6),(20,7),(20,8),(21,9),(21,10),(22,1),(22,2),(22,3),(23,4),(23,5),(23,6),(23,7),(23,8),(24,9),(24,10),(25,1),(25,2),(25,3),(26,4),(26,5),(26,6),(26,7),(26,8),(27,9),(27,10),(28,1),(28,2),(28,3),(29,9),(29,10),(30,11),(30,12),(31,11),(31,12),(32,11),(32,12),(33,11),(33,12),(34,11),(34,12),(35,11),(35,12),(36,11),(36,12),(37,11),(37,12),(38,11),(38,12),(39,11),(39,12),(40,13),(40,14),(40,18),(41,13),(41,14),(41,18),(42,13),(42,14),(42,18),(43,13),(43,14),(43,18),(44,13),(44,14),(44,18),(45,13),(45,14),(45,18),(46,13),(46,14),(46,18),(47,13),(47,14),(47,18),(48,13),(48,14),(48,18),(49,13),(49,14),(49,18),(50,15),(50,16),(50,17),(51,15),(51,16),(51,17),(52,15),(52,16),(52,17),(53,15),(53,16),(53,17),(54,15),(54,16),(54,17),(55,15),(55,16),(55,17),(56,15),(56,16),(56,17),(57,15),(57,16),(57,17),(58,15),(58,16),(58,17),(59,15),(59,16),(59,17),(60,21),(60,22),(60,23),(61,21),(61,22),(61,23),(62,21),(62,22),(62,23),(63,21),(63,22),(63,23),(64,21),(64,22),(64,23),(65,21),(65,22),(65,23),(66,21),(66,22),(66,23),(67,21),(67,22),(67,23),(68,21),(68,22),(68,23),(69,21),(69,22),(69,23),(70,19),(70,20),(71,19),(71,20),(72,19),(72,20),(73,19),(73,20),(74,19),(74,20),(75,19),(75,20),(76,19),(76,20),(77,19),(77,20),(78,19),(78,20),(79,19),(79,20);
/*!40000 ALTER TABLE `product_configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_image` (
  `id` int NOT NULL,
  `image` varchar(1000) NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  KEY `id_idx` (`id`),
  CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_image`
--

LOCK TABLES `product_image` WRITE;
/*!40000 ALTER TABLE `product_image` DISABLE KEYS */;
INSERT INTO `product_image` VALUES (1,'../image/earphone1.png',1),(2,'../image/laptop1.png',1),(3,'../image/phone1.png',1),(4,'../image/phone2.png',1),(5,'../image/earphone2.png',1),(6,'../image/laptop2.png',1),(7,'../image/phone3.png',1),(8,'../image/laptop3.png',1),(9,'../image/earphone3.png',1),(10,'../image/laptop4.png',1),(11,'../image/earphone4.png',1),(12,'../image/phone4.png',1),(13,'../image/laptop5.png',1),(14,'../image/phone5.png',1),(15,'../image/earphone5.png',1),(16,'../image/laptop6.png',1),(17,'../image/phone6.png',1),(18,'../image/earphone6.png',1),(19,'../image/laptop7.png',1),(20,'../image/phone7.png',1),(21,'../image/earphone7.png',1),(22,'../image/laptop8.png',1),(23,'../image/phone8.png',1),(24,'../image/earphone8.png',1),(25,'../image/laptop9.png',1),(26,'../image/phone9.png',1),(27,'../image/earphone9.png',1),(28,'../image/laptop10.png',1),(29,'../image/earphone10.png',1),(30,'../image/mouse1.png',1),(31,'../image/mouse2.png',1),(32,'../image/mouse3.png',1),(33,'../image/mouse4.png',1),(34,'../image/mouse5.png',1),(35,'../image/mouse6.png',1),(36,'../image/mouse7.png',1),(37,'../image/mouse8.png',1),(38,'../image/mouse9.png',1),(39,'../image/mouse10.png',1),(40,'../image/keyboard1.png',1),(41,'../image/keyboard2.png',1),(42,'../image/keyboard3.png',1),(43,'../image/keyboard4.png',1),(44,'../image/keyboard5.png',1),(45,'../image/keyboard6.png',1),(46,'../image/keyboard7.png',1),(47,'../image/keyboard8.png',1),(48,'../image/keyboard9.png',1),(49,'../image/keyboard10.png',1),(50,'../image/watch1.png',1),(51,'../image/watch2.png',1),(52,'../image/watch3.png',1),(53,'../image/watch4.png',1),(54,'../image/watch5.png',1),(55,'../image/watch6.png',1),(56,'../image/watch7.png',1),(57,'../image/watch8.png',1),(58,'../image/watch9.png',1),(59,'../image/watch10.png',1),(60,'../image/tivi1.png',1),(61,'../image/tivi2.png',1),(62,'../image/tivi3.png',1),(63,'../image/tivi4.png',1),(64,'../image/tivi5.png',1),(65,'../image/tivi6.png',1),(66,'../image/tivi7.png',1),(67,'../image/tivi8.png',1),(68,'../image/tivi9.png',1),(69,'../image/tivi10.png',1),(70,'../image/camera1.png',1),(71,'../image/camera2.png',1),(72,'../image/camera3.png',1),(73,'../image/camera4.png',1),(74,'../image/camera5.png',1),(75,'../image/camera6.png',1),(76,'../image/camera7.png',1),(77,'../image/camera8.png',1),(78,'../image/camera9.png',1),(79,'../image/camera10.png',1),(3,'../image/phone1.1.png',0),(3,'../image/phone1.2.png',0),(3,'../image/phone1.3.png',0),(3,'../image/phone1.4.png',0),(3,'../image/phone1.5.png',0),(4,'../image/phone2.1.png',0),(4,'../image/phone2.2.png',0),(4,'../image/phone2.3.png',0),(4,'../image/phone2.4.png',0),(4,'../image/phone2.5.png',0),(7,'../image/phone3.1.png',0),(7,'../image/phone3.2.png',0),(7,'../image/phone3.3.png',0),(7,'../image/phone3.4.png',0),(7,'../image/phone3.5.png',0),(12,'../image/phone4.1.png',0),(12,'../image/phone4.2.png',0),(12,'../image/phone4.3.png',0),(12,'../image/phone4.4.png',0),(12,'../image/phone4.5.png',0),(14,'../image/phone5.1.png',0),(14,'../image/phone5.2.png',0),(14,'../image/phone5.3.png',0),(14,'../image/phone5.4.png',0),(14,'../image/phone5.5.png',0),(17,'../image/phone6.1.png',0),(17,'../image/phone6.2.png',0),(17,'../image/phone6.3.png',0),(17,'../image/phone6.4.png',0),(17,'../image/phone6.5.png',0),(20,'../image/phone7.1.png',0),(20,'../image/phone7.2.png',0),(20,'../image/phone7.3.png',0),(20,'../image/phone7.4.png',0),(20,'../image/phone7.5.png',0),(23,'../image/phone8.1.png',0),(23,'../image/phone8.2.png',0),(23,'../image/phone8.3.png',0),(23,'../image/phone8.4.png',0),(23,'../image/phone8.5.png',0),(26,'../image/phone9.1.png',0),(26,'../image/phone9.2.png',0),(26,'../image/phone9.3.png',0),(26,'../image/phone9.4.png',0),(26,'../image/phone9.5.png',0),(2,'../image/laptop1.1.png',0),(2,'../image/laptop1.2.png',0),(2,'../image/laptop1.3.png',0),(2,'../image/laptop1.4.png',0),(2,'../image/laptop1.5.png',0),(6,'../image/laptop2.1.png',0),(6,'../image/laptop2.2.png',0),(6,'../image/laptop2.3.png',0),(6,'../image/laptop2.4.png',0),(6,'../image/laptop2.5.png',0),(8,'../image/laptop3.1.png',0),(8,'../image/laptop3.2.png',0),(8,'../image/laptop3.3.png',0),(8,'../image/laptop3.4.png',0),(8,'../image/laptop3.5.png',0),(10,'../image/laptop4.1.png',0),(10,'../image/laptop4.2.png',0),(10,'../image/laptop4.3.png',0),(10,'../image/laptop4.4.png',0),(10,'../image/laptop4.5.png',0),(13,'../image/laptop5.1.png',0),(13,'../image/laptop5.2.png',0),(13,'../image/laptop5.3.png',0),(13,'../image/laptop5.4.png',0),(13,'../image/laptop5.5.png',0),(16,'../image/laptop6.1.png',0),(16,'../image/laptop6.2.png',0),(16,'../image/laptop6.3.png',0),(16,'../image/laptop6.4.png',0),(16,'../image/laptop6.5.png',0),(19,'../image/laptop7.1.png',0),(19,'../image/laptop7.2.png',0),(19,'../image/laptop7.3.png',0),(19,'../image/laptop7.4.png',0),(19,'../image/laptop7.5.png',0),(22,'../image/laptop8.1.png',0),(22,'../image/laptop8.2.png',0),(22,'../image/laptop8.3.png',0),(22,'../image/laptop8.4.png',0),(22,'../image/laptop8.5.png',0),(25,'../image/laptop9.1.png',0),(25,'../image/laptop9.2.png',0),(25,'../image/laptop9.3.png',0),(25,'../image/laptop9.4.png',0),(25,'../image/laptop9.5.png',0),(28,'../image/laptop10.1.png',0),(28,'../image/laptop10.2.png',0),(28,'../image/laptop10.3.png',0),(28,'../image/laptop10.4.png',0),(28,'../image/laptop10.5.png',0),(1,'../image/earphone1.1.png',0),(1,'../image/earphone1.2.png',0),(1,'../image/earphone1.3.png',0),(1,'../image/earphone1.4.png',0),(1,'../image/earphone1.5.png',0),(5,'../image/earphone2.1.png',0),(5,'../image/earphone2.2.png',0),(5,'../image/earphone2.3.png',0),(5,'../image/earphone2.4.png',0),(5,'../image/earphone2.5.png',0),(9,'../image/earphone3.1.png',0),(9,'../image/earphone3.2.png',0),(9,'../image/earphone3.3.png',0),(9,'../image/earphone3.4.png',0),(9,'../image/earphone3.5.png',0),(11,'../image/earphone4.1.png',0),(11,'../image/earphone4.2.png',0),(11,'../image/earphone4.3.png',0),(11,'../image/earphone4.4.png',0),(11,'../image/earphone4.5.png',0),(15,'../image/earphone5.1.png',0),(15,'../image/earphone5.2.png',0),(15,'../image/earphone5.3.png',0),(15,'../image/earphone5.4.png',0),(15,'../image/earphone5.5.png',0),(18,'../image/earphone6.1.png',0),(18,'../image/earphone6.2.png',0),(18,'../image/earphone6.3.png',0),(18,'../image/earphone6.4.png',0),(18,'../image/earphone6.5.png',0),(21,'../image/earphone7.1.png',0),(21,'../image/earphone7.2.png',0),(21,'../image/earphone7.3.png',0),(21,'../image/earphone7.4.png',0),(21,'../image/earphone7.5.png',0),(24,'../image/earphone8.1.png',0),(24,'../image/earphone8.2.png',0),(24,'../image/earphone8.3.png',0),(24,'../image/earphone8.4.png',0),(24,'../image/earphone8.5.png',0),(27,'../image/earphone9.1.png',0),(27,'../image/earphone9.2.png',0),(27,'../image/earphone9.3.png',0),(27,'../image/earphone9.4.png',0),(27,'../image/earphone9.5.png',0),(29,'../image/earphone10.1.png',0),(29,'../image/earphone10.2.png',0),(29,'../image/earphone10.3.png',0),(29,'../image/earphone10.4.png',0),(29,'../image/earphone10.5.png',0),(30,'../image/mouse1.1.png',0),(30,'../image/mouse1.2.png',0),(30,'../image/mouse1.3.png',0),(30,'../image/mouse1.4.png',0),(30,'../image/mouse1.5.png',0),(31,'../image/mouse2.1.png',0),(31,'../image/mouse2.2.png',0),(31,'../image/mouse2.3.png',0),(31,'../image/mouse2.4.png',0),(31,'../image/mouse2.5.png',0),(32,'../image/mouse3.1.png',0),(32,'../image/mouse3.2.png',0),(32,'../image/mouse3.3.png',0),(32,'../image/mouse3.4.png',0),(32,'../image/mouse3.5.png',0),(33,'../image/mouse4.1.png',0),(33,'../image/mouse4.2.png',0),(33,'../image/mouse4.3.png',0),(33,'../image/mouse4.4.png',0),(33,'../image/mouse4.5.png',0),(34,'../image/mouse5.1.png',0),(34,'../image/mouse5.2.png',0),(34,'../image/mouse5.3.png',0),(34,'../image/mouse5.4.png',0),(34,'../image/mouse5.5.png',0),(35,'../image/mouse6.1.png',0),(35,'../image/mouse6.2.png',0),(35,'../image/mouse6.3.png',0),(35,'../image/mouse6.4.png',0),(35,'../image/mouse6.5.png',0),(36,'../image/mouse7.1.png',0),(36,'../image/mouse7.2.png',0),(36,'../image/mouse7.3.png',0),(36,'../image/mouse7.4.png',0),(36,'../image/mouse7.5.png',0),(37,'../image/mouse8.1.png',0),(37,'../image/mouse8.2.png',0),(37,'../image/mouse8.3.png',0),(37,'../image/mouse8.4.png',0),(37,'../image/mouse8.5.png',0),(38,'../image/mouse9.1.png',0),(38,'../image/mouse9.2.png',0),(38,'../image/mouse9.3.png',0),(38,'../image/mouse9.4.png',0),(38,'../image/mouse9.5.png',0),(39,'../image/mouse10.1.png',0),(39,'../image/mouse10.2.png',0),(39,'../image/mouse10.3.png',0),(39,'../image/mouse10.4.png',0),(39,'../image/mouse10.5.png',0),(40,'../image/keyboard1.1.png',0),(40,'../image/keyboard1.2.png',0),(40,'../image/keyboard1.3.png',0),(40,'../image/keyboard1.4.png',0),(40,'../image/keyboard1.5.png',0),(41,'../image/keyboard2.1.png',0),(41,'../image/keyboard2.2.png',0),(41,'../image/keyboard2.3.png',0),(41,'../image/keyboard2.4.png',0),(41,'../image/keyboard2.5.png',0),(42,'../image/keyboard3.1.png',0),(42,'../image/keyboard3.2.png',0),(42,'../image/keyboard3.3.png',0),(42,'../image/keyboard3.4.png',0),(42,'../image/keyboard3.5.png',0),(43,'../image/keyboard4.1.png',0),(43,'../image/keyboard4.2.png',0),(43,'../image/keyboard4.3.png',0),(43,'../image/keyboard4.4.png',0),(43,'../image/keyboard4.5.png',0),(44,'../image/keyboard5.1.png',0),(44,'../image/keyboard5.2.png',0),(44,'../image/keyboard5.3.png',0),(44,'../image/keyboard5.4.png',0),(44,'../image/keyboard5.5.png',0),(45,'../image/keyboard6.1.png',0),(45,'../image/keyboard6.2.png',0),(45,'../image/keyboard6.3.png',0),(45,'../image/keyboard6.4.png',0),(45,'../image/keyboard6.5.png',0),(46,'../image/keyboard7.1.png',0),(46,'../image/keyboard7.2.png',0),(46,'../image/keyboard7.3.png',0),(46,'../image/keyboard7.4.png',0),(46,'../image/keyboard7.5.png',0),(47,'../image/keyboard8.1.png',0),(47,'../image/keyboard8.2.png',0),(47,'../image/keyboard8.3.png',0),(47,'../image/keyboard8.4.png',0),(47,'../image/keyboard8.5.png',0),(48,'../image/keyboard9.1.png',0),(48,'../image/keyboard9.2.png',0),(48,'../image/keyboard9.3.png',0),(48,'../image/keyboard9.4.png',0),(48,'../image/keyboard9.5.png',0),(49,'../image/keyboard10.1.png',0),(49,'../image/keyboard10.2.png',0),(49,'../image/keyboard10.3.png',0),(49,'../image/keyboard10.4.png',0),(49,'../image/keyboard10.5.png',0),(50,'../image/watch1.1.png',0),(50,'../image/watch1.2.png',0),(50,'../image/watch1.3.png',0),(50,'../image/watch1.4.png',0),(50,'../image/watch1.5.png',0),(51,'../image/watch2.1.png',0),(51,'../image/watch2.2.png',0),(51,'../image/watch2.3.png',0),(51,'../image/watch2.4.png',0),(51,'../image/watch2.5.png',0),(52,'../image/watch3.1.png',0),(52,'../image/watch3.2.png',0),(52,'../image/watch3.3.png',0),(52,'../image/watch3.4.png',0),(52,'../image/watch3.5.png',0),(53,'../image/watch4.1.png',0),(53,'../image/watch4.2.png',0),(53,'../image/watch4.3.png',0),(53,'../image/watch4.4.png',0),(53,'../image/watch4.5.png',0),(54,'../image/watch5.1.png',0),(54,'../image/watch5.2.png',0),(54,'../image/watch5.3.png',0),(54,'../image/watch5.4.png',0),(54,'../image/watch5.5.png',0),(55,'../image/watch6.1.png',0),(55,'../image/watch6.2.png',0),(55,'../image/watch6.3.png',0),(55,'../image/watch6.4.png',0),(55,'../image/watch6.5.png',0),(56,'../image/watch7.1.png',0),(56,'../image/watch7.2.png',0),(56,'../image/watch7.3.png',0),(56,'../image/watch7.4.png',0),(56,'../image/watch7.5.png',0),(57,'../image/watch8.1.png',0),(57,'../image/watch8.2.png',0),(57,'../image/watch8.3.png',0),(57,'../image/watch8.4.png',0),(57,'../image/watch8.5.png',0),(58,'../image/watch9.1.png',0),(58,'../image/watch9.2.png',0),(58,'../image/watch9.3.png',0),(58,'../image/watch9.4.png',0),(58,'../image/watch9.5.png',0),(59,'../image/watch10.1.png',0),(59,'../image/watch10.2.png',0),(59,'../image/watch10.3.png',0),(59,'../image/watch10.4.png',0),(59,'../image/watch10.5.png',0),(60,'../image/tivi1.1.png',0),(60,'../image/tivi1.2.png',0),(60,'../image/tivi1.3.png',0),(60,'../image/tivi1.4.png',0),(60,'../image/tivi1.5.png',0),(61,'../image/tivi2.1.png',0),(61,'../image/tivi2.2.png',0),(61,'../image/tivi2.3.png',0),(61,'../image/tivi2.4.png',0),(61,'../image/tivi2.5.png',0),(62,'../image/tivi3.1.png',0),(62,'../image/tivi3.2.png',0),(62,'../image/tivi3.3.png',0),(62,'../image/tivi3.4.png',0),(62,'../image/tivi3.5.png',0),(63,'../image/tivi4.1.png',0),(63,'../image/tivi4.2.png',0),(63,'../image/tivi4.3.png',0),(63,'../image/tivi4.4.png',0),(63,'../image/tivi4.5.png',0),(64,'../image/tivi5.1.png',0),(64,'../image/tivi5.2.png',0),(64,'../image/tivi5.3.png',0),(64,'../image/tivi5.4.png',0),(64,'../image/tivi5.5.png',0),(65,'../image/tivi6.1.png',0),(65,'../image/tivi6.2.png',0),(65,'../image/tivi6.3.png',0),(65,'../image/tivi6.4.png',0),(65,'../image/tivi6.5.png',0),(66,'../image/tivi7.1.png',0),(66,'../image/tivi7.2.png',0),(66,'../image/tivi7.3.png',0),(66,'../image/tivi7.4.png',0),(66,'../image/tivi7.5.png',0),(67,'../image/tivi8.1.png',0),(67,'../image/tivi8.2.png',0),(67,'../image/tivi8.3.png',0),(67,'../image/tivi8.4.png',0),(67,'../image/tivi8.5.png',0),(68,'../image/tivi9.1.png',0),(68,'../image/tivi9.2.png',0),(68,'../image/tivi9.3.png',0),(68,'../image/tivi9.4.png',0),(68,'../image/tivi9.5.png',0),(69,'../image/tivi10.1.png',0),(69,'../image/tivi10.2.png',0),(69,'../image/tivi10.3.png',0),(69,'../image/tivi10.4.png',0),(69,'../image/tivi10.5.png',0),(70,'../image/camera1.1.png',0),(70,'../image/camera1.2.png',0),(70,'../image/camera1.3.png',0),(70,'../image/camera1.4.png',0),(70,'../image/camera1.5.png',0),(71,'../image/camera2.1.png',0),(71,'../image/camera2.2.png',0),(71,'../image/camera2.3.png',0),(71,'../image/camera2.4.png',0),(71,'../image/camera2.5.png',0),(72,'../image/camera3.1.png',0),(72,'../image/camera3.2.png',0),(72,'../image/camera3.3.png',0),(72,'../image/camera3.4.png',0),(72,'../image/camera3.5.png',0),(73,'../image/camera4.1.png',0),(73,'../image/camera4.2.png',0),(73,'../image/camera4.3.png',0),(73,'../image/camera4.4.png',0),(73,'../image/camera4.5.png',0),(74,'../image/camera5.1.png',0),(74,'../image/camera5.2.png',0),(74,'../image/camera5.3.png',0),(74,'../image/camera5.4.png',0),(74,'../image/camera5.5.png',0),(75,'../image/camera6.1.png',0),(75,'../image/camera6.2.png',0),(75,'../image/camera6.3.png',0),(75,'../image/camera6.4.png',0),(75,'../image/camera6.5.png',0),(76,'../image/camera7.1.png',0),(76,'../image/camera7.2.png',0),(76,'../image/camera7.3.png',0),(76,'../image/camera7.4.png',0),(76,'../image/camera7.5.png',0),(77,'../image/camera8.1.png',0),(77,'../image/camera8.2.png',0),(77,'../image/camera8.3.png',0),(77,'../image/camera8.4.png',0),(77,'../image/camera8.5.png',0),(78,'../image/camera9.1.png',0),(78,'../image/camera9.2.png',0),(78,'../image/camera9.3.png',0),(78,'../image/camera9.4.png',0),(78,'../image/camera9.5.png',0),(79,'../image/camera10.1.png',0),(79,'../image/camera10.2.png',0),(79,'../image/camera10.3.png',0),(79,'../image/camera10.4.png',0),(79,'../image/camera10.5.png',0);
/*!40000 ALTER TABLE `product_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productline`
--

DROP TABLE IF EXISTS `productline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productline` (
  `id` int NOT NULL,
  `parent_productline_id` int DEFAULT NULL,
  `productline_name` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category_parent` (`parent_productline_id`),
  CONSTRAINT `productline_ibfk_1` FOREIGN KEY (`parent_productline_id`) REFERENCES `productline` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productline`
--

LOCK TABLES `productline` WRITE;
/*!40000 ALTER TABLE `productline` DISABLE KEYS */;
INSERT INTO `productline` VALUES (1,NULL,'Laptop'),(2,NULL,'Điện thoại'),(3,NULL,'Tai nghe'),(4,NULL,'Chuột'),(5,NULL,'Bàn phím cơ'),(6,NULL,'Đồng hồ'),(7,NULL,'Tivi'),(8,NULL,'Máy ảnh');
/*!40000 ALTER TABLE `productline` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_address` varchar(350) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `password` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'oidioa','sajddakd',NULL,'$2y$10$.ytSmRj1Wlm97ULeMuMYXehgPzSoP0gEfE.FPJCrEcqlMpc/7Rumy'),(2,'saidgausd','asjduvai',NULL,'$2y$10$6b4SGs9SGmBKXHqThcfJdeUuy/EF4U/kKkl.A4Ey5RBenvtCvcfvu'),(3,'duc@gmail.com','duc',NULL,'$2y$10$ZT.6gckt1N2fRISy96IEuergJsoijjOrPZgyZs0IXM.XzxSMZHR3a'),(4,'bach@gmail.com','bachnguyen04',NULL,'$2y$10$1d/8ZHfznWb3/ITjeRTcF.nw4SyNVcqWwFmjk9gjWgr7Ey4EVP/W6'),(5,'sdsadsa','sdsd',NULL,'$2y$10$pCZbY3I.y/sHLlcfxaM9Auq2ERJ6U6Wx4YWv5.QH9/Zy/D9gFDCGW');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_address`
--

DROP TABLE IF EXISTS `user_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_address` (
  `user_id` int NOT NULL,
  `address_id` int NOT NULL,
  `is_default` int DEFAULT NULL,
  PRIMARY KEY (`user_id`,`address_id`),
  KEY `fk_useradd_user` (`user_id`),
  KEY `fk_useradd_address` (`address_id`),
  CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`),
  CONSTRAINT `user_address_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_address`
--

LOCK TABLES `user_address` WRITE;
/*!40000 ALTER TABLE `user_address` DISABLE KEYS */;
INSERT INTO `user_address` VALUES (3,1,1),(3,2,0);
/*!40000 ALTER TABLE `user_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `variation`
--

DROP TABLE IF EXISTS `variation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `variation` (
  `id` int NOT NULL,
  `productline_id` int DEFAULT NULL,
  `name` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_variation_category` (`productline_id`),
  CONSTRAINT `variation_ibfk_1` FOREIGN KEY (`productline_id`) REFERENCES `productline` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `variation`
--

LOCK TABLES `variation` WRITE;
/*!40000 ALTER TABLE `variation` DISABLE KEYS */;
INSERT INTO `variation` VALUES (1,1,'Màu sắc'),(2,2,'Màu sắc'),(3,3,'Màu sắc'),(4,4,'Màu sắc'),(5,5,'Màu sắc'),(6,6,'Màu sắc'),(7,8,'Màu sắc'),(8,7,'Kích cỡ');
/*!40000 ALTER TABLE `variation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `variation_option`
--

DROP TABLE IF EXISTS `variation_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `variation_option` (
  `id` int NOT NULL,
  `variation_id` int DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_varoption_variation` (`variation_id`),
  CONSTRAINT `variation_option_ibfk_1` FOREIGN KEY (`variation_id`) REFERENCES `variation` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `variation_option`
--

LOCK TABLES `variation_option` WRITE;
/*!40000 ALTER TABLE `variation_option` DISABLE KEYS */;
INSERT INTO `variation_option` VALUES (1,1,'Trắng'),(2,1,'Đen'),(3,1,'Vàng'),(4,2,'Trắng'),(5,2,'Đen'),(6,2,'Vàng'),(7,2,'Xanh'),(8,2,'Đỏ'),(9,3,'Trắng'),(10,3,'Đen'),(11,4,'Trắng'),(12,4,'Đen'),(13,5,'Trắng'),(14,5,'Đen'),(15,6,'Trắng'),(16,6,'Đen'),(17,6,'Vàng'),(18,5,'Màu hỗn hợp'),(19,7,'Trắng'),(20,7,'Đen'),(21,8,'42inch'),(22,8,'48inch'),(23,8,'52inch');
/*!40000 ALTER TABLE `variation_option` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-20 20:43:21
