-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2019 at 08:06 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repair`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_username` varchar(50) COLLATE utf8_bin NOT NULL,
  `member_password` varchar(50) COLLATE utf8_bin NOT NULL,
  `member_status_role` int(11) NOT NULL DEFAULT '0',
  `member_position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_username`, `member_password`, `member_status_role`, `member_position`) VALUES
(1, 'admin', '123456', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `oe`
--

CREATE TABLE `oe` (
  `oe_id` int(11) NOT NULL,
  `oe_code` varchar(50) COLLATE utf8_bin NOT NULL,
  `oe_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `oe_position` int(11) NOT NULL,
  `oe_create_by` varchar(255) COLLATE utf8_bin NOT NULL,
  `oe_create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `oe_update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `oe`
--

INSERT INTO `oe` (`oe_id`, `oe_code`, `oe_name`, `oe_position`, `oe_create_by`, `oe_create_at`, `oe_update_at`) VALUES
(9, '0010124', 'mi4', 4, 'A62073', '2019-07-30 11:22:33', '2019-08-22 08:09:32'),
(10, '6954176832727', 'mi4-001504', 1, 'A62073', '2019-08-01 10:02:04', '2019-08-01 10:02:04'),
(11, '5441200015', 'iphone4', 2, 'A62073', '2019-08-01 10:03:11', '2019-08-01 10:03:11'),
(12, '695417', 'Waron445', 3, 'A62072', '2019-08-02 09:47:03', '2019-08-02 09:47:03'),
(13, '5322010022', 'iphone5', 3, 'A62072', '2019-08-02 09:56:01', '2019-08-02 09:56:01'),
(14, '5614421013', 'mi4-44506', 2, 'A62072', '2019-08-02 09:57:52', '2019-08-02 09:57:52'),
(15, '6954176832727', 'ddddddddddddddddd', 2, 'A62073', '2019-08-05 11:12:40', '2019-08-05 11:12:40'),
(16, '695417683272d', 'notebook', 1, 'A62073', '2019-08-08 08:05:29', '2019-08-08 08:05:29'),
(17, '6954176sdw', 'asdf', 4, 'A62073', '2019-08-08 08:05:52', '2019-08-08 08:05:52'),
(19, 'aswedsas', 'ready', 3, 'A62073', '2019-08-12 08:40:55', '2019-08-12 08:40:55'),
(24, '5412012001', 'โทรศัพท์', 4, 'A62073', '2019-09-15 06:30:30', '2019-09-15 06:30:30'),
(25, '8850228001615', 'ReadyBootRad', 1, 'A62073', '2019-09-18 07:38:01', '2019-09-18 07:38:01'),
(26, 'test012', 'PrinterArzor', 3, 'A62087', '2019-10-01 07:05:19', '2019-10-01 07:05:19'),
(27, 's1', '<?php 	date_default_timezone_set(\"Asia/Bangkok\"); ', 3, 'A62087', '2019-10-04 09:12:40', '2019-10-04 09:12:40'),
(28, '6640', 'fff', 3, 'A62087', '2019-10-05 01:51:04', '2019-10-05 01:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position_name`) VALUES
(1, 'บัญชี'),
(2, 'ฝ่ายบุคคล'),
(3, 'คลังอุปกรณ์'),
(4, 'ช่าง');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_fname` varchar(50) COLLATE utf8_bin NOT NULL,
  `profile_lname` varchar(50) COLLATE utf8_bin NOT NULL,
  `profile_create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `profile_users_id` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_fname`, `profile_lname`, `profile_create_at`, `profile_update_at`, `profile_users_id`) VALUES
('ชื่อในระบบ', 'นามสกุลในระบบ', '2019-09-30 08:09:31', '2019-09-30 08:09:31', 'A62062'),
('ฤทธิชัย', 'จตุรภาค', '2019-09-05 04:12:50', '2019-09-05 04:12:50', 'A62066'),
('ฟหกด', 'ฟหกด', '2019-09-05 04:15:10', '2019-09-05 04:15:10', 'A62067'),
('Ritichiaj', 'jaturapak', '2019-08-02 09:45:46', '2019-08-02 09:45:46', 'A62072'),
('ฤทธิชัย', 'จตุรภาค', '2019-07-25 11:06:42', '2019-07-25 11:06:42', 'A62073'),
('เมนทอส', 'รสมินต์', '2019-09-18 02:10:19', '2019-09-18 02:10:19', 'A62079'),
('asdfASDF', 'sadf', '2019-09-30 06:48:22', '2019-09-30 06:48:22', 'A62081'),
('ฤทธิชัย', 'จตุรภาค', '2019-09-30 07:02:01', '2019-09-30 07:02:01', 'A62083'),
('asdf', 'WER', '2019-09-30 06:43:50', '2019-09-30 06:43:50', 'A62084'),
('ชื่อช่าง', 'นามสกุลช่าง', '2019-09-30 09:09:01', '2019-09-30 09:09:01', 'A62085'),
('ชื่อบัญชี', 'นามสกุลบัญชี', '2019-09-30 09:10:37', '2019-09-30 09:10:37', 'A62086'),
('ชื่อเจ้าหน้าที่คลัง', 'นาสกุลเจ้าหน้าที่คลัง', '2019-09-30 09:08:14', '2019-09-30 09:08:14', 'A62087');

-- --------------------------------------------------------

--
-- Table structure for table `repair_completed`
--

CREATE TABLE `repair_completed` (
  `repair_completed_id` int(11) NOT NULL,
  `repair_completed_repair_detail_id` int(11) NOT NULL,
  `repair_completed_comment` varchar(50) COLLATE utf8_bin NOT NULL,
  `repair_completed_technician_id` varchar(50) COLLATE utf8_bin NOT NULL,
  `repair_completed_create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `repair_completed`
--

INSERT INTO `repair_completed` (`repair_completed_id`, `repair_completed_repair_detail_id`, `repair_completed_comment`, `repair_completed_technician_id`, `repair_completed_create_at`) VALUES
(1, 259, 'asdf', 'A62066', '2019-09-30 14:09:25'),
(2, 260, 'asdasd\r\n', 'A62066', '2019-09-30 15:10:38'),
(3, 261, 'sdsda', 'A62066', '2019-09-30 15:12:03'),
(4, 262, 'ซ่อมเเล้วนะคับ', 'A62066', '2019-09-30 16:03:58'),
(5, 263, 'แกก', 'A62085', '2019-09-30 16:09:15'),
(6, 264, 'ซ่อม notebook เเล้ว', 'A62085', '2019-09-30 16:30:17'),
(7, 265, 'ความเห็นของช่าง', 'A62085', '2019-10-01 12:28:18'),
(8, 266, 'ความเห็นของช่าง  ชื่อช่าง นามสกุลช่าง', 'A62085', '2019-10-01 12:28:39'),
(9, 0, 'sdsf', 'A62085', '2019-10-01 13:43:21'),
(10, 273, 'แผนกช่างซ่อมแล้ว', 'A62066', '2019-10-01 14:00:45'),
(11, 272, 'แผนกช่างซ่อมเเล้ว', 'A62066', '2019-10-01 14:01:00'),
(12, 274, 'ซ่อมของให้แผนก บัญชี', 'A62085', '2019-10-01 14:07:20'),
(13, 275, 'ซ่อม Printer ให้ คลัง', 'A62085', '2019-10-01 14:07:47'),
(14, 288, 'ซ่อมเเล้วครับ', 'A62085', '2019-10-05 10:46:22'),
(15, 289, 'ซ่อม Notebook เเล้ว', 'A62085', '2019-10-05 10:46:55'),
(16, 294, 'ทำ', 'A62085', '2019-10-05 10:47:07'),
(17, 290, 'กก', 'A62085', '2019-10-05 10:50:31'),
(18, 292, 'หกด', 'A62085', '2019-10-05 10:50:46'),
(19, 291, 'หกด', 'A62085', '2019-10-05 10:50:57'),
(20, 293, '', 'A62085', '2019-10-05 10:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `repair_detail`
--

CREATE TABLE `repair_detail` (
  `repair_detail_id` int(11) NOT NULL,
  `repair_detail_data` varchar(100) COLLATE utf8_bin NOT NULL,
  `repair_detail_users_id` varchar(20) COLLATE utf8_bin NOT NULL,
  `repair_detail_create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `repair_detail_update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `repair_detail_status_id` int(11) NOT NULL,
  `repair_detail_oe_id` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `repair_detail`
--

INSERT INTO `repair_detail` (`repair_detail_id`, `repair_detail_data`, `repair_detail_users_id`, `repair_detail_create_at`, `repair_detail_update_at`, `repair_detail_status_id`, `repair_detail_oe_id`) VALUES
(288, '1', 'A62086', '2019-10-05 02:20:32', '2019-10-05 03:56:33', 3, '10'),
(289, '2', 'A62086', '2019-10-05 02:20:58', '2019-10-05 03:56:41', 3, '16'),
(290, '1', 'A62086', '2019-10-05 02:21:13', '2019-10-05 03:56:48', 3, '25'),
(291, '5\r\n', 'A62087', '2019-10-05 02:21:53', '2019-10-05 03:55:12', 3, '12'),
(292, 'h', 'A62087', '2019-10-05 02:22:13', '2019-10-05 03:55:06', 3, '13'),
(293, '7', 'A62087', '2019-10-05 02:22:28', '2019-10-05 03:55:18', 3, '19'),
(294, 'll', 'A62087', '2019-10-05 02:22:39', '2019-10-05 03:54:58', 3, '26');

-- --------------------------------------------------------

--
-- Table structure for table `repair_end`
--

CREATE TABLE `repair_end` (
  `repair_end_id` int(11) NOT NULL,
  `repair_end_repair_completed` int(11) NOT NULL,
  `repair_end_create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `repair_end`
--

INSERT INTO `repair_end` (`repair_end_id`, `repair_end_repair_completed`, `repair_end_create_at`) VALUES
(1, 1, '2019-09-30 14:24:27'),
(2, 2, '2019-09-30 15:12:36'),
(3, 3, '2019-09-30 15:12:45'),
(4, 4, '2019-09-30 16:04:48'),
(5, 7, '2019-10-01 12:32:25'),
(6, 8, '2019-10-01 12:32:36'),
(7, 6, '2019-10-01 12:34:19'),
(8, 10, '2019-10-01 14:02:45'),
(9, 11, '2019-10-01 14:02:56'),
(10, 13, '2019-10-01 14:09:11'),
(11, 12, '2019-10-01 14:10:06'),
(12, 16, '2019-10-05 10:54:58'),
(13, 18, '2019-10-05 10:55:06'),
(14, 19, '2019-10-05 10:55:12'),
(15, 20, '2019-10-05 10:55:18'),
(16, 14, '2019-10-05 10:56:33'),
(17, 15, '2019-10-05 10:56:41'),
(18, 17, '2019-10-05 10:56:48');

-- --------------------------------------------------------

--
-- Table structure for table `repair_status`
--

CREATE TABLE `repair_status` (
  `repair_status_id` int(11) NOT NULL,
  `repair_status_name` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `repair_status`
--

INSERT INTO `repair_status` (`repair_status_id`, `repair_status_name`) VALUES
(1, 'รอการซ่อม'),
(2, 'ซ่อมเสร็จรอรับ'),
(3, 'รับเครื่องแล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` varchar(255) COLLATE utf8_bin NOT NULL,
  `users_username` varchar(20) COLLATE utf8_bin NOT NULL,
  `users_password` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `users_status_role` int(1) DEFAULT '0',
  `users_position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_username`, `users_password`, `users_status_role`, `users_position`) VALUES
('A62060', 'admin', '123456', 1, 4),
('A62062', 'A62062', '123456', 0, 1),
('A62063', 'A62063', '123456', 0, 1),
('A62064', 'A62064', '123456', 0, 1),
('A62065', 'A62065', '123456', 0, 1),
('A62066', 'A62066', '123456', 0, 4),
('A62067', 'A62067', '123456', 0, 4),
('A62068', 'A62068', '123456', 0, 4),
('A62069', 'A62069', '123456', 0, 4),
('A62070', 'A62070', '123123', 0, 2),
('A62072', 'A62072', '123456', 0, 3),
('A62073', 'A62073', '123456', 0, 3),
('A62074', 'A62074', '123123', 0, 2),
('A62075', 'A62075', '123456', 0, 2),
('A62076', 'A62076', '159357123123', 0, 2),
('A62077', 'A62077', '123456', 0, 3),
('A62078', 'A62078', '123456', 0, 3),
('A62079', 'A62079', '123456', 0, 4),
('A62080', 'A62080', '123456', 0, 2),
('A62081', 'A62081', '123456', 0, 1),
('A62082', 'A62082', '123456', 0, 1),
('A62083', 'A62083', '123456', 0, 1),
('A62084', 'A62084', '123456', 0, 1),
('A62085', 'A62085', '123456', 0, 4),
('A62086', 'A62086', '123456', 0, 1),
('A62087', 'A62087', '123456', 0, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `oe`
--
ALTER TABLE `oe`
  ADD PRIMARY KEY (`oe_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_users_id`);

--
-- Indexes for table `repair_completed`
--
ALTER TABLE `repair_completed`
  ADD PRIMARY KEY (`repair_completed_id`);

--
-- Indexes for table `repair_detail`
--
ALTER TABLE `repair_detail`
  ADD PRIMARY KEY (`repair_detail_id`);

--
-- Indexes for table `repair_end`
--
ALTER TABLE `repair_end`
  ADD PRIMARY KEY (`repair_end_id`);

--
-- Indexes for table `repair_status`
--
ALTER TABLE `repair_status`
  ADD PRIMARY KEY (`repair_status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `users_username` (`users_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oe`
--
ALTER TABLE `oe`
  MODIFY `oe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `repair_completed`
--
ALTER TABLE `repair_completed`
  MODIFY `repair_completed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `repair_detail`
--
ALTER TABLE `repair_detail`
  MODIFY `repair_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT for table `repair_end`
--
ALTER TABLE `repair_end`
  MODIFY `repair_end_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `repair_status`
--
ALTER TABLE `repair_status`
  MODIFY `repair_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
