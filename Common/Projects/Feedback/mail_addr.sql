-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 02:37 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rgit_feedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `mail_addr`
--

CREATE TABLE `mail_addr` (
  `mail_id` int(200) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `mail_hash` varchar(200) NOT NULL,
  `mail_dept` varchar(50) NOT NULL,
  `mail_sem` varchar(200) NOT NULL,
  `mail_div` varchar(50) NOT NULL,
  `fb_link` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_addr`
--

INSERT INTO `mail_addr` (`mail_id`, `mail`, `mail_hash`, `mail_dept`, `mail_sem`, `mail_div`, `fb_link`) VALUES
(1, 'nitishtalekar.nt503@gmail.com', '746293261661a7c7ec0205f6f077d803c254b688', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=746293261661a7c7ec0205f6f077d803c254b688'),
(2, 'wsarvesh@gmail.com', '87c619d4f869384cf99104acde55ba1d0ba9c492', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=87c619d4f869384cf99104acde55ba1d0ba9c492'),
(3, 'aayush@gmail.com', '13439bb72280ed61479ca5956e369c89dd70de1f', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=13439bb72280ed61479ca5956e369c89dd70de1f'),
(4, 'xgfghsd@gmail.com', 'bddc6fc01f26e70f55e58ada102323d6f0fcd93e', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=bddc6fc01f26e70f55e58ada102323d6f0fcd93e'),
(5, 'abcdef@gmail.com', 'b1b52ab6fad5c244092339ef9fe5657ec7a95828', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=b1b52ab6fad5c244092339ef9fe5657ec7a95828');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mail_addr`
--
ALTER TABLE `mail_addr`
  ADD PRIMARY KEY (`mail_id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mail_addr`
--
ALTER TABLE `mail_addr`
  MODIFY `mail_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
