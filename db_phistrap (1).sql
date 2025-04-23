-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2025 at 11:03 AM
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
  `desc` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phising_trap_modes`
--

INSERT INTO `phising_trap_modes` (`id`, `name`, `path`, `desc`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Video', '/web-phising/video', '{\n    \"data\": [\n        {\n            \"kode\": \"1\",\n            \"narasi\": \"<p>Narasi: Video Viral Selebriti,</p><br><br><p>Video ini lagi heboh banget di media sosial tapi udah banyak yang di-take down! Artis terkenal ketahuan melakukan hal mengejutkan di tempat umum. Jangan sampai kamu jadi yang terakhir nonton!</p><br><br><p>👉 Klik link ini untuk melihat videonya: <span id=\'link\'>[bit.ly/VideoViralTerbaru]</span></p><br><br><p>Link ini hanya aktif 24 jam!</p>\"\n        },\n        {\n            \"kode\": \"2\",\n            \"narasi\": \"<p>Narasi: Video Kejadian Aneh dan Ajaib,</p><br><br><p>Sebuah kejadian aneh terekam jelas di CCTV kantor di Surabaya. Banyak yang bilang ini hoax, tapi videonya asli dan bikin bulu kuduk berdiri!</p><br><br><p>👉 Tonton videonya di sini: <span id=\'link\'>[bit.ly/VideoViralTerbaru]</span></p><br><br><p>Hanya untuk yang berani! Jangan dibuka sendirian.</p>\"\n        }\n    ]\n}', NULL, NULL, NULL),
(3, 'Hadiah', '-', '{\n    \"data\": [\n        {\n            \"kode\": \"1\",\n            \"narasi\": \"<p>Null</p>\"\n        }\n    ]\n}', NULL, NULL, NULL),
(5, 'Lowongan Pekerjaan', '/web-phising/job', '{\n    \"data\": [\n        {\n            \"kode\": \"1\",\n            \"narasi\": \"<p>Null</p>\"\n        }\n    ]\n}', NULL, NULL, NULL),
(6, 'Undangan Pernikahan', '-', '{\n    \"data\": [\n        {\n            \"kode\": \"1\",\n            \"narasi\": \"<p>Null</p>\"\n        }\n    ]\n}', NULL, NULL, NULL),
(7, 'Akses', '/web-phising/login', '{\n    \"data\": [\n        {\n            \"kode\": \"1\",\n            \"narasi\": \"<p>Narasi: Aktivitas Ganda Terdeteksi,</p><br><br><p>Halo,</p><br><br><p>Kami mendeteksi login dari perangkat yang tidak dikenali. Untuk keamanan akun Anda, sesi Anda telah keluar.</p><br><br><p>👉 Silakan login ulang untuk melanjutkan:</p><br><br><p>🔐 <span id=\'link\'>[bit.ly/VideoViralTerbaru]</span></p><br><br><p>Jika ini bukan Anda, segera ubah kata sandi Anda setelah login.</p><br><br><p>Terima kasih,</p><br><br><p>Tim Keamanan Facebook</p>\"\n        },\n        {\n            \"kode\": \"2\",\n            \"narasi\": \"<p>\'Kamu ada di video ini! 😱 Temanmu tag kamu barusan. Lihat deh!\'</p><br><br><p>🎬 <span id=\'link\'>[bit.ly/VideoViralTerbaru]</span></p><br><br><p>Kamu harus login Facebook dulu buat bisa lihat videonya. Ini viral banget lho!</p>\"\n        }\n    ]\n}', NULL, NULL, NULL),
(8, 'Info', '-', '{\n    \"data\": [\n        {\n            \"kode\": \"1\",\n            \"narasi\": \"<p>Null</p>\"\n        }\n    ]\n}', NULL, NULL, NULL),
(9, 'Pembaharuan', '/web-phising/update', '{\n    \"data\": [\n        {\n            \"kode\": \"1\",\n            \"narasi\": \"<p>Null</p>\"\n        }\n    ]\n}', NULL, NULL, NULL),
(10, 'Aplikasi', '/web-phising/application', '{\n    \"data\": [\n        {\n            \"kode\": \"1\",\n            \"narasi\": \"<p>Null</p>\"\n        }\n    ]\n}', NULL, NULL, NULL);

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
(1, 'Bitly', 'Bitly::getUrl', NULL, NULL, '2025-03-28 07:40:00'),
(2, 'Tinyurl', 'Tinyurl::getUrl', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `id` int(11) NOT NULL,
  `target` text DEFAULT NULL,
  `count_target` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `target`
--

INSERT INTO `target` (`id`, `target`, `count_target`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'grub keluarga', 99, '2025-04-18 11:06:31', '2025-04-18 13:56:41', NULL),
(2, 'grup testingan', 997, '2025-04-18 13:37:09', '2025-04-18 13:59:24', NULL),
(3, 'grub oke', 1, '2025-04-18 14:26:47', '2025-04-18 14:26:47', NULL);

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
(6, 'Jebakan Aplikasi', 'Jebakan dengan jenis ini mengunduh aplikasi (apk)', 2, 10, 'https://phistrap.web.id/web-phising/application', 'https://bit.ly/43rBkrJ', '2025-03-26 20:36:33', '2025-03-26 20:36:33', NULL),
(7, 'Jebakan Video', 'Jebakan dengan jenis ini meminta pengguna melanjutkan login untuk melihat video', 2, 2, 'https://phistrap.web.id/web-phising/video', 'https://tinyurl.com/3ezmjrtc', '2025-03-27 03:44:45', '2025-03-27 03:44:47', NULL),
(8, 'Jebakan Loker', 'Jebakan dengan jenis ini meminta pengguna melakukan pengisian biodata lengkap, dan atas nama perusahaan tertentu', 2, 5, 'https://phistrap.web.id/web-phising/job', 'https://tinyurl.com/2kdy2usd', '2025-03-27 03:49:37', '2025-03-27 03:49:38', NULL),
(9, 'Jebakan Fake Login', 'Jebakan dengan jenis ini merupakan fake login dengan mengisi credential', 2, 7, 'https://phistrap.web.id/web-phising/login', 'https://tinyurl.com/nhx87vhk', '2025-03-27 03:51:12', '2025-03-27 03:51:14', NULL),
(10, 'Jebakan Update Browser Fake', 'Jebakan dengan jenis ini akan mengambil informasi ip address, dan lainnya', 2, 9, 'https://phistrap.web.id/web-phising/update', 'https://tinyurl.com/ycyaj5fw', '2025-03-27 03:52:03', '2025-03-27 03:52:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `traping_url_monitoring`
--

CREATE TABLE `traping_url_monitoring` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `target_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `short_link_service_id` int(11) NOT NULL,
  `phising_trap_mode_id` int(11) NOT NULL,
  `url_source` varchar(255) NOT NULL,
  `url_custom` varchar(255) NOT NULL,
  `url_short` varchar(255) NOT NULL,
  `count_access` varchar(255) NOT NULL,
  `count_form_access` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `traping_url_monitoring`
