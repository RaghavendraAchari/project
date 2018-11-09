-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 25, 2018 at 06:06 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `working_solutions`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` varchar(10) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_password` varchar(10) NOT NULL,
  `admin_phone` varchar(10) NOT NULL,
  `admin_address` text NOT NULL,
  PRIMARY KEY (`admin_id`,`admin_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`, `admin_phone`, `admin_address`) VALUES
('admin1', 'Raghavendra', 'is074', '7589378484', '#234/3, Sun street, Rajajinagar, Bengaluru - 560085'),
('admin2', 'Ramesh V', 'is077', '9878767654', '#231, Food street, Rjajinagar, Bengaluru - 560085');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE IF NOT EXISTS `branches` (
  `branch_id` char(1) NOT NULL,
  `branch_name` varchar(30) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `branch_name`) VALUES
('1', 'Cyber'),
('2', 'Electrical'),
('3', 'Mechanical'),
('4', 'Carpentry');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `workshop_id` varchar(10) NOT NULL,
  `workshop_rating` float NOT NULL,
  PRIMARY KEY (`workshop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`workshop_id`, `workshop_rating`) VALUES
('dcws2', 4.6),
('marvelws', 4.3),
('marvelws2', 4.6),
('marvelws3', 4),
('paraws', 4),
('sonyws', 4.6),
('sonyws2', 4.2);

-- --------------------------------------------------------

--
-- Table structure for table `timing_details`
--

DROP TABLE IF EXISTS `timing_details`;
CREATE TABLE IF NOT EXISTS `timing_details` (
  `workshop_id` varchar(10) NOT NULL,
  `day` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `slot1` enum('booked','available','not-available') DEFAULT 'available',
  `slot2` enum('booked','available','not-available') DEFAULT 'available',
  `slot3` enum('booked','available','not-available') DEFAULT 'available',
  `slot4` enum('booked','available','not-available') DEFAULT 'available',
  KEY `workshopid` (`workshop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timing_details`
--

INSERT INTO `timing_details` (`workshop_id`, `day`, `slot1`, `slot2`, `slot3`, `slot4`) VALUES
('dcws2', 'Monday', 'available', 'available', 'available', 'available'),
('dcws2', 'Tuesday', 'available', 'available', 'available', 'available'),
('dcws2', 'Wednesday', 'available', 'available', 'available', 'available'),
('dcws2', 'Thursday', 'available', 'available', 'available', 'available'),
('dcws2', 'Friday', 'available', 'available', 'available', 'available'),
('dcws2', 'Saturday', 'available', 'available', 'available', 'available'),
('dcws2', 'Sunday', 'available', 'available', 'available', 'available'),
('marvelws', 'Monday', 'available', 'available', 'available', 'available'),
('marvelws', 'Tuesday', 'available', 'available', 'available', 'available'),
('marvelws', 'Wednesday', 'available', 'available', 'available', 'available'),
('marvelws', 'Thursday', 'available', 'available', 'available', 'available'),
('marvelws', 'Friday', 'available', 'available', 'available', 'available'),
('marvelws', 'Saturday', 'available', 'available', 'available', 'available'),
('marvelws', 'Sunday', 'available', 'available', 'available', 'available'),
('marvelws2', 'Monday', 'available', 'available', 'available', 'available'),
('marvelws2', 'Tuesday', 'available', 'available', 'available', 'available'),
('marvelws2', 'Wednesday', 'available', 'available', 'available', 'available'),
('marvelws2', 'Thursday', 'available', 'available', 'available', 'available'),
('marvelws2', 'Friday', 'available', 'available', 'available', 'available'),
('marvelws2', 'Saturday', 'available', 'available', 'available', 'available'),
('marvelws2', 'Sunday', 'available', 'available', 'available', 'available'),
('sonyws', 'Monday', 'available', 'available', 'available', 'available'),
('sonyws', 'Tuesday', 'available', 'available', 'available', 'available'),
('sonyws', 'Wednesday', 'available', 'available', 'available', 'available'),
('sonyws', 'Thursday', 'available', 'available', 'available', 'available'),
('sonyws', 'Friday', 'available', 'available', 'available', 'available'),
('sonyws', 'Saturday', 'available', 'available', 'available', 'available'),
('sonyws', 'Sunday', 'available', 'available', 'available', 'available'),
('sonyws2', 'Monday', 'available', 'available', 'available', 'available'),
('sonyws2', 'Tuesday', 'available', 'available', 'available', 'available'),
('sonyws2', 'Wednesday', 'available', 'available', 'available', 'available'),
('sonyws2', 'Thursday', 'available', 'available', 'available', 'available'),
('sonyws2', 'Friday', 'available', 'available', 'available', 'available'),
('sonyws2', 'Saturday', 'available', 'available', 'available', 'available'),
('sonyws2', 'Sunday', 'available', 'available', 'available', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(10) NOT NULL,
  `user_fname` varchar(30) NOT NULL,
  `user_lname` varchar(30) NOT NULL,
  `user_phone` varchar(10) NOT NULL,
  `user_address` text NOT NULL,
  `user_password` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `user_phone`, `user_address`, `user_password`) VALUES
('dc', 'DC', 'comics', '6565656565', '#89/5, Malya Street,1st main,RR nagar, Bengaluru - 560089', 'dc'),
('marvel', 'Marvel', 'Studios', '7575757575', '#111, BTM layout, Jayanagar, Bengaluru -560002', 'marvel'),
('paramount', 'Paramount', 'Studios', '7465487457', '#112, Dr.Rajkumar Road, MariyappanPalya, Bengaluru, 560344', 'paramount'),
('sony', 'Sony', 'Universe', '8989898989', '#234, Gandhi Street, JP nagar, Bengaluru - 560078', 'sony');

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

DROP TABLE IF EXISTS `workshop`;
CREATE TABLE IF NOT EXISTS `workshop` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `workshop_id` varchar(10) NOT NULL,
  `workshop_name` varchar(40) NOT NULL,
  `workshop_phone` varchar(10) NOT NULL,
  `workshop_address` text NOT NULL,
  `Workshop_branch_id` char(1) NOT NULL,
  `workshop_user_id` varchar(10) NOT NULL,
  `price` int(11) NOT NULL,
  `admin_accepted` tinyint(1) NOT NULL,
  PRIMARY KEY (`workshop_id`),
  KEY `branch` (`Workshop_branch_id`),
  KEY `user` (`workshop_user_id`),
  KEY `no` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`no`, `workshop_id`, `workshop_name`, `workshop_phone`, `workshop_address`, `Workshop_branch_id`, `workshop_user_id`, `price`, `admin_accepted`) VALUES
(1, 'dcws2', 'DC studios', '5645645646', '12, Flood street, 2nd stage, jp nagar ,Bengaluru - 560789', '3', 'dc', 300, 1),
(2, 'marvelws', 'Marvel\'s', '5343653635', '#123/5, 2nd Street, Peenya, Bengaluru - 560079', '1', 'marvel', 400, 1),
(3, 'marvelws2', 'Marvel\'s', '7686957456', '#456, 3rd Main, Long street, Basavanagudi,Bengaluru - 560089', '2', 'marvel', 350, 1),
(4, 'marvelws3', 'Marvel\'s', '2344322345', '#45, 2nd Street, South-End circle, Bengaluru - 560089', '4', 'marvel', 370, 0),
(5, 'paraws', 'Paramount Technologies', '7686758495', '#234, 2nd Main, Basavanagudi, Bengaluru - 560034', '1', 'paramount', 400, 1),
(6, 'sonyws', 'Sony ', '76869578', '#45, chord Road, Vijaynagar, Bengaluru - 560009', '4', 'sony', 420, 1),
(7, 'sonyws2', 'Sony', '4353647578', '#65, 1st main,Pipeline road, Rajajinagar, Bengaluru 560089', '1', 'sony', 390, 1);

-- --------------------------------------------------------

--
-- Table structure for table `workshop_details`
--

DROP TABLE IF EXISTS `workshop_details`;
CREATE TABLE IF NOT EXISTS `workshop_details` (
  `workshop_id` varchar(10) NOT NULL,
  `basic_tools` int(11) NOT NULL,
  `advanced_tools` int(11) NOT NULL,
  `area_of_workshop` double NOT NULL,
  `transportation_available` tinyint(1) NOT NULL,
  PRIMARY KEY (`workshop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_workshop_id` FOREIGN KEY (`workshop_id`) REFERENCES `workshop` (`workshop_id`) ON DELETE CASCADE;

--
-- Constraints for table `timing_details`
--
ALTER TABLE `timing_details`
  ADD CONSTRAINT `workshopid` FOREIGN KEY (`workshop_id`) REFERENCES `workshop` (`workshop_id`) ON DELETE CASCADE;

--
-- Constraints for table `workshop`
--
ALTER TABLE `workshop`
  ADD CONSTRAINT `branch` FOREIGN KEY (`Workshop_branch_id`) REFERENCES `branches` (`branch_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`workshop_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `workshop_details`
--
ALTER TABLE `workshop_details`
  ADD CONSTRAINT `workshop` FOREIGN KEY (`workshop_id`) REFERENCES `workshop` (`workshop_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
