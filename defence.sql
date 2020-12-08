-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2020 at 05:55 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `defence`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `q_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `is_ans` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Army'),
(2, 'Navy'),
(3, 'Air-Force');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `name`, `category_id`) VALUES
(6, 'ISSB', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_data`
--

CREATE TABLE `exam_data` (
  `id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `given_ans_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `exam_logs`
--

CREATE TABLE `exam_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `set_id` int(11) DEFAULT NULL,
  `result` varchar(50) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `permission`) VALUES
(1, 'Super Administrator', 'a:29:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:9:\"createWeb\";i:5;s:9:\"updateWeb\";i:6;s:7:\"viewWeb\";i:7;s:9:\"deleteWeb\";i:8;s:11:\"createGroup\";i:9;s:11:\"updateGroup\";i:10;s:9:\"viewGroup\";i:11;s:11:\"deleteGroup\";i:12;s:15:\"createQuestions\";i:13;s:15:\"updateQuestions\";i:14;s:13:\"viewQuestions\";i:15;s:15:\"deleteQuestions\";i:16;s:14:\"createStudents\";i:17;s:14:\"updateStudents\";i:18;s:12:\"viewStudents\";i:19;s:14:\"deleteStudents\";i:20;s:10:\"createExam\";i:21;s:10:\"updateExam\";i:22;s:8:\"viewExam\";i:23;s:10:\"deleteExam\";i:24;s:13:\"createContact\";i:25;s:13:\"updateContact\";i:26;s:11:\"viewContact\";i:27;s:13:\"deleteContact\";i:28;s:11:\"viewProfile\";}'),
(13, 'Student', 'a:4:{i:0;s:10:\"createExam\";i:1;s:8:\"viewExam\";i:2;s:11:\"viewContact\";i:3;s:11:\"viewProfile\";}'),
(14, 'Murad Admin', 'a:23:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:9:\"createWeb\";i:5;s:9:\"updateWeb\";i:6;s:7:\"viewWeb\";i:7;s:9:\"deleteWeb\";i:8;s:15:\"createQuestions\";i:9;s:15:\"updateQuestions\";i:10;s:13:\"viewQuestions\";i:11;s:15:\"deleteQuestions\";i:12;s:14:\"createStudents\";i:13;s:14:\"updateStudents\";i:14;s:12:\"viewStudents\";i:15;s:14:\"deleteStudents\";i:16;s:10:\"createExam\";i:17;s:8:\"viewExam\";i:18;s:13:\"createContact\";i:19;s:13:\"updateContact\";i:20;s:11:\"viewContact\";i:21;s:13:\"deleteContact\";i:22;s:11:\"viewProfile\";}');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`) VALUES
(5, 'Fucking Notice Two'),
(6, 'Fucking Notice Three');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `set_id` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `mac` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sets`
--

CREATE TABLE `sets` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `available` int(11) DEFAULT NULL,
  `timelimit` int(11) DEFAULT NULL,
  `is_demo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `note`, `img`) VALUES
(24, ' Join Bangladesh Army', 'The Bangladesh Army (BA, Bengali: বাংলাদেশ সেনাবাহিনী, Bangladesh Senabahini) is the land warfare branch and the largest of the three defence service of the Bangladesh Armed Forces.', 'IMG_1579300369_9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `form_no` varchar(255) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `ssc_ins` text DEFAULT NULL,
  `ssc_group` varchar(50) DEFAULT NULL,
  `ssc_result` varchar(50) DEFAULT NULL,
  `ssc_year` varchar(11) DEFAULT NULL,
  `hsc_ins` text DEFAULT NULL,
  `hsc_group` varchar(50) DEFAULT NULL,
  `hsc_result` varchar(11) DEFAULT NULL,
  `hsc_year` varchar(11) DEFAULT NULL,
  `uni_name` text DEFAULT NULL,
  `uni_subject` text DEFAULT NULL,
  `uni_result` varchar(11) DEFAULT NULL,
  `uni_year` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `blood_group` varchar(11) DEFAULT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `f_mobile` varchar(50) DEFAULT NULL,
  `f_occu` varchar(255) DEFAULT NULL,
  `m_name` varchar(255) DEFAULT NULL,
  `m_mobile` varchar(50) DEFAULT NULL,
  `m_occu` varchar(50) DEFAULT NULL,
  `present` text DEFAULT NULL,
  `permanent` text DEFAULT NULL,
  `for_force` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `programme` varchar(255) DEFAULT NULL,
  `course_no` varchar(50) DEFAULT NULL,
  `exam_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mac` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `added_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `mac`, `is_active`, `added_at`) VALUES
(1, 'Joy Das', 'developer@developer.com', '01831586368', 'developer', '40-B0-34-E2-96-4D', 1, '2020-01-17 13:12:20'),
(7, 'Murad Mahmud', 'murad.pu.dc@gmail.com', '01675607126', 'password', '40-B0-34-E2-96-4D', 1, '2020-02-12 15:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(19, 7, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_data`
--
ALTER TABLE `exam_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_logs`
--
ALTER TABLE `exam_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sets`
--
ALTER TABLE `sets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_data`
--
ALTER TABLE `exam_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;

--
-- AUTO_INCREMENT for table `exam_logs`
--
ALTER TABLE `exam_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sets`
--
ALTER TABLE `sets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
