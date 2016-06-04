-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2016 at 12:48 AM
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

--
-- Dumping data for table `creatures`
--

INSERT INTO `creatures` (`id`, `main_image`, `name`, `life_type`, `size`, `rating`, `date_logged`, `parent_planet`, `parent_type`, `diet`) VALUES
(1, '', 'Zebra', 'Land', 'Medium', 9, '2016-05-30 17:47:03', 'Earth', '', 'Herbivore'),
(2, '', 'Little Green Men', 'Land', 'Small', 2, '2016-05-30 17:47:42', 'The Moon', '', 'Omnivore'),
(3, '', 'Zoprs', 'Air', 'Huge', 9, '2016-05-30 17:48:06', 'Kepteyn C', '', 'Carnivore'),
(4, '', 'Robots', 'Land', 'Medium', 6, '2016-05-30 17:48:30', 'Mars', '', 'Omnivore'),
(5, '12512704_10208425564216030_7197577395550368907_n.j', 'Lion', 'Land', 'Medium', 8, '2016-05-30 18:08:09', 'Earth', '', 'Carnivore'),
(6, '', 'Lee', 'Land', 'Small', 10, '2016-05-30 18:24:55', 'ganymede', '', 'Omnivore'),
(7, '', 'Pigeon', 'Air', 'Tiny', 4, '2016-05-30 19:09:34', 'Earth', '', 'Omnivore'),
(8, '', 'Giraffe', 'Land', 'Large', 7, '2016-06-04 18:40:22', 'Earth', 'Planet', 'Herbivore'),
(9, '', 'Zorg', 'Air', 'Medium', 6, '2016-06-04 18:41:01', 'Kapteyns Moon', 'Moon', 'Carnivore'),
(10, '', 'Bell Creature', 'Land', 'Tiny', 1, '2016-06-04 22:08:32', 'Bell Planet', 'Planet', 'Herbivore'),
(11, '', 'Meerkat', 'Land', 'Small', 4, '2016-06-04 22:31:38', 'Earth', 'Planet', 'Carnivore'),
(12, '', 'maoslso', 'Land', 'Tiny', 1, '2016-06-04 22:32:43', 'Bell Moon', 'Moon', 'Herbivore');

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

--
-- Dumping data for table `flora`
--

INSERT INTO `flora` (`id`, `name`, `diet`, `size`, `rating`, `parent_planet`, `parent_type`, `date_logged`, `main_image`) VALUES
(1, 'Sunflower', 'Herbivore', 'Small', 5, 'Earth', '', '2016-06-01 05:53:29', 'mountains1.jpg'),
(2, 'Rose', 'Herbivore', 'Small', 6, 'Earth', '', '2016-06-01 05:58:18', '12512704_10208425564216030_7197577395550368907_n.j'),
(3, 'test Flora', 'Omnivore', 'Medium', 9, 'Kapteyns Moon', '', '2016-06-01 05:59:27', 'mum.jpg'),
(4, 'Planty', 'Carnivore', 'Small', 7, 'ganymede', 'Moon', '2016-06-04 18:46:03', ''),
(5, 'planty', 'Herbivore', 'Medium', 8, 'ganymede', 'Moon', '2016-06-04 18:46:24', ''),
(6, 'dandy', 'Omnivore', 'Large', 2, 'Kapteyn B', 'Planet', '2016-06-04 18:47:05', ''),
(7, 'Bell Flora', 'Herbivore', 'Tiny', 1, 'Bell Moon', 'Moon', '2016-06-04 22:08:50', ''),
(8, 'Moon Rock', 'Herbivore', 'Tiny', 1, 'The Moon', 'Moon', '2016-06-04 22:41:57', ''),
(9, 'Planty Mcplanterson', 'Herbivore', 'Tiny', 1, 'Kapteyn B', 'Planet', '2016-06-04 22:43:52', ''),
(10, 'Grass', 'Herbivore', 'Small', 1, 'Bell Planet', 'Planet', '2016-06-04 22:45:05', '');

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

