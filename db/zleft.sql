-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2014 at 02:11 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zleft`
--
CREATE DATABASE IF NOT EXISTS `zleft` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `zleft`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_author` varchar(100) NOT NULL,
  `com_body` varchar(200) NOT NULL,
  `ent_id` int(11) NOT NULL,
  `com_date` datetime NOT NULL,
  PRIMARY KEY (`com_id`),
  KEY `fk_com_ent` (`ent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `com_author`, `com_body`, `ent_id`, `com_date`) VALUES
(1, 'Pellequiere01', 'Sed id diam quam. Praesent eget venenatis libero.', 1, '2014-01-06 10:00:00'),
(2, 'Anonymous', 'Lol', 1, '2014-01-06 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `entry`
--

CREATE TABLE IF NOT EXISTS `entry` (
  `ent_id` int(11) NOT NULL AUTO_INCREMENT,
  `ent_title` varchar(100) NOT NULL,
  `ent_body` varchar(400) NOT NULL,
  `ent_date` datetime NOT NULL,
  PRIMARY KEY (`ent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `entry`
--

INSERT INTO `entry` (`ent_id`, `ent_title`, `ent_body`, `ent_date`) VALUES
(1, 'Sed id diam quam', 'Fusce sodales arcu quam, non eleifend neque lobortis in. Maecenas et dignissim enim, fringilla interdum lacus. Morbi mattis tincidunt turpis, nec placerat leo bibendum in. Sed pharetra volutpat purus vitae gravida.', '2014-01-05 00:00:00'),
(2, 'Maecenas pretium', 'Pellentesque vel malesuada orci, eu feugiat sapien. Aliquam diam enim, semper sit amet hendrerit eu, aliquam sit amet sem. Donec bibendum nisl quis tellus imperdiet.<script>alert(''XSS protection'');</script>', '2014-01-07 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_com_ent` FOREIGN KEY (`ent_id`) REFERENCES `entry` (`ent_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
