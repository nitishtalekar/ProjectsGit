-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 09:12 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fb_id` int(200) NOT NULL,
  `teacher_id` varchar(200) NOT NULL,
  `sub_id` varchar(200) NOT NULL,
  `div_id` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `sem` int(10) NOT NULL,
  `sem_no` varchar(10) NOT NULL,
  `score1` varchar(200) NOT NULL,
  `score2` varchar(200) NOT NULL,
  `score3` varchar(200) NOT NULL,
  `score4` varchar(200) NOT NULL,
  `score5` varchar(200) NOT NULL,
  `score6` varchar(200) NOT NULL,
  `score7` varchar(200) NOT NULL,
  `score8` varchar(200) NOT NULL,
  `score9` varchar(200) NOT NULL,
  `score10` varchar(200) NOT NULL,
  `score11` varchar(200) NOT NULL,
  `score12` varchar(200) NOT NULL,
  `remark` varchar(50000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_count`
--

CREATE TABLE `feedback_count` (
  `fc_id` int(200) NOT NULL,
  `teacher_id` varchar(200) NOT NULL,
  `sub_id` varchar(200) NOT NULL,
  `div_id` varchar(200) NOT NULL,
  `question_no` int(200) NOT NULL,
  `count_1` varchar(200) NOT NULL,
  `count_2` varchar(200) NOT NULL,
  `count_3` varchar(200) NOT NULL,
  `count_4` varchar(200) NOT NULL,
  `count_5` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_inst`
--

CREATE TABLE `feedback_inst` (
  `fi_id` int(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `dept` varchar(200) NOT NULL,
  `sem` varchar(200) NOT NULL,
  `div_id` varchar(200) NOT NULL,
  `comment` varchar(50000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_inst_temp`
--

CREATE TABLE `feedback_inst_temp` (
  `fi_temp_id` int(200) NOT NULL,
  `dept` varchar(200) NOT NULL,
  `sem` varchar(200) NOT NULL,
  `div_id` varchar(200) NOT NULL,
  `comment` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_ques`
--

CREATE TABLE `feedback_ques` (
  `fbq_id` int(200) NOT NULL,
  `status` int(100) NOT NULL DEFAULT '0',
  `question` varchar(300) NOT NULL,
  `ans1` varchar(200) NOT NULL,
  `ans2` varchar(200) NOT NULL,
  `ans3` varchar(200) NOT NULL,
  `ans4` varchar(200) NOT NULL,
  `ans5` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_temp`
--

CREATE TABLE `feedback_temp` (
  `fbt_id` int(200) NOT NULL,
  `teacher_id` varchar(200) NOT NULL,
  `sub_id` varchar(200) NOT NULL,
  `div_id` varchar(200) NOT NULL,
  `ques1` varchar(200) NOT NULL,
  `ques2` varchar(200) NOT NULL,
  `ques3` varchar(200) NOT NULL,
  `ques4` varchar(200) NOT NULL,
  `ques5` varchar(200) NOT NULL,
  `ques6` varchar(200) NOT NULL,
  `ques7` varchar(200) NOT NULL,
  `ques8` varchar(200) NOT NULL,
  `ques9` varchar(200) NOT NULL,
  `ques10` varchar(200) NOT NULL,
  `ques11` varchar(200) NOT NULL,
  `ques12` varchar(200) NOT NULL,
  `remark` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mode`
--

CREATE TABLE `mode` (
  `current_mode` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `current_sem` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(200) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `sub_sem` varchar(100) NOT NULL,
  `sub_dept` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(200) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `teacher_dept` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fb_id`),
  ADD UNIQUE KEY `t_id` (`teacher_id`,`sub_id`,`year`,`div_id`) USING BTREE;

--
-- Indexes for table `feedback_count`
--
ALTER TABLE `feedback_count`
  ADD PRIMARY KEY (`fc_id`),
  ADD UNIQUE KEY `count_id` (`teacher_id`,`sub_id`,`question_no`,`div_id`) USING BTREE;

--
-- Indexes for table `feedback_inst`
--
ALTER TABLE `feedback_inst`
  ADD PRIMARY KEY (`fi_id`),
  ADD UNIQUE KEY `institue` (`dept`,`sem`,`div_id`,`year`) USING BTREE;

--
-- Indexes for table `feedback_inst_temp`
--
ALTER TABLE `feedback_inst_temp`
  ADD PRIMARY KEY (`fi_temp_id`);

--
-- Indexes for table `feedback_ques`
--
ALTER TABLE `feedback_ques`
  ADD PRIMARY KEY (`fbq_id`);

--
-- Indexes for table `feedback_temp`
--
ALTER TABLE `feedback_temp`
  ADD PRIMARY KEY (`fbt_id`);

--
-- Indexes for table `mail_addr`
--
ALTER TABLE `mail_addr`
  ADD PRIMARY KEY (`mail_id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Indexes for table `mode`
--
ALTER TABLE `mode`
  ADD UNIQUE KEY `current_mode` (`current_mode`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD UNIQUE KEY `current_sem` (`current_sem`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `teacher_name` (`teacher_name`);

--
-- Indexes for table `teaching`
--
ALTER TABLE `teaching`
  ADD PRIMARY KEY (`lec_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fb_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback_count`
--
ALTER TABLE `feedback_count`
  MODIFY `fc_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback_inst`
--
ALTER TABLE `feedback_inst`
  MODIFY `fi_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `feedback_inst_temp`
--
ALTER TABLE `feedback_inst_temp`
  MODIFY `fi_temp_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback_ques`
--
ALTER TABLE `feedback_ques`
  MODIFY `fbq_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `feedback_temp`
--
ALTER TABLE `feedback_temp`
  MODIFY `fbt_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mail_addr`
--
ALTER TABLE `mail_addr`
  MODIFY `mail_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=616;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `teaching`
--
ALTER TABLE `teaching`
  MODIFY `lec_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
