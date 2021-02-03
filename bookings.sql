-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2021 at 10:37 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookings`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) unsigned DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `approved_leave_applications`
--

CREATE TABLE IF NOT EXISTS `approved_leave_applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ec_number` varchar(50) NOT NULL,
  `days_applied` int(11) NOT NULL,
  `leave_address` varchar(100) NOT NULL,
  `type_leave` varchar(50) NOT NULL,
  `days_left` int(11) NOT NULL,
  `attach_cert` varchar(5) NOT NULL,
  `salary_paid` varchar(5) NOT NULL,
  `application_date` varchar(50) NOT NULL,
  `leave_start_date` varchar(50) NOT NULL,
  `leave_end_date` varchar(50) NOT NULL,
  `approved` int(11) NOT NULL DEFAULT '0',
  `approved_by` varchar(100) NOT NULL,
  `date_approved` varchar(100) NOT NULL,
  `approve_ip_address` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `approved_leave_applications`
--

INSERT INTO `approved_leave_applications` (`id`, `ec_number`, `days_applied`, `leave_address`, `type_leave`, `days_left`, `attach_cert`, `salary_paid`, `application_date`, `leave_start_date`, `leave_end_date`, `approved`, `approved_by`, `date_approved`, `approve_ip_address`) VALUES
(1, '123', 1, 'Mutare', 'Vacation Leave', 3, 'NO', 'NO', '09-09-20', '11-09-20', '12-09-20', 3, 'admin', '20-09-09', '::1'),
(2, '123', 1, '8 Dunmore Queensdale Harere', 'Vacation Leave', 4, 'NO', 'NO', '09-09-20', '09-12-20', '10-12-20', 3, 'admin', '20-09-09', '::1'),
(3, '123', 1, '11 Bideford Chadcombe Harare', 'Vacation Leave', 3, 'NO', 'NO', '14-09-20', '14-10-20', '15-10-20', 3, 'admin', '20-09-14', '::1'),
(4, '123', 1, '11 Bideford Chadcombe Harare', 'Vacation Leave', 4, 'NO', 'NO', '09-09-20', '31-09-20', '02-10-20', 3, 'admin', '20-09-14', '::1'),
(5, '123', 1, '1234 sunningdale 2 harare', 'Vacation Leave', 1, 'NO', 'NO', '14-09-20', '20-12-20', '21-12-20', 3, 'admin', '20-09-14', '::1'),
(6, '123', 1, '8 Dunmore Queensdale Harere', 'Vacation Leave', 3, 'NO', 'NO', '14-09-20', '14-10-20', '15-10-20', 3, 'admin', '20-09-14', '::1'),
(7, '123', 1, 'test', 'Vacation Leave', 2, 'NO', 'NO', '14-09-20', '14-11-20', '15-11-20', 3, 'admin', '20-09-14', '::1'),
(8, '123', 1, 'test', 'Vacation Leave', 1, 'NO', 'NO', '14-09-20', '18-09-20', '19-09-20', 3, 'admin', '20-09-14', '::1'),
(9, '123', 1, '8 Dunmore Queensdale Harere', 'Vacation Leave', 3, 'NO', 'NO', '14-09-20', '24-09-20', '25-09-20', 3, 'admin', '20-09-14', '::1'),
(10, '123', 1, 'test', 'Vacation Leave', 2, 'NO', 'NO', '14-09-20', '17-09-20', '18-09-20', 3, 'admin', '20-09-14', '::1'),
(11, '123', 2, 'test', 'Vacation Leave', 5, 'NO', 'NO', '14-09-20', '26-10-20', '28-10-20', 3, 'admin', '20-09-14', '::1'),
(12, '123', 1, 'test', 'Vacation Leave', 3, 'NO', 'NO', '14-09-20', '18-09-20', '19-09-20', 3, 'admin', '20-09-14', '::1'),
(13, '123', 1, '11 Bideford Chadcombe Harare', 'Vacation Leave', 2, 'NO', 'NO', '16-09-20', '18-09-20', '19-09-20', 3, 'admin', '20-09-16', '::1'),
(14, '123456789', 2, '11 bideford chadcombe', 'Vacation Leave', 5, 'NO', 'NO', '06-10-20', '08-10-20', '10-10-20', 3, 'admin', '20-10-06', '::1'),
(15, '1212', 1, 'glen view 1', 'Vacation Leave', 3, 'NO', 'NO', '24-09-20', '26-09-20', '27-09-20', 3, 'admin', '20-10-06', '::1'),
(16, '123456789', 2, '11 bideford chadcombe', 'Vacation Leave', 6, 'NO', 'NO', '06-10-20', '10-10-20', '12-10-20', 3, 'admin', '20-10-06', '::1'),
(17, '123456789', 3, 'south africa', 'Vacation Leave', 4, 'NO', 'NO', '06-10-20', '06-11-20', '09-11-20', 3, 'admin', '20-10-06', '::1'),
(18, '123456789', 2, '11 bideford chadcombe', 'Vacation Leave', 3, 'NO', 'NO', '07-10-20', '07-12-20', '09-12-20', 3, 'admin', '20-10-07', '::1'),
(19, '2000', 1, 'Mutare', 'Vacation Leave', 3, 'NO', 'NO', '20-10-20', '31-10-20', '01-11-20', 3, 'admin', '20-10-20', '::1'),
(20, '2000', 1, 'south africa', 'Vacation Leave', 2, 'NO', 'NO', '20-10-20', '22-11-20', '23-11-20', 3, 'admin', '20-10-20', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) unsigned DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'SystemGroup', 1, '', 1, 2),
(2, NULL, 'SystemGroup', 2, '', 3, 4),
(3, NULL, 'SystemGroup', 3, '', 5, 6),
(4, NULL, 'SystemGroup', 4, '', 7, 8),
(5, NULL, 'SystemGroup', 5, '', 9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) unsigned NOT NULL,
  `aco_id` int(10) unsigned NOT NULL,
  `_create` char(2) NOT NULL DEFAULT '0',
  `_read` char(2) NOT NULL DEFAULT '0',
  `_update` char(2) NOT NULL DEFAULT '0',
  `_delete` char(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ec_number` varchar(40) NOT NULL,
  `pick_time` varchar(40) NOT NULL,
  `pick_date` varchar(40) NOT NULL,
  `pick_venue` varchar(200) NOT NULL,
  `route` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `ec_number`, `pick_time`, `pick_date`, `pick_venue`, `route`) VALUES
