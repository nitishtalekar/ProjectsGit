-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2020 at 11:37 AM
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
('sarvesh', '1234', 'Sarvesh Wanode');

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

--
-- Dumping data for table `ayurveda`
--

INSERT INTO `ayurveda` (`ayurveda_id`, `ayurveda_name`, `ayurveda_shortintro`, `ayurveda_longintro`, `ayurveda_hours`, `ayurveda_cost`, `ayurveda_tag`, `ayurveda_intro_image`, `ayurveda_contact`, `ayurveda_pdf`) VALUES
(1, 'hi', 'EVERY panther differs from any other panther. Some panthers \r\nare very bold; others are very timid. Some are cunning to the \r\ndegree of being uncanny; others appear quite foolish.', 'I have met \r\npanthers that seemed almost to possess a sixth sense, and acted \r\nand behaved as if they could read and anticipate one’s every \r\nthought. Lastly, but quite rarely, comes the panther that attacks \r\npeople, and more rarely still, the one that eats them. ', '', '', 'Hi', '2', '9876543210', '1'),
(2, 'yo', 'A man-eating beast is generally the outcome of some extra¬ \r\nordinary circumstance. Maybe someone has wounded it, and \r\nit is unable henceforth to hunt its natural prey—other animals \r\n—easily.', 'Therefore, through necessity it begins to eat humans, \r\nbecause they offer an easy prey. Or perhaps a panther has eaten \r\na dead human body which was originally buried in a too-shallow \r\ngrave and later dug up by jackals or a bear. Once having tasted \r\nhuman flesh, the panther often takes a liking to it. Lastly, but \r\nvery rarely indeed, it may have been the cub of a man-eating \r\nmother, who taught it the habit.', '500', '500', 'yo', '1', '1234567890', ''),
(3, 'yo', 'Generally a panther is an inoffensive and quite harmless \r\nanimal that is fearful of human beings and vanishes silently \r\ninto the undergrowth at sight or sound of them.', 'When \r\nwounded, some show an extraordinary degree of ferocity and \r\nbravery. Others again are most cowardly and allow themselves \r\nto be followed up, or even chased like curs. ', '', '', 'yo', '1', '4567890321', ''),
(4, 'yo', 'If from a hill-top you could watch a panther stalking his \r\nprey, he would offer a most entertaining spectacle.', 'You would \r\nsee him taking advantage of every bush, of every tree-trunk, \r\nand of every stone behind which to take cover. He can flatten \r\nhimself to the ground in an amazing fashion. His colouration \r\nrenders him invisible, unless you have the keenest eyesight. \r\nI once watched one through a pair of binoculars and was ', '', '', 'yo', '1', '1234560987', ''),
(5, 'idk', 'Imagine, then, the stillness of the jungle and the stealthy \r\ncoming of the panther as he approaches his kill or stalks the \r\nlive bait that has been tied out for him.', 'If you want to hunt \r\nthe panther, watch very carefully: try to penetrate every bush, \r\nlook into every clump of grass, be careful when you pass a \r\nrock or a boulder, gaze into hollows and ravines. For the \r\npanther may be behind any of these, or be lying in some hole \r\nin the ground. Not only your success, but even your life will \r\ndepend upon your care, for you have pitted your wits against \r\nperhaps the most adept of jungle dwellers and a very dangerous \r\nkiller. ', '', '', 'idk', '1', '1234509876', ''),
(6, 'hi', 'One of the most difficult and exciting pastimes is to try to \r\nhunt the panther on his own terms. This is known as \'still¬ \r\nhunting’. ', 'To still-hunt successfully, you must have a keen sense of the \r\njungle, a soft tread, and an almost panther-like mind; for you \r\nare going to try to circumvent this very cunning animal at his \r\nown game. You are about to hunt him on your own feet—and \r\nremember, he is the most skilful of hunters himself. ', '', '', 'hi', '1', '09891234567', '');

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
(2, 'yoga', '3', 'jahgdhasgsjhgdsjahdgjHSGDJHASGDJHSGDJHSAGDJHASGDJHSAGDJHAGDJHASGDhgdsajhgdajshgd'),
(3, 'retreat', '2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(4, 'meditation', '2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(5, 'philosophy', '2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(6, 'ayurveda', '2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(200) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `Phone` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `Address`, `Email`, `Phone`) VALUES
(1, 'ANew Adam Street, <br />\r\nNew York, <br />\r\nNY 53502dd<br />\r\nNitish', 'info@example.com<br />\r\ncontact@example.com', '+1209<br />\r\n+824');

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

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`en_id`, `en_name`, `en_mail`, `en_subject`, `en_msg`) VALUES
(1, 'Nitish', 'nitish@gmail.com', 'NEWNEW', 'HEllo there yolo');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(10) NOT NULL,
  `gallery_image` varchar(100) NOT NULL,
  `gallery_tag` varchar(100) NOT NULL DEFAULT 'None'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_image`, `gallery_tag`) VALUES
(1, '1', 'app'),
(2, '2', 'hi'),
(3, '3', 'hi'),
(4, '4', 'hi'),
(5, '5', 'app'),
(6, '6', 'img'),
(7, '7', 'yo'),
(8, '2', 'None'),
(9, '2', 'None');

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
(1, 'WELCOME TO YOGA AYURVEDA Karona', 'Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.', '5', '', '1'),
(2, 'Recent Events 1', 'Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.', '', '#', '2'),
(3, 'Recent Events 2', 'Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.', '', '#', '2'),
(4, 'Our Purpose', 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident', 'fa fa-leaf', 'purpose', '3'),
(5, 'Our Goals', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur', 'fa fa-globe', 'goal', '3'),
(6, 'INTRODUCTION', 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident\r\n\r\nVoluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident\r\n\r\nVoluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident', '3', 'https://www.youtube.com/watch?v=R3Ed4zvQ0Hs&list=RDR3Ed4zvQ0Hs&start_radio=1', '4'),
(7, 'What the Yoga Ayurveda Karona Offers', 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.', '', '', '5'),
(8, 'OUR RETREATS', 'Cupiditate placeat cupiditate placeat est ipsam culpa. Delectus quia minima quod. Sunt saepe odit aut quia voluptatem hic voluptas dolor doloremque.\r\n\r\n Ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n Duis aute irure dolor in reprehenderit in voluptate velit.\r\n Facilis ut et voluptatem aperiam. Autem soluta ad fugiat.', '1', '', '6'),
(9, 'OUR YOGA', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n\r\nUllamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '1', '', '6'),
(10, 'AYURVEDA', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n\r\nUllamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '3', '', '6'),
(12, 'MEDITATIONS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n\r\n Ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n Duis aute irure dolor in reprehenderit in voluptate velit.', '1', '', '6'),
(13, 'PHILOSOPHY', 'Cupiditate placeat cupiditate placeat est ipsam culpa. Delectus quia minima quod. Sunt saepe odit aut quia voluptatem hic voluptas dolor doloremque.\r\n\r\n Ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n Duis aute irure dolor in reprehenderit in voluptate velit.\r\n Facilis ut et voluptatem aperiam. Autem soluta ad fugiat.', '1', '', '6');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(10) NOT NULL,
  `image_path` varchar(200) NOT NULL,
  `image_tag` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_path`, `image_tag`) VALUES
