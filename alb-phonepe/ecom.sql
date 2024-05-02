-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 11:27 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`, `updated_at`) VALUES
(5, '6', '3', '10', '2022-12-12 04:32:10', '2022-12-12 04:32:10'),
(6, '6', '4', '5', '2022-12-12 04:32:27', '2022-12-12 04:32:27'),
(7, '15', '1', '1', '2023-01-20 08:12:39', '2023-01-20 08:12:39'),
(12, '16', '23', '1', '2023-06-06 23:13:16', '2023-06-06 23:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `deals` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `deals`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(7, 'Namkeen', 'Namkeen', 'Namkeen is a broad term for salty snacks traditionally consumed in South Asian cultures, covering a range of products including whole legumes such as green peas, chickpeas, peanuts, cashews, Moong Dal, Lentils, and dough based extruded products.', 1, 1, '1685953772.avif', 'Namkeen', 'Namkeen', 'Namkeen', '2023-06-05 02:59:32', '2023-06-05 03:16:27'),
(8, 'Biscuits', 'Biscuits', 'BISCUITS. The word \"biscuit\" is derived from the Latin panis biscoctus, \"twice-baked bread.\" From the sixteenth to the eighteenth century, forms of the word included besquite and bisket. Similar forms are noted in many European languages. \"Biscuit\" covers a wide range of flour baked products, though it is generally an unleavened cake or bread, crisp and dry in nature, and in a small, thin, and flat shape. It has a number of cultural meanings. In the United States, a biscuit is a soft, thick scone product or a small roll similar to a muffin. The British biscuit is equivalent to the American cookie and cracker. These latter terms are relatively modern. \"Cookie\" comes from the eighteenth-century Dutch word koekje, a diminutive of koek (cake). \"Cracker\" is a North American term that also came into use in the eighteenth century, connoting the sound of the wafer as it was chewed or broken', 1, 1, '1685954041.webp', 'Biscuits', 'Biscuits', 'Biscuits', '2023-06-05 03:04:01', '2023-06-05 03:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proof_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allot_pinecode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `block` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_08_062136_create_categories_table', 2),
(6, '2022_12_09_061030_create_products_table', 3),
(7, '2022_12_10_081617_create_carts_table', 4),
(8, '2022_12_10_092751_create_wishlists_table', 5),
(9, '2022_12_12_101807_create_orders_table', 6),
(10, '2022_12_12_101924_create_order_items_table', 7),
(11, '2022_12_12_120823_create_recently_viewed_products_table', 8),
(12, '2022_12_19_093006_create_ratings_table', 9),
(13, '2022_12_20_050458_create_reviews_table', 10),
(14, '2022_12_22_080518_create_purchase_items_table', 11),
(15, '2022_12_22_055444_create_vendor_register_table', 12),
(16, '2022_12_23_110210_create_purchase_bill_logs_table', 13),
(17, '2022_12_30_100330_create_deliveries_table', 14),
(18, '2022_12_30_110402_create_deliveries_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `county` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracking_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deliveryboyID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cDeleted` varchar(233) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '''N'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fname`, `lname`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `county`, `pincode`, `total_price`, `payment_mode`, `payment_id`, `payment_status`, `tracking_no`, `message`, `status`, `deliveryboyID`, `created_at`, `updated_at`, `cDeleted`) VALUES
(1, '5', 'Shashikant', 'Gupta', 'shivam@gmail.com', '09956830561', 'Indira nagar, sitaram chowraha, gorakhpur', 'Street of In front of aadarsh coaching center', '27', '3', NULL, '273001', '25', 'COD', NULL, 'Paid', 'OID2937', NULL, 'Delivered', NULL, '2022-12-13 05:46:57', '2022-12-13 05:54:30', '\'N\''),
(2, '5', 'Shashikant', 'Gupta', 'shivam@gmail.com', '09956830561', 'Indira nagar, sitaram chowraha, gorakhpur', 'Street of In front of aadarsh coaching center', '27', '3', NULL, '273001', '85', 'COD', NULL, 'Paid', 'OID7598', NULL, 'Delivered', NULL, '2022-12-13 05:47:18', '2022-12-13 05:55:39', '\'N\''),
(3, '5', 'Shashikant', 'Gupta', 'shivam@gmail.com', '09956830561', 'Indira nagar, sitaram chowraha, gorakhpur', 'Shashikant', '27', '3', NULL, '273001', '29', 'Paid by Razorpay', 'pay_KrNJhtW5kZ47dn', 'Paid', 'OID8156', NULL, 'Delivered', NULL, '2022-12-13 05:47:59', '2022-12-13 06:08:19', '\'N\''),
(4, '5', 'Shashikant', 'Gupta', 'shivam@gmail.com', '09956830561', 'Indira nagar, sitaram chowraha, gorakhpur', 'Street of In front of aadarsh coaching center', '27', '3', NULL, '273001', '46', 'COD', NULL, 'Paid', 'OID1956', NULL, 'Delivered', NULL, '2022-12-13 05:48:34', '2022-12-13 06:08:32', '\'N\''),
(5, '5', 'Shashikant', 'Gupta', 'shivam@gmail.com', '09956830561', 'Indira nagar, sitaram chowraha, gorakhpur', 'Street of In front of aadarsh coaching center', '27', '3', NULL, '273001', '10', 'COD', NULL, 'Unpaid', 'OID3102', NULL, 'Out For Delivery', NULL, '2022-12-13 06:41:55', '2023-01-03 03:11:29', '\'N\''),
(6, '5', 'Shashikant', 'Gupta', 'shivam@gmail.com', '09956830561', 'Indira nagar, sitaram chowraha, gorakhpur', 'Street of In front of aadarsh coaching center', '27', '3', NULL, '273001', '9', 'COD', NULL, 'Unpaid', 'OID4595', NULL, 'Out For Delivery', NULL, '2022-12-13 06:52:24', '2023-01-03 03:33:50', '\'N\''),
(7, '5', 'Shashikant', 'Gupta', 'shivam@gmail.com', '09956830561', 'Indira nagar, sitaram chowraha, gorakhpur', 'Street of In front of aadarsh coaching center', '27', '3', NULL, '273001', '27', 'COD', NULL, 'Unpaid', 'OID7559', NULL, 'Out For Delivery', '8', '2022-12-13 06:54:33', '2023-01-03 00:56:48', '\'N\''),
(8, '5', 'Shashikant', 'Gupta', 'shivam@gmail.com', '09956830561', 'Indira nagar, sitaram chowraha, gorakhpur', 'Street of In front of aadarsh coaching center', '27', '3', NULL, '273001', '50', 'COD', NULL, 'Unpaid', 'OID9272', NULL, 'Out For Delivery', NULL, '2022-12-13 06:55:36', '2022-12-13 06:56:13', '\'N\''),
(9, '5', 'Shashikant', 'Gupta', 'shivam@gmail.com', '09956830561', 'Indira nagar, sitaram chowraha, gorakhpur', 'Street of In front of aadarsh coaching center', '27', '3', NULL, '273001', '20', 'COD', NULL, 'Unpaid', 'OID7052', NULL, 'Out For Delivery', NULL, '2022-12-19 06:37:32', '2023-01-03 03:44:42', '\'N\''),
(10, '5', 'Shashikant', 'Gupta', 'shivam@gmail.com', '09956830561', 'Indira nagar, sitaram chowraha, gorakhpur', 'Street of In front of aadarsh coaching center', '27', '3', NULL, '273001', '50', 'COD', NULL, 'Unpaid', 'OID8147', NULL, 'Out For Delivery', NULL, '2022-12-20 01:50:00', '2023-01-03 03:51:23', '\'N\''),
(11, '5', 'Shashikant', 'Gupta', 'shivam@gmail.com', '09956830561', 'Indira nagar, sitaram chowraha, gorakhpur', 'Street of In front of aadarsh coaching center', '27', '14', NULL, '273001', '10', 'COD', NULL, 'Unpaid', 'OID9853', NULL, 'Out For Delivery', NULL, '2022-12-31 06:01:52', '2023-01-06 10:59:31', '\'N\''),
(12, '5', 'Shashikant', 'Gupta', 'shivam@gmail.com', '09956830561', 'Indira nagar, sitaram chowraha, gorakhpur', 'Street of In front of aadarsh coaching center', '27', '3', NULL, '273001', '68', 'COD', NULL, 'Unpaid', 'OID1912', NULL, 'Dispatched', NULL, '2022-12-31 06:44:09', '2023-01-03 03:53:06', '\'N\''),
(13, '5', 'Shashikant', 'Gupta', 'shashikantjio9140@gmail.com', '09956830561', 'Indira nagar, sitaram chowraha, gorakhpur', 'Street of In front of aadarsh coaching center', '73', '4', NULL, '273001', '10', 'COD', NULL, 'Unpaid', 'OID4687', NULL, 'Delivered', '10', '2022-12-31 06:46:52', '2023-01-03 03:58:52', '\'N\''),
(14, '5', 'Shashikant', 'Gupta', 'shivam@gmail.com', '09956830561', 'Indira nagar, sitaram chowraha, gorakhpur', 'Street of In front of aadarsh coaching center', '364', '15', NULL, '273001', '25', 'COD', NULL, 'Unpaid', 'OID2364', NULL, 'Pending', NULL, '2022-12-31 07:06:58', '2022-12-31 07:06:58', '\'N\''),
(15, '5', 'Shashikant', 'Gupta', 'shivam@gmail.com', '09956830561', 'Indira nagar, sitaram chowraha, gorakhpur', 'Street of In front of aadarsh coaching center', '313', '12', NULL, '273001', '25', 'COD', NULL, 'Unpaid', 'OID8299', NULL, 'Delivered', NULL, '2022-12-31 07:13:35', '2023-01-03 01:44:46', '\'N\''),
(16, '14', 'Shivendra', 'ddd', 'shivendra@gmail.com', '9876543210', 'fff', 'fff', '530', '23', NULL, '272148', '50', 'COD', NULL, 'Unpaid', 'OID1676', NULL, 'Delivered', '11', '2023-01-06 06:31:57', '2023-01-06 06:40:55', '\'N\''),
(17, '14', 'Shivendra', 'ddd', 'shivendra@gmail.com', '9876543210', 'fff', 'fff', '530', '23', NULL, '272148', '455', 'COD', NULL, 'Unpaid', 'OID9714', NULL, 'Out For Delivery', '11', '2023-01-06 07:01:43', '2023-01-06 07:03:21', '\'N\''),
(18, '5', 'Shashikant', 'Gupta', 'shivam@gmail.com', '09956830561', 'Indira nagar, sitaram chowraha, gorakhpur', 'Shashikant', '313', '12', NULL, '273001', '25', 'Paid by Razorpay', 'pay_L0siTa09eBBYNT', 'Paid', 'OID5292', NULL, 'Pending', NULL, '2023-01-06 11:51:58', '2023-01-06 11:51:58', '\'N\''),
(19, '16', 'Shubham Mishra', 'MISHRA', 'max@gmail.com', '88774744758', 'kanpur', 'kanpur', '556', '23', NULL, '202020', '120', 'COD', NULL, 'Unpaid', 'OID9844', NULL, 'Pending', NULL, '2023-06-06 04:37:07', '2023-06-06 04:37:07', '\'N\'');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, '1', '7', '1', '25', '2022-12-13 05:46:57', '2022-12-13 05:46:57'),
(2, '2', '7', '3', '25', '2022-12-13 05:47:18', '2022-12-13 05:47:18'),
(3, '2', '3', '1', '10', '2022-12-13 05:47:18', '2022-12-13 05:47:18'),
(4, '3', '8', '1', '9', '2022-12-13 05:47:59', '2022-12-13 05:47:59'),
(5, '3', '3', '2', '10', '2022-12-13 05:47:59', '2022-12-13 05:47:59'),
(6, '4', '8', '4', '9', '2022-12-13 05:48:34', '2022-12-13 05:48:34'),
(7, '4', '3', '1', '10', '2022-12-13 05:48:34', '2022-12-13 05:48:34'),
(8, '5', '3', '1', '10', '2022-12-13 06:41:55', '2022-12-13 06:41:55'),
(9, '6', '8', '1', '9', '2022-12-13 06:52:24', '2022-12-13 06:52:24'),
(10, '7', '8', '3', '9', '2022-12-13 06:54:33', '2022-12-13 06:54:33'),
(11, '8', '7', '2', '25', '2022-12-13 06:55:36', '2022-12-13 06:55:36'),
(12, '9', '4', '1', '20', '2022-12-19 06:37:32', '2022-12-19 06:37:32'),
(13, '10', '1', '2', '25', '2022-12-20 01:50:00', '2022-12-20 01:50:00'),
(14, '11', '3', '1', '10', '2022-12-31 06:01:52', '2022-12-31 06:01:52'),
(15, '12', '6', '1', '58', '2022-12-31 06:44:09', '2022-12-31 06:44:09'),
(16, '12', '3', '1', '10', '2022-12-31 06:44:09', '2022-12-31 06:44:09'),
(17, '13', '3', '1', '10', '2022-12-31 06:46:52', '2022-12-31 06:46:52'),
(18, '14', '7', '1', '25', '2022-12-31 07:06:58', '2022-12-31 07:06:58'),
(19, '15', '7', '1', '25', '2022-12-31 07:13:35', '2022-12-31 07:13:35'),
(20, '16', '1', '2', '25', '2023-01-06 06:31:57', '2023-01-06 06:31:57'),
(21, '17', '1', '5', '25', '2023-01-06 07:01:43', '2023-01-06 07:01:43'),
(22, '17', '9', '6', '55', '2023-01-06 07:01:43', '2023-01-06 07:01:43'),
(23, '18', '7', '1', '25', '2023-01-06 11:51:58', '2023-01-06 11:51:58'),
(24, '19', '23', '1', '120', '2023-06-06 04:37:07', '2023-06-06 04:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('kirtirauniyar097@gmail.com', '$2y$10$kjqAbwcA43.NE.tEWU955ebT80GqLcUS1g6Ob5Nijb3VttLgkBQs6', '2022-12-07 05:59:15'),
('kirtirauniyar097@gmail.com', '$2y$10$kjqAbwcA43.NE.tEWU955ebT80GqLcUS1g6Ob5Nijb3VttLgkBQs6', '2022-12-07 05:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_id` bigint(20) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `deals` tinyint(4) NOT NULL DEFAULT 0,
  `meta_title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cate_id`, `slug`, `name`, `small_description`, `description`, `cost_price`, `original_price`, `selling_price`, `image`, `qty`, `original_qty`, `tax`, `status`, `deals`, `meta_title`, `meta_description`, `meta_keywords`, `unit`, `created_at`, `updated_at`) VALUES
(19, 7, 'Namkeen', 'Haldiram\'s Delhi Bhujia Masala | Crispy & Crunchy Traditional Namkeen | Mildly Spiced & Flavorful | Made with All Natural Ingredients |400g', 'Haldiram’s Bhujia Masala is synonyms to perfection. The snack is made from all natural ingredients with the authentic recipe from Bikaner.', 'The taste, crispiness and crunchiness of this namkeen is unmatchable. Bhujia Masala is the great snack to munch at any time of the day, from adding crunch to your breakfast dishes to satisfying midnight cravings.\r\nHaldiram’s Bhujia Masala can be enjoyed plain or with all most every meal. Also, the snack is fit to be accompanied with all types of beverages like the beloved anytime cold drinks or the needful evening tea.\r\nWith the trusted brand name, you can never doubt the taste of Haldiram’s with any pack. We make sure that you get the best of taste with every bite.', '20', '85', '90', '1685956950.webp', '60', '60', '12', 0, 0, 'Haldiram Bhujiya Namkeen', 'This Namkeen is Haldiram\'s product', 'bhujiya, namkeen, namkeen bhujiya', 'piece', '2023-06-05 03:52:30', '2023-06-08 02:44:21'),
(20, 7, 'Namkeen', 'Haldiram\'s Namkeen - Aloo Bhujia, 440g', 'N/A', '‎Potato (44%), Edible Vegetable Oil (Cotton Seed, Corn & Palmolein Oil), Gram Pulse Flour, Rice Flour, Edible Starch, lodised Salt, *Spices & Condiments (Coriander Powder, Cumin Powder, Mango Powder, Garlic Powder, Onion Powder, Lemon Powder, Ginger Powder, Red Chilli Powder, Mace Powder, Nutmeg Powder, Turmeric Powder, Mint Leaves Powder), Acidity Regulator (INS 330), Anticaking Agent (INS 551), Flavour Enhancers (INS 627 & INS 631) and Natural & Nature Identical Flavouring Substances.', '108', '118', '108', '1685957666.webp', '50', '50', '12', 0, 0, 'Haldiram namkeen', 'Haldiram Aaloo Bhujiya Namkeen', 'alloo bhujiya, namkeen,  namkeen aaloo bhujiya, bhujiya', 'piece', '2023-06-05 04:04:26', '2023-06-05 04:04:26'),
(21, 8, 'Biscuits', 'Sunfeast Dark Fantasy Choco Fills, 600g, Original Filled Cookies with Choco Crème', 'Sunfeast Dark Fantasy Choco Fills', '*Sunfeast Dark Fantasy Choco Fills is a one-of-a-kind cookie you can indulge in for a sinful chocolate experience\r\n*It has a perfectly baked golden cookie on the outside, luscious molten chocolate on the inside\r\n*Can’t wait for the boring day to end? Take a bite of this indulgent chocolate cookie to turn on the Din Khatam, Fantasy Shuru mode\r\n*A treat so indulgent and delectable, you just won’t like to share\r\n*It is ideal as an on the go snack because you never know when a craving might strike\r\n*Dark Fantasy Choco Fills cookie is also an essential ingredient to whip up some quick and delicious desserts', '220', '235', '220', '1685957968.jpg', '50', '50', '12', 0, 0, 'Dark Fantasy', 'Dark Fantasy biscuits', 'biscuits, sweet Biscuits,  darkfantasy', 'piece', '2023-06-05 04:09:28', '2023-06-05 04:09:28'),
(22, 8, 'Biscuits', 'UNIBIC Cookies, Cashew Badam Cookies, 500g | Kaju Biscuit | Cashew Biscuits | Almond Cookies | UNIBIC Cashew Badam Cookies | Kaju | Cashew | Badam', 'This is a Vegetarian product.', '*Delight in every bite\r\n*From the house of Unibic\r\n*allergen_information:cashews', '75', '82', '75', '1685959516.jpg', '50', '50', '12', 0, 0, 'Unibic', 'Unibic Biscuits', 'biscuits, unibi biscuits,', 'piece', '2023-06-05 04:35:16', '2023-06-05 04:35:16'),
(23, 8, 'Biscuits', 'Britannia Bourbon (4+1) 500g On Pack Combo', 'Occasion-Everyday, \r\nFlavour-Chocolate,  \r\nDiet Type-Vegetarian, \r\nNet Quantity-600.0 gram, \r\nBrand	Britannia Bourbon\r\nItem Weight-600 Grams,  \r\nSpeciality-suitable for vegetarians, \r\nItem Dimensions LxWxH	13.2 x 11.4 x 9.2 ,  Centimeters \r\nItem Firmness Description-Crispy, \r\nPackage Weight-0.58', 'A treasure for the lovers of chocolate packed between the surplus of crunch and sprinkled with delicate sugar crystals\r\nSmooth, melted chocolate fills your mouth with a sweet delighted taste for a mouth-watering experience\r\nEnjoy these chocolicious biscuits with your fun gang to add sweetness in the moments\r\nBritannia Bourbon is made for the people who can’t get enough of chocolate\r\nTrust of Britannia and pure ingredients have made these biscuits everyone’s favourite.', '120', '125', '120', '1685961435.jpg', '49', '50', '12', 0, 0, 'Britannia', 'Britannia  Bourbon Biscuits', 'biscuits, Britannia Bourbon, Britannia biscuits', 'piece', '2023-06-05 05:07:15', '2023-06-06 04:37:07'),
(25, 7, 'Namkeen', 'Bhujialalji Combo - Navratna Mixture + Bikaneri Bhujia + Khatta Meetha (pack of 3) - 3 kg, All time favourite indian snacks/Namkeen, Ready to eat, No Preservatives, Crsipy & Light snacks', 'Bhujialalji Combo Namkeen', 'Navaratan Mix :Spicy snack, blend of savory gram flour noodles ,lentils, peanuts & Sun dried Potato\r\nKhatta Meetha:Sweet & Sour Snack Mixture\r\nBikaneri Bhujia :savoury spiced, Dew bean & Gram flour noodle snack\r\nSnack Anytime : If you include it in your menu, this snack never disappoints you at any event, including parties, functions, festivals, or even modest picnics. Dry snacks are a must-have during tea time. Enjoy them at your upcoming event.\r\nYou can always trust the taste of Bhujialalji. Every time you eat, we ensure that you experience the greatest flavours.\r\nSHELF LIFE: 180 Days', '660', '688', '660', '1685962364.jpg', '20', '20', '12', 0, 0, 'Bhujialalji', 'Bhujialalji Combo', 'bhujialalji combo, bhujialalji namkeen, namkeen', 'combo', '2023-06-05 05:22:44', '2023-06-05 05:22:44'),
(26, 7, 'Namkeen', 'Bhujialalji Chiwda Mixture, Chana Jor Namkeen, Aloo Bhujia, Khatta Meetha (pack of 4) 600g Namkeen Snacks Tasty & Crunchy Tea-time Namkeen|Ready to eat|No Preservatives|Crsipy & Light snacks.', 'Bhujialalji Combo Namkeen', 'Chana Jor:Made in Bikaner, Chiwda Mixture : tasty light and healthy mixture made with puffed rice, cornflakes,roasted Bengal gram&peanuts\r\nAloo Bhujia:Spicy potato thick noodle snack, Khatta Meetha:Sweet & Sour Snack Mixture\r\n100% natural namkeen snack with authentic bikaneri taste\r\nVEGAN FRIENDLY - No dairy products are used while making this special namkeen\r\nSnack Anytime : If you include it in your menu, this snack never disappoints you at any event, including parties, functions, festivals, or even modest picnics. Dry snacks are a must-have during tea time. Enjoy them at your upcoming event.\r\nYou can always trust the taste of Bhujialalji. Every time you eat, we ensure that you experience the greatest flavours.\r\nSHELF LIFE: 180 Days', '218', '227', '218', '1685962596.jpg', '20', '20', '12', 0, 0, 'Bhujialalji', 'Bhujialalji Combo', 'bhujialalji, bhujialalji namkeen, Chiwda Mixture, Chana Jor Namkeen, Aloo Bhujia, Khatta Meetha', 'combo', '2023-06-05 05:26:36', '2023-06-05 05:26:36'),
(27, 8, 'Biscuits', 'UNIBIC Cookies, Assorted Cookies, 75 g (Pack of 10) | Biscuits Combo Pack | Choco Chip Cookies | Butter Cookies | Fruit & Nut Cookies | Cashew Cookies', 'UNIBIC Biscuit', 'THE PERFECT GIFT - All your favourite UNIBIC cookies are packed in one. Serve your guests and loved ones with a plate full of flavoured delicacies.\r\nSUITABLE FOR ANY OCCASION - Make any occasion memorable by decorating a plate with different flavours of delicious biscuits to serve your guests.\r\nZERO TRANS-FAT - Every flavour of the biscuits combo pack has zero trans fat, making it an ideal snack for people who want to stay fit and healthy.\r\nMULTIPLE FLAVOURS - The biscuits combo pack offers ten different flavours. Taste every flavour and share them with your friends and family.\r\nallergen_information:cashews', '225', '300', '225', '1685962881.jpg', '25', '25', '12', 0, 0, 'UNIBIC', 'UNIBIC Cookies', 'UNIBIC Cookies,  UNIBIC,  UNIBIC Biscuit,  UNIBIC Combo', 'combo', '2023-06-05 05:31:21', '2023-06-05 05:31:21'),
(28, 8, 'Biscuits', 'Parle Marie Biscuit , 250g / 300g (Weight May Vary)', 'This is a Vegetarian product.', 'The joy of togetherness, \r\nA perfect tea companion,\r\nLight & crispy biscuits,\r\n\r\nOccasion-Everyday, \r\nDiet Type-Vegetarian, \r\nNumber of Items-1, \r\nNet Quantity-250.0 gram, \r\nBrand-Parle, \r\nItem Weight-250 Grams,', '45', '50', '45', '1685963572.jpg', '50', '50', '12', 0, 0, 'Parle Biscuit', 'Parle Marie Biscuit', 'parle marie biscuit, biscuit,', 'piece', '2023-06-05 05:42:52', '2023-06-05 05:42:52'),
(29, 8, 'Biscuits', 'Parle Hide and Seek Chocolate Chip Cookies, 200g', 'This is a Vegetarian product.', 'Classic chocolate chip premium cookies, \r\nContains delicious real chocolate chips, \r\nMelt in your mouth chocolate experience.', '60', '65', '60', '1685964747.jpg', '50', '50', '12', 0, 0, 'Parle', 'Parle Biscuits', 'parle biscuits,  biscuits', 'piece', '2023-06-05 06:02:27', '2023-06-05 06:02:27'),
(30, 8, 'Biscuits', 'Parle g Original Glucose Biscuit More Combo Promo Pack - 800g (Pack of 3)', 'This is a Vegetarian product.', 'Occasion-Everyday, \r\nDiet Type-Vegetarian, \r\nNumber of Items-1, \r\nNet Quantity-2400.0 gram, \r\nBrand-Parle, \r\nItem Weight-800 Grams, \r\nSpeciality-suitable for vegetarians, \r\nItem Firmness Description-Fragile, \r\nPackage Weight-3.31 Pounds, \r\nPackage Type-Pouch', '270', '290', '270', '1685965119.jpg', '50', '50', '12', 0, 0, 'Parle', 'Parle Biscuit', 'Parle-g, Glucose biscuit, biscuit', 'piece', '2023-06-05 06:08:39', '2023-06-05 06:08:39'),
(31, 8, 'Biscuits', 'Haldiram\'s Nagpur Kaju Nankhatai Cookies (Pack of 2-250 gm Each)', 'This is vegetarian product', '100% Vegetarian, Eggless Cookies, \r\nPacked fresh in a hygienic facility, \r\nRichness of cashew, \r\n\r\nOccasion-New Baby, Anniversary, Thank, Thanksgiving, \r\nFlavour-kaju, \r\nDiet Type-Vegetarian, \r\nNet Quantity-500.0 gram, \r\nBrand-Haldiram\'s, \r\nItem Dimensions LxWxH-24 x 14 x 8 Centimeters, \r\nItem Firmness Description-Medium, \r\nPackage Weight-1.65 Pounds, \r\nPackage Type-P', '400', '420', '400', '1685965686.jpg', '50', '50', '12', 0, 0, 'Haldiram', 'Haldiram Biscuits', 'haldiram, biscuits, haldiram combo', 'combo', '2023-06-05 06:18:06', '2023-06-05 06:18:06'),
(32, 8, 'Biscuits', 'Haldiram\'s Nagpur Atta Cookies (Pack of 2 x 250 gm Each)', 'This is vegetarian product', '100% Vegetarian, Eggless cookies from Haldiram\'s Nagpur, \r\nPacked fresh at a hygienic facility, \r\nGoodness of wheat flour with a rich taste, \r\n\r\n\r\nOccasion-Everyday, \r\nFlavour-Atta, \r\nDiet Type-Vegetarian, \r\nNumber of Items-2, \r\nNet Quantity-500.0 gram, \r\nBrand-Haldiram\'s, \r\nNumber of Pieces-2, \r\nSpeciality-suitable for vegetarians, \r\nItem Dimensions LxWxH-20 x 4 x 24 Centimeters, \r\nPackageWeight-600 Grams,', '330', '355', '330', '1685967192.jpg', '50', '50', '12', 0, 0, 'Haldiram', 'Haldiram Biscuits', 'haldiram biscuits, biscuits, haldiram', 'combo', '2023-06-05 06:43:12', '2023-06-05 06:43:12'),
(33, 7, 'Namkeen', 'Haldirams Namkeen - Navrattan, 200g + 20g', 'This is vegetarian product.', 'Suitable for all food, \r\nMaterial Features: Vegetarian, \r\n\r\nBrand-Haldiram\'s, \r\nFlavour-Savoury, \r\nDiet Type-Vegetarian, \r\nItem Weight-220 Grams, \r\nSpeciality-suitable for vegeterians, \r\nNet Quantity-220.0 gram, \r\nItem Dimensions LxWxH-18 x 12.8 x 3.4 Centimeters, \r\nPackage Weight-0.22 Kilograms, \r\nPackage Type-Pouch,', '44', '48', '44', '1685967657.jpg', '50', '50', '12', 0, 0, 'Haldiram', 'Haldiram Namkeen', 'haldiram namkeen, namkeen, haldiram, navrattan', 'piece', '2023-06-05 06:50:57', '2023-06-05 06:50:57'),
(34, 7, 'Namkeen', 'Gujarat Namkeen Homemade Gujrati Navratan Vegeterian Mixture, 400 grams, Pack of 1', 'This is vegetarian product.', 'Material: Wheat flour And Edible Oil, \r\nCrispy and healthy snacks for evening time, \r\nHome made and hygienic for health, \r\nTraditional Gujarti snacks for munching/crisping taste any time of the day, \r\nPure vegetarian, \r\n\r\n\r\nBrand-Gujrat Namkeen, \r\nFlavour-salty, \r\nDiet Type-Vegetarian, \r\nItem Weight-400 Grams, \r\nSpeciality-Vegetarian, Crispy, \r\nNet Quantity-400 gram, \r\nItem Dimensions LxWxH-18 x 14 x 7 Centimeters, \r\nPackage Weight-400 Grams, \r\nPackage Type-pouch,', '213', '248', '213', '1685967962.jpg', '50', '50', '12', 0, 0, 'Gujarat Namkeen', 'Gujarat Namkeen', 'gujarat namkeen, namkeen', 'piece', '2023-06-05 06:56:02', '2023-06-05 06:56:02'),
(35, 7, 'Namkeen', 'Bhujialalji Navratan Mixture (pack of 5) 750g | All time favourite indian snacks/Namkeen | Ready to eat | No Preservatives | Crsipy & Light snacks.', 'This is vegetarian product.', 'Navaratan Mix :Spicy snack, blend of savory gram flour noodles ,lentils, peanuts & Sun dried Potato\r\nThis Product is Made in Bikaner with Authentic Bikaneri Taste, \r\n100% natural namkeen snack with authentic bikaneri taste, \r\nVEGAN FRIENDLY - No dairy products are used while making this special namkeen, \r\nSnack Anytime : If you include it in your menu this snack never disappoints you at any event, including parties, functions, festivals, or even modest picnics. Dry snacks are a must-have during tea time, Enjoy them at your upcoming event, \r\nYou can always trust the taste of Bhujialalji. Every time you eat, we ensure that you experience the greatest flavours., \r\nSHELF LIFE: 180 Days, \r\n\r\n\r\nBrand-BHUJIALALJI, \r\nFlavour-Navatan, \r\nDiet Type-Vegetarian, \r\nItem Weight-750 Grams, \r\nSpeciality-no preservatives, \r\nAllergen Information-Preservative-Free, \r\nNumber of Items-1, \r\nNet Quantity-750.0 gram, \r\nItem Dimensions LxWxH-28 x 24.5 x 12 Centimeters, \r\nPackage Weight-0.78 ,', '245', '265', '245', '1685968503.jpg', '50', '50', '12', 0, 0, 'Bhujialalji', 'bhujialalji  Namkeen', 'bhujialalji navratan, bhujialalji namkeen, namkeen, bhujialalji', 'piece', '2023-06-05 07:05:03', '2023-06-05 07:05:03'),
(36, 7, 'Namkeen', 'Haldiram\'s Nagpur Mixture, 350g/400g(weight may vary)', 'This is vegetarian product.', 'National brand, \r\nUsed finest quality ingredients, \r\nSuitable for all, \r\nCountry of Origin: India, \r\n\r\n\r\nBrand-Haldiram\'s, \r\nFlavour-Savory, \r\nDiet Type-Vegetarian, \r\nItem Weight-1000 Grams, \r\nSpeciality-suitable for vegeterians, \r\nNet Quantity-350.0 gram, \r\nItem Dimensions LxWxH-21.2 x 12.2 x 3 Centimeters, \r\nPackage Weight-0.36 Kilograms, \r\nPackage Type-Pouch,', '70', '85', '70', '1685970036.jpg', '50', '50', '12', 0, 0, 'Haldiram', 'Haldiram Namkeen', 'haldiram namkeen, namkeen, haldiram', 'piece', '2023-06-05 07:30:36', '2023-06-05 07:30:36'),
(38, 7, 'Namkeen', 'P.K Kaju Namkeen, Navratan Namkeen, Makhana Mixture Namkeen, Raja Mixture Namkeen (Pack Of 4) (Each 200g)', 'This is vegetarian product.', 'Brand: P.K, Product Type: Indian Snacks/Namkeen, \r\nIngredient :- Chana Besan, Masoor Dal, Kharbuja Meeng, Potato Slices, Edible Vegetable Refined Oil (Cotton Seed Or Corn Or Palmolein Oil) Gram Masala, Amchoor, Edible Common, \r\nUsage: Evening Snack, Between Meal Snack, \r\n100% vegetarian and is manufactured under hygienic conditions, \r\nTotal Product Shelf Life 4 Month, \r\n\r\n\r\nBrand-P.K, \r\nDiet Type-Vegetarian, \r\nItem Weight-200 Grams, \r\nSpeciality-No Preservatives, \r\nNumber of Items-4, \r\nNet Quantity-1 count, \r\nPackage Type-Pouch,', '253', '268', '253', '1685970906.jpg', '50', '50', '12', 0, 0, 'P.K', 'P.K Namkeen', 'P.K , namkeen, kaju', 'combo', '2023-06-05 07:45:06', '2023-06-05 07:45:06'),
(39, 7, 'Namkeen', 'Bhim Sain Baij Nath Agra (Inventor of Dalmoth and Petha) - Kaju Dalmoth / Namkeen / Dal Biji (350 GMS)', 'This is vegetarian project.', 'From Bhim Sain Baij Nath - Inventor of Dalmoth and Petha, \r\nNo preservatives and extra colour added, \r\nShelf Life: 3 Months; Ingredient Type: Vegetarian; Flavour: Spicy, \r\nStorage Instruction: Store in Cool and Dry Place. Keep, \r\n\r\nFlavour Name-Spicy, \r\nSize-400 g (Pack of 1), \r\nBrand-Bhim Sain Baij Nath, \r\nFlavour-Spicy, \r\nDiet Type-Vegetarian, \r\nItem Weight-350 Grams, \r\nSpeciality-No Preservatives, \r\nNumber of Items-1, \r\nNet Quantity-350.0 gram, \r\nPackage Weight-0.77 Pounds,', '323', '340', '323', '1686211291.jpg', '50', '50', '12', 0, 0, 'Dalmoth', 'Kaju dalmoth', 'Bhim Sain Baij Nath, Agra , namkeen, dalmoth', 'piece', '2023-06-08 02:31:31', '2023-06-08 02:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_bill_logs`
--

CREATE TABLE `purchase_bill_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` bigint(20) NOT NULL,
  `previous_balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_billing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remaining_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_bill_logs`
--

INSERT INTO `purchase_bill_logs` (`id`, `invoice_id`, `vendor_id`, `previous_balance`, `total_billing`, `grand_total`, `paid_amount`, `remaining_amount`, `created_at`, `updated_at`) VALUES
(1, 'PID_43522', 1, '1038', '26', '1064', '100', '964', '2022-12-23 05:43:45', '2022-12-23 05:43:45'),
(2, '', 1, '964', '', '', '900', '64', '2022-12-24 05:15:53', '2022-12-24 05:15:53'),
(3, '', 1, '964', '', '', '900', '64', '2022-12-24 05:17:07', '2022-12-24 05:17:07'),
(4, '', 1, '964', '', '', '900', '64', '2022-12-24 05:18:40', '2022-12-24 05:18:40'),
(5, '', 1, '964', '', '', '900', '64', '2022-12-24 05:19:08', '2022-12-24 05:19:08'),
(6, '', 1, '964', '', '', '900', '64', '2022-12-24 05:22:50', '2022-12-24 05:22:50'),
(7, '', 1, '964', '', '', '900', '64', '2022-12-24 05:27:30', '2022-12-24 05:27:30'),
(8, '', 2, '237', '', '', '200', '37', '2022-12-24 05:29:20', '2022-12-24 05:29:20'),
(9, '', 1, '964', '', '', '900', '64', '2022-12-24 05:34:19', '2022-12-24 05:34:19'),
(10, 'PID_87708', 1, '64', '21', '85', '20', '65', '2022-12-28 00:19:54', '2022-12-28 00:19:54'),
(11, 'PID_70444', 1, '65', '2', '67', '1', '66', '2022-12-28 00:21:45', '2022-12-28 00:21:45'),
(12, '', 1, '66', '', '', '10', '56', '2022-12-28 00:22:44', '2022-12-28 00:22:44'),
(13, 'PID_79561', 1, '56', '212', '268', '256', '0', '2023-06-08 02:44:21', '2023-06-08 02:44:21'),
(14, '', 1, '0', '', '', '10', '-10', '2023-06-08 02:46:45', '2023-06-08 02:46:45'),
(15, '', 1, '-10', '', '', '237', '-247', '2023-06-08 02:46:56', '2023-06-08 02:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` bigint(20) NOT NULL,
  `prod_id` bigint(20) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_billing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remaining_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_items`
--

INSERT INTO `purchase_items` (`id`, `invoice_id`, `vendor_id`, `prod_id`, `unit`, `price`, `qty`, `tax`, `total_price`, `previous_balance`, `total_billing`, `grand_total`, `paid_amount`, `remaining_amount`, `created_at`, `updated_at`) VALUES
(15, 'PID_96316', 1, 9, 'darzon', '56', '6', '6', '342.00', '30', '622', '652', '600', '52', '2022-12-23 02:31:17', '2022-12-23 02:31:17'),
(16, 'PID_87142', 2, 3, 'kg', '1', '11', '1', '12.00', '518', '24', '542', '58', '484', '2022-12-23 02:34:48', '2022-12-23 02:34:48'),
(17, 'PID_18769', 2, 5, 'piece', '454', '4', '5', '1821.00', '518', '4546', '5064', '555', '4509', '2022-12-23 02:35:59', '2022-12-23 02:35:59'),
(18, 'PID_67516', 2, 5, 'piece', '454', '4', '5', '1821.00', '518', '4546', '5064', '555', '4509', '2022-12-23 02:36:54', '2022-12-23 02:36:54'),
(19, 'PID_53493', 2, 5, 'piece', '454', '4', '5', '1821.00', '518', '4546', '5064', '555', '4509', '2022-12-23 02:37:23', '2022-12-23 02:37:23'),
(20, 'PID_53493', 2, 9, 'darzon', '544', '5', '5', '2725.00', '518', '4546', '5064', '555', '4509', '2022-12-23 02:37:23', '2022-12-23 02:37:23'),
(21, 'PID_28696', 2, 5, 'piece', '454', '4', '5', '1821.00', '518', '4546', '5064', '555', '4509', '2022-12-23 02:38:40', '2022-12-23 02:38:40'),
(22, 'PID_28696', 2, 9, 'darzon', '544', '5', '5', '2725.00', '518', '4546', '5064', '555', '4509', '2022-12-23 02:38:40', '2022-12-23 02:38:40'),
(23, 'PID_97539', 2, 4, 'ltr', '8', '8', '8', '72.00', '4509', '162', '4671', '555', '4116', '2022-12-23 02:39:30', '2022-12-23 02:39:30'),
(24, 'PID_97539', 2, 8, 'piece', '9', '9', '9', '90.00', '4509', '162', '4671', '555', '4116', '2022-12-23 02:39:30', '2022-12-23 02:39:30'),
(26, 'PID_55802', 1, 8, 'darzon', '666', '66', '6', '43962.00', '52', '131946', '131998', '50000', '81998', '2022-12-23 02:40:56', '2022-12-23 02:40:56'),
(27, 'PID_55802', 1, 8, 'piece', '666', '66', '6', '43962.00', '52', '131946', '131998', '50000', '81998', '2022-12-23 02:40:56', '2022-12-23 02:40:56'),
(28, 'PID_47563', 1, 1, 'kg', '10', '10', '0', '100.00', '81998', '100', '82098', '80000', '2098', '2022-12-23 04:34:16', '2022-12-23 04:34:16'),
(29, 'PID_18513', 1, 1, 'kg', '20', '20', '0', '400.00', '2098', '490', '2588', '2000', '588', '2022-12-23 04:36:14', '2022-12-23 04:36:14'),
(30, 'PID_18513', 1, 3, 'piece', '15', '6', '0', '90.00', '2098', '490', '2588', '2000', '588', '2022-12-23 04:36:14', '2022-12-23 04:36:14'),
(31, 'PID_39505', 2, 1, 'kg', '10', '10', '0', '100.00', '4116', '121', '4237', '4000', '237', '2022-12-23 04:37:46', '2022-12-23 04:37:46'),
(32, 'PID_39505', 2, 4, 'piece', '20', '1', '1', '21.00', '4116', '121', '4237', '4000', '237', '2022-12-23 04:37:46', '2022-12-23 04:37:46'),
(33, 'PID_40931', 1, 1, 'kg', '15', '10', '0', '150.00', '588', '150', '738', '700', '38', '2022-12-23 04:42:54', '2022-12-23 04:42:54'),
(34, 'PID_92481', 1, 1, 'kg', '20', '50', '0', '1000.00', '38', '1000', '1038', '0', '1038', '2022-12-23 04:48:32', '2022-12-23 04:48:32'),
(35, 'PID_43522', 1, 1, 'kg', '12', '2', '2', '26.00', '1038', '26', '1064', '100', '964', '2022-12-23 05:43:45', '2022-12-23 05:43:45'),
(36, 'PID_87708', 1, 1, 'kg', '20', '1', '1', '21.00', '64', '21', '85', '20', '65', '2022-12-28 00:19:54', '2022-12-28 00:19:54'),
(37, 'PID_70444', 1, 1, 'kg', '1', '1', '1', '2.00', '65', '2', '67', '1', '66', '2022-12-28 00:21:45', '2022-12-28 00:21:45'),
(38, 'PID_79561', 1, 19, 'piece', '20', '10', '12', '212.00', '56', '212', '268', '256', '0', '2023-06-08 02:44:21', '2023-06-08 02:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars_rated` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `prod_id`, `stars_rated`, `created_at`, `updated_at`) VALUES
(1, '5', '3', '3', '2022-12-19 06:13:58', '2022-12-20 00:42:13'),
(2, '5', '4', '5', '2022-12-19 06:37:52', '2022-12-20 00:44:30'),
(3, '5', '8', '3', '2022-12-19 23:30:02', '2022-12-19 23:30:13'),
(4, '14', '1', '5', '2023-01-06 07:15:31', '2023-01-06 07:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `recently_viewed_products`
--

CREATE TABLE `recently_viewed_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recently_viewed_products`
--

INSERT INTO `recently_viewed_products` (`id`, `product_id`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 7, 'ca8e907a468b72daab13233f8b17bb28', NULL, NULL),
(2, 6, 'ca8e907a468b72daab13233f8b17bb28', NULL, NULL),
(3, 3, 'ca8e907a468b72daab13233f8b17bb28', NULL, NULL),
(4, 3, '35c683bd02ab434a548ab9c475c19e22', NULL, NULL),
(5, 6, '35c683bd02ab434a548ab9c475c19e22', NULL, NULL),
(6, 3, 'effc4cd1ad71ddbacb4722d22f3cabf0', NULL, NULL),
(7, 7, 'effc4cd1ad71ddbacb4722d22f3cabf0', NULL, NULL),
(8, 4, 'effc4cd1ad71ddbacb4722d22f3cabf0', NULL, NULL),
(9, 5, 'effc4cd1ad71ddbacb4722d22f3cabf0', NULL, NULL),
(10, 3, 'a8f4c8fa6f8cea4d2af8e5ec61582a09', NULL, NULL),
(11, 4, 'a8f4c8fa6f8cea4d2af8e5ec61582a09', NULL, NULL),
(12, 1, 'a8f4c8fa6f8cea4d2af8e5ec61582a09', NULL, NULL),
(13, 9, 'a8f4c8fa6f8cea4d2af8e5ec61582a09', NULL, NULL),
(14, 4, '9179c3c12a99a1c52ee2028e2f2684b1', NULL, NULL),
(15, 3, '9179c3c12a99a1c52ee2028e2f2684b1', NULL, NULL),
(16, 4, '741bb15285272391af6ce22fe9e36273', NULL, NULL),
(17, 3, '741bb15285272391af6ce22fe9e36273', NULL, NULL),
(18, 1, '741bb15285272391af6ce22fe9e36273', NULL, NULL),
(19, 8, 'e7880565b7dcfc703dd4fb2692ffd1bd', NULL, NULL),
(20, 4, 'e7880565b7dcfc703dd4fb2692ffd1bd', NULL, NULL),
(21, 3, 'e7880565b7dcfc703dd4fb2692ffd1bd', NULL, NULL),
(22, 1, 'e7880565b7dcfc703dd4fb2692ffd1bd', NULL, NULL),
(23, 1, '8656109cadb34de3d02c4d09fe84bdc1', NULL, NULL),
(24, 1, '299f1ce8476e25f8d73b256234cda9a5', NULL, NULL),
(25, 3, '9798fa3cb8ba1e8d179d035c9157cb21', NULL, NULL),
(26, 3, 'e403a972dc3077d422b3e0e407af303b', NULL, NULL),
(27, 1, '0b3448cc655dabffa7a6ee0649a2663b', NULL, NULL),
(28, 4, '0b3448cc655dabffa7a6ee0649a2663b', NULL, NULL),
(29, 3, '0b3448cc655dabffa7a6ee0649a2663b', NULL, NULL),
(30, 1, 'd48b6c1197e362811d2050fdf020c812', NULL, NULL),
(31, 1, 'ea2c73d3317969879f9344ef246e6235', NULL, NULL),
(32, 16, '4336e27097a5b13be07d23596ca02e16', NULL, NULL),
(33, 19, '4336e27097a5b13be07d23596ca02e16', NULL, NULL),
(34, 22, '4336e27097a5b13be07d23596ca02e16', NULL, NULL),
(35, 23, '4336e27097a5b13be07d23596ca02e16', NULL, NULL),
(36, 24, '4336e27097a5b13be07d23596ca02e16', NULL, NULL),
(37, 25, '4336e27097a5b13be07d23596ca02e16', NULL, NULL),
(38, 26, '4336e27097a5b13be07d23596ca02e16', NULL, NULL),
(39, 21, '4336e27097a5b13be07d23596ca02e16', NULL, NULL),
(40, 28, '4336e27097a5b13be07d23596ca02e16', NULL, NULL),
(41, 27, '4336e27097a5b13be07d23596ca02e16', NULL, NULL),
(42, 29, '4336e27097a5b13be07d23596ca02e16', NULL, NULL),
(43, 30, '4336e27097a5b13be07d23596ca02e16', NULL, NULL),
(44, 20, '4336e27097a5b13be07d23596ca02e16', NULL, NULL),
(45, 31, '4336e27097a5b13be07d23596ca02e16', NULL, NULL),
(46, 32, '4336e27097a5b13be07d23596ca02e16', NULL, NULL),
(47, 33, '4336e27097a5b13be07d23596ca02e16', NULL, NULL),
(48, 34, '4336e27097a5b13be07d23596ca02e16', NULL, NULL),
(49, 37, '4336e27097a5b13be07d23596ca02e16', NULL, NULL),
(50, 38, '4336e27097a5b13be07d23596ca02e16', NULL, NULL),
(51, 20, '7456332bbd7158673a81665fbbc95399', NULL, NULL),
(52, 21, '526bd672210f9a79b3e0c52cfd1bfb6a', NULL, NULL),
(53, 26, '526bd672210f9a79b3e0c52cfd1bfb6a', NULL, NULL),
(54, 19, '526bd672210f9a79b3e0c52cfd1bfb6a', NULL, NULL),
(55, 25, '526bd672210f9a79b3e0c52cfd1bfb6a', NULL, NULL),
(56, 20, '526bd672210f9a79b3e0c52cfd1bfb6a', NULL, NULL),
(57, 34, '526bd672210f9a79b3e0c52cfd1bfb6a', NULL, NULL),
(58, 23, '526bd672210f9a79b3e0c52cfd1bfb6a', NULL, NULL),
(59, 22, '6728040e3913278c14663f68c4b7cab9', NULL, NULL),
(60, 26, '65eed3440c9334246b0be6c60ef5573c', NULL, NULL),
(61, 27, '06e3d1b5ced0d404d6956fd3689d7d78', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_review` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `prod_id`, `user_review`, `created_at`, `updated_at`) VALUES
(1, '5', '4', 'this is freash and soft item thank you vege..', '2022-12-19 23:59:58', '2022-12-19 23:59:58'),
(2, '5', '4', 'this is freash and soft item thank you vege..', '2022-12-20 00:00:23', '2022-12-20 00:00:23'),
(3, '5', '3', 'this is best product , and freash item , thank you Vege...............................', '2022-12-20 00:02:03', '2022-12-20 00:33:45'),
(4, '14', '1', 'dfff', '2023-01-06 07:16:01', '2023-01-06 07:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `id` int(11) NOT NULL,
  `cityName` varchar(100) NOT NULL,
  `stateId` varchar(100) NOT NULL,
  `status` enum('0','1','2') DEFAULT NULL COMMENT '''''0=Delete'',''1=Active'',''2=Inactive'''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `cityName`, `stateId`, `status`) VALUES
(1, 'North and Middle Andaman', '32', '1'),
(2, 'South Andaman', '32', '1'),
(3, 'Nicobar', '32', '1'),
(4, 'Adilabad', '1', '1'),
(5, 'Anantapur', '1', '1'),
(6, 'Chittoor', '1', '1'),
(7, 'East Godavari', '1', '1'),
(8, 'Guntur', '1', '1'),
(9, 'Hyderabad', '1', '1'),
(10, 'Kadapa', '1', '1'),
(11, 'Karimnagar', '1', '1'),
(12, 'Khammam', '1', '1'),
(13, 'Krishna', '1', '1'),
(14, 'Kurnool', '1', '1'),
(15, 'Mahbubnagar', '1', '1'),
(16, 'Medak', '1', '1'),
(17, 'Nalgonda', '1', '1'),
(18, 'Nellore', '1', '1'),
(19, 'Nizamabad', '1', '1'),
(20, 'Prakasam', '1', '1'),
(21, 'Rangareddi', '1', '1'),
(22, 'Srikakulam', '1', '1'),
(23, 'Vishakhapatnam', '1', '1'),
(24, 'Vizianagaram', '1', '1'),
(25, 'Warangal', '1', '1'),
(26, 'West Godavari', '1', '1'),
(27, 'Anjaw', '3', '1'),
(28, 'Changlang', '3', '1'),
(29, 'East Kameng', '3', '1'),
(30, 'Lohit', '3', '1'),
(31, 'Lower Subansiri', '3', '1'),
(32, 'Papum Pare', '3', '1'),
(33, 'Tirap', '3', '1'),
(34, 'Dibang Valley', '3', '1'),
(35, 'Upper Subansiri', '3', '1'),
(36, 'West Kameng', '3', '1'),
(37, 'Barpeta', '2', '1'),
(38, 'Bongaigaon', '2', '1'),
(39, 'Cachar', '2', '1'),
(40, 'Darrang', '2', '1'),
(41, 'Dhemaji', '2', '1'),
(42, 'Dhubri', '2', '1'),
(43, 'Dibrugarh', '2', '1'),
(44, 'Goalpara', '2', '1'),
(45, 'Golaghat', '2', '1'),
(46, 'Hailakandi', '2', '1'),
(47, 'Jorhat', '2', '1'),
(48, 'Karbi Anglong', '2', '1'),
(49, 'Karimganj', '2', '1'),
(50, 'Kokrajhar', '2', '1'),
(51, 'Lakhimpur', '2', '1'),
(52, 'Marigaon', '2', '1'),
(53, 'Nagaon', '2', '1'),
(54, 'Nalbari', '2', '1'),
(55, 'North Cachar Hills', '2', '1'),
(56, 'Sibsagar', '2', '1'),
(57, 'Sonitpur', '2', '1'),
(58, 'Tinsukia', '2', '1'),
(59, 'Araria', '4', '1'),
(60, 'Aurangabad', '4', '1'),
(61, 'Banka', '4', '1'),
(62, 'Begusarai', '4', '1'),
(63, 'Bhagalpur', '4', '1'),
(64, 'Bhojpur', '4', '1'),
(65, 'Buxar', '4', '1'),
(66, 'Darbhanga', '4', '1'),
(67, 'Purba Champaran', '4', '1'),
(68, 'Gaya', '4', '1'),
(69, 'Gopalganj', '4', '1'),
(70, 'Jamui', '4', '1'),
(71, 'Jehanabad', '4', '1'),
(72, 'Khagaria', '4', '1'),
(73, 'Kishanganj', '4', '1'),
(74, 'Kaimur', '4', '1'),
(75, 'Katihar', '4', '1'),
(76, 'Lakhisarai', '4', '1'),
(77, 'Madhubani', '4', '1'),
(78, 'Munger', '4', '1'),
(79, 'Madhepura', '4', '1'),
(80, 'Muzaffarpur', '4', '1'),
(81, 'Nalanda', '4', '1'),
(82, 'Nawada', '4', '1'),
(83, 'Patna', '4', '1'),
(84, 'Purnia', '4', '1'),
(85, 'Rohtas', '4', '1'),
(86, 'Saharsa', '4', '1'),
(87, 'Samastipur', '4', '1'),
(88, 'Sheohar', '4', '1'),
(89, 'Sheikhpura', '4', '1'),
(90, 'Saran', '4', '1'),
(91, 'Sitamarhi', '4', '1'),
(92, 'Supaul', '4', '1'),
(93, 'Siwan', '4', '1'),
(94, 'Vaishali', '4', '1'),
(95, 'Pashchim Champaran', '4', '1'),
(96, 'Bastar', '36', '1'),
(97, 'Bilaspur', '36', '1'),
(98, 'Dantewada', '36', '1'),
(99, 'Dhamtari', '36', '1'),
(100, 'Durg', '36', '1'),
(101, 'Jashpur', '36', '1'),
(102, 'Janjgir-Champa', '36', '1'),
(103, 'Korba', '36', '1'),
(104, 'Koriya', '36', '1'),
(105, 'Kanker', '36', '1'),
(106, 'Kawardha', '36', '1'),
(107, 'Mahasamund', '36', '1'),
(108, 'Raigarh', '36', '1'),
(109, 'Rajnandgaon', '36', '1'),
(110, 'Raipur', '36', '1'),
(111, 'Surguja', '36', '1'),
(112, 'Diu', '29', '1'),
(113, 'Daman', '29', '1'),
(114, 'Central Delhi', '25', '1'),
(115, 'East Delhi', '25', '1'),
(116, 'New Delhi', '25', '1'),
(117, 'North Delhi', '25', '1'),
(118, 'North East Delhi', '25', '1'),
(119, 'North West Delhi', '25', '1'),
(120, 'South Delhi', '25', '1'),
(121, 'South West Delhi', '25', '1'),
(122, 'West Delhi', '25', '1'),
(123, 'North Goa', '26', '1'),
(124, 'South Goa', '26', '1'),
(125, 'Ahmedabad', '5', '1'),
(126, 'Amreli District', '5', '1'),
(127, 'Anand', '5', '1'),
(128, 'Banaskantha', '5', '1'),
(129, 'Bharuch', '5', '1'),
(130, 'Bhavnagar', '5', '1'),
(131, 'Dahod', '5', '1'),
(132, 'The Dangs', '5', '1'),
(133, 'Gandhinagar', '5', '1'),
(134, 'Jamnagar', '5', '1'),
(135, 'Junagadh', '5', '1'),
(136, 'Kutch', '5', '1'),
(137, 'Kheda', '5', '1'),
(138, 'Mehsana', '5', '1'),
(139, 'Narmada', '5', '1'),
(140, 'Navsari', '5', '1'),
(141, 'Patan', '5', '1'),
(142, 'Panchmahal', '5', '1'),
(143, 'Porbandar', '5', '1'),
(144, 'Rajkot', '5', '1'),
(145, 'Sabarkantha', '5', '1'),
(146, 'Surendranagar', '5', '1'),
(147, 'Surat', '5', '1'),
(148, 'Vadodara', '5', '1'),
(149, 'Valsad', '5', '1'),
(150, 'Ambala', '6', '1'),
(151, 'Bhiwani', '6', '1'),
(152, 'Faridabad', '6', '1'),
(153, 'Fatehabad', '6', '1'),
(154, 'Gurgaon', '6', '1'),
(155, 'Hissar', '6', '1'),
(156, 'Jhajjar', '6', '1'),
(157, 'Jind', '6', '1'),
(158, 'Karnal', '6', '1'),
(159, 'Kaithal', '6', '1'),
(160, 'Kurukshetra', '6', '1'),
(161, 'Mahendragarh', '6', '1'),
(162, 'Mewat', '6', '1'),
(163, 'Panchkula', '6', '1'),
(164, 'Panipat', '6', '1'),
(165, 'Rewari', '6', '1'),
(166, 'Rohtak', '6', '1'),
(167, 'Sirsa', '6', '1'),
(168, 'Sonepat', '6', '1'),
(169, 'Yamuna Nagar', '6', '1'),
(170, 'Palwal', '6', '1'),
(171, 'Bilaspur', '7', '1'),
(172, 'Chamba', '7', '1'),
(173, 'Hamirpur', '7', '1'),
(174, 'Kangra', '7', '1'),
(175, 'Kinnaur', '7', '1'),
(176, 'Kulu', '7', '1'),
(177, 'Lahaul and Spiti', '7', '1'),
(178, 'Mandi', '7', '1'),
(179, 'Shimla', '7', '1'),
(180, 'Sirmaur', '7', '1'),
(181, 'Solan', '7', '1'),
(182, 'Una', '7', '1'),
(183, 'Anantnag', '8', '1'),
(184, 'Badgam', '8', '1'),
(185, 'Bandipore', '8', '1'),
(186, 'Baramula', '8', '1'),
(187, 'Doda', '8', '1'),
(188, 'Jammu', '8', '1'),
(189, 'Kargil', '8', '1'),
(190, 'Kathua', '8', '1'),
(191, 'Kupwara', '8', '1'),
(192, 'Leh', '8', '1'),
(193, 'Poonch', '8', '1'),
(194, 'Pulwama', '8', '1'),
(195, 'Rajauri', '8', '1'),
(196, 'Srinagar', '8', '1'),
(197, 'Samba', '8', '1'),
(198, 'Udhampur', '8', '1'),
(199, 'Bokaro', '34', '1'),
(200, 'Chatra', '34', '1'),
(201, 'Deoghar', '34', '1'),
(202, 'Dhanbad', '34', '1'),
(203, 'Dumka', '34', '1'),
(204, 'Purba Singhbhum', '34', '1'),
(205, 'Garhwa', '34', '1'),
(206, 'Giridih', '34', '1'),
(207, 'Godda', '34', '1'),
(208, 'Gumla', '34', '1'),
(209, 'Hazaribagh', '34', '1'),
(210, 'Koderma', '34', '1'),
(211, 'Lohardaga', '34', '1'),
(212, 'Pakur', '34', '1'),
(213, 'Palamu', '34', '1'),
(214, 'Ranchi', '34', '1'),
(215, 'Sahibganj', '34', '1'),
(216, 'Seraikela and Kharsawan', '34', '1'),
(217, 'Pashchim Singhbhum', '34', '1'),
(218, 'Ramgarh', '34', '1'),
(219, 'Bidar', '9', '1'),
(220, 'Belgaum', '9', '1'),
(221, 'Bijapur', '9', '1'),
(222, 'Bagalkot', '9', '1'),
(223, 'Bellary', '9', '1'),
(224, 'Bangalore Rural District', '9', '1'),
(225, 'Bangalore Urban District', '9', '1'),
(226, 'Chamarajnagar', '9', '1'),
(227, 'Chikmagalur', '9', '1'),
(228, 'Chitradurga', '9', '1'),
(229, 'Davanagere', '9', '1'),
(230, 'Dharwad', '9', '1'),
(231, 'Dakshina Kannada', '9', '1'),
(232, 'Gadag', '9', '1'),
(233, 'Gulbarga', '9', '1'),
(234, 'Hassan', '9', '1'),
(235, 'Haveri District', '9', '1'),
(236, 'Kodagu', '9', '1'),
(237, 'Kolar', '9', '1'),
(238, 'Koppal', '9', '1'),
(239, 'Mandya', '9', '1'),
(240, 'Mysore', '9', '1'),
(241, 'Raichur', '9', '1'),
(242, 'Shimoga', '9', '1'),
(243, 'Tumkur', '9', '1'),
(244, 'Udupi', '9', '1'),
(245, 'Uttara Kannada', '9', '1'),
(246, 'Ramanagara', '9', '1'),
(247, 'Chikballapur', '9', '1'),
(248, 'Yadagiri', '9', '1'),
(249, 'Alappuzha', '10', '1'),
(250, 'Ernakulam', '10', '1'),
(251, 'Idukki', '10', '1'),
(252, 'Kollam', '10', '1'),
(253, 'Kannur', '10', '1'),
(254, 'Kasaragod', '10', '1'),
(255, 'Kottayam', '10', '1'),
(256, 'Kozhikode', '10', '1'),
(257, 'Malappuram', '10', '1'),
(258, 'Palakkad', '10', '1'),
(259, 'Pathanamthitta', '10', '1'),
(260, 'Thrissur', '10', '1'),
(261, 'Thiruvananthapuram', '10', '1'),
(262, 'Wayanad', '10', '1'),
(263, 'Alirajpur', '11', '1'),
(264, 'Anuppur', '11', '1'),
(265, 'Ashok Nagar', '11', '1'),
(266, 'Balaghat', '11', '1'),
(267, 'Barwani', '11', '1'),
(268, 'Betul', '11', '1'),
(269, 'Bhind', '11', '1'),
(270, 'Bhopal', '11', '1'),
(271, 'Burhanpur', '11', '1'),
(272, 'Chhatarpur', '11', '1'),
(273, 'Chhindwara', '11', '1'),
(274, 'Damoh', '11', '1'),
(275, 'Datia', '11', '1'),
(276, 'Dewas', '11', '1'),
(277, 'Dhar', '11', '1'),
(278, 'Dindori', '11', '1'),
(279, 'Guna', '11', '1'),
(280, 'Gwalior', '11', '1'),
(281, 'Harda', '11', '1'),
(282, 'Hoshangabad', '11', '1'),
(283, 'Indore', '11', '1'),
(284, 'Jabalpur', '11', '1'),
(285, 'Jhabua', '11', '1'),
(286, 'Katni', '11', '1'),
(287, 'Khandwa', '11', '1'),
(288, 'Khargone', '11', '1'),
(289, 'Mandla', '11', '1'),
(290, 'Mandsaur', '11', '1'),
(291, 'Morena', '11', '1'),
(292, 'Narsinghpur', '11', '1'),
(293, 'Neemuch', '11', '1'),
(294, 'Panna', '11', '1'),
(295, 'Rewa', '11', '1'),
(296, 'Rajgarh', '11', '1'),
(297, 'Ratlam', '11', '1'),
(298, 'Raisen', '11', '1'),
(299, 'Sagar', '11', '1'),
(300, 'Satna', '11', '1'),
(301, 'Sehore', '11', '1'),
(302, 'Seoni', '11', '1'),
(303, 'Shahdol', '11', '1'),
(304, 'Shajapur', '11', '1'),
(305, 'Sheopur', '11', '1'),
(306, 'Shivpuri', '11', '1'),
(307, 'Sidhi', '11', '1'),
(308, 'Singrauli', '11', '1'),
(309, 'Tikamgarh', '11', '1'),
(310, 'Ujjain', '11', '1'),
(311, 'Umaria', '11', '1'),
(312, 'Vidisha', '11', '1'),
(313, 'Ahmednagar', '12', '1'),
(314, 'Akola', '12', '1'),
(315, 'Amrawati', '12', '1'),
(316, 'Aurangabad', '12', '1'),
(317, 'Bhandara', '12', '1'),
(318, 'Beed', '12', '1'),
(319, 'Buldhana', '12', '1'),
(320, 'Chandrapur', '12', '1'),
(321, 'Dhule', '12', '1'),
(322, 'Gadchiroli', '12', '1'),
(323, 'Gondiya', '12', '1'),
(324, 'Hingoli', '12', '1'),
(325, 'Jalgaon', '12', '1'),
(326, 'Jalna', '12', '1'),
(327, 'Kolhapur', '12', '1'),
(328, 'Latur', '12', '1'),
(329, 'Mumbai City', '12', '1'),
(330, 'Mumbai suburban', '12', '1'),
(331, 'Nandurbar', '12', '1'),
(332, 'Nanded', '12', '1'),
(333, 'Nagpur', '12', '1'),
(334, 'Nashik', '12', '1'),
(335, 'Osmanabad', '12', '1'),
(336, 'Parbhani', '12', '1'),
(337, 'Pune', '12', '1'),
(338, 'Raigad', '12', '1'),
(339, 'Ratnagiri', '12', '1'),
(340, 'Sindhudurg', '12', '1'),
(341, 'Sangli', '12', '1'),
(342, 'Solapur', '12', '1'),
(343, 'Satara', '12', '1'),
(344, 'Thane', '12', '1'),
(345, 'Wardha', '12', '1'),
(346, 'Washim', '12', '1'),
(347, 'Yavatmal', '12', '1'),
(348, 'Bishnupur', '13', '1'),
(349, 'Churachandpur', '13', '1'),
(350, 'Chandel', '13', '1'),
(351, 'Imphal East', '13', '1'),
(352, 'Senapati', '13', '1'),
(353, 'Tamenglong', '13', '1'),
(354, 'Thoubal', '13', '1'),
(355, 'Ukhrul', '13', '1'),
(356, 'Imphal West', '13', '1'),
(357, 'East Garo Hills', '14', '1'),
(358, 'East Khasi Hills', '14', '1'),
(359, 'Jaintia Hills', '14', '1'),
(360, 'Ri-Bhoi', '14', '1'),
(361, 'South Garo Hills', '14', '1'),
(362, 'West Garo Hills', '14', '1'),
(363, 'West Khasi Hills', '14', '1'),
(364, 'Aizawl', '15', '1'),
(365, 'Champhai', '15', '1'),
(366, 'Kolasib', '15', '1'),
(367, 'Lawngtlai', '15', '1'),
(368, 'Lunglei', '15', '1'),
(369, 'Mamit', '15', '1'),
(370, 'Saiha', '15', '1'),
(371, 'Serchhip', '15', '1'),
(372, 'Dimapur', '16', '1'),
(373, 'Kohima', '16', '1'),
(374, 'Mokokchung', '16', '1'),
(375, 'Mon', '16', '1'),
(376, 'Phek', '16', '1'),
(377, 'Tuensang', '16', '1'),
(378, 'Wokha', '16', '1'),
(379, 'Zunheboto', '16', '1'),
(380, 'Angul', '17', '1'),
(381, 'Boudh', '17', '1'),
(382, 'Bhadrak', '17', '1'),
(383, 'Bolangir', '17', '1'),
(384, 'Bargarh', '17', '1'),
(385, 'Baleswar', '17', '1'),
(386, 'Cuttack', '17', '1'),
(387, 'Debagarh', '17', '1'),
(388, 'Dhenkanal', '17', '1'),
(389, 'Ganjam', '17', '1'),
(390, 'Gajapati', '17', '1'),
(391, 'Jharsuguda', '17', '1'),
(392, 'Jajapur', '17', '1'),
(393, 'Jagatsinghpur', '17', '1'),
(394, 'Khordha', '17', '1'),
(395, 'Kendujhar', '17', '1'),
(396, 'Kalahandi', '17', '1'),
(397, 'Kandhamal', '17', '1'),
(398, 'Koraput', '17', '1'),
(399, 'Kendrapara', '17', '1'),
(400, 'Malkangiri', '17', '1'),
(401, 'Mayurbhanj', '17', '1'),
(402, 'Nabarangpur', '17', '1'),
(403, 'Nuapada', '17', '1'),
(404, 'Nayagarh', '17', '1'),
(405, 'Puri', '17', '1'),
(406, 'Rayagada', '17', '1'),
(407, 'Sambalpur', '17', '1'),
(408, 'Subarnapur', '17', '1'),
(409, 'Sundargarh', '17', '1'),
(410, 'Karaikal', '27', '1'),
(411, 'Mahe', '27', '1'),
(412, 'Puducherry', '27', '1'),
(413, 'Yanam', '27', '1'),
(414, 'Amritsar', '18', '1'),
(415, 'Bathinda', '18', '1'),
(416, 'Firozpur', '18', '1'),
(417, 'Faridkot', '18', '1'),
(418, 'Fatehgarh Sahib', '18', '1'),
(419, 'Gurdaspur', '18', '1'),
(420, 'Hoshiarpur', '18', '1'),
(421, 'Jalandhar', '18', '1'),
(422, 'Kapurthala', '18', '1'),
(423, 'Ludhiana', '18', '1'),
(424, 'Mansa', '18', '1'),
(425, 'Moga', '18', '1'),
(426, 'Mukatsar', '18', '1'),
(427, 'Nawan Shehar', '18', '1'),
(428, 'Patiala', '18', '1'),
(429, 'Rupnagar', '18', '1'),
(430, 'Sangrur', '18', '1'),
(431, 'Ajmer', '19', '1'),
(432, 'Alwar', '19', '1'),
(433, 'Bikaner', '19', '1'),
(434, 'Barmer', '19', '1'),
(435, 'Banswara', '19', '1'),
(436, 'Bharatpur', '19', '1'),
(437, 'Baran', '19', '1'),
(438, 'Bundi', '19', '1'),
(439, 'Bhilwara', '19', '1'),
(440, 'Churu', '19', '1'),
(441, 'Chittorgarh', '19', '1'),
(442, 'Dausa', '19', '1'),
(443, 'Dholpur', '19', '1'),
(444, 'Dungapur', '19', '1'),
(445, 'Ganganagar', '19', '1'),
(446, 'Hanumangarh', '19', '1'),
(447, 'Juhnjhunun', '19', '1'),
(448, 'Jalore', '19', '1'),
(449, 'Jodhpur', '19', '1'),
(450, 'Jaipur', '19', '1'),
(451, 'Jaisalmer', '19', '1'),
(452, 'Jhalawar', '19', '1'),
(453, 'Karauli', '19', '1'),
(454, 'Kota', '19', '1'),
(455, 'Nagaur', '19', '1'),
(456, 'Pali', '19', '1'),
(457, 'Pratapgarh', '19', '1'),
(458, 'Rajsamand', '19', '1'),
(459, 'Sikar', '19', '1'),
(460, 'Sawai Madhopur', '19', '1'),
(461, 'Sirohi', '19', '1'),
(462, 'Tonk', '19', '1'),
(463, 'Udaipur', '19', '1'),
(464, 'East Sikkim', '20', '1'),
(465, 'North Sikkim', '20', '1'),
(466, 'South Sikkim', '20', '1'),
(467, 'West Sikkim', '20', '1'),
(468, 'Ariyalur', '21', '1'),
(469, 'Chennai', '21', '1'),
(470, 'Coimbatore', '21', '1'),
(471, 'Cuddalore', '21', '1'),
(472, 'Dharmapuri', '21', '1'),
(473, 'Dindigul', '21', '1'),
(474, 'Erode', '21', '1'),
(475, 'Kanchipuram', '21', '1'),
(476, 'Kanyakumari', '21', '1'),
(477, 'Karur', '21', '1'),
(478, 'Madurai', '21', '1'),
(479, 'Nagapattinam', '21', '1'),
(480, 'The Nilgiris', '21', '1'),
(481, 'Namakkal', '21', '1'),
(482, 'Perambalur', '21', '1'),
(483, 'Pudukkottai', '21', '1'),
(484, 'Ramanathapuram', '21', '1'),
(485, 'Salem', '21', '1'),
(486, 'Sivagangai', '21', '1'),
(487, 'Tiruppur', '21', '1'),
(488, 'Tiruchirappalli', '21', '1'),
(489, 'Theni', '21', '1'),
(490, 'Tirunelveli', '21', '1'),
(491, 'Thanjavur', '21', '1'),
(492, 'Thoothukudi', '21', '1'),
(493, 'Thiruvallur', '21', '1'),
(494, 'Thiruvarur', '21', '1'),
(495, 'Tiruvannamalai', '21', '1'),
(496, 'Vellore', '21', '1'),
(497, 'Villupuram', '21', '1'),
(498, 'Dhalai', '22', '1'),
(499, 'North Tripura', '22', '1'),
(500, 'South Tripura', '22', '1'),
(501, 'West Tripura', '22', '1'),
(502, 'Almora', '33', '1'),
(503, 'Bageshwar', '33', '1'),
(504, 'Chamoli', '33', '1'),
(505, 'Champawat', '33', '1'),
(506, 'Dehradun', '33', '1'),
(507, 'Haridwar', '33', '1'),
(508, 'Nainital', '33', '1'),
(509, 'Pauri Garhwal', '33', '1'),
(510, 'Pithoragharh', '33', '1'),
(511, 'Rudraprayag', '33', '1'),
(512, 'Tehri Garhwal', '33', '1'),
(513, 'Udham Singh Nagar', '33', '1'),
(514, 'Uttarkashi', '33', '1'),
(515, 'Agra', '23', '1'),
(516, 'Allahabad', '23', '1'),
(517, 'Aligarh', '23', '1'),
(518, 'Ambedkar Nagar', '23', '1'),
(519, 'Auraiya', '23', '1'),
(520, 'Azamgarh', '23', '1'),
(521, 'Barabanki', '23', '1'),
(522, 'Badaun', '23', '1'),
(523, 'Bagpat', '23', '1'),
(524, 'Bahraich', '23', '1'),
(525, 'Bijnor', '23', '1'),
(526, 'Ballia', '23', '1'),
(527, 'Banda', '23', '1'),
(528, 'Balrampur', '23', '1'),
(529, 'Bareilly', '23', '1'),
(530, 'Basti', '23', '1'),
(531, 'Bulandshahr', '23', '1'),
(532, 'Chandauli', '23', '1'),
(533, 'Chitrakoot', '23', '1'),
(534, 'Deoria', '23', '1'),
(535, 'Etah', '23', '1'),
(536, 'Kanshiram Nagar', '23', '1'),
(537, 'Etawah', '23', '1'),
(538, 'Firozabad', '23', '1'),
(539, 'Farrukhabad', '23', '1'),
(540, 'Fatehpur', '23', '1'),
(541, 'Faizabad', '23', '1'),
(542, 'Gautam Buddha Nagar', '23', '1'),
(543, 'Gonda', '23', '1'),
(544, 'Ghazipur', '23', '1'),
(545, 'Gorkakhpur', '23', '1'),
(546, 'Ghaziabad', '23', '1'),
(547, 'Hamirpur', '23', '1'),
(548, 'Hardoi', '23', '1'),
(549, 'Mahamaya Nagar', '23', '1'),
(550, 'Jhansi', '23', '1'),
(551, 'Jalaun', '23', '1'),
(552, 'Jyotiba Phule Nagar', '23', '1'),
(553, 'Jaunpur District', '23', '1'),
(554, 'Kanpur Dehat', '23', '1'),
(555, 'Kannauj', '23', '1'),
(556, 'Kanpur Nagar', '23', '1'),
(557, 'Kaushambi', '23', '1'),
(558, 'Kushinagar', '23', '1'),
(559, 'Lalitpur', '23', '1'),
(560, 'Lakhimpur Kheri', '23', '1'),
(561, 'Lucknow', '23', '1'),
(562, 'Mau', '23', '1'),
(563, 'Meerut', '23', '1'),
(564, 'Maharajganj', '23', '1'),
(565, 'Mahoba', '23', '1'),
(566, 'Mirzapur', '23', '1'),
(567, 'Moradabad', '23', '1'),
(568, 'Mainpuri', '23', '1'),
(569, 'Mathura', '23', '1'),
(570, 'Muzaffarnagar', '23', '1'),
(571, 'Pilibhit', '23', '1'),
(572, 'Pratapgarh', '23', '1'),
(573, 'Rampur', '23', '1'),
(574, 'Rae Bareli', '23', '1'),
(575, 'Saharanpur', '23', '1'),
(576, 'Sitapur', '23', '1'),
(577, 'Shahjahanpur', '23', '1'),
(578, 'Sant Kabir Nagar', '23', '1'),
(579, 'Siddharthnagar', '23', '1'),
(580, 'Sonbhadra', '23', '1'),
(581, 'Sant Ravidas Nagar', '23', '1'),
(582, 'Sultanpur', '23', '1'),
(583, 'Shravasti', '23', '1'),
(584, 'Unnao', '23', '1'),
(585, 'Varanasi', '23', '1'),
(586, 'Birbhum', '24', '1'),
(587, 'Bankura', '24', '1'),
(588, 'Bardhaman', '24', '1'),
(589, 'Darjeeling', '24', '1'),
(590, 'Dakshin Dinajpur', '24', '1'),
(591, 'Hooghly', '24', '1'),
(592, 'Howrah', '24', '1'),
(593, 'Jalpaiguri', '24', '1'),
(594, 'Cooch Behar', '24', '1'),
(595, 'Kolkata', '24', '1'),
(596, 'Malda', '24', '1'),
(597, 'Midnapore', '24', '1'),
(598, 'Murshidabad', '24', '1'),
(599, 'Nadia', '24', '1'),
(600, 'North 24 Parganas', '24', '1'),
(601, 'South 24 Parganas', '24', '1'),
(602, 'Raipur', '35', '1'),
(603, 'Uttar Dinajpur', '24', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `id` int(15) NOT NULL,
  `stateName` varchar(255) DEFAULT NULL,
  `countryId` int(15) DEFAULT NULL,
  `status` enum('0','1','2') DEFAULT NULL COMMENT '''''0=Delete'',''1=Active'',''2=Inactive'''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`id`, `stateName`, `countryId`, `status`) VALUES
(1, 'ANDHRA PRADESH', 105, '1'),
(2, 'ASSAM', 105, '1'),
(3, 'ARUNACHAL PRADESH', 105, '1'),
(4, 'BIHAR', 105, '1'),
(5, 'GUJRAT', 105, '1'),
(6, 'HARYANA', 105, '1'),
(7, 'HIMACHAL PRADESH', 105, '1'),
(8, 'JAMMU & KASHMIR', 105, '1'),
(9, 'KARNATAKA', 105, '1'),
(10, 'KERALA', 105, '1'),
(11, 'MADHYA PRADESH', 105, '1'),
(12, 'MAHARASHTRA', 105, '1'),
(13, 'MANIPUR', 105, '1'),
(14, 'MEGHALAYA', 105, '1'),
(15, 'MIZORAM', 105, '1'),
(16, 'NAGALAND', 105, '1'),
(17, 'ORISSA', 105, '1'),
(18, 'PUNJAB', 105, '1'),
(19, 'RAJASTHAN', 105, '1'),
(20, 'SIKKIM', 105, '1'),
(21, 'TAMIL NADU', 105, '1'),
(22, 'TRIPURA', 105, '1'),
(23, 'UTTAR PRADESH', 105, '1'),
(24, 'WEST BENGAL', 105, '1'),
(25, 'DELHI', 105, '1'),
(26, 'GOA', 105, '1'),
(27, 'PONDICHERY', 105, '1'),
(28, 'LAKSHDWEEP', 105, NULL),
(29, 'DAMAN & DIU', 105, '1'),
(30, 'DADRA & NAGAR', 105, NULL),
(31, 'CHANDIGARH', 105, NULL),
(32, 'ANDAMAN & NICOBAR', 105, '1'),
(33, 'UTTARANCHAL', 105, '1'),
(34, 'JHARKHAND', 105, '1'),
(35, 'CHATTISGARH', 105, '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery_boy_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `delivery_boy_id`, `name`, `email`, `email_verified_at`, `password`, `lname`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, NULL, 'Kirti', 'kirtirauniyar@gmail.com', NULL, '$2y$10$82ZmcLem37pIkihZ2NNd1OUOkahVxDvPcjlYopJa4OuXWDD3Z7XHW', 'Rauniyar', '07380593485', 'A16 Dayal estate matiyari chinhat near to reliance petrol pump', 'Street of In front of aadarsh coaching center', 'Lucknow', 'Uttar Pradesh', 'India', '226028', 0, NULL, '2022-11-26 00:22:49', '2022-11-28 06:05:06'),
(3, NULL, 'admin', 'admin@gmail.com', NULL, '$2y$10$d7y.qeQ.RW51bhgIBeBYGOboTg9cmISP.QzXe91Qm3y7HIKifuniC', '', '9898989898', '', '', '', '', '', '', 1, NULL, '2022-11-26 01:53:20', '2022-12-31 02:04:44'),
(4, NULL, 'Kirti Rauniyar', 'kirtirauniyar097@gmail.com', NULL, '$2y$10$hsxO2Q8n4ftTG8Go/A4wG..NilEUun8t5v8BjeiOupZIcGqMSlJKu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-12-07 00:40:21', '2022-12-07 00:40:21'),
(5, NULL, 'Shashikant', 'shivam@gmail.com', NULL, '$2y$10$YZeTHu1.PdHMpCSLrgvDCu8hXW9XJPvAyolpxS4PcqaBAwffaDIcy', 'Gupta', '09956830561', 'Indira nagar, sitaram chowraha, gorakhpur', 'Shashikant', '313', '12', NULL, '273001', 0, NULL, '2022-12-12 00:48:18', '2023-01-06 11:51:58'),
(6, NULL, 'ST-Delievery Boy', 'stdeliveryboy@gmail.com', NULL, '12345678', NULL, '9898989898', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2022-12-31 01:51:11', '2022-12-31 01:51:11'),
(7, 4, 'KK-Delivery Boy', 'kkdeliveryboy@gmail.com', NULL, '$2y$10$MfYKNLCbJeiBM.Q8EZ/QaObB5ZW0ays2TsG9QEYKKhMxY8AFdIvv6', NULL, '9898787878', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2022-12-31 02:11:53', '2022-12-31 02:11:53'),
(8, 5, 'pkdeliveryboy', 'pkdeliveryboy@gmail.com', NULL, '$2y$10$rRMda/PEbyZjZqaqOeMkyeL4k9eGhBx5qUTGeKrwoQlPg2IyWbjjK', NULL, '7878787878', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2022-12-31 02:14:57', '2022-12-31 02:26:53'),
(9, 6, 'ghjgj', 'hjhjhj@gmail.com', NULL, '$2y$10$AGIIdgAcClqcaXk91S1ZWe7u.pifPZLuqrt31Og95t71UTJY0r0oG', NULL, '7777777777', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2023-01-02 02:14:29', '2023-01-02 02:14:29'),
(10, 7, 'kjkjkjk', 'hghgjghjg@gmail.com', NULL, '$2y$10$2U1.nDwj6o6ilkxHT64zy.arlVuu24Gb2szqdln4bZ/44CWY3s3PC', NULL, '8787878787', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2023-01-02 02:16:31', '2023-01-02 02:16:31'),
(11, 9, 'hk', 'ss@gmail.com', NULL, '$2y$10$9YXUWUZzkmc9tiDrIAY5KOcnbYdkx3GOsdZPsvP/Nuf4W5ABwrGsa', NULL, '09956830561', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2023-01-02 06:49:14', '2023-01-02 06:57:52'),
(12, 10, 'kl-delivery', 'kl@gmail.com', NULL, '$2y$10$8CHs6pimX/CXFSidYiP9eO4CRatL9l4JELd8cGIHuyIT9gydB1.Xq', NULL, '8989898989', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2023-01-03 03:32:04', '2023-01-03 03:32:04'),
(13, 11, 'Shivendra Tripathi', 'shiv@gmail.com', NULL, '$2y$10$Uoe8wG89pgNz8jiX3OgtAe5/vHKF8vuHMX1qcG/qX3l0uajfsr2gK', NULL, '9140389631', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2023-01-06 05:26:35', '2023-01-06 05:26:35'),
(14, NULL, 'Shivendra', 'shivendra@gmail.com', NULL, '$2y$10$o2OTCKVEv3KOeqQvRfySz.e7fP2OzcfK4VLg5IraL7ATUwqAiMNue', 'ddd', '9876543210', 'fff', 'fff', '530', '23', NULL, '272148', 0, NULL, '2023-01-06 05:29:02', '2023-01-06 06:31:57'),
(15, NULL, 'kirti444@gmail', 'kirti444@gmail.com', NULL, '$2y$10$q9SD5HnWZWTxGitnh6gYUOj4ZL6CHf5opwQe7gV1mLhP.DmA13zyu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2023-01-20 08:12:25', '2023-01-20 08:12:25'),
(16, NULL, 'Shubham Mishra', 'max@gmail.com', NULL, '$2y$10$sqTJ5BuReOevHr/Bgp.Z8ubPFNArbc1PjPMBPfxjdlPtDlel9IqVO', 'MISHRA', '88774744758', 'kanpur', 'kanpur', '556', '23', NULL, '202020', 0, NULL, '2023-06-05 23:19:06', '2023-06-06 04:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_register`
--

CREATE TABLE `vendor_register` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_address_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_address_proof_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_business_license_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_pan_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_gstno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_wallet` varchar(244) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_register`
--

INSERT INTO `vendor_register` (`id`, `vendor_name`, `shop_name`, `shop_email`, `shop_address`, `shop_city`, `shop_state`, `shop_country`, `shop_pincode`, `shop_mobile`, `shop_address_proof`, `shop_address_proof_image`, `shop_business_license_number`, `shop_pan_number`, `shop_gstno`, `v_wallet`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Vinod Prajapati', 'VP-Interprise', 'vindoe@gmailcom', 'Indira nagar, sitaram chowraha, gorakhpur\r\nStreet of In front of aadarsh coaching center', 'Gorakhpur', 'Near to shakuntala marriage house', NULL, '273001', '09956830561', NULL, NULL, NULL, 'KDJS%$*98786', '868484', '-247', 1, '2022-12-22 06:55:45', '2023-06-08 02:44:21'),
(2, 'John Singhhh', 'John-Delhi', 'john@gmail.com', 'A16 Dayal estate matiyari chinhat near to reliance petrol pump', 'Delihi', 'Delhi', NULL, '226028', '8888888888', NULL, NULL, NULL, 'DS$%#%', '88747597792', '237', 1, '2022-12-22 06:57:29', '2022-12-23 04:37:46'),
(3, 'Vinod Awasthi', 'Vasooli fireworks', 'tabela24@gmail.com', 'Jang Khayla Tablea, Match Fixing Ground Ke Peeche Sansanaati Gali.', 'Andher Nagri', 'Junagarh', NULL, '202020', '98585874444', NULL, NULL, NULL, 'DCBPM000000', '1464616494', '0', 1, '2023-06-08 02:38:13', '2023-06-08 02:39:47');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `prod_id`, `created_at`, `updated_at`) VALUES
(3, '5', '7', '2022-12-10 04:07:13', '2022-12-10 04:07:13'),
(5, '6', '7', '2022-12-10 04:24:38', '2022-12-10 04:24:38'),
(6, '6', '8', '2022-12-12 03:11:28', '2022-12-12 03:11:28'),
(7, '5', '3', '2022-12-13 00:09:56', '2022-12-13 00:09:56'),
(10, '5', '9', '2022-12-13 07:01:17', '2022-12-13 07:01:17'),
(11, '5', '3', '2022-12-13 07:11:36', '2022-12-13 07:11:36'),
(12, '5', '6', '2022-12-20 00:46:22', '2022-12-20 00:46:22'),
(13, '14', '1', '2023-01-06 05:29:53', '2023-01-06 05:29:53'),
(14, '16', '23', '2023-06-06 04:09:39', '2023-06-06 04:09:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_bill_logs`
--
ALTER TABLE `purchase_bill_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recently_viewed_products`
--
ALTER TABLE `recently_viewed_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendor_register`
--
ALTER TABLE `vendor_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `purchase_bill_logs`
--
ALTER TABLE `purchase_bill_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recently_viewed_products`
--
ALTER TABLE `recently_viewed_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1624;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vendor_register`
--
ALTER TABLE `vendor_register`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
