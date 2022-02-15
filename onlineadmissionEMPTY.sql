-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2022 at 01:59 PM
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
(1, 'default_photo.png', 'CCC', 'Admin', 'admin@ccc.edu.ph', '$2y$10$56Ved.uKoECtj.42nYAaqu63OS6n6w5jC46WwIzaktCpB2wFl8vdS', '', '', '', 'Expired', '0');

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
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fam_bg`
--
ALTER TABLE `fam_bg`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `org_involvement`
--
ALTER TABLE `org_involvement`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_admiration`
--
ALTER TABLE `personal_admiration`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_answers`
--
ALTER TABLE `student_answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_exam_log`
--
ALTER TABLE `student_exam_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