(1, '/Shreejit/assets/img/Default.png', ''),
(2, '/Shreejit/assets/img/background-img.png', ''),
(3, '/Shreejit/assets/img/Video.png', ''),
(4, '/Shreejit/assets/img/Profile.png', ''),
(5, '/Shreejit/assets/img/Logo.png', ''),
(6, '/Shreejit/assets/img/test1.jpg', ''),
(7, '/Shreejit/assets/img/test2.jpg', ''),
(8, '/Shreejit/assets/img/team/Profile.png', ''),
(10, '/Shreejit/assets/img/Cddd Db.PNG', '');

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
  `meditation_tag` varchar(200) NOT NULL,
  `meditation_intro_image` varchar(10) NOT NULL,
  `meditation_contact` varchar(200) NOT NULL,
  `meditation_pdf` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meditation`
--

INSERT INTO `meditation` (`meditation_id`, `meditation_name`, `meditation_shortintro`, `meditation_longintro`, `meditation_hours`, `meditation_cost`, `meditation_tag`, `meditation_intro_image`, `meditation_contact`, `meditation_pdf`) VALUES
(1, 'pat ahi hai', 'EVERY panther differs from any other panther. Some panthers \r\nare very bold; others are very timid. Some are cunning to the \r\ndegree of being uncanny; others appear quite foolish.', 'I have met \r\npanthers that seemed almost to possess a sixth sense, and acted \r\nand behaved as if they could read and anticipate one’s every \r\nthought. Lastly, but quite rarely, comes the panther that attacks \r\npeople, and more rarely still, the one that eats them. ', '200', '1000000', 'sas', '2', '9876543210', ''),
(2, 'mood ahi hai', 'A man-eating beast is generally the outcome of some extra¬ \r\nordinary circumstance. Maybe someone has wounded it, and \r\nit is unable henceforth to hunt its natural prey—other animals \r\n—easily.', 'Therefore, through necessity it begins to eat humans, \r\nbecause they offer an easy prey. Or perhaps a panther has eaten \r\na dead human body which was originally buried in a too-shallow \r\ngrave and later dug up by jackals or a bear. Once having tasted \r\nhuman flesh, the panther often takes a liking to it. Lastly, but \r\nvery rarely indeed, it may have been the cub of a man-eating \r\nmother, who taught it the habit.', '', '', 'php', '1', '1234567890', ''),
(3, 'koi to hai', 'Generally a panther is an inoffensive and quite harmless \r\nanimal that is fearful of human beings and vanishes silently \r\ninto the undergrowth at sight or sound of them.', 'When \r\nwounded, some show an extraordinary degree of ferocity and \r\nbravery. Others again are most cowardly and allow themselves \r\nto be followed up, or even chased like curs. ', '', '', 'html', '1', '4567890321', ''),
(4, 'pata hai', 'If from a hill-top you could watch a panther stalking his \r\nprey, he would offer a most entertaining spectacle.', 'You would \r\nsee him taking advantage of every bush, of every tree-trunk, \r\nand of every stone behind which to take cover. He can flatten \r\nhimself to the ground in an amazing fashion. His colouration \r\nrenders him invisible, unless you have the keenest eyesight. \r\nI once watched one through a pair of binoculars and was ', '', '', 'html', '1', '1234560987', '1'),
(5, 'ok', 'Imagine, then, the stillness of the jungle and the stealthy \r\ncoming of the panther as he approaches his kill or stalks the \r\nlive bait that has been tied out for him.', 'If you want to hunt \r\nthe panther, watch very carefully: try to penetrate every bush, \r\nlook into every clump of grass, be careful when you pass a \r\nrock or a boulder, gaze into hollows and ravines. For the \r\npanther may be behind any of these, or be lying in some hole \r\nin the ground. Not only your success, but even your life will \r\ndepend upon your care, for you have pitted your wits against \r\nperhaps the most adept of jungle dwellers and a very dangerous \r\nkiller. ', '', '', 'html', '1', '1234509876', ''),
(6, 'hmmm', 'One of the most difficult and exciting pastimes is to try to \r\nhunt the panther on his own terms. This is known as \'still¬ \r\nhunting’. ', 'To still-hunt successfully, you must have a keen sense of the \r\njungle, a soft tread, and an almost panther-like mind; for you \r\nare going to try to circumvent this very cunning animal at his \r\nown game. You are about to hunt him on your own feet—and \r\nremember, he is the most skilful of hunters himself. ', '', '', 'html', '1', '09891234567', '');

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

CREATE TABLE `pdf` (
  `pdf_id` int(10) NOT NULL,
  `pdf_path` varchar(500) NOT NULL,
  `pdf_tag` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pdf`
