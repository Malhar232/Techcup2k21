-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2021 at 08:48 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techcup2k21`
--

-- --------------------------------------------------------

--
-- Table structure for table `question_list`
--

CREATE TABLE `question_list` (
  `Rounds` int(255) NOT NULL,
  `QID` int(255) NOT NULL,
  `BranchID` int(255) NOT NULL,
  `Question` text NOT NULL,
  `Option1` text NOT NULL,
  `Option2` text NOT NULL,
  `Option3` text NOT NULL,
  `Option4` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_list`
--

INSERT INTO `question_list` (`Rounds`, `QID`, `BranchID`, `Question`, `Option1`, `Option2`, `Option3`, `Option4`) VALUES
(3, 1, 1, 'How are you?', 'Fine', 'Not Fine', 'OK OK', 'Not OK'),
(3, 2, 1, 'What is your name', 'Malhar', 'Shiro', 'Sam', 'None'),
(3, 3, 1, 'Number of pins in 8085', '40', '21', '20', '32');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `Rounds` int(255) NOT NULL,
  `BranchID` int(255) NOT NULL,
  `QID` int(255) NOT NULL,
  `Answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `submitted_papers`
--

CREATE TABLE `submitted_papers` (
  `sr.no` int(255) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `Rounds` int(255) NOT NULL,
  `QID` int(255) NOT NULL,
  `Submitted_Answer` text NOT NULL,
  `Timestamp` text NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submitted_papers`
--

INSERT INTO `submitted_papers` (`sr.no`, `userID`, `Rounds`, `QID`, `Submitted_Answer`, `Timestamp`) VALUES
(9, 'test1', 3, 1, 'Fine', '12:17:46'),
(10, 'test1', 3, 2, 'Malhar', '12:17:46'),
(11, 'test1', 3, 3, '40', '12:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sr.no` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `BranchID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sr.no`, `username`, `passwd`, `BranchID`) VALUES
(3, 'test1', '5a105e8b9d40e1329780d62ea2265d8a', 1),
(4, 'test2', 'ad0234829205b9033196ba818f7a872b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usersession`
--

CREATE TABLE `usersession` (
  `sr.no` int(255) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `IP_address` varchar(255) NOT NULL,
  `isActive` bit(1) NOT NULL,
  `sessionID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `submitted_papers`
--
ALTER TABLE `submitted_papers`
  ADD PRIMARY KEY (`sr.no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sr.no`);

--
-- Indexes for table `usersession`
--
ALTER TABLE `usersession`
  ADD PRIMARY KEY (`sr.no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `submitted_papers`
--
ALTER TABLE `submitted_papers`
  MODIFY `sr.no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sr.no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usersession`
--
ALTER TABLE `usersession`
  MODIFY `sr.no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
