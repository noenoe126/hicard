-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for carappdb
DROP DATABASE IF EXISTS `carappdb`;
CREATE DATABASE IF NOT EXISTS `carappdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `carappdb`;

-- Dumping structure for table carappdb.budget_years
DROP TABLE IF EXISTS `budget_years`;
CREATE TABLE IF NOT EXISTS `budget_years` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.budget_years: ~32 rows (approximately)
REPLACE INTO `budget_years` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(26, '2000-2001', '2024-07-09 02:37:50', '2024-07-09 02:38:59'),
	(27, '2001-2002', '2024-07-09 02:39:15', '2024-07-09 02:39:15'),
	(28, '2002-2003', '2024-07-09 02:39:37', '2024-07-09 02:39:37'),
	(29, '2003-2004', '2024-07-09 02:39:50', '2024-07-09 02:39:50'),
	(30, '2004-2005', '2024-07-09 02:40:01', '2024-07-09 02:40:01'),
	(31, '2005-2006', '2024-07-09 02:41:15', '2024-07-09 02:41:15'),
	(32, '2006-2007', '2024-07-09 02:41:26', '2024-07-09 02:41:26'),
	(33, '2007-2008', '2024-07-09 02:41:40', '2024-07-09 02:41:40'),
	(34, '2008-2009', '2024-07-09 02:41:52', '2024-07-09 02:41:52'),
	(35, '2009-2010', '2024-07-09 02:42:17', '2024-07-09 02:42:17'),
	(36, '2010-2011', '2024-07-09 02:42:31', '2024-07-09 02:42:31'),
	(37, '2011-2012', '2024-07-09 02:42:45', '2024-07-09 02:42:45'),
	(38, '2012-2013', '2024-07-09 02:43:01', '2024-07-09 02:43:01'),
	(39, '2013-2014', '2024-07-09 02:43:15', '2024-07-09 02:43:15'),
	(40, '2014-2015', '2024-07-09 02:43:26', '2024-07-09 02:43:26'),
	(41, '2016-2017', '2024-07-09 02:43:39', '2024-07-09 02:43:39'),
	(42, '2018-2019', '2024-07-09 02:43:50', '2024-07-09 02:43:50'),
	(43, '2019-2020', '2024-07-09 02:44:02', '2024-07-09 02:44:02'),
	(44, '2020-2021', '2024-07-09 02:44:17', '2024-07-09 02:44:17'),
	(45, '2021-2022', '2024-07-09 02:44:35', '2024-07-09 02:44:35'),
	(46, '2022-2023', '2024-07-09 02:44:48', '2024-07-09 02:44:48'),
	(47, '2023-2024', '2024-07-09 02:45:02', '2024-07-09 02:45:02'),
	(48, '1985-1986', '2024-07-09 02:45:54', '2024-07-09 02:45:54'),
	(49, '1989-1990', '2024-07-09 02:46:10', '2024-07-09 02:46:10'),
	(50, '1990-1991', '2024-07-09 02:46:21', '2024-07-09 02:46:21'),
	(51, '1991-1992', '2024-07-09 02:46:41', '2024-07-09 02:46:41'),
	(52, '1992-1993', '2024-07-09 02:46:59', '2024-07-09 02:46:59'),
	(53, '1996-1997', '2024-07-09 02:47:19', '2024-07-09 02:47:19'),
	(54, '1997-1998', '2024-07-09 02:47:38', '2024-07-09 02:47:38'),
	(55, '1999-2000', '2024-07-09 02:47:57', '2024-07-09 02:47:57'),
	(56, '2024-2025', '2024-07-10 00:25:09', '2024-07-10 00:25:09'),
	(58, '2025-2026', '2024-07-12 00:10:36', '2024-07-12 00:10:36');

-- Dumping structure for table carappdb.buildingremarks
DROP TABLE IF EXISTS `buildingremarks`;
CREATE TABLE IF NOT EXISTS `buildingremarks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `buildingremark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `buildingid` int DEFAULT NULL,
  `created_user` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table carappdb.buildingremarks: ~9 rows (approximately)
REPLACE INTO `buildingremarks` (`id`, `buildingremark`, `buildingid`, `created_user`, `created_at`, `updated_at`) VALUES
	(8, 'To move the "Back" button to the top right corner of the page, you can use Bootstrap\'s grid system and the utility class justify-content-between. Here\'s how you can modify your code:', 3, 'noe', '2024-04-02 00:22:44', '2024-04-02 00:22:44'),
	(10, 'In order to show you the most relevant results, we have omitted some entries very similar to the 4 already displayed.\r\nIf you like, you can repeat the search with the omitted results included.', 3, 'noe', '2024-04-02 20:29:16', '2024-04-02 20:29:16'),
	(11, 'In order to show you the most relevant results, we have omitted some entries very similar to the 4 already displayed.\r\nIf you like, you can repeat the search with the omitted results included.', 17, 'noe', '2024-04-02 20:29:44', '2024-04-02 20:29:44'),
	(12, 'In order to show you the most relevant results, we have omitted some entries very similar to the 4 already displayed.\r\nIf you like, you can repeat the search with the omitted results included.', 15, 'noe', '2024-04-02 20:30:08', '2024-04-02 20:30:08'),
	(14, 'Incorrect Username/Email or Password: The user might have mistyped their username/email or password. Ensure that the user enters the correct credentials.', 16, 'noenoe', '2024-04-04 00:24:31', '2024-04-04 00:24:31'),
	(15, 'Incorrect Username/Email or Password: The user might have mistyped their username/email or password. Ensure that the user enters the correct credentials.', 14, 'noenoe', '2024-04-04 00:24:45', '2024-04-04 00:24:45'),
	(16, 'Incorrect Username/Email or Password: The user might have mistyped their username/email or password. Ensure that the user enters the correct credentials.', 14, 'noenoe', '2024-04-04 00:24:50', '2024-04-04 00:24:50'),
	(18, 'Change color', 28, 'admin', '2024-06-16 20:36:49', '2024-06-16 20:36:49'),
	(19, 'test', 34, 'admin', '2024-06-28 01:58:49', '2024-06-28 01:58:49');

-- Dumping structure for table carappdb.buildings
DROP TABLE IF EXISTS `buildings`;
CREATE TABLE IF NOT EXISTS `buildings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_division_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `township_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `live_building_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_type_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_fact_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_use` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `construction` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `use_period` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cost` decimal(15,2) NOT NULL,
  `building_old` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `building_situation_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `own_list` decimal(15,2) NOT NULL,
  `own_type_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `fund_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `history` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `type_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completed` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table carappdb.buildings: ~3 rows (approximately)
REPLACE INTO `buildings` (`id`, `organization_id`, `office_id`, `state_division_id`, `township_id`, `address`, `live_building_id`, `building_type_id`, `building_fact_id`, `current_use`, `construction`, `use_period`, `cost`, `building_old`, `building_situation_id`, `own_list`, `own_type_id`, `fund_id`, `history`, `type_id`, `photo`, `name`, `completed`, `created_at`, `updated_at`) VALUES
	(33, '31', '32', '63', '61', 'address', '23', '20', '29', '1', '2020', '5', 700.00, '3', '33', 1.00, '24', '19', '1', NULL, '1719554567issaya3.png', NULL, NULL, '2024-06-27 23:32:47', '2024-06-27 23:32:47'),
	(34, '32', '33', '65', '64', 'address1', '22', '20', '29', '1', '2021', '5', 100.00, '5', '33', 1.00, '24', '20', '1', NULL, '1719554938issaya6.png', NULL, NULL, '2024-06-27 23:38:58', '2024-06-27 23:38:58'),
	(35, '30', '32', '65', '61', 'vdfd', '22', '19', '29', '1', '2020', '1', 344.00, '2', '31', 1.00, '21', '19', '0', NULL, '1719564857issaya2.png', NULL, NULL, '2024-06-28 02:23:48', '2024-06-28 02:24:17');

-- Dumping structure for table carappdb.building_facts
DROP TABLE IF EXISTS `building_facts`;
CREATE TABLE IF NOT EXISTS `building_facts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.building_facts: ~0 rows (approximately)
REPLACE INTO `building_facts` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(29, 'အထပ်', '2024-06-20 09:15:44', '2024-06-20 09:15:44');

