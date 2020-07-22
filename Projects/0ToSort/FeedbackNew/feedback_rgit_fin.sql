-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2019 at 03:28 AM
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
-- Database: `feedback_rgit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `password`) VALUES
('feedback_admin', 'mctrgit123');

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

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fb_id`, `teacher_id`, `sub_id`, `div_id`, `year`, `score1`, `score2`, `score3`, `score4`, `score5`, `score6`, `score7`, `score8`, `score9`, `score10`, `score11`, `score12`, `remark`) VALUES
(1, '5', '6', 'A', '2019', '4', '4', '4', '4', '4', '4', '5', '4', '5', '4', '4', '5', '0-0good0-0--0-0INSTITUTE:\r\nVERY POOR VENTILATION\r\n0-0Institute:- ventilation is  very poor please improve light connections\r\n                 0-0Good command over the subject but should not take tutorials seriously!0-0--0-0--0-0--0-0--0-0Very good 0-0Her explaination are excellent & also clears our doubts.0-0Depth of knowledge is good but sometimes speed of teaching is fast.0-0--0-0--0-0--0-0I guess there  is nothing bad i can say.0-0--0-0--0-0Almost good, but sometimes explanation is not so good.0-0--0-0--0-0--'),
(2, '32', '7', 'A', '2019', '2', '2', '3', '3', '2', '3', '4', '4', '4', '5', '4', '4', '0-0Institute:\r\nThe labs are not properly equipped,\r\nThe ventilation is not proper atleast provide the classrooms with vents,\r\nThe PCs are really slow, printers not available,\r\nHalf of the PCs dont work\r0-0He doesnt the subject quite well0-0--0-0PCs are very slow \r\nsome PCs are not even in working condition0-0Needs to improve his English .Fails to explain the concepts well. Doesnot have command over the class .Lacks adequate knowledge in the subject. Should be more organised and focus on relevant things ov0-0--0-0--0-0--0-0--0-0good\r\n0-0--0-0Has the depth of knowledge but cant explain well enough.0-0--0-0Not so much interactive and sometimes fail to help us with the questions like the submission dates.0-0--0-0He needs to teach by taking more Examples. The infrastructure of OOPM Lab is not satisfactory  (Some of the Pcs DONT WORK).I would recommend instead of Assignments we would like to have projects excl0-0--0-0--0-0Does not know in depth knowledge of the subject. Always writes every program by seeing into the notebook. Mostly talks in tapori language.0-0Not able to explain the topics to us and usually makes mistakes while explaining. 0-0--0-0--'),
(3, '33', '8', 'A', '2019', '5', '5', '5', '5', '5', '5', '5', '4', '5', '5', '5', '5', '0-0Institute:\r\nThe labs are not properly equipped,\r\nThe ventilation is not proper atleast provide the classrooms with vents,\r\nThe PCs are really slow, printers not available,\r\nHalf of the PCs dont work\r0-0--0-0--0-0institute:- plz improve the lab conditions0-0Excellent command over the subject . Encourages us to do new things and learn new things .Very supportive .The best teacher in comps !0-0--0-0EXCELLENT..!0-0--0-0--0-0Excellent0-0His explainations are exceedingly well. He also makes us to think to solve problems due to which interest in that subject increases.0-0Has the depth of knowledge and explains the concept well. Also creates interest towards subject.0-0--0-0--0-0note:\r\ninfrastrure is very poor\r\npc are not working0-0Sir is outstanding. only issue is related to infrastructure of Data Structure Lab.\r\nthe PCs are really old. due to high humidity it sometimes suffocated, hence i would like to recommend installation 0-0learning Data structure...never had been boring.....its very interesting...due to This SIR0-0--0-0Every thing is perfect.\r\n0-0--0-0--0-0--'),
(4, '37', '9', 'A', '2019', '4', '4', '4', '5', '4', '5', '5', '5', '4', '4', '5', '5', '0-0Institute:\r\nThe labs are not properly equipped,\r\nThe ventilation is not proper atleast provide the classrooms with vents,\r\nThe PCs are really slow, printers not available,\r\nHalf of the PCs dont work\r0-0--0-0--0-0--0-0Perfect !0-0--0-0--0-0--0-0Heplful and generous.0-0very good0-0--0-0Is very friendly with students. Very helpful as a class advisor.0-0--0-0--0-0washroom are unhygienic 0-0Well met best Sir till Date.0-0--0-0--0-0Everything is perfect.0-0--0-0--0-0--'),
(5, '39', '10', 'A', '2019', '4', '4', '4', '4', '4', '5', '4', '4', '5', '4', '4', '5', '0-0Institute:\r\nThe labs are not properly equipped,\r\nThe ventilation is not proper atleast provide the classrooms with vents,\r\nThe PCs are really slow, printers not available,\r\nHalf of the PCs dont work\r0-0--0-0--0-0--0-0Perfect !0-0--0-0--0-0--0-0--0-0Good\r\n0-0--0-0--0-0--0-0--0-0--0-0nothing here.0-0--0-0--0-0Cant explains well.\r\n 0-0--0-0--0-0--'),
(6, '117', '11', 'A', '2019', '2', '2', '2', '2', '2', '3', '4', '4', '4', '4', '4', '4', '0-0Institute:\r\nThe labs are not properly equipped,\r\nThe ventilation is not proper atleast provide the classrooms with vents,\r\nThe PCs are really slow, printers not available,\r\nHalf of the PCs dont work\r0-0--0-0--0-0--0-0Perfect !0-0--0-0--0-0--0-0--0-0Teacher needs to explain more clearly and definite 0-0--0-0Has the depth of knowledge but cant explain the topic well . Also she is very rude with students often.0-0--0-0--0-0should work on teaching methodology0-0Well i would say i learnt 35% of my syllabus. She needs a lot of work in conveying the theory.0-0IN THIS 3rd SEMISTER....the only subject which i havent understood ....is eccf...teacher was unable to make this subject interesting.....0-0--0-0Very much bad at teaching. Targets our class and personly says she will deduct marks of internal.0-0She has knowledge infact a lots of knowledge but she doesnt know how to teach us the subject. She uses very high level terms that are difficult to understand.0-0--0-0--'),
(7, '5', '6', 'B', '2019', '4', '4', '4', '4', '4', '4', '5', '5', '5', '5', '4', '5', '0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0depth knowledge of the subject0-0The tutorials should ITSELF EXPLAIN application of the in the Practical scenario.\r\nKEEP THE QUESTIONS SAME JUST CHANGE THE FRAMING TO MAKE IT MORE INTERESTING AND USEFUL IN Computer science0-0uses complex terms to explain any concept. if doubts are raised we are told to ask our classmates. for direct second year students, doubts regarding concepts taught in first year are left uncleared.0-0GOOD 0-0Always gives unnecessary suggestions on a very little and useless ocassions that happen in the class\r\n0-0overall ausome0-0good knowledge of subject'),
(8, '33', '7', 'B', '2019', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '4', '5', '0-0--0-0--0-0--0-0He is the best at it.0-0--0-0...0-0--0-0--0-0--0-0Best SIR!!!!0-0--0-0--0-0--0-0very good\r\n\r\n0-0--0-0--0-0Really Awesome!!!!!!!!!!!!!!!!0-0--0-0TEACHING SPEED IS FAST \r\nWEAK STUDENTS LIKE ME CANT MATCH IT0-0Should be practical teacher for every batch0-0ausome sir for oopm but he should also take ds0-0excellent sir has good knowledge'),
(9, '38', '8', 'B', '2019', '4', '3', '4', '4', '4', '4', '5', '4', '5', '4', '5', '5', '0-0--0-0--0-0--0-0--0-0--0-0........0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0The pace of the topics should be more fast.0-0--0-0--0-0IT feels that she doesnt have enough knowledge about the subject0-0yes mam is always late and not able to teach us properly she always explains toics but never write and explains programs due to this i am not able to understand subject properly   i wold suggest dont 0-0excellent sir has good knowledge'),
(10, '34', '9', 'B', '2019', '3', '3', '3', '3', '3', '3', '5', '4', '5', '4', '4', '5', '0-0--0-0--0-0need to improve teaching skills0-0Her notes are good.0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0need some progress\r\n0-0Madam make the subject boring and no one feels excited to attend the lecture because of lack of teaching quality.0-0should find a better way of creating interests in students0-0--0-0explanation of many topics are not up to the mark.  Often mistakes are made during teaching 0-0--0-0IT feels that she doesnt have enough knowledge about the subject0-0mam teaches well but due to lag in syllabus she tries to rush and all is messed up but she is ausome and due to massbunk some students didnit like them  as per me she is proper0-0--'),
(11, '39', '10', 'B', '2019', '4', '4', '4', '4', '4', '4', '5', '4', '5', '4', '4', '5', '0-0--0-0--0-0need to develop teaching interests in students\r\n0-0Her notes are good.0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0Teacher makes the subject boring.0-0--0-0--0-0--0-0--0-0--0-0mam is ausome i would like to have mam to take subjects in further sems she is ausome0-0--'),
(12, '124', '11', 'B', '2019', '5', '5', '4', '5', '5', '4', '5', '5', '5', '4', '5', '5', '0-0--0-0--0-0--0-0He has really good notes.0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0Really Great Sir!!!!!!!!!!!!0-0--0-0--0-0very good teacher of this institute0-0sur is ausome in teaching but he doesnt teach us topics he teaches us just q and a what will be comming and are imp0-0excellent sir , good knowlede of subject and understanding'),
(13, '14', '12', 'A', '2019', '5', '4', '5', '4', '4', '5', '5', '4', '5', '4', '5', '5', '0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0very helpfull sir0-0Good Teacher for communication subject!0-0good0-0--0-0perfect0-0--0-0--0-0--0-0good overall'),
(14, '35', '13', 'A', '2019', '4', '4', '4', '4', '4', '4', '4', '3', '4', '3', '5', '4', '0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0sir is very kind in nature,helps weak students0-0--0-0good0-0--0-0--0-0--0-0--0-0--0-0good overall'),
(15, '25', '14', 'A', '2019', '5', '5', '5', '4', '4', '5', '5', '4', '4', '4', '5', '5', '0-0--0-0--0-0PARADOX STATEMENT WHILE TEACHING0-0--0-0--0-0--0-0--0-0maam is very helpfull and caring0-0Very helpful and knowledgeable . Covered almost everything!0-0--0-0--0-0--0-0--0-0--0-0--0-0good overall'),
(16, '36', '15', 'A', '2019', '4', '3', '4', '4', '4', '4', '5', '4', '5', '4', '5', '5', '0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0Needs to add more active teaching in his class0-0--0-0--0-0--0-0--0-0--0-0--0-0good overall'),
(17, '22', '16', 'A', '2019', '5', '4', '5', '5', '5', '5', '5', '4', '5', '4', '5', '5', '0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0Needs to add more active teaching in his class0-0--0-0--0-0--0-0--0-0--0-0--0-0good overall'),
(18, '24', '17', 'A', '2019', '4', '4', '4', '5', '4', '5', '4', '4', '4', '4', '5', '4', '0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0good overall'),
(19, '26', '18', 'A', '2019', '3', '3', '3', '4', '4', '4', '4', '4', '4', '4', '4', '3', '0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--'),
(20, '14', '12', 'B', '2019', '4', '4', '5', '4', '4', '5', '5', '4', '5', '4', '5', '5', '0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0Interesting lab sessions! Enjoyed it!0-0--0-0good teacher0-0--0-0--0-0--0-0--'),
(21, '30', '13', 'B', '2019', '4', '4', '5', '5', '4', '4', '4', '4', '5', '4', '5', '5', '0-0--0-0--0-0--0-0impeccable teacher0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0good enough.0-0--0-0--0-0--0-0--'),
(22, '29', '14', 'B', '2019', '5', '5', '5', '5', '5', '5', '5', '4', '5', '4', '5', '5', '0-0--0-0--0-0--0-0impeccable teacher0-0--0-0--0-0--0-0--0-0--0-0Arguably the best subject of this semester, taught extremely well! I am definitely going to preserve my lecture notes :-)0-0--0-0best teacher0-0--0-0--0-0--0-0--'),
(23, '36', '15', 'B', '2019', '4', '3', '4', '4', '4', '4', '5', '4', '5', '4', '5', '5', '0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0Excellent lectures! I strongly believe more lab sessions should be allocated for this subject.0-0--0-0bullies students0-0--0-0--0-0--0-0--'),
(24, '22', '16', 'B', '2019', '4', '4', '5', '4', '4', '5', '4', '5', '5', '4', '5', '5', '0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0Interesting problems were discussed in class. Enjoyed the lectures!0-0--0-0bad0-0--0-0--0-0--0-0--'),
(25, '24', '17', 'B', '2019', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '5', '4', '0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0good enough0-0--0-0--0-0--0-0--'),
(26, '26', '18', 'B', '2019', '4', '4', '4', '5', '4', '5', '4', '4', '5', '4', '5', '5', '0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--'),
(27, '31', '19', 'B', '2019', '5', '5', '5', '5', '5', '5', '5', '5', '5', '4', '5', '5', '0-0--0-0--0-0--0-0good0-0--0-0--');

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

