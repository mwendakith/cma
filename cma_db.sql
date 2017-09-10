-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2016 at 06:16 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cma_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `archdiocese`
--

CREATE TABLE IF NOT EXISTS `archdiocese` (
  `archdiocese_id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `nation_id` int(2) NOT NULL,
  `election_status` tinyint(1) NOT NULL DEFAULT '0',
  `deadline` varchar(15) DEFAULT NULL,
  `announcements` text NOT NULL,
  PRIMARY KEY (`archdiocese_id`),
  KEY `Name_2` (`name`),
  KEY `Nation_ID` (`nation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `archdiocese`
--

INSERT INTO `archdiocese` (`archdiocese_id`, `name`, `nation_id`, `election_status`, `deadline`, `announcements`) VALUES
(10, 'Nairobi', 1, 0, NULL, ''),
(11, 'Kisumu', 1, 0, NULL, ''),
(12, 'Mombasa', 1, 0, NULL, ''),
(13, 'Lamu', 1, 0, NULL, ''),
(14, 'Kisauni', 1, 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE IF NOT EXISTS `contributions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cma_no` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`id`, `cma_no`, `amount`, `date`) VALUES
(1, 432, '500', '2014-04-03'),
(2, 432, '200', '2014-04-03'),
(3, 76834, '500', '2014-04-03'),
(4, 646, '400', '2014-04-03'),
(5, 646, '25', '2014-04-03'),
(6, 485, '200', '2014-04-04'),
(7, 485, '450', '2014-04-04'),
(8, 594, '500', '2014-04-04'),
(9, 6756, '500', '2014-04-04'),
(10, 6756, '300', '2014-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `deanery`
--

CREATE TABLE IF NOT EXISTS `deanery` (
  `deanery_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `diocese_id` int(4) NOT NULL,
  `election_status` tinyint(4) NOT NULL DEFAULT '0',
  `deadline` varchar(15) DEFAULT NULL,
  `announcements` text NOT NULL,
  PRIMARY KEY (`deanery_id`),
  KEY `Diocese_ID` (`diocese_id`),
  KEY `Diocese_ID_2` (`diocese_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1007 ;

--
-- Dumping data for table `deanery`
--

INSERT INTO `deanery` (`deanery_id`, `name`, `diocese_id`, `election_status`, `deadline`, `announcements`) VALUES
(1000, 'Example', 102, 0, NULL, 'One Final Time.'),
(1001, 'Boyish', 103, 0, NULL, ''),
(1003, 'Mfano', 100, 0, NULL, ''),
(1004, 'Alego', 104, 0, NULL, ''),
(1005, 'Dunga Beac', 104, 0, NULL, ''),
(1006, 'Isiolo Nor', 105, 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `diocese`
--

CREATE TABLE IF NOT EXISTS `diocese` (
  `diocese_id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `archdiocese_id` int(3) NOT NULL,
  `election_status` tinyint(4) NOT NULL DEFAULT '0',
  `deadline` varchar(15) DEFAULT NULL,
  `announcements` text NOT NULL,
  PRIMARY KEY (`diocese_id`),
  KEY `Archdiocese_ID` (`archdiocese_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `diocese`
--

INSERT INTO `diocese` (`diocese_id`, `name`, `archdiocese_id`, `election_status`, `deadline`, `announcements`) VALUES
(100, 'Nairobi', 10, 0, NULL, ''),
(101, 'Eastlands', 10, 0, NULL, ''),
(102, 'Example', 10, 0, NULL, ''),
(103, 'Boyish', 10, 0, NULL, ''),
(104, 'Homa Bay', 11, 0, NULL, ''),
(105, 'Isiolo', 12, 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE IF NOT EXISTS `divisions` (
  `division_id` int(2) NOT NULL,
  `division_name` varchar(15) NOT NULL,
  PRIMARY KEY (`division_id`),
  KEY `Division_ID` (`division_id`),
  KEY `Division_ID_2` (`division_id`),
  KEY `Division_ID_3` (`division_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`division_id`, `division_name`) VALUES
(1, 'Nation'),
(2, 'Archdiocese'),
(3, 'Diocese'),
(4, 'Deanery'),
(5, 'Parish'),
(6, 'Outstation');

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE IF NOT EXISTS `election` (
  `list_id` varchar(10) NOT NULL,
  `post_id` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `national_id` varchar(10) NOT NULL,
  `tally` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`list_id`,`post_id`,`year`,`national_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`list_id`, `post_id`, `year`, `national_id`, `tally`) VALUES
('', 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `National_ID` varchar(10) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL,
  PRIMARY KEY (`National_ID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `cma_no` varchar(11) NOT NULL,
  `national_id` int(10) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `other_names` varchar(20) DEFAULT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `house_no` varchar(6) DEFAULT NULL,
  `scc` varchar(20) DEFAULT NULL,
  `nok_id` varchar(10) NOT NULL,
  `joining_date` date NOT NULL,
  `outstation_id` int(8) NOT NULL,
  `post_id` int(2) NOT NULL DEFAULT '10',
  `division_id` int(2) NOT NULL DEFAULT '6',
  `vote_status` tinyint(4) NOT NULL DEFAULT '0',
  `image` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`national_id`),
  UNIQUE KEY `Mobile_No` (`mobile_no`),
  KEY `Outstation_ID` (`outstation_id`),
  KEY `Post_ID` (`post_id`),
  KEY `Division_ID` (`division_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`cma_no`, `national_id`, `surname`, `first_name`, `other_names`, `mobile_no`, `house_no`, `scc`, `nok_id`, `joining_date`, `outstation_id`, `post_id`, `division_id`, `vote_status`, `image`) VALUES
('234521', 3452345, 'Sa', 'Wa', '', '07393231', '', '', '8', '2014-11-21', 100000, 10, 6, 0, ''),
('456', 23423432, 'Kithinji', 'Joel', 'Mwenda', '0703248574', 'B3', 'YMDG', '2', '2014-03-19', 100000, 1, 3, 0, 'prof-pic 1.jpg'),
('76834', 31273914, 'Mukiiri', 'Vincent', 'Bundi', '0701334345', 'F3', 'Mizizi', '1', '2014-03-19', 100000, 5, 1, 0, ''),
('432', 34543453, 'Wanjiku', 'Joy', 'Nkirote', '0738493345', 'B313', 'Waumini', '', '2014-03-24', 100000, 6, 5, 0, ''),
('375', 35784985, 'Omondi', 'Samuel', 'Detho', '0733464758', 'T9', 'St Mary', '', '2014-03-25', 100000, 10, 6, 0, 'prof-pic 3.jpg'),
('834', 38348495, 'Odhiambo', 'Louis', 'Tola', '0702234432', 'F4', 'Wavivu', '16', '2014-04-04', 100002, 7, 6, 0, 'passportphoto1.jpg'),
('345', 38495833, 'Mapenzi', 'Gregory', 'Arisi', '0712595049', 'T2', 'Crossers', '3', '2014-03-26', 100000, 3, 5, 0, 'vincibars.jpg'),
('485', 39485032, 'Kamau', 'Fred', 'Njiru', '0722394074', 'G8', 'MW', '2', '2014-03-26', 100000, 10, 6, 0, 'prof-pic 4.jpg'),
('9343', 88347583, 'Chweya', 'Ted', 'Monari', '0738585945', 'H7', 'Fishers', '15', '2014-04-04', 100000, 10, 6, 0, 'es_Pardew.jpg'),
('873', 94585495, 'Mbatia', 'Roy', 'James', '0724242534', 'Golf C', 'Exodus', '17', '2014-04-10', 100000, 5, 6, 0, 'Bad Luck Wenger.jpg'),
('700', 345345234, 'station', 'police', 'is', '345456', '456h', 'dfsg', '10', '2014-04-03', 100000, 7, 5, 0, ''),
('594', 453545345, 'Kamau', 'Eric', 'Kagete', '0723423423', 'D4', 'Fishers', '5', '2014-04-02', 100000, 9, 6, 0, 'Carrick.jpg'),
('6756', 546546546, 'Kiama', 'Paul', 'Irungu', '0733454354', 'H9', 'Mizizi', '6', '2014-04-02', 100000, 8, 5, 0, 'altAuYU5za5rs-ytZ1Oo'),
('546', 734647388, 'Mukiiri', 'Edwin', 'Mbui', '0723747483', 'Huruma', '', '', '2014-04-04', 100003, 5, 3, 0, 'passport photo.jpeg'),
('734', 834757384, 'Nyandika', 'Kevin', 'James', '0733757574', '90', 'Fishers', '13', '2014-04-04', 100000, 1, 6, 0, 'passport photo.jpeg'),
('8456', 937453945, 'Rashid', 'Jamal', 'Harry', '0722637238', '50', 'Mizizi', '14', '2014-04-04', 100000, 9, 5, 0, 'sherwood.jpg'),
('404', 987656789, 'is', 'This', 'Sparta', '0798654321', '', '', '12', '2014-04-03', 100000, 10, 6, 0, 'BBC Bendtner.jpg'),
('40', 988766352, 'Hoax', 'Just', 'A', '0704466888', 'HF', 'Ark', '7', '2014-04-03', 100000, 10, 6, 0, 'Days at the Top.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nation`
--

CREATE TABLE IF NOT EXISTS `nation` (
  `nation_id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL DEFAULT 'Kenya',
  `election_status` tinyint(4) NOT NULL DEFAULT '0',
  `deadline` varchar(15) DEFAULT NULL,
  `announcements` text NOT NULL,
  PRIMARY KEY (`nation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nation`
--

INSERT INTO `nation` (`nation_id`, `name`, `election_status`, `deadline`, `announcements`) VALUES
(1, 'Kenya', 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `next_of_kin`
--

CREATE TABLE IF NOT EXISTS `next_of_kin` (
  `nok_id` int(11) NOT NULL AUTO_INCREMENT,
  `nok_name` varchar(20) NOT NULL,
  `nok_number` varchar(10) NOT NULL,
  PRIMARY KEY (`nok_id`),
  UNIQUE KEY `NOK_Number` (`nok_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `next_of_kin`
--

INSERT INTO `next_of_kin` (`nok_id`, `nok_name`, `nok_number`) VALUES
(1, 'hgfjhhgjhg', '876'),
(2, 'Mzeiya', '0'),
(3, 'Mzeiya', '0798653452'),
(4, '', '079865345'),
(5, 'Judas', '0798653'),
(6, 'So', '093732'),
(8, '', '0937320');

-- --------------------------------------------------------

--
-- Table structure for table `officials`
--

CREATE TABLE IF NOT EXISTS `officials` (
  `list_id` int(11) NOT NULL,
  `year` char(4) NOT NULL,
  `chairman` varchar(10) NOT NULL,
  `vice_chair` varchar(10) NOT NULL,
  `vice_chair2` varchar(10) NOT NULL,
  `secretary` varchar(10) NOT NULL,
  `assistant_sec` varchar(10) NOT NULL,
  `organising_sec` varchar(10) NOT NULL,
  `ass_organising_sec` varchar(10) NOT NULL,
  `treasurer` varchar(10) NOT NULL,
  PRIMARY KEY (`list_id`,`year`),
  KEY `List_ID` (`list_id`),
  KEY `List_ID_2` (`list_id`),
  KEY `List_ID_3` (`list_id`),
  KEY `List_ID_4` (`list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officials`
--

INSERT INTO `officials` (`list_id`, `year`, `chairman`, `vice_chair`, `vice_chair2`, `secretary`, `assistant_sec`, `organising_sec`, `ass_organising_sec`, `treasurer`) VALUES
(13, '', '', '', '', '', '', '', '', ''),
(14, '', '', '', '', '', '', '', '', ''),
(23452345, '2014', '', '', '', '', '', '', '', ''),
(2147483647, '2013', '3454325', '536456', '3425435', '3452345', '3452345', '34262435', '432523465', '3426235');

-- --------------------------------------------------------

--
-- Table structure for table `officials_present`
--

CREATE TABLE IF NOT EXISTS `officials_present` (
  `list_id` int(11) NOT NULL,
  `chairman` varchar(10) NOT NULL,
  `vice_chair` varchar(10) NOT NULL,
  `vice_chair2` varchar(10) NOT NULL,
  `secretary` varchar(10) NOT NULL,
  `assistant_sec` varchar(10) NOT NULL,
  `organising_sec` varchar(10) NOT NULL,
  `ass_organising_sec` varchar(10) NOT NULL,
  `treasurer` varchar(10) NOT NULL,
  PRIMARY KEY (`list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officials_present`
--

INSERT INTO `officials_present` (`list_id`, `chairman`, `vice_chair`, `vice_chair2`, `secretary`, `assistant_sec`, `organising_sec`, `ass_organising_sec`, `treasurer`) VALUES
(1, '', '', '', '', '', '', '', ''),
(10, '', '', '', '', '', '', '', ''),
(11, '', '', '', '', '', '', '', ''),
(12, '', '', '', '', '', '', '', ''),
(13, '', '', '', '', '', '', '', ''),
(14, '', '', '', '', '', '', '', ''),
(100, '', '', '', '', '', '', '', ''),
(101, '', '', '', '', '', '', '', ''),
(102, '', '', '', '', '', '', '', ''),
(104, '', '', '', '', '', '', '', ''),
(105, '', '', '', '', '', '', '', ''),
(1000, '23423432', '', '', '31273914', '', '', '', ''),
(1001, '4353', '456346', '356', '356345', '456345', '3456345', '', ''),
(1003, '', '', '', '', '', '', '', ''),
(1004, '', '', '', '', '', '', '', ''),
(1006, '', '', '', '', '', '', '', ''),
(10000, '', '', '', '', '', '', '', ''),
(10005, '23423432', '38495833', '', '31273914', '34543453', '345345234', '546546546', '937453945'),
(10006, '', '', '', '', '', '', '', ''),
(10007, '', '', '', '', '', '', '', ''),
(100000, '', '', '', '', '', '', '', ''),
(100001, '', '', '', '', '', '', '', ''),
(100002, '', '', '', '', '', '', '', ''),
(100003, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `outstation`
--

CREATE TABLE IF NOT EXISTS `outstation` (
  `outstation_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `parish_id` int(6) NOT NULL,
  `election_status` tinyint(4) NOT NULL DEFAULT '0',
  `deadline` varchar(15) DEFAULT NULL,
  `announcements` text NOT NULL,
  PRIMARY KEY (`outstation_id`),
  KEY `Parish_ID` (`parish_id`),
  KEY `Parish_ID_2` (`parish_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100004 ;

--
-- Dumping data for table `outstation`
--

INSERT INTO `outstation` (`outstation_id`, `name`, `parish_id`, `election_status`, `deadline`, `announcements`) VALUES
(100000, 'Case', 10005, 0, NULL, 'Please.'),
(100001, 'St Pauls', 10000, 0, NULL, ''),
(100002, 'St. John', 10008, 0, NULL, ''),
(100003, 'St Peter', 10007, 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `parish`
--

CREATE TABLE IF NOT EXISTS `parish` (
  `parish_id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `deanery_id` int(5) NOT NULL,
  `election_status` tinyint(4) NOT NULL DEFAULT '0',
  `deadline` varchar(15) DEFAULT NULL,
  `announcements` text NOT NULL,
  PRIMARY KEY (`parish_id`),
  KEY `Deanery_ID` (`deanery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10009 ;

--
-- Dumping data for table `parish`
--

INSERT INTO `parish` (`parish_id`, `name`, `deanery_id`, `election_status`, `deadline`, `announcements`) VALUES
(10000, 'Mfano', 1003, 0, NULL, ''),
(10005, 'Copy', 1000, 0, NULL, 'This is successful.'),
(10006, 'Dunga Beac', 1005, 0, NULL, ''),
(10007, 'St Peter', 1006, 0, NULL, ''),
(10008, 'St. John', 1005, 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(2) NOT NULL AUTO_INCREMENT,
  `post_name` varchar(20) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `Post_ID` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_name`) VALUES
(1, 'Administrator'),
(2, 'Chairman'),
(3, 'Vice-Chair'),
(4, 'Assistant Vice-Chair'),
(5, 'Secretary'),
(6, 'Assistant Secretary'),
(7, 'Organising Secretary'),
(8, 'Ass. Org. Secretary'),
(9, 'Treasurer'),
(10, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `national_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `hashed_password` varchar(40) NOT NULL,
  PRIMARY KEY (`national_id`),
  UNIQUE KEY `national_id_2` (`national_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `username_2` (`username`),
  UNIQUE KEY `username_3` (`username`),
  UNIQUE KEY `username_4` (`username`),
  UNIQUE KEY `username_5` (`username`),
  KEY `national_id` (`national_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`national_id`, `username`, `hashed_password`) VALUES
(3452345, '3452345', 'ed5d30a8aca99eab0cb23b5e22d70ed50db198fe'),
(23423432, 'joel', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(31273914, 'vince', 'e3ae67789c0dfba41b42cc5a3f6f4bb0e2e174b5');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `archdiocese`
--
ALTER TABLE `archdiocese`
  ADD CONSTRAINT `archdiocese_ibfk_1` FOREIGN KEY (`Nation_ID`) REFERENCES `nation` (`Nation_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `archdiocese_ibfk_2` FOREIGN KEY (`nation_id`) REFERENCES `nation` (`Nation_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `deanery`
--
ALTER TABLE `deanery`
  ADD CONSTRAINT `deanery_ibfk_1` FOREIGN KEY (`Diocese_ID`) REFERENCES `diocese` (`Diocese_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `deanery_ibfk_2` FOREIGN KEY (`diocese_id`) REFERENCES `diocese` (`Diocese_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `diocese`
--
ALTER TABLE `diocese`
  ADD CONSTRAINT `diocese_ibfk_1` FOREIGN KEY (`Archdiocese_ID`) REFERENCES `archdiocese` (`Archdiocese_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `diocese_ibfk_2` FOREIGN KEY (`archdiocese_id`) REFERENCES `archdiocese` (`archdiocese_id`) ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`Outstation_ID`) REFERENCES `outstation` (`Outstation_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`Post_ID`) REFERENCES `posts` (`Post_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `members_ibfk_3` FOREIGN KEY (`Division_ID`) REFERENCES `divisions` (`Division_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `members_ibfk_4` FOREIGN KEY (`outstation_id`) REFERENCES `outstation` (`outstation_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `members_ibfk_5` FOREIGN KEY (`post_id`) REFERENCES `posts` (`Post_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `members_ibfk_6` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`Division_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `outstation`
--
ALTER TABLE `outstation`
  ADD CONSTRAINT `outstation_ibfk_1` FOREIGN KEY (`Parish_ID`) REFERENCES `parish` (`Parish_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `outstation_ibfk_2` FOREIGN KEY (`parish_id`) REFERENCES `parish` (`Parish_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `parish`
--
ALTER TABLE `parish`
  ADD CONSTRAINT `parish_ibfk_1` FOREIGN KEY (`Deanery_ID`) REFERENCES `deanery` (`Deanery_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `parish_ibfk_2` FOREIGN KEY (`deanery_id`) REFERENCES `deanery` (`deanery_id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`national_id`) REFERENCES `members` (`national_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
