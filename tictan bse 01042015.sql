-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 01 Avril 2015 à 14:34
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `tictan`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(2) NOT NULL AUTO_INCREMENT,
  `category` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`cat_id`, `category`) VALUES
(1, 'Fruits'),
(2, 'Colors'),
(3, 'Games'),
(4, 'Vehicles');

-- --------------------------------------------------------

--
-- Structure de la table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `cat_id` int(2) NOT NULL DEFAULT '0',
  `subcategory` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `subcategory`
--

INSERT INTO `subcategory` (`cat_id`, `subcategory`) VALUES
(1, 'Mango'),
(1, 'Banana'),
(1, 'Orange'),
(1, 'Apple'),
(2, 'Red'),
(2, 'Blue'),
(2, 'Green'),
(2, 'Yellow'),
(3, 'Cricket'),
(3, 'Football'),
(3, 'Baseball'),
(3, 'Tennis'),
(4, 'Cars'),
(4, 'Trucks'),
(4, 'Blkes'),
(4, 'Train');

-- --------------------------------------------------------

--
-- Structure de la table `tictan_accessories`
--

CREATE TABLE IF NOT EXISTS `tictan_accessories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `date_mod` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_dynamic` tinyint(1) NOT NULL DEFAULT '0',
  `accessoriestypes_id` int(11) NOT NULL DEFAULT '0',
  `manufacturers_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `date_mod` (`date_mod`),
  KEY `name` (`name`),
  KEY `manufacturers_id` (`manufacturers_id`),
  KEY `accessoriestypes_id` (`accessoriestypes_id`),
  KEY `is_deleted` (`is_deleted`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_accessoriesmodels`
--

CREATE TABLE IF NOT EXISTS `tictan_accessoriesmodels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `comment` text COLLATE utf8_unicode_ci,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mod_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `tictan_accessoriesmodels`
--

INSERT INTO `tictan_accessoriesmodels` (`id`, `name`, `is_deleted`, `comment`, `author`, `mod_date`) VALUES
(1, 'souris optique', 0, NULL, '', '0000-00-00'),
(2, 'Clavier anglais', 0, NULL, '', '0000-00-00'),
(3, 'clavier francais', 0, NULL, '', '0000-00-00'),
(4, 'Disque dur externe 500gigas', 0, NULL, '', '0000-00-00'),
(5, 'Disk dur externe 1Tera', 0, NULL, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `tictan_accessoriestypes`
--

CREATE TABLE IF NOT EXISTS `tictan_accessoriestypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mod_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `tictan_accessoriestypes`
--

