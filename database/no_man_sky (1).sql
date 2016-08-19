-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2016 at 11:29 PM
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
(1, 'Chreog.png', 'Chreog', 'Land', 'Small', 6, '2016-08-10 03:01:07', 'Paragon', 'Planet', 'Herbivore'),
(2, 'John.png', 'John', 'Land', 'Small', 8, '2016-08-10 03:01:48', 'Paragon', 'Planet', 'Herbivore'),
(3, 'Drundelese.png', 'Drundelese', 'Land', 'Medium', 7, '2016-08-10 15:34:17', 'Iryugarazak', 'Moon', 'Herbivore'),
(4, 'Duloic.png', 'Duloic', 'Land', 'Small', 7, '2016-08-10 15:35:26', 'Iryugarazak', 'Moon', 'Herbivore'),
(5, 'Zetmoic.png', 'Zetmoic', 'Land', 'Small', 8, '2016-08-10 15:36:12', 'Iryugarazak', 'Moon', 'Herbivore'),
(6, 'Upek.png', 'Upek', 'Air', 'Tiny', 6, '2016-08-10 15:37:01', 'Iryugarazak', 'Moon', 'Carnivore'),
(7, 'Rexy.png', 'Rexy', 'Land', 'Small', 7, '2016-08-11 03:55:48', 'Cubeo', 'Planet', 'Herbivore'),
(8, 'Scampers.png', 'Scampers', 'Land', 'Small', 6, '2016-08-11 03:56:31', 'Cubeo', 'Planet', 'Herbivore'),
(9, 'Ebrun.png', 'Ebrun', 'Land', 'Medium', 7, '2016-08-11 03:57:05', 'Cubeo', 'Planet', 'Herbivore'),
(10, 'Jabber.png', 'Jabber', 'Land', 'Tiny', 9, '2016-08-11 04:04:14', 'Wunicolmas-Davins', 'Moon', 'Herbivore'),
(11, 'Piney.png', 'Piney', 'Land', 'Medium', 9, '2016-08-11 04:05:01', 'Wunicolmas-Davins', 'Moon', 'Herbivore'),
(12, 'Randalia.png', 'Randalia', 'Land', 'Tiny', 9, '2016-08-11 04:05:33', 'Wunicolmas-Davins', 'Moon', 'Herbivore'),
(13, 'Jakyr.png', 'Jakyr', 'Land', 'Small', 6, '2016-08-11 04:17:04', 'Glion U72', 'Planet', 'Herbivore'),
(14, 'Genish.png', 'Genish', 'Land', 'Medium', 7, '2016-08-11 04:17:38', 'Glion U72', 'Planet', 'Herbivore'),
(15, 'Zen.png', 'Zen', 'Land', 'Large', 8, '2016-08-11 04:18:08', 'Glion U72', 'Planet', 'Herbivore'),
(16, 'Iber.png', 'Iber', 'Land', 'Small', 6, '2016-08-11 04:18:42', 'Glion U72', 'Planet', 'Herbivore'),
(17, 'Koiln.png', 'Koiln', 'Land', 'Small', 7, '2016-08-11 04:19:27', 'Glion U72', 'Planet', 'Herbivore'),
(18, 'Gluttonous Pig.png', 'Gluttonous Pig', 'Land', 'Small', 7, '2016-08-11 04:21:01', 'Iryugarazak', 'Moon', 'Herbivore'),
(19, 'Insectoid.png', 'Insectoid', 'Land', 'Medium', 7, '2016-08-11 04:22:09', 'Iryugarazak', 'Moon', 'Herbivore'),
(20, 'Simba.png', 'Simba', 'Land', 'Medium', 8, '2016-08-11 04:23:25', 'Oonnorvailoe', 'Planet', 'Herbivore'),
(21, 'Neflion.png', 'Neflion', 'Land', 'Medium', 9, '2016-08-11 04:24:04', 'Oonnorvailoe', 'Planet', 'Herbivore'),
(22, 'Ozisner.png', 'Ozisner', 'Land', 'Medium', 9, '2016-08-11 04:24:40', 'Oonnorvailoe', 'Planet', 'Herbivore'),
(23, 'Bruce.png', 'Bruce', 'Land', 'Medium', 7, '2016-08-15 03:08:48', 'Paloma', 'Planet', 'Herbivore'),
(24, 'Tuinea.png', 'Tuinea', 'Air', 'Small', 8, '2016-08-15 03:09:24', 'Paloma', 'Planet', 'Herbivore'),
(25, 'Benedopolosaurus.png', 'Benedopolosaurus', 'Land', 'Large', 9, '2016-08-15 03:10:36', 'Savin', 'Planet', 'Carnivore'),
(26, 'Insecrex.png', 'Insecrex', 'Land', 'Large', 8, '2016-08-15 03:11:20', 'Savin', 'Planet', 'Carnivore'),
(27, 'Bullcow.png', 'Bullcow', 'Land', 'Medium', 6, '2016-08-15 03:11:50', 'Savin', 'Planet', 'Herbivore'),
(28, 'Mothbats.png', 'Mothbats', 'Air', 'Tiny', 4, '2016-08-15 03:12:47', 'Savin', 'Planet', 'Herbivore'),
(29, 'Electaurus.png', 'Electaurus', 'Land', 'Medium', 8, '2016-08-15 03:13:48', 'Zanguango Dalne', 'Planet', 'Herbivore'),
(30, 'Flyber.png', 'Flyber', 'Air', 'Small', 10, '2016-08-15 03:14:22', 'Zanguango Dalne', 'Planet', 'Herbivore'),
(31, 'Lionize.png', 'Lionize', 'Land', 'Medium', 7, '2016-08-15 03:15:09', 'Eyhamoo Quili', 'Planet', 'Carnivore');

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
(1, 'Kunos', 'Herbivore', 'Medium', 6, 'Hauslufjoror-Rawu', 'Planet', '2016-08-10 03:02:57', 'Kunos.png'),
(2, 'Linkelitte', 'Herbivore', 'Small', 4, 'Hauslufjoror-Rawu', 'Planet', '2016-08-10 03:03:27', 'Linkelitte.png'),
(3, 'Skeletor', 'Herbivore', 'Tiny', 7, 'Hauslufjoror-Rawu', 'Planet', '2016-08-10 03:05:10', 'Skeletor.png'),
(4, 'Asykinite', 'Herbivore', 'Medium', 8, 'Oathatar', 'Planet', '2016-08-10 15:37:49', 'Asykinite.png'),
(5, 'Castrar', 'Herbivore', 'Small', 7, 'Oathatar', 'Planet', '2016-08-10 15:38:20', 'Castrar.png'),
(6, 'Ovalatus', 'Herbivore', 'Large', 6, 'Oathatar', 'Planet', '2016-08-10 15:39:47', 'Ovalatus.png'),
(7, 'Jack Skeleton', 'Herbivore', 'Medium', 8, 'Cubeo', 'Planet', '2016-08-11 03:57:58', 'Jack skeleton.png'),
(8, 'Braix', 'Herbivore', 'Small', 5, 'Cubeo', 'Planet', '2016-08-11 04:00:01', 'Braix.png'),
(9, 'Tuvei', 'Herbivore', 'Large', 9, 'Cubeo', 'Planet', '2016-08-11 04:00:34', 'Tuvei.png'),
(10, 'Yeolea', 'Herbivore', 'Large', 7, 'Kuthea', 'Planet', '2016-08-11 04:14:44', 'Yeolea.png'),
(11, 'Boicyte', 'Herbivore', 'Large', 9, 'Glion U72', 'Planet', '2016-08-11 04:15:36', 'Boicyte.png'),
(12, 'Ewy', 'Herbivore', 'Small', 7, 'Glion U72', 'Planet', '2016-08-11 04:16:13', 'Ewy.png');

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
(1, 'Euclid', 6, 20, 2, 31, 12);

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
(1, 1, 6, 20, 2, 31, 12, 4, 3);

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

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `name`, `type`, `file`, `date`) VALUES
(1, 'First Impressions', 'video', 'First Impression.mp4', '2016-08-10 03:17:05'),
(2, 'Elusive Cowman', 'video', 'Elusive cowman.mp4', '2016-08-11 04:26:02'),
(3, 'Scamper Stuck', 'image', 'Scamper Stuck.png', '2016-08-11 04:26:16');

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
(1, 'Iryugarazak', 'Hairon', 'Iryugarazak.png', 'Extreme Cold', 'Sub Arctic', 'Basic', 'Tiny', 9, 'Small Waves', '', 'Biyskyviumeru', 6, 0, 'Iryugarazak 1.png', 'Iryugarazak 2.png', '2016-08-10 15:31:00'),
(2, 'Wunicolmas-Davins', 'Hairon', 'Wunicolmas-Davins.png', 'Extreme Heat', 'Highland', 'Basic', 'Tiny', 8, 'Small Waves', '', 'Cubeo', 3, 0, 'Wunicolmas-Davins 1.png', 'Wunicolmas-Davins 2.png', '2016-08-11 04:02:48');

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
(1, 'Paragon.png', 'Paragon', 'Yachitakai', 'Radioactive', 'Highland', 'Basic', 'Large', 7, 'Small Waves', 'Iron, Heredium, Plutonium, Gold', 0, 2, 0, 'Paragon1.png', 'Paragon2.png', '2016-08-10 02:56:17'),
(2, 'Hauslufjoror-Rawu.png', 'Hauslufjoror-Rawu', 'Yachitakai', 'Extreme Heat', 'Highland', 'None', 'Medium', 5, 'Medium Waves', 'Thamium9', 0, 0, 3, 'Hauslufjoror-Rawu-1.png', 'Hauslufjoror-Rawu-2.png', '2016-08-10 02:59:43'),
(3, 'Oathatar.png', 'Oathatar', 'Yachitakai', 'Radioactive', 'Highland', 'None', 'Medium', 5, 'Medium Waves', '', 0, 0, 3, 'Oathatar 2.png', 'Oathatar 1.png', '2016-08-10 15:23:36'),
(4, 'Kumantainaz.png', 'Kumantainaz', 'Yachitakai', 'Normal', 'Temperate', 'None', 'Medium', 6, 'Medium Waves', '', 0, 0, 0, 'Kumantainaz 1.png', 'Kumantainaz 2.png', '2016-08-10 15:24:58'),
(5, 'Biyskyviumeru.png', 'Biyskyviumeru', 'Hairon', 'Normal', 'Mediterranean', 'None', 'Large', 7, 'Small Waves', '', 1, 0, 0, 'Biyskyviumeru 1.png', 'Biyskyviumeru_1.png', '2016-08-10 15:29:14'),
(6, 'Pionezhniy Manesse.png', 'Pionezhniy Manesse', 'Hairon', 'Extreme Heat', 'Highland', 'None', 'Medium', 6, 'Small Waves', '', 0, 0, 0, 'Pionezhniy Manesse 1.png', 'Pionezhniy Manesse 2.png', '2016-08-11 03:51:35'),
(7, 'Cubeo.png', 'Cubeo', 'Hairon', 'Toxic', 'Temperate', 'Basic', 'Medium', 7, 'Small Waves', '', 1, 3, 3, 'Cubeo 1.png', 'Cubeo 2.png', '2016-08-11 03:54:18'),
(8, 'Kuthea.png', 'Kuthea', 'Surutobe', 'Toxic', 'Temperate', 'None', 'Medium', 6, 'Small Waves', '', 0, 0, 1, 'Kuthea 1.png', 'Kuthea 2.png', '2016-08-11 04:08:40'),
(9, 'Glion U72.png', 'Glion U72', 'Surutobe', 'Toxic', 'Temperate', 'Complex', 'Medium', 7, 'Small Waves', '', 0, 5, 2, 'Glion U72 1.png', 'Glion U72 2.png', '2016-08-11 04:10:15'),
(10, 'Oonnorvailoe.png', 'Oonnorvailoe', 'Surutobe', 'Radioactive', 'Temperate', 'Complex', 'Medium', 8, 'Small Waves', '', 0, 3, 0, 'Oonnorvailoe 1.png', 'Oonnorvailoe 2.png', '2016-08-11 04:12:53'),
(11, 'Jepaworkavi.png', 'Jepaworkavi', 'Evian', 'Normal', 'Highland', 'None', 'Medium', 5, 'Small Waves', '', 0, 0, 0, 'Jepaworkavi 1.png', 'Jepaworkavi 2.png', '2016-08-14 21:45:23'),
(12, 'Veenjo.png', 'Veenjo', 'Evian', 'Normal', 'Dessert', 'None', 'Small', 5, 'Medium Waves', '', 0, 0, 0, 'Veenjo 1.png', 'Veenjo 2.png', '2016-08-14 21:48:31'),
(13, 'Paloma_1.png', 'Paloma', 'Evian', 'Normal', 'Sub Arctic', 'None', 'Medium', 7, 'Huge Waves', '', 0, 2, 0, 'Paloma 1.png', 'Paloma 2.png', '2016-08-14 22:34:58'),
(14, 'New Kawatahama.png', 'New Kawatahama', 'Goshunatocky', 'Normal', 'Dessert', 'None', 'Medium', 9, 'Large Waves', 'Vortex Cubes', 0, 0, 0, 'New Kawatahama 1.png', 'New Kawatahama 2.png', '2016-08-14 22:35:58'),
(15, 'Savin.png', 'Savin', 'Goshunatocky', 'Extreme Cold', 'Sub Zero', 'Complex', 'Medium', 9, 'Small Waves', '', 0, 4, 0, 'Savin 1.png', 'Savin 2.png', '2016-08-14 22:37:10'),
(16, 'Zanguango Dalne.png', 'Zanguango Dalne', 'Goshunatocky', 'Normal', 'Dessert', 'Complex', 'Medium', 7, 'Small Waves', '', 0, 2, 0, 'Zanguango Dalne 1.png', 'Zanguango Dalne 2.png', '2016-08-14 22:39:28'),
(17, 'Eyhamoo Qiliu.png', 'Eyhamoo Quili', 'Goshunatocky', 'Normal', 'Tropical', 'Complex', 'Medium', 5, 'Small Waves', '', 0, 1, 0, 'Eyhamoo Qiliu 1.png', 'Eyhamoo Qiliu 2.png', '2016-08-14 22:41:43'),
(18, '', 'I Love Lee', 'Goshunatocky', 'Radioactive', 'Highland', 'Complex', 'Medium', 8, 'Small Waves', '', 0, 0, 0, '', '', '2016-08-15 23:50:53'),
(19, '', 'Permenhagenn', 'Goshunatocky', 'Normal', 'Sub Arctic', 'None', 'Small', 6, 'Medium Waves', '', 0, 0, 0, '', '', '2016-08-16 02:08:22'),
(20, '', 'Ebilzen Eyfer', 'Gatagayasuy', 'Radioactive', 'Tropical', 'None', 'Medium', 5, 'Huge Waves', '', 0, 0, 0, '', '', '2016-08-16 03:42:28');

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

