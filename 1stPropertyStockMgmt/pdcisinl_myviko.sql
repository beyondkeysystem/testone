-- phpMyAdmin SQL Dump
-- version 4.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2015 at 11:33 AM
-- Server version: 5.5.42-cll
-- PHP Version: 5.4.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `chart_property_price_time`
--

CREATE TABLE IF NOT EXISTS `chart_property_price_time` (
`id` int(11) NOT NULL,
  `property_id` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `chart_property_price_time`
--

INSERT INTO `chart_property_price_time` (`id`, `property_id`, `price`, `date`) VALUES
(1, '1', '11000', '2014-12-31 11:55:18'),
(2, '2', '10000', '2014-12-30 11:55:18'),
(3, '1', '11000', '2014-12-01 11:55:18'),
(4, '1', '11000', '2015-01-02 15:08:36'),
(5, '1', '11000', '2015-01-03 10:51:55'),
(6, '1', '11000', '2015-01-07 15:29:49'),
(7, '3', '10000', '2015-01-12 09:36:01'),
(8, '3', '10000', '2015-01-13 10:47:59'),
(9, '3', '12000', '2015-01-13 10:48:05'),
(10, '2', '10000', '2015-01-19 08:07:42'),
(11, '2', '10000', '2015-01-20 11:16:39'),
(12, '4', '5000', '2015-01-21 06:42:53'),
(13, '4', '5000', '2015-01-21 08:20:51'),
(14, '4', '10000', '2015-01-21 08:21:46'),
(15, '4', '12000', '2015-01-21 08:22:20'),
(16, '4', '10000', '2015-01-21 08:22:36'),
(17, '4', '10000', '2015-01-21 08:24:42'),
(18, '4', '10000', '2015-01-21 08:26:21'),
(19, '5', '1483800', '2015-01-27 08:16:43'),
(20, '6', '4800000', '2015-01-27 08:20:40'),
(21, '6', '4800000', '2015-01-27 14:38:49'),
(22, '6', '4800000', '2015-01-27 14:44:03'),
(23, '6', '4800000', '2015-01-27 14:46:17'),
(24, '6', '4800000', '2015-01-27 14:48:36'),
(25, '6', '4800000', '2015-01-27 14:49:58'),
(26, '6', '4800000', '2015-01-27 14:51:10'),
(27, '6', '4800000', '2015-01-27 14:51:33'),
(28, '7', '630000', '2015-01-02 08:04:40'),
(29, '8', '1500000', '2015-02-04 08:08:17'),
(30, '8', '1500000', '2015-02-04 08:09:35'),
(33, '1', '11000', '2015-02-05 08:54:42'),
(35, '7', '650000', '2015-02-05 09:44:46'),
(40, '9', '368000', '2015-02-06 08:48:10'),
(41, '9', '400000', '2015-02-06 10:20:34'),
(42, '9', '420000', '2015-02-06 10:26:58'),
(43, '1', '12000', '2015-02-06 10:42:44'),
(44, '8', '1600000', '2015-02-06 14:25:24'),
(45, '8', '1500000', '2015-02-06 14:26:38'),
(46, '7', '650050', '2015-02-06 14:27:35'),
(47, '7', '650000', '2015-02-06 14:28:10'),
(48, '7', '650001', '2015-02-06 14:35:38'),
(49, '7', '670000', '2015-02-06 14:37:03'),
(50, '7', '650000', '2015-02-06 14:55:00'),
(51, '7', '670000', '2015-02-06 14:58:40'),
(52, '7', '650000', '2015-02-06 14:59:15'),
(53, '7', '670000', '2015-02-06 15:01:07'),
(54, '7', '650000', '2015-02-06 15:02:15'),
(55, '8', '1700000', '2015-02-06 15:50:36'),
(56, '7', '670000', '2015-02-06 15:51:53'),
(57, '7', '650000', '2015-02-06 15:52:12'),
(58, '9', '430000', '2015-02-07 06:36:48'),
(59, '9', '420000', '2015-02-07 06:37:44'),
(60, '9', '430000', '2015-02-07 06:46:18'),
(61, '9', '420000', '2015-02-07 06:46:46'),
(62, '9', '430000', '2015-02-07 06:47:47'),
(63, '9', '420000', '2015-02-07 06:51:17'),
(64, '9', '430000', '2015-02-07 06:53:20'),
(65, '9', '420000', '2015-02-07 06:55:51'),
(66, '7', '660000', '2015-02-07 06:59:18'),
(67, '7', '650000', '2015-02-07 07:02:46'),
(68, '7', '660000', '2015-02-07 07:20:50'),
(69, '7', '650000', '2015-02-07 07:21:06'),
(70, '7', '660000', '2015-02-07 07:21:54'),
(71, '7', '650000', '2015-02-07 07:25:36'),
(72, '10', '468000', '2015-02-09 08:24:09'),
(73, '11', '220000', '2015-02-10 07:35:22'),
(74, '12', '1200', '2015-02-10 08:38:38'),
(75, '13', '65000', '2015-02-11 05:50:47'),
(76, '14', '5000', '2015-02-11 06:54:34'),
(77, '15', '10000', '2015-02-16 17:47:04'),
(78, '16', '10000', '2015-02-17 08:00:35'),
(79, '17', '4000', '2015-02-26 10:32:22'),
(80, '18', '10000', '2015-03-04 09:16:59'),
(81, '19', '20000', '2015-03-04 09:36:47'),
(82, '20', '500', '2015-03-04 10:19:49'),
(83, '21', '10000', '2015-03-09 08:26:42'),
(84, '22', '20000', '2015-03-09 11:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `ci_cookies`
--

CREATE TABLE IF NOT EXISTS `ci_cookies` (
`id` int(11) NOT NULL,
  `cookie_id` varchar(255) DEFAULT NULL,
  `netid` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `orig_page_requested` varchar(120) DEFAULT NULL,
  `php_session_id` varchar(40) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
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
  `user_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('667e8b4836681a92934888966d9a3a4c', '192.168.2.101', 'Mozilla/5.0 (X11; Linux i686 on x86_64; rv:32.0) Gecko/20100101 Firefox/32.0', 1426061306, 'a:13:{s:9:"user_data";s:0:"";s:28:"notification_pending_deposit";s:1:"8";s:28:"notification_pending_withraw";s:1:"7";s:24:"notification_open_ticket";i:56;s:9:"user_name";s:5:"admin";s:12:"is_logged_in";b:1;s:4:"type";s:5:"admin";s:10:"user_image";s:13:"huanxige1.jpg";s:7:"user_id";s:1:"1";s:20:"search_property_name";N;s:15:"search_location";N;s:11:"search_type";N;s:13:"search_status";N;}'),
('33f60a6541d242704bedc702bb715473', '192.168.2.101', 'Mozilla/5.0 (X11; Linux i686 on x86_64; rv:32.0) Gecko/20100101 Firefox/32.0', 1426061306, 'a:4:{s:9:"user_data";s:0:"";s:28:"notification_pending_deposit";s:1:"8";s:28:"notification_pending_withraw";s:1:"7";s:24:"notification_open_ticket";i:56;}'),
('6ce981a6ded8ef844ed37c576b1babc6', '192.168.0.50', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.76 Safari/537.36', 1426059622, 'a:22:{s:9:"user_data";s:0:"";s:19:"filter_session_data";b:0;s:28:"notification_pending_deposit";s:1:"8";s:28:"notification_pending_withraw";s:1:"7";s:24:"notification_open_ticket";i:56;s:13:"property_name";s:0:"";s:17:"property_location";s:0:"";s:12:"property_ref";b:0;s:13:"property_type";s:10:"Appartment";s:15:"property_status";s:7:"selling";s:17:"property_bedrooms";s:0:"";s:18:"property_bathrooms";s:0:"";s:8:"minprice";s:1:"0";s:8:"maxprice";s:7:"4800000";s:5:"price";b:0;s:9:"user_name";s:5:"chon9";s:12:"is_logged_in";b:1;s:4:"type";s:4:"user";s:4:"role";s:6:"Normal";s:7:"user_id";s:2:"10";s:5:"email";s:19:"alexchon9@gmail.com";s:10:"user_image";s:9:"cisin.jpg";}'),
('7cb8ae2b7625a88b7e17fe89ec913ebb', '192.168.0.50', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.76 Safari/537.36', 1426061089, 'a:13:{s:9:"user_data";s:0:"";s:28:"notification_pending_deposit";s:1:"6";s:28:"notification_pending_withraw";s:1:"7";s:24:"notification_open_ticket";i:56;s:9:"user_name";s:5:"admin";s:12:"is_logged_in";b:1;s:4:"type";s:5:"admin";s:10:"user_image";s:13:"huanxige1.jpg";s:7:"user_id";s:1:"1";s:20:"search_property_name";N;s:15:"search_location";N;s:11:"search_type";N;s:13:"search_status";N;}'),
('41e131810fe37851d6f32ee83975abf3', '192.168.0.50', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.76 Safari/537.36', 1426055344, 'a:4:{s:9:"user_data";s:0:"";s:28:"notification_pending_deposit";s:1:"8";s:28:"notification_pending_withraw";s:1:"7";s:24:"notification_open_ticket";i:56;}'),
('945cd60b4888a81b936ad8012bd89075', '192.168.0.50', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.76 Safari/537.36', 1426059622, 'a:12:{s:9:"user_data";s:0:"";s:28:"notification_pending_deposit";s:1:"8";s:28:"notification_pending_withraw";s:1:"7";s:24:"notification_open_ticket";i:56;s:19:"filter_session_data";b:0;s:9:"user_name";s:5:"chon9";s:12:"is_logged_in";b:1;s:4:"type";s:4:"user";s:4:"role";s:6:"Normal";s:7:"user_id";s:2:"10";s:5:"email";s:19:"alexchon9@gmail.com";s:10:"user_image";s:9:"cisin.jpg";}'),
('b7f3dc2312bbda2e2eabcecc4b3170f2', '192.168.0.50', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.76 Safari/537.36', 1426055449, 'a:4:{s:9:"user_data";s:0:"";s:28:"notification_pending_deposit";s:1:"8";s:28:"notification_pending_withraw";s:1:"7";s:24:"notification_open_ticket";i:56;}'),
('1aa1cb08dc128c4b7084c1ad87ee6b7b', '192.168.0.50', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.76 Safari/537.36', 1426061089, 'a:15:{s:9:"user_data";s:0:"";s:28:"notification_pending_deposit";s:1:"8";s:28:"notification_pending_withraw";s:1:"7";s:24:"notification_open_ticket";i:56;s:9:"user_name";s:5:"admin";s:12:"is_logged_in";b:1;s:4:"type";s:5:"admin";s:4:"role";s:0:"";s:7:"user_id";s:1:"1";s:5:"email";s:15:"admin@admin.com";s:10:"user_image";s:13:"huanxige1.jpg";s:20:"search_property_name";s:14:"DEMO_PROPERTY3";s:15:"search_location";N;s:11:"search_type";N;s:13:"search_status";N;}'),
('f35e57125cf35e9288f215c0151f4f30', '192.168.2.240', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:36.0) Gecko/20100101 Firefox/36.0', 1426055461, 'a:4:{s:9:"user_data";s:0:"";s:28:"notification_pending_deposit";s:1:"8";s:28:"notification_pending_withraw";s:1:"7";s:24:"notification_open_ticket";i:56;}'),
('09d563d911bfab0b460f53cf46b51d3e', '192.168.2.240', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:36.0) Gecko/20100101 Firefox/36.0', 1426066394, 'a:4:{s:9:"user_data";s:0:"";s:28:"notification_pending_deposit";s:1:"6";s:28:"notification_pending_withraw";s:1:"6";s:24:"notification_open_ticket";i:56;}'),
('e9b045da06e96e2ea047240e2722cc77', '192.168.2.240', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:36.0) Gecko/20100101 Firefox/36.0', 1426066378, 'a:4:{s:9:"user_data";s:0:"";s:28:"notification_pending_deposit";s:1:"6";s:28:"notification_pending_withraw";s:1:"6";s:24:"notification_open_ticket";i:56;}'),
('efb730e4ac0a013f803c5d5779387185', '192.168.2.240', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:36.0) Gecko/20100101 Firefox/36.0', 1426066394, 'a:15:{s:9:"user_data";s:0:"";s:28:"notification_pending_deposit";s:1:"6";s:28:"notification_pending_withraw";s:1:"6";s:24:"notification_open_ticket";i:56;s:9:"user_name";s:5:"admin";s:12:"is_logged_in";b:1;s:4:"type";s:5:"admin";s:4:"role";s:4:"Gold";s:7:"user_id";s:1:"1";s:5:"email";s:19:"test@mailinator.com";s:10:"user_image";s:13:"huanxige1.jpg";s:20:"search_property_name";N;s:15:"search_location";N;s:11:"search_type";N;s:13:"search_status";N;}');

-- --------------------------------------------------------

--
-- Table structure for table `credit_price`
--

CREATE TABLE IF NOT EXISTS `credit_price` (
`id` int(11) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `credit_price`
--

INSERT INTO `credit_price` (`id`, `credit`, `price`, `modified_date`) VALUES
(1, '1', '10', '2014-12-31 12:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE IF NOT EXISTS `manufacturers` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
`id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_addres` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `pass_word` varchar(32) DEFAULT NULL,
  `type` enum('admin','user') NOT NULL DEFAULT 'user',
  `title` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
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
  `address` varchar(1000) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(100) NOT NULL,
  `ic_number` int(11) NOT NULL,
  `pay` varchar(50) NOT NULL,
  `total_income` varchar(50) NOT NULL,
  `range` varchar(50) NOT NULL,
  `terms` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `img_path` varchar(100) NOT NULL,
  `last_login` datetime NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_login` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'this is for first time registration by user 0=disable_login, 1=enable_login'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `first_name`, `last_name`, `email_addres`, `user_name`, `pass_word`, `type`, `title`, `telephone`, `mobile`, `telephone_contact_times`, `mobile_contact_times`, `street_house_number`, `city_suburb`, `i_currently_live_in`, `postal_code`, `link_to_my_facebook_profile`, `language_settings`, `date_of_birth`, `occupational_status`, `address`, `state`, `country`, `ic_number`, `pay`, `total_income`, `range`, `terms`, `role`, `img_path`, `last_login`, `is_active`, `is_login`) VALUES
(1, 'Alex', 'Chong', 'admin@admin.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'admin', '0166379722', 0, '', '', '', 'Kuala Lumpur', '', '52200', '', '', '', 'Hero', 'AKjeo902', 'Kuala Lumpur', 'Malaysia', 0, '', '', '', '', '', 'huanxige1.jpg', '2015-03-11 06:31:04', 1, 1),
(2, 'jone', 'jone', 'jone@jone.com', 'jone', '15c70ebb880b7cfdae8885cee11ce3ef', 'user', '', '1236547890', 0, '', '', '', 'jone', '', '123456', '', '', '', 'dfdsfsdf', 'jone', 'sdff', 'jone', 553213546, '', '200', '50000', 'check', 'normal', '', '2015-03-11 09:33:04', 1, 1),
(3, 'Tester', 'test', 'test@mailinator.com', 'test', '098f6bcd4621d373cade4e832627b4f6', 'user', '', '11231231231', 0, '', '', '', 'test', '', '452001', '', '', '', 'testing', 'test', 'test', 'Malaysia', 123123, '', '', '', 'check', 'Gold', '', '2015-03-11 09:33:27', 1, 1),
(4, 'prasun', 'prasun', 'mike@mailinator.com', 'prasun', '369ba4ff3db2ffffc409cbcda61c8c1d', 'user', '', '1-(123)-123-1234', 0, '', '', '', 'sdgg', '', '12423', '', '', '', 'sdgsdg', 'egfeg', 'sdgsdg', 'sdgsg', 12345467, '', '123', '456', 'check', 'Normal', '', '2015-02-25 04:54:33', 1, 1),
(5, 'hhhhhh', 'hhhhh', 'prasun.b@cisinlabs.com', 'prasun123', '101a241d1d8a319c2e2785b53a405182', 'user', '', '9977167709', 0, '', '', '', 'iug', '', '12423', '', '', '', 'uio', 'hkl;', 'guio', 'uyio', 12345467, '', '1234', '5678', 'check', 'Normal', '', '0000-00-00 00:00:00', 1, 1),
(6, 'cis', 'cis', 'test2@mailinator.com', 'cisin', '442f611ff5e8883868b9f55c6b90a6f6', 'user', '', '1232112321', 0, '', '', '', '1212', '', '12312321', '', '', '', '123', '12312', '123', '123', 1212121, '', '', '', 'check', 'Platinum', '', '0000-00-00 00:00:00', 1, 1),
(7, 'Roger', 'Test', 'test3@mailinator.com', 'roger', 'b911af807c2df88d671bd7004c54c1c2', 'user', '', '0987654321', 0, '', '', '', 'Test', '', '456321', '', '', '', 'Testing', 'Test Area, Testing', 'Test', 'Malaysia', 987654321, '', '', '', 'check', 'Gold', '', '2015-01-20 16:32:36', 1, 1),
(8, 'Joman', 'James', 'joma@mailinator.com', 'joman', '6efff37f5fe854be30e5204bb4a2993f', 'user', '', '6453215640', 0, '', '', '', 'xzcvb', '', '93242', '', '', '', 'test', 'asd qwerty', 'poiu', 'Malaysia', 4312312, '', '', '', 'check', 'Normal', '4646439_90x90.png', '2015-01-27 15:03:47', 1, 1),
(9, 'Shawn', 'Rodrick', 'shawn@mailinator.com', 'shawn', 'a3cceba83235dc95f750108d22c14731', 'user', '', '9812912811', 0, '', '', '', 'kjas', '', '81289', '', '', '', 'test', 'uweu', 'ksfdh', 'kjasdas', 912839821, '', '', '', 'check', 'Normal', '', '2015-01-13 12:17:44', 1, 1),
(10, 'asas', 'asaas', 'alexchon9@gmail.com', 'chon9', 'e10adc3949ba59abbe56e057f20f883e', 'user', '', '0166379722', 0, '', '', '', 'Kuala Lumpur', '', '52200', '', '', '', 'Hero', 'AKjeo902', 'Kuala Lumpur', 'Malaysia', 2147483647, '', '1000', '5000', 'check', 'Normal', 'cisin.jpg', '2015-03-11 08:11:25', 1, 1),
(11, 'Test', 'Roger', 'test1@mailinator.com', 'test1', '5a105e8b9d40e1329780d62ea2265d8a', 'user', '', '1232131231', 0, '', '', '', 'Test', '', '432342', '', '', '', 'Testing', 'test', 'Test', 'test', 123123, '', '', '', 'check', 'Gold', '', '2015-01-17 09:03:32', 1, 1),
(12, 'Test', 'Roger', 'test12@mailinator.com', 'test2', 'ad0234829205b9033196ba818f7a872b', 'user', '', '1232131231', 0, '', '', '', 'Test', '', '432342', '', '', '', 'Testing', 'test', 'Test', 'test', 123123, '', '', '', 'check', 'Normal', '', '0000-00-00 00:00:00', 1, 0),
(13, 'Test', 'three', 'test13@mailinator.com', 'test3', '8ad8757baa8564dc136c1e07507f4a98', 'user', '', '1232131231', 0, '', '', '', 'Test', '', '432342', '', '', '', 'Testing', 'test', 'Test', 'test', 123123, '', '', '', 'check', 'Platinum', '', '0000-00-00 00:00:00', 1, 0),
(14, 'Test', 'four', 'test4@mailinator.com', 'test4', '86985e105f79b95d6bc918fb45ec7727', 'user', '', '1232131231', 0, '', '', '', 'Test', '', '432342', '', '', '', 'Testing', 'test', 'Test', 'test', 123123, '', '', '', 'check', 'Platinum', '', '0000-00-00 00:00:00', 1, 0),
(15, 'Test', 'Five', 'test5@mailinator.com', 'test5', 'e3d704f3542b44a621ebed70dc0efe13', 'user', '', '1234567890', 0, '', '', '', 'Test', '', '55555', '', '', '', 'Testing', 'test five', 'toster1', 'Malaysia', 1231231231, '', '', '', 'check', 'Gold', '', '0000-00-00 00:00:00', 1, 0),
(16, 'Kelvin', 'Chan', 'kelvin_cr7@hotmail.com', 'kelvincr7', 'e10adc3949ba59abbe56e057f20f883e', 'user', '', '0123456789', 0, '', '', '', 'KL', '', '52200', '', '', '', 'student', '3, jalan 3/3, taman bunga', 'WP Kuala Lumpur', 'Malaysia', 2147483647, '', '1000', '10000', 'check', 'Normal', '', '2015-03-09 08:33:44', 1, 1),
(17, 'kelvin', 'chan', 'kelvincr7@hotmail.com', 'kelvin_cr7', 'e10adc3949ba59abbe56e057f20f883e', 'user', '', '0123456789', 0, '', '', '', 'KL', '', '52200', '', '', '', 'manager', '3, jalan 3/3, taman bunga', 'WP Kuala Lumpur', 'Malaysia', 2147483647, '', '1000', '10000', 'check', 'Gold', '', '2015-03-09 10:40:28', 1, 1),
(18, 'test', 'test', 'sam@mailinator.com', 'sam', '332532dcfaa1cbf61e2a266bd723612c', 'user', '', '1234567890', 0, '', '', '', 'indore', '', '123123', '', '', '', 'test', '''[removed]alert&#40;abc&#41;;[removed]', 'Madhya Pradesh', 'India', 123123, '', '', '', 'check', 'Normal', '', '2015-02-11 07:53:22', 1, 1),
(19, 'Peter', 'Choo', 'peterchoo@hotmail.com', 'peterchoo', 'e10adc3949ba59abbe56e057f20f883e', 'user', '', '0123456789', 0, '', '', '', 'KL', '', '52200', '', '', '', 'Boss', '3, jalan 3/3, taman bunga', 'Kuala Lumpur', 'Malaysia', 2147483647, '', '', '', 'check', 'Normal', '', '2015-02-11 08:54:57', 1, 1),
(20, 'Alex', 'Chong', 'alexchon9@facebook.com', 'chon911', '8f036369a5cd26454949e594fb9e0a2d', 'user', '', '0123454545', 0, '', '', '', 'KL', '', '42999', '', '', '', 'Old Man', 'A3939 HEKs SJiej', 'WP', 'Malaysia', 2147483647, '', '1000', '30000', 'check', 'Platinum', '', '2015-03-04 09:50:59', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(11) NOT NULL,
  `auther_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `auther_id`, `title`, `body`, `created`, `modified`) VALUES
(1, 1, 'This is test12', '<p><img alt="" src="http://myviko.pd.cisinlive.com/assets/front/images/girl.png" style="height:174px; width:167px" /></p>\n\n<p>This my first News</p>\n', '2014-12-31 12:45:06', '2014-12-31 12:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `o_payments`
--

CREATE TABLE IF NOT EXISTS `o_payments` (
`id` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `txn_type` varchar(50) NOT NULL,
  `cc` int(11) NOT NULL COMMENT '1=credit card, 0=normal paypal',
  `transaction_status` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `ref_no` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `cheque_no` varchar(255) NOT NULL,
  `payee_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `o_payments`
--

INSERT INTO `o_payments` (`id`, `credit`, `transaction_id`, `txn_type`, `cc`, `transaction_status`, `amount`, `user_id`, `datetime`, `ref_no`, `location`, `bank_name`, `account_no`, `cheque_no`, `payee_name`, `address`, `created`) VALUES
(1, 0, '87441758HV883642V', 'instant', 0, 'Completed', 50000, 2, '2014-12-31 18:12:00', 'PM000001', 'Malaysia', '', '', '', 'test', 'qwe', '2014-12-31 12:44:31'),
(2, 0, '', 'Bank', 0, 'Completed', 120, 2, '2014-12-31 18:23:00', 'PM000002', 'Test Location', 'HDFC', '12544585', '', 'Jone', 'test street, city , 400214', '2014-12-31 13:10:43'),
(3, 0, '33354188RJ881705C', 'Gold', 0, 'Completed', 0, 3, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '0000-00-00 00:00:00'),
(4, 0, '9RN86900CH615280T', 'instant', 0, 'Completed', 50000, 3, '2014-12-31 20:02:00', 'PM000003', 'test', '', '', '', 'test', 'test', '2014-12-31 14:40:12'),
(5, 0, '8Y496431EG381791W', 'instant', 0, 'Completed', 120, 2, '2015-01-02 12:12:00', 'PM000004', 'Newyark', '', '', '', 'Jone', 'Street 201', '2015-01-02 07:05:57'),
(6, 0, '', 'Bank', 0, 'Completed', 200, 2, '2015-01-02 12:38:00', 'PM000005', 'Newyark', 'HDFC', '12544585', '', 'Jone', 'Street 201', '2015-01-02 07:09:23'),
(7, 0, '6TN56853LN310164X', 'Platinum', 0, 'Completed', 0, 6, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '0000-00-00 00:00:00'),
(8, 0, '2JR057671W300912E', 'Gold', 0, 'Completed', 0, 7, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '0000-00-00 00:00:00'),
(9, 0, '', 'Bank', 0, 'Completed', 5000, 7, '2015-01-12 17:58:00', 'PM000006', 'Test', 'Test', '6543217890', '', 'Roger', 'Roger Test, Testing', '2015-01-12 12:47:56'),
(10, 0, '', 'Gold_bank', 0, 'Completed', 0, 11, '2015-01-17 13:37:00', '', 'Malaysia', 'Maybank', '87263487873264', '', 'Test', 'test', '2015-01-17 08:30:17'),
(11, 0, '', 'Normal', 0, 'Pending', 0, 12, '0000-00-00 00:00:00', '', '', '', '', '', 'Test', 'test', '2015-01-17 08:31:42'),
(12, 0, '', 'Platinum_bank', 0, 'Pending', 0, 13, '2015-01-17 14:02:00', '', 'Malaysia', 'Maybank', '123123213', '', 'Test', 'test', '2015-01-17 08:32:48'),
(13, 0, '1FF48444P9008911M', 'Platinum', 0, 'Completed', 0, 14, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '0000-00-00 00:00:00'),
(14, 0, '4J742546W0475353A', 'Gold', 0, 'Completed', 0, 15, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '0000-00-00 00:00:00'),
(15, 0, '', 'Cheque', 0, 'Pending', 10000, 10, '2015-01-19 15:48:00', 'PM000007', 'sdsd', 'MAYBANK', '', '29283839938', 'HELLO WORLD', '949349483 DESDS', '2015-01-19 07:48:47'),
(16, 0, '', 'Normal', 0, 'Completed', 0, 16, '0000-00-00 00:00:00', '', '', '', '', '', 'Kelvin', '3, jalan 3/3, taman bunga', '2015-01-19 07:49:18'),
(17, 0, '', 'Bank', 0, 'Completed', 5000, 16, '2015-01-19 00:30:00', 'PM000008', 'Taman tun', 'cimb', '123123', '', 'CKM', '2,jalan 123, taman 456', '2015-01-19 07:52:20'),
(18, 0, '', 'Gold_bank', 0, 'Completed', 0, 17, '2015-01-19 16:20:00', '', 'setapak', 'cimb', '123123123', '', 'root', '3, jalan 3/3, taman bunga', '2015-01-19 08:23:02'),
(19, 0, '', 'Cheque', 0, 'Completed', 10000, 17, '2015-01-19 02:00:00', 'PM000009', '123', 'hhb', '', '123123', 'asd', '123', '2015-01-19 08:24:03'),
(20, 0, '', 'Bank', 0, 'Pending', 1, 7, '2015-01-20 22:03:00', 'PM000010', 'Malaysia', 'test bank', '123123213', '', 'test', 'asd', '2015-01-20 16:33:56'),
(21, 0, '', 'Bank', 0, 'Completed', 10000, 10, '2015-01-21 01:30:00', 'PM000011', 'slsksjksd', 'CIMB', '02002383883', '', 'Alex C', 'sodsdksdkjsjkd', '2015-01-21 06:24:02'),
(22, 0, '', 'Cheque', 0, 'Pending', 10, 2, '2015-01-21 19:44:00', 'PM000012', 'as', 'as', '', '12', 'as', 'as', '2015-01-21 14:16:55'),
(23, 0, '', 'Bank', 0, 'Completed', 20000, 10, '2015-01-09 01:00:00', 'PM000013', 'Kenanga CIMB', 'CIMB', '293947474', '', 'LOW ALLEN', 'ioewiueuwe', '2015-01-27 08:36:58'),
(24, 0, '', 'Bank', 0, 'Cancelled', 20000, 10, '2015-01-09 01:00:00', 'PM000014', 'Kenanga CIMB', 'CIMB', '293947474', '', 'LOW ALLEN', 'ioewiueuwe', '2015-01-27 08:48:00'),
(25, 0, '', 'Bank', 0, 'Completed', 1000000, 17, '2015-02-05 00:30:00', 'PM000015', 'Somewhere', 'CIMB', '0000000000', '', 'KELVIN CHAN', '1, test, test, 52000, test', '2015-02-05 11:29:39'),
(26, 0, '', 'Bank', 0, 'Completed', 1000000, 17, '2015-02-05 00:30:00', 'PM000016', 'KL', 'CIMB', '0000000000', '', 'KELVIN CHAN', '1, test, test, 52000, test', '2015-02-05 11:39:31'),
(27, 0, '', 'Bank', 0, 'Completed', 100000, 10, '2015-02-19 01:30:00', 'PM000017', '12', 'CIMB', '232323232', '', 'Add', 'Addd', '2015-02-06 10:13:29'),
(28, 0, '', 'Bank', 0, 'Completed', 50000, 2, '2015-02-07 12:14:00', 'PM000018', 'asd', 'asd', '12312321321', '', 'sada', 'asdasd', '2015-02-07 06:45:09'),
(29, 0, '', 'Bank', 0, 'Pending', 1250, 3, '2015-02-11 12:05:00', 'PM000019', 'qwe', 'test', '123123123', '', 'qewq', 'qwe', '2015-02-11 06:36:20'),
(30, 0, '', 'Bank', 0, 'Completed', 50000, 3, '2015-02-11 12:06:00', 'PM000020', 'qwe', 'qwe', '123', '', 'qwe', 'qwe', '2015-02-11 06:37:09'),
(31, 0, '', 'Normal', 0, 'Completed', 0, 18, '0000-00-00 00:00:00', '', '', '', '', '', 'test', '''[removed]alert&#40;abc&#41;;[removed]', '2015-02-11 07:50:50'),
(32, 0, '', 'Bank', 0, 'Completed', 28500, 10, '2015-02-05 16:08:00', 'PM000021', 'asasasasas', 'asa', '1212121', '', 'asasa', 'asasasasa', '2015-02-11 08:08:24'),
(33, 0, '', 'Normal', 0, 'Completed', 0, 19, '0000-00-00 00:00:00', '', '', '', '', '', 'Peter', '3, jalan 3/3, taman bunga', '2015-02-11 08:50:49'),
(34, 0, '', 'Bank', 0, 'Completed', 12, 10, '2015-02-06 01:30:00', 'PM000022', '[removed]alert&#40;[removed](&#41;);[removed]', '[removed]alert&#40;[removed](&#41;);[removed]s', '1212121', '', 'asasas', '[removed]alert&#40;[removed](&#41;);[removed]sasas', '2015-02-17 11:29:04'),
(35, 0, '', 'Platinum_bank', 0, 'Completed', 0, 20, '2015-03-04 17:15:00', '', 'KLL', 'CIMB', '232323', '', 'Alex', 'A3939 HEKs SJiej', '2015-03-04 09:17:39'),
(36, 0, '', 'Bank', 0, 'Completed', 10000, 20, '2015-04-09 01:30:00', 'PM000023', 'KLL', 'CIMB', '02030399393948', '', 'Chong', 'ALdkd339238293823', '2015-03-04 09:19:43'),
(37, 0, '', 'Bank', 0, 'Completed', 10000, 17, '2015-03-04 00:30:00', 'PM000024', 'kljasd', '123', '123', '', '123', '123', '2015-03-04 09:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `profit_loss_fund_log`
--

CREATE TABLE IF NOT EXISTS `profit_loss_fund_log` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fund_type` varchar(25) NOT NULL COMMENT 'Profit, Loss',
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `detail` text NOT NULL,
  `user_fund_log_id` int(11) DEFAULT NULL,
  `debit` float(15,2) NOT NULL,
  `credit` float(15,2) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `profit_loss_fund_log`
--

INSERT INTO `profit_loss_fund_log` (`id`, `user_id`, `fund_type`, `date`, `detail`, `user_fund_log_id`, `debit`, `credit`, `modified_date`) VALUES
(1, 3, 'Profit', '2015-01-02 10:32:14', 'Approved By Cash', 30, 25.00, 0.00, '2015-01-02 16:02:14'),
(2, 7, 'Profit', '2015-01-13 06:57:28', 'System Auto Generated', 46, 31.00, 0.00, '2015-01-13 12:27:28'),
(3, 8, 'Profit', '2015-01-13 06:57:28', 'System Auto Generated', 48, 46.50, 0.00, '2015-01-13 12:27:28'),
(4, 16, 'Profit', '2015-01-19 02:55:52', 'System Auto Generated', 62, 0.00, 0.00, '2015-01-19 08:25:53'),
(5, 17, 'Profit', '2015-02-06 04:51:15', 'System Auto Generated', 107, 0.00, 0.00, '2015-02-06 10:21:15'),
(6, 17, 'Profit', '2015-02-06 05:05:37', 'System Auto Generated', 110, 0.00, 0.00, '2015-02-06 10:35:37'),
(7, 17, 'Profit', '2015-02-06 05:11:36', 'System Auto Generated', 113, 0.00, 0.00, '2015-02-06 10:41:36'),
(8, 2, 'Profit', '2015-02-06 06:24:10', 'System Auto Generated', 116, 5.00, 0.00, '2015-02-06 11:54:10'),
(9, 10, 'Profit', '2015-02-07 01:07:24', 'System Auto Generated', 127, 0.00, 0.00, '2015-02-07 06:37:24'),
(10, 10, 'Profit', '2015-02-07 01:09:14', 'System Auto Generated', 130, 0.00, 0.00, '2015-02-07 06:39:14'),
(11, 17, 'Profit', '2015-02-09 02:43:44', 'System Auto Generated', 140, 0.00, 0.00, '2015-02-09 08:13:44'),
(12, 17, 'Profit', '2015-02-09 02:46:00', 'System Auto Generated', 143, 0.00, 0.00, '2015-02-09 08:16:00'),
(13, 17, 'Profit', '2015-02-09 03:01:23', 'System Auto Generated', 150, 0.00, 0.00, '2015-02-09 08:31:23'),
(14, 10, 'Profit', '2015-02-09 03:10:04', 'System Auto Generated', 153, 0.00, 0.00, '2015-02-09 08:40:04'),
(15, 17, 'Profit', '2015-02-09 03:10:26', 'System Auto Generated', 156, 0.00, 0.00, '2015-02-09 08:40:26'),
(16, 17, 'Profit', '2015-02-09 07:40:46', 'System Auto Generated', 164, 0.00, 0.00, '2015-02-09 13:10:46'),
(17, 10, 'Profit', '2015-02-09 07:40:46', 'System Auto Generated', 166, 0.00, 0.00, '2015-02-09 13:10:46'),
(18, 2, 'Profit', '2015-02-10 03:25:38', 'System Auto Generated', 183, 0.50, 0.00, '2015-02-10 08:55:38'),
(19, 2, 'Profit', '2015-02-11 01:24:47', 'System Auto Generated', 193, 0.00, 0.00, '2015-02-11 06:54:47'),
(20, 10, 'Profit', '2015-02-16 12:29:47', 'System Auto Generated', 207, 0.00, 0.00, '2015-02-16 17:59:47'),
(21, 2, 'Profit', '2015-02-17 07:47:36', 'System Auto Generated', 213, 0.00, 0.00, '2015-02-17 13:17:36'),
(22, 2, 'Profit', '2015-02-17 08:37:37', 'System Auto Generated', 217, 0.00, 0.00, '2015-02-17 14:07:37'),
(23, 2, 'Profit', '2015-02-17 08:37:43', 'System Auto Generated', 220, 0.00, 0.00, '2015-02-17 14:07:43'),
(24, 2, 'Profit', '2015-02-17 08:38:09', 'System Auto Generated', 223, 0.00, 0.00, '2015-02-17 14:08:09'),
(25, 2, 'Profit', '2015-02-17 08:53:26', 'System Auto Generated', 226, 0.00, 0.00, '2015-02-17 14:23:26'),
(26, 2, 'Profit', '2015-02-17 08:54:24', 'System Auto Generated', 229, 0.00, 0.00, '2015-02-17 14:24:24'),
(27, 2, 'Profit', '2015-02-17 08:55:59', 'System Auto Generated', 232, 0.00, 0.00, '2015-02-17 14:25:59'),
(28, 2, 'Profit', '2015-02-17 08:59:04', 'System Auto Generated', 235, 0.00, 0.00, '2015-02-17 14:29:04'),
(29, 2, 'Profit', '2015-02-26 01:40:30', 'System Auto Generated', 238, 0.00, 0.00, '2015-02-26 07:10:30'),
(30, 3, 'Profit', '2015-03-04 04:04:23', 'System Auto Generated', 246, 0.00, 0.00, '2015-03-04 09:34:23'),
(31, 3, 'Profit', '2015-03-04 05:09:39', 'System Auto Generated', 253, 0.00, 0.00, '2015-03-04 10:39:39'),
(32, 3, 'Profit', '2015-03-04 05:22:46', 'System Auto Generated', 256, 0.00, 0.00, '2015-03-04 10:52:46'),
(33, 16, 'Profit', '2015-03-09 05:21:27', 'System Auto Generated', 261, 0.00, 0.00, '2015-03-09 10:51:27'),
(34, 17, 'Profit', '2015-03-09 05:22:58', 'System Auto Generated', 264, 0.00, 0.00, '2015-03-09 10:52:58'),
(35, 17, 'Profit', '2015-03-09 05:23:14', 'System Auto Generated', 267, 0.00, 0.00, '2015-03-09 10:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
`id` int(11) unsigned NOT NULL,
  `property_name` varchar(100) NOT NULL,
  `property_location` varchar(100) NOT NULL,
  `property_initial_price` int(110) NOT NULL,
  `property_status` varchar(50) NOT NULL,
  `property_current_price` int(11) NOT NULL,
  `property_price_last_update` int(11) NOT NULL,
  `property_bedrooms` int(11) NOT NULL,
  `property_bathrooms` int(11) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `property_type` varchar(100) NOT NULL,
  `property_deals` varchar(100) NOT NULL,
  `property_ref` varchar(25) NOT NULL,
  `built_up` varchar(100) NOT NULL,
  `tenure` varchar(255) NOT NULL,
  `land_area` varchar(255) NOT NULL,
  `total_units_lots` varchar(100) NOT NULL,
  `property_image` varchar(100) DEFAULT NULL,
  `property_image2` varchar(100) DEFAULT NULL,
  `property_image3` varchar(100) DEFAULT NULL,
  `property_image4` varchar(100) DEFAULT NULL,
  `property_image5` varchar(100) DEFAULT NULL,
  `property_description` longtext NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `property_slider_image` varchar(100) DEFAULT NULL,
  `min_owned_limit` float NOT NULL,
  `min_owned_limit_datetime` datetime NOT NULL,
  `min_property_share_limit` float NOT NULL DEFAULT '0.1',
  `property_enable_disable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=disable, 1=Enable, 2=Blocked, 3=BlockedFinally',
  `banner` smallint(1) NOT NULL DEFAULT '0' COMMENT '1=Enable, 0=disable'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `property_name`, `property_location`, `property_initial_price`, `property_status`, `property_current_price`, `property_price_last_update`, `property_bedrooms`, `property_bathrooms`, `modified`, `property_type`, `property_deals`, `property_ref`, `built_up`, `tenure`, `land_area`, `total_units_lots`, `property_image`, `property_image2`, `property_image3`, `property_image4`, `property_image5`, `property_description`, `created`, `property_slider_image`, `min_owned_limit`, `min_owned_limit_datetime`, `min_property_share_limit`, `property_enable_disable`, `banner`) VALUES
(1, 'Property1', 'Malaysia', 10000, 'owned', 12000, 12000, 1, 1, '2015-03-11 06:29:24', 'Bunglow', '', 'VH00001', '', '', '', '', '4_bedroom_semi_detached_house_for_sale_home_for_sale_for_sale_westhoughton_978824321625209408.jpg', '', '', '', '', '<p>Facilities</p>\n\n<ol>\n	<li>House</li>\n	<li>Appt</li>\n	<li>Club</li>\n</ol>\n\n<p>&nbsp;</p>\n', '2014-12-29 18:30:00', 'slide1151.jpg', 30, '2015-02-09 11:34:11', 0.1, 2, 1),
(2, 'Property2', 'Malaysia', 9000, 'selling', 10000, 10000, 1, 1, '2015-01-28 07:44:29', 'Duplex', '', 'VH00001', '', '', '', '', '4_bedroom_semi_detached_house_for_sale_home_for_sale_for_sale_westhoughton_978824321625209408.jpg', '', '', '', '', '', '2014-12-01 18:30:00', 'slide1151.jpg', 1, '2015-01-19 08:16:25', 0.1, 3, 0),
(3, 'Sandy''s House', 'Malaysia', 10000, 'owned', 12000, 12000, 3, 3, '2015-01-28 07:44:29', 'Duplex', '', 'VH00003', '', '', '', '', '4_bedroom_semi_detached_house_for_sale_home_for_sale_for_sale_westhoughton_9788243216252094043.jpg', '', '', '', '', '', '2015-01-11 18:30:00', 'slide1213.jpg', 40, '2014-12-13 01:22:18', 0.1, 3, 0),
(4, 'AManja', 'Kepong', 5000, 'owned', 10000, 10000, 3, 2, '2015-01-23 07:16:54', 'Duplex', '', 'VH00004', '', '', '', '', '', '', '', '', '', '', '2015-01-21 01:12:53', '', 30, '2014-12-02 08:21:20', 0.1, 3, 0),
(5, 'M Residence Canal Link', 'Rawang, Selangor', 1483800, 'selling', 1483800, 1483800, 6, 6, '2015-01-28 07:49:38', 'Bunglow', '', 'VH00005', '', '', '', '', 'img1.jpg', 'img2.jpg', NULL, NULL, NULL, '', '2015-01-27 02:46:43', 'banner.jpg', 70, '0000-00-00 00:00:00', 0.1, 1, 1),
(6, 'The Mansions Desa ParkCity', 'Desa Park City, Kuala Lumpur', 4800000, 'selling', 4800000, 4800000, 7, 7, '2015-01-28 07:43:46', 'Row House', '', 'VH00006', '', '', '', '', 'themansion.jpg', 'themansion2.jpg', '', '', '', '<h1>The Mansions Desa ParkCity</h1>\n\n<hr />\n<p><img alt="" src="http://myviko.pd.cisinlive.com/uploads/themansion2.jpg" style="border-style:solid; border-width:2px; float:left; height:210px; margin:5px; width:247px" /></p>\n\n<p>Venenatis volutpat dignissim maecenas ad. Adipiscing egestas. Magnis venenatis pede imperdiet nonummy. Nascetur laoreet risus potenti penatibus arcu natoque ornare. Praesent ullamcorper metus sodales massa auctor at, dis convallis. Nonummy gravida facilisi. Feugiat augue quam porta penatibus nisl lacus sem Sociosqu placerat ipsum nam. In potenti dis tellus, pharetra quisque ornare lectus cum erat nulla lectus dapibus convallis rutrum elementum litora dis vel faucibus. A leo iaculis. Condimentum vitae a. Rhoncus. Phasellus pede cursus porttitor, arcu metus bibendum semper arcu facilisis purus ac integer pellentesque mauris senectus varius montes nonummy.</p>\n\n<p>Lacinia. Sagittis egestas conubia sed eleifend semper fusce habitasse ligula per accumsan. Torquent lacus cubilia curabitur aptent vivamus ut quisque Sociis mauris, varius lobortis interdum sapien Fermentum odio dapibus aliquet metus tempor turpis class ridiculus gravida ante Donec. Lobortis ad mus phasellus nonummy vestibulum Ac posuere accumsan ante Diam ac sem dictumst convallis. Conubia a amet cum. Libero viverra scelerisque hac.</p>\n\n<p>Rutrum. Turpis netus imperdiet vel penatibus nostra felis Maecenas euismod augue nostra metus, mi tellus felis. Fermentum egestas mollis ultricies pellentesque sociosqu volutpat iaculis Nulla Venenatis libero aenean, elit arcu tempor nec. Curae; blandit hendrerit parturient porttitor aenean a quam integer pharetra sodales hymenaeos sagittis eleifend semper dui ut.</p>\n', '2015-01-27 02:50:40', 'themansionbanner.jpg', 50, '0000-00-00 00:00:00', 0.1, 1, 1),
(7, 'Boulevard Residence, Kayu Ara', 'Jalan Kenanga, Kg Sungai Kayu Ara, Petaling Jaya, 47400, Selangor', 630000, 'selling', 650000, 650000, 3, 2, '2015-02-09 12:43:42', 'Appartment', '', 'VH00007', '850', 'Freehold', '50'' X 60''', '', 'img4.jpg', 'img5.jpg', 'img6.jpg', 'img7.jpg', 'img8.jpg', '<h3>Facilities</h3>\n\n<ol>\n	<li>Barbecue Area</li>\n	<li>Club House</li>\n	<li>Covered Parking</li>\n	<li>Gymnasium</li>\n	<li>Jacuzzi</li>\n	<li>Jogging Track</li>\n	<li>Playground</li>\n	<li>Swimming Pool</li>\n	<li>Wading Pool</li>\n	<li>&nbsp;24hr Security</li>\n</ol>\n\n<h3>Property Details</h3>\n\n<p>Brand New Boulevard Residences For Sale!!!<br />\nUndermarket value unit up for grab! RM 630k!<br />\n<br />\n**Condo Specialist with most competitive price unit on hand**<br />\n<br />\n**Kindly call me before committing any deal.**<br />\n<br />\n- Built-up Size: 850 sq. ft&nbsp;<br />\n- Layout: 3 Bedrooms + 2 Bathrooms&nbsp;<br />\n- Furnished Type: Semi Furnished&nbsp;<br />\n- Car Park Provided: 2&nbsp;<br />\n- Level: Low/Middle/High floor&nbsp;<br />\n- Asking Price: RM630k<br />\n<br />\n*** Many units available for sale and rent ***<br />\n*** Easy to access LDP, NKVE and Sprint Highway ***&nbsp;<br />\n*** Owners are welcome to list ***</p>\n', '2015-02-04 02:34:39', 'img3.jpg', 70, '0000-00-00 00:00:00', 0.1, 1, 1),
(8, '2-sty Terrace Sunway SPK', 'Sunway SPK, Kepong', 1500000, 'selling', 1700000, 1700000, 5, 3, '2015-03-09 11:38:58', 'Row House', '', 'VH00008', '', '', '', '', 'spk1.jpg', 'spk2.jpg', 'spk3.jpg', '', '', '<p><strong>Tenure:&nbsp;</strong>Freehold<br />\n<strong>Land Area:&nbsp;</strong>22x75 sq. ft.<br />\n<br />\n**Renovated unit<br />\n**Move in condition<br />\n**Tip-top and well kept condition</p>\n\n<p>&nbsp;</p>\n', '2015-02-04 02:38:17', 'spk4.jpg', 50, '0000-00-00 00:00:00', 0.1, 1, 1),
(9, 'Savanna Executive Suites', 'Southville City @ KL South, Bangi, Selangor', 368000, 'owned', 420000, 420000, 3, 2, '2015-03-11 08:10:50', 'Appartment', '', 'VH00009', '956', 'Freehold', '25'' x 50''', '', 'img81.jpg', 'img41.jpg', 'img51.jpg', 'img61.jpg', 'img22.jpg', '<h3>Facilities</h3>\n\n<hr />\n<div style="background:transparent; border:0px; padding:0px">\n<div style="background:transparent; border:0px; padding:0px">\n<div style="background:transparent; border:0px; padding:0px">&nbsp;</div>\n\n<p>1) Swimming pool</p>\n\n<p>2) Children&rsquo;s wading pool</p>\n\n<p>3) Jacuzzi</p>\n\n<p>4) Aqua gym</p>\n\n<p>5) Sun deck</p>\n\n<p>6)&nbsp;Water play area</p>\n\n<p>7) Maze garden</p>\n\n<p>8) Reflexology park</p>\n\n<p>9) Yoga deck</p>\n\n<p>10) Herb garden</p>\n\n<p>11) BBQ area</p>\n\n<p>12) Changing room</p>\n\n<p>13) Dining pavilion</p>\n\n<p>14) Gymnasium</p>\n\n<p>15) Multipurpose hall</p>\n\n<p>16) Nursery area</p>\n\n<p>17) Management office</p>\n\n<p><strong>18) Link bridge</strong>&nbsp;</p>\n</div>\n</div>\n\n<div style="background:transparent; border:0px; padding:0px">\n<h3>Property Details</h3>\n</div>\n\n<hr />\n<div style="background:transparent; border:0px; padding:0px">\n<div style="background:transparent; border:0px; padding:0px">\n<p>For more information, please&nbsp;log in to:&nbsp;<a href="http://www.southville-city.com/" style="color: rgb(102, 153, 0); text-decoration: none; margin: 0px; padding: 0px; border: 0px; outline: 0px; font-weight: bold; background: transparent;">http://www.southville-city.com/</a></p>\n</div>\n</div>\n', '2015-02-06 03:18:10', 'banner2.jpg', 70, '2015-02-09 08:22:23', 0.1, 3, 1),
(10, 'Raintree Park 1', 'Simpang Ampat, Penang', 468000, 'owned', 468000, 468000, 4, 3, '2015-03-11 08:05:51', 'Appartment', '', 'VH00010', '1281', 'Freehold', '20'' x 50''', '', 'img42.jpg', 'img52.jpg', 'img62.jpg', 'img71.jpg', 'img82.jpg', '<h3>Facilities</h3>\n\n<hr />\n<div style="background:transparent; border:0px; padding:0px">\n<p>- Clubhouse</p>\n\n<p>- Swimming pool</p>\n\n<p>- Gymnasium</p>\n\n<p>- Children playground</p>\n</div>\n', '2015-02-09 02:54:09', 'img31.jpg', 80, '2015-02-09 08:35:27', 0.1, 3, 1),
(11, 'Sovereign Bay', 'Permas Jaya, Johor', 220000, 'selling', 220000, 220000, 1, 1, '2015-02-10 10:14:33', 'Appartment', '', 'VH00011', '533', 'Freehold', '4 arce', '', 'img43.jpg', 'img53.jpg', 'img63.jpg', 'img72.jpg', 'img83.jpg', '<h3>Facilities</h3>\n\n<hr />\n<div style="background:transparent; border:0px; padding:0px">\n<div style="background:transparent; border:0px; padding:0px">\n<p>-&nbsp;<strong>Rooftop infinity pool</strong></p>\n\n<p>-&nbsp;<strong>Clubhouse</strong></p>\n\n<p>-&nbsp;<strong>Gym</strong></p>\n\n<p>-&nbsp;<strong>Sauna</strong></p>\n\n<p><strong>- BBQ Area</strong></p>\n</div>\n</div>\n\n<div style="background:transparent; border:0px; padding:0px">\n<h3>Property Details</h3>\n</div>\n\n<hr />\n<div style="background:transparent; border:0px; padding:0px">\n<div style="background:transparent; border:0px; padding:0px">\n<p><strong>Additional Info :</strong><br />\n1) 24 hours hotel concierge service<br />\n2) 24 hours security<br />\n3) 270 degrees unblock scenic view<br />\n4) 1,000 meters sky wellness garden</p>\n</div>\n</div>\n', '2015-02-10 02:05:22', 'img32.jpg', 80, '0000-00-00 00:00:00', 0.1, 1, 1),
(12, 'Demo_property1', 'demo', 1200, 'owned', 1200, 1200, 2, 2, '2015-03-09 13:27:26', 'Appartment', '', 'VH00012', '1700', 'Freehold', '50'' X 60''', '', '', '', '', '', '', '', '2015-02-10 03:08:38', 'slider-laminaat2.png', 40.1, '2015-02-17 02:29:32', 0.1, 1, 0),
(13, 'Demo property2', 'India', 65000, 'owned', 65000, 65000, 3, 3, '2015-03-04 09:34:38', 'Appartment', '', 'VH00013', '1500', 'Freehold', '500 x 300', '', '', '', '', '', '', '', '2015-02-11 00:20:46', '', 25, '2015-03-04 09:34:38', 0.1, 1, 0),
(14, 'demo_property3', 'Pakistan', 5000, 'owned', 5000, 5000, 1, 0, '2015-03-11 06:37:11', 'Appartment', '', 'VH00014', '244', 'Leasehold', '20'' x 10''', '', '', '', '', '', '', '', '2015-02-11 01:24:33', '', 90, '2015-03-11 06:37:11', 0.1, 1, 0),
(15, 'Feb17 Test Unit', 'Desa Park', 10000, 'owned', 10000, 10000, 2, 2, '2015-02-16 17:50:36', 'Appartment', '', 'VH00015', '1000', 'Freehold', '100''''', '', '', '', '', '', '', '<p>Wqwqwqwqw</p>\n', '2015-02-16 12:17:04', '', 50, '2015-02-16 05:50:36', 0.1, 1, 0),
(16, 'demo_property_17/2/2015', 'demo', 10000, 'owned', 10000, 10000, 1, 1, '2015-02-17 08:01:40', 'Appartment', '', 'VH00016', '354', 'Leasehold', '10'' x 30''', '', '', '', '', '', '', '', '2015-02-17 02:30:35', '', 70, '0000-00-00 00:00:00', 0.1, 1, 0),
(17, 'demo_property_26/2/2015', 'demo location', 4000, 'owned', 4000, 4000, 1, 0, '2015-02-26 10:33:27', 'Appartment', '', 'VH00017', '431', 'Leasehold', '10'' x 40''', '', '', '', '', '', '', '', '2015-02-26 05:02:22', '', 90, '0000-00-00 00:00:00', 0.1, 1, 0),
(18, 'demo_property_4/3/2015', 'testing area', 10000, 'owned', 10000, 10000, 1, 1, '2015-03-04 09:47:46', 'Appartment', '', 'VH00018', '604', 'Freehold', '40'' x 10''', '', '', '', '', '', '', '<ol>\n <li>testing</li>\n <li>testing</li>\n <li>testingtesting</li>\n <li>testing</li>\n <li>testing</li>\n <li>testingtestingtesting</li>\n <li>testingtesting</li>\n <li>testing</li>\n</ol>\n', '2015-03-04 03:46:59', '', 80, '2015-03-04 09:47:46', 0.1, 1, 0),
(19, 'test_prop_04_03_15', 'test', 20000, 'owned', 20000, 20000, 3, 3, '2015-03-04 09:39:08', 'Bunglow', '', 'VH00019', '1700', 'Freehold', '20000', '', '', '', '', '', '', '<p>test tet ste</p>\n', '2015-03-04 04:06:46', '', 35, '2015-03-04 09:39:08', 0.1, 1, 0),
(20, 'test_prop2_04_03_15', 'Jalan Kenanga, Kg Sungai Kayu Ara, Petaling Jaya, 47400, Selangor', 500, 'owned', 500, 500, 3, 2, '2015-03-04 11:00:42', 'Appartment', '', 'VH00020', '1200', 'Freehold', '', '', '', '', '', '', '', '', '2015-03-04 04:49:49', '', 35.1, '2015-03-04 11:00:42', 0.1, 1, 0),
(21, 'test_prop_09_03_15', 'test area', 10000, 'owned', 10000, 10000, 1, 0, '2015-03-09 10:56:30', 'Appartment', '', 'VH00021', '364', 'Freehold', '20'' x 15''', '', '', '', '', '', '', '', '2015-03-09 02:56:42', '', 80, '2015-03-09 10:55:23', 0.1, 1, 0),
(22, 'test_prop2_09_03_15', 'testing area', 20000, 'selling', 20000, 20000, 1, 0, '2015-03-11 06:33:51', 'Bunglow', '', 'VH00022', '245', 'Leasehold', '10'' x 20''', '', NULL, NULL, NULL, NULL, NULL, '', '2015-03-09 05:33:26', NULL, 70, '0000-00-00 00:00:00', 0.1, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `property_deals`
--

CREATE TABLE IF NOT EXISTS `property_deals` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `property_type`
--

CREATE TABLE IF NOT EXISTS `property_type` (
`id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `property_type`
--

INSERT INTO `property_type` (`id`, `type`) VALUES
(1, 'Appartment'),
(2, 'Bunglow'),
(3, 'Duplex'),
(4, 'Row House'),
(5, 'hgjk'),
(6, 'Rest House');

-- --------------------------------------------------------

--
-- Table structure for table `ref_no`
--

CREATE TABLE IF NOT EXISTS `ref_no` (
`ref_no` int(6) unsigned zerofill NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `ref_no`
--

INSERT INTO `ref_no` (`ref_no`, `created`) VALUES
(000001, '2014-12-31 12:44:31'),
(000002, '2014-12-31 13:10:43'),
(000003, '2014-12-31 14:40:12'),
(000004, '2015-01-02 07:05:57'),
(000005, '2015-01-02 07:09:23'),
(000006, '2015-01-12 12:47:55'),
(000007, '2015-01-19 07:48:46'),
(000008, '2015-01-19 07:52:20'),
(000009, '2015-01-19 08:24:03'),
(000010, '2015-01-20 16:33:56'),
(000011, '2015-01-21 06:24:02'),
(000012, '2015-01-21 14:16:55'),
(000013, '2015-01-27 08:36:58'),
(000014, '2015-01-27 08:48:00'),
(000015, '2015-02-05 11:29:39'),
(000016, '2015-02-05 11:39:31'),
(000017, '2015-02-06 10:13:29'),
(000018, '2015-02-07 06:45:09'),
(000019, '2015-02-11 06:36:20'),
(000020, '2015-02-11 06:37:09'),
(000021, '2015-02-11 08:08:24'),
(000022, '2015-02-17 11:29:04'),
(000023, '2015-03-04 09:19:43'),
(000024, '2015-03-04 09:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(11) NOT NULL,
  `roles` varchar(100) NOT NULL,
  `charges` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles`, `charges`) VALUES
(1, 'Normal', 0),
(2, 'Gold', 50),
(3, 'Platinum', 80);

-- --------------------------------------------------------

--
-- Table structure for table `tblclients`
--

CREATE TABLE IF NOT EXISTS `tblclients` (
`id` int(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `hash` varchar(200) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tblclients`
--

INSERT INTO `tblclients` (`id`, `email`, `hash`) VALUES
(1, 'admin@admin.com', '330edc598d11ef53675ecb7baf13988b'),
(2, 'prasun.b@cisinlabs.com', 'a7474f803b47f85a598c96a74705413c'),
(3, 'prasun.b@gmail.com', 'cec4fab4b2505eaf03a1a87f7b2489e8'),
(4, 'sameer.chourasiaa@mailinator.com', '1ae6c34dc90a703204a9539395fe0ad9'),
(5, 'ankita.m@cisinlabs.com', '2d331c35879f577ff5770706a4a9bf69'),
(6, 'joman@mailinator.com', 'a1db2c7fe6b56a3dda2809bcf9cedab6'),
(7, 'sameer@mailinator.com', '13862d73bfb78679061224eaeb211a56'),
(8, 'alexchon9@gmail.com', '47a8219baef1447073f0ed18b68242bb'),
(9, 'ad@ad.com', 'c1a6c52e68a2e7e8066e618f4c0694a6'),
(10, 'te2232@gg.com', '0138b87b393921f2f18c83dcd78704c7'),
(11, 'tec2323@gg.com', 'cf64476ee715fb8facee07a847908baa'),
(12, 'test@gec.com', '2f704198c2f52669b83f0f7632a34537'),
(13, 'test24@mailinator.com', '19cd930d20f9689f98fb662ebb8b92ea'),
(14, 'toster1@mailinator.com', '5dfcf6c56d23815714d94e9d289ce256'),
(15, 'a@mailinator.com', '73b5edee463860054c5270aa888a3375'),
(16, 'e@mailinator.com', 'f35eecbde0254b99111a5b38a1971cd5'),
(17, 'b@mailinator.com', '6491a57e116ccd9fca5a57cea8e52dc3'),
(18, 'b@mailinaor.com', 'c1650d742e9c2cd0ec5760eac7831eed'),
(19, 'parker@mailinator.com', '9685c353767579dcd5cd973a46e5c2ff'),
(20, 'c@mailinator.com', '33a2f10cf4fa64a5e54f4d68130df3fd'),
(21, 'tsd@gg.com', '5949d4555d072c40aba70237ce5f8cfd'),
(22, 'ds@ge.com', '3cdf8158307e75d34679e5b6c14ffa3e'),
(23, 'samddd@mailinator.com', 'c0a06b9aa8686b6fb4f4d3d7668f9702'),
(24, 'samw@mailinator.com', '72e2bfc4f7bbe65027bb550c6628baff'),
(25, 'sam@mailinator.com', '9799026702dae76169989ce9d9e2e802');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartments`
--

CREATE TABLE IF NOT EXISTS `tbldepartments` (
`deptid` int(10) NOT NULL,
  `deptname` varchar(200) DEFAULT NULL,
  `depthidden` varchar(10) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`deptid`, `deptname`, `depthidden`) VALUES
(3, 'Administrations', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblfields`
--

CREATE TABLE IF NOT EXISTS `tblfields` (
`id` int(10) NOT NULL,
  `deptid` int(10) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `uniqid` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tblfields`
--

INSERT INTO `tblfields` (`id`, `deptid`, `name`, `uniqid`, `type`) VALUES
(8, 1, 'Type', 'f544e0d03b942c', 'text'),
(9, 1, 'role', 'f544f87f995513', 'text');

-- --------------------------------------------------------

--
-- Table structure for table `tblpriorities`
--

CREATE TABLE IF NOT EXISTS `tblpriorities` (
  `priority` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpriorities`
--

INSERT INTO `tblpriorities` (`priority`) VALUES
('Low'),
('Medium'),
('High');

-- --------------------------------------------------------

--
-- Table structure for table `tblsettings`
--

CREATE TABLE IF NOT EXISTS `tblsettings` (
  `setting` varchar(200) NOT NULL,
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblsettings`
--

INSERT INTO `tblsettings` (`setting`, `value`) VALUES
('companyname', 'Myvikohome'),
('template', 'default'),
('mailprotocol', 'mail'),
('smtp_host', ''),
('smtp_port', ''),
('smtp_timeout', '30'),
('smtp_user', ''),
('smtp_pass', 'acf7ef943fdeb3cbfed8dd0d8f584731'),
('charset', 'utf-8'),
('email', 'sameer.chourasia@cisinlabs.com'),
('message', 'Welcome to Myvikohome Support Desk. Our Support Desk will help you to contact us for all your questions and get instant answers to it.  In order to open a support ticket, please select a department below.');

-- --------------------------------------------------------

--
-- Table structure for table `tblstaffs`
--

CREATE TABLE IF NOT EXISTS `tblstaffs` (
`id` int(10) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `admin` int(10) DEFAULT '0',
  `hash` varchar(200) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblstaffs`
--

INSERT INTO `tblstaffs` (`id`, `firstname`, `lastname`, `email`, `password`, `admin`, `hash`) VALUES
(1, 'Admin', 'Admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblstatus`
--

CREATE TABLE IF NOT EXISTS `tblstatus` (
  `status` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblstatus`
--

INSERT INTO `tblstatus` (`status`) VALUES
('answered'),
('closed'),
('open'),
('customer reply'),
('in progress');

-- --------------------------------------------------------

--
-- Table structure for table `tblticketreplies`
--

CREATE TABLE IF NOT EXISTS `tblticketreplies` (
`id` int(10) NOT NULL,
  `ticketid` int(10) NOT NULL,
  `body` text NOT NULL,
  `replier` varchar(200) DEFAULT NULL,
  `replierid` int(10) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tblticketreplies`
--

INSERT INTO `tblticketreplies` (`id`, `ticketid`, `body`, `replier`, `replierid`, `time`) VALUES
(1, 1, 'ok', 'staff ', 1, '2014-10-27 08:24:59'),
(2, 1, 'good', 'staff ', 1, '2014-10-28 07:58:53'),
(3, 1, 'nnn', 'staff ', 1, '2014-10-28 07:59:02'),
(4, 4, 'ok ', 'staff ', 1, '2014-10-28 11:28:35'),
(5, 10, 'ok', 'staff ', 1, '2014-10-29 06:49:44'),
(6, 23, 'ok', 'client', 2, '2014-10-29 09:40:11'),
(7, 23, 'thanks', 'client', 2, '2014-10-29 09:44:58'),
(8, 23, 'please', 'staff ', 1, '2014-10-29 09:47:01'),
(9, 39, 'Test Completed', 'staff ', 1, '2015-01-14 07:01:17'),
(10, 40, 'hi sameer\n\nwill respond you soon', 'staff ', 1, '2015-01-19 07:49:56'),
(11, 41, 'Hi user', 'staff ', 1, '2015-02-05 09:14:15'),
(12, 38, 'hi ankita', 'staff ', 1, '2015-02-05 09:14:43'),
(13, 69, 'ok', 'client', 25, '2015-02-25 04:59:37'),
(14, 69, 'tssds', 'staff ', 1, '2015-03-11 08:46:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbltickets`
--

CREATE TABLE IF NOT EXISTS `tbltickets` (
`id` int(10) NOT NULL,
  `subject` text NOT NULL,
  `body` text NOT NULL,
  `status` varchar(200) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `clientid` int(10) NOT NULL,
  `priority` varchar(50) DEFAULT NULL,
  `additional` text,
  `attachment` varchar(200) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `tbltickets`
--

INSERT INTO `tbltickets` (`id`, `subject`, `body`, `status`, `department`, `clientid`, `priority`, `additional`, `attachment`, `created`, `user_id`) VALUES
(1, 'sales', 'dfdfggd', 'answered', 2, 1, 'Medium', '[]', NULL, '2014-10-27 08:24:36', 14),
(6, 'sales test', 'fgd', 'open', 2, 2, 'Medium', '[]', NULL, '2014-10-28 11:30:42', 14),
(3, 'test', 'guiu', 'open', 2, 2, 'Medium', '[]', NULL, '2014-10-27 11:02:25', 14),
(4, 'ticket', 'ghj', 'open', 2, 2, 'Medium', '[]', NULL, '2014-10-27 12:11:32', 14),
(5, 'test', 'sdgf', 'open', 3, 2, 'Medium', '[]', NULL, '2014-10-27 12:15:21', 14),
(7, 'ticketfor', 'fhjgk', 'open', 3, 2, 'Medium', '[]', NULL, '2014-10-28 15:40:38', 14),
(8, 'ticketforsales', 'jhmh', 'open', 3, 2, 'High', '[]', NULL, '2014-10-28 15:42:48', 14),
(9, 'ala', 'iop', 'open', 3, 2, 'High', '[]', NULL, '2014-10-28 15:46:29', 14),
(10, 'hh', 'hh', 'answered', 3, 2, 'Low', '[]', NULL, '2014-10-29 06:49:06', 14),
(11, 'rttr', 'yy', 'open', 4, 3, 'High', '[]', NULL, '2014-10-29 06:58:13', 14),
(12, 'ii', 'kk', 'open', 2, 3, 'Medium', '[]', NULL, '2014-10-29 06:58:27', 14),
(13, 'tt', 'hbbh', 'open', 3, 2, 'High', '[]', NULL, '2014-10-29 08:09:51', 14),
(14, 'ghg', 'iopi', 'open', 2, 2, 'Medium', '[]', NULL, '2014-10-29 08:11:27', 14),
(15, 'gi', 'kkho', 'open', 2, 2, 'Medium', '[]', NULL, '2014-10-29 08:12:04', 14),
(16, 'op[', 'jop[', 'open', 2, 2, 'High', '[]', NULL, '2014-10-29 08:12:45', 14),
(17, 'hlk', 'huk', 'open', 2, 2, 'Medium', '[]', NULL, '2014-10-29 08:16:01', 14),
(18, 'gui', 'uio', 'open', 3, 2, 'High', '[]', NULL, '2014-10-29 08:19:38', 14),
(19, 'ho[', 'jop[', 'open', 3, 2, 'Medium', '[]', NULL, '2014-10-29 08:22:18', 14),
(20, 'iop', 'ihop', 'open', 3, 2, 'Medium', '[]', NULL, '2014-10-29 08:23:16', 14),
(21, 'gyui', 'gyuji', 'open', 3, 2, 'Medium', '[]', NULL, '2014-10-29 08:25:58', 14),
(22, 'yujfuy', 'gjgfj', 'open', 3, 2, 'Medium', '[]', NULL, '2014-10-29 08:31:24', 14),
(23, 'dsgg', 'sgs', 'answered', 2, 2, 'Medium', '[]', NULL, '2014-10-29 09:12:12', 14),
(24, 'test', 'test', 'open', 3, 4, 'High', '[]', NULL, '2014-10-29 09:53:43', 14),
(25, 'kho', 'jhj', 'open', 3, 2, 'Medium', '[]', NULL, '2014-10-29 10:28:59', 14),
(26, 'dfg', 'dfggg', 'open', 3, 2, 'High', '[]', NULL, '2014-10-29 10:31:27', 14),
(27, 'dfg', 'dfggg', 'open', 3, 2, 'High', '[]', NULL, '2014-10-29 10:31:51', 14),
(28, 'df', 'dfs', 'open', 3, 2, 'Medium', '[]', NULL, '2014-10-29 10:32:12', 14),
(29, 'yhku', 'hfk', 'open', 3, 2, 'Medium', '[]', NULL, '2014-10-29 10:39:14', 14),
(30, 'fdg', 'fdh', 'open', 3, 2, 'Medium', '[]', NULL, '2014-10-29 10:43:34', 14),
(31, 'hjku', 'hvjhh', 'open', 3, 2, 'Medium', '[]', NULL, '2014-10-29 16:19:12', 14),
(32, 'ygu8io', 'uio', 'open', 3, 2, 'Medium', '[]', NULL, '2014-10-29 16:27:16', 0),
(33, 'srfsdf', 'dsgg', 'open', 3, 2, 'Medium', '[]', NULL, '2014-10-29 16:44:36', 14),
(34, 'sdgd', 'hnhh', 'open', 3, 3, 'Medium', '[]', NULL, '2014-10-30 12:07:45', 14),
(35, 'sertsdgfsd', 'sdgdg', 'open', 3, 2, 'Medium', '[]', NULL, '2014-10-30 12:10:00', 14),
(36, 'ppp', 'fxg', 'open', 3, 2, 'Medium', '[]', NULL, '2014-10-30 12:14:22', 14),
(37, 'sdgs', 'fsgh', 'open', 3, 2, 'Medium', '[]', NULL, '2014-10-30 12:15:44', 14),
(38, 'lohjk', 'ghj', 'closed', 3, 5, 'Medium', '[]', NULL, '2015-01-12 13:58:50', 4),
(39, 'Test Issue', 'This is Test Ticket, Please Ignore the ticket', 'in progress', 3, 6, 'High', '[]', NULL, '2015-01-14 06:48:13', 8),
(40, 'Queries', 'P find below queries :-\n\n1. blah blah', 'closed', 3, 7, 'High', '[]', NULL, '2015-01-19 07:47:35', 3),
(41, 'Test', 'TEst s', 'answered', 3, 8, 'High', '[]', NULL, '2015-02-04 08:17:09', 10),
(42, '1212', '121212|"12''', 'open', 3, 9, 'Low', '[]', NULL, '2015-02-07 09:03:31', 10),
(43, 'kwjwieuwe''<? echo "FYK/="; ?>', '<script>alert(document.cookie);</script>', 'open', 3, 10, 'Low', '[]', NULL, '2015-02-10 10:23:14', 10),
(44, 'wiwi', '<script>alert(''<?php echo "123"; ?>'');</script>\n', 'open', 3, 11, 'Medium', '[]', NULL, '2015-02-10 10:25:43', 10),
(45, '932938923', '<script>alert(document.cookie);</script>', 'open', 3, 12, 'Low', '[]', NULL, '2015-02-16 18:08:54', 10),
(51, '[removed]alert&#40;''as''&#41;[removed]', '[removed]alert&#40;''ass''&#41;[removed]', 'open', 2, 13, 'Medium', '[]', NULL, '2015-02-17 08:48:13', 2),
(52, '[removed]alert&#40;''new''&#41;[removed]', '[removed]alert&#40;''nasew''&#41;[removed]', 'open', 2, 18, 'Low', '[]', NULL, '2015-02-17 08:54:49', 2),
(50, '[removed]alert&#40;''qwe''&#41;[removed]', '[removed]alert&#40;''asd''&#41;[removed]', 'open', 2, 17, 'Low', '[]', NULL, '2015-02-17 08:47:16', 2),
(53, '[removed]alert&#40;''sdef''&#41;[removed]', '[removed]alert&#40;''sdef''&#41;[removed]', 'open', 2, 19, 'Low', NULL, NULL, '2015-02-17 09:06:39', 2),
(54, '[removed]alert&#40;''a''&#41;[removed]', '[removed]alert&#40;''b''&#41;[removed]', 'open', 3, 20, 'Low', '0', NULL, '2015-02-17 09:08:13', 2),
(55, '[removed]alert&#40;''a''&#41;[removed]', '[removed]alert&#40;''b''&#41;[removed]', 'open', 3, 20, 'Low', '0', NULL, '2015-02-17 09:09:01', 2),
(56, '[removed]alert&#40;''a''&#41;[removed]', '[removed]alert&#40;''b''&#41;[removed]', 'open', 3, 20, 'Low', '0', NULL, '2015-02-17 09:09:04', 2),
(57, '[removed]alert&#40;''a''&#41;[removed]', '[removed]alert&#40;''b''&#41;[removed]', 'open', 3, 20, 'Low', '0', NULL, '2015-02-17 09:09:12', 2),
(58, '[removed]alert&#40;''new''&#41;[removed]', '[removed]alert&#40;''new''&#41;[removed]', 'open', 3, 13, 'Low', '[]', NULL, '2015-02-17 09:12:06', 2),
(59, '[removed]alert&#40;''12''&#41;[removed]', '[removed]alert&#40;''neasdsadsadasdasdw''&#41;[removed]', 'open', 3, 15, 'Low', '[]', NULL, '2015-02-17 09:13:09', 2),
(60, 'sdsds', '<sdsds>', 'open', 3, 21, 'Low', '[]', NULL, '2015-02-17 11:23:37', 10),
(61, 'lsldsksl', 'ldksldkwld > 11212121? ..sd,sd,s''welwelwoewolew', 'open', 3, 22, 'Low', '[]', NULL, '2015-02-17 11:26:34', 10),
(62, 'lsldsksl', '[removed]alert&#40;''XSS''&#41;;', 'open', 3, 22, 'Low', '[]', NULL, '2015-02-17 11:33:04', 10),
(63, 'lsldsksl', '<IMG >', 'open', 3, 22, 'Low', '[]', NULL, '2015-02-17 11:34:36', 10),
(64, 'lsldsksl', '<img src="smiley.gif" alt="Smiley face" height="42" width="42">', 'open', 3, 22, 'Low', '[]', NULL, '2015-02-17 11:39:48', 10),
(65, 'lsldsksl', '<a target="_blank">clickme\nin firefox</a>\n<a/'''''' target="_blank"\nhref=[removed]PHNjcmlwdD5hbGVydChvcGVuZXIuZG9jdW1lbnQuYm9keS5pbm5lckhUTUwpPC9zY3JpcHQ+>firefox11</a>', 'open', 3, 22, 'Low', '[]', NULL, '2015-02-17 11:58:13', 10),
(66, 'Notebook and Pen', '<img src="olaola.jpg">', 'open', 3, 23, 'Low', '[]', NULL, '2015-02-17 12:27:33', 1),
(67, 'Notebook and Pen', '<img src="olaola.jpg">', 'open', 3, 24, 'Low', '[]', NULL, '2015-02-17 12:29:24', 1),
(68, 'Notebook and Pen', 'sss', 'open', 2, 25, 'Low', '[]', NULL, '2015-02-24 11:50:18', 0),
(69, 'Notebook and Pen', 'saaa saaa saaa', 'answered', 3, 25, 'Low', '[]', NULL, '2015-02-25 04:55:02', 4);

-- --------------------------------------------------------

--
-- Table structure for table `transactionfees`
--

CREATE TABLE IF NOT EXISTS `transactionfees` (
`id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `percentage` float NOT NULL,
  `member_type` varchar(100) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `transactionfees`
--

INSERT INTO `transactionfees` (`id`, `amount`, `percentage`, `member_type`, `modified_date`) VALUES
(1, 20, 2, 'Normal', '2014-12-31 12:49:21'),
(2, 40, 4, 'Gold', '2014-12-31 12:49:48'),
(3, 80, 8, 'Platinum', '2014-12-31 12:49:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_autotracking_log`
--

CREATE TABLE IF NOT EXISTS `user_autotracking_log` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fund_type` varchar(25) NOT NULL DEFAULT 'Buy' COMMENT 'Buy',
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_fund_log_id` int(11) NOT NULL,
  `detail` text NOT NULL,
  `debit` float(15,2) NOT NULL,
  `credit` float(15,2) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `share` int(11) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='for track transaction charge on buy share at owned property' AUTO_INCREMENT=137 ;

--
-- Dumping data for table `user_autotracking_log`
--

INSERT INTO `user_autotracking_log` (`id`, `user_id`, `fund_type`, `date`, `user_fund_log_id`, `detail`, `debit`, `credit`, `modified_date`, `share`, `property_id`) VALUES
(23, 9, 'Buy', '0000-00-00 00:00:00', 44, 'Transaction Charge of 12 MYR for purchase 5 Shares of Property Sandy''s House', 12.00, 0.00, '2015-01-13 12:27:28', 5, 3),
(24, 17, 'Buy', '0000-00-00 00:00:00', 60, 'Transaction Charge of 8 MYR for purchase 2 Shares of Property Property2', 8.00, 0.00, '2015-01-19 08:25:52', 2, 2),
(25, 2, 'Buy', '0000-00-00 00:00:00', 74, 'Transaction Charge of 6 MYR for purchase 3 Shares of Property Property2', 6.00, 0.00, '2015-01-21 15:14:25', 3, 2),
(26, 2, 'Refund', '0000-00-00 00:00:00', 0, 'Refund by Admin for Property Property2, Total Share 4 of amt 8 MYR', 0.00, 8.00, '2015-01-21 15:27:20', 4, 2),
(27, 10, 'Refund', '0000-00-00 00:00:00', 0, 'Refund by Admin for Property Property2, Total Share 10 of amt 20 MYR', 0.00, 20.00, '2015-01-21 15:27:21', 10, 2),
(28, 16, 'Refund', '0000-00-00 00:00:00', 0, 'Refund by Admin for Property Property2, Total Share 47 of amt 94 MYR', 0.00, 94.00, '2015-01-21 15:27:21', 47, 2),
(29, 17, 'Refund', '0000-00-00 00:00:00', 0, 'Refund by Admin for Property Property2, Total Share 2 of amt 8 MYR', 0.00, 8.00, '2015-01-21 15:27:21', 2, 2),
(30, 17, 'Buy', '0000-00-00 00:00:00', 81, 'Transaction Charge of 59.352 MYR for purchase 0.1 Shares of Property M Residence Canal Link', 59.35, 0.00, '2015-01-27 08:22:09', 0, 5),
(31, 17, 'Buy', '0000-00-00 00:00:00', 82, 'Transaction Charge of 192 MYR for purchase 0.1 Shares of Property The Mansions Desa ParkCity', 192.00, 0.00, '2015-01-27 08:22:37', 0, 6),
(32, 10, 'Buy', '0000-00-00 00:00:00', 83, 'Transaction Charge of 96 MYR for purchase 0.1 Shares of Property The Mansions Desa ParkCity', 96.00, 0.00, '2015-01-27 08:29:44', 0, 6),
(33, 10, 'Buy', '0000-00-00 00:00:00', 84, 'Transaction Charge of 96 MYR for purchase 0.1 Shares of Property The Mansions Desa ParkCity', 96.00, 0.00, '2015-01-27 08:30:21', 0, 6),
(34, 10, 'Buy', '0000-00-00 00:00:00', 88, 'Transaction Charge of 36.6369971057 MYR for purchase 0.1234566555656565454545453434343434343434343434343434343 Shares of Property M Residence Canal Link', 36.64, 0.00, '2015-01-27 08:50:07', 0, 5),
(35, 10, 'Buy', '0000-00-00 00:00:00', 89, 'Transaction Charge of 336.028242424 MYR for purchase 1.132323232323232323232323232323232323232323232323232323232323232323232323232323232323232323 Shares of Property M Residence Canal Link', 336.03, 0.00, '2015-01-27 09:19:14', 1, 5),
(36, 8, 'Buy', '0000-00-00 00:00:00', 90, 'Transaction Charge of 29.676 MYR for purchase 0.10 Shares of Property M Residence Canal Link', 29.68, 0.00, '2015-01-27 09:26:58', 0, 5),
(37, 8, 'Buy', '0000-00-00 00:00:00', 91, 'Transaction Charge of 29.676 MYR for purchase 0.1 Shares of Property M Residence Canal Link', 29.68, 0.00, '2015-01-27 15:09:18', 0, 5),
(38, 10, 'Buy', '0000-00-00 00:00:00', 92, 'Transaction Charge of 29.676 MYR for purchase 0.1 Shares of Property M Residence Canal Link', 29.68, 0.00, '2015-01-27 15:52:59', 0, 5),
(39, 10, 'Buy', '0000-00-00 00:00:00', 93, 'Transaction Charge of 12.6 MYR for purchase 0.1 Shares of Property Boulevard Residence, Kayu Ara', 12.60, 0.00, '2015-02-04 08:13:36', 0, 7),
(40, 17, 'Buy', '0000-00-00 00:00:00', 94, 'Transaction Charge of 25.2 MYR for purchase 0.1 Shares of Property Boulevard Residence, Kayu Ara', 25.20, 0.00, '2015-02-05 08:25:26', 0, 7),
(41, 17, 'Buy', '0000-00-00 00:00:00', 97, 'Transaction Charge of 60 MYR for purchase 0.1 Shares of Property 2-sty Terrace Sunway SPK', 60.00, 0.00, '2015-02-05 11:38:18', 0, 8),
(42, 17, 'Buy', '0000-00-00 00:00:00', 100, 'Transaction Charge of 14.72 MYR for purchase 0.1 Shares of Property Savanna Executive Suites', 14.72, 0.00, '2015-02-06 09:04:07', 0, 9),
(43, 17, 'Buy', '0000-00-00 00:00:00', 101, 'Transaction Charge of 14572.8 MYR for purchase 99 Shares of Property Savanna Executive Suites', 14572.80, 0.00, '2015-02-06 09:09:03', 99, 9),
(44, 17, 'Buy', '0000-00-00 00:00:00', 102, 'Transaction Charge of 132.48 MYR for purchase 0.9 Shares of Property Savanna Executive Suites', 132.48, 0.00, '2015-02-06 09:09:42', 1, 9),
(45, 10, 'Buy', '0000-00-00 00:00:00', 105, 'Transaction Charge of 36.8 MYR for purchase 0.5 Shares of Property Savanna Executive Suites', 36.80, 0.00, '2015-02-06 10:21:14', 1, 9),
(46, 10, 'Buy', '0000-00-00 00:00:00', 108, 'Transaction Charge of 42 MYR for purchase 0.5 Shares of Property Savanna Executive Suites', 42.00, 0.00, '2015-02-06 10:35:37', 1, 9),
(47, 10, 'Buy', '0000-00-00 00:00:00', 111, 'Transaction Charge of 0 MYR for purchase 0.5 Shares of Property Savanna Executive Suites', 0.00, 0.00, '2015-02-06 10:41:36', 1, 9),
(48, 2, 'Buy', '0000-00-00 00:00:00', 114, 'Transaction Charge of 2.4 MYR for purchase 1 Shares of Property Property1', 2.40, 0.00, '2015-02-06 11:54:10', 1, 1),
(49, 2, 'Buy', '0000-00-00 00:00:00', 117, 'Transaction Charge of 130 MYR for purchase 1 Shares of Property Boulevard Residence, Kayu Ara', 130.00, 0.00, '2015-02-06 12:38:54', 1, 7),
(50, 2, 'Buy', '0000-00-00 00:00:00', 118, 'Transaction Charge of 300 MYR for purchase 1 Shares of Property 2-sty Terrace Sunway SPK', 300.00, 0.00, '2015-02-06 13:36:53', 1, 8),
(51, 2, 'Buy', '0000-00-00 00:00:00', 119, 'Transaction Charge of 300 MYR for purchase 1 Shares of Property 2-sty Terrace Sunway SPK', 300.00, 0.00, '2015-02-06 13:37:07', 1, 8),
(52, 2, 'Buy', '0000-00-00 00:00:00', 120, 'Transaction Charge of 300 MYR for purchase 1 Shares of Property 2-sty Terrace Sunway SPK', 300.00, 0.00, '2015-02-06 14:08:45', 1, 8),
(53, 2, 'Buy', '0000-00-00 00:00:00', 121, 'Transaction Charge of 130.01 MYR for purchase 1 Shares of Property Boulevard Residence, Kayu Ara', 130.01, 0.00, '2015-02-06 14:28:22', 1, 7),
(54, 2, 'Buy', '0000-00-00 00:00:00', 122, 'Transaction Charge of 13 MYR for purchase 0.1 Shares of Property Boulevard Residence, Kayu Ara', 13.00, 0.00, '2015-02-06 14:55:28', 0, 7),
(55, 2, 'Buy', '0000-00-00 00:00:00', 123, 'Transaction Charge of 13.4 MYR for purchase 0.1 Shares of Property Boulevard Residence, Kayu Ara', 13.40, 0.00, '2015-02-06 14:59:02', 0, 7),
(56, 2, 'Buy', '0000-00-00 00:00:00', 124, 'Transaction Charge of 34 MYR for purchase 0.1 Shares of Property 2-sty Terrace Sunway SPK', 34.00, 0.00, '2015-02-06 15:51:08', 0, 8),
(57, 2, 'Buy', '0000-00-00 00:00:00', 125, 'Transaction Charge of 8.6 MYR for purchase 0.1 Shares of Property Savanna Executive Suites', 8.60, 0.00, '2015-02-07 06:37:24', 0, 9),
(58, 2, 'Buy', '0000-00-00 00:00:00', 128, 'Transaction Charge of 8.4 MYR for purchase 0.1 Shares of Property Savanna Executive Suites', 8.40, 0.00, '2015-02-07 06:39:13', 0, 9),
(59, 2, 'Buy', '0000-00-00 00:00:00', 133, 'Transaction Charge of 13 MYR for purchase 0.1 Shares of Property Boulevard Residence, Kayu Ara', 13.00, 0.00, '2015-02-07 06:58:50', 0, 7),
(60, 2, 'Buy', '0000-00-00 00:00:00', 134, 'Transaction Charge of 13 MYR for purchase 0.1 Shares of Property Boulevard Residence, Kayu Ara', 13.00, 0.00, '2015-02-07 07:21:39', 0, 7),
(61, 10, 'Buy', '0000-00-00 00:00:00', 135, 'Transaction Charge of 65 MYR for purchase 0.5 Shares of Property Boulevard Residence, Kayu Ara', 65.00, 0.00, '2015-02-09 08:07:04', 1, 7),
(62, 10, 'Buy', '0000-00-00 00:00:00', 136, 'Transaction Charge of 65 MYR for purchase 0.5 Shares of Property Boulevard Residence, Kayu Ara', 65.00, 0.00, '2015-02-09 08:09:20', 1, 7),
(63, 10, 'Buy', '0000-00-00 00:00:00', 137, 'Transaction Charge of 0.13 MYR for purchase 0.001 Shares of Property Boulevard Residence, Kayu Ara', 0.13, 0.00, '2015-02-09 08:09:53', 0, 7),
(64, 10, 'Buy', '0000-00-00 00:00:00', 138, 'Transaction Charge of 42 MYR for purchase 0.5 Shares of Property Savanna Executive Suites', 42.00, 0.00, '2015-02-09 08:13:44', 1, 9),
(65, 10, 'Buy', '0000-00-00 00:00:00', 141, 'Transaction Charge of 252 MYR for purchase 3 Shares of Property Savanna Executive Suites', 252.00, 0.00, '2015-02-09 08:16:00', 3, 9),
(66, 10, 'Buy', '0000-00-00 00:00:00', 144, 'Transaction Charge of 9.36E-7 MYR for purchase 0.00000001 Shares of Property Raintree Park 1', 0.00, 0.00, '2015-02-09 08:25:52', 0, 10),
(67, 10, 'Buy', '0000-00-00 00:00:00', 145, 'Transaction Charge of 0.00936 MYR for purchase 0.0001 Shares of Property Raintree Park 1', 0.01, 0.00, '2015-02-09 08:26:37', 0, 10),
(68, 10, 'Buy', '0000-00-00 00:00:00', 146, 'Transaction Charge of 11.555554608 MYR for purchase 0.12345678 Shares of Property Raintree Park 1', 11.56, 0.00, '2015-02-09 08:27:25', 0, 10),
(69, 17, 'Buy', '0000-00-00 00:00:00', 147, 'Transaction Charge of 18682.56 MYR for purchase 99.80 Shares of Property Raintree Park 1', 18682.56, 0.00, '2015-02-09 08:29:12', 100, 10),
(70, 10, 'Buy', '0000-00-00 00:00:00', 148, 'Transaction Charge of 561.6 MYR for purchase 6 Shares of Property Raintree Park 1', 561.60, 0.00, '2015-02-09 08:31:23', 6, 10),
(71, 10, 'Buy', '0000-00-00 00:00:00', 151, 'Transaction Charge of 93.6 MYR for purchase 1 Shares of Property Raintree Park 1', 93.60, 0.00, '2015-02-09 08:40:04', 1, 10),
(72, 10, 'Buy', '0000-00-00 00:00:00', 154, 'Transaction Charge of 93.6 MYR for purchase 1 Shares of Property Raintree Park 1', 93.60, 0.00, '2015-02-09 08:40:26', 1, 10),
(73, 2, 'Buy', '0000-00-00 00:00:00', 157, 'Transaction Charge of 39 MYR for purchase 0.3 Shares of Property Boulevard Residence, Kayu Ara', 39.00, 0.00, '2015-02-09 11:50:46', 0, 7),
(74, 2, 'Buy', '0000-00-00 00:00:00', 158, 'Transaction Charge of 13 MYR for purchase 0.1 Shares of Property Boulevard Residence, Kayu Ara', 13.00, 0.00, '2015-02-09 12:10:12', 0, 7),
(75, 2, 'Buy', '0000-00-00 00:00:00', 159, 'Transaction Charge of 13 MYR for purchase 0.1 Shares of Property Boulevard Residence, Kayu Ara', 13.00, 0.00, '2015-02-09 12:55:10', 0, 7),
(76, 2, 'Buy', '0000-00-00 00:00:00', 160, 'Transaction Charge of 13 MYR for purchase 0.1 Shares of Property Boulevard Residence, Kayu Ara', 13.00, 0.00, '2015-02-09 12:55:13', 0, 7),
(77, 2, 'Buy', '0000-00-00 00:00:00', 161, 'Transaction Charge of 13 MYR for purchase 0.1 Shares of Property Boulevard Residence, Kayu Ara', 13.00, 0.00, '2015-02-09 12:59:00', 0, 7),
(78, 2, 'Buy', '0000-00-00 00:00:00', 162, 'Transaction Charge of 10.296 MYR for purchase 0.11 Shares of Property Raintree Park 1', 10.30, 0.00, '2015-02-09 13:10:46', 0, 10),
(79, 2, 'Buy', '0000-00-00 00:00:00', 167, 'Transaction Charge of 13 MYR for purchase 0.1 Shares of Property Boulevard Residence, Kayu Ara', 13.00, 0.00, '2015-02-09 13:47:02', 0, 7),
(80, 2, 'Buy', '0000-00-00 00:00:00', 168, 'Transaction Charge of 34 MYR for purchase 0.1 Shares of Property 2-sty Terrace Sunway SPK', 34.00, 0.00, '2015-02-10 06:02:55', 0, 8),
(81, 2, 'Buy', '0000-00-00 00:00:00', 169, 'Transaction Charge of 34 MYR for purchase 0.1 Shares of Property 2-sty Terrace Sunway SPK', 34.00, 0.00, '2015-02-10 06:05:44', 0, 8),
(82, 2, 'Buy', '0000-00-00 00:00:00', 170, 'Transaction Charge of 34 MYR for purchase 0.1 Shares of Property 2-sty Terrace Sunway SPK', 34.00, 0.00, '2015-02-10 06:14:12', 0, 8),
(83, 2, 'Buy', '0000-00-00 00:00:00', 171, 'Transaction Charge of 34 MYR for purchase 0.1 Shares of Property 2-sty Terrace Sunway SPK', 34.00, 0.00, '2015-02-10 06:14:43', 0, 8),
(84, 2, 'Buy', '0000-00-00 00:00:00', 172, 'Transaction Charge of 34 MYR for purchase 0.1 Shares of Property 2-sty Terrace Sunway SPK', 34.00, 0.00, '2015-02-10 06:15:27', 0, 8),
(85, 2, 'Buy', '0000-00-00 00:00:00', 173, 'Transaction Charge of 13 MYR for purchase 0.1 Shares of Property Boulevard Residence, Kayu Ara', 13.00, 0.00, '2015-02-10 08:13:02', 0, 7),
(86, 17, 'Buy', '0000-00-00 00:00:00', 174, 'Transaction Charge of 88 MYR for purchase 1 Shares of Property Sovereign Bay', 88.00, 0.00, '2015-02-10 08:21:48', 1, 11),
(87, 17, 'Buy', '0000-00-00 00:00:00', 175, 'Transaction Charge of 8.8 MYR for purchase 0.1 Shares of Property Sovereign Bay', 8.80, 0.00, '2015-02-10 08:21:59', 0, 11),
(88, 10, 'Buy', '0000-00-00 00:00:00', 176, 'Transaction Charge of 44 MYR for purchase 1 Shares of Property Sovereign Bay', 44.00, 0.00, '2015-02-10 08:29:44', 1, 11),
(89, 10, 'Buy', '0000-00-00 00:00:00', 177, 'Transaction Charge of 44 MYR for purchase 1 Shares of Property Sovereign Bay', 44.00, 0.00, '2015-02-10 08:30:54', 1, 11),
(90, 10, 'Buy', '0000-00-00 00:00:00', 178, 'Transaction Charge of 44 MYR for purchase 1 Shares of Property Sovereign Bay', 44.00, 0.00, '2015-02-10 08:31:10', 1, 11),
(91, 17, 'Buy', '0000-00-00 00:00:00', 179, 'Transaction Charge of 8668 MYR for purchase 98.5 Shares of Property Sovereign Bay', 8668.00, 0.00, '2015-02-10 08:31:55', 99, 11),
(92, 2, 'Buy', '0000-00-00 00:00:00', 180, 'Transaction Charge of 21.6 MYR for purchase 90 Shares of Property Demo_property1', 21.60, 0.00, '2015-02-10 08:50:15', 90, 12),
(93, 2, 'Buy', '0000-00-00 00:00:00', 181, 'Transaction Charge of 0.24 MYR for purchase 0.1 Shares of Property Property1', 0.24, 0.00, '2015-02-10 08:55:38', 0, 1),
(94, 10, 'Buy', '0000-00-00 00:00:00', 184, 'Transaction Charge of 2.4 MYR for purchase 10 Shares of Property Demo_property1', 2.40, 0.00, '2015-02-10 10:12:15', 10, 12),
(95, 2, 'Buy', '0000-00-00 00:00:00', 185, 'Transaction Charge of 2.4 MYR for purchase 10 Shares of Property Demo_property1', 2.40, 0.00, '2015-02-10 11:38:23', 10, 12),
(96, 2, 'Buy', '0000-00-00 00:00:00', 186, 'Transaction Charge of 585 MYR for purchase 45 Shares of Property Demo property2', 585.00, 0.00, '2015-02-11 06:07:10', 45, 13),
(97, 3, 'Buy', '0000-00-00 00:00:00', 187, 'Transaction Charge of 1430 MYR for purchase 55 Shares of Property Demo property2', 1430.00, 0.00, '2015-02-11 06:07:41', 55, 13),
(98, 3, 'Buy', '0000-00-00 00:00:00', 191, 'Transaction Charge of 1170 MYR for purchase 45 Shares of Property Demo property2', 1170.00, 0.00, '2015-02-11 06:54:47', 45, 13),
(99, 10, 'Buy', '0000-00-00 00:00:00', 195, 'Transaction Charge of 650 MYR for purchase 5 Shares of Property Boulevard Residence, Kayu Ara', 650.00, 0.00, '2015-02-11 08:04:57', 5, 7),
(100, 10, 'Buy', '0000-00-00 00:00:00', 201, 'Transaction Charge of 100 MYR for purchase 100 Shares of Property demo_property3', 100.00, 0.00, '2015-02-11 08:12:54', 100, 14),
(101, 10, 'Buy', '0000-00-00 00:00:00', 203, 'Transaction Charge of 20 MYR for purchase 10 Shares of Property Feb17 Test Unit', 20.00, 0.00, '2015-02-16 17:48:06', 10, 15),
(102, 10, 'Buy', '0000-00-00 00:00:00', 204, 'Transaction Charge of 180 MYR for purchase 90 Shares of Property Feb17 Test Unit', 180.00, 0.00, '2015-02-16 17:48:29', 90, 15),
(103, 10, 'Buy', '0000-00-00 00:00:00', 205, 'Transaction Charge of 40 MYR for purchase 20 Shares of Property Feb17 Test Unit', 40.00, 0.00, '2015-02-16 17:59:46', 20, 15),
(104, 17, 'Buy', '0000-00-00 00:00:00', 208, 'Transaction Charge of 200 MYR for purchase 50 Shares of Property demo_property_17/2/2015', 200.00, 0.00, '2015-02-17 08:01:11', 50, 16),
(105, 17, 'Buy', '0000-00-00 00:00:00', 209, 'Transaction Charge of 200 MYR for purchase 50 Shares of Property demo_property_17/2/2015', 200.00, 0.00, '2015-02-17 08:01:24', 50, 16),
(106, 2, 'Buy', '0000-00-00 00:00:00', 211, 'Transaction Charge of 0.48 MYR for purchase 2 Shares of Property Demo_property1', 0.48, 0.00, '2015-02-17 13:17:36', 2, 12),
(107, 2, 'Buy', '0000-00-00 00:00:00', 214, 'Transaction Charge of 143 MYR for purchase 1.1 Shares of Property Boulevard Residence, Kayu Ara', 143.00, 0.00, '2015-02-17 14:06:30', 1, 7),
(108, 2, 'Buy', '0000-00-00 00:00:00', 215, 'Transaction Charge of 0.264 MYR for purchase 1.1 Shares of Property Demo_property1', 0.26, 0.00, '2015-02-17 14:07:36', 1, 12),
(109, 2, 'Buy', '0000-00-00 00:00:00', 218, 'Transaction Charge of 0.264 MYR for purchase 1.1 Shares of Property Demo_property1', 0.26, 0.00, '2015-02-17 14:07:42', 1, 12),
(110, 2, 'Buy', '0000-00-00 00:00:00', 221, 'Transaction Charge of 6.024 MYR for purchase 25.1 Shares of Property Demo_property1', 6.02, 0.00, '2015-02-17 14:08:09', 25, 12),
(111, 2, 'Buy', '0000-00-00 00:00:00', 224, 'Transaction Charge of 12 MYR for purchase 50 Shares of Property Demo_property1', 12.00, 0.00, '2015-02-17 14:23:25', 50, 12),
(112, 2, 'Buy', '0000-00-00 00:00:00', 227, 'Transaction Charge of 2.4 MYR for purchase 10 Shares of Property Demo_property1', 2.40, 0.00, '2015-02-17 14:24:24', 10, 12),
(113, 2, 'Buy', '0000-00-00 00:00:00', 230, 'Transaction Charge of 12 MYR for purchase 50 Shares of Property Demo_property1', 12.00, 0.00, '2015-02-17 14:25:58', 50, 12),
(114, 2, 'Buy', '0000-00-00 00:00:00', 233, 'Transaction Charge of 12 MYR for purchase 50 Shares of Property Demo_property1', 12.00, 0.00, '2015-02-17 14:29:04', 50, 12),
(115, 17, 'Buy', '0000-00-00 00:00:00', 236, 'Transaction Charge of 48 MYR for purchase 100 Shares of Property Demo_property1', 48.00, 0.00, '2015-02-26 07:10:30', 100, 12),
(116, 17, 'Buy', '0000-00-00 00:00:00', 239, 'Transaction Charge of 160 MYR for purchase 100 Shares of Property demo_property_26/2/2015', 160.00, 0.00, '2015-02-26 10:32:53', 100, 17),
(117, 20, 'Buy', '0000-00-00 00:00:00', 242, 'Transaction Charge of 400 MYR for purchase 50 Shares of Property demo_property_4/3/2015', 400.00, 0.00, '2015-03-04 09:22:40', 50, 18),
(118, 17, 'Buy', '0000-00-00 00:00:00', 243, 'Transaction Charge of 200 MYR for purchase 50 Shares of Property demo_property_4/3/2015', 200.00, 0.00, '2015-03-04 09:23:04', 50, 18),
(119, 2, 'Buy', '0000-00-00 00:00:00', 244, 'Transaction Charge of 260 MYR for purchase 20 Shares of Property Demo property2', 260.00, 0.00, '2015-03-04 09:34:23', 20, 13),
(120, 2, 'Buy', '0000-00-00 00:00:00', 247, 'Transaction Charge of 200 MYR for purchase 50 Shares of Property test_prop_04_03_15', 200.00, 0.00, '2015-03-04 09:38:01', 50, 19),
(121, 3, 'Buy', '0000-00-00 00:00:00', 248, 'Transaction Charge of 400 MYR for purchase 50 Shares of Property test_prop_04_03_15', 400.00, 0.00, '2015-03-04 09:38:31', 50, 19),
(122, 3, 'Buy', '0000-00-00 00:00:00', 250, 'Transaction Charge of 20 MYR for purchase 100 Shares of Property test_prop2_04_03_15', 20.00, 0.00, '2015-03-04 10:20:15', 100, 20),
(123, 3, 'Buy', '0000-00-00 00:00:00', 251, 'Transaction Charge of 20 MYR for purchase 100 Shares of Property test_prop2_04_03_15', 20.00, 0.00, '2015-03-04 10:39:39', 100, 20),
(124, 3, 'Buy', '0000-00-00 00:00:00', 254, 'Transaction Charge of 20 MYR for purchase 100 Shares of Property test_prop2_04_03_15', 20.00, 0.00, '2015-03-04 10:52:46', 100, 20),
(125, 17, 'Buy', '0000-00-00 00:00:00', 257, 'Transaction Charge of 320 MYR for purchase 80 Shares of Property test_prop_09_03_15', 320.00, 0.00, '2015-03-09 08:29:07', 80, 21),
(126, 16, 'Buy', '0000-00-00 00:00:00', 258, 'Transaction Charge of 40 MYR for purchase 20 Shares of Property test_prop_09_03_15', 40.00, 0.00, '2015-03-09 08:34:23', 20, 21),
(127, 17, 'Buy', '0000-00-00 00:00:00', 259, 'Transaction Charge of 80 MYR for purchase 20 Shares of Property test_prop_09_03_15', 80.00, 0.00, '2015-03-09 10:51:27', 20, 21),
(128, 17, 'Buy', '0000-00-00 00:00:00', 262, 'Transaction Charge of 80 MYR for purchase 20 Shares of Property test_prop_09_03_15', 80.00, 0.00, '2015-03-09 10:52:58', 20, 21),
(129, 17, 'Buy', '0000-00-00 00:00:00', 265, 'Transaction Charge of 4 MYR for purchase 1 Shares of Property test_prop_09_03_15', 4.00, 0.00, '2015-03-09 10:53:14', 1, 21),
(130, 17, 'Buy', '0000-00-00 00:00:00', 268, 'Transaction Charge of 593.52 MYR for purchase 1 Shares of Property M Residence Canal Link', 593.52, 0.00, '2015-03-09 10:57:51', 1, 5),
(131, 17, 'Buy', '0000-00-00 00:00:00', 269, 'Transaction Charge of 593.52 MYR for purchase 1 Shares of Property M Residence Canal Link', 593.52, 0.00, '2015-03-09 10:58:06', 1, 5),
(132, 17, 'Buy', '0000-00-00 00:00:00', 270, 'Transaction Charge of 80 MYR for purchase 10 Shares of Property test_prop2_09_03_15', 80.00, 0.00, '2015-03-09 11:03:41', 10, 22),
(133, 10, 'Buy', '0000-00-00 00:00:00', 271, 'Transaction Charge of 120 MYR for purchase 30 Shares of Property test_prop2_09_03_15', 120.00, 0.00, '2015-03-11 06:32:03', 30, 22),
(134, 10, 'Buy', '0000-00-00 00:00:00', 272, 'Transaction Charge of 120 MYR for purchase 30 Shares of Property test_prop2_09_03_15', 120.00, 0.00, '2015-03-11 06:33:19', 30, 22),
(135, 10, 'Refund', '0000-00-00 00:00:00', 0, 'Refund by Admin for Property test_prop2_09_03_15, Total Share 60.00 of amt 240 MYR', 0.00, 240.00, '2015-03-11 06:33:51', 60, 22),
(136, 17, 'Refund', '0000-00-00 00:00:00', 0, 'Refund by Admin for Property test_prop2_09_03_15, Total Share 10.00 of amt 80 MYR', 0.00, 80.00, '2015-03-11 06:33:51', 10, 22);

-- --------------------------------------------------------

--
-- Table structure for table `user_credit`
--

CREATE TABLE IF NOT EXISTS `user_credit` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `credit` float(11,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user_credit`
--

INSERT INTO `user_credit` (`id`, `user_id`, `username`, `credit`) VALUES
(1, 2, 'jone', 81.02),
(2, 3, 'test', 2328.10),
(3, 7, 'roger', 600.25),
(4, 8, 'joman', 297.80),
(5, 9, 'shawn', 613.80),
(6, 16, 'kelvincr7', 495.40),
(7, 17, 'kelvin_cr7', 174866.95),
(8, 10, 'chon9', 6213.96),
(9, 20, 'chon911', 460.00);

-- --------------------------------------------------------

--
-- Table structure for table `user_fund_log`
--

CREATE TABLE IF NOT EXISTS `user_fund_log` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fund_type` varchar(25) NOT NULL COMMENT 'Deposit, Withdraw, OTransaction, ProfitandLoss',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `detail` text NOT NULL,
  `debit` float(15,2) NOT NULL,
  `credit` float(15,2) NOT NULL,
  `property_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=292 ;

--
-- Dumping data for table `user_fund_log`
--

INSERT INTO `user_fund_log` (`id`, `user_id`, `fund_type`, `date`, `detail`, `debit`, `credit`, `property_id`) VALUES
(1, 2, 'Deposit', '2014-12-31 12:44:31', 'Deposit via Paypal', 50000.00, 0.00, NULL),
(2, 2, 'Buy', '2014-12-31 12:51:49', 'Buy1% Shares for  Property2', 0.00, 102.00, 2),
(3, 2, 'Deposit', '2014-12-31 13:10:43', 'Transaction Pending via Bank', 0.00, 0.00, NULL),
(4, 2, 'Deposit', '2014-12-31 13:24:40', 'Transaction Approved by the admin with Bank ', 120.00, 0.00, NULL),
(5, 2, 'withdraw', '2014-12-31 13:26:08', 'pending', 0.00, 0.00, 0),
(6, 2, 'withdraw', '2014-12-31 13:26:16', 'pending', 0.00, 0.00, 0),
(7, 2, 'withdraw', '2014-12-31 13:26:24', 'pending', 0.00, 0.00, 0),
(8, 2, 'Withdraw', '2014-12-31 13:33:00', 'Withdraw approved by admin with cash', 0.00, 120.00, NULL),
(9, 3, 'Deposit', '2014-12-31 14:40:12', 'Deposit via Paypal', 50000.00, 0.00, NULL),
(10, 3, 'withdraw', '2014-12-31 14:50:04', 'pending', 0.00, 0.00, 0),
(11, 3, 'Withdraw', '2014-12-31 15:01:39', 'Withdraw approved by admin with cash', 0.00, 1000.00, NULL),
(12, 2, 'withdraw', '2015-01-02 06:18:52', 'Withdraw 200 cancelled by admin', 0.00, 0.00, NULL),
(13, 2, 'Withdraw', '2015-01-02 06:38:35', 'Withdraw approved by admin with cash', 0.00, 142.00, NULL),
(14, 2, 'withdraw', '2015-01-02 06:42:03', 'pending', 0.00, 0.00, 0),
(15, 2, 'Deposit', '2015-01-02 07:05:57', 'Deposit via Paypal', 120.00, 0.00, NULL),
(16, 2, 'Deposit', '2015-01-02 07:09:23', 'Transaction Pending via Bank', 0.00, 0.00, NULL),
(17, 2, 'Deposit', '2015-01-02 07:17:13', 'Transaction Approved by the admin with Bank ', 200.00, 0.00, NULL),
(18, 2, 'withdraw', '2015-01-02 07:25:39', 'pending', 0.00, 0.00, 0),
(19, 2, 'withdraw', '2015-01-02 09:06:04', 'pending', 0.00, 0.00, 0),
(21, 3, 'withdraw', '2015-01-02 13:24:35', 'Pending, Waiting for Admin Approval for Amt. 1000 MYR', 0.00, 0.00, 0),
(22, 3, 'Withdraw', '2015-01-02 13:25:14', 'Withdraw approved by admin with cash', 0.00, 1000.00, NULL),
(23, 3, 'Buy', '2015-01-02 14:11:23', 'Buy10% Shares for  Property1', 0.00, 1144.00, 1),
(24, 2, 'Buy', '2015-01-02 14:27:49', 'Buy15% Shares for  Property1', 0.00, 1683.00, 1),
(25, 3, 'Buy', '2015-01-02 15:05:49', 'Buy75% Shares for  Property1', 0.00, 8580.00, 1),
(26, 1, 'ProfitandLoss', '2015-01-02 15:32:07', 'Rent', 1000.00, 0.00, 1),
(27, 1, 'ProfitandLoss', '2015-01-02 15:32:27', 'Maintenance', 0.00, 500.00, 1),
(28, 2, 'Buy', '2015-01-02 16:02:14', 'Buy 5% Shares for Property Property1', 0.00, 561.00, 1),
(29, 3, 'Sell', '2015-01-02 16:02:14', 'Sold 5 Shares of Property Property1', 550.00, 0.00, 1),
(30, 3, 'Profit', '2015-01-02 16:02:14', 'pending property profit on Property1 of amount 25 MYR', 0.00, 0.00, 1),
(31, 3, 'Deposit', '2015-01-02 16:08:58', 'Approved Profit amount of 25.00 MYR by Admin Approved By Cash', 25.00, 0.00, 1),
(32, 7, 'Deposit', '2015-01-12 12:47:56', 'Transaction Pending via Bank', 0.00, 0.00, NULL),
(33, 7, 'Deposit', '2015-01-12 12:52:16', 'Transaction Approved by the admin with Bank ', 5000.00, 0.00, NULL),
(34, 7, 'withdraw', '2015-01-12 13:17:39', 'Pending, Waiting for Admin Approval for Amt. 100 MYR', 0.00, 0.00, 0),
(35, 7, 'Withdraw', '2015-01-12 13:26:41', 'Withdraw approved by admin with cash', 0.00, 100.00, NULL),
(36, 8, 'Deposit', '2015-01-13 10:23:08', 'Deposited By Admin', 5000.00, 0.00, NULL),
(37, 9, 'Deposit', '2015-01-13 10:24:47', 'Deposited By Admin', 5000.00, 0.00, NULL),
(38, 9, 'Deposit', '2015-01-13 10:25:32', 'Deposited By Admin', 0.00, 100.00, NULL),
(39, 7, 'Buy', '2015-01-13 10:34:52', 'Buy35% Shares for  Sandy''s House', 0.00, 3640.00, 3),
(40, 9, 'Buy', '2015-01-13 10:35:34', 'Buy35% Shares for  Sandy''s House', 0.00, 3570.00, 3),
(41, 8, 'Buy', '2015-01-13 10:36:13', 'Buy30% Shares for  Sandy''s House', 0.00, 3060.00, 3),
(42, 1, 'ProfitandLoss', '2015-01-13 12:16:52', 'rent', 2000.00, 0.00, 3),
(43, 1, 'ProfitandLoss', '2015-01-13 12:17:17', 'Maintenance', 0.00, 450.00, 3),
(44, 9, 'Buy', '2015-01-13 12:27:28', 'Buy 5% Shares for Property Sandy''s House', 0.00, 612.00, 3),
(45, 7, 'Sell', '2015-01-13 12:27:28', 'Sold 2 Shares of Property Sandy''s House', 240.00, 0.00, 3),
(46, 7, 'Profit', '2015-01-13 12:27:28', 'Property profit on Sandy''s House of amount 31 MYR for selling 2 shares', 31.00, 0.00, 3),
(47, 8, 'Sell', '2015-01-13 12:27:28', 'Sold 3 Shares of Property Sandy''s House', 360.00, 0.00, 3),
(48, 8, 'Profit', '2015-01-13 12:27:28', 'Property profit on Sandy''s House of amount 46.5 MYR for selling 3 shares', 46.50, 0.00, 3),
(49, 7, 'Final', '2015-01-13 13:53:23', 'Deposit by Admin for Property Sandy''s House, Total Share 33 of amt 3960 MYR and Profit/Loss of 511.5 MYR', 4471.50, 0.00, 3),
(50, 8, 'Final', '2015-01-13 13:53:23', 'Deposit by Admin for Property Sandy''s House, Total Share 27 of amt 3240 MYR and Profit/Loss of 418.5 MYR', 3658.50, 0.00, 3),
(51, 9, 'Final', '2015-01-13 13:53:23', 'Deposit by Admin for Property Sandy''s House, Total Share 40 of amt 4800 MYR and Profit/Loss of 620 MYR', 5420.00, 0.00, 3),
(52, 10, 'Deposit', '2015-01-19 07:48:47', 'Transaction Pending via Cheque', 0.00, 0.00, NULL),
(53, 16, 'Deposit', '2015-01-19 07:52:20', 'Transaction Pending via Bank', 0.00, 0.00, NULL),
(54, 16, 'Deposit', '2015-01-19 07:53:06', 'Transaction Approved by the admin with Bank ', 5000.00, 0.00, NULL),
(55, 16, 'Buy', '2015-01-19 07:54:51', 'Buy49% Shares for  Property2', 0.00, 4998.00, 2),
(56, 16, 'withdraw', '2015-01-19 08:00:05', 'Pending, Waiting for Admin Approval for Amt. 2 MYR', 0.00, 0.00, 0),
(57, 16, 'Withdraw', '2015-01-19 08:00:25', 'Approved by admin with cheque ', 0.00, 2.00, NULL),
(58, 17, 'Deposit', '2015-01-19 08:24:03', 'Transaction Pending via Cheque', 0.00, 0.00, NULL),
(59, 17, 'Deposit', '2015-01-19 08:25:00', 'Transaction Approved by the admin with Cheque 123123', 10000.00, 0.00, NULL),
(60, 17, 'Buy', '2015-01-19 08:25:52', 'Buy 2% Shares for Property Property2', 0.00, 208.00, 2),
(61, 16, 'Sell', '2015-01-19 08:25:52', 'Sold 2 Shares of Property Property2', 200.00, 0.00, 2),
(62, 16, 'Profit', '2015-01-19 08:25:52', 'Property profit on Property2 of amount 0 MYR for selling 2 shares', 0.00, 0.00, 2),
(63, 7, 'Deposit', '2015-01-20 16:33:56', 'Transaction Pending via Bank', 0.00, 0.00, NULL),
(64, 10, 'Deposit', '2015-01-21 06:24:02', 'Transaction Pending via Bank', 0.00, 0.00, NULL),
(65, 10, 'Deposit', '2015-01-21 06:24:59', 'Transaction Approved by the admin with Bank ', 10000.00, 0.00, NULL),
(66, 10, 'Buy', '2015-01-21 06:25:35', 'Buy10% Shares for  Property2', 0.00, 1020.00, 2),
(67, 10, 'Buy', '2015-01-21 06:43:52', 'Buy10% Shares for  AManja', 0.00, 510.00, 4),
(68, 17, 'Buy', '2015-01-21 06:43:54', 'Buy10% Shares for  AManja', 0.00, 520.00, 4),
(69, 10, 'Buy', '2015-01-21 06:43:57', 'Buy10% Shares for  AManja', 0.00, 510.00, 4),
(70, 1, 'ProfitandLoss', '2015-01-21 06:46:50', 'Rental', 1000.00, 0.00, 4),
(71, 17, 'Buy', '2015-01-21 08:20:17', 'Buy70% Shares for  AManja', 0.00, 3640.00, 4),
(72, 2, 'withdraw', '2015-01-21 14:04:47', 'Pending, Waiting for Admin Approval for Amt. 1 MYR', 0.00, 0.00, 0),
(73, 2, 'Deposit', '2015-01-21 14:16:55', 'Transaction Pending via Cheque', 0.00, 0.00, NULL),
(74, 2, 'Buy', '2015-01-21 15:14:25', 'Buy3% Shares for  Property2', 0.00, 306.00, 2),
(75, 2, 'Final', '2015-01-21 15:27:20', 'Refund by Admin for Property Property2, Total Share 4 of amt 400 MYR and Transaction Charge of 8 MYR', 408.00, 0.00, 2),
(76, 10, 'Final', '2015-01-21 15:27:21', 'Refund by Admin for Property Property2, Total Share 10 of amt 1000 MYR and Transaction Charge of 20 MYR', 1020.00, 0.00, 2),
(77, 16, 'Final', '2015-01-21 15:27:21', 'Refund by Admin for Property Property2, Total Share 47 of amt 4700 MYR and Transaction Charge of 94 MYR', 4794.00, 0.00, 2),
(78, 17, 'Final', '2015-01-21 15:27:21', 'Refund by Admin for Property Property2, Total Share 2 of amt 200 MYR and Transaction Charge of 8 MYR', 208.00, 0.00, 2),
(79, 10, 'Final', '2015-01-22 09:41:39', 'Deposit by Admin for Property AManja, Total Share 20 of amt 2000 MYR and Profit/Loss of 200 MYR', 2200.00, 0.00, 4),
(80, 17, 'Final', '2015-01-22 09:41:40', 'Deposit by Admin for Property AManja, Total Share 80 of amt 8000 MYR and Profit/Loss of 800 MYR', 8800.00, 0.00, 4),
(81, 17, 'Buy', '2015-01-27 08:22:09', 'Buy0.1% Shares for  M Residence Canal Link', 0.00, 1543.15, 5),
(82, 17, 'Buy', '2015-01-27 08:22:37', 'Buy0.1% Shares for  The Mansions Desa ParkCity', 0.00, 4992.00, 6),
(83, 10, 'Buy', '2015-01-27 08:29:44', 'Buy0.1% Shares for  The Mansions Desa ParkCity', 0.00, 4896.00, 6),
(84, 10, 'Buy', '2015-01-27 08:30:21', 'Buy0.1% Shares for  The Mansions Desa ParkCity', 0.00, 4896.00, 6),
(85, 10, 'Deposit', '2015-01-27 08:36:58', 'Transaction Pending via Bank', 0.00, 0.00, NULL),
(86, 10, 'Deposit', '2015-01-27 08:48:00', 'Transaction Pending via Bank', 0.00, 0.00, NULL),
(87, 10, 'Deposit', '2015-01-27 08:48:50', 'Transaction Approved by the admin with Bank ', 20000.00, 0.00, NULL),
(88, 10, 'Buy', '2015-01-27 08:50:07', 'Buy 0.1234566555656565454545453434343434343434343434343434343% Shares for  M Residence Canal Link', 0.00, 1868.49, 5),
(89, 10, 'Buy', '2015-01-27 09:19:14', 'Buy 1.132323232323232323232323232323232323232323232323232323232323232323232323232323232323232323% Shares for  M Residence Canal Link', 0.00, 17137.44, 5),
(90, 8, 'Buy', '2015-01-27 09:26:58', 'Buy 0.10% Shares for  M Residence Canal Link', 0.00, 1513.48, 5),
(91, 8, 'Buy', '2015-01-27 15:09:17', 'Buy 0.1% Shares for  M Residence Canal Link', 0.00, 1513.48, 5),
(92, 10, 'Buy', '2015-01-27 15:52:59', 'Buy 0.1% Shares for  M Residence Canal Link', 0.00, 1513.48, 5),
(93, 10, 'Buy', '2015-02-04 08:13:36', 'Buy 0.1% Shares for  Boulevard Residence, Kayu Ara', 0.00, 642.60, 7),
(94, 17, 'Buy', '2015-02-05 08:25:26', 'Buy 0.1% Shares for  Boulevard Residence, Kayu Ara', 0.00, 655.20, 7),
(95, 17, 'Deposit', '2015-02-05 11:29:39', 'Transaction Pending via Bank', 0.00, 0.00, NULL),
(96, 17, 'Deposit', '2015-02-05 11:30:08', 'Transaction Approved by the admin with Bank ', 1000000.00, 0.00, NULL),
(97, 17, 'Buy', '2015-02-05 11:38:18', 'Buy 0.1% Shares for  2-sty Terrace Sunway SPK', 0.00, 1560.00, 8),
(98, 17, 'Deposit', '2015-02-05 11:39:31', 'Transaction Pending via Bank', 0.00, 0.00, NULL),
(99, 17, 'Deposit', '2015-02-05 11:39:43', 'Transaction Approved by the admin with Bank ', 1000000.00, 0.00, NULL),
(100, 17, 'Buy', '2015-02-06 09:04:07', 'Buy 0.1% Shares for  Savanna Executive Suites', 0.00, 382.72, 9),
(101, 17, 'Buy', '2015-02-06 09:09:03', 'Buy 99% Shares for  Savanna Executive Suites', 0.00, 378892.81, 9),
(102, 17, 'Buy', '2015-02-06 09:09:42', 'Buy 0.9% Shares for  Savanna Executive Suites', 0.00, 3444.48, 9),
(103, 10, 'Deposit', '2015-02-06 10:13:29', 'Transaction Pending via Bank', 0.00, 0.00, NULL),
(104, 10, 'Deposit', '2015-02-06 10:13:50', 'Transaction Approved by the admin with Bank ', 100000.00, 0.00, NULL),
(105, 10, 'Buy', '2015-02-06 10:21:14', 'Buy 0.5% Shares for Property Savanna Executive Suites', 0.00, 1876.80, 9),
(106, 17, 'Sell', '2015-02-06 10:21:14', 'Sold 0.5 Shares of Property Savanna Executive Suites', 1840.00, 0.00, 9),
(107, 17, 'Profit', '2015-02-06 10:21:15', 'Property profit on Savanna Executive Suites of amount 0 MYR for selling 0.5 shares', 0.00, 0.00, 9),
(108, 10, 'Buy', '2015-02-06 10:35:37', 'Buy 0.5% Shares for Property Savanna Executive Suites', 0.00, 2142.00, 9),
(109, 17, 'Sell', '2015-02-06 10:35:37', 'Sold 0.5 Shares of Property Savanna Executive Suites', 2100.00, 0.00, 9),
(110, 17, 'Profit', '2015-02-06 10:35:37', 'Property profit on Savanna Executive Suites of amount 0 MYR for selling 0.5 shares', 0.00, 0.00, 9),
(111, 10, 'Buy', '2015-02-06 10:41:36', 'Buy 0.5% Shares for Property Savanna Executive Suites', 0.00, 0.05, 9),
(112, 17, 'Sell', '2015-02-06 10:41:36', 'Sold 0.5 Shares of Property Savanna Executive Suites', 0.05, 0.00, 9),
(113, 17, 'Profit', '2015-02-06 10:41:36', 'Property profit on Savanna Executive Suites of amount 0 MYR for selling 0.5 shares', 0.00, 0.00, 9),
(114, 2, 'Buy', '2015-02-06 11:54:10', 'Buy 1% Shares for Property Property1', 0.00, 122.40, 1),
(115, 2, 'Sell', '2015-02-06 11:54:10', 'Sold 1 Shares of Property Property1', 120.00, 0.00, 1),
(116, 2, 'Profit', '2015-02-06 11:54:10', 'Property profit on Property1 of amount 5 MYR for selling 1 shares', 5.00, 0.00, 1),
(117, 2, 'Buy', '2015-02-06 12:38:54', 'Buy 1% Shares for  Boulevard Residence, Kayu Ara', 0.00, 6630.00, 7),
(118, 2, 'Buy', '2015-02-06 13:36:53', 'Buy 1% Shares for  2-sty Terrace Sunway SPK', 0.00, 15300.00, 8),
(119, 2, 'Buy', '2015-02-06 13:37:07', 'Buy 1% Shares for  2-sty Terrace Sunway SPK', 0.00, 15300.00, 8),
(120, 2, 'Buy', '2015-02-06 14:08:45', 'Buy 1% Shares for  2-sty Terrace Sunway SPK', 0.00, 15300.00, 8),
(121, 2, 'Buy', '2015-02-06 14:28:21', 'Buy 1% Shares for  Boulevard Residence, Kayu Ara', 0.00, 6630.51, 7),
(122, 2, 'Buy', '2015-02-06 14:55:27', 'Buy 0.1% Shares for  Boulevard Residence, Kayu Ara', 0.00, 663.00, 7),
(123, 2, 'Buy', '2015-02-06 14:59:01', 'Buy 0.1% Shares for  Boulevard Residence, Kayu Ara', 0.00, 683.40, 7),
(124, 2, 'Buy', '2015-02-06 15:51:08', 'Buy 0.1% Shares for  2-sty Terrace Sunway SPK', 0.00, 1734.00, 8),
(125, 2, 'Buy', '2015-02-07 06:37:24', 'Buy 0.1% Shares for Property Savanna Executive Suites', 0.00, 438.60, 9),
(126, 10, 'Sell', '2015-02-07 06:37:24', 'Sold 0.1 Shares of Property Savanna Executive Suites', 430.00, 0.00, 9),
(127, 10, 'Profit', '2015-02-07 06:37:24', 'Property profit on Savanna Executive Suites of amount 0 MYR for selling 0.1 shares', 0.00, 0.00, 9),
(128, 2, 'Buy', '2015-02-07 06:39:13', 'Buy 0.1% Shares for Property Savanna Executive Suites', 0.00, 428.40, 9),
(129, 10, 'Sell', '2015-02-07 06:39:13', 'Sold 0.1 Shares of Property Savanna Executive Suites', 420.00, 0.00, 9),
(130, 10, 'Profit', '2015-02-07 06:39:14', 'Property profit on Savanna Executive Suites of amount 0 MYR for selling 0.1 shares', 0.00, 0.00, 9),
(131, 2, 'Deposit', '2015-02-07 06:45:09', 'Transaction Pending via Bank', 0.00, 0.00, NULL),
(132, 2, 'Deposit', '2015-02-07 06:45:40', 'Transaction Approved by the admin with Bank ', 50000.00, 0.00, NULL),
(133, 2, 'Buy', '2015-02-07 06:58:50', 'Buy 0.1% Shares for  Boulevard Residence, Kayu Ara', 0.00, 663.00, 7),
(134, 2, 'Buy', '2015-02-07 07:21:39', 'Buy 0.1% Shares for  Boulevard Residence, Kayu Ara', 0.00, 663.00, 7),
(135, 10, 'Buy', '2015-02-09 08:07:04', 'Buy 0.5% Shares for  Boulevard Residence, Kayu Ara', 0.00, 3315.00, 7),
(136, 10, 'Buy', '2015-02-09 08:09:20', 'Buy 0.5% Shares for  Boulevard Residence, Kayu Ara', 0.00, 3315.00, 7),
(137, 10, 'Buy', '2015-02-09 08:09:53', 'Buy 0.001% Shares for  Boulevard Residence, Kayu Ara', 0.00, 6.63, 7),
(138, 10, 'Buy', '2015-02-09 08:13:44', 'Buy 0.5% Shares for Property Savanna Executive Suites', 0.00, 2142.00, 9),
(139, 17, 'Sell', '2015-02-09 08:13:44', 'Sold 0.5 Shares of Property Savanna Executive Suites', 2100.00, 0.00, 9),
(140, 17, 'Profit', '2015-02-09 08:13:44', 'Property profit on Savanna Executive Suites of amount 0 MYR for selling 0.5 shares', 0.00, 0.00, 9),
(141, 10, 'Buy', '2015-02-09 08:16:00', 'Buy 3% Shares for Property Savanna Executive Suites', 0.00, 12852.00, 9),
(142, 17, 'Sell', '2015-02-09 08:16:00', 'Sold 3.0 Shares of Property Savanna Executive Suites', 12600.00, 0.00, 9),
(143, 17, 'Profit', '2015-02-09 08:16:00', 'Property profit on Savanna Executive Suites of amount 0 MYR for selling 3.0 shares', 0.00, 0.00, 9),
(144, 10, 'Buy', '2015-02-09 08:25:52', 'Buy 0.00000001% Shares for  Raintree Park 1', 0.00, 0.00, 10),
(145, 10, 'Buy', '2015-02-09 08:26:37', 'Buy 0.0001% Shares for  Raintree Park 1', 0.00, 0.48, 10),
(146, 10, 'Buy', '2015-02-09 08:27:25', 'Buy 0.12345678% Shares for  Raintree Park 1', 0.00, 589.33, 10),
(147, 17, 'Buy', '2015-02-09 08:29:12', 'Buy 99.80% Shares for  Raintree Park 1', 0.00, 485746.56, 10),
(148, 10, 'Buy', '2015-02-09 08:31:23', 'Buy 6% Shares for Property Raintree Park 1', 0.00, 28641.60, 10),
(149, 17, 'Sell', '2015-02-09 08:31:23', 'Sold 6 Shares of Property Raintree Park 1', 28080.00, 0.00, 10),
(150, 17, 'Profit', '2015-02-09 08:31:23', 'Property profit on Raintree Park 1 of amount 0 MYR for selling 6 shares', 0.00, 0.00, 10),
(151, 10, 'Buy', '2015-02-09 08:40:04', 'Buy 1% Shares for Property Raintree Park 1', 0.00, 4773.60, 10),
(152, 10, 'Sell', '2015-02-09 08:40:04', 'Sold 1 Shares of Property Raintree Park 1', 4680.00, 0.00, 10),
(153, 10, 'Profit', '2015-02-09 08:40:04', 'Property profit on Raintree Park 1 of amount 0 MYR for selling 1 shares', 0.00, 0.00, 10),
(154, 10, 'Buy', '2015-02-09 08:40:26', 'Buy 1% Shares for Property Raintree Park 1', 0.00, 4773.60, 10),
(155, 17, 'Sell', '2015-02-09 08:40:26', 'Sold 1 Shares of Property Raintree Park 1', 4680.00, 0.00, 10),
(156, 17, 'Profit', '2015-02-09 08:40:26', 'Property profit on Raintree Park 1 of amount 0 MYR for selling 1 shares', 0.00, 0.00, 10),
(157, 2, 'Buy', '2015-02-09 11:50:46', 'Buy 0.3% Shares for  Boulevard Residence, Kayu Ara', 0.00, 1989.00, 7),
(158, 2, 'Buy', '2015-02-09 12:10:11', 'Buy 0.1% Shares for  Boulevard Residence, Kayu Ara', 0.00, 663.00, 7),
(159, 2, 'Buy', '2015-02-09 12:55:10', 'Buy 0.1% Shares for  Boulevard Residence, Kayu Ara', 0.00, 663.00, 7),
(160, 2, 'Buy', '2015-02-09 12:55:13', 'Buy 0.1% Shares for  Boulevard Residence, Kayu Ara', 0.00, 663.00, 7),
(161, 2, 'Buy', '2015-02-09 12:59:00', 'Buy 0.1% Shares for  Boulevard Residence, Kayu Ara', 0.00, 663.00, 7),
(162, 2, 'Buy', '2015-02-09 13:10:46', 'Buy 0.11% Shares for Property Raintree Park 1', 0.00, 525.10, 10),
(163, 17, 'Sell', '2015-02-09 13:10:46', 'Sold 0.01 Shares of Property Raintree Park 1', 46.80, 0.00, 10),
(164, 17, 'Profit', '2015-02-09 13:10:46', 'Property profit on Raintree Park 1 of amount 0 MYR for selling 0.01 shares', 0.00, 0.00, 10),
(165, 10, 'Sell', '2015-02-09 13:10:46', 'Sold 0.1 Shares of Property Raintree Park 1', 468.00, 0.00, 10),
(166, 10, 'Profit', '2015-02-09 13:10:46', 'Property profit on Raintree Park 1 of amount 0 MYR for selling 0.1 shares', 0.00, 0.00, 10),
(167, 2, 'Buy', '2015-02-09 13:47:02', 'Buy 0.1% Shares for  Boulevard Residence, Kayu Ara', 0.00, 663.00, 7),
(168, 2, 'Buy', '2015-02-10 06:02:55', 'Buy 0.1% Shares for  2-sty Terrace Sunway SPK', 0.00, 1734.00, 8),
(169, 2, 'Buy', '2015-02-10 06:05:44', 'Buy 0.1% Shares for  2-sty Terrace Sunway SPK', 0.00, 1734.00, 8),
(170, 2, 'Buy', '2015-02-10 06:14:11', 'Buy 0.1% Shares for  2-sty Terrace Sunway SPK', 0.00, 1734.00, 8),
(171, 2, 'Buy', '2015-02-10 06:14:43', 'Buy 0.1% Shares for  2-sty Terrace Sunway SPK', 0.00, 1734.00, 8),
(172, 2, 'Buy', '2015-02-10 06:15:27', 'Buy 0.1% Shares for  2-sty Terrace Sunway SPK', 0.00, 1734.00, 8),
(173, 2, 'Buy', '2015-02-10 08:13:01', 'Buy 0.1% Shares for  Boulevard Residence, Kayu Ara', 0.00, 663.00, 7),
(174, 17, 'Buy', '2015-02-10 08:21:48', 'Buy 1% Shares for  Sovereign Bay', 0.00, 2288.00, 11),
(175, 17, 'Buy', '2015-02-10 08:21:59', 'Buy 0.1% Shares for  Sovereign Bay', 0.00, 228.80, 11),
(176, 10, 'Buy', '2015-02-10 08:29:44', 'Buy 1% Shares for  Sovereign Bay', 0.00, 2244.00, 11),
(177, 10, 'Buy', '2015-02-10 08:30:53', 'Buy 1% Shares for  Sovereign Bay', 0.00, 2244.00, 11),
(178, 10, 'Buy', '2015-02-10 08:31:10', 'Buy 1% Shares for  Sovereign Bay', 0.00, 2244.00, 11),
(179, 17, 'Buy', '2015-02-10 08:31:55', 'Buy 98.5% Shares for  Sovereign Bay', 0.00, 225368.00, 11),
(180, 2, 'Buy', '2015-02-10 08:50:14', 'Buy 90% Shares for  Demo_property1', 0.00, 1101.60, 12),
(181, 2, 'Buy', '2015-02-10 08:55:38', 'Buy 0.1% Shares for Property Property1', 0.00, 12.24, 1),
(182, 2, 'Sell', '2015-02-10 08:55:38', 'Sold 0.1 Shares of Property Property1', 12.00, 0.00, 1),
(183, 2, 'Profit', '2015-02-10 08:55:38', 'Property profit on Property1 of amount 0.5 MYR for selling 0.1 shares', 0.50, 0.00, 1),
(184, 10, 'Buy', '2015-02-10 10:12:15', 'Buy 10% Shares for  Demo_property1', 0.00, 122.40, 12),
(185, 2, 'Buy', '2015-02-10 11:38:23', 'Buy 10% Shares for  Demo_property1', 0.00, 122.40, 12),
(186, 2, 'Buy', '2015-02-11 06:07:10', 'Buy 45% Shares for  Demo property2', 0.00, 29835.00, 13),
(187, 3, 'Buy', '2015-02-11 06:07:41', 'Buy 55% Shares for  Demo property2', 0.00, 37180.00, 13),
(188, 3, 'Deposit', '2015-02-11 06:36:20', 'Transaction Pending via Bank', 0.00, 0.00, NULL),
(189, 3, 'Deposit', '2015-02-11 06:37:09', 'Transaction Pending via Bank', 0.00, 0.00, NULL),
(190, 3, 'Deposit', '2015-02-11 06:39:38', 'Transaction Approved by the admin with Bank ', 50000.00, 0.00, NULL),
(191, 3, 'Buy', '2015-02-11 06:54:47', 'Buy 45% Shares for Property Demo property2', 0.00, 30420.00, 13),
(192, 2, 'Sell', '2015-02-11 06:54:47', 'Sold 45 Shares of Property Demo property2', 29250.00, 0.00, 13),
(193, 2, 'Profit', '2015-02-11 06:54:47', 'Property profit on Demo property2 of amount 0 MYR for selling 45 shares', 0.00, 0.00, 13),
(194, 10, 'withdraw', '2015-02-11 08:02:55', 'Pending, Waiting for Admin Approval for Amt. 30000 MYR', 0.00, 0.00, 0),
(195, 10, 'Buy', '2015-02-11 08:04:57', 'Buy 5% Shares for  Boulevard Residence, Kayu Ara', 0.00, 33150.00, 7),
(196, 10, 'Withdraw', '2015-02-11 08:05:26', 'Withdraw approved by admin with cash', 0.00, 30000.00, NULL),
(197, 10, 'Deposit', '2015-02-11 08:08:24', 'Transaction Pending via Bank', 0.00, 0.00, NULL),
(198, 10, 'Deposit', '2015-02-11 08:08:46', 'Transaction Approved by the admin with Bank ', 28500.00, 0.00, NULL),
(199, 2, 'withdraw', '2015-02-11 08:12:20', 'Pending, Waiting for Admin Approval for Amt. 15000 MYR', 0.00, 0.00, 0),
(200, 2, 'withdraw', '2015-02-11 08:12:26', 'Pending, Waiting for Admin Approval for Amt. 15000 MYR', 0.00, 0.00, 0),
(201, 10, 'Buy', '2015-02-11 08:12:54', 'Buy 100% Shares for  demo_property3', 0.00, 5100.00, 14),
(202, 3, 'withdraw', '2015-02-11 14:34:14', 'Pending, Waiting for Admin Approval for Amt. 12 MYR', 0.00, 0.00, 0),
(203, 10, 'Buy', '2015-02-16 17:48:06', 'Buy 10% Shares for  Feb17 Test Unit', 0.00, 1020.00, 15),
(204, 10, 'Buy', '2015-02-16 17:48:29', 'Buy 90% Shares for  Feb17 Test Unit', 0.00, 9180.00, 15),
(205, 10, 'Buy', '2015-02-16 17:59:46', 'Buy 20% Shares for Property Feb17 Test Unit', 0.00, 2040.00, 15),
(206, 10, 'Sell', '2015-02-16 17:59:47', 'Sold 20 Shares of Property Feb17 Test Unit', 2000.00, 0.00, 15),
(207, 10, 'Profit', '2015-02-16 17:59:47', 'Property profit on Feb17 Test Unit of amount 0 MYR for selling 20 shares', 0.00, 0.00, 15),
(208, 17, 'Buy', '2015-02-17 08:01:11', 'Buy 50% Shares for  demo_property_17/2/2015', 0.00, 5200.00, 16),
(209, 17, 'Buy', '2015-02-17 08:01:24', 'Buy 50% Shares for  demo_property_17/2/2015', 0.00, 5200.00, 16),
(210, 10, 'Deposit', '2015-02-17 11:29:04', 'Transaction Pending via Bank', 0.00, 0.00, NULL),
(211, 2, 'Buy', '2015-02-17 13:17:36', 'Buy 2% Shares for Property Demo_property1', 0.00, 24.48, 12),
(212, 2, 'Sell', '2015-02-17 13:17:36', 'Sold 2 Shares of Property Demo_property1', 24.00, 0.00, 12),
(213, 2, 'Profit', '2015-02-17 13:17:36', 'Property profit on Demo_property1 of amount 0 MYR for selling 2 shares', 0.00, 0.00, 12),
(214, 2, 'Buy', '2015-02-17 14:06:30', 'Buy 1.1% Shares for  Boulevard Residence, Kayu Ara', 0.00, 7293.00, 7),
(215, 2, 'Buy', '2015-02-17 14:07:36', 'Buy 1.1% Shares for Property Demo_property1', 0.00, 13.46, 12),
(216, 2, 'Sell', '2015-02-17 14:07:36', 'Sold 1.1 Shares of Property Demo_property1', 13.20, 0.00, 12),
(217, 2, 'Profit', '2015-02-17 14:07:37', 'Property profit on Demo_property1 of amount 0 MYR for selling 1.1 shares', 0.00, 0.00, 12),
(218, 2, 'Buy', '2015-02-17 14:07:42', 'Buy 1.1% Shares for Property Demo_property1', 0.00, 13.46, 12),
(219, 2, 'Sell', '2015-02-17 14:07:43', 'Sold 1.1 Shares of Property Demo_property1', 13.20, 0.00, 12),
(220, 2, 'Profit', '2015-02-17 14:07:43', 'Property profit on Demo_property1 of amount 0 MYR for selling 1.1 shares', 0.00, 0.00, 12),
(221, 2, 'Buy', '2015-02-17 14:08:09', 'Buy 25.1% Shares for Property Demo_property1', 0.00, 307.22, 12),
(222, 2, 'Sell', '2015-02-17 14:08:09', 'Sold 25.1 Shares of Property Demo_property1', 301.20, 0.00, 12),
(223, 2, 'Profit', '2015-02-17 14:08:09', 'Property profit on Demo_property1 of amount 0 MYR for selling 25.1 shares', 0.00, 0.00, 12),
(224, 2, 'Buy', '2015-02-17 14:23:25', 'Buy 50% Shares for Property Demo_property1', 0.00, 612.00, 12),
(225, 2, 'Sell', '2015-02-17 14:23:25', 'Sold 50 Shares of Property Demo_property1', 600.00, 0.00, 12),
(226, 2, 'Profit', '2015-02-17 14:23:26', 'Property profit on Demo_property1 of amount 0 MYR for selling 50 shares', 0.00, 0.00, 12),
(227, 2, 'Buy', '2015-02-17 14:24:24', 'Buy 10% Shares for Property Demo_property1', 0.00, 122.40, 12),
(228, 2, 'Sell', '2015-02-17 14:24:24', 'Sold 10 Shares of Property Demo_property1', 120.00, 0.00, 12),
(229, 2, 'Profit', '2015-02-17 14:24:24', 'Property profit on Demo_property1 of amount 0 MYR for selling 10 shares', 0.00, 0.00, 12),
(230, 2, 'Buy', '2015-02-17 14:25:58', 'Buy 50% Shares for Property Demo_property1', 0.00, 612.00, 12),
(231, 2, 'Sell', '2015-02-17 14:25:59', 'Sold 50 Shares of Property Demo_property1', 600.00, 0.00, 12),
(232, 2, 'Profit', '2015-02-17 14:25:59', 'Property profit on Demo_property1 of amount 0 MYR for selling 50 shares', 0.00, 0.00, 12),
(233, 2, 'Buy', '2015-02-17 14:29:04', 'Buy 50% Shares for Property Demo_property1', 0.00, 612.00, 12),
(234, 2, 'Sell', '2015-02-17 14:29:04', 'Sold 50 Shares of Property Demo_property1', 600.00, 0.00, 12),
(235, 2, 'Profit', '2015-02-17 14:29:04', 'Property profit on Demo_property1 of amount 0 MYR for selling 50 shares', 0.00, 0.00, 12),
(236, 17, 'Buy', '2015-02-26 07:10:30', 'Buy 100% Shares for Property Demo_property1', 0.00, 1248.00, 12),
(237, 2, 'Sell', '2015-02-26 07:10:30', 'Sold 100 Shares of Property Demo_property1', 1200.00, 0.00, 12),
(238, 2, 'Profit', '2015-02-26 07:10:30', 'Property profit on Demo_property1 of amount 0 MYR for selling 100 shares', 0.00, 0.00, 12),
(239, 17, 'Buy', '2015-02-26 10:32:53', 'Buy 100% Shares for  demo_property_26/2/2015', 0.00, 4160.00, 17),
(240, 20, 'Deposit', '2015-03-04 09:19:43', 'Transaction Pending via Bank', 0.00, 0.00, NULL),
(241, 20, 'Deposit', '2015-03-04 09:20:10', 'Transaction Approved by the admin with Bank ', 10000.00, 0.00, NULL),
(242, 20, 'Buy', '2015-03-04 09:22:40', 'Buy 50% Shares for  demo_property_4/3/2015', 0.00, 5400.00, 18),
(243, 17, 'Buy', '2015-03-04 09:23:04', 'Buy 50% Shares for  demo_property_4/3/2015', 0.00, 5200.00, 18),
(244, 2, 'Buy', '2015-03-04 09:34:23', 'Buy 20% Shares for Property Demo property2', 0.00, 13260.00, 13),
(245, 3, 'Sell', '2015-03-04 09:34:23', 'Sold 20 Shares of Property Demo property2', 13000.00, 0.00, 13),
(246, 3, 'Profit', '2015-03-04 09:34:23', 'Property profit on Demo property2 of amount 0 MYR for selling 20 shares', 0.00, 0.00, 13),
(247, 2, 'Buy', '2015-03-04 09:38:01', 'Buy 50% Shares for  test_prop_04_03_15', 0.00, 10200.00, 19),
(248, 3, 'Buy', '2015-03-04 09:38:31', 'Buy 50% Shares for  test_prop_04_03_15', 0.00, 10400.00, 19),
(249, 17, 'Deposit', '2015-03-04 09:59:15', 'Transaction Pending via Bank', 0.00, 0.00, NULL),
(250, 3, 'Buy', '2015-03-04 10:20:15', 'Buy 100% Shares for  test_prop2_04_03_15', 0.00, 520.00, 20),
(251, 3, 'Buy', '2015-03-04 10:39:39', 'Buy 100% Shares for Property test_prop2_04_03_15', 0.00, 520.00, 20),
(252, 3, 'Sell', '2015-03-04 10:39:39', 'Sold 100 Shares of Property test_prop2_04_03_15', 500.00, 0.00, 20),
(253, 3, 'Profit', '2015-03-04 10:39:39', 'Property profit on test_prop2_04_03_15 of amount 0 MYR for selling 100 shares', 0.00, 0.00, 20),
(254, 3, 'Buy', '2015-03-04 10:52:46', 'Buy 100% Shares for Property test_prop2_04_03_15', 0.00, 520.00, 20),
(255, 3, 'Sell', '2015-03-04 10:52:46', 'Sold 100 Shares of Property test_prop2_04_03_15', 500.00, 0.00, 20),
(256, 3, 'Profit', '2015-03-04 10:52:46', 'Property profit on test_prop2_04_03_15 of amount 0 MYR for selling 100 shares', 0.00, 0.00, 20),
(257, 17, 'Buy', '2015-03-09 08:29:07', 'Buy 80% Shares for  test_prop_09_03_15', 0.00, 8320.00, 21),
(258, 16, 'Buy', '2015-03-09 08:34:23', 'Buy 20% Shares for  test_prop_09_03_15', 0.00, 2040.00, 21),
(259, 17, 'Buy', '2015-03-09 10:51:27', 'Buy 20% Shares for Property test_prop_09_03_15', 0.00, 2080.00, 21),
(260, 16, 'Sell', '2015-03-09 10:51:27', 'Sold 20 Shares of Property test_prop_09_03_15', 2000.00, 0.00, 21),
(261, 16, 'Profit', '2015-03-09 10:51:27', 'Property profit on test_prop_09_03_15 of amount 0 MYR for selling 20 shares', 0.00, 0.00, 21),
(262, 17, 'Buy', '2015-03-09 10:52:58', 'Buy 20% Shares for Property test_prop_09_03_15', 0.00, 2080.00, 21),
(263, 17, 'Sell', '2015-03-09 10:52:58', 'Sold 20 Shares of Property test_prop_09_03_15', 2000.00, 0.00, 21),
(264, 17, 'Profit', '2015-03-09 10:52:58', 'Property profit on test_prop_09_03_15 of amount 0 MYR for selling 20 shares', 0.00, 0.00, 21),
(265, 17, 'Buy', '2015-03-09 10:53:14', 'Buy 1% Shares for Property test_prop_09_03_15', 0.00, 104.00, 21),
(266, 17, 'Sell', '2015-03-09 10:53:14', 'Sold 1 Shares of Property test_prop_09_03_15', 100.00, 0.00, 21),
(267, 17, 'Profit', '2015-03-09 10:53:14', 'Property profit on test_prop_09_03_15 of amount 0 MYR for selling 1 shares', 0.00, 0.00, 21),
(268, 17, 'Buy', '2015-03-09 10:57:51', 'Buy 1% Shares for  M Residence Canal Link', 0.00, 15431.52, 5),
(269, 17, 'Buy', '2015-03-09 10:58:06', 'Buy 1% Shares for  M Residence Canal Link', 0.00, 15431.52, 5),
(270, 17, 'Buy', '2015-03-09 11:03:41', 'Buy 10% Shares for  test_prop2_09_03_15', 0.00, 2080.00, 22),
(271, 10, 'Buy', '2015-03-11 06:32:03', 'Buy 30% Shares for  test_prop2_09_03_15', 0.00, 6120.00, 22),
(272, 10, 'Buy', '2015-03-11 06:33:19', 'Buy 30% Shares for  test_prop2_09_03_15', 0.00, 6120.00, 22),
(273, 10, 'Final', '2015-03-11 06:33:50', 'Refund by Admin for Property test_prop2_09_03_15, Total Share 60.00 of amt 12000 MYR and Transaction Charge of 240 MYR', 12240.00, 0.00, 22),
(274, 17, 'Final', '2015-03-11 06:33:51', 'Refund by Admin for Property test_prop2_09_03_15, Total Share 10.00 of amt 2000 MYR and Transaction Charge of 80 MYR', 2080.00, 0.00, 22),
(275, 2, 'Final', '2015-03-11 08:05:51', 'Deposit by Admin for Property Raintree Park 1, Total Share 0.11 of amt 514.8 MYR and Profit/Loss of 0 MYR', 514.80, 0.00, 10),
(276, 10, 'Final', '2015-03-11 08:05:51', 'Deposit by Admin for Property Raintree Park 1, Total Share 7.02 of amt 32853.6 MYR and Profit/Loss of 0 MYR', 32853.60, 0.00, 10),
(277, 17, 'Final', '2015-03-11 08:05:51', 'Deposit by Admin for Property Raintree Park 1, Total Share 92.79 of amt 434257.2 MYR and Profit/Loss of 0 MYR', 434257.19, 0.00, 10),
(278, 1, 'ProfitandLoss', '2015-03-11 08:06:23', 'Rental Jan 2015', 1000.00, 0.00, 9),
(279, 1, 'ProfitandLoss', '2015-03-11 08:07:18', 'Management Jan 2015', 0.00, 500.00, 9),
(280, 10, 'Final', '2015-03-11 08:10:49', 'Deposit by Admin for Property Savanna Executive Suites, Total Share 3.50 of amt 14700 MYR and Profit/Loss of 17.5 MYR', 14717.50, 0.00, 9),
(281, 17, 'Final', '2015-03-11 08:10:49', 'Deposit by Admin for Property Savanna Executive Suites, Total Share 96.50 of amt 405300 MYR and Profit/Loss of 482.5 MYR', 405782.50, 0.00, 9),
(282, 1, 'ProfitandLoss', '2015-03-11 08:11:13', 'Maintenance', 0.00, 400.00, 9),
(283, 1, 'ProfitandLoss', '2015-03-11 08:29:47', 'rental', 1000.00, 0.00, 9),
(287, 10, 'Deposit', '2015-03-11 08:44:56', 'Transaction Approved by the admin with Bank ', 12.00, 0.00, NULL),
(288, 17, 'Deposit', '2015-03-11 08:44:56', 'Transaction Approved by the admin with Bank ', 10000.00, 0.00, NULL),
(289, 3, 'withdraw', '2015-03-11 09:30:02', 'Withdraw 12 cancelled by admin', 0.00, 0.00, NULL),
(290, 3, 'withdraw', '2015-03-11 09:33:35', 'Pending, Waiting for Admin Approval for Amt. 10 MYR', 0.00, 0.00, 0),
(291, 3, 'Withdraw', '2015-03-11 10:07:06', 'Withdraw approved by admin with cash', 0.00, 10.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_payment_credit`
--

CREATE TABLE IF NOT EXISTS `user_payment_credit` (
`id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `transaction_status` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `edit_by_admin` varchar(50) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `user_payment_credit`
--

INSERT INTO `user_payment_credit` (`id`, `user_id`, `credit`, `username`, `transaction_id`, `transaction_status`, `amount`, `edit_by_admin`) VALUES
(1, '2', '0', 'jone', '87441758HV883642V', 'Completed', '50000.00', 'no'),
(2, '2', '120', 'jone', '', 'Completed', '120', 'no'),
(3, '3', '0', 'test', '9RN86900CH615280T', 'Completed', '50000.00', 'no'),
(4, '2', '0', 'jone', '8Y496431EG381791W', 'Completed', '120.00', 'no'),
(5, '2', '200', 'jone', '', 'Completed', '200', 'no'),
(6, '7', '5000', 'roger', '', 'Completed', '5000', 'no'),
(7, '16', '5000', 'kelvincr7', '', 'Completed', '5000', 'no'),
(8, '17', '10000', 'kelvin_cr7', '', 'Completed', '10000', 'no'),
(9, '10', '10000', 'chon9', '', 'Completed', '10000', 'no'),
(10, '10', '20000', 'chon9', '', 'Completed', '20000', 'no'),
(11, '17', '1000000', 'kelvin_cr7', '', 'Completed', '1000000', 'no'),
(12, '17', '1000000', 'kelvin_cr7', '', 'Completed', '1000000', 'no'),
(13, '10', '100000', 'chon9', '', 'Completed', '100000', 'no'),
(14, '2', '50000', 'jone', '', 'Completed', '50000', 'no'),
(15, '3', '50000', 'test', '', 'Completed', '50000', 'no'),
(16, '10', '28500', 'chon9', '', 'Completed', '28500', 'no'),
(17, '20', '10000', 'chon911', '', 'Completed', '10000', 'no'),
(18, '10', '12', 'chon9', '', 'Completed', '12', 'no'),
(19, '17', '10000', 'kelvin_cr7', '', 'Completed', '10000', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `user_property`
--

CREATE TABLE IF NOT EXISTS `user_property` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `property_share_in_per` float(20,2) NOT NULL COMMENT 'Buy shares',
  `sell_property_share` float(20,2) NOT NULL,
  `sold_property_share` float(20,2) NOT NULL COMMENT 'if sold then deduct from buy shares',
  `share_fund_release` float NOT NULL DEFAULT '0',
  `profit` float NOT NULL,
  `loss` float NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Dumping data for table `user_property`
--

INSERT INTO `user_property` (`id`, `user_id`, `property_id`, `property_share_in_per`, `sell_property_share`, `sold_property_share`, `share_fund_release`, `profit`, `loss`, `modified`) VALUES
(1, 1, 1, 0.00, 0.00, 0.00, 0, 0, 0, '2014-12-31 12:04:50'),
(2, 2, 2, 0.00, 0.00, 0.00, 4, 0, 0, '2015-01-21 15:27:20'),
(3, 3, 1, 80.00, 0.00, 5.00, 0, 0, 0, '2015-01-02 16:02:14'),
(4, 1, 0, 0.00, 0.00, 0.00, 0, 0, 0, '2015-01-02 07:50:13'),
(5, 1, 0, 0.00, 0.00, 0.00, 0, 0, 0, '2015-01-02 07:50:20'),
(6, 1, 0, 0.00, 0.00, 0.00, 0, 0, 0, '2015-01-02 07:50:20'),
(7, 1, 0, 0.00, 0.00, 0.00, 0, 0, 0, '2015-01-02 07:50:20'),
(8, 1, 0, 0.00, 0.00, 0.00, 0, 0, 0, '2015-01-02 07:50:20'),
(9, 1, 0, 0.00, 0.00, 0.00, 0, 0, 0, '2015-01-02 07:50:20'),
(10, 2, 1, 18.60, 1.40, 1.10, 0, 0, 0, '2015-02-10 08:55:38'),
(11, 1, 0, 0.00, 0.00, 0.00, 0, 0, 0, '2015-01-02 15:12:46'),
(12, 1, 0, 0.00, 0.00, 0.00, 0, 0, 0, '2015-01-02 15:13:29'),
(13, 3, 26, 0.00, 0.00, 0.00, 0, 0, 0, '2015-01-02 16:25:53'),
(14, 3, 26, 0.00, 0.00, 0.00, 0, 0, 0, '2015-01-02 16:26:19'),
(15, 3, 2, 0.00, 0.00, 0.00, 0, 0, 0, '2015-01-03 06:54:11'),
(16, 1, 2, 0.00, 0.00, 0.00, 0, 0, 0, '2015-01-03 11:07:10'),
(17, 7, 3, 0.00, 0.00, 2.00, 33, 0, 0, '2015-01-13 13:53:23'),
(18, 9, 3, 0.00, 0.00, 0.00, 40, 0, 0, '2015-01-13 13:53:23'),
(19, 8, 3, 0.00, 0.00, 3.00, 27, 0, 0, '2015-01-13 13:53:23'),
(20, 8, 1, 0.00, 0.00, 0.00, 0, 0, 0, '2015-01-13 10:53:25'),
(21, 10, 2, 0.00, 0.00, 0.00, 10, 0, 0, '2015-01-21 15:27:21'),
(22, 10, 1, 0.00, 0.00, 0.00, 0, 0, 0, '2015-01-19 07:52:22'),
(23, 16, 2, 0.00, 0.00, 2.00, 47, 0, 0, '2015-01-21 15:27:21'),
(24, 17, 2, 0.00, 0.00, 0.00, 2, 0, 0, '2015-01-21 15:27:21'),
(25, 17, 1, 0.00, 0.00, 0.00, 0, 0, 0, '2015-01-21 06:35:55'),
(26, 17, 4, 0.00, 0.00, 0.00, 80, 0, 0, '2015-01-22 09:41:40'),
(27, 10, 4, 0.00, 0.00, 0.00, 20, 0, 0, '2015-01-22 09:41:40'),
(28, 2, 4, 0.00, 0.00, 0.00, 0, 0, 0, '2015-01-21 14:18:10'),
(29, 4, 2, 0.00, 0.00, 0.00, 0, 0, 0, '2015-01-21 14:22:27'),
(30, 1, 5, 0.00, 0.00, 0.00, 0, 0, 0, '2015-01-27 08:17:16'),
(31, 17, 5, 2.10, 0.00, 0.00, 0, 0, 0, '2015-03-09 10:58:06'),
(32, 17, 6, 0.10, 0.00, 0.00, 0, 0, 0, '2015-01-27 08:22:37'),
(33, 10, 5, 1.36, 0.00, 0.00, 0, 0, 0, '2015-01-27 15:52:59'),
(34, 10, 6, 0.20, 0.00, 0.00, 0, 0, 0, '2015-01-27 08:30:21'),
(35, 8, 6, 0.00, 0.00, 0.00, 0, 0, 0, '2015-01-27 09:15:04'),
(36, 8, 5, 0.20, 0.00, 0.00, 0, 0, 0, '2015-01-27 15:09:17'),
(37, 1, 6, 0.00, 0.00, 0.00, 0, 0, 0, '2015-01-27 14:46:20'),
(41, 10, 8, 0.00, 0.00, 0.00, 0, 0, 0, '2015-02-04 08:16:27'),
(42, 2, 8, 3.60, 0.00, 0.00, 0, 0, 0, '2015-02-10 06:15:27'),
(43, 2, 6, 0.00, 0.00, 0.00, 0, 0, 0, '2015-02-04 12:58:35'),
(45, 1, 9, 0.00, 0.00, 0.00, 0, 0, 0, '2015-02-05 08:52:00'),
(46, 1, 7, 0.00, 0.00, 0.00, 0, 0, 0, '2015-02-05 10:42:02'),
(47, 2, 7, 4.40, 0.00, 0.00, 0, 0, 0, '2015-02-17 14:06:30'),
(48, 17, 9, 0.00, 0.00, 3.50, 96.5, 0, 0, '2015-03-11 08:10:50'),
(51, 2, 9, 0.00, 0.00, 0.00, 0, 0, 0, '2015-02-07 10:47:37'),
(52, 10, 7, 6.00, 0.00, 0.00, 0, 0, 0, '2015-02-11 08:04:57'),
(53, 17, 7, 0.00, 0.00, 0.00, 0, 0, 0, '2015-02-09 08:12:05'),
(54, 10, 9, 0.00, 0.00, 0.00, 3.5, 0, 0, '2015-03-11 08:10:49'),
(55, 17, 10, 0.00, 0.00, 7.01, 92.79, 0, 0, '2015-03-11 08:05:51'),
(56, 10, 10, 0.00, 0.00, 1.10, 7.02, 0, 0, '2015-03-11 08:05:51'),
(57, 2, 10, 0.00, 0.00, 0.00, 0.11, 0, 0, '2015-03-11 08:05:51'),
(58, 1, 11, 0.00, 0.00, 0.00, 0, 0, 0, '2015-02-10 07:38:29'),
(59, 10, 11, 3.00, 0.00, 0.00, 0, 0, 0, '2015-02-10 08:31:10'),
(60, 17, 11, 99.60, 0.00, 0.00, 0, 0, 0, '2015-02-10 08:31:55'),
(61, 2, 11, 0.00, 0.00, 0.00, 0, 0, 0, '2015-02-10 08:14:45'),
(62, 2, 12, 0.00, 0.00, 289.30, 0, 0, 0, '2015-02-26 07:10:30'),
(64, 1, 12, 0.00, 0.00, 0.00, 0, 0, 0, '2015-02-10 10:11:36'),
(65, 17, 12, 100.00, 0.00, 0.00, 0, 0, 0, '2015-02-26 07:10:30'),
(66, 2, 13, 120.00, -100.00, 45.00, 0, 0, 0, '2015-03-04 09:34:38'),
(67, 3, 13, 40.00, 40.00, 20.00, 0, 0, 0, '2015-03-04 09:34:23'),
(68, 1, 14, 0.00, 0.00, 0.00, 0, 0, 0, '2015-02-11 06:54:55'),
(69, 17, 14, 0.00, 0.00, 0.00, 0, 0, 0, '2015-02-11 06:58:46'),
(70, 10, 14, 0.00, 100.00, 0.00, 0, 0, 0, '2015-03-11 06:37:11'),
(71, 10, 13, 0.00, 0.00, 0.00, 0, 0, 0, '2015-02-11 08:03:37'),
(72, 10, 12, 0.00, 0.00, 0.00, 0, 0, 0, '2015-02-11 08:03:42'),
(73, 10, 15, 100.00, 0.00, 20.00, 0, 0, 0, '2015-02-16 17:59:46'),
(74, 2, 15, 0.00, 0.00, 0.00, 0, 0, 0, '2015-02-17 06:48:36'),
(75, 2, 14, 0.00, 0.00, 0.00, 0, 0, 0, '2015-02-17 07:08:07'),
(76, 17, 15, 0.00, 0.00, 0.00, 0, 0, 0, '2015-02-17 07:57:54'),
(77, 17, 16, 100.00, 0.00, 0.00, 0, 0, 0, '2015-02-17 08:01:24'),
(78, 17, 17, 100.00, 0.00, 0.00, 0, 0, 0, '2015-02-26 10:32:53'),
(79, 17, 18, 110.00, -60.00, 0.00, 0, 0, 0, '2015-03-04 09:47:46'),
(80, 20, 18, 110.00, -60.00, 0.00, 0, 0, 0, '2015-03-04 09:24:37'),
(81, 2, 18, 0.00, 0.00, 0.00, 0, 0, 0, '2015-03-04 09:26:59'),
(82, 3, 14, 0.00, 0.00, 0.00, 0, 0, 0, '2015-03-04 09:33:16'),
(83, 1, 19, 0.00, 0.00, 0.00, 0, 0, 0, '2015-03-04 09:36:55'),
(84, 2, 19, 50.00, 0.00, 0.00, 0, 0, 0, '2015-03-04 09:38:01'),
(85, 3, 19, 110.00, -60.00, 0.00, 0, 0, 0, '2015-03-04 09:39:08'),
(86, 3, 18, 0.00, 0.00, 0.00, 0, 0, 0, '2015-03-04 09:41:22'),
(87, 20, 17, 0.00, 0.00, 0.00, 0, 0, 0, '2015-03-04 09:51:43'),
(88, 17, 19, 0.00, 0.00, 0.00, 0, 0, 0, '2015-03-04 09:55:57'),
(89, 3, 20, 35.00, 65.00, 200.00, 0, 0, 0, '2015-03-04 11:00:42'),
(90, 17, 21, 19.00, 81.00, 21.00, 0, 0, 0, '2015-03-09 10:55:23'),
(91, 1, 21, 0.00, 0.00, 0.00, 0, 0, 0, '2015-03-09 08:29:27'),
(92, 16, 21, 0.00, 0.00, 20.00, 0, 0, 0, '2015-03-09 10:51:26'),
(93, 17, 22, 0.00, 0.00, 0.00, 10, 0, 0, '2015-03-11 06:33:51'),
(94, 3, 8, 0.00, 0.00, 0.00, 0, 0, 0, '2015-03-09 11:41:26'),
(95, 10, 22, 0.00, 0.00, 0.00, 60, 0, 0, '2015-03-11 06:33:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_share_limits`
--

CREATE TABLE IF NOT EXISTS `user_share_limits` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `share_limits` float NOT NULL COMMENT '(in percentage)',
  `property_id` int(11) NOT NULL,
  `profit` float(15,2) NOT NULL,
  `loss` float(15,2) NOT NULL,
  `details` text NOT NULL COMMENT 'Property profit or loss details'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_withdraw_fund`
--

CREATE TABLE IF NOT EXISTS `user_withdraw_fund` (
`id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `fund_amt` varchar(100) NOT NULL,
  `number_of_token` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL,
  `property_id` int(11) DEFAULT NULL,
  `bank_name` varchar(255) NOT NULL,
  `cheque_no` varchar(255) NOT NULL,
  `withdraw_date` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `user_withdraw_fund`
--

INSERT INTO `user_withdraw_fund` (`id`, `user_id`, `fund_amt`, `number_of_token`, `date`, `status`, `property_id`, `bank_name`, `cheque_no`, `withdraw_date`) VALUES
(1, '2', '120', '12', '2014-12-31 13:26:08', 'Approved By Cash', NULL, '', '', '0000-00-00 00:00:00'),
(2, '2', '200', '20', '2014-12-31 13:26:16', 'Cancelled', NULL, '', '', '0000-00-00 00:00:00'),
(3, '2', '142', '14', '2014-12-31 13:26:24', 'Approved By Cash', NULL, '', '', '2015-01-02 06:38:35'),
(4, '3', '1000', '100', '2014-12-31 14:50:04', 'Approved By Cash', NULL, '', '', '0000-00-00 00:00:00'),
(5, '2', '142', '14.20', '2015-01-02 06:42:03', 'Pending', NULL, '', '', '0000-00-00 00:00:00'),
(6, '2', '200', '20.00', '2015-01-02 07:25:39', 'Pending', NULL, '', '', '0000-00-00 00:00:00'),
(7, '2', '', '0.00', '2015-01-02 09:06:04', 'Pending', NULL, '', '', '0000-00-00 00:00:00'),
(8, '3', '1000', '100.00', '2015-01-02 13:24:35', 'Approved By Cash', NULL, '', '', '2015-01-02 13:25:14'),
(9, '7', '100', '10.00', '2015-01-12 13:17:39', 'Approved By Cash', NULL, '', '', '2015-01-12 13:26:41'),
(10, '16', '2', '0.20', '2015-01-19 08:00:05', 'Approved By cheque', NULL, '', '', '2015-01-19 08:00:25'),
(11, '2', '1', '0.10', '2015-01-21 14:04:47', 'Pending', NULL, '', '', '0000-00-00 00:00:00'),
(12, '10', '30000', '3.000.00', '2015-02-11 08:02:55', 'Approved By Cash', NULL, '', '', '2015-02-11 08:05:26'),
(13, '2', '15000', '1.500.00', '2015-02-11 08:12:20', 'Pending', NULL, '', '', '0000-00-00 00:00:00'),
(14, '2', '15000', '1.500.00', '2015-02-11 08:12:26', 'Pending', NULL, '', '', '0000-00-00 00:00:00'),
(15, '3', '12', '1.20', '2015-02-11 14:34:14', 'Cancelled', NULL, '', '', '2015-03-11 09:30:02'),
(16, '3', '10', '1.00', '2015-03-11 09:33:35', 'Approved By Cash', NULL, '', '', '2015-03-11 10:07:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chart_property_price_time`
--
ALTER TABLE `chart_property_price_time`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_cookies`
--
ALTER TABLE `ci_cookies`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `credit_price`
--
ALTER TABLE `credit_price`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `o_payments`
--
ALTER TABLE `o_payments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profit_loss_fund_log`
--
ALTER TABLE `profit_loss_fund_log`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_deals`
--
ALTER TABLE `property_deals`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_type`
--
ALTER TABLE `property_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_no`
--
ALTER TABLE `ref_no`
 ADD PRIMARY KEY (`ref_no`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblclients`
--
ALTER TABLE `tblclients`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
 ADD PRIMARY KEY (`deptid`);

--
-- Indexes for table `tblfields`
--
ALTER TABLE `tblfields`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsettings`
--
ALTER TABLE `tblsettings`
 ADD UNIQUE KEY `setting` (`setting`);

--
-- Indexes for table `tblstaffs`
--
ALTER TABLE `tblstaffs`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD KEY `id_2` (`id`);

--
-- Indexes for table `tblticketreplies`
--
ALTER TABLE `tblticketreplies`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltickets`
--
ALTER TABLE `tbltickets`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactionfees`
--
ALTER TABLE `transactionfees`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_autotracking_log`
--
ALTER TABLE `user_autotracking_log`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_credit`
--
ALTER TABLE `user_credit`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_fund_log`
--
ALTER TABLE `user_fund_log`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_payment_credit`
--
ALTER TABLE `user_payment_credit`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_property`
--
ALTER TABLE `user_property`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_share_limits`
--
ALTER TABLE `user_share_limits`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_withdraw_fund`
--
ALTER TABLE `user_withdraw_fund`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chart_property_price_time`
--
ALTER TABLE `chart_property_price_time`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `ci_cookies`
--
ALTER TABLE `ci_cookies`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `credit_price`
--
ALTER TABLE `credit_price`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `o_payments`
--
ALTER TABLE `o_payments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `profit_loss_fund_log`
--
ALTER TABLE `profit_loss_fund_log`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `property_deals`
--
ALTER TABLE `property_deals`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `property_type`
--
ALTER TABLE `property_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ref_no`
--
ALTER TABLE `ref_no`
MODIFY `ref_no` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblclients`
--
ALTER TABLE `tblclients`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
MODIFY `deptid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblfields`
--
ALTER TABLE `tblfields`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tblstaffs`
--
ALTER TABLE `tblstaffs`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblticketreplies`
--
ALTER TABLE `tblticketreplies`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbltickets`
--
ALTER TABLE `tbltickets`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `transactionfees`
--
ALTER TABLE `transactionfees`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_autotracking_log`
--
ALTER TABLE `user_autotracking_log`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT for table `user_credit`
--
ALTER TABLE `user_credit`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_fund_log`
--
ALTER TABLE `user_fund_log`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=292;
--
-- AUTO_INCREMENT for table `user_payment_credit`
--
ALTER TABLE `user_payment_credit`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user_property`
--
ALTER TABLE `user_property`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `user_share_limits`
--
ALTER TABLE `user_share_limits`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_withdraw_fund`
--
ALTER TABLE `user_withdraw_fund`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
