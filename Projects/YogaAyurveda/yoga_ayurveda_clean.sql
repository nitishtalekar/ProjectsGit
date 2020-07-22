-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2020 at 12:08 PM
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
-- Database: `yoga_ayurveda`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `admin_name`) VALUES
('nitish', 'nitish503', 'Nitish Talekar'),
('sarvesh', '1234', 'Sarvesh Wanode'),
('shreejit', 'shreejit302', 'Shreejit Ghadigaonkar');

-- --------------------------------------------------------

--
-- Table structure for table `ayurveda`
--

CREATE TABLE `ayurveda` (
  `ayurveda_id` int(50) NOT NULL,
  `ayurveda_name` varchar(200) NOT NULL,
  `ayurveda_shortintro` varchar(1000) NOT NULL,
  `ayurveda_longintro` varchar(2000) NOT NULL,
  `ayurveda_hours` varchar(200) NOT NULL,
  `ayurveda_cost` varchar(200) NOT NULL,
  `ayurveda_tag` varchar(200) NOT NULL,
  `ayurveda_intro_image` varchar(10) NOT NULL,
  `ayurveda_contact` varchar(200) NOT NULL,
  `ayurveda_pdf` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `background`
--

CREATE TABLE `background` (
  `bg_id` int(200) NOT NULL,
  `bg_page` varchar(200) NOT NULL,
  `bg_img` varchar(500) NOT NULL,
  `bg_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `background`
--

INSERT INTO `background` (`bg_id`, `bg_page`, `bg_img`, `bg_description`) VALUES
(1, 'home', '2', ''),
(2, 'yoga', '0', ''),
(3, 'retreat', '0', ''),
(4, 'meditation', '0', ''),
(5, 'philosophy', '0', ''),
(6, 'ayurveda', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(200) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `Phone` varchar(500) NOT NULL,
  `Facebook` varchar(200) NOT NULL,
  `Youtube` varchar(200) NOT NULL,
  `Instagram` varchar(200) NOT NULL,
  `About` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `Address`, `Email`, `Phone`, `Facebook`, `Youtube`, `Instagram`, `About`) VALUES
(1, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `en_id` int(200) NOT NULL,
  `en_name` varchar(200) NOT NULL,
  `en_mail` varchar(200) NOT NULL,
  `en_subject` varchar(200) NOT NULL,
  `en_msg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(10) NOT NULL,
  `gallery_image` varchar(100) NOT NULL,
  `gallery_tag` varchar(100) NOT NULL DEFAULT 'None'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `home_id` int(10) NOT NULL,
  `home_title` varchar(500) NOT NULL,
  `home_description` varchar(500) NOT NULL,
  `home_image` varchar(200) NOT NULL,
  `home_link` varchar(500) NOT NULL,
  `home_tag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`home_id`, `home_title`, `home_description`, `home_image`, `home_link`, `home_tag`) VALUES
(1, 'WELCOME TO YOGA AYURVEDA Karona', 'Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.', '0', '', '1'),
(2, 'Our Purpose', 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non providentasdasd', 'fa fa-leaf', 'purpose', '3'),
(3, 'Our Goals', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur', 'fa fa-globe', 'goal', '3'),
(4, 'INTRODUCTION', 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident\r\n\r\nVoluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident\r\n\r\nVoluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident', '0', '', '4'),
(5, 'What the Yoga Ayurveda Karona Offers', 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.', '', '', '5'),
(6, 'OUR RETREATS', 'Cupiditate placeat cupiditate placeat est ipsam culpa. Delectus quia minima quod. Sunt saepe odit aut quia voluptatem hic voluptas dolor doloremque.\r\n\r\n Ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n Duis aute irure dolor in reprehenderit in voluptate velit.\r\n Facilis ut et voluptatem aperiam. Autem soluta ad fugiat.', '0', '', '6'),
(7, 'OUR YOGA', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n\r\nUllamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '0', '', '6'),
(8, 'AYURVEDA', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n\r\nUllamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '0', '', '6'),
(9, 'MEDITATIONS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n\r\n Ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n Duis aute irure dolor in reprehenderit in voluptate velit.', '0', '', '6'),
(10, 'PHILOSOPHY', 'Cupiditate placeat cupiditate placeat est ipsam culpa. Delectus quia minima quod. Sunt saepe odit aut quia voluptatem hic voluptas dolor doloremque.\r\n\r\n Ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n Duis aute irure dolor in reprehenderit in voluptate velit.\r\n Facilis ut et voluptatem aperiam. Autem soluta ad fugiat.', '0', '', '6'),
(11, 'Yoga Ayurveda', '', '0', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(10) NOT NULL,
  `image_path` varchar(200) NOT NULL,
  `image_tag` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meditation`
--

CREATE TABLE `meditation` (
  `meditation_id` int(50) NOT NULL,
  `meditation_name` varchar(200) NOT NULL,
  `meditation_shortintro` varchar(1000) NOT NULL,
  `meditation_longintro` varchar(2000) NOT NULL,
  `meditation_hours` varchar(200) NOT NULL,
  `meditation_cost` varchar(200) NOT NULL,
  `meditation_tag` varchar(200) NOT NULL DEFAULT 'None',
  `meditation_intro_image` varchar(10) NOT NULL,
  `meditation_contact` varchar(200) NOT NULL,
  `meditation_pdf` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

CREATE TABLE `pdf` (
  `pdf_id` int(10) NOT NULL,
  `pdf_path` varchar(500) NOT NULL,
  `pdf_tag` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `philosophy`
--

CREATE TABLE `philosophy` (
  `philosophy_id` int(50) NOT NULL,
  `philosophy_name` varchar(200) NOT NULL,
  `philosophy_shortintro` varchar(1000) NOT NULL,
  `philosophy_longintro` varchar(2000) NOT NULL,
  `philosophy_hours` varchar(200) NOT NULL,
  `philosophy_cost` varchar(200) NOT NULL,
  `philosophy_tag` varchar(200) NOT NULL,
  `philosophy_intro_image` varchar(10) NOT NULL,
  `philosophy_contact` varchar(200) NOT NULL,
  `philosophy_pdf` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `p_id` int(20) NOT NULL,
  `rules` varchar(5000) NOT NULL,
  `rules_pdf` int(50) NOT NULL,
  `terms` varchar(5000) NOT NULL,
  `terms_pdf` int(50) NOT NULL,
  `privacy` varchar(5000) NOT NULL,
  `privacy_pdf` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`p_id`, `rules`, `rules_pdf`, `terms`, `terms_pdf`, `privacy`, `privacy_pdf`) VALUES
(1, '', 0, '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `retreats`
--

CREATE TABLE `retreats` (
  `retreat_id` int(50) NOT NULL,
  `retreat_name` varchar(200) NOT NULL,
  `retreat_shortintro` varchar(1000) NOT NULL,
  `retreat_longintro` varchar(2000) NOT NULL,
  `retreat_hours` varchar(200) NOT NULL,
  `retreat_cost` varchar(200) NOT NULL,
  `retreat_intro_image` varchar(10) NOT NULL,
  `retreat_contact` varchar(200) NOT NULL,
  `retreat_pdf` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(50) NOT NULL,
  `tag_page` varchar(200) NOT NULL,
  `tag_names` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_page`, `tag_names`) VALUES
(1, 'gallery', 'X'),
(2, 'yoga', 'X'),
(3, 'ayurveda', 'X'),
(4, 'philosophy', 'X'),
(5, 'meditation', 'X');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(10) NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `team_post` varchar(200) NOT NULL,
  `team_description` varchar(500) NOT NULL,
  `team_twitter` varchar(500) NOT NULL,
  `team_facebook` varchar(500) NOT NULL,
  `team_instagram` varchar(500) NOT NULL,
  `team_linkedin` varchar(500) NOT NULL,
  `team_image` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `yoga`
--

CREATE TABLE `yoga` (
  `yoga_id` int(50) NOT NULL,
  `yoga_name` varchar(200) NOT NULL,
  `yoga_shortintro` varchar(1000) NOT NULL,
  `yoga_longintro` varchar(2000) NOT NULL,
  `yoga_hours` varchar(200) NOT NULL,
  `yoga_cost` varchar(200) NOT NULL,
  `yoga_tag` varchar(200) NOT NULL,
  `yoga_intro_image` varchar(10) NOT NULL,
  `yoga_contact` varchar(200) NOT NULL,
  `yoga_pdf` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `ayurveda`
--
ALTER TABLE `ayurveda`
  ADD PRIMARY KEY (`ayurveda_id`);

--
-- Indexes for table `background`
--
ALTER TABLE `background`
  ADD PRIMARY KEY (`bg_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`en_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `meditation`
--
ALTER TABLE `meditation`
  ADD PRIMARY KEY (`meditation_id`);

--
-- Indexes for table `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`pdf_id`);

--
-- Indexes for table `philosophy`
--
ALTER TABLE `philosophy`
  ADD PRIMARY KEY (`philosophy_id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `retreats`
--
ALTER TABLE `retreats`
  ADD PRIMARY KEY (`retreat_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `yoga`
--
ALTER TABLE `yoga`
  ADD PRIMARY KEY (`yoga_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ayurveda`
--
ALTER TABLE `ayurveda`
  MODIFY `ayurveda_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `background`
--
ALTER TABLE `background`
  MODIFY `bg_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `en_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `home_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meditation`
--
ALTER TABLE `meditation`
  MODIFY `meditation_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pdf`
--
ALTER TABLE `pdf`
  MODIFY `pdf_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `philosophy`
--
ALTER TABLE `philosophy`
  MODIFY `philosophy_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `p_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `retreats`
--
ALTER TABLE `retreats`
  MODIFY `retreat_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `yoga`
--
ALTER TABLE `yoga`
  MODIFY `yoga_id` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
