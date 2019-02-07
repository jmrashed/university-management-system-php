-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2016 at 09:06 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xyuniversity`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phone`, `datetime`) VALUES
(1, 'Admin', 'admin@admin.com', '123', '01910077628', '2016-07-24 11:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `classname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `classname`) VALUES
(1, 'CSE-62'),
(2, 'CSE-60'),
(3, 'CSE-61'),
(4, 'BBA-62'),
(5, 'EEE-60'),
(6, 'CSE-58');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'English Literature'),
(2, 'Computer Science & Engineering'),
(3, 'Business Administration'),
(4, 'Law'),
(5, 'Pharmacy'),
(6, 'Microbiology'),
(7, 'Environmental Science'),
(8, 'Civil Engineering'),
(9, 'Electrical & Electronic Engineering'),
(10, 'Architecture'),
(11, 'Film and Media Studies'),
(12, 'Journalism & Media Studies'),
(13, 'Public Administration'),
(14, 'Economics');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `examname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `examname`) VALUES
(1, 'CT1'),
(2, 'CT2'),
(3, 'CT3'),
(4, 'CT4'),
(5, 'Mid'),
(6, 'Final'),
(7, 'Assignment 01'),
(8, 'Assignment 02'),
(10, 'Attendance');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `id` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `exam` varchar(200) NOT NULL,
  `class` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `mark` float NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`id`, `studentid`, `exam`, `class`, `subject`, `mark`, `datetime`) VALUES
(1, 1, 'Mid', 'CSE-62', 'Computer Concept', 12, '2016-08-17 17:36:28'),
(2, 1, 'CT1', 'CSE-62', 'English', 12, '2016-08-17 17:36:54'),
(3, 1, 'Mid', 'CSE-62', 'Computer Concept', 20, '2016-08-19 23:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `senderid` int(11) NOT NULL,
  `receiverid` int(11) NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `isread` int(11) NOT NULL,
  `receivertype` varchar(200) NOT NULL,
  `sendertype` varchar(200) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `senderid`, `receiverid`, `title`, `message`, `isread`, `receivertype`, `sendertype`, `datetime`) VALUES
(1, 1, 1, 'Hi', 'Thius is a message', 0, 'student', '', '2016-08-17 10:25:22'),
(2, 1, 1, 'Participate in Workshop on Health Data Analytics at BUET', 'Fe3+Cl=FeCl3Fe3+Cl=FeCl3Fe3+Cl=FeCl3', 0, 'teacher', '', '2016-08-17 18:14:52'),
(3, 1, 1, 'Please meet ith me', 'It is Ugnt Meeting !!', 0, 'teacher', '', '2016-08-17 18:17:57'),
(4, 1, 1, 'Participate in Workshop on Health Data Analytics at BUET', 'hi , i am here !!', 0, 'teacher', '', '2016-08-17 18:22:14'),
(5, 1, 1, 'Participate in Workshop on Health Data Analytics at BUET', 'hi , i am here !!', 0, '', '', '2016-08-17 18:24:22'),
(6, 1, 1, 'I want to meet ith u', 'Thanjks', 0, 'admin', '', '2016-08-17 18:26:22'),
(7, 1, 1, 'I want to meet ith u', 'Thanjks', 0, 'admin', '', '2016-08-17 18:28:09'),
(8, 6, 1, 'teacher message', 'teacher test message', 0, 'teacher', 'student', '2016-08-23 23:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `mst_admin`
--

CREATE TABLE `mst_admin` (
  `id` int(11) NOT NULL,
  `loginid` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_admin`
--

INSERT INTO `mst_admin` (`id`, `loginid`, `pass`) VALUES
(1, 'jmrashed', 'jmrashed');

-- --------------------------------------------------------

--
-- Table structure for table `mst_question`
--

