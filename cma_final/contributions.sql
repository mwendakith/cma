-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 04, 2014 at 05:17 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `contributions`
--

CREATE TABLE IF NOT EXISTS `contributions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cma_no` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`id`, `cma_no`, `amount`, `date`) VALUES
(1, 432, '500', '2014-04-03'),
(2, 432, '200', '2014-04-03'),
(3, 76834, '500', '2014-04-03'),
(4, 646, '400', '2014-04-03'),
(5, 646, '25', '2014-04-03');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
