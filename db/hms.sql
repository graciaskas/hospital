-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2020 at 01:45 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(225) NOT NULL,
  `fullname` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `city` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `date_user` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `address`, `city`, `gender`, `username`, `password`, `date_user`) VALUES
(1, 'Admin', 'Rwanda', 'Gisenyi', 'male', 'admin@gmail.com', 'admin1', '2020-06-22 05:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `booked_test`
--

CREATE TABLE `booked_test` (
  `ID` int(225) NOT NULL,
  `patient_name` varchar(225) NOT NULL,
  `patientId` int(11) NOT NULL,
  `test_name` varchar(225) NOT NULL,
  `verif_one` varchar(225) NOT NULL,
  `verif_two` varchar(225) NOT NULL,
  `verif_three` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `test_fee` int(225) NOT NULL,
  `status` int(225) NOT NULL,
  `result` text NOT NULL,
  `date_test` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_test`
--

INSERT INTO `booked_test` (`ID`, `patient_name`, `patientId`, `test_name`, `verif_one`, `verif_two`, `verif_three`, `description`, `test_fee`, `status`, `result`, `date_test`) VALUES
(1, 'Charmante', 2, 'Yve', 'semptom', 'semptom', 'semptom', 'This is the description', 200000, 2, 'Yes', '2020-09-17 21:29:15'),
(2, 'Charmante', 2, 'CBC Test', 'semptom2', 'semptom2', 'semptom2', 'Description for the second test', 25000, 1, 'waiting', '2020-09-20 01:35:46');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `ID` int(225) NOT NULL,
  `fullname` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `subject` varchar(225) NOT NULL,
  `message` text NOT NULL,
  `AdminRemark` text NOT NULL,
  `IsRead` int(225) NOT NULL,
  `date_contactus` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontactus`
--

INSERT INTO `tblcontactus` (`ID`, `fullname`, `email`, `subject`, `message`, `AdminRemark`, `IsRead`, `date_contactus`) VALUES
(1, 'Daniel M', 'daniel@gmail.com', 'Test', 'just a short text for test', 'This is my remarque as admin', 1, '2020-06-27 05:56:57'),
(2, 'Daniel M', 'anitha@gmail.com', 'ma requete', 'asdm do awekj; sdk ', '', 0, '2020-06-29 22:15:39'),
(3, 'Sonia Olela', 'sonia@gmail.com', 'a subject', 'my query about the lab', '', 0, '2020-06-29 22:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `ID` int(225) NOT NULL,
  `test_name` varchar(225) NOT NULL,
  `test_fee` decimal(65,2) NOT NULL,
  `image` varchar(225) NOT NULL,
  `status` int(11) NOT NULL,
  `date_test` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`ID`, `test_name`, `test_fee`, `image`, `status`, `date_test`) VALUES
(1, 'Complete Blood Count Test (CBC)', '25000.00', '', 1, '2020-06-26 00:12:54'),
(2, 'a', '0.00', '', 0, '2020-06-26 00:24:34'),
(3, ' Blood Glucose Test', '35000.00', 'Hospice-Lab5ef52b41571a94.40080895.', 0, '2020-06-26 00:54:57'),
(4, 'Complete Blood Count Test', '18000.00', 'Hospice-Lab-5ef5a6003c21c4.81324811.', 1, '2020-06-26 09:38:40'),
(5, 'CBC', '25000.00', 'Hospice-Lab-5ef5a62b867347.24676653.jpeg', 1, '2020-06-26 09:39:23'),
(6, 'CBC Test', '25000.00', 'KFT.jpg', 1, '2020-06-26 10:31:40'),
(7, 'CBC Test 22', '25000.00', 'KFT.jpg', 0, '2020-06-26 10:34:22'),
(8, 'CBC Test 33333', '25000.00', 'Lab-Test-PIC-5ef5b3f654f331.66969429.jpg', 1, '2020-06-26 10:38:14'),
(9, ' Blood Glucose Test 4444', '25000.00', 'Lab-Test-PIC-5ef5b6c63cf449.27238318.jpg', 1, '2020-06-26 10:50:14'),
(10, 'Yve', '200000.00', 'Lab-Test-PIC-5ef5b73a97bc89.63257295.jpg', 1, '2020-06-26 10:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(225) NOT NULL,
  `fullname` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `city` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `status` int(11) NOT NULL,
  `regDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `address`, `city`, `gender`, `email`, `password`, `status`, `regDate`) VALUES
(1, 'Anitha', 'Rwanda', 'Gisenyi', 'female', 'anitha@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2020-06-22 05:45:04'),
(2, 'Charmante', 'Himbi II', 'Goma', 'female', 'charmante@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2020-06-25 21:25:51'),
(3, 'user', 'Gisenyi', 'Gisenyi', 'male', 'user@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, '2020-08-16 11:07:12'),
(4, 'user2', 'Gisenyi', 'Gisenyi', 'male', 'user2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, '2020-08-16 11:09:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked_test`
--
ALTER TABLE `booked_test`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booked_test`
--
ALTER TABLE `booked_test`
  MODIFY `ID` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `ID` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `ID` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
