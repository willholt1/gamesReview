-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2020 at 11:40 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `games-reviewdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activereviews`
--

CREATE TABLE `activereviews` (
  `ID` int(11) NOT NULL,
  `GameName` varchar(250) NOT NULL,
  `GameBlurb` longtext NOT NULL,
  `GameReview` longtext NOT NULL,
  `GameComments_YN` varchar(1) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `ReviewImage` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `activereviews`
--

INSERT INTO `activereviews` (`ID`, `GameName`, `GameBlurb`, `GameReview`, `GameComments_YN`, `slug`, `ReviewImage`) VALUES
(1, 'Borderlands 3', 'This text was retrieved from the database.', 'This is a test review of the game.', 'Y', 'borderlands-3', 'borderlands-3.jpg'),
(2, 'Days Gone', 'Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. Days Gone Blurb. ', 'days gone review. days gone review. days gone review. days gone review. days gone review. days gone review. days gone review. days gone review. days gone review. days gone review. days gone review. days gone review. days gone review. days gone review. days gone review. days gone review. days gone review. days gone review. days gone review. ', 'Y', 'days-gone', 'days-gone.jpg'),
(3, 'testing this site', 'Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb Blurb.', 'This is a test review of the game. This is a test review of the game. This is a test review of the game. This is a test review of the game. This is a test review of the game. This is a test review of the game. This is a test review of the game. This is a test review of the game. This is a test review of the game. This is a test review of the game. This is a test review of the game. This is a test review of the game. This is a test review of the game. This is a test review of the game. This is a test review of the game. This is a test review of the game.', 'Y', 'test', 'mmu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gamescomments`
--

CREATE TABLE `gamescomments` (
  `UID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ReviewID` int(11) NOT NULL,
  `UserComment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `gamescomments`
--

INSERT INTO `gamescomments` (`UID`, `UserID`, `ReviewID`, `UserComment`) VALUES
(1, 1, 1, 'This is a comment that was generated manually in the database.'),
(29, 2, 1, 'test comment'),
(30, 2, 2, 'test comment for days gone'),
(31, 2, 3, 'test comment for this isn\'t a game');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UID` int(11) NOT NULL,
  `UserName` varchar(250) NOT NULL,
  `UserPassword` varchar(250) NOT NULL,
  `DarkMode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UID`, `UserName`, `UserPassword`, `DarkMode`) VALUES
(1, 'Lecturer', 'Example', 1),
(2, 'Anon', 'shouldntbeabletosigninasthisusersothepasswordisstupidlong', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activereviews`
--
ALTER TABLE `activereviews`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `gamescomments`
--
ALTER TABLE `gamescomments`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `UID` (`UID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `UID` (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activereviews`
--
ALTER TABLE `activereviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gamescomments`
--
ALTER TABLE `gamescomments`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
