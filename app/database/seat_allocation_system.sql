-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2023 at 06:03 PM
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
-- Database: `seat_allocation_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'mostaqali1998@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `Allocation`
--

CREATE TABLE `Allocation` (
  `allocation_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Allocation`
--

INSERT INTO `Allocation` (`allocation_id`, `student_id`, `room_number`, `hall_id`, `start_date`, `end_date`) VALUES
(2, 2014, 102, 1, '2023-11-12', '2024-04-20'),
(3, 1920016, 102, 1, '2023-11-23', '2023-11-26'),
(4, 2034, 103, 16, '2023-11-09', '2026-10-24'),
(5, 1925005, 101, 3, '2023-11-20', '2025-02-20'),
(6, 2024, 101, 3, '2023-11-15', '2025-07-15'),
(7, 2031, 101, 15, '2023-11-23', '2025-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `Block`
--

CREATE TABLE `Block` (
  `block_id` int(11) NOT NULL,
  `block` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Block`
--

INSERT INTO `Block` (`block_id`, `block`) VALUES
(1, '1/A'),
(2, '2/A'),
(3, '3/A'),
(4, '3/B');

-- --------------------------------------------------------

--
-- Table structure for table `Dept`
--

CREATE TABLE `Dept` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Dept`
--

INSERT INTO `Dept` (`dept_id`, `dept_name`) VALUES
(1, 'IIT'),
(2, 'CSE'),
(3, 'ICT'),
(4, 'MIS'),
(5, 'ICE'),
(6, 'MATH');

-- --------------------------------------------------------

--
-- Table structure for table `Hall`
--

CREATE TABLE `Hall` (
  `hall_id` int(11) NOT NULL,
  `hall_name` varchar(50) NOT NULL,
  `total_seat` int(11) DEFAULT NULL,
  `available_seat` int(11) DEFAULT NULL,
  `total_student` int(11) DEFAULT NULL,
  `block_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Hall`
--

INSERT INTO `Hall` (`hall_id`, `hall_name`, `total_seat`, `available_seat`, `total_student`, `block_id`) VALUES
(1, 'Al Beruni Hall', 1450, 765, 1234, 2),
(3, 'Maulana Vasani Hall', 1000, 200, 800, 2),
(15, 'Banga Bandhu Hall', 780, 105, 670, 3),
(16, 'Shahid Rafiq Jabbar Hall', 1200, 300, 1250, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Room`
--

CREATE TABLE `Room` (
  `room_number` int(11) NOT NULL,
  `bed` int(11) DEFAULT NULL,
  `table_count` int(11) DEFAULT NULL,
  `hall_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Room`
--

INSERT INTO `Room` (`room_number`, `bed`, `table_count`, `hall_id`) VALUES
(101, 4, 4, 1),
(102, 6, 6, 1),
(103, 6, 6, 16),
(104, 4, 4, 15);

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `student_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `session` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`student_id`, `name`, `dept_id`, `session`) VALUES
(2014, 'Mostaq Ali', 1, '2019-20'),
(2024, 'Riaz', 3, '2020-21'),
(2031, 'Rafi ', 4, '2019-20'),
(2034, 'Hasan Mahmud', 5, '2021-22'),
(1920016, 'Alamgir', 2, '2018-19'),
(1925005, 'Prosanto Deb', 2, '2018-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Allocation`
--
ALTER TABLE `Allocation`
  ADD PRIMARY KEY (`allocation_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `room_number` (`room_number`),
  ADD KEY `hall_id` (`hall_id`);

--
-- Indexes for table `Block`
--
ALTER TABLE `Block`
  ADD PRIMARY KEY (`block_id`);

--
-- Indexes for table `Dept`
--
ALTER TABLE `Dept`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `Hall`
--
ALTER TABLE `Hall`
  ADD PRIMARY KEY (`hall_id`),
  ADD KEY `block_id` (`block_id`);

--
-- Indexes for table `Room`
--
ALTER TABLE `Room`
  ADD PRIMARY KEY (`room_number`),
  ADD KEY `hall_id` (`hall_id`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Allocation`
--
ALTER TABLE `Allocation`
  MODIFY `allocation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Allocation`
--
ALTER TABLE `Allocation`
  ADD CONSTRAINT `Allocation_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `Student` (`student_id`),
  ADD CONSTRAINT `Allocation_ibfk_2` FOREIGN KEY (`room_number`) REFERENCES `Room` (`room_number`),
  ADD CONSTRAINT `Allocation_ibfk_3` FOREIGN KEY (`hall_id`) REFERENCES `Hall` (`hall_id`);

--
-- Constraints for table `Hall`
--
ALTER TABLE `Hall`
  ADD CONSTRAINT `Hall_ibfk_1` FOREIGN KEY (`block_id`) REFERENCES `Block` (`block_id`);

--
-- Constraints for table `Room`
--
ALTER TABLE `Room`
  ADD CONSTRAINT `Room_ibfk_1` FOREIGN KEY (`hall_id`) REFERENCES `Hall` (`hall_id`);

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `Student_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `Dept` (`dept_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
