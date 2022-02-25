-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2022 at 02:11 PM
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
(8, '2022-A-0035', 'Palma Lucas', 5, 542, 1, 1, 'Below Average'),
(9, '2022-A-0032', 'Paolo Malinao', 60, 706, 80, 7, 'Above Average'),
(10, '2022-A-0036', 'Samantha Espina', 44, 660, 37, 4, 'Average'),
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

--
-- Dumping data for table `student_answers`
--

INSERT INTO `student_answers` (`answer_id`, `application_no`, `question_id`, `stud_answer`) VALUES
(1, '2022-A-0027', 1, 'D'),
(2, '2022-A-0027', 2, 'G'),
(3, '2022-A-0027', 3, 'D'),
(4, '2022-A-0027', 4, 'H'),
(5, '2022-A-0027', 5, 'E'),
(6, '2022-A-0027', 6, 'H'),
(7, '2022-A-0027', 7, 'E'),
(8, '2022-A-0027', 8, 'H'),
(9, '2022-A-0027', 9, 'B'),
(10, '2022-A-0027', 10, 'J'),
(11, '2022-A-0027', 11, 'D'),
(12, '2022-A-0027', 12, 'J'),
(13, '2022-A-0027', 13, 'A'),
(14, '2022-A-0027', 14, 'J'),
(15, '2022-A-0027', 15, 'B'),
(16, '2022-A-0027', 16, 'J'),
(17, '2022-A-0027', 17, 'B'),
(18, '2022-A-0027', 18, 'G'),
(19, '2022-A-0027', 19, 'C'),
(20, '2022-A-0027', 20, 'J'),
(21, '2022-A-0027', 21, 'D'),
(22, '2022-A-0027', 22, 'J'),
(23, '2022-A-0027', 23, 'C'),
(24, '2022-A-0027', 24, 'F'),
(25, '2022-A-0027', 25, 'E'),
(26, '2022-A-0027', 26, 'F'),
(27, '2022-A-0027', 27, 'C'),
(28, '2022-A-0027', 28, 'I'),
(29, '2022-A-0027', 29, 'E'),
(30, '2022-A-0027', 30, 'H'),
(31, '2022-A-0027', 31, 'B'),
(32, '2022-A-0027', 32, 'J'),
(33, '2022-A-0027', 33, 'B'),
(34, '2022-A-0027', 34, 'I'),
(35, '2022-A-0027', 35, 'E'),
(36, '2022-A-0027', 36, 'I'),
(37, '2022-A-0027', 37, 'D'),
(38, '2022-A-0027', 38, 'I'),
(39, '2022-A-0027', 39, 'D'),
(40, '2022-A-0027', 40, 'I'),
(41, '2022-A-0027', 41, 'E'),
(42, '2022-A-0027', 42, 'G'),
(43, '2022-A-0027', 43, 'A'),
(44, '2022-A-0027', 44, 'I'),
(45, '2022-A-0027', 45, 'E'),
(46, '2022-A-0027', 46, 'H'),
(47, '2022-A-0027', 47, 'C'),
(48, '2022-A-0027', 48, 'F'),
(49, '2022-A-0027', 49, 'C'),
(50, '2022-A-0027', 50, 'I'),
(51, '2022-A-0027', 51, 'B'),
(52, '2022-A-0027', 52, 'F'),
(53, '2022-A-0027', 53, 'A'),
(54, '2022-A-0027', 54, 'F'),
(55, '2022-A-0027', 55, 'E'),
(56, '2022-A-0027', 56, 'G'),
(57, '2022-A-0027', 57, 'D'),
(58, '2022-A-0027', 58, 'H'),
(59, '2022-A-0027', 59, 'C'),
(60, '2022-A-0027', 60, 'G'),
(61, '2022-A-0027', 61, 'E'),
(62, '2022-A-0027', 62, 'G'),
(63, '2022-A-0027', 63, 'B'),
(64, '2022-A-0027', 64, 'H'),
(65, '2022-A-0027', 65, 'E'),
(66, '2022-A-0027', 66, 'I'),
(67, '2022-A-0027', 67, 'E'),
(68, '2022-A-0027', 68, 'J'),
(69, '2022-A-0027', 69, 'C'),
(70, '2022-A-0027', 70, 'F'),
(71, '2022-A-0027', 71, 'A'),
(72, '2022-A-0027', 72, 'F'),
(73, '2022-A-0027', 73, ''),
(74, '2022-A-0008', 1, 'B'),
(75, '2022-A-0008', 2, 'F'),
(76, '2022-A-0008', 3, 'A'),
(77, '2022-A-0008', 4, 'F'),
(78, '2022-A-0008', 5, 'C'),
(79, '2022-A-0008', 6, 'I'),
(80, '2022-A-0008', 7, 'D'),
(81, '2022-A-0008', 8, 'G'),
(82, '2022-A-0008', 9, 'A'),
(83, '2022-A-0008', 10, 'G'),
(84, '2022-A-0008', 11, 'B'),
(85, '2022-A-0008', 12, 'G'),
(86, '2022-A-0008', 13, 'B'),
(87, '2022-A-0008', 14, 'G'),
(88, '2022-A-0008', 15, 'D'),
(89, '2022-A-0008', 16, 'H'),
(90, '2022-A-0008', 17, 'D'),
(91, '2022-A-0008', 18, 'I'),
(92, '2022-A-0008', 19, 'A'),
(93, '2022-A-0008', 20, 'H'),
(94, '2022-A-0008', 21, 'B'),
(95, '2022-A-0008', 22, 'G'),
(96, '2022-A-0008', 23, 'A'),
(97, '2022-A-0008', 24, 'I'),
(98, '2022-A-0008', 25, 'E'),
(99, '2022-A-0008', 26, 'F'),
(100, '2022-A-0008', 27, 'C'),
(101, '2022-A-0008', 28, 'I'),
(102, '2022-A-0008', 29, 'E'),
(103, '2022-A-0008', 30, 'H'),
(104, '2022-A-0008', 31, 'D'),
(105, '2022-A-0008', 32, 'J'),
(106, '2022-A-0008', 33, 'B'),
(107, '2022-A-0008', 34, 'I'),
(108, '2022-A-0008', 35, 'E'),
(109, '2022-A-0008', 36, 'I'),
(110, '2022-A-0008', 37, 'D'),
(111, '2022-A-0008', 38, 'I'),
(112, '2022-A-0008', 39, 'D'),
(113, '2022-A-0008', 40, 'I'),
(114, '2022-A-0008', 41, 'E'),
(115, '2022-A-0008', 42, 'G'),
(116, '2022-A-0008', 43, 'A'),
(117, '2022-A-0008', 44, 'I'),
(118, '2022-A-0008', 45, 'E'),
(119, '2022-A-0008', 46, 'H'),
(120, '2022-A-0008', 47, 'C'),
(121, '2022-A-0008', 48, 'F'),
(122, '2022-A-0008', 49, 'C'),
(123, '2022-A-0008', 50, 'I'),
(124, '2022-A-0008', 51, 'B'),
(125, '2022-A-0008', 52, 'F'),
(126, '2022-A-0008', 53, 'A'),
(127, '2022-A-0008', 54, 'F'),
(128, '2022-A-0008', 55, 'E'),
(129, '2022-A-0008', 56, 'G'),
(130, '2022-A-0008', 57, 'D'),
(131, '2022-A-0008', 58, 'J'),
(132, '2022-A-0008', 59, 'D'),
(133, '2022-A-0008', 60, 'G'),
(134, '2022-A-0008', 61, 'E'),
(135, '2022-A-0008', 62, 'G'),
(136, '2022-A-0008', 63, 'B'),
(137, '2022-A-0008', 64, 'H'),
(138, '2022-A-0008', 65, 'E'),
(139, '2022-A-0008', 66, 'I'),
(140, '2022-A-0008', 67, 'E'),
(141, '2022-A-0008', 68, 'J'),
(142, '2022-A-0008', 69, 'C'),
(143, '2022-A-0008', 70, 'F'),
(144, '2022-A-0008', 71, 'A'),
(145, '2022-A-0008', 72, 'F'),
(146, '2022-A-0008', 73, ''),
(147, '2022-A-0004', 1, 'C'),
(148, '2022-A-0004', 2, 'H'),
(149, '2022-A-0004', 3, 'C'),
(150, '2022-A-0004', 4, 'F'),
(151, '2022-A-0004', 5, 'A'),
(152, '2022-A-0004', 6, 'I'),
(153, '2022-A-0004', 8, 'G'),
(154, '2022-A-0004', 9, 'D'),
(155, '2022-A-0004', 10, 'H'),
(156, '2022-A-0004', 11, 'D'),
(157, '2022-A-0004', 12, 'I'),
(158, '2022-A-0004', 13, 'B'),
(159, '2022-A-0004', 14, 'H'),
(160, '2022-A-0004', 15, 'D'),
(161, '2022-A-0004', 16, 'I'),
(162, '2022-A-0004', 17, 'C'),
(163, '2022-A-0004', 18, 'I'),
(164, '2022-A-0004', 19, 'D'),
(165, '2022-A-0004', 20, 'H'),
(166, '2022-A-0004', 21, 'C'),
(167, '2022-A-0004', 22, 'G'),
(168, '2022-A-0004', 23, 'B'),
(169, '2022-A-0004', 24, 'H'),
(170, '2022-A-0004', 25, 'E'),
(171, '2022-A-0004', 26, 'I'),
(172, '2022-A-0004', 27, 'E'),
(173, '2022-A-0004', 28, 'I'),
(174, '2022-A-0004', 29, 'E'),
(175, '2022-A-0004', 30, 'H'),
(176, '2022-A-0004', 31, 'D'),
(177, '2022-A-0004', 32, 'J'),
(178, '2022-A-0004', 33, 'B'),
(179, '2022-A-0004', 34, 'I'),
(180, '2022-A-0004', 35, 'E'),
(181, '2022-A-0004', 36, 'I'),
(182, '2022-A-0004', 73, ''),
(183, '2022-A-0018', 1, 'C'),
(184, '2022-A-0018', 2, 'H'),
(185, '2022-A-0018', 3, 'C'),
(186, '2022-A-0018', 4, 'H'),
(187, '2022-A-0018', 5, 'E'),
(188, '2022-A-0018', 6, 'H'),
(189, '2022-A-0018', 7, 'E'),
(190, '2022-A-0018', 8, 'H'),
(191, '2022-A-0018', 9, 'B'),
(192, '2022-A-0018', 10, 'J'),
(193, '2022-A-0018', 11, 'D'),
(194, '2022-A-0018', 12, 'J'),
(195, '2022-A-0018', 13, 'A'),
(196, '2022-A-0018', 14, 'J'),
(197, '2022-A-0018', 15, 'B'),
(198, '2022-A-0018', 16, 'I'),
(199, '2022-A-0018', 17, 'C'),
(200, '2022-A-0018', 18, 'G'),
(201, '2022-A-0018', 19, 'C'),
(202, '2022-A-0018', 20, 'J'),
(203, '2022-A-0018', 21, 'D'),
(204, '2022-A-0018', 22, 'J'),
(205, '2022-A-0018', 23, 'C'),
(206, '2022-A-0018', 24, 'F'),
(207, '2022-A-0018', 25, 'E'),
(208, '2022-A-0018', 26, 'F'),
(209, '2022-A-0018', 27, 'C'),
(210, '2022-A-0018', 28, 'I'),
(211, '2022-A-0018', 29, 'E'),
(212, '2022-A-0018', 30, 'H'),
(213, '2022-A-0018', 31, 'D'),
(214, '2022-A-0018', 32, 'H'),
(215, '2022-A-0018', 33, 'B'),
(216, '2022-A-0018', 34, 'I'),
(217, '2022-A-0018', 35, 'E'),
(218, '2022-A-0018', 36, 'I'),
(219, '2022-A-0018', 37, 'D'),
(220, '2022-A-0018', 38, 'I'),
(221, '2022-A-0018', 39, 'D'),
(222, '2022-A-0018', 40, 'I'),
(223, '2022-A-0018', 41, 'E'),
(224, '2022-A-0018', 42, 'G'),
(225, '2022-A-0018', 43, 'A'),
(226, '2022-A-0018', 44, 'I'),
(227, '2022-A-0018', 45, 'E'),
(228, '2022-A-0018', 46, 'H'),
(229, '2022-A-0018', 47, 'C'),
(230, '2022-A-0018', 48, 'F'),
(231, '2022-A-0018', 49, 'C'),
(232, '2022-A-0018', 50, 'G'),
(233, '2022-A-0018', 51, 'D'),
(234, '2022-A-0018', 52, 'H'),
(235, '2022-A-0018', 53, 'B'),
(236, '2022-A-0018', 54, 'F'),
(237, '2022-A-0018', 55, 'E'),
(238, '2022-A-0018', 56, 'G'),
(239, '2022-A-0018', 57, 'D'),
(240, '2022-A-0018', 58, 'J'),
(241, '2022-A-0018', 59, 'D'),
(242, '2022-A-0018', 60, 'G'),
(243, '2022-A-0018', 61, 'E'),
(244, '2022-A-0018', 62, 'G'),
(245, '2022-A-0018', 63, 'B'),
(246, '2022-A-0018', 64, 'H'),
(247, '2022-A-0018', 65, 'E'),
(248, '2022-A-0018', 66, 'I'),
(249, '2022-A-0018', 67, 'E'),
(250, '2022-A-0018', 68, 'F'),
(251, '2022-A-0018', 69, 'C'),
(252, '2022-A-0018', 70, 'G'),
(253, '2022-A-0018', 71, 'A'),
(254, '2022-A-0018', 72, 'F'),
(255, '2022-A-0018', 73, ''),
(256, '2022-A-0006', 1, 'B'),
(257, '2022-A-0006', 2, 'H'),
(258, '2022-A-0006', 3, 'B'),
(259, '2022-A-0006', 4, 'F'),
(260, '2022-A-0006', 5, 'C'),
(261, '2022-A-0006', 6, 'J'),
(262, '2022-A-0006', 7, 'C'),
(263, '2022-A-0006', 8, 'G'),
(264, '2022-A-0006', 9, 'C'),
(265, '2022-A-0006', 10, 'J'),
(266, '2022-A-0006', 11, 'C'),
(267, '2022-A-0006', 12, 'G'),
(268, '2022-A-0006', 13, 'C'),
(269, '2022-A-0006', 14, 'I'),
(270, '2022-A-0006', 15, 'E'),
(271, '2022-A-0006', 16, 'H'),
(272, '2022-A-0006', 17, 'C'),
(273, '2022-A-0006', 18, 'I'),
(274, '2022-A-0006', 19, 'C'),
(275, '2022-A-0006', 20, 'H'),
(276, '2022-A-0006', 21, 'A'),
(277, '2022-A-0006', 22, 'H'),
(278, '2022-A-0006', 23, 'D'),
(279, '2022-A-0006', 24, 'G'),
(280, '2022-A-0006', 25, 'E'),
(281, '2022-A-0006', 26, 'I'),
(282, '2022-A-0006', 27, 'C'),
(283, '2022-A-0006', 28, 'I'),
(284, '2022-A-0006', 29, 'E'),
(285, '2022-A-0006', 30, 'H'),
(286, '2022-A-0006', 31, 'D'),
(287, '2022-A-0006', 32, 'F'),
(288, '2022-A-0006', 33, 'B'),
(289, '2022-A-0006', 34, 'H'),
(290, '2022-A-0006', 35, 'E'),
(291, '2022-A-0006', 36, 'I'),
(292, '2022-A-0006', 37, 'D'),
(293, '2022-A-0006', 38, 'I'),
(294, '2022-A-0006', 39, 'D'),
(295, '2022-A-0006', 40, 'I'),
(296, '2022-A-0006', 41, 'E'),
(297, '2022-A-0006', 42, 'G'),
(298, '2022-A-0006', 43, 'A'),
(299, '2022-A-0006', 44, 'I'),
(300, '2022-A-0006', 45, 'E'),
(301, '2022-A-0006', 46, 'H'),
(302, '2022-A-0006', 47, 'C'),
(303, '2022-A-0006', 48, 'F'),
(304, '2022-A-0006', 49, 'C'),
(305, '2022-A-0006', 50, 'I'),
(306, '2022-A-0006', 51, 'B'),
(307, '2022-A-0006', 52, 'F'),
(308, '2022-A-0006', 53, 'A'),
(309, '2022-A-0006', 54, 'F'),
(310, '2022-A-0006', 55, 'E'),
(311, '2022-A-0006', 56, 'G'),
(312, '2022-A-0006', 57, 'D'),
(313, '2022-A-0006', 58, 'G'),
(314, '2022-A-0006', 59, 'D'),
(315, '2022-A-0006', 60, 'G'),
(316, '2022-A-0006', 61, 'E'),
(317, '2022-A-0006', 62, 'G'),
(318, '2022-A-0006', 63, 'B'),
(319, '2022-A-0006', 64, 'H'),
(320, '2022-A-0006', 65, 'E'),
(321, '2022-A-0006', 66, 'I'),
(322, '2022-A-0006', 67, 'E'),
(323, '2022-A-0006', 68, 'J'),
(324, '2022-A-0006', 69, 'C'),
(325, '2022-A-0006', 70, 'F'),
(326, '2022-A-0006', 71, 'A'),
(327, '2022-A-0006', 72, 'F'),
(328, '2022-A-0006', 73, ''),
(329, '2022-A-0014', 1, 'C'),
(330, '2022-A-0014', 2, 'H'),
(331, '2022-A-0014', 3, 'B'),
(332, '2022-A-0014', 4, 'G'),
(333, '2022-A-0014', 5, 'B'),
(334, '2022-A-0014', 6, 'G'),
(335, '2022-A-0014', 7, 'C'),
(336, '2022-A-0014', 8, 'G'),
(337, '2022-A-0014', 9, 'B'),
(338, '2022-A-0014', 10, 'I'),
(339, '2022-A-0014', 11, 'C'),
(340, '2022-A-0014', 12, 'G'),
(341, '2022-A-0014', 13, 'B'),
(342, '2022-A-0014', 14, 'H'),
(343, '2022-A-0014', 15, 'D'),
(344, '2022-A-0014', 16, 'G'),
(345, '2022-A-0014', 17, 'B'),
(346, '2022-A-0014', 18, 'G'),
(347, '2022-A-0014', 19, 'B'),
(348, '2022-A-0014', 20, 'I'),
(349, '2022-A-0014', 21, 'D'),
(350, '2022-A-0014', 22, 'G'),
(351, '2022-A-0014', 23, 'C'),
(352, '2022-A-0014', 24, 'I'),
(353, '2022-A-0014', 25, 'E'),
(354, '2022-A-0014', 26, 'F'),
(355, '2022-A-0014', 27, 'C'),
(356, '2022-A-0014', 28, 'I'),
(357, '2022-A-0014', 29, 'A'),
(358, '2022-A-0014', 30, 'F'),
(359, '2022-A-0014', 31, 'A'),
(360, '2022-A-0014', 32, 'G'),
(361, '2022-A-0014', 33, 'B'),
(362, '2022-A-0014', 34, 'I'),
(363, '2022-A-0014', 35, 'E'),
(364, '2022-A-0014', 36, 'I'),
(365, '2022-A-0014', 37, 'D'),
(366, '2022-A-0014', 38, 'I'),
(367, '2022-A-0014', 39, 'D'),
(368, '2022-A-0014', 40, 'I'),
(369, '2022-A-0014', 41, 'E'),
(370, '2022-A-0014', 42, 'G'),
(371, '2022-A-0014', 43, 'A'),
(372, '2022-A-0014', 44, 'I'),
(373, '2022-A-0014', 45, 'E'),
(374, '2022-A-0014', 46, 'H'),
(375, '2022-A-0014', 47, 'C'),
(376, '2022-A-0014', 48, 'F'),
(377, '2022-A-0014', 49, 'C'),
(378, '2022-A-0014', 50, 'I'),
(379, '2022-A-0014', 51, 'B'),
(380, '2022-A-0014', 52, 'F'),
(381, '2022-A-0014', 53, 'A'),
(382, '2022-A-0014', 54, 'F'),
(383, '2022-A-0014', 55, 'E'),
(384, '2022-A-0014', 56, 'G'),
(385, '2022-A-0014', 57, 'C'),
(386, '2022-A-0014', 58, 'G'),
(387, '2022-A-0014', 59, 'D'),
(388, '2022-A-0014', 60, 'G'),
(389, '2022-A-0014', 61, 'C'),
(390, '2022-A-0014', 62, 'G'),
(391, '2022-A-0014', 63, 'B'),
(392, '2022-A-0014', 64, 'H'),
(393, '2022-A-0014', 65, 'E'),
(394, '2022-A-0014', 66, 'I'),
(395, '2022-A-0014', 67, 'E'),
(396, '2022-A-0014', 68, 'J'),
(397, '2022-A-0014', 69, 'C'),
(398, '2022-A-0014', 70, 'F'),
(399, '2022-A-0014', 71, 'A'),
(400, '2022-A-0014', 72, 'F'),
(401, '2022-A-0014', 73, ''),
(402, '2022-A-0009', 1, 'D'),
(403, '2022-A-0009', 2, 'G'),
(404, '2022-A-0009', 3, 'D'),
(405, '2022-A-0009', 4, 'H'),
(406, '2022-A-0009', 5, 'E'),
(407, '2022-A-0009', 6, 'J'),
(408, '2022-A-0009', 7, 'E'),
(409, '2022-A-0009', 8, 'H'),
(410, '2022-A-0009', 9, 'B'),
(411, '2022-A-0009', 10, 'J'),
(412, '2022-A-0009', 11, 'D'),
(413, '2022-A-0009', 12, 'I'),
(414, '2022-A-0009', 13, 'A'),
(415, '2022-A-0009', 14, 'J'),
(416, '2022-A-0009', 15, 'B'),
(417, '2022-A-0009', 16, 'H'),
(418, '2022-A-0009', 17, 'B'),
(419, '2022-A-0009', 18, 'G'),
(420, '2022-A-0009', 19, 'C'),
(421, '2022-A-0009', 20, 'J'),
(422, '2022-A-0009', 21, 'D'),
(423, '2022-A-0009', 22, 'J'),
(424, '2022-A-0009', 23, 'C'),
(425, '2022-A-0009', 24, 'F'),
(426, '2022-A-0009', 25, 'E'),
(427, '2022-A-0009', 26, 'F'),
(428, '2022-A-0009', 27, 'C'),
(429, '2022-A-0009', 28, 'I'),
(430, '2022-A-0009', 29, 'E'),
(431, '2022-A-0009', 30, 'H'),
(432, '2022-A-0009', 31, 'D'),
(433, '2022-A-0009', 32, 'H'),
(434, '2022-A-0009', 33, 'B'),
(435, '2022-A-0009', 34, 'I'),
(436, '2022-A-0009', 35, 'E'),
(437, '2022-A-0009', 36, 'I'),
(438, '2022-A-0009', 37, 'D'),
(439, '2022-A-0009', 38, 'I'),
(440, '2022-A-0009', 39, 'D'),
(441, '2022-A-0009', 40, 'I'),
(442, '2022-A-0009', 41, 'E'),
(443, '2022-A-0009', 42, 'G'),
(444, '2022-A-0009', 43, 'A'),
(445, '2022-A-0009', 44, 'I'),
(446, '2022-A-0009', 45, 'E'),
(447, '2022-A-0009', 46, 'H'),
(448, '2022-A-0009', 47, 'C'),
(449, '2022-A-0009', 48, 'F'),
(450, '2022-A-0009', 49, 'C'),
(451, '2022-A-0009', 50, 'G'),
(452, '2022-A-0009', 51, 'D'),
(453, '2022-A-0009', 52, 'F'),
(454, '2022-A-0009', 53, 'A'),
(455, '2022-A-0009', 54, 'F'),
(456, '2022-A-0009', 55, 'E'),
(457, '2022-A-0009', 56, 'G'),
(458, '2022-A-0009', 57, 'C'),
(459, '2022-A-0009', 58, 'F'),
(460, '2022-A-0009', 59, 'D'),
(461, '2022-A-0009', 60, 'G'),
(462, '2022-A-0009', 61, 'E'),
(463, '2022-A-0009', 62, 'G'),
(464, '2022-A-0009', 63, 'B'),
(465, '2022-A-0009', 64, 'H'),
(466, '2022-A-0009', 65, 'E'),
(467, '2022-A-0009', 66, 'I'),
(468, '2022-A-0009', 67, 'E'),
(469, '2022-A-0009', 68, 'I'),
(470, '2022-A-0009', 69, 'C'),
(471, '2022-A-0009', 70, 'F'),
(472, '2022-A-0009', 71, 'A'),
(473, '2022-A-0009', 72, 'F'),
(474, '2022-A-0009', 73, ''),
(475, '2022-A-0035', 1, 'E'),
(476, '2022-A-0035', 2, 'G'),
(477, '2022-A-0035', 3, 'D'),
(478, '2022-A-0035', 4, 'H'),
(479, '2022-A-0035', 5, 'E'),
(480, '2022-A-0035', 6, 'H'),
(481, '2022-A-0035', 73, ''),
(482, '2022-A-0032', 1, 'D'),
(483, '2022-A-0032', 2, 'G'),
(484, '2022-A-0032', 3, 'D'),
(485, '2022-A-0032', 4, 'H'),
(486, '2022-A-0032', 5, 'E'),
(487, '2022-A-0032', 6, 'H'),
(488, '2022-A-0032', 7, 'E'),
(489, '2022-A-0032', 8, 'H'),
(490, '2022-A-0032', 9, 'B'),
(491, '2022-A-0032', 10, 'J'),
(492, '2022-A-0032', 11, 'D'),
(493, '2022-A-0032', 12, 'J'),
(494, '2022-A-0032', 13, 'A'),
(495, '2022-A-0032', 14, 'J'),
(496, '2022-A-0032', 15, 'B'),
(497, '2022-A-0032', 16, 'J'),
(498, '2022-A-0032', 17, 'B'),
(499, '2022-A-0032', 18, 'G'),
(500, '2022-A-0032', 19, 'C'),
(501, '2022-A-0032', 20, 'J'),
(502, '2022-A-0032', 21, 'D'),
(503, '2022-A-0032', 22, 'G'),
(504, '2022-A-0032', 23, 'D'),
(505, '2022-A-0032', 24, 'I'),
(506, '2022-A-0032', 25, 'E'),
(507, '2022-A-0032', 26, 'F'),
(508, '2022-A-0032', 27, 'A'),
(509, '2022-A-0032', 28, 'H'),
(510, '2022-A-0032', 29, 'B'),
(511, '2022-A-0032', 30, 'H'),
(512, '2022-A-0032', 31, 'B'),
(513, '2022-A-0032', 32, 'G'),
(514, '2022-A-0032', 33, 'B'),
(515, '2022-A-0032', 34, 'I'),
(516, '2022-A-0032', 35, 'E'),
(517, '2022-A-0032', 36, 'I'),
(518, '2022-A-0032', 37, 'D'),
(519, '2022-A-0032', 38, 'I'),
(520, '2022-A-0032', 39, 'D'),
(521, '2022-A-0032', 40, 'I'),
(522, '2022-A-0032', 41, 'E'),
(523, '2022-A-0032', 42, 'G'),
(524, '2022-A-0032', 43, 'A'),
(525, '2022-A-0032', 44, 'H'),
(526, '2022-A-0032', 45, 'E'),
(527, '2022-A-0032', 46, 'H'),
(528, '2022-A-0032', 47, 'C'),
(529, '2022-A-0032', 48, 'F'),
(530, '2022-A-0032', 49, 'C'),
(531, '2022-A-0032', 50, 'I'),
(532, '2022-A-0032', 51, 'B'),
(533, '2022-A-0032', 52, 'F'),
(534, '2022-A-0032', 53, 'A'),
(535, '2022-A-0032', 54, 'F'),
(536, '2022-A-0032', 55, 'E'),
(537, '2022-A-0032', 56, 'G'),
(538, '2022-A-0032', 57, 'D'),
(539, '2022-A-0032', 58, 'G'),
(540, '2022-A-0032', 59, 'B'),
(541, '2022-A-0032', 60, 'G'),
(542, '2022-A-0032', 61, 'E'),
(543, '2022-A-0032', 62, 'G'),
(544, '2022-A-0032', 63, 'B'),
(545, '2022-A-0032', 64, 'H'),
(546, '2022-A-0032', 65, 'E'),
(547, '2022-A-0032', 66, 'I'),
(548, '2022-A-0032', 67, 'E'),
(549, '2022-A-0032', 68, 'H'),
(550, '2022-A-0032', 69, 'C'),
(551, '2022-A-0032', 70, 'F'),
(552, '2022-A-0032', 71, 'A'),
(553, '2022-A-0032', 72, 'F'),
(554, '2022-A-0032', 73, ''),
(555, '2022-A-0036', 1, 'D'),
(556, '2022-A-0036', 2, 'I'),
(557, '2022-A-0036', 3, 'B'),
(558, '2022-A-0036', 4, 'H'),
(559, '2022-A-0036', 5, 'A'),
(560, '2022-A-0036', 6, 'F'),
(561, '2022-A-0036', 7, 'A'),
(562, '2022-A-0036', 8, 'F'),
(563, '2022-A-0036', 9, 'A'),
(564, '2022-A-0036', 10, 'F'),
(565, '2022-A-0036', 11, 'A'),
(566, '2022-A-0036', 12, 'F'),
(567, '2022-A-0036', 13, 'B'),
(568, '2022-A-0036', 14, 'H'),
(569, '2022-A-0036', 15, 'A'),
(570, '2022-A-0036', 16, 'F'),
(571, '2022-A-0036', 17, 'A'),
(572, '2022-A-0036', 18, 'F'),
(573, '2022-A-0036', 19, 'A'),
(574, '2022-A-0036', 20, 'F'),
(575, '2022-A-0036', 21, 'A'),
(576, '2022-A-0036', 22, 'F'),
(577, '2022-A-0036', 23, 'A'),
(578, '2022-A-0036', 24, 'H'),
(579, '2022-A-0036', 25, 'E'),
(580, '2022-A-0036', 26, 'F'),
(581, '2022-A-0036', 27, 'C'),
(582, '2022-A-0036', 28, 'I'),
(583, '2022-A-0036', 29, 'E'),
(584, '2022-A-0036', 30, 'H'),
(585, '2022-A-0036', 31, 'C'),
(586, '2022-A-0036', 32, 'G'),
(587, '2022-A-0036', 33, 'B'),
(588, '2022-A-0036', 34, 'I'),
(589, '2022-A-0036', 35, 'E'),
(590, '2022-A-0036', 36, 'I'),
(591, '2022-A-0036', 37, 'D'),
(592, '2022-A-0036', 38, 'I'),
(593, '2022-A-0036', 39, 'D'),
(594, '2022-A-0036', 40, 'I'),
(595, '2022-A-0036', 41, 'E'),
(596, '2022-A-0036', 42, 'G'),
(597, '2022-A-0036', 43, 'A'),
(598, '2022-A-0036', 44, 'I'),
(599, '2022-A-0036', 45, 'E'),
(600, '2022-A-0036', 46, 'H'),
(601, '2022-A-0036', 47, 'C'),
(602, '2022-A-0036', 48, 'F'),
(603, '2022-A-0036', 49, 'C'),
(604, '2022-A-0036', 50, 'I'),
(605, '2022-A-0036', 51, 'B'),
(606, '2022-A-0036', 52, 'F'),
(607, '2022-A-0036', 53, 'A'),
(608, '2022-A-0036', 54, 'F'),
(609, '2022-A-0036', 55, 'E'),
(610, '2022-A-0036', 56, 'G'),
(611, '2022-A-0036', 57, 'C'),
(612, '2022-A-0036', 58, 'F'),
(613, '2022-A-0036', 59, 'B'),
(614, '2022-A-0036', 60, 'G'),
(615, '2022-A-0036', 61, 'E'),
(616, '2022-A-0036', 62, 'G'),
(617, '2022-A-0036', 63, 'B'),
(618, '2022-A-0036', 64, 'H'),
(619, '2022-A-0036', 65, 'E'),
(620, '2022-A-0036', 66, 'I'),
(621, '2022-A-0036', 67, 'E'),
(622, '2022-A-0036', 68, 'G'),
(623, '2022-A-0036', 69, 'C'),
(624, '2022-A-0036', 70, 'F'),
(625, '2022-A-0036', 71, 'A'),
(626, '2022-A-0036', 72, 'F'),
(627, '2022-A-0036', 73, ''),
(628, '2022-A-0005', 1, 'D'),
(629, '2022-A-0005', 2, 'G'),
(630, '2022-A-0005', 3, 'D'),
(631, '2022-A-0005', 4, 'H'),
(632, '2022-A-0005', 5, 'E'),
(633, '2022-A-0005', 6, 'H'),
(634, '2022-A-0005', 7, 'E'),
(635, '2022-A-0005', 8, 'H'),
(636, '2022-A-0005', 9, 'B'),
(637, '2022-A-0005', 10, 'G'),
(638, '2022-A-0005', 11, 'C'),
(639, '2022-A-0005', 73, ''),
(640, '2022-A-0031', 1, 'D'),
(641, '2022-A-0031', 2, 'G'),
(642, '2022-A-0031', 3, 'D'),
(643, '2022-A-0031', 4, 'H'),
(644, '2022-A-0031', 5, 'D'),
(645, '2022-A-0031', 6, 'H'),
(646, '2022-A-0031', 7, 'C'),
(647, '2022-A-0031', 8, 'G'),
(648, '2022-A-0031', 9, 'C'),
(649, '2022-A-0031', 10, 'H'),
(650, '2022-A-0031', 11, 'C'),
(651, '2022-A-0031', 12, 'H'),
(652, '2022-A-0031', 13, 'B'),
(653, '2022-A-0031', 14, 'G'),
(654, '2022-A-0031', 15, 'C'),
(655, '2022-A-0031', 16, 'G'),
(656, '2022-A-0031', 17, 'B'),
(657, '2022-A-0031', 73, ''),
(658, '2022-A-0019', 1, 'C'),
(659, '2022-A-0019', 2, 'I'),
(660, '2022-A-0019', 3, 'D'),
(661, '2022-A-0019', 4, 'H'),
(662, '2022-A-0019', 5, 'E'),
(663, '2022-A-0019', 6, 'H'),
(664, '2022-A-0019', 7, 'E'),
(665, '2022-A-0019', 8, 'H'),
(666, '2022-A-0019', 9, 'B'),
(667, '2022-A-0019', 10, 'J'),
(668, '2022-A-0019', 11, 'E'),
(669, '2022-A-0019', 12, 'G'),
(670, '2022-A-0019', 13, 'A'),
(671, '2022-A-0019', 14, 'J'),
(672, '2022-A-0019', 15, 'B'),
(673, '2022-A-0019', 16, 'J'),
(674, '2022-A-0019', 17, 'B'),
(675, '2022-A-0019', 18, 'G'),
(676, '2022-A-0019', 19, 'C'),
(677, '2022-A-0019', 20, 'J'),
(678, '2022-A-0019', 21, 'B'),
(679, '2022-A-0019', 22, 'G'),
(680, '2022-A-0019', 23, 'C'),
(681, '2022-A-0019', 24, 'F'),
(682, '2022-A-0019', 25, 'E'),
(683, '2022-A-0019', 26, 'I'),
(684, '2022-A-0019', 27, 'C'),
(685, '2022-A-0019', 28, 'I'),
(686, '2022-A-0019', 29, 'E'),
(687, '2022-A-0019', 30, 'H'),
(688, '2022-A-0019', 31, 'C'),
(689, '2022-A-0019', 32, 'G'),
(690, '2022-A-0019', 33, 'B'),
(691, '2022-A-0019', 34, 'I'),
(692, '2022-A-0019', 35, 'E'),
(693, '2022-A-0019', 36, 'I'),
(694, '2022-A-0019', 37, 'D'),
(695, '2022-A-0019', 38, 'I'),
(696, '2022-A-0019', 39, 'D'),
(697, '2022-A-0019', 40, 'I'),
(698, '2022-A-0019', 41, 'E'),
(699, '2022-A-0019', 42, 'G'),
(700, '2022-A-0019', 43, 'A'),
(701, '2022-A-0019', 44, 'I'),
(702, '2022-A-0019', 45, 'E'),
(703, '2022-A-0019', 46, 'H'),
(704, '2022-A-0019', 47, 'C'),
(705, '2022-A-0019', 48, 'F'),
(706, '2022-A-0019', 49, 'C'),
(707, '2022-A-0019', 50, 'I'),
(708, '2022-A-0019', 51, 'B'),
(709, '2022-A-0019', 52, 'F'),
(710, '2022-A-0019', 53, 'A'),
(711, '2022-A-0019', 54, 'F'),
(712, '2022-A-0019', 55, 'E'),
(713, '2022-A-0019', 56, 'G'),
(714, '2022-A-0019', 57, 'C'),
(715, '2022-A-0019', 58, 'G'),
(716, '2022-A-0019', 59, 'D'),
(717, '2022-A-0019', 60, 'G'),
(718, '2022-A-0019', 61, 'E'),
(719, '2022-A-0019', 62, 'G'),
(720, '2022-A-0019', 63, 'B'),
(721, '2022-A-0019', 64, 'H'),
(722, '2022-A-0019', 65, 'E'),
(723, '2022-A-0019', 66, 'I'),
(724, '2022-A-0019', 67, 'D'),
(725, '2022-A-0019', 68, 'H'),
(726, '2022-A-0019', 69, 'C'),
(727, '2022-A-0019', 70, 'F'),
(728, '2022-A-0019', 71, 'A'),
(729, '2022-A-0019', 72, 'F'),
(730, '2022-A-0019', 73, ''),
(731, '2022-A-0026', 1, 'C'),
(732, '2022-A-0026', 2, 'H'),
(733, '2022-A-0026', 3, 'B'),
(734, '2022-A-0026', 4, 'F'),
(735, '2022-A-0026', 5, 'A'),
(736, '2022-A-0026', 6, 'F'),
(737, '2022-A-0026', 7, 'C'),
(738, '2022-A-0026', 8, 'F'),
(739, '2022-A-0026', 9, 'A'),
(740, '2022-A-0026', 10, 'F'),
(741, '2022-A-0026', 11, 'A'),
(742, '2022-A-0026', 12, 'F'),
(743, '2022-A-0026', 13, 'A'),
(744, '2022-A-0026', 14, 'F'),
(745, '2022-A-0026', 15, 'A'),
(746, '2022-A-0026', 16, 'H'),
(747, '2022-A-0026', 17, 'A'),
(748, '2022-A-0026', 18, 'F'),
(749, '2022-A-0026', 19, 'A'),
(750, '2022-A-0026', 20, 'F'),
(751, '2022-A-0026', 21, 'A'),
(752, '2022-A-0026', 22, 'F'),
(753, '2022-A-0026', 23, 'A'),
(754, '2022-A-0026', 24, 'F'),
(755, '2022-A-0026', 25, 'C'),
(756, '2022-A-0026', 26, 'F'),
(757, '2022-A-0026', 27, 'C'),
(758, '2022-A-0026', 28, 'I'),
(759, '2022-A-0026', 29, 'D'),
(760, '2022-A-0026', 30, 'H'),
(761, '2022-A-0026', 31, 'B'),
(762, '2022-A-0026', 32, 'G'),
(763, '2022-A-0026', 33, 'B'),
(764, '2022-A-0026', 34, 'I'),
(765, '2022-A-0026', 35, 'E'),
(766, '2022-A-0026', 36, 'I'),
(767, '2022-A-0026', 37, 'D'),
(768, '2022-A-0026', 38, 'I'),
(769, '2022-A-0026', 39, 'D'),
(770, '2022-A-0026', 40, 'I'),
(771, '2022-A-0026', 41, 'A'),
(772, '2022-A-0026', 42, 'G'),
(773, '2022-A-0026', 43, 'A'),
(774, '2022-A-0026', 44, 'I'),
(775, '2022-A-0026', 45, 'E'),
(776, '2022-A-0026', 46, 'H'),
(777, '2022-A-0026', 47, 'C'),
(778, '2022-A-0026', 48, 'F'),
(779, '2022-A-0026', 49, 'C'),
(780, '2022-A-0026', 50, 'I'),
(781, '2022-A-0026', 51, 'B'),
(782, '2022-A-0026', 52, 'F'),
(783, '2022-A-0026', 53, 'A'),
(784, '2022-A-0026', 54, 'F'),
(785, '2022-A-0026', 55, 'E'),
(786, '2022-A-0026', 56, 'G'),
(787, '2022-A-0026', 57, 'D'),
(788, '2022-A-0026', 58, 'J'),
(789, '2022-A-0026', 59, 'B'),
(790, '2022-A-0026', 60, 'G'),
(791, '2022-A-0026', 61, 'E'),
(792, '2022-A-0026', 62, 'G'),
(793, '2022-A-0026', 63, 'B'),
(794, '2022-A-0026', 64, 'H'),
(795, '2022-A-0026', 65, 'E'),
(796, '2022-A-0026', 66, 'I'),
(797, '2022-A-0026', 67, 'E'),
(798, '2022-A-0026', 68, 'H'),
(799, '2022-A-0026', 69, 'C'),
(800, '2022-A-0026', 70, 'F'),
(801, '2022-A-0026', 71, 'A'),
(802, '2022-A-0026', 72, 'F'),
(803, '2022-A-0026', 73, ''),
(804, '2022-A-0020', 73, ''),
(805, '2022-A-0017', 1, 'C'),
(806, '2022-A-0017', 2, 'H'),
(807, '2022-A-0017', 3, 'C'),
(808, '2022-A-0017', 4, 'G'),
(809, '2022-A-0017', 5, 'D'),
(810, '2022-A-0017', 6, 'J'),
(811, '2022-A-0017', 73, ''),
(812, '2022-A-0022', 1, 'D'),
(813, '2022-A-0022', 2, 'G'),
(814, '2022-A-0022', 3, 'D'),
(815, '2022-A-0022', 4, 'H'),
(816, '2022-A-0022', 5, 'E'),
(817, '2022-A-0022', 6, 'H'),
(818, '2022-A-0022', 7, 'E'),
(819, '2022-A-0022', 8, 'H'),
(820, '2022-A-0022', 9, 'B'),
(821, '2022-A-0022', 10, 'I'),
(822, '2022-A-0022', 11, 'B'),
(823, '2022-A-0022', 12, 'G'),
(824, '2022-A-0022', 13, 'B'),
(825, '2022-A-0022', 14, 'G'),
(826, '2022-A-0022', 15, 'D'),
(827, '2022-A-0022', 16, 'H'),
(828, '2022-A-0022', 17, 'B'),
(829, '2022-A-0022', 18, 'G'),
(830, '2022-A-0022', 19, 'C'),
(831, '2022-A-0022', 20, 'G'),
(832, '2022-A-0022', 21, 'D'),
(833, '2022-A-0022', 22, 'F'),
(834, '2022-A-0022', 23, 'B'),
(835, '2022-A-0022', 24, 'G'),
(836, '2022-A-0022', 25, 'D'),
(837, '2022-A-0022', 26, 'F'),
(838, '2022-A-0022', 27, 'C'),
(839, '2022-A-0022', 28, 'I'),
(840, '2022-A-0022', 73, '');

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
(8, '2022-A-0035', 'Palma Lucas', '07:32 PM', '07:32 PM', 'Taken', 2),
(9, '2022-A-0032', 'Paolo Malinao', '07:43 PM', '07:47 PM', 'Taken', 0),
(10, '2022-A-0036', 'Samantha Espina', '07:49 PM', '07:52 PM', 'Taken', 0),
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
(32, '2022-A-0032', '1645779232_17m.jpg', 'Paolo', 'Umati', 'Malinao', '', 20, 'Quezon', '2022-02-22', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'paolo@gmail.com', '09319542169', 'BSEM', 'BSEM', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified'),
(33, '2022-A-0033', '1645779452_18m.jpg', 'Keith', 'Roldan', 'Cortes', '', 22, 'Quezon', '2022-02-22', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Transferee', 'keith@gmail.com', '09251486985', 'BEED', 'BSAIS', 'Yes', '1', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified'),
(34, '2022-A-0034', '1645779850_15f.jpg', 'Martha', 'Salinas', 'Lacson', '', 21, 'Quezon', '2022-03-09', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'martha@gmail.com', '09251486985', 'BSEM', 'BSES', 'Yes', '1', 'Phase 2', 'Canlubang', 'Calamba', '4027', 'Phase 2', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified'),
(35, '2022-A-0035', '1645779992_16f.jpg', 'Palma', 'Frias', 'Lucas', '', 21, 'Quezon', '2022-03-03', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'palma@gmail.com', '09251486985', 'BEED', 'BSEM', 'Yes', '1', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified'),
(36, '2022-A-0036', '1645780146_17f.jpg', 'Samantha', 'Catalan', 'Espina', '', 20, 'Quezon', '2022-02-23', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'samantha@gmail.com', '09478563874', 'BEED', 'BSEM', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Verified');

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
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=841;

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
