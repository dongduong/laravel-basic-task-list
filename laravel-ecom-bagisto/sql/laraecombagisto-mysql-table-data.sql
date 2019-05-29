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

-- Dumping structure for table laraecombagisto_bk.admins
DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `role_id` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.admins: ~0 rows (approximately)
DELETE FROM `admins`;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `name`, `email`, `password`, `status`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Example', 'admin@example.com', '$2y$10$1KeNB.QiA4k9RBE.h.6jlOPuskKvgLBHSXS/KbgnauZIVOvVETCCu', 1, 1, NULL, NULL, NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.admin_password_resets
DROP TABLE IF EXISTS `admin_password_resets`;
CREATE TABLE IF NOT EXISTS `admin_password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `admin_password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.admin_password_resets: ~0 rows (approximately)
DELETE FROM `admin_password_resets`;
/*!40000 ALTER TABLE `admin_password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_password_resets` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.attributes
DROP TABLE IF EXISTS `attributes`;
CREATE TABLE IF NOT EXISTS `attributes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `validation` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT '0',
  `is_unique` tinyint(1) NOT NULL DEFAULT '0',
  `value_per_locale` tinyint(1) NOT NULL DEFAULT '0',
  `value_per_channel` tinyint(1) NOT NULL DEFAULT '0',
  `is_filterable` tinyint(1) NOT NULL DEFAULT '0',
  `is_configurable` tinyint(1) NOT NULL DEFAULT '0',
  `is_user_defined` tinyint(1) NOT NULL DEFAULT '1',
  `is_visible_on_front` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `swatch_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `attributes_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.attributes: ~24 rows (approximately)
DELETE FROM `attributes`;
/*!40000 ALTER TABLE `attributes` DISABLE KEYS */;
INSERT INTO `attributes` (`id`, `code`, `admin_name`, `type`, `validation`, `position`, `is_required`, `is_unique`, `value_per_locale`, `value_per_channel`, `is_filterable`, `is_configurable`, `is_user_defined`, `is_visible_on_front`, `created_at`, `updated_at`, `swatch_type`) VALUES
	(1, 'sku', 'SKU', 'text', NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(2, 'name', 'Name', 'text', NULL, 2, 1, 0, 1, 1, 0, 0, 0, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(3, 'url_key', 'URL Key', 'text', NULL, 3, 1, 1, 0, 0, 0, 0, 0, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(4, 'tax_category_id', 'Tax Category', 'select', NULL, 4, 0, 0, 0, 1, 0, 0, 0, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(5, 'new', 'New', 'boolean', NULL, 5, 0, 0, 0, 0, 0, 0, 0, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(6, 'featured', 'Featured', 'boolean', NULL, 6, 0, 0, 0, 0, 0, 0, 0, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(7, 'visible_individually', 'Visible Individually', 'boolean', NULL, 7, 1, 0, 0, 0, 0, 0, 0, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(8, 'status', 'Status', 'boolean', NULL, 8, 1, 0, 0, 0, 0, 0, 0, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(9, 'short_description', 'Short Description', 'textarea', NULL, 9, 1, 0, 1, 1, 0, 0, 0, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(10, 'description', 'Description', 'textarea', NULL, 10, 1, 0, 1, 1, 0, 0, 0, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(11, 'price', 'Price', 'price', 'decimal', 11, 1, 0, 0, 0, 1, 0, 0, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(12, 'cost', 'Cost', 'price', 'decimal', 12, 0, 0, 0, 1, 0, 0, 1, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(13, 'special_price', 'Special Price', 'price', 'decimal', 13, 0, 0, 0, 0, 0, 0, 0, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(14, 'special_price_from', 'Special Price From', 'date', NULL, 14, 0, 0, 0, 1, 0, 0, 0, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(15, 'special_price_to', 'Special Price To', 'date', NULL, 15, 0, 0, 0, 1, 0, 0, 0, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(16, 'meta_title', 'Meta Title', 'textarea', NULL, 16, 0, 0, 1, 1, 0, 0, 0, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(17, 'meta_keywords', 'Meta Keywords', 'textarea', NULL, 17, 0, 0, 1, 1, 0, 0, 0, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(18, 'meta_description', 'Meta Description', 'textarea', NULL, 18, 0, 0, 1, 1, 0, 0, 1, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(19, 'width', 'Width', 'text', 'decimal', 19, 0, 0, 0, 0, 0, 0, 1, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(20, 'height', 'Height', 'text', 'decimal', 20, 0, 0, 0, 0, 0, 0, 1, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(21, 'depth', 'Depth', 'text', 'decimal', 21, 0, 0, 0, 0, 0, 0, 1, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(22, 'weight', 'Weight', 'text', 'decimal', 22, 1, 0, 0, 0, 0, 0, 0, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(23, 'color', 'Color', 'select', NULL, 23, 0, 0, 0, 0, 1, 1, 1, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL),
	(24, 'size', 'Size', 'select', NULL, 24, 0, 0, 0, 0, 1, 1, 1, 0, '2019-05-30 00:58:31', '2019-05-30 00:58:31', NULL);
/*!40000 ALTER TABLE `attributes` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.attribute_families
DROP TABLE IF EXISTS `attribute_families`;
CREATE TABLE IF NOT EXISTS `attribute_families` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `is_user_defined` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.attribute_families: ~0 rows (approximately)
DELETE FROM `attribute_families`;
/*!40000 ALTER TABLE `attribute_families` DISABLE KEYS */;
INSERT INTO `attribute_families` (`id`, `code`, `name`, `status`, `is_user_defined`) VALUES
	(1, 'default', 'Default', 0, 1);
/*!40000 ALTER TABLE `attribute_families` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.attribute_groups
DROP TABLE IF EXISTS `attribute_groups`;
CREATE TABLE IF NOT EXISTS `attribute_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `is_user_defined` tinyint(1) NOT NULL DEFAULT '1',
  `attribute_family_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `attribute_groups_attribute_family_id_name_unique` (`attribute_family_id`,`name`),
  CONSTRAINT `attribute_groups_attribute_family_id_foreign` FOREIGN KEY (`attribute_family_id`) REFERENCES `attribute_families` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.attribute_groups: ~5 rows (approximately)
DELETE FROM `attribute_groups`;
/*!40000 ALTER TABLE `attribute_groups` DISABLE KEYS */;
INSERT INTO `attribute_groups` (`id`, `name`, `position`, `is_user_defined`, `attribute_family_id`) VALUES
	(1, 'General', 1, 0, 1),
	(2, 'Description', 2, 0, 1),
	(3, 'Meta Description', 3, 0, 1),
	(4, 'Price', 4, 0, 1),
	(5, 'Shipping', 5, 0, 1);
/*!40000 ALTER TABLE `attribute_groups` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.attribute_group_mappings
DROP TABLE IF EXISTS `attribute_group_mappings`;
CREATE TABLE IF NOT EXISTS `attribute_group_mappings` (
  `attribute_id` int(10) unsigned NOT NULL,
  `attribute_group_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`attribute_id`,`attribute_group_id`),
  KEY `attribute_group_mappings_attribute_group_id_foreign` (`attribute_group_id`),
  CONSTRAINT `attribute_group_mappings_attribute_group_id_foreign` FOREIGN KEY (`attribute_group_id`) REFERENCES `attribute_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `attribute_group_mappings_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.attribute_group_mappings: ~24 rows (approximately)
DELETE FROM `attribute_group_mappings`;
/*!40000 ALTER TABLE `attribute_group_mappings` DISABLE KEYS */;
INSERT INTO `attribute_group_mappings` (`attribute_id`, `attribute_group_id`, `position`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 1, 3),
	(4, 1, 4),
	(5, 1, 5),
	(6, 1, 6),
	(7, 1, 7),
	(8, 1, 8),
	(9, 2, 1),
	(10, 2, 2),
	(11, 4, 1),
	(12, 4, 2),
	(13, 4, 3),
	(14, 4, 4),
	(15, 4, 5),
	(16, 3, 1),
	(17, 3, 2),
	(18, 3, 3),
	(19, 5, 1),
	(20, 5, 2),
	(21, 5, 3),
	(22, 5, 4),
	(23, 1, 9),
	(24, 1, 10);
/*!40000 ALTER TABLE `attribute_group_mappings` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.attribute_options
DROP TABLE IF EXISTS `attribute_options`;
CREATE TABLE IF NOT EXISTS `attribute_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `attribute_id` int(10) unsigned NOT NULL,
  `swatch_value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attribute_options_attribute_id_foreign` (`attribute_id`),
  CONSTRAINT `attribute_options_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.attribute_options: ~9 rows (approximately)
DELETE FROM `attribute_options`;
/*!40000 ALTER TABLE `attribute_options` DISABLE KEYS */;
INSERT INTO `attribute_options` (`id`, `admin_name`, `sort_order`, `attribute_id`, `swatch_value`) VALUES
	(1, 'Red', 1, 23, NULL),
	(2, 'Green', 2, 23, NULL),
	(3, 'Yellow', 3, 23, NULL),
	(4, 'Black', 4, 23, NULL),
	(5, 'White', 5, 23, NULL),
	(6, 'S', 1, 24, NULL),
	(7, 'M', 2, 24, NULL),
	(8, 'L', 3, 24, NULL),
	(9, 'XL', 4, 24, NULL);
/*!40000 ALTER TABLE `attribute_options` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.attribute_option_translations
DROP TABLE IF EXISTS `attribute_option_translations`;
CREATE TABLE IF NOT EXISTS `attribute_option_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `attribute_option_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `attribute_option_translations_attribute_option_id_locale_unique` (`attribute_option_id`,`locale`),
  CONSTRAINT `attribute_option_translations_attribute_option_id_foreign` FOREIGN KEY (`attribute_option_id`) REFERENCES `attribute_options` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.attribute_option_translations: ~9 rows (approximately)
DELETE FROM `attribute_option_translations`;
/*!40000 ALTER TABLE `attribute_option_translations` DISABLE KEYS */;
INSERT INTO `attribute_option_translations` (`id`, `locale`, `label`, `attribute_option_id`) VALUES
	(1, 'en', 'Red', 1),
	(2, 'en', 'Green', 2),
	(3, 'en', 'Yellow', 3),
	(4, 'en', 'Black', 4),
	(5, 'en', 'White', 5),
	(6, 'en', 'S', 6),
	(7, 'en', 'M', 7),
	(8, 'en', 'L', 8),
	(9, 'en', 'XL', 9);
/*!40000 ALTER TABLE `attribute_option_translations` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.attribute_translations
DROP TABLE IF EXISTS `attribute_translations`;
CREATE TABLE IF NOT EXISTS `attribute_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `attribute_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `attribute_translations_attribute_id_locale_unique` (`attribute_id`,`locale`),
  CONSTRAINT `attribute_translations_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.attribute_translations: ~24 rows (approximately)
DELETE FROM `attribute_translations`;
/*!40000 ALTER TABLE `attribute_translations` DISABLE KEYS */;
INSERT INTO `attribute_translations` (`id`, `locale`, `name`, `attribute_id`) VALUES
	(1, 'en', 'SKU', 1),
	(2, 'en', 'Name', 2),
	(3, 'en', 'URL Key', 3),
	(4, 'en', 'Tax Category', 4),
	(5, 'en', 'New', 5),
	(6, 'en', 'Featured', 6),
	(7, 'en', 'Visible Individually', 7),
	(8, 'en', 'Status', 8),
	(9, 'en', 'Short Description', 9),
	(10, 'en', 'Description', 10),
	(11, 'en', 'Price', 11),
	(12, 'en', 'Cost', 12),
	(13, 'en', 'Special Price', 13),
	(14, 'en', 'Special Price From', 14),
	(15, 'en', 'Special Price To', 15),
	(16, 'en', 'Meta Description', 16),
	(17, 'en', 'Meta Keywords', 17),
	(18, 'en', 'Meta Description', 18),
	(19, 'en', 'Width', 19),
	(20, 'en', 'Height', 20),
	(21, 'en', 'Depth', 21),
	(22, 'en', 'Weight', 22),
	(23, 'en', 'Color', 23),
	(24, 'en', 'Size', 24);
/*!40000 ALTER TABLE `attribute_translations` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.cart
DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_gift` tinyint(1) NOT NULL DEFAULT '0',
  `items_count` int(11) DEFAULT NULL,
  `items_qty` decimal(12,4) DEFAULT NULL,
  `exchange_rate` decimal(12,4) DEFAULT NULL,
  `global_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` decimal(12,4) DEFAULT '0.0000',
  `base_grand_total` decimal(12,4) DEFAULT '0.0000',
  `sub_total` decimal(12,4) DEFAULT '0.0000',
  `base_sub_total` decimal(12,4) DEFAULT '0.0000',
  `tax_total` decimal(12,4) DEFAULT '0.0000',
  `base_tax_total` decimal(12,4) DEFAULT '0.0000',
  `discount` decimal(12,4) DEFAULT '0.0000',
  `base_discount` decimal(12,4) DEFAULT '0.0000',
  `checkout_method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_guest` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `conversion_time` datetime DEFAULT NULL,
  `customer_id` int(10) unsigned DEFAULT NULL,
  `channel_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_customer_id_foreign` (`customer_id`),
  KEY `cart_channel_id_foreign` (`channel_id`),
  CONSTRAINT `cart_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cart_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.cart: ~0 rows (approximately)
DELETE FROM `cart`;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.cart_address
DROP TABLE IF EXISTS `cart_address`;
CREATE TABLE IF NOT EXISTS `cart_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` int(11) NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_id` int(10) unsigned DEFAULT NULL,
  `customer_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_address_cart_id_foreign` (`cart_id`),
  KEY `cart_address_customer_id_foreign` (`customer_id`),
  CONSTRAINT `cart_address_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cart_address_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.cart_address: ~0 rows (approximately)
DELETE FROM `cart_address`;
/*!40000 ALTER TABLE `cart_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart_address` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.cart_items
DROP TABLE IF EXISTS `cart_items`;
CREATE TABLE IF NOT EXISTS `cart_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `sku` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` decimal(12,4) NOT NULL DEFAULT '1.0000',
  `total_weight` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_total_weight` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `price` decimal(12,4) NOT NULL DEFAULT '1.0000',
  `base_price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `custom_price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `total` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_total` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `tax_percent` decimal(12,4) DEFAULT '0.0000',
  `tax_amount` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount` decimal(12,4) DEFAULT '0.0000',
  `discount_percent` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `discount_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_discount_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `additional` json DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `cart_id` int(10) unsigned NOT NULL,
  `tax_category_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_items_product_id_foreign` (`product_id`),
  KEY `cart_items_cart_id_foreign` (`cart_id`),
  KEY `cart_items_tax_category_id_foreign` (`tax_category_id`),
  KEY `cart_items_parent_id_foreign` (`parent_id`),
  CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cart_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `cart_items` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cart_items_tax_category_id_foreign` FOREIGN KEY (`tax_category_id`) REFERENCES `tax_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.cart_items: ~0 rows (approximately)
DELETE FROM `cart_items`;
/*!40000 ALTER TABLE `cart_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart_items` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.cart_item_inventories
DROP TABLE IF EXISTS `cart_item_inventories`;
CREATE TABLE IF NOT EXISTS `cart_item_inventories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `qty` int(10) unsigned NOT NULL DEFAULT '0',
  `inventory_source_id` int(10) unsigned DEFAULT NULL,
  `cart_item_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.cart_item_inventories: ~0 rows (approximately)
DELETE FROM `cart_item_inventories`;
/*!40000 ALTER TABLE `cart_item_inventories` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart_item_inventories` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.cart_payment
DROP TABLE IF EXISTS `cart_payment`;
CREATE TABLE IF NOT EXISTS `cart_payment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_payment_cart_id_foreign` (`cart_id`),
  CONSTRAINT `cart_payment_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.cart_payment: ~0 rows (approximately)
DELETE FROM `cart_payment`;
/*!40000 ALTER TABLE `cart_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart_payment` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.cart_shipping_rates
DROP TABLE IF EXISTS `cart_shipping_rates`;
CREATE TABLE IF NOT EXISTS `cart_shipping_rates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `carrier` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `carrier_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT '0',
  `base_price` double DEFAULT '0',
  `cart_address_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_shipping_rates_cart_address_id_foreign` (`cart_address_id`),
  CONSTRAINT `cart_shipping_rates_cart_address_id_foreign` FOREIGN KEY (`cart_address_id`) REFERENCES `cart_address` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.cart_shipping_rates: ~0 rows (approximately)
DELETE FROM `cart_shipping_rates`;
/*!40000 ALTER TABLE `cart_shipping_rates` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart_shipping_rates` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` int(11) NOT NULL DEFAULT '0',
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `_lft` int(10) unsigned NOT NULL DEFAULT '0',
  `_rgt` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `display_mode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'products_and_description',
  PRIMARY KEY (`id`),
  KEY `categories__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.categories: ~0 rows (approximately)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `position`, `image`, `status`, `_lft`, `_rgt`, `parent_id`, `created_at`, `updated_at`, `display_mode`) VALUES
	(1, 1, NULL, 1, 1, 14, NULL, '2019-05-30 00:58:30', '2019-05-30 00:58:30', 'products_and_description');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.category_translations
DROP TABLE IF EXISTS `category_translations`;
CREATE TABLE IF NOT EXISTS `category_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `category_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_translations_category_id_slug_locale_unique` (`category_id`,`slug`,`locale`),
  CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.category_translations: ~0 rows (approximately)
DELETE FROM `category_translations`;
/*!40000 ALTER TABLE `category_translations` DISABLE KEYS */;
INSERT INTO `category_translations` (`id`, `name`, `slug`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `category_id`, `locale`) VALUES
	(1, 'Root', 'root', 'Root', '', '', '', 1, 'en');
/*!40000 ALTER TABLE `category_translations` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.channels
DROP TABLE IF EXISTS `channels`;
CREATE TABLE IF NOT EXISTS `channels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `timezone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hostname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_page_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `footer_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `default_locale_id` int(10) unsigned NOT NULL,
  `base_currency_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `root_category_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `channels_default_locale_id_foreign` (`default_locale_id`),
  KEY `channels_base_currency_id_foreign` (`base_currency_id`),
  KEY `channels_root_category_id_foreign` (`root_category_id`),
  CONSTRAINT `channels_base_currency_id_foreign` FOREIGN KEY (`base_currency_id`) REFERENCES `currencies` (`id`),
  CONSTRAINT `channels_default_locale_id_foreign` FOREIGN KEY (`default_locale_id`) REFERENCES `locales` (`id`),
  CONSTRAINT `channels_root_category_id_foreign` FOREIGN KEY (`root_category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.channels: ~0 rows (approximately)
DELETE FROM `channels`;
/*!40000 ALTER TABLE `channels` DISABLE KEYS */;
INSERT INTO `channels` (`id`, `code`, `name`, `description`, `timezone`, `theme`, `hostname`, `logo`, `favicon`, `home_page_content`, `footer_content`, `default_locale_id`, `base_currency_id`, `created_at`, `updated_at`, `root_category_id`) VALUES
	(1, 'default', 'Default', NULL, NULL, NULL, NULL, NULL, NULL, '<p>@include("shop::home.slider") @include("shop::home.featured-products") @include("shop::home.new-products")</p><div class="banner-container"><div class="left-banner"><img src="https://s3-ap-southeast-1.amazonaws.com/cdn.uvdesk.com/website/1/201902045c581f9494b8a1.png" /></div><div class="right-banner"><img src="https://s3-ap-southeast-1.amazonaws.com/cdn.uvdesk.com/website/1/201902045c581fb045cf02.png" /> <img src="https://s3-ap-southeast-1.amazonaws.com/cdn.uvdesk.com/website/1/201902045c581fc352d803.png" /></div></div>', '<div class="list-container"><span class="list-heading">Quick Links</span><ul class="list-group"><li><a href="#">About Us</a></li><li><a href="#">Return Policy</a></li><li><a href="#">Refund Policy</a></li><li><a href="#">Terms and conditions</a></li><li><a href="#">Terms of Use</a></li><li><a href="#">Contact Us</a></li></ul></div><div class="list-container"><span class="list-heading">Connect With Us</span><ul class="list-group"><li><a href="#"><span class="icon icon-facebook"></span>Facebook </a></li><li><a href="#"><span class="icon icon-twitter"></span> Twitter </a></li><li><a href="#"><span class="icon icon-instagram"></span> Instagram </a></li><li><a href="#"> <span class="icon icon-google-plus"></span>Google+ </a></li><li><a href="#"> <span class="icon icon-linkedin"></span>LinkedIn </a></li></ul></div>', 1, 1, NULL, NULL, 1);
/*!40000 ALTER TABLE `channels` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.channel_currencies
DROP TABLE IF EXISTS `channel_currencies`;
CREATE TABLE IF NOT EXISTS `channel_currencies` (
  `channel_id` int(10) unsigned NOT NULL,
  `currency_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`channel_id`,`currency_id`),
  KEY `channel_currencies_currency_id_foreign` (`currency_id`),
  CONSTRAINT `channel_currencies_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `channel_currencies_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.channel_currencies: ~0 rows (approximately)
DELETE FROM `channel_currencies`;
/*!40000 ALTER TABLE `channel_currencies` DISABLE KEYS */;
INSERT INTO `channel_currencies` (`channel_id`, `currency_id`) VALUES
	(1, 1);
/*!40000 ALTER TABLE `channel_currencies` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.channel_inventory_sources
DROP TABLE IF EXISTS `channel_inventory_sources`;
CREATE TABLE IF NOT EXISTS `channel_inventory_sources` (
  `channel_id` int(10) unsigned NOT NULL,
  `inventory_source_id` int(10) unsigned NOT NULL,
  UNIQUE KEY `channel_inventory_sources_channel_id_inventory_source_id_unique` (`channel_id`,`inventory_source_id`),
  KEY `channel_inventory_sources_inventory_source_id_foreign` (`inventory_source_id`),
  CONSTRAINT `channel_inventory_sources_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `channel_inventory_sources_inventory_source_id_foreign` FOREIGN KEY (`inventory_source_id`) REFERENCES `inventory_sources` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.channel_inventory_sources: ~0 rows (approximately)
DELETE FROM `channel_inventory_sources`;
/*!40000 ALTER TABLE `channel_inventory_sources` DISABLE KEYS */;
INSERT INTO `channel_inventory_sources` (`channel_id`, `inventory_source_id`) VALUES
	(1, 1);
/*!40000 ALTER TABLE `channel_inventory_sources` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.channel_locales
DROP TABLE IF EXISTS `channel_locales`;
CREATE TABLE IF NOT EXISTS `channel_locales` (
  `channel_id` int(10) unsigned NOT NULL,
  `locale_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`channel_id`,`locale_id`),
  KEY `channel_locales_locale_id_foreign` (`locale_id`),
  CONSTRAINT `channel_locales_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `channel_locales_locale_id_foreign` FOREIGN KEY (`locale_id`) REFERENCES `locales` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.channel_locales: ~0 rows (approximately)
DELETE FROM `channel_locales`;
/*!40000 ALTER TABLE `channel_locales` DISABLE KEYS */;
INSERT INTO `channel_locales` (`channel_id`, `locale_id`) VALUES
	(1, 1);
/*!40000 ALTER TABLE `channel_locales` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.core_config
DROP TABLE IF EXISTS `core_config`;
CREATE TABLE IF NOT EXISTS `core_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_config_channel_id_foreign` (`channel_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.core_config: ~0 rows (approximately)
DELETE FROM `core_config`;
/*!40000 ALTER TABLE `core_config` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_config` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.countries
DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=256 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.countries: ~255 rows (approximately)
DELETE FROM `countries`;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` (`id`, `code`, `name`) VALUES
	(1, 'AF', 'Afghanistan'),
	(2, 'AX', 'Åland Islands'),
	(3, 'AL', 'Albania'),
	(4, 'DZ', 'Algeria'),
	(5, 'AS', 'American Samoa'),
	(6, 'AD', 'Andorra'),
	(7, 'AO', 'Angola'),
	(8, 'AI', 'Anguilla'),
	(9, 'AQ', 'Antarctica'),
	(10, 'AG', 'Antigua & Barbuda'),
	(11, 'AR', 'Argentina'),
	(12, 'AM', 'Armenia'),
	(13, 'AW', 'Aruba'),
	(14, 'AC', 'Ascension Island'),
	(15, 'AU', 'Australia'),
	(16, 'AT', 'Austria'),
	(17, 'AZ', 'Azerbaijan'),
	(18, 'BS', 'Bahamas'),
	(19, 'BH', 'Bahrain'),
	(20, 'BD', 'Bangladesh'),
	(21, 'BB', 'Barbados'),
	(22, 'BY', 'Belarus'),
	(23, 'BE', 'Belgium'),
	(24, 'BZ', 'Belize'),
	(25, 'BJ', 'Benin'),
	(26, 'BM', 'Bermuda'),
	(27, 'BT', 'Bhutan'),
	(28, 'BO', 'Bolivia'),
	(29, 'BA', 'Bosnia & Herzegovina'),
	(30, 'BW', 'Botswana'),
	(31, 'BR', 'Brazil'),
	(32, 'IO', 'British Indian Ocean Territory'),
	(33, 'VG', 'British Virgin Islands'),
	(34, 'BN', 'Brunei'),
	(35, 'BG', 'Bulgaria'),
	(36, 'BF', 'Burkina Faso'),
	(37, 'BI', 'Burundi'),
	(38, 'KH', 'Cambodia'),
	(39, 'CM', 'Cameroon'),
	(40, 'CA', 'Canada'),
	(41, 'IC', 'Canary Islands'),
	(42, 'CV', 'Cape Verde'),
	(43, 'BQ', 'Caribbean Netherlands'),
	(44, 'KY', 'Cayman Islands'),
	(45, 'CF', 'Central African Republic'),
	(46, 'EA', 'Ceuta & Melilla'),
	(47, 'TD', 'Chad'),
	(48, 'CL', 'Chile'),
	(49, 'CN', 'China'),
	(50, 'CX', 'Christmas Island'),
	(51, 'CC', 'Cocos (Keeling) Islands'),
	(52, 'CO', 'Colombia'),
	(53, 'KM', 'Comoros'),
	(54, 'CG', 'Congo - Brazzaville'),
	(55, 'CD', 'Congo - Kinshasa'),
	(56, 'CK', 'Cook Islands'),
	(57, 'CR', 'Costa Rica'),
	(58, 'CI', 'Côte d’Ivoire'),
	(59, 'HR', 'Croatia'),
	(60, 'CU', 'Cuba'),
	(61, 'CW', 'Curaçao'),
	(62, 'CY', 'Cyprus'),
	(63, 'CZ', 'Czechia'),
	(64, 'DK', 'Denmark'),
	(65, 'DG', 'Diego Garcia'),
	(66, 'DJ', 'Djibouti'),
	(67, 'DM', 'Dominica'),
	(68, 'DO', 'Dominican Republic'),
	(69, 'EC', 'Ecuador'),
	(70, 'EG', 'Egypt'),
	(71, 'SV', 'El Salvador'),
	(72, 'GQ', 'Equatorial Guinea'),
	(73, 'ER', 'Eritrea'),
	(74, 'EE', 'Estonia'),
	(75, 'ET', 'Ethiopia'),
	(76, 'EZ', 'Eurozone'),
	(77, 'FK', 'Falkland Islands'),
	(78, 'FO', 'Faroe Islands'),
	(79, 'FJ', 'Fiji'),
	(80, 'FI', 'Finland'),
	(81, 'FR', 'France'),
	(82, 'GF', 'French Guiana'),
	(83, 'PF', 'French Polynesia'),
	(84, 'TF', 'French Southern Territories'),
	(85, 'GA', 'Gabon'),
	(86, 'GM', 'Gambia'),
	(87, 'GE', 'Georgia'),
	(88, 'DE', 'Germany'),
	(89, 'GH', 'Ghana'),
	(90, 'GI', 'Gibraltar'),
	(91, 'GR', 'Greece'),
	(92, 'GL', 'Greenland'),
	(93, 'GD', 'Grenada'),
	(94, 'GP', 'Guadeloupe'),
	(95, 'GU', 'Guam'),
	(96, 'GT', 'Guatemala'),
	(97, 'GG', 'Guernsey'),
	(98, 'GN', 'Guinea'),
	(99, 'GW', 'Guinea-Bissau'),
	(100, 'GY', 'Guyana'),
	(101, 'HT', 'Haiti'),
	(102, 'HN', 'Honduras'),
	(103, 'HK', 'Hong Kong SAR China'),
	(104, 'HU', 'Hungary'),
	(105, 'IS', 'Iceland'),
	(106, 'IN', 'India'),
	(107, 'ID', 'Indonesia'),
	(108, 'IR', 'Iran'),
	(109, 'IQ', 'Iraq'),
	(110, 'IE', 'Ireland'),
	(111, 'IM', 'Isle of Man'),
	(112, 'IL', 'Israel'),
	(113, 'IT', 'Italy'),
	(114, 'JM', 'Jamaica'),
	(115, 'JP', 'Japan'),
	(116, 'JE', 'Jersey'),
	(117, 'JO', 'Jordan'),
	(118, 'KZ', 'Kazakhstan'),
	(119, 'KE', 'Kenya'),
	(120, 'KI', 'Kiribati'),
	(121, 'XK', 'Kosovo'),
	(122, 'KW', 'Kuwait'),
	(123, 'KG', 'Kyrgyzstan'),
	(124, 'LA', 'Laos'),
	(125, 'LV', 'Latvia'),
	(126, 'LB', 'Lebanon'),
	(127, 'LS', 'Lesotho'),
	(128, 'LR', 'Liberia'),
	(129, 'LY', 'Libya'),
	(130, 'LI', 'Liechtenstein'),
	(131, 'LT', 'Lithuania'),
	(132, 'LU', 'Luxembourg'),
	(133, 'MO', 'Macau SAR China'),
	(134, 'MK', 'Macedonia'),
	(135, 'MG', 'Madagascar'),
	(136, 'MW', 'Malawi'),
	(137, 'MY', 'Malaysia'),
	(138, 'MV', 'Maldives'),
	(139, 'ML', 'Mali'),
	(140, 'MT', 'Malta'),
	(141, 'MH', 'Marshall Islands'),
	(142, 'MQ', 'Martinique'),
	(143, 'MR', 'Mauritania'),
	(144, 'MU', 'Mauritius'),
	(145, 'YT', 'Mayotte'),
	(146, 'MX', 'Mexico'),
	(147, 'FM', 'Micronesia'),
	(148, 'MD', 'Moldova'),
	(149, 'MC', 'Monaco'),
	(150, 'MN', 'Mongolia'),
	(151, 'ME', 'Montenegro'),
	(152, 'MS', 'Montserrat'),
	(153, 'MA', 'Morocco'),
	(154, 'MZ', 'Mozambique'),
	(155, 'MM', 'Myanmar (Burma)'),
	(156, 'NA', 'Namibia'),
	(157, 'NR', 'Nauru'),
	(158, 'NP', 'Nepal'),
	(159, 'NL', 'Netherlands'),
	(160, 'NC', 'New Caledonia'),
	(161, 'NZ', 'New Zealand'),
	(162, 'NI', 'Nicaragua'),
	(163, 'NE', 'Niger'),
	(164, 'NG', 'Nigeria'),
	(165, 'NU', 'Niue'),
	(166, 'NF', 'Norfolk Island'),
	(167, 'KP', 'North Korea'),
	(168, 'MP', 'Northern Mariana Islands'),
	(169, 'NO', 'Norway'),
	(170, 'OM', 'Oman'),
	(171, 'PK', 'Pakistan'),
	(172, 'PW', 'Palau'),
	(173, 'PS', 'Palestinian Territories'),
	(174, 'PA', 'Panama'),
	(175, 'PG', 'Papua New Guinea'),
	(176, 'PY', 'Paraguay'),
	(177, 'PE', 'Peru'),
	(178, 'PH', 'Philippines'),
	(179, 'PN', 'Pitcairn Islands'),
	(180, 'PL', 'Poland'),
	(181, 'PT', 'Portugal'),
	(182, 'PR', 'Puerto Rico'),
	(183, 'QA', 'Qatar'),
	(184, 'RE', 'Réunion'),
	(185, 'RO', 'Romania'),
	(186, 'RU', 'Russia'),
	(187, 'RW', 'Rwanda'),
	(188, 'WS', 'Samoa'),
	(189, 'SM', 'San Marino'),
	(190, 'ST', 'São Tomé & Príncipe'),
	(191, 'SA', 'Saudi Arabia'),
	(192, 'SN', 'Senegal'),
	(193, 'RS', 'Serbia'),
	(194, 'SC', 'Seychelles'),
	(195, 'SL', 'Sierra Leone'),
	(196, 'SG', 'Singapore'),
	(197, 'SX', 'Sint Maarten'),
	(198, 'SK', 'Slovakia'),
	(199, 'SI', 'Slovenia'),
	(200, 'SB', 'Solomon Islands'),
	(201, 'SO', 'Somalia'),
	(202, 'ZA', 'South Africa'),
	(203, 'GS', 'South Georgia & South Sandwich Islands'),
	(204, 'KR', 'South Korea'),
	(205, 'SS', 'South Sudan'),
	(206, 'ES', 'Spain'),
	(207, 'LK', 'Sri Lanka'),
	(208, 'BL', 'St. Barthélemy'),
	(209, 'SH', 'St. Helena'),
	(210, 'KN', 'St. Kitts & Nevis'),
	(211, 'LC', 'St. Lucia'),
	(212, 'MF', 'St. Martin'),
	(213, 'PM', 'St. Pierre & Miquelon'),
	(214, 'VC', 'St. Vincent & Grenadines'),
	(215, 'SD', 'Sudan'),
	(216, 'SR', 'Suriname'),
	(217, 'SJ', 'Svalbard & Jan Mayen'),
	(218, 'SZ', 'Swaziland'),
	(219, 'SE', 'Sweden'),
	(220, 'CH', 'Switzerland'),
	(221, 'SY', 'Syria'),
	(222, 'TW', 'Taiwan'),
	(223, 'TJ', 'Tajikistan'),
	(224, 'TZ', 'Tanzania'),
	(225, 'TH', 'Thailand'),
	(226, 'TL', 'Timor-Leste'),
	(227, 'TG', 'Togo'),
	(228, 'TK', 'Tokelau'),
	(229, 'TO', 'Tonga'),
	(230, 'TT', 'Trinidad & Tobago'),
	(231, 'TA', 'Tristan da Cunha'),
	(232, 'TN', 'Tunisia'),
	(233, 'TR', 'Turkey'),
	(234, 'TM', 'Turkmenistan'),
	(235, 'TC', 'Turks & Caicos Islands'),
	(236, 'TV', 'Tuvalu'),
	(237, 'UM', 'U.S. Outlying Islands'),
	(238, 'VI', 'U.S. Virgin Islands'),
	(239, 'UG', 'Uganda'),
	(240, 'UA', 'Ukraine'),
	(241, 'AE', 'United Arab Emirates'),
	(242, 'GB', 'United Kingdom'),
	(243, 'UN', 'United Nations'),
	(244, 'US', 'United States'),
	(245, 'UY', 'Uruguay'),
	(246, 'UZ', 'Uzbekistan'),
	(247, 'VU', 'Vanuatu'),
	(248, 'VA', 'Vatican City'),
	(249, 'VE', 'Venezuela'),
	(250, 'VN', 'Vietnam'),
	(251, 'WF', 'Wallis & Futuna'),
	(252, 'EH', 'Western Sahara'),
	(253, 'YE', 'Yemen'),
	(254, 'ZM', 'Zambia'),
	(255, 'ZW', 'Zimbabwe');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.country_states
DROP TABLE IF EXISTS `country_states`;
CREATE TABLE IF NOT EXISTS `country_states` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `country_states_country_id_foreign` (`country_id`),
  CONSTRAINT `country_states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=569 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.country_states: ~568 rows (approximately)
DELETE FROM `country_states`;
/*!40000 ALTER TABLE `country_states` DISABLE KEYS */;
INSERT INTO `country_states` (`id`, `country_code`, `code`, `default_name`, `country_id`) VALUES
	(1, 'US', 'AL', 'Alabama', 244),
	(2, 'US', 'AK', 'Alaska', 244),
	(3, 'US', 'AS', 'American Samoa', 244),
	(4, 'US', 'AZ', 'Arizona', 244),
	(5, 'US', 'AR', 'Arkansas', 244),
	(6, 'US', 'AE', 'Armed Forces Africa', 244),
	(7, 'US', 'AA', 'Armed Forces Americas', 244),
	(8, 'US', 'AE', 'Armed Forces Canada', 244),
	(9, 'US', 'AE', 'Armed Forces Europe', 244),
	(10, 'US', 'AE', 'Armed Forces Middle East', 244),
	(11, 'US', 'AP', 'Armed Forces Pacific', 244),
	(12, 'US', 'CA', 'California', 244),
	(13, 'US', 'CO', 'Colorado', 244),
	(14, 'US', 'CT', 'Connecticut', 244),
	(15, 'US', 'DE', 'Delaware', 244),
	(16, 'US', 'DC', 'District of Columbia', 244),
	(17, 'US', 'FM', 'Federated States Of Micronesia', 244),
	(18, 'US', 'FL', 'Florida', 244),
	(19, 'US', 'GA', 'Georgia', 244),
	(20, 'US', 'GU', 'Guam', 244),
	(21, 'US', 'HI', 'Hawaii', 244),
	(22, 'US', 'ID', 'Idaho', 244),
	(23, 'US', 'IL', 'Illinois', 244),
	(24, 'US', 'IN', 'Indiana', 244),
	(25, 'US', 'IA', 'Iowa', 244),
	(26, 'US', 'KS', 'Kansas', 244),
	(27, 'US', 'KY', 'Kentucky', 244),
	(28, 'US', 'LA', 'Louisiana', 244),
	(29, 'US', 'ME', 'Maine', 244),
	(30, 'US', 'MH', 'Marshall Islands', 244),
	(31, 'US', 'MD', 'Maryland', 244),
	(32, 'US', 'MA', 'Massachusetts', 244),
	(33, 'US', 'MI', 'Michigan', 244),
	(34, 'US', 'MN', 'Minnesota', 244),
	(35, 'US', 'MS', 'Mississippi', 244),
	(36, 'US', 'MO', 'Missouri', 244),
	(37, 'US', 'MT', 'Montana', 244),
	(38, 'US', 'NE', 'Nebraska', 244),
	(39, 'US', 'NV', 'Nevada', 244),
	(40, 'US', 'NH', 'New Hampshire', 244),
	(41, 'US', 'NJ', 'New Jersey', 244),
	(42, 'US', 'NM', 'New Mexico', 244),
	(43, 'US', 'NY', 'New York', 244),
	(44, 'US', 'NC', 'North Carolina', 244),
	(45, 'US', 'ND', 'North Dakota', 244),
	(46, 'US', 'MP', 'Northern Mariana Islands', 244),
	(47, 'US', 'OH', 'Ohio', 244),
	(48, 'US', 'OK', 'Oklahoma', 244),
	(49, 'US', 'OR', 'Oregon', 244),
	(50, 'US', 'PW', 'Palau', 244),
	(51, 'US', 'PA', 'Pennsylvania', 244),
	(52, 'US', 'PR', 'Puerto Rico', 244),
	(53, 'US', 'RI', 'Rhode Island', 244),
	(54, 'US', 'SC', 'South Carolina', 244),
	(55, 'US', 'SD', 'South Dakota', 244),
	(56, 'US', 'TN', 'Tennessee', 244),
	(57, 'US', 'TX', 'Texas', 244),
	(58, 'US', 'UT', 'Utah', 244),
	(59, 'US', 'VT', 'Vermont', 244),
	(60, 'US', 'VI', 'Virgin Islands', 244),
	(61, 'US', 'VA', 'Virginia', 244),
	(62, 'US', 'WA', 'Washington', 244),
	(63, 'US', 'WV', 'West Virginia', 244),
	(64, 'US', 'WI', 'Wisconsin', 244),
	(65, 'US', 'WY', 'Wyoming', 244),
	(66, 'CA', 'AB', 'Alberta', 40),
	(67, 'CA', 'BC', 'British Columbia', 40),
	(68, 'CA', 'MB', 'Manitoba', 40),
	(69, 'CA', 'NL', 'Newfoundland and Labrador', 40),
	(70, 'CA', 'NB', 'New Brunswick', 40),
	(71, 'CA', 'NS', 'Nova Scotia', 40),
	(72, 'CA', 'NT', 'Northwest Territories', 40),
	(73, 'CA', 'NU', 'Nunavut', 40),
	(74, 'CA', 'ON', 'Ontario', 40),
	(75, 'CA', 'PE', 'Prince Edward Island', 40),
	(76, 'CA', 'QC', 'Quebec', 40),
	(77, 'CA', 'SK', 'Saskatchewan', 40),
	(78, 'CA', 'YT', 'Yukon Territory', 40),
	(79, 'DE', 'NDS', 'Niedersachsen', 88),
	(80, 'DE', 'BAW', 'Baden-Württemberg', 88),
	(81, 'DE', 'BAY', 'Bayern', 88),
	(82, 'DE', 'BER', 'Berlin', 88),
	(83, 'DE', 'BRG', 'Brandenburg', 88),
	(84, 'DE', 'BRE', 'Bremen', 88),
	(85, 'DE', 'HAM', 'Hamburg', 88),
	(86, 'DE', 'HES', 'Hessen', 88),
	(87, 'DE', 'MEC', 'Mecklenburg-Vorpommern', 88),
	(88, 'DE', 'NRW', 'Nordrhein-Westfalen', 88),
	(89, 'DE', 'RHE', 'Rheinland-Pfalz', 88),
	(90, 'DE', 'SAR', 'Saarland', 88),
	(91, 'DE', 'SAS', 'Sachsen', 88),
	(92, 'DE', 'SAC', 'Sachsen-Anhalt', 88),
	(93, 'DE', 'SCN', 'Schleswig-Holstein', 88),
	(94, 'DE', 'THE', 'Thüringen', 88),
	(95, 'AT', 'WI', 'Wien', 16),
	(96, 'AT', 'NO', 'Niederösterreich', 16),
	(97, 'AT', 'OO', 'Oberösterreich', 16),
	(98, 'AT', 'SB', 'Salzburg', 16),
	(99, 'AT', 'KN', 'Kärnten', 16),
	(100, 'AT', 'ST', 'Steiermark', 16),
	(101, 'AT', 'TI', 'Tirol', 16),
	(102, 'AT', 'BL', 'Burgenland', 16),
	(103, 'AT', 'VB', 'Vorarlberg', 16),
	(104, 'CH', 'AG', 'Aargau', 220),
	(105, 'CH', 'AI', 'Appenzell Innerrhoden', 220),
	(106, 'CH', 'AR', 'Appenzell Ausserrhoden', 220),
	(107, 'CH', 'BE', 'Bern', 220),
	(108, 'CH', 'BL', 'Basel-Landschaft', 220),
	(109, 'CH', 'BS', 'Basel-Stadt', 220),
	(110, 'CH', 'FR', 'Freiburg', 220),
	(111, 'CH', 'GE', 'Genf', 220),
	(112, 'CH', 'GL', 'Glarus', 220),
	(113, 'CH', 'GR', 'Graubünden', 220),
	(114, 'CH', 'JU', 'Jura', 220),
	(115, 'CH', 'LU', 'Luzern', 220),
	(116, 'CH', 'NE', 'Neuenburg', 220),
	(117, 'CH', 'NW', 'Nidwalden', 220),
	(118, 'CH', 'OW', 'Obwalden', 220),
	(119, 'CH', 'SG', 'St. Gallen', 220),
	(120, 'CH', 'SH', 'Schaffhausen', 220),
	(121, 'CH', 'SO', 'Solothurn', 220),
	(122, 'CH', 'SZ', 'Schwyz', 220),
	(123, 'CH', 'TG', 'Thurgau', 220),
	(124, 'CH', 'TI', 'Tessin', 220),
	(125, 'CH', 'UR', 'Uri', 220),
	(126, 'CH', 'VD', 'Waadt', 220),
	(127, 'CH', 'VS', 'Wallis', 220),
	(128, 'CH', 'ZG', 'Zug', 220),
	(129, 'CH', 'ZH', 'Zürich', 220),
	(130, 'ES', 'A Coruсa', 'A Coruña', 206),
	(131, 'ES', 'Alava', 'Alava', 206),
	(132, 'ES', 'Albacete', 'Albacete', 206),
	(133, 'ES', 'Alicante', 'Alicante', 206),
	(134, 'ES', 'Almeria', 'Almeria', 206),
	(135, 'ES', 'Asturias', 'Asturias', 206),
	(136, 'ES', 'Avila', 'Avila', 206),
	(137, 'ES', 'Badajoz', 'Badajoz', 206),
	(138, 'ES', 'Baleares', 'Baleares', 206),
	(139, 'ES', 'Barcelona', 'Barcelona', 206),
	(140, 'ES', 'Burgos', 'Burgos', 206),
	(141, 'ES', 'Caceres', 'Caceres', 206),
	(142, 'ES', 'Cadiz', 'Cadiz', 206),
	(143, 'ES', 'Cantabria', 'Cantabria', 206),
	(144, 'ES', 'Castellon', 'Castellon', 206),
	(145, 'ES', 'Ceuta', 'Ceuta', 206),
	(146, 'ES', 'Ciudad Real', 'Ciudad Real', 206),
	(147, 'ES', 'Cordoba', 'Cordoba', 206),
	(148, 'ES', 'Cuenca', 'Cuenca', 206),
	(149, 'ES', 'Girona', 'Girona', 206),
	(150, 'ES', 'Granada', 'Granada', 206),
	(151, 'ES', 'Guadalajara', 'Guadalajara', 206),
	(152, 'ES', 'Guipuzcoa', 'Guipuzcoa', 206),
	(153, 'ES', 'Huelva', 'Huelva', 206),
	(154, 'ES', 'Huesca', 'Huesca', 206),
	(155, 'ES', 'Jaen', 'Jaen', 206),
	(156, 'ES', 'La Rioja', 'La Rioja', 206),
	(157, 'ES', 'Las Palmas', 'Las Palmas', 206),
	(158, 'ES', 'Leon', 'Leon', 206),
	(159, 'ES', 'Lleida', 'Lleida', 206),
	(160, 'ES', 'Lugo', 'Lugo', 206),
	(161, 'ES', 'Madrid', 'Madrid', 206),
	(162, 'ES', 'Malaga', 'Malaga', 206),
	(163, 'ES', 'Melilla', 'Melilla', 206),
	(164, 'ES', 'Murcia', 'Murcia', 206),
	(165, 'ES', 'Navarra', 'Navarra', 206),
	(166, 'ES', 'Ourense', 'Ourense', 206),
	(167, 'ES', 'Palencia', 'Palencia', 206),
	(168, 'ES', 'Pontevedra', 'Pontevedra', 206),
	(169, 'ES', 'Salamanca', 'Salamanca', 206),
	(170, 'ES', 'Santa Cruz de Tenerife', 'Santa Cruz de Tenerife', 206),
	(171, 'ES', 'Segovia', 'Segovia', 206),
	(172, 'ES', 'Sevilla', 'Sevilla', 206),
	(173, 'ES', 'Soria', 'Soria', 206),
	(174, 'ES', 'Tarragona', 'Tarragona', 206),
	(175, 'ES', 'Teruel', 'Teruel', 206),
	(176, 'ES', 'Toledo', 'Toledo', 206),
	(177, 'ES', 'Valencia', 'Valencia', 206),
	(178, 'ES', 'Valladolid', 'Valladolid', 206),
	(179, 'ES', 'Vizcaya', 'Vizcaya', 206),
	(180, 'ES', 'Zamora', 'Zamora', 206),
	(181, 'ES', 'Zaragoza', 'Zaragoza', 206),
	(182, 'FR', '1', 'Ain', 81),
	(183, 'FR', '2', 'Aisne', 81),
	(184, 'FR', '3', 'Allier', 81),
	(185, 'FR', '4', 'Alpes-de-Haute-Provence', 81),
	(186, 'FR', '5', 'Hautes-Alpes', 81),
	(187, 'FR', '6', 'Alpes-Maritimes', 81),
	(188, 'FR', '7', 'Ardèche', 81),
	(189, 'FR', '8', 'Ardennes', 81),
	(190, 'FR', '9', 'Ariège', 81),
	(191, 'FR', '10', 'Aube', 81),
	(192, 'FR', '11', 'Aude', 81),
	(193, 'FR', '12', 'Aveyron', 81),
	(194, 'FR', '13', 'Bouches-du-Rhône', 81),
	(195, 'FR', '14', 'Calvados', 81),
	(196, 'FR', '15', 'Cantal', 81),
	(197, 'FR', '16', 'Charente', 81),
	(198, 'FR', '17', 'Charente-Maritime', 81),
	(199, 'FR', '18', 'Cher', 81),
	(200, 'FR', '19', 'Corrèze', 81),
	(201, 'FR', '2A', 'Corse-du-Sud', 81),
	(202, 'FR', '2B', 'Haute-Corse', 81),
	(203, 'FR', '21', 'Côte-d\'Or', 81),
	(204, 'FR', '22', 'Côtes-d\'Armor', 81),
	(205, 'FR', '23', 'Creuse', 81),
	(206, 'FR', '24', 'Dordogne', 81),
	(207, 'FR', '25', 'Doubs', 81),
	(208, 'FR', '26', 'Drôme', 81),
	(209, 'FR', '27', 'Eure', 81),
	(210, 'FR', '28', 'Eure-et-Loir', 81),
	(211, 'FR', '29', 'Finistère', 81),
	(212, 'FR', '30', 'Gard', 81),
	(213, 'FR', '31', 'Haute-Garonne', 81),
	(214, 'FR', '32', 'Gers', 81),
	(215, 'FR', '33', 'Gironde', 81),
	(216, 'FR', '34', 'Hérault', 81),
	(217, 'FR', '35', 'Ille-et-Vilaine', 81),
	(218, 'FR', '36', 'Indre', 81),
	(219, 'FR', '37', 'Indre-et-Loire', 81),
	(220, 'FR', '38', 'Isère', 81),
	(221, 'FR', '39', 'Jura', 81),
	(222, 'FR', '40', 'Landes', 81),
	(223, 'FR', '41', 'Loir-et-Cher', 81),
	(224, 'FR', '42', 'Loire', 81),
	(225, 'FR', '43', 'Haute-Loire', 81),
	(226, 'FR', '44', 'Loire-Atlantique', 81),
	(227, 'FR', '45', 'Loiret', 81),
	(228, 'FR', '46', 'Lot', 81),
	(229, 'FR', '47', 'Lot-et-Garonne', 81),
	(230, 'FR', '48', 'Lozère', 81),
	(231, 'FR', '49', 'Maine-et-Loire', 81),
	(232, 'FR', '50', 'Manche', 81),
	(233, 'FR', '51', 'Marne', 81),
	(234, 'FR', '52', 'Haute-Marne', 81),
	(235, 'FR', '53', 'Mayenne', 81),
	(236, 'FR', '54', 'Meurthe-et-Moselle', 81),
	(237, 'FR', '55', 'Meuse', 81),
	(238, 'FR', '56', 'Morbihan', 81),
	(239, 'FR', '57', 'Moselle', 81),
	(240, 'FR', '58', 'Nièvre', 81),
	(241, 'FR', '59', 'Nord', 81),
	(242, 'FR', '60', 'Oise', 81),
	(243, 'FR', '61', 'Orne', 81),
	(244, 'FR', '62', 'Pas-de-Calais', 81),
	(245, 'FR', '63', 'Puy-de-Dôme', 81),
	(246, 'FR', '64', 'Pyrénées-Atlantiques', 81),
	(247, 'FR', '65', 'Hautes-Pyrénées', 81),
	(248, 'FR', '66', 'Pyrénées-Orientales', 81),
	(249, 'FR', '67', 'Bas-Rhin', 81),
	(250, 'FR', '68', 'Haut-Rhin', 81),
	(251, 'FR', '69', 'Rhône', 81),
	(252, 'FR', '70', 'Haute-Saône', 81),
	(253, 'FR', '71', 'Saône-et-Loire', 81),
	(254, 'FR', '72', 'Sarthe', 81),
	(255, 'FR', '73', 'Savoie', 81),
	(256, 'FR', '74', 'Haute-Savoie', 81),
	(257, 'FR', '75', 'Paris', 81),
	(258, 'FR', '76', 'Seine-Maritime', 81),
	(259, 'FR', '77', 'Seine-et-Marne', 81),
	(260, 'FR', '78', 'Yvelines', 81),
	(261, 'FR', '79', 'Deux-Sèvres', 81),
	(262, 'FR', '80', 'Somme', 81),
	(263, 'FR', '81', 'Tarn', 81),
	(264, 'FR', '82', 'Tarn-et-Garonne', 81),
	(265, 'FR', '83', 'Var', 81),
	(266, 'FR', '84', 'Vaucluse', 81),
	(267, 'FR', '85', 'Vendée', 81),
	(268, 'FR', '86', 'Vienne', 81),
	(269, 'FR', '87', 'Haute-Vienne', 81),
	(270, 'FR', '88', 'Vosges', 81),
	(271, 'FR', '89', 'Yonne', 81),
	(272, 'FR', '90', 'Territoire-de-Belfort', 81),
	(273, 'FR', '91', 'Essonne', 81),
	(274, 'FR', '92', 'Hauts-de-Seine', 81),
	(275, 'FR', '93', 'Seine-Saint-Denis', 81),
	(276, 'FR', '94', 'Val-de-Marne', 81),
	(277, 'FR', '95', 'Val-d\'Oise', 81),
	(278, 'RO', 'AB', 'Alba', 185),
	(279, 'RO', 'AR', 'Arad', 185),
	(280, 'RO', 'AG', 'Argeş', 185),
	(281, 'RO', 'BC', 'Bacău', 185),
	(282, 'RO', 'BH', 'Bihor', 185),
	(283, 'RO', 'BN', 'Bistriţa-Năsăud', 185),
	(284, 'RO', 'BT', 'Botoşani', 185),
	(285, 'RO', 'BV', 'Braşov', 185),
	(286, 'RO', 'BR', 'Brăila', 185),
	(287, 'RO', 'B', 'Bucureşti', 185),
	(288, 'RO', 'BZ', 'Buzău', 185),
	(289, 'RO', 'CS', 'Caraş-Severin', 185),
	(290, 'RO', 'CL', 'Călăraşi', 185),
	(291, 'RO', 'CJ', 'Cluj', 185),
	(292, 'RO', 'CT', 'Constanţa', 185),
	(293, 'RO', 'CV', 'Covasna', 185),
	(294, 'RO', 'DB', 'Dâmboviţa', 185),
	(295, 'RO', 'DJ', 'Dolj', 185),
	(296, 'RO', 'GL', 'Galaţi', 185),
	(297, 'RO', 'GR', 'Giurgiu', 185),
	(298, 'RO', 'GJ', 'Gorj', 185),
	(299, 'RO', 'HR', 'Harghita', 185),
	(300, 'RO', 'HD', 'Hunedoara', 185),
	(301, 'RO', 'IL', 'Ialomiţa', 185),
	(302, 'RO', 'IS', 'Iaşi', 185),
	(303, 'RO', 'IF', 'Ilfov', 185),
	(304, 'RO', 'MM', 'Maramureş', 185),
	(305, 'RO', 'MH', 'Mehedinţi', 185),
	(306, 'RO', 'MS', 'Mureş', 185),
	(307, 'RO', 'NT', 'Neamţ', 185),
	(308, 'RO', 'OT', 'Olt', 185),
	(309, 'RO', 'PH', 'Prahova', 185),
	(310, 'RO', 'SM', 'Satu-Mare', 185),
	(311, 'RO', 'SJ', 'Sălaj', 185),
	(312, 'RO', 'SB', 'Sibiu', 185),
	(313, 'RO', 'SV', 'Suceava', 185),
	(314, 'RO', 'TR', 'Teleorman', 185),
	(315, 'RO', 'TM', 'Timiş', 185),
	(316, 'RO', 'TL', 'Tulcea', 185),
	(317, 'RO', 'VS', 'Vaslui', 185),
	(318, 'RO', 'VL', 'Vâlcea', 185),
	(319, 'RO', 'VN', 'Vrancea', 185),
	(320, 'FI', 'Lappi', 'Lappi', 80),
	(321, 'FI', 'Pohjois-Pohjanmaa', 'Pohjois-Pohjanmaa', 80),
	(322, 'FI', 'Kainuu', 'Kainuu', 80),
	(323, 'FI', 'Pohjois-Karjala', 'Pohjois-Karjala', 80),
	(324, 'FI', 'Pohjois-Savo', 'Pohjois-Savo', 80),
	(325, 'FI', 'Etelä-Savo', 'Etelä-Savo', 80),
	(326, 'FI', 'Etelä-Pohjanmaa', 'Etelä-Pohjanmaa', 80),
	(327, 'FI', 'Pohjanmaa', 'Pohjanmaa', 80),
	(328, 'FI', 'Pirkanmaa', 'Pirkanmaa', 80),
	(329, 'FI', 'Satakunta', 'Satakunta', 80),
	(330, 'FI', 'Keski-Pohjanmaa', 'Keski-Pohjanmaa', 80),
	(331, 'FI', 'Keski-Suomi', 'Keski-Suomi', 80),
	(332, 'FI', 'Varsinais-Suomi', 'Varsinais-Suomi', 80),
	(333, 'FI', 'Etelä-Karjala', 'Etelä-Karjala', 80),
	(334, 'FI', 'Päijät-Häme', 'Päijät-Häme', 80),
	(335, 'FI', 'Kanta-Häme', 'Kanta-Häme', 80),
	(336, 'FI', 'Uusimaa', 'Uusimaa', 80),
	(337, 'FI', 'Itä-Uusimaa', 'Itä-Uusimaa', 80),
	(338, 'FI', 'Kymenlaakso', 'Kymenlaakso', 80),
	(339, 'FI', 'Ahvenanmaa', 'Ahvenanmaa', 80),
	(340, 'EE', 'EE-37', 'Harjumaa', 74),
	(341, 'EE', 'EE-39', 'Hiiumaa', 74),
	(342, 'EE', 'EE-44', 'Ida-Virumaa', 74),
	(343, 'EE', 'EE-49', 'Jõgevamaa', 74),
	(344, 'EE', 'EE-51', 'Järvamaa', 74),
	(345, 'EE', 'EE-57', 'Läänemaa', 74),
	(346, 'EE', 'EE-59', 'Lääne-Virumaa', 74),
	(347, 'EE', 'EE-65', 'Põlvamaa', 74),
	(348, 'EE', 'EE-67', 'Pärnumaa', 74),
	(349, 'EE', 'EE-70', 'Raplamaa', 74),
	(350, 'EE', 'EE-74', 'Saaremaa', 74),
	(351, 'EE', 'EE-78', 'Tartumaa', 74),
	(352, 'EE', 'EE-82', 'Valgamaa', 74),
	(353, 'EE', 'EE-84', 'Viljandimaa', 74),
	(354, 'EE', 'EE-86', 'Võrumaa', 74),
	(355, 'LV', 'LV-DGV', 'Daugavpils', 125),
	(356, 'LV', 'LV-JEL', 'Jelgava', 125),
	(357, 'LV', 'Jēkabpils', 'Jēkabpils', 125),
	(358, 'LV', 'LV-JUR', 'Jūrmala', 125),
	(359, 'LV', 'LV-LPX', 'Liepāja', 125),
	(360, 'LV', 'LV-LE', 'Liepājas novads', 125),
	(361, 'LV', 'LV-REZ', 'Rēzekne', 125),
	(362, 'LV', 'LV-RIX', 'Rīga', 125),
	(363, 'LV', 'LV-RI', 'Rīgas novads', 125),
	(364, 'LV', 'Valmiera', 'Valmiera', 125),
	(365, 'LV', 'LV-VEN', 'Ventspils', 125),
	(366, 'LV', 'Aglonas novads', 'Aglonas novads', 125),
	(367, 'LV', 'LV-AI', 'Aizkraukles novads', 125),
	(368, 'LV', 'Aizputes novads', 'Aizputes novads', 125),
	(369, 'LV', 'Aknīstes novads', 'Aknīstes novads', 125),
	(370, 'LV', 'Alojas novads', 'Alojas novads', 125),
	(371, 'LV', 'Alsungas novads', 'Alsungas novads', 125),
	(372, 'LV', 'LV-AL', 'Alūksnes novads', 125),
	(373, 'LV', 'Amatas novads', 'Amatas novads', 125),
	(374, 'LV', 'Apes novads', 'Apes novads', 125),
	(375, 'LV', 'Auces novads', 'Auces novads', 125),
	(376, 'LV', 'Babītes novads', 'Babītes novads', 125),
	(377, 'LV', 'Baldones novads', 'Baldones novads', 125),
	(378, 'LV', 'Baltinavas novads', 'Baltinavas novads', 125),
	(379, 'LV', 'LV-BL', 'Balvu novads', 125),
	(380, 'LV', 'LV-BU', 'Bauskas novads', 125),
	(381, 'LV', 'Beverīnas novads', 'Beverīnas novads', 125),
	(382, 'LV', 'Brocēnu novads', 'Brocēnu novads', 125),
	(383, 'LV', 'Burtnieku novads', 'Burtnieku novads', 125),
	(384, 'LV', 'Carnikavas novads', 'Carnikavas novads', 125),
	(385, 'LV', 'Cesvaines novads', 'Cesvaines novads', 125),
	(386, 'LV', 'Ciblas novads', 'Ciblas novads', 125),
	(387, 'LV', 'LV-CE', 'Cēsu novads', 125),
	(388, 'LV', 'Dagdas novads', 'Dagdas novads', 125),
	(389, 'LV', 'LV-DA', 'Daugavpils novads', 125),
	(390, 'LV', 'LV-DO', 'Dobeles novads', 125),
	(391, 'LV', 'Dundagas novads', 'Dundagas novads', 125),
	(392, 'LV', 'Durbes novads', 'Durbes novads', 125),
	(393, 'LV', 'Engures novads', 'Engures novads', 125),
	(394, 'LV', 'Garkalnes novads', 'Garkalnes novads', 125),
	(395, 'LV', 'Grobiņas novads', 'Grobiņas novads', 125),
	(396, 'LV', 'LV-GU', 'Gulbenes novads', 125),
	(397, 'LV', 'Iecavas novads', 'Iecavas novads', 125),
	(398, 'LV', 'Ikšķiles novads', 'Ikšķiles novads', 125),
	(399, 'LV', 'Ilūkstes novads', 'Ilūkstes novads', 125),
	(400, 'LV', 'Inčukalna novads', 'Inčukalna novads', 125),
	(401, 'LV', 'Jaunjelgavas novads', 'Jaunjelgavas novads', 125),
	(402, 'LV', 'Jaunpiebalgas novads', 'Jaunpiebalgas novads', 125),
	(403, 'LV', 'Jaunpils novads', 'Jaunpils novads', 125),
	(404, 'LV', 'LV-JL', 'Jelgavas novads', 125),
	(405, 'LV', 'LV-JK', 'Jēkabpils novads', 125),
	(406, 'LV', 'Kandavas novads', 'Kandavas novads', 125),
	(407, 'LV', 'Kokneses novads', 'Kokneses novads', 125),
	(408, 'LV', 'Krimuldas novads', 'Krimuldas novads', 125),
	(409, 'LV', 'Krustpils novads', 'Krustpils novads', 125),
	(410, 'LV', 'LV-KR', 'Krāslavas novads', 125),
	(411, 'LV', 'LV-KU', 'Kuldīgas novads', 125),
	(412, 'LV', 'Kārsavas novads', 'Kārsavas novads', 125),
	(413, 'LV', 'Lielvārdes novads', 'Lielvārdes novads', 125),
	(414, 'LV', 'LV-LM', 'Limbažu novads', 125),
	(415, 'LV', 'Lubānas novads', 'Lubānas novads', 125),
	(416, 'LV', 'LV-LU', 'Ludzas novads', 125),
	(417, 'LV', 'Līgatnes novads', 'Līgatnes novads', 125),
	(418, 'LV', 'Līvānu novads', 'Līvānu novads', 125),
	(419, 'LV', 'LV-MA', 'Madonas novads', 125),
	(420, 'LV', 'Mazsalacas novads', 'Mazsalacas novads', 125),
	(421, 'LV', 'Mālpils novads', 'Mālpils novads', 125),
	(422, 'LV', 'Mārupes novads', 'Mārupes novads', 125),
	(423, 'LV', 'Naukšēnu novads', 'Naukšēnu novads', 125),
	(424, 'LV', 'Neretas novads', 'Neretas novads', 125),
	(425, 'LV', 'Nīcas novads', 'Nīcas novads', 125),
	(426, 'LV', 'LV-OG', 'Ogres novads', 125),
	(427, 'LV', 'Olaines novads', 'Olaines novads', 125),
	(428, 'LV', 'Ozolnieku novads', 'Ozolnieku novads', 125),
	(429, 'LV', 'LV-PR', 'Preiļu novads', 125),
	(430, 'LV', 'Priekules novads', 'Priekules novads', 125),
	(431, 'LV', 'Priekuļu novads', 'Priekuļu novads', 125),
	(432, 'LV', 'Pārgaujas novads', 'Pārgaujas novads', 125),
	(433, 'LV', 'Pāvilostas novads', 'Pāvilostas novads', 125),
	(434, 'LV', 'Pļaviņu novads', 'Pļaviņu novads', 125),
	(435, 'LV', 'Raunas novads', 'Raunas novads', 125),
	(436, 'LV', 'Riebiņu novads', 'Riebiņu novads', 125),
	(437, 'LV', 'Rojas novads', 'Rojas novads', 125),
	(438, 'LV', 'Ropažu novads', 'Ropažu novads', 125),
	(439, 'LV', 'Rucavas novads', 'Rucavas novads', 125),
	(440, 'LV', 'Rugāju novads', 'Rugāju novads', 125),
	(441, 'LV', 'Rundāles novads', 'Rundāles novads', 125),
	(442, 'LV', 'LV-RE', 'Rēzeknes novads', 125),
	(443, 'LV', 'Rūjienas novads', 'Rūjienas novads', 125),
	(444, 'LV', 'Salacgrīvas novads', 'Salacgrīvas novads', 125),
	(445, 'LV', 'Salas novads', 'Salas novads', 125),
	(446, 'LV', 'Salaspils novads', 'Salaspils novads', 125),
	(447, 'LV', 'LV-SA', 'Saldus novads', 125),
	(448, 'LV', 'Saulkrastu novads', 'Saulkrastu novads', 125),
	(449, 'LV', 'Siguldas novads', 'Siguldas novads', 125),
	(450, 'LV', 'Skrundas novads', 'Skrundas novads', 125),
	(451, 'LV', 'Skrīveru novads', 'Skrīveru novads', 125),
	(452, 'LV', 'Smiltenes novads', 'Smiltenes novads', 125),
	(453, 'LV', 'Stopiņu novads', 'Stopiņu novads', 125),
	(454, 'LV', 'Strenču novads', 'Strenču novads', 125),
	(455, 'LV', 'Sējas novads', 'Sējas novads', 125),
	(456, 'LV', 'LV-TA', 'Talsu novads', 125),
	(457, 'LV', 'LV-TU', 'Tukuma novads', 125),
	(458, 'LV', 'Tērvetes novads', 'Tērvetes novads', 125),
	(459, 'LV', 'Vaiņodes novads', 'Vaiņodes novads', 125),
	(460, 'LV', 'LV-VK', 'Valkas novads', 125),
	(461, 'LV', 'LV-VM', 'Valmieras novads', 125),
	(462, 'LV', 'Varakļānu novads', 'Varakļānu novads', 125),
	(463, 'LV', 'Vecpiebalgas novads', 'Vecpiebalgas novads', 125),
	(464, 'LV', 'Vecumnieku novads', 'Vecumnieku novads', 125),
	(465, 'LV', 'LV-VE', 'Ventspils novads', 125),
	(466, 'LV', 'Viesītes novads', 'Viesītes novads', 125),
	(467, 'LV', 'Viļakas novads', 'Viļakas novads', 125),
	(468, 'LV', 'Viļānu novads', 'Viļānu novads', 125),
	(469, 'LV', 'Vārkavas novads', 'Vārkavas novads', 125),
	(470, 'LV', 'Zilupes novads', 'Zilupes novads', 125),
	(471, 'LV', 'Ādažu novads', 'Ādažu novads', 125),
	(472, 'LV', 'Ērgļu novads', 'Ērgļu novads', 125),
	(473, 'LV', 'Ķeguma novads', 'Ķeguma novads', 125),
	(474, 'LV', 'Ķekavas novads', 'Ķekavas novads', 125),
	(475, 'LT', 'LT-AL', 'Alytaus Apskritis', 131),
	(476, 'LT', 'LT-KU', 'Kauno Apskritis', 131),
	(477, 'LT', 'LT-KL', 'Klaipėdos Apskritis', 131),
	(478, 'LT', 'LT-MR', 'Marijampolės Apskritis', 131),
	(479, 'LT', 'LT-PN', 'Panevėžio Apskritis', 131),
	(480, 'LT', 'LT-SA', 'Šiaulių Apskritis', 131),
	(481, 'LT', 'LT-TA', 'Tauragės Apskritis', 131),
	(482, 'LT', 'LT-TE', 'Telšių Apskritis', 131),
	(483, 'LT', 'LT-UT', 'Utenos Apskritis', 131),
	(484, 'LT', 'LT-VL', 'Vilniaus Apskritis', 131),
	(485, 'BR', 'AC', 'Acre', 31),
	(486, 'BR', 'AL', 'Alagoas', 31),
	(487, 'BR', 'AP', 'Amapá', 31),
	(488, 'BR', 'AM', 'Amazonas', 31),
	(489, 'BR', 'BA', 'Bahia', 31),
	(490, 'BR', 'CE', 'Ceará', 31),
	(491, 'BR', 'ES', 'Espírito Santo', 31),
	(492, 'BR', 'GO', 'Goiás', 31),
	(493, 'BR', 'MA', 'Maranhão', 31),
	(494, 'BR', 'MT', 'Mato Grosso', 31),
	(495, 'BR', 'MS', 'Mato Grosso do Sul', 31),
	(496, 'BR', 'MG', 'Minas Gerais', 31),
	(497, 'BR', 'PA', 'Pará', 31),
	(498, 'BR', 'PB', 'Paraíba', 31),
	(499, 'BR', 'PR', 'Paraná', 31),
	(500, 'BR', 'PE', 'Pernambuco', 31),
	(501, 'BR', 'PI', 'Piauí', 31),
	(502, 'BR', 'RJ', 'Rio de Janeiro', 31),
	(503, 'BR', 'RN', 'Rio Grande do Norte', 31),
	(504, 'BR', 'RS', 'Rio Grande do Sul', 31),
	(505, 'BR', 'RO', 'Rondônia', 31),
	(506, 'BR', 'RR', 'Roraima', 31),
	(507, 'BR', 'SC', 'Santa Catarina', 31),
	(508, 'BR', 'SP', 'São Paulo', 31),
	(509, 'BR', 'SE', 'Sergipe', 31),
	(510, 'BR', 'TO', 'Tocantins', 31),
	(511, 'BR', 'DF', 'Distrito Federal', 31),
	(512, 'HR', 'HR-01', 'Zagrebačka županija', 59),
	(513, 'HR', 'HR-02', 'Krapinsko-zagorska županija', 59),
	(514, 'HR', 'HR-03', 'Sisačko-moslavačka županija', 59),
	(515, 'HR', 'HR-04', 'Karlovačka županija', 59),
	(516, 'HR', 'HR-05', 'Varaždinska županija', 59),
	(517, 'HR', 'HR-06', 'Koprivničko-križevačka županija', 59),
	(518, 'HR', 'HR-07', 'Bjelovarsko-bilogorska županija', 59),
	(519, 'HR', 'HR-08', 'Primorsko-goranska županija', 59),
	(520, 'HR', 'HR-09', 'Ličko-senjska županija', 59),
	(521, 'HR', 'HR-10', 'Virovitičko-podravska županija', 59),
	(522, 'HR', 'HR-11', 'Požeško-slavonska županija', 59),
	(523, 'HR', 'HR-12', 'Brodsko-posavska županija', 59),
	(524, 'HR', 'HR-13', 'Zadarska županija', 59),
	(525, 'HR', 'HR-14', 'Osječko-baranjska županija', 59),
	(526, 'HR', 'HR-15', 'Šibensko-kninska županija', 59),
	(527, 'HR', 'HR-16', 'Vukovarsko-srijemska županija', 59),
	(528, 'HR', 'HR-17', 'Splitsko-dalmatinska županija', 59),
	(529, 'HR', 'HR-18', 'Istarska županija', 59),
	(530, 'HR', 'HR-19', 'Dubrovačko-neretvanska županija', 59),
	(531, 'HR', 'HR-20', 'Međimurska županija', 59),
	(532, 'HR', 'HR-21', 'Grad Zagreb', 59),
	(533, 'IN', 'AN', 'Andaman and Nicobar Islands', 106),
	(534, 'IN', 'AP', 'Andhra Pradesh', 106),
	(535, 'IN', 'AR', 'Arunachal Pradesh', 106),
	(536, 'IN', 'AS', 'Assam', 106),
	(537, 'IN', 'BR', 'Bihar', 106),
	(538, 'IN', 'CH', 'Chandigarh', 106),
	(539, 'IN', 'CT', 'Chhattisgarh', 106),
	(540, 'IN', 'DN', 'Dadra and Nagar Haveli', 106),
	(541, 'IN', 'DD', 'Daman and Diu', 106),
	(542, 'IN', 'DL', 'Delhi', 106),
	(543, 'IN', 'GA', 'Goa', 106),
	(544, 'IN', 'GJ', 'Gujarat', 106),
	(545, 'IN', 'HR', 'Haryana', 106),
	(546, 'IN', 'HP', 'Himachal Pradesh', 106),
	(547, 'IN', 'JK', 'Jammu and Kashmir', 106),
	(548, 'IN', 'JH', 'Jharkhand', 106),
	(549, 'IN', 'KA', 'Karnataka', 106),
	(550, 'IN', 'KL', 'Kerala', 106),
	(551, 'IN', 'LD', 'Lakshadweep', 106),
	(552, 'IN', 'MP', 'Madhya Pradesh', 106),
	(553, 'IN', 'MH', 'Maharashtra', 106),
	(554, 'IN', 'MN', 'Manipur', 106),
	(555, 'IN', 'ML', 'Meghalaya', 106),
	(556, 'IN', 'MZ', 'Mizoram', 106),
	(557, 'IN', 'NL', 'Nagaland', 106),
	(558, 'IN', 'OR', 'Odisha', 106),
	(559, 'IN', 'PY', 'Puducherry', 106),
	(560, 'IN', 'PB', 'Punjab', 106),
	(561, 'IN', 'RJ', 'Rajasthan', 106),
	(562, 'IN', 'SK', 'Sikkim', 106),
	(563, 'IN', 'TN', 'Tamil Nadu', 106),
	(564, 'IN', 'TG', 'Telangana', 106),
	(565, 'IN', 'TR', 'Tripura', 106),
	(566, 'IN', 'UP', 'Uttar Pradesh', 106),
	(567, 'IN', 'UT', 'Uttarakhand', 106),
	(568, 'IN', 'WB', 'West Bengal', 106);
/*!40000 ALTER TABLE `country_states` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.country_state_translations
DROP TABLE IF EXISTS `country_state_translations`;
CREATE TABLE IF NOT EXISTS `country_state_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `country_state_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_state_translations_country_state_id_foreign` (`country_state_id`),
  CONSTRAINT `country_state_translations_country_state_id_foreign` FOREIGN KEY (`country_state_id`) REFERENCES `country_states` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.country_state_translations: ~0 rows (approximately)
DELETE FROM `country_state_translations`;
/*!40000 ALTER TABLE `country_state_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `country_state_translations` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.country_translations
DROP TABLE IF EXISTS `country_translations`;
CREATE TABLE IF NOT EXISTS `country_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `country_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_translations_country_id_foreign` (`country_id`),
  CONSTRAINT `country_translations_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.country_translations: ~0 rows (approximately)
DELETE FROM `country_translations`;
/*!40000 ALTER TABLE `country_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `country_translations` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.currencies
DROP TABLE IF EXISTS `currencies`;
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.currencies: ~0 rows (approximately)
DELETE FROM `currencies`;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'USD', 'US Dollar', NULL, NULL);
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.currency_exchange_rates
DROP TABLE IF EXISTS `currency_exchange_rates`;
CREATE TABLE IF NOT EXISTS `currency_exchange_rates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rate` decimal(10,5) NOT NULL,
  `target_currency` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `currency_exchange_rates_target_currency_unique` (`target_currency`),
  CONSTRAINT `currency_exchange_rates_target_currency_foreign` FOREIGN KEY (`target_currency`) REFERENCES `currencies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.currency_exchange_rates: ~0 rows (approximately)
DELETE FROM `currency_exchange_rates`;
/*!40000 ALTER TABLE `currency_exchange_rates` DISABLE KEYS */;
/*!40000 ALTER TABLE `currency_exchange_rates` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.customers
DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `channel_id` int(10) unsigned NOT NULL,
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_group_id` int(10) unsigned DEFAULT NULL,
  `subscribed_to_news_letter` tinyint(1) NOT NULL DEFAULT '0',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_email_unique` (`email`),
  KEY `customers_channel_id_foreign` (`channel_id`),
  KEY `customers_customer_group_id_foreign` (`customer_group_id`),
  CONSTRAINT `customers_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `customers_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.customers: ~0 rows (approximately)
DELETE FROM `customers`;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.customer_addresses
DROP TABLE IF EXISTS `customer_addresses`;
CREATE TABLE IF NOT EXISTS `customer_addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `address1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` int(11) NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_address` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_addresses_customer_id_foreign` (`customer_id`),
  CONSTRAINT `customer_addresses_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.customer_addresses: ~0 rows (approximately)
DELETE FROM `customer_addresses`;
/*!40000 ALTER TABLE `customer_addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_addresses` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.customer_groups
DROP TABLE IF EXISTS `customer_groups`;
CREATE TABLE IF NOT EXISTS `customer_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_user_defined` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.customer_groups: ~0 rows (approximately)
DELETE FROM `customer_groups`;
/*!40000 ALTER TABLE `customer_groups` DISABLE KEYS */;
INSERT INTO `customer_groups` (`id`, `name`, `is_user_defined`, `created_at`, `updated_at`) VALUES
	(1, 'General', 0, NULL, NULL);
/*!40000 ALTER TABLE `customer_groups` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.customer_password_resets
DROP TABLE IF EXISTS `customer_password_resets`;
CREATE TABLE IF NOT EXISTS `customer_password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `customer_password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.customer_password_resets: ~0 rows (approximately)
DELETE FROM `customer_password_resets`;
/*!40000 ALTER TABLE `customer_password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_password_resets` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.inventory_sources
DROP TABLE IF EXISTS `inventory_sources`;
CREATE TABLE IF NOT EXISTS `inventory_sources` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `contact_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_fax` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '0',
  `latitude` decimal(10,5) DEFAULT NULL,
  `longitude` decimal(10,5) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `inventory_sources_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.inventory_sources: ~0 rows (approximately)
DELETE FROM `inventory_sources`;
/*!40000 ALTER TABLE `inventory_sources` DISABLE KEYS */;
INSERT INTO `inventory_sources` (`id`, `code`, `name`, `description`, `contact_name`, `contact_email`, `contact_number`, `contact_fax`, `country`, `state`, `city`, `street`, `postcode`, `priority`, `latitude`, `longitude`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'default', 'Default', NULL, 'Detroit Warehouse', 'warehouse@example.com', '1234567899', NULL, 'US', 'MI', 'Detroit', '12th Street', '48127', 0, NULL, NULL, 1, NULL, NULL);
/*!40000 ALTER TABLE `inventory_sources` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.invoices
DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `increment_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_sent` tinyint(1) NOT NULL DEFAULT '0',
  `total_qty` int(11) DEFAULT NULL,
  `base_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` decimal(12,4) DEFAULT '0.0000',
  `base_sub_total` decimal(12,4) DEFAULT '0.0000',
  `grand_total` decimal(12,4) DEFAULT '0.0000',
  `base_grand_total` decimal(12,4) DEFAULT '0.0000',
  `shipping_amount` decimal(12,4) DEFAULT '0.0000',
  `base_shipping_amount` decimal(12,4) DEFAULT '0.0000',
  `tax_amount` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount` decimal(12,4) DEFAULT '0.0000',
  `discount_amount` decimal(12,4) DEFAULT '0.0000',
  `base_discount_amount` decimal(12,4) DEFAULT '0.0000',
  `order_id` int(10) unsigned DEFAULT NULL,
  `order_address_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transaction_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoices_order_id_foreign` (`order_id`),
  KEY `invoices_order_address_id_foreign` (`order_address_id`),
  CONSTRAINT `invoices_order_address_id_foreign` FOREIGN KEY (`order_address_id`) REFERENCES `order_address` (`id`) ON DELETE SET NULL,
  CONSTRAINT `invoices_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.invoices: ~0 rows (approximately)
DELETE FROM `invoices`;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.invoice_items
DROP TABLE IF EXISTS `invoice_items`;
CREATE TABLE IF NOT EXISTS `invoice_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `total` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_total` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `tax_amount` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount` decimal(12,4) DEFAULT '0.0000',
  `product_id` int(10) unsigned DEFAULT NULL,
  `product_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_item_id` int(10) unsigned DEFAULT NULL,
  `invoice_id` int(10) unsigned DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `additional` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_items_invoice_id_foreign` (`invoice_id`),
  KEY `invoice_items_parent_id_foreign` (`parent_id`),
  CONSTRAINT `invoice_items_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  CONSTRAINT `invoice_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `invoice_items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.invoice_items: ~0 rows (approximately)
DELETE FROM `invoice_items`;
/*!40000 ALTER TABLE `invoice_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice_items` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.locales
DROP TABLE IF EXISTS `locales`;
CREATE TABLE IF NOT EXISTS `locales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locales_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.locales: ~0 rows (approximately)
DELETE FROM `locales`;
/*!40000 ALTER TABLE `locales` DISABLE KEYS */;
INSERT INTO `locales` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'en', 'English', NULL, NULL);
/*!40000 ALTER TABLE `locales` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.migrations: ~76 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_admin_password_resets_table', 1),
	(3, '2014_10_12_100000_create_password_resets_table', 1),
	(4, '2018_06_12_111907_create_admins_table', 1),
	(5, '2018_06_13_055341_create_roles_table', 1),
	(6, '2018_07_05_130148_create_attributes_table', 1),
	(7, '2018_07_05_132854_create_attribute_translations_table', 1),
	(8, '2018_07_05_135150_create_attribute_families_table', 1),
	(9, '2018_07_05_135152_create_attribute_groups_table', 1),
	(10, '2018_07_05_140832_create_attribute_options_table', 1),
	(11, '2018_07_05_140856_create_attribute_option_translations_table', 1),
	(12, '2018_07_05_142820_create_categories_table', 1),
	(13, '2018_07_10_055143_create_locales_table', 1),
	(14, '2018_07_20_054426_create_countries_table', 1),
	(15, '2018_07_20_054502_create_currencies_table', 1),
	(16, '2018_07_20_054542_create_currency_exchange_rates_table', 1),
	(17, '2018_07_20_064849_create_channels_table', 1),
	(18, '2018_07_21_142836_create_category_translations_table', 1),
	(19, '2018_07_23_110040_create_inventory_sources_table', 1),
	(20, '2018_07_24_082635_create_customer_groups_table', 1),
	(21, '2018_07_24_082930_create_customers_table', 1),
	(22, '2018_07_24_083025_create_customer_addresses_table', 1),
	(23, '2018_07_27_065727_create_products_table', 1),
	(24, '2018_07_27_070011_create_product_attribute_values_table', 1),
	(25, '2018_07_27_092623_create_product_reviews_table', 1),
	(26, '2018_07_27_113941_create_product_images_table', 1),
	(27, '2018_07_27_113956_create_product_inventories_table', 1),
	(28, '2018_08_03_114203_create_sliders_table', 1),
	(29, '2018_08_30_064755_create_tax_categories_table', 1),
	(30, '2018_08_30_065042_create_tax_rates_table', 1),
	(31, '2018_08_30_065840_create_tax_mappings_table', 1),
	(32, '2018_09_05_150444_create_cart_table', 1),
	(33, '2018_09_05_150915_create_cart_items_table', 1),
	(34, '2018_09_11_064045_customer_password_resets', 1),
	(35, '2018_09_19_092845_create_cart_address', 1),
	(36, '2018_09_19_093453_create_cart_payment', 1),
	(37, '2018_09_19_093508_create_cart_shipping_rates_table', 1),
	(38, '2018_09_20_060658_create_core_config_table', 1),
	(39, '2018_09_27_113154_create_orders_table', 1),
	(40, '2018_09_27_113207_create_order_items_table', 1),
	(41, '2018_09_27_113405_create_order_address_table', 1),
	(42, '2018_09_27_115022_create_shipments_table', 1),
	(43, '2018_09_27_115029_create_shipment_items_table', 1),
	(44, '2018_09_27_115135_create_invoices_table', 1),
	(45, '2018_09_27_115144_create_invoice_items_table', 1),
	(46, '2018_10_01_095504_create_order_payment_table', 1),
	(47, '2018_10_03_025230_create_wishlist_table', 1),
	(48, '2018_10_12_101803_create_country_translations_table', 1),
	(49, '2018_10_12_101913_create_country_states_table', 1),
	(50, '2018_10_12_101923_create_country_state_translations_table', 1),
	(51, '2018_10_22_111807_create_products_grid', 1),
	(52, '2018_11_15_153257_alter_order_table', 1),
	(53, '2018_11_15_163729_alter_invoice_table', 1),
	(54, '2018_11_16_173504_create_subscribers_list_table', 1),
	(55, '2018_11_17_165758_add_is_verified_column_in_customers_table', 1),
	(56, '2018_11_21_144411_create_cart_item_inventories_table', 1),
	(57, '2018_11_26_110500_change_gender_column_in_customers_table', 1),
	(58, '2018_11_27_113535_remove_cost_column_from_datagrid', 1),
	(59, '2018_11_27_174449_change_content_column_in_sliders_table', 1),
	(60, '2018_12_05_132625_drop_foreign_key_core_config_table', 1),
	(61, '2018_12_05_132629_alter_core_config_table', 1),
	(62, '2018_12_06_185202_create_product_flat_table', 1),
	(63, '2018_12_21_101307_alter_channels_table', 1),
	(64, '2018_12_24_123812_create_channel_inventory_sources_table', 1),
	(65, '2018_12_24_184402_alter_shipments_table', 1),
	(66, '2018_12_26_165327_create_product_ordered_inventories_table', 1),
	(67, '2018_12_31_161114_alter_channels_category_table', 1),
	(68, '2019_01_11_122452_add_vendor_id_column_in_product_inventories_table', 1),
	(69, '2019_01_25_124522_add_updated_at_column_in_product_flat_table', 1),
	(70, '2019_01_29_123053_add_min_price_and_max_price_column_in_product_flat_table', 1),
	(71, '2019_01_31_164117_update_value_column_type_to_text_in_core_config_table', 1),
	(72, '2019_02_21_145238_alter_product_reviews_table', 1),
	(73, '2019_02_21_152709_add_swatch_type_column_in_attributes_table', 1),
	(74, '2019_02_21_153035_alter_customer_id_in_product_reviews_table', 1),
	(75, '2019_02_21_153851_add_swatch_value_columns_in_attribute_options_table', 1),
	(76, '2019_03_15_123337_add_display_mode_column_in_categories_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.orders
DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `increment_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_guest` tinyint(1) DEFAULT NULL,
  `customer_email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_gift` tinyint(1) NOT NULL DEFAULT '0',
  `total_item_count` int(11) DEFAULT NULL,
  `total_qty_ordered` int(11) DEFAULT NULL,
  `base_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` decimal(12,4) DEFAULT '0.0000',
  `base_grand_total` decimal(12,4) DEFAULT '0.0000',
  `grand_total_invoiced` decimal(12,4) DEFAULT '0.0000',
  `base_grand_total_invoiced` decimal(12,4) DEFAULT '0.0000',
  `grand_total_refunded` decimal(12,4) DEFAULT '0.0000',
  `base_grand_total_refunded` decimal(12,4) DEFAULT '0.0000',
  `sub_total` decimal(12,4) DEFAULT '0.0000',
  `base_sub_total` decimal(12,4) DEFAULT '0.0000',
  `sub_total_invoiced` decimal(12,4) DEFAULT '0.0000',
  `base_sub_total_invoiced` decimal(12,4) DEFAULT '0.0000',
  `sub_total_refunded` decimal(12,4) DEFAULT '0.0000',
  `base_sub_total_refunded` decimal(12,4) DEFAULT '0.0000',
  `discount_percent` decimal(12,4) DEFAULT '0.0000',
  `discount_amount` decimal(12,4) DEFAULT '0.0000',
  `base_discount_amount` decimal(12,4) DEFAULT '0.0000',
  `discount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `base_discount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `discount_refunded` decimal(12,4) DEFAULT '0.0000',
  `base_discount_refunded` decimal(12,4) DEFAULT '0.0000',
  `tax_amount` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount` decimal(12,4) DEFAULT '0.0000',
  `tax_amount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `tax_amount_refunded` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount_refunded` decimal(12,4) DEFAULT '0.0000',
  `shipping_amount` decimal(12,4) DEFAULT '0.0000',
  `base_shipping_amount` decimal(12,4) DEFAULT '0.0000',
  `shipping_invoiced` decimal(12,4) DEFAULT '0.0000',
  `base_shipping_invoiced` decimal(12,4) DEFAULT '0.0000',
  `shipping_refunded` decimal(12,4) DEFAULT '0.0000',
  `base_shipping_refunded` decimal(12,4) DEFAULT '0.0000',
  `customer_id` int(10) unsigned DEFAULT NULL,
  `customer_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_id` int(10) unsigned DEFAULT NULL,
  `channel_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_customer_id_foreign` (`customer_id`),
  KEY `orders_channel_id_foreign` (`channel_id`),
  CONSTRAINT `orders_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE SET NULL,
  CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.orders: ~0 rows (approximately)
DELETE FROM `orders`;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.order_address
DROP TABLE IF EXISTS `order_address`;
CREATE TABLE IF NOT EXISTS `order_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` int(11) NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `customer_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_address_order_id_foreign` (`order_id`),
  KEY `order_address_customer_id_foreign` (`customer_id`),
  CONSTRAINT `order_address_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL,
  CONSTRAINT `order_address_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.order_address: ~0 rows (approximately)
DELETE FROM `order_address`;
/*!40000 ALTER TABLE `order_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_address` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.order_items
DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` decimal(12,4) DEFAULT '0.0000',
  `total_weight` decimal(12,4) DEFAULT '0.0000',
  `qty_ordered` int(11) DEFAULT '0',
  `qty_shipped` int(11) DEFAULT '0',
  `qty_invoiced` int(11) DEFAULT '0',
  `qty_canceled` int(11) DEFAULT '0',
  `qty_refunded` int(11) DEFAULT '0',
  `price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `total` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_total` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `total_invoiced` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_total_invoiced` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `amount_refunded` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_amount_refunded` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `discount_percent` decimal(12,4) DEFAULT '0.0000',
  `discount_amount` decimal(12,4) DEFAULT '0.0000',
  `base_discount_amount` decimal(12,4) DEFAULT '0.0000',
  `discount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `base_discount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `discount_refunded` decimal(12,4) DEFAULT '0.0000',
  `base_discount_refunded` decimal(12,4) DEFAULT '0.0000',
  `tax_percent` decimal(12,4) DEFAULT '0.0000',
  `tax_amount` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount` decimal(12,4) DEFAULT '0.0000',
  `tax_amount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `tax_amount_refunded` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount_refunded` decimal(12,4) DEFAULT '0.0000',
  `product_id` int(10) unsigned DEFAULT NULL,
  `product_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int(10) unsigned DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `additional` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_parent_id_foreign` (`parent_id`),
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.order_items: ~0 rows (approximately)
DELETE FROM `order_items`;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.order_payment
DROP TABLE IF EXISTS `order_payment`;
CREATE TABLE IF NOT EXISTS `order_payment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_payment_order_id_foreign` (`order_id`),
  CONSTRAINT `order_payment_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.order_payment: ~0 rows (approximately)
DELETE FROM `order_payment`;
/*!40000 ALTER TABLE `order_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_payment` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `attribute_family_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_sku_unique` (`sku`),
  KEY `products_attribute_family_id_foreign` (`attribute_family_id`),
  KEY `products_parent_id_foreign` (`parent_id`),
  CONSTRAINT `products_attribute_family_id_foreign` FOREIGN KEY (`attribute_family_id`) REFERENCES `attribute_families` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `products_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.products: ~0 rows (approximately)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.products_grid
DROP TABLE IF EXISTS `products_grid`;
CREATE TABLE IF NOT EXISTS `products_grid` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `attribute_family_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `price` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_grid_product_id_foreign` (`product_id`),
  CONSTRAINT `products_grid_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.products_grid: ~0 rows (approximately)
DELETE FROM `products_grid`;
/*!40000 ALTER TABLE `products_grid` DISABLE KEYS */;
/*!40000 ALTER TABLE `products_grid` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.product_attribute_values
DROP TABLE IF EXISTS `product_attribute_values`;
CREATE TABLE IF NOT EXISTS `product_attribute_values` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `boolean_value` tinyint(1) DEFAULT NULL,
  `integer_value` int(11) DEFAULT NULL,
  `float_value` double DEFAULT NULL,
  `datetime_value` datetime DEFAULT NULL,
  `date_value` date DEFAULT NULL,
  `json_value` json DEFAULT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `attribute_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chanel_locale_attribute_value_index_unique` (`channel`,`locale`,`attribute_id`,`product_id`),
  KEY `product_attribute_values_product_id_foreign` (`product_id`),
  KEY `product_attribute_values_attribute_id_foreign` (`attribute_id`),
  CONSTRAINT `product_attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_attribute_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.product_attribute_values: ~0 rows (approximately)
DELETE FROM `product_attribute_values`;
/*!40000 ALTER TABLE `product_attribute_values` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_attribute_values` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.product_categories
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `product_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  KEY `product_categories_product_id_foreign` (`product_id`),
  KEY `product_categories_category_id_foreign` (`category_id`),
  CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.product_categories: ~0 rows (approximately)
DELETE FROM `product_categories`;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.product_cross_sells
DROP TABLE IF EXISTS `product_cross_sells`;
CREATE TABLE IF NOT EXISTS `product_cross_sells` (
  `parent_id` int(10) unsigned NOT NULL,
  `child_id` int(10) unsigned NOT NULL,
  KEY `product_cross_sells_parent_id_foreign` (`parent_id`),
  KEY `product_cross_sells_child_id_foreign` (`child_id`),
  CONSTRAINT `product_cross_sells_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_cross_sells_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.product_cross_sells: ~0 rows (approximately)
DELETE FROM `product_cross_sells`;
/*!40000 ALTER TABLE `product_cross_sells` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_cross_sells` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.product_flat
DROP TABLE IF EXISTS `product_flat`;
CREATE TABLE IF NOT EXISTS `product_flat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new` tinyint(1) DEFAULT NULL,
  `featured` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `thumbnail` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(12,4) DEFAULT NULL,
  `cost` decimal(12,4) DEFAULT NULL,
  `special_price` decimal(12,4) DEFAULT NULL,
  `special_price_from` date DEFAULT NULL,
  `special_price_to` date DEFAULT NULL,
  `weight` decimal(12,4) DEFAULT NULL,
  `color` int(11) DEFAULT NULL,
  `color_label` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `size_label` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `visible_individually` tinyint(1) DEFAULT NULL,
  `min_price` decimal(12,4) DEFAULT NULL,
  `max_price` decimal(12,4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_flat_unique_index` (`product_id`,`channel`,`locale`),
  KEY `product_flat_parent_id_foreign` (`parent_id`),
  CONSTRAINT `product_flat_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `product_flat` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_flat_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.product_flat: ~0 rows (approximately)
DELETE FROM `product_flat`;
/*!40000 ALTER TABLE `product_flat` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_flat` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.product_images
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.product_images: ~0 rows (approximately)
DELETE FROM `product_images`;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.product_inventories
DROP TABLE IF EXISTS `product_inventories`;
CREATE TABLE IF NOT EXISTS `product_inventories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `qty` int(11) NOT NULL DEFAULT '0',
  `product_id` int(10) unsigned NOT NULL,
  `inventory_source_id` int(10) unsigned NOT NULL,
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_source_vendor_index_unique` (`product_id`,`inventory_source_id`,`vendor_id`),
  KEY `product_inventories_inventory_source_id_foreign` (`inventory_source_id`),
  CONSTRAINT `product_inventories_inventory_source_id_foreign` FOREIGN KEY (`inventory_source_id`) REFERENCES `inventory_sources` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_inventories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.product_inventories: ~0 rows (approximately)
DELETE FROM `product_inventories`;
/*!40000 ALTER TABLE `product_inventories` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_inventories` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.product_ordered_inventories
DROP TABLE IF EXISTS `product_ordered_inventories`;
CREATE TABLE IF NOT EXISTS `product_ordered_inventories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `qty` int(11) NOT NULL DEFAULT '0',
  `product_id` int(10) unsigned NOT NULL,
  `channel_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_ordered_inventories_product_id_channel_id_unique` (`product_id`,`channel_id`),
  KEY `product_ordered_inventories_channel_id_foreign` (`channel_id`),
  CONSTRAINT `product_ordered_inventories_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_ordered_inventories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.product_ordered_inventories: ~0 rows (approximately)
DELETE FROM `product_ordered_inventories`;
/*!40000 ALTER TABLE `product_ordered_inventories` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_ordered_inventories` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.product_relations
DROP TABLE IF EXISTS `product_relations`;
CREATE TABLE IF NOT EXISTS `product_relations` (
  `parent_id` int(10) unsigned NOT NULL,
  `child_id` int(10) unsigned NOT NULL,
  KEY `product_relations_parent_id_foreign` (`parent_id`),
  KEY `product_relations_child_id_foreign` (`child_id`),
  CONSTRAINT `product_relations_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_relations_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.product_relations: ~0 rows (approximately)
DELETE FROM `product_relations`;
/*!40000 ALTER TABLE `product_relations` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_relations` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.product_reviews
DROP TABLE IF EXISTS `product_reviews`;
CREATE TABLE IF NOT EXISTS `product_reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_reviews_product_id_foreign` (`product_id`),
  KEY `product_reviews_customer_id_foreign` (`customer_id`),
  CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.product_reviews: ~0 rows (approximately)
DELETE FROM `product_reviews`;
/*!40000 ALTER TABLE `product_reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_reviews` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.product_super_attributes
DROP TABLE IF EXISTS `product_super_attributes`;
CREATE TABLE IF NOT EXISTS `product_super_attributes` (
  `product_id` int(10) unsigned NOT NULL,
  `attribute_id` int(10) unsigned NOT NULL,
  KEY `product_super_attributes_product_id_foreign` (`product_id`),
  KEY `product_super_attributes_attribute_id_foreign` (`attribute_id`),
  CONSTRAINT `product_super_attributes_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `product_super_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.product_super_attributes: ~0 rows (approximately)
DELETE FROM `product_super_attributes`;
/*!40000 ALTER TABLE `product_super_attributes` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_super_attributes` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.product_up_sells
DROP TABLE IF EXISTS `product_up_sells`;
CREATE TABLE IF NOT EXISTS `product_up_sells` (
  `parent_id` int(10) unsigned NOT NULL,
  `child_id` int(10) unsigned NOT NULL,
  KEY `product_up_sells_parent_id_foreign` (`parent_id`),
  KEY `product_up_sells_child_id_foreign` (`child_id`),
  CONSTRAINT `product_up_sells_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_up_sells_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.product_up_sells: ~0 rows (approximately)
DELETE FROM `product_up_sells`;
/*!40000 ALTER TABLE `product_up_sells` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_up_sells` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.roles: ~0 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `description`, `permission_type`, `permissions`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'Administrator rolem', 'all', NULL, NULL, NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.shipments
DROP TABLE IF EXISTS `shipments`;
CREATE TABLE IF NOT EXISTS `shipments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_qty` int(11) DEFAULT NULL,
  `total_weight` int(11) DEFAULT NULL,
  `carrier_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carrier_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `track_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email_sent` tinyint(1) NOT NULL DEFAULT '0',
  `customer_id` int(10) unsigned DEFAULT NULL,
  `customer_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `order_address_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `inventory_source_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shipments_order_id_foreign` (`order_id`),
  KEY `shipments_order_address_id_foreign` (`order_address_id`),
  KEY `shipments_inventory_source_id_foreign` (`inventory_source_id`),
  CONSTRAINT `shipments_inventory_source_id_foreign` FOREIGN KEY (`inventory_source_id`) REFERENCES `inventory_sources` (`id`) ON DELETE SET NULL,
  CONSTRAINT `shipments_order_address_id_foreign` FOREIGN KEY (`order_address_id`) REFERENCES `order_address` (`id`) ON DELETE SET NULL,
  CONSTRAINT `shipments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.shipments: ~0 rows (approximately)
DELETE FROM `shipments`;
/*!40000 ALTER TABLE `shipments` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipments` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.shipment_items
DROP TABLE IF EXISTS `shipment_items`;
CREATE TABLE IF NOT EXISTS `shipment_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `price` decimal(12,4) DEFAULT '0.0000',
  `base_price` decimal(12,4) DEFAULT '0.0000',
  `total` decimal(12,4) DEFAULT '0.0000',
  `base_total` decimal(12,4) DEFAULT '0.0000',
  `product_id` int(10) unsigned DEFAULT NULL,
  `product_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_item_id` int(10) unsigned DEFAULT NULL,
  `shipment_id` int(10) unsigned NOT NULL,
  `additional` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shipment_items_shipment_id_foreign` (`shipment_id`),
  CONSTRAINT `shipment_items_shipment_id_foreign` FOREIGN KEY (`shipment_id`) REFERENCES `shipments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.shipment_items: ~0 rows (approximately)
DELETE FROM `shipment_items`;
/*!40000 ALTER TABLE `shipment_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipment_items` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.sliders
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `channel_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sliders_channel_id_foreign` (`channel_id`),
  CONSTRAINT `sliders_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.sliders: ~0 rows (approximately)
DELETE FROM `sliders`;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.subscribers_list
DROP TABLE IF EXISTS `subscribers_list`;
CREATE TABLE IF NOT EXISTS `subscribers_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_subscribed` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subscribers_list_channel_id_foreign` (`channel_id`),
  CONSTRAINT `subscribers_list_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.subscribers_list: ~0 rows (approximately)
DELETE FROM `subscribers_list`;
/*!40000 ALTER TABLE `subscribers_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscribers_list` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.tax_categories
DROP TABLE IF EXISTS `tax_categories`;
CREATE TABLE IF NOT EXISTS `tax_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `channel_id` int(10) unsigned NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tax_categories_code_unique` (`code`),
  UNIQUE KEY `tax_categories_name_unique` (`name`),
  KEY `tax_categories_channel_id_foreign` (`channel_id`),
  CONSTRAINT `tax_categories_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.tax_categories: ~0 rows (approximately)
DELETE FROM `tax_categories`;
/*!40000 ALTER TABLE `tax_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `tax_categories` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.tax_categories_tax_rates
DROP TABLE IF EXISTS `tax_categories_tax_rates`;
CREATE TABLE IF NOT EXISTS `tax_categories_tax_rates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tax_category_id` int(10) unsigned NOT NULL,
  `tax_rate_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tax_map_index_unique` (`tax_category_id`,`tax_rate_id`),
  KEY `tax_categories_tax_rates_tax_rate_id_foreign` (`tax_rate_id`),
  CONSTRAINT `tax_categories_tax_rates_tax_category_id_foreign` FOREIGN KEY (`tax_category_id`) REFERENCES `tax_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tax_categories_tax_rates_tax_rate_id_foreign` FOREIGN KEY (`tax_rate_id`) REFERENCES `tax_rates` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.tax_categories_tax_rates: ~0 rows (approximately)
DELETE FROM `tax_categories_tax_rates`;
/*!40000 ALTER TABLE `tax_categories_tax_rates` DISABLE KEYS */;
/*!40000 ALTER TABLE `tax_categories_tax_rates` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.tax_rates
DROP TABLE IF EXISTS `tax_rates`;
CREATE TABLE IF NOT EXISTS `tax_rates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `identifier` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_zip` tinyint(1) NOT NULL DEFAULT '0',
  `zip_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_from` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_to` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_rate` decimal(12,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tax_rates_identifier_unique` (`identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.tax_rates: ~0 rows (approximately)
DELETE FROM `tax_rates`;
/*!40000 ALTER TABLE `tax_rates` DISABLE KEYS */;
/*!40000 ALTER TABLE `tax_rates` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table laraecombagisto_bk.wishlist
DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `channel_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `item_options` json DEFAULT NULL,
  `moved_to_cart` date DEFAULT NULL,
  `shared` tinyint(1) DEFAULT NULL,
  `time_of_moving` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wishlist_channel_id_foreign` (`channel_id`),
  KEY `wishlist_product_id_foreign` (`product_id`),
  KEY `wishlist_customer_id_foreign` (`customer_id`),
  CONSTRAINT `wishlist_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `wishlist_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `wishlist_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table laraecombagisto_bk.wishlist: ~0 rows (approximately)
DELETE FROM `wishlist`;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
