-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 10, 2020 at 07:25 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id13230390_rgit_feedback`
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
  `sem` int(10) NOT NULL,
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

--
-- Dumping data for table `feedback_inst`
--

INSERT INTO `feedback_inst` (`fi_id`, `year`, `dept`, `sem`, `div_id`, `comment`) VALUES
(1, '2019', 'Computer Engineering', '7', 'A', '0-0Needs some serious funds and a new approach to change the institution. 0-0washrooms are too dirty0-0--0-0--0-0--0-0The mid semester submissions are too stressful0-0The department is not at all student friendly. There is hardly any relation between student and teachers. The department also does not give any opportunity for  exploring new ventures or challenges. Most of the teachers dont have time to take care of students time. The department should strongly start thinking about students as a whole.0-0Lab systems not updated , no proper sanitation facility , lack of working water purifiers0-0The first mid-term test could be  held earlier so as to have sufficient time between the two mid-term tests. Usually it gets super hectic after the first mid-term owing to submissions, practicals and the mid-term test two approaching.0-0Fans not working properly . No proper ventilation. Sometimes the level of suffocation goes above the level of patience. Toilets are not cleaned daily. Fans should be proper in each class.0-0--0-0CONS :-\r\nNo proper drinking water facility\r\nNeeds to improve Computer Labs (i.e At least i5 processor ,8GB RAM)\r\nCanteen is disguisting\r\n\r\nPROS:\r\nTraining and Placement Cell  is great and well organized \r\n0-0Very little attention drawn towards practical knowledge for students. Hardly any opportunity towards the fundamental or industrial growth for the students. Resources like the computers and the internet facilities MUST be improved for the departments and especially for the computer department.  0-0An overall good college to study and the faculty of comps is extremely good towards students just a bit of delay in submissions.0-0The institute towards student welfare. It is currently failing at this.0-0Time gap between unit test1 and unit test 2 was quite less. No water in the enitre college.0-0The mid term submission should be removed and instead time gap between mid-term 1 and mid-term 2 is very less.0-0Water problems\r\nage old computers and equipment\r\nLots of assignment and experiments which has nothing to do with knowledge, just a copy paste things0-0The institute can provide better facilities to students including clean bathrooms, and feedback should be conducted between semesters and not just at the end.0-0good'),
(2, '2019', 'Computer Engineering', '7', 'B', '0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0yo0-0--0-0--0-0--0-0--0-0--0-0door handles are missing in class doors, some fans are not working in the class and the computers in the lab are not up to date and are some are not even working!!!!0-0--0-0--0-0Upgrade systems in the department.They are outdated0-0Walls are getting black, water is not good for drinking, Not enough common rooms for students, There is no proper place for eating food.0-0--'),
(3, '2019', 'Electronics and Telecommunication', '7', 'A', '0-0the system is not well maintained, students are always made to do lot of assignments and dont get time for studies 0-0no proper campus no proper canteen no scope available for sports field at university level0-0not proper facility for sports activity and canteen prices are high.0-0--0-0--0-0--0-0improve infrastructure0-0equipment in the lab are not working properly need to be fixed\r\ncomputers are rarely working\r\nthere no water in washroom\r\n0-0Need to provide water in toilets.0-0NO COMPUTERS IN THE PRACTICAL LAB.0-01. PATHETIC INFRASTRUCTURE MAINTENANCE\r\n2. DIRTY AND DISGUSTING WASHROOMS\r\n3. NO CHAIRS IN THE CAFETERIA FOR STUDENTS TO SIT AND EAT.\r\n4. ITS NOT ACCEPTABLE TO TELL STUDENTS TO VACATE THE CAFE WHEN THE PRINCIPLE ARRIVES.\r\n5. BAD LABS WITH NO COMPUTERS WORKING0-0unsatisfactory services in return are given back by the institute. total waste of 4 lacs of 4 years. unmaintained lifts and classes. unmanaged canteen and its maintenance. uncleaned classes. get 2 xerox centers! please provide clean water in washroom and clean them on time. the staff on ground floor is rude. please bring learnt professors who have upgraded knowledge and dont irritate students for unnecessary things and rather give more importance to projects 0-0maintaining is required0-0--0-0POOR WASHROOM FACILITIES,0-0good0-0Coperating but dont look in the studen5t feedback0-0good0-0--'),
(4, '2019', 'Electronics and Telecommunication', '7', 'B', '0-0lights are not working. computers are not working properly. the practical of BDA is not happening due to lack of computres.0-0no computers for bda\r\nno mirror in washroom0-0--0-0Provide AC in all classrooms, CROs not working properly, washroom are not cleaned .0-0GOOD0-0--0-0--0-0K K0-0please maintain infrastucture. conduct placement related programs.0-0No computers available for BDA practicals!0-0Shortage of lab equipments. Toilets are not clean. 0-0Departmentals mens washroom are not clean and hygienic. Also, Air conditioning should be provided to the labs.0-0--0-0water crisis in college please...help for this, have GARAM PANI IN COLLEGE0-0The infrastructure needs renovation and computers are very outdated. The experiments are affected by the less computers and its availability. There is also limit to the time we get for prospering opportunity that helps in life 0-0--0-0--'),
(5, '2019', 'Applied Sciences', '1', 'A', '0-0AC should be in the computer labs0-0--0-0Upgrade computers and labs,A.Cs in every class ,bring good faculties and so on........0-0Upgrade the lab and computers , 0-0Due to delay in the admission process our semester was shortened but that should not be the reason to get less days to study  and less holidays .0-0Institute is good. But the campus of the college is very small.0-0WE REQUIRE A GOOD TEACHER IN ACCOUNT DEPARTMENT.0-0Accounts department staff should be more patient with us.0-0Accounts department staff should be more patient with us.0-0Accounts department staff should be more patient with us.0-0Accounts department staff should be more patient with us.0-0COLLEGE CAMPUS IS SMALL.\r\nREST OF THE THINGS ARE VERY GOOD.0-0NEED A PLAYGROUND,UPGRADE COMPUTERS AND SOME TEACHERS NEE D TO BE MORE FRANK0-0poor0-0WE NEED SOME FACILITY IN COLLEGE,SUCH AS WASHROOM FACILITY .0-0want big campus.\r\nOffice staff are very rude when we want some info about anything.\r\n\r\n 0-0THERES NO PROPER CANTEEN IN  THE COLLEGE.\r\nNO CAMPUS.\r\nACCOUNTS STAFF IS NOT CO-OPERATIVE AT ALL.\r\nTHE BUILDING NEEDS TO BE RENOVATED.\r\n0-0GOOD AND RESPONSIVE STAFF EXCEPT THE ACCOUNTS OFFICE THE NEED TO, SEE US AS A STUDENT AND MAKE US SOFTLY UNDERSTAND THINGS THE THINGS . AS WE ARE NEW THEY MAKE US UNDERSTAND THINGS NICELY WITHOUT BEING TOOO HARSH.0-0Classroom needs more more lights and air conditioning. Toilets must be clean .0-0good in study. its not going on proper time lecture goes after time finish. gives proper knowledge regarding subjects.0-0Toilets need to be frequently cleaned. Many a times water supply is not available. Handwash soap should be there. Girls washroom should have dustbins in every toilet. Classrooms are dirty and not cleaned. Classrooms need adequate lighting and air conditioning.0-0NO PROPER CANTEEN . THE CANTEEN SPACE SHOULD BE INCREASED .\r\nTHERE SHOULD BE AC IN THE BASEMENT. \r\nTHE COLLEGE BUILDING AND INTERIORS NEEDS TO BE RENOVATED0-0VERY GOOD COLLEGE0-0--'),
(6, '2019', 'Applied Sciences', '1', 'B', '0-0--0-0Overall faculty and facilities are good enough.0-0IMPROVE WASHROOM, REMOVE THE 34MB LIMIT OF WIFI, LAB ASSISTANT OF BEE IS VERY ARROGANT AND RUDE 0-0Its good. Staff and infrastructure are appreciable.0-0It gets really hot in the class. The fan speed is slow in most classes. The washrooms are not well maintained. Most of the times there is no water in the taps. Most of the seats in the Seminar Hall need to be fixed.0-0IMPROVE WASHROOM, THE FEES DEPARTMENT WHICH ALSO HANDLES SCHOLARSHIP FORMS HAVE VERY ATTITUDE AND RUDE AND DOESNT GIVES INFORMATION ABOUT HOW TO FILL FORM, LAB ASSISTANT OF BEE IS ALSO VERY RUDE, EXCEED WIFI LIMIT,   0-0some teachers teaches well while some are poor at it.0-0IMPROVE WASHROOM,INSTALL A.C,CHANGE BEE LAB ASSISTANT,PROVIDE WI-FI FACILITY , IMPROVE BENCHES,LEAVE ON PROPER TIME 0-0clasroom is to hot too sit for the lecture 0-01)VERY BAD CONDITION OF WASHROOM\r\n2)ACCOUNT OFFICER WHO HANDLES SCHOLARSHIP FORMS  SPEAKS VERY RUDELY WITH EVERYONE EVEN WITH PARENTS AND USES VERY ABUSIVE LANGUAGE.TELLS THAT HE DID NOT GET TRAINING FOR HIS WORK.\r\n3)EXCEED THE WIFI LIMIT \r\n4)LAB ASSISTANT OF BEE DOESNT HAVE COMMUNICATION SKLLS.\r\n5)VENTILATION IN CLASS IS NOT GOOD .PLEASE REPLACE THE FANS WITH AC\r\n6)COMPUTERS DONT WORK IN COMPUTER LAB0-0dont have comfortable campus. class room is horrible . fans not working well. lifts stucks always. stucking students on doors. dont have proper canteen food. not proper place to eat. dont have ground to play.0-0its really hot for every one in classroom ,even for teachers . it makes teachers as well student to weaken their concentration... so kindly requesting put some ac (air conditioner) in a classroom ...so we can concentrate more for students as well as for teachers0-0INSTITUTION IS GOOD.PLEASE INSTALL AIR CONDITIONER AS THE CLASSES ARE SUFFOCATING.EVEN TEACHERS ARE ALSO FED UP.PLEASE DO NOT IGNORE AND INSTALL AIR CONDITIONERS.THE CLASSROOMS ARE EXHAUSTED AND ALSO INSTALL AC IN COMPUTER LAB.IN COMPUTER LAB THE COMPUTERS ARE NOT WORKING.INSTALL AC IN EVERY CLASS ROOM.THE TOILET CONDITIONS ARE WORST ON THE SECOND FLOOR.PLEASE CLEAN IT REGULARLY AND FREQUENTLY.WATER IS NOT THERE AFTER RECESS.THE ACCOUNT OFFICER IS VERY RUDE.HE DO NOT KNOW HOWTO TALK TO PARENTS.0-0PLEASE IMPROVE THE INFRASTRUCTURE AND REPLACE THE FAN WIT AC CHANGE THE NON TEACHING STAFF THEY ARE WORST DONT HAVE PROPER LANGUAGE THEY ALWAYS SHOUT DOESNT THINK ABOUT STUDENT AND BEHAVE LIKE THE COLLEGE IS THEIR0-0washrooms are not kept clean0-0CLASS IS VERY SUFFOCATING, MAKE SURE FANS WORK PROPERLY AND IF POSSIBLE  PLACE AC s. THE NON TEACHING STAFF AND LAB ASSISTANTS ARE VERY RUDE TO STUDENTS, THEY DONT KNOW HOW TO TALK TO A STUDENT. THE COLLEGE IS NICE BUT ITS VERY SUFFOCATING, IT COULD BE THE BEST COLLEGE IF NON TEACHING STAFF ARE REPLACED BY SOME WELL SPOKEN PERSONS AND SUFFOCATING PROBLEM IS RESOLVED. THE WASHROOM IS ALSO VERY BAD, EVEN IF ITS URGENT ITS REALLY NOT POSSIBLE TO GO TO WASHROOM. LIFT DOESNT WORK SOMETIME, WASHROOMS SHOULD BE WELL CLEANED AND COLLEGE SHOULD BE A LITTLE MORE VENTILATED. PLEASE TRY TO FIX AC s. AS IT BECOMES TOO HOT IN OCTOBER, WE CANT EVEN ABOUT WHAT HAPPENS IN SUMMERS. THANK YOU.\r\n0-0Classes require new fans as it is quite suffocation for the teachers as well, it also disturbs the flow of the class as the teachers sweat out a lot. Also the workshop is extremely suffocation, as I feel nauseating there. also Basis Electrical Engineering And Basic Engineering Workshop lab assistant are extremely very rude and refuse to cooperate and help most of the time. Also we need new plates in canteen as those plates seems very unhygienic. 0-01) THE CLASS IS VERY HOT DUE TO INSUFFICIENT FANS AND VENTILATION IS VERY BAD ...PLZ ADD MORE FANS TO CLASS AND IF POSSIBLE PLEASE ADD AC AS MOST CLLG IN MUMBAI ARE STARTING TO PUT AC IN THEIR CLASSROOMS\r\n\r\n2)WORKSHOP SIR ARE VERY RUDE AND ITS VERY HOT IN WORKSHOP...WE SWEAT ALOT IN LAB SO PLZ  DO SOMETHING \r\n\r\n3) THE BOYS WASHROOMS DONT NOT HAVE A PROPER WESTERN STYLE TOILET ...PLZ ADD JET SPRAY AND IMPROVE THE CONDITIONS OF TOILETS \r\n\r\n4)THE BEE ASSISTANT IS VERY RUDE AND DONT HAVE ANY KNOWLEDGE AND TEACHES VERY BAD\r\n\r\n5)THE WATER COOLERS ARE NOT WORKING ON 1ST AND 2ND FLOOR ...PLZ MAKE THEM WORK\r\n\r\n6)THE LIFT ARE NOT IN WORKING CONDITIONS SO PLZ REPLACE THEM AS THEY ARE VERY OLD AND VERY RISKY AS SOMEONE ENTERS IT THEY CLOSE AND SOMEONE CAN GET HURT SO PLZ REPAIR OR CHANGE LIFTS\r\n\r\n7)THE CANTEEN FOOD IS NOT HYGENIC AND VERY LIMITED OPTIONS FOR JAIN FOOD IS AVAILABLE.SO I REQEST YOU TO MAKE A SEPERATE KITCHEN FOR JAIN AS IT GETS MIX EVERYTIME THEY MAKE REGULAR AND JAIN FOOD \r\n\r\n8)PLZ ADD CHAIRS AND TABLES IN CANTEEN AREA AS THE ONES ARE ALWAYS HOT DUE TO NO SHADE\r\n\r\n9)THE COLLEGE SHLD START BUS SERVICES FROM STATION TO CLLG AS THE BEST BUSES ARE NOT CONVINIENT ARE FULL PACK \r\n\r\n10)THE CAMPUS SHOULD HAVE A PLACE FOR INDOORS GAMES AS WE DO NOT HAVE ANY PLACE TO CHILL (CARROM , TABLE TENIS,CHESS)ETC0-0NO.'),
(7, '2019', 'Applied Sciences', '1', 'E', '0-0CLASSROOM SHOULD BE COLOURED \r\n0-0WASHROOMS CLEANLINESS NOT UP TO THE MARK.\r\nCLASSROOM CLEANLINESS REQUIRED SOON.\r\n0-0--0-0good looks after students future0-0need cleanliness, classrooms are sometimes too dirty, website needs to be more regularly updated with latest information0-0--0-0--0-0its a good institute till now . practical labs have required materials and thats sufficient .0-0dirty and unclean washrooms.  very rude and irresponsible office staffs0-0college must install ac, and no extra lectures should be taken by any faculty0-0Cleanliness is to be maintain through the INSTITUTE.0-0I have face promblems in accounts work as they were not that helpfull. In class room feels suffocation as fans are not properly working and also the doors are kept closed by teachers so ,it distracts a lot.0-0must install AC,  maintain proper timetable for events, repair lifts, light issues0-0proper fans must be present in some classes and clean toilets0-0FANS ARE NOT WORKING PROPERLY AND FEELING SUFFOCATION IN CLASS.0-0very good,the washroom can be made more clean0-0Fans in the classroom should be changed as soon as possible. It causes suffocation sometimes. 0-0the college building is very good but in some areas such as labs and corridors, the tiles are coming out from the wall, and I request you to please clean the toilets because they are very smelly. overall the college infrastructure is very good\r\n0-0needs improvement at accounts office 0-0Need to improve the accounts office , 0-0Have a good campus.'),
(8, '2019', 'Applied Sciences', '1', 'C', '0-0THEY SHOULD HAVE PROPER VENTILATION ...!!!!0-0--0-0The facilities are good but the cleanliness is a big issue!0-0Washrooms are dirty all the time0-0--0-0the boys toilet condition is very worst there is no proper maintenance and cleaning of the washroom. Not proper supply of tap water in washbasin. the chairs in the cafeteria are not well they need to be replaced. 0-0AIR CONDITIONERS CAN BE PROVIDED IN ADDITIONAL FACILITIES. \r\nMORE SPORTS ACTIVITES CAN BE SERVED TO STUDENTS.\r\n 0-0the boys toilet condition is very worst there is no proper maintenance and cleaning of the washroom. Not proper supply of tap water in washbasin. the chairs in the cafeteria are not well they need to be replaced. 0-0the boys toilet condition is very worst there is no proper maintenance and cleaning of the washroom. Not proper supply of tap water in washbasin. the chairs in the cafeteria are not well they need to be replaced. 0-0--0-0perfect in their responsibilties and very friendly  towards students 0-0 excellent , provides extra lectures when necessary and supportive0-0the boys toilet condition is pathetic and there is no proper seating arrangement in canteen and the accounts department behaviour is very rude0-0--0-0Air conditions should be installed due to inconvenience faced by us.  The account office is incooperative0-0IN ACCOUNT DEPARTMENT SOME PEOPLE ARE INCO OPORATIVE.0-0it is good to be here but travelling exhaust 0-0--0-0teacher of RGIT are good and helful0-0Our institution is amazing ..no doubts and queries0-0The staff from account department is very rude0-0institute is good for all types of student.'),
(9, '2019', 'Applied Sciences', '1', 'D', '0-0BEST COLLEGE IN THE UNIVERSE I HAVE EVER SEEN0-0--0-0Need development in staff0-0IT IS PRETTY GOOD 0-0unhygienic washrooms and need some development in staff attitude.\r\n0-0--0-0WASHROOM FACILITES ARE NOT GOOD CLASSES FANS R NOT WORKING PROPERLY 0-0nice environment, good co-curricular activities; needs to work out on sports 0-0Best college 0-0NO AC,NO PROPER DICIPLINE ,AVERAGE INFRASTRUCTURE,NON HELPFUL NATURE OF THE COLLEGE OFFICE.0-0--0-0Unhygenic girls washroom, there is no soap/handwash there. Account staf is quite rude .Incomplete equipments in laboratories.No benches in canteen, the canteeen food is below average.Lift are always out of maintanance.0-0unhyegenic boys washrooms , rude accounts staff , broken devices in electrical lab , broken furniture in classroom , average canteen  food , water dispenser dosent work sometimes , it gets really hot in classrooms :  coolers required, improper seating arrangement in canteen , lift is not maintained (mostly dont work,lack of safety measures in it), no ac in computer lab.\r\nwell maintained chemistry lab.0-02ND FLOOR BOYS WASHROOM IS SO SMELLY AND SHOULD BE CLEANED REGULARLY 0-0canteen food too oily.. n accounts staff too rude to all.. like they are hell very weird with studentd plz remove tht...specially one who sits inside in the cabin0-0god experience up till now teachers and nice work is done smoothly just the washrooms could have been more nicer that would contribute a lot in maintain good hygiene 0-0Boys washroom of 1st and 2nd floor is very dirty it should be clean regularly \r\nsome of that seats re also broken in washroom ....0-0fan do not work properly , it feels suffocating in class0-0--0-0need improvement0-0need improvement0-0need improvement0-0need improvement0-0need improvement0-0need improvement0-0need improvement0-0need improvement0-0college doesnt have proper and cleaned washroom always water shortage,no soap in washroom,no clean drinking water,lifts are not working properly,and moreover college needs painting because infrastructure is good but it looks dull,and no proper equipments in lab.0-01.boys washrooms are very dirty.\r\n2.very bad infrastruture  and interior.\r\n3.benches are broken.\r\n4.fans of the class doesnt work.\r\n5.ligths in the classrooms are very bad.\r\n6.food price in the canteen are very high.\r\n7.even computer labs doesnt have acs.\r\n8.classrooms doesnt have proper teaching facility.0-0college is good, only the some facility of fans are bad '),
(10, '2019', 'Applied Sciences', '1', 'F', '0-0Girls washrooms are not clean and there are lots of mosquitoes in the basement0-0The Toilets can be improved. 0-0Should not rush to end the syllabus. 0-0--0-0should not rush the portion ,teach slowly and in proper order0-0TOILETS SHOULD BE IMPROVED. PINAA KA PAANI KA THANDA HONA CHAHIYE ,CANTEEN MAI BHI AND TOILETS KE UDHAR BHI .0-0toilet should be improved.We need Ac in our class rooms.classrooms should be neat and clean. 0-0Toilet must be cleaned0-0there should be friendly staff campus should be developed should help us on time n bring mor opportunities 0-0staff is very slow,and they do  not respect students,very lasy and says to do same again and again0-0all classes should be provided with ac.0-0--0-0--0-0They need little more cleanliness.0-0THE OVERALL MANAGEMENT SHOULD BE MORE SYSTEMATIC AND THERE MUST BE MORE EXTRACURRICULAR ACTIVITIES IN COLLEGE.0-0institute is good.but faculty is poor.very few teachers are committed while rests just come for teasing students.0-0TATTI AF0-0The girls toilet are not so clean and most of the time flush is not working. The classroom are not clean and the basement is full of mosquito. But the area around the staircase is always clean. 0-0girls washroom often does not have water0-0--'),
(11, '2019', 'Mechanical Engineering', '3', 'A', '0-0--0-0PLEASE CHECK THE WASHROOM CONDICION AND TRY TO MAINTAIN HYGINE OF THE COLLEGE 0-0--0-0--0-0should provide more practical knowledge than theoretical0-0suffisiently good ,but not excellant0-0--0-0--0-0--0-0Need new machiniries for practicals  or atleast maintain properly 0-0--0-0--0-0--0-0when we submit caste documents the sir assigned to it ,doesnt talk very nicely he acts as if the remaining fees is taken from  his salary0-0--0-0sufficienty good but infra can be improved0-0--0-0--0-0STAFF OF THE OFFICE ARE NOT AT ALL POLITE, WHILE TEACHERS ARE EXTREMELY POLITE \r\nFACILITY PROVIDED BY THE INSTITUTE IS EXTREMELY POOR!!!0-0--0-0--0-0--0-0--0-0WASHROOM IS VERY DIRTY. LACK OF REGULAR WATER SUPPLY.\r\n0-0--0-0our institutes needs to be cleaned properly especially the toilets. teachers and staff needs to be more friendly and helpful. and please install ac as soon as possible....'),
(12, '2019', 'Instumentation Engineering', '3', 'A', '0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0improve washroom conditions\r\nimprove faculties\r\nimprove canteen food \r\n0-0IMPROVE TOILETS \r\nIMPROVE WATER FILTERS \r\nPLEASE INSTALL WORKING LIFTS \r\nPLEASE ADD SEATS OR BENCHES WHERE STUDENTS CAN SIT 0-0The Institution is Excellent No doubt about teaching Staff.\r\nCleanliness Should be maintain in Boys Washroom Housekeeping Faculty Are Not Maintaining Cleanliness and Hygeine.0-0--0-0--0-0IMPROVE TOILETS\r\nIMPROVE THE CANTEEN SERVICE\r\nPLEASE INSTALL WORKING LIFTS\r\nWATER FILTERS AND A PROPER DRINKING WATER AQUAGUARD0-0How about not going too hard on students. Especially those in Office who sometimes feel sadistic.0-0--'),
(13, '2019', 'Applied Sciences', '1', 'G', '0-0--0-0--0-0--0-0Good0-0infrastructure needs to be upgraded for sure0-0--0-0good0-0--0-0A decent institute :)0-0This is the excellent institute. 0-0cleanliness should be maintained in toilets and other curricular activities such as sports and all should be carried out0-0extremely dirty toilets facilities \r\nclass rooms are too dark  their should be more ligths  in rooms \r\nand mostly drinkable water is not available 0-0need to have some more facilities and a college ground 0-0My college name is RGIT. I love my college a lot. My college is very big but there is no ground for any sports activity, so i request the authority to look forward into the sports activities. Otherwise its the bestest college for the studies. And if possible make the whole campus AC. THANK YOU!\r\n\r\n                                                                                                                                   XYZ\r\n                                                                                                                 Your sincearly0-0Washrooms are never clean and there is also shortage of water supply. The instruments in the lab doesnt work properly. Seats in seminar hall are broken. Canteen needs to be improved. Fans in classroom do not work properly. The events organised are not beneficial.0-0please clean the washroom. washroom water supply sometime does not work. instruments of lab are not working properly . lab are not advance level. account department is very rude . they does not speak properly when child is in trouble. there is no area in canteen to have lunch.  in classroom, fan does not work properly . 0-0Some complaints about the institute.\r\ncollege lags a ground for sports and activities\r\ninfrastructure is good but not the ventilation. some classes are suffocating \r\nneeds to get good computer setups for IT department unlike old CRT monitors that the college has.\r\ndue to such infrastructure need of AC is high. 0-0WATER CRISIS LIKE ALWAYS THERE IS SHORTAGE OF WATER SUPPLY IN THE WASHROOMS.NO CLEAN WASHROOMS . LAB INSTRUMENTS DO NOT WORK . NEED AC ,FANS ARE NOT ENOUGH AT LEAST IN LABS. CANTEEN FOOD IS DISGUSTING .NO CHAIRS IN CANTEEN. THE EVENTS SHOULD BE ORGANISED FREQUENTLY,THE ONE WHICH CAN BENEFIT US AND CAN BE FUN.\r\nTEACHERS ARE GOOD BUT AGAIN NOT ALL0-0The washrooms are not clean. no sufficient amount of water . canteen food is disgusting. Institute needs to install ac in computer labs.'),
(14, '2019', 'Instumentation Engineering', '7', 'A', '0-0--0-0--0-0--0-0--0-0--0-0sufficient lab equipment0-0--0-0Boys washrooms are so smelly that it is not possible to enter\r\nDrinking water is not upto the mark as the filter is always OFF\r\nWashrooms should be clean a little bit more.\r\n\r\n0-0--0-0department needs to be more co-operative to students0-0department needs to be more co-operative to students0-0gawande aur bedke ko plzz mat bhejo for teaching the subject for next same  (8 sem )\r\n we dony understand what they teach and speak .current staff is very good . plzz work on the washroom cleanliness.0-0more practical and detailed approach is required to understand real life scenarios.0-0INFRASTRUCTURE DEVELOPMENT IS IN MUCH NEEDED...0-0thank you0-0--0-0department should be co-operative with students 0-0--'),
(15, '2019', 'Computer Engineering', '5', 'B', '0-0--0-0--0-0--0-0--'),
(16, '2019', 'Instumentation Engineering', '5', 'A', '0-0--0-0College should improve infrastructure , software need to be updated 0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0CAN IMPROVE0-0CAN DO BETTER, BUT I KNOW YOU WONT!0-0CAN DO BETTER0-0Make necessary for all teachers to have minimum 2 years industry experience before teaching.0-0--0-0--0-0nothing0-0--'),
(17, '2019', 'Information Technology', '3', 'A', '0-0--0-0--0-0--0-0Shit Desktops. Get those changed as soon as possible0-0EQUIPMENTS ARE OUTDATED0-0--0-0--0-0get changes0-0--0-0--0-0--0-0lab condition is not good most of the pcs doesnt work well.0-0LAB CONDITION IS NOT WELL MAINTAINED \r\nCOMPUTERS ARE NOT WORKING PROPERLY0-0only few PCs work in the lab.0-0please provide good sanitation facilities especially for girls0-0lab conditions are worsts and majorities of pcs are not working.there is no cleanliness in washroom as well as classrooms.0-0please provide good working computers for student0-0lab condition are worst and there is no maintenance of commodities in the college0-0Lots computers arent fumctional for DSA and JAVA 0-0Professors are student-friendly. Increase in number of practical sessions is required. Some students are taken away from attending lecture to attend seminars which are meant for higher years. This is wrong...'),
(18, '2019', 'Mechanical Engineering', '3', 'B', '0-0--0-0--0-0Below Average0-0Below Average0-0--0-0Below Average0-0--0-0no comment0-0--0-0--0-0Teachers should learn new teaching techniques 0-0--0-0Ok ok0-0--0-0--0-0No water avaliable in the college in 2nd floor0-0--0-0Good0-0bad workshop faculty, poorly maintained bathrooms0-0needs major technical and general improvements asap0-0--'),
(19, '2019', 'Mechanical Engineering', '5', 'B', '0-0--0-0--0-0--0-0Best Institution0-0--0-0--0-0 SOME LAB EQUIPMENTS IN LABS SUCH AS MMC,HT,ICE,DOM ARE NOT WORKING PROPERLY.\r\n0-0Lab equipmentS are not working properly in MMC LAB and some in DOM,HT0-0Lab equipments of Heat Transfer and Mechanical Measurements and control need to be working properly.  Assignments and experiments must be given in the beginning of the semester.0-0--0-0lab equipments are not working.0-0--0-0Lab equipments of heat transfer and dynamics of machinery should be proper.0-0--0-0--0-0water issue in washroom0-0Maintain hygiene in washroom 0-0Washrooms should have permanent water supply.'),
(20, '2019', 'Information Technology', '7', 'A', '0-0--0-0very good 0-0--0-0Labs need upgrades for the subjects needed for study0-0Computer Systems Should be upgraded.0-0machines should be upgraded0-0Labs need updating0-0PC doesnt work\r\ntoilets smell0-0Need to upgrade the computers in lab as well as lab infrastructure.0-0The computers in the IT department are not functioning and are not upto the required standards.0-0--0-0Please upgrade the labs.0-0lab upgradation required0-0computer lab needs to be upgraded\r\n0-0Poor lab infrastructure 0-0poor washrooms, poor infrastructure.\r\nnot supportive with placements\r\n\r\n\r\n\r\n\r\n0-0--0-0--0-0Lab and infrastructure changes need to be made.No working PC.0-0please keep the toilets clean, hire people to maintain hygiene\r\nplease provide edible water!!!!\r\nimprove and repair lifts, its difficult to climb 6 floors with laptops '),
(21, '2019', 'Information Technology', '5', 'A', '0-0--0-0need working computers.0-0Washrooms has no water. There is no adequate water for drinking. Canteens are not so good. Food is not available all the time.Labs dont have computers.Leakage on the ceiling. Lifts dont work properly.0-0Washrooms does not have water and also they are not clean , lifts dont work properly , PCs in the labs also dont work properly , there is leakage during monsoons. Drinking water not available in the cooler. 0-0--0-0Computer Labs need upgrade in IT0-0Drinking water not available.0-0--0-0--0-0--0-0Need working PCs in Labs0-0GENUINE AND CARING PROFESSORS . GOOD DEPARTMENT0-0water is not available in washrooms and sometimes the washrooms are not cleaned as well as pc is not working in lab0-0somtimes water is not available in the washrooms. Many computers are not working in the lab.0-0somtimes water is not available in the washrooms. Many computers are not working in the lab.0-0Good0-0please maintain the toilets. Sometimes even water supply isnt there. Especially the boys washroom needs to be cleaned.\r\n0-0washrooms are not cleaned regurally and arent provided with water. Labs do not have working pc .0-0good'),
(22, '2019', 'Mechanical Engineering', '7', 'A', '0-0--0-0--0-0--0-0--0-0--0-0--0-0VERY POOR MANAGEMENT OF CANTEEN AND WASHROOMS.0-0--0-0--0-0--0-0Poor infrastructure, dirty washrooms, poor taste and hygienic food of canteen0-0--0-0--0-0infrastructure was not environment friendly.not proper ventilation in class. their for students not sit for the lecture.required to improve teaching faculty0-0providing a good lab for practical sessions \r\nmaintenance of infrastructure especially in B62 and A26 class, leakage problem in rainy season0-0--0-0cleanliness issues. washrooms are never  satisfactory clean and drinking water is never available. hygiene issues. have complained many  times no improvement seen0-0--0-0--0-0--0-0--'),
(23, '2019', 'Mechanical Engineering', '7', 'B', '0-0--0-0--0-0Satisfied0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0--0-0All teachers teach only theory part but no one give the practical example. College never organise Industrial visit for the subject like automobile engineering.We have the lack of practical knowledge so college has to look upon these.0-0--0-0teaching is only for marks not for knowledge. library persons start book bank at the end of the semester. worst behavior of accounts department sends wrong message about the institute. Many times feedback has been taken but there is not improvement in teachers as well as infrastructure of the institute. After visiting NBA college administration even remove pen and papers from complaint box. lab pcs are not working .there is not any practical session where we can say its a practical class. 0-0The PC are not working in the CAD/Cam lab. There are no softwares installed in the PC which are in working conditions. There is no water in the washroom and cleanliness is not there. Students should be motivated other than academic activities as well.0-0very poor management and attitude toward the student is rud 0-0no use of practical session since no PCs is working0-0--0-0We want better computers for Solidworks, ANsys, etc. Rarely any computer works properly. Professors should stop targeting students. Watchmen asks for ID card at gate thats annoying. Why will i go to some other college at 8:30 am in morning. Very stupid rule. We expect to have more books in library which are up to date. Better placements are required. Water filters are bad. Washrooms are bad. We need better facility for the amount we pay. Overall i will rate college 2/5.0-0In practical there is no such lab where we can actually perform the experiments. Not a single computer works in labs. No facilities are provided to us hence after paying such a huge amount of fees. No seriousness towards the practical learning. No proper software available. Many classrooms and not properly maintained. No proper projector in classes. Drinking water is the worst, We have to fill water from outside or purchase from canteen. When we pay such a huge amount so we at least expect to get some basic facilities like proper drinking water, clean toilet, Proper classrooms, Working computers, cad, cam software, proper maintained Practical labs. Rest all things are good. 0-0more placements are needed in mechanical engineering. 0-0The institute doesnt provide safe drinking water and hygienic restrooms. Institute should also support different teams and committees working in the different fields of engineering. The knowledge they gain from those stuff is much more important than the outdated knowledge they are gaining in lecture. 0-0The washrooms arent maintained properly at all ! Hygiene is a very important aspect of life and it should be given the highest priority. The working student bodies in the institute should be provided with moral and financial support as they represent the institute in various national and international level programs and competitions. 0-0--'),
(24, '2019', 'Electronics and Telecommunication', '5', 'A', '0-0--0-0--0-0 0-0new equipments requires and better toilets and canteen needed. 0-0no proper management lack of facilities and need many new components in lab as there are not in working condition and then teachers see as students fault and tend to five less marks in exams a lot of biasness can be seen among techers0-0the lab equipments do not work, espically the computers.\r\nthe fans in the classroom do not work properly.\r\n0-0lab equipment are old they can change it\r\n0-0--0-0--0-0lab maintance is not proper, pcs are not working, No fresh water and yeah we need ac0-0washroom water issue. computers in lab are not working,0-0Although faculty is good ,With lack of good and working lab equipments. The college has been highly ignorant about the infrastructure and equipments available to student. The college spirit is killed then and there.\r\ninfrastructure also lacks cleanliness. No purified water is available .\r\nThe college is not at all responsive about the needs of the student .\r\nalthough complaining hundreds of time nothing is considered or acted upon.  \r\nNo regards for the pressure put on the students  during the final weeks .\r\n0-0Poor facilities such as bad washrooms,no water facility,poor infrastructure,Aged tools and equipment,No computers working in labs.0-0Fix bathroom,add ACs,cleanliness could be better,no computer working in computer lab.0-0classes ,washrooms are not clean.\r\nno water facility in washrooms\r\nonly 2 computers work out of 25 computers\r\n\r\n0-0Less equipments , no proper washroom facility. Provide sufficient amount of computers so that students can have a good experience and perform their practical well.0-0No good hygienic facility,no water facility,bad quality of drinking water,no action is taken after many complaints,no sports ground or no physical activity conducted by college 0-01. motivate students for various competitions and provide facilities.\r\n2. poor infrastructure and less electronic equipments in practicals which leads in  decreasing our practical knowledge.\r\n3. provide appropriate schedulde for project work. \r\n4. toilets and water facilities should be improved.\r\n5. lack of teaching skills in some faculties.\r\n6. should provide us an internship which will helps us in building a good cv .0-0Washrooms are PATHETIC. Doesnt feel like we are in a college in mumbai versova. The attitude of most of the staff and peons is not satisfactory. They have alot of attitude. Computers dont work at all. ALSO THESE FEEDBACKS WONT BE LOOKED UPON TO0-01.washrooms are inadequate\r\n2.no mirrors in any washroom of the college\r\n3.less availability of latest books in library\r\n4.lack of computers in library\r\n5.no internet connections\r\n6.we have to give our own internet connection for use\r\n7.In some class room fans are not working, and after complaining it to HOD he is like you should write a letter to me about this \r\n8.In labs most of the COMPUTERS  (APPROXIMATELY 8/10) are not in working conditions.\r\n9.no proper supply of water\r\naur wo railway concession wale ko kis baat ki akad hai pata nahi\r\nprincipal se jyada akad mai toh wo rehta hai............0-0Toilets arent clean and at times there is no water supply. Lack of computer instruments in the lab which makes it difficult for the students to get the practical knowledge of the softwares which are being used. Administration, accounts and examination cell staffs are very rude and not helpful at times.  '),
(25, '2019', 'Electronics and Telecommunication', '5', 'B', '0-0fans are not working properly,computer in the labs are not working,lab assistants of few labs should behave properly0-0please instruct the faculty inform the students regarding the presentations,mini projects,etc work at the beginning to the sem as it becomes a burden on the students to cope with all these stuffs collectively at the end0-0journals and assignments should be given before so that the exams and submissions would not collapse so as to get ample amount of time for self study and also the laboratory equipment should be provided sufficiently.0-0I think the  practical materials should be provided.0-0AVERAGE\r\n0-0How do you all expect us to to do practicals when there are only 3-4 PCs of the total PCs working in Signal processing and MES lab?0-0--0-0Practical knowledge should be provided more.Infrastructure problem.should be more concentrated on real time projects.0-0Please install ACs in the classrooms, the class strength is 75. Please buy new PCs for all the labs as everyone of them is obsolete and all of them have stopped working and our work is delayed. Please clean the washrooms more frequently and PLEASE PUT PARTITIONS BETWEEN THE URINALS.0-0most of the computers in labs are not working. washrooms are not clean0-0need basic facilties indeed in a institution\r\n-proper working PCs, better CROs\r\n-clean washrooms\r\n-better ventilation in labs as well as classroom\r\n0-0practical is something very crucial. but in out institue for performing practicaly hardly there is one or two pc works between 30students and institute is not paying attention to this problem. also mini project and lot of assignment are bombared at the end of semester which puts pressure on students and due to which we get less time for studying so all this works should be given before hand so there is no last moment burden.0-0majority computers do not work in the labs which causes difficulties in performing. fans do not work. 0-0very good0-01. Lots of Pcs are not working properly\r\n0-0practical labs should be well maintain.0-0please install pcs that are working and please insatll AC0-0lack of computers in every lab , nor recent version of softwareis used, computer are not in operating mode during practical session only 4 to 5 working computer in batch of 30 students. subject also becomes burden full when teacher ask for presentation , report, assignment ,tutorial ,project everything for one subject. 0-0please maintain some equipment in the practical lab & please encourage sports in college. Give some funds to sports commity 0-0nurture sports in college that is the elementary need of student to perform well in mental health.give some more fund to sports commitee. provide good equipments in lab especially computers'),
(26, '2019', 'Electronics and Telecommunication', '3', 'A', '0-0--0-0proper drinking water is not available.0-0--0-0--0-0should maintain labs \r\nwashroom should be clean\r\nmaintance of classrom \r\nsome of instruments in lab should be change0-0washroom is untidy and drinking water is not available\r\nfans are not working properly\r\n0-0can improve sanitation in washroom and improve management behavior\r\nand management   0-0--0-0 sitting arrangement in college premises. \r\nno drinking water available.0-0Sitting arrangement in cafeteria should be provided, usually girls washrooms are not clean  0-0--0-0seating arrangement in College Premises\r\nno drinking water available\r\nfans not working in Classroom0-0we wnt new fans and tubelights \r\nwe want edc teacher change asap\r\nwe want good light connection\r\nexamination cell is anoying and dont help us \r\nand last thing sir who provide us train pass is is mad you should change him 0-0kindly replace the fan 0-0--0-0--0-0 Fans and lights in classes arent working properly and please clean washroom ,DS lab beside 4th floor boys washroom always smell bad . Beside this faculty are very helpful regarding subjects and helps us with management and also cmputers during practical are not sufficient for practicing ,Else everything is satifactorily good0-0--0-0bhathrooms not clean should clean them and there is always guthka spitted in bathroom abviosly it is not any stydent who eats it and does it it must be the staff of the college every thing else in college is the best0-0college is very good only the some of the EXTC faculty are very bad and do not have much knowledge about their subject and and having the bad attitude with the students and do not give the question banks0-0better infrasrtucture0-0institute is great, loved it. Please expand the Canteen.'),
(27, '2019', 'Electronics and Telecommunication', '3', 'B', '0-0EXCELLENT0-0--0-0very good0-0fans were not working properly.\r\nmany there is no water in washroom.\r\n0-0good0-0faculties can be improved\r\nwater purifier need to be be installed \r\n0-0none0-0Faculty change must be considered, as some teachers are below par in their teaching ability, and often are not sympathetic with student problems as submissions and assignment overload affects us deeply/\r\n\r\nOther issues include water filter not providing clean or drinkable water, ventilation in college often very poor, e.t.c. Lesser assignment/submissions and more extra-curricular activities should be considered.0-0--0-0moderate 0-0modaret0-0meh0-0NOT THE GREATEST BUT I AM HAPPY WITH INSTITUTE0-0--0-0--0-0--0-0PLEASE IMPROVE REST ROOM AND WATER FACILITIES IN INSTITUTE0-0--0-0--0-0Poor infrastructure. poor supply of water sometimes there is no water available for drinking as well as in the washrooms which can be dangerous to the health of the student . No ACs in the lab. Not  Sufficient  PCs . LIfts are no working etc etc....... 0-0The infrastructure is very poor. There isnt proper supply for water. The PC are very old and few we have to do our Java practical in a noisy environment with 3 students on one PC. The lifts are not working properly. The recess time should be increase to 1 hour.');

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
  `status` int(100) NOT NULL DEFAULT 0,
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

INSERT INTO `feedback_ques` (`fbq_id`, `status`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `ans5`) VALUES
(1, 1, 'HOW DOES THE TEACHER EXPLAIN THE SUBJECT?', 'Exceedingly Well', 'Adequately Well', 'Reasonably Well', 'Inadequate', 'Totally Inadequate'),
(2, 1, 'HOW IS THE LANGUAGE AND COMMUNICATION OF THE TEACHER ?', 'Excellent', 'Very Good', 'Good', 'Satisfactory', 'Poor'),
(3, 1, 'HOW MUCH OPPORTUNITY DOES THE TEACHER GIVE FOR Q & A ?', 'Ample Opportunity', 'Sufficient Opportunity', 'Occasional Opportunity', 'Rare Opportunity', 'Never'),
(4, 0, 'HOW IS THE TEACHER\'S CONTROL AND COMMAND OVER THE CLASS ?', 'Maintains Good Discipline', 'Maintains Reasonable Discipline', 'Some Disorder in class', 'Class is Frequently Disordered', 'Class is Noisy'),
(5, 1, 'HOW DOES THE TEACHER STIMULATE YOU TO THINK ABOUT THE SUBJECT ?', 'Highly Stimulating', 'Adequately Stimulating', ' Stimulating', 'Rarely Stimulating', 'Never'),
(6, 1, 'WHAT IS THE ATTITUDE OF THE TEACHER TOWARDS YOU ?', 'Usually Sympathetic and Helpful', 'Sometimes Sympathetic and Helpful', 'Sympathetic', 'Avoids Personal Contact', 'Appears Indifferent'),
(7, 1, 'HOW MUCH OF THE SYLLABUS DOES THE TEACHER COMPLETE ?', 'Above 90%', '75% - 90%', '60% - 75%', '50% - 60%', 'Below 50%'),
(8, 0, 'DOES THE TEACHER VICTIMIZE SOME STUDENTS ?', 'Never', 'Occasionally', 'Frequently', 'Usually', 'Always'),
(9, 0, 'HOW MUCH OF CLASS TIME DOES TEACHER USE FOR TEACHING THE SUBJECT AND DOESNT DIVIATE ?', 'Above 90%', '75% - 90%', '60% - 75%', '50% - 60%', 'Below 50%'),
(10, 1, 'DOES THE TEACHER SHOW FAVOURITEISM TOWARDS THE STUDENTS IN OR OUTSIDE CLASS ?', 'Never', 'Occasionally', 'Frequently', 'Very Often', 'Always'),
(11, 0, 'WHEN DOES THE TEACHER RETURN THE CORRECTED PERIODIC TEST OR ASSIGNMENT ?', 'Within a Week', 'Within a Fortnight', 'Within 3 Weeks', 'After a Month', 'Never'),
(12, 0, 'HOW PUNTUAL IS THE TEACHER WHEN COMING TO THE CLASS ?', 'Always on time', 'Occasionally Late', 'Frequently Late', 'Often Late', 'Never on Time'),
(13, 1, 'Is the teacher available online for solving doubts?', 'Always ', 'Very often', 'Frequently', 'Occasionally', 'Never'),
(14, 1, 'Does the teacher give ample online tasks to keep the class active ?', 'Ample Opportunity', 'Sufficient Opportunity', 'Occasional Opportunity', 'Rare Opportunity', 'Never'),
(15, 1, 'How is the teacher’s grasp over concept of online lectures ?', 'Excellent', 'Very Good', 'Good', 'Satisfactory', 'Poor'),
(16, 1, 'What is the turn over time of online/offline assignments and tasks?', 'Within a Week', 'Within a Fortnight', 'Within 3 Weeks', 'After a Month', 'Never'),
(17, 1, 'How often does the teacher provide online notes and tasks?', 'Always ', 'Very often', 'Frequently', 'Occasionally', 'Never');

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

--
-- Dumping data for table `feedback_temp`
--

INSERT INTO `feedback_temp` (`fbt_id`, `teacher_id`, `sub_id`, `div_id`, `ques1`, `ques2`, `ques3`, `ques4`, `ques5`, `ques6`, `ques7`, `ques8`, `ques9`, `ques10`, `ques11`, `ques12`, `remark`) VALUES
(1, '58', '186', 'A', '3', '4', '5', '5', '5', '4', '5', '3', '5', '5', '5', '5', '--'),
(2, '69', '187', 'A', '4', '3', '3', '4', '2', '5', '5', '1', '4', '5', '5', '5', '--'),
(3, '106', '188', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '--'),
(4, '59', '189', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '--'),
(5, '64', '190', 'A', '4', '4', '3', '5', '3', '3', '4', '4', '4', '5', '3', '5', '--'),
(6, '65', '191', 'A', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '--'),
(7, '58', '186', 'A', '4', '4', '4', '5', '5', '4', '5', '5', '4', '4', '4', '4', '--'),
(8, '69', '187', 'A', '2', '2', '3', '3', '3', '2', '3', '4', '3', '1', '2', '3', '--'),
(9, '106', '188', 'A', '5', '5', '4', '4', '5', '3', '5', '4', '4', '4', '5', '3', '--'),
(10, '59', '189', 'A', '5', '5', '5', '5', '5', '4', '5', '5', '5', '5', '5', '5', '--'),
(11, '64', '190', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '--'),
(12, '65', '191', 'A', '5', '5', '5', '5', '5', '4', '4', '5', '4', '5', '5', '5', '--'),
(13, '58', '186', 'A', '4', '4', '5', '5', '5', '4', '5', '5', '5', '3', '5', '4', '--'),
(14, '69', '187', 'A', '3', '2', '2', '2', '1', '3', '3', '1', '2', '2', '3', '2', '--'),
(15, '106', '188', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '3', '4', '--'),
(16, '59', '189', 'A', '4', '4', '4', '4', '5', '4', '5', '5', '5', '4', '5', '5', '--'),
(17, '64', '190', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '--'),
(18, '65', '191', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '--'),
(19, '58', '186', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '--'),
(20, '69', '187', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '--'),
(21, '106', '188', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '--'),
(22, '59', '189', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '--'),
(23, '64', '190', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '--'),
(24, '65', '191', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '--'),
(25, '58', '186', 'A', '3', '3', '5', '4', '5', '3', '1', '5', '5', '4', '4', '5', '--'),
(26, '69', '187', 'A', '4', '2', '4', '4', '5', '4', '2', '4', '4', '4', '4', '4', '--'),
(27, '106', '188', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '--'),
(28, '59', '189', 'A', '5', '5', '5', '5', '5', '3', '4', '4', '4', '4', '4', '5', '--'),
(29, '64', '190', 'A', '5', '4', '5', '5', '3', '4', '5', '3', '5', '4', '5', '5', '--'),
(30, '65', '191', 'A', '5', '5', '5', '4', '5', '4', '5', '5', '5', '5', '5', '5', '--'),
(31, '58', '186', 'A', '3', '3', '3', '3', '3', '4', '4', '3', '3', '3', '3', '3', '--'),
(32, '69', '187', 'A', '4', '5', '4', '4', '5', '5', '5', '4', '4', '4', '4', '4', '--'),
(33, '106', '188', 'A', '4', '4', '4', '4', '4', '5', '5', '4', '4', '4', '4', '4', '--'),
(34, '59', '189', 'A', '3', '3', '3', '3', '1', '4', '2', '3', '2', '2', '3', '2', 'Too much FAVOURITEISM'),
(35, '64', '190', 'A', '5', '5', '5', '5', '5', '5', '4', '5', '5', '5', '5', '5', '--'),
(36, '65', '191', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '--'),
(37, '58', '186', 'A', '3', '2', '3', '3', '5', '3', '5', '3', '3', '3', '5', '2', '--'),
(38, '69', '187', 'A', '4', '3', '5', '5', '4', '4', '5', '2', '3', '3', '5', '3', '--'),
(39, '106', '188', 'A', '5', '5', '5', '5', '5', '4', '5', '5', '5', '5', '5', '5', '--'),
(40, '59', '189', 'A', '5', '5', '5', '5', '5', '4', '5', '5', '5', '5', '5', '5', '--'),
(41, '64', '190', 'A', '5', '5', '5', '5', '4', '4', '4', '5', '5', '4', '5', '5', '--'),
(42, '65', '191', 'A', '5', '5', '5', '5', '5', '4', '5', '5', '5', '5', '5', '5', '--'),
(43, '58', '186', 'A', '4', '5', '5', '5', '5', '4', '5', '5', '5', '4', '5', '4', '--'),
(44, '69', '187', 'A', '4', '4', '5', '5', '5', '4', '5', '5', '5', '4', '5', '4', '--'),
(45, '106', '188', 'A', '4', '4', '4', '4', '4', '4', '5', '4', '4', '4', '5', '4', '--'),
(46, '59', '189', 'A', '5', '4', '4', '5', '5', '4', '5', '5', '5', '5', '3', '4', '--'),
(47, '64', '190', 'A', '5', '5', '5', '5', '5', '4', '5', '5', '5', '5', '5', '4', '--'),
(48, '65', '191', 'A', '5', '5', '5', '5', '5', '4', '5', '5', '5', '5', '5', '4', '--'),
(49, '58', '186', 'A', '3', '3', '5', '4', '5', '4', '5', '5', '3', '2', '5', '4', 'Abhay patil sir always gives his best for the explanation of a topic but the only thing that i feel he needs to improve is his method of delivering a lecture!'),
(50, '69', '187', 'A', '3', '4', '4', '5', '5', '4', '5', '4', '3', '3', '5', '2', '--'),
(51, '106', '188', 'A', '4', '4', '4', '4', '5', '4', '4', '4', '4', '4', '5', '3', 'He is a very good teacher!!'),
(52, '59', '189', 'A', '3', '4', '4', '4', '5', '4', '5', '5', '5', '5', '5', '4', 'Anushree maam is an excellent teacher!'),
(53, '64', '190', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '3', '5', 'Swapnil sir is indeed very hardworking and one of the best teachers of IT department!'),
(54, '65', '191', 'A', '4', '5', '5', '5', '5', '4', '4', '5', '5', '5', '5', '5', 'We really enjoy in the lectures of yogita maam!\r\n'),
(55, '58', '186', 'A', '4', '5', '3', '4', '5', '5', '5', '5', '5', '4', '5', '5', 'Sir is really good in teaching '),
(56, '69', '187', 'A', '4', '5', '4', '4', '5', '4', '5', '4', '4', '4', '4', '4', 'Sir is really having lots of knowledge '),
(57, '106', '188', 'A', '5', '4', '4', '4', '5', '4', '5', '4', '4', '4', '5', '5', 'The way Sir is trying to convey their knowledge or any concept is good '),
(58, '59', '189', 'A', '4', '4', '4', '4', '5', '4', '4', '4', '4', '4', '5', '5', 'Ma\'am is good in teaching '),
(59, '64', '190', 'A', '5', '5', '4', '5', '5', '4', '5', '5', '4', '5', '5', '5', 'Sir is having lots of knowledge and also he is always try to give that knowledge to the students '),
(60, '65', '191', 'A', '4', '5', '4', '5', '5', '4', '5', '4', '4', '5', '4', '5', 'Ma\'am is good in teaching and also she is trying to give real time examples '),
(61, '58', '186', 'A', '4', '4', '3', '3', '3', '3', '5', '4', '4', '1', '5', '4', '--'),
(62, '69', '187', 'A', '3', '3', '3', '4', '3', '4', '5', '2', '3', '4', '5', '2', '--'),
(63, '106', '188', 'A', '4', '3', '3', '4', '4', '4', '4', '2', '1', '3', '5', '4', '--'),
(64, '59', '189', 'A', '4', '3', '4', '4', '5', '4', '1', '4', '4', '2', '5', '4', '--'),
(65, '64', '190', 'A', '4', '3', '2', '4', '4', '4', '4', '3', '4', '4', '5', '3', '--'),
(66, '65', '191', 'A', '4', '3', '4', '5', '4', '4', '5', '4', '4', '3', '5', '4', '--'),
(67, '58', '186', 'A', '3', '2', '3', '2', '3', '4', '5', '4', '5', '1', '5', '5', '--'),
(68, '69', '187', 'A', '3', '3', '2', '5', '2', '3', '5', '2', '3', '3', '5', '1', '--'),
(69, '106', '188', 'A', '4', '4', '4', '5', '4', '4', '3', '2', '3', '3', '5', '4', '--'),
(70, '59', '189', 'A', '4', '4', '3', '5', '4', '4', '2', '4', '4', '3', '5', '5', '--'),
(71, '64', '190', 'A', '4', '3', '2', '4', '3', '5', '3', '4', '4', '4', '4', '4', '--'),
(72, '65', '191', 'A', '3', '3', '4', '5', '4', '2', '4', '5', '5', '3', '3', '3', '--'),
(73, '58', '186', 'A', '3', '5', '4', '4', '5', '4', '5', '3', '3', '3', '3', '3', '--'),
(74, '69', '187', 'A', '4', '4', '4', '4', '4', '4', '4', '2', '2', '3', '2', '3', '--'),
(75, '106', '188', 'A', '5', '5', '4', '4', '5', '4', '4', '4', '4', '4', '4', '4', '--'),
(76, '59', '189', 'A', '4', '4', '3', '4', '4', '4', '4', '4', '3', '4', '5', '3', '--'),
(77, '64', '190', 'A', '5', '5', '5', '5', '5', '5', '5', '4', '4', '4', '4', '5', '--'),
(78, '65', '191', 'A', '4', '4', '4', '4', '3', '4', '4', '3', '3', '3', '4', '4', '--'),
(79, '58', '186', 'A', '2', '2', '2', '2', '3', '3', '2', '2', '3', '2', '3', '3', '--'),
(80, '69', '187', 'A', '3', '2', '4', '3', '3', '3', '3', '2', '3', '3', '3', '3', '--'),
(81, '106', '188', 'A', '3', '3', '3', '3', '4', '3', '3', '3', '3', '3', '4', '3', '--'),
(82, '59', '189', 'A', '3', '3', '3', '2', '3', '3', '2', '3', '3', '3', '3', '3', '--'),
(83, '64', '190', 'A', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '--'),
(84, '65', '191', 'A', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '--'),
(85, '58', '186', 'A', '3', '4', '3', '3', '5', '4', '5', '4', '3', '2', '1', '3', 'There have not been any online lectures for this subject.'),
(86, '69', '187', 'A', '4', '3', '3', '3', '3', '4', '4', '2', '1', '2', '1', '2', '--'),
(87, '106', '188', 'A', '3', '3', '3', '3', '4', '4', '4', '2', '1', '2', '1', '1', '--'),
(88, '59', '189', 'A', '3', '3', '3', '4', '5', '4', '4', '3', '3', '3', '1', '2', '--'),
(89, '64', '190', 'A', '4', '3', '3', '3', '4', '4', '4', '2', '3', '3', '1', '2', '--'),
(90, '65', '191', 'A', '4', '4', '4', '4', '5', '4', '4', '3', '4', '3', '2', '2', '--'),
(91, '58', '186', 'A', '3', '4', '3', '3', '5', '4', '5', '4', '3', '2', '1', '3', 'There have not been any online lectures for this subject.'),
(92, '69', '187', 'A', '4', '3', '3', '3', '3', '4', '4', '2', '1', '2', '1', '2', '--'),
(93, '106', '188', 'A', '3', '3', '3', '3', '4', '4', '4', '2', '1', '2', '1', '1', '--'),
(94, '59', '189', 'A', '3', '3', '3', '4', '5', '4', '4', '3', '3', '3', '1', '2', '--'),
(95, '64', '190', 'A', '4', '3', '3', '3', '4', '4', '4', '2', '3', '3', '1', '2', '--'),
(96, '65', '191', 'A', '4', '4', '4', '4', '5', '4', '4', '3', '4', '3', '2', '2', '--'),
(97, '58', '186', 'A', '4', '4', '4', '4', '4', '4', '3', '5', '4', '4', '4', '5', '--'),
(98, '69', '187', 'A', '3', '3', '3', '3', '4', '3', '3', '2', '2', '2', '4', '3', '--'),
(99, '106', '188', 'A', '5', '5', '5', '5', '5', '5', '5', '4', '4', '5', '4', '5', '--'),
(100, '59', '189', 'A', '5', '5', '5', '5', '5', '4', '3', '4', '5', '5', '5', '5', '--'),
(101, '64', '190', 'A', '5', '5', '5', '5', '5', '5', '2', '4', '5', '5', '5', '5', '--'),
(102, '65', '191', 'A', '5', '5', '5', '5', '5', '4', '5', '5', '5', '5', '5', '5', '--'),
(103, '67', '192', 'A', '4', '4', '3', '4', '5', '5', '5', '5', '4', '4', '3', '4', '--'),
(104, '62', '193', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '4', '4', '3', '5', '--'),
(105, '65', '196', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '3', '5', '--'),
(106, '107', '197', 'A', '5', '5', '5', '4', '5', '5', '4', '5', '4', '5', '3', '4', '--'),
(107, '67', '195', 'A', '5', '4', '5', '4', '5', '5', '5', '4', '5', '5', '3', '5', '--'),
(108, '59', '195', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '3', '5', '--'),
(109, '67', '192', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '--'),
(110, '62', '193', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'Overall nice'),
(111, '65', '196', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '--'),
(112, '107', '197', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '--'),
(113, '', '', 'A', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '--'),
(114, '67', '192', 'A', '4', '4', '4', '4', '4', '4', '4', '3', '3', '4', '3', '3', '--'),
(115, '62', '193', 'A', '5', '4', '5', '5', '5', '5', '4', '5', '5', '5', '4', '5', '--'),
(116, '65', '196', 'A', '4', '4', '5', '5', '5', '5', '4', '5', '4', '5', '4', '5', '--'),
(117, '107', '197', 'A', '4', '3', '3', '3', '3', '4', '3', '3', '3', '2', '3', '3', '--'),
(118, '67', '195', 'A', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '--'),
(119, '59', '195', 'A', '3', '3', '3', '3', '3', '4', '3', '3', '3', '3', '4', '3', '--'),
(120, '67', '192', 'A', '4', '4', '4', '4', '4', '4', '5', '4', '4', '5', '5', '4', '--'),
(121, '62', '193', 'A', '3', '4', '4', '4', '4', '4', '4', '5', '4', '4', '5', '5', '--'),
(122, '65', '196', 'A', '3', '5', '4', '4', '4', '5', '4', '3', '4', '5', '5', '4', '--'),
(123, '107', '197', 'A', '4', '4', '4', '3', '4', '5', '5', '4', '4', '4', '5', '5', '--'),
(124, '69', '194', 'A', '4', '4', '5', '4', '5', '4', '5', '5', '5', '5', '5', '5', '--'),
(125, '67', '192', 'A', '3', '2', '3', '4', '5', '3', '5', '4', '3', '3', '4', '1', '--'),
(126, '62', '193', 'A', '5', '5', '4', '5', '5', '4', '5', '4', '3', '4', '3', '4', '--'),
(127, '65', '196', 'A', '5', '5', '5', '4', '5', '5', '5', '5', '5', '4', '3', '5', '--'),
(128, '107', '197', 'A', '2', '1', '4', '2', '3', '2', '5', '1', '1', '4', '2', '2', '--'),
(129, '67', '195', 'A', '4', '3', '4', '4', '4', '4', '5', '4', '4', '4', '4', '4', '--'),
(130, '59', '195', 'A', '4', '5', '5', '5', '5', '4', '5', '5', '5', '5', '4', '5', '--');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_addr`
--

