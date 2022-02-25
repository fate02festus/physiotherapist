-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2022 at 01:06 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `physiodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `idno` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `middlename`, `lastname`, `phone`, `idno`, `dob`, `gender`) VALUES
('002', 'TRACY@GMAIL.COM', '21232f297a57a5a743894a0e4a801fc3', 'TRACY', 'K', 'DANIELS', '0732165401', '32101232', '0000-00-00', 'Male'),
('AD0001', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Super', 'a', 'Administrator', '0705767676', '21548787', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `patient` varchar(20) NOT NULL,
  `room` varchar(30) NOT NULL,
  `physio` varchar(20) NOT NULL,
  `hall` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient`, `room`, `physio`, `hall`, `date`, `status`) VALUES
(1, '1', '1', '1', 'Hall B', '2022-02-25', '2'),
(2, '2', '2', '002', 'Hall B', '2022-02-26', '2'),
(3, '2', '1', '1', 'Hall B', '2022-02-17', '1');

-- --------------------------------------------------------

--
-- Table structure for table `app_status`
--

CREATE TABLE `app_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_status`
--

INSERT INTO `app_status` (`id`, `name`, `description`) VALUES
(1, 'SCHEDULED', 'SCHEDULED'),
(2, 'ONGOING', 'ongoing'),
(3, 'COMPLETE', 'DONE');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `idno` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `firstname`, `middlename`, `lastname`, `phone`, `idno`, `address`, `gender`, `dob`) VALUES
(1, 'festus', 'k', 'mutiso', '0721548787', '32548721', 'nairobi', 'Male', '0000-00-00'),
(2, 'Amina', 'T', 'Yane', '0732548787', '21548787', 'nairobi', 'Female', '1999-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `physiotherapist`
--

CREATE TABLE `physiotherapist` (
  `id` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `idno` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `physiotherapist`
--

INSERT INTO `physiotherapist` (`id`, `username`, `password`, `firstname`, `middlename`, `lastname`, `phone`, `idno`, `dob`, `gender`) VALUES
('002', 'steve@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Stephen', 'M', 'Kasolo', '0721548787', '32548787', '0000-00-00', 'Male'),
('003', 'marion@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Marion', 'o', 'Ochieng', '0721659898', '21548755', '0000-00-00', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `hall` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `physio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `hall`, `description`, `physio`) VALUES
(1, 'ROOM 01', 'Hall B', 'dtkfjkj', '1'),
(2, 'ROOM 02', 'Hall B', 'dtkfjkj', '002'),
(3, 'ROOM 03', 'Hall A', 'dtkfjkj', '003');

-- --------------------------------------------------------

--
-- Table structure for table `system_master`
--

CREATE TABLE `system_master` (
  `item` varchar(50) NOT NULL,
  `last_number` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_master`
--

INSERT INTO `system_master` (`item`, `last_number`, `length`, `id`) VALUES
('admin', 3, 3, 1),
('physio', 3, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(4, 'TRACY@GMAIL.COM', '', 1),
(5, 'mutiso@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1),
(6, 'danson@gmail.com', '', 2),
(7, 'steve@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 2),
(8, 'marion@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_status`
--
ALTER TABLE `app_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `physiotherapist`
--
ALTER TABLE `physiotherapist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `app_status`
--
ALTER TABLE `app_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