-- Dumping structure for table carappdb.building_situations
DROP TABLE IF EXISTS `building_situations`;
CREATE TABLE IF NOT EXISTS `building_situations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.building_situations: ~4 rows (approximately)
REPLACE INTO `building_situations` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(29, 'ပြုပြင်ရန်။', '2024-06-20 09:54:50', '2024-06-20 09:56:22'),
	(30, 'ပြုပြင်ရန်မလို။', '2024-06-20 09:55:06', '2024-06-20 09:56:09'),
	(31, 'ဖျက်သိမ်းရမည်။', '2024-06-20 09:55:17', '2024-06-20 09:56:00'),
	(33, 'ဖျက်သိမ်းရန်ဆောင်ရွက်ဆဲ။', '2024-06-20 09:58:18', '2024-06-20 09:58:18');

-- Dumping structure for table carappdb.building_types
DROP TABLE IF EXISTS `building_types`;
CREATE TABLE IF NOT EXISTS `building_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.building_types: ~3 rows (approximately)
REPLACE INTO `building_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(18, 'သံကူ/ ကွန်ကရစ်/ သံထည်', '2024-06-20 07:50:39', '2024-06-20 07:50:39'),
	(19, 'အုတ်ညှပ်/ သစ်သား', '2024-06-20 07:52:05', '2024-06-20 07:52:05'),
	(20, 'ယာယီ', '2024-06-20 07:52:25', '2024-06-20 07:52:25');

-- Dumping structure for table carappdb.capacities
DROP TABLE IF EXISTS `capacities`;
CREATE TABLE IF NOT EXISTS `capacities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.capacities: ~2 rows (approximately)
REPLACE INTO `capacities` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(59, '4P', '2024-06-20 23:56:35', '2024-06-20 23:56:35'),
	(60, '5P', '2024-06-20 23:56:43', '2024-06-20 23:56:43');

