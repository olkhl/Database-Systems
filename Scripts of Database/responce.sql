-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2016 at 08:07 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knowit`
--

-- --------------------------------------------------------

--
-- Table structure for table `responce`
--

CREATE TABLE `responce` (
  `request_id` int(11) NOT NULL,
  `money` float NOT NULL,
  `tutor_username` varchar(100) NOT NULL,
  `accepted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `responce`
--

INSERT INTO `responce` (`request_id`, `money`, `tutor_username`, `accepted`) VALUES
(21, 20, 'mona.rizvi', 0),
(21, 19.5, 'SuperSain', 0),
(23, 25, 'mona.rizvi', 0),
(23, 20, 'SuperSain', 0),
(24, 28, 'rustem.takhanov', 0),
(25, 45, 'jasoncarr', 0),
(26, 43, 'jasoncarr', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `responce`
--
ALTER TABLE `responce`
  ADD PRIMARY KEY (`request_id`,`tutor_username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