CREATE TABLE `mst_question` (
  `que_id` int(5) NOT NULL,
  `test_id` int(5) DEFAULT NULL,
  `que_desc` varchar(150) DEFAULT NULL,
  `ans1` varchar(75) DEFAULT NULL,
  `ans2` varchar(75) DEFAULT NULL,
  `ans3` varchar(75) DEFAULT NULL,
  `ans4` varchar(75) DEFAULT NULL,
  `true_ans` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_question`
--

INSERT INTO `mst_question` (`que_id`, `test_id`, `que_desc`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`) VALUES
(1, 5, 'edgtfsdg', 'fdg', 'fd', 'dfg', 'dfgd', 0),
(2, 5, 'dfgdfg', 'dfgdfg', 'dfgfd', 'dfg', 'dfgdf', 0),
(3, 5, 'dfgdfg', 'dfg', 'g', 'g', 'g', 0),
(4, 5, 'sfgsg', 'sgsg', 'sg', 'sgg', 'sg', 0),
(5, 5, 'fff', '1', '2', '3', '4', 1),
(6, 5, 'faf', '1', '2', '3', 'dfgd', 1),
(7, 5, 'popo', '1', '2', '3', '4', 1),
(8, 5, 'faf', 'af', 'af', 'af', 'af', 0),
(9, 6, 'gg', 'fdg', 'fd', '3', '4', 1),
(10, 8, 'ghhdh', 'dfg', '2', '3', '4', 1),
(11, 8, 'gfgsgsg', '1', '2', '3', '4', 1),
(12, 8, 'gfdgs', '1', '2', '3', '4', 1),
(13, 7, 'faf', 'afaf', 'af', '3', '4', 1),
(14, 7, 'af', '1', '2', '3', '4', 1),
(15, 7, 'af', '1', '2', '3', '4', 1),
(16, 10, 'When the C programming is coming? ', '1999', '1997', '1972', '1980', 1),
(17, 10, 'How many data type in C?', '1', '2', '3', '4', 4),
(18, 11, 'what ?', '1', '2', '3', '4', 1),
(19, 11, 'hat ???', '1', '2', '3', '4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_result`
--

CREATE TABLE `mst_result` (
  `id` int(11) NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  `test_id` int(5) DEFAULT NULL,
  `test_date` date DEFAULT NULL,
  `score` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_result`
--

INSERT INTO `mst_result` (`id`, `login`, `test_id`, `test_date`, `score`) VALUES
(1, '1', 1, '0000-00-00', 1),
(2, '', 1, '0000-00-00', 0),
(3, '1', 1, '0000-00-00', 0),
(4, '1', 1, '0000-00-00', 1),
(5, '1', 1, '0000-00-00', 2),
(6, '1', 1, '0000-00-00', 2),
(7, '1', 7, '0000-00-00', 3),
(8, '1', 7, '0000-00-00', 3),
(9, '1', 8, '0000-00-00', 2),
(10, '5', 7, '0000-00-00', 3),
(11, '5', 7, '0000-00-00', 4),
(12, '5', 7, '0000-00-00', 5),
(13, '5', 5, '0000-00-00', 0),
(14, '5', 5, '0000-00-00', 3),
(15, '5', 5, '0000-00-00', 3),
(16, '5', 5, '0000-00-00', 3),
(17, '6', 7, '0000-00-00', 3),
(18, '6', 5, '0000-00-00', 2),
(19, '6', 6, '0000-00-00', 1),
(20, '6', 11, '0000-00-00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mst_test`
--

CREATE TABLE `mst_test` (
  `test_id` int(5) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `sub` varchar(200) DEFAULT NULL,
  `test_name` varchar(30) DEFAULT NULL,
  `total_que` varchar(15) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_test`
--

INSERT INTO `mst_test` (`test_id`, `teacherid`, `sub`, `test_name`, `total_que`, `status`) VALUES
(5, 1, 'Structure of Programming Language', 'ct2', '4', 0),
(6, 1, 'Structure of Programming Language', 'ct3', '2', 0),
(7, 1, 'Structure of Programming Language', 'ct4', '2', 1),
(10, 1, 'Structure of Programming Language', 'ct1', '2', 1),
(11, 1, 'Structure of Programming Language', 'ct1', '3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_useranswer`
--

CREATE TABLE `mst_useranswer` (
  `sess_id` varchar(80) DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL,
  `que_des` varchar(200) DEFAULT NULL,
  `ans1` varchar(50) DEFAULT NULL,
  `ans2` varchar(50) DEFAULT NULL,
  `ans3` varchar(50) DEFAULT NULL,
  `ans4` varchar(50) DEFAULT NULL,
  `true_ans` int(11) DEFAULT NULL,
  `your_ans` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_useranswer`
--

INSERT INTO `mst_useranswer` (`sess_id`, `test_id`, `que_des`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`, `your_ans`) VALUES
('etc5ikrd7i7e420bs6r5np89k0', 1, 'is this test?', 'yes', 'no', 'both', 'all', 0, 1),
('etc5ikrd7i7e420bs6r5np89k0', 1, 'this is a tst?', '1', '2', '3', '4', 1, 1),
('etc5ikrd7i7e420bs6r5np89k0', 1, 'Test?', '1', '2', '3', '4', 1, 1),
('ilciu9ktdjt2786mbki8l3vu25', 8, 'ghhdh', 'dfg', '2', '3', '4', 1, 1),
('ilciu9ktdjt2786mbki8l3vu25', 8, 'gfgsgsg', '1', '2', '3', '4', 1, 1),
('ilciu9ktdjt2786mbki8l3vu25', 8, 'gfdgs', '1', '2', '3', '4', 1, 4),
('lbbsnjgp7tglj51klp8d2lgil0', 5, 'edgtfsdg', 'fdg', 'fd', 'dfg', 'dfgd', 0, 4),
('lbbsnjgp7tglj51klp8d2lgil0', 5, 'dfgdfg', 'dfgdfg', 'dfgfd', 'dfg', 'dfgdf', 0, 4),
('lbbsnjgp7tglj51klp8d2lgil0', 5, 'dfgdfg', 'dfg', 'g', 'g', 'g', 0, 1),
('lbbsnjgp7tglj51klp8d2lgil0', 5, 'sfgsg', 'sgsg', 'sg', 'sgg', 'sg', 0, 1),
('lbbsnjgp7tglj51klp8d2lgil0', 5, 'fff', '1', '2', '3', '4', 1, 1),
('lbbsnjgp7tglj51klp8d2lgil0', 5, 'faf', '1', '2', '3', 'dfgd', 1, 1),
('lbbsnjgp7tglj51klp8d2lgil0', 5, 'popo', '1', '2', '3', '4', 1, 1),
('lbbsnjgp7tglj51klp8d2lgil0', 5, 'faf', 'af', 'af', 'af', 'af', 0, 1),
('4bnatl2cqplv19jl356qtm8a77', 7, 'faf', 'afaf', 'af', '3', '4', 1, 1),
('4bnatl2cqplv19jl356qtm8a77', 7, 'af', '1', '2', '3', '4', 1, 1),
('4bnatl2cqplv19jl356qtm8a77', 7, 'af', '1', '2', '3', '4', 1, 1),
('p7ij07f7el8i3dp801sfgj1o71', 5, 'edgtfsdg', 'fdg', 'fd', 'dfg', 'dfgd', 0, 4),
('p7ij07f7el8i3dp801sfgj1o71', 5, 'dfgdfg', 'dfgdfg', 'dfgfd', 'dfg', 'dfgdf', 0, 4),
('p7ij07f7el8i3dp801sfgj1o71', 5, 'dfgdfg', 'dfg', 'g', 'g', 'g', 0, 3),
('p7ij07f7el8i3dp801sfgj1o71', 5, 'sfgsg', 'sgsg', 'sg', 'sgg', 'sg', 0, 3),
('p7ij07f7el8i3dp801sfgj1o71', 5, 'fff', '1', '2', '3', '4', 1, 2),
('p7ij07f7el8i3dp801sfgj1o71', 5, 'faf', '1', '2', '3', 'dfgd', 1, 1),
('p7ij07f7el8i3dp801sfgj1o71', 5, 'popo', '1', '2', '3', '4', 1, 1),
('p7ij07f7el8i3dp801sfgj1o71', 5, 'faf', 'af', 'af', 'af', 'af', 0, 2),
('6cnpst7pkhk33h0mdahnblgo33', 11, 'what ?', '1', '2', '3', '4', 1, 1),
('6cnpst7pkhk33h0mdahnblgo33', 11, 'hat ???', '1', '2', '3', '4', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` text NOT NULL,
  `notice` text NOT NULL,
  `creatortype` varchar(200) NOT NULL,
  `acesslabel` varchar(200) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `userid`, `title`, `notice`, `creatortype`, `acesslabel`, `datetime`) VALUES
(1, 1, 'Next Presentation date has been fixed', 'The Chairnman sir has been declared Next Presentation date has been fixed', '', 'teacher', '2016-08-22 17:52:25'),
(2, 6, 'Create a notice  by student', 'Create a notice test by student', '', 'admin', '2016-08-23 23:35:54'),
(3, 6, 'this is a t5est notice', 'this is a t5est notice body for student', 'student', 'student', '2016-08-23 23:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `onlinequestion`
--

CREATE TABLE `onlinequestion` (
  `id` int(11) NOT NULL,
  `onlinetest_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `choice1` text NOT NULL,
  `choice2` text NOT NULL,
  `choice3` text NOT NULL,
  `choice4` text NOT NULL,
  `correctans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onlinequestion`
--

INSERT INTO `onlinequestion` (`id`, `onlinetest_id`, `question`, `choice1`, `choice2`, `choice3`, `choice4`, `correctans`) VALUES
(1, 2, 'What is mithen gas?', 'CH4', 'H2O', 'H2SO4', 'C2', 'CH4'),
(2, 2, 'What is Water?', 'CH4', 'H2O', 'H2SO4', 'C2', 'H2O'),
(3, 2, 'Which is Anis  girlfriend? ', 'Katrina', 'Karina', 'Alia', 'Pori', 'Opu'),
(4, 3, 'What is mithen gas?', 'CH4', 'Karina', 'H2SO4', 'C2', 'Opu');

-- --------------------------------------------------------

--
-- Table structure for table `onlinetest`
--

CREATE TABLE `onlinetest` (
  `id` int(11) NOT NULL,
  `batch` varchar(200) NOT NULL,
  `course` varchar(200) NOT NULL,
  `testname` varchar(200) NOT NULL,
  `totalquestion` int(11) NOT NULL,
  `date` date NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onlinetest`
--

INSERT INTO `onlinetest` (`id`, `batch`, `course`, `testname`, `totalquestion`, `date`, `datetime`) VALUES
(2, 'CSE-60', 'Chemistry', 'ct1', 10, '2016-08-18', '2016-08-19 21:24:41'),
(3, 'CSE-60', 'Chemistry', 'ct1', 10, '2016-08-19', '2016-08-19 23:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `sub` varchar(200) NOT NULL,
  `ct1` float NOT NULL,
  `ct2` float NOT NULL,
  `ct3` float NOT NULL,
  `ct4` float NOT NULL,
  `mid` float NOT NULL,
  `final` float NOT NULL,
  `ass1` float NOT NULL,
  `ass2` float NOT NULL,
  `attendance` float NOT NULL,
  `total` float NOT NULL,
  `cgpa` float NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `sid`, `sub`, `ct1`, `ct2`, `ct3`, `ct4`, `mid`, `final`, `ass1`, `ass2`, `attendance`, `total`, `cgpa`, `datetime`) VALUES
(15, 1, 'Computer Concept', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2016-08-17 21:32:02'),
(24, 5, 'Computer Concept', 2, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, '2016-08-20 02:04:46'),
(25, 7, 'Structure of Programming Language', 2, 3, 10, 5, 20, 30, 10, 0, 10, 83, 4, '2016-08-20 02:04:46'),
(28, 6, 'Computer Concept', -1, -1, -1, -1, 0, 0, 0, 0, 0, 0, 0, '2016-08-20 02:49:06'),
(29, 6, 'Structure of Programming Language', 2, 2, 1, 3, 25, 25, 6, 7, 9, 71, 3.5, '2016-08-20 02:49:06'),
(30, 6, 'English', -1, -1, -1, -1, 0, 0, 0, 0, 0, 0, 0, '2016-08-20 02:49:06'),
(31, 6, 'Chemistry', 7, 6, 5, 4, 25, 10, 3, 4, 9, 60, 3, '2016-08-20 02:49:06'),
(32, 8, 'Computer Concept', -1, -1, -1, -1, 0, 0, 0, 0, 0, 0, 0, '2016-08-22 15:06:45'),
(33, 8, 'Structure of Programming Language', -1, -1, -1, -1, 0, 0, 0, 0, 0, 0, 0, '2016-08-22 15:06:45'),
(34, 8, 'English', -1, -1, -1, -1, 0, 0, 0, 0, 0, 0, 0, '2016-08-22 15:06:45'),
(35, 8, 'Chemistry', -1, -1, -1, -1, 0, 0, 0, 0, 0, 0, 0, '2016-08-22 15:06:45'),
(36, 10, 'OS', -1, -1, -1, -1, 0, 0, 0, 0, 0, 0, 0, '2016-09-07 00:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `degree` text NOT NULL,
  `designation` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `joindate` date NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `degree`, `designation`, `email`, `password`, `gender`, `joindate`, `address`, `phone`, `department`, `datetime`) VALUES
(1, 'Abul Hossain', 'B.Sc in EEE', 'Register', 'abul@gmail.com', '123', 'Male', '2016-09-01', 'Dhaka', '0178987243', 'CSE', '2016-08-16 05:14:14'),
(4, 'Jafor Khan', 'H.S.C', 'Security Guad', 'jafor@gmail.com', '123', 'male', '2016-09-03', 'Dhaka', '01910077111', 'Computer Science & Engineering', '2016-09-03 20:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `studentid` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `father` varchar(50) NOT NULL,
  `mother` varchar(50) NOT NULL,
  `parentphone` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `class` varchar(50) NOT NULL,
  `department` varchar(200) NOT NULL,
  `trimester` varchar(200) NOT NULL,
  `transport` varchar(200) NOT NULL,
  `joindate` date NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `studentid`, `name`, `email`, `password`, `phone`, `gender`, `father`, `mother`, `parentphone`, `address`, `class`, `department`, `trimester`, `transport`, `joindate`, `datetime`) VALUES
(1, 'CSE-0001', 'Abu Sofian', 'student@demo.com', '123456', '01722999000', 'male', 'Mr. ', 'Mrs. ', '01733999000', 'Dhaka.', 'CSE-62', 'Computer Science & Engineering', 'Fall', 'BUS', '2016-08-17', '2016-08-17 15:32:41'),
(2, 'CSE-0002', 'Md Rasheduzzaman', 'student1@demo.com', '123456', '01722999000', 'male', 'Mr. ', 'Mrs. ', '01733999000', 'Dhaka.', 'CSE-62', 'Computer Science & Engineering', 'Spring', 'BUS', '2016-08-23', '2016-08-20 02:00:43'),
(3, 'CSE-0003', 'Abdullah', 'student2@demo.com', '123456', '01722999000', 'male', 'Mr. ', 'Mrs. ', '01733999000', 'Dhaka.', 'CSE-62', 'Computer Science & Engineering', 'Fall', 'BUS', '2016-08-19', '2016-08-20 02:03:10'),
(6, 'CSE-0004', 'Micro Bus', 'b@demo.com', '123456', '01722999000', 'male', 'Mr. ', 'Mrs. ', '01733999000', 'Dhaka.', 'CSE-62', '', 'Summer', 'BUS', '2016-08-11', '2016-08-20 02:49:06'),
(7, 'CSE-0006', 'Pavel Mollah', 'pavel@demo.com', 'pavel', '01722999000', 'male', 'Mr. ', 'Mrs. ', '01733999000', 'Dhaka.', 'CSE-62', 'Computer Science & Engineering', 'Fall', 'BUS', '2016-08-22', '2016-08-22 14:54:47'),
(8, 'CSE-0007', 'Sakib Khan', 'student123@demo.com', '123456', '01722999000', 'male', 'Mr. ', 'Mrs. ', '01733999000', 'Dhaka.', 'CSE-60', 'Architecture', 'Fall', 'BUS', '0000-00-00', '2016-08-22 15:06:45'),
(9, 'CSE-0078', 'Ajad', 'ajad@demo.com', '123456', '01722999000', 'male', 'Mr. ', 'Mrs. ', '01733999000', 'Dhaka.', 'CSE-60', 'Computer Science & Engineering', 'Fall', 'BUS', '2016-09-07', '2016-09-07 00:40:12'),
(10, 'CSE-0056', 'Shafik', 'shafik@demo.com', '123456', '01722999000', 'male', 'Mr. ', 'Mrs. ', '01733999000', 'Dhaka.', 'CSE-58', 'Computer Science & Engineering', 'Fall', 'BUS', '2016-09-14', '2016-09-07 00:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `classname` varchar(200) NOT NULL,
  `subjectname` varchar(200) NOT NULL,
  `coursecode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `classname`, `subjectname`, `coursecode`) VALUES
(1, 'CSE-62', 'Computer Concept', 'CSE-121'),
(2, 'CSE-62', 'Structure of Programming Language', 'CSE-222'),
(3, 'CSE-62', 'English', 'CSI-333'),
(4, 'CSE-62', 'Chemistry', 'CHM-101'),
(5, 'CSE-60', 'Java', 'CSE-121'),
(6, 'CSE-58', 'OS', 'CSE-123');

-- --------------------------------------------------------

--
-- Table structure for table `systm`
--

CREATE TABLE `systm` (
  `id` int(11) NOT NULL,
  `systemname` varchar(500) NOT NULL,
  `year` varchar(50) NOT NULL,
  `developer` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL,
  `version` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `systm`
--

INSERT INTO `systm` (`id`, `systemname`, `year`, `developer`, `color`, `version`) VALUES
(1, 'XY University', '2016', 'Kamrul Hasan', 'blue', 'v.2');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `degree` text NOT NULL,
  `designation` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `joindate` date NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `degree`, `designation`, `email`, `password`, `gender`, `joindate`, `address`, `phone`, `subject`, `datetime`) VALUES
(1, 'Md Rasheduzzaman', 'P.hD', 'Professor', 'student@demo.com', '123456', 'male', '2015-08-17', 'Paglakani, Jhenaidah', '0173333332', 'Structure of Programming Language', '2016-08-17 15:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`id`, `name`) VALUES
(1, 'BUS');

-- --------------------------------------------------------

--
-- Table structure for table `trimester`
--

CREATE TABLE `trimester` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trimester`
--

INSERT INTO `trimester` (`id`, `name`) VALUES
(1, 'Spring'),
(2, 'Summer'),
(3, 'Fall');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_admin`
--
ALTER TABLE `mst_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_question`
--
ALTER TABLE `mst_question`
  ADD PRIMARY KEY (`que_id`);

--
-- Indexes for table `mst_result`
--
ALTER TABLE `mst_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_test`
--
ALTER TABLE `mst_test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `onlinequestion`
--
ALTER TABLE `onlinequestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `onlinetest`
--
ALTER TABLE `onlinetest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentid` (`studentid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systm`
--
ALTER TABLE `systm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trimester`
--
ALTER TABLE `trimester`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mst_admin`
--
ALTER TABLE `mst_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mst_question`
--
ALTER TABLE `mst_question`
  MODIFY `que_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `mst_result`
--
ALTER TABLE `mst_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `mst_test`
--
ALTER TABLE `mst_test`
  MODIFY `test_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `onlinequestion`
--
ALTER TABLE `onlinequestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `onlinetest`
--
ALTER TABLE `onlinetest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `systm`
--
ALTER TABLE `systm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `trimester`
--
ALTER TABLE `trimester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
