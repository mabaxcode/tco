-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2024 at 03:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tco`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `limit` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `limit`, `status`) VALUES
(1, 'Class Bestaris', 0, 1),
(6, 'Class Arif', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_taken`
--

CREATE TABLE `class_taken` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_taken`
--

INSERT INTO `class_taken` (`id`, `class_id`, `subject_id`, `tutor_id`) VALUES
(1, 6, 3, 31),
(2, 1, 1, 32),
(3, 6, 1, 33);

-- --------------------------------------------------------

--
-- Table structure for table `keytab`
--

CREATE TABLE `keytab` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `key_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keytab`
--

INSERT INTO `keytab` (`id`, `type`, `key_num`) VALUES
(1, 'tuition_id', 7);

-- --------------------------------------------------------

--
-- Table structure for table `profile_picture`
--

CREATE TABLE `profile_picture` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `path` varchar(200) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `original_filename` varchar(255) NOT NULL,
  `is_submit` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile_picture`
--

INSERT INTO `profile_picture` (`id`, `user_id`, `path`, `filename`, `original_filename`, `is_submit`) VALUES
(8, 28, './uploads/user-img', 'sample_passport22.png', 'sample_passport22.png', 1),
(9, 29, './uploads/user-img', 'da1e977e558e663781940d7bac885d3615.jpg', 'da1e977e558e663781940d7bac885d3615.jpg', 1),
(10, 30, './uploads/user-img', 'sample_passport23.png', 'sample_passport23.png', 1),
(11, 31, './uploads/user-img', '7f22f1a331368cab4565.png', '7f22f1a331368cab4565.png', 1),
(12, 32, './uploads/user-img', '74216ed5aee0cb01d208.png', '74216ed5aee0cb01d208.png', 1),
(13, 33, './uploads/user-img', '38250a03572df8fe7351.jpg', '38250a03572df8fe7351.jpg', 1),
(14, 34, './uploads/user-img', 'img-png8.png', 'img-png8.png', 1),
(15, 34, './uploads/user-img', 'da1e977e558e663781940d7bac885d3616.jpg', 'da1e977e558e663781940d7bac885d3616.jpg', 1),
(16, 34, './uploads/user-img', 'da1e977e558e663781940d7bac885d3617.jpg', 'da1e977e558e663781940d7bac885d3617.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_subject`
--

CREATE TABLE `ref_subject` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `descs` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ref_subject`
--

INSERT INTO `ref_subject` (`id`, `code`, `descs`, `price`, `active`) VALUES
(1, 1, 'Malay Language', 10, 1),
(2, 2, 'English Language', 10, 1),
(3, 3, 'Mathematics', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_class`
--

CREATE TABLE `student_class` (
  `id` int(11) NOT NULL,
  `tuition_id` varchar(30) NOT NULL,
  `student_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_class`
--

INSERT INTO `student_class` (`id`, `tuition_id`, `student_id`, `tutor_id`, `subject_id`) VALUES
(1, 'TCO-6', 34, 33, 1),
(2, 'TCO-6', 34, 31, 3),
(3, 'TCO-5', 30, 33, 1),
(4, 'TCO-5', 30, 31, 3),
(5, 'TCO-5', 30, 32, 2),
(6, 'TCO-6', 34, 32, 2);

-- --------------------------------------------------------

--
-- Table structure for table `student_document`
--

CREATE TABLE `student_document` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `tuition_id` varchar(50) NOT NULL,
  `module` varchar(100) NOT NULL,
  `path` varchar(200) NOT NULL,
  `create_dt` datetime NOT NULL,
  `filename` varchar(300) NOT NULL,
  `original_filename` varchar(300) NOT NULL,
  `is_submit` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_document`
--

INSERT INTO `student_document` (`id`, `student_id`, `tuition_id`, `module`, `path`, `create_dt`, `filename`, `original_filename`, `is_submit`) VALUES
(11, 28, '', 'NRIC', './uploads/student-document', '2024-10-07 04:34:45', 'WORK INSTRUCTIONS.pdf', 'WORK INSTRUCTIONS.pdf', 0),
(12, 29, '', 'NRIC', './uploads/student-document', '2024-10-07 04:51:02', '1ac405d11bb1c1597dfe', 'riskreport.pdf', 0),
(13, 30, '', 'NRIC', './uploads/student-document', '2024-10-07 04:56:51', 'b25576d12bf2cca5d772.pdf', 'riskreport.pdf', 0),
(41, 30, 'TCO-5', 'PAY_RECEIPT', './uploads/receipt', '2024-10-09 05:49:53', '5d9925edbc86da795a1a.pdf', 'WORK INSTRUCTIONS.pdf', 0),
(42, 34, 'TCO-6', 'PAY_RECEIPT', './uploads/receipt', '2024-10-16 04:12:12', '63de51b34ac7812a862d.pdf', 'WORK INSTRUCTIONS.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_information`
--

CREATE TABLE `student_information` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `approved` tinyint(4) NOT NULL,
  `form` int(11) NOT NULL,
  `guardian_name⁠` varchar(100) NOT NULL,
  `guardian_phone` varchar(20) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_address` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_information`
--

INSERT INTO `student_information` (`id`, `student_id`, `name`, `phone_no`, `email`, `address`, `approved`, `form`, `guardian_name⁠`, `guardian_phone`, `school_name`, `school_address`) VALUES
(7, 28, 'anzari', '019191919', 'anzari21213@gmail.com', 'belukar', 1, 0, '', '', '', ''),
(8, 29, 'safiyah', '0164715757', 'safiyah@gmail.com', 'Pasir Mas', 1, 0, '', '', '', ''),
(9, 30, 'mohamad ali bin mohamad omar', '0164716263', 'ali.mohd1998@gmail.com', 'No 8, Jalan Salak Idaman, Taman Salak Idaman, 43600 Sepang , Selangor', 1, 3, 'hirki', '019191', 'SEKOLAH MENENGAH KEBANGSAAN BUKIT CHANGGANG', 'smcb'),
(10, 34, 'hawa', '213123', 'hawa@gmail.com', 'asd', 1, 1, 'asd', '', 'smkbc', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `student_timetable`
--

CREATE TABLE `student_timetable` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `class_dt` date NOT NULL,
  `class_time` varchar(50) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tuition_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_timetable`
--

INSERT INTO `student_timetable` (`id`, `student_id`, `tutor_id`, `class_id`, `class_dt`, `class_time`, `subject_id`, `status`, `tuition_id`) VALUES
(169, 30, 33, 6, '2024-10-18', '10:30 AM', 1, 1, 'TCO-5'),
(170, 30, 33, 6, '2024-10-19', '10:30 AM', 1, 1, 'TCO-5'),
(171, 30, 33, 6, '2024-10-20', '9:30 PM', 1, 1, 'TCO-5'),
(172, 30, 33, 6, '2024-10-25', '', 1, 1, 'TCO-5'),
(173, 30, 33, 6, '2024-10-26', '', 1, 1, 'TCO-5'),
(174, 30, 33, 6, '2024-10-27', '', 1, 1, 'TCO-5'),
(175, 30, 33, 6, '2024-11-01', '', 1, 1, 'TCO-5'),
(176, 30, 33, 6, '2024-11-02', '', 1, 1, 'TCO-5'),
(177, 30, 33, 6, '2024-11-03', '', 1, 1, 'TCO-5'),
(178, 30, 33, 6, '2024-11-08', '', 1, 1, 'TCO-5'),
(179, 30, 33, 6, '2024-11-09', '', 1, 1, 'TCO-5'),
(180, 30, 33, 6, '2024-11-10', '', 1, 1, 'TCO-5'),
(181, 30, 31, 6, '2024-10-18', '', 3, 1, 'TCO-5'),
(182, 30, 31, 6, '2024-10-19', '', 3, 1, 'TCO-5'),
(183, 30, 31, 6, '2024-10-20', '', 3, 1, 'TCO-5'),
(184, 30, 31, 6, '2024-10-25', '', 3, 1, 'TCO-5'),
(185, 30, 31, 6, '2024-10-26', '', 3, 1, 'TCO-5'),
(186, 30, 31, 6, '2024-10-27', '', 3, 1, 'TCO-5'),
(187, 30, 31, 6, '2024-11-01', '', 3, 1, 'TCO-5'),
(188, 30, 31, 6, '2024-11-02', '', 3, 1, 'TCO-5'),
(189, 30, 31, 6, '2024-11-03', '', 3, 1, 'TCO-5'),
(190, 30, 31, 6, '2024-11-08', '', 3, 1, 'TCO-5'),
(191, 30, 31, 6, '2024-11-09', '', 3, 1, 'TCO-5'),
(192, 30, 31, 6, '2024-11-10', '', 3, 1, 'TCO-5'),
(193, 30, 32, 1, '2024-10-18', '', 2, 1, 'TCO-5'),
(194, 30, 32, 1, '2024-10-19', '', 2, 1, 'TCO-5'),
(195, 30, 32, 1, '2024-10-20', '', 2, 1, 'TCO-5'),
(196, 30, 32, 1, '2024-10-25', '', 2, 1, 'TCO-5'),
(197, 30, 32, 1, '2024-10-26', '', 2, 1, 'TCO-5'),
(198, 30, 32, 1, '2024-10-27', '', 2, 1, 'TCO-5'),
(199, 30, 32, 1, '2024-11-01', '', 2, 1, 'TCO-5'),
(200, 30, 32, 1, '2024-11-02', '', 2, 1, 'TCO-5'),
(201, 30, 32, 1, '2024-11-03', '', 2, 1, 'TCO-5'),
(202, 30, 32, 1, '2024-11-08', '', 2, 1, 'TCO-5'),
(203, 30, 32, 1, '2024-11-09', '', 2, 1, 'TCO-5'),
(204, 30, 32, 1, '2024-11-10', '', 2, 1, 'TCO-5'),
(205, 34, 33, 6, '2024-10-18', '9:30 AM', 1, 1, 'TCO-6'),
(206, 34, 33, 6, '2024-10-19', '11:30 AM', 1, 1, 'TCO-6'),
(207, 34, 33, 6, '2024-10-20', '9:30 PM', 1, 1, 'TCO-6'),
(208, 34, 33, 6, '2024-10-25', '11:30 AM', 1, 1, 'TCO-6'),
(209, 34, 33, 6, '2024-10-26', '10:30 AM', 1, 1, 'TCO-6'),
(210, 34, 33, 6, '2024-10-27', '8:30 PM', 1, 1, 'TCO-6'),
(211, 34, 33, 6, '2024-11-01', '10:30 AM', 1, 1, 'TCO-6'),
(212, 34, 33, 6, '2024-11-02', '10:30 AM', 1, 1, 'TCO-6'),
(213, 34, 33, 6, '2024-11-03', '10:30 PM', 1, 1, 'TCO-6'),
(214, 34, 33, 6, '2024-11-08', '10:30 AM', 1, 1, 'TCO-6'),
(215, 34, 33, 6, '2024-11-09', '10:30 AM', 1, 1, 'TCO-6'),
(216, 34, 33, 6, '2024-11-10', '9:30 PM', 1, 1, 'TCO-6'),
(217, 34, 32, 1, '2024-10-18', '', 2, 1, 'TCO-6'),
(218, 34, 32, 1, '2024-10-19', '', 2, 1, 'TCO-6'),
(219, 34, 32, 1, '2024-10-20', '', 2, 1, 'TCO-6'),
(220, 34, 32, 1, '2024-10-25', '', 2, 1, 'TCO-6'),
(221, 34, 32, 1, '2024-10-26', '', 2, 1, 'TCO-6'),
(222, 34, 32, 1, '2024-10-27', '', 2, 1, 'TCO-6'),
(223, 34, 32, 1, '2024-11-01', '', 2, 1, 'TCO-6'),
(224, 34, 32, 1, '2024-11-02', '', 2, 1, 'TCO-6'),
(225, 34, 32, 1, '2024-11-03', '', 2, 1, 'TCO-6'),
(226, 34, 32, 1, '2024-11-08', '', 2, 1, 'TCO-6'),
(227, 34, 32, 1, '2024-11-09', '', 2, 1, 'TCO-6'),
(228, 34, 32, 1, '2024-11-10', '', 2, 1, 'TCO-6');

-- --------------------------------------------------------

--
-- Table structure for table `tuition_application`
--

CREATE TABLE `tuition_application` (
  `id` int(11) NOT NULL,
  `tuition_id` varchar(10) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subjects` varchar(155) NOT NULL,
  `total` double NOT NULL,
  `paid` int(11) NOT NULL,
  `stage` varchar(50) NOT NULL,
  `verified_paid` int(11) NOT NULL,
  `internal_stage` varchar(50) NOT NULL,
  `approved_dt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tuition_application`
--

INSERT INTO `tuition_application` (`id`, `tuition_id`, `student_id`, `subjects`, `total`, `paid`, `stage`, `verified_paid`, `internal_stage`, `approved_dt`) VALUES
(11, 'TCO-5', 30, '1|2|3', 30, 1, 'PROCESSING', 1, 'CLASS', '2024-10-16'),
(12, 'TCO-6', 34, '1|2|3', 30, 1, 'PROCESSING', 1, 'CLASS', '2024-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` varchar(3) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(400) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `assign_class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`id`, `name`, `age`, `phone_no`, `email`, `address`, `tutor_id`, `status`, `subject`, `assign_class`) VALUES
(2, 'Ibrahim', '12', '21', 'ibrahim@gmail.com', 'asd', 31, 2, 3, 6),
(3, 'zainuri', '50', '0191919', 'zainuri@gmail.com', 'Kelantan', 32, 2, 2, 1),
(4, 'mastura', '40', '0198276543', 'mastura@gmail.com', 'No 1, Jalan 3, Kota Bharu Kelantan', 33, 2, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tutor_document`
--

CREATE TABLE `tutor_document` (
  `id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `module` varchar(100) NOT NULL,
  `path` varchar(200) NOT NULL,
  `create_dt` datetime NOT NULL,
  `filename` varchar(300) NOT NULL,
  `original_filename` varchar(300) NOT NULL,
  `is_submit` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutor_document`
--

INSERT INTO `tutor_document` (`id`, `tutor_id`, `module`, `path`, `create_dt`, `filename`, `original_filename`, `is_submit`) VALUES
(2, 32, 'RESUME', './uploads/tutor-document', '2024-10-10 09:13:02', '173b3f8d8cbd95f687af.pdf', 'WORK INSTRUCTIONS.pdf', 0),
(3, 33, 'RESUME', './uploads/tutor-document', '2024-10-10 10:35:46', '4e67015b2350858579f8.pdf', 'test.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` tinyint(4) NOT NULL,
  `complete_register` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `user_type`, `complete_register`) VALUES
(24, 'Admin', 'admin', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 4, 0),
(26, 'njnj', 'njnj', 'jnjn@gmaill.com', '7815696ecbf1c96e6894b779456d330e', 0, 0),
(27, 'anzari', 'anzari', 'anzari@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 0),
(28, 'anzari', 'pagiiniindah', 'anzari21213@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 2),
(29, 'safiyah', 'safiyah', 'safiyah@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 2),
(30, 'ali', 'ali', 'ali@gmail.com', '1a1dc91c907325c69271ddf0c944bc72', 2, 2),
(31, 'Ibrahim', 'ibrahim', 'ibrahim@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 2),
(32, 'zainuri', 'zainuri', 'zainuri@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 2),
(33, 'mastura', 'mastura', 'mastura@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 2),
(34, 'hawa', 'hawa', 'hawa@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_taken`
--
ALTER TABLE `class_taken`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keytab`
--
ALTER TABLE `keytab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_picture`
--
ALTER TABLE `profile_picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_subject`
--
ALTER TABLE `ref_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_class`
--
ALTER TABLE `student_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_document`
--
ALTER TABLE `student_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_information`
--
ALTER TABLE `student_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_timetable`
--
ALTER TABLE `student_timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuition_application`
--
ALTER TABLE `tuition_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutor_document`
--
ALTER TABLE `tutor_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `class_taken`
--
ALTER TABLE `class_taken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keytab`
--
ALTER TABLE `keytab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile_picture`
--
ALTER TABLE `profile_picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ref_subject`
--
ALTER TABLE `ref_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_class`
--
ALTER TABLE `student_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_document`
--
ALTER TABLE `student_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `student_information`
--
ALTER TABLE `student_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_timetable`
--
ALTER TABLE `student_timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `tuition_application`
--
ALTER TABLE `tuition_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tutor_document`
--
ALTER TABLE `tutor_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
