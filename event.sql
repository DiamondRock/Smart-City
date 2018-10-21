-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2018 at 05:15 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart city`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` bigint(20) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `image` mediumtext,
  `type` varchar(20) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `phoneNo` int(11) DEFAULT NULL,
  `reportDateTime` datetime NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'pending',
  `important` tinyint(1) NOT NULL DEFAULT '0',
  `urgent` tinyint(1) NOT NULL DEFAULT '0',
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `latitude`, `longitude`, `image`, `type`, `name`, `phoneNo`, `reportDateTime`, `status`, `important`, `urgent`, `description`) VALUES
(46, 2.2, 2.8, NULL, 'type1', NULL, NULL, '2018-10-21 06:17:24', 'closed', 0, 0, NULL),
(47, 2.4, 2.5, NULL, 'type3', NULL, NULL, '2018-10-21 06:18:24', 'inProgress', 0, 0, NULL),
(48, 2.2, 2.3, NULL, 'type2', NULL, NULL, '2018-10-21 06:19:24', 'pending', 0, 0, NULL),
(49, 2.2, 2.3, NULL, 'type2', NULL, NULL, '2018-10-21 06:22:08', 'pending', 0, 0, NULL),
(50, 2.2, 2.3, NULL, 'type2', NULL, NULL, '2018-10-21 06:22:23', 'pending', 0, 0, NULL),
(51, 2.2, 2.3, NULL, 'type2', NULL, NULL, '2018-10-21 06:24:40', 'pending', 0, 0, NULL),
(52, 2.2, 2.3, NULL, 'type2', NULL, NULL, '2018-10-21 06:25:10', 'pending', 0, 0, NULL),
(53, 2.2, 2.3, NULL, 'type2', NULL, NULL, '2018-10-21 06:25:20', 'pending', 0, 0, NULL),
(54, 2.2, 2.3, NULL, 'type2', NULL, NULL, '2018-10-21 06:25:37', 'pending', 0, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`) USING HASH,
  ADD KEY `statusIndex` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
