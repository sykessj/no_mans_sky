-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2016 at 03:37 PM
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
(31, 'Lionize.png', 'Lionize', 'Land', 'Medium', 7, '2016-08-15 03:15:09', 'Eyhamoo Quili', 'Planet', 'Carnivore'),
(32, 'Shaka.png', 'Shaka', 'Land', 'Large', 8, '2016-08-17 00:52:53', 'Savin', 'Planet', 'Carnivore'),
(33, 'Butterfly.png', 'Butterfly', 'Air', 'Tiny', 6, '2016-08-21 17:52:08', 'Leadsturve', 'Planet', 'Herbivore'),
(34, 'Bobenek.png', 'Bobenek', 'Land', 'Large', 8, '2016-08-21 17:52:36', 'Leadsturve', 'Planet', 'Carnivore'),
(35, 'Bichonek.png', 'Bichonek', 'Land', 'Large', 9, '2016-08-21 17:53:03', 'Leadsturve', 'Planet', 'Carnivore'),
(36, 'Missetta.png', 'Missetta', 'Land', 'Medium', 7, '2016-08-21 17:53:54', 'Walkiedle', 'Planet', 'Herbivore'),
(37, 'Leinty.png', 'Leinty', 'Land', 'Medium', 9, '2016-08-21 17:55:36', 'Leesoine', 'Planet', 'Herbivore'),
(38, '', 'Volater', 'Land', 'Medium', 8, '2016-08-21 17:56:18', 'Iham', 'Planet', 'Carnivore'),
(39, 'Kasooki.png', 'Kasooki', 'Air', 'Large', 10, '2016-08-21 17:57:13', 'Nestaur', 'Planet', 'Herbivore'),
(40, 'Kreo.png', 'Kreo', 'Land', 'Medium', 7, '2016-08-21 17:58:39', 'Eaturn', 'Planet', 'Herbivore'),
(41, 'Coopsodo.png', 'Coopsodo', 'Sea', 'Large', 8, '2016-08-21 17:59:27', 'SubwayTropica', 'Moon', 'Carnivore'),
(42, 'Nellyon.png', 'Nellyon', 'Land', 'Large', 7, '2016-08-21 18:00:12', 'SubwayTropica', 'Moon', 'Herbivore');

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
(12, 'Ewy', 'Herbivore', 'Small', 7, 'Glion U72', 'Planet', '2016-08-11 04:16:13', 'Ewy.png'),
(13, 'Dogly', 'Herbivore', 'Medium', 8, 'Walkiedle', 'Planet', '2016-08-21 17:54:21', 'Dogly.png');

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
  `no_flora` int(10) NOT NULL DEFAULT '0',
  `date_logged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galaxy`
--

