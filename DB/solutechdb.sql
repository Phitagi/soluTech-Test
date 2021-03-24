-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 24, 2021 at 08:44 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solutechdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(7, '2021_03_17_142435_create_suppliers_table', 2),
(8, '2021_03_17_144635_create_supplier_products_table', 2),
(9, '2021_03_17_145155_create_products_table', 2),
(10, '2021_03_17_145535_create_order_details_table', 2),
(11, '2021_03_17_145929_create_orders_table', 2),
(12, '2021_03_18_111416_add_soft_deletes_to_suppliers_table', 3),
(13, '2021_03_18_111919_add_soft_deletes_to_supplier_products_table', 3),
(14, '2021_03_18_112143_add_soft_deletes_to_products_table', 3),
(15, '2021_03_18_112342_add_soft_deletes_to_order_details_table', 3),
(16, '2021_03_18_112534_add_soft_deletes_to_orders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_number` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '69498108354', '2021-03-20 17:11:19', '2021-03-20 19:35:45', '2021-03-20 19:35:45'),
(2, '40405877625', '2021-03-20 17:11:45', '2021-03-20 19:35:58', '2021-03-20 19:35:58'),
(3, '35557173124', '2021-03-20 17:12:22', '2021-03-20 17:12:22', NULL),
(4, '71114349328', '2021-03-20 17:13:32', '2021-03-20 17:13:32', NULL),
(5, '67881882096', '2021-03-20 17:14:48', '2021-03-20 17:14:48', NULL),
(6, '1616248422', '2021-03-20 20:53:42', '2021-03-20 20:53:42', NULL),
(7, '3232827350', '2021-03-22 18:47:55', '2021-03-22 18:47:55', NULL),
(8, '8082937385', '2021-03-24 19:04:37', '2021-03-24 19:04:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_order_id_foreign` (`order_id`),
  KEY `order_details_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, '2021-03-20 17:12:22', '2021-03-20 17:12:22', NULL),
(2, 3, 3, '2021-03-20 17:12:22', '2021-03-24 22:28:11', '2021-03-24 22:28:11'),
(4, 4, 1, '2021-03-20 17:13:32', '2021-03-20 17:13:32', NULL),
(5, 4, 3, '2021-03-20 17:13:32', '2021-03-20 19:34:24', '2021-03-20 19:34:24'),
(7, 5, 1, '2021-03-20 17:14:48', '2021-03-20 17:14:48', NULL),
(8, 5, 3, '2021-03-20 17:14:48', '2021-03-20 17:14:48', NULL),
(10, 6, 1, '2021-03-20 20:53:42', '2021-03-20 20:53:42', NULL),
(11, 6, 3, '2021-03-20 20:53:42', '2021-03-20 20:53:42', NULL),
(13, 7, 1, '2021-03-22 18:47:55', '2021-03-22 18:47:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '4k hd screen', 'Very interactive and smart.', '3', '2021-03-19 15:26:29', '2021-03-19 15:26:29', NULL),
(2, '4k hd screen', 'Very interactive and smart', '3', '2021-03-19 15:27:17', '2021-03-19 15:27:17', NULL),
(3, '4k hd screen', 'Very interactive and smart', '3', '2021-03-19 15:33:45', '2021-03-19 15:33:45', NULL),
(4, '4k hd screen', 'Very interactive and smart', '3', '2021-03-19 15:35:28', '2021-03-19 15:35:28', NULL),
(5, '4k hd screen', 'Very interactive and smart', '3', '2021-03-19 15:36:47', '2021-03-19 20:11:22', '2021-03-19 20:11:22'),
(6, '4k hd screen', 'Very interactive and smart', '3', '2021-03-19 15:39:27', '2021-03-19 19:40:46', '2021-03-19 19:40:46'),
(7, 'hp laptop', '7 gb RAM', '2', '2021-03-19 20:09:25', '2021-03-24 19:43:50', '2021-03-24 19:43:50'),
(8, 'hp laptop', '8gb RAM', '2', '2021-03-19 20:10:40', '2021-03-24 19:43:01', '2021-03-24 19:43:01'),
(9, 'Scanner', '3d scanner', '2', '2021-03-22 15:53:38', '2021-03-24 19:16:16', '2021-03-24 19:16:16'),
(10, 'Drinks', '7', '2', '2021-03-22 15:56:13', '2021-03-24 18:58:58', '2021-03-24 18:58:58'),
(11, 'Paperrr', 'Scripting papers', '2', '2021-03-22 15:58:16', '2021-03-24 18:57:05', '2021-03-24 18:57:05'),
(12, 'Paperese', 'Scripting papers', '2', '2021-03-24 16:55:16', '2021-03-24 18:56:12', '2021-03-24 18:56:12'),
(13, 'hp laptop', '7gb RAM', '1', '2021-03-24 19:44:50', '2021-03-24 19:44:59', '2021-03-24 19:44:59'),
(14, 'hp laptop', '4gb RAM', '2', '2021-03-24 19:49:11', '2021-03-24 19:49:18', '2021-03-24 19:49:18'),
(15, 'hp laptop', '4gb RAM', '2', '2021-03-24 19:50:44', '2021-03-24 19:50:55', '2021-03-24 19:50:55'),
(16, 'hp laptop', '4gb RAM', '1', '2021-03-24 19:54:09', '2021-03-24 19:54:15', '2021-03-24 19:54:15'),
(17, 'hp laptop', '4gb RAM', '2', '2021-03-24 19:56:36', '2021-03-24 19:56:36', NULL),
(18, 'hp laptop', '4gb RAM', '2', '2021-03-24 19:56:39', '2021-03-24 19:59:09', '2021-03-24 19:59:09'),
(19, 'hp laptop', '4gb RAM', '2', '2021-03-24 19:56:40', '2021-03-24 19:58:22', '2021-03-24 19:58:22'),
(20, 'hp laptop', '4gb RAM', '2', '2021-03-24 19:56:42', '2021-03-24 19:57:08', '2021-03-24 19:57:08'),
(21, 'hp laptop', '4gb RAM', '2', '2021-03-24 19:56:43', '2021-03-24 19:57:00', '2021-03-24 19:57:00'),
(22, 'hp laptop', '4gb RAM', '2', '2021-03-24 19:56:44', '2021-03-24 19:56:51', '2021-03-24 19:56:51'),
(23, '5g console', 'Fast', '2', '2021-03-25 02:47:33', '2021-03-25 02:47:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Anita Bale', '2021-03-20 20:26:55', '2021-03-20 20:26:55', NULL),
(2, 'Kate Anyikoo', '2021-03-20 20:27:41', '2021-03-24 23:59:02', '2021-03-24 23:59:02'),
(3, 'Patrick Boateng', '2021-03-20 20:30:27', '2021-03-20 20:42:28', '2021-03-20 20:42:28'),
(4, 'Kate Anyikoo', '2021-03-25 00:08:13', '2021-03-25 00:08:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_products`
--

DROP TABLE IF EXISTS `supplier_products`;
CREATE TABLE IF NOT EXISTS `supplier_products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `supplier_products_supplier_id_foreign` (`supplier_id`),
  KEY `supplier_products_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_products`
--

INSERT INTO `supplier_products` (`id`, `supplier_id`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 7, '2021-03-20 22:40:19', '2021-03-21 02:08:56', '2021-03-21 02:08:56'),
(2, 1, 1, '2021-03-21 02:09:07', '2021-03-21 02:09:07', NULL),
(3, 4, 17, '2021-03-25 02:15:54', '2021-03-25 02:45:35', '2021-03-25 02:45:35'),
(4, 4, 17, '2021-03-25 02:45:48', '2021-03-25 02:45:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
