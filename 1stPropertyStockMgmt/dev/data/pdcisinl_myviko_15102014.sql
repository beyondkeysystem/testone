-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2014 at 11:13 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pdcisinl_myviko`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_cookies`
--

CREATE TABLE IF NOT EXISTS `ci_cookies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cookie_id` varchar(255) DEFAULT NULL,
  `netid` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `orig_page_requested` varchar(120) DEFAULT NULL,
  `php_session_id` varchar(40) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('9369b9a3508d75aff7e28e8d5cb3651a', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:33.0) Gecko/20100101 Firefox/33.0', 1413359002, ''),
('a392883409e422bdc52b75222adcde99', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:32.0) Gecko/20100101 Firefox/32.0', 1413283253, ''),
('fd08bf46bccd313262e197d9be0aba98', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:33.0) Gecko/20100101 Firefox/33.0', 1413350744, ''),
('1467860c9deee78d555b6e59baa1f1bc', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:32.0) Gecko/20100101 Firefox/32.0', 1413190784, 'a:7:{s:17:"property_location";b:0;s:12:"property_ref";b:0;s:13:"property_type";b:0;s:15:"property_status";b:0;s:17:"property_bedrooms";b:0;s:18:"property_bathrooms";b:0;s:5:"price";b:0;}'),
('824e69ddcdf02f85986c11ad04af2656', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:32.0) Gecko/20100101 Firefox/32.0', 1413201306, ''),
('2d92a2bbb0a1a2bd7a8cab2de4e6a5e1', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:32.0) Gecko/20100101 Firefox/32.0', 1413266495, ''),
('9dc3505c2f0d0d6f3a11aebaa9b19a17', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:32.0) Gecko/20100101 Firefox/32.0', 1412936408, 'a:8:{s:19:"filter_session_data";b:0;s:17:"property_location";s:13:"United States";s:12:"property_ref";s:10:"prop_00001";s:13:"property_type";s:14:"Bungalow House";s:15:"property_status";s:7:"pending";s:17:"property_bedrooms";s:0:"";s:18:"property_bathrooms";s:0:"";s:5:"price";b:0;}');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE IF NOT EXISTS `manufacturers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_addres` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `pass_word` varchar(32) DEFAULT NULL,
  `type` enum('admin','user') NOT NULL DEFAULT 'user',
  `title` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `public` varchar(50) NOT NULL,
  `mobile` int(11) NOT NULL,
  `telephone_contact_times` varchar(50) NOT NULL,
  `mobile_contact_times` varchar(50) NOT NULL,
  `street_house_number` varchar(50) NOT NULL,
  `city_suburb` varchar(50) NOT NULL,
  `i_currently_live_in` varchar(50) NOT NULL,
  `postal_code` varchar(50) NOT NULL,
  `link_to_my_facebook_profile` varchar(50) NOT NULL,
  `language_settings` varchar(50) NOT NULL,
  `date_of_birth` varchar(50) NOT NULL,
  `occupational_status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_addres` (`email_addres`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `first_name`, `last_name`, `email_addres`, `user_name`, `pass_word`, `type`, `title`, `telephone`, `public`, `mobile`, `telephone_contact_times`, `mobile_contact_times`, `street_house_number`, `city_suburb`, `i_currently_live_in`, `postal_code`, `link_to_my_facebook_profile`, `language_settings`, `date_of_birth`, `occupational_status`) VALUES
