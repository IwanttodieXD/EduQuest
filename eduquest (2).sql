-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2025 at 05:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eduquest`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_acts`
--

CREATE TABLE `tbl_acts` (
  `act_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL,
  `file_size` bigint(20) NOT NULL,
  `posted_at` datetime NOT NULL DEFAULT current_timestamp(),
  `score` int(3) NOT NULL,
  `deadline` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_acts`
--

INSERT INTO `tbl_acts` (`act_id`, `class_id`, `user_id`, `title`, `description`, `file_name`, `file_path`, `file_type`, `file_size`, `posted_at`, `score`, `deadline`) VALUES
(1, 2, 2, 'asdasd', 'asdasdasda', 'rufus-4.7.exe', 'uploads/6814c1c5d81d5_rufus-4.7.exe', 'application/x-dosexec', 1687344, '2025-05-02 20:59:49', 123, '2025-05-09 09:00:00'),
(2, 11, 12, 'title ng activty', 'aslk;dl;asdk;al', 'rickboi.pdf', 'uploads/68179d330b214_rickboi.pdf', 'application/pdf', 31227, '2025-05-05 01:00:35', 0, '2025-05-17 01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcements`
--

CREATE TABLE `tbl_announcements` (
  `ann_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL,
  `file_size` bigint(20) NOT NULL,
  `posted_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_announcements`
--

INSERT INTO `tbl_announcements` (`ann_id`, `class_id`, `user_id`, `title`, `description`, `file_name`, `file_path`, `file_type`, `file_size`, `posted_at`) VALUES
(1, 2, 2, 'Tite', 'iwanandie', '', '', '', 0, '2025-04-30 02:43:14'),
(2, 2, 2, 'Tite', 'iwanandie', '', '', '', 0, '2025-04-30 02:45:46'),
(3, 2, 2, 'asdas', 'asdasdasd', 'mr_reservations.sql', 'uploads/681128ae1c927_mr_reservations.sql', 'text/plain', 1968, '2025-04-30 03:29:50'),
(4, 3, 2, 'sad', 'asd', 'buongDB.sql.sql', 'uploads/6811468069638_buongDB.sql.sql', 'text/plain', 13696, '2025-04-30 05:37:04'),
(5, 2, 2, 'asd', 'asd', '', '', '', 0, '2025-05-02 21:00:31'),
(6, 11, 12, 'Announcement', 'Desc', 'eduquest (1).sql', 'uploads/68177161dd26e_eduquest (1).sql', 'text/plain', 6626, '2025-05-04 21:53:37'),
(7, 11, 12, 'Announcement', 'Desc', 'eduquest (1).sql', 'uploads/681771cbe827b_eduquest (1).sql', 'text/plain', 6626, '2025-05-04 21:55:23'),
(8, 11, 12, 'Announcement', 'Desc', 'eduquest (1).sql', 'uploads/681771eb74235_eduquest (1).sql', 'text/plain', 6626, '2025-05-04 21:55:55'),
(9, 11, 12, 'Announcement', 'Desc', 'eduquest (1).sql', 'uploads/681774b2a51c0_eduquest (1).sql', 'text/plain', 6626, '2025-05-04 22:07:46'),
(10, 11, 12, 'asd', 'asd', 'request_logs.sql', 'uploads/6817764683857_request_logs.sql', 'text/plain', 2830, '2025-05-04 22:14:30'),
(11, 11, 12, 'TITKE IM A SHEPSHIFTA', 'I am the bone of my sword\r\nsteel is my body and fire is my blood\r\ni have created over a thousand blades\r\nuknown to death nor known to life\r\nhave withstood pain to create many weapons\r\nyet these hands will never be able to hold any of them\r\nso as i pray\r\nUNLIMITED BLADE WORKS\r\n(trance music intensifies)', 'seiginomikata.png', 'uploads/681792eb3066f_seiginomikata.png', 'image/webp', 180858, '2025-05-05 00:16:43'),
(12, 11, 12, 'pdf test', 'pls read the following:\r\n1. \r\n2.\r\n3.', 'rickboi.pdf', 'uploads/6817945a4967b_rickboi.pdf', 'application/pdf', 31227, '2025-05-05 00:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignments`
--

CREATE TABLE `tbl_assignments` (
  `ass_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL,
  `file_size` bigint(20) NOT NULL,
  `posted_at` datetime NOT NULL DEFAULT current_timestamp(),
  `score` int(3) NOT NULL,
  `deadline` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_assignments`
--

INSERT INTO `tbl_assignments` (`ass_id`, `class_id`, `user_id`, `title`, `description`, `file_name`, `file_path`, `file_type`, `file_size`, `posted_at`, `score`, `deadline`) VALUES
(1, 2, 2, 'asdasd', 'asdasdas', '', '', '', 0, '2025-04-30 03:59:36', 100, '2025-04-30 03:59:00'),
(2, 2, 2, 'bsdfhgbsdf', 'jkashdkjashdkjashd', 'library (2).sql', 'uploads/68112fce4e40c_library (2).sql', 'text/plain', 4887, '2025-04-30 04:00:14', 0, '2025-04-30 04:00:00'),
(3, 3, 2, 'jkfjknsdffsdjkn', 'sdfklnklnsdfklnsdf', 'request_logs.sql', 'uploads/6811477ad0864_request_logs.sql', 'text/plain', 2830, '2025-04-30 05:41:14', 234, '2025-04-30 05:41:00'),
(5, 11, 12, 'title ng assignment', 'malupitang description', 'rickboi.pdf', 'uploads/681797583f0f5_rickboi.pdf', 'application/pdf', 31227, '2025-05-05 00:35:36', 100, '2025-05-10 11:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classes`
--

CREATE TABLE `tbl_classes` (
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `class_name` varchar(20) NOT NULL,
  `section` varchar(50) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_classes`
--

INSERT INTO `tbl_classes` (`class_id`, `user_id`, `class_name`, `section`, `description`) VALUES
(1, 2, 'Class', 'Sir Ronnie', 'Devils Advocate\r\nMatalino Matalinaw'),
(2, 2, 'Matasatitg', 'Ron', 'Magusap tayo\r\nhinde ikaw ang gusto ko'),
(3, 2, '. . .m,m.,,m', 'sir sir', 'dfgdfgfgd'),
(4, 2, 'Meth', 'Heisenberg', 'We need to cook we r so cooked'),
(5, 2, 'Meth', 'SBIT-TITE', 'asdjasl;djasd'),
(6, 2, 'asd', 'asd', 'asd'),
(7, 2, 'fasf', 'asfasf', 'asfasf'),
(8, 2, 'asfasf', 'asfasf', 'asfasf'),
(9, 2, 'asf', 'asf', 'asf'),
(11, 12, 'IM101', 'SBIT-2L', 'Always be Matalino, Matalinaw MATA SA TITEG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enrollment`
--

CREATE TABLE `tbl_enrollment` (
  `enrollment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `enrolled_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lessons`
--

CREATE TABLE `tbl_lessons` (
  `lsn_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL,
  `file_size` bigint(20) NOT NULL,
  `posted_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lessons`
--

INSERT INTO `tbl_lessons` (`lsn_id`, `class_id`, `user_id`, `title`, `description`, `file_name`, `file_path`, `file_type`, `file_size`, `posted_at`) VALUES
(1, 11, 12, 'Lesson sa life', 'to confuse the enemy, one must confuse thy self\r\n\r\n- sun tzu (art of confusion)', 'rickboi.pdf', 'uploads/6817a1ab90449_rickboi.pdf', 'application/pdf', 31227, '2025-05-05 01:19:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `st_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mulah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`st_id`, `user_id`, `name`, `mulah`) VALUES
(1, 1, 'sad', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teachers`
--

CREATE TABLE `tbl_teachers` (
  `tc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mulah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_teachers`
--

INSERT INTO `tbl_teachers` (`tc_id`, `user_id`, `name`, `mulah`) VALUES
(1, 2, 'andrew', 999999),
(4, 12, 'Ronnie Gatdula', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_topics`
--

CREATE TABLE `tbl_topics` (
  `topic_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('announcement','assignment','activity','lesson') NOT NULL,
  `title` varchar(50) NOT NULL,
  `posted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_topics`
--

INSERT INTO `tbl_topics` (`topic_id`, `content_id`, `class_id`, `user_id`, `type`, `title`, `posted_at`) VALUES
(4, 1, 2, 2, 'announcement', '', '0000-00-00 00:00:00'),
(5, 1, 2, 2, 'announcement', '', '0000-00-00 00:00:00'),
(7, 9, 11, 12, 'announcement', 'Announcement', '2025-05-04 16:07:46'),
(8, 10, 11, 12, 'announcement', 'asd', '2025-05-04 16:14:30'),
(9, 11, 11, 12, 'announcement', 'TITKE IM A SHEPSHIFTA', '2025-05-04 18:16:43'),
(10, 12, 11, 12, 'announcement', 'pdf test', '2025-05-04 18:22:50'),
(11, 5, 11, 12, 'assignment', 'title ng assignment', '2025-05-04 18:35:36'),
(12, 2, 11, 12, 'activity', 'title ng activty', '2025-05-04 19:00:35'),
(13, 1, 11, 12, 'lesson', 'Lesson sa life', '2025-05-04 19:19:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `Name`, `Email`, `Password`, `user_type`) VALUES
(1, 'sad', 'asd@gmail.com', '$2y$10$P.oQLPEAXgaGHUoTzeSSXei/yDj406LQHZG2pLEzqnsp/OBQwS4ju', 'student'),
(2, 'andrew', 'asdd@gmail.com', '$2y$10$2hfmLBNxDNzt3Mp/96oxYOpPdJL3I2rM6gMmARXRfCrcQkFbLtA7S', 'teacher'),
(6, 'admin', 'admin@gmail.com', '$2y$10$yf3Y61VdNCkg87o7mXP4OOZXqVMWqva9VdxOnl/ilj/tzZGUeGTjC', 'admin'),
(12, 'Ronnie Gatdula', 'ron@qcu.ph.edu', '$2y$10$v5XeMQhRNgut3KdPaVE3Ie42zYG3gt.PzQrmN7W3libtL5MkGo/P6', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_acts`
--
ALTER TABLE `tbl_acts`
  ADD PRIMARY KEY (`act_id`),
  ADD KEY `class_act` (`class_id`),
  ADD KEY `user_act` (`user_id`);

--
-- Indexes for table `tbl_announcements`
--
ALTER TABLE `tbl_announcements`
  ADD PRIMARY KEY (`ann_id`),
  ADD KEY `class_ann` (`class_id`),
  ADD KEY `user_ann` (`user_id`);

--
-- Indexes for table `tbl_assignments`
--
ALTER TABLE `tbl_assignments`
  ADD PRIMARY KEY (`ass_id`),
  ADD KEY `class_ass` (`class_id`),
  ADD KEY `user_ass` (`user_id`);

--
-- Indexes for table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `user_classes` (`user_id`);

--
-- Indexes for table `tbl_enrollment`
--
ALTER TABLE `tbl_enrollment`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `class_enroll` (`class_id`),
  ADD KEY `st_enroll` (`student_id`);

--
-- Indexes for table `tbl_lessons`
--
ALTER TABLE `tbl_lessons`
  ADD PRIMARY KEY (`lsn_id`),
  ADD KEY `class_ann` (`class_id`),
  ADD KEY `user_ann` (`user_id`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`st_id`),
  ADD KEY `user_st` (`user_id`);

--
-- Indexes for table `tbl_teachers`
--
ALTER TABLE `tbl_teachers`
  ADD PRIMARY KEY (`tc_id`),
  ADD KEY `user_tc` (`user_id`);

--
-- Indexes for table `tbl_topics`
--
ALTER TABLE `tbl_topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `class_topics` (`class_id`),
  ADD KEY `user_topics` (`user_id`),
  ADD KEY `content_act` (`content_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_acts`
--
ALTER TABLE `tbl_acts`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_announcements`
--
ALTER TABLE `tbl_announcements`
  MODIFY `ann_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_assignments`
--
ALTER TABLE `tbl_assignments`
  MODIFY `ass_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_enrollment`
--
ALTER TABLE `tbl_enrollment`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_lessons`
--
ALTER TABLE `tbl_lessons`
  MODIFY `lsn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_teachers`
--
ALTER TABLE `tbl_teachers`
  MODIFY `tc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_topics`
--
ALTER TABLE `tbl_topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_acts`
--
ALTER TABLE `tbl_acts`
  ADD CONSTRAINT `class_act` FOREIGN KEY (`class_id`) REFERENCES `tbl_classes` (`class_id`),
  ADD CONSTRAINT `user_act` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_announcements`
--
ALTER TABLE `tbl_announcements`
  ADD CONSTRAINT `class_ann` FOREIGN KEY (`class_id`) REFERENCES `tbl_classes` (`class_id`),
  ADD CONSTRAINT `user_ann` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_assignments`
--
ALTER TABLE `tbl_assignments`
  ADD CONSTRAINT `class_ass` FOREIGN KEY (`class_id`) REFERENCES `tbl_classes` (`class_id`),
  ADD CONSTRAINT `user_ass` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  ADD CONSTRAINT `user_classes` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_enrollment`
--
ALTER TABLE `tbl_enrollment`
  ADD CONSTRAINT `class_enroll` FOREIGN KEY (`class_id`) REFERENCES `tbl_classes` (`class_id`),
  ADD CONSTRAINT `st_enroll` FOREIGN KEY (`student_id`) REFERENCES `tbl_students` (`st_id`);

--
-- Constraints for table `tbl_lessons`
--
ALTER TABLE `tbl_lessons`
  ADD CONSTRAINT `class_lesson` FOREIGN KEY (`class_id`) REFERENCES `tbl_classes` (`class_id`),
  ADD CONSTRAINT `user_lesson` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD CONSTRAINT `user_st` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_teachers`
--
ALTER TABLE `tbl_teachers`
  ADD CONSTRAINT `user_tc` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_topics`
--
ALTER TABLE `tbl_topics`
  ADD CONSTRAINT `class_topics` FOREIGN KEY (`class_id`) REFERENCES `tbl_classes` (`class_id`),
  ADD CONSTRAINT `user_topics` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
