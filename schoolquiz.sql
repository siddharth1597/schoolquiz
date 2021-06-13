-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 11:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolquiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_uses`
--

CREATE TABLE `contact_uses` (
  `id` int(10) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `designation` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `pincode` int(10) DEFAULT NULL,
  `whatsapp_no` bigint(11) DEFAULT NULL,
  `phone_no` bigint(11) DEFAULT NULL,
  `home_icon` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_uses`
--

INSERT INTO `contact_uses` (`id`, `role`, `title`, `name`, `designation`, `email`, `address`, `city`, `pincode`, `whatsapp_no`, `phone_no`, `home_icon`, `profile_image`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Innovation', 'Siddharth Rastogi', 'Developer', 'sidd15597@gmail.com', 'Hno 93 Ballabh street Mandi chowk near Dr. Pushpendra', 'Moradabad', 244001, 8938052752, 8938052752, NULL, NULL, '2021-06-10 14:12:01', '2021-06-13 14:46:57');

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
(5, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(6, '2021_05_29_191607_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_creates`
--

CREATE TABLE `quiz_creates` (
  `id` int(10) NOT NULL,
  `set_no` int(10) NOT NULL,
  `question_no` int(10) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `option1` varchar(500) NOT NULL,
  `option2` varchar(500) NOT NULL,
  `option3` varchar(500) NOT NULL,
  `option4` varchar(500) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `media_file` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_creates`
--

INSERT INTO `quiz_creates` (`id`, `set_no`, `question_no`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `media_file`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'What is the capital of India', 'Delhi', 'Moradabad', 'Mumbai', 'Bengaluru', 'A', '/uploads/Quiz_Media/Media_s1_q1.jpg', '2021-06-12 11:46:57', '2021-06-12 11:46:57'),
(3, 1, 2, 'What is the capital of UP?', 'Bareilly', 'Moradabad', 'Lucknow', 'noida', 'C', '/uploads/Quiz_Media/Media_s1_q2.jpg', '2021-06-12 11:48:16', '2021-06-12 11:48:16'),
(4, 1, 3, 'how many meters are in the 2 kilometers', '1000m', '200m', '20000m', '2000m', 'D', '/uploads/Quiz_Media/Media_s1_q3.mp4', '2021-06-12 11:50:10', '2021-06-12 11:50:10'),
(16, 2, 1, 'What is your name?', 'Siddharth', 'Sanjeev', 'Rekha', 'Shivani', 'A', '/uploads/Quiz_Media/Media_s2_q1.png', '2021-06-13 12:03:00', '2021-06-13 12:03:00'),
(17, 2, 2, 'What is the full form of CSE ?', 'Computer Source Engineer', 'Computer Science Electronics', 'Computer Science Engineering', 'Current Science Electrons', 'C', '/uploads/Quiz_Media/Media_s2_q2.png', '2021-06-13 12:04:02', '2021-06-13 12:07:57'),
(18, 2, 3, 'what is the capital of Maharashtra?', 'Delhi', 'Bangalore', 'Chennai', 'Mumbai', 'D', '', '2021-06-13 12:09:10', '2021-06-13 12:09:10'),
(32, 3, 1, 'jkjlkjl', 'popkpo', '200m', 'Chennai', 'Mumbai', 'B', '', '2021-06-13 14:24:27', '2021-06-13 14:24:27'),
(33, 4, 1, 'uygyug', '1000m', 'Bangalore', 'Chennai', 'ghddj ggh jh', 'B', '', '2021-06-13 14:33:11', '2021-06-13 14:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_sets`
--

CREATE TABLE `quiz_sets` (
  `id` int(10) NOT NULL,
  `set_no` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_sets`
--

INSERT INTO `quiz_sets` (`id`, `set_no`, `created_at`, `updated_at`) VALUES
(3, 1, '2021-06-12 11:50:11', '2021-06-12 11:50:11'),
(9, 2, '2021-06-13 12:09:10', '2021-06-13 12:09:10'),
(17, 3, '2021-06-13 14:24:28', '2021-06-13 14:24:28'),
(19, 4, '2021-06-13 14:33:11', '2021-06-13 14:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('82xEynsUaVh3kDSzbhyrSyzz6RUrGtHRRXdygd8j', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoienBoTG9WcnB0aHhyUWRVWmJFSmZOeUhhUVJlYzl4ZDhRY25qWTh4TCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkQmNvNTgzNUIvekZHWlhhZjY3V01WdWh4MUVPd3FPZFJXOUtoOGZqekMyZi5tUzVwUnJlQ1ciO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJEJjbzU4MzVCL3pGR1pYYWY2N1dNVnVoeDFFT3dxT2RSVzlLaDhmanpDMmYubVM1cFJyZUNXIjt9', 1623618488);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'super_admin',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@myschoolquiz.in', NULL, '$2y$10$Bco5835B/zFGZXaf67WMVuhx1EOwqOdRW9Kh8fjzC2f.mS5pRreCW', NULL, NULL, 'E01olgcp4pfleOtpcBXjhy0PJMkoIhiaGTGIzwePtIyEt2yuSoeN4U3WjkpQ', '2021-05-29 14:00:48', '2021-05-29 14:00:48'),
(8, 'Siddharth Rastogi', 'super_admin', 'sidd15597@gmail.com', NULL, '$2y$10$QMAgqwtm2B6KtQ/ADjDBRO8FTJAYiCIoXiLKpP2uRV/tnzC22TgN.', NULL, NULL, NULL, '2021-06-05 03:41:53', '2021-06-05 03:41:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_uses`
--
ALTER TABLE `contact_uses`
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
-- Indexes for table `quiz_creates`
--
ALTER TABLE `quiz_creates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_sets`
--
ALTER TABLE `quiz_sets`
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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_uses`
--
ALTER TABLE `contact_uses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_creates`
--
ALTER TABLE `quiz_creates`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `quiz_sets`
--
ALTER TABLE `quiz_sets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