-- Dumping structure for table carappdb.carremarks
DROP TABLE IF EXISTS `carremarks`;
CREATE TABLE IF NOT EXISTS `carremarks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `remark` text,
  `carid` int DEFAULT NULL,
  `created_user` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table carappdb.carremarks: ~9 rows (approximately)
REPLACE INTO `carremarks` (`id`, `remark`, `carid`, `created_user`, `created_at`, `updated_at`) VALUES
	(80, 'စမ်းသည်။', 93, 'admin', '2024-06-25 02:40:32', '2024-06-25 02:40:32'),
	(81, 'ပြန်စမ်းသည်။', 91, 'admin', '2024-06-25 02:41:32', '2024-06-25 02:41:32'),
	(82, 'remark', 90, 'admin', '2024-06-25 02:42:03', '2024-06-25 02:42:03'),
	(83, 'REMARK', 89, 'admin', '2024-06-25 02:42:23', '2024-06-25 02:42:23'),
	(84, 'အသစ်ရောက်', 94, 'admin', '2024-06-25 02:55:07', '2024-06-25 02:55:07'),
	(85, 'စမ်းသည်။', 89, 'admin', '2024-06-25 03:29:09', '2024-06-25 03:29:09'),
	(86, 'Define the Relationship: Ensure that the relationship between Car and Remark is defined in the Car model.', 92, 'admin', '2024-06-25 03:35:29', '2024-06-25 03:35:29'),
	(87, 'အသစ်တိုး', 96, 'admin', '2024-06-28 00:41:27', '2024-06-28 00:41:27'),
	(88, 'အသစ်တိုး', 116, 'admin', '2024-07-12 00:43:00', '2024-07-12 00:43:00');

-- Dumping structure for table carappdb.cars
DROP TABLE IF EXISTS `cars`;
CREATE TABLE IF NOT EXISTS `cars` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `plate_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturer_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget_year_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `make_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `build_type_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` year DEFAULT NULL,
  `wheel` int DEFAULT NULL,
  `engine_power` int DEFAULT NULL,
  `capacity` int DEFAULT NULL,
  `weight` int DEFAULT NULL,
  `fuel_type_id` int DEFAULT NULL,
  `body_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engine_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proc_date` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_exp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `township_id` int DEFAULT NULL,
  `state_division_id` int DEFAULT NULL,
  `vehicle_use` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade_id` int DEFAULT NULL,
  `receive_id` int DEFAULT NULL,
  `mileage` int DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licence` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `location_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.cars: ~4 rows (approximately)
REPLACE INTO `cars` (`id`, `plate_number`, `manufacturer_id`, `model_id`, `budget_year_id`, `make_id`, `build_type_id`, `year`, `wheel`, `engine_power`, `capacity`, `weight`, `fuel_type_id`, `body_no`, `engine_no`, `proc_date`, `license_exp`, `township_id`, `state_division_id`, `vehicle_use`, `condition`, `grade_id`, `receive_id`, `mileage`, `color`, `licence`, `location_id`, `photo`, `created_at`, `updated_at`) VALUES
	(113, '2Z-1111', '24', '13', '56', NULL, '67', '2020', 4, 1000, 8, 1500, 62, 'yuj7', 'mnty', '2023', '30-06-2024', 65, 66, 'R', 'S', 70, 63, NULL, NULL, '1', NULL, 'unavailable_image.png', '2024-07-11 21:18:56', '2024-07-11 21:19:17'),
	(114, '1A-0000', '24', '15', '27', NULL, '67', '2020', 4, 1300, 3, 12345, 63, 'kjhg', 'jhgf', '2027', '03-07-2024', 61, 63, 'J', 'RN', 69, 63, NULL, NULL, NULL, NULL, 'unavailable_image.png', '2024-07-11 21:39:52', '2024-07-11 21:39:52'),
	(115, '3S-1234', '24', '14', '48', NULL, '67', '2024', 3, 900, 0, 88, 62, 'dew3', 'sqkjhss6', '2019', '03-07-2024', 64, 65, 'R', 'RP', 69, 63, NULL, NULL, '1', NULL, 'unavailable_image.png', '2024-07-11 21:43:53', '2024-07-11 21:43:53'),
	(116, 'plate no', '24', '14', '55', NULL, '66', '2024', 8, 78, 9, 1000, 62, 'uio89', 'yui', '2027', '12-07-2024', 64, 66, 'R', 'S', 69, 63, NULL, NULL, '1', NULL, 'unavailable_image.png', '2024-07-12 00:15:36', '2024-07-12 00:41:45');

-- Dumping structure for table carappdb.carusers
DROP TABLE IF EXISTS `carusers`;
CREATE TABLE IF NOT EXISTS `carusers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `car_id` int NOT NULL DEFAULT '0',
  `staff_id` int NOT NULL DEFAULT '0',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `create_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `update_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table carappdb.carusers: ~6 rows (approximately)
REPLACE INTO `carusers` (`id`, `car_id`, `staff_id`, `start_date`, `end_date`, `status`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
	(124, 91, 10, '2024-05-30', NULL, NULL, 'admin', '', '2024-06-23 03:11:36', '2024-06-23 03:11:36'),
	(125, 90, 11, '2024-06-03', NULL, NULL, 'admin', '', '2024-06-23 03:18:08', '2024-06-23 03:18:08'),
	(126, 89, 12, '2024-06-11', NULL, NULL, 'admin', '', '2024-06-23 03:20:47', '2024-06-23 03:20:47'),
	(140, 89, 10, '2024-06-11', '2024-06-26', NULL, 'admin', '', '2024-06-24 12:12:31', '2024-06-24 12:12:31'),
	(141, 93, 11, '2024-06-25', '2024-07-01', NULL, 'admin', '', '2024-06-24 23:18:45', '2024-06-24 23:19:07'),
	(143, 94, 12, '2024-06-21', NULL, NULL, 'admin', '', '2024-06-25 02:54:44', '2024-06-25 02:54:44');

-- Dumping structure for table carappdb.car_addresses
DROP TABLE IF EXISTS `car_addresses`;
CREATE TABLE IF NOT EXISTS `car_addresses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `car_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `car_user_dept` text,
  `car_id` int DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_user` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.car_addresses: ~13 rows (approximately)
