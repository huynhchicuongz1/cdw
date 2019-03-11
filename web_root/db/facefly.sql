-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 06, 2019 at 09:14 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facefly`
--

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE IF NOT EXISTS `airlines` (
  `airline_id` int(11) NOT NULL,
  `airline_name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `airline_code` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`airline_id`, `airline_name`, `airline_code`) VALUES
(1, 'Chanchangi Airlines	', 'NCH'),
(2, 'China United Airlines	', 'CUA'),
(3, 'Emirates Airline	', 'UAE'),
(4, 'Vietnam Airlines', 'HVN');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_code` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_airport` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `city_code`, `city_airport`) VALUES
(1, 'Hồ Chí Minh ', 'SGN', 'Tân Sơn Nhất'),
(2, 'Hà Nội', 'HNN', 'Nội Bài'),
(3, 'Bắc Kinh', 'PEK', 'Sân bay quốc tế Thủ đô Bắc Kinh'),
(4, 'Quảng Châu', 'CAN', '	Sân bay quốc tế Bạch Vân Quảng Châu'),
(5, 'Jakarta', 'CGK', '	Sân bay quốc tế Soekarno-Hatta'),
(6, 'Los Angeles', 'LAX', 'Sân bay quốc tế Los Angeles'),
(7, 'Fresno, California', 'FAT', 'Sân bay quốc tế Fresno Yosemite');

-- --------------------------------------------------------

--
-- Table structure for table `flight_booking`
--

CREATE TABLE IF NOT EXISTS `flight_booking` (
  `fb_id` int(11) NOT NULL,
  `fb_city_id_from` int(11) NOT NULL,
  `fb_city_id_to` int(11) NOT NULL,
  `fb_departure_date` int(11) NOT NULL,
  `fb_type` tinyint(4) NOT NULL,
  `fb_return_date` int(11) NOT NULL,
  `fb_user_id` int(11) NOT NULL,
  `fb_fl_id` int(11) NOT NULL,
  `fb_transfer` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_paypal` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_credit_card` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_credit_name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_ccv_code` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_total_cost` float NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flight_booking`
--

INSERT INTO `flight_booking` (`fb_id`, `fb_city_id_from`, `fb_city_id_to`, `fb_departure_date`, `fb_type`, `fb_return_date`, `fb_user_id`, `fb_fl_id`, `fb_transfer`, `fb_paypal`, `fb_credit_card`, `fb_credit_name`, `fb_ccv_code`, `fb_total_cost`) VALUES
(1, 1, 2, 0, 1, 0, 3, 2, '', 'transfer', '12321321', 'sadsasa', '123', 400);

-- --------------------------------------------------------

--
-- Table structure for table `flight_class`
--

CREATE TABLE IF NOT EXISTS `flight_class` (
  `fc_id` int(11) NOT NULL,
  `fc_name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flight_class`
--

INSERT INTO `flight_class` (`fc_id`, `fc_name`) VALUES
(1, 'Economy Flex'),
(2, 'Economy Standard'),
(3, 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `flight_list`
--

CREATE TABLE IF NOT EXISTS `flight_list` (
  `fl_id` int(11) NOT NULL,
  `fl_airline_id` int(11) NOT NULL,
  `fl_departure_date` int(11) NOT NULL,
  `fl_landing_date` int(11) NOT NULL,
  `fl_city_id_from` int(11) NOT NULL,
  `fl_city_id_to` int(11) NOT NULL,
  `fl_id_parent` int(11) NOT NULL,
  `fl_cost` float NOT NULL,
  `fl_fc_id` int(11) NOT NULL,
  `fl_seat` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flight_list`
--

INSERT INTO `flight_list` (`fl_id`, `fl_airline_id`, `fl_departure_date`, `fl_landing_date`, `fl_city_id_from`, `fl_city_id_to`, `fl_id_parent`, `fl_cost`, `fl_fc_id`, `fl_seat`) VALUES
(1, 1, 0, 0, 1, 3, 0, 150, 1, 15),
(2, 1, 0, 0, 1, 2, 0, 200000, 1, 20),
(3, 2, 0, 0, 2, 2, 0, 300, 1, 20),
(4, 1, 0, 0, 1, 2, 0, 400, 1, 20),
(5, 3, 0, 0, 2, 3, 0, 600, 3, 20),
(6, 3, 0, 0, 3, 2, 0, 700, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE IF NOT EXISTS `passengers` (
  `passenger_id` int(11) NOT NULL,
  `passenger_title` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passenger_first_name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passenger_last_name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passenger_user_id` int(11) NOT NULL,
  `passenger_fl_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`passenger_id`, `passenger_title`, `passenger_first_name`, `passenger_last_name`, `passenger_user_id`, `passenger_fl_id`) VALUES
(1, 'mr', 'sad', 'sad sa', 3, 2),
(2, 'mr', 'sad á', 'sa dsa', 3, 2),
(3, 'mr', 'sad', 'sad sa', 3, 2),
(4, 'mr', 'sad á', 'sa dsa', 3, 2),
(5, 'mr', 'sad', 'sad sa', 3, 2),
(6, 'mr', 'sad á', 'sa dsa', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_access` timestamp NULL DEFAULT NULL,
  `attempt` int(11) DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `last_access`, `attempt`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'cuong', 'cuong@gmail.com', '21321321', '$2y$10$S2IStq5cQcdGIzAB/R5P8uilkCoUcXGRnHANUQ7F808/V0eEc1gwC', NULL, 0, 1, 'v2zlqiuxeFB6tg5zSFMGFJzLgoTq5L0VtHmZmMGV5ZU0XscUNUby2UtJ47p6', '2019-03-06 13:14:36', '2019-03-06 13:14:36'),
(2, 'cuong', 'huynhchicuongz1@gmail.com', '213213213', '$2y$10$JNI0/fGIu6/7wCgQX6AciOyr5lx5BRMo64Un3oURhvb3v72IrgzES', '2019-03-05 20:00:05', 0, 1, 'Iz2MsN5vIO6SHNRdJnhp6df7iaZaGSGPMVkFBO395dUJo131FzAhxcqSk4TO', '2019-03-05 19:44:20', '2019-03-06 07:35:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`airline_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `flight_booking`
--
ALTER TABLE `flight_booking`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `flight_class`
--
ALTER TABLE `flight_class`
  ADD PRIMARY KEY (`fc_id`);

--
-- Indexes for table `flight_list`
--
ALTER TABLE `flight_list`
  ADD PRIMARY KEY (`fl_id`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`passenger_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airlines`
--
ALTER TABLE `airlines`
  MODIFY `airline_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `flight_booking`
--
ALTER TABLE `flight_booking`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `flight_class`
--
ALTER TABLE `flight_class`
  MODIFY `fc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `flight_list`
--
ALTER TABLE `flight_list`
  MODIFY `fl_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `passenger_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
