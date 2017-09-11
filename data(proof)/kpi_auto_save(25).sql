-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2016 at 12:38 PM
-- Server version: 5.6.31-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmsstructure`
--

-- --------------------------------------------------------

--
-- Table structure for table `kpi_auto_save`
--

CREATE TABLE IF NOT EXISTS `kpi_auto_save` (
  `KPI_id` varchar(11) NOT NULL,
  `KRA_description` varchar(200) NOT NULL,
  `kpi_list` varchar(200) NOT NULL,
  `target` varchar(100) NOT NULL,
  `target_unit` varchar(100) NOT NULL,
  `target_value1` varchar(1000) NOT NULL,
  `target_value2` varchar(100) NOT NULL,
  `target_value3` varchar(100) NOT NULL,
  `target_value4` varchar(100) NOT NULL,
  `target_value5` varchar(100) NOT NULL,
  `KRA_category` varchar(100) NOT NULL,
  `appraisal_id1` varchar(100) NOT NULL,
  `Employee_id` varchar(100) NOT NULL,
  `kra_complete_flag` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `KPI_target_value` varchar(100) NOT NULL,
  `KRA_date` date NOT NULL,
  `KRA_status` varchar(50) NOT NULL,
  `KRA_status_flag` int(11) NOT NULL,
  `goal_status` varchar(100) NOT NULL,
  `employee_comment` varchar(500) NOT NULL,
  `mid_review_by_employee_date` date NOT NULL,
  `KRA_mid_status` varchar(100) NOT NULL,
  `appraiser_comment` varchar(500) NOT NULL,
  `mid_KRA_status` varchar(100) NOT NULL,
  `mid_review_date` date NOT NULL,
  `mid_KRA_final_status` varchar(100) NOT NULL,
  `year_end_achieve` varchar(100) NOT NULL,
  `year_end_reviewa` varchar(500) NOT NULL,
  `appraiser_end_review` varchar(500) NOT NULL,
  `appraiser_end_rating` varchar(100) NOT NULL,
  `appraiser_avrage_end` float NOT NULL,
  `goal_set_year` varchar(50) NOT NULL,
  `document_proof` varchar(3000) NOT NULL,
  `final_year_kra_status` varchar(1000) NOT NULL,
  `final_kra_status` varchar(100) NOT NULL,
  `rating_by_emp` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kpi_auto_save`
--