--
-- Dumping data for table `feedback_inst`
--

INSERT INTO `feedback_inst` (`fi_id`, `year`, `dept`, `sem`, `div_id`, `comment`) VALUES
(1, '2019', 'Computer Engineering', '5', 'A', '-'),
(2, '2019', 'Computer Engineering', '3', 'A', '-'),
(3, '2019', 'Computer Engineering', '5', 'B', '-'),
(4, '2019', 'Computer Engineering', '3', 'B', '-');

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
  `question` varchar(300) NOT NULL,
  `ans1` varchar(200) NOT NULL,
  `ans2` varchar(200) NOT NULL,
  `ans3` varchar(200) NOT NULL,
  `ans4` varchar(200) NOT NULL,
  `ans5` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_ques`
--

INSERT INTO `feedback_ques` (`fbq_id`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `ans5`) VALUES
(1, 'HOW DOES THE TEACHER EXPLAIN THE SUBJECT ?', 'Exceedingly Well', 'Adequately Well', 'Reasonably Well', 'Inadequate', 'Totally Inadequate'),
(2, 'HOW IS THE LANGUAGE AND COMMUNICATION OF THE TEACHER ?', 'Excellent', 'Very Good', 'Good', 'Satisfactory', 'Poor'),
(3, 'HOW MUCH OPPORTUNITY DOES THE TEACHER GIVE FOR Q & A ?', 'Ample Opportunity', 'Sufficient Opportunity', 'Occasional Opportunity', 'Rare Opportunity', 'Never'),
(4, 'HOW IS THE TEACHER\'S CONTROL AND COMMAND OVER THE CLASS ?', 'Maintains Good Discipline', 'Maintains Reasonable Discipline', 'Some Disorder in class', 'Class is Frequently Disordered', 'Class is Noisy'),
(5, 'HOW DOES THE TEACHER STIMULATE YOU TO THINK ABOUT THE SUBJECT ?', 'Highly Stimulating', 'Adequately Stimulating', ' Stimulating', 'Rarely Stimulating', 'Never'),
(6, 'WHAT IS THE ATTITUDE OF THE TEACHER TOWARDS YOU ?', 'Usually Sympathetic and Helpful', 'Sometimes Sympathetic and Helpful', 'Sympathetic', 'Avoids Personal Contact', 'Appears Indifferent'),
(7, 'HOW MUCH OF THE SYLLABUS DOES THE TEACHER COMPLETE ?', 'Above 90%', '75% - 90%', '60% - 75%', '50% - 60%', 'Below 50%'),
(8, 'DOES THE TEACHER VICTIMIZE SOME STUDENTS ?', 'Never', 'Occasionally', 'Frequently', 'Usually', 'Always'),
(9, 'HOW MUCH OF CLASS TIME DOES TEACHER USE FOR TEACHING THE SUBJECT AND DOESNT DIVIATE ?', 'Above 90%', '75% - 90%', '60% - 75%', '50% - 60%', 'Below 50%'),
(10, 'DOES THE TEACHER SHOW FAVOURITEISM TOWARDS THE STUDENTS IN OR OUTSIDE CLASS ?', 'Never', 'Occasionally', 'Frequently', 'Very Often', 'Always'),
(11, 'WHEN DOES THE TEACHER RETURN THE CORRECTED PERIODIC TEST OR ASSIGNMENT ?', 'Within a Week', 'Within a Fortnight', 'Within 3 Weeks', 'After a Month', 'Never'),
(12, 'HOW PUNTUAL IS THE TEACHER WHEN COMING TO THE CLASS ?', 'Always on time', 'Occasionally Late', 'Frequently Late', 'Often Late', 'Never on Time');

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
(1, 'Engineering Maths - 1', '1', 'Applied Sciences'),
(2, 'Engineering Physics - 1', '1', 'Applied Sciences'),
(3, 'Engineering Chemistry - 1', '1', 'Applied Sciences'),
(4, 'Engineering Mechanics', '1', 'Applied Sciences'),
(5, 'BEE', '1', 'Applied Sciences'),
(6, 'Applied Mathematics', '3', 'Computer Engineering'),
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
(41, 'CAD / CAM / CAE', '7', 'Mechanical Engineering'),
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
(73, 'OOPM', '3', 'Instumentation Engineering'),
(74, 'Applied Mathematics', '3', 'Instumentation Engineering'),
(75, 'Application of Microprocessors', '5', 'Instumentation Engineering'),
(76, 'Signal System', '5', 'Instumentation Engineering'),
(77, 'Control System Design', '5', 'Instumentation Engineering'),
(78, 'Control System Components', '5', 'Instumentation Engineering'),
(79, 'Business Communication and Ethics', '5', 'Instumentation Engineering'),
(80, 'Advanced Sensors', '5', 'Instumentation Engineering'),
(81, 'FOI', '5', 'Instumentation Engineering'),
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
(104, 'Software Testing Quality Assurance', '7', 'Information Technology');

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
(27, 'Prof.Suresh Mestry	', 'Computer Engineering'),
(28, 'Prof.D.S.Kale', 'Computer Engineering'),
(29, 'Prof.Priyanka Bhilare', 'Computer Engineering'),
(30, 'Prof. B.M. Patil', 'Computer Engineering'),
(31, 'Prof. Bhavesh Panchal', 'Computer Engineering'),
(32, 'Prof.Dipak Gaikar', 'Computer Engineering'),
(33, 'Prof. Dilip Dalgade', 'Computer Engineering'),
(34, 'Prof.Savita Lade', 'Computer Engineering'),
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
(125, 'Dr. S. Y. Ket', 'Computer Engineering');

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
(1, 'Applied Sciences', '1', 'A', '4', '1', '00'),
(2, 'Applied Sciences', '1', 'A', '20', '2', '00'),
(3, 'Applied Sciences', '1', 'A', '16', '3', '00'),
(4, 'Applied Sciences', '1', 'A', '17', '4', '00'),
(5, 'Applied Sciences', '1', 'A', '2', '5', '00'),
(6, 'Applied Sciences', '1', 'B', '5', '1', '00'),
(7, 'Applied Sciences', '1', 'B', '123', '2', '00'),
(8, 'Applied Sciences', '1', 'B', '8', '3', '00'),
(9, 'Applied Sciences', '1', 'B', '6', '4', '00'),
(10, 'Applied Sciences', '1', 'B', '1', '5', '00'),
(11, 'Applied Sciences', '1', 'C', '19', '1', '00'),
(12, 'Applied Sciences', '1', 'C', '20', '2', '00'),
(13, 'Applied Sciences', '1', 'C', '8', '3', '00'),
(14, 'Applied Sciences', '1', 'C', '54', '4', '00'),
(15, 'Applied Sciences', '1', 'C', '3', '5', '00'),
(16, 'Applied Sciences', '1', 'D', '19', '1', '00'),
(17, 'Applied Sciences', '1', 'D', '123', '2', '00'),
(18, 'Applied Sciences', '1', 'D', '16', '3', '00'),
(19, 'Applied Sciences', '1', 'D', '6', '4', '00'),
(20, 'Applied Sciences', '1', 'D', '2', '5', '00'),
(21, 'Applied Sciences', '1', 'E', '4', '1', '00'),
(22, 'Applied Sciences', '1', 'E', '20', '2', '00'),
(23, 'Applied Sciences', '1', 'E', '15', '3', '00'),
(24, 'Applied Sciences', '1', 'E', '9', '4', '00'),
(25, 'Applied Sciences', '1', 'E', '13', '5', '00'),
(26, 'Applied Sciences', '1', 'F', '11', '1', '00'),
(27, 'Applied Sciences', '1', 'F', '123', '2', '00'),
(28, 'Applied Sciences', '1', 'F', '15', '3', '00'),
(29, 'Applied Sciences', '1', 'F', '12', '4', '00'),
(30, 'Applied Sciences', '1', 'F', '10', '5', '00'),
(31, 'Applied Sciences', '1', 'G', '4', '1', '00'),
(32, 'Applied Sciences', '1', 'G', '123', '2', '00'),
(33, 'Applied Sciences', '1', 'G', '8', '3', '00'),
(34, 'Applied Sciences', '1', 'G', '17', '4', '00'),
(35, 'Applied Sciences', '1', 'G', '3', '5', '00'),
(36, 'Mechanical Engineering', '3', 'A', '60', '26', '01'),
(37, 'Mechanical Engineering', '3', 'A', '46', '26', '01'),
(38, 'Mechanical Engineering', '3', 'A', '40', '27', '00'),
(39, 'Mechanical Engineering', '3', 'A', '44', '28', '00'),
(40, 'Mechanical Engineering', '3', 'A', '55', '29', '00'),
(41, 'Mechanical Engineering', '3', 'A', '59', '30', '00'),
(42, 'Mechanical Engineering', '3', 'A', '52', '31', '00'),
(43, 'Mechanical Engineering', '3', 'B', '45', '26', '00'),
(44, 'Mechanical Engineering', '3', 'B', '63', '27', '00'),
(45, 'Mechanical Engineering', '3', 'B', '47', '28', '00'),
(46, 'Mechanical Engineering', '3', 'B', '62', '29', '00'),
(47, 'Mechanical Engineering', '3', 'B', '44', '30', '00'),
(48, 'Mechanical Engineering', '3', 'B', '52', '31', '00'),
(49, 'Mechanical Engineering', '5', 'A', '46', '32', '00'),
(50, 'Mechanical Engineering', '5', 'A', '49', '33', '00'),
(51, 'Mechanical Engineering', '5', 'A', '54', '34', '00'),
(52, 'Mechanical Engineering', '5', 'A', '53', '35', '00'),
(53, 'Mechanical Engineering', '5', 'A', '62', '36', '10'),
(54, 'Mechanical Engineering', '5', 'A', '55', '37', '10'),
(55, 'Mechanical Engineering', '5', 'A', '62', '38', '00'),
(56, 'Mechanical Engineering', '5', 'A', '66', '39', '00'),
(57, 'Mechanical Engineering', '5', 'B', '45', '32', '00'),
(58, 'Mechanical Engineering', '5', 'B', '56', '33', '00'),
(59, 'Mechanical Engineering', '5', 'B', '42', '34', '00'),
(60, 'Mechanical Engineering', '5', 'B', '12', '35', '00'),
(61, 'Mechanical Engineering', '5', 'B', '59', '37', '10'),
(62, 'Mechanical Engineering', '5', 'B', '59', '38', '00'),
(63, 'Mechanical Engineering', '5', 'B', '66', '39', '00'),
(64, 'Mechanical Engineering', '7', 'A', '50', '40', '01'),
(65, 'Mechanical Engineering', '7', 'A', '41', '40', '01'),
(66, 'Mechanical Engineering', '7', 'A', '63', '41', '00'),
(67, 'Mechanical Engineering', '7', 'A', '42', '42', '00'),
(68, 'Mechanical Engineering', '7', 'A', '61', '43', '00'),
(69, 'Mechanical Engineering', '7', 'A', '43', '44', '10'),
(70, 'Mechanical Engineering', '7', 'A', '48', '45', '10'),
(71, 'Mechanical Engineering', '7', 'B', '48', '40', '00'),
(72, 'Mechanical Engineering', '7', 'B', '53', '41', '00'),
(73, 'Mechanical Engineering', '7', 'B', '41', '42', '00'),
(74, 'Mechanical Engineering', '7', 'B', '43', '43', '00'),
(75, 'Mechanical Engineering', '7', 'B', '40', '45', '10'),
(76, 'Computer Engineering', '3', 'A', '5', '6', '00'),
(77, 'Computer Engineering', '3', 'A', '33', '7', '00'),
(78, 'Computer Engineering', '3', 'A', '38', '8', '00'),
(79, 'Computer Engineering', '3', 'A', '34', '9', '00'),
(80, 'Computer Engineering', '3', 'A', '39', '10', '00'),
(81, 'Computer Engineering', '3', 'A', '124', '11', '00'),
(82, 'Computer Engineering', '3', 'B', '5', '6', '00'),
(83, 'Computer Engineering', '3', 'B', '32', '7', '00'),
(84, 'Computer Engineering', '3', 'B', '33', '8', '00'),
(85, 'Computer Engineering', '3', 'B', '37', '9', '00'),
(86, 'Computer Engineering', '3', 'B', '39', '10', '00'),
(87, 'Computer Engineering', '3', 'B', '117', '11', '00'),
(88, 'Computer Engineering', '5', 'A', '14', '12', '00'),
(89, 'Computer Engineering', '5', 'A', '35', '13', '00'),
(90, 'Computer Engineering', '5', 'A', '25', '14', '00'),
(91, 'Computer Engineering', '5', 'A', '36', '15', '00'),
(92, 'Computer Engineering', '5', 'A', '22', '16', '00'),
(93, 'Computer Engineering', '5', 'A', '24', '17', '00'),
(94, 'Computer Engineering', '5', 'A', '26', '18', '10'),
(95, 'Computer Engineering', '5', 'B', '14', '12', '00'),
(96, 'Computer Engineering', '5', 'B', '30', '13', '00'),
(97, 'Computer Engineering', '5', 'B', '29', '14', '00'),
(98, 'Computer Engineering', '5', 'B', '36', '15', '00'),
(99, 'Computer Engineering', '5', 'B', '22', '16', '00'),
(100, 'Computer Engineering', '5', 'B', '24', '17', '00'),
(101, 'Computer Engineering', '5', 'B', '31', '19', '10'),
(102, 'Computer Engineering', '7', 'A', '27', '20', '01'),
(103, 'Computer Engineering', '7', 'A', '28', '20', '01'),
(104, 'Computer Engineering', '7', 'A', '21', '21', '00'),
(105, 'Computer Engineering', '7', 'A', '125', '22', '01'),
(106, 'Computer Engineering', '7', 'A', '34', '22', '01'),
(107, 'Computer Engineering', '7', 'A', '31', '23', '00'),
(108, 'Computer Engineering', '7', 'A', '24', '24', '10'),
(109, 'Computer Engineering', '7', 'B', '28', '20', '01'),
(110, 'Computer Engineering', '7', 'B', '27', '20', '01'),
(111, 'Computer Engineering', '7', 'B', '21', '21', '00'),
(112, 'Computer Engineering', '7', 'B', '125', '22', '01'),
(113, 'Computer Engineering', '7', 'B', '34', '22', '01'),
(114, 'Computer Engineering', '7', 'B', '23', '23', '00'),
(115, 'Computer Engineering', '7', 'B', '35', '25', '10'),
(116, 'Electronics and Telecommunication', '3', 'A', '91', '46', '00'),
(117, 'Electronics and Telecommunication', '3', 'A', '81', '47', '00'),
(118, 'Electronics and Telecommunication', '3', 'A', '72', '48', '00'),
(119, 'Electronics and Telecommunication', '3', 'A', '22', '49', '01'),
(120, 'Electronics and Telecommunication', '3', 'A', '38', '49', '01'),
(121, 'Electronics and Telecommunication', '3', 'A', '27', '49', '01'),
(122, 'Electronics and Telecommunication', '3', 'A', '88', '50', '00'),
(123, 'Electronics and Telecommunication', '3', 'A', '76', '51', '00'),
(124, 'Electronics and Telecommunication', '3', 'B', '70', '46', '00'),
(125, 'Electronics and Telecommunication', '3', 'B', '81', '47', '00'),
(126, 'Electronics and Telecommunication', '3', 'B', '85', '48', '00'),
(127, 'Electronics and Telecommunication', '3', 'B', '22', '49', '01'),
(128, 'Electronics and Telecommunication', '3', 'B', '38', '49', '01'),
(129, 'Electronics and Telecommunication', '3', 'B', '25', '49', '01'),
(130, 'Electronics and Telecommunication', '3', 'B', '19', '50', '00'),
(131, 'Electronics and Telecommunication', '3', 'B', '76', '51', '00'),
(132, 'Electronics and Telecommunication', '5', 'A', '82', '55', '00'),
(133, 'Electronics and Telecommunication', '5', 'A', '84', '56', '00'),
(134, 'Electronics and Telecommunication', '5', 'A', '86', '57', '00'),
(135, 'Electronics and Telecommunication', '5', 'A', '78', '58', '00'),
(136, 'Electronics and Telecommunication', '5', 'A', '92', '59', '10'),
(137, 'Electronics and Telecommunication', '5', 'A', '77', '60', '10'),
(138, 'Electronics and Telecommunication', '5', 'A', '7', '61', '00'),
(143, 'Electronics and Telecommunication', '5', 'B', '91', '55', '00'),
(144, 'Electronics and Telecommunication', '5', 'B', '84', '56', '00'),
(145, 'Electronics and Telecommunication', '5', 'B', '70', '57', '00'),
(146, 'Electronics and Telecommunication', '5', 'B', '87', '58', '00'),
(147, 'Electronics and Telecommunication', '5', 'B', '92', '59', '10'),
(148, 'Electronics and Telecommunication', '5', 'B', '77', '60', '10'),
(149, 'Electronics and Telecommunication', '5', 'B', '7', '61', '00'),
(150, 'Electronics and Telecommunication', '7', 'A', '74', '63', '00'),
(151, 'Electronics and Telecommunication', '7', 'A', '85', '64', '00'),
(152, 'Electronics and Telecommunication', '7', 'A', '69', '65', '00'),
(153, 'Electronics and Telecommunication', '7', 'A', '75', '66', '00'),
(154, 'Electronics and Telecommunication', '7', 'A', '73', '67', '10'),
(155, 'Electronics and Telecommunication', '7', 'A', '82', '68', '10'),
(156, 'Electronics and Telecommunication', '7', 'B', '74', '63', '00'),
(157, 'Electronics and Telecommunication', '7', 'B', '89', '64', '00'),
(158, 'Electronics and Telecommunication', '7', 'B', '83', '65', '00'),
(159, 'Electronics and Telecommunication', '7', 'B', '75', '66', '00'),
(160, 'Electronics and Telecommunication', '7', 'B', '73', '67', '10'),
(161, 'Electronics and Telecommunication', '7', 'B', '82', '68', '10'),
(162, 'Instumentation Engineering', '3', 'A', '97', '69', '00'),
(163, 'Instumentation Engineering', '3', 'A', '100', '70', '00'),
(164, 'Instumentation Engineering', '3', 'A', '104', '71', '00'),
(165, 'Instumentation Engineering', '3', 'A', '105', '72', '00'),
(166, 'Instumentation Engineering', '3', 'A', '32', '73', '00'),
(167, 'Instumentation Engineering', '3', 'A', '108', '74', '00'),
(168, 'Instumentation Engineering', '5', 'A', '98', '75', '00'),
(169, 'Instumentation Engineering', '5', 'A', '1', '76', '00'),
(170, 'Instumentation Engineering', '5', 'A', '105', '77', '00'),
(171, 'Instumentation Engineering', '5', 'A', '107', '78', '00'),
(172, 'Instumentation Engineering', '5', 'A', '101', '79', '00'),
(173, 'Instumentation Engineering', '5', 'A', '102', '80', '10'),
(174, 'Instumentation Engineering', '5', 'A', '100', '81', '10'),
(175, 'Instumentation Engineering', '7', 'A', '102', '82', '00'),
(176, 'Instumentation Engineering', '7', 'A', '98', '83', '00'),
(177, 'Instumentation Engineering', '7', 'A', '103', '84', '00'),
(178, 'Instumentation Engineering', '7', 'A', '107', '85', '00'),
(179, 'Instumentation Engineering', '7', 'A', '95', '86', '00'),
(180, 'Information Technology', '3', 'A', '113', '87', '00'),
(181, 'Information Technology', '3', 'A', '111', '88', '00'),
(182, 'Information Technology', '3', 'A', '119', '89', '00'),
(183, 'Information Technology', '3', 'A', '109', '90', '00'),
(184, 'Information Technology', '3', 'A', '113', '91', '00'),
(185, 'Information Technology', '3', 'A', '117', '92', '00'),
(186, 'Information Technology', '5', 'A', '114', '93', '00'),
(187, 'Information Technology', '5', 'A', '118', '94', '01'),
(188, 'Information Technology', '5', 'A', '116', '94', '01'),
(189, 'Information Technology', '5', 'A', '111', '95', '00'),
(190, 'Information Technology', '5', 'A', '110', '96', '00'),
(191, 'Information Technology', '5', 'A', '101', '97', '00'),
(192, 'Information Technology', '5', 'A', '109', '98', '00'),
(193, 'Information Technology', '7', 'A', '116', '99', '00'),
(194, 'Information Technology', '7', 'A', '112', '100', '00'),
(195, 'Information Technology', '7', 'A', '115', '101', '00'),
(196, 'Information Technology', '7', 'A', '118', '102', '10'),
(197, 'Information Technology', '7', 'A', '122', '103', '00'),
(198, 'Information Technology', '7', 'A', '112', '104', '10'),
(200, 'Computer Engineering', '7', 'B', '24', '24', '10'),
(201, 'Computer Engineering', '7', 'A', '35', '25', '10'),
(202, 'Computer Engineering', '5', 'A', '31', '19', '10'),
(203, 'Computer Engineering', '5', 'B', '26', '18', '10');

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
  MODIFY `fb_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `feedback_count`
--
ALTER TABLE `feedback_count`
  MODIFY `fc_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback_inst`
--
ALTER TABLE `feedback_inst`
  MODIFY `fi_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback_inst_temp`
--
ALTER TABLE `feedback_inst_temp`
  MODIFY `fi_temp_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback_ques`
--
ALTER TABLE `feedback_ques`
  MODIFY `fbq_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback_temp`
--
ALTER TABLE `feedback_temp`
  MODIFY `fbt_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `teaching`
--
ALTER TABLE `teaching`
  MODIFY `lec_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
