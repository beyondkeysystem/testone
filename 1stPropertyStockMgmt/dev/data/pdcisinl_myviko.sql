-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 03, 2014 at 12:19 PM
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
('9168fd58e99bcb2b6ac3da727bf9cb63', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:32.0) Gecko/20100101 Firefox/32.0', 1412323481, 'a:7:{s:9:"user_data";s:0:"";s:9:"user_name";s:5:"admin";s:12:"is_logged_in";b:1;s:4:"type";s:5:"admin";s:22:"search_string_selected";N;s:5:"order";N;s:10:"order_type";N;}'),
('c02fac3c84325c347aefa89e929f72e3', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:32.0) Gecko/20100101 Firefox/32.0', 1412080972, ''),
('4d6b9505ce1828d530b00a35c3a2e3df', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:32.0) Gecko/20100101 Firefox/32.0', 1412153206, 'a:7:{s:9:"user_data";s:0:"";s:9:"user_name";s:5:"admin";s:12:"is_logged_in";b:1;s:4:"type";s:5:"admin";s:22:"search_string_selected";N;s:5:"order";N;s:10:"order_type";N;}'),
('2397114876f05673f5741957b73b280f', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:32.0) Gecko/20100101 Firefox/32.0', 1412164868, 'a:7:{s:9:"user_data";s:0:"";s:9:"user_name";s:5:"admin";s:12:"is_logged_in";b:1;s:4:"type";s:5:"admin";s:22:"search_string_selected";N;s:5:"order";N;s:10:"order_type";N;}');

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
  `type` enum('admin','user') NOT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `property_name`, `property_location`, `property_initial_price`, `property_status`, `property_current_price`, `property_price_last_update`, `property_bedrooms`, `property_bathrooms`, `modified`) VALUES
(9, 'property1', 'United States', '$30', 'selling', '$40', '$40', 0, 0, '0000-00-00 00:00:00'),
(10, 'property2', 'United Kingdom', '$20', 'pending', '$30', '$30', 0, 0, '0000-00-00 00:00:00'),
(11, 'property3', 'Ukraine', '$30', 'owned', '$50', '$50', 0, 0, '0000-00-00 00:00:00'),
(12, 'property4', 'United States', '$20', 'selling', '$30', '$30', 0, 0, '0000-00-00 00:00:00'),
(13, 'property5', 'United States', '$20', 'selling', '$30', '$30', 0, 0, '0000-00-00 00:00:00'),
(14, 'property6', 'United Kingdom', '$50', 'selling', '$60', '$60', 0, 0, '0000-00-00 00:00:00'),
(15, 'property9', 'Nath Mandir, Indore, Madhya Pradesh, India', '$30', 'selling', '$50', '$50', 0, 0, '0000-00-00 00:00:00');

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
