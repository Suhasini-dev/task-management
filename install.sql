-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2018 at 05:30 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `taskcancel`
--

CREATE TABLE `taskcancel` (
  `cancel_id` int(11) NOT NULL,
  `cancel_title` varchar(255) NOT NULL,
  `cancel_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taskcancel`
--

INSERT INTO `taskcancel` (`cancel_id`, `cancel_title`, `cancel_date`) VALUES
(1, 'Cancel Task ', '2018-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `taskclose`
--

CREATE TABLE `taskclose` (
  `close_id` int(11) NOT NULL,
  `close_title` varchar(255) NOT NULL,
  `close_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taskclose`
--

INSERT INTO `taskclose` (`close_id`, `close_title`, `close_date`) VALUES
(1, 'Buy Milk', '2018-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `tasklist`
--

CREATE TABLE `tasklist` (
  `id` int(11) NOT NULL,
  `taskTitle` varchar(255) NOT NULL,
  `taskDate` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasklist`
--

INSERT INTO `tasklist` (`id`, `taskTitle`, `taskDate`) VALUES
(8, 'Hello There World 2', '2018-11-13'),
(14, 'Hello There 2 U', '6 March 2018 34 Days');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `taskcancel`
--
ALTER TABLE `taskcancel`
  ADD PRIMARY KEY (`cancel_id`);

--
-- Indexes for table `taskclose`
--
ALTER TABLE `taskclose`
  ADD PRIMARY KEY (`close_id`);

--
-- Indexes for table `tasklist`
--
ALTER TABLE `tasklist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `taskcancel`
--
ALTER TABLE `taskcancel`
  MODIFY `cancel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `taskclose`
--
ALTER TABLE `taskclose`
  MODIFY `close_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tasklist`
--
ALTER TABLE `tasklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