REPLACE INTO `car_addresses` (`id`, `car_address`, `car_user_dept`, `car_id`, `status`, `created_user`, `created_at`, `updated_at`) VALUES
	(1, 'No.128, Baho Road, Mon', 'mon', 90, 0, 'admin', '2024-06-23 02:16:48', '2024-06-23 02:33:52'),
	(2, 'NO. 77, Main Road, Yangon', 'yangon', 90, 0, 'admin', '2024-06-23 02:25:01', '2024-06-23 02:33:52'),
	(4, 'NO. 123, Main Road, NPT', 'union', 90, 1, 'admin', '2024-06-23 02:33:52', '2024-06-23 02:33:52'),
	(5, 'No. 111, Main Road, YGN', 'yangon', 89, 1, 'admin', '2024-06-23 02:34:40', '2024-06-23 02:34:40'),
	(6, 'No.34, Baho Road, Yangon', 'yangon', 91, 1, 'admin', '2024-06-23 02:37:28', '2024-06-23 02:37:28'),
	(8, 'Mawlamyine, Mon State', 'mon', 93, 0, 'admin', '2024-06-24 08:13:12', '2024-06-24 08:56:37'),
	(9, 'Mudon,Mon', 'mon', 93, 1, 'admin', '2024-06-24 08:56:37', '2024-06-24 08:56:37'),
	(10, 'နေပြည်တော်', 'union', 92, 1, 'admin', '2024-06-24 11:47:49', '2024-06-24 11:50:57'),
	(12, 'Myanmar', 'kachin', 94, 0, 'admin', '2024-06-25 02:53:12', '2024-06-25 03:04:00'),
	(13, 'Yangon', 'chin', 94, 0, 'admin', '2024-06-25 02:53:45', '2024-06-25 03:04:00'),
	(14, 'လိပ်စာ', 'sagaing', 94, 1, 'admin', '2024-06-25 03:04:00', '2024-06-25 03:04:00'),
	(15, '-', 'union', 112, 1, 'admin', '2024-07-11 21:04:40', '2024-07-11 21:04:40'),
	(16, '-', 'yangon', 116, 1, 'admin', '2024-07-12 00:42:47', '2024-07-12 00:42:47');

-- Dumping structure for table carappdb.car_models
DROP TABLE IF EXISTS `car_models`;
CREATE TABLE IF NOT EXISTS `car_models` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table carappdb.car_models: ~11 rows (approximately)
REPLACE INTO `car_models` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(12, 'Fit', '2024-04-24 01:35:55', '2024-06-12 22:06:15'),
	(13, 'Mark II', '2024-04-24 01:36:20', '2024-06-12 22:23:42'),
	(14, 'Swift', '2024-04-24 01:36:37', '2024-04-24 01:36:37'),
	(15, 'Wish', '2024-04-24 01:36:51', '2024-04-24 01:36:51'),
	(16, 'Ciaz', '2024-04-24 01:37:09', '2024-04-24 01:37:09'),
	(17, 'Probox', '2024-04-24 01:37:25', '2024-04-24 01:37:25'),
	(18, 'Belta', '2024-04-24 01:37:40', '2024-04-24 01:37:40'),
	(19, 'Alphard', '2024-04-24 01:37:53', '2024-04-24 01:37:53'),
	(20, 'Ertiga', '2024-04-24 01:38:07', '2024-06-16 20:58:54'),
	(22, 'Insigth', '2024-06-16 20:58:25', '2024-06-16 20:58:25'),
	(25, 'Noteel 12', '2024-06-28 00:40:18', '2024-06-28 00:40:18');

-- Dumping structure for table carappdb.departments
DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.departments: ~6 rows (approximately)
REPLACE INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(62, 'e-Geo', '2024-06-20 01:55:11', '2024-06-20 01:55:11'),
	(63, 'သုတေ', '2024-06-20 01:55:33', '2024-06-20 01:55:33'),
	(64, 'ပြစ်မှု', '2024-06-20 01:55:48', '2024-06-20 01:55:48'),
	(65, 'တရားမ', '2024-06-20 01:56:19', '2024-06-20 01:56:19'),
	(66, 'လုပ်ထုံး', '2024-06-20 01:56:50', '2024-06-20 01:56:50'),
	(67, 'စစ်ဆေး', '2024-06-20 01:57:09', '2024-06-20 01:57:09');

