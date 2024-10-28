-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 28, 2024 at 10:38 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `limit`, `status`) VALUES
(1, 'Kelas Ibnu Sina', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_taken`
--

CREATE TABLE `class_taken` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `remark` text NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `attachment` varchar(200) NOT NULL,
  `form` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`id`, `name`, `remark`, `class_id`, `subject_id`, `attachment`, `form`, `tutor_id`) VALUES
(1, 'Test hoemwerk', '', 1, 4, '0da310750d868ca3949c7ac096e068', 1, 43),
(2, 'baru', 'download and send your answer to me on 4:00PM', 1, 4, '887cbdc098119f094554957c354cb8', 1, 43);

-- --------------------------------------------------------

--
-- Table structure for table `homework_document`
--

CREATE TABLE `homework_document` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `path` varchar(300) NOT NULL,
  `create_dt` datetime NOT NULL,
  `filename` varchar(200) NOT NULL,
  `original_filename` varchar(200) NOT NULL,
  `form` int(11) NOT NULL,
  `upload_by` int(11) NOT NULL,
  `temp_key` varchar(200) NOT NULL,
  `is_submit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homework_document`
--

INSERT INTO `homework_document` (`id`, `class_id`, `subject_id`, `path`, `create_dt`, `filename`, `original_filename`, `form`, `upload_by`, `temp_key`, `is_submit`) VALUES
(1, 1, 4, './uploads/student-document', '2024-10-25 16:16:17', '145f7d7c1618336ab76c.pdf', 'Annual Report Cover.pdf', 1, 43, '0da310750d868ca3949c7ac096e068', 1),
(2, 1, 4, './uploads/student-document', '2024-10-27 04:08:39', 'bba920383529ebb31896.pdf', 'Annual Report Cover.pdf', 1, 43, '887cbdc098119f094554957c354cb8', 1);

-- --------------------------------------------------------

--
-- Table structure for table `homework_status`
--

CREATE TABLE `homework_status` (
  `id` int(11) NOT NULL,
  `homework_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `path` varchar(300) NOT NULL,
  `create_dt` datetime NOT NULL,
  `filename` varchar(200) NOT NULL,
  `original_filename` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homework_status`
--

INSERT INTO `homework_status` (`id`, `homework_id`, `student_id`, `status`, `path`, `create_dt`, `filename`, `original_filename`) VALUES
(3, 1, 35, 1, './uploads/student-document', '2024-10-27 04:05:07', 'a9f4d3c01f93fedff9cb.pdf', 'sample.pdf'),
(5, 1, 36, 1, './uploads/student-document', '2024-10-27 04:06:15', '2df7fa6392cf9cbc0ce6.pdf', 'Annual Report Cover.pdf'),
(8, 2, 35, 1, './uploads/student-document', '2024-10-28 10:26:58', '70bd14d84eeff46c18c2.pdf', 'sample-2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `keytab`
--

CREATE TABLE `keytab` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `key_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keytab`
--

INSERT INTO `keytab` (`id`, `type`, `key_num`) VALUES
(1, 'tuition_id', 4);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_picture`
--

INSERT INTO `profile_picture` (`id`, `user_id`, `path`, `filename`, `original_filename`, `is_submit`) VALUES
(1, 42, './uploads/user-img', '40721ed229bcfeafb0c3.jpg', '40721ed229bcfeafb0c3.jpg', 1),
(2, 43, './uploads/user-img', 'cc953c007535f54af97d.png', 'cc953c007535f54af97d.png', 1),
(3, 44, './uploads/user-img', '0aa8581c2cb0aa948d63ce3ddad90c812.jpg', '0aa8581c2cb0aa948d63ce3ddad90c812.jpg', 1),
(4, 35, './uploads/user-img', 'male.png', 'male.png', 1),
(5, 36, './uploads/user-img', 'male-2.jpg', 'male-2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_subject`
--

CREATE TABLE `ref_subject` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `descs` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `active` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_subject`
--

INSERT INTO `ref_subject` (`id`, `code`, `descs`, `price`, `active`, `type`) VALUES
(1, 1, 'Matematik Moden', 40, 1, 45),
(2, 2, 'Matematik Tambahan', 40, 1, 45),
(3, 3, 'Akaun', 40, 1, 45),
(4, 4, 'Sains', 40, 1, 45),
(5, 5, 'Sejarah', 40, 1, 45),
(6, 6, 'Kimia', 40, 1, 45),
(7, 7, 'Biologi', 40, 1, 45),
(8, 8, 'Fizik', 40, 1, 45),
(9, 9, 'Ekonomi', 40, 1, 45),
(10, 10, 'Bahasa Inggeris', 40, 1, 45),
(15, 15, 'Matematik', 40, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `student_class`
--

CREATE TABLE `student_class` (
  `id` int(11) NOT NULL,
  `tuition_id` varchar(30) NOT NULL,
  `student_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_class`
--

INSERT INTO `student_class` (`id`, `tuition_id`, `student_id`, `tutor_id`, `subject_id`, `class_id`) VALUES
(4, 'TCO-2', 35, 43, 4, 1),
(5, 'TCO-3', 36, 43, 4, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_document`
--

INSERT INTO `student_document` (`id`, `student_id`, `tuition_id`, `module`, `path`, `create_dt`, `filename`, `original_filename`, `is_submit`) VALUES
(1, 44, 'TCO-1', 'PAY_RECEIPT', './uploads/receipt', '2024-10-19 16:17:24', '9b9a305db804911430f2.pdf', 'sample.pdf', 1),
(2, 35, '', 'NRIC', './uploads/student-document', '2024-10-23 16:48:15', 'f748b5dc1a9250addf43.pdf', 'sample.pdf', 0),
(3, 35, 'TCO-2', 'PAY_RECEIPT', './uploads/receipt', '2024-10-23 16:51:09', '9047be2fef014facf710.pdf', 'sample.pdf', 1),
(4, 36, 'TCO-3', 'PAY_RECEIPT', './uploads/receipt', '2024-10-24 05:13:39', 'd930a4076d853b1806b7.pdf', 'sample.pdf', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_information`
--

INSERT INTO `student_information` (`id`, `student_id`, `name`, `phone_no`, `email`, `address`, `approved`, `form`, `guardian_name⁠`, `guardian_phone`, `school_name`, `school_address`) VALUES
(1, 44, 'Mohd Fazrin', '019191191', 'fazrin@gmail.com', 'Sepang, Malaysia', 1, 4, 'Azman Nor', '019191919', 'SMKBC', 'Banting, Selangor'),
(2, 35, 'Hafizi', '01717171717', 'hafizi@gmail.com', 'KG LATI', 1, 1, 'ROZUAR MOHD NOOR', '0197627878', 'MAAHAD MUHAMMADI PASIR MAS', 'PASIR MAS'),
(3, 36, 'Amar Badri', '0197265454', 'amar@gmail.com', 'Kg Padang Jelapang', 1, 1, 'Dol Said', '0197867525', 'SMKTPR', 'Lemal');

-- --------------------------------------------------------

--
-- Table structure for table `student_material`
--

CREATE TABLE `student_material` (
  `id` int(11) NOT NULL,
  `filename` varchar(300) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `path` varchar(300) NOT NULL,
  `original_filename` varchar(355) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_material`
--

INSERT INTO `student_material` (`id`, `filename`, `tutor_id`, `class_id`, `subject_id`, `path`, `original_filename`) VALUES
(1, 'dd277ebd9e166bcf7839.pdf', 43, 1, 4, './uploads/student-material', 'sample.pdf'),
(4, '135ccc76048d08422aea.doc', 43, 1, 4, './uploads/student-material', 'file-sample_100kB.doc');

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
  `tuition_id` varchar(20) NOT NULL,
  `finish` int(11) NOT NULL,
  `class_type` int(11) NOT NULL,
  `class_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_timetable`
--

INSERT INTO `student_timetable` (`id`, `student_id`, `tutor_id`, `class_id`, `class_dt`, `class_time`, `subject_id`, `status`, `tuition_id`, `finish`, `class_type`, `class_link`) VALUES
(1, 35, 43, 1, '2024-10-25', '9:30 AM', 4, 1, 'TCO-2', 0, 1, 'https://meet.google.com/xwd-dqco-vct'),
(2, 35, 43, 1, '2024-10-26', '9:30 AM', 4, 1, 'TCO-2', 0, 1, 'https://meet.google.com/xwd-dqco-vct'),
(3, 35, 43, 1, '2024-10-27', '8:30 PM', 4, 1, 'TCO-2', 0, 0, ''),
(4, 35, 43, 1, '2024-11-01', '9:30 AM', 4, 1, 'TCO-2', 0, 0, ''),
(5, 35, 43, 1, '2024-11-02', '9:30 AM', 4, 1, 'TCO-2', 0, 0, ''),
(6, 35, 43, 1, '2024-11-03', '9:30 PM', 4, 1, 'TCO-2', 0, 0, ''),
(7, 35, 43, 1, '2024-11-08', '9:30 AM', 4, 1, 'TCO-2', 0, 0, ''),
(8, 35, 43, 1, '2024-11-09', '9:30 AM', 4, 1, 'TCO-2', 0, 0, ''),
(9, 35, 43, 1, '2024-11-10', '10:30 PM', 4, 1, 'TCO-2', 0, 0, ''),
(10, 35, 43, 1, '2024-11-15', '9:30 AM', 4, 1, 'TCO-2', 0, 0, ''),
(11, 35, 43, 1, '2024-11-16', '9:30 AM', 4, 1, 'TCO-2', 0, 0, ''),
(12, 35, 43, 1, '2024-11-17', '10:30 PM', 4, 1, 'TCO-2', 0, 0, ''),
(13, 36, 43, 1, '2024-10-25', '9:30 AM', 4, 1, 'TCO-3', 0, 1, 'https://meet.google.com/xwd-dqco-vct'),
(14, 36, 43, 1, '2024-10-26', '9:30 AM', 4, 1, 'TCO-3', 0, 1, 'https://meet.google.com/xwd-dqco-vct'),
(15, 36, 43, 1, '2024-10-27', '9:30 PM', 4, 1, 'TCO-3', 0, 0, ''),
(16, 36, 43, 1, '2024-11-01', '9:30 AM', 4, 1, 'TCO-3', 0, 0, ''),
(17, 36, 43, 1, '2024-11-02', '9:30 AM', 4, 1, 'TCO-3', 0, 0, ''),
(18, 36, 43, 1, '2024-11-03', '8:30 PM', 4, 1, 'TCO-3', 0, 0, ''),
(19, 36, 43, 1, '2024-11-08', '9:30 AM', 4, 1, 'TCO-3', 0, 0, ''),
(20, 36, 43, 1, '2024-11-09', '10:30 AM', 4, 1, 'TCO-3', 0, 0, ''),
(21, 36, 43, 1, '2024-11-10', '8:30 PM', 4, 1, 'TCO-3', 0, 0, ''),
(22, 36, 43, 1, '2024-11-15', '9:30 AM', 4, 1, 'TCO-3', 0, 0, ''),
(23, 36, 43, 1, '2024-11-16', '10:30 AM', 4, 1, 'TCO-3', 0, 0, ''),
(24, 36, 43, 1, '2024-11-17', '9:30 PM', 4, 1, 'TCO-3', 0, 0, ''),
(25, 36, 43, 1, '2024-11-22', '9:30 AM', 4, 1, 'TCO-3', 0, 0, '');

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
  `approved_dt` date NOT NULL,
  `time_table` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tuition_application`
--

INSERT INTO `tuition_application` (`id`, `tuition_id`, `student_id`, `subjects`, `total`, `paid`, `stage`, `verified_paid`, `internal_stage`, `approved_dt`, `time_table`) VALUES
(1, 'TCO-1', 44, '4|2', 80, 1, 'ONGOING CLASS', 1, 'COMPLETE', '0000-00-00', 1),
(2, 'TCO-2', 35, '4', 40, 1, 'ONGOING CLASS', 1, 'COMPLETE', '0000-00-00', 1),
(3, 'TCO-3', 36, '4', 40, 1, 'ONGOING CLASS', 1, 'COMPLETE', '0000-00-00', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`id`, `name`, `age`, `phone_no`, `email`, `address`, `tutor_id`, `status`, `subject`, `assign_class`) VALUES
(1, 'Noriah Bt Hj Ismail', '40', '0191919191', 'noriah@gmail.com', 'Sepang, Selangor', 42, 2, 2, 1),
(2, 'Aniza bt Mahmod', '45', '01919191', 'aniza@gmail.com', 'Banting, Selangor', 43, 2, 4, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor_document`
--

INSERT INTO `tutor_document` (`id`, `tutor_id`, `module`, `path`, `create_dt`, `filename`, `original_filename`, `is_submit`) VALUES
(1, 42, 'RESUME', './uploads/tutor-document', '2024-10-19 16:13:41', 'ca8db30e65dbc1fb3fce.pdf', 'sample.pdf', 0),
(2, 43, 'RESUME', './uploads/tutor-document', '2024-10-19 16:14:19', '3aa1fb99e28c0db81ba8.pdf', 'sample.pdf', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `user_type`, `complete_register`) VALUES
(24, 'Admin', 'admin', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 4, 0),
(35, 'Hafizi', 'hafizi', 'hafizi@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 2),
(36, 'Amar Badri', 'amar', 'amar@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 2),
(37, 'Subari', 'subari', 'subari@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0),
(38, 'Izani', 'izani', 'izani@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0),
(39, 'Mastura', 'mastura', 'mastura@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0),
(40, 'Nor Bi', 'nurbi', 'bi@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0),
(41, 'Ahmad', 'ahmad', 'ahmad@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 0),
(42, 'Noriah Bt Hj Ismail', 'noriah', 'noriah@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 2),
(43, 'Aniza bt Mahmod', 'aniza', 'aniza@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 2),
(44, 'Mohd Fazrin', 'fazrin', 'fazrin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 2);

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
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homework_document`
--
ALTER TABLE `homework_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homework_status`
--
ALTER TABLE `homework_status`
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
-- Indexes for table `student_material`
--
ALTER TABLE `student_material`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class_taken`
--
ALTER TABLE `class_taken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `homework_document`
--
ALTER TABLE `homework_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `homework_status`
--
ALTER TABLE `homework_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `keytab`
--
ALTER TABLE `keytab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile_picture`
--
ALTER TABLE `profile_picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ref_subject`
--
ALTER TABLE `ref_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_class`
--
ALTER TABLE `student_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_document`
--
ALTER TABLE `student_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_information`
--
ALTER TABLE `student_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_material`
--
ALTER TABLE `student_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_timetable`
--
ALTER TABLE `student_timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tuition_application`
--
ALTER TABLE `tuition_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tutor_document`
--
ALTER TABLE `tutor_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
