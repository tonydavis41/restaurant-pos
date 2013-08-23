-- MySQL dump 10.13  Distrib 5.5.20, for Win32 (x86)
--
-- Host: localhost    Database: twinboys
-- ------------------------------------------------------
-- Server version	5.5.20-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `brand` varchar(30) NOT NULL DEFAULT '',
  `id` int(8) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 COMMENT='Contains brands that items use to be more descriptive';

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `category` varchar(30) NOT NULL DEFAULT '',
  `id` int(8) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Contains categories that items use to be more descriptive';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category`, `id`) VALUES
('Food', 1),
('Drink', 2);

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `first_name` varchar(75) NOT NULL DEFAULT '',
  `last_name` varchar(75) NOT NULL DEFAULT '',
  `account_number` varchar(10) NOT NULL DEFAULT '',
  `phone_number` varchar(25) NOT NULL DEFAULT '',
  `email` varchar(40) NOT NULL DEFAULT '',
  `street_address` varchar(150) NOT NULL DEFAULT '',
  `comments` blob NOT NULL,
  `id` int(8) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COMMENT='Customer Info.';

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`first_name`, `last_name`, `account_number`, `phone_number`, `email`, `street_address`, `comments`, `id`) VALUES
('Table 1', '-', '', '-', '', '', '', 1),
('Table 2', '-', '', '-', '', '', '', 2),
('Table 3', '-', '', '-', '', '', '', 3),
('Table 4', '-', '', '-', '', '', '', 4),
('Table 5', '-', '', '-', '', '', '', 5),
('Table 6', '-', '', '-', '', '', '', 6),
('Table 7', '-', '', '-', '', '', '', 7),
('Table 8', '-', '', '-', '', '', '', 8),
('Table 9', '-', '', '-', '', '', '', 9),
('Table 10', '-', '', '-', '', '', '', 10),
('Table 11', '-', '', '-', '', '', '', 11),
('Table 12', '-', '', '-', '', '', '', 12),
('Table 13', '-', '', '-', '', '', '', 13),
('Table 14', '-', '', '-', '', '', '', 14),
('Table 15', '-', '', '-', '', '', '', 15),
('Table 16', '-', '', '-', '', '', '', 16),
('Table 17', '-', '', '-', '', '', '', 17),
('Table 18', '-', '', '-', '', '', '', 18),
('Table 19', '-', '', '-', '', '', '', 19),
('Table 20', '-', '', '-', '', '', '', 20),
('Table 21', '-', '', '-', '', '', '', 21),
('TakeAway', '-', '', '-', '', '', '', 22);

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `item_name` varchar(30) NOT NULL DEFAULT '',
  `item_number` varchar(15) NOT NULL DEFAULT '',
  `description` blob NOT NULL,
  `brand_id` int(8) NOT NULL DEFAULT '0',
  `category_id` int(8) NOT NULL DEFAULT '0',
  `supplier_id` int(8) NOT NULL DEFAULT '0',
  `buy_price` varchar(30) NOT NULL DEFAULT '',
  `unit_price` varchar(30) NOT NULL DEFAULT '',
  `supplier_catalogue_number` varchar(60) NOT NULL DEFAULT '',
  `tax_percent` varchar(5) NOT NULL DEFAULT '',
  `total_cost` varchar(40) NOT NULL DEFAULT '',
  `quantity` int(8) NOT NULL DEFAULT '0',
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `takeawayprice` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=260 DEFAULT CHARSET=latin1 COMMENT='Item Info.';


--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;

CREATE TABLE `sales` (
  `date` date NOT NULL DEFAULT '0000-00-00',
  `customer_id` int(8) NOT NULL DEFAULT '0',
  `sale_sub_total` varchar(12) NOT NULL DEFAULT '',
  `sale_total_cost` varchar(30) NOT NULL DEFAULT '',
  `paid_with` varchar(25) NOT NULL DEFAULT '',
  `items_purchased` int(8) NOT NULL DEFAULT '0',
  `sold_by` int(8) NOT NULL DEFAULT '0',
  `comment` varchar(100) NOT NULL DEFAULT '',
  `num_of_customers` int(2) DEFAULT NULL,
  `id` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2147483648 DEFAULT CHARSET=latin1 COMMENT='Contains overall sale details';


--
-- Table structure for table `sales_items`
--

DROP TABLE IF EXISTS `sales_items`;

CREATE TABLE `sales_items` (
  `sale_id` int(8) NOT NULL DEFAULT '0',
  `item_id` int(8) NOT NULL DEFAULT '0',
  `quantity_purchased` int(8) NOT NULL DEFAULT '0',
  `item_unit_price` varchar(15) NOT NULL DEFAULT '',
  `item_buy_price` varchar(30) NOT NULL DEFAULT '',
  `item_tax_percent` varchar(10) NOT NULL DEFAULT '',
  `item_total_tax` varchar(12) NOT NULL DEFAULT '',
  `item_total_cost` varchar(12) NOT NULL DEFAULT '',
  `id` int(8) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43032 DEFAULT CHARSET=latin1 COMMENT='Table that holds item information for sales';


--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;

CREATE TABLE `suppliers` (
  `supplier` varchar(60) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL DEFAULT '',
  `phone_number` varchar(40) NOT NULL DEFAULT '',
  `contact` varchar(60) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `other` varchar(150) NOT NULL DEFAULT '',
  `id` int(8) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Hold information about suppliers';


--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier`, `address`, `phone_number`, `contact`, `email`, `other`, `id`) VALUES
('Other', 'another source', '999', 'no one', '', '', 1),
('kitchen', '-', '-', '-', '', '', 2),
('Really Fine Wine Co', '3 High Road Eastcote HA5 2EW', '0208461610', 'Adrian or Frank', '', '', 3),
('La Maison des Sorbets', '10 gateway Trading Estate, Hythe Road NW10 6RJ', '02089680707', 'Tina hilder', 'sales@lamaisondessorbets.com', 'www.lamaisondessorbets.com', 4);

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `first_name` varchar(50) NOT NULL DEFAULT '',
  `last_name` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(60) NOT NULL DEFAULT '',
  `type` varchar(30) NOT NULL DEFAULT '',
  `id` int(8) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='User info. that the program needs';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `username`, `password`, `type`, `id`) VALUES
('Tony', 'Davis', 'admin', '439a6de57d475c1a0ba9bcb1c39f0af6', 'Admin', 1),
('staff', 'user', 'staff', 'adfacf7981f98bcb3f96c3b584cd1248', 'Sales Clerk', 2),
('Kesorn', 'Davis', 'kesorn', '2206e3315a374713ed3a53c98672f261', 'Admin', 3);

-- Dump completed on 2012-11-24 20:52:54
