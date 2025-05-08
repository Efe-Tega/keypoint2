-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2025 at 08:54 AM
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
-- Database: `keypoint`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@gmail.com', '$2y$12$DnVyAmHcPqHbk8xMplqWI.mlF2AumntLPH7ks83/iRSmGd4Mo8ZZm', '2025-04-29 21:31:30', '2025-04-29 21:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `bank_infos`
--

CREATE TABLE `bank_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `acct_name` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `acct_no` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_infos`
--

INSERT INTO `bank_infos` (`id`, `user_id`, `acct_name`, `bank_name`, `acct_no`, `created_at`, `updated_at`) VALUES
(2, 2, NULL, NULL, NULL, NULL, NULL),
(3, 3, NULL, NULL, NULL, NULL, NULL);

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
-- Table structure for table `deposit_transactions`
--

CREATE TABLE `deposit_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `trans_id` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `status` enum('pending','paid','failed') NOT NULL DEFAULT 'pending',
  `paid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposit_transactions`
--

INSERT INTO `deposit_transactions` (`id`, `user_id`, `trans_id`, `amount`, `status`, `paid_at`, `created_at`, `updated_at`) VALUES
(15, 3, 'txn_6817c63fb524d', 2500.00, 'pending', NULL, '2025-05-04 19:55:43', '2025-05-04 19:55:43'),
(16, 3, 'txn_6817c8059a691', 3500.00, 'failed', NULL, '2025-05-04 20:03:17', '2025-05-04 20:05:30'),
(17, 3, 'txn_6817c9508652e', 5000.00, 'paid', NULL, '2025-05-04 20:08:48', '2025-05-04 20:09:12'),
(18, 3, 'txn_6817c9b3685df', 1500.00, 'failed', NULL, '2025-05-04 20:10:27', '2025-05-04 20:12:28'),
(19, 3, 'txn_6817ce1de7d49', 6200.00, 'paid', NULL, '2025-05-04 20:29:17', '2025-05-04 20:29:40'),
(20, 3, 'txn_6817ce90e687f', 2100.00, 'paid', NULL, '2025-05-04 20:31:12', '2025-05-04 20:31:33'),
(28, 3, 'txn_6817fcb84c942', 5500.00, 'failed', NULL, '2025-05-04 23:48:08', '2025-05-05 00:28:09'),
(29, 3, 'txn_6817fcd4a2ea7', 5500.00, 'failed', NULL, '2025-05-04 23:48:36', '2025-05-05 00:28:36'),
(30, 3, 'txn_6817fd1070e3c', 7200.00, 'paid', NULL, '2025-05-04 23:49:36', '2025-05-04 23:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `earnings`
--

CREATE TABLE `earnings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `yesterday_earning` int(11) NOT NULL DEFAULT 0,
  `today_earning` int(11) NOT NULL DEFAULT 0,
  `this_week_earning` int(11) NOT NULL DEFAULT 0,
  `this_month_earning` int(11) NOT NULL DEFAULT 0,
  `total_earning` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `earnings`
--

