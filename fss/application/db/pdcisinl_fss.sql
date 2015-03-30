-- phpMyAdmin SQL Dump
-- version 4.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 04, 2015 at 07:01 AM
-- Server version: 5.5.40-cll
-- PHP Version: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pdcisinl_fss`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertise`
--

CREATE TABLE IF NOT EXISTS `advertise` (
`id` int(11) NOT NULL,
  `add_slot_no` int(11) NOT NULL,
  `slot_id` int(11) DEFAULT NULL,
  `cust_name` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `advrtise_file` varchar(255) DEFAULT NULL,
  `target_url` text NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `advertise`
--

INSERT INTO `advertise` (`id`, `add_slot_no`, `slot_id`, `cust_name`, `start_date`, `end_date`, `advrtise_file`, `target_url`, `created`) VALUES
(6, 1, 1, 'First Ad', '2015-02-03', '2015-02-07', '1422941953_DaraQuote-01-467x128.png', 'http://google.com', '2015-02-03 12:15:38'),
(7, 1, 2, NULL, NULL, NULL, NULL, '', NULL),
(8, 1, 3, NULL, NULL, NULL, NULL, '', NULL),
(9, 1, 4, NULL, NULL, NULL, NULL, '', NULL),
(10, 2, 1, NULL, NULL, NULL, NULL, '', NULL),
(11, 2, 2, NULL, NULL, NULL, NULL, '', NULL),
(12, 2, 3, NULL, NULL, NULL, NULL, '', NULL),
(13, 2, 4, NULL, NULL, NULL, NULL, '', NULL),
(14, 3, 1, NULL, NULL, NULL, NULL, '', NULL),
(15, 3, 2, NULL, NULL, NULL, NULL, '', NULL),
(16, 3, 3, NULL, NULL, NULL, NULL, '', NULL),
(17, 3, 4, NULL, NULL, NULL, NULL, '', NULL),
(18, 4, 1, NULL, NULL, NULL, NULL, '', NULL),
(19, 4, 2, NULL, NULL, NULL, NULL, '', NULL),
(20, 4, 3, NULL, NULL, NULL, NULL, '', NULL),
(21, 4, 4, NULL, NULL, NULL, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `page_no` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `tel_no` varchar(15) DEFAULT NULL,
  `music_id` int(11) DEFAULT NULL,
  `music_file` varchar(255) DEFAULT NULL,
  `share_img` varchar(255) DEFAULT NULL,
  `share_title` varchar(255) DEFAULT NULL,
  `share_text` varchar(255) DEFAULT NULL,
  `is_published` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `is_draft` tinyint(4) NOT NULL DEFAULT '0',
  `read_count` int(11) NOT NULL DEFAULT '0',
  `favorites_count` int(11) NOT NULL DEFAULT '0',
  `qr_code_url` text,
  `cover_img` varchar(255) DEFAULT NULL,
  `qr_code_img` varchar(255) DEFAULT NULL,
  `is_watermark` tinyint(4) NOT NULL DEFAULT '0',
  `is_delete` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime NOT NULL,
  `is_editor` varchar(100) NOT NULL,
  `categories` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `page_no`, `title`, `tel_no`, `music_id`, `music_file`, `share_img`, `share_title`, `share_text`, `is_published`, `is_active`, `is_draft`, `read_count`, `favorites_count`, `qr_code_url`, `cover_img`, `qr_code_img`, `is_watermark`, `is_delete`, `created`, `updated`, `is_editor`, `categories`) VALUES
(19, 4, NULL, 'This is test 16_01', '1236547890', NULL, '', '14213870228.png', 'test 123', 'test', 3, 0, 0, 0, 0, NULL, NULL, 'qr99794743c68c260cd0215350fae20357.png', 1, 1, '2015-01-16 06:43:54', '0000-00-00 00:00:00', '', ''),
(20, 4, NULL, '16_01_2015', '2136547890', 5, '1421387707remeo.ogg', '14213877131287407838.jpg', 'test', 'tets', 1, 1, 0, 0, 0, NULL, NULL, 'qr52eb06652ce0872e1542e523c22d8a13.png', 1, 1, '2015-01-19 13:05:59', '0000-00-00 00:00:00', '1', ''),
(22, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 0, 0, 0, 0, 0, NULL, NULL, 'qr85a0f58c405df27856c9b07c79a72e51.png', 1, 1, '2015-01-19 13:02:02', '0000-00-00 00:00:00', '', ''),
(23, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 0, 5, 1, NULL, NULL, 'qrb05e06305f30145a7678feb26431150a.png', 1, 0, '2015-01-16 07:54:43', '0000-00-00 00:00:00', '1', ''),
(24, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 1, 0, 0, NULL, NULL, 'qreb6c913693df23aeda6ccb73d87b4edb.png', 1, 0, '2015-01-16 07:54:44', '0000-00-00 00:00:00', '1', ''),
(25, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 1, 0, 0, NULL, NULL, 'qr148f0eb205f8afa2b6d792b8918210b3.png', 1, 0, '2015-01-16 07:54:44', '0000-00-00 00:00:00', '', ''),
(26, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 0, 0, 0, 0, 0, NULL, NULL, 'qra13e199982ee103d39f876347cecf78c.png', 1, 0, '2015-01-16 07:54:45', '0000-00-00 00:00:00', '', ''),
(27, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 0, 2, 0, NULL, NULL, 'qr694bc1fdf8c7658f3002a9194c00cef1.png', 1, 0, '2015-01-16 07:54:46', '0000-00-00 00:00:00', '', ''),
(28, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 0, 0, 0, 0, 0, NULL, NULL, 'qr315f802e244f04af08622477191afa51.png', 1, 0, '2015-01-27 20:05:16', '0000-00-00 00:00:00', '', ''),
(29, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 0, 2, 0, NULL, NULL, 'qrfc407807e265e22a26e268068a8a97ee.png', 1, 0, '2015-01-16 07:54:55', '0000-00-00 00:00:00', '', ''),
(30, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 0, 0, 1, 0, 0, NULL, NULL, 'qrf8b8b73aa9275dcad29b8d88bf0f12e5.png', 1, 1, '2015-01-16 07:54:56', '0000-00-00 00:00:00', '', ''),
(31, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 1, 0, 0, NULL, NULL, 'qrcc38209348b4a9782fbc2b49a90e2c55.png', 1, 0, '2015-01-16 07:54:56', '0000-00-00 00:00:00', '', ''),
(32, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 0, 2, 0, NULL, NULL, 'qr9fc728857474ab4f65e6fc12dad69a23.png', 1, 0, '2015-01-16 07:55:38', '0000-00-00 00:00:00', '', ''),
(33, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 0, 1, 0, NULL, NULL, 'qr9827f20cfea4e7cf4ced9459fededd50.png', 1, 0, '2015-01-16 07:55:39', '0000-00-00 00:00:00', '', ''),
(34, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 0, 2, 0, NULL, NULL, 'qref6d347bfe94cf39a18b52f3e2e4aeff.png', 1, 0, '2015-01-16 07:55:39', '0000-00-00 00:00:00', '1', ''),
(35, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 1, 0, 0, NULL, NULL, 'qr07d07403bcf85f8a7a3b0b102e98578f.png', 1, 0, '2015-01-16 07:55:40', '0000-00-00 00:00:00', '', ''),
(36, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 1, 0, 0, NULL, NULL, 'qra5de61c985ad85ace5460c27e412ac40.png', 1, 0, '2015-01-16 07:55:41', '0000-00-00 00:00:00', '', ''),
(37, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 0, 6, 0, NULL, NULL, 'qr15bb2cb39419ca8d70e8d04fefb6309c.png', 1, 0, '2015-01-16 07:55:44', '0000-00-00 00:00:00', '', ''),
(38, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 0, 0, 0, 1, 0, NULL, NULL, 'qrb60c8b89b21a1c06267f5607af9cef57.png', 1, 0, '2015-01-16 07:56:06', '0000-00-00 00:00:00', '', ''),
(39, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 0, 0, 0, 2, 0, NULL, NULL, 'qr7dd294c62aff0c347c1fd2d74d747ce4.png', 1, 0, '2015-01-16 07:56:06', '0000-00-00 00:00:00', '', ''),
(40, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 0, 0, 0, 1, 0, NULL, NULL, 'qr57e822ec4e9b24dff2a4f5d89f15bece.png', 1, 0, '2015-01-16 07:56:06', '0000-00-00 00:00:00', '', ''),
(41, 4, NULL, 'test', '3434535555', 0, '', '', '', '', 0, 0, 0, 1, 0, NULL, NULL, 'qrd406b6b95daef62ae1e7e76333e1b024.png', 1, 0, '2015-01-16 10:25:11', '0000-00-00 00:00:00', '', ''),
(42, 11, NULL, 'Friendship Forever', '0136379777', 7, '1422388808??-?????.mp3', '1421661186stand_by_me_doraemon_drama.jpg', 'Friendship this is Friendship', 'Friendship this is Friendship', 1, 1, 0, 19, 5, NULL, NULL, 'qr4c016db6dd561cc7fa9f0669f10a30e8.png', 1, 0, '2015-01-27 20:00:16', '0000-00-00 00:00:00', '', 'Character,Emotion,Cartoon,'),
(43, 14, NULL, 'sdfgsdf', '5634643564', 0, '', '1421665692botany.jpg', '', '', 0, 0, 0, 1, 0, NULL, NULL, 'qrd469de763884d097aaaa9b6bf9ef6ddc.png', 0, 0, '2015-01-19 11:08:24', '0000-00-00 00:00:00', '', ''),
(44, 15, NULL, 'Ultra-luxury car', '9993131425', 0, '', '1421740548Duesenberg.jpg', 'Bentley Mulsanne', 'ultra-luxury car', 0, 0, 0, 2, 0, NULL, NULL, 'qr647537186e1817b3066f9c62a0498bfa.png', 1, 0, '2015-01-27 20:06:20', '0000-00-00 00:00:00', '', 'News,Science and Technology,Car,'),
(45, 1, NULL, 'Reason to Leave', '0108288222', 47, '', '1422617380mengwu.jpg', 'Reason you should leave current company', 'Reason you should leave current company', 1, 1, 0, 15, 2, NULL, NULL, 'qrd8d1e7ee9b7589423cae65944d9ee1c0.png', 1, 0, '2015-01-31 07:08:51', '0000-00-00 00:00:00', '1', 'History,News,Finance and economics,'),
(46, 12, NULL, 'test', '1223333333', 4, '', '1422696161botany.jpg', 'tstsd', 'sdfsdgf', 0, 0, 0, 1, 0, NULL, NULL, 'qr7a35ac181cffe5a5aacbda84561cf2ad.png', 1, 0, '2015-01-31 09:22:58', '0000-00-00 00:00:00', '', 'Scenery,Character,History,'),
(47, 12, NULL, 'fgsdfgsd', '6345345345', 4, '', '14226969541408523508_oconnor-e1363008742341-392x246.jpg', 'gsdfgsdf', 'sdfsgdf', 0, 0, 0, 1, 0, NULL, NULL, 'qr6eeae6a03055316bb4bd87f2efdb5cef.png', 1, 0, '2015-01-31 09:36:01', '0000-00-00 00:00:00', '', 'Gender,Constellation,Other,');

-- --------------------------------------------------------

--
-- Table structure for table `article_categories`
--

CREATE TABLE IF NOT EXISTS `article_categories` (
`id` int(11) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `category_id` int(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=164 ;

--
-- Dumping data for table `article_categories`
--

INSERT INTO `article_categories` (`id`, `article_id`, `category_id`) VALUES
(65, 20, 7),
(75, 22, 10),
(76, 22, 24),
(77, 23, 10),
(78, 23, 24),
(79, 25, 10),
(80, 25, 24),
(81, 24, 10),
(82, 24, 24),
(83, 26, 10),
(84, 26, 24),
(85, 27, 10),
(86, 27, 24),
(88, 28, 10),
(89, 28, 24),
(91, 29, 10),
(92, 29, 24),
(94, 30, 10),
(96, 30, 24),
(97, 31, 10),
(98, 31, 24),
(100, 32, 10),
(101, 32, 24),
(103, 33, 10),
(105, 33, 24),
(106, 34, 10),
(107, 34, 24),
(109, 35, 10),
(110, 35, 24),
(112, 36, 10),
(113, 36, 24),
(115, 37, 10),
(116, 37, 24),
(118, 38, 10),
(119, 38, 24),
(121, 39, 10),
(123, 39, 24),
(124, 40, 10),
(125, 40, 24),
(137, 43, 4),
(138, 43, 5),
(139, 43, 7),
(149, 44, 8),
(150, 44, 13),
(151, 44, 15),
(152, 42, 6),
(153, 42, 27),
(154, 42, 31),
(155, 45, 7),
(156, 45, 8),
(157, 45, 9),
(158, 46, 5),
(159, 46, 6),
(160, 46, 7),
(161, 47, 22),
(162, 47, 23),
(163, 47, 32);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `blog_name` varchar(255) DEFAULT NULL,
  `music` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `comment` text,
  `avg_rating` varchar(20) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `category_id`, `blog_name`, `music`, `images`, `video`, `comment`, `avg_rating`, `is_active`, `created`) VALUES
(1, 4, 1, 'dfg', NULL, '1', '1', NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `adverties_id` int(11) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `adverties_id`, `category_name`, `is_active`) VALUES
(5, NULL, 'Scenery', 1),
(6, NULL, 'Character', 1),
(7, NULL, 'History', 1),
(8, NULL, 'News', 1),
(9, NULL, 'Finance and economics', 1),
(10, NULL, 'Entertainment', 1),
(11, NULL, 'Military', 1),
(12, NULL, 'Fashion', 1),
(13, NULL, 'Science and Technology', 1),
(14, NULL, 'Art', 1),
(15, NULL, 'Car', 1),
(16, NULL, 'Estate', 1),
(17, NULL, 'Education', 1),
(18, NULL, 'Health', 1),
(19, NULL, 'Mito', 1),
(20, NULL, 'Travel', 1),
(21, NULL, 'Culture', 1),
(22, NULL, 'Gender', 1),
(23, NULL, 'Constellation', 1),
(24, NULL, 'Game', 1),
(25, NULL, 'Music', 1),
(26, NULL, 'Home', 1),
(27, NULL, 'Emotion', 1),
(28, NULL, 'Food', 1),
(29, NULL, 'Pet', 1),
(30, NULL, 'Test', 1),
(31, NULL, 'Cartoon', 1),
(32, NULL, 'Other', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `comment` text,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `article_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `like_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `blog_id`, `comment`, `is_active`, `created`, `article_id`, `image_id`, `like_count`) VALUES
(2, 4, NULL, 'test', 0, '2015-01-23 10:21:47', 42, 264, 1),
(3, 4, NULL, 'test', 0, '2015-01-23 10:21:54', 42, 265, 1),
(4, 0, NULL, 'Hi\n', 0, '2015-01-27 05:51:35', 23, 93, 0),
(5, 4, NULL, 'hi', 0, '2015-01-27 05:52:07', 42, 264, 0),
(6, 0, NULL, 'hi\n', 0, '2015-01-29 06:32:22', 42, 0, 0),
(7, 0, NULL, 'helo', 0, '2015-01-29 06:32:31', 42, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `file_segments`
--

CREATE TABLE IF NOT EXISTS `file_segments` (
`id` int(11) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `comment` text,
  `file` varchar(255) DEFAULT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `file_segments`
--

INSERT INTO `file_segments` (`id`, `file_name`, `comment`, `file`, `file_size`, `is_active`, `created`) VALUES
(1, 'fgsdf', 'asdfdsfasd', 'e5acfe2fd0b223ee2dcb724828cfd754_archive3.png', '3424', 0, NULL),
(2, 'sdfsf', 'sdfg', '3f1b9e729ad8eb3b7e522cc163877873_2014-11-10-202908.ogg', '435', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`id` int(11) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `temp_img_id` int(11) DEFAULT NULL,
  `message` text,
  `is_thumb` tinyint(4) NOT NULL DEFAULT '0',
  `image_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=301 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `article_id`, `temp_img_id`, `message`, `is_thumb`, `image_name`) VALUES
(59, 19, 22, NULL, 0, '14213089444.png'),
(60, 19, 23, NULL, 0, '14213089445.png'),
(61, 19, 24, NULL, 0, '14213089446.png'),
(62, 19, 19, NULL, 0, '14213089351287407838.jpg'),
(63, 19, 20, NULL, 0, '1421308935botany.jpg'),
(64, NULL, 77, NULL, 0, '1421386517permission.png'),
(65, 19, 78, NULL, 0, '1421386765permission.png'),
(66, 19, 79, NULL, 0, '1421386805News1.png'),
(67, 19, 80, NULL, 0, '1421386805save_news.png'),
(68, 20, 84, NULL, 0, '14213876908.png'),
(69, 20, 85, NULL, 0, '14213876909.png'),
(70, 20, 86, NULL, 0, '14213876909_1.png'),
(71, 20, 87, NULL, 0, '142138769010.png'),
(72, 20, 88, NULL, 0, '142138769011.png'),
(73, 20, 89, NULL, 0, '142138769012.png'),
(74, 20, 90, NULL, 0, '1421387690News1.png'),
(75, 20, 91, NULL, 0, '1421387690save_news.png'),
(84, 22, 110, NULL, 0, '1421394849deidara.png'),
(85, 22, 111, NULL, 0, '1421394849FACEPALM.png'),
(86, 22, 112, NULL, 0, '1421394849huanxige.jpg'),
(87, 22, 113, NULL, 0, '1421394849kirito.jpg'),
(88, 22, 114, NULL, 0, '1421394849noeyesee.jpg'),
(89, 22, 115, NULL, 0, '1421394849pork_chop_raw.jpg'),
(90, 22, 104, NULL, 0, '1421394733huanxige.jpg'),
(91, 22, 105, NULL, 0, '1421394733noeyesee.jpg'),
(93, 23, 110, NULL, 0, '1421394849deidara.png'),
(94, 23, 111, NULL, 0, '1421394849FACEPALM.png'),
(95, 23, 112, NULL, 0, '1421394849huanxige.jpg'),
(96, 23, 113, NULL, 0, '1421394849kirito.jpg'),
(97, 23, 114, NULL, 0, '1421394849noeyesee.jpg'),
(98, 23, 115, NULL, 0, '1421394849pork_chop_raw.jpg'),
(99, 23, 104, NULL, 0, '1421394733huanxige.jpg'),
(100, 23, 105, NULL, 0, '1421394733noeyesee.jpg'),
(102, 24, 110, NULL, 0, '1421394849deidara.png'),
(103, 24, 111, NULL, 0, '1421394849FACEPALM.png'),
(104, 25, 110, NULL, 0, '1421394849deidara.png'),
(105, 24, 112, NULL, 0, '1421394849huanxige.jpg'),
(106, 25, 111, NULL, 0, '1421394849FACEPALM.png'),
(107, 24, 113, NULL, 0, '1421394849kirito.jpg'),
(108, 25, 112, NULL, 0, '1421394849huanxige.jpg'),
(109, 24, 114, NULL, 0, '1421394849noeyesee.jpg'),
(110, 25, 113, NULL, 0, '1421394849kirito.jpg'),
(111, 24, 115, NULL, 0, '1421394849pork_chop_raw.jpg'),
(112, 25, 114, NULL, 0, '1421394849noeyesee.jpg'),
(113, 24, 104, NULL, 0, '1421394733huanxige.jpg'),
(114, 25, 115, NULL, 0, '1421394849pork_chop_raw.jpg'),
(115, 26, 110, NULL, 0, '1421394849deidara.png'),
(116, 25, 104, NULL, 0, '1421394733huanxige.jpg'),
(117, 26, 111, NULL, 0, '1421394849FACEPALM.png'),
(118, 25, 105, NULL, 0, '1421394733noeyesee.jpg'),
(119, 26, 112, NULL, 0, '1421394849huanxige.jpg'),
(121, 26, 113, NULL, 0, '1421394849kirito.jpg'),
(122, 24, 105, NULL, 0, '1421394733noeyesee.jpg'),
(123, 27, 110, NULL, 0, '1421394849deidara.png'),
(125, 26, 114, NULL, 0, '1421394849noeyesee.jpg'),
(126, 27, 111, NULL, 0, '1421394849FACEPALM.png'),
(127, 27, 112, NULL, 0, '1421394849huanxige.jpg'),
(128, 26, 115, NULL, 0, '1421394849pork_chop_raw.jpg'),
(129, 26, 104, NULL, 0, '1421394733huanxige.jpg'),
(130, 27, 113, NULL, 0, '1421394849kirito.jpg'),
(131, 27, 114, NULL, 0, '1421394849noeyesee.jpg'),
(132, 26, 105, NULL, 0, '1421394733noeyesee.jpg'),
(134, 27, 115, NULL, 0, '1421394849pork_chop_raw.jpg'),
(135, 27, 104, NULL, 0, '1421394733huanxige.jpg'),
(136, 27, 105, NULL, 0, '1421394733noeyesee.jpg'),
(138, 28, 110, NULL, 0, '1421394849deidara.png'),
(139, 28, 111, NULL, 0, '1421394849FACEPALM.png'),
(140, 28, 112, NULL, 0, '1421394849huanxige.jpg'),
(141, 28, 113, NULL, 0, '1421394849kirito.jpg'),
(142, 28, 114, NULL, 0, '1421394849noeyesee.jpg'),
(143, 28, 115, NULL, 0, '1421394849pork_chop_raw.jpg'),
(144, 28, 104, NULL, 0, '1421394733huanxige.jpg'),
(145, 28, 105, NULL, 0, '1421394733noeyesee.jpg'),
(147, 29, 110, NULL, 0, '1421394849deidara.png'),
(148, 29, 111, NULL, 0, '1421394849FACEPALM.png'),
(149, 29, 112, NULL, 0, '1421394849huanxige.jpg'),
(150, 29, 113, NULL, 0, '1421394849kirito.jpg'),
(151, 29, 114, NULL, 0, '1421394849noeyesee.jpg'),
(152, 29, 115, NULL, 0, '1421394849pork_chop_raw.jpg'),
(153, 30, 110, NULL, 0, '1421394849deidara.png'),
(154, 29, 104, NULL, 0, '1421394733huanxige.jpg'),
(155, 31, 110, NULL, 0, '1421394849deidara.png'),
(156, 30, 111, NULL, 0, '1421394849FACEPALM.png'),
(157, 29, 105, NULL, 0, '1421394733noeyesee.jpg'),
(158, 30, 112, NULL, 0, '1421394849huanxige.jpg'),
(159, 31, 111, NULL, 0, '1421394849FACEPALM.png'),
(161, 31, 112, NULL, 0, '1421394849huanxige.jpg'),
(162, 30, 113, NULL, 0, '1421394849kirito.jpg'),
(163, 30, 114, NULL, 0, '1421394849noeyesee.jpg'),
(164, 31, 113, NULL, 0, '1421394849kirito.jpg'),
(165, 31, 114, NULL, 0, '1421394849noeyesee.jpg'),
(166, 30, 115, NULL, 0, '1421394849pork_chop_raw.jpg'),
(167, 30, 104, NULL, 0, '1421394733huanxige.jpg'),
(168, 31, 115, NULL, 0, '1421394849pork_chop_raw.jpg'),
(169, 30, 105, NULL, 0, '1421394733noeyesee.jpg'),
(170, 31, 104, NULL, 0, '1421394733huanxige.jpg'),
(172, 31, 105, NULL, 0, '1421394733noeyesee.jpg'),
(174, 32, 110, '0', 1, '1421394849deidara.png'),
(175, 32, 111, NULL, 0, '1421394849FACEPALM.png'),
(176, 32, 112, NULL, 0, '1421394849huanxige.jpg'),
(177, 32, 113, NULL, 0, '1421394849kirito.jpg'),
(178, 33, 110, '0', 1, '1421394849deidara.png'),
(179, 32, 114, NULL, 0, '1421394849noeyesee.jpg'),
(180, 33, 111, NULL, 0, '1421394849FACEPALM.png'),
(181, 32, 115, NULL, 0, '1421394849pork_chop_raw.jpg'),
(182, 34, 110, '0', 1, '1421394849deidara.png'),
(183, 33, 112, NULL, 0, '1421394849huanxige.jpg'),
(184, 32, 104, NULL, 0, '1421394733huanxige.jpg'),
(185, 34, 111, NULL, 0, '1421394849FACEPALM.png'),
(186, 33, 113, NULL, 0, '1421394849kirito.jpg'),
(187, 34, 112, NULL, 0, '1421394849huanxige.jpg'),
(188, 32, 105, NULL, 0, '1421394733noeyesee.jpg'),
(189, 33, 114, NULL, 0, '1421394849noeyesee.jpg'),
(191, 34, 113, NULL, 0, '1421394849kirito.jpg'),
(192, 35, 110, '0', 1, '1421394849deidara.png'),
(193, 33, 115, NULL, 0, '1421394849pork_chop_raw.jpg'),
(194, 34, 114, NULL, 0, '1421394849noeyesee.jpg'),
(195, 35, 111, NULL, 0, '1421394849FACEPALM.png'),
(196, 33, 104, NULL, 0, '1421394733huanxige.jpg'),
(197, 35, 112, NULL, 0, '1421394849huanxige.jpg'),
(198, 34, 115, NULL, 0, '1421394849pork_chop_raw.jpg'),
(199, 33, 105, NULL, 0, '1421394733noeyesee.jpg'),
(200, 34, 104, NULL, 0, '1421394733huanxige.jpg'),
(201, 35, 113, NULL, 0, '1421394849kirito.jpg'),
(203, 34, 105, NULL, 0, '1421394733noeyesee.jpg'),
(204, 35, 114, NULL, 0, '1421394849noeyesee.jpg'),
(206, 35, 115, NULL, 0, '1421394849pork_chop_raw.jpg'),
(207, 35, 104, NULL, 0, '1421394733huanxige.jpg'),
(208, 35, 105, NULL, 0, '1421394733noeyesee.jpg'),
(210, 36, 110, '0', 1, '1421394849deidara.png'),
(211, 36, 111, NULL, 0, '1421394849FACEPALM.png'),
(212, 36, 112, NULL, 0, '1421394849huanxige.jpg'),
(213, 36, 113, NULL, 0, '1421394849kirito.jpg'),
(214, 36, 114, NULL, 0, '1421394849noeyesee.jpg'),
(215, 36, 115, NULL, 0, '1421394849pork_chop_raw.jpg'),
(216, 36, 104, NULL, 0, '1421394733huanxige.jpg'),
(217, 36, 105, NULL, 0, '1421394733noeyesee.jpg'),
(219, 37, 110, '0', 1, '1421394849deidara.png'),
(220, 37, 111, NULL, 0, '1421394849FACEPALM.png'),
(221, 37, 112, NULL, 0, '1421394849huanxige.jpg'),
(222, 37, 113, NULL, 0, '1421394849kirito.jpg'),
(223, 37, 114, NULL, 0, '1421394849noeyesee.jpg'),
(224, 37, 115, NULL, 0, '1421394849pork_chop_raw.jpg'),
(225, 37, 104, NULL, 0, '1421394733huanxige.jpg'),
(226, 37, 105, NULL, 0, '1421394733noeyesee.jpg'),
(228, 38, 110, '0', 1, '1421394849deidara.png'),
(229, 38, 111, NULL, 0, '1421394849FACEPALM.png'),
(230, 38, 112, NULL, 0, '1421394849huanxige.jpg'),
(231, 39, 110, '0', 1, '1421394849deidara.png'),
(232, 38, 113, NULL, 0, '1421394849kirito.jpg'),
(233, 40, 110, '0', 1, '1421394849deidara.png'),
(234, 39, 111, NULL, 0, '1421394849FACEPALM.png'),
(235, 38, 114, NULL, 0, '1421394849noeyesee.jpg'),
(236, 39, 112, NULL, 0, '1421394849huanxige.jpg'),
(237, 40, 111, NULL, 0, '1421394849FACEPALM.png'),
(238, 38, 115, NULL, 0, '1421394849pork_chop_raw.jpg'),
(239, 40, 112, NULL, 0, '1421394849huanxige.jpg'),
(240, 39, 113, NULL, 0, '1421394849kirito.jpg'),
(241, 38, 104, NULL, 0, '1421394733huanxige.jpg'),
(242, 39, 114, NULL, 0, '1421394849noeyesee.jpg'),
(243, 40, 113, NULL, 0, '1421394849kirito.jpg'),
(244, 38, 105, NULL, 0, '1421394733noeyesee.jpg'),
(245, 40, 114, NULL, 0, '1421394849noeyesee.jpg'),
(246, 39, 115, NULL, 0, '1421394849pork_chop_raw.jpg'),
(248, 39, 104, NULL, 0, '1421394733huanxige.jpg'),
(249, 40, 115, NULL, 0, '1421394849pork_chop_raw.jpg'),
(250, 40, 104, NULL, 0, '1421394733huanxige.jpg'),
(251, 39, 105, NULL, 0, '1421394733noeyesee.jpg'),
(253, 40, 105, NULL, 0, '1421394733noeyesee.jpg'),
(255, 41, 122, NULL, 0, '14214038653.png'),
(256, 41, 123, NULL, 0, '14214038654.png'),
(257, 41, 124, NULL, 0, '14214038655.png'),
(258, 41, 125, NULL, 0, '14214038656.png'),
(259, 41, 126, NULL, 0, '14214038656_2.png'),
(260, 41, 127, NULL, 0, '14214038656_3d.png'),
(261, 41, 128, NULL, 0, '14214038657.png'),
(262, 41, 120, NULL, 0, '14214038591287407838.jpg'),
(263, 41, 121, NULL, 0, '1421403859botany.jpg'),
(264, 42, 139, NULL, 0, '1421661703doc5.png'),
(265, 42, 138, NULL, 0, '1421661640doc4.png'),
(266, 42, 137, NULL, 0, '1421661509doc3.png'),
(267, 42, 136, NULL, 0, '1421661361doc2.png'),
(268, 42, 133, NULL, 0, '1421661109doc1.png'),
(269, 43, 154, NULL, 0, '14216656884.png'),
(270, 43, 155, NULL, 0, '14216656885.png'),
(271, 43, 156, NULL, 0, '14216656886.png'),
(272, 43, 157, NULL, 0, '14216656886_2.png'),
(273, 43, 158, NULL, 0, '14216656886_3d.png'),
(274, 43, 159, NULL, 0, '14216656887.png'),
(275, 43, 160, NULL, 0, '14216656888.png'),
(276, 43, 161, NULL, 0, '14216656889.png'),
(277, 43, 162, NULL, 0, '14216656889_1.png'),
(278, 43, 163, NULL, 0, '142166568810.png'),
(279, 43, 164, NULL, 0, '142166568811.png'),
(280, 43, 165, NULL, 0, '142166568812.png'),
(281, 44, 167, NULL, 0, '1421740434images.jpeg'),
(282, 44, 168, NULL, 0, '1421740434McLaren-MP4-12C-luxury-cars-12.jpg'),
(283, 44, 169, NULL, 0, '142174043403cars1.jpg'),
(284, 44, 170, NULL, 0, '142174043406car5.jpg'),
(285, 44, 171, NULL, 0, '1421740519Duesenberg.jpg'),
(286, 45, 193, NULL, 0, '1422617276reason1.png'),
(287, 45, 194, 'Test', 0, '1422617276reason2.png'),
(288, 45, 196, NULL, 0, '1422617712reason3.png'),
(289, 45, 197, NULL, 0, '1422617722reason4-Copy.png'),
(290, 45, 198, NULL, 0, '1422617722reason5-Copy.png'),
(291, 46, 199, NULL, 0, '1422696135jpg'),
(292, 46, 200, NULL, 0, '1422696148jpg'),
(293, 46, 201, NULL, 0, '1422696148jpg'),
(294, 46, 202, NULL, 0, '1422696148png'),
(295, 46, 203, NULL, 0, '1422696154jpg'),
(296, 47, 205, NULL, 0, '14226969481.jpg'),
(297, 47, 206, NULL, 0, '14226969482.jpg'),
(298, 47, 207, NULL, 0, '14226969483.jpg'),
(299, 47, 208, NULL, 0, '14226969484.jpg'),
(300, 47, 209, NULL, 0, '14226969485.png');

-- --------------------------------------------------------

--
-- Table structure for table `image_comment_like`
--

CREATE TABLE IF NOT EXISTS `image_comment_like` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `is_like` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `image_comment_like`
--

INSERT INTO `image_comment_like` (`id`, `user_id`, `article_id`, `image_id`, `comment_id`, `is_like`) VALUES
(1, 4, 42, 265, 3, 1),
(2, 4, 42, 264, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `is_like` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `article_id`, `is_like`, `created`) VALUES
(1, 14, 42, 1, NULL),
(2, 4, 42, 1, NULL),
(3, 12, 42, 1, NULL),
(4, 20, 42, 1, NULL),
(5, 1, 42, 1, NULL),
(6, 12, 45, 1, NULL),
(7, 1, 45, 1, NULL),
(8, 1, 27, 0, NULL),
(9, 1, 23, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `musics`
--

CREATE TABLE IF NOT EXISTS `musics` (
`id` int(11) NOT NULL,
  `musics_file` text,
  `music_name` varchar(255) DEFAULT NULL,
  `music_category` varchar(255) DEFAULT NULL,
  `music_type` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `musics`
--

INSERT INTO `musics` (`id`, `musics_file`, `music_name`, `music_category`, `music_type`, `is_active`, `created`) VALUES
(5, 'xdbyx.mp3', 'Irish Lullaby', 'pleasant', 'Pleasure', 1, '2015-01-13 07:16:30'),
(6, '547d808e4ceca.mp3', 'we wish you a merry christmas', 'pleasant', 'Pleasure', 1, NULL),
(7, NULL, 'Merry Christmas - Jingle Bells', 'pleasant', 'Pleasure', 1, NULL),
(8, NULL, 'chimney song', 'pleasant', 'Pleasure', 1, NULL),
(9, NULL, 'Little Red Nosed Reindeer', 'pleasant', 'Pleasure', 1, NULL),
(10, NULL, 'Santa Claus Is Coming To Town', 'pleasant', 'Pleasure', 1, NULL),
(11, NULL, 'Joseph Addison, Lina waterside', 'pleasant', 'Pleasure', 1, NULL),
(12, NULL, 'Canon', 'pleasant', 'Pleasure', 1, NULL),
(13, NULL, 'Walking in the rain', 'pleasant', 'Pleasure', 1, NULL),
(14, NULL, 'Helpless', 'pleasant', 'Pleasure', 1, NULL),
(15, NULL, 'Lady Di', 'pleasant', 'Pleasure', 1, NULL),
(16, NULL, 'Spring Snow', 'pleasant', 'Pleasure', 1, NULL),
(17, NULL, 'Zuiderzee tragic bird', 'pleasant', 'Pleasure', 1, NULL),
(18, NULL, 'Scottish legend', 'pleasant', 'Pleasure', 1, NULL),
(19, NULL, 'Angel From Montgomery', 'Soothing', 'Soothing', 1, NULL),
(20, NULL, 'Diamonds', 'Soothing', 'Soothing', 1, NULL),
(21, NULL, 'Christmas Eve - silent night', 'Soothing', 'Soothing', 1, NULL),
(22, NULL, 'Morning', 'Soothing', 'Soothing', 1, NULL),
(23, NULL, 'First Snow', 'Soothing', 'Soothing', 1, NULL),
(24, NULL, 'Childhood', 'Soothing', 'Soothing', 1, NULL),
(25, NULL, 'Autumn Whispers', 'Soothing', 'Soothing', 1, NULL),
(26, NULL, 'Swan Lake', 'Soothing', 'Soothing', 1, NULL),
(27, NULL, 'Maiden''s Prayer', 'Soothing', 'Soothing', 1, NULL),
(28, NULL, 'Serenade', 'Soothing', 'Soothing', 1, NULL),
(29, NULL, 'The Chimney Song', 'Fun', 'Interest', 1, NULL),
(30, NULL, 'Hunter Hunted - Keep Together', 'Sporty', 'Dynamic', 1, NULL),
(31, NULL, 'Pumpin Blood', 'Sporty', 'Dynamic', 1, NULL),
(32, NULL, 'Coins In A Fountain', 'Sporty', 'Dynamic', 1, NULL),
(33, NULL, 'the waiting game', 'Sporty', 'Dynamic', 1, NULL),
(34, NULL, 'Dancing with death', 'Sporty', 'Dynamic', 1, NULL),
(35, NULL, 'Summer Storm', 'Sporty', 'Dynamic', 1, NULL),
(36, NULL, 'Freedom cheers', 'Sporty', 'Dynamic', 1, NULL),
(37, NULL, 'Melody Of Love', 'Romantic', 'Romantic', 1, NULL),
(38, NULL, 'Because I Love You', 'Romantic', 'Romantic', 1, NULL),
(39, NULL, 'White Christmas', 'Romantic', 'Romantic', 1, NULL),
(40, NULL, 'Dream wedding', 'Romantic', 'Romantic', 1, NULL),
(41, NULL, 'Wedding march', 'Romantic', 'Romantic', 1, NULL),
(42, NULL, 'Romeo and Juliet', 'Romantic', 'Romantic', 1, NULL),
(43, NULL, 'Für Elise', 'Romantic', 'Romantic', 1, NULL),
(44, NULL, 'Take my breath away', 'Romantic', 'Romantic', 1, NULL),
(45, NULL, 'Ghost', 'Romantic', 'Romantic', 1, NULL),
(46, NULL, 'One day you''ll understand', 'Romantic', 'Romantic', 1, NULL),
(47, 'xdbyx.mp3', 'Brother Give a Hug', 'Pleasant', 'Hots', 1, '2015-01-30 11:14:25'),
(48, '547d808e4ceca.mp3', 'Sad Thai', 'Pleasant', 'Sad', 1, '2015-01-30 11:15:50');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `blog_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `user_id`, `blog_id`) VALUES
(30, 6, 1),
(31, 7, 1),
(32, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `ip` varchar(30) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `article_id`, `ip`) VALUES
(1, 13, 34, '192.168.2.67'),
(2, 11, 42, '192.168.2.220'),
(3, 13, 37, '192.168.2.220'),
(4, 11, 42, '175.139.50.109'),
(5, 11, 42, '203.106.213.104'),
(6, 13, 23, '192.168.2.220'),
(7, 13, 37, '203.106.213.104'),
(8, 4, 41, '192.168.2.220'),
(9, 11, 42, '175.139.48.93'),
(10, 15, 44, '203.106.213.104'),
(11, 1, 45, '203.106.213.104'),
(12, 11, 42, '49.202.221.200'),
(13, 14, 43, '192.168.2.220'),
(14, 15, 44, '192.168.2.220'),
(15, 13, 40, '192.168.2.220'),
(16, 13, 39, '192.168.2.220'),
(17, 13, 38, '192.168.2.220'),
(18, 13, 39, '49.202.221.200'),
(19, 13, 37, '49.202.221.200'),
(20, 13, 23, '49.202.221.200'),
(21, 13, 23, '49.14.45.82'),
(22, 11, 42, '54.234.26.153'),
(23, 11, 42, '192.168.2.101'),
(24, 13, 37, '192.168.2.101'),
(25, 13, 37, '49.201.163.51'),
(26, 11, 42, '192.168.2.58'),
(27, 11, 42, '49.201.162.243'),
(28, 11, 42, '175.141.191.106'),
(29, 13, 37, '175.139.48.93'),
(30, 13, 29, '175.139.48.93'),
(31, 1, 45, '192.168.2.220'),
(32, 1, 45, '49.201.44.49'),
(33, 1, 45, '192.168.1.175'),
(34, 12, 46, '192.168.2.220'),
(35, 11, 42, '175.139.105.12'),
(36, 13, 27, '175.139.105.12'),
(37, 12, 47, '192.168.2.220'),
(38, 13, 32, '175.139.105.12'),
(39, 1, 45, '175.139.48.93'),
(40, 1, 45, '183.171.174.29'),
(41, 11, 42, '183.171.174.29'),
(42, 1, 45, '49.202.98.5'),
(43, 11, 42, '82.35.26.50'),
(44, 1, 45, '175.141.191.106'),
(45, 1, 45, '101.226.66.175'),
(46, 11, 42, '180.153.206.29'),
(47, 1, 45, '119.147.146.189'),
(48, 1, 45, '180.153.213.141'),
(49, 11, 42, '101.226.33.222'),
(50, 1, 45, '101.226.51.230'),
(51, 11, 42, '101.226.66.193'),
(52, 13, 27, '192.168.2.220'),
(53, 13, 32, '192.168.2.220'),
(54, 13, 34, '192.168.2.220'),
(55, 13, 29, '192.168.2.220'),
(56, 1, 45, '192.168.2.101'),
(57, 1, 45, '192.168.2.71'),
(58, 11, 42, '192.168.2.71'),
(59, 13, 23, '192.168.2.71'),
(60, 1, 45, '192.168.0.50'),
(61, 13, 33, '192.168.1.175'),
(62, 11, 42, '192.168.1.175'),
(63, 13, 23, '192.168.1.175'),
(64, 11, 42, '192.168.0.50');

-- --------------------------------------------------------

--
-- Table structure for table `scroll_images`
--

CREATE TABLE IF NOT EXISTS `scroll_images` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `scroll_images`
--

INSERT INTO `scroll_images` (`id`, `name`, `order`) VALUES
(1, 'dhfc', 0),
(2, 'hqkw', 0),
(3, 'btsx', 0),
(4, 'pnyp', 0),
(5, 'tlqx', 0),
(6, 'pljh', 0),
(7, 'ncme', 0),
(8, 'viqj', 0),
(9, 'jniu', 0),
(10, 'vavc', 0),
(11, 'cftq', 0),
(12, 'mubg', 0),
(13, 'ojtk', 0),
(14, 'vmij', 0),
(15, 'csns', 0),
(16, 'qqoj', 0),
(17, 'iowr', 0),
(18, 'jftr', 0),
(19, 'lgyi', 0),
(20, 'qstq', 0),
(21, 'pmkl', 0),
(22, 'txwh', 0),
(23, 'fgim', 0),
(24, 'epet', 0),
(25, 'rebm', 0),
(26, 'ylpq', 0),
(27, 'buwu', 0),
(28, 'ppjh', 0),
(29, 'rusc', 0),
(30, 'xinf', 0),
(31, 'whhu', 0),
(32, 'nglh', 0),
(33, 'uwsx', 0),
(34, 'lljk', 0),
(35, 'zltx', 0),
(36, 'wqea', 0),
(37, 'nkrz', 0),
(38, 'idyb', 0),
(39, 'oohs', 0),
(40, 'stiv', 0),
(41, 'elib', 0),
(42, 'bqea', 0),
(43, 'fsmh', 0),
(44, 'vulj', 0),
(45, 'wxmc', 0),
(46, 'upxa', 0),
(47, 'mtns', 0),
(48, 'muqk', 0),
(49, 'xiql', 0),
(50, 'osnv', 0),
(51, 'ejmf', 0),
(52, 'fpli', 0),
(53, 'hbpk', 0),
(54, 'tbgx', 0),
(55, 'utqs', 0),
(56, 'mvkg', 0),
(57, 'scfv', 0),
(58, 'wosa', 0),
(59, 'zewq', 0),
(60, 'cnal', 0),
(61, 'eelz', 0),
(62, 'qwwt', 0),
(63, 'jbag', 0),
(64, 'kxxa', 0),
(65, 'vyor', 0),
(66, 'wqwr', 0),
(67, 'syjk', 0),
(68, 'mqvi', 0),
(69, 'losr', 0),
(70, 'eyzn', 0),
(71, 'zjli', 0),
(72, 'edim', 0),
(73, 'hghl', 0),
(74, 'glhb', 0),
(75, 'nmwx', 0),
(76, 'elre', 0),
(77, 'ysed', 0),
(78, 'mvmn', 0),
(79, 'zslj', 0),
(80, 'vaor', 0),
(81, 'dsxu', 0),
(82, 'ulpf', 0),
(83, 'blrl', 0),
(84, 'yagy', 0),
(85, 'dskv', 0),
(86, 'erep', 0),
(87, 'dfbt', 0),
(88, 'oewa', 0),
(89, 'kdct', 0),
(90, 'zcpr', 0),
(91, 'mhqb', 0),
(92, 'kwgy', 0),
(93, 'uywr', 0),
(94, 'ocil', 0),
(95, 'howd', 0),
(96, 'ysnq', 0),
(97, 'jdvo', 0),
(98, 'zule', 0),
(99, 'zurq', 0),
(100, 'sbmx', 0),
(101, 'yael', 0),
(102, 'qasv', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE IF NOT EXISTS `slots` (
`id` int(11) NOT NULL,
  `slot_no` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`id`, `slot_no`, `name`) VALUES
(1, 1, 'Slot-1'),
(2, 2, 'Slot-2'),
(3, 3, 'Slot-3'),
(4, 4, 'Slot-4');

-- --------------------------------------------------------

--
-- Table structure for table `temp_imgs`
--

CREATE TABLE IF NOT EXISTS `temp_imgs` (
`id` int(11) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `message` text,
  `is_thumb` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=211 ;

--
-- Dumping data for table `temp_imgs`
--

INSERT INTO `temp_imgs` (`id`, `image_name`, `message`, `is_thumb`) VALUES
(19, '14213089351287407838.jpg', NULL, 0),
(20, '1421308935botany.jpg', NULL, 0),
(22, '14213089444.png', NULL, 0),
(23, '14213089445.png', NULL, 0),
(24, '14213089446.png', NULL, 0),
(25, '14213089626.png', NULL, 0),
(26, '142131735312.png', NULL, 0),
(27, '14213173817.png', NULL, 0),
(28, '14213173919_1.png', NULL, 0),
(29, '14213194415.png', NULL, 0),
(30, '14213194416.png', NULL, 0),
(31, '14213194416_2.png', NULL, 0),
(32, '14213194416_3d.png', NULL, 0),
(33, '14213195645.png', NULL, 0),
(34, '14213195656.png', NULL, 0),
(35, '14213195656_2.png', NULL, 0),
(36, '14213195656_3d.png', NULL, 0),
(37, '14213195657.png', NULL, 0),
(38, '14213254956_3d.png', NULL, 0),
(39, '14213254957.png', NULL, 0),
(40, '14213254958.png', NULL, 0),
(41, '14213254959.png', NULL, 0),
(42, '14213254959_1.png', NULL, 0),
(43, '142132549510.png', NULL, 0),
(44, '142132549511.png', NULL, 0),
(45, '14213255346.png', NULL, 0),
(46, '14213255875.png', NULL, 0),
(47, '14213255876.png', NULL, 0),
(48, '14213255876_2.png', NULL, 0),
(49, '14213255876_3d.png', NULL, 0),
(50, '14213255877.png', NULL, 0),
(51, '14213255878.png', NULL, 0),
(52, '14213255879.png', NULL, 0),
(53, '14213255879_1.png', NULL, 0),
(54, '142132558810.png', NULL, 0),
(55, '142132558811.png', NULL, 0),
(56, '142132558812.png', NULL, 0),
(57, '14213260076.png', NULL, 0),
(58, '14213260076_2.png', 'fsdf', 0),
(59, '14213260076_3d.png', '0', 1),
(60, '14213260077.png', NULL, 0),
(61, '14213260078.png', NULL, 0),
(62, '14213260079.png', NULL, 0),
(63, '14213260079_1.png', NULL, 0),
(64, '142132600710.png', NULL, 0),
(65, '142132600811.png', NULL, 0),
(66, '142132600812.png', NULL, 0),
(67, '14213276296_2.png', NULL, 0),
(68, '14213276296_3d.png', NULL, 0),
(69, '14213276297.png', NULL, 0),
(70, '14213276298.png', NULL, 0),
(73, '14213307848.png', NULL, 0),
(74, '1421331832remeo.ogg', NULL, 0),
(75, '14213318401287407838.jpg', NULL, 0),
(76, '1421386459permission.png', NULL, 0),
(77, '1421386517permission.png', NULL, 0),
(78, '1421386765permission.png', NULL, 0),
(79, '1421386805News1.png', NULL, 0),
(80, '1421386805save_news.png', NULL, 0),
(81, '14213868317.png', NULL, 0),
(82, '14213869196_3d.png', NULL, 0),
(83, '14213870228.png', NULL, 0),
(84, '14213876908.png', NULL, 0),
(85, '14213876909.png', NULL, 0),
(86, '14213876909_1.png', NULL, 0),
(87, '142138769010.png', NULL, 0),
(88, '142138769011.png', NULL, 0),
(89, '142138769012.png', NULL, 0),
(90, '1421387690News1.png', NULL, 0),
(91, '1421387690save_news.png', NULL, 0),
(92, '1421387707remeo.ogg', NULL, 0),
(93, '14213877131287407838.jpg', NULL, 0),
(94, '14213880536.png', NULL, 0),
(95, '14213880536_2.png', 'dfgsdf', 0),
(96, '14213880536_3d.png', NULL, 0),
(97, '14213880537.png', NULL, 0),
(98, '14213880538.png', NULL, 0),
(99, '14213880539.png', NULL, 0),
(100, '14213882691287407838.jpg', NULL, 0),
(101, '1421388269botany.jpg', NULL, 0),
(102, '1421388274botany.jpg', NULL, 0),
(104, '1421394733huanxige.jpg', NULL, 0),
(105, '1421394733noeyesee.jpg', NULL, 0),
(106, '1421394734spongebob.jpg', NULL, 0),
(107, '1421394746page1.png', NULL, 0),
(108, '1421394746page2.png', NULL, 0),
(109, '1421394758deidara.png', NULL, 0),
(110, '1421394849deidara.png', '0', 1),
(111, '1421394849FACEPALM.png', NULL, 0),
(112, '1421394849huanxige.jpg', NULL, 0),
(113, '1421394849kirito.jpg', NULL, 0),
(114, '1421394849noeyesee.jpg', NULL, 0),
(115, '1421394849pork_chop_raw.jpg', NULL, 0),
(116, '1421395238page1.png', NULL, 0),
(117, '1421395238page2.png', NULL, 0),
(118, '1421401975page1.png', NULL, 0),
(119, '1421401975page2.png', NULL, 0),
(120, '14214038591287407838.jpg', NULL, 0),
(121, '1421403859botany.jpg', NULL, 0),
(122, '14214038653.png', NULL, 0),
(123, '14214038654.png', NULL, 0),
(124, '14214038655.png', NULL, 0),
(125, '14214038656.png', NULL, 0),
(126, '14214038656_2.png', NULL, 0),
(127, '14214038656_3d.png', NULL, 0),
(128, '14214038657.png', NULL, 0),
(129, '14214186371287407838.jpg', NULL, 0),
(130, '1421418638botany.jpg', NULL, 0),
(131, '1421418638permission.png', NULL, 0),
(132, '14214681871287407838.jpg', NULL, 0),
(133, '1421661109doc1.png', NULL, 0),
(134, '1421661186stand_by_me_doraemon_drama.jpg', NULL, 0),
(135, '1421661341doc2.png', NULL, 0),
(136, '1421661361doc2.png', NULL, 0),
(137, '1421661509doc3.png', NULL, 0),
(138, '1421661640doc4.png', NULL, 0),
(139, '1421661703doc5.png', NULL, 0),
(140, '1421662364sprite.png', NULL, 0),
(141, '1421662383contentPattern.png', NULL, 0),
(142, '14216655714.png', NULL, 0),
(143, '14216655715.png', NULL, 0),
(144, '14216655726.png', NULL, 0),
(145, '14216655726_2.png', NULL, 0),
(146, '14216655726_3d.png', NULL, 0),
(147, '14216655727.png', NULL, 0),
(148, '14216655728.png', NULL, 0),
(149, '14216655729.png', NULL, 0),
(150, '14216655729_1.png', NULL, 0),
(151, '142166557310.png', NULL, 0),
(152, '14216655811287407838.jpg', NULL, 0),
(153, '1421665594botany.jpg', NULL, 0),
(154, '14216656884.png', NULL, 0),
(155, '14216656885.png', NULL, 0),
(156, '14216656886.png', NULL, 0),
(157, '14216656886_2.png', NULL, 0),
(158, '14216656886_3d.png', NULL, 0),
(159, '14216656887.png', NULL, 0),
(160, '14216656888.png', NULL, 0),
(161, '14216656889.png', NULL, 0),
(162, '14216656889_1.png', NULL, 0),
(163, '142166568810.png', NULL, 0),
(164, '142166568811.png', NULL, 0),
(165, '142166568812.png', NULL, 0),
(166, '1421665692botany.jpg', NULL, 0),
(167, '1421740434images.jpeg', NULL, 0),
(168, '1421740434McLaren-MP4-12C-luxury-cars-12.jpg', NULL, 0),
(169, '142174043403cars1.jpg', NULL, 0),
(170, '142174043406car5.jpg', NULL, 0),
(171, '1421740519Duesenberg.jpg', NULL, 0),
(172, '1421740548Duesenberg.jpg', NULL, 0),
(173, '14218352043.png', NULL, 0),
(174, '14218352044.png', NULL, 0),
(175, '14218352045.png', NULL, 0),
(176, '14218352046.png', NULL, 0),
(177, '14218352046_2.png', NULL, 0),
(178, '14218352046_3d.png', NULL, 0),
(179, '14218352047.png', NULL, 0),
(180, '14218352048.png', NULL, 0),
(181, '14218352049.png', NULL, 0),
(182, '14218352049_1.png', NULL, 0),
(183, '142183520410.png', NULL, 0),
(184, '142183520411.png', NULL, 0),
(185, '142183520412.png', NULL, 0),
(186, '1421835204News1.png', NULL, 0),
(187, '14218372603.png', NULL, 0),
(188, '14218372681287407838.jpg', NULL, 0),
(189, '1422388808??-?????.mp3', NULL, 0),
(190, '14226049861287407838.jpg', NULL, 0),
(191, '1422604988botany.jpg', NULL, 0),
(192, '1422604990permission.png', NULL, 0),
(193, '1422617276reason1.png', NULL, 0),
(194, '1422617276reason2.png', 'Test', 0),
(195, '1422617380mengwu.jpg', NULL, 0),
(196, '1422617712reason3.png', NULL, 0),
(197, '1422617722reason4 - Copy.png', NULL, 0),
(198, '1422617722reason5 - Copy.png', NULL, 0),
(199, '1422696135jpg', NULL, 0),
(200, '1422696148jpg', NULL, 0),
(201, '1422696148jpg', NULL, 0),
(202, '1422696148png', NULL, 0),
(203, '1422696154jpg', NULL, 0),
(204, '1422696161botany.jpg', NULL, 0),
(205, '14226969481.jpg', NULL, 0),
(206, '14226969482.jpg', NULL, 0),
(207, '14226969483.jpg', NULL, 0),
(208, '14226969484.jpg', NULL, 0),
(209, '14226969485.png', NULL, 0),
(210, '14226969541408523508_oconnor-e1363008742341-392x246.jpg', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `fb_id` bigint(20) DEFAULT NULL,
  `tw_id` bigint(20) DEFAULT NULL,
  `gl_id` bigint(20) DEFAULT NULL,
  `user_type_id` int(11) NOT NULL DEFAULT '2',
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `mobile` varchar(15) NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fb_id`, `tw_id`, `gl_id`, `user_type_id`, `firstname`, `lastname`, `username`, `password`, `email`, `gender`, `dob`, `address`, `is_active`, `mobile`, `created`) VALUES
(1, NULL, NULL, NULL, 1, 'Vivek', 'Jain', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@admin.com', 'Male', NULL, NULL, 1, '', NULL),
(4, NULL, NULL, NULL, 2, 'Vivek', 'Jain', 'vivek', 'e10adc3949ba59abbe56e057f20f883e', 'vivek.jdf@cisinlabs.com', 'Male', '1987-05-05', NULL, 1, '1236547890', NULL),
(6, NULL, NULL, NULL, 2, 'TEst1', 'TEst12', 'admin2', 'e10adc3949ba59abbe56e057f20f883e', 'tet@dfgs.co', 'Male', NULL, NULL, 0, '', NULL),
(7, NULL, NULL, NULL, 2, 'gsdfg', 'sdfsdf', 'admind', 'e10adc3949ba59abbe56e057f20f883e', 'sdfg@d.gg', 'Male', NULL, NULL, 1, '', NULL),
(8, NULL, NULL, NULL, 2, 'vivek', 'Jain', 'vivek.j', '0b684f705f17ba18163f3f05a147db0f', 'vivek.j@cisinlabs.com', 'Male', '2015-01-21', 'test', 1, '', NULL),
(9, NULL, NULL, NULL, 2, 'Vivek', 'Jain', 'vivekj', 'e10adc3949ba59abbe56e057f20f883e', 'sdfg@d2.gg', 'Male', '2015-01-14', 'sdf', 1, '', NULL),
(10, NULL, NULL, NULL, 2, 'Vivek', 'Jain', 'adminaa', 'e10adc3949ba59abbe56e057f20f883e', 'sdfg@da2.gg', 'Male', '2015-01-20', 'gf', 1, '', NULL),
(11, NULL, NULL, NULL, 2, 'Alex', 'Chong', 'chon9', '8f036369a5cd26454949e594fb9e0a2d', 'alexchon9@gmail.com', 'Male', '2015-01-02', NULL, 1, '0166379722', NULL),
(12, NULL, NULL, NULL, 2, 'jone', 'jone', 'jone', '15c70ebb880b7cfdae8885cee11ce3ef', 'jone@jone.com', 'Male', '2015-01-04', NULL, 1, '1236547890', NULL),
(13, NULL, NULL, NULL, 2, 'root', 'treant', 'root', 'e10adc3949ba59abbe56e057f20f883e', 'kelvin_cr7@hotmail.com', 'Male', '1990-03-23', NULL, 1, '0123456789', NULL),
(14, NULL, NULL, NULL, 2, 'Johan', 'Rao', 'johan', 'e10adc3949ba59abbe56e057f20f883e', 'johan@johan.com', 'Male', '1985-01-10', NULL, 1, '1236547890', NULL),
(15, NULL, NULL, NULL, 2, 'Alice', 'Cullen', 'Alice', 'f5deef6939865d7fb7e1adc0a4d64a29', 'Alice@mailinator.com', 'Female', '1900-01-22', NULL, 1, '7879626427', NULL),
(16, NULL, NULL, NULL, 2, '1234', '1234', 'ankita', '717989627af3e9e6fd2ff4da7a0b815c', 'ankita123@mailinator.com', 'Female', '1900-01-01', NULL, 1, '7879626427', NULL),
(17, NULL, 2754904789, NULL, 2, 'vivek', 'jain', NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2015-01-27 13:58:25'),
(18, 642242152569536, NULL, NULL, 2, 'Kshitij', 'Shukla', NULL, NULL, NULL, 'male', NULL, NULL, 1, '', '2015-01-28 07:46:58'),
(19, 1599836623582672, NULL, NULL, 2, 'Vivek', 'Jain', NULL, NULL, NULL, 'male', NULL, NULL, 1, '', '2015-01-28 07:49:39'),
(20, NULL, NULL, NULL, 2, 'Johan', 'Tom', 'johan2', 'e10adc3949ba59abbe56e057f20f883e', 'johanq@johan.com', 'Male', '1980-01-16', NULL, 1, '1236547890', NULL),
(21, NULL, NULL, NULL, 2, 'chandni', 'porwal', 'chandni', 'c272bad862b4bfd04ea27c4f778de030', 'chandni.p@cisinlabs.com', 'Female', '1900-01-01', NULL, 1, '123456789', NULL),
(22, NULL, NULL, NULL, 2, 'chandni', 'porwal', 'chandni123', 'e10adc3949ba59abbe56e057f20f883e', 'chandni.p@mailinator.com', 'Female', '1900-01-01', NULL, 1, '123456789', NULL),
(23, NULL, NULL, NULL, 2, 'chandni', 'porwal', '1234', '025f0cfe9cc46232f93348455eca6141', 'chandni@mailinator.com', 'Female', '1900-01-01', NULL, 1, '123456789', NULL),
(24, NULL, NULL, NULL, 2, 'chandni', 'porwal', 'chandniporwal', '75bb5f56c89ea09c9788582bc8b8d5fa', 'chandniporwal@mailinator.com', 'Female', '1900-01-01', NULL, 1, '123456789', NULL),
(25, NULL, NULL, NULL, 2, 'chandni', 'porwal', 'chandnip', 'e10adc3949ba59abbe56e057f20f883e', 'chandnip@mailinator.com', 'Female', '1900-01-01', NULL, 1, '123456', NULL),
(26, NULL, NULL, NULL, 2, 'chandni', 'porwal', 'vivekjain1', 'ac39bc3cbcd534333362c32289c4a4f2', 'vivekjainasd@mailinator.com', 'Male', '1900-01-01', NULL, 1, '123456', NULL),
(27, NULL, NULL, NULL, 2, 'test', 'test', 'test', '827ccb0eea8a706c4c34a16891f84e7b', 'test@mailinator.com', 'Female', '1900-01-01', NULL, 1, '12345', NULL),
(28, NULL, NULL, NULL, 2, 'test', 'test', 'chandni78', '312c64de9eb3cfeebe5c0839462ac4c4', 'chandni78@mailinator.com', 'Female', '1900-01-01', NULL, 1, '123456', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertise`
--
ALTER TABLE `advertise`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_categories`
--
ALTER TABLE `article_categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_segments`
--
ALTER TABLE `file_segments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_comment_like`
--
ALTER TABLE `image_comment_like`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `musics`
--
ALTER TABLE `musics`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scroll_images`
--
ALTER TABLE `scroll_images`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_imgs`
--
ALTER TABLE `temp_imgs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertise`
--
ALTER TABLE `advertise`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `article_categories`
--
ALTER TABLE `article_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=164;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `file_segments`
--
ALTER TABLE `file_segments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=301;
--
-- AUTO_INCREMENT for table `image_comment_like`
--
ALTER TABLE `image_comment_like`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `musics`
--
ALTER TABLE `musics`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `scroll_images`
--
ALTER TABLE `scroll_images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `temp_imgs`
--
ALTER TABLE `temp_imgs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=211;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
