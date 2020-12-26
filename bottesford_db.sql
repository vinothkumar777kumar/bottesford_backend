-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 03:25 PM
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
-- Table structure for table `bionewsfeed_tbl`
--

CREATE TABLE `bionewsfeed_tbl` (
  `id` int(20) NOT NULL,
  `team_id` int(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `bionewsfeed_image` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `publish_date` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `created_on` int(11) NOT NULL,
  `updated_on` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bionewsfeed_tbl`
--

INSERT INTO `bionewsfeed_tbl` (`id`, `team_id`, `title`, `bionewsfeed_image`, `description`, `publish_date`, `link`, `status`, `created_on`, `updated_on`) VALUES
(12, 3, 'Netherlands national football team', '779492-1200px-England_crest_2009.svg.png', 'The Netherlands men\'s national football team has represented the Netherlands in international football matches since 1905. The national team is controlled by the Royal Dutch Football Association, whic', '04-12-2020', '', 1, 0, 0),
(13, 1, 'Bottesford News feed', '743048-new_Logo-2.old.png', 'Bottesford Town Football Club is a football club based in Bottesford, Lincolnshire, England. They are currently members of the Northern Counties East League Premier Division and play at Birkdale Park ', '04-12-2020', '', 1, 0, 0);

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
(14, 'cheisea', '344069-download.png', 'fulham', '205254-fulham.png', 'Test Match', 'first', '03-12-2020', '11:00 AM', NULL, 5, 3, 0, 5, 1, '2020-11-12 11:58:31', '2020-11-12 11:58:31'),
(15, 'AVS..F.C', '784656-avs.png', 'BO.F.C', '620457-1200px-wales_national_football_team_logo.svg.png', 'TPL', 'First', '23-12-2020', '10:08 PM', '10:08 PM', 5, 3, 0, 10, 1, '2020-11-26 19:08:44', '2020-11-26 19:08:44'),
(16, 'Southampton F.C', '617683-southampton.png', 'leeds united F.C', '88628-leedsunit.png', 'R.P.S', 'first', '02-01-2021', '6:30 PM', '6:30 PM', 5, 3, 0, 10, 1, '2020-12-11 15:22:07', '2020-12-11 15:22:07');

-- --------------------------------------------------------

--
-- Table structure for table `membership_tbl`
--

CREATE TABLE `membership_tbl` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `member_pay_date` varchar(50) NOT NULL,
  `membership_amount` float NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membership_tbl`
--

INSERT INTO `membership_tbl` (`id`, `user_id`, `member_name`, `email`, `mobile`, `member_pay_date`, `membership_amount`, `created_on`, `updated_on`) VALUES
(1, 17, 'Bob', 'Bob@mailinator.com', '03587398577', '07-12-2020', 10, '2020-12-07 15:14:06', '2020-12-07 15:14:06'),
(2, 10, 'Jack ', 'Jack@mailinator.com', '09837583537', '07-12-2020', 10, '2020-12-07 17:19:44', '2020-12-07 17:19:44'),
(3, 9, 'George ', 'George@mailinator.com', '03856378563', '07-12-2020', 10, '2020-12-07 17:31:59', '2020-12-07 17:31:59'),
(4, 16, 'Hari', 'hari@mailinator.com', '03958738563', '07-12-2020', 10, '2020-12-07 19:58:46', '2020-12-07 19:58:46'),
(5, 19, 'Karan', 'Karan@mailinator.com', '03468736437', '08-12-2020', 10, '2020-12-08 10:20:45', '2020-12-08 10:20:45'),
(6, 19, 'Karan', 'Karan@mailinator.com', '03468736437', '08-12-2020', 10, '2020-12-08 10:45:46', '2020-12-08 10:45:46');

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
-- Table structure for table `paysub_tbl`
--

CREATE TABLE `paysub_tbl` (
  `id` int(10) NOT NULL,
  `child` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `pay_subs_date` varchar(50) NOT NULL,
  `subs_fees` float NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paysub_tbl`
--

INSERT INTO `paysub_tbl` (`id`, `child`, `user_id`, `pay_subs_date`, `subs_fees`, `created_on`, `updated_on`) VALUES
(1, 16, 16, '02-12-2020', 2.5, '2020-12-02 11:57:42', '2020-12-02 11:57:42'),
(2, 11, 16, '02-12-2020', 0, '2020-12-02 12:12:50', '2020-12-02 12:12:50'),
(3, 1, 9, '02-12-2020', 3.5, '2020-12-02 14:13:04', '2020-12-02 14:13:04'),
(4, 17, 17, '02-12-2020', 4.5, '2020-12-02 14:24:56', '2020-12-02 14:24:56'),
(5, 18, 17, '02-12-2020', 2.5, '2020-12-02 14:45:59', '2020-12-02 14:45:59'),
(6, 19, 18, '02-12-2020', 3.6, '2020-12-02 14:58:27', '2020-12-02 14:58:27');

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
  `guardian_name` varchar(100) DEFAULT NULL,
  `guardian_mobile` varchar(50) DEFAULT NULL,
  `guardian_email` varchar(150) DEFAULT NULL,
  `guardian_address` varchar(255) DEFAULT NULL,
  `subs_fees` float NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `team`, `player_image`, `description`, `player_name`, `position`, `squad_no`, `dateofbirth`, `signed_date`, `player_height`, `country`, `guardian_name`, `guardian_mobile`, `guardian_email`, `guardian_address`, `subs_fees`, `created_at`, `updated_at`) VALUES
(1, 1, '135686-1.png', 'test player description', 'Kalvin Phillips', 'Defending/Holding Midfielder', 1, '12-10-1995', '06-10-2020', 6.8, 'uk', 'George', '9389579389', 'George@mailinator.com', 'uk', 3.5, '2020-10-15 16:28:08', '2020-10-15 16:28:08'),
(2, 1, '911254-2.png', 'test player description', 'Eden Hazard', 'Right Midfielder/Winger', 2, '08-10-2008', '16-09-2020', 5.8, 'uk', 'Jack', '06737856387', 'Jack@mailinator.com', 'uk', 3, '2020-10-15 16:29:15', '2020-10-15 16:29:15'),
(3, 2, '148156-complete.png', 'test player description', 'Lionel Messi', 'Defending/Holding Midfielder', 4, '12-10-1994', '16-10-2019', 7.1, 'uk', '', '', '', '', 0, '2020-10-15 16:32:19', '2020-10-15 16:32:19'),
(4, 2, '96410-person_4.jpg', 'test player description', 'Francisco Trincão', 'Defending/Holding Midfielder', 7, '11-10-1990', '07-10-2014', 7.3, 'uk', 'George', '9389579389', 'George@mailinator.com', 'uk', 0, '2020-10-15 16:33:43', '2020-10-15 16:33:43'),
(7, 1, '923185-3.png', 'catin description', 'captaine', 'Right Midfielder/Winger', 8, '12-10-1994', '21-10-2020', 6.5, 'uk', 'jack', '03573875637', 'Jack@mailinator.com', 'uk', 2.8, '2020-10-21 13:30:03', '2020-10-21 13:30:03'),
(8, 1, '571255-4.png', 'glary description', 'Glary', 'Central/Box-to-Box Midfielder', 12, '12-10-1995', '03-09-2020', 6.5, 'uk', '', '', '', '', 0, '2020-10-21 14:00:40', '2020-10-21 14:00:40'),
(10, 3, '961249-about-1.jpg', 'Test player description', 'Calvin Stengs ', 'Right Fullback', 6, '10-11-1994', '12-11-2020', 6.5, 'uk', '', '', '', '', 0, '2020-11-12 22:33:34', '2020-11-12 22:33:34'),
(11, 1, '349350-5.png', 'player description', 'tom cruse', 'Defending/Holding Midfielder', 12, '11-12-2019', '01-12-2020', 6.8, 'uk', 'hari', '03573987539', 'hari@mailinator.com', 'uk', 5, '2020-12-01 18:52:59', '2020-12-01 18:52:59'),
(12, 1, '654231-7.png', 'player mark description', 'Peter Mark', 'Striker', 14, '05-12-1989', '01-12-2020', 7.3, 'uk', 'Peterpork', '03895738563', 'peterpork@mailinator.com', 'uk', 0, '2020-12-01 19:00:42', '2020-12-01 19:00:42'),
(13, 1, '241992-16B.png', 'martin jhon description', 'Martin john', 'Center Back', 15, '09-12-2008', '01-12-2020', 6.5, 'uk', 'Sopy top', '03856378563', 'Sopy@mailinator.com', 'uk', 0, '2020-12-01 19:40:10', '2020-12-01 19:40:10'),
(14, 1, '920502-7C.png', 'Hourn description', 'Hourn sasi', 'Center Back (or Sweeper, if used)', 14, '16-12-2008', '01-12-2020', 6.8, 'uk', 'Marval', '04654784564', 'Marval@mailinator.com', 'uk', 0, '2020-12-01 20:12:37', '2020-12-01 20:12:37'),
(15, 1, '215580-contact1.screen.PNG', 'josh player description', 'Josh', 'Left Fullback', 18, '16-12-2008', '02-12-2020', 6.5, 'uk', 'marval', '03578365783', 'Marval@mailinator.com', 'uk', 0, '2020-12-02 14:58:44', '2020-12-02 14:58:44'),
(16, 1, '218137-about1.header.PNG', 'player subs description', 'orio', 'Center Back', 12, '09-12-2008', '02-12-2020', 7.8, 'uk', 'hari', '03563875635', 'hari@mailinator.com', 'uk', 2.5, '2020-12-02 16:38:00', '2020-12-02 16:38:00'),
(17, 1, '104559-gamesrep1.header.PNG', 'james black description', 'James Black', 'Center Back', 10, '09-12-2009', '02-12-2020', 7.4, 'uk', 'Bob', '03785638756', 'Bob@mailinator.com', 'uk', 4.5, '2020-12-02 19:53:39', '2020-12-02 19:53:39'),
(18, 1, '996325-blog.png', 'jacky player description', 'jacky', 'Right Fullback', 15, '03-12-2013', '02-12-2020', 5.8, 'uk', 'Bob', '03758637856', 'Bob@mailinator.com', 'uk', 2.5, '2020-12-02 20:14:59', '2020-12-02 20:14:59'),
(19, 1, '633526-buyticket1.screen.PNG', 'robert john player description', 'Robert John', 'Center Back (or Sweeper, if used)', 14, '10-12-2008', '02-12-2020', 6.5, 'uk', 'Ruby', '03784638756', 'Ruby@mailinator.com', 'uk', 3.6, '2020-12-02 20:25:04', '2020-12-02 20:25:04'),
(20, 3, '227216-Eden_Hazard.jpg', 'horn martine description', 'Horn Martin', 'Defending/Holding Midfielder', 14, '06-12-1989', '03-12-2020', 6.5, 'uk', 'Peter jhon', '07385638756', 'Peterjhon@mailinator.com', 'uk', 3.6, '2020-12-03 19:45:42', '2020-12-03 19:45:42'),
(21, 14, '165433-dany.png', 'Daniel William John Ings is an English professional footballer who plays as a forward for Premier League club Southampton and the England national team. Ings started his career in the youth team of Southampton but was released as a schoolbo', 'danny', 'Center Back', 5, '07-12-1989', '03-11-2020', 6, 'uk', 'Gradi', '74854545454', 'Gradi@mailinator.com', 'uk', 2.5, '2020-12-11 13:52:54', '2020-12-11 13:52:54'),
(22, 14, '604424-theo.jpg', 'Theo James Walcott is an English professional footballer who plays as a forward for Southampton, on loan from fellow Premier League club Everton, and the English national team. Walcott is a product of the Southampton Academy and started his career wi', 'Theo', 'Right Midfielder/Winger', 7, '06-12-1990', '11-12-2020', 5.8, 'uk', 'Hendry', '76545454547', 'Hendry@mailinator.com', 'uk', 3.5, '2020-12-11 13:57:22', '2020-12-11 13:57:22'),
(23, 13, '710814-patrick.jpg', 'Patrick James Bamford is an English professional footballer who plays as a striker for Premier League club Leeds United. Although primarily a forward he can play in an attacking midfield role.', 'Patrick', 'Striker', 8, '08-12-2009', '11-12-2020', 5.8, 'uk', 'Greek', '73567835637', 'Greek@mailinator.com', 'uk', 5.8, '2020-12-11 14:05:02', '2020-12-11 14:05:02'),
(24, 13, '236695-rodrigo.jpg', 'Rodrigo Moreno Machado, known as Rodrigo, is a professional footballer who plays as a striker or winger for Premier League club Leeds United and the Spain national team. Rodrigo started his career with Real Madrid, appearing solely for its reserve te', 'Rodrigo', 'Center Back (or Sweeper, if used)', 11, '11-12-2018', '11-12-2020', 6.4, 'uk', 'Therif', '73635773535', 'Therif@mailinator.com', 'uk', 4.5, '2020-12-11 14:08:31', '2020-12-11 14:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `social_club_tbl`
--

CREATE TABLE `social_club_tbl` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `social_image` varchar(100) NOT NULL,
  `publish_date` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_club_tbl`
--

INSERT INTO `social_club_tbl` (`id`, `title`, `social_image`, `publish_date`, `mobile`, `email`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Bottesford players ', '603244-header1.jpg', '10-12-2020', '03576353535', 'info@bottesford.com', 'In 1986–87 they won the League Cup, a feat they repeated in 1988–89 and 1989–90.[1] The latter season also saw them win the league for the first time, and they went on to retain the title for the next two seasons.[4] They were runners-up in 1993–94', 1, '2020-12-04 11:19:30', '2020-12-04 11:19:30'),
(4, 'Bottesford f.c social club', '14676-header1.jpg', '04-12-2020', '04783647354', 'info@bottesford.com', 'In 1986–87 they won the League Cup, a feat they repeated in 1988–89 and 1989–90.[1] The latter season also saw them win the league for the first time, and they went on to retain the title for the next two seasons.[4] They were runners-up in 1993–94', 1, '2020-12-04 11:22:49', '2020-12-04 11:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `sportshall_uses_tbl`
--

CREATE TABLE `sportshall_uses_tbl` (
  `id` int(20) NOT NULL,
  `hall_uses` varchar(200) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sportshall_uses_tbl`
--

INSERT INTO `sportshall_uses_tbl` (`id`, `hall_uses`, `created_on`, `updated_on`) VALUES
(3, 'badminton', '2020-11-24 13:43:40', '2020-11-24 13:43:40'),
(4, 'basket ball', '2020-11-24 13:43:59', '2020-11-24 13:43:59'),
(5, 'football ', '2020-11-24 13:44:15', '2020-11-24 13:44:15'),
(6, 'Table tennis', '2020-11-28 11:05:24', '2020-11-28 11:05:24');

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
  `status` int(10) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sports_hall_booking_tbl`
--

INSERT INTO `sports_hall_booking_tbl` (`id`, `user_id`, `name`, `email`, `mobile`, `purpose`, `booking_date`, `start_time`, `end_time`, `location`, `status`, `created_at`, `updated_at`) VALUES
(2, 10, 'Jack ', '', '01234567890', 'sports event', '11-11-2020', '09:30 AM', '10:30 AM', '', 1, '2020-11-04 19:59:34', '2020-11-04 19:59:34'),
(3, 10, '', '', '', 'Public sports', '19-11-2020', '6:56 PM', '6:56 PM', '', 1, '2020-11-07 15:56:14', '2020-11-07 15:56:14'),
(7, 9, '', '', '', 'event', '25-11-2020', '11:17 AM', '12:18 AM', '', 0, '2020-11-07 20:15:02', '2020-11-07 20:15:02'),
(8, 10, '', '', '', 'title', '29-11-2020', '2:30 PM', '3:30 PM', '', 1, '2020-11-07 23:30:27', '2020-11-07 23:30:27'),
(9, 9, '', '', '', 'Sports event 1', '24-11-2020', '12:00 PM', '1:00 PM', '', 1, '2020-11-09 09:49:55', '2020-11-09 09:49:55'),
(10, 9, '', '', '', 'sports event', '28-11-2020', '11:29 AM', '12:29 PM', '', 1, '2020-11-09 22:23:28', '2020-11-09 22:23:28'),
(12, 12, '', '', '', 'sports event', '19-11-2020', '1:00 PM', '2:00 PM', '', 1, '2020-11-12 22:55:31', '2020-11-12 22:55:31'),
(13, 12, '', '', '', 'Test Event', '24-11-2020', '2:00 PM', '3:00 PM', '', 1, '2020-11-12 22:57:12', '2020-11-12 22:57:12'),
(14, 10, '', '', '', 'Sports Club', '21-11-2020', '5:00 PM', '6:00 PM', '', 1, '2020-11-19 13:03:53', '2020-11-19 13:03:53'),
(15, 10, '', '', '', 'Batmitten', '27-11-2020', '1:20 PM', '3:18 PM', '', 1, '2020-11-19 13:15:17', '2020-11-19 13:15:17'),
(16, 10, '', '', '', 'events', '28-11-2020', '5:21 PM', '7:22 PM', '', 1, '2020-11-19 13:18:25', '2020-11-19 13:18:25'),
(17, 10, '', '', '', 'hf', '26-11-2020', '1:20 PM', '1:19 PM', '', 1, '2020-11-19 13:19:52', '2020-11-19 13:19:52'),
(18, 10, '', '', '', 'ryrey', '25-11-2020', '1:25 PM', '1:26 PM', '', 1, '2020-11-19 13:21:39', '2020-11-19 13:21:39'),
(19, 10, '', '', '', 'gjgf', '02-12-2020', '1:25 PM', '1:26 PM', '', 1, '2020-11-19 13:22:44', '2020-11-19 13:22:44'),
(20, 10, '', '', '', 'fdhfdh', '28-11-2020', '1:25 PM', '1:28 PM', '', 1, '2020-11-19 13:23:58', '2020-11-19 13:23:58'),
(21, 10, '', '', '', 'cvncv', '26-11-2020', '4:24 PM', '3:29 PM', '', 1, '2020-11-19 13:25:11', '2020-11-19 13:25:11'),
(22, 10, '', '', '', 'Tennsis sports', '09-12-2020', '5:30 PM', '6:30 PM', '', 1, '2020-11-19 13:26:40', '2020-11-19 13:26:40'),
(23, 10, '', '', '', 'Coaching Club', '17-12-2020', '11:00 AM', '1:00 PM', '', 1, '2020-11-19 18:03:03', '2020-11-19 18:03:03'),
(24, 10, '', '', '', 'Test', '24-11-2020', '12:00 PM', '2:00 PM', '', 1, '2020-11-19 18:06:33', '2020-11-19 18:06:33'),
(25, 10, '', '', '', 'test abc1', '19-11-2020', '11:44 PM', '1:46 PM', '', 1, '2020-11-19 21:42:09', '2020-11-19 21:42:09'),
(26, 10, '', '', '', 'dxghf', '26-11-2020', '12:45 PM', '9:49 PM', '', 1, '2020-11-19 21:45:22', '2020-11-19 21:45:22'),
(27, 15, '', '', '', 'Badmidden Sports Club', '30-12-2020', '1:00 PM', '2:00 PM', '', 1, '2020-11-20 12:53:20', '2020-11-20 12:53:20'),
(28, 1, 'admin', '', '30973986535', 'test admin add', '26-11-2020', '2:40 PM', '4:40 PM', '', 0, '2020-11-21 12:40:20', '2020-11-21 12:40:20'),
(29, 10, 'Jack ', '', '94375438564', 'new jack event', '19-12-2020', '1:00 PM', '2:00 PM', '', 0, '2020-11-21 16:20:45', '2020-11-21 16:20:45'),
(30, 10, '', '', '', 'test loading', '03-12-2020', '3:00 PM', '4:00 PM', '', 1, '2020-11-21 19:25:03', '2020-11-21 19:25:03'),
(31, 15, '', '', '', 'Tennsis badmitan event', '05-01-2021', '10:00 AM', '12:00 AM', '', 1, '2020-11-21 19:30:53', '2020-11-21 19:30:53'),
(32, 15, '', '', '', 'basket ball', '24-11-2020', '2:00 PM', '3:00 PM', '', 1, '2020-11-23 13:43:15', '2020-11-23 13:43:15'),
(33, 15, '', '', '', 'Indoor football', '27-11-2020', '12:09pm', '1:09pm', '', 1, '2020-11-23 21:04:52', '2020-11-23 21:04:52'),
(34, 15, '', '', '', 'Indoor football', '25-11-2020', '12:15 pm', '1:15 pm', '', 1, '2020-11-23 22:15:30', '2020-11-23 22:15:30'),
(35, 15, '', '', '', 'badminton court', '26-11-2020', '1:34 pm', '2:34 pm', '', 1, '2020-11-23 22:35:05', '2020-11-23 22:35:05'),
(36, 15, '', '', '', 'basket ball', '26-11-2020', '1:40 pm', '2:40 pm', '', 1, '2020-11-23 22:40:19', '2020-11-23 22:40:19'),
(37, 15, '', '', '', 'basket ball', '29-11-2020', '1:41 pm', '2:41 pm', '', 1, '2020-11-23 22:41:36', '2020-11-23 22:41:36'),
(38, 15, '', '', '', 'basket ball', '25-11-2020', '12:43 pm', '1:43 pm', '', 1, '2020-11-23 22:44:18', '2020-11-23 22:44:18'),
(39, 15, '', '', '', 'basket ball', '23-12-2020', '12:22 pm', '1:22 pm', '', 1, '2020-11-24 10:22:39', '2020-11-24 10:22:39'),
(40, 15, '', '', '', 'badminton court', '03-12-2020', '1:30 pm', '2:30 pm', '', 1, '2020-11-24 10:27:20', '2020-11-24 10:27:20'),
(41, 15, '', '', '', 'badminton court', '04-12-2020', '1:50 pm', '2:50 pm', '', 1, '2020-11-24 10:46:59', '2020-11-24 10:46:59'),
(42, 15, '', '', '', 'badminton court', '28-11-2020', '1:50 pm', '2:50 pm', '', 1, '2020-11-24 10:49:47', '2020-11-24 10:49:47'),
(43, 15, '', '', '', 'Indoor football', '14-01-2021', '3:58 pm', '4:58 pm', '', 1, '2020-11-24 10:52:18', '2020-11-24 10:52:18'),
(44, 15, '', '', '', 'badminton court', '26-11-2020', '2:10 pm', '2:10 pm', '', 1, '2020-11-24 11:05:16', '2020-11-24 11:05:16'),
(45, 1, 'Raju', '', '09375398753', 'basket ball', '28-11-2020', '4:15 PM', '5:15 PM', '', 1, '2020-11-24 14:12:14', '2020-11-24 14:12:14'),
(46, 9, '', '', '', 'football ', '21-12-2020', '5:21 pm', '6:21 pm', '', 1, '2020-11-24 14:20:19', '2020-11-24 14:20:19'),
(47, 1, 'Rati', '', '90735739865', 'badminton', '29-11-2020', '7:33 PM', '9:36 PM', '', 1, '2020-11-24 14:32:58', '2020-11-24 14:32:58'),
(48, 15, 'VinodABC update', '', '03598365378', 'basket ball', '28-11-2020', '12:30 pm', '1:30 pm', '', 1, '2020-11-25 10:29:17', '2020-11-25 10:29:17'),
(49, 10, '', '', '', 'badminton', '06-12-2020', '3:30 pm', '4:30 pm', '', 1, '2020-11-27 10:24:42', '2020-11-27 10:24:42'),
(57, 9, '', '', '', 'badminton', '06-12-2020', '5:00 pm', '6:00 pm', '', 1, '2020-11-27 18:36:37', '2020-11-27 18:36:37'),
(58, 9, '', '', '', 'badminton', '06-12-2020', '6:15 pm', '7:15 pm', '', 1, '2020-11-27 19:14:04', '2020-11-27 19:14:04'),
(59, 9, '', '', '', 'badminton', '06-12-2020', '2:00 pm', '3:00 pm', '', 1, '2020-11-27 19:42:23', '2020-11-27 19:42:23'),
(60, 9, '', '', '', 'badminton', '06-12-2020', '7:53 pm', '8:53 pm', '', 1, '2020-11-27 19:53:19', '2020-11-27 19:53:19'),
(61, 9, '', '', '', 'badminton', '06-12-2020', '1:00 pm', '1:00 pm', '', 1, '2020-11-27 19:58:26', '2020-11-27 19:58:26'),
(62, 9, '', '', '', 'badminton', '27-11-2020', '11:40 pm', '12:40 am', '', 1, '2020-11-27 21:39:25', '2020-11-27 21:39:25'),
(63, 9, '', '', '', 'badminton', '27-11-2020', '10:40 pm', '11:40 pm', '', 1, '2020-11-27 21:40:42', '2020-11-27 21:40:42'),
(64, 9, '', '', '', 'basket ball', '04-12-2020', '2:53 pm', '3:53 pm', '', 1, '2020-11-27 21:48:05', '2020-11-27 21:48:05'),
(65, 9, '', '', '', 'basket ball', '04-12-2020', '4:00 pm', '5:00 pm', '', 1, '2020-11-27 21:50:46', '2020-11-27 21:50:46'),
(66, 9, '', '', '', 'football ', '25-12-2020', '1:25 pm', '2:25 pm', '', 1, '2020-11-27 22:26:14', '2020-11-27 22:26:14'),
(67, 9, '', '', '', 'basket ball', '25-12-2020', '3:30 pm', '4:30 pm', '', 1, '2020-11-27 22:28:07', '2020-11-27 22:28:07'),
(68, 9, '', '', '', 'badminton', '28-12-2020', '2:35 pm', '3:35 pm', '', 1, '2020-11-27 22:31:33', '2020-11-27 22:31:33'),
(69, 9, '', '', '', 'basket ball', '28-12-2020', '3:38 pm', '4:38 pm', '', 1, '2020-11-27 22:33:50', '2020-11-27 22:33:50'),
(70, 9, '', '', '', 'Table tennis', '30-11-2020', '1:00 pm', '2:00 pm', '', 1, '2020-11-28 12:28:47', '2020-11-28 12:28:47'),
(71, 9, '', '', '', 'basket ball', '30-11-2020', '3:00 pm', '4:00 pm', '', 1, '2020-11-28 12:40:42', '2020-11-28 12:40:42'),
(72, 10, '', '', '', 'football ', '30-11-2020', '4:10 pm', '5:10 pm', '', 1, '2020-11-28 12:57:01', '2020-11-28 12:57:01'),
(73, 16, '', '', '', 'football ', '04-12-2020', '7:00 pm', '8:00 pm', '', 1, '2020-12-02 19:49:06', '2020-12-02 19:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(20) NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `manager_image` varchar(100) DEFAULT NULL,
  `team_manager_name` varchar(50) NOT NULL,
  `team_manager_mobile` varchar(50) NOT NULL,
  `team_manager_email` varchar(150) NOT NULL,
  `status` int(10) NOT NULL,
  `role_type` int(50) NOT NULL DEFAULT 3,
  `country` varchar(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_name`, `manager_image`, `team_manager_name`, `team_manager_mobile`, `team_manager_email`, `status`, `role_type`, `country`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Bottesford Town F.C', '721489-eden_hazard.jpg', 'Jimmy McNeil', '01724 87168', 'Jimmy@mailinator.com', 1, 3, 'uk', 'Similar to the role of a team manager in football, a team manager in business needs to ensure members of her team work well together. Team managers engage employees in trust-building exercises and bonding activities so they can feel comfortable and safe ', '2020-10-15 16:25:36', '2020-10-15 16:25:36'),
(2, 'FC Barcelona', '667867-person_3.jpg', 'Ronald Koeman', '07835637856', 'Ronald@mailinator.com', 1, 3, 'uk', 'Similar to the role of a team manager in football, a team manager in business needs to ensure members of her team work well together. Team managers engage employees in trust-building exercises and bonding activities so they can feel comfortable and s', '2020-10-15 16:30:57', '2020-10-15 16:30:57'),
(3, 'Netherlands national football team', '355217-person_4.jpg', 'Virgil', '09759874957', 'Virgil@mailinator.com', 1, 3, 'uk', 'Similar to the role of a team manager in football, a team manager in business needs to ensure members of her team work well together. Team managers engage employees in trust-building exercises and bonding activities so they can feel comfortable and safe', '2020-11-12 22:27:35', '2020-11-12 22:27:35'),
(7, 'Womens team', '577276-download.jpg', 'JD Copier', '48957485645', 'jdcopier@mailinator.com', 1, 3, 'uk', 'Similar to the role of a team manager in football, a team manager in business needs to ensure members of her team work well together. Team managers engage employees in trust-building exercises and bonding activities so they can feel comfortable and safe ', '2020-12-09 14:07:56', '2020-12-09 14:07:56'),
(11, 'A.V.S Club', '993904-about.jpg', 'Ronald Androw', '07835637784', 'AvsRonald@mailinator.com', 1, 3, 'uk', 'test club description updated', '2020-12-09 19:33:55', '2020-12-09 19:33:55'),
(12, 'Ags', '645161-about.jpg', 'ronald', '07835667353', 'Ronaldjava@mailinator.com', 1, 3, 'uk', 'tes description', '2020-12-09 20:17:06', '2020-12-09 20:17:06'),
(13, 'Leeds United', '305588-leed_manager.jpg', 'Marcelo Bielsa', '47854856478', 'Marcelobielsa@mailinator.com', 1, 3, 'uk', 'Marcelo Bielsa, manager of Leeds United looks on prior to the Sky Bet Championship match between Barnsley and Leeds United at Oakwell Stadium on...', '2020-12-11 13:32:18', '2020-12-11 13:32:18'),
(14, 'Southampton', '306739-southapton_manager.jpg', 'Getty', '89353786587', 'Getty@mailinator.com', 1, 3, 'uk', 'Southampton Football Club (/saʊθˈ(h)æmptən/ (About this soundlisten)) is an English professional football club based in Southampton, Hampshire, which plays in the Premier League, the top tier of English football. One of the founding members', '2020-12-11 13:45:19', '2020-12-11 13:45:19');

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
  `ticket` varchar(20) NOT NULL,
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
(38, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', '431', NULL, 'under_16', 5, 3, 0, 0, '2020-10-30 00:14:30'),
(39, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', '807', NULL, 'adult', 5, 3, NULL, 0, '2020-10-30 00:14:30'),
(40, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', '131', NULL, 'Consecciond', NULL, 3, NULL, 0, '2020-10-30 00:14:30'),
(41, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', '906', NULL, 'Consecciond', NULL, 3, NULL, 0, '2020-10-30 00:17:46'),
(42, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', '973', NULL, 'adult', 5, NULL, NULL, 0, '2020-10-30 00:17:46'),
(43, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', '876', NULL, 'under_16', 5, 3, 0, 0, '2020-10-30 00:17:46'),
(44, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', '347', NULL, 'adult', 5, NULL, NULL, 9, '2020-10-30 00:19:43'),
(45, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', '606', NULL, 'Consecciond', NULL, 3, NULL, 9, '2020-10-30 00:19:43'),
(46, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', '222', NULL, 'under_16', 5, 3, 0, 9, '2020-10-30 00:19:43'),
(47, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', '641', NULL, 'adult', 5, NULL, NULL, 10, '2020-10-30 09:33:37'),
(48, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', '873', NULL, 'Consecciond', NULL, 3, NULL, 10, '2020-10-30 09:33:37'),
(49, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', '975', NULL, 'under_16', 5, 3, 0, 10, '2020-10-30 09:33:37'),
(50, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', '673', NULL, 'adult', 5, NULL, NULL, 10, '2020-10-30 09:41:05'),
(51, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', '583', NULL, 'adult', 5, NULL, NULL, 10, '2020-10-30 09:41:05'),
(52, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', '290', NULL, 'Consecciond', NULL, 3, NULL, 10, '2020-10-30 09:41:05'),
(53, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', '253', NULL, 'under_16', 5, 3, 0, 10, '2020-10-30 09:41:05'),
(54, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', '79', NULL, 'under_16', 5, 3, 0, 10, '2020-10-30 09:41:05'),
(55, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', '589', NULL, 'adult', 5, NULL, NULL, 10, '2020-10-30 09:58:24'),
(56, 9, 'EPL', 'Nov 3, 2020', 'team one', 'http://192.168.43.55/bottesford_backend/uploads/match/328666-bg_1.jpg', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/654903-gameschd1.jpg', '921', NULL, 'under_16', 5, 3, 0, 10, '2020-10-30 09:58:24'),
(57, 10, 'EPL', 'Nov 18, 2020', 'Team One', 'http://192.168.43.55/bottesford_backend/uploads/match/824759-download.png', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/471919-avs.png', '103', NULL, 'adult', 5, NULL, NULL, 9, '2020-11-10 00:26:31'),
(58, 10, 'EPL', 'Nov 18, 2020', 'Team One', 'http://192.168.43.55/bottesford_backend/uploads/match/824759-download.png', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/471919-avs.png', '142', NULL, 'adult', 5, NULL, NULL, 9, '2020-11-10 00:26:31'),
(59, 10, 'EPL', 'Nov 18, 2020', 'Team One', 'http://192.168.43.55/bottesford_backend/uploads/match/824759-download.png', 'team two', 'http://192.168.43.55/bottesford_backend/uploads/match/471919-avs.png', '230', NULL, 'Consecciond', NULL, 3, NULL, 9, '2020-11-10 00:26:31'),
(60, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', '105', NULL, 'Consecciond', NULL, 3, NULL, 9, '2020-11-10 18:03:34'),
(61, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', '311', NULL, 'under_16', NULL, NULL, 0, 9, '2020-11-10 18:03:34'),
(62, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', '121', NULL, 'adult', 5, NULL, NULL, 9, '2020-11-10 18:03:34'),
(63, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', '251', NULL, 'adult', 5, NULL, NULL, 9, '2020-11-10 20:43:22'),
(64, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', '88', NULL, 'Consecciond', NULL, 3, NULL, 9, '2020-11-10 20:43:22'),
(65, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', '398', NULL, 'under_16', NULL, NULL, 0, 9, '2020-11-10 20:43:22'),
(66, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', '546', NULL, 'Consecciond', NULL, 3, NULL, 9, '2020-11-10 20:43:22'),
(67, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', '180', NULL, 'under_16', NULL, NULL, 0, 9, '2020-11-10 20:43:22'),
(68, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', '225', NULL, 'Consecciond', NULL, 3, NULL, 9, '2020-11-10 20:43:22'),
(69, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', '968', NULL, 'adult', 5, NULL, NULL, 9, '2020-11-10 20:53:32'),
(70, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', '796', NULL, 'Consecciond', NULL, 3, NULL, 9, '2020-11-10 20:53:32'),
(71, 10, 'EPL', '18-11-2020', 'Team One', '824759-download.png', 'team two', '471919-avs.png', '416', NULL, 'under_16', NULL, NULL, 0, 9, '2020-11-10 20:53:32'),
(72, 0, '', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', '243', NULL, 'adult', 5, 3, 0, 0, '2020-11-11 00:24:49'),
(73, 0, '', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', '686', NULL, 'Consecciond', 5, 3, 0, 0, '2020-11-11 00:24:49'),
(74, 0, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', '25', NULL, 'adult', 5, 3, 0, 0, '2020-11-11 00:24:49'),
(75, 0, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', '1000', NULL, 'adult', 5, 3, 0, 0, '2020-11-11 00:27:14'),
(76, 0, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', '195', NULL, 'Consecciond', 5, 3, 0, 0, '2020-11-11 00:27:14'),
(77, 11, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', '487', NULL, 'adult', 5, 3, 0, 0, '2020-11-11 00:32:38'),
(78, 11, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', '273', NULL, 'Consecciond', 5, 3, 0, 0, '2020-11-11 00:32:38'),
(79, 11, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', '686', NULL, 'under_16', 5, 3, 0, 0, '2020-11-11 00:32:38'),
(80, 12, '', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', '499', NULL, 'Consecciond', 5, 3, 0, 0, '2020-11-11 00:35:40'),
(81, 12, '', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', '237', NULL, 'Consecciond', 5, 3, 0, 0, '2020-11-11 00:35:40'),
(82, 12, '', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', '559', NULL, 'adult', 5, 3, 0, 0, '2020-11-11 00:35:40'),
(83, 12, '', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', '984', NULL, 'under_16', 5, 3, 0, 0, '2020-11-11 00:35:40'),
(84, 11, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', '893', NULL, 'adult', 5, 3, 0, 10, '2020-11-11 00:50:34'),
(85, 11, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', '273', NULL, 'Consecciond', 5, 3, 0, 10, '2020-11-11 00:50:34'),
(86, 11, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', '98', NULL, 'under_16', 5, 3, 0, 10, '2020-11-11 00:50:34'),
(87, 11, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', '561', NULL, 'Consecciond', 5, 3, 0, 10, '2020-11-11 00:50:34'),
(88, 11, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', '266', NULL, 'under_16', 5, 3, 0, 10, '2020-11-11 00:50:34'),
(89, 11, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', '242', NULL, 'adult', 5, 3, 0, 10, '2020-11-11 00:50:34'),
(90, 11, '', '02-12-2020', 'RCB', '574416-about.jpg', 'CSK', '903304-bg_1.jpg', '98', NULL, 'Consecciond', 5, 3, 0, 10, '2020-11-11 00:50:34'),
(91, 12, 'FRiendly Match', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', '227', NULL, 'adult', 5, 3, 0, 10, '2020-11-12 10:57:18'),
(92, 12, 'FRiendly Match', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', '550', NULL, 'Consecciond', 5, 3, 0, 10, '2020-11-12 10:57:18'),
(93, 12, 'FRiendly Match', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', '312', NULL, 'Consecciond', 5, 3, 0, 10, '2020-11-12 10:57:18'),
(94, 12, 'FRiendly Match', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', '804', NULL, 'adult', 5, 3, 0, 10, '2020-11-12 10:57:18'),
(95, 12, 'FRiendly Match', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', '597', NULL, 'Consecciond', 5, 3, 0, 10, '2020-11-12 10:57:18'),
(96, 12, 'FRiendly Match', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', '576', NULL, 'Consecciond', 5, 3, 0, 10, '2020-11-12 10:57:18'),
(97, 12, 'FRiendly Match', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', '154', NULL, 'adult', 5, 3, 0, 10, '2020-11-12 10:57:18'),
(98, 14, 'Test Match', '03-12-2020', 'cheisea', '344069-download.png', 'fulham', '205254-fulham.png', '785', NULL, 'adult', 5, 3, 0, 10, '2020-11-12 18:55:39'),
(99, 14, 'Test Match', '03-12-2020', 'cheisea', '344069-download.png', 'fulham', '205254-fulham.png', '996', NULL, 'Consecciond', 5, 3, 0, 10, '2020-11-12 18:55:39'),
(100, 14, 'Test Match', '03-12-2020', 'cheisea', '344069-download.png', 'fulham', '205254-fulham.png', '12', NULL, 'under_16', 5, 3, 0, 10, '2020-11-12 18:55:39'),
(101, 14, 'Test Match', '03-12-2020', 'cheisea', '344069-download.png', 'fulham', '205254-fulham.png', '576', NULL, 'Consecciond', 5, 3, 0, 10, '2020-11-12 18:55:39'),
(102, 14, 'Test Match', '03-12-2020', 'cheisea', '344069-download.png', 'fulham', '205254-fulham.png', '298', NULL, 'adult', 5, 3, 0, 10, '2020-11-12 18:55:39'),
(103, 12, 'FRiendly Match', '03-12-2020', 'KXlP', '854997-gameschd1.jpg', 'SURH', '598601-gameschd2.jpg', '450', NULL, 'adult', 5, 3, 0, 15, '2020-11-25 10:27:23'),
(104, 15, 'TPL', '23-12-2020', 'AVS..F.C', '784656-avs.png', 'BO.F.C', '620457-1200px-wales_national_football_team_logo.svg.png', 'AVBO76', 5, 'adult', 5, 3, 0, 9, '2020-11-30 12:50:47'),
(105, 15, 'TPL', '23-12-2020', 'AVS..F.C', '784656-avs.png', 'BO.F.C', '620457-1200px-wales_national_football_team_logo.svg.png', 'AVBO59', 3, 'Consecciond', 5, 3, 0, 9, '2020-11-30 12:50:47'),
(106, 15, 'TPL', '23-12-2020', 'AVS..F.C', '784656-avs.png', 'BO.F.C', '620457-1200px-wales_national_football_team_logo.svg.png', 'AVBO63', 5, 'adult', 5, 3, 0, 19, '2020-12-08 10:23:55'),
(107, 15, 'TPL', '23-12-2020', 'AVS..F.C', '784656-avs.png', 'BO.F.C', '620457-1200px-wales_national_football_team_logo.svg.png', 'AVBO78', 3, 'Consecciond', 5, 3, 0, 19, '2020-12-08 10:23:55'),
(108, 15, 'TPL', '23-12-2020', 'AVS..F.C', '784656-avs.png', 'BO.F.C', '620457-1200px-wales_national_football_team_logo.svg.png', 'AVBO21', 5, 'adult', 5, 3, 0, 10, '2020-12-11 19:42:05'),
(109, 16, 'R.P.S', '02-01-2021', 'Southampton F.C', '617683-southampton.png', 'leeds united F.C', '88628-leedsunit.png', 'Sole33', 5, 'adult', 5, 3, 0, 10, '2020-12-11 19:42:05'),
(110, 16, 'R.P.S', '02-01-2021', 'Southampton F.C', '617683-southampton.png', 'leeds united F.C', '88628-leedsunit.png', 'Sole94', 3, 'Consecciond', 5, 3, 0, 10, '2020-12-11 19:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address_one` varchar(50) NOT NULL,
  `town` varchar(30) NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `role_type` int(10) DEFAULT NULL,
  `member_pay_date` varchar(50) NOT NULL,
  `membership_amount` float DEFAULT NULL,
  `membership_paid_status` int(11) DEFAULT NULL,
  `uniid` varchar(32) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `activation_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `address_one`, `town`, `postcode`, `status`, `role_type`, `member_pay_date`, `membership_amount`, `membership_paid_status`, `uniid`, `created_at`, `updated_at`, `activation_date`) VALUES
(1, 'George', 'George@mailinator.com', '$2y$10$feoeLCGFYFeNTuXjgq/qeOJHfF4/45Mu9KN1SWvOvVVl9oEaml6mW', '37856378567', '', '', '', 0, 3, '', NULL, NULL, '3485f69dd60b92f9855b45a74cc1f5d3', '2020-12-10 11:40:16', '2020-12-10 06:07:24', '2020-12-10 11:40:16'),
(2, 'Admin', 'Admin@bottesford.com', '$2y$10$YT3AvqOq2KejP6Tzjx3ru.YZ8hea1/Z/I15HU/El2TARJl970aTQW', '73856387563', '', '', '', 0, 1, '', NULL, NULL, 'f6c4f1d04d3a946e144eda6481788b99', '2020-12-10 11:45:27', '2020-12-10 11:45:27', '2020-12-10 11:45:27'),
(3, 'Jimmy', 'Jimmy@mailinator.com', '$2y$10$twiOdjBKpztZ8uur/xRgAu5Iz4oezNU.TRZyZkluqL4f7S6.jYOp.', '89375485984', '', '', '', 1, 2, '', NULL, NULL, '22af5af0cc596a76565995124ab19788', '2020-12-10 11:47:33', '2020-12-10 11:47:33', '2020-12-10 11:47:33'),
(4, 'Yalni', 'Yalni@mailinator.com', '$2y$10$5nsAViAMaTK.6cl/9JRfBOjLc9S/TvA2iNbmpKn1T0PLVg.yC.OpS', '38563785637', '', '', '', 0, 3, '', NULL, NULL, 'dc271c250076a4bf478149dc944a2e46', '2020-12-10 12:10:33', '2020-12-10 12:10:33', '2020-12-10 12:40:33'),
(5, 'charu', 'Charu@mailinator.com', '$2y$10$cU9PclAa/NIDBKKsp37Bd.Mi2LPsUITkJlzX6f2N7uvjA0PwDH.Fy', '67576456456', '', '', '', 1, 3, '', NULL, NULL, '2b8677096cd0eab3b8dc67c1def43c68', '2020-12-10 12:22:16', '2020-12-10 12:22:16', '2020-12-10 12:52:16'),
(6, 'Arun', 'Arun@mailinator.com', '$2y$10$plbUttteZTKaz67TDRTu/OSrifdb5hLlRXIPzJDgA4tbYcrxvRY/S', '38756454635', '', '', '', 0, 3, '', NULL, NULL, '7f69b40abdedc68198199ac5e3f33fc9', '2020-12-10 13:50:13', '2020-12-10 10:39:57', '2020-12-10 02:20:13'),
(7, 'Mari', 'Mari@mailinator.com', '$2y$10$emkEpNUTCoG0xrNmL1dmwuGzR2IGwiJLw2oVb14CzMVVjn2wIF/KO', '37856327856', '', '', '', 1, 3, '', NULL, NULL, '109a3330ec97a2520ad92538d92ecd8b', '2020-12-10 13:52:28', '2020-12-10 13:52:28', '2020-12-10 02:22:28'),
(8, 'Vijay', 'Vijay@mailinator.com', '$2y$10$wxS/Dz4HbaojNg1B5G.kVeIGWq3f/b1jz3tzt/NsEOXzmTTQfZgOa', '37856785635', '', '', '', 0, 3, '', NULL, NULL, '911a644bda8d7a857e0a0885cddf514e', '2020-12-10 14:10:40', '2020-12-10 14:10:40', '2020-12-10 02:40:40'),
(9, 'Prabu', 'Prabu@mailinator.com', '$2y$10$gYA6cvNlO0Chp45bDSLS.uEdwygVpNJ7MGjDue54cw3IHEgKzF1oe', '98578435656', '', '', '', 1, 3, '', NULL, NULL, '3f3770b4d0efccc422fb8208cda0139d', '2020-12-10 14:15:49', '2020-12-10 14:15:49', '2020-12-10 02:45:49'),
(10, 'surya', 'Surya@mailinator.com', '$2y$10$Aej3HJffjMQnct6IBSqLu.FgMA6O1ZNArwfF1TfsqFsXmok.cY/NO', '37567356378', '', '', '', 1, 3, '', NULL, NULL, 'f8d136fc7926fdaa9f1e06a3d3c53329', '2020-12-10 16:02:58', '2020-12-10 10:20:48', '2020-12-10 04:32:58'),
(11, 'Tendral', 'Tendral@mailinator.com', '$2y$10$5oCJs5ay3VXWHa2wwqpoM.nkNK5Xzz1wT7oFwtjXX.Lujt6TcTXje', '78564785643', '', '', '', 0, 3, '', NULL, NULL, '3ef3b4338d9190202e67b9710aa69fdf', '2020-12-10 21:26:53', '2020-12-10 21:26:53', '2020-12-10 09:56:53'),
(12, 'Marcelo Belsa', 'Marcelobielsa@mailinator.com', '$2y$10$g5nXMePU.8KgN4h0hUs3ce5Tiy55takJbvSK94qL2S4k1znxuspDO', '78356378563', '', '', '', 1, 2, '', NULL, NULL, '6b4e9f8dfbaa299edd7ed0be5facb92a', '2020-12-11 15:28:35', '2020-12-11 15:28:35', '2020-12-11 03:58:35'),
(13, 'JD Copier', 'jdcopier@mailinator.com', '$2y$10$20RaHfO8KIkw5ThbcGUNq.TAabynExT75hiO5fEtrg2F/sj9zCCf.', '73653765735', '', '', '', 1, 2, '', NULL, NULL, '76774a8511e4652f019d5a5827588687', '2020-12-11 15:54:13', '2020-12-11 15:54:13', '2020-12-11 04:24:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bionewsfeed_tbl`
--
ALTER TABLE `bionewsfeed_tbl`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `membership_tbl`
--
ALTER TABLE `membership_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paysub_tbl`
--
ALTER TABLE `paysub_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_club_tbl`
--
ALTER TABLE `social_club_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sportshall_uses_tbl`
--
ALTER TABLE `sportshall_uses_tbl`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bionewsfeed_tbl`
--
ALTER TABLE `bionewsfeed_tbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `membership_tbl`
--
ALTER TABLE `membership_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paysub_tbl`
--
ALTER TABLE `paysub_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `social_club_tbl`
--
ALTER TABLE `social_club_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sportshall_uses_tbl`
--
ALTER TABLE `sportshall_uses_tbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sports_hall_booking_tbl`
--
ALTER TABLE `sports_hall_booking_tbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ticket_booking`
--
ALTER TABLE `ticket_booking`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