-- Dumping structure for table carappdb.engine_powers
DROP TABLE IF EXISTS `engine_powers`;
CREATE TABLE IF NOT EXISTS `engine_powers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.engine_powers: ~2 rows (approximately)
REPLACE INTO `engine_powers` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(57, '1498 CC', '2024-06-20 23:37:43', '2024-06-20 23:37:43'),
	(58, '1339 CC', '2024-06-20 23:38:02', '2024-06-20 23:38:02');

-- Dumping structure for table carappdb.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table carappdb.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table carappdb.fuel_types
DROP TABLE IF EXISTS `fuel_types`;
CREATE TABLE IF NOT EXISTS `fuel_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.fuel_types: ~3 rows (approximately)
REPLACE INTO `fuel_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(62, 'Octane', '2024-06-21 00:57:22', '2024-06-22 16:10:01'),
	(63, 'fuel 1', '2024-06-25 00:08:06', '2024-06-25 00:08:06'),
	(64, 'fuel 2', '2024-06-25 00:08:15', '2024-06-25 00:08:15');

-- Dumping structure for table carappdb.funds
DROP TABLE IF EXISTS `funds`;
CREATE TABLE IF NOT EXISTS `funds` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table carappdb.funds: ~3 rows (approximately)
REPLACE INTO `funds` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(19, 'ပြည်ထောင်စု', '2024-06-20 11:41:43', '2024-06-20 11:41:56'),
	(20, 'တိုင်း/ ပြည်နယ်', '2024-06-20 11:42:13', '2024-06-20 11:42:13'),
	(21, 'ပြည်ပချေးငွေ', '2024-06-20 11:42:27', '2024-06-20 11:42:27');

-- Dumping structure for table carappdb.grades
DROP TABLE IF EXISTS `grades`;
CREATE TABLE IF NOT EXISTS `grades` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.grades: ~5 rows (approximately)
REPLACE INTO `grades` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(66, 'Class I', '2024-06-28 00:39:17', '2024-06-28 00:39:17'),
	(67, 'Class II', '2024-06-28 00:39:27', '2024-06-28 00:39:27'),
	(68, 'Class III', '2024-06-28 00:39:34', '2024-06-28 00:39:34'),
	(69, 'Class IV', '2024-06-28 00:39:43', '2024-06-28 00:39:43'),
	(70, 'Class V', '2024-06-28 00:39:49', '2024-06-28 00:39:49');

-- Dumping structure for table carappdb.landremarks
DROP TABLE IF EXISTS `landremarks`;
CREATE TABLE IF NOT EXISTS `landremarks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `landremark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `landid` int DEFAULT NULL,
  `created_user` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table carappdb.landremarks: ~19 rows (approximately)
REPLACE INTO `landremarks` (`id`, `landremark`, `landid`, `created_user`, `created_at`, `updated_at`) VALUES
	(1, 'n', 7, 'noe', '2024-03-29 02:01:39', '2024-03-29 02:01:39'),
	(2, 'n', 7, 'noe', '2024-03-29 02:01:45', '2024-03-29 02:01:45'),
	(3, 'k', 7, 'noe', '2024-03-29 02:19:46', '2024-03-29 02:19:46'),
	(4, 'm', 7, 'noe', '2024-03-29 03:00:47', '2024-03-29 03:00:47'),
	(5, 'ffff', 7, 'noe', '2024-03-30 03:36:09', '2024-03-30 03:36:09'),
	(8, 'dddd', NULL, 'noe', '2024-03-31 21:38:51', '2024-03-31 21:38:51'),
	(9, 'dddd', NULL, 'noe', '2024-03-31 21:41:31', '2024-03-31 21:41:31'),
	(10, 'jj', NULL, 'noe', '2024-03-31 21:45:11', '2024-03-31 21:45:11'),
	(11, 'l', NULL, 'noe', '2024-03-31 21:45:51', '2024-03-31 21:45:51'),
	(12, 'l', NULL, 'noe', '2024-03-31 21:46:46', '2024-03-31 21:46:46'),
	(13, 'l', NULL, 'noe', '2024-03-31 21:50:09', '2024-03-31 21:50:09'),
	(14, 'l', NULL, 'noe', '2024-03-31 21:51:34', '2024-03-31 21:51:34'),
	(15, 'l', NULL, 'noe', '2024-03-31 21:55:10', '2024-03-31 21:55:10'),
	(16, 'oo', NULL, 'noe', '2024-03-31 21:55:32', '2024-03-31 21:55:32'),
	(17, 'oo', NULL, 'noe', '2024-03-31 22:00:37', '2024-03-31 22:00:37'),
	(27, 'In order to show you the most relevant results, we have omitted some entries very similar to the 4 already displayed.\r\nIf you like, you can repeat the search with the omitted results included.', 9, 'noe', '2024-04-02 20:30:36', '2024-04-02 20:30:36'),
	(28, 'Incorrect Username/Email or Password: The user might have mistyped their username/email or password. Ensure that the user enters the correct credentials.', 10, 'noenoe', '2024-04-04 00:22:53', '2024-04-04 00:22:53'),
	(30, 'paint', 15, 'admin', '2024-06-15 20:07:22', '2024-06-15 20:07:22'),
	(31, 'ပြင်သည်။', 15, 'admin', '2024-06-19 09:14:42', '2024-06-19 09:14:42');

-- Dumping structure for table carappdb.lands
DROP TABLE IF EXISTS `lands`;
CREATE TABLE IF NOT EXISTS `lands` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table carappdb.lands: ~0 rows (approximately)
REPLACE INTO `lands` (`id`, `name`, `address`, `owner`, `area`, `photo`, `created_at`, `updated_at`) VALUES
	(15, 'ရုံးအမှတ် ၂', 'No.123, Baho Road, NPT', 'government_land', '3400 sqft', '1718462008istockphoto-1404294992-612x612.jpg', '2024-06-15 08:03:28', '2024-06-15 20:07:02');

-- Dumping structure for table carappdb.live_buildings
DROP TABLE IF EXISTS `live_buildings`;
CREATE TABLE IF NOT EXISTS `live_buildings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.live_buildings: ~9 rows (approximately)
REPLACE INTO `live_buildings` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(19, 'ကျောင်း', '2024-06-20 02:52:01', '2024-06-20 02:52:01'),
	(20, 'အိမ်', '2024-06-20 02:52:10', '2024-06-20 02:52:10'),
	(21, 'ဆေးရုံ', '2024-06-20 02:52:25', '2024-06-20 02:52:25'),
	(22, 'ဟိုတယ်', '2024-06-20 02:52:38', '2024-06-20 02:52:38'),
	(23, 'သင်တန်းသားအိပ်ဆောင်', '2024-06-20 02:53:05', '2024-06-20 02:53:05'),
	(24, 'ဧည့်ရိပ်သာ', '2024-06-20 02:57:54', '2024-06-20 02:57:54'),
	(25, 'ဝန်ထမ်းအိမ်ရာ', '2024-06-20 02:58:45', '2024-06-27 22:57:25'),
	(27, 'ရုံး', '2024-06-20 03:01:06', '2024-06-20 03:01:06'),
	(28, 'အခြား', '2024-06-20 03:01:13', '2024-06-20 03:01:54');

