-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2022 at 03:48 PM
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
(1, '1638037841_ccc_fb_logo.jpg', 'CCC', 'Admin', 'admin@ccc.edu.ph', '$2y$10$56Ved.uKoECtj.42nYAaqu63OS6n6w5jC46WwIzaktCpB2wFl8vdS', '09319542169', 'Block 14 Lot 76 Majada In', '575859', 'Expired', '0'),
(2, '1641994205_66117874_2271812916267596_7218619506539626496_o.jpg', 'Rico', 'Guinanao', 'guinanaorico@gmail.com', '$2y$10$wP61aq3rEh7YfTpE6qiRnu4TaXNqrBxcnEa6/rdV33yGn/k82fvaK', '09124567892', 'Majada In Canlubang Calamba Laguna', '185066', 'Expired', '0'),
(3, 'default_photo.png', 'Michael', 'Wania', 'michaelwania@ccc.edu.ph', '$2y$10$NqlbQE87giWBcPRkIZpiZ.fRx0Y7E.1USdM2gQM4z23xVC3S37PPu', '09251486985', 'Calamba, Laguna', '', '', '0'),
(4, 'tats3.png', 'Rico', 'Guinanao', 'reguinanao@ccc.edu.ph', '$2y$10$gFJ23QO39mxDcMw6ELwJcucuKulZxNM6A6zVzsP0Zft8Ksvbzu5Mm', '09319542169', 'Block 14 Lot 76 Majada In', '', '', '0'),
(5, '33d782120fadad2a457eded2eee8e667.jpg', 'John', 'Doe', 'johndoe@gmail.com', '$2y$10$7ItyvUwksfAUR1HMKWbD0OSLX3HqufiAzlNWmRGFu5Metn9/rOZpG', '09124557874', 'Palo Alto Calamba City', '', '', '0'),
(6, 'default_photo.png', 'New', 'Admin', 'newadmin@gmail.com', '$2y$10$x/pON2.Q1pMPrZLyeBP5v.BqVXrRxsiRTJo0uCXiQ2DZqxfdEZkvq', '09123456789', 'calamba', '', '', '0');

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
(1, 1, 'Your Account was Logged In', '11/16/2021', '9:05 PM'),
(2, 1, 'Your Account was Logged Out', '11/16/2021', '9:06 PM'),
(3, 1, 'Your Account was Logged In', '11/16/2021', '9:06 PM'),
(4, 1, 'You Added a New Admin', '11/16/2021', '9:09 PM'),
(5, 1, 'Your Account was Logged Out', '11/16/2021', '9:09 PM'),
(6, 2, 'Your Account was Logged In', '11/16/2021', '9:11 PM'),
(7, 2, 'Your Photo was Updated', '11/16/2021', '9:12 PM'),
(8, 2, 'You Added a New Admin', '11/16/2021', '9:20 PM'),
(9, 2, 'Your Account was Logged Out', '11/16/2021', '9:22 PM'),
(10, 2, 'You Entered Invalid Password', '11/16/2021', '9:22 PM'),
(11, 2, 'Your Account was Logged In', '11/16/2021', '9:22 PM'),
(12, 2, 'Your Account was Logged Out', '11/16/2021', '9:31 PM'),
(13, 1, 'You Entered Invalid Password', '11/16/2021', '9:31 PM'),
(14, 1, 'You Entered Invalid Password', '11/16/2021', '9:33 PM'),
(15, 1, 'You Entered Invalid Password', '11/16/2021', '9:33 PM'),
(16, 1, 'You Entered Invalid Password', '11/16/2021', '9:33 PM'),
(17, 3, 'Your Account was Logged In', '11/16/2021', '9:34 PM'),
(18, 3, 'Your Account was Logged Out', '11/16/2021', '9:37 PM'),
(19, 1, 'You Entered Invalid Password', '11/16/2021', '9:37 PM'),
(20, 1, 'You Entered Invalid Password', '11/16/2021', '9:37 PM'),
(21, 1, 'You Entered Invalid Password', '11/16/2021', '9:39 PM'),
(22, 1, 'You Entered Invalid Password', '11/16/2021', '9:39 PM'),
(23, 1, 'You Entered Invalid Password', '11/16/2021', '9:39 PM'),
(24, 1, 'You Entered Invalid Password', '11/16/2021', '9:42 PM'),
(25, 1, 'You Entered Invalid Password', '11/16/2021', '9:42 PM'),
(26, 2, 'Your Account was Logged In', '11/16/2021', '9:42 PM'),
(27, 2, 'Your Password was Updated', '11/16/2021', '10:27 PM'),
(28, 2, 'Your Password was Updated', '11/16/2021', '10:30 PM'),
(29, 2, 'Your Account was Logged In', '11/16/2021', '10:31 PM'),
(30, 2, 'Your Account was Logged Out', '11/16/2021', '10:31 PM'),
(31, 2, 'Your Password was Updated', '11/16/2021', '11:00 PM'),
(32, 2, 'Your Password was Updated', '11/16/2021', '11:03 PM'),
(33, 2, 'Your Password was Updated', '11/16/2021', '11:05 PM'),
(34, 2, 'Your Password was Updated', '11/16/2021', '11:08 PM'),
(35, 2, 'Your Account was Logged Out', '11/16/2021', '11:09 PM'),
(36, 2, 'Your Account was Logged In', '11/16/2021', '11:09 PM'),
(37, 2, 'Your Password was Updated', '11/16/2021', '11:10 PM'),
(38, 2, 'Your Password was Updated', '11/16/2021', '11:12 PM'),
(39, 2, 'Your Password was Updated', '11/16/2021', '11:13 PM'),
(40, 2, 'Your Password was Updated', '11/16/2021', '11:14 PM'),
(41, 2, 'Your Password was Updated', '11/16/2021', '11:27 PM'),
(42, 2, 'Your Password was Updated', '11/16/2021', '11:27 PM'),
(43, 2, 'Your Password was Updated', '11/16/2021', '11:27 PM'),
(44, 2, 'Your Account was Logged Out', '11/16/2021', '11:27 PM'),
(45, 2, 'Your Account was Logged In', '11/16/2021', '11:41 PM'),
(46, 2, 'Your Information was Updated', '11/16/2021', '11:42 PM'),
(47, 2, 'Your Information was Updated', '11/16/2021', '11:42 PM'),
(48, 2, 'Your Information was Updated', '11/16/2021', '11:43 PM'),
(49, 2, 'Your Account was Logged Out', '11/16/2021', '11:51 PM'),
(50, 2, 'Your Password was Reset', '11/17/2021', '12:28 AM'),
(51, 2, 'Your Password was Reset', '11/17/2021', '12:28 AM'),
(52, 2, 'Your Password was Reset', '11/17/2021', '12:33 AM'),
(53, 2, 'Your Password was Reset', '11/17/2021', '12:35 AM'),
(54, 2, 'Your Password was Reset', '11/17/2021', '12:36 AM'),
(55, 2, 'Your Password was Reset', '11/17/2021', '12:37 AM'),
(56, 2, 'Your Password was Reset', '11/17/2021', '12:40 AM'),
(57, 2, 'Your Account was Logged In', '11/17/2021', '12:42 AM'),
(58, 2, 'Your Account was Logged Out', '11/17/2021', '12:51 AM'),
(59, 1, 'Your Password was Reset', '11/17/2021', '1:00 AM'),
(60, 1, 'Your Account was Logged In', '11/17/2021', '1:02 AM'),
(61, 1, 'Your Account was Logged Out', '11/17/2021', '1:26 AM'),
(62, 1, 'Your Account was Logged In', '11/17/2021', '1:27 AM'),
(63, 1, 'Your Account was Logged In', '11/17/2021', '1:34 AM'),
(64, 1, 'Your Account was Logged Out', '11/17/2021', '1:41 AM'),
(65, 1, 'Your Account was Logged In', '11/17/2021', '4:55 PM'),
(66, 1, 'You Entered Invalid Password', '11/19/2021', '3:32 PM'),
(67, 1, 'You Entered Invalid Password', '11/19/2021', '3:33 PM'),
(68, 1, 'Your Account was Logged In', '11/19/2021', '3:33 PM'),
(69, 1, 'Your Information was Updated', '11/19/2021', '5:45 PM'),
(70, 1, 'You Entered Invalid Password', '11/20/2021', '4:43 PM'),
(71, 1, 'Your Account was Logged In', '11/20/2021', '4:43 PM'),
(72, 1, 'You Verified a Student', '11/20/2021', '5:30 PM'),
(73, 1, 'Your Account was Logged Out', '11/20/2021', '6:11 PM'),
(74, 1, 'Your Account was Logged In', '11/20/2021', '6:11 PM'),
(75, 1, 'Your Account was Logged Out', '11/20/2021', '6:11 PM'),
(76, 1, 'Your Account was Logged In', '11/21/2021', '5:10 PM'),
(77, 3, 'Your Account was Logged In', '11/22/2021', '2:20 PM'),
(78, 1, 'Your Account was Logged In', '11/23/2021', '10:57 AM'),
(79, 1, 'Your Account was Logged In', '11/23/2021', '11:33 AM'),
(80, 1, 'Your Account was Logged In', '11/23/2021', '11:42 AM'),
(81, 1, 'Your Account was Logged In', '11/23/2021', '12:23 PM'),
(82, 1, 'Your Account was Logged In', '11/24/2021', '1:08 PM'),
(83, 1, 'You Verified a Student', '11/24/2021', '3:35 PM'),
(84, 1, 'You Entered Invalid Password', '11/25/2021', '12:04 AM'),
(85, 1, 'Your Account was Logged In', '11/25/2021', '12:04 AM'),
(86, 1, 'Your Account was Logged In', '11/25/2021', '1:47 AM'),
(87, 1, 'Your Account was Logged In', '11/25/2021', '2:11 AM'),
(88, 1, 'Your Account was Logged Out', '11/25/2021', '2:14 AM'),
(89, 1, 'Your Account was Logged In', '11/25/2021', '12:33 PM'),
(90, 1, 'Your Account was Logged Out', '11/25/2021', '5:16 PM'),
(91, 1, 'Your Account was Logged In', '11/25/2021', '5:39 PM'),
(92, 1, 'Your Account was Logged Out', '11/25/2021', '7:58 PM'),
(93, 1, 'Your Account was Logged In', '11/25/2021', '11:01 PM'),
(94, 1, 'Your Account was Logged Out', '11/26/2021', '12:15 AM'),
(95, 1, 'Your Account was Logged In', '11/26/2021', '11:17 AM'),
(96, 1, 'You Added a New Admin', '11/26/2021', '1:29 PM'),
(97, 1, 'Your Account was Logged Out', '11/26/2021', '1:30 PM'),
(98, 4, 'Your Account was Logged In', '11/26/2021', '1:30 PM'),
(99, 4, 'Your Information was Updated', '11/26/2021', '1:30 PM'),
(100, 1, 'Your Account was Logged In', '11/26/2021', '3:00 PM'),
(101, 1, 'You were Logged Out Due to Inactivity', '11/26/2021', '6:36 PM'),
(102, 1, 'Your Account was Logged In', '11/26/2021', '10:14 PM'),
(103, 1, 'You Verified a Student', '11/26/2021', '11:57 PM'),
(104, 1, 'Your Account was Logged Out', '11/27/2021', '12:01 AM'),
(105, 2, 'Your Account was Logged In', '11/27/2021', '12:02 AM'),
(106, 1, 'Your Account was Logged In', '11/27/2021', '12:02 AM'),
(107, 2, 'You Verified a Student', '11/27/2021', '12:04 AM'),
(108, 1, 'You Verified a Student', '11/27/2021', '12:10 AM'),
(109, 1, 'You Verified a Student', '11/27/2021', '12:10 AM'),
(110, 1, 'You Verified a Student', '11/27/2021', '12:10 AM'),
(111, 1, 'You Verified a Student', '11/27/2021', '12:28 AM'),
(112, 1, 'Your Account was Logged Out', '11/27/2021', '4:39 AM'),
(113, 2, 'Your Account was Logged Out', '11/27/2021', '4:39 AM'),
(114, 1, 'Your Account was Logged In', '11/27/2021', '12:05 PM'),
(115, 1, 'Your Account was Logged Out', '11/27/2021', '3:35 PM'),
(116, 4, 'Your Account was Logged In', '11/27/2021', '3:37 PM'),
(117, 1, 'Your Account was Logged In', '11/27/2021', '3:37 PM'),
(118, 1, 'Your Photo was Updated', '11/27/2021', '3:46 PM'),
(119, 1, 'You Verified a Student', '11/27/2021', '5:24 PM'),
(120, 1, 'You Verified a Student', '11/27/2021', '5:43 PM'),
(121, 4, 'You Registered New Student', '11/27/2021', '6:56 PM'),
(122, 1, 'Your Account was Logged Out', '11/27/2021', '8:10 PM'),
(123, 3, 'Your Account was Logged In', '11/27/2021', '8:11 PM'),
(124, 3, 'You Updated Student Details', '11/27/2021', '8:11 PM'),
(125, 3, 'You Declined a Student', '11/27/2021', '8:12 PM'),
(126, 3, 'Your Account was Logged Out', '11/27/2021', '8:16 PM'),
(127, 1, 'Your Account was Logged In', '11/27/2021', '8:16 PM'),
(128, 1, 'You Added a New Admin', '11/27/2021', '8:44 PM'),
(129, 1, 'Your Account was Logged Out', '11/27/2021', '8:45 PM'),
(130, 5, 'Your Account was Logged In', '11/27/2021', '8:45 PM'),
(131, 5, 'You Updated Student Details', '11/27/2021', '8:46 PM'),
(132, 5, 'Your Account was Logged Out', '11/27/2021', '9:03 PM'),
(133, 2, 'Your Account was Logged In', '11/27/2021', '9:10 PM'),
(134, 2, 'Your Account was Logged Out', '11/27/2021', '9:11 PM'),
(135, 4, 'Your Account was Logged Out', '11/28/2021', '2:29 AM'),
(136, 1, 'Your Account was Logged In', '11/28/2021', '2:29 AM'),
(137, 1, 'Your Photo was Updated', '11/28/2021', '2:30 AM'),
(138, 1, 'Your Account was Logged Out', '11/28/2021', '2:33 AM'),
(139, 4, 'You Entered Invalid Password', '11/28/2021', '2:33 AM'),
(140, 4, 'Your Account was Logged In', '11/28/2021', '2:33 AM'),
(141, 4, 'Your Account was Logged Out', '11/28/2021', '2:37 AM'),
(142, 1, 'Your Account was Logged In', '11/28/2021', '2:37 AM'),
(143, 1, 'Your Account was Logged Out', '11/28/2021', '2:37 AM'),
(144, 4, 'You Entered Invalid Password', '11/28/2021', '2:37 AM'),
(145, 4, 'You Entered Invalid Password', '11/28/2021', '2:37 AM'),
(146, 4, 'Your Account was Logged In', '11/28/2021', '2:38 AM'),
(147, 4, 'Your Account was Logged Out', '11/28/2021', '2:39 AM'),
(148, 1, 'Your Account was Logged In', '11/28/2021', '7:53 PM'),
(149, 1, 'Your Account was Logged Out', '11/28/2021', '8:24 PM'),
(150, 4, 'You Entered Invalid Password', '11/28/2021', '8:24 PM'),
(151, 4, 'Your Account was Logged In', '11/28/2021', '8:25 PM'),
(152, 4, 'Your Account was Logged Out', '11/28/2021', '10:46 PM'),
(153, 1, 'You Registered New Student', '11/29/2021', '7:24 PM'),
(154, 1, 'You Updated Student Details', '11/29/2021', '7:27 PM'),
(155, 1, 'You were Logged Out Due to Inactivity', '11/29/2021', '7:37 PM'),
(156, 1, 'Your Account was Logged In', '11/29/2021', '8:13 PM'),
(157, 1, 'You were Logged Out Due to Inactivity', '11/29/2021', '8:13 PM'),
(158, 1, 'Your Account was Logged In', '11/29/2021', '8:13 PM'),
(159, 1, 'You were Logged Out Due to Inactivity', '11/29/2021', '8:22 PM'),
(160, 1, 'Your Account was Logged In', '11/29/2021', '8:54 PM'),
(161, 1, 'You were Logged Out Due to Inactivity', '11/29/2021', '9:09 PM'),
(162, 1, 'Your Account was Logged In', '11/29/2021', '9:11 PM'),
(163, 1, 'You were Logged Out Due to Inactivity', '11/29/2021', '9:31 PM'),
(164, 1, 'You Entered Invalid Password', '11/29/2021', '9:38 PM'),
(165, 1, 'Your Account was Logged In', '11/29/2021', '9:38 PM'),
(166, 1, 'Your Account was Logged Out', '11/29/2021', '9:45 PM'),
(167, 1, 'Your Account was Logged In', '12/01/2021', '10:48 AM'),
(168, 1, 'You were Logged Out Due to Inactivity', '12/01/2021', '10:53 AM'),
(169, 1, 'You Entered Invalid Password', '12/01/2021', '4:26 PM'),
(170, 1, 'Your Account was Logged In', '12/01/2021', '4:26 PM'),
(171, 1, 'Your Account was Logged Out', '12/01/2021', '4:29 PM'),
(172, 2, 'Your Account was Logged In', '12/01/2021', '4:29 PM'),
(173, 2, 'Your Account was Logged Out', '12/01/2021', '4:29 PM'),
(174, 1, 'Your Account was Logged In', '12/01/2021', '4:29 PM'),
(175, 1, 'Your Account was Logged In', '12/01/2021', '4:55 PM'),
(176, 1, 'You were Logged Out Due to Inactivity', '12/01/2021', '5:25 PM'),
(177, 1, 'Your Account was Logged In', '12/01/2021', '7:03 PM'),
(178, 1, 'You were Logged Out Due to Inactivity', '12/01/2021', '7:26 PM'),
(179, 1, 'You Entered Invalid Password', '12/01/2021', '7:49 PM'),
(180, 1, 'Your Account was Logged In', '12/01/2021', '7:50 PM'),
(181, 1, 'You were Logged Out Due to Inactivity', '12/01/2021', '8:43 PM'),
(182, 1, 'You Entered Invalid Password', '12/01/2021', '8:49 PM'),
(183, 1, 'Your Account was Logged In', '12/01/2021', '8:49 PM'),
(184, 1, 'You were Logged Out Due to Inactivity', '12/01/2021', '9:10 PM'),
(185, 1, 'Your Account was Logged In', '12/01/2021', '9:11 PM'),
(186, 1, 'You were Logged Out Due to Inactivity', '12/01/2021', '9:18 PM'),
(187, 1, 'You Entered Invalid Password', '12/01/2021', '9:18 PM'),
(188, 1, 'Your Account was Logged In', '12/01/2021', '9:18 PM'),
(189, 1, 'You were Logged Out Due to Inactivity', '12/01/2021', '9:22 PM'),
(190, 1, 'You Entered Invalid Password', '12/01/2021', '9:23 PM'),
(191, 1, 'Your Account was Logged In', '12/01/2021', '9:23 PM'),
(192, 1, 'Your Account was Logged Out', '12/01/2021', '9:44 PM'),
(193, 2, 'Your Account was Logged In', '12/01/2021', '9:44 PM'),
(194, 2, 'Your Account was Logged Out', '12/02/2021', '3:16 AM'),
(195, 1, 'You Entered Invalid Password', '12/02/2021', '3:16 AM'),
(196, 1, 'Your Account was Logged In', '12/02/2021', '3:17 AM'),
(197, 1, 'Your Account was Logged Out', '12/02/2021', '3:20 AM'),
(198, 1, 'Your Account was Logged In', '12/02/2021', '12:09 PM'),
(199, 1, 'You Updated Student Details', '12/02/2021', '7:12 PM'),
(200, 1, 'You Entered Invalid Password', '12/02/2021', '8:43 PM'),
(201, 1, 'Your Account was Logged In', '12/02/2021', '8:43 PM'),
(202, 1, 'Your Account was Logged Out', '12/02/2021', '9:12 PM'),
(203, 2, 'Your Account was Logged In', '12/02/2021', '9:12 PM'),
(204, 2, 'Your Account was Logged Out', '12/02/2021', '9:13 PM'),
(205, 4, 'Your Account was Logged In', '12/02/2021', '9:14 PM'),
(206, 1, 'You were Logged Out Due to Inactivity', '12/10/2021', '1:46 PM'),
(207, 1, 'Your Account was Logged In', '12/10/2021', '1:49 PM'),
(208, 1, 'You were Logged Out Due to Inactivity', '12/10/2021', '1:49 PM'),
(209, 1, 'You Entered Invalid Password', '12/10/2021', '1:50 PM'),
(210, 1, 'Your Account was Logged In', '12/10/2021', '1:50 PM'),
(211, 1, 'You Registered New Student', '12/10/2021', '1:51 PM'),
(212, 1, 'You were Logged Out Due to Inactivity', '12/10/2021', '2:02 PM'),
(213, 1, 'Your Account was Logged In', '12/10/2021', '11:37 PM'),
(214, 1, 'Your Account was Logged In', '12/10/2021', '11:38 PM'),
(215, 1, 'You Updated Student Details', '12/10/2021', '11:48 PM'),
(216, 1, 'Your Account was Logged Out', '12/10/2021', '11:48 PM'),
(217, 2, 'Your Account was Logged In', '12/10/2021', '11:49 PM'),
(218, 2, 'Your Account was Logged Out', '12/11/2021', '12:00 AM'),
(219, 1, 'Your Account was Logged In', '12/11/2021', '7:42 PM'),
(220, 1, 'Your Account was Logged In', '12/11/2021', '9:04 PM'),
(221, 1, 'Your Information was Updated', '12/11/2021', '10:34 PM'),
(222, 1, 'Your Information was Updated', '12/11/2021', '10:40 PM'),
(223, 1, 'Your Information was Updated', '12/11/2021', '10:40 PM'),
(224, 1, 'Your Information was Updated', '12/11/2021', '10:45 PM'),
(225, 1, 'Your Information was Updated', '12/11/2021', '10:45 PM'),
(226, 1, 'Your Information was Updated', '12/11/2021', '10:46 PM'),
(227, 1, 'Your Information was Updated', '12/11/2021', '10:47 PM'),
(228, 1, 'Your Information was Updated', '12/11/2021', '10:48 PM'),
(229, 1, 'You Entered Invalid Password', '', ''),
(230, 1, 'You Entered Invalid Password', '', ''),
(231, 1, 'You Entered Invalid Password', '', ''),
(232, 1, 'You Entered Invalid Password', '12/11/2021', '10:55 PM'),
(233, 1, 'You Entered Invalid Password', '12/11/2021', '10:55 PM'),
(234, 1, 'You Entered Invalid Password', '12/11/2021', '11:08 PM'),
(235, 1, 'You Entered Invalid Password', '12/11/2021', '11:08 PM'),
(236, 1, 'You Entered Invalid Password', '12/11/2021', '11:08 PM'),
(237, 1, 'You Entered Invalid Password', '12/11/2021', '11:08 PM'),
(238, 1, 'You Entered Invalid Password', '12/11/2021', '11:08 PM'),
(239, 1, 'You Entered Invalid Password', '12/11/2021', '11:09 PM'),
(240, 1, 'You Entered Invalid Password', '12/11/2021', '11:09 PM'),
(241, 1, 'You Entered Invalid Password', '12/11/2021', '11:09 PM'),
(242, 1, 'You Entered Invalid Password', '12/11/2021', '11:09 PM'),
(243, 1, 'You Entered Invalid Password', '12/11/2021', '11:09 PM'),
(244, 1, 'You were Logged Out Due to Inactivity', '12/11/2021', '11:09 PM'),
(245, 1, 'Your Account was Logged In', '12/11/2021', '11:11 PM'),
(246, 1, 'You Entered Invalid Password', '12/11/2021', '11:12 PM'),
(247, 1, 'You Entered Invalid Password', '12/11/2021', '11:12 PM'),
(248, 1, 'You Entered Invalid Password', '12/11/2021', '11:12 PM'),
(249, 1, 'You were Logged Out Due to Inactivity', '12/11/2021', '11:12 PM'),
(250, 1, 'Your Account was Logged In', '12/11/2021', '11:13 PM'),
(251, 1, 'You Entered Invalid Password', '12/11/2021', '11:13 PM'),
(252, 1, 'Your Account was Logged Out', '12/11/2021', '11:13 PM'),
(253, 1, 'You Entered Invalid Password', '12/11/2021', '11:13 PM'),
(254, 1, 'Your Account was Logged In', '12/11/2021', '11:13 PM'),
(255, 1, 'You Entered Invalid Password', '12/11/2021', '11:14 PM'),
(256, 1, 'You Entered Invalid Password', '12/11/2021', '11:14 PM'),
(257, 1, 'You Entered Invalid Password', '12/11/2021', '11:14 PM'),
(258, 1, 'You were Logged Out Due to Inactivity', '12/11/2021', '11:14 PM'),
(259, 1, 'Your Account was Logged In', '12/11/2021', '11:15 PM'),
(260, 1, 'You Entered Invalid Password', '12/11/2021', '11:15 PM'),
(261, 1, 'You Entered Invalid Password', '12/11/2021', '11:15 PM'),
(262, 1, 'You Entered Invalid Password', '12/11/2021', '11:15 PM'),
(263, 1, 'You were Logged Out Due to Inactivity', '12/11/2021', '11:15 PM'),
(264, 1, 'Your Account was Logged In', '12/11/2021', '11:16 PM'),
(265, 1, 'Your Information was Updated', '12/11/2021', '11:17 PM'),
(266, 1, 'You Entered Invalid Password', '12/11/2021', '11:21 PM'),
(267, 1, 'Your Information was Updated', '12/11/2021', '11:21 PM'),
(268, 1, 'You Entered Invalid Password', '12/11/2021', '11:21 PM'),
(269, 1, 'You Entered Invalid Password', '12/11/2021', '11:21 PM'),
(270, 1, 'You were Logged Out Due to Inactivity', '12/11/2021', '11:22 PM'),
(271, 1, 'Your Account was Logged In', '12/11/2021', '11:22 PM'),
(272, 1, 'You Entered Invalid Password', '12/11/2021', '11:22 PM'),
(273, 1, 'You Entered Invalid Password', '12/11/2021', '11:23 PM'),
(274, 1, 'Your Information was Updated', '12/11/2021', '11:23 PM'),
(275, 1, 'Your Information was Updated', '12/11/2021', '11:23 PM'),
(276, 1, 'You Entered Invalid Password', '12/11/2021', '11:32 PM'),
(277, 1, 'You Entered Invalid Password', '12/11/2021', '11:32 PM'),
(278, 1, 'You Entered Invalid Password', '12/11/2021', '11:32 PM'),
(279, 1, 'You were Logged Out Due to Inactivity', '12/11/2021', '11:32 PM'),
(280, 1, 'You Entered Invalid Password', '12/11/2021', '11:44 PM'),
(281, 1, 'Your Account was Logged In', '12/11/2021', '11:44 PM'),
(282, 1, 'Your Account was Logged Out', '12/12/2021', '12:08 AM'),
(283, 2, 'You Entered Invalid Password', '12/12/2021', '6:31 PM'),
(284, 2, 'You Entered Invalid Password', '12/12/2021', '6:53 PM'),
(285, 2, 'You Entered Invalid Password', '12/12/2021', '8:18 PM'),
(286, 2, 'Your Account was Logged In', '12/12/2021', '8:18 PM'),
(287, 2, 'Your Account was Logged Out', '12/12/2021', '8:23 PM'),
(288, 1, 'Your Account was Logged In', '12/13/2021', '3:41 PM'),
(289, 1, 'Your Account was Logged Out', '12/13/2021', '7:11 PM'),
(290, 1, 'Your Account was Logged In', '12/14/2021', '11:54 PM'),
(291, 1, 'Your Account was Logged In', '12/15/2021', '12:54 AM'),
(292, 1, 'Your Account was Logged In', '12/16/2021', '10:45 PM'),
(293, 1, 'Your Account was Logged In', '12/18/2021', '4:38 PM'),
(294, 1, 'Your Account was Logged In', '12/19/2021', '10:28 AM'),
(295, 1, 'Your Account was Logged Out', '12/19/2021', '10:29 AM'),
(296, 2, 'Your Account was Logged In', '12/19/2021', '10:29 AM'),
(297, 2, 'Your Account was Logged Out', '12/19/2021', '10:40 AM'),
(298, 2, 'You Entered Invalid Password', '12/19/2021', '1:05 PM'),
(299, 1, 'You Entered Invalid Password', '12/21/2021', '1:23 AM'),
(300, 1, 'Your Account was Logged In', '12/21/2021', '1:23 AM'),
(301, 1, 'You Enabled the Admission Process', '12/21/2021', '2:37 AM'),
(302, 1, 'You Suspended the Admission Process', '12/21/2021', '2:37 AM'),
(303, 1, 'Your Account was Logged Out', '12/21/2021', '2:38 AM'),
(304, 2, 'Your Account was Logged In', '12/21/2021', '2:38 AM'),
(305, 2, 'Your Account was Logged Out', '12/21/2021', '2:39 AM'),
(306, 1, 'Your Account was Logged In', '12/21/2021', '2:39 AM'),
(307, 1, 'You Enabled the Admission Process', '12/21/2021', '3:00 AM'),
(308, 1, 'You Suspended the Admission Process', '12/21/2021', '3:02 AM'),
(309, 1, 'You Enabled the Admission Process', '12/21/2021', '3:02 AM'),
(310, 1, 'You Suspended the Admission Process', '12/21/2021', '3:02 AM'),
(311, 1, 'You Enabled the Admission Process', '12/21/2021', '3:27 AM'),
(312, 1, 'You Suspended the Admission Process', '12/21/2021', '3:28 AM'),
(313, 1, 'You Enabled the Admission Process', '12/21/2021', '3:35 AM'),
(314, 1, 'You Suspended the Admission Process', '12/21/2021', '3:35 AM'),
(315, 1, 'You Enabled the Admission Process', '12/21/2021', '3:39 AM'),
(316, 1, 'You Suspended the Admission Process', '12/21/2021', '3:43 AM'),
(317, 1, 'You Enabled the Admission Process', '12/21/2021', '3:45 AM'),
(318, 1, 'You Suspended the Admission Process', '12/21/2021', '3:45 AM'),
(319, 1, 'You Enabled the Admission Process', '12/21/2021', '3:46 AM'),
(320, 1, 'You Suspended the Admission Process', '12/21/2021', '3:49 AM'),
(321, 1, 'You Enabled the Admission Process', '12/21/2021', '3:49 AM'),
(322, 1, 'You Suspended the Admission Process', '12/21/2021', '3:50 AM'),
(323, 1, 'You Enabled the Admission Process', '12/21/2021', '3:50 AM'),
(324, 1, 'You Suspended the Admission Process', '12/21/2021', '3:51 AM'),
(325, 1, 'You Enabled the Admission Process', '12/21/2021', '3:52 AM'),
(326, 1, 'You Suspended the Admission Process', '12/21/2021', '3:52 AM'),
(327, 1, 'You Enabled the Admission Process', '12/21/2021', '3:52 AM'),
(328, 1, 'You Suspended the Admission Process', '12/21/2021', '3:55 AM'),
(329, 1, 'You Enabled the Admission Process', '12/21/2021', '3:56 AM'),
(330, 1, 'You Suspended the Admission Process', '12/21/2021', '3:56 AM'),
(331, 1, 'You Enabled the Admission Process', '12/21/2021', '3:56 AM'),
(332, 1, 'You Suspended the Admission Process', '12/21/2021', '3:57 AM'),
(333, 1, 'Your Account was Logged In', '12/21/2021', '2:52 PM'),
(334, 1, 'You Enabled the Admission Process', '12/21/2021', '2:52 PM'),
(335, 1, 'You Suspended the Admission Process', '12/21/2021', '3:15 PM'),
(336, 1, 'You Enabled the Admission Process', '12/21/2021', '3:16 PM'),
(337, 1, 'You Suspended the Admission Process', '12/21/2021', '3:16 PM'),
(338, 1, 'You Enabled the Admission Process', '12/21/2021', '4:19 PM'),
(339, 1, 'Your Account was Logged Out', '12/21/2021', '4:29 PM'),
(340, 1, 'Your Account was Logged In', '12/21/2021', '4:29 PM'),
(341, 1, 'You Suspended the Admission Process', '12/21/2021', '4:37 PM'),
(342, 1, 'You Enabled the Admission Process', '12/21/2021', '6:31 PM'),
(343, 1, 'You Suspended the Admission Process', '12/21/2021', '6:31 PM'),
(344, 1, 'You Enabled the Admission Process', '12/21/2021', '6:38 PM'),
(345, 1, 'You Suspended the Admission Process', '12/21/2021', '6:38 PM'),
(346, 1, 'You Enabled the Admission Process', '12/21/2021', '6:39 PM'),
(347, 1, 'You Suspended the Admission Process', '12/21/2021', '6:39 PM'),
(348, 1, 'You Enabled the Admission Process', '12/21/2021', '6:40 PM'),
(349, 1, 'You Suspended the Admission Process', '12/21/2021', '6:41 PM'),
(350, 1, 'You Enabled the Admission Process', '12/21/2021', '6:41 PM'),
(351, 1, 'You Suspended the Admission Process', '12/21/2021', '6:42 PM'),
(352, 1, 'Your Account was Logged Out', '12/21/2021', '6:42 PM'),
(353, 2, 'Your Account was Logged In', '12/21/2021', '6:42 PM'),
(354, 2, 'Your Account was Logged Out', '12/21/2021', '6:42 PM'),
(355, 1, 'You Entered Invalid Password', '12/22/2021', '5:21 PM'),
(356, 1, 'You Entered Invalid Password', '12/22/2021', '5:21 PM'),
(357, 1, 'Your Login Attempts was Exceeded', '12/22/2021', '5:21 PM'),
(358, 1, 'Your Account was Logged In', '12/26/2021', '11:22 PM'),
(359, 1, 'Your Account was Logged In', '12/27/2021', '4:53 PM'),
(360, 1, 'Your Account was Logged Out', '12/27/2021', '4:56 PM'),
(361, 1, 'Your Account was Logged In', '12/27/2021', '5:00 PM'),
(362, 1, 'Your Account was Logged In', '12/28/2021', '11:20 PM'),
(363, 1, 'Your Account was Logged In', '01/01/2022', '3:37 PM'),
(364, 1, 'Your Account was Logged Out', '01/01/2022', '3:48 PM'),
(365, 1, 'You Entered Invalid Password', '01/01/2022', '3:52 PM'),
(366, 1, 'Your Account was Logged In', '01/01/2022', '3:52 PM'),
(367, 1, 'You Enabled the Admission Process', '01/01/2022', '4:18 PM'),
(368, 1, 'Your Account was Logged Out', '01/01/2022', '4:27 PM'),
(369, 2, 'Your Account was Logged In', '01/01/2022', '4:27 PM'),
(370, 2, 'You Registered New Student', '01/01/2022', '4:41 PM'),
(371, 1, 'You Verified a Student', '01/01/2022', '7:35 PM'),
(372, 1, 'You Verified a Student', '01/01/2022', '7:36 PM'),
(373, 1, 'Your Account was Logged In', '01/12/2022', '8:54 PM'),
(374, 1, 'Your Account was Logged Out', '01/12/2022', '8:54 PM'),
(375, 2, 'Your Account was Logged In', '01/12/2022', '8:54 PM'),
(376, 2, 'Your Photo was Updated', '01/12/2022', '8:54 PM'),
(377, 1, 'Your Account was Logged In', '01/12/2022', '9:10 PM'),
(378, 1, 'You Verified a Student', '01/12/2022', '9:10 PM'),
(379, 1, 'You Suspended the Admission Process', '01/12/2022', '9:10 PM'),
(380, 1, 'You Enabled the Admission Process', '01/12/2022', '9:10 PM'),
(381, 1, 'You Updated Student Details', '01/12/2022', '9:11 PM'),
(382, 1, 'Your Account was Logged Out', '01/12/2022', '9:11 PM'),
(383, 1, 'Your Account was Logged In', '01/12/2022', '9:11 PM'),
(384, 1, 'You Verified a Student', '01/12/2022', '9:16 PM'),
(385, 2, 'Your Account was Logged Out', '01/12/2022', '9:18 PM'),
(386, 2, 'You Entered Invalid Password', '01/12/2022', '9:19 PM'),
(387, 2, 'You Entered Invalid Password', '01/12/2022', '9:19 PM'),
(388, 2, 'Your Account was Logged In', '01/12/2022', '9:19 PM'),
(389, 2, 'Your Account was Logged Out', '01/12/2022', '9:20 PM'),
(390, 2, 'You Entered Invalid Password', '01/12/2022', '9:21 PM'),
(391, 2, 'You Entered Invalid Password', '01/12/2022', '9:21 PM'),
(392, 2, 'Your Login Attempts was Exceeded', '01/12/2022', '9:21 PM'),
(393, 2, 'Your Password was Reset', '01/12/2022', '9:22 PM'),
(394, 2, 'Your Account was Logged In', '01/12/2022', '9:23 PM'),
(395, 2, 'You Suspended the Admission Process', '01/12/2022', '9:24 PM'),
(396, 2, 'You Updated Student Details', '01/12/2022', '9:25 PM'),
(397, 2, 'You Added a New Admin', '01/12/2022', '9:29 PM'),
(398, 2, 'Your Photo was Updated', '01/12/2022', '9:30 PM'),
(399, 2, 'Your Information was Updated', '01/12/2022', '9:30 PM'),
(400, 2, 'Your Password was Updated', '01/12/2022', '9:30 PM'),
(401, 2, 'Your Account was Logged Out', '01/12/2022', '9:31 PM'),
(402, 1, 'You Entered Invalid Password', '01/16/2022', '8:32 PM'),
(403, 1, 'Your Account was Logged In', '01/16/2022', '8:32 PM'),
(404, 1, 'You Enabled the Admission Process', '01/16/2022', '8:34 PM'),
(405, 1, 'Your Account was Logged Out', '01/16/2022', '8:35 PM'),
(406, 2, 'You Entered Invalid Password', '01/16/2022', '8:35 PM'),
(407, 2, 'Your Account was Logged In', '01/16/2022', '8:35 PM'),
(408, 2, 'You Suspended the Admission Process', '01/16/2022', '8:35 PM'),
(409, 2, 'Your Account was Logged Out', '01/16/2022', '8:36 PM'),
(410, 1, 'Your Account was Logged In', '01/16/2022', '8:36 PM'),
(411, 1, 'Your Account was Logged Out', '01/16/2022', '9:00 PM'),
(412, 1, 'You Entered Invalid Password', '01/19/2022', '8:05 PM'),
(413, 1, 'Your Account was Logged In', '01/19/2022', '8:05 PM'),
(414, 1, 'You Enabled the Admission Process', '01/19/2022', '8:05 PM'),
(415, 1, 'Your Account was Logged Out', '01/19/2022', '8:37 PM'),
(416, 1, 'Your Account was Logged In', '01/26/2022', '7:56 PM'),
(417, 1, 'Your Account was Logged Out', '01/26/2022', '8:05 PM'),
(418, 1, 'Your Account was Logged In', '01/31/2022', '9:31 PM'),
(419, 1, 'You Suspended the Admission Process', '01/31/2022', '11:26 PM'),
(420, 1, 'You Enabled the Admission Process', '01/31/2022', '11:26 PM'),
(421, 1, 'You Entered Invalid Password', '02/11/2022', '8:57 PM'),
(422, 1, 'Your Account was Logged In', '02/11/2022', '8:57 PM'),
(423, 1, 'You Registered New Student', '02/11/2022', '9:03 PM'),
(424, 1, 'You Entered Invalid Password', '02/12/2022', '2:52 PM'),
(425, 1, 'Your Account was Logged In', '02/12/2022', '2:52 PM');

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
(1, 'Freshman', 'Majada Out Elementary School', 'Majada Out, Canlubang, Calamba', '2020-10-10', '', 'Camp Vicente Lim National High School', 'Camp Vicente Lim, Mayapa, Calamba', '2020-10-10', '', 'Calamba Doctors College', 'Virborough Subdivision, Calamba', 'Academics', 'ABM', '03-14-2019', '', '83', '89', '', '', '', '', '', '', '', '', '1', '', ''),
(2, 'Transferee', 'Palo Alto Elementary School', 'Palo Alto, Calamba', '2020-10-10', 'Valedictorian', 'Palo Alto National High School', 'Palo Alto, Calamba', '2020-10-10', 'Valedictorian', 'University of Perpetual Help Delta Calamba', 'Paciano, Calamba', 'Academics', 'STEM', '03-29-2019', 'Valedictorian', '92', '94', 'Philippine Womens University', 'Crossing, Calamba', 'Bachelor of Science in Elementary Education Major In General Education', '80', '', '', '', '', '', '', ''),
(3, 'Freshman', 'Siranglupa Elementary School', 'Sirang Lupa, Calamba', '2020-10-10', '', 'Kapayapaan Integrated School', 'Manfill, Calamba', '2020-10-10', '', 'Don Bosco College Canlubang', 'Canlubang, Calamba', 'Technical-Vocational-Livelihood', 'ICT', '03-12-2021', '', '90', '89', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'Transferee', 'Lecheria Elementary School', 'Lecheria, Calamba', '2020-10-10', '3rd Honor', 'Calamba City Science High School', 'Chipeco Ave, Calamba', '2020-10-10', '2nd Honor', 'Calamba Institute Halang', 'Chipeco Ave, Halang', 'Academics', 'ABM', '2021-11-12', '', '82', '88', 'Laguna College of Business and Arts', 'Burgos St, Calamba', 'BS in Accountancy', '85', '', '', '', '', '', '', ''),
(5, 'Freshman', 'Bucal Elementary School', 'Bucal, Calamba', '2020-10-10', '', 'Calamba City Science', 'Chipeco Ave, Halang', '2020-10-10', '', 'Saint Benilde International School', 'Opulencia Compound, Crossing Street, Calamba City', 'Technical-Vocational-Livelihood', 'ICT', '03-17-2021', '', '80', '85', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'Freshman', 'Majada In Elementary School', 'Majada In, Canlubang', '2020-10-10', '', 'Majada In Integrated School', 'Majada In, Canlubang', '2020-10-10', '', 'Asian Institute of Computer Studies Calamba', 'Manila S Rd, Calamba', 'Technical-Vocational-Livelihood', 'ICT', '03-11-2021', '', '80', '80', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'Transferee', 'Lawa Elementary School', 'Brgy Lawa, Calamba', '2020-10-10', '', 'Lawa National High School', 'Brgy Lawa, Calamba', '2020-10-10', '', 'Calamba Doctors College', 'Parian, Calamba', 'Academics', 'STEM', '03-29-2019', '', '90', '80', 'Rizal College of Laguna', 'Parian, Calamba ', 'BS in Elementary Education', '89', '', '', '', '', '', '', ''),
(9, 'Freshman', 'Real Elementary School', 'Real, Calamba', '2020-10-10', '', 'Real National Highschool', 'Real, Calamba', '2020-10-10', '', 'Saint Benilde Internation School Calamba', 'Crossing, Calamba', 'Academics', 'ABM', '04-30-2021', '', '83', '85', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'Freshman', 'Majada In Elementary School', 'Majada In, Canlubang, Calamba', '2020-10-10', '', 'Majada In Integrated School', 'Majada In, Canlubang, Calamba', '2020-10-10', '', 'STI College Calamba', 'Halang, Calamba', 'Technical-Vocational-Livelihood', 'ICT', '03-26-2021', '', '85', '88', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'Transferee', 'Real Elementary School', 'Real, Calamba', '2020-10-10', '', 'Real National High School', 'Real, Calamba', '2020-10-10', '', 'PWU', 'Crossing, Calamba', 'Academics', 'ABM', '10-18-2021', '', '80', '80', 'PWU', 'Crossing, Calamba', 'BSA', '86', '', '', '', '', '', '', ''),
(12, 'Freshman', 'Banadero Elementary School', 'Banadero, Calamba', '2020-10-10', '', 'Banadero National High School', 'Banadero, Calamba', '2020-10-10', '', 'Banadero National High School', 'Banadero, Calamba', 'Academics', 'GAS', '10-21-2021', '', '90', '90', '', '', '', '', '', '', '', '', '', '', ''),
(13, 'Transferee', 'Bucal Elementary School', 'Bucal Calamba', '2020-10-10', '', 'Calamba Institute', 'Bucal Calamba', '2020-10-10', '', 'STI College Calamba', 'Brgy Uno Halang Calamba', 'Academics', 'ABM', '10-13-2021', '', '90', '90', 'STI College Calamba', 'Brgy Uno Halang Calamba', 'BSA', '80', '', '', '', '', '', '', ''),
(14, 'Freshman', 'Paciano Rizal Elementary School', 'Paciano Rizal Calamba', '2020-10-10', '', 'University of Perpetual Help Calamba', 'Paciano Rizal Calamba', '2020-10-10', '', 'University of Perpetual Help Calamba', 'Paciano Rizal Calamba', 'Technical-Vocational-Livelihood', 'ICT', '10-26-2021', '', '80', '90', '', '', '', '', '', '', '', '', '', '', ''),
(15, 'Freshman', 'Jose Rizal Memorial School', '7 Lopez Jaena St Calamba', '2020-10-10', '', 'Calamba City Science High School', 'Chipeco Avenue Barangay 3 Calamba', '2020-10-10', '', 'LCBA', 'Burgos St, Calamba', 'Academics', 'ABM', '10-20-2021', '', '80', '90', '', '', '', '', '', '', '', '', '', '', ''),
(16, 'Transferee', 'Mayapa Elementary School', 'Brgy Mayapa Calamba', '2020-10-10', '', 'Camp Vicente Lim National High School', 'Brgy Mayapa Calamba', '2020-10-10', '', 'Camp Vicente Lim National High School', 'Brgy Mayapa Calamba', 'Academics', 'GAS', '02-17-2021', '', '80', '80', 'PWU', 'Crossing Calamba', 'BSEE', '80', '', '', '', '', '', '', ''),
(17, 'Transferee', 'Palo Alto Elementary School', 'Palo Alto Calamba', '2020-10-10', '', 'Palo Alto National High School', 'Palo Alto Calamba', '2020-10-10', '', 'Camp Vicente Lim National High School', 'Palo Alto Calamba', 'Technical-Vocational-Livelihood', 'ICT', '10-15-2021', '', '80', '80', 'PWU', 'Crossing, Calamba', 'BSIT', '85', '', '', '', '', '', '', ''),
(18, 'Freshman', 'Kapayapaan Elementary School', 'Kapayapaan, Calamba', '2020-10-10', '', 'Kapayapaan Integrated School', 'Kapayapaan, Calamba', '2020-10-10', '', 'Don Bosco College', 'Canlubang', 'Academics', 'ABM', '10-28-2021', '', '85', '80', '', '', '', '', '', '', '', '', '', '', ''),
(19, 'Freshman', 'Bucal Elementary School', 'Bucal, Calamba', '2020-10-10', '', 'Calamba Institute', 'Chipeco Ave Halang', '2020-10-10', '', 'PWU', 'Crossing, Calamba', 'Technical-Vocational-Livelihood', 'ICT', '10-14-2021', '', '85', '87', '', '', '', '', '', '', '', '', '', '', ''),
(20, 'Freshman', 'Palo Alto Elementary School', 'Palo Alto, Calamba', '2020-10-10', '', 'Majada In National High School', 'Palo Alto, Calamba', '2000-10-10', '', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, 'Freshman', 'Jose Rizal Memorial School', 'Calamba', '2020-10-10', '', 'Liceo National High School', 'Calamba', '2020-10-10', '', 'Liceo National High School', 'Calamba', 'Academics', 'ABM', '10-14-2021', '', '90', '80', '', '', '', '', '', '', '', '', '', '', ''),
(22, 'Freshman', 'Majada In Elementary School', 'Majada In, Canlubang', '2020-10-10', '', 'Majada In Integrated School', 'Majada In, Canlubang', '2020-10-10', '', 'Camp Vicente Lim National High School', 'Mayapa, Canlubang', 'Technical-Vocational-Livelihood', 'ICT', '10-27-2021', '', '90', '90', '', '', '', '', '', '', '', '', '', '', ''),
(23, 'Freshman', 'Kapayapaan Elementary School', 'Kapayapaan, Canlubang', '2020-10-10', '', 'Kapayapaan National High School', 'Kapayapaan, Canlubang', '2020-10-10', '', 'Camp Vicente Lim National High School', 'Mayapa, Calamba', 'Technical-Vocational-Livelihood', 'ICT', '10-12-2021', '', '80', '89', '', '', '', '', '', '', '', '', '', '', ''),
(24, 'Transferee', 'Barandal Elementary School', 'Barandal, Calamba', '2020-10-10', '', 'Barandal National High School', 'Barandal, Calamba', '2020-10-10', '', 'Barandal National High School', 'Barandal, Calamba', 'Technical-Vocational-Livelihood', 'ICT', '10-07-2021', '', '80', '80', 'PWU', 'Crossing', 'BSIT', '80', '', '', '', '', '', '', ''),
(25, 'Freshman', 'Paciano Elementary School', 'Paciano Rizal Calamba', '2020-10-10', '', 'Paciano National School', 'Paciano Rizal Calamba', '2020-10-10', '', 'University of Perpetual Help', 'Paciano Rizal Calamba', 'Academics', 'STEM', '10-07-2021', '', '80', '83', '', '', '', '', '', '', '', '', '', '', ''),
(26, 'Freshman', 'Mayapa Elementary School', 'Mayapa Calamba', '2020-10-10', '', 'Camp Vicente Lim National High School', 'Mayapa Calamba', '2020-10-10', '', 'Camp Vicente Lim National High School', 'Mayapa Calamba', 'Technical-Vocational-Livelihood', 'ICT', '10-19-2021', '', '90', '92', '', '', '', '', '', '', '', '', '', '', ''),
(27, 'Freshman', 'Real Elementary School', 'Real Calamba', '2020-10-10', '', 'Real National High School', 'Real Calamba', '2020-10-10', '', 'Saint Benilde International School', 'Crossing Calamba', 'Academics', 'ABM', '10-28-2021', '', '80', '85', '', '', '', '', '', '', '', '', '', '', ''),
(28, 'Freshman', 'Bucal Elementary School', 'Bucal Calamba', '2020-10-10', '', 'Calamba City Science', 'Chipeco Ave Halang', '2020-10-10', '', 'Rizal College of Laguna', 'Parian Calamba', 'Academics', 'GAS', '10-19-2021', '', '90', '90', '', '', '', '', '', '', '', '', '', '', ''),
(29, 'Freshman', 'Bucal Elementary School', 'Bucal Calamba', '2020-10-10', '', 'Calamba Institute', 'Chipeco Ave Halang', '2020-10-10', '', 'PWU', 'Crossing Calamba', 'Academics', 'GAS', '2021-11-08', '', '80', '80', '', '', '', '', '', '', '', '', '', '', ''),
(30, 'Transferee', 'Majada In Elementary School', 'Majada In Canlubang', '2020-10-10', '', 'Majada In Integrated School', 'Majada In Canlubang', '2020-10-10', '', 'STI College of Calamba', 'Halang, Calamba', 'Technical-Vocational-Livelihood', 'ICT', '2022-01-26', '', '82', '87', 'STI College of Calamba', 'Halang, Calamba', 'BSIT', '80', '', '', '', '', '', '', ''),
(31, 'Freshman', 'Pamplona Elem School', 'Imus, Cavite', '2021-11-30', '', 'MajadaInNHS', 'Imus, Cavite', '2020-10-10', '', 'STI College Calamba', 'Calamba, Laguna', 'Academics', 'ABM', '2021-11-17', '', '80', '80', '', '', '', '', '', '', '', '', '', '', ''),
(32, 'Freshman', 'Pamplona Elem School', 'Imus, Cavite', '2020-10-10', '', 'MajadaInNHS', 'Imus, Cavite', '2020-10-10', '', 'STI College Calamba', 'Imus, Cavite', 'Technical-Vocational-Livelihood', 'Agri-Fishery Arts', '2021-11-17', '', '80', '80', '', '', '', '', '', '', '', '', '', '', ''),
(33, 'Freshman', 'Pamplona Elem School', 'Imus, Cavite', '2020-10-10', '', 'MajadaInNHS', 'Imus, Cavite', '2020-10-10', '', 'STI College Calamba', 'Imus, Cavite', 'Technical-Vocational-Livelihood', 'ICT', '10-20-2021', '', '80', '80', '', '', '', '', '', '', '', '', '', '', ''),
(34, 'Freshman', 'Pamplona Elem School', 'Imus, Cavite', '2020-10-10', '', 'MajadaInNHS', 'Imus, Cavite', '2020-10-10', '', 'STI College Calamba', 'Imus, Cavite', 'Technical-Vocational-Livelihood', 'ICT', '10-13-2021', '', '90', '90', '', '', '', '', '', '', '', '', '', '', ''),
(35, 'Freshman', 'Pamplona Elem School', 'Calamba, Laguna', '2020-10-10', '', 'MajadaInNHS', 'Imus, Cavite', '2020-10-10', '', 'STI College Calamba', 'Imus, Cavite', 'Technical-Vocational-Livelihood', 'ICT', '10-07-2021', '', '80', '90', '', '', '', '', '', '', '', '', '', '', ''),
(36, 'Freshman', 'Pamplona Elem School', 'Imus, Cavite', '2020-10-10', '', 'MajadaInNHS', 'Imus, Cavite', '2020-10-10', '', 'STI College Calamba', 'Imus, Cavite', 'Technical-Vocational-Livelihood', 'ICT', '10-13-2021', '', '80', '90', '', '', '', '', '', '', '', '', '', '', ''),
(37, 'Transferee', 'Pamplona Elem School', 'Imus, Cavite', '2020-10-10', '', 'MajadaInNHS', 'Imus, Cavite', '2020-10-10', '', 'STI College Calamba', 'Imus, Cavite', 'Academics', 'ABM', '10-14-2021', '', '80', '80', 'PWU', 'Imus, Cavite', 'BSIT', '80', '', '', '', '', '', '', ''),
(38, 'Freshman', 'Pamplona Elem School', 'Calamba, Laguna', '2020-10-10', '', 'MajadaInNHS', 'Calamba, Laguna', '2020-10-10', '', 'STI College Calamba', 'Calamba, Laguna', 'Technical-Vocational-Livelihood', 'Home Economics', '10-20-2021', '', '80', '80', '', '', '', '', '', '', '', '', '', '', ''),
(39, 'Freshman', 'Pamplona Elem School', 'Calamba, Laguna', '2020-10-10', '', 'MajadaInNHS', 'Calamba, Laguna', '2020-10-10', '', 'STI College Calamba', 'Calamba, Laguna', 'Technical-Vocational-Livelihood', 'Home Economics', '10-20-2021', '', '80', '80', '', '', '', '', '', '', '', '', '', '', ''),
(40, 'Freshman', 'Pamplona Elem School', 'Calamba, Laguna', '2020-10-10', '', 'MajadaInNHS', 'Calamba, Laguna', '2020-10-10', '', 'STI College Calamba', 'Calamba, Laguna', 'Technical-Vocational-Livelihood', 'Home Economics', '10-20-2021', '', '80', '80', '', '', '', '', '', '', '', '', '', '', ''),
(41, 'Freshman', 'Pamplona Elem School', 'Calamba, Laguna', '2020-10-10', '', 'MajadaInNHS', 'Calamba, Laguna', '2020-10-10', '', 'STI College Calamba', 'Calamba, Laguna', 'Technical-Vocational-Livelihood', 'Home Economics', '2021-11-16', '', '80', '80', '', '', '', '', '', '', '', '', '', '', ''),
(42, 'Freshman', 'Pamplona Elem School', 'Calamba, Laguna', '2020-10-10', '', 'MajadaInNHS', 'Calamba, Laguna', '2020-10-10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(43, 'Freshman', 'Pamplona Elem School', 'Calamba, Laguna', '2020-10-10', '', 'MajadaInNHS', 'Calamba, Laguna', '2020-10-10', '', 'STI College Calamba', 'Calamba, Laguna', 'Technical-Vocational-Livelihood', 'Agri-Fishery Arts', '11-17-2021', '', '90', '90', '', '', '', '', '', '', '', '', '', '', ''),
(44, 'Transferee', 'Pamplona Elem School', 'Calamba, Laguna', '2020-10-10', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2000-10-10', '', '', '', '', 'N/A', '', '', '', '', 'PWU', 'Calamba, Laguna', 'BSIT', '80', '', '', '', '', '', '', ''),
(45, 'Freshman', 'dsad', 'asdad', '2020-10-10', '', 'asdada', 'sadada', '2020-10-10', '', 'dada', 'asdada', 'Arts and Design', 'N/A', '11-18-2021', 'dsad', '90', '90', '', '', '', '', '', '', '', '', '', '', ''),
(46, 'Freshman', 'Pamplona Elem School', 'Calamba, Laguna', '2020-10-10', '', 'MajadaInNHS', 'Calamba, Laguna', '2020-10-10', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Sports', 'N/A', '11-24-2021', '', '90', '90', '', '', '', '', '', '', '', '', '', '', ''),
(47, 'Transferee', 'Pamplona Elem School', 'Calamba, Laguna', '2020-10-10', '', 'MajadaInNHS', 'Calamba, Laguna', '2020-10-10', '', 'STI College Calamba', 'Calamba, Laguna', 'Sports', 'N/A', '11-24-2021', '', '80', '80', 'PWU', 'Calamba, Laguna', 'BSIT', '90', '', '', '', '', '', '', ''),
(48, 'Transferee', 'Pamplona Elem School', 'Calamba, Laguna', '2020-10-10', '', 'MajadaInNHS', 'Calamba, Laguna', '2020-10-10', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'Home Economics', '11-11-2021', 'qweq', '80', '80', 'PWU', 'asdasd', 'BSIT', '90', '', '', '', '', '', '', ''),
(49, 'Freshman', 'Pamplona Elem School', 'Calamba, Laguna', '2020-10-10', '', 'MajadaInNHS', 'Calamba, Laguna', '2000-10-10', '', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(50, 'Transferee', 'Pamplona Elem School', 'Calamba, Laguna', '2020-10-10', '', 'MajadaInNHS', 'Calamba, Laguna', '2020-10-10', '', 'STI College Calamba', 'Calamba, Laguna', 'Sports', 'N/A', '2021-11-10', '', '80', '80', 'PWU', 'Calamba, Laguna', 'BSIT', '80', '', '', '', '', '', '', ''),
(51, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2021-11-02', '', 'asdasda', 'Block 14 Lot 76 Majada In', '2021-11-09', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'ICT', '2021-11-10', '3rd honor', '90', '90', '', '', '', '', '', '', '', '', '', '', ''),
(52, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2021-11-11', '', 'asdasda', 'Block 14 Lot 76 Majada In', '2021-11-17', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Academics', 'HUMMS', '2021-11-25', '', '80', '80', '', '', '', '', '', '', '', '', '', '', ''),
(53, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2021-11-17', '', 'asdasda', 'Block 14 Lot 76 Majada In', '2021-11-23', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'ICT', '2021-12-07', '', '80', '80', '', '', '', '', '', '', '', '', '', '', ''),
(54, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-01-20', '', 'asdasda', 'Block 14 Lot 76 Majada In', '2022-01-12', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Sports', 'N/A', '2022-01-11', '', '90', '90', '', '', '', '', '', '', '', '', '', '', ''),
(55, 'Freshman', 'Pamplona Elem School', 'adadasdasd', '2022-02-08', '', 'MajadaInNHS', 'qewqweq', '2022-02-10', '', 'qweq', 'qweq', 'Academics', 'HUMMS', '2022-02-11', '', '90', '90', '', '', '', '', '', '', '', '', '', '', ''),
(56, 'Freshman', 'Pamplona Elem School', 'asda', '2022-02-10', '', 'MajadaInNHS', 'qweqw', '2022-02-10', '', 'STI College Calamba', 'asd', 'Technical-Vocational-Livelihood', 'Industrial Arts', '2022-02-09', '', '90', '90', '', '', '', '', '', '', '', '', 'qwe', 'qwe', '2022-A-0020.jpg'),
(57, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-18', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2011-02-09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'qwe', 'Block 14 Lot 76 Majada In', '2022-A-0021.jpg'),
(58, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-16', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-16', '', 'STI College Calamba', 'Calamba, Laguna', 'Technical-Vocational-Livelihood', 'Agri-Fishery Arts', '2022-02-17', '', '90', '90', '', '', '', '', '', '', '', '', 'dfg', 'sdf', '2022-A-0022.pdf'),
(59, 'Freshman', 'aasdads', 'Block 14 Lot 76 Majada In', '2022-02-15', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-22', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'Industrial Arts', '2022-02-23', '', '90', '90', '', '', '', '', '', '', '', '', '8j', 'asdasd', '2022-A-0023.pdf'),
(60, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-24', 'asd', 'qwe', 'eqw', '2022-02-23', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Technical-Vocational-Livelihood', 'Agri-Fishery Arts', '2022-02-08', '3rd honor', '90', '90', '', '', '', '', '', '', '', '', '', '', 'None'),
(61, 'Freshman', 'Pamplona Elem School', 'Block 14 Lot 76 Majada In', '2022-02-10', '', 'MajadaInNHS', 'Block 14 Lot 76 Majada In', '2022-02-16', '', 'STI College Calamba', 'Block 14 Lot 76 Majada In', 'Academics', 'GAS', '2022-02-10', '', '90', '90', '', '', '', '', '', '', '', '', 'dfg', 'dfg', '2022-A-0025.pdf');

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
(4, 'CCC-2022-F0022', 'Dexter Sembrano', 72, 825, 99, 9, 'Above Average'),
(5, 'CCC-2022-F0019', 'Lance Bernal', 52, 680, 57, 5, 'Average'),
(9, 'CCC-2022-T0008', 'Kenneth  Suarez', 51, 678, 55, 5, 'Average'),
(10, 'CCC-2022-T0004', 'Kimberly Alcantara', 70, 777, 99, 9, 'Above Average'),
(11, 'CCC-2022-F0003', 'Joshua Mendoza', 11, 574, 1, 1, 'Below Average'),
(12, 'CCC-2022-T0002', 'Nicole Reyes', 30, 628, 11, 3, 'Below Average'),
(13, 'CCC-2022-T0030', 'Bryan Lozano', 10, 570, 1, 1, 'Below Average'),
(17, 'CCC-2022-F0032', 'Alex Dela Cruz', 14, 586, 1, 1, 'Below Average'),
(80, 'CCC-2022-T0013', 'Alyssa Aquino', 15, 589, 1, 1, 'Below Average'),
(114, 'CCC-2022-F0012', 'Rico Guinanao', 0, 0, 0, 0, 'Below Average');

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
(1, 'Armando Dela Cruz', 'Filipino', 'Purok 7, M', '09451265487', 'armandodelacruz@gmail.com', 'Government Employee', '', '', '', 'College Graduate', 'April Dela Cruz', 'Filipino', 'Purok 7, Majada Out, Calamba', '09645787845', 'aprildelacruz@gmail.com', 'Unemployed', '', '', '', 'College Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(2, 'Bernard Reyes', 'Filipino', 'Palo Alto,', '09214545854', 'bernardreyes@gmail.com', 'Unemployed', '', '', '', 'Elementary Graduate', 'Cathleen Reyes', 'Filipino', 'Palo Alto, Calamba', '09124574878', 'cathleenreyes@gmail.com', 'Self-Employed', 'Mara Canlag', 'Mayapa, Calamba', '09321457489', 'College Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(3, 'Francis Mendoza', 'Filipino', 'Kapayapaan', '09012254668', 'francismendoza@gmail.com', 'Self-Employed', 'Gary Espinosa', 'Canlubang, Calamba', '09145784445', 'College Graduate', 'Sheena Mendoza', 'Filipino', 'Kapayapaan, Canlubang', '09321548877', 'sheenamendoza@gmail.com', 'Unemployed', '', '', '', 'College Graduate', 'Genaro Cruz', 'Uncle', 'Kapayapaan, Canlubang', '09457841241', 'genarocruz@gmail.com', '01-29-1974', 'Self-Employed', 'Gary Espinosa', 'Canlubang, Calamba', '09145784445', 'Jasmine Mendoza', '15', 'Single', '09215487554', 'John Ray Mendoza', '13', 'Single', '09321546889', 'Joana Mendoza', '9', 'Single', '09321548877', 'P10, 481.00-P20, 962.00'),
(4, 'Isaac Alcantara', 'Filipino', 'Lecheria, ', '09215332648', 'isaacalcantara@gmail.com', 'Self-Employed', '', '', '', 'College Graduate', 'Ivy Alcantara', 'Filipino', 'Lecheria, Calamba', '09124578996', 'ivyalcantara@gmail.com', 'Unemployed', '', '', '', 'College Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(5, 'Jacob Mallari Sr.', 'Filipino', 'Villa Reme', '09124576654', 'jacob_mallari@gmail.com', 'Self-Employed', '', '', '', 'College Graduate', 'Wendy Mallari', 'Filipino', 'Villa Remedios, Halang', '09214551478', 'wendymallari@gmail.com', 'Unemployed', '', '', '', 'College Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(6, 'Warren Estrada', 'Filipino', 'Majada In,', '09124441177', 'warrenestrada@gmail.com', 'Self-Employed', '', '', '', 'College Graduate', 'Sasha Estrada', 'Filipino', 'Majada In, Canlubang', '09124562315', 'sashaestrada@gmail.com', 'Unemployed', '', '', '', 'College Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(8, 'Ramon Suarez', 'Filipino', 'Brgy Lawa,', '09124178895', 'ramonsuarez@gmail.com', 'Self-Employed', '', '', '', 'College Graduate', 'Kacy Suarez', 'Filipino', 'Brgy Lawa, Calamba', '09123412548', 'kacysuarez@gmail.com', 'Self-Employed', '', '', '', 'College Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(9, 'Raul Pangilinan', 'Filipino', 'Real, Cala', '09154721648', 'raulpangilinan@gmail.com', 'Self-Employed', '', '', '', 'College Undergraduate', 'Rose Ann Pangilinan', 'Filipino', 'Real, Calamba', '09235164988', 'roseannpangilinan@gmail.com', 'Unemployed', '', '', '', 'College Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(10, 'Marvin Beltran', 'Filipino', 'Majada In,', '09145784566', 'marvinbeltran@gmail.com', 'Self-Employed', '', '', '', 'College Graduate', 'Trisha Beltran', 'Filipino', 'Majada In, Canlubang', '09134512544', 'trishabeltran@gmail.com', 'Self-Employed', '', '', '', 'College Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(11, 'Ignacio Legaspi', 'Filipino', 'Real, Cala', '09124578744', 'ignaciolegaspi@gmail.com', 'Self-Employed', '', '', '', 'College Graduate', 'April Legaspi', 'Filipino', 'Real, Calamba', '09145714563', 'aprillegaspi@gmail.com', 'Self-Employed', '', '', '', 'College Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(12, 'Gary Fajardo', 'Filipino', 'Banadero, ', '09124578451', 'garyfajardo@gmail.com', 'Self-Employed', '', '', '', 'College Graduate', 'Jane Fajardo', 'Filipino', 'Banadero, Calamba', '09448784521', 'janefajardo@gmail.com', 'Unemployed', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(13, 'Basilio Aquino', 'Filipino', 'Bucal, Cal', '09223712123', 'basilioaquino@gmail.com', 'Self-Employed', '', '', '', 'High School Graduate', 'Carol Aquino', 'Filipino', 'Bucal, Calamba', '09431232345', 'carolaquino@gmail.com', 'Unemployed', '', '', '', 'College Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(14, 'Cedric Rivera', 'Filipino', 'Paciano Ri', '09231434343', 'cedricrivera@gmail.com', 'Private Employee', '', '', '', 'College Graduate', 'Cecilia Rivera', 'Filipino', 'Paciano Rizal Calamba', '09313944822', 'ceciliarivera@gmail.com', 'Unemployed', '', '', '', 'College Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(15, 'Randy Lim', 'Filipino', 'Bucal, Cal', '09415478744', 'randylim@gmail.com', 'Self-Employed', '', '', '', 'College Graduate', 'Xia Lim', 'Chinese', 'Bucal, Calamba', '09145123665', 'xialim@gmail.com', 'Private Employee', '', '', '', 'College Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P41, 924.00-P73, 367.00'),
(16, 'Mark Villegas', 'Filipino', 'Mayapa Cal', '09412541447', 'markvillegas@gmail.com', 'Self-Employed', '', '', '', 'College Graduate', 'Lynda Villegas', 'Filipino', 'Mayapa Calamba', '09142458841', 'lyndavillegas@gmail.com', 'Unemployed', '', '', '', 'High School Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(17, 'Manny Vasquez', 'Filipino', 'Palo Alto', '09213546125', 'mannyvasquez@gmail.com', 'Private Employee', '', '', '', 'College Graduate', 'Conny Vasquez', 'Filipino', 'Palo Alto', '09124154788', 'connyvasquez@gmail.com', 'Government Employee', '', '', '', 'College Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P41, 924.00-P73, 367.00'),
(18, 'Rudy Rosario', 'Filipino', 'Manfill, C', '09125548779', 'rudyrosario@gmail.com', 'Self-Employed', '', '', '', 'College Undergraduate', 'Myrna Rosario', 'Filipino', 'Manfill, Canlubang', '09315421177', 'myrnarosario@gmail.com', 'Private Employee', '', '', '', 'College Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(19, 'Logan Bernal', 'Filipino', 'Halang, Ca', '09124578745', 'loganbernal@gmail.com', 'Self-Employed', '', '', '', 'College Graduate', 'Lisa Bernal', 'Filipino', 'Halang, Calamba', '09145124857', 'lisabernal@gmail.com', 'Self-Employed', '', '', '', 'High School Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(20, 'Teo Cortes', 'Filipino', 'Palo Alto', '09145154578', 'teocortes@gmail.com', 'Private Employee', '', '', '', 'College Graduate', 'Tessa Cortes', 'Filipino', 'Palo Alto', '09152124587', 'tessacortes@gmail.com', 'Self-Employed', '', '', '', 'College Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(21, 'Allan Bernardino', 'Filipino', 'Parian, Ca', '09541232645', 'allanbernardino@gmail.com', 'Private Employee', '', '', '', 'College Graduate', 'Kate Bernardino', 'Filipino', 'Parian, Calamba', '09215487866', 'katebernardino@gmail.com', 'Self-Employed', '', '', '', 'College Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P41, 924.00-P73, 367.00'),
(22, 'Alex Sembrano', 'Filipino', 'Majada In ', '09125458478', 'alexsembrano@gmail.com', 'Self-Employed', '', '', '', 'Elementary Graduate', 'Shane Sembrano', 'Filipino', 'Majada In Canlubang', '09415477787', 'shanesembrano@gmail.com', 'Private Employee', '', '', '', 'College Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(23, 'Terrence Bautista', 'Filipino', 'Kapayapaan', '09124565121', 'terrencebautista@gmail.com', 'Self-Employed', '', '', '', 'College Graduate', 'Selena Bautista', 'Filipino', 'Kapayapaan, Canlubang', '09154878451', 'selenabautista@gmail.com', 'Self-Employed', '', '', '', 'College Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(24, 'Tani Gonzaga', 'Filipino', 'Barandal C', '09451278742', 'tanigonzaga@gmail.com', 'Private Employee', '', '', '', 'College Graduate', 'Aileen Gonzaga', 'Filipino', 'Barandal Calamba', '09451248787', 'aileengonzaga@gmail.com', 'Self-Employed', '', '', '', 'High School Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(25, 'Brandon Galang', 'Filipino', 'Paciano Ri', '09124578884', 'brandongalang@gmail.com', 'Private Employee', '', '', '', 'College Undergraduate', 'Tony Galang', 'Filipino', 'Paciano Rizal Calamba', '09124581145', 'tonygalang@gmail.com', 'Deceased', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(26, 'Noli De Castro', 'Filipino', 'Mayapa Cal', '09142154878', 'nolidecastro@gmail.com', 'Self-Employed', '', '', '', 'College Graduate', 'Alexandra De Castro', 'Filipino', 'Mayapa Calamba', '09124548787', 'alexdecastro@gmail.com', 'Private Employee', '', '', '', 'College Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(27, 'Anton Luna', 'Filipino', 'Real Calam', '09124587455', 'antonluna@gmail.com', 'Self-Employed', '', '', '', 'College Graduate', 'Caroline Luna', 'Filipino', 'Real Calamba', '09451278784', 'carolineluna@gmail.com', 'Unemployed', '', '', '', 'College Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(28, 'Shaun Mendez', 'Filipino', 'Bucal Cala', '09154121478', 'shaunmendez@gmail.com', 'Self-Employed', '', '', '', 'High School Graduate', 'Camilla Mendez', 'Filipino', 'Bucal Calamba', '09135412454', 'camillamendez@gmail.com', 'Self-Employed', '', '', '', 'College Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(29, 'Verden Villa', 'Filipino', 'Bucal Cala', '09154213568', 'verdvilla@gmail.com', 'Self-Employed', '', '', '', 'College Graduate', 'Abby Villa', 'Filipino', 'Bucal Calamba', '09141487878', 'abbyvilla@gmail.com', 'Self-Employed', '', '', '', 'High School Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(30, 'Benjamin Lozano', 'Filipino', 'Majada In ', '09124587878', 'bryanlozano@gmail.com', 'Self-Employed', '', '', '', 'College Graduate', 'Beverly Lozano', 'Filipino', 'Majada In Canlubang', '09417785454', 'bevlozano@gmail.com', 'Self-Employed', '', '', '', 'High School Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(31, 'Nildo Guinanao', 'Filipino', 'Imus, Cavi', '09625487878', 'ricoguinanao@yahoo.com', 'Private Employee', '', '', '', 'Elementary Graduate', 'Eden Guinanao', 'Filipino', 'Imus, Cavite', '09124547878', 'ricoguinanao@yahoo.com', 'Government Employee', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(32, 'Nildo Guinanao', 'Filipino', 'Imus, Cavite', '09154578787', 'as@gmail.com', 'Private Employee', '', '', '', 'Elementary Undergraduate', 'Eden Guinanao', 'Filipino', 'Imus, Cavite', '09124547878', 'ricoguinanao@yahoo.com', 'Government Employee', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(33, 'Nildo Guinanao', 'Filipino', 'Imus, Cavi', '09126548799', 'ricoguinanao@yahoo.com', 'Private Employee', '', '', '', 'Elementary Graduate', 'Eden Guinanao', 'Filipino', 'Imus, Cavite', '09124547878', 'ricoguinanao@yahoo.com', 'Self-Employed', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(34, 'Nildo Guinanao', 'Filipino', 'Imus, Cavi', '09126548799', 'ricoguinanao@yahoo.com', 'Private Employee', '', '', '', 'Elementary Undergraduate', 'Eden Guinanao', 'Filipino', 'Imus, Cavite', '09124547878', 'ricoguinanao@yahoo.com', 'Private Employee', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(35, 'Nildo Guinanao', 'Filipino', 'Imus, Cavi', '09126548799', 'ricoguinanao@yahoo.com', 'Self-Employed', '', '', '', 'Elementary Graduate', 'Eden Guinanao', 'Filipino', 'Imus, Cavite', '09848755454', 'ricoguinanao@yahoo.com', 'Private Employee', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(36, 'dasdasd', 'Filipino', 'Imus, Cavi', '09126548799', 'ricoguinanao@yahoo.com', 'Self-Employed', '', '', '', 'Elementary Graduate', 'Eden Guinanao', 'Filipino', 'Imus, Cavite', '09124547878', 'ricoguinanao@yahoo.com', 'Self-Employed', '', '', '', 'College Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(37, 'Nildo Guinanao', 'Filipino', 'Imus, Cavi', '09126548799', 'ricoguinanao@yahoo.com', 'Private Employee', '', '', '', 'Elementary Graduate', 'Eden Guinanao', 'Filipino', 'Imus, Cavite', '09124547878', 'ricoguinanao@yahoo.com', 'Private Employee', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(38, 'Nildo Guinanao', 'Filipino', 'Calamba, L', '09126548799', 'guinanaorico@gmail.com', 'Self-Employed', '', '', '', 'Elementary Graduate', 'Eden Guinanao', 'Filipino', 'Calamba, Laguna', '09124547879', 'guinanaorico@gmail.com', 'Government Employee', '', '', '', 'High School Graduate', '', '', '', '', '', '', 'Unemployed', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(39, 'Nildo Guinanao', 'Filipino', 'Calamba, L', '09126548799', 'guinanaorico@gmail.com', 'Self-Employed', '', '', '', 'Elementary Graduate', 'Eden Guinanao', 'Filipino', 'Calamba, Laguna', '09124547879', 'guinanaorico@gmail.com', 'Government Employee', '', '', '', 'High School Graduate', '', '', '', '', '', '', 'Unemployed', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(40, 'Nildo Guinanao', 'Filipino', 'Calamba, L', '09126548799', 'guinanaorico@gmail.com', 'Self-Employed', '', '', '', 'Elementary Graduate', 'Eden Guinanao', 'Filipino', 'Calamba, Laguna', '09124547879', 'guinanaorico@gmail.com', 'Government Employee', '', '', '', 'High School Graduate', '', '', '', '', '', '', 'Unemployed', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(41, 'Nildo Guinanao', 'Filipino', 'Calamba, L', '09126548799', 'guinanaorico@gmail.com', 'Self-Employed', '', '', '', 'Elementary Graduate', 'Eden Guinanao', 'Filipino', 'Calamba, Laguna', '09124547879', 'guinanaorico@gmail.com', 'Government Employee', '', '', '', 'High School Graduate', '', '', '', '', '', '', 'Unemployed', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(42, 'dasdasd', 'Filipino', 'Calamba, L', '09126548799', 'estriborics@gmail.com', 'Government Employee', '', '', '', 'College Undergraduate', 'Eden Guinanao', 'Filipino', 'Calamba, Laguna', '09124547878', 'estriborics@gmail.com', 'Self-Employed', '', '', '', 'High School Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P209, 620.00 and above'),
(43, 'dasdasd', 'Filipino', 'Calamba, L', '09126548799', 'estriborics@gmail.com', 'Government Employee', '', '', '', 'Elementary Undergraduate', 'Eden Guinanao', 'Filipino', 'Calamba, Laguna', '09124547878', 'estriborics@gmail.com', 'Self-Employed', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(44, 'Nildo Guinanao', 'Filipino', 'Calamba, L', '09126548799', 'estriborics@gmail.com', 'Government Employee', '', '', '', 'Elementary Undergraduate', 'Eden Guinanao', 'Filipino', 'Calamba, Laguna', '09124547878', 'estriborics@gmail.com', 'Private Employee', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P41, 924.00-P73, 367.00'),
(45, 'asda', 'Filipino', 'Calamba, L', '09126548799', 'estriborics@gmail.com', 'Private Employee', 'sdad', 'Calamba, Laguna', '09251486985', 'Elementary Graduate', 'Eden Guinanao', 'Filipino', 'Calamba, Laguna', '09848755454', 'estriborics@gmail.com', 'Government Employee', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P125,772.00-P209,620.00'),
(46, 'Nildo Guinanao', 'Filipino', 'Calamba, L', '09126548799', 'estriborics@gmail.com', 'Government Employee', '', '', '', 'Elementary Graduate', 'Eden Guinanao', 'Filipino', 'Calamba, Laguna', '09124547878', 'estriborics@gmail.com', 'Government Employee', '', '', '', 'High School Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(47, 'Nildo Guinanao', 'Filipino', 'Calamba, L', '09126548799', 'estriborics@gmail.com', 'Private Employee', '', '', '', 'Elementary Graduate', 'Eden Guinanao', 'Filipino', 'Calamba, Laguna', '09124547878', 'estriborics@gmail.com', 'Government Employee', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(48, 'Nildo Guinanao', 'Filipino', 'Calamba, L', '09126548799', 'estriborics@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', 'Eden Guinanao', 'Filipino', 'Calamba, Laguna', '09124547878', 'estriborics@gmail.com', 'Government Employee', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P41, 924.00-P73, 367.00'),
(49, 'Nildo Guinanao', 'Filipino', 'Calamba, L', '09126548799', 'estriborics@gmail.com', 'Government Employee', '', '', '', 'Elementary Graduate', 'Eden Guinanao', 'Filipino', 'Calamba, Laguna', '09124547878', 'estriborics@gmail.com', 'Government Employee', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(50, 'Nildo Guinanao', 'Filipino', 'Calamba, L', '09126548799', 'estriborics@gmail.com', 'Government Employee', '', '', '', 'Elementary Undergraduate', 'Eden Guinanao', 'Filipino', 'Calamba, Laguna', '09124547878', 'estriborics@gmail.com', 'Private Employee', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', 'dasda', '23', 'Married', '09645645645', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(51, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Government Employee', '', '', '', 'Elementary Graduate', 'Eden Guinanao', 'Filipino', 'Calamba, Laguna', '09848755454', 'estriborics@gmail.com', 'Government Employee', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(52, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', 'Block 14 Lot 76 Majada In', '09319542169', 'Elementary Graduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09848755454', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(53, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Government Employee', '', '', '', 'Elementary Undergraduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09554878784', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(54, 'Nildo Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'Elementary Graduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09848755454', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(55, 'asd', 'asda', 'asdasd', '09625487878', 'asd@dfs.sdf', 'Private Employee', '', '', '', 'Elementary Graduate', 'Eden Guinanao', 'Filipino', 'qweqw', '09536345345', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'Elementary Undergraduate', '', '', '', '', '', '', '', '', 'Calamba, Laguna', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(56, 'qwe', 'qwe', 'qwe', '09625487878', 'guinanaorico@gmail.com', 'Self-Employed', '', '', '', 'Elementary Undergraduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Self-Employed', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(57, 'asd', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'Elementary Undergraduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Government Employee', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(58, 'asd', 'Filipino', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Government Employee', '', '', '', 'Elementary Undergraduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P10, 481.00-P20, 962.00'),
(59, 'asd', 'Filipino', 'tiy', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'Elementary Undergraduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'High School Undergraduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Below P10, 481'),
(60, 'qwe', 'qwe', 'qwe', '09625487878', 'qwe@dsf.dsf', 'Government Employee', 'sdad', '', '', 'High School Undergraduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09456456456', 'guinanaorico@gmail.com', 'Self-Employed', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P41, 924.00-P73, 367.00'),
(61, 'qwe', 'qwe', 'Block 14 Lot 76 Majada In', '09625487878', 'guinanaorico@gmail.com', 'Private Employee', '', '', '', 'Elementary Graduate', 'Eden Guinanao', 'Filipino', 'Block 14 Lot 76 Majada In', '09124547878', 'guinanaorico@gmail.com', 'Self-Employed', '', '', '', 'Elementary Graduate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'P73, 367.00-P125, 772.00');

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

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notif_id`, `adminID`, `admin_name`, `activity`, `date_time`) VALUES
(75, 1, 'CCC Admin', 'enabled admission process.', '2022-01-19 08:05:30 PM'),
(76, 1, 'CCC Admin', 'has suspended the admission process', '2022-01-31 11:26:31 PM'),
(77, 1, 'CCC Admin', 'enabled admission process.', '2022-01-31 11:26:35 PM'),
(78, 1, 'CCC Admin', 'registered a student named Guinanao E.', '2022-02-11 09:03:18 PM');

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
(1, 'Sangguniang Kabataan', 'Muse', 'A Local Youth Development Council composed of representatives of different local youth groups suppor', '2', '', '', '', '', '', '', '', ''),
(2, '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Parokya ng San Jose Manggagawa', 'Sacristan', 'Religious Organization', '5', '', '', '', '', '', '', '', ''),
(4, '', '', '', '', '', '', '', '', '', '', '', ''),
(5, '', '', '', '', '', '', '', '', '', '', '', ''),
(6, '', '', '', '', '', '', '', '', '', '', '', ''),
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
(36, '', '', '', '', '', '', '', '', '', '', '', ''),
(37, '', '', '', '', '', '', '', '', '', '', '', ''),
(38, '', '', '', '', '', '', '', '', '', '', '', ''),
(39, '', '', '', '', '', '', '', '', '', '', '', ''),
(40, '', '', '', '', '', '', '', '', '', '', '', ''),
(41, '', '', '', '', '', '', '', '', '', '', '', ''),
(42, '', '', '', '', '', '', '', '', '', '', '', ''),
(43, '', '', '', '', '', '', '', '', '', '', '', ''),
(44, 'Lifestyle Clothing', '', '', '', '', '', '', '', '', '', '', ''),
(45, '', '', '', '', '', '', '', '', '', '', '', ''),
(46, '', '', '', '', '', '', '', '', '', '', '', ''),
(47, '', '', '', '', '', '', '', '', '', '', '', ''),
(48, '', '', '', '', '', '', '', '', '', '', '', ''),
(49, '', '', '', '', '', '', '', '', '', '', '', ''),
(50, '', '', '', '', '', '', '', '', '', '', '', ''),
(51, '', '', '', '', '', '', '', '', '', '', '', ''),
(52, '', '', '', '', '', '', '', '', '', '', '', ''),
(53, '', '', '', '', '', '', '', '', '', '', '', ''),
(54, '', '', '', '', '', '', '', '', '', '', '', ''),
(55, 'Lifestyle Clothing', '69', 'hkh', '7', '', '', '', '', '', '', '', ''),
(56, '', '', '', '', '', '', '', '', '', '', '', ''),
(57, '', '', '', '', '', '', '', '', '', '', '', ''),
(58, '', '', '', '', '', '', '', '', '', '', '', ''),
(59, '', '', '', '', '', '', '', '', '', '', '', ''),
(60, '', '', '', '', '', '', '', '', '', '', '', ''),
(61, '', '', '', '', '', '', '', '', '', '', '', '');

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
(1, 'orem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas culpa, minus eaque facilis vitae exercitationem, nesciunt maiores nisi beatae quisquam aliquid, ut necessitatibus autem! Non, nobis dolore mollitia perspiciatis hic provident rem? Repe', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error sapiente ea dolor laborum architecto recusandae blanditiis id amet officia dolore. Voluptatum ratione numquam laudantium, quos libero voluptates odio rerum nostrum ullam voluptate distinctio. Repellat quis exercitationem dolores voluptatibus voluptatum cumque vero culpa provident, odit voluptas.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.'),
(2, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.'),
(3, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.'),
(4, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.'),
(5, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.'),
(6, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.'),
(8, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.'),
(9, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.'),
(10, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.'),
(11, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.'),
(12, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae alias quaerat rerum voluptatibus autem. Corporis ad sequi dolore eius rem laborum hic dolor. Eaque maiores suscipit atque assumenda animi distinctio, neque recusandae? Repellendus quasi maxime suscipit quam quaerat praesentium iusto.'),
(13, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.'),
(14, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.'),
(15, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.'),
(16, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.'),
(17, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.'),
(18, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.'),
(19, 'orem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore ', 'orem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'orem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'orem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.'),
(20, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore'),
(21, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.'),
(22, 'orem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore ', 'orem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'orem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'orem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.'),
(23, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.'),
(24, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.'),
(25, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.'),
(26, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.'),
(27, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.'),
(28, 'orem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore ', 'orem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'orem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'orem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.'),
(29, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.'),
(30, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, ex iure, repudiandae voluptate excepturi tempore, ipsam rem veritatis similique voluptatibus eveniet eaque harum reprehenderit! Officia assumenda magnam beatae recusandae eos. Inventore nisi accusantium, ad fugit quis ipsum sint maiores consequuntur.'),
(31, 'asdasda', 'asdasd', 'asda', 'adsa'),
(32, 'adfasdad', 'asdasda', 'asdasd', 'asdasdasd'),
(33, 'ertgrty', 'fghrghfgh', 'fghfghfg', 'fghfghfgh'),
(34, 'ads', 'asd', 'asd', 'asd'),
(35, 'Aasdasda', 'asdasdasd', 'asdasdasd', 'asdasdasdasd'),
(36, 'asdasddas', 'asdasdas', 'asdasdsa', 'asdasdada'),
(37, 'adasdasd', 'asdasdasd', 'asdasdasd', 'asdasdasdasdaasd'),
(38, 'sad', 'as', 'sd', 'sd'),
(39, 'sad', 'as', 'sd', 'sd'),
(40, 'sad', 'as', 'sd', 'sd'),
(41, 'sad', 'as', 'sd', 'sd'),
(42, 'kopk', 'okpkpio', 'kpkpkp', 'kkpk'),
(43, 'f', 'jfj', 'fghf', 'fghfg'),
(44, 'gfgh', 'dfgd', 'dgd', 'dfgdf'),
(45, 'adad', 'asdad', 'adads', 'adadasd'),
(46, 'hjkhk', 'ggjg', 'ghjghj', 'jghjgj'),
(47, 'hjkhk', 'hgkhgk', 'hjkhgkh', 'hjkhgkhgkg'),
(48, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', 'cccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc', 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd'),
(49, 'tygrd', 'gfsfgsgs', 'sgsdgsgs', 'sgsgs'),
(50, 'dasda', 'adsa', 'adaqqwe', 'fzcx'),
(51, 'as', 'qw', 'a', 'zxc'),
(52, 'wer', 'wrewer', 'werwrw', 'werwrwe'),
(53, '1', '2', '3', '4'),
(54, '12', '12', '31', '321'),
(55, 'asdas', 'asda', 'qweqwew', 'qweqew'),
(56, 'qwe', 'qwe', 'qwe', 'qe'),
(57, 'yuty', 'tyu', 'tyu', 'tyut'),
(58, 'wqe', 'qwe', 'wqe', 'qwe'),
(59, 'ytii', 'ytytiut', 'it78', 'tyity'),
(60, 'qwe', 'qwe', 'qwe', 'qwe'),
(61, 'qwe', 'qwe', 'qwe', 'qwe');

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
  `voters` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`student_id`, `admit_type`, `g11card`, `g12card`, `torpg1`, `torpg2`, `goodmoral`, `birthcert`, `indigency`, `voters`) VALUES
(1, 'Freshman', 'CCC-2021-F0001_Dela Cruz_g11.pdf', 'CCC-2021-F0001_Dela Cruz_g12.pdf', '', '', 'CCC-2021-F0001_Dela Cruz_goodmoral.pdf', 'CCC-2021-F0001_Dela Cruz_birthcert.pdf', 'CCC-2021-F0001_Dela Cruz_indigency.pdf', 'CCC-2021-F0001_Dela Cruz_votecert.pdf'),
(2, 'Transferee', '', '', 'CCC-2021-T0002_Reyes_torpg1.pdf', 'CCC-2021-T0002_Reyes_torpg2.pdf', 'CCC-2021-T0002_Reyes_goodmoral.pdf', 'CCC-2021-T0002_Reyes_birthcert.pdf', 'CCC-2021-T0002_Reyes_indigency.pdf', 'CCC-2021-T0002_Reyes_votecert.pdf'),
(3, 'Freshman', 'CCC-2021-F0003_Mendoza_g11.pdf', 'CCC-2021-F0003_Mendoza_g12.pdf', '', '', 'CCC-2021-F0003_Mendoza_goodmoral.pdf', 'CCC-2021-F0003_Mendoza_birthcert.pdf', 'CCC-2021-F0003_Mendoza_indigency.pdf', 'CCC-2021-F0003_Mendoza_votecert.pdf'),
(4, 'Transferee', '', '', 'CCC-2021-T0004_Alcantara_torpg1.pdf', 'CCC-2021-T0004_Alcantara_torpg2.pdf', 'CCC-2021-T0004_Alcantara_goodmoral.pdf', 'CCC-2021-T0004_Alcantara_birthcert.pdf', 'CCC-2021-T0004_Alcantara_indigency.pdf', 'CCC-2021-T0004_Alcantara_votecert.pdf'),
(5, 'Freshman', 'CCC-2021-F0005_Mallari_g11.pdf', 'CCC-2021-F0005_Mallari_g12.pdf', '', '', 'CCC-2021-F0005_Mallari_goodmoral.pdf', 'CCC-2021-F0005_Mallari_birthcert.pdf', 'CCC-2021-F0005_Mallari_indigency.pdf', 'CCC-2021-F0005_Mallari_votecert.pdf'),
(6, 'Freshman', 'CCC-2021-F0006_Estrada_g11.pdf', 'CCC-2021-F0006_Estrada_g12.pdf', '', '', 'CCC-2021-F0006_Estrada_goodmoral.pdf', 'CCC-2021-F0006_Estrada_birthcert.pdf', 'CCC-2021-F0006_Estrada_indigency.pdf', 'CCC-2021-F0006_Estrada_votecert.pdf'),
(8, 'Transferee', '', '', 'CCC-2021-T0008_Suarez_torpg1.pdf', 'CCC-2021-T0008_Suarez_torpg2.pdf', 'CCC-2021-T0008_Suarez_goodmoral.pdf', 'CCC-2021-T0008_Suarez_birthcert.pdf', 'CCC-2021-T0008_Suarez_indigency.pdf', 'CCC-2021-T0008_Suarez_votecert.pdf'),
(9, 'Freshman', 'CCC-2021-F0009_Pangilinan_g11.pdf', 'CCC-2021-F0009_Pangilinan_g12.pdf', '', '', 'CCC-2021-F0009_Pangilinan_goodmoral.pdf', 'CCC-2021-F0009_Pangilinan_birthcert.pdf', 'CCC-2021-F0009_Pangilinan_indigency.pdf', 'CCC-2021-F0009_Pangilinan_votecert.pdf'),
(10, 'Freshman', 'CCC-2021-F0010_Beltran_g11.pdf', 'CCC-2021-F0010_Beltran_g12.pdf', '', '', 'CCC-2021-F0010_Beltran_goodmoral.pdf', 'CCC-2021-F0010_Beltran_birthcert.pdf', 'CCC-2021-F0010_Beltran_indigency.pdf', 'CCC-2021-F0010_Beltran_votecert.pdf'),
(11, 'Transferee', '', '', 'CCC-2021-T0011_Legaspi_torpg1.pdf', 'CCC-2021-T0011_Legaspi_torpg2.pdf', 'CCC-2021-T0011_Legaspi_goodmoral.pdf', 'CCC-2021-T0011_Legaspi_birthcert.pdf', 'CCC-2021-T0011_Legaspi_indigency.pdf', 'CCC-2021-T0011_Legaspi_votecert.pdf'),
(12, 'Freshman', 'CCC-2021-F0012_Fajardo_g11.pdf', 'CCC-2021-F0012_Fajardo_g12.pdf', '', '', 'CCC-2021-F0012_Fajardo_goodmoral.pdf', 'CCC-2021-F0012_Fajardo_birthcert.pdf', 'CCC-2021-F0012_Fajardo_indigency.pdf', 'CCC-2021-F0012_Fajardo_votecert.pdf'),
(13, 'Transferee', '', '', 'CCC-2021-T0013_Aquino_torpg1.pdf', 'CCC-2021-T0013_Aquino_torpg2.pdf', 'CCC-2021-T0013_Aquino_goodmoral.pdf', 'CCC-2021-T0013_Aquino_birthcert.pdf', 'CCC-2021-T0013_Aquino_indigency.pdf', 'CCC-2021-T0013_Aquino_votecert.pdf'),
(14, 'Freshman', 'CCC-2021-F0014_Rivera_g11.pdf', 'CCC-2021-F0014_Rivera_g12.pdf', '', '', 'CCC-2021-F0014_Rivera_goodmoral.pdf', 'CCC-2021-F0014_Rivera_birthcert.pdf', 'CCC-2021-F0014_Rivera_indigency.pdf', 'CCC-2021-F0014_Rivera_votecert.pdf'),
(15, 'Freshman', 'CCC-2021-F0015_Lim_g11.pdf', 'CCC-2021-F0015_Lim_g12.pdf', '', '', 'CCC-2021-F0015_Lim_goodmoral.pdf', 'CCC-2021-F0015_Lim_birthcert.pdf', 'CCC-2021-F0015_Lim_indigency.pdf', 'CCC-2021-F0015_Lim_votecert.pdf'),
(16, 'Transferee', '', '', 'CCC-2021-T0016_Villegas_torpg1.pdf', 'CCC-2021-T0016_Villegas_torpg2.pdf', 'CCC-2021-T0016_Villegas_goodmoral.pdf', 'CCC-2021-T0016_Villegas_goodmoral.pdf', 'CCC-2021-T0016_Villegas_indigency.pdf', 'CCC-2021-T0016_Villegas_votecert.pdf'),
(17, 'Transferee', '', '', 'CCC-2021-T0017_Vasquez_torpg1.pdf', 'CCC-2021-T0017_Vasquez_torpg1.pdf', 'CCC-2021-T0017_Vasquez_goodmoral.pdf', 'CCC-2021-T0017_Vasquez_birthcert.pdf', 'CCC-2021-T0017_Vasquez_indigency.pdf', 'CCC-2021-T0017_Vasquez_votecert.pdf'),
(18, 'Freshman', 'CCC-2021-F0018_Rosario_g11.pdf', 'CCC-2021-F0018_Rosario_g12.pdf', '', '', 'CCC-2021-F0018_Rosario_goodmoral.pdf', 'CCC-2021-F0018_Rosario_birthcert.pdf', 'CCC-2021-F0018_Rosario_indigency.pdf', 'CCC-2021-F0018_Rosario_votecert.pdf'),
(19, 'Freshman', 'CCC-2021-F0019_Bernal_g11.pdf', 'CCC-2021-F0019_Bernal_g12.pdf', '', '', 'CCC-2021-F0019_Bernal_goodmoral.pdf', 'CCC-2021-F0019_Bernal_birthcert.pdf', 'CCC-2021-F0019_Bernal_indigency.pdf', 'CCC-2021-F0019_Bernal_votecert.pdf'),
(20, 'Freshman', 'CCC-2021-F0020_Cortes_g11.pdf', 'CCC-2021-F0020_Cortes_g12.pdf', '', '', 'CCC-2021-F0020_Cortes_goodmoral.pdf', 'CCC-2021-F0020_Cortes_birthcert.pdf', 'CCC-2021-F0020_Cortes_indigency.pdf', 'CCC-2021-F0020_Cortes_votecert.pdf'),
(21, 'Freshman', 'CCC-2021-F0021_Bernardino_g11.pdf', 'CCC-2021-F0021_Bernardino_g12.pdf', '', '', 'CCC-2021-F0021_Bernardino_goodmoral.pdf', 'CCC-2021-F0021_Bernardino_birthcert.pdf', 'CCC-2021-F0021_Bernardino_indigency.pdf', 'CCC-2021-F0021_Bernardino_votecert.pdf'),
(22, 'Freshman', 'CCC-2021-F0022_Sembrano_g11.pdf', 'CCC-2021-F0022_Sembrano_g12.pdf', '', '', 'CCC-2021-F0022_Sembrano_goodmoral.pdf', 'CCC-2021-F0022_Sembrano_birthcert.pdf', 'CCC-2021-F0022_Sembrano_birthcert.pdf', 'CCC-2021-F0022_Sembrano_votecert.pdf'),
(23, 'Freshman', 'CCC-2021-F0023_Bautista_g11.pdf', 'CCC-2021-F0023_Bautista_g12.pdf', '', '', 'CCC-2021-F0023_Bautista_goodmoral.pdf', 'CCC-2021-F0023_Bautista_birthcert.pdf', 'CCC-2021-F0023_Bautista_indigency.pdf', 'CCC-2021-F0023_Bautista_votecert.pdf'),
(24, 'Transferee', '', '', 'CCC-2021-T0024_Gonzaga_torpg1.pdf', 'CCC-2021-T0024_Gonzaga_torpg2.pdf', 'CCC-2021-T0024_Gonzaga_goodmoral.pdf', 'CCC-2021-T0024_Gonzaga_birthcert.pdf', 'CCC-2021-T0024_Gonzaga_indigency.pdf', 'CCC-2021-T0024_Gonzaga_votecert.pdf'),
(25, 'Freshman', 'CCC-2021-F0025_Galang_g11.pdf', 'CCC-2021-F0025_Galang_g12.pdf', '', '', 'CCC-2021-F0025_Galang_goodmoral.pdf', 'CCC-2021-F0025_Galang_birthcert.pdf', 'CCC-2021-F0025_Galang_indigency.pdf', 'CCC-2021-F0025_Galang_votecert.pdf'),
(26, 'Freshman', 'CCC-2021-F0026_De Castro_g11.pdf', 'CCC-2021-F0026_De Castro_g12.pdf', '', '', 'CCC-2021-F0026_De Castro_goodmoral.pdf', 'CCC-2021-F0026_De Castro_birthcert.pdf', 'CCC-2021-F0026_De Castro_indigency.pdf', 'CCC-2021-F0026_De Castro_votecert.pdf'),
(27, 'Freshman', 'CCC-2021-F0027_Luna_g11.pdf', 'CCC-2021-F0027_Luna_g12.pdf', '', '', 'CCC-2021-F0027_Luna_goodmoral.pdf', 'CCC-2021-F0027_Luna_birthcert.pdf', 'CCC-2021-F0027_Luna_indigency.pdf', 'CCC-2021-F0027_Luna_votecert.pdf'),
(28, 'Freshman', 'CCC-2021-F0028_Mendez_g11.pdf', 'CCC-2021-F0028_Mendez_g12.pdf', '', '', 'CCC-2021-F0028_Mendez_goodmoral.pdf', 'CCC-2021-F0028_Mendez_birthcert.pdf', 'CCC-2021-F0028_Mendez_indigency.pdf', 'CCC-2021-F0028_Mendez_votecert.pdf'),
(29, 'Freshman', 'CCC-2021-F0029_Villa_g11.pdf', 'CCC-2021-F0029_Villa_g12.pdf', '', '', 'CCC-2021-F0029_Villa_goodmoral.pdf', 'CCC-2021-F0029_Villa_birthcert.pdf', 'CCC-2021-F0029_Villa_indigency.pdf', 'CCC-2021-F0029_Villa_votecert.pdf'),
(30, 'Transferee', '', '', 'CCC-2021-T0030_Lozano_torpg1.pdf', 'CCC-2021-T0030_Lozano_torpg2.pdf', 'CCC-2021-T0030_Lozano_goodmoral.pdf', 'CCC-2021-T0030_Lozano_birthcert.pdf', 'CCC-2021-T0030_Lozano_indigency.pdf', 'CCC-2021-T0030_Lozano_votecert.pdf'),
(31, 'Freshman', 'CCC-2021-F0031_Dela Cruz_g11.pdf', 'CCC-2021-F0031_Dela Cruz_g12.pdf', '', '', 'CCC-2021-F0031_Dela Cruz_goodmoral.pdf', 'CCC-2021-F0031_Dela Cruz_birthcert.pdf', 'CCC-2021-F0031_Dela Cruz_indigency.pdf', 'CCC-2021-F0031_Dela Cruz_votecert.pdf'),
(32, 'Freshman', 'CCC-2021-F0032_Dela Cruz_g11.pdf', 'CCC-2021-F0032_Dela Cruz_g12.pdf', '', '', 'CCC-2021-F0032_Dela Cruz_goodmoral.pdf', 'CCC-2021-F0032_Dela Cruz_birthcert.pdf', 'CCC-2021-F0032_Dela Cruz_indigency.pdf', 'CCC-2021-F0032_Dela Cruz_votecert.pdf'),
(33, 'Freshman', 'CCC-2021-F0033_Musk_g11.pdf', 'CCC-2021-F0033_Musk_g12.pdf', '', '', 'CCC-2021-F0033_Musk_goodmoral.pdf', 'CCC-2021-F0033_Musk_birthcert.pdf', 'CCC-2021-F0033_Musk_indigency.pdf', 'CCC-2021-F0033_Musk_votecert.pdf'),
(34, 'Freshman', 'CCC-2021-F0034_Man_g11.pdf', 'CCC-2021-F0034_Man_g12.pdf', '', '', 'CCC-2021-F0034_Man_goodmoral.pdf', 'CCC-2021-F0034_Man_birthcert.pdf', 'CCC-2021-F0034_Man_indigency.pdf', 'CCC-2021-F0034_Man_votecert.pdf'),
(35, 'Freshman', 'CCC-2021-F0035_Estribo_g11.pdf', 'CCC-2021-F0035_Estribo_g12.pdf', '', '', 'CCC-2021-F0035_Estribo_goodmoral.pdf', 'CCC-2021-F0035_Estribo_birthcert.pdf', 'CCC-2021-F0035_Estribo_indigency.pdf', 'CCC-2021-F0035_Estribo_votecert.pdf'),
(36, 'Freshman', 'CCC-2021-F0036_Agapito_g11.pdf', 'CCC-2021-F0036_Agapito_g12.pdf', '', '', 'CCC-2021-F0036_Agapito_goodmoral.pdf', 'CCC-2021-F0036_Agapito_birthcert.pdf', 'CCC-2021-F0036_Agapito_birthcert.pdf', 'CCC-2021-F0036_Agapito_votecert.pdf'),
(37, 'Transferee', '', '', 'CCC-2021-T0037_Guinanao_g11.pdf', 'CCC-2021-T0037_Guinanao_torpg2.pdf', 'CCC-2021-T0037_Guinanao_goodmoral.pdf', 'CCC-2021-T0037_Guinanao_birthcert.pdf', 'CCC-2021-T0037_Guinanao_indigency.pdf', 'CCC-2021-T0037_Guinanao_votecert.pdf'),
(38, 'Freshman', 'CCC-2021-F0038_Guinanao_g11.pdf', 'CCC-2021-F0038_Guinanao_g12.pdf', '', '', 'CCC-2021-F0038_Guinanao_goodmoral.pdf', 'CCC-2021-F0038_Guinanao_birthcert.pdf', 'CCC-2021-F0038_Guinanao_indigency.pdf', 'CCC-2021-F0038_Guinanao_votecert.pdf'),
(39, 'Freshman', 'CCC-2021-F0038_Guinanao_g11.pdf', 'CCC-2021-F0038_Guinanao_g12.pdf', '', '', 'CCC-2021-F0038_Guinanao_goodmoral.pdf', 'CCC-2021-F0038_Guinanao_birthcert.pdf', 'CCC-2021-F0038_Guinanao_indigency.pdf', 'CCC-2021-F0038_Guinanao_votecert.pdf'),
(40, 'Freshman', 'CCC-2021-F0038_Guinanao_g11.pdf', 'CCC-2021-F0038_Guinanao_g12.pdf', '', '', 'CCC-2021-F0038_Guinanao_goodmoral.pdf', 'CCC-2021-F0038_Guinanao_birthcert.pdf', 'CCC-2021-F0038_Guinanao_indigency.pdf', 'CCC-2021-F0038_Guinanao_votecert.pdf'),
(41, 'Freshman', 'CCC-2021-F0038_Guinanao_g11.pdf', 'CCC-2021-F0038_Guinanao_g12.pdf', '', '', 'CCC-2021-F0038_Guinanao_goodmoral.pdf', 'CCC-2021-F0038_Guinanao_birthcert.pdf', 'CCC-2021-F0038_Guinanao_indigency.pdf', 'CCC-2021-F0038_Guinanao_votecert.pdf'),
(42, 'Freshman', 'CCC-2021-F0039_Guinanao_g11.pdf', 'CCC-2021-F0039_Guinanao_g12.pdf', '', '', 'CCC-2021-F0039_Guinanao_goodmoral.pdf', 'CCC-2021-F0039_Guinanao_birthcert.pdf', 'CCC-2021-F0039_Guinanao_indigency.pdf', 'CCC-2021-F0039_Guinanao_votecert.pdf'),
(43, 'Freshman', 'CCC-2021-F0040_Guinanao_g11.pdf', 'CCC-2021-F0040_Guinanao_g12.pdf', '', '', 'CCC-2021-F0040_Guinanao_goodmoral.pdf', 'CCC-2021-F0040_Guinanao_birthcert.pdf', 'CCC-2021-F0040_Guinanao_indigency.pdf', 'CCC-2021-F0040_Guinanao_votecert.pdf'),
(44, 'Freshman', 'CCC-2021-F0041_Guinanao_g11.pdf', 'CCC-2021-F0041_Guinanao_g12.pdf', '', '', 'CCC-2021-F0041_Guinanao_goodmoral.pdf', 'CCC-2021-F0041_Guinanao_birthcert.pdf', 'CCC-2021-F0041_Guinanao_indigency.pdf', 'CCC-2021-F0041_Guinanao_votecert.pdf'),
(45, 'Freshman', 'CCC-2021-F0042_sadss_g11.pdf', 'CCC-2021-F0042_sadss_g12.pdf', '', '', 'CCC-2021-F0042_sadss_goodmoral.pdf', 'CCC-2021-F0042_sadss_birthcert.pdf', 'CCC-2021-F0042_sadss_indigency.pdf', 'CCC-2021-F0042_sadss_votecert.pdf'),
(46, 'Freshman', 'CCC-2021-F0043_Guinanao_g11.pdf', 'CCC-2021-F0043_Guinanao_g12.pdf', '', '', 'CCC-2021-F0043_Guinanao_goodmoral.pdf', 'CCC-2021-F0043_Guinanao_birthcert.pdf', 'CCC-2021-F0043_Guinanao_indigency.pdf', 'CCC-2021-F0043_Guinanao_votecert.pdf'),
(47, 'Transferee', '', '', 'CCC-2021-T0044_Guinanao_torpg1.pdf', 'CCC-2021-T0044_Guinanao_torpg2.pdf', 'CCC-2021-T0044_Guinanao_goodmoral.pdf', 'CCC-2021-T0044_Guinanao_birthcert.pdf', 'CCC-2021-T0044_Guinanao_indigency.pdf', 'CCC-2021-T0044_Guinanao_votecert.pdf'),
(48, 'Transferee', '', '', 'CCC-2021-T0045_Guinanao_torpg1.pdf', 'CCC-2021-T0045_Guinanao_torpg2.pdf', 'CCC-2021-T0045_Guinanao_goodmoral.pdf', 'CCC-2021-T0045_Guinanao_birthcert.pdf', 'CCC-2021-T0045_Guinanao_indigency.pdf', 'CCC-2021-T0045_Guinanao_votecert.pdf'),
(49, 'Freshman', '-.pdf', '-.pdf', '', '', '-.pdf', '-.pdf', '-.pdf', '-.pdf'),
(50, 'Transferee', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf'),
(51, 'Freshman', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf'),
(52, 'Freshman', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf'),
(53, 'Freshman', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf'),
(54, 'Freshman', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf'),
(55, 'Freshman', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf', '-.pdf'),
(56, 'Freshman', '2022-A-0020.pdf', '2022-A-0020.pdf', NULL, NULL, '2022-A-0020.pdf', '2022-A-0020.pdf', '2022-A-0020.pdf', '2022-A-0020.pdf'),
(57, 'Freshman', '2022-A-0021.pdf', '2022-A-0021.pdf', NULL, NULL, '2022-A-0021.pdf', '2022-A-0021.pdf', '2022-A-0021.pdf', '2022-A-0021.pdf'),
(58, 'Freshman', '2022-A-0022.pdf', '2022-A-0022.pdf', NULL, NULL, '2022-A-0022.pdf', '2022-A-0022.pdf', '2022-A-0022.pdf', '2022-A-0022.pdf'),
(59, 'Freshman', '2022-A-0023.pdf', '2022-A-0023.pdf', NULL, NULL, '2022-A-0023.pdf', '2022-A-0023.pdf', '2022-A-0023.pdf', '2022-A-0023.pdf'),
(60, 'Freshman', '2022-A-0024.pdf', '2022-A-0024.pdf', NULL, NULL, '2022-A-0024.pdf', '2022-A-0024.pdf', '2022-A-0024.pdf', '2022-A-0024.pdf'),
(61, 'Freshman', '2022-A-0025.pdf', '2022-A-0025.pdf', NULL, NULL, '2022-A-0025.pdf', '2022-A-0025.pdf', '2022-A-0025.pdf', '2022-A-0025.pdf');

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
(1, 'CCC-2021-T0013', 73, ''),
(2, 'CCC-2021-T0013', 73, ''),
(3, 'CCC-2021-T0013', 73, ''),
(4, 'CCC-2021-T0013', 73, ''),
(5, 'CCC-2021-T0013', 73, ''),
(6, 'CCC-2021-T0013', 73, ''),
(7, 'CCC-2021-T0013', 73, ''),
(8, 'CCC-2021-T0013', 73, ''),
(9, 'CCC-2021-T0013', 73, ''),
(10, 'CCC-2021-T0013', 73, ''),
(11, 'CCC-2021-T0013', 73, ''),
(12, 'CCC-2021-T0013', 73, ''),
(13, 'CCC-2021-T0013', 73, ''),
(14, 'CCC-2021-T0013', 73, ''),
(15, 'CCC-2021-T0013', 73, ''),
(16, 'CCC-2021-T0013', 73, ''),
(17, 'CCC-2021-T0013', 29, 'B'),
(18, 'CCC-2021-T0013', 19, 'B'),
(19, 'CCC-2021-T0013', 18, 'H'),
(20, 'CCC-2021-T0013', 66, 'G'),
(21, 'CCC-2021-T0013', 30, 'H'),
(22, 'CCC-2021-T0013', 45, 'C'),
(23, 'CCC-2021-T0013', 34, 'H'),
(24, 'CCC-2021-T0013', 2, 'H'),
(25, 'CCC-2021-T0013', 22, 'F'),
(26, 'CCC-2021-T0013', 49, 'C'),
(27, 'CCC-2021-T0013', 14, 'H'),
(28, 'CCC-2021-T0013', 68, 'F'),
(29, 'CCC-2021-T0013', 48, 'F'),
(30, 'CCC-2021-T0013', 60, 'H'),
(31, 'CCC-2021-T0013', 38, 'H'),
(32, 'CCC-2021-T0013', 53, 'C'),
(33, 'CCC-2021-T0013', 65, 'C'),
(34, 'CCC-2021-T0013', 43, 'B'),
(35, 'CCC-2021-T0013', 27, 'D'),
(36, 'CCC-2021-T0013', 7, 'C'),
(37, 'CCC-2021-T0013', 10, 'F'),
(38, 'CCC-2021-T0013', 8, 'F'),
(39, 'CCC-2021-T0013', 52, 'H'),
(40, 'CCC-2021-T0013', 57, 'D'),
(41, 'CCC-2021-T0013', 58, 'H'),
(42, 'CCC-2021-T0013', 39, 'B'),
(43, 'CCC-2021-T0013', 54, 'F'),
(44, 'CCC-2021-T0013', 17, 'C'),
(45, 'CCC-2021-T0013', 25, 'C'),
(46, 'CCC-2021-T0013', 63, 'A'),
(47, 'CCC-2021-T0013', 36, 'J'),
(48, 'CCC-2021-T0013', 50, 'H'),
(49, 'CCC-2021-T0013', 46, 'H'),
(50, 'CCC-2021-T0013', 1, 'B'),
(51, 'CCC-2021-T0013', 23, 'C'),
(52, 'CCC-2021-T0013', 71, 'D'),
(53, 'CCC-2021-T0013', 69, 'C'),
(54, 'CCC-2021-T0013', 51, 'C'),
(55, 'CCC-2021-T0013', 44, 'H'),
(56, 'CCC-2021-T0013', 59, 'A'),
(57, 'CCC-2021-T0013', 67, 'C'),
(58, 'CCC-2021-T0013', 40, 'J'),
(59, 'CCC-2021-T0013', 12, 'F'),
(60, 'CCC-2021-T0013', 33, 'D'),
(61, 'CCC-2021-T0013', 21, 'D'),
(62, 'CCC-2021-T0013', 13, 'A'),
(63, 'CCC-2021-T0013', 20, 'I'),
(64, 'CCC-2021-T0013', 47, 'E'),
(65, 'CCC-2021-T0013', 9, 'C'),
(66, 'CCC-2021-T0013', 55, 'C'),
(67, 'CCC-2021-T0013', 3, 'D'),
(68, 'CCC-2021-T0013', 31, 'A'),
(69, 'CCC-2021-T0013', 26, 'I'),
(70, 'CCC-2021-T0013', 64, 'G'),
(71, 'CCC-2021-T0013', 5, 'C'),
(72, 'CCC-2021-T0013', 41, 'A'),
(73, 'CCC-2021-T0013', 16, 'G'),
(74, 'CCC-2021-T0013', 72, 'H'),
(75, 'CCC-2021-T0013', 28, 'I'),
(76, 'CCC-2021-T0013', 42, 'J'),
(77, 'CCC-2021-T0013', 37, 'D'),
(78, 'CCC-2021-T0013', 4, 'F'),
(79, 'CCC-2021-T0013', 6, 'I'),
(80, 'CCC-2021-T0013', 35, 'C'),
(81, 'CCC-2021-T0013', 32, 'H'),
(82, 'CCC-2021-T0013', 15, 'B'),
(83, 'CCC-2021-T0013', 56, 'G'),
(84, 'CCC-2021-T0013', 61, 'C'),
(85, 'CCC-2021-T0013', 70, 'G'),
(86, 'CCC-2021-T0013', 62, 'H'),
(87, 'CCC-2021-T0013', 24, 'H'),
(88, 'CCC-2021-T0013', 11, 'B'),
(89, 'CCC-2021-T0013', 73, ''),
(90, 'CCC-2021-F0048', 59, 'B'),
(91, 'CCC-2021-F0048', 40, 'H'),
(92, 'CCC-2021-F0048', 22, 'G'),
(93, 'CCC-2021-F0048', 57, 'D'),
(94, 'CCC-2021-F0048', 41, 'C'),
(95, 'CCC-2021-F0048', 37, 'D'),
(96, 'CCC-2021-F0048', 2, 'H'),
(97, 'CCC-2021-F0048', 4, 'F'),
(98, 'CCC-2021-F0048', 72, 'J'),
(99, 'CCC-2021-F0048', 1, 'E'),
(100, 'CCC-2021-F0048', 52, 'H'),
(101, 'CCC-2021-F0048', 65, 'D'),
(102, 'CCC-2021-F0048', 69, 'B'),
(103, 'CCC-2021-F0048', 64, 'I'),
(104, 'CCC-2021-F0048', 24, 'I'),
(105, 'CCC-2021-F0048', 26, 'J'),
(106, 'CCC-2021-F0048', 63, 'B'),
(107, 'CCC-2021-F0048', 3, 'D'),
(108, 'CCC-2021-F0048', 67, 'B'),
(109, 'CCC-2021-F0048', 32, 'F'),
(110, 'CCC-2021-F0048', 51, 'D'),
(111, 'CCC-2021-F0048', 6, 'I'),
(112, 'CCC-2021-F0048', 56, 'G'),
(113, 'CCC-2021-F0048', 66, 'G'),
(114, 'CCC-2021-F0048', 25, 'C'),
(115, 'CCC-2021-F0048', 19, 'A'),
(116, 'CCC-2021-F0048', 5, 'C'),
(117, 'CCC-2021-F0048', 35, 'C'),
(118, 'CCC-2021-F0048', 44, 'J'),
(119, 'CCC-2021-F0048', 12, 'G'),
(120, 'CCC-2021-F0048', 50, 'I'),
(121, 'CCC-2021-F0048', 39, 'C'),
(122, 'CCC-2021-F0048', 48, 'H'),
(123, 'CCC-2021-F0048', 71, 'C'),
(124, 'CCC-2021-F0048', 36, 'J'),
(125, 'CCC-2021-F0048', 45, 'D'),
(126, 'CCC-2021-F0048', 43, 'A'),
(127, 'CCC-2021-F0048', 11, 'C'),
(128, 'CCC-2021-F0048', 68, 'F'),
(129, 'CCC-2021-F0048', 27, 'C'),
(130, 'CCC-2021-F0048', 21, 'E'),
(131, 'CCC-2021-F0048', 10, 'H'),
(132, 'CCC-2021-F0048', 29, 'B'),
(133, 'CCC-2021-F0048', 46, 'I'),
(134, 'CCC-2021-F0048', 62, 'I'),
(135, 'CCC-2021-F0048', 54, 'G'),
(136, 'CCC-2021-F0048', 30, 'H'),
(137, 'CCC-2021-F0048', 33, 'D'),
(138, 'CCC-2021-F0048', 42, 'H'),
(139, 'CCC-2021-F0048', 7, 'E'),
(140, 'CCC-2021-F0048', 9, 'C'),
(141, 'CCC-2021-F0048', 15, 'E'),
(142, 'CCC-2021-F0048', 34, 'G'),
(143, 'CCC-2021-F0048', 23, 'C'),
(144, 'CCC-2021-F0048', 18, 'G'),
(145, 'CCC-2021-F0048', 20, 'I'),
(146, 'CCC-2021-F0048', 31, 'B'),
(147, 'CCC-2021-F0048', 38, 'H'),
(148, 'CCC-2021-F0048', 58, 'I'),
(149, 'CCC-2021-F0048', 55, 'C'),
(150, 'CCC-2021-F0048', 16, 'I'),
(151, 'CCC-2021-F0048', 49, 'C'),
(152, 'CCC-2021-F0048', 73, ''),
(153, 'CCC-2021-F0048', 73, ''),
(154, 'CCC-2021-F0048', 73, ''),
(155, 'CCC-2021-F0048', 73, ''),
(156, 'CCC-2021-F0048', 73, ''),
(157, 'CCC-2021-T0013', 73, ''),
(158, 'CCC-2021-F0033', 56, 'G'),
(159, 'CCC-2021-F0033', 64, 'H'),
(160, 'CCC-2021-F0033', 9, 'D'),
(161, 'CCC-2021-F0033', 57, 'C'),
(162, 'CCC-2021-F0033', 73, ''),
(163, 'CCC-2021-F0033', 73, ''),
(164, 'CCC-2021-F0033', 73, ''),
(165, 'CCC-2021-F0033', 73, ''),
(166, 'CCC-2021-F0033', 73, ''),
(167, 'CCC-2021-F0033', 73, ''),
(168, 'CCC-2021-F0033', 73, ''),
(169, 'CCC-2021-F0039', 26, 'H'),
(170, 'CCC-2021-F0039', 64, 'H'),
(171, 'CCC-2021-F0039', 31, 'A'),
(172, 'CCC-2021-F0039', 65, 'C'),
(173, 'CCC-2021-F0039', 43, 'A'),
(174, 'CCC-2021-F0039', 40, 'H'),
(175, 'CCC-2021-F0039', 59, 'A'),
(176, 'CCC-2021-F0039', 37, 'D'),
(177, 'CCC-2021-F0039', 12, 'G'),
(178, 'CCC-2021-F0039', 8, 'F'),
(179, 'CCC-2021-F0039', 33, 'B'),
(180, 'CCC-2021-F0039', 70, 'F'),
(181, 'CCC-2021-F0039', 62, 'H'),
(182, 'CCC-2021-F0039', 1, 'E'),
(183, 'CCC-2021-F0039', 63, 'B'),
(184, 'CCC-2021-F0039', 25, 'B'),
(185, 'CCC-2021-F0039', 57, 'C'),
(186, 'CCC-2021-F0039', 29, 'A'),
(187, 'CCC-2021-F0039', 56, 'G'),
(188, 'CCC-2021-F0039', 49, 'C'),
(189, 'CCC-2021-F0039', 13, 'B'),
(190, 'CCC-2021-F0039', 11, 'D'),
(191, 'CCC-2021-F0039', 6, 'I'),
(192, 'CCC-2021-F0039', 36, 'F'),
(193, 'CCC-2021-F0039', 28, 'I'),
(194, 'CCC-2021-F0039', 9, 'C'),
(195, 'CCC-2021-F0039', 20, 'H'),
(196, 'CCC-2021-F0039', 52, 'H'),
(197, 'CCC-2021-F0039', 18, 'G'),
(198, 'CCC-2021-F0039', 71, 'B'),
(199, 'CCC-2021-F0039', 41, 'B'),
(200, 'CCC-2021-F0039', 54, 'F'),
(201, 'CCC-2021-F0039', 48, 'G'),
(202, 'CCC-2021-F0039', 67, 'D'),
(203, 'CCC-2021-F0039', 30, 'I'),
(204, 'CCC-2021-F0039', 38, 'H'),
(205, 'CCC-2021-F0039', 3, 'D'),
(206, 'CCC-2021-F0039', 14, 'I'),
(207, 'CCC-2021-F0039', 55, 'B'),
(208, 'CCC-2021-F0039', 50, 'I'),
(209, 'CCC-2021-F0039', 46, 'I'),
(210, 'CCC-2021-F0039', 61, 'E'),
(211, 'CCC-2021-F0039', 2, 'H'),
(212, 'CCC-2021-F0039', 24, 'I'),
(213, 'CCC-2021-F0039', 23, 'D'),
(214, 'CCC-2021-F0039', 10, 'H'),
(215, 'CCC-2021-F0039', 58, 'F'),
(216, 'CCC-2021-F0039', 22, 'F'),
(217, 'CCC-2021-F0039', 68, 'F'),
(218, 'CCC-2021-F0039', 4, 'F'),
(219, 'CCC-2021-F0039', 45, 'C'),
(220, 'CCC-2021-F0039', 7, 'C'),
(221, 'CCC-2021-F0039', 15, 'B'),
(222, 'CCC-2021-F0039', 19, 'A'),
(223, 'CCC-2021-F0039', 60, 'H'),
(224, 'CCC-2021-F0039', 39, 'C'),
(225, 'CCC-2021-F0039', 53, 'D'),
(226, 'CCC-2021-F0039', 44, 'I'),
(227, 'CCC-2021-F0039', 51, 'D'),
(228, 'CCC-2021-F0039', 42, 'I'),
(229, 'CCC-2021-F0039', 32, 'G'),
(230, 'CCC-2021-F0039', 47, 'D'),
(231, 'CCC-2021-F0039', 5, 'A'),
(232, 'CCC-2021-F0039', 69, 'C'),
(233, 'CCC-2021-F0039', 66, 'F'),
(234, 'CCC-2021-F0039', 27, 'C'),
(235, 'CCC-2021-F0039', 34, 'G'),
(236, 'CCC-2021-F0039', 16, 'I'),
(237, 'CCC-2021-F0039', 35, 'C'),
(238, 'CCC-2021-F0039', 21, 'C'),
(239, 'CCC-2021-F0039', 17, 'C'),
(240, 'CCC-2021-F0039', 72, 'G'),
(241, 'CCC-2021-F0039', 73, ''),
(242, 'CCC-2021-F0039', 73, ''),
(243, 'CCC-2021-F0039', 73, ''),
(244, 'CCC-2021-F0039', 73, ''),
(245, 'CCC-2021-F0039', 73, ''),
(246, 'CCC-2021-F0039', 3, 'C'),
(247, 'CCC-2021-F0039', 30, 'F'),
(248, 'CCC-2021-F0039', 15, 'C'),
(249, 'CCC-2021-F0039', 38, 'H'),
(250, 'CCC-2021-F0039', 67, 'B'),
(251, 'CCC-2021-F0039', 54, 'F'),
(252, 'CCC-2021-F0039', 19, 'A'),
(253, 'CCC-2021-F0039', 59, 'A'),
(254, 'CCC-2021-F0039', 18, 'H'),
(255, 'CCC-2021-F0039', 53, 'C'),
(256, 'CCC-2021-F0039', 51, 'D'),
(257, 'CCC-2021-F0039', 27, 'D'),
(258, 'CCC-2021-F0039', 5, 'C'),
(259, 'CCC-2021-F0039', 26, 'H'),
(260, 'CCC-2021-F0039', 1, 'D'),
(261, 'CCC-2021-F0039', 10, 'I'),
(262, 'CCC-2021-F0039', 4, 'G'),
(263, 'CCC-2021-F0039', 64, 'H'),
(264, 'CCC-2021-F0039', 17, 'A'),
(265, 'CCC-2021-F0039', 9, 'C'),
(266, 'CCC-2021-F0039', 69, 'C'),
(267, 'CCC-2021-F0039', 12, 'G'),
(268, 'CCC-2021-F0039', 2, 'I'),
(269, 'CCC-2021-F0039', 61, 'D'),
(270, 'CCC-2021-F0039', 33, 'C'),
(271, 'CCC-2021-F0039', 52, 'I'),
(272, 'CCC-2021-F0039', 13, 'E'),
(273, 'CCC-2021-F0039', 31, 'B'),
(274, 'CCC-2021-F0039', 29, 'B'),
(275, 'CCC-2021-F0039', 57, 'B'),
(276, 'CCC-2021-F0039', 8, 'F'),
(277, 'CCC-2021-F0039', 6, 'I'),
(278, 'CCC-2021-F0039', 36, 'G'),
(279, 'CCC-2021-F0039', 62, 'H'),
(280, 'CCC-2021-F0039', 70, 'G'),
(281, 'CCC-2021-F0039', 60, 'H'),
(282, 'CCC-2021-F0039', 14, 'J'),
(283, 'CCC-2021-F0039', 25, 'C'),
(284, 'CCC-2021-F0039', 28, 'H'),
(285, 'CCC-2021-F0039', 22, 'F'),
(286, 'CCC-2021-F0039', 37, 'C'),
(287, 'CCC-2021-F0039', 50, 'H'),
(288, 'CCC-2021-F0039', 16, 'H'),
(289, 'CCC-2021-F0039', 55, 'C'),
(290, 'CCC-2021-F0039', 23, 'D'),
(291, 'CCC-2021-F0039', 65, 'D'),
(292, 'CCC-2021-F0039', 48, 'F'),
(293, 'CCC-2021-F0039', 43, 'A'),
(294, 'CCC-2021-F0039', 42, 'G'),
(295, 'CCC-2021-F0039', 47, 'A'),
(296, 'CCC-2021-F0039', 58, 'H'),
(297, 'CCC-2021-F0039', 68, 'F'),
(298, 'CCC-2021-F0039', 11, 'D'),
(299, 'CCC-2021-F0039', 45, 'D'),
(300, 'CCC-2021-F0039', 34, 'I'),
(301, 'CCC-2021-F0039', 32, 'F'),
(302, 'CCC-2021-F0039', 39, 'C'),
(303, 'CCC-2021-F0039', 44, 'H'),
(304, 'CCC-2021-F0039', 56, 'G'),
(305, 'CCC-2021-F0039', 21, 'E'),
(306, 'CCC-2021-F0039', 40, 'G'),
(307, 'CCC-2021-F0039', 24, 'I'),
(308, 'CCC-2021-F0039', 71, 'C'),
(309, 'CCC-2021-F0039', 20, 'H'),
(310, 'CCC-2021-F0039', 41, 'B'),
(311, 'CCC-2021-F0039', 66, 'H'),
(312, 'CCC-2021-F0039', 46, 'I'),
(313, 'CCC-2021-F0039', 35, 'C'),
(314, 'CCC-2021-F0039', 72, 'I'),
(315, 'CCC-2021-F0039', 7, 'B'),
(316, 'CCC-2021-F0039', 49, 'C'),
(317, 'CCC-2021-F0039', 63, 'B'),
(318, 'CCC-2021-F0039', 73, ''),
(319, '', 73, ''),
(320, 'CCC-2021-F0039', 73, ''),
(321, 'CCC-2021-F0046', 73, ''),
(322, 'CCC-2021-F0046', 73, ''),
(323, 'CCC-2021-F0046', 73, ''),
(324, 'CCC-2021-F0046', 73, ''),
(325, 'CCC-2021-F0046', 73, ''),
(326, 'CCC-2021-F0046', 73, ''),
(327, 'CCC-2021-F0046', 73, ''),
(328, 'CCC-2021-F0046', 73, ''),
(329, 'CCC-2021-F0046', 73, ''),
(330, 'CCC-2021-F0039', 73, ''),
(331, 'CCC-2021-F0039', 73, ''),
(332, 'CCC-2021-F0039', 73, ''),
(333, 'CCC-2021-F0039', 73, ''),
(334, 'CCC-2021-F0039', 73, ''),
(335, 'CCC-2021-F0039', 6, 'H'),
(336, 'CCC-2021-F0039', 71, 'C'),
(337, 'CCC-2021-F0039', 12, 'G'),
(338, 'CCC-2021-F0039', 35, 'C'),
(339, 'CCC-2021-F0039', 69, 'D'),
(340, 'CCC-2021-F0039', 21, 'E'),
(341, 'CCC-2021-F0039', 38, 'H'),
(342, 'CCC-2021-F0039', 41, 'A'),
(343, 'CCC-2021-F0039', 73, ''),
(344, 'CCC-2022-F0012', 24, 'I'),
(345, 'CCC-2022-F0012', 49, 'D'),
(346, 'CCC-2022-F0012', 1, 'C'),
(347, 'CCC-2022-F0012', 73, '');

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
(1, 'CCC-2021-F0007', 'Bea Atienza', '12:54 PM', '12:56 PM', 'Taken', 0),
(2, 'CCC-2021-F0026', 'Carmela De Castro', '01:52 PM', '01:54 PM', 'Taken', 0),
(3, 'CCC-2021-T0024', 'Paulo Gonzaga', '02:14 PM', '05:13 PM', 'Taken', 0),
(4, 'CCC-2021-F0022', 'Dexter Sembrano', '05:16 PM', '05:20 PM', 'Taken', 0),
(5, 'CCC-2021-F0019', 'Lance Bernal', '05:32 PM', '05:43 PM', 'Taken', 0),
(6, 'CCC-2021-T0016', 'Lyra Jade Villegas', '05:52 PM', '05:53 PM', 'Taken', 0),
(7, 'CCC-2021-F0014', 'Carlo Rivera', '05:56 PM', '06:03 PM', 'Taken', 0),
(8, 'CCC-2021-F0012', 'Grace Fajardo', '06:10 PM', '06:14 PM', 'Taken', 0),
(9, 'CCC-2021-T0008', 'Kenneth  Suarez', '09:19 PM', '09:23 PM', 'Taken', 0),
(10, 'CCC-2021-T0004', 'Kimberly Alcantara', '09:25 PM', '09:30 PM', 'Taken', 0),
(11, 'CCC-2021-F0003', 'Joshua Mendoza', '09:34 PM', '09:36 PM', 'Taken', 0),
(12, 'CCC-2021-T0002', 'Nicole Reyes', '10:38 PM', '01:38 AM', 'Taken', 0),
(13, 'CCC-2021-T0030', 'Bryan Lozano', '07:02 PM', '07:04 PM', 'Taken', 0),
(16, 'CCC-2021-F0034', 'Rasta  Man', '03:59 PM', '04:01 PM', 'Taken', 0),
(70, 'CCC-2021-F0048', 'asd asd', '10:11 PM', '10:12 PM', 'Taken', 0),
(71, 'CCC-2021-T0013', 'Alyssa Aquino', '02:42 AM', '02:43 AM', 'Taken', 0),
(74, 'CCC-2021-F0033', 'Elon Musk', '03:03 PM', '03:31 PM', 'Taken', 0),
(82, 'CCC-2021-F0046', 'Bong Go', '08:54 PM', '09:55 PM', 'Taken', 0),
(84, 'CCC-2022-F0012', 'Rico Guinanao', '09:13 PM', '09:13 PM', 'Taken', 4);

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
(1, 'CCC-2022-F0001', '1633327678_1f.jpg', 'Angel ', 'Garcia', 'Dela Cruz', '', 18, 'Manila', '02-18-2003', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'angelgarcia@gmail.com', '09124578956', 'BSA', 'BEED', 'Yes', '5', 'Purok 7', 'Majada Labas', 'Calamba', '4027', 'Purok 7', 'Majada Labas', 'Calamba', '4027', 'Working Student', 'Yes', 'Pending'),
(2, 'CCC-2022-T0002', '1633332503_2f.jpg', 'Nicole', 'Santos', 'Reyes', '', 19, 'Palo Alto', '07-15-2002', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Transferee', 'nicolereyes@gmail.com', '09124156221', 'BEED', 'BSEE', 'Yes', '19', 'Block 3, Lot 55, Lynville', 'Palo-Alto', 'Calamba', '4027', 'Block 3, Lot 55, Lynville', 'Palo-Alto', 'Calamba', '4027', 'N/A', 'Yes', 'Verified'),
(3, 'CCC-2022-F0003', '1633336925_1m.jpg', 'Joshua', 'Cruz', 'Mendoza', '', 18, 'Parian Canlubang', '08-13-2003', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'joshuamendoza@gmail.com', '09215477896', 'BSIT', 'BSCS', 'Yes', '18', 'Asia 1, Kapayapaan Ville', 'Canlubang', 'Calamba', '4027', 'Asia 1, Kapayapaan Ville', 'Canlubang', 'Calamba', '4027', 'Recipient of 4Ps\nWorking Student', 'Yes', 'Verified'),
(4, 'CCC-2022-T0004', '1633339008_3f.jpg', 'Kimberly', 'Robles', 'Alcantara', '', 20, 'Calamba Medical Center', '2021-11-17', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Transferee', 'kimalcantara@gmail.com', '09134678985', 'BSA', 'BSAIS', 'Yes', '20', 'Block 4, Lot 13, Ramada Homes', 'Lecheria', 'Calamba', '4027', 'Block 4, Lot 13, Ramada Homes', 'Lecheria', 'Calamba', '4027', 'N/A', 'Yes', 'Verified'),
(5, 'CCC-2022-F0005', '1633342718_2m.jpg', 'Jacob', 'Robles', 'Mallari', 'Jr.', 18, 'Bucal Calamba', '07-22-2003', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'jacobmallari@gmail.com', '09213325669', 'BSIT', 'BSCS', 'Yes', '18', 'Villa Remedios East', 'Halang', 'Calamba', '4027', 'Villa Remedios East', 'Halang', 'Calamba', '4027', 'N/A', 'N/A', 'Pending'),
(6, 'CCC-2022-F0006', '1633347870_3m.jpg', 'Mark', 'Zamora', 'Estrada', '', 18, 'Canlubang', '10-21-2003', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'markestrada@gmail.com', '09125412488', 'BSCS', 'BSIT', 'Yes', '18', 'Block 15, Lot 70, Majada In', 'Canlubang', 'Calamba', '4027', 'Block 15, Lot 70, Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', 'Yes', 'Pending'),
(8, 'CCC-2022-T0008', '1633357311_4m.jpg', 'Kenneth ', 'Avila', 'Suarez', '', 20, 'CMC', '01-23-2001', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Transferee', 'kensuarez@gmail.com', '09124511214', 'BEED', 'BSEM', 'Yes', '20', 'Block 12, Lot 4, Manggo St', 'Lawa', 'Calamba', '4027', 'Block 12, Lot 4, Manggo St', 'Lawa', 'Calamba', '4027', 'Working Student', 'Yes', 'Verified'),
(9, 'CCC-2021-F0009', '1633359469_5m.jpg', 'John Vincent', 'Chua', 'Pangilinan', '', 19, 'Real Calamba', '10-15-2002', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'johnvincent@gmail.com', '09213248751', 'BSA', 'BSAIS', 'Yes', '19', 'Block 13, Lot 56, Calamba Heights Village', 'Real', 'Calamba', '4027', 'Block 13, Lot 56, Calamba Heights Village', 'Real', 'Calamba', '4027', 'Recipient of Student Financial Assistance', 'Yes', 'Declined'),
(10, 'CCC-2021-F0010', '1633360597_6m.jpg', 'Mark Anthony', 'Ruiz', 'Beltran', '', 19, 'Canlubang', '09-16-2002', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'markbeltran@gmail.com', '09145157463', 'BSCS', 'BSIT', 'Yes', '19', 'Block 20, Lot 4, Majada In', 'Canlubang', 'Calamba', '4027', 'Block 20, Lot 4, Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', 'Yes', 'Declined'),
(11, 'CCC-2022-T0011', '1633365441_5f.jpg', 'Mary Rose', 'Espiritu', 'Legaspi', '', 21, 'Real Calamba', '10-28-1999', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Transferee', 'maryroselegaspi@gmail.com', '09125422339', 'BSAIS', 'BSIT', 'Yes', '21', 'Block 12, Lot 32, Calamba Heights Village', 'Real', 'Calamba', '4027', 'Block 12, Lot 32, Calamba Heights Village', 'Real', 'Calamba', '4027', 'Recipient of Student Financial Assistance\nRecipient of 4Ps', 'Yes', 'Verified'),
(12, 'CCC-2021-F0012', '1633369570_6f.png', 'Grace', 'Pascua', 'Fajardo', '', 19, 'Banadero', '01-29-2002', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'gracefajardo@gmail.com', '09231548963', 'BEED', 'BSEE', 'Yes', '19', 'Block 14, Lot 4, Nara St', 'Banadero', 'Calamba', '4027', 'Block 14, Lot 4, Nara St', 'Banadero', 'Calamba', '4027', 'N/A', 'Yes', 'Verified'),
(13, 'CCC-2022-T0013', '1633421214_7f.jpg', 'Alyssa', 'Castro', 'Aquino', '', 20, 'Bucal', '12-20-2001', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Transferee', 'alyssaaquino@gmail.com', '09452368798', 'BSA', 'BSCS', 'Yes', '20', 'Block 23, Purok 1', 'Bucal', 'Calamba', '4027', 'Block 23, Purok 1', 'Bucal', 'Calamba', '4027', 'N/A', 'Yes', 'Verified'),
(14, 'CCC-2021-F0014', '1633422807_7m.jpg', 'Carlo', 'Torres', 'Rivera', '', 19, 'Paciano Calamba', '10-15-2002', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'carlorivera@gmail.com', '09154862345', 'BSIT', 'BSCS', 'Yes', '19', 'Block 20, Lot 45, Modern Village', 'Paciano Rizal', 'Calamba', '4027', 'Block 20, Lot 45, Modern Village', 'Paciano Rizal', 'Calamba', '4027', 'Recipient of Student Financial Assistance', 'Yes', 'Verified'),
(15, 'CCC-2021-F0015', '1633424147_8m.png', 'Nandy', 'Ferrara', 'Lim', '', 19, 'CMC', '09-23-2002', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'nandylim@gmail.com', '09145124578', 'BSA', 'BSCS', 'Yes', '19', 'Blk 9 Lot 4 South Spring Villas', 'Bucal', 'Calamba', '4027', 'Blk 9 Lot 4 South Spring Villas', 'Bucal', 'Calamba', '4027', 'N/A', 'Yes', 'Verified'),
(16, 'CCC-2021-T0016', '1633429875_8f.jpg', 'Lyra Jade', 'Martin', 'Villegas', '', 21, 'Canlubang', '01-26-1999', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Transferee', 'lyravillegas@gmail.com', '09124562134', 'BSEE', 'BEED', 'Yes', '21', '164 Mary Help Street', 'Mayapa', 'Calamba', '4027', '164 Mary Help Street', 'Mayapa', 'Calamba', '4027', 'N/A', 'Yes', 'Verified'),
(17, 'CCC-2022-T0017', '1633431748_9m.jpg', 'Arthur ', 'Duran', 'Vasquez', '', 21, 'Palo Alto', '10-29-2021', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Transferee', 'arthurvasquez@gmail.com', '09123412548', 'BSIT', 'BSCS', 'Yes', '21', 'Block 07 Lot 12 Lynville', 'Palo-Alto', 'Calamba', '4027', 'Block 07 Lot 12 Lynville', 'Palo-Alto', 'Calamba', '4027', 'N/A', 'Yes', 'Pending'),
(18, 'CCC-2022-F0018', '1633432666_9f.jpg', 'Nadia', 'Ilagan', 'Rosario', '', 19, 'Canlubang', '10-05-2002', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'nadiarosario@gmail.com', '09114571236', 'BSAIS', 'BSIT', 'Yes', '19', 'Asia 1 Manfill', 'Canlubang', 'Calamba', '4027', 'Asia 1 Manfill', 'Canlubang', 'Calamba', '4027', 'N/A', 'Yes', 'Pending'),
(19, 'CCC-2022-F0019', '1633437978_10m.jpg', 'Lance', 'Pablo', 'Bernal', '', 19, 'CMC', '10-15-2002', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'lancebernal@gmail.com', '09215487814', 'BSIT', 'BSA', 'Yes', '19', 'Block 12 Lot 4 Villa Remedios East ', 'Halang', 'Calamba', '4027', 'Block 12 Lot 4 Villa Remedios East ', 'Halang', 'Calamba', '4027', 'Working Student', 'Yes', 'Verified'),
(20, 'CCC-2022-F0020', '1633444710_10f.jpg', 'Yuki', 'Tan', 'Cortess', '', 19, 'Canlubang', '2021-11-09', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'yukicortes@gmail.com', '09412474454', 'BSA', 'BSCS', 'Yes', '19', 'Block 5 Lot 23 Lynville', 'Palo-Alto', 'Calamba', '4027', 'Block 5 Lot 23 Lynville', 'Palo-Alto', 'Calamba', '4027', 'N/A', 'No', 'Pending'),
(21, 'CCC-2021-F0021', '1633445521_11f.jpg', 'Cecil', 'Sotto', 'Bernardino', '', 19, 'Parian', '11-14-2002', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'cecilbernardino@gmail.com', '09124878412', 'BEED', 'BSEM', 'Yes', '19', 'Block 13 Lot 5 Sampaguita St', 'Parian', 'Calamba', '4027', 'Block 13 Lot 5 Sampaguita St', 'Parian', 'Calamba', '4027', 'Recipient of 4Ps', 'Yes', 'Declined'),
(22, 'CCC-2022-F0022', '1633446492_11m.jpg', 'Dexter', 'Sumali', 'Sembrano', '', 19, 'Canlubang', '09-24-2002', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'dextersembrano@gmail.com', '09451784512', 'BSCS', 'BSIT', 'Yes', '19', 'Block 19 Lot 5 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 19 Lot 5 Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', 'Yes', 'Verified'),
(23, 'CCC-2022-F0023', '1633448193_12f.jpg', 'Thea', 'Andre', 'Bautista', '', 19, 'Canlubang', '09-24-2002', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'theabautista@gmail.com', '09172431645', 'BSCS', 'BSIT', 'Yes', '19', '55 Bamboo St Asia 1 Manfill', 'Canlubang', 'Calamba', '4027', '55 Bamboo St Asia 1 Manfill', 'Canlubang', 'Calamba', '4027', 'N/A', 'Yes', 'Pending'),
(24, 'CCC-2021-T0024', '1633449463_12m.jpg', 'Paulo', 'Mendes', 'Gonzaga', '', 21, 'Barandal', '11-13-2015', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Transferee', 'paulogonzaga@gmail.com', '09124548784', 'BSCS', 'BSIT', 'Yes', '21', 'Phase 3 Bria Homes', 'Barandal', 'Calamba', '4027', 'Phase 3 Bria Homes', 'Barandal', 'Calamba', '4027', 'N/A', 'Yes', 'Verified'),
(25, 'CCC-2021-F0025', '1633450820_13m.jpg', 'Tristan', 'Flores', 'Galang', '', 19, 'Paciano', '10-21-2021', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'tristangalang@gmail.com', '09124578745', 'BSIT', 'BSCS', 'Yes', '19', 'Block 12 Lot 3 Freeville', 'Paciano Rizal', 'Calamba', '4027', 'Block 12 Lot 3 Freeville', 'Paciano Rizal', 'Calamba', '4027', 'N/A', 'Yes', 'Declined'),
(26, 'CCC-2021-F0026', '1633452138_13f.jpg', 'Carmela', 'Ruiz', 'De Castro', '', 19, 'Mayapa', '10-21-2021', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'carmeladecastro@gmail.com', '09142157888', 'BSIT', 'BSCS', 'Yes', '19', '64 Mary Help Street ', 'Mayapa', 'Calamba', '4027', '64 Mary Help Street ', 'Mayapa', 'Calamba', '4027', 'N/A', 'Yes', 'Verified'),
(27, 'CCC-2021-F0027', '1633453590_14m.jpg', 'John Arvin', 'Bersosa', 'Luna', '', 19, 'Real', '10-12-2021', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'johnarvinluna@gmail.com', '09123265458', 'BSA', 'BSEE', 'Yes', '19', 'Block 3 Bamboo St', 'Real', 'Calamba', '4027', 'Phase 3 Bamboo St', 'Real', 'Calamba', '4027', 'N/A', 'Yes', 'Declined'),
(28, 'CCC-2021-F0028', '1633454902_14f.jpeg', 'Sharlene', 'Cunanan', 'Mendez', '', 19, 'Bucal', '10-21-2021', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'sharlenemendez@gmail.com', '09124511578', 'BEED', 'BSA', 'Yes', '19', 'Blk 10 Lot 4 South Spring Villas', 'Bucal', 'Calamba', '4027', 'Blk 10 Lot 4 South Spring Villas', 'Bucal', 'Calamba', '4027', 'N/A', 'Yes', 'Verified'),
(29, 'CCC-2021-F0029', '1633455938_15f.jpg', 'Celeste', 'Ong', 'Villaa', '', 19, 'CMC', '2021-11-16', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'celestevilla@gmail.com', '09124521365', 'BSEE', 'BSES', 'Yes', '19', 'Block 3 Lot 6 Villa Remedios', 'Halang', 'Calamba', '4027', 'Block 3 Lot 6 Villa Remedios', 'Halang', 'Calamba', '4027', 'N/A', 'Yes', 'Verified'),
(30, 'CCC-2022-T0030', '1633456405_15m.jpg', 'Bryan', 'Carpio', 'Lozano', '', 21, 'Canlubang', '2022-01-13', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Transferee', 'bryanlozano@gmail.com', '09145147844', 'BSIT', 'BSCS', 'Yes', '21', 'Block 15 Lot 5 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 15 Lot 5 Majada In', 'Canlubang', 'Calamba', '4027', 'Working Student', 'Yes', 'Verified'),
(31, 'CCC-2021-F0031', '1633802618_16f.jpg', 'Abigail', 'Garaga', 'Dela Cruz', '', 20, 'Calamba', '2021-11-09', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'abigailgaraga@gmail.com', '09251486985', 'BSA', 'BSIT', 'Yes', '1', 'Imus, Cavite', 'Barangay 1', 'Calamba', '4027', 'Imus, Cavite', 'Barangay 1', 'Calamba', '4027', 'N/A', 'Yes', 'Verified'),
(32, 'CCC-2022-F0032', '1633802864_17f.jpg', 'Alex', 'Gruda', 'Dela Cruz', '', 18, 'Calamba', '2021-11-16', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'alexgruda@gmail.com', '09251486985', 'BSIT', 'BSCS', 'Yes', '10', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'N/A', 'Yes', 'Verified'),
(33, 'CCC-2021-F0033', '1633853946_elon.jpg', 'Elon', 'of', 'Musk', '', 19, 'Calamba', '10-07-2021', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'elonmusk@gmail.com', '09251486985', 'BSCS', 'BSA', 'Yes', '1', 'Calamba, Laguna', 'Barangay 3', 'Calamba', '4027', 'Calamba, Laguna', 'Barangay 3', 'Calamba', '4027', 'N/A', 'Yes', 'Verified'),
(34, 'CCC-2021-F0034', '1633939061_17m.jpg', 'Jay', 'a', 'Mansaga', '', 21, 'Cabuyao', '10-28-2021', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'jaymanzaga@gmail.com', '09251486985', 'BSIT', 'BSIT', 'Yes', '11', 'Calamba, Laguna', 'Barangay 2', 'Calamba', '4027', 'Calamba, Laguna', 'Barangay 2', 'Calamba', '4027', 'N/A', 'Yes', 'Verified'),
(35, 'CCC-2021-F0035', '1633952547_18m.jpg', 'Shaun', 'Garaga', 'Malapit', '', 18, 'Calamba', '10-13-2021', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'shaunmalapit@gmail.com', '09251486985', 'BSIT', 'BSA', 'Yes', '11', 'Imus, Cavite', 'Barangay 6', 'Calamba', '4027', 'Imus, Cavite', 'Barangay 6', 'Calamba', '4027', 'N/A', 'Yes', 'Verified'),
(36, 'CCC-2021-F0036', '1634002662_19m.jpg', 'John Paul', 'Cordova', 'Agapito', '', 21, 'Calamba', '10-22-2021', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'agapitopaul29@gmail.com', '09251486985', 'BSIT', 'BSCS', 'Yes', '21', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'N/A', 'Yes', 'Verified'),
(37, 'CCC-2021-T0037', '1634023173_16m.jpg', 'Rico', 'Estribo', 'Guinanao', '', 21, 'Calamba', '10-05-2021', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Transferee', 'guinanaorico@gmail.com', '09251486985', 'BSIT', 'BSCS', 'Yes', '11', 'Imus, Cavite', 'Barangay 3', 'Calamba', '4027', 'Imus, Cavite', 'Barangay 3', 'Calamba', '4027', 'N/A', 'Yes', 'Verified'),
(38, 'CCC-2021-F0038', '1636875355_asdqw.jpg', 'Rico', 'of', 'Guinanao', 'Sr.', 17, 'Calamba', '2021-11-09', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'guinanaorico@gmail.come', '09251486985', 'BSIT', 'BSIT', 'Yes', '1', 'Calamba, Laguna', 'Barangay 3', 'Calamba', '4027', 'Calamba, Laguna', 'Barangay 3', 'Calamba', '4027', 'N/A', 'Yes', 'Declined'),
(39, 'CCC-2021-F0039', '1636027695_33d782120fadad2a457eded2eee8e667.jpg', 'Rico', 'Estribo', 'Guinanao', '', 20, 'Calamba', '11-15-2021', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'estriborics@gmail.com', '09251486985', 'BSA', 'BEED', 'Yes', '1', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'Recipient of Student Financial Assistance\nRecipient of 4Ps', 'Yes', 'Verified'),
(40, 'CCC-2021-F0040', '1636028567_33d782120fadad2a457eded2eee8e667.jpg', 'Rico', 'Estribo', 'Guinanao', '', 18, 'Calamba', '11-10-2021', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'reguinansao@ccc.edu.ph', '09251486985', 'BSA', 'BSIT', 'Yes', '1', 'Calamba, Laguna', 'Barangay 2', 'Calamba', '4027', 'Calamba, Laguna', 'Barangay 2', 'Calamba', '4027', 'N/A', 'Yes', 'Verified'),
(41, 'CCC-2021-F0041', '1636029454_33d782120fadad2a457eded2eee8e667.jpg', 'Rico', 'Estribo', 'Guinanao', '', 17, 'Calamba', '2021-11-25', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Transferee', 'estriborics@gmail.comd', '09251486985', 'BSIT', 'BSIT', 'Yes', '1', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'Calamba, Laguna', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Declined'),
(42, 'CCC-2021-F0042', '1636030246_asdqw.jpg', 'rique', 'sddd', 'sadss', 'I', 20, 'Calamba', '11-23-2021', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'reguinanao@ccc.edu.ph', '09251486985', 'BSCS', 'BSAIS', 'Yes', '1', 'Calamba, Laguna', 'Hornalan', 'Calamba', '4027', 'Calamba, Laguna', 'Hornalan', 'Calamba', '4027', 'N/A', '', 'Verified'),
(43, 'CCC-2021-F0043', 'default_photo.png', 'Rico', 'Estribo', 'Guinanao', 'I', 20, 'Calamba', '11-17-2021', 'DFRDFD', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'estriborics@gmail.com', '09251486985', 'BSCS', 'BSA', 'No', '0', 'Calamba, Laguna', 'Mexico', 'Calamba', '4027', 'Calamba, Laguna', 'Mexico', 'Calamba', '4027', 'N/A', '', 'Declined'),
(44, 'CCC-2021-T0044', 'default_photo.png', 'Rico', 'Estribo', 'Guinanao', 'Jr.', 17, 'Calamba', '11-17-2021', 'DFRDFD', 'Male', 'Single', '', '', '', '', '', 'Transferee', 'ricoestriboguinanao@gmail.com', '09251486985', 'BSCS', 'BSCS', 'No', '0', 'Calamba, Laguna', 'Mexico', 'Calamba', '4027', 'Calamba, Laguna', 'Mexico', 'Calamba', '4027', 'Recipient of 4Ps\nWorking Student', '', 'Verified'),
(45, 'CCC-2021-T0045', 'default_photo.png', 'Rico', 'Estribo', 'Guinanao', '', 19, 'Calamba', '11-16-2021', 'Catholic', 'Male', 'Married', 'rthrh', 'dfgdfgdf', '09454456456', 'dffg', 'gfdgdf', 'Transferee', 'guinanaoricoa@gmail.com', '09319542169', 'BSA', 'BEED', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Barangay 3', 'Calamba', '4027', 'gfdgd', 'Bdgd', 'gdf', '4027', 'Person from Depressed or Conflicted-Areas\nRecipient of 4Ps', '', 'Pending'),
(46, 'CCC-2021-F0046', '1636467043_31u02g.jpg', 'Bong', 'Gas', 'Go', '', 18, 'Calamba', '2021-11-30', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'bong@gmail.com', '09251486985', 'BSIT', 'BSA', 'Yes', '1', 'Calamba, Laguna', 'hggfh', 'Calamba', '4027', 'Calamba, Laguna', 'hggfh', 'Calamba', '4027', 'Person from Depressed or Conflicted-Areas\nRecipient of 4Ps', '', 'Verified'),
(47, 'CCC-2021-T0047', '1636728289_121460481_1229836744040558_6632713653329744970_n.jpg', 'assaa', 'E', 'asdasdas', 'Jr.', 18, 'Calamba', '2021-11-08', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Transferee', 'asdasd@com.gmail', '09251486985', 'BSA', 'BSIT', 'Yes', '1', 'asdas', 'hggfh', 'Calamba', '4027', 'asdas', 'hggfh', 'Calamba', '4027', 'N/A', 'Yes', 'Verified'),
(48, 'CCC-2021-F0048', '1636887495_2x2.jpg', 'asd', 'asdas', 'asd', '', 18, 'Quezon', '2021-11-24', 'Catholic', 'Male', 'Married', 'gyj', 'Calamba, Laguna', '09677575675', 'jkjh', 'jhkj', 'Freshman', 'asd@gmail.com', '09251486985', 'BSIT', 'BSA', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'hggfh', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'hggfh', 'Calamba', '4027', 'Person from Disadvantaged Group\nPerson with Disability\nWorking Student', 'Yes', 'Verified'),
(49, 'CCC-2021-F0049', 'default_photo.png', 'qweqwe', 'qweqwe', 'qweqew', 'Sr.', 18, 'Quezon', '2021-11-03', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'qwe@asda', '09319542169', 'BSCS', 'BSA', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'hggfh', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'hggfh', 'Calamba', '4027', 'N/A', 'No', 'Pending'),
(50, 'CCC-2021-F0050', 'default_photo.png', 'adasd', 'asdad', 'qwe', '', 17, 'Cabuyao', '2021-12-01', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'guinanaorico@gmail.comq', '09319542169', 'BSCS', 'BSCS', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'hggfh', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'hggfh', 'Calamba', '4027', 'N/A', 'Yes', 'Pending'),
(51, 'CCC-2021-F0051', 'default_photo.png', 'Riqwe', 'Estribo', 'Guinanao', '', 19, 'Quezon', '2021-11-30', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'asd@da', '09319542169', 'BSCS', 'BSIT', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', 'Yes', 'Pending'),
(52, 'CCC-2021-T0052', 'default_photo.png', 'qwe', 'qwe', 'qwe', '', 21, 'Quezon', '2021-12-29', 'Catholic', 'Male', 'Married', 'qwe', 'qwe', '09677575675', 'jkjh', 'jhkj', 'Transferee', 'admin@ccc.edu.ph', '09251486985', 'BSA', 'BSCS', 'Yes', '5', 'Block 14 Lot 76 Majada In', 'hggfh', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'hggfh', 'Calamba', '4027', 'Working Student', 'Yes', 'Pending'),
(53, 'CCC-2021-F0053', 'default_photo.png', 'tryr', 'Estribo', 'Guinanao', '', 18, 'Quezon', '2021-12-15', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'guinanaorico@gmail.comasd', '09319542169', 'BSCS', 'BSIT', 'No', '0', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Canlubang', 'Calamba', '4027', 'N/A', '', 'Pending'),
(54, 'CCC-2022-F0012', '1641993956_66117874_2271812916267596_7218619506539626496_o.jpg', 'Rico', 'Estribo', 'Guinanao', '', 20, 'Quezon', '2021-12-29', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'estriborics@gmail.com', '09323456789', 'BSCS', 'BSIT', 'Yes', '1', 'Majada In', 'Canlubang', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'hggfh', 'Calamba', '4027', 'Person from Disadvantaged Group\nRecipient of 4Ps', 'Yes', 'Pending'),
(55, '2022-A-0019', 'default_photo.png', 'Guinanao', 'Rico', 'E.', '', 18, 'qwe', '2022-03-02', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'reguinanao@ccc.edu.phw', '09453453453', 'BSIT', 'BSCS', 'Yes', '1', 'asda', 'hggfh', 'Calamba', '4027', 'asda', 'hggfh', 'Calamba', '4027', 'N/A', 'No', 'Pending'),
(56, '2022-A-0020', 'default_photo.png', 'asda', 'qwe', 'qwe', '', 18, 'Quezon', '2022-02-15', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'guinanaorico@gmailasd.com', '09319542169', 'BSCS', 'BSIT', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Burol', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Burol', 'Calamba', '4027', 'Recipient of 4Ps\nWorking Student', 'Yes', 'Pending'),
(57, '2022-A-0021', 'default_photo.png', 'qwee', 'qwe', 'qwe', '', 18, 'Quezon', '2022-02-01', 'Catholic', 'Female', 'Single', '', '', '', '', '', 'Freshman', 'qweq@ads.fgh', '09121512123', 'BSCS', 'BSIT', 'Yes', '1', 'asd', 'Burol', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Burol', 'Calamba', '4027', 'N/A', '', 'Pending'),
(58, '2022-A-0022', 'default_photo.png', 'Ricodfg', 'Estribo', 'Guinanao', '', 18, 'Quezon', '2022-02-01', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'guina2naorico@gmail.comwe', '09319542169', 'BSIT', 'BSIT', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Camaligan', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Camaligan', 'Calamba', '4027', 'N/A', '', 'Pending'),
(59, '2022-A-0023', 'default_photo.png', 'hu', 'yu', 'tiu', '', 18, 'asd', '2022-01-31', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'guinanaorico@gmuioail.com', '09319542169', 'BSCS', 'BSAIS', 'Yes', '1', 'Block 14 Lot 76 Majada In', 'Bunggo', 'Calamba', '4027', 'Block 14 Lot 76 Majada In', 'Bunggo', 'Calamba', '4027', 'N/A', '', 'Pending'),
(60, '2022-A-0024', 'default_photo.png', 'qweqwe', 'qwe', 'qwe', '', 18, 'Quezon', '2022-01-31', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'qwe@sdf.dfs', '09251486985', 'BSIT', 'BSCS', 'Yes', '1', 'Calamba, Laguna', 'Camaligan', 'Calamba', '4027', 'Calamba, Laguna', 'Camaligan', 'Calamba', '4027', 'N/A', '', 'Pending'),
(61, '2022-A-0025', 'default_photo.png', 'qweadd', 'qwe23', '1231', '', 18, 'q', '2022-02-01', 'Catholic', 'Male', 'Single', '', '', '', '', '', 'Freshman', 'asd@asd.dsf', '09251486985', 'BSCS', 'BSA', 'Yes', '1', 'Imus, Cavite', 'Burol', 'Calamba', '4027', 'Imus, Cavite', 'Burol', 'Calamba', '4027', 'Recipient of 4Ps\nWorking Student', 'No', 'Pending');

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
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=426;

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
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `fam_bg`
--
ALTER TABLE `fam_bg`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `org_involvement`
--
ALTER TABLE `org_involvement`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `personal_admiration`
--
ALTER TABLE `personal_admiration`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `student_answers`
--
ALTER TABLE `student_answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT for table `student_exam_log`
--
ALTER TABLE `student_exam_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
