-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2016 at 06:21 AM
-- Server version: 5.5.40-36.1-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kritvpbp_pmsstructure`
--

-- --------------------------------------------------------

--
-- Table structure for table `cluster`
--

CREATE TABLE IF NOT EXISTS `cluster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cluster_name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `cluster_appraiser` varchar(200) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `headname` varchar(100) NOT NULL,
  `clusterhead_name` varchar(100) NOT NULL,
  `Reporting_officer1_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=390 ;

--
-- Dumping data for table `cluster`
--

INSERT INTO `cluster` (`id`, `cluster_name`, `department`, `grade`, `cluster_appraiser`, `designation`, `headname`, `clusterhead_name`, `Reporting_officer1_id`) VALUES
(388, 'SMC', 'R&D', 'A', 'mssadafule@gmail.com', 'Developer', 'Jayesh Menon', 'Monica Sadafule', 'jayesh.menon@kritva.com'),
(389, 'Finance / IT / Indirect Tax/Excise/EXIM\r\n', 'Finance & Accounts', 'A', 'pawar.shubhangi.n@gmail.com', 'Assistant Manager', 'Priyanka Patil', 'Suraj', 'monica.sadafule@kritva.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
