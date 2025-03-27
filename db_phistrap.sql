-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2025 at 11:10 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_phistrap`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_09_231349_create_short_link_service_table', 1),
(5, '2025_03_09_231405_create_traping_url_table', 1),
(6, '2025_03_13_011934_create_phising_trap_modes_table', 1);

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
-- Table structure for table `phising_trap_modes`
--

CREATE TABLE `phising_trap_modes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phising_trap_modes`
--

INSERT INTO `phising_trap_modes` (`id`, `name`, `path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Video', '/web-phising/video', NULL, NULL, NULL),
(3, 'Hadiah', '-', NULL, NULL, NULL),
(5, 'Lowongan Pekerjaan', '/web-phising/job', NULL, NULL, NULL),
(6, 'Undangan Pernikahan', '-', NULL, NULL, NULL),
(7, 'Akses', '/web-phising/login', NULL, NULL, NULL),
(8, 'Info', '-', NULL, NULL, NULL),
(9, 'Pembaharuan', '/web-phising/update', NULL, NULL, NULL),
(10, 'Aplikasi', '/web-phising/application', NULL, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `short_link_service`
--

CREATE TABLE `short_link_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `func` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `short_link_service`
--

INSERT INTO `short_link_service` (`id`, `service_name`, `func`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bitly', 'Bitly::getUrl', NULL, NULL, NULL),
(2, 'Tinyurl', 'Tinyurl::getUrl', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `traping_url`
--

CREATE TABLE `traping_url` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `short_link_service_id` int(11) NOT NULL,
  `phising_trap_mode_id` int(11) NOT NULL,
  `url_source` varchar(255) NOT NULL,
  `url_custom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `traping_url`
--

INSERT INTO `traping_url` (`id`, `title`, `description`, `short_link_service_id`, `phising_trap_mode_id`, `url_source`, `url_custom`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test1', 'test1', 1, 9, 'https://google.com', 'https://bit.ly/3Fsr9Ja', NULL, '2025-03-26 20:28:35', '2025-03-26 20:28:35'),
(2, 'test2', 'test2', 1, 9, 'https://www.google.com', 'https://bit.ly/4ivieVC', NULL, '2025-03-26 20:28:40', '2025-03-26 20:28:40'),
(3, 'test3', 'test3', 1, 9, 'https://www.youtube.com', 'https://bit.ly/4bEF5vH', NULL, NULL, '2025-03-26 20:28:40'),
(4, 'Informasi CPSN Terbaru', 'Kunjungi link berikut ini untuk mendapatkan informasi lengkap mengenai pendaftaran CPNS', 1, 8, 'https://www.google.com', 'https://bit.ly/4ivieVC', NULL, NULL, '2025-03-26 20:28:40'),
(5, 'Test Disk', 'test', 1, 2, 'http://google.com', 'https://bit.ly/4iJQ3my', '2025-03-26 00:09:41', '2025-03-26 00:09:41', '2025-03-26 20:28:40'),
(6, 'Jebakan Aplikasi', 'Jebakan dengan jenis mengunduh aplikasi (apk)', 2, 10, 'https://phistrap.web.id/web-phising/application', 'https://bit.ly/43rBkrJ', '2025-03-26 20:36:33', '2025-03-26 20:36:33', NULL),
(7, 'Jebakan Video', 'Jebakan dengan jenis meminta pengguna melanjutkan login untuk melihat video', 2, 2, 'https://phistrap.web.id/web-phising/video', 'https://tinyurl.com/3ezmjrtc', '2025-03-27 03:44:45', '2025-03-27 03:44:47', NULL),
(8, 'Jebakan Loker', 'Jebakan dengan jenis meminta pengguna melakukan pengisian biodata lengkap, dan atas nama perusahaan tertentu', 2, 5, 'https://phistrap.web.id/web-phising/job', 'https://tinyurl.com/2kdy2usd', '2025-03-27 03:49:37', '2025-03-27 03:49:38', NULL),
(9, 'Jebakan Fake Login', 'Jebakan dengan jenis merupakan fake login dengan mengisi credential', 2, 7, 'https://phistrap.web.id/web-phising/login', 'https://tinyurl.com/nhx87vhk', '2025-03-27 03:51:12', '2025-03-27 03:51:14', NULL),
(10, 'Jebakan Update Browser Fake', 'Jebakan dengan jenis ini akan mengambil informasi ip address, dan lainnya', 2, 9, 'https://phistrap.web.id/web-phising/update', 'https://tinyurl.com/ycyaj5fw', '2025-03-27 03:52:03', '2025-03-27 03:52:05', NULL);

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@example.com', NULL, '$2y$12$4f3AgU6X2QljKxETh92s1enyFKHV26TmAlv4dr9ACMzEC501W668e', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`) USING BTREE;

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`) USING BTREE;

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING BTREE;

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `jobs_queue_index` (`queue`) USING BTREE;

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`) USING BTREE;

--
-- Indexes for table `phising_trap_modes`
--
ALTER TABLE `phising_trap_modes`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `sessions_user_id_index` (`user_id`) USING BTREE,
  ADD KEY `sessions_last_activity_index` (`last_activity`) USING BTREE;

--
-- Indexes for table `short_link_service`
--
ALTER TABLE `short_link_service`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `traping_url`
--
ALTER TABLE `traping_url`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `phising_trap_modes`
--
ALTER TABLE `phising_trap_modes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `short_link_service`
--
ALTER TABLE `short_link_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `traping_url`
--
ALTER TABLE `traping_url`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
