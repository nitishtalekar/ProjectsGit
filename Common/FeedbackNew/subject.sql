-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2020 at 06:04 PM
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
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(200) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `sub_sem` varchar(100) NOT NULL,
  `sub_dept` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`, `sub_sem`, `sub_dept`) VALUES
(1, 'Engineering Maths-1', '1', 'Applied Sciences'),
(2, 'Engineering Physics-1', '1', 'Applied Sciences'),
(3, 'Engineering Chemistry-1', '1', 'Applied Sciences'),
(4, 'Engineering Mechanics', '1', 'Applied Sciences'),
(5, 'BEE', '1', 'Applied Sciences'),
(6, 'Applied Mathematics-1', '3', 'Computer Engineering'),
(7, 'Object Oriented Programming Methodology', '3', 'Computer Engineering'),
(8, 'Data Structures', '3', 'Computer Engineering'),
(9, 'Digital Logic Design & Analysis', '3', 'Computer Engineering'),
(10, 'Discrete Mathematics', '3 ', 'Computer Engineering'),
(11, 'Electronic Circuits', '3', 'Computer Engineering'),
(12, 'Business Communication & Ethics', '5', 'Computer Engineering'),
(13, 'Computer Network', '5', 'Computer Engineering'),
(14, 'Database Management System', '5', 'Computer Engineering'),
(15, 'Microprocessor', '5', 'Computer Engineering'),
(16, 'Theory Of Computer Science', '5', 'Computer Engineering'),
(17, 'Web Design (Lab)', '5', 'Computer Engineering'),
(18, 'Advanced Algorithms', '5', 'Computer Engineering'),
(19, 'Multimedia Systems', '5', 'Computer Engineering'),
(20, 'Artificial Intelligence And Soft Computing', '7', 'Computer Engineering'),
(21, 'Digital Signal And Image Processing', '7', 'Computer Engineering'),
(22, 'Mobile Communication And Computation', '7', 'Computer Engineering'),
(23, 'Big Data Analytics', '7', 'Computer Engineering'),
(24, 'Management Information Systems', '7', 'Computer Engineering'),
(25, 'Cyber Security Laws', '7', 'Computer Engineering'),
(26, 'Thermodynamics', '3', 'Mechanical Engineering'),
(27, 'Strength Of Material', '3', 'Mechanical Engineering'),
(28, 'Computer Aided Machine Drawing', '3', 'Mechanical Engineering'),
(29, 'Production Process', '3', 'Mechanical Engineering'),
(30, 'Material Technology', '3', 'Mechanical Engineering'),
(31, 'Applied Mathematics', '3', 'Mechanical Engineering'),
(32, 'Internal Combustion Engines', '5', 'Mechanical Engineering'),
(33, 'Heat Transfer', '5', 'Mechanical Engineering'),
(34, 'Dynamics Of Machinery', '5', 'Mechanical Engineering'),
(35, 'Mechanical Measurements & Control', '5', 'Mechanical Engineering'),
(36, 'Design Of Jigs & Fixtures', '5', 'Mechanical Engineering'),
(37, 'Press Tool Design', '5', 'Mechanical Engineering'),
(38, 'Manufacturing Science (Lab)', '5', 'Mechanical Engineering'),
(39, 'Business Communication And Ethics', '5', 'Mechanical Engineering'),
(40, 'Production, Planning Control', '7', 'Mechanical Engineering'),
(41, 'CAD-CAM-CAE', '7', 'Mechanical Engineering'),
(42, 'Machine Design-I', '7', 'Mechanical Engineering'),
(43, 'Automobile Engineering', '7', 'Mechanical Engineering'),
(44, 'Energy Audit & Management', '7', 'Mechanical Engineering'),
(45, 'Operation Research', '7', 'Mechanical Engineering'),
(46, 'Digital System Design', '3', 'Electronics and Telecommunication'),
(47, 'Circuit Theory and Networks', '3', 'Electronics and Telecommunication'),
(48, 'Electronic Instrumentation and Control', '3', 'Electronics and Telecommunication'),
(49, 'OOP using JAVA (Lab)', '3', 'Electronics and Telecommunication'),
(50, 'Applied Mathematics', '3', 'Electronics and Telecommunication'),
(51, 'Electronic Devices and Circuits-I', '3', 'Electronics and Telecommunication'),
(55, 'Microprocessor & Peripherals Interfacing', '5', 'Electronics and Telecommunication'),
(56, 'Digital Communication', '5', 'Electronics and Telecommunication'),
(57, 'Electromagnetic Engineering', '5 ', 'Electronics and Telecommunication'),
(58, 'Discrete Time Signal Processing', '5', 'Electronics and Telecommunication'),
(59, 'Microelectronics', '5', 'Electronics and Telecommunication'),
(60, 'Data Compression and Encryption', '5', 'Electronics and Telecommunication'),
(61, 'Business Communication & Ethics', '5', 'Electronics and Telecommunication'),
(63, 'Mobile Communication System', '7', 'Electronics and Telecommunication'),
(64, 'Optical Communication', '7', 'Electronics and Telecommunication'),
(65, 'Microwave Engineering', '7', 'Electronics and Telecommunication'),
(66, 'Cyber Security and Laws', '7', 'Electronics and Telecommunication'),
(67, 'Big Data Analytics', '7', 'Electronics and Telecommunication'),
(68, 'Embedded System', '7', 'Electronics and Telecommunication'),
(69, 'Analog Electronics', '3', 'Instumentation Engineering'),
(70, 'Transducers', '3', 'Instumentation Engineering'),
(71, 'Electrical Networks', '3', 'Instumentation Engineering'),
(72, 'Digital Electronics', '3', 'Instumentation Engineering'),
(73, 'Object Oriented Programming Methodology (OOPM)', '3', 'Instumentation Engineering'),
(74, 'Applied Mathematics', '3', 'Instumentation Engineering'),
(75, 'Application of Microprocessors', '5', 'Instumentation Engineering'),
(76, 'Signal System', '5', 'Instumentation Engineering'),
(77, 'Control System Design', '5', 'Instumentation Engineering'),
(78, 'Control System Components', '5', 'Instumentation Engineering'),
(79, 'Business Communication and Ethics', '5', 'Instumentation Engineering'),
(80, 'Advanced Sensors', '5', 'Instumentation Engineering'),
(81, 'Fiber Optic Instrumentation', '5', 'Instumentation Engineering'),
(82, 'Biomedical Instrumentation', '7', 'Instumentation Engineering'),
(83, 'Industrial Automation', '7', 'Instumentation Engineering'),
(84, 'Reliability Engineering', '7', 'Instumentation Engineering'),
(85, 'Industrial Process Control', '7', 'Instumentation Engineering'),
(86, 'Image Processing', '7', 'Instumentation Engineering'),
(87, 'Data Structures & Analysis', '3', 'Information Technology'),
(88, 'Database Management System', '3', 'Information Technology'),
(89, 'Applied Mathematics', '3', 'Information Technology'),
(90, 'Logic Design', '3', 'Information Technology'),
(91, 'Java Programming', '3', 'Information Technology'),
(92, 'Principles of Communications', '3', 'Information Technology'),
(93, 'Microcontroller & Embedded Programming', '5', 'Information Technology'),
(94, 'E-Commerce & E-Business', '5', 'Information Technology'),
(95, 'Advanced Database Management Technology', '5', 'Information Technology'),
(96, 'Internet Programming', '5', 'Information Technology'),
(97, 'Business Communication and Ethics', '5', 'Information Technology'),
(98, 'Cryptography & Network Security', '5', 'Information Technology'),
(99, 'Management Information System', '7', 'Information Technology'),
(100, 'Artificial Intelligence', '7', 'Information Technology'),
(101, 'Infrastructure Security', '7', 'Information Technology'),
(102, 'Soft Computing', '7', 'Information Technology'),
(103, 'Enterprise Network Design', '7', 'Information Technology'),
(104, 'Software Testing Quality Assurance', '7', 'Information Technology'),
(105, 'Engineering Maths - 2', '2', 'Applied Sciences'),
(106, 'Engineering Physics - 2', '2', 'Applied Sciences'),
(107, 'Engineering Chemistry - 2', '2', 'Applied Sciences'),
(108, 'Engineering Graphics', '2', 'Applied Sciences'),
(109, 'C - Programming', '2', 'Applied Sciences'),
(110, 'PCE - 1', '2', 'Applied Sciences'),
(111, 'Applied Mathematics', '4', 'Computer Engineering'),
(112, 'Analysis Of Algorithm', '4', 'Computer Engineering'),
(113, 'Computer Organization & Architecture', '4', 'Computer Engineering'),
(114, 'Operating System', '4', 'Computer Engineering'),
(115, 'Computer graphics', '4', 'Computer Engineering'),
(116, 'Open Source Lab (Python)', '4', 'Computer Engineering'),
(117, 'System Programming and Compiler Construction', '6', 'Computer Engineering'),
(118, 'Software Engineering', '6', 'Computer Engineering'),
(119, 'Data Warehouse and Mining', '6', 'Computer Engineering'),
(120, 'Cryptography and System Security', '6', 'Computer Engineering'),
(121, 'Machine Learning', '6', 'Computer Engineering'),
(122, 'Natural Language Processing', '8', 'Computer Engineering'),
(123, 'Human Machine Interaction', '8', 'Computer Engineering'),
(124, 'Distributed Computing', '8', 'Computer Engineering'),
(125, 'CCL (Lab)', '8', 'Computer Engineering'),
(126, 'PM', '8', 'Computer Engineering'),
(127, 'DBM', '8', 'Computer Engineering'),
(128, 'RM', '8', 'Computer Engineering'),
(129, 'Kinematics of Machinery', '4', 'Mechanical Engineering'),
(130, 'Fluid Mechanics', '4', 'Mechanical Engineering'),
(131, 'Industrial Electronics', '4', 'Mechanical Engineering'),
(132, 'Database Information and Retrival', '4', 'Mechanical Engineering'),
(133, 'Product Planning - 2', '4', 'Mechanical Engineering'),
(134, 'Applied Mathematics', '4', 'Mechanical Engineering'),
(135, 'Refrigeration and Airconditioning', '6', 'Mechanical Engineering'),
(136, 'Machine Design - 1', '6', 'Mechanical Engineering'),
(137, 'Metrology and Quality Engineering', '6', 'Mechanical Engineering'),
(138, 'Finite Element Analysis', '6', 'Mechanical Engineering'),
(139, 'Industrial Automation', '6', 'Mechanical Engineering'),
(140, 'Mechatronics', '6', 'Mechanical Engineering'),
(141, 'Design pf Mechanical Systems', '8', 'Mechanical Engineering'),
(142, 'Power Engineering', '8', 'Mechanical Engineering'),
(143, 'Industrial Engineering and Management', '8', 'Mechanical Engineering'),
(144, 'Rapid Prototyping', '8', 'Mechanical Engineering'),
(145, 'Project Management', '8', 'Mechanical Engineering'),
(146, 'Research Management', '8', 'Mechanical Engineering'),
(147, 'Finance Management', '8', 'Mechanical Engineering'),
(148, 'Principles of Communication', '4', 'Electronics and Telecommunication'),
(149, 'Signals and Systems', '4', 'Electronics and Telecommunication'),
(150, 'Electronic Devices and Circuits-II', '4', 'Electronics and Telecommunication'),
(151, 'Linear Integrated Circuits', '4', 'Electronics and Telecommunication'),
(152, 'Applied Mathematics', '4', 'Electronics and Telecommunication'),
(153, 'IPVM', '6', 'Electronics and Telecommunication'),
(154, 'Antennas and Wave Propagation', '6', 'Electronics and Telecommunication'),
(155, 'Computer Communication Networks', '6', 'Electronics and Telecommunication'),
(156, 'Database Management System', '6', 'Electronics and Telecommunication'),
(157, 'DVLS I', '6', 'Electronics and Telecommunication'),
(158, 'Satellite Communication', '8', 'Electronics and Telecommunication'),
(159, 'Network Management in Telecommunication', '8', 'Electronics and Telecommunication'),
(160, 'Wireless Network', '8', 'Electronics and Telecommunication'),
(161, 'Finance Management', '8', 'Electronics and Telecommunication'),
(162, 'Enterprise Development Management', '8', 'Electronics and Telecommunication'),
(163, 'Research Metrology', '8', 'Electronics and Telecommunication'),
(164, 'R.F.D.', '8', 'Electronics and Telecommunication'),
(165, 'Transducer-II', '4', 'Instumentation Engineering'),
(166, 'Feedback Control System', '4', 'Instumentation Engineering'),
(167, 'Analytical Instrumentation', '4', 'Instumentation Engineering'),
(168, 'Signal Conditioning circuit Design', '4', 'Instumentation Engineering'),
(169, 'Application Software Practice', '4', 'Instumentation Engineering'),
(170, 'Applied Mathematics', '4', 'Instumentation Engineering'),
(171, 'Process Instrumentation Systems', '6', 'Instumentation Engineering'),
(172, 'Industrial data communication', '6', 'Instumentation Engineering'),
(173, 'Digital Signal Processing ', '6', 'Instumentation Engineering'),
(174, 'Advanced Control System', '6', 'Instumentation Engineering'),
(175, 'Electrical Machines and Drives', '6', 'Instumentation Engineering'),
(176, 'Biomedical sensors and signal processing', '6', 'Instumentation Engineering'),
(177, 'Nuclear Instrumentation', '6', 'Instumentation Engineering'),
(178, 'Instrumentation Project Documentation and Execution', '8', 'Instumentation Engineering'),
(179, 'Instrument and system design', '8', 'Instumentation Engineering'),
(180, 'Power plant instrumentation', '8', 'Instumentation Engineering'),
(181, 'Internet of Things', '8', 'Instumentation Engineering'),
(182, 'Environment Management', '8', 'Instumentation Engineering'),
(183, 'Research Methodology', '8', 'Instumentation Engineering'),
(184, 'Project Management', '8', 'Instumentation Engineering'),
(185, 'Digital Business Managment', '8', 'Instumentation Engineering'),
(186, 'Automata Theory', '4', 'Information Technology'),
(187, 'Python', '4', 'Information Technology'),
(188, 'Applied Mathematics-', '4', 'Information Technology'),
(189, 'Computer Networks', '4', 'Information Technology'),
(190, 'Computer Organization and Architecture', '4', 'Information Technology'),
(191, 'Operating System', '4', 'Information Technology'),
(192, 'Cloud Computing & Services', '6', 'Information Technology'),
(193, 'Software Engineering with Project Management', '6', 'Information Technology'),
(194, 'Advance Internet Programming', '6', 'Information Technology'),
(195, 'Green IT', '6', 'Information Technology'),
(196, 'Data Mining and Business Intelligence', '6', 'Information Technology'),
(197, 'Wireless Networks', '6', 'Information Technology'),
(198, 'Knowledge Management', '8', 'Information Technology'),
(199, 'Big Data Analytics', '8', 'Information Technology'),
(200, 'Internet of Everything', '8', 'Information Technology'),
(201, 'Research Methodology', '8', 'Information Technology'),
(202, 'Finance Management', '8', 'Information Technology');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
