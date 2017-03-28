-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2017 at 11:31 PM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multiauth`
--

-- --------------------------------------------------------

--
-- Table structure for table `courts`
--

CREATE TABLE IF NOT EXISTS `courts` (
  `court_id` int(10) unsigned NOT NULL,
  `court_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courts`
--

INSERT INTO `courts` (`court_id`, `court_name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'محكمة 1', 0, '2017-03-27 23:00:00', NULL),
(2, 'محكمة 2', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `file_reference` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `elementary_num` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decision_judge` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appellate_num` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appellate_judge` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_id` int(10) unsigned NOT NULL,
  `court_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_reference`, `elementary_num`, `decision_judge`, `appellate_num`, `appellate_judge`, `office_id`, `court_id`, `created_at`, `updated_at`) VALUES
('121', 'elm12', 'decision', '12UIJJN', 'dfsdfgh', 1, 1, '2017-03-27 23:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `file_parties`
--

CREATE TABLE IF NOT EXISTS `file_parties` (
  `file_reference` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_id` int(10) unsigned NOT NULL,
  `part_type` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_03_08_115640_create_office_table', 1),
(2, '2017_03_08_115641_create_users_table', 1),
(3, '2017_03_08_115643_create_password_resets_table', 1),
(4, '2017_03_18_150523_create_courts_table', 1),
(5, '2017_03_18_150538_create_files_table', 1),
(6, '2017_03_18_150602_create_sittings_table', 1),
(7, '2017_03_18_150612_create_parties_table', 1),
(8, '2017_03_18_150625_create_file_parties_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE IF NOT EXISTS `offices` (
  `id` int(10) unsigned NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `code`, `user_name`, `email`, `address`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1', 'lm_omar', 'om@yahoo.fr', 'adresse', '00898988778', '$2y$10$sFivfRT1281qpfp3llbBxuw/6gOzinYzlkDQOiG2gY5Ed8TMmnuyK', NULL, '2017-03-25 21:21:11', '2017-03-25 21:50:14');

-- --------------------------------------------------------

--
-- Table structure for table `parties`
--

CREATE TABLE IF NOT EXISTS `parties` (
  `part_id` int(10) unsigned NOT NULL,
  `first_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_phone` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sittings`
--

CREATE TABLE IF NOT EXISTS `sittings` (
  `sitting_id` int(10) unsigned NOT NULL,
  `sitting_date` date NOT NULL,
  `next_procedure` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Verdict` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_reference` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sittings`
--

INSERT INTO `sittings` (`sitting_id`, `sitting_date`, `next_procedure`, `Verdict`, `file_reference`, `created_at`, `updated_at`) VALUES
(4, '2017-03-18', 'الاجراء المقبل 2', 'منطوق الحكم 2', '121', '2017-03-28 21:01:37', '2017-03-28 22:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_id` int(10) unsigned NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `phone`, `office_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'user', 'user', 'email@email.fr', '89767867', 1, '$2y$10$M2NqUtv.sTkvHJORXDlGQ.GeaD3NKmR.hKzMQqYTDs8OHZelD7qPy', NULL, '2017-03-25 22:03:33', '2017-03-25 22:03:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courts`
--
ALTER TABLE `courts`
  ADD PRIMARY KEY (`court_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_reference`),
  ADD KEY `files_office_id_foreign` (`office_id`),
  ADD KEY `files_court_id_foreign` (`court_id`);

--
-- Indexes for table `file_parties`
--
ALTER TABLE `file_parties`
  ADD PRIMARY KEY (`file_reference`,`part_id`),
  ADD KEY `file_parties_part_id_foreign` (`part_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `offices_code_unique` (`code`),
  ADD UNIQUE KEY `offices_user_name_unique` (`user_name`),
  ADD UNIQUE KEY `offices_email_unique` (`email`);

--
-- Indexes for table `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`part_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `sittings`
--
ALTER TABLE `sittings`
  ADD PRIMARY KEY (`sitting_id`),
  ADD KEY `sittings_file_reference_foreign` (`file_reference`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_name_unique` (`user_name`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_office_id_foreign` (`office_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courts`
--
ALTER TABLE `courts`
  MODIFY `court_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `parties`
--
ALTER TABLE `parties`
  MODIFY `part_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sittings`
--
ALTER TABLE `sittings`
  MODIFY `sitting_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_court_id_foreign` FOREIGN KEY (`court_id`) REFERENCES `courts` (`court_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `files_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `file_parties`
--
ALTER TABLE `file_parties`
  ADD CONSTRAINT `file_parties_file_reference_foreign` FOREIGN KEY (`file_reference`) REFERENCES `files` (`file_reference`) ON DELETE CASCADE,
  ADD CONSTRAINT `file_parties_part_id_foreign` FOREIGN KEY (`part_id`) REFERENCES `parties` (`part_id`) ON DELETE CASCADE;

--
-- Constraints for table `sittings`
--
ALTER TABLE `sittings`
  ADD CONSTRAINT `sittings_file_reference_foreign` FOREIGN KEY (`file_reference`) REFERENCES `files` (`file_reference`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