-- Dumping structure for table carappdb.locations
DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.locations: ~4 rows (approximately)
REPLACE INTO `locations` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(22, 'Location A', '2024-04-23 06:05:50', '2024-06-14 23:25:32'),
	(56, 'Location B', '2024-06-14 23:25:42', '2024-06-14 23:25:42'),
	(57, 'Location C', '2024-06-16 20:56:25', '2024-06-16 20:56:25'),
	(58, 'Location D', '2024-06-16 20:56:39', '2024-06-16 20:56:46');

-- Dumping structure for table carappdb.makes
DROP TABLE IF EXISTS `makes`;
CREATE TABLE IF NOT EXISTS `makes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table carappdb.makes: ~5 rows (approximately)
REPLACE INTO `makes` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Japan', '2024-04-24 00:44:10', '2024-06-12 22:22:03'),
	(2, 'Germany', '2024-04-24 01:41:14', '2024-04-24 01:41:14'),
	(3, 'United States', '2024-04-24 01:41:34', '2024-04-24 01:41:34'),
	(4, 'South Korea', '2024-04-24 01:42:20', '2024-04-24 01:42:20'),
	(5, 'China', '2024-04-24 01:42:44', '2024-04-24 01:42:44');

-- Dumping structure for table carappdb.manufacturers
DROP TABLE IF EXISTS `manufacturers`;
CREATE TABLE IF NOT EXISTS `manufacturers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table carappdb.manufacturers: ~33 rows (approximately)
REPLACE INTO `manufacturers` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(22, 'Ford', '2024-04-23 06:05:50', '2024-04-23 06:32:14'),
	(23, 'Volkswagen', '2024-04-23 06:06:17', '2024-04-23 06:06:17'),
	(24, 'Nissan', '2024-04-23 06:06:42', '2024-04-23 06:06:42'),
	(25, 'Mercedes-Benz', '2024-04-23 06:07:10', '2024-04-23 06:07:10'),
	(26, 'BMW', '2024-04-23 06:07:32', '2024-04-23 06:07:32'),
	(27, 'Audi', '2024-04-23 06:07:57', '2024-04-23 06:07:57'),
	(28, 'Hyundai', '2024-04-23 06:08:21', '2024-04-23 06:08:21'),
	(29, 'Kia', '2024-04-23 06:09:01', '2024-04-23 06:09:01'),
	(30, 'Subaru', '2024-04-23 06:09:17', '2024-04-23 06:09:17'),
	(31, 'Mazda', '2024-04-23 06:09:38', '2024-04-23 06:09:38'),
	(32, 'Volvo', '2024-04-23 06:09:55', '2024-04-23 06:09:55'),
	(33, 'Tesla', '2024-04-23 06:10:59', '2024-04-23 06:10:59'),
	(34, 'Lexus', '2024-04-23 06:11:24', '2024-04-23 06:11:24'),
	(35, 'Acura', '2024-04-23 06:13:05', '2024-04-23 06:13:05'),
	(36, 'Jeep', '2024-04-23 06:13:23', '2024-04-23 06:13:23'),
	(37, 'Chrysler', '2024-04-23 06:14:37', '2024-04-23 06:14:37'),
	(38, 'Dodge', '2024-04-23 06:15:05', '2024-04-23 06:15:05'),
	(39, 'Ram', '2024-04-23 06:15:28', '2024-04-23 06:15:28'),
	(40, 'Buick', '2024-04-23 06:15:49', '2024-04-23 06:15:49'),
	(41, 'Cadillac', '2024-04-23 06:16:10', '2024-04-23 06:16:10'),
	(42, 'GMC', '2024-04-23 06:16:41', '2024-04-23 06:16:41'),
	(43, 'Lincoln', '2024-04-23 06:17:17', '2024-04-23 06:17:17'),
	(44, 'Porsche', '2024-04-23 06:17:33', '2024-04-23 06:17:33'),
	(45, 'Ferrari', '2024-04-23 06:17:49', '2024-04-23 06:17:49'),
	(46, 'Maserati', '2024-04-23 06:18:17', '2024-04-23 06:18:17'),
	(47, 'Jaguar', '2024-04-23 06:18:37', '2024-04-23 06:18:37'),
	(48, 'Land Rover', '2024-04-23 06:18:55', '2024-04-23 06:18:55'),
	(49, 'Mini', '2024-04-23 06:19:12', '2024-04-23 06:19:12'),
	(50, 'Fiat', '2024-04-23 06:19:26', '2024-04-23 06:19:26'),
	(51, 'Alfa Romeo', '2024-04-23 06:19:54', '2024-04-23 06:19:54'),
	(52, 'Chevrolet', '2024-04-23 09:21:35', '2024-04-23 09:21:35'),
	(53, 'Honda', '2024-04-23 09:24:03', '2024-06-16 20:55:21'),
	(56, 'Toyota', '2024-06-16 20:55:04', '2024-06-16 20:55:04');

