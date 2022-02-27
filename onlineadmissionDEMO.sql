-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2022 at 05:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineadmission`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `adminID` int(11) NOT NULL,
  `admin_photo` varchar(100) NOT NULL,
  `admin_firstname` varchar(100) NOT NULL,
  `admin_lastname` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_pwd` varchar(100) NOT NULL,
  `admin_contactno` varchar(100) NOT NULL,
  `admin_address` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `code_expiry` varchar(100) NOT NULL,
  `login_attempt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`adminID`, `admin_photo`, `admin_firstname`, `admin_lastname`, `admin_email`, `admin_pwd`, `admin_contactno`, `admin_address`, `code`, `code_expiry`, `login_attempt`) VALUES
(1, 'default_photo.png', 'CCC', 'Admin', 'admin@ccc.edu.ph', '$2y$10$56Ved.uKoECtj.42nYAaqu63OS6n6w5jC46WwIzaktCpB2wFl8vdS', '', '', '', 'Expired', '0'),
(7, '1644367690285.jpg', 'Rico', 'Guinanao', 'guinanaorico@gmail.com', '$2y$10$FLZz.VHXUGtXm9LOT9g1EOMIfEexv/wGC5VOMHRf3P6ZozU7bPJgq', '09319542169', 'Block 14 Lot 76 Majada In', '433132', 'New', '0'),
(8, 'default_photo.png', 'Michael', 'Wania', 'mjwania@yahoo.com', '$2y$10$XgREsh7WJfAluvY9N2jZPutjAVuUd2OIMZB2QHY8cFGVV1JWXwe.2', '09251486985', 'Calamba, Laguna', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `admin_logs`
--

CREATE TABLE `admin_logs` (
  `log_id` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_logs`
--

INSERT INTO `admin_logs` (`log_id`, `adminID`, `activity`, `date`, `time`) VALUES
(1, 1, 'You Entered Invalid Password', '02/25/2022', '12:33 AM'),
(2, 1, 'Your Account was Logged In', '02/25/2022', '12:33 AM'),
(3, 1, 'You Updated Student Details', '02/25/2022', '1:03 AM'),
(4, 1, 'You Registered New Student', '02/25/2022', '1:08 AM'),
(5, 7, 'Your Account was Logged In', '02/25/2022', '1:11 AM'),
(6, 7, 'You Registered New Student', '02/25/2022', '1:21 AM'),
(7, 7, 'You Added a New Admin', '02/25/2022', '1:22 AM'),
(8, 1, 'You Registered New Student', '02/25/2022', '1:40 AM'),
(9, 1, 'Your Account was Logged Out', '02/25/2022', '1:41 AM'),
(10, 7, 'Your Account was Logged Out', '02/25/2022', '1:41 AM'),
(11, 1, 'Your Account was Logged In', '02/25/2022', '12:23 PM'),
(12, 1, 'You Registered New Student', '02/25/2022', '1:14 PM'),
(13, 1, 'You Updated Student Details', '02/25/2022', '1:14 PM'),
(14, 1, 'You Registered New Student', '02/25/2022', '2:21 PM'),
(15, 1, 'You Registered New Student', '02/25/2022', '2:27 PM'),
(16, 1, 'You Registered New Student', '02/25/2022', '2:31 PM'),
(17, 1, 'You Registered New Student', '02/25/2022', '2:49 PM'),
(18, 1, 'You Updated Student Details', '02/25/2022', '2:50 PM'),
(19, 1, 'You Updated Student Details', '02/25/2022', '2:51 PM'),
(20, 1, 'You Registered New Student', '02/25/2022', '2:56 PM'),
(21, 1, 'You Registered New Student', '02/25/2022', '3:04 PM'),
(22, 1, 'You Registered New Student', '02/25/2022', '3:10 PM'),
(23, 1, 'You Registered New Student', '02/25/2022', '3:17 PM'),
(24, 1, 'You Registered New Student', '02/25/2022', '3:22 PM'),
(25, 1, 'You Updated Student Details', '02/25/2022', '3:32 PM'),
(26, 1, 'You Updated Student Details', '02/25/2022', '3:32 PM'),
(27, 1, 'You Updated Student Details', '02/25/2022', '3:32 PM'),
(28, 1, 'You Registered New Student', '02/25/2022', '3:34 PM'),
(29, 1, 'You Registered New Student', '02/25/2022', '3:45 PM'),
(30, 1, 'You Registered New Student', '02/25/2022', '3:48 PM'),
(31, 1, 'You Registered New Student', '02/25/2022', '3:52 PM'),
(32, 1, 'You Registered New Student', '02/25/2022', '3:57 PM'),
(33, 1, 'You Registered New Student', '02/25/2022', '4:02 PM'),
(34, 1, 'You Registered New Student', '02/25/2022', '4:05 PM'),
(35, 1, 'You Registered New Student', '02/25/2022', '4:07 PM'),
(36, 1, 'You Registered New Student', '02/25/2022', '4:13 PM'),
(37, 1, 'You Registered New Student', '02/25/2022', '4:24 PM'),
(38, 1, 'You Registered New Student', '02/25/2022', '4:27 PM'),
(39, 1, 'You Registered New Student', '02/25/2022', '4:51 PM'),
(40, 1, 'You Registered New Student', '02/25/2022', '4:53 PM'),
(41, 1, 'You Registered New Student', '02/25/2022', '4:57 PM'),
(42, 1, 'You Registered New Student', '02/25/2022', '5:04 PM'),
(43, 1, 'You Registered New Student', '02/25/2022', '5:06 PM'),
(44, 1, 'You Registered New Student', '02/25/2022', '5:09 PM'),
(45, 1, 'You Verified a Student', '02/25/2022', '5:12 PM'),
(46, 1, 'You Verified a Student', '02/25/2022', '5:12 PM'),
(47, 1, 'You Verified a Student', '02/25/2022', '5:12 PM'),
(48, 1, 'You Verified a Student', '02/25/2022', '5:12 PM'),
(49, 1, 'You Verified a Student', '02/25/2022', '5:12 PM'),
(50, 1, 'You Verified a Student', '02/25/2022', '5:12 PM'),
(51, 1, 'You Verified a Student', '02/25/2022', '5:13 PM'),
(52, 1, 'You Verified a Student', '02/25/2022', '5:13 PM'),
(53, 1, 'You Verified a Student', '02/25/2022', '5:13 PM'),
(54, 1, 'You Verified a Student', '02/25/2022', '5:13 PM'),
(55, 1, 'You Verified a Student', '02/25/2022', '5:13 PM'),
(56, 1, 'You Verified a Student', '02/25/2022', '5:14 PM'),
(57, 1, 'You Verified a Student', '02/25/2022', '5:14 PM'),
(58, 1, 'You Verified a Student', '02/25/2022', '5:14 PM'),
(59, 1, 'You Verified a Student', '02/25/2022', '5:14 PM'),
(60, 1, 'You Verified a Student', '02/25/2022', '5:14 PM'),
(61, 1, 'You Verified a Student', '02/25/2022', '5:14 PM'),
(62, 1, 'You Verified a Student', '02/25/2022', '5:14 PM'),
(63, 1, 'You Verified a Student', '02/25/2022', '5:15 PM'),
(64, 1, 'You Verified a Student', '02/25/2022', '5:15 PM'),
(65, 1, 'You Verified a Student', '02/25/2022', '5:15 PM'),
(66, 1, 'You Verified a Student', '02/25/2022', '5:15 PM'),
(67, 1, 'You Verified a Student', '02/25/2022', '5:15 PM'),
(68, 1, 'You Verified a Student', '02/25/2022', '5:16 PM'),
(69, 1, 'You Updated Student Details', '02/25/2022', '6:31 PM');

-- --------------------------------------------------------

--
-- Table structure for table `admission_status`
--

