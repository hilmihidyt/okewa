-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 18, 2023 at 02:38 PM
-- Server version: 5.7.33
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `walink`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_links`
--

CREATE TABLE `chat_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `wa_link` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_url` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_links`
--

INSERT INTO `chat_links` (`id`, `phone`, `message`, `wa_link`, `short_url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'eyJpdiI6Ik55SUR0aEx6QXMwQVJSeS8yejBwakE9PSIsInZhbHVlIjoiT1QyTXcrN3NPS0R2dGwzUWtYYmlYZz09IiwibWFjIjoiN2FmNzc4YTNhZjYwZjE1MWI2ODU5YTEyOTE0ZGE5MmEyYWYxMGU3ZjEwNDBlNDIyOGU0YThhNzYzZWJjZGZjNSIsInRhZyI6IiJ9', 'eyJpdiI6IkVURXpWTndjVFdZNmV6bXk2VFBjdHc9PSIsInZhbHVlIjoiSXcxcktGSndvMUswVmxPd2psUnNhZz09IiwibWFjIjoiYjc0NTcyMGQ1NjE5ODBlYTliNWQ2YzU0ZTc4ODNhMjU1NWI0NjFhMjg4ZTkyYWUwZWMyZGY1MjcyN2ZiN2NjYSIsInRhZyI6IiJ9', 'eyJpdiI6InNCdXZBWENDVVRSN1NqM0FhOTdSZHc9PSIsInZhbHVlIjoidmk5MUxBNFJRQU5LY1IxbGlBdlgxWXdBS2xxcFFlc1VzU3hHVGdrVEVyNmp6Y0FTdlFabHZBdVdxT3dLOW5MdUIvWFNWRlFFUTNCN0RWQ3RNTGtHUHc9PSIsIm1hYyI6Ijg1ZDBlNDg1MjNlN2Y2YzA0N2IyYmQyZDQwZTQ5NWMzMWNmNjA4ZmZkMDBiOGZiYmI5NjM4NDM4MWYwYzEwYTciLCJ0YWciOiIifQ==', 'http://walink.test/go/k4x9e', '2023-09-18 07:37:37', '2023-09-18 07:37:37', NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2019_12_22_015115_create_short_urls_table', 1),
(7, '2019_12_22_015214_create_short_url_visits_table', 1),
(8, '2020_02_11_224848_update_short_url_table_for_version_two_zero_zero', 1),
(9, '2020_02_12_008432_update_short_url_visits_table_for_version_two_zero_zero', 1),
(10, '2020_04_10_224546_update_short_url_table_for_version_three_zero_zero', 1),
(11, '2020_04_20_009283_update_short_url_table_add_option_to_forward_query_params', 1),
(12, '2023_07_23_070941_create_chat_links_table', 1);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `short_urls`
--

CREATE TABLE `short_urls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destination_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_short_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `single_use` tinyint(1) NOT NULL,
  `forward_query_params` tinyint(1) NOT NULL DEFAULT '0',
  `track_visits` tinyint(1) NOT NULL,
  `redirect_status_code` int(11) NOT NULL DEFAULT '301',
  `track_ip_address` tinyint(1) NOT NULL DEFAULT '0',
  `track_operating_system` tinyint(1) NOT NULL DEFAULT '0',
  `track_operating_system_version` tinyint(1) NOT NULL DEFAULT '0',
  `track_browser` tinyint(1) NOT NULL DEFAULT '0',
  `track_browser_version` tinyint(1) NOT NULL DEFAULT '0',
  `track_referer_url` tinyint(1) NOT NULL DEFAULT '0',
  `track_device_type` tinyint(1) NOT NULL DEFAULT '0',
  `activated_at` timestamp NULL DEFAULT '2023-07-23 00:23:38',
  `deactivated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `short_urls`
--

INSERT INTO `short_urls` (`id`, `destination_url`, `url_key`, `default_short_url`, `single_use`, `forward_query_params`, `track_visits`, `redirect_status_code`, `track_ip_address`, `track_operating_system`, `track_operating_system_version`, `track_browser`, `track_browser_version`, `track_referer_url`, `track_device_type`, `activated_at`, `deactivated_at`, `created_at`, `updated_at`) VALUES
(1, 'https://wa.me/+628214358744?text=Halo', 'k4x9e', 'http://walink.test/go/k4x9e', 0, 0, 1, 301, 1, 1, 1, 1, 1, 1, 1, '2023-09-18 07:37:36', NULL, '2023-09-18 07:37:36', '2023-09-18 07:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `short_url_visits`
--

CREATE TABLE `short_url_visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `short_url_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operating_system` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operating_system_version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser_version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referer_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visited_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$3o/4wondD4VnXZzXyMcwpefi5ip4PVf1upK3JYXxhJdbcZzG/QFVe', NULL, NULL, NULL),
(2, 'Demo', 'demo@gmail.com', NULL, '$2y$10$rPwJawpJuxRdc8LXXYB1l.2H5Xn/GmYS/dqLVpHKzEiGeKu.WtzKW', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_links`
--
ALTER TABLE `chat_links`
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
-- Indexes for table `short_urls`
--
ALTER TABLE `short_urls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `short_urls_url_key_unique` (`url_key`);

--
-- Indexes for table `short_url_visits`
--
ALTER TABLE `short_url_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `short_url_visits_short_url_id_foreign` (`short_url_id`);

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
-- AUTO_INCREMENT for table `chat_links`
--
ALTER TABLE `chat_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `short_urls`
--
ALTER TABLE `short_urls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `short_url_visits`
--
ALTER TABLE `short_url_visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `short_url_visits`
--
ALTER TABLE `short_url_visits`
  ADD CONSTRAINT `short_url_visits_short_url_id_foreign` FOREIGN KEY (`short_url_id`) REFERENCES `short_urls` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
