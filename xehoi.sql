-- MySQL dump 10.13  Distrib 9.6.0, for macos14.8 (arm64)
--
-- Host: localhost    Database: xehoi
-- ------------------------------------------------------
-- Server version	9.6.0

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

DROP DATABASE IF EXISTS `xehoi`;
CREATE DATABASE IF NOT EXISTS `xehoi`;
USE `xehoi`;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` int DEFAULT NULL,
  `position` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (13,'Đại lý giảm giá Hyundai Stargazer gần 100 triệu đồngxxxxxx','dai-ly-giam-gia-hyundai-stargazer-gan-100-trieu-dongxxxxxx','uploads/article/1683793599_dai-ly-giam-gia-Hyundai-Stargazer-gan-100-trieu-dong-5-1683736627-805-width740height493.jpg','<p>Cung cấp sức mạnh cho Hyundai Stargazer l&agrave; động cơ xăng Smartstream G, dung t&iacute;ch 1.5L, tạo ra c&ocirc;ng suất tối đa 113 m&atilde; lực v&agrave; m&ocirc;-men xoắn cực đại đạt 144 Nm. Động cơ n&agrave;y được kết hợp với hộp số biến thi&ecirc;n v&ocirc; cấp iVT v&agrave; hệ dẫn động cầu trước.</p>','<h2><strong>Gi&aacute; xe Hyundai Stargazer bản ti&ecirc;u chuẩn sau giảm rẻ hơn Mitsubishi Xpander.</strong></h2>\r\n\r\n<p>Theo khảo s&aacute;t tại một số đại l&yacute; ở H&agrave; Nội, Hyundai Stargazer đang được ưu đ&atilde;i l&ecirc;n đến gần 100 triệu đồng. Gi&aacute; sau giảm của phi&ecirc;n bản ti&ecirc;u chuẩn chỉ c&ograve;n 480 triệu đồng. L&uacute;c mới ra mắt, mẫu xe n&agrave;y c&oacute; gi&aacute; khởi điểm từ 575 - 685 triệu đồng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Đại lý giảm giá Hyundai Stargazer gần 100 triệu đồng - 1\" src=\"https://cdn.24h.com.vn/upload/2-2023/images/2023-05-10/dai-ly-giam-gia-Hyundai-Stargazer-gan-100-trieu-dong-5-1683736627-805-width740height493.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Một đại l&yacute; kh&aacute;c &aacute;p dụng chương tr&igrave;nh giảm gi&aacute; cho cả 3 phi&ecirc;n bản ti&ecirc;u chuẩn, đặc biệt v&agrave; cao cấp của Hyundai Stargazer với mức giảm dao động từ 77 - 87 triệu đồng. Theo đ&oacute;, gi&aacute; xe sau ưu đ&atilde;i c&ograve;n từ 498 - 588 triệu đồng. Kh&aacute;ch h&agrave;ng mua xe trong th&aacute;ng 5 c&ograve;n được tặng th&ecirc;m nhiều phụ kiện v&agrave; bảo hiểm th&acirc;n vỏ trong một năm.</p>\r\n\r\n<p>Hyundai Stargazer l&agrave; mẫu xe hiếm hoi trong ph&acirc;n kh&uacute;c c&oacute; 2 t&ugrave;y chọn nội thất 7 ghế hoặc 6 ghế. Phi&ecirc;n bản 6 ghế cao cấp c&oacute; gi&aacute; nhỉnh hơn so với bản 7 ghế.</p>\r\n\r\n<p><img alt=\"Đại lý giảm giá Hyundai Stargazer gần 100 triệu đồng - 2\" src=\"https://cdn.24h.com.vn/upload/2-2023/images/2023-05-10/dai-ly-giam-gia-Hyundai-Stargazer-gan-100-trieu-dong-2-1683736627-617-width740height494.jpg\" /></p>\r\n\r\n<p>Stargazer được trang bị c&aacute;c tiện &iacute;ch cao cấp, hiện đại như: m&agrave;n h&igrave;nh cảm ứng trung t&acirc;m 10,25 inch t&iacute;ch hợp camera l&ugrave;i, kết nối Apple Carplay/ Android Auto kh&ocirc;ng d&acirc;y, khởi động m&aacute;y từ xa, sạc điện thoại kh&ocirc;ng d&acirc;y, hệ thống &acirc;m thanh Bose 8 loa với ampli rời, điều h&ograve;a tự động,&hellip;</p>',1,0,NULL,NULL,1,NULL,NULL,NULL,'2023-03-16 20:41:38','2023-05-11 01:57:49'),(14,'Mẫu xe hot nhất phân khúc B','mau-xe-hot-nhat-phan-khuc-b','uploads/article/1683793627_1-1683707780-961-width2048height1365.jpg','<p>f</p>','<p>f</p>',3,0,NULL,NULL,1,NULL,NULL,NULL,'2023-05-11 01:27:07','2023-05-11 01:28:38'),(15,'EV Rivian đặt cược tăng cao giá xe','ev-rivian-dat-cuoc-tang-cao-gia-xe','uploads/article/1683794052_1164-o-to.png','<h2>Elliot Johnson, gi&aacute;m đốc đầu tư của Evolve ETFs, quản l&yacute; hơn 4,5 tỷ đ&ocirc; la t&agrave;i sản, bao gồm c&aacute;c khoản đầu tư v&agrave;o c&aacute;c c&ocirc;ng ty khởi nghiệp EV như Rivian, cho biết: &ldquo;T&ocirc;i nghĩ họ thật đi&ecirc;n rồ nếu kh&ocirc;ng tăng gi&aacute;, đơn giản v&igrave; họ c&oacute; nhu cầu nhiều hơn nguồn cung&rdquo;. &quot;Bạn chắc chắn sẽ thấy gi&aacute; giảm xuống khi họ c&oacute; thể c&oacute; quy m&ocirc; kinh tế hơn v&agrave; khi c&oacute; nhiều cạnh tranh hơn. N&oacute; sẽ hơi giống Tesla&quot; - Johnson n&oacute;i th&ecirc;m.</h2>','<h2>Rivian Automotive Inc (RIVN.O) đang đặt cược rằng họ c&oacute; thể giữ gi&aacute; cao cho c&aacute;c d&ograve;ng xe b&aacute;n tải chạy điện v&agrave; xe thể thao đa dụng ngay cả khi cạnh tranh gia tăng.</h2>\r\n\r\n<p><img alt=\"EV Rivian đặt cược tăng cao giá xe trong bối cảnh cạnh tranh khốc liệt\" src=\"http://image.daidoanket.vn/w640/images/upload/trangle/05112023/1164-o-to.png\" /></p>\r\n\r\n<p>Gi&aacute;m đốc điều h&agrave;nh RJ Scaringe đứng b&ecirc;n ngo&agrave;i nh&agrave; m&aacute;y sản xuất xe điện của c&ocirc;ng ty khởi nghiệp Rivian Automotive ở Normal, Illinois, Hoa Kỳ ng&agrave;y 11 th&aacute;ng 4 năm 2022. Ảnh: Reuters.</p>\r\n\r\n<p>V&agrave; một số người coi đ&oacute; l&agrave; rủi ro, v&igrave; c&aacute;c sản phẩm của Rivian sẽ sớm phải đối mặt với nhiều đối thủ hơn v&agrave;o thời điểm m&agrave; c&ocirc;ng ty dẫn đầu thị trường Tesla Inc (TSLA.O) đang giảm gi&aacute; để th&uacute;c đẩy nhu cầu trước t&acirc;m l&yacute; ti&ecirc;u d&ugrave;ng đang suy yếu v&agrave; c&aacute;c nh&agrave; sản xuất &ocirc; t&ocirc; truyền thống đang thắt chặt cạnh tranh với c&aacute;c mẫu xe điện (EV) c&oacute; gi&aacute; thấp hơn.</p>\r\n\r\n<p>Rivian đ&atilde; xoa dịu t&acirc;m l&yacute; của c&aacute;c nh&agrave; đầu tư trong tuần n&agrave;y bằng c&aacute;ch b&aacute;m s&aacute;t mục ti&ecirc;u sản xuất năm 2023 v&agrave; b&aacute;o c&aacute;o doanh thu h&agrave;ng qu&yacute; tốt hơn mong đợi, tr&aacute;i ngược ho&agrave;n to&agrave;n với c&aacute;c c&ocirc;ng ty c&ugrave;ng ng&agrave;nh Lucid Group (LCID.O), Fisker Inc (FSR.N) v&agrave; Nikola Corp (NKLA.O).</p>\r\n\r\n<p>C&ocirc;ng ty khởi nghiệp c&oacute; trụ sở tại Irvine, California cho biết họ đang tập trung v&agrave;o việc tung ra c&aacute;c mẫu xe thể thao đa dụng (SUV) R1S v&agrave; xe b&aacute;n tải R1T c&oacute; gi&aacute; cao hơn để đ&aacute;p ứng nhu cầu của kh&aacute;ch h&agrave;ng trong thời gian tới, gi&uacute;p tăng mức gi&aacute; b&aacute;n trung b&igrave;nh (ASP). &quot;Ch&uacute;ng t&ocirc;i nhận thấy nhu cầu từ kh&aacute;ch h&agrave;ng đối với những g&igrave; ch&uacute;ng t&ocirc;i đang x&acirc;y dựng&quot; Gi&aacute;m đốc điều h&agrave;nh Rivian R.J. Scaringe n&oacute;i với Reuters h&ocirc;m thứ Tư.</p>\r\n\r\n<p>Rivian tự tin duy tr&igrave; mức gi&aacute; trước sự cạnh tranh ng&agrave;y c&agrave;ng tăng, &ocirc;ng n&oacute;i th&ecirc;m rằng pin cực lớn, hiệu suất tốt hơn v&agrave; c&aacute;c t&iacute;nh năng cao cấp sẽ tạo ra sự kh&aacute;c biệt của c&ocirc;ng ty với c&aacute;c đối thủ. &quot;Với dữ liệu m&agrave; ch&uacute;ng t&ocirc;i c&oacute; về h&agrave;nh vi của kh&aacute;ch h&agrave;ng, kết quả tổng hợp m&agrave; ch&uacute;ng t&ocirc;i thấy l&agrave; sự thay đổi li&ecirc;n tục đi l&ecirc;n của ASP&quot;, &ocirc;ng n&oacute;i. &quot;Ch&uacute;ng t&ocirc;i sẽ cung cấp một mẫu c&oacute; gi&aacute; thấp hơn, nhưng kh&ocirc;ng nhất thiết phải giảm gi&aacute; cho những thứ ch&uacute;ng t&ocirc;i đang cung cấp ng&agrave;y h&ocirc;m nay.&quot;</p>\r\n\r\n<p>Rivian kh&ocirc;ng tiết lộ gi&aacute; b&aacute;n trung b&igrave;nh của m&igrave;nh, nhưng R1T c&oacute; gi&aacute; khởi điểm 73.000 USD trong khi xe tải điện F150 Lightning của Ford Motor Co (F.N) c&oacute; gi&aacute; từ khoảng 60.000 USD. R1S c&oacute; gi&aacute; khởi điểm 78.000 USD, so với chỉ hơn 47.000 USD cho Model Y của Tesla v&agrave; khoảng 97.000 USD cho Model X, mẫu cao cấp hơn.</p>\r\n\r\n<p>&quot;Đ&acirc;y l&agrave; những sản phẩm h&agrave;ng đầu&quot;, Scaringe n&oacute;i về sản phẩm của Rivian. &quot;Đ&acirc;y l&agrave; những sản phẩm đang x&acirc;y dựng n&ecirc;n thương hiệu của ch&uacute;ng t&ocirc;i. Ch&uacute;ng t&ocirc;i kh&ocirc;ng nhằm mục đ&iacute;ch b&aacute;n h&agrave;ng trăm ngh&igrave;n chiếc&rdquo;. Rivian đặt mục ti&ecirc;u sản xuất 50.000 xe trong năm nay. Tuy nhi&ecirc;n, chiến lược định gi&aacute; cao cấp vẫn được coi l&agrave; rủi ro. Orwa Mohamad, nh&agrave; ph&acirc;n t&iacute;ch tại c&ocirc;ng ty nghi&ecirc;n cứu đầu tư Third Bridge, cho biết: &ldquo;Rivian cần cẩn thận để kh&ocirc;ng tăng gi&aacute; qu&aacute; nhiều trong khi c&aacute;c đối thủ l&acirc;u đời hơn đang nhanh ch&oacute;ng gi&agrave;nh được động lực tr&ecirc;n thị trường&rdquo;.</p>\r\n\r\n<p>Sau nhiều lần gặp kh&oacute; khăn trong sản xuất, Ford hiện đang mở c&aacute;c đơn đặt h&agrave;ng cho chiếc F-150 Lightning của m&igrave;nh khi họ c&oacute; kế hoạch mở rộng quy m&ocirc; sản xuất h&agrave;ng năm l&ecirc;n 150.000 chiếc v&agrave;o cuối năm nay, trong khi Tesla dự kiến ​​sẽ bắt đầu sản xuất h&agrave;ng loạt chiếc Cybertruck bị tr&igrave; ho&atilde;n nhiều v&agrave;o năm tới. Sẽ kh&oacute; đ&aacute;nh gi&aacute; bất kỳ t&aacute;c động tức thời n&agrave;o đối với nhu cầu của Rivian v&igrave; c&ocirc;ng ty, c&ugrave;ng với đối thủ Lucid, đ&atilde; ngừng tiết lộ c&aacute;c đơn đặt h&agrave;ng hiện tại trong một động th&aacute;i khiến c&aacute;c nh&agrave; ph&acirc;n t&iacute;ch lo ngại. Việc mở rộng kế hoạch định gi&aacute; v&agrave; tăng gấp đ&ocirc;i việc cắt giảm chi ph&iacute; được xem l&agrave; ch&igrave;a kh&oacute;a gi&uacute;p c&ocirc;ng ty đạt mục ti&ecirc;u lần đầu ti&ecirc;n đạt được lợi nhuận gộp v&agrave;o năm 2024.</p>\r\n\r\n<p>Elliot Johnson, gi&aacute;m đốc đầu tư của Evolve ETFs, quản l&yacute; hơn 4,5 tỷ đ&ocirc; la t&agrave;i sản, bao gồm c&aacute;c khoản đầu tư v&agrave;o c&aacute;c c&ocirc;ng ty khởi nghiệp EV như Rivian, cho biết: &ldquo;T&ocirc;i nghĩ họ thật đi&ecirc;n rồ nếu kh&ocirc;ng tăng gi&aacute;, đơn giản v&igrave; họ c&oacute; nhu cầu nhiều hơn nguồn cung&rdquo;. &quot;Bạn chắc chắn sẽ thấy gi&aacute; giảm xuống khi họ c&oacute; thể c&oacute; quy m&ocirc; kinh tế hơn v&agrave; khi c&oacute; nhiều cạnh tranh hơn. N&oacute; sẽ hơi giống Tesla&quot; - Johnson n&oacute;i th&ecirc;m.</p>\r\n\r\n<p>Scaringe cho biết, hiện tại, trọng t&acirc;m của Rivian l&agrave; tăng cường sản xuất v&agrave; giảm chi ph&iacute; mặc d&ugrave; c&ocirc;ng ty cho biết c&aacute;c vấn đề về chuỗi cung ứng, do đại dịch g&acirc;y ra, tiếp tục l&agrave; yếu tố hạn chế ch&iacute;nh.</p>',2,1,NULL,NULL,1,NULL,NULL,NULL,'2023-05-11 01:33:51','2023-05-11 01:34:57');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banners` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` int unsigned DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `type` int unsigned NOT NULL DEFAULT '0',
  `position` int unsigned NOT NULL DEFAULT '0',
  `is_active` int unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `banners_slug_unique` (`slug`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` VALUES (20,'Banner1','banner1','uploads/category/1683790367_oto-honda-ninhbinh-005-800x450-1.jpg','https://www.youtube.com/watch?v=Q5MC9AMycxs',1,NULL,1,0,1,'2022-10-23 09:01:58','2023-05-11 00:32:47'),(21,'Banner2','banner2','uploads/category/1683790374_01-banner-top-gia-xe-oto-honda.jpg',NULL,1,NULL,1,0,1,'2022-10-23 09:02:11','2023-05-11 00:32:54'),(22,'rewr','rewr','uploads/category/1683790382_Hondoto-banner-960x440-230316-Copy.jpg','https://www.ichiase.net/2022/05/up-anh.html',1,'<p>ewqewq</p>',1,0,1,'2023-03-16 21:36:33','2023-05-11 00:33:02');
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brands` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int unsigned NOT NULL DEFAULT '0',
  `is_active` int unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `brands_slug_unique` (`slug`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (4,'Xe cũ','xe-cu','uploads/category/1653209525_tải xuống (1).png',NULL,0,1,'2022-05-22 01:52:05','2023-05-11 00:46:09'),(5,'Xe mới','xe-moi','uploads/category/1653209552_tải xuống (2).png',NULL,0,1,'2022-05-22 01:52:32','2023-05-11 00:46:17');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_items`