INSERT INTO `kpi_auto_save` (`KPI_id`, `KRA_description`, `kpi_list`, `target`, `target_unit`, `target_value1`, `target_value2`, `target_value3`, `target_value4`, `target_value5`, `KRA_category`, `appraisal_id1`, `Employee_id`, `kra_complete_flag`, `id`, `KPI_target_value`, `KRA_date`, `KRA_status`, `KRA_status_flag`, `goal_status`, `employee_comment`, `mid_review_by_employee_date`, `KRA_mid_status`, `appraiser_comment`, `mid_KRA_status`, `mid_review_date`, `mid_KRA_final_status`, `year_end_achieve`, `year_end_reviewa`, `appraiser_end_review`, `appraiser_end_rating`, `appraiser_avrage_end`, `goal_set_year`, `document_proof`, `final_year_kra_status`, `final_kra_status`, `rating_by_emp`) VALUES
('046cadf2de8', 'Data Security  and Compliance', 'Implementation of Forti-Client for Data security;Managing the Firewall;Maintaining Anti-Virus Server', '20', 'Date;Percentage;Percentage', '30/Oct/2016-30/Sep/2016-02/Oct/2016-undefined-01/Jun/2016;85-90-95-97-99;85-90-95-97-99', '', '', '', '', 'Process', 'monica.sadafule@kritva.com', '222', 2, 97, '25;25;50', '2016-10-05', 'Pending', 1, '', 'uyuyt;uyt;uytu;ytuyt', '2016-09-29', '', 'fdgfdgfd;ljkhhjkl;jhk', 'Nearing Completion;On Track;On Track', '2016-10-07', '', '2016/10/04;91;98', 'kjhkj;hkjhkj;hkjhk', 'hjkjh;iuoiuoi;jhkjh', '1;2;4', 2, '2016-2017', '', 'undefined;undefined;undefined', 'Approved', '1;3;5'),
('d1472558e5a', 'dsfd', 'dsfds;dsfd', '20', 'Units;Weight', '23;33', '', '', '', '', 'People', 'demo.appraisel@gmail.com', 'vvf57e264fd8d3ef', 2, 145, '', '2016-10-12', 'Pending', 0, '', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '', '', 0, '2016-2017', '', '', '', ''),
('93d917028bc', 'dsfds', 'dsfds', '30', 'Units', '34', '', '', '', '', 'Business', 'demo.appraisel@gmail.com', 'vvf57e264fd8d3ef', 2, 141, '', '2016-10-10', 'Pending', 0, '', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '', '', 0, '2016-2017', '', '', '', ''),
('bbd66b256f2', 'fdgf', 'dfgfd', '20', 'Weight', '10', '', '', '', '', 'Business', 'demo.appraisel@gmail.com', '111', 2, 134, '', '2016-10-14', 'Approved', 1, 'Approved', '', '0000-00-00', '', 'gfhgf', 'Nearing Completion', '2016-10-14', 'Approved', '2016/10/06', 'dsfdsfds', 'dfdsfd', '2', 2, '2016-2017', '', 'Pending', 'Approved', '5'),
('160b5f8d145', 'fdgfd', 'fdgfd;fdgf', '20', 'Units;Weight', '23;33', '', '', '', '', 'Business', 'demo.appraisel@gmail.com', 'vvf57e264fd8d3ef', 2, 143, '', '2016-10-12', 'Pending', 0, '', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '', '', 0, '2016-2017', '', '', '', ''),
('46f24a88991', 'fdgfd', 'hgjhg;ghgfhgf', '20', 'Date;Days', '05/Oct/2016-13/Oct/2016-17/Oct/2016-02/Oct/2016-25/Oct/2016;180-120-90-60-30', '', '', '', '', 'Customer', 'monica.sadafule@kritva.com', '222', 2, 119, '50;50;;;', '2016-10-04', 'Pending', 1, '', '', '0000-00-00', '', 'ddsasd;ytutyuyt', 'Needs Attention;On Track', '2016-10-07', '', '2016/10/20;44', 'hghg;gfhgfhg', 'ioiuoi;ioiu', '5;0', 2.5, '2016-2017', '', 'undefined;undefined', 'Approved', '5;4'),
('9df105c8722', 'fdgfd', '1 Streamline NPD process by remove/realign current activities to achieve 20% reduction in overall time by Aug''16', '30', 'Percentage', '15-10-20-25-30', '', '', '', '', 'Customer', 'demo.appraisel@gmail.com', '111', 2, 132, '', '2016-10-14', 'Approved', 1, 'Approved', '', '0000-00-00', '', 'gfhgf;gfhgf', 'Nearing Completion;Nearing Completion', '2016-10-14', 'Approved', '54', 'rtretre', '', '', 0, '2016-2017', '', 'Pending', 'Approved', '5'),
('9f6b83eefd4', 'ghgf', 'gfhgf;fdgfd', '30', 'Units;Weight', '12;11', '', '', '', '', 'People', 'demo.appraisel@gmail.com', '111', 2, 144, '', '2016-10-14', 'Approved', 1, 'Approved', '', '0000-00-00', '', 'gfhgf;gfhgf;gfhgf;gfhgf', 'Nearing Completion;Nearing Completion;Nearing Completion;Nearing Completion', '2016-10-14', 'Approved', '', '', '', '', 0, '2016-2017', '', '', '', ''),
('cefe282dc85', 'Set the process for planning and tracking of NPD projects and reduce current time required by 20%. Lead GST related factory changes and ensure 100% OTIF', '1 Streamline NPD process by remove/realign current activities to achieve 20% reduction in overall time by Aug''16', '20', 'Percentage', '5-10-20-25-30', '', '', '', '', 'Process', 'demo.appraisel@gmail.com', '111', 2, 130, '', '2016-10-14', 'Approved', 1, 'Approved', '', '0000-00-00', '', 'gfhgf;gfhgf;gfhgf;gfhgf;gfhgf', 'Nearing Completion;Nearing Completion;Nearing Completion;Nearing Completion;Nearing Completion', '2016-10-14', 'Approved', '25;66;45', 'jhg;dfhfdh;fdgfdgfd', '', '', 0, '2016-2017', '', 'Pending', 'Approved', '4;1;4'),
('cfda2697948', 'tretr', 'retr', '30', 'Weight', '23', '', '', '', '', 'Business', 'demo.appraisel@gmail.com', 'vvf57e264fd8d3ef', 2, 142, '', '2016-10-10', 'Pending', 0, '', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '', '', 0, '2016-2017', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kpi_auto_save`
--
ALTER TABLE `kpi_auto_save`
  ADD PRIMARY KEY (`KRA_description`,`KPI_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kpi_auto_save`
--
ALTER TABLE `kpi_auto_save`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=146;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
