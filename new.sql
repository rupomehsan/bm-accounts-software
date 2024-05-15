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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_branch_targets`
--

LOCK TABLES `account_branch_targets` WRITE;
/*!40000 ALTER TABLE `account_branch_targets` DISABLE KEYS */;
INSERT INTO `account_branch_targets` VALUES (1,'72','2024-05-15','[\"werwqrqwer\"]',10,5000.00,'monthly',NULL,'1501118','active','2024-05-15 03:12:51','2024-05-15 03:12:51');
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
  `is_default` tinyint DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_categories`
--

LOCK TABLES `account_categories` WRITE;
/*!40000 ALTER TABLE `account_categories` DISABLE KEYS */;
INSERT INTO `account_categories` VALUES (1,'মাসিক আয়',' ',1,'income',NULL,'masik-ay-3771802',1,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(2,'বার্ষিক আয়',' ',1,'income',NULL,'barshik-ay-2622529',1,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(3,'ত্রাণ',' ',1,'income',NULL,'tran-3473609',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(4,'শহীদ ফান্ড',' ',1,'income',NULL,'sheed-fand-4274832',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(5,'কর্যে হাসানা',' ',1,'income',NULL,'krze-hasana-4205414',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(6,'বকেয়া আদায়',' ',1,'income',NULL,'bkeya-aday-2886236',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(7,'নববর্ষ বাবদ',' ',1,'income',NULL,'nbbrsh-babd-7937828',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(8,'ফ্লাট আয়',' ',1,'income',NULL,'flat-ay-9268786',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(9,'মওকুফ',' ',1,'income',NULL,'mookuf-6659500',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(10,'বিশেষ আয়',' ',1,'income',NULL,'bisesh-ay-94010535',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(11,'ঘাটতি',' ',1,'income',NULL,'ghatti-96511875',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(12,'ভুর্তুকি',' ',1,'income',NULL,'vurtuki-22012178',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(13,'ব্যাঙ্ক জমার মাধ্যমে আয়',' ',1,'income',NULL,'bzank-jmar-madhzme-ay-45813856',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(14,'অগ্রিম আয়',' ',1,'income',NULL,'ogrim-ay-30014156',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(15,'এককালীন',' ',1,'income',NULL,'ekkaleen-36715275',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(16,'ঋণ পরিশোধ',' ',1,'income',NULL,'rrin-prisodh-33416401',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(17,'জামানত',' ',1,'income',NULL,'jamant-20717192',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(18,'সিলেবাসের বই ক্রয় বাবদ',' ',1,'expense',NULL,'silebaser-bi-kry-babd-92018181',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(19,'যাতায়াত',' ',1,'expense',NULL,'zatayat-44319732',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(20,'আপ্যায়ন',' ',1,'expense',NULL,'apzayn-27020559',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(21,'মোবাইল রিচার্জ',' ',1,'expense',NULL,'mobail-ricarj-83421354',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(22,'পরিবহন খরচ',' ',1,'expense',NULL,'pribhn-khrc-16122406',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(23,'অফিস স্টেশনারী',' ',1,'expense',NULL,'ofis-stesnaree-58323557',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(24,'মাসিক বেতন',' ',1,'expense',NULL,'masik-betn-57024421',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(25,'সৈজন্য প্রদান',' ',1,'expense',NULL,'soijnz-prdan-36625657',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(26,'অফিস ভাড়া',' ',1,'expense',NULL,'ofis-vara-31426361',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(27,'বাসা ভাড়া',' ',1,'expense',NULL,'basa-vara-77727373',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(28,'গোডাউন ভাড়া',' ',1,'expense',NULL,'godaun-vara-99728457',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(29,'ইন্টারনেট বিল (সংযোগসহ)',' ',1,'expense',NULL,'intarnet-bil-sngzogsh-88229245',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(30,'জামানত',' ',1,'expense',NULL,'jamant-44730926',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(31,'ট্রেড লাইসেন্স',' ',1,'expense',NULL,'tred-laisens-57231571',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(32,'সৈজন্য',' ',1,'expense',NULL,'soijnz-66532836',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(33,'মওকুফ',' ',1,'expense',NULL,'mookuf-98433623',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(34,'বস্তা ক্রয় / কাটুন বিল',' ',1,'expense',NULL,'bsta-kry-katun-bil-87634192',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(35,'পত্রিকা বিল',' ',1,'expense',NULL,'ptrika-bil-75135329',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(36,'সম্পদ ক্রয়',' ',1,'expense',NULL,'smpd-kry-77136986',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(37,'মোবাইল ক্রয়',' ',1,'expense',NULL,'mobail-kry-13537875',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(38,'পানি বিল',' ',1,'expense',NULL,'pani-bil-75038612',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(39,'বিবিদ',' ',1,'expense',NULL,'bibid-27739715',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(40,'এককালিন',' ',1,'expense',NULL,'ekkalin-67140238',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(41,'ঈদ সামগ্রি',' ',1,'expense',NULL,'eed-samgri-24041249',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(42,'মাল ফেরত',' ',1,'expense',NULL,'mal-fert-10742110',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(43,'ব্যাংক কর্তন',' ',1,'expense',NULL,'bzangk-krtn-12943899',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(44,'চিকিৎসা বাবদ',' ',1,'expense',NULL,'cikittsa-babd-72644906',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(45,'ফ্ল্যাট বাবদ খরচ',' ',1,'expense',NULL,'flzat-babd-khrc-39945947',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(46,'নসিহত',' ',1,'expense',NULL,'nsiht-19146127',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(47,'আহবান',' ',1,'expense',NULL,'ahban-70547550',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(48,'নববর্ষ উদ্ভোদন',' ',1,'expense',NULL,'nbbrsh-udvodn-92948965',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(49,'নববর্ষ অনুষ্ঠান',' ',1,'expense',NULL,'nbbrsh-onushthan-57249638',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(50,'ব্যংক নগদ জমার মাধ্যমে',' ',1,'expense',NULL,'bzngk-ngd-jmar-madhzme-74950548',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(51,'ঘাটতি',' ',1,'expense',NULL,'ghatti-95951599',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(52,'মেরামত',' ',1,'expense',NULL,'meramt-68252267',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(53,'নববর্ষ',' ',1,'expense',NULL,'nbbrsh-57553602',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(54,'সম্পদ ক্রয়',' ',1,'expense',NULL,'smpd-kry-11454312',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(55,'ডেকরেশন',' ',1,'expense',NULL,'dekresn-85555270',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(56,'ঋণ প্রদান',' ',1,'expense',NULL,'rrin-prdan-26156558',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(57,'ভি আই পি ব্যাগ',' ',1,'expense',NULL,'vi-ai-pi-bzag-11257413',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(58,'আবাসন',' ',1,'expense',NULL,'abasn-94558867',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(59,'পরিমান',' ',1,'expense',NULL,'priman-31259653',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(60,'যানবাহন',' ',1,'expense',NULL,'zanbahn-93960991',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(61,'সম্পদ',' ',1,'expense',NULL,'smpd-42861813',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(62,'চিকিৎসা',' ',1,'expense',NULL,'cikittsa-17362686',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(63,'ছাত্রকল্যান',' ',1,'expense',NULL,'chatrklzan-58563204',0,'active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(64,'শিক্ষা সহায়তা',' ',1,'expense',NULL,'siksha-shayta-83264569',0,'active','2024-05-15 03:08:10','2024-05-15 03:08:10'),(65,'প্রো.বাস্তবায়ন',' ',1,'expense',NULL,'probastbayn-66165975',0,'active','2024-05-15 03:08:10','2024-05-15 03:08:10'),(66,'প্রশিক্ষন',' ',1,'expense',NULL,'prsikshn-74466832',0,'active','2024-05-15 03:08:10','2024-05-15 03:08:10'),(67,'শহীদ পরিবার',' ',1,'expense',NULL,'sheed-pribar-73967683',0,'active','2024-05-15 03:08:10','2024-05-15 03:08:10'),(68,'মামলা',' ',1,'expense',NULL,'mamla-10968516',0,'active','2024-05-15 03:08:10','2024-05-15 03:08:10'),(69,'শিশুকল্যাণ',' ',1,'expense',NULL,'sisuklzan-61569689',0,'active','2024-05-15 03:08:10','2024-05-15 03:08:10'),(70,'দা.কার্যক্রম',' ',1,'expense',NULL,'dakarzkrm-95570504',0,'active','2024-05-15 03:08:10','2024-05-15 03:08:10'),(71,'ঋণ ডিলিট',' ',1,'expense',NULL,'rrin-dilit-21471447',1,'active','2024-05-15 03:08:10','2024-05-15 03:08:10'),(72,'আয় সমন্নয়',' ',1,'expense',NULL,'ay-smnny-60272575',1,'active','2024-05-15 03:08:10','2024-05-15 03:08:10');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_division_budgets`
--

LOCK TABLES `account_division_budgets` WRITE;
/*!40000 ALTER TABLE `account_division_budgets` DISABLE KEYS */;
/*!40000 ALTER TABLE `account_division_budgets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account_expense_months`
--

DROP TABLE IF EXISTS `account_expense_months`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_expense_months` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `month` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint NOT NULL DEFAULT '0',
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_expense_months`
--

LOCK TABLES `account_expense_months` WRITE;
/*!40000 ALTER TABLE `account_expense_months` DISABLE KEYS */;
INSERT INTO `account_expense_months` VALUES (1,'2024-06',1,NULL,'6301389','active','2024-05-15 03:29:04','2024-05-15 03:29:04');
/*!40000 ALTER TABLE `account_expense_months` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_expense_support_image_table`
--

LOCK TABLES `account_expense_support_image_table` WRITE;
/*!40000 ALTER TABLE `account_expense_support_image_table` DISABLE KEYS */;
INSERT INTO `account_expense_support_image_table` VALUES (1,'uploads/voucher/2024-05-15-09331122829.png',NULL,'7471451','active','2024-05-15 03:33:11','2024-05-15 03:33:11'),(2,'uploads/voucher/2024-05-15-09344116114.png',NULL,'5222420','active','2024-05-15 03:34:41','2024-05-15 03:34:41'),(3,'uploads/voucher/2024-05-15-10013754622.png',NULL,'1813192','active','2024-05-15 04:01:37','2024-05-15 04:01:37'),(4,'uploads/voucher/2024-05-15-1025558721.JPG',NULL,'7014145','active','2024-05-15 04:25:55','2024-05-15 04:25:55'),(5,'uploads/voucher/2024-05-15-1227504915.png',NULL,'6205529','active','2024-05-15 06:27:50','2024-05-15 06:27:50'),(6,'uploads/voucher/2024-05-15-12355758164.png',NULL,'8396199','active','2024-05-15 06:35:57','2024-05-15 06:35:57');
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
  `account_log_id` bigint DEFAULT NULL,
  `account_expense_category_id` bigint DEFAULT NULL,
  `department_id` bigint DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `approved_by_admin` tinyint NOT NULL DEFAULT '0',
  `approved_by_bm` tinyint NOT NULL DEFAULT '0',
  `approved_by_cp` tinyint NOT NULL DEFAULT '0',
  `is_canceled` tinyint NOT NULL DEFAULT '0',
  `cancel_by` bigint DEFAULT NULL,
  `amount` bigint DEFAULT NULL,
  `amount_in_text` text COLLATE utf8mb4_unicode_ci,
  `image_id` bigint DEFAULT NULL,
  `cancel_comment` text COLLATE utf8mb4_unicode_ci,
  `date` date DEFAULT NULL,
  `folio` int unsigned DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_expense_support_table`
--

LOCK TABLES `account_expense_support_table` WRITE;
/*!40000 ALTER TABLE `account_expense_support_table` DISABLE KEYS */;
INSERT INTO `account_expense_support_table` VALUES (1,1,NULL,67,5,'Mcashupdate','asdf','aaaa','this is package one',1,1,0,0,NULL,100,'এক শত',1,NULL,'2024-05-15',NULL,5,'8001310','active','2024-05-15 03:33:11','2024-05-15 03:33:11'),(2,2,9,69,5,'Mcashupdate','asdf','aaaa','Testing',1,1,1,0,NULL,100,'এক শত',2,NULL,'2024-05-15',NULL,5,'4082815','active','2024-05-15 03:34:41','2024-05-15 04:01:59'),(3,2,10,69,5,'Mcashupdate','asdf','sdf','asdfasdf',0,1,1,0,NULL,500,'পাঁচ শত',3,NULL,'2024-05-15',NULL,5,'7483327','active','2024-05-15 04:01:37','2024-05-15 04:02:29'),(4,3,NULL,68,7,'Md Ehsan','asdfffff','asdf','asdfasdf',1,0,0,0,NULL,1000,'এক হাজার',4,NULL,'2024-05-15',NULL,7,'1764734','active','2024-05-15 04:25:55','2024-05-15 04:25:55'),(5,4,NULL,31,8,'shefat masum','asdf','asdf','asdf',0,0,0,0,NULL,200,'দুই শত',5,NULL,'2024-05-15',20,8,'9975487','active','2024-05-15 06:27:50','2024-05-15 06:27:50'),(6,5,NULL,32,8,'shefat masum','asdf','asdf','asdf',0,0,0,0,NULL,2090,'দুই হাজারনব্বই',6,NULL,'2024-05-15',74,8,'7716229','active','2024-05-15 06:35:57','2024-05-15 06:35:57');
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
  `selected_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `folio` int unsigned DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_expenses`
--

LOCK TABLES `account_expenses` WRITE;
/*!40000 ALTER TABLE `account_expenses` DISABLE KEYS */;
INSERT INTO `account_expenses` VALUES (1,0,5,67,100,'2024-05-15','2024-06',NULL,5,'6821214','active','2024-05-15 03:33:11','2024-05-15 03:33:11'),(2,1,5,69,600,'2024-05-15','2024-06',NULL,5,'9362927','active','2024-05-15 03:34:41','2024-05-15 04:02:29'),(3,0,7,68,1000,'2024-05-15','2024-06',NULL,7,'9703516','active','2024-05-15 04:25:55','2024-05-15 04:25:55'),(4,0,7,31,200,'2024-05-15','2024-06',20,8,'3684723','active','2024-05-15 06:27:50','2024-05-15 06:27:50'),(5,0,7,32,2090,'2024-05-15','2024-06',74,8,'8745931','active','2024-05-15 06:35:57','2024-05-15 06:35:57');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_income_extrafields`
--

LOCK TABLES `account_income_extrafields` WRITE;
/*!40000 ALTER TABLE `account_income_extrafields` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_incomes`
--

LOCK TABLES `account_incomes` WRITE;
/*!40000 ALTER TABLE `account_incomes` DISABLE KEYS */;
INSERT INTO `account_incomes` VALUES (1,1,1,NULL,66,NULL,10,'20','2024-05-15','hkjhk',10000.00,'দশ হাজার',NULL,NULL,NULL,'9991514','active','2024-05-15 03:14:07','2024-05-15 03:14:07'),(2,2,1,NULL,70,NULL,NULL,'1','2024-05-20','koo',1000.00,'এক হাজার',NULL,NULL,NULL,'7362422','active','2024-05-15 03:16:04','2024-05-15 03:16:04');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_logs`
--

LOCK TABLES `account_logs` WRITE;
/*!40000 ALTER TABLE `account_logs` DISABLE KEYS */;
INSERT INTO `account_logs` VALUES (1,10,'branch',NULL,'2024-05-14 18:00:00','Mr branch',10000.00,66,2,2,'','20',0,1,'hkjhk',NULL,'9881365',1,'2024-05-15 03:14:07','2024-05-15 03:14:07'),(2,NULL,'',NULL,'2024-05-19 18:00:00','',1000.00,70,2,1,'','1',0,1,'koo',NULL,'2112700',1,'2024-05-15 03:16:04','2024-05-15 03:16:04'),(3,15,'division_admin',NULL,'2024-05-14 18:00:00',NULL,5000.00,71,1,NULL,NULL,NULL,1,0,'Account balance for loan  added, related log id: ',NULL,'4173830',1,'2024-05-15 03:21:22','2024-05-15 03:21:22'),(4,15,'division_admin',NULL,NULL,NULL,5000.00,16,1,NULL,NULL,NULL,0,1,'Account balance for loan  added, related log id: ',NULL,'6704561',1,'2024-05-15 03:21:57','2024-05-15 03:21:57'),(5,16,'division_admin',NULL,'2024-05-15 03:27:18','সাহিত্য',5000.00,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL,'8605281',1,'2024-05-15 03:27:18','2024-05-15 03:27:18'),(6,16,'division_admin',NULL,'2024-05-15 03:27:42','সাহিত্য',5000.00,17,NULL,NULL,NULL,NULL,0,1,NULL,NULL,'5456323',1,'2024-05-15 03:27:42','2024-05-15 03:27:42'),(7,17,'division_admin',NULL,'2024-05-15 03:28:05','গবেষণা',5000.00,26,NULL,NULL,NULL,NULL,1,0,NULL,NULL,'4037343',1,'2024-05-15 03:28:05','2024-05-15 03:28:05'),(8,17,'division_admin',NULL,'2024-05-15 03:28:20','গবেষণা',1000.00,26,NULL,NULL,NULL,NULL,1,0,NULL,NULL,'4098495',1,'2024-05-15 03:28:20','2024-05-15 03:28:20'),(9,3,'cp','','2024-05-14 18:00:00','Mr cp',100.00,69,NULL,NULL,NULL,NULL,1,0,'',NULL,'2609689',1,'2024-05-15 04:01:59','2024-05-15 04:01:59'),(10,3,'cp','','2024-05-14 18:00:00','Mr cp',500.00,69,NULL,NULL,NULL,NULL,1,0,'',NULL,'63610222',1,'2024-05-15 04:02:29','2024-05-15 04:02:29');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_numbers`
--

LOCK TABLES `account_numbers` WRITE;
/*!40000 ALTER TABLE `account_numbers` DISABLE KEYS */;
INSERT INTO `account_numbers` VALUES (1,2,'2812',NULL,'4081778',1,'2024-05-15 03:08:10','2024-05-15 03:08:10'),(2,2,'2813',NULL,'7142279',1,'2024-05-15 03:08:10','2024-05-15 03:08:10'),(3,2,'2814',NULL,'5343975',1,'2024-05-15 03:08:10','2024-05-15 03:08:10');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_receipt_book_assigns`
--

LOCK TABLES `account_receipt_book_assigns` WRITE;
/*!40000 ALTER TABLE `account_receipt_book_assigns` DISABLE KEYS */;
INSERT INTO `account_receipt_book_assigns` VALUES (1,5,1,NULL,'4391238','active','2024-05-15 03:11:51','2024-05-15 03:11:51'),(2,16,2,NULL,'4032281','active','2024-05-15 03:12:10','2024-05-15 03:12:10');
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
  `receipt_book_no` bigint unsigned DEFAULT NULL,
  `receipt_start_serial_no` bigint unsigned DEFAULT NULL,
  `receipt_end_serial_no` bigint unsigned DEFAULT NULL,
  `is_approvel` tinyint DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_receipt_books`
--

LOCK TABLES `account_receipt_books` WRITE;
/*!40000 ALTER TABLE `account_receipt_books` DISABLE KEYS */;
INSERT INTO `account_receipt_books` VALUES (1,1,1,50,1,NULL,'8871840','active','2024-05-15 03:10:00','2024-05-15 03:11:38'),(2,2,51,100,1,NULL,'9312344','active','2024-05-15 03:10:16','2024-05-15 03:11:11');
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
INSERT INTO `accounts` VALUES (1,'cash',NULL,NULL,'3561754',1,'2024-05-15 03:08:10','2024-05-15 03:08:10'),(2,'bank_account',NULL,NULL,'2162304',1,'2024-05-15 03:08:10','2024-05-15 03:08:10'),(3,'bkash',NULL,NULL,'6733910',1,'2024-05-15 03:08:10','2024-05-15 03:08:10'),(4,'nagad',NULL,NULL,'5334863',1,'2024-05-15 03:08:10','2024-05-15 03:08:10'),(5,'rocket',NULL,NULL,'6655744',1,'2024-05-15 03:08:10','2024-05-15 03:08:10');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_audit_lists`
--

DROP TABLE IF EXISTS `asset_audit_lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asset_audit_lists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` bigint DEFAULT NULL,
  `asset_audit_id` bigint DEFAULT NULL,
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
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `desciption` text COLLATE utf8mb4_unicode_ci,
  `parent` bigint DEFAULT NULL,
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
  `item_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `qty` bigint DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_waranty` tinyint DEFAULT NULL,
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
  `lost_reason` text COLLATE utf8mb4_unicode_ci,
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
-- Table structure for table `asset_request_to_cps`
--

DROP TABLE IF EXISTS `asset_request_to_cps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asset_request_to_cps` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` bigint DEFAULT NULL,
  `asset_quotation_id` bigint DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quotation_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` tinyint DEFAULT NULL,
  `request_type` enum('remove','purchase') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Dumping data for table `asset_shop_lists`
--

LOCK TABLES `asset_shop_lists` WRITE;
/*!40000 ALTER TABLE `asset_shop_lists` DISABLE KEYS */;
/*!40000 ALTER TABLE `asset_shop_lists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asset_transfers`
--

DROP TABLE IF EXISTS `asset_transfers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asset_transfers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` bigint DEFAULT NULL,
  `sender_id` bigint DEFAULT NULL,
  `receiver_id` bigint DEFAULT NULL,
  `is_accepted_by_receiver` tinyint NOT NULL DEFAULT '0',
  `accepted_date` date DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `desctiption` text COLLATE utf8mb4_unicode_ci,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asset_transfers`
--

LOCK TABLES `asset_transfers` WRITE;
/*!40000 ALTER TABLE `asset_transfers` DISABLE KEYS */;
/*!40000 ALTER TABLE `asset_transfers` ENABLE KEYS */;
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
  `central_division_id` bigint DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` bigint DEFAULT NULL,
  `memo_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `memo_date` date DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_location` text COLLATE utf8mb4_unicode_ci,
  `asset_owner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depreciation_type` enum('flat','percent') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'dummy.png',
  `voucher_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'dummy.png',
  `acceptance_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'dummy.png',
  `buying_date` date DEFAULT NULL,
  `hand_over_date` date DEFAULT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci,
  `cs_quotaiton_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` bigint DEFAULT NULL,
  `cs_quotation_id` bigint DEFAULT NULL,
  `asset_quotation_id` bigint DEFAULT NULL,
  `asset_request_to_cp_id` bigint DEFAULT NULL,
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
-- Table structure for table `assets_has_asset_category`
--

DROP TABLE IF EXISTS `assets_has_asset_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assets_has_asset_category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` bigint DEFAULT NULL,
  `asset_category_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assets_has_asset_category`
--

LOCK TABLES `assets_has_asset_category` WRITE;
/*!40000 ALTER TABLE `assets_has_asset_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `assets_has_asset_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assets_has_asset_shop_lists`
--

DROP TABLE IF EXISTS `assets_has_asset_shop_lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assets_has_asset_shop_lists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` bigint DEFAULT NULL,
  `asset_shop_list_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assets_has_asset_shop_lists`
--

LOCK TABLES `assets_has_asset_shop_lists` WRITE;
/*!40000 ALTER TABLE `assets_has_asset_shop_lists` DISABLE KEYS */;
/*!40000 ALTER TABLE `assets_has_asset_shop_lists` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cp_application_categories`
--

LOCK TABLES `cp_application_categories` WRITE;
/*!40000 ALTER TABLE `cp_application_categories` DISABLE KEYS */;
INSERT INTO `cp_application_categories` VALUES (1,'Moukuf','asdf',NULL,'moukuf-4441622','active','2024-05-15 03:22:29','2024-05-15 03:22:29');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cp_application_formats`
--

LOCK TABLES `cp_application_formats` WRITE;
/*!40000 ALTER TABLE `cp_application_formats` DISABLE KEYS */;
INSERT INTO `cp_application_formats` VALUES (5,1,'name','text',NULL,NULL,'2625340','active','2024-05-15 03:23:45','2024-05-15 03:23:45'),(6,1,'phone','text',NULL,NULL,'8546430','active','2024-05-15 03:23:45','2024-05-15 03:23:45'),(7,1,'address','text',NULL,NULL,'7647759','active','2024-05-15 03:23:45','2024-05-15 03:23:45'),(8,1,'description','textarea',NULL,NULL,'7698539','active','2024-05-15 03:23:45','2024-05-15 03:23:45');
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cp_application_values`
--

LOCK TABLES `cp_application_values` WRITE;
/*!40000 ALTER TABLE `cp_application_values` DISABLE KEYS */;
INSERT INTO `cp_application_values` VALUES (5,1,NULL,'name','asdfas',NULL,'name-1935995','active','2024-05-15 03:24:41','2024-05-15 03:24:41'),(6,1,NULL,'phone','234234',NULL,'phone-8816122','active','2024-05-15 03:24:41','2024-05-15 03:24:41'),(7,1,NULL,'address','dfasdf',NULL,'address-8477598','active','2024-05-15 03:24:41','2024-05-15 03:24:41'),(8,1,NULL,'description','qwerqwerqwerfasdfasdfasdf',NULL,'description-5558704','active','2024-05-15 03:24:41','2024-05-15 03:24:41'),(9,2,NULL,'name','aasdfasd',NULL,'name-8279712','active','2024-05-15 03:26:46','2024-05-15 03:26:46'),(10,2,NULL,'phone','asdf',NULL,'phone-30510954','active','2024-05-15 03:26:46','2024-05-15 03:26:46'),(11,2,NULL,'address','asdf',NULL,'address-87711121','active','2024-05-15 03:26:46','2024-05-15 03:26:46'),(12,2,NULL,'description','asdf',NULL,'description-94212187','active','2024-05-15 03:26:46','2024-05-15 03:26:46');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cp_applications`
--

LOCK TABLES `cp_applications` WRITE;
/*!40000 ALTER TABLE `cp_applications` DISABLE KEYS */;
INSERT INTO `cp_applications` VALUES (1,1,16,NULL,NULL,1,'adsfadsf','domain kaj korce na',0,NULL,NULL,'6971586','active','2024-05-15 03:24:03','2024-05-15 03:26:03'),(2,1,17,NULL,NULL,0,NULL,'test subject',0,NULL,NULL,'3832875','active','2024-05-15 03:26:46','2024-05-15 03:26:46');
/*!40000 ALTER TABLE `cp_applications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `depertment_members`
--

DROP TABLE IF EXISTS `depertment_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `depertment_members` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint DEFAULT NULL COMMENT 'user_id',
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `depertment_members`
--

LOCK TABLES `depertment_members` WRITE;
/*!40000 ALTER TABLE `depertment_members` DISABLE KEYS */;
/*!40000 ALTER TABLE `depertment_members` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `house_rents`
--

LOCK TABLES `house_rents` WRITE;
/*!40000 ALTER TABLE `house_rents` DISABLE KEYS */;
INSERT INTO `house_rents` VALUES (1,17,8,'dfasdf','sdfasdf',1000,'2024-05-15',NULL,'8401175','active','2024-05-15 03:28:20','2024-05-15 03:28:20');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jamanot_payments`
--

LOCK TABLES `jamanot_payments` WRITE;
/*!40000 ALTER TABLE `jamanot_payments` DISABLE KEYS */;
INSERT INTO `jamanot_payments` VALUES (1,16,1,6,17,5000,'পাঁচ হাজার','2024-05-15',NULL,'sdsdf','0','paid',NULL,'5541562','active','2024-05-15 03:27:42','2024-05-15 03:27:42');
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
INSERT INTO `jamanot_providers` VALUES (1,16,5,17,'test subject','asdf','asd',5000,'পাঁচ হাজার',5,'2024-05-15','2024-05-15','uploads/jamanot/2024-05-15-09271887944.jpeg','asdfasd','paid',NULL,'5601363','active','2024-05-15 03:27:18','2024-05-15 03:27:42');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loan_payments`
--

LOCK TABLES `loan_payments` WRITE;
/*!40000 ALTER TABLE `loan_payments` DISABLE KEYS */;
INSERT INTO `loan_payments` VALUES (1,15,1,4,56,5000,'পাঁচ হাজার','2024-05-15',NULL,'fewwer','0',NULL,NULL,'6501315','active','2024-05-15 03:21:57','2024-05-15 03:21:57');
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
  `total_paid` bigint unsigned DEFAULT NULL,
  `due_amount` bigint unsigned DEFAULT NULL,
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
INSERT INTO `loan_providers` VALUES (1,15,3,56,5000,'পাঁচ হাজার',5,'2024-05-15','2024-05-15','buy car','sadf','uploads/loan/2024-05-15-09212272324.JPG','kjhohuih','Due',5000,0,NULL,'2291159','active','2024-05-15 03:21:22','2024-05-15 03:21:57');
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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2016_06_01_000001_create_oauth_auth_codes_table',1),(5,'2016_06_01_000002_create_oauth_access_tokens_table',1),(6,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(7,'2016_06_01_000004_create_oauth_clients_table',1),(8,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(9,'2019_08_19_000000_create_failed_jobs_table',1),(10,'2019_12_14_000001_create_personal_access_tokens_table',1),(11,'create_cp_application_categories_table',2),(12,'create_cp_application_formats_table',2),(13,'create_cp_application_values_table',2),(14,'create_cp_applications_table',2),(15,'create_house_rents_table',2),(16,'create_jamanot_payments_table',2),(17,'create_jamanot_providers_table',2),(18,'create_loan_payments_table',2),(19,'create_loan_providers_table',2),(20,'create_office_rents_table',2),(21,'create_salaries_table',2),(22,'create_setting_titles_table',2),(23,'create_sohid_families_table',2),(24,'create_user_notifications_table',2),(25,'create_user_permissions_table',2),(26,'create_user_roles_table',2),(27,'create_users_table',2),(28,'create_website_settings_table',2),(29,'create_account_branch_targets_table',3),(30,'create_account_categories_table',3),(31,'create_account_division_budgets_table',3),(32,'create_account_expenses_table',3),(33,'create_account_income_extrafields_table',3),(34,'create_account_incomes_table',3),(35,'create_account_logs_table',3),(36,'create_account_numbers_table',3),(37,'create_account_receipt_book_assigns_table',3),(38,'create_account_receipt_books_table',3),(39,'create_accounts_table',3),(40,'create_asset_audit_lists_table',4),(41,'create_asset_audits_table',4),(42,'create_asset_brands_table',4),(43,'create_asset_categories_table',4),(44,'create_asset_change_histories_table',4),(45,'create_asset_items_table',4),(46,'create_asset_losts_table',4),(47,'create_asset_request_to_cps_table',4),(48,'create_asset_shop_lists_table',4),(49,'create_asset_transfers_table',4),(50,'create_asset_waranties_table',4),(51,'create_assets_table',4),(52,'create_module_ones_table',4),(53,'create_product_prices_table',5),(54,'create_products_table',5),(55,'create_quotations_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `module_ones`
--

DROP TABLE IF EXISTS `module_ones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module_ones` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci,
  `phone` bigint DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module_ones`
--

LOCK TABLES `module_ones` WRITE;
/*!40000 ALTER TABLE `module_ones` DISABLE KEYS */;
/*!40000 ALTER TABLE `module_ones` ENABLE KEYS */;
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
INSERT INTO `oauth_access_tokens` VALUES ('0d9f06a1b48b80d2a2706edb3ae228a725e13a59ab3b212ab97bd6ea478c625ff506c37c85f4dfec',7,1,'accessToken','[]',0,'2024-05-15 04:53:48','2024-05-15 04:53:48','2025-05-15 10:53:48'),('64a79152b29f709d240e2ff8cc42adae50f811ccf3907933d626089675d284095cc040267dde64d0',8,1,'accessToken','[]',0,'2024-05-15 06:35:31','2024-05-15 06:35:31','2025-05-15 12:35:31'),('665ab35038123b62fc0f4122a5afb3a30984b232ad2086a1fd9969afcdb330cf754b933e0141f3cc',8,1,'accessToken','[]',1,'2024-05-15 05:14:32','2024-05-15 05:14:32','2025-05-15 11:14:32'),('679894b6d35d7ba5e1fd2336e923b73db7b22fed77c976788db61db40944f86744f41b3e0f61b5c2',7,1,'accessToken','[]',1,'2024-05-15 04:21:32','2024-05-15 04:21:33','2025-05-15 10:21:32'),('6f4d15011055e8cfcebf930f007e5cdec94913a1b33a689572fb74b7afdc56fd1cdc2b7bf9ec8ab7',5,1,'accessToken','[]',0,'2024-05-15 03:08:45','2024-05-15 03:08:45','2025-05-15 09:08:45'),('7d68ce043d1253f439817252eb547da6c1b4a3ff9e01c240a248ec2fb5cc4af759f9bfebcbcdfafd',7,1,'accessToken','[]',1,'2024-05-15 04:25:25','2024-05-15 04:25:25','2025-05-15 10:25:25'),('8630f66f4291222f3b500b5aa2705e42b885e1ee8ef27dcbd8738bf901531ed69a626c4029de3242',3,1,'accessToken','[]',1,'2024-05-15 04:25:09','2024-05-15 04:25:09','2025-05-15 10:25:09'),('919e6e0852df3ee6a9f6a8787a4ddbacdca11c5992611d26387cb8a92d36859406de03dc3a5efcc5',3,1,'accessToken','[]',0,'2024-05-15 04:26:43','2024-05-15 04:26:43','2025-05-15 10:26:43'),('d5d7bceaa7dc797e0458feace04a2dff60d168fd28a32c2a37c79cf3ee141b3b7d46d219e2b90b89',3,1,'accessToken','[]',1,'2024-05-15 03:10:56','2024-05-15 03:10:56','2025-05-15 09:10:56');
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
INSERT INTO `oauth_clients` VALUES (1,NULL,'Laravel Personal Access Client','MAF7T8TFAPQGqvUljaHLF1N3n5VlrZdndPWmlYJQ',NULL,'http://localhost',1,0,0,'2024-05-15 03:08:10','2024-05-15 03:08:10'),(2,NULL,'Laravel Password Grant Client','XVAKqlt36r2XcmC0m945vnReWCxz2yli70kSDabB','users','http://localhost',0,1,0,'2024-05-15 03:08:10','2024-05-15 03:08:10');
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
INSERT INTO `oauth_personal_access_clients` VALUES (1,1,'2024-05-15 03:08:10','2024-05-15 03:08:10');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `office_rents`
--

LOCK TABLES `office_rents` WRITE;
/*!40000 ALTER TABLE `office_rents` DISABLE KEYS */;
INSERT INTO `office_rents` VALUES (1,17,7,'asdfasdf','Bangladesh',5000,'2024-05-15',NULL,'2591265','active','2024-05-15 03:28:05','2024-05-15 03:28:05');
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
-- Table structure for table `product_prices`
--

DROP TABLE IF EXISTS `product_prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_prices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint DEFAULT NULL,
  `asset_quotation_id` bigint DEFAULT NULL,
  `shope_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `shop_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `quotation_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_prices`
--

LOCK TABLES `product_prices` WRITE;
/*!40000 ALTER TABLE `product_prices` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_prices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `asset_quotation_id` bigint DEFAULT NULL,
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
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotations`
--

DROP TABLE IF EXISTS `quotations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quotations` (
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
-- Dumping data for table `quotations`
--

LOCK TABLES `quotations` WRITE;
/*!40000 ALTER TABLE `quotations` DISABLE KEYS */;
/*!40000 ALTER TABLE `quotations` ENABLE KEYS */;
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
  `seen` tinyint NOT NULL DEFAULT '0',
  `creator` bigint unsigned DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_notifications`
--

LOCK TABLES `user_notifications` WRITE;
/*!40000 ALTER TABLE `user_notifications` DISABLE KEYS */;
INSERT INTO `user_notifications` VALUES (1,5,'asdfasdf','asdfasdf',0,NULL,0,NULL,'9181380','active','2024-05-15 04:38:36','2024-05-15 04:38:36'),(2,18,'asdfasdf','asdfasdf',0,NULL,0,NULL,'4222351','active','2024-05-15 04:38:38','2024-05-15 04:38:38');
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (1,'super_admin',1,NULL,'super-admin-7311133','active','2024-05-15 03:08:08','2024-05-15 03:08:08'),(2,'admin',2,NULL,'admin-9232553','active','2024-05-15 03:08:08','2024-05-15 03:08:08'),(3,'cp',3,NULL,'cp-6593519','active','2024-05-15 03:08:08','2024-05-15 03:08:08'),(4,'sg',4,NULL,'sg-4804287','active','2024-05-15 03:08:08','2024-05-15 03:08:08'),(5,'bm_manager',5,NULL,'bm-manager-9945817','active','2024-05-15 03:08:08','2024-05-15 03:08:08'),(6,'bm_support_manager',6,NULL,'bm-support-manager-2356371','active','2024-05-15 03:08:08','2024-05-15 03:08:08'),(7,'division_admin',7,NULL,'division-admin-6237678','active','2024-05-15 03:08:08','2024-05-15 03:08:08'),(8,'division_support_admin',8,NULL,'division-support-admin-9958347','active','2024-05-15 03:08:08','2024-05-15 03:08:08'),(9,'division_without_audit',9,NULL,'division-without-audit-6799929','active','2024-05-15 03:08:08','2024-05-15 03:08:08'),(10,'branch',10,NULL,'branch-89310267','active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(11,'auditor',11,NULL,'auditor-41111822','active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(12,'division_employee',12,NULL,'division-employee-18312466','active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(13,'well_wisher',13,NULL,'well-wisher-48513722','active','2024-05-15 03:08:09','2024-05-15 03:08:09'),(14,'loan_recipient',14,NULL,'loan-recipient-42214721','active','2024-05-15 03:08:09','2024-05-15 03:08:09');
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
INSERT INTO `user_user_role` VALUES (1,1,1,NULL,NULL),(2,2,2,NULL,NULL),(3,3,3,NULL,NULL),(4,4,4,NULL,NULL),(5,5,5,NULL,NULL),(6,6,6,NULL,NULL),(7,7,7,NULL,NULL),(8,8,8,NULL,NULL),(9,9,9,NULL,NULL),(10,10,10,NULL,NULL),(11,11,11,NULL,NULL),(12,12,12,NULL,NULL),(13,13,13,NULL,NULL),(14,14,14,NULL,NULL),(15,15,7,NULL,NULL),(16,16,7,NULL,NULL),(17,17,7,NULL,NULL),(18,18,7,NULL,NULL),(19,19,7,NULL,NULL),(20,20,7,NULL,NULL);
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
  `is_blocked` tinyint NOT NULL DEFAULT '0',
  `no_of_attempt` int NOT NULL DEFAULT '0',
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
INSERT INTO `users` VALUES (1,NULL,'Mr super_admin','super_admin@gmail.com','$2y$10$DkAEEW4i7I6CwyOpMBhlk.fnxDfnAw7mlOfSTP1Gn7./FERLenTNq','290233785592','super_admin','Shadhin Jonota','812239513','avatar.png',NULL,'mr-super-admin-3411176','active',0,0,NULL,NULL,'2024-05-15 03:08:08','2024-05-15 03:08:08'),(2,NULL,'Mr admin','admin@gmail.com','$2y$10$rnN1v1jHD/NjND8/G0yZKOmzWH8G3Yp/UsxaE1GEhfO9i5hvRca8q','391538332878','admin','Shadhin Jonota','812239513','avatar.png',NULL,'mr-admin-8672198','active',0,0,NULL,NULL,'2024-05-15 03:08:08','2024-05-15 03:08:08'),(3,NULL,'Mr cp','cp@gmail.com','$2y$10$1mBOVLB6VGL3RQYz8WpH9O0vN.EI/pK8efldbNdIxch4mxaYU42ru','204077151248','cp','Shadhin Jonota','812239513','avatar.png',NULL,'mr-cp-6063217','active',0,0,NULL,NULL,'2024-05-15 03:08:08','2024-05-15 03:08:08'),(4,NULL,'Mr sg','sg@gmail.com','$2y$10$WhbfwVr4G9JJVD5wJSDZnuOVmR2FBq7FzxCYE4G73T3h6wTnyXf8G','531525143545','sg','Shadhin Jonota','812239513','avatar.png',NULL,'mr-sg-7534345','active',0,0,NULL,NULL,'2024-05-15 03:08:08','2024-05-15 03:08:08'),(5,NULL,'Mr bm_manager','bm_manager@gmail.com','$2y$10$kNF3NsQpZey44KcwT7qIn.rg7WaZuOcS60pmXiHnmVYEVxc31aWVC','555994229950','bm_manager','Shadhin Jonota','812239513','avatar.png',NULL,'mr-bm-manager-1415704','active',0,0,NULL,NULL,'2024-05-15 03:08:08','2024-05-15 03:08:08'),(6,5,'Mr bm_support_manager','bm_support_manager@gmail.com','$2y$10$OH5ayx.4NfLMqPJuUd23nOgtglGzNgi6XLXr3oAtQB7OIcz3sQPbW','131729386420','bm_support_manager','Shadhin Jonota','812239513','avatar.png',NULL,'mr-bm-support-manager-6176490','active',0,0,NULL,NULL,'2024-05-15 03:08:08','2024-05-15 03:08:08'),(7,NULL,'Mr division_admin','division_admin@gmail.com','$2y$10$QZ.GyhifR87JlpS.q1m/re/Cxn831aS8Sq1a.kToHg/sPRRCphbsG','240716422108','division_admin','Shadhin Jonota','812239513','avatar.png',NULL,'mr-division-admin-2377401','active',0,0,NULL,NULL,'2024-05-15 03:08:08','2024-05-15 03:08:08'),(8,7,'Mr division_support_admin','division_support_admin@gmail.com','$2y$10$uakDBcFL4HkTxPkr7W4XQ.IaBS1VIR0k9IMpKsBqxsl8vfs6SJMO6','220746099099','division_support_admin','Shadhin Jonota','812239513','avatar.png',NULL,'mr-division-support-admin-5978797','active',0,0,NULL,NULL,'2024-05-15 03:08:08','2024-05-15 03:08:08'),(9,NULL,'Mr division_without_audit','division_without_audit@gmail.com','$2y$10$IQbxFy1UpeLKIUrWye555OkKfIJOII5.y8fisfYs6MKD6LqsKq4He','646095171695','division_without_audit','Shadhin Jonota','812239513','avatar.png',NULL,'mr-division-without-audit-6509156','active',0,0,NULL,NULL,'2024-05-15 03:08:09','2024-05-15 03:08:09'),(10,NULL,'Mr branch','branch@gmail.com','$2y$10$lJK8dpnIeacgH6MTzBnJMuKSp2lhK4ymziwMPOae3q74DCMACDm4m','796642543507','branch','Shadhin Jonota','812239513','avatar.png',NULL,'mr-branch-76110644','active',0,0,NULL,NULL,'2024-05-15 03:08:09','2024-05-15 03:08:09'),(11,NULL,'Mr auditor','auditor@gmail.com','$2y$10$xBYZSnUryKmXoyUal3p4x.mCRy.K6nX.9SmvMfQB9kTeENw2XDdFK','883982792843','auditor','Shadhin Jonota','812239513','avatar.png',NULL,'mr-auditor-66411499','active',0,0,NULL,NULL,'2024-05-15 03:08:09','2024-05-15 03:08:09'),(12,NULL,'Mr division_employee','division_employee@gmail.com','$2y$10$qQViPbMk6EDsz0VdjZkm1.rRN0.mj2LQRfKgd/tg0Mfpm0VNH8DW2','555698577805','division_employee','Shadhin Jonota','812239513','avatar.png',NULL,'mr-division-employee-14712601','active',0,0,NULL,NULL,'2024-05-15 03:08:09','2024-05-15 03:08:09'),(13,NULL,'Mr well_wisher','well_wisher@gmail.com','$2y$10$3zzKK5xRcA.KPQq2SDeQfuxi7s.iwOYBaeza.dqD/8aYZrR7eWyR6','892633701124','well_wisher','Shadhin Jonota','812239513','avatar.png',NULL,'mr-well-wisher-99413497','active',0,0,NULL,NULL,'2024-05-15 03:08:09','2024-05-15 03:08:09'),(14,NULL,'Mr loan_recipient','loan_recipient@gmail.com','$2y$10$3LhFFFmtkfHu/jrRgwzy2elE2OY/rqH2vz4nmwATim5rn8pbbZZ6K','222441583535','loan_recipient','Shadhin Jonota','812239513','avatar.png',NULL,'mr-loan-recipient-81814790','active',0,0,NULL,NULL,'2024-05-15 03:08:09','2024-05-15 03:08:09'),(15,NULL,'দপ্তর','দপ্তর@gmail.com','$2y$10$XRyBHQGhHe7A9e/78eaXDukCUFo3rAwLw/T9scF9xcH/0PkLebaP.','334741615238','1001','Shadhin Jonota','812239513','avatar.png',NULL,'dptr-90015354','active',0,0,NULL,NULL,'2024-05-15 03:08:09','2024-05-15 03:08:09'),(16,NULL,'সাহিত্য','সাহিত্য@gmail.com','$2y$10$6B0RUYxyONEAIDHAlN3P2.oU0fdB2Wi8Kn8MoKW8CAlUJROdjBlBO','894327193028','1002','Shadhin Jonota','812239513','avatar.png',NULL,'sahitz-93716242','active',0,0,NULL,NULL,'2024-05-15 03:08:09','2024-05-15 03:08:09'),(17,NULL,'গবেষণা','গবেষণা@gmail.com','$2y$10$j78SBPwjOCbWj2mUORjk2up5OpqxpQVdDXwhl/8ZrgJv5hSfiUm8O','302417490480','1003','Shadhin Jonota','812239513','avatar.png',NULL,'gbeshna-39917102','active',0,0,NULL,NULL,'2024-05-15 03:08:09','2024-05-15 03:08:09'),(18,NULL,'প্রচার','প্রচার@gmail.com','$2y$10$nOYQIbExjTDdfc8wEf74veNx.i3D2Ls2.yf8tADNVM9v3oXA5ReDy','427969912544','1004','Shadhin Jonota','812239513','avatar.png',NULL,'prcar-47018139','active',0,0,NULL,NULL,'2024-05-15 03:08:09','2024-05-15 03:08:09'),(19,NULL,'তথ্য','তথ্য@gmail.com','$2y$10$rF8ygHP6p5XpNjBX6bmODOTbalipi53D1PPUsT9YhI2knI/wNXX7e','593069873468','1005','Shadhin Jonota','812239513','avatar.png',NULL,'tthz-64519576','active',0,0,NULL,NULL,'2024-05-15 03:08:09','2024-05-15 03:08:09'),(20,NULL,'প্রকাশনা','প্রকাশনা@gmail.com','$2y$10$I/YYsrLjwW.DkxPvwjeeHu5PZh0ygKO7XPHiqKnMomN0nq47OiJZO','370436936323','1006','Shadhin Jonota','812239513','avatar.png',NULL,'prkasna-96320767','active',0,0,NULL,NULL,'2024-05-15 03:08:09','2024-05-15 03:08:09');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `website_settings`
--

DROP TABLE IF EXISTS `website_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `website_settings` (
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
-- Dumping data for table `website_settings`
--

LOCK TABLES `website_settings` WRITE;
/*!40000 ALTER TABLE `website_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `website_settings` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-15 19:43:27
