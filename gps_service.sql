-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2017 at 11:42 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gps_service`
--
CREATE DATABASE IF NOT EXISTS `gps_service` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gps_service`;

-- --------------------------------------------------------

--
-- Table structure for table `mechanics`
--

CREATE TABLE IF NOT EXISTS `mechanics` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `aadhar` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `experties` varchar(100) NOT NULL,
  `exp` varchar(100) NOT NULL,
  `lognitude` varchar(100) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mechanics`
--

INSERT INTO `mechanics` (`mid`, `name`, `email`, `contact`, `aadhar`, `address`, `experties`, `exp`, `lognitude`, `latitude`) VALUES
(1, 'Abhay', 'asdad@gmail.coom', '09348938', 'asd', 'asd', 'asd', '2', '77.433592', '23.231116'),
(2, 'Amit', 'raj@gmail.com', '03149231048', '191919191991', 'Nehru Nagar', 'car', '3', '77.386990', '23.207466'),
(3, 'Nitin', 'nitinjn07@gmail.com', '9374937', '298834928349', 'Vishal Megamart', 'Car', '2', '77.432741', '23.236884');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
