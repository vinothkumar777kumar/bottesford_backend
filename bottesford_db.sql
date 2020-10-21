-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2020 at 07:13 AM
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
(1, '763707-gamesch4.jpg', 'Test Blog Title', '15-10-2020', 'test blog description', 1, '2020-10-15 16:48:41', '2020-10-15 16:48:41');

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
(2, 'Bottesford Town F.C', '863201-fc_logo.png', 'FC Barcelona', '487945-complete.png', 'scondary match result', 3, 3, '15-10-2020', 'https://www.youtube.com/watch?v=L4aBqvbP_MM', '2020-10-15 19:28:53', '2020-10-15 19:28:53');

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
  `start_time` varchar(20) NOT NULL,
  `end_time` varchar(20) NOT NULL,
  `ticket_price` double DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `match_tbl`
--

INSERT INTO `match_tbl` (`id`, `team_one`, `team_one_image`, `team_two`, `team_two_image`, `match_name`, `round`, `match_date`, `start_time`, `end_time`, `ticket_price`, `created_at`, `updated_at`) VALUES
(1, 'Bottesford Town F.C', '218000-BottesfordTown_logo.png', 'FC Barcelona', '124460-complete.png', 'Test Match', 'first', '16-10-2020', '4:41 PM', '10:47 PM', 2.7, '2020-10-15 16:47:03', '2020-10-15 16:47:03'),
(2, 'FC Barcelona', '857550-complete.png', 'Bottesford Town F.C', '891018-BottesfordTown_logo.png', 'second match', 'second', '15-10-2020', '7:04 PM', '9:04 PM', 1.27, '2020-10-15 17:04:59', '2020-10-15 17:04:59'),
(3, 'Bottesford Town F.C', '195643-BottesfordTown_logo.png', 'FC Barcelona', '417443-complete.png', 'Tornament', 'first', '17-10-2020', '6:19 PM', '11:19 PM', 1.32, '2020-10-15 18:19:30', '2020-10-15 18:19:30'),
(4, 'FC Barcelona', '133577-complete.png', 'Bottesford Town F.C', '733942-BottesfordTown_logo.png', 'tornament second match', 'second', '19-10-2020', '7:24 PM', '12:24 PM', 2.17, '2020-10-15 18:24:18', '2020-10-15 18:24:18');

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
(4, 2, '96410-person_4.jpg', 'test player description', 'Francisco Trincão', 'Defending/Holding Midfielder', 7, '11-10-1990', '07-10-2014', 7.3, 'uk', '2020-10-15 16:33:43', '2020-10-15 16:33:43');

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
(2, 'FC Barcelona', 'Ronald Koeman', '07835637856', 'Ronald@mailinator.com', 1, 3, '2020-10-15 16:30:57', '2020-10-15 16:30:57');

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
(1, 1, 'Test Match', 'Oct 16, 2020', 'Bottesford Town F.C', 'http://192.168.43.55/bottesford_backend/uploads/match/218000-BottesfordTown_logo.png', 'FC Barcelona', 'http://192.168.43.55/bottesford_backend/uploads/match/124460-complete.png', 218, 2.7, 9, '2020-10-15 16:55:20'),
(2, 2, 'second match', 'Oct 15, 2020', 'FC Barcelona', 'http://192.168.43.55/bottesford_backend/uploads/match/857550-complete.png', 'Bottesford Town F.C', 'http://192.168.43.55/bottesford_backend/uploads/match/891018-BottesfordTown_logo.png', 247, 1.27, 9, '2020-10-15 17:09:56'),
(3, 2, 'second match', 'Oct 15, 2020', 'FC Barcelona', 'http://192.168.43.55/bottesford_backend/uploads/match/857550-complete.png', 'Bottesford Town F.C', 'http://192.168.43.55/bottesford_backend/uploads/match/891018-BottesfordTown_logo.png', 217, 1.27, 10, '2020-10-15 17:23:57'),
(4, 1, '', 'Oct 16, 2020', 'Bottesford Town F.C', '', 'FC Barcelona', '', 151, 2.7, 0, '2020-10-16 21:17:43'),
(5, 3, 'Tornament', 'Oct 17, 2020', 'Bottesford Town F.C', 'http://192.168.43.55/bottesford_backend/uploads/match/195643-BottesfordTown_logo.png', 'FC Barcelona', 'http://192.168.43.55/bottesford_backend/uploads/match/417443-complete.png', 626, 1.32, 10, '2020-10-16 21:22:08'),
(6, 4, 'tornament second match', 'Oct 19, 2020', 'FC Barcelona', 'http://192.168.43.55/bottesford_backend/uploads/match/133577-complete.png', 'Bottesford Town F.C', 'http://192.168.43.55/bottesford_backend/uploads/match/733942-BottesfordTown_logo.png', 115, 2.17, 10, '2020-10-16 21:22:08'),
(7, 1, 'Test Match', 'Oct 16, 2020', 'Bottesford Town F.C', 'http://192.168.43.55/bottesford_backend/uploads/match/218000-BottesfordTown_logo.png', 'FC Barcelona', 'http://192.168.43.55/bottesford_backend/uploads/match/124460-complete.png', 521, 2.7, 10, '2020-10-16 21:31:02'),
(8, 4, 'tornament second match', 'Oct 19, 2020', 'FC Barcelona', 'http://192.168.43.55/bottesford_backend/uploads/match/133577-complete.png', 'Bottesford Town F.C', 'http://192.168.43.55/bottesford_backend/uploads/match/733942-BottesfordTown_logo.png', 64, 2.17, 10, '2020-10-16 21:31:02'),
(9, 4, 'tornament second match', 'Oct 19, 2020', 'FC Barcelona', 'http://192.168.43.55/bottesford_backend/uploads/match/133577-complete.png', 'Bottesford Town F.C', 'http://192.168.43.55/bottesford_backend/uploads/match/733942-BottesfordTown_logo.png', 814, 2.17, 9, '2020-10-17 11:03:17'),
(15, 4, 'tornament second match', 'Oct 19, 2020', 'FC Barcelona', 'http://192.168.43.55/bottesford_backend/uploads/match/133577-complete.png', 'Bottesford Town F.C', 'http://192.168.43.55/bottesford_backend/uploads/match/733942-BottesfordTown_logo.png', 351, 2.17, 9, '2020-10-17 12:35:58'),
(17, 4, 'tornament second match', 'Oct 19, 2020', 'FC Barcelona', 'http://192.168.43.55/bottesford_backend/uploads/match/133577-complete.png', 'Bottesford Town F.C', 'http://192.168.43.55/bottesford_backend/uploads/match/733942-BottesfordTown_logo.png', 525, 2.17, 10, '2020-10-17 13:23:24'),
(18, 4, 'tornament second match', 'Oct 19, 2020', 'FC Barcelona', 'http://192.168.43.55/bottesford_backend/uploads/match/133577-complete.png', 'Bottesford Town F.C', 'http://192.168.43.55/bottesford_backend/uploads/match/733942-BottesfordTown_logo.png', 506, 2.17, 10, '2020-10-17 14:08:37'),
(19, 3, 'Tornament', 'Oct 17, 2020', 'Bottesford Town F.C', 'http://192.168.43.55/bottesford_backend/uploads/match/195643-BottesfordTown_logo.png', 'FC Barcelona', 'http://192.168.43.55/bottesford_backend/uploads/match/417443-complete.png', 423, 1.32, 10, '2020-10-17 14:08:37'),
(20, 3, 'Tornament', 'Oct 17, 2020', 'Bottesford Town F.C', 'http://192.168.43.55/bottesford_backend/uploads/match/195643-BottesfordTown_logo.png', 'FC Barcelona', 'http://192.168.43.55/bottesford_backend/uploads/match/417443-complete.png', 72, 1.32, 10, '2020-10-17 14:25:19'),
(21, 4, 'tornament second match', 'Oct 19, 2020', 'FC Barcelona', 'http://192.168.43.55/bottesford_backend/uploads/match/133577-complete.png', 'Bottesford Town F.C', 'http://192.168.43.55/bottesford_backend/uploads/match/733942-BottesfordTown_logo.png', 459, 2.17, 10, '2020-10-19 10:41:24'),
(22, 4, 'tornament second match', 'Oct 19, 2020', 'FC Barcelona', 'http://192.168.43.55/bottesford_backend/uploads/match/133577-complete.png', 'Bottesford Town F.C', 'http://192.168.43.55/bottesford_backend/uploads/match/733942-BottesfordTown_logo.png', 20, 2.17, 10, '2020-10-19 10:41:24');

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
(1, 'Admin', 'Admin@bottesford.com', '$2y$10$JAkp0JvuEp49N7Y7FmyT7OvPSoRDViLPJdzOLrXQdZ.Oild38p5zq', '07835678345', NULL, NULL, NULL, 1, 1, '2020-10-08 23:02:50', '2020-10-08 23:02:50'),
(9, 'George ', 'George@mailinator.com', '$2y$10$XDkA.NPFNleZseIxe3ohNu1ht2hhsqt8cb8fu5ad5cPDuRxad0ePe', '03856378563', NULL, NULL, NULL, 1, 3, '2020-10-15 16:54:50', '2020-10-15 16:54:50'),
(10, 'Jack ', 'Jack@mailinator.com', '$2y$10$vF7Yd03m1KjgPCE63CQlKO9ykdYzhz/moXlr/4DkwdCXFhiE4Y2Hq', '09837583537', NULL, NULL, NULL, 1, 3, '2020-10-15 17:23:33', '2020-10-15 17:23:33');

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `match_result_tbl`
--
ALTER TABLE `match_result_tbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `match_tbl`
--
ALTER TABLE `match_tbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sports_hall_booking_tbl`
--
ALTER TABLE `sports_hall_booking_tbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket_booking`
--
ALTER TABLE `ticket_booking`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