--

INSERT INTO `pdf` (`pdf_id`, `pdf_path`, `pdf_tag`) VALUES
(1, '/Shreejit/assets/pdf/P1.pdf', ''),
(2, '/Shreejit/assets/pdf/P5.pdf', ''),
(3, '/Shreejit/assets/pdf/P2.pdf', ''),
(4, '/Shreejit/assets/pdf/P3.pdf', ''),
(5, '/Shreejit/assets/pdf/P4.pdf', '');

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

--
-- Dumping data for table `philosophy`
--

INSERT INTO `philosophy` (`philosophy_id`, `philosophy_name`, `philosophy_shortintro`, `philosophy_longintro`, `philosophy_hours`, `philosophy_cost`, `philosophy_tag`, `philosophy_intro_image`, `philosophy_contact`, `philosophy_pdf`) VALUES
(1, '20 The Black', 'When you have found it, return the same evening and hide \r\nyourself behind a convenient tree-trunk or bush; and then, \r\nwhatever you do, sit perfectly still while keeping a sharp look¬ \r\nout along the paths or sections of fire-line or stream-bed that \r\nare in view.', 'If you are lucky, you may see a hunting panther \r\nwalking along one of these, perhaps looking up now and again \r\ninto the trees in search of a monkey or one of the larger jungle \r\nbirds. It goes without saying, of course, that in such vigils you \r\nmight also spot a tiger, an elephant, or one of the several deer \r\nspecies. \r\n', '100', '50', 'hi', '1', '123456765', ''),
(2, 'www.pdfbooksfree.pk ', 'But let us continue to suppose for the moment that you are \r\nonly after a panther. If you can locate a jungle pool or a salt¬ \r\nlick, it would be convenient to lie down under some cover \r\nbeside it, or behind an ant-hill, if available.', 'ou will derive \r\nmuch entertainment in observing the various denizens of the \r\nforest as they visit such a rendezvous. Don’t be too surprised if, \r\nafter a time, you notice a panther or tiger taking up a some¬ \r\nwhat similar position to your own, although I may warn you \r\nthat it will be very hard for you to become aware of them, so \r\nsilently do they move. As I have already said, such places are \r\nfavoured by carnivora when lying in wait for their natural \r\nfood. ', '', '', 'yo', '2', '', '1'),
(3, 'A Panther’s Way 21 ', 'I remember that I was once lying in the grass behind the \r\ntrunk of a tree overlooking a salt-lick formed in a corner of a \r\nshallow ravine. ', 'Earlier examination had shown that spotted- \r\ndeer and sambar visited this salt-lick in large numbers. It was \r\ngrowing dusk when the faintest of rustles a little behind me \r\ncaused me to turn my head slowly and glance back. There I \r\nsaw a panther regarding me with very evident surprise. Seeing \r\nhe was discovered, he stood up and half-turned around with \r\nthe intention of getting away. Then he looked back at me once \r\nagain, as much as to say, \'Can’t you get to hell out of here?’ \r\nFinally he moved off. ', '', '', 'hi', '1', '', ''),
(4, 'Courtesy ', 'It is fascinating to watch one of these animals with her cubs, \r\nor a tigress with hers. The solicitude of the mother is very \r\nnoticeable.', 'Earlier examination had shown that spotted- \r\ndeer and sambar visited this salt-lick in large numbers. It was \r\ngrowing dusk when the faintest of rustles a little behind me \r\ncaused me to turn my head slowly and glance back. There I \r\nsaw a panther regarding me with very evident surprise. Seeing \r\nhe was discovered, he stood up and half-turned around with \r\nthe intention of getting away. Then he looked back at me once \r\nagain, as much as to say, \'Can’t you get to hell out of here?’ \r\nFinally he moved off. ', '', '', 'yo', '1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `p_id` int(20) NOT NULL,
  `rules` varchar(5000) NOT NULL,
  `terms` varchar(5000) NOT NULL,
  `privacy` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`p_id`, `rules`, `terms`, `privacy`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing el', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing el', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing el');

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

--
-- Dumping data for table `retreats`
--

INSERT INTO `retreats` (`retreat_id`, `retreat_name`, `retreat_shortintro`, `retreat_longintro`, `retreat_hours`, `retreat_cost`, `retreat_intro_image`, `retreat_contact`, `retreat_pdf`) VALUES
(1, 'pat ahi hai', 'EVERY panther differs from any other panther. Some panthers \r\nare very bold; others are very timid. Some are cunning to the \r\ndegree of being uncanny; others appear quite foolish.', 'I have met \r\npanthers that seemed almost to possess a sixth sense, and acted \r\nand behaved as if they could read and anticipate one’s every \r\nthought. Lastly, but quite rarely, comes the panther that attacks \r\npeople, and more rarely still, the one that eats them. ', '1', '100', '2', '9876543210', '1'),
(2, 'mood ahi hai', 'A man-eating beast is generally the outcome of some extra¬ \r\nordinary circumstance. Maybe someone has wounded it, and \r\nit is unable henceforth to hunt its natural prey—other animals \r\n—easily.', 'Therefore, through necessity it begins to eat humans, \r\nbecause they offer an easy prey. Or perhaps a panther has eaten \r\na dead human body which was originally buried in a too-shallow \r\ngrave and later dug up by jackals or a bear. Once having tasted \r\nhuman flesh, the panther often takes a liking to it. Lastly, but \r\nvery rarely indeed, it may have been the cub of a man-eating \r\nmother, who taught it the habit.', '', '', '1', '1234567890', '2'),
(3, 'koi to hai', 'Generally a panther is an inoffensive and quite harmless \r\nanimal that is fearful of human beings and vanishes silently \r\ninto the undergrowth at sight or sound of them.', 'When \r\nwounded, some show an extraordinary degree of ferocity and \r\nbravery. Others again are most cowardly and allow themselves \r\nto be followed up, or even chased like curs. ', '', '', '1', '4567890321', '3'),
(4, 'pata hai', 'If from a hill-top you could watch a panther stalking his \r\nprey, he would offer a most entertaining spectacle.', 'You would \r\nsee him taking advantage of every bush, of every tree-trunk, \r\nand of every stone behind which to take cover. He can flatten \r\nhimself to the ground in an amazing fashion. His colouration \r\nrenders him invisible, unless you have the keenest eyesight. \r\nI once watched one through a pair of binoculars and was ', '', '', '1', '1234560987', '4'),
(5, 'ok', 'Imagine, then, the stillness of the jungle and the stealthy \r\ncoming of the panther as he approaches his kill or stalks the \r\nlive bait that has been tied out for him.', 'If you want to hunt \r\nthe panther, watch very carefully: try to penetrate every bush, \r\nlook into every clump of grass, be careful when you pass a \r\nrock or a boulder, gaze into hollows and ravines. For the \r\npanther may be behind any of these, or be lying in some hole \r\nin the ground. Not only your success, but even your life will \r\ndepend upon your care, for you have pitted your wits against \r\nperhaps the most adept of jungle dwellers and a very dangerous \r\nkiller. ', '', '', '1', '1234509876', ''),
(6, 'hmmm', 'One of the most difficult and exciting pastimes is to try to \r\nhunt the panther on his own terms. This is known as \'still¬ \r\nhunting’. ', 'To still-hunt successfully, you must have a keen sense of the \r\njungle, a soft tread, and an almost panther-like mind; for you \r\nare going to try to circumvent this very cunning animal at his \r\nown game. You are about to hunt him on your own feet—and \r\nremember, he is the most skilful of hunters himself. ', '', '', '1', '09891234567', '');

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
(1, 'gallery', 'app;hi;img;yo'),
(2, 'yoga', 'Tag1;New;Tag2'),
(3, 'ayurveda', 'hi;yo;idk'),
(4, 'philosophy', 'hi;yo'),
(5, 'meditation', 'sas;php;html');

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

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `team_name`, `team_post`, `team_description`, `team_twitter`, `team_facebook`, `team_instagram`, `team_linkedin`, `team_image`) VALUES
(1, 'Walter White', 'CHIEF EXECUTIVE OFFICER', 'Animi est delectus alias quam repellendus nihil nobis dolor. Est sapiente occaecati et dolore. Omnis aut ut nesciunt explicabo qui. Eius nam deleniti ut omnis repudiandae perferendis qui. Neque non quidem sit sed pariatur quia modi ea occaecati. Incidunt ea non est corporis in.', '/www.twitter.com', 'www.facebook.com', 'www.instagram.com', 'www.linkedin.com', '8'),
(2, 'Nitish', 'CEO', 'A LOT of exp', 'asd', 'fhggf', 'sdf', 'drgrdf', '5'),
(3, 'Sarvesh Wanode', 'CFO', 'Has a Lot of knowledge', 'qqq', 'eee', 'wwww', 'rrrr', '7');

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
-- Dumping data for table `yoga`
--