(15, '1', '7am', '26-08-20', 'chadcombe', ''),
(16, '22', '7am', '16-09-20', 'chitungwiza', ''),
(17, '123', '7am', '24-09-20', 'Westgate', ''),
(18, '1954', '7am', '25-09-20', 'chadcombe', 'CHIREMBA ROAD'),
(19, '1954', '7am', '28-09-20', 'queensdale', 'CHIREMBA ROAD'),
(20, '1954', '7am', '26-09-20', 'bindura', 'CHIREMBA ROAD'),
(21, '123456789', '7am', '07-10-20', 'Westgate', 'CHIREMBA ROAD'),
(22, '1234', '7am', '08-10-20', 'chadcombe', 'CHIREMBA ROAD');

-- --------------------------------------------------------

--
-- Table structure for table `checkin_out_logs`
--

CREATE TABLE IF NOT EXISTS `checkin_out_logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `entry_point_id` int(11) NOT NULL,
  `ecnumber` varchar(30) NOT NULL,
  `time_in` time NOT NULL,
  `date_in` varchar(100) NOT NULL,
  `checkin_user` varchar(100) NOT NULL,
  `time_out` time DEFAULT NULL,
  `date_out` varchar(100) NOT NULL,
  `check_in` int(5) NOT NULL DEFAULT '0',
  `checkout_user` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `checkout_ip_address` varchar(30) NOT NULL,
  `checkin_ip_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `checkin_out_logs`
--