--
-- Dumping data for table `galaxy`
--

INSERT INTO `galaxy` (`Id`, `name`, `no_star_systems`, `no_planets`, `no_moons`, `no_creatures`, `no_flora`) VALUES
(1, 'Milky Way', 2, 1, 1, 1, 2),
(2, 'AndromadA', 1, 1, 1, 1, 1),
(3, 'coulnet', 0, 0, 0, 0, 0);

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
  `ships` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `limits`
--

INSERT INTO `limits` (`id`, `galaxy`, `star_systems`, `planets`, `moons`, `creatures`, `flora`, `ships`) VALUES
(1, 3, 3, 10, 7, 12, 10, 2);

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

--
-- Dumping data for table `moons`
--

INSERT INTO `moons` (`id`, `name`, `star_system`, `main_image`, `enviroment`, `climate`, `life_type`, `size`, `rating`, `sentinals`, `Minerals`, `parent_planet`, `no_creatures`, `no_flora`, `extra_image1`, `extra_image2`, `date_logged`) VALUES
(1, 'The Moon', 'The Solar System', '', 'Cold', 'Sub Zero', 'None', 'Tiny', 4, 'None', '', 'Earth', 1, 1, '', '', '2016-05-30 17:32:47'),
(2, 'Europa', 'The Solar System', '', 'Normal', 'Tropical', 'None', 'Tiny', 1, 'None', '', 'Jupiter', 0, 0, '', '', '2016-05-30 17:33:20'),
(3, 'ganymede', 'The Solar System', '', 'Normal', 'Tropical', 'None', 'Tiny', 1, 'None', '', 'Jupiter', 1, 2, '', '', '2016-05-30 17:33:40'),
(4, 'Kapteyns Moon', 'Kapteyns Star', '', 'Normal', 'Tropical', 'None', 'Tiny', 1, 'None', '', 'Kapteyn B', 1, 1, '', '', '2016-05-30 17:35:43'),
(5, 'Mooney Moon', 'The Solar System', 'no_mans_sky.png', 'Cold', 'Mediterranean', 'Basic', 'Medium', 8, 'Medium Waves', 'mineral mineral', 'Pluto', 0, 0, 'mountains1.jpg', 'mum.jpg', '2016-06-04 21:39:42'),
(6, 'Monest', 'The Solar System', '', 'Normal', 'Tropical', 'None', 'Tiny', 1, 'None', '', 'Saturn', 0, 0, '', '', '2016-06-04 22:03:45'),
(7, 'Bell Moon', 'Bell Star', '', 'Normal', 'Tropical', 'None', 'Tiny', 1, 'None', '', 'Bell Planet', 1, 1, '', '', '2016-06-04 22:08:13');

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

--
-- Dumping data for table `planets`
--

