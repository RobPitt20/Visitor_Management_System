-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 06:25 PM
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
-- Database: `qr_attendance_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` int(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `admin_id` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `contact`, `address`, `admin_id`, `password`) VALUES
(10, 'sandra', 'tabing', 'perlas', '20200157@feucavite.edu.ph', '09876543', 'jude street', '123', '123456'),
(11, 'Lorielle', 'a', 'Rocela', 'pedrobautistab3@gmail.com', '09876543', 'jude street', '1234', '123456'),
(12, 'Lorielle', 'a', 'Rocela', 'coleenpuraa@gmail.com', '012345', 'feu', '78945', '123456'),
(13, 'peter', 'perdido', 'Tabrilla', 'peterbautista3@gmail.com', '456789', 'imus', '78945', '123789'),
(14, 'Rob', 'perdido', 'Tabrilla', 'petertab2001@gmail.com', NULL, NULL, '0123', '123456'),
(15, 'peter', 'a', 'Tabrilla', 'peter@gmail.com', NULL, NULL, '123', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `tbl_attendance_id` int(11) NOT NULL,
  `tbl_student_id` int(11) NOT NULL,
  `time_in` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`tbl_attendance_id`, `tbl_student_id`, `time_in`, `subject_id`) VALUES
(53, 102, '2024-05-19 23:02:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance1`
--

CREATE TABLE `tbl_attendance1` (
  `tbl_attendance_id` int(11) NOT NULL,
  `tbl_student_id` int(11) NOT NULL,
  `time_in` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_attendance1`
--

INSERT INTO `tbl_attendance1` (`tbl_attendance_id`, `tbl_student_id`, `time_in`, `subject_id`) VALUES
(9, 10, '2024-05-16 22:21:09', 0),
(10, 11, '2024-05-16 22:21:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `tbl_student_id` int(11) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `student_course` varchar(50) NOT NULL,
  `student_no` int(11) NOT NULL,
  `year_level` int(11) NOT NULL,
  `student_status` varchar(255) NOT NULL,
  `qr_code` varchar(20) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`tbl_student_id`, `last_name`, `first_name`, `middle_name`, `student_course`, `student_no`, `year_level`, `student_status`, `qr_code`, `section`) VALUES
(102, 'Pura', 'Coleen', 'Andag', 'BSIT', 20210123, 2, 'regular', 'S9fm0ybv7o', 'Information Management'),
(104, 'Bautista', 'William', 'y', 'BSA', 20210124, 2, 'regular', 'adhdEVXAIM', 'Information Management'),
(105, 'Perlas', 'Sandra', 'G', 'BSA', 20210125, 2, 'regular', '5QWAWtsDqX', 'Information Management');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student1`
--

CREATE TABLE `tbl_student1` (
  `tbl_student_id` int(11) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `student_course` varchar(50) NOT NULL,
  `student_no` int(11) NOT NULL,
  `year_level` int(11) NOT NULL,
  `student_status` varchar(255) NOT NULL,
  `qr_code` varchar(20) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_student1`
--

INSERT INTO `tbl_student1` (`tbl_student_id`, `last_name`, `first_name`, `middle_name`, `student_course`, `student_no`, `year_level`, `student_status`, `qr_code`, `section`) VALUES
(10, 'Tabrilla', 'Rob peter', 'Perdido', 'BSIT', 20200157, 2, 'irregular', 'btg2TTVQAU', 'Information Management'),
(11, 'Pura', 'Coleen', 'Andag', 'BSIT', 20210123, 2, 'irregular', 'hxtwwBmKa7', 'Information Management'),
(12, 'Mendoza', 'Gabriel', 'f', 'BSA', 20210124, 2, 'regular', 'Lv7gzS53n8', 'Information Management'),
(13, 'Perlas', 'Sandra', 'G', 'BSIT', 20210125, 2, 'regular', 'bVscQhpTmo', 'Information Management');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`tbl_attendance_id`);

--
-- Indexes for table `tbl_attendance1`
--
ALTER TABLE `tbl_attendance1`
  ADD PRIMARY KEY (`tbl_attendance_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`tbl_student_id`) USING BTREE;

--
-- Indexes for table `tbl_student1`
--
ALTER TABLE `tbl_student1`
  ADD PRIMARY KEY (`tbl_student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `tbl_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_attendance1`
--
ALTER TABLE `tbl_attendance1`
  MODIFY `tbl_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `tbl_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tbl_student1`
--
ALTER TABLE `tbl_student1`
  MODIFY `tbl_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
