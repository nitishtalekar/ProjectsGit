-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2020 at 04:38 PM
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
-- Database: `yoga_ayurveda`
--

-- --------------------------------------------------------

--
-- Table structure for table `yoga`
--

CREATE TABLE `ayurveda` (
  `ayurveda_id` int(11) NOT NULL,
  `ayurveda_name` varchar(200) NOT NULL,
  `ayurveda_shortintro` varchar(1000) NOT NULL,
  `ayurveda_longintro` varchar(1000) NOT NULL,
  `ayurveda_tag` varchar(200) NOT NULL,
  `ayurveda_intro_image` varchar(10) NOT NULL,
  `ayurveda_images` varchar(500) NOT NULL,
  `ayurveda_contact` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yoga`
--

INSERT INTO `ayurveda` (`ayurveda_id`, `ayurveda_name`, `ayurveda_shortintro`, `ayurveda_longintro`, `ayurveda_tag`, `ayurveda_intro_image`, `ayurveda_images`, `ayurveda_contact`) VALUES
(1, 'hi', 'EVERY panther differs from any other panther. Some panthers \r\nare very bold; others are very timid. Some are cunning to the \r\ndegree of being uncanny; others appear quite foolish.', 'I have met \r\npanthers that seemed almost to possess a sixth sense, and acted \r\nand behaved as if they could read and anticipate one’s every \r\nthought. Lastly, but quite rarely, comes the panther that attacks \r\npeople, and more rarely still, the one that eats them. ', 'Hi', '2', '', '9876543210'),
(2, 'yo', 'A man-eating beast is generally the outcome of some extra¬ \r\nordinary circumstance. Maybe someone has wounded it, and \r\nit is unable henceforth to hunt its natural prey—other animals \r\n—easily.', 'Therefore, through necessity it begins to eat humans, \r\nbecause they offer an easy prey. Or perhaps a panther has eaten \r\na dead human body which was originally buried in a too-shallow \r\ngrave and later dug up by jackals or a bear. Once having tasted \r\nhuman flesh, the panther often takes a liking to it. Lastly, but \r\nvery rarely indeed, it may have been the cub of a man-eating \r\nmother, who taught it the habit.', 'yo', '1', '', '1234567890'),
(3, 'yo', 'Generally a panther is an inoffensive and quite harmless \r\nanimal that is fearful of human beings and vanishes silently \r\ninto the undergrowth at sight or sound of them.', 'When \r\nwounded, some show an extraordinary degree of ferocity and \r\nbravery. Others again are most cowardly and allow themselves \r\nto be followed up, or even chased like curs. ', 'yo', '1', '', '4567890321'),
(4, 'yo', 'If from a hill-top you could watch a panther stalking his \r\nprey, he would offer a most entertaining spectacle.', 'You would \r\nsee him taking advantage of every bush, of every tree-trunk, \r\nand of every stone behind which to take cover. He can flatten \r\nhimself to the ground in an amazing fashion. His colouration \r\nrenders him invisible, unless you have the keenest eyesight. \r\nI once watched one through a pair of binoculars and was ', 'yo', '1', '', '1234560987'),
(5, 'idk', 'Imagine, then, the stillness of the jungle and the stealthy \r\ncoming of the panther as he approaches his kill or stalks the \r\nlive bait that has been tied out for him.', 'If you want to hunt \r\nthe panther, watch very carefully: try to penetrate every bush, \r\nlook into every clump of grass, be careful when you pass a \r\nrock or a boulder, gaze into hollows and ravines. For the \r\npanther may be behind any of these, or be lying in some hole \r\nin the ground. Not only your success, but even your life will \r\ndepend upon your care, for you have pitted your wits against \r\nperhaps the most adept of jungle dwellers and a very dangerous \r\nkiller. ', 'idk', '1', '', '1234509876'),
(6, 'hi', 'One of the most difficult and exciting pastimes is to try to \r\nhunt the panther on his own terms. This is known as \'still¬ \r\nhunting’. ', 'To still-hunt successfully, you must have a keen sense of the \r\njungle, a soft tread, and an almost panther-like mind; for you \r\nare going to try to circumvent this very cunning animal at his \r\nown game. You are about to hunt him on your own feet—and \r\nremember, he is the most skilful of hunters himself. ', 'hi', '1', '', '09891234567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `yoga`
--
ALTER TABLE `ayurveda`
  ADD PRIMARY KEY (`ayurveda_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `yoga`
--
ALTER TABLE `ayurveda`
  MODIFY `ayurveda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
