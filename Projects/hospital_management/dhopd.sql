-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2020 at 01:24 PM
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

--
-- Dumping data for table `dhopd_room`
--

INSERT INTO `dhopd_room` (`room_id`, `room_name`, `room_cost`, `room_bed`, `room_bed_occ`) VALUES
(1, 'General Ward A', '200', '8', '3'),
(2, 'General Ward B', '200', '8', '0'),
(3, 'Special Room 1', '500', '2', '1'),
(4, 'Special Room 2', '500', '2', '0'),
(5, 'Special Room 3', '500', '2', '0'),
(6, 'Special Room 4', '500', '2', '0');

--
-- Dumping data for table `dhopd_service`
--

INSERT INTO `dhopd_service` (`service_id`, `service_name`, `service_cost`) VALUES
(1, 'Consultation', '100'),
(2, 'Free Consultation', '0'),
(3, 'Nebulisation', '200'),
(4, 'E.C.G.', '500'),
(5, 'Bl. Glucose', '300'),
(6, 'Revisit', '50'),
(7, 'Drip', '200'),
(8, 'Vaccine', '0');

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
(8, 'R.T. Charges', '200', 'N'),
(9, 'Catheterisation Charge', '500', 'N'),
(10, 'L.P. Charges', '200', 'N'),
(11, 'Bl Glucose Charge', '200', 'N'),
(12, 'O2 Charges', '200', 'N'),
(13, 'Nebulisation Charge', '300', 'N'),
(14, 'Hospital Drugs Charges', '0', 'N'),
(16, 'Blood Transformation Charge', '1000', 'N'),
(17, 'Other Charge', '200', 'N');

--
-- Dumping data for table `dhopd_users`
--

INSERT INTO `dhopd_users` (`user_id`, `user_name`, `password`, `fname`, `lname`, `pno`, `priority`, `auth`) VALUES
(1, 'wsarvesh', '1234', 'Sarvesh', 'Wanode', '7588926601', 'A', '0'),
(2, 'wsarvesh1', '9422160269', 'h', 'q', '9422160269', 'U', '4'),
(3, 'gudu', '9422160269', 'h', 'q', '9422160269', 'U', '5'),
(4, 'xyz', '1234567890', 'q', 'q', '1234567890', 'U', '3');

--
-- Dumping data for table `dhopd_vaccine`
--

INSERT INTO `dhopd_vaccine` (`vaccine_id`, `vaccine_name`) VALUES
(1, 'hjhjhj'),
(2, 'adafa'),
(3, 'vacc'),
(4, 'Asd');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
