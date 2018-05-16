-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2018 at 12:41 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visit`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'vender'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` int(50) NOT NULL,
  `time_stampt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `time_stampt`) VALUES
(3, 'priyanka', 'mehtapriyanka999@gmail.com', '0f98b7f230f3c91292f0de4c99e263f2', 3, '2018-05-14 11:58:31'),
(1, 'root', 'geuashishgarg@gmail.com', '7b24afc8bc80e548d66c4e7ff72171c5', 2, '0000-00-00 00:00:00'),
(4, 'kireet', 'joshikireet@gmail.com', 'decf0b795aaa916271ed8fb440dc9c02', 3, '0000-00-00 00:00:00'),
(5, 'Dr. Prabhat Kumar', 'prabhatkumargeu@gmail.com', '6ebc4fcaf013689d3c4a61896d1b24a1', 3, '0000-00-00 00:00:00'),
(6, 'Deepak Kaushal', 'dipak.kushal@geu.ac.in', '3580d3ea10b14918b55ad51c0abd9593', 3, '2018-05-14 12:01:39'),
(7, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 3, '2018-05-15 04:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(50) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `in_time` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `img` text NOT NULL,
  `out_time` varchar(50) NOT NULL,
  `otp` int(50) NOT NULL,
  `f_email` varchar(50) DEFAULT NULL,
  `f_contact` int(10) DEFAULT NULL,
  `tenthBoard` varchar(20) NOT NULL,
  `tenthYear` int(5) NOT NULL,
  `tenthPer` float NOT NULL,
  `twelfthAppearPassed` varchar(20) NOT NULL,
  `twelfthBoard` varchar(20) NOT NULL,
  `twelfthYear` int(5) NOT NULL,
  `twelfthPer` float DEFAULT NULL,
  `gradAppearPassed` varchar(20) DEFAULT NULL,
  `gradUniversity` varchar(20) DEFAULT NULL,
  `gradYear` int(5) DEFAULT NULL,
  `gradPer` float DEFAULT NULL,
  `otherAppearPassed` varchar(20) DEFAULT NULL,
  `otherUniversity` varchar(20) DEFAULT NULL,
  `otherYear` int(5) DEFAULT NULL,
  `otherPer` float DEFAULT NULL,
  `programInterested` varchar(30) NOT NULL,
  `campusChoice` varchar(50) NOT NULL,
  `entranceExam` varchar(30) DEFAULT NULL,
  `score` float DEFAULT NULL,
  `branding` varchar(50) NOT NULL,
  `other` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `s_name`, `p_name`, `contact`, `email`, `city`, `date`, `in_time`, `gender`, `purpose`, `img`, `out_time`, `otp`, `f_email`, `f_contact`, `tenthBoard`, `tenthYear`, `tenthPer`, `twelfthAppearPassed`, `twelfthBoard`, `twelfthYear`, `twelfthPer`, `gradAppearPassed`, `gradUniversity`, `gradYear`, `gradPer`, `otherAppearPassed`, `otherUniversity`, `otherYear`, `otherPer`, `programInterested`, `campusChoice`, `entranceExam`, `score`, `branding`, `other`) VALUES
(8, 'aaa', 'aaa', '9999999999', 'aa@gmail.com', 'aaa', '14/05/2018', '05:51:38pm', 'Male', 'aaaa', '', '', 8641, NULL, NULL, '', 0, 0, '', '', 0, 0, '', '', 0, 0, '', '', 0, 0, '', '', NULL, NULL, '', NULL),
(9, 'aaa', 'aaa', '123467890', 'ghjkl@gmail.com', 'hjkl', '15/05/2018', '02:00:33pm', 'Male', 'jul;', 'http://localhost/visit/upload/pic_20180515140057.jpeg', '', 3059, NULL, NULL, '', 0, 0, '', '', 0, 0, '', '', 0, 0, '', '', 0, 0, '', '', NULL, NULL, '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