INSERT INTO `galaxy` (`Id`, `name`, `no_star_systems`, `no_planets`, `no_moons`, `no_creatures`, `no_flora`, `date_logged`) VALUES
(1, 'Euclid', 10, 30, 5, 42, 13, '2016-08-09 23:00:00');

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
(1, 1, 10, 30, 5, 42, 13, 7, 7);

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
(3, 'Scamper Stuck', 'image', 'Scamper Stuck.png', '2016-08-11 04:26:16'),
(4, '3 Stones', 'image', '3 Stones.png', '2016-08-21 18:03:35'),
(5, 'Fast Take Off', 'video', 'Fast Take Off.mp4', '2016-08-21 18:03:51'),
(6, 'First Black Hole', 'video', 'First Black Hole.mp4', '2016-08-21 18:04:08'),
(7, 'Nice View', 'image', 'Nice View.png', '2016-08-21 18:04:40');

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
(1, 'Iryugarazak', 'Hairon', 'Iryugarazak.png', 'Cold', 'Sub Arctic', 'Scarce', 'Tiny', 9, 'Relaxed', '', 'Biyskyviumeru', 6, 0, 'Iryugarazak 1.png', 'Iryugarazak 2.png', '2016-08-10 15:31:00'),
(2, 'Wunicolmas-Davins', 'Hairon', 'Wunicolmas-Davins.png', 'Extreme Heat', 'Highland', 'Scarce', 'Tiny', 8, 'Relaxed', '', 'Cubeo', 3, 0, 'Wunicolmas-Davins 1.png', 'Wunicolmas-Davins 2.png', '2016-08-11 04:02:48'),
(3, 'Snolla', 'Nuki V', 'Snolla.png', 'Cold', 'Sub Arctic', 'None', 'Tiny', 8, 'Standard', 'Murrine // Gold', 'Shuna 294', 0, 0, 'Snolla 2.png', 'Snolla 1.png', '2016-08-17 02:26:41'),
(4, 'SubwayTropica', 'Nuki V', 'Subwaytropica.png', 'Normal', 'Lush', 'Abundant', 'Tiny', 10, 'Relaxed', 'Aluminium', 'Shuna 294', 2, 0, 'Subwaytropica 1.png', 'Subwaytropica 2.png', '2016-08-17 02:52:39'),
(5, 'Meister', 'Missy', 'Meister.png', 'Normal', 'Highland', 'None', 'Small', 5, 'Relaxed', 'Emril', 'Leadsturve', 0, 0, 'Meister 1.png', 'Meister 2.png', '2016-08-19 14:10:39');

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
(1, 'Paragon.png', 'Paragon', 'Yachitakai', 'Light Radioactivity', 'Highland', 'Scarce', 'Large', 7, 'Relaxed', 'Iron // Heredium // Plutonium // Gold', 0, 2, 0, 'Paragon1.png', 'Paragon2.png', '2016-08-10 02:56:17'),
(2, 'Hauslufjoror-Rawu.png', 'Hauslufjoror-Rawu', 'Yachitakai', 'Extreme Heat', 'Highland', 'None', 'Medium', 5, 'Standard', 'Thamium9', 0, 0, 3, 'Hauslufjoror-Rawu-1.png', 'Hauslufjoror-Rawu-2.png', '2016-08-10 02:59:43'),
(3, 'Oathatar.png', 'Oathatar', 'Yachitakai', 'Light Radioactivity', 'Highland', 'None', 'Medium', 5, 'Standard', '', 0, 0, 3, 'Oathatar 2.png', 'Oathatar 1.png', '2016-08-10 15:23:36'),
(4, 'Kumantainaz.png', 'Kumantainaz', 'Yachitakai', 'Normal', 'Highland Swamp', 'None', 'Medium', 6, 'Standard', '', 0, 0, 0, 'Kumantainaz 1.png', 'Kumantainaz 2.png', '2016-08-10 15:24:58'),
(5, 'Biyskyviumeru.png', 'Biyskyviumeru', 'Hairon', 'Normal', 'Mediterranean', 'None', 'Large', 7, 'Relaxed', '', 1, 0, 0, 'Biyskyviumeru 1.png', 'Biyskyviumeru_1.png', '2016-08-10 15:29:14'),
(6, 'Pionezhniy Manesse.png', 'Pionezhniy Manesse', 'Hairon', 'Extreme Heat', 'Highland', 'None', 'Medium', 6, 'Relaxed', '', 0, 0, 0, 'Pionezhniy Manesse 1.png', 'Pionezhniy Manesse 2.png', '2016-08-11 03:51:35'),
(7, 'Cubeo.png', 'Cubeo', 'Hairon', 'Light Toxicity', 'Highland Swamp', 'Scarce', 'Small', 7, 'Relaxed', '', 1, 3, 3, 'Cubeo 1.png', 'Cubeo 2.png', '2016-08-11 03:54:18'),
(8, 'Kuthea.png', 'Kuthea', 'Surutobe', 'Light Toxicity', 'Highland Swamp', 'None', 'Medium', 6, 'Relaxed', '', 0, 0, 1, 'Kuthea 1.png', 'Kuthea 2.png', '2016-08-11 04:08:40'),
(9, 'Glion U72.png', 'Glion U72', 'Surutobe', 'Light Toxicity', 'Highland Swamp', 'Abundant', 'Medium', 7, 'Relaxed', '', 0, 5, 2, 'Glion U72 1.png', 'Glion U72 2.png', '2016-08-11 04:10:15'),
(10, 'Oonnorvailoe.png', 'Oonnorvailoe', 'Surutobe', 'Light Radioactivity', 'Highland Swamp', 'Abundant', 'Medium', 8, 'Relaxed', '', 0, 3, 0, 'Oonnorvailoe 1.png', 'Oonnorvailoe 2.png', '2016-08-11 04:12:53'),
(11, 'Jepaworkavi.png', 'Jepaworkavi', 'Evian', 'Normal', 'Highland', 'None', 'Medium', 5, 'Relaxed', '', 0, 0, 0, 'Jepaworkavi 1.png', 'Jepaworkavi 2.png', '2016-08-14 21:45:23'),
(12, 'Veenjo.png', 'Veenjo', 'Evian', 'Normal', 'Dessert', 'None', 'Small', 5, 'Standard', '', 0, 0, 0, 'Veenjo 1.png', 'Veenjo 2.png', '2016-08-14 21:48:31'),
(13, 'Paloma_1.png', 'Paloma', 'Evian', 'Normal', 'Sub Arctic', 'None', 'Medium', 7, 'Frenzied', '', 0, 2, 0, 'Paloma 1.png', 'Paloma 2.png', '2016-08-14 22:34:58'),
(14, 'New Kawatahama.png', 'New Kawatahama', 'Goshunatocky', 'Normal', 'Dessert', 'None', 'Medium', 9, 'High Security', 'Vortex Cubes', 0, 0, 0, 'New Kawatahama 1.png', 'New Kawatahama 2.png', '2016-08-14 22:35:58'),
(15, 'Savin.png', 'Savin', 'Goshunatocky', 'Extreme Cold', 'Sub Zero', 'Abundant', 'Medium', 9, 'Relaxed', '', 0, 5, 0, 'Savin 1.png', 'Savin 2.png', '2016-08-14 22:37:10'),
(16, 'Zanguango Dalne.png', 'Zanguango Dalne', 'Goshunatocky', 'Normal', 'Dessert', 'Abundant', 'Medium', 7, 'Relaxed', '', 0, 2, 0, 'Zanguango Dalne 1.png', 'Zanguango Dalne 2.png', '2016-08-14 22:39:28'),
(17, 'Eyhamoo Qiliu.png', 'Eyhamoo Quili', 'Goshunatocky', 'Normal', 'Highland Swamp', 'Abundant', 'Medium', 5, 'Relaxed', '', 0, 1, 0, 'Eyhamoo Qiliu 1.png', 'Eyhamoo Qiliu 2.png', '2016-08-14 22:41:43'),
(18, 'I love Lee.png', 'I Love Lee', 'Goshunatocky', 'Light Radioactivity', 'Highland', 'Abundant', 'Medium', 8, 'Relaxed', '', 0, 0, 0, 'I love Lee 1.png', 'I love Lee 2.png', '2016-08-15 23:50:53'),
(19, 'Purmenhagenn.png', 'Permenhagenn', 'Goshunatocky', 'Normal', 'Sub Arctic', 'None', 'Small', 6, 'Standard', '', 0, 0, 0, 'Purmenhagenn 1.png', 'Purmenhagenn 2.png', '2016-08-16 02:08:22'),
(20, 'Ebilzen Eyfer.png', 'Ebilzen Eyfer', 'Gatagayasuy', 'Light Radioactivity', 'Highland Swamp', 'None', 'Medium', 5, 'Frenzied', '', 0, 0, 0, 'Ebilzen Eyfer 1.png', 'Ebilzen Eyfer 2.png', '2016-08-16 03:42:28'),
(21, 'Shuna 294.png', 'Shuna 294', 'Nuki V', 'Normal', 'Highland', 'None', 'Medium', 4, 'Relaxed', 'Gold', 2, 0, 0, 'Shuna 294 1.png', 'Shuna 294 2.png', '2016-08-17 01:36:31'),
(22, 'Meycarro.png', 'Meycarro', 'Nuki V', 'Normal', 'Highland', 'None', 'Medium', 5, 'Frenzied', 'Gravatino Balls // Emril', 0, 0, 0, 'Meycarro 1.png', 'Meycarro 2.png', '2016-08-17 02:00:32'),
(23, 'Eaturn.png', 'Eaturn', 'Nuki V', 'Normal', 'Highland', 'None', 'Medium', 6, 'Relaxed', 'Gold', 0, 1, 0, 'Eaturn 1.png', 'Eaturn 2.png', '2016-08-17 02:18:21'),
(24, 'Walkiedle.png', 'Walkiedle', 'Missy', 'Normal', 'Highland Swamp', 'Fair', 'Medium', 6, 'Relaxed', 'Titanium // Gold', 0, 1, 1, 'Walkiedle 1.png', 'Walkiedle 2.png', '2016-08-18 21:38:42'),
(25, 'Leadsturve.png', 'Leadsturve', 'Missy', 'Ligth Toxicity', 'Highland Swamp', 'Fair', 'Large', 7, 'High Security', 'Gravatino Balls // Emril', 1, 3, 0, 'Leadsturve 1.png', 'Leadsturve 2.png', '2016-08-19 03:14:50'),
(26, 'Talaar.png', 'Talaar', 'Stelion', 'Normal', 'Highland', 'None', 'Medium', 2, 'Relaxed', '', 0, 0, 0, 'Talaar 2.png', 'Talaar 1.png', '2016-08-21 15:35:14'),
(27, 'Leesoine.png', 'Leesoine', 'Stelion', 'Cold', 'Sub Arctic', 'Fair', 'Small', 5, 'Relaxed', '', 0, 1, 0, 'Leesoine 1.png', 'Leesoine 2.png', '2016-08-21 17:24:31'),
(28, 'Nestaur.png', 'Nestaur', 'Stelion', 'Hot', 'Highland', 'Abundant', 'Medium', 6, 'Standard', 'Aluminium // Nickel', 0, 1, 0, 'Nestaur 1.png', 'Nestaur 2.png', '2016-08-21 17:31:48'),
(29, 'Iham.png', 'Iham', 'Stelion', 'Normal', 'Highland', 'Fair', 'Medium', 6, 'Relaxed', '', 0, 1, 0, 'Iham 1.png', 'Iham 2.png', '2016-08-21 17:42:36'),
(30, '', 'Yamonoka', 'Gorma II', 'Ligth Toxicity', 'Highland Swamp', 'Scarce', 'Small', 6, 'Standard', 'Vortex Cubes // Gold', 0, 0, 0, '', '', '2016-08-23 10:54:06');

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
(1, 'Rasamama S36', 'Explorer', 'Rasamama-S36.png', '2016-08-10 03:05:42'),
(2, 'Domanish S84', 'Combat', 'Domanish S84.png', '2016-08-10 15:40:55'),
(3, 'Iyodoman S44', 'Trader', 'Iyodoman S44.png', '2016-08-15 03:07:18'),
(4, 'Magoenop S90', 'Trader', 'Magoenop S90.png', '2016-08-15 03:16:29'),
(5, 'Joyokosa S70', 'Combat', 'Joyokosa S70.png', '2016-08-17 03:32:16'),
(6, 'Wachikoku S58', 'Scientific', 'Wachikoku S58.png', '2016-08-21 18:01:45'),
(7, 'Sabashin S49', 'Scientific', '', '2016-08-21 18:03:14');

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
(1, 'Yachitakai', 'Euclid', 'G', 'Yellow', 4, 0, 2, 6, 'Yachitakai.png', '2016-08-10 02:53:49'),
(2, 'Hairon', 'Euclid', 'G', 'Yellow', 3, 2, 12, 3, 'Hairon.png', '2016-08-10 15:26:36'),
(3, 'Surutobe', 'Euclid', 'G', 'Yellow', 3, 0, 8, 3, 'Surutobe.png', '2016-08-11 04:06:32'),
(4, 'Evian', 'Euclid', 'G', 'Yellow', 3, 0, 2, 0, 'Evian.png', '2016-08-14 21:43:55'),
(5, 'Goshunatocky', 'Euclid', 'G', 'Yellow', 6, 0, 8, 0, 'Goshunatocky.png', '2016-08-14 21:51:13'),
(6, 'Gatagayasuy', 'Euclid', 'K', 'Yellow White', 1, 0, 0, 0, 'Gatagayasuy.png', '2016-08-16 03:38:33'),
(7, 'Nuki V', 'Euclid', 'G', 'Yellow', 3, 2, 3, 0, 'Nuki V.png', '2016-08-17 01:30:36'),
(8, 'Missy', 'Euclid', 'G', 'Yellow', 2, 1, 4, 1, 'Missy.png', '2016-08-18 21:30:35'),
(9, 'Stelion', 'Euclid', 'G', 'Yellow', 4, 0, 3, 0, 'Stelion.png', '2016-08-21 15:33:50'),
(10, 'Gorma II', 'Euclid', 'E', 'Green', 1, 0, 0, 0, '', '2016-08-23 10:51:39');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
