-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2016 at 10:40 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `no_man_sky`
--

-- --------------------------------------------------------

--
-- Table structure for table `creatures`
--

CREATE TABLE `creatures` (
  `id` int(10) NOT NULL,
  `main_image` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `life_type` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `rating` int(10) NOT NULL,
  `date_logged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parent_planet` varchar(50) NOT NULL,
  `parent_type` varchar(50) NOT NULL,
  `diet` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flora`
--

CREATE TABLE `flora` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `diet` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `rating` int(50) NOT NULL,
  `parent_planet` varchar(50) NOT NULL,
  `parent_type` varchar(50) NOT NULL,
  `date_logged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `main_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `galaxy`
--

CREATE TABLE `galaxy` (
  `Id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `no_star_systems` int(10) NOT NULL DEFAULT '0',
  `no_planets` int(10) NOT NULL DEFAULT '0',
  `no_moons` int(10) NOT NULL DEFAULT '0',
  `no_creatures` int(10) NOT NULL DEFAULT '0',
  `no_flora` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `limits`
--

CREATE TABLE `limits` (
  `id` int(4) NOT NULL,
  `galaxy` int(10) NOT NULL,
  `star_systems` int(10) NOT NULL,
  `planets` int(10) NOT NULL,
  `moons` int(10) NOT NULL,
  `creatures` int(10) NOT NULL,
  `flora` int(10) NOT NULL,
  `ships` int(10) NOT NULL,
  `media` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `limits`
--

INSERT INTO `limits` (`id`, `galaxy`, `star_systems`, `planets`, `moons`, `creatures`, `flora`, `ships`, `media`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `type` varchar(15) DEFAULT NULL,
  `file` varchar(30) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `moons`
--

CREATE TABLE `moons` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `star_system` varchar(100) NOT NULL,
  `main_image` varchar(150) NOT NULL,
  `enviroment` varchar(50) NOT NULL,
  `climate` varchar(50) NOT NULL,
  `life_type` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `rating` int(10) NOT NULL,
  `sentinals` varchar(50) NOT NULL,
  `Minerals` varchar(200) NOT NULL,
  `parent_planet` varchar(50) NOT NULL,
  `no_creatures` int(5) NOT NULL DEFAULT '0',
  `no_flora` int(5) NOT NULL DEFAULT '0',
  `extra_image1` varchar(150) NOT NULL,
  `extra_image2` varchar(150) NOT NULL,
  `date_logged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `planets`
--

CREATE TABLE `planets` (
  `id` int(10) NOT NULL,
  `main_image` varchar(150) NOT NULL,
  `name` varchar(100) NOT NULL,
  `star_system` varchar(50) NOT NULL,
  `enviroment` varchar(50) NOT NULL,
  `climate` varchar(50) NOT NULL,
  `life_type` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `rating` int(10) NOT NULL,
  `sentinals` varchar(50) NOT NULL,
  `minerals` varchar(200) NOT NULL,
  `no_moons` int(5) NOT NULL,
  `no_creatures` int(5) NOT NULL DEFAULT '0',
  `no_flora` int(5) NOT NULL DEFAULT '0',
  `extra_image` varchar(150) NOT NULL,
  `extra_image2` varchar(150) NOT NULL,
  `date_logged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ships`
--

CREATE TABLE `ships` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `main_image` varchar(50) NOT NULL,
  `date_logged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `star_systems`
--

CREATE TABLE `star_systems` (
  `ID` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `galaxy` varchar(50) NOT NULL,
  `star_type` varchar(50) DEFAULT NULL,
  `star_colour` varchar(50) DEFAULT NULL,
  `no_planets` int(10) DEFAULT '0',
  `no_moons` int(10) NOT NULL DEFAULT '0',
  `no_creatures` int(10) NOT NULL DEFAULT '0',
  `no_flora` int(10) NOT NULL DEFAULT '0',
  `image` varchar(50) NOT NULL,
  `date_logged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `owner` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`ID`, `name`, `date`, `owner`) VALUES
(1, 'Shanice Lee', '2016-04-22', 'joe'),
(2, 'Joe Sykes', '2016-04-06', 'joe'),
(3, '', '2016-04-30', 'bob'),
(5, '', '2016-05-02', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
