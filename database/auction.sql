-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 14, 2021 at 03:27 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `userid` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` char(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`userid`, `name`, `password`) VALUES
('rich', 'Rich Blum', '3cdfa761361762ddedc01ea1428db10a92e327325f490f7f34f1b1b91d994f22'),
('2', 'Rachel', '$2y$10$ykBOzlUc8Tgxya9bjoG1.OBStptAIq5c/Wdxm4tthRb4dzzK2EWnC');

-- --------------------------------------------------------

--
-- Table structure for table `bidders`
--

CREATE TABLE `bidders` (
  `bidderid` int(11) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(14) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bidders`
--

INSERT INTO `bidders` (`bidderid`, `lastname`, `firstname`, `address`, `phone`) VALUES
(2, 'Gill', 'Winch', 'NY, USA', '598705'),
(3, 'Achon', 'Achim', '54 Dusseldruf', '234-67656'),
(4, 'Maria', 'Prenzel', 'Berlin, Germany', '54656-7876'),
(65, 'Peterson', 'Daniel', 'Street A, City A', '67687');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `resaleprice` decimal(10,2) NOT NULL,
  `winbidder` int(11) NOT NULL,
  `winprice` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemid`, `name`, `description`, `resaleprice`, `winbidder`, `winprice`) VALUES
(1, 'painting', 'a precious painting from 18th century', '1000000.62', 2, '1100000.11'),
(2, 'haircut', 'haircut by Kardachian\'s hair dresser', '4000.89', 1, '5500.89'),
(3, 'biking', 'binking in Bill Gates garden', '200.00', 3, '381.00'),
(4, 'Sandwiches', 'Sandwiches made by Azar', '40.50', 4, '67.00'),
(5, 'manicure', 'manicuring by John', '22.00', 1, '38.00'),
(6, 'Gas supply', 'A six-month gas supply of an orphanage.', '654.00', 4, '765.56');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
