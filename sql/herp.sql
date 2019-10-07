-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2019 at 12:56 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `herp`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ucode` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `email`, `ucode`, `password`, `hash`, `active`) VALUES
(1, 'milan', 'milan.chhatralia@kjxcbvk.com', 'mcikdbskbc', '$2y$10$nXqw/OR0zQZrddDER4QydOZ/4llpj5D43tgTLOdwq5reS1s/pfpwC', 'a3c65c2974270fd093ee8a9bf8ae7d0b', 1),
(8, 'milan', 'milan.chhatralia@gmail.com', 'mxigwl', '$2y$10$WxF0ulmJAeqyAFKtEgkvNeFLw73LEoagoif1Tn1EC/CJOFwE64ocm', '6cd67d9b6f0150c77bda2eda01ae484c', 1),
(9, 'Milan', 'milan.chhatralia@yahoo.in', 'ckjdskcgk', '$2y$10$B0hjYLNdji.5cg8A6jh4q.5vVoIEhzTsJ4k8byDQAU9vot4BAJmMS', '024d7f84fff11dd7e8d9c510137a2381', 1),
(11, 'vishal', 'sjkdbcaksdn@hmam.com', 'dklnglksne', '$2y$10$FiQrF5inBtSywVCXqVc5nOa8t7urVLbdZSX0hGSY5slrdw4gmR43a', 'fc8001f834f6a5f0561080d134d53d29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(255) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `rfid` varchar(50) NOT NULL,
  `bloodgroup` varchar(5) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `prescription` varchar(255) DEFAULT NULL,
  `medicine` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `firstname`, `lastname`, `email`, `mobile`, `rfid`, `bloodgroup`, `dob`, `address`, `prescription`, `medicine`) VALUES
(2, 'Milan', 'chatralia', 'milan.chhatralia@gmail.com', '8866698692', '02005D1DDE9C', 'o', '2017-10-18', 'fffff', 'need rest', 'abc, xyz, '),
(3, 'neel', 'chhatralia', 'milan.chhatralia@gmail.com', '8866698690', '643433', 'o', '2017-10-26', 'aaaaa', 'svchjashchk', 'perasitamle,abc, xyz, '),
(4, 'zill', 'chhatralia', 'milan.chhatralia@gmail.com', '886669692', '66666', 'o', '2017-10-26', 'awsedfraaa', NULL, NULL),
(5, 'dhawal', 'chhatralia', 'milan.chhatralia@gmaail.com', '1234567890', '12345', 'o', '2017-10-26', 'aaaaa', NULL, NULL),
(6, 'nisarg', 'chhatralia', 'milan.chhatralia@gmail.com', '78956', '98756', 'o', '2017-10-26', 'aaaaaa', NULL, NULL),
(7, 'milan', 'chhatralia', 'milan.chhatralia', '987654321', 'D64JSV286BS', 'O', '1996-08-15', 'vvn', 'abcd', 'escz');

-- --------------------------------------------------------

--
-- Table structure for table `pharma`
--

CREATE TABLE `pharma` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ucode` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reception`
--

CREATE TABLE `reception` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ucode` int(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharma`
--
ALTER TABLE `pharma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reception`
--
ALTER TABLE `reception`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pharma`
--
ALTER TABLE `pharma`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reception`
--
ALTER TABLE `reception`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
