-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2019 at 04:51 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rabbitexpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `address`, `zip`, `created_at`, `updated_at`, `user_id`, `city_id`, `country_id`) VALUES
(25, 'Bakikhanov 27', 123, '2019-11-30 07:21:10', '2019-11-30 07:21:10', 8, 1, 1),
(26, 'Bakikhanov 27', 123, '2019-11-30 10:55:48', '2019-11-30 10:55:48', 6, 1, 1),
(27, 'Bakikhanov 27', 123, '2019-12-10 14:19:53', '2019-12-10 14:19:53', 10, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `parent_id`) VALUES
(14, 'Baby', '2019-11-30 04:52:23', '2019-11-30 04:52:23', 0),
(15, 'Men', '2019-11-30 04:52:29', '2019-11-30 04:52:29', 0),
(16, 'Women', '2019-11-30 04:52:35', '2019-11-30 04:52:35', 0),
(17, 'Women Accessories', '2019-11-30 04:52:45', '2019-11-30 05:04:57', 16),
(18, 'Men Accessories', '2019-11-30 04:53:02', '2019-11-30 05:07:06', 15),
(20, 'Hair', '2019-11-30 05:08:37', '2019-11-30 05:08:37', 17);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Baku', 1, NULL, '2019-11-30 13:28:44'),
(2, 'Ankara', 2, NULL, NULL),
(3, 'London', 3, NULL, NULL),
(4, 'Sumgait', 1, '2019-11-30 13:09:15', '2019-11-30 13:09:15'),
(5, 'Istanbul', 2, '2019-11-30 13:10:29', '2019-11-30 13:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Azerbaijan', 'Az', NULL, NULL),
(2, 'Turkey', 'TR', NULL, NULL),
(3, 'United Kingdom', 'UK', NULL, NULL),
(5, 'Southern Korea', 'KR', '2019-11-30 13:53:39', '2019-11-30 13:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_11_105144_create_products_table', 2),
(5, '2019_11_11_105752_create_categories_table', 3),
(6, '2019_11_11_110626_add_size_to_product', 4),
(7, '2019_11_11_163254_add_price_to_product', 5),
(8, '2019_11_19_083222_add_admin_column_to_users', 6),
(10, '2019_11_21_052443_create_address_table', 7),
(11, '2019_11_21_053107_create_addresses_table', 8),
(12, '2019_11_21_063126_add_user_id_to_addresses_table', 9),
(13, '2019_11_21_071238_create_orders_table', 10),
(14, '2019_11_21_094542_add_order_product_table', 10),
(15, '2019_11_21_101743_change_type_of_total_in_table_order_product', 11),
(16, '2019_11_22_142538_add_parent_id_to_categories_table', 12),
(17, '2019_11_25_171730_create_reviews_table', 13),
(18, '2019_11_26_114649_update_data_type_of_review_body', 14),
(19, '2019_11_30_120150_create_cities_table', 15),
(20, '2019_11_30_120223_create_countries_table', 15),
(21, '2019_11_30_121546_drop_column_city_id_from_countries', 16),
(22, '2019_11_30_122201_drop_columns_city_and_country_from_addresses', 17),
(23, '2019_11_30_122327_add_columns_city_id_and_country_id_to_addresses', 18);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `delivered` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `delivered`, `created_at`, `updated_at`) VALUES
(15, 8, 324, 1, '2019-11-30 07:21:31', '2019-11-30 07:22:42'),
(16, 6, 24, 0, '2019-11-30 10:56:00', '2019-11-30 10:56:00'),
(17, 10, 24, 0, '2019-12-10 14:20:08', '2019-12-10 14:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total` double NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `total`, `quantity`, `created_at`, `updated_at`) VALUES
(15, 15, 11, 250, 5, NULL, NULL),
(16, 15, 14, 20, 1, NULL, NULL),
(17, 16, 14, 20, 1, NULL, NULL),
(18, 17, 15, 20, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image_name`, `category_id`, `created_at`, `updated_at`, `size`, `price`) VALUES
(7, 'Infant Baby Suit', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'baby1_1575104428.jpg', 14, '2019-11-30 05:00:28', '2019-11-30 05:26:17', 'S', 23),
(8, 'Woman Hairnet', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.', 'hairnet1_1575105037.jpg', 20, '2019-11-30 05:10:37', '2019-11-30 05:11:38', 'S', 7),
(9, 'Men Accessories Set', 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.', 'menaccessories1_1575105240.jpg', 18, '2019-11-30 05:14:00', '2019-11-30 05:14:00', 'S', 50),
(10, 'Woman Night Dress', 'Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'womenclothes_1575105386.jpg', 16, '2019-11-30 05:16:26', '2019-11-30 05:17:06', 'M', 100),
(11, 'Woman Summer Dress', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.', 'womendress1_1575105759.jpg', 16, '2019-11-30 05:22:39', '2019-11-30 05:22:39', 'M', 50),
(12, 'Man Jacket', 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.', 'manjacket_1575105960.jpg', 15, '2019-11-30 05:26:00', '2019-11-30 05:26:00', 'M', 1000),
(13, 'Blue Woman Earings', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32.', 'earings1_1575112214.jpg', 17, '2019-11-30 07:10:14', '2019-11-30 07:11:28', 'S', 10),
(14, 'Pink Dangle Drop Earrings', 'Combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour.', 'earings2_1575112392.jpg', 17, '2019-11-30 07:13:12', '2019-11-30 07:13:12', 'S', 20),
(15, 'Baby Suit', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.', 'babyclothes2_1575136605.jpg', 14, '2019-11-30 13:56:45', '2019-11-30 13:56:45', 'S', 20),
(17, 'Black & White Long Sleeve Shirt', 'New Men Clothes Casual Shirts Long Sleeve Shirt Men Slim Fit Brand Male Shirt Camisa Masculina', 'menclothes2_1575993702.jpg', 15, '2019-12-01 16:06:54', '2019-12-10 12:01:42', 'L', 234),
(20, 'Long Sleeve Shirt', 'Long Sleeve Shirt has been made for slim men.', 'menclothe1_1575993571.jpg', 15, '2019-12-10 10:57:10', '2019-12-10 11:59:31', 'M', 85),
(21, 'Man Shirt', 'Man Long Sleeve Shirt with dot-pattern', 'manclothes3_1575993925.jpeg', 15, '2019-12-10 12:05:25', '2019-12-10 12:06:09', 'S', 34),
(22, 'Man Jacket', 'This product has been brought from Germany.', 'manclothe_1575994340.jpg', 15, '2019-12-10 12:12:21', '2019-12-10 12:12:21', 'S', 30),
(23, 'Woman Dress', 'Perfect dress for late nights!', 'womandress_1575996862.jpg', 16, '2019-12-10 12:54:22', '2019-12-10 12:54:22', 'M', 852),
(24, 'Woman Dress', 'Pretty Night Dress', 'woman1_1576002193.jpg', 16, '2019-12-10 14:22:32', '2019-12-10 14:23:13', 'S', 856);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `title`, `body`, `rating`, `created_at`, `updated_at`) VALUES
(22, 7, 11, 'Perfect', 'I purchased this 4 months ago. It is so cosy and I love it!', 5.00, '2019-11-30 05:28:43', '2019-11-30 05:28:43'),
(23, 6, 11, 'Wonderful!', 'I love wearing it. You have to buy this item!', 5.00, '2019-11-30 05:30:41', '2019-11-30 05:30:41'),
(24, 6, 10, 'Normal', 'It is a little bit uncomfortable, but it is okay.', 4.00, '2019-11-30 05:31:36', '2019-11-30 05:31:36'),
(25, 7, 10, 'Good', 'I liked it, but it is not what I wanted...', 3.00, '2019-11-30 05:33:00', '2019-11-30 05:33:00'),
(26, 8, 12, 'Great', 'Although it is expensive, it is worth!', 5.00, '2019-11-30 07:16:38', '2019-11-30 07:16:38'),
(27, 6, 21, 'Nice', 'Perfect! My brother loved it!', 5.00, '2019-12-10 12:18:40', '2019-12-10 12:18:40'),
(28, 10, 15, 'Çox Şirindi', 'Çox əla! Razı qaldım.', 5.00, '2019-12-10 12:46:44', '2019-12-10 12:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `admin`) VALUES
(6, 'Aytaj', 'johndoe@gmail.com', NULL, '$2y$10$DV/7UwFtjdwJX3j5.zoxieR1RWdeSNgnKwriOynhyn551PcNXdZxe', 'OP3HlVyV0HbFlL8KgvcO71OjvuhN0ab8p9LzhonmYFfudj9hBPp1q2tdbXP9', '2019-11-30 04:49:25', '2019-11-30 07:44:44', 1),
(7, 'Nigar', 'nigar@gmail.com', NULL, '$2y$10$FTSaIgmjagR44N2msR9igOt70KO1HU.hQOFq43RMKV2GMbFHMwwAC', NULL, '2019-11-30 05:27:46', '2019-11-30 05:27:46', NULL),
(8, 'Nicat', 'nicat@gmail.com', NULL, '$2y$10$J9PH9rXb2nFKVdErRv9AheecLF/YvJ0StkGUxsUdFdXX5gbMHo1We', NULL, '2019-11-30 07:16:09', '2019-11-30 07:16:09', NULL),
(9, 'Aytac Hasanova', 'aytac@outlook.com', NULL, '$2y$10$Uy70UkM.fiGXaIKvJNBW/uQAKDC/f3dWzvxqh/YrkMMIhqblJ9z32', 'uYCvPmpHFATcjFkLFQsGZYDOrf40OVa86Dv7Nmv3g9nQncHlR09FxjyhtXKF', '2019-11-30 07:45:42', '2019-11-30 07:46:39', NULL),
(10, 'Afet', 'afet@gmail.com', NULL, '$2y$10$NiwURBOK.Fi0iQq8iR01DuZC2dE1ydFPqBv4JR1ZlaMTYs1/pf3oS', NULL, '2019-12-10 12:40:29', '2019-12-10 12:40:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
