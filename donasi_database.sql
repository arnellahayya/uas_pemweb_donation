-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 09:35 AM
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
-- Database: `donasi_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `donaturs`
--

CREATE TABLE `donaturs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `total_donasi` bigint(20) NOT NULL,
  `tipe_bayar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donaturs`
--

INSERT INTO `donaturs` (`id`, `nama`, `pesan`, `total_donasi`, `tipe_bayar`, `created_at`, `updated_at`) VALUES
(1, 'apil', 'semangat', 100000, 'Dana', '2024-12-02 00:38:57', '2024-12-02 01:06:00'),
(2, 'Anonim', 'Ini adalah contoh pesan!', 500000, 'BCA Virtual Account', '2024-12-02 00:38:57', '2024-12-02 00:38:57'),
(4, 'pyo', 'semoga bermanfaat', 1000000, 'BCA Virtual Account', '2024-12-02 01:03:00', '2024-12-02 01:05:28');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '2024_05_29_160306_create_donaturs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1sWC5Z5gmaqEvyuDnQXIewKVhIxRdLnMA9ron7Jr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV09mb25tUW01Qkl4N1RBTmcxQWQxcGZYUVFYdTlQcDNtaEhhaEk4QSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly91YXNfcGVtd2ViX2RvbmF0aW9uLnRlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1733127945),
('65yvBjroPTCcGfqEzNCWOI45ZEXPDDK7DuVXgHsK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.10.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS2JxSmZ2bXRSOG40d1pyVms1aU9wYnF6emxhRUJIM3BRd3lQb1NGbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly91YXNfcGVtd2ViX2RvbmF0aW9uLnRlc3QvP2hlcmQ9cHJldmlldyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1733127452),
('S3F5bO4UwwJH5iJZlMVDLC2GyKEZIJ6oj1PtqRiK', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia3Z5WjNCalpJc0JqcXMzNGxKYVJqOUJoa2ZGMnlXYUM4Q2pwMTdPVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kb25hc2kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1733126834);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenisAkun` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `jenisAkun`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, '$2y$12$SB7TbdArJRWGuvIqK89Q4uvP.mrO/buyfOEleQ7JmAZ0g3yIKjXgO', NULL, NULL, NULL),
(2, 'guest', 'akuntamu', NULL, '$2y$12$MIA27mCoaWk.jLMQXhvSYewcyWlHGla6ywhCoc/JwL0mHygzTOq.a', NULL, NULL, NULL),
(3, 'guest', 'hao', NULL, '$2y$12$rTutAX.zfOdnxBFQOg8IMerhYiEcpR/7mEh9uwVp.KM3Rupv7ireO', NULL, '2024-12-02 00:42:27', '2024-12-02 00:42:27'),
(4, 'admin', 'user', NULL, '$2a$04$2W1WE96t1QbAD5e0Gbz.mejBP32ivUyecNkKHUIZgEfri4zroyN8O', '1234', NULL, NULL),
(5, 'guest', 'pyo', NULL, '$2y$12$NFNstJ.wnjHg16fB0DGAJewKQQ/hTo8Mew0ehz.7vB8ryf7AWHJiK', NULL, '2024-12-02 01:02:17', '2024-12-02 01:02:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donaturs`
--
ALTER TABLE `donaturs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donaturs`
--
ALTER TABLE `donaturs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
