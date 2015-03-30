-- phpMyAdmin SQL Dump
-- version 4.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2015 at 07:55 AM
-- Server version: 5.5.42-cll
-- PHP Version: 5.4.38

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
  `status` int(11) NOT NULL DEFAULT '1',
  `add_slot_no` int(11) NOT NULL,
  `schedule_no` int(11) NOT NULL,
  `slot_id` int(11) DEFAULT NULL,
  `cust_name` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `advrtise_file` varchar(255) DEFAULT NULL,
  `target_url` text NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=233 ;

--
-- Dumping data for table `advertise`
--

INSERT INTO `advertise` (`id`, `status`, `add_slot_no`, `schedule_no`, `slot_id`, `cust_name`, `start_date`, `end_date`, `advrtise_file`, `target_url`, `created`) VALUES
(189, 0, 1, 0, 1, NULL, NULL, NULL, NULL, '', NULL),
(190, 0, 1, 0, 2, 'Test', '2015-02-19', '2015-02-21', '1424152024_bf8f9a_cb4aaa8971614366a8cdd2e070a0bb0f.png_srz_467_128_85_22_0.50_1.20_0.00_png_srz.png', 'http://google.com', '2015-02-17 05:47:12'),
(191, 0, 1, 0, 3, NULL, NULL, NULL, NULL, '', NULL),
(192, 0, 1, 0, 4, NULL, NULL, NULL, NULL, '', NULL),
(193, 0, 2, 0, 1, NULL, NULL, NULL, NULL, '', NULL),
(194, 1, 2, 0, 2, NULL, NULL, NULL, NULL, '', NULL),
(195, 1, 2, 0, 3, NULL, NULL, NULL, NULL, '', NULL),
(196, 1, 2, 0, 4, NULL, NULL, NULL, NULL, '', NULL),
(197, 0, 1, 0, 1, 'dsfsd Vivek Jain', '2015-02-11', '2015-02-13', '1423638139_Partners-JDEtips-467x128.png', 'http://www.test.com', '2015-02-11 07:02:19'),
(198, 0, 2, 0, 1, '', '0000-00-00', '0000-00-00', '', '', '2015-02-11 07:03:14'),
(199, 0, 1, 0, 4, 'dsfsd Vivek Jain', '2015-02-11', '2015-02-13', '1423638252_index_22.png', 'http://www.test.com', '2015-02-11 07:04:12'),
(200, 0, 1, 0, 3, 'dsfsd Vivek Jain', '2015-02-11', '2015-02-13', '1423638279_bf8f9a_cb4aaa8971614366a8cdd2e070a0bb0f.png_srz_467_128_85_22_0.50_1.20_0.00_png_srz.png', 'http://www.test.com', '2015-02-11 07:04:39'),
(201, 1, 3, 0, 1, NULL, NULL, NULL, NULL, '', NULL),
(202, 1, 3, 0, 2, NULL, NULL, NULL, NULL, '', NULL),
(203, 1, 3, 0, 3, NULL, NULL, NULL, NULL, '', NULL),
(204, 1, 3, 0, 4, NULL, NULL, NULL, NULL, '', NULL),
(205, 0, 2, 0, 1, 'dsdsds', '2015-03-20', '2015-02-27', '1424110826_yolo1.jpg', 'http://www.2982.com', '2015-02-16 18:20:26'),
(206, 0, 1, 0, 1, 'a', '2015-02-16', '2015-02-20', '1424076517_Hydrangeas.jpg', 'http://http://fss.pd.cisinlive.com/admin/advertise/manage', '2015-02-16 08:48:37'),
(207, 1, 1, 0, 3, NULL, NULL, NULL, NULL, '', NULL),
(208, 0, 1, 0, 4, 'First Ad', '2015-02-17', '2015-02-25', '1424152242__wsb_467x128_tncpsbanner.jpg', 'http://google.com', '2015-02-17 05:50:48'),
(209, 1, 4, 0, 1, NULL, NULL, NULL, NULL, '', NULL),
(210, 1, 4, 0, 2, NULL, NULL, NULL, NULL, '', NULL),
(211, 1, 4, 0, 3, NULL, NULL, NULL, NULL, '', NULL),
(212, 1, 4, 0, 4, NULL, NULL, NULL, NULL, '', NULL),
(213, 0, 5, 0, 1, '', '0000-00-00', '0000-00-00', '', '', NULL),
(214, 1, 5, 0, 2, NULL, NULL, NULL, NULL, '', NULL),
(215, 1, 5, 0, 3, NULL, NULL, NULL, NULL, '', NULL),
(216, 1, 5, 0, 4, NULL, NULL, NULL, NULL, '', NULL),
(217, 1, 5, 0, 1, NULL, NULL, NULL, NULL, '', NULL),
(218, 0, 2, 0, 1, 'Roller', '2015-02-17', '2015-02-28', '1424110860_yolo1.jpg', 'http://www.ggoogle.com', '2015-02-16 18:21:00'),
(219, 0, 2, 0, 1, NULL, NULL, NULL, NULL, '', NULL),
(220, 0, 2, 0, 1, '', '0000-00-00', '0000-00-00', '', '', '2015-02-17 05:57:01'),
(221, 0, 1, 0, 2, 'dsfsd', '2015-02-17', '2015-02-21', '1424152156_Partners-JDEtips-467x128.png', 'http://google.com', '2015-02-17 05:50:20'),
(222, 0, 2, 0, 1, 'a', '2015-02-17', '2015-02-17', NULL, 'http://google.com', '2015-02-17 08:31:15'),
(223, 1, 6, 0, 1, NULL, NULL, NULL, NULL, '', NULL),
(224, 1, 6, 0, 2, NULL, NULL, NULL, NULL, '', NULL),
(225, 1, 6, 0, 3, NULL, NULL, NULL, NULL, '', NULL),
(226, 1, 6, 0, 4, NULL, NULL, NULL, NULL, '', NULL),
(227, 0, 2, 0, 1, 'aa', '2015-02-18', '2015-02-20', NULL, 'http://google.com', '2015-02-17 08:32:21'),
(228, 0, 1, 0, 1, '', '0000-00-00', '0000-00-00', '', '', '2015-03-17 09:35:16'),
(229, 1, 2, 0, 1, NULL, NULL, NULL, NULL, '', NULL),
(230, 1, 1, 0, 2, NULL, NULL, NULL, NULL, '', NULL),
(231, 1, 1, 0, 4, NULL, NULL, NULL, NULL, '', NULL),
(232, 1, 1, 0, 1, 'Roller', '2015-03-17', '2015-03-18', '1426584957_jeansoflove.png', 'http://www.bc1962.com', '2015-03-17 09:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `advertise_schedule`
--

CREATE TABLE IF NOT EXISTS `advertise_schedule` (
`id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `add_slot_no` int(11) DEFAULT NULL,
  `slot_id` int(11) DEFAULT NULL,
  `advertise_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `cust_name` varchar(255) DEFAULT NULL,
  `advrtise_file` varchar(255) DEFAULT NULL,
  `target_url` varchar(255) DEFAULT NULL,
  `schedule_no` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `advertise_schedule`
--

INSERT INTO `advertise_schedule` (`id`, `status`, `add_slot_no`, `slot_id`, `advertise_id`, `start_date`, `end_date`, `cust_name`, `advrtise_file`, `target_url`, `schedule_no`, `created`) VALUES
(3, 0, 1, 1, NULL, '2015-02-11', '2015-02-13', 'dsfsd Vivek Jain', '1423638139_Partners-JDEtips-467x128.png', 'http://www.test.com', NULL, '2015-02-11 07:02:19'),
(4, 0, 2, 1, NULL, '2015-02-11', '2015-02-13', 'First Ad', '1423638194_fbde8fd843a17f348522a43deb467465.png_srz_467_128_75_22_0.50_1.20_0.00_png_srz.png', 'http://www.test.com', NULL, '2015-02-11 07:03:14'),
(5, 0, 1, 4, NULL, '2015-02-11', '2015-02-13', 'dsfsd Vivek Jain', '1423638252_index_22.png', 'http://www.test.com', NULL, '2015-02-11 07:04:12'),
(6, 0, 1, 3, NULL, '2015-02-11', '2015-02-13', 'dsfsd Vivek Jain', '1423638279_bf8f9a_cb4aaa8971614366a8cdd2e070a0bb0f.png_srz_467_128_85_22_0.50_1.20_0.00_png_srz.png', 'http://www.test.com', NULL, '2015-02-11 07:04:39'),
(10, 1, 1, 1, NULL, '2015-02-20', '2015-02-28', 'aa', NULL, 'http://google.com', NULL, '2015-02-16 09:13:59'),
(12, 1, 1, 1, NULL, '2015-02-26', '2015-02-21', 'Roller', '1424110774_yolo1.jpg', 'http://www.ggoogle.com', NULL, '2015-02-16 18:19:34'),
(13, 0, 2, 1, NULL, '2015-02-17', '2015-02-27', 'Roller', '1424110883_yolo1.jpg', 'http://www.ggoogle.com', NULL, '2015-02-16 18:21:23'),
(14, 1, 2, 1, NULL, '2015-02-25', '2015-02-28', 'First Ad', '1424152322__wsb_467x128_tncpsbanner.jpg', 'http://www.test.com', NULL, '2015-02-17 05:52:02'),
(15, 0, 2, 1, NULL, '2015-02-18', '2015-02-20', 'aa', NULL, 'http://google.com', NULL, '2015-02-17 08:32:21'),
(16, 1, 2, 1, NULL, '2015-02-26', '2015-02-20', 'test', NULL, 'http://google.com', NULL, '2015-02-17 08:34:51'),
(17, 1, 1, 1, NULL, '2015-03-18', '2015-03-19', 'Roller', '1426585020_jeansoflove.png', 'http://www.google.com', NULL, '2015-03-17 09:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `page_no` int(11) DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tel_no` varchar(15) DEFAULT NULL,
  `music_id` int(11) DEFAULT NULL,
  `music_file` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `share_img` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `share_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `share_text` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `is_published` tinyint(4) DEFAULT NULL,
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
  `categories` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `page_no`, `title`, `tel_no`, `music_id`, `music_file`, `share_img`, `share_title`, `share_text`, `is_published`, `is_active`, `is_draft`, `read_count`, `favorites_count`, `qr_code_url`, `cover_img`, `qr_code_img`, `is_watermark`, `is_delete`, `created`, `updated`, `is_editor`, `categories`) VALUES
(19, 4, NULL, 'This is test 16_01', '1236547890', NULL, '', '14213870228.png', 'test 123', 'test', 3, 0, 0, 0, 0, NULL, NULL, 'qr99794743c68c260cd0215350fae20357.png', 1, 1, '2015-01-16 06:43:54', '0000-00-00 00:00:00', '', ''),
(20, 4, NULL, '16_01_2015', '2136547890', 5, '1421387707remeo.ogg', '14213877131287407838.jpg', 'test', 'tets', 1, 1, 0, 0, 0, NULL, NULL, 'qr52eb06652ce0872e1542e523c22d8a13.png', 1, 1, '2015-01-19 13:05:59', '0000-00-00 00:00:00', '1', ''),
(22, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 0, 0, 0, 0, 0, NULL, NULL, 'qr85a0f58c405df27856c9b07c79a72e51.png', 1, 1, '2015-01-19 13:02:02', '0000-00-00 00:00:00', '', ''),
(23, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 0, 5, 1, NULL, NULL, 'qrb05e06305f30145a7678feb26431150a.png', 1, 1, '2015-01-16 07:54:43', '0000-00-00 00:00:00', '1', ''),
(24, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 1, 0, 0, NULL, NULL, 'qreb6c913693df23aeda6ccb73d87b4edb.png', 1, 1, '2015-01-16 07:54:44', '0000-00-00 00:00:00', '1', ''),
(25, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 1, 1, 0, NULL, NULL, 'qr148f0eb205f8afa2b6d792b8918210b3.png', 1, 1, '2015-01-16 07:54:44', '0000-00-00 00:00:00', '', ''),
(26, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 0, 0, 0, 0, 0, NULL, NULL, 'qra13e199982ee103d39f876347cecf78c.png', 1, 1, '2015-01-16 07:54:45', '0000-00-00 00:00:00', '', ''),
(27, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 0, 2, 0, NULL, NULL, 'qr694bc1fdf8c7658f3002a9194c00cef1.png', 1, 1, '2015-01-16 07:54:46', '0000-00-00 00:00:00', '', ''),
(28, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 0, 0, 0, 0, 0, NULL, NULL, 'qr315f802e244f04af08622477191afa51.png', 1, 1, '2015-01-27 20:05:16', '0000-00-00 00:00:00', '', ''),
(29, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 0, 2, 0, NULL, NULL, 'qrfc407807e265e22a26e268068a8a97ee.png', 1, 1, '2015-01-16 07:54:55', '0000-00-00 00:00:00', '', ''),
(30, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 0, 0, 1, 0, 0, NULL, NULL, 'qrf8b8b73aa9275dcad29b8d88bf0f12e5.png', 1, 1, '2015-01-16 07:54:56', '0000-00-00 00:00:00', '', ''),
(31, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 1, 0, 0, NULL, NULL, 'qrcc38209348b4a9782fbc2b49a90e2c55.png', 1, 1, '2015-01-16 07:54:56', '0000-00-00 00:00:00', '', ''),
(32, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 0, 2, 0, NULL, NULL, 'qr9fc728857474ab4f65e6fc12dad69a23.png', 1, 1, '2015-01-16 07:55:38', '0000-00-00 00:00:00', '', ''),
(33, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 0, 1, 0, NULL, NULL, 'qr9827f20cfea4e7cf4ced9459fededd50.png', 1, 1, '2015-01-16 07:55:39', '0000-00-00 00:00:00', '', ''),
(34, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 0, 2, 0, NULL, NULL, 'qref6d347bfe94cf39a18b52f3e2e4aeff.png', 1, 1, '2015-01-16 07:55:39', '0000-00-00 00:00:00', '1', ''),
(35, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 1, 0, 0, NULL, NULL, 'qr07d07403bcf85f8a7a3b0b102e98578f.png', 1, 1, '2015-01-16 07:55:40', '0000-00-00 00:00:00', '', ''),
(36, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 1, 0, 0, NULL, NULL, 'qra5de61c985ad85ace5460c27e412ac40.png', 1, 1, '2015-01-16 07:55:41', '0000-00-00 00:00:00', '', ''),
(37, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 1, 1, 0, 7, 0, NULL, NULL, 'qr15bb2cb39419ca8d70e8d04fefb6309c.png', 1, 1, '2015-01-16 07:55:44', '0000-00-00 00:00:00', '', ''),
(38, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 0, 0, 0, 1, 0, NULL, NULL, 'qrb60c8b89b21a1c06267f5607af9cef57.png', 1, 1, '2015-01-16 07:56:06', '0000-00-00 00:00:00', '', ''),
(39, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 0, 0, 0, 2, 0, NULL, NULL, 'qr7dd294c62aff0c347c1fd2d74d747ce4.png', 1, 1, '2015-01-16 07:56:06', '0000-00-00 00:00:00', '', ''),
(40, 13, NULL, 'Dota ?????', '0123456789', 6, '', '1421394758deidara.png', 'Dota ?????', 'Defence of Tower Ancient', 0, 0, 0, 1, 0, NULL, NULL, 'qr57e822ec4e9b24dff2a4f5d89f15bece.png', 1, 1, '2015-01-16 07:56:06', '0000-00-00 00:00:00', '', ''),
(41, 4, NULL, 'test', '3434535555', 0, '', '', '', '', 1, 1, 0, 19, 0, NULL, NULL, 'qrd406b6b95daef62ae1e7e76333e1b024.png', 1, 0, '2015-02-17 09:50:16', '0000-00-00 00:00:00', '1', 'Character,History,'),
(42, 11, NULL, 'Friendship Forever', '0136379777', 0, '1423033322dingdong.mp3', '1421661186stand_by_me_doraemon_drama.jpg', 'Friendship this is Friendship', 'Friendship this is Friendship', 1, 1, 0, 44, 7, NULL, NULL, 'qr4c016db6dd561cc7fa9f0669f10a30e8.png', 1, 0, '2015-02-04 07:02:03', '0000-00-00 00:00:00', '1', 'Character,Emotion,Cartoon,'),
(43, 14, NULL, 'sdfgsdf', '5634643564', 0, '', '1421665692botany.jpg', '', '', 0, 0, 0, 7, 0, NULL, NULL, 'qrd469de763884d097aaaa9b6bf9ef6ddc.png', 0, 0, '2015-01-19 11:08:24', '0000-00-00 00:00:00', '', ''),
(44, 15, NULL, 'Ultra-luxury car', '9993131425', 0, '', '1421740548Duesenberg.jpg', 'Bentley Mulsanne', 'ultra-luxury car', 0, 0, 0, 3, 0, NULL, NULL, 'qr647537186e1817b3066f9c62a0498bfa.png', 1, 0, '2015-01-27 20:06:20', '0000-00-00 00:00:00', '', 'News,Science and Technology,Car,'),
(45, 1, NULL, 'Reason to Leave', '0108288222', 47, '', '1422617380mengwu.jpg', 'Reason you should leave current company', 'Reason you should leave current company', 1, 1, 0, 31, 2, NULL, NULL, 'qrd8d1e7ee9b7589423cae65944d9ee1c0.png', 1, 0, '2015-01-31 07:08:51', '0000-00-00 00:00:00', '1', 'History,News,Finance and economics,'),
(46, 12, NULL, 'test', '1223333333', 4, '', '1422696161botany.jpg', 'tstsd', 'sdfsdgf', 0, 0, 0, 2, 0, NULL, NULL, 'qr7a35ac181cffe5a5aacbda84561cf2ad.png', 1, 1, '2015-01-31 09:22:58', '0000-00-00 00:00:00', '', 'Scenery,Character,History,'),
(47, 12, NULL, 'fgsdfgsd', '6345345345', 4, '', '14226969541408523508_oconnor-e1363008742341-392x246.jpg', 'gsdfgsdf', 'sdfsgdf', 0, 0, 0, 1, 0, NULL, NULL, 'qr6eeae6a03055316bb4bd87f2efdb5cef.png', 1, 0, '2015-01-31 09:36:01', '0000-00-00 00:00:00', '', 'Gender,Constellation,Other,'),
(48, 28, NULL, 'testing', '12345', 0, '', '1423038885Desert.jpg', 'test', 'abc', 1, 1, 0, 18, 1, NULL, NULL, 'qr5bf372f843437c9e62355acd4a5b4f29.png', 1, 0, '2015-02-17 08:52:52', '0000-00-00 00:00:00', '0', 'Scenery,Character,History,'),
(49, 11, NULL, 'What is Love Vol 1', '012345678', 48, '', '1423053817lol.jpg', 'What is Love Vol 1', 'What is Love Vol 1', 1, 1, 0, 30, 0, NULL, NULL, 'qr3c5bcf94064c62d6583024b3076d5db3.png', 0, 0, '2015-02-16 09:17:30', '0000-00-00 00:00:00', '1', 'Character,Gender,Emotion,'),
(50, 4, NULL, 'test', '5234523452', 0, '', '1423114890Partners-JDEtips-467x128.png', '', '', 3, 0, 1, 0, 0, NULL, NULL, 'qr206ef6897f664f8ff989129ac605bcb2.png', 1, 0, '2015-02-05 06:12:09', '0000-00-00 00:00:00', '', 'Character,History,'),
(51, 11, NULL, 'All is Well', '012345678', 0, '1423121201alliswell.mp3', '1423121266images.jpg', 'All is Well', 'All is Well, don''t worry, be happy', 1, 1, 0, 38, 1, NULL, NULL, 'qrbb851add2d7e9d3863c800086a59de08.png', 0, 0, '2015-02-05 07:33:29', '0000-00-00 00:00:00', '', 'Character,Gender,Emotion,'),
(52, 4, NULL, 'Pani Da Rum', '9999999999', 0, '142320415604 - Pani Da Rang (Male) (MyMp3Song.Com).mp3', '1423204208hqdefault.jpg', 'Color', '..........', 1, 1, 0, 26, 0, NULL, NULL, 'qrdc75e6c5b7821ba0a21b78b36c0b914a.png', 0, 0, '2015-02-09 11:22:58', '0000-00-00 00:00:00', '', 'History,Estate,Emotion,'),
(53, 1, NULL, '', '', 0, '', '', '', '', 3, 0, 1, 2, 0, NULL, NULL, 'qrb339867bc535f49b3a478421eeb7367a.png', 0, 0, '2015-02-06 12:23:03', '0000-00-00 00:00:00', '', ''),
(54, 11, NULL, '', '', 0, '', '', '', '', 3, 0, 1, 2, 0, NULL, NULL, 'qr6c636bc31502b8b0e4836c73634c9575.png', 0, 0, '2015-02-07 07:54:44', '0000-00-00 00:00:00', '', ''),
(55, 13, NULL, '可惜没如果 if only', '0123456789', 0, '1423492595ifonly.mp3', '1423480384mag3.jpg', '?????', '?????', 1, 1, 0, 87, 0, NULL, NULL, 'qr5ee7e8ea876e4212c397d73a6b2055b5.png', 0, 0, '2015-02-09 14:37:00', '0000-00-00 00:00:00', '', 'Entertainment,Music,Other,'),
(56, 11, NULL, '3 Stupid Pigs', '01234567', 0, '1423641157tiger.mp3', '1423640121sp_open.png', '3 Stupid Pigs', '3 Stupid Pigs', 1, 1, 0, 82, 1, NULL, NULL, 'qr2dcf621c47011d54cf48b7cffd2c3734.png', 0, 0, '2015-02-11 08:52:55', '0000-00-00 00:00:00', '', 'Character,History,Emotion,'),
(57, 1, NULL, 'sdfgsd', '4564564564', 5, '', '1423644673rang-de-basanti.gif.jpeg', 'sdfsdfg', 'sdfgsd', 0, 0, 0, 2, 0, NULL, NULL, 'qr2d8b91d8db9509ddd45b8ec0087199cf.png', 1, 0, '2015-02-16 18:13:32', '0000-00-00 00:00:00', '1', 'Finance and economics,'),
(58, 28, NULL, 'testing', '12345', 0, '', '1424074449Chrysanthemum.jpg', 'test', 'test', 1, 1, 0, 22, 0, NULL, NULL, 'qr8584470fee1303e5a6f8a914dcd1fecd.png', 0, 0, '2015-02-16 08:19:32', '0000-00-00 00:00:00', '1', 'Scenery,Character,History,'),
(59, 12, NULL, 'Test', '8546532132', 16, '', '1424174641rang-de-basanti.gif.jpeg', 'f', 'g', 3, 0, 0, 3, 0, NULL, NULL, 'qrb02e81a3f9b41ceb03f2e1b78457580e.png', 1, 0, '2015-02-17 12:04:12', '0000-00-00 00:00:00', '', 'History,'),
(60, 11, NULL, 'Childhood 80''', '0283838383', 0, '1425464510oldchala.mp3', '1425464565IMG_0482--.jpg', 'Chalalala', 'Chlalalalala', 0, 0, 0, 8, 0, NULL, NULL, 'qrf5a1542d0958acd7e28c52d63e37879c.png', 0, 0, '2015-03-04 10:25:34', '0000-00-00 00:00:00', '', 'News,Finance and economics,Entertainment,'),
(61, 30, NULL, 'Rich Life', '012020202', 0, '1426584193Mark Ronson&Bruno Mars-Uptown Funk.mp3', '1426584293girl7.png', 'Rich Life', 'Rich Life', 1, 1, 0, 80, 0, NULL, NULL, 'qrb49c1db7ade207363d4f73481ad99ea4.png', 0, 0, '2015-03-17 09:27:05', '0000-00-00 00:00:00', '1', 'Character,Art,Car,'),
(62, 31, NULL, 'Allen''s Cartel', '0166176225', 0, '1427150628The_Sun_Aint_Gonna_Shine_-_The_Ben_Liebrand_Remix__3.30_.mp3', '142714979110561819_688160058005919_7012821449607947139_n.jpg', 'Crystal Clear Water in La Grotta Cove, ', 'Corfu Island, Greece ', 3, 0, 0, 6, 1, NULL, NULL, 'qrda08aa1e5e76fcfdc0a51976458e12cd.png', 0, 0, '2015-03-23 22:43:57', '0000-00-00 00:00:00', '', 'Entertainment,Fashion,Science and Technology,');

-- --------------------------------------------------------

--
-- Table structure for table `article_categories`
--

CREATE TABLE IF NOT EXISTS `article_categories` (
`id` int(11) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `category_id` int(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=238 ;

--
-- Dumping data for table `article_categories`
--

INSERT INTO `article_categories` (`id`, `article_id`, `category_id`) VALUES
(76, 22, 24),
(78, 23, 24),
(80, 25, 24),
(82, 24, 24),
(84, 26, 24),
(86, 27, 24),
(89, 28, 24),
(92, 29, 24),
(96, 30, 24),
(98, 31, 24),
(101, 32, 24),
(105, 33, 24),
(107, 34, 24),
(110, 35, 24),
(113, 36, 24),
(116, 37, 24),
(119, 38, 24),
(123, 39, 24),
(125, 40, 24),
(137, 43, 4),
(149, 44, 8),
(150, 44, 13),
(151, 44, 15),
(156, 45, 8),
(157, 45, 9),
(162, 47, 23),
(166, 42, 31),
(173, 48, 5),
(180, 49, 22),
(195, 51, 22),
(198, 52, 16),
(212, 55, 10),
(213, 55, 25),
(214, 55, 32),
(224, 56, 6),
(225, 56, 7),
(226, 56, 27),
(227, 57, 9),
(228, 58, 5),
(229, 58, 6),
(230, 58, 7),
(231, 59, 7),
(232, 60, 8),
(233, 60, 9),
(234, 60, 10),
(235, 61, 6),
(236, 61, 14),
(237, 61, 15);

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
  `comment` text CHARACTER SET utf8,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `article_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `like_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `blog_id`, `comment`, `is_active`, `created`, `article_id`, `image_id`, `like_count`) VALUES
(2, 4, NULL, 'test', 0, '2015-01-23 10:21:47', 42, 264, 2),
(3, 4, NULL, 'test', 0, '2015-01-23 10:21:54', 42, 265, 1),
(4, 0, NULL, 'Hi\n', 0, '2015-01-27 05:51:35', 23, 93, 0),
(5, 4, NULL, 'hi', 0, '2015-01-27 05:52:07', 42, 264, 1),
(6, 0, NULL, 'hi\n', 0, '2015-01-29 06:32:22', 42, 0, 0),
(7, 0, NULL, 'helo', 0, '2015-01-29 06:32:31', 42, 0, 0),
(8, 11, NULL, 'Yoo this is cool', 0, '2015-02-04 18:28:17', 49, 306, 0),
(9, 4, NULL, 'Hello', 0, '2015-02-06 09:44:59', 52, 321, 0),
(10, 4, NULL, 'Today Is friday', 0, '2015-02-06 09:45:19', 52, 321, 1),
(11, 1, NULL, 'test', 0, '2015-02-09 10:57:59', 42, 264, 0),
(12, 11, NULL, 'as', 0, '2015-02-10 10:45:21', 42, 265, 0),
(13, 11, NULL, 'asaasasasa', 0, '2015-02-10 10:45:27', 42, 265, 0),
(14, 30, NULL, 'Cool\n', 0, '2015-02-16 15:25:42', 56, 341, 0),
(15, 11, NULL, 'test', 0, '2015-02-18 07:33:20', 56, 341, 0),
(16, 30, NULL, 'test', 0, '2015-03-11 13:56:56', 56, 341, 0),
(17, 30, NULL, 'hsss', 0, '2015-03-11 13:57:02', 56, 341, 0),
(18, 30, NULL, 'test', 0, '2015-03-17 08:21:22', 56, 341, 0),
(19, 30, NULL, 'test', 0, '2015-03-17 08:21:27', 56, 341, 0),
(20, 30, NULL, 'fsssd', 0, '2015-03-17 08:21:30', 56, 341, 0),
(21, 30, NULL, 'test', 0, '2015-03-17 09:31:27', 61, 367, 0),
(22, 12, NULL, 'test', 0, '2015-03-24 06:05:22', 61, 367, 0),
(23, 12, NULL, 'test', 0, '2015-03-24 06:05:50', 61, 368, 0),
(24, 12, NULL, 'test', 0, '2015-03-24 06:06:08', 61, 368, 0),
(25, 12, NULL, 'asd', 0, '2015-03-24 06:07:15', 61, 368, 0),
(26, 12, NULL, 'test', 0, '2015-03-24 06:08:49', 61, 367, 0),
(27, 12, NULL, 'bike', 0, '2015-03-24 06:09:06', 61, 369, 0),
(28, 11, NULL, 'test', 0, '2015-03-24 07:20:26', 56, 341, 0),
(29, 12, NULL, 'Rich life', 0, '2015-03-24 07:25:21', 61, 367, 0),
(30, 32, NULL, 'test', 0, '2015-03-24 14:17:55', 45, 289, 0),
(31, 11, NULL, 'Test', 0, '2015-03-30 07:08:02', 49, 306, 0),
(32, 11, NULL, 'Cool page 2\n', 0, '2015-03-30 07:08:11', 49, 307, 0);

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
-- Table structure for table `get_ads`
--

CREATE TABLE IF NOT EXISTS `get_ads` (
  `ad_slot` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `get_ads`
--

INSERT INTO `get_ads` (`ad_slot`) VALUES
(3);

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
  `image_name` varchar(255) DEFAULT NULL,
  `img_order` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=381 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `article_id`, `temp_img_id`, `message`, `is_thumb`, `image_name`, `img_order`) VALUES
(59, 19, 22, NULL, 0, '14213089444.png', 0),
(60, 19, 23, NULL, 0, '14213089445.png', 0),
(61, 19, 24, NULL, 0, '14213089446.png', 0),
(62, 19, 19, NULL, 0, '14213089351287407838.jpg', 0),
(63, 19, 20, NULL, 0, '1421308935botany.jpg', 0),
(64, NULL, 77, NULL, 0, '1421386517permission.png', 0),
(65, 19, 78, NULL, 0, '1421386765permission.png', 0),
(66, 19, 79, NULL, 0, '1421386805News1.png', 0),
(67, 19, 80, NULL, 0, '1421386805save_news.png', 0),
(68, 20, 84, NULL, 0, '14213876908.png', 0),
(69, 20, 85, NULL, 0, '14213876909.png', 0),
(70, 20, 86, NULL, 0, '14213876909_1.png', 0),
(71, 20, 87, NULL, 0, '142138769010.png', 0),
(72, 20, 88, NULL, 0, '142138769011.png', 0),
(73, 20, 89, NULL, 0, '142138769012.png', 0),
(74, 20, 90, NULL, 0, '1421387690News1.png', 0),
(75, 20, 91, NULL, 0, '1421387690save_news.png', 0),
(84, 22, 110, NULL, 0, '1421394849deidara.png', 0),
(85, 22, 111, NULL, 0, '1421394849FACEPALM.png', 0),
(86, 22, 112, NULL, 0, '1421394849huanxige.jpg', 0),
(87, 22, 113, NULL, 0, '1421394849kirito.jpg', 0),
(88, 22, 114, NULL, 0, '1421394849noeyesee.jpg', 0),
(89, 22, 115, NULL, 0, '1421394849pork_chop_raw.jpg', 0),
(90, 22, 104, NULL, 0, '1421394733huanxige.jpg', 0),
(91, 22, 105, NULL, 0, '1421394733noeyesee.jpg', 0),
(93, 23, 110, NULL, 0, '1421394849deidara.png', 0),
(94, 23, 111, NULL, 0, '1421394849FACEPALM.png', 0),
(95, 23, 112, NULL, 0, '1421394849huanxige.jpg', 0),
(96, 23, 113, NULL, 0, '1421394849kirito.jpg', 0),
(97, 23, 114, NULL, 0, '1421394849noeyesee.jpg', 0),
(98, 23, 115, NULL, 0, '1421394849pork_chop_raw.jpg', 0),
(99, 23, 104, NULL, 0, '1421394733huanxige.jpg', 0),
(100, 23, 105, NULL, 0, '1421394733noeyesee.jpg', 0),
(102, 24, 110, NULL, 0, '1421394849deidara.png', 0),
(103, 24, 111, NULL, 0, '1421394849FACEPALM.png', 0),
(104, 25, 110, NULL, 0, '1421394849deidara.png', 0),
(105, 24, 112, NULL, 0, '1421394849huanxige.jpg', 0),
(106, 25, 111, NULL, 0, '1421394849FACEPALM.png', 0),
(107, 24, 113, NULL, 0, '1421394849kirito.jpg', 0),
(108, 25, 112, NULL, 0, '1421394849huanxige.jpg', 0),
(109, 24, 114, NULL, 0, '1421394849noeyesee.jpg', 0),
(110, 25, 113, NULL, 0, '1421394849kirito.jpg', 0),
(111, 24, 115, NULL, 0, '1421394849pork_chop_raw.jpg', 0),
(112, 25, 114, NULL, 0, '1421394849noeyesee.jpg', 0),
(113, 24, 104, NULL, 0, '1421394733huanxige.jpg', 0),
(114, 25, 115, NULL, 0, '1421394849pork_chop_raw.jpg', 0),
(115, 26, 110, NULL, 0, '1421394849deidara.png', 0),
(116, 25, 104, NULL, 0, '1421394733huanxige.jpg', 0),
(117, 26, 111, NULL, 0, '1421394849FACEPALM.png', 0),
(118, 25, 105, NULL, 0, '1421394733noeyesee.jpg', 0),
(119, 26, 112, NULL, 0, '1421394849huanxige.jpg', 0),
(121, 26, 113, NULL, 0, '1421394849kirito.jpg', 0),
(122, 24, 105, NULL, 0, '1421394733noeyesee.jpg', 0),
(123, 27, 110, NULL, 0, '1421394849deidara.png', 0),
(125, 26, 114, NULL, 0, '1421394849noeyesee.jpg', 0),
(126, 27, 111, NULL, 0, '1421394849FACEPALM.png', 0),
(127, 27, 112, NULL, 0, '1421394849huanxige.jpg', 0),
(128, 26, 115, NULL, 0, '1421394849pork_chop_raw.jpg', 0),
(129, 26, 104, NULL, 0, '1421394733huanxige.jpg', 0),
(130, 27, 113, NULL, 0, '1421394849kirito.jpg', 0),
(131, 27, 114, NULL, 0, '1421394849noeyesee.jpg', 0),
(132, 26, 105, NULL, 0, '1421394733noeyesee.jpg', 0),
(134, 27, 115, NULL, 0, '1421394849pork_chop_raw.jpg', 0),
(135, 27, 104, NULL, 0, '1421394733huanxige.jpg', 0),
(136, 27, 105, NULL, 0, '1421394733noeyesee.jpg', 0),
(138, 28, 110, NULL, 0, '1421394849deidara.png', 0),
(139, 28, 111, NULL, 0, '1421394849FACEPALM.png', 0),
(140, 28, 112, NULL, 0, '1421394849huanxige.jpg', 0),
(141, 28, 113, NULL, 0, '1421394849kirito.jpg', 0),
(142, 28, 114, NULL, 0, '1421394849noeyesee.jpg', 0),
(143, 28, 115, NULL, 0, '1421394849pork_chop_raw.jpg', 0),
(144, 28, 104, NULL, 0, '1421394733huanxige.jpg', 0),
(145, 28, 105, NULL, 0, '1421394733noeyesee.jpg', 0),
(147, 29, 110, NULL, 0, '1421394849deidara.png', 0),
(148, 29, 111, NULL, 0, '1421394849FACEPALM.png', 0),
(149, 29, 112, NULL, 0, '1421394849huanxige.jpg', 0),
(150, 29, 113, NULL, 0, '1421394849kirito.jpg', 0),
(151, 29, 114, NULL, 0, '1421394849noeyesee.jpg', 0),
(152, 29, 115, NULL, 0, '1421394849pork_chop_raw.jpg', 0),
(153, 30, 110, NULL, 0, '1421394849deidara.png', 0),
(154, 29, 104, NULL, 0, '1421394733huanxige.jpg', 0),
(155, 31, 110, NULL, 0, '1421394849deidara.png', 0),
(156, 30, 111, NULL, 0, '1421394849FACEPALM.png', 0),
(157, 29, 105, NULL, 0, '1421394733noeyesee.jpg', 0),
(158, 30, 112, NULL, 0, '1421394849huanxige.jpg', 0),
(159, 31, 111, NULL, 0, '1421394849FACEPALM.png', 0),
(161, 31, 112, NULL, 0, '1421394849huanxige.jpg', 0),
(162, 30, 113, NULL, 0, '1421394849kirito.jpg', 0),
(163, 30, 114, NULL, 0, '1421394849noeyesee.jpg', 0),
(164, 31, 113, NULL, 0, '1421394849kirito.jpg', 0),
(165, 31, 114, NULL, 0, '1421394849noeyesee.jpg', 0),
(166, 30, 115, NULL, 0, '1421394849pork_chop_raw.jpg', 0),
(167, 30, 104, NULL, 0, '1421394733huanxige.jpg', 0),
(168, 31, 115, NULL, 0, '1421394849pork_chop_raw.jpg', 0),
(169, 30, 105, NULL, 0, '1421394733noeyesee.jpg', 0),
(170, 31, 104, NULL, 0, '1421394733huanxige.jpg', 0),
(172, 31, 105, NULL, 0, '1421394733noeyesee.jpg', 0),
(174, 32, 110, '0', 1, '1421394849deidara.png', 0),
(175, 32, 111, NULL, 0, '1421394849FACEPALM.png', 0),
(176, 32, 112, NULL, 0, '1421394849huanxige.jpg', 0),
(177, 32, 113, NULL, 0, '1421394849kirito.jpg', 0),
(178, 33, 110, '0', 1, '1421394849deidara.png', 0),
(179, 32, 114, NULL, 0, '1421394849noeyesee.jpg', 0),
(180, 33, 111, NULL, 0, '1421394849FACEPALM.png', 0),
(181, 32, 115, NULL, 0, '1421394849pork_chop_raw.jpg', 0),
(182, 34, 110, '0', 1, '1421394849deidara.png', 0),
(183, 33, 112, NULL, 0, '1421394849huanxige.jpg', 0),
(184, 32, 104, NULL, 0, '1421394733huanxige.jpg', 0),
(185, 34, 111, NULL, 0, '1421394849FACEPALM.png', 0),
(186, 33, 113, NULL, 0, '1421394849kirito.jpg', 0),
(187, 34, 112, NULL, 0, '1421394849huanxige.jpg', 0),
(188, 32, 105, NULL, 0, '1421394733noeyesee.jpg', 0),
(189, 33, 114, NULL, 0, '1421394849noeyesee.jpg', 0),
(191, 34, 113, NULL, 0, '1421394849kirito.jpg', 0),
(192, 35, 110, '0', 1, '1421394849deidara.png', 0),
(193, 33, 115, NULL, 0, '1421394849pork_chop_raw.jpg', 0),
(194, 34, 114, NULL, 0, '1421394849noeyesee.jpg', 0),
(195, 35, 111, NULL, 0, '1421394849FACEPALM.png', 0),
(196, 33, 104, NULL, 0, '1421394733huanxige.jpg', 0),
(197, 35, 112, NULL, 0, '1421394849huanxige.jpg', 0),
(198, 34, 115, NULL, 0, '1421394849pork_chop_raw.jpg', 0),
(199, 33, 105, NULL, 0, '1421394733noeyesee.jpg', 0),
(200, 34, 104, NULL, 0, '1421394733huanxige.jpg', 0),
(201, 35, 113, NULL, 0, '1421394849kirito.jpg', 0),
(203, 34, 105, NULL, 0, '1421394733noeyesee.jpg', 0),
(204, 35, 114, NULL, 0, '1421394849noeyesee.jpg', 0),
(206, 35, 115, NULL, 0, '1421394849pork_chop_raw.jpg', 0),
(207, 35, 104, NULL, 0, '1421394733huanxige.jpg', 0),
(208, 35, 105, NULL, 0, '1421394733noeyesee.jpg', 0),
(210, 36, 110, '0', 1, '1421394849deidara.png', 0),
(211, 36, 111, NULL, 0, '1421394849FACEPALM.png', 0),
(212, 36, 112, NULL, 0, '1421394849huanxige.jpg', 0),
(213, 36, 113, NULL, 0, '1421394849kirito.jpg', 0),
(214, 36, 114, NULL, 0, '1421394849noeyesee.jpg', 0),
(215, 36, 115, NULL, 0, '1421394849pork_chop_raw.jpg', 0),
(216, 36, 104, NULL, 0, '1421394733huanxige.jpg', 0),
(217, 36, 105, NULL, 0, '1421394733noeyesee.jpg', 0),
(219, 37, 110, '0', 1, '1421394849deidara.png', 0),
(220, 37, 111, NULL, 0, '1421394849FACEPALM.png', 0),
(221, 37, 112, NULL, 0, '1421394849huanxige.jpg', 0),
(222, 37, 113, NULL, 0, '1421394849kirito.jpg', 0),
(223, 37, 114, NULL, 0, '1421394849noeyesee.jpg', 0),
(224, 37, 115, NULL, 0, '1421394849pork_chop_raw.jpg', 0),
(225, 37, 104, NULL, 0, '1421394733huanxige.jpg', 0),
(226, 37, 105, NULL, 0, '1421394733noeyesee.jpg', 0),
(228, 38, 110, '0', 1, '1421394849deidara.png', 0),
(229, 38, 111, NULL, 0, '1421394849FACEPALM.png', 0),
(230, 38, 112, NULL, 0, '1421394849huanxige.jpg', 0),
(231, 39, 110, '0', 1, '1421394849deidara.png', 0),
(232, 38, 113, NULL, 0, '1421394849kirito.jpg', 0),
(233, 40, 110, '0', 1, '1421394849deidara.png', 0),
(234, 39, 111, NULL, 0, '1421394849FACEPALM.png', 0),
(235, 38, 114, NULL, 0, '1421394849noeyesee.jpg', 0),
(236, 39, 112, NULL, 0, '1421394849huanxige.jpg', 0),
(237, 40, 111, NULL, 0, '1421394849FACEPALM.png', 0),
(238, 38, 115, NULL, 0, '1421394849pork_chop_raw.jpg', 0),
(239, 40, 112, NULL, 0, '1421394849huanxige.jpg', 0),
(240, 39, 113, NULL, 0, '1421394849kirito.jpg', 0),
(241, 38, 104, NULL, 0, '1421394733huanxige.jpg', 0),
(242, 39, 114, NULL, 0, '1421394849noeyesee.jpg', 0),
(243, 40, 113, NULL, 0, '1421394849kirito.jpg', 0),
(244, 38, 105, NULL, 0, '1421394733noeyesee.jpg', 0),
(245, 40, 114, NULL, 0, '1421394849noeyesee.jpg', 0),
(246, 39, 115, NULL, 0, '1421394849pork_chop_raw.jpg', 0),
(248, 39, 104, NULL, 0, '1421394733huanxige.jpg', 0),
(249, 40, 115, NULL, 0, '1421394849pork_chop_raw.jpg', 0),
(250, 40, 104, NULL, 0, '1421394733huanxige.jpg', 0),
(251, 39, 105, NULL, 0, '1421394733noeyesee.jpg', 0),
(253, 40, 105, NULL, 0, '1421394733noeyesee.jpg', 0),
(255, 41, 122, NULL, 0, '14214038653.png', 1),
(256, 41, 123, NULL, 0, '14214038654.png', 2),
(257, 41, 124, NULL, 0, '14214038655.png', 3),
(258, 41, 125, NULL, 0, '14214038656.png', 4),
(259, 41, 126, NULL, 0, '14214038656_2.png', 5),
(260, 41, 127, NULL, 0, '14214038656_3d.png', 6),
(261, 41, 128, NULL, 0, '14214038657.png', 7),
(262, 41, 120, NULL, 0, '14214038591287407838.jpg', 8),
(263, 41, 121, NULL, 0, '1421403859botany.jpg', 9),
(264, 42, 139, NULL, 0, '1421661703doc5.png', 0),
(265, 42, 138, NULL, 0, '1421661640doc4.png', 0),
(266, 42, 137, NULL, 0, '1421661509doc3.png', 0),
(267, 42, 136, NULL, 0, '1421661361doc2.png', 0),
(268, 42, 133, NULL, 0, '1421661109doc1.png', 0),
(269, 43, 154, NULL, 0, '14216656884.png', 0),
(270, 43, 155, NULL, 0, '14216656885.png', 0),
(271, 43, 156, NULL, 0, '14216656886.png', 0),
(272, 43, 157, NULL, 0, '14216656886_2.png', 0),
(273, 43, 158, NULL, 0, '14216656886_3d.png', 0),
(274, 43, 159, NULL, 0, '14216656887.png', 0),
(275, 43, 160, NULL, 0, '14216656888.png', 0),
(276, 43, 161, NULL, 0, '14216656889.png', 0),
(277, 43, 162, NULL, 0, '14216656889_1.png', 0),
(278, 43, 163, NULL, 0, '142166568810.png', 0),
(279, 43, 164, NULL, 0, '142166568811.png', 0),
(280, 43, 165, NULL, 0, '142166568812.png', 0),
(281, 44, 167, NULL, 0, '1421740434images.jpeg', 0),
(282, 44, 168, NULL, 0, '1421740434McLaren-MP4-12C-luxury-cars-12.jpg', 0),
(283, 44, 169, NULL, 0, '142174043403cars1.jpg', 0),
(284, 44, 170, NULL, 0, '142174043406car5.jpg', 0),
(285, 44, 171, NULL, 0, '1421740519Duesenberg.jpg', 0),
(286, 45, 193, NULL, 0, '1422617276reason1.png', 0),
(287, 45, 194, 'Test', 0, '1422617276reason2.png', 0),
(288, 45, 196, NULL, 0, '1422617712reason3.png', 0),
(289, 45, 197, NULL, 0, '1422617722reason4-Copy.png', 0),
(290, 45, 198, NULL, 0, '1422617722reason5-Copy.png', 0),
(291, 46, 199, NULL, 0, '1422696135jpg', 0),
(292, 46, 200, NULL, 0, '1422696148jpg', 0),
(293, 46, 201, NULL, 0, '1422696148jpg', 0),
(294, 46, 202, NULL, 0, '1422696148png', 0),
(295, 46, 203, NULL, 0, '1422696154jpg', 0),
(296, 47, 205, NULL, 0, '14226969481.jpg', 0),
(297, 47, 206, NULL, 0, '14226969482.jpg', 0),
(298, 47, 207, NULL, 0, '14226969483.jpg', 0),
(299, 47, 208, NULL, 0, '14226969484.jpg', 0),
(300, 47, 209, NULL, 0, '14226969485.png', 0),
(301, 48, 216, NULL, 0, '14230388261.jpg', 0),
(302, 48, 217, NULL, 0, '14230388451.jpg', 0),
(303, 48, 218, NULL, 0, '14230388481.jpg', 0),
(304, 48, 219, NULL, 0, '14230388521.jpg', 0),
(305, 48, 220, NULL, 0, '14230388561.jpg', 0),
(306, 49, 223, NULL, 0, '14230536461.jpg', 0),
(307, 49, 224, NULL, 0, '14230537331.jpg', 0),
(308, 49, 225, NULL, 0, '14230537332.jpg', 0),
(309, 49, 226, NULL, 0, '14230537333.jpg', 0),
(310, 49, 227, NULL, 0, '14230537334.jpg', 0),
(311, 50, 242, NULL, 0, '14231145502.jpg', 2),
(312, 50, 244, NULL, 0, '14231145504.png', 3),
(313, 50, 241, NULL, 0, '14231145501.png', 1),
(314, 50, 243, NULL, 0, '14231145503.png', 4),
(316, 51, 261, NULL, 0, '14231211721.jpg', 1),
(317, 51, 262, NULL, 0, '14231211722.jpg', 2),
(318, 51, 265, NULL, 0, '14231211735.jpg', 3),
(319, 51, 263, NULL, 0, '14231211733.jpg', 4),
(320, 51, 264, NULL, 0, '14231211734.jpg', 5),
(321, 52, 269, NULL, 0, '14232041291.jpg', 1),
(322, 52, 270, NULL, 0, '14232041292.jpeg', 2),
(323, 52, 271, NULL, 0, '14232041293.jpeg', 3),
(324, 52, 272, NULL, 0, '14232041294.jpg', 4),
(325, 52, 273, NULL, 0, '14232041295.jpg', 5),
(326, 52, 274, NULL, 0, '14232041296.jpg', 6),
(327, 54, 277, NULL, 0, '14232928311.png', 2),
(328, 54, 278, NULL, 0, '14232936971.jpg', 1),
(329, 54, 279, NULL, 0, '14232956701.jpg', 3),
(330, 55, 289, NULL, 0, '14234801761.jpg', 1),
(331, 55, 290, NULL, 0, '14234801811.jpg', 2),
(332, 55, 291, NULL, 0, '14234801891.jpg', 3),
(333, 55, 292, NULL, 0, '14234801892.jpg', 4),
(334, 55, 293, NULL, 0, '14234801893.jpg', 5),
(341, 56, 337, NULL, 0, '14236410921.png', 1),
(342, 56, 338, NULL, 0, '14236410932.png', 2),
(343, 56, 339, NULL, 0, '14236410933.png', 3),
(344, 56, 340, NULL, 0, '14236410934.png', 4),
(345, 56, 341, NULL, 0, '14236410935.png', 5),
(346, 57, 343, 'sdfgsdf', 0, '14236446551.jpeg', 1),
(347, 57, 344, '0', 1, '14236446552.jpeg', 2),
(348, 57, 345, NULL, 0, '14236446553.jpg', 3),
(349, 57, 346, '0', 1, '14236446554.jpeg', 4),
(350, 57, 349, NULL, 0, '14236447101.jpeg', 5),
(351, 58, 350, NULL, 0, '14240743891.jpg', 1),
(352, 58, 351, NULL, 0, '14240744051.jpg', 2),
(353, 58, 352, NULL, 0, '14240744151.jpg', 3),
(354, 58, 353, NULL, 0, '14240744181.jpg', 4),
(355, 58, 354, NULL, 0, '14240744261.jpg', 5),
(356, 59, 356, NULL, 0, '14241746281.jpeg', 1),
(357, 59, 357, NULL, 0, '14241746282.jpeg', 2),
(358, 59, 358, NULL, 0, '14241746283.jpg', 3),
(359, 59, 359, NULL, 0, '14241746284.jpeg', 4),
(360, 59, 360, NULL, 0, '14241746285.jpeg', 5),
(361, 60, 362, NULL, 0, '14254642341.png', 1),
(362, 60, 367, NULL, 0, '14254643822.png', 2),
(363, 60, 364, NULL, 0, '14254643632.png', 3),
(364, 60, 363, NULL, 0, '14254643631.png', 4),
(365, 60, 365, NULL, 0, '14254643761.png', 5),
(366, 60, 366, NULL, 0, '14254643821.png', 6),
(367, 61, 371, NULL, 0, '14265834631.png', 1),
(368, 61, 372, NULL, 0, '14265834642.png', 2),
(369, 61, 374, NULL, 0, '14265834644.png', 3),
(370, 61, 379, NULL, 0, '14265839671.png', 4),
(371, 61, 380, NULL, 0, '14265841101.png', 5),
(372, 62, 387, NULL, 0, '14271501691.jpg', 1),
(373, 62, 388, NULL, 0, '14271501751.jpg', 2),
(374, 62, 389, NULL, 0, '14271501891.jpg', 3),
(375, 62, 390, NULL, 0, '14271502061.jpg', 4),
(376, 62, 391, NULL, 0, '14271502451.jpg', 5),
(377, 62, 392, NULL, 0, '14271502452.jpg', 6),
(378, 62, 393, NULL, 0, '14271502453.jpg', 7),
(379, 62, 394, NULL, 0, '14271502454.jpg', 8),
(380, 62, 395, NULL, 0, '14271502455.jpg', 9);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `image_comment_like`
--

INSERT INTO `image_comment_like` (`id`, `user_id`, `article_id`, `image_id`, `comment_id`, `is_like`) VALUES
(1, 4, 42, 265, 3, 1),
(2, 4, 42, 264, 2, 1),
(3, 11, 49, 306, 8, 0),
(4, 4, 52, 321, 10, 1),
(5, 1, 42, 264, 5, 1),
(6, 1, 42, 264, 2, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

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
(9, 1, 23, 1, NULL),
(10, 11, 42, 1, NULL),
(11, 13, 42, 1, NULL),
(12, 28, 48, 1, NULL),
(13, 1, 51, 1, NULL),
(14, 11, 56, 1, NULL),
(15, 31, 62, 1, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `musics`
--

INSERT INTO `musics` (`id`, `musics_file`, `music_name`, `music_category`, `music_type`, `is_active`, `created`) VALUES
(5, 'Kalimba.mp3', 'Irish Lullaby', 'Pleasant', 'Pleasure', 1, '2015-02-16 08:59:13'),
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
(48, '547d808e4ceca.mp3', 'Sad Thai', 'Pleasant', 'Sad', 1, '2015-01-30 11:15:50'),
(49, 'Kalimba.mp3', 'Irish Lullaby', 'Romantic', 'rost', 1, '2015-02-17 08:50:05'),
(50, 'Maid with the Flaxen Hair.mp3', 'tester', 'Fun', 'tester', 1, '2015-02-17 08:51:04');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=546 ;

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
(64, 11, 42, '192.168.0.50'),
(65, 13, 25, '192.168.0.50'),
(66, 28, 48, '192.168.1.175'),
(67, 28, 48, '192.168.0.50'),
(68, 4, 41, '192.168.0.50'),
(69, 11, 49, '192.168.0.50'),
(70, 11, 49, '192.168.2.220'),
(71, 11, 51, '192.168.0.50'),
(72, 11, 51, '192.168.2.220'),
(73, 11, 51, '192.168.2.101'),
(74, 4, 52, '192.168.2.101'),
(75, 4, 52, '192.168.2.220'),
(76, 4, 52, '192.168.0.50'),
(77, 11, 51, '192.168.2.58'),
(78, 1, 45, '192.168.2.58'),
(79, 11, 51, '192.168.2.71'),
(80, 11, 49, '192.168.2.71'),
(81, 11, 54, '192.168.0.50'),
(82, 11, 54, '192.168.0.52'),
(83, 4, 52, '192.168.0.52'),
(84, 4, 52, '192.168.2.58'),
(85, 11, 51, '192.168.0.52'),
(86, 4, 41, '192.168.0.52'),
(87, 11, 49, '192.168.0.52'),
(88, 11, 42, '192.168.0.52'),
(89, 13, 55, '192.168.0.52'),
(90, 13, 55, '192.168.2.220'),
(91, 13, 55, '192.168.2.240'),
(92, 28, 48, '192.168.0.52'),
(93, 28, 48, '192.168.2.220'),
(94, 1, 45, '192.168.0.52'),
(95, 28, 48, '192.168.2.220'),
(96, 28, 48, '192.168.2.220'),
(97, 28, 48, '192.168.2.220'),
(98, 28, 48, '192.168.2.220'),
(99, 28, 48, '192.168.2.220'),
(100, 28, 48, '192.168.2.220'),
(101, 13, 55, '192.168.0.52'),
(102, 11, 49, '192.168.2.220'),
(103, 11, 49, '192.168.2.220'),
(104, 11, 49, '192.168.2.220'),
(105, 11, 49, '192.168.2.220'),
(106, 11, 49, '192.168.2.220'),
(107, 11, 49, '192.168.2.220'),
(108, 13, 55, '192.168.0.52'),
(109, 13, 55, '192.168.2.101'),
(110, 13, 55, '192.168.0.52'),
(111, 11, 51, '192.168.0.52'),
(112, 13, 55, '192.168.0.52'),
(113, 11, 51, '192.168.0.52'),
(114, 13, 55, '192.168.0.52'),
(115, 11, 42, '192.168.0.52'),
(116, 11, 51, '192.168.0.52'),
(117, 11, 49, '192.168.0.52'),
(118, 11, 51, '192.168.0.52'),
(119, 11, 49, '192.168.0.52'),
(120, 13, 55, '192.168.0.52'),
(121, 13, 55, '192.168.0.52'),
(122, 4, 52, '192.168.0.52'),
(123, 13, 55, '192.168.0.52'),
(124, 13, 55, '192.168.0.52'),
(125, 13, 55, '192.168.0.52'),
(126, 13, 55, '192.168.0.52'),
(127, 13, 55, '192.168.0.52'),
(128, 13, 55, '192.168.0.52'),
(129, 13, 55, '192.168.2.220'),
(130, 11, 51, '192.168.2.220'),
(131, 13, 55, '192.168.0.52'),
(132, 11, 49, '192.168.2.220'),
(133, 13, 55, '192.168.0.52'),
(134, 1, 45, '192.168.2.220'),
(135, 28, 48, '192.168.2.220'),
(136, 13, 55, '192.168.2.220'),
(137, 13, 55, '192.168.0.52'),
(138, 4, 52, '192.168.0.52'),
(139, 11, 42, '192.168.0.52'),
(140, 13, 55, '192.168.2.220'),
(141, 13, 55, '192.168.0.52'),
(142, 13, 55, '192.168.0.52'),
(143, 13, 55, '192.168.0.52'),
(144, 13, 55, '192.168.0.52'),
(145, 13, 55, '192.168.0.52'),
(146, 11, 42, '192.168.0.52'),
(147, 11, 42, '192.168.0.52'),
(148, 13, 55, '192.168.0.52'),
(149, 13, 55, '192.168.0.52'),
(150, 13, 55, '192.168.0.52'),
(151, 13, 55, '192.168.0.52'),
(152, 13, 55, '192.168.0.52'),
(153, 13, 55, '192.168.0.52'),
(154, 13, 55, '192.168.0.52'),
(155, 13, 55, '192.168.2.58'),
(156, 13, 55, '192.168.2.58'),
(157, 13, 55, '192.168.2.58'),
(158, 13, 55, '192.168.2.58'),
(159, 13, 55, '192.168.0.52'),
(160, 4, 52, '192.168.0.52'),
(161, 13, 55, '192.168.0.52'),
(162, 11, 42, '192.168.0.52'),
(163, 4, 52, '192.168.0.52'),
(164, 4, 52, '192.168.0.52'),
(165, 1, 53, '192.168.0.52'),
(166, 1, 53, '192.168.0.52'),
(167, 11, 51, '192.168.0.52'),
(168, 13, 55, '192.168.0.52'),
(169, 11, 49, '192.168.0.52'),
(170, 11, 49, '192.168.0.52'),
(171, 4, 52, '192.168.0.52'),
(172, 11, 42, '192.168.0.52'),
(173, 11, 42, '192.168.0.52'),
(174, 13, 55, '192.168.0.52'),
(175, 11, 51, '192.168.2.58'),
(176, 11, 51, '192.168.2.58'),
(177, 11, 51, '192.168.2.58'),
(178, 13, 55, '192.168.2.220'),
(179, 13, 55, '192.168.2.220'),
(180, 13, 55, '192.168.2.220'),
(181, 13, 55, '192.168.2.220'),
(182, 13, 55, '192.168.2.220'),
(183, 13, 55, '192.168.2.220'),
(184, 4, 52, '192.168.2.220'),
(185, 4, 52, '192.168.2.220'),
(186, 4, 52, '192.168.2.220'),
(187, 4, 52, '192.168.2.220'),
(188, 4, 52, '192.168.2.220'),
(189, 13, 55, '192.168.2.220'),
(190, 13, 55, '192.168.2.220'),
(191, 13, 55, '192.168.2.220'),
(192, 13, 55, '192.168.2.220'),
(193, 13, 55, '192.168.2.220'),
(194, 13, 55, '192.168.2.220'),
(195, 13, 55, '192.168.2.220'),
(196, 13, 55, '192.168.0.52'),
(197, 13, 55, '192.168.0.52'),
(198, 13, 55, '192.168.0.52'),
(199, 13, 55, '192.168.0.52'),
(200, 4, 52, '192.168.0.52'),
(201, 11, 51, '192.168.0.52'),
(202, 11, 49, '192.168.0.52'),
(203, 13, 55, '192.168.2.220'),
(204, 13, 55, '192.168.2.220'),
(205, 13, 55, '192.168.2.220'),
(206, 13, 55, '192.168.2.220'),
(207, 13, 55, '192.168.2.220'),
(208, 13, 55, '192.168.2.220'),
(209, 11, 56, '192.168.0.52'),
(210, 11, 56, '192.168.0.52'),
(211, 11, 56, '192.168.0.52'),
(212, 11, 56, '192.168.0.52'),
(213, 11, 56, '192.168.0.52'),
(214, 11, 56, '192.168.0.52'),
(215, 11, 56, '192.168.0.52'),
(216, 11, 56, '192.168.0.52'),
(217, 11, 56, '192.168.0.52'),
(218, 11, 56, '192.168.0.52'),
(219, 11, 56, '192.168.0.52'),
(220, 11, 56, '192.168.0.52'),
(221, 11, 56, '192.168.0.52'),
(222, 11, 56, '192.168.0.52'),
(223, 11, 56, '192.168.0.52'),
(224, 1, 45, '192.168.0.52'),
(225, 11, 56, '192.168.0.52'),
(226, 11, 56, '192.168.0.52'),
(227, 11, 56, '192.168.0.52'),
(228, 11, 56, '192.168.0.52'),
(229, 11, 56, '192.168.0.52'),
(230, 11, 56, '192.168.0.52'),
(231, 11, 56, '192.168.0.52'),
(232, 11, 56, '192.168.0.52'),
(233, 11, 56, '192.168.0.52'),
(234, 11, 56, '192.168.0.52'),
(235, 11, 56, '192.168.0.52'),
(236, 11, 56, '192.168.0.52'),
(237, 11, 56, '192.168.2.220'),
(238, 11, 56, '192.168.2.220'),
(239, 11, 56, '192.168.0.52'),
(240, 11, 56, '192.168.0.52'),
(241, 11, 56, '192.168.2.220'),
(242, 11, 56, '192.168.2.220'),
(243, 11, 56, '192.168.0.52'),
(244, 28, 48, '192.168.0.52'),
(245, 28, 48, '192.168.0.52'),
(246, 11, 56, '192.168.0.52'),
(247, 11, 51, '192.168.0.52'),
(248, 11, 51, '192.168.0.52'),
(249, 4, 52, '192.168.0.52'),
(250, 11, 56, '192.168.2.220'),
(251, 11, 56, '192.168.0.52'),
(252, 11, 51, '192.168.0.52'),
(253, 11, 49, '192.168.0.52'),
(254, 11, 56, '192.168.2.220'),
(255, 11, 56, '192.168.2.220'),
(256, 11, 56, '192.168.0.52'),
(257, 11, 56, '192.168.0.52'),
(258, 11, 56, '192.168.0.52'),
(259, 4, 52, '192.168.0.52'),
(260, 11, 56, '192.168.0.52'),
(261, 11, 56, '192.168.0.52'),
(262, 11, 56, '192.168.0.52'),
(263, 11, 56, '192.168.0.52'),
(264, 11, 56, '192.168.0.52'),
(265, 13, 37, '192.168.0.52'),
(266, 11, 56, '192.168.1.175'),
(267, 11, 56, '192.168.1.175'),
(268, 11, 56, '192.168.1.175'),
(269, 11, 56, '192.168.1.175'),
(270, 11, 51, '192.168.0.52'),
(271, 11, 51, '192.168.0.52'),
(272, 13, 55, '192.168.0.52'),
(273, 4, 52, '192.168.0.52'),
(274, 11, 51, '192.168.0.52'),
(275, 11, 51, '192.168.0.52'),
(276, 11, 51, '192.168.0.52'),
(277, 11, 51, '192.168.0.52'),
(278, 11, 42, '192.168.0.52'),
(279, 11, 42, '192.168.0.52'),
(280, 11, 51, '192.168.0.52'),
(281, 11, 51, '192.168.0.52'),
(282, 11, 51, '192.168.0.52'),
(283, 28, 58, '192.168.1.175'),
(284, 28, 58, '192.168.1.175'),
(285, 28, 58, '192.168.1.175'),
(286, 28, 58, '192.168.1.175'),
(287, 4, 52, '192.168.1.175'),
(288, 11, 49, '192.168.1.175'),
(289, 13, 55, '192.168.1.175'),
(290, 11, 49, '192.168.1.175'),
(291, 11, 42, '192.168.1.175'),
(292, 28, 58, '192.168.0.52'),
(293, 4, 41, '192.168.0.52'),
(294, 11, 56, '192.168.0.52'),
(295, 11, 51, '192.168.0.52'),
(296, 11, 56, '192.168.0.52'),
(297, 11, 56, '192.168.0.52'),
(298, 14, 43, '192.168.0.52'),
(299, 15, 44, '192.168.0.52'),
(300, 14, 43, '192.168.0.52'),
(301, 14, 43, '192.168.0.52'),
(302, 4, 41, '192.168.2.220'),
(303, 4, 41, '192.168.2.220'),
(304, 4, 41, '192.168.2.220'),
(305, 14, 43, '192.168.2.220'),
(306, 14, 43, '192.168.1.175'),
(307, 4, 41, '192.168.1.175'),
(308, 14, 43, '192.168.0.52'),
(309, 11, 56, '192.168.0.52'),
(310, 28, 48, '192.168.1.175'),
(311, 4, 41, '192.168.1.175'),
(312, 4, 41, '192.168.1.175'),
(313, 4, 41, '192.168.1.175'),
(314, 4, 41, '192.168.1.175'),
(315, 4, 41, '192.168.1.175'),
(316, 28, 48, '192.168.1.175'),
(317, 11, 49, '192.168.1.175'),
(318, 11, 56, '192.168.1.175'),
(319, 4, 41, '192.168.1.175'),
(320, 4, 41, '192.168.1.175'),
(321, 11, 49, '192.168.0.52'),
(322, 12, 59, '192.168.2.220'),
(323, 12, 59, '192.168.2.220'),
(324, 1, 57, '192.168.2.220'),
(325, 12, 46, '192.168.2.220'),
(326, 11, 49, '192.168.0.52'),
(327, 11, 42, '192.168.0.52'),
(328, 11, 56, '192.168.0.52'),
(329, 11, 56, '192.168.0.52'),
(330, 13, 55, '192.168.0.52'),
(331, 11, 42, '192.168.2.220'),
(332, 11, 42, '192.168.2.220'),
(333, 11, 42, '192.168.2.220'),
(334, 11, 42, '192.168.2.220'),
(335, 11, 42, '192.168.2.220'),
(336, 11, 42, '192.168.2.220'),
(337, 28, 58, '192.168.2.220'),
(338, 28, 58, '192.168.2.220'),
(339, 28, 58, '192.168.2.220'),
(340, 28, 58, '192.168.2.220'),
(341, 28, 58, '192.168.2.220'),
(342, 28, 58, '192.168.2.220'),
(343, 28, 58, '192.168.2.220'),
(344, 28, 58, '192.168.2.220'),
(345, 28, 58, '192.168.0.52'),
(346, 4, 52, '192.168.0.52'),
(347, 1, 45, '192.168.2.220'),
(348, 11, 49, '192.168.2.220'),
(349, 13, 55, '192.168.0.52'),
(350, 11, 42, '192.168.2.220'),
(351, 11, 56, '192.168.0.52'),
(352, 11, 51, '192.168.0.52'),
(353, 28, 48, '192.168.0.52'),
(354, 1, 45, '192.168.0.52'),
(355, 1, 45, '192.168.0.50'),
(356, 1, 45, '192.168.0.50'),
(357, 11, 51, '192.168.0.50'),
(358, 11, 56, '192.168.0.50'),
(359, 11, 42, '192.168.0.50'),
(360, 11, 51, '192.168.0.50'),
(361, 11, 56, '192.168.0.50'),
(362, 11, 56, '192.168.0.50'),
(363, 11, 56, '192.168.2.220'),
(364, 11, 56, '192.168.2.220'),
(365, 11, 56, '192.168.0.50'),
(366, 11, 56, '192.168.0.50'),
(367, 11, 51, '192.168.0.50'),
(368, 11, 56, '192.168.0.50'),
(369, 13, 55, '192.168.0.50'),
(370, 13, 55, '192.168.0.50'),
(371, 13, 55, '192.168.0.50'),
(372, 11, 56, '192.168.2.220'),
(373, 11, 56, '192.168.2.220'),
(374, 11, 60, '192.168.0.50'),
(375, 11, 60, '192.168.0.50'),
(376, 11, 60, '192.168.0.50'),
(377, 11, 60, '192.168.0.50'),
(378, 11, 60, '192.168.0.50'),
(379, 11, 60, '192.168.0.50'),
(380, 11, 56, '192.168.2.220'),
(381, 11, 56, '192.168.2.220'),
(382, 11, 56, '192.168.2.220'),
(383, 28, 58, '192.168.0.50'),
(384, 13, 55, '192.168.0.50'),
(385, 13, 55, '192.168.0.50'),
(386, 11, 60, '192.168.0.50'),
(387, 11, 60, '192.168.0.50'),
(388, 12, 59, '192.168.0.50'),
(389, 28, 58, '192.168.0.50'),
(390, 28, 58, '192.168.0.50'),
(391, 4, 41, '192.168.0.50'),
(392, 11, 56, '192.168.0.50'),
(393, 11, 51, '192.168.0.50'),
(394, 1, 45, '192.168.0.50'),
(395, 28, 48, '192.168.0.50'),
(396, 1, 45, '192.168.2.220'),
(397, 1, 45, '192.168.2.220'),
(398, 4, 41, '192.168.0.50'),
(399, 11, 49, '192.168.0.50'),
(400, 11, 56, '192.168.0.50'),
(401, 13, 55, '192.168.0.50'),
(402, 13, 55, '192.168.0.50'),
(403, 28, 58, '192.168.0.50'),
(404, 28, 58, '192.168.0.50'),
(405, 11, 56, '192.168.2.220'),
(406, 11, 56, '192.168.0.50'),
(407, 11, 56, '192.168.0.50'),
(408, 13, 55, '192.168.0.50'),
(409, 4, 52, '192.168.0.50'),
(410, 11, 42, '192.168.0.50'),
(411, 4, 52, '192.168.0.50'),
(412, 11, 42, '192.168.0.50'),
(413, 11, 42, '192.168.0.50'),
(414, 11, 56, '192.168.0.50'),
(415, 11, 56, '192.168.0.50'),
(416, 11, 56, '192.168.0.50'),
(417, 11, 56, '192.168.0.50'),
(418, 13, 55, '192.168.2.58'),
(419, 4, 52, '192.168.2.58'),
(420, 11, 51, '192.168.2.58'),
(421, 11, 42, '192.168.2.58'),
(422, 13, 55, '192.168.2.58'),
(423, 4, 41, '192.168.2.58'),
(424, 4, 52, '192.168.2.58'),
(425, 11, 51, '192.168.2.58'),
(426, 1, 45, '192.168.2.58'),
(427, 1, 57, '192.168.2.58'),
(428, 30, 61, '192.168.0.50'),
(429, 30, 61, '192.168.0.50'),
(430, 30, 61, '192.168.0.50'),
(431, 4, 41, '192.168.0.50'),
(432, 30, 61, '192.168.0.50'),
(433, 30, 61, '192.168.0.50'),
(434, 30, 61, '192.168.0.50'),
(435, 30, 61, '192.168.0.50'),
(436, 30, 61, '192.168.0.50'),
(437, 13, 55, '192.168.0.50'),
(438, 30, 61, '192.168.0.50'),
(439, 11, 49, '192.168.0.50'),
(440, 11, 49, '192.168.0.50'),
(441, 11, 49, '192.168.0.50'),
(442, 30, 61, '192.168.0.50'),
(443, 31, 62, '192.168.0.50'),
(444, 31, 62, '192.168.0.50'),
(445, 31, 62, '192.168.0.50'),
(446, 31, 62, '192.168.0.50'),
(447, 11, 42, '192.168.0.50'),
(448, 31, 62, '192.168.0.50'),
(449, 31, 62, '192.168.0.50'),
(450, 30, 61, '192.168.2.220'),
(451, 30, 61, '192.168.2.220'),
(452, 30, 61, '192.168.2.220'),
(453, 28, 48, '192.168.2.220'),
(454, 30, 61, '192.168.2.220'),
(455, 30, 61, '192.168.2.220'),
(456, 30, 61, '192.168.2.220'),
(457, 30, 61, '192.168.2.220'),
(458, 30, 61, '192.168.2.220'),
(459, 30, 61, '192.168.2.220'),
(460, 30, 61, '192.168.2.220'),
(461, 30, 61, '192.168.2.220'),
(462, 30, 61, '192.168.2.220'),
(463, 30, 61, '192.168.2.220'),
(464, 30, 61, '192.168.2.220'),
(465, 13, 55, '192.168.2.220'),
(466, 30, 61, '192.168.0.50'),
(467, 30, 61, '192.168.2.220'),
(468, 30, 61, '192.168.0.50'),
(469, 11, 56, '192.168.0.50'),
(470, 11, 51, '192.168.0.50'),
(471, 30, 61, '192.168.2.220'),
(472, 30, 61, '192.168.2.220'),
(473, 30, 61, '192.168.2.220'),
(474, 28, 58, '192.168.0.50'),
(475, 30, 61, '192.168.2.101'),
(476, 28, 58, '192.168.0.50'),
(477, 28, 58, '192.168.0.50'),
(478, 30, 61, '192.168.0.50'),
(479, 30, 61, '192.168.2.220'),
(480, 30, 61, '192.168.2.220'),
(481, 30, 61, '192.168.2.220'),
(482, 30, 61, '192.168.2.220'),
(483, 30, 61, '192.168.2.220'),
(484, 30, 61, '192.168.2.220'),
(485, 30, 61, '192.168.2.220'),
(486, 30, 61, '192.168.2.220'),
(487, 30, 61, '192.168.2.220'),
(488, 30, 61, '192.168.2.220'),
(489, 30, 61, '192.168.2.220'),
(490, 30, 61, '192.168.2.220'),
(491, 30, 61, '192.168.2.220'),
(492, 30, 61, '192.168.2.220'),
(493, 30, 61, '192.168.2.220'),
(494, 30, 61, '192.168.2.220'),
(495, 30, 61, '192.168.2.220'),
(496, 30, 61, '192.168.2.220'),
(497, 30, 61, '192.168.2.220'),
(498, 30, 61, '192.168.2.220'),
(499, 30, 61, '192.168.2.220'),
(500, 30, 61, '192.168.2.220'),
(501, 30, 61, '192.168.2.220'),
(502, 30, 61, '192.168.2.220'),
(503, 30, 61, '192.168.2.220'),
(504, 30, 61, '192.168.2.220'),
(505, 30, 61, '192.168.2.220'),
(506, 30, 61, '192.168.2.220'),
(507, 30, 61, '192.168.2.220'),
(508, 30, 61, '192.168.2.220'),
(509, 30, 61, '192.168.2.220'),
(510, 30, 61, '192.168.2.220'),
(511, 30, 61, '192.168.2.220'),
(512, 30, 61, '192.168.2.220'),
(513, 30, 61, '192.168.2.58'),
(514, 30, 61, '192.168.2.220'),
(515, 30, 61, '192.168.2.220'),
(516, 30, 61, '192.168.2.220'),
(517, 30, 61, '192.168.2.220'),
(518, 30, 61, '192.168.2.220'),
(519, 30, 61, '192.168.2.220'),
(520, 30, 61, '192.168.2.220'),
(521, 30, 61, '192.168.2.220'),
(522, 30, 61, '192.168.2.58'),
(523, 30, 61, '192.168.2.58'),
(524, 30, 61, '192.168.2.58'),
(525, 13, 55, '192.168.2.220'),
(526, 13, 55, '192.168.2.220'),
(527, 13, 55, '192.168.0.50'),
(528, 13, 55, '192.168.0.50'),
(529, 13, 55, '192.168.2.220'),
(530, 1, 45, '192.168.2.220'),
(531, 1, 45, '192.168.0.50'),
(532, 1, 45, '192.168.2.220'),
(533, 30, 61, '192.168.2.58'),
(534, 30, 61, '192.168.2.58'),
(535, 30, 61, '192.168.2.58'),
(536, 1, 45, '192.168.2.220'),
(537, 30, 61, '192.168.0.50'),
(538, 30, 61, '192.168.0.50'),
(539, 30, 61, '192.168.0.50'),
(540, 30, 61, '192.168.0.50'),
(541, 30, 61, '192.168.0.50'),
(542, 11, 49, '192.168.0.50'),
(543, 11, 49, '192.168.0.50'),
(544, 11, 51, '192.168.0.50'),
(545, 11, 49, '192.168.2.220');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=421 ;

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
(210, '14226969541408523508_oconnor-e1363008742341-392x246.jpg', NULL, 0),
(211, '1423033322dingdong.mp3', NULL, 0),
(212, '14230348161.jpg', NULL, 0),
(213, '14230348311.jpg', NULL, 0),
(215, '14230348441.jpg', NULL, 0),
(216, '14230388261.jpg', NULL, 0),
(217, '14230388451.jpg', NULL, 0),
(218, '14230388481.jpg', NULL, 0),
(219, '14230388521.jpg', NULL, 0),
(220, '14230388561.jpg', NULL, 0),
(221, '1423038880Jellyfish.jpg', NULL, 0),
(222, '1423038885Desert.jpg', NULL, 0),
(223, '14230536461.jpg', NULL, 0),
(224, '14230537331.jpg', NULL, 0),
(225, '14230537332.jpg', NULL, 0),
(226, '14230537333.jpg', NULL, 0),
(227, '14230537334.jpg', NULL, 0),
(228, '1423053817lol.jpg', NULL, 0),
(229, '14230561711.png', NULL, 0),
(230, '14230561712.png', NULL, 0),
(231, '14230561713.jpg', NULL, 0),
(232, '14230563081.png', NULL, 0),
(233, '14230563082.png', NULL, 0),
(234, '14230563083.png', NULL, 0),
(235, '14230563881.png', NULL, 0),
(236, '14230563882.png', NULL, 0),
(237, '14230563883.png', NULL, 0),
(238, '14230564451.png', NULL, 0),
(239, '14230564452.png', NULL, 0),
(240, '14230564453.jpg', NULL, 0),
(241, '14231145501.png', NULL, 0),
(242, '14231145502.jpg', NULL, 0),
(243, '14231145503.png', NULL, 0),
(244, '14231145504.png', NULL, 0),
(246, '1423114890Partners-JDEtips-467x128.png', NULL, 0),
(247, '1423115841remeo.mp3', NULL, 0),
(248, '14231163551.jpg', NULL, 0),
(249, '14231163552.jpg', NULL, 0),
(252, '14231207913.jpg', NULL, 0),
(253, '14231207914.jpg', NULL, 0),
(256, '14231208832.jpg', NULL, 0),
(257, '14231208833.jpg', NULL, 0),
(258, '1423120934All Izz Well [Full HD Song] 3 Idiots.mp3', NULL, 0),
(259, '14231210911.jpg', NULL, 0),
(260, '1423121140alliswell.mp3', NULL, 0),
(261, '14231211721.jpg', NULL, 0),
(262, '14231211722.jpg', NULL, 0),
(263, '14231211733.jpg', NULL, 0),
(264, '14231211734.jpg', NULL, 0),
(265, '14231211735.jpg', NULL, 0),
(266, '1423121201alliswell.mp3', NULL, 0),
(267, '1423121257102.jpg', NULL, 0),
(268, '1423121266images.jpg', NULL, 0),
(269, '14232041291.jpg', NULL, 0),
(270, '14232041292.jpeg', NULL, 0),
(271, '14232041293.jpeg', NULL, 0),
(272, '14232041294.jpg', NULL, 0),
(273, '14232041295.jpg', NULL, 0),
(274, '14232041296.jpg', NULL, 0),
(275, '142320415604 - Pani Da Rang (Male) (MyMp3Song.Com).mp3', NULL, 0),
(276, '1423204208hqdefault.jpg', NULL, 0),
(277, '14232928311.png', NULL, 0),
(278, '14232936971.jpg', NULL, 0),
(279, '14232956701.jpg', NULL, 0),
(280, '1423479299images.jpeg', NULL, 0),
(281, '1423479574???-?????1.mp3', NULL, 0),
(284, '14234797793.jpg', NULL, 0),
(285, '14234797794.jpg', NULL, 0),
(286, '14234798171.jpg', NULL, 0),
(287, '14234798172.jpg', NULL, 0),
(288, '14234801021.jpg', NULL, 0),
(289, '14234801761.jpg', NULL, 0),
(290, '14234801811.jpg', NULL, 0),
(291, '14234801891.jpg', NULL, 0),
(292, '14234801892.jpg', NULL, 0),
(293, '14234801893.jpg', NULL, 0),
(294, '1423480325???-?????1.mp3', NULL, 0),
(295, '1423480384mag3.jpg', NULL, 0),
(296, '1423481214ifonly.mp3', NULL, 0),
(297, '1423492335???-?????.mp3', NULL, 0),
(298, '1423492572ifonly.mp3', NULL, 0),
(299, '1423492595ifonly.mp3', NULL, 0),
(300, '14235726811.jpeg', NULL, 0),
(301, '14235726812.jpeg', NULL, 0),
(302, '14235726813.jpg', NULL, 0),
(303, '14235726814.jpeg', NULL, 0),
(304, '14235726815.jpeg', NULL, 0),
(306, '14236386572.png', NULL, 0),
(307, '14236386573.png', NULL, 0),
(308, '14236386574.png', 'www.wiwihaha.com', 0),
(309, '14236386575.png', NULL, 0),
(310, '14236389641.png', NULL, 0),
(311, '1423639909tiger.mp3', NULL, 0),
(312, '1423639932sp_open.png', NULL, 0),
(318, '1423640057tiger.mp3', NULL, 0),
(319, '1423640121sp_open.png', NULL, 0),
(320, '14236406301.png', NULL, 0),
(322, '14236408271.jpeg', NULL, 0),
(323, '14236408272.jpg', NULL, 0),
(324, '14236408273.jpeg', NULL, 0),
(325, '1423640874tiger.mp3', NULL, 0),
(326, '14236408971.png', NULL, 0),
(328, '14236408973.png', NULL, 0),
(329, '14236408974.png', NULL, 0),
(330, '14236408975.png', NULL, 0),
(331, '14236408976.png', NULL, 0),
(332, '14236410241.jpeg', NULL, 0),
(333, '14236410242.jpeg', NULL, 0),
(334, '14236410243.jpg', NULL, 0),
(335, '14236410244.jpeg', NULL, 0),
(337, '14236410921.png', NULL, 0),
(338, '14236410932.png', NULL, 0),
(339, '14236410933.png', NULL, 0),
(340, '14236410934.png', NULL, 0),
(341, '14236410935.png', NULL, 0),
(342, '1423641157tiger.mp3', NULL, 0),
(343, '14236446551.jpeg', 'sdfgsdf', 0),
(344, '14236446552.jpeg', '0', 1),
(345, '14236446553.jpg', NULL, 0),
(346, '14236446554.jpeg', '0', 1),
(348, '1423644673rang-de-basanti.gif.jpeg', NULL, 0),
(349, '14236447101.jpeg', NULL, 0),
(350, '14240743891.jpg', NULL, 0),
(351, '14240744051.jpg', NULL, 0),
(352, '14240744151.jpg', NULL, 0),
(353, '14240744181.jpg', NULL, 0),
(354, '14240744261.jpg', NULL, 0),
(355, '1424074449Chrysanthemum.jpg', NULL, 0),
(356, '14241746281.jpeg', NULL, 0),
(357, '14241746282.jpeg', NULL, 0),
(358, '14241746283.jpg', NULL, 0),
(359, '14241746284.jpeg', NULL, 0),
(360, '14241746285.jpeg', NULL, 0),
(361, '1424174641rang-de-basanti.gif.jpeg', NULL, 0),
(362, '14254642341.png', NULL, 0),
(363, '14254643631.png', NULL, 0),
(364, '14254643632.png', NULL, 0),
(365, '14254643761.png', NULL, 0),
(366, '14254643821.png', NULL, 0),
(367, '14254643822.png', NULL, 0),
(368, '1425464510oldchala.mp3', NULL, 0),
(369, '1425464565IMG_0482--.jpg', NULL, 0),
(370, '14260599351.jpg', NULL, 0),
(371, '14265834631.png', NULL, 0),
(372, '14265834642.png', NULL, 0),
(374, '14265834644.png', NULL, 0),
(376, '14265836571.png', NULL, 0),
(379, '14265839671.png', NULL, 0),
(380, '14265841101.png', NULL, 0),
(381, '1426584193Mark Ronson&Bruno Mars-Uptown Funk.mp3', NULL, 0),
(382, '1426584293girl7.png', NULL, 0),
(383, '142714979110561819_688160058005919_7012821449607947139_n.jpg', NULL, 0),
(384, '1427149953The_Sun_Aint_Gonna_Shine_-_The_Ben_Liebrand_Remix.mp3', NULL, 0),
(385, '1427149983The_Sun_Aint_Gonna_Shine_-_The_Ben_Liebrand_Remix__3.30_.mp3', NULL, 0),
(386, '1427150044The_Sun_Aint_Gonna_Shine_-_The_Ben_Liebrand_Remix__3.30_.mp3', NULL, 0),
(387, '14271501691.jpg', NULL, 0),
(388, '14271501751.jpg', NULL, 0),
(389, '14271501891.jpg', NULL, 0),
(390, '14271502061.jpg', NULL, 0),
(391, '14271502451.jpg', NULL, 0),
(392, '14271502452.jpg', NULL, 0),
(393, '14271502453.jpg', NULL, 0),
(394, '14271502454.jpg', NULL, 0),
(395, '14271502455.jpg', NULL, 0),
(396, '1427150628The_Sun_Aint_Gonna_Shine_-_The_Ben_Liebrand_Remix__3.30_.mp3', NULL, 0),
(397, '1427698722Ultraman Mebius Theme song.mp3', NULL, 0),
(398, '14276988501.png', NULL, 0),
(399, '14276988541.png', NULL, 0),
(400, '14276988601.png', NULL, 0),
(401, '14276988641.png', NULL, 0),
(402, '14276988681.png', NULL, 0),
(403, '14276993631.jpeg', NULL, 0),
(404, '14276993632.jpeg', NULL, 0),
(405, '14276993633.jpg', NULL, 0),
(406, '14276993634.jpeg', NULL, 0),
(407, '14276993635.jpeg', NULL, 0),
(408, '14277000851.jpeg', NULL, 0),
(409, '14277000862.jpeg', NULL, 0),
(410, '14277000863.jpg', NULL, 0),
(411, '14277000864.jpeg', NULL, 0),
(412, '14277000865.jpeg', NULL, 0),
(413, '14277001052014-12-16-123547.ogg', NULL, 0),
(414, '14277001132014-12-16-123547.ogg', NULL, 0),
(415, '14277003812014-12-16-123547.ogg', NULL, 0),
(416, '14277003912014-12-16-123547.ogg', NULL, 0),
(417, '14277004232014-12-16-123547.ogg', NULL, 0),
(418, '14277005192014-12-16-123547.ogg', NULL, 0),
(419, '14277006192014-12-16-123547.ogg', NULL, 0),
(420, '14277006542014-12-16-123547.ogg', NULL, 0);

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
  `profile_pic` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `mobile` varchar(15) NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fb_id`, `tw_id`, `gl_id`, `user_type_id`, `firstname`, `lastname`, `username`, `password`, `email`, `gender`, `dob`, `address`, `profile_pic`, `is_active`, `mobile`, `created`) VALUES
(1, NULL, NULL, NULL, 1, 'Vivek', 'Jain', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@admin.com', 'Male', NULL, NULL, '', 1, '', NULL),
(4, NULL, NULL, NULL, 2, 'Vivek', 'Jain', 'vivek', 'e10adc3949ba59abbe56e057f20f883e', 'vivek.j12@cisinlabs.com', 'Male', '1987-05-05', NULL, '14236603971287407838.jpg', 1, '1236547890', NULL),
(6, NULL, NULL, NULL, 2, 'TEst1', 'TEst12', 'admin2', 'e10adc3949ba59abbe56e057f20f883e', 'tet@dfgs.co', 'Male', NULL, NULL, '', 1, '', NULL),
(7, NULL, NULL, NULL, 2, 'gsdfg', 'sdfsdf', 'admind', 'e10adc3949ba59abbe56e057f20f883e', 'sdfg@d.gg', 'Male', NULL, NULL, '', 0, '', NULL),
(8, NULL, NULL, NULL, 2, 'vivek', 'Jain', 'vivek.j', '0b684f705f17ba18163f3f05a147db0f', 'vivek.j@cisinlabs.com', 'Male', '2015-01-21', 'test', '', 1, '', NULL),
(11, NULL, NULL, NULL, 2, 'Alex', 'Chong', 'chon9', '8f036369a5cd26454949e594fb9e0a2d', 'alexchon9@gmail.com', 'Male', '2015-01-02', NULL, '', 1, '0166379722', NULL),
(12, NULL, NULL, NULL, 2, 'jone', 'jone', 'jone', '15c70ebb880b7cfdae8885cee11ce3ef', 'jone@jone.com', 'Male', '2015-01-04', NULL, '', 1, '1236547890', NULL),
(13, NULL, NULL, NULL, 2, 'root', 'treant', 'root', 'e10adc3949ba59abbe56e057f20f883e', 'kelvin_cr7@hotmail.com', 'Male', '1990-03-23', NULL, '', 1, '0123456789', NULL),
(14, NULL, NULL, NULL, 2, 'Johan', 'Rao', 'johan', 'e10adc3949ba59abbe56e057f20f883e', 'johan@johan.com', 'Male', '1985-01-10', NULL, '', 1, '1236547890', NULL),
(15, NULL, NULL, NULL, 2, 'Alice', 'Cullen', 'Alice', 'f5deef6939865d7fb7e1adc0a4d64a29', 'Alice@mailinator.com', 'Female', '1900-01-22', NULL, '', 1, '7879626427', NULL),
(16, NULL, NULL, NULL, 2, '1234', '1234', 'ankita', '717989627af3e9e6fd2ff4da7a0b815c', 'ankita123@mailinator.com', 'Female', '1900-01-01', NULL, '', 1, '7879626427', NULL),
(17, NULL, 2754904789, NULL, 2, 'vivek', 'jain', NULL, NULL, NULL, NULL, NULL, NULL, '', 1, '', '2015-01-27 13:58:25'),
(20, NULL, NULL, NULL, 2, 'Johan', 'Tom', 'johan2', 'e10adc3949ba59abbe56e057f20f883e', 'johanq@johan.com', 'Male', '1980-01-16', NULL, '', 1, '1236547890', NULL),
(22, NULL, NULL, NULL, 2, 'chandni', 'porwal', 'chandni123', 'e10adc3949ba59abbe56e057f20f883e', 'chandni.p@mailinator.com', 'Female', '1900-01-01', NULL, '', 1, '123456789', NULL),
(23, NULL, NULL, NULL, 2, 'chandni', 'porwal', '1234', '025f0cfe9cc46232f93348455eca6141', 'chandni@mailinator.com', 'Female', '1900-01-01', NULL, '', 1, '123456789', NULL),
(24, NULL, NULL, NULL, 2, 'chandni', 'porwal', 'chandniporwal', '75bb5f56c89ea09c9788582bc8b8d5fa', 'chandniporwal@mailinator.com', 'Female', '1900-01-01', NULL, '', 1, '123456789', NULL),
(25, NULL, NULL, NULL, 2, 'chandni', 'porwal', 'chandnip', 'e10adc3949ba59abbe56e057f20f883e', 'chandnip@mailinator.com', 'Female', '1900-01-01', NULL, '', 1, '123456', NULL),
(26, NULL, NULL, NULL, 2, 'chandni', 'porwal', 'vivekjain1', 'ac39bc3cbcd534333362c32289c4a4f2', 'vivekjainasd@mailinator.com', 'Male', '1900-01-01', NULL, '', 1, '123456', NULL),
(27, NULL, NULL, NULL, 2, 'test', 'test', 'test', '827ccb0eea8a706c4c34a16891f84e7b', 'test@mailinator.com', 'Female', '1900-01-01', NULL, '', 1, '12345', NULL),
(28, NULL, NULL, NULL, 2, 'test', 'test', 'chandni78', 'e10adc3949ba59abbe56e057f20f883e', 'chandni78@mailinator.com', 'Female', '1900-01-01', NULL, '', 1, '123456', NULL),
(29, 10152548076381809, NULL, NULL, 2, 'Kelvin', 'Chan', NULL, NULL, NULL, 'male', NULL, NULL, '', 1, '', '2015-02-05 11:13:35'),
(30, 10206270748553636, NULL, NULL, 2, 'Alex', 'Chong', NULL, NULL, NULL, 'male', NULL, NULL, '', 1, '', '2015-02-16 15:25:21'),
(31, 10206160074299588, NULL, NULL, 2, 'Allen', 'Low', NULL, NULL, NULL, 'male', NULL, NULL, '', 1, '', '2015-03-23 22:14:16'),
(32, 1599836623582672, NULL, NULL, 2, 'Vivek', 'Jain', NULL, NULL, NULL, 'male', NULL, NULL, '1427206710botany.jpg', 1, '', '2015-03-24 09:27:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertise`
--
ALTER TABLE `advertise`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertise_schedule`
--
ALTER TABLE `advertise_schedule`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=233;
--
-- AUTO_INCREMENT for table `advertise_schedule`
--
ALTER TABLE `advertise_schedule`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `article_categories`
--
ALTER TABLE `article_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=238;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `file_segments`
--
ALTER TABLE `file_segments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=381;
--
-- AUTO_INCREMENT for table `image_comment_like`
--
ALTER TABLE `image_comment_like`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `musics`
--
ALTER TABLE `musics`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=546;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=421;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
