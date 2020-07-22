-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 02:41 PM
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
-- Database: `feedback_rgit`
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
(1, 'Applied Sciences', '1', 'A', '4', '1', '00'),
(2, 'Applied Sciences', '1', 'A', '20', '2', '00'),
(3, 'Applied Sciences', '1', 'A', '16', '3', '00'),
(4, 'Applied Sciences', '1', 'A', '17', '4', '00'),
(5, 'Applied Sciences', '1', 'A', '2', '5', '00'),
(6, 'Applied Sciences', '1', 'B', '5', '1', '00'),
(7, 'Applied Sciences', '1', 'B', '123', '2', '00'),
(8, 'Applied Sciences', '1', 'B', '8', '3', '00'),
(9, 'Applied Sciences', '1', 'B', '6', '4', '00'),
(10, 'Applied Sciences', '1', 'B', '1', '5', '00'),
(11, 'Applied Sciences', '1', 'C', '19', '1', '00'),
(12, 'Applied Sciences', '1', 'C', '20', '2', '00'),
(13, 'Applied Sciences', '1', 'C', '8', '3', '00'),
(14, 'Applied Sciences', '1', 'C', '54', '4', '00'),
(15, 'Applied Sciences', '1', 'C', '3', '5', '00'),
(16, 'Applied Sciences', '1', 'D', '19', '1', '00'),
(17, 'Applied Sciences', '1', 'D', '123', '2', '00'),
(18, 'Applied Sciences', '1', 'D', '16', '3', '00'),
(19, 'Applied Sciences', '1', 'D', '6', '4', '00'),
(20, 'Applied Sciences', '1', 'D', '2', '5', '00'),
(21, 'Applied Sciences', '1', 'E', '4', '1', '00'),
(22, 'Applied Sciences', '1', 'E', '20', '2', '00'),
(23, 'Applied Sciences', '1', 'E', '15', '3', '00'),
(24, 'Applied Sciences', '1', 'E', '9', '4', '00'),
(25, 'Applied Sciences', '1', 'E', '13', '5', '00'),
(26, 'Applied Sciences', '1', 'F', '11', '1', '00'),
(27, 'Applied Sciences', '1', 'F', '123', '2', '00'),
(28, 'Applied Sciences', '1', 'F', '15', '3', '00'),
(29, 'Applied Sciences', '1', 'F', '12', '4', '00'),
(30, 'Applied Sciences', '1', 'F', '10', '5', '00'),
(31, 'Applied Sciences', '1', 'G', '4', '1', '00'),
(32, 'Applied Sciences', '1', 'G', '123', '2', '00'),
(33, 'Applied Sciences', '1', 'G', '8', '3', '00'),
(34, 'Applied Sciences', '1', 'G', '17', '4', '00'),
(35, 'Applied Sciences', '1', 'G', '3', '5', '00'),
(36, 'Mechanical Engineering', '3', 'A', '60', '26', '01'),
(37, 'Mechanical Engineering', '3', 'A', '46', '26', '01'),
(38, 'Mechanical Engineering', '3', 'A', '40', '27', '00'),
(39, 'Mechanical Engineering', '3', 'A', '44', '28', '00'),
(40, 'Mechanical Engineering', '3', 'A', '55', '29', '00'),
(41, 'Mechanical Engineering', '3', 'A', '59', '30', '00'),
(42, 'Mechanical Engineering', '3', 'A', '52', '31', '00'),
(43, 'Mechanical Engineering', '3', 'B', '45', '26', '00'),
(44, 'Mechanical Engineering', '3', 'B', '63', '27', '00'),
(45, 'Mechanical Engineering', '3', 'B', '47', '28', '00'),
(46, 'Mechanical Engineering', '3', 'B', '62', '29', '00'),
(47, 'Mechanical Engineering', '3', 'B', '44', '30', '00'),
(48, 'Mechanical Engineering', '3', 'B', '52', '31', '00'),
(49, 'Mechanical Engineering', '5', 'A', '46', '32', '00'),
(50, 'Mechanical Engineering', '5', 'A', '49', '33', '00'),
(51, 'Mechanical Engineering', '5', 'A', '54', '34', '00'),
(52, 'Mechanical Engineering', '5', 'A', '53', '35', '00'),
(53, 'Mechanical Engineering', '5', 'A', '62', '36', '10'),
(54, 'Mechanical Engineering', '5', 'A', '55', '37', '10'),
(55, 'Mechanical Engineering', '5', 'A', '62', '38', '00'),
(56, 'Mechanical Engineering', '5', 'A', '66', '39', '00'),
(57, 'Mechanical Engineering', '5', 'B', '45', '32', '00'),
(58, 'Mechanical Engineering', '5', 'B', '56', '33', '00'),
(59, 'Mechanical Engineering', '5', 'B', '42', '34', '00'),
(60, 'Mechanical Engineering', '5', 'B', '12', '35', '00'),
(61, 'Mechanical Engineering', '5', 'B', '59', '37', '10'),
(62, 'Mechanical Engineering', '5', 'B', '59', '38', '00'),
(63, 'Mechanical Engineering', '5', 'B', '66', '39', '00'),
(64, 'Mechanical Engineering', '7', 'A', '50', '40', '01'),
(65, 'Mechanical Engineering', '7', 'A', '41', '40', '01'),
(66, 'Mechanical Engineering', '7', 'A', '63', '41', '00'),
(67, 'Mechanical Engineering', '7', 'A', '42', '42', '00'),
(68, 'Mechanical Engineering', '7', 'A', '61', '43', '00'),
(69, 'Mechanical Engineering', '7', 'A', '43', '44', '10'),
(70, 'Mechanical Engineering', '7', 'A', '48', '45', '10'),
(71, 'Mechanical Engineering', '7', 'B', '48', '40', '00'),
(72, 'Mechanical Engineering', '7', 'B', '53', '41', '00'),
(73, 'Mechanical Engineering', '7', 'B', '41', '42', '00'),
(74, 'Mechanical Engineering', '7', 'B', '43', '43', '00'),
(75, 'Mechanical Engineering', '7', 'B', '40', '45', '10'),
(76, 'Computer Engineering', '3', 'A', '5', '6', '00'),
(77, 'Computer Engineering', '3', 'A', '33', '7', '00'),
(78, 'Computer Engineering', '3', 'A', '38', '8', '00'),
(79, 'Computer Engineering', '3', 'A', '34', '9', '00'),
(80, 'Computer Engineering', '3', 'A', '39', '10', '00'),
(81, 'Computer Engineering', '3', 'A', '124', '11', '00'),
(82, 'Computer Engineering', '3', 'B', '5', '6', '00'),
(83, 'Computer Engineering', '3', 'B', '32', '7', '00'),
(84, 'Computer Engineering', '3', 'B', '33', '8', '00'),
(85, 'Computer Engineering', '3', 'B', '37', '9', '00'),
(86, 'Computer Engineering', '3', 'B', '39', '10', '00'),
(87, 'Computer Engineering', '3', 'B', '117', '11', '00'),
(88, 'Computer Engineering', '5', 'A', '14', '12', '00'),
(89, 'Computer Engineering', '5', 'A', '35', '13', '00'),
(90, 'Computer Engineering', '5', 'A', '25', '14', '00'),
(91, 'Computer Engineering', '5', 'A', '36', '15', '00'),
(92, 'Computer Engineering', '5', 'A', '22', '16', '00'),
(93, 'Computer Engineering', '5', 'A', '24', '17', '00'),
(94, 'Computer Engineering', '5', 'A', '26', '18', '10'),
(95, 'Computer Engineering', '5', 'B', '14', '12', '00'),
(96, 'Computer Engineering', '5', 'B', '30', '13', '00'),
(97, 'Computer Engineering', '5', 'B', '29', '14', '00'),
(98, 'Computer Engineering', '5', 'B', '36', '15', '00'),
(99, 'Computer Engineering', '5', 'B', '22', '16', '00'),
(100, 'Computer Engineering', '5', 'B', '24', '17', '00'),
(101, 'Computer Engineering', '5', 'B', '31', '19', '10'),
(102, 'Computer Engineering', '7', 'A', '27', '20', '01'),
(103, 'Computer Engineering', '7', 'A', '28', '20', '01'),
(104, 'Computer Engineering', '7', 'A', '21', '21', '00'),
(105, 'Computer Engineering', '7', 'A', '125', '22', '01'),
(106, 'Computer Engineering', '7', 'A', '34', '22', '01'),
(107, 'Computer Engineering', '7', 'A', '31', '23', '00'),
(108, 'Computer Engineering', '7', 'A', '24', '24', '10'),
(109, 'Computer Engineering', '7', 'B', '28', '20', '01'),
(110, 'Computer Engineering', '7', 'B', '27', '20', '01'),
(111, 'Computer Engineering', '7', 'B', '21', '21', '00'),
(112, 'Computer Engineering', '7', 'B', '125', '22', '01'),
(113, 'Computer Engineering', '7', 'B', '34', '22', '01'),
(114, 'Computer Engineering', '7', 'B', '23', '23', '00'),
(115, 'Computer Engineering', '7', 'B', '35', '25', '10'),
(116, 'Electronics and Telecommunication', '3', 'A', '91', '46', '00'),
(117, 'Electronics and Telecommunication', '3', 'A', '81', '47', '00'),
(118, 'Electronics and Telecommunication', '3', 'A', '72', '48', '00'),
(119, 'Electronics and Telecommunication', '3', 'A', '22', '49', '01'),
(120, 'Electronics and Telecommunication', '3', 'A', '38', '49', '01'),
(121, 'Electronics and Telecommunication', '3', 'A', '27', '49', '01'),
(122, 'Electronics and Telecommunication', '3', 'A', '88', '50', '00'),
(123, 'Electronics and Telecommunication', '3', 'A', '76', '51', '00'),
(124, 'Electronics and Telecommunication', '3', 'B', '70', '46', '00'),
(125, 'Electronics and Telecommunication', '3', 'B', '81', '47', '00'),
(126, 'Electronics and Telecommunication', '3', 'B', '85', '48', '00'),
(127, 'Electronics and Telecommunication', '3', 'B', '22', '49', '01'),
(128, 'Electronics and Telecommunication', '3', 'B', '38', '49', '01'),
(129, 'Electronics and Telecommunication', '3', 'B', '25', '49', '01'),
(130, 'Electronics and Telecommunication', '3', 'B', '19', '50', '00'),
(131, 'Electronics and Telecommunication', '3', 'B', '76', '51', '00'),
(132, 'Electronics and Telecommunication', '5', 'A', '82', '55', '00'),
(133, 'Electronics and Telecommunication', '5', 'A', '84', '56', '00'),
(134, 'Electronics and Telecommunication', '5', 'A', '86', '57', '00'),
(135, 'Electronics and Telecommunication', '5', 'A', '78', '58', '00'),
(136, 'Electronics and Telecommunication', '5', 'A', '92', '59', '10'),
(137, 'Electronics and Telecommunication', '5', 'A', '77', '60', '10'),
(138, 'Electronics and Telecommunication', '5', 'A', '7', '61', '00'),
(143, 'Electronics and Telecommunication', '5', 'B', '91', '55', '00'),
(144, 'Electronics and Telecommunication', '5', 'B', '84', '56', '00'),
(145, 'Electronics and Telecommunication', '5', 'B', '70', '57', '00'),
(146, 'Electronics and Telecommunication', '5', 'B', '87', '58', '00'),
(147, 'Electronics and Telecommunication', '5', 'B', '92', '59', '10'),
(148, 'Electronics and Telecommunication', '5', 'B', '77', '60', '10'),
(149, 'Electronics and Telecommunication', '5', 'B', '7', '61', '00'),
(150, 'Electronics and Telecommunication', '7', 'A', '74', '63', '00'),
(151, 'Electronics and Telecommunication', '7', 'A', '85', '64', '00'),
(152, 'Electronics and Telecommunication', '7', 'A', '69', '65', '00'),
(153, 'Electronics and Telecommunication', '7', 'A', '75', '66', '00'),
(154, 'Electronics and Telecommunication', '7', 'A', '73', '67', '10'),
(155, 'Electronics and Telecommunication', '7', 'A', '82', '68', '10'),
(156, 'Electronics and Telecommunication', '7', 'B', '74', '63', '00'),
(157, 'Electronics and Telecommunication', '7', 'B', '89', '64', '00'),
(158, 'Electronics and Telecommunication', '7', 'B', '83', '65', '00'),
(159, 'Electronics and Telecommunication', '7', 'B', '75', '66', '00'),
(160, 'Electronics and Telecommunication', '7', 'B', '73', '67', '10'),
(161, 'Electronics and Telecommunication', '7', 'B', '82', '68', '10'),
(162, 'Instumentation Engineering', '3', 'A', '97', '69', '00'),
(163, 'Instumentation Engineering', '3', 'A', '100', '70', '00'),
(164, 'Instumentation Engineering', '3', 'A', '104', '71', '00'),
(165, 'Instumentation Engineering', '3', 'A', '105', '72', '00'),
(166, 'Instumentation Engineering', '3', 'A', '32', '73', '00'),
(167, 'Instumentation Engineering', '3', 'A', '108', '74', '00'),
(168, 'Instumentation Engineering', '5', 'A', '98', '75', '00'),
(169, 'Instumentation Engineering', '5', 'A', '1', '76', '00'),
(170, 'Instumentation Engineering', '5', 'A', '105', '77', '00'),
(171, 'Instumentation Engineering', '5', 'A', '107', '78', '00'),
(172, 'Instumentation Engineering', '5', 'A', '101', '79', '00'),
(173, 'Instumentation Engineering', '5', 'A', '102', '80', '10'),
(174, 'Instumentation Engineering', '5', 'A', '100', '81', '10'),
(175, 'Instumentation Engineering', '7', 'A', '102', '82', '00'),
(176, 'Instumentation Engineering', '7', 'A', '98', '83', '00'),
(177, 'Instumentation Engineering', '7', 'A', '103', '84', '00'),
(178, 'Instumentation Engineering', '7', 'A', '107', '85', '00'),
(179, 'Instumentation Engineering', '7', 'A', '95', '86', '00'),
(180, 'Information Technology', '3', 'A', '113', '87', '00'),
(181, 'Information Technology', '3', 'A', '111', '88', '00'),
(182, 'Information Technology', '3', 'A', '119', '89', '00'),
(183, 'Information Technology', '3', 'A', '109', '90', '00'),
(184, 'Information Technology', '3', 'A', '113', '91', '00'),
(185, 'Information Technology', '3', 'A', '117', '92', '00'),
(186, 'Information Technology', '5', 'A', '114', '93', '00'),
(187, 'Information Technology', '5', 'A', '118', '94', '01'),
(188, 'Information Technology', '5', 'A', '116', '94', '01'),
(189, 'Information Technology', '5', 'A', '111', '95', '00'),
(190, 'Information Technology', '5', 'A', '110', '96', '00'),
(191, 'Information Technology', '5', 'A', '101', '97', '00'),
(192, 'Information Technology', '5', 'A', '109', '98', '00'),
(193, 'Information Technology', '7', 'A', '116', '99', '00'),
(194, 'Information Technology', '7', 'A', '112', '100', '00'),
(195, 'Information Technology', '7', 'A', '115', '101', '00'),
(196, 'Information Technology', '7', 'A', '118', '102', '10'),
(197, 'Information Technology', '7', 'A', '122', '103', '00'),
(198, 'Information Technology', '7', 'A', '112', '104', '10'),
(200, 'Computer Engineering', '7', 'B', '24', '24', '10'),
(201, 'Computer Engineering', '7', 'A', '35', '25', '10'),
(202, 'Computer Engineering', '5', 'A', '31', '19', '10'),
(203, 'Computer Engineering', '5', 'B', '26', '18', '10');

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
  MODIFY `lec_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
