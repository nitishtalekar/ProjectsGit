-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2020 at 10:21 PM
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
-- Database: `dhopd`
--

-- --------------------------------------------------------

--
-- Table structure for table `dhopd_patient`
--

CREATE TABLE `dhopd_patient` (
  `patient_id` int(11) NOT NULL,
  `patient_fname` varchar(200) NOT NULL,
  `patient_mname` varchar(200) NOT NULL,
  `patient_lname` varchar(200) NOT NULL,
  `patient_title` varchar(20) NOT NULL,
  `patient_address` varchar(500) NOT NULL,
  `patient_town` varchar(200) NOT NULL,
  `patient_phone` varchar(15) NOT NULL,
  `patient_services` varchar(500) NOT NULL,
  `patient_date` date NOT NULL,
  `patient_time` time(6) NOT NULL,
  `patient_status` varchar(2) NOT NULL,
  `patient_cost` varchar(100) NOT NULL,
  `patient_comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dhopd_patient`
--

INSERT INTO `dhopd_patient` (`patient_id`, `patient_fname`, `patient_mname`, `patient_lname`, `patient_title`, `patient_address`, `patient_town`, `patient_phone`, `patient_services`, `patient_date`, `patient_time`, `patient_status`, `patient_cost`, `patient_comment`) VALUES
(1, 'SARVESH', 'ddsdsd', 'WANODE', 'Mr.', 'khetan nagar kaulkhed', 'Akola', '07588926601', '2;4', '2020-05-14', '15:49:55.526386', '0', '0;500', ''),
(2, 'SARVESH', 'sdsdsd', 'WANODE', 'Ms.', 'B-503, Pruthvi Enclave 2, Opp Bhor industries. Borivali (E)', 'Akola', '07588926601', '3;4', '2020-05-14', '16:00:22.310740', '0', '200;500', ''),
(3, 'SARVESH', 'hhkh', 'WANODE', 'Ms.', 'khetan nagar kaulkhed', 'Akola', '07588926601', '3;6', '2020-05-14', '16:54:19.294145', '0', '200;50', ''),
(5, 'SARVESH', 'sdsdsd', 'WANODE', 'Mr.', 'khetan nagar kaulkhed', 'Akola', '07588926601', '2;3', '2020-05-15', '00:03:55.389601', '0', '0;200', ''),
(6, 'SARVESH', 'sdsdsd', 'WANODE', 'Ms.', 'khetan nagar kaulkhed', 'Akola', '07588926601', '5;6', '2020-05-15', '00:04:12.725691', '0', '300;50', ''),
(7, 'Gudu', 'sdsdsd', 'WANODE', 'Ms.', 'khetan nagar kaulkhed', 'Akola', '07588926601', '2;4;5;6', '2020-05-15', '00:04:26.250811', '1', '0;500;300;50', ''),
(8, 'SARVESH', 'sdsdsd', 'WANODE', 'Ms.', 'khetan nagar kaulkhed', 'Akola', '07588926601', '4;8;8.1;8.2', '2020-05-15', '00:36:43.784667', '1', '500;0;43434;1', ''),
(9, 'sdsdsdsd', 'sdsdsd', 'sdsd', 'Ms.', 'sdsdsdsds', 'sdsdsdsd', '222', '2;3', '2020-05-15', '01:26:16.265747', '0', '0;200', ''),
(10, 'gyda', 'mkmk', 'WANODE', 'Baby Girl', 'khetan nagar kaulkhed', 'Akola', '07588926601', '1;5;7', '2020-05-16', '00:02:32.383692', '0', '100;300;150', ''),
(11, 'Gudu', 'mkmk', 'WANODE', 'Mr.', 'khetan nagar kaulkhed', 'Akola', '07588926601', '1;4', '2020-05-16', '00:02:44.189471', '0', '100;500', ''),
(12, '1234', 'mkmk', 'WANODE', 'Mr.', 'khetan nagar kaulkhed', 'Akola', '07588926601', '4;8;8.1', '2020-05-16', '00:02:57.895464', '1', '500;0;43434', ''),
(13, 'gudz', 'mkmk', 'WANODE', 'Baby Girl', 'khetan nagar kaulkhed', 'Akola', '07588926601', '4;8;8.1;8.2', '2020-05-16', '00:03:17.291279', '1', '500;0;43434;1', ''),
(14, 'SARVESH', 'sssds', 'WANODE', 'Baby Boy', 'khetan nagar kaulkhed', 'Akola', '07588926601', '4;5;8;8.1', '2020-05-17', '16:11:30.741708', '0', '500;300;0;123', ''),
(15, 'SARVESH', 'sasasas', 'WANODE', 'Mrs.', 'khetan nagar kaulkhed', 'Akola', '07588926601', '4', '2020-05-17', '16:55:00.984573', '1', '500', ''),
(16, 'SARVESH', 'sdsdsdsd', 'WANODE', 'Mrs.', 'khetan nagar kaulkhed', 'Akola', '07588926601', '1;4', '2020-05-17', '17:26:34.884660', '0', '100;500', ''),
(17, 'sdasdsads', 'dfhghg', 'hghfdf', 'Mr.', 'dfdfdfdfdf', 'Akola', '2231212121', '5;7', '2020-05-19', '17:09:53.176171', '0', '300;150', ''),
(18, 'asdasd', 'sdsds', 'sdsdsad', 'Ms.', 'sdsdsd', 'Akola', '09422160269', '4;8;8.3', '2020-05-19', '17:10:55.939677', '0', '500;0;1234', ''),
(19, 'sasdvxcx', 'xcxc', 'cxcxcx', 'Mrs.', 'fththtyty', 'Mumbai', '8082189671', '4;5', '2020-05-19', '17:11:32.015937', '0', '500;300', ''),
(20, 'cvcvcxv', 'rtrtrt', 'gghghg', 'Baby Girl', 'B-503, Pruthvi Enclave 2, Opp Bhor industries. Borivali (E)', 'Mumbai', '8082189671', '2;3;4;5;6', '2020-05-19', '17:12:10.892240', '1', '0;200;500;300;50', ''),
(21, 'eeewe', 'gfgfgf', 'fgfgfg', 'Baby Boy', 'sdsdsd', 'sdsdsd', '1000000000', '2;4;5;8;8.3', '2020-05-19', '17:12:25.351332', '1', '0;500;300;0;1000', ''),
(22, 'SARVESH', 'wdwdwdwd', 'WANODE', 'Baby Girl', 'Akola', 'Akola', '7588926601', '1;4;5;7', '2020-05-21', '01:10:40.373198', '1', '100;500;300;150', ''),
(23, 'SARVESH', 'sdsdsdsd', 'WANODE', 'Mrs.', 'Akola', 'Akola', '7588926601', '4;8;8.3', '2020-05-21', '01:32:42.224452', '1', '500;0;120', ''),
(24, 'SARVESH', 'sdsdsdsd', 'WANODE', 'Mrs.', 'Akola', 'Akola', '7588926601', '4;5;6;7', '2020-05-21', '02:10:43.193769', '1', '500;300;50;150', ''),
(25, 'Sarvesh', 'Sdsdsdsdsd', 'Wanode', 'Ms.', 'Khetan Nagar Kaulkhed', 'Akola', '7588926601', '4;8;8.3', '2020-05-21', '02:16:44.585683', '0', '500;0;1000', ''),
(26, 'Sarvesh', 'Sdsdsdsdsd', 'Wanode', 'Ms.', 'Akola', 'Akola', '7588926601', '5;7;8;8.4', '2020-05-21', '02:18:20.695237', '1', '300;150;0;1000', ''),
(27, 'Sarvesh', 'Sajay', 'Wanode', 'Mr.', 'Akola', 'Akola', '7588926601', '4;5;7', '2020-05-22', '16:33:00.686485', '1', '500;300;150', ''),
(28, 'Sarvesh', 'Aghhh', 'Wanode', 'Ms.', 'Akola', 'Akola', '7588926601', '1;4', '2020-05-22', '16:57:19.600161', '1', '100;500', ''),
(29, 'Sarvesh', 'Qqqqqqq', 'Wanode', 'Mrs.', 'Akola', 'Akola', '7588926601', '1;4;5', '2020-05-22', '17:18:01.858550', '1', '100;500;300', ''),
(30, 'Sarvesh', 'Ddsdsdsd', 'Wanode', 'Mrs.', 'Khetan Nagar Kaulkhed', 'Akola', '7588926601', '4;5', '2020-05-27', '00:56:46.008635', '0', '500;300', ''),
(31, 'Sarvesh', 'Sdsdsds', 'Wanode', 'Mr.', 'Akola', 'Akola', '7588926601', '5;7', '2020-05-27', '00:58:52.828127', '1', '300;200', ''),
(32, 'Sarvesh', 'Gfhghgh', 'Wanode', 'Baby Boy', 'Khetan Nagar Kaulkhed', 'Akola', '7588926601', '1;2', '2020-05-27', '01:00:28.006800', '0', '100;0', ''),
(33, 'Sarvesh', 'Sdsdsdsdsdxccxcxcxcxc', 'Wanode', 'Baby Girl', 'Akola', 'Akola', '7588926601', '5;6', '2020-05-27', '01:01:05.641931', '1', '300;50', ''),
(34, 'Sarvesh', 'Sdsdsgfhghg', 'Wanode', 'Ms.', 'Khetan Nagar Kaulkhed', 'Akola', '7588926601', '5;6', '2020-05-27', '01:02:27.955398', '0', '300;50', ''),
(35, 'Dsfsdfdsf', 'Sdfdsfdsf', 'Sdfdfdsf', 'Baby Girl', 'B-503, Pruthvi Enclave 2, Opp Bhor Industries. Borivali (E)', 'Mumbai', '8082189671', '4;5;7', '2020-05-27', '01:03:10.978950', '0', '500;300;200', '');

-- --------------------------------------------------------

--
-- Table structure for table `dhopd_patient_c`
--

CREATE TABLE `dhopd_patient_c` (
  `patient_id` int(11) NOT NULL,
  `patient_fname` varchar(200) NOT NULL,
  `patient_mname` varchar(200) NOT NULL,
  `patient_lname` varchar(200) NOT NULL,
  `patient_title` varchar(20) NOT NULL,
  `patient_address` varchar(500) NOT NULL,
  `patient_town` varchar(200) NOT NULL,
  `patient_phone` varchar(15) NOT NULL,
  `patient_services` varchar(500) NOT NULL,
  `patient_status` varchar(2) NOT NULL,
  `patient_cost` varchar(100) NOT NULL,
  `patient_date` date NOT NULL,
  `patient_time` time(6) NOT NULL,
  `patient_comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dhopd_patient_c`
--

INSERT INTO `dhopd_patient_c` (`patient_id`, `patient_fname`, `patient_mname`, `patient_lname`, `patient_title`, `patient_address`, `patient_town`, `patient_phone`, `patient_services`, `patient_status`, `patient_cost`, `patient_date`, `patient_time`, `patient_comment`) VALUES
(1, 'Sarvesh', 'Sdsdsds', 'Wanode', 'Baby Girl', 'Akola', 'Akola', '7588926601', '3;4;5;6', '1', '200;500;300;50', '2020-05-21', '15:26:26.431070', ''),
(2, 'Sdsdsdsd', 'Svcvcv', 'Wanode', 'Baby Boy', 'Akola', 'Akola', '7588926601', '4;8;8.3', '1', '500;0;123', '2020-05-21', '15:27:42.614280', '');

-- --------------------------------------------------------

--
-- Table structure for table `dhopd_patient_h`
--

CREATE TABLE `dhopd_patient_h` (
  `patient_id` int(11) NOT NULL,
  `patient_fname` varchar(200) NOT NULL,
  `patient_mname` varchar(200) NOT NULL,
  `patient_lname` varchar(200) NOT NULL,
  `patient_gender` varchar(20) NOT NULL,
  `patient_age` varchar(20) NOT NULL,
  `patient_title` varchar(20) NOT NULL,
  `patient_address` varchar(500) NOT NULL,
  `patient_town` varchar(200) NOT NULL,
  `patient_phone` varchar(15) NOT NULL,
  `patient_imp` varchar(15) NOT NULL,
  `patient_services` varchar(500) NOT NULL,
  `patient_status` varchar(2) NOT NULL,
  `patient_room` varchar(15) NOT NULL,
  `patient_cost` varchar(100) NOT NULL,
  `patient_date` date NOT NULL,
  `patient_time` time(6) NOT NULL,
  `patient_comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dhopd_patient_h`
--

INSERT INTO `dhopd_patient_h` (`patient_id`, `patient_fname`, `patient_mname`, `patient_lname`, `patient_gender`, `patient_age`, `patient_title`, `patient_address`, `patient_town`, `patient_phone`, `patient_imp`, `patient_services`, `patient_status`, `patient_room`, `patient_cost`, `patient_date`, `patient_time`, `patient_comment`) VALUES
(1, 'SARVESH', 'qwertyuiop', 'WANODE', 'Male', '22', 'Mr.', 'khetan nagar kaulkhed', 'Akola', '7588926601', 'pata ahi', '', '0', '4', '', '2020-05-27', '15:26:01.833090', ''),
(2, 'Sarvesh', 'Sasasas', 'Wanode', 'Female', '12', 'Baby Girl', 'khetan nagar kaulkhed', 'Akola', '7588926601', 'Sdsdsd', '', '0', '4', '', '2020-05-27', '15:30:08.145607', ''),
(3, 'Sarvesh', 'Ppppppppppp', 'Wanode', 'Male', '22', 'Mr.', 'khetan nagar kaulkhed', 'Akola', '7588926601', 'Qwet', '', '1', '3', '', '2020-05-27', '16:17:42.307863', '');

-- --------------------------------------------------------

--
-- Table structure for table `dhopd_receipt`
--

CREATE TABLE `dhopd_receipt` (
  `receipt_id` int(11) NOT NULL,
  `receipt_patient` varchar(200) NOT NULL,
  `receipt_time` time(6) NOT NULL,
  `receipt_status` varchar(10) NOT NULL,
  `receipt_cost` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dhopd_receipt`
--

INSERT INTO `dhopd_receipt` (`receipt_id`, `receipt_patient`, `receipt_time`, `receipt_status`, `receipt_cost`) VALUES
(1, '1', '15:49:55.993620', '-1', '500.0'),
(2, '2', '16:00:22.529820', '-1', '700.0'),
(3, '3', '16:54:20.513900', '-1', '250.0'),
(4, '4', '16:54:55.471130', '-1', '43434.0'),
(5, '5', '00:03:55.538288', '-1', '200.0'),
(6, '6', '00:04:12.819941', '-1', '350.0'),
(7, '7', '00:04:27.969565', '-1', '850.0'),
(8, '8', '00:36:43.890521', '-1', '43935.0'),
(9, '9', '01:26:17.072648', '-1', '200.0'),
(10, '10', '00:02:32.565486', '-1', '550.0'),
(11, '11', '00:02:44.286930', '-1', '600.0'),
(12, '12', '00:02:58.336432', '-1', '43934.0'),
(13, '13', '00:03:17.413716', '-1', '43935.0'),
(14, '14', '16:11:30.977877', '-1', '923.0'),
(15, '15', '16:55:01.098457', '-1', '500.0'),
(16, '16', '17:26:35.582951', '-1', '600.0'),
(17, '17', '17:09:56.230392', '-1', '450.0'),
(18, '18', '17:11:07.030991', '-1', '1734.0'),
(19, '19', '17:11:34.132901', '-1', '800.0'),
(20, '20', '17:12:11.582189', '-1', '1050.0'),
(21, '21', '17:12:25.747735', '-1', '1800.0'),
(22, '22', '01:10:40.497357', '0', '1050.0'),
(23, '23', '01:32:42.439494', '0', '620.0'),
(24, '24', '02:10:43.313086', '0', '1000.0'),
(25, '25', '02:16:44.746482', '-1', '1500.0'),
(26, '26', '02:18:20.902331', '0', '1450.0'),
(27, '27', '16:33:01.017369', '0', '950.0'),
(28, '28', '16:57:21.101177', '0', '600.0'),
(29, '29', '17:18:02.999889', '0', '900.0'),
(30, '30', '00:56:46.197988', '-1', '800.0'),
(31, '31', '00:58:53.168099', '0', '500.0'),
(32, '32', '01:00:28.128222', '-1', '100.0'),
(33, '33', '01:01:05.748165', '0', '350.0'),
(34, '34', '01:02:28.090845', '-1', '350.0'),
(35, '35', '01:03:11.050435', '-1', '1000.0');

-- --------------------------------------------------------

--
-- Table structure for table `dhopd_receipt_c`
--

CREATE TABLE `dhopd_receipt_c` (
  `receipt_id` int(11) NOT NULL,
  `receipt_patient` varchar(200) NOT NULL,
  `receipt_cost` varchar(200) NOT NULL,
  `receipt_time` time(6) NOT NULL,
  `receipt_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dhopd_receipt_c`
--

INSERT INTO `dhopd_receipt_c` (`receipt_id`, `receipt_patient`, `receipt_cost`, `receipt_time`, `receipt_status`) VALUES
(1, '1', '1050.0', '15:26:26.584668', '0'),
(2, '2', '623.0', '15:27:42.746139', '0');

-- --------------------------------------------------------

--
-- Table structure for table `dhopd_room`
--

CREATE TABLE `dhopd_room` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(200) NOT NULL,
  `room_cost` varchar(200) NOT NULL,
  `room_bed` varchar(10) NOT NULL,
  `room_bed_occ` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dhopd_room`
--

INSERT INTO `dhopd_room` (`room_id`, `room_name`, `room_cost`, `room_bed`, `room_bed_occ`) VALUES
(1, 'General Ward A', '200', '8', '0'),
(2, 'General Ward B', '200', '8', '0'),
(3, 'Special Room 1', '500', '2', '1'),
(4, 'Special Room 2', '500', '2', '2'),
(5, 'Special Room 3', '500', '2', '0'),
(6, 'Special Room 4', '500', '2', '0');

-- --------------------------------------------------------

--
-- Table structure for table `dhopd_service`
--

CREATE TABLE `dhopd_service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(200) NOT NULL,
  `service_cost` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dhopd_service`
--

INSERT INTO `dhopd_service` (`service_id`, `service_name`, `service_cost`) VALUES
(1, 'Consultation', '100'),
(2, 'Free Consultation', '0'),
(3, 'Nibulisation', '200'),
(4, 'E.C.G.', '500'),
(5, 'Bl. Glucose', '300'),
(6, 'Revisit', '50'),
(7, 'Drip', '200'),
(8, 'Vaccine', '0');

-- --------------------------------------------------------

--
-- Table structure for table `dhopd_service_h`
--

CREATE TABLE `dhopd_service_h` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(200) NOT NULL,
  `service_cost` varchar(200) NOT NULL,
  `service_tag` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dhopd_service_h`
--

INSERT INTO `dhopd_service_h` (`service_id`, `service_name`, `service_cost`, `service_tag`) VALUES
(1, 'Room Rent', '200', 'D'),
(2, 'Doctors Charge', '200', 'D'),
(3, 'Service Charge', '500', 'D'),
(4, 'Saline & Ing Charges', '150', 'D'),
(5, 'Consultation', '200', 'D'),
(6, 'ECG Charges', '200', 'N'),
(7, 'Emergency Charges', '500', 'N'),
(8, 'R.T. CHarges', '200', 'N'),
(9, 'Catheterisation Charge', '500', 'N'),
(10, 'L.P. Charges', '200', 'N'),
(11, 'Bl Glucose Charge', '200', 'N'),
(12, 'O2 Charges', '200', 'N'),
(13, 'Nebulisation Charge', '300', 'N'),
(14, 'Hospital Drugs Charges', '0', 'N'),
(16, 'Blood Transformation Charge', '1000', 'N'),
(17, 'Other Charge', '200', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `dhopd_users`
--

CREATE TABLE `dhopd_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `pno` varchar(15) NOT NULL,
  `priority` varchar(2) NOT NULL,
  `auth` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dhopd_users`
--

INSERT INTO `dhopd_users` (`user_id`, `user_name`, `password`, `fname`, `lname`, `pno`, `priority`, `auth`) VALUES
(1, 'wsarvesh', '1234', 'Sarvesh', 'Wanode', '7588926601', 'A', '0'),
(2, 'wsarvesh1', '9422160269', 'h', 'q', '9422160269', 'U', '4'),
(3, 'gudu', '9422160269', 'h', 'q', '9422160269', 'U', '5'),
(4, 'xyz', '1234567890', 'q', 'q', '1234567890', 'U', '3');

-- --------------------------------------------------------

--
-- Table structure for table `dhopd_vaccine`
--

CREATE TABLE `dhopd_vaccine` (
  `vaccine_id` int(11) NOT NULL,
  `vaccine_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dhopd_vaccine`
--

INSERT INTO `dhopd_vaccine` (`vaccine_id`, `vaccine_name`) VALUES
(1, 'hjhjhj'),
(2, 'adafa'),
(3, 'vacc'),
(4, 'Asd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dhopd_patient`
--
ALTER TABLE `dhopd_patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `dhopd_patient_c`
--
ALTER TABLE `dhopd_patient_c`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `dhopd_patient_h`
--
ALTER TABLE `dhopd_patient_h`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `dhopd_receipt`
--
ALTER TABLE `dhopd_receipt`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `dhopd_receipt_c`
--
ALTER TABLE `dhopd_receipt_c`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `dhopd_room`
--
ALTER TABLE `dhopd_room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `dhopd_service`
--
ALTER TABLE `dhopd_service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `dhopd_service_h`
--
ALTER TABLE `dhopd_service_h`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `dhopd_users`
--
ALTER TABLE `dhopd_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `dhopd_vaccine`
--
ALTER TABLE `dhopd_vaccine`
  ADD PRIMARY KEY (`vaccine_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dhopd_patient`
--
ALTER TABLE `dhopd_patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `dhopd_patient_c`
--
ALTER TABLE `dhopd_patient_c`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dhopd_patient_h`
--
ALTER TABLE `dhopd_patient_h`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dhopd_receipt`
--
ALTER TABLE `dhopd_receipt`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `dhopd_receipt_c`
--
ALTER TABLE `dhopd_receipt_c`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dhopd_room`
--
ALTER TABLE `dhopd_room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dhopd_service`
--
ALTER TABLE `dhopd_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dhopd_service_h`
--
ALTER TABLE `dhopd_service_h`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `dhopd_users`
--
ALTER TABLE `dhopd_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dhopd_vaccine`
--
ALTER TABLE `dhopd_vaccine`
  MODIFY `vaccine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