INSERT INTO `checkin_out_logs` (`id`, `entry_point_id`, `ecnumber`, `time_in`, `date_in`, `checkin_user`, `time_out`, `date_out`, `check_in`, `checkout_user`, `created`, `checkout_ip_address`, `checkin_ip_address`) VALUES
(1, 1, '2', '11:14:00', '18-10-23', 'admin', '16:14:00', '18-10-24', 0, 'admin', '2018-10-24 11:14:09', '10.50.219.99', '10.50.219.99'),
(2, 1, '2', '11:15:07', '18-10-24', 'admin', '11:31:25', '18-10-24', 0, 'admin', '2018-10-24 11:15:07', '10.50.219.99', '10.50.219.99'),
(3, 1, '2', '07:32:00', '18-10-22', 'admin', '15:41:00', '18-10-24', 0, 'admin', '2018-10-24 11:32:02', '10.50.101.67', '10.50.219.99'),
(4, 1, '2', '16:35:02', '18-10-30', 'admin', '12:41:43', '18-11-05', 0, 'admin', '2018-10-30 16:35:02', '10.50.219.96', '10.50.219.99'),
(5, 1, '2', '12:41:49', '18-11-05', 'admin', '12:41:53', '18-11-05', 0, 'admin', '2018-11-05 12:41:49', '10.50.219.96', '10.50.219.96'),
(6, 1, '2', '12:42:28', '18-11-05', 'admin', '12:42:55', '18-11-05', 0, 'admin', '2018-11-05 12:42:28', '10.50.219.96', '10.50.219.96'),
(7, 1, '2', '12:43:20', '18-11-05', 'admin', '12:43:32', '18-11-05', 0, 'admin', '2018-11-05 12:43:20', '10.50.219.96', '10.50.219.96'),
(8, 1, '2', '12:44:01', '18-11-05', 'admin', '12:44:04', '18-11-05', 0, 'admin', '2018-11-05 12:44:01', '10.50.219.96', '10.50.219.96'),
(9, 1, '2', '09:15:21', '18-11-06', 'tmutero', '09:28:18', '18-11-06', 0, 'tmutero', '2018-11-06 09:15:21', '10.50.219.96', '10.50.219.96'),
(10, 1, '2', '09:28:24', '18-11-06', 'tmutero', '09:28:29', '18-11-06', 0, 'tmutero', '2018-11-06 09:28:24', '10.50.219.96', '10.50.219.96'),
(11, 1, '2', '09:28:50', '18-11-06', 'tmutero', '09:29:03', '18-11-06', 0, 'tmutero', '2018-11-06 09:28:50', '10.50.219.96', '10.50.219.96'),
(12, 1, '2', '09:29:11', '18-11-06', 'tmutero', '09:42:21', '18-11-06', 0, 'tmutero', '2018-11-06 09:29:11', '10.50.219.96', '10.50.219.96'),
(13, 1, '2', '09:43:09', '18-11-06', 'tmutero', '09:43:40', '18-11-06', 0, 'tmutero', '2018-11-06 09:43:09', '10.50.219.96', '10.50.219.96'),
(14, 1, '2', '15:06:45', '18-11-06', 'tmutero', '16:35:45', '18-11-06', 0, 'tmutero', '2018-11-06 15:06:45', '10.50.219.96', '10.50.219.96'),
(15, 1, '9509992', '17:22:03', '18-11-19', 'tmutero', '17:22:17', '18-11-19', 0, 'tmutero', '2018-11-19 17:22:03', '10.50.219.96', '10.50.219.96'),
(16, 1, '2', '10:29:20', '18-11-20', 'tmutero', '13:55:47', '19-04-09', 0, 'tmutero', '2018-11-20 10:29:20', '10.50.219.90', '10.50.219.96'),
(17, 1, '9509992', '10:50:47', '18-11-20', 'tmutero', '10:52:18', '18-11-20', 0, 'tmutero', '2018-11-20 10:50:47', '10.50.219.96', '10.50.219.96'),
(18, 1, '2', '13:55:53', '19-04-09', 'tmutero', '00:00:00', '0', 1, '0', '2019-04-09 13:55:53', '', '10.50.219.90');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `faculty_code` varchar(255) NOT NULL,
  `employee_turnover` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `code`, `name`, `faculty_code`, `employee_turnover`) VALUES
