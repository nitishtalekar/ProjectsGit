-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 08:09 AM
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
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(200) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `teacher_dept` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teacher_dept`) VALUES
(1, 'Prof. N. S. Chame', 'Applied Sciences'),
(2, 'Prof. Chhaya Hinge', 'Applied Sciences'),
(3, 'Prof. Prasad Soman', 'Applied Sciences'),
(4, 'Prof. B. B. Sawant', 'Applied Sciences'),
(5, 'Prof. Rohini Ghule', 'Applied Sciences'),
(6, 'Prof. R.N.Shanmukha', 'Applied Sciences'),
(7, 'Prof. A.G.Ingole', 'Applied Sciences'),
(8, 'Dr. Neeta Kapse ', 'Applied Sciences'),
(9, 'Prof. Chetan Rane', 'Applied Sciences'),
(10, 'Prof. Sanjana Repal', 'Applied Sciences'),
(11, 'Prof. Shalini Sharma', 'Applied Sciences'),
(12, 'Prof. Nikhil V S', 'Applied Sciences'),
(13, 'Prof. Shashank Gothankar', 'Applied Sciences'),
(14, 'Prof.Shashikant Patil', 'Applied Sciences'),
(15, 'Dr. Mala Chatterjee', 'Applied Sciences'),
(16, 'Dr. Pallavi Mahalle', 'Applied Sciences'),
(17, 'Prof.Priyanka Deshmukh', 'Applied Sciences'),
(18, 'Dr. S. K. Chaudhari', 'Applied Sciences'),
(19, 'Prof. Rahul Chaurasiya', 'Applied Sciences'),
(20, 'Dr. Y.S. Patil ', 'Applied Sciences'),
(21, 'Prof.J.Deshmukh', 'Computer Engineering'),
(22, 'Prof.Naina Kaushik', 'Computer Engineering'),
(23, 'Prof.A.Lahane', 'Computer Engineering'),
(24, 'Prof.Sharmila S. Gaikwad', 'Computer Engineering'),
(25, 'Prof. Priya Parate', 'Computer Engineering'),
(26, 'Prof. Kaajal Sharma', 'Computer Engineering'),
(27, 'Prof.Suresh Mestry', 'Computer Engineering'),
(28, 'Prof.D.S.Kale', 'Computer Engineering'),
(29, 'Prof.Priyanka Bhilare', 'Computer Engineering'),
(30, 'Prof. B.M. Patil', 'Computer Engineering'),
(31, 'Prof. Bhavesh Panchal', 'Computer Engineering'),
(32, 'Prof.Dipak Gaikar', 'Computer Engineering'),
(33, 'Prof. Dilip Dalgade', 'Computer Engineering'),
(34, 'Dr. S.Y. Ket', 'Computer Engineering'),
(35, 'Prof.S.P.Khachane', 'Computer Engineering'),
(36, 'Prof.Dnyaneshwar Kapse', 'Computer Engineering'),
(37, 'Prof.Dyaneshwar Dhanagar', 'Computer Engineering'),
(38, 'Prof.Preeti Satao', 'Computer Engineering'),
(39, 'Prof.Sumitra Sadhukhan', 'Computer Engineering'),
(40, 'Prof. P. R. Potdar', 'Mechanical Engineering'),
(41, 'Prof. A. V. Gotmare', 'Mechanical Engineering'),
(42, 'Prof. R. M. Siddiqui', 'Mechanical Engineering'),
(43, 'Dr. A. G. Londhekar', 'Mechanical Engineering'),
(44, 'Prof. N. B. Shahapure', 'Mechanical Engineering'),
(45, 'Prof. R. R. Gujar', 'Mechanical Engineering'),
(46, 'Prof. P. R. Paul', 'Mechanical Engineering'),
(47, 'Prof. C. R. Rane', 'Mechanical Engineering'),
(48, 'Prof. N.J. Panaskar', 'Mechanical Engineering'),
(49, 'Dr. K. M. Chaudhari', 'Mechanical Engineering'),
(50, 'Dr. S. U. Bokade', 'Mechanical Engineering'),
(52, 'Prof. S. R. Sharma', 'Mechanical Engineering'),
(53, 'Prof. V. B. Sawant', 'Mechanical Engineering'),
(54, 'Prof. S. D. Gaikwad', 'Mechanical Engineering'),
(55, 'Prof. D.S. Pandey', 'Mechanical Engineering'),
(56, 'Prof. M. R. Valse', 'Mechanical Engineering'),
(57, 'Prof. R Gujar', 'Mechanical Engineering'),
(58, 'Prof. Nikhil.S', 'Mechanical Engineering'),
(59, 'Prof. R.Y. Kurane', 'Mechanical Engineering'),
(60, 'Dr. R. V. Kale', 'Mechanical Engineering'),
(61, 'Prof. N. K. Deshmukh', 'Mechanical Engineering'),
(62, 'Prof. N. N. Bhostekar', 'Mechanical Engineering'),
(63, 'Prof. A.L.Mangrulkar', 'Mechanical Engineering'),
(66, 'Prof. D. K. Chakradev', 'Mechanical Engineering'),
(69, 'Prof.N.J.Balur', 'Electronics and Telecommunication'),
(70, 'Prof.S.V.Kulkarni', 'Electronics and Telecommunication'),
(72, 'Prof.S.Y.Gothankar', 'Electronics and Telecommunication'),
(73, 'Prof.M.U.Mokashi', 'Electronics and Telecommunication'),
(74, 'Prof. S.D.Patil', 'Electronics and Telecommunication'),
(75, 'Prof. P.N.Dave', 'Electronics and Telecommunication'),
(76, 'Prof.J.R.Mahajan', 'Electronics and Telecommunication'),
(77, 'Prof.M.K.Ahirrao ', 'Electronics and Telecommunication'),
(78, 'Prof.P.N.Sonar', 'Electronics and Telecommunication'),
(81, 'Prof.S.T.Sutar', 'Electronics and Telecommunication'),
(82, 'Prof. P.A.Rokde', 'Electronics and Telecommunication'),
(83, 'Prof.K.G.Sawarkar', 'Electronics and Telecommunication'),
(84, 'Dr.S.D.Deshmukh', 'Electronics and Telecommunication'),
(85, 'Prof.P.S.Patil', 'Electronics and Telecommunication'),
(86, 'Prof.S.R.Bhoyar', 'Electronics and Telecommunication'),
(87, 'Prof.A.R.Sagale', 'Electronics and Telecommunication'),
(88, 'Prof.Ganesh Tilve', 'Electronics and Telecommunication'),
(89, 'Prof.P.G.Pawar', 'Electronics and Telecommunication'),
(91, 'Prof. S.K.Gabhane', 'Electronics and Telecommunication'),
(92, 'Prof.S.S.Repal', 'Electronics and Telecommunication'),
(95, 'Prof.D.Joshi Jain', 'Instumentation Engineering'),
(96, 'Prof.N.S.Chame', 'Instumentation Engineering'),
(97, 'Prof.P.B. Gawande', 'Instumentation Engineering'),
(98, 'Prof. Vinita Vartak', 'Instumentation Engineering'),
(99, 'Prof.S.D.Sadala', 'Instumentation Engineering'),
(100, 'Prof.V.V.Kamankar', 'Instumentation Engineering'),
(101, 'Dr. Rinku Sharma', 'Instumentation Engineering'),
(102, 'Prof.Anuja Kadam', 'Instumentation Engineering'),
(103, 'Prof.R.G.Sharma', 'Instumentation Engineering'),
(104, 'Prof.A.B.Bedke', 'Instumentation Engineering'),
(105, 'Prof.S.P.Sadala', 'Instumentation Engineering'),
(106, 'Prof.V.Kamalakar', 'Instumentation Engineering'),
(107, 'Prof.G.K.Shende', 'Instumentation Engineering'),
(108, 'Prof. Tidve', 'Instumentation Engineering'),
(109, 'Prof. S.K.Sabnis', 'Information Technology'),
(110, 'Prof. Minal Awazekar', 'Information Technology'),
(111, 'Prof. Anushree Deshmukh', 'Information Technology'),
(112, 'Prof. Nilesh Rathod', 'Information Technology'),
(113, 'Prof. Ankush Hutke', 'Information Technology'),
(114, 'Prof. Swapnil Gharat', 'Information Technology'),
(115, 'Prof. Yogita Ganage', 'Information Technology'),
(116, 'Prof. A.E.Patil', 'Information Technology'),
(117, 'Prof. Ankita Malhotra', 'Information Technology'),
(118, 'Dr. S.B.Wankhade', 'Information Technology'),
(119, 'Prof. Ganesh Tilave', 'Information Technology'),
(121, 'Prof. Rinku Sharma', 'Information Technology'),
(122, 'Prof. Govind Wakure', 'Information Technology'),
(123, 'Dr. K. G. Chaudhari', 'Applied Sciences'),
(124, 'Prof. Ankur Ganorkar', 'Electronics and Telecommunication'),
(125, 'Prof.Savita Lade', 'Computer Engineering');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `teacher_name` (`teacher_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
