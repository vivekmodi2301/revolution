-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2018 at 12:13 AM
-- Server version: 5.6.39
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nyaydeep_revolution`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'revolution_admin', '9201cba3a056ca2df31f350799e4eca2 ');

-- --------------------------------------------------------

--
-- Table structure for table `april`
--

CREATE TABLE `april` (
  `id` int(11) NOT NULL,
  `datee` int(2) DEFAULT NULL,
  `roll` varchar(5) NOT NULL,
  `status` enum('p','a','h') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `august`
--

CREATE TABLE `august` (
  `id` int(11) NOT NULL,
  `datee` int(2) DEFAULT NULL,
  `roll` varchar(5) NOT NULL,
  `status` enum('p','a','h') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(2) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` enum('Yes','No') NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `status`) VALUES
(14, '7', ''),
(15, '6', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `status` enum('y','n') NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `mobile`, `subject`, `message`, `status`) VALUES
(1, 'vivek', 'modiv2301@gmail.com', '9024555623', 'this is subject ', 'hi this is vivek modi', 'y'),
(2, 'vivek', 'modiv2301@gmail.com', '9024555623', 'hi this is vivek', 'hi this is vivek modi', 'y'),
(3, 'vivek', 'modiv2301@gmail.com', '9024555623', 'this is subject ', 'this is msg', 'y'),
(4, 'vivek', 'modiv2301@gmail.com', '9024555623', 'this is subject ', 'this is msg', 'y'),
(5, 'vivek', 'modiv2301@gmail.com', '9024555623', 'this is subject ', 'this is msg', 'y'),
(6, 'vivek', 'modiv2301@gmail.com', '9024555623', 'this is subject ', 'this is msg', 'y'),
(7, 'fgdfg', 'fdgfd', 'fdgd', 'fgdfgvdf', 'fvfdvfd', 'y'),
(8, 'Jay Dalsaniya', 'jaydalsaniya@gmail.com', 'Mobile', 'xyz', 'hello', 'y'),
(9, 'raj', 'Email', '8947800330', 'testing', 'aaa', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `dece`
--

CREATE TABLE `dece` (
  `id` int(11) NOT NULL,
  `datee` int(2) DEFAULT NULL,
  `roll` varchar(5) NOT NULL,
  `status` enum('p','a','h') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_gallery`
--

CREATE TABLE `event_gallery` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `photo` text NOT NULL,
  `status` enum('y','n') NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_gallery`
--

INSERT INTO `event_gallery` (`id`, `category_id`, `photo`, `status`) VALUES
(5, 1, '1507129132_revolution_Chrysanthemum.jpg', 'y'),
(6, 1, '1507129132_revolution_Desert.jpg', 'y'),
(7, 1, '1507129132_revolution_Hydrangeas.jpg', 'y'),
(8, 1, '1507129132_revolution_Jellyfish.jpg', 'y'),
(9, 1, '1507129132_revolution_Tulips.jpg', 'y'),
(10, 2, '1507129142_revolution_Koala.jpg', 'n'),
(11, 2, '1507129142_revolution_Lighthouse.jpg', 'n'),
(12, 2, '1507129142_revolution_Penguins.jpg', 'n'),
(13, 1, '1507129879_revolution_Penguins.jpg', 'y'),
(14, 1, '1507129879_revolution_Tulips.jpg', 'y'),
(15, 1, '1507646422_revolution_Chrysanthemum.jpg', 'y'),
(16, 1, '1507646422_revolution_Desert.jpg', 'y'),
(17, 1, '1507646422_revolution_Hydrangeas.jpg', 'y'),
(18, 1, '1507646422_revolution_Jellyfish.jpg', 'y'),
(19, 1, '1507646422_revolution_Koala.jpg', 'y'),
(20, 1, '1507646422_revolution_Lighthouse.jpg', 'y'),
(21, 1, '1507646422_revolution_Penguins.jpg', 'y'),
(22, 1, '1507646422_revolution_Tulips.jpg', 'y'),
(23, 1, '1507646435_revolution_Chrysanthemum.jpg', 'y'),
(24, 1, '1507646435_revolution_Desert.jpg', 'y'),
(25, 1, '1507646435_revolution_Hydrangeas.jpg', 'y'),
(26, 1, '1507646435_revolution_Jellyfish.jpg', 'y'),
(27, 1, '1507646435_revolution_Koala.jpg', 'y'),
(28, 1, '1507646435_revolution_Lighthouse.jpg', 'y'),
(29, 1, '1507646435_revolution_Penguins.jpg', 'y'),
(30, 1, '1507646435_revolution_Tulips.jpg', 'y'),
(31, 2, '1507647277_revolution_Chrysanthemum.jpg', 'y'),
(32, 2, '1507647277_revolution_Desert.jpg', 'y'),
(33, 2, '1507647277_revolution_Hydrangeas.jpg', 'y'),
(34, 2, '1507647277_revolution_Jellyfish.jpg', 'y'),
(35, 2, '1507647277_revolution_Koala.jpg', 'y'),
(36, 2, '1507647277_revolution_Lighthouse.jpg', 'y'),
(37, 2, '1507647277_revolution_Penguins.jpg', 'y'),
(38, 2, '1507647277_revolution_Tulips.jpg', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `event_gallery_category`
--

CREATE TABLE `event_gallery_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_gallery_category`
--

INSERT INTO `event_gallery_category` (`id`, `name`) VALUES
(1, 'fresher party'),
(2, 'anual function');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `photo` text,
  `subject` varchar(50) DEFAULT NULL,
  `experince` float DEFAULT NULL,
  `status` enum('y','n') DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `photo`, `subject`, `experince`, `status`) VALUES
(11, 'khushbu', '1506950441_revolution_Penguins.jpg', 'computer', 10, 'y'),
(12, 'vivek', '1507719238_revolution_Koala.jpg', 'hindi', 15, 'y'),
(13, 'geetika', '1507719264_revolution_Tulips.jpg', 'commerce', 20, 'y'),
(14, 'Jay', '1517750186_revolution_pexels-photo.jpg', 'Java', 10, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `feb`
--

CREATE TABLE `feb` (
  `id` int(11) NOT NULL,
  `datee` int(2) DEFAULT NULL,
  `roll` varchar(5) NOT NULL,
  `status` enum('p','a','h') DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feb`
--

INSERT INTO `feb` (`id`, `datee`, `roll`, `status`) VALUES
(1, 2, '1', 'a'),
(2, 2, '2', 'p'),
(3, 2, '3', 'a'),
(4, 2, '4', 'p'),
(5, 2, '5', 'a'),
(6, 2, '6', 'p'),
(7, 2, '7', 'p'),
(8, 2, '8', 'p'),
(9, 2, '9', 'p'),
(10, 1, '1', 'p'),
(11, 1, '2', 'p'),
(12, 1, '3', 'p'),
(13, 1, '4', 'p'),
(14, 1, '5', 'a'),
(15, 1, '6', 'a'),
(16, 1, '7', 'p'),
(17, 1, '8', 'p'),
(18, 1, '9', 'a'),
(19, 1, '10', 'p'),
(20, 1, '11', 'a'),
(21, 1, '12', 'p'),
(22, 1, '13', 'p'),
(23, 1, '14', 'p'),
(24, 1, '15', 'a'),
(25, 1, '16', 'p'),
(26, 1, '17', 'a'),
(27, 1, '18', 'a'),
(28, 1, '19', 'a'),
(29, 1, '20', 'p'),
(30, 1, '21', 'p'),
(31, 1, '22', 'p');

-- --------------------------------------------------------

--
-- Table structure for table `icon`
--

CREATE TABLE `icon` (
  `id` int(5) NOT NULL,
  `logo` text,
  `small_logo` text,
  `map` text,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `facebook` text,
  `twitter` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icon`
--

INSERT INTO `icon` (`id`, `logo`, `small_logo`, `map`, `contact`, `email`, `facebook`, `twitter`) VALUES
(1, '1527673294_5.jpg', '1521959835_hand.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d464.8558393171447!2d72.88978030431208!3d21.2379261830264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f5aff5169af%3A0x86194fe1e1e59f99!2sRevolution+Beyond+Education!5e0!3m2!1sen!2sin!4v1522584627215\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '84884848448', 'modiv2301@gmail.com', 'sjdkljl', 'thj');

-- --------------------------------------------------------

--
-- Table structure for table `jan`
--

CREATE TABLE `jan` (
  `id` int(11) NOT NULL,
  `datee` int(2) DEFAULT NULL,
  `roll` varchar(8) NOT NULL,
  `status` enum('p','a','h') DEFAULT NULL,
  `session` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jan`
--

INSERT INTO `jan` (`id`, `datee`, `roll`, `status`, `session`) VALUES
(1, 1, '1', 'a', '2017-2018'),
(2, 1, '2', 'p', '2017-2018'),
(3, 1, '3', 'a', '2017-2018'),
(4, 1, '4', 'p', '2017-2018'),
(5, 1, '5', 'a', '2017-2018'),
(6, 1, '6', 'p', '2017-2018'),
(7, 1, '7', 'p', '2017-2018'),
(8, 1, '8', 'p', '2017-2018'),
(9, 1, '9', 'p', '2017-2018'),
(10, 1, '10', 'p', '2017-2018'),
(11, 1, '11', 'a', '2017-2018'),
(12, 1, '12', 'a', '2017-2018'),
(13, 1, '13', 'p', '2017-2018'),
(14, 1, '14', 'a', '2017-2018'),
(15, 1, '15', 'a', '2017-2018'),
(16, 1, '16', 'a', '2017-2018'),
(17, 1, '17', 'p', '2017-2018'),
(18, 1, '18', 'a', '2017-2018'),
(19, 1, '19', 'p', '2017-2018'),
(20, 1, '20', 'a', '2017-2018'),
(21, 1, '21', 'p', '2017-2018'),
(22, 1, '22', 'a', '2017-2018'),
(23, 2, '1', 'p', '2017-2018'),
(24, 2, '2', 'p', '2017-2018'),
(25, 2, '3', 'p', '2017-2018'),
(26, 2, '4', 'p', '2017-2018'),
(27, 2, '5', 'a', '2017-2018'),
(28, 2, '6', 'a', '2017-2018'),
(29, 2, '7', 'p', '2017-2018'),
(30, 2, '8', 'p', '2017-2018'),
(31, 2, '9', 'a', '2017-2018'),
(32, 2, '10', 'p', '2017-2018'),
(33, 2, '11', 'a', '2017-2018'),
(34, 2, '12', 'p', '2017-2018'),
(35, 2, '13', 'p', '2017-2018'),
(36, 2, '14', 'p', '2017-2018'),
(37, 2, '15', 'a', '2017-2018'),
(38, 2, '16', 'p', '2017-2018'),
(39, 2, '17', 'a', '2017-2018'),
(40, 2, '18', 'a', '2017-2018'),
(41, 2, '19', 'a', '2017-2018'),
(42, 2, '20', 'p', '2017-2018'),
(43, 2, '21', 'p', '2017-2018'),
(44, 2, '22', 'p', '2017-2018');

-- --------------------------------------------------------

--
-- Table structure for table `july`
--

CREATE TABLE `july` (
  `id` int(11) NOT NULL,
  `datee` int(2) DEFAULT NULL,
  `roll` varchar(5) NOT NULL,
  `status` enum('p','a','h') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `june`
--

CREATE TABLE `june` (
  `id` int(11) NOT NULL,
  `datee` int(2) DEFAULT NULL,
  `roll` varchar(5) NOT NULL,
  `status` enum('p','a','h') DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `june`
--

INSERT INTO `june` (`id`, `datee`, `roll`, `status`) VALUES
(1, 1, '', 'a'),
(2, 2, '', 'p'),
(3, 3, '', 'a'),
(4, 4, '', 'p'),
(5, 5, '', 'a'),
(6, 6, '', 'p'),
(7, 7, '', 'p'),
(8, 8, '', 'p'),
(9, 9, '', 'p'),
(10, 10, '', 'p'),
(11, 11, '', 'a'),
(12, 12, '', 'a'),
(13, 13, '', 'p'),
(14, 14, '', 'a'),
(15, 15, '', 'a'),
(16, 16, '', 'a'),
(17, 17, '', 'p'),
(18, 18, '', 'a'),
(19, 19, '', 'p'),
(20, 20, '', 'a'),
(21, 21, '', 'p'),
(22, 22, '', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `march`
--

CREATE TABLE `march` (
  `id` int(11) NOT NULL,
  `datee` int(2) DEFAULT NULL,
  `roll` varchar(5) NOT NULL,
  `status` enum('p','a','h') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `march`
--

INSERT INTO `march` (`id`, `datee`, `roll`, `status`) VALUES
(1, 1, '1', 'p'),
(2, 1, '2', 'p'),
(3, 1, '3', 'p'),
(4, 1, '4', 'p'),
(5, 1, '5', 'a'),
(6, 1, '6', 'a'),
(7, 1, '7', 'p'),
(8, 1, '8', 'p'),
(9, 1, '9', 'a'),
(10, 1, '10', 'p'),
(11, 1, '11', 'a'),
(12, 1, '12', 'p'),
(13, 1, '13', 'p'),
(14, 1, '14', 'p'),
(15, 1, '15', 'a'),
(16, 1, '16', 'p'),
(17, 1, '17', 'a'),
(18, 1, '18', 'a'),
(19, 1, '19', 'a'),
(20, 1, '20', 'p'),
(21, 1, '21', 'p'),
(22, 1, '22', 'p'),
(23, 21, '0', 'a'),
(24, 21, '1', 'a'),
(25, 21, '2', 'p'),
(26, 28, '12', 'p'),
(27, 28, '123', 'p');

-- --------------------------------------------------------

--
-- Table structure for table `may`
--

CREATE TABLE `may` (
  `id` int(11) NOT NULL,
  `datee` int(2) DEFAULT NULL,
  `roll` varchar(5) NOT NULL,
  `status` enum('p','a','h') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(1) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` enum('yes','no') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo` text NOT NULL,
  `designation` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `status` enum('y','n') NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `photo`, `designation`, `message`, `status`) VALUES
(2, 'khushboo', '1506957442_revolution_Penguins.jpg', 'principle', 'this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi this is vivek modi 								', 'y'),
(3, 'Vivek Modi', '1506992644_revolution_Lighthouse.jpg', 'CEO', 'this is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modithis is vivek modi							', 'y'),
(4, 'xbhxbh', '1517749236_revolution_pexels-photo.jpg', 'vice principal', 'djsncjsdnlcjxdsc4sdcmdsc\r\ncndsck\r\nsdcdsncs							', 'y'),
(5, 'msg', '1527673576_revolution_3.jpg', 'ddes', '				mm										', 'y'),
(6, 'name', '1527690316_revolution_4.jpg', 'desc', 'mmmm							', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `nov`
--

CREATE TABLE `nov` (
  `id` int(11) NOT NULL,
  `datee` int(2) DEFAULT NULL,
  `roll` varchar(5) NOT NULL,
  `status` enum('p','a','h') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `october`
--

CREATE TABLE `october` (
  `id` int(11) NOT NULL,
  `datee` int(2) DEFAULT NULL,
  `roll` varchar(5) NOT NULL,
  `status` enum('p','a','h') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages_priority`
--

CREATE TABLE `pages_priority` (
  `id` int(11) NOT NULL,
  `page_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages_priority`
--

INSERT INTO `pages_priority` (`id`, `page_id`, `name`, `priority`) VALUES
(1, 'home', 'Home', 1),
(2, 'eventGallery', 'Event Gallery', 3),
(6, 'contact', 'Contact', 7),
(7, 'schoolGallery', 'School Gallery', 4),
(8, 'login', 'Login', 2),
(9, 'testimonial', 'Testimonial', 6),
(10, '13', 'page1', 5),
(11, '14', 'History', 8),
(12, '15', 'abc', 9),
(13, '16', 'hello', 10);

-- --------------------------------------------------------

--
-- Table structure for table `school_gallery`
--

CREATE TABLE `school_gallery` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `photo` text NOT NULL,
  `status` enum('y','n') NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_gallery`
--

INSERT INTO `school_gallery` (`id`, `category_id`, `photo`, `status`) VALUES
(46, 2, '1507127924_revolution_Chrysanthemum.jpg', 'y'),
(48, 2, '1507127924_revolution_Hydrangeas.jpg', 'y'),
(49, 2, '1507127924_revolution_Jellyfish.jpg', 'y'),
(50, 2, '1517746090_revolution_pexels-photo.jpg', 'y'),
(51, 3, '1517746243_revolution_pexels-photo.jpg', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `school_gallery_category`
--

CREATE TABLE `school_gallery_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_gallery_category`
--

INSERT INTO `school_gallery_category` (`id`, `name`) VALUES
(2, 'computer lab'),
(3, 'libarary'),
(4, 'cycle parking'),
(5, 'bio lab'),
(6, 'classroom');

-- --------------------------------------------------------

--
-- Table structure for table `september`
--

CREATE TABLE `september` (
  `id` int(11) NOT NULL,
  `datee` int(2) DEFAULT NULL,
  `roll` varchar(5) NOT NULL,
  `status` enum('p','a','h') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `photo` text NOT NULL,
  `status` enum('y','n') NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `photo`, `status`) VALUES
(7, '1506950496_revolution_Penguins.jpg', 'y'),
(8, '1506849968_revolution_Chrysanthemum.jpg', 'y'),
(9, '1517749995_revolution_pexels-photo.jpg', 'y'),
(10, '1527666687_revolution_1.jpg', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `starstudent`
--

CREATE TABLE `starstudent` (
  `id` int(5) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `photo` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `starstudent`
--

INSERT INTO `starstudent` (`id`, `name`, `photo`) VALUES
(1, 'sdfajkl', '1528303623_img239 - Copy.jpg'),
(2, 'abcd', '1527690213_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `static_gallery`
--

CREATE TABLE `static_gallery` (
  `id` int(11) NOT NULL,
  `photo` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `static_gallery`
--

INSERT INTO `static_gallery` (`id`, `photo`) VALUES
(3, '1517745213_revolution_pexels-photo.jpg'),
(4, '1523884554_revolution_1384449372_10.JPG'),
(5, '1527667884_revolution_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `static_page`
--

CREATE TABLE `static_page` (
  `id` int(11) NOT NULL,
  `page_name` varchar(50) DEFAULT NULL,
  `page_description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `static_page`
--

INSERT INTO `static_page` (`id`, `page_name`, `page_description`) VALUES
(13, 'page1', '<h2 style=\\\"font-style:italic\\\"><span style=\\\"color:#d35400\\\"><u><em><strong><span style=\\\"font-size:48px\\\">History at REVOLUTION<img alt=\\\"\\\" src=\\\"http://www.nyaydeep.com/revolution/revolution_admin/static_gallery/1517745213_revolution_pexels-photo.jpg\\\" /></span></strong></em></u></span></h2>\r\n'),
(14, 'History', '<p><span style=\\\"color:#1abc9c\\\">Heloo everyone</span></p>\r\n'),
(15, 'abc', '<p><span style=\\\"color:#c0392b\\\"><span style=\\\"font-size:22px\\\">this is abc page</span></span></p>\r\n'),
(16, 'hello', '<p>this is testing page...!!!</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `father_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `dob` varchar(10) DEFAULT NULL,
  `address` text,
  `whatsapp_no` varchar(12) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `previous_school` text,
  `board` varchar(8) DEFAULT NULL,
  `previous_per` int(3) DEFAULT NULL,
  `pass` text NOT NULL,
  `class_id` int(11) NOT NULL,
  `datee` varchar(50) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `roll`, `name`, `gender`, `father_name`, `email`, `dob`, `address`, `whatsapp_no`, `mobile`, `previous_school`, `board`, `previous_per`, `pass`, `class_id`, `datee`, `photo`) VALUES
(1, 0, 'name', '', 'father name', 'email', 'dob', 'address', 'whatsapp', 'mobile', 'previous school', 'board', 0, '5f4dcc3b5aa765d61d8327deb882cf99', 14, '', ''),
(2, 1, 'khushboo', 'female', 'manohar', 'abc@gmail.com', '24-06-1987', 'abc 123', '9876543210', '9876543210', 'aa', 'mm', 90, '81dc9bdb52d04dc20036dbd8313ed055', 14, '', ''),
(3, 2, 'rahul', 'male', 'ram', 'xyz@gmail.com', '20-10-1992', '123 lmn', '9876543219', '9876543219', 'sd', 'nb', 80, '289dff07669d7a23de0ef88d2f7129e7', 14, '', ''),
(4, 12, 'vivek modi', 'male', 'manohar lal modi', 'modiv2301@gmail.com', '2018-03-06', 'bikaner', '995595959595', '959595959592', 'abc', 'rbse', 50, '81dc9bdb52d04dc20036dbd8313ed055', 15, '6-3-2018', '1520792123_revolution_student_pexels-photo-279470.jpeg'),
(5, 123, 'abc', 'female', 'abc', 'abc@gmail.com', '1987-10-24', 'aaaaaa', '9874563210', '9874563210', 'xyz', 'kjsdgck', 90, '202cb962ac59075b964b07152d234b70', 15, '6-3-2018', '1520792123_revolution_student_pexels-photo-279470.jpeg'),
(6, 6001, 'Jay Dalsaniya', 'male', 'Viththalbhai', 'jaydalsaniya@gmail.com', '1990-06-13', 'vgvhvhgvhg', '1234567890', '1234567890', 'bhsbjcbs', 'nsdjxnjs', 90, '81dc9bdb52d04dc20036dbd8313ed055', 14, '12', '1522253112_revolution_student_pexels-photo-248797.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `class_id` int(2) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `class_id`, `name`) VALUES
(1, 0, 'cg'),
(2, 0, 'os'),
(3, 0, 'vivek'),
(4, 0, 'modi'),
(5, 0, 'vivek'),
(6, 0, 'modi'),
(7, 9, 'cd'),
(8, 10, ''),
(9, 10, ''),
(10, 11, 'vivek'),
(11, 11, 'modi'),
(12, 12, 'cg'),
(13, 12, 'ds'),
(14, 13, 'sf'),
(15, 14, 'English'),
(16, 14, 'Science'),
(17, 14, 'Maths'),
(18, 14, 'Social Science');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `roll` varchar(10) DEFAULT NULL,
  `scored` int(3) NOT NULL,
  `datee` varchar(10) NOT NULL,
  `subject` varchar(20) DEFAULT NULL,
  `portion` varchar(100) DEFAULT NULL,
  `out_of` int(3) DEFAULT NULL,
  `class_id` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `roll`, `scored`, `datee`, `subject`, `portion`, `out_of`, `class_id`) VALUES
(13, '1', 98, '123456', '1', 'abc', 100, '1'),
(14, '2', 9, '23.01.1994', '1', 'abc', 100, '2'),
(15, '3', 7, '23.01.1994', '1', 'abc', 100, '3'),
(16, '4', 6, '23.01.1994', '1', 'abc', 100, '4'),
(17, '5', 10, '23.01.1994', '1', 'abc', 100, '5'),
(18, '1', 8, '23.01.1994', '1', 'hggjh', 100, '2'),
(19, '2', 9, '23.01.1994', '1', 'hggjh', 100, '1'),
(20, '3', 7, '23.01.1994', '1', 'hggjh', 100, '3'),
(21, '4', 6, '23.01.1994', '1', 'hggjh', 100, '4'),
(22, '5', 10, '23.01.1994', '1', 'hggjh', 100, '5'),
(23, '6', 98, '23011994', '13', 'tree', 100, '4'),
(24, 'roll ', 0, '25/04/2017', '1', 'abc', 50, '15'),
(25, '1', 45, '25/04/2017', '1', 'abc', 50, '15'),
(26, '2', 25, '25/04/2017', '1', 'abc', 50, '15');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(5) NOT NULL,
  `message` text,
  `roll` varchar(20) NOT NULL,
  `status` enum('y','n') NOT NULL DEFAULT 'n'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `message`, `roll`, `status`) VALUES
(1, 'kwefjwoi', '12', 'y'),
(2, 'vivek hun', '12', 'y'),
(3, 'hi this is vivek modi', '12', 'y'),
(4, 'hello everyone..it is an real revolution in education', '6001', 'y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `april`
--
ALTER TABLE `april`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `august`
--
ALTER TABLE `august`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dece`
--
ALTER TABLE `dece`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_gallery`
--
ALTER TABLE `event_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_gallery_category`
--
ALTER TABLE `event_gallery_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feb`
--
ALTER TABLE `feb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icon`
--
ALTER TABLE `icon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jan`
--
ALTER TABLE `jan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `july`
--
ALTER TABLE `july`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `june`
--
ALTER TABLE `june`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `march`
--
ALTER TABLE `march`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `may`
--
ALTER TABLE `may`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nov`
--
ALTER TABLE `nov`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `october`
--
ALTER TABLE `october`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages_priority`
--
ALTER TABLE `pages_priority`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_gallery`
--
ALTER TABLE `school_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_gallery_category`
--
ALTER TABLE `school_gallery_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `september`
--
ALTER TABLE `september`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `starstudent`
--
ALTER TABLE `starstudent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static_gallery`
--
ALTER TABLE `static_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static_page`
--
ALTER TABLE `static_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `april`
--
ALTER TABLE `april`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `august`
--
ALTER TABLE `august`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dece`
--
ALTER TABLE `dece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_gallery`
--
ALTER TABLE `event_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `event_gallery_category`
--
ALTER TABLE `event_gallery_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `feb`
--
ALTER TABLE `feb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `icon`
--
ALTER TABLE `icon`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jan`
--
ALTER TABLE `jan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `july`
--
ALTER TABLE `july`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `june`
--
ALTER TABLE `june`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `march`
--
ALTER TABLE `march`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `may`
--
ALTER TABLE `may`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nov`
--
ALTER TABLE `nov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `october`
--
ALTER TABLE `october`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages_priority`
--
ALTER TABLE `pages_priority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `school_gallery`
--
ALTER TABLE `school_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `school_gallery_category`
--
ALTER TABLE `school_gallery_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `september`
--
ALTER TABLE `september`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `starstudent`
--
ALTER TABLE `starstudent`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `static_gallery`
--
ALTER TABLE `static_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `static_page`
--
ALTER TABLE `static_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