--

DROP TABLE IF EXISTS `cart_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `price` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_items`
--

LOCK TABLES `cart_items` WRITE;
/*!40000 ALTER TABLE `cart_items` DISABLE KEYS */;
INSERT INTO `cart_items` VALUES (2,3,40,1,620000000,'2026-04-21 01:51:13','2026-04-21 01:51:13');
/*!40000 ALTER TABLE `cart_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int unsigned DEFAULT NULL,
  `position` int unsigned NOT NULL DEFAULT '0',
  `is_active` int unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `categories_slug_unique` (`slug`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (83,'Xe 4 - 5 chỗ','xe-4-5-cho',NULL,0,0,1,'2023-05-11 00:11:31','2023-05-11 00:22:41'),(85,'Xe 6 - 7 chỗ','xe-6-7-cho',NULL,0,1,1,'2023-05-11 00:15:02','2023-05-11 00:23:03'),(87,'Xe 9 chỗ','xe-9-cho',NULL,0,1,1,'2023-05-11 00:17:24','2023-05-11 00:23:12'),(88,'Xe cũ','xe-cu',NULL,0,1,1,'2023-05-11 00:17:57','2023-05-11 00:17:57'),(89,'Camry','camry',NULL,83,1,1,'2023-05-11 00:18:39','2023-05-11 00:18:59'),(90,'Vios','vios',NULL,83,1,1,'2023-05-11 00:20:29','2023-05-11 00:31:40'),(91,'KIA','kia',NULL,83,1,1,'2023-05-11 00:25:43','2023-05-11 00:31:32'),(92,'Innova G','innova-g',NULL,85,1,1,'2023-05-11 00:26:56','2023-05-11 00:26:56'),(93,'Fortuner','fortuner',NULL,85,1,1,'2023-05-11 00:27:21','2023-05-11 00:27:21'),(94,'Kia Sedona','kia-sedona',NULL,85,1,1,'2023-05-11 00:27:41','2023-05-11 00:27:41'),(95,'Starex','starex',NULL,85,1,1,'2023-05-11 00:28:23','2023-05-11 00:28:23'),(96,'Ford Everest','ford-everest',NULL,85,1,1,'2023-05-11 00:28:59','2023-05-11 00:28:59'),(97,'Toyota Granvia','toyota-granvia',NULL,87,1,1,'2023-05-11 00:29:36','2023-05-11 00:29:36'),(98,'Hyundai Starex','hyundai-starex',NULL,87,1,1,'2023-05-11 00:29:53','2023-05-11 00:29:53'),(99,'Toyota Innova','toyota-innova',NULL,87,1,1,'2023-05-11 00:30:08','2023-05-11 00:30:08'),(100,'Toyota','toyota',NULL,88,1,1,'2023-05-11 00:30:38','2023-05-11 00:30:38'),(101,'Vifast','vifast',NULL,83,1,1,'2023-05-11 00:31:05','2023-05-11 00:31:23');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupons` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int DEFAULT NULL,
  `value` int DEFAULT NULL,
  `percent` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
INSERT INTO `coupons` VALUES (1,'SHOP-KM1',1,50000,NULL,'2020-05-19 16:50:32','2020-05-19 16:50:32'),(2,'SHOP-K2',2,NULL,50,'2020-05-19 16:52:27','2020-05-19 16:52:27');
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (7,'2014_10_12_000000_create_users_table',1),(8,'2014_10_12_100000_create_password_resets_table',1),(9,'2020_01_07_122649_create_categories_table',1),(10,'2020_01_09_113851_create_products_table',1),(11,'2020_02_06_031728_create_banners_table',2),(12,'2020_02_06_032831_create_banners_table',3),(13,'2020_02_06_125433_create_vendors_table',4),(14,'2020_02_06_125734_create_brands_table',5),(15,'2020_03_04_083632_create_products_table',6),(17,'2020_03_05_122445_create_contacts_table',7),(18,'2026_04_20_151509_create_carts_table',8),(19,'2026_04_20_152249_create_cart_items_table',9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `price` int NOT NULL,
  `qty` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail`
--

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
INSERT INTO `order_detail` VALUES (17,'GRAFFITI T-SHITR/WHITE','uploads/product/1653209439_white-t-shirt-mockup-png_72953.jpg','VGC83-1',3,22,25,300000,3),(18,'ao sweat','uploads/product/1653319319_dickies-multi-color-t-shirts-3-pak_621091dgm4xl1_1.jpg','VGC84-1',3,23,31,1800000,2),(19,'GRAFFITI T-SHITR/WHITE','uploads/product/1653209439_white-t-shirt-mockup-png_72953.jpg','VGC83-1',3,24,25,200000,2),(20,'Quan dui','uploads/product/1655376986_11.jpg','quandui',3,25,32,490000,1),(21,'Giường cao cấp','uploads/product/1679027659_hinh-anh-thuc-te-ghe-sofa-phong-khach-1.jpg','giuong',3,26,39,87000000,3),(22,'LEXUS RX 300 2022','uploads/product/1683792316_download (5).jpg','s',3,27,41,410000000,1),(23,'Toyota Hiace','uploads/product/1683793259_download (12).jpg',NULL,3,28,47,780000000,1),(24,'TOYOTA VIOS 2023','uploads/product/1683790703_download.jpg','VIOS',3,29,39,800000000,1),(25,'TOYOTA VIOS 2023','uploads/product/1683791340_download (2).jpg','vios',3,30,40,620000000,1),(26,'LEXUS RX 300 2022','uploads/product/1683792316_download (5).jpg','s',3,31,41,410000000,1),(27,'LEXUS RX 300 2022','uploads/product/1683792316_download (5).jpg','s',3,32,41,410000000,1),(28,'TOYOTA VIOS 2023','uploads/product/1683791340_download (2).jpg','vios',3,33,40,620000000,1),(29,'LEXUS RX 300 2022','uploads/product/1683792316_download (5).jpg','s',3,34,41,410000000,1),(30,'LEXUS RX 300 2022','uploads/product/1683792316_download (5).jpg','s',3,35,41,410000000,1),(31,'MERCEDES-BENZ GLB 2023','uploads/product/1683792036_download (4).jpg','ghe',3,36,36,900000,1);
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_status`
--

LOCK TABLES `order_status` WRITE;
/*!40000 ALTER TABLE `order_status` DISABLE KEYS */;
INSERT INTO `order_status` VALUES (1,'Mới'),(2,'Đang Xử Lý'),(3,'Hoàn Thành'),(4,'Hủy');
/*!40000 ALTER TABLE `order_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int DEFAULT '0',
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `coupon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `total` int DEFAULT '0',
  `user_id` int DEFAULT '0',
  `order_status_id` int DEFAULT '0',
  `payment_id` int DEFAULT '0',
  `payment_vnpay` bigint DEFAULT NULL,
  `payment_vnpay_status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (22,'DH-22052022-1653211312','Nguyen A','khanh@gmail.com','VietNam','VietNam','23456854',0,'Ship nhanh a',NULL,300000,0,3,0,NULL,0,'2022-05-22 02:21:52','2022-05-22 02:22:15'),(23,'DH-23052022-1653319380','nguyen van a','a@gmail.com','Viet nam',NULL,'09897784',0,'ok nhe',NULL,1800000,4,3,0,NULL,0,'2022-05-23 08:23:00','2022-05-23 08:23:26'),(24,'DH-25052022-1653456590','nguyen b','bongbong@gmail.com','kjkjk',NULL,'0987898789',0,'hhjkj',NULL,200000,0,3,0,NULL,0,'2022-05-24 22:29:50','2022-05-24 22:30:52'),(25,'DH-16062022-1655377113','nguyen van a','dsadas@gmail.com','dsadasd',NULL,'098765657',0,'đâsdsa',NULL,490000,0,3,0,NULL,0,'2022-06-16 03:58:33','2022-06-16 03:59:05'),(26,'DH-17032023-1679027866','nguyen','admin@gmail.com','DaNang',NULL,'0987898765',0,'wwwqw',NULL,87000000,3,3,0,NULL,0,'2023-03-16 21:37:46','2023-03-16 21:38:10'),(27,'DH-11052023-1683795186','demo mua hang','demo@gmail.com','hcm vn q9',NULL,'09876787644',0,'giao hang gap',NULL,410000000,0,4,0,NULL,0,'2023-05-11 01:53:06','2023-05-11 01:55:03'),(28,'DH-11052023-1683795230','demo mua hang','demo@gmail.com','hcm vn',NULL,'09876787644',0,'tu van',NULL,780000000,0,3,0,NULL,0,'2023-05-11 01:53:50','2023-05-11 01:54:42'),(33,'DH-11122024-1733905984','nguyễn tiến chiến','chien@gmail.com','hà nội',NULL,'0386987160',0,'test vnpay',NULL,620000000,0,1,0,62000000,2,'2024-12-11 01:33:04','2024-12-11 01:33:40'),(34,'DH-21042026-1776766227','Đài Đỗ Anh','doanhdaigr5.2004@gmail.com','3/2 quan 10',NULL,'12345678',0,NULL,NULL,410000000,8,2,0,41000000,1,'2026-04-21 03:10:27','2026-04-21 03:40:24'),(35,'DH-21042026-1776767914','Đài Đỗ Anh','doanhdaigr5.2004@gmail.com','3/2 quan 10',NULL,'12345678',0,NULL,NULL,410000000,8,1,0,41000000,1,'2026-04-21 03:38:34','2026-04-21 03:38:34'),(36,'DH-21042026-1776770060','Đài Đỗ Anh','doanhdaigr5.2004@gmail.com','3/2 quan 10',NULL,'0325459901',0,NULL,NULL,900000,8,2,0,90000,1,'2026-04-21 04:14:20','2026-04-21 04:15:32');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int NOT NULL,
  `position` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `price` int NOT NULL DEFAULT '0',
  `sale` int NOT NULL DEFAULT '0',
  `position` int NOT NULL DEFAULT '0',
  `is_active` int NOT NULL DEFAULT '1',
  `is_hot` int NOT NULL DEFAULT '0',
  `views` int NOT NULL DEFAULT '0',
  `category_id` int NOT NULL DEFAULT '0',
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `memory` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` int NOT NULL DEFAULT '0',
  `vendor_id` int NOT NULL DEFAULT '0',
  `summary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_id` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `products_slug_index` (`slug`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (36,'MERCEDES-BENZ GLB 2023','mercedes-benz-glb-2023','uploads/product/1683792036_download (4).jpg',20,1000000,900000,0,1,0,0,83,NULL,'ghe',NULL,NULL,4,15,'<p>&nbsp;</p>\r\n\r\n<p>- Miễn ph&iacute; vận chuyển nội th&agrave;nh tphcm</p>\r\n\r\n<p>Li&ecirc;n hệ (028) 62 945 688 để biết th&ecirc;m chi tiết.</p>','<p>ffffffffffffffffff</p>',NULL,NULL,3,'2023-03-16 20:13:36','2026-04-21 04:14:20'),(37,'MERCEDES-BENZ C CLASS 2023','mercedes-benz-c-class-2023','uploads/product/1683791806_download (3).jpg',2,1400000000,1200000000,0,1,0,0,83,NULL,'d',NULL,NULL,5,14,'<p>a</p>','<p>dsa</p>',NULL,NULL,3,'2023-03-16 20:15:50','2023-05-11 00:56:46'),(38,'FORD RANGER 2023','ford-ranger-2023','uploads/product/1683791733_images (1).jpg',7,890000000,830000000,1,1,0,0,91,NULL,'x',NULL,NULL,5,15,'<p>ban</p>','<p>ban</p>','x','x',3,'2023-03-16 20:16:34','2023-05-11 00:55:33'),(39,'TOYOTA VIOS 2023','toyota-vios-2023','uploads/product/1683790703_download.jpg',22,900000000,800000000,1,1,0,0,90,NULL,'VIOS',NULL,NULL,4,15,'<p><em><strong>Toyota Vios 2023</strong></em>&nbsp;&ocirc;ng vua ph&acirc;n kh&uacute;c hạng B, mẫu xe b&aacute;n chạy nhất của Toyota tại Việt Nam được b&aacute;n ra với 4 phi&ecirc;n bản bao gồm<strong><em>&nbsp;Vios 1.5E MT, Vios 1.5E CVT, Vios 1.5G CVT v&agrave; Vios 1.5 GR-S (Sport)</em></strong>&nbsp;đều được trang bị đầy đủ những t&iacute;nh năng tiện nghi, t&iacute;nh năng an to&agrave;n cao cấp nhất của Toyota trong đ&oacute;&nbsp;<strong>Vios GR-S</strong>&nbsp;l&agrave; phi&ecirc;n&nbsp;<strong>bản thể thao</strong>&nbsp;ho&agrave;n to&agrave;n mới lần đầu ra mắt tại Việt Nam. H&atilde;y c&ugrave;ng&nbsp;<strong>Thế Giới Xe &Ocirc; T&ocirc;</strong>&nbsp;t&igrave;m hiểu chi tiết về<em>&nbsp;c&aacute;c phi&ecirc;n bản Vios 2023, gi&aacute; xe Vios 2023, gi&aacute; xe Vios lăn b&aacute;nh, thủ tục mua xe trả g&oacute;p, h&igrave;nh ảnh thực tế, đ&aacute;nh gi&aacute; xe Vios 2023 v&agrave; th&ocirc;ng số kỹ thuật Vios 2023</em>&nbsp;mới nhất được c&ocirc;ng bố ch&iacute;nh thức bởi Toyota Việt Nam.</p>','<p>&nbsp;</p>\r\n\r\n<p><em><strong>oyota Vios 2023</strong></em>&nbsp;&ocirc;ng vua ph&acirc;n kh&uacute;c hạng B, mẫu xe b&aacute;n chạy nhất của Toyota tại Việt Nam được b&aacute;n ra với 4 phi&ecirc;n bản bao gồm<strong><em>&nbsp;Vios 1.5E MT, Vios 1.5E CVT, Vios 1.5G CVT v&agrave; Vios 1.5 GR-S (Sport)</em></strong>&nbsp;đều được trang bị đầy đủ những t&iacute;nh năng tiện nghi, t&iacute;nh năng an to&agrave;n cao cấp nhất của Toyota trong đ&oacute;&nbsp;<strong>Vios GR-S</strong>&nbsp;l&agrave; phi&ecirc;n&nbsp;<strong>bản thể thao</strong>&nbsp;ho&agrave;n to&agrave;n mới lần đầu ra mắt tại Việt Nam. H&atilde;y c&ugrave;ng&nbsp;<strong>Thế Giới Xe &Ocirc; T&ocirc;</strong>&nbsp;t&igrave;m hiểu chi tiết về<em>&nbsp;c&aacute;c phi&ecirc;n bản Vios 2023, gi&aacute; xe Vios 2023, gi&aacute; xe Vios lăn b&aacute;nh, thủ tục mua xe trả g&oacute;p, h&igrave;nh ảnh thực tế, đ&aacute;nh gi&aacute; xe Vios 2023 v&agrave; th&ocirc;ng số kỹ thuật Vios 2023</em>&nbsp;mới nhất được c&ocirc;ng bố ch&iacute;nh thức bởi Toyota Việt Nam.</p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>MENU XEM NHANH</strong></p>\r\n\r\n			<ol>\r\n				<li><a href=\"https://thegioixeoto.vn/toyota-vios#Gi%C3%A1%20xe%20Vios\">Gi&aacute; xe Vios 2023</a></li>\r\n				<li><a href=\"https://thegioixeoto.vn/toyota-vios#Gi%C3%A1%20l%C4%83n%20b%C3%A1nh%20Vios\">Gi&aacute; xe Vios 2023&nbsp;lăn b&aacute;nh</a></li>\r\n				<li><a href=\"https://thegioixeoto.vn/toyota-vios#Mua%20xe%20Vios%20tr%E1%BA%A3%20g%C3%B3p\">Mua xe Vios 2023 trả g&oacute;p</a></li>\r\n				<li><a href=\"https://thegioixeoto.vn/toyota-vios#M%C3%A0u%20xe%20Vios\">M&agrave;u xe&nbsp;Vios 2023</a></li>\r\n				<li><a href=\"https://thegioixeoto.vn/toyota-vios#%C4%90%C3%A1nh%20gi%C3%A1%20xe%20Toyota%20Vios\">Đ&aacute;nh gi&aacute; xe&nbsp;Vios 2023</a></li>\r\n				<li><a href=\"https://thegioixeoto.vn/toyota-vios#Mua%20xe%20Toyota%20Vios\">Mua xe&nbsp;Vios 2023</a></li>\r\n			</ol>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><img alt=\"giá xe Toyota Vios 2023\" src=\"https://bizweb.dktcdn.net/100/058/631/files/toyota-vios-gr-s-2021-3-thegioixeoto-5e08ce40-d8db-40c4-8022-deccb93da2e8.jpg?v=1614057439589\" style=\"height:auto\" /></p>\r\n\r\n<p><em>Toyota Vios 2023 ho&agrave;n to&agrave;n mới ch&iacute;nh thức ra mắt tại Việt Nam với 4 phi&ecirc;n bản</em></p>\r\n\r\n<ul>\r\n	<li>\r\n	<h2><a id=\"Giá xe Vios\" name=\"Giá xe Vios\"><strong>Gi&aacute; xe Toyota Vios 2023</strong></a></h2>\r\n	</li>\r\n</ul>\r\n\r\n<p><em><strong>Gi&aacute; xe Toyota Vios 2023</strong></em>&nbsp;c&aacute;c phi&ecirc;n bản chi tiết mới nhất được c&ocirc;ng bố ch&iacute;nh thức bởi Toyota Việt Nam với 4 phi&ecirc;n bản gồm&nbsp;<strong>Vios E MT, Vios E CVT, Vios G CVT v&agrave;&nbsp;Vios GR-S (Bản Sport)&nbsp;CVT</strong>. Xem chi tiết c&aacute;c d&ograve;ng xe v&agrave;&nbsp;<strong>gi&aacute; xe Vios 2023</strong>&nbsp;mới nhất.</p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:center\"><strong>STT</strong></td>\r\n			<td><strong>Toyota Vios 2023</strong></td>\r\n			<td style=\"text-align:center\"><strong>Động cơ</strong></td>\r\n			<td style=\"text-align:center\"><strong>Hộp số</strong></td>\r\n			<td style=\"text-align:center\"><strong>Số t&uacute;i kh&iacute;</strong></td>\r\n			<td style=\"text-align:center\"><strong>Gi&aacute; xe&nbsp;</strong><em>(Vnđ)</em></td>\r\n			<td style=\"text-align:center\"><strong>Xuất sứ</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">1</td>\r\n			<td>Vios 1.5E MT</td>\r\n			<td colspan=\"1\" rowspan=\"4\" style=\"text-align:center\">\r\n			<p>Xăng 1.5L Dual VVt-i</p>\r\n			</td>\r\n			<td colspan=\"1\" rowspan=\"1\" style=\"text-align:center\">5MT</td>\r\n			<td style=\"text-align:center\">3</td>\r\n			<td style=\"text-align:center\"><strong>489 triệu</strong></td>\r\n			<td colspan=\"1\" rowspan=\"4\" style=\"text-align:center\">Lắp r&aacute;p</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">2</td>\r\n			<td>Vios 1.5E CVT</td>\r\n			<td colspan=\"1\" rowspan=\"3\" style=\"text-align:center\">CVT</td>\r\n			<td style=\"text-align:center\">3</td>\r\n			<td style=\"text-align:center\"><strong>542 triệu</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">3</td>\r\n			<td>Vios 1.5G CVT</td>\r\n			<td style=\"text-align:center\">7</td>\r\n			<td style=\"text-align:center\"><strong>592 triệu</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">4</td>\r\n			<td>Vios 1.5GR-S CVT</td>\r\n			<td style=\"text-align:center\">7</td>\r\n			<td style=\"text-align:center\"><strong>641 triệu</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><em>(*) Gi&aacute; xe Toyota Vios 2023 đ&atilde; c&oacute; thuế VAT v&agrave; thuế ti&ecirc;u thụ đặc biệt, chưa trừ khuyến m&atilde;i mua xe.</em></p>\r\n\r\n<ul>\r\n	<li>\r\n	<h2><a id=\"Giá lăn bánh Vios\" name=\"Giá lăn bánh Vios\"><strong>Gi&aacute; xe Toyota Vios 2023 lăn b&aacute;nh</strong></a></h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>Kh&aacute;ch h&agrave;ng&nbsp;<strong>mua xe Vios 2023</strong>&nbsp;quan t&acirc;m đến gi&aacute; xe v&agrave;&nbsp;<strong>gi&aacute; xe Vios 2023 lăn b&aacute;nh</strong>&nbsp;tại H&agrave; Nội, S&agrave;i G&ograve;n v&agrave; c&aacute;c tỉnh xin tham khảo bảng c&aacute;c chi ph&iacute; lăn b&aacute;nh dưới đ&acirc;y.</p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"5\">\r\n			<h3><strong>Bảng c&aacute;c chi ph&iacute; t&iacute;nh gi&aacute; xe Toyota&nbsp;Vios 2023 lăn b&aacute;nh tại H&agrave; Nội, S&agrave;i G&ograve;n v&agrave; c&aacute;c tỉnh mới nhất</strong></h3>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">C&aacute;c chi ph&iacute;</td>\r\n			<td style=\"text-align:center\">H&agrave; Nội, Quảng Ninh, Hải Ph&ograve;ng, L&agrave;o Cai, Cao Bằng, Lạng Sơn, Cần Thơ, Sơn La</td>\r\n			<td style=\"text-align:center\">H&agrave; Tĩnh</td>\r\n			<td style=\"text-align:center\">C&aacute;c tỉnh th&agrave;nh phố kh&aacute;c</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"1\">Thuế trước bạ xe Vios</td>\r\n			<td style=\"text-align:center\">12%</td>\r\n			<td style=\"text-align:center\">11%</td>\r\n			<td style=\"text-align:center\">10%</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"2\">Ph&iacute; cấp biển số</td>\r\n			<td style=\"text-align:center\">H&agrave; Nội v&agrave; S&agrave;i G&ograve;n</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">C&aacute;c tỉnh th&agrave;nh phố kh&aacute;c</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">20 triệu</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">2 triệu</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Ph&iacute; đăng kiểm</td>\r\n			<td colspan=\"3\" style=\"text-align:center\">340K</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"2\">Ph&iacute; bảo tr&igrave; đường bộ</td>\r\n			<td colspan=\"3\" style=\"text-align:center\">Xe đăng k&yacute; t&ecirc;n c&aacute; nh&acirc;n: 130K/th&aacute;ng</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"text-align:center\">Xe đăng k&yacute; t&ecirc;n doanh nghiệp: 180K/th&aacute;ng</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"1\">Bảo hiểm d&acirc;n sự bắt buộc</td>\r\n			<td colspan=\"3\" style=\"text-align:center\">Xe &ocirc; t&ocirc; con dưới 7 chỗ: 480K/Năm</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Bảo hiểm th&acirc;n vỏ xe</td>\r\n			<td colspan=\"3\" style=\"text-align:center\">Gi&aacute; trị xe x 1,6%/Năm</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Ph&iacute; &eacute;p biển m&ecirc; ca chống nước</td>\r\n			<td colspan=\"3\" style=\"text-align:center\">500K</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"2\">Ph&iacute; dịch vụ đăng k&yacute;</td>\r\n			<td style=\"text-align:center\">H&agrave; Nội v&agrave; S&agrave;i G&ograve;n</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">C&aacute;c tỉnh th&agrave;nh phố kh&aacute;c</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">3 triệu</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">5 triệu</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3><strong>Quy tr&igrave;nh đăng k&yacute; lăn b&aacute;nh xe&nbsp;Vios 2023</strong></h3>\r\n\r\n<ol>\r\n	<li><strong>Nộp lệ ph&iacute; trước bạ cho xe Vios&nbsp;2023:</strong>&nbsp;Mức ph&iacute; trước bạ sẽ theo biểu thuế của Tổng cục thuế quyết định c&ograve;n mức nộp thuế sẽ theo địa phương quyết định. Tại khu vực 1 mức thuế trước bạ sẽ l&agrave; 12%, khu vực 2 mức thuế trước bạ sẽ l&agrave; 10%.</li>\r\n	<li><strong>Đăng k&yacute; cấp biển số xe Vios:</strong>&nbsp;Mức ph&iacute; cấp biển số xe đăng k&yacute; mới tại khu vực 1 l&agrave; 20 triệu, tại khu vực 2 t&ugrave;y thuộc v&agrave;o hộ khẩu thuộc n&ocirc;ng th&ocirc;n, thị trấn sẽ giao động từ 200K đến 500K, tại th&agrave;nh phố sẽ l&agrave; 1 triệu - 2 triệu.</li>\r\n	<li><strong>Đăng kiểm v&agrave; nộp phi lưu h&agrave;nh đường bộ xe Vios:</strong>&nbsp;Ph&iacute; đăng kiểm&nbsp;340K, ph&iacute; lưu h&agrave;nh đường bộ th&igrave; c&ograve;n t&ugrave;y v&agrave;o việc xe đăng k&yacute; t&ecirc;n doanh nghiệp sẽ c&oacute; mức ph&iacute; l&agrave; 180k/Th&aacute;ng v&agrave; đăng k&yacute; t&ecirc;n c&aacute; nh&acirc;n sẽ l&agrave; 130K/Th&aacute;ng.</li>\r\n</ol>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"9\">\r\n			<h3><strong>Gi&aacute; xeToyota Vios 2023&nbsp;lăn b&aacute;nh tại H&agrave; Nội, S&agrave;i G&ograve;n v&agrave; Tỉnh</strong></h3>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"2\">STT</td>\r\n			<td colspan=\"2\" rowspan=\"2\">Khu vực t&iacute;nh thuế</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">H&agrave; Nội</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">S&agrave;i G&ograve;n</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">Tỉnh Kh&aacute;c</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"1\" style=\"text-align:center\">Thuế TB&nbsp;12%</td>\r\n			<td colspan=\"2\" rowspan=\"1\" style=\"text-align:center\">Thuế TB&nbsp;10%</td>\r\n			<td colspan=\"2\" rowspan=\"1\" style=\"text-align:center\">Thuế TB&nbsp;10%</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"2\">1</td>\r\n			<td rowspan=\"2\">Vios 1.5E MT</td>\r\n			<td>Gi&aacute; xe</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">489 ₫</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">489 ₫</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">489 ₫</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Gi&aacute; lăn b&aacute;nh</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">577 ₫</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">567 ₫</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">551 ₫</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"2\">2</td>\r\n			<td rowspan=\"2\">Vios 1.5E CVT</td>\r\n			<td>Gi&aacute; xe</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">542 ₫</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">542 ₫</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">542 ₫</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Gi&aacute; lăn b&aacute;nh</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">637 ₫</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">626 ₫</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">610 ₫</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"2\">3</td>\r\n			<td rowspan=\"2\">Vios 1.5G CVT</td>\r\n			<td>Gi&aacute; xe</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">592 ₫</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">592 ₫</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">592 ₫</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Gi&aacute; lăn b&aacute;nh</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">694 ₫</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">682 ₫</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">666 ₫</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"2\">4</td>\r\n			<td rowspan=\"2\">Vios GR-S</td>\r\n			<td>Gi&aacute; xe</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">641 ₫</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">641 ₫</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">641 ₫</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Gi&aacute; lăn b&aacute;nh</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">744 ₫</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">731 ₫</td>\r\n			<td colspan=\"2\" style=\"text-align:center\">714 ₫</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><em>(*) Gi&aacute; xe Toyota Vios 2023 lăn b&aacute;nh đ&atilde; bao gồm c&aacute;c khoản thuế ph&iacute;,&nbsp;thuế ti&ecirc;u thụ đặc biệt v&agrave; c&aacute;c chi ph&iacute; lăn b&aacute;nh xe.</em></p>\r\n\r\n<ul>\r\n	<li>\r\n	<h2><a id=\"Mua xe Vios trả góp\" name=\"Mua xe Vios trả góp\"><strong>Mua xe Toyota Vios 2023 trả g&oacute;p</strong></a></h2>\r\n	</li>\r\n</ul>\r\n\r\n<h3><strong>Quy tr&igrave;nh mua xe Vios 2023&nbsp;trả g&oacute;p</strong></h3>\r\n\r\n<ol>\r\n	<li>\r\n	<p>K&yacute; hợp đồng&nbsp;<strong>mua xe Vios 2023 trả g&oacute;p</strong>&nbsp;tại đại l&yacute;, trong hợp đồng thể hiện r&otilde; c&aacute;c điều khoản li&ecirc;n quan đến vấn đề vay vốn&nbsp;mua xe &ocirc; t&ocirc; trả g&oacute;p.</p>\r\n	</li>\r\n	<li>Tập hợp hồ sơ như danh mục đ&atilde; k&ecirc; b&ecirc;n tr&ecirc;n + hợp đồng mua b&aacute;n xe + phiếu đặt cọc hợp đồng + Đề nghị vay vốn gửi cho Ng&acirc;n h&agrave;ng.</li>\r\n	<li>Thanh to&aacute;n số tiền vay vốn th&ocirc;ng qua c&aacute;c h&igrave;nh thức đ&uacute;ng như thỏa thuận giữa người mua v&agrave; đại l&yacute;. Sau đ&oacute; người mua sẽ d&ugrave;ng hồ sơ vay vốn đăng k&yacute; sở hữu xe theo t&ecirc;n m&igrave;nh v&agrave;&nbsp;thời gian thực hiện khoảng trong 01 ng&agrave;y. L&uacute;c n&agrave;y chiếc xe đ&atilde; đứng t&ecirc;n kh&aacute;ch h&agrave;ng (mặc d&ugrave; mới chỉ nộp 20-30%).</li>\r\n	<li>Đến ng&acirc;n h&agrave;ng để b&agrave;n giao giấy đăng k&yacute; xe hoặc giấy hẹn lấy đăng k&yacute; xe, k&yacute; hợp đồng giải ng&acirc;n. Sau khoảng 3 tiếng sau tới đại l&yacute; để nhận xe&nbsp;của qu&yacute; kh&aacute;ch.</li>\r\n</ol>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"3\">\r\n			<h3><strong>Thủ tục hồ sơ mua xe Toyota Vios 2023 trả g&oacute;p tại H&agrave; Nội, S&agrave;i G&ograve;n v&agrave; tỉnh</strong></h3>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Hồ sơ vay vốn</p>\r\n			</td>\r\n			<td>C&aacute; nh&acirc;n mua xe</td>\r\n			<td>C&ocirc;ng ty mua xe</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"4\">Hồ sơ ph&aacute;p l&yacute; (bắt buộc)</td>\r\n			<td>&ndash; Chứng minh nh&acirc;n d&acirc;n/ hộ chiếu</td>\r\n			<td>&ndash; Giấy ph&eacute;p th&agrave;nh lập</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&ndash; Sổ hộ khẩu</td>\r\n			<td>&ndash; Giấy ph&eacute;p ĐKKD</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"2\">&ndash; Giấy đăng k&yacute; kết h&ocirc;n (nếu đ&atilde; lập gia đ&igrave;nh) hoặc Giấy x&aacute;c nhận độc th&acirc;n (nếu chưa lập gia đ&igrave;nh)</td>\r\n			<td>&ndash; Bi&ecirc;n bản họp Hội Đồng th&agrave;nh vi&ecirc;n (nếu l&agrave; CTY TNHH)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&ndash; Điều lệ của C&ocirc;ng ty (TNHH, Cty li&ecirc;n doanh)</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"3\">Chứng minh nguồn thu nhập</td>\r\n			<td>&ndash; Nếu thu nhập từ lương cần c&oacute; : Hợp đồng lao động, sao k&ecirc; 3 th&aacute;ng lương hoặc x&aacute;c nhận 3 th&aacute;ng lương gần nhất.</td>\r\n			<td>&ndash; B&aacute;o c&aacute;o thuế hoặc b&aacute;o c&aacute;o t&agrave;i ch&iacute;nh của 3 th&aacute;ng gần nhất</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&ndash; Nếu kh&aacute;ch h&agrave;ng c&oacute; c&ocirc;ng ty ri&ecirc;ng : chứng minh t&agrave;i ch&iacute;nh giống như c&ocirc;ng ty đứng t&ecirc;n.</td>\r\n			<td rowspan=\"2\">&ndash; Một số hợp đồng kinh tế, h&oacute;a đơn đầu v&agrave;o, đầu ra ti&ecirc;u biểu trong 3 th&aacute;ng gần nhất.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&ndash; Nếu kh&aacute;ch h&agrave;ng l&agrave;m việc tư do hoặc c&oacute; những nguồn thu nhập kh&ocirc;ng thể chứng minh được, vui l&ograve;ng li&ecirc;n hệ.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<ul>\r\n	<li>\r\n	<h2><a id=\"Màu xe Vios\" name=\"Màu xe Vios\"><strong>M&agrave;u xe Toyota Vios 2023</strong></a></h2>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>M&agrave;u xe Toyota Vios 2023</strong>&nbsp;được trang bị tới 7&nbsp;m&agrave;u sắc cho kh&aacute;ch h&agrave;ng lựa chọn bao gồm:&nbsp;<em>M&agrave;u đen (218), m&agrave;u bạc (1D4), m&agrave;u n&acirc;u v&agrave;ng (4R0),&nbsp;m&agrave;u đỏ (3R3), m&agrave;u trắng (040), m&agrave;u trắng ngọc trai (089), m&agrave;u v&agrave;ng (576).&nbsp;</em>Trong đ&oacute;&nbsp;<strong>m&agrave;u xe&nbsp;Vios GR-S&nbsp;</strong>chỉ c&oacute; 3 m&agrave;u<em>&nbsp;l&agrave; m&agrave;u đỏ (3R3), trắng ngọc trai (089) v&agrave; m&agrave;u đen (218)</em>. Kh&aacute;ch h&agrave;ng c&oacute; thể lựa chọn m&agrave;u t&ugrave;y &yacute; theo phong thủy bản mệnh ph&ugrave; hợp với bản th&acirc;n.</p>\r\n\r\n<h3><strong>M&agrave;u xe Vios 2023 theo c&aacute;c model</strong></h3>\r\n\r\n<ul>\r\n	<li>Vios 1.5G CVT bao gồm c&aacute;c m&agrave;u:&nbsp;<em>M&agrave;u đen (218), m&agrave;u bạc (1D4), m&agrave;u n&acirc;u v&agrave;ng (4R0),&nbsp;m&agrave;u đỏ (3R3), m&agrave;u trắng (040), m&agrave;u trắng ngọc trai (089)</em></li>\r\n	<li>Vios 1.5E CVT v&agrave; Vios 1.5E MT bao gồm c&aacute;c m&agrave;u:&nbsp;<em>M&agrave;u đen (218), m&agrave;u bạc (1D4), m&agrave;u n&acirc;u v&agrave;ng (4R0),&nbsp;m&agrave;u đỏ (3R3), m&agrave;u trắng (040), m&agrave;u trắng ngọc trai (089),&nbsp;m&agrave;u v&agrave;ng (576)</em></li>\r\n	<li>Vios 1.5 GR-S (Bản thể thao) bao gồm c&aacute;c m&agrave;u:<em>&nbsp;M&agrave;u đen (218),&nbsp;m&agrave;u đỏ (3R3), m&agrave;u trắng ngọc trai (089)</em></li>\r\n</ul>\r\n\r\n<table align=\"center\" cellspacing=\"0\" style=\"border-collapse:collapse\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:center\"><img alt=\"Vios màu đen (218)	\" src=\"https://bizweb.dktcdn.net/100/058/631/files/toyota-vios-mau-den-218-thegioixeoto.jpg?v=1614054039995\" style=\"height:auto\" /></td>\r\n			<td style=\"text-align:center\"><img alt=\"Vios màu bạc (1D4)\" src=\"https://bizweb.dktcdn.net/100/058/631/files/toyota-vios-mau-bac-thegioixeoto.jpg?v=1614054050111\" style=\"height:auto\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">Vios m&agrave;u đen (218)</td>\r\n			<td style=\"text-align:center\">Vios m&agrave;u bạc (1D4)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\"><img alt=\"Vios màu đỏ (3R3)	\" src=\"https://bizweb.dktcdn.net/100/058/631/files/toyota-vios-mau-do-3r3-thegioixeoto.jpg?v=1614054057085\" style=\"height:auto\" /></td>\r\n			<td style=\"text-align:center\"><img alt=\"Vios màu vàng cát (4R0)\" src=\"https://bizweb.dktcdn.net/100/058/631/files/toyota-vios-mau-nau-vang-4r0-thegioixeoto.jpg?v=1614054063777\" style=\"height:auto\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">Vios m&agrave;u đỏ (3R3)</td>\r\n			<td style=\"text-align:center\">Vios m&agrave;u v&agrave;ng c&aacute;t (4R0)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\"><img alt=\"Vios màu trắng xứ (040)	\" src=\"https://bizweb.dktcdn.net/100/058/631/files/toyota-vios-mau-trang-040-thegioixeoto.jpg?v=1614054088115\" style=\"height:auto\" /></td>\r\n			<td style=\"text-align:center\"><img alt=\"Vios màu trắng ngọc trai (089)\" src=\"https://bizweb.dktcdn.net/100/058/631/files/toyota-vios-mau-trang-ngoc-trai-089-thegioixeoto.jpg?v=1614054094386\" style=\"height:auto\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">Vios m&agrave;u trắng xứ (040)</td>\r\n			<td style=\"text-align:center\">Vios m&agrave;u trắng ngọc trai (089)</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"text-align:center\"><img alt=\"Vios màu vàng (576) (Vios E)\" src=\"https://bizweb.dktcdn.net/100/058/631/files/toyota-vios-mau-vang-576-thegioixeoto.jpg?v=1614054160245\" style=\"height:auto\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"text-align:center\">Vios m&agrave;u v&agrave;ng (576) (Vios E)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>','xx','xxxxxxxxxx',3,'2023-03-16 21:34:19','2023-05-11 00:49:39'),(40,'TOYOTA VIOS 2023','toyota-vios-2023','uploads/product/1683791340_download (2).jpg',23,670000000,620000000,0,1,0,0,90,NULL,'vios',NULL,NULL,5,15,'<p><em><strong>Toyota Yaris 2023</strong></em>&nbsp;l&agrave; mẫu xe Hatchbach duy nhất của Toyota được nhập khẩu nguy&ecirc;n chiếc từ Th&aacute;i Lan v&agrave; b&aacute;n ra duy nhất 1 phi&ecirc;n bản l&agrave;&nbsp;<em><strong>Yaris 1.5G 2023</strong>.&nbsp;<strong>Xe Yaris 2023</strong></em>&nbsp;c&oacute; thiết kế trẻ trung, bắt mắt, nhiều m&agrave;u xe lựa chọn c&ugrave;ng với đ&oacute; l&agrave; t&iacute;nh năng vận h&agrave;nh, khả năng tiết kiệm nhi&ecirc;n liệu, t&iacute;nh năng an to&agrave;n vượt trội c&ugrave;ng những tiện nghi đầy đủ tr&ecirc;n xe. C&ugrave;ng&nbsp;<strong>Thế Giới Xe &Ocirc; T&ocirc;</strong>&nbsp;t&igrave;m hiểu chi tiết về&nbsp;<em>gi&aacute; xe Yaris 2023, gi&aacute; xe Yaris 2023 lăn b&aacute;nh, h&igrave;nh ảnh chi tiết về nội ngoại thất, m&agrave;u xe, th&ocirc;ng số kỹ thuật</em>&nbsp;mới nhất.</p>','<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>MENU XEM NHANH</strong></p>\r\n\r\n			<ol>\r\n				<li><a href=\"https://thegioixeoto.vn/toyota-yaris#Gi%C3%A1%20xe%20Toyota%20Yaris\">Gi&aacute; xe Toyota Yaris 2023</a></li>\r\n				<li><a href=\"https://thegioixeoto.vn/toyota-yaris#Gi%C3%A1%20xe%20Toyota%20Yaris%20l%C4%83n%20b%C3%A1nh\">Gi&aacute; xe Yaris 2023 lăn b&aacute;nh</a></li>\r\n				<li><a href=\"https://thegioixeoto.vn/toyota-yaris#Mua%20xe%20Toyota%20Yaris%20tr%E1%BA%A3%20g%C3%B3p\">Mua xe Yaris 2023 trả g&oacute;p</a></li>\r\n				<li><a href=\"https://thegioixeoto.vn/toyota-yaris#M%C3%A0u%20xe%20Toyota%20Yaris\">M&agrave;u xe Toyota Yaris 2023</a></li>\r\n				<li><a href=\"https://thegioixeoto.vn/toyota-yaris#%C4%90%C3%A1nh%20gi%C3%A1%20xe%20Toyota%20Yaris\">Đ&aacute;nh gi&aacute; xe Toyota Yaris 2023</a></li>\r\n				<li><a href=\"https://thegioixeoto.vn/toyota-yaris#Mua%20xe%20Toyota%20Yaris\">Mua xe Toyota Yaris 2023</a></li>\r\n			</ol>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><em><img alt=\"Toyota Yaris 2023\" src=\"https://bizweb.dktcdn.net/100/058/631/files/toyota-yaris-2021-thegioixeoto-6d8dedb7-ced0-490d-8331-72e5008d1c85.jpg?v=1602254272217\" /></em></p>\r\n\r\n<p><em>Toyota Yaris 2023 ho&agrave;n to&agrave;n mới nhập khẩu nguy&ecirc;n chiếc từ Th&aacute;i Lan</em></p>\r\n\r\n<ul>\r\n	<li>\r\n	<h2><a id=\"Giá xe Toyota Yaris\" name=\"Giá xe Toyota Yaris\"><strong>Gi&aacute; xe Toyota Yaris 2023</strong></a></h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>Chi tiết về&nbsp;<strong>gi&aacute; xe Toyota Yaris 2023</strong>&nbsp;ho&agrave;n to&agrave;n mới với 1 phi&ecirc;n bản duy nhất l&agrave;<strong>&nbsp;Yaris 1.5G CVT</strong>&nbsp;được nhập khẩu nguy&ecirc;n chiếc từ Th&aacute;i Lan đang được Toyota Việt Nam ph&acirc;n phối ch&iacute;nh h&atilde;ng.</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Toyota Yaris 2023</strong></td>\r\n			<td><strong>Động cơ</strong></td>\r\n			<td><strong>Hộp số</strong></td>\r\n			<td><strong>Gi&aacute; xe&nbsp;(Vnđ)</strong></td>\r\n			<td><strong>Xuất sứ</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Yaris 1.5G CVT</td>\r\n			<td colspan=\"1\" rowspan=\"1\">\r\n			<p>Xăng 1.5L Dual VVt-i</p>\r\n			</td>\r\n			<td colspan=\"1\" rowspan=\"1\">CVT</td>\r\n			<td><strong>684 triệu</strong></td>\r\n			<td>Th&aacute;i Lan</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><em>(*) Gi&aacute; xe Toyota Yaris&nbsp;2023 đ&atilde; c&oacute; thuế VAT v&agrave; thuế ti&ecirc;u thụ đặc biệt, chưa trừ khuyến m&atilde;i v&agrave; giảm gi&aacute; xe.</em></p>\r\n\r\n<ul>\r\n	<li>\r\n	<h2><a id=\"Giá xe Toyota Yaris lăn bánh\" name=\"Giá xe Toyota Yaris lăn bánh\"><strong>Gi&aacute; xe Toyota Yaris 2023 lăn b&aacute;nh</strong></a></h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>C&aacute;c khoản chi ph&iacute; v&agrave; c&aacute;c bước thủ tục để&nbsp;xe&nbsp;Toyota Yaris 2023 lăn b&aacute;nh&nbsp;tại H&agrave; Nội, S&agrave;i G&ograve;n v&agrave; c&aacute;c tỉnh chi tiết nhất</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"5\">\r\n			<h3><strong>C&aacute;c chi ph&iacute; t&iacute;nh gi&aacute; xe Toyota&nbsp;Yaris 2023 lăn b&aacute;nh tại H&agrave; Nội, S&agrave;i G&ograve;n v&agrave; c&aacute;c tỉnh mới nhất</strong></h3>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">C&aacute;c chi ph&iacute; t&iacute;nh gi&aacute; lăn b&aacute;nh xe Yaris</td>\r\n			<td>H&agrave; Nội, Quảng Ninh, Hải Ph&ograve;ng, L&agrave;o Cai, Cao Bằng, Lạng Sơn, Cần Thơ, Sơn La</td>\r\n			<td>H&agrave; Tĩnh</td>\r\n			<td>C&aacute;c tỉnh th&agrave;nh phố kh&aacute;c</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"1\">Thuế trước bạ xe &ocirc; t&ocirc; con</td>\r\n			<td>12%</td>\r\n			<td>11%</td>\r\n			<td>10%</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"2\">Ph&iacute; cấp biển số</td>\r\n			<td>H&agrave; Nội v&agrave; S&agrave;i G&ograve;n</td>\r\n			<td colspan=\"2\">C&aacute;c tỉnh th&agrave;nh phố kh&aacute;c</td>\r\n		</tr>\r\n		<tr>\r\n			<td>20 triệu</td>\r\n			<td colspan=\"2\">2 triệu</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Ph&iacute; đăng kiểm</td>\r\n			<td colspan=\"3\">340K</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"2\">Ph&iacute; bảo tr&igrave; đường bộ</td>\r\n			<td colspan=\"3\">Xe đăng k&yacute; t&ecirc;n c&aacute; nh&acirc;n: 130K/th&aacute;ng</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\">Xe đăng k&yacute; t&ecirc;n doanh nghiệp: 180K/th&aacute;ng</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"1\">Bảo hiểm d&acirc;n sự bắt buộc</td>\r\n			<td colspan=\"3\">Xe &ocirc; t&ocirc; con dưới 7 chỗ: 480K/Năm</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Bảo hiểm th&acirc;n vỏ xe</td>\r\n			<td colspan=\"3\">Gi&aacute; trị xe x 1,6%/Năm</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Ph&iacute; &eacute;p biển m&ecirc; ca chống nước</td>\r\n			<td colspan=\"3\">500K</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"2\">Ph&iacute; dịch vụ đăng k&yacute;</td>\r\n			<td>H&agrave; Nội v&agrave; S&agrave;i G&ograve;n</td>\r\n			<td colspan=\"2\">C&aacute;c tỉnh th&agrave;nh phố kh&aacute;c</td>\r\n		</tr>\r\n		<tr>\r\n			<td>3 triệu</td>\r\n			<td colspan=\"2\">5 triệu</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3><strong>Quy tr&igrave;nh đăng k&yacute; lăn b&aacute;nh xe Toyota Yaris 2023</strong></h3>\r\n\r\n<ol>\r\n	<li><strong>Nộp thuế&nbsp;trước bạ cho xe Yaris 2023:</strong>&nbsp;Mức ph&iacute; trước bạ sẽ theo biểu thuế của Tổng cục thuế quyết định c&ograve;n mức nộp thuế sẽ theo địa phương quyết định. Tại&nbsp;khu vực 1&nbsp;mức thuế trước bạ sẽ l&agrave;&nbsp;12%,&nbsp;khu vực 2&nbsp;mức thuế trước bạ sẽ l&agrave;&nbsp;10%. Kh&aacute;ch h&agrave;ng sẽ đến chi cục thuế tại nơi đăng k&yacute; hộ khẩu thường tr&uacute; để mở tờ khai nộp thuế trước bạ.</li>\r\n	<li><strong>Đăng k&yacute; cấp biển số xe Yaris:</strong>&nbsp;Mức ph&iacute; cấp biển số xe đăng k&yacute; mới tại&nbsp;khu vực 1&nbsp;l&agrave; 20 triệu tại H&agrave; Nội v&agrave;&nbsp;Th&agrave;nh Phố Hồ Ch&iacute; Minh, tại&nbsp;khu vực 2&nbsp;t&ugrave;y thuộc v&agrave;o hộ khẩu thuộc n&ocirc;ng th&ocirc;n, thị trấn sẽ giao động từ 200K đến 500K, tại th&agrave;nh phố sẽ l&agrave; 1 triệu - 2 triệu.</li>\r\n	<li><strong>Đăng kiểm v&agrave; nộp phi lưu h&agrave;nh đường bộ:</strong>&nbsp;Ph&iacute; đăng kiểm 340K, ph&iacute; lưu h&agrave;nh đường bộ th&igrave; c&ograve;n t&ugrave;y v&agrave;o việc xe đăng k&yacute; t&ecirc;n doanh nghiệp sẽ c&oacute; mức ph&iacute; l&agrave; 180k/Th&aacute;ng v&agrave; đăng k&yacute; t&ecirc;n c&aacute; nh&acirc;n sẽ l&agrave; 130K/Th&aacute;ng, Yaris&nbsp;thời gian nộp lần đầu tối đa l&agrave; 30 th&aacute;ng.</li>\r\n</ol>\r\n\r\n<table border=\"1\" cellpadding=\"2\" cellspacing=\"2\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"5\">\r\n			<h3><strong>Gi&aacute; xe&nbsp;Yaris 2023 lăn b&aacute;nh tại H&agrave; Nội, S&agrave;i G&ograve;n v&agrave; Tỉnh</strong></h3>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"2\">STT</td>\r\n			<td rowspan=\"2\">Khu vực</td>\r\n			<td>TP H&agrave; Nội</td>\r\n			<td>TP Hồ Ch&iacute; Minh</td>\r\n			<td>Tỉnh kh&aacute;c</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thuế TB 12%</td>\r\n			<td>Thuế TB 10%</td>\r\n			<td>Thuế TB 10%</td>\r\n		</tr>\r\n		<tr>\r\n			<td>1</td>\r\n			<td><em>Gi&aacute; xe Yaris 2023</em></td>\r\n			<td>684tr</td>\r\n			<td>684tr</td>\r\n			<td>684tr</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2</td>\r\n			<td>Thuế trước bạ</td>\r\n			<td>82,08tr</td>\r\n			<td>68,4tr</td>\r\n			<td>68,4tr</td>\r\n		</tr>\r\n		<tr>\r\n			<td>3</td>\r\n			<td>Ph&iacute; đăng kiểm</td>\r\n			<td>340k</td>\r\n			<td>340k</td>\r\n			<td>340k</td>\r\n		</tr>\r\n		<tr>\r\n			<td>4</td>\r\n			<td>Ph&iacute; sử dụng đường bộ 2,5 năm</td>\r\n			<td>3,9tr</td>\r\n			<td>3,9tr</td>\r\n			<td>3,9tr</td>\r\n		</tr>\r\n		<tr>\r\n			<td>5</td>\r\n			<td>Bảo hiểm th&acirc;n vỏ xe 1 năm</td>\r\n			<td>10,4tr</td>\r\n			<td>10,4tr</td>\r\n			<td>10,4tr</td>\r\n		</tr>\r\n		<tr>\r\n			<td>6</td>\r\n			<td>Bảo hiểm TNDS bắt buộc 1 năm</td>\r\n			<td>480k</td>\r\n			<td>480k</td>\r\n			<td>480k</td>\r\n		</tr>\r\n		<tr>\r\n			<td>7</td>\r\n			<td>Lệ ph&iacute; đăng k&yacute; cấp biển số</td>\r\n			<td>20tr</td>\r\n			<td>20tr</td>\r\n			<td>2tr</td>\r\n		</tr>\r\n		<tr>\r\n			<td>8</td>\r\n			<td>Ph&iacute; dịch vụ đăng k&yacute; xe</td>\r\n			<td>3tr</td>\r\n			<td>3tr</td>\r\n			<td>5tr</td>\r\n		</tr>\r\n		<tr>\r\n			<td>9</td>\r\n			<td><em>Gi&aacute; xe Yaris 2023 lăn b&aacute;nh</em></td>\r\n			<td>805tr</td>\r\n			<td>792tr</td>\r\n			<td>776tr</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><em>(*) Gi&aacute; xe Toyota Yaris 2023&nbsp;lăn b&aacute;nh đ&atilde; bao gồm c&aacute;c chi ph&iacute; lăn b&aacute;nh xe, chưa trừ khuyến m&atilde;i giảm gi&aacute; xe.</em></p>\r\n\r\n<ul>\r\n	<li>\r\n	<h2><a id=\"Mua xe Toyota Yaris trả góp\" name=\"Mua xe Toyota Yaris trả góp\"><strong>Mua xe Toyota Yaris&nbsp;2023 trả g&oacute;p</strong></a></h2>\r\n	</li>\r\n</ul>\r\n\r\n<h3><strong>Quy tr&igrave;nh mua xe Yaris&nbsp;trả g&oacute;p</strong></h3>\r\n\r\n<ol>\r\n	<li>\r\n	<p>K&yacute; hợp đồng&nbsp;<strong>mua xe Yaris&nbsp;2023 trả g&oacute;p</strong>&nbsp;tại đại l&yacute;, trong hợp đồng thể hiện r&otilde; c&aacute;c điều khoản li&ecirc;n quan đến vấn đề vay vốn&nbsp;<strong>mua xe &ocirc; t&ocirc; trả g&oacute;p</strong>.</p>\r\n	</li>\r\n	<li>Tập hợp hồ sơ như danh mục đ&atilde; k&ecirc; b&ecirc;n tr&ecirc;n + hợp đồng mua b&aacute;n xe + phiếu đặt cọc hợp đồng + Đề nghị vay vốn gửi cho Ng&acirc;n h&agrave;ng.</li>\r\n	<li>Thanh to&aacute;n số tiền vay vốn th&ocirc;ng qua c&aacute;c h&igrave;nh thức đ&uacute;ng như thỏa thuận giữa người mua v&agrave; đại l&yacute;. Sau đ&oacute; người mua sẽ d&ugrave;ng hồ sơ vay vốn đăng k&yacute; sở hữu xe theo t&ecirc;n m&igrave;nh v&agrave;&nbsp;thời gian thực hiện khoảng trong 01 ng&agrave;y. L&uacute;c n&agrave;y chiếc xe đ&atilde; đứng t&ecirc;n kh&aacute;ch h&agrave;ng (mặc d&ugrave; mới chỉ nộp 20-30%).</li>\r\n	<li>Đến ng&acirc;n h&agrave;ng để b&agrave;n giao giấy đăng k&yacute; xe hoặc giấy hẹn lấy đăng k&yacute; xe, k&yacute; hợp đồng giải ng&acirc;n. Sau khoảng 3 tiếng sau tới đại l&yacute; để nhận xe Yaris&nbsp;của qu&yacute; kh&aacute;ch.</li>\r\n</ol>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"3\">\r\n			<h3><strong>Thủ tục hồ sơ mua xe Toyota Yaris 2023 trả g&oacute;p tại H&agrave; Nội, S&agrave;i G&ograve;n v&agrave; tỉnh</strong></h3>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Hồ sơ vay vốn</p>\r\n			</td>\r\n			<td>C&aacute; nh&acirc;n mua xe</td>\r\n			<td>C&ocirc;ng ty mua xe</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"4\">Hồ sơ ph&aacute;p l&yacute; (bắt buộc)</td>\r\n			<td>&ndash; Chứng minh nh&acirc;n d&acirc;n/ hộ chiếu</td>\r\n			<td>&ndash; Giấy ph&eacute;p th&agrave;nh lập</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&ndash; Sổ hộ khẩu</td>\r\n			<td>&ndash; Giấy ph&eacute;p ĐKKD</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"2\">&ndash; Giấy đăng k&yacute; kết h&ocirc;n (nếu đ&atilde; lập gia đ&igrave;nh) hoặc Giấy x&aacute;c nhận độc th&acirc;n (nếu chưa lập gia đ&igrave;nh)</td>\r\n			<td>&ndash; Bi&ecirc;n bản họp Hội Đồng th&agrave;nh vi&ecirc;n (nếu l&agrave; CTY TNHH)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&ndash; Điều lệ của C&ocirc;ng ty (TNHH, Cty li&ecirc;n doanh)</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"3\">Chứng minh nguồn thu nhập</td>\r\n			<td>&ndash; Nếu thu nhập từ lương cần c&oacute; : Hợp đồng lao động, sao k&ecirc; 3 th&aacute;ng lương hoặc x&aacute;c nhận 3 th&aacute;ng lương gần nhất.</td>\r\n			<td>&ndash; B&aacute;o c&aacute;o thuế hoặc b&aacute;o c&aacute;o t&agrave;i ch&iacute;nh của 3 th&aacute;ng gần nhất</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&ndash; Nếu kh&aacute;ch h&agrave;ng c&oacute; c&ocirc;ng ty ri&ecirc;ng : chứng minh t&agrave;i ch&iacute;nh giống như c&ocirc;ng ty đứng t&ecirc;n.</td>\r\n			<td rowspan=\"2\">&ndash; Một số hợp đồng kinh tế, h&oacute;a đơn đầu v&agrave;o, đầu ra ti&ecirc;u biểu trong 3 th&aacute;ng gần nhất.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&ndash; Nếu kh&aacute;ch h&agrave;ng l&agrave;m việc tư do hoặc c&oacute; những nguồn thu nhập kh&ocirc;ng thể chứng minh được, vui l&ograve;ng li&ecirc;n hệ.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<ul>\r\n	<li>\r\n	<h2><a id=\"Màu xe Toyota Yaris\" name=\"Màu xe Toyota Yaris\"><strong>M&agrave;u xe Toyota Yaris 2023</strong></a></h2>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>M&agrave;u xe Toyota Yaris 2023</strong>&nbsp;được Toyota nhập khẩu về Việt Nam l&ecirc;n tới&nbsp;<strong>8 m&agrave;u xe Yaris&nbsp;</strong>cho kh&aacute;ch h&agrave;ng c&oacute; thể lựa chọn m&agrave;u sắc ph&ugrave; hợp nhất với nhu cầu cũng như thỏa m&atilde;n về phong thủy của bản th&acirc;n.&nbsp;<strong>8 m&agrave;u xe Yaris 2020</strong>&nbsp;bao gồm:&nbsp;<em>M&agrave;u bạc, m&agrave;u ghi x&aacute;m, m&agrave;u đỏ, m&agrave;u cam &aacute;nh kim, m&agrave;u v&agrave;ng chanh, m&agrave;u trắng ngọc trai v&agrave; m&agrave;u đen.</em></p>\r\n\r\n<table align=\"center\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Toyota Yaris màu bạc (1D4)\" src=\"https://bizweb.dktcdn.net/100/058/631/files/toyota-yaris-mau-bac-thegioixeoto.jpg?v=1602254559547\" /></td>\r\n			<td><img alt=\"Toyota Yaris màu xám (1G3)\" src=\"https://bizweb.dktcdn.net/100/058/631/files/toyota-yaris-mau-xam-thegioixeoto.jpg?v=1602254570978\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Toyota Yaris m&agrave;u bạc (1D4)</td>\r\n			<td>Toyota Yaris m&agrave;u x&aacute;m (1G3)</td>\r\n		</tr>\r\n		<tr>\r\n			<td><img alt=\"Toyota Yaris màu cam (4R8)\" src=\"https://bizweb.dktcdn.net/100/058/631/files/toyota-yaris-mau-cam-thegioixeoto.jpg?v=1602254579327\" /></td>\r\n			<td><img alt=\"Toyota Yaris màu đỏ đun (3R3)\" src=\"https://bizweb.dktcdn.net/100/058/631/files/toyota-yaris-mau-do-thegioixeoto.jpg?v=1602254586670\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Toyota Yaris m&agrave;u cam (4R8)</td>\r\n			<td>Toyota Yaris m&agrave;u đỏ (3R3)</td>\r\n		</tr>\r\n		<tr>\r\n			<td><img alt=\"Toyota Yaris màu vàng chanh (6W2)\" src=\"https://bizweb.dktcdn.net/100/058/631/files/toyota-yaris-mau-vang-thegioixeoto.jpg?v=1602254599885\" /></td>\r\n			<td><img alt=\"Toyota Yaris màu trắng (040)\" src=\"https://bizweb.dktcdn.net/100/058/631/files/toyota-yaris-mau-trang-thegioixeoto.jpg?v=1602254607824\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Toyota Yaris m&agrave;u v&agrave;ng (6W2)</td>\r\n			<td>Toyota Yaris m&agrave;u trắng (040)</td>\r\n		</tr>\r\n		<tr>\r\n			<td><img alt=\"Toyota Yaris màu đen (218)\" src=\"https://bizweb.dktcdn.net/100/058/631/files/toyota-yaris-mau-den-thegioixeoto.jpg?v=1602254633743\" /></td>\r\n			<td><img alt=\"Toyota Yaris màu xanh (8W9)\" src=\"https://bizweb.dktcdn.net/100/058/631/files/toyota-yaris-mau-xanh-co-ban-thegioixeoto.jpg?v=1602254623955\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Toyota Yaris m&agrave;u đen (218)</td>\r\n			<td>Toyota Yaris m&agrave;u xanh (8W9)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><em>M&agrave;u xe Toyota Yaris 2023&nbsp;nhập khẩu đủ m&agrave;u lựa chọn</em></p>\r\n\r\n<h3><strong>Chọn m&agrave;u xe Toyota&nbsp;Yaris 2023&nbsp;theo mệnh</strong></h3>\r\n\r\n<p><strong>8 m&agrave;u xe Toyota Yaris 2023</strong>&nbsp;th&igrave; kh&aacute;ch h&agrave;ng c&oacute; thể thoải m&aacute;i dựa theo bảng m&agrave;u để lựa&nbsp;<strong>chọn&nbsp;m&agrave;u xe Yaris theo mệnh</strong>&nbsp;của bản th&acirc;n, kh&aacute;ch h&agrave;ng nếu biết m&igrave;nh bản mệnh g&igrave; nhưng chưa biết chọn m&agrave;u g&igrave; cho ph&ugrave; hợp với bản mệnh của m&igrave;nh c&oacute; thể dựa v&agrave;o bảng&nbsp;<strong>chọn&nbsp;m&agrave;u xe Yaris 2023 theo mệnh</strong>&nbsp;sau để c&oacute; thể đưa ra quyết định cho bản th&acirc;n.</p>',NULL,NULL,3,'2023-05-11 00:49:00','2023-05-11 00:51:34'),(41,'LEXUS RX 300 2022','lexus-rx-300-2022','uploads/product/1683792316_download (5).jpg',0,420000000,410000000,1,1,0,0,83,NULL,'s',NULL,NULL,5,14,'<p><em><strong>Lexus RX 300 2022</strong></em>&nbsp;được nhập khẩu ch&iacute;nh h&atilde;ng Lexus từ Nhật Bản với thiết kế kiểu d&aacute;ng giống với đ&agrave;n anh&nbsp;<strong>Lexus RX350</strong>&nbsp;v&agrave; chỉ kh&aacute;c nhau về mặt c&ocirc;ng nghệ động cơ, hộp số v&agrave; t&iacute;nh năng tiện nghi tr&ecirc;n xe. C&ugrave;ng&nbsp;<strong>Thế Giới Xe &Ocirc; T&ocirc;</strong>&nbsp;t&igrave;m hiểu chi tiết về&nbsp;<em>gi&aacute; xe, gi&aacute; lăn b&aacute;nh, h&igrave;nh ảnh xe thực tế, th&ocirc;ng số kỹ thuật k&egrave;m đ&aacute;nh gi&aacute; xe Lexus RX 300 2022</em>&nbsp;chi tiết.</p>','<p><em><strong>Lexus RX 300 2022</strong></em>&nbsp;được nhập khẩu ch&iacute;nh h&atilde;ng Lexus từ Nhật Bản với thiết kế kiểu d&aacute;ng giống với đ&agrave;n anh&nbsp;<strong>Lexus RX350</strong>&nbsp;v&agrave; chỉ kh&aacute;c nhau về mặt c&ocirc;ng nghệ động cơ, hộp số v&agrave; t&iacute;nh năng tiện nghi tr&ecirc;n xe. C&ugrave;ng&nbsp;<strong>Thế Giới Xe &Ocirc; T&ocirc;</strong>&nbsp;t&igrave;m hiểu chi tiết về&nbsp;<em>gi&aacute; xe, gi&aacute; lăn b&aacute;nh, h&igrave;nh ảnh xe thực tế, th&ocirc;ng số kỹ thuật k&egrave;m đ&aacute;nh gi&aacute; xe Lexus RX 300 2022</em>&nbsp;chi tiết.</p>\r\n\r\n<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>MENU XEM NHANH</strong></p>\r\n\r\n			<ol>\r\n				<li><a href=\"https://thegioixeoto.vn/lexus-rx-300#Gi%C3%A1%20xe%20Lexus%20RX%20300\">Gi&aacute; xe Lexus RX 300&nbsp;2022</a></li>\r\n				<li><a href=\"https://thegioixeoto.vn/lexus-rx-300#Gi%C3%A1%20xe%20Lexus%20RX%20300%20l%C4%83n%20b%C3%A1nh\">Gi&aacute; xe Lexus RX 300 lăn b&aacute;nh</a></li>\r\n				<li><a href=\"https://thegioixeoto.vn/lexus-rx-300#M%C3%A0u%20xe%20Lexus%20RX%20300\">M&agrave;u xe Lexus RX 300&nbsp;2022</a></li>\r\n				<li><a href=\"https://thegioixeoto.vn/lexus-rx-300#%C4%90%C3%A1nh%20gi%C3%A1%20xe%20Lexus%20RX%20300\">Đ&aacute;nh gi&aacute; xe Lexus RX 300 2022</a></li>\r\n				<li><a href=\"https://thegioixeoto.vn/lexus-rx-300#Mua%20xe%20Lexus%20RX%20300\">Mua xe Lexus RX 300&nbsp;2022</a></li>\r\n			</ol>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><img alt=\"Lexus RX 300 2022\" src=\"https://bizweb.dktcdn.net/100/058/631/files/ngoai-that-lexus-rx300-2020-1-thegioixeoto.jpg?v=1574692445841\" /></p>\r\n\r\n<p><em>Lexus RX 300 2022 ho&agrave;n to&agrave;n mới ch&iacute;nh thức được ra mắt với mức gi&aacute; 3,18 tỷ</em></p>\r\n\r\n<ul>\r\n	<li>\r\n	<h2><a id=\"Giá xe Lexus RX 300\" name=\"Giá xe Lexus RX 300\"><strong>Gi&aacute; xe Lexus RX 300 2022</strong></a></h2>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>Gi&aacute; xe Lexus RX 300 2022</strong>&nbsp;được c&ocirc;ng bố ch&iacute;nh thức bởi Lexus Việt Nam với duy nhất 1 phi&ecirc;n bản sử dụng động cơ 2.0L tubor với rất nhiều c&ocirc;ng nghệ hiện đại của Lexus.</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Lexus RX 300 2022</strong></td>\r\n			<td><strong>Động cơ</strong></td>\r\n			<td><strong>Hộp số</strong></td>\r\n			<td><strong>Gi&aacute; xe&nbsp;(Vnđ)</strong></td>\r\n			<td><strong>Xuất sứ</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Gi&aacute; xe Lexus RX 300</td>\r\n			<td colspan=\"1\" rowspan=\"1\">\r\n			<p>Xăng 2.0L Tubor</p>\r\n			</td>\r\n			<td colspan=\"1\" rowspan=\"1\">6AT</td>\r\n			<td><strong>3,180 tỷ</strong></td>\r\n			<td>Nhật Bản</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><em>(*) Gi&aacute; xe Lexus RX 300&nbsp;2022 đ&atilde; c&oacute; thuế VAT v&agrave; thuế ti&ecirc;u thụ đặc biệt, chưa trừ khuyến m&atilde;i v&agrave; giảm gi&aacute; xe.</em></p>\r\n\r\n<p><strong>LI&Ecirc;N HỆ ĐỂ ĐƯỢC TƯ VẤN V&Agrave; B&Aacute;O&nbsp;GI&Aacute;&nbsp;TỐT NHẤT</strong></p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>TƯ VẤN MUA XE LEXUS</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>&nbsp;&nbsp;<a href=\"tel:0867688166\">0867 688 166</a>&nbsp;&nbsp;</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>(*)H&Atilde;Y&nbsp;Click v&agrave;o số điện thoại sẽ tạo cuộc gọi tr&ecirc;n di động</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h2><a id=\"Giá xe Lexus RX 300 lăn bánh\" name=\"Giá xe Lexus RX 300 lăn bánh\"><strong>Gi&aacute; xe Lexus RX 300 2022 lăn b&aacute;nh</strong></a></h2>\r\n	</li>\r\n</ul>\r\n\r\n<p>C&aacute;c khoản chi ph&iacute; v&agrave; c&aacute;c bước thủ tục để&nbsp;xe&nbsp;Lexus RX 300 2022 lăn b&aacute;nh&nbsp;tại H&agrave; Nội, S&agrave;i G&ograve;n v&agrave; c&aacute;c tỉnh chi tiết nhất</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"5\">\r\n			<h3><strong>Bảng c&aacute;c chi ph&iacute; t&iacute;nh gi&aacute; xe Lexus RX 300 2022 lăn b&aacute;nh tại H&agrave; Nội, S&agrave;i G&ograve;n v&agrave; c&aacute;c tỉnh mới nhất</strong></h3>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">C&aacute;c chi ph&iacute; t&iacute;nh gi&aacute; lăn b&aacute;nh xe RX 300</td>\r\n			<td>H&agrave; Nội, Quảng Ninh, Hải Ph&ograve;ng, L&agrave;o Cai, Cao Bằng, Lạng Sơn, Cần Thơ, Sơn La</td>\r\n			<td>H&agrave; Tĩnh</td>\r\n			<td>C&aacute;c tỉnh th&agrave;nh phố kh&aacute;c</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"1\">Thuế trước bạ xe &ocirc; t&ocirc; con</td>\r\n			<td>12%</td>\r\n			<td>11%</td>\r\n			<td>10%</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"2\">Ph&iacute; cấp biển số</td>\r\n			<td>H&agrave; Nội v&agrave; S&agrave;i G&ograve;n</td>\r\n			<td colspan=\"2\">C&aacute;c tỉnh th&agrave;nh phố kh&aacute;c</td>\r\n		</tr>\r\n		<tr>\r\n			<td>20 triệu</td>\r\n			<td colspan=\"2\">2 triệu</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Ph&iacute; đăng kiểm</td>\r\n			<td colspan=\"3\">340K</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"2\">Ph&iacute; bảo tr&igrave; đường bộ</td>\r\n			<td colspan=\"3\">Xe đăng k&yacute; t&ecirc;n c&aacute; nh&acirc;n: 130K/th&aacute;ng</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\">Xe đăng k&yacute; t&ecirc;n doanh nghiệp: 180K/th&aacute;ng</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"1\">Bảo hiểm d&acirc;n sự bắt buộc</td>\r\n			<td colspan=\"3\">Xe &ocirc; t&ocirc; con dưới 7 chỗ: 480K/Năm</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Bảo hiểm th&acirc;n vỏ xe</td>\r\n			<td colspan=\"3\">Gi&aacute; trị xe x 1,6%/Năm</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Ph&iacute; &eacute;p biển m&ecirc; ca chống nước</td>\r\n			<td colspan=\"3\">500K</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" rowspan=\"2\">Ph&iacute; dịch vụ đăng k&yacute;</td>\r\n			<td>H&agrave; Nội v&agrave; S&agrave;i G&ograve;n</td>\r\n			<td colspan=\"2\">C&aacute;c tỉnh th&agrave;nh phố kh&aacute;c</td>\r\n		</tr>\r\n		<tr>\r\n			<td>3 triệu</td>\r\n			<td colspan=\"2\">5 triệu</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3><strong>Quy tr&igrave;nh đăng k&yacute; lăn b&aacute;nh xe Lexus RX 300 2022</strong></h3>\r\n\r\n<ol>\r\n	<li><strong>Nộp thuế&nbsp;trước bạ cho xe RX 300 2022:</strong>&nbsp;Mức ph&iacute; trước bạ sẽ theo biểu thuế của Tổng cục thuế quyết định c&ograve;n mức nộp thuế sẽ theo địa phương quyết định. Tại&nbsp;khu vực 1&nbsp;mức thuế trước bạ sẽ l&agrave;&nbsp;12%,&nbsp;khu vực 2&nbsp;mức thuế trước bạ sẽ l&agrave;&nbsp;10%. Kh&aacute;ch h&agrave;ng sẽ đến chi cục thuế tại nơi đăng k&yacute; hộ khẩu thường tr&uacute; để mở tờ khai nộp thuế trước bạ.</li>\r\n	<li><strong>Đăng k&yacute; cấp biển số xe RX 300:</strong>&nbsp;Mức ph&iacute; cấp biển số xe đăng k&yacute; mới tại&nbsp;khu vực 1&nbsp;l&agrave; 20 triệu tại H&agrave; Nội v&agrave;&nbsp;Th&agrave;nh Phố Hồ Ch&iacute; Minh, tại&nbsp;khu vực 2&nbsp;t&ugrave;y thuộc v&agrave;o hộ khẩu thuộc n&ocirc;ng th&ocirc;n, thị trấn sẽ giao động từ 200K đến 500K, tại th&agrave;nh phố sẽ l&agrave; 1 triệu - 2 triệu.</li>\r\n	<li><strong>Đăng kiểm v&agrave; nộp phi lưu h&agrave;nh đường bộ:</strong>&nbsp;Ph&iacute; đăng kiểm 340K, ph&iacute; lưu h&agrave;nh đường bộ th&igrave; c&ograve;n t&ugrave;y v&agrave;o việc xe đăng k&yacute; t&ecirc;n doanh nghiệp sẽ c&oacute; mức ph&iacute; l&agrave; 180k/Th&aacute;ng v&agrave; đăng k&yacute; t&ecirc;n c&aacute; nh&acirc;n sẽ l&agrave; 130K/Th&aacute;ng, Lexus RX 300 2020&nbsp;thời gian nộp lần đầu tối đa l&agrave; 30 th&aacute;ng.</li>\r\n</ol>\r\n\r\n<p><strong>Gi&aacute; xe Lexus RX300 2022&nbsp;lăn b&aacute;nh</strong>&nbsp;tại H&agrave; Nội, S&agrave;i G&ograve;n v&agrave; tỉnh chi tiết nhất bao gồm c&aacute;c khoản thuế trước bạ, lệ ph&iacute; đăng k&yacute; v&agrave; c&aacute;c chi ph&iacute; đăng kiểm bảo hiểm xe.</p>\r\n\r\n<table border=\"1\" cellpadding=\"2\" cellspacing=\"2\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<h3><strong>Gi&aacute; lăn b&aacute;nh&nbsp;xe&nbsp;Lexus RX 300 2022 tại H&agrave; Nội, S&agrave;i G&ograve;n v&agrave; Tỉnh</strong></h3>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"2\">Khu vực</td>\r\n			<td>TP H&agrave; Nội</td>\r\n			<td>TP Hồ Ch&iacute; Minh</td>\r\n			<td>Tỉnh kh&aacute;c</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thuế TB 12%</td>\r\n			<td>Thuế TB 10%</td>\r\n			<td>Thuế TB 10%</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Gi&aacute; ni&ecirc;m yết</td>\r\n			<td>3.180 tỷ</td>\r\n			<td>3.180 tỷ</td>\r\n			<td>3.180 tỷ</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thuế trước bạ</td>\r\n			<td>381,6tr</td>\r\n			<td>318tr</td>\r\n			<td>318tr</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ph&iacute; đăng kiểm</td>\r\n			<td>340k</td>\r\n			<td>340k</td>\r\n			<td>340k</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ph&iacute; sử dụng đường bộ 2,5 năm</td>\r\n			<td>3,9tr</td>\r\n			<td>3,9tr</td>\r\n			<td>3,9tr</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bảo hiểm th&acirc;n vỏ xe 1 năm</td>\r\n			<td>50,88tr</td>\r\n			<td>50,88tr</td>\r\n			<td>50,88tr</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bảo hiểm TNDS bắt buộc 1 năm</td>\r\n			<td>480k</td>\r\n			<td>480k</td>\r\n			<td>480k</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Lệ ph&iacute; đăng k&yacute; cấp biển số</td>\r\n			<td>20tr</td>\r\n			<td>20tr</td>\r\n			<td>2tr</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ph&iacute; dịch vụ đăng k&yacute; xe</td>\r\n			<td>3tr</td>\r\n			<td>3tr</td>\r\n			<td>5tr</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tổng gi&aacute; xe lăn b&aacute;nh</td>\r\n			<td>3.640 tỷ</td>\r\n			<td>3.577 tỷ</td>\r\n			<td>3.561 tỷ</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><em>(*) Gi&aacute; xe v&agrave; gi&aacute; lăn b&aacute;nh Lexus RX300 2022 đ&atilde; bao gồm thuế nhập khẩu, thuế VAT, thuế ti&ecirc;u thụ đặc biệt v&agrave; c&aacute;c chi ph&iacute; lăn b&aacute;nh xe.</em></p>\r\n\r\n<ul>\r\n	<li>\r\n	<h2><a id=\"Màu xe Lexus RX 300\" name=\"Màu xe Lexus RX 300\"><strong>M&agrave;u xe Lexus RX 300 2022</strong></a></h2>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>M&agrave;u xe Lexus RX300 2022</strong>&nbsp;c&oacute; tới 9 m&agrave;u xe cho kh&aacute;ch h&agrave;ng lựa chọn thoải m&aacute;i theo sở th&iacute;ch hoặc mệnh của m&igrave;nh,&nbsp;<strong>9 m&agrave;u xe RX300</strong>&nbsp;bao gồm:&nbsp;<em>M&agrave;u đen (212), m&agrave;u xanh đen (223), m&agrave;u đỏ (3R1), m&agrave;u xanh dương (8X5), m&agrave;u xanh r&ecirc;u, m&agrave;u trắng ngọc trai (085), m&agrave;u bạc (1J7), m&agrave;u v&agrave;ng be (4X8), m&agrave;u n&acirc;u cafe (4X2).</em></p>\r\n\r\n<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><em><img alt=\"Lexus RX300 màu bạc (1J7)\" src=\"https://bizweb.dktcdn.net/100/058/631/files/lexus-rx300-mau-bac-1j7-thegioixeoto.jpg?v=1574693204923\" /></em></td>\r\n			<td><em><img alt=\"Lexus RX300 màu nâu Cafe (4X2)\" src=\"https://bizweb.dktcdn.net/100/058/631/files/lexus-rx300-mau-nau-cafe-4x2-thegioixeoto.jpg?v=1574693220971\" /></em></td>\r\n		</tr>\r\n		<tr>\r\n			<td><em>Lexus RX300 m&agrave;u bạc (1J7)</em></td>\r\n			<td><em>Lexus RX300 m&agrave;u n&acirc;u Cafe (4X2)</em></td>\r\n		</tr>\r\n		<tr>\r\n			<td><em><img alt=\"Lexus RX300 màu đỏ (3R1)\" src=\"https://bizweb.dktcdn.net/100/058/631/files/lexus-rx300-mau-do-3r1-thegioixeoto.jpg?v=1574693258682\" /></em></td>\r\n			<td><em><img alt=\"Lexus RX300 màu xanh rêu\" src=\"https://bizweb.dktcdn.net/100/058/631/files/lexus-rx300-mau-xanh-reu-thegioixeoto.jpg?v=1574693270201\" /></em></td>\r\n		</tr>\r\n		<tr>\r\n			<td><em>Lexus RX300 m&agrave;u đỏ (3R1)</em></td>\r\n			<td><em>Lexus RX300 m&agrave;u xanh r&ecirc;u</em></td>\r\n		</tr>\r\n		<tr>\r\n			<td><em><img alt=\"Lexus RX300 màu xanh dương (8X5)\" src=\"https://bizweb.dktcdn.net/100/058/631/files/lexus-rx300-mau-xanh-mica-8x5-thegioixeoto.jpg?v=1574693278646\" /></em></td>\r\n			<td><em><img alt=\"Lexus RX300 màu trắng ngọc trai (085)\" src=\"https://bizweb.dktcdn.net/100/058/631/files/lexus-rx300-mau-trang-ngoc-trai-085-thegioixeoto.jpg?v=1574693289234\" /></em></td>\r\n		</tr>\r\n		<tr>\r\n			<td><em>Lexus RX300 m&agrave;u xanh dương (8X5)</em></td>\r\n			<td><em>Lexus RX300 m&agrave;u trắng ngọc trai (085)</em></td>\r\n		</tr>\r\n		<tr>\r\n			<td><em><img alt=\"Lexus RX300 màu vàng be (4X8)\" src=\"https://bizweb.dktcdn.net/100/058/631/files/lexus-rx300-mau-vang-be-4x8-thegioixeoto.jpg?v=1574693311865\" /></em></td>\r\n			<td><em><img alt=\"Lexus RX300 màu đen (212)\" src=\"https://bizweb.dktcdn.net/100/058/631/files/lexus-rx300-mau-den-mo-212-thegioixeoto.jpg?v=1574693320591\" /></em></td>\r\n		</tr>\r\n		<tr>\r\n			<td><em>Lexus RX300 m&agrave;u v&agrave;ng be (4X8)</em></td>\r\n			<td><em>Lexus RX300 m&agrave;u đen (212)</em></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><em><img alt=\"Lexus RX300 màu xanh đen (223)\" src=\"https://bizweb.dktcdn.net/100/058/631/files/lexus-rx300-mau-xanh-den-223-thegioixeoto.jpg?v=1574693337600\" /></em></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><em>Lexus RX300 m&agrave;u xanh đen (223)</em></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><em>Bảng m&agrave;u xe Lexus RX 300 2022 mới nhất với 9 m&agrave;u cho kh&aacute;ch lựa chọn</em></p>\r\n\r\n<p><strong>M&agrave;u nội thất Lexus RX300 2022:&nbsp;</strong>Lexus RX300 c&oacute; 3 m&agrave;u nội thất cho kh&aacute;ch h&agrave;ng lựa chọn bao gồm:&nbsp;<em>M&agrave;u v&agrave;ng be, m&agrave;u n&acirc;u da b&ograve; v&agrave; m&agrave;u đen</em></p>','f','f',3,'2023-05-11 01:05:16','2026-04-21 03:38:34'),(42,'Toyota Avanza Premio','toyota-avanza-premio','uploads/product/1683792545_download (7).jpg',22,780000000,780000000,0,1,0,0,85,NULL,'s',NULL,NULL,5,15,'<p>sss</p>','<p>ss</p>',NULL,NULL,3,'2023-05-11 01:09:05','2023-05-11 01:09:05'),(43,'Toyota Innova','toyota-innova','uploads/product/1683792912_download (8).jpg',2,780000000,720000000,0,1,0,0,85,NULL,'s',NULL,NULL,5,14,'<p>ss</p>','<p>ss</p>',NULL,NULL,3,'2023-05-11 01:15:12','2023-05-11 01:15:12'),(44,'Mitsubishi Xpander','mitsubishi-xpander','uploads/product/1683792974_download (9).jpg',3,580000000,480000000,0,1,0,0,85,NULL,'s',NULL,NULL,5,14,'<p>s</p>','<p>s</p>',NULL,NULL,3,'2023-05-11 01:16:14','2023-05-11 01:16:14'),(45,'Suzuki Ertiga Hybrid','suzuki-ertiga-hybrid','uploads/product/1683793026_download (10).jpg',5,780000000,710000000,0,1,0,0,85,NULL,'s',NULL,NULL,0,0,'<p>s</p>','<p>s</p>',NULL,NULL,3,'2023-05-11 01:17:06','2023-05-11 01:17:06'),(46,'Suzuki XL7','suzuki-xl7','uploads/product/1683793137_download (11).jpg',3,779999999,780000000,0,1,0,0,85,NULL,NULL,NULL,NULL,0,0,'<p>f</p>','<p>f</p>',NULL,NULL,3,'2023-05-11 01:18:57','2023-05-11 01:19:42'),(47,'Toyota Hiace','toyota-hiace','uploads/product/1683793259_download (12).jpg',3,980000000,780000000,0,1,0,0,87,NULL,NULL,NULL,NULL,0,0,'<p>s</p>','<p>s</p>',NULL,NULL,3,'2023-05-11 01:20:59','2023-05-11 01:20:59'),(48,'Hyundai Starex','hyundai-starex','uploads/product/1683793322_download (13).jpg',7,920000000,880000000,0,1,0,0,87,NULL,NULL,NULL,NULL,0,0,'<p>s</p>','<p>s</p>',NULL,NULL,3,'2023-05-11 01:22:02','2023-05-11 01:22:02'),(49,'Ford Tourneo','ford-tourneo','uploads/product/1683793397_download (14).jpg',5,780000000,580000000,0,1,0,0,87,NULL,'s',NULL,NULL,0,0,'<p>s</p>','<p>s</p>',NULL,NULL,3,'2023-05-11 01:23:17','2023-05-11 01:23:17'),(50,'Toyota Gravia','toyota-gravia','uploads/product/1683793444_download (15).jpg',88,780000000,720000000,0,1,0,0,87,NULL,NULL,NULL,NULL,0,0,'<p>s</p>','<p>s</p>',NULL,NULL,3,'2023-05-11 01:24:04','2023-05-11 01:24:04'),(51,'Mercedes GLC 300 AMG 4Matic model 2019 siêu lướt','mercedes-glc-300-amg-4matic-model-2019-sieu-luot','uploads/product/1683793520_82f50ee8472618e4ec849cced74df507-2820836690489234805.jpg',67,780000000,720000000,0,1,0,0,88,NULL,NULL,NULL,NULL,0,0,'<p>s</p>','<p>s</p>',NULL,NULL,3,'2023-05-11 01:25:20','2023-05-11 01:25:20');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotline` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `introduce` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'Công Ty TNHH Hoàng Vinh .co,ltd','Q.Đống Đa , Hà Nội','Q.Long Biên, Hà Nội','uploads/setting/1590462650_logo.png','09283373755','18001166','000010','https://codedoan.com/','admin@gmail.com',NULL,NULL,'2023-05-11 02:00:14');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statistical`
--

DROP TABLE IF EXISTS `statistical`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `statistical` (
  `id` int NOT NULL AUTO_INCREMENT,
  `total_quantity` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `period` date NOT NULL,
  `id_user` int NOT NULL,
  `id_status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statistical`
--

LOCK TABLES `statistical` WRITE;
/*!40000 ALTER TABLE `statistical` DISABLE KEYS */;
INSERT INTO `statistical` VALUES (7,'3','300000','2022-05-22',22,3),(8,'2','1800000','2022-05-23',23,3),(9,'2','200000','2022-05-25',24,3),(10,'1','490000','2022-06-16',25,3),(11,'3','87000000','2023-03-17',26,3),(12,'1','410000000','2023-05-11',27,4),(13,'1','780000000','2023-05-11',28,3),(14,'1','800000000','2024-12-10',29,0),(15,'1','620000000','2024-12-11',30,1),(16,'1','410000000','2024-12-11',31,1),(17,'1','410000000','2024-12-11',32,1),(18,'1','620000000','2024-12-11',33,1),(19,'1','410000000','2026-04-21',34,2),(20,'1','410000000','2026-04-21',35,0),(21,'1','900000','2026-04-21',36,2);
/*!40000 ALTER TABLE `statistical` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'admin','admin@gmail.com',NULL,NULL,'$2y$12$AUY0Cjc6RB8htQH8AjN.7.DWJOPbXdNJhOE3POMsULp7emxJuzkpO','Y5WYHwS6NlpRX8Ecq7agZSq6Am4BmYwsTSH7MVgHnNGIvBnHOYPat6GQ89E4','2020-05-19 12:32:27','2023-05-11 01:59:42',1,'uploads/user/1683795582_dai-ly-giam-gia-Hyundai-Stargazer-gan-100-trieu-dong-5-1683736627-805-width740height493.jpg',1),(4,'Nguyen Van A','a@gmail.com',NULL,NULL,'$2y$10$DhRbNTwN2Y8V1/G9tB5K4OphXhy9AirGhc8nBq6Li9C7cDxe/mDDW',NULL,'2022-05-22 02:24:25','2022-05-22 02:24:25',2,'uploads/user/1653211465_girl-xinh-1-480x600.jpg',1),(6,'xxxx','adminx@gmail.com',NULL,NULL,'$2y$10$CniRT2oB/mKkDiVRQXNVluXvLpmaOxpdQ0qwcws8S9NAHI/xL98NO',NULL,'2023-05-11 01:59:27','2023-05-11 01:59:27',2,NULL,0),(7,'ff','adminf@gmail.com',NULL,NULL,'$2y$10$RP8xx0mxkeE/iuWvLYasSexCwIYb.TQbYuiexPe0SL2T0SbmGtyf.',NULL,'2023-05-11 02:00:04','2023-05-11 02:00:04',2,'uploads/user/1683795604_download (14).jpg',0),(8,'Đài Đỗ Anh','doanhdaigr5.2004@gmail.com','0325459901','3/2 quan 10','$2y$12$fXCYJdFHCcEFbZ/bftM2O.FcBpc12pN6hGGm0bxZHgS2cehaj.9z.',NULL,'2026-04-20 08:02:48','2026-04-21 03:54:28',0,NULL,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendors` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `position` int unsigned NOT NULL DEFAULT '0',
  `is_active` int unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `vendors_slug_unique` (`slug`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendors`
--

LOCK TABLES `vendors` WRITE;
/*!40000 ALTER TABLE `vendors` DISABLE KEYS */;
INSERT INTO `vendors` VALUES (14,'Mỹ','my','Vergency@gmail.com','098767876s5',NULL,'https://www.vergency.vn/','5/15 Tô Hiệu, Tân Thới Hòa, Tân Phú, Hồ Chí Minh.',0,1,'2022-05-22 01:54:31','2023-05-11 00:46:39'),(15,'Châu Âu','chau-au','hoang@gmail.com','0876545654','uploads/category/1653209774_logo_trangvangs.png','https://www.yellowpages.vn/','Viet Nam',0,1,'2022-05-22 01:56:14','2023-05-11 00:46:53'),(16,'Chau A','chau-a','a@gmail.com','09876787644',NULL,NULL,NULL,0,1,'2023-05-11 01:58:26','2023-05-11 01:58:26');
/*!40000 ALTER TABLE `vendors` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-21 23:15:30
