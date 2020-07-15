-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2017 at 11:17 PM
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
-- Table structure for table `organiser`
--

CREATE TABLE `organiser` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'PRIMARY KEY',
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `number` char(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organiser`
--

INSERT INTO `organiser` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `number`) VALUES
(1, 'abdul', '202cb962ac59075b964b07152d234b70', 'ahmed', 'abdul', 'a@.com', '07'),
(2, 'razamahj', '1f243296ce770803dddbb45f4e8153e0', 'jun123', 'mahmood', 'j@hotmail.com', '07708085592'),
(3, 'razamahj', '1f243296ce770803dddbb45f4e8153e0', 'jun123', 'mahmood', 'j@hotmail.com', '07708085592'),
(4, 'razamahj', '1f243296ce770803dddbb45f4e8153e0', 'junaid123', 'mahmood', 'jsddc', '07708085592'),
(5, 'razamahj', '1f243296ce770803dddbb45f4e8153e0', 'junaid123', 'mahmood', 'jsddc', '07708085592'),
(6, 'razamahj', '1f243296ce770803dddbb45f4e8153e0', 'junaid123', 'mahmood', 'jsddc', '07708085592'),
(7, 'razamahj', '1f243296ce770803dddbb45f4e8153e0', 'junaid', 'mahmood', 'j@hotmail.com', '07708085592'),
(8, 'Mustafa', '2e006bba72bae30d3580bd06b5eca49a', 'jun123', 'mahmood', 'juna@hptmail.com', '07708085592');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `organiser`
--
ALTER TABLE `organiser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `organiser`
--
ALTER TABLE `organiser`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