(1, 'sameer', 'chourasia', 'sameer.chourasia@cisinlabs.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '', '', '', 0, '', '', '0', '', '0', '', '', '', '', ''),
(2, 'test', 'test', 'test5@mailinator.com', 'test', '098f6bcd4621d373cade4e832627b4f6', 'user', 'test', '', '', 0, '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `property_name` varchar(100) NOT NULL,
  `property_location` varchar(100) NOT NULL,
  `property_initial_price` varchar(50) NOT NULL,
  `property_status` varchar(50) NOT NULL,
  `property_current_price` varchar(50) NOT NULL,
  `property_price_last_update` varchar(100) NOT NULL,
  `property_bedrooms` int(11) NOT NULL,
  `property_bathrooms` int(11) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `property_type` varchar(100) NOT NULL,
  `property_deals` varchar(100) NOT NULL,
  `property_ref` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `property_name`, `property_location`, `property_initial_price`, `property_status`, `property_current_price`, `property_price_last_update`, `property_bedrooms`, `property_bathrooms`, `modified`, `property_type`, `property_deals`, `property_ref`) VALUES
(9, 'property1', 'United States', '$30', 'pending', '$40', '$40', 0, 0, '2014-10-07 12:48:41', 'Bungalow House', 'Sale', 'prop_00001'),
(10, 'property2', 'United States', '$20', 'pending', '$30', '$30', 0, 0, '2014-10-10 07:47:48', '', '', ''),
(11, 'property3', 'United States', '$30', 'owned', '$50', '$50', 0, 0, '2014-10-10 07:47:45', '', '', ''),
(12, 'property4', 'United States', '$20', 'selling', '$30', '$30', 0, 0, '0000-00-00 00:00:00', '', '', ''),
(13, 'property5', 'United States', '$20', 'selling', '$30', '$30', 0, 0, '0000-00-00 00:00:00', '', '', ''),
(14, 'property6', 'United Kingdom', '$50', 'selling', '$60', '$60', 0, 0, '0000-00-00 00:00:00', '', '', ''),
(15, 'property9', 'United States', '$30', 'selling', '$50', '$50', 0, 0, '2014-10-10 07:47:53', '', '', ''),
(16, 'property10', 'USA', '$60', 'pending', '$70', '$70', 0, 0, '2014-10-04 12:22:52', 'Cluster Homes', 'Sale', '');

-- --------------------------------------------------------

--
-- Table structure for table `property_deals`
--

CREATE TABLE IF NOT EXISTS `property_deals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `property_deals`
--

INSERT INTO `property_deals` (`id`, `name`) VALUES
(1, 'Sale'),
(2, 'Buy'),
(3, 'Rent');

-- --------------------------------------------------------

--
-- Table structure for table `property_type`
--

CREATE TABLE IF NOT EXISTS `property_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `property_type`
--

INSERT INTO `property_type` (`id`, `type`) VALUES
(1, 'Flat'),
(2, 'Apartment'),
(3, 'Apartment Duplex'),
(4, 'Condominium'),
(5, 'Serviced Apartment'),
(6, 'Serviced Residence'),
(7, 'Penthouse'),
(8, 'Duplex'),
(9, 'Triplex'),
(10, 'Soho'),
(11, '1-sty Terrace/Link House'),
(12, '1.5-sty Terrace/Link House'),
(13, '2-sty Terrace/Link House'),
(14, '2.5-sty Terrace/Link House'),
(15, '3-sty Terrace/Link House'),
(16, '3.5-sty Terrace/Link House'),
(17, '4-sty Terrace/Link House'),
(18, '4-5 sty Terrace/Link House'),
(19, 'Townhouse'),
(20, 'Semi-detached House'),
(21, 'Bungalow House'),
(22, 'Bungalow Land'),
(23, 'Link Bungalow'),
(24, 'Twin Villas'),
(25, 'Twin Courtyard Villa'),
(26, 'Zero-Lot Bungalow'),
(27, 'Residential Land'),
(28, 'Office'),
(29, 'Shop'),
(30, 'Shop-Office'),
(31, 'Sofo'),
(32, 'Soho'),
(33, 'Sovo'),
(34, 'Retail Space'),
(35, 'Retail-Office'),
(36, 'Hotel/Resort'),
(37, 'Business Centre'),
(38, 'Commercial Bungalow'),
(39, 'Designer Suites'),
(40, 'Commercial Semi-D'),
(41, 'Commercial Land'),
(42, 'Factory'),
(43, 'Semi-D factory'),
(44, 'Warehouse'),
(45, 'Detached factory'),
(46, 'Link factory'),
(47, 'Light Industrial'),
(48, 'Industrial Land'),
(49, 'Agricultural Land'),
(50, 'Townhouse Condo'),
(51, 'Cluster Homes');

-- --------------------------------------------------------

--
-- Table structure for table `user_property`
--

CREATE TABLE IF NOT EXISTS `user_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `property_status` int(11) NOT NULL,
  `property_share_in_per` int(11) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