(1, 'ICT', 'INFORMATION TECHNOLOGY', 'K', 0),
(2, 'MKT', 'MARKETING', 'test', 34),
(3, 'NEWS', 'NEWS', 'test', 100),
(4, 'RADIO', 'RADIO', 'test', 0),
(5, 'DBMGT', 'DIGITAL MEDIA AND TECHNOLOGY', 'test', 0),
(6, 'TV', 'TV', 'TV', 100);

-- --------------------------------------------------------

--
-- Table structure for table `leave_applications`
--

CREATE TABLE IF NOT EXISTS `leave_applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ec_number` varchar(50) NOT NULL,
  `days_applied` int(11) NOT NULL,
  `leave_address` text NOT NULL,
  `type_leave` varchar(50) NOT NULL,
  `leave_reason` text NOT NULL,
  `days_left` int(11) NOT NULL,
  `attach_cert` varchar(5) NOT NULL,
  `salary_paid` varchar(5) NOT NULL,
  `encashed` int(11) DEFAULT '0',
  `application_date` varchar(50) NOT NULL,
  `leave_start_date` varchar(50) NOT NULL,
  `leave_end_date` varchar(50) NOT NULL,
  `approved` int(11) NOT NULL DEFAULT '0',
  `approved_by` varchar(100) NOT NULL,
  `date_approved` varchar(100) NOT NULL,
  `approve_ip_address` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `leave_applications`
--

