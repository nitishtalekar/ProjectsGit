-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2020 at 09:53 PM
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
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(200) NOT NULL,
  `name` varchar(500) NOT NULL,
  `owner_name` varchar(500) NOT NULL,
  `poc` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `landmark` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `website` varchar(500) NOT NULL,
  `payment` varchar(500) NOT NULL,
  `alcohol` varchar(500) NOT NULL,
  `cuisine` varchar(500) NOT NULL,
  `service` varchar(500) NOT NULL,
  `offer` varchar(500) NOT NULL,
  `menu` varchar(500) NOT NULL,
  `img` varchar(500) NOT NULL,
  `fssai_liscence` varchar(500) NOT NULL,
  `fssai_regno` varchar(500) NOT NULL,
  `fssai_addr` varchar(500) NOT NULL,
  `fssai_exp` varchar(500) NOT NULL,
  `kyc` varchar(500) NOT NULL,
  `pan_card` varchar(500) NOT NULL,
  `gstin` varchar(500) NOT NULL,
  `shop_liscence` varchar(500) NOT NULL,
  `outlets` varchar(500) NOT NULL,
  `avg_cost` varchar(500) NOT NULL,
  `primary_area` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
