-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2013 at 03:55 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `account_id` int(8) NOT NULL AUTO_INCREMENT,
  `role` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `role`, `password`) VALUES
(1, 'admin', 'admeen'),
(2, 'cashier', 'cache'),
(3, 'manager', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `amount`
--

CREATE TABLE IF NOT EXISTS `amount` (
  `amount_id` int(8) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `opening_bills` double NOT NULL DEFAULT '0',
  `opening_coins` double NOT NULL DEFAULT '0',
  `opening_total` double NOT NULL DEFAULT '0',
  `closing_bills` double NOT NULL DEFAULT '0',
  `closing_coins` double NOT NULL DEFAULT '0',
  `closing_total` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`amount_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `amount`
--

INSERT INTO `amount` (`amount_id`, `date`, `opening_bills`, `opening_coins`, `opening_total`, `closing_bills`, `closing_coins`, `closing_total`) VALUES
(1, '2013-05-25', 100, 100, 200, 1000, 1000, 2000),
(2, '2013-05-26', 200, 150, 350, 2030, 970, 3000),
(3, '2013-05-27', 200, 60, 260, 2890, 16, 2906),
(4, '2013-05-28', 370, 60, 430, 2890, 10, 2900),
(5, '2013-05-29', 187, 10, 187, 2000, 10, 2010),
(7, '2013-06-08', 890, 10, 900, 3740, 15, 3755),
(8, '2013-06-08', 1870, 16, 1886, 3740, 15, 3755),
(9, '2013-06-08', 420, 30, 450, 3740, 15, 3755),
(10, '2013-06-08', 1870, 16, 1886, 3740, 15, 3755),
(11, '2013-06-09', 1960, 40, 2000, 3870, 0, 3870),
(12, '2013-06-11', 1220, 0, 1220, 3000, 0, 3000),
(13, '2013-06-11', 1000, 0, 1000, 3000, 0, 3000),
(14, '2013-06-11', 1000, 0, 1000, 0, 0, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('1c99538df3ba67d15cf4200c7786d08f', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0', 1371005248, 'a:6:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:4:"open";b:1;s:9:"validated";b:1;s:13:"cart_contents";a:3:{s:32:"c4ca4238a0b923820dcc509a6f75849b";a:6:{s:5:"rowid";s:32:"c4ca4238a0b923820dcc509a6f75849b";s:2:"id";s:1:"1";s:3:"qty";s:1:"1";s:5:"price";s:4:"9.65";s:4:"name";s:8:"Champion";s:8:"subtotal";d:9.6500000000000003552713678800500929355621337890625;}s:11:"total_items";i:1;s:10:"cart_total";d:9.6500000000000003552713678800500929355621337890625;}}'),
('1d7fa021900f9cefca4680e63c997c64', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371112205, 'a:6:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;s:4:"open";b:1;s:13:"cart_contents";a:4:{s:32:"c4ca4238a0b923820dcc509a6f75849b";a:6:{s:5:"rowid";s:32:"c4ca4238a0b923820dcc509a6f75849b";s:2:"id";s:1:"1";s:3:"qty";s:1:"1";s:5:"price";s:4:"9.65";s:4:"name";s:8:"Champion";s:8:"subtotal";d:9.6500000000000003552713678800500929355621337890625;}s:32:"45c48cce2e2d7fbdea1afc51c7c6ad26";a:6:{s:5:"rowid";s:32:"45c48cce2e2d7fbdea1afc51c7c6ad26";s:2:"id";s:1:"9";s:3:"qty";s:1:"1";s:5:"price";s:1:"5";s:4:"name";s:19:"Rebisco Super Thin ";s:8:"subtotal";i:5;}s:11:"total_items";i:2;s:10:"cart_total";d:14.6500000000000003552713678800500929355621337890625;}}'),
('1f4986e247add9076f9a7c6623c0963a', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1370942944, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;s:4:"open";b:1;}'),
('3fb2c181dd0b3b4923b4fe4b8068da1f', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1370939392, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:9:"validated";b:1;s:4:"open";b:1;}'),
('8d15ea8e5ab137488b029ea7b1615a6d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1370693363, ''),
('a5dcfd8c12ea29f316a3c0fe20669362', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:21.0) Gecko/20100101 Firefox/21.0', 1371131343, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:4:"open";b:1;}'),
('d5bdbf665c00558e98ce2970929c59cb', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371108233, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;s:4:"open";b:1;}'),
('d935f5d57a324beb24274e27a30b61ba', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371006241, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:4:"open";b:1;}'),
('d9c57363af9257908c2d02827e8c3ddf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1370691562, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;s:4:"open";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE IF NOT EXISTS `credit` (
  `credit_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `customer_id` int(8) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(125) DEFAULT NULL,
  `amount_credit` float NOT NULL,
  `amount_paid` float NOT NULL,
  `credit_balance` float DEFAULT NULL,
  PRIMARY KEY (`credit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `credit`
--

INSERT INTO `credit` (`credit_id`, `customer_id`, `date`, `status`, `amount_credit`, `amount_paid`, `credit_balance`) VALUES
(3, 1, '2013-06-12', 'credit', 9.65, 0, 9.65),
(4, 1, '2013-06-12', 'credit', 63.75, 0, 73.4),
(5, 1, '2013-06-12', 'payment', 0, 10, 63.4),
(6, 1, '2013-06-12', 'payment', 0, 3.4, 60);

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

CREATE TABLE IF NOT EXISTS `credits` (
  `credit_id` int(8) NOT NULL AUTO_INCREMENT,
  `customer_id` int(8) NOT NULL,
  `credit_date` date NOT NULL,
  `total_amount` float DEFAULT NULL,
  PRIMARY KEY (`credit_id`),
  KEY `fk_trans_customers` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `credit_details`
--

CREATE TABLE IF NOT EXISTS `credit_details` (
  `credit_id` int(8) NOT NULL,
  `item_code` varchar(125) NOT NULL,
  `division` varchar(125) DEFAULT NULL,
  `quantity` int(8) NOT NULL,
  `price` float NOT NULL,
  KEY `fk_details_credit` (`credit_id`),
  KEY `fk_trans_item` (`item_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit_details`
--

INSERT INTO `credit_details` (`credit_id`, `item_code`, `division`, `quantity`, `price`) VALUES
(3, '1', 'grocery', 1, 9.65),
(4, '2', 'grocery', 1, 63.75);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(8) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(125) NOT NULL,
  `contact_number` varchar(125) NOT NULL,
  `address` varchar(225) DEFAULT NULL,
  `balance` float NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `contact_number`, `address`, `balance`) VALUES
(1, 'juana', '09261839622', '', 60),
(2, 'Kulit', '09211234567', 'LB', 0),
(3, 'Tonyang', '09261234567', 'San Pedro', 0);

-- --------------------------------------------------------

--
-- Table structure for table `daily_report`
--

CREATE TABLE IF NOT EXISTS `daily_report` (
  `report_id` int(8) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `open_amt` float NOT NULL,
  `close_amt` float NOT NULL,
  `cash_box` float NOT NULL,
  `pos_sales` float NOT NULL,
  `discrepancy` float NOT NULL,
  `expenses` float NOT NULL,
  `in_amount` float NOT NULL,
  `out_amount` float DEFAULT NULL,
  `credit` float NOT NULL,
  `load_bal` float NOT NULL,
  `load_in` float NOT NULL,
  `div_grocery` float NOT NULL,
  `div_poultry` float NOT NULL,
  `div_pet` float NOT NULL,
  `div_load` float NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `daily_report`
--

INSERT INTO `daily_report` (`report_id`, `date`, `open_amt`, `close_amt`, `cash_box`, `pos_sales`, `discrepancy`, `expenses`, `in_amount`, `out_amount`, `credit`, `load_bal`, `load_in`, `div_grocery`, `div_poultry`, `div_pet`, `div_load`) VALUES
(25, '2013-06-07', 1280, 5000, 3720, 291.55, 3428.45, 500, 51.39, 318.75, 100, 0, 0, 525.2, 0, 0, 0),
(26, '2013-06-07', 1280, 5000, 3720, 291.55, 3428.45, 500, 51.39, 318.75, 100, 0, 0, 525.2, 0, 0, 0),
(27, '2013-06-07', 1280, 5000, 3720, 291.55, 3428.45, 500, 51.39, 318.75, 100, 0, 0, 525.2, 0, 0, 0),
(28, '2013-06-07', 1280, 5000, 3720, 291.55, 3428.45, 500, 51.39, 318.75, 100, 0, 0, 525.2, 0, 0, 0),
(29, '2013-06-07', 1280, 5000, 3720, 291.55, 3428.45, 500, 51.39, 318.75, 100, 0, 0, 525.2, 0, 0, 0),
(30, '2013-06-07', 1280, 5000, 3720, 291.55, 3428.45, 500, 51.39, 318.75, 100, 0, 0, 525.2, 0, 0, 0),
(31, '2013-06-08', 0, 0, 0, 0, 0, 300, 0, NULL, 0, 0, 0, 0, 0, 0, 0),
(32, '2013-06-08', 0, 0, 0, 774.65, -774.65, 760, 647.39, 63.75, 918.45, 0, 0, 1230.55, 0, 0, 0),
(33, '2013-06-09', 2000, 3870, 1870, 0, 1870, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0),
(34, '2013-06-11', 0, 0, 0, 0, 0, 200, 0, NULL, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivered_item`
--

CREATE TABLE IF NOT EXISTS `delivered_item` (
  `delivery_id` int(8) NOT NULL,
  `item_code` varchar(125) NOT NULL,
  `quantity` int(8) NOT NULL,
  `price` float NOT NULL,
  KEY `fk_delivered_delivery` (`delivery_id`),
  KEY `fk_delivered_item` (`item_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivered_item`
--

INSERT INTO `delivered_item` (`delivery_id`, `item_code`, `quantity`, `price`) VALUES
(26, 'IC6', 1, 17.13),
(26, 'IC6', 2, 34.26),
(27, 'CHA151', 2, 17.02),
(27, 'CHA151', 1, 8.51),
(28, 'DEL216', 10, 559.9),
(29, 'IC1', 2, 49),
(30, 'IC7', 1, 4.32),
(30, 'IC7', 2, 8.64),
(31, 'IC5', 1, 150.43),
(32, 'CHA151', 2, 20),
(33, 'CHA151', 1, 30),
(34, 'CHA151', 2, 80);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `delivery_id` int(8) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(8) NOT NULL,
  `date_delivered` date NOT NULL,
  `description` varchar(225) DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  PRIMARY KEY (`delivery_id`),
  KEY `fk_delivery_supplier` (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `supplier_id`, `date_delivered`, `description`, `total_amount`) VALUES
(26, 6, '2013-06-07', '', 51.39),
(27, 1, '2013-06-08', 'some text over here', 25.53),
(28, 2, '2013-06-08', 'World Power Zone', 559.9),
(29, 3, '2013-06-08', 'Inc', 49),
(30, 8, '2013-06-08', '', 12.96),
(31, 6, '2013-06-11', '', 150.43),
(32, 1, '2013-06-11', '', 20),
(33, 1, '2013-06-11', '', 30),
(34, 1, '2013-06-11', '', 80);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `expense_id` int(8) NOT NULL AUTO_INCREMENT,
  `date_expense` date NOT NULL,
  `status` varchar(125) DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`expense_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `date_expense`, `status`, `description`, `amount`) VALUES
(1, '2013-06-07', 'salary', 'Yu', 200),
(2, '2013-06-07', 'salary', 'yow', 300),
(3, '2013-06-08', 'salary', 'yow', 300),
(4, '2013-06-08', 'salary', 'Salary of Chuchu', 260),
(5, '2013-06-08', 'remittance', 'LBC Remit', 200),
(6, '2013-06-11', 'remittance', '', 0),
(7, '2013-06-11', 'remittance', 'cashier', 200),
(8, '2013-06-13', 'lucky me', 'eat mami', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(8) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(125) DEFAULT NULL,
  `bar_code` varchar(125) DEFAULT NULL,
  `desc1` varchar(125) DEFAULT NULL,
  `desc2` varchar(125) DEFAULT NULL,
  `desc3` varchar(125) DEFAULT NULL,
  `desc4` varchar(125) DEFAULT NULL,
  `division` varchar(125) DEFAULT NULL,
  `group` varchar(125) DEFAULT NULL,
  `class1` varchar(125) DEFAULT NULL,
  `class2` varchar(125) DEFAULT NULL,
  `cost` double NOT NULL,
  `retail_price` double NOT NULL,
  `model_quantity` varchar(125) DEFAULT NULL,
  `supplier_code` varchar(125) DEFAULT NULL,
  `manufacturer` varchar(125) DEFAULT NULL,
  `quantity` int(8) NOT NULL,
  `reorder_point` int(8) DEFAULT NULL,
  `active` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`item_id`),
  UNIQUE KEY `item_code` (`item_code`),
  UNIQUE KEY `bar_code` (`bar_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_code`, `bar_code`, `desc1`, `desc2`, `desc3`, `desc4`, `division`, `group`, `class1`, `class2`, `cost`, `retail_price`, `model_quantity`, `supplier_code`, `manufacturer`, `quantity`, `reorder_point`, `active`) VALUES
(23, 'CHA151', '4806500000000', 'Champion', 'Detergent Powder ', 'Infinity ', '70g', 'Grocery', 'Non-Food', 'Laundry Products- Detergent Powder', '', 8.51, 9.65, '', 'Suy Sing', 'Peerless Products Manufacturing Corp.', 0, 0, 0),
(24, NULL, '48037105', 'Fortune ', 'Cigarette', 'Red Soft Pack', '20''s', 'Grocery', 'Non-Food', 'Cigarettes', '', 24.5, 26.5, '', 'PMFTC Inc.', 'PMFTC Inc.', 0, 0, 0),
(25, NULL, '4800360000000', 'Nestle Nescafe ', 'Coffee', 'Classic', 'Refill 25g', 'Grocery', 'Food', 'Coffee', '', 19, 20.65, '', 'MDSI', 'Nestle Phils. Inc.', 0, 0, 0),
(26, NULL, '4808680000000', 'Lady''s Choice ', 'Mayonnaise ', '', '80mL', 'Grocery', 'Food', 'Salad Aids', '', 25.53, 29.75, '', 'DDI', 'Unilever', 0, 0, 0),
(27, 'CEN43', '748485000000', 'Century ', 'Tuna Flakes ', 'Hot and Spicy ', '155g', 'Grocery', 'Food', 'Sea Foods- Tuna', '', 24.5, 27.5, '', 'Suy Sing', 'Century Pacific Group', 0, 0, 0),
(28, NULL, '4902430000000', 'Rejoice ', 'Shampoo ', '3 in 1 ', '70mL', 'Grocery', 'Non-Food', 'Hair Care- Shampoo', '', 37.02, 43.5, '', 'RGPI', ' Procter & Gamble ', 0, 0, 0),
(29, NULL, '4801670000000', 'UFC Golden Fiesta', 'Corn Oil ', '', '1L', 'Grocery', 'Food', 'Cooking Oil', '', 150.43, 171, '', 'Triple J', 'NutriAsia', 0, 0, 0),
(30, NULL, '4800020000000', 'Jack ''n Jill Mr. Chips', 'Nacho ', 'Cheese 100g', '100g', 'Grocery', 'Food', 'Snacks', '', 17.13, 21, '', 'PGG', 'URC', 0, 0, 0),
(31, 'LUC94', '4807770000000', 'Lucky Me ', 'Pancit Canton ', 'Sweet and Spicy ', '60g', 'Grocery', 'Food', 'Instant Noodles- Pouch', '', 8.02, 8.75, '', 'SMI', ' Monde Nissin Corp ', 0, 0, 0),
(32, NULL, '4800090000000', 'Rebisco Super Thin ', 'Crackers', 'Cheese', '30g', 'Grocery', 'Food', 'Biscuits, Cookies and Cakes', '', 4.32, 5, '', 'RZM', 'Republic Biscuit Corp.', 0, 0, 0),
(33, 'DEL216', '4800020000001', 'Del Monte', 'Pineapple Juice ', 'w ACE', '1.36L', 'Grocery', 'Food', 'RTD- Juices', '', 55.99, 63.75, '', 'World Power Zone', 'Del Monte Phils. Inc.', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `outgoing`
--

CREATE TABLE IF NOT EXISTS `outgoing` (
  `outgoing_id` int(8) NOT NULL AUTO_INCREMENT,
  `status` varchar(125) DEFAULT NULL,
  `date_out` date NOT NULL,
  `description` varchar(225) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  PRIMARY KEY (`outgoing_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `outgoing`
--

INSERT INTO `outgoing` (`outgoing_id`, `status`, `date_out`, `description`, `amount`) VALUES
(17, 'transfer', '2013-06-07', 'transfer', 63.75),
(18, 'return', '2013-06-07', 'rp', 127.5),
(19, 'bad_order', '2013-06-07', 'bo', 127.5),
(20, 'transfer', '2013-06-08', 'transfer', 63.75);

-- --------------------------------------------------------

--
-- Table structure for table `out_item`
--

CREATE TABLE IF NOT EXISTS `out_item` (
  `outgoing_id` int(8) NOT NULL,
  `item_code` varchar(125) NOT NULL,
  `quantity` int(8) NOT NULL,
  `price` float NOT NULL,
  KEY `fk_outitem_outgoing` (`outgoing_id`),
  KEY `fk_out_item` (`item_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `out_item`
--

INSERT INTO `out_item` (`outgoing_id`, `item_code`, `quantity`, `price`) VALUES
(17, 'Champion', 64, 9.65),
(18, 'Del Monte', 2, 63.75),
(19, 'Del Monte', 2, 127.5),
(20, 'Del Monte', 1, 63.75);

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE IF NOT EXISTS `payment_details` (
  `payment_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `customer_id` tinyint(8) NOT NULL,
  `amount_paid` float NOT NULL,
  `balance` float NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`payment_id`, `date`, `customer_id`, `amount_paid`, `balance`) VALUES
(1, '2013-06-08', 2, 50, 0),
(2, '2013-06-08', 1, 10, 0),
(3, '2013-06-09', 1, 0.5, 0),
(4, '2013-06-09', 1, 1, 0),
(5, '2013-06-12', 3, 8.95, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(8) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(125) NOT NULL,
  `manufacturer` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`),
  UNIQUE KEY `supplier_name` (`supplier_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `manufacturer`) VALUES
(1, 'Suy Sing', 'PPMC'),
(2, 'World Power Zone', 'Del Monte Phils. Inc.'),
(3, 'PMFTC Inc.', 'PGG'),
(4, 'DDI', 'Unilever'),
(5, 'RGPI', 'Proctor & Gamble'),
(6, 'Triple J', 'NutriAsia'),
(7, 'PGG', 'URC'),
(8, 'RZM', 'Republic Biscuit Corp.'),
(9, 'Supplier 1', 'Manu 1'),
(10, 'test', NULL),
(25, 'MSGcorp', NULL),
(27, 'Samsung', NULL),
(29, 'tester', NULL),
(30, 'alert', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `trans_id` int(8) NOT NULL AUTO_INCREMENT,
  `trans_date` date NOT NULL,
  `total_amount` float DEFAULT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `trans_date`, `total_amount`) VALUES
(1, '2013-05-25', 19.3),
(2, '2013-05-25', 19.3),
(3, '2013-05-27', 73.4),
(4, '2013-05-28', 9.65),
(5, '2013-05-29', 9.65),
(6, '2013-05-29', 160.25),
(7, '2013-06-08', 455.9),
(8, '2013-06-08', 127.5),
(9, '2013-06-08', 63.75),
(10, '2013-06-08', 127.5),
(11, '2013-06-11', 28.95),
(12, '2013-06-13', 190.6);

-- --------------------------------------------------------

--
-- Table structure for table `trans_details`
--

CREATE TABLE IF NOT EXISTS `trans_details` (
  `trans_id` int(8) NOT NULL,
  `item_code` varchar(125) NOT NULL,
  `division` varchar(125) DEFAULT NULL,
  `quantity` int(8) NOT NULL,
  `price` float NOT NULL,
  KEY `fk_details_trans` (`trans_id`),
  KEY `fk_trans_item` (`item_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_details`
--

INSERT INTO `trans_details` (`trans_id`, `item_code`, `division`, `quantity`, `price`) VALUES
(1, '1', 'grocery', 2, 19.3),
(2, '1', 'grocery', 2, 19.3),
(3, '1', 'grocery', 1, 9.65),
(3, '2', 'grocery', 1, 63.75),
(4, '1', 'grocery', 1, 9.65),
(5, '1', 'grocery', 1, 9.65),
(6, '1', 'grocery', 10, 96.5),
(6, '2', 'grocery', 1, 63.75),
(7, '1', 'grocery', 1, 9.65),
(7, '2', 'grocery', 7, 446.25),
(8, '2', 'grocery', 2, 127.5),
(9, '2', 'grocery', 1, 63.75),
(10, '2', 'grocery', 2, 127.5),
(11, '1', 'grocery', 3, 28.95),
(12, '1', 'grocery', 4, 38.6),
(12, '9', 'grocery', 3, 15),
(12, '2', 'grocery', 1, 63.75),
(12, '6', 'grocery', 1, 43.5),
(12, '5', 'grocery', 1, 29.75);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
