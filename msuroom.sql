-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2021 at 07:57 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msuroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin_status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `admin_status`) VALUES
(1, 'admin', '123456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `calender`
--

CREATE TABLE `calender` (
  `ca_id` int(11) NOT NULL,
  `ca_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(10) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `ca_title` varchar(50) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `room_id` int(10) NOT NULL,
  `room_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calender`
--

INSERT INTO `calender` (`ca_id`, `ca_status`, `user_id`, `date_start`, `date_end`, `ca_title`, `time_start`, `time_end`, `room_id`, `room_description`) VALUES
(13, 2, 28, '2021-10-12', '2021-10-12', 'อบรม lalarvel', '13:10:00', '16:10:00', 11, ''),
(14, 3, 29, '2021-10-19', '2021-10-19', 'นิสิตขอใช้ห้องทำงานกลุ่ม', '14:54:00', '16:54:00', 12, ''),
(15, 3, 29, '2021-10-20', '2021-10-21', 'นิสิตขอใช้ห้องทำงานกลุ่ม', '18:12:00', '20:12:00', 12, ''),
(16, 2, 35, '2021-10-21', '2021-10-21', 'ทดสอบจองห้อง', '14:40:00', '17:40:00', 14, ''),
(17, 2, 28, '2021-10-22', '2021-10-22', 'เทส', '08:42:00', '13:42:00', 20, ''),
(18, 2, 27, '2021-10-22', '2021-10-22', 'เทส', '14:55:00', '16:55:00', 20, 'PDF files have certain standard fonts: Helvetica, Times and Courier in the win-1252 character set, and  Zapfdingbats and Symbol character sets. These fonts should be available to any PDF reading program, and do not need to be embedded in the PDF document.\n\nAdvantages: Small file size, fast processing, small memory usage.\n\nDisadvantages: Limited choice of fonts for appearance. Will not display characters which are not in the win-1252 Symbols, or Dingbats codepages (suitable for most Western European languages).'),
(19, 2, 35, '2021-10-23', '2021-10-24', 'เทส11', '20:34:00', '14:34:00', 11, 'PHP กับ PDF ภาษาไทย พิมพ์ข้อความบนเอกสาร PDF ภาษาไทย ด้วย FPDF\r\nPHP กับ PDF ภาษาไทย พิมพ์ข้อความบนเอกสาร PDF ภาษาไทย ด้วย FPDF เห็นถามกันบ่อย ๆ ในกระทู้ เกี่ยวกับปัยหาภาษาไทยบน FPDF ที่แสดงผลไม่ถูกต้อง หรือแสดงผลเป็นภาษาไทยที่อ่านไม่ออก ซึ่งปัญหานี้สามารถแก้ไขได้อย่างง่าย ๆ ถ้าแก้ไขถูกจุด ซึ่งหลัก ๆ แล้วก็ไม่มีอะไรมากมาย เพียงดาวน์โหลด Font และเรียกใช้ Font ที่สามารถแสดงผลหรือรองรับภาษาไทยได้ ก็สามารถแก้ไขปัญหานี้ได้แล้ว\r\n'),
(20, 1, 29, '2021-11-02', '2021-11-02', 'ทดสอบระบบการจอง', '10:00:00', '04:00:00', 23, 'ทดสอบระบบการจอง'),
(21, 0, 29, '2021-11-04', '2021-11-05', 'ทดสอบระบบการจองห้องประชุม', '08:30:00', '03:00:00', 20, '');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `no_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `no_old` varchar(10) DEFAULT '0',
  `no_new` varchar(10) DEFAULT '0',
  `no_date` date NOT NULL,
  `ca_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`no_id`, `user_id`, `no_old`, `no_new`, `no_date`, `ca_id`) VALUES
(7, 28, '0', '2', '2021-10-18', 13),
(8, 29, '0', '0', '2021-10-18', 14),
(9, 29, '0', '0', '2021-10-18', 15),
(10, 35, '0', '2', '2021-10-21', 16),
(11, 28, '0', '2', '2021-10-21', 17),
(12, 27, '0', '2', '2021-10-22', 18),
(13, 35, '0', '2', '2021-10-22', 19),
(14, 29, '0', '0', '2021-11-01', 20),
(15, 29, '0', '0', '2021-11-01', 21);

-- --------------------------------------------------------

--
-- Table structure for table `object`
--

CREATE TABLE `object` (
  `oj_id` int(11) NOT NULL,
  `oj_name` varchar(50) NOT NULL,
  `oj_count` varchar(3) NOT NULL,
  `oj_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `room_floor` varchar(2) NOT NULL,
  `room_object` varchar(80) NOT NULL,
  `room_chair` varchar(3) NOT NULL,
  `room_status` tinyint(2) NOT NULL DEFAULT 1,
  `room_photo` varchar(255) NOT NULL,
  `room_note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_name`, `room_floor`, `room_object`, `room_chair`, `room_status`, `room_photo`, `room_note`) VALUES
(11, 'IT101', '1', 'mic,projector,speaker', '30', 1, 'IMG_0347.JPG', NULL),
(12, 'IT102', '1', 'mic,projector,speaker', '25', 1, 'IMG_0359.JPG', NULL),
(13, 'IT201', '2', 'mic,projector,speaker', '30', 1, 'IMG_0362.JPG', NULL),
(14, 'IT202', '2', 'mic,projector,speaker', '60', 1, 'IMG_0372.JPG', NULL),
(15, 'IT301', '3', 'mic,projector,speaker', '100', 1, 'IMG_0409.JPG', NULL),
(16, 'IT303', '3', 'mic,projector,speaker', '120', 1, 'IMG_0432.JPG', NULL),
(17, 'IT302', '3', 'mic,projector,speaker', '150', 1, 'IMG_0440.JPG', NULL),
(18, 'IT401', '4', 'mic,projector,speaker', '50', 1, 'IMG_0444.JPG', NULL),
(19, 'IT404', '4', 'mic,projector,speaker', '80', 1, 'IMG_0435.JPG', NULL),
(20, 'IT501', '5', 'mic,projector,speaker', '50', 1, 'IMG_0391.JPG', NULL),
(21, 'IT502', '5', 'mic,projector,speaker', '90', 1, 'IMG_0360.JPG', NULL),
(22, 'IT103', '1', 'mic,projector', '80', 1, 'IMG_0423.JPG', NULL),
(23, 'ITMotion', '5', 'ชุดกล้องสามมิติพร้อมถุงมือ', '-', 1, 'IMG_0460.JPG', NULL),
(24, 'IT509', '5', 't', '50', 2, 'IMG_0444.JPG', 'ปิดชั่วคราว');

-- --------------------------------------------------------

--
-- Table structure for table `system_mail_config`
--

CREATE TABLE `system_mail_config` (
  `mail_id` int(11) NOT NULL,
  `mail_name` varchar(250) NOT NULL,
  `mail_user` varchar(250) NOT NULL,
  `mail_password` varchar(250) NOT NULL,
  `mail_host` varchar(250) NOT NULL,
  `mail_port` varchar(250) NOT NULL,
  `mail_secure` varchar(250) NOT NULL,
  `mail_status` tinyint(1) NOT NULL DEFAULT 1,
  `modify_date` datetime NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_mail_config`
--

INSERT INTO `system_mail_config` (`mail_id`, `mail_name`, `mail_user`, `mail_password`, `mail_host`, `mail_port`, `mail_secure`, `mail_status`, `modify_date`, `create_date`) VALUES
(1, 'คณะวิทยาการสารสนเทศ มมส.', '', '', 'smtp.office365.com', '587', 'tls', 1, '2020-11-06 10:36:00', '2020-10-25 17:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `system_mail_sender`
--

CREATE TABLE `system_mail_sender` (
  `sender_id` int(11) NOT NULL,
  `sender_title` varchar(250) NOT NULL,
  `sender_subject_th` varchar(250) NOT NULL,
  `sender_subject_en` varchar(250) NOT NULL,
  `sender_message_th` longtext NOT NULL,
  `sender_message_en` longtext NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_mail_sender`
--

INSERT INTO `system_mail_sender` (`sender_id`, `sender_title`, `sender_subject_th`, `sender_subject_en`, `sender_message_th`, `sender_message_en`, `modify_date`) VALUES
(1, 'ยืนยันการสมัครสมาชิก', 'ยืนยันการสมัครสมาชิก', 'Confirm Registration ', '', '', '2020-10-25 20:27:33'),
(2, 'ยืนยันตัวตนด้วย OTP', 'ยืนยันตัวตนด้วย OTP', 'Verify your identity with OTP', '', '', '2020-10-25 20:27:33'),
(3, 'รีเซ็ตรหัสผ่าน', 'รีเซ็ตรหัสผ่าน', 'Reset password', '<p>เรียนผู้ใช้บริการ</p> <p>มีบางคนร้องขอให้ตั้งค่ารหัสผ่านใหม่สำหรับบัญชีต่อไปนี้ </p> <br /> <p>{{ email }}</p><br /> <p>หากคุณไม่ได้เป็นผู้ขอกู้คืนรหัสผ่าน คุณไม่จำเป็นต้องดำเนินการใด ๆ และไม่จำเป็นต้องสนใจอีเมลฉบับนี้</p> <p>เพื่อตั้งค่ารหัสผ่านใหม่ของคุณ คุณต้องเข้าที่ลิงก์ต่อไปนี้</p> <a target=\"_blank\" href=\"{{ url }}\">ลิงก์</a> <p>ขอบคุณผู้ใช้บริการ</p><br/><br/> {{ signature_websitename }} <br/> เบอร์ติดต่อ: {{ signature_phone }}', '', '2020-10-25 20:27:33'),
(9, 'การติดต่อกลับฟอร์มหน้าติดต่อเรา', 'ติดต่อกลับฟอร์มหน้าติดต่อเรา', 'Contact us form', 'ขอบคุณที่ให้ความสนใจในการติดต่อเรา <br/> เราหวังว่าในการตอบกลับครั้งนี้จะมีประโยชน์ให้กับคุณ <br/> และขออภัยหากการตอบกลับนี้ใช้ระยะเวลานาน <br/><br/> ข้อความต่อไปนี้เป็นข้อความจาก {{ sender_name }} <br/><br/> <div>{{ contact_message }}</div> <br/><br/> {{ signature_websitename }} <br/> เบอร์ติดต่อ: {{ signature_phone }}', 'Thank you for your interest in contacting us. <br/> We hope you will find it helpful in this response. <br/> And we apologize if this response takes a long time. <br/> <br/> The following text is from {{ sender_name }}. <br/> <br/> <div> {{ contact_message }} </div> <br/> <br/> {{ signature_websitename }} <br/> Location: {{ signature_address }} <br/> Contact number: {{ signature_phone }} <br/> Fax: {{ signature_fax }} <br/> Email: {{ signature_mail }} <br/> Business days: {{ signature_business }}', '2020-10-25 20:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_status` varchar(2) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_lastname` varchar(55) NOT NULL,
  `user_stdid` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_numberphone` varchar(10) NOT NULL,
  `user_gender` varchar(8) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_notification` varchar(2) NOT NULL,
  `forget` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_status`, `user_name`, `user_lastname`, `user_stdid`, `email`, `user_numberphone`, `user_gender`, `user_username`, `user_password`, `user_notification`, `forget`) VALUES
(27, '2', 'นายจันทร์', 'พุทธ', '', 'msu', '0893761780', 'ชาย', 'admin', '123456', '', NULL),
(28, '3', 'นายประวิตร', 'นะจ๊ะ', '', 'msu', '0893761780', 'ชาย', 'test1', '123456', '', NULL),
(29, '1', 'นายยุทธ์', 'อังคาร', '0001', 'hopegc02@gmail.com', '0893761780', 'ชาย', 'test0', '123456', '', '617f5df14db3e'),
(30, '1', 'ผู้ใช้ทั่วไป 2', 'ผู้ใช้ทั่วไป 2', '333', 'msu', '0893761780', 'หญิง', 'test3', '123456', '', NULL),
(31, '1', 'ผู้ใช้ทั่วไป 2', 'ผู้ใช้ทั่วไป 2', '444', '123', '123', 'ชาย', 'aaa', '12346', '', NULL),
(32, '2', 'ผู้ใช้ทั่วไป 3', 'ผู้ใช้ทั่วไป 3', '555', '44/44', '0893761780', 'หญิง', 'test 4', '123456', '', NULL),
(35, '1', 'นราธิป', 'บุญเลี้ยง', '6101127005', 'hopegc02@gmail.com', '0912345678', 'ชาย', 'test11', '123456', '', '617f5df14db3e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `calender`
--
ALTER TABLE `calender`
  ADD PRIMARY KEY (`ca_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`no_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ca_id` (`ca_id`);

--
-- Indexes for table `object`
--
ALTER TABLE `object`
  ADD PRIMARY KEY (`oj_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `system_mail_config`
--
ALTER TABLE `system_mail_config`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `system_mail_sender`
--
ALTER TABLE `system_mail_sender`
  ADD PRIMARY KEY (`sender_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `calender`
--
ALTER TABLE `calender`
  MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `no_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `object`
--
ALTER TABLE `object`
  MODIFY `oj_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `system_mail_config`
--
ALTER TABLE `system_mail_config`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_mail_sender`
--
ALTER TABLE `system_mail_sender`
  MODIFY `sender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calender`
--
ALTER TABLE `calender`
  ADD CONSTRAINT `calender_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`ca_id`) REFERENCES `calender` (`ca_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
