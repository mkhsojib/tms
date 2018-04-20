-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2018 at 07:17 PM
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
  `uploaded_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_upload_loger`
--

INSERT INTO `file_upload_loger` (`id`, `week_name`, `user_id`, `uploaded_time`, `created_at`, `updated_at`) VALUES
(1, 'week1', 7, '2018-03-28 18:00:00', '2018-03-29 14:09:14', '2018-03-29 14:09:14'),
(3, 'week2', 7, '2018-03-29 18:00:00', '2018-03-30 01:53:55', '2018-03-30 01:53:55');

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
  `is_question` int(11) NOT NULL DEFAULT '0',
  `file_upload_loger` int(11) NOT NULL,
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

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `user_id`, `is_question`, `file_upload_loger`, `a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`, `i`, `j`, `k`, `l`, `m`, `n`, `o`, `p`, `q`, `r`, `s`, `t`, `u`, `v`, `w`, `x`, `y`, `z`, `aa`, `ab`, `ac`, `ad`, `ae`, `af`, `ag`, `ah`, `ai`, `aj`, `ak`, `al`, `am`, `an`, `ao`, `ap`, `aq`, `ar`, `as`, `at`, `au`, `av`, `aw`, `ax`, `ay`, `az`, `ba`, `bb`, `bc`, `bd`, `be`, `bf`, `bg`, `bh`, `bi`, `bj`, `bk`, `bl`, `bm`, `bn`, `bo`, `bp`, `bq`, `br`, `bs`, `bt`, `bu`, `bv`, `bw`, `bx`, `by`, `bz`, `ca`, `cb`, `cc`, `cd`, `ce`, `cf`, `cg`, `ch`, `ci`, `cj`, `ck`, `cl`, `cm`, `cn`, `co`, `cp`, `cq`, `cr`, `cs`, `ct`, `cu`, `cv`, `cw`, `cx`, `cy`, `cz`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Timestamp', 'What is your jersey number?', 'On average, how many hours of sleep did you get each night?', 'How many days did you supplement your sleep with a nap (at least 1 hour)?', 'Overall, rate your nutrition:', 'How many days did you eat breakfast?', 'How many days did you eat lunch?', 'How many days did you eat supper?', 'Total Meals', 'How many days did you have pre-practice/pre-game snacks?', 'How many days did you have a post-practice/post-game snack (refuel)?', 'Rate your hydration', 'What is your overall stress level?', 'What is your stress level caused by Hockey?', 'What is your stress level caused by School?', 'What is your stress level caused by Personal concerns?', 'Rate your strength workouts?', 'Did you do extra strength workouts this week?', 'Rate your cardio workouts?', 'Did you do extra cardio workouts this week?', 'Rate your overall performance in practice', 'Rate your focus during practice', 'Rate your effort during practice', 'Rate your execution during practice', 'Did you do extra skill work before or after practice?', 'Did you watch video this week?', 'Rate your overall game performance?', 'Rate your offensive game performance?', 'Rate your defensive game performance?', 'Rate your special teams game performance?', 'Rate your academic progress', 'Rate your relationship with your teammates', 'Rate your relationship with the staff', 'Rate your relationships in your personal life', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:14', '2018-03-29 14:09:14'),
(2, 1, 0, 1, 'Week 1', '30', '8', '2', '5', '7', '7', '7', '21', '4', '7', '3', '1', '1', '1', '2', '5', 'No', '5', 'No', '4', '4', '4', '4', 'Yes', 'Yes', '4', '3', '3', '3', '4', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:14', '2018-03-29 14:09:14'),
(3, 1, 0, 1, 'Week 1', '19', '8', '2', '4', '7', '7', '7', '21', '5', '5', '4', '3', '3', '3', '2', '3', 'Yes', '4', 'Yes', '4', '4', '5', '4', 'Yes', 'Yes', '4', '3', '4', '4', '4', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:14', '2018-03-29 14:09:14'),
(4, 1, 0, 1, 'Week 1', '31', '7', '1', '4', '5', '7', '7', '19', '5', '5', '4', '3', '3', '4', '2', '3', 'No', '4', 'No', '3', '5', '5', '3', 'No', 'Yes', '4', '3', '3', '3', '4', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:14', '2018-03-29 14:09:14'),
(5, 1, 0, 1, 'Week 1', '26', '8', '3', '4', '7', '7', '7', '21', '5', '5', '5', '2', '2', '2', '1', '4', 'No', '4', 'Yes', '4', '4', '4', '3', 'Yes', 'Yes', '3', '2', '4', '4', '4', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:14', '2018-03-29 14:09:14'),
(6, 1, 0, 1, 'Week 1', '20', '8', '3', '4', '7', '7', '7', '21', '1', '5', '5', '2', '1', '3', '1', '5', 'No', '5', 'Yes', '5', '5', '5', '5', 'Yes', 'Yes', '3', '3', '4', '5', '5', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:14', '2018-03-29 14:09:14'),
(7, 1, 0, 1, 'Week 1', '8', '7', '3', '4', '7', '7', '7', '21', '5', '5', '4', '2', '2', '1', '2', '4', 'No', '3', 'No', '4', '5', '5', '4', 'Yes', 'No', '3', '3', '2', '4', '4', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:14', '2018-03-29 14:09:14'),
(8, 1, 0, 1, 'Week 1', '13', '8', '6', '4', '7', '7', '7', '21', '7', '7', '5', '3', '3', '3', '1', '4', 'Yes', '4', 'Yes', '3', '4', '4', '3', 'Yes', 'Yes', '3', '3', '3', '4', '2', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:14', '2018-03-29 14:09:14'),
(9, 1, 0, 1, 'Week 1', '17', '8', '2', '5', '6', '6', '7', '19', '5', '6', '5', '4', '3', '5', '3', '4', 'Yes', '4', 'Yes', '4', '5', '5', '4', 'Yes', 'Yes', '4', '3', '4', '5', '4', '5', '4', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:14', '2018-03-29 14:09:14'),
(10, 1, 0, 1, 'Week 1', '5', '7', '0', '3', '7', '6', '7', '20', '0', '7', '4', '3', '4', '3', '2', '3', 'No', '4', 'Yes', '3', '4', '5', '4', 'Yes', 'Yes', '4', '3', '4', '4', '3', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:14', '2018-03-29 14:09:14'),
(11, 1, 0, 1, 'Week 1', '6', '7', '1', '4', '4', '7', '7', '18', '3', '7', '3', '4', '4', '2', '3', '4', 'No', '4', 'No', '3', '4', '5', '4', 'Yes', 'Yes', '3', '3', '3', '1', '4', '5', '5', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:14', '2018-03-29 14:09:14'),
(12, 1, 0, 1, 'Week 1', '11', '8', '2', '3', '5', '7', '7', '19', '6', '6', '4', '3', '2', '4', '3', '3', 'No', '3', 'No', '4', '4', '5', '4', 'Yes', 'Yes', '4', '4', '3', '4', '4', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:14', '2018-03-29 14:09:14'),
(13, 1, 0, 1, 'Week 1', '24', '8', '4', '3', '5', '7', '7', '19', '6', '6', '4', '3', '2', '3', '1', '4', 'No', '4', 'No', '4', '5', '5', '4', 'Yes', 'Yes', '3', '3', '4', '3', '4', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:15', '2018-03-29 14:09:15'),
(14, 1, 0, 1, 'Week 1', '12', '7', '2', '4', '7', '7', '7', '21', '3', '3', '5', '3', '3', '2', '1', '4', 'No', '4', 'No', '4', '4', '5', '4', 'No', 'Yes', '3', '2', '4', '5', '4', '5', '4', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:15', '2018-03-29 14:09:15'),
(15, 1, 0, 1, 'Week 1', '16', '8', '0', '4', '7', '7', '7', '21', '7', '7', '5', '4', '2', '4', '2', '5', 'No', '5', 'No', '4', '5', '5', '5', 'Yes', 'Yes', '4', '3', '4', '4', '3', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:15', '2018-03-29 14:09:15'),
(16, 1, 0, 1, 'Week 1', '29', '8', '4', '4', '7', '7', '7', '21', '5', '6', '5', '1', '1', '1', '1', '5', 'Yes', '5', 'Yes', '4', '5', '5', '4', 'Yes', 'Yes', '3', '3', '3', '3', '3', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:15', '2018-03-29 14:09:15'),
(17, 1, 0, 1, 'Week 1', '14', '7', '2', '4', '7', '5', '7', '19', '7', '7', '3', '3', '3', '3', '3', '5', 'Yes', '4', 'Yes', '4', '5', '5', '4', 'Yes', 'Yes', '3', '3', '4', '4', '5', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:15', '2018-03-29 14:09:15'),
(18, 1, 0, 1, 'Week 1', '15', '7', '4', '3', '5', '5', '7', '17', '7', '7', '5', '3', '3', '3', '3', '4', 'No', '4', 'Yes', '4', '4', '5', '4', 'Yes', 'Yes', '4', '4', '4', '1', '4', '5', '4', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:15', '2018-03-29 14:09:15'),
(19, 1, 0, 1, 'Week 1', '71', '7', '5', '4', '5', '7', '7', '19', '5', '6', '4', '3', '2', '3', '3', '4', 'Yes', '4', 'Yes', '4', '5', '5', '5', 'Yes', 'Yes', '4', '4', '3', '4', '4', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:15', '2018-03-29 14:09:15'),
(20, 1, 0, 1, 'Week 1', '27', '7', '2', '4', '7', '7', '7', '21', '4', '3', '4', '5', '1', '5', '1', '4', 'No', '5', 'No', '4', '5', '5', '4', 'Yes', 'Yes', '4', '4', '4', '4', '5', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:15', '2018-03-29 14:09:15'),
(21, 1, 0, 1, 'Week 1', '91', '8', '1', '3', '7', '5', '7', '19', '3', '7', '2', '4', '3', '5', '5', '5', 'No', '5', 'No', '3', '5', '5', '3', 'Yes', 'No', '4', '5', '3', '3', '3', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:15', '2018-03-29 14:09:15'),
(22, 1, 0, 1, 'Week 1', '3', '8', '2', '4', '4', '7', '7', '18', '2', '2', '5', '1', '2', '1', '1', '3', 'No', '3', 'Yes', '3', '4', '5', '4', 'Yes', 'Yes', '3', '2', '4', NULL, '4', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:15', '2018-03-29 14:09:15'),
(23, 1, 0, 1, 'Week 1', '9', '9', '3', '4', '7', '7', '7', '21', '6', '6', '5', '2', '2', '3', '1', '5', 'Yes', '5', 'Yes', '4', '5', '5', '4', 'Yes', 'Yes', '4', '4', '4', '3', '5', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:15', '2018-03-29 14:09:15'),
(24, 1, 0, 1, 'Week 1', '7', '8', '3', '4', '5', '7', '7', '19', '2', '7', '5', '4', '3', '1', '4', '4', 'Yes', '3', 'No', '4', '5', '5', '4', 'Yes', 'Yes', '4', '3', '4', '5', '5', '5', '4', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:15', '2018-03-29 14:09:15'),
(25, 1, 0, 1, 'Week 1', '82', '8', '2', '4', '4', '6', '7', '17', '2', '3', '4', '3', '3', '3', '1', '4', 'No', '4', 'Yes', '3', '4', '4', '3', 'Yes', 'Yes', '3', '2', '3', '1', '3', '5', '5', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:15', '2018-03-29 14:09:15'),
(26, 1, 0, 1, 'Week 1', '22', '7', '2', '4', '7', '7', '7', '21', '5', '5', '5', '2', '1', '3', '1', '4', 'No', '4', 'No', '4', '4', '4', '4', 'Yes', 'Yes', '4', '4', '4', '3', '5', '5', '4', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:15', '2018-03-29 14:09:15'),
(27, 1, 0, 1, 'Week 1', '4', '7', '0', '4', '6', '5', '7', '18', '0', '0', '5', '4', '4', '4', '4', '4', 'No', '4', 'No', '4', '4', '4', '4', 'Yes', 'Yes', '1', '1', '1', '1', '2', '5', '3', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 14:09:15', '2018-03-29 14:09:15'),
(28, 1, 1, 3, 'Timestamp', 'What is your jersey number?', 'On average, how many hours of sleep did you get each night?', 'How many days did you supplement your sleep with a nap (at least 1 hour)?', 'Overall, rate your nutrition:', 'How many days did you eat breakfast?', 'How many days did you eat lunch?', 'How many days did you eat supper?', 'Total Meals', 'How many days did you have pre-practice/pre-game snacks?', 'How many days did you have a post-practice/post-game snack (refuel)?', 'Rate your hydration', 'What is your overall stress level?', 'What is your stress level caused by Hockey?', 'What is your stress level caused by School?', 'What is your stress level caused by Personal concerns?', 'Rate your strength workouts?', 'Did you do extra strength workouts this week?', 'Rate your cardio workouts?', 'Did you do extra cardio workouts this week?', 'Rate your overall performance in practice', 'Rate your focus during practice', 'Rate your effort during practice', 'Rate your execution during practice', 'Did you do extra skill work before or after practice?', 'Did you watch video this week?', 'Rate your overall game performance?', 'Rate your offensive game performance?', 'Rate your defensive game performance?', 'Rate your special teams game performance?', 'Rate your academic progress', 'Rate your relationship with your teammates', 'Rate your relationship with the staff', 'Rate your relationships in your personal life', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(29, 1, 0, 3, 'Week 1', '30', '8', '2', '5', '7', '7', '7', '21', '4', '7', '3', '1', '1', '1', '2', '5', 'No', '5', 'No', '4', '4', '4', '4', 'Yes', 'Yes', '4', '3', '3', '3', '4', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(30, 1, 0, 3, 'Week 1', '19', '8', '2', '4', '7', '7', '7', '21', '5', '5', '4', '3', '3', '3', '2', '3', 'Yes', '4', 'Yes', '4', '4', '5', '4', 'Yes', 'Yes', '4', '3', '4', '4', '4', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(31, 1, 0, 3, 'Week 1', '31', '7', '1', '4', '5', '7', '7', '19', '5', '5', '4', '3', '3', '4', '2', '3', 'No', '4', 'No', '3', '5', '5', '3', 'No', 'Yes', '4', '3', '3', '3', '4', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(32, 1, 0, 3, 'Week 1', '26', '8', '3', '4', '7', '7', '7', '21', '5', '5', '5', '2', '2', '2', '1', '4', 'No', '4', 'Yes', '4', '4', '4', '3', 'Yes', 'Yes', '3', '2', '4', '4', '4', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(33, 1, 0, 3, 'Week 1', '20', '8', '3', '4', '7', '7', '7', '21', '1', '5', '5', '2', '1', '3', '1', '5', 'No', '5', 'Yes', '5', '5', '5', '5', 'Yes', 'Yes', '3', '3', '4', '5', '5', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(34, 1, 0, 3, 'Week 1', '8', '7', '3', '4', '7', '7', '7', '21', '5', '5', '4', '2', '2', '1', '2', '4', 'No', '3', 'No', '4', '5', '5', '4', 'Yes', 'No', '3', '3', '2', '4', '4', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(35, 1, 0, 3, 'Week 1', '13', '8', '6', '4', '7', '7', '7', '21', '7', '7', '5', '3', '3', '3', '1', '4', 'Yes', '4', 'Yes', '3', '4', '4', '3', 'Yes', 'Yes', '3', '3', '3', '4', '2', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(36, 1, 0, 3, 'Week 1', '17', '8', '2', '5', '6', '6', '7', '19', '5', '6', '5', '4', '3', '5', '3', '4', 'Yes', '4', 'Yes', '4', '5', '5', '4', 'Yes', 'Yes', '4', '3', '4', '5', '4', '5', '4', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(37, 1, 0, 3, 'Week 1', '5', '7', '0', '3', '7', '6', '7', '20', '0', '7', '4', '3', '4', '3', '2', '3', 'No', '4', 'Yes', '3', '4', '5', '4', 'Yes', 'Yes', '4', '3', '4', '4', '3', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(38, 1, 0, 3, 'Week 1', '6', '7', '1', '4', '4', '7', '7', '18', '3', '7', '3', '4', '4', '2', '3', '4', 'No', '4', 'No', '3', '4', '5', '4', 'Yes', 'Yes', '3', '3', '3', '1', '4', '5', '5', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(39, 1, 0, 3, 'Week 1', '11', '8', '2', '3', '5', '7', '7', '19', '6', '6', '4', '3', '2', '4', '3', '3', 'No', '3', 'No', '4', '4', '5', '4', 'Yes', 'Yes', '4', '4', '3', '4', '4', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(40, 1, 0, 3, 'Week 1', '24', '8', '4', '3', '5', '7', '7', '19', '6', '6', '4', '3', '2', '3', '1', '4', 'No', '4', 'No', '4', '5', '5', '4', 'Yes', 'Yes', '3', '3', '4', '3', '4', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(41, 1, 0, 3, 'Week 1', '12', '7', '2', '4', '7', '7', '7', '21', '3', '3', '5', '3', '3', '2', '1', '4', 'No', '4', 'No', '4', '4', '5', '4', 'No', 'Yes', '3', '2', '4', '5', '4', '5', '4', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(42, 1, 0, 3, 'Week 1', '16', '8', '0', '4', '7', '7', '7', '21', '7', '7', '5', '4', '2', '4', '2', '5', 'No', '5', 'No', '4', '5', '5', '5', 'Yes', 'Yes', '4', '3', '4', '4', '3', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(43, 1, 0, 3, 'Week 1', '29', '8', '4', '4', '7', '7', '7', '21', '5', '6', '5', '1', '1', '1', '1', '5', 'Yes', '5', 'Yes', '4', '5', '5', '4', 'Yes', 'Yes', '3', '3', '3', '3', '3', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(44, 1, 0, 3, 'Week 1', '14', '7', '2', '4', '7', '5', '7', '19', '7', '7', '3', '3', '3', '3', '3', '5', 'Yes', '4', 'Yes', '4', '5', '5', '4', 'Yes', 'Yes', '3', '3', '4', '4', '5', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(45, 1, 0, 3, 'Week 1', '15', '7', '4', '3', '5', '5', '7', '17', '7', '7', '5', '3', '3', '3', '3', '4', 'No', '4', 'Yes', '4', '4', '5', '4', 'Yes', 'Yes', '4', '4', '4', '1', '4', '5', '4', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(46, 1, 0, 3, 'Week 1', '71', '7', '5', '4', '5', '7', '7', '19', '5', '6', '4', '3', '2', '3', '3', '4', 'Yes', '4', 'Yes', '4', '5', '5', '5', 'Yes', 'Yes', '4', '4', '3', '4', '4', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(47, 1, 0, 3, 'Week 1', '27', '7', '2', '4', '7', '7', '7', '21', '4', '3', '4', '5', '1', '5', '1', '4', 'No', '5', 'No', '4', '5', '5', '4', 'Yes', 'Yes', '4', '4', '4', '4', '5', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(48, 1, 0, 3, 'Week 1', '91', '8', '1', '3', '7', '5', '7', '19', '3', '7', '2', '4', '3', '5', '5', '5', 'No', '5', 'No', '3', '5', '5', '3', 'Yes', 'No', '4', '5', '3', '3', '3', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(49, 1, 0, 3, 'Week 1', '3', '8', '2', '4', '4', '7', '7', '18', '2', '2', '5', '1', '2', '1', '1', '3', 'No', '3', 'Yes', '3', '4', '5', '4', 'Yes', 'Yes', '3', '2', '4', NULL, '4', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(50, 1, 0, 3, 'Week 1', '9', '9', '3', '4', '7', '7', '7', '21', '6', '6', '5', '2', '2', '3', '1', '5', 'Yes', '5', 'Yes', '4', '5', '5', '4', 'Yes', 'Yes', '4', '4', '4', '3', '5', '5', '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(51, 1, 0, 3, 'Week 1', '7', '8', '3', '4', '5', '7', '7', '19', '2', '7', '5', '4', '3', '1', '4', '4', 'Yes', '3', 'No', '4', '5', '5', '4', 'Yes', 'Yes', '4', '3', '4', '5', '5', '5', '4', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(52, 1, 0, 3, 'Week 1', '82', '8', '2', '4', '4', '6', '7', '17', '2', '3', '4', '3', '3', '3', '1', '4', 'No', '4', 'Yes', '3', '4', '4', '3', 'Yes', 'Yes', '3', '2', '3', '1', '3', '5', '5', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(53, 1, 0, 3, 'Week 1', '22', '7', '2', '4', '7', '7', '7', '21', '5', '5', '5', '2', '1', '3', '1', '4', 'No', '4', 'No', '4', '4', '4', '4', 'Yes', 'Yes', '4', '4', '4', '3', '5', '5', '4', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55'),
(54, 1, 0, 3, 'Week 1', '4', '7', '0', '4', '6', '5', '7', '18', '0', '0', '5', '4', '4', '4', '4', '4', 'No', '4', 'No', '4', '4', '4', '4', 'Yes', 'Yes', '1', '1', '1', '1', '2', '5', '3', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-30 01:53:55', '2018-03-30 01:53:55');

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
(1, 'Admin', 'admin@email.com', '$2y$10$DNGRjh4O08K9WVwBBMgD2.CL8YtH07r0KjtzYeT6yBOOSNfWbP7CG', '25W0bioiQbKZUqYEyRiD71rT8QZp4DHWuPdYCGcatn3tplMEIqxqMonzKVHs', '2017-11-15 08:32:25', '2018-03-30 01:51:17', '2018-03-30 01:51:17'),
(7, 'tapos', 'tapos@email.com', '$2y$10$T0Bn1SEXNGRfv5RMaPkbAur7GU50HGa/7celE/IYTntxNDhUlJwr6', 'dFVGzzGJKgx4K4sTHRMxrvid9gb6chJqsMYwL8KZCEXRy3PrYIIC6wH5Qdtw', '2017-12-04 11:43:59', '2018-04-07 10:25:06', '2018-04-07 10:25:06'),
(9, 'sojib', 'sojib@email.com', '$2y$10$f731SOgc0T9zDS9l9b9ltOlwtRreVYXtCSF/9pwFuprG4qf92aclm', 'KbbSdWOPP7bgvX3g09rpAHUu5m5BXGvMjahSIA54F653rb7D3Hb228UC14ZK', '2017-12-04 11:54:50', '2018-03-28 13:27:35', '2018-03-28 13:27:35'),
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
  `is_dashboard` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_graph_setup`
--

INSERT INTO `user_graph_setup` (`id`, `user_id`, `graph_id`, `graph_name`, `column_name`, `excell_name`, `is_dashboard`, `created_at`, `updated_at`) VALUES
(26, 7, 1, 'Extra Strength', 'Extra Strength', 'r', 1, '2018-03-29 12:49:01', '2018-03-29 12:49:01'),
(27, 7, 2, 'Extra Cardios', 'Extra Cardios', 't', 1, '2018-03-29 12:49:01', '2018-03-29 12:49:01'),
(28, 7, 3, 'Extra Skills', 'Extra Skills', 'y', 1, '2018-03-29 12:49:01', '2018-03-29 12:49:01'),
(29, 7, 4, 'Watch Videos', 'Watch Videos', 'z', 1, '2018-03-29 12:49:01', '2018-03-29 12:49:01'),
(30, 7, 1, 'Nutrition', 'Breakfast', 'f', 0, '2018-04-05 22:14:40', '2018-04-05 22:14:40'),
(31, 7, 1, 'Nutrition', 'Lunch', 'g', 0, '2018-04-05 22:14:40', '2018-04-05 22:14:40'),
(32, 7, 1, 'Nutrition', 'Dinner', 'h', 0, '2018-04-05 22:14:40', '2018-04-05 22:14:40'),
(33, 7, 1, 'Nutrition', 'Total Meats', 'i', 0, '2018-04-05 22:14:40', '2018-04-05 22:14:40'),
(34, 7, 1, 'Nutrition', 'Nutrition', 'e', 0, '2018-04-05 22:14:40', '2018-04-05 22:14:40'),
(35, 7, 2, 'Sleep', 'Hour of Sleep', 'c', 0, '2018-04-05 22:14:40', '2018-04-05 22:14:40'),
(36, 7, 2, 'Sleep', 'Naps', 'd', 0, '2018-04-05 22:14:40', '2018-04-05 22:14:40'),
(37, 7, 3, 'Stress', 'Total Stress Level', 'm', 0, '2018-04-05 22:14:40', '2018-04-05 22:14:40'),
(38, 7, 3, 'Stress', 'Stress from Hockey', 'n', 0, '2018-04-05 22:14:40', '2018-04-05 22:14:40'),
(39, 7, 3, 'Stress', 'Stress from School', 'o', 0, '2018-04-05 22:14:40', '2018-04-05 22:14:40'),
(40, 7, 3, 'Stress', 'Stress from Personal', 'p', 0, '2018-04-05 22:14:40', '2018-04-05 22:14:40'),
(41, 7, 4, 'Extra Work', 'Extra Strength', 'r', 0, '2018-04-05 22:14:40', '2018-04-05 22:14:40'),
(42, 7, 4, 'Extra Work', 'Extra Cardio', 't', 0, '2018-04-05 22:14:40', '2018-04-05 22:14:40'),
(43, 7, 4, 'Extra Work', 'Extra Skill', 'y', 0, '2018-04-05 22:14:40', '2018-04-05 22:14:40'),
(44, 7, 4, 'Extra Work', 'Watch Video', 'z', 0, '2018-04-05 22:14:40', '2018-04-05 22:14:40'),
(45, 7, 5, 'Relationship', 'Relationship Teammates', 'af', 0, '2018-04-05 22:14:40', '2018-04-05 22:14:40'),
(46, 7, 5, 'Relationship', 'Relationship Staff', 'ag', 0, '2018-04-05 22:14:40', '2018-04-05 22:14:40'),
(47, 7, 5, 'Relationship', 'Relationship Personal Life', 'ah', 0, '2018-04-05 22:14:40', '2018-04-05 22:14:40');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
