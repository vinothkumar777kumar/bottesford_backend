-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2020 at 12:23 PM
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
(2, '908739-copy_fc_logo.png', 'update blog title', '08-10-2020', 'update description', 0, '2020-10-10 12:12:27', '2020-10-10 12:12:27'),
(4, '161209-gameschd2.jpg', 'Blog Title', '14-10-2020', 'test blog description', 1, '2020-10-10 15:22:54', '2020-10-10 15:22:54');

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
(1, 'Bottesford Town F.C', '137859-BottesfordTown_logo.png', 'FC Barcelona', '409361-complete.png', 'World Cup', 'first', '10-10-2020', '2020-10-09 16:50:26', '2020-10-09 16:50:26'),
(2, 'FC Barcelona', '924152-complete.png', 'Bottesford Town F.C', '964744-BottesfordTown_logo.png', 'world cup', 'semi final', '11-10-2020', '2020-10-09 16:52:42', '2020-10-09 16:52:42'),
(3, 'Bottesford Town F.C', '600635-BottesfordTown_logo.png', 'FC Barcelona', '825546-login_img.jpg', 'Friendly match', 'first', '14-10-2020', '2020-10-10 15:21:46', '2020-10-10 15:21:46');

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
(1, 1, '940294-person_1.jpg', 'test player description', ' DAVID EASTERS', 'Left Fullback', 6, '11-10-1990', '09-09-2020', 6.7, 'uk', '2020-10-09 11:15:03', '2020-10-09 11:15:03'),
(2, 2, '498424-person_2.jpg', 'player description', 'Rock', 'Defending/Holding Midfielder', 14, '06-10-1992', '07-09-2020', 6.2, 'uk', '2020-10-09 12:50:49', '2020-10-09 12:50:49'),
(3, 1, '568183-gameschd1.jpg', 'bottesford fc player', 'Antoine Griezmann', 'Right Midfielder/Winger', 5, '12-10-1989', '28-09-2020', 5.8, 'uk', '2020-10-09 13:28:52', '2020-10-09 13:28:52'),
(4, 1, '39627-image_5.jpg', 'player description', 'Francisco Trincão', 'Right Midfielder/Winger', 9, '03-10-1989', '09-09-2020', 6.4, 'uk', '2020-10-09 13:30:32', '2020-10-09 13:30:32'),
(5, 1, '834992-person_4.jpg', 'test player description', 'Ronald Araújo', 'Attacking Midfielder/Playmaker', 12, '12-10-1994', '08-09-2020', 4.9, 'uk', '2020-10-09 13:32:01', '2020-10-09 13:32:01'),
(6, 1, '323404-player2.jpg', 'test description', 'Ansu Fati', 'Central/Box-to-Box Midfielder', 14, '21-10-1989', '09-09-2020', 6.8, 'uk', '2020-10-09 13:33:05', '2020-10-09 13:33:05'),
(7, 3, '382071-image_2.jpg', 'test team player description', 'Nik Scalzo', 'Left Fullback', 5, '16-09-1994', '10-10-2020', 5.7, 'uk', '2020-10-10 15:19:18', '2020-10-10 15:19:18');

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
(2, 'FC Barcelona', 'Rock', '08375389659', 'Rock@mailinator.com', 1, 3, '2020-10-09 12:47:39', '2020-10-09 12:47:39'),
(3, 'Bottesford Town F.C', 'Jimmy McNeil', '08573563756', 'Jimmy@mailinator.com', 1, 3, '2020-10-10 15:15:50', '2020-10-10 15:15:50');

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
(1, 3, 'Friendly match', 'Oct 14, 2020', 'Bottesford Town F.C', 'http://192.168.43.55/bottesford_backend/uploads/match/600635-BottesfordTown_logo.png', 'FC Barcelona', 'http://192.168.43.55/bottesford_backend/uploads/match/825546-login_img.jpg', 559, 2.7, 5, '2020-10-10 15:25:30');

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
(2, 'Rock', 'Rock@mailinator.com', '$2y$10$diJJcaU1VfDrcPMlJ90uHeoUhMQT/KDPt/6sOLQ70YQJtNWh/MrT2', '09388378397', NULL, NULL, NULL, 1, 2, '2020-10-08 23:21:15', '2020-10-08 23:21:15'),
(3, 'Juan Ferrando', 'Juanferrando@mailinator.com', '$2y$10$ZyqPtYC5GM7gfChKQ5UTZu.WerUErDQYpm.XTVfDmk20iSSgsD5MO', '94674986706', NULL, NULL, NULL, 1, 2, '2020-10-09 13:02:51', '2020-10-09 13:02:51'),
(4, 'Harry ', 'Harry@mailinator.com', '$2y$10$tqNoOz1vynwStcBBFyYuduJJq31NX1MXoaPHfahSnAp796KzgcK4W', '08395738563', NULL, NULL, NULL, 1, 3, '2020-10-09 16:47:02', '2020-10-09 16:47:02'),
(5, 'Terry Wilson Jr.', 'Tery@mailinator.com', '$2y$10$38rxOL2NGXkTrw6T2wldIucCa121G6ACa/JvO994wIUGQ4W5LwLA2', '08539759385', NULL, NULL, NULL, 1, 3, '2020-10-10 15:24:43', '2020-10-10 15:24:43'),
(6, 'Jimmy McNeil', 'Jimmy@mailinator.com', '$2y$10$MGlUU1BSSyK2dJD0VcvJdutS4IKJ6ZzATK05oRyTFfWshIGrIsXSq', '08476846748', NULL, NULL, NULL, 1, 2, '2020-10-10 15:31:17', '2020-10-10 15:31:17');

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `match_result_tbl`
--
ALTER TABLE `match_result_tbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `match_tbl`
--
ALTER TABLE `match_tbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sports_hall_booking_tbl`
--
ALTER TABLE `sports_hall_booking_tbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket_booking`
--
ALTER TABLE `ticket_booking`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
