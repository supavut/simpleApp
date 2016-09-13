-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 13, 2016 at 07:21 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simpleApp`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Infomation`
--

CREATE TABLE IF NOT EXISTS `Infomation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `gender` int(1) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Infomation`
--

INSERT INTO `Infomation` (`id`, `firstname`, `lastname`, `address`, `gender`, `tel`, `email`, `created_at`, `updated_at`) VALUES
(1, 'ศุภวุฒิ', 'ชาติเชิดศักดิ์', 'testtest', 0, '', 'supavut.chardchedsak@gmail.com', '2016-09-13 17:31:25', '2016-09-13 17:31:25'),
(2, 'admin', 'admin', 'testtest', 1, '0000000000', 'thelastsubper@gmail.com', '2016-09-13 17:33:32', '2016-09-13 17:33:32'),
(3, 'test', 'test', 'testtest', 0, '0874102553', 'the_lastsubper@hotmail.com', '2016-09-13 19:11:18', '2016-09-13 19:11:18'),
(4, 'test2', 'test2', 'test2', 0, '0874102553', 'the_lastsubper@hotmail.com', '2016-09-13 19:12:26', '2016-09-13 19:12:26'),
(5, 'test3', 'test', 'test2', 0, '0874102553', 'the_lastsubper@hotmail.com', '2016-09-13 19:13:14', '2016-09-13 19:13:14'),
(6, 'test344', '4444444', 'testtest', 0, '0874102553', 'allansmith@yahoo.com', '2016-09-13 19:15:15', '2016-09-13 19:15:15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