--
-- Dumping data for table `ships`
--

INSERT INTO `ships` (`id`, `name`, `type`, `main_image`, `date_logged`) VALUES
(1, 'Rasamama-S36', 'Explorer', 'Rasamama-S36.png', '2016-08-10 03:05:42'),
(2, 'Domanish S84', 'Combat', 'Domanish S84.png', '2016-08-10 15:40:55'),
(3, 'Iyodoman S44', 'Trader', 'Iyodoman S44.png', '2016-08-15 03:07:18'),
(4, 'Magoenop S90', 'Trader', 'Magoenop S90.png', '2016-08-15 03:16:29');

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

--
-- Dumping data for table `star_systems`
--

INSERT INTO `star_systems` (`ID`, `name`, `galaxy`, `star_type`, `star_colour`, `no_planets`, `no_moons`, `no_creatures`, `no_flora`, `image`, `date_logged`) VALUES
(1, 'Yachitakai', 'Euclid', 'Dwarf', 'Yellow', 4, 0, 2, 6, 'Yachitakai.png', '2016-08-10 02:53:49'),
(2, 'Hairon', 'Euclid', 'G', 'Yellow', 3, 2, 12, 3, 'Hairon.png', '2016-08-10 15:26:36'),
(3, 'Surutobe', 'Euclid', 'Dwarf', 'Yellow', 3, 0, 8, 3, 'Surutobe.png', '2016-08-11 04:06:32'),
(4, 'Evian', 'Euclid', 'Dwarf', 'Yellow', 3, 0, 2, 0, 'Evian.png', '2016-08-14 21:43:55'),
(5, 'Goshunatocky', 'Euclid', 'Dwarf', 'Yellow', 6, 0, 7, 0, 'Goshunatocky.png', '2016-08-14 21:51:13'),
(6, 'Gatagayasuy', 'Euclid', 'Pulsar', 'Red', 1, 0, 0, 0, '', '2016-08-16 03:38:33');

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
(5, 'Evian', '2016-05-02', 'planets');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
