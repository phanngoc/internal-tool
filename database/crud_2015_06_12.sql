-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2015 at 04:35 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `configures`
--

CREATE TABLE IF NOT EXISTS `configures` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `configures`
--

INSERT INTO `configures` (`id`, `name`, `value`, `description`, `created_at`, `updated_at`) VALUES
(3, 'system_name', '1Internal Tool', 'Name system', '0000-00-00 00:00:00', '2015-06-11 10:25:37'),
(4, 'default_language', 'en', 'Default Language 1', '0000-00-00 00:00:00', '2015-06-11 10:25:37'),
(5, 'system_description', 'Internal Tool description', '', '0000-00-00 00:00:00', '2015-06-11 10:25:37'),
(6, 'format_date', 'yyyy/dd/mm', '', '0000-00-00 00:00:00', '2015-06-11 10:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE IF NOT EXISTS `features` (
`id` int(10) unsigned NOT NULL,
  `name_feature` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) NOT NULL,
  `module_id` int(10) unsigned NOT NULL,
  `is_menu` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `_lft` int(11) NOT NULL,
  `_rgt` int(11) NOT NULL,
  `order` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name_feature`, `description`, `url_action`, `parent_id`, `module_id`, `is_menu`, `created_at`, `updated_at`, `_lft`, `_rgt`, `order`) VALUES
(21, 'Edit User', 'edituser', '["users.show","users.update"]', 71, 3, 0, '2015-05-23 18:48:26', '2015-06-11 11:38:17', 40, -8, 0),
(23, 'Delete User', 'Delete User description', 'users.destroy', 71, 3, 0, '2015-05-23 18:48:26', '2015-06-11 11:38:41', 280, 281, 0),
(24, 'List Group', 'List Group description 11235555555555', 'groups.index', 24, 3, 1, '2015-05-23 18:48:26', '2015-06-11 19:20:03', 129, 130, 0),
(25, 'Edit Group', 'Edit Group description', '["groups.show","groups.update"]', 72, 3, 0, '2015-05-23 18:48:26', '2015-06-11 11:39:06', 131, 132, 0),
(30, 'Delete Group', 'Delete Group description', 'groups.destroy', 72, 3, 0, '2015-05-26 02:22:45', '2015-06-11 11:39:17', 133, 133, 0),
(31, 'Add Group', 'Add Group description', '["groups.create","groups.store"]', 72, 3, 1, '2015-05-27 19:17:14', '2015-06-11 11:39:25', 134, 135, 0),
(32, 'List User', 'List User descripiton', 'users.index', 71, 3, 1, '2015-05-27 19:17:54', '2015-06-11 11:39:33', 282, 283, 0),
(33, 'Edit Module', 'Edit Module description', '["modules.show","modules.update"]', 74, 3, 0, '2015-05-23 18:48:26', '2015-06-11 11:39:41', 40, 40, 0),
(34, 'Add Module', 'Add Module description', '["modules.create","modules.store"]', 74, 3, 1, '2015-05-23 18:48:26', '2015-06-11 11:39:55', 40, 40, 0),
(35, 'Delete Module', 'Delete Module description', 'modules.destroy', 74, 3, 0, '2015-05-23 18:48:26', '2015-06-11 11:40:02', 40, 40, 0),
(36, 'List Module', 'List Module description', 'modules.index', 74, 3, 1, '2015-05-23 18:48:26', '2015-06-11 11:40:09', 40, 40, 0),
(37, 'List Feature', 'List Feature description', 'features.index', 73, 3, 1, '2015-05-23 18:48:26', '2015-06-11 11:40:17', 40, 40, 0),
(38, 'Add Feature', 'Add Feature description', '["features.create","features.store"]', 0, 3, 1, '2015-05-23 18:48:26', '2015-05-23 18:48:26', 40, 40, 0),
(39, 'Edit Feature', 'Edit Feature description', '["features.show","features.update"]', 0, 3, 0, '2015-05-23 18:48:26', '2015-05-23 18:48:26', 40, 40, 0),
(40, 'Delete Feature', 'Delete Feature description', 'features.destroy', 0, 3, 0, '2015-05-23 18:48:26', '2015-05-23 18:48:26', 40, 40, 0),
(41, 'Set Permission Group', 'Set Permission Group', 'groups.permission', 0, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 40, 40, 0),
(45, 'View language setting', '', 'languages.index', 0, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 40, 40, 0),
(46, 'Change language setting', '', 'languages.change', 0, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 40, 40, 0),
(47, 'View Translate', '', 'translate.index', 0, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 40, 40, 0),
(48, 'Translate Language', '', 'translate.update', 0, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 40, 40, 0),
(49, 'View system config', '', 'configures.index', 49, 3, 1, '0000-00-00 00:00:00', '2015-06-11 19:03:07', 40, 40, 0),
(50, 'Change configure system', '', 'configures.update', 50, 3, 0, '0000-00-00 00:00:00', '2015-06-11 09:11:25', 40, 40, 0),
(53, 'Edit Project', 'Edit Project', 'projects.update', 0, 1, 0, '2015-06-11 03:00:00', '2015-06-10 20:58:35', 266, 266, 0),
(54, 'List Project', 'List  Project', 'projects.index', 0, 1, 1, '2015-06-05 02:24:22', '2015-06-10 20:59:50', 269, 270, 0),
(55, 'Delete Project', 'Delete Project', 'projects.destroy', 55, 1, 0, '2015-06-10 20:59:13', '2015-06-11 08:59:18', 267, 268, 0),
(56, 'Add Project', 'Add Project', '["projects.create","projects.store"]', 0, 1, 1, '2015-06-10 21:00:39', '2015-06-10 21:08:52', 277, 278, 0),
(57, 'List Status Project', 'List Status Project', 'statusprojects.index', 0, 1, 0, '2015-06-10 21:02:13', '2015-06-10 21:02:13', 271, 272, 0),
(58, 'Add Status Project', 'Add Status Project', '["statusprojects.create","statusprojects.store"]', 58, 1, 0, '2015-06-10 21:03:46', '2015-06-10 21:04:21', 273, 274, 0),
(59, 'Edit Status Project', 'Edit Status Project', '["statusprojects.show","statusprojects.update"]', 0, 1, 0, '2015-06-10 21:08:18', '2015-06-10 21:08:18', 275, 276, 0),
(60, 'Delete Status Project', 'Delete Status Project', 'statusprojects.destroy', 60, 1, 0, '2015-06-10 21:09:28', '2015-06-11 08:59:06', 279, 127, 0),
(61, 'List HR', 'List Human Resources', 'employee', 0, 2, 1, '2015-06-10 21:11:14', '2015-06-10 21:11:14', 128, 136, 0),
(62, 'Add HR', 'Add Human Resources', '["employee.create","employee.store"]', 0, 2, 0, '2015-06-10 21:12:12', '2015-06-10 21:12:12', 137, 41, 0),
(63, 'Edit HR', 'Edit Human Resources', '["employee.show","employee.update"]', 0, 2, 0, '2015-06-10 21:13:19', '2015-06-10 21:13:19', 42, 43, 0),
(64, 'Delete HR', 'Delete Human Resources', 'deleteemployee', 64, 2, 0, '2015-06-10 21:13:37', '2015-06-11 08:58:56', 44, 45, 0),
(65, 'List Position', '', 'position.index', 0, 2, 0, '2015-06-10 21:17:34', '2015-06-10 21:17:34', 46, 47, 0),
(67, 'Edit Position', '', '["position.show","position.update"]', 0, 2, 0, '2015-06-10 21:19:13', '2015-06-10 21:19:13', 48, 49, 0),
(68, 'Add Position', '', '["position.create","position.store"]', 0, 2, 0, '2015-06-10 21:19:41', '2015-06-10 21:19:41', 50, 51, 0),
(69, 'Delete Position', '', 'position.destroy', 69, 2, 0, '2015-06-10 21:19:57', '2015-06-11 08:58:31', 52, 53, 0),
(70, 'Sidebar', 'Sidebar menu left', 'admin.sidebar', 0, 3, 0, '2015-06-11 09:16:44', '2015-06-11 09:16:44', 54, 55, 0),
(71, 'User', 'Action User', 'users.index', 0, 3, 0, '2015-06-11 11:35:46', '2015-06-11 11:36:11', 56, 127, 0),
(72, 'Group', 'Action Group', 'groups.index', 0, 3, 0, '2015-06-11 11:36:36', '2015-06-11 11:36:36', 128, 136, 0),
(73, 'Feature', 'Action Feature', 'features.index', 0, 3, 0, '2015-06-11 11:37:00', '2015-06-11 11:37:00', 137, 41, 0),
(74, 'Module', 'Action Module', 'modules.index', 0, 3, 0, '2015-06-11 11:37:39', '2015-06-11 11:37:39', 42, 43, 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` int(10) unsigned NOT NULL,
  `groupname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `groupname`, `description`, `created_at`, `updated_at`) VALUES
(6, 'Dev', 'Developer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Test', 'Tester', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Manager', 'Manager1', '0000-00-00 00:00:00', '2015-05-29 02:49:36'),
(9, 'Compoter', 'compoter', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Manager project', 'Manager project', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Project Manager', 'kjkajsldjlczcz', '2015-06-04 01:23:11', '2015-06-04 01:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `group_features`
--

CREATE TABLE IF NOT EXISTS `group_features` (
`id` int(10) unsigned NOT NULL,
  `feature_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group_features`
--

INSERT INTO `group_features` (`id`, `feature_id`, `group_id`, `created_at`, `updated_at`) VALUES
(21, 38, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 39, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 40, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 41, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 41, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 45, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 46, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 47, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 48, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 49, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 41, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 38, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 39, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 40, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 45, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 46, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 47, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 48, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 49, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 61, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 62, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 63, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 65, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 67, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 68, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 56, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 64, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 69, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 50, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 70, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 53, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 54, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 55, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 57, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 58, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 59, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 60, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 24, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 21, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 23, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 25, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 30, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 31, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 32, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 33, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 34, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 35, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 36, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 37, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 71, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 72, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 73, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 74, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
`id` int(10) unsigned NOT NULL,
  `language_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language_name`, `code`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 1, '2015-05-27 07:36:24', '2015-06-11 10:25:37'),
(2, 'Japanese', 'jp', 0, '2015-05-27 07:36:36', '2015-06-11 10:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2015_05_18_173604_create_groups_table', 1),
('2015_05_19_083616_create_users_table', 1),
('2015_05_22_023554_create_user_group_table', 1),
('2015_05_22_023829_create_modules_table', 1),
('2015_05_22_023958_create_features_table', 1),
('2015_05_28_011830_create_group_features_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `description`, `version`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Project', 'Project ', '1.0', 0, '2015-05-22 02:49:52', '2015-06-10 20:44:20'),
(2, 'Human Resources', 'Human resources', '1.0', 0, '2015-05-22 02:50:06', '2015-06-11 11:28:26'),
(3, 'Core Seting', 'Core seting', '1.1', 0, '2015-05-22 02:50:22', '2015-06-10 20:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`, `description`, `updated_at`, `created_at`) VALUES
(1, 'Developer', 'Day la mot developer ne', '2015-06-08 11:46:59', '0000-00-00 00:00:00'),
(2, 'Manager', 'Day la manager', '2015-06-08 18:46:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
`id` int(10) unsigned NOT NULL,
  `projectname` varchar(200) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `comments` varchar(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `projectname`, `startdate`, `enddate`, `user_id`, `comments`, `status_id`, `created_at`, `updated_at`) VALUES
(5, 'Name new', '2015-06-25', '2015-06-30', 12, '123', 1, '2015-06-05', '2015-06-10'),
(8, 'aaaaaaaaaaa', '0000-00-00', '0000-00-00', 12, 'no comment', 1, '2015-06-08', '2015-06-09'),
(9, 'zzzzzzzzz', '0000-00-00', '0000-00-00', 8, 'chưa có gì', 5, '2015-06-08', '2015-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `projectstatus`
--

CREATE TABLE IF NOT EXISTS `projectstatus` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projectstatus`
--

INSERT INTO `projectstatus` (`id`, `name`) VALUES
(1, 'Open'),
(2, 'In Progess'),
(3, 'Feedback'),
(4, 'Resolved'),
(5, 'Closed');

-- --------------------------------------------------------

--
-- Table structure for table `timesheets`
--

CREATE TABLE IF NOT EXISTS `timesheets` (
  `id` int(11) NOT NULL,
  `tasksname` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `duration` date NOT NULL,
  `project_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Phan Ngoc', 'phann123', '$2y$10$H58SrwkrQ6GDpCp.OHLjaeOzbviu4rwdq6QE3H/xket6MThY2JweW', 'phann123@yahoo.com', 'HvXLPCKLqM6Hd8OgCX5cxdX1jfPziwb7Kob90cN9vgKQvrN2CxKN59hNrseQ', '2015-05-27 20:53:14', '2015-06-04 21:26:47'),
(7, 'phan duc thiet', 'thietdn', '$2y$10$OpbkYuX8O6F.wGYEKO9Mu.Lq4UFPNc7Xy7mJJKBL75u43VeAqPz.W', 'ducthietk16@gmail.com', 'tZfvXxMm6r91qo8j5eNb1fIAzpiuyhYze3zCLgAp47qUe841oHlTO5ncjGDP', '2015-05-27 21:58:51', '2015-06-03 01:17:50'),
(8, 'pham nhat', 'nhatpd', '$2y$10$v7hL6eTASJQyiQQ5VHfiGOn2SvWdk8f9RdMXwgQj9UH5mMU1V9BSe', 'nhatpd@gmaeqweqweqil.com', NULL, '2015-05-28 01:47:13', '2015-06-03 02:25:13'),
(9, 'Nguyen Van Thinh', 'vanthinhhh', '$2y$10$rRBvMjikw1CzOqsraP58Vu1AV6hzTzxrOsorjoPE4Bgwt6R8q6COG', 'laypassmail@gmail.com123', NULL, '2015-06-08 19:58:57', '2015-06-08 19:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`, `created_at`, `updated_at`) VALUES
(21, 6, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 9, 8, '2015-06-08 19:58:57', '2015-06-08 19:58:57'),
(27, 6, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_project`
--

CREATE TABLE IF NOT EXISTS `user_project` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  `joined` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_project`
--

INSERT INTO `user_project` (`id`, `user_id`, `project_id`, `group_id`, `joined`, `created_at`, `updated_at`) VALUES
(1, 9, 2, 6, '2015-06-01', '0000-00-00 00:00:00', '2015-06-10 01:24:43'),
(2, 7, 2, 7, '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 6, 2, 6, '2015-06-09', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 7, 5, 8, '0000-00-00', '2015-06-08 17:00:00', '0000-00-00 00:00:00'),
(6, 8, 5, 8, '0000-00-00', '2015-06-08 17:00:00', '0000-00-00 00:00:00'),
(8, 6, 13, 10, '2014-01-01', '2015-06-09 02:33:08', '2015-06-09 02:44:55'),
(10, 9, 2, 6, '2010-01-01', '2015-06-09 03:03:35', '2015-06-09 03:03:35'),
(11, 6, 36, 6, '2222-02-02', '2015-06-09 19:14:27', '2015-06-09 19:14:27'),
(12, 7, 36, 8, '2121-01-01', '2015-06-09 19:14:39', '2015-06-09 19:14:39'),
(13, 6, 8, 8, '2015-06-17', '2015-06-11 11:25:26', '2015-06-11 11:25:44'),
(14, 9, 8, 10, '2015-06-14', '2015-06-11 11:25:58', '2015-06-11 11:25:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configures`
--
ALTER TABLE `configures`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
 ADD PRIMARY KEY (`id`), ADD KEY `features_module_id_foreign` (`module_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_features`
--
ALTER TABLE `group_features`
 ADD PRIMARY KEY (`id`), ADD KEY `group_features_feature_id_foreign` (`feature_id`), ADD KEY `group_features_group_id_foreign` (`group_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projectstatus`
--
ALTER TABLE `projectstatus`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
 ADD PRIMARY KEY (`id`), ADD KEY `user_group_user_id_foreign` (`user_id`), ADD KEY `user_group_group_id_foreign` (`group_id`);

--
-- Indexes for table `user_project`
--
ALTER TABLE `user_project`
 ADD PRIMARY KEY (`id`), ADD KEY `user_project_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configures`
--
ALTER TABLE `configures`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `group_features`
--
ALTER TABLE `group_features`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `projectstatus`
--
ALTER TABLE `projectstatus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `user_project`
--
ALTER TABLE `user_project`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `features`
--
ALTER TABLE `features`
ADD CONSTRAINT `features_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`);

--
-- Constraints for table `group_features`
--
ALTER TABLE `group_features`
ADD CONSTRAINT `group_features_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`),
ADD CONSTRAINT `group_features_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- Constraints for table `user_group`
--
ALTER TABLE `user_group`
ADD CONSTRAINT `user_group_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- Constraints for table `user_project`
--
ALTER TABLE `user_project`
ADD CONSTRAINT `user_project_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
