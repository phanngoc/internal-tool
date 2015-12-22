-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2015 at 11:05 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internal-tool`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement_awards`
--

CREATE TABLE `achievement_awards` (
  `id` int(11) NOT NULL,
  `achievement_award` text NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `calendars`
--

CREATE TABLE `calendars` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `n1` varchar(50) NOT NULL,
  `n2` varchar(50) NOT NULL,
  `n3` varchar(50) NOT NULL,
  `n4` varchar(50) NOT NULL,
  `n5` varchar(50) NOT NULL,
  `n6` varchar(50) NOT NULL,
  `n7` varchar(50) NOT NULL,
  `n8` varchar(50) NOT NULL,
  `n9` varchar(50) NOT NULL,
  `n10` varchar(50) NOT NULL,
  `n11` varchar(50) NOT NULL,
  `n12` varchar(50) NOT NULL,
  `n13` varchar(50) NOT NULL,
  `n14` varchar(50) NOT NULL,
  `n15` varchar(50) NOT NULL,
  `n16` varchar(50) NOT NULL,
  `n17` varchar(50) NOT NULL,
  `n18` varchar(50) NOT NULL,
  `n19` varchar(50) NOT NULL,
  `n20` varchar(50) NOT NULL,
  `n21` varchar(50) NOT NULL,
  `n22` varchar(50) NOT NULL,
  `n23` varchar(50) NOT NULL,
  `n24` varchar(50) NOT NULL,
  `n25` varchar(50) NOT NULL,
  `n26` varchar(50) NOT NULL,
  `n27` varchar(50) NOT NULL,
  `n28` varchar(50) NOT NULL,
  `n29` varchar(50) NOT NULL,
  `n30` varchar(50) NOT NULL,
  `n31` varchar(50) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calendars`
--

INSERT INTO `calendars` (`id`, `employee_id`, `n1`, `n2`, `n3`, `n4`, `n5`, `n6`, `n7`, `n8`, `n9`, `n10`, `n11`, `n12`, `n13`, `n14`, `n15`, `n16`, `n17`, `n18`, `n19`, `n20`, `n21`, `n22`, `n23`, `n24`, `n25`, `n26`, `n27`, `n28`, `n29`, `n30`, `n31`, `month`, `year`, `updated_at`, `created_at`) VALUES
(1, 4, 'P', 'A', 'P', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 2014, '2015-06-21 02:07:14', '0000-00-00 00:00:00'),
(2, 6, 'P', 'A', 'P', 'P', 'P', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 2014, '2015-06-21 02:07:14', '0000-00-00 00:00:00'),
(3, 7, 'P', 'S', 'A', 'P', 'P', 'P', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 2014, '2015-06-21 02:07:14', '0000-00-00 00:00:00'),
(4, 8, 'P', 'P', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 2014, '2015-06-21 02:07:14', '0000-00-00 00:00:00'),
(5, 9, 'P', 'A', 'P', 'C', 'D', 'C', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 2014, '2015-06-21 02:07:14', '0000-00-00 00:00:00'),
(6, 10, 'A', 'A', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 2014, '2015-06-21 02:07:14', '0000-00-00 00:00:00'),
(7, 11, 'V', 'V', 'A', 'V', 'V', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 2014, '2015-06-21 02:07:14', '0000-00-00 00:00:00'),
(8, 12, 'V', 'V', 'A', 'V', '', '', '', '', '', '', '', '', '', 'A', '', '', '', '', '', '', 'V', '', '', '', '', '', '', '', '', '', '', 12, 2014, '2015-06-21 02:07:14', '0000-00-00 00:00:00'),
(9, 13, 'V', 'V', 'V', 'A', 'V', 'A', 'P', '', '', 'P', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 2014, '2015-06-21 02:07:14', '0000-00-00 00:00:00'),
(10, 14, 'V', 'B', 'A', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 2014, '2015-06-21 02:07:14', '0000-00-00 00:00:00'),
(11, 15, 'V', 'N', 'N', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'N', '', '', '', '', '', '', '', '', 'N', '', '', 12, 2014, '2015-06-21 02:07:14', '0000-00-00 00:00:00'),
(12, 4, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, 2015, '2015-06-20 19:07:32', '2015-06-20 19:07:32'),
(13, 6, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, 2015, '2015-06-20 19:07:32', '2015-06-20 19:07:32'),
(14, 7, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, 2015, '2015-06-20 19:07:32', '2015-06-20 19:07:32'),
(15, 8, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, 2015, '2015-06-20 19:07:32', '2015-06-20 19:07:32'),
(16, 9, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, 2015, '2015-06-20 19:07:33', '2015-06-20 19:07:33'),
(17, 10, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, 2015, '2015-06-20 19:07:33', '2015-06-20 19:07:33'),
(18, 11, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, 2015, '2015-06-20 19:07:33', '2015-06-20 19:07:33'),
(19, 12, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, 2015, '2015-06-20 19:07:33', '2015-06-20 19:07:33'),
(20, 13, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, 2015, '2015-06-20 19:07:33', '2015-06-20 19:07:33'),
(21, 14, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, 2015, '2015-06-20 19:07:33', '2015-06-20 19:07:33'),
(22, 15, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, 2015, '2015-06-20 19:07:33', '2015-06-20 19:07:33'),
(34, 4, '', '', 'A', 'P', 'A', 'H', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 6, 2015, '2015-06-21 02:26:34', '2015-06-21 02:17:47'),
(35, 6, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 6, 2015, '2015-06-21 02:17:47', '2015-06-21 02:17:47'),
(36, 7, '', '', 'H', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 6, 2015, '2015-06-21 02:26:03', '2015-06-21 02:17:47'),
(37, 8, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 6, 2015, '2015-06-21 02:17:47', '2015-06-21 02:17:47'),
(38, 9, '', 'H', '', '', 'H', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 6, 2015, '2015-06-21 02:20:31', '2015-06-21 02:17:47'),
(39, 10, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 6, 2015, '2015-06-21 02:17:47', '2015-06-21 02:17:47'),
(40, 11, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 6, 2015, '2015-06-21 02:17:47', '2015-06-21 02:17:47'),
(41, 12, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 6, 2015, '2015-06-21 02:17:47', '2015-06-21 02:17:47'),
(42, 13, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 6, 2015, '2015-06-21 02:17:47', '2015-06-21 02:17:47'),
(43, 14, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 6, 2015, '2015-06-21 02:17:48', '2015-06-21 02:17:48'),
(44, 15, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 6, 2015, '2015-06-21 02:17:48', '2015-06-21 02:17:48'),
(45, 4, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 2015, '2015-12-18 00:39:58', '2015-12-18 00:39:58'),
(46, 6, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 2015, '2015-12-18 00:39:59', '2015-12-18 00:39:59'),
(47, 7, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 2015, '2015-12-18 00:39:59', '2015-12-18 00:39:59'),
(48, 8, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 2015, '2015-12-18 00:39:59', '2015-12-18 00:39:59'),
(49, 9, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 2015, '2015-12-18 00:39:59', '2015-12-18 00:39:59'),
(50, 10, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 2015, '2015-12-18 00:39:59', '2015-12-18 00:39:59'),
(51, 11, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 2015, '2015-12-18 00:39:59', '2015-12-18 00:39:59'),
(52, 12, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 2015, '2015-12-18 00:39:59', '2015-12-18 00:39:59'),
(53, 13, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 2015, '2015-12-18 00:39:59', '2015-12-18 00:39:59'),
(54, 14, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 2015, '2015-12-18 00:39:59', '2015-12-18 00:39:59'),
(55, 15, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 2015, '2015-12-18 00:39:59', '2015-12-18 00:39:59'),
(56, 21, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 2015, '2015-12-18 00:39:59', '2015-12-18 00:39:59'),
(57, 22, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 12, 2015, '2015-12-18 00:39:59', '2015-12-18 00:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_submit` date NOT NULL,
  `status_record_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `time_interview` date NOT NULL,
  `time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `first_name`, `last_name`, `date_of_birth`, `phone`, `email`, `date_submit`, `status_record_id`, `comment`, `time_interview`, `time`, `created_at`, `updated_at`) VALUES
