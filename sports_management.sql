-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2025 at 04:16 PM
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
-- Database: `sports_management`
--

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imageable_id` varchar(255) NOT NULL,
  `imageable_type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `imageable_id`, `imageable_type`, `name`, `created_at`, `updated_at`) VALUES
(1, '12', 'App\\Models\\User', 'default.jpg', '2025-02-06 12:42:55', '2025-02-06 12:42:55');

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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2025_02_04_073735_create_roles_table', 1),
(5, '2025_02_04_073738_create_sport_types_table', 1),
(6, '2025_02_04_073739_create_teams_table', 1),
(7, '2025_02_04_073740_create_users_table', 1),
(8, '2025_02_04_073749_create_sport_properties_table', 1),
(9, '2025_02_04_073756_create_property_values_table', 1),
(10, '2025_02_04_080000_create_settings_table', 1),
(11, '2025_02_04_110701_add_foreign_keys_to_users_and_teams', 1),
(12, '2025_02_04_123104_create_images_table', 1),
(13, '2025_02_05_205205_create_notifications_table', 1),
(14, '2025_02_05_223326_add_players_count_to_teams', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('d6fccf21-ce7e-4e30-8773-b9c3a70606e0', 'App\\Notifications\\SendSportNotification', 'App\\Models\\User', 1, '{\"title\":\"New Sport Added\",\"sport_id\":5,\"sport_name\":\"Athletics\",\"message\":\"A new sport has been added: Athletics\",\"created_at\":\"2025-02-06T14:41:42.289292Z\"}', '2025-02-06 12:41:50', '2025-02-06 12:41:42', '2025-02-06 12:41:50');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_values`
--

CREATE TABLE `property_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userable_type` varchar(255) NOT NULL,
  `userable_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_values`
--

INSERT INTO `property_values` (`id`, `userable_type`, `userable_id`, `property_id`, `content`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Player', 1, 1, 'Striker', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(2, 'App\\Models\\Player', 1, 2, '10', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(3, 'App\\Models\\Player', 1, 3, '25', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(4, 'App\\Models\\Player', 1, 4, '12', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(5, 'App\\Models\\Team', 1, 5, '60', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(6, 'App\\Models\\Team', 1, 6, '20', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(7, 'App\\Models\\Team', 1, 7, '15', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(8, 'App\\Models\\Team', 1, 8, '3', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(9, 'App\\Models\\Team', 1, 9, '2', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(10, 'App\\Models\\Player', 2, 10, 'Point Guard', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(11, 'App\\Models\\Player', 2, 11, '7', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(12, 'App\\Models\\Player', 2, 12, '18.2', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(13, 'App\\Models\\Player', 2, 13, '7.5', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(14, 'App\\Models\\Player', 2, 14, '5.3', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(15, 'App\\Models\\Player', 3, 15, '3', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(16, 'App\\Models\\Player', 3, 16, '45', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(17, 'App\\Models\\Player', 3, 17, '8', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(18, 'App\\Models\\Player', 3, 18, '230', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(19, 'App\\Models\\Player', 3, 19, '12', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(20, 'App\\Models\\Player', 4, 20, '00:48:52', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(21, 'App\\Models\\Player', 4, 21, '01:46:89', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(22, 'App\\Models\\Player', 4, 22, '8', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(23, 'App\\Models\\Player', 4, 23, '12', NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(24, 'App\\Models\\User', 12, 22, '1', NULL, '2025-02-06 12:42:55', '2025-02-06 12:42:55'),
(25, 'App\\Models\\User', 12, 23, '1', NULL, '2025-02-06 12:42:55', '2025-02-06 12:42:55'),
(26, 'App\\Models\\User', 12, 24, '1', NULL, '2025-02-06 12:42:55', '2025-02-06 12:42:55'),
(27, 'App\\Models\\User', 12, 25, '1', NULL, '2025-02-06 12:42:55', '2025-02-06 12:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(2, 'coach', '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(3, 'Captain', '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(4, 'player', '2025-02-06 12:40:53', '2025-02-06 12:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `default_sport_id` bigint(20) UNSIGNED DEFAULT NULL,
  `max_users_per_team` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sport_properties`
--

CREATE TABLE `sport_properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `input_type` varchar(255) NOT NULL,
  `type` enum('individual','team') NOT NULL,
  `sport_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sport_properties`
--

INSERT INTO `sport_properties` (`id`, `name`, `input_type`, `type`, `sport_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Player Position', 'text', 'individual', 1, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(2, 'Jersey Number', 'number', 'individual', 1, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(3, 'Goals Scored', 'number', 'individual', 1, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(4, 'Assists', 'number', 'individual', 1, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(5, 'Team Points in League', 'number', 'team', 1, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(6, 'Games Played', 'number', 'team', 1, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(7, 'Wins', 'number', 'team', 1, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(8, 'Draws', 'number', 'team', 1, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(9, 'Losses', 'number', 'team', 1, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(10, 'Player Position', 'text', 'individual', 2, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(11, 'Jersey Number', 'number', 'individual', 2, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(12, 'Points Per Game', 'number', 'individual', 2, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(13, 'Rebounds Per Game', 'number', 'individual', 2, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(14, 'Assists Per Game', 'number', 'individual', 2, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(15, 'Team Wins', 'number', 'team', 2, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(16, 'Team Losses', 'number', 'team', 2, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(17, 'Ranking Position', 'number', 'individual', 3, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(18, 'Matches Won', 'number', 'individual', 3, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(19, 'Matches Lost', 'number', 'individual', 3, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(20, 'Aces', 'number', 'individual', 3, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(21, 'Double Faults', 'number', 'individual', 3, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(22, 'Best Time (100m Freestyle)', 'time', 'individual', 4, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(23, 'Best Time (200m Freestyle)', 'time', 'individual', 4, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(24, 'Total Medals Won', 'number', 'individual', 4, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(25, 'Events Participated', 'number', 'individual', 4, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(26, 'Average Sprint Speed', 'number', 'team', 5, NULL, '2025-02-06 12:41:42', '2025-02-06 12:41:42'),
(27, 'Start Reaction Time', 'number', 'individual', 5, NULL, '2025-02-06 12:41:42', '2025-02-06 12:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `sport_types`
--

CREATE TABLE `sport_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sport_types`
--

INSERT INTO `sport_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Football', '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(2, 'Basketball', '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(3, 'Tennis', '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(4, 'Swimming', '2025-02-06 12:40:53', '2025-02-06 12:40:53'),
(5, 'Athletics', '2025-02-06 12:41:42', '2025-02-06 12:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `sport_type_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `players_limit` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `coach_id` bigint(20) UNSIGNED DEFAULT NULL,
  `captain_id` bigint(20) UNSIGNED DEFAULT NULL,
  `players_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `sport_type_id`, `status`, `players_limit`, `deleted_at`, `created_at`, `updated_at`, `coach_id`, `captain_id`, `players_count`) VALUES
(1, 'Red Warriors', 1, 'active', 11, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53', 2, 5, 0),
(2, 'Blue Sharks', 2, 'active', 5, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53', 3, 6, 0),
(3, 'Golden Racquets', 3, 'active', 1, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53', 7, NULL, 0),
(4, 'test team', 4, 'active', 2, '2025-02-06 12:43:30', '2025-02-06 12:42:20', '2025-02-06 12:43:30', 2, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `status` enum('active','injured','suspended') NOT NULL DEFAULT 'active',
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `email_verified_at`, `password`, `age`, `status`, `role_id`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `team_id`) VALUES
(1, 'Admin User', 'admin@gmail.com', NULL, '$2y$10$qocpKMqGs3uKGyQVVUK52.Gy7jaUn3aLiX7dkjhKyv5BC13b1oIHu', 30, 'active', 1, NULL, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53', NULL),
(2, 'John Doe', 'coach1@example.com', NULL, '$2y$10$6jycLhnACfLEjvtpRMQsROJu0me0WsZwZ3rN3f5jLq5VVxErYPTZS', 40, 'active', 2, NULL, NULL, '2025-02-06 12:40:53', '2025-02-06 12:42:20', 4),
(3, 'Mike Smith', 'coach2@example.com', NULL, '$2y$10$jmfsbrux0jrWH0o0FOEmM.p1Q1LnlPwxPr0msCuIs/pgBndg2P9KK', 38, 'active', 2, NULL, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53', NULL),
(4, 'Alice Johnson', 'coach3@example.com', NULL, '$2y$10$zDAMr8.1gYkmnf2cBKOhOeenmBdxV.Oy3Wa0Jzn41/kclv00WwYoi', 45, 'active', 2, NULL, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53', NULL),
(5, 'David Brown', 'captain1@example.com', NULL, '$2y$10$U8hinTPANDnlUmVYUXL6p.DOKwEX3Zdpq/Cu50DspQzdq4z2l5EXe', 28, 'active', 3, NULL, NULL, '2025-02-06 12:40:53', '2025-02-06 12:42:20', 4),
(6, 'Chris Evans', 'captain2@example.com', NULL, '$2y$10$GL6U3kZ73SoYLrSDImI/P.RlOmLzmFEdj0Ut/lEwgvdY4rvZdYiDO', 29, 'active', 3, NULL, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53', NULL),
(7, 'James Lee', 'player1@example.com', NULL, '$2y$10$9q.6qI0/KxSjD6/VQsJnGe1Qm8VpXu1BgilGGbOKlrhY.U3DWCdmO', 24, 'active', 4, NULL, '2025-02-06 12:44:12', '2025-02-06 12:40:53', '2025-02-06 12:44:12', 4),
(8, 'Robert Clark', 'player2@example.com', NULL, '$2y$10$nnzojqcNBWe68t6wdfyPc.91uNAH28X83Koo1VKzpG2dknA6D/wmy', 26, 'active', 4, NULL, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53', NULL),
(9, 'Kevin White', 'player3@example.com', NULL, '$2y$10$hewHzbjVAu8kVIfr592oluHRp9SPK/M20UjEmVZhzYmXQAsdWuNfW', 22, 'active', 4, NULL, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53', NULL),
(10, 'Andrew Scott', 'player4@example.com', NULL, '$2y$10$o86bGFH4Rqa/5uJDA62ti.yY/6HCTtM.9UeKQMOBGySbFLdWqJIXq', 25, 'active', 4, NULL, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53', NULL),
(11, 'Emily Davis', 'player5@example.com', NULL, '$2y$10$AunNvNXtiFjbILJgacP4jutm2H0E4NEttveCEE3qFF/ATo6QSwEom', 23, 'active', 4, NULL, NULL, '2025-02-06 12:40:53', '2025-02-06 12:40:53', NULL),
(12, 'hadeer', 'hadeer@gmail.com', NULL, '$2y$10$XNXU7xuvSAwC2OiMYUfXfOP0Q.igMRftdRo1Ilp.mFsj5EGaXC0zC', 22, 'active', 4, NULL, NULL, '2025-02-06 12:42:55', '2025-02-06 12:42:55', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

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
-- Indexes for table `property_values`
--
ALTER TABLE `property_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_values_userable_type_userable_id_index` (`userable_type`,`userable_id`),
  ADD KEY `property_values_property_id_foreign` (`property_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_default_sport_id_foreign` (`default_sport_id`);

--
-- Indexes for table `sport_properties`
--
ALTER TABLE `sport_properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sport_properties_sport_id_foreign` (`sport_id`);

--
-- Indexes for table `sport_types`
--
ALTER TABLE `sport_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_sport_type_id_foreign` (`sport_type_id`),
  ADD KEY `teams_coach_id_foreign` (`coach_id`),
  ADD KEY `teams_captain_id_foreign` (`captain_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_team_id_foreign` (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_values`
--
ALTER TABLE `property_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sport_properties`
--
ALTER TABLE `sport_properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sport_types`
--
ALTER TABLE `sport_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `property_values`
--
ALTER TABLE `property_values`
  ADD CONSTRAINT `property_values_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `sport_properties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_default_sport_id_foreign` FOREIGN KEY (`default_sport_id`) REFERENCES `sport_types` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `sport_properties`
--
ALTER TABLE `sport_properties`
  ADD CONSTRAINT `sport_properties_sport_id_foreign` FOREIGN KEY (`sport_id`) REFERENCES `sport_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_captain_id_foreign` FOREIGN KEY (`captain_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `teams_coach_id_foreign` FOREIGN KEY (`coach_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `teams_sport_type_id_foreign` FOREIGN KEY (`sport_type_id`) REFERENCES `sport_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