INSERT INTO `planets` (`id`, `main_image`, `name`, `star_system`, `enviroment`, `climate`, `life_type`, `size`, `rating`, `sentinals`, `minerals`, `no_moons`, `no_creatures`, `no_flora`, `extra_image`, `extra_image2`, `date_logged`) VALUES
(1, '', 'Mercury', 'The Solar System', 'Hot', 'Dessert', 'None', 'Tiny', 5, 'None', '', 0, 0, 0, '', '', '2016-05-30 17:30:10'),
(2, '', 'Venus', 'The Solar System', 'Hot', 'Dessert', 'None', 'Small', 5, 'None', '', 0, 0, 0, '', '', '2016-05-30 17:30:34'),
(3, '', 'Earth', 'The Solar System', 'Normal', 'Tropical', 'Complex', 'Small', 9, 'None', '', 1, 5, 2, '', '', '2016-05-30 17:30:56'),
(4, '', 'Jupiter', 'The Solar System', 'Toxic', 'Dessert', 'None', 'Large', 7, 'None', '', 2, 0, 0, '', '', '2016-05-30 17:31:29'),
(5, '', 'Mars', 'The Solar System', 'Normal', 'Dessert', 'None', 'Small', 5, 'None', '', 0, 1, 0, '', '', '2016-05-30 17:31:55'),
(6, '', 'Kapteyn B', 'Kapteyns Star', 'Normal', 'Tropical', 'None', 'Tiny', 1, 'None', '', 1, 2, 2, '', '', '2016-05-30 17:35:07'),
(7, '', 'Kepteyn C', 'Kapteyns Star', 'Normal', 'Tropical', 'None', 'Tiny', 1, 'None', '', 0, 1, 0, '', '', '2016-05-30 17:35:19'),
(8, '', 'Saturn', 'The Solar System', 'Toxic', 'Mediterranean', 'None', 'Large', 6, 'None', '', 1, 0, 0, '', '', '2016-05-30 17:59:56'),
(9, '', 'Pluto', 'The Solar System', 'Cold', 'Sub Zero', 'None', 'Tiny', 4, 'None', '', 1, 0, 0, '', '', '2016-06-04 18:57:46'),
(10, '', 'Bell Planet', 'Bell Star', 'Normal', 'Tropical', 'None', 'Tiny', 1, 'None', '', 1, 1, 1, '', '', '2016-06-04 22:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `ships`
--

CREATE TABLE `ships` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `main_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ships`
--

INSERT INTO `ships` (`id`, `name`, `type`, `main_image`) VALUES
(1, 'Galactica', 'Scientific', 'mountains1.jpg'),
(2, 'The queen Lee', 'Combat', 'mum.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `star_systems`
--

CREATE TABLE `star_systems` (
  `ID` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `galaxy` varchar(50) NOT NULL,
  `no_planets` int(10) NOT NULL,
  `no_moons` int(10) NOT NULL DEFAULT '0',
  `no_creatures` int(10) NOT NULL DEFAULT '0',
  `no_flora` int(10) NOT NULL DEFAULT '0',
  `image` varchar(50) NOT NULL,
  `date_logged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `star_systems`
--

INSERT INTO `star_systems` (`ID`, `name`, `galaxy`, `no_planets`, `no_moons`, `no_creatures`, `no_flora`, `image`, `date_logged`) VALUES
(1, 'The Solar System', 'Milky Way', 7, 1, 1, 1, 'mountains1.jpg', '2016-05-30 17:29:45'),
(2, 'Kapteyns Star', 'Milky Way', 2, 0, 0, 1, 'Upload image is empty', '2016-05-30 17:34:40'),
(3, 'Bell Star', 'AndromadA', 1, 1, 1, 1, 'Upload image is empty', '2016-06-04 22:06:42');

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
(5, 'Bell Star', '2016-05-02', 'planets');

-- --------------------------------------------------------

--
-- Table structure for table `test2`
--

CREATE TABLE `test2` (
  `planet_id` int(5) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `enviroment` varchar(100) NOT NULL,
  `life_type` varchar(50) NOT NULL,
  `size` varchar(10) NOT NULL,
  `rating` int(10) NOT NULL,
  `sentinels` varchar(10) NOT NULL,
  `date_discovered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test2`
--

INSERT INTO `test2` (`planet_id`, `image`, `name`, `enviroment`, `life_type`, `size`, `rating`, `sentinels`, `date_discovered`) VALUES
(1, 'test.png', 'test', 'ice', 'complex', 'large', 7, 'yes', '2016-05-09'),
(2, 'test2.png', 'balari', 'hot', 'none', 'small', 5, 'no', '2016-05-05'),
(3, 'test3.png', 'bla', 'toxic', 'complex', 'large', 5, 'no', '2016-05-01'),
(6, 'test4.png', 'tester', 'hot', 'none', 'small', 9, 'yes', '2016-05-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