INSERT INTO `earnings` (`id`, `user_id`, `yesterday_earning`, `today_earning`, `this_week_earning`, `this_month_earning`, `total_earning`, `created_at`, `updated_at`) VALUES
(1, 2, 0, 0, 0, 0, 0, '2025-04-29 21:38:36', '2025-04-29 21:38:36'),
(2, 3, 0, 400, 0, 0, 0, '2025-04-29 21:39:37', '2025-05-05 00:32:32');

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
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) DEFAULT NULL,
  `upgrade_amount` varchar(255) DEFAULT NULL,
  `reward_amount` varchar(255) DEFAULT NULL,
  `daily_task` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level`, `upgrade_amount`, `reward_amount`, `daily_task`, `created_at`, `updated_at`) VALUES
(1, 'Internship', '0', '200', 1, '2025-04-29 22:17:43', NULL),
(2, 'VIP1', '22000', '200', 5, '2025-04-29 22:18:02', NULL),
(3, 'VIP2', '80000', '300', 10, '2025-04-29 22:18:13', NULL),
(4, 'VIP3', '396000', '748', 20, '2025-05-02 07:48:03', NULL),
(5, 'VIP4', '1200000', '1550', 30, '2025-05-02 07:48:54', NULL),
(6, 'VIP5', '2450000', '1950', 50, '2025-05-02 07:49:50', NULL),
(7, 'VIP6', '5100000', '2550', 80, '2025-05-02 07:50:27', NULL),
(8, 'VIP7', '10500000', '4500', 100, '2025-05-02 07:51:12', NULL),
(9, 'VIP8', '20000000', '5400', 160, '2025-05-02 07:51:48', NULL),
(10, 'VIP9', '40000000', '9000', 200, '2025-05-02 07:52:40', '2025-05-02 07:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `membership_lists`
--

CREATE TABLE `membership_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membership_lists`
--

INSERT INTO `membership_lists` (`id`, `image`, `phone`, `amount`, `created_at`, `updated_at`) VALUES
(1, NULL, '09158332261', '41005.74', '2025-04-29 21:30:58', '2025-04-29 21:30:58'),
(2, NULL, '08156476871', '33236.94', '2025-04-29 21:30:58', '2025-04-29 21:30:58'),
(3, NULL, '08001200247', '36497.56', '2025-04-29 21:30:58', '2025-04-29 21:30:58'),
(4, NULL, '08018054847', '21222.27', '2025-04-29 21:30:58', '2025-04-29 21:30:58'),
(5, NULL, '08133756248', '44706.53', '2025-04-29 21:30:58', '2025-04-29 21:30:58'),
(6, NULL, '08195087158', '33721.79', '2025-04-29 21:30:58', '2025-04-29 21:30:58'),
(7, NULL, '09167983484', '19005.17', '2025-04-29 21:30:58', '2025-04-29 21:30:58'),
(8, NULL, '07029481620', '26502.81', '2025-04-29 21:30:59', '2025-04-29 21:30:59'),
(9, NULL, '09117502224', '15463.23', '2025-04-29 21:30:59', '2025-04-29 21:30:59'),
(10, NULL, '09012830541', '25631.13', '2025-04-29 21:30:59', '2025-04-29 21:30:59'),
(11, NULL, '08117786850', '43631.22', '2025-04-29 21:30:59', '2025-04-29 21:30:59'),
(12, NULL, '09063208791', '42648.23', '2025-04-29 21:30:59', '2025-04-29 21:30:59'),
(13, NULL, '08123859991', '16209.08', '2025-04-29 21:30:59', '2025-04-29 21:30:59'),
(14, NULL, '09112879520', '43210.50', '2025-04-29 21:30:59', '2025-04-29 21:30:59'),
(15, NULL, '09141026331', '47379.26', '2025-04-29 21:30:59', '2025-04-29 21:30:59');

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
(2, '0001_01_01_000001_create_cache_table', 2),
(3, '0001_01_01_000002_create_jobs_table', 3),
(4, '2025_04_01_150839_create_admins_table', 4),
(5, '2025_04_12_120522_create_task_videos_table', 5),
(6, '2025_04_20_102420_create_bank_infos_table', 6),
(7, '2025_04_20_102820_create_wallets_table', 7),
(8, '2025_04_20_103507_create_earnings_table', 8),
(9, '2025_04_20_103735_create_user_tasks_table', 9),
(10, '2025_04_20_114952_create_levels_table', 10),
(11, '2025_04_24_061525_create_membership_lists_table', 11),
(12, '2025_04_28_094715_create_watched_videos_table', 12),
(13, '2025_04_29_234453_create_pending_tasks_table', 13),
(14, '2025_04_27_134954_create_deposit_transactions_table', 14);

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
-- Table structure for table `pending_tasks`
--

CREATE TABLE `pending_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `task_video_id` bigint(20) UNSIGNED DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('5lT7tjKrVeRcFcFmNl5xS9g9RHBuFMWbdrTIJvCP', 3, '172.20.10.2', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.6 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMGZBM1hudGtjbUN3Tm9yYjB6QUJjY1FZTWRrZEhmYTk0VVBJeTRxTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xNzIuMjAuMTAuMi91c2VyLXdhbGxldCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1746397160),
('CGgAtZyfJTjCu6ACNRdaZ4GjKwBbsClNsGJt8aPE', 3, '172.20.10.3', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRnVPeDdOaU5YSjZEQVJJMnB5d3JWR3VhbWtvZUJmcnJvakd6SXd6SiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xNzIuMjAuMTAuMi91c2VyLXdhbGxldCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1746397173),
('JbxZqx72hPowsXPCIMgNZdw79dpklHibKcRYwGok', 3, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.6 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUXJlenFubmFFU3czREFNOGZhWXY1eUZIZ0VCZ05ERTBzSENHMDNSRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90YXNrIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1746405155);

-- --------------------------------------------------------

--
-- Table structure for table `task_videos`
--

