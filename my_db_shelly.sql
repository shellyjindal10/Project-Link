-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2014 at 07:04 AM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_db_shelly`
--

-- --------------------------------------------------------

--
-- Table structure for table `jinshelly_signup`
--

CREATE TABLE IF NOT EXISTS `jinshelly_signup` (
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Birthday_Date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `sexuilty` varchar(10) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `zipcode` varchar(20) DEFAULT NULL,
  `job_title` varchar(200) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `summary` varchar(300) DEFAULT NULL,
  `experience` varchar(300) DEFAULT NULL,
  `education` varchar(300) DEFAULT NULL,
  `display_image` varchar(30) DEFAULT NULL,
  `Mail_sendTo` varchar(50) DEFAULT NULL,
  `Mail_message` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jinshelly_signup`
--

INSERT INTO `jinshelly_signup` (`FirstName`, `LastName`, `Email`, `Password`, `Birthday_Date`, `sexuilty`, `country`, `zipcode`, `job_title`, `company_name`, `summary`, `experience`, `education`, `display_image`, `Mail_sendTo`, `Mail_message`) VALUES
('Shelly', 'Jindal', 'jinshelly@gmail.com', 'mydreamparis', '2014-08-12 19:50:55.590262', 'female', 'USA', '56003', 'Senior Software Engineer', 'Arvind Internet', 'I am keen learner about the new technology and my objective is to gain more knowledge \r\n	  				about the best technology to keep with with the rapid changing technology trend. I pride myself in being a hardworker and a \r\n	  				results-oriented person.', 'My work at Arvind was Senior Developer, involving in active participation in design\r\n                     of web application both frontend as well as backend.', 'Hemwati Nandan Bahuguna Garhwal University B.tech, Computer Science', 'jinshelly@gmail.com.jpg', NULL, NULL),
('Sudip ', 'Gautam', 'gautam.sudeep@gmail.com', 'limewire', '2014-08-12 19:50:55.593262', 'female', 'USA', NULL, 'Technical Architect', 'Yahoo', 'Worked in Core Linux skills. Performance improvement of system & monitoring.Specialties:Core Linux knowledge ,\r\n      				 Networking , Scripting in Perl, bash.Apache webserver, Mysql DB management. Worked on : Javascript, PHP, HTML, CSS', 'Working on deployment, development and Monitoring platform of Yahoo! System.', 'Indian Institute Of Information Technology', 'gautam.sudeep@gmail.com.jpg', NULL, NULL),
('savita', 'yhhh', 'savita@gmail.com', 'winner37', '2014-08-08 04:33:51.205800', 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'savita@gmail.com.jpg', NULL, NULL),
('sudip', 'bindra', 'sudip.bindra@gmail.com', 'winner37', '2014-08-12 21:46:14.547003', 'male', NULL, NULL, NULL, 'Amazon', NULL, NULL, NULL, 'sudip.bindra@gmail.com.jpg', NULL, NULL),
('sudip', 'Mishra', 'sudip.mishra@gmail.com', '2002084', '2014-08-12 21:43:36.280951', 'male', NULL, NULL, 'Senior Software Engineer', NULL, NULL, NULL, NULL, 'sudip.mishra@gmail.com.jpg', NULL, NULL),
('shakela', 'jingal', 'sakila@gmail.com', 'winner37', '2014-08-25 01:04:30.209153', 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sakila@gmail.com.jpg', NULL, NULL),
('geetika ', 'kohli', 'geetika@gmail.com', 'winner37', '2014-08-25 01:07:11.275366', 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'geetika@gmail.com.jpg', NULL, NULL),
('namita', 'bandari', 'namita@gmail.com', 'winner37', '2014-08-25 01:02:08.400042', 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'namita@gmail.com.jpg', NULL, NULL),
('sachin', 'jindal', 'sachin@gmail.com', 'winner37', '2014-08-25 01:03:04.975278', 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sachin@gmail.com.jpg', NULL, NULL),
('vishesh', 'chadha', 'vishesh@gmail.com', 'winner37', '2014-08-25 01:05:15.041718', 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vishesh@gmail.com.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_information`
--

CREATE TABLE IF NOT EXISTS `login_information` (
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_information`
--

INSERT INTO `login_information` (`Username`, `Password`) VALUES
('jinshelly@gmail.com', 'winner37'),
('gautam.sudeep@gmail.com', 'limewire'),
('savita@gmail.com', 'winner37'),
('sudip.mishra@gmail.com', '2002084'),
('sudip.bindra@gmail.com', 'winner37'),
('namita@gmail.com', 'winner37'),
('sachin@gmail.com', 'winner37'),
('sakila@gmail.com', 'winner37'),
('vishesh@gmail.com', 'winner37'),
('geetika@gmail.com', 'winner37');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `Message_id` varchar(100) NOT NULL,
  `Sender_Email_Id` varchar(100) NOT NULL,
  `Sender_subject` varchar(100) DEFAULT NULL,
  `MessageToMailId` text,
  `ReplyToMailId` text,
  `messageInInbox` text,
  PRIMARY KEY (`Message_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`Message_id`, `Sender_Email_Id`, `Sender_subject`, `MessageToMailId`, `ReplyToMailId`, `messageInInbox`) VALUES
('sudip.mishra11685', 'jinshelly@gmail.com', '9', 'sudip.mishra@gmail.com', NULL, '		                               		9		                               		'),
('gautam.sudeep12621', 'jinshelly@gmail.com', 'hey ', 'gautam.sudeep@gmail.com', NULL, 'hey'),
('sudip.mishra8092', 'jinshelly@gmail.com', '9', 'sudip.mishra@gmail.com', NULL, '		                               		9		                               		'),
('jinshelly29264', 'gautam.sudeep@gmail.com', '4', 'jinshelly@gmail.com', NULL, '4'),
('jinshelly15433', 'gautam.sudeep@gmail.com', '5', 'jinshelly@gmail.com', NULL, '5'),
('jinshelly12307', 'gautam.sudeep@gmail.com', '3', 'jinshelly@gmail.com', NULL, '3'),
('jinshelly13431', 'gautam.sudeep@gmail.com', '2', 'jinshelly@gmail.com', NULL, '2'),
('jinshelly18660', 'gautam.sudeep@gmail.com', '2', 'jinshelly@gmail.com', NULL, '2'),
('jinshelly5750', 'gautam.sudeep@gmail.com', '1', 'jinshelly@gmail.com', NULL, '1'),
('gautam.sudeep21263', 'jinshelly@gmail.com', '10', 'gautam.sudeep@gmail.com', NULL, '10'),
('gautam.sudeep22845', 'jinshelly@gmail.com', 'subject1', 'gautam.sudeep@gmail.com', NULL, '1'),
('gautam.sudeep17714', 'jinshelly@gmail.com', '2', 'gautam.sudeep@gmail.com', NULL, '2'),
('gautam.sudeep25219', 'jinshelly@gmail.com', '3', 'gautam.sudeep@gmail.com', NULL, '3'),
('gautam.sudeep3072', 'jinshelly@gmail.com', '3', 'gautam.sudeep@gmail.com', NULL, '3'),
('gautam.sudeep11757', 'jinshelly@gmail.com', '4', 'gautam.sudeep@gmail.com', NULL, '4'),
('gautam.sudeep29730', 'jinshelly@gmail.com', '5', 'gautam.sudeep@gmail.com', NULL, '5'),
('gautam.sudeep32435', 'jinshelly@gmail.com', '6', 'gautam.sudeep@gmail.com', NULL, '6'),
('gautam.sudeep11376', 'jinshelly@gmail.com', '7', 'gautam.sudeep@gmail.com', NULL, '7'),
('gautam.sudeep15337', 'jinshelly@gmail.com', '8', 'gautam.sudeep@gmail.com', NULL, '8'),
('gautam.sudeep12398', 'jinshelly@gmail.com', '9', 'gautam.sudeep@gmail.com', NULL, '9'),
('gautam.sudeep25978', 'jinshelly@gmail.com', 'RE: 9', 'gautam.sudeep@gmail.com', NULL, 'hey ');

-- --------------------------------------------------------

--
-- Table structure for table `people_information`
--

CREATE TABLE IF NOT EXISTS `people_information` (
  `Name` varchar(50) DEFAULT NULL,
  `Email_Id` varchar(100) NOT NULL,
  `Phone_Number` varchar(20) DEFAULT NULL,
  `Event_Date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `Event_Name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people_information`
--

INSERT INTO `people_information` (`Name`, `Email_Id`, `Phone_Number`, `Event_Date`, `Event_Name`) VALUES
('Shelly Jindal', 'jinshelly@gmail.com', '9739026777', '2012-11-12 08:00:00.000000', 'Birthday'),
('Shelly Jindal', 'SHELLY@GMAIL.COM', '9739026777', '2012-11-12 08:00:00.000000', 'Birthday'),
('Shelly Jindal', 'shelly', 'uuuu', '0000-00-00 00:00:00.000000', '7777'),
('567777', 'jjjj', '8999', '0000-00-00 00:00:00.000000', 'thhh'),
('Shelly Jindal', 'theh', 'thehh', '0000-00-00 00:00:00.000000', 'thehhe'),
('Shelly Jindal', 'jinshelly08@gmail.com', '9739026777', '2012-11-12 08:00:00.000000', 'Birthday');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE IF NOT EXISTS `receipt` (
  `Email` varchar(100) NOT NULL,
  `Message_id` varchar(100) NOT NULL,
  PRIMARY KEY (`Message_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`Email`, `Message_id`) VALUES
('gautam.sudeep@gmail.com', 'gautam.sudeep3916'),
('savita@gmail.com', 'savita23445'),
('savita@gmail.com', 'savita7260'),
('savita@gmail.com', 'savita385'),
('savita@gmail.com', 'savita29914'),
('savita@gmail.com', 'savita18469'),
('savita@gmail.com', 'savita5290'),
('savita@gmail.com', 'savita23819'),
('savita@gmail.com', 'savita10216'),
('savita@gmail.com', 'savita8742'),
('savita@gmail.com', 'savita20071'),
('savita@gmail.com', 'savita11770'),
('savita@gmail.com', 'savita28587'),
('savita@gmail.com', 'savita18587'),
('savita@gmail.com', 'savita22024'),
('savita@gmail.com', 'savita16801'),
('savita@gmail.com', 'savita12230'),
('savita@gmail.com', 'savita21560'),
('savita@gmail.com', 'savita7185'),
('savita@gmail.com', 'savita23431'),
('savita@gmail.com', 'savita19301'),
('savita@gmail.com', 'savita29716'),
('savita@gmail.com', 'savita20854'),
('savita@gmail.com', 'savita13501'),
('savita@gmail.com', 'savita15026'),
('savita@gmail.com', 'savita27139'),
('gautam.sudeep@gmail.com', 'gautam.sudeep30154'),
('jinshelly@gmail.com', 'jinshelly15744'),
('sudip.mishra@gmail.com', 'sudip.mishra25403'),
('gautam.sudeep@gmail.com', 'gautam.sudeep4154'),
('gautam.sudeep@gmail.com', 'gautam.sudeep31716'),
('gautam.sudeep@gmail.com', 'gautam.sudeep17643'),
('jinshelly@gmail.com', 'jinshelly26701'),
('jinshelly@gmail.com', 'jinshelly3842'),
('jinshelly@gmail.com', 'jinshelly24505'),
('jinshelly@gmail.com', 'jinshelly20478'),
('jinshelly@gmail.com', 'jinshelly27224'),
('jinshelly@gmail.com', 'jinshelly9055'),
('jinshelly@gmail.com', 'jinshelly24065'),
('gautam.sudeep@gmail.com', 'gautam.sudeep1190'),
('jinshelly@gmail.com', 'jinshelly16103'),
('jinshelly@gmail.com', 'jinshelly23188'),
('gautam.sudeep@gmail.com', 'gautam.sudeep18353'),
('gautam.sudeep@gmail.com', 'gautam.sudeep9366'),
('gautam.sudeep@gmail.com', 'gautam.sudeep19124'),
('gautam.sudeep@gmail.com', 'gautam.sudeep22237'),
('gautam.sudeep@gmail.com', 'gautam.sudeep594'),
('gautam.sudeep@gmail.com', 'gautam.sudeep10531'),
('gautam.sudeep@gmail.com', 'gautam.sudeep24096'),
('gautam.sudeep@gmail.com', 'gautam.sudeep985'),
('savita@gmail.com', 'savita29086'),
('savita@gmail.com', 'savita13439'),
('savita@gmail.com', 'savita15436'),
('savita@gmail.com', 'savita1173'),
('savita@gmail.com', 'savita2474'),
('savita@gmail.com', 'savita6555'),
('savita@gmail.com', 'savita30743'),
('savita@gmail.com', 'savita20792'),
('gautam.sudeep@gmail.com', 'gautam.sudeep12716'),
('gautam.sudeep@gmail.com', 'gautam.sudeep21508'),
('gautam.sudeep@gmail.com', 'gautam.sudeep15989'),
('gautam.sudeep@gmail.com', 'gautam.sudeep28170'),
('gautam.sudeep@gmail.com', 'gautam.sudeep21777'),
('gautam.sudeep@gmail.com', 'gautam.sudeep22845'),
('gautam.sudeep@gmail.com', 'gautam.sudeep17714'),
('gautam.sudeep@gmail.com', 'gautam.sudeep25219'),
('gautam.sudeep@gmail.com', 'gautam.sudeep3072'),
('gautam.sudeep@gmail.com', 'gautam.sudeep11757'),
('gautam.sudeep@gmail.com', 'gautam.sudeep29730'),
('gautam.sudeep@gmail.com', 'gautam.sudeep32435'),
('gautam.sudeep@gmail.com', 'gautam.sudeep11376'),
('gautam.sudeep@gmail.com', 'gautam.sudeep15337'),
('gautam.sudeep@gmail.com', 'gautam.sudeep12398'),
('gautam.sudeep@gmail.com', 'gautam.sudeep21263'),
('jinshelly@gmail.com', 'jinshelly5750'),
('jinshelly@gmail.com', 'jinshelly13431'),
('jinshelly@gmail.com', 'jinshelly18660'),
('jinshelly@gmail.com', 'jinshelly12307'),
('jinshelly@gmail.com', 'jinshelly29264'),
('jinshelly@gmail.com', 'jinshelly15433'),
('gautam.sudeep@gmail.com', 'gautam.sudeep12621'),
('sudip.mishra@gmail.com', 'sudip.mishra8092'),
('sudip.mishra@gmail.com', 'sudip.mishra11685'),
('gautam.sudeep@gmail.com', 'gautam.sudeep25978');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
