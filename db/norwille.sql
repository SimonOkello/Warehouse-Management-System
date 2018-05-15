-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2018 at 10:21 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `norwille`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `firstname`, `lastname`, `username`, `password`, `address`, `phone`, `image`) VALUES
(1, 'Norwille', 'Ademba', 'admin', 'admin', 'Mumias', '0712345678', 'EMP003.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`user_id`, `firstname`, `lastname`, `username`, `password`, `address`, `phone`, `image`) VALUES
(2, 'Zeddy', 'Chemutai', 'customer', 'customer', 'Nandi', '0728435050', 'EMP004.jpeg'),
(6, 'Raph', 'Wambua', 'raph', '123', 'Machakos', '0712345678', '');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`user_id`, `firstname`, `lastname`, `username`, `password`, `address`, `phone`, `image`) VALUES
(4, 'Simon ', 'Dennis', 'employee', 'employee', 'Eldoret', '0712345678', 'EMP003.jpg'),
(7, 'Raph', 'Wambua', 'raph', '123', 'Mombasa', '0712345678', 'U008.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` varchar(5) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` varchar(5) NOT NULL,
  `qty` int(11) NOT NULL,
  `added_On` date NOT NULL,
  `delivery_date` date NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Undelivered',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `added_On`, `delivery_date`, `status`) VALUES
('BKQY4', 6, 'XDBV9', 3, '2018-03-22', '2018-03-29', 'Undelivered'),
('CJCW2', 2, 'XDBV9', 2, '2018-03-20', '2018-03-23', 'Deleted'),
('F5WJ0', 6, '0OBVR', 2, '2018-03-22', '2018-03-26', 'Undelivered'),
('FKX85', 6, '6H63Y', 5, '2018-03-22', '2018-03-28', 'Undelivered'),
('HLXSP', 6, 'J4J55', 1, '2018-03-22', '2018-03-28', 'Undelivered'),
('SYJ46', 2, '0OBVR', 10, '2018-03-22', '2018-03-25', 'Undelivered');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` varchar(5) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `price` double NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `added_On` date NOT NULL,
  `qty_sold` int(255) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `qty`, `price`, `company_name`, `user_id`, `added_On`, `qty_sold`) VALUES
('0OBVR', 'Neon Smartphone', 988, 50000, 'Safaricom', 5, '2018-03-22', 12),
('6H63Y', 'Lenovo T-Series', 5, 50000, 'Lenovo', 1, '2018-03-21', 5),
('J4J55', 'Lenovo Yoga', 169, 70000, 'Lenovo', 1, '2018-03-20', 31);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`user_id`, `firstname`, `lastname`, `username`, `password`, `address`, `phone`, `image`) VALUES
(1, 'Simon ', 'Okello', 'Supplier', '123', 'Nairobi', '0702440280', 'U008.jpg'),
(5, 'Kenneth', 'Omolo', 'supplier1', 'supplier1', 'Kisumu', '0712345678', 'U009.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE IF NOT EXISTS `user_log` (
  `user_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `login_date` varchar(30) NOT NULL,
  `logout_date` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`user_log_id`, `username`, `login_date`, `logout_date`, `user_id`) VALUES
(1, 'admin', '2018-03-23 08:02:39', '', 3),
(2, 'admin', '2018-03-23 08:25:09', '', 3),
(3, 'customer', '2018-03-23 08:34:12', '', 2),
(4, 'supplier', '2018-03-23 08:34:31', '', 1),
(5, 'customer', '2018-03-23 08:35:02', '', 2),
(6, 'supplier', '2018-03-23 08:36:36', '', 1),
(7, 'supplier', '2018-03-23 08:40:06', '', 1),
(8, 'customer', '2018-03-23 08:41:56', '', 2),
(9, 'employee', '2018-03-23 08:43:59', '', 4),
(10, 'customer', '2018-03-23 09:29:08', '', 2),
(11, 'employee', '2018-03-23 09:29:44', '', 4),
(12, 'customer', '2018-03-23 09:29:58', '', 2),
(13, 'supplier', '2018-03-23 09:34:36', '', 1),
(14, 'admin', '2018-03-23 09:38:47', '', 3),
(15, 'supplier1', '2018-03-23 09:45:46', '', 5),
(16, 'admin', '2018-03-24 14:13:19', '', 3),
(17, 'employee', '2018-03-24 14:16:08', '', 4),
(18, 'admin', '2018-04-01 18:38:09', '', 3),
(19, 'admin', '2018-04-01 22:16:55', '', 1),
(20, 'admin', '2018-04-01 22:43:08', '', 1),
(21, 'supplier', '2018-04-01 22:48:13', '', 1),
(22, 'customer', '2018-04-01 22:53:41', '', 2),
(23, 'admin', '2018-04-01 22:58:47', '', 1),
(24, 'raph', '2018-04-01 23:13:01', '', 7),
(25, 'employee', '2018-04-01 23:21:11', '', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