(1, 'phan', 'bom', '2015-07-14', '+343403242343', 'phann123@yahoo.com', '2015-07-01', 1, 'Hello word', '2015-07-06', '', '2015-07-06 03:52:36', '2015-07-14 19:15:17'),
(3, 'phan', 'nhan', '2015-07-13', '+84343434444', 'phann123@yahoo.com', '2015-07-19', 3, '', '2015-07-06', '2:15am', '2015-07-07 19:29:02', '2015-07-19 02:25:50'),
(4, 'anh', 'tuan', '2015-07-08', '+8423423444', 'phann34@gmail.com', '2015-07-13', 3, 'ko comment', '2015-07-06', '1:00am', '2015-07-09 01:25:26', '2015-07-09 19:16:47'),
(5, 'trang', 'phan', '2015-07-13', '+846003222', 'tuananh@gmail.com', '2015-07-06', 4, 'ko co  comment nhe', '2015-07-20', '', '2015-07-09 01:25:26', '0000-00-00 00:00:00'),
(9, 'asdasd', 'asdegr', '2015-07-08', '+343403242343', 'phann123@yahoo.com', '2015-07-28', 1, '', '0000-00-00', '', '2015-07-12 18:31:10', '2015-07-12 18:31:10'),
(10, '', '', '1970-01-01', '', '', '2015-07-28', 1, '', '0000-00-00', '', '2015-07-13 20:44:50', '2015-07-13 20:44:50'),
(12, 'sadasd', 'sadsd', '2015-07-21', '+84343434444', 'phann123@gmail.com', '2015-07-15', 1, '', '0000-00-00', '', '2015-07-13 20:47:51', '2015-07-13 20:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_positions`
--

CREATE TABLE `candidate_positions` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `candidate_positions`
--

INSERT INTO `candidate_positions` (`id`, `candidate_id`, `position_id`, `created_at`, `updated_at`) VALUES
(2, 2, 1, '2015-07-06 06:52:02', '0000-00-00 00:00:00'),
(6, 3, 0, '2015-07-08 03:05:27', '0000-00-00 00:00:00'),
(7, 3, 1, '2015-07-08 03:05:27', '0000-00-00 00:00:00'),
(8, 1, 1, '2015-07-08 07:37:57', '0000-00-00 00:00:00'),
(9, 4, 1, '2015-07-09 01:29:17', '0000-00-00 00:00:00'),
(10, 2, 0, '2015-07-09 08:06:37', '0000-00-00 00:00:00'),
(11, 6, 1, '2015-07-10 10:22:46', '0000-00-00 00:00:00'),
(12, 7, 1, '2015-07-12 09:46:23', '0000-00-00 00:00:00'),
(13, 7, 2, '2015-07-12 09:46:23', '0000-00-00 00:00:00'),
(14, 8, 1, '2015-07-12 09:47:53', '0000-00-00 00:00:00'),
(19, 13, 1, '2015-07-12 12:00:15', '0000-00-00 00:00:00'),
(20, 9, 2, '2015-07-13 01:31:11', '0000-00-00 00:00:00'),
(21, 11, 2, '2015-07-14 03:47:13', '0000-00-00 00:00:00'),
(22, 12, 2, '2015-07-14 03:47:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category_feature`
--

CREATE TABLE `category_feature` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_feature`
--

INSERT INTO `category_feature` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Task', '2015-12-21 03:44:25', '0000-00-00 00:00:00'),
(2, 'Bug', '2015-12-21 03:44:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category_skills`
--

CREATE TABLE `category_skills` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_skills`
--

INSERT INTO `category_skills` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Programming languages', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Operating System', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Software/Tool', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'TCP/IP, DNS', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `configures`
--

CREATE TABLE `configures` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `configures`
--

INSERT INTO `configures` (`id`, `name`, `value`, `description`, `created_at`, `updated_at`) VALUES
(3, 'system_name', 'Internal Tool', 'Name system', '0000-00-00 00:00:00', '2015-06-11 19:41:00'),
(4, 'default_language', 'en', 'Default Language 1', '0000-00-00 00:00:00', '2015-06-11 19:41:00'),
(5, 'system_description', 'Internal Tool description', '', '0000-00-00 00:00:00', '2015-06-11 19:41:00'),
(6, 'format_date', 'yyyy/dd/mm', '', '0000-00-00 00:00:00', '2015-06-11 19:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `detailfeature`
--

CREATE TABLE `detailfeature` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `featureproject_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `priority_id` int(11) NOT NULL,
  `category_feature_id` int(11) NOT NULL,
  `done` int(11) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detailfeature`
--

INSERT INTO `detailfeature` (`id`, `name`, `description`, `featureproject_id`, `status_id`, `priority_id`, `category_feature_id`, `done`, `startdate`, `enddate`, `updated_at`, `created_at`) VALUES
(1, 'Build UI form login', NULL, 1, 1, 2, 1, 60, '2015-06-06 00:00:00', '2015-06-21 00:00:00', '2015-12-21 03:52:57', '0000-00-00 00:00:00'),
(2, 'implement function form list group', NULL, 1, 2, 1, 2, 20, '2015-06-05 00:00:00', '2015-06-08 00:00:00', '2015-12-21 03:53:01', '0000-00-00 00:00:00'),
(3, 'Design Database for user', NULL, 4, 3, 3, 2, 0, '2015-06-07 00:00:00', '2015-06-09 00:00:00', '2015-12-21 03:47:17', '0000-00-00 00:00:00'),
(4, 'implement function list user', NULL, 4, 1, 1, 1, 10, '2015-06-08 00:00:00', '2015-06-11 00:00:00', '2015-12-21 03:53:06', '0000-00-00 00:00:00'),
(5, 'Build UI form register fdf', NULL, 2, 4, 2, 1, 20, '2015-06-08 00:00:00', '2015-06-13 00:00:00', '2015-12-21 03:53:14', '0000-00-00 00:00:00'),
(6, 'implement function register', NULL, 2, 3, 3, 1, 30, '2015-06-17 00:00:00', '2015-06-27 00:00:00', '2015-12-21 03:53:16', '0000-00-00 00:00:00'),
(7, 'Build UI form listgroup', '', 3, 2, 3, 1, 30, '2015-06-14 00:00:00', '2015-06-23 00:00:00', '2015-12-21 20:23:51', '0000-00-00 00:00:00'),
(8, 'implement function form list group', NULL, 3, 1, 1, 1, 50, '2015-06-08 00:00:00', '2015-06-11 00:00:00', '2015-12-21 03:53:23', '0000-00-00 00:00:00'),
(9, 'Build UI chat', NULL, 5, 2, 2, 1, 70, '2015-06-10 00:00:00', '2015-06-19 00:00:00', '2015-12-21 03:53:26', '0000-00-00 00:00:00'),
(10, 'implement function chat', NULL, 5, 3, 1, 1, 80, '2015-06-03 00:00:00', '2015-06-05 00:00:00', '2015-12-21 03:53:30', '0000-00-00 00:00:00'),
(11, 'function cli', NULL, 6, 1, 2, 1, 20, '2015-06-02 00:00:00', '2015-06-05 00:00:00', '2015-12-21 03:53:35', '0000-00-00 00:00:00'),
(12, 'chat application', NULL, 6, 4, 2, 2, 0, '2015-06-02 00:00:00', '2015-06-05 00:00:00', '2015-12-21 03:48:43', '0000-00-00 00:00:00'),
(13, 'dadadasdsa', '', 4, 17, 2, 2, 78, '2015-12-23 00:00:00', '2015-12-24 00:00:00', '2015-12-21 21:02:22', '2015-12-21 21:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(10) UNSIGNED NOT NULL,
  `kind_device_id` int(11) NOT NULL,
  `information_id` int(11) NOT NULL,
  `serial_device` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `os_id` int(11) NOT NULL,
  `employee_id` int(10) NOT NULL,
  `receive_date` date NOT NULL,
  `status_id` int(11) NOT NULL,
  `return_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `kind_device_id`, `information_id`, `serial_device`, `os_id`, `employee_id`, `receive_date`, `status_id`, `return_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '70C5E', 1, 6, '2015-06-08', 1, '2015-06-15', '0000-00-00 00:00:00', '2015-07-10 02:26:21'),
(2, 2, 2, 'A3420', 2, 15, '2015-06-03', 2, '2015-06-06', '0000-00-00 00:00:00', '2015-07-02 00:09:50'),
(3, 2, 2, 'SAE42', 2, 4, '2015-06-11', 2, '2015-06-15', '0000-00-00 00:00:00', '2015-06-25 21:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `year_start` int(11) NOT NULL,
  `year_end` int(11) NOT NULL,
  `description` text,
  `education` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `employee_id`, `year_start`, `year_end`, `description`, `education`, `created_at`, `updated_at`) VALUES
(3, 4, 2013, 2016, NULL, 'Cu nhan dai hoc', '2015-07-26 14:50:34', '2015-07-26 07:50:34'),
(4, 21, 2013, 2014, NULL, 'Tot nghiep dai hoc', '2015-07-26 07:50:10', '2015-07-26 07:50:10'),
(5, 4, 2000, 2002, NULL, 'sdafewf', '2015-07-29 06:51:36', '2015-07-29 06:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_code` varchar(100) DEFAULT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `position_id` int(11) NOT NULL,
  `avatar` text,
  `email` varchar(255) NOT NULL,
  `nationality` int(50) DEFAULT NULL,
  `career_objective` text,
  `address` varchar(50) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `hobbies` text,
  `achievement_awards` text,
  `date_of_birth` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_code`, `firstname`, `lastname`, `phone`, `position_id`, `avatar`, `email`, `nationality`, `career_objective`, `address`, `gender`, `hobbies`, `achievement_awards`, `date_of_birth`, `updated_at`, `created_at`) VALUES
(4, '4frhrth3', 'Ngoc', 'Phan', '+81442256677', 1, 'avatar/search-glass.png', 'phann123@yahoo.com', 1, 'muc tieu 1', 'diachi1', 0, 'toi thich ca nhac asdasd', '             PHP Zend 2     sd   asd sd       ', '2015-06-02 00:00:00', '2015-07-29 06:56:36', '0000-00-00 00:00:00'),
(6, 'dsf435h', 'Loc', 'Tang', '2147483647', 2, 'avatar/avatar2.jpg', 'lequidon.1993@gmail.com', 2, 'muc tieu 2', '', 1, '', '', '2015-06-09 00:00:00', '2015-06-15 04:54:41', '0000-00-00 00:00:00'),
(7, 'sf4t53', 'thiet', 'vu', '343645657', 2, 'avatar/avatar3.png', 'asdd@gmail.com', 3, 'muc tieu 3', '', 0, '', '', '2015-06-22 00:00:00', '2015-06-15 04:54:44', '0000-00-00 00:00:00'),
(8, 'dferg', 'tuan', 'anh', '5366454', 2, '', '', 0, '', '', 0, '', '', '0000-00-00 00:00:00', '2015-06-13 08:19:59', '0000-00-00 00:00:00'),
(9, 'e4ggg', 'Phuoc', 'Nhan', '345436466', 1, '', '', 0, '', '', 0, '', '', '0000-00-00 00:00:00', '2015-06-13 08:19:33', '0000-00-00 00:00:00'),
(10, 're45y', 'vu', 'Tinh', '3466656', 1, '', '', 0, '', '', 0, '', '', '0000-00-00 00:00:00', '2015-06-13 08:21:10', '0000-00-00 00:00:00'),
(11, 'df5y45h', 'Duong', 'Tuan', '344536', 2, '', '', 0, '', '', 1, '', '', '0000-00-00 00:00:00', '2015-06-15 04:28:53', '0000-00-00 00:00:00'),
(12, 'er34t', 'Hanh', 'Nhan', '343654656', 1, '', '', 0, '', '', 0, '', '', '0000-00-00 00:00:00', '2015-06-13 08:21:39', '0000-00-00 00:00:00'),
(13, 'rr4tg5', 'Cong', 'Vo', '343465747', 1, '', '', 0, '', '', 0, '', '', '0000-00-00 00:00:00', '2015-06-13 08:40:30', '0000-00-00 00:00:00'),
(14, 'sdfdf', 'tuan', 'dai', '34654656', 2, '', '', 0, '', '', 0, '', '', '0000-00-00 00:00:00', '2015-06-13 08:40:33', '0000-00-00 00:00:00'),
(15, 'd34343', 'Vu', 'Ninh', '04443334545', 1, 'avatar/avatar.jpg', 'lequidon.1993@gmail.com', 1, '', '', 0, '', '  ', '1970-01-01 00:00:00', '2015-09-27 01:51:25', '0000-00-00 00:00:00'),
(21, 'sdb32', 'phan', 'nhan', '+84343434444', 0, '', 'phann123@yahoo.com', 1, '', '', 0, '', '              ', '2015-07-13 00:00:00', '2015-07-28 19:27:11', '2015-07-09 20:47:06'),
(22, 'e32sdff', 'tuan anh', 'Phuong', '+84343434444', 0, 'avatar/1.jpg', 'phann123@yahoo.com', 1, 'career obj', 'Da Nang , Viet Nam', 0, 'sdsad', '    asd', '0000-00-00 00:00:00', '2015-07-16 21:27:09', '2015-07-13 00:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `employees_candidates`
--

CREATE TABLE `employees_candidates` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `time_interview` date DEFAULT NULL,
  `time` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees_candidates`
--

INSERT INTO `employees_candidates` (`id`, `employee_id`, `candidate_id`, `time_interview`, `time`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2015-07-20', '14:00', '2015-07-06 03:54:56', '2015-07-07 21:43:29'),
(2, 8, 2, '2015-07-08', '14:30', '2015-07-06 03:54:56', '2015-07-06 00:45:29'),
(4, 4, 3, NULL, NULL, '2015-07-09 10:02:53', '0000-00-00 00:00:00'),
(5, 8, 3, NULL, NULL, '2015-07-09 10:02:53', '0000-00-00 00:00:00'),
(6, 8, 4, NULL, NULL, '2015-07-10 02:10:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_detailfeature`
--

CREATE TABLE `employee_detailfeature` (
  `edid` int(11) NOT NULL,
  `detail_feature_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_detailfeature`
--

INSERT INTO `employee_detailfeature` (`edid`, `detail_feature_id`, `employee_id`, `updated_at`, `created_at`) VALUES
(6, 2, 8, '2015-06-25 07:06:43', '0000-00-00 00:00:00'),
(7, 2, 10, '2015-06-25 07:06:43', '0000-00-00 00:00:00'),
(8, 1, 6, '2015-06-25 07:07:16', '0000-00-00 00:00:00'),
(10, 1, 13, '2015-06-25 07:08:23', '0000-00-00 00:00:00'),
(11, 5, 7, '2015-06-25 07:27:29', '0000-00-00 00:00:00'),
(12, 6, 13, '2015-06-25 07:27:39', '0000-00-00 00:00:00'),
(13, 3, 11, '2015-06-25 07:28:36', '0000-00-00 00:00:00'),
(14, 3, 12, '2015-06-25 07:28:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_skills`
--

CREATE TABLE `employee_skills` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `month_experience` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_skills`
--

INSERT INTO `employee_skills` (`id`, `employee_id`, `skill_id`, `month_experience`, `created_at`, `updated_at`) VALUES
(207, 4, 2, '2', '2015-07-29 06:56:36', '2015-07-29 06:56:36'),
(208, 4, 1, '3', '2015-07-29 06:56:36', '2015-07-29 06:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  `employee_id` int(11) NOT NULL DEFAULT '0',
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start`, `end`, `employee_id`, `updated_at`, `created_at`) VALUES
(1, 'All Day Event', '2015-02-01', '2015-02-03', 0, '2015-07-16', '2015-07-16'),
(2, 'Long Event', '2015-02-07', '2015-02-13', 0, '2015-07-16', '2015-07-16'),
(3, 'Repeating Event', '2015-02-09', '2015-02-12', 0, '2015-07-16', '2015-07-16'),
(4, 'Repeating Event', '2015-02-16', '2015-02-20', 0, '2015-07-16', '2015-07-16'),
(5, 'ok de ne', '2015-02-16', '2015-02-20', 0, '2015-07-16', '2015-07-16'),
(6, 'Meeting', '2015-02-12', '2015-02-16', 0, '2015-07-16', '2015-07-16'),
(7, 'Lunch', '2015-02-12', '2015-02-14', 0, '2015-07-16', '2015-07-16'),
(8, 'Meeting', '2015-02-12', '2015-02-19', 0, '2015-07-16', '2015-07-16'),
(9, 'Happy Hour', '2015-02-12', '2015-02-15', 0, '2015-07-16', '2015-07-16'),
(10, 'Dinner', '2015-02-12', '2015-02-13', 0, '2015-07-16', '2015-07-16'),
(11, 'Birthday Party', '2015-02-13', '2015-02-14', 0, '2015-07-16', '2015-07-16'),
(12, 'Click for Google', '2015-03-02', '2015-03-04', 0, '2015-11-12', '2015-07-16'),
(13, 'Event test', '2015-11-03', '2015-11-07', 0, '2015-11-12', '2015-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `featureproject`
--

CREATE TABLE `featureproject` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `project_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `featureproject`
--

INSERT INTO `featureproject` (`id`, `name`, `description`, `project_id`, `updated_at`, `created_at`) VALUES
(1, 'login', '', 5, '2015-06-29 01:37:08', '0000-00-00 00:00:00'),
(2, 'register', '', 5, '2015-06-29 01:37:11', '0000-00-00 00:00:00'),
(3, 'Module group', '', 5, '2015-06-29 01:37:17', '0000-00-00 00:00:00'),
(4, 'module user', '', 5, '2015-06-29 01:37:19', '0000-00-00 00:00:00'),
(5, 'Register function', '', 8, '2015-06-29 01:38:17', '0000-00-00 00:00:00'),
(6, 'Module chat', '', 8, '2015-06-29 01:38:34', '0000-00-00 00:00:00'),
(7, 'Manager User', '', 8, '2015-06-29 01:39:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_feature` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `is_menu` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `_lft` int(11) NOT NULL,
  `_rgt` int(11) NOT NULL,
  `order` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name_feature`, `description`, `url_action`, `parent_id`, `module_id`, `is_menu`, `created_at`, `updated_at`, `_lft`, `_rgt`, `order`) VALUES
(21, 'Edit User', 'edituser', '["users.show","users.update"]', 71, 3, 0, '2015-05-23 18:48:26', '2015-07-29 04:32:17', 10, 10, 0),
(23, 'Delete User', 'Delete User description', 'users.destroy', 71, 3, 0, '2015-05-23 18:48:26', '2015-07-29 04:32:17', 10, 10, 0),
(24, 'List Group', 'List Group description 11235555555555', 'groups.index', 0, 3, 1, '2015-05-23 18:48:26', '2015-11-09 18:32:28', 10, 10, 0),
(25, 'Edit Group', 'Edit Group description', '["groups.show","groups.update"]', 72, 3, 0, '2015-05-23 18:48:26', '2015-07-29 04:32:17', 10, 10, 0),
(30, 'Delete Group', 'Delete Group description', 'groups.destroy', 72, 3, 0, '2015-05-26 02:22:45', '2015-07-29 04:32:17', 10, 10, 0),
(31, 'Add Group', 'Add Group description', '["groups.create","groups.store"]', 71, 3, 1, '2015-05-27 19:17:14', '2015-07-29 04:32:17', 10, 10, 0),
(32, 'List User', 'List User descripiton', 'users.index', 71, 3, 1, '2015-05-27 19:17:54', '2015-07-29 04:32:17', 10, 10, 0),
(33, 'Edit Module', 'Edit Module description', '["modules.show","modules.update"]', 74, 3, 0, '2015-05-23 18:48:26', '2015-07-29 04:32:17', 10, 10, 0),
(34, 'Add Module', 'Add Module description', '["modules.create","modules.store"]', 74, 3, 1, '2015-05-23 18:48:26', '2015-07-29 04:32:17', 10, 10, 0),
(35, 'Delete Module', 'Delete Module description', 'modules.destroy', 74, 3, 0, '2015-05-23 18:48:26', '2015-07-29 04:32:18', 10, 10, 0),
(36, 'List Module', 'List Module description', 'modules.index', 74, 3, 1, '2015-05-23 18:48:26', '2015-07-29 04:32:18', 10, 10, 0),
(37, 'List Feature', 'List Feature description', 'features.index', 0, 3, 1, '2015-05-23 18:48:26', '2015-09-27 02:21:48', 10, 10, 0),
(38, 'Add Feature', 'Add Feature description', '["features.create","features.store"]', 0, 3, 1, '2015-05-23 18:48:26', '2015-07-29 04:32:18', 10, 10, 0),
(39, 'Edit Feature', 'Edit Feature description', '["features.show","features.update"]', 0, 3, 0, '2015-05-23 18:48:26', '2015-07-29 04:32:18', 10, 10, 0),
(40, 'Delete Feature', 'Delete Feature description', 'features.destroy', 0, 3, 0, '2015-05-23 18:48:26', '2015-07-29 04:32:18', 10, 10, 0),
(41, 'Set Permission Group', 'Set Permission Group', 'groups.permission', 0, 3, 1, '0000-00-00 00:00:00', '2015-09-27 02:18:44', 10, 10, 0),
(45, 'View language setting', '', 'languages.index', 0, 3, 1, '0000-00-00 00:00:00', '2015-07-29 04:32:18', 10, 10, 0),
(46, 'Change language setting', '', 'languages.change', 0, 3, 1, '0000-00-00 00:00:00', '2015-07-29 04:32:18', 10, 10, 0),
(47, 'View Translate', '', 'translate.index', 0, 3, 1, '0000-00-00 00:00:00', '2015-07-29 04:32:18', 10, 10, 0),
(48, 'Translate Language', '', 'translate.update', 0, 3, 1, '0000-00-00 00:00:00', '2015-07-29 04:32:18', 10, 10, 0),
(49, 'View system config', '', 'configures.index', 49, 3, 1, '0000-00-00 00:00:00', '2015-07-29 04:32:18', 10, 10, 0),
(50, 'Change configure system', '', 'configures.update', 50, 3, 0, '0000-00-00 00:00:00', '2015-07-29 04:32:18', 10, 10, 0),
(53, 'Edit Project', 'Edit Project', 'projects.update', 0, 1, 0, '2015-06-11 03:00:00', '2015-07-29 04:32:18', 10, 10, 0),
(54, 'List Project', 'List  Project', 'projects.index', 0, 1, 1, '2015-06-05 02:24:22', '2015-07-29 04:32:18', 10, 10, 0),
(55, 'Delete Project', 'Delete Project', 'projects.destroy', 55, 1, 0, '2015-06-10 20:59:13', '2015-07-29 04:32:18', 10, 10, 0),
(56, 'Add Project', 'Add Project', '["projects.create","projects.store"]', 0, 1, 1, '2015-06-10 21:00:39', '2015-07-29 04:32:18', 10, 10, 0),
(57, 'List Status Project', 'List Status Project', 'statusprojects.index', 0, 1, 0, '2015-06-10 21:02:13', '2015-07-29 04:32:19', 10, 10, 0),
(58, 'Add Status Project', 'Add Status Project', '["statusprojects.create","statusprojects.store"]', 58, 1, 0, '2015-06-10 21:03:46', '2015-07-29 04:32:19', 10, 10, 0),
(59, 'Edit Status Project', 'Edit Status Project', '["statusprojects.show","statusprojects.update"]', 0, 1, 0, '2015-06-10 21:08:18', '2015-07-29 04:32:19', 10, 10, 0),
(60, 'Delete Status Project', 'Delete Status Project', 'statusprojects.destroy', 60, 1, 0, '2015-06-10 21:09:28', '2015-07-29 04:32:19', 10, 10, 0),
(61, 'List HR', 'List Human Resources', 'employee', 0, 2, 1, '2015-06-10 21:11:14', '2015-07-29 04:32:19', 10, 10, 0),
(62, 'Add HR', 'Add Human Resources', '["employee.create","employee.store"]', 0, 2, 0, '2015-06-10 21:12:12', '2015-07-29 04:32:19', 10, 10, 0),
(63, 'Edit HR', 'Edit Human Resources', '["employee.show","employee.update"]', 0, 2, 0, '2015-06-10 21:13:19', '2015-07-29 04:32:19', 10, 10, 0),
(64, 'Delete HR', 'Delete Human Resources', 'deleteemployee', 64, 2, 0, '2015-06-10 21:13:37', '2015-07-29 04:32:19', 10, 10, 0),
(65, 'List Position', '', 'position.index', 0, 2, 0, '2015-06-10 21:17:34', '2015-07-29 04:32:19', 10, 10, 0),
(67, 'Edit Position', '', '["position.show","position.update"]', 0, 2, 0, '2015-06-10 21:19:13', '2015-07-29 04:32:19', 10, 10, 0),
(68, 'Add Position', '', '["position.create","position.store"]', 0, 2, 0, '2015-06-10 21:19:41', '2015-07-29 04:32:19', 10, 10, 0),
(69, 'Delete Position', '', 'position.destroy', 69, 2, 0, '2015-06-10 21:19:57', '2015-07-29 04:32:19', 10, 10, 0),
(70, 'Sidebar', 'Sidebar menu left', 'admin.sidebar', 0, 3, 0, '2015-06-11 09:16:44', '2015-07-29 04:32:19', 10, 10, 0),
(71, 'User', 'Action User', 'users.index', 0, 3, 0, '2015-06-11 11:35:46', '2015-07-29 04:32:19', 10, 10, 0),
(72, 'Group', 'Action Group', 'groups.index', 0, 3, 0, '2015-06-11 11:36:36', '2015-07-29 04:32:19', 10, 10, 0),
(74, 'Module', 'Action Module', 'modules.index', 0, 3, 0, '2015-06-11 11:37:39', '2015-07-29 04:32:19', 10, 10, 0),
(75, 'Borrow', '', 'borrowdevice', 0, 4, 0, '2015-06-25 03:17:15', '2015-07-29 04:32:20', 10, 10, 0),
(76, 'Borrow Device', '', '["borrowdevice","saveborrowdevice"]', 0, 4, 1, '2015-06-25 21:41:51', '2015-07-29 04:32:20', 10, 10, 0),
(77, 'Add Candidate', '', '["candidates.create","candidates.store"]', 0, 2, 0, '2015-07-10 01:06:45', '2015-07-29 04:32:20', 10, 10, 0),
(78, 'Overview Device', '', 'overview.index', 0, 4, 1, '2015-09-27 02:01:20', '2015-09-27 02:01:20', 0, 1, 0),
(79, 'List Device', '', 'devices.index', 0, 4, 1, '2015-09-27 02:13:32', '2015-09-27 02:13:32', 2, 3, 0),
(80, 'List Candidates', '', 'candidates.index', 0, 2, 1, '2015-09-27 02:32:29', '2015-09-27 02:32:29', 4, 5, 0),
(81, 'Interview', '', 'candidate.interview', 0, 2, 1, '2015-09-27 02:33:51', '2015-09-27 02:33:51', 6, 7, 0),
(82, 'List Status Record', '', 'statusrecord', 0, 2, 1, '2015-09-27 02:35:55', '2015-09-27 02:35:55', 8, 9, 0),
(83, 'List Poll', '', 'polls.index', 0, 2, 1, '2015-11-09 18:38:01', '2015-11-09 18:38:01', 11, 12, 0),
(84, 'Create Poll', '', '["polls.create","polls.store"]', 0, 2, 1, '2015-11-09 19:17:56', '2015-11-09 19:17:56', 13, 14, 0),
(85, 'Update Poll', '', '["polls.edit","polls.update"]', 0, 2, 0, '2015-11-09 19:23:13', '2015-11-09 19:29:58', 15, 16, 0),
(86, 'Delete Poll', '', 'polls.destroy', 0, 2, 0, '2015-11-09 19:28:26', '2015-11-09 19:30:11', 17, 18, 0);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `candidate_id`, `name`, `title`, `created_at`, `updated_at`) VALUES
(11, 1, 'Settings.ini', 'title settting lai', '2015-07-12 07:24:10', '2015-07-14 19:15:18'),
(13, 1, '2.jpg', 'title file 2', '2015-07-12 07:28:15', '2015-07-14 19:15:18'),
(14, 3, '4.jpg', 'file 4 ne', '2015-07-12 18:24:35', '2015-07-19 02:25:50'),
(15, 3, '2.jpg', 'File 2 ne', '2015-07-12 18:24:35', '2015-07-19 02:25:50'),
(16, 10, '4.jpg', '', '2015-07-13 20:44:50', '2015-07-13 20:44:50'),
(17, 10, '2.jpg', '', '2015-07-13 20:44:50', '2015-07-13 20:44:50'),
(18, 12, '2.jpg', 'title file 2', '2015-07-13 20:47:51', '2015-07-13 20:47:51'),
(19, 12, 'Tieu_luan_de_tai+_Tai_chinh_cong.doc', 'title tieu luan', '2015-07-13 20:47:51', '2015-07-13 20:47:51'),
(20, 1, '220px-Teva_17_3_(69).JPG', 'them moi', '2015-07-14 19:14:54', '2015-07-14 19:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `groupchat`
--

CREATE TABLE `groupchat` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groupchat`
--

INSERT INTO `groupchat` (`id`, `name`, `count`) VALUES
(1, 'group1', 2),
(2, 'group2', 2),
(3, 'group3', 2),
(4, 'group4', 2);

-- --------------------------------------------------------

--
-- Table structure for table `groupchat_user`
--

CREATE TABLE `groupchat_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groupchat_user`
--

INSERT INTO `groupchat_user` (`id`, `user_id`, `group_id`, `type`) VALUES
(5, 6, 2, 0),
(6, 9, 3, 0),
(7, 8, 2, 0),
(8, 6, 3, 0),
(9, 6, 1, 0),
(39, 7, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `groupname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `groupname`, `description`, `created_at`, `updated_at`) VALUES
(6, 'Dev', 'Developer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Test', 'Tester', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Manager', 'Manager1', '0000-00-00 00:00:00', '2015-05-29 02:49:36'),
(9, 'Compoter', 'compoter', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Manager project', 'Manager project', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `group_features`
--

CREATE TABLE `group_features` (
  `id` int(10) UNSIGNED NOT NULL,
  `feature_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group_features`
--

INSERT INTO `group_features` (`id`, `feature_id`, `group_id`, `created_at`, `updated_at`) VALUES
(22, 39, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 40, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 41, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 45, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 46, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 47, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 48, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 49, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
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
(137, 74, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 61, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 38, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 75, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 76, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 77, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 33, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 78, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 79, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 80, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 81, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 82, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 83, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 84, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 85, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 86, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `id` int(11) NOT NULL,
  `hobby` text NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `information_devices`
--

CREATE TABLE `information_devices` (
  `id` int(10) UNSIGNED NOT NULL,
  `contract_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buy_date` date NOT NULL,
  `distribution` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `term_warranty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `information_devices`
--

INSERT INTO `information_devices` (`id`, `contract_number`, `buy_date`, `distribution`, `term_warranty`, `created_at`, `updated_at`) VALUES
(1, '111', '2015-06-02', '1', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '2', '2015-06-01', '2', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kind_devices`
--

CREATE TABLE `kind_devices` (
  `id` int(10) UNSIGNED NOT NULL,
  `model_id` int(11) NOT NULL,
  `device_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kind_devices`
--

INSERT INTO `kind_devices` (`id`, `model_id`, `device_name`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 'bphone', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 'mac', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language_name`, `code`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 0, '2015-05-27 07:36:24', '2015-06-11 20:39:47'),
(2, 'Japanese', 'jp', 0, '2015-05-27 07:36:36', '2015-06-11 10:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `ug_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `ug_id`, `time`, `updated_at`, `created_at`) VALUES
(1, 'ok nhe', 5, 1437615111, '2015-07-23 01:44:11', '0000-00-00 00:00:00'),
(2, 'toto qua', 5, 1437615000, '2015-07-23 01:44:01', '0000-00-00 00:00:00'),
(3, 'ok tot', 7, 1437615822, '2015-07-22 18:43:42', '2015-07-22 18:43:42'),
(4, 'ok ne', 7, 1437637608, '2015-07-23 00:46:48', '2015-07-23 00:46:48'),
(12, 'vui', 5, 1437660529, '2015-07-23 07:08:49', '2015-07-23 07:08:49'),
(13, 'thank nhe', 7, 1437703715, '2015-07-23 19:08:35', '2015-07-23 19:08:35'),
(14, 'ko co chi', 5, 1437703731, '2015-07-23 19:08:51', '2015-07-23 19:08:51'),
(15, 'vui nhe', 9, 1437707961, '2015-07-23 20:19:21', '2015-07-23 20:19:21'),
(19, 'vo zz', 8, 1437724729, '2015-07-24 00:58:49', '2015-07-24 00:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
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
('2015_05_28_011830_create_group_features_table', 2),
('2015_07_27_014411_create_oauth_identities_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_devices`
--

CREATE TABLE `model_devices` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_id` int(11) NOT NULL,
  `model_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model_devices`
--

INSERT INTO `model_devices` (`id`, `type_id`, `model_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'apple', 'hang apple', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 'ewe', 'ưewew', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `description`, `version`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Project', 'Project ', '1.0', 2, '2015-05-22 02:49:52', '2015-07-19 01:34:50'),
(2, 'Human Resources', 'Human resources', '1.0', 3, '2015-05-22 02:50:06', '2015-07-19 21:29:32'),
(3, 'Core Seting', 'Core seting', '1.1', 3, '2015-05-22 02:50:22', '2015-07-19 01:32:59'),
(4, 'Device', '', '1.0', 4, '2015-06-25 02:26:53', '2015-07-19 01:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `name`) VALUES
(1, 'Viet Nam'),
(2, 'Japan'),
(3, 'Singapore');

-- --------------------------------------------------------

--
-- Table structure for table `note_statuses`
--

CREATE TABLE `note_statuses` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `status_record_id` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `note_statuses`
--

INSERT INTO `note_statuses` (`id`, `candidate_id`, `status_record_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'chan ghe bay', '2015-07-06 09:27:58', '2015-07-07 02:43:12'),
(2, 2, 5, 'Thang nay yeu qua', '2015-07-06 09:27:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_identities`
--

CREATE TABLE `oauth_identities` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider_user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_identities`
--

INSERT INTO `oauth_identities` (`id`, `user_id`, `provider_user_id`, `provider`, `access_token`, `created_at`, `updated_at`) VALUES
(1, 12, '659476244172091', 'facebook', 'CAAJAzjQBM8QBAPoYfZBrd7vK4UPaDuoTpsqxIFXlIs1uXUHi5QzJrYmlszOSsQwtzZALFiDRs062kPtlda0GzuumHcJZCYnkokBMnvF5ZCJuYt7d5c3oOTObSnxZAgYrxyhzenUTLYi62pqdj6Yhgfdu69wset6MS2X3ZBrewUgTGSI8vnyqZBDQGeMjCh0l4FoRSEjsc9CK7kXLmIvk0pb', '2015-07-26 20:17:50', '2015-07-26 20:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `operating_systems`
--

CREATE TABLE `operating_systems` (
  `id` int(10) UNSIGNED NOT NULL,
  `os_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `operating_systems`
--

INSERT INTO `operating_systems` (`id`, `os_name`, `version`, `created_at`, `updated_at`) VALUES
(1, 'androi', '1.o', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'ios', '1.0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` int(10) NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `num_select` int(10) NOT NULL,
  `votes_per_day` int(10) NOT NULL,
  `total_votes_per_person` int(10) NOT NULL,
  `show_results` tinyint(1) NOT NULL,
  `show_results_req_vote` tinyint(1) NOT NULL,
  `show_results_finish` tinyint(1) NOT NULL,
  `show_vote_number` tinyint(1) NOT NULL,
  `result_precision` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `question`, `active`, `start_date`, `end_date`, `num_select`, `votes_per_day`, `total_votes_per_person`, `show_results`, `show_results_req_vote`, `show_results_finish`, `show_vote_number`, `result_precision`, `created_at`, `updated_at`) VALUES
(4, 'Hãy đợi đấy', 1, '2015-11-09 12:00:00', '2015-12-24 01:00:00', 2, 3, 3, 1, 1, 1, 1, '', '2015-07-09 01:10:53', '2015-12-16 19:06:47'),
(5, 'hhhhhhhhhhhhh', 0, '2015-12-01 08:32:21', '2015-12-24 08:32:21', 3, 0, 0, 0, 1, 1, 0, '', '2015-07-09 01:31:44', '2015-12-17 18:32:32'),
(7, 'zzzzzzzzzzzz', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 0, 0, 0, 0, 0, 0, '', '2015-07-09 02:50:27', '2015-07-09 02:50:27'),
(8, 'How old are you ?', 0, '2015-11-02 02:17:45', '2015-11-12 02:19:45', 0, 4, 4, 0, 0, 0, 0, '1', '2015-11-10 00:18:00', '2015-11-10 19:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `poll_answers`
--

CREATE TABLE `poll_answers` (
  `id` int(10) NOT NULL,
  `poll_id` int(10) NOT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(10) NOT NULL,
  `color` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `poll_answers`
--

INSERT INTO `poll_answers` (`id`, `poll_id`, `answer`, `order`, `color`, `created_at`, `updated_at`) VALUES
(55, 7, 'dsdfs', 0, '005FBF', '2015-07-09 02:50:27', '2015-07-09 02:50:27'),
(94, 8, '11 year sdds', 0, '005FBF', '2015-11-10 19:52:34', '2015-11-10 19:52:34'),
(95, 8, 'ewgergreg', 0, 'CF40F8', '2015-11-10 19:52:34', '2015-11-10 19:52:34'),
(96, 8, 'wegreherh', 0, 'FFFFFF', '2015-11-10 19:52:34', '2015-11-10 19:52:34'),
(125, 4, 'trả lời 11', 0, '005FBF', '2015-12-16 19:06:47', '2015-12-16 19:06:47'),
(126, 4, 'trả lời 44', 0, 'A413CB', '2015-12-16 19:06:47', '2015-12-16 19:06:47'),
(127, 4, 'trả lời 33', 1, 'A99681', '2015-12-16 19:06:48', '2015-12-16 19:06:48'),
(128, 4, 'trả lời 22', 2, '264959', '2015-12-16 19:06:48', '2015-12-16 19:06:48'),
(129, 5, 'aaaaaaaaaaaaaa', 0, '005FBF', '2015-12-17 18:32:32', '2015-12-17 18:32:32'),
(130, 5, 'cccccccccccccc', 0, '61E1C8', '2015-12-17 18:32:32', '2015-12-17 18:32:32'),
(131, 5, 'ddddddddddd', 0, '4B5F56', '2015-12-17 18:32:32', '2015-12-17 18:32:32'),
(132, 5, 'sfegrhthyj', 0, 'CA85A4', '2015-12-17 18:32:32', '2015-12-17 18:32:32'),
(133, 5, 'bbbbbbbbbbbbbbbb', 2, '3EA212', '2015-12-17 18:32:32', '2015-12-17 18:32:32'),
(134, 5, 'rthytjuki', 0, '5C87F9', '2015-12-17 18:32:32', '2015-12-17 18:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `poll_user_answers`
--

CREATE TABLE `poll_user_answers` (
  `id` int(10) NOT NULL,
  `answer_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `poll_user_answers`
--

INSERT INTO `poll_user_answers` (`id`, `answer_id`, `user_id`, `created_at`, `updated_at`) VALUES
(9, 121, 6, '2015-11-10 22:00:00', '0000-00-00 00:00:00'),
(10, 122, 6, '2015-11-10 22:25:08', '0000-00-00 00:00:00'),
(11, 123, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 124, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 122, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 123, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 126, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
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
(0, 'Tester', 'Day la một tester gì một', '2015-06-17 21:08:45', '2015-06-16 23:34:28'),
(1, 'Developer', 'Day la mot developer ne e', '2015-06-17 21:07:20', '0000-00-00 00:00:00'),
(2, 'Manager', 'Day la manager', '2015-06-08 18:46:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `priority`
--

CREATE TABLE `priority` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `priority`
--

INSERT INTO `priority` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Low', '2015-12-21 03:43:51', '0000-00-00 00:00:00'),
(2, 'Normal', '2015-12-21 03:43:51', '0000-00-00 00:00:00'),
(3, 'High', '2015-12-21 03:43:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `projectname` varchar(200) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comments` varchar(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `projectname`, `startdate`, `enddate`, `user_id`, `comments`, `status_id`, `created_at`, `updated_at`) VALUES
(5, 'project1', '2015-06-25', '2015-06-30', 6, '123', 1, '2015-06-05', '2015-06-12'),
(8, 'project2', '2015-06-12', '2015-06-30', 6, 'no comment', 1, '2015-06-08', '2015-06-12'),
(9, 'project3', '2015-06-12', '2015-06-12', 6, 'chưa có gì', 5, '2015-06-08', '2015-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `category_id`, `skill`, `created_at`, `updated_at`) VALUES
(1, 1, 'PHP', '2015-06-12 02:13:56', '0000-00-00 00:00:00'),
(2, 1, 'ASP', '2015-06-12 02:13:56', '0000-00-00 00:00:00'),
(3, 1, 'VB', '2015-06-11 19:50:52', '2015-06-11 19:57:15'),
(12, 3, 'Windows', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 4, 'MS Office', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 4, 'MS Project', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 4, 'StartUML', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 5, 'DNS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 5, 'TCP/IP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 1, 'C', '2015-06-17 02:56:05', '2015-06-17 02:56:05'),
(20, 1, 'C++', '2015-06-17 02:56:19', '2015-06-17 02:56:19'),
(21, 1, 'Java', '2015-06-17 02:56:23', '2015-06-17 02:56:23'),
(22, 1, 'HTML/CSS', '2015-06-17 02:56:27', '2015-06-17 02:56:27'),
(23, 4, 'HTTP Apache', '2015-06-17 02:57:13', '2015-06-17 02:57:13'),
(24, 1, 'Tomcat', '2015-06-17 02:57:18', '2015-06-17 02:57:18'),
(25, 1, 'Liferay', '2015-06-17 02:57:27', '2015-06-17 02:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `statuschat`
--

CREATE TABLE `statuschat` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statuschat`
--

INSERT INTO `statuschat` (`id`, `name`) VALUES
(1, 'offline'),
(2, 'online'),
(3, 'away');

-- --------------------------------------------------------

--
-- Table structure for table `statusprojects`
--

CREATE TABLE `statusprojects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `statusprojects`
--

INSERT INTO `statusprojects` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Open', 'open', '2015-06-12 07:11:55', '0000-00-00 00:00:00'),
(2, 'In Progess', 'In Progess', '2015-06-12 07:11:55', '0000-00-00 00:00:00'),
(3, 'Feedback', 'Feedback', '2015-06-12 07:11:55', '0000-00-00 00:00:00'),
(4, 'Resolved', 'Resolved', '2015-06-12 07:11:55', '0000-00-00 00:00:00'),
(5, 'Closed', 'Closed', '2015-06-12 07:11:55', '0000-00-00 00:00:00'),
(17, 'Reopen', 'Reopen', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'In estimate', 'In estimate', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Not fixed', 'Not fixed', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Pending', 'Pending', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `status_devices`
--

CREATE TABLE `status_devices` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_devices`
--

INSERT INTO `status_devices` (`id`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'borrowed', 'da muon', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'granted', 'da cap', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'spare', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `status_records`
--

CREATE TABLE `status_records` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_records`
--

INSERT INTO `status_records` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'New', '2015-07-06 09:26:59', '2015-07-06 21:08:20'),
(2, 'Pass Interview', '2015-07-06 20:54:37', '2015-07-06 20:54:37'),
(3, 'Interview', '2015-07-08 13:13:04', '0000-00-00 00:00:00'),
(4, 'Contact', '2015-07-08 13:13:04', '0000-00-00 00:00:00'),
(5, 'Fail Interview', '2015-07-08 13:13:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `taken_projects`
--

CREATE TABLE `taken_projects` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `project_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `number_people` int(11) NOT NULL,
  `project_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_period` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `skill_set_ultilized` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timesheets`
--

CREATE TABLE `timesheets` (
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
-- Table structure for table `type_devices`
--

CREATE TABLE `type_devices` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_devices`
--

INSERT INTO `type_devices` (`id`, `type_name`, `description`, `created_at`, `updated_at`) VALUES
(1, '1', 'mobile', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '2', 'lap', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `employee_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `statuschat_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `employee_id`, `remember_token`, `created_at`, `updated_at`, `statuschat_id`) VALUES
(6, 'Phan Ngoc', 'phann123', '$2y$10$g797XztsiY8KsFc5EbSOuOL.ehI8vnhKz3yeeflM46oqspN47vz9S', 4, 'aBZWWsgAv4qOQARoFJR7yXBbssob0r5ENkjILY4h5NDjZ6DpSJ8axpwk2Ns5', '2015-05-27 20:53:14', '2015-07-06 21:20:22', 1),
(7, 'Tang Loc', 'thietdn', '$2y$10$.pLfgQ7eAgn5oA3ajOgn1eF7yggx38lWwo13q/5dKSaNFJUMO/1M6', 6, 'vYbjWtQctF6hYRoxbOIBRNiDNdxR8Nw4JbriA1ZLzWz0AWng5nKRKTS7ZWMn', '2015-05-27 21:58:51', '2015-07-19 21:46:17', 1),
(8, 'vu thiet', 'nhatpd', '$2y$10$U7Ixh72h3FeT/QNuVcMG3e2LS145iKVcVklv5l0Tmj0KhQlzdmZy.', 7, 'LG7XeTHqCDcn9V14Vwce3fEMAYG4WB4vZ3BjkjdPRRpV8T5Eq5VQxPsy7hlB', '2015-05-28 01:47:13', '2015-07-23 19:08:18', 1),
(9, 'Nguyen Van Thinh', 'vanthinhhh', '$2y$10$rRBvMjikw1CzOqsraP58Vu1AV6hzTzxrOsorjoPE4Bgwt6R8q6COG', 4, NULL, '2015-06-08 19:58:57', '2015-06-08 19:58:57', 1),
(10, 'Tang Loc', 'asdasdsd', '$2y$10$d5ZKkXY.CsEtiKVF9xuq..gZXs9CMj12FYQgGj2yuQZ4STlAnquCS', 6, '5gKctWiUnYYqEqj7pmdFB3CpNj0CsIHtH5gYiZ09rFVmR4TQp0mwoLWcotaV', '2015-06-17 04:08:06', '2015-07-06 21:20:25', 1),
(11, 'asdewf phan', 'moi', '$2y$10$vsnd5JA7gzMj.RNRSbKbzeFuyGUq7nn5g.qBBxnMgptuLmwWeyfZO', 19, NULL, '2015-06-17 20:50:31', '2015-06-17 20:50:31', 1),
(12, '', '', '', 4, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`, `created_at`, `updated_at`) VALUES
(21, 6, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 9, 8, '2015-06-08 19:58:57', '2015-06-08 19:58:57'),
(27, 6, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 10, 8, '2015-06-17 04:08:06', '2015-06-17 04:08:06'),
(29, 11, 8, '2015-06-17 20:50:31', '2015-06-17 20:50:31'),
(30, 8, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 7, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_project`
--

CREATE TABLE `user_project` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `joined` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_project`
--

INSERT INTO `user_project` (`id`, `user_id`, `project_id`, `group_id`, `joined`, `created_at`, `updated_at`) VALUES
(1, 9, 2, 6, '2015-06-01', '0000-00-00 00:00:00', '2015-06-10 01:24:43'),
(2, 7, 2, 7, '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 6, 2, 6, '2015-06-09', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 10, 5, 6, '2015-06-21', '2015-06-08 17:00:00', '2015-06-21 07:44:45'),
(8, 6, 13, 10, '2014-01-01', '2015-06-09 02:33:08', '2015-06-09 02:44:55'),
(10, 9, 2, 6, '2010-01-01', '2015-06-09 03:03:35', '2015-06-09 03:03:35'),
(11, 6, 36, 6, '2222-02-02', '2015-06-09 19:14:27', '2015-06-09 19:14:27'),
(12, 7, 36, 8, '2121-01-01', '2015-06-09 19:14:39', '2015-06-09 19:14:39'),
(13, 6, 8, 8, '2015-06-17', '2015-06-11 11:25:26', '2015-06-11 11:25:44'),
(14, 9, 8, 6, '2015-06-14', '2015-06-11 11:25:58', '2015-06-21 07:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `working_experiences`
--

CREATE TABLE `working_experiences` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `company` varchar(50) NOT NULL,
  `main_duties` varchar(255) NOT NULL,
  `year_start` datetime NOT NULL,
  `year_end` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `working_experiences`
--

INSERT INTO `working_experiences` (`id`, `employee_id`, `company`, `main_duties`, `year_start`, `year_end`, `created_at`, `updated_at`, `position`) VALUES
(319, 4, 'Software Development Centre 1', 'Testing software projects: Reading requirements, planning for testing, designing test case, implementing test module, testing functions, reporting results.\r\nManaging bug tracking on such systems: Redmine', '2015-06-17 00:00:00', '2015-06-25 00:00:00', '2015-07-29 06:56:36', '2015-07-29 06:56:36', 'lap trinh vien ne chua'),
(320, 4, 'asdsadsad', 'sadasdsd', '2012-12-12 00:00:00', '2014-10-16 00:00:00', '2015-07-29 06:56:36', '2015-07-29 06:56:36', 'ewr4et'),
(321, 4, 'asdas', 'sadadsa', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '2015-07-29 06:56:36', '2015-07-29 06:56:36', 'asd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendars`
--
ALTER TABLE `calendars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_positions`
--
ALTER TABLE `candidate_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_feature`
--
ALTER TABLE `category_feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_skills`
--
ALTER TABLE `category_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configures`
--
ALTER TABLE `configures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailfeature`
--
ALTER TABLE `detailfeature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_code` (`employee_code`);

--
-- Indexes for table `employees_candidates`
--
ALTER TABLE `employees_candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_detailfeature`
--
ALTER TABLE `employee_detailfeature`
  ADD PRIMARY KEY (`edid`);

--
-- Indexes for table `employee_skills`
--
ALTER TABLE `employee_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featureproject`
--
ALTER TABLE `featureproject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `features_module_id_foreign` (`module_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupchat`
--
ALTER TABLE `groupchat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupchat_user`
--
ALTER TABLE `groupchat_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_features`
--
ALTER TABLE `group_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_features_feature_id_foreign` (`feature_id`),
  ADD KEY `group_features_group_id_foreign` (`group_id`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information_devices`
--
ALTER TABLE `information_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kind_devices`
--
ALTER TABLE `kind_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_devices`
--
ALTER TABLE `model_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note_statuses`
--
ALTER TABLE `note_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_identities`
--
ALTER TABLE `oauth_identities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operating_systems`
--
ALTER TABLE `operating_systems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll_answers`
--
ALTER TABLE `poll_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll_user_answers`
--
ALTER TABLE `poll_user_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuschat`
--
ALTER TABLE `statuschat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statusprojects`
--
ALTER TABLE `statusprojects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_devices`
--
ALTER TABLE `status_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_records`
--
ALTER TABLE `status_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taken_projects`
--
ALTER TABLE `taken_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_devices`
--
ALTER TABLE `type_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_group_user_id_foreign` (`user_id`),
  ADD KEY `user_group_group_id_foreign` (`group_id`);

--
-- Indexes for table `user_project`
--
ALTER TABLE `user_project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_project_user_id_foreign` (`user_id`);

--
-- Indexes for table `working_experiences`
--
ALTER TABLE `working_experiences`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendars`
--
ALTER TABLE `calendars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `candidate_positions`
--
ALTER TABLE `candidate_positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `category_feature`
--
ALTER TABLE `category_feature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category_skills`
--
ALTER TABLE `category_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `configures`
--
ALTER TABLE `configures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `detailfeature`
--
ALTER TABLE `detailfeature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `employees_candidates`
--
ALTER TABLE `employees_candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `employee_detailfeature`
--
ALTER TABLE `employee_detailfeature`
  MODIFY `edid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `employee_skills`
--
ALTER TABLE `employee_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `featureproject`
--
ALTER TABLE `featureproject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `groupchat`
--
ALTER TABLE `groupchat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `groupchat_user`
--
ALTER TABLE `groupchat_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `group_features`
--
ALTER TABLE `group_features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
--
-- AUTO_INCREMENT for table `information_devices`
--
ALTER TABLE `information_devices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kind_devices`
--
ALTER TABLE `kind_devices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `model_devices`
--
ALTER TABLE `model_devices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `note_statuses`
--
ALTER TABLE `note_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `oauth_identities`
--
ALTER TABLE `oauth_identities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `operating_systems`
--
ALTER TABLE `operating_systems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `poll_answers`
--
ALTER TABLE `poll_answers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `poll_user_answers`
--
ALTER TABLE `poll_user_answers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `priority`
--
ALTER TABLE `priority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `statuschat`
--
ALTER TABLE `statuschat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `statusprojects`
--
ALTER TABLE `statusprojects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `status_devices`
--
ALTER TABLE `status_devices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `status_records`
--
ALTER TABLE `status_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `type_devices`
--
ALTER TABLE `type_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `user_project`
--
ALTER TABLE `user_project`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `working_experiences`
--
ALTER TABLE `working_experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;
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
