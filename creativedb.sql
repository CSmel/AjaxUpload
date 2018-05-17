-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2018 at 06:25 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `creativedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `commenter`
--

CREATE TABLE `commenter` (
  `id` int(2) NOT NULL,
  `name` varchar(20) NOT NULL,
  `comment` varchar(240) NOT NULL,
  `dateVal` date NOT NULL,
  `timeVal` time NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loginattempts`
--

CREATE TABLE `loginattempts` (
  `userAtempt` varchar(20) NOT NULL,
  `passwordAttempt` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `dt` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `password` varchar(20) NOT NULL,
  `userAdmin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`password`, `userAdmin`) VALUES
('John', '0'),
('password', 'csmel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commenter`
--
ALTER TABLE `commenter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginattempts`
--
ALTER TABLE `loginattempts`
  ADD KEY `idAttempt` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `userID` (`password`(2));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commenter`
--
ALTER TABLE `commenter`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=773;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `attempts_expire` ON SCHEDULE EVERY 5 MINUTE STARTS '2018-01-26 10:38:11' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'clear out the table, this is a test' DO DELETE FROM loginattempts$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
