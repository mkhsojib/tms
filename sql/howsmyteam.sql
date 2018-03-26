-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 26, 2018 at 07:16 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `howsmyteam`
--

-- --------------------------------------------------------

--
-- Table structure for table `file_upload_loger`
--

CREATE TABLE `file_upload_loger` (
  `id` int(11) NOT NULL,
  `week_name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `week_id` int(11) DEFAULT '0',
  `uploaded_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_upload_loger`
--

INSERT INTO `file_upload_loger` (`id`, `week_name`, `user_id`, `week_id`, `uploaded_time`, `created_at`, `updated_at`) VALUES
(12, 'Week 1', 14, 1, '2017-12-13 18:36:22', '2017-12-11 10:09:31', '2017-12-13 18:36:22'),
(13, 'Week 2', 14, 2, '2017-12-13 18:36:25', '2017-12-11 10:09:49', '2017-12-13 18:36:25'),
(14, 'Week 3', 14, 3, '2017-12-13 18:36:28', '2017-12-11 10:13:02', '2017-12-13 18:36:28'),
(15, 'Week 4', 14, 4, '2017-12-13 18:36:30', '2017-12-11 10:18:17', '2017-12-13 18:36:30'),
(16, 'Week 5', 14, 5, '2017-12-13 18:36:34', '2017-12-11 10:20:46', '2017-12-13 18:36:34'),
(17, 'Week 6', 14, 6, '2017-12-13 18:36:37', '2017-12-11 10:23:05', '2017-12-13 18:36:37'),
(26, 'Week 2', 15, 2, '2017-12-13 18:36:40', '2017-12-12 02:53:47', '2017-12-13 18:36:40'),
(27, 'Week 3', 15, 3, '2017-12-13 18:36:44', '2017-12-12 02:53:57', '2017-12-13 18:36:44'),
(28, 'Week 4', 15, 4, '2017-12-13 18:36:48', '2017-12-12 02:54:10', '2017-12-13 18:36:48'),
(30, 'Week 6', 15, 6, '2017-12-13 18:36:53', '2017-12-12 02:54:36', '2017-12-13 18:36:53'),
(37, 'Week 7', 15, 7, '2017-12-13 18:36:56', '2017-12-12 09:20:46', '2017-12-13 18:36:56'),
(39, 'Week 1', 15, 1, '2017-12-13 18:36:59', '2017-12-12 20:27:12', '2017-12-13 18:36:59'),
(42, 'Week 7', 14, 7, '2017-12-13 18:37:03', '2017-12-13 22:49:26', '2017-12-13 18:37:03'),
(43, 'Week 1', 16, 1, '2017-12-14 07:00:00', '2017-12-14 22:01:04', '2017-12-14 22:01:04'),
(44, 'Week 2', 16, 2, '2017-12-14 07:00:00', '2017-12-14 22:01:19', '2017-12-14 22:01:19'),
(45, 'Week 3', 16, 3, '2017-12-14 07:00:00', '2017-12-14 22:01:33', '2017-12-14 22:01:33'),
(46, 'Week 5', 15, 5, '2017-12-14 07:00:00', '2017-12-15 01:13:20', '2017-12-15 01:13:20'),
(47, 'Week 1', 17, 1, '2017-12-14 07:00:00', '2017-12-15 04:13:08', '2017-12-15 04:13:08'),
(48, 'Week 2', 17, 2, '2017-12-14 07:00:00', '2017-12-15 04:13:23', '2017-12-15 04:13:23'),
(49, 'Week 3', 17, 3, '2017-12-14 07:00:00', '2017-12-15 04:13:35', '2017-12-15 04:13:35'),
(50, 'Week 4', 17, 4, '2017-12-14 07:00:00', '2017-12-15 04:13:47', '2017-12-15 04:13:47'),
(51, 'Week 5', 17, 5, '2017-12-14 07:00:00', '2017-12-15 04:13:57', '2017-12-15 04:13:57'),
(52, 'Week 6', 17, 6, '2017-12-14 07:00:00', '2017-12-15 04:14:07', '2017-12-15 04:14:07'),
(53, 'Week 7', 17, 7, '2017-12-14 07:00:00', '2017-12-15 04:14:39', '2017-12-15 04:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2017_07_12_145959_create_permission_tables', 1),
(8, '2017_11_16_164012_create_players_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_id`, `model_type`) VALUES
(1, 1, 'App\\User'),
(4, 2, 'App\\User'),
(4, 3, 'App\\User'),
(4, 4, 'App\\User'),
(4, 6, 'App\\User'),
(4, 7, 'App\\User'),
(4, 9, 'App\\User'),
(1, 12, 'App\\User'),
(4, 14, 'App\\User'),
(4, 15, 'App\\User'),
(4, 16, 'App\\User'),
(4, 17, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'users_manage', 'web', '2017-11-15 08:32:24', '2017-11-15 08:32:24'),
(2, 'user', 'web', '2017-11-15 08:44:32', '2017-11-15 08:44:32'),
(3, 'coach', 'web', '2017-11-15 08:46:32', '2017-11-15 08:46:32'),
(4, 'show_payers_data', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `type_of` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jersey_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_question` int(11) NOT NULL DEFAULT '0',
  `a` text COLLATE utf8mb4_unicode_ci,
  `b` text COLLATE utf8mb4_unicode_ci,
  `c` text COLLATE utf8mb4_unicode_ci,
  `d` text COLLATE utf8mb4_unicode_ci,
  `e` text COLLATE utf8mb4_unicode_ci,
  `f` text COLLATE utf8mb4_unicode_ci,
  `g` text COLLATE utf8mb4_unicode_ci,
  `h` text COLLATE utf8mb4_unicode_ci,
  `i` text COLLATE utf8mb4_unicode_ci,
  `j` text COLLATE utf8mb4_unicode_ci,
  `k` text COLLATE utf8mb4_unicode_ci,
  `l` text COLLATE utf8mb4_unicode_ci,
  `m` text COLLATE utf8mb4_unicode_ci,
  `n` text COLLATE utf8mb4_unicode_ci,
  `o` text COLLATE utf8mb4_unicode_ci,
  `p` text COLLATE utf8mb4_unicode_ci,
  `q` text COLLATE utf8mb4_unicode_ci,
  `r` text COLLATE utf8mb4_unicode_ci,
  `s` text COLLATE utf8mb4_unicode_ci,
  `t` text COLLATE utf8mb4_unicode_ci,
  `u` text COLLATE utf8mb4_unicode_ci,
  `v` text COLLATE utf8mb4_unicode_ci,
  `w` text COLLATE utf8mb4_unicode_ci,
  `x` text COLLATE utf8mb4_unicode_ci,
  `y` text COLLATE utf8mb4_unicode_ci,
  `z` text COLLATE utf8mb4_unicode_ci,
  `aa` text COLLATE utf8mb4_unicode_ci,
  `ab` text COLLATE utf8mb4_unicode_ci,
  `ac` text COLLATE utf8mb4_unicode_ci,
  `ad` text COLLATE utf8mb4_unicode_ci,
  `ae` text COLLATE utf8mb4_unicode_ci,
  `af` text COLLATE utf8mb4_unicode_ci,
  `ag` text COLLATE utf8mb4_unicode_ci,
  `ah` text COLLATE utf8mb4_unicode_ci,
  `ai` text COLLATE utf8mb4_unicode_ci,
  `aj` text COLLATE utf8mb4_unicode_ci,
  `ak` text COLLATE utf8mb4_unicode_ci,
  `al` text COLLATE utf8mb4_unicode_ci,
  `am` text COLLATE utf8mb4_unicode_ci,
  `an` text COLLATE utf8mb4_unicode_ci,
  `ao` text COLLATE utf8mb4_unicode_ci,
  `ap` text COLLATE utf8mb4_unicode_ci,
  `aq` text COLLATE utf8mb4_unicode_ci,
  `ar` text COLLATE utf8mb4_unicode_ci,
  `as` text COLLATE utf8mb4_unicode_ci,
  `at` text COLLATE utf8mb4_unicode_ci,
  `au` text COLLATE utf8mb4_unicode_ci,
  `av` text COLLATE utf8mb4_unicode_ci,
  `aw` text COLLATE utf8mb4_unicode_ci,
  `ax` text COLLATE utf8mb4_unicode_ci,
  `ay` text COLLATE utf8mb4_unicode_ci,
  `az` text COLLATE utf8mb4_unicode_ci,
  `ba` text COLLATE utf8mb4_unicode_ci,
  `bb` text COLLATE utf8mb4_unicode_ci,
  `bc` text COLLATE utf8mb4_unicode_ci,
  `bd` text COLLATE utf8mb4_unicode_ci,
  `be` text COLLATE utf8mb4_unicode_ci,
  `bf` text COLLATE utf8mb4_unicode_ci,
  `bg` text COLLATE utf8mb4_unicode_ci,
  `bh` text COLLATE utf8mb4_unicode_ci,
  `bi` text COLLATE utf8mb4_unicode_ci,
  `bj` text COLLATE utf8mb4_unicode_ci,
  `bk` text COLLATE utf8mb4_unicode_ci,
  `bl` text COLLATE utf8mb4_unicode_ci,
  `bm` text COLLATE utf8mb4_unicode_ci,
  `bn` text COLLATE utf8mb4_unicode_ci,
  `bo` text COLLATE utf8mb4_unicode_ci,
  `bp` text COLLATE utf8mb4_unicode_ci,
  `bq` text COLLATE utf8mb4_unicode_ci,
  `br` text COLLATE utf8mb4_unicode_ci,
  `bs` text COLLATE utf8mb4_unicode_ci,
  `bt` text COLLATE utf8mb4_unicode_ci,
  `bu` text COLLATE utf8mb4_unicode_ci,
  `bv` text COLLATE utf8mb4_unicode_ci,
  `bw` text COLLATE utf8mb4_unicode_ci,
  `bx` text COLLATE utf8mb4_unicode_ci,
  `by` text COLLATE utf8mb4_unicode_ci,
  `bz` text COLLATE utf8mb4_unicode_ci,
  `ca` text COLLATE utf8mb4_unicode_ci,
  `cb` text COLLATE utf8mb4_unicode_ci,
  `cc` text COLLATE utf8mb4_unicode_ci,
  `cd` text COLLATE utf8mb4_unicode_ci,
  `ce` text COLLATE utf8mb4_unicode_ci,
  `cf` text COLLATE utf8mb4_unicode_ci,
  `cg` text COLLATE utf8mb4_unicode_ci,
  `ch` text COLLATE utf8mb4_unicode_ci,
  `ci` text COLLATE utf8mb4_unicode_ci,
  `cj` text COLLATE utf8mb4_unicode_ci,
  `ck` text COLLATE utf8mb4_unicode_ci,
  `cl` text COLLATE utf8mb4_unicode_ci,
  `cm` text COLLATE utf8mb4_unicode_ci,
  `cn` text COLLATE utf8mb4_unicode_ci,
  `co` text COLLATE utf8mb4_unicode_ci,
  `cp` text COLLATE utf8mb4_unicode_ci,
  `cq` text COLLATE utf8mb4_unicode_ci,
  `cr` text COLLATE utf8mb4_unicode_ci,
  `cs` text COLLATE utf8mb4_unicode_ci,
  `ct` text COLLATE utf8mb4_unicode_ci,
  `cu` text COLLATE utf8mb4_unicode_ci,
  `cv` text COLLATE utf8mb4_unicode_ci,
  `cw` text COLLATE utf8mb4_unicode_ci,
  `cx` text COLLATE utf8mb4_unicode_ci,
  `cy` text COLLATE utf8mb4_unicode_ci,
  `cz` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'web', '2017-11-15 08:32:24', '2017-11-15 08:32:24'),
(3, 'user', 'web', '2017-11-15 08:44:44', '2017-11-15 08:44:44'),
(4, 'coach', 'web', '2017-11-15 08:48:44', '2017-11-15 08:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `last_login_time`) VALUES
(1, 'Admin', 'admin@email.com', '$2y$10$DNGRjh4O08K9WVwBBMgD2.CL8YtH07r0KjtzYeT6yBOOSNfWbP7CG', 'VkOxoKrjFVXkxv9WweWY2XQyasQYJX5eGWykcjZWVyENE0VEd5trDeYzfVnT', '2017-11-15 08:32:25', '2018-03-25 09:36:13', '2018-03-25 09:36:13'),
(7, 'tapos', 'tapos@email.com', '$2y$10$T0Bn1SEXNGRfv5RMaPkbAur7GU50HGa/7celE/IYTntxNDhUlJwr6', 'yX2zVIUE8WMqCb13NHgl3v2CBSZxZcWFsM9OTIWgihInZSLbAtzVrHKPXrLZ', '2017-12-04 11:43:59', '2017-12-11 22:03:32', '2017-12-11 22:03:32'),
(9, 'sojib', 'sojib@email.com', '$2y$10$f731SOgc0T9zDS9l9b9ltOlwtRreVYXtCSF/9pwFuprG4qf92aclm', 'BoYhHDRh4XGnDsufbtZfC0g6GLnMPLrfkrr240im9yH9HTnO57QLOqkClacD', '2017-12-04 11:54:50', '2017-12-10 15:55:55', '2017-12-10 15:55:55'),
(12, 'Abrahm DiMarco', 'abrahm.dimarco@gmail.com', '$2y$10$xMJPJ4IyeQ.X/mXTths/J.vkXgQpk2lTg4XrRHyvWWbTHkhqPu17m', 'tGIzbxYQd0cBA5JPFHbrt1lJKhTleVlbSdcdvR5EqC3sOqXGmFtNgMYt0wMJ', '2017-12-10 20:56:16', '2017-12-15 04:11:56', '2017-12-15 04:11:56'),
(14, 'Chris Bernard', 'bernarcd@potsdam.edu', '$2y$10$8aHrr6NWFjXF9Lr7wiVa1ecMGbHE3DeiOLRparMbntwtg.62hxjei', 'gap6fWbYIx4XuixgJ26qDbMkm2vk7BROHp0qNG5jMKRT2qk7B2abRYjkTTuk', '2017-12-11 10:06:13', '2017-12-15 09:09:55', '2017-12-15 09:09:55'),
(15, 'Jim Bechtel', 'bechtejg@potsdam.edu', '$2y$10$M0yi/rXLEGuEWsM00OSeieJmeZhghIXc2xb0Ir8Teq4dZ/5aU05ee', 'VJ1H1NDy1syNUMuGFIaYg1zTM5wNNEJGO0pPQjJzQgsLnhSSYKUONw0m4Ch8', '2017-12-11 11:17:59', '2017-12-15 09:10:15', '2017-12-15 09:10:15'),
(16, 'test', 'test@email.com', '$2y$10$2vQZxuvbcczqn7dUVig2NeKhvEFtE0wSZGEeLYNCby4Vt/ylsjXYW', 'ItwwPGVpcSb7epm2OQHoJ6weueAyvkr5fS3tl2Mbl3dTJznnzH1ha89HQBCr', '2017-12-14 22:00:44', '2017-12-14 22:36:41', '2017-12-14 22:36:41'),
(17, 'Demo', 'Demo@email.com', '$2y$10$BAGbTOBeSN7HTVrm/9fGluw8t8iSmiODM47rrKKy79X8SVlN4jyGy', 'mrBRImpZ6X2KPj17Ag6o1l4iyP0wSXAQp6BFX2aNHgdGbUkgS1OTbSlv6eQH', '2017-12-15 04:12:27', '2017-12-15 04:14:50', '2017-12-15 04:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_graph_setup`
--

CREATE TABLE `user_graph_setup` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `graph_id` int(11) NOT NULL,
  `graph_name` varchar(255) NOT NULL,
  `column_name` varchar(100) NOT NULL,
  `excell_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_graph_setup`
--

INSERT INTO `user_graph_setup` (`id`, `user_id`, `graph_id`, `graph_name`, `column_name`, `excell_name`, `created_at`, `updated_at`) VALUES
(6, 7, 1, 'playing', 'ab', 'd', '2018-03-22 15:05:50', '2018-03-22 15:05:50'),
(7, 7, 1, 'playing', 'cd', 'sdf', '2018-03-22 15:05:50', '2018-03-22 15:05:50'),
(8, 7, 1, 'playing', 'ef', 'sdf', '2018-03-22 15:05:50', '2018-03-22 15:05:50'),
(9, 7, 2, 'sleeping1', 'dsf', 'sdf', '2018-03-22 15:05:50', '2018-03-22 15:05:50'),
(10, 7, 2, 'sleeping1', 'sdfdsf', 'sadf', '2018-03-22 15:05:50', '2018-03-22 15:05:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file_upload_loger`
--
ALTER TABLE `file_upload_loger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_graph_setup`
--
ALTER TABLE `user_graph_setup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file_upload_loger`
--
ALTER TABLE `file_upload_loger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_graph_setup`
--
ALTER TABLE `user_graph_setup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
