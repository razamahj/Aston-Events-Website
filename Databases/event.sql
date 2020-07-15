-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2017 at 10:00 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursework`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'NOT NULL',
  `category` enum('sport','culture','other') NOT NULL,
  `event_name` varchar(15) NOT NULL,
  `event_time` time NOT NULL,
  `event_date` date DEFAULT NULL,
  `event_description` text NOT NULL,
  `event_place` varchar(25) NOT NULL,
  `event_pic` blob,
  `event_ranking` enum('1','2','3','4','5') NOT NULL,
  `organiser_id` int(10) NOT NULL COMMENT 'NOT NULL'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `category`, `event_name`, `event_time`, `event_date`, `event_description`, `event_place`, `event_pic`, `event_ranking`, `organiser_id`) VALUES
(1, 'sport', 'Footy', '09:00:00', '2017-08-12', 'lets play footy together', 'Park', '', '3', 1),
(2, 'culture', 'prayer', '09:00:00', '2017-06-12', 'lets pray together', 'Masjid', '', '3', 0),
(3, 'culture', 'Wedding', '09:00:00', '2017-08-09', 'mehdni', 'rajmal', '', '3', 0),
(4, 'culture', 'tradiotion', '09:00:00', '2017-06-09', 'lets go masjid', 'egypt', '', '3', 1),
(5, 'sport', 'sportsS', '20:00:00', '2017-06-09', 'lets play footy next week', 'park', '', '4', 1),
(6, 'culture', 'prayer', '09:00:00', '2017-03-09', 'Fajr', 'masjid', '', '4', 1),
(7, 'sport', 'cricket', '09:00:00', '2017-04-09', 'lets play cricket', 'ASTRO', '', '3', 1),
(8, 'culture', 'traditions', '20:00:00', '2017-07-09', 'lets go pray', 'masjid', '', '4', 1),
(9, 'sport', 'Bowling', '09:30:00', '2017-07-03', 'lets go bowling', 'AG Bowl', '', '3', 1),
(10, 'other', 'Wedding', '09:00:00', '2017-09-12', 'lets go to the wedding', 'digbeth', '', '1', 1),
(11, 'other', 'Wedding ', '09:00:00', '2017-02-09', 'lets go to the wedding ', 'digbeth', '', '1', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'NOT NULL', AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
