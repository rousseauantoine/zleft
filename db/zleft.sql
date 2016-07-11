-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 02 Juillet 2016 à 01:55
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `zleft`
--
CREATE DATABASE IF NOT EXISTS `zleft` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `zleft`;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
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
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`com_id`, `com_author`, `com_body`, `ent_id`, `com_date`) VALUES
(1, 'Pellequiere01', 'Sed id diam quam. Praesent eget venenatis libero.', 1, '2014-01-06 10:00:00'),
(2, 'Anonymous', 'Lol', 1, '2014-01-06 12:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `entry`
--

DROP TABLE IF EXISTS `entry`;
CREATE TABLE IF NOT EXISTS `entry` (
  `ent_id` int(11) NOT NULL AUTO_INCREMENT,
  `ent_title` varchar(100) NOT NULL,
  `ent_body` varchar(400) NOT NULL,
  `ent_date` datetime NOT NULL,
  PRIMARY KEY (`ent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `entry`
--

INSERT INTO `entry` (`ent_id`, `ent_title`, `ent_body`, `ent_date`) VALUES
(1, 'Sed id diam quam', 'Fusce sodales arcu quam, non eleifend neque lobortis in. Maecenas et dignissim enim, fringilla interdum lacus. Morbi mattis tincidunt turpis, nec placerat leo bibendum in. Sed pharetra volutpat purus vitae gravida.', '2014-01-05 00:00:00'),
(2, 'Maecenas pretium', 'Pellentesque vel malesuada orci, eu feugiat sapien. Aliquam diam enim, semper sit amet hendrerit eu, aliquam sit amet sem. Donec bibendum nisl quis tellus imperdiet.<script>alert(''XSS protection'');</script>', '2014-01-07 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `zleft_acl_groups`
--

DROP TABLE IF EXISTS `zleft_acl_groups`;
CREATE TABLE IF NOT EXISTS `zleft_acl_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `zleft_acl_groups`
--

INSERT INTO `zleft_acl_groups` (`id`, `label`) VALUES
(1, 'Visitor'),
(2, 'Admin'),
(3, 'Others');

-- --------------------------------------------------------

--
-- Structure de la table `zleft_acl_groups2resources`
--

DROP TABLE IF EXISTS `zleft_acl_groups2resources`;
CREATE TABLE IF NOT EXISTS `zleft_acl_groups2resources` (
  `group_id` int(10) unsigned NOT NULL,
  `resource_id` int(10) unsigned NOT NULL,
  UNIQUE KEY `acl_group` (`group_id`,`resource_id`),
  KEY `acl_resource` (`resource_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `zleft_acl_groups2resources`
--

INSERT INTO `zleft_acl_groups2resources` (`group_id`, `resource_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(2, 2),
(3, 2),
(2, 3),
(2, 4),
(1, 5),
(2, 5),
(3, 5),
(1, 6),
(2, 6),
(3, 6),
(2, 7);

-- --------------------------------------------------------

--
-- Structure de la table `zleft_acl_resources`
--

DROP TABLE IF EXISTS `zleft_acl_resources`;
CREATE TABLE IF NOT EXISTS `zleft_acl_resources` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `zleft_acl_resources`
--

INSERT INTO `zleft_acl_resources` (`id`, `label`) VALUES
(1, 'index/index'),
(2, 'index/returnallentries'),
(3, 'entry/index'),
(4, 'entry/returnentry'),
(5, 'admin/index'),
(6, 'adminLogout/index'),
(7, 'ajaxIndex/getNumberEntries');

-- --------------------------------------------------------

--
-- Structure de la table `zleft_acl_users`
--

DROP TABLE IF EXISTS `zleft_acl_users`;
CREATE TABLE IF NOT EXISTS `zleft_acl_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `zleft_acl_users`
--

INSERT INTO `zleft_acl_users` (`id`, `login`, `password`) VALUES
(1, '', ''),
(2, 'jacques', 'jacques'),
(3, 'antoine', 'antoine');

-- --------------------------------------------------------

--
-- Structure de la table `zleft_acl_users2groups`
--

DROP TABLE IF EXISTS `zleft_acl_users2groups`;
CREATE TABLE IF NOT EXISTS `zleft_acl_users2groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  UNIQUE KEY `acl_user` (`user_id`,`group_id`),
  KEY `acl_group` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `zleft_acl_users2groups`
--

INSERT INTO `zleft_acl_users2groups` (`user_id`, `group_id`) VALUES
(1, 1),
(3, 2),
(2, 3);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_com_ent` FOREIGN KEY (`ent_id`) REFERENCES `entry` (`ent_id`);

--
-- Contraintes pour la table `zleft_acl_groups2resources`
--
ALTER TABLE `zleft_acl_groups2resources`
  ADD CONSTRAINT `zleft_acl_groups2resources_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `zleft_acl_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `zleft_acl_groups2resources_ibfk_2` FOREIGN KEY (`resource_id`) REFERENCES `zleft_acl_resources` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `zleft_acl_users2groups`
--
ALTER TABLE `zleft_acl_users2groups`
  ADD CONSTRAINT `zleft_acl_users2groups_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `zleft_acl_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `zleft_acl_users2groups_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `zleft_acl_groups` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
