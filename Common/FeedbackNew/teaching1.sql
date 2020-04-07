-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2020 at 11:15 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

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
-- Table structure for table `teaching`
--

CREATE TABLE `teaching` (
  `lec_id` int(100) NOT NULL,
  `dept` varchar(200) NOT NULL,
  `sem` varchar(200) NOT NULL,
  `lec_div` varchar(100) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `sub_id` varchar(100) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teaching`
--

INSERT INTO `teaching` (`lec_id`, `dept`, `sem`, `lec_div`, `teacher_id`, `sub_id`, `status`) VALUES
(1, 'Applied Sciences', '2', 'A', '4', '105', '00'),
(2, 'Applied Sciences', '2', 'A', '20', '106', '00'),
(3, 'Applied Sciences', '2', 'A', '15', '107', '00'),
(4, 'Applied Sciences', '2', 'A', '6', '108', '00'),
(5, 'Applied Sciences', '2', 'A', '32', '109', '00'),
(6, 'Applied Sciences', '2', 'A', '66', '110', '00'),
(7, 'Applied Sciences', '2', 'B', '5', '105', '00'),
(8, 'Applied Sciences', '2', 'B', '123', '106', '00'),
(9, 'Applied Sciences', '2', 'B', '8', '107', '00'),
(10, 'Applied Sciences', '2', 'B', '6', '108', '00'),
(11, 'Applied Sciences', '2', 'B', '26', '109', '00'),
(12, 'Applied Sciences', '2', 'B', '7', '110', '00'),
(13, 'Applied Sciences', '2', 'C', '19', '105', '00'),
(14, 'Applied Sciences', '2', 'C', '20', '106', '00'),
(15, 'Applied Sciences', '2', 'C', '8', '107', '00'),
(16, 'Applied Sciences', '2', 'C', '54', '108', '00'),
(17, 'Applied Sciences', '2', 'C', '22', '109', '00'),
(18, 'Applied Sciences', '2', 'C', '14', '110', '00'),
(19, 'Applied Sciences', '2', 'D', '4', '105', '00'),
(20, 'Applied Sciences', '2', 'D', '20', '106', '00'),
(21, 'Applied Sciences', '2', 'D', '15', '107', '00'),
(22, 'Applied Sciences', '2', 'D', '12', '108', '00'),
(23, 'Applied Sciences', '2', 'D', '32', '109', '00'),
(24, 'Applied Sciences', '2', 'D', '66', '110', '00'),
(25, 'Applied Sciences', '2', 'E', '11', '105', '00'),
(26, 'Applied Sciences', '2', 'E', '123', '106', '00'),
(27, 'Applied Sciences', '2', 'E', '15', '107', '00'),
(28, 'Applied Sciences', '2', 'E', '9', '108', '00'),
(29, 'Applied Sciences', '2', 'E', '22', '109', '00'),
(30, 'Applied Sciences', '2', 'E', '7', '110', '00'),
(31, 'Applied Sciences', '2', 'F', '4', '105', '00'),
(32, 'Applied Sciences', '2', 'F', '123', '106', '00'),
(33, 'Applied Sciences', '2', 'F', '8', '107', '00'),
(34, 'Applied Sciences', '2', 'F', '6', '108', '00'),
(35, 'Applied Sciences', '2', 'F', '26', '109', '00'),
(36, 'Applied Sciences', '2', 'F', '14', '110', '00'),
(37, 'Mechanical Engineering', '4', 'A', '44', '129', '00'),
(38, 'Mechanical Engineering', '4', 'A', '46', '130', '00'),
(39, 'Mechanical Engineering', '4', 'A', '105', '131', '00'),
(40, 'Mechanical Engineering', '4', 'A', '75', '132', '00'),
(41, 'Mechanical Engineering', '4', 'A', '59', '133', '00'),
(42, 'Mechanical Engineering', '4', 'A', '11', '134', '00'),
(43, 'Mechanical Engineering', '4', 'B', '47', '129', '00'),
(44, 'Mechanical Engineering', '4', 'B', '45', '130', '00'),
(45, 'Mechanical Engineering', '4', 'B', '85', '131', '00'),
(46, 'Mechanical Engineering', '4', 'B', '75', '132', '00'),
(47, 'Mechanical Engineering', '4', 'B', '62', '133', '00'),
(48, 'Mechanical Engineering', '4', 'B', '11', '134', '00'),
(49, 'Mechanical Engineering', '6', 'A', '49', '135', '00'),
(50, 'Mechanical Engineering', '6', 'A', '40', '136', '00'),
(51, 'Mechanical Engineering', '6', 'A', '55', '137', '00'),
(52, 'Mechanical Engineering', '6', 'A', '56', '138', '00'),
(53, 'Mechanical Engineering', '6', 'A', '17', '139', '00'),
(54, 'Mechanical Engineering', '6', 'B', '61', '135', '00'),
(55, 'Mechanical Engineering', '6', 'B', '42', '136', '00'),
(56, 'Mechanical Engineering', '6', 'B', '59', '137', '00'),
(57, 'Mechanical Engineering', '6', 'B', '63', '138', '00'),
(58, 'Mechanical Engineering', '6', 'B', '12', '139', '00'),
(59, 'Mechanical Engineering', '6', 'B', '53', '140', '00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teaching`
--
ALTER TABLE `teaching`
  ADD PRIMARY KEY (`lec_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teaching`
--
ALTER TABLE `teaching`
  MODIFY `lec_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
