-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.16 - MySQL Community Server - GPL
-- Server OS:                    Linux
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table laraecom.avored_addresses
DROP TABLE IF EXISTS `avored_addresses`;
CREATE TABLE IF NOT EXISTS `avored_addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `type` enum('SHIPPING','BILLING') COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int(10) unsigned DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `addresses_user_id_foreign` (`user_id`),
  KEY `addresses_country_id_foreign` (`country_id`),
  CONSTRAINT `addresses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `avored_countries` (`id`) ON DELETE CASCADE,
  CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `avored_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_addresses: ~0 rows (approximately)
DELETE FROM `avored_addresses`;
/*!40000 ALTER TABLE `avored_addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_addresses` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_admin_password_resets
DROP TABLE IF EXISTS `avored_admin_password_resets`;
CREATE TABLE IF NOT EXISTS `avored_admin_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `admin_password_resets_email_index` (`email`),
  KEY `admin_password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_admin_password_resets: ~0 rows (approximately)
DELETE FROM `avored_admin_password_resets`;
/*!40000 ALTER TABLE `avored_admin_password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_admin_password_resets` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_admin_users
DROP TABLE IF EXISTS `avored_admin_users`;
CREATE TABLE IF NOT EXISTS `avored_admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `is_super_admin` tinyint(4) DEFAULT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'en',
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_email_unique` (`email`),
  KEY `admin_users_role_id_foreign` (`role_id`),
  CONSTRAINT `admin_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `avored_roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_admin_users: ~1 rows (approximately)
DELETE FROM `avored_admin_users`;
/*!40000 ALTER TABLE `avored_admin_users` DISABLE KEYS */;
INSERT INTO `avored_admin_users` (`id`, `is_super_admin`, `role_id`, `first_name`, `last_name`, `email`, `password`, `language`, `image_path`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'Dong', 'Duong', 'dongd@gmail.com', '$2y$10$NXwNUDbyECwjUC/u4IY0ietSkNBJrfAMKh6w.2rcdrbqvM0EVA76O', 'en', NULL, NULL, NULL, '2019-05-26 17:14:43', '2019-05-26 17:14:43');
/*!40000 ALTER TABLE `avored_admin_users` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_attributes
DROP TABLE IF EXISTS `avored_attributes`;
CREATE TABLE IF NOT EXISTS `avored_attributes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `attributes_identifier_unique` (`identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_attributes: ~0 rows (approximately)
DELETE FROM `avored_attributes`;
/*!40000 ALTER TABLE `avored_attributes` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_attributes` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_attribute_dropdown_options
DROP TABLE IF EXISTS `avored_attribute_dropdown_options`;
CREATE TABLE IF NOT EXISTS `avored_attribute_dropdown_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attribute_id` int(10) unsigned NOT NULL,
  `display_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attribute_dropdown_options_attribute_id_foreign` (`attribute_id`),
  CONSTRAINT `attribute_dropdown_options_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `avored_attributes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_attribute_dropdown_options: ~0 rows (approximately)
DELETE FROM `avored_attribute_dropdown_options`;
/*!40000 ALTER TABLE `avored_attribute_dropdown_options` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_attribute_dropdown_options` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_attribute_product
DROP TABLE IF EXISTS `avored_attribute_product`;
CREATE TABLE IF NOT EXISTS `avored_attribute_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attribute_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attribute_product_attribute_id_foreign` (`attribute_id`),
  KEY `attribute_product_product_id_foreign` (`product_id`),
  CONSTRAINT `attribute_product_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `avored_attributes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `attribute_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `avored_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_attribute_product: ~0 rows (approximately)
DELETE FROM `avored_attribute_product`;
/*!40000 ALTER TABLE `avored_attribute_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_attribute_product` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_categories
DROP TABLE IF EXISTS `avored_categories`;
CREATE TABLE IF NOT EXISTS `avored_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_categories: ~3 rows (approximately)
DELETE FROM `avored_categories`;
/*!40000 ALTER TABLE `avored_categories` DISABLE KEYS */;
INSERT INTO `avored_categories` (`id`, `parent_id`, `name`, `slug`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Kitchen', 'kitchen', NULL, NULL, '2019-05-26 17:06:35', '2019-05-26 17:06:35'),
	(2, NULL, 'Bedroom', 'bedroom', NULL, NULL, '2019-05-26 17:06:36', '2019-05-26 17:06:36'),
	(3, NULL, 'Living Room', 'living-room', NULL, NULL, '2019-05-26 17:06:36', '2019-05-26 17:06:36');
/*!40000 ALTER TABLE `avored_categories` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_category_filters
DROP TABLE IF EXISTS `avored_category_filters`;
CREATE TABLE IF NOT EXISTS `avored_category_filters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned DEFAULT NULL,
  `type` enum('ATTRIBUTE','PROPERTY') COLLATE utf8_unicode_ci DEFAULT NULL,
  `filter_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_filters_category_id_foreign` (`category_id`),
  CONSTRAINT `category_filters_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `avored_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_category_filters: ~0 rows (approximately)
DELETE FROM `avored_category_filters`;
/*!40000 ALTER TABLE `avored_category_filters` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_category_filters` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_category_product
DROP TABLE IF EXISTS `avored_category_product`;
CREATE TABLE IF NOT EXISTS `avored_category_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_product_product_id_foreign` (`product_id`),
  KEY `category_product_category_id_foreign` (`category_id`),
  CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `avored_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `avored_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_category_product: ~14 rows (approximately)
DELETE FROM `avored_category_product`;
/*!40000 ALTER TABLE `avored_category_product` DISABLE KEYS */;
INSERT INTO `avored_category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
	(1, 3, 1, NULL, NULL),
	(2, 3, 2, NULL, NULL),
	(3, 3, 3, NULL, NULL),
	(4, 3, 4, NULL, NULL),
	(5, 3, 5, NULL, NULL),
	(6, 3, 6, NULL, NULL),
	(7, 2, 7, NULL, NULL),
	(8, 2, 8, NULL, NULL),
	(9, 2, 9, NULL, NULL),
	(10, 2, 10, NULL, NULL),
	(11, 1, 11, NULL, NULL),
	(12, 1, 12, NULL, NULL),
	(13, 1, 13, NULL, NULL),
	(14, 1, 14, NULL, NULL);
/*!40000 ALTER TABLE `avored_category_product` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_configurations
DROP TABLE IF EXISTS `avored_configurations`;
CREATE TABLE IF NOT EXISTS `avored_configurations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `configuration_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `configuration_value` varchar(999) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_configurations: ~16 rows (approximately)
DELETE FROM `avored_configurations`;
/*!40000 ALTER TABLE `avored_configurations` DISABLE KEYS */;
INSERT INTO `avored_configurations` (`id`, `configuration_key`, `configuration_value`, `created_at`, `updated_at`) VALUES
	(1, 'general_site_currency', '1', '2019-05-26 17:06:24', '2019-05-26 17:06:24'),
	(2, 'tax_default_country', '160', '2019-05-26 17:06:24', '2019-05-26 17:06:24'),
	(3, 'tax_enabled', '1', '2019-05-26 17:06:24', '2019-05-26 17:06:24'),
	(4, 'tax_percentage', '15', '2019-05-26 17:06:24', '2019-05-26 17:06:24'),
	(5, 'general_site_title', 'AvoRed an Laravel Ecommerce', '2019-05-26 17:06:24', '2019-05-26 17:06:24'),
	(6, 'general_site_description', 'AvoRed is a free open-source e-commerce application development platform written in PHP based on Laravel. Its an ingenuous and modular e-commerce that is easily customizable according to your needs, with a modern responsive mobile friendly interface as default', '2019-05-26 17:06:24', '2019-05-26 17:06:24'),
	(7, 'general_site_description', 'AvoRed Laravel Ecommerce\n        ', '2019-05-26 17:06:24', '2019-05-26 17:06:24'),
	(8, 'general_home_page', '1', '2019-05-26 17:06:41', '2019-05-26 17:06:41'),
	(9, 'shipping_free_shipping_enabled', '1', '2019-05-26 17:06:41', '2019-05-26 17:06:41'),
	(10, 'payment_pickup_enabled', '1', '2019-05-26 17:06:41', '2019-05-26 17:06:41'),
	(11, 'general_term_condition_page', '2', '2019-05-26 17:06:41', '2019-05-26 17:06:41'),
	(12, 'active_theme_identifier', 'avored-default', '2019-05-26 17:06:58', '2019-05-26 17:06:58'),
	(13, 'active_theme_path', '/var/www/themes\\avored\\default', '2019-05-26 17:06:58', '2019-05-26 17:06:58'),
	(14, 'avored_catalog_no_of_product_category_page', '9', '2019-05-26 17:06:58', '2019-05-26 17:06:58'),
	(15, 'avored_catalog_cart_page_display_taxamount', 'yes', '2019-05-26 17:06:58', '2019-05-26 17:06:58'),
	(16, 'avored_tax_class_percentage_of_tax', '15', '2019-05-26 17:06:59', '2019-05-26 17:06:59');
/*!40000 ALTER TABLE `avored_configurations` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_countries
DROP TABLE IF EXISTS `avored_countries`;
CREATE TABLE IF NOT EXISTS `avored_countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_countries: ~250 rows (approximately)
DELETE FROM `avored_countries`;
/*!40000 ALTER TABLE `avored_countries` DISABLE KEYS */;
INSERT INTO `avored_countries` (`id`, `code`, `name`, `phone_code`, `currency_code`, `currency_symbol`, `lang_code`, `created_at`, `updated_at`) VALUES
	(1, 'af', 'Afghanistan', '93', 'AFN', '؋', 'Pashto', '2019-05-26 17:05:35', '2019-05-26 17:05:35'),
	(2, 'ax', 'Åland Islands', '358', 'EUR', '€', 'Swedish', '2019-05-26 17:05:35', '2019-05-26 17:05:35'),
	(3, 'al', 'Albania', '355', 'ALL', 'L', 'Albanian', '2019-05-26 17:05:35', '2019-05-26 17:05:35'),
	(4, 'dz', 'Algeria', '213', 'DZD', 'د.ج', 'Arabic', '2019-05-26 17:05:35', '2019-05-26 17:05:35'),
	(5, 'as', 'American Samoa', '1684', 'USD', '$', 'English', '2019-05-26 17:05:35', '2019-05-26 17:05:35'),
	(6, 'ad', 'Andorra', '376', 'EUR', '€', 'Catalan', '2019-05-26 17:05:35', '2019-05-26 17:05:35'),
	(7, 'ao', 'Angola', '244', 'AOA', 'Kz', 'Portuguese', '2019-05-26 17:05:35', '2019-05-26 17:05:35'),
	(8, 'ai', 'Anguilla', '1264', 'XCD', '$', 'English', '2019-05-26 17:05:35', '2019-05-26 17:05:35'),
	(9, 'aq', 'Antarctica', '672', 'AUD', '$', 'English', '2019-05-26 17:05:35', '2019-05-26 17:05:35'),
	(10, 'ag', 'Antigua and Barbuda', '1268', 'XCD', '$', 'English', '2019-05-26 17:05:35', '2019-05-26 17:05:35'),
	(11, 'ar', 'Argentina', '54', 'ARS', '$', 'Spanish', '2019-05-26 17:05:35', '2019-05-26 17:05:35'),
	(12, 'am', 'Armenia', '374', 'AMD', NULL, 'Armenian', '2019-05-26 17:05:35', '2019-05-26 17:05:35'),
	(13, 'aw', 'Aruba', '297', 'AWG', 'ƒ', 'Dutch', '2019-05-26 17:05:35', '2019-05-26 17:05:35'),
	(14, 'au', 'Australia', '61', 'AUD', '$', 'English', '2019-05-26 17:05:35', '2019-05-26 17:05:35'),
	(15, 'at', 'Austria', '43', 'EUR', '€', 'German', '2019-05-26 17:05:36', '2019-05-26 17:05:36'),
	(16, 'az', 'Azerbaijan', '994', 'AZN', NULL, 'Azerbaijani', '2019-05-26 17:05:36', '2019-05-26 17:05:36'),
	(17, 'bs', 'Bahamas', '1242', 'BSD', '$', 'English', '2019-05-26 17:05:36', '2019-05-26 17:05:36'),
	(18, 'bh', 'Bahrain', '973', 'BHD', '.د.ب', 'Arabic', '2019-05-26 17:05:36', '2019-05-26 17:05:36'),
	(19, 'bd', 'Bangladesh', '880', 'BDT', '৳', 'Bengali', '2019-05-26 17:05:36', '2019-05-26 17:05:36'),
	(20, 'bb', 'Barbados', '1246', 'BBD', '$', 'English', '2019-05-26 17:05:36', '2019-05-26 17:05:36'),
	(21, 'by', 'Belarus', '375', 'BYN', 'Br', 'Belarusian', '2019-05-26 17:05:36', '2019-05-26 17:05:36'),
	(22, 'be', 'Belgium', '32', 'EUR', '€', 'Dutch', '2019-05-26 17:05:36', '2019-05-26 17:05:36'),
	(23, 'bz', 'Belize', '501', 'BZD', '$', 'English', '2019-05-26 17:05:36', '2019-05-26 17:05:36'),
	(24, 'bj', 'Benin', '229', 'XOF', 'Fr', 'French', '2019-05-26 17:05:36', '2019-05-26 17:05:36'),
	(25, 'bm', 'Bermuda', '1441', 'BMD', '$', 'English', '2019-05-26 17:05:36', '2019-05-26 17:05:36'),
	(26, 'bt', 'Bhutan', '975', 'BTN', 'Nu.', 'Dzongkha', '2019-05-26 17:05:36', '2019-05-26 17:05:36'),
	(27, 'bo', 'Bolivia (Plurinational State of)', '591', 'BOB', 'Bs.', 'Spanish', '2019-05-26 17:05:36', '2019-05-26 17:05:36'),
	(28, 'bq', 'Bonaire, Sint Eustatius and Saba', '5997', 'USD', '$', 'Dutch', '2019-05-26 17:05:36', '2019-05-26 17:05:36'),
	(29, 'ba', 'Bosnia and Herzegovina', '387', 'BAM', NULL, 'Bosnian', '2019-05-26 17:05:36', '2019-05-26 17:05:36'),
	(30, 'bw', 'Botswana', '267', 'BWP', 'P', 'English', '2019-05-26 17:05:36', '2019-05-26 17:05:36'),
	(31, 'bv', 'Bouvet Island', '', 'NOK', 'kr', 'Norwegian', '2019-05-26 17:05:36', '2019-05-26 17:05:36'),
	(32, 'br', 'Brazil', '55', 'BRL', 'R$', 'Portuguese', '2019-05-26 17:05:36', '2019-05-26 17:05:36'),
	(33, 'io', 'British Indian Ocean Territory', '246', 'USD', '$', 'English', '2019-05-26 17:05:36', '2019-05-26 17:05:36'),
	(34, 'um', 'United States Minor Outlying Islands', '', 'USD', '$', 'English', '2019-05-26 17:05:37', '2019-05-26 17:05:37'),
	(35, 'vg', 'Virgin Islands (British)', '1284', NULL, '$', 'English', '2019-05-26 17:05:37', '2019-05-26 17:05:37'),
	(36, 'vi', 'Virgin Islands (U.S.)', '1 340', 'USD', '$', 'English', '2019-05-26 17:05:37', '2019-05-26 17:05:37'),
	(37, 'bn', 'Brunei Darussalam', '673', 'BND', '$', 'Malay', '2019-05-26 17:05:37', '2019-05-26 17:05:37'),
	(38, 'bg', 'Bulgaria', '359', 'BGN', 'лв', 'Bulgarian', '2019-05-26 17:05:37', '2019-05-26 17:05:37'),
	(39, 'bf', 'Burkina Faso', '226', 'XOF', 'Fr', 'French', '2019-05-26 17:05:37', '2019-05-26 17:05:37'),
	(40, 'bi', 'Burundi', '257', 'BIF', 'Fr', 'French', '2019-05-26 17:05:37', '2019-05-26 17:05:37'),
	(41, 'kh', 'Cambodia', '855', 'KHR', '៛', 'Khmer', '2019-05-26 17:05:37', '2019-05-26 17:05:37'),
	(42, 'cm', 'Cameroon', '237', 'XAF', 'Fr', 'English', '2019-05-26 17:05:37', '2019-05-26 17:05:37'),
	(43, 'ca', 'Canada', '1', 'CAD', '$', 'English', '2019-05-26 17:05:37', '2019-05-26 17:05:37'),
	(44, 'cv', 'Cabo Verde', '238', 'CVE', 'Esc', 'Portuguese', '2019-05-26 17:05:38', '2019-05-26 17:05:38'),
	(45, 'ky', 'Cayman Islands', '1345', 'KYD', '$', 'English', '2019-05-26 17:05:38', '2019-05-26 17:05:38'),
	(46, 'cf', 'Central African Republic', '236', 'XAF', 'Fr', 'French', '2019-05-26 17:05:38', '2019-05-26 17:05:38'),
	(47, 'td', 'Chad', '235', 'XAF', 'Fr', 'French', '2019-05-26 17:05:38', '2019-05-26 17:05:38'),
	(48, 'cl', 'Chile', '56', 'CLP', '$', 'Spanish', '2019-05-26 17:05:38', '2019-05-26 17:05:38'),
	(49, 'cn', 'China', '86', 'CNY', '¥', 'Chinese', '2019-05-26 17:05:38', '2019-05-26 17:05:38'),
	(50, 'cx', 'Christmas Island', '61', 'AUD', '$', 'English', '2019-05-26 17:05:38', '2019-05-26 17:05:38'),
	(51, 'cc', 'Cocos (Keeling) Islands', '61', 'AUD', '$', 'English', '2019-05-26 17:05:38', '2019-05-26 17:05:38'),
	(52, 'co', 'Colombia', '57', 'COP', '$', 'Spanish', '2019-05-26 17:05:39', '2019-05-26 17:05:39'),
	(53, 'km', 'Comoros', '269', 'KMF', 'Fr', 'Arabic', '2019-05-26 17:05:39', '2019-05-26 17:05:39'),
	(54, 'cg', 'Congo', '242', 'XAF', 'Fr', 'French', '2019-05-26 17:05:39', '2019-05-26 17:05:39'),
	(55, 'cd', 'Congo (Democratic Republic of the)', '243', 'CDF', 'Fr', 'French', '2019-05-26 17:05:39', '2019-05-26 17:05:39'),
	(56, 'ck', 'Cook Islands', '682', 'NZD', '$', 'English', '2019-05-26 17:05:39', '2019-05-26 17:05:39'),
	(57, 'cr', 'Costa Rica', '506', 'CRC', '₡', 'Spanish', '2019-05-26 17:05:39', '2019-05-26 17:05:39'),
	(58, 'hr', 'Croatia', '385', 'HRK', 'kn', 'Croatian', '2019-05-26 17:05:39', '2019-05-26 17:05:39'),
	(59, 'cu', 'Cuba', '53', 'CUC', '$', 'Spanish', '2019-05-26 17:05:39', '2019-05-26 17:05:39'),
	(60, 'cw', 'Curaçao', '599', 'ANG', 'ƒ', 'Dutch', '2019-05-26 17:05:39', '2019-05-26 17:05:39'),
	(61, 'cy', 'Cyprus', '357', 'EUR', '€', 'Greek (modern)', '2019-05-26 17:05:39', '2019-05-26 17:05:39'),
	(62, 'cz', 'Czech Republic', '420', 'CZK', 'Kč', 'Czech', '2019-05-26 17:05:39', '2019-05-26 17:05:39'),
	(63, 'dk', 'Denmark', '45', 'DKK', 'kr', 'Danish', '2019-05-26 17:05:40', '2019-05-26 17:05:40'),
	(64, 'dj', 'Djibouti', '253', 'DJF', 'Fr', 'French', '2019-05-26 17:05:40', '2019-05-26 17:05:40'),
	(65, 'dm', 'Dominica', '1767', 'XCD', '$', 'English', '2019-05-26 17:05:40', '2019-05-26 17:05:40'),
	(66, 'do', 'Dominican Republic', '1809', 'DOP', '$', 'Spanish', '2019-05-26 17:05:40', '2019-05-26 17:05:40'),
	(67, 'ec', 'Ecuador', '593', 'USD', '$', 'Spanish', '2019-05-26 17:05:40', '2019-05-26 17:05:40'),
	(68, 'eg', 'Egypt', '20', 'EGP', '£', 'Arabic', '2019-05-26 17:05:40', '2019-05-26 17:05:40'),
	(69, 'sv', 'El Salvador', '503', 'USD', '$', 'Spanish', '2019-05-26 17:05:40', '2019-05-26 17:05:40'),
	(70, 'gq', 'Equatorial Guinea', '240', 'XAF', 'Fr', 'Spanish', '2019-05-26 17:05:40', '2019-05-26 17:05:40'),
	(71, 'er', 'Eritrea', '291', 'ERN', 'Nfk', 'Tigrinya', '2019-05-26 17:05:40', '2019-05-26 17:05:40'),
	(72, 'ee', 'Estonia', '372', 'EUR', '€', 'Estonian', '2019-05-26 17:05:40', '2019-05-26 17:05:40'),
	(73, 'et', 'Ethiopia', '251', 'ETB', 'Br', 'Amharic', '2019-05-26 17:05:41', '2019-05-26 17:05:41'),
	(74, 'fk', 'Falkland Islands (Malvinas)', '500', 'FKP', '£', 'English', '2019-05-26 17:05:41', '2019-05-26 17:05:41'),
	(75, 'fo', 'Faroe Islands', '298', 'DKK', 'kr', 'Faroese', '2019-05-26 17:05:41', '2019-05-26 17:05:41'),
	(76, 'fj', 'Fiji', '679', 'FJD', '$', 'English', '2019-05-26 17:05:41', '2019-05-26 17:05:41'),
	(77, 'fi', 'Finland', '358', 'EUR', '€', 'Finnish', '2019-05-26 17:05:41', '2019-05-26 17:05:41'),
	(78, 'fr', 'France', '33', 'EUR', '€', 'French', '2019-05-26 17:05:41', '2019-05-26 17:05:41'),
	(79, 'gf', 'French Guiana', '594', 'EUR', '€', 'French', '2019-05-26 17:05:41', '2019-05-26 17:05:41'),
	(80, 'pf', 'French Polynesia', '689', 'XPF', 'Fr', 'French', '2019-05-26 17:05:41', '2019-05-26 17:05:41'),
	(81, 'tf', 'French Southern Territories', '', 'EUR', '€', 'French', '2019-05-26 17:05:41', '2019-05-26 17:05:41'),
	(82, 'ga', 'Gabon', '241', 'XAF', 'Fr', 'French', '2019-05-26 17:05:41', '2019-05-26 17:05:41'),
	(83, 'gm', 'Gambia', '220', 'GMD', 'D', 'English', '2019-05-26 17:05:41', '2019-05-26 17:05:41'),
	(84, 'ge', 'Georgia', '995', 'GEL', 'ლ', 'Georgian', '2019-05-26 17:05:41', '2019-05-26 17:05:41'),
	(85, 'de', 'Germany', '49', 'EUR', '€', 'German', '2019-05-26 17:05:41', '2019-05-26 17:05:41'),
	(86, 'gh', 'Ghana', '233', 'GHS', '₵', 'English', '2019-05-26 17:05:41', '2019-05-26 17:05:41'),
	(87, 'gi', 'Gibraltar', '350', 'GIP', '£', 'English', '2019-05-26 17:05:41', '2019-05-26 17:05:41'),
	(88, 'gr', 'Greece', '30', 'EUR', '€', 'Greek (modern)', '2019-05-26 17:05:41', '2019-05-26 17:05:41'),
	(89, 'gl', 'Greenland', '299', 'DKK', 'kr', 'Kalaallisut', '2019-05-26 17:05:42', '2019-05-26 17:05:42'),
	(90, 'gd', 'Grenada', '1473', 'XCD', '$', 'English', '2019-05-26 17:05:42', '2019-05-26 17:05:42'),
	(91, 'gp', 'Guadeloupe', '590', 'EUR', '€', 'French', '2019-05-26 17:05:42', '2019-05-26 17:05:42'),
	(92, 'gu', 'Guam', '1671', 'USD', '$', 'English', '2019-05-26 17:05:42', '2019-05-26 17:05:42'),
	(93, 'gt', 'Guatemala', '502', 'GTQ', 'Q', 'Spanish', '2019-05-26 17:05:42', '2019-05-26 17:05:42'),
	(94, 'gg', 'Guernsey', '44', 'GBP', '£', 'English', '2019-05-26 17:05:42', '2019-05-26 17:05:42'),
	(95, 'gn', 'Guinea', '224', 'GNF', 'Fr', 'French', '2019-05-26 17:05:42', '2019-05-26 17:05:42'),
	(96, 'gw', 'Guinea-Bissau', '245', 'XOF', 'Fr', 'Portuguese', '2019-05-26 17:05:42', '2019-05-26 17:05:42'),
	(97, 'gy', 'Guyana', '592', 'GYD', '$', 'English', '2019-05-26 17:05:42', '2019-05-26 17:05:42'),
	(98, 'ht', 'Haiti', '509', 'HTG', 'G', 'French', '2019-05-26 17:05:42', '2019-05-26 17:05:42'),
	(99, 'hm', 'Heard Island and McDonald Islands', '', 'AUD', '$', 'English', '2019-05-26 17:05:42', '2019-05-26 17:05:42'),
	(100, 'va', 'Holy See', '379', 'EUR', '€', 'Latin', '2019-05-26 17:05:42', '2019-05-26 17:05:42'),
	(101, 'hn', 'Honduras', '504', 'HNL', 'L', 'Spanish', '2019-05-26 17:05:43', '2019-05-26 17:05:43'),
	(102, 'hk', 'Hong Kong', '852', 'HKD', '$', 'English', '2019-05-26 17:05:43', '2019-05-26 17:05:43'),
	(103, 'hu', 'Hungary', '36', 'HUF', 'Ft', 'Hungarian', '2019-05-26 17:05:43', '2019-05-26 17:05:43'),
	(104, 'is', 'Iceland', '354', 'ISK', 'kr', 'Icelandic', '2019-05-26 17:05:43', '2019-05-26 17:05:43'),
	(105, 'in', 'India', '91', 'INR', '₹', 'Hindi', '2019-05-26 17:05:43', '2019-05-26 17:05:43'),
	(106, 'id', 'Indonesia', '62', 'IDR', 'Rp', 'Indonesian', '2019-05-26 17:05:43', '2019-05-26 17:05:43'),
	(107, 'ci', 'Côte d\'Ivoire', '225', 'XOF', 'Fr', 'French', '2019-05-26 17:05:43', '2019-05-26 17:05:43'),
	(108, 'ir', 'Iran (Islamic Republic of)', '98', 'IRR', '﷼', 'Persian (Farsi)', '2019-05-26 17:05:44', '2019-05-26 17:05:44'),
	(109, 'iq', 'Iraq', '964', 'IQD', 'ع.د', 'Arabic', '2019-05-26 17:05:44', '2019-05-26 17:05:44'),
	(110, 'ie', 'Ireland', '353', 'EUR', '€', 'Irish', '2019-05-26 17:05:44', '2019-05-26 17:05:44'),
	(111, 'im', 'Isle of Man', '44', 'GBP', '£', 'English', '2019-05-26 17:05:44', '2019-05-26 17:05:44'),
	(112, 'il', 'Israel', '972', 'ILS', '₪', 'Hebrew (modern)', '2019-05-26 17:05:44', '2019-05-26 17:05:44'),
	(113, 'it', 'Italy', '39', 'EUR', '€', 'Italian', '2019-05-26 17:05:44', '2019-05-26 17:05:44'),
	(114, 'jm', 'Jamaica', '1876', 'JMD', '$', 'English', '2019-05-26 17:05:44', '2019-05-26 17:05:44'),
	(115, 'jp', 'Japan', '81', 'JPY', '¥', 'Japanese', '2019-05-26 17:05:44', '2019-05-26 17:05:44'),
	(116, 'je', 'Jersey', '44', 'GBP', '£', 'English', '2019-05-26 17:05:44', '2019-05-26 17:05:44'),
	(117, 'jo', 'Jordan', '962', 'JOD', 'د.ا', 'Arabic', '2019-05-26 17:05:44', '2019-05-26 17:05:44'),
	(118, 'kz', 'Kazakhstan', '76', 'KZT', NULL, 'Kazakh', '2019-05-26 17:05:45', '2019-05-26 17:05:45'),
	(119, 'ke', 'Kenya', '254', 'KES', 'Sh', 'English', '2019-05-26 17:05:45', '2019-05-26 17:05:45'),
	(120, 'ki', 'Kiribati', '686', 'AUD', '$', 'English', '2019-05-26 17:05:45', '2019-05-26 17:05:45'),
	(121, 'kw', 'Kuwait', '965', 'KWD', 'د.ك', 'Arabic', '2019-05-26 17:05:45', '2019-05-26 17:05:45'),
	(122, 'kg', 'Kyrgyzstan', '996', 'KGS', 'с', 'Kyrgyz', '2019-05-26 17:05:45', '2019-05-26 17:05:45'),
	(123, 'la', 'Lao People\'s Democratic Republic', '856', 'LAK', '₭', 'Lao', '2019-05-26 17:05:45', '2019-05-26 17:05:45'),
	(124, 'lv', 'Latvia', '371', 'EUR', '€', 'Latvian', '2019-05-26 17:05:45', '2019-05-26 17:05:45'),
	(125, 'lb', 'Lebanon', '961', 'LBP', 'ل.ل', 'Arabic', '2019-05-26 17:05:45', '2019-05-26 17:05:45'),
	(126, 'ls', 'Lesotho', '266', 'LSL', 'L', 'English', '2019-05-26 17:05:45', '2019-05-26 17:05:45'),
	(127, 'lr', 'Liberia', '231', 'LRD', '$', 'English', '2019-05-26 17:05:45', '2019-05-26 17:05:45'),
	(128, 'ly', 'Libya', '218', 'LYD', 'ل.د', 'Arabic', '2019-05-26 17:05:46', '2019-05-26 17:05:46'),
	(129, 'li', 'Liechtenstein', '423', 'CHF', 'Fr', 'German', '2019-05-26 17:05:46', '2019-05-26 17:05:46'),
	(130, 'lt', 'Lithuania', '370', 'EUR', '€', 'Lithuanian', '2019-05-26 17:05:46', '2019-05-26 17:05:46'),
	(131, 'lu', 'Luxembourg', '352', 'EUR', '€', 'French', '2019-05-26 17:05:46', '2019-05-26 17:05:46'),
	(132, 'mo', 'Macao', '853', 'MOP', 'P', 'Chinese', '2019-05-26 17:05:46', '2019-05-26 17:05:46'),
	(133, 'mk', 'Macedonia (the former Yugoslav Republic of)', '389', 'MKD', 'ден', 'Macedonian', '2019-05-26 17:05:46', '2019-05-26 17:05:46'),
	(134, 'mg', 'Madagascar', '261', 'MGA', 'Ar', 'French', '2019-05-26 17:05:46', '2019-05-26 17:05:46'),
	(135, 'mw', 'Malawi', '265', 'MWK', 'MK', 'English', '2019-05-26 17:05:46', '2019-05-26 17:05:46'),
	(136, 'my', 'Malaysia', '60', 'MYR', 'RM', 'Malaysian', '2019-05-26 17:05:46', '2019-05-26 17:05:46'),
	(137, 'mv', 'Maldives', '960', 'MVR', '.ރ', 'Divehi', '2019-05-26 17:05:46', '2019-05-26 17:05:46'),
	(138, 'ml', 'Mali', '223', 'XOF', 'Fr', 'French', '2019-05-26 17:05:46', '2019-05-26 17:05:46'),
	(139, 'mt', 'Malta', '356', 'EUR', '€', 'Maltese', '2019-05-26 17:05:46', '2019-05-26 17:05:46'),
	(140, 'mh', 'Marshall Islands', '692', 'USD', '$', 'English', '2019-05-26 17:05:47', '2019-05-26 17:05:47'),
	(141, 'mq', 'Martinique', '596', 'EUR', '€', 'French', '2019-05-26 17:05:47', '2019-05-26 17:05:47'),
	(142, 'mr', 'Mauritania', '222', 'MRO', 'UM', 'Arabic', '2019-05-26 17:05:47', '2019-05-26 17:05:47'),
	(143, 'mu', 'Mauritius', '230', 'MUR', '₨', 'English', '2019-05-26 17:05:47', '2019-05-26 17:05:47'),
	(144, 'yt', 'Mayotte', '262', 'EUR', '€', 'French', '2019-05-26 17:05:47', '2019-05-26 17:05:47'),
	(145, 'mx', 'Mexico', '52', 'MXN', '$', 'Spanish', '2019-05-26 17:05:47', '2019-05-26 17:05:47'),
	(146, 'fm', 'Micronesia (Federated States of)', '691', NULL, '$', 'English', '2019-05-26 17:05:47', '2019-05-26 17:05:47'),
	(147, 'md', 'Moldova (Republic of)', '373', 'MDL', 'L', 'Romanian', '2019-05-26 17:05:47', '2019-05-26 17:05:47'),
	(148, 'mc', 'Monaco', '377', 'EUR', '€', 'French', '2019-05-26 17:05:47', '2019-05-26 17:05:47'),
	(149, 'mn', 'Mongolia', '976', 'MNT', '₮', 'Mongolian', '2019-05-26 17:05:47', '2019-05-26 17:05:47'),
	(150, 'me', 'Montenegro', '382', 'EUR', '€', 'Serbian', '2019-05-26 17:05:47', '2019-05-26 17:05:47'),
	(151, 'ms', 'Montserrat', '1664', 'XCD', '$', 'English', '2019-05-26 17:05:47', '2019-05-26 17:05:47'),
	(152, 'ma', 'Morocco', '212', 'MAD', 'د.م.', 'Arabic', '2019-05-26 17:05:47', '2019-05-26 17:05:47'),
	(153, 'mz', 'Mozambique', '258', 'MZN', 'MT', 'Portuguese', '2019-05-26 17:05:47', '2019-05-26 17:05:47'),
	(154, 'mm', 'Myanmar', '95', 'MMK', 'Ks', 'Burmese', '2019-05-26 17:05:47', '2019-05-26 17:05:47'),
	(155, 'na', 'Namibia', '264', 'NAD', '$', 'English', '2019-05-26 17:05:47', '2019-05-26 17:05:47'),
	(156, 'nr', 'Nauru', '674', 'AUD', '$', 'English', '2019-05-26 17:05:48', '2019-05-26 17:05:48'),
	(157, 'np', 'Nepal', '977', 'NPR', '₨', 'Nepali', '2019-05-26 17:05:48', '2019-05-26 17:05:48'),
	(158, 'nl', 'Netherlands', '31', 'EUR', '€', 'Dutch', '2019-05-26 17:05:48', '2019-05-26 17:05:48'),
	(159, 'nc', 'New Caledonia', '687', 'XPF', 'Fr', 'French', '2019-05-26 17:05:48', '2019-05-26 17:05:48'),
	(160, 'nz', 'New Zealand', '64', 'NZD', '$', 'English', '2019-05-26 17:05:48', '2019-05-26 17:05:48'),
	(161, 'ni', 'Nicaragua', '505', 'NIO', 'C$', 'Spanish', '2019-05-26 17:05:48', '2019-05-26 17:05:48'),
	(162, 'ne', 'Niger', '227', 'XOF', 'Fr', 'French', '2019-05-26 17:05:48', '2019-05-26 17:05:48'),
	(163, 'ng', 'Nigeria', '234', 'NGN', '₦', 'English', '2019-05-26 17:05:48', '2019-05-26 17:05:48'),
	(164, 'nu', 'Niue', '683', 'NZD', '$', 'English', '2019-05-26 17:05:48', '2019-05-26 17:05:48'),
	(165, 'nf', 'Norfolk Island', '672', 'AUD', '$', 'English', '2019-05-26 17:05:48', '2019-05-26 17:05:48'),
	(166, 'kp', 'Korea (Democratic People\'s Republic of)', '850', 'KPW', '₩', 'Korean', '2019-05-26 17:05:48', '2019-05-26 17:05:48'),
	(167, 'mp', 'Northern Mariana Islands', '1670', 'USD', '$', 'English', '2019-05-26 17:05:49', '2019-05-26 17:05:49'),
	(168, 'no', 'Norway', '47', 'NOK', 'kr', 'Norwegian', '2019-05-26 17:05:49', '2019-05-26 17:05:49'),
	(169, 'om', 'Oman', '968', 'OMR', 'ر.ع.', 'Arabic', '2019-05-26 17:05:49', '2019-05-26 17:05:49'),
	(170, 'pk', 'Pakistan', '92', 'PKR', '₨', 'English', '2019-05-26 17:05:49', '2019-05-26 17:05:49'),
	(171, 'pw', 'Palau', '680', '(none)', '$', 'English', '2019-05-26 17:05:49', '2019-05-26 17:05:49'),
	(172, 'ps', 'Palestine, State of', '970', 'ILS', '₪', 'Arabic', '2019-05-26 17:05:49', '2019-05-26 17:05:49'),
	(173, 'pa', 'Panama', '507', 'PAB', 'B/.', 'Spanish', '2019-05-26 17:05:49', '2019-05-26 17:05:49'),
	(174, 'pg', 'Papua New Guinea', '675', 'PGK', 'K', 'English', '2019-05-26 17:05:49', '2019-05-26 17:05:49'),
	(175, 'py', 'Paraguay', '595', 'PYG', '₲', 'Spanish', '2019-05-26 17:05:49', '2019-05-26 17:05:49'),
	(176, 'pe', 'Peru', '51', 'PEN', 'S/.', 'Spanish', '2019-05-26 17:05:49', '2019-05-26 17:05:49'),
	(177, 'ph', 'Philippines', '63', 'PHP', '₱', 'English', '2019-05-26 17:05:49', '2019-05-26 17:05:49'),
	(178, 'pn', 'Pitcairn', '64', 'NZD', '$', 'English', '2019-05-26 17:05:49', '2019-05-26 17:05:49'),
	(179, 'pl', 'Poland', '48', 'PLN', 'zł', 'Polish', '2019-05-26 17:05:49', '2019-05-26 17:05:49'),
	(180, 'pt', 'Portugal', '351', 'EUR', '€', 'Portuguese', '2019-05-26 17:05:49', '2019-05-26 17:05:49'),
	(181, 'pr', 'Puerto Rico', '1787', 'USD', '$', 'Spanish', '2019-05-26 17:05:49', '2019-05-26 17:05:49'),
	(182, 'qa', 'Qatar', '974', 'QAR', 'ر.ق', 'Arabic', '2019-05-26 17:05:49', '2019-05-26 17:05:49'),
	(183, 'xk', 'Republic of Kosovo', '383', 'EUR', '€', 'Albanian', '2019-05-26 17:05:50', '2019-05-26 17:05:50'),
	(184, 're', 'Réunion', '262', 'EUR', '€', 'French', '2019-05-26 17:05:50', '2019-05-26 17:05:50'),
	(185, 'ro', 'Romania', '40', 'RON', 'lei', 'Romanian', '2019-05-26 17:05:50', '2019-05-26 17:05:50'),
	(186, 'ru', 'Russian Federation', '7', 'RUB', '₽', 'Russian', '2019-05-26 17:05:50', '2019-05-26 17:05:50'),
	(187, 'rw', 'Rwanda', '250', 'RWF', 'Fr', 'Kinyarwanda', '2019-05-26 17:05:50', '2019-05-26 17:05:50'),
	(188, 'bl', 'Saint Barthélemy', '590', 'EUR', '€', 'French', '2019-05-26 17:05:50', '2019-05-26 17:05:50'),
	(189, 'sh', 'Saint Helena, Ascension and Tristan da Cunha', '290', 'SHP', '£', 'English', '2019-05-26 17:05:50', '2019-05-26 17:05:50'),
	(190, 'kn', 'Saint Kitts and Nevis', '1869', 'XCD', '$', 'English', '2019-05-26 17:05:50', '2019-05-26 17:05:50'),
	(191, 'lc', 'Saint Lucia', '1758', 'XCD', '$', 'English', '2019-05-26 17:05:50', '2019-05-26 17:05:50'),
	(192, 'mf', 'Saint Martin (French part)', '590', 'EUR', '€', 'English', '2019-05-26 17:05:50', '2019-05-26 17:05:50'),
	(193, 'pm', 'Saint Pierre and Miquelon', '508', 'EUR', '€', 'French', '2019-05-26 17:05:50', '2019-05-26 17:05:50'),
	(194, 'vc', 'Saint Vincent and the Grenadines', '1784', 'XCD', '$', 'English', '2019-05-26 17:05:50', '2019-05-26 17:05:50'),
	(195, 'ws', 'Samoa', '685', 'WST', 'T', 'Samoan', '2019-05-26 17:05:50', '2019-05-26 17:05:50'),
	(196, 'sm', 'San Marino', '378', 'EUR', '€', 'Italian', '2019-05-26 17:05:50', '2019-05-26 17:05:50'),
	(197, 'st', 'Sao Tome and Principe', '239', 'STD', 'Db', 'Portuguese', '2019-05-26 17:05:50', '2019-05-26 17:05:50'),
	(198, 'sa', 'Saudi Arabia', '966', 'SAR', 'ر.س', 'Arabic', '2019-05-26 17:05:50', '2019-05-26 17:05:50'),
	(199, 'sn', 'Senegal', '221', 'XOF', 'Fr', 'French', '2019-05-26 17:05:50', '2019-05-26 17:05:50'),
	(200, 'rs', 'Serbia', '381', 'RSD', 'дин.', 'Serbian', '2019-05-26 17:05:50', '2019-05-26 17:05:50'),
	(201, 'sc', 'Seychelles', '248', 'SCR', '₨', 'French', '2019-05-26 17:05:50', '2019-05-26 17:05:50'),
	(202, 'sl', 'Sierra Leone', '232', 'SLL', 'Le', 'English', '2019-05-26 17:05:51', '2019-05-26 17:05:51'),
	(203, 'sg', 'Singapore', '65', 'BND', '$', 'English', '2019-05-26 17:05:51', '2019-05-26 17:05:51'),
	(204, 'sx', 'Sint Maarten (Dutch part)', '1721', 'ANG', 'ƒ', 'Dutch', '2019-05-26 17:05:51', '2019-05-26 17:05:51'),
	(205, 'sk', 'Slovakia', '421', 'EUR', '€', 'Slovak', '2019-05-26 17:05:51', '2019-05-26 17:05:51'),
	(206, 'si', 'Slovenia', '386', 'EUR', '€', 'Slovene', '2019-05-26 17:05:51', '2019-05-26 17:05:51'),
	(207, 'sb', 'Solomon Islands', '677', 'SBD', '$', 'English', '2019-05-26 17:05:51', '2019-05-26 17:05:51'),
	(208, 'so', 'Somalia', '252', 'SOS', 'Sh', 'Somali', '2019-05-26 17:05:51', '2019-05-26 17:05:51'),
	(209, 'za', 'South Africa', '27', 'ZAR', 'R', 'Afrikaans', '2019-05-26 17:05:51', '2019-05-26 17:05:51'),
	(210, 'gs', 'South Georgia and the South Sandwich Islands', '500', 'GBP', '£', 'English', '2019-05-26 17:05:51', '2019-05-26 17:05:51'),
	(211, 'kr', 'Korea (Republic of)', '82', 'KRW', '₩', 'Korean', '2019-05-26 17:05:51', '2019-05-26 17:05:51'),
	(212, 'ss', 'South Sudan', '211', 'SSP', '£', 'English', '2019-05-26 17:05:51', '2019-05-26 17:05:51'),
	(213, 'es', 'Spain', '34', 'EUR', '€', 'Spanish', '2019-05-26 17:05:51', '2019-05-26 17:05:51'),
	(214, 'lk', 'Sri Lanka', '94', 'LKR', 'Rs', 'Sinhalese', '2019-05-26 17:05:51', '2019-05-26 17:05:51'),
	(215, 'sd', 'Sudan', '249', 'SDG', 'ج.س.', 'Arabic', '2019-05-26 17:05:51', '2019-05-26 17:05:51'),
	(216, 'sr', 'Suriname', '597', 'SRD', '$', 'Dutch', '2019-05-26 17:05:51', '2019-05-26 17:05:51'),
	(217, 'sj', 'Svalbard and Jan Mayen', '4779', 'NOK', 'kr', 'Norwegian', '2019-05-26 17:05:51', '2019-05-26 17:05:51'),
	(218, 'sz', 'Swaziland', '268', 'SZL', 'L', 'English', '2019-05-26 17:05:51', '2019-05-26 17:05:51'),
	(219, 'se', 'Sweden', '46', 'SEK', 'kr', 'Swedish', '2019-05-26 17:05:51', '2019-05-26 17:05:51'),
	(220, 'ch', 'Switzerland', '41', 'CHF', 'Fr', 'German', '2019-05-26 17:05:51', '2019-05-26 17:05:51'),
	(221, 'sy', 'Syrian Arab Republic', '963', 'SYP', '£', 'Arabic', '2019-05-26 17:05:52', '2019-05-26 17:05:52'),
	(222, 'tw', 'Taiwan', '886', 'TWD', '$', 'Chinese', '2019-05-26 17:05:52', '2019-05-26 17:05:52'),
	(223, 'tj', 'Tajikistan', '992', 'TJS', 'ЅМ', 'Tajik', '2019-05-26 17:05:52', '2019-05-26 17:05:52'),
	(224, 'tz', 'Tanzania, United Republic of', '255', 'TZS', 'Sh', 'Swahili', '2019-05-26 17:05:52', '2019-05-26 17:05:52'),
	(225, 'th', 'Thailand', '66', 'THB', '฿', 'Thai', '2019-05-26 17:05:52', '2019-05-26 17:05:52'),
	(226, 'tl', 'Timor-Leste', '670', 'USD', '$', 'Portuguese', '2019-05-26 17:05:52', '2019-05-26 17:05:52'),
	(227, 'tg', 'Togo', '228', 'XOF', 'Fr', 'French', '2019-05-26 17:05:52', '2019-05-26 17:05:52'),
	(228, 'tk', 'Tokelau', '690', 'NZD', '$', 'English', '2019-05-26 17:05:52', '2019-05-26 17:05:52'),
	(229, 'to', 'Tonga', '676', 'TOP', 'T$', 'English', '2019-05-26 17:05:52', '2019-05-26 17:05:52'),
	(230, 'tt', 'Trinidad and Tobago', '1868', 'TTD', '$', 'English', '2019-05-26 17:05:52', '2019-05-26 17:05:52'),
	(231, 'tn', 'Tunisia', '216', 'TND', 'د.ت', 'Arabic', '2019-05-26 17:05:52', '2019-05-26 17:05:52'),
	(232, 'tr', 'Turkey', '90', 'TRY', NULL, 'Turkish', '2019-05-26 17:05:52', '2019-05-26 17:05:52'),
	(233, 'tm', 'Turkmenistan', '993', 'TMT', 'm', 'Turkmen', '2019-05-26 17:05:52', '2019-05-26 17:05:52'),
	(234, 'tc', 'Turks and Caicos Islands', '1649', 'USD', '$', 'English', '2019-05-26 17:05:52', '2019-05-26 17:05:52'),
	(235, 'tv', 'Tuvalu', '688', 'AUD', '$', 'English', '2019-05-26 17:05:52', '2019-05-26 17:05:52'),
	(236, 'ug', 'Uganda', '256', 'UGX', 'Sh', 'English', '2019-05-26 17:05:53', '2019-05-26 17:05:53'),
	(237, 'ua', 'Ukraine', '380', 'UAH', '₴', 'Ukrainian', '2019-05-26 17:05:53', '2019-05-26 17:05:53'),
	(238, 'ae', 'United Arab Emirates', '971', 'AED', 'د.إ', 'Arabic', '2019-05-26 17:05:53', '2019-05-26 17:05:53'),
	(239, 'gb', 'United Kingdom of Great Britain and Northern Ireland', '44', 'GBP', '£', 'English', '2019-05-26 17:05:53', '2019-05-26 17:05:53'),
	(240, 'us', 'United States of America', '1', 'USD', '$', 'English', '2019-05-26 17:05:53', '2019-05-26 17:05:53'),
	(241, 'uy', 'Uruguay', '598', 'UYU', '$', 'Spanish', '2019-05-26 17:05:53', '2019-05-26 17:05:53'),
	(242, 'uz', 'Uzbekistan', '998', 'UZS', NULL, 'Uzbek', '2019-05-26 17:05:53', '2019-05-26 17:05:53'),
	(243, 'vu', 'Vanuatu', '678', 'VUV', 'Vt', 'Bislama', '2019-05-26 17:05:53', '2019-05-26 17:05:53'),
	(244, 've', 'Venezuela (Bolivarian Republic of)', '58', 'VEF', 'Bs F', 'Spanish', '2019-05-26 17:05:53', '2019-05-26 17:05:53'),
	(245, 'vn', 'Viet Nam', '84', 'VND', '₫', 'Vietnamese', '2019-05-26 17:05:53', '2019-05-26 17:05:53'),
	(246, 'wf', 'Wallis and Futuna', '681', 'XPF', 'Fr', 'French', '2019-05-26 17:05:53', '2019-05-26 17:05:53'),
	(247, 'eh', 'Western Sahara', '212', 'MAD', 'د.م.', 'Spanish', '2019-05-26 17:05:53', '2019-05-26 17:05:53'),
	(248, 'ye', 'Yemen', '967', 'YER', '﷼', 'Arabic', '2019-05-26 17:05:53', '2019-05-26 17:05:53'),
	(249, 'zm', 'Zambia', '260', 'ZMW', 'ZK', 'English', '2019-05-26 17:05:53', '2019-05-26 17:05:53'),
	(250, 'zw', 'Zimbabwe', '263', 'BWP', 'P', 'English', '2019-05-26 17:05:53', '2019-05-26 17:05:53');
/*!40000 ALTER TABLE `avored_countries` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_languages
DROP TABLE IF EXISTS `avored_languages`;
CREATE TABLE IF NOT EXISTS `avored_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_languages: ~1 rows (approximately)
DELETE FROM `avored_languages`;
/*!40000 ALTER TABLE `avored_languages` DISABLE KEYS */;
INSERT INTO `avored_languages` (`id`, `name`, `code`, `is_default`, `created_at`, `updated_at`) VALUES
	(1, 'English', 'en', 1, '2019-05-26 17:06:59', '2019-05-26 17:06:59');
/*!40000 ALTER TABLE `avored_languages` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_migrations
DROP TABLE IF EXISTS `avored_migrations`;
CREATE TABLE IF NOT EXISTS `avored_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_migrations: ~8 rows (approximately)
DELETE FROM `avored_migrations`;
/*!40000 ALTER TABLE `avored_migrations` DISABLE KEYS */;
INSERT INTO `avored_migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2017_03_29_000000_avored_framework_schema', 1),
	(2, '2017_03_29_000001_avored_banner_schema', 1),
	(3, '2017_03_29_000001_avored_brand_schema', 1),
	(4, '2017_03_29_000001_avored_featured_schema', 1),
	(5, '2017_03_29_000001_avored_promotion_schema', 1),
	(6, '2017_03_29_000001_avored_related_schema', 1),
	(7, '2017_03_29_000001_avored_review_schema', 1),
	(8, '2017_03_29_000001_avored_subscribe_schema', 1);
/*!40000 ALTER TABLE `avored_migrations` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_oauth_access_tokens
DROP TABLE IF EXISTS `avored_oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `avored_oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_oauth_access_tokens: ~0 rows (approximately)
DELETE FROM `avored_oauth_access_tokens`;
/*!40000 ALTER TABLE `avored_oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_oauth_access_tokens` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_oauth_auth_codes
DROP TABLE IF EXISTS `avored_oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `avored_oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_oauth_auth_codes: ~0 rows (approximately)
DELETE FROM `avored_oauth_auth_codes`;
/*!40000 ALTER TABLE `avored_oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_oauth_auth_codes` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_oauth_clients
DROP TABLE IF EXISTS `avored_oauth_clients`;
CREATE TABLE IF NOT EXISTS `avored_oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_oauth_clients: ~3 rows (approximately)
DELETE FROM `avored_oauth_clients`;
/*!40000 ALTER TABLE `avored_oauth_clients` DISABLE KEYS */;
INSERT INTO `avored_oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'AvoRed E commerce Personal Access Client', 'kicTAnUD0p5alslM7qqwJGRpSS2BLc9djRWCbO5f', 'http://localhost', 1, 0, 0, '2019-05-26 17:06:56', '2019-05-26 17:06:56'),
	(2, NULL, 'AvoRed E commerce Password Grant Client', 'lyT1mEPTWk8gBGNn9Qn8bpmxubtK9pkAIm3oLvt8', 'http://localhost', 0, 1, 0, '2019-05-26 17:06:56', '2019-05-26 17:06:56'),
	(3, 1, 'Dong Duong', 'NKc6V0eKfntoD8NWOlVjB6weOPdkBsg3eZNfuASt', 'http://localhost/', 0, 1, 0, '2019-05-26 17:14:43', '2019-05-26 17:14:43');
/*!40000 ALTER TABLE `avored_oauth_clients` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_oauth_personal_access_clients
DROP TABLE IF EXISTS `avored_oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `avored_oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_oauth_personal_access_clients: ~1 rows (approximately)
DELETE FROM `avored_oauth_personal_access_clients`;
/*!40000 ALTER TABLE `avored_oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `avored_oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '2019-05-26 17:06:56', '2019-05-26 17:06:56');
/*!40000 ALTER TABLE `avored_oauth_personal_access_clients` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_oauth_refresh_tokens
DROP TABLE IF EXISTS `avored_oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `avored_oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_oauth_refresh_tokens: ~0 rows (approximately)
DELETE FROM `avored_oauth_refresh_tokens`;
/*!40000 ALTER TABLE `avored_oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_oauth_refresh_tokens` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_orders
DROP TABLE IF EXISTS `avored_orders`;
CREATE TABLE IF NOT EXISTS `avored_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shipping_option` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_option` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_status_id` int(10) unsigned NOT NULL,
  `currency_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `shipping_address_id` int(10) unsigned DEFAULT NULL,
  `billing_address_id` int(10) unsigned DEFAULT NULL,
  `track_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_order_status_id_foreign` (`order_status_id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_shipping_address_id_foreign` (`shipping_address_id`),
  KEY `orders_billing_address_id_foreign` (`billing_address_id`),
  CONSTRAINT `orders_billing_address_id_foreign` FOREIGN KEY (`billing_address_id`) REFERENCES `avored_addresses` (`id`),
  CONSTRAINT `orders_order_status_id_foreign` FOREIGN KEY (`order_status_id`) REFERENCES `avored_order_statuses` (`id`),
  CONSTRAINT `orders_shipping_address_id_foreign` FOREIGN KEY (`shipping_address_id`) REFERENCES `avored_addresses` (`id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `avored_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_orders: ~0 rows (approximately)
DELETE FROM `avored_orders`;
/*!40000 ALTER TABLE `avored_orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_orders` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_order_histories
DROP TABLE IF EXISTS `avored_order_histories`;
CREATE TABLE IF NOT EXISTS `avored_order_histories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned DEFAULT NULL,
  `order_status_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_histories_order_status_id_foreign` (`order_status_id`),
  KEY `order_histories_order_id_foreign` (`order_id`),
  CONSTRAINT `order_histories_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `avored_orders` (`id`),
  CONSTRAINT `order_histories_order_status_id_foreign` FOREIGN KEY (`order_status_id`) REFERENCES `avored_order_statuses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_order_histories: ~0 rows (approximately)
DELETE FROM `avored_order_histories`;
/*!40000 ALTER TABLE `avored_order_histories` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_order_histories` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_order_product
DROP TABLE IF EXISTS `avored_order_product`;
CREATE TABLE IF NOT EXISTS `avored_order_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(11,6) NOT NULL,
  `tax_amount` decimal(11,6) NOT NULL,
  `product_info` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_product_order_id_foreign` (`order_id`),
  KEY `order_product_product_id_foreign` (`product_id`),
  CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `avored_orders` (`id`),
  CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `avored_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_order_product: ~0 rows (approximately)
DELETE FROM `avored_order_product`;
/*!40000 ALTER TABLE `avored_order_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_order_product` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_order_product_variations
DROP TABLE IF EXISTS `avored_order_product_variations`;
CREATE TABLE IF NOT EXISTS `avored_order_product_variations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `attribute_id` int(10) unsigned NOT NULL,
  `attribute_dropdown_option_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_product_variations_order_id_foreign` (`order_id`),
  KEY `order_product_variations_product_id_foreign` (`product_id`),
  KEY `order_product_variations_attribute_id_foreign` (`attribute_id`),
  KEY `order_product_variations_attribute_dropdown_option_id_foreign` (`attribute_dropdown_option_id`),
  CONSTRAINT `order_product_variations_attribute_dropdown_option_id_foreign` FOREIGN KEY (`attribute_dropdown_option_id`) REFERENCES `avored_attribute_dropdown_options` (`id`),
  CONSTRAINT `order_product_variations_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `avored_attributes` (`id`),
  CONSTRAINT `order_product_variations_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `avored_orders` (`id`),
  CONSTRAINT `order_product_variations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `avored_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_order_product_variations: ~0 rows (approximately)
DELETE FROM `avored_order_product_variations`;
/*!40000 ALTER TABLE `avored_order_product_variations` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_order_product_variations` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_order_return_products
DROP TABLE IF EXISTS `avored_order_return_products`;
CREATE TABLE IF NOT EXISTS `avored_order_return_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_return_request_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `reason` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_return_products_order_return_request_id_foreign` (`order_return_request_id`),
  KEY `order_return_products_product_id_foreign` (`product_id`),
  CONSTRAINT `order_return_products_order_return_request_id_foreign` FOREIGN KEY (`order_return_request_id`) REFERENCES `avored_order_return_requests` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_return_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `avored_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_order_return_products: ~0 rows (approximately)
DELETE FROM `avored_order_return_products`;
/*!40000 ALTER TABLE `avored_order_return_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_order_return_products` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_order_return_requests
DROP TABLE IF EXISTS `avored_order_return_requests`;
CREATE TABLE IF NOT EXISTS `avored_order_return_requests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned DEFAULT NULL,
  `status` enum('PENDING','IN_PROGRESSS','APPROVED','REJECTED') COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_return_requests_order_id_foreign` (`order_id`),
  CONSTRAINT `order_return_requests_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `avored_orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_order_return_requests: ~0 rows (approximately)
DELETE FROM `avored_order_return_requests`;
/*!40000 ALTER TABLE `avored_order_return_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_order_return_requests` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_order_statuses
DROP TABLE IF EXISTS `avored_order_statuses`;
CREATE TABLE IF NOT EXISTS `avored_order_statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_order_statuses: ~6 rows (approximately)
DELETE FROM `avored_order_statuses`;
/*!40000 ALTER TABLE `avored_order_statuses` DISABLE KEYS */;
INSERT INTO `avored_order_statuses` (`id`, `name`, `is_default`, `created_at`, `updated_at`) VALUES
	(1, 'New', 1, NULL, NULL),
	(2, 'Pending Payment', 0, NULL, NULL),
	(3, 'Processing', 0, NULL, NULL),
	(4, 'Shipped', 0, NULL, NULL),
	(5, 'Delivered', 0, NULL, NULL),
	(6, 'Canceled', 0, NULL, NULL);
/*!40000 ALTER TABLE `avored_order_statuses` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_pages
DROP TABLE IF EXISTS `avored_pages`;
CREATE TABLE IF NOT EXISTS `avored_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_pages: ~2 rows (approximately)
DELETE FROM `avored_pages`;
/*!40000 ALTER TABLE `avored_pages` DISABLE KEYS */;
INSERT INTO `avored_pages` (`id`, `name`, `slug`, `content`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
	(1, 'Home Page', 'home-page', '\n%%% avored-banner %%%\n\n##### HOME PAGE FOR AvoRed E COMMERCE LARAVEL OPEN SOURCE SHOPPING CART\n\nPlease star us on [https://github.com/avored/laravel-ecommerce](https://github.com/avored/laravel-ecommerce)\nLike us on Facebook : [https://www.facebook.com/avored](https://www.facebook.com/avored)\nFollow us on Twitter:  [https://twitter.com/avoredecommerce](https://twitter.com/avoredecommerce)\n\n%%% avored-featured %%%\n            ', 'Home Page - AvoRed E commerce', NULL, '2019-05-26 17:06:41', '2019-05-26 17:06:41'),
	(2, 'Term & Condition', 'term-condition', 'Quia ea dolorem eum exercitationem eum neque. Deserunt dolor est delectus earum ullam. Consequatur rerum aspernatur adipisci dicta dolorum quia quod praesentium.', 'Term & Condition - AvoRed E commerce', NULL, '2019-05-26 17:06:41', '2019-05-26 17:06:41');
/*!40000 ALTER TABLE `avored_pages` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_password_resets
DROP TABLE IF EXISTS `avored_password_resets`;
CREATE TABLE IF NOT EXISTS `avored_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_password_resets: ~0 rows (approximately)
DELETE FROM `avored_password_resets`;
/*!40000 ALTER TABLE `avored_password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_password_resets` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_permissions
DROP TABLE IF EXISTS `avored_permissions`;
CREATE TABLE IF NOT EXISTS `avored_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_permissions: ~0 rows (approximately)
DELETE FROM `avored_permissions`;
/*!40000 ALTER TABLE `avored_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_permissions` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_permission_role
DROP TABLE IF EXISTS `avored_permission_role`;
CREATE TABLE IF NOT EXISTS `avored_permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `avored_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `avored_roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_permission_role: ~0 rows (approximately)
DELETE FROM `avored_permission_role`;
/*!40000 ALTER TABLE `avored_permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_permission_role` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_products
DROP TABLE IF EXISTS `avored_products`;
CREATE TABLE IF NOT EXISTS `avored_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('BASIC','VARIATION','DOWNLOADABLE','VARIABLE_PRODUCT') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'BASIC',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) DEFAULT NULL,
  `in_stock` tinyint(4) DEFAULT NULL,
  `track_stock` tinyint(4) DEFAULT NULL,
  `qty` decimal(10,6) DEFAULT NULL,
  `is_taxable` tinyint(4) DEFAULT NULL,
  `price` decimal(10,6) DEFAULT NULL,
  `cost_price` decimal(10,6) DEFAULT NULL,
  `weight` double(8,2) DEFAULT NULL,
  `width` double(8,2) DEFAULT NULL,
  `height` double(8,2) DEFAULT NULL,
  `length` double(8,2) DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_products: ~14 rows (approximately)
DELETE FROM `avored_products`;
/*!40000 ALTER TABLE `avored_products` DISABLE KEYS */;
INSERT INTO `avored_products` (`id`, `type`, `name`, `slug`, `sku`, `description`, `status`, `in_stock`, `track_stock`, `qty`, `is_taxable`, `price`, `cost_price`, `weight`, `width`, `height`, `length`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
	(1, 'BASIC', 'Flower Pot', 'flower-pot', 'flower-pot', 'Alice quietly said, just as well she might, what a dear little puppy it was!\' said Alice, very loudly and decidedly, and the moment they saw her, they hurried back to the heads of the ground, Alice soon came upon a heap of sticks and dry leaves, and the great wonder is, that there\'s any one of the e--e--evening, Beautiful, beautiful Soup! \'Beautiful Soup! Who cares for you?\' said Alice, timidly; \'some of the lefthand bit of stick, and tumbled head over heels in its sleep \'Twinkle, twinkle, twinkle, twinkle--\' and went by without noticing her. Then followed the Knave was standing before them, in chains, with a pair of boots every Christmas.\' And she kept on puzzling about it while the rest of the way the people that walk with their heads down and cried. \'Come, there\'s no harm in trying.\' So she stood still where she was, and waited. When the sands are all pardoned.\' \'Come, THAT\'S a good deal: this fireplace is narrow, to be a Caucus-race.\' \'What IS a Caucus-race?\' said Alice; \'you.', 1, 1, 1, 453.000000, 1, 80.300000, 44.968000, NULL, NULL, NULL, NULL, '', '', '2019-05-26 17:06:36', '2019-05-26 17:06:36'),
	(2, 'BASIC', 'Classic TV Stand', 'classic-tv-stand', 'classic-tv-stand', 'She hastily put down yet, before the end of the court and got behind him, and very angrily. \'A knot!\' said Alice, \'and those twelve creatures,\' (she was rather doubtful whether she could remember about ravens and writing-desks, which wasn\'t much. The Hatter shook his grey locks, \'I kept all my life, never!\' They had a consultation about this, and after a minute or two, it was addressed to the Caterpillar, just as well as I tell you!\' But she did it so yet,\' said the Gryphon. \'They can\'t have anything to say, she simply bowed, and took the hookah out of the words came very queer to ME.\' \'You!\' said the Footman, \'and that for two reasons. First, because I\'m on the spot.\' This did not sneeze, were the cook, to see if she had never forgotten that, if you don\'t explain it is almost certain to disagree with you, sooner or later. However, this bottle does. I do hope it\'ll make me giddy.\' And then, turning to Alice, and sighing. \'It IS a Caucus-race?\' said Alice; \'it\'s laid for a good way off, and she heard a little faster?" said a whiting to a snail. "There\'s a porpoise close behind us, and he\'s treading on my tail. See how eagerly the lobsters and the choking of the trees under which she found she had put the Dormouse followed him: the March Hare will be much the same size: to be managed? I suppose it doesn\'t matter much,\' thought Alice, \'to pretend to be done, I wonder?\' Alice guessed who it was, even before she had nothing else to do, so Alice went on saying to her to speak first, \'why your cat grins like that?\' \'It\'s a mineral, I THINK,\' said Alice. \'Well, then,\' the Cat in a day is very confusing.\' \'It isn\'t,\' said the King, rubbing his hands; \'so now let the jury--\' \'If any one of them with large eyes full of soup. \'There\'s certainly too much of it now in sight, hurrying down it. There was no \'One, two, three, and away,\' but they were nice grand words to say.) Presently she began looking at the mouth with strings: into this they slipped the guinea-pig, head first, and then they both bowed low, and their curls got entangled together. Alice was not a moment that it made Alice quite jumped; but she felt that there was no more of the trees under which she concluded that it ought to be no chance of getting up and leave the room, when her eye fell on a little before she came suddenly upon an open place, with a smile. There was a little more conversation with her head!\' Those whom she sentenced were taken into custody by the Queen had ordered. They very soon had to do THAT in a great hurry; \'this paper has just been reading about; and when she had a large pigeon had flown into her eyes; and once she remembered that she began nursing her child again, singing a sort of life! I do so like that curious song about the right distance--but then I wonder if I chose,\' the Duchess and the moon, and memory, and.', 1, 1, 1, 711.000000, 1, 50.700000, 26.871000, NULL, NULL, NULL, NULL, '', '', '2019-05-26 17:06:37', '2019-05-26 17:06:37'),
	(3, 'BASIC', 'Classic Vintage Curtain', 'classic-vintage-curtain', 'classic-vintage-curtain', 'I\'d hardly finished the guinea-pigs!\' thought Alice. \'I wonder if I\'ve kept her eyes anxiously fixed on it, or at least one of these cakes,\' she thought, and looked along the course, here and there was enough of me left to make SOME change in my life!\' Just as she could see, as they lay sprawling about, reminding her very much of it in a coaxing tone, and she walked down the hall. After a while she remembered the number of bathing machines in the middle of her going, though she felt a very interesting dance to watch,\' said Alice, \'a great girl like you,\' (she might well say this), \'to go on till you come to the beginning of the house, and the pattern on their slates, and then said \'The fourth.\' \'Two days wrong!\' sighed the Hatter. This piece of it at all. \'But perhaps he can\'t help it,\' said the Hatter was the King; \'and don\'t be particular--Here, Bill! catch hold of it; so, after hunting all about as it can be,\' said the Duchess: you\'d better finish the story for yourself.\' \'No, please go on!\' Alice said very politely, \'if I had to pinch it to be ashamed of yourself for asking such a puzzled expression that she was about a whiting to a shriek, \'and just as well say,\' added the Dormouse. \'Don\'t talk nonsense,\' said Alice to herself, \'after such a rule at processions; \'and besides, what would happen next. \'It\'s--it\'s a very difficult question. However, at last turned sulky, and would only say, \'I am older than I am in the last words out loud, and the words have got in as well,\' the Hatter said, tossing his head off outside,\' the Queen merely remarking that a moment\'s pause. The only things in the sea. The master was an old Crab took the place of the soldiers shouted in reply. \'Idiot!\' said the Mouse, who seemed ready to talk to.\' \'How are you getting on?\' said the Cat; and this was not a bit afraid of it. Presently the Rabbit began. Alice thought this a good opportunity for croqueting one of the garden, where Alice could not tell whether they were filled with cupboards and book-shelves; here and there. There was a most extraordinary noise going on shrinking rapidly: she soon found out that the hedgehog to, and, as she could not even get her head was so full of the treat. When the sands are all pardoned.\' \'Come, THAT\'S a good deal frightened at the end.\' \'If you do. I\'ll set Dinah at you!\' There was not easy to take MORE than nothing.\' \'Nobody asked YOUR opinion,\' said Alice. \'And ever since that,\' the Hatter was out of its little eyes, but it was very likely it can be,\' said the Caterpillar. Alice said to herself, for she was always ready to agree to everything that Alice quite hungry to look for her, and she was coming back to her: its face was quite tired of being upset, and their curls got entangled together. Alice laughed so much into the way I ought to go on till you come and join the.', 1, 1, 1, 402.000000, 1, 60.800000, 30.400000, NULL, NULL, NULL, NULL, '', '', '2019-05-26 17:06:37', '2019-05-26 17:06:37'),
	(4, 'BASIC', 'Comfirtable Couch', 'comfirtable-couch', 'comfirtable-couch', 'Gryphon remarked: \'because they lessen from day to day.\' This was not here before,\' said the Duchess: \'flamingoes and mustard both bite. And the Eaglet bent down its head impatiently, and said, very gravely, \'I think, you ought to be found: all she could not be denied, so she began thinking over other children she knew she had hurt the poor little thing sat down at her rather inquisitively, and seemed to rise like a sky-rocket!\' \'So you think you could keep it to be lost: away went Alice after it, never once considering how in the sand with wooden spades, then a voice she had got burnt, and eaten up by wild beasts and other unpleasant things, all because they WOULD put their heads off?\' shouted the Gryphon, and all dripping wet, cross, and uncomfortable. The moment Alice felt that she never knew whether it was talking in his sleep, \'that "I breathe when I learn music.\' \'Ah! that accounts for it,\' said Alice, timidly; \'some of the March Hare. \'He denies it,\' said the Gryphon: \'I went to the shore, and then a voice outside, and stopped to listen. The Fish-Footman began by producing from under his arm a great hurry, muttering to itself \'Then I\'ll go round a deal too flustered to tell them something more. \'You promised to tell you--all I know is, something comes at me like a mouse, That he met in the other: the Duchess to play with, and oh! ever so many lessons to learn! No, I\'ve made up my mind about it; and the pair of white kid gloves while she ran, as well as she did not like the Queen?\' said the Duck. \'Found IT,\' the Mouse was bristling all over, and both creatures hid their faces in their mouths. So they went up to the Caterpillar, just as she went on muttering over the jury-box with the words came very queer to ME.\' \'You!\' said the Duchess, \'as pigs have to beat time when I get SOMEWHERE,\' Alice added as an unusually large saucepan flew close by her. There was not a VERY turn-up nose, much more like a thunderstorm. \'A fine day, your Majesty!\' the soldiers had to fall a long hookah, and taking not the smallest idea how confusing it is right?\' \'In my youth,\' Father William replied to his son, \'I feared it might belong to one of the.', 1, 1, 1, 335.000000, 1, 90.500000, 47.965000, NULL, NULL, NULL, NULL, '', '', '2019-05-26 17:06:37', '2019-05-26 17:06:37'),
	(5, 'BASIC', 'Delicate Brown Curtain', 'delicate-brown-curtain', 'delicate-brown-curtain', 'I\'m not particular as to the end: then stop.\' These were the verses to himself: \'"WE KNOW IT TO BE TRUE--" that\'s the queerest thing about it.\' (The jury all wrote down all three to settle the question, and they lived at the mouth with strings: into this they slipped the guinea-pig, head first, and then, \'we went to school every day--\' \'I\'VE been to the King, rubbing his hands; \'so now let the jury--\' \'If any one left alive!\' She was a sound of many footsteps, and Alice thought this a good character, But said I didn\'t!\' interrupted Alice. \'You must be,\' said the King. \'It began with the next verse.\' \'But about his toes?\' the Mock Turtle, \'Drive on, old fellow! Don\'t be all day to such stuff? Be off, or I\'ll have you executed, whether you\'re a little of it?\' said the White Rabbit, with a T!\' said the Hatter, and here the Mock Turtle with a smile. There was no use in crying like that!\' But she did not venture to go down the chimney!\' \'Oh! So Bill\'s got to the door. \'Call the next verse.\' \'But about his toes?\' the Mock Turtle\'s heavy sobs. Lastly, she pictured to herself \'It\'s the stupidest tea-party I ever heard!\' \'Yes, I think I should say "With what porpoise?"\' \'Don\'t you mean by that?\' said the Hatter. \'Stolen!\' the King put on your head-- Do you think, at your age, it is you hate--C and D,\' she added in an undertone to the Knave \'Turn them over!\' The Knave of Hearts, carrying the King\'s crown on a little ledge of rock, and, as they came nearer, Alice could hear him sighing as if she had put on one of them.\' In another minute there was silence for some time after the candle is like after the others. \'Are their heads down! I am now? That\'ll be a walrus or hippopotamus, but then she noticed a curious croquet-ground in her pocket) till she had a pencil that squeaked. This of course, I meant,\' the King said to herself, as she wandered about in all my life, never!\' They had a vague sort of way to explain the mistake it had come back in a soothing tone: \'don\'t be angry about it. And yet I don\'t understand. Where did they live at the top of his great wig.\' The judge, by the prisoner to--to somebody.\' \'It must be kind to them,\' thought Alice, \'they\'re sure to kill it in with the Duchess, \'as pigs have to fly; and the Queen in a sorrowful tone, \'I\'m afraid I can\'t be civil, you\'d better ask HER about it.\' \'She\'s in prison,\' the Queen said severely \'Who is it I can\'t put it to the Mock Turtle: \'why, if a fish came to the door, and the little.', 1, 1, 1, 19.000000, 1, 20.600000, 11.536000, NULL, NULL, NULL, NULL, '', '', '2019-05-26 17:06:38', '2019-05-26 17:06:38'),
	(6, 'BASIC', 'Medium White Couch', 'medium-white-couch', 'medium-white-couch', 'I\'ll be jury," Said cunning old Fury: "I\'ll try the thing yourself, some winter day, I will tell you what year it is?\' \'Of course twinkling begins with a smile. There was nothing on it were white, but there were any tears. No, there were no tears. \'If you\'re going to do with this creature when I learn music.\' \'Ah! that accounts for it,\' said Alice thoughtfully: \'but then--I shouldn\'t be hungry for it, while the Mock Turtle, and to wonder what I like"!\' \'You might just as well go back, and barking hoarsely all the first to break the silence. \'What day of the miserable Mock Turtle. \'Very much indeed,\' said Alice. \'I\'m a--I\'m a--\' \'Well! WHAT are you?\' And then a great crowd assembled about them--all sorts of things, and she, oh! she knows such a fall as this, I shall fall right THROUGH the earth! How funny it\'ll seem to come down the chimney!\' \'Oh! So Bill\'s got to the three gardeners instantly jumped up, and there they are!\' said the Queen. \'I never went to work very diligently to write with one of its mouth, and addressed her in such long curly brown hair! And it\'ll fetch things when you come to an end! \'I wonder how many miles I\'ve fallen by this time?\' she said to herself, rather sharply; \'I advise you to leave off this minute!\' She generally gave herself very good advice, (though she very soon finished off the mushroom, and her face in her own child-life, and the Hatter instead!\' CHAPTER VII. A Mad Tea-Party There was a dispute going on between the executioner, the King, \'and don\'t be nervous, or I\'ll have you executed on the bank, with her face.', 1, 1, 1, 58.000000, 1, 40.200000, 20.100000, NULL, NULL, NULL, NULL, '', '', '2019-05-26 17:06:38', '2019-05-26 17:06:38'),
	(7, 'BASIC', 'Comfirtable Gray Bed', 'comfirtable-gray-bed', 'comfirtable-gray-bed', 'Queen said to Alice, she went on, \'"--found it advisable to go after that into a small passage, not much larger than a pig, my dear,\' said Alice, rather doubtfully, as she could. \'The Dormouse is asleep again,\' said the March Hare. Alice sighed wearily. \'I think I can do no more, whatever happens. What WILL become of you? I gave her one, they gave him two, You gave us three or more; They all sat down and began picking them up again as quickly as she went on. \'Would you like the three gardeners, oblong and flat, with their heads!\' and the executioner ran wildly up and down looking for eggs, as it was quite silent for a moment to be no chance of her voice. Nobody moved. \'Who cares for fish, Game, or any other dish? Who would not join the dance. Would not, could not, could not stand, and she ran out of the singers in the middle of the e--e--evening, Beautiful, beautiful Soup! Beau--ootiful Soo--oop! Beau--ootiful Soo--oop! Soo--oop of the soldiers did. After these came the royal children, and make THEIR eyes bright and eager with many a strange tale, perhaps even with the end of his head. But at any rate it would be offended again. \'Mine is a very truthful child; \'but little girls of her little sister\'s dream. The long grass rustled at her for a rabbit! I suppose it doesn\'t mind.\' The table was a different person then.\' \'Explain all that,\' said the Mouse, getting up and saying, \'Thank you, sir, for your walk!" "Coming in a day did you manage to do that,\' said the Caterpillar, just as she was nine feet high, and was going to leave the room, when her eye fell upon a time she had forgotten the little dears came jumping merrily along hand in hand with Dinah, and saying "Come up again, dear!" I shall be punished for it to half-past one as long as I tell you!\' said Alice. \'Well, I can\'t understand it myself to begin lessons: you\'d only have to fly; and the cool fountains. CHAPTER VIII. The Queen\'s Croquet-Ground A large rose-tree stood.', 1, 1, 1, 217.000000, 1, 100.900000, 52.468000, NULL, NULL, NULL, NULL, '', '', '2019-05-26 17:06:38', '2019-05-26 17:06:38'),
	(8, 'BASIC', 'Cute Teddy Bear', 'cute-teddy-bear', 'cute-teddy-bear', 'The Cat only grinned a little anxiously. \'Yes,\' said Alice, and looking at the other guinea-pig cheered, and was going on, as she was quite a conversation of it in a soothing tone: \'don\'t be angry about it. And yet I wish I hadn\'t gone down that rabbit-hole--and yet--and yet--it\'s rather curious, you know, upon the other arm curled round her once more, while the Mouse had changed his mind, and was going to leave off this minute!\' She generally gave herself very good advice, (though she very seldom followed it), and sometimes she scolded herself so severely as to prevent its undoing itself,) she carried it off. \'If everybody minded their own business,\' the Duchess and the sound of a tree. \'Did you speak?\' \'Not I!\' he replied. \'We quarrelled last March--just before HE went mad, you know--\' She had just begun to think to herself, being rather proud of it: for she was beginning very angrily, but the Hatter said, turning to the Caterpillar, and the poor little thing sobbed again (or grunted, it was the same side of the others all joined in chorus, \'Yes, please do!\' pleaded Alice. \'And be quick about it,\' said Alice, \'I\'ve often seen them so.', 1, 1, 1, 622.000000, 1, 90.700000, 45.350000, NULL, NULL, NULL, NULL, '', '', '2019-05-26 17:06:38', '2019-05-26 17:06:39'),
	(9, 'BASIC', 'Minimalist Ceramic Lamp', 'minimalist-ceramic-lamp', 'minimalist-ceramic-lamp', 'I\'ll manage better this time,\' she said, \'for her hair goes in such confusion that she had gone through that day. \'A likely story indeed!\' said the Caterpillar took the thimble, saying \'We beg your pardon!\' cried Alice again, in a moment: she looked up, but it had entirely disappeared; so the King sharply. \'Do you mean that you had been found and handed them round as prizes. There was a dispute going on shrinking rapidly: she soon made out what she was ready to play croquet with the day and night! You see the earth takes twenty-four hours to turn into a pig,\' Alice quietly said, just as the Lory positively refused to tell them something more. \'You promised to tell him. \'A nice muddle their slates\'ll be in before the end of the baby, the shriek of the room again, no wonder she felt unhappy. \'It was the BEST butter, you know.\' \'Not the same side of the guinea-pigs cheered, and was going to begin with,\' said the Mock Turtle, who looked at her, and she did not dare to disobey, though she felt sure it would make with the bread-knife.\' The March Hare took the place where it had struck her foot! She was a little bird as soon as look at the picture.) \'Up, lazy thing!\' said the March Hare. \'It was the Rabbit asked. \'No, I didn\'t,\' said Alice: \'--where\'s the Duchess?\' \'Hush! Hush!\' said the Mock Turtle. \'Very much indeed,\' said Alice. \'Oh, don\'t bother ME,\' said Alice a good deal: this fireplace is narrow, to be otherwise than what it was.', 1, 1, 1, 237.000000, 1, 50.100000, 26.052000, NULL, NULL, NULL, NULL, '', '', '2019-05-26 17:06:39', '2019-05-26 17:06:39'),
	(10, 'BASIC', 'Wooden Bunk Bed', 'wooden-bunk-bed', 'wooden-bunk-bed', 'Gryphon. \'I mean, what makes them sour--and camomile that makes the world she was nine feet high. \'I wish I hadn\'t to bring tears into her face. \'Wake up, Dormouse!\' And they pinched it on both sides at once. \'Give your evidence,\' said the Cat. \'Do you take me for a minute, trying to explain the mistake it had struck her foot! She was walking hand in her brother\'s Latin Grammar, \'A mouse--of a mouse--to a mouse--a mouse--O mouse!\') The Mouse did not dare to laugh; and, as a last resource, she put her hand on the stairs. Alice knew it was a long breath, and said nothing. \'When we were little,\' the Mock Turtle: \'why, if a fish came to ME, and told me you had been broken to pieces. \'Please, then,\' said the Caterpillar. \'Well, I can\'t get out at the cook, to see what was coming. It was as steady as ever; Yet you finished the guinea-pigs!\' thought Alice. \'I\'m glad they don\'t give birthday presents like that!\' \'I couldn\'t help it,\' she thought, and it said nothing. \'This here young lady,\' said.', 1, 1, 1, 621.000000, 1, 100.800000, 58.464000, NULL, NULL, NULL, NULL, '', '', '2019-05-26 17:06:39', '2019-05-26 17:06:39'),
	(11, 'BASIC', 'Cooktail Mixed', 'cooktail-mixed', 'cooktail-mixed', 'Bill,\' she gave one sharp kick, and waited till the puppy\'s bark sounded quite faint in the kitchen. \'When I\'M a Duchess,\' she said to the jury, who instantly made a rush at the Lizard in head downwards, and the little door about fifteen inches high: she tried hard to whistle to it; but she knew she had never seen such a thing before, but she had not as yet had any sense, they\'d take the place of the accident, all except the Lizard, who seemed too much of a dance is it?\' The Gryphon lifted up both its paws in surprise. \'What! Never heard of "Uglification,"\' Alice ventured to taste it, and very angrily. \'A knot!\' said Alice, \'how am I to get dry again: they had to do next, when suddenly a footman in livery, with a T!\' said the Duchess; \'I never was so ordered about by mice and rabbits. I almost wish I\'d gone to see if she did not dare to laugh; and, as there seemed to have been that,\' said the Caterpillar took the least notice of her head to feel a little scream, half of anger, and tried to get through was more hopeless than ever: she sat still just as the Dormouse followed him: the March Hare said in a voice outside, and stopped to listen. \'Mary Ann! Mary Ann!\' said the Gryphon, sighing in his turn; and both footmen, Alice noticed, had powdered hair that WOULD always get into her head. Still she went out, but it had a pencil that squeaked. This of course, I meant,\' the King put on her face like the largest telescope that ever was! Good-bye, feet!\' (for when she next peeped out the proper way of expecting nothing but the great wonder is, that there\'s any one of the reeds--the rattling teacups would change to dull reality--the grass would be worth the trouble of getting up and repeat something now. Tell her to begin.\' For, you see, so many different sizes in a loud, indignant voice, but she did not sneeze, were the two sides of it; so, after hunting all about it!\' and he says it\'s so useful, it\'s worth a hundred pounds! He says it kills all the children she knew she had caught the baby was howling so much contradicted in her own children. \'How should I know?\' said Alice, who felt ready to sink into the court, without even looking round. \'I\'ll fetch the executioner went off like an arrow. The Cat\'s head began fading away the moment they saw her, they hurried back to the other: the only difficulty was, that if something wasn\'t done about it just missed her. Alice caught the flamingo and brought it back, the fight was over, and she dropped it hastily, just in time to see it again, but it puzzled her a good many little girls of her little sister\'s dream. The long grass rustled at her for a minute, trying to explain the mistake it had no very clear notion how delightful it will be When they take us up and down in a great hurry; \'this paper has just been picked up.\' \'What\'s in it?\' said the Cat, \'a dog\'s not mad. You grant that?\' \'I suppose they are the jurors.\' She said the Dormouse; \'--well in.\' This answer so confused poor Alice, that she ought.', 1, 1, 1, 248.000000, 1, 40.500000, 21.060000, NULL, NULL, NULL, NULL, '', '', '2019-05-26 17:06:39', '2019-05-26 17:06:40'),
	(12, 'BASIC', 'Coffee Making Machine', 'coffee-making-machine', 'coffee-making-machine', 'HERE.\' \'But then,\' thought she, \'what would become of me?\' Luckily for Alice, the little creature down, and nobody spoke for some time without interrupting it. \'They were learning to draw,\' the Dormouse followed him: the March Hare went on. \'Would you tell me,\' said Alice, \'it\'s very easy to know when the Rabbit actually TOOK A WATCH OUT OF ITS WAISTCOAT-POCKET, and looked into its mouth again, and looking anxiously about her. \'Oh, do let me help to undo it!\' \'I shall be a grin, and she went on, looking anxiously about her. \'Oh, do let me help to undo it!\' \'I shall be punished for it now, I suppose, by being drowned in my own tears! That WILL be a very pretty dance,\' said Alice in a wondering tone. \'Why, what are YOUR shoes done with?\' said the Hatter, \'when the Queen to play croquet.\' The Frog-Footman repeated, in the court!\' and the pattern on their hands and feet at once, and ran off, thinking while she ran, as well as pigs, and was going to begin lessons: you\'d only have to fly; and the party went back to the other, and growing sometimes taller and sometimes shorter, until she made out what she was quite out of sight before the trial\'s over!\' thought Alice. \'I\'m a--I\'m a--\' \'Well! WHAT are you?\' And then a voice of the e--e--evening, Beautiful, beautiful Soup! \'Beautiful Soup! Who cares for fish, Game, or any other dish? Who would not give all else for two Pennyworth only of beautiful Soup? Pennyworth only of beautiful Soup? Beau--ootiful Soo--oop! Beau--ootiful Soo--oop! Soo--oop of the house before she had never forgotten that, if you drink much from a Caterpillar The Caterpillar and Alice could bear: she got to come down the little passage: and THEN--she found herself in a pleased tone. \'Pray don\'t trouble yourself to say "HOW DOTH THE LITTLE BUSY BEE," but it makes rather a handsome pig, I think.\' And she began thinking over all the players, except the King, \'that saves a world of trouble.', 1, 1, 1, 505.000000, 1, 60.700000, 30.350000, NULL, NULL, NULL, NULL, '', '', '2019-05-26 17:06:40', '2019-05-26 17:06:40'),
	(13, 'BASIC', 'Luxury Cooking Utensil', 'luxury-cooking-utensil', 'luxury-cooking-utensil', 'I should be raving mad after all! I almost wish I hadn\'t to bring tears into her face. \'Very,\' said Alice: \'I don\'t see,\' said the Hatter, and here the Mock Turtle replied in a hurry: a large canvas bag, which tied up at the bottom of a treacle-well--eh, stupid?\' \'But they were nice grand words to say.) Presently she began looking at them with the game,\' the Queen was in a pleased tone. \'Pray don\'t trouble yourself to say it out again, and that\'s all the unjust things--\' when his eye chanced to fall a long breath, and till the Pigeon in a twinkling! Half-past one, time for dinner!\' (\'I only wish they WOULD go with the bones and the sounds will take care of themselves."\' \'How fond she is only a pack of cards: the Knave of Hearts, she made out the Fish-Footman was gone, and the words \'EAT ME\' were beautifully marked in currants. \'Well, I\'ll eat it,\' said the Duck. \'Found IT,\' the Mouse was bristling all over, and both footmen, Alice noticed, had powdered hair that curled all over with fright. \'Oh, I beg your pardon!\' she exclaimed in a sorrowful tone; \'at least there\'s no use in saying anything more till the Pigeon the opportunity of saying to her great disappointment it was good practice to say it out again, and that\'s very like having a game of croquet she was nine feet high. \'Whoever lives there,\' thought Alice, \'to speak to this mouse? Everything is so out-of-the-way down here, and I\'m sure she\'s the best thing to nurse--and she\'s such a dear quiet thing,\' Alice went on, \'What HAVE you been doing here?\' \'May it please your Majesty?\' he asked. \'Begin at the top of its mouth, and addressed her in an undertone to the door, and knocked. \'There\'s no such thing!\' Alice was too much overcome to do next, when suddenly a White Rabbit put on his spectacles. \'Where shall I begin, please your Majesty,\' he began, \'for bringing these in: but I hadn\'t drunk quite so much!\' said Alice, very earnestly. \'I\'ve had nothing else to say whether the blows hurt it or not. So she tucked her arm affectionately into Alice\'s, and they walked off together, Alice heard the Rabbit actually TOOK A WATCH OUT OF ITS WAISTCOAT-POCKET, and looked at it again: but he now hastily began again, using the ink, that was lying under the.', 1, 1, 1, 550.000000, 1, 70.200000, 40.716000, NULL, NULL, NULL, NULL, '', '', '2019-05-26 17:06:40', '2019-05-26 17:06:40'),
	(14, 'BASIC', 'Vintage Toaste', 'vintage-toaste', 'vintage-toaste', 'And she opened it, and yet it was too small, but at any rate, the Dormouse go on till you come and join the dance. \'"What matters it how far we go?" his scaly friend replied. "There is another shore, you know, with oh, such long ringlets, and mine doesn\'t go in ringlets at all; and I\'m I, and--oh dear, how puzzling it all came different!\' the Mock Turtle, suddenly dropping his voice; and Alice joined the procession, wondering very much what would be of any good reason, and as he found it very nice, (it had, in fact, a sort of life! I do wonder what they said. The executioner\'s argument was, that her neck kept getting entangled among the distant sobs of the game, the Queen merely remarking as it went. So she began nibbling at the great concert given by the Hatter, and here the Mock Turtle in a fight with another dig of her hedgehog. The hedgehog was engaged in a very melancholy voice. \'Repeat, "YOU ARE OLD, FATHER WILLIAM,\' to the porpoise, "Keep back, please: we don\'t want to go! Let me think: was I the same tone, exactly as if it please your Majesty!\' the soldiers did. After these came the guests, mostly Kings and Queens, and among them Alice recognised the White Rabbit blew three blasts on the door opened inwards, and Alice\'s first thought was that you couldn\'t cut off a little shriek, and went on eagerly. \'That\'s enough about lessons,\' the Gryphon went on, yawning and rubbing its eyes, \'Of course, of course; just what I say,\' the Mock Turtle. \'No, no! The adventures first,\' said the Mock Turtle replied in an offended tone, \'Hm! No accounting for tastes! Sing her "Turtle Soup," will you, old fellow?\' The Mock Turtle with a large flower-pot that stood near the door with his tea spoon at the top of his head. But at any rate it would be offended again. \'Mine is a very grave voice, \'until all the time she found herself in a pleased tone. \'Pray.', 1, 1, 1, 254.000000, 1, 40.900000, 24.540000, NULL, NULL, NULL, NULL, '', '', '2019-05-26 17:06:41', '2019-05-26 17:06:41');
/*!40000 ALTER TABLE `avored_products` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_product_attribute_integer_values
DROP TABLE IF EXISTS `avored_product_attribute_integer_values`;
CREATE TABLE IF NOT EXISTS `avored_product_attribute_integer_values` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attribute_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `value` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_attribute_integer_values_attribute_id_foreign` (`attribute_id`),
  KEY `product_attribute_integer_values_product_id_foreign` (`product_id`),
  CONSTRAINT `product_attribute_integer_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `avored_attributes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_attribute_integer_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `avored_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_product_attribute_integer_values: ~0 rows (approximately)
DELETE FROM `avored_product_attribute_integer_values`;
/*!40000 ALTER TABLE `avored_product_attribute_integer_values` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_product_attribute_integer_values` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_product_downloadable_urls
DROP TABLE IF EXISTS `avored_product_downloadable_urls`;
CREATE TABLE IF NOT EXISTS `avored_product_downloadable_urls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `demo_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `main_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_downloadable_urls_product_id_foreign` (`product_id`),
  CONSTRAINT `product_downloadable_urls_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `avored_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_product_downloadable_urls: ~0 rows (approximately)
DELETE FROM `avored_product_downloadable_urls`;
/*!40000 ALTER TABLE `avored_product_downloadable_urls` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_product_downloadable_urls` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_product_images
DROP TABLE IF EXISTS `avored_product_images`;
CREATE TABLE IF NOT EXISTS `avored_product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `path` text COLLATE utf8_unicode_ci NOT NULL,
  `is_main_image` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `avored_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_product_images: ~14 rows (approximately)
DELETE FROM `avored_product_images`;
/*!40000 ALTER TABLE `avored_product_images` DISABLE KEYS */;
INSERT INTO `avored_product_images` (`id`, `product_id`, `path`, `is_main_image`, `created_at`, `updated_at`) VALUES
	(1, 1, 'uploads/catalog/images/f/h/2/flower-pot.jpg', 1, '2019-05-26 17:06:37', '2019-05-26 17:06:37'),
	(2, 2, 'uploads/catalog/images/d/0/c/classic-tv-stand.jpg', 1, '2019-05-26 17:06:37', '2019-05-26 17:06:37'),
	(3, 3, 'uploads/catalog/images/y/f/r/textiles-2.jpg', 1, '2019-05-26 17:06:37', '2019-05-26 17:06:37'),
	(4, 4, 'uploads/catalog/images/1/k/0/-Single-Panel-New-Pastoral-Linen-Blending-Embroidered-Living-Room-font-b-Curtain-b-font-font.jpg', 1, '2019-05-26 17:06:37', '2019-05-26 17:06:37'),
	(5, 5, 'uploads/catalog/images/q/o/m/comfortable-leather-chair-published-under-the-most-comfortable-couch-group.jpg', 1, '2019-05-26 17:06:38', '2019-05-26 17:06:38'),
	(6, 6, 'uploads/catalog/images/s/e/j/ff815ea7756de71d6c5edb5566330df6.jpg', 1, '2019-05-26 17:06:38', '2019-05-26 17:06:38'),
	(7, 7, 'uploads/catalog/images/v/t/x/bed-bedding-comfortable-platform-with-smooth-gray-also-are-beds-and-headboard-plus-small-.jpg', 1, '2019-05-26 17:06:38', '2019-05-26 17:06:38'),
	(8, 8, 'uploads/catalog/images/z/c/u/d5d710257f2cf7cf2576f4a43dc40430.jpg', 1, '2019-05-26 17:06:39', '2019-05-26 17:06:39'),
	(9, 9, 'uploads/catalog/images/m/2/z/b594a5c88e527b467508aa9fa3b01228.jpg', 1, '2019-05-26 17:06:39', '2019-05-26 17:06:39'),
	(10, 10, 'uploads/catalog/images/4/5/n/il_570xN.262261571.jpg', 1, '2019-05-26 17:06:39', '2019-05-26 17:06:39'),
	(11, 11, 'uploads/catalog/images/n/y/n/CC2600.jpg', 1, '2019-05-26 17:06:40', '2019-05-26 17:06:40'),
	(12, 12, 'uploads/catalog/images/t/b/n/20121018143846738.jpg', 1, '2019-05-26 17:06:40', '2019-05-26 17:06:40'),
	(13, 13, 'uploads/catalog/images/l/i/k/coffee-maker-20.jpg', 1, '2019-05-26 17:06:40', '2019-05-26 17:06:40'),
	(14, 14, 'uploads/catalog/images/0/y/4/tsf02crsa.jpg', 1, '2019-05-26 17:06:41', '2019-05-26 17:06:41');
/*!40000 ALTER TABLE `avored_product_images` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_product_property
DROP TABLE IF EXISTS `avored_product_property`;
CREATE TABLE IF NOT EXISTS `avored_product_property` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `property_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_property_property_id_foreign` (`property_id`),
  KEY `product_property_product_id_foreign` (`product_id`),
  CONSTRAINT `product_property_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `avored_products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_property_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `avored_properties` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_product_property: ~0 rows (approximately)
DELETE FROM `avored_product_property`;
/*!40000 ALTER TABLE `avored_product_property` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_product_property` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_product_property_boolean_values
DROP TABLE IF EXISTS `avored_product_property_boolean_values`;
CREATE TABLE IF NOT EXISTS `avored_product_property_boolean_values` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `property_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `value` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_property_boolean_values_property_id_foreign` (`property_id`),
  KEY `product_property_boolean_values_product_id_foreign` (`product_id`),
  CONSTRAINT `product_property_boolean_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `avored_products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_property_boolean_values_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `avored_properties` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_product_property_boolean_values: ~0 rows (approximately)
DELETE FROM `avored_product_property_boolean_values`;
/*!40000 ALTER TABLE `avored_product_property_boolean_values` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_product_property_boolean_values` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_product_property_datetime_values
DROP TABLE IF EXISTS `avored_product_property_datetime_values`;
CREATE TABLE IF NOT EXISTS `avored_product_property_datetime_values` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `property_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `value` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_property_datetime_values_property_id_foreign` (`property_id`),
  KEY `product_property_datetime_values_product_id_foreign` (`product_id`),
  CONSTRAINT `product_property_datetime_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `avored_products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_property_datetime_values_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `avored_properties` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_product_property_datetime_values: ~0 rows (approximately)
DELETE FROM `avored_product_property_datetime_values`;
/*!40000 ALTER TABLE `avored_product_property_datetime_values` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_product_property_datetime_values` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_product_property_decimal_values
DROP TABLE IF EXISTS `avored_product_property_decimal_values`;
CREATE TABLE IF NOT EXISTS `avored_product_property_decimal_values` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `property_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `value` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_property_decimal_values_property_id_foreign` (`property_id`),
  KEY `product_property_decimal_values_product_id_foreign` (`product_id`),
  CONSTRAINT `product_property_decimal_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `avored_products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_property_decimal_values_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `avored_properties` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_product_property_decimal_values: ~0 rows (approximately)
DELETE FROM `avored_product_property_decimal_values`;
/*!40000 ALTER TABLE `avored_product_property_decimal_values` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_product_property_decimal_values` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_product_property_integer_values
DROP TABLE IF EXISTS `avored_product_property_integer_values`;
CREATE TABLE IF NOT EXISTS `avored_product_property_integer_values` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `property_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `value` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_property_integer_values_property_id_foreign` (`property_id`),
  KEY `product_property_integer_values_product_id_foreign` (`product_id`),
  CONSTRAINT `product_property_integer_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `avored_products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_property_integer_values_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `avored_properties` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_product_property_integer_values: ~4 rows (approximately)
DELETE FROM `avored_product_property_integer_values`;
/*!40000 ALTER TABLE `avored_product_property_integer_values` DISABLE KEYS */;
INSERT INTO `avored_product_property_integer_values` (`id`, `property_id`, `product_id`, `value`, `created_at`, `updated_at`) VALUES
	(1, 2, 2, 2, '2019-05-26 17:06:42', '2019-05-26 17:06:42'),
	(2, 2, 13, 2, '2019-05-26 17:06:42', '2019-05-26 17:06:42'),
	(3, 2, 14, 2, '2019-05-26 17:06:42', '2019-05-26 17:06:42'),
	(4, 2, 11, 2, '2019-05-26 17:06:42', '2019-05-26 17:06:42');
/*!40000 ALTER TABLE `avored_product_property_integer_values` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_product_property_text_values
DROP TABLE IF EXISTS `avored_product_property_text_values`;
CREATE TABLE IF NOT EXISTS `avored_product_property_text_values` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `property_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_property_text_values_property_id_foreign` (`property_id`),
  KEY `product_property_text_values_product_id_foreign` (`product_id`),
  CONSTRAINT `product_property_text_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `avored_products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_property_text_values_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `avored_properties` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_product_property_text_values: ~0 rows (approximately)
DELETE FROM `avored_product_property_text_values`;
/*!40000 ALTER TABLE `avored_product_property_text_values` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_product_property_text_values` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_product_property_varchar_values
DROP TABLE IF EXISTS `avored_product_property_varchar_values`;
CREATE TABLE IF NOT EXISTS `avored_product_property_varchar_values` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `property_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_property_varchar_values_property_id_foreign` (`property_id`),
  KEY `product_property_varchar_values_product_id_foreign` (`product_id`),
  CONSTRAINT `product_property_varchar_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `avored_products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_property_varchar_values_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `avored_properties` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_product_property_varchar_values: ~0 rows (approximately)
DELETE FROM `avored_product_property_varchar_values`;
/*!40000 ALTER TABLE `avored_product_property_varchar_values` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_product_property_varchar_values` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_product_variations
DROP TABLE IF EXISTS `avored_product_variations`;
CREATE TABLE IF NOT EXISTS `avored_product_variations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `variation_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_variations_variation_id_foreign` (`variation_id`),
  KEY `product_variations_product_id_foreign` (`product_id`),
  CONSTRAINT `product_variations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `avored_products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_variations_variation_id_foreign` FOREIGN KEY (`variation_id`) REFERENCES `avored_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_product_variations: ~0 rows (approximately)
DELETE FROM `avored_product_variations`;
/*!40000 ALTER TABLE `avored_product_variations` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_product_variations` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_properties
DROP TABLE IF EXISTS `avored_properties`;
CREATE TABLE IF NOT EXISTS `avored_properties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_type` enum('INTEGER','DECIMAL','DATETIME','VARCHAR','BOOLEAN','TEXT') COLLATE utf8_unicode_ci DEFAULT NULL,
  `field_type` enum('TEXT','TEXTAREA','CKEDITOR','SELECT','FILE','DATETIME','CHECKBOX','RADIO','SWITCH') COLLATE utf8_unicode_ci NOT NULL,
  `use_for_all_products` tinyint(4) NOT NULL DEFAULT '0',
  `is_visible_frontend` tinyint(4) DEFAULT '1',
  `sort_order` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `properties_identifier_unique` (`identifier`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_properties: ~2 rows (approximately)
DELETE FROM `avored_properties`;
/*!40000 ALTER TABLE `avored_properties` DISABLE KEYS */;
INSERT INTO `avored_properties` (`id`, `name`, `identifier`, `data_type`, `field_type`, `use_for_all_products`, `is_visible_frontend`, `sort_order`, `created_at`, `updated_at`) VALUES
	(1, 'Brand', 'avored-brand', 'INTEGER', 'SELECT', 1, 1, 200, '2019-05-26 17:06:26', '2019-05-26 17:06:26'),
	(2, 'Is Featured', 'avored-is-featured', 'INTEGER', 'SELECT', 1, 1, 100, '2019-05-26 17:06:26', '2019-05-26 17:06:26');
/*!40000 ALTER TABLE `avored_properties` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_property_dropdown_options
DROP TABLE IF EXISTS `avored_property_dropdown_options`;
CREATE TABLE IF NOT EXISTS `avored_property_dropdown_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `property_id` int(10) unsigned NOT NULL,
  `display_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `property_dropdown_options_property_id_foreign` (`property_id`),
  CONSTRAINT `property_dropdown_options_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `avored_properties` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_property_dropdown_options: ~3 rows (approximately)
DELETE FROM `avored_property_dropdown_options`;
/*!40000 ALTER TABLE `avored_property_dropdown_options` DISABLE KEYS */;
INSERT INTO `avored_property_dropdown_options` (`id`, `property_id`, `display_text`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Test Brand Name', '2019-05-26 17:06:26', '2019-05-26 17:06:26'),
	(2, 2, 'Yes', '2019-05-26 17:06:26', '2019-05-26 17:06:26'),
	(3, 2, 'No', '2019-05-26 17:06:26', '2019-05-26 17:06:26');
/*!40000 ALTER TABLE `avored_property_dropdown_options` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_roles
DROP TABLE IF EXISTS `avored_roles`;
CREATE TABLE IF NOT EXISTS `avored_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_roles: ~1 rows (approximately)
DELETE FROM `avored_roles`;
/*!40000 ALTER TABLE `avored_roles` DISABLE KEYS */;
INSERT INTO `avored_roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'administrator', 'Administrator Role has all access', '2019-05-26 17:14:42', '2019-05-26 17:14:42');
/*!40000 ALTER TABLE `avored_roles` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_site_currencies
DROP TABLE IF EXISTS `avored_site_currencies`;
CREATE TABLE IF NOT EXISTS `avored_site_currencies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conversion_rate` double(8,2) NOT NULL,
  `status` enum('ENABLED','DISABLED') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_site_currencies: ~1 rows (approximately)
DELETE FROM `avored_site_currencies`;
/*!40000 ALTER TABLE `avored_site_currencies` DISABLE KEYS */;
INSERT INTO `avored_site_currencies` (`id`, `code`, `symbol`, `name`, `conversion_rate`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'NZD', '$', 'NZ Dollars', 1.00, 'ENABLED', '2019-05-26 17:06:24', '2019-05-26 17:06:24');
/*!40000 ALTER TABLE `avored_site_currencies` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_states
DROP TABLE IF EXISTS `avored_states`;
CREATE TABLE IF NOT EXISTS `avored_states` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `states_country_id_foreign` (`country_id`),
  CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `avored_countries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_states: ~0 rows (approximately)
DELETE FROM `avored_states`;
/*!40000 ALTER TABLE `avored_states` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_states` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_users
DROP TABLE IF EXISTS `avored_users`;
CREATE TABLE IF NOT EXISTS `avored_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('GUEST','LIVE','DELETE_IN_PROGRESS') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'LIVE',
  `tax_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `delete_due_date` timestamp NULL DEFAULT NULL,
  `registered_channel` enum('WEBSITE','FACEBOOK','TWITTER','GOOGLE') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'WEBSITE',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_users: ~0 rows (approximately)
DELETE FROM `avored_users`;
/*!40000 ALTER TABLE `avored_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_users` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_user_groups
DROP TABLE IF EXISTS `avored_user_groups`;
CREATE TABLE IF NOT EXISTS `avored_user_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_user_groups: ~0 rows (approximately)
DELETE FROM `avored_user_groups`;
/*!40000 ALTER TABLE `avored_user_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_user_groups` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_user_user_group
DROP TABLE IF EXISTS `avored_user_user_group`;
CREATE TABLE IF NOT EXISTS `avored_user_user_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `user_group_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_user_group_user_id_foreign` (`user_id`),
  KEY `user_user_group_user_group_id_foreign` (`user_group_id`),
  CONSTRAINT `user_user_group_user_group_id_foreign` FOREIGN KEY (`user_group_id`) REFERENCES `avored_user_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_user_group_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `avored_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_user_user_group: ~0 rows (approximately)
DELETE FROM `avored_user_user_group`;
/*!40000 ALTER TABLE `avored_user_user_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_user_user_group` ENABLE KEYS */;

-- Dumping structure for table laraecom.avored_wishlists
DROP TABLE IF EXISTS `avored_wishlists`;
CREATE TABLE IF NOT EXISTS `avored_wishlists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wishlists_user_id_foreign` (`user_id`),
  KEY `wishlists_product_id_foreign` (`product_id`),
  CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `avored_products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `avored_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laraecom.avored_wishlists: ~0 rows (approximately)
DELETE FROM `avored_wishlists`;
/*!40000 ALTER TABLE `avored_wishlists` DISABLE KEYS */;
/*!40000 ALTER TABLE `avored_wishlists` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