INSERT INTO `mail_addr` (`mail_id`, `mail`, `mail_hash`, `mail_dept`, `mail_sem`, `mail_div`, `fb_link`) VALUES
(21, 'danishmohdsalim@gmail.com', '8adaea9cf52fa4a4234097f39ceb3a156abf40d2', 'Information Technology', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=8adaea9cf52fa4a4234097f39ceb3a156abf40d2'),
(22, 'ashutoshbansode4512@gmail.com', 'd4dc1cbae4e5bc2f49659d84c1700d28ae90b8e6', 'Information Technology', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=d4dc1cbae4e5bc2f49659d84c1700d28ae90b8e6'),
(23, 'desaishami99@gmail.com', '18b6eb19007a3df75d808c3bb5b71d62fe8c868b', 'Information Technology', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=18b6eb19007a3df75d808c3bb5b71d62fe8c868b'),
(24, 'pooja18dundgekar22@gmail.com', '333d645cb5fa4774fab074ffd021c1a49ce3e8d8', 'Information Technology', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=333d645cb5fa4774fab074ffd021c1a49ce3e8d8'),
(26, 'priyagovekar505@gmail.com', '9bf58addc8229273777ed253a801cdaa27af6381', 'Information Technology', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=9bf58addc8229273777ed253a801cdaa27af6381'),
(27, 'guptakrishna613@gmail.com', '0d13c2ce7679f9b2524a9c04ee307ca3f3fd9633', 'Information Technology', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=0d13c2ce7679f9b2524a9c04ee307ca3f3fd9633'),
(28, 'sg198374@gmail.com', 'e36651fd51fb75f33dbebbc23f1a882ae1032e74', 'Information Technology', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=e36651fd51fb75f33dbebbc23f1a882ae1032e74'),
(30, 'jshreyas.sj@gmail.com', 'a236c50f4627caa6c31078f7346c01879edf51bb', 'Information Technology', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=a236c50f4627caa6c31078f7346c01879edf51bb'),
(31, 'jaiswalashish405@gmail.com', '2981ea2884d4b7b927a106152f46aa789d3e2bd9', 'Information Technology', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=2981ea2884d4b7b927a106152f46aa789d3e2bd9'),
(32, 'grishah1999@gmail.com', '7f56e25019e91c57aca24febb7f43fff4b1ef824', 'Information Technology', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=7f56e25019e91c57aca24febb7f43fff4b1ef824'),
(35, 'atharvap2000@gmail.com', '896cdc2241e50b72b777227aeb0b91c429e6e682', 'Information Technology', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=896cdc2241e50b72b777227aeb0b91c429e6e682'),
(36, 'athu.a911@gmail.com', '635a0c278cd86ca1b3f131899450732c6b02a40d', 'Information Technology', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=635a0c278cd86ca1b3f131899450732c6b02a40d'),
(37, 'alamsahabe03@gmail.com', 'ebc716eac5a32847af6a10948184e92cec9a560d', 'Information Technology', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=ebc716eac5a32847af6a10948184e92cec9a560d'),
(39, 'riyasingh101199@gmail.com', 'eaac6d3160df94cccd597055fe279cf5092a24b8', 'Information Technology', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=eaac6d3160df94cccd597055fe279cf5092a24b8'),
(40, 'shreyasingh150899@gmail.com', '37c2d9bb480043b2311178496ec8439c300769ce', 'Information Technology', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=37c2d9bb480043b2311178496ec8439c300769ce'),
(41, 'swaminath1999@gmail.com', '575e7507d23323de81b5d2c7047cb46c523e848e', 'Information Technology', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=575e7507d23323de81b5d2c7047cb46c523e848e'),
(42, 'shru821999@gmail.com', '158f24da2541307ec4303c76289251a97c5c47f6', 'Information Technology', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=158f24da2541307ec4303c76289251a97c5c47f6'),
(43, 'nc59774@gmail.com', '664e618caac61b0dd78729d9c22126252103ed83', 'Information Technology', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=664e618caac61b0dd78729d9c22126252103ed83'),
(44, 'damania00@gmail.com', '5f765dcc38fa36697a4efa7359aaa006f636525e', 'Information Technology', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=5f765dcc38fa36697a4efa7359aaa006f636525e'),
(45, 'rauldhruva1@gmail.com', '51275825b510dfe46be592fff708155b40303713', 'Information Technology', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=51275825b510dfe46be592fff708155b40303713'),
(46, 'shraddhagangurde9@gmail.com', 'bd2ca8b3b32364d47f718624b51f2e67716b3600', 'Information Technology', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=bd2ca8b3b32364d47f718624b51f2e67716b3600'),
(47, 'rg173602@gmail.com', 'ef6260fd4db7a04d3cf19614b1655ea7ecec2f9d', 'Information Technology', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=ef6260fd4db7a04d3cf19614b1655ea7ecec2f9d'),
(48, 'mrujams2098@gmail.com', '3b7d3e9ca105a1188946e444413353cdaca65c50', 'Information Technology', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=3b7d3e9ca105a1188946e444413353cdaca65c50'),
(49, 'shubhamdk15@gmail.com', '7491dec55c1181ffffc4c0063cf9f26b545a1273', 'Information Technology', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=7491dec55c1181ffffc4c0063cf9f26b545a1273'),
(50, 'negandhivanshi@gmail.com', 'da51dbf53fe95cf8da284b5117c2132d6aff8709', 'Information Technology', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=da51dbf53fe95cf8da284b5117c2132d6aff8709'),
(51, 'aayushnagvekar879@gmail.com', '41f79d3c0ab013097c48b736774e3fae80f64174', 'Information Technology', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=41f79d3c0ab013097c48b736774e3fae80f64174'),
(52, 'negidharmendra98@gmail.com', 'af94445c2a3fa342aec8891a68214b5e6b3f7749', 'Information Technology', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=af94445c2a3fa342aec8891a68214b5e6b3f7749'),
(53, 'nishipancholi98@gmail.com', '0f4635b16e6148831a19df1b5f7ac6367d5cc2c9', 'Information Technology', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=0f4635b16e6148831a19df1b5f7ac6367d5cc2c9'),
(54, 'mayank74pathak@gmail.com', '5ac48e77611147e65b63647e10019d59224639cd', 'Information Technology', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=5ac48e77611147e65b63647e10019d59224639cd'),
(55, 'aniesha.razdan11@gmail.com', 'c636672a2ddf78c057054f453159d9f2189befb5', 'Information Technology', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=c636672a2ddf78c057054f453159d9f2189befb5'),
(56, 'keithrebello4376@gmail.com', '2ba431acf7b8c920491ac81f6a76504adf0eaa24', 'Information Technology', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=2ba431acf7b8c920491ac81f6a76504adf0eaa24'),
(57, 'sachdevarishabh04@gmail.com', '8ac827cf7ba44a4bf996bef1c33deaf894407dec', 'Information Technology', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=8ac827cf7ba44a4bf996bef1c33deaf894407dec'),
(58, 'ssaurabh1510@gmail.com', '0b783b020563f36809ab2c844073d4a1a68f49f3', 'Information Technology', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=0b783b020563f36809ab2c844073d4a1a68f49f3'),
(59, 'shreyamsshetty@gmail.com', 'a67474d9307a99a250de4b811eb4762f9f19906b', 'Information Technology', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=a67474d9307a99a250de4b811eb4762f9f19906b'),
(60, 'jigzztailor@gmail.com', '90e0731dba75586f1c5221a158e35b701278a268', 'Information Technology', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=90e0731dba75586f1c5221a158e35b701278a268'),
(61, 'mehultiwari2449@gmail.com', '545ba63ff7cb3bbb19380898086779a27d0c873b', 'Instumentation Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=545ba63ff7cb3bbb19380898086779a27d0c873b'),
(62, 'cbhagwat20@gmail.com', 'c616e9441f007d8dab5d9f69d46bfe4d4da84715', 'Instumentation Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=c616e9441f007d8dab5d9f69d46bfe4d4da84715'),
(63, 'amey12333@gmail.com', '71b8453e02ac9c1768faba78154f2ca7fe6bac8c', 'Instumentation Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=71b8453e02ac9c1768faba78154f2ca7fe6bac8c'),
(64, 'churipurva@gmail.com', '3351bd8a89885990d58ca16001cca35a15326b08', 'Instumentation Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=3351bd8a89885990d58ca16001cca35a15326b08'),
(65, 'ajain08521@gmail.com', 'cd1509c075cc04525458bc78b0a0c2b4cb4d6fc9', 'Instumentation Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=cd1509c075cc04525458bc78b0a0c2b4cb4d6fc9'),
(66, 'abhishekkarir28@gmail.com', '952b7b3c14ffcea83bc3fe0d887c300105835c7e', 'Instumentation Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=952b7b3c14ffcea83bc3fe0d887c300105835c7e'),
(67, 'rameezmansuri09@gmail.com', '4adc7f493523a1a46fa070ef112d7d4121e08812', 'Instumentation Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=4adc7f493523a1a46fa070ef112d7d4121e08812'),
(68, 'smartaddu2108@gmail.com', '11cf81d3eda7e8fe7a709fb94e736dfc301d3554', 'Instumentation Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=11cf81d3eda7e8fe7a709fb94e736dfc301d3554'),
(69, 'rahulksardar@gmail.com', 'fbc0bf0f72f59a07fb307110334b7be5d3d914cc', 'Instumentation Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=fbc0bf0f72f59a07fb307110334b7be5d3d914cc'),
(70, 'shimlesahil@gmail.com', '338c18244322c2098ce1f9025a9eb437d5efd8e4', 'Instumentation Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=338c18244322c2098ce1f9025a9eb437d5efd8e4'),
(71, 'aakashshinde426@gmail.com', '6558e1fe71cc59728d6295bd386c8149b6c36e79', 'Instumentation Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=6558e1fe71cc59728d6295bd386c8149b6c36e79'),
(72, 'sohamvetkar9@gmail.com', 'fdf652c8458fc96f4cd23cd03aac2d48cf6bd3ea', 'Instumentation Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=fdf652c8458fc96f4cd23cd03aac2d48cf6bd3ea'),
(73, 'rsgaikwad2341@gmail.com', 'd21c542f8add363c536a03de3adb9ef9b4441568', 'Instumentation Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=d21c542f8add363c536a03de3adb9ef9b4441568'),
(74, 'jadhav.sonali515@gmail.com', 'c0965c0424419c5369398f7315defcb8715d504d', 'Instumentation Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=c0965c0424419c5369398f7315defcb8715d504d'),
(75, 'abhishekkamble501@gmail.com', 'abd4067ecd787ba2419d81c3b2ac098825a357d1', 'Instumentation Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=abd4067ecd787ba2419d81c3b2ac098825a357d1'),
(76, 'kiranshinde082000@gmail.com', '62c4bed90ad513d72d4d7fed7e3439cce85157bf', 'Instumentation Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=62c4bed90ad513d72d4d7fed7e3439cce85157bf'),
(77, 'yashinfi8cosmo@gmail.com', 'c7e3913c76e39959ec0d0668e10e0a4d6314206a', 'Instumentation Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=c7e3913c76e39959ec0d0668e10e0a4d6314206a'),
(78, 'chiplunkarbharat@gmail.com', '63e2905c020daf2a4d47a3413fb23c5fbda1b8fe', 'Instumentation Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=63e2905c020daf2a4d47a3413fb23c5fbda1b8fe'),
(79, 'pawaskarsalman123@gmail.com', '841b546b7acce5ffcaa57829aa1db7d11d2417e9', 'Instumentation Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=841b546b7acce5ffcaa57829aa1db7d11d2417e9'),
(80, 'shrinidhpawaskar1999@gmail.com', '0b0bb16c5189c54ec31fe57762f9b91375bea0d7', 'Instumentation Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=0b0bb16c5189c54ec31fe57762f9b91375bea0d7'),
(81, 'bhavu0405@gmail.com', 'd22104cb25a1d8e17da374aa0ff2006052219cfc', 'Instumentation Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=d22104cb25a1d8e17da374aa0ff2006052219cfc'),
(82, 'rahulboddu2@gmail.com', 'f8570849dd3a314783596c91adeabdf81d6c3e0e', 'Instumentation Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=f8570849dd3a314783596c91adeabdf81d6c3e0e'),
(83, 'akshaychavan448@gmail.com', '173ee0279f27729747af60a520eb911af467bd88', 'Instumentation Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=173ee0279f27729747af60a520eb911af467bd88'),
(84, 'shrishchogle@gmail.com', '0b2e735df3521b43986a31df39e7625e8023749d', 'Instumentation Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=0b2e735df3521b43986a31df39e7625e8023749d'),
(85, 'omkardeshpande98@gmail.com', 'ae1174c5004e56b98d14919f5dc3e509c2999e34', 'Instumentation Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=ae1174c5004e56b98d14919f5dc3e509c2999e34'),
(86, 'varsha29.kadam@gmail.com', 'ecf41987ded03c3763cb8ac6984318069110633e', 'Instumentation Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=ecf41987ded03c3763cb8ac6984318069110633e'),
(87, 'radhikak5678@gmail.com', '40f10c87d7e770b122980d237a7897c5305fff83', 'Instumentation Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=40f10c87d7e770b122980d237a7897c5305fff83'),
(88, 'mayurkhalane282@gmail.com', 'a87dbd1741aec2161d740b98c5fc9e439d6e2ee9', 'Instumentation Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=a87dbd1741aec2161d740b98c5fc9e439d6e2ee9'),
(89, 'prajuk2601@gmail.com', 'a66f8720259852be0cfe9a020139b14c5503c4d6', 'Instumentation Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=a66f8720259852be0cfe9a020139b14c5503c4d6'),
(90, 'prakashlambor20@gmail.com', '31dc13b849ac9ab46e16f86cdab9b613047b1fae', 'Instumentation Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=31dc13b849ac9ab46e16f86cdab9b613047b1fae'),
(91, 'pareenmantri2006@gmail.com', 'ff73afb1a434c26aa8caa0b22bbdf6734505d102', 'Instumentation Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=ff73afb1a434c26aa8caa0b22bbdf6734505d102'),
(92, 'yashmistry2507@gmail.com', '5d95063a575f6cf4b2a90e3415f4e06f02279315', 'Instumentation Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=5d95063a575f6cf4b2a90e3415f4e06f02279315'),
(93, 'amogh.nandodkar@gmail.com', '0457a3db18b9cd1d270db77c0c28627526d6ec9d', 'Instumentation Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=0457a3db18b9cd1d270db77c0c28627526d6ec9d'),
(94, 'tanvinanekar1234@gmail.com ', 'b6fb9466a977c87b51f2069289a0be490ca002f6', 'Instumentation Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=b6fb9466a977c87b51f2069289a0be490ca002f6'),
(95, 'raneanjali62@gmail.com', 'd23742a3f6d3e02d0082dc225d36f1899dfed357', 'Instumentation Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=d23742a3f6d3e02d0082dc225d36f1899dfed357'),
(96, 'shaikhmoiz343@gmail.com', '82b7a478b62b8babd37590051e0506a355a16828', 'Instumentation Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=82b7a478b62b8babd37590051e0506a355a16828'),
(97, 'singhankit1998s@gmail.com', 'aa9752274b1edf4d53ffb9e9f521f07b48e33806', 'Instumentation Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=aa9752274b1edf4d53ffb9e9f521f07b48e33806'),
(98, 'traman459@gmail.com', 'd9795fd7daa0e8ba515b0b1a5d75bb371e8d4eaf', 'Instumentation Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=d9795fd7daa0e8ba515b0b1a5d75bb371e8d4eaf'),
(99, 'shindesiddhesh0298@gmail.com', '72aea84ba9e72e915337a93097c28b211fe81882', 'Instumentation Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=72aea84ba9e72e915337a93097c28b211fe81882'),
(100, 'unnati0107@gmail.com', '8edc1e8d2ce57aaeeaf29a2a2d59bea50579fa5a', 'Instumentation Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=8edc1e8d2ce57aaeeaf29a2a2d59bea50579fa5a'),
(101, 'vedesh.a.chavan@gmail.com', '869b74c1ec3f680284fd8e4f8ed31b3419a53b27', 'Instumentation Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=869b74c1ec3f680284fd8e4f8ed31b3419a53b27'),
(102, 'deshmukhprasad211@gmail.com', '1d45c48b9856a92d22cd3201394ce4c18b2f9301', 'Instumentation Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=1d45c48b9856a92d22cd3201394ce4c18b2f9301'),
(103, 'ajinkyagajbhiye7@gmail.com', '443c1e7191c5888f98481826e04b80ccc2e6d549', 'Instumentation Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=443c1e7191c5888f98481826e04b80ccc2e6d549'),
(104, 'shwetaghodake2011@gmai.com', 'c4e498c77d95fed2988ecd60d5f8070c437e811b', 'Instumentation Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=c4e498c77d95fed2988ecd60d5f8070c437e811b'),
(105, 'snehasgosai@gmail.com', '17757699a3bd757a719d95b62632a857be3a4da7', 'Instumentation Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=17757699a3bd757a719d95b62632a857be3a4da7'),
(106, 'gauravgunjal98@gmail.com', '3c3c8797441f6fae5c94f8e5147b49b961b6a4b5', 'Instumentation Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=3c3c8797441f6fae5c94f8e5147b49b961b6a4b5'),
(107, 'sahilhadkar17@gmail.com', 'd29b7ee9e13011116715b97caeb70f6b10b89f3f', 'Instumentation Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=d29b7ee9e13011116715b97caeb70f6b10b89f3f'),
(108, 'sahiljadhav6012@gmail.com', '37846f4f2ed31f9db5a789fab67dca83873beefc', 'Instumentation Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=37846f4f2ed31f9db5a789fab67dca83873beefc'),
(109, 'harshaangjangle@gmail.com', '05e5ec3b268bbc852249e06ef6d33585f17eac83', 'Instumentation Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=05e5ec3b268bbc852249e06ef6d33585f17eac83'),
(110, 'kamblepriti898@gmail.com', '5db04fa36f32927f1a4b66c0772a4606cf3f6bbf', 'Instumentation Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=5db04fa36f32927f1a4b66c0772a4606cf3f6bbf'),
(111, 'amarkanekar98@gmail.com', 'cb0dfbb57f310dc8a39258d9134bc0f319a51248', 'Instumentation Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=cb0dfbb57f310dc8a39258d9134bc0f319a51248'),
(112, '1275100@gmail.com', '207bbc73051fecba8fc31582aa1762feedd40377', 'Instumentation Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=207bbc73051fecba8fc31582aa1762feedd40377'),
(113, 'gautammakwana421@gmail.com ', '782296730a2d93d632664d1a57b17822d2f9ef0d', 'Instumentation Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=782296730a2d93d632664d1a57b17822d2f9ef0d'),
(114, 'shubhammandwale1@gmail.com', 'e84088d185709888f67fe04cda36e0cf74bdde7c', 'Instumentation Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=e84088d185709888f67fe04cda36e0cf74bdde7c'),
(115, 'sonumedhe5@gmail.com', 'd6b63c28d76187767be88ed010f8da35b78e2c6a', 'Instumentation Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=d6b63c28d76187767be88ed010f8da35b78e2c6a'),
(116, 'pawarpratiksha26@gmail.com', '50d24b17d6c1b11642608024644993bc94b9dca5', 'Instumentation Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=50d24b17d6c1b11642608024644993bc94b9dca5'),
(117, 'janhavisail1999@gmail.com', '0859d6482c47727eabd4f92eb420cf8c36fb3951', 'Instumentation Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=0859d6482c47727eabd4f92eb420cf8c36fb3951'),
(118, 'vikasbyadav232@gmail.com', 'dae7ca714331ac6998169eee4c7a998d5b5cf5fe', 'Instumentation Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=dae7ca714331ac6998169eee4c7a998d5b5cf5fe'),
(119, 'srushtisvichare@gmail.com', '733ae0c50809a214e312b817b22b49be91384da2', 'Instumentation Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=733ae0c50809a214e312b817b22b49be91384da2'),
(120, 'himanshuwaingankar@gmail.com', '448dea3cc7c451afc6e30f6e247a3067a327e0a9', 'Instumentation Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=448dea3cc7c451afc6e30f6e247a3067a327e0a9'),
(121, 'yawarali18@gmail.com', '37646c014894135ec48bb13aa57e0c2794a8059f', 'Electronics and Telecommunication', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=37646c014894135ec48bb13aa57e0c2794a8059f'),
(122, 'anjarlekar71@gmail.com', 'bfdb84f75cf6bff5789d0e658fcc6841b01f27c1', 'Electronics and Telecommunication', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=bfdb84f75cf6bff5789d0e658fcc6841b01f27c1'),
(123, 'ashwinavate@gmail.com', '75b85c92bab23810053c3530fde7cbaa40c1b77b', 'Electronics and Telecommunication', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=75b85c92bab23810053c3530fde7cbaa40c1b77b'),
(124, 'twinklevbhatt@gmail.com', '4f91a414df83254cdcf5dcc960b7eff8292e809a', 'Electronics and Telecommunication', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=4f91a414df83254cdcf5dcc960b7eff8292e809a'),
(125, 'jugalchawda00@gmail.com', 'c8c309702f86bd4a6621cb0cc0d1b5253659fc96', 'Electronics and Telecommunication', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=c8c309702f86bd4a6621cb0cc0d1b5253659fc96'),
(126, 'ashagaud29@gmail.com', '4f266b88766c749774103dda2def4317c8825633', 'Electronics and Telecommunication', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=4f266b88766c749774103dda2def4317c8825633'),
(127, 'prachigodhane@gmail.com', '93c6c445bd47d9cdb6fd538819c2c8a39d5f2681', 'Electronics and Telecommunication', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=93c6c445bd47d9cdb6fd538819c2c8a39d5f2681'),
(128, 'parthesh.haswar@gmail.com', '0954a40c1ea4163e984fa6bd6def2dbee0ba10f4', 'Electronics and Telecommunication', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=0954a40c1ea4163e984fa6bd6def2dbee0ba10f4'),
(129, 'aditya.narayan0602@gmail.com', '389ed2db4fdb16c863d5038fdc2c0f5d7ab0129a', 'Electronics and Telecommunication', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=389ed2db4fdb16c863d5038fdc2c0f5d7ab0129a'),
(130, 'amishajadhav17@gmail.com', '825a7353de89a3c94ec5f2de8424e3b4747a4a2f', 'Electronics and Telecommunication', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=825a7353de89a3c94ec5f2de8424e3b4747a4a2f'),
(131, 'ashika.alokkumar@gmail.com', 'f467b64dc1c90f1e6b77cfc488aeeccc26249eb5', 'Electronics and Telecommunication', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=f467b64dc1c90f1e6b77cfc488aeeccc26249eb5'),
(132, 'lotankarshreeya@gmail.com', '9128a97fb85d7a39d4ba97259d6ee50755828699', 'Electronics and Telecommunication', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=9128a97fb85d7a39d4ba97259d6ee50755828699'),
(133, 'sakshi.sm82@gmail.com', '932b5b57c69536629c7828c9e22c31743c292bb9', 'Electronics and Telecommunication', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=932b5b57c69536629c7828c9e22c31743c292bb9'),
(134, 'sakshimankar.0311200@gmail.com', '1694ce8d8c7b5abb7f1f46ab6fcd2533819ca396', 'Electronics and Telecommunication', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=1694ce8d8c7b5abb7f1f46ab6fcd2533819ca396'),
(135, 'mohapatrakanishka@gmail.com', '84164bc52a93d9071b4904c91a541f13ba134595', 'Electronics and Telecommunication', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=84164bc52a93d9071b4904c91a541f13ba134595'),
(136, 'veer2820000@gmail.com', '436134ef595f53ffad8ef03952ac0a60812320c8', 'Electronics and Telecommunication', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=436134ef595f53ffad8ef03952ac0a60812320c8'),
(137, 'prathameshpatkar2000@gmail.com', '6637e6defd0dcc56c39b7b367a9dede916b03c3d', 'Electronics and Telecommunication', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=6637e6defd0dcc56c39b7b367a9dede916b03c3d'),
(138, 'churichaitrangi1110@gmail.com', '0b5435766728164b97b61611fe6f567e87b170ef', 'Electronics and Telecommunication', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=0b5435766728164b97b61611fe6f567e87b170ef'),
(139, 'poonamdhokare99@gmail.com', '1427b0715eac0a68aea4374fe5be75d3c835e678', 'Electronics and Telecommunication', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=1427b0715eac0a68aea4374fe5be75d3c835e678'),
(140, '77dhanshree.patil77@gmail.com', '30bf676026801f2c432273b7585355af0144fc53', 'Electronics and Telecommunication', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=30bf676026801f2c432273b7585355af0144fc53'),
(141, 'bkolekar76@gmail.com', '2d9897c4f22bb48c10f16311b2aedecf5f7456d1', 'Electronics and Telecommunication', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=2d9897c4f22bb48c10f16311b2aedecf5f7456d1'),
(142, 'ladtej@gmail.com', '4d01f48af087327f0d7bc1bb88f3fbd2451bf972', 'Electronics and Telecommunication', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=4d01f48af087327f0d7bc1bb88f3fbd2451bf972'),
(143, 'aadityauti773@gmail.com', 'e3a8b5c321c401618d086fdbb91f569f52e16eba', 'Electronics and Telecommunication', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=e3a8b5c321c401618d086fdbb91f569f52e16eba'),
(144, 'samikshadoddamane@gmail.com', 'bc33c7cc15263084a569b8485631e11b2ff92232', 'Electronics and Telecommunication', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=bc33c7cc15263084a569b8485631e11b2ff92232'),
(145, 'erprachi9998@gmail.com', '74f8647e98eed204cdc3203e3813a0038582aff1', 'Electronics and Telecommunication', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=74f8647e98eed204cdc3203e3813a0038582aff1'),
(146, 'sailisurve12@gmail.com', '8217dee3fd7294ac91247d26e6e31df7a3625b7f', 'Electronics and Telecommunication', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=8217dee3fd7294ac91247d26e6e31df7a3625b7f'),
(147, 'sakatjanhavi15@gmail.com', '3777f755680b49073e414200622c2a3beb9469cd', 'Electronics and Telecommunication', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=3777f755680b49073e414200622c2a3beb9469cd'),
(148, 'mokshasalian19@gmail.com', '74ecf5ee7f7d43714c9921ef99bd3018633b8a98', 'Electronics and Telecommunication', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=74ecf5ee7f7d43714c9921ef99bd3018633b8a98'),
(149, 'walunj.vishald@gmail.com', '1311ba5a4821a145aad97014b337de0f0b1e783d', 'Electronics and Telecommunication', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=1311ba5a4821a145aad97014b337de0f0b1e783d'),
(150, 'poojarydiksha211@gmail.com', '5909de239b1b305fa18b8f92201edbb8b9c0b094', 'Electronics and Telecommunication', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=5909de239b1b305fa18b8f92201edbb8b9c0b094'),
(151, 'sandhyasudhirkumarsingh@gmail.com', '2b217bc1cbb512a6c05e994480cd828886f383e8', 'Electronics and Telecommunication', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=2b217bc1cbb512a6c05e994480cd828886f383e8'),
(152, 'sabisingh014@gmail.com', 'f6ea431d5cb9b96c5a6aeff7e41315f11312d215', 'Electronics and Telecommunication', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=f6ea431d5cb9b96c5a6aeff7e41315f11312d215'),
(153, 'praptishetty2@gmail.com', '3104dfd18b4cdddf70395c27ae2fa16a76539af5', 'Electronics and Telecommunication', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=3104dfd18b4cdddf70395c27ae2fa16a76539af5'),
(154, 'awilleternal298@gmail.com', '281dbdeb7f84ab6a270e1c8d3f58841a2aa0dd6a', 'Electronics and Telecommunication', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=281dbdeb7f84ab6a270e1c8d3f58841a2aa0dd6a'),
(155, 'shejalsharma920@gmail.com', '75b61352e3db681c6b5b44169d475939fbf15374', 'Electronics and Telecommunication', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=75b61352e3db681c6b5b44169d475939fbf15374'),
(156, 'aayatshaikh234@gmail.com', 'a74fad4e9764e714fc354ccb57779c5258a4a060', 'Electronics and Telecommunication', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=a74fad4e9764e714fc354ccb57779c5258a4a060'),
(157, 'jhanvi490@gmail.com', '41d5e8b556ccca6368cd580c76d8d61277d55ef0', 'Electronics and Telecommunication', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=41d5e8b556ccca6368cd580c76d8d61277d55ef0'),
(158, 'sablegaurav10@gmail.com', 'd5a8842f96dd1a25effaab903d8fb024aa19474d', 'Electronics and Telecommunication', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=d5a8842f96dd1a25effaab903d8fb024aa19474d'),
(159, 'shubhammmpatil57@gmail.com', 'f9a5946e414b79ba2c2c13f09fddf8c32b813ac7', 'Electronics and Telecommunication', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=f9a5946e414b79ba2c2c13f09fddf8c32b813ac7'),
(160, 'patrosuraj80@gmail.com', 'f27f7ac7fddf281c5a3289e2f2b8b4f528a31749', 'Electronics and Telecommunication', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=f27f7ac7fddf281c5a3289e2f2b8b4f528a31749'),
(161, 'vruttimistry999@gmail.com', '8bf21c8d42113dcaf0feb60473a9e98a22f9e3fa', 'Electronics and Telecommunication', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=8bf21c8d42113dcaf0feb60473a9e98a22f9e3fa'),
(162, 'vsnair99@gmail.com', 'a488f137277cc9ab1f3555cfab77ec203b8fbd5d', 'Electronics and Telecommunication', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=a488f137277cc9ab1f3555cfab77ec203b8fbd5d'),
(163, 'bhavnap7748@gmail.com', 'cd2f93252b392a89022a4a651b05645ae3050838', 'Electronics and Telecommunication', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=cd2f93252b392a89022a4a651b05645ae3050838'),
(164, 'kartikpanchal29@gmail.com', 'b75226c3f0766d5922387785d8f7e0d73aa8b5f7', 'Electronics and Telecommunication', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=b75226c3f0766d5922387785d8f7e0d73aa8b5f7'),
(165, 'priyasaroj63@gmail.com', '4d13f62e84ee81b23e320a19577f07fe9b25a86a', 'Electronics and Telecommunication', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=4d13f62e84ee81b23e320a19577f07fe9b25a86a'),
(166, 'ashishbsharma.777@gmail.com', '5cfc732c450a418521974c1db7560e3f280aca0a', 'Electronics and Telecommunication', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=5cfc732c450a418521974c1db7560e3f280aca0a'),
(167, 'raj93249356@gmail.com', 'e948d40dc69bfc530c8a29129ec3fa99f213d0fb', 'Electronics and Telecommunication', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=e948d40dc69bfc530c8a29129ec3fa99f213d0fb'),
(168, 'tarush680@gmail.com', '7465efe69960678ff88b35634c14c757c23c21b9', 'Electronics and Telecommunication', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=7465efe69960678ff88b35634c14c757c23c21b9'),
(169, 'aishwaryaunawane22@gmail.com', 'd1cfdb21d035dd520de4fdd1ab7881d65094ac7a', 'Electronics and Telecommunication', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=d1cfdb21d035dd520de4fdd1ab7881d65094ac7a'),
(170, 'tejastirlotkar22@gmail.com', '8d5101cda2dea05eae87056c93dbf53634f8818f', 'Electronics and Telecommunication', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=8d5101cda2dea05eae87056c93dbf53634f8818f'),
(171, 'nirajprajapati8633@gmail.com', '6ac961faa2161f2b9a488c839b0f0fa7588caa81', 'Electronics and Telecommunication', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=6ac961faa2161f2b9a488c839b0f0fa7588caa81'),
(172, 'chiragnishad318@gmail.com', '8a24288daaa5c35e9e93f6fae913ca82f059cffb', 'Electronics and Telecommunication', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=8a24288daaa5c35e9e93f6fae913ca82f059cffb'),
(173, 'narayanmanikere309@gmail.com', 'bd291a2e169c4e44bb6fb9cdc6d09b5577ea4964', 'Electronics and Telecommunication', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=bd291a2e169c4e44bb6fb9cdc6d09b5577ea4964'),
(174, 'sarveshgurav355@gmail.com', '537d167e78967110f71ef58e1340195b51281eb9', 'Electronics and Telecommunication', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=537d167e78967110f71ef58e1340195b51281eb9'),
(175, 'shubhamdambe12345@gmail.com', '753bc1d75b20bb9b7ff8fad60d7b41fefbff448a', 'Electronics and Telecommunication', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=753bc1d75b20bb9b7ff8fad60d7b41fefbff448a'),
(176, 'avarak0599@gmail.com', '9055c4e7067cc76f8c0412b605f8c923f34f9530', 'Electronics and Telecommunication', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=9055c4e7067cc76f8c0412b605f8c923f34f9530'),
(177, 'shreyasraut18@gmail.com', '4f27b5c6b0e8be7f68115b97ecb5456fa51dd2a7', 'Electronics and Telecommunication', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=4f27b5c6b0e8be7f68115b97ecb5456fa51dd2a7'),
(178, 'vaishnaviwadaje9@gmail.com', '87a1d37b8960c5228615931a3e2dac14bbf716ec', 'Electronics and Telecommunication', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=87a1d37b8960c5228615931a3e2dac14bbf716ec'),
(179, 'karambeleroshani21@gmail.com', 'b74c7b4fd0eeea6474cb83add143f789e5e72c78', 'Electronics and Telecommunication', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=b74c7b4fd0eeea6474cb83add143f789e5e72c78'),
(180, 'jahnavi853@gmail.com', 'e6813deb31ecf3c5d0184195a629e64752f80923', 'Electronics and Telecommunication', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=e6813deb31ecf3c5d0184195a629e64752f80923'),
(181, 'krutiband26@gmail.com', '63ff00b8260150f992520df020369a3af224067b', 'Electronics and Telecommunication', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=63ff00b8260150f992520df020369a3af224067b'),
(182, 'mitanshbanduk@gmail.com', '45d4ef875c81d718936abd2febecaf8000c1b8ac', 'Electronics and Telecommunication', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=45d4ef875c81d718936abd2febecaf8000c1b8ac'),
(183, 'siddhirajbhayde@gmail.com', '6dc51ee51e15e2477cc3103e71fc51425e4049b0', 'Electronics and Telecommunication', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=6dc51ee51e15e2477cc3103e71fc51425e4049b0'),
(184, 'chaugulegaurav05@gmail.com', 'bc5d23848b4809eef8524480a2067b60ca17510c', 'Electronics and Telecommunication', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=bc5d23848b4809eef8524480a2067b60ca17510c'),
(185, 'anushka.chavan1906@gmail.com', '98343c21fd7e53f877b3b588c803bf92056e51cf', 'Electronics and Telecommunication', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=98343c21fd7e53f877b3b588c803bf92056e51cf'),
(186, 'anantdev28@gmail.com', '3c39a8c629d664e48bfc0bf8e77aefab78b54b3a', 'Electronics and Telecommunication', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=3c39a8c629d664e48bfc0bf8e77aefab78b54b3a'),
(187, 'dixit.ajey@gmail.com', '77ac7f7a59d3592f2dde72beff6ad4757cae7b1f', 'Electronics and Telecommunication', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=77ac7f7a59d3592f2dde72beff6ad4757cae7b1f'),
(188, 'durgeshwari.dolas@gmail.com', '37d5f207789d2cb597e222f703304bb844646b69', 'Electronics and Telecommunication', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=37d5f207789d2cb597e222f703304bb844646b69'),
(189, 'komaldongare1999@gmail.com', 'e1e804ffcc74f5b634216ad04e40236799b515fd', 'Electronics and Telecommunication', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=e1e804ffcc74f5b634216ad04e40236799b515fd'),
(190, 'dongrikartanvi07@rediffmail.com', '8b9bafb0750650ae567de7a80004b353c9414232', 'Electronics and Telecommunication', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=8b9bafb0750650ae567de7a80004b353c9414232'),
(191, 'hazel.fernandes87.cf@gmail.com', 'be89bcd4b902d68116a782dba5338a1e6aafadd9', 'Electronics and Telecommunication', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=be89bcd4b902d68116a782dba5338a1e6aafadd9'),
(192, 'mithila.ghag@gmail.com', 'bfd2209c3a959b603b6c65179841fc7d4c18ee77', 'Electronics and Telecommunication', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=bfd2209c3a959b603b6c65179841fc7d4c18ee77'),
(193, 'himalhamav2799@gmail.com', 'd240b28e4d13f01680a241856a0924757a4141cd', 'Electronics and Telecommunication', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=d240b28e4d13f01680a241856a0924757a4141cd'),
(194, 'prernakamble684@gmail.com', '8b628200f19a9267f22e4619b820c41be7f06219', 'Electronics and Telecommunication', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=8b628200f19a9267f22e4619b820c41be7f06219'),
(195, 'akshaymachivale92@gmail.com', '6fc440d621aec8ac5338e061a288ef23d6da3c05', 'Electronics and Telecommunication', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=6fc440d621aec8ac5338e061a288ef23d6da3c05'),
(196, 'saniamaniar99@gmail.com', 'a23a22f15f0b0e9a1fbc70001726294799ed49c2', 'Electronics and Telecommunication', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=a23a22f15f0b0e9a1fbc70001726294799ed49c2'),
(197, 'mathurkaran01@gmail.com', '82b5a9425c6a8053437df2f940610983059a106a', 'Electronics and Telecommunication', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=82b5a9425c6a8053437df2f940610983059a106a'),
(198, 'rupalitiwari4949@gmail.com', '5eed8ba0118c725aa8782253f1e29a7fbedb3969', 'Electronics and Telecommunication', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=5eed8ba0118c725aa8782253f1e29a7fbedb3969'),
(199, 'shuklariya47@gmail.com', '65b02646b3455dc3bda27d9fa98fafbd265807be', 'Electronics and Telecommunication', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=65b02646b3455dc3bda27d9fa98fafbd265807be'),
(200, 'mirav.parekh@gmail.com', '8f7394d279807111c9ad568647d6fc6c88774fd2', 'Electronics and Telecommunication', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=8f7394d279807111c9ad568647d6fc6c88774fd2'),
(201, 'misbahowais@hotmail.com', 'fce72f6b9942bef17f7fd44daea7973cad7c040e', 'Electronics and Telecommunication', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=fce72f6b9942bef17f7fd44daea7973cad7c040e'),
(202, 'shamikaa.07@gmail.com', '1e7ac012410e81f68e76749b9dedec9b198d5936', 'Electronics and Telecommunication', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=1e7ac012410e81f68e76749b9dedec9b198d5936'),
(203, 'sohambagayatkar@gmail.com', 'de4ec08f776ee3f43948554f81c7094b8cf21fcc', 'Electronics and Telecommunication', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=de4ec08f776ee3f43948554f81c7094b8cf21fcc'),
(204, 'milind17ghawale@gmail.com', 'a67b73ae822810aa3d252fd344d6d7e5fb2bbdcd', 'Electronics and Telecommunication', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=a67b73ae822810aa3d252fd344d6d7e5fb2bbdcd'),
(205, 'harlalka.harsh36@gmail.com', '41b827c47a5d6332472d47ea1d8f7d7d4bb0c707', 'Electronics and Telecommunication', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=41b827c47a5d6332472d47ea1d8f7d7d4bb0c707'),
(206, 'nikhiljani.38@gmail.com', '50bea25889167f319b667701a8cf4986f18efa56', 'Electronics and Telecommunication', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=50bea25889167f319b667701a8cf4986f18efa56'),
(207, 'karmokaralokita@gmail.com', 'ffc606ea7919356572ab4f58bad89d0d54d951c6', 'Electronics and Telecommunication', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=ffc606ea7919356572ab4f58bad89d0d54d951c6'),
(208, 'krishnasaur123@gmail.com', 'df661332b3508ffb23949dfcebc405019d520d32', 'Electronics and Telecommunication', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=df661332b3508ffb23949dfcebc405019d520d32'),
(209, 'pooja.chavan98.pc@gmail.com', 'c5c46b8e629e97c74e98265a835a1a5d5ddb7772', 'Electronics and Telecommunication', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=c5c46b8e629e97c74e98265a835a1a5d5ddb7772'),
(210, 'bajpaiamit088@gmail.com', '2eea6e6a67c1424e02c68b068c45b91d7f95485f', 'Electronics and Telecommunication', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=2eea6e6a67c1424e02c68b068c45b91d7f95485f'),
(211, 'sairajmahadik12@gmail.com', '81a5556310335cc990f873fd81163a3868dfedf4', 'Electronics and Telecommunication', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=81a5556310335cc990f873fd81163a3868dfedf4'),
(212, 'nehagawas24@gmail.com', 'd91ba8a2e24d0a0c52a795646f0f17226acbc1c5', 'Electronics and Telecommunication', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=d91ba8a2e24d0a0c52a795646f0f17226acbc1c5'),
(213, 'harshadapatil808@gmail.com', '3ae137a5d58c84957379c1e50a69314a5b1e36b9', 'Electronics and Telecommunication', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=3ae137a5d58c84957379c1e50a69314a5b1e36b9'),
(214, 'pranalirokade21@gmail.com', 'f91d93e8da0a5b79293b86a1fdc1521f95522847', 'Electronics and Telecommunication', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=f91d93e8da0a5b79293b86a1fdc1521f95522847'),
(215, 'rohinimestry26@gmail.com', '4610abfe54dc26f09952084b328cdecfa0ad4709', 'Electronics and Telecommunication', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=4610abfe54dc26f09952084b328cdecfa0ad4709'),
(216, 'bsantosh995@gmail.com', '41181e05caf4720b74fbf3282591bb77ad9f968d', 'Electronics and Telecommunication', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=41181e05caf4720b74fbf3282591bb77ad9f968d'),
(217, 'rupeshrko@gmail.com', '61b6ad1c8080cd5b59d89c53c38d6e6a0ffec666', 'Electronics and Telecommunication', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=61b6ad1c8080cd5b59d89c53c38d6e6a0ffec666'),
(218, 'ngkamble1@gmail.com', '8991166ec27e0dfa5e7ce666458040876d92cfa2', 'Electronics and Telecommunication', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=8991166ec27e0dfa5e7ce666458040876d92cfa2'),
(219, 'krishna.biswas003@gmail.com', '7f45745fad883e41f1c394a3096529aa5c648354', 'Electronics and Telecommunication', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=7f45745fad883e41f1c394a3096529aa5c648354'),
(220, 'shubhamisadkar27@gmail.com', '568438e6f6a20a4f58335e4766ba23d8923f9613', 'Electronics and Telecommunication', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=568438e6f6a20a4f58335e4766ba23d8923f9613'),
(221, 'vishu1901.parab@gmail.com', '975b1ae1947d4e8430c8f2aef413058c6e6e5ad1', 'Electronics and Telecommunication', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=975b1ae1947d4e8430c8f2aef413058c6e6e5ad1'),
(222, 'atharvapatkar99@gmail.com', 'acbc1c200f0ccbb21ae24096a7994fa51c787de7', 'Electronics and Telecommunication', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=acbc1c200f0ccbb21ae24096a7994fa51c787de7'),
(223, 'kiranpote008@gmail.com', 'f72e49ce953dfee7a8409a03555764dab859666e', 'Electronics and Telecommunication', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=f72e49ce953dfee7a8409a03555764dab859666e'),
(224, 'dilipprasadinf@gmail.com', '9be00d678544b9da12e9d8f17f2a9df27b96f915', 'Electronics and Telecommunication', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=9be00d678544b9da12e9d8f17f2a9df27b96f915'),
(225, 'omkarsable99@gmail.com', '5277c2b8fc135919de68d11fe230538a72129640', 'Electronics and Telecommunication', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=5277c2b8fc135919de68d11fe230538a72129640'),
(226, 'anish.saikia98@gmail.com', '556ff0395d08e83d1d776e70a659e33b5934efb0', 'Electronics and Telecommunication', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=556ff0395d08e83d1d776e70a659e33b5934efb0'),
(227, 'mehul.rsalian@gmail.com', 'aa4f22ac89a6dbb4287e42727ab62e700d1edc80', 'Electronics and Telecommunication', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=aa4f22ac89a6dbb4287e42727ab62e700d1edc80'),
(228, 'anjanshettigar19@gmail.com', '7de3c4798ff5507ed33d138db74577d6a3025c7c', 'Electronics and Telecommunication', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=7de3c4798ff5507ed33d138db74577d6a3025c7c'),
(229, 'vishalthorat77778@gmail.com', '2a51fe7f7600969df6e08bea7f480e4f28ffd923', 'Electronics and Telecommunication', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=2a51fe7f7600969df6e08bea7f480e4f28ffd923'),
(230, 'ameyaudiawar@gmail.com', '68861784d4c8edc0bde8f8991a29b28673883add', 'Electronics and Telecommunication', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=68861784d4c8edc0bde8f8991a29b28673883add'),
(231, 'ashwinvirkud@gmail.com', '012dd2010bf5ec051433c2ecc1077fc4e5ba27a1', 'Electronics and Telecommunication', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=012dd2010bf5ec051433c2ecc1077fc4e5ba27a1'),
(232, 'snehajagdishpatil@gmail.com', 'b2050f79e9e49f3a1a63ec1137b15c950c8a281f', 'Electronics and Telecommunication', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=b2050f79e9e49f3a1a63ec1137b15c950c8a281f'),
(233, 'shaikhsami1998@gmail.com', 'e2bbeb3eb05b9a28d0e52fcca6f7976ef372e26e', 'Electronics and Telecommunication', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=e2bbeb3eb05b9a28d0e52fcca6f7976ef372e26e'),
(234, 'bondrepratiksha5@gmail.com', '31cfa0f03ab7913a3f5df23f7614049734fb467d', 'Electronics and Telecommunication', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=31cfa0f03ab7913a3f5df23f7614049734fb467d'),
(235, 'kanchan.murkar26@gmail.com', 'a9467b07713cee080adce394ddb09b79dcc4279a', 'Electronics and Telecommunication', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=a9467b07713cee080adce394ddb09b79dcc4279a'),
(236, 'smitesh277@gmail.com', '605bc87c9e59e5ef2611e45c94a5ddb6e1d26c89', 'Electronics and Telecommunication', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=605bc87c9e59e5ef2611e45c94a5ddb6e1d26c89'),
(237, 'puravyadnesh98@gmail.com', '6ba186ff7bf293679a2c36891ed95cf4f0d927ee', 'Electronics and Telecommunication', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=6ba186ff7bf293679a2c36891ed95cf4f0d927ee'),
(238, 'shubhamgo98@gmail.com', '845fa88ecc5c3ee24bd4abd582696b98618d4124', 'Electronics and Telecommunication', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=845fa88ecc5c3ee24bd4abd582696b98618d4124'),
(239, 'manishb501@gmail.com', '2f18fedfca8ec7edca7b512403c8a40eaa70da41', 'Electronics and Telecommunication', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=2f18fedfca8ec7edca7b512403c8a40eaa70da41'),
(240, 'amitspanchal5@gmail.com', '7106aa268e0d028ddedea2c89ceb6bd38842a301', 'Electronics and Telecommunication', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=7106aa268e0d028ddedea2c89ceb6bd38842a301'),
(241, 'sushagre66106@gmail.com', '777b4f28a4841bf8a83dd045a2c3de6d0e4bfdd1', 'Mechanical Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=777b4f28a4841bf8a83dd045a2c3de6d0e4bfdd1'),
(242, 'sjbhandari80@gmail.com', '5401f4c0c93778509568b266302bf219ac64b8a5', 'Mechanical Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=5401f4c0c93778509568b266302bf219ac64b8a5'),
(243, 'parth19samle@gmail.com', 'b82c8c2d6faefc91190197ea70ddf4caecc84f21', 'Mechanical Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=b82c8c2d6faefc91190197ea70ddf4caecc84f21'),
(244, 'smitdhanani5@gmail.com', '92205c0bf373ecdeed3e97a524757b142618b2c3', 'Mechanical Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=92205c0bf373ecdeed3e97a524757b142618b2c3'),
(245, 'shubhangi.20000@gmail.com', '84ac19aad8d266b4eabb0cf923f9256be0fee6de', 'Mechanical Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=84ac19aad8d266b4eabb0cf923f9256be0fee6de'),
(246, 'adityasgaonkar@gmail.com', '545de099f4571f45cd1a48d78a0921fe18979d8f', 'Mechanical Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=545de099f4571f45cd1a48d78a0921fe18979d8f'),
(247, 'sbsbmp@gmail.com', 'de7fdc922c406007ebb77eefda9ded16951f5eb4', 'Mechanical Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=de7fdc922c406007ebb77eefda9ded16951f5eb4'),
(248, 'abhishekgovari17@gmail.com', '835eebada3a748e4ecb0cc76889b52ca06a9301d', 'Mechanical Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=835eebada3a748e4ecb0cc76889b52ca06a9301d'),
(249, 'surajjadhav1301@gmail.com', 'a09c81c9a8aa1f27e0d89b0d3edaec85dc6907c4', 'Mechanical Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=a09c81c9a8aa1f27e0d89b0d3edaec85dc6907c4'),
(250, 'swaralikamble910@gmail.com', '12b35726bcd0671abb49adfd4c6a1be026502a88', 'Mechanical Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=12b35726bcd0671abb49adfd4c6a1be026502a88'),
(251, 'kasarnikhil958@gmail.com', 'a233b72f841dc8d3e18f854091f3a22a404fa985', 'Mechanical Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=a233b72f841dc8d3e18f854091f3a22a404fa985'),
(252, 'adhirajkhavare@gmail.com', '7277d13ff6d8a39be851802b970075fc579171b7', 'Mechanical Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=7277d13ff6d8a39be851802b970075fc579171b7'),
(253, 'tejakhot14@gmail.com', 'c68fd5ac1a6f92e2b64ab590912f7887df1dc814', 'Mechanical Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=c68fd5ac1a6f92e2b64ab590912f7887df1dc814'),
(254, 'kolikrutarthnjr1053@gmail.com', 'cc652e45ded92dbbacb960ccdfb924174bccff94', 'Mechanical Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=cc652e45ded92dbbacb960ccdfb924174bccff94'),
(255, 'kotechautkarsh@gmail.com', 'fefc5c4960d8eda916d66a03f59a3e115a1a8c88', 'Mechanical Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=fefc5c4960d8eda916d66a03f59a3e115a1a8c88'),
(256, 'mahadiknv26@gmail.com', 'fc0d651c3237ca085b91d5547a1bc87833a61273', 'Mechanical Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=fc0d651c3237ca085b91d5547a1bc87833a61273'),
(257, 'siddheshmahadik17@gmail.com', 'ba3c80d1b919fb8a81f025dbce99bbf8428da00c', 'Mechanical Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=ba3c80d1b919fb8a81f025dbce99bbf8428da00c'),
(258, 'jmjmahajan10@gmail.com', '12b43a6d51b7ccf04bb95752120850c501a25816', 'Mechanical Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=12b43a6d51b7ccf04bb95752120850c501a25816'),
(259, 'amirmalkani1@gmail.com', '43b46e814b7b53ca7e6a6c32521b372fcb5fae00', 'Mechanical Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=43b46e814b7b53ca7e6a6c32521b372fcb5fae00'),
(260, 'vaishnavimhaskar143@gmail.com', 'be2aa39ac7ed3ca8254bb09a4c66788eaf1d5e1f', 'Mechanical Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=be2aa39ac7ed3ca8254bb09a4c66788eaf1d5e1f'),
(261, 'shravanvenugopal22@gmail.com', '218ed781472768eb87f70a0f2bb7a91106b281c2', 'Mechanical Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=218ed781472768eb87f70a0f2bb7a91106b281c2'),
(262, 'hp3329699@gmail.com', '6ce42d016df87ae19ee7f5fa122365a9bd7fd0c5', 'Mechanical Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=6ce42d016df87ae19ee7f5fa122365a9bd7fd0c5');
INSERT INTO `mail_addr` (`mail_id`, `mail`, `mail_hash`, `mail_dept`, `mail_sem`, `mail_div`, `fb_link`) VALUES
(263, 'anukshashinde3099@gmail.com', '1edeb4df8c4572f1631438c0e94f3efd489051f1', 'Mechanical Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=1edeb4df8c4572f1631438c0e94f3efd489051f1'),
(264, 'shubhushinde1914@gmail.com', '7c72109afa34616160e76bf93e6adf350eb51828', 'Mechanical Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=7c72109afa34616160e76bf93e6adf350eb51828'),
(265, 'sharmaakshat9999@gmail.com', 'c95fef7459ec219b59bae489c37500c0eed635ea', 'Mechanical Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=c95fef7459ec219b59bae489c37500c0eed635ea'),
(266, 'aniketsurve906@gmail.com', '185ed75923c2e53d91f29fb4a5807b6ba516b607', 'Mechanical Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=185ed75923c2e53d91f29fb4a5807b6ba516b607'),
(267, 'thamu060720@gmail.com', 'e47ba5146df77edd4cae08623b1c3031deac81ee', 'Mechanical Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=e47ba5146df77edd4cae08623b1c3031deac81ee'),
(268, 'pratikshetty8661@gmail.com', 'b4b1d031e0b8ad19eb96e85b832642d0ffd8181a', 'Mechanical Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=b4b1d031e0b8ad19eb96e85b832642d0ffd8181a'),
(269, 'abdullahsiddiqui47@gmail.com', 'c123a6ea17f8808f0533abd9b4ab3cb6b4dccfff', 'Mechanical Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=c123a6ea17f8808f0533abd9b4ab3cb6b4dccfff'),
(270, 'sahilpillikandlu@gmail.com', '9e92ee08b9271e00461873c330e5dea71b25c84f', 'Mechanical Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=9e92ee08b9271e00461873c330e5dea71b25c84f'),
(271, 'chaitaliparab832@gmail.com', '450c1ccd5a237dc6c5f18d242a119539a0719813', 'Mechanical Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=450c1ccd5a237dc6c5f18d242a119539a0719813'),
(272, 'parakhmanas@gmail.com', '58ca200b790a493bced5e196edf3456ae1912edd', 'Mechanical Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=58ca200b790a493bced5e196edf3456ae1912edd'),
(273, 'milindsolanki2014@gmail.com', '81913ff3659aa64130825c7dc6a3f7623fbf786a', 'Mechanical Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=81913ff3659aa64130825c7dc6a3f7623fbf786a'),
(274, 'bashirshaikhmastan@gmail.com', '71bde807ecb788567ed39510479e55760245eb1f', 'Mechanical Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=71bde807ecb788567ed39510479e55760245eb1f'),
(275, 'shubhamrathod99@gmail.com', '89b3cd596c2d746a5e3bc94df07ec0b3c035e519', 'Mechanical Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=89b3cd596c2d746a5e3bc94df07ec0b3c035e519'),
(276, 'yashshreepol1653@gmail.com', '35966bf0d595c42c20de1da0c92706bcc145931a', 'Mechanical Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=35966bf0d595c42c20de1da0c92706bcc145931a'),
(277, 'rutvikpatel1292@gmail.com', '404a0b06fcb5aa12f4380841778ad6f36b72fce1', 'Mechanical Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=404a0b06fcb5aa12f4380841778ad6f36b72fce1'),
(278, 'tejasmoolya3001@gmail.com', '447c169613baf3751a0825a0ac8b08cf12b52993', 'Mechanical Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=447c169613baf3751a0825a0ac8b08cf12b52993'),
(279, 'arman22shaikh@gmail.com', 'ad3cb680d588877e25f4ae2c29e6a2532882bc4d', 'Mechanical Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=ad3cb680d588877e25f4ae2c29e6a2532882bc4d'),
(280, 'maazshaikh2645@gmail.com', '1d2236ff074068767aba341672d9545c7972e1dc', 'Mechanical Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=1d2236ff074068767aba341672d9545c7972e1dc'),
(281, 'abhangbhavesh@gmail.com', 'a30dbc5437598d54a83a79b2ba41cd3f46efc673', 'Mechanical Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=a30dbc5437598d54a83a79b2ba41cd3f46efc673'),
(282, 'prathamesh.adawade1.pa@gmail.com', '95d0a25a18a6456838443969362b56cc5529519e', 'Mechanical Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=95d0a25a18a6456838443969362b56cc5529519e'),
(283, 'truptiborade1234@gmail.com', '320835942479dbf5f1098ba25a982356dc4cb2be', 'Mechanical Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=320835942479dbf5f1098ba25a982356dc4cb2be'),
(284, 'yshchaturvedi@gmail.com', 'a22a0adae72a4c40f419eb2e67324c818ee0c36f', 'Mechanical Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=a22a0adae72a4c40f419eb2e67324c818ee0c36f'),
(285, 'deshmukh4066akshay@gmail.com', 'f1f1d04ab6fc4b4336711b2407d1fece0e86e3d9', 'Mechanical Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=f1f1d04ab6fc4b4336711b2407d1fece0e86e3d9'),
(286, 'ashdhatrak49@gmail.com', '414715ca8f145d5e2fa32b6b0a21e480bb0f0779', 'Mechanical Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=414715ca8f145d5e2fa32b6b0a21e480bb0f0779'),
(287, 'chinmaykhanvilkar1622@gmail.com', 'f561a979d95a553f718768de2dc1ab40c582f35d', 'Mechanical Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=f561a979d95a553f718768de2dc1ab40c582f35d'),
(288, 'falgunikumbhar2931@gmail.com', 'a2a8d8c5a4015e91e84d7fa62627f58a4b1e347f', 'Mechanical Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=a2a8d8c5a4015e91e84d7fa62627f58a4b1e347f'),
(289, 'vivekmakwana275@gmail.com', '0995be41d4fce357e8de4c93c8a7a360c9452fd0', 'Mechanical Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=0995be41d4fce357e8de4c93c8a7a360c9452fd0'),
(290, 'shivanidattaram20@gmail.com', 'ddad5b842423f22951caedb87a3265a58b8765af', 'Mechanical Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=ddad5b842423f22951caedb87a3265a58b8765af'),
(291, 'mirashitushar9@gmail.com', '690c3515c1971fe7262cd7a535c602baf52e0d3b', 'Mechanical Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=690c3515c1971fe7262cd7a535c602baf52e0d3b'),
(292, 'omkarmore2410@gmail.com', '861b388cefb8713ddbb6b5b82f969706ee07ae00', 'Mechanical Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=861b388cefb8713ddbb6b5b82f969706ee07ae00'),
(293, 'bhoomimukadam19@gmail.com', 'b2dc7b2c67baac8075c81cffd1f15e60e4f5c289', 'Mechanical Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=b2dc7b2c67baac8075c81cffd1f15e60e4f5c289'),
(294, 'pawar04om2000@gmail.com', '32df87eaf65022e4f1200b2dfdbac02106cbbc91', 'Mechanical Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=32df87eaf65022e4f1200b2dfdbac02106cbbc91'),
(295, 'shwetapawar575@gmail.com', '8aa61741c9dc5dbb460396353e923db9017b6eee', 'Mechanical Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=8aa61741c9dc5dbb460396353e923db9017b6eee'),
(296, 'sahilphale24@gmail.com', '29acddcdfbbddf3a228158d06e3e37d9952a3c0f', 'Mechanical Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=29acddcdfbbddf3a228158d06e3e37d9952a3c0f'),
(297, 'souravpikhan7@gmail.com', '158b3f63afbf6b388521c2b40ad28d4fed29d234', 'Mechanical Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=158b3f63afbf6b388521c2b40ad28d4fed29d234'),
(298, 'sumitrathod0610@gmail.com', 'ad4351768c2f8b578db875a721be04ade1953c0b', 'Mechanical Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=ad4351768c2f8b578db875a721be04ade1953c0b'),
(299, 'swarangds2000@gmail.com', '12c201014776f4cda4b606119d26dc1f16f5a0a5', 'Mechanical Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=12c201014776f4cda4b606119d26dc1f16f5a0a5'),
(300, 'sankhenikhil3931@gmail.com', '1544754414dfbbad9349b511636c9a25fd5a974c', 'Mechanical Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=1544754414dfbbad9349b511636c9a25fd5a974c'),
(301, 'rahulmahesh@hotmail.com', 'e2aeb4db42d6b0c35a79624d2ab66eb7879f6f56', 'Mechanical Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=e2aeb4db42d6b0c35a79624d2ab66eb7879f6f56'),
(302, 'raheelafe2@gmail.com', 'bf0a65264aca69bcdfa51fe3ca806d5860cf624e', 'Mechanical Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=bf0a65264aca69bcdfa51fe3ca806d5860cf624e'),
(303, 'harshalshelar2412@gmail.com', '1e282ba40e5cb26dfe2aeea9bc9c8bd7e7a16870', 'Mechanical Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=1e282ba40e5cb26dfe2aeea9bc9c8bd7e7a16870'),
(304, 'sahilsawant67@gmail.com', 'c453a453e0164a3aa92e41b6eca267dc953a9d33', 'Mechanical Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=c453a453e0164a3aa92e41b6eca267dc953a9d33'),
(305, 'parthseps@gmail.com', 'fcc77f115256260fa521db492dd102a1cc4747a6', 'Mechanical Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=fcc77f115256260fa521db492dd102a1cc4747a6'),
(306, 'saithorat9943@gmail.com', '31cde0ff5949c65cfdae732d89f098f2c1379f16', 'Mechanical Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=31cde0ff5949c65cfdae732d89f098f2c1379f16'),
(307, 'rohanshinde993@gmail.com', 'ba731fc1150bde5a3c402735af2eb6bb3e9a1ba8', 'Mechanical Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=ba731fc1150bde5a3c402735af2eb6bb3e9a1ba8'),
(308, 'alishathakre101@gmail.com', '529fc7b973bfe0a3403b65f03c80793448e23212', 'Mechanical Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=529fc7b973bfe0a3403b65f03c80793448e23212'),
(309, 'prajapatisunny222@gmail.com', 'd60e1a44d4f071c0486cb9ea0d9c12b3618a8e78', 'Mechanical Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=d60e1a44d4f071c0486cb9ea0d9c12b3618a8e78'),
(310, 'pitlewardevraj@yahoo.co.in', '4141e75c7eeb705fa62faf50cf392559782fd3d5', 'Mechanical Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=4141e75c7eeb705fa62faf50cf392559782fd3d5'),
(311, 'omkarsawant99@gmail.com', 'db0c3dfd787d1b81885530443a9a78238c60046d', 'Mechanical Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=db0c3dfd787d1b81885530443a9a78238c60046d'),
(312, 'pratikdhande94@gmail.com', '73b9d20020fb39ff73af5f4ca5033616ced5dc53', 'Mechanical Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=73b9d20020fb39ff73af5f4ca5033616ced5dc53'),
(313, 'tanmayfirake3@gmail.com', 'ed64cb3e15bf8bc4bc64f932043c7770bfc8ff6d', 'Mechanical Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=ed64cb3e15bf8bc4bc64f932043c7770bfc8ff6d'),
(314, 'rawatetejas.2018@gmail.com', '3a3a2711b19db76a8f8444dc34d520bcc2571a91', 'Mechanical Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=3a3a2711b19db76a8f8444dc34d520bcc2571a91'),
(315, 'vulcanicmechanic39@gmail.com', '5ca287e776bc9e3a279d21792082c9e2ea817ab5', 'Mechanical Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=5ca287e776bc9e3a279d21792082c9e2ea817ab5'),
(316, 'ajithprajapati146@gmail.com', '19f7fda99980c52baaa8c531f1bd3d86451e6ca5', 'Mechanical Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=19f7fda99980c52baaa8c531f1bd3d86451e6ca5'),
(317, 'harshshimpi18@gmail.com', '67bc83ac144b6a57f2f58ec4c2f02c810cd2e865', 'Mechanical Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=67bc83ac144b6a57f2f58ec4c2f02c810cd2e865'),
(318, 'sushyelwe@gmail.com', '5f1f729814b8e2ea8217bb4216106d0de3df280e', 'Mechanical Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=5f1f729814b8e2ea8217bb4216106d0de3df280e'),
(319, 'yashameya2000@gmail.com', '21677af4b3ae32461ce548cd362f71d86917692a', 'Mechanical Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=21677af4b3ae32461ce548cd362f71d86917692a'),
(320, 'pritamtambe1599@gmail.com', 'e110d0ab5cc10851ac63c86e8f0376cb61fa02b3', 'Mechanical Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=e110d0ab5cc10851ac63c86e8f0376cb61fa02b3'),
(321, 'pawanchowta007@gmail.com', '6609a94c560a77ffd85aa3a7fc39250e6f8678a0', 'Mechanical Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=6609a94c560a77ffd85aa3a7fc39250e6f8678a0'),
(322, 'sakshi.damankar@gmail.com', '52fbd8183acf0afe50ae563f3bcd8183da9fe559', 'Mechanical Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=52fbd8183acf0afe50ae563f3bcd8183da9fe559'),
(323, 'varunrjadhav23@gmail.com', 'becb7d2498999ee659a00c649e75c94b3100942c', 'Mechanical Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=becb7d2498999ee659a00c649e75c94b3100942c'),
(324, 'prasad9mastakar@gmail.com', '0397910bf1f13070d0f9d9c76f94f7bed0730cfa', 'Mechanical Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=0397910bf1f13070d0f9d9c76f94f7bed0730cfa'),
(325, 'himanshu77707@gmail.com', '1c1bb85eeb86fdecd858b661a762425958e30d95', 'Mechanical Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=1c1bb85eeb86fdecd858b661a762425958e30d95'),
(326, 'ashutoshbhalerao12@gmail.com', '9aec3edd66f99d61a1001967e3b2bf3b63fadf00', 'Mechanical Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=9aec3edd66f99d61a1001967e3b2bf3b63fadf00'),
(327, 'bhandarijainish84@gmail.com', '2e6b10565d4c489aec1b663212631a0c37b811a7', 'Mechanical Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=2e6b10565d4c489aec1b663212631a0c37b811a7'),
(328, 'damini1860@gmail.com', '406f16a90022c0fa80a30b529a7f4312f99cad72', 'Mechanical Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=406f16a90022c0fa80a30b529a7f4312f99cad72'),
(329, 'chiragbhoir1234@gmail.com', '22c1f637dd4056534a8791447865ca414d7a4413', 'Mechanical Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=22c1f637dd4056534a8791447865ca414d7a4413'),
(330, 'ibijoli@gmail.com', '2ed39d8a9407e3dd7c549b790005d8611bd70493', 'Mechanical Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=2ed39d8a9407e3dd7c549b790005d8611bd70493'),
(331, 'akshaychachare@gmail.com', '9b67696ad84947596905c16345070e99ddf65d50', 'Mechanical Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=9b67696ad84947596905c16345070e99ddf65d50'),
(332, 'chauhanrahul7469@gmail.com', '718a8a8b5eb6e8d597c8fedcfb20876dc124bf98', 'Mechanical Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=718a8a8b5eb6e8d597c8fedcfb20876dc124bf98'),
(333, 'vamsi1.datta@gmail.com', 'd6f01e195d3516144711f563238eaafdf3c41530', 'Mechanical Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=d6f01e195d3516144711f563238eaafdf3c41530'),
(334, 'guptesomil123@gmail.com', '39418e553515361ffc5a95e46232999f3993a42c', 'Mechanical Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=39418e553515361ffc5a95e46232999f3993a42c'),
(335, 'atharvacore@gmail.com', '4c1d588dee81432c6ccfbd2bc151e84ad564caf3', 'Mechanical Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=4c1d588dee81432c6ccfbd2bc151e84ad564caf3'),
(336, 'awaiskazi46@gmail.com', 'f556883e99caa14e8f13ee03f536b7e796837f0a', 'Mechanical Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=f556883e99caa14e8f13ee03f536b7e796837f0a'),
(337, 'pravinkhare2721@gmail.com', '47b42e03089f23983e2d083dab37d1a2c7bb9e5b', 'Mechanical Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=47b42e03089f23983e2d083dab37d1a2c7bb9e5b'),
(338, 'tejaskulkarni451@gmail.com', '2ad3757e0c20faec5dd523e630877ccfe8261abf', 'Mechanical Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=2ad3757e0c20faec5dd523e630877ccfe8261abf'),
(339, 'sumit98lohia@gmail.com', 'e6145d0c06bf767678c11bf06a240433e5e56219', 'Mechanical Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=e6145d0c06bf767678c11bf06a240433e5e56219'),
(340, 'sarika.mandarkar21@gmail.com', 'ac1a48e9702ed0961d7dcd533f4db8ab4aefeb21', 'Mechanical Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=ac1a48e9702ed0961d7dcd533f4db8ab4aefeb21'),
(341, 'amitshedage66@gmail.com', '832b55c35b6ddec29b6c9ebdf12f941950895348', 'Mechanical Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=832b55c35b6ddec29b6c9ebdf12f941950895348'),
(342, 'mujumdarsumeet@gmail.com ', 'b06f55c73fbbade208beea1ee33afd8952c4c5b2', 'Mechanical Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=b06f55c73fbbade208beea1ee33afd8952c4c5b2'),
(343, 'pandeyarunb@gmail.com', 'c2d24d7d25325c191ff544b8cd9de3af0cc525af', 'Mechanical Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=c2d24d7d25325c191ff544b8cd9de3af0cc525af'),
(344, 'pnawale39@gmail.com', '26c07b95cd563596d3bdecb9f617adce893b625e', 'Mechanical Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=26c07b95cd563596d3bdecb9f617adce893b625e'),
(345, 'nsnshinde.73@gmail.com', 'dca956ebaea154820c41c3f262d9ae09f35b6d4e', 'Mechanical Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=dca956ebaea154820c41c3f262d9ae09f35b6d4e'),
(346, 'rohanrpatil13@gmail.com', '7b93a7b93cb10a8be9b83dce5ae6bcb6165a9aad', 'Mechanical Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=7b93a7b93cb10a8be9b83dce5ae6bcb6165a9aad'),
(347, 'mishan2298@gmail.com', '406d211b1cc3144db1de1e9f7b2b1cfc137fe959', 'Mechanical Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=406d211b1cc3144db1de1e9f7b2b1cfc137fe959'),
(348, 'akashshelke859@gmail.com', '2852342340685791b83f183dcffa917930b434e7', 'Mechanical Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=2852342340685791b83f183dcffa917930b434e7'),
(349, 'rutujaphapale111998@gmail.com', '85579325a67c1ba1a631bdc7381c8f055e25f8df', 'Mechanical Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=85579325a67c1ba1a631bdc7381c8f055e25f8df'),
(350, 'pingaleprashant73@gmail.com', '856ad0e47cf823dfc2ff0c161b347b6b6af9f9b3', 'Mechanical Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=856ad0e47cf823dfc2ff0c161b347b6b6af9f9b3'),
(351, 'sablevishakha26@gmail.com', 'adbef03f7fe3471fcef238f2992a318b3e1fa24f', 'Mechanical Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=adbef03f7fe3471fcef238f2992a318b3e1fa24f'),
(352, 'onkar.patil0197@gmail.com', '280e0ebf5a7fe90302ee17898d50f3891c047430', 'Mechanical Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=280e0ebf5a7fe90302ee17898d50f3891c047430'),
(353, 'atharvapadmanabhan@gmail.com', '64bd64f8d458f45109fb2e9130d8c98c165235da', 'Mechanical Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=64bd64f8d458f45109fb2e9130d8c98c165235da'),
(354, 'shubhamp1000@gmail.com', 'b9412d3011609c6806f3d4c44aacaa7b2376f19f', 'Mechanical Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=b9412d3011609c6806f3d4c44aacaa7b2376f19f'),
(355, 'sharmayogesh00722@gmail.com', '27bc93bdb1fd710039850d84036913f8f0f86e72', 'Mechanical Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=27bc93bdb1fd710039850d84036913f8f0f86e72'),
(356, 'sourabh.raut99@gmail.com', 'def2b567b5809dcb7c1c69f9a628e48509632b01', 'Mechanical Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=def2b567b5809dcb7c1c69f9a628e48509632b01'),
(357, 'sankhehimank71298@gmail.com', 'b5475dab572f7955ec429715f5481a8a6daeb208', 'Mechanical Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=b5475dab572f7955ec429715f5481a8a6daeb208'),
(358, 'dhawalmore27@gmail.com', '14a941152a4f22f054dd3f199898710fa6603940', 'Mechanical Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=14a941152a4f22f054dd3f199898710fa6603940'),
(359, 'sanjaysahu1791@gmail.com', '060ba39cb7bc17935d89a050c8c1f04c1f9a45de', 'Mechanical Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=060ba39cb7bc17935d89a050c8c1f04c1f9a45de'),
(360, 'shrutitarle@gmail.com', '4a6452a6cb475db28c375748f6906e4e628d5286', 'Mechanical Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=4a6452a6cb475db28c375748f6906e4e628d5286'),
(361, 'aadkeneha@gmail.com', '92a1e466344098760c7cafaecb3976a056705fb1', 'Applied Sciences', '2', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=92a1e466344098760c7cafaecb3976a056705fb1'),
(362, 'nabeel9819@gmail.com', '9fded545f74ab1382704f2a509cf18f2f819a4c8', 'Applied Sciences', '2', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=9fded545f74ab1382704f2a509cf18f2f819a4c8'),
(363, 'anushasunil71201@gmail.com', '1918e3a72494e08fc4a6d886a64951839fe359e0', 'Applied Sciences', '2', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=1918e3a72494e08fc4a6d886a64951839fe359e0'),
(364, 'shanmukhbhutada05@gmail.com', 'e8eec7dac4f7a7b7c641a5b13da624b92ff87865', 'Applied Sciences', '2', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=e8eec7dac4f7a7b7c641a5b13da624b92ff87865'),
(365, 'pratikachavan1984@gmail.com', 'e8b69ac9daffce23d13462e748627780182ce856', 'Applied Sciences', '2', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=e8b69ac9daffce23d13462e748627780182ce856'),
(366, 'elrishadsilva2002@gmail.com', '20240e701a4560ba3c28d7b3bd38e3b06593e31d', 'Applied Sciences', '2', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=20240e701a4560ba3c28d7b3bd38e3b06593e31d'),
(367, 'mrunalgavit1900@gmail.com', '6701ff9f227cff11f5510346479165e1cd8504cc', 'Applied Sciences', '2', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=6701ff9f227cff11f5510346479165e1cd8504cc'),
(368, 'harshgharat663@gmail.com', 'd5e998310200cfb6cb288fd619f0fe5b23a32125', 'Applied Sciences', '2', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=d5e998310200cfb6cb288fd619f0fe5b23a32125'),
(369, 'ghosalkarharsh1510@gmail.com', '8fae77aee999311acc5985ad43f80585a57e58a3', 'Applied Sciences', '2', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=8fae77aee999311acc5985ad43f80585a57e58a3'),
(370, 'gosaviamol1811@gmail.com', '6bccc51143b2bfee7437dd643acc81edff550a45', 'Applied Sciences', '2', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=6bccc51143b2bfee7437dd643acc81edff550a45'),
(371, 'harish080401@gmail.com', '6cb03cab120282587a96f054888738957403fb55', 'Applied Sciences', '2', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=6cb03cab120282587a96f054888738957403fb55'),
(372, 'ng85850@gmail.com', 'c68668ac2c70318c3c20dc43d063c1e22f81edbd', 'Applied Sciences', '2', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=c68668ac2c70318c3c20dc43d063c1e22f81edbd'),
(373, 'guptashubham95a@gmail.com', 'fda2753e6581535f05061bb0858ed07d7ad5fe64', 'Applied Sciences', '2', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=fda2753e6581535f05061bb0858ed07d7ad5fe64'),
(374, 'bhupeshgurav124@gmail.com', '5acd3d81d8fd443f3e7c5f84af3ba035a93f3836', 'Applied Sciences', '2', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=5acd3d81d8fd443f3e7c5f84af3ba035a93f3836'),
(375, 'shrutihalde@gmail.com', 'b57a58ef4a07ba94a0acfac4831c5e474984c37a', 'Applied Sciences', '2', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=b57a58ef4a07ba94a0acfac4831c5e474984c37a'),
(376, 'khan47742@gmail.com', '58d96ae66ada2362b1500b61c7ab22e52b459302', 'Applied Sciences', '2', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=58d96ae66ada2362b1500b61c7ab22e52b459302'),
(377, 'anujkadam1310@gmail.com', 'bc161f754fd974b4bd318e1515ec3a5cd9de64d5', 'Applied Sciences', '2', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=bc161f754fd974b4bd318e1515ec3a5cd9de64d5'),
(378, 'amaankami7@gmail.com', '60c4ae0a1dc8466dc6f4ef226933bd94501bc6d1', 'Applied Sciences', '2', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=60c4ae0a1dc8466dc6f4ef226933bd94501bc6d1'),
(379, 'vedantkathe846@gmail.com', '3876eb3670546b54969634556f9e70c492d206ec', 'Applied Sciences', '2', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=3876eb3670546b54969634556f9e70c492d206ec'),
(380, 'vaishalivalvi7741@gmail.com', '325029ca1ae3b0a250ce5be3b15b8ecd3869e38d', 'Applied Sciences', '2', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=325029ca1ae3b0a250ce5be3b15b8ecd3869e38d'),
(381, 'shailendrakumarmahto1973@gmail.com', '4fa21e6320f6028685e9c9c2ea04d804d34bd0a0', 'Applied Sciences', '2', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=4fa21e6320f6028685e9c9c2ea04d804d34bd0a0'),
(382, 'kartikmahindrakar07@gmail.com', '3ebf9ee208057561e285f1a00d5794e87b940dd5', 'Applied Sciences', '2', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=3ebf9ee208057561e285f1a00d5794e87b940dd5'),
(383, 'mauryabhavesh10@gmail.com', 'e41508f03a496e6ba7bcb7a00546c8fa53d21e3a', 'Applied Sciences', '2', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=e41508f03a496e6ba7bcb7a00546c8fa53d21e3a'),
(384, 'sparkar32@gmail.com', '65228fa18758b2b973bba188666984863b49beed', 'Applied Sciences', '2', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=65228fa18758b2b973bba188666984863b49beed'),
(385, 'vipulparmar1976@gmail.com', '67efb2241b3377587e8f4855def7ac42ea116aa8', 'Applied Sciences', '2', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=67efb2241b3377587e8f4855def7ac42ea116aa8'),
(386, 'patilsha18@gmail.com', '007eac84561abda091e923dd51c29da69c05d5fa', 'Applied Sciences', '2', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=007eac84561abda091e923dd51c29da69c05d5fa'),
(387, 'pede.anushka@gmail.com', 'c03d209faa0666ff0959d8d3d62fa139479485a8', 'Applied Sciences', '2', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=c03d209faa0666ff0959d8d3d62fa139479485a8'),
(388, 'ashnilabhatt@gmail.com', '40f415e95860d68f83db4c4fe9d0f471181f4138', 'Applied Sciences', '2', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=40f415e95860d68f83db4c4fe9d0f471181f4138'),
(389, 'omrane24012002@gmail.com', '2a4da6a59204709645eb4d61ce6cd13ecc33b293', 'Applied Sciences', '2', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=2a4da6a59204709645eb4d61ce6cd13ecc33b293'),
(390, 'nileshsahu2075@gmail.com', '1798160a6704242acad4441638da02c87857cc03', 'Applied Sciences', '2', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=1798160a6704242acad4441638da02c87857cc03'),
(391, 'swarajsalunke2001@gmail.com', '710672a0e56ad0632bf89077b15eaba69711baf0', 'Applied Sciences', '2', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=710672a0e56ad0632bf89077b15eaba69711baf0'),
(392, 'komalsatam2001@gmail.com', 'e54b94ea7cb2d9da7218148c73c9e302188921a4', 'Applied Sciences', '2', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=e54b94ea7cb2d9da7218148c73c9e302188921a4'),
(393, 'sawajiharsh@gmail.com', 'd143685323e017bd68e37d9a79a59e2b480e2d69', 'Applied Sciences', '2', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=d143685323e017bd68e37d9a79a59e2b480e2d69'),
(394, 'zishaansayyed09@gmail.com', 'f4a90e8becbead1f9c61d6ede7f6132ad843fe4c', 'Applied Sciences', '2', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=f4a90e8becbead1f9c61d6ede7f6132ad843fe4c'),
(395, 'shahrishank@gmail.com', 'c7bd9908e01a80ca118bbf5cecfa3623095e09b0', 'Applied Sciences', '2', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=c7bd9908e01a80ca118bbf5cecfa3623095e09b0'),
(396, 'md.asaad.shaikh@gmail.com', 'bc2e5de907659ec2420b3421e694b27dad079e2f', 'Applied Sciences', '2', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=bc2e5de907659ec2420b3421e694b27dad079e2f'),
(397, 'nawabyasin145@gmail.com', '37d33b6582d8b57efce16a026fc2f27b7825914b', 'Applied Sciences', '2', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=37d33b6582d8b57efce16a026fc2f27b7825914b'),
(398, 'shirkeharsh8@gmail.com', 'c860376e89a5045b75b09e02acce94a9356ba31b', 'Applied Sciences', '2', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=c860376e89a5045b75b09e02acce94a9356ba31b'),
(399, 'altamashkhan23820@gmail.com', '360dda18d87e8315445cc6d00b1a9064b1913c71', 'Applied Sciences', '2', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=360dda18d87e8315445cc6d00b1a9064b1913c71'),
(400, 'mihirvartak01@gmail.com', '73c2be552cd8cd250dd01a0d6194afe240895ae1', 'Applied Sciences', '2', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=73c2be552cd8cd250dd01a0d6194afe240895ae1'),
(401, 'nanditaattawar01@gmail.com', 'e9e0292130bd5bc089d0a6a3e23c0b3859324c8e', 'Applied Sciences', '2', 'C', 'mctrgitfeedback.000webhostapp.com/index.php?id=e9e0292130bd5bc089d0a6a3e23c0b3859324c8e'),
(402, 'bhanderajas5@gmail.com', 'a7c0ad4b424c94c6badee99edf5306cfad166c6a', 'Applied Sciences', '2', 'C', 'mctrgitfeedback.000webhostapp.com/index.php?id=a7c0ad4b424c94c6badee99edf5306cfad166c6a'),
(403, 'apurvadhote03@gmail.com', 'e2b33ead02c6bfe295fd2cb77ae52fec5caf3d20', 'Applied Sciences', '2', 'C', 'mctrgitfeedback.000webhostapp.com/index.php?id=e2b33ead02c6bfe295fd2cb77ae52fec5caf3d20'),
(404, 'kajalgidh@gmail.com', 'd12bc0eda9c59510a88c27bc8c87d2356b1bffa6', 'Applied Sciences', '2', 'C', 'mctrgitfeedback.000webhostapp.com/index.php?id=d12bc0eda9c59510a88c27bc8c87d2356b1bffa6'),
(405, 'godambeaditya@gmail.com', 'cca8f8497b48ce0d0588f1d6899e685c16640a36', 'Applied Sciences', '2', 'C', 'mctrgitfeedback.000webhostapp.com/index.php?id=cca8f8497b48ce0d0588f1d6899e685c16640a36'),
(406, 'roshang441@gmail.com', 'cfce511e7edc01a53b2bafa950e32e0193dcbf98', 'Applied Sciences', '2', 'C', 'mctrgitfeedback.000webhostapp.com/index.php?id=cfce511e7edc01a53b2bafa950e32e0193dcbf98'),
(407, 'nehalaxmankadam7120@gmail.com', 'dab68e3706cb6d9ed650ff4417b8bc1e8ed46028', 'Applied Sciences', '2', 'C', 'mctrgitfeedback.000webhostapp.com/index.php?id=dab68e3706cb6d9ed650ff4417b8bc1e8ed46028'),
(408, 'siddheshkadam016@gmail.com', '495a1d674d7511ace4aa1cf46f9ebd83a995539e', 'Applied Sciences', '2', 'C', 'mctrgitfeedback.000webhostapp.com/index.php?id=495a1d674d7511ace4aa1cf46f9ebd83a995539e'),
(409, 'kariyasakshi92@gmail.com', '32b7034b2edcea5e1d538352b9d0401424d8ec61', 'Applied Sciences', '2', 'C', 'mctrgitfeedback.000webhostapp.com/index.php?id=32b7034b2edcea5e1d538352b9d0401424d8ec61'),
(410, 'Sweta.sk0101@gmail.com', '280b3cfe69aaf1a6e4370d8db53e6c065a16e808', 'Applied Sciences', '2', 'C', 'mctrgitfeedback.000webhostapp.com/index.php?id=280b3cfe69aaf1a6e4370d8db53e6c065a16e808'),
(411, 'charusheela312@gmail.com', 'e7a42798a339f6aefe2a7b64e81036d83ebab52a', 'Applied Sciences', '2', 'C', 'mctrgitfeedback.000webhostapp.com/index.php?id=e7a42798a339f6aefe2a7b64e81036d83ebab52a'),
(412, 'yashmestry333@gmail.com', '9a5ceeaf5d49892610416507677e38f2be7c48d7', 'Applied Sciences', '2', 'C', 'mctrgitfeedback.000webhostapp.com/index.php?id=9a5ceeaf5d49892610416507677e38f2be7c48d7'),
(413, 'laxpandey28@gmail.com', '4d6c7e5c868fb6ed45d1827fe21d5e4635c65376', 'Applied Sciences', '2', 'C', 'mctrgitfeedback.000webhostapp.com/index.php?id=4d6c7e5c868fb6ed45d1827fe21d5e4635c65376'),
(414, 'bhuvanesh.parab.007@gmail.com', 'e5fbb0623704760c939408694c17f3608df69385', 'Applied Sciences', '2', 'C', 'mctrgitfeedback.000webhostapp.com/index.php?id=e5fbb0623704760c939408694c17f3608df69385'),
(415, 'pevekarsiddhi@gmail.com', 'ae9afb66f7036163a49b47b6b271350cb3e11226', 'Applied Sciences', '2', 'C', 'mctrgitfeedback.000webhostapp.com/index.php?id=ae9afb66f7036163a49b47b6b271350cb3e11226'),
(416, 'nohinsabu01@gmail.com', '86e562acf228b8cb056f18b7a25fe6398f579d80', 'Applied Sciences', '2', 'C', 'mctrgitfeedback.000webhostapp.com/index.php?id=86e562acf228b8cb056f18b7a25fe6398f579d80'),
(417, 'smaheswary09@gmail.com', 'f556776c3ab67eb983603be1f5b98b97672a194e', 'Applied Sciences', '2', 'C', 'mctrgitfeedback.000webhostapp.com/index.php?id=f556776c3ab67eb983603be1f5b98b97672a194e'),
(418, 'svaradh0602@gmail.com', '7cf1649b4edf8bdcb436b92005e40268f8c170a7', 'Applied Sciences', '2', 'C', 'mctrgitfeedback.000webhostapp.com/index.php?id=7cf1649b4edf8bdcb436b92005e40268f8c170a7'),
(419, 'akshatateli2002@gmail.com', 'ecdb3e736fcfa055c3af8a338156da9983273ea1', 'Applied Sciences', '2', 'C', 'mctrgitfeedback.000webhostapp.com/index.php?id=ecdb3e736fcfa055c3af8a338156da9983273ea1'),
(420, 'shrutiwani220501@gmail.com', 'dc344964931840ab68044a671546ef71d0780022', 'Applied Sciences', '2', 'C', 'mctrgitfeedback.000webhostapp.com/index.php?id=dc344964931840ab68044a671546ef71d0780022'),
(421, 'shravanbangera2001@gmail.com', 'e043409fb21454a4977567585e00b1a069994a10', 'Applied Sciences', '2', 'D', 'mctrgitfeedback.000webhostapp.com/index.php?id=e043409fb21454a4977567585e00b1a069994a10'),
(422, 'aaru98210@gmail.com', '1ec216953b8e431fe037229c49a0e30131d44ca2', 'Applied Sciences', '2', 'D', 'mctrgitfeedback.000webhostapp.com/index.php?id=1ec216953b8e431fe037229c49a0e30131d44ca2'),
(423, 'prathameshchougule02@gmail.com', 'dffea9251ff251836d12c71c6086eb39db708ddb', 'Applied Sciences', '2', 'D', 'mctrgitfeedback.000webhostapp.com/index.php?id=dffea9251ff251836d12c71c6086eb39db708ddb'),
(424, 'ankitchoukekar123@gmail.com', '609377da27851e65265a339735bc88d85a61a1cc', 'Applied Sciences', '2', 'D', 'mctrgitfeedback.000webhostapp.com/index.php?id=609377da27851e65265a339735bc88d85a61a1cc'),
(425, 'bmdiwadkar@gmail.com', '226c0db3fca723525a5c89b491e553c8906008d7', 'Applied Sciences', '2', 'D', 'mctrgitfeedback.000webhostapp.com/index.php?id=226c0db3fca723525a5c89b491e553c8906008d7'),
(426, 'gauravgavade16@gmail.com', '76ce53b7615edf6d78839fab33aaf26b12d2305b', 'Applied Sciences', '2', 'D', 'mctrgitfeedback.000webhostapp.com/index.php?id=76ce53b7615edf6d78839fab33aaf26b12d2305b'),
(427, 'akhileshgupta1256@gmail.com', 'e6ab48cdd56c25a5ac43accbee14d403ac4d1106', 'Applied Sciences', '2', 'D', 'mctrgitfeedback.000webhostapp.com/index.php?id=e6ab48cdd56c25a5ac43accbee14d403ac4d1106'),
(428, 'aadityadjadhav@gmail.com', '36bca32e3f75da39fbe44a28ae6b12c95322994b', 'Applied Sciences', '2', 'D', 'mctrgitfeedback.000webhostapp.com/index.php?id=36bca32e3f75da39fbe44a28ae6b12c95322994b'),
(429, 'utssavjaiswal@icloud.com', '5edc38eb144f8a4fdf34ae0b73f635eabb2547fc', 'Applied Sciences', '2', 'D', 'mctrgitfeedback.000webhostapp.com/index.php?id=5edc38eb144f8a4fdf34ae0b73f635eabb2547fc'),
(430, 'ishitakale0749@gmail.com', 'd64bcd030c858c81b9bff592952d60875bb7e28a', 'Applied Sciences', '2', 'D', 'mctrgitfeedback.000webhostapp.com/index.php?id=d64bcd030c858c81b9bff592952d60875bb7e28a'),
(431, 'venkateshmk999@gmail.com', '9a184054210d176a4f3d923c342d6a09729a454c', 'Applied Sciences', '2', 'D', 'mctrgitfeedback.000webhostapp.com/index.php?id=9a184054210d176a4f3d923c342d6a09729a454c'),
(432, 'yashgkaranjavkar2002@gmail.com', '2d34667f6199ab75d17ca6bc1c77004946553081', 'Applied Sciences', '2', 'D', 'mctrgitfeedback.000webhostapp.com/index.php?id=2d34667f6199ab75d17ca6bc1c77004946553081'),
(433, 'omkarkeer111@gmail.com', 'f0f102b7faae7b980a0952d41f668ea9aed6df16', 'Applied Sciences', '2', 'D', 'mctrgitfeedback.000webhostapp.com/index.php?id=f0f102b7faae7b980a0952d41f668ea9aed6df16'),
(434, 'yk4769060@gmail.com', '5c1a1836377115120be265daa0469ffe29613ced', 'Applied Sciences', '2', 'D', 'mctrgitfeedback.000webhostapp.com/index.php?id=5c1a1836377115120be265daa0469ffe29613ced'),
(435, 'bhavnakolkondi@gmail.com', '5ac833197fd386883b5a2541501003ce7a2f0ee8', 'Applied Sciences', '2', 'D', 'mctrgitfeedback.000webhostapp.com/index.php?id=5ac833197fd386883b5a2541501003ce7a2f0ee8'),
(436, 'joysonneelkumar226@gmail.com', 'c68e596d17dd9ee4812432561ec75b306a8e9b23', 'Applied Sciences', '2', 'D', 'mctrgitfeedback.000webhostapp.com/index.php?id=c68e596d17dd9ee4812432561ec75b306a8e9b23'),
(437, 'shanmugarobins22@gmail.com', '61fb126adb924b89b5033d672b24947df0d0bbcd', 'Applied Sciences', '2', 'D', 'mctrgitfeedback.000webhostapp.com/index.php?id=61fb126adb924b89b5033d672b24947df0d0bbcd'),
(438, 'prathamsoni2403@gmail.com', '19bb114d8903bef46c4cd560dd0477c4a6d98c0b', 'Applied Sciences', '2', 'D', 'mctrgitfeedback.000webhostapp.com/index.php?id=19bb114d8903bef46c4cd560dd0477c4a6d98c0b'),
(439, 'roshanthankar@gmail.com', '2ccb56745a41945c8526163fa4f70b6b6a7e67c2', 'Applied Sciences', '2', 'D', 'mctrgitfeedback.000webhostapp.com/index.php?id=2ccb56745a41945c8526163fa4f70b6b6a7e67c2'),
(440, 'upadhyayaakash520@gmail.com', 'e86f4531e820773d1216e64e3353abd7d0c0d0fa', 'Applied Sciences', '2', 'D', 'mctrgitfeedback.000webhostapp.com/index.php?id=e86f4531e820773d1216e64e3353abd7d0c0d0fa'),
(441, 'patilppssp@gmail.com', 'f8e465aaa58809629588de29e0480eecb18b05fc', 'Applied Sciences', '2', 'E', 'mctrgitfeedback.000webhostapp.com/index.php?id=f8e465aaa58809629588de29e0480eecb18b05fc'),
(442, 'sudarshanpotul@gmail.com', '27d73f4385a9e586a34fa062d116fd044ba18a34', 'Applied Sciences', '2', 'E', 'mctrgitfeedback.000webhostapp.com/index.php?id=27d73f4385a9e586a34fa062d116fd044ba18a34'),
(443, 'gaurangv2@outlook.com', '92603ae6c292be751fa62c5c92598ce2e346be9a', 'Applied Sciences', '2', 'E', 'mctrgitfeedback.000webhostapp.com/index.php?id=92603ae6c292be751fa62c5c92598ce2e346be9a'),
(444, 'prajwals0901@gmail.com', 'cd9879f267b8341688d62851d259a7a32dd11158', 'Applied Sciences', '2', 'E', 'mctrgitfeedback.000webhostapp.com/index.php?id=cd9879f267b8341688d62851d259a7a32dd11158'),
(445, 'shindeshantanu732@gmail.com', '8c3f9733b34bb17fabc9a8bc5c7a74fb89da76f0', 'Applied Sciences', '2', 'E', 'mctrgitfeedback.000webhostapp.com/index.php?id=8c3f9733b34bb17fabc9a8bc5c7a74fb89da76f0'),
(446, 'aakankshashirke01@gmail.com', '8d8bef2af99ac11fd9521ac49665d41f94c2749e', 'Applied Sciences', '2', 'E', 'mctrgitfeedback.000webhostapp.com/index.php?id=8d8bef2af99ac11fd9521ac49665d41f94c2749e'),
(447, 'Sudriko@gmail.com', '64938f2a611fc685ecb7835b4e908293a83ec8dc', 'Applied Sciences', '2', 'E', 'mctrgitfeedback.000webhostapp.com/index.php?id=64938f2a611fc685ecb7835b4e908293a83ec8dc'),
(448, 'thosarnikhil@gmail.com', '2c92f5b86c08f97e7599f6768953e9024bd68c1f', 'Applied Sciences', '2', 'E', 'mctrgitfeedback.000webhostapp.com/index.php?id=2c92f5b86c08f97e7599f6768953e9024bd68c1f'),
(449, 'amantrivedi118@gmail.com ', '1675abeb3ea132f90b0ec50a7165ad7eeac0e687', 'Applied Sciences', '2', 'E', 'mctrgitfeedback.000webhostapp.com/index.php?id=1675abeb3ea132f90b0ec50a7165ad7eeac0e687'),
(450, 'apurvavich02@gmail.com ', 'e35e275e063203fe7075b8f3e89023bb08a3712f', 'Applied Sciences', '2', 'E', 'mctrgitfeedback.000webhostapp.com/index.php?id=e35e275e063203fe7075b8f3e89023bb08a3712f'),
(451, 'vedant.vernekar10@gmail.com', '385134c96a42464bdf03976235b17237bff37817', 'Applied Sciences', '2', 'E', 'mctrgitfeedback.000webhostapp.com/index.php?id=385134c96a42464bdf03976235b17237bff37817'),
(452, 'swarang32@gmail.com', '8645a836076dbf5229b7b6f00e0c3f2b2ba13437', 'Applied Sciences', '2', 'E', 'mctrgitfeedback.000webhostapp.com/index.php?id=8645a836076dbf5229b7b6f00e0c3f2b2ba13437'),
(453, 'harshalyeole39@gmail.com', '60dc087cf25f6dd77f7b6c9ce6c730412ae3d700', 'Applied Sciences', '2', 'E', 'mctrgitfeedback.000webhostapp.com/index.php?id=60dc087cf25f6dd77f7b6c9ce6c730412ae3d700'),
(454, 'deva26022001@gmail.com', '782a037d5f91ab314f8ec5c8ec370627bb7ad30a', 'Applied Sciences', '2', 'E', 'mctrgitfeedback.000webhostapp.com/index.php?id=782a037d5f91ab314f8ec5c8ec370627bb7ad30a'),
(455, 'sahilgsingh55.gs@gmail.com', '17efe10d2289572351e74e9811e67e97935693f6', 'Applied Sciences', '2', 'E', 'mctrgitfeedback.000webhostapp.com/index.php?id=17efe10d2289572351e74e9811e67e97935693f6'),
(456, 'tiwarisuraj1428068@gmail.com', '850c0978023c3d953cd78f83cf03ec234cd0393a', 'Applied Sciences', '2', 'E', 'mctrgitfeedback.000webhostapp.com/index.php?id=850c0978023c3d953cd78f83cf03ec234cd0393a'),
(457, 'tawdepauravi@gmail.com', '042cccf7e511bebf0a16986f4375848a433e5fa6', 'Applied Sciences', '2', 'E', 'mctrgitfeedback.000webhostapp.com/index.php?id=042cccf7e511bebf0a16986f4375848a433e5fa6'),
(458, 'meherjanhavi18@gmail.com ', 'dc9c2ded56b699b2f4f528983bd8733797f4ee7f', 'Applied Sciences', '2', 'E', 'mctrgitfeedback.000webhostapp.com/index.php?id=dc9c2ded56b699b2f4f528983bd8733797f4ee7f'),
(459, 'dhruthishetty@yahoo.com', '577336936289375138f9d83334d6e56a19c5ecf5', 'Applied Sciences', '2', 'E', 'mctrgitfeedback.000webhostapp.com/index.php?id=577336936289375138f9d83334d6e56a19c5ecf5'),
(460, 'tridevansh.160601@gmail.com', 'aa6cfbed72d906cc10015c5327fee04999c51de6', 'Applied Sciences', '2', 'E', 'mctrgitfeedback.000webhostapp.com/index.php?id=aa6cfbed72d906cc10015c5327fee04999c51de6'),
(461, 'debjanidas134@gmail.com', '718f5541aa97461057b125c79b5a44175806b9c9', 'Applied Sciences', '2', 'F', 'mctrgitfeedback.000webhostapp.com/index.php?id=718f5541aa97461057b125c79b5a44175806b9c9'),
(462, 'abhi2534desai@gmail.com', '12b4142d69f36144da00646ed767c92a0c02dc4d', 'Applied Sciences', '2', 'F', 'mctrgitfeedback.000webhostapp.com/index.php?id=12b4142d69f36144da00646ed767c92a0c02dc4d'),
(463, 'nishadesai2001@gmail.com', '00a2cdd307354c8357e7be4f2ae587c892ded940', 'Applied Sciences', '2', 'F', 'mctrgitfeedback.000webhostapp.com/index.php?id=00a2cdd307354c8357e7be4f2ae587c892ded940'),
(464, 'kundandhore14@gmail.com', 'a6a0c49157b2e495833b2800c7f957979c3201b8', 'Applied Sciences', '2', 'F', 'mctrgitfeedback.000webhostapp.com/index.php?id=a6a0c49157b2e495833b2800c7f957979c3201b8'),
(465, 'khushigaikwad685@gmail.com', 'c8fdd1852506e86f2eadd9706454ef9412b1b4ca', 'Applied Sciences', '2', 'F', 'mctrgitfeedback.000webhostapp.com/index.php?id=c8fdd1852506e86f2eadd9706454ef9412b1b4ca'),
(466, 'ritikaghanekar308@gmail.com', '06935b1ead961098b45c0a81a44dfcaeea070a5e', 'Applied Sciences', '2', 'F', 'mctrgitfeedback.000webhostapp.com/index.php?id=06935b1ead961098b45c0a81a44dfcaeea070a5e'),
(467, 'shrushtijadhav1122@gmail.com', 'f261e8f02f2c94edb2336677135b60bb960ea6c8', 'Applied Sciences', '2', 'F', 'mctrgitfeedback.000webhostapp.com/index.php?id=f261e8f02f2c94edb2336677135b60bb960ea6c8'),
(468, 'shreyajagtap12@gmail.com', '6f9a288c4c0d194d415ab539b34d347700ce55cc', 'Applied Sciences', '2', 'F', 'mctrgitfeedback.000webhostapp.com/index.php?id=6f9a288c4c0d194d415ab539b34d347700ce55cc'),
(469, 'jaingaurav01283@gmail.com', '5810a51680e6ebaef71fbe389614356e85ec61b0', 'Applied Sciences', '2', 'F', 'mctrgitfeedback.000webhostapp.com/index.php?id=5810a51680e6ebaef71fbe389614356e85ec61b0'),
(470, 'jaiswalgauravshyam@gmail.com', 'd57edbd6369a51bad46ee66db95c1c1c4b342b2f', 'Applied Sciences', '2', 'F', 'mctrgitfeedback.000webhostapp.com/index.php?id=d57edbd6369a51bad46ee66db95c1c1c4b342b2f'),
(471, 'sandeshkanagal2000@gmail.com', '7b62cb3e6030b9abb43e8f936deed8a2c1caee9c', 'Applied Sciences', '2', 'F', 'mctrgitfeedback.000webhostapp.com/index.php?id=7b62cb3e6030b9abb43e8f936deed8a2c1caee9c'),
(472, 'hamid.khan767delta@gmail.com', '5905e0bff9738894b6c0bf52e138d03cc6a84954', 'Applied Sciences', '2', 'F', 'mctrgitfeedback.000webhostapp.com/index.php?id=5905e0bff9738894b6c0bf52e138d03cc6a84954'),
(473, 'khanobaid288@gmail.com', '7f9d2052cee34e11d6ae3e10372a1be17906e1c9', 'Applied Sciences', '2', 'F', 'mctrgitfeedback.000webhostapp.com/index.php?id=7f9d2052cee34e11d6ae3e10372a1be17906e1c9'),
(474, 'morebhalchandra55@gmail.com', '7bf1a88f8cde94418e231bb4ccc3d7bc93e422dd', 'Applied Sciences', '2', 'F', 'mctrgitfeedback.000webhostapp.com/index.php?id=7bf1a88f8cde94418e231bb4ccc3d7bc93e422dd'),
(475, 'mothermary2701@gmail.com', '1a38a4c82c6b1b029f1b8ae61704fca966a210f0', 'Applied Sciences', '2', 'F', 'mctrgitfeedback.000webhostapp.com/index.php?id=1a38a4c82c6b1b029f1b8ae61704fca966a210f0'),
(476, 'riteshnaik1705@gmail.com', '88b8b4ed9a09d1bf4e744a27368d209c2b97ac5f', 'Applied Sciences', '2', 'F', 'mctrgitfeedback.000webhostapp.com/index.php?id=88b8b4ed9a09d1bf4e744a27368d209c2b97ac5f'),
(477, 'shimirikanikam@gmail.com', '14dd85ec81e60937551209b0971d0e104397d007', 'Applied Sciences', '2', 'F', 'mctrgitfeedback.000webhostapp.com/index.php?id=14dd85ec81e60937551209b0971d0e104397d007'),
(478, 'rishabhpandey8250@gmail.com', '96b01ea7710760a504502b28a7499d8f7a177dac', 'Applied Sciences', '2', 'F', 'mctrgitfeedback.000webhostapp.com/index.php?id=96b01ea7710760a504502b28a7499d8f7a177dac'),
(479, 'soumik43@yahoo.com', '037e7a6d5268483d0e54468c00fa5f84426ce331', 'Applied Sciences', '2', 'F', 'mctrgitfeedback.000webhostapp.com/index.php?id=037e7a6d5268483d0e54468c00fa5f84426ce331'),
(480, 'omkarpednekar2002@gmail.com', '4bce34e6e22aed2e0e57a0061c564ea28c411e11', 'Applied Sciences', '2', 'F', 'mctrgitfeedback.000webhostapp.com/index.php?id=4bce34e6e22aed2e0e57a0061c564ea28c411e11'),
(481, 'ajayarjunwadkar@gmail.com', '93981d89d88b216342fc8d41ecb926034a465165', 'Computer Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=93981d89d88b216342fc8d41ecb926034a465165'),
(482, 'cptlhb@gmail.com', '1d25857ce011a02cbd7b6a9c0a2cb5669c4d04c9', 'Computer Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=1d25857ce011a02cbd7b6a9c0a2cb5669c4d04c9'),
(483, 'kanuchoudhary2000@gmail.com', '803e8f8f0e625c45946aa700171426230a6f9268', 'Computer Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=803e8f8f0e625c45946aa700171426230a6f9268'),
(484, 'dsakshat09@gmail.com', '2176f13048e16ceb0b67804a79d5adb5a2c7d66a', 'Computer Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=2176f13048e16ceb0b67804a79d5adb5a2c7d66a'),
(485, 'khushdave501@gmail.com', '711927bc4376f6b6684a0bfd922ee76e0d342613', 'Computer Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=711927bc4376f6b6684a0bfd922ee76e0d342613'),
(486, 'ddurva@gmail.com', '76f2f5ad3dbd6c188c4ca0d756e8202c71cecbc8', 'Computer Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=76f2f5ad3dbd6c188c4ca0d756e8202c71cecbc8'),
(487, 'adriandsouza2504@gmail.com', '6ca940cfb848f85c6ec64f4abf905ca90c15b326', 'Computer Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=6ca940cfb848f85c6ec64f4abf905ca90c15b326'),
(488, 'harshalighumate3296@gmail.com', '8c1c3260e005ac306f735071a101c3477685b002', 'Computer Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=8c1c3260e005ac306f735071a101c3477685b002'),
(489, 'mananjgosalia@gmail.com', 'ce80f8f2b3b25338ed99869cde98a6e59672aef4', 'Computer Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=ce80f8f2b3b25338ed99869cde98a6e59672aef4'),
(490, 'shubzicr4@gmail.com', 'c4915bca902d937925f3e8aec8fdc560addf909f', 'Computer Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=c4915bca902d937925f3e8aec8fdc560addf909f'),
(491, 'naitikjain19@gmail.com', 'fc7eb268122d8b11e28e1c031a66594704adb964', 'Computer Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=fc7eb268122d8b11e28e1c031a66594704adb964'),
(492, 'paraskamble2000@gmail.com', 'cf184cd7b7289c1af6841b6b78faffbf7871ae9b', 'Computer Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=cf184cd7b7289c1af6841b6b78faffbf7871ae9b'),
(493, 'abg1203@gmail.com', '8f030e1a88fcfc7588647501c377dae2e1980974', 'Computer Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=8f030e1a88fcfc7588647501c377dae2e1980974'),
(494, 'sebin.k.francis07@gmail.com', 'd0675f90d3631ed5bb4b916b7dda1cee083395ce', 'Computer Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=d0675f90d3631ed5bb4b916b7dda1cee083395ce'),
(495, 'akshaykedar585@gmail.com', 'a189305978b46104d6ddde67b50f08cd8f3dbd4e', 'Computer Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=a189305978b46104d6ddde67b50f08cd8f3dbd4e'),
(496, 'pranalikhuspe15@gmail.com', 'ca1731d66e2cfbc0494a2e621bb6bec28e4088cb', 'Computer Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=ca1731d66e2cfbc0494a2e621bb6bec28e4088cb'),
(497, 'kurhadesumedh20@gmail.com', '208c67b497722d986df03ce879014968f2a38131', 'Computer Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=208c67b497722d986df03ce879014968f2a38131'),
(498, 'vslahane73@gmail.com', 'c49084fba8e54e821bd4f6c149ca342f7b35c0b6', 'Computer Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=c49084fba8e54e821bd4f6c149ca342f7b35c0b6'),
(499, 'anushkamahakal@gmail.com', 'fd76f5646e3685d002685de95a8b17344c6a3ace', 'Computer Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=fd76f5646e3685d002685de95a8b17344c6a3ace'),
(500, 'manemayurim@gmail.com', 'dc27cd8f5fd860afae8f7f74aef887dea857eef2', 'Computer Engineering', '4', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=dc27cd8f5fd860afae8f7f74aef887dea857eef2'),
(501, 'siddheshpanchal2000@gmail.com', '01065fa090f046904e83466f401451b18e08fac3', 'Computer Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=01065fa090f046904e83466f401451b18e08fac3'),
(502, 'aryanpatel4507@gmail.com', 'f3ad52be8674add2a6ee72e80b18a6bdfa7d35a7', 'Computer Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=f3ad52be8674add2a6ee72e80b18a6bdfa7d35a7'),
(503, 'patilanagha2000@gmail.com', '519ac19846b84a7673b9da5b95c8b135e4b935fa', 'Computer Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=519ac19846b84a7673b9da5b95c8b135e4b935fa'),
(504, 'prathameshpatil03102000@gmail.com', 'b6c91ca427f6fa1568e5ea45b22e8c57bea26666', 'Computer Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=b6c91ca427f6fa1568e5ea45b22e8c57bea26666'),
(505, 'ritikdreams@gmail.com', '043f92092f1938cb0b9a49152527efa6593a1cc0', 'Computer Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=043f92092f1938cb0b9a49152527efa6593a1cc0'),
(506, 'krajpawar6380@gmail.com', 'c89ad658f25b64402fc2a32f29dbace1dc9a41c4', 'Computer Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=c89ad658f25b64402fc2a32f29dbace1dc9a41c4'),
(507, 'vikram.phonde@gmail.com', '337de7a0022bcf0cfa47c637d5e85fb5494cdd59', 'Computer Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=337de7a0022bcf0cfa47c637d5e85fb5494cdd59'),
(508, 'shivanshpoojary25@gmail.com', '06ff00971c3bd2ad9bf262dfab78d4ad9fdbbcca', 'Computer Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=06ff00971c3bd2ad9bf262dfab78d4ad9fdbbcca'),
(509, 'dishasankhe193@gmail.com', '0428f8eced1aa07968afeeb751a7b0ea71a587ea', 'Computer Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=0428f8eced1aa07968afeeb751a7b0ea71a587ea'),
(510, 'ninadusatam@gmail.com', '2caf170249fddad3b3651099f9d187d44b297a92', 'Computer Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=2caf170249fddad3b3651099f9d187d44b297a92');
INSERT INTO `mail_addr` (`mail_id`, `mail`, `mail_hash`, `mail_dept`, `mail_sem`, `mail_div`, `fb_link`) VALUES
(511, 'szskabir15@gmail.com', '20cb129306edd4a9766f0948514ef1b8269017d1', 'Computer Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=20cb129306edd4a9766f0948514ef1b8269017d1'),
(512, 'ninadshirsat12@gmail.com', '94052f8d0f0e10883c398ab7ab594586f282604b', 'Computer Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=94052f8d0f0e10883c398ab7ab594586f282604b'),
(513, 'sanchi.shirur4@gmail.com', '1ff2be1e778a35d0c1d833b5948a6fe5297fd3cd', 'Computer Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=1ff2be1e778a35d0c1d833b5948a6fe5297fd3cd'),
(514, 'sks.4547@gmail.com', '1a98df83e4b49f674bff7a7328c4c6c85fe6cb70', 'Computer Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=1a98df83e4b49f674bff7a7328c4c6c85fe6cb70'),
(515, 'appusomji@gmail.com', '8719a98a97f7e02274727ab77eba55d9be4b9cbd', 'Computer Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=8719a98a97f7e02274727ab77eba55d9be4b9cbd'),
(516, 'tanawadesahil13@gmail.com', 'e947de9630830c7bec8977ffde7c1bfb619ed7a3', 'Computer Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=e947de9630830c7bec8977ffde7c1bfb619ed7a3'),
(517, 'wakeupbudy50@gmail.com', '8aa170c4b1cee797b9170991a2b59f05ad3f5c43', 'Computer Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=8aa170c4b1cee797b9170991a2b59f05ad3f5c43'),
(518, 'thakreurvashi0805@gmail.com', '1b74b9e77588657085e3b5ac9ef120194bb80d97', 'Computer Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=1b74b9e77588657085e3b5ac9ef120194bb80d97'),
(519, 'yusufthanawala88@gmail.com', '811cdcfeb2b4e092452583ebde3446c66e8c1310', 'Computer Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=811cdcfeb2b4e092452583ebde3446c66e8c1310'),
(520, 'yadavabh99@gmail.com', 'c1e935a87b7566a94bbbd176c4a275519c74a9aa', 'Computer Engineering', '4', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=c1e935a87b7566a94bbbd176c4a275519c74a9aa'),
(521, 'mrunankmistry52@gmail.com', '2c5ae29d369ae068f2222048bee938772356ed9b', 'Computer Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=2c5ae29d369ae068f2222048bee938772356ed9b'),
(522, 'yashbandekar99@gmail.com', '576f8b925c995a3f0d270f1d43bac67ef45646d8', 'Computer Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=576f8b925c995a3f0d270f1d43bac67ef45646d8'),
(523, 'shrustibhor7@gmail.com', 'f37af851a7d8240aad1d6b0ffe0fa769ac29450d', 'Computer Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=f37af851a7d8240aad1d6b0ffe0fa769ac29450d'),
(524, 'bishtshailendra1999@gmail.com', 'a98be45f192b6cd928c5983fcde6bb43b7505990', 'Computer Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=a98be45f192b6cd928c5983fcde6bb43b7505990'),
(525, 'biswasmoumita.1114@gmail.com', 'be69efa8581f8252d7c12bc5b2cac8f2054e06dd', 'Computer Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=be69efa8581f8252d7c12bc5b2cac8f2054e06dd'),
(526, 'Sagar112113@yahoo.com', '1f8e58eb6fe9c5db7e71295bedf19494e805aaa7', 'Computer Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=1f8e58eb6fe9c5db7e71295bedf19494e805aaa7'),
(527, 'gaurichavan08778@gmail.com', 'd1814ade76d6dd558f6dc7561eb5ba8c4404196c', 'Computer Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=d1814ade76d6dd558f6dc7561eb5ba8c4404196c'),
(528, 'omkarchorghe22@gmail.com', 'a87d464b8779a53dead53f6130fa5b05f92779e5', 'Computer Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=a87d464b8779a53dead53f6130fa5b05f92779e5'),
(529, 'nachiketdigha95@gmail.com', 'e420487ea61aa09c2e77be9ef73aaf5c4e946e9b', 'Computer Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=e420487ea61aa09c2e77be9ef73aaf5c4e946e9b'),
(530, 'sgandhi7070@gmail.com', 'd9f184710159e775884e10183a9a7653fc009d45', 'Computer Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=d9f184710159e775884e10183a9a7653fc009d45'),
(531, 'tanaygodse@gmail.com', '83b0ef9eb6f88741aa3639f00d9e1aafe89a36da', 'Computer Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=83b0ef9eb6f88741aa3639f00d9e1aafe89a36da'),
(532, 'hithjain1999@gmail.com', '43f2d2b75523fdefa74e615a504949624b6cabe6', 'Computer Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=43f2d2b75523fdefa74e615a504949624b6cabe6'),
(533, 'sourav.katkar@gmail.com', '5eef9aae4df47781c3b708477fa3a58bfcba9129', 'Computer Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=5eef9aae4df47781c3b708477fa3a58bfcba9129'),
(534, 'khenir99@gmail.com', 'c13dd78f4a1f094dd6d1a6461251ccd147510911', 'Computer Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=c13dd78f4a1f094dd6d1a6461251ccd147510911'),
(535, 'dhruvam15@gmail.com', 'adbed39e2192175a5cf15591db6a41302d07a5f1', 'Computer Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=adbed39e2192175a5cf15591db6a41302d07a5f1'),
(536, 'sakshirkumar@gmail.com', '58bed7ea2084379532158b3c7c84df6006f77681', 'Computer Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=58bed7ea2084379532158b3c7c84df6006f77681'),
(537, 'srush.mahindrakar@gmail.com', '920af771bc207a1e470b242ca3c6c279d49e51f1', 'Computer Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=920af771bc207a1e470b242ca3c6c279d49e51f1'),
(538, 'yashbafna2000@gmail.com', '0409690d87e1175a5f51807518ea157f1ba5efef', 'Computer Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=0409690d87e1175a5f51807518ea157f1ba5efef'),
(539, 'vikramkini9@gmail.com', '1f4d8345f221976de42571379f5c2767a4ca59c5', 'Computer Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=1f4d8345f221976de42571379f5c2767a4ca59c5'),
(540, 'akanshagorivale@gmail.com', '01b5dff49dd19b55180ed7143fcd81a1405bed99', 'Computer Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=01b5dff49dd19b55180ed7143fcd81a1405bed99'),
(541, 'pratikshagaikwad231@gmail.com', '6eb005ad73f43ec2f31a4a0a5e4004767c981446', 'Computer Engineering', '6', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=6eb005ad73f43ec2f31a4a0a5e4004767c981446'),
(542, 'sahilkpalkar@gmail.com', '09100bc7c8ba1b8b18abc7338c6e1f40908a3aa9', 'Computer Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=09100bc7c8ba1b8b18abc7338c6e1f40908a3aa9'),
(543, 'nrpatil98@gmail.com', 'f7a04a07dea1055a74ddf07506d17531d7d895c4', 'Computer Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=f7a04a07dea1055a74ddf07506d17531d7d895c4'),
(544, 'tanayparalikar@gmail.com', '209c8e2d9d2e8f449378cc9914ed6ea2a4284fa5', 'Computer Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=209c8e2d9d2e8f449378cc9914ed6ea2a4284fa5'),
(545, 'parthparikh1999p@gmail.com', 'a761ab3736f87a8cd6ac4760b7687915e9338c80', 'Computer Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=a761ab3736f87a8cd6ac4760b7687915e9338c80'),
(546, 'ketography@gmail.com', 'ea1a675b9d853e8d2c782a7fc50022eb4b44a81f', 'Computer Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=ea1a675b9d853e8d2c782a7fc50022eb4b44a81f'),
(547, 'shrutikasalian4444@gmail.com', '0ecf4c19b9a0dc3aa21acfcacd27f7f37976c62d', 'Computer Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=0ecf4c19b9a0dc3aa21acfcacd27f7f37976c62d'),
(548, 'hetshah3500@gmail.com', '0e05a6c022c06399df770915a8df26836ae6b65a', 'Computer Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=0e05a6c022c06399df770915a8df26836ae6b65a'),
(549, 'shivapurkar62@gmail.com', '6d33d88d1952898e0ed10163f7cb9a765b6beb1a', 'Computer Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=6d33d88d1952898e0ed10163f7cb9a765b6beb1a'),
(550, 'ashishsitaprao@gmail.com', '0137513c36cf748d86dfd5867053dd6de45fd210', 'Computer Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=0137513c36cf748d86dfd5867053dd6de45fd210'),
(551, 'Sarthakbuddy27@gmail.com', 'e3bf060f0e0780582583962c5090af1f3bd0f7c2', 'Computer Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=e3bf060f0e0780582583962c5090af1f3bd0f7c2'),
(552, 'sutaralgatti@gmail.com', 'f17af0d1cb4819fdc6a0be51e319347c3edd9aaa', 'Computer Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=f17af0d1cb4819fdc6a0be51e319347c3edd9aaa'),
(553, 'anvitapt@gmail.com', '5c934007655d4d3ec55aa099ef972bdc9fe05332', 'Computer Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=5c934007655d4d3ec55aa099ef972bdc9fe05332'),
(554, 'anushreevaidya30@gmail.com', '886461a8186efa9fc54ccfd0dfba08e69d4efe8c', 'Computer Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=886461a8186efa9fc54ccfd0dfba08e69d4efe8c'),
(555, 'simranvaidya99@gmail.com', 'e5581896073156430a24ad6b42261bb4714cc43a', 'Computer Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=e5581896073156430a24ad6b42261bb4714cc43a'),
(556, 'vinit.vaidya943@gmail.com', 'd6b9ac9e9399bc0afd3c657374b5271c68301ccd', 'Computer Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=d6b9ac9e9399bc0afd3c657374b5271c68301ccd'),
(557, 'chinmayv66@gmail.com', '7a1766aed6d397210a1acb1b84b248d225d69ac9', 'Computer Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=7a1766aed6d397210a1acb1b84b248d225d69ac9'),
(558, 'nirajvesaokar66@gmail.com', '158f6eae9404f3ee0e1e1172f0f38ef3f2d19b45', 'Computer Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=158f6eae9404f3ee0e1e1172f0f38ef3f2d19b45'),
(559, 'salonivichare0013@gmail.com', '456d5a12059380f117eb35198e503ce144efea76', 'Computer Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=456d5a12059380f117eb35198e503ce144efea76'),
(560, 'bhagyashreemwad@gmail.com', '6da9ae05bf55a34dad0b0573fca967182a2996a4', 'Computer Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=6da9ae05bf55a34dad0b0573fca967182a2996a4'),
(561, 'aparnasg1@gmail.com', 'fe6427da926ca74f8300bc83464e790e36810685', 'Computer Engineering', '6', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=fe6427da926ca74f8300bc83464e790e36810685'),
(562, 'manas.acharekar98@gmail.com', 'c424b30dace26340286bb41e82d13351d19ebd6c', 'Computer Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=c424b30dace26340286bb41e82d13351d19ebd6c'),
(563, 'shivang.agarwal1998@gmail.com', '71e8c6a9e7fb7f0ce3dc2da404fd06cf66ed4cb6', 'Computer Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=71e8c6a9e7fb7f0ce3dc2da404fd06cf66ed4cb6'),
(564, 'a.ridhima27@gmail.com', '12ff4a512c4f3322932a1e656ebae64fbf6bfa58', 'Computer Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=12ff4a512c4f3322932a1e656ebae64fbf6bfa58'),
(565, 'angne.hemali@gmail.com', 'f90906d8a2746de17fe259649ee6e51f7b7cfd0e', 'Computer Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=f90906d8a2746de17fe259649ee6e51f7b7cfd0e'),
(566, 'adityaatkari@gmail.com', '23c19b2281735a9e89a605ca1974d180c9acd2d0', 'Computer Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=23c19b2281735a9e89a605ca1974d180c9acd2d0'),
(567, 'bayas.simran39@gmail.com', '226a74deafe8bbf4b6f8eb9ce7ec4eb72fc8e141', 'Computer Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=226a74deafe8bbf4b6f8eb9ce7ec4eb72fc8e141'),
(568, 'shrtbrkr51@gmail.com', '43057092b4ae5a6c24edf4f6fc2d07710dab715b', 'Computer Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=43057092b4ae5a6c24edf4f6fc2d07710dab715b'),
(569, 'kathandesai124@gmail.com', '59dcc7ced52e5ba9f987325c27aeb39222d1e7d1', 'Computer Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=59dcc7ced52e5ba9f987325c27aeb39222d1e7d1'),
(570, 'salonidesai10@gmail.com', '747af9103a424be6edb90fbbbc59420f612972f4', 'Computer Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=747af9103a424be6edb90fbbbc59420f612972f4'),
(571, 'nsdhargalkar@gmail.com', 'e6e0c99ad0906a2850097c7d73554c8ff8106c37', 'Computer Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=e6e0c99ad0906a2850097c7d73554c8ff8106c37'),
(572, 'shwetadudhal98@gmail.com', '654b7dbe3d95881a0b34eb3ac5b3abba384d6ec5', 'Computer Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=654b7dbe3d95881a0b34eb3ac5b3abba384d6ec5'),
(573, 'gdevashri@gmail.com', '36b1d197788c8562cb0fca247fedad03e98bf617', 'Computer Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=36b1d197788c8562cb0fca247fedad03e98bf617'),
(574, 'gawdevarnesh@gmail.com', '2ecc730137f7b47ca6d47431ee0d1adb5b0a51d7', 'Computer Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=2ecc730137f7b47ca6d47431ee0d1adb5b0a51d7'),
(575, 'sidd.ghosh9@gmail.com', 'aae2e8ab9944be142ee8b242e26acfb6d0b450dd', 'Computer Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=aae2e8ab9944be142ee8b242e26acfb6d0b450dd'),
(576, 'sahilgophane@gmail.com', '6c4fae8351cb618b830500f7af0f5c009121ea6d', 'Computer Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=6c4fae8351cb618b830500f7af0f5c009121ea6d'),
(577, 'imran158khan@gmail.com', '3dbc60aae975b7f4fe52e7847cb5ec45026df159', 'Computer Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=3dbc60aae975b7f4fe52e7847cb5ec45026df159'),
(578, 'aakashkolekar98@gmail.com', '773c7d13a39ec60ccfdb718fda516c4036b30f33', 'Computer Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=773c7d13a39ec60ccfdb718fda516c4036b30f33'),
(579, 'rahulkotian98@gmail.com', '4abb80d96d47e4e280df4b1e569ad6d2e17ff6d9', 'Computer Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=4abb80d96d47e4e280df4b1e569ad6d2e17ff6d9'),
(580, 'manishmeshram51@gmail.com', '5dbd5d73b93d82a13f35ed8996940eed88dcfd8c', 'Computer Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=5dbd5d73b93d82a13f35ed8996940eed88dcfd8c'),
(581, 'akshay.h.naik@gmail.com', '7816e637965f93bb5e3edfc7b6e09ce3e4730da5', 'Computer Engineering', '8', 'A', 'mctrgitfeedback.000webhostapp.com/index.php?id=7816e637965f93bb5e3edfc7b6e09ce3e4730da5'),
(582, 'akanksha28mutha@gmail.com', '76f1364d9bdb57412739b63bb1e46b85ce979315', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=76f1364d9bdb57412739b63bb1e46b85ce979315'),
(583, 'dishadharmesh@gmail.com', '182e213f974aead40d746c3633a55f03ce827e5e', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=182e213f974aead40d746c3633a55f03ce827e5e'),
(584, 'talifpathan13@gmail.com', 'e7477fc716000965ab1580011011f4b97c1ad0ee', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=e7477fc716000965ab1580011011f4b97c1ad0ee'),
(585, 'mihirraul18@gmail.com', 'a0ed4a6b8f8fb93c75e820a25e63a888505a0cf3', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=a0ed4a6b8f8fb93c75e820a25e63a888505a0cf3'),
(586, 'shivanisrawat121@gmail.com', '04890d65d7ceffef35342570d4231f62c1156f99', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=04890d65d7ceffef35342570d4231f62c1156f99'),
(587, 'viditsave@gmail.com', 'b0c23b9eccecace8816976a1207d10a205ac5b6b', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=b0c23b9eccecace8816976a1207d10a205ac5b6b'),
(588, 'Madni11297@gmail.com', '17441f4b00fe1b7d57fdccd9ee9be1ca3267008f', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=17441f4b00fe1b7d57fdccd9ee9be1ca3267008f'),
(589, 'jagruti.varule@gmail.com', '9a96ae3f3932e49c912571aeba74145182705d7a', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=9a96ae3f3932e49c912571aeba74145182705d7a'),
(590, 'surajkakad01@gmail.com', 'c970e8015324fc8fee16cbdb68129018f6554678', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=c970e8015324fc8fee16cbdb68129018f6554678'),
(591, 'yash.sawant777@gmail.com', '269db82a75ebd51f453681d6fcb4efe0aea5a399', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=269db82a75ebd51f453681d6fcb4efe0aea5a399'),
(592, 'piyush.singh.pasi@gmail.com', '9b9b118eebf0ce802df66b4a6952a8fc83f24a14', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=9b9b118eebf0ce802df66b4a6952a8fc83f24a14'),
(593, 'bhushanbpatil8@gmail.com', '66f3488b96306eec4ff8d35853e7c0196a5f5edc', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=66f3488b96306eec4ff8d35853e7c0196a5f5edc'),
(594, 'gayatrisraje@gmail.com', 'f1bb60613a1a0782fcfd94cc55311c77f754e5e9', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=f1bb60613a1a0782fcfd94cc55311c77f754e5e9'),
(595, 'arnav.sankhe19@gmail.com', 'dbca19d3af5495b61711f86c69d6c2e3c5e148cd', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=dbca19d3af5495b61711f86c69d6c2e3c5e148cd'),
(596, 'amannsarawgi@gmail.com', '6ef23b1f98dcfaeefc284fa4f3b1dc8bd0b54a18', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=6ef23b1f98dcfaeefc284fa4f3b1dc8bd0b54a18'),
(597, 'satputepratik99@gmail.com', '4e09b14e3b39855309f72b021b70bda0a8688d11', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=4e09b14e3b39855309f72b021b70bda0a8688d11'),
(598, 'aayushipsingh@gmail.com', '924c1c4fd6ef500adf4a7465aab60ee89c9d7c5c', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=924c1c4fd6ef500adf4a7465aab60ee89c9d7c5c'),
(599, 'tanvivinayaraj52@gmail.com', 'e90e334ee6fdc6c8fa0b46d744dff3a5c2b46bd0', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=e90e334ee6fdc6c8fa0b46d744dff3a5c2b46bd0'),
(600, 'darshanp21198@gmail.com', 'b0433ea8a6c9d379790ecb6ae731db52d8668a79', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=b0433ea8a6c9d379790ecb6ae731db52d8668a79'),
(601, 'sanmitvartak.sv@gmail.com', 'd51620e74f5a7dcca88f16000f2edcff2d3385a0', 'Computer Engineering', '8', 'B', 'mctrgitfeedback.000webhostapp.com/index.php?id=d51620e74f5a7dcca88f16000f2edcff2d3385a0'),
(605, 'talekarnitish1911@gmail.com', 'c6a81a846f183e038215a47e1e6994edf2368938', 'Applied Sciences', '2', 'G', 'mctrgitfeedback.000webhostapp.com/index.php?id=c6a81a846f183e038215a47e1e6994edf2368938'),
(606, 'icarus.rgit2020@gmail.com', 'b0d705bed21b92f21cfd60f4a2d02ecb5b7b37ed', 'Applied Sciences', '2', 'G', 'mctrgitfeedback.000webhostapp.com/index.php?id=b0d705bed21b92f21cfd60f4a2d02ecb5b7b37ed'),
(607, 'coffeecoders10@gmail.com', '4f6d6af30fb9ea02f33cbdb4ee52ffadaadc5f2b', 'Applied Sciences', '2', 'G', 'mctrgitfeedback.000webhostapp.com/index.php?id=4f6d6af30fb9ea02f33cbdb4ee52ffadaadc5f2b'),
(608, 'chat.bot.nt@gmail.com', '3032cf2c9fd561652375f1c993b6cf18d7a080b7', 'Applied Sciences', '2', 'G', 'mctrgitfeedback.000webhostapp.com/index.php?id=3032cf2c9fd561652375f1c993b6cf18d7a080b7'),
(609, 'wanodesarvesh@gmail.com', '7b9f32b07cb537ad599a549621504b8cf7442774', 'Applied Sciences', '2', 'G', 'mctrgitfeedback.000webhostapp.com/index.php?id=7b9f32b07cb537ad599a549621504b8cf7442774'),
(610, 'nitishtalekar.nt503@gmail.com', '746293261661a7c7ec0205f6f077d803c254b688', 'Applied Sciences', '2', 'G', 'mctrgitfeedback.000webhostapp.com/index.php?id=746293261661a7c7ec0205f6f077d803c254b688'),
(611, 'python.saanp@gmail.com', '1c6e53b66a6fc02e974ec768f6f9fd595de95a69', 'Applied Sciences', '2', 'G', 'mctrgitfeedback.000webhostapp.com/index.php?id=1c6e53b66a6fc02e974ec768f6f9fd595de95a69'),
(612, 'wsarvesh@rediffmail.com', '66310d0a102fe851559cc836bdca3791ab7426ff', 'Applied Sciences', '2', 'G', 'mctrgitfeedback.000webhostapp.com/index.php?id=66310d0a102fe851559cc836bdca3791ab7426ff'),
(613, 'rgitfeedbackteam@gmail.com', '3bcaf2ec562f7f5a8879cd971511dc7a35d794d2', 'Applied Sciences', '2', 'G', 'mctrgitfeedback.000webhostapp.com/index.php?id=3bcaf2ec562f7f5a8879cd971511dc7a35d794d2'),
(614, 'rgitfeedback@gmail.com', '7d00ffc8d0ed8c56a0e6519c921ae25772efb902', 'Applied Sciences', '2', 'G', 'mctrgitfeedback.000webhostapp.com/index.php?id=7d00ffc8d0ed8c56a0e6519c921ae25772efb902');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `current_sem` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`current_sem`) VALUES
(0);

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
(126, 'Project Management', '8', 'Computer Engineering'),
(127, 'DBM', '8', 'Computer Engineering'),
(128, 'Resource Management', '8', 'Computer Engineering'),
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
(141, 'Design of Mechanical Systems', '8', 'Mechanical Engineering'),
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
(202, 'Finance Management', '8', 'Information Technology'),
(203, 'Renewable Energy Source', '8', 'Mechanical Engineering'),
(204, 'Microcontroller and Applications', '6', 'Electronics and Telecommunication');

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
(1, 'Prof. B. B. Sawant', 'Applied Sciences'),
(2, 'Dr. Neeta Kapse', 'Applied Sciences'),
(3, 'Prof. Shalini Sharma', 'Applied Sciences'),
(4, 'Prof. Shashikant Patil', 'Applied Sciences'),
(5, 'Dr. Y. S. Patil', 'Applied Sciences'),
(6, 'Prof. Priyanka Deshmukh', 'Applied Sciences'),
(7, 'Dr. S. K. Chaudhari', 'Applied Sciences'),
(8, 'Dr. K. G. Chaudhari', 'Applied Sciences'),
(9, 'Prof. Chhaya Hinge', 'Applied Sciences'),
(10, 'Prof. Prasad Soman', 'Applied Sciences'),
(11, 'Prof. Rohini Ghule', 'Applied Sciences'),
(12, 'Prof. R. N. Shanmukha', 'Applied Sciences'),
(13, 'Prof. A. G. Ingole', 'Applied Sciences'),
(14, 'Dr. Mala Chatterjee', 'Applied Sciences'),
(15, 'Dr. Pallavi Mahalle', 'Applied Sciences'),
(16, 'Prof. Rahul Chaurasiya', 'Applied Sciences'),
(17, 'Prof. Dnyaneshwar Kapse', 'Computer Engineering'),
(18, 'Prof. Kaajal Sharma', 'Computer Engineering'),
(19, 'Prof. B. M. Patil', 'Computer Engineering'),
(20, 'Prof. J. Deshmukh', 'Computer Engineering'),
(21, 'Prof. Sharmila S. Gaikwad', 'Computer Engineering'),
(22, 'Prof. D. S. Kale', 'Computer Engineering'),
(23, 'Prof. Naina Kaushik', 'Computer Engineering'),
(24, 'Prof. A. Lahane', 'Computer Engineering'),
(25, 'Prof. Priya Parate', 'Computer Engineering'),
(26, 'Prof. Suresh Mestry', 'Computer Engineering'),
(27, 'Prof. Priyanka Bhilare', 'Computer Engineering'),
(28, 'Prof. Bhavesh Panchal', 'Computer Engineering'),
(29, 'Prof. Dipak Gaikar', 'Computer Engineering'),
(30, 'Prof. Dilip Dalgade', 'Computer Engineering'),
(31, 'Dr. S. Y. Ket', 'Computer Engineering'),
(32, 'Prof. S. P. Khachane', 'Computer Engineering'),
(33, 'Prof. Dyaneshwar Dhanagar', 'Computer Engineering'),
(34, 'Prof. Preeti Satao', 'Computer Engineering'),
(35, 'Prof. Sumitra Sadhukhan', 'Computer Engineering'),
(36, 'Prof. Savita Lade', 'Computer Engineering'),
(37, 'Prof. S. S. Repal', 'Electronics and Telecommunication'),
(38, 'Prof. S. Y. Gothankar', 'Electronics and Telecommunication'),
(39, 'Prof. S. D. Patil', 'Electronics and Telecommunication'),
(40, 'Prof. P. S. Patil', 'Electronics and Telecommunication'),
(41, 'Dr. S. D. Deshmukh', 'Electronics and Telecommunication'),
(42, 'Prof. N. J. Balur', 'Electronics and Telecommunication'),
(43, 'Prof. S. V. Kulkarni', 'Electronics and Telecommunication'),
(44, 'Prof. M. U. Mokashi', 'Electronics and Telecommunication'),
(45, 'Prof. P. N. Dave', 'Electronics and Telecommunication'),
(46, 'Prof. J. R. Mahajan', 'Electronics and Telecommunication'),
(47, 'Prof. M. K. Ahirrao', 'Electronics and Telecommunication'),
(48, 'Prof. P. N. Sonar', 'Electronics and Telecommunication'),
(49, 'Prof. S. T. Sutar', 'Electronics and Telecommunication'),
(50, 'Prof. P. A. Rokde', 'Electronics and Telecommunication'),
(51, 'Prof. K. G. Sawarkar', 'Electronics and Telecommunication'),
(52, 'Prof. S. R. Bhoyar', 'Electronics and Telecommunication'),
(53, 'Prof. A. R. Sagale', 'Electronics and Telecommunication'),
(54, 'Prof. Ganesh Tilve', 'Electronics and Telecommunication'),
(55, 'Prof. P. G. Pawar', 'Electronics and Telecommunication'),
(56, 'Prof. S. K. Gabhane', 'Electronics and Telecommunication'),
(57, 'Prof. Ankur Ganorkar', 'Electronics and Telecommunication'),
(58, 'Prof. A. E. Patil', 'Information Technology'),
(59, 'Prof. Anushree Deshmukh', 'Information Technology'),
(60, 'Prof. S. K. Sabnis', 'Information Technology'),
(61, 'Prof. Minal Awazekar', 'Information Technology'),
(62, 'Prof. Nilesh Rathod', 'Information Technology'),
(63, 'Prof. Ankush Hutke', 'Information Technology'),
(64, 'Prof. Swapnil Gharat', 'Information Technology'),
(65, 'Prof. Yogita Ganage', 'Information Technology'),
(66, 'Prof. Ankita Malhotra', 'Information Technology'),
(67, 'Dr. S. B. Wankhade', 'Information Technology'),
(68, 'Prof. Ganesh Tilave', 'Information Technology'),
(69, 'Prof. Govind Wakure', 'Information Technology'),
(70, 'Prof. N. S. Chame', 'Instumentation Engineering'),
(71, 'Dr. Rinku Sharma', 'Instumentation Engineering'),
(72, 'Prof. R. G. Sharma', 'Instumentation Engineering'),
(73, 'Prof. S. P. Sadala', 'Instumentation Engineering'),
(74, 'Prof. D. Joshi Jain', 'Instumentation Engineering'),
(75, 'Prof. P. B. Gawande', 'Instumentation Engineering'),
(76, 'Prof. Vinita Vartak', 'Instumentation Engineering'),
(77, 'Prof. V. V. Kamankar', 'Instumentation Engineering'),
(78, 'Prof. Anuja Kadam', 'Instumentation Engineering'),
(79, 'Prof. A. B. Bedke', 'Instumentation Engineering'),
(80, 'Prof. V. Kamalakar', 'Instumentation Engineering'),
(81, 'Prof. G. K. Shende', 'Instumentation Engineering'),
(82, 'Prof. Tidve', 'Instumentation Engineering'),
(83, 'Prof. V. B. Sawant', 'Mechanical Engineering'),
(84, 'Prof. C. R. Rane', 'Mechanical Engineering'),
(85, 'Prof. Nikhil. S', 'Mechanical Engineering'),
(86, 'Prof. N. K. Deshmukh', 'Mechanical Engineering'),
(87, 'Dr. K. M. Chaudhari', 'Mechanical Engineering'),
(88, 'Prof. S. D. Gaikwad', 'Mechanical Engineering'),
(89, 'Dr. R. V. Kale', 'Mechanical Engineering'),
(90, 'Prof. R. R. Gujar', 'Mechanical Engineering'),
(91, 'Prof. P. R. Potdar', 'Mechanical Engineering'),
(92, 'Prof. A. V. Gotmare', 'Mechanical Engineering'),
(93, 'Prof. R. M. Siddiqui', 'Mechanical Engineering'),
(94, 'Dr. A. G. Londhekar', 'Mechanical Engineering'),
(95, 'Prof. N. B. Shahapure', 'Mechanical Engineering'),
(96, 'Prof. P. R. Paul', 'Mechanical Engineering'),
(97, 'Prof. N. J. Panaskar', 'Mechanical Engineering'),
(98, 'Dr. S. U. Bokade', 'Mechanical Engineering'),
(99, 'Prof. D. S. Pandey', 'Mechanical Engineering'),
(100, 'Prof. M. R. Valse', 'Mechanical Engineering'),
(101, 'Prof. R. Y. Kurane', 'Mechanical Engineering'),
(102, 'Prof. N. N. Bhostekar', 'Mechanical Engineering'),
(103, 'Prof. A. L. Mangrulkar', 'Mechanical Engineering'),
(104, 'Prof. D. K. Chakradev', 'Mechanical Engineering'),
(105, 'Prof. Sridari', 'Computer Engineering'),
(106, 'Prof. Ganesh Tiwale', 'Applied Sciences'),
(107, 'Prof. Heena Momin', 'Information Technology');

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
(1, 'Applied Sciences', '2', 'A', '1', '105', '00'),
(2, 'Applied Sciences', '2', 'A', '5', '106', '00'),
(3, 'Applied Sciences', '2', 'A', '14', '107', '00'),
(4, 'Applied Sciences', '2', 'A', '12', '108', '00'),
(5, 'Applied Sciences', '2', 'A', '29', '109', '00'),
(6, 'Applied Sciences', '2', 'A', '104', '110', '00'),
(7, 'Applied Sciences', '2', 'B', '11', '105', '00'),
(8, 'Applied Sciences', '2', 'B', '8', '106', '00'),
(9, 'Applied Sciences', '2', 'B', '2', '107', '00'),
(10, 'Applied Sciences', '2', 'B', '12', '108', '00'),
(11, 'Applied Sciences', '2', 'B', '18', '109', '00'),
(12, 'Applied Sciences', '2', 'B', '13', '110', '00'),
(13, 'Applied Sciences', '2', 'C', '16', '105', '00'),
(14, 'Applied Sciences', '2', 'C', '5', '106', '00'),
(15, 'Applied Sciences', '2', 'C', '2', '107', '00'),
(16, 'Applied Sciences', '2', 'C', '88', '108', '00'),
(17, 'Applied Sciences', '2', 'C', '23', '109', '00'),
(18, 'Applied Sciences', '2', 'C', '4', '110', '00'),
(19, 'Applied Sciences', '2', 'D', '1', '105', '00'),
(20, 'Applied Sciences', '2', 'D', '5', '106', '00'),
(21, 'Applied Sciences', '2', 'D', '14', '107', '00'),
(22, 'Applied Sciences', '2', 'D', '85', '108', '00'),
(23, 'Applied Sciences', '2', 'D', '29', '109', '00'),
(24, 'Applied Sciences', '2', 'D', '104', '110', '00'),
(25, 'Applied Sciences', '2', 'E', '3', '105', '00'),
(26, 'Applied Sciences', '2', 'E', '8', '106', '00'),
(27, 'Applied Sciences', '2', 'E', '14', '107', '00'),
(28, 'Applied Sciences', '2', 'E', '84', '108', '00'),
(29, 'Applied Sciences', '2', 'E', '23', '109', '00'),
(30, 'Applied Sciences', '2', 'E', '13', '110', '00'),
(31, 'Applied Sciences', '2', 'F', '1', '105', '00'),
(32, 'Applied Sciences', '2', 'F', '8', '106', '00'),
(33, 'Applied Sciences', '2', 'F', '2', '107', '00'),
(34, 'Applied Sciences', '2', 'F', '12', '108', '00'),
(35, 'Applied Sciences', '2', 'F', '18', '109', '00'),
(36, 'Applied Sciences', '2', 'F', '4', '110', '00'),
(37, 'Mechanical Engineering', '4', 'A', '95', '129', '00'),
(38, 'Mechanical Engineering', '4', 'A', '96', '130', '00'),
(39, 'Mechanical Engineering', '4', 'A', '73', '131', '00'),
(40, 'Mechanical Engineering', '4', 'A', '45', '132', '00'),
(41, 'Mechanical Engineering', '4', 'A', '101', '133', '00'),
(42, 'Mechanical Engineering', '4', 'A', '3', '134', '00'),
(43, 'Mechanical Engineering', '4', 'B', '84', '129', '00'),
(44, 'Mechanical Engineering', '4', 'B', '90', '130', '00'),
(45, 'Mechanical Engineering', '4', 'B', '40', '131', '00'),
(46, 'Mechanical Engineering', '4', 'B', '45', '132', '00'),
(47, 'Mechanical Engineering', '4', 'B', '102', '133', '00'),
(48, 'Mechanical Engineering', '4', 'B', '3', '134', '00'),
(49, 'Mechanical Engineering', '6', 'A', '87', '135', '00'),
(50, 'Mechanical Engineering', '6', 'A', '91', '136', '00'),
(51, 'Mechanical Engineering', '6', 'A', '99', '137', '00'),
(52, 'Mechanical Engineering', '6', 'A', '100', '138', '00'),
(53, 'Mechanical Engineering', '6', 'A', '6', '139', '10->1'),
(54, 'Mechanical Engineering', '6', 'B', '86', '135', '00'),
(55, 'Mechanical Engineering', '6', 'B', '93', '136', '00'),
(56, 'Mechanical Engineering', '6', 'B', '101', '137', '00'),
(57, 'Mechanical Engineering', '6', 'B', '103', '138', '00'),
(58, 'Mechanical Engineering', '6', 'B', '85', '139', '10->1'),
(59, 'Mechanical Engineering', '6', 'B', '83', '140', '10->1'),
(60, 'Mechanical Engineering', '8', 'A', '88', '141', '00'),
(61, 'Mechanical Engineering', '8', 'A', '89', '142', '01'),
(62, 'Mechanical Engineering', '8', 'A', '103', '142', '01'),
(63, 'Mechanical Engineering', '8', 'A', '95', '143', '00'),
(64, 'Mechanical Engineering', '8', 'A', '102', '144', '10->1'),
(65, 'Mechanical Engineering', '8', 'A', '94', '145', '10->2'),
(66, 'Mechanical Engineering', '8', 'A', '15', '146', '10->2'),
(67, 'Mechanical Engineering', '8', 'A', '37', '147', '10->2'),
(68, 'Mechanical Engineering', '8', 'A', '15', '203', '10->1'),
(69, 'Mechanical Engineering', '8', 'B', '92', '141', '00'),
(70, 'Mechanical Engineering', '8', 'B', '94', '142', '00'),
(71, 'Mechanical Engineering', '8', 'B', '97', '143', '00'),
(72, 'Mechanical Engineering', '8', 'B', '83', '145', '10->2'),
(73, 'Mechanical Engineering', '8', 'B', '15', '146', '10->2'),
(74, 'Mechanical Engineering', '8', 'B', '37', '147', '10->2'),
(75, 'Mechanical Engineering', '8', 'B', '15', '203', '10->1'),
(76, 'Electronics and Telecommunication', '4', 'A', '57', '148', '00'),
(77, 'Electronics and Telecommunication', '4', 'A', '10', '149', '00'),
(78, 'Electronics and Telecommunication', '4', 'A', '46', '150', '00'),
(79, 'Electronics and Telecommunication', '4', 'A', '55', '151', '00'),
(80, 'Electronics and Telecommunication', '4', 'A', '16', '152', '00'),
(81, 'Electronics and Telecommunication', '4', 'B', '41', '148', '00'),
(82, 'Electronics and Telecommunication', '4', 'B', '57', '149', '00'),
(83, 'Electronics and Telecommunication', '4', 'B', '55', '150', '00'),
(84, 'Electronics and Telecommunication', '4', 'B', '51', '151', '00'),
(85, 'Electronics and Telecommunication', '4', 'B', '16', '152', '00'),
(86, 'Electronics and Telecommunication', '6', 'A', '48', '153', '00'),
(87, 'Electronics and Telecommunication', '6', 'A', '49', '154', '00'),
(88, 'Electronics and Telecommunication', '6', 'A', '47', '155', '00'),
(89, 'Electronics and Telecommunication', '6', 'A', '44', '156', '10->1'),
(90, 'Electronics and Telecommunication', '6', 'A', '50', '204', '00'),
(91, 'Electronics and Telecommunication', '6', 'B', '53', '153', '00'),
(92, 'Electronics and Telecommunication', '6', 'B', '52', '154', '00'),
(93, 'Electronics and Telecommunication', '6', 'B', '39', '155', '01'),
(94, 'Electronics and Telecommunication', '6', 'B', '47', '155', '01'),
(95, 'Electronics and Telecommunication', '6', 'B', '44', '156', '10->1'),
(96, 'Electronics and Telecommunication', '6', 'B', '37', '157', '10->1'),
(97, 'Electronics and Telecommunication', '6', 'B', '56', '204', '00'),
(98, 'Electronics and Telecommunication', '8', 'A', '42', '158', '10->1'),
(99, 'Electronics and Telecommunication', '8', 'A', '43', '160', '00'),
(100, 'Electronics and Telecommunication', '8', 'A', '37', '161', '10->2'),
(101, 'Electronics and Telecommunication', '8', 'A', '53', '162', '10->2'),
(102, 'Electronics and Telecommunication', '8', 'A', '15', '163', '10->2'),
(103, 'Electronics and Telecommunication', '8', 'A', '66', '164', '00'),
(104, 'Electronics and Telecommunication', '8', 'B', '42', '158', '10->1'),
(105, 'Electronics and Telecommunication', '8', 'B', '38', '159', '10->1'),
(106, 'Electronics and Telecommunication', '8', 'B', '39', '160', '00'),
(107, 'Electronics and Telecommunication', '8', 'B', '37', '161', '10->2'),
(108, 'Electronics and Telecommunication', '8', 'B', '53', '162', '10->2'),
(109, 'Electronics and Telecommunication', '8', 'B', '15', '163', '10->2'),
(110, 'Electronics and Telecommunication', '8', 'B', '51', '164', '01'),
(111, 'Electronics and Telecommunication', '8', 'B', '52', '164', '01'),
(112, 'Instumentation Engineering', '4', 'A', '77', '165', '00'),
(113, 'Instumentation Engineering', '4', 'A', '70', '166', '00'),
(114, 'Instumentation Engineering', '4', 'A', '78', '167', '00'),
(115, 'Instumentation Engineering', '4', 'A', '9', '168', '00'),
(116, 'Instumentation Engineering', '4', 'A', '76', '169', '00'),
(117, 'Instumentation Engineering', '4', 'A', '106', '170', '00'),
(118, 'Instumentation Engineering', '6', 'A', '74', '171', '00'),
(119, 'Instumentation Engineering', '6', 'A', '81', '172', '01'),
(120, 'Instumentation Engineering', '6', 'A', '9', '172', '01'),
(121, 'Instumentation Engineering', '6', 'A', '72', '173', '00'),
(122, 'Instumentation Engineering', '6', 'A', '79', '174', '00'),
(123, 'Instumentation Engineering', '6', 'A', '75', '175', '00'),
(124, 'Instumentation Engineering', '6', 'A', '78', '176', '10->1'),
(125, 'Instumentation Engineering', '6', 'A', '72', '177', '10->1'),
(126, 'Instumentation Engineering', '8', 'A', '76', '178', '00'),
(127, 'Instumentation Engineering', '8', 'A', '81', '179', '00'),
(128, 'Instumentation Engineering', '8', 'A', '75', '180', '10->1'),
(129, 'Instumentation Engineering', '8', 'A', '74', '181', '10->1'),
(130, 'Instumentation Engineering', '8', 'A', '77', '182', '10->2'),
(131, 'Instumentation Engineering', '8', 'A', '15', '183', '10->2'),
(132, 'Instumentation Engineering', '8', 'A', '21', '184', '10->2'),
(133, 'Instumentation Engineering', '8', 'A', '25', '185', '10->2'),
(134, 'Information Technology', '4', 'A', '58', '186', '00'),
(135, 'Information Technology', '4', 'A', '69', '187', '00'),
(136, 'Information Technology', '4', 'A', '106', '188', '00'),
(137, 'Information Technology', '4', 'A', '59', '189', '00'),
(138, 'Information Technology', '4', 'A', '64', '190', '00'),
(139, 'Information Technology', '4', 'A', '65', '191', '00'),
(140, 'Information Technology', '6', 'A', '67', '192', '00'),
(141, 'Information Technology', '6', 'A', '62', '193', '00'),
(142, 'Information Technology', '6', 'A', '69', '194', '10->1'),
(143, 'Information Technology', '6', 'A', '67', '195', '11->1'),
(144, 'Information Technology', '6', 'A', '59', '195', '11->1'),
(145, 'Information Technology', '6', 'A', '65', '196', '00'),
(146, 'Information Technology', '6', 'A', '107', '197', '00'),
(147, 'Information Technology', '8', 'A', '58', '198', '01'),
(148, 'Information Technology', '8', 'A', '62', '198', '01'),
(149, 'Information Technology', '8', 'A', '63', '199', '00'),
(150, 'Information Technology', '8', 'A', '64', '200', '00'),
(151, 'Information Technology', '8', 'A', '15', '201', '10->1'),
(152, 'Information Technology', '8', 'A', '60', '202', '10->1'),
(153, 'Computer Engineering', '4', 'A', '11', '111', '00'),
(154, 'Computer Engineering', '4', 'A', '35', '112', '00'),
(155, 'Computer Engineering', '4', 'A', '17', '113', '00'),
(156, 'Computer Engineering', '4', 'A', '32', '114', '00'),
(157, 'Computer Engineering', '4', 'A', '105', '115', '00'),
(158, 'Computer Engineering', '4', 'A', '30', '116', '00'),
(159, 'Computer Engineering', '4', 'B', '11', '111', '00'),
(160, 'Computer Engineering', '4', 'B', '35', '112', '00'),
(161, 'Computer Engineering', '4', 'B', '17', '113', '00'),
(162, 'Computer Engineering', '4', 'B', '32', '114', '00'),
(163, 'Computer Engineering', '4', 'B', '105', '115', '00'),
(164, 'Computer Engineering', '4', 'B', '30', '116', '00'),
(165, 'Computer Engineering', '6', 'A', '34', '117', '00'),
(166, 'Computer Engineering', '6', 'A', '19', '118', '00'),
(167, 'Computer Engineering', '6', 'A', '27', '119', '00'),
(168, 'Computer Engineering', '6', 'A', '31', '120', '00'),
(169, 'Computer Engineering', '6', 'A', '22', '121', '00'),
(170, 'Computer Engineering', '6', 'B', '34', '117', '00'),
(171, 'Computer Engineering', '6', 'B', '21', '118', '00'),
(172, 'Computer Engineering', '6', 'B', '25', '119', '00'),
(173, 'Computer Engineering', '6', 'B', '31', '120', '00'),
(174, 'Computer Engineering', '6', 'B', '22', '121', '00'),
(175, 'Computer Engineering', '8', 'A', '26', '122', '00'),
(176, 'Computer Engineering', '8', 'A', '33', '123', '00'),
(177, 'Computer Engineering', '8', 'A', '24', '124', '00'),
(178, 'Computer Engineering', '8', 'A', '19', '125', '00'),
(179, 'Computer Engineering', '8', 'A', '21', '126', '10->1'),
(180, 'Computer Engineering', '8', 'A', '25', '127', '10->1'),
(181, 'Computer Engineering', '8', 'A', '15', '128', '10->1'),
(182, 'Computer Engineering', '8', 'B', '26', '122', '00'),
(183, 'Computer Engineering', '8', 'B', '36', '123', '00'),
(184, 'Computer Engineering', '8', 'B', '28', '124', '00'),
(185, 'Computer Engineering', '8', 'B', '67', '125', '00'),
(186, 'Computer Engineering', '8', 'B', '21', '126', '10->1'),
(187, 'Computer Engineering', '8', 'B', '25', '127', '10->1'),
(188, 'Computer Engineering', '8', 'B', '15', '128', '10->1');

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
  MODIFY `fbt_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `mail_addr`
--
ALTER TABLE `mail_addr`
  MODIFY `mail_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=615;

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
