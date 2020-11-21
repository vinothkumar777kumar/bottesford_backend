-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2020 at 03:44 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bottesford_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_tbl`
--

CREATE TABLE `blog_tbl` (
  `id` int(20) NOT NULL,
  `blog_image` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `publish_date` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_tbl`
--

INSERT INTO `blog_tbl` (`id`, `blog_image`, `title`, `publish_date`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '763707-gamesch4.jpg', 'Test Blog Title', '15-10-2020', 'test blog description', 1, '2020-10-15 16:48:41', '2020-10-15 16:48:41'),
(2, '608644-1200px-England_crest_2009.svg.png', 'test tile', '12-11-2020', 'tets', 1, '2020-11-12 22:44:59', '2020-11-12 22:44:59'),
(3, '68053-bg_1.jpg', 'Team Title', '13-11-2020', 'Team Description', 1, '2020-11-12 22:46:53', '2020-11-12 22:46:53');

-- --------------------------------------------------------

--
-- Table structure for table `match_result_tbl`
--

CREATE TABLE `match_result_tbl` (
  `id` int(20) NOT NULL,
  `team_one` varchar(50) NOT NULL,
  `team_one_image` varchar(50) NOT NULL,
  `team_two` varchar(50) NOT NULL,
  `team_two_image` varchar(50) NOT NULL,
  `match_name` varchar(50) NOT NULL,
  `team_one_goal` int(10) NOT NULL,
  `team_two_goal` int(10) NOT NULL,
  `match_date` varchar(20) NOT NULL,
  `video_url` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `match_result_tbl`
--

INSERT INTO `match_result_tbl` (`id`, `team_one`, `team_one_image`, `team_two`, `team_two_image`, `match_name`, `team_one_goal`, `team_two_goal`, `match_date`, `video_url`, `created_at`, `updated_at`) VALUES
(1, 'FC Barcelona', '442338-complete.png', 'Bottesford Town F.C', '486665-BottesfordTown_logo.png', 'second match play', 3, 2, '15-10-2020', 'https://www.youtube.com/watch?v=lPDOh5ZifyM', '2020-10-15 17:06:16', '2020-10-15 17:06:16'),
(2, 'Bottesford Town F.C', '863201-fc_logo.png', 'FC Barcelona', '487945-complete.png', 'scondary match result', 3, 3, '15-10-2020', 'https://www.youtube.com/watch?v=L4aBqvbP_MM', '2020-10-15 19:28:53', '2020-10-15 19:28:53'),
(3, 'Netherlands national football team', '111218-bg_1.jpg', 'FC Barcelona', '182492-blue_logo3.png', 'Epl', 3, 2, '11-11-2020', 'https://www.youtube.com/watch?v=mbfZtnl5ZM8', '2020-11-12 22:53:00', '2020-11-12 22:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `match_tbl`
--

CREATE TABLE `match_tbl` (
  `id` int(20) NOT NULL,
  `team_one` varchar(50) NOT NULL,
  `team_one_image` varchar(255) NOT NULL,
  `team_two` varchar(50) NOT NULL,
  `team_two_image` varchar(255) NOT NULL,
  `match_name` varchar(30) NOT NULL,
  `round` varchar(20) NOT NULL,
  `match_date` varchar(20) NOT NULL,
  `start_time` varchar(20) NOT NULL,
  `end_time` varchar(20) DEFAULT NULL,
  `adult_ticket_price` float DEFAULT NULL,
  `conses_ticket_price` double DEFAULT NULL,
  `under_16_ticket_price` double DEFAULT NULL,
  `no_of_tickets` int(20) DEFAULT NULL,
  `is_active` int(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `match_tbl`
--

INSERT INTO `match_tbl` (`id`, `team_one`, `team_one_image`, `team_two`, `team_two_image`, `match_name`, `round`, `match_date`, `start_time`, `end_time`, `adult_ticket_price`, `conses_ticket_price`, `under_16_ticket_price`, `no_of_tickets`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Bottesford Town F.C', '218000-BottesfordTown_logo.png', 'FC Barcelona', '124460-complete.png', 'Test Match', 'first', '16-10-2020', '4:41 PM', '10:47 PM', 2.7, NULL, NULL, NULL, NULL, '2020-10-15 16:47:03', '2020-10-15 16:47:03'),
(2, 'FC Barcelona', '857550-complete.png', 'Bottesford Town F.C', '891018-BottesfordTown_logo.png', 'second match', 'second', '15-10-2020', '7:04 PM', '9:04 PM', 1.27, NULL, NULL, NULL, NULL, '2020-10-15 17:04:59', '2020-10-15 17:04:59'),
(3, 'Bottesford Town F.C', '195643-BottesfordTown_logo.png', 'FC Barcelona', '417443-complete.png', 'Tornament', 'first', '17-10-2020', '6:19 PM', '11:19 PM', 1.32, NULL, NULL, NULL, NULL, '2020-10-15 18:19:30', '2020-10-15 18:19:30'),
(4, 'FC Barcelona', '133577-complete.png', 'Bottesford Town F.C', '733942-BottesfordTown_logo.png', 'tornament second match', 'second', '19-10-2020', '7:24 PM', '12:24 PM', 2.17, NULL, NULL, NULL, NULL, '2020-10-15 18:24:18', '2020-10-15 18:24:18'),
(7, 'Bottesford Town F.C', '617943-avs.png', 'FC Barcelona', '843659-download.png', 'test match', 'first', '29-10-2020', '7:19 PM', NULL, 5, 3, 0, 10, 1, '2020-10-20 14:16:58', '2020-10-20 14:16:58'),
(8, 'first team', '245815-bg_1.jpg', 'second team', '274119-bg-01.jpg', 'epl', 'first', '27-10-2020', '6:20 PM', NULL, 5, 3, 0, 20, 1, '2020-10-22 13:16:59', '2020-10-22 13:16:59'),
(9, 'team one', '328666-bg_1.jpg', 'team two', '654903-gameschd1.jpg', 'EPL', 'First', '03-11-2020', '2:15 PM', NULL, 5, 3, 0, 20, 1, '2020-10-30 00:10:10', '2020-10-30 00:10:10'),
(10, 'Team One', '824759-download.png', 'team two', '471919-avs.png', 'EPL', 'First Round', '18-11-2020', '3:25 PM', NULL, 5, 3, 0, 15, 1, '2020-11-10 00:23:02', '2020-11-10 00:23:02'),
(11, 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', 'IPL', 'Test', '02-12-2020', '7:30 PM', NULL, 5, 3, 0, 10, 1, '2020-11-10 21:25:37', '2020-11-10 21:25:37'),
(12, 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', 'FRiendly Match', 'Test1', '03-12-2020', '3:30 PM', NULL, 5, 3, 0, 13, 1, '2020-11-10 21:27:08', '2020-11-10 21:27:08'),
(14, 'cheisea', '344069-download.png', 'fulham', '205254-fulham.png', 'Test Match', 'first', '03-12-2020', '11:00 AM', NULL, 5, 3, 0, 5, 1, '2020-11-12 11:58:31', '2020-11-12 11:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-08-19-170232', 'App\\Database\\Migrations\\Users', 'default', 'App', 1597857470, 1);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(20) NOT NULL,
  `team` int(10) NOT NULL,
  `player_image` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `player_name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `squad_no` int(20) DEFAULT NULL,
  `dateofbirth` varchar(30) NOT NULL,
  `signed_date` varchar(30) NOT NULL,
  `player_height` float NOT NULL,
  `country` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `team`, `player_image`, `description`, `player_name`, `position`, `squad_no`, `dateofbirth`, `signed_date`, `player_height`, `country`, `created_at`, `updated_at`) VALUES
(1, 1, '971953-BottesfordTown_logo.png', 'test player description', 'Kalvin Phillips', 'Defending/Holding Midfielder', 1, '12-10-1995', '06-10-2020', 6.8, 'uk', '2020-10-15 16:28:08', '2020-10-15 16:28:08'),
(2, 1, '129448-Eden_Hazard.jpg', 'test player description', 'Eden Hazard', 'Right Midfielder/Winger', 2, '08-10-2008', '16-09-2020', 5.8, 'uk', '2020-10-15 16:29:15', '2020-10-15 16:29:15'),
(3, 2, '148156-complete.png', 'test player description', 'Lionel Messi', 'Defending/Holding Midfielder', 4, '12-10-1994', '16-10-2019', 7.1, 'uk', '2020-10-15 16:32:19', '2020-10-15 16:32:19'),
(4, 2, '96410-person_4.jpg', 'test player description', 'Francisco Trincão', 'Defending/Holding Midfielder', 7, '11-10-1990', '07-10-2014', 7.3, 'uk', '2020-10-15 16:33:43', '2020-10-15 16:33:43'),
(7, 1, '345812-about-1.jpg', 'catin description', 'captaine', 'Right Midfielder/Winger', 8, '12-10-1994', '21-10-2020', 6.5, 'uk', '2020-10-21 13:30:03', '2020-10-21 13:30:03'),
(8, 1, '688395-image_5.jpg', 'glary description', 'Glary', 'Central/Box-to-Box Midfielder', 12, '12-10-1995', '03-09-2020', 6.5, 'uk', '2020-10-21 14:00:40', '2020-10-21 14:00:40'),
(10, 3, '961249-about-1.jpg', 'Test player description', 'Calvin Stengs ', 'Right Fullback', 6, '10-11-1994', '12-11-2020', 6.5, 'uk', '2020-11-12 22:33:34', '2020-11-12 22:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `sports_hall_booking_tbl`
--

CREATE TABLE `sports_hall_booking_tbl` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `purpose` varchar(50) DEFAULT NULL,
  `booking_date` varchar(30) DEFAULT NULL,
  `start_time` varchar(20) DEFAULT NULL,
  `end_time` varchar(20) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sports_hall_booking_tbl`
--

INSERT INTO `sports_hall_booking_tbl` (`id`, `user_id`, `name`, `email`, `mobile`, `purpose`, `booking_date`, `start_time`, `end_time`, `location`, `created_at`, `updated_at`) VALUES
(1, 9, 'George', 'George@mailinator.com', '03758367583', 'Sports Event', '25-10-2020', NULL, NULL, 'uk', '2020-10-20 13:30:32', '2020-10-20 13:30:32'),
(2, 10, '', '', '', 'sports event', '10-11-2020', '9:59 PM', '10:59 PM', '', '2020-11-04 19:59:34', '2020-11-04 19:59:34'),
(3, 10, '', '', '', 'Public sports', '19-11-2020', '6:56 PM', '6:56 PM', '', '2020-11-07 15:56:14', '2020-11-07 15:56:14'),
(4, 9, '', '', '', 'sports event 2', '10-12-2020', NULL, NULL, '', '2020-11-07 19:56:55', '2020-11-07 19:56:55'),
(5, 9, '', '', '', 'event 2', '26-11-2020', NULL, NULL, '', '2020-11-07 20:04:03', '2020-11-07 20:04:03'),
(6, 9, '', '', '', 'event', '18-11-2020', NULL, NULL, '', '2020-11-07 20:12:05', '2020-11-07 20:12:05'),
(7, 9, '', '', '', 'event', '25-11-2020', '11:17 AM', '12:18 AM', '', '2020-11-07 20:15:02', '2020-11-07 20:15:02'),
(8, 10, '', '', '', 'title', '29-11-2020', '2:30 PM', '3:30 PM', '', '2020-11-07 23:30:27', '2020-11-07 23:30:27'),
(9, 9, '', '', '', 'Sports event 1', '24-11-2020', '12:00 PM', '1:00 PM', '', '2020-11-09 09:49:55', '2020-11-09 09:49:55'),
(10, 9, '', '', '', 'sports event', '28-11-2020', '11:29 AM', '12:29 PM', '', '2020-11-09 22:23:28', '2020-11-09 22:23:28'),
(11, 9, '', '', '', 'Test Event', '09-12-2020', '10:00 AM', '11:00 AM', '', '2020-11-10 00:31:26', '2020-11-10 00:31:26'),
(12, 12, '', '', '', 'sports event', '19-11-2020', '1:00 PM', '2:00 PM', '', '2020-11-12 22:55:31', '2020-11-12 22:55:31'),
(13, 12, '', '', '', 'Test Event', '24-11-2020', '2:00 PM', '3:00 PM', '', '2020-11-12 22:57:12', '2020-11-12 22:57:12'),
(14, 10, '', '', '', 'Sports Club', '21-11-2020', '5:00 PM', '6:00 PM', '', '2020-11-19 13:03:53', '2020-11-19 13:03:53'),
(15, 10, '', '', '', 'Batmitten', '27-11-2020', '1:20 PM', '3:18 PM', '', '2020-11-19 13:15:17', '2020-11-19 13:15:17'),
(16, 10, '', '', '', 'events', '28-11-2020', '5:21 PM', '7:22 PM', '', '2020-11-19 13:18:25', '2020-11-19 13:18:25'),
(17, 10, '', '', '', 'hf', '26-11-2020', '1:20 PM', '1:19 PM', '', '2020-11-19 13:19:52', '2020-11-19 13:19:52'),
(18, 10, '', '', '', 'ryrey', '25-11-2020', '1:25 PM', '1:26 PM', '', '2020-11-19 13:21:39', '2020-11-19 13:21:39'),
(19, 10, '', '', '', 'gjgf', '02-12-2020', '1:25 PM', '1:26 PM', '', '2020-11-19 13:22:44', '2020-11-19 13:22:44'),
(20, 10, '', '', '', 'fdhfdh', '28-11-2020', '1:25 PM', '1:28 PM', '', '2020-11-19 13:23:58', '2020-11-19 13:23:58'),
(21, 10, '', '', '', 'cvncv', '26-11-2020', '4:24 PM', '3:29 PM', '', '2020-11-19 13:25:11', '2020-11-19 13:25:11'),
(22, 10, '', '', '', 'Tennsis sports', '09-12-2020', '5:30 PM', '6:30 PM', '', '2020-11-19 13:26:40', '2020-11-19 13:26:40'),
(23, 10, '', '', '', 'Coaching Club', '17-12-2020', '11:00 AM', '1:00 PM', '', '2020-11-19 18:03:03', '2020-11-19 18:03:03'),
(24, 10, '', '', '', 'Test', '24-11-2020', '12:00 PM', '2:00 PM', '', '2020-11-19 18:06:33', '2020-11-19 18:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(20) NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `team_manager_name` varchar(50) NOT NULL,
  `team_manager_mobile` varchar(50) NOT NULL,
  `team_manager_email` varchar(150) NOT NULL,
  `status` int(10) NOT NULL,
  `role_type` int(50) NOT NULL DEFAULT 3,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_name`, `team_manager_name`, `team_manager_mobile`, `team_manager_email`, `status`, `role_type`, `created_at`, `updated_at`) VALUES
(1, 'Bottesford Town F.C', 'Jimmy McNeil', '07845634785', 'Jimmy@mailinator.com', 1, 3, '2020-10-15 16:25:36', '2020-10-15 16:25:36'),
(2, 'FC Barcelona', 'Ronald Koeman', '07835637856', 'Ronald@mailinator.com', 1, 3, '2020-10-15 16:30:57', '2020-10-15 16:30:57'),
(3, 'Netherlands national football team', 'Virgil', '09759874957', 'Virgil@mailinator.com', 1, 3, '2020-11-12 22:27:35', '2020-11-12 22:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_booking`
--

CREATE TABLE `ticket_booking` (
  `id` int(20) NOT NULL,
  `match_id` int(20) NOT NULL,
  `match_type` varchar(50) NOT NULL,
  `matchdate` varchar(30) NOT NULL,
  `team_one` varchar(50) NOT NULL,
  `team_one_img` varchar(100) NOT NULL,
  `team_two` varchar(50) NOT NULL,
  `team_two_img` varchar(100) NOT NULL,
  `ticket` int(20) NOT NULL,
  `ticket_price` float DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `adult_ticket_price` float DEFAULT NULL,
  `conses_ticket_price` float DEFAULT NULL,
  `under_16_ticket_price` float DEFAULT NULL,
  `user_id` int(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_booking`
--

INSERT INTO `ticket_booking` (`id`, `match_id`, `match_type`, `matchdate`, `team_one`, `team_one_img`, `team_two`, `team_two_img`, `ticket`, `ticket_price`, `type`, `adult_ticket_price`, `conses_ticket_price`, `under_16_ticket_price`, `user_id`, `created_at`) VALUES
(38, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', 431, NULL, 'under_16', 5, 3, 0, 0, '2020-10-30 00:14:30'),
(39, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', 807, NULL, 'adult', 5, 3, NULL, 0, '2020-10-30 00:14:30'),
(40, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', 131, NULL, 'Consecciond', NULL, 3, NULL, 0, '2020-10-30 00:14:30'),
(41, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', 906, NULL, 'Consecciond', NULL, 3, NULL, 0, '2020-10-30 00:17:46'),
(42, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', 973, NULL, 'adult', 5, NULL, NULL, 0, '2020-10-30 00:17:46'),
(43, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', 876, NULL, 'under_16', 5, 3, 0, 0, '2020-10-30 00:17:46'),
(44, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', 347, NULL, 'adult', 5, NULL, NULL, 9, '2020-10-30 00:19:43'),
(45, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', 606, NULL, 'Consecciond', NULL, 3, NULL, 9, '2020-10-30 00:19:43'),
(46, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', 222, NULL, 'under_16', 5, 3, 0, 9, '2020-10-30 00:19:43'),
(47, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', 641, NULL, 'adult', 5, NULL, NULL, 10, '2020-10-30 09:33:37'),
(48, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', 873, NULL, 'Consecciond', NULL, 3, NULL, 10, '2020-10-30 09:33:37'),
(49, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', 975, NULL, 'under_16', 5, 3, 0, 10, '2020-10-30 09:33:37'),
(50, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', 673, NULL, 'adult', 5, NULL, NULL, 10, '2020-10-30 09:41:05'),
(51, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', 583, NULL, 'adult', 5, NULL, NULL, 10, '2020-10-30 09:41:05'),
(52, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', 290, NULL, 'Consecciond', NULL, 3, NULL, 10, '2020-10-30 09:41:05'),
(53, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', 253, NULL, 'under_16', 5, 3, 0, 10, '2020-10-30 09:41:05'),
(54, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', 79, NULL, 'under_16', 5, 3, 0, 10, '2020-10-30 09:41:05'),
(55, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', 589, NULL, 'adult', 5, NULL, NULL, 10, '2020-10-30 09:58:24'),
(56, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', 921, NULL, 'under_16', 5, 3, 0, 10, '2020-10-30 09:58:24'),
(57, 10, 'EPL', 'Nov 18, 2020', 'Team One', 'http://192.168.43.55/bottesford_backend/uploads/match/824759-download.png', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/471919-avs.png', 103, NULL, 'adult', 5, NULL, NULL, 9, '2020-11-10 00:26:31'),
(58, 10, 'EPL', 'Nov 18, 2020', 'Team One', 'http://192.168.43.55/bottesford_backend/uploads/match/824759-download.png', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/471919-avs.png', 142, NULL, 'adult', 5, NULL, NULL, 9, '2020-11-10 00:26:31'),
(59, 10, 'EPL', 'Nov 18, 2020', 'Team One', 'http://192.168.43.55/bottesford_backend/uploads/match/824759-download.png', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/471919-avs.png', 230, NULL, 'Consecciond', NULL, 3, NULL, 9, '2020-11-10 00:26:31'),
(60, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', 105, NULL, 'Consecciond', NULL, 3, NULL, 9, '2020-11-10 18:03:34'),
(61, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', 311, NULL, 'under_16', NULL, NULL, 0, 9, '2020-11-10 18:03:34'),
(62, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', 121, NULL, 'adult', 5, NULL, NULL, 9, '2020-11-10 18:03:34'),
(63, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', 251, NULL, 'adult', 5, NULL, NULL, 9, '2020-11-10 20:43:22'),
(64, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', 88, NULL, 'Consecciond', NULL, 3, NULL, 9, '2020-11-10 20:43:22'),
(65, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', 398, NULL, 'under_16', NULL, NULL, 0, 9, '2020-11-10 20:43:22'),
(66, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', 546, NULL, 'Consecciond', NULL, 3, NULL, 9, '2020-11-10 20:43:22'),
(67, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', 180, NULL, 'under_16', NULL, NULL, 0, 9, '2020-11-10 20:43:22'),
(68, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', 225, NULL, 'Consecciond', NULL, 3, NULL, 9, '2020-11-10 20:43:22'),
(69, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', 968, NULL, 'adult', 5, NULL, NULL, 9, '2020-11-10 20:53:32'),
(70, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', 796, NULL, 'Consecciond', NULL, 3, NULL, 9, '2020-11-10 20:53:32'),
(71, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', 416, NULL, 'under_16', NULL, NULL, 0, 9, '2020-11-10 20:53:32'),
(72, 0, '', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', 243, NULL, 'adult', 5, 3, 0, 0, '2020-11-11 00:24:49'),
(73, 0, '', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', 686, NULL, 'Consecciond', 5, 3, 0, 0, '2020-11-11 00:24:49'),
(74, 0, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', 25, NULL, 'adult', 5, 3, 0, 0, '2020-11-11 00:24:49'),
(75, 0, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', 1000, NULL, 'adult', 5, 3, 0, 0, '2020-11-11 00:27:14'),
(76, 0, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', 195, NULL, 'Consecciond', 5, 3, 0, 0, '2020-11-11 00:27:14'),
(77, 11, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', 487, NULL, 'adult', 5, 3, 0, 0, '2020-11-11 00:32:38'),
(78, 11, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', 273, NULL, 'Consecciond', 5, 3, 0, 0, '2020-11-11 00:32:38'),
(79, 11, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', 686, NULL, 'under_16', 5, 3, 0, 0, '2020-11-11 00:32:38'),
(80, 12, '', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', 499, NULL, 'Consecciond', 5, 3, 0, 0, '2020-11-11 00:35:40'),
(81, 12, '', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', 237, NULL, 'Consecciond', 5, 3, 0, 0, '2020-11-11 00:35:40'),
(82, 12, '', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', 559, NULL, 'adult', 5, 3, 0, 0, '2020-11-11 00:35:40'),
(83, 12, '', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', 984, NULL, 'under_16', 5, 3, 0, 0, '2020-11-11 00:35:40'),
(84, 11, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', 893, NULL, 'adult', 5, 3, 0, 10, '2020-11-11 00:50:34'),
(85, 11, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', 273, NULL, 'Consecciond', 5, 3, 0, 10, '2020-11-11 00:50:34'),
(86, 11, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', 98, NULL, 'under_16', 5, 3, 0, 10, '2020-11-11 00:50:34'),
(87, 11, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', 561, NULL, 'Consecciond', 5, 3, 0, 10, '2020-11-11 00:50:34'),
(88, 11, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', 266, NULL, 'under_16', 5, 3, 0, 10, '2020-11-11 00:50:34'),
(89, 11, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', 242, NULL, 'adult', 5, 3, 0, 10, '2020-11-11 00:50:34'),
(90, 11, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', 98, NULL, 'Consecciond', 5, 3, 0, 10, '2020-11-11 00:50:34'),
(91, 12, 'FRiendly Match', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', 227, NULL, 'adult', 5, 3, 0, 10, '2020-11-12 10:57:18'),
(92, 12, 'FRiendly Match', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', 550, NULL, 'Consecciond', 5, 3, 0, 10, '2020-11-12 10:57:18'),
(93, 12, 'FRiendly Match', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', 312, NULL, 'Consecciond', 5, 3, 0, 10, '2020-11-12 10:57:18'),
(94, 12, 'FRiendly Match', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', 804, NULL, 'adult', 5, 3, 0, 10, '2020-11-12 10:57:18'),
(95, 12, 'FRiendly Match', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', 597, NULL, 'Consecciond', 5, 3, 0, 10, '2020-11-12 10:57:18'),
(96, 12, 'FRiendly Match', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', 576, NULL, 'Consecciond', 5, 3, 0, 10, '2020-11-12 10:57:18'),
(97, 12, 'FRiendly Match', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', 154, NULL, 'adult', 5, 3, 0, 10, '2020-11-12 10:57:18'),
(98, 14, 'Test Match', '03-12-2020', 'cheisea', '344069-download.png', 'fulham', '205254-fulham.png', 785, NULL, 'adult', 5, 3, 0, 10, '2020-11-12 18:55:39'),
(99, 14, 'Test Match', '03-12-2020', 'cheisea', '344069-download.png', 'fulham', '205254-fulham.png', 996, NULL, 'Consecciond', 5, 3, 0, 10, '2020-11-12 18:55:39'),
(100, 14, 'Test Match', '03-12-2020', 'cheisea', '344069-download.png', 'fulham', '205254-fulham.png', 12, NULL, 'under_16', 5, 3, 0, 10, '2020-11-12 18:55:39'),
(101, 14, 'Test Match', '03-12-2020', 'cheisea', '344069-download.png', 'fulham', '205254-fulham.png', 576, NULL, 'Consecciond', 5, 3, 0, 10, '2020-11-12 18:55:39'),
(102, 14, 'Test Match', '03-12-2020', 'cheisea', '344069-download.png', 'fulham', '205254-fulham.png', 298, NULL, 'adult', 5, 3, 0, 10, '2020-11-12 18:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address_one` varchar(50) DEFAULT NULL,
  `town` varchar(30) DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `role_type` int(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `address_one`, `town`, `postcode`, `status`, `role_type`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin@bottesford.com', '$2y$10$NlAJWHxhUUcPSXgHg/t/n.F9hx1eXE3QA4Kx8yIqDCyFHNKmG.cUy', '07835678345', NULL, NULL, NULL, 1, 1, '2020-10-08 23:02:50', '2020-10-08 23:02:50'),
(9, 'George ', 'George@mailinator.com', '$2y$10$XDkA.NPFNleZseIxe3ohNu1ht2hhsqt8cb8fu5ad5cPDuRxad0ePe', '03856378563', NULL, NULL, NULL, 1, 3, '2020-10-15 16:54:50', '2020-10-15 16:54:50'),
(10, 'Jack ', 'Jack@mailinator.com', '$2y$10$vF7Yd03m1KjgPCE63CQlKO9ykdYzhz/moXlr/4DkwdCXFhiE4Y2Hq', '09837583537', NULL, NULL, NULL, 1, 3, '2020-10-15 17:23:33', '2020-10-15 17:23:33'),
(11, 'Jimmy', 'Jimmy@mailinator.com', '$2y$10$NDwdFw6tERYzydj6K.kqteMCQLkOsdPxHIFUHJVSDA9f34FdW.U6a', '98375836537', NULL, NULL, NULL, 1, 2, '2020-10-21 10:56:50', '2020-10-21 10:56:50'),
(12, 'Harry', 'Harry@mailinator.com', '$2y$10$Y.C8Y2YSW4tsoTPE7QQN3umQoMuWGOf2/pDnL/S8fOfXojaeDljdC', '07865873465', NULL, NULL, NULL, 1, 3, '2020-11-12 22:19:11', '2020-11-12 22:19:11'),
(13, 'martin', 'Martin@mailinator.com', '$2y$10$DhheBfQ46qYPaiLahOa38OifMHzVZkzoQByaLQ1YrVwi3xWwvxEzm', '04794868743', NULL, NULL, NULL, 1, 2, '2020-11-12 23:01:52', '2020-11-12 23:01:52'),
(14, 'Virgil', 'Virgil@mailinator.com', '$2y$10$or0kd0K/ATUpGOFxqH19eu6hl05nk3RCFmDKuoa92wvgcShwRkmFO', '08350934754', NULL, NULL, NULL, 1, 2, '2020-11-12 23:03:42', '2020-11-12 23:03:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_tbl`
--
ALTER TABLE `blog_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `match_result_tbl`
--
ALTER TABLE `match_result_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `match_tbl`
--
ALTER TABLE `match_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports_hall_booking_tbl`
--
ALTER TABLE `sports_hall_booking_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_booking`
--
ALTER TABLE `ticket_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_tbl`
--
ALTER TABLE `blog_tbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `match_result_tbl`
--
ALTER TABLE `match_result_tbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `match_tbl`
--
ALTER TABLE `match_tbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sports_hall_booking_tbl`
--
ALTER TABLE `sports_hall_booking_tbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket_booking`
--
ALTER TABLE `ticket_booking`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
