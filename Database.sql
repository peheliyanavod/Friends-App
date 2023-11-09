-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2023 at 03:55 PM
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
-- Database: `friend app`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `friendID` int(6) NOT NULL,
  `friendEmail` varchar(50) NOT NULL,
  `profileName` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `numberOfFriends` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`friendID`, `friendEmail`, `profileName`, `password`, `numberOfFriends`) VALUES
(1, 'a@gmail.com', 'a', 'aa123', 0),
(2, 'navod@gmail.com', 'navod', 'navod123', 18),
(3, 'peheliya@gmail.com', 'peheliya', 'pehe123', 5),
(4, 'rusiru@gmail.com', 'rusiru', 'r123', 3),
(5, 'danuka@gmail.com', 'danuka', 'danu123', 1),
(6, 'chamod@gmail.com', 'chamodh', 'chamo123', 0),
(7, 'bashana@gmail.com', 'bashana', 'bash123', 0),
(8, 'sadeep@gmail.com', 'sadeep', 'sadeep123', 0),
(9, 'batheesha@gmail.com', 'batheesha', 'bath123', 0),
(10, 'shashinda@gmail.com', 'shashinda', 'shashi123', 0),
(11, 'dileeban@gmail.com', 'dileeban', 'dil123', 0),
(12, 'sevindu@gmail.com', 'sevindu', 'sevi123', 0),
(13, 'thusitha@gmail.com', 'thusitha', 'thusi123', 0),
(14, 'sathish@gmail.com', 'sathish', 'sathish123', 2),
(15, 'hahh@hh', 'sas', 'asa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `myfriends`
--

CREATE TABLE `myfriends` (
  `friendID_1` int(6) NOT NULL,
  `friendID_2` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `myfriends`
--

INSERT INTO `myfriends` (`friendID_1`, `friendID_2`) VALUES
(5, 3),
(14, 4),
(14, 2),
(3, 1),
(3, 2),
(3, 4),
(3, 6),
(3, 8),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 3),
(2, 3),
(2, 1),
(2, 1),
(2, 9),
(2, 9),
(2, 12),
(2, 13),
(2, 13),
(2, 14),
(2, 14),
(2, 8),
(2, 8),
(2, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`friendID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `friendID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
