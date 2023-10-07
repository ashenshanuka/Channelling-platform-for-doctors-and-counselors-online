-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2023 at 05:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`) VALUES
(1, 'test@gmail.com', '123456', 'Helping-Hand');

-- --------------------------------------------------------

--
-- Table structure for table `appoinment`
--

CREATE TABLE `appoinment` (
  `b_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `u_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `d_id` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL,
  `is_update` int(11) NOT NULL,
  `is_delete_time` varchar(30) NOT NULL,
  `is_update_time` varchar(30) NOT NULL,
  `app_date` datetime NOT NULL,
  `msg` text NOT NULL,
  `book_date` date DEFAULT NULL,
  `amount` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `book_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appoinment`
--

INSERT INTO `appoinment` (`b_id`, `name`, `email`, `contact`, `u_id`, `status`, `d_id`, `is_delete`, `is_update`, `is_delete_time`, `is_update_time`, `app_date`, `msg`, `book_date`, `amount`, `payment_status`, `book_time`) VALUES
(6, 'Ashen Shanuka', 'vrushshah@gmail.com', 767620534, 2, 'Completed', 5, 0, 1, '', '1696692678', '2023-10-07 17:30:21', 'asfdghjk', '2023-10-10', '500', 'completed', '23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `b_id` int(11) NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `des` text NOT NULL,
  `r_date` date NOT NULL,
  `is_delete` int(11) NOT NULL,
  `is_update` int(11) NOT NULL,
  `is_delete_time` datetime DEFAULT NULL,
  `is_update_time` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`b_id`, `tittle`, `des`, `r_date`, `is_delete`, `is_update`, `is_delete_time`, `is_update_time`, `image`) VALUES
(1, 'abc', 'ccccccccccccccccccccccccccb', '2023-10-07', 0, 0, '0000-00-00 00:00:00', 1696691716, 'Mokeups (3).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_delete` int(11) NOT NULL,
  `is_update` int(11) NOT NULL,
  `is_delete_time` varchar(50) NOT NULL,
  `is_update_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `name`, `is_delete`, `is_update`, `is_delete_time`, `is_update_time`) VALUES
(3, 'Clinical Psychologist', 0, 0, '', ''),
(4, 'Counseling Psychologist', 0, 0, '', ''),
(5, 'School Psychologist', 0, 0, '', ''),
(6, 'Other Psychology Professional', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `name`, `state_id`) VALUES
(27, 'Colombo', 1),
(28, 'Gampaha', 1),
(29, 'Kalutara', 1),
(30, 'Kandy', 1),
(31, 'Matale', 1),
(32, 'Nuwara Eliya', 1),
(33, 'Galle', 1),
(34, 'Matara', 1),
(35, 'Hambantota', 1),
(36, 'Jaffna', 1),
(37, 'Kilinochchi', 1),
(38, 'Mannar', 1),
(39, 'Vavuniya', 1),
(40, 'Mullaitivu', 1),
(41, 'Batticaloa', 1),
(42, 'Ampara', 1),
(43, 'Trincomalee', 1),
(44, 'Kurunegala', 1),
(45, 'Puttalam', 1),
(46, 'Anuradhapura', 1),
(47, 'Polonnaruwa', 1),
(48, 'Badulla', 1),
(49, 'Monaragala', 1),
(50, 'Ratnapura', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `msg` text NOT NULL,
  `is_time` varchar(50) NOT NULL,
  `is_date` date NOT NULL,
  `contact` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `msg`, `is_time`, `is_date`, `contact`) VALUES
(1, 'test', 'test@gmail.com', 'dentist', 'testing', '1684589514', '2023-05-20', 9785632014);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `d_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `status` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `about` text NOT NULL,
  `file` varchar(80) NOT NULL,
  `image` varchar(50) NOT NULL,
  `is_delete` int(11) NOT NULL,
  `is_update` int(11) NOT NULL,
  `is_delete_time` varchar(30) NOT NULL,
  `is_update_time` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `r_date` date NOT NULL,
  `city_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `zoom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`d_id`, `name`, `email`, `contact`, `status`, `password`, `about`, `file`, `image`, `is_delete`, `is_update`, `is_delete_time`, `is_update_time`, `gender`, `cat_id`, `r_date`, `city_id`, `area_id`, `zoom`) VALUES
(5, 'Ashen Shanuka', 'doc@gmail.com', 767620534, 'approved', '1234', 'uuuyyyyyyyyyyyy', 'Appendix E - Monthly Progress Report.docx', '', 0, 1, '', '1696692366', 'Male', 4, '2023-10-07', 0, 0, 'ssssaeaf.zoomlk');

-- --------------------------------------------------------

--
-- Table structure for table `doc_pro`
--

CREATE TABLE `doc_pro` (
  `d_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `expert` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `des` text NOT NULL,
  `pro_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doc_pro`
--

INSERT INTO `doc_pro` (`d_id`, `f_name`, `l_name`, `expert`, `age`, `address`, `des`, `pro_pic`) VALUES
(4, 'Ashen', 'Shanuka', 'qqqw', 21, '142/1,Wewalduwa road,Kelaniya', '2333', 'Mokeups (2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `m_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `stoke` varchar(50) NOT NULL,
  `r_date` date NOT NULL,
  `is_delete` int(11) NOT NULL,
  `is_update` int(11) NOT NULL,
  `is_update_time` varchar(50) NOT NULL,
  `is_delete_time` varchar(50) NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`m_id`, `name`, `stoke`, `r_date`, `is_delete`, `is_update`, `is_update_time`, `is_delete_time`, `image`) VALUES
(5, 'LTK-H', 'availabel', '2023-05-28', 1, 0, '1685249685', '1685251045', 'download (1).jpg'),
(6, 'LTK-H', 'availabel', '2023-05-28', 0, 0, '1685249700', '', 'download (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `name`) VALUES
(1, 'Gujarat'),
(2, 'state 2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `address` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `city_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `r_date` datetime NOT NULL,
  `is_delete` int(11) NOT NULL,
  `is_update` int(11) NOT NULL,
  `is_delete_time` varchar(30) NOT NULL,
  `is_update_time` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `name`, `email`, `contact`, `address`, `image`, `city_id`, `area_id`, `r_date`, `is_delete`, `is_update`, `is_delete_time`, `is_update_time`, `gender`, `password`) VALUES
(1, 'Harsh Shah', 'harshshah6966@gmail.com', 9712658293, 'Area 1', 'WhatsApp Image 2022-12-21 at 20.24.32.jpg', 1, 1, '2023-05-28 08:15:43', 0, 0, '', '', 'Male', 'abc@123'),
(2, 'Vrusha shah', 'vrushshah@gmail.com', 8596320147, 'Area 1', 'Untitled-3.png', 1, 2, '2023-05-28 08:26:48', 0, 0, '', '', 'Female', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appoinment`
--
ALTER TABLE `appoinment`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `u_id` (`u_id`,`d_id`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `city_id` (`city_id`,`area_id`);

--
-- Indexes for table `doc_pro`
--
ALTER TABLE `doc_pro`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appoinment`
--
ALTER TABLE `appoinment`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doc_pro`
--
ALTER TABLE `doc_pro`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appoinment`
--
ALTER TABLE `appoinment`
  ADD CONSTRAINT `appoinment_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `doctor` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appoinment_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