-- Dumping structure for table carappdb.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table carappdb.migrations: ~21 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(22, '2024_01_29_141804_create_cars_table', 2),
	(23, '2024_01_31_034938_add_mileage_to_cars_table', 3),
	(24, '2024_01_31_052918_create_manufacturer_table', 4),
	(25, '2024_02_01_062122_add_photo_to_cars_table', 5),
	(26, '2024_03_01_091656_create_lands_table', 6),
	(27, '2024_03_04_053600_add_area_to_lands_table', 7),
	(28, '2024_03_04_054308_add_photo_to_lands_table', 8),
	(29, '2024_03_04_122208_create_buildings_table', 9),
	(30, '2024_03_05_034802_add_construction_to_buildings_table', 10),
	(31, '2024_03_05_035109_add_completed_to_buildings_table', 11),
	(32, '2024_03_05_035722_add_photo_to_buildings_table', 12),
	(35, '2024_03_06_052616_add_cost_to_buildings_table', 13),
	(36, '2024_03_06_064018_create_types_table', 14),
	(37, '2024_04_25_054620_add_enabled_to_users_table', 15),
	(38, '2024_06_13_131734_modify_cost_column_in_buildings_table', 16),
	(39, '2024_06_18_052949_create_staff_table', 17),
	(40, '2024_06_18_080354_add_status_to_staff_table', 18);

-- Dumping structure for table carappdb.offices
DROP TABLE IF EXISTS `offices`;
CREATE TABLE IF NOT EXISTS `offices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.offices: ~2 rows (approximately)
REPLACE INTO `offices` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(32, 'Office 1', '2024-06-25 22:22:37', '2024-06-25 22:22:37'),
	(33, 'Office 2', '2024-06-25 22:22:45', '2024-06-25 22:22:57');

-- Dumping structure for table carappdb.organizations
DROP TABLE IF EXISTS `organizations`;
CREATE TABLE IF NOT EXISTS `organizations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.organizations: ~3 rows (approximately)
REPLACE INTO `organizations` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(30, 'Organization 1', '2024-06-25 21:58:07', '2024-06-25 21:58:07'),
	(31, 'Organization 2', '2024-06-25 21:58:18', '2024-06-25 21:58:29'),
	(32, 'Organization 3', '2024-06-27 23:37:44', '2024-06-27 23:37:44');

-- Dumping structure for table carappdb.own_types
DROP TABLE IF EXISTS `own_types`;
CREATE TABLE IF NOT EXISTS `own_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.own_types: ~3 rows (approximately)
REPLACE INTO `own_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(21, 'ဌာနပိုင်', '2024-06-20 10:53:57', '2024-06-20 10:53:57'),
	(24, 'အငှား', '2024-06-20 10:54:55', '2024-06-20 10:54:55'),
	(25, 'ပြည်သူပိုင်', '2024-06-20 10:55:03', '2024-06-20 10:55:03');

-- Dumping structure for table carappdb.password_reset_tokens
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table carappdb.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table carappdb.personal_access_tokens
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table carappdb.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table carappdb.positions
DROP TABLE IF EXISTS `positions`;
CREATE TABLE IF NOT EXISTS `positions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.positions: ~0 rows (approximately)
REPLACE INTO `positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(61, 'ညွှန်ကြားရေးမှူး', '2024-06-20 01:58:38', '2024-06-20 01:58:38');

-- Dumping structure for table carappdb.receives
DROP TABLE IF EXISTS `receives`;
CREATE TABLE IF NOT EXISTS `receives` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.receives: ~0 rows (approximately)
REPLACE INTO `receives` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(63, 'Issue', '2024-06-21 02:22:43', '2024-06-21 02:22:43');

-- Dumping structure for table carappdb.staff
DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_id` bigint unsigned NOT NULL,
  `position_id` bigint unsigned NOT NULL,
  `nrc_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `staff_dept_id_foreign` (`dept_id`),
  KEY `staff_position_id_foreign` (`position_id`),
  CONSTRAINT `staff_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `staff_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table carappdb.staff: ~5 rows (approximately)