INSERT INTO `yoga` (`yoga_id`, `yoga_name`, `yoga_shortintro`, `yoga_longintro`, `yoga_hours`, `yoga_cost`, `yoga_tag`, `yoga_intro_image`, `yoga_contact`, `yoga_pdf`) VALUES
(1, 'hi', 'EVERY panther differs from any other panther. Some panthers \r\nare very bold; others are very timid. Some are cunning to the \r\ndegree of being uncanny; others appear quite foolish.', 'I have met \r\npanthers that seemed almost to possess a sixth sense, and acted \r\nand behaved as if they could read and anticipate one’s every \r\nthought. Lastly, but quite rarely, comes the panther that attacks \r\npeople, and more rarely still, the one that eats them. ', '100', '0', 'Tag1', '2', '9876543210', ''),
(2, 'yo', 'A man-eating beast is generally the outcome of some extra¬ \r\nordinary circumstance. Maybe someone has wounded it, and \r\nit is unable henceforth to hunt its natural prey—other animals \r\n—easily.', 'Therefore, through necessity it begins to eat humans, \r\nbecause they offer an easy prey. Or perhaps a panther has eaten \r\na dead human body which was originally buried in a too-shallow \r\ngrave and later dug up by jackals or a bear. Once having tasted \r\nhuman flesh, the panther often takes a liking to it. Lastly, but \r\nvery rarely indeed, it may have been the cub of a man-eating \r\nmother, who taught it the habit.', '', '', 'Tag1', '1', '1234567890', '1'),
(3, 'yo', 'Generally a panther is an inoffensive and quite harmless \r\nanimal that is fearful of human beings and vanishes silently \r\ninto the undergrowth at sight or sound of them.', 'When \r\nwounded, some show an extraordinary degree of ferocity and \r\nbravery. Others again are most cowardly and allow themselves \r\nto be followed up, or even chased like curs. ', '', '', 'New', '1', '4567890321', ''),
(4, 'yo', 'If from a hill-top you could watch a panther stalking his \r\nprey, he would offer a most entertaining spectacle.', 'You would \r\nsee him taking advantage of every bush, of every tree-trunk, \r\nand of every stone behind which to take cover. He can flatten \r\nhimself to the ground in an amazing fashion. His colouration \r\nrenders him invisible, unless you have the keenest eyesight. \r\nI once watched one through a pair of binoculars and was ', '', '', 'New', '1', '1234560987', ''),
(5, 'idk', 'Imagine, then, the stillness of the jungle and the stealthy \r\ncoming of the panther as he approaches his kill or stalks the \r\nlive bait that has been tied out for him.', 'If you want to hunt \r\nthe panther, watch very carefully: try to penetrate every bush, \r\nlook into every clump of grass, be careful when you pass a \r\nrock or a boulder, gaze into hollows and ravines. For the \r\npanther may be behind any of these, or be lying in some hole \r\nin the ground. Not only your success, but even your life will \r\ndepend upon your care, for you have pitted your wits against \r\nperhaps the most adept of jungle dwellers and a very dangerous \r\nkiller. ', '', '', 'New', '1', '1234509876', ''),
(6, 'hi', 'One of the most difficult and exciting pastimes is to try to \r\nhunt the panther on his own terms. This is known as \'still¬ \r\nhunting’. ', 'To still-hunt successfully, you must have a keen sense of the \r\njungle, a soft tread, and an almost panther-like mind; for you \r\nare going to try to circumvent this very cunning animal at his \r\nown game. You are about to hunt him on your own feet—and \r\nremember, he is the most skilful of hunters himself. ', '', '', 'Tag2', '1', '09891234567', '');

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
  MODIFY `ayurveda_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `en_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `home_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `meditation`
--
ALTER TABLE `meditation`
  MODIFY `meditation_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pdf`
--
ALTER TABLE `pdf`
  MODIFY `pdf_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `philosophy`
--
ALTER TABLE `philosophy`
  MODIFY `philosophy_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `p_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `retreats`
--
ALTER TABLE `retreats`
  MODIFY `retreat_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `yoga`
--
ALTER TABLE `yoga`
  MODIFY `yoga_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
