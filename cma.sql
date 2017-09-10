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
-- Database: `cma`
--

-- --------------------------------------------------------

--
-- Table structure for table `archdiocese`
--

CREATE TABLE IF NOT EXISTS `archdiocese` (
  `Archdiocese_ID` int(3) NOT NULL AUTO_INCREMENT,
  `Name` varchar(10) NOT NULL,
  `Nation_ID` int(2) NOT NULL,
  `Election_Status` tinyint(1) NOT NULL DEFAULT '0',
  `Deadline` varchar(15) DEFAULT NULL,
  `Announcements` text NOT NULL,
  PRIMARY KEY (`Archdiocese_ID`),
  KEY `Name_2` (`Name`),
  KEY `Nation_ID` (`Nation_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `archdiocese`
--

INSERT INTO `archdiocese` (`Archdiocese_ID`, `Name`, `Nation_ID`, `Election_Status`, `Deadline`, `Announcements`) VALUES
(10, 'Nairobi', 1, 0, NULL, ''),
(11, 'Kisumu', 1, 0, NULL, ''),
(12, 'Mombasa', 1, 0, NULL, ''),
(13, 'Homa Bay', 1, 0, NULL, ''),
(14, 'Isiolo', 1, 0, NULL, ''),
(15, 'Isiolo', 1, 0, NULL, '');

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
  `Deanery_ID` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(10) NOT NULL,
  `Diocese_ID` int(4) NOT NULL,
  `Election_Status` tinyint(4) NOT NULL DEFAULT '0',
  `Deadline` varchar(15) DEFAULT NULL,
  `Announcements` text NOT NULL,
  PRIMARY KEY (`Deanery_ID`),
  KEY `Diocese_ID` (`Diocese_ID`),
  KEY `Diocese_ID_2` (`Diocese_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1007 ;

--
-- Dumping data for table `deanery`
--

INSERT INTO `deanery` (`Deanery_ID`, `Name`, `Diocese_ID`, `Election_Status`, `Deadline`, `Announcements`) VALUES
(1000, 'Example', 102, 0, NULL, 'There is a meeting now.'),
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
  `Diocese_ID` int(4) NOT NULL AUTO_INCREMENT,
  `Name` varchar(10) NOT NULL,
  `Archdiocese_ID` int(3) NOT NULL,
  `Election_Status` tinyint(4) NOT NULL DEFAULT '0',
  `Deadline` varchar(15) DEFAULT NULL,
  `Announcements` text NOT NULL,
  PRIMARY KEY (`Diocese_ID`),
  KEY `Archdiocese_ID` (`Archdiocese_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `diocese`
--

INSERT INTO `diocese` (`Diocese_ID`, `Name`, `Archdiocese_ID`, `Election_Status`, `Deadline`, `Announcements`) VALUES
(100, 'Nairobi', 10, 0, NULL, ''),
(101, 'Eastlands', 10, 0, NULL, ''),
(102, 'Example', 10, 0, NULL, ''),
(103, 'Boyish', 10, 0, NULL, ''),
(104, 'Homa Bay', 13, 0, NULL, ''),
(105, 'Isiolo', 15, 0, NULL, ''),
(106, 'Garissa', 14, 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE IF NOT EXISTS `divisions` (
  `Division_ID` int(2) NOT NULL,
  `Division_Name` varchar(15) NOT NULL,
  PRIMARY KEY (`Division_ID`),
  KEY `Division_ID` (`Division_ID`),
  KEY `Division_ID_2` (`Division_ID`),
  KEY `Division_ID_3` (`Division_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`Division_ID`, `Division_Name`) VALUES
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
  `List_ID` varchar(10) NOT NULL,
  `Post_ID` int(2) NOT NULL,
  `Year` int(4) NOT NULL,
  `ID_No` varchar(10) NOT NULL,
  `Tally` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`List_ID`,`Post_ID`,`Year`,`ID_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`List_ID`, `Post_ID`, `Year`, `ID_No`, `Tally`) VALUES
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
  `National_ID` varchar(10) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Other_Names` varchar(20) NOT NULL,
  `Mobile_No` varchar(10) NOT NULL,
  `House_No` varchar(6) NOT NULL,
  `SCC` varchar(20) NOT NULL,
  `NOK_ID` varchar(10) NOT NULL,
  `Joining_Date` date NOT NULL,
  `Outstation_ID` int(8) NOT NULL,
  `Post_ID` int(2) NOT NULL DEFAULT '10',
  `Division_ID` int(2) NOT NULL DEFAULT '6',
  `Vote_Status` tinyint(4) NOT NULL DEFAULT '0',
  `Image` varchar(20) NOT NULL,
  PRIMARY KEY (`cma_no`),
  UNIQUE KEY `Mobile_No` (`Mobile_No`),
  KEY `Outstation_ID` (`Outstation_ID`),
  KEY `Post_ID` (`Post_ID`),
  KEY `Division_ID` (`Division_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`cma_no`, `National_ID`, `Surname`, `First_Name`, `Other_Names`, `Mobile_No`, `House_No`, `SCC`, `NOK_ID`, `Joining_Date`, `Outstation_ID`, `Post_ID`, `Division_ID`, `Vote_Status`, `Image`) VALUES
('055859', '058056085', 'Maranga', 'Jared', 'Mayieka', '0703223456', '45', '', '18', '2014-11-22', 100000, 10, 6, 0, 'passport photo.jpeg'),
('345', '38495833', 'Mapenzi', 'Gregory', 'Arisi', '0712595049', 'T2', 'Crossers', '3', '2014-03-26', 100000, 3, 5, 0, 'vincibars.jpg'),
('375', '35784985', 'Omondi', 'Samuel', 'Detho', '0733464758', 'T9', 'St Mary', '', '2014-03-25', 100000, 10, 6, 0, 'prof-pic 3.jpg'),
('40', '988766352', 'Hoax', 'Just', 'A', '0704466888', 'HF', 'Ark', '7', '2014-04-03', 100000, 10, 6, 0, 'Days at the Top.jpg'),
('404', '987656789', 'is', 'This', 'Sparta', '0798654321', '', '', '12', '2014-04-03', 100000, 10, 6, 0, 'BBC Bendtner.jpg'),
('432', '34543453', 'Wanjiku', 'Joy', 'Nkirote', '0738493345', 'B313', 'Waumini', '', '2014-03-24', 100000, 6, 5, 0, ''),
('456', '23423432', 'Kithinji', 'Joel', 'Mwenda', '0703248574', 'B3', 'YMDG', '2', '2014-03-19', 100000, 2, 3, 0, 'prof-pic 1.jpg'),
('485', '39485032', 'Kamau', 'Fred', 'Njiru', '0722394074', 'G8', 'MW', '2', '2014-03-26', 100000, 10, 6, 0, 'prof-pic 4.jpg'),
('546', '734647388', 'Mukiiri', 'Edwin', 'Mbui', '0723747483', 'Huruma', '', '', '2014-04-04', 100003, 5, 3, 0, 'passport photo.jpeg'),
('594', '453545345', 'Kamau', 'Eric', 'Kagete', '0723423423', 'D4', 'Fishers', '5', '2014-04-02', 100000, 9, 6, 0, 'Carrick.jpg'),
('6756', '546546546', 'Kiama', 'Paul', 'Irungu', '0733454354', 'H9', 'Mizizi', '6', '2014-04-02', 100000, 8, 5, 0, 'altAuYU5za5rs-ytZ1Oo'),
('700', '345345234', 'station', 'police', 'is', '345456', '456h', 'dfsg', '10', '2014-04-03', 100000, 7, 5, 0, ''),
('734', '834757384', 'Nyandika', 'Kevin', 'James', '0733757574', '90', 'Fishers', '13', '2014-04-04', 100000, 1, 6, 0, 'passport photo.jpeg'),
('76834', '31273914', 'Mukiiri', 'Vincent', 'Bundi', '0701334345', 'F3', 'Mizizi', '1', '2014-03-19', 100000, 5, 4, 0, ''),
('834', '38348495', 'Odhiambo', 'Louis', 'Tola', '0702234432', 'F4', 'Wavivu', '16', '2014-04-04', 100002, 7, 6, 0, 'passportphoto1.jpg'),
('8456', '937453945', 'Rashid', 'Jamal', 'Harry', '0722637238', '50', 'Mizizi', '14', '2014-04-04', 100000, 9, 5, 0, 'sherwood.jpg'),
('873', '94585495', 'Mbatia', 'Roy', 'James', '0724242534', 'Golf C', 'Exodus', '17', '2014-04-10', 100000, 5, 6, 0, 'Bad Luck Wenger.jpg'),
('9343', '88347583', 'Chweya', 'Ted', 'Monari', '0738585945', 'H7', 'Fishers', '15', '2014-04-04', 100000, 10, 6, 0, 'es_Pardew.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nation`
--

CREATE TABLE IF NOT EXISTS `nation` (
  `Nation_ID` int(2) NOT NULL AUTO_INCREMENT,
  `Name` varchar(10) NOT NULL DEFAULT 'Kenya',
  `Election_Status` tinyint(4) NOT NULL DEFAULT '0',
  `Deadline` varchar(15) DEFAULT NULL,
  `Announcements` text NOT NULL,
  PRIMARY KEY (`Nation_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nation`
--

INSERT INTO `nation` (`Nation_ID`, `Name`, `Election_Status`, `Deadline`, `Announcements`) VALUES
(1, 'Kenya', 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `next_of_kin`
--

CREATE TABLE IF NOT EXISTS `next_of_kin` (
  `NOK_ID` int(10) NOT NULL AUTO_INCREMENT,
  `NOK_Name` varchar(20) NOT NULL,
  `NOK_Number` varchar(10) NOT NULL,
  PRIMARY KEY (`NOK_ID`),
  UNIQUE KEY `NOK_Number` (`NOK_Number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `next_of_kin`
--

INSERT INTO `next_of_kin` (`NOK_ID`, `NOK_Name`, `NOK_Number`) VALUES
(1, 'John Maina', '0737487387'),
(2, 'Grace Kamau', '0737447832'),
(3, 'Oliver Mapenzi', '0734583345'),
(4, 'James Maina', '0733647754'),
(5, 'John Kagete', '0732352342'),
(6, 'John Irungu', '0722746546'),
(7, 'Wei', '0788888888'),
(8, 'sdfg', '0723141231'),
(9, 'sdfg', '4356636456'),
(10, 'sdfg', '345234'),
(11, '', ''),
(12, 'sdkfjhsflg', '3453'),
(13, 'Ted Nyandika', '0711094039'),
(14, 'Patel Rashid', '0703664736'),
(15, 'Sam Chweya', '0723423423'),
(16, 'Ivy Adhiambo', '0700334474'),
(17, 'Allan Mbatia', '0727888737'),
(18, 'Mrs. Mayieka', '0740047282');

-- --------------------------------------------------------

--
-- Table structure for table `officials`
--

CREATE TABLE IF NOT EXISTS `officials` (
  `List_ID` int(11) NOT NULL,
  `Year` char(4) NOT NULL,
  `Chairman` varchar(10) NOT NULL,
  `Vice_Chair` varchar(10) NOT NULL,
  `Vice_Chair2` varchar(10) NOT NULL,
  `Secretary` varchar(10) NOT NULL,
  `Assistant_Sec` varchar(10) NOT NULL,
  `Organising_Sec` varchar(10) NOT NULL,
  `Ass_Organising_Sec` varchar(10) NOT NULL,
  `Treasurer` varchar(10) NOT NULL,
  PRIMARY KEY (`List_ID`,`Year`),
  KEY `List_ID` (`List_ID`),
  KEY `List_ID_2` (`List_ID`),
  KEY `List_ID_3` (`List_ID`),
  KEY `List_ID_4` (`List_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officials`
--

INSERT INTO `officials` (`List_ID`, `Year`, `Chairman`, `Vice_Chair`, `Vice_Chair2`, `Secretary`, `Assistant_Sec`, `Organising_Sec`, `Ass_Organising_Sec`, `Treasurer`) VALUES
(23452345, '2014', '', '', '', '', '', '', '', ''),
(2147483647, '2013', '3454325', '536456', '3425435', '3452345', '3452345', '34262435', '432523465', '3426235');

-- --------------------------------------------------------

--
-- Table structure for table `officials_present`
--

CREATE TABLE IF NOT EXISTS `officials_present` (
  `List_ID` int(11) NOT NULL,
  `Chairman` varchar(10) NOT NULL,
  `Vice_Chair` varchar(10) NOT NULL,
  `Vice_Chair2` varchar(10) NOT NULL,
  `Secretary` varchar(10) NOT NULL,
  `Assistant_Sec` varchar(10) NOT NULL,
  `Organising_Sec` varchar(10) NOT NULL,
  `Ass_Organising_Sec` varchar(10) NOT NULL,
  `Treasurer` varchar(10) NOT NULL,
  PRIMARY KEY (`List_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officials_present`
--

INSERT INTO `officials_present` (`List_ID`, `Chairman`, `Vice_Chair`, `Vice_Chair2`, `Secretary`, `Assistant_Sec`, `Organising_Sec`, `Ass_Organising_Sec`, `Treasurer`) VALUES
(1, '', '', '', '', '', '', '', ''),
(10, '', '', '', '', '', '', '', ''),
(11, '', '', '', '', '', '', '', ''),
(12, '', '', '', '', '', '', '', ''),
(100, '', '', '', '', '', '', '', ''),
(101, '', '', '', '', '', '', '', ''),
(102, '', '', '', '', '', '', '', ''),
(104, '', '', '', '', '', '', '', ''),
(105, '', '', '', '', '', '', '', ''),
(106, '', '', '', '', '', '', '', ''),
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
  `Outstation_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(10) NOT NULL,
  `Parish_ID` int(6) NOT NULL,
  `Election_Status` tinyint(4) NOT NULL DEFAULT '0',
  `Deadline` varchar(15) DEFAULT NULL,
  `Announcements` text NOT NULL,
  PRIMARY KEY (`Outstation_ID`),
  KEY `Parish_ID` (`Parish_ID`),
  KEY `Parish_ID_2` (`Parish_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100004 ;

--
-- Dumping data for table `outstation`
--

INSERT INTO `outstation` (`Outstation_ID`, `Name`, `Parish_ID`, `Election_Status`, `Deadline`, `Announcements`) VALUES
(100000, 'Case', 10005, 0, NULL, 'This makes more sense. '),
(100001, 'St Pauls', 10000, 0, NULL, ''),
(100002, 'St. John', 10006, 0, NULL, ''),
(100003, 'St Peter', 10007, 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `parish`
--

CREATE TABLE IF NOT EXISTS `parish` (
  `Parish_ID` int(6) NOT NULL AUTO_INCREMENT,
  `Name` varchar(10) NOT NULL,
  `Deanery_ID` int(5) NOT NULL,
  `Election_Status` tinyint(4) NOT NULL DEFAULT '0',
  `Deadline` varchar(15) DEFAULT NULL,
  `Announcements` text NOT NULL,
  PRIMARY KEY (`Parish_ID`),
  KEY `Deanery_ID` (`Deanery_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10008 ;

--
-- Dumping data for table `parish`
--

INSERT INTO `parish` (`Parish_ID`, `Name`, `Deanery_ID`, `Election_Status`, `Deadline`, `Announcements`) VALUES
(10000, 'Mfano', 1003, 0, NULL, ''),
(10005, 'Copy', 1000, 0, NULL, 'This is successful.'),
(10006, 'Dunga Beac', 1005, 0, NULL, ''),
(10007, 'St Peter', 1006, 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `Post_ID` int(2) NOT NULL AUTO_INCREMENT,
  `Post_Name` varchar(20) NOT NULL,
  PRIMARY KEY (`Post_ID`),
  KEY `Post_ID` (`Post_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`Post_ID`, `Post_Name`) VALUES
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cma_no` varchar(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `hashed_password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `CMA_No` (`cma_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `cma_no`, `username`, `hashed_password`) VALUES
(1, '76834', 'vince', 'e3ae67789c0dfba41b42cc5a3f6f4bb0e2e174b5'),
(2, '456', 'joel', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(3, '594', 'Eric', '7c222fb2927d828af22f592134e8932480637c0d'),
(4, '6756', 'Kiama', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
(5, '700', 'police', '7c222fb2927d828af22f592134e8932480637c0d'),
(7, '404', 'This', '7c222fb2927d828af22f592134e8932480637c0d'),
(8, '734', 'Kevin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(9, '8456', 'Jamal', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(10, '9343', 'Ted', '7c222fb2927d828af22f592134e8932480637c0d'),
(11, '834', 'Louis', '7c222fb2927d828af22f592134e8932480637c0d'),
(12, '546', 'Edwin', '7c222fb2927d828af22f592134e8932480637c0d'),
(14, '873', 'Roy', '7c222fb2927d828af22f592134e8932480637c0d'),
(15, '055859', 'Jared', '7c222fb2927d828af22f592134e8932480637c0d');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `archdiocese`
--
ALTER TABLE `archdiocese`
  ADD CONSTRAINT `archdiocese_ibfk_1` FOREIGN KEY (`Nation_ID`) REFERENCES `nation` (`Nation_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `deanery`
--
ALTER TABLE `deanery`
  ADD CONSTRAINT `deanery_ibfk_1` FOREIGN KEY (`Diocese_ID`) REFERENCES `diocese` (`Diocese_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `diocese`
--
ALTER TABLE `diocese`
  ADD CONSTRAINT `diocese_ibfk_1` FOREIGN KEY (`Archdiocese_ID`) REFERENCES `archdiocese` (`Archdiocese_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`Outstation_ID`) REFERENCES `outstation` (`Outstation_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`Post_ID`) REFERENCES `posts` (`Post_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `members_ibfk_3` FOREIGN KEY (`Division_ID`) REFERENCES `divisions` (`Division_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `outstation`
--
ALTER TABLE `outstation`
  ADD CONSTRAINT `outstation_ibfk_1` FOREIGN KEY (`Parish_ID`) REFERENCES `parish` (`Parish_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `parish`
--
ALTER TABLE `parish`
  ADD CONSTRAINT `parish_ibfk_1` FOREIGN KEY (`Deanery_ID`) REFERENCES `deanery` (`Deanery_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`cma_no`) REFERENCES `members` (`cma_no`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
