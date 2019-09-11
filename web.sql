-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2019 at 05:42 AM
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
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lName` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `firstName`, `lName`, `position`) VALUES
(2, 'user1', 'user1', 'Manik', 'Samarajeewa', 'User'),
(3, 'user2', 'user2', 'Dulshan', 'Wijenayake', 'User'),
(4, 'user3', 'user3', 'Usitha', 'Ruupe', 'User'),
(7, 'saman', 'saman', 'Saman', 'Indika', 'User'),
(10, 'admin', 'admin', 'Akila', 'Devinda', 'Super User'),
(11, 'staff1', 'Staffstaff1', 'raam', 'vijay', 'staff'),
(12, 'Manager', 'Managermanager1', 'lomba', 'lomba', 'Manager'),
(13, 'amir', 'Amiramiramir1', 'amir', 'khan', '');

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  `author` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`, `author`) VALUES
(32, 'Awissawella', 'High Fire', 6.956418, 80.200195, 'High', 'user2'),
(48, 'Wattala', 'Fire', 7.005490, 79.898071, 'Medium', 'chamika'),
(39, 'Gampaha', 'Flood', 7.088628, 80.028534, 'High', 'saman'),
(102, 'colombo', 'fh', 6.922738, 80.069939, 'High', 'user1'),
(103, 'colombo', 'fh', 6.922738, 80.069939, 'High', 'user1'),
(76, 'djkkvdv', 'sdvsdvsd', 7.085212, 80.163322, 'Medium', 'sdlv');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Body` varchar(400) NOT NULL,
  `Image` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `FirstName`, `Username`, `Title`, `Body`, `Image`) VALUES
(13, 'Raam', 'user1', 'Garbage Problems', 'Air pollution and water pollution are challenges for Sri Lanka since both cause negative health impacts. Insufficient waste management, especially in rural areas, leads to environmental pollution.Industrialization and population growth are major drivers of these environmental issues', 'onegarbage-647_091017065016_0.jpeg'),
(14, 'saman', 'saman', 'Wastage recycle', 'Recycling is the process of converting waste materials into new materials and objects. ... Recycling can prevent the waste of potentially useful materials and reduce the consumption of fresh raw materials, thereby reducing: energy usage, air pollution (from incineration), and water pollution (from landfilling).', 'onedownload.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `normaluser`
--

CREATE TABLE `normaluser` (
  `id` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `post` varchar(50) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `superuser`
--

CREATE TABLE `superuser` (
  `ID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superuser`
--

INSERT INTO `superuser` (`ID`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tempmarkers`
--

CREATE TABLE `tempmarkers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  `author` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempmarkers`
--

INSERT INTO `tempmarkers` (`id`, `name`, `address`, `lat`, `lng`, `type`, `author`) VALUES
(42, 'Ahaliyagoda', 'Flood', 6.839170, 80.278473, 'Medium', 'user1'),
(54, 'matale', 'afsdfsdf', 7.092026, 80.174309, 'High', 'user1'),
(76, 'djkkvdv', 'sdvsdvsd', 7.085212, 80.163322, 'Medium', 'sdlv');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(9, 'Akila', 'Colomob', 6.924843, 79.858505, 'bar'),
(10, 'sssssss', 'ggggg', 6.838081, 79.895584, 'restaurant'),
(11, 'Fuck', 'Fuck Aise', 6.931336, 79.853569, 'High'),
(12, 'Colombo', 'Danne na', 6.908427, 79.863739, 'Low'),
(13, 'Awissawella', 'Fuck', 6.931603, 80.101318, 'Low');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `normaluser`
--
ALTER TABLE `normaluser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superuser`
--
ALTER TABLE `superuser`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tempmarkers`
--
ALTER TABLE `tempmarkers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `normaluser`
--
ALTER TABLE `normaluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `superuser`
--
ALTER TABLE `superuser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tempmarkers`
--
ALTER TABLE `tempmarkers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
