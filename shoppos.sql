-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 11:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppos`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brands_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brands_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 1, '2024-11-20 06:40:54', '2024-11-20 06:44:57'),
(2, 'Sony', 1, '2024-11-20 07:43:41', '2024-11-20 07:43:41'),
(3, 'Lg', 1, '2024-11-20 07:43:45', '2024-11-20 07:43:45'),
(4, 'Nokia', 1, '2024-11-20 07:43:57', '2024-11-20 07:43:57'),
(5, 'Apple', 1, '2024-11-20 07:44:28', '2024-11-20 07:44:28'),
(6, 'Vivo', 1, '2024-11-20 07:44:32', '2024-11-20 07:44:32'),
(7, 'Oppo', 1, '2024-11-20 07:44:38', '2024-11-20 07:44:38'),
(8, 'Daikin', 1, '2024-11-20 07:44:52', '2024-11-20 07:44:52'),
(9, 'test', 1, '2024-11-20 08:17:00', '2024-11-20 08:17:00'),
(10, 'Amul', 1, '2024-11-25 06:19:39', '2024-11-25 06:19:39');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Refrigerator', 0, '2024-11-20 05:54:50', '2024-11-20 06:23:06'),
(4, 'Radio', 1, '2024-11-20 06:17:27', '2024-11-20 06:17:27'),
(5, 'Washing-Machine', 1, '2024-11-20 07:45:18', '2024-11-20 07:45:18'),
(6, 'Mobile', 1, '2024-11-20 07:45:22', '2024-11-20 07:45:22'),
(7, 'Bike', 1, '2024-11-20 07:45:31', '2024-11-20 07:45:31'),
(8, 'demo', 1, '2024-11-20 08:16:54', '2024-11-20 08:16:54'),
(9, 'Books', 1, '2024-11-25 05:31:44', '2024-11-25 05:31:44'),
(10, 'Bags', 1, '2024-11-25 05:31:54', '2024-11-25 05:31:54'),
(11, 'Dairy', 1, '2024-11-25 06:19:30', '2024-11-25 06:19:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_11_20_101341_create_categories_table', 1),
(6, '2024_11_20_115525_create_brands_table', 2),
(7, '2024_11_20_121637_create_products_table', 3),
(8, '2024_11_20_131640_create_sales_table', 4),
(9, '2024_11_20_131706_create_sales_details_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `product_name` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category_id`, `brand_id`, `price`, `created_at`, `updated_at`) VALUES
(2, 'Test', 2, 1, 12, '2024-11-20 07:37:35', '2024-11-20 07:37:35'),
(3, 'Washing Machine Demo', 5, 1, 1290, '2024-11-20 07:45:50', '2024-11-20 07:45:50'),
(4, 'sample', 2, 1, 2332, '2024-11-20 08:17:16', '2024-11-20 08:17:16'),
(5, 'Example', 4, 1, 15000, '2024-11-25 04:54:57', '2024-11-25 04:55:15'),
(6, 'Amul milk powder', 11, 10, 15, '2024-11-25 06:19:59', '2024-11-25 06:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `pay` decimal(10,2) DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `total`, `pay`, `balance`, `created_at`, `updated_at`) VALUES
(27, 35810.00, 15000.00, 20810.00, '2024-11-25 05:27:59', '2024-11-25 05:27:59'),
(29, 35810.00, 15000.00, 20810.00, '2024-11-25 06:08:05', '2024-11-25 06:08:05'),
(30, 35810.00, 35811.00, -1.00, '2024-11-25 06:18:38', '2024-11-25 06:18:38'),
(31, 48977.00, 15000.00, 33977.00, '2024-11-25 07:31:30', '2024-11-25 07:31:30'),
(32, 48977.00, 2000.00, 46977.00, '2024-11-25 07:32:42', '2024-11-25 07:32:42'),
(33, 48977.00, 4000.00, 44977.00, '2024-11-25 07:33:32', '2024-11-25 07:33:32'),
(34, 48977.00, 15000.00, 33977.00, '2024-11-25 07:33:46', '2024-11-25 07:33:46'),
(35, 48977.00, 2000.00, 46977.00, '2024-11-25 07:34:51', '2024-11-25 07:34:51'),
(36, 48977.00, 15000.00, 33977.00, '2024-11-25 07:35:48', '2024-11-25 07:35:48'),
(37, 48977.00, 1500.00, 47477.00, '2024-11-25 07:37:13', '2024-11-25 07:37:13'),
(38, 49067.00, 1000.00, 48067.00, '2024-11-25 07:47:05', '2024-11-25 07:47:05');

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` varchar(255) NOT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total_cost` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`id`, `sales_id`, `product_id`, `price`, `qty`, `total_cost`, `created_at`, `updated_at`) VALUES
(6, NULL, '3', 1290.00, 5, 6450.00, '2024-11-25 03:10:27', '2024-11-25 03:10:27'),
(7, NULL, '2', 12.00, 10, 120.00, '2024-11-25 03:11:01', '2024-11-25 03:11:01'),
(8, NULL, '4', 2332.00, 5, 11660.00, '2024-11-25 03:15:49', '2024-11-25 03:15:49'),
(9, NULL, '3', 1290.00, 2, 2580.00, '2024-11-25 03:19:09', '2024-11-25 03:19:09'),
(10, NULL, '5', 15000.00, 1, 15000.00, '2024-11-25 05:11:28', '2024-11-25 05:11:28'),
(11, NULL, '6', 15.00, 9, 135.00, '2024-11-25 06:28:53', '2024-11-25 06:28:53'),
(12, NULL, '2', 12.00, 1, 12.00, '2024-11-25 06:30:11', '2024-11-25 06:30:11'),
(13, NULL, '6', 15.00, 4, 60.00, '2024-11-25 06:31:21', '2024-11-25 06:31:21'),
(14, NULL, '6', 15.00, 1, 60.00, '2024-11-25 07:30:06', '2024-11-25 07:30:06'),
(15, NULL, '3', 1290.00, 10, 12900.00, '2024-11-25 07:30:56', '2024-11-25 07:30:56'),
(16, NULL, '6', 15.00, 6, 90.00, '2024-11-25 07:46:43', '2024-11-25 07:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_details_sales_id_foreign` (`sales_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD CONSTRAINT `sales_details_sales_id_foreign` FOREIGN KEY (`sales_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