CREATE TABLE `admission_status` (
  `statusID` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_status`
--

INSERT INTO `admission_status` (`statusID`, `status`) VALUES
(1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `annual_reg_stud`
--

CREATE TABLE `annual_reg_stud` (
  `report_id` int(11) NOT NULL,
  `total_reg_students` int(11) NOT NULL,
  `school_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `annual_reg_stud`
--

INSERT INTO `annual_reg_stud` (`report_id`, `total_reg_students`, `school_year`) VALUES
(1, 53, 'SY 2021-2022');

-- --------------------------------------------------------

--
-- Table structure for table `answer_key`
--

CREATE TABLE `answer_key` (
  `question_id` int(11) NOT NULL,
  `correct_answer` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer_key`
--

INSERT INTO `answer_key` (`question_id`, `correct_answer`, `type`) VALUES
(1, 'D', 'Verbal Reasoning'),
(2, 'G', 'Verbal Comprehension'),
(3, 'D', 'Quantitative Reasoning'),
(4, 'H', 'Figural Reasoning'),
(5, 'E', 'Verbal Reasoning'),
(6, 'H', 'Verbal Comprehension'),
(7, 'E', 'Quantitative Reasoning'),
(8, 'H', 'Figural Reasoning'),
(9, 'B', 'Quantitative Reasoning'),
(10, 'J', 'Verbal Reasoning'),
(11, 'D', 'Verbal Reasoning'),
(12, 'J', 'Figural Reasoning'),
(13, 'A', 'Verbal Reasoning'),
(14, 'J', 'Verbal Reasoning'),
(15, 'B', 'Verbal Reasoning'),
(16, 'J', 'Quantitative Reasoning'),
(17, 'B', 'Quantitative Reasoning'),
(18, 'G', 'Verbal Comprehension'),
(19, 'C', 'Figural Reasoning'),
(20, 'J', 'Verbal Reasoning'),
(21, 'D', 'Verbal Reasoning'),
(22, 'J', 'Figural Reasoning'),
(23, 'C', 'Verbal Reasoning'),
(24, 'F', 'Verbal Reasoning'),
(25, 'E', 'Verbal Comprehension'),
(26, 'F', 'Quantitative Reasoning'),
(27, 'C', 'Verbal Comprehension'),
(28, 'I', 'Verbal Reasoning'),
(29, 'E', 'Figural Reasoning'),
(30, 'H', 'Quantitative Reasoning'),
(31, 'D', 'Figural Reasoning'),
(32, 'J', 'Figural Reasoning'),
(33, 'B', 'Verbal Reasoning'),
(34, 'I', 'Verbal Reasoning'),
(35, 'E', 'Verbal Reasoning'),
(36, 'I', 'Quantitative Reasoning'),
(37, 'D', 'Verbal Comprehension'),
(38, 'I', 'Verbal Reasoning'),
(39, 'D', 'Quantitative Reasoning'),
(40, 'I', 'Verbal Reasoning'),
(41, 'E', 'Figural Reasoning'),
(42, 'G', 'Quantitative Reasoning'),
(43, 'A', 'Figural Reasoning'),
(44, 'I', 'Quantitative Reasoning'),
(45, 'E', 'Verbal Comprehension'),
(46, 'H', 'Quantitative Reasoning'),
(47, 'C', 'Verbal Comprehension'),
(48, 'F', 'Figural Reasoning'),
(49, 'C', 'Quantitative Reasoning'),
(50, 'I', 'Verbal Reasoning'),
(51, 'B', 'Quantitative Reasoning'),
(52, 'F', 'Verbal Comprehension'),
(53, 'A', 'Verbal Reasoning'),
(54, 'F', 'Figural Reasoning'),
(55, 'E', 'Verbal Reasoning'),
(56, 'G', 'Figural Reasoning'),
(57, 'D', 'Verbal Reasoning'),
(58, 'J', 'Verbal Comprehension'),
(59, 'D', 'Figural Reasoning'),
(60, 'G', 'Quantitative Reasoning'),
(61, 'E', 'Verbal Reasoning'),
(62, 'G', 'Verbal Comprehension'),
(63, 'B', 'Figural Reasoning'),
(64, 'H', 'Quantitative Reasoning'),
(65, 'E', 'Verbal Reasoning'),
(66, 'I', 'Figural Reasoning'),
(67, 'E', 'Verbal Comprehension'),
(68, 'J', 'Figural Reasoning'),
(69, 'C', 'Quantitative Reasoning'),
(70, 'F', 'Figural Reasoning'),
(71, 'A', 'Quantitative Reasoning'),
(72, 'F', 'Verbal Reasoning'),
(73, 'N/A', 'No answer');

-- --------------------------------------------------------

--
-- Table structure for table `educ_bg`
--

CREATE TABLE `educ_bg` (
  `student_id` int(11) NOT NULL,
  `admit_type` varchar(100) NOT NULL,
  `elem_name` varchar(100) NOT NULL,
  `elem_address` varchar(100) NOT NULL,
  `elem_grad` varchar(100) NOT NULL,
  `elem_honors` varchar(100) DEFAULT NULL,
  `jhs_name` varchar(100) NOT NULL,
  `jhs_address` varchar(100) NOT NULL,
  `jhs_grad` varchar(100) NOT NULL,
  `jhs_honors` varchar(100) DEFAULT NULL,
  `shs_name` varchar(100) DEFAULT NULL,
  `shs_address` varchar(100) DEFAULT NULL,
  `shs_tracks` varchar(100) DEFAULT NULL,
  `shs_strands` varchar(100) NOT NULL,
  `shs_grad` varchar(100) DEFAULT NULL,
  `shs_honors` varchar(100) DEFAULT NULL,
  `g11gwa` varchar(100) DEFAULT NULL,
  `g12gwa` varchar(100) DEFAULT NULL,
  `college_name` varchar(100) DEFAULT NULL,
  `college_address` varchar(100) DEFAULT NULL,
  `college_course` varchar(100) DEFAULT NULL,
  `college_gwa` varchar(100) DEFAULT NULL,
  `tvc_name` varchar(100) DEFAULT NULL,
  `tvc_address` varchar(100) DEFAULT NULL,
  `tvc_grad` varchar(100) DEFAULT NULL,
  `tvc_course` varchar(100) DEFAULT NULL,
  `als_name` varchar(100) DEFAULT NULL,
  `als_address` varchar(100) DEFAULT NULL,
  `als_cert` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `educ_bg`
--

INSERT INTO `educ_bg` (`student_id`, `admit_type`, `elem_name`, `elem_address`, `elem_grad`, `elem_honors`, `jhs_name`, `jhs_address`, `jhs_grad`, `jhs_honors`, `shs_name`, `shs_address`, `shs_tracks`, `shs_strands`, `shs_grad`, `shs_honors`, `g11gwa`, `g12gwa`, `college_name`, `college_address`, `college_course`, `college_gwa`, `tvc_name`, `tvc_address`, `tvc_grad`, `tvc_course`, `als_name`, `als_address`, `als_cert`) VALUES
(1, 'Transferee', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-16', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-02', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-23', '', '90', '90', 'City College of Calamba', 'Block 14 Lot 76 Majada In', 'BSIT', '90', '', '', '', '', '', '', ''),
(2, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-23', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-23', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-17', '', '90', '90', '', '', '', '', '', '', '', '', 'try', 'try', '2022-A-0002.jpg'),
(3, 'Freshman', 'Agusipan Elem School', 'Agusipan', '2022-02-16', '', 'MajadaInNHS', 'Calamba, Laguna', '2022-02-10', '', 'STI College Calamba', 'Calamba, Laguna', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-15', '3rd honor', '80', '80', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'Transferee', 'Agusipan Elem School', 'Imus, Cavite', '2022-02-23', '', 'MajadaInNHS', 'Calamba, Laguna', '2022-02-28', '', 'STI College Calamba', 'Calamba, Laguna', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-28', '', '80', '80', 'STI', 'Calamba, Laguna', 'BSIT', '90', '', '', '', '', '', '', ''),
(5, 'Transferee', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-23', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-10', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Academics', 'ABM', '2022-02-16', '', '80', '89', 'STI', 'Calamba, Laguna', 'BSA', '80', '', '', '', '', '', '', ''),
(6, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-11', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-17', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-28', '', '90', '90', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-10', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-02', '', 'STI College Calamba', 'Imus, Cavite', 'Technical-Vocational-Livelihood', 'Agri-Fishery Arts', '2022-03-01', '', '90', '90', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-16', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-15', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-16', '', '80', '86', '', '', '', '', '', '', '', '', 'TESDA', 'Calamba', '2022-A-0008.jpg'),
(9, 'Transferee', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-25', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-03-02', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-16', '', '80', '90', 'STI', 'Imus, Cavite', 'BSIT', '90', '', '', '', '', '', '', ''),
(10, 'Transferee', 'Pamplona Elem School', 'Imus, Cavite', '2022-02-03', '', 'asdasda', 'Calamba, Laguna', '2022-02-24', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-28', '', '86', '87', 'STI', 'Calamba, Laguna', 'BSIT', '90', '', '', '', '', '', '', ''),
(11, 'Freshman', 'Pamplona Elem School', 'Imus, Cavite', '2022-02-09', '', 'asdadasd', 'Calamba, Laguna', '2022-02-15', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-16', '', '90', '90', '', '', '', '', '', '', '', '', 'tuyt', 'Block 14 Lot 76 Majada In', '2022-A-0011.jpg'),
(12, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-20', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-07', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Academics', 'ABM', '2022-02-16', '', '90', '90', '', '', '', '', '', '', '', '', '', '', ''),
(13, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-16', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-08', '', 'STI College Calamba', 'Calamba, Laguna', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-28', '', '90', '90', '', '', '', '', '', '', '', '', 'ghjfg', 'Block 14 Lot 76 Majada In', '2022-A-0013.jpg'),
(14, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-16', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-17', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-22', '', '80', '80', '', '', '', '', '', '', '', '', '', '', ''),
(15, 'Transferee', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-16', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-17', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-10', '', '89', '89', 'STI', 'Block 14 Lot 76 Majada In', 'BSIT', '90', '', '', '', '', '', '', ''),
(16, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-16', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-16', '', 'STI College Calamba', 'Calamba, Laguna', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-22', '', '90', '90', '', '', '', '', '', '', '', '', '', '', ''),
(17, 'Freshman', 'Pamplona Elem School', 'Imus, Cavite', '2022-03-01', '', 'Majada\'InNHS', 'Calamba, Laguna', '2022-02-26', '', 'STI College Calamba', 'Calamba, Laguna', 'Technical-Vocational-Livelihood', 'Home Economics', '2022-02-21', '', '90', '90', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'Freshman', 'Pamplona Elem School', 'Calamba, Laguna', '2022-02-16', '', 'asdasda', 'Imus, Cavite', '2022-02-23', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-16', '', '90', '90', '', '', '', '', '', '', '', '', '', '', ''),
(19, 'Transferee', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-16', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-09', '', 'STI College Calamba', 'Calamba, Laguna', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-15', '', '90', '90', 'STI', 'Block 14 Lot 76 Majada In', 'BSIT', '90', '', '', '', '', '', '', ''),
(20, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-19', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-14', '', 'STI College Calamba', 'Calamba, Laguna', 'Technical-Vocational-Livelihood', 'Industrial Arts', '2022-03-03', '', '80', '89', '', '', '', '', '', '', '', '', '', '', ''),
(21, 'Freshman', 'Pamplona Elem School', 'Calamba, Laguna', '2022-02-14', '', 'asdasda', 'Block 14 Lot 76 Majada In', '2022-02-09', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-16', '', '90', '90', '', '', '', '', '', '', '', '', '', '', ''),
(22, 'Transferee', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-24', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-15', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Academics', 'ABM', '2022-02-10', '', '89', '89', 'STI', 'Block 14 Lot 76 Majada In', 'BSIT', '89', '', '', '', '', '', '', ''),
(23, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-16', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-17', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-10', '', '89', '90', '', '', '', '', '', '', '', '', '', '', ''),
(24, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-08', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-08', '', 'STI College Calamba', 'Imus, Cavite', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-17', '', '89', '90', '', '', '', '', '', '', '', '', 'wer', '34w', '2022-A-0024.jpg'),
(25, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-06', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-17', '', 'STI College Calamba', 'Calamba, Laguna', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-23', '', '89', '89', '', '', '', '', '', '', '', '', '', '', ''),
(26, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-17', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-09', '', 'STI College Calamba', 'Calamba, Laguna', 'Technical-Vocational-Livelihood', 'Industrial Arts', '2022-02-08', '', '89', '89', '', '', '', '', '', '', '', '', '', '', ''),
(27, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-16', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-16', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'Industrial Arts', '2022-02-10', '', '89', '80', '', '', '', '', '', '', '', '', '', '', ''),
(28, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-01', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-09', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-03', '', '89', '90', '', '', '', '', '', '', '', '', '', '', ''),
(29, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-08', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-22', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-09', '', '90', '90', '', '', '', '', '', '', '', '', '', '', ''),
(30, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-23', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-02', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Sports', 'N/A', '2022-02-16', '', '90', '90', '', '', '', '', '', '', '', '', '', '', ''),
(31, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-23', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-15', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-15', '', '90', '89', '', '', '', '', '', '', '', '', '', '', ''),
(32, 'Freshman', 'Pamplona Elem School', 'Calamba, Laguna', '2022-02-13', '', 'MajadaInNHS', 'Calamba, Laguna', '2022-02-09', '', 'STI College Calamba', 'Calamba, Laguna', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-23', '', '90', '90', '', '', '', '', '', '', '', '', '', '', ''),
(33, 'Transferee', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-03-02', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-20', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-11', '', '90', '89', 'PWU', 'Block 14 Lot 76 Majada In', 'BSCS', '90', '', '', '', '', '', '', ''),
(34, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-16', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-16', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-04', '', '90', '90', '', '', '', '', '', '', '', '', '', '', ''),
(35, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-16', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-02', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'Industrial Arts', '2022-02-23', '', '89', '90', '', '', '', '', '', '', '', '', '', '', ''),
(36, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-28', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-16', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'ICT', '2022-02-15', '', '90', '89', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `exam_results`
--

CREATE TABLE `exam_results` (
  `result_id` int(11) NOT NULL,
  `application_no` varchar(100) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `raw_score` int(11) NOT NULL,
  `scaled_score` int(11) NOT NULL,
  `percentile_rank` int(11) NOT NULL,
  `stanine` int(11) NOT NULL,
  `verbal_interpretation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_results`
--

INSERT INTO `exam_results` (`result_id`, `application_no`, `student_name`, `raw_score`, `scaled_score`, `percentile_rank`, `stanine`, `verbal_interpretation`) VALUES
(1, '2022-A-0027', 'Ali Mateo', 69, 762, 99, 9, 'Above Average'),
(2, '2022-A-0008', 'Alvin Tenorio', 48, 670, 47, 5, 'Average'),
(3, '2022-A-0004', 'Angel Garcia', 11, 574, 1, 1, 'Below Average'),
(4, '2022-A-0018', 'Anna Reyes', 60, 706, 80, 7, 'Above Average'),
(5, '2022-A-0006', 'Arnold Dalisay', 46, 665, 42, 5, 'Average'),
(6, '2022-A-0014', 'Muhammad Akbar', 46, 665, 42, 5, 'Average'),
(7, '2022-A-0009', 'Simon Adolfo', 63, 719, 87, 7, 'Above Average'),
(8, '2022-A-0020', 'Palma Lucas', 5, 542, 1, 1, 'Below Average'),
(9, '2022-A-0005', 'Paolo Malinao', 60, 706, 80, 7, 'Above Average'),
(10, '2022-A-0022', 'Samantha Espina', 44, 660, 37, 4, 'Average'),
(11, '2021-A-0005', 'Sheena Alarcon', 9, 566, 1, 1, 'Below Average'),
(12, '2022-A-0031', 'Oscar Cervantes', 6, 549, 1, 1, 'Below Average'),
(13, '2021-A-0019', 'Tiffany Bautista', 59, 702, 77, 7, 'Above Average'),
(14, '2022-A-0026', 'Irene Luna', 43, 658, 35, 4, 'Average'),
(15, '2021-A-0020', 'Seth Rivera', 0, 0, 0, 0, 'Below Average'),
(16, '2021-A-0017', 'Jeremy Garcia', 0, 0, 0, 0, 'Below Average'),
(17, '2021-A-0022', 'Cedric Pascua', 16, 592, 1, 1, 'Below Average');

-- --------------------------------------------------------

--
-- Table structure for table `fam_bg`
--

CREATE TABLE `fam_bg` (
  `student_id` int(11) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `father_citizenship` varchar(100) NOT NULL,
  `father_address` varchar(100) NOT NULL,
  `father_contactno` varchar(100) NOT NULL,
  `father_email` varchar(100) NOT NULL,
  `father_work` varchar(100) NOT NULL,
  `father_emp` varchar(100) DEFAULT NULL,
  `father_emp_add` varchar(100) DEFAULT NULL,
  `father_no` varchar(100) DEFAULT NULL,
  `father_educ` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `mother_citizenship` varchar(100) NOT NULL,
  `mother_address` varchar(100) NOT NULL,
  `mother_contactno` varchar(100) NOT NULL,
  `mother_email` varchar(100) NOT NULL,
  `mother_work` varchar(100) NOT NULL,
  `mother_emp` varchar(100) DEFAULT NULL,
  `mother_emp_add` varchar(100) DEFAULT NULL,
  `mother_emp_no` varchar(100) NOT NULL,
  `mother_educ` varchar(100) NOT NULL,
  `guardian_name` varchar(100) DEFAULT NULL,
  `guardian_relationship` varchar(100) DEFAULT NULL,
  `guardian_address` varchar(100) DEFAULT NULL,
  `guardian_contactno` varchar(100) DEFAULT NULL,
  `guardian_email` varchar(100) DEFAULT NULL,
  `guardian_bday` varchar(100) DEFAULT NULL,
  `guardian_work` varchar(100) DEFAULT NULL,
  `guardian_emp` varchar(100) DEFAULT NULL,
  `guardian_emp_address` varchar(100) DEFAULT NULL,
  `guardian_emp_no` varchar(100) NOT NULL,
  `sibling_name1` varchar(100) DEFAULT NULL,
  `sibling_age1` varchar(100) DEFAULT NULL,
  `sibling_status1` varchar(100) DEFAULT NULL,
  `sibling_contact1` varchar(100) DEFAULT NULL,
  `sibling_name2` varchar(100) DEFAULT NULL,
  `sibling_age2` varchar(100) DEFAULT NULL,
  `sibling_status2` varchar(100) DEFAULT NULL,
  `sibling_contact2` varchar(100) DEFAULT NULL,
  `sibling_name3` varchar(100) DEFAULT NULL,
  `sibling_age3` varchar(100) DEFAULT NULL,
  `sibling_status3` varchar(100) DEFAULT NULL,
  `sibling_contact3` varchar(100) DEFAULT NULL,
  `income_fam` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fam_bg`
--

INSERT INTO `fam_bg` (`student_id`, `father_name`, `father_citizenship`, `father_address`, `father_contactno`, `father_email`, `father_work`, `father_emp`, `father_emp_add`, `father_no`, `father_educ`, `mother_name`, `mother_citizenship`, `mother_address`, `mother_contactno`, `mother_email`, `mother_work`, `mother_emp`, `mother_emp_add`, `mother_emp_no`, `mother_educ`, `guardian_name`, `guardian_relationship`, `guardian_address`, `guardian_contactno`, `guardian_email`, `guardian_bday`, `guardian_work`, `guardian_emp`, `guardian_emp_address`, `guardian_emp_no`, `sibling_name1`, `sibling_age1`, `sibling_status1`, `sibling_contact1`, `sibling_name2`, `sibling_age2`, `sibling_status2`, `sibling_contact2`, `sibling_name3`, `sibling_age3`, `sibling_status3`, `sibling_contact3`, `income_fam`) VALUES
(1, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'Elementary Undergraduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(2, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Self-Employed', '', '', '', 'Elementary Graduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09245789653', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(3, 'FDHDF', 'Filipino', 'Calamba, Laguna', '09457898365', 'estriborics@gmail.com', 'Private Employee', '', '', '', 'College Graduate', 'Eden Guinanao', 'Filipino', 'Calamba, Laguna', '09554878784', 'estriborics@gmail.com', 'Self-Employed', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(4, 'qwe', 'Filipino', 'qe', '09625487878', 'guinanaorico@gmail.com', 'Government Employee', '', '', '', 'College Graduate', 'qwe', 'Filipino', 'qwe', '09124547878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(5, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Self-Employed', '', '', '', 'High School Undergraduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(6, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(7, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', 'Eden Guinanao', 'Filipino', 'Calamba, Laguna', '09124547878', 'estriborics@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(8, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', 'Eden Guinanao', 'Filipino', 'Calamba, Laguna', '09245789653', 'estriborics@gmail.com', 'Government Employee', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(9, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Self-Employed', '', '', '', 'High School Undergraduate', 'Eden Guinanao', 'asdasdasd', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(10, 'Rod Reiss', 'Paradito', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Self-Employed', '', '', '', 'Elementary Graduate', 'Alma Reiss', 'Paradito', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Government Employee', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(11, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(12, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09453435353', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'College Graduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Government Employee', '', '', '', 'Elementary Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(13, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09457898365', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(14, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Government Employee', '', '', '', 'High School Graduate', 'Eden Guinanao', 'Filipino', 'Calamba, Laguna', '09345343435', 'estriborics@gmail.com', 'Private Employee', '', '', '', 'College Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(15, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'Elementary Graduate', 'Eden Guinanao', 'Filipino', 'Calamba, Laguna', '09124547878', 'estriborics@gmail.com', 'Self-Employed', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(16, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(17, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', 'dsfsf', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(18, 'Nildo Guinanao', 'Filipino', 'Calamba, Laguna', '09126548799', 'estriborics@gmail.com', 'Private Employee', '', '', '', 'College Undergraduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(19, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09564564564', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'Post Graduate Studies', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'admin@ccc.edu.ph', 'Unemployed', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(20, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Government Employee', '', '', '', 'High School Undergraduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09554878784', 'admin@ccc.edu.ph', 'Private Employee', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P41, 924.00-P73, 367.00'),
(21, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Graduate', 'Eden Guinanao', 'Filipino', 'Calamba, Laguna', '09124547879', 'estriborics@gmail.com', 'Private Employee', '', '', '', 'College Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(22, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'Elementary Graduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Self-Employed', '', '', '', 'Elementary Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(23, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Government Employee', '', '', '', 'Elementary Undergraduate', 'Eden Guinanao', 'Filipino', 'Imus, Cavite', '09245789653', 'estriborics@gmail.comasda', 'Government Employee', '', '', '', 'College Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(24, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(25, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Government Employee', '', 'Imus, Cavite', '09251486985', 'Elementary Graduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09554878784', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(26, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'Elementary Graduate', 'Eden Guinanao', 'asdasdasd', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(27, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Government Employee', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(28, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', 'Eden Guinanao', 'Filipino', 'Calamba, Laguna', '09124789565', 'estriborics@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P41, 924.00-P73, 367.00'),
(29, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Self-Employed', '', '', '', 'High School Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P41, 924.00-P73, 367.00'),
(30, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Graduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09554878784', 'guinanaorico@gmail.com', 'Self-Employed', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(31, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', 'Eden Guinanao', 'Filipino', 'Calamba, Laguna', '09554878784', 'estriborics@gmail.com', 'Unemployed', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P41, 924.00-P73, 367.00'),
(32, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124789565', 'admin@ccc.edu.ph', 'Government Employee', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P73, 367.00-P125, 772.00'),
(33, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'admin@ccc.edu.ph', 'Private Employee', '', '', '', 'College Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(34, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'College Undergraduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(35, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Self-Employed', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P41, 924.00-P73, 367.00'),
(36, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Government Employee', '', '', '', 'High School Undergraduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Government Employee', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int(11) NOT NULL,
  `application_no` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date_sent` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedback_id`, `application_no`, `photo`, `sender`, `email`, `message`, `date_sent`) VALUES
(1, '2022-A-0027', 'default_photo.png', 'Anonymous', '', 'Thanks', '2022-02-25 05:43:14 PM'),
(2, '2022-A-0008', '1645723260_3m.jpg', 'Alvin Tenorio', 'alvintenorio@gmail.com', 'Great', '2022-02-25 05:49:52 PM'),
(3, '2022-A-0006', '1645722195_2m.jpg', 'Arnold Dalisay', 'arnoldnicdaos@gmail.com', 'Nice', '2022-02-25 06:35:26 PM'),
(4, '2022-A-0014', '1645771765_7m.jpg', 'Muhammad Akbar', 'muhammad@gmail.com', 'Good', '2022-02-25 07:20:50 PM'),
(5, '2022-A-0032', 'default_photo.png', 'Anonymous', '', 'qweert\'k', '2022-02-25 07:48:16 PM');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notif_id` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `date_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notif_id`, `adminID`, `admin_name`, `activity`, `date_time`) VALUES
(1, 1, 'CCC Admin', 'updated the details of Arnold Dalisay', '2022-02-25 01:03:45 AM'),
(2, 1, 'CCC Admin', 'registered a student named Kate Uy', '2022-02-25 01:08:45 AM'),
(3, 7, 'Rico Guinanao', 'registered a student named Alvin Tenorio', '2022-02-25 01:21:00 AM'),
(4, 7, 'Rico Guinanao', 'added Michael Wania as an administrator', '2022-02-25 01:22:34 AM'),
(5, 1, 'CCC Admin', 'registered a student named Simon Adolfo', '2022-02-25 01:40:40 AM'),
(6, 1, 'CCC Admin', 'registered a student named Historia Reiss', '2022-02-25 01:14:20 PM'),
(7, 1, 'CCC Admin', 'updated the details of Historia Reiss', '2022-02-25 01:14:40 PM'),
(8, 1, 'CCC Admin', 'registered a student named Connie Springer', '2022-02-25 02:21:49 PM'),
(9, 1, 'CCC Admin', 'registered a student named Jean Valdez', '2022-02-25 02:27:13 PM'),
(10, 1, 'CCC Admin', 'registered a student named Hitch Dreyse', '2022-02-25 02:31:53 PM'),
(11, 1, 'CCC Admin', 'registered a student named Muhammad Akbar', '2022-02-25 02:49:25 PM'),
(12, 1, 'CCC Admin', 'updated the details of Hitch Dreyse', '2022-02-25 02:50:39 PM'),
(13, 1, 'CCC Admin', 'updated the details of Hitch Dreyse', '2022-02-25 02:51:08 PM'),
(14, 1, 'CCC Admin', 'registered a student named Mikasa Lamanca', '2022-02-25 02:56:12 PM'),
(15, 1, 'CCC Admin', 'registered a student named Ryan Beng', '2022-02-25 03:04:47 PM'),
(16, 1, 'CCC Admin', 'registered a student named Jeremy Garcia', '2022-02-25 03:10:45 PM'),
(17, 1, 'CCC Admin', 'registered a student named Anna Reyes', '2022-02-25 03:17:41 PM'),
(18, 1, 'CCC Admin', 'registered a student named Tiffany Bautista', '2022-02-25 03:22:24 PM'),
(19, 1, 'CCC Admin', 'updated the details of Mikasa Lamanca', '2022-02-25 03:32:18 PM'),
(20, 1, 'CCC Admin', 'updated the details of Hitch Dreyse', '2022-02-25 03:32:31 PM'),
(21, 1, 'CCC Admin', 'updated the details of Historia Reiss', '2022-02-25 03:32:46 PM'),
(22, 1, 'CCC Admin', 'registered a student named Seth Rivera', '2022-02-25 03:34:58 PM'),
(23, 1, 'CCC Admin', 'registered a student named Rea Enriquez', '2022-02-25 03:45:33 PM'),
(24, 1, 'CCC Admin', 'registered a student named Cedric Pascua', '2022-02-25 03:48:56 PM'),
(25, 1, 'CCC Admin', 'registered a student named Yuki Fajardo', '2022-02-25 03:52:54 PM'),
(26, 1, 'CCC Admin', 'registered a student named Denzel Espinosa', '2022-02-25 03:57:54 PM'),
(27, 1, 'CCC Admin', 'registered a student named Gabriel Roxas', '2022-02-25 04:02:57 PM'),
(28, 1, 'CCC Admin', 'registered a student named Irene Luna', '2022-02-25 04:05:28 PM'),
(29, 1, 'CCC Admin', 'registered a student named Ali Mateo', '2022-02-25 04:07:38 PM'),
(30, 1, 'CCC Admin', 'registered a student named Hanna Rosario', '2022-02-25 04:13:39 PM'),
(31, 1, 'CCC Admin', 'registered a student named Kana Gallardio', '2022-02-25 04:24:37 PM'),
(32, 1, 'CCC Admin', 'registered a student named Lorenzo Baltazar', '2022-02-25 04:27:50 PM'),
(33, 1, 'CCC Admin', 'registered a student named Oscar Cervantes', '2022-02-25 04:51:15 PM'),
(34, 1, 'CCC Admin', 'registered a student named Paolo Malinao', '2022-02-25 04:53:52 PM'),
(35, 1, 'CCC Admin', 'registered a student named Keith Cortes', '2022-02-25 04:57:32 PM'),
(36, 1, 'CCC Admin', 'registered a student named Martha Lacson', '2022-02-25 05:04:10 PM'),
(37, 1, 'CCC Admin', 'registered a student named Palma Lucas', '2022-02-25 05:06:32 PM'),
(38, 1, 'CCC Admin', 'registered a student named Samantha Espina', '2022-02-25 05:09:06 PM'),
(39, 1, 'CCC Admin', 'verified the application of Samantha Espina', '2022-02-25 05:12:15 PM'),
(40, 1, 'CCC Admin', 'verified the application of Palma Lucas', '2022-02-25 05:12:25 PM'),
(41, 1, 'CCC Admin', 'verified the application of Paolo Malinao', '2022-02-25 05:12:34 PM'),
(42, 1, 'CCC Admin', 'verified the application of Oscar Cervantes', '2022-02-25 05:12:41 PM'),
(43, 1, 'CCC Admin', 'verified the application of Kana Gallardio', '2022-02-25 05:12:49 PM'),
(44, 1, 'CCC Admin', 'verified the application of Irene Luna', '2022-02-25 05:12:57 PM'),
(45, 1, 'CCC Admin', 'verified the application of Hitch Dreyse', '2022-02-25 05:13:07 PM'),
(46, 1, 'CCC Admin', 'verified the application of Muhammad Akbar', '2022-02-25 05:13:16 PM'),
(47, 1, 'CCC Admin', 'verified the application of Keith Cortes', '2022-02-25 05:13:23 PM'),
(48, 1, 'CCC Admin', 'verified the application of Simon Adolfo', '2022-02-25 05:13:38 PM'),
(49, 1, 'CCC Admin', 'verified the application of Mikasa Lamanca', '2022-02-25 05:13:51 PM'),
(50, 1, 'CCC Admin', 'verified the application of Anna Reyes', '2022-02-25 05:14:00 PM'),
(51, 1, 'CCC Admin', 'verified the application of Cedric Pascua', '2022-02-25 05:14:10 PM'),
(52, 1, 'CCC Admin', 'verified the application of Sheena Alarcon', '2022-02-25 05:14:19 PM'),
(53, 1, 'CCC Admin', 'verified the application of Arnold Dalisay', '2022-02-25 05:14:29 PM'),
(54, 1, 'CCC Admin', 'verified the application of Kate Uy', '2022-02-25 05:14:39 PM'),
(55, 1, 'CCC Admin', 'verified the application of Seth Rivera', '2022-02-25 05:14:48 PM'),
(56, 1, 'CCC Admin', 'verified the application of Martha Lacson', '2022-02-25 05:14:56 PM'),
(57, 1, 'CCC Admin', 'verified the application of Angel Garcia', '2022-02-25 05:15:06 PM'),
(58, 1, 'CCC Admin', 'verified the application of Rea Enriquez', '2022-02-25 05:15:15 PM'),
(59, 1, 'CCC Admin', 'verified the application of Ali Mateo', '2022-02-25 05:15:24 PM'),
(60, 1, 'CCC Admin', 'verified the application of Jeremy Garcia', '2022-02-25 05:15:47 PM'),
(61, 1, 'CCC Admin', 'verified the application of Alvin Tenorio', '2022-02-25 05:15:59 PM'),
(62, 1, 'CCC Admin', 'verified the application of Tiffany Bautista', '2022-02-25 05:16:12 PM'),
(63, 1, 'CCC Admin', 'updated the details of Arnold Dalisay', '2022-02-25 06:31:06 PM');

-- --------------------------------------------------------

--
-- Table structure for table `org_involvement`
--

CREATE TABLE `org_involvement` (
  `student_id` int(11) NOT NULL,
  `org1` varchar(100) DEFAULT NULL,
  `pos1` varchar(100) DEFAULT NULL,
  `nature1` varchar(100) DEFAULT NULL,
  `yrs1` varchar(100) DEFAULT NULL,
  `org2` varchar(100) DEFAULT NULL,
  `pos2` varchar(100) DEFAULT NULL,
  `nature2` varchar(100) DEFAULT NULL,
  `yrs2` varchar(100) DEFAULT NULL,
  `org3` varchar(100) DEFAULT NULL,
  `pos3` varchar(100) DEFAULT NULL,
  `nature3` varchar(100) DEFAULT NULL,
  `yrs3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `org_involvement`
--

INSERT INTO `org_involvement` (`student_id`, `org1`, `pos1`, `nature1`, `yrs1`, `org2`, `pos2`, `nature2`, `yrs2`, `org3`, `pos3`, `nature3`, `yrs3`) VALUES
(1, '', '', '', '', '', '', '', '', '', '', '', ''),
(2, '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', '', '', '', '', ''),
(4, '', '', '', '', '', '', '', '', '', '', '', ''),
(5, '', '', '', '', '', '', '', '', '', '', '', ''),
(6, '', '', '', '', '', '', '', '', '', '', '', ''),
(7, '', '', '', '', '', '', '', '', '', '', '', ''),
(8, '', '', '', '', '', '', '', '', '', '', '', ''),
(9, '', '', '', '', '', '', '', '', '', '', '', ''),
(10, '', '', '', '', '', '', '', '', '', '', '', ''),
(11, '', '', '', '', '', '', '', '', '', '', '', ''),
(12, '', '', '', '', '', '', '', '', '', '', '', ''),
(13, '', '', '', '', '', '', '', '', '', '', '', ''),
(14, '', '', '', '', '', '', '', '', '', '', '', ''),
(15, '', '', '', '', '', '', '', '', '', '', '', ''),
(16, '', '', '', '', '', '', '', '', '', '', '', ''),
(17, '', '', '', '', '', '', '', '', '', '', '', ''),
(18, '', '', '', '', '', '', '', '', '', '', '', ''),
(19, '', '', '', '', '', '', '', '', '', '', '', ''),
(20, '', '', '', '', '', '', '', '', '', '', '', ''),
(21, '', '', '', '', '', '', '', '', '', '', '', ''),
(22, '', '', '', '', '', '', '', '', '', '', '', ''),
(23, '', '', '', '', '', '', '', '', '', '', '', ''),
(24, '', '', '', '', '', '', '', '', '', '', '', ''),
(25, '', '', '', '', '', '', '', '', '', '', '', ''),
(26, '', '', '', '', '', '', '', '', '', '', '', ''),
(27, '', '', '', '', '', '', '', '', '', '', '', ''),
(28, '', '', '', '', '', '', '', '', '', '', '', ''),
(29, '', '', '', '', '', '', '', '', '', '', '', ''),
(30, '', '', '', '', '', '', '', '', '', '', '', ''),
(31, '', '', '', '', '', '', '', '', '', '', '', ''),
(32, '', '', '', '', '', '', '', '', '', '', '', ''),
(33, '', '', '', '', '', '', '', '', '', '', '', ''),
(34, '', '', '', '', '', '', '', '', '', '', '', ''),
(35, '', '', '', '', '', '', '', '', '', '', '', ''),
(36, '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `personal_admiration`
--

CREATE TABLE `personal_admiration` (
  `student_id` int(11) NOT NULL,
  `hobbies` varchar(250) NOT NULL,
  `reason_enroll` varchar(500) NOT NULL,
  `characteristics` varchar(500) NOT NULL,
  `goals` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_admiration`
--

INSERT INTO `personal_admiration` (`student_id`, `hobbies`, `reason_enroll`, `characteristics`, `goals`) VALUES
(1, 'qwerty', 'qwertty', 'qwerty', 'qwerty'),
(2, 'qwer', 'qwe', 'qwe', 'qwe'),
(3, 'qwertyy', 'qwertyy', 'qwertyy', 'qwertyyy'),
(4, 'wqert', 'qwertty', 'qweqrtyy', 'qweqwtquu'),
(5, 'qwertyu', 'qwerty', 'qwerty', 'qwerty'),
(6, 'qwerty', 'qwertyrt', 'qweretey', 'qweqerte'),
(7, 'qweerter', 'qwewere', 'qwerte', 'qwertet'),
(8, 'qweqtewt', 'eterqtew', 'etewtew', 'etewtewt'),
(9, 'qweqtrw', 'eqqweqtq', 'eqwrqr', 'qrqweqe'),
(10, 'qwetete', 'wqeqrwtw', 'qweqerwrt', 'qwertet'),
(11, 'qweqrqr', 'wqeqeqrq', 'erwqewqweqr', 'qrqweqweq'),
(12, 'rteete', 'ertertet', 'werw', 'reterte'),
(13, 'rete', 'ertetew', 'ewrwe', 'ewrwrw'),
(14, 'qweqrqtqetq', 'etqetqetwtq', 'wqeqrqertq', 'qerqrqtqteq'),
(15, 'qwerqwrw', 'werwer', 'werwrw', 'wrwer'),
(16, 'qwerwrtrewt', 'qweqweq', 'qweqwe', 'qweqweqwe'),
(17, 'qweqweq', 'qweqew', 'qweqew', 'qweqweqwe'),
(18, 'qweqr', 'wtwtw', 'qeqwe', 'qweqweq'),
(19, 'qweqrq', 'qweqwrqrt', 'qweqwerqr', 'qweqweqr'),
(20, 'qweqrqt', 'qweqwrtq', 'qweqrqe', 'qweqrwrtq'),
(21, 'qweqtwrts', 'asdaswrgg', 'afasfwtw', 'afdafwrtw'),
(22, 'weqqrt', 'wertwe', 'werwer', 'werwrre'),
(23, 'qweqrtq', 'qweqwrqt', 'qweqwrrtq', 'qweqwertq'),
(24, 'ewrwerwe', 'werwrwrt', 'wtwtwt', 'werwerwr'),
(25, 'qweqrtq', 'qweqrtqt', 'qweqrtqt', 'qweqtqt'),
(26, 'qweqrq', 'qeqwerq', 'qweqrq', 'qweqrqr'),
(27, 'ertertet', 'etertert', 'ertete', 'ertreterte'),
(28, 'uyiykh', 'hkhj', 'hjkhkh', 'hklhljl'),
(29, 'qweqeqr', 'qwrqrwqer', 'wrtwtw', 'twtwetwt'),
(30, 'qweqtwert', 'qweqwrwetwet', 'qweqwrwetwet', 'qweqwrwerwertw'),
(31, 'qweqrwt', 'qweqterwt', 'eqrwetrwt', 'werewtertyw'),
(32, 'qweqwrwerw', 'werwerwer', 'werwerwer', 'werwerwerwe'),
(33, 'qweqwrqteeq', 'qewqrwrt', 'qrqrwtw', 'werwerwt'),
(34, 'ewrwfsf', 'werwetwt', 'werwfsdfw', 'erwerwers'),
(35, 'qweqsdtfs', 'afafwte', 'sdfsfewr', 'sdfsdfwe'),
(36, 'qwefdsgdsg', 'sdfdsgdg', 'dfgdshgety', 'dfgdshrt');

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `student_id` int(11) NOT NULL,
  `admit_type` varchar(100) NOT NULL,
  `g11card` varchar(100) DEFAULT NULL,
  `g12card` varchar(100) DEFAULT NULL,
  `torpg1` varchar(100) DEFAULT NULL,
  `torpg2` varchar(100) DEFAULT NULL,
  `goodmoral` varchar(100) NOT NULL,
  `birthcert` varchar(100) NOT NULL,
  `indigency` varchar(100) NOT NULL,
  `voters` varchar(100) NOT NULL,
  `vaxcard` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`student_id`, `admit_type`, `g11card`, `g12card`, `torpg1`, `torpg2`, `goodmoral`, `birthcert`, `indigency`, `voters`, `vaxcard`) VALUES
(1, 'Freshman', '', '', '2022-A-0001.pdf', '2022-A-0001.pdf', '2022-A-0001.pdf', '2022-A-0001.pdf', '2022-A-0001.pdf', '2022-A-0001.pdf', '2022-A-0001.jpg'),
(2, 'Freshman', '2022-A-0002.pdf', '2022-A-0002.pdf', '', '', '2022-A-0002.pdf', '2022-A-0002.pdf', '2022-A-0002.pdf', '2022-A-0002.pdf', ''),
(3, 'Freshman', '2022-A-0003.pdf', '2022-A-0003.pdf', NULL, NULL, '2022-A-0003.pdf', '2022-A-0003.pdf', '2022-A-0003.pdf', '2022-A-0003.pdf', '2022-A-0003.jpg'),
(4, 'Transferee', NULL, NULL, '2022-A-0004.pdf', '2022-A-0004.pdf', '2022-A-0004.pdf', '2022-A-0004.pdf', '2022-A-0004.pdf', '2022-A-0004.pdf', '2022-A-0004.jpg'),
(5, 'Transferee', NULL, NULL, '2022-A-0005.pdf', '2022-A-0005.pdf', '2022-A-0005.pdf', '2022-A-0005.pdf', '2022-A-0005.pdf', '2022-A-0005.pdf', '2022-A-0005.jpg'),
(6, 'Freshman', '2022-A-0006.pdf', '2022-A-0006.pdf', '', '', '2022-A-0006.pdf', '2022-A-0006.pdf', '2022-A-0006.pdf', '2022-A-0006.pdf', ''),
(7, 'Freshman', '2022-A-0007.pdf', '2022-A-0007.pdf', NULL, NULL, '2022-A-0007.pdf', '2022-A-0007.pdf', '2022-A-0007.pdf', '2022-A-0007.pdf', ''),
(8, 'Freshman', '2022-A-0008.pdf', '2022-A-0008.pdf', NULL, NULL, '2022-A-0008.pdf', '2022-A-0008.pdf', '2022-A-0008.pdf', '2022-A-0008.pdf', '2022-A-0008.jpg'),
(9, 'Transferee', NULL, NULL, '2022-A-0009.pdf', '2022-A-0009.pdf', '2022-A-0009.pdf', '2022-A-0009.pdf', '2022-A-0009.pdf', '2022-A-0009.pdf', '2022-A-0009.jpg'),
(10, 'Transferee', '', '', '2022-A-0010.pdf', '2022-A-0010.pdf', '2022-A-0010.pdf', '2022-A-0010.pdf', '2022-A-0010.pdf', '2022-A-0010.pdf', '2022-A-0010.jpg'),
(11, 'Freshman', '2022-A-0011.pdf', '2022-A-0011.pdf', NULL, NULL, '2022-A-0011.pdf', '2022-A-0011.pdf', '2022-A-0011.pdf', '2022-A-0011.pdf', '2022-A-0011.jpg'),
(12, 'Freshman', '2022-A-0012.pdf', '2022-A-0012.pdf', NULL, NULL, '2022-A-0012.pdf', '2022-A-0012.pdf', '2022-A-0012.pdf', '2022-A-0012.pdf', '2022-A-0012.jpg'),
(13, 'Freshman', '2022-A-0013.pdf', '2022-A-0013.pdf', '', '', '2022-A-0013.pdf', '2022-A-0013.pdf', '2022-A-0013.pdf', '2022-A-0013.pdf', '2022-A-0013.jpg'),
(14, 'Freshman', '2022-A-0014.pdf', '2022-A-0014.pdf', NULL, NULL, '2022-A-0014.pdf', '2022-A-0014.pdf', '2022-A-0014.pdf', '2022-A-0014.pdf', '2022-A-0014.jpg'),
(15, 'Transferee', '', '', '2022-A-0015.pdf', '2022-A-0015.pdf', '2022-A-0015.pdf', '2022-A-0015.pdf', '2022-A-0015.pdf', '2022-A-0015.pdf', '2022-A-0015.jpg'),
(16, 'Freshman', '2022-A-0016.pdf', '2022-A-0016.pdf', NULL, NULL, '2022-A-0016.pdf', '2022-A-0016.pdf', '2022-A-0016.pdf', '2022-A-0016.pdf', '2022-A-0016.jpg'),
(17, 'Freshman', '2022-A-0017.pdf', '2022-A-0017.pdf', NULL, NULL, '2022-A-0017.pdf', '2022-A-0017.pdf', '2022-A-0017.pdf', '2022-A-0017.pdf', '2022-A-0017.jpg'),
(18, 'Freshman', '2022-A-0018.pdf', '2022-A-0018.pdf', NULL, NULL, '2022-A-0018.pdf', '2022-A-0018.pdf', '2022-A-0018.pdf', '2022-A-0018.pdf', '2022-A-0018.jpg'),
(19, 'Transferee', NULL, NULL, '2022-A-0019.pdf', '2022-A-0019.pdf', '2022-A-0019.pdf', '2022-A-0019.pdf', '2022-A-0019.pdf', '2022-A-0019.pdf', '2022-A-0019.jpg'),
(20, 'Freshman', '2022-A-0020.pdf', '2022-A-0020.pdf', NULL, NULL, '2022-A-0020.pdf', '2022-A-0020.pdf', '2022-A-0020.pdf', '2022-A-0020.pdf', '2022-A-0020.jpg'),
(21, 'Freshman', '2022-A-0021.pdf', '2022-A-0021.pdf', NULL, NULL, '2022-A-0021.pdf', '2022-A-0021.pdf', '2022-A-0021.pdf', '2022-A-0021.pdf', '2022-A-0021.jpg'),
(22, 'Transferee', NULL, NULL, '2022-A-0022.pdf', '2022-A-0022.pdf', '2022-A-0022.pdf', '2022-A-0022.pdf', '2022-A-0022.pdf', '2022-A-0022.pdf', '2022-A-0022.jpg'),
(23, 'Freshman', '2022-A-0023.pdf', '2022-A-0023.pdf', NULL, NULL, '2022-A-0023.pdf', '2022-A-0023.pdf', '2022-A-0023.pdf', '2022-A-0023.pdf', '2022-A-0023.jpg'),
(24, 'Freshman', '2022-A-0024.pdf', '2022-A-0024.pdf', NULL, NULL, '2022-A-0024.pdf', '2022-A-0024.pdf', '2022-A-0024.pdf', '2022-A-0024.pdf', '2022-A-0024.jpg'),
(25, 'Freshman', '2022-A-0025.pdf', '2022-A-0025.pdf', NULL, NULL, '2022-A-0025.pdf', '2022-A-0025.pdf', '2022-A-0025.pdf', '2022-A-0025.pdf', '2022-A-0025.jpg'),
(26, 'Freshman', '2022-A-0026.pdf', '2022-A-0026.pdf', NULL, NULL, '2022-A-0026.pdf', '2022-A-0026.pdf', '2022-A-0026.pdf', '2022-A-0026.pdf', '2022-A-0026.jpg'),
(27, 'Freshman', '2022-A-0027.pdf', '2022-A-0027.pdf', NULL, NULL, '2022-A-0027.pdf', '2022-A-0027.pdf', '2022-A-0027.pdf', '2022-A-0027.pdf', '2022-A-0027.jpg'),
(28, 'Freshman', '2022-A-0028.pdf', '2022-A-0028.pdf', NULL, NULL, '2022-A-0028.pdf', '2022-A-0028.pdf', '2022-A-0028.pdf', '2022-A-0028.pdf', '2022-A-0028.jpg'),
(29, 'Freshman', '2022-A-0029.pdf', '2022-A-0029.pdf', NULL, NULL, '2022-A-0029.pdf', '2022-A-0029.pdf', '2022-A-0029.pdf', '2022-A-0029.pdf', '2022-A-0029.jpg'),
(30, 'Freshman', '2022-A-0030.pdf', '2022-A-0030.pdf', NULL, NULL, '2022-A-0030.pdf', '2022-A-0030.pdf', '2022-A-0030.pdf', '2022-A-0030.pdf', '2022-A-0030.jpg'),
(31, 'Freshman', '2022-A-0031.pdf', '2022-A-0031.pdf', NULL, NULL, '2022-A-0031.pdf', '2022-A-0031.pdf', '2022-A-0031.pdf', '2022-A-0031.pdf', '2022-A-0031.jpg'),
(32, 'Freshman', '2022-A-0032.pdf', '2022-A-0032.pdf', NULL, NULL, '2022-A-0032.pdf', '2022-A-0032.pdf', '2022-A-0032.pdf', '2022-A-0032.pdf', '2022-A-0032.jpg'),
(33, 'Transferee', NULL, NULL, '2022-A-0033.pdf', '2022-A-0033.pdf', '2022-A-0033.pdf', '2022-A-0033.pdf', '2022-A-0033.pdf', '2022-A-0033.pdf', '2022-A-0033.jpg'),
(34, 'Freshman', '2022-A-0034.pdf', '2022-A-0034.pdf', NULL, NULL, '2022-A-0034.pdf', '2022-A-0034.pdf', '2022-A-0034.pdf', '2022-A-0034.pdf', '2022-A-0034.jpg'),
(35, 'Freshman', '2022-A-0035.pdf', '2022-A-0035.pdf', NULL, NULL, '2022-A-0035.pdf', '2022-A-0035.pdf', '2022-A-0035.pdf', '2022-A-0035.pdf', '2022-A-0035.jpg'),
(36, 'Freshman', '2022-A-0036.pdf', '2022-A-0036.pdf', NULL, NULL, '2022-A-0036.pdf', '2022-A-0036.pdf', '2022-A-0036.pdf', '2022-A-0036.pdf', '2022-A-0036.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student_answers`
--

CREATE TABLE `student_answers` (
  `answer_id` int(11) NOT NULL,
  `application_no` varchar(100) NOT NULL,
  `question_id` int(11) NOT NULL,
  `stud_answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_exam_log`
--

CREATE TABLE `student_exam_log` (
  `log_id` int(11) NOT NULL,
  `application_no` varchar(100) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `time_started` varchar(100) NOT NULL,
  `time_ended` varchar(100) DEFAULT NULL,
  `test_status` varchar(100) NOT NULL,
  `leaveAttempt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_exam_log`
--

INSERT INTO `student_exam_log` (`log_id`, `application_no`, `student_name`, `time_started`, `time_ended`, `test_status`, `leaveAttempt`) VALUES
(1, '2022-A-0027', 'Ali Mateo', '05:19 PM', '05:24 PM', 'Taken', 0),
(2, '2022-A-0008', 'Alvin Tenorio', '05:43 PM', '05:47 PM', 'Taken', 0),
(3, '2022-A-0004', 'Angel Garcia', '05:56 PM', '06:01 PM', 'Taken', 2),
(4, '2022-A-0018', 'Anna Reyes', '06:11 PM', '06:15 PM', 'Taken', 0),
(5, '2022-A-0006', 'Arnold Dalisay', '06:31 PM', '06:35 PM', 'Taken', 0),
(6, '2022-A-0014', 'Muhammad Akbar', '07:15 PM', '07:19 PM', 'Taken', 1),
(7, '2022-A-0009', 'Simon Adolfo', '07:25 PM', '07:29 PM', 'Taken', 1),
(8, '2022-A-0020', 'Palma Lucas', '07:32 PM', '07:32 PM', 'Taken', 2),
(9, '2022-A-0005', 'Paolo Malinao', '07:43 PM', '07:47 PM', 'Taken', 0),
(10, '2022-A-0022', 'Samantha Espina', '07:49 PM', '07:52 PM', 'Taken', 0),
(11, '2022-A-0005', 'Sheena Alarcon', '08:41 PM', '08:42 PM', 'Taken', 2),
(12, '2022-A-0031', 'Oscar Cervantes', '08:44 PM', '08:45 PM', 'Taken', 2),
(13, '2022-A-0019', 'Tiffany Bautista', '08:45 PM', '08:49 PM', 'Taken', 0),
(14, '2022-A-0026', 'Irene Luna', '08:50 PM', '08:54 PM', 'Taken', 0),
(15, '2022-A-0020', 'Seth Rivera', '08:55 PM', '09:00 PM', 'Taken', 2),
(16, '2022-A-0017', 'Jeremy Garcia', '09:00 PM', '09:01 PM', 'Taken', 1),
(17, '2022-A-0022', 'Cedric Pascua', '09:03 PM', '09:04 PM', 'Taken', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `student_id` int(11) NOT NULL,
  `application_no` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `suffix` varchar(45) DEFAULT NULL,
  `stud_age` int(11) NOT NULL,
  `birthplace` varchar(100) NOT NULL,
  `stud_bday` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `civil_status` varchar(100) NOT NULL,
  `spouse_name` varchar(100) DEFAULT NULL,
  `spouse_add` varchar(100) DEFAULT NULL,
  `spouse_no` varchar(100) DEFAULT NULL,
  `spouse_work` varchar(100) DEFAULT NULL,
  `spouse_emp` varchar(100) DEFAULT NULL,
  `admit_type` varchar(100) NOT NULL,
  `stud_email` varchar(100) NOT NULL,
  `contactno` varchar(100) NOT NULL,
  `1stprio` varchar(100) NOT NULL,
  `2ndprio` varchar(100) NOT NULL,
  `resident_of_calamba` varchar(100) NOT NULL,
  `yrs_in_calamba` varchar(100) DEFAULT NULL,
  `pre_house` varchar(100) NOT NULL,
  `pre_brgy` varchar(100) NOT NULL,
  `pre_city` varchar(100) NOT NULL,
  `pre_zipcode` varchar(100) NOT NULL,
  `per_house` varchar(100) NOT NULL,
  `per_brgy` varchar(100) NOT NULL,
  `per_city` varchar(100) NOT NULL,
  `per_zipcode` varchar(100) NOT NULL,
  `groups` varchar(500) NOT NULL,
  `stable_internet` varchar(100) NOT NULL,
  `verification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`student_id`, `application_no`, `picture`, `first_name`, `middle_name`, `last_name`, `suffix`, `stud_age`, `birthplace`, `stud_bday`, `religion`, `gender`, `civil_status`, `spouse_name`, `spouse_add`, `spouse_no`, `spouse_work`, `spouse_emp`, `admit_type`, `stud_email`, `contactno`, `1stprio`, `2ndprio`, `resident_of_calamba`, `yrs_in_calamba`, `pre_house`, `pre_brgy`, `pre_city`, `pre_zipcode`, `per_house`, `per_brgy`, `per_city`, `per_zipcode`, `groups`, `stable_internet`, `verification`) VALUES
(1, '2022-A-0001', '1644940563_1644367690285.jpg', 'Rico', 'Estribo', 'Guinanao', '', 22, 'Quezon', '2022-02-17', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Transferee', 'guinanaorico@gmail.com', '09319542169', 'BSIT', 'BSCS', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'Recipient of 4Ps\nWorking Student', 'Yes', 'Verified'),
(2, '2022-A-0002', 'default_photo.png', 'John', 'Mars', 'Doe', '', 18, 'Quezon', '2022-02-28', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'johndoe@gmail.com', '09319542169', 'BSA', 'BSCS', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified'),
(3, '2022-A-0003', '1645720665_1m.jpg', 'Jose', 'Akbar', 'Santa Maria', '', 22, 'Quezon', '2022-02-16', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'josesm@gmail.com', '09123446575', 'BSCS', 'BSIT', 'Yes', '20', 'Block 1', 'Mapagong', 'Calamba', '4027', 'Block 1', 'Mapagong', 'Calamba', '4027', 'Recipient of 4Ps', '', 'Pending'),
(4, '2022-A-0004', '1645721140_1f.jpg', 'Angel', 'Baron', 'Garcia', '', 20, 'Quezon', '2022-02-02', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Transferee', 'angelgarcia@gmail.com', '09343434343', 'BSAIS', 'BSA', 'Yes', '1', 'Phase 3', 'Banlic', 'Calamba', '4027', 'Phase 3', 'Banlic', 'Calamba', '4027', 'Working Student', 'Yes', 'Verified'),
(5, '2021-A-0005', '1645721821_2f.jpg', 'Sheena', 'Wew', 'Alarcon', '', 22, 'Quezon', '2022-02-08', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Transferee', 'sheenaalarcon@gmail.com', '09319542169', 'BEED', 'BSEM', 'Yes', '1', 'Phase 6', 'Palo-Alto', 'Calamba', '4027', 'Phase 6', 'Palo-Alto', 'Calamba', '4027', 'Person with Disability', 'Yes', 'Verified'),
(6, '2022-A-0006', '1645722195_2m.jpg', 'Arnold', 'Nicdao', 'Dalisay', '', 22, 'Quezon', '2022-02-26', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'arnoldnicdaos@gmail.com', '09251486985', 'BSA', 'BSAIS', 'No', '0', 'Phase 12', 'Barangay Tres', 'Cavite', '4100', 'Block 8', 'Banadero', 'Calamba', '4027', 'Recipient of 4Ps\nWorking Student', 'Yes', 'Verified'),
(7, '2022-A-0007', '1645722525_3f.jpg', 'Kate', 'Xin', 'Uy', '', 22, 'Binondo', '2022-02-09', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'kateuy@gmail.com', '09251486985', 'BSCS', 'BEED', 'Yes', '2', 'Block 1', 'Canlubang', 'Calamba', '4027', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified'),
(8, '2022-A-0008', '1645723260_3m.jpg', 'Alvin', 'Swag', 'Tenorio', '', 20, 'Quezon', '2022-02-28', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'alvintenorio@gmail.com', '09251486985', 'BSEE', 'BEED', 'Yes', '15', 'Block 5', 'Canlubang', 'Calamba', '4027', 'Block 5', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified'),
(9, '2022-A-0009', '1645724440_4m.jpg', 'Simon', 'Adolf', 'Adolfo', '', 22, 'Quezon', '2022-02-24', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Transferee', 'simon@gmail.com', '09231312312', 'BSIT', 'BSAIS', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified'),
(10, '2022-A-0010', '1645766060_4f.jpg', 'Historia', 'Krista', 'Reiss', '', 22, 'Paradis', '2022-02-22', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Transferee', 'historiareiss@gmail.com', '09143424234', 'BSA', 'BSAIS', 'No', '0', '1st District', 'Wall Sina', 'Paradis', '4768', '1st District', 'Wall Sina', 'sd', '4768', 'Member of Indigenous People', '', 'Pending'),
(11, '2022-A-0011', '1645770109_5m.jpg', 'Connie', 'Eldian', 'Springer', '', 18, 'Quezon', '2022-02-23', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'connie@gmail.com', '09238463763', 'BSIT', 'BSCS', 'Yes', '1', 'Imus, Cavite', 'Canlubang', 'sd', '4027', 'Imus, Cavite', 'Canlubang', 'sd', '4027', 'N/A', '', 'Pending'),
(12, '2022-A-0012', '1645770433_6m.jpg', 'Jean', 'Kirstein', 'Valdez', '', 20, 'Quezon', '2022-02-18', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'jeanvaldez@gmail.com', '09127634723', 'BSA', 'BSAIS', 'Yes', '10', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'N/A', 'Yes', 'Pending'),
(13, '2022-A-0013', '1645770713_5f.jpg', 'Hitch', 'Sander', 'Dreyse', '', 20, 'Quezon', '2022-02-09', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'hitchdreyse@gmail.com', '09342423423', 'BSIT', 'BSCS', 'Yes', '1', 'Purok 9', 'Canlubang', 'Calamba', '4027', 'Purok 9', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified'),
(14, '2022-A-0014', '1645771765_7m.jpg', 'Muhammad', 'Anobang kinakain mo', 'Akbar', '', 21, 'Quezon', '2022-03-01', 'Muslim', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'muhammad@gmail.com', '09263728263', 'BEED', 'BEED', 'Yes', '11', 'Block 7', 'Crossing', 'Calamba', '4027', 'Block 7', 'Crossing', 'Calamba', '4027', 'Working Student', 'Yes', 'Verified'),
(15, '2022-A-0015', '1645772172_6f.png', 'Mikasa', 'Ackerman', 'Lamanca', '', 20, 'Quezon', '2022-02-28', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Transferee', 'mikasalamanca@gmail.com', '09231445345', 'BSA', 'BSAIS', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified'),
(16, '2022-A-0016', '1645772687_8m.png', 'Ryan', 'Reynolds', 'Beng', '', 20, 'asd', '2022-02-17', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'ryanbeng@gmail.com', '09251486985', 'BSAIS', 'BEED', 'Yes', '1', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Pending'),
(17, '2021-A-0017', '1645773045_9m.jpg', 'Jeremy', 'Garaga', 'Garcia', '', 21, 'Quezon', '2022-02-09', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'jeremy@gmail.com', '09546821466', 'BSAIS', 'BSA', 'Yes', '1', 'Makati', 'Canlubang', 'Calamba', '4027', 'Makati', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified'),
(18, '2022-A-0018', '1645773461_7f.jpg', 'Anna', 'Ramos', 'Reyes', '', 18, 'Quezon', '2022-02-23', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'annareyes@gmail.com', '09319542169', 'BSIT', 'BSCS', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified'),
(19, '2021-A-0019', '1645773744_8f.jpg', 'Tiffany', 'Cruz', 'Bautista', '', 22, 'Quezon', '2022-02-23', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Transferee', 'tiffany@gmail.com', '09564564564', 'BSEM', 'BSEE', 'Yes', '1', 'Block 14 Lot 76 Majada Out', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada Out', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified'),
(20, '2021-A-0020', '1645774498_10m.jpg', 'Seth', 'Lopez', 'Rivera', '', 22, 'Quezon', '2022-02-01', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'seth@gmail.com', '09251486985', 'BSEE', 'BSEM', 'Yes', '1', 'Imus, Cavite', 'Canlubang', 'Calamba', '4027', 'Imus, Cavite', 'Canlubang', 'Calamba', '4027', 'N/A', 'Yes', 'Verified'),
(21, '2022-A-0021', '1645775133_9f.jpg', 'Rea', 'Ocampo', 'Enriquez', '', 22, 'Quezon', '2022-02-28', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'reaenriquez@gmail.com', '09312323232', 'BSAIS', 'BEED', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified'),
(22, '2021-A-0022', '1645775336_11m.jpg', 'Cedric', 'Pineda', 'Pascua', '', 19, 'Quezon', '2022-02-09', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Transferee', 'cedric@gmail.com', '09319542169', 'BSEM', 'BSES', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified'),
(23, '2022-A-0023', '1645775574_10f.jpg', 'Yuki', 'Cabrera', 'Fajardo', '', 19, 'Quezon', '2022-02-10', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'yuki@gmail.com', '09319542169', 'BSIT', 'BSA', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Pending'),
(24, '2022-A-0024', '1645775874_12m.jpg', 'Denzel', 'Vargas', 'Espinosa', '', 21, 'Quezon', '2022-02-02', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'denzel@gmail.com', '09319542169', 'BSIT', 'BSCS', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Pending'),
(25, '2022-A-0025', '1645776177_13m.jpg', 'Gabriel', 'Borja', 'Roxas', '', 19, 'Quezon', '2022-02-16', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'gabriel@gmail.com', '09319542169', 'BSAIS', 'BEED', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Pending'),
(26, '2022-A-0026', '1645776328_11f.jpg', 'Irene', 'Uy', 'Luna', '', 20, 'Quezon', '2022-02-23', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'irene@gmail.com', '09319542169', 'BSEE', 'BSES', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified'),
(27, '2022-A-0027', '1645776458_12f.jpg', 'Ali', 'Jose', 'Mateo', '', 20, 'Quezon', '2022-02-25', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'ali@gmail.com', '09319542169', 'BSCS', 'BSIT', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified'),
(28, '2022-A-0028', '1645776819_13f.jpg', 'Hanna', 'Manzano', 'Rosario', '', 22, 'Quezon', '2022-02-08', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'hanna@gmail.com', '09319542169', 'BSES', 'BSEE', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Pending'),
(29, '2022-A-0029', '1645777477_14f.jpg', 'Kana', 'Carpio', 'Gallardio', '', 19, 'Quezon', '2022-02-15', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'kana@gmail.com', '09319542169', 'BSEM', 'BEED', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified'),
(30, '2022-A-0030', '1645777670_15m.jpg', 'Lorenzo', 'Pablo', 'Baltazar', '', 20, 'Quezon', '2022-02-16', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'lorenzo@gmail.com', '09251486985', 'BSAIS', 'BSA', 'Yes', '1', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Pending'),
(31, '2022-A-0031', '1645779075_15m.jpg', 'Oscar', 'Baguio', 'Cervantes', '', 21, 'Quezon', '2022-02-23', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'oscar@gmail.com', '09123425356', 'BSIT', 'BSCS', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', 'Yes', 'Verified'),
(32, '2022-A-0005', '1645779232_17m.jpg', 'Paolo', 'Umati', 'Malinao', '', 20, 'Quezon', '2022-02-22', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'paolo@gmail.com', '09319542169', 'BSEM', 'BSEM', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified'),
(33, '2022-A-0017', '1645779452_18m.jpg', 'Keith', 'Roldan', 'Cortes', '', 22, 'Quezon', '2022-02-22', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Transferee', 'keith@gmail.com', '09251486985', 'BEED', 'BSAIS', 'Yes', '1', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified'),
(34, '2022-A-0019', '1645779850_15f.jpg', 'Martha', 'Salinas', 'Lacson', '', 21, 'Quezon', '2022-03-09', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'martha@gmail.com', '09251486985', 'BSEM', 'BSES', 'Yes', '1', 'Phase 2', 'Canlubang', 'Calamba', '4027', 'Phase 2', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified'),
(35, '2022-A-0020', '1645779992_16f.jpg', 'Palma', 'Frias', 'Lucas', '', 21, 'Quezon', '2022-03-03', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'palma@gmail.com', '09251486985', 'BEED', 'BSEM', 'Yes', '1', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified'),
(36, '2022-A-0022', '1645780146_17f.jpg', 'Samantha', 'Catalan', 'Espina', '', 20, 'Quezon', '2022-02-23', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'samantha@gmail.com', '09478563874', 'BEED', 'BSEM', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `admin_logs`
--
ALTER TABLE `admin_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `admission_status`
--
ALTER TABLE `admission_status`
  ADD PRIMARY KEY (`statusID`);

--
-- Indexes for table `annual_reg_stud`
--
ALTER TABLE `annual_reg_stud`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `answer_key`
--
ALTER TABLE `answer_key`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `educ_bg`
--
ALTER TABLE `educ_bg`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `exam_results`
--
ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `fam_bg`
--
ALTER TABLE `fam_bg`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `org_involvement`
--
ALTER TABLE `org_involvement`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `personal_admiration`
--
ALTER TABLE `personal_admiration`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_answers`
--
ALTER TABLE `student_answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `student_exam_log`
--
ALTER TABLE `student_exam_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `admission_status`
--
ALTER TABLE `admission_status`
  MODIFY `statusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `annual_reg_stud`
--
ALTER TABLE `annual_reg_stud`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `answer_key`
--
ALTER TABLE `answer_key`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `educ_bg`
--
ALTER TABLE `educ_bg`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `fam_bg`
--
ALTER TABLE `fam_bg`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `org_involvement`
--
ALTER TABLE `org_involvement`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `personal_admiration`
--
ALTER TABLE `personal_admiration`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `student_answers`
--
ALTER TABLE `student_answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_exam_log`
--
ALTER TABLE `student_exam_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
