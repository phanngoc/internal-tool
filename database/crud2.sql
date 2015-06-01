-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2015 at 04:42 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crud1`
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `configures`
--

INSERT INTO `configures` (`id`, `name`, `value`, `description`, `created_at`, `updated_at`) VALUES
(3, 'system_name', 'Internal Tool', 'Name system', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'default_language', 'Japanese', 'Default Language 1', '0000-00-00 00:00:00', '2015-05-29 02:40:58');

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
  `_rgt` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name_feature`, `description`, `url_action`, `parent_id`, `module_id`, `is_menu`, `created_at`, `updated_at`, `_lft`, `_rgt`) VALUES
(21, 'Edit User', 'edituser', '["users.show","users.update"]', 21, 1, 0, '2015-05-23 18:48:26', '2015-05-28 02:18:45', 0, 12),
(22, 'Add User', 'add User description', '["users.create","users.store"]', 22, 1, 0, '2015-05-23 18:48:26', '2015-05-28 02:08:16', 1, 7),
(23, 'Delete User', 'Delete User description', 'users.destroy', 0, 1, 0, '2015-05-23 18:48:26', '2015-05-23 18:48:26', 8, 11),
(24, 'List Group', 'List Group description 1', 'groups.index', 24, 2, 0, '2015-05-23 18:48:26', '2015-05-29 02:33:09', 2, 4),
(25, 'Edit Group', 'Edit Group description', '["groups.show","groups.update"]', 0, 2, 0, '2015-05-23 18:48:26', '2015-05-23 18:48:26', 9, 10),
(30, 'Delete Group', 'Delete Group description', 'groups.destroy', 0, 2, 0, '2015-05-26 02:22:45', '2015-05-26 02:22:45', 3, 3),
(31, 'Add Group', 'Add Group description', '["groups.create","groups.store"]', 0, 2, 0, '2015-05-27 19:17:14', '2015-05-27 19:17:14', 5, 6),
(32, 'List User', 'List User descripiton', 'users.index', 0, 1, 0, '2015-05-27 19:17:54', '2015-05-27 19:17:54', 13, 14),
(33, 'Edit Module', 'Edit Module description', '["modules.show","modules.update"]', 0, 3, 0, '2015-05-23 18:48:26', '2015-05-23 18:48:26', 0, 0),
(34, 'Add Module', 'Add Module description', '["modules.create","modules.store"]', 0, 3, 0, '2015-05-23 18:48:26', '2015-05-23 18:48:26', 0, 0),
(35, 'Delete Module', 'Delete Module description', 'modules.destroy', 0, 3, 0, '2015-05-23 18:48:26', '2015-05-23 18:48:26', 0, 0),
(36, 'List Module', 'List Module description', 'modules.index', 0, 3, 0, '2015-05-23 18:48:26', '2015-05-23 18:48:26', 0, 0),
(37, 'List Feature', 'List Feature description', 'features.index', 0, 4, 0, '2015-05-23 18:48:26', '2015-05-23 18:48:26', 0, 0),
(38, 'Add Feature', 'Add Feature description', '["features.create","features.store"]', 0, 4, 0, '2015-05-23 18:48:26', '2015-05-23 18:48:26', 0, 0),
(39, 'Edit Feature', 'Edit Feature description', '["features.show","features.update"]', 0, 4, 0, '2015-05-23 18:48:26', '2015-05-23 18:48:26', 0, 0),
(40, 'Delete Feature', 'Delete Feature description', 'features.destroy', 0, 4, 0, '2015-05-23 18:48:26', '2015-05-23 18:48:26', 0, 0),
(41, 'Set Permission Group', 'Set Permission Group', 'groups.permission', 0, 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(45, 'View language setting', '', 'languages.index', 0, 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(46, 'Change language setting', '', 'languages.change', 0, 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(47, 'View Translate', '', 'translate.index', 0, 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(48, 'Translate Language', '', 'translate.update', 0, 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(49, 'View system config', '', 'configures.index', 0, 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(50, 'Change configure system', '', '["configures.show","configures.update"]', 0, 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `groupname`, `description`, `created_at`, `updated_at`) VALUES
(6, 'Dev', 'Developer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Test', 'Tester', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Manager', 'Manager1', '0000-00-00 00:00:00', '2015-05-29 02:49:36'),
(9, 'Compoter', 'compoter', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Account', 'accountant', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Manager project', 'Manager project', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group_features`
--

INSERT INTO `group_features` (`id`, `feature_id`, `group_id`, `created_at`, `updated_at`) VALUES
(6, 22, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 23, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 25, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 30, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 31, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 32, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 32, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 33, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 34, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 35, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 36, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 37, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 38, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 39, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 40, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 21, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 21, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 21, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 41, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 22, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 31, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 41, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 45, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 46, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 47, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 48, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 49, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 50, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 24, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(1, 'English', 'en', 1, '2015-05-27 07:36:24', '2015-05-29 02:56:31'),
(2, 'Japanese', 'jp', 0, '2015-05-27 07:36:36', '2015-05-29 02:56:31');

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
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `description`, `version`, `created_at`, `updated_at`) VALUES
(1, 'Users', 'dsada', '1.0', '2015-05-22 02:49:52', '2015-05-22 02:07:32'),
(2, 'Groups', 'Group Modules', '1.0', '2015-05-22 02:50:06', '2015-05-22 02:50:07'),
(3, 'Module', 'Module', '1.1', '2015-05-22 02:50:22', '2015-05-22 02:50:23'),
(4, 'Module Feature', 'Module Feature', '1.0', '2015-05-22 02:14:28', '2015-05-22 02:14:28'),
(5, 'Module Setting', 'Description module setting', '1.0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Phan Ngoc', 'phann123', '$2y$10$H58SrwkrQ6GDpCp.OHLjaeOzbviu4rwdq6QE3H/xket6MThY2JweW', 'phann123@yahoo.com', 'UavOmiwVuX9Qw4hoDgmas9bYg2orkfwgPZcCU0tSe8UABE7NpnjfhkxBODWx', '2015-05-27 20:53:14', '2015-05-28 21:39:31'),
(7, 'phan duc thiet', 'thietdn', '$2y$10$OpbkYuX8O6F.wGYEKO9Mu.Lq4UFPNc7Xy7mJJKBL75u43VeAqPz.W', 'ducthietk16@gmail.com', 'UAnMiKK5tGI0XhmcheTWbKIHtllJaldR274tMBCQ6l59DhMczaM2DKX7yAs4', '2015-05-27 21:58:51', '2015-05-28 20:06:57'),
(8, 'pham nhat', 'nhatpd', '$2y$10$v7hL6eTASJQyiQQ5VHfiGOn2SvWdk8f9RdMXwgQj9UH5mMU1V9BSe', 'nhatpd@gmail.com', NULL, '2015-05-28 01:47:13', '2015-05-28 01:47:13');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`, `created_at`, `updated_at`) VALUES
(13, 6, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 7, 10, '2015-05-27 21:58:51', '2015-05-27 21:58:51'),
(18, 8, 6, '2015-05-28 01:47:13', '2015-05-28 01:47:13'),
(19, 8, 7, '2015-05-28 01:47:13', '2015-05-28 01:47:13');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configures`
--
ALTER TABLE `configures`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `group_features`
--
ALTER TABLE `group_features`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
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
ADD CONSTRAINT `user_group_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
ADD CONSTRAINT `user_group_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