INSERT INTO `leave_applications` (`id`, `ec_number`, `days_applied`, `leave_address`, `type_leave`, `leave_reason`, `days_left`, `attach_cert`, `salary_paid`, `encashed`, `application_date`, `leave_start_date`, `leave_end_date`, `approved`, `approved_by`, `date_approved`, `approve_ip_address`) VALUES
(2, '123456789', 2, '11 bideford chadcombe', 'Vacation Leave', '', 3, 'NO', 'NO', NULL, '07-10-20', '28-12-20', '30-12-20', 1, 'itsamba', '20-10-07', '::1'),
(4, '2000', 2, 'Bindura', 'Vacation Leave', 'test me', 3, 'NO', 'NO', 2, '20-10-20', '20-12-20', '22-12-20', 1, 'itsamba', '20-10-20', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `leave_days_stats`
--

CREATE TABLE IF NOT EXISTS `leave_days_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ec_number` varchar(250) NOT NULL,
  `accruals_days` varchar(11) NOT NULL,
  `days_left` varchar(11) NOT NULL,
  `days_taken` varchar(11) NOT NULL,
  `acrual_month` varchar(10) NOT NULL,
  `month_accrual` varchar(20) NOT NULL,
  `month_balance` varchar(20) NOT NULL,
  `month_taken` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `leave_days_stats`
--

INSERT INTO `leave_days_stats` (`id`, `ec_number`, `accruals_days`, `days_left`, `days_taken`, `acrual_month`, `month_accrual`, `month_balance`, `month_taken`) VALUES
(1, '12345', '10', '10', '0', '02', '', '', ''),
(2, '4', '12.5', '12.5', '0', '02', '', '', ''),
(3, '123', '22', '8', '14', '02', '', '', ''),
(4, '22', '10', '10', '0', '02', '', '', ''),
(5, '1988', '10', '10', '0', '02', '', '', ''),
(6, '1212', '10', '9', '1', '02', '', '', ''),
(7, '123456789', '15', '6', '9', '02', '', '', ''),
(8, '1234', '7.5', '7.5', '0', '02', '', '', ''),
(9, '2000', '7.5', '5.5', '2', '02', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_taken_days`
--

CREATE TABLE IF NOT EXISTS `monthly_taken_days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ec_number` varchar(20) NOT NULL,
  `days_taken` varchar(20) NOT NULL,
  `balance_days` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `monthly_taken_days`
--

INSERT INTO `monthly_taken_days` (`id`, `ec_number`, `days_taken`, `balance_days`, `month`) VALUES
(1, '2000', '1', '2', '9'),
(2, '123', '4', '24', '2'),
(4, '123', '1', '3', '8'),
(5, '123', '5', '0.5', '9'),
(6, '123456789', '2', '3', '9'),
(7, '1212', '1', '4', '10'),
(8, '123456789', '7', '-1.5', '10'),
(9, '2000', '2', '0.5', '10');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE IF NOT EXISTS `routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `name`, `description`) VALUES
(1, 'CHITUNGWIZA', 'CHITUNGWIZA'),
(2, 'CHIREMBA ROAD', 'CHIREMBA ROAD'),
(3, 'GLEN VIEW', 'GLEN VIEW'),
(4, 'MUREHWA', 'MUREHWA');

-- --------------------------------------------------------

--
-- Table structure for table `staff_details`
--

CREATE TABLE IF NOT EXISTS `staff_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `title` varchar(10) NOT NULL,
  `ecnumber` varchar(250) DEFAULT NULL,
  `id_number` varchar(40) NOT NULL,
  `barcode` bigint(20) NOT NULL,
  `department_code` varchar(255) NOT NULL,
  `contact_address` varchar(255) NOT NULL,
  `mobile` int(20) NOT NULL,
  `work_phone` int(11) NOT NULL,
  `home_phone` int(11) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `designation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `staff_details`
--

INSERT INTO `staff_details` (`id`, `firstname`, `lastname`, `title`, `ecnumber`, `id_number`, `barcode`, `department_code`, `contact_address`, `mobile`, `work_phone`, `home_phone`, `email_address`, `designation`) VALUES
(8, 'taurai', 'mutero', 'Mr', '12345', '12345', 0, 'CC', 'TEST CONTACT', 465645645, 654645, 45645654, 'tmutero@compcentre.uz.ac.zw', 'Systems Analyst'),
(25, 'irvin', 'tsamba', 'Dr', '4', '4', 0, 'ICT', 'ZBC', 1232133, 0, 0, 'itsamba@zbc.co.zw', 'ICT Manager'),
(28, 'liam', 'mutero', 'Mr', '123', '123', 0, 'ICT', '', 78945252, 0, 0, 'liam.mutero@gmail.com', ''),
(29, 'sabastian', 'mukono', 'Mr', '22', '22', 0, 'MKT', '', 756565656, 0, 0, 'jose@zbc.co.zw', ''),
(30, 'violet', 'mutamba', 'Dr', '1988', '1954', 0, 'ICT', '', 784318572, 0, 0, 'tanaka@gmail.com', 'software developer'),
(32, 'edy', 'gosha', 'Mr', '1212', '1212', 0, 'ICT', '', 1212, 0, 0, 'edmore.gosha@zbc.co.zw', 'IT Chief Specialist'),
(33, 'kudzai', 'sadomba', 'Mr', '123456789', '123456789', 0, 'ICT', '', 43434343, 0, 0, 'taurai.mutero@zbc.co.zw', 'software developer'),
(34, 'michael', 'nyabani', 'Mr', '1234', '1234', 0, 'ICT', '', 86474663, 0, 0, 'test@xenon.co.zw', 'transport coordinator'),
(35, 'wadza', 'mutero', 'Mrs', '2000', '2000', 0, 'ICT', '', 2000, 0, 0, 'tauraitanaka@gmail.com', 'Network Admin');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE IF NOT EXISTS `student_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `title` varchar(5) NOT NULL,
  `home_address` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `programme` varchar(100) NOT NULL,
  `programme_code` varchar(100) NOT NULL,
  `department_code` varchar(100) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `from_date` varchar(50) NOT NULL,
  `to_date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `system_groups`
--

CREATE TABLE IF NOT EXISTS `system_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_type_name` varchar(200) NOT NULL,
  `internal_account` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `modified_by` varchar(100) NOT NULL,
  `create_ip` varchar(60) NOT NULL,
  `modify_ip` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_type_name` (`account_type_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `system_groups`
--

INSERT INTO `system_groups` (`id`, `account_type_name`, `internal_account`, `created`, `modified`, `created_by`, `modified_by`, `create_ip`, `modify_ip`) VALUES
(1, 'HR ADMIN', 0, NULL, NULL, '', '', '', ''),
(3, 'ORDINARY STAFF', 0, NULL, NULL, '', '', '', ''),
(5, 'DEPARTMENT SUPERVISOR', 0, NULL, NULL, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ecnumber` varchar(50) NOT NULL DEFAULT '0',
  `email_address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `account_status` tinyint(4) NOT NULL DEFAULT '0',
  `system_group_id` int(3) NOT NULL,
  `password_expiry_date` date NOT NULL,
  `expiry_warning_date` date NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `modified_by` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `create_ip` varchar(255) NOT NULL,
  `modify_ip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ecnumber` (`ecnumber`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ecnumber`, `email_address`, `password`, `account_status`, `system_group_id`, `password_expiry_date`, `expiry_warning_date`, `created_by`, `modified_by`, `created`, `modified`, `username`, `create_ip`, `modify_ip`) VALUES
(5, '9509992', 'tmutero@tutorials.co.zw', '50c52b3502b8577cc5520792043fd32cd239951a', 1, 1, '0000-00-00', '0000-00-00', '', '', '2017-05-04 10:55:04', '2018-03-08 14:45:00', 'admin', '', ''),
(108, '1954', 'tanaka@gmail.com', 'beb1b1a0e2a6b0937629aab298792ddf2683bcbf', 1, 3, '0000-00-00', '0000-00-00', '', '', '2020-09-23 11:08:39', '2020-09-23 11:08:39', 'vmutamba', '', ''),
(107, '22', 'jose@zbc.co.zw', '100ef4068b0c730bb44d02c8dad90417a53e3cb7', 1, 3, '0000-00-00', '0000-00-00', '', '', '2020-09-15 12:20:33', '2020-09-15 12:20:33', 'smukono', '', ''),
(106, '123', 'liam.mutero@gmail.com', 'a0fa9ab1d476c8d6d59362864668cb80559fd86e', 1, 3, '0000-00-00', '0000-00-00', '', '', '2020-09-09 10:10:03', '2020-09-09 10:10:03', 'lmutero', '', ''),
(109, '1212', 'edmore.gosha@zbc.co.zw', '28dceba31366cefdacdde128bb08e4d68c5432e2', 1, 3, '0000-00-00', '0000-00-00', '', '', '2020-09-24 10:10:27', '2020-09-24 10:10:27', 'egosha', '', ''),
(105, '12', 'chiedza@gmail.com', '2014e307ee8172d6ac69f86fd68e545e531eb72c', 1, 3, '0000-00-00', '0000-00-00', '', '', '2020-09-09 09:26:05', '2020-09-09 09:26:05', 'cjaison', '', ''),
(103, '4', 'itsamba@zbc.co.zw', '96216d25b65cd24bc1aa33402a2043f65ba36104', 1, 5, '0000-00-00', '0000-00-00', '', '', '2020-09-03 09:08:12', '2020-09-03 09:08:12', 'itsamba', '', ''),
(110, '123456789', 'tauraitanaka@gmail.com', 'ec44e936b55dc4fafec2146308f58a0c4d8863a4', 1, 3, '0000-00-00', '0000-00-00', '', '', '2020-10-06 10:59:28', '2020-10-06 10:59:28', 'ksadomba', '', ''),
(111, '1234', 'test@xenon.co.zw', 'fe11f77ec186bd296e84da30aa6b55040bf6b182', 1, 3, '0000-00-00', '0000-00-00', '', '', '2020-10-07 17:22:39', '2020-10-07 17:22:39', 'mnyabani', '', ''),
(112, '2000', 'tauraitanaka@gmail.com', '1f7c20cce56cf0aeacabe01b9046f9b207fd386b', 1, 3, '0000-00-00', '0000-00-00', '', '', '2020-10-20 11:30:11', '2020-10-20 11:30:11', 'wmutero', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
