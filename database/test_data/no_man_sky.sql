-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2016 at 03:03 AM
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
(1, '', 'Xuimin', 'Land', 'Small', 8, '2016-06-05 03:40:36', 'Kyungsoo', 'Moon', 'Omnivore'),
(2, 'diplo.png', 'Hyolyness', 'Land', 'Huge', 7, '2016-06-05 03:42:24', 'CL', 'Planet', 'Omnivore'),
(3, '', 'Heize', 'Sea', 'Tiny', 10, '2016-06-05 03:43:24', 'Hyuna', 'Moon', 'Carnivore'),
(4, 'zelo.jpg', 'Zelo', 'Air', 'Huge', 10, '2016-06-05 03:44:18', 'Jinhong', 'Planet', 'Carnivore'),
(5, 'Akamaru.png', 'Akamaru', 'Land', 'Tiny', 6, '2016-06-05 04:24:45', 'Kiba Inuzuka', 'Moon', 'Carnivore'),
(6, '', 'Lemur', 'Land', 'Small', 5, '2016-06-05 18:24:39', 'Earth', 'Planet', 'Herbivore'),
(7, 'diplo.png', 'Diplo', 'Land', 'Huge', 9, '2016-07-04 22:58:06', 'Earth', 'Planet', 'Herbivore'),
(8, 'Gek.png', 'Gek', 'Land', 'Small', 7, '2016-07-12 02:36:14', 'Saturn', 'Planet', 'Herbivore'),
(9, 'nine tailed fox.jpg', 'Nine Tailed Fox', 'Land', 'Huge', 10, '2016-07-15 00:16:05', 'Naruto Uzamaki', 'Moon', 'Carnivore'),
(10, 'giraffe.jpg', 'Giraffe', 'Land', 'Large', 7, '2016-07-15 00:19:45', 'Earth', 'Planet', 'Herbivore'),
(11, 'Gek.png', 'Test Creature 2', 'Land', 'Tiny', 1, '2016-07-15 01:01:23', 'Earth', 'Planet', 'Carnivore'),
(12, 'Gek.png', 'Terbit', 'Sea', 'Small', 4, '2016-07-15 02:23:21', 'Malvo', 'Moon', 'Carnivore'),
(13, '', 'Jockey', 'Land', 'Tiny', 1, '2016-07-15 21:26:50', 'Malvo', 'Moon', 'Herbivore'),
(14, 'test.jpg', 'Brugenov', 'Air', 'Medium', 4, '2016-07-16 21:37:33', 'Aenope', 'Planet', 'Carnivore'),
(15, 'test.jpg', 'Beskoaphus', 'Land', 'Tiny', 7, '2016-07-16 21:38:01', 'Aenope', 'Planet', 'Omnivore'),
(16, 'test.jpg', 'Asmeon', 'Sea', 'Medium', 5, '2016-07-16 21:40:00', 'Agloa', 'Moon', 'Omnivore'),
(17, 'test.jpg', 'Asnaibos', 'Land', 'Large', 5, '2016-07-16 21:41:50', 'Askuik', 'Planet', 'Carnivore'),
(18, 'test.jpg', 'Auturn', 'Air', 'Large', 4, '2016-07-16 21:43:15', 'Abloytania', 'Moon', 'Carnivore'),
(19, 'Human.png', 'Human blobs', 'Land', 'Medium', 2, '2016-07-20 17:44:34', 'Earth', 'Planet', 'Omnivore');

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
(1, 'Sad Plant', 'Herbivore', 'Small', 4, 'Planet 9', 'Planet', '2016-07-14 20:07:47', 'test flora.jpg'),
(2, 'Lopsi', 'Herbivore', 'Tiny', 1, 'Hinata Hyuga', 'Moon', '2016-07-14 20:11:12', 'test flora.jpg'),
(3, 'Test Flora new', 'Omnivore', 'Tiny', 9, 'Jinhong', 'Planet', '2016-07-14 20:44:19', 'blue bell.jpg'),
(4, 'Polly', 'Carnivore', 'Small', 4, 'Malvo', 'Moon', '2016-07-15 21:25:56', ''),
(5, 'Pleble', 'Herbivore', 'Tiny', 1, 'Malvo', 'Moon', '2016-07-15 21:26:13', ''),
(6, 'Caolea', 'Carnivore', 'Medium', 9, 'Aenope', 'Planet', '2016-07-16 21:39:04', 'test.jpg'),
(7, 'Cefloria', 'Herbivore', 'Small', 2, 'Agloa', 'Moon', '2016-07-16 21:40:36', 'test.jpg'),
(8, 'Euros', 'Omnivore', 'Small', 6, 'Askuik', 'Planet', '2016-07-16 21:42:17', 'test.jpg'),
(9, 'Asliutov', 'Herbivore', 'Small', 4, 'Blugunus', 'Moon', '2016-07-16 21:44:26', 'test.jpg');

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
(1, 'Milky Way', 4, 3, 1, 6, 0),
(2, 'Andromada', 5, 2, 1, 2, 2),
(3, 'Double A', 3, 8, 4, 4, 1),
(4, 'The Hidden Leaf', 4, 4, 12, 2, 1),
(5, 'The Village Hidden in the Sand', 4, 2, 0, 0, 0),
(6, 'Test Galaxy', 3, 1, 2, 1, 2),
(7, 'hfiehbf', 1, 1, 1, 0, 0),
(8, 'Appleseed', 1, 2, 3, 5, 4),
(9, 'Olioe', 1, 1, 0, 0, 0);

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
(1, 9, 26, 24, 24, 19, 9, 7, 15);

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
(2, 'Knock Out', 'video', 'KnockOut.mp4', '2016-07-21 22:43:44'),
(5, 'Mine at Guys Head', 'video', 'Mine at guys head.mp4', '2016-07-21 22:45:52'),
(6, 'Original Background Image', 'image', 'background6.jpg', '2016-07-21 22:46:13'),
(7, 'Test Image', 'image', 'background2.jpg', '2016-07-21 23:01:08'),
(8, 'Batman Vs Superman', 'video', 'Batman vs Superman Dawn of Jus', '2016-07-22 00:23:35'),
(9, 'Iceland Mountains', 'image', 'IMG_5422.JPG', '2016-07-22 00:26:41'),
(10, 'This is a Test', 'video', 'KnockOut.mp4', '2016-07-22 00:35:24'),
(11, 'Testing URL', 'video', 'KnockOut.mp4', '2016-07-22 00:37:15'),
(12, 'Another Test', 'image', 'background2.jpg', '2016-07-22 00:49:45'),
(13, 'testing', 'image', 'background2.jpg', '2016-07-22 00:50:33'),
(14, 'test2', 'image', 'background2.jpg', '2016-07-22 00:53:08'),
(15, 'Test 3', 'video', 'Mine at guys head.mp4', '2016-07-22 01:00:53');

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
(4, 'Lee Hi', 'Bom', '', 'Normal', 'Mediterranean', 'Basic', 'Medium', 4, 'Medium Waves', '', 'CL', 0, 0, '', '', '2016-06-05 03:39:12'),
(5, 'Naruto Uzamaki', 'Team Seven', '', 'Normal', 'Tropical', 'None', 'Tiny', 10, 'None', '', 'Kakashi', 1, 0, '', '', '2016-06-05 04:02:43'),
(6, 'Sasuke Uchiha', 'Team Seven', '', 'Normal', 'Tropical', 'None', 'Tiny', 10, 'None', '', 'Kakashi', 0, 0, '', '', '2016-06-05 04:03:55'),
(7, 'Sakura Haruno', 'Team Seven', '', 'Normal', 'Tropical', 'None', 'Tiny', 6, 'None', '', 'Kakashi', 0, 0, '', '', '2016-06-05 04:04:30'),
(8, 'Shikamaru Nara', 'Team Ten', '', 'Normal', 'Tropical', 'None', 'Tiny', 7, 'None', '', 'Asuma', 0, 0, '', '', '2016-06-05 04:05:44'),
(9, 'Ino Yamanaka', 'Team Ten', '', 'Normal', 'Tropical', 'None', 'Tiny', 5, 'None', '', 'Asuma', 0, 0, '', '', '2016-06-05 04:06:16'),
(10, 'Choji Akamichi', 'Team Ten', '', 'Normal', 'Tropical', 'None', 'Tiny', 6, 'None', '', 'Asuma', 0, 0, '', '', '2016-06-05 04:06:47'),
(11, 'Hinata Hyuga', 'Team Eight', '', 'Normal', 'Tropical', 'None', 'Tiny', 7, 'None', '', 'Kurenai', 0, 1, '', '', '2016-06-05 04:08:29'),
(12, 'Kiba Inuzuka', 'Team Eight', '', 'Normal', 'Tropical', 'None', 'Tiny', 5, 'None', '', 'Kurenai', 1, 0, '', '', '2016-06-05 04:09:05'),
(13, 'Shino Aburame', 'Team Eight', '', 'Normal', 'Tropical', 'None', 'Tiny', 5, 'None', '', 'Kurenai', 0, 0, '', '', '2016-06-05 04:09:47'),
(14, 'Rock Lee', 'Team Guy', '', 'Normal', 'Tropical', 'None', 'Tiny', 8, 'None', '', 'Guy', 0, 0, '', '', '2016-06-05 04:11:02'),
(15, 'Neji Hyuga', 'Team Guy', '', 'Normal', 'Tropical', 'None', 'Tiny', 7, 'None', '', 'Guy', 0, 0, '', '', '2016-06-05 04:12:04'),
(16, 'Tenten', 'Team Guy', '', 'Normal', 'Tropical', 'None', 'Tiny', 4, 'None', '', 'Guy', 0, 0, '', '', '2016-06-05 04:12:29'),
(17, 'The Moon', 'The Solar System', 'moon.jpg', 'Cold', 'Sub Arctic', 'None', 'Tiny', 5, 'None', 'Moon Rock', 'Earth', 0, 0, '', '', '2016-06-16 22:05:10'),
(18, 'Moon 9', 'Another Test System', '', 'Normal', 'Tropical', 'Complex', 'Tiny', 1, 'None', '', 'Planet 9', 0, 0, '', '', '2016-06-17 06:23:41'),
(19, 'Malvo', 'Doulinhota', 'background2.jpg', 'Extreme Heat', 'Savannah', 'Complex', 'Tiny', 9, 'Medium Waves', 'Some Minerals', 'AbbeyWell', 2, 2, 'background3.jpg', 'background1.png', '2016-07-03 11:25:24'),
(20, 'Testy Mctesterson', 'blubdd', '', 'Normal', 'Tropical', 'None', 'Tiny', 1, 'None', '', 'Tester', 0, 0, '', '', '2016-07-14 19:50:12'),
(21, 'Agloa', 'Aspyke', 'test.jpg', 'Extreme Cold', 'Sub Arctic', 'Basic', 'Tiny', 6, 'Medium Waves', 'Plepergi', 'Aenope', 1, 1, 'test.jpg', 'test.jpg', '2016-07-16 21:35:47'),
(22, 'Abloytania', 'Aspyke', 'test.jpg', 'Normal', 'Tropical', 'None', 'Medium', 7, 'None', 'Perplexium', 'Askuik', 1, 0, 'test.jpg', 'test.jpg', '2016-07-16 21:36:46'),
(23, 'Blugunus', 'Aspyke', 'test.jpg', 'Extreme Heat', 'Dessert', 'Complex', 'Medium', 8, 'Medium Waves', 'Teraformia', 'Askuik', 0, 1, 'test.jpg', 'test.jpg', '2016-07-16 21:43:59'),
(24, 'plerty', 'Another Test System', '', 'Normal', 'Tropical', 'None', 'Tiny', 1, 'None', '', 'Planet 9', 0, 0, '', '', '2016-07-19 12:49:22');

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
(1, 'Earth1.png', 'Earth', 'The Solar System', 'Normal', 'Tropical', 'Complex', 'Medium', 8, 'Huge Waves', 'Lots of minerals', 1, 5, 0, 'Earth2.png', 'Earth3.png', '2016-06-05 03:07:24'),
(2, '', 'Saturn', 'The Solar System', 'Toxic', 'Sub Arctic', 'None', 'Large', 8, 'None', '', 0, 1, 0, '', '', '2016-06-05 03:11:39'),
(3, '12512704_10208425564216030_7197577395550368907_n.jpg', 'Sad planet', 'Sad Star', 'Cold', 'Highland', 'Basic', 'Large', 6, 'Medium Waves', 'lots and Lots', 0, 0, 0, 'mountains1.jpg', 'mum.jpg', '2016-06-05 03:20:29'),
(4, '', 'Hyanggi', 'Aoora', 'Toxic', 'Dessert', 'None', 'Tiny', 1, 'Huge Waves', '', 1, 0, 0, '', '', '2016-06-05 03:27:11'),
(5, '', 'Woosang', 'Aoora', 'Hot', 'Savannah', 'Complex', 'Medium', 9, 'Medium Waves', 'Doughnut', 0, 0, 0, '', '', '2016-06-05 03:28:23'),
(6, '', 'Hoik', 'Aoora', 'Normal', 'Highland', 'Complex', 'Small', 7, 'Small Waves', 'Glasses', 0, 0, 0, '', '', '2016-06-05 03:29:24'),
(7, '', 'John', 'Aoora', 'Normal', 'Humid Subtropical', 'Basic', 'Medium', 1, 'Small Waves', 'Chicken Breast', 0, 0, 0, '', '', '2016-06-05 03:30:28'),
(8, '', 'Jinhong', 'Aoora', 'Normal', 'Savannah', 'Bacterial', 'Tiny', 6, 'Small Waves', 'Babies', 0, 1, 1, '', '', '2016-06-05 03:31:19'),
(9, '', 'CL', 'Bom', 'Hot', 'Mediterranean', 'Complex', 'Huge', 8, 'Large Waves', 'Gbz', 2, 1, 0, '', '', '2016-06-05 03:32:45'),
(10, '', 'Heechul', 'Eunhyuk', 'Cold', 'Sub Zero', 'Complex', 'Huge', 9, 'Huge Waves', 'Cats', 1, 0, 0, '', '', '2016-06-05 03:34:03'),
(11, '', 'Kakashi', 'Team Seven', 'Normal', 'Tropical', 'None', 'Tiny', 8, 'None', '', 3, 0, 0, '', '', '2016-06-05 04:02:04'),
(12, '', 'Asuma', 'Team Ten', 'Normal', 'Tropical', 'None', 'Tiny', 7, 'None', '', 3, 0, 0, '', '', '2016-06-05 04:05:15'),
(13, '', 'Kurenai', 'Team Eight', 'Normal', 'Tropical', 'None', 'Tiny', 6, 'None', '', 3, 0, 0, '', '', '2016-06-05 04:07:42'),
(14, '', 'Guy', 'Team Guy', 'Normal', 'Tropical', 'None', 'Tiny', 7, 'None', '', 3, 0, 0, '', '', '2016-06-05 04:10:33'),
(15, '', 'Jupiter', 'The Solar System', 'Toxic', 'Dessert', 'None', 'Huge', 8, 'None', '', 0, 0, 0, '', '', '2016-06-05 20:51:48'),
(16, '', 'Sandy', 'Wales', 'Toxic', 'Humid Subtropical', 'Complex', 'Medium', 8, 'Medium Waves', '', 0, 0, 0, '', '', '2016-06-12 03:11:43'),
(17, '', 'Bangor', 'Hamsik', 'Normal', 'Tropical', 'None', 'Tiny', 1, 'None', '', 0, 0, 0, '', '', '2016-06-13 04:44:18'),
(18, '', 'Planet 9', 'Another Test System', 'Toxic', 'Dessert', 'Complex', 'Large', 7, 'Small Waves', '', 2, 0, 1, '', '', '2016-06-17 06:22:34'),
(19, 'main_image.png', 'Pianten', 'Aoora', 'Toxic', 'Savannah', 'Bacterial', 'Medium', 6, 'Small Waves', 'none', 0, 0, 0, 'background2.jpg', 'background1.png', '2016-07-02 23:48:48'),
(20, 'background3.jpg', 'AbbeyWell', 'Doulinhota', 'Extreme Heat', 'Tropical', 'Basic', 'Small', 7, 'None', 'Spring Water', 1, 0, 0, 'background2.jpg', 'background1.png', '2016-07-03 10:15:22'),
(21, '', 'Tester', 'blubdd', 'Normal', 'Tropical', 'None', 'Tiny', 1, 'None', '', 1, 0, 0, '', '', '2016-07-14 19:49:48'),
(22, 'test.jpg', 'Aenope', 'Aspyke', 'Extreme Heat', 'Dessert', 'Basic', 'Medium', 7, 'Small Waves', 'Plutonium', 1, 2, 1, 'test.jpg', 'test.jpg', '2016-07-16 21:33:03'),
(23, 'test.jpg', 'Askuik', 'Aspyke', 'Toxic', 'Savannah', 'None', 'Medium', 6, 'Large Waves', 'Coal', 2, 1, 1, 'test.jpg', 'test.jpg', '2016-07-16 21:34:31'),
(24, '', 'Sykes', 'Jvia', 'Extreme Cold', 'Temperate', 'Basic', 'Huge', 9, 'Medium Waves', 'Water and Plants', 0, 0, 0, '', '', '2016-07-20 17:42:53');

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
(1, 'Geralt', 'Explorer', 'Helvetica.jpg'),
(2, 'test 1', 'Scientific', ''),
(3, 'test 2', 'Scientific', ''),
(4, 'test 3', 'Scientific', ''),
(5, 'test 4', 'Scientific', ''),
(6, 'test 5 new', 'Explorer', 'grunt.png'),
(7, 'Serenity', 'Explorer', 'grunt.png');

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
(1, 'The Solar System', 'Milky Way', NULL, NULL, 3, 1, 6, 0, 'no_mans_sky.png', '2016-06-05 03:03:56'),
(2, 'Sad Star', 'Andromada', NULL, NULL, 1, 0, 0, 0, '12512704_10208425564216030_7197577395550368907_n.j', '2016-06-05 03:19:02'),
(3, 'Aoora', 'Double A', 'Dwarf', 'Orange', 6, 1, 1, 1, 'Aoora.png', '2016-06-05 03:23:05'),
(4, 'Bom', 'Double A', NULL, NULL, 1, 2, 2, 0, '', '2016-06-05 03:23:36'),
(5, 'Eunhyuk', 'Double A', NULL, NULL, 1, 1, 1, 0, '', '2016-06-05 03:24:00'),
(6, 'Team Seven', 'The Hidden Leaf', NULL, NULL, 1, 3, 1, 0, '', '2016-06-05 03:50:21'),
(7, 'Team Ten', 'The Hidden Leaf', NULL, NULL, 1, 3, 0, 0, '', '2016-06-05 03:51:05'),
(8, 'Team Eight', 'The Hidden Leaf', NULL, NULL, 1, 3, 1, 1, '', '2016-06-05 04:07:05'),
(9, 'Team Guy', 'The Hidden Leaf', NULL, NULL, 1, 3, 0, 0, '', '2016-06-05 04:10:08'),
(10, 'Otra', 'Milky Way', 'Giant', 'Orange', 0, 0, 0, 0, '', '2016-06-09 00:24:22'),
(11, 'Drigisha', 'Milky Way', 'Dwarf', 'White', 0, 0, 0, 0, 'no_mans_sky.png', '2016-06-09 00:25:29'),
(12, 'Wales', 'The Village Hidden in the Sand', 'Giant', 'Yellow', 1, 0, 0, 0, '', '2016-06-12 03:06:24'),
(13, 'Skrtyl', 'The Village Hidden in the Sand', 'Giant', 'Yellow', 0, 0, 0, 0, '', '2016-06-12 03:15:09'),
(14, 'Hamsik', 'The Village Hidden in the Sand', 'Giant', 'Yellow', 1, 0, 0, 0, '', '2016-06-12 03:17:25'),
(15, 'Florent', 'The Village Hidden in the Sand', 'Neutron', 'Orange', 0, 0, 0, 0, '', '2016-06-12 03:17:55'),
(16, 'Test System', 'Test Galaxy', 'Giant', 'Yellow', 0, 0, 0, 0, '', '2016-06-12 08:18:54'),
(17, 'Finally PM', 'Andromada', 'Pulsar', 'Blue', 0, 0, 0, 0, '', '2016-06-12 12:21:53'),
(18, 'Lee Lee', 'Andromada', 'Supergiant', 'Red', 0, 0, 0, 0, '', '2016-06-15 14:46:29'),
(19, 'Hungry', 'Test Galaxy', 'Binary', 'Blue', 0, 0, 0, 0, '', '2016-06-15 14:55:25'),
(20, 'Another Test System', 'Test Galaxy', 'Pulsar', 'White', 1, 2, 1, 2, '', '2016-06-15 15:52:53'),
(21, 'Checking', 'Andromada', 'Binary', 'Red', 0, 0, 0, 0, '', '2016-06-15 15:53:27'),
(22, 'Doulinhota', 'Andromada', 'Neutron', 'Yellow', 1, 1, 2, 2, 'Doulinhota.png', '2016-06-19 14:17:01'),
(23, 'Orolis-Ogua', 'Milky Way', 'Pulsar', 'Orange', 0, 0, 0, 0, 'Arolis-Ogua.png', '2016-07-05 16:24:21'),
(24, 'blubdd', 'hfiehbf', 'Giant', 'Yellow', 1, 1, 0, 0, 'Arolis-Ogua.png', '2016-07-13 21:27:25'),
(25, 'Aspyke', 'Appleseed', 'Neutron', 'Yellow', 2, 3, 5, 4, 'test.jpg', '2016-07-16 21:32:02'),
(26, 'Jvia', 'Olioe', 'Supergiant', 'Yellow', 1, 0, 0, 0, 'Arolis-Ogua.png', '2016-07-20 17:40:51');

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
(5, 'The Solar System', '2016-05-02', 'planets');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