--

INSERT INTO `traping_url_monitoring` (`id`, `target_id`, `title`, `description`, `short_link_service_id`, `phising_trap_mode_id`, `url_source`, `url_custom`, `url_short`, `count_access`, `count_form_access`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, NULL, 'Tester1', 'test1', 2, 9, 'https://phistrap.web.id/web-phising/update', 'https://phistrap.web.id/trap/c841y0ml9kpd3f15ad4xpe', 'https://tinyurl.com/22gmfktn', '3', '-', '2025-03-28 00:40:25', '2025-04-07 19:07:03', '2025-04-07 19:07:03'),
(5, NULL, 'Grup Keluarga', 'Jebakan dengan target grup keluarga', 2, 5, 'https://phistrap.web.id/web-phising/job', 'https://phistrap.web.id/trap/x22qqy2ktqkvfxav003dpd', 'https://tinyurl.com/28llmcvc', '5', '2', '2025-03-28 19:34:47', '2025-04-07 19:06:57', '2025-04-07 19:06:57'),
(6, NULL, 'Grup Dinas', '-', 2, 2, 'https://phistrap.web.id/web-phising/video', 'https://phistrap.web.id/trap/46r8ny652ta5r2ax9xz96', 'https://tinyurl.com/297l2vvq', '0', '0', '2025-04-07 19:05:32', '2025-04-07 19:05:50', '2025-04-07 19:05:50'),
(7, NULL, 'Grup Dinas', '-', 2, 2, 'https://phistrap.web.id/web-phising/video', 'https://phistrap.web.id/trap/46r8ny652ta5r2ax9xz96', 'https://tinyurl.com/297l2vvq', '1', '1', '2025-04-07 19:05:32', '2025-04-07 19:06:53', '2025-04-07 19:06:53'),
(8, NULL, 'Grup Pegawai', 'Grup Pegawai Dinas XYZ', 2, 10, 'https://phistrap.web.id/web-phising/application', 'https://phistrap.web.id/trap/8twhr32eswfjtwq3028xj8', 'https://tinyurl.com/23n3zlvs', '5', '-', '2025-04-07 19:11:26', '2025-04-09 00:22:42', '2025-04-09 00:22:42'),
(9, NULL, 'Grup Keluarga', '-', 2, 2, 'https://phistrap.web.id/web-phising/video', 'https://phistrap.web.id/trap/ejttqaub5ghu2vb93zp0m', 'https://tinyurl.com/22kqsnm6', '1', '1', '2025-04-07 19:13:07', '2025-04-07 19:32:07', '2025-04-07 19:32:07'),
(10, 1, 'Grup Dinas', 'Edukasi Phising Warga Sekolah', 2, 2, 'https://phistrap.web.id/web-phising/video', 'https://phistrap.web.id/trap/zbeqv4h07na5jda4tzk0i', 'https://tinyurl.com/286z28lw', '20', '10', '2025-04-09 00:22:35', '2025-04-18 07:21:53', '2025-04-18 07:21:53'),
(11, 1, 'Grup Sekolah', 'Edukasi Phising Warga Sekolah', 2, 2, 'https://phistrap.web.id/web-phising/video', 'https://phistrap.web.id/trap/zbeqv4h07na5jda4tzk0i', 'https://tinyurl.com/286z28lw', '66', '20', '2025-04-09 00:22:35', '2025-04-12 06:09:16', NULL),
(12, 2, '-', 'tester', 2, 7, 'http://127.0.0.1:8001/web-phising/login', 'https://phistrap.web.id/trap/vxu0wwp8jkodt8mgdaqg4d', 'https://tinyurl.com/2agrgayf', '0', '0', '2025-04-18 06:40:20', '2025-04-18 06:40:20', NULL),
(13, 1, '-', 'Narasi: Video Viral Selebriti Ariel\n\nVideo ini lagi heboh banget di media sosial tapi udah banyak yang di-take down! Artis terkenal ketahuan melakukan hal mengejutkan di tempat umum. Jangan sampai kamu jadi yang terakhir nonton!\n\n👉 Klik link ini untuk melihat videonya: [Link belum digenerate]\n\nLink ini hanya aktif 24 jam!', 2, 2, 'http://localhost:8000/web-phising/video', 'https://phistrap.web.id/trap/xrazvsko9p22514nifw2u', 'https://tinyurl.com/2dbf242g', '0', '0', '2025-04-22 08:58:00', '2025-04-22 08:58:00', NULL),
(14, 1, '-', 'Narasi: Video Viral Selebriti Syahrini\n\nVideo ini lagi heboh banget di media sosial tapi udah banyak yang di-take down! Artis terkenal ketahuan melakukan hal mengejutkan di tempat umum. Jangan sampai kamu jadi yang terakhir nonton!\n\n👉 Klik link ini untuk melihat videonya: https://phistrap.web.id/trap/fyt446vg4if5a3awbd26l\n\nLink ini hanya aktif 24 jam!', 2, 2, 'http://localhost:8000/web-phising/video', 'https://phistrap.web.id/trap/fyt446vg4if5a3awbd26l', 'https://tinyurl.com/282eg63e', '0', '0', '2025-04-22 09:00:06', '2025-04-22 09:00:06', NULL);

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
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `traping_url`
--
ALTER TABLE `traping_url`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `traping_url_monitoring`
--
ALTER TABLE `traping_url_monitoring`
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
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `traping_url`
--
ALTER TABLE `traping_url`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `traping_url_monitoring`
--
ALTER TABLE `traping_url_monitoring`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
