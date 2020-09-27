-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2020 at 11:44 AM
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
(2, 'womens team', '232940-about.jpg', 'test check team', '301201-about-1.jpg', 'The football champion chip', 2, 3, '23-09-2020', 'https://www.youtube.com/watch?v=qO4k_Y17kVY', '2020-09-26 13:19:16', '2020-09-26 13:19:16'),
(3, 'womens team', '136473-gameschd1.jpg', 'test', '414504-gamesch3.jpg', 'Second Match', 3, 2, '24-09-2020', 'https://www.youtube.com/watch?v=qO4k_Y17kVY', '2020-09-26 13:20:37', '2020-09-26 13:20:37'),
(5, 'First team and u28', '714483-nextmatchmain.jpg', 'Rajasthan Royal', '31741-nextmatch2.jpg', 'last match', 3, 4, '25-09-2020', 'https://www.youtube.com/watch?v=aro5tN_vSYU', '2020-09-26 14:20:15', '2020-09-26 14:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `match_tbl`
--

CREATE TABLE `match_tbl` (
  `id` int(20) NOT NULL,
  `team_one` varchar(50) NOT NULL,
  `team_one_image` varchar(30) NOT NULL,
  `team_two` varchar(50) NOT NULL,
  `team_two_image` varchar(30) NOT NULL,
  `match_name` varchar(30) NOT NULL,
  `round` varchar(20) NOT NULL,
  `match_date` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `match_tbl`
--

INSERT INTO `match_tbl` (`id`, `team_one`, `team_one_image`, `team_two`, `team_two_image`, `match_name`, `round`, `match_date`, `created_at`, `updated_at`) VALUES
(4, 'First team and u28', '704024-team-5.jpg', 'womens team', '97746-bg_1.jpg', 'second match', 'semi-final', '23-09-2020', '2020-09-18 18:13:31', '2020-09-18 18:13:31'),
(5, 'womens team', '108034-player5.jpg', 'First team and u28', '95193-team-4.jpg', 'third match', 'final', '26-09-2020', '2020-09-18 18:14:15', '2020-09-18 18:14:15'),
(6, 'womens team', '317743-gameschd1.jpg', 'test', '600568-login-img4.jpg', 'second match', 'first match', '24-09-2020', '2020-09-18 18:42:58', '2020-09-18 18:42:58'),
(7, 'First team and u28', '228231-bg_2.jpg', 'womens team', '526347-nextmatchmain2.jpg', '22 match', 'second', '22-09-2020', '2020-09-18 18:43:56', '2020-09-18 18:43:56'),
(10, 'womens team', '758471-gameschd1.jpg', 'test check team', '275041-image_8.jpg', 'the champion chip', 'second', '23-09-2020', '2020-09-21 11:04:41', '2020-09-21 11:04:41'),
(11, 'Rajasthan Royal', '834334-player7.jpg', 'Rajasthan Royal', '60382-player2.jpg', 'World Football', 'first ', '28-09-2020', '2020-09-25 09:54:58', '2020-09-25 09:54:58'),
(12, 'En Fuego CF', '388690-person_1.jpg', 'Rush Hour', '918781-person_4.jpg', 'The North West Derby', 'test', '29-09-2020', '2020-09-25 12:13:24', '2020-09-25 12:13:24'),
(13, 'test check team', '703631-nextmatchmain.jpg', 'Mumbai Indians', '358605-login_img.jpg', 'test match', 'first', '30-09-2020', '2020-09-26 15:56:04', '2020-09-26 15:56:04'),
(14, 'Team Avengers update', '735862-gamesch4.jpg', 'Inter Real Hustlers FC.', '490690-gameschd1.jpg', 'The world football', 'First', '30-09-2020', '2020-09-27 14:20:26', '2020-09-27 14:20:26');

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
(1, 5, '909293-about.jpg', 'test', 'hari', 'Right Fullback', 3, '10-09-2020', '10-09-2020', 1.67, 'uk', '2020-09-11 16:45:50', '2020-09-11 16:45:50'),
(2, 6, '996116-wbi.jpg', 'test description', 'umari', 'Center Back', 5, '10-09-2014', '10-09-2014', 6.2, 'us', '2020-09-11 16:53:09', '2020-09-11 16:53:09'),
(3, 5, '397860-player7.jpg', 'test description', 'maeri', 'Left Fullback', 7, '10-09-2014', '10-09-2014', 6, 'uk', '2020-09-11 19:53:59', '2020-09-11 19:53:59'),
(4, 5, '574768-person_4.jpg', 'test description update', 'john', 'Center Back', 3, '20-09-2020', '20-09-2020', 7.8, 'uk', '2020-09-20 20:08:03', '2020-09-20 20:08:03'),
(5, 10, '707085-nextmatchmain.jpg', 'tes player description', 'john mark', 'Central/Box-to-Box Midfielder', 5, '21-09-2020', '21-09-2020', 6.2, 'uk', '2020-09-21 10:35:21', '2020-09-21 10:35:21'),
(6, 10, '358955-gamesch3.jpg', 'tes player description', 'mark', 'Right Midfielder/Winger', 6, '08-08-1984', '08-08-1984', 6.7, 'uk', '2020-09-21 10:40:30', '2020-09-21 10:40:30'),
(7, 10, '446861-player6.jpg', 'player descreiption', 'peter mark', 'Right Midfielder/Winger', 12, '07-08-1985', '12-08-2010', 7, 'uk', '2020-09-21 10:55:49', '2020-09-21 10:55:49'),
(8, 6, '977634-avatar-1.jpg', 'test women description', 'mercy', 'Defending/Holding Midfielder', 7, '13-09-1990', '08-09-2015', 4.9, 'uk', '2020-09-21 11:03:28', '2020-09-21 11:03:28'),
(9, 11, '107031-bg_2.jpg', 'test playdesc', 'mechalm', 'Central/Box-to-Box Midfielder', 7, '17-09-2020', '21-09-2020', 7, 'uk', '2020-09-21 11:13:14', '2020-09-21 11:13:14'),
(10, 12, '542714-login-img1.jpg', 'test description', 'Tom', 'Center Back (or Sweeper, if us', 2, '05-09-1990', '10-09-2020', 5.7, 'uk', '2020-09-25 09:51:46', '2020-09-25 09:51:46'),
(11, 13, '902077-player2.jpg', 'player discription', 'predhip', 'Defending/Holding Midfielder', 7, '11-08-1994', '02-09-2020', 7.1, 'uk', '2020-09-25 09:53:30', '2020-09-25 09:53:30'),
(12, 14, '23367-person_1.jpg', 'test description for players', 'Lionel Messi', 'Goalkeeper', 4, '06-09-1989', '09-09-2020', 5.7, 'uk', '2020-09-25 12:10:29', '2020-09-25 12:10:29'),
(13, 15, '189983-person_4.jpg', 'test description for players', 'Cristiano Ronaldo', 'Left Fullback', 8, '04-09-1991', '09-09-2014', 7.4, 'us', '2020-09-25 12:12:09', '2020-09-25 12:12:09'),
(14, 16, '323072-player1.jpg', 'test description for player', 'Antoine Griezmann', 'Center Back (or Sweeper, if us', 7, '14-09-1990', '09-09-2020', 6.5, 'uk', '2020-09-27 13:52:24', '2020-09-27 13:52:24'),
(15, 13, '908540-gameschd1.jpg', 'test', 'mary', 'Center Back (or Sweeper, if used)', 8, '10-09-2014', '10-09-2020', 7, 'uk', '2020-09-27 14:04:18', '2020-09-27 14:04:18'),
(16, 16, '160812-player2.jpg', 'test description for players', 'Anirudh Thapa', 'Center Back (or Sweeper, if used)', 7, '07-09-1990', '09-09-2020', 6.7, 'uk', '2020-09-27 14:14:56', '2020-09-27 14:14:56'),
(17, 17, '348436-staff-6.jpg', 'player description', 'Sandesh Jhingan', 'Right Midfielder/Winger', 9, '16-09-1987', '02-09-2020', 6.9, 'uk', '2020-09-27 14:18:47', '2020-09-27 14:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `sports_hall_booking_tbl`
--

CREATE TABLE `sports_hall_booking_tbl` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `booking_date` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sports_hall_booking_tbl`
--

INSERT INTO `sports_hall_booking_tbl` (`id`, `user_id`, `name`, `email`, `mobile`, `purpose`, `booking_date`, `location`, `created_at`, `updated_at`) VALUES
(1, 2, 'vinoth', 'vinoth@mail.com', '0', 'Sports Event', '22-09-2020', 'coimbatore', '2020-09-22 17:54:22', '2020-09-22 17:54:22'),
(2, 17, 'Raju', 'raju@mailinator.com', '0', 'Sports Event', '26-09-2020', 'uk', '2020-09-22 18:01:35', '2020-09-22 18:01:35'),
(3, 17, 'peter', 'Peter@gmail.com', '0', 'Sports Event', '01-10-2020', 'tamilnadu', '2020-09-22 18:06:36', '2020-09-22 18:06:36'),
(4, 17, 'John', 'John@mail.com', '2147483647', 'Sports Event', '08-10-2020', 'coimbatore', '2020-09-22 18:09:39', '2020-09-22 18:09:39'),
(5, 23, 'henry', 'Henry@gmail.com', '2147483647', 'Sports Event', '29-09-2020', 'uk', '2020-09-25 12:19:12', '2020-09-25 12:19:12'),
(6, 24, 'Harry', 'harryjack@mailinator.com', '2147483647', 'Sports Event', '30-09-2020', 'uk', '2020-09-27 14:32:13', '2020-09-27 14:32:13'),
(7, 24, 'peter', 'peter@gmail.com', '2147483647', 'Sports Event', '14-10-2020', 'uk', '2020-09-27 14:43:00', '2020-09-27 14:43:00'),
(8, 24, 'gerge', 'gerge@mailinator.com', '2147483647', 'Sports Event', '15-10-2020', 'uk', '2020-09-27 14:48:38', '2020-09-27 14:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(20) NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_name`, `status`, `created_at`, `updated_at`) VALUES
(5, 'First team and u28', 1, '2020-09-10 19:30:28', '2020-09-10 19:30:28'),
(6, 'womens team', 1, '2020-09-10 19:30:44', '2020-09-10 19:30:44'),
(10, 'test check team', 1, '2020-09-21 10:33:19', '2020-09-21 10:33:19'),
(11, 'test team', 1, '2020-09-21 11:12:26', '2020-09-21 11:12:26'),
(12, 'Rajasthan Royal', 1, '2020-09-25 09:49:39', '2020-09-25 09:49:39'),
(13, 'Mumbai Indians', 1, '2020-09-25 09:49:55', '2020-09-25 09:49:55'),
(14, 'En Fuego CF', 1, '2020-09-25 12:08:10', '2020-09-25 12:08:10'),
(15, 'Rush Hour', 1, '2020-09-25 12:08:30', '2020-09-25 12:08:30'),
(16, 'Team Avengers update', 1, '2020-09-27 13:46:18', '2020-09-27 13:46:18'),
(17, 'Inter Real Hustlers FC.', 1, '2020-09-27 13:49:34', '2020-09-27 13:49:34');

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
  `ticket_price` float NOT NULL,
  `user_id` int(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_booking`
--

INSERT INTO `ticket_booking` (`id`, `match_id`, `match_type`, `matchdate`, `team_one`, `team_one_img`, `team_two`, `team_two_img`, `ticket`, `ticket_price`, `user_id`, `created_at`) VALUES
(1, 10, 'the champion chip', '23-09-2020', 'womens team', 'http://192.168.43.55/bottesford_api/uploads/match/758471-gameschd1.jpg', 'test check team', 'http://192.168.43.55/bottesford_api/uploads/match/275041-image_8.jpg', 131, 2.7, 17, '2020-09-23 20:38:16'),
(2, 11, 'World Football', '28-09-2020', 'Rajasthan Royal', 'http://192.168.43.55/bottesford_api/uploads/match/944419-login-img2.jpg', 'Mumbai Indians', 'http://192.168.43.55/bottesford_api/uploads/match/60382-player2.jpg', 664, 2.7, 22, '2020-09-25 10:03:14'),
(3, 5, 'third match', '26-09-2020', 'womens team', 'http://192.168.43.55/bottesford_api/uploads/match/108034-player5.jpg', 'First team and u28', 'http://192.168.43.55/bottesford_api/uploads/match/95193-team-4.jpg', 816, 2.7, 17, '2020-09-25 11:50:43'),
(4, 12, 'The North West Derby', '29-09-2020', 'En Fuego CF', 'http://192.168.43.55/bottesford_api/uploads/match/388690-person_1.jpg', 'Rush Hour', 'http://192.168.43.55/bottesford_api/uploads/match/918781-person_4.jpg', 697, 2.7, 23, '2020-09-25 12:18:05'),
(5, 14, 'The world football', 'Sep 30, 2020', 'Team Avengers update', 'http://192.168.43.55/bottesford_api/uploads/match/735862-gamesch4.jpg', 'Inter Real Hustlers FC.', 'http://192.168.43.55/bottesford_api/uploads/match/490690-gameschd1.jpg', 690, 2.7, 24, '2020-09-27 14:25:39');

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
  `role_type` int(10) NOT NULL DEFAULT 2,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `address_one`, `town`, `postcode`, `status`, `role_type`, `created_at`, `updated_at`) VALUES
(1, 'vinoth', 'vinoth@gmail.com', '$2y$10$zM0UJNXk85A60Jt5GYXNl.YZBuHmJcwUP9RXw97S0iiel4IG1xnNK', '123456789', '1/20 quan street', 'uk', 'rst1234', 1, 2, '2020-08-21 17:07:21', '2020-09-21 23:58:50'),
(2, 'john', 'john@gmail.com', '$2y$10$QkrLhx2j0HJSjMUe99kgze190sYzQ76tdCX9gq9sVRbf2XfFo5qla', '2147483647', NULL, NULL, NULL, 1, 2, '2020-08-24 17:14:07', '2020-09-21 23:58:50'),
(3, 'Peter', 'Peter@mailinator.com', '$2y$10$8jjpgmhfhEg8mhiY3t5n2.79ukyJlPi7hEWQv52HGnEGayxMwZIGS', '2147483647', NULL, NULL, NULL, 1, 2, '2020-08-31 14:16:27', '2020-09-21 23:58:50'),
(4, 'Jack', 'Jack@mailinator.com', '$2y$10$Zk8PKa5m0pvCbJUAiUFl4eUw0GMBytimCYEpNk6rCVeX/TvIrz.7C', '2147483647', NULL, NULL, NULL, 1, 2, '2020-08-31 14:21:48', '2020-09-21 23:58:50'),
(5, 'mano', 'mano@mailinator.com', '$2y$10$Xu4l/xJ1Od9jDepAgyLKW.ubT3DVdauHgJGMM0gtaQoOJcedS1y6C', '2147483647', NULL, NULL, NULL, 1, 2, '2020-09-01 11:55:16', '2020-09-21 23:58:50'),
(6, 'Hari', 'Hari@mailinator.com', '$2y$10$g079e441BHm3zavXWJJLYepdkL0qDeBVmMH3nIM.sG32IB3STo1Ly', '2147483647', NULL, NULL, NULL, 1, 2, '2020-09-01 12:04:04', '2020-09-21 23:58:50'),
(7, 'tom', 'Tom@mailinator.com', '$2y$10$7A77c8SjunoWwiAgBJs0fubS743dZwEsjt0FiFwC5S.OYP7a3GG5a', '2147483647', NULL, NULL, NULL, 1, 2, '2020-09-01 19:10:00', '2020-09-21 23:58:50'),
(8, 'Arun', 'Arun@mailinator.com', '$2y$10$TrNSmtJzR7fRxxUoeNWfB..f8j7hij3ZLr53Cm3idRfxL7e6VHNyy', '2147483647', NULL, NULL, NULL, 1, 2, '2020-09-08 10:08:43', '2020-09-21 23:58:50'),
(9, 'Albert', 'Albert@mailinator.com', '$2y$10$YBt.j4XrKJPssSabVsWT/.2y2yYI4ueN0Mla83npYALkE4zD.JE6e', '987654321', NULL, NULL, NULL, 1, 2, '2020-09-08 10:47:54', '2020-09-21 23:58:50'),
(11, 'Admin', 'Admin@bottesford.com', '$2y$10$GF/4VsyaIlLaaIu2XmdGZOvAP5ygCOBjUA.uDgD60USMDJlfIKs6G', '2147483647', NULL, NULL, NULL, 1, 1, '2020-09-08 14:53:29', '2020-09-21 23:58:50'),
(12, 'Ragu', 'Ragu@mailinator.com', '$2y$10$lX0y/1lbdPG4Kf6LBER0FelGLJvNfQuu/YLOeu.TRWG2cXWUp73TK', '2147483647', NULL, NULL, NULL, 1, 2, '2020-09-19 14:00:50', '2020-09-21 23:58:50'),
(13, 'khgk', 'hkh@gmail.com', '$2y$10$llEkWE.36VshnczLthZI1ujuYRKRqy1vUydz98kblD/c.su8hiYqO', '2147483647', NULL, NULL, NULL, 1, 2, '2020-09-19 15:03:47', '2020-09-21 23:58:50'),
(14, 'rahu', 'Ragu@gmail.com', '$2y$10$myL21C48W.PEWlwlen9mY.HbP0KI6C7J.T.zX6MjUFdgpuQmSdMwy', '2147483647', NULL, NULL, NULL, 1, 2, '2020-09-19 15:06:33', '2020-09-21 23:58:50'),
(15, 'Mani khon', 'mani@mailinator.com', '$2y$10$I5GjV2y2KXeFv3097NS/.OL/cLiN8QB9dnYQuy/opyffudfaKq0qC', '2147483647', '12 block', 'uk', '83563', 1, 2, '2020-09-19 15:07:41', '2020-09-21 23:58:50'),
(16, 'Peter john', 'Peterjohn@mailinator.com', '$2y$10$YnCpqyyzj.5E2OytcNXRY.GAXjUkMISYxunOn7Nvfp/hFhp/vaIom', '2147483647', NULL, NULL, NULL, 1, 2, '2020-09-19 16:13:35', '2020-09-21 23:58:50'),
(17, 'Tom Mark', 'Tommark@mailinator.com', '$2y$10$Jm9xDspOuwCS3osB8k21reJBUjYYR1ewi39f3k9izyAD0RjP0jlmi', '2147483647', NULL, NULL, NULL, 1, 2, '2020-09-19 20:53:20', '2020-09-21 23:58:50'),
(18, 'Mani Hari', 'Manihari@mailinator.com', '$2y$10$jlEDFX6c4jvG2RXTwrY3CeDUXlRuLSyjnsc/A4hsWnmDPeiEl66E2', '2147483647', NULL, NULL, NULL, 1, 2, '2020-09-19 21:19:01', '2020-09-21 23:58:50'),
(19, 'Thor Hems', 'Thorhems@mailinator.com', '$2y$10$iUz0IcnUCUivL2poDghNY.ecYkthvL7MHJpkqZlKFEBzYJ9EeD0Fu', '2147483647', NULL, NULL, NULL, 1, 2, '2020-09-21 09:37:53', '2020-09-21 23:58:50'),
(20, 'Martin', 'Martin@mailinator.com', '$2y$10$4XDaL5osmRYIFeqHcFWyqeyjKlk4Yv5rky2jyEYhT7EwJ.gGPHJji', '2147483647', NULL, NULL, NULL, 1, 2, '2020-09-21 09:44:21', '2020-09-21 23:58:50'),
(21, 'Raju', 'Raju@mailinator.com', '$2y$10$P6hetvOuACdkgBhlEHhUCuVHVv3cVnnzYAy9YTRQ5HVkoWiTb6gKu', '2147483647', '11 buildin', 'uk', '09758578', 1, 2, '2020-09-21 10:09:52', '2020-09-21 23:58:50'),
(22, 'Yasi', 'Yasi@mailinator.com', '$2y$10$vc.eA4vu1XLhLHxfPIAISeEPt5z/VRgT31cxHHbaYuT/sA/6oKdWO', '2147483647', NULL, NULL, NULL, 1, 2, '2020-09-25 09:56:46', '2020-09-25 09:56:46'),
(23, 'Henry', 'Henry@mailinator.com', '$2y$10$zKM8Uk2xcSHDOY.vVMwRtOr.DUOOsp8VdCMcbolPwUupfISx0/l3O', '2147483647', NULL, NULL, NULL, 1, 2, '2020-09-25 12:15:44', '2020-09-25 12:15:44'),
(24, 'Harry Jack', 'Harryjack@mailinator.com', '$2y$10$DEuTb9U.L/r2StYeyhSlk.BjKttGh1Hc2ehZhsoxtlNc50q65SWlK', '2147483647', NULL, NULL, NULL, 1, 2, '2020-09-27 13:39:06', '2020-09-27 13:39:06'),
(25, 'VARUN', 'VARUN@mailinator.com', '$2y$10$Gj4WsFnb5UMFoF69ycGaIOs1a.cOsVjUtbEfoozskhUm.UDDAF1nW', '08427428462', NULL, NULL, NULL, 1, 2, '2020-09-27 15:03:06', '2020-09-27 15:03:06');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `match_result_tbl`
--
ALTER TABLE `match_result_tbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sports_hall_booking_tbl`
--
ALTER TABLE `sports_hall_booking_tbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ticket_booking`
--
ALTER TABLE `ticket_booking`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
