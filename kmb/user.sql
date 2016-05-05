-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2014 at 10:08 PM
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
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `postcode` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `address`, `postcode`, `email`, `password`) VALUES
(1, 'adad', 'adf', 'adf', 'adf', 'a'),
(4, 'jlkadjfl', 'adfadk', 'adfadfad', 'adfasdfadsf', 'admin'),
(7, 'ama', 'adf', 'ad', 'ad', 'ad'),
(8, 'dfvv', 'vvv', 'vvv', 'vvvv', 'vvvv'),
(9, 'adf', 'adf', 'adf', 'af', 'adfdf'),
(12, 'twrtuoi', 'adjfajdf', 'adsfjj', 'uuu', 'uuu'),
(13, 'aadf', 'adf', 'adf', 'aafd', 'adfadfaftt'),
(15, 'adfad', 'adfadfaaa', 'ad', 'adfadfaf', 'ttttttttttt'),
(17, 'zvafadf', 'adfadfaaaa', 'dfadfadf', 'adfadfadfadf', 'nnnnnnnnnnnn'),
(18, 'adfadf', 'adfadf', 'adfadf', 'adfadf', 'adfadfadfad'),
(20, 'adf', 'adfadfaaa', 'afdad', 'afafffffffffffffffffffffff', 'fff'),
(21, 'adf', 'adf', 'adfadfad', 'adfasdfadsfffff', 'a');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
