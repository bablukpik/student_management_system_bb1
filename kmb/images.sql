-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2014 at 11:54 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ac`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `photo`) VALUES
(0, '', ''),
(3, 'Desert.jpg', 'E:server	mpphp35D1.tmp'),
(4, 'Desert.jpg', 'images/Desert.jpg'),
(5, 'Desert.jpg', 'images/Desert.jpg'),
(6, 'Desert.jpg', 'images/Desert.jpg'),
(7, 'Desert.jpg', 'images/Desert.jpg'),
(8, 'Desert.jpg', 'images/Desert.jpg'),
(9, 'Desert.jpg', 'images/'),
(10, 'Desert.jpg', 'images/Desert.jpg'),
(11, 'Desert.jpg', 'images/Desert.jpg'),
(12, 'Desert.jpg', 'images/Desert.jpg'),
(13, 'Penguins.jpg', 'images/Penguins.jpg'),
(14, 'Desert.jpg', 'images/Desert.jpg'),
(15, 'Jellyfish.jpg', 'images/Jellyfish.jpg'),
(16, 'Jellyfish.jpg', 'images/Jellyfish.jpg'),
(17, 'Jellyfish.jpg', 'images/Jellyfish.jpg'),
(18, 'Penguins.jpg', 'images/Penguins.jpg'),
(19, 'Penguins.jpg', 'images/Penguins.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
