-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 12:30 PM
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
(1, 'Applied Sciences', '2', 'A', '1', '105', '00'),
(2, 'Applied Sciences', '2', 'A', '5', '106', '00'),
(3, 'Applied Sciences', '2', 'A', '14', '107', '00'),
(4, 'Applied Sciences', '2', 'A', '12', '108', '00'),
(5, 'Applied Sciences', '2', 'A', '29', '109', '00'),
(6, 'Applied Sciences', '2', 'A', '104', '110', '00'),
(7, 'Applied Sciences', '2', 'B', '11', '105', '00'),
(8, 'Applied Sciences', '2', 'B', '8', '106', '00'),
(9, 'Applied Sciences', '2', 'B', '2', '107', '00'),
(10, 'Applied Sciences', '2', 'B', '12', '108', '00'),
(11, 'Applied Sciences', '2', 'B', '18', '109', '00'),
(12, 'Applied Sciences', '2', 'B', '13', '110', '00'),
(13, 'Applied Sciences', '2', 'C', '16', '105', '00'),
(14, 'Applied Sciences', '2', 'C', '5', '106', '00'),
(15, 'Applied Sciences', '2', 'C', '2', '107', '00'),
(16, 'Applied Sciences', '2', 'C', '88', '108', '00'),
(17, 'Applied Sciences', '2', 'C', '23', '109', '00'),
(18, 'Applied Sciences', '2', 'C', '4', '110', '00'),
(19, 'Applied Sciences', '2', 'D', '1', '105', '00'),
(20, 'Applied Sciences', '2', 'D', '5', '106', '00'),
(21, 'Applied Sciences', '2', 'D', '14', '107', '00'),
(22, 'Applied Sciences', '2', 'D', '85', '108', '00'),
(23, 'Applied Sciences', '2', 'D', '29', '109', '00'),
(24, 'Applied Sciences', '2', 'D', '104', '110', '00'),
(25, 'Applied Sciences', '2', 'E', '3', '105', '00'),
(26, 'Applied Sciences', '2', 'E', '8', '106', '00'),
(27, 'Applied Sciences', '2', 'E', '14', '107', '00'),
(28, 'Applied Sciences', '2', 'E', '84', '108', '00'),
(29, 'Applied Sciences', '2', 'E', '23', '109', '00'),
(30, 'Applied Sciences', '2', 'E', '13', '110', '00'),
(31, 'Applied Sciences', '2', 'F', '1', '105', '00'),
(32, 'Applied Sciences', '2', 'F', '8', '106', '00'),
(33, 'Applied Sciences', '2', 'F', '2', '107', '00'),
(34, 'Applied Sciences', '2', 'F', '12', '108', '00'),
(35, 'Applied Sciences', '2', 'F', '18', '109', '00'),
(36, 'Applied Sciences', '2', 'F', '4', '110', '00'),
(37, 'Mechanical Engineering', '4', 'A', '95', '129', '00'),
(38, 'Mechanical Engineering', '4', 'A', '96', '130', '00'),
(39, 'Mechanical Engineering', '4', 'A', '73', '131', '00'),
(40, 'Mechanical Engineering', '4', 'A', '45', '132', '00'),
(41, 'Mechanical Engineering', '4', 'A', '101', '133', '00'),
(42, 'Mechanical Engineering', '4', 'A', '3', '134', '00'),
(43, 'Mechanical Engineering', '4', 'B', '84', '129', '00'),
(44, 'Mechanical Engineering', '4', 'B', '90', '130', '00'),
(45, 'Mechanical Engineering', '4', 'B', '40', '131', '00'),
(46, 'Mechanical Engineering', '4', 'B', '45', '132', '00'),
(47, 'Mechanical Engineering', '4', 'B', '102', '133', '00'),
(48, 'Mechanical Engineering', '4', 'B', '3', '134', '00'),
(49, 'Mechanical Engineering', '6', 'A', '87', '135', '00'),
(50, 'Mechanical Engineering', '6', 'A', '91', '136', '00'),
(51, 'Mechanical Engineering', '6', 'A', '99', '137', '00'),
(52, 'Mechanical Engineering', '6', 'A', '100', '138', '00'),
(53, 'Mechanical Engineering', '6', 'A', '6', '139', '10->1'),
(54, 'Mechanical Engineering', '6', 'B', '86', '135', '00'),
(55, 'Mechanical Engineering', '6', 'B', '93', '136', '00'),
(56, 'Mechanical Engineering', '6', 'B', '101', '137', '00'),
(57, 'Mechanical Engineering', '6', 'B', '103', '138', '00'),
(58, 'Mechanical Engineering', '6', 'B', '85', '139', '10->1'),
(59, 'Mechanical Engineering', '6', 'B', '83', '140', '10->1'),
(60, 'Mechanical Engineering', '8', 'A', '88', '141', '00'),
(61, 'Mechanical Engineering', '8', 'A', '89', '142', '01'),
(62, 'Mechanical Engineering', '8', 'A', '103', '142', '01'),
(63, 'Mechanical Engineering', '8', 'A', '95', '143', '00'),
(64, 'Mechanical Engineering', '8', 'A', '102', '144', '10->1'),
(65, 'Mechanical Engineering', '8', 'A', '94', '145', '10->2'),
(66, 'Mechanical Engineering', '8', 'A', '15', '146', '10->2'),
(67, 'Mechanical Engineering', '8', 'A', '37', '147', '10->2'),
(68, 'Mechanical Engineering', '8', 'A', '15', '203', '10->1'),
(69, 'Mechanical Engineering', '8', 'B', '92', '141', '00'),
(70, 'Mechanical Engineering', '8', 'B', '94', '142', '00'),
(71, 'Mechanical Engineering', '8', 'B', '97', '143', '00'),
(72, 'Mechanical Engineering', '8', 'B', '83', '145', '10->2'),
(73, 'Mechanical Engineering', '8', 'B', '15', '146', '10->2'),
(74, 'Mechanical Engineering', '8', 'B', '37', '147', '10->2'),
(75, 'Mechanical Engineering', '8', 'B', '15', '203', '10->1'),
(76, 'Electronics and Telecommunication', '4', 'A', '57', '148', '00'),
(77, 'Electronics and Telecommunication', '4', 'A', '10', '149', '00'),
(78, 'Electronics and Telecommunication', '4', 'A', '46', '150', '00'),
(79, 'Electronics and Telecommunication', '4', 'A', '55', '151', '00'),
(80, 'Electronics and Telecommunication', '4', 'A', '16', '152', '00'),
(81, 'Electronics and Telecommunication', '4', 'B', '41', '148', '00'),
(82, 'Electronics and Telecommunication', '4', 'B', '57', '149', '00'),
(83, 'Electronics and Telecommunication', '4', 'B', '55', '150', '00'),
(84, 'Electronics and Telecommunication', '4', 'B', '51', '151', '00'),
(85, 'Electronics and Telecommunication', '4', 'B', '16', '152', '00'),
(86, 'Electronics and Telecommunication', '6', 'A', '48', '153', '00'),
(87, 'Electronics and Telecommunication', '6', 'A', '49', '154', '00'),
(88, 'Electronics and Telecommunication', '6', 'A', '47', '155', '00'),
(89, 'Electronics and Telecommunication', '6', 'A', '44', '156', '10->1'),
(90, 'Electronics and Telecommunication', '6', 'A', '50', '204', '00'),
(91, 'Electronics and Telecommunication', '6', 'B', '53', '153', '00'),
(92, 'Electronics and Telecommunication', '6', 'B', '52', '154', '00'),
(93, 'Electronics and Telecommunication', '6', 'B', '39', '155', '01'),
(94, 'Electronics and Telecommunication', '6', 'B', '47', '155', '01'),
(95, 'Electronics and Telecommunication', '6', 'B', '44', '156', '10->1'),
(96, 'Electronics and Telecommunication', '6', 'B', '37', '157', '10->1'),
(97, 'Electronics and Telecommunication', '6', 'B', '56', '204', '00'),
(98, 'Electronics and Telecommunication', '8', 'A', '42', '158', '10->1'),
(99, 'Electronics and Telecommunication', '8', 'A', '43', '160', '00'),
(100, 'Electronics and Telecommunication', '8', 'A', '37', '161', '10->2'),
(101, 'Electronics and Telecommunication', '8', 'A', '53', '162', '10->2'),
(102, 'Electronics and Telecommunication', '8', 'A', '15', '163', '10->2'),
(103, 'Electronics and Telecommunication', '8', 'A', '66', '164', '00'),
(104, 'Electronics and Telecommunication', '8', 'B', '42', '158', '10->1'),
(105, 'Electronics and Telecommunication', '8', 'B', '38', '159', '10->1'),
(106, 'Electronics and Telecommunication', '8', 'B', '39', '160', '00'),
(107, 'Electronics and Telecommunication', '8', 'B', '37', '161', '10->2'),
(108, 'Electronics and Telecommunication', '8', 'B', '53', '162', '10->2'),
(109, 'Electronics and Telecommunication', '8', 'B', '15', '163', '10->2'),
(110, 'Electronics and Telecommunication', '8', 'B', '51', '164', '01'),
(111, 'Electronics and Telecommunication', '8', 'B', '52', '164', '01'),
(112, 'Instumentation Engineering', '4', 'A', '77', '165', '00'),
(113, 'Instumentation Engineering', '4', 'A', '70', '166', '00'),
(114, 'Instumentation Engineering', '4', 'A', '78', '167', '00'),
(115, 'Instumentation Engineering', '4', 'A', '9', '168', '00'),
(116, 'Instumentation Engineering', '4', 'A', '76', '169', '00'),
(117, 'Instumentation Engineering', '4', 'A', '106', '170', '00'),
(118, 'Instumentation Engineering', '6', 'A', '74', '171', '00'),
(119, 'Instumentation Engineering', '6', 'A', '81', '172', '01'),
(120, 'Instumentation Engineering', '6', 'A', '9', '172', '01'),
(121, 'Instumentation Engineering', '6', 'A', '72', '173', '00'),
(122, 'Instumentation Engineering', '6', 'A', '79', '174', '00'),
(123, 'Instumentation Engineering', '6', 'A', '75', '175', '00'),
(124, 'Instumentation Engineering', '6', 'A', '78', '176', '10->1'),
(125, 'Instumentation Engineering', '6', 'A', '72', '177', '10->1'),
(126, 'Instumentation Engineering', '8', 'A', '76', '178', '00'),
(127, 'Instumentation Engineering', '8', 'A', '81', '179', '00'),
(128, 'Instumentation Engineering', '8', 'A', '75', '180', '10->1'),
(129, 'Instumentation Engineering', '8', 'A', '74', '181', '10->1'),
(130, 'Instumentation Engineering', '8', 'A', '77', '182', '10->2'),
(131, 'Instumentation Engineering', '8', 'A', '15', '183', '10->2'),
(132, 'Instumentation Engineering', '8', 'A', '21', '184', '10->2'),
(133, 'Instumentation Engineering', '8', 'A', '25', '185', '10->2'),
(134, 'Information Technology', '4', 'A', '58', '186', '00'),
(135, 'Information Technology', '4', 'A', '69', '187', '00'),
(136, 'Information Technology', '4', 'A', '106', '188', '00'),
(137, 'Information Technology', '4', 'A', '59', '189', '00'),
(138, 'Information Technology', '4', 'A', '64', '190', '00'),
(139, 'Information Technology', '4', 'A', '65', '191', '00'),
(140, 'Information Technology', '6', 'A', '67', '192', '00'),
(141, 'Information Technology', '6', 'A', '62', '193', '00'),
(142, 'Information Technology', '6', 'A', '69', '194', '10->1'),
(143, 'Information Technology', '6', 'A', '67', '195', '11->1'),
(144, 'Information Technology', '6', 'A', '59', '195', '11->1'),
(145, 'Information Technology', '6', 'A', '65', '196', '00'),
(146, 'Information Technology', '6', 'A', '107', '197', '00'),
(147, 'Information Technology', '8', 'A', '58', '198', '01'),
(148, 'Information Technology', '8', 'A', '62', '198', '01'),
(149, 'Information Technology', '8', 'A', '63', '199', '00'),
(150, 'Information Technology', '8', 'A', '64', '200', '00'),
(151, 'Information Technology', '8', 'A', '15', '201', '10->1'),
(152, 'Information Technology', '8', 'A', '60', '202', '10->1'),
(153, 'Computer Engineering', '4', 'A', '11', '111', '00'),
(154, 'Computer Engineering', '4', 'A', '35', '112', '00'),
(155, 'Computer Engineering', '4', 'A', '17', '113', '00'),
(156, 'Computer Engineering', '4', 'A', '32', '114', '00'),
(157, 'Computer Engineering', '4', 'A', '105', '115', '00'),
(158, 'Computer Engineering', '4', 'A', '30', '116', '00'),
(159, 'Computer Engineering', '4', 'B', '11', '111', '00'),
(160, 'Computer Engineering', '4', 'B', '35', '112', '00'),
(161, 'Computer Engineering', '4', 'B', '17', '113', '00'),
(162, 'Computer Engineering', '4', 'B', '32', '114', '00'),
(163, 'Computer Engineering', '4', 'B', '105', '115', '00'),
(164, 'Computer Engineering', '4', 'B', '30', '116', '00'),
(165, 'Computer Engineering', '6', 'A', '34', '117', '00'),
(166, 'Computer Engineering', '6', 'A', '19', '118', '00'),
(167, 'Computer Engineering', '6', 'A', '27', '119', '00'),
(168, 'Computer Engineering', '6', 'A', '31', '120', '00'),
(169, 'Computer Engineering', '6', 'A', '22', '121', '00'),
(170, 'Computer Engineering', '6', 'B', '34', '117', '00'),
(171, 'Computer Engineering', '6', 'B', '21', '118', '00'),
(172, 'Computer Engineering', '6', 'B', '25', '119', '00'),
(173, 'Computer Engineering', '6', 'B', '31', '120', '00'),
(174, 'Computer Engineering', '6', 'B', '22', '121', '00'),
(175, 'Computer Engineering', '8', 'A', '26', '122', '00'),
(176, 'Computer Engineering', '8', 'A', '33', '123', '00'),
(177, 'Computer Engineering', '8', 'A', '24', '124', '00'),
(178, 'Computer Engineering', '8', 'A', '19', '125', '00'),
(179, 'Computer Engineering', '8', 'A', '21', '126', '10->1'),
(180, 'Computer Engineering', '8', 'A', '25', '127', '10->1'),
(181, 'Computer Engineering', '8', 'A', '15', '128', '10->1'),
(182, 'Computer Engineering', '8', 'B', '26', '122', '00'),
(183, 'Computer Engineering', '8', 'B', '36', '123', '00'),
(184, 'Computer Engineering', '8', 'B', '28', '124', '00'),
(185, 'Computer Engineering', '8', 'B', '67', '125', '00'),
(186, 'Computer Engineering', '8', 'B', '21', '126', '10->1'),
(187, 'Computer Engineering', '8', 'B', '25', '127', '10->1'),
(188, 'Computer Engineering', '8', 'B', '15', '128', '10->1');

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
  MODIFY `lec_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
