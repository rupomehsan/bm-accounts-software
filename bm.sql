-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bm_software
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `account_branch_targets`
--

DROP TABLE IF EXISTS `account_branch_targets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_branch_targets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `account_category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session` date DEFAULT NULL,
  `comment` json DEFAULT NULL,
  `branch_id` bigint DEFAULT NULL,
  `target_amount` double(8,2) DEFAULT NULL,
  `payment_interval` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_branch_targets`
--

LOCK TABLES `account_branch_targets` WRITE;
/*!40000 ALTER TABLE `account_branch_targets` DISABLE KEYS */;
INSERT INTO `account_branch_targets` VALUES (1,'1','2023-01-01','[\"this is the first comment\"]',10,100.00,'1',NULL,'7011496','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(2,'3','2024-02-19','[\"secom cm\"]',10,50000.00,'one_time',NULL,'3082703','active','2024-02-19 03:59:22','2024-02-19 03:59:22');
/*!40000 ALTER TABLE `account_branch_targets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account_categories`
--

DROP TABLE IF EXISTS `account_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `parent` bigint DEFAULT NULL,
  `type` enum('expense','income') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_categories`
--

LOCK TABLES `account_categories` WRITE;
/*!40000 ALTER TABLE `account_categories` DISABLE KEYS */;
INSERT INTO `account_categories` VALUES (1,'মাসিক আয়',' ',1,'income',NULL,'masik-ay-6941510','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(2,'বার্ষিক আয়',' ',1,'income',NULL,'barshik-ay-9232700','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(3,'ত্রাণ',' ',1,'income',NULL,'tran-2433644','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(4,'শহীদ ফান্ড',' ',1,'income',NULL,'sheed-fand-8004700','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(5,'কর্যে হাসানা',' ',1,'income',NULL,'krze-hasana-2125988','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(6,'বকেয়া আদায়',' ',1,'income',NULL,'bkeya-aday-5496521','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(7,'নববর্ষ বাবদ',' ',1,'income',NULL,'nbbrsh-babd-8247785','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(8,'ফ্লাট আয়',' ',1,'income',NULL,'flat-ay-7038630','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(9,'মওকুফ',' ',1,'income',NULL,'mookuf-5189786','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(10,'বিশেষ আয়',' ',1,'income',NULL,'bisesh-ay-40410537','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(11,'ঘাটতি',' ',1,'income',NULL,'ghatti-28211549','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(12,'ভুর্তুকি',' ',1,'income',NULL,'vurtuki-95012101','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(13,'ব্যাঙ্ক জমার মাধ্যমে আয়',' ',1,'income',NULL,'bzank-jmar-madhzme-ay-62413443','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(14,'অগ্রিম আয়',' ',1,'income',NULL,'ogrim-ay-77414409','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(15,'এককালীন',' ',1,'income',NULL,'ekkaleen-59315518','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(16,'ঋণ পরিশোধ',' ',1,'income',NULL,'rrin-prisodh-87916287','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(17,'জামানত',' ',1,'income',NULL,'jamant-66817457','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(18,'সিলেবাসের বই ক্রয় বাবদ',' ',1,'expense',NULL,'silebaser-bi-kry-babd-15318183','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(19,'যাতায়াত',' ',1,'expense',NULL,'zatayat-58619153','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(20,'আপ্যায়ন',' ',1,'expense',NULL,'apzayn-77020858','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(21,'মোবাইল রিচার্জ',' ',1,'expense',NULL,'mobail-ricarj-78221250','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(22,'পরিবহন খরচ',' ',1,'expense',NULL,'pribhn-khrc-78922505','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(23,'অফিস স্টেশনারী',' ',1,'expense',NULL,'ofis-stesnaree-80823397','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(24,'মাসিক বেতন',' ',1,'expense',NULL,'masik-betn-27324394','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(25,'সৈজন্য প্রদান',' ',1,'expense',NULL,'soijnz-prdan-24425860','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(26,'অফিস ভাড়া',' ',1,'expense',NULL,'ofis-vara-29426585','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(27,'বাসা ভাড়া',' ',1,'expense',NULL,'basa-vara-90227797','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(28,'গোডাউন ভাড়া',' ',1,'expense',NULL,'godaun-vara-38628871','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(29,'ইন্টারনেট বিল (সংযোগসহ)',' ',1,'expense',NULL,'intarnet-bil-sngzogsh-64029144','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(30,'জামানত',' ',1,'expense',NULL,'jamant-70430447','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(31,'ট্রেড লাইসেন্স',' ',1,'expense',NULL,'tred-laisens-13231507','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(32,'সৈজন্য',' ',1,'expense',NULL,'soijnz-16532874','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(33,'মওকুফ',' ',1,'expense',NULL,'mookuf-44533416','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(34,'বস্তা ক্রয় / কাটুন বিল',' ',1,'expense',NULL,'bsta-kry-katun-bil-40334724','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(35,'পত্রিকা বিল',' ',1,'expense',NULL,'ptrika-bil-45935694','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(36,'সম্পদ ক্রয়',' ',1,'expense',NULL,'smpd-kry-48636580','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(37,'মোবাইল ক্রয়',' ',1,'expense',NULL,'mobail-kry-16137596','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(38,'পানি বিল',' ',1,'expense',NULL,'pani-bil-64738120','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(39,'বিবিদ',' ',1,'expense',NULL,'bibid-54239550','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(40,'এককালিন',' ',1,'expense',NULL,'ekkalin-67840498','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(41,'ঈদ সামগ্রি',' ',1,'expense',NULL,'eed-samgri-78841280','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(42,'মাল ফেরত',' ',1,'expense',NULL,'mal-fert-64442337','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(43,'ব্যাংক কর্তন',' ',1,'expense',NULL,'bzangk-krtn-80343634','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(44,'চিকিৎসা বাবদ',' ',1,'expense',NULL,'cikittsa-babd-36344688','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(45,'ফ্ল্যাট বাবদ খরচ',' ',1,'expense',NULL,'flzat-babd-khrc-41645488','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(46,'নসিহত',' ',1,'expense',NULL,'nsiht-23446693','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(47,'আহবান',' ',1,'expense',NULL,'ahban-96947608','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(48,'নববর্ষ উদ্ভোদন',' ',1,'expense',NULL,'nbbrsh-udvodn-90248938','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(49,'নববর্ষ অনুষ্ঠান',' ',1,'expense',NULL,'nbbrsh-onushthan-26649855','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(50,'ব্যংক নগদ জমার মাধ্যমে',' ',1,'expense',NULL,'bzngk-ngd-jmar-madhzme-19450557','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(51,'ঘাটতি',' ',1,'expense',NULL,'ghatti-70151218','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(52,'মেরামত',' ',1,'expense',NULL,'meramt-10552748','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(53,'নববর্ষ',' ',1,'expense',NULL,'nbbrsh-81953387','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(54,'সম্পদ ক্রয়',' ',1,'expense',NULL,'smpd-kry-24954859','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(55,'ডেকরেশন',' ',1,'expense',NULL,'dekresn-77555317','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(56,'ঋণ প্রদান',' ',1,'expense',NULL,'rrin-prdan-34356418','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(57,'ভি আই পি ব্যাগ',' ',1,'expense',NULL,'vi-ai-pi-bzag-82757156','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(58,'আবাসন',' ',1,'expense',NULL,'abasn-85258235','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(59,'পরিমান',' ',1,'expense',NULL,'priman-84059719','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(60,'যানবাহন',' ',1,'expense',NULL,'zanbahn-43660364','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(61,'সম্পদ',' ',1,'expense',NULL,'smpd-35561415','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(62,'চিকিৎসা',' ',1,'expense',NULL,'cikittsa-70262222','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(63,'ছাত্রকল্যান',' ',1,'expense',NULL,'chatrklzan-29963740','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(64,'শিক্ষা সহায়তা',' ',1,'expense',NULL,'siksha-shayta-32464279','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(65,'প্রো.বাস্তবায়ন',' ',1,'expense',NULL,'probastbayn-14065155','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(66,'প্রশিক্ষন',' ',1,'expense',NULL,'prsikshn-25166346','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(67,'শহীদ পরিবার',' ',1,'expense',NULL,'sheed-pribar-53667601','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(68,'মামলা',' ',1,'expense',NULL,'mamla-30268243','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(69,'শিশুকল্যাণ',' ',1,'expense',NULL,'sisuklzan-32169114','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(70,'দা.কার্যক্রম',' ',1,'expense',NULL,'dakarzkrm-48970353','active','2024-02-18 08:11:07','2024-02-18 08:11:07');
/*!40000 ALTER TABLE `account_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account_division_budgets`
--

DROP TABLE IF EXISTS `account_division_budgets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_division_budgets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `division_id` bigint DEFAULT NULL,
  `account_category_id` bigint DEFAULT NULL,
  `budget_amount` double(8,2) DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_division_budgets`
--

LOCK TABLES `account_division_budgets` WRITE;
/*!40000 ALTER TABLE `account_division_budgets` DISABLE KEYS */;
INSERT INTO `account_division_budgets` VALUES (1,1,1,100.00,NULL,'6841993','active','2024-02-18 08:11:07','2024-02-18 08:11:07');
/*!40000 ALTER TABLE `account_division_budgets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account_expense_support_image_table`
--

DROP TABLE IF EXISTS `account_expense_support_image_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_expense_support_image_table` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `url` text COLLATE utf8mb4_unicode_ci,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_expense_support_image_table`
--

LOCK TABLES `account_expense_support_image_table` WRITE;
/*!40000 ALTER TABLE `account_expense_support_image_table` DISABLE KEYS */;
INSERT INTO `account_expense_support_image_table` VALUES (1,'uploads/voucher/2024-02-19-13323263708.png',NULL,'6391463','active','2024-02-19 07:32:32','2024-02-19 07:32:32'),(2,'uploads/voucher/2024-02-19-13323274103.png',NULL,'5582617','active','2024-02-19 07:32:32','2024-02-19 07:32:32'),(3,'uploads/voucher/2024-02-19-13324424660.jpeg',NULL,'9813537','active','2024-02-19 07:32:44','2024-02-19 07:32:44'),(4,'uploads/voucher/2024-02-19-13362137255.jpg',NULL,'1754729','active','2024-02-19 07:36:21','2024-02-19 07:36:21');
/*!40000 ALTER TABLE `account_expense_support_image_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account_expense_support_table`
--

DROP TABLE IF EXISTS `account_expense_support_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_expense_support_table` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `expense_id` bigint DEFAULT NULL,
  `approved_by_admin` tinyint NOT NULL DEFAULT '0',
  `approved_by_bm` tinyint NOT NULL DEFAULT '0',
  `approved_by_cp` tinyint NOT NULL DEFAULT '0',
  `is_canceled` tinyint NOT NULL DEFAULT '0',
  `department_id` bigint DEFAULT NULL,
  `amount` bigint DEFAULT NULL,
  `image_id` bigint DEFAULT NULL,
  `cancel_comment` text COLLATE utf8mb4_unicode_ci,
  `date` date DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_expense_support_table`
--

LOCK TABLES `account_expense_support_table` WRITE;
/*!40000 ALTER TABLE `account_expense_support_table` DISABLE KEYS */;
INSERT INTO `account_expense_support_table` VALUES (1,1,0,0,0,0,8,276,NULL,'','2024-01-11',NULL,'8171911','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(2,1,0,0,0,0,8,380,NULL,'','2024-01-11',NULL,'1332638','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(3,1,0,0,0,0,8,495,NULL,'','2024-01-11',NULL,'5743618','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(4,1,0,0,0,0,8,298,NULL,'','2024-01-11',NULL,'7574657','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(5,1,0,0,0,0,8,298,NULL,'','2024-01-11',NULL,'7355987','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(6,1,0,0,0,0,8,315,NULL,'','2024-01-11',NULL,'5376500','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(7,1,0,0,0,0,8,138,NULL,'','2024-01-11',NULL,'4287714','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(8,1,0,0,0,0,8,173,NULL,'','2024-01-11',NULL,'5018173','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(9,1,0,0,0,0,8,243,NULL,'','2024-01-11',NULL,'1549260','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(10,1,0,0,0,0,8,170,NULL,'','2024-01-11',NULL,'28710380','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(11,2,0,0,0,0,8,229,NULL,'','2024-01-11',NULL,'45011466','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(12,2,0,0,0,0,8,490,NULL,'','2024-01-11',NULL,'89412823','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(13,2,1,0,0,0,8,129,NULL,'','2024-01-11',NULL,'34313198','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(14,2,0,0,0,0,8,274,NULL,'','2024-01-11',NULL,'30714880','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(15,2,1,0,0,0,8,277,NULL,'','2024-01-11',NULL,'27715486','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(16,2,0,0,0,0,8,250,NULL,'','2024-01-11',NULL,'30716549','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(17,2,0,0,0,0,8,346,NULL,'','2024-01-11',NULL,'46617558','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(18,2,0,0,0,0,8,440,NULL,'','2024-01-11',NULL,'28918171','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(19,2,0,0,0,0,8,479,NULL,'','2024-01-11',NULL,'61019757','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(20,2,1,0,0,0,8,272,NULL,'','2024-01-11',NULL,'98520114','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(21,3,0,0,0,0,8,152,NULL,'','2024-01-11',NULL,'92121154','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(22,3,1,0,0,0,8,264,NULL,'','2024-01-11',NULL,'28122470','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(23,3,0,0,0,0,8,169,NULL,'','2024-01-11',NULL,'11923457','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(24,3,1,0,0,0,8,368,NULL,'','2024-01-11',NULL,'67224947','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(25,3,1,0,0,0,8,269,NULL,'','2024-01-11',NULL,'52425437','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(26,3,1,0,0,0,8,359,NULL,'','2024-01-11',NULL,'11226377','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(27,3,1,0,0,0,8,240,NULL,'','2024-01-11',NULL,'78827745','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(28,3,0,0,0,0,8,370,NULL,'','2024-01-11',NULL,'96228198','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(29,3,0,0,0,0,8,353,NULL,'','2024-01-11',NULL,'50429952','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(30,3,1,0,0,0,8,147,NULL,'','2024-01-11',NULL,'20130365','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(31,4,1,0,0,0,8,383,NULL,'','2024-01-11',NULL,'22331825','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(32,4,1,0,0,0,8,200,NULL,'','2024-01-11',NULL,'83532449','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(33,4,0,0,0,0,8,267,NULL,'','2024-01-11',NULL,'60833628','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(34,4,0,0,0,0,8,424,NULL,'','2024-01-11',NULL,'72434492','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(35,4,0,0,0,0,8,343,NULL,'','2024-01-11',NULL,'72535269','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(36,4,1,0,0,0,8,377,NULL,'','2024-01-11',NULL,'54036361','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(37,4,1,0,0,0,8,448,NULL,'','2024-01-11',NULL,'67637585','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(38,4,0,0,0,0,8,405,NULL,'','2024-01-11',NULL,'33738309','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(39,4,1,0,0,0,8,309,NULL,'','2024-01-11',NULL,'46439767','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(40,4,1,0,0,0,8,169,NULL,'','2024-01-11',NULL,'64440341','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(41,5,0,0,0,0,8,190,NULL,'','2024-01-11',NULL,'17741770','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(42,5,0,0,0,0,8,135,NULL,'','2024-01-11',NULL,'93742607','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(43,5,0,0,0,0,8,379,NULL,'','2024-01-11',NULL,'74643644','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(44,5,1,0,0,0,8,214,NULL,'','2024-01-11',NULL,'39644938','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(45,5,0,0,0,0,8,274,NULL,'','2024-01-11',NULL,'89545350','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(46,5,0,0,0,0,8,177,NULL,'','2024-01-11',NULL,'69246582','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(47,5,1,0,0,0,8,193,NULL,'','2024-01-11',NULL,'91447896','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(48,5,1,0,0,0,8,422,NULL,'','2024-01-11',NULL,'84548176','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(49,5,1,0,0,0,8,183,NULL,'','2024-01-11',NULL,'71149855','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(50,5,1,0,0,0,8,244,NULL,'','2024-01-11',NULL,'18150532','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(51,6,0,1,0,0,5,500,1,NULL,NULL,NULL,'62851302','active','2024-02-19 07:32:32','2024-02-19 07:32:32'),(52,6,0,1,0,0,5,600,3,NULL,NULL,NULL,'66952865','active','2024-02-19 07:32:32','2024-02-19 07:32:44'),(53,7,0,1,0,0,5,1000,4,NULL,NULL,NULL,'99853891','active','2024-02-19 07:36:21','2024-02-19 07:36:21');
/*!40000 ALTER TABLE `account_expense_support_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account_expenses`
--

DROP TABLE IF EXISTS `account_expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_expenses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `approved` tinyint NOT NULL DEFAULT '0',
  `department_id` bigint DEFAULT NULL,
  `account_expense_category_id` bigint DEFAULT NULL,
  `amount` bigint DEFAULT NULL,
  `date` date DEFAULT NULL,
  `folio` int unsigned DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_expenses`
--

LOCK TABLES `account_expenses` WRITE;
/*!40000 ALTER TABLE `account_expenses` DISABLE KEYS */;
INSERT INTO `account_expenses` VALUES (1,0,8,42,2786,'2024-01-11',NULL,NULL,'7521457','active','2024-02-18 08:11:07','2024-02-18 08:11:08'),(2,0,8,53,3186,'2024-01-11',NULL,NULL,'2752101','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(3,0,8,36,2691,'2024-01-11',NULL,NULL,'1283872','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(4,0,8,32,3325,'2024-01-11',NULL,NULL,'5554618','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(5,0,8,33,2411,'2024-01-11',NULL,NULL,'6845212','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(6,0,5,25,1100,'2024-02-20',NULL,NULL,'9126487','active','2024-02-19 07:32:32','2024-02-19 07:32:32'),(7,0,5,29,1000,'2024-02-20',15,NULL,'6907483','active','2024-02-19 07:36:21','2024-02-19 07:38:16');
/*!40000 ALTER TABLE `account_expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account_income_extrafields`
--

DROP TABLE IF EXISTS `account_income_extrafields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_income_extrafields` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `account_income_id` bigint DEFAULT NULL,
  `field_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_income_extrafields`
--

LOCK TABLES `account_income_extrafields` WRITE;
/*!40000 ALTER TABLE `account_income_extrafields` DISABLE KEYS */;
INSERT INTO `account_income_extrafields` VALUES (1,1,'test','name',NULL,'4241112','active','2024-02-18 08:11:07','2024-02-18 08:11:07');
/*!40000 ALTER TABLE `account_income_extrafields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account_incomes`
--

DROP TABLE IF EXISTS `account_incomes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_incomes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `account_log_id` bigint DEFAULT NULL,
  `account_receipt_book_id` bigint DEFAULT NULL,
  `account_receipt_book_no` bigint DEFAULT NULL,
  `account_category_id` bigint DEFAULT NULL,
  `central_division_id` bigint DEFAULT NULL,
  `branch_id` bigint DEFAULT NULL,
  `account_receipt_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `amount` double(8,2) DEFAULT NULL,
  `amount_in_text` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `folio` int unsigned DEFAULT NULL,
  `random_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_incomes`
--

LOCK TABLES `account_incomes` WRITE;
/*!40000 ALTER TABLE `account_incomes` DISABLE KEYS */;
INSERT INTO `account_incomes` VALUES (1,1,1,1,10,13,NULL,'101','2024-02-17','income',938.00,'Seven Hundred Seventy One ',1,NULL,NULL,'7151254','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(2,2,1,1,6,13,NULL,'102','2024-02-15','income',616.00,'Eight Hundred Fourty Two ',1,NULL,NULL,'6202717','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(3,3,1,1,2,13,NULL,'103','2023-12-23','income',859.00,'Five Hundred Fifty ',1,NULL,NULL,'7073315','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(4,4,1,1,4,13,NULL,'104','2023-12-22','income',760.00,'Five Hundred Ninty Three ',1,NULL,NULL,'9884749','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(5,5,1,1,9,13,NULL,'105','2023-12-22','income',906.00,'Nine Hundred Fifty One ',1,NULL,NULL,'4635821','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(6,6,2,2,6,14,NULL,'301','2024-02-06','income',914.00,'Six Hundred Ninty Eight ',2,NULL,NULL,'4166607','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(7,7,2,2,7,14,NULL,'302','2024-02-10','income',736.00,'Eight Hundred Sixty Seven ',2,NULL,NULL,'7377982','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(8,8,2,2,2,14,NULL,'303','2023-12-28','income',811.00,'Eight Hundred Eighty Five ',2,NULL,NULL,'7328103','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(9,9,2,2,2,14,NULL,'304','2024-02-06','income',852.00,'Five Hundred Fifty ',2,NULL,NULL,'9469514','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(10,10,2,2,2,14,NULL,'305','2023-12-15','income',866.00,'Five Hundred Five ',2,NULL,NULL,'88510504','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(11,11,3,3,6,15,NULL,'501','2024-01-06','income',900.00,'Nine Hundred Ninty Eight ',3,NULL,NULL,'31611803','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(12,12,3,3,8,15,NULL,'502','2024-02-15','income',672.00,'Five Hundred Twenty One ',3,NULL,NULL,'91312519','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(13,13,3,3,2,15,NULL,'503','2024-02-01','income',883.00,'Five Hundred Fifty Six ',3,NULL,NULL,'15913379','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(14,14,3,3,1,15,NULL,'504','2023-11-28','income',547.00,'Eight Hundred Fifty Two ',3,NULL,NULL,'17214998','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(15,15,3,3,5,15,NULL,'505','2023-12-03','income',769.00,'Eight Hundred Sixty Six ',3,NULL,NULL,'22915529','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(16,16,4,4,2,16,NULL,'701','2024-01-13','income',899.00,'Six Hundred Two ',4,NULL,NULL,'84816545','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(17,17,4,4,4,16,NULL,'702','2023-11-25','income',797.00,'Seven Hundred Ninty Nine ',4,NULL,NULL,'31817548','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(18,18,4,4,7,16,NULL,'703','2024-01-29','income',682.00,'Seven Hundred ',4,NULL,NULL,'91218332','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(19,19,4,4,4,16,NULL,'704','2023-11-24','income',845.00,'Nine Hundred Fourty Eight ',4,NULL,NULL,'76919108','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(20,20,4,4,3,16,NULL,'705','2024-01-06','income',595.00,'Nine Hundred Thirty Four ',4,NULL,NULL,'99820438','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(21,21,5,5,7,17,NULL,'901','2024-02-06','income',777.00,'Five Hundred Twenty Seven ',5,NULL,NULL,'93721359','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(22,22,5,5,8,17,NULL,'902','2023-11-14','income',942.00,'Seven Hundred Thirty Five ',5,NULL,NULL,'61222325','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(23,23,5,5,10,17,NULL,'903','2023-11-10','income',843.00,'Seven Hundred Ninty Six ',5,NULL,NULL,'93923953','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(24,24,5,5,8,17,NULL,'904','2024-01-05','income',688.00,'Seven Hundred Fourty Nine ',5,NULL,NULL,'26124559','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(25,25,5,5,8,17,NULL,'905','2023-12-14','income',709.00,'Eight Hundred Eighty Eight ',5,NULL,NULL,'66425559','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(26,30,7,NULL,3,NULL,10,'100','2024-02-19','adsd',500.00,'Five Hundred',NULL,NULL,NULL,'53726693','active','2024-02-19 05:01:23','2024-02-19 05:01:23'),(27,31,7,NULL,7,NULL,10,'3','2024-02-10','asdfasdf',1000.00,'One Thousand',NULL,NULL,NULL,'94827522','active','2024-02-19 05:54:43','2024-02-19 05:54:43'),(28,32,7,NULL,1,NULL,10,'2342','2024-02-22','fasdfasd yyy',567.00,'Five Hundred Sixty Seven',NULL,NULL,NULL,'58528371','active','2024-02-19 06:22:50','2024-02-19 06:26:28');
/*!40000 ALTER TABLE `account_incomes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account_logs`
--

DROP TABLE IF EXISTS `account_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `random_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `category_id` bigint DEFAULT NULL,
  `account_id` bigint DEFAULT NULL,
  `account_number_id` bigint DEFAULT NULL,
  `trx_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receipt_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_expense` tinyint NOT NULL DEFAULT '0',
  `is_income` tinyint NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_logs`
--

LOCK TABLES `account_logs` WRITE;
/*!40000 ALTER TABLE `account_logs` DISABLE KEYS */;
INSERT INTO `account_logs` VALUES (1,13,'central_division',NULL,'2024-02-16 18:00:00','Mr 16',938.00,10,NULL,NULL,NULL,'101',0,1,'income',NULL,'1621216',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(2,13,'central_division',NULL,'2024-02-14 18:00:00','Mr 87',616.00,6,NULL,NULL,NULL,'102',0,1,'income',NULL,'2122866',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(3,13,'central_division',NULL,'2023-12-22 18:00:00','Mr 88',859.00,2,NULL,NULL,NULL,'103',0,1,'income',NULL,'9473645',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(4,13,'central_division',NULL,'2023-12-21 18:00:00','Mr 39',760.00,4,NULL,NULL,NULL,'104',0,1,'income',NULL,'3284517',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(5,13,'central_division',NULL,'2023-12-21 18:00:00','Mr 72',906.00,9,NULL,NULL,NULL,'105',0,1,'income',NULL,'1185226',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(6,14,'central_division',NULL,'2024-02-05 18:00:00','Mr 83',914.00,6,NULL,NULL,NULL,'301',0,1,'income',NULL,'3506404',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(7,14,'central_division',NULL,'2024-02-09 18:00:00','Mr 83',736.00,7,NULL,NULL,NULL,'302',0,1,'income',NULL,'5847148',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(8,14,'central_division',NULL,'2023-12-27 18:00:00','Mr 51',811.00,2,NULL,NULL,NULL,'303',0,1,'income',NULL,'7898447',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(9,14,'central_division',NULL,'2024-02-05 18:00:00','Mr 67',852.00,2,NULL,NULL,NULL,'304',0,1,'income',NULL,'3489470',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(10,14,'central_division',NULL,'2023-12-14 18:00:00','Mr 14',866.00,2,NULL,NULL,NULL,'305',0,1,'income',NULL,'10010486',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(11,15,'central_division',NULL,'2024-01-05 18:00:00','Mr 73',900.00,6,NULL,NULL,NULL,'501',0,1,'income',NULL,'76711759',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(12,15,'central_division',NULL,'2024-02-14 18:00:00','Mr 45',672.00,8,NULL,NULL,NULL,'502',0,1,'income',NULL,'89712840',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(13,15,'central_division',NULL,'2024-01-31 18:00:00','Mr 15',883.00,2,NULL,NULL,NULL,'503',0,1,'income',NULL,'15613874',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(14,15,'central_division',NULL,'2023-11-27 18:00:00','Mr 42',547.00,1,NULL,NULL,NULL,'504',0,1,'income',NULL,'56014326',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(15,15,'central_division',NULL,'2023-12-02 18:00:00','Mr 81',769.00,5,NULL,NULL,NULL,'505',0,1,'income',NULL,'87815359',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(16,16,'central_division',NULL,'2024-01-12 18:00:00','Mr 48',899.00,2,NULL,NULL,NULL,'701',0,1,'income',NULL,'61516728',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(17,16,'central_division',NULL,'2023-11-24 18:00:00','Mr 32',797.00,4,NULL,NULL,NULL,'702',0,1,'income',NULL,'57117174',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(18,16,'central_division',NULL,'2024-01-28 18:00:00','Mr 46',682.00,7,NULL,NULL,NULL,'703',0,1,'income',NULL,'32118681',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(19,16,'central_division',NULL,'2023-11-23 18:00:00','Mr 69',845.00,4,NULL,NULL,NULL,'704',0,1,'income',NULL,'96719838',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(20,16,'central_division',NULL,'2024-01-05 18:00:00','Mr 97',595.00,3,NULL,NULL,NULL,'705',0,1,'income',NULL,'26820641',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(21,17,'central_division',NULL,'2024-02-05 18:00:00','Mr 46',777.00,7,NULL,NULL,NULL,'901',0,1,'income',NULL,'74621366',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(22,17,'central_division',NULL,'2023-11-13 18:00:00','Mr 60',942.00,8,NULL,NULL,NULL,'902',0,1,'income',NULL,'18922749',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(23,17,'central_division',NULL,'2023-11-09 18:00:00','Mr 77',843.00,10,NULL,NULL,NULL,'903',0,1,'income',NULL,'29923680',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(24,17,'central_division',NULL,'2024-01-04 18:00:00','Mr 81',688.00,8,NULL,NULL,NULL,'904',0,1,'income',NULL,'98824939',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(25,17,'central_division',NULL,'2023-12-13 18:00:00','Mr 94',709.00,8,NULL,NULL,NULL,'905',0,1,'income',NULL,'93525686',1,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(26,18,'division_admin',NULL,'2024-02-18 08:14:35','দপ্তর',1000.00,26,NULL,NULL,NULL,NULL,1,0,NULL,NULL,'58326809',1,'2024-02-18 08:14:35','2024-02-18 08:18:37'),(27,19,'division_admin',NULL,'2024-02-18 14:06:47','প্রকাশনা',2123.00,26,NULL,NULL,NULL,NULL,1,0,NULL,NULL,'42727882',1,'2024-02-18 14:06:47','2024-02-18 14:06:47'),(28,19,'division_admin',NULL,'2024-02-18 14:57:36','প্রকাশনা',1500.00,26,NULL,NULL,NULL,NULL,1,0,NULL,NULL,'10228715',1,'2024-02-18 14:57:36','2024-02-18 14:57:36'),(29,14,'division_admin',NULL,'2024-02-18 14:58:06','দপ্তর',50000.00,26,NULL,NULL,NULL,NULL,1,0,NULL,NULL,'18229134',1,'2024-02-18 14:58:06','2024-02-18 14:58:06'),(30,10,'branch',NULL,'2024-02-18 18:00:00','Mr branch',500.00,3,2,20503110201262812,'','100',0,1,'adsd',NULL,'72530116',1,'2024-02-19 05:01:23','2024-02-19 05:01:23'),(31,10,'branch',NULL,'2024-02-09 18:00:00','Mr branch',1000.00,7,1,NULL,'','3',0,1,'asdfasdf',NULL,'46331452',1,'2024-02-19 05:54:43','2024-02-19 05:54:43'),(32,10,'branch',NULL,'2024-02-21 18:00:00','Mr branch',567.00,1,1,NULL,'','2342',0,1,'fasdfasd yyy',NULL,'83932665',1,'2024-02-19 06:22:50','2024-02-19 06:27:44'),(33,19,'division_admin',NULL,'2024-02-19 07:13:41','তথ্য',324666.00,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,'95833566',1,'2024-02-19 07:13:41','2024-02-19 07:14:29'),(34,19,'division_admin',NULL,'2024-02-19 07:15:33','প্রকাশনা',500.00,56,NULL,NULL,NULL,NULL,0,1,NULL,NULL,'87334902',1,'2024-02-19 07:15:33','2024-02-19 07:15:33'),(35,19,'division_admin',NULL,'2024-02-19 07:16:38','তথ্য',500.00,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,'89335175',1,'2024-02-19 07:16:38','2024-02-19 07:16:49'),(36,19,'division_admin',NULL,'2024-02-19 07:17:24','প্রকাশনা',500.00,17,NULL,NULL,NULL,NULL,0,1,NULL,NULL,'86736869',1,'2024-02-19 07:17:24','2024-02-19 07:17:24'),(37,19,'division_admin',NULL,'2024-02-19 07:21:01','প্রকাশনা',200.00,56,NULL,NULL,NULL,NULL,0,1,NULL,NULL,'33437735',1,'2024-02-19 07:21:01','2024-02-19 07:21:01'),(38,19,'division_admin',NULL,'2024-02-19 07:21:40','প্রকাশনা',2342.00,56,NULL,NULL,NULL,NULL,0,1,NULL,NULL,'56438386',1,'2024-02-19 07:21:40','2024-02-19 07:23:07'),(39,19,'division_admin',NULL,'2024-02-19 07:23:33','তথ্য',10005.00,26,NULL,NULL,NULL,NULL,1,0,NULL,NULL,'62639633',1,'2024-02-19 07:23:33','2024-02-19 07:23:44'),(40,14,'division_admin',NULL,'2024-02-19 07:24:04','প্রকাশনা',45555.00,26,NULL,NULL,NULL,NULL,1,0,NULL,NULL,'81740367',1,'2024-02-19 07:24:04','2024-02-19 07:24:25'),(41,5,'bm_manager','','2024-02-19 18:00:00','Mr bm_manager',1100.00,25,NULL,NULL,NULL,NULL,1,0,'',NULL,'68241772',1,'2024-02-19 07:32:32','2024-02-19 07:32:32'),(42,5,'bm_manager','','2024-02-19 18:00:00','Mr bm_manager',1000.00,29,NULL,NULL,NULL,NULL,1,0,'',NULL,'19142268',1,'2024-02-19 07:36:21','2024-02-19 07:36:21');
/*!40000 ALTER TABLE `account_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account_numbers`
--

DROP TABLE IF EXISTS `account_numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_numbers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `account_id` bigint DEFAULT NULL,
  `value` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_numbers`
--

LOCK TABLES `account_numbers` WRITE;
/*!40000 ALTER TABLE `account_numbers` DISABLE KEYS */;
INSERT INTO `account_numbers` VALUES (1,2,'20503110201262812',NULL,'9341238',1,'2024-02-18 08:11:08','2024-02-18 08:11:08');
/*!40000 ALTER TABLE `account_numbers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account_receipt_book_assigns`
--

DROP TABLE IF EXISTS `account_receipt_book_assigns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_receipt_book_assigns` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `division_id` bigint DEFAULT NULL,
  `account_receipt_book_id` bigint DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_receipt_book_assigns`
--

LOCK TABLES `account_receipt_book_assigns` WRITE;
/*!40000 ALTER TABLE `account_receipt_book_assigns` DISABLE KEYS */;
INSERT INTO `account_receipt_book_assigns` VALUES (1,13,1,NULL,'4891395','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(2,14,2,NULL,'6942721','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(3,15,3,NULL,'5803379','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(4,16,4,NULL,'7884764','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(5,17,5,NULL,'5725320','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(6,18,6,NULL,'3926561','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(8,5,7,NULL,'5728865','active','2024-02-19 03:36:15','2024-02-19 03:36:15');
/*!40000 ALTER TABLE `account_receipt_book_assigns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account_receipt_books`
--

DROP TABLE IF EXISTS `account_receipt_books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_receipt_books` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `receipt_book_no` bigint DEFAULT NULL,
  `receipt_start_serial_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receipt_end_serial_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approvel` tinyint DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_receipt_books`
--

LOCK TABLES `account_receipt_books` WRITE;
/*!40000 ALTER TABLE `account_receipt_books` DISABLE KEYS */;
INSERT INTO `account_receipt_books` VALUES (1,1,'100','200',1,NULL,'6291269','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(2,2,'300','400',1,NULL,'1162980','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(3,3,'500','600',1,NULL,'3523867','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(4,4,'700','800',1,NULL,'8834465','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(5,5,'900','1000',1,NULL,'3725106','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(6,6,'1100','1200',1,NULL,'8586110','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(7,7,'1300','1400',1,NULL,'4297817','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(8,8,'1500','1600',1,NULL,'5288137','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(9,9,'1700','1800',1,NULL,'3219405','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(10,10,'1900','2000',1,NULL,'16010692','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(11,11,'3000','3100',0,NULL,'97211858','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(12,12,'3200','3300',1,NULL,'66412714','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(13,13,'3400','3500',1,NULL,'97513803','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(14,14,'3600','3700',0,NULL,'54914763','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(15,15,'3800','3900',0,NULL,'50115239','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(16,16,'4000','4100',1,NULL,'24316435','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(17,17,'4200','4300',1,NULL,'54517689','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(18,18,'4400','4500',1,NULL,'47218119','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(19,19,'4600','4700',1,NULL,'90119105','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(20,20,'4800','4900',0,NULL,'72220487','active','2024-02-18 08:11:07','2024-02-18 08:11:07'),(21,21,'2000','2100',1,NULL,'69721334','active','2024-02-19 00:48:26','2024-02-19 00:58:08'),(22,22,'2030','2050',NULL,NULL,'21722343','active','2024-02-19 00:59:17','2024-02-19 00:59:17'),(23,23,'2010','2020',NULL,NULL,'12623469','active','2024-02-19 01:01:44','2024-02-19 01:01:44'),(24,30,'2012','2019',NULL,NULL,'25224994','active','2024-02-19 02:41:46','2024-02-19 02:41:46'),(25,40,'2100','2200',NULL,NULL,'51625904','active','2024-02-19 02:42:25','2024-02-19 02:42:25');
/*!40000 ALTER TABLE `account_receipt_books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accounts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (1,'cash',NULL,NULL,'8311710',1,'2024-02-18 08:11:08','2024-02-18 08:11:08'),(2,'bank_account',NULL,NULL,'7312400',1,'2024-02-18 08:11:08','2024-02-18 08:11:08'),(3,'bkash',NULL,NULL,'6193338',1,'2024-02-18 08:11:08','2024-02-18 08:11:08'),(4,'nagad',NULL,NULL,'2794649',1,'2024-02-18 08:11:08','2024-02-18 08:11:08'),(5,'rocket',NULL,NULL,'4205706',1,'2024-02-18 08:11:08','2024-02-18 08:11:08');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_asset_category`
--

DROP TABLE IF EXISTS `asset_asset_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asset_asset_category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` bigint DEFAULT NULL,
  `asset_category_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_asset_category`
--

LOCK TABLES `asset_asset_category` WRITE;
/*!40000 ALTER TABLE `asset_asset_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `asset_asset_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_asset_shop_list`
--

DROP TABLE IF EXISTS `asset_asset_shop_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asset_asset_shop_list` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` bigint DEFAULT NULL,
  `asset_shop_list_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_asset_shop_list`
--

LOCK TABLES `asset_asset_shop_list` WRITE;
/*!40000 ALTER TABLE `asset_asset_shop_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `asset_asset_shop_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_audit_lists`
--

DROP TABLE IF EXISTS `asset_audit_lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asset_audit_lists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `asset_audit_id` bigint DEFAULT NULL,
  `asset_id` bigint DEFAULT NULL,
  `is_ok` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_audit_lists`
--

LOCK TABLES `asset_audit_lists` WRITE;
/*!40000 ALTER TABLE `asset_audit_lists` DISABLE KEYS */;
/*!40000 ALTER TABLE `asset_audit_lists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_audits`
--

DROP TABLE IF EXISTS `asset_audits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asset_audits` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `is_complete` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_audits`
--

LOCK TABLES `asset_audits` WRITE;
/*!40000 ALTER TABLE `asset_audits` DISABLE KEYS */;
/*!40000 ALTER TABLE `asset_audits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_brands`
--

DROP TABLE IF EXISTS `asset_brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asset_brands` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` bigint DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_brands`
--

LOCK TABLES `asset_brands` WRITE;
/*!40000 ALTER TABLE `asset_brands` DISABLE KEYS */;
/*!40000 ALTER TABLE `asset_brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_categories`
--

DROP TABLE IF EXISTS `asset_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asset_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `parent_id` bigint DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_categories`
--

LOCK TABLES `asset_categories` WRITE;
/*!40000 ALTER TABLE `asset_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `asset_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_change_histories`
--

DROP TABLE IF EXISTS `asset_change_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asset_change_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` bigint DEFAULT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_value` text COLLATE utf8mb4_unicode_ci,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_change_histories`
--

LOCK TABLES `asset_change_histories` WRITE;
/*!40000 ALTER TABLE `asset_change_histories` DISABLE KEYS */;
/*!40000 ALTER TABLE `asset_change_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_items`
--

DROP TABLE IF EXISTS `asset_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asset_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` bigint DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_waranty` tinyint NOT NULL DEFAULT '0',
  `waranty_date` date DEFAULT NULL,
  `waranty_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_items`
--

LOCK TABLES `asset_items` WRITE;
/*!40000 ALTER TABLE `asset_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `asset_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_losts`
--

DROP TABLE IF EXISTS `asset_losts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asset_losts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` bigint DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `lost_from_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lost_from_user_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lost_date` date DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_losts`
--

LOCK TABLES `asset_losts` WRITE;
/*!40000 ALTER TABLE `asset_losts` DISABLE KEYS */;
/*!40000 ALTER TABLE `asset_losts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_quotations`
--

DROP TABLE IF EXISTS `asset_quotations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asset_quotations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_quotations`
--

LOCK TABLES `asset_quotations` WRITE;
/*!40000 ALTER TABLE `asset_quotations` DISABLE KEYS */;
/*!40000 ALTER TABLE `asset_quotations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_request_to_cps`
--

DROP TABLE IF EXISTS `asset_request_to_cps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asset_request_to_cps` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `central_branch_id` bigint DEFAULT NULL,
  `asset_quotation_id` bigint DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_approved` tinyint NOT NULL DEFAULT '0',
  `request_type` enum('purchase','remove') COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_request_to_cps`
--

LOCK TABLES `asset_request_to_cps` WRITE;
/*!40000 ALTER TABLE `asset_request_to_cps` DISABLE KEYS */;
/*!40000 ALTER TABLE `asset_request_to_cps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_shop_lists`
--

DROP TABLE IF EXISTS `asset_shop_lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asset_shop_lists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number_1` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number_2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_shop_lists`
--

LOCK TABLES `asset_shop_lists` WRITE;
/*!40000 ALTER TABLE `asset_shop_lists` DISABLE KEYS */;
/*!40000 ALTER TABLE `asset_shop_lists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_waranties`
--

DROP TABLE IF EXISTS `asset_waranties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asset_waranties` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` bigint DEFAULT NULL,
  `waranty_date` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `waranty_card_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_waranties`
--

LOCK TABLES `asset_waranties` WRITE;
/*!40000 ALTER TABLE `asset_waranties` DISABLE KEYS */;
/*!40000 ALTER TABLE `asset_waranties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assets`
--

DROP TABLE IF EXISTS `assets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `central_division_id` bigint DEFAULT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `memo_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `memo_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_location` text COLLATE utf8mb4_unicode_ci,
  `asset_owner` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_phone_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depreciation_amount` double(8,2) DEFAULT NULL,
  `depreciation_type` enum('percent','flat') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assets`
--

LOCK TABLES `assets` WRITE;
/*!40000 ALTER TABLE `assets` DISABLE KEYS */;
/*!40000 ALTER TABLE `assets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cp_application_categories`
--

DROP TABLE IF EXISTS `cp_application_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cp_application_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cp_application_categories`
--

LOCK TABLES `cp_application_categories` WRITE;
/*!40000 ALTER TABLE `cp_application_categories` DISABLE KEYS */;
INSERT INTO `cp_application_categories` VALUES (1,'bm moukuf',NULL,NULL,'bm-moukuf-5671783','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(2,'prokasona moukuf',NULL,NULL,'prokasona-moukuf-9842937','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(3,'collection moukuf',NULL,NULL,'collection-moukuf-9193701','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(4,'leave application',NULL,NULL,'leave-application-5674109','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(5,'testimonial application',NULL,NULL,'testimonial-application-1005761','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(6,'Faver','asdfasdf',NULL,'faver-9896133','active','2024-02-19 06:59:56','2024-02-19 06:59:56');
/*!40000 ALTER TABLE `cp_application_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cp_application_formats`
--

DROP TABLE IF EXISTS `cp_application_formats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cp_application_formats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cp_application_category_id` bigint DEFAULT NULL,
  `field_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field_type` enum('text','select','radio','checkbox','file','textarea') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_format` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cp_application_formats`
--

LOCK TABLES `cp_application_formats` WRITE;
/*!40000 ALTER TABLE `cp_application_formats` DISABLE KEYS */;
INSERT INTO `cp_application_formats` VALUES (1,1,'full name','text',NULL,NULL,'4981271','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(2,1,'sakha','text',NULL,NULL,'4472590','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(3,1,'contact number','text',NULL,NULL,'1603460','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(4,1,'number type (whatsapp,telegram,offline)','text',NULL,NULL,'3754146','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(5,1,'description','textarea',NULL,NULL,'4195580','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(6,1,'attachment','file',NULL,NULL,'7976418','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(7,2,'full name','text',NULL,NULL,'1397928','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(8,2,'sakha','text',NULL,NULL,'3918393','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(9,2,'contact number','text',NULL,NULL,'1399284','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(10,2,'number type (whatsapp,telegram,offline)','text',NULL,NULL,'22210574','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(11,2,'description','textarea',NULL,NULL,'94811759','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(12,2,'attachment','file',NULL,NULL,'36412266','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(13,3,'full name','text',NULL,NULL,'99713301','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(14,3,'sakha','text',NULL,NULL,'45614741','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(15,3,'contact number','text',NULL,NULL,'25615646','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(16,3,'number type (whatsapp,telegram,offline)','text',NULL,NULL,'10216997','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(17,3,'description','textarea',NULL,NULL,'72217535','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(18,3,'attachment','file',NULL,NULL,'94218204','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(19,4,'full name','text',NULL,NULL,'58719956','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(20,4,'sakha','text',NULL,NULL,'42120103','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(21,4,'contact number','text',NULL,NULL,'92121810','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(22,4,'number type (whatsapp,telegram,offline)','text',NULL,NULL,'61322231','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(23,4,'description','textarea',NULL,NULL,'88723546','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(24,4,'attachment','file',NULL,NULL,'55124328','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(25,5,'full name','text',NULL,NULL,'96125920','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(26,5,'sakha','text',NULL,NULL,'21626995','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(27,5,'contact number','text',NULL,NULL,'99927831','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(28,5,'number type (whatsapp,telegram,offline)','text',NULL,NULL,'75628839','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(29,5,'description','textarea',NULL,NULL,'63329348','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(30,5,'attachment','file',NULL,NULL,'94830809','active','2024-02-18 08:11:08','2024-02-18 08:11:08');
/*!40000 ALTER TABLE `cp_application_formats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cp_application_values`
--

DROP TABLE IF EXISTS `cp_application_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cp_application_values` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cp_application_id` bigint DEFAULT NULL,
  `title_id` bigint DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cp_application_values`
--

LOCK TABLES `cp_application_values` WRITE;
/*!40000 ALTER TABLE `cp_application_values` DISABLE KEYS */;
INSERT INTO `cp_application_values` VALUES (1,1,1,'full name','Mr xyz',NULL,'full-name-5021617','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(2,1,2,'sakha','mohanogor dohkin',NULL,'sakha-5812873','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(3,1,3,'contact number','9999999999',NULL,'contact-number-4043845','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(4,1,4,'number type (whatsapp,telegram,offline)','telegram',NULL,'number-type-whatsapptelegramoffline-8414401','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(5,1,5,'description','\n                    Subject: Leave Application\n                    Dear [Manager\'s Name],\n                    I am writing to request a [number of days] leave from [start date] to [end date] due to [reason for leave]. I have made the necessary arrangements to ensure a smooth workflow during my absence. I believe this time off will not disrupt our operations.\n\n                    I will be available for any urgent matters and will ensure a smooth handover of my responsibilities. I understand the importance of my role and will make every effort to minimize any inconvenience caused.\n\n                    I kindly request your approval for this leave, and I assure you of my commitment to fulfilling my duties promptly upon my return. Thank you for your understanding.\n\n                    Sincerely,\n                    [Your Name]\n                    ',NULL,'description-2685191','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(6,1,6,'attachment','',NULL,'attachment-3766590','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(7,2,1,'full name','Mr xyz',NULL,'full-name-2837137','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(8,2,2,'sakha','mohanogor uttor',NULL,'sakha-7958557','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(9,2,3,'contact number','9999999999',NULL,'contact-number-5469838','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(10,2,4,'number type (whatsapp,telegram,offline)','whatsapp',NULL,'number-type-whatsapptelegramoffline-57010786','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(11,2,5,'description','\n                    Subject: Leave Application\n                    Dear [Manager\'s Name],\n                    I am writing to request a [number of days] leave from [start date] to [end date] due to [reason for leave]. I have made the necessary arrangements to ensure a smooth workflow during my absence. I believe this time off will not disrupt our operations.\n\n                    I will be available for any urgent matters and will ensure a smooth handover of my responsibilities. I understand the importance of my role and will make every effort to minimize any inconvenience caused.\n\n                    I kindly request your approval for this leave, and I assure you of my commitment to fulfilling my duties promptly upon my return. Thank you for your understanding.\n\n                    Sincerely,\n                    [Your Name]\n                    ',NULL,'description-20611661','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(12,2,6,'attachment','',NULL,'attachment-32412720','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(13,3,1,'full name','Mr xyz',NULL,'full-name-63413700','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(14,3,2,'sakha','gazypur',NULL,'sakha-92814472','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(15,3,3,'contact number','9999999999',NULL,'contact-number-77915370','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(16,3,4,'number type (whatsapp,telegram,offline)','whatsapp',NULL,'number-type-whatsapptelegramoffline-21116356','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(17,3,5,'description','\n                    Subject: Leave Application\n                    Dear [Manager\'s Name],\n                    I am writing to request a [number of days] leave from [start date] to [end date] due to [reason for leave]. I have made the necessary arrangements to ensure a smooth workflow during my absence. I believe this time off will not disrupt our operations.\n\n                    I will be available for any urgent matters and will ensure a smooth handover of my responsibilities. I understand the importance of my role and will make every effort to minimize any inconvenience caused.\n\n                    I kindly request your approval for this leave, and I assure you of my commitment to fulfilling my duties promptly upon my return. Thank you for your understanding.\n\n                    Sincerely,\n                    [Your Name]\n                    ',NULL,'description-53717955','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(18,3,6,'attachment','',NULL,'attachment-28918815','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(19,4,NULL,'full name','sadfasd',NULL,'full-name-14319367','active','2024-02-19 07:09:59','2024-02-19 07:09:59'),(20,4,NULL,'sakha','asdf',NULL,'sakha-23020929','active','2024-02-19 07:09:59','2024-02-19 07:09:59'),(21,4,NULL,'contact number','asdf',NULL,'contact-number-36021962','active','2024-02-19 07:09:59','2024-02-19 07:09:59'),(22,4,NULL,'number type (whatsapp,telegram,offline)','asdf',NULL,'number-type-whatsapptelegramoffline-64922354','active','2024-02-19 07:09:59','2024-02-19 07:09:59'),(23,4,NULL,'description','asdf',NULL,'description-52423349','active','2024-02-19 07:09:59','2024-02-19 07:09:59');
/*!40000 ALTER TABLE `cp_application_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cp_applications`
--

DROP TABLE IF EXISTS `cp_applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cp_applications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cp_application_category_id` bigint DEFAULT NULL,
  `applicant_id` bigint DEFAULT NULL,
  `income_category_id` bigint DEFAULT NULL,
  `pdf_submission_file` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approve` tinyint NOT NULL DEFAULT '0',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `subject` text COLLATE utf8mb4_unicode_ci,
  `is_moukuf` tinyint NOT NULL DEFAULT '0',
  `moukuf_amount` bigint DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cp_applications`
--

LOCK TABLES `cp_applications` WRITE;
/*!40000 ALTER TABLE `cp_applications` DISABLE KEYS */;
INSERT INTO `cp_applications` VALUES (1,2,12,NULL,NULL,0,NULL,'application for test purppose',0,NULL,NULL,'6231232','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(2,1,12,NULL,NULL,0,NULL,'application for test purppose',0,NULL,NULL,'7622322','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(3,3,15,NULL,NULL,0,NULL,'application for test purppose',0,NULL,NULL,'5483706','active','2024-02-18 08:11:08','2024-02-18 08:11:08'),(4,1,17,1,NULL,1,NULL,'application for test purppose',0,NULL,NULL,'9384230','active','2024-02-19 07:09:59','2024-02-19 07:11:00');
/*!40000 ALTER TABLE `cp_applications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `house_rents`
--

DROP TABLE IF EXISTS `house_rents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `house_rents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `account_log_id` bigint DEFAULT NULL,
  `house_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `month` date DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `house_rents`
--

LOCK TABLES `house_rents` WRITE;
/*!40000 ALTER TABLE `house_rents` DISABLE KEYS */;
INSERT INTO `house_rents` VALUES (1,18,26,'dfasdf tt','asdfasdf tt',1000,'2024-02-20',NULL,'8201896','active','2024-02-18 08:14:35','2024-02-18 08:18:37');
/*!40000 ALTER TABLE `house_rents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jamanot_payments`
--

DROP TABLE IF EXISTS `jamanot_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jamanot_payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `jamanot_provide_id` bigint DEFAULT NULL,
  `account_log_id` bigint DEFAULT NULL,
  `category_id` bigint DEFAULT NULL,
  `amount` bigint DEFAULT NULL,
  `amount_in_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `given_date` date DEFAULT NULL,
  `attachment` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `due` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jamanot_payments`
--

LOCK TABLES `jamanot_payments` WRITE;
/*!40000 ALTER TABLE `jamanot_payments` DISABLE KEYS */;
INSERT INTO `jamanot_payments` VALUES (1,19,1,36,17,500,'Five Hundred','2024-02-19',NULL,'asdf','0','paid',NULL,'9031353','active','2024-02-19 07:17:24','2024-02-19 07:17:24'),(2,19,1,38,56,2342,'Two Thousand Three Hundred Fourty Two','2024-02-19',NULL,NULL,'322324','due',NULL,'1542485','active','2024-02-19 07:21:40','2024-02-19 07:23:07');
/*!40000 ALTER TABLE `jamanot_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jamanot_providers`
--

DROP TABLE IF EXISTS `jamanot_providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jamanot_providers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `account_log_id` bigint DEFAULT NULL,
  `category_id` bigint DEFAULT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medium` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medium_identity` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` bigint DEFAULT NULL,
  `amount_in_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `given_by` bigint DEFAULT NULL,
  `taken_date` date DEFAULT NULL,
  `given_date` date DEFAULT NULL,
  `attachment` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Due',
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jamanot_providers`
--

LOCK TABLES `jamanot_providers` WRITE;
/*!40000 ALTER TABLE `jamanot_providers` DISABLE KEYS */;
INSERT INTO `jamanot_providers` VALUES (1,19,35,17,'application for test purppose','asdf','aasdf',500,'Five Hundred',5,'2024-02-19','2024-02-21','uploads/jamanot/2024-02-19-13163816025.jpeg','asdf','paid',NULL,'9751980','active','2024-02-19 07:16:38','2024-02-19 07:17:24');
/*!40000 ALTER TABLE `jamanot_providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loan_payments`
--

DROP TABLE IF EXISTS `loan_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loan_payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `loan_provide_id` bigint DEFAULT NULL,
  `account_log_id` bigint DEFAULT NULL,
  `category_id` bigint DEFAULT NULL,
  `amount` bigint DEFAULT NULL,
  `amount_in_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `given_date` date DEFAULT NULL,
  `attachment` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `due` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loan_payments`
--

LOCK TABLES `loan_payments` WRITE;
/*!40000 ALTER TABLE `loan_payments` DISABLE KEYS */;
INSERT INTO `loan_payments` VALUES (1,19,1,34,56,500,'Five Hundred','2024-02-19','uploads/loan/2024-02-19-13154489018.jpg','asdfas','324166','due',NULL,'1501878','active','2024-02-19 07:15:33','2024-02-19 07:15:44'),(2,19,1,37,56,200,'Two Hundred','2024-02-19',NULL,NULL,'324466','due',NULL,'5922366','active','2024-02-19 07:21:01','2024-02-19 07:21:07');
/*!40000 ALTER TABLE `loan_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loan_providers`
--

DROP TABLE IF EXISTS `loan_providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loan_providers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `account_log_id` bigint DEFAULT NULL,
  `category_id` bigint DEFAULT NULL,
  `amount` bigint DEFAULT NULL,
  `amount_in_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `given_by` bigint DEFAULT NULL,
  `taken_date` date DEFAULT NULL,
  `given_date` date DEFAULT NULL,
  `purpose` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appropriator` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Due',
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loan_providers`
--

LOCK TABLES `loan_providers` WRITE;
/*!40000 ALTER TABLE `loan_providers` DISABLE KEYS */;
INSERT INTO `loan_providers` VALUES (1,19,33,56,324666,'Three Lakhs Twenty Four Thousand Six Hundred Sixty Six',5,'2024-02-19','2024-02-19','adfasdf','md lasdjfl','uploads/loan/2024-02-19-13134118147.png','asdfasd','due',NULL,'9741473','active','2024-02-19 07:13:41','2024-02-19 07:15:44');
/*!40000 ALTER TABLE `loan_providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2016_06_01_000001_create_oauth_auth_codes_table',1),(5,'2016_06_01_000002_create_oauth_access_tokens_table',1),(6,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(7,'2016_06_01_000004_create_oauth_clients_table',1),(8,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(9,'2019_08_19_000000_create_failed_jobs_table',1),(10,'2019_12_14_000001_create_personal_access_tokens_table',1),(11,'create_cp_application_categories_table',2),(12,'create_cp_application_formats_table',2),(13,'create_cp_application_values_table',2),(14,'create_cp_applications_table',2),(15,'create_house_rents_table',2),(16,'create_jamanot_payments_table',2),(17,'create_jamanot_providers_table',2),(18,'create_loan_payments_table',2),(19,'create_loan_providers_table',2),(20,'create_office_rents_table',2),(21,'create_salaries_table',2),(22,'create_setting_titles_table',2),(23,'create_sohid_families_table',2),(24,'create_user_notifications_table',2),(25,'create_user_permissions_table',2),(26,'create_user_roles_table',2),(27,'create_users_table',2),(28,'create_account_branch_targets_table',3),(29,'create_account_categories_table',3),(30,'create_account_division_budgets_table',3),(31,'create_account_expenses_table',3),(32,'create_account_income_extrafields_table',3),(33,'create_account_incomes_table',3),(34,'create_account_logs_table',3),(35,'create_account_numbers_table',3),(36,'create_account_receipt_book_assigns_table',3),(37,'create_account_receipt_books_table',3),(38,'create_accounts_table',3),(39,'create_asset_audit_lists_table',4),(40,'create_asset_audits_table',4),(41,'create_asset_brands_table',4),(42,'create_asset_categories_table',4),(43,'create_asset_change_histories_table',4),(44,'create_asset_items_table',4),(45,'create_asset_losts_table',4),(46,'create_asset_quotations_table',4),(47,'create_asset_request_to_cps_table',4),(48,'create_asset_shop_lists_table',4),(49,'create_asset_waranties_table',4),(50,'create_assets_table',4),(51,'create_quotation_product_prices_table',4),(52,'create_quotation_products_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `client_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` VALUES ('1eceec872bd1a78f06bc76aee0ce5c204f07268b2134aa92c95c1325398705b978493db8311decb9',3,1,'accessToken','[]',1,'2024-02-19 00:52:14','2024-02-19 00:52:14','2025-02-19 06:52:14'),('2942dafa49834c883719ae2d88cc4f67bcb0300248dc4005860a479378af34a8577437cd2e79d686',5,1,'accessToken','[]',0,'2024-02-18 23:34:26','2024-02-18 23:34:26','2025-02-19 05:34:26'),('6701d393f19744a419a314510a5fde82884689055e4a1ad88884b5d83f0f68f06306629742782eb3',3,1,'accessToken','[]',0,'2024-02-19 00:52:33','2024-02-19 00:52:33','2025-02-19 06:52:33'),('cfcd876b11621f8962099967512ae1307116666017cc493014baecf673b8b5905672b755d146d60d',5,1,'accessToken','[]',1,'2024-02-18 13:30:30','2024-02-18 13:30:30','2025-02-18 19:30:30'),('e50485022e9c6c03744c2a98764fad4460bb09213830ad576db9763a6f2ea799bca702012ac21960',3,1,'accessToken','[]',1,'2024-02-19 00:51:27','2024-02-19 00:51:27','2025-02-19 06:51:27'),('ee568e3f0c8ca3b08475b60ac3452f745faf5413eec2e17e28124212a70a5211dcc2d9fa0a35c1db',5,1,'accessToken','[]',1,'2024-02-18 08:15:55','2024-02-18 08:15:55','2025-02-18 14:15:55');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `client_id` bigint unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (1,NULL,'Laravel Personal Access Client','AIqj97uxt7BdNdZdrv86lD3hxB63FBAnxyjAP9pS',NULL,'http://localhost',1,0,0,'2024-02-18 08:11:08','2024-02-18 08:11:08'),(2,NULL,'Laravel Password Grant Client','rJJlMC2zGoERMWxgHaVUMx46RgO0xmQTAOZhmgNA','users','http://localhost',0,1,0,'2024-02-18 08:11:08','2024-02-18 08:11:08');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (1,1,'2024-02-18 08:11:08','2024-02-18 08:11:08');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `office_rents`
--

DROP TABLE IF EXISTS `office_rents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `office_rents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `account_log_id` bigint DEFAULT NULL,
  `office_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `month` date DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `office_rents`
--

LOCK TABLES `office_rents` WRITE;
/*!40000 ALTER TABLE `office_rents` DISABLE KEYS */;
INSERT INTO `office_rents` VALUES (1,19,27,'Motijil','Bangladesh',2123,'2024-02-01',NULL,'6181944','active','2024-02-18 14:06:47','2024-02-18 14:58:51'),(2,19,28,'dhanmondy','Bangladesh',1500,'2024-01-19',NULL,'2312485','active','2024-02-18 14:57:36','2024-02-18 14:57:36'),(3,14,29,'Motijil','Bangladeshasdfasd',50000,'2024-03-19',NULL,'1903746','active','2024-02-18 14:58:06','2024-02-18 14:58:06');
/*!40000 ALTER TABLE `office_rents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotation_product_prices`
--

DROP TABLE IF EXISTS `quotation_product_prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quotation_product_prices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `quotation_product_id` bigint DEFAULT NULL,
  `quotation_product_asset_quotation_id` bigint DEFAULT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `shop_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `quotation_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotation_product_prices`
--

LOCK TABLES `quotation_product_prices` WRITE;
/*!40000 ALTER TABLE `quotation_product_prices` DISABLE KEYS */;
/*!40000 ALTER TABLE `quotation_product_prices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotation_products`
--

DROP TABLE IF EXISTS `quotation_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quotation_products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `asset_quotation_id` bigint DEFAULT NULL,
  `product_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotation_products`
--

LOCK TABLES `quotation_products` WRITE;
/*!40000 ALTER TABLE `quotation_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `quotation_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salaries`
--

DROP TABLE IF EXISTS `salaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `salaries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `account_log_id` bigint DEFAULT NULL,
  `category_id` bigint DEFAULT NULL,
  `amount` bigint DEFAULT NULL,
  `amount_in_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `given_by` bigint DEFAULT NULL,
  `date` date DEFAULT NULL,
  `attachment` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salaries`
--

LOCK TABLES `salaries` WRITE;
/*!40000 ALTER TABLE `salaries` DISABLE KEYS */;
/*!40000 ALTER TABLE `salaries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting_titles`
--

DROP TABLE IF EXISTS `setting_titles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `setting_titles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting_titles`
--

LOCK TABLES `setting_titles` WRITE;
/*!40000 ALTER TABLE `setting_titles` DISABLE KEYS */;
/*!40000 ALTER TABLE `setting_titles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting_values`
--

DROP TABLE IF EXISTS `setting_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `setting_values` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `setting_title_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting_values`
--

LOCK TABLES `setting_values` WRITE;
/*!40000 ALTER TABLE `setting_values` DISABLE KEYS */;
/*!40000 ALTER TABLE `setting_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sohid_families`
--

DROP TABLE IF EXISTS `sohid_families`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sohid_families` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sohid_families`
--

LOCK TABLES `sohid_families` WRITE;
/*!40000 ALTER TABLE `sohid_families` DISABLE KEYS */;
/*!40000 ALTER TABLE `sohid_families` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `target_moukuf`
--

DROP TABLE IF EXISTS `target_moukuf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `target_moukuf` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `account_income_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_log_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `target_moukuf`
--

LOCK TABLES `target_moukuf` WRITE;
/*!40000 ALTER TABLE `target_moukuf` DISABLE KEYS */;
/*!40000 ALTER TABLE `target_moukuf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_notification_seen`
--

DROP TABLE IF EXISTS `user_notification_seen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_notification_seen` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_notification_id` bigint DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_notification_seen`
--

LOCK TABLES `user_notification_seen` WRITE;
/*!40000 ALTER TABLE `user_notification_seen` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_notification_seen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_notifications`
--

DROP TABLE IF EXISTS `user_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `topic` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `to_all` tinyint NOT NULL DEFAULT '0',
  `to_department` bigint DEFAULT NULL,
  `seen` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_notifications`
--

LOCK TABLES `user_notifications` WRITE;
/*!40000 ALTER TABLE `user_notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_permissions`
--

DROP TABLE IF EXISTS `user_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial` int DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_permissions`
--

LOCK TABLES `user_permissions` WRITE;
/*!40000 ALTER TABLE `user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial` int DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (1,'super_admin',1,NULL,'super-admin-5521733','active','2024-02-18 08:11:05','2024-02-18 08:11:05'),(2,'admin',2,NULL,'admin-3562911','active','2024-02-18 08:11:06','2024-02-18 08:11:06'),(3,'cp',3,NULL,'cp-8353214','active','2024-02-18 08:11:06','2024-02-18 08:11:06'),(4,'sg',4,NULL,'sg-6544191','active','2024-02-18 08:11:06','2024-02-18 08:11:06'),(5,'bm_manager',5,NULL,'bm-manager-4325658','active','2024-02-18 08:11:06','2024-02-18 08:11:06'),(6,'bm_support_manager',6,NULL,'bm-support-manager-4826284','active','2024-02-18 08:11:06','2024-02-18 08:11:06'),(7,'division_admin',7,NULL,'division-admin-8227685','active','2024-02-18 08:11:06','2024-02-18 08:11:06'),(8,'division_support_admin',8,NULL,'division-support-admin-9288567','active','2024-02-18 08:11:06','2024-02-18 08:11:06'),(9,'division_without_audit',9,NULL,'division-without-audit-9029348','active','2024-02-18 08:11:06','2024-02-18 08:11:06'),(10,'branch',10,NULL,'branch-81510146','active','2024-02-18 08:11:06','2024-02-18 08:11:06'),(11,'auditor',11,NULL,'auditor-97211601','active','2024-02-18 08:11:06','2024-02-18 08:11:06'),(12,'division_employee',12,NULL,'division-employee-83312979','active','2024-02-18 08:11:06','2024-02-18 08:11:06'),(13,'well_wisher',13,NULL,'well-wisher-72113670','active','2024-02-18 08:11:06','2024-02-18 08:11:06');
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_user_permission`
--

DROP TABLE IF EXISTS `user_user_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_user_permission` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `user_permission_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_user_permission`
--

LOCK TABLES `user_user_permission` WRITE;
/*!40000 ALTER TABLE `user_user_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_user_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_user_role`
--

DROP TABLE IF EXISTS `user_user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_user_role` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `user_role_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_user_role`
--

LOCK TABLES `user_user_role` WRITE;
/*!40000 ALTER TABLE `user_user_role` DISABLE KEYS */;
INSERT INTO `user_user_role` VALUES (1,1,1,NULL,NULL),(2,2,2,NULL,NULL),(3,3,3,NULL,NULL),(4,4,4,NULL,NULL),(5,5,5,NULL,NULL),(6,6,6,NULL,NULL),(7,7,7,NULL,NULL),(8,8,8,NULL,NULL),(9,9,9,NULL,NULL),(10,10,10,NULL,NULL),(11,11,11,NULL,NULL),(12,12,12,NULL,NULL),(13,13,13,NULL,NULL),(14,14,7,NULL,NULL),(15,15,7,NULL,NULL),(16,16,7,NULL,NULL),(17,17,7,NULL,NULL),(18,18,7,NULL,NULL),(19,19,7,NULL,NULL),(20,20,12,NULL,NULL);
/*!40000 ALTER TABLE `user_user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `parent` bigint DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'Mr super_admin','super_admin@gmail.com','$2y$10$l0dWAJXmeVoto50tnnVY5Obx8AUaANxMVk/o6ep9YV0/scWZSzNli','396075576908','super_admin','Shadhin Jonota','812239513','avatar.png',NULL,'mr-super-admin-1681405','active',NULL,NULL,'2024-02-18 08:11:06','2024-02-18 08:11:06'),(2,NULL,'Mr admin','admin@gmail.com','$2y$10$j0mz7YC0DVb5f7HJG/qCBOCJDY.n/6YULuuCvY0WxgjW3NhftT67u','415188838790','admin','Shadhin Jonota','812239513','avatar.png',NULL,'mr-admin-4482867','active',NULL,NULL,'2024-02-18 08:11:06','2024-02-18 08:11:06'),(3,NULL,'Mr cp','cp@gmail.com','$2y$10$r82Odf6P4nbkvuIiSLWan.RGkZ/u5d447A6RvPwTcqjuL20Y1mMgW','580157142479','cp','Shadhin Jonota','812239513','avatar.png',NULL,'mr-cp-8343347','active',NULL,NULL,'2024-02-18 08:11:06','2024-02-18 08:11:06'),(4,NULL,'Mr sg','sg@gmail.com','$2y$10$stzHrDiOU5QIoEWAvyd5HOTu8p69QJRy6pbh0w.hBNR8OJwxHe9O2','352613206440','sg','Shadhin Jonota','812239513','avatar.png',NULL,'mr-sg-2094574','active',NULL,NULL,'2024-02-18 08:11:06','2024-02-18 08:11:06'),(5,NULL,'Mr bm_manager','bm_manager@gmail.com','$2y$10$A3xAbZmFinLhan1Zvgz98ewlgBy5dx2DaNihtvP7KaXzxZn2408c6','390374602150','bm_manager','Shadhin Jonota','812239513','avatar.png',NULL,'mr-bm-manager-6995837','active',NULL,NULL,'2024-02-18 08:11:06','2024-02-18 08:11:06'),(6,5,'Mr bm_support_manager','bm_support_manager@gmail.com','$2y$10$xZvwsRcwrVYkQsglS0aNje8967EPZI6cEjwt89gEl4K3DyoDDNXim','944947053610','bm_support_manager','Shadhin Jonota','812239513','avatar.png',NULL,'mr-bm-support-manager-9776269','active',NULL,NULL,'2024-02-18 08:11:06','2024-02-18 08:11:06'),(7,NULL,'Mr division_admin','division_admin@gmail.com','$2y$10$rzaAzry08Zyzv69GQA40WONa9a19Pd2EwHaYiP0Kxpp4fqOsz6mTu','841153952549','division_admin','Shadhin Jonota','812239513','avatar.png',NULL,'mr-division-admin-1137286','active',NULL,NULL,'2024-02-18 08:11:06','2024-02-18 08:11:06'),(8,7,'Mr division_support_admin','division_support_admin@gmail.com','$2y$10$jQpUM7rEAgn6s1sUY/0t4.pAOypBnK2/9yhf9PdaduOaiFxMoJzxi','931939815100','division_support_admin','Shadhin Jonota','812239513','avatar.png',NULL,'mr-division-support-admin-1498118','active',NULL,NULL,'2024-02-18 08:11:06','2024-02-18 08:11:06'),(9,NULL,'Mr division_without_audit','division_without_audit@gmail.com','$2y$10$Zb51JOCFs88eBWEkXSgRfeNln91dMqju/Cc1ye3xoJXSqy0Xmy.UW','706175343916','division_without_audit','Shadhin Jonota','812239513','avatar.png',NULL,'mr-division-without-audit-6029335','active',NULL,NULL,'2024-02-18 08:11:06','2024-02-18 08:11:06'),(10,NULL,'Mr branch','branch@gmail.com','$2y$10$nFdtwvil5ywaePcXpzuMlufh/3YwoQ8QGcznweND5R9KpsbewjHVG','165602521032','branch','Shadhin Jonota','812239513','avatar.png',NULL,'mr-branch-82410195','active',NULL,NULL,'2024-02-18 08:11:06','2024-02-18 08:11:06'),(11,NULL,'Mr auditor','auditor@gmail.com','$2y$10$0XANWV6pBDncQQkFhTKug.lvHrHmxE7jH1EciUNGjccqODqzso/x2','268879945168','auditor','Shadhin Jonota','812239513','avatar.png',NULL,'mr-auditor-59111900','active',NULL,NULL,'2024-02-18 08:11:06','2024-02-18 08:11:06'),(12,NULL,'Mr division_employee','division_employee@gmail.com','$2y$10$TGofCQGqcL..pC2U7IqV/.hx/xNFwEiY4TDhPZ9nRvEJfmi0yjnAS','614567229173','division_employee','Shadhin Jonota','812239513','avatar.png',NULL,'mr-division-employee-12912246','active',NULL,NULL,'2024-02-18 08:11:06','2024-02-18 08:11:06'),(13,NULL,'Mr well_wisher','well_wisher@gmail.com','$2y$10$3zOkGe0sIh3gAbHqBdx51uyK1UfE.viHvfOiLzrL/Kmgz.UTWWTIO','741330597541','well_wisher','Shadhin Jonota','812239513','avatar.png',NULL,'mr-well-wisher-45313770','active',NULL,NULL,'2024-02-18 08:11:06','2024-02-18 08:11:06'),(14,NULL,'দপ্তর','দপ্তর@gmail.com','$2y$10$pt3yiz1y9Bm/iV2F/6Oo.OkqU2QMrtWPzppceDShXYk/Jeph16YV6','427832409307','1001','Shadhin Jonota','812239513','avatar.png',NULL,'dptr-46614511','active',NULL,NULL,'2024-02-18 08:11:06','2024-02-18 08:11:06'),(15,NULL,'সাহিত্য','সাহিত্য@gmail.com','$2y$10$aRRyep53TaMYx2mmIzkZ4OEq99M0PhRgyY8JYISf36s4L7BToGUHO','437448826968','1002','Shadhin Jonota','812239513','avatar.png',NULL,'sahitz-98615158','active',NULL,NULL,'2024-02-18 08:11:06','2024-02-18 08:11:06'),(16,NULL,'গবেষণা','গবেষণা@gmail.com','$2y$10$ZHDNk9UQ5Pk.o/6aQhJVk.o3H2YZeVn8FvUQUvk0F79WXpKGusxxO','688956872066','1003','Shadhin Jonota','812239513','avatar.png',NULL,'gbeshna-14016551','active',NULL,NULL,'2024-02-18 08:11:06','2024-02-18 08:11:06'),(17,NULL,'প্রচার','প্রচার@gmail.com','$2y$10$E922xj4wU7LYjEEvqfxlzuZG7VI7f0431tqDHzaRs875gSTQEY2R.','167049485499','1004','Shadhin Jonota','812239513','avatar.png',NULL,'prcar-92517460','active',NULL,NULL,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(18,NULL,'তথ্য','তথ্য@gmail.com','$2y$10$qqeE0sP60/7pw41PDAjIz.vgBudiJihTx8CiVO1kYc8KMxdnqPtZG','235869609227','1005','Shadhin Jonota','812239513','avatar.png',NULL,'tthz-39718495','active',NULL,NULL,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(19,NULL,'প্রকাশনা','প্রকাশনা@gmail.com','$2y$10$A5CilYE.fnUwy5Qg6Viq7OOAMAsUIxQPn6CSp8CPGSLIUEko6W.0y','323824010112','1006','Shadhin Jonota','812239513','avatar.png',NULL,'prkasna-60619416','active',NULL,NULL,'2024-02-18 08:11:07','2024-02-18 08:11:07'),(20,NULL,'new user u','newuser@gamil.com','$2y$10$vJhlTIlDIABmB.ciEZf/auTEq.y4fh2zw6f0WYq0.5KfGwPtRCidi','2134123477777','11166','11166','1166','uploads/user/2024-02-19-13254066310.png',NULL,'new-user-88920798','active',NULL,NULL,'2024-02-19 07:25:40','2024-02-19 07:26:05');
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

-- Dump completed on 2024-02-19 19:49:32
