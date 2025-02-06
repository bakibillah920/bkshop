-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.7.0.6850
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table bkshop.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `store_id` bigint(20) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table bkshop.categories: ~4 rows (approximately)
DELETE FROM `categories`;
INSERT INTO `categories` (`id`, `name`, `store_id`, `status`, `created_at`, `updated_at`) VALUES
	(5, 'C One', 1, 'active', '2025-02-06 10:14:11', '2025-02-06 11:48:00'),
	(6, 'C Two', 1, 'active', '2025-02-06 11:46:18', '2025-02-06 11:46:18'),
	(7, 'C Three', 2, 'active', '2025-02-06 11:47:26', '2025-02-06 11:47:26'),
	(8, 'C Four', 2, 'active', '2025-02-06 11:47:48', '2025-02-06 11:47:48');

-- Dumping structure for table bkshop.company_contacts
CREATE TABLE IF NOT EXISTS `company_contacts` (
  `id` bigint(20) unsigned NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `facebook_page_link` varchar(255) DEFAULT NULL,
  `facebook_group_link` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table bkshop.company_contacts: ~1 rows (approximately)
DELETE FROM `company_contacts`;
INSERT INTO `company_contacts` (`id`, `phone`, `whatsapp`, `facebook_page_link`, `facebook_group_link`, `email`, `created_at`, `updated_at`) VALUES
	(1, '01715414469', '01715414469', NULL, '', 'bakibillah920@gmail.com', NULL, NULL);

-- Dumping structure for table bkshop.company_infos
CREATE TABLE IF NOT EXISTS `company_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table bkshop.company_infos: ~1 rows (approximately)
DELETE FROM `company_infos`;
INSERT INTO `company_infos` (`id`, `name`, `title`, `logo`, `address`, `created_at`, `updated_at`) VALUES
	(1, 'Bkshop', 'Bkshop', 'images/seeder/logo.png', 'Tangail,Dhaka', NULL, NULL);

-- Dumping structure for table bkshop.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table bkshop.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping structure for table bkshop.features
CREATE TABLE IF NOT EXISTS `features` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table bkshop.features: ~5 rows (approximately)
DELETE FROM `features`;
INSERT INTO `features` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Home', 1, NULL, NULL),
	(2, 'Category', 1, NULL, NULL),
	(3, 'Store', 1, NULL, NULL),
	(4, 'Product', 1, NULL, NULL),
	(5, 'Shop', 1, NULL, NULL);

-- Dumping structure for table bkshop.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table bkshop.migrations: ~44 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_100000_create_password_resets_table', 1),
	(2, '2019_08_19_000000_create_failed_jobs_table', 1),
	(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(4, '2020_07_10_021010_create_brands_table', 1),
	(5, '2020_07_10_062541_create_product_sizes_table', 1),
	(6, '2020_07_10_091722_create_image_galleries_table', 1),
	(7, '2020_07_10_102033_create_product_colors_table', 1),
	(8, '2020_07_10_112147_create_categories_table', 1),
	(9, '2020_07_11_054218_create_subcats_table', 1),
	(10, '2020_07_11_055748_create_shippings_table', 1),
	(11, '2020_07_11_063857_create_products_table', 1),
	(12, '2021_07_11_045005_create_pa_sizes_table', 1),
	(13, '2021_07_11_055154_create_pa_colors_table', 1),
	(14, '2022_09_12_161702_create_company_infos_table', 1),
	(15, '2022_09_12_161947_create_company_contacts_table', 1),
	(16, '2022_09_29_040703_create_order_statuses_table', 1),
	(17, '2022_12_30_135012_create_product_galleries_table', 1),
	(18, '2023_01_09_030017_create_roles_table', 1),
	(19, '2023_01_12_135036_create_users_table', 1),
	(20, '2023_01_12_139854_create_payments_table', 1),
	(21, '2023_01_12_144920_create_orders_table', 1),
	(22, '2023_02_01_095337_create_contacts_table', 1),
	(23, '2023_02_02_063830_create_sliders_table', 1),
	(24, '2023_02_02_085542_create_banners_table', 1),
	(25, '2023_02_08_141644_create_features_table', 1),
	(26, '2023_02_09_045544_create_permissions_table', 1),
	(27, '2023_02_17_120858_create_main_keys_table', 1),
	(28, '2023_02_17_134502_create_services_table', 1),
	(29, '2023_02_19_110158_create_site_settings_table', 1),
	(30, '2023_02_20_133416_create_add_to_carts_table', 1),
	(31, '2023_02_21_102323_create_order_items_table', 1),
	(32, '2023_02_23_165413_create_pixel_tags_table', 1),
	(33, '2023_02_24_112528_create_google_tags_table', 1),
	(34, '2023_04_02_105037_create_wishlists_table', 1),
	(35, '2023_04_18_103641_create_privacy_policies_table', 1),
	(36, '2023_04_18_104122_create_pages_table', 1),
	(37, '2024_01_08_000000_create_reviews_table', 1),
	(38, '2024_01_09_000000_create_review_images_table', 1),
	(39, '2024_11_08_032550_create_landing_page_sections_table', 1),
	(40, '2024_12_25_095301_create_blogs_table', 1),
	(41, '2024_12_31_082400_create_product_shippings_table', 1),
	(42, '2025_01_15_222421_create_confirmed_orders_table', 1),
	(43, '2025_01_16_142848_add_invoice_id_to_orders_table', 1),
	(44, '2025_01_16_222029_create_excels_table', 1);

-- Dumping structure for table bkshop.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table bkshop.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;

-- Dumping structure for table bkshop.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL,
  `feature_id` bigint(20) unsigned NOT NULL,
  `add` varchar(255) DEFAULT NULL,
  `show` varchar(255) DEFAULT NULL,
  `edit` varchar(255) DEFAULT NULL,
  `delete` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_role_id` (`role_id`),
  KEY `permissions_feature_id` (`feature_id`),
  CONSTRAINT `permissions_feature_id` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permissions_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table bkshop.permissions: ~5 rows (approximately)
DELETE FROM `permissions`;
INSERT INTO `permissions` (`id`, `role_id`, `feature_id`, `add`, `show`, `edit`, `delete`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '1', '2', '3', '4', NULL, NULL),
	(2, 2, 2, '1', '2', '3', '4', NULL, NULL),
	(3, 2, 3, '1', '2', '3', '4', NULL, NULL),
	(4, 2, 4, '1', '2', '3', '4', NULL, NULL),
	(5, 1, 5, '1', '2', '3', '4', NULL, NULL);

-- Dumping structure for table bkshop.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table bkshop.personal_access_tokens: ~0 rows (approximately)
DELETE FROM `personal_access_tokens`;

-- Dumping structure for table bkshop.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` bigint(20) NOT NULL DEFAULT 0,
  `category_id` bigint(20) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table bkshop.products: ~1 rows (approximately)
DELETE FROM `products`;
INSERT INTO `products` (`id`, `store_id`, `category_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
	(4, 1, 5, 'Product one', 'active', '2025-02-06 11:34:18', '2025-02-06 11:34:18'),
	(5, 1, 6, 'P Two', 'active', '2025-02-06 11:46:35', '2025-02-06 11:46:35'),
	(6, 2, 7, 'P Three', 'active', '2025-02-06 11:48:17', '2025-02-06 11:48:17'),
	(7, 2, 8, 'P Four', 'active', '2025-02-06 11:48:34', '2025-02-06 11:48:34');

-- Dumping structure for table bkshop.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table bkshop.roles: ~2 rows (approximately)
DELETE FROM `roles`;
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', NULL, NULL),
	(2, 'Merchant', NULL, NULL);

-- Dumping structure for table bkshop.stores
CREATE TABLE IF NOT EXISTS `stores` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table bkshop.stores: ~2 rows (approximately)
DELETE FROM `stores`;
INSERT INTO `stores` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Store One', 'active', '2025-02-06 08:22:23', '2025-02-06 08:22:23'),
	(2, 'Store Two', 'active', '2025-02-06 08:22:32', '2025-02-06 08:22:32');

-- Dumping structure for table bkshop.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `shopname` varchar(255) DEFAULT NULL,
  `user_info_id` bigint(20) unsigned DEFAULT NULL,
  `role_id` bigint(20) unsigned NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id` (`role_id`),
  CONSTRAINT `users_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table bkshop.users: ~2 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `shopname`, `user_info_id`, `role_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'MD Bakibillah', 'bakibillah920@gmail.com', NULL, NULL, 1, NULL, '$2y$10$iFN6Vtq4xow/MMJrrqrO0OuQY107BS.ejmdSgwN0pAaKUN2HCTkcG', NULL, NULL, NULL),
	(3, 'bakibillah', 'bakibillah@gmail.com', 'Dhakashop', NULL, 2, NULL, '$2y$10$iFN6Vtq4xow/MMJrrqrO0OuQY107BS.ejmdSgwN0pAaKUN2HCTkcG', NULL, '2025-02-05 13:13:19', '2025-02-05 13:13:19');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
