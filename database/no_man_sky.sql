-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2016 at 06:26 AM
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
(1, '12512704_10208425564216030_7197577395550368907_n.j', 'Giraffe', 'Land', 'Large', 8, '2016-06-05 03:12:13', 'Earth', 'Planet', 'Herbivore'),
(2, '', 'Xuimin', 'Land', 'Small', 8, '2016-06-05 03:40:36', 'Kyungsoo', 'Moon', 'Omnivore'),
(3, '', 'Hyolyn', 'Air', 'Medium', 10, '2016-06-05 03:42:24', 'CL', 'Planet', 'Herbivore'),
(4, '', 'Heize', 'Sea', 'Tiny', 10, '2016-06-05 03:43:24', 'Hyuna', 'Moon', 'Carnivore'),
(5, '', 'Zelo', 'Air', 'Huge', 10, '2016-06-05 03:44:18', 'Jinhong', 'Planet', 'Omnivore'),
(6, '', 'Akamaru', 'Land', 'Tiny', 5, '2016-06-05 04:24:45', 'Kiba Inuzuka', 'Moon', 'Herbivore');

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
(1, 'Sad Plant', 'Herbivore', 'Small', 6, 'Sad planet', '', '2016-06-05 03:21:47', '12512704_10208425564216030_7197577395550368907_n.jpg'),
(2, 'Unni', 'Carnivore', 'Large', 6, 'CL', 'Planet', '2016-06-05 03:45:33', ''),
(3, 'Pix', 'Herbivore', 'Small', 4, 'Lee Hi', 'Moon', '2016-06-05 03:46:25', '');

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
(1, 'Milky Way', 1, 2, 0, 1, 0),
(2, 'Andromada', 1, 1, 0, 0, 1),
(3, 'Double A', 3, 7, 4, 4, 2),
(4, 'The Hidden Leaf', 4, 4, 12, 1, 0);

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
(1, 4, 9, 14, 16, 6, 3, 1);

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
(1, 'Kyungsoo', 'Eunhyuk', '', 'Toxic', 'Temperate', 'None', 'Small', 9, 'Large Waves', '', 'Heechul', 1, 0, '', '', '2016-06-05 03:35:21'),
(2, 'Hyuna', 'Bom', '', 'Hot', 'Tropical', 'Basic', 'Medium', 7, 'Huge Waves', '', 'CL', 1, 0, '', '', '2016-06-05 03:36:48'),
(3, 'Nakta', 'Aoora', '', 'Normal', 'Temperate', 'None', 'Large', 6, 'Small Waves', 'Camels', 'Hyanggi', 0, 0, '', '', '2016-06-05 03:38:05'),
(4, 'Lee Hi', 'Bom', '', 'Normal', 'Mediterranean', 'Basic', 'Medium', 4, 'Medium Waves', '', 'CL', 0, 1, '', '', '2016-06-05 03:39:12'),
(5, 'Naruto Uzamaki', 'Team Seven', '', 'Normal', 'Tropical', 'None', 'Tiny', 10, 'None', '', 'Kakashi', 0, 0, '', '', '2016-06-05 04:02:43'),
(6, 'Sasuke Uchiha', 'Team Seven', '', 'Normal', 'Tropical', 'None', 'Tiny', 10, 'None', '', 'Kakashi', 0, 0, '', '', '2016-06-05 04:03:55'),
(7, 'Sakura Haruno', 'Team Seven', '', 'Normal', 'Tropical', 'None', 'Tiny', 6, 'None', '', 'Kakashi', 0, 0, '', '', '2016-06-05 04:04:30'),
(8, 'Shikamaru Nara', 'Team Ten', '', 'Normal', 'Tropical', 'None', 'Tiny', 7, 'None', '', 'Asuma', 0, 0, '', '', '2016-06-05 04:05:44'),
(9, 'Ino Yamanaka', 'Team Ten', '', 'Normal', 'Tropical', 'None', 'Tiny', 5, 'None', '', 'Asuma', 0, 0, '', '', '2016-06-05 04:06:16'),
(10, 'Choji Akamichi', 'Team Ten', '', 'Normal', 'Tropical', 'None', 'Tiny', 6, 'None', '', 'Asuma', 0, 0, '', '', '2016-06-05 04:06:47'),
(11, 'Hinata Hyuga', 'Team Eight', '', 'Normal', 'Tropical', 'None', 'Tiny', 7, 'None', '', 'Kurenai', 0, 0, '', '', '2016-06-05 04:08:29'),
(12, 'Kiba Inuzuka', 'Team Eight', '', 'Normal', 'Tropical', 'None', 'Tiny', 5, 'None', '', 'Kurenai', 1, 0, '', '', '2016-06-05 04:09:05'),
(13, 'Shino Aburame', 'Team Eight', '', 'Normal', 'Tropical', 'None', 'Tiny', 5, 'None', '', 'Kurenai', 0, 0, '', '', '2016-06-05 04:09:47'),
(14, 'Rock Lee', 'Team Guy', '', 'Normal', 'Tropical', 'None', 'Tiny', 8, 'None', '', 'Guy', 0, 0, '', '', '2016-06-05 04:11:02'),
(15, 'Neji Hyuga', 'Team Guy', '', 'Normal', 'Tropical', 'None', 'Tiny', 7, 'None', '', 'Guy', 0, 0, '', '', '2016-06-05 04:12:04'),
(16, 'Tenten', 'Team Guy', '', 'Normal', 'Tropical', 'None', 'Tiny', 4, 'None', '', 'Guy', 0, 0, '', '', '2016-06-05 04:12:29');

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
(1, '12512704_10208425564216030_7197577395550368907_n.jpg', 'Earth', 'The Solar System', 'Normal', 'Tropical', 'Complex', 'Medium', 8, 'Huge Waves', 'Lots of minerals', 0, 1, 0, 'mountains1.jpg', 'mum.jpg', '2016-06-05 03:07:24'),
(2, '', 'Saturn', 'The Solar System', 'Toxic', 'Sub Arctic', 'None', 'Large', 8, 'None', '', 0, 0, 0, '', '', '2016-06-05 03:11:39'),
(3, '12512704_10208425564216030_7197577395550368907_n.jpg', 'Sad planet', 'Sad Star', 'Cold', 'Highland', 'Basic', 'Large', 6, 'Medium Waves', 'lots and Lots', 0, 0, 1, 'mountains1.jpg', 'mum.jpg', '2016-06-05 03:20:29'),
(4, '', 'Hyanggi', 'Aoora', 'Toxic', 'Dessert', 'None', 'Tiny', 1, 'Huge Waves', '', 1, 0, 0, '', '', '2016-06-05 03:27:11'),
(5, '', 'Woosang', 'Aoora', 'Hot', 'Savannah', 'Complex', 'Medium', 9, 'Medium Waves', 'Doughnut', 0, 0, 0, '', '', '2016-06-05 03:28:23'),
(6, '', 'Hoik', 'Aoora', 'Normal', 'Highland', 'Complex', 'Small', 7, 'Small Waves', 'Glasses', 0, 0, 0, '', '', '2016-06-05 03:29:24'),
(7, '', 'John', 'Aoora', 'Normal', 'Humid Subtropical', 'Basic', 'Medium', 1, 'Small Waves', 'Chicken Breast', 0, 0, 0, '', '', '2016-06-05 03:30:28'),
(8, '', 'Jinhong', 'Aoora', 'Normal', 'Savannah', 'Bacterial', 'Tiny', 6, 'Small Waves', 'Babies', 0, 1, 0, '', '', '2016-06-05 03:31:19'),
(9, '', 'CL', 'Bom', 'Hot', 'Mediterranean', 'Complex', 'Huge', 8, 'Large Waves', 'Gbz', 2, 1, 1, '', '', '2016-06-05 03:32:45'),
(10, '', 'Heechul', 'Eunhyuk', 'Cold', 'Sub Zero', 'Complex', 'Huge', 9, 'Huge Waves', 'Cats', 1, 0, 0, '', '', '2016-06-05 03:34:03'),
(11, '', 'Kakashi', 'Team Seven', 'Normal', 'Tropical', 'None', 'Tiny', 8, 'None', '', 3, 0, 0, '', '', '2016-06-05 04:02:04'),
(12, '', 'Asuma', 'Team Ten', 'Normal', 'Tropical', 'None', 'Tiny', 7, 'None', '', 3, 0, 0, '', '', '2016-06-05 04:05:15'),
(13, '', 'Kurenai', 'Team Eight', 'Normal', 'Tropical', 'None', 'Tiny', 6, 'None', '', 3, 0, 0, '', '', '2016-06-05 04:07:42'),
(14, '', 'Guy', 'Team Guy', 'Normal', 'Tropical', 'None', 'Tiny', 7, 'None', '', 3, 0, 0, '', '', '2016-06-05 04:10:33');

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
(1, 'Cheesecake', 'Explorer', '');

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
(1, 'The Solar System', 'Milky Way', 2, 0, 1, 0, 'no_mans_sky.png', '2016-06-05 03:03:56'),
(2, 'Sad Star', 'Andromada', 1, 0, 0, 1, '12512704_10208425564216030_7197577395550368907_n.j', '2016-06-05 03:19:02'),
(3, 'Aoora', 'Double A', 5, 1, 1, 0, 'no_mans_sky.png', '2016-06-05 03:23:05'),
(4, 'Bom', 'Double A', 1, 2, 2, 2, '', '2016-06-05 03:23:36'),
(5, 'Eunhyuk', 'Double A', 1, 1, 1, 0, '', '2016-06-05 03:24:00'),
(6, 'Team Seven', 'The Hidden Leaf', 4, 3, 0, 0, '', '2016-06-05 03:50:21'),
(7, 'Team Ten', 'The Hidden Leaf', 1, 3, 0, 0, '', '2016-06-05 03:51:05'),
(8, 'Team Eight', 'The Hidden Leaf', 1, 3, 1, 0, '', '2016-06-05 04:07:05'),
(9, 'Team Guy', 'The Hidden Leaf', 1, 3, 0, 0, '', '2016-06-05 04:10:08');

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
(5, 'Team Eight', '2016-05-02', 'moons');

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
