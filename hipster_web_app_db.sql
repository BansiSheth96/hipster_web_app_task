-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 01, 2025 at 09:30 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hipster_web_app_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `mobile_no`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin1@example.com', '9000000001', '$2y$12$CjwH5nVRNruWXdbMTChq.e9JNIM8nM7lRHbE20NjAOdCvrqRfneVG', '2025-09-01 03:56:03', '2025-09-01 03:56:03'),
(2, 'Manager Admin', 'admin2@example.com', '9000000002', '$2y$12$dbIHQNQDFyT3Xam/lD4Zeuj5ZhONl86W.4eLY6ifdlpZaIEyA6pL2', '2025-09-01 03:56:03', '2025-09-01 03:56:03'),
(3, 'Support Admin', 'admin3@example.com', '9000000003', '$2y$12$nRvH5nrYNG4RBx2gZJ3Wtu76b3GQbtsSI58LvhoQSaTSONysZybt6', '2025-09-01 03:56:04', '2025-09-01 03:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `c_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `c_name`, `c_email`, `c_mobile_no`, `password`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'john@example.com', '9000000004', '$2y$12$8LxHKwVS5fCD538U7YIfjO4ukUDchFkDgXqm1zrHhjtF13gAAkzzK', '2025-09-01 03:56:04', '2025-09-01 03:56:04'),
(2, 'Jane Smith', 'jane@example.com', '9000000005', '$2y$12$DAwVvQ.xzspdi1usww1k9.LGA7mE9AQ5n5um5riOwONIb/IBvnyPu', '2025-09-01 03:56:04', '2025-09-01 03:56:04'),
(3, 'Alex Johnson', 'alex@example.com', '9000000006', '$2y$12$Vw8E0kcoV5rTvL0y7zMwbO2b3F9vhUjq5wOIAadWXnv6O5PfA24ZG', '2025-09-01 03:56:05', '2025-09-01 03:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"033acf0c-3200-4d2f-8f68-94f25df7a7d0\",\"displayName\":\"App\\\\Jobs\\\\ProcessProductImport\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessProductImport\",\"command\":\"O:29:\\\"App\\\\Jobs\\\\ProcessProductImport\\\":1:{s:4:\\\"path\\\";s:24:\\\"C:\\\\xampp\\\\tmp\\\\php46D6.tmp\\\";}\"}}', 0, NULL, 1756718856, 1756718856);

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_28_122052_create_admins_table', 1),
(5, '2025_08_28_122328_create_customers_table', 1),
(6, '2025_08_28_153705_create_products_table', 1),
(7, '2025_08_29_114715_create_orders_table', 1),
(8, '2025_08_29_131038_add_status_to_orders_table', 1),
(9, '2025_08_31_174446_create_push_subscriptions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `total_price` double NOT NULL DEFAULT '0',
  `status` enum('Pending','Shipped','Delivered') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `product_id`, `quantity`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 21, 20, 1500, 'Shipped', '2025-09-01 03:58:46', '2025-09-01 03:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` double NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `description`, `price`, `image`, `category`, `stock`, `created_at`, `updated_at`) VALUES
(6, 'Wireless Earbuds', 'Enjoy high-quality audio and a seamless listening experience with these sleek, noise-canceling earbuds.', 6000, 'products/product_1.jpg', 'Electronic', 100, '2025-09-01 03:56:06', '2025-09-01 03:57:05'),
(7, 'Electric Toothbrush', 'This toothbrush has a built-in timer and multiple cleaning modes for a personalized experience', 700, 'products/product_2.jpg', 'Electronic', 20, '2025-09-01 03:56:07', '2025-09-01 03:56:07'),
(8, 'Acrylic Paint Set', 'A vibrant collection of 24 artist-grade acrylic paints. They are quick-drying and suitable for canvas, wood, and ceramic surfaces.', 700, 'products/product_3.jpg', 'Arts & Crafts', 20, '2025-09-01 03:56:08', '2025-09-01 03:56:08'),
(9, 'Coffee Maker', 'A compact drip coffee maker, perfect for small kitchens.', 600, 'products/de908a3c-3761-4211-b7d4-ae316d10110f.jpg', 'Home Appliances', 200, '2025-09-01 03:57:24', '2025-09-01 03:57:24'),
(10, 'Bluetooth Headphones', 'High-fidelity sound with noise-cancellation and a long-lasting battery.', 129.99, 'products/0ca604bd-1f18-4507-9e6d-851d73222fbd.jpg', 'Electronics', 150, '2025-09-01 03:57:25', '2025-09-01 03:57:25'),
(11, 'Smartwatch', 'Track your fitness, heart rate, and notifications on the go.', 199.5, 'products/b66ace9c-7eb7-4d68-b1cb-95cf4fc92924.jpg', 'Electronics', 75, '2025-09-01 03:57:27', '2025-09-01 03:57:27'),
(12, 'Wireless Charger', 'A sleek wireless charging pad for all your compatible devices.', 29.99, 'products/11e23157-de75-4fb1-a6e0-be6f093e7500.jpg', 'Electronics', 300, '2025-09-01 03:57:27', '2025-09-01 03:57:27'),
(13, 'Portable Bluetooth Speaker', 'Powerful sound in a compact, water-resistant design.', 89, 'products/3ed405bb-8160-4a35-9f60-0cea921ed186.png', 'Electronics', 120, '2025-09-01 03:57:28', '2025-09-01 03:57:28'),
(14, 'Laptop Stand', 'Ergonomic aluminum laptop stand to improve posture.', 45.99, 'products/3f2e6697-bd64-408d-bbc6-f81ddf835ada.jpg', 'Electronics', 250, '2025-09-01 03:57:29', '2025-09-01 03:57:29'),
(15, 'Espresso Machine', 'Brew barista-quality espresso at home with this compact machine.', 250, 'products/e2dc58ce-0b78-4f8e-bf14-f778e948c787.jpg', 'Home Appliances', 50, '2025-09-01 03:57:29', '2025-09-01 03:57:29'),
(16, 'Toaster Oven', 'Multifunctional toaster oven for baking, broiling, and toasting.', 85, 'products/9ff612e8-86e5-4571-9c05-0d335fdb6482.jpg', 'Home Appliances', 100, '2025-09-01 03:57:30', '2025-09-01 03:57:30'),
(17, 'Air Fryer', 'Cook your favorite fried foods with little to no oil.', 79.99, 'products/b23168f5-2dd2-4665-a115-d9f14004a99d.jpg', 'Home Appliances', 180, '2025-09-01 03:57:31', '2025-09-01 03:57:31'),
(18, 'Hand Mixer', 'A powerful hand mixer with multiple speed settings and attachments.', 34.5, 'products/5a87c49f-545b-4913-99b2-89756e9dd69d.jpg', 'Home Appliances', 220, '2025-09-01 03:57:31', '2025-09-01 03:57:31'),
(19, 'Blender', 'Heavy-duty blender for smoothies, shakes, and crushed ice.', 99, 'products/25c26062-21de-43fe-81c9-29760929659b.jpg', 'Home Appliances', 90, '2025-09-01 03:57:32', '2025-09-01 03:57:32'),
(20, 'Yoga Mat', 'Non-slip yoga mat with a carrying strap for easy transport.', 24.99, NULL, 'Fitness & Outdoors', 400, '2025-09-01 03:57:34', '2025-09-01 03:57:34'),
(21, 'Dumbbell Set', 'Adjustable dumbbell set for a full-body workout at home.', 75, 'products/8cb5d9be-91a3-4125-8f70-a9b205737c10.jpg', 'Fitness & Outdoors', 40, '2025-09-01 03:57:34', '2025-09-01 03:58:46'),
(22, 'Running Shoes', 'Lightweight and breathable running shoes for men and women.', 89.99, 'products/e86de6f8-a8f5-4677-98d3-49de0814d672.jpg', 'Fitness & Outdoors', 150, '2025-09-01 03:57:35', '2025-09-01 03:57:35'),
(23, 'Hiking Backpack', 'Spacious hiking backpack with multiple compartments and a rain cover.', 55, 'products/69508aa0-c060-4ccc-b37a-95e7736dccb8.jpg', 'Fitness & Outdoors', 80, '2025-09-01 03:57:36', '2025-09-01 03:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `push_subscriptions`
--

CREATE TABLE `push_subscriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `subscribable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscribable_id` bigint UNSIGNED NOT NULL,
  `endpoint` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `public_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_encoding` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('yuH61BjmO4V2NoM6Z2mr19tUcJH8swp6eMBFTRSE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTnJzQ3VqZm5EMkFNbWh2bG0zcFdKUFRoQk1xTmozTDFnU2lRSEFOOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTU6ImxvZ2luX2N1c3RvbWVyXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1756719002);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_c_email_unique` (`c_email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `push_subscriptions`
--
ALTER TABLE `push_subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `push_subscriptions_endpoint_unique` (`endpoint`),
  ADD KEY `push_subscriptions_subscribable_type_subscribable_id_index` (`subscribable_type`,`subscribable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `push_subscriptions`
--
ALTER TABLE `push_subscriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