INSERT INTO `tictan_accessoriestypes` (`id`, `name`, `comment`, `is_deleted`, `author`, `mod_date`) VALUES
(1, 'souris', NULL, 0, '', '0000-00-00'),
(2, 'clavier', NULL, 0, '', '0000-00-00'),
(3, 'Haut parleur', NULL, 0, '', '0000-00-00'),
(4, 'Disque externe', NULL, 0, '', '0000-00-00'),
(5, 'cle usb', NULL, 0, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `tictan_accessorymodels`
--

CREATE TABLE IF NOT EXISTS `tictan_accessorymodels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `tictan_accessorymodels`
--

INSERT INTO `tictan_accessorymodels` (`id`, `name`, `comment`) VALUES
(1, 'souris optique', NULL),
(2, 'Clavier anglais', NULL),
(3, 'clavier français', NULL),
(4, 'Disque dur externe 500gigas', NULL),
(5, 'Disk dur externe 1Tera', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_computermodels`
--

CREATE TABLE IF NOT EXISTS `tictan_computermodels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `mod_date` date NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Contenu de la table `tictan_computermodels`
--

INSERT INTO `tictan_computermodels` (`id`, `name`, `comment`, `mod_date`, `author`, `is_deleted`) VALUES
(1, 'Ordinateur de bureau HP 110-314nb (ENERGY STAR)(J2H16EA)', NULL, '0000-00-00', '', 0),
(2, 'HP - 22-2017nb ordinateur tout-en-un (ENERGY STAR) (K2C63EA)', NULL, '0000-00-00', '', 0),
(3, 'HP ordinateur de bureau HP ENVY Phoenix h9-1360ez', NULL, '0000-00-00', '', 0),
(4, 'HP Envy laptop', NULL, '0000-00-00', '', 0),
(5, 'Inspiron Compact Serie 3000', '', '0000-00-00', '', 0),
(14, 'Optiplex 330 ', NULL, '0000-00-00', '', 0),
(15, 'Optiplex 745', NULL, '0000-00-00', '', 0),
(16, 'Optiplex 360', NULL, '0000-00-00', '', 0),
(17, 'Cooler Master', NULL, '0000-00-00', '', 0),
(6, 'Inspiron Compact Serie 3000', 'Inspiron Compact Serie 3000\r\n340,64 euros\r\nProcesseur double coeur Intel Celeron\r\nProcesseur double coeur Intel Celeron\r\nWindows 8.1 with Bing\r\nWindows 8.1 with Bing\r\n4 Go de memoire\r\n4 Go de memoire\r\nDisque dur de 500 Go\r\nDisque dur de 500 Go\r\nOrdinateur de bureau d entree de gamme a un prix attractif, equipe de Windows 8.1 et accompagne d un ecran large 19,5"', '0000-00-00', '', 0),
(7, 'Inspiron 15 Série 5000 (laptop)', 'Inspiron 15 Serie 5000 (Intel) avec ecran tactile disponible sur certains modeles', '0000-00-00', '', 1),
(8, 'Inspiron 15 Serie 5000 (laptop)', 'Inspiron 15 Serie 5000 (Intel)\n649,00 euros\nProcesseur Intel Core i7 de 4e generation\nProcesseur Intel Core i7 de 4e generation\nWindows 8.1\nWindows 8.1\n8 Go de memoire\n8 Go de memoire\nDisque dur de 1 To\nDisque dur de 1 To', '0000-00-00', '', 0),
(11, 'HP - 22-2005nb ordinateur tout-en-un (ENERGY STAR) (K2A29EA)', NULL, '0000-00-00', '', 0),
(12, 'Le prix serveur le plus bas Avec le NOUVEAU systeme d exploitation Windows Server 2012 Foundation Disque dur 1 To et 3 ans de ProSupport  Ajouter pour comparer En savoir plusDell PowerEdge T110 II  Ajouter pour comparer En savoir plusDell PowerEdge T110', NULL, '0000-00-00', '', 0),
(13, 'Dell PowerEdge T320', NULL, '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_computers`
--

CREATE TABLE IF NOT EXISTS `tictan_computers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `date_mod` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_dynamic` tinyint(1) NOT NULL DEFAULT '0',
  `computermodels_id` int(11) NOT NULL DEFAULT '0',
  `computertypes_id` int(11) NOT NULL DEFAULT '0',
  `manufacturers_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `date_mod` (`date_mod`),
  KEY `name` (`name`),
  KEY `manufacturers_id` (`manufacturers_id`),
  KEY `computermodels_id` (`computermodels_id`),
  KEY `computertypes_id` (`computertypes_id`),
  KEY `is_deleted` (`is_deleted`),
  KEY `is_dynamic` (`is_dynamic`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_computers_items`
--

CREATE TABLE IF NOT EXISTS `tictan_computers_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `items_id` int(11) NOT NULL DEFAULT '0' COMMENT 'RELATION to various table, according to itemtype (ID)',
  `itemtype` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_dynamic` tinyint(1) NOT NULL DEFAULT '0',
  `computers_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `computers_id` (`computers_id`),
  KEY `item` (`itemtype`,`items_id`),
  KEY `is_deleted` (`is_deleted`),
  KEY `is_dynamic` (`is_dynamic`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_computers_softwarelicenses`
--

CREATE TABLE IF NOT EXISTS `tictan_computers_softwarelicenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_dynamic` tinyint(1) NOT NULL DEFAULT '0',
  `computers_id` int(11) NOT NULL DEFAULT '0',
  `softwarelicenses_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unicity` (`computers_id`,`softwarelicenses_id`),
  KEY `computers_id` (`computers_id`),
  KEY `softwarelicenses_id` (`softwarelicenses_id`),
  KEY `is_deleted` (`is_deleted`),
  KEY `is_dynamic` (`is_dynamic`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_computers_softwareversions`
--

CREATE TABLE IF NOT EXISTS `tictan_computers_softwareversions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `computers_id` int(11) NOT NULL DEFAULT '0',
  `softwareosversionpack_id` int(11) NOT NULL DEFAULT '0',
  `entities_id` int(11) NOT NULL DEFAULT '0',
  `customers_id` int(11) NOT NULL DEFAULT '0',
  `is_dynamic` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unicity` (`computers_id`,`softwareosversionpack_id`),
  KEY `entities_id` (`entities_id`),
  KEY `customers_id` (`customers_id`),
  KEY `softwareosversionpack_id` (`softwareosversionpack_id`),
  KEY `is_deleted` (`is_deleted`),
  KEY `is_dynamic` (`is_dynamic`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_computertypes`
--

CREATE TABLE IF NOT EXISTS `tictan_computertypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `mod_date` date NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `tictan_computertypes`
--

INSERT INTO `tictan_computertypes` (`id`, `name`, `comment`, `mod_date`, `author`, `is_deleted`) VALUES
(1, 'station de travail', NULL, '0000-00-00', '', 0),
(2, 'serveur', NULL, '0000-00-00', '', 0),
(3, 'tablette', NULL, '0000-00-00', '', 0),
(4, 'ordinateur portable', NULL, '0000-00-00', '', 0),
(5, 'ordinateur de bureau', NULL, '0000-00-00', '', 0),
(6, 'Autres', NULL, '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_contacts`
--

CREATE TABLE IF NOT EXISTS `tictan_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_id` int(11) NOT NULL DEFAULT '0',
  `entities_id` int(11) NOT NULL,
  `is_recursive` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contacttypes_id` int(11) NOT NULL DEFAULT '0',
  `comment` text COLLATE utf8_unicode_ci,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `usertitles_id` int(11) NOT NULL DEFAULT '0',
  `address` text COLLATE utf8_unicode_ci,
  `postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `town` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `customers_id` (`customers_id`),
  KEY `contacttypes_id` (`contacttypes_id`),
  KEY `is_deleted` (`is_deleted`),
  KEY `usertitles_id` (`usertitles_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `tictan_contacts`
--

INSERT INTO `tictan_contacts` (`id`, `customers_id`, `entities_id`, `is_recursive`, `name`, `firstname`, `phone`, `phone2`, `mobile`, `fax`, `email`, `contacttypes_id`, `comment`, `is_deleted`, `usertitles_id`, `address`, `postcode`, `town`, `state`, `country`) VALUES
(1, 1, 0, 0, 'Mr Dupond client', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL),
(2, 2, 0, 0, 'Van den Bogaert', 'Jan', '+325648541', NULL, NULL, NULL, NULL, 1, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_contacts_suppliers`
--

CREATE TABLE IF NOT EXISTS `tictan_contacts_suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `suppliers_id` int(11) NOT NULL DEFAULT '0',
  `contacts_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unicity` (`suppliers_id`,`contacts_name`),
  KEY `contacts_name` (`contacts_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `tictan_contacts_suppliers`
--

INSERT INTO `tictan_contacts_suppliers` (`id`, `suppliers_id`, `contacts_name`) VALUES
(1, 1, 'Jan Ceulemans'),
(2, 2, 'Joris Van de putte');

-- --------------------------------------------------------

--
-- Structure de la table `tictan_contacttypes`
--

CREATE TABLE IF NOT EXISTS `tictan_contacttypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `comment` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `tictan_contacttypes`
--

INSERT INTO `tictan_contacttypes` (`id`, `name`, `is_deleted`, `comment`) VALUES
(1, 'responsable', 0, NULL),
(2, 'secretaire', 0, NULL),
(3, 'utilisateur', 0, NULL),
(4, 'technicien', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_contractcosts`
--

CREATE TABLE IF NOT EXISTS `tictan_contractcosts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contracts_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `begin_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `cost` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `customers_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `contracts_id` (`contracts_id`),
  KEY `begin_date` (`begin_date`),
  KEY `end_date` (`end_date`),
  KEY `customers_id` (`customers_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_contracts`
--

CREATE TABLE IF NOT EXISTS `tictan_contracts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entities_id` int(11) NOT NULL DEFAULT '0',
  `is_recursive` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contracttypes_id` int(11) NOT NULL DEFAULT '0',
  `begin_date` date DEFAULT NULL,
  `duration` int(11) NOT NULL DEFAULT '0',
  `notice` int(11) NOT NULL DEFAULT '0',
  `periodicity` int(11) NOT NULL DEFAULT '0',
  `billing` int(11) NOT NULL DEFAULT '0',
  `comment` text COLLATE utf8_unicode_ci,
  `accounting_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `week_begin_hour` time NOT NULL DEFAULT '00:00:00',
  `week_end_hour` time NOT NULL DEFAULT '00:00:00',
  `saturday_begin_hour` time NOT NULL DEFAULT '00:00:00',
  `saturday_end_hour` time NOT NULL DEFAULT '00:00:00',
  `use_saturday` tinyint(1) NOT NULL DEFAULT '0',
  `monday_begin_hour` time NOT NULL DEFAULT '00:00:00',
  `monday_end_hour` time NOT NULL DEFAULT '00:00:00',
  `use_monday` tinyint(1) NOT NULL DEFAULT '0',
  `max_links_allowed` int(11) NOT NULL DEFAULT '0',
  `alert` int(11) NOT NULL DEFAULT '0',
  `renewal` int(11) NOT NULL DEFAULT '0',
  `template_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_template` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `begin_date` (`begin_date`),
  KEY `name` (`name`),
  KEY `contracttypes_id` (`contracttypes_id`),
  KEY `entities_id` (`entities_id`),
  KEY `is_deleted` (`is_deleted`),
  KEY `use_monday` (`use_monday`),
  KEY `use_saturday` (`use_saturday`),
  KEY `alert` (`alert`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_contracts_items`
--

CREATE TABLE IF NOT EXISTS `tictan_contracts_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contracts_id` int(11) NOT NULL DEFAULT '0',
  `items_id` int(11) NOT NULL DEFAULT '0',
  `itemtype` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unicity` (`contracts_id`,`itemtype`,`items_id`),
  KEY `FK_device` (`items_id`,`itemtype`),
  KEY `item` (`itemtype`,`items_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_contracts_suppliers`
--

CREATE TABLE IF NOT EXISTS `tictan_contracts_suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `suppliers_id` int(11) NOT NULL DEFAULT '0',
  `contracts_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unicity` (`suppliers_id`,`contracts_id`),
  KEY `contracts_id` (`contracts_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_contracttypes`
--

CREATE TABLE IF NOT EXISTS `tictan_contracttypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_copiermodels`
--

CREATE TABLE IF NOT EXISTS `tictan_copiermodels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `date_mod` date NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `tictan_copiermodels`
--

INSERT INTO `tictan_copiermodels` (`id`, `name`, `comment`, `date_mod`, `author`, `is_deleted`) VALUES
(3, 'TASKalfa 5501i', 'Up to 55 pages per minute A4 in b/w\r\n    2 GB RAM, storage capacity of 160 GB HDD\r\n    Standard network printing and colour scanning\r\n    Expandable fax functions of dual fax, network fax, and internet fax\r\n    Optional scan to searchable PDF solution (OCR)\r\n    Individual paper-handling options including booklet and tri-folding\r\n    Comprehensive security functions including optional IC Card Reader\r\n    Long-life components provide unprecedented efficiency and reliability', '0000-00-00', '', 0),
(2, 'Multifonction SG 3120B SFNw', NULL, '0000-00-00', '', 0),
(4, 'Canon MAXIFY MB2050', 'Imprimantes jet d encre professionnelles', '0000-00-00', '', 0),
(5, 'Canon i-SENSYS MF8230Cn', '', '0000-00-00', '', 0),
(6, 'Aficio™MP 301SP', 'Multifonctions N&B A4 compacts de qualite superieure', '2015-02-10', '', 0),
(7, 'MP C6502SP', 'Caracteristiques et avantages\r\n\r\n    Impression ultra rapide\r\n\r\n    Haute qualite d''image\r\n\r\n    Un large choix de supports papier\r\n\r\n    Facile à utiliser\r\n\r\n    Accelerez vos flux de travaux ', '2015-02-10', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_copierstypes`
--

CREATE TABLE IF NOT EXISTS `tictan_copierstypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `date_mod` date NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `tictan_copierstypes`
--

INSERT INTO `tictan_copierstypes` (`id`, `name`, `comment`, `date_mod`, `author`, `is_deleted`) VALUES
(1, 'Photocopieur noir et blanc', NULL, '0000-00-00', '', 0),
(2, 'Photocopieur couleur', NULL, '0000-00-00', '', 0),
(3, 'All in One', NULL, '0000-00-00', '', 0),
(4, 'Multifonction Noir et Blanc', NULL, '2015-02-10', 'felicien', 0),
(5, 'Multifonction Couleur', NULL, '2015-02-10', 'felicien', 0),
(6, 'Telecopieur', NULL, '2015-02-10', 'felicien', 0),
(7, 'Imprimante de Production', NULL, '2015-02-10', 'felicien', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_coprintermodels`
--

CREATE TABLE IF NOT EXISTS `tictan_coprintermodels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `date_mod` date NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Contenu de la table `tictan_coprintermodels`
--

INSERT INTO `tictan_coprintermodels` (`id`, `name`, `comment`, `is_deleted`, `date_mod`, `author`) VALUES
(5, 'Lexmark 450', NULL, 0, '2015-02-04', 'felicien'),
(6, 'HP lasert 3450', NULL, 0, '2015-02-04', 'nezzi'),
(7, 'HP color serie 5000', NULL, 0, '2015-02-04', 'nezzi'),
(8, 'All in One HP 452', NULL, 0, '2015-02-04', 'nezzi'),
(9, 'HP J4680', NULL, 0, '0000-00-00', ''),
(10, 'Brother HL-2035', NULL, 0, '0000-00-00', ''),
(11, 'DELL V525w', NULL, 0, '0000-00-00', ''),
(12, 'HP 8500 Office JetPro', NULL, 0, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Structure de la table `tictan_coprintersmodels`
--

CREATE TABLE IF NOT EXISTS `tictan_coprintersmodels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `date_mod` datetime DEFAULT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_dynamic` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_coprinterstypes`
--

CREATE TABLE IF NOT EXISTS `tictan_coprinterstypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `date_med` date NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `tictan_coprinterstypes`
--

INSERT INTO `tictan_coprinterstypes` (`id`, `name`, `comment`, `is_deleted`, `date_med`, `author`) VALUES
(4, 'Imprimante Noir et Blanc', NULL, 0, '2015-02-04', 'felicien'),
(5, 'Imprimante Couleur', NULL, 0, '2015-02-04', 'felicien'),
(6, 'All in One', NULL, 0, '2015-02-04', 'felicien');

-- --------------------------------------------------------

--
-- Structure de la table `tictan_coprintertypes`
--

CREATE TABLE IF NOT EXISTS `tictan_coprintertypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `date_mod` datetime DEFAULT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_dynamic` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_customers`
--

CREATE TABLE IF NOT EXISTS `tictan_customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `town` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mod_date` date DEFAULT NULL,
  `entities_id` int(11) NOT NULL,
  `customtype_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `entities_id` (`entities_id`),
  KEY `customer_name` (`customer_name`),
  KEY `is_deleted` (`is_deleted`),
  KEY `customtype` (`customtype_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Contenu de la table `tictan_customers`
--

INSERT INTO `tictan_customers` (`id`, `customer_name`, `phone`, `mobile`, `fax`, `email`, `website`, `comment`, `is_deleted`, `address`, `postcode`, `town`, `state`, `country`, `author`, `mod_date`, `entities_id`, `customtype_id`) VALUES
(8, 'Client Site 5', '23313132', '213132131', '132131321', 'mail@gg.com', 'www.g.com', 'ï¿½ï¿½ï¿½ï¿½', 0, 'Avenue de Tervuren; 105', '1050', 'Bruxelles', 'Bruxelles Capitale', 'BEL', 'moi meme', '2015-01-14', 5, 4),
(9, 'Site Client 8', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 4),
(10, 'Site Client 8', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 4),
(11, 'Client marche bio', '101101111', '0000', '0000', 'bio@gmail.com', 'www.bio.com', 'commentaire marche bio', 0, 'Avenue de Tervuren, 458 A', '1000', 'Bruxelles', 'Bxl-Capitale', 'Belgique', 'moi meme', '2015-01-13', 9, 4),
(12, 'CLINET AAA', '32121231', '02 45455555', '02  4565445454', 'g@mial.com', 'www.ggg.com', 'rrrrrrrtttttttttttttttttttoouyiugkk', 0, 'Avenue de Tervuren, 458 A', '1000', 'Bxles', 'Bxl-Capitale', 'BEL', 'moi meme', '2015-01-13', 10, 4),
(13, 'sd', 'dfs', 'dfs', 'df', 'fnezzi@gmail.com', 'sdfdfs', '', 1, 'dss', 'sdf', 'sdf', 'sdf', 'sdf', '', '0000-00-00', 11, 7),
(14, 'cccc', '0122132123', '', '', '', '', '', 1, 'c', 'c', 'c', 'c', 'bel', '', '0000-00-00', 9, 7),
(15, 'Client entite 1', '02 02 002000', '0458 25 21 25', '02 02 002000', 'client1@gmail.com', 'www.client.com', 'RAS', 0, 'Rue de l''entite 1', '1000', 'Bruxelles', 'Bxl Capitale', 'BEL', 'felicien', '2015-01-13', 16, 7),
(16, 'Client 2 entite 1', '02 520 25 25', '0480 50 50 50', '02 520 25 25', 'client2@gmail.com', 'www.entite1.com', 'RAS Client 2 entite 1', 0, 'Rue entite 2', 'Bruxelles', '1000', 'Bxl Capitale', 'BEL', 'felicien', '2015-01-13', 16, 7),
(17, 'Client 6 entite 4', '041 10 10 10 ', '0460 66 66 66 ', '041 10 10 11', 'client6@hotmail.com', 'www.entite4.com', 'RAS client 5 entite 4', 1, 'Rue client 6 , 52', '4000', 'Soumagne', 'PROVINCE DE LIEGE', 'Belgique', 'felicien', '2015-01-13', 17, 6),
(18, 'Client 4 entite 3', '02 450 45 45', '0485 36 39 40', '02 450 45 46', 'client4@yahoo.com', 'www.siteweb.com', 'Pas de sit web MODIFIE EN REMARQUE', 0, 'Rue Client 4', '1050', 'Bruxelles', 'Bruxelles Capitale', 'Belgique', 'felicien', '2015-01-14', 9, 3),
(19, 'Client 5 entite 4', '02 500 10 10', '0485 00 00 01', '02 500 10 10', 'client5@entite4.com', 'www.entite5.com', 'RAS Client 5 entite 4', 0, 'Rue du client 5', '1060', 'Bruxelles', 'Bruxelles capitale', 'Belgique', 'felicien', '2015-01-13', 16, 6),
(20, 'Client 6 entite 4', '041 10 10 10 ', '0460 66 66 66 ', '041 10 10 11', 'client6@hotmail.com', 'www.entite4.com', 'RAS client 5 entite 4', 0, 'Rue client 6 , 52', '4000', 'Liege', 'PROVINCE DE LIEGE', 'Belgique', 'felicien', '2015-01-13', 17, 7),
(21, 'Client CPAS', '02 125 125 125', '0484 52 52 53', '02 12 45 78 9', 'f@gmail.com', 'www.cpas.be', 'RAS Commentaires', 1, 'Rue du client CPAS', '1000', 'Bruxelles', 'Bruxelles capitale', 'Belgique', 'felicien le noir', '2015-02-21', 20, 7),
(22, 'Patien Assistance Client', '02 125 125 125', '', '', '', '', '', 0, 'Rue Leon Thedor, 89', '1090', 'Jette', 'Bruxelles capitale', 'Belgique', '', '0000-00-00', 22, 4);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_customers_contacts`
--

CREATE TABLE IF NOT EXISTS `tictan_customers_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_id` int(11) NOT NULL DEFAULT '0',
  `entities_id` int(11) NOT NULL DEFAULT '0',
  `is_recursive` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contacttypes_id` int(11) NOT NULL DEFAULT '0',
  `comment` text COLLATE utf8_unicode_ci,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `address` text COLLATE utf8_unicode_ci,
  `postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `town` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'felicien',
  `mod_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `customers_id` (`customers_id`),
  KEY `contacttypes_id` (`contacttypes_id`),
  KEY `is_deleted` (`is_deleted`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Contenu de la table `tictan_customers_contacts`
--

INSERT INTO `tictan_customers_contacts` (`id`, `customers_id`, `entities_id`, `is_recursive`, `name`, `firstName`, `phone`, `phone2`, `mobile`, `fax`, `email`, `contacttypes_id`, `comment`, `is_deleted`, `address`, `postcode`, `town`, `state`, `country`, `author`, `mod_date`) VALUES
(1, 15, 16, 0, 'Mr Dupond client lient 15 entite 16', 'Prenom Georges Dupond', '0420 12 12', NULL, '048520 36 41 ', NULL, 'dupond@gmail.com', 1, NULL, 0, NULL, '1000', 'Bruxelles', 'Bruxelles-Capiltale', 'BEL', 'felicien', '0000-00-00'),
(2, 8, 17, 0, 'Van den Bogaert', 'Jan', '+325648541', NULL, '0485 20 20 20', NULL, 'jan@yahoo;com', 1, 'Zone de commentaire', 0, NULL, '1020', 'Bruxelles', 'Bruxelles Capitale', 'BEL', 'felicien', '0000-00-00'),
(3, 16, 16, 0, 'contact client 16 entite 16', 'prenom contact client 16 entite 16', '02 45 45 46', '', '0460 50 50 41', '', 'prenom@yahoo.fr', 2, '', 1, 'Rues de la meme adresse', '1000', 'Bruxelles', 'Bruxelles capitale', 'BEL', 'felicien', '0000-00-00'),
(4, 15, 16, 0, 'contact1', 'Prenom contact entite 1', '02 450 56 52', '02 450 52 53', '0485 20 20', '02 520 11 11', 'fnezzi@yahoo.com', 4, 'Zone remarque', 0, 'rue', '1000', 'ville', 'Bruxelles Capitale', 'BEL', '', '0000-00-00'),
(5, 16, 16, 0, 'contact du client 2', 'prenom du contact du client 2', '02 02 002000', '02 540 50 50', '0485 23 25 25', '02 5645745', 'fnezzi@yahoo.com', 3, '', 0, 'Avenue de Tervuren, 458 A', '1000', 'Bruxelles', 'Bruxelles Capitale', 'Belgique', '', '2015-01-14'),
(7, 16, 16, 0, 'Nom contact', 'Prenom contact', '02523522', '', '', '', '', 1, '', 0, 'Rue de l''adresse', '1020', 'Bruxelles', '', 'Belgique', '', '0000-00-00'),
(8, 15, 16, 0, 'Nom contact Mbangula', '11032015 prenom TIMO', '02 585 21 21', '02 452 23 56', '0480 20 20 20', '02 350 25 25', 'g@gmail.com', 4, 'RAS commentaire', 0, 'Rue de l''Azawad', '1000', 'Bruxelle', 'Bruxelles capitale', 'Belgique', 'Gisele', '2015-03-03'),
(9, 22, 22, 0, ' Defosse', 'Xavier', '02 4235753', '', '0485 842 233', '', '', 1, '', 0, 'Rue Leonn Theodor, 89', '1090', 'Jette', 'Bruxelles capitale', 'Belgique', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `tictan_customers_copiers`
--

CREATE TABLE IF NOT EXISTS `tictan_customers_copiers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serial` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `copiersmodels_id` int(11) NOT NULL DEFAULT '0',
  `copierstypes_id` int(11) NOT NULL DEFAULT '0',
  `adresseip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeadressage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `connexionvia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ticket_tco` decimal(10,0) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `date_mod` date DEFAULT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_dynamic` tinyint(1) NOT NULL DEFAULT '0',
  `users_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `groups_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `customers_id` int(11) NOT NULL DEFAULT '0',
  `entities_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `entities_id` (`entities_id`),
  KEY `date_mod` (`date_mod`),
  KEY `name` (`name`),
  KEY `copiersmodels_id` (`copiersmodels_id`),
  KEY `copierstypes_id` (`copierstypes_id`),
  KEY `customers_id` (`customers_id`),
  KEY `groups_id` (`groups_id`),
  KEY `users_id` (`users_id`),
  KEY `is_deleted` (`is_deleted`),
  KEY `serial` (`serial`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `tictan_customers_copiers`
--

INSERT INTO `tictan_customers_copiers` (`id`, `name`, `serial`, `copiersmodels_id`, `copierstypes_id`, `adresseip`, `typeadressage`, `connexionvia`, `location`, `ticket_tco`, `comment`, `date_mod`, `author`, `is_deleted`, `is_dynamic`, `users_id`, `groups_id`, `customers_id`, `entities_id`) VALUES
(1, 'photocopieur secretariat', 'seriephotocopieur', 2, 2, '192.0.168.52', 'Fixe', 'RJ45', 'rez de chaussee', NULL, NULL, '0000-00-00', '', 1, 0, 'Gisele', 'Comptabilite', 11, 9),
(2, 'p', 's', 2, 2, '192.168.6.800000', 'Dynamique', 'connexion via', '2eme bureau', NULL, 'RAS Commentaires', NULL, 'RAS Commentaires', 0, 0, 'Gisele', 'Comptabilite', 11, 9),
(3, 'Photocopieur', 'qsdsdfsdfsd', 2, 1, 'sdfsdfsdf', 'sdfsdfsdfsd', 'fsdfsdfs', 'sdfsdfsd', NULL, 'sdfsdfs', NULL, 'sdffsdfzd', 0, 0, 'sdfsdfsd', 'fsfsfs', 13, 11),
(4, 'photocopieur noir', 'serie noire', 4, 1, '192.1683.100.2', 'fixe noir', 'connexion noire', 'lieu noir', NULL, 'RAS commentaire Noir', '0000-00-00', 'RAS commentaire Noir', 0, 0, 'felicien noir', 'Groupe Noir', 11, 9),
(5, 'COPIEUR TRES NOIR noir', 'serine noire', 2, 1, 'adresse noire', 'Dynamique', 'connexion noire', 'lieu noir', NULL, 'Commentairte ', '2015-03-03', 'felicien noire ', 1, 0, 'user noir', 'groupe noir', 11, 9);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_customers_coprinters`
--

CREATE TABLE IF NOT EXISTS `tictan_customers_coprinters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serial` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coprinterstypes_id` int(11) NOT NULL DEFAULT '0',
  `coprintersmodels_id` int(11) NOT NULL DEFAULT '0',
  `adresseip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeadressage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `connexionvia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ticket_tco` decimal(10,0) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `date_mod` datetime DEFAULT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_dynamic` tinyint(1) NOT NULL DEFAULT '0',
  `users_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `groups_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `customers_id` int(11) NOT NULL DEFAULT '0',
  `entities_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `entities_id` (`entities_id`),
  KEY `date_mod` (`date_mod`),
  KEY `name` (`name`),
  KEY `coprintersmodels_id` (`coprintersmodels_id`),
  KEY `coprinterstypes_id` (`coprinterstypes_id`),
  KEY `customers_id` (`customers_id`),
  KEY `groups_id` (`groups_id`),
  KEY `users_id` (`users_id`),
  KEY `is_deleted` (`is_deleted`),
  KEY `serial` (`serial`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `tictan_customers_coprinters`
--

INSERT INTO `tictan_customers_coprinters` (`id`, `name`, `serial`, `coprinterstypes_id`, `coprintersmodels_id`, `adresseip`, `typeadressage`, `connexionvia`, `location`, `ticket_tco`, `comment`, `date_mod`, `author`, `is_deleted`, `is_dynamic`, `users_id`, `groups_id`, `customers_id`, `entities_id`) VALUES
(1, 'IMP001', 'serie machine entite1', 5, 7, '192.168.0.250', 'fixe', 'RJ45', 'Salle machine', NULL, 'RAS', '2015-02-04 00:00:00', 'felicien', 0, 0, 'Pierre', 'Groupe Compta', 11, 9),
(2, 'Imp002', 'serie all in one', 6, 8, 'NULL', 'Fixe', 'via cable', 'Salle reserve', NULL, 'RAS', '0000-00-00 00:00:00', 'felicien', 0, 0, 'Paul', 'Finance', 16, 16),
(3, 'imprimante surprise', '111111', 5, 6, '192.165.12.1', 'Dynamique', 'RJ45', '2eme etage salle 2.100a', NULL, 'RAS AS', '2015-02-26 00:00:00', 'felicien', 1, 0, 'Cesar', 'Finance', 11, 9),
(5, 'IMP-01', '123456789', 5, 9, '', 'DHCP', 'RJ45', '2eme etage bureau 101', NULL, 'test de saisie', '2015-03-24 00:00:00', '', 0, 0, 'Syhan', '', 22, 22);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_customers_disk`
--

CREATE TABLE IF NOT EXISTS `tictan_customers_disk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `computers_id` int(11) NOT NULL DEFAULT '0',
  `customers_id` int(11) NOT NULL DEFAULT '0',
  `entities_id` int(11) NOT NULL DEFAULT '0',
  `date_mod` date DEFAULT NULL,
  `diskmodel_id` int(11) DEFAULT '0',
  `disktype_id` int(11) DEFAULT '0',
  `partition1` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `partition2` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `partition3` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_dynamic` tinyint(1) NOT NULL DEFAULT '0',
  `users_id` varchar(30) COLLATE utf8_unicode_ci DEFAULT '0',
  `ticket_tco` decimal(20,4) DEFAULT '0.0000',
  `comment` text COLLATE utf8_unicode_ci,
  `author` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'felicien',
  PRIMARY KEY (`id`),
  KEY `date_mod` (`date_mod`),
  KEY `entities_id` (`entities_id`),
  KEY `customers_id` (`customers_id`),
  KEY `computers_id` (`computers_id`),
  KEY `users_id` (`users_id`),
  KEY `is_deleted` (`is_deleted`),
  KEY `is_dynamic` (`is_dynamic`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_customers_group`
--

CREATE TABLE IF NOT EXISTS `tictan_customers_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_id` int(11) NOT NULL DEFAULT '0',
  `entities_id` int(11) NOT NULL DEFAULT '0',
  `is_recursive` tinyint(1) NOT NULL DEFAULT '0',
  `groupname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'felicien',
  `mod_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customers_id` (`customers_id`),
  KEY `entities_id` (`entities_id`),
  KEY `is_deleted` (`is_deleted`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `tictan_customers_group`
--

INSERT INTO `tictan_customers_group` (`id`, `customers_id`, `entities_id`, `is_recursive`, `groupname`, `comment`, `is_deleted`, `country`, `author`, `mod_date`) VALUES
(9, 11, 12, 0, 'Comptabilité', NULL, 0, NULL, 'felicien', '2015-01-20'),
(10, 16, 15, 0, 'Technique', NULL, 0, 'BEL', 'felicien', '2015-01-22');

-- --------------------------------------------------------

--
-- Structure de la table `tictan_customers_monitor`
--

CREATE TABLE IF NOT EXISTS `tictan_customers_monitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serial` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customers_id` int(11) NOT NULL DEFAULT '0',
  `entities_id` int(11) NOT NULL DEFAULT '0',
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `date_mod` datetime DEFAULT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `monitormodels_id` int(11) NOT NULL DEFAULT '0',
  `monitortypes_id` int(11) NOT NULL DEFAULT '0',
  `ticket_tco` decimal(10,0) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_dynamic` tinyint(1) NOT NULL DEFAULT '0',
  `users_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `groups_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `date_mod` (`date_mod`),
  KEY `name` (`name`),
  KEY `entities_id` (`entities_id`),
  KEY `customers_id` (`customers_id`),
  KEY `groups_id` (`groups_id`),
  KEY `users_id` (`users_id`),
  KEY `monitormodels_id` (`monitormodels_id`),
  KEY `is_deleted` (`is_deleted`),
  KEY `serial` (`serial`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `tictan_customers_monitor`
--

INSERT INTO `tictan_customers_monitor` (`id`, `name`, `serial`, `customers_id`, `entities_id`, `location`, `comment`, `date_mod`, `author`, `monitormodels_id`, `monitortypes_id`, `ticket_tco`, `is_deleted`, `is_dynamic`, `users_id`, `groups_id`) VALUES
(1, 'Ecran 01', 'serie 1', 11, 9, 'salle machine', 'RAS', '2015-02-04 00:00:00', 'felicien', 9, 5, NULL, 0, 0, '0', '0'),
(2, 'nom specila imprimante', 'serie speciale', 11, 9, 'Lieu sale', 'Commentaire', '2015-02-04 00:00:00', 'moi meme', 8, 3, NULL, 0, 0, '', ''),
(3, 'ecran noir', 'serie ecran noirnew', 11, 9, 'lieu ecran noir', 'RAS ecran noir', '2015-02-25 00:00:00', 'felicien noir', 10, 1, NULL, 0, 0, 'user noir', 'grouipe noir MAIS UN PEU CLMAI'),
(4, 'Ecran rouge', 'serie12322445665', 11, 9, 'lieu rouge', 'ECRAN ROUGE MODIFIE', '2015-02-25 00:00:00', 'felicien rouge', 10, 3, NULL, 0, 0, 'user rouge', 'Rouge');

-- --------------------------------------------------------

--
-- Structure de la table `tictan_customers_software`
--

CREATE TABLE IF NOT EXISTS `tictan_customers_software` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `licence` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `editor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `supplier` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `computers_id` int(11) NOT NULL DEFAULT '0',
  `customers_id` int(11) NOT NULL DEFAULT '0',
  `entities_id` int(11) NOT NULL DEFAULT '0',
  `date_mod` date DEFAULT NULL,
  `softmodel_id` int(11) NOT NULL DEFAULT '0',
  `softype_id` int(11) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_dynamic` tinyint(1) NOT NULL DEFAULT '0',
  `users_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `groups_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ticket_tco` decimal(20,4) DEFAULT '0.0000',
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `author` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'felicien',
  `mod_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `date_mod` (`date_mod`),
  KEY `start_date` (`start_date`),
  KEY `end_date` (`end_date`),
  KEY `entities_id` (`entities_id`),
  KEY `customers_id` (`customers_id`),
  KEY `groups_id` (`groups_id`),
  KEY `users_id` (`users_id`),
  KEY `os_id` (`softmodel_id`),
  KEY `ostype_id` (`softype_id`),
  KEY `is_deleted` (`is_deleted`),
  KEY `is_dynamic` (`is_dynamic`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `tictan_customers_software`
--

INSERT INTO `tictan_customers_software` (`id`, `name`, `licence`, `editor`, `supplier`, `computers_id`, `customers_id`, `entities_id`, `date_mod`, `softmodel_id`, `softype_id`, `is_deleted`, `is_dynamic`, `users_id`, `groups_id`, `ticket_tco`, `uuid`, `start_date`, `end_date`, `comment`, `author`, `mod_date`) VALUES
(1, 'Nom du software', 'licence NEW', 'NEZZI moi meme', 'Fournisseur de service', 0, 11, 9, '2015-02-04', 8, 2, 1, 0, 'Felicien', 'Finance', '0.0000', NULL, '2015-02-17', '2016-03-05', 'Commentaire  Mis a jour', 'felicien', '0000-00-00'),
(2, 'Bureautique MS OFFICE', 'Licence entitÃ© 1 client 1', 'Editeur Entite 1 Client 1', 'supplier, logiciel Entite', 0, 15, 16, '2015-02-04', 5, 8, 0, 0, '0', '0', '0.0000', NULL, '2015-02-27', '2016-02-24', 'Remarque plus commentaire', 'felicien', '0000-00-00'),
(3, 'B.I', '123456789', 'SAP', 'SAP', 0, 15, 16, '2015-02-04', 13, 7, 0, 0, '0', '0', '0.0000', NULL, '2015-02-27', '2016-05-20', 'ras', 'felicien', '0000-00-00'),
(4, 'logiciel noir', 'licence noir', 'editeur noir', 'Fournisseur noir', 0, 11, 9, '2015-02-21', 8, 2, 0, 0, 'user noir', 'Groupe noir', '0.0000', NULL, '2015-03-03', '2016-03-02', 'Commentairte noirE', 'felicien noir', '0000-00-00'),
(5, '2eme logiciel', 'Licence logiciel', 'Editeur NEW VRP', 'Microsoft', 0, 11, 9, '2015-02-25', 12, 3, 1, 0, 'user PRIS SOIN', 'Finance', '0.0000', NULL, '0000-00-00', '0000-00-00', 'COmmentaire qsdfhsdhmlsdhaSDHAlqsdh', 'felicien noire', '0000-00-00'),
(6, 'businee object', 'licence 123456', 'IBM', 'SAARI', 0, 11, 9, '2015-02-25', 13, 7, 0, 0, 'felicien noir', 'Finance', '0.0000', NULL, '2014-01-01', '2015-06-01', 'ZOne commentaire RAS WWWWWWWWWWWWWWWWWWWWWWWWWWWWWMMMMMMMMM', 'felicien le noir', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `tictan_customers_users`
--

CREATE TABLE IF NOT EXISTS `tictan_customers_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_id` int(11) NOT NULL DEFAULT '0',
  `entities_id` int(11) NOT NULL DEFAULT '0',
  `is_recursive` tinyint(1) NOT NULL DEFAULT '0',
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `address` text COLLATE utf8_unicode_ci,
  `postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `town` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'felicien',
  `mod_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `customers_id` (`customers_id`),
  KEY `entities_id` (`entities_id`),
  KEY `is_deleted` (`is_deleted`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `tictan_customers_users`
--

INSERT INTO `tictan_customers_users` (`id`, `customers_id`, `entities_id`, `is_recursive`, `username`, `password`, `name`, `firstname`, `mobile`, `fax`, `email`, `comment`, `is_deleted`, `address`, `postcode`, `town`, `state`, `country`, `author`, `mod_date`) VALUES
(9, 11, 12, 0, 'username1615', '123', 'Nom user name 16 15', 'Prenom user 15 16', '04850 10 20 10 ', NULL, 'username1616@gmail.com', 'Commentaire de user 15 16', 0, NULL, NULL, NULL, NULL, NULL, 'felicien', '2015-01-14'),
(10, 16, 15, 0, 'username1516', '123', 'Nom username1516', 'Prenom username 1516', '0480 52 52 52 ', '02 521 56 20', 'eee@yahoo.com', 'Commentaire', 0, 'rue des croates, 552', '1000', 'Bruxelles', 'Bruxelles-Capitale', 'BEL', 'felicien', '2015-01-06');

-- --------------------------------------------------------

--
-- Structure de la table `tictan_customers_virtualdrivedisk`
--

CREATE TABLE IF NOT EXISTS `tictan_customers_virtualdrivedisk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `computers_id` int(11) NOT NULL DEFAULT '0',
  `customers_id` int(11) NOT NULL DEFAULT '0',
  `entities_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_mod` date DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `author` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'felicien',
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `entities_id` (`entities_id`),
  KEY `customers_id` (`customers_id`),
  KEY `computers_id` (`computers_id`),
  KEY `is_deleted` (`is_deleted`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_customer_accessories`
--

CREATE TABLE IF NOT EXISTS `tictan_customer_accessories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `entities_id` int(11) NOT NULL DEFAULT '0',
  `customers_id` int(11) NOT NULL DEFAULT '0',
  `accessorymodels_id` int(11) DEFAULT NULL,
  `accessorytypes_id` int(11) DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ticket_tco` decimal(10,0) DEFAULT NULL,
  `date_mod` datetime DEFAULT NULL,
  `author` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'felicien',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_dynamic` tinyint(1) NOT NULL DEFAULT '0',
  `users_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `groups_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `date_mod` (`date_mod`),
  KEY `entities_id` (`customers_id`),
  KEY `customers_id` (`customers_id`),
  KEY `accessorymodels_id` (`accessorymodels_id`),
  KEY `accessorytypes_id` (`accessorytypes_id`),
  KEY `groups_id` (`groups_id`),
  KEY `users_id` (`users_id`),
  KEY `is_deleted` (`is_deleted`),
  KEY `serial` (`serial`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `tictan_customer_accessories`
--

INSERT INTO `tictan_customer_accessories` (`id`, `serial`, `name`, `comment`, `entities_id`, `customers_id`, `accessorymodels_id`, `accessorytypes_id`, `location`, `ticket_tco`, `date_mod`, `author`, `is_deleted`, `is_dynamic`, `users_id`, `groups_id`) VALUES
(2, 'AAAA', 'equipement 1', 'RAS AS', 9, 11, 1, 1, 'N/A', NULL, '2015-02-04 00:00:00', 'felicien', 1, 0, 'felicien', 'Finance'),
(3, 'BBB', 'clavier superpouvoir', NULL, 9, 11, 2, 1, 'cxcxccxxc', NULL, NULL, '', 0, 0, 'Username 1', 'Groupe 1'),
(4, 'sERIE A', 'NAME A', 'COMMENTAIRE A', 16, 16, 1, 1, 'bureau secretaire', NULL, NULL, '', 0, 0, 'username 3', 'Group 4'),
(5, 'Numer de serie', 'Nom Accessoire NEW', NULL, 9, 11, 1, 3, 'lieu noir', NULL, NULL, '', 1, 0, 'user rouge', 'groupe noir'),
(6, 'Serie specielae', 'souris blanche', NULL, 9, 10, 1, 1, '2eme bureau', NULL, NULL, '', 0, 0, 'felicien', 'Finance');

-- --------------------------------------------------------

--
-- Structure de la table `tictan_customer_computers`
--

CREATE TABLE IF NOT EXISTS `tictan_customer_computers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pcname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `serial` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `processor` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ram` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hdd` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cartegraph` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customers_id` int(11) NOT NULL DEFAULT '0',
  `entities_id` int(11) NOT NULL DEFAULT '0',
  `computermodels_id` int(11) DEFAULT NULL,
  `computertypes_id` int(11) DEFAULT NULL,
  `date_mod` datetime DEFAULT NULL,
  `os_id` int(11) NOT NULL DEFAULT '0',
  `osvp_id` int(11) NOT NULL DEFAULT '0',
  `operatingsystemservicepacks_id` int(11) DEFAULT '0',
  `domainame` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sessioname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `spassword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teamv_logname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresseip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeadressage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `connexionvia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `os_licenseid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `autoupdatesystems_id` int(11) DEFAULT '0',
  `domains_id` int(11) NOT NULL DEFAULT '0',
  `networks_id` int(11) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_dynamic` tinyint(1) NOT NULL DEFAULT '0',
  `users_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `groups_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ticket_tco` decimal(20,4) DEFAULT '0.0000',
  `uuid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `author` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'felicien',
  `mod_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `date_mod` (`date_mod`),
  KEY `domains_id` (`domains_id`),
  KEY `entities_id` (`entities_id`),
  KEY `customers_id` (`customers_id`),
  KEY `groups_id` (`groups_id`),
  KEY `users_id` (`users_id`),
  KEY `networks_id` (`networks_id`),
  KEY `operatingsystems_id` (`os_id`),
  KEY `operatingsystemservicepacks_id` (`operatingsystemservicepacks_id`),
  KEY `operatingsystemversions_id` (`osvp_id`),
  KEY `is_deleted` (`is_deleted`),
  KEY `is_dynamic` (`is_dynamic`),
  KEY `serial` (`serial`),
  KEY `computermodels_id` (`computermodels_id`,`computertypes_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Contenu de la table `tictan_customer_computers`
--

INSERT INTO `tictan_customer_computers` (`id`, `pcname`, `serial`, `processor`, `ram`, `hdd`, `cartegraph`, `customers_id`, `entities_id`, `computermodels_id`, `computertypes_id`, `date_mod`, `os_id`, `osvp_id`, `operatingsystemservicepacks_id`, `domainame`, `sessioname`, `spassword`, `teamv_logname`, `adresseip`, `typeadressage`, `connexionvia`, `location`, `os_licenseid`, `autoupdatesystems_id`, `domains_id`, `networks_id`, `is_deleted`, `is_dynamic`, `users_id`, `groups_id`, `ticket_tco`, `uuid`, `comment`, `author`, `mod_date`) VALUES
(21, 'AZERTy', '1213213232', 'PROCESSEUR 123456', '4Go', '360', 'GFSDFDD', 11, 8, 2, 2, NULL, 17, 1, 0, 'DFGDF', 'GDF', 'GGD', 'FGGFFGD', 'GGDD', 'DDG', 'GFDGFD', 'DFGD', NULL, 0, 0, 0, 0, 0, '0', '9', '0.0000', NULL, 'GD', 'DD', '2015-01-28'),
(22, 'PC 1', 'serie station de travail', 'Processeur PC 10', 'memoire PC 10', 'Disuqe PC 10', 'Carte graphique PC 10', 11, 9, 2, 1, NULL, 2, 2, 0, 'DOmaine PC 10', 'Session PC 10', 'mot de passe PC 10', 'Tv PC 10', '192.168.10', 'Type adressage', 'Connexion PC 10', '', NULL, 0, 0, 0, 0, 0, '', '', '0.0000', NULL, 'Connexion PC 10', '', '2015-03-03'),
(23, 'PC 009', 'serie dell powerEdge', 'PROCESSEUR TURBO RAPIDE', '4,00 Go', '300 Go', 'NDXAPULL', 11, 9, 1, 1, NULL, 14, 1, 0, 'domaine 1', 'session1', 'mdpXXXX', 'lognamesession1', '192.168.0.25', 'Dynamique', 'RJ45', 'Bureau 2eme etage', NULL, 0, 0, 0, 0, 0, '', '', '0.0000', NULL, 'Zone remarque pour le gand personnage', 'felicien', '2015-01-13'),
(24, '', NULL, NULL, NULL, NULL, NULL, 11, 9, 3, 1, NULL, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, '', '', '0.0000', NULL, NULL, '', '0000-00-00'),
(29, 'gfdfdf', 'fdggdf', 'df', 'fgd', 'fggffg', 'fgfgfg', 11, 9, 1, 3, NULL, 17, 1, 0, 'gfgfgfg', 'gfgfg', 'fgfg', 'fgfg', 'gfgfg', 'Dynamiquement faiblefgfgfg', 'gfgfgfg', 'gfggf', NULL, 0, 0, 0, 1, 0, 'dfgdf', 'dfgfgdg', '0.0000', NULL, 'gfgfgfg', 'felicien', '2015-02-21'),
(20, 'PC station de travail', 'serie 1 station de travail', 'AMD Quad-Core A8-6500 APU', '8Go', '100 Go', 'Crte NVDIA GeForce 705 (1Go)', 16, 16, 1, 1, NULL, 1, 1, 0, 'domaine de harzir', 'session a', 'motdepasse***', 'logteamviewer', '192.168.0.150', 'dynamique', 'RJ45', 'Bureu 2etage 200', NULL, 0, 0, 0, 0, 0, '0', '0', '0.0000', NULL, 'Remarque plus commentaire', 'nezzi', '2015-01-15'),
(25, 'Nom du PC', '12serie', 'processeur ', 'RAmeur', '1 To', 'ndxiajj', 14, 9, 1, 2, NULL, 1, 0, 0, 'domain Name', 'session name', 'mot depasse session', 'lojname', '192.168.6.8', 'Dynamique', 'RJ45', '2eme bureau', NULL, 0, 0, 0, 0, 0, '', '', '0.0000', NULL, NULL, '', '2015-02-21'),
(26, 'PC NAME', 's', 'p', '16Go', '500Go', 'Carte graphique', 14, 9, 2, 1, NULL, 2, 1, 0, '', '', 'motdepassesession', 'teamviEwer', '192.168.1.100', 'Dynamiquement fort', 'connexion via', '2eme bureau', NULL, 0, 0, 0, 0, 0, 'felicien', 'Finance', '0.0000', NULL, 'RAS', 'felicien', '2015-02-25'),
(27, '', NULL, NULL, NULL, NULL, NULL, 14, 9, 2, 1, NULL, 3, 3, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, '', '', '0.0000', NULL, NULL, '', '0000-00-00'),
(28, 'PC name inconnu', 'serie 12345', 'processeur hyper rapide', '40Go', 'DD', 'Carte graphique', 14, 9, 3, 1, '2015-02-23 00:00:00', 2, 2, 0, 'domaine en Majuscule', 'Session convenable', 'motdepassesession', 'logname inconnu', '192.168.6.8', 'Dynamique', 'connexion via', '2eme bureau', NULL, 0, 0, 0, 0, 0, 'felicien', 'Finance', '0.0000', NULL, '', '', '2015-02-21'),
(30, 'sdfsfdfsdsdfsdf', 'sfddfdfs', 'sdfsdfsdf', 'sdfsdfsdf', 'dfssdfdfs', 'sdfsdfsdfsdfdfs', 15, 16, 1, 1, NULL, 15, 1, 0, 'ddfdfdfdf', 'ddfdfsdf', 'sdfsdfsdfsdf', 'sdfsdfdfsdf', 'dfsdfdfdfsdf', 'sdfsdfsdfsdf', 'sdfsdfsdfdf', 'sdfsdfdfdf', NULL, 0, 0, 0, 0, 0, 'useruser', 'sddffdsdf', '0.0000', NULL, 'ZONE COMMENTAIRE MODIFIEEEEE', 'felicien', '2015-02-21'),
(31, 'PC 20032015', 'serie20032015', 'Processeur 20032015', '16Go', '500Go', 'Carte 20032015', 18, 9, 12, 2, NULL, 6, 2, 0, 'DOmaine 20032015', 'Session 20032015', 'mdp20032015', 'log20032015', '192.20.0.2015', 'adressage 20032015', 'Connexion 20032015', 'Salle 20032015', NULL, 0, 0, 0, 0, 0, 'felicien 20032015', 'groupe 20032015', '0.0000', NULL, 'COmmemantaire 20032015', 'r20032015', '2015-03-03'),
(32, 'PC-01', '1234156', 'Intel ', '2 Go', '160 Go', '', 22, 22, 14, 1, NULL, 22, 1, 0, 'passistance.locam', '', '', '314 905 727', '', 'DHCP', 'RJ45', '2eme etage bureau 101', NULL, 0, 0, 0, 0, 0, 'Syhan', '', '0.0000', NULL, 'test de saisie', 'felicien', '2015-03-24'),
(33, 'PC-01', '121212132', 'Pentium 4', '2 Go', '160 Go', '', 11, 9, 14, 2, NULL, 1, 1, 0, 'nom domaine', 'Session 20032015', 'motdepassesession', '191455', '192.168.1.100', 'DHCP', 'RJ 45', '2eme etage bureau 101', NULL, 0, 0, 0, 0, 0, '', '', '0.0000', NULL, '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `tictan_customer_network`
--

CREATE TABLE IF NOT EXISTS `tictan_customer_network` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `entities_id` int(11) NOT NULL DEFAULT '0',
  `customers_id` int(11) NOT NULL DEFAULT '0',
  `networkmodels_id` int(11) DEFAULT NULL,
  `networktypes_id` int(11) DEFAULT NULL,
  `adresseip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bridge` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mask` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `smtpserver` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adressrange` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeadressage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `connexionvia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ticket_tco` decimal(10,0) DEFAULT NULL,
  `date_mod` date DEFAULT NULL,
  `author` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'felicien',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_dynamic` tinyint(1) NOT NULL DEFAULT '0',
  `users_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `groups_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `date_mod` (`date_mod`),
  KEY `entities_id` (`customers_id`),
  KEY `customers_id` (`customers_id`),
  KEY `networkmodels_id` (`networkmodels_id`),
  KEY `networktypes_id` (`networktypes_id`),
  KEY `users_id` (`users_id`),
  KEY `is_deleted` (`is_deleted`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_customer_networke`
--

CREATE TABLE IF NOT EXISTS `tictan_customer_networke` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `entities_id` int(11) NOT NULL DEFAULT '0',
  `customers_id` int(11) NOT NULL DEFAULT '0',
  `networkmodels_id` int(11) DEFAULT NULL,
  `networktypes_id` int(11) DEFAULT NULL,
  `adresseip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bridge` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mask` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `smtpserver` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adressrange` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeadressage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `connexionvia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ticket_tco` decimal(10,0) DEFAULT NULL,
  `date_mod` date DEFAULT NULL,
  `author` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'felicien',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_dynamic` tinyint(1) NOT NULL DEFAULT '0',
  `users_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `groups_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `date_mod` (`date_mod`),
  KEY `entities_id` (`customers_id`),
  KEY `customers_id` (`customers_id`),
  KEY `networkmodels_id` (`networkmodels_id`),
  KEY `networktypes_id` (`networktypes_id`),
  KEY `users_id` (`users_id`),
  KEY `is_deleted` (`is_deleted`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_customtype`
--

CREATE TABLE IF NOT EXISTS `tictan_customtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mod_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `is_deleted` (`is_deleted`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Contenu de la table `tictan_customtype`
--

INSERT INTO `tictan_customtype` (`id`, `name`, `comment`, `is_deleted`, `author`, `mod_date`) VALUES
(6, 'ASBL', NULL, 0, NULL, NULL),
(5, 'Ecoles', NULL, 0, NULL, NULL),
(4, 'Prive', NULL, 0, NULL, NULL),
(7, 'Autres clients', NULL, 0, NULL, NULL),
(8, 'Professionnel', NULL, 0, NULL, NULL),
(9, 'Autres', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_cust_comp_disk`
--

CREATE TABLE IF NOT EXISTS `tictan_cust_comp_disk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diskname` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serial` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customers_id` int(11) NOT NULL DEFAULT '0',
  `entities_id` int(11) NOT NULL DEFAULT '0',
  `computer_id` int(11) DEFAULT NULL,
  `diskmodel_id` int(11) DEFAULT NULL,
  `disktype_id` int(11) DEFAULT NULL,
  `date_mod` datetime DEFAULT NULL,
  `partioname1` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `partioname2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `partioname3` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `author` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'felicien',
  `mod_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `date_mod` (`date_mod`),
  KEY `entities_id` (`entities_id`),
  KEY `customers_id` (`customers_id`),
  KEY `computer_id` (`computer_id`),
  KEY `serial` (`serial`),
  KEY `diskmodel_id` (`diskmodel_id`),
  KEY `disktype_id` (`disktype_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_cust_virdrive`
--

CREATE TABLE IF NOT EXISTS `tictan_cust_virdrive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `computer_id` int(11) NOT NULL DEFAULT '0',
  `customers_id` int(11) NOT NULL DEFAULT '0',
  `entities_id` int(11) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `comment` text COLLATE utf8_unicode_ci,
  `author` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'felicien',
  `mod_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mod_date` (`mod_date`),
  KEY `entities_id` (`entities_id`),
  KEY `customers_id` (`customers_id`),
  KEY `computer_id` (`computer_id`),
  KEY `name` (`name`),
  KEY `is_deleted` (`is_deleted`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_entities`
--

CREATE TABLE IF NOT EXISTS `tictan_entities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vatcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account1` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account2` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customtype` tinyint(1) NOT NULL DEFAULT '0',
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `address` text COLLATE utf8_unicode_ci,
  `postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `town` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mod_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `companyname` (`companyname`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Contenu de la table `tictan_entities`
--

INSERT INTO `tictan_entities` (`id`, `companyname`, `vatcode`, `account1`, `account2`, `customtype`, `phone`, `phone2`, `mobile`, `fax`, `email`, `website`, `comment`, `address`, `postcode`, `town`, `state`, `country`, `is_deleted`, `author`, `mod_date`) VALUES
(8, '8 maison mere', 'vat123456789', 'compte 1', 'compte2', 1, '02 250 50 50', '020 250 50 51', '0485 50 50 50 ', '020250 50 52', 'maisonmere1@gmail.com', 'www.maisonmer1.be', 'Ceci est une mason mere 1', 'Rue de la maison mere , 1', '1000', 'Bruxelles', 'Bruxelles-Capiltale', 'BEL', 0, 'NEZZI', '2015-01-13'),
(9, '9 maison mere2', 'vat111223344789', 'compte 14654654', 'compte2012457', 1, '02 252 52 52', '020 252 52 53', '0485 50 50 52 ', '020250 50 52', 'maisonmere2@gmail.com', 'www.maisonmer2.be', 'Ceci est une maison mere 2', 'Rue de la maison mere , 2', '1000', 'Bruxelles', 'LIEGE', 'BEL', 0, 'NEZZI', '2015-01-13'),
(10, '10 ASBL TIC TANNE 10', 'vate  13213154654546', 'BE-123456789', 'BE-9876543210', 1, '01 585477777', '02 88888888', '0485 23 25 25', '02  4565445454', 'fnezzi@yahoo.com', 'www.amandine.com', 'je suis un peu fatiguÃ© d''ecrire. la vies et un lon fleuve tranquile', 'Rue du CPAS, 56  ', '1000', 'Bruxelles', 'Brux-Capitale', 'BEL', 0, 'NEZZI', NULL),
(11, '11 Felicien le magcien 11', 'code vat KDF4577', '123454678', '132154678', 1, '081 52 52 52 ', '081 50 50 50 ', '045854444', '081 22 55 55 ', 'm@gmail.com', 'www.gg.com', 'ZONE COMMEklwdhcvqlkchqLCKBNQLXCNQLSCHQlsdkchqLSKQlskdjcn', 'Rues de la honte des freres jules, 4578 Boite 55', '5000', 'Namur', '', 'BEL', 0, 'NEZZI', '0000-00-00'),
(12, 'ASBL AMANADINE TISSERAND', 'vatcode new', 'compte 14654654', '222222222222', 1, '0112121121', '21231132123', '32132132123', '2132131321', 'fnezzi@gmail.com', 'www.gg.com', 'Rien a signaler', 'Avenue de Tervuren, 458 A', '4000', 'Liege', 'PROVINCE DE CHARLEROI', 'BEL', 0, 'NEZZI', '2015-01-14'),
(13, 'ASBL GUILLAUME', 'vat1234565', '32121', '2132132', 1, '012215454', '121212', '04584444', '02444444', 'fenzzi@gmail.com', 'www.dd.fr', 'RRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR', 'Rue des eglise, 46', '1024', 'Bruxelles', 'LIEGE', 'BEL', 0, 'Alex', NULL),
(14, 'AAAA', 'BBBB', '1212123', '113121', 1, '32121231', '13132123', '231321321', '21321321', 'fnezzi@gmail.com', '21321231', 'ZZZZZZZZZZZZZ', '232121321', '321321321', '1321321321', '1231321', 'BEL', 0, 'NEZZI', '0000-00-00'),
(15, 'TEST RAISON SOCIALE', 'vatcodeamlkjakja', 'compte 12222', 'compte 122333', 1, '00000000', '22222222', '0000000', '00000000', 'fnezzi@gmail.com', 'www.ggg.com', 'rrrrrrrtttttttttttttttttttoouyiugkk', 'Rue des eglise, 46', '1050', 'Bruxelles', 'Bruxelles Capitale', 'Belgique', 0, 'felicien', '0000-00-00'),
(16, 'Entite 1', '123456', '01234565', '0123456', 1, '01245678', '0456123', '0485021021023', '02 562222', 'fnezzi@gmail.com', 'wwww.bbbb.com', 'Zone remarque pour Entite 1', 'Rue entite 1', '1000', 'Bruxelles', 'Bruxelles Capitale', 'Belgique', 0, 'felicien', '0000-00-00'),
(17, 'Entite 2', 'vat123456', '1232156548', 'BE-9876543210', 1, '020 520 25 25', '02005200521', '0485 52 52 52 ', '02 254555654', 'g@mial.com', '', 'Pas de site web', 'Rue entite 2', '1050', 'Bruxelles', 'Bxl Capitale', 'BEL', 0, 'felicien', '0000-00-00'),
(18, 'Entite 3', 'vat 123456789', 'BE 123456789', 'BE 789456123', 1, '02 540 55 55', '02 540 50 50', '0485 23 25 25', '02 540 45 45', 'fenzzi@gmail.com', 'www.entreprise.be', 'RAS', 'Avenue des chasseurs ardenais, 50', '5400', 'Marcje en Famenne', 'Bruxelles Capitale', 'Belgique', 0, 'felicien', NULL),
(19, 'Entite 4', 'vat123456564', 'BE 852963741', 'BE 963258147', 1, '02 456 123 25', '02 550 56 56', '0485 66 99', '02 254555654', 'fnezzi@gmail.com', 'www.gg.com', 'RAS entite 4', 'Rue de l''Entite 4', '2000', 'Wavre', 'Brabant Wallon', 'Belgique', 0, 'NEZZI', '0000-00-00'),
(20, 'EntitÃ© 6', 'tva entite 6', 'compte 1 entite 6', 'compte 2 entite 2', 1, '02 45 45 46', '02 456123', '0484522669', '02 123456789', 'fnezzi@yahoo.com', 'www.test.be', 'Test entite 6', 'Rue de l''e,tite 6', '1040', 'Uccle', 'Bruxelles capitale', 'Bel', 0, '', '0000-00-00'),
(21, 'r', 'r', 'r', 'r', 0, 's', '', '', '', '', '', 'Remarque apres modif', 'Rue des grande commandantur, 54', 'rgqgggfgfq', 'Bruxelles', 'fgdfgdfgf', 'CIV', 1, '', '0000-00-00'),
(22, 'Patient Assistance', '123456789', '1234567', '13132132', 1, '02 222 22222', '', '', '', '', '', '', 'Rue Leonn Theodor, 89', '1090', 'Jette', 'Bruxelles capitale', 'Belgique', 0, '', NULL),
(23, 'ATT ASBL', '1321321', '212132', '121221', 0, '02 365987452', '', '', '', '', '', '', 'Rue des tanneurs', '1000', 'Bruxelles', 'Bruxelles capitale', 'Belgique', 0, '', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_group`
--

CREATE TABLE IF NOT EXISTS `tictan_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mod_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_manufacturers`
--

CREATE TABLE IF NOT EXISTS `tictan_manufacturers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mod_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `is_deleted` (`is_deleted`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `tictan_manufacturers`
--

INSERT INTO `tictan_manufacturers` (`id`, `description`, `comment`, `is_deleted`, `author`, `mod_date`) VALUES
(1, 'Hewlett Packard (HP)', NULL, 0, NULL, NULL),
(2, 'DELL', NULL, 0, NULL, NULL),
(3, 'IBM', NULL, 0, NULL, NULL),
(4, 'ETC Distribution (HP)', NULL, 0, NULL, NULL),
(7, 'ASUS', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_monitor`
--

CREATE TABLE IF NOT EXISTS `tictan_monitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `date_mod` datetime DEFAULT NULL,
  `monitortypes_id` int(11) NOT NULL DEFAULT '0',
  `monitormodels_id` int(11) NOT NULL DEFAULT '0',
  `manufacturers_id` int(11) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `date_mod` (`date_mod`),
  KEY `name` (`name`),
  KEY `manufacturers_id` (`manufacturers_id`),
  KEY `monitortypes_id` (`monitortypes_id`),
  KEY `monitormodels_id` (`monitormodels_id`),
  KEY `is_deleted` (`is_deleted`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_monitormodels`
--

CREATE TABLE IF NOT EXISTS `tictan_monitormodels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `date_mod` datetime DEFAULT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_dynamic` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `tictan_monitormodels`
--

INSERT INTO `tictan_monitormodels` (`id`, `name`, `comment`, `date_mod`, `author`, `is_deleted`, `is_dynamic`) VALUES
(8, 'Asus VE248H Ecran PC LCD 24" (61 cm) LED DVI/VGA HDMI Noir', NULL, '2015-02-09 00:00:00', 'felicien', 0, 0),
(9, 'Samsung S24D300HS Ecran PC TN 24" (60,96 cm) 1920 x 1080 pixels 2 milliseconds VGA/HDMI', NULL, '2015-02-09 00:00:00', 'felicien', 0, 0),
(10, 'Ecran FlexScan L568 LCD 17'''' couleur', NULL, '2015-02-09 00:00:00', 'felicien', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_monitortypes`
--

CREATE TABLE IF NOT EXISTS `tictan_monitortypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `date_mod` datetime DEFAULT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_dynamic` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `tictan_monitortypes`
--

INSERT INTO `tictan_monitortypes` (`id`, `name`, `comment`, `date_mod`, `author`, `is_deleted`, `is_dynamic`) VALUES
(1, 'Plasma', NULL, NULL, '', 0, 0),
(2, 'DSTN', NULL, NULL, '', 0, 0),
(3, 'Ecran plat', NULL, NULL, '', 0, 0),
(4, 'TFT', NULL, NULL, '', 0, 0),
(5, 'LCD', NULL, NULL, '', 0, 0),
(6, 'LED', NULL, NULL, '', 0, 0),
(7, 'CRT', NULL, NULL, '', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_network`
--

CREATE TABLE IF NOT EXISTS `tictan_network` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `networktypes_id` int(11) NOT NULL DEFAULT '0',
  `comment` text COLLATE utf8_unicode_ci,
  `date_mod` datetime DEFAULT NULL,
  `manufacturers_id` int(11) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_dynamic` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `date_mod` (`date_mod`),
  KEY `name` (`name`),
  KEY `networktypes_id` (`networktypes_id`),
  KEY `manufacturers_id` (`manufacturers_id`),
  KEY `is_deleted` (`is_deleted`),
  KEY `is_dynamic` (`is_dynamic`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_networkmodels`
--

CREATE TABLE IF NOT EXISTS `tictan_networkmodels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `date_mod` date NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Contenu de la table `tictan_networkmodels`
--

INSERT INTO `tictan_networkmodels` (`id`, `name`, `comment`, `date_mod`, `author`, `is_deleted`) VALUES
(5, 'Hp LaserJet Enterprise 600 M601n', NULL, '0000-00-00', '', 0),
(6, 'Hp LaserJet Enterprise 600 M602x', NULL, '0000-00-00', '', 0),
(7, 'G54/N150-Routeur Wifi', 'Modèle: WNR1000', '0000-00-00', '', 0),
(8, 'N150-Routeur Wifi', 'N150-Routeur Wifi\r\nModèle: JNR1010', '0000-00-00', '', 0),
(9, 'N300-Routeur Wifi', 'Modèle: JWNR2010', '0000-00-00', '', 0),
(10, 'Routeur Wi-Fi Linksys WRT54GL Routeur sans fil G', NULL, '0000-00-00', '', 0),
(11, 'Wi-Fi Linksys E2500 Routeur N double bande avancé', NULL, '0000-00-00', '', 0),
(12, 'D-LINK Switch 8 ports 10/100/1000 Mbps DGS-108', NULL, '0000-00-00', '', 0),
(13, 'NETGEAR Switch Série 300 FS308 - 8 ports 10/100 - boîtier métal', NULL, '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_networktypes`
--

CREATE TABLE IF NOT EXISTS `tictan_networktypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `date_mod` date NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `tictan_networktypes`
--

INSERT INTO `tictan_networktypes` (`id`, `name`, `comment`, `date_mod`, `author`, `is_deleted`) VALUES
(3, 'autres', NULL, '0000-00-00', '', 0),
(4, 'routeur', NULL, '0000-00-00', '', 0),
(5, 'switch', NULL, '0000-00-00', '', 0),
(6, 'hub', NULL, '0000-00-00', '', 0),
(7, 'imprimante reseau', NULL, '0000-00-00', '', 0),
(8, 'repeater', NULL, '0000-00-00', '', 0),
(9, 'CPL', NULL, '0000-00-00', '', 0),
(10, 'lecteureseau', NULL, '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_operatingsystem`
--

CREATE TABLE IF NOT EXISTS `tictan_operatingsystem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Contenu de la table `tictan_operatingsystem`
--

INSERT INTO `tictan_operatingsystem` (`id`, `name`, `comment`) VALUES
(1, 'Windows XP 32', NULL),
(2, 'Windows 64 Home Edition', NULL),
(3, 'Windows XP 64 Professionnel', NULL),
(4, 'Windows 7 Home', NULL),
(5, 'Windows 7 Professionnel', NULL),
(6, 'Windows 7 Enterprise', NULL),
(7, 'Windows 8', NULL),
(8, 'Windows 10', NULL),
(9, 'Windows Server 2012 R2', NULL),
(10, 'Windows Server 2008 R2', NULL),
(11, 'Windows Server 2003 R2', NULL),
(12, 'Windows Server 2000', NULL),
(13, 'Windows Server NT 4.0', NULL),
(14, 'Linux Ubuntu', NULL),
(15, 'Linux Debian', NULL),
(16, 'Linux CentOS', NULL),
(17, 'Unix AIX', NULL),
(18, 'Unix Mac OS X', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_os`
--

CREATE TABLE IF NOT EXISTS `tictan_os` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `mod_date` date NOT NULL,
  `author` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Contenu de la table `tictan_os`
--

INSERT INTO `tictan_os` (`id`, `name`, `comment`, `mod_date`, `author`, `is_deleted`) VALUES
(1, 'Windows XP 32', NULL, '0000-00-00', '', 0),
(2, 'Windows 64 Home Edition', NULL, '0000-00-00', '', 0),
(3, 'Windows XP 64 Professionnel', NULL, '0000-00-00', '', 0),
(4, 'Windows 7 Home', NULL, '0000-00-00', '', 0),
(5, 'Windows 7 Professionnel', NULL, '0000-00-00', '', 0),
(6, 'Windows 7 Enterprise', NULL, '0000-00-00', '', 0),
(7, 'Windows 8', NULL, '0000-00-00', '', 0),
(8, 'Windows 10', NULL, '0000-00-00', '', 0),
(9, 'Windows Server 2012 R2', NULL, '0000-00-00', '', 0),
(10, 'Windows Server 2008 R2', NULL, '0000-00-00', '', 0),
(11, 'Windows Server 2003 R2', NULL, '0000-00-00', '', 0),
(12, 'Windows Server 2000', NULL, '0000-00-00', '', 0),
(13, 'Windows Server NT 4.0', NULL, '0000-00-00', '', 0),
(14, 'Linux Ubuntu', NULL, '0000-00-00', '', 0),
(15, 'Linux Debian', NULL, '0000-00-00', '', 0),
(16, 'Linux CentOS', NULL, '0000-00-00', '', 0),
(17, 'Unix AIX', NULL, '0000-00-00', '', 0),
(18, 'Unix Mac OS X', NULL, '0000-00-00', '', 0),
(19, 'Windows Vista Premium', NULL, '2015-01-22', '', 0),
(20, 'Windows Vista Business', NULL, '0000-00-00', '', 0),
(21, 'Windows Vista Enterprise', NULL, '2015-01-22', 'nezzi', 0),
(22, 'Windows Vista Pro 32 ', NULL, '0000-00-00', '', 0),
(23, 'Windows Vista Pro 64', NULL, '0000-00-00', '', 0),
(25, 'Windows Serveur 2008', NULL, '0000-00-00', '', 0),
(26, 'Windows Serveur 2003', NULL, '0000-00-00', '', 0),
(27, 'Windows Serveur 2012', NULL, '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_osmodels`
--

CREATE TABLE IF NOT EXISTS `tictan_osmodels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_osv`
--

CREATE TABLE IF NOT EXISTS `tictan_osv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `os_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `mod_date` date NOT NULL,
  `author` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `os_id` (`os_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `tictan_osv`
--

INSERT INTO `tictan_osv` (`id`, `name`, `os_id`, `comment`, `mod_date`, `author`, `is_deleted`) VALUES
(1, 'Service Pack 1', 5, NULL, '0000-00-00', '', 0),
(2, 'Service Pack 2', 19, NULL, '0000-00-00', '', 0),
(3, 'Service Pack 2', 3, NULL, '0000-00-00', '', 0),
(4, 'Service Pack 3', 1, NULL, '0000-00-00', '', 0),
(5, 'Service Pack 3', 2, NULL, '0000-00-00', '', 0),
(6, 'Service Pack 3', 3, NULL, '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_osversionpack`
--

CREATE TABLE IF NOT EXISTS `tictan_osversionpack` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_osvp`
--

CREATE TABLE IF NOT EXISTS `tictan_osvp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `os_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `mod_date` date NOT NULL,
  `author` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `os_id` (`os_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `tictan_osvp`
--

INSERT INTO `tictan_osvp` (`id`, `name`, `os_id`, `comment`, `mod_date`, `author`, `is_deleted`) VALUES
(1, 'Service Pack 1', 5, NULL, '0000-00-00', '', 0),
(2, 'Service Pack 2', 19, NULL, '0000-00-00', '', 0),
(3, 'Service Pack 2', 3, NULL, '0000-00-00', '', 0),
(4, 'Service Pack 3', 1, NULL, '0000-00-00', '', 0),
(5, 'Service Pack 3', 2, NULL, '0000-00-00', '', 0),
(6, 'Service Pack 3', 3, NULL, '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_osvspold`
--

CREATE TABLE IF NOT EXISTS `tictan_osvspold` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `os_id` int(11) NOT NULL,
  `osv_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `os_id` (`os_id`),
  KEY `osv_id` (`osv_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_printermodels`
--

CREATE TABLE IF NOT EXISTS `tictan_printermodels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `date_mod` date NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `tictan_printermodels`
--

INSERT INTO `tictan_printermodels` (`id`, `name`, `comment`, `date_mod`, `author`, `is_deleted`) VALUES
(1, 'Kyocera FS-1061DN', NULL, '0000-00-00', '', 0),
(2, 'Canon MAXIFY MB2050', 'Imprimante multifonction pour les bureaux à domicile', '0000-00-00', '', 0),
(3, 'Imprimante connectée tout-en-un HP Officejet 5740 (B9S79A)', NULL, '0000-00-00', '', 0),
(4, 'Imprimante e-All-in-One HP ENVY 7640 (E4W47A)', NULL, '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_printertypes`
--

CREATE TABLE IF NOT EXISTS `tictan_printertypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `date_mod` datetime DEFAULT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_dynamic` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_profil`
--

CREATE TABLE IF NOT EXISTS `tictan_profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profil` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mod_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Contenu de la table `tictan_profil`
--

INSERT INTO `tictan_profil` (`id`, `profil`, `description`, `comment`, `is_deleted`, `author`, `mod_date`) VALUES
(9, 'A', 'Administratateur', NULL, 0, 'felicien', '2015-02-21'),
(10, 'C', 'Consultation', '', 0, 'felicien', '2015-02-21'),
(11, 'D', 'Developpeur', 'Developpeur d''applications', 0, 'felicien', '2015-02-21');

-- --------------------------------------------------------

--
-- Structure de la table `tictan_skills`
--

CREATE TABLE IF NOT EXISTS `tictan_skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mod_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `description` (`description`),
  KEY `is_deleted` (`is_deleted`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `tictan_skills`
--

INSERT INTO `tictan_skills` (`id`, `description`, `comment`, `is_deleted`, `author`, `mod_date`) VALUES
(1, 'Administrateur reseau', NULL, 1, NULL, NULL),
(2, 'Technicien PC', NULL, 0, NULL, NULL),
(3, 'Chef atelier', NULL, 0, NULL, NULL),
(4, 'Vendeur', NULL, 0, NULL, NULL),
(5, 'secretaire', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_softwaremodels`
--

CREATE TABLE IF NOT EXISTS `tictan_softwaremodels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `mod_date` date NOT NULL,
  `author` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Contenu de la table `tictan_softwaremodels`
--

INSERT INTO `tictan_softwaremodels` (`id`, `name`, `comment`, `mod_date`, `author`, `is_deleted`) VALUES
(6, 'Sweet home 3D', 'CAO/DAO libre', '2015-02-17', 'felicien', 0),
(5, 'Autocad', 'CAO/DAO', '2015-02-17', '', 0),
(7, 'Acrobat Reader', NULL, '2015-02-17', 'felicien', 0),
(8, 'Office 2007', NULL, '2015-02-17', '', 0),
(9, 'Office 2010', NULL, '2015-02-17', 'felicien', 0),
(10, 'Office 2013', NULL, '2015-02-17', 'felicien', 0),
(11, 'SAGE', NULL, '2015-02-17', 'felicien', 0),
(12, 'CIEL COMPTA', NULL, '2015-02-17', 'felicien', 0),
(13, 'Business Object SAP', NULL, '2015-02-17', 'felicien', 0),
(14, 'SQL Server 20112', NULL, '2015-02-17', 'felicien', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_softwaretypes`
--

CREATE TABLE IF NOT EXISTS `tictan_softwaretypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `mod_date` date NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Contenu de la table `tictan_softwaretypes`
--

INSERT INTO `tictan_softwaretypes` (`id`, `name`, `comment`, `mod_date`, `author`, `is_deleted`) VALUES
(1, 'systeme d''exploitation', NULL, '0000-00-00', '', 0),
(2, 'suite office', NULL, '0000-00-00', '', 0),
(3, 'gestion', NULL, '0000-00-00', '', 0),
(4, 'gestion graphique', NULL, '0000-00-00', '', 0),
(5, 'autres', NULL, '0000-00-00', '', 0),
(6, 'Base de données', NULL, '0000-00-00', '', 0),
(7, 'Business Intelligence', NULL, '0000-00-00', '', 0),
(8, 'CAO/DAO', NULL, '2015-02-10', 'felicien', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_suppliers`
--

CREATE TABLE IF NOT EXISTS `tictan_suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vatcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `address` text COLLATE utf8_unicode_ci,
  `postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `town` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mod_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `companyname` (`companyname`),
  KEY `is_deleted` (`is_deleted`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `tictan_suppliers`
--

INSERT INTO `tictan_suppliers` (`id`, `companyname`, `vatcode`, `phone`, `phone2`, `mobile`, `fax`, `email`, `website`, `comment`, `is_deleted`, `address`, `postcode`, `town`, `state`, `country`, `author`, `mod_date`) VALUES
(1, 'Supplier 1', 'vatcode 19999478', '024578964', '24511', '04589222', '02 525 5555', 'zerty@mail.com', 'www.supplier1.com', NULL, 0, 'Rue des tanneurs , 60', '1000', 'Bruxelles', 'Bruxelles-Capiltale', 'BEL', NULL, NULL),
(2, 'Supplier 2', 'vat code999999', '02 5457895', '024555555', '0489235464', '02 5201111', 'adres@gmail.com', NULL, NULL, 0, 'rue du danseur; 45', '1280', 'bruxelles', 'bruxelles-capitale', 'BEL', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tictan_tecskills`
--

CREATE TABLE IF NOT EXISTS `tictan_tecskills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mod_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unicity` (`staff_id`,`skill_id`),
  KEY `skill_id` (`skill_id`),
  KEY `is_deleted` (`is_deleted`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `tictan_tecskills`
--

INSERT INTO `tictan_tecskills` (`id`, `staff_id`, `skill_id`, `comment`, `is_deleted`, `author`, `mod_date`) VALUES
(1, 3, 3, 'Guillaue Amey', 1, 'felicien', '2015-03-03'),
(2, 1, 3, 'RAS', 0, 'nezzi', '2015-02-21'),
(3, 3, 2, 'Guillaue Amey', 0, 'felicien', '2015-03-03'),
(4, 5, 5, 'Gisele', 0, 'felicien', '2015-03-03');

-- --------------------------------------------------------

--
-- Structure de la table `tictan_tecstaff`
--

CREATE TABLE IF NOT EXISTS `tictan_tecstaff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `address` text COLLATE utf8_unicode_ci,
  `postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `town` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mod_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `is_deleted` (`is_deleted`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `tictan_tecstaff`
--

INSERT INTO `tictan_tecstaff` (`id`, `name`, `firstName`, `mobile`, `email`, `comment`, `is_deleted`, `address`, `postcode`, `town`, `state`, `country`, `author`, `mod_date`) VALUES
(1, 'Tisserand ', 'Amandine', '04852114455', 'amandine@tisso.com', '', 0, 'Rue de la Paix, 52', '1000', 'Bruxelles', 'Bruxelles Capitale', 'Belgique', '', '0000-00-00'),
(2, 'CHU', 'Thuan', '', 'thuan@gmail.com', '', 0, 'Rue de la vignette, 45', '1050', 'Ixelles', 'Bruxelles Capitale', 'BEL', '', '0000-00-00'),
(3, 'Amey', 'Guillaume', '0485 52 52', 'gui@gmail.com', 'RAS', 0, 'Ribeaucourt', '1020', 'Molenbeek', 'Bruxelles capitale', 'Belgique', 'felicien', '2015-03-03'),
(4, 'BUJOR', 'Alexandru', '0480 52 52 52 ', 'alexandru@gmail.com', 'RAS', 0, 'Rue de Bucarest, 55', '1020', 'Molenbeek', 'Bruxelles capitale', 'Pays', 'felicien', '2015-03-03'),
(5, 'Mbangula', 'GisÃ¨le', '0452 52 52 52', 'gisele~toto.com', '', 0, 'RUe de Braine l''Alleud', '5500', 'Braine', 'Brabant', 'BEL', 'felicien', '2015-02-21'),
(6, 'nom stage', 'Prenom stage', '04850 52 56 54', '', 'RAS commenatire basique', 0, NULL, '1000', 'Bruxelles', 'Bruxelles capitale', 'Bel', 'felicien', '2015-03-03');

-- --------------------------------------------------------

--
-- Structure de la table `tictan_tickets`
--

CREATE TABLE IF NOT EXISTS `tictan_tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entities_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `closedate` datetime DEFAULT NULL,
  `solvedate` datetime DEFAULT NULL,
  `date_mod` datetime DEFAULT NULL,
  `users_id_lastupdater` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `users_id_recipient` int(11) NOT NULL DEFAULT '0',
  `requesttypes_id` int(11) NOT NULL DEFAULT '0',
  `itemtype` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `items_id` int(11) NOT NULL DEFAULT '0',
  `content` longtext COLLATE utf8_unicode_ci,
  `urgency` int(11) NOT NULL DEFAULT '1',
  `impact` int(11) NOT NULL DEFAULT '1',
  `priority` int(11) NOT NULL DEFAULT '1',
  `itilcategories_id` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '1',
  `solutiontypes_id` int(11) NOT NULL DEFAULT '0',
  `solution` text COLLATE utf8_unicode_ci,
  `global_validation` int(11) NOT NULL DEFAULT '1',
  `slas_id` int(11) NOT NULL DEFAULT '0',
  `slalevels_id` int(11) NOT NULL DEFAULT '0',
  `due_date` datetime DEFAULT NULL,
  `begin_waiting_date` datetime DEFAULT NULL,
  `sla_waiting_duration` int(11) NOT NULL DEFAULT '0',
  `waiting_duration` int(11) NOT NULL DEFAULT '0',
  `close_delay_stat` int(11) NOT NULL DEFAULT '0',
  `solve_delay_stat` int(11) NOT NULL DEFAULT '0',
  `takeintoaccount_delay_stat` int(11) NOT NULL DEFAULT '0',
  `actiontime` int(11) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `locations_id` int(11) NOT NULL DEFAULT '0',
  `validation_percent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `closedate` (`closedate`),
  KEY `status` (`status`),
  KEY `priority` (`priority`),
  KEY `request_type` (`requesttypes_id`),
  KEY `date_mod` (`date_mod`),
  KEY `entities_id` (`entities_id`),
  KEY `users_id_recipient` (`users_id_recipient`),
  KEY `item` (`itemtype`,`items_id`),
  KEY `solvedate` (`solvedate`),
  KEY `urgency` (`urgency`),
  KEY `impact` (`impact`),
  KEY `global_validation` (`global_validation`),
  KEY `slas_id` (`slas_id`),
  KEY `slalevels_id` (`slalevels_id`),
  KEY `due_date` (`due_date`),
  KEY `users_id_lastupdater` (`users_id_lastupdater`),
  KEY `type` (`type`),
  KEY `solutiontypes_id` (`solutiontypes_id`),
  KEY `itilcategories_id` (`itilcategories_id`),
  KEY `is_deleted` (`is_deleted`),
  KEY `name` (`name`),
  KEY `locations_id` (`locations_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_ticketsatisfactions`
--

CREATE TABLE IF NOT EXISTS `tictan_ticketsatisfactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tickets_id` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '1',
  `date_begin` datetime DEFAULT NULL,
  `date_answered` datetime DEFAULT NULL,
  `satisfaction` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tickets_id` (`tickets_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_tickets_tickets`
--

CREATE TABLE IF NOT EXISTS `tictan_tickets_tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tickets_id_1` int(11) NOT NULL DEFAULT '0',
  `tickets_id_2` int(11) NOT NULL DEFAULT '0',
  `link` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `unicity` (`tickets_id_1`,`tickets_id_2`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_tickets_users`
--

CREATE TABLE IF NOT EXISTS `tictan_tickets_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tickets_id` int(11) NOT NULL DEFAULT '0',
  `users_id` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '1',
  `use_notification` tinyint(1) NOT NULL DEFAULT '1',
  `alternative_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unicity` (`tickets_id`,`type`,`users_id`,`alternative_email`),
  KEY `user` (`users_id`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_tickettasks`
--

CREATE TABLE IF NOT EXISTS `tictan_tickettasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tickets_id` int(11) NOT NULL DEFAULT '0',
  `taskcategories_id` int(11) NOT NULL DEFAULT '0',
  `date` datetime DEFAULT NULL,
  `users_id` int(11) NOT NULL DEFAULT '0',
  `content` longtext COLLATE utf8_unicode_ci,
  `is_private` tinyint(1) NOT NULL DEFAULT '0',
  `actiontime` int(11) NOT NULL DEFAULT '0',
  `begin` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT '1',
  `users_id_tech` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `users_id` (`users_id`),
  KEY `tickets_id` (`tickets_id`),
  KEY `is_private` (`is_private`),
  KEY `taskcategories_id` (`taskcategories_id`),
  KEY `state` (`state`),
  KEY `users_id_tech` (`users_id_tech`),
  KEY `begin` (`begin`),
  KEY `end` (`end`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tictan_users`
--

CREATE TABLE IF NOT EXISTS `tictan_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profil` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'C',
  `staff_id` int(11) NOT NULL DEFAULT '0',
  `comment` text COLLATE utf8_unicode_ci,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mod_date` date DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `tictan_users`
--

INSERT INTO `tictan_users` (`id`, `userid`, `password`, `profil`, `staff_id`, `comment`, `is_deleted`, `author`, `mod_date`) VALUES
(6, 'user4', 'user4', 'R', 1, 'RAS', 0, 'felicien', '2015-02-21'),
(7, 'tech', 'tech', 'T', 4, 'RAS', 0, 'felicien', '2015-02-21'),
(8, 'user1', 'user1', 'C', 2, NULL, 0, 'felicien', '2015-02-17'),
(9, 'admin', 'admin', 'A', 1, NULL, 0, 'felicien', '2015-02-24'),
(10, 'gisele', 'gisele', 'S', 6, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `phone`, `email`) VALUES
(3, 'fname1', 'lname1', '(000)000-0000', 'name1@gmail.com'),
(4, 'fname2', 'lname2', '(000)000-0000', 'name2@gmail.com'),
(5, 'fname3', 'lname3', '(000)000-0000', 'name3@gmail.com'),
(7, 'fname4', 'lname4', '(000)000-0000', 'name4@gmail.com'),
(8, 'fname5', 'lname5', '(000)000-0000', 'name5@gmail.com'),
(9, 'fname6', 'lname6', '(000)000-0000', 'name6@gmail.com'),
(10, 'fname7', 'lname7', '(000)000-0000', 'name7@gmail.com'),
(11, 'fname8', 'lname8', '(000)000-0000', 'name8@gmail.com'),
(12, 'fname9', 'lname9', '(000)000-0000', 'name9@gmail.com'),
(13, 'fname10', 'lname10', '(000)000-0000', 'name10@gmail.com');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v1`
--
CREATE TABLE IF NOT EXISTS `v1` (
`idcust` int(11)
,`customers_idcust` int(11)
,`entities_idcust` int(11)
,`pcnamecust` varchar(50)
,`processorcust` varchar(25)
,`ramcust` varchar(25)
,`hddcust` varchar(50)
,`cartegraphcust` varchar(50)
,`computermodels_idcust` int(11)
,`computertypes_idcust` int(11)
,`date_modcust` datetime
,`os_idcust` int(11)
,`osvp_idcust` int(11)
,`domainamecust` varchar(255)
,`sessionamecust` varchar(255)
,`spasswordcust` varchar(255)
,`_id` varchar(30)
,`groups_id` varchar(30)
,`tlognamecust` varchar(255)
,`adresseipcust` varchar(255)
,`typeadressagecust` varchar(255)
,`connexionviacust` varchar(255)
,`locationcust` varchar(255)
,`authorcust` varchar(30)
,`mod_datecust` date
,`isdeletedcust` tinyint(1)
,`modelnamecust` varchar(255)
,`modelisdeletedcust` int(1)
,`modelauthorcust` varchar(50)
,`modelmod_datecust` date
,`osname` varchar(255)
,`osisdeletedcust` int(1)
,`osauthorcust` varchar(30)
,`osmod_datecust` date
,`osvpname` varchar(255)
,`osvpdeletedcust` int(1)
,`osvpauthorcust` varchar(30)
,`osvpmod_datecust` date
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vtictane_customers_computers`
--
CREATE TABLE IF NOT EXISTS `vtictane_customers_computers` (
`idcust` int(11)
,`customers_idcust` int(11)
,`entities_idcust` int(11)
,`pcnamecust` varchar(50)
,`processorcust` varchar(25)
,`ramcust` varchar(25)
,`hddcust` varchar(50)
,`cartegraphcust` varchar(50)
,`serialcust` varchar(50)
,`computermodels_idcust` int(11)
,`computertypes_idcust` int(11)
,`date_modcust` datetime
,`os_idcust` int(11)
,`osvp_idcust` int(11)
,`domainamecust` varchar(255)
,`sessionamecust` varchar(255)
,`spasswordcust` varchar(255)
,`users_id` varchar(30)
,`groups_id` varchar(30)
,`tlognamecust` varchar(255)
,`adresseipcust` varchar(255)
,`typeadressagecust` varchar(255)
,`connexionviacust` varchar(255)
,`commentcust` text
,`locationcust` varchar(255)
,`authorcust` varchar(30)
,`mod_datecust` date
,`isdeletedcust` tinyint(1)
,`modelnamecust` varchar(255)
,`modelisdeletedcust` int(1)
,`modelauthorcust` varchar(50)
,`modelmod_datecust` date
,`osname` varchar(255)
,`osisdeletedcust` int(1)
,`osauthorcust` varchar(30)
,`osmod_datecust` date
,`osvpname` varchar(255)
,`osvpdeletedcust` int(1)
,`osvpauthorcust` varchar(30)
,`osvpmod_datecust` date
,`companynament` varchar(255)
,`mobile_ent` varchar(255)
,`phone_ent` varchar(255)
,`email_ent` varchar(255)
,`customer_name` varchar(255)
,`mobile_cust` varchar(255)
,`phone_cust` varchar(255)
,`email_cust` varchar(255)
,`typenamecust` varchar(255)
,`is_deletedtype` int(1)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vtictan_customers`
--
CREATE TABLE IF NOT EXISTS `vtictan_customers` (
`idencust` int(11)
,`customer_name` varchar(255)
,`phonecust` varchar(255)
,`mobilecust` varchar(255)
,`faxcust` varchar(255)
,`emailcust` varchar(255)
,`websitecust` varchar(255)
,`commentcust` text
,`is_deletecust` tinyint(1)
,`addresscust` varchar(100)
,`postcodcust` varchar(255)
,`towncust` varchar(255)
,`statecust` varchar(255)
,`countrycust` varchar(255)
,`authorcust` varchar(255)
,`mod_datecust` date
,`entities_id` int(11)
,`ident` int(11)
,`companynament` varchar(255)
,`phonent` varchar(255)
,`phone2ent` varchar(255)
,`mobilent` varchar(255)
,`faxent` varchar(255)
,`emailent` varchar(255)
,`websitent` varchar(255)
,`commentent` text
,`deleteent` int(1)
,`adressent` text
,`postcodent` varchar(255)
,`town` varchar(255)
,`statent` varchar(255)
,`countryent` varchar(255)
,`authorent` varchar(255)
,`mod_datent` date
,`customtype_id` int(11)
,`namecustomtype` varchar(255)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vtictan_customers_accessories`
--
CREATE TABLE IF NOT EXISTS `vtictan_customers_accessories` (
`id_acc` int(11)
,`customers_id` int(11)
,`entities_id` int(11)
,`name` varchar(50)
,`serialacc` varchar(255)
,`accessorymodels_id` int(11)
,`accessorytypes_id` int(11)
,`date_mod` datetime
,`users_id` varchar(30)
,`groups_id` varchar(30)
,`comment` text
,`location` varchar(255)
,`author` varchar(30)
,`is_deleted` tinyint(1)
,`namemodel` varchar(255)
,`is_deleted_model` int(11)
,`nametype` varchar(255)
,`is_deleted_type` int(11)
,`companynament` varchar(255)
,`mobile_ent` varchar(255)
,`phone_ent` varchar(255)
,`email_ent` varchar(255)
,`customer_name` varchar(255)
,`mobile_cust` varchar(255)
,`phone_cust` varchar(255)
,`email_cust` varchar(255)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vtictan_customers_computers`
--
CREATE TABLE IF NOT EXISTS `vtictan_customers_computers` (
`idcust` int(11)
,`customers_idcust` int(11)
,`entities_idcust` int(11)
,`pcnamecust` varchar(50)
,`processorcust` varchar(25)
,`ramcust` varchar(25)
,`hddcust` varchar(50)
,`cartegraphcust` varchar(50)
,`serialcust` varchar(50)
,`computermodels_idcust` int(11)
,`computertypes_idcust` int(11)
,`os_idcust` int(11)
,`osvp_idcust` int(11)
,`domainamecust` varchar(255)
,`sessionamecust` varchar(255)
,`spasswordcust` varchar(255)
,`users_id` varchar(30)
,`groups_id` varchar(30)
,`tlognamecust` varchar(255)
,`adresseipcust` varchar(255)
,`typeadressagecust` varchar(255)
,`connexionviacust` varchar(255)
,`commentcust` text
,`locationcust` varchar(255)
,`authorcust` varchar(30)
,`mod_datecust` date
,`isdeletedcust` tinyint(1)
,`modelnamecust` varchar(255)
,`modelisdeletedcust` int(1)
,`modelauthorcust` varchar(50)
,`modelmod_datecust` date
,`osidcust` int(11)
,`osname` varchar(255)
,`osisdeletedcust` int(1)
,`osauthorcust` varchar(30)
,`osmod_datecust` date
,`osvpidcust` int(11)
,`osvpname` varchar(255)
,`osvpdeletedcust` int(1)
,`osvpauthorcust` varchar(30)
,`osvpmod_datecust` date
,`companynament` varchar(255)
,`mobile_ent` varchar(255)
,`phone_ent` varchar(255)
,`email_ent` varchar(255)
,`customer_name` varchar(255)
,`mobile_cust` varchar(255)
,`phone_cust` varchar(255)
,`email_cust` varchar(255)
,`typenamecust` varchar(255)
,`is_deletedtype` int(1)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vtictan_customers_contacts`
--
CREATE TABLE IF NOT EXISTS `vtictan_customers_contacts` (
`idcontact` int(11)
,`customers_id_contacts` int(11)
,`entities_id_contacts` int(11)
,`name_contacts` varchar(255)
,`firstName_contacts` varchar(255)
,`phone_contacts` varchar(255)
,`phone2_contacts` varchar(255)
,`mobile_contacts` varchar(255)
,`fax_contacts` varchar(255)
,`email_contacts` varchar(255)
,`contacttype_id_contacts` int(11)
,`comment_contacts` text
,`is_deleted_contacts` tinyint(1)
,`address_contacts` text
,`postcode_contacts` varchar(255)
,`town_contacts` varchar(255)
,`state_contacts` varchar(255)
,`country_contacts` varchar(255)
,`author_contacts` varchar(30)
,`mod_date_contacts` date
,`id_deleted_contacts` tinyint(1)
,`idencust` int(11)
,`customer_name` varchar(255)
,`phonecust` varchar(255)
,`mobilecust` varchar(255)
,`faxcust` varchar(255)
,`emailcust` varchar(255)
,`websitecust` varchar(255)
,`commentcust` text
,`is_deletecust` tinyint(1)
,`addresscust` varchar(100)
,`postcodcust` varchar(255)
,`towncust` varchar(255)
,`statecust` varchar(255)
,`countrycust` varchar(255)
,`authorcust` varchar(255)
,`mod_datecust` date
,`ident` int(11)
,`companynament` varchar(255)
,`phonent` varchar(255)
,`phone2ent` varchar(255)
,`mobilent` varchar(255)
,`faxent` varchar(255)
,`emailent` varchar(255)
,`websitent` varchar(255)
,`commentent` text
,`deleteent` int(1)
,`adressent` text
,`postcodent` varchar(255)
,`town` varchar(255)
,`statent` varchar(255)
,`countryent` varchar(255)
,`authorent` varchar(255)
,`mod_datent` date
,`name_contacttypes` varchar(255)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vtictan_customers_contacts_typename`
--
CREATE TABLE IF NOT EXISTS `vtictan_customers_contacts_typename` (
`idcontact` int(11)
,`customers_id_contacts` int(11)
,`entities_id_contacts` int(11)
,`name_contacts` varchar(255)
,`firstName_contacts` varchar(255)
,`phone_contacts` varchar(255)
,`phone2_contacts` varchar(255)
,`mobile_contacts` varchar(255)
,`fax_contacts` varchar(255)
,`email_contacts` varchar(255)
,`contacttype_id_contacts` int(11)
,`comment_contacts` text
,`is_deleted_contacts` tinyint(1)
,`address_contacts` text
,`postcode_contacts` varchar(255)
,`town_contacts` varchar(255)
,`state_contacts` varchar(255)
,`country_contacts` varchar(255)
,`author_contacts` varchar(30)
,`mod_date_contacts` date
,`id_deleted_contacts` tinyint(1)
,`idencust` int(11)
,`customer_name` varchar(255)
,`phonecust` varchar(255)
,`mobilecust` varchar(255)
,`faxcust` varchar(255)
,`emailcust` varchar(255)
,`websitecust` varchar(255)
,`commentcust` text
,`is_deletecust` tinyint(1)
,`addresscust` varchar(100)
,`postcodcust` varchar(255)
,`towncust` varchar(255)
,`statecust` varchar(255)
,`countrycust` varchar(255)
,`authorcust` varchar(255)
,`mod_datecust` date
,`ident` int(11)
,`companynament` varchar(255)
,`phonent` varchar(255)
,`phone2ent` varchar(255)
,`mobilent` varchar(255)
,`faxent` varchar(255)
,`emailent` varchar(255)
,`websitent` varchar(255)
,`commentent` text
,`deleteent` int(1)
,`adressent` text
,`postcodent` varchar(255)
,`town` varchar(255)
,`statent` varchar(255)
,`countryent` varchar(255)
,`authorent` varchar(255)
,`mod_datent` date
,`name_contacttypes` varchar(255)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vtictan_customers_copiers`
--
CREATE TABLE IF NOT EXISTS `vtictan_customers_copiers` (
`id_copiers` int(11)
,`namecopiers` varchar(255)
,`serial_copiers` varchar(255)
,`customers_id` int(11)
,`entities_id` int(11)
,`comment` text
,`mod_date` date
,`copiersmodels_id` int(11)
,`copierstypes_id` int(11)
,`is_deleted` tinyint(1)
,`adresseip` varchar(255)
,`typeadressage` varchar(255)
,`connexionvia` varchar(255)
,`location` varchar(255)
,`is_dynamic` tinyint(1)
,`users_id` varchar(30)
,`groups_id` varchar(30)
,`author` varchar(50)
,`namemodel` varchar(255)
,`is_deleted_model` int(1)
,`nametype` varchar(255)
,`is_deleted_type` int(1)
,`companynament` varchar(255)
,`mobile_ent` varchar(255)
,`phone_ent` varchar(255)
,`email_ent` varchar(255)
,`customer_name` varchar(255)
,`mobile_cust` varchar(255)
,`phone_cust` varchar(255)
,`email_cust` varchar(255)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vtictan_customers_coprinters`
--
CREATE TABLE IF NOT EXISTS `vtictan_customers_coprinters` (
`id_coprinters` int(11)
,`namecoprinters` varchar(255)
,`serial_coprinters` varchar(255)
,`customers_id` int(11)
,`entities_id` int(11)
,`comment` text
,`mod_date` datetime
,`coprintersmodels_id` int(11)
,`coprinterstypes_id` int(11)
,`is_deleted` tinyint(1)
,`adresseip` varchar(255)
,`typeadressage` varchar(255)
,`connexionvia` varchar(255)
,`location` varchar(255)
,`is_dynamic` tinyint(1)
,`users_id` varchar(30)
,`groups_id` varchar(30)
,`author` varchar(50)
,`namemodel` varchar(255)
,`is_deleted_model` int(11)
,`nametype` varchar(255)
,`is_deleted_type` int(1)
,`companynament` varchar(255)
,`mobile_ent` varchar(255)
,`phone_ent` varchar(255)
,`email_ent` varchar(255)
,`customer_name` varchar(255)
,`mobile_cust` varchar(255)
,`phone_cust` varchar(255)
,`email_cust` varchar(255)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vtictan_customers_group`
--
CREATE TABLE IF NOT EXISTS `vtictan_customers_group` (
`id_user` int(11)
,`customers_id_user` int(11)
,`entities_id_user` int(11)
,`customer_name_user` varchar(255)
,`mobile_user` varchar(255)
,`email_user` varchar(255)
,`fax_user` varchar(255)
,`comment_user` text
,`is_delete_user` tinyint(1)
,`address_user` varchar(100)
,`postcod_user` varchar(255)
,`town_user` varchar(255)
,`state_user` varchar(255)
,`country_user` varchar(255)
,`author_user` varchar(255)
,`mod_date_user` date
,`ident` int(11)
,`companynament` varchar(255)
,`phonent` varchar(255)
,`phone2ent` varchar(255)
,`mobilent` varchar(255)
,`faxent` varchar(255)
,`emailent` varchar(255)
,`websitent` varchar(255)
,`commentent` text
,`deleteent` int(1)
,`adressent` text
,`postcodent` varchar(255)
,`town` varchar(255)
,`statent` varchar(255)
,`countryent` varchar(255)
,`authorent` varchar(255)
,`mod_datent` date
,`group_id` int(11)
,`groupname` varchar(255)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vtictan_customers_monitor`
--
CREATE TABLE IF NOT EXISTS `vtictan_customers_monitor` (
`id_monitor` int(11)
,`namemonitor` varchar(255)
,`serial_monitor` varchar(255)
,`customers_id` int(11)
,`entities_id` int(11)
,`comment` text
,`date_mod` datetime
,`monitormodels_id` int(11)
,`authorcust` varchar(50)
,`monitortypes_id` int(11)
,`isdeleted` tinyint(1)
,`location` varchar(255)
,`is_dynamic` tinyint(1)
,`users_id` varchar(30)
,`groups_id` varchar(30)
,`namemodel` varchar(255)
,`is_deleted_model` tinyint(1)
,`nametype` varchar(255)
,`is_deleted_type` tinyint(1)
,`companynament` varchar(255)
,`mobile_ent` varchar(255)
,`phone_ent` varchar(255)
,`email_ent` varchar(255)
,`customer_name` varchar(255)
,`mobile_cust` varchar(255)
,`phone_cust` varchar(255)
,`email_cust` varchar(255)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vtictan_customers_monitore`
--
CREATE TABLE IF NOT EXISTS `vtictan_customers_monitore` (
`id_monitor` int(11)
,`name_monitor` varchar(255)
,`serial_monitor` varchar(255)
,`customers_id` int(11)
,`entities_id` int(11)
,`comment` text
,`date_mod` datetime
,`monitormodels_id` int(11)
,`monitortypes_id` int(11)
,`is_deleted` tinyint(1)
,`location` varchar(255)
,`is_dynamic` tinyint(1)
,`users_id` varchar(30)
,`groups_id` varchar(30)
,`name_model` varchar(255)
,`is_deleted_model` tinyint(1)
,`name_type` varchar(255)
,`is_deleted_type` tinyint(1)
,`companynament` varchar(255)
,`mobile_ent` varchar(255)
,`phone_ent` varchar(255)
,`email_ent` varchar(255)
,`customer_name` varchar(255)
,`mobile_cust` varchar(255)
,`phone_cust` varchar(255)
,`email_cust` varchar(255)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vtictan_customers_monitors`
--
CREATE TABLE IF NOT EXISTS `vtictan_customers_monitors` (
`id_monitor` int(11)
,`namemonitor` varchar(255)
,`serial_monitor` varchar(255)
,`customers_id` int(11)
,`entities_id` int(11)
,`comment` text
,`mod_date` datetime
,`monitormodels_id` int(11)
,`author` varchar(50)
,`monitortypes_id` int(11)
,`is_deleted` tinyint(1)
,`location` varchar(255)
,`is_dynamic` tinyint(1)
,`users_id` varchar(30)
,`groups_id` varchar(30)
,`namemodel` varchar(255)
,`is_deleted_model` tinyint(1)
,`nametype` varchar(255)
,`is_deleted_type` tinyint(1)
,`companynament` varchar(255)
,`mobile_ent` varchar(255)
,`phone_ent` varchar(255)
,`email_ent` varchar(255)
,`customer_name` varchar(255)
,`mobile_cust` varchar(255)
,`phone_cust` varchar(255)
,`email_cust` varchar(255)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vtictan_customers_network`
--
CREATE TABLE IF NOT EXISTS `vtictan_customers_network` (
`id_network` int(11)
,`namenetwork` varchar(50)
,`serial_network` varchar(255)
,`customers_id` int(11)
,`entities_id` int(11)
,`author` varchar(30)
,`comment` text
,`date_mod` date
,`networkmodels_id` int(11)
,`networktypes_id` int(11)
,`is_deleted` tinyint(1)
,`is_dynamic` tinyint(1)
,`users_id` varchar(30)
,`groups_id` varchar(30)
,`adresseip` varchar(255)
,`typeadressage` varchar(255)
,`connexionvia` varchar(255)
,`location` varchar(255)
,`bridge` varchar(255)
,`mask` varchar(255)
,`smtpserver` varchar(255)
,`fax` varchar(255)
,`login` varchar(255)
,`password` varchar(255)
,`adressrange` varchar(255)
,`namemodel` varchar(255)
,`is_delete_model` int(1)
,`nametype` varchar(255)
,`is_deleted_type` int(1)
,`companynament` varchar(255)
,`mobile_ent` varchar(255)
,`phone_ent` varchar(255)
,`email_ent` varchar(255)
,`customer_name` varchar(255)
,`mobile_cust` varchar(255)
,`phone_cust` varchar(255)
,`email_cust` varchar(255)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vtictan_customers_software`
--
CREATE TABLE IF NOT EXISTS `vtictan_customers_software` (
`id_soft` int(11)
,`namesoft` varchar(255)
,`licencesoft` varchar(255)
,`editorsoft` varchar(255)
,`suppliersoft` varchar(25)
,`customers_id` int(11)
,`entities_id` int(11)
,`comment` text
,`date_mod` date
,`softmodel_id` int(11)
,`softype_id` int(11)
,`is_deleted` tinyint(1)
,`users_id` varchar(30)
,`groups_id` varchar(30)
,`start_date` date
,`end_date` date
,`author` varchar(30)
,`namemodel` varchar(255)
,`is_deleted_model` int(1)
,`nametype` varchar(255)
,`is_deleted_type` int(1)
,`companynament` varchar(255)
,`mobile_ent` varchar(255)
,`phone_ent` varchar(255)
,`email_ent` varchar(255)
,`customer_name` varchar(255)
,`mobile_cust` varchar(255)
,`phone_cust` varchar(255)
,`email_cust` varchar(255)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vtictan_customers_users`
--
CREATE TABLE IF NOT EXISTS `vtictan_customers_users` (
`id_user` int(11)
,`customers_id_user` int(11)
,`entities_id_user` int(11)
,`customer_name_user` varchar(255)
,`mobile_user` varchar(255)
,`email_user` varchar(255)
,`fax_user` varchar(255)
,`comment_user` text
,`is_delete_user` tinyint(1)
,`address_user` varchar(100)
,`postcod_user` varchar(255)
,`town_user` varchar(255)
,`state_user` varchar(255)
,`country_user` varchar(255)
,`author_user` varchar(255)
,`mod_date_user` date
,`ident` int(11)
,`companynament` varchar(255)
,`phonent` varchar(255)
,`phone2ent` varchar(255)
,`mobilent` varchar(255)
,`faxent` varchar(255)
,`emailent` varchar(255)
,`websitent` varchar(255)
,`commentent` text
,`deleteent` int(1)
,`adressent` text
,`postcodent` varchar(255)
,`town` varchar(255)
,`statent` varchar(255)
,`countryent` varchar(255)
,`authorent` varchar(255)
,`mod_datent` date
,`username` varchar(255)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vtictan_cust_comp_soft`
--
CREATE TABLE IF NOT EXISTS `vtictan_cust_comp_soft` (
`id` int(11)
,`namesoft` varchar(255)
,`is_deleted` tinyint(1)
,`suppliersoft` varchar(25)
,`licencesoft` varchar(255)
,`editorsoft` varchar(255)
,`customers_id` int(11)
,`entities_id` int(11)
,`computers_id` int(11)
,`comment` text
,`softmodel_id` int(11)
,`softype_id` int(11)
,`date_mod` date
,`start_date` date
,`end_date` date
,`author` varchar(30)
,`pcname` varchar(50)
,`customer_name` varchar(255)
,`mobile_cust` varchar(255)
,`phone_cust` varchar(255)
,`email_cust` varchar(255)
,`namemodel` varchar(255)
,`is_deleted_model` tinyint(1)
,`nametype` varchar(255)
,`is_deleted_type` int(1)
,`companynament` varchar(255)
,`mobile_ent` varchar(255)
,`phone_ent` varchar(255)
,`email_ent` varchar(255)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vtictan_osvp_os`
--
CREATE TABLE IF NOT EXISTS `vtictan_osvp_os` (
`osvp_id` int(11)
,`os_id_osvp` int(11)
,`name_osvp` varchar(255)
,`is_deleted_osvpos` int(1)
,`name_os` varchar(255)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vtictan_skilltech`
--
CREATE TABLE IF NOT EXISTS `vtictan_skilltech` (
`id` int(11)
,`staff_id` int(11)
,`comment` text
,`is_deleted` tinyint(1)
,`author` varchar(255)
,`mod_date` date
,`name` varchar(255)
,`mobile` varchar(255)
,`email` varchar(255)
,`address` text
,`postcode` varchar(255)
,`town` varchar(255)
,`state` varchar(255)
,`country` varchar(255)
,`description` varchar(255)
);
-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vtictan_tecskills`
--
CREATE TABLE IF NOT EXISTS `vtictan_tecskills` (
`skill_id` int(11)
,`staff_id` int(11)
,`comment` text
,`author` varchar(255)
,`mod_date` date
,`is_deleted` tinyint(1)
,`description_skills` varchar(255)
,`name_tech` varchar(255)
);
-- --------------------------------------------------------

--
-- Structure de la vue `v1`
--
DROP TABLE IF EXISTS `v1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v1` AS select `a`.`id` AS `idcust`,`a`.`customers_id` AS `customers_idcust`,`a`.`entities_id` AS `entities_idcust`,`a`.`pcname` AS `pcnamecust`,`a`.`processor` AS `processorcust`,`a`.`ram` AS `ramcust`,`a`.`hdd` AS `hddcust`,`a`.`cartegraph` AS `cartegraphcust`,`a`.`computermodels_id` AS `computermodels_idcust`,`a`.`computertypes_id` AS `computertypes_idcust`,`a`.`date_mod` AS `date_modcust`,`a`.`os_id` AS `os_idcust`,`a`.`osvp_id` AS `osvp_idcust`,`a`.`domainame` AS `domainamecust`,`a`.`sessioname` AS `sessionamecust`,`a`.`spassword` AS `spasswordcust`,`a`.`users_id` AS `_id`,`a`.`groups_id` AS `groups_id`,`a`.`teamv_logname` AS `tlognamecust`,`a`.`adresseip` AS `adresseipcust`,`a`.`typeadressage` AS `typeadressagecust`,`a`.`connexionvia` AS `connexionviacust`,`a`.`location` AS `locationcust`,`a`.`author` AS `authorcust`,`a`.`mod_date` AS `mod_datecust`,`a`.`is_deleted` AS `isdeletedcust`,`b`.`name` AS `modelnamecust`,`b`.`is_deleted` AS `modelisdeletedcust`,`b`.`author` AS `modelauthorcust`,`b`.`mod_date` AS `modelmod_datecust`,`c`.`name` AS `osname`,`c`.`is_deleted` AS `osisdeletedcust`,`c`.`author` AS `osauthorcust`,`c`.`mod_date` AS `osmod_datecust`,`d`.`name` AS `osvpname`,`d`.`is_deleted` AS `osvpdeletedcust`,`d`.`author` AS `osvpauthorcust`,`d`.`mod_date` AS `osvpmod_datecust` from (((`tictan_customer_computers` `a` join `tictan_computermodels` `b`) join `tictan_os` `c`) join `tictan_osvp` `d`) where ((`a`.`computermodels_id` = `b`.`id`) and (`a`.`os_id` = `c`.`id`) and (`a`.`osvp_id` = `d`.`id`));

-- --------------------------------------------------------

--
-- Structure de la vue `vtictane_customers_computers`
--
DROP TABLE IF EXISTS `vtictane_customers_computers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtictane_customers_computers` AS select `a`.`id` AS `idcust`,`a`.`customers_id` AS `customers_idcust`,`a`.`entities_id` AS `entities_idcust`,`a`.`pcname` AS `pcnamecust`,`a`.`processor` AS `processorcust`,`a`.`ram` AS `ramcust`,`a`.`hdd` AS `hddcust`,`a`.`cartegraph` AS `cartegraphcust`,`a`.`serial` AS `serialcust`,`a`.`computermodels_id` AS `computermodels_idcust`,`a`.`computertypes_id` AS `computertypes_idcust`,`a`.`date_mod` AS `date_modcust`,`a`.`os_id` AS `os_idcust`,`a`.`osvp_id` AS `osvp_idcust`,`a`.`domainame` AS `domainamecust`,`a`.`sessioname` AS `sessionamecust`,`a`.`spassword` AS `spasswordcust`,`a`.`users_id` AS `users_id`,`a`.`groups_id` AS `groups_id`,`a`.`teamv_logname` AS `tlognamecust`,`a`.`adresseip` AS `adresseipcust`,`a`.`typeadressage` AS `typeadressagecust`,`a`.`connexionvia` AS `connexionviacust`,`a`.`comment` AS `commentcust`,`a`.`location` AS `locationcust`,`a`.`author` AS `authorcust`,`a`.`mod_date` AS `mod_datecust`,`a`.`is_deleted` AS `isdeletedcust`,`b`.`name` AS `modelnamecust`,`b`.`is_deleted` AS `modelisdeletedcust`,`b`.`author` AS `modelauthorcust`,`b`.`mod_date` AS `modelmod_datecust`,`c`.`name` AS `osname`,`c`.`is_deleted` AS `osisdeletedcust`,`c`.`author` AS `osauthorcust`,`c`.`mod_date` AS `osmod_datecust`,`d`.`name` AS `osvpname`,`d`.`is_deleted` AS `osvpdeletedcust`,`d`.`author` AS `osvpauthorcust`,`d`.`mod_date` AS `osvpmod_datecust`,`e`.`companyname` AS `companynament`,`e`.`mobile` AS `mobile_ent`,`e`.`phone` AS `phone_ent`,`e`.`email` AS `email_ent`,`f`.`customer_name` AS `customer_name`,`f`.`mobile` AS `mobile_cust`,`f`.`phone` AS `phone_cust`,`f`.`email` AS `email_cust`,`g`.`name` AS `typenamecust`,`g`.`is_deleted` AS `is_deletedtype` from ((((((`tictan_customer_computers` `a` join `tictan_computermodels` `b`) join `tictan_os` `c`) join `tictan_osvp` `d`) join `tictan_entities` `e`) join `tictan_customers` `f`) join `tictan_computertypes` `g`) where ((`a`.`computermodels_id` = `b`.`id`) and (`a`.`os_id` = `c`.`id`) and (`a`.`osvp_id` = `d`.`id`) and (`a`.`computertypes_id` = `g`.`id`) and (`a`.`entities_id` = `e`.`id`) and (`a`.`customers_id` = `f`.`id`));

-- --------------------------------------------------------

--
-- Structure de la vue `vtictan_customers`
--
DROP TABLE IF EXISTS `vtictan_customers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtictan_customers` AS select `a`.`id` AS `idencust`,`a`.`customer_name` AS `customer_name`,`a`.`phone` AS `phonecust`,`a`.`mobile` AS `mobilecust`,`a`.`fax` AS `faxcust`,`a`.`email` AS `emailcust`,`a`.`website` AS `websitecust`,`a`.`comment` AS `commentcust`,`a`.`is_deleted` AS `is_deletecust`,`a`.`address` AS `addresscust`,`a`.`postcode` AS `postcodcust`,`a`.`town` AS `towncust`,`a`.`state` AS `statecust`,`a`.`country` AS `countrycust`,`a`.`author` AS `authorcust`,`a`.`mod_date` AS `mod_datecust`,`a`.`entities_id` AS `entities_id`,`b`.`id` AS `ident`,`b`.`companyname` AS `companynament`,`b`.`phone` AS `phonent`,`b`.`phone2` AS `phone2ent`,`b`.`mobile` AS `mobilent`,`b`.`fax` AS `faxent`,`b`.`email` AS `emailent`,`b`.`website` AS `websitent`,`b`.`comment` AS `commentent`,`b`.`is_deleted` AS `deleteent`,`b`.`address` AS `adressent`,`b`.`postcode` AS `postcodent`,`b`.`town` AS `town`,`b`.`state` AS `statent`,`b`.`country` AS `countryent`,`b`.`author` AS `authorent`,`b`.`mod_date` AS `mod_datent`,`c`.`id` AS `customtype_id`,`c`.`name` AS `namecustomtype` from ((`tictan_customers` `a` join `tictan_entities` `b`) join `tictan_customtype` `c`) where ((`a`.`entities_id` = `b`.`id`) and (`a`.`customtype_id` = `c`.`id`));

-- --------------------------------------------------------

--
-- Structure de la vue `vtictan_customers_accessories`
--
DROP TABLE IF EXISTS `vtictan_customers_accessories`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtictan_customers_accessories` AS select `a`.`id` AS `id_acc`,`a`.`customers_id` AS `customers_id`,`a`.`entities_id` AS `entities_id`,`a`.`name` AS `name`,`a`.`serial` AS `serialacc`,`a`.`accessorymodels_id` AS `accessorymodels_id`,`a`.`accessorytypes_id` AS `accessorytypes_id`,`a`.`date_mod` AS `date_mod`,`a`.`users_id` AS `users_id`,`a`.`groups_id` AS `groups_id`,`a`.`comment` AS `comment`,`a`.`location` AS `location`,`a`.`author` AS `author`,`a`.`is_deleted` AS `is_deleted`,`b`.`name` AS `namemodel`,`b`.`is_deleted` AS `is_deleted_model`,`c`.`name` AS `nametype`,`c`.`is_deleted` AS `is_deleted_type`,`e`.`companyname` AS `companynament`,`e`.`mobile` AS `mobile_ent`,`e`.`phone` AS `phone_ent`,`e`.`email` AS `email_ent`,`f`.`customer_name` AS `customer_name`,`f`.`mobile` AS `mobile_cust`,`f`.`phone` AS `phone_cust`,`f`.`email` AS `email_cust` from ((((`tictan_customer_accessories` `a` join `tictan_accessoriesmodels` `b`) join `tictan_accessoriestypes` `c`) join `tictan_entities` `e`) join `tictan_customers` `f`) where ((`a`.`accessorymodels_id` = `b`.`id`) and (`a`.`accessorytypes_id` = `c`.`id`) and (`a`.`entities_id` = `e`.`id`) and (`a`.`customers_id` = `f`.`id`));

-- --------------------------------------------------------

--
-- Structure de la vue `vtictan_customers_computers`
--
DROP TABLE IF EXISTS `vtictan_customers_computers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtictan_customers_computers` AS select `a`.`id` AS `idcust`,`a`.`customers_id` AS `customers_idcust`,`a`.`entities_id` AS `entities_idcust`,`a`.`pcname` AS `pcnamecust`,`a`.`processor` AS `processorcust`,`a`.`ram` AS `ramcust`,`a`.`hdd` AS `hddcust`,`a`.`cartegraph` AS `cartegraphcust`,`a`.`serial` AS `serialcust`,`a`.`computermodels_id` AS `computermodels_idcust`,`a`.`computertypes_id` AS `computertypes_idcust`,`a`.`os_id` AS `os_idcust`,`a`.`osvp_id` AS `osvp_idcust`,`a`.`domainame` AS `domainamecust`,`a`.`sessioname` AS `sessionamecust`,`a`.`spassword` AS `spasswordcust`,`a`.`users_id` AS `users_id`,`a`.`groups_id` AS `groups_id`,`a`.`teamv_logname` AS `tlognamecust`,`a`.`adresseip` AS `adresseipcust`,`a`.`typeadressage` AS `typeadressagecust`,`a`.`connexionvia` AS `connexionviacust`,`a`.`comment` AS `commentcust`,`a`.`location` AS `locationcust`,`a`.`author` AS `authorcust`,`a`.`mod_date` AS `mod_datecust`,`a`.`is_deleted` AS `isdeletedcust`,`b`.`name` AS `modelnamecust`,`b`.`is_deleted` AS `modelisdeletedcust`,`b`.`author` AS `modelauthorcust`,`b`.`mod_date` AS `modelmod_datecust`,`c`.`id` AS `osidcust`,`c`.`name` AS `osname`,`c`.`is_deleted` AS `osisdeletedcust`,`c`.`author` AS `osauthorcust`,`c`.`mod_date` AS `osmod_datecust`,`d`.`id` AS `osvpidcust`,`d`.`name` AS `osvpname`,`d`.`is_deleted` AS `osvpdeletedcust`,`d`.`author` AS `osvpauthorcust`,`d`.`mod_date` AS `osvpmod_datecust`,`e`.`companyname` AS `companynament`,`e`.`mobile` AS `mobile_ent`,`e`.`phone` AS `phone_ent`,`e`.`email` AS `email_ent`,`f`.`customer_name` AS `customer_name`,`f`.`mobile` AS `mobile_cust`,`f`.`phone` AS `phone_cust`,`f`.`email` AS `email_cust`,`g`.`name` AS `typenamecust`,`g`.`is_deleted` AS `is_deletedtype` from ((((((`tictan_customer_computers` `a` join `tictan_computermodels` `b`) join `tictan_os` `c`) join `tictan_osvp` `d`) join `tictan_entities` `e`) join `tictan_customers` `f`) join `tictan_computertypes` `g`) where ((`a`.`computermodels_id` = `b`.`id`) and (`a`.`os_id` = `c`.`id`) and (`a`.`osvp_id` = `d`.`id`) and (`a`.`computertypes_id` = `g`.`id`) and (`a`.`entities_id` = `e`.`id`) and (`a`.`customers_id` = `f`.`id`));

-- --------------------------------------------------------

--
-- Structure de la vue `vtictan_customers_contacts`
--
DROP TABLE IF EXISTS `vtictan_customers_contacts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtictan_customers_contacts` AS select `a`.`id` AS `idcontact`,`a`.`customers_id` AS `customers_id_contacts`,`a`.`entities_id` AS `entities_id_contacts`,`a`.`name` AS `name_contacts`,`a`.`firstName` AS `firstName_contacts`,`a`.`phone` AS `phone_contacts`,`a`.`phone2` AS `phone2_contacts`,`a`.`mobile` AS `mobile_contacts`,`a`.`fax` AS `fax_contacts`,`a`.`email` AS `email_contacts`,`a`.`contacttypes_id` AS `contacttype_id_contacts`,`a`.`comment` AS `comment_contacts`,`a`.`is_deleted` AS `is_deleted_contacts`,`a`.`address` AS `address_contacts`,`a`.`postcode` AS `postcode_contacts`,`a`.`town` AS `town_contacts`,`a`.`state` AS `state_contacts`,`a`.`country` AS `country_contacts`,`a`.`author` AS `author_contacts`,`a`.`mod_date` AS `mod_date_contacts`,`a`.`is_deleted` AS `id_deleted_contacts`,`b`.`id` AS `idencust`,`b`.`customer_name` AS `customer_name`,`b`.`phone` AS `phonecust`,`b`.`mobile` AS `mobilecust`,`b`.`fax` AS `faxcust`,`b`.`email` AS `emailcust`,`b`.`website` AS `websitecust`,`b`.`comment` AS `commentcust`,`b`.`is_deleted` AS `is_deletecust`,`b`.`address` AS `addresscust`,`b`.`postcode` AS `postcodcust`,`b`.`town` AS `towncust`,`b`.`state` AS `statecust`,`b`.`country` AS `countrycust`,`b`.`author` AS `authorcust`,`b`.`mod_date` AS `mod_datecust`,`c`.`id` AS `ident`,`c`.`companyname` AS `companynament`,`c`.`phone` AS `phonent`,`c`.`phone2` AS `phone2ent`,`c`.`mobile` AS `mobilent`,`c`.`fax` AS `faxent`,`c`.`email` AS `emailent`,`c`.`website` AS `websitent`,`c`.`comment` AS `commentent`,`c`.`is_deleted` AS `deleteent`,`c`.`address` AS `adressent`,`c`.`postcode` AS `postcodent`,`c`.`town` AS `town`,`c`.`state` AS `statent`,`c`.`country` AS `countryent`,`c`.`author` AS `authorent`,`c`.`mod_date` AS `mod_datent`,`d`.`name` AS `name_contacttypes` from ((`tictan_customers_contacts` `a` join `tictan_customers` `b`) join (`tictan_entities` `c` join `tictan_contacttypes` `d`)) where ((`a`.`customers_id` = `b`.`id`) and (`a`.`entities_id` = `c`.`id`) and (`a`.`contacttypes_id` = `d`.`id`));

-- --------------------------------------------------------

--
-- Structure de la vue `vtictan_customers_contacts_typename`
--
DROP TABLE IF EXISTS `vtictan_customers_contacts_typename`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtictan_customers_contacts_typename` AS select `a`.`id` AS `idcontact`,`a`.`customers_id` AS `customers_id_contacts`,`a`.`entities_id` AS `entities_id_contacts`,`a`.`name` AS `name_contacts`,`a`.`firstName` AS `firstName_contacts`,`a`.`phone` AS `phone_contacts`,`a`.`phone2` AS `phone2_contacts`,`a`.`mobile` AS `mobile_contacts`,`a`.`fax` AS `fax_contacts`,`a`.`email` AS `email_contacts`,`a`.`contacttypes_id` AS `contacttype_id_contacts`,`a`.`comment` AS `comment_contacts`,`a`.`is_deleted` AS `is_deleted_contacts`,`a`.`address` AS `address_contacts`,`a`.`postcode` AS `postcode_contacts`,`a`.`town` AS `town_contacts`,`a`.`state` AS `state_contacts`,`a`.`country` AS `country_contacts`,`a`.`author` AS `author_contacts`,`a`.`mod_date` AS `mod_date_contacts`,`a`.`is_deleted` AS `id_deleted_contacts`,`b`.`id` AS `idencust`,`b`.`customer_name` AS `customer_name`,`b`.`phone` AS `phonecust`,`b`.`mobile` AS `mobilecust`,`b`.`fax` AS `faxcust`,`b`.`email` AS `emailcust`,`b`.`website` AS `websitecust`,`b`.`comment` AS `commentcust`,`b`.`is_deleted` AS `is_deletecust`,`b`.`address` AS `addresscust`,`b`.`postcode` AS `postcodcust`,`b`.`town` AS `towncust`,`b`.`state` AS `statecust`,`b`.`country` AS `countrycust`,`b`.`author` AS `authorcust`,`b`.`mod_date` AS `mod_datecust`,`c`.`id` AS `ident`,`c`.`companyname` AS `companynament`,`c`.`phone` AS `phonent`,`c`.`phone2` AS `phone2ent`,`c`.`mobile` AS `mobilent`,`c`.`fax` AS `faxent`,`c`.`email` AS `emailent`,`c`.`website` AS `websitent`,`c`.`comment` AS `commentent`,`c`.`is_deleted` AS `deleteent`,`c`.`address` AS `adressent`,`c`.`postcode` AS `postcodent`,`c`.`town` AS `town`,`c`.`state` AS `statent`,`c`.`country` AS `countryent`,`c`.`author` AS `authorent`,`c`.`mod_date` AS `mod_datent`,`d`.`name` AS `name_contacttypes` from ((`tictan_customers_contacts` `a` join `tictan_customers` `b`) join (`tictan_entities` `c` join `tictan_contacttypes` `d`)) where ((`a`.`customers_id` = `b`.`id`) and (`a`.`entities_id` = `c`.`id`) and (`a`.`contacttypes_id` = `d`.`id`));

-- --------------------------------------------------------

--
-- Structure de la vue `vtictan_customers_copiers`
--
DROP TABLE IF EXISTS `vtictan_customers_copiers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtictan_customers_copiers` AS select `a`.`id` AS `id_copiers`,`a`.`name` AS `namecopiers`,`a`.`serial` AS `serial_copiers`,`a`.`customers_id` AS `customers_id`,`a`.`entities_id` AS `entities_id`,`a`.`comment` AS `comment`,`a`.`date_mod` AS `mod_date`,`a`.`copiersmodels_id` AS `copiersmodels_id`,`a`.`copierstypes_id` AS `copierstypes_id`,`a`.`is_deleted` AS `is_deleted`,`a`.`adresseip` AS `adresseip`,`a`.`typeadressage` AS `typeadressage`,`a`.`connexionvia` AS `connexionvia`,`a`.`location` AS `location`,`a`.`is_dynamic` AS `is_dynamic`,`a`.`users_id` AS `users_id`,`a`.`groups_id` AS `groups_id`,`a`.`author` AS `author`,`b`.`name` AS `namemodel`,`b`.`is_deleted` AS `is_deleted_model`,`c`.`name` AS `nametype`,`c`.`is_deleted` AS `is_deleted_type`,`e`.`companyname` AS `companynament`,`e`.`mobile` AS `mobile_ent`,`e`.`phone` AS `phone_ent`,`e`.`email` AS `email_ent`,`f`.`customer_name` AS `customer_name`,`f`.`mobile` AS `mobile_cust`,`f`.`phone` AS `phone_cust`,`f`.`email` AS `email_cust` from ((((`tictan_customers_copiers` `a` join `tictan_copiermodels` `b`) join `tictan_copierstypes` `c`) join `tictan_entities` `e`) join `tictan_customers` `f`) where ((`a`.`copiersmodels_id` = `b`.`id`) and (`a`.`copierstypes_id` = `c`.`id`) and (`a`.`entities_id` = `e`.`id`) and (`a`.`customers_id` = `f`.`id`));

-- --------------------------------------------------------

--
-- Structure de la vue `vtictan_customers_coprinters`
--
DROP TABLE IF EXISTS `vtictan_customers_coprinters`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtictan_customers_coprinters` AS select `a`.`id` AS `id_coprinters`,`a`.`name` AS `namecoprinters`,`a`.`serial` AS `serial_coprinters`,`a`.`customers_id` AS `customers_id`,`a`.`entities_id` AS `entities_id`,`a`.`comment` AS `comment`,`a`.`date_mod` AS `mod_date`,`a`.`coprintersmodels_id` AS `coprintersmodels_id`,`a`.`coprinterstypes_id` AS `coprinterstypes_id`,`a`.`is_deleted` AS `is_deleted`,`a`.`adresseip` AS `adresseip`,`a`.`typeadressage` AS `typeadressage`,`a`.`connexionvia` AS `connexionvia`,`a`.`location` AS `location`,`a`.`is_dynamic` AS `is_dynamic`,`a`.`users_id` AS `users_id`,`a`.`groups_id` AS `groups_id`,`a`.`author` AS `author`,`b`.`name` AS `namemodel`,`b`.`is_deleted` AS `is_deleted_model`,`c`.`name` AS `nametype`,`c`.`is_deleted` AS `is_deleted_type`,`e`.`companyname` AS `companynament`,`e`.`mobile` AS `mobile_ent`,`e`.`phone` AS `phone_ent`,`e`.`email` AS `email_ent`,`f`.`customer_name` AS `customer_name`,`f`.`mobile` AS `mobile_cust`,`f`.`phone` AS `phone_cust`,`f`.`email` AS `email_cust` from ((((`tictan_customers_coprinters` `a` join `tictan_coprintermodels` `b`) join `tictan_coprinterstypes` `c`) join `tictan_entities` `e`) join `tictan_customers` `f`) where ((`a`.`coprintersmodels_id` = `b`.`id`) and (`a`.`coprinterstypes_id` = `c`.`id`) and (`a`.`entities_id` = `e`.`id`) and (`a`.`customers_id` = `f`.`id`));

-- --------------------------------------------------------

--
-- Structure de la vue `vtictan_customers_group`
--
DROP TABLE IF EXISTS `vtictan_customers_group`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtictan_customers_group` AS select `a`.`id` AS `id_user`,`a`.`id` AS `customers_id_user`,`a`.`entities_id` AS `entities_id_user`,`a`.`customer_name` AS `customer_name_user`,`a`.`mobile` AS `mobile_user`,`a`.`email` AS `email_user`,`a`.`fax` AS `fax_user`,`a`.`comment` AS `comment_user`,`a`.`is_deleted` AS `is_delete_user`,`a`.`address` AS `address_user`,`a`.`postcode` AS `postcod_user`,`a`.`town` AS `town_user`,`a`.`state` AS `state_user`,`a`.`country` AS `country_user`,`a`.`author` AS `author_user`,`a`.`mod_date` AS `mod_date_user`,`b`.`id` AS `ident`,`b`.`companyname` AS `companynament`,`b`.`phone` AS `phonent`,`b`.`phone2` AS `phone2ent`,`b`.`mobile` AS `mobilent`,`b`.`fax` AS `faxent`,`b`.`email` AS `emailent`,`b`.`website` AS `websitent`,`b`.`comment` AS `commentent`,`b`.`is_deleted` AS `deleteent`,`b`.`address` AS `adressent`,`b`.`postcode` AS `postcodent`,`b`.`town` AS `town`,`b`.`state` AS `statent`,`b`.`country` AS `countryent`,`b`.`author` AS `authorent`,`b`.`mod_date` AS `mod_datent`,`c`.`id` AS `group_id`,`c`.`groupname` AS `groupname` from ((`tictan_customers_group` `c` join `tictan_customers` `a`) join `tictan_entities` `b`) where ((`c`.`entities_id` = `b`.`id`) and (`c`.`customers_id` = `a`.`id`));

-- --------------------------------------------------------

--
-- Structure de la vue `vtictan_customers_monitor`
--
DROP TABLE IF EXISTS `vtictan_customers_monitor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtictan_customers_monitor` AS select `a`.`id` AS `id_monitor`,`a`.`name` AS `namemonitor`,`a`.`serial` AS `serial_monitor`,`a`.`customers_id` AS `customers_id`,`a`.`entities_id` AS `entities_id`,`a`.`comment` AS `comment`,`a`.`date_mod` AS `date_mod`,`a`.`monitormodels_id` AS `monitormodels_id`,`a`.`author` AS `authorcust`,`a`.`monitortypes_id` AS `monitortypes_id`,`a`.`is_deleted` AS `isdeleted`,`a`.`location` AS `location`,`a`.`is_dynamic` AS `is_dynamic`,`a`.`users_id` AS `users_id`,`a`.`groups_id` AS `groups_id`,`b`.`name` AS `namemodel`,`b`.`is_deleted` AS `is_deleted_model`,`c`.`name` AS `nametype`,`c`.`is_deleted` AS `is_deleted_type`,`e`.`companyname` AS `companynament`,`e`.`mobile` AS `mobile_ent`,`e`.`phone` AS `phone_ent`,`e`.`email` AS `email_ent`,`f`.`customer_name` AS `customer_name`,`f`.`mobile` AS `mobile_cust`,`f`.`phone` AS `phone_cust`,`f`.`email` AS `email_cust` from ((((`tictan_customers_monitor` `a` join `tictan_monitormodels` `b`) join `tictan_monitortypes` `c`) join `tictan_entities` `e`) join `tictan_customers` `f`) where ((`a`.`monitormodels_id` = `b`.`id`) and (`a`.`monitortypes_id` = `c`.`id`) and (`a`.`entities_id` = `e`.`id`) and (`a`.`customers_id` = `f`.`id`));

-- --------------------------------------------------------

--
-- Structure de la vue `vtictan_customers_monitore`
--
DROP TABLE IF EXISTS `vtictan_customers_monitore`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtictan_customers_monitore` AS select `a`.`id` AS `id_monitor`,`a`.`name` AS `name_monitor`,`a`.`serial` AS `serial_monitor`,`a`.`customers_id` AS `customers_id`,`a`.`entities_id` AS `entities_id`,`a`.`comment` AS `comment`,`a`.`date_mod` AS `date_mod`,`a`.`monitormodels_id` AS `monitormodels_id`,`a`.`monitortypes_id` AS `monitortypes_id`,`a`.`is_deleted` AS `is_deleted`,`a`.`location` AS `location`,`a`.`is_dynamic` AS `is_dynamic`,`a`.`users_id` AS `users_id`,`a`.`groups_id` AS `groups_id`,`b`.`name` AS `name_model`,`b`.`is_deleted` AS `is_deleted_model`,`c`.`name` AS `name_type`,`c`.`is_deleted` AS `is_deleted_type`,`e`.`companyname` AS `companynament`,`e`.`mobile` AS `mobile_ent`,`e`.`phone` AS `phone_ent`,`e`.`email` AS `email_ent`,`f`.`customer_name` AS `customer_name`,`f`.`mobile` AS `mobile_cust`,`f`.`phone` AS `phone_cust`,`f`.`email` AS `email_cust` from ((((`tictan_customers_monitor` `a` join `tictan_monitormodels` `b`) join `tictan_monitortypes` `c`) join `tictan_entities` `e`) join `tictan_customers` `f`) where ((`a`.`monitormodels_id` = `b`.`id`) and (`a`.`monitortypes_id` = `c`.`id`) and (`a`.`entities_id` = `e`.`id`) and (`a`.`customers_id` = `f`.`id`));

-- --------------------------------------------------------

--
-- Structure de la vue `vtictan_customers_monitors`
--
DROP TABLE IF EXISTS `vtictan_customers_monitors`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtictan_customers_monitors` AS select `a`.`id` AS `id_monitor`,`a`.`name` AS `namemonitor`,`a`.`serial` AS `serial_monitor`,`a`.`customers_id` AS `customers_id`,`a`.`entities_id` AS `entities_id`,`a`.`comment` AS `comment`,`a`.`date_mod` AS `mod_date`,`a`.`monitormodels_id` AS `monitormodels_id`,`a`.`author` AS `author`,`a`.`monitortypes_id` AS `monitortypes_id`,`a`.`is_deleted` AS `is_deleted`,`a`.`location` AS `location`,`a`.`is_dynamic` AS `is_dynamic`,`a`.`users_id` AS `users_id`,`a`.`groups_id` AS `groups_id`,`b`.`name` AS `namemodel`,`b`.`is_deleted` AS `is_deleted_model`,`c`.`name` AS `nametype`,`c`.`is_deleted` AS `is_deleted_type`,`e`.`companyname` AS `companynament`,`e`.`mobile` AS `mobile_ent`,`e`.`phone` AS `phone_ent`,`e`.`email` AS `email_ent`,`f`.`customer_name` AS `customer_name`,`f`.`mobile` AS `mobile_cust`,`f`.`phone` AS `phone_cust`,`f`.`email` AS `email_cust` from ((((`tictan_customers_monitor` `a` join `tictan_monitormodels` `b`) join `tictan_monitortypes` `c`) join `tictan_entities` `e`) join `tictan_customers` `f`) where ((`a`.`monitormodels_id` = `b`.`id`) and (`a`.`monitortypes_id` = `c`.`id`) and (`a`.`entities_id` = `e`.`id`) and (`a`.`customers_id` = `f`.`id`));

-- --------------------------------------------------------

--
-- Structure de la vue `vtictan_customers_network`
--
DROP TABLE IF EXISTS `vtictan_customers_network`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtictan_customers_network` AS select `a`.`id` AS `id_network`,`a`.`name` AS `namenetwork`,`a`.`serial` AS `serial_network`,`a`.`customers_id` AS `customers_id`,`a`.`entities_id` AS `entities_id`,`a`.`author` AS `author`,`a`.`comment` AS `comment`,`a`.`date_mod` AS `date_mod`,`a`.`networkmodels_id` AS `networkmodels_id`,`a`.`networktypes_id` AS `networktypes_id`,`a`.`is_deleted` AS `is_deleted`,`a`.`is_dynamic` AS `is_dynamic`,`a`.`users_id` AS `users_id`,`a`.`groups_id` AS `groups_id`,`a`.`adresseip` AS `adresseip`,`a`.`typeadressage` AS `typeadressage`,`a`.`connexionvia` AS `connexionvia`,`a`.`location` AS `location`,`a`.`bridge` AS `bridge`,`a`.`mask` AS `mask`,`a`.`smtpserver` AS `smtpserver`,`a`.`fax` AS `fax`,`a`.`login` AS `login`,`a`.`password` AS `password`,`a`.`adressrange` AS `adressrange`,`b`.`name` AS `namemodel`,`b`.`is_deleted` AS `is_delete_model`,`c`.`name` AS `nametype`,`c`.`is_deleted` AS `is_deleted_type`,`e`.`companyname` AS `companynament`,`e`.`mobile` AS `mobile_ent`,`e`.`phone` AS `phone_ent`,`e`.`email` AS `email_ent`,`f`.`customer_name` AS `customer_name`,`f`.`mobile` AS `mobile_cust`,`f`.`phone` AS `phone_cust`,`f`.`email` AS `email_cust` from ((((`tictan_customer_network` `a` join `tictan_networkmodels` `b`) join `tictan_networktypes` `c`) join `tictan_entities` `e`) join `tictan_customers` `f`) where ((`a`.`networkmodels_id` = `b`.`id`) and (`a`.`networktypes_id` = `c`.`id`) and (`a`.`entities_id` = `e`.`id`) and (`a`.`customers_id` = `f`.`id`));

-- --------------------------------------------------------

--
-- Structure de la vue `vtictan_customers_software`
--
DROP TABLE IF EXISTS `vtictan_customers_software`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtictan_customers_software` AS select `a`.`id` AS `id_soft`,`a`.`name` AS `namesoft`,`a`.`licence` AS `licencesoft`,`a`.`editor` AS `editorsoft`,`a`.`supplier` AS `suppliersoft`,`a`.`customers_id` AS `customers_id`,`a`.`entities_id` AS `entities_id`,`a`.`comment` AS `comment`,`a`.`date_mod` AS `date_mod`,`a`.`softmodel_id` AS `softmodel_id`,`a`.`softype_id` AS `softype_id`,`a`.`is_deleted` AS `is_deleted`,`a`.`users_id` AS `users_id`,`a`.`groups_id` AS `groups_id`,`a`.`start_date` AS `start_date`,`a`.`end_date` AS `end_date`,`a`.`author` AS `author`,`b`.`name` AS `namemodel`,`b`.`is_deleted` AS `is_deleted_model`,`c`.`name` AS `nametype`,`c`.`is_deleted` AS `is_deleted_type`,`e`.`companyname` AS `companynament`,`e`.`mobile` AS `mobile_ent`,`e`.`phone` AS `phone_ent`,`e`.`email` AS `email_ent`,`f`.`customer_name` AS `customer_name`,`f`.`mobile` AS `mobile_cust`,`f`.`phone` AS `phone_cust`,`f`.`email` AS `email_cust` from ((((`tictan_customers_software` `a` join `tictan_softwaremodels` `b`) join `tictan_softwaretypes` `c`) join `tictan_entities` `e`) join `tictan_customers` `f`) where ((`a`.`softmodel_id` = `b`.`id`) and (`a`.`softype_id` = `c`.`id`) and (`a`.`entities_id` = `e`.`id`) and (`a`.`customers_id` = `f`.`id`));

-- --------------------------------------------------------

--
-- Structure de la vue `vtictan_customers_users`
--
DROP TABLE IF EXISTS `vtictan_customers_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtictan_customers_users` AS select `a`.`id` AS `id_user`,`a`.`id` AS `customers_id_user`,`a`.`entities_id` AS `entities_id_user`,`a`.`customer_name` AS `customer_name_user`,`a`.`mobile` AS `mobile_user`,`a`.`email` AS `email_user`,`a`.`fax` AS `fax_user`,`a`.`comment` AS `comment_user`,`a`.`is_deleted` AS `is_delete_user`,`a`.`address` AS `address_user`,`a`.`postcode` AS `postcod_user`,`a`.`town` AS `town_user`,`a`.`state` AS `state_user`,`a`.`country` AS `country_user`,`a`.`author` AS `author_user`,`a`.`mod_date` AS `mod_date_user`,`b`.`id` AS `ident`,`b`.`companyname` AS `companynament`,`b`.`phone` AS `phonent`,`b`.`phone2` AS `phone2ent`,`b`.`mobile` AS `mobilent`,`b`.`fax` AS `faxent`,`b`.`email` AS `emailent`,`b`.`website` AS `websitent`,`b`.`comment` AS `commentent`,`b`.`is_deleted` AS `deleteent`,`b`.`address` AS `adressent`,`b`.`postcode` AS `postcodent`,`b`.`town` AS `town`,`b`.`state` AS `statent`,`b`.`country` AS `countryent`,`b`.`author` AS `authorent`,`b`.`mod_date` AS `mod_datent`,`c`.`username` AS `username` from ((`tictan_customers_users` `c` join `tictan_customers` `a`) join `tictan_entities` `b`) where ((`c`.`entities_id` = `b`.`id`) and (`c`.`customers_id` = `a`.`id`));

-- --------------------------------------------------------

--
-- Structure de la vue `vtictan_cust_comp_soft`
--
DROP TABLE IF EXISTS `vtictan_cust_comp_soft`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtictan_cust_comp_soft` AS select `a`.`id` AS `id`,`a`.`name` AS `namesoft`,`a`.`is_deleted` AS `is_deleted`,`a`.`supplier` AS `suppliersoft`,`a`.`licence` AS `licencesoft`,`a`.`editor` AS `editorsoft`,`a`.`customers_id` AS `customers_id`,`a`.`entities_id` AS `entities_id`,`a`.`computers_id` AS `computers_id`,`a`.`comment` AS `comment`,`a`.`softmodel_id` AS `softmodel_id`,`a`.`softype_id` AS `softype_id`,`a`.`date_mod` AS `date_mod`,`a`.`start_date` AS `start_date`,`a`.`end_date` AS `end_date`,`a`.`author` AS `author`,`b`.`pcname` AS `pcname`,`f`.`customer_name` AS `customer_name`,`f`.`mobile` AS `mobile_cust`,`f`.`phone` AS `phone_cust`,`f`.`email` AS `email_cust`,`c`.`name` AS `namemodel`,`b`.`is_deleted` AS `is_deleted_model`,`d`.`name` AS `nametype`,`c`.`is_deleted` AS `is_deleted_type`,`e`.`companyname` AS `companynament`,`e`.`mobile` AS `mobile_ent`,`e`.`phone` AS `phone_ent`,`e`.`email` AS `email_ent` from (((((`tictan_customers_software` `a` join `tictan_customer_computers` `b`) join `tictan_softwaremodels` `c`) join `tictan_softwaretypes` `d`) join `tictan_entities` `e`) join `tictan_customers` `f`) where ((`a`.`softmodel_id` = `c`.`id`) and (`a`.`softype_id` = `d`.`id`) and (`a`.`entities_id` = `e`.`id`) and (`a`.`customers_id` = `f`.`id`) and (`a`.`computers_id` = `b`.`id`));

-- --------------------------------------------------------

--
-- Structure de la vue `vtictan_osvp_os`
--
DROP TABLE IF EXISTS `vtictan_osvp_os`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtictan_osvp_os` AS select `a`.`id` AS `osvp_id`,`a`.`os_id` AS `os_id_osvp`,`a`.`name` AS `name_osvp`,`a`.`is_deleted` AS `is_deleted_osvpos`,`b`.`name` AS `name_os` from (`tictan_osvp` `a` join `tictan_os` `b`) where (`a`.`os_id` = `b`.`id`);

-- --------------------------------------------------------

--
-- Structure de la vue `vtictan_skilltech`
--
DROP TABLE IF EXISTS `vtictan_skilltech`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtictan_skilltech` AS select `a`.`id` AS `id`,`a`.`staff_id` AS `staff_id`,`a`.`comment` AS `comment`,`a`.`is_deleted` AS `is_deleted`,`a`.`author` AS `author`,`a`.`mod_date` AS `mod_date`,`b`.`name` AS `name`,`b`.`mobile` AS `mobile`,`b`.`email` AS `email`,`b`.`address` AS `address`,`b`.`postcode` AS `postcode`,`b`.`town` AS `town`,`b`.`state` AS `state`,`b`.`country` AS `country`,`c`.`description` AS `description` from ((`tictan_tecskills` `a` join `tictan_tecstaff` `b`) join `tictan_skills` `c`) where ((`a`.`staff_id` = `b`.`id`) and (`a`.`skill_id` = `c`.`id`));

-- --------------------------------------------------------

--
-- Structure de la vue `vtictan_tecskills`
--
DROP TABLE IF EXISTS `vtictan_tecskills`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtictan_tecskills` AS select `a`.`id` AS `skill_id`,`a`.`staff_id` AS `staff_id`,`a`.`comment` AS `comment`,`a`.`author` AS `author`,`a`.`mod_date` AS `mod_date`,`a`.`is_deleted` AS `is_deleted`,`b`.`description` AS `description_skills`,`c`.`name` AS `name_tech` from ((`tictan_tecskills` `a` join `tictan_skills` `b`) join `tictan_tecstaff` `c`) where ((`a`.`skill_id` = `b`.`id`) and (`a`.`staff_id` = `c`.`id`));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