REPLACE INTO `staff` (`id`, `name`, `dept_id`, `position_id`, `nrc_no`, `created_at`, `updated_at`, `status`) VALUES
	(10, 'ဒေါ်မာလာမော်', 65, 61, '၁၀/တတတ(နိုင်)၁၂၃၄၅၆', '2024-06-20 02:00:21', '2024-06-24 08:39:27', 1),
	(11, 'ဦးကိုကိုလွင်', 62, 61, '၁၁/ကကက(နိုင်)၆၅၄၃၂၁', '2024-06-20 02:02:41', '2024-06-24 07:52:00', 1),
	(12, 'ဒေါ်အေး', 66, 61, '၂၂/ဖဖဖ(n)12345', '2024-06-23 03:19:56', '2024-06-23 03:19:56', 1),
	(13, 'ဦးဘ', 67, 61, '၁၀/ဘဘဘ၁၂၃၄၅၆', '2024-06-24 07:53:10', '2024-06-24 07:53:10', 1),
	(14, 'Daw Hla Hla', 64, 61, 'oo1234rer', '2024-06-24 08:37:05', '2024-06-24 08:37:05', 1);

-- Dumping structure for table carappdb.state_divisions
DROP TABLE IF EXISTS `state_divisions`;
CREATE TABLE IF NOT EXISTS `state_divisions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.state_divisions: ~3 rows (approximately)
REPLACE INTO `state_divisions` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(63, 'ရန်ကုန်တိုင်းဒေသကြီး', '2024-06-21 01:37:02', '2024-06-28 01:20:36'),
	(65, 'တနင်္သာရီတိုင်းဒေသကြီး', '2024-06-22 15:53:31', '2024-06-28 01:20:11'),
	(66, 'နေပြည်တော်', '2024-06-28 00:38:51', '2024-06-28 00:38:51');

-- Dumping structure for table carappdb.townships
DROP TABLE IF EXISTS `townships`;
CREATE TABLE IF NOT EXISTS `townships` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.townships: ~4 rows (approximately)
REPLACE INTO `townships` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(61, 'ထားဝယ်မြို့', '2024-06-21 01:19:12', '2024-06-21 01:19:12'),
	(62, 'မြိတ်မြို့', '2024-06-21 01:19:56', '2024-06-21 01:19:56'),
	(64, 'ဘုတ်ပြင်းမြို့', '2024-06-22 15:52:09', '2024-06-22 16:10:21'),
	(65, 'ဥတ္တရသီရိမြို့နယ်', '2024-06-28 00:38:32', '2024-06-28 00:38:32');

-- Dumping structure for table carappdb.types
DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.types: ~3 rows (approximately)
REPLACE INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(18, 'သံကူ/ ကွန်ကရစ်/ သံထည်', '2024-06-20 07:50:39', '2024-06-20 07:50:39'),
	(19, 'အုတ်ညှပ်/ သစ်သား', '2024-06-20 07:52:05', '2024-06-20 07:52:05'),
	(20, 'ယာယီ', '2024-06-20 07:52:25', '2024-06-20 07:52:25');

-- Dumping structure for table carappdb.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table carappdb.users: ~4 rows (approximately)
REPLACE INTO `users` (`id`, `fullname`, `email`, `username`, `role`, `email_verified_at`, `password`, `position`, `dept`, `remember_token`, `created_at`, `updated_at`) VALUES
	(45, 'Admin', 'admin@gmail.com', 'admin', 'admin', NULL, '$2y$12$4uDP13XYo7yUfu9wRUq77eypvQtDvUr7l10M3/vhY9kyXSjZ4gtxW', '-', '-', NULL, '2024-04-22 01:54:26', '2024-06-16 21:04:50'),
	(54, 'User 1', 'user1@gmail.com', 'user1', 'uer', NULL, '$2y$12$kpduS55qg/d3VPBk5JPWTuSrQNwasThIuCAf4pZ8nqsj818TADOk.', '-', '-', NULL, '2024-06-16 21:11:23', '2024-06-16 21:11:23'),
	(55, 'User 2', 'user2@gmail.com', 'user2', 'uer', NULL, '$2y$12$U7TUHqOCm422SZ48qrUFT.Yx3TX1VBNpToU5LJHZrsz6lGLnmmVi6', 'position', 'department', NULL, '2024-06-16 21:12:50', '2024-06-16 21:12:50'),
	(56, 'Noe Noe', 'noenoe@gmail.com', 'noenoe', 'admin', NULL, '$2y$12$Gjp.njf5rqp7001fy9wZcenMkOP.6160.KIBvN6da6o5h0nzUqHiO', '-', '-', NULL, '2024-06-16 21:13:35', '2024-06-16 21:16:12');

-- Dumping structure for table carappdb.vehicle_types
DROP TABLE IF EXISTS `vehicle_types`;
CREATE TABLE IF NOT EXISTS `vehicle_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.vehicle_types: ~2 rows (approximately)
REPLACE INTO `vehicle_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(66, 'Hatch Back', '2024-06-22 16:01:06', '2024-06-22 16:01:06'),
	(67, 'Station Wagon', '2024-06-22 16:01:25', '2024-06-22 16:01:25');

-- Dumping structure for table carappdb.wheels
DROP TABLE IF EXISTS `wheels`;
CREATE TABLE IF NOT EXISTS `wheels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table carappdb.wheels: ~2 rows (approximately)
REPLACE INTO `wheels` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(57, '4W', '2024-06-20 23:08:31', '2024-06-20 23:08:31'),
	(58, '6W', '2024-06-20 23:08:58', '2024-06-20 23:08:58');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