CREATE TABLE `task_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED DEFAULT NULL,
  `movie_title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_videos`
--

INSERT INTO `task_videos` (`id`, `level_id`, `movie_title`, `slug`, `thumbnail`, `video_url`, `summary`, `created_at`, `updated_at`) VALUES
(1, 1, 'Argylle', 'argylle', 'uploads/images/compressed_argylle.png', 'uploads/videos/compressed_argylle.mp4', NULL, '2025-04-28 12:54:11', NULL),
(2, 1, 'Hidden Strike', 'hidden-strike', 'uploads/images/compressed_hidden-strike.png', 'uploads/videos/compressed_hidden-strike.mp4', NULL, '2025-04-28 13:07:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `referral_code` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remaining_task` int(11) NOT NULL DEFAULT 10,
  `task_completed` int(11) NOT NULL DEFAULT 0,
  `withdraw_status` tinyint(4) NOT NULL DEFAULT 1,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `level_id`, `fullname`, `email`, `email_verified_at`, `profile_pic`, `referral_code`, `status`, `remaining_task`, `task_completed`, `withdraw_status`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, 'efetega@gmail.com', NULL, NULL, 'WEU2NB85', 1, 10, 0, 1, '09136076047', '$2y$12$VUYoeqjZl8kGw.bePLvWqe2oKVyO.UtmTdtpbJYGldSq28tJiw2S2', NULL, '2025-04-29 21:38:36', NULL),
(3, 1, NULL, 'user@gmail.com', NULL, NULL, 'H9JFCNJW', 1, 5, 5, 1, '9066269044', '$2y$12$mvhrALM770dgsXmjHNtlveGTUj2lHxlSA2KeAHXw/gj8tUwEJTaze', NULL, '2025-04-29 21:39:37', '2025-05-05 00:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_tasks`
--

CREATE TABLE `user_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `today_task_completed` tinyint(4) NOT NULL DEFAULT 0,
  `today_task_remain` tinyint(4) NOT NULL DEFAULT 0,
  `task_reward` tinyint(4) NOT NULL DEFAULT 0,
  `referral_reward` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_tasks`
--

INSERT INTO `user_tasks` (`id`, `user_id`, `today_task_completed`, `today_task_remain`, `task_reward`, `referral_reward`, `created_at`, `updated_at`) VALUES
(1, 2, 0, 0, 0, 0, '2025-04-29 21:38:36', '2025-04-29 21:38:36'),
(2, 3, 0, 0, 0, 0, '2025-04-29 21:39:37', '2025-04-29 21:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `acct_bal` int(11) NOT NULL DEFAULT 0,
  `main_wallet` int(11) NOT NULL DEFAULT 0,
  `com_wallet` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `acct_bal`, `main_wallet`, `com_wallet`, `created_at`, `updated_at`) VALUES
(1, 2, 0, 0, 0, '2025-04-29 21:38:36', '2025-04-29 21:38:36'),
(2, 3, 90200, 0, 0, '2025-04-29 21:39:37', '2025-05-04 23:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `watched_videos`
--

CREATE TABLE `watched_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `task_video_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `watched_videos`
--

INSERT INTO `watched_videos` (`id`, `user_id`, `task_video_id`, `created_at`, `updated_at`) VALUES
(7, 3, 2, '2025-05-05 00:32:32', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_infos`
--
ALTER TABLE `bank_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_infos_user_id_foreign` (`user_id`);

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
-- Indexes for table `deposit_transactions`
--
ALTER TABLE `deposit_transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `deposit_transactions_trans_id_unique` (`trans_id`);

--
-- Indexes for table `earnings`
--
ALTER TABLE `earnings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `earnings_user_id_foreign` (`user_id`);

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
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_lists`
--
ALTER TABLE `membership_lists`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pending_tasks`
--
ALTER TABLE `pending_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `task_videos`
--
ALTER TABLE `task_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_tasks`
--
ALTER TABLE `user_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallets_user_id_foreign` (`user_id`);

--
-- Indexes for table `watched_videos`
--
ALTER TABLE `watched_videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_infos`
--
ALTER TABLE `bank_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deposit_transactions`
--
ALTER TABLE `deposit_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `earnings`
--
ALTER TABLE `earnings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `membership_lists`
--
ALTER TABLE `membership_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pending_tasks`
--
ALTER TABLE `pending_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `task_videos`
--
ALTER TABLE `task_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_tasks`
--
ALTER TABLE `user_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `watched_videos`
--
ALTER TABLE `watched_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_infos`
--
ALTER TABLE `bank_infos`
  ADD CONSTRAINT `bank_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `earnings`
--
ALTER TABLE `earnings`
  ADD CONSTRAINT `earnings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
