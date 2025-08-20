-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2025 at 05:23 PM
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
-- Database: `findmystufflog`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `faculty_id` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`admin_id`, `name`, `faculty_id`, `email`, `username`, `status`, `password`, `created_at`) VALUES
(1, 'Cristobal, Adrian Charles', '2022400352', 'cristobaladrian09055@gmail.com', 'admin', 'active', 'admin12345', '2025-08-17 06:50:56'),
(2, 'Banez, Jerald', '2022400312', 'jeraldbanez@gmail.com', 'admin6', 'active', 'admin12345', '2025-08-17 06:50:56'),
(3, 'Mendoza, Mark Aldrin', '2022400452', 'markaldrin@gmail.com', 'admin2', 'active', 'admin12345', '2025-08-17 15:54:46'),
(4, 'Macalinao, Andrei', '2022400452', 'macalinaoandrei@gmail.com', 'admin3', 'active', 'admin12345', '2025-08-17 15:55:35'),
(5, 'Gonzales, Wency', '2022400752', 'wencygon@gmail.com', 'admin5', 'active', 'wency12345', '2025-08-17 16:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year_level` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `student_id`, `name`, `email`, `course`, `year_level`, `date_created`) VALUES
(1, 'TEST123', 'Test User', 'test@example.com', 'Test Course', '1', '2025-08-09 02:18:43'),
(2, 'TEST123', 'Test User', 'test@example.com', 'Test Course', '1', '2025-08-09 02:18:43'),
(3, 'TEST123', 'Test User', 'test@example.com', 'Test Course', '1', '2025-08-09 02:18:44'),
(4, 'TEST123', 'Test User', 'test@example.com', 'Test Course', '1', '2025-08-09 02:18:44'),
(5, '2022400352', 'Cristobal, Adrian Charles A.', 'cristobaladrian09055@gmail.com', 'BSIT', '4A', '2025-08-09 02:18:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
