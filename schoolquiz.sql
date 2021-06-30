-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 10:45 PM
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
(1, 'admin', 'Innovation of SidTechTalks', 'Siddharth Rastogi', 'Full Stack developer', 'sidd15597@gmail.com', 'Ballabh street Mandi chowk', 'Moradabad', 244001, 8938052752, 8938052752, '/uploads/Contact_us/icon_oi2lfy.png', '/uploads/Contact_us/profile_xJnIQB.jpg', '2021-06-10 14:12:01', '2021-06-30 09:59:39');

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
(46, 1, 1, 'what is the capital of India?', 'Delhi', 'Bangalore', 'Chennai', 'Mumbai', 'A', '', '2021-06-20 12:38:00', '2021-06-30 15:01:20'),
(47, 1, 2, 'what is the capital of UP?', 'Moradabad', 'Meerut', 'Lucknow', 'Rampur', 'C', '/uploads/Quiz_Media/Media_s1_q2.jpg', '2021-06-20 12:39:29', '2021-06-30 15:01:25'),
(48, 1, 3, 'Who is the PM of India?', 'Rahul', 'Rajendra', 'Manhoman', 'Modi', 'D', '', '2021-06-20 12:40:11', '2021-06-30 14:50:32'),
(49, 1, 4, 'What is the name of country where first covid case found?', 'China', 'India', 'UAE', 'Israel', 'A', '/uploads/Quiz_Media/Media_s1_q4.jpg', '2021-06-20 12:41:38', '2021-06-30 14:50:42'),
(50, 2, 1, 'What is CS?', 'Controller Science', 'Computer Arhitect', 'Computer Science and Eng', 'Counter Strike', 'C', '', '2021-06-20 12:44:24', '2021-06-20 12:44:24'),
(51, 2, 2, 'how many mts are in 1km ?', '1000m', '200m', '20000m', '2000m', 'A', '', '2021-06-20 12:45:11', '2021-06-20 12:45:11'),
(52, 2, 3, 'Which is the first programming language?', 'Java', 'Javascript', 'c', 'c++', 'C', '/uploads/Quiz_Media/Media_s2_q3.jpg', '2021-06-20 12:47:44', '2021-06-20 12:47:44'),
(53, 2, 4, 'what is the statement used for conditions in a programming language?', 'while', 'if', 'else', 'for', 'B', '', '2021-06-20 12:48:36', '2021-06-20 12:48:36'),
(54, 1, 5, 'Which one of the following river flows between Vindhyan and Satpura ranges?', 'Narmada', 'Mahanadi', 'Son', 'Netravati', 'A', '', '2021-06-27 04:23:26', '2021-06-27 04:23:26'),
(55, 1, 6, 'The Central Rice Research Station is situated in?', 'Chennai', 'Cuttack', 'Bangalore', 'Quilon', 'B', '/uploads/Quiz_Media/Media_s1_q6.jpg', '2021-06-27 04:24:10', '2021-06-27 04:24:10'),
(56, 1, 7, 'Who among the following wrote Sanskrit grammar?', 'Kalidasa', 'Charak', 'Panini', 'Aryabhatt', 'C', '', '2021-06-27 04:24:43', '2021-06-27 04:24:43'),
(57, 1, 8, 'Which among the following headstreams meets the Ganges in last?', 'Alaknanda', 'Pindar', 'Mandakini', 'Bhagirathi', 'D', '/uploads/Quiz_Media/Media_s1_q8.jpg', '2021-06-27 04:25:25', '2021-06-27 04:25:25'),
(58, 1, 9, 'The metal whose salts are sensitive to light is?', 'Zinc', 'Silver', 'Copper', 'Aluminum', 'B', '', '2021-06-27 04:26:04', '2021-06-27 04:26:04'),
(59, 1, 10, 'Patanjali is well known for the compilation of –', 'Yoga Sutra', 'Panchatantra', 'Brahma Sutra', 'Ayurveda', 'A', '', '2021-06-27 04:26:51', '2021-06-27 04:26:51'),
(60, 1, 11, 'Which one of the following rivers originates in Brahmagiri range of Western Ghats?', 'Pennar', 'Cauvery', 'Krishna', 'Tapti', 'B', '', '2021-06-27 04:27:32', '2021-06-27 04:27:32'),
(61, 1, 12, 'The country that has the highest in Barley Production?', 'China', 'India', 'Russia', 'France', 'C', '', '2021-06-27 04:27:58', '2021-06-27 04:27:58'),
(62, 1, 13, 'Tsunamis are not caused by', 'Hurricanes', 'Earthquakes', 'Undersea landslides', 'Volcanic eruptions', 'A', '/uploads/Quiz_Media/Media_s1_q13.jpg', '2021-06-27 04:28:39', '2021-06-27 04:28:39'),
(63, 1, 14, 'Chambal river is a part of –', 'Sabarmati basin', 'Ganga basin', 'Narmada basin', 'Godavari basin', 'C', '', '2021-06-27 04:30:07', '2021-06-27 04:30:07'),
(64, 1, 15, 'D.D.T. was invented by?', 'Mosley', 'Rudolf', 'Karl Benz', 'Dalton', 'A', '/uploads/Quiz_Media/Media_s1_q15.jpg', '2021-06-27 04:30:41', '2021-06-27 04:30:41'),
(65, 1, 16, 'Indus river originates in –', 'Kinnaur', 'Ladakh', 'Nepal', 'Tibet', 'D', '', '2021-06-27 04:31:16', '2021-06-27 04:31:16'),
(66, 1, 17, 'The hottest planet in the solar system?', 'Mercury', 'Venus', 'Mars', 'Jupiter', 'B', '', '2021-06-27 04:31:41', '2021-06-27 04:31:41'),
(67, 1, 18, 'With which of the following rivers does Chambal river merge?', 'Banas', 'Ganga', 'Narmada', 'Yamuna', 'D', '', '2021-06-27 04:32:14', '2021-06-27 04:32:14'),
(68, 1, 19, 'Where was the electricity supply first introduced in India –', 'Mumbai', 'Dehradun', 'Darjeeling', 'Chennai', 'C', '/uploads/Quiz_Media/Media_s1_q19.jpg', '2021-06-27 04:33:05', '2021-06-27 04:33:05'),
(69, 1, 20, 'Which one of the following ports is the oldest port in India?', 'Mumbai Port', 'Chennai Port', 'Kolkata Port', 'Vishakhapatnam Port', 'B', '', '2021-06-27 04:35:12', '2021-06-27 04:35:12'),
(70, 1, 21, 'Which of the following is not a nuclear power center?', 'Narora', 'Kota', 'Chamera', 'Kakrapara', 'C', '', '2021-06-27 04:35:41', '2021-06-27 04:35:41'),
(71, 1, 22, 'For the Olympics and World Tournaments, the dimensions of basketball court are', '27 m x 16 m', '28 m x 15 m', '26 m x 14 m', '28 m x 16 m', 'B', '', '2021-06-27 04:36:21', '2021-06-27 04:36:21'),
(72, 1, 23, 'Film and TV institute of India is located at', 'Pune (Maharashtra)', 'Pimpri (Maharashtra)', 'Perambur (Tamilnadu)', 'Rajkot (Gujarat)', 'A', '/uploads/Quiz_Media/Media_s1_q23.jpg', '2021-06-27 04:37:01', '2021-06-27 04:37:01'),
(73, 1, 24, 'The biggest part of the brain is', 'Spinal cord', 'Cerebellum', 'Cerebrum', 'Brain Stem', 'C', '/uploads/Quiz_Media/Media_s1_q24.jpg', '2021-06-27 04:39:56', '2021-06-30 10:40:43'),
(74, 1, 25, 'At room temperature, which is the only metal that is in liquid form?', 'Iron', 'Aluminum', 'Mercury', 'Silver', 'C', '/uploads/Quiz_Media/Media_s1_q25.jpg', '2021-06-27 04:40:51', '2021-06-27 04:40:51'),
(75, 1, 26, 'Which is the country which has the Great Barrier Reef?', 'London', 'Australia', 'Ireland', 'New Zealand', 'B', '', '2021-06-27 04:41:29', '2021-06-27 04:41:29'),
(76, 1, 27, 'Which of the following Company buy eBay’s Indian operation?', 'Amazon', 'Flipkart', 'Snapdeal', 'PayTM', 'B', '/uploads/Quiz_Media/Media_s1_q27.jpg', '2021-06-27 04:42:28', '2021-06-27 04:42:28'),
(77, 1, 28, 'The unit of electrical resistance of a conductor is—', 'farad', 'volt', 'ampere', 'ohm', 'D', '/uploads/Quiz_Media/Media_s1_q27.jpg', '2021-06-27 04:43:22', '2021-06-27 04:43:22'),
(78, 1, 29, 'Which of the following countries has approved world’s first dengue vaccine?', 'United Kingdom', 'Canada', 'Mexico', 'France', 'C', '', '2021-06-27 04:44:03', '2021-06-27 04:44:03'),
(79, 1, 30, 'Which of the following is the largest air pollutant?', 'Carbon dioxide', 'Carbon monoxide', 'Sulphur dioxide', 'Hydrocarbons', 'B', '/uploads/Quiz_Media/Media_s1_q30.jpg', '2021-06-27 04:44:51', '2021-06-30 10:46:19');

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
(27, 1, '2021-06-20 12:41:38', '2021-06-20 12:41:38'),
(29, 2, '2021-06-20 12:48:36', '2021-06-20 12:48:36');

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
('CBo4RaMkXaZwkig9YIkeNYiezWUU9ksQd9dgXKZp', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'YToxMTp7czo2OiJfdG9rZW4iO3M6NDA6Ink4SXJ6c0VmZXE2SzV5eDBHR2ZUNGZCVEl1YkJlaTVHQ3hOSHNWQkEiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvaG9tZS9jb250YWN0LXBhZ2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE5OiJjdXJyZW50X3F1ZXN0aW9uX25vIjtzOjE6IjMiO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRCY281ODM1Qi96RkdaWGFmNjdXTVZ1aHgxRU93cU9kUlc5S2g4Zmp6QzJmLm1TNXBScmVDVyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkQmNvNTgzNUIvekZHWlhhZjY3V01WdWh4MUVPd3FPZFJXOUtoOGZqekMyZi5tUzVwUnJlQ1ciO3M6NjoiVGVhbV9BIjtpOjA7czo2OiJUZWFtX0IiO2k6MDtzOjY6IlRlYW1fQyI7aTowO3M6MTQ6InF1ZXN0aW9uX21lZGlhIjtzOjM2OiIvdXBsb2Fkcy9RdWl6X01lZGlhL01lZGlhX3MxX3EyMy5qcGciO30=', 1625085549);

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
(1, 'Admin', 'super_admin', 'admin@myschoolquiz.in', NULL, '$2y$10$Bco5835B/zFGZXaf67WMVuhx1EOwqOdRW9Kh8fjzC2f.mS5pRreCW', NULL, NULL, 'X5uKCtK0m9dQVxtdod86D3oPls6zlcVdrCdcXOowror9og1rPHxZmM7Vnmng', '2021-05-29 14:00:48', '2021-05-29 14:00:48'),
(9, 'Simran', 'admin', 'simran@gmail.com', NULL, '$2y$10$hZVjN.BBK/zgkaIozkoiPOz9kLYR1OE6owAlr7sP6qdlMqTppzXSi', NULL, NULL, NULL, '2021-06-15 05:21:18', '2021-06-15 05:22:57'),
(10, 'Siddharth', 'super_admin', 'sid15597@gmail.com', NULL, '$2y$10$8Sq.s0Wx4fpdTmraRlbxgOATnbGyrcxm9eVV00nhcnsQSjj8VB3HO', NULL, NULL, NULL, '2021-06-22 13:05:52', '2021-06-22 13:05:52');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `quiz_sets`
--
ALTER TABLE `quiz_sets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
