-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2013 at 04:26 AM
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
  `account_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(125) NOT NULL,
  `role` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `name`, `role`, `password`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Cashier', 'cashier', '93585797569d208d914078d513c8c55a'),
(3, 'Manager', 'manager', '37bd0d3935b47be2ab57bcf91b57f499');

-- --------------------------------------------------------

--
-- Table structure for table `amount`
--

CREATE TABLE IF NOT EXISTS `amount` (
  `amount_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `opening_bills` decimal(10,2) NOT NULL DEFAULT '0.00',
  `opening_coins` decimal(10,2) NOT NULL DEFAULT '0.00',
  `opening_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `closing_bills` decimal(10,2) NOT NULL DEFAULT '0.00',
  `closing_coins` decimal(10,2) NOT NULL DEFAULT '0.00',
  `closing_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `personnel` varchar(125) NOT NULL,
  PRIMARY KEY (`amount_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `amount`
--

INSERT INTO `amount` (`amount_id`, `date`, `opening_bills`, `opening_coins`, `opening_total`, `closing_bills`, `closing_coins`, `closing_total`, `personnel`) VALUES
(1, '2013-06-30', 0.00, 0.00, 1000.00, 0.00, 0.00, 0.00, 'admin'),
(2, '2013-07-01', 0.00, 0.00, 1234.00, 0.00, 0.00, 2345.00, 'admin'),
(3, '2013-07-02', 0.00, 0.00, 500.00, 0.00, 0.00, 1250.00, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cashout`
--

CREATE TABLE IF NOT EXISTS `cashout` (
  `cashout_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `date_cashout` date NOT NULL,
  `status` varchar(125) NOT NULL,
  `description` varchar(225) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`cashout_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cashout`
--

INSERT INTO `cashout` (`cashout_id`, `date_cashout`, `status`, `description`, `amount`) VALUES
(1, '2013-07-01', '0', '', 100.00),
(2, '2013-07-02', '0', '', 20.00),
(3, '2013-07-01', 'FOOD_ALLOWANCE', 'Food', 23.00);

-- --------------------------------------------------------

--
-- Table structure for table `cashout_category`
--

CREATE TABLE IF NOT EXISTS `cashout_category` (
  `cashout_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `cashout` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`cashout_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cashout_category`
--

INSERT INTO `cashout_category` (`cashout_id`, `cashout`) VALUES
(1, 'Delivery Payment'),
(2, 'Supplies'),
(3, 'Salary'),
(4, 'Rent'),
(5, 'Employee Fare Allowance'),
(6, 'Store Communication Allowance'),
(7, 'Store Food Allowance'),
(8, 'Store Maintenance/Repairs'),
(9, 'Cash Remitted');

-- --------------------------------------------------------

--
-- Table structure for table `check`
--

CREATE TABLE IF NOT EXISTS `check` (
  `check_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `check_num` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`check_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `check_details`
--

CREATE TABLE IF NOT EXISTS `check_details` (
  `check_id` tinyint(8) NOT NULL,
  `item_id` tinyint(8) NOT NULL,
  `division` varchar(125) DEFAULT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date` date DEFAULT NULL,
  KEY `fk_details_check` (`check_id`),
  KEY `fk_check_item` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('04774ae2105548c07e19e87f0e30241d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371711756, 'a:3:{s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:9:"validated";b:1;}'),
('05d8de7949631f6db7cba39a316bfff7', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371877557, ''),
('09a2b9d705598ad340449eae916370a5', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371206215, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;s:4:"open";b:1;}'),
('0b98bcf16a45719a34770767ed762881', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371889474, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:4:"open";b:1;s:9:"validated";b:1;}'),
('0c176f28809909b7f5e757b8a3be65f8', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371877134, ''),
('0cd3f4f2ce75108d23a416adcf2e25de', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371183156, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:4:"open";b:1;s:9:"validated";b:1;}'),
('0f75df623bb5b2084dae58b37780227c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371735661, 'a:4:{s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:9:"validated";b:1;s:4:"open";b:1;}'),
('0fe2a61c751b697965e92acf848a44ba', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371728239, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:9:"validated";b:1;s:4:"open";b:1;}'),
('116351f1c24676218d1dacdf2cf63f44', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0', 1371120713, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"3";s:4:"role";s:7:"manager";s:13:"cart_contents";a:3:{s:32:"c4ca4238a0b923820dcc509a6f75849b";a:6:{s:5:"rowid";s:32:"c4ca4238a0b923820dcc509a6f75849b";s:2:"id";s:1:"1";s:3:"qty";s:1:"1";s:5:"price";s:4:"9.65";s:4:"name";s:8:"Champion";s:8:"subtotal";d:9.6500000000000003552713678800500929355621337890625;}s:11:"total_items";i:1;s:10:"cart_total";d:9.6500000000000003552713678800500929355621337890625;}}'),
('161aee6f12432c3f2ad14f85c9f1658b', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0', 1371964546, 'a:8:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:4:"open";b:1;s:5:"empid";s:1:"1";s:7:"empname";s:4:"emp1";s:9:"emp_login";b:1;s:9:"validated";b:1;}'),
('1bb882c1a5b69058741137c40689c2d2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371638886, 'a:3:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";}'),
('1c4740c5eaa448b5f0deef9fb267a229', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371096160, ''),
('1dc265faa12a2e34e610b9672be3d915', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:22.0) Gecko/20100101 Firefox/22.0', 1372524231, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:9:"validated";b:1;}'),
('1f4986e247add9076f9a7c6623c0963a', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1370942944, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;s:4:"open";b:1;}'),
('337aba649d7e7c59a6abd11cc648448c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371782521, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;}'),
('3fb2c181dd0b3b4923b4fe4b8068da1f', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1370939392, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:9:"validated";b:1;s:4:"open";b:1;}'),
('45b0da8570d4c35efb5cad44d60951d3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371860989, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:9:"validated";b:1;}'),
('4a28aa1f5ecae7aadab406585cc8b958', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1372580799, 'a:8:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:5:"empid";s:1:"1";s:7:"empname";s:4:"emp1";s:9:"emp_login";b:1;s:4:"name";s:13:"Administrator";s:9:"validated";b:1;}'),
('6100f02ab842758fdb456119e4a49c76', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371096160, ''),
('6e6312b06e771e27f05c33770117be8d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371096160, ''),
('6fe5c7f547c5007cb26fd35338f1d9f3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371877556, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;}'),
('7a2ba9cb319e3a1f2f5c08569637af2c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371880869, ''),
('7b94ad3c3d3a1aa7e005345d4986b82f', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371904228, ''),
('87ee2795329fdf20b408d885debf47bd', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371096160, ''),
('892873faa7698e886b30d58ee9c7932a', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371096160, ''),
('8d15ea8e5ab137488b029ea7b1615a6d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1370693363, ''),
('906248831ab1138cef0640c6c394fdfc', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371904228, 'a:3:{s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;}'),
('9af7d52a7397aef6c8163b287826108f', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0', 1371895252, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;}'),
('9eb0e639d5d92b111476412732074583', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371877952, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:9:"validated";b:1;}'),
('b8c396373cfa81170e3b6cf2ef863df1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371877134, ''),
('b9002ba34c179647ab7e83612abdd4b2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371096159, 'a:3:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";}'),
('b932d4927e30d0297e94d6969a68a9fb', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371638886, ''),
('b94e8b0a02a41deee1e7f2eb222f7409', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371877557, ''),
('c7bd56e3036c1c9fc3a2e8ec7974b77e', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371876814, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;}'),
('c898ca98e92df4d1890720679cd830b3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371947065, 'a:2:{s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";}'),
('cc9932fefb03206357c7899c70f26697', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0', 1371893743, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:4:"open";b:1;s:9:"validated";b:1;}'),
('d167886edb7d66b41801747a5584b923', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371206519, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;}'),
('d879362c6318cd29fecafb86a7e47cf9', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371540451, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:4:"open";b:1;s:9:"validated";b:1;}'),
('d9c57363af9257908c2d02827e8c3ddf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1370691562, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;s:4:"open";b:1;}'),
('e6f7b5db88363e16b49e88a7bfb8aa80', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371880868, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;}'),
('f0738da85f0c2e72d14c034398c41946', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1372633047, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:4:"name";s:7:"Cashier";s:9:"validated";b:1;}'),
('febcb8a4313ab0994d359137c293deb2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371541662, '');

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE IF NOT EXISTS `credit` (
  `credit_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `customer_id` tinyint(8) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(125) DEFAULT NULL,
  `amount_credit` decimal(10,2) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `credit_balance` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`credit_id`),
  KEY `fk_credit_customers` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `credit_details`
--

CREATE TABLE IF NOT EXISTS `credit_details` (
  `credit_id` tinyint(8) NOT NULL,
  `item_id` tinyint(8) NOT NULL,
  `division` varchar(125) DEFAULT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date` date DEFAULT NULL,
  KEY `fk_details_credit` (`credit_id`),
  KEY `fk_credit_item` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(125) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `balance`) VALUES
(5, 'Customer One', 0.00),
(6, 'Customer Two', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `daily_report`
--

CREATE TABLE IF NOT EXISTS `daily_report` (
  `report_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `open_amt` decimal(10,2) NOT NULL,
  `close_amt` decimal(10,2) NOT NULL,
  `cash_box` decimal(10,2) NOT NULL,
  `pos_sales` decimal(10,2) NOT NULL,
  `discrepancy` decimal(10,2) NOT NULL,
  `expenses` decimal(10,2) NOT NULL,
  `in_amount` decimal(10,2) NOT NULL,
  `out_amount` decimal(10,2) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  `load_bal` decimal(10,2) NOT NULL,
  `load_in` decimal(10,2) NOT NULL,
  `div_grocery` decimal(10,2) NOT NULL,
  `div_poultry` decimal(10,2) NOT NULL,
  `div_pet` decimal(10,2) NOT NULL,
  `div_load` decimal(10,2) NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `delivered_item`
--

CREATE TABLE IF NOT EXISTS `delivered_item` (
  `delivery_id` tinyint(8) NOT NULL,
  `item_id` tinyint(8) NOT NULL,
  `del_quantity` decimal(10,2) NOT NULL,
  `del_price` decimal(10,2) NOT NULL,
  KEY `fk_delivered_delivery` (`delivery_id`),
  KEY `fk_delivered_item` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivered_item`
--

INSERT INTO `delivered_item` (`delivery_id`, `item_id`, `del_quantity`, `del_price`) VALUES
(6, 1, 1.00, 40.00),
(6, 2, 2.00, 112.00),
(13, 2, 2.00, 127.50),
(13, 3, 1.00, 26.50);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `delivery_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `supplier_id` tinyint(8) NOT NULL,
  `date_delivered` date NOT NULL,
  `description` varchar(225) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`delivery_id`),
  KEY `fk_delivery_supplier` (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `supplier_id`, `date_delivered`, `description`, `total_amount`) VALUES
(6, 1, '2013-06-24', '', 152.00),
(13, 1, '2013-07-02', '', 154.00);

-- --------------------------------------------------------

--
-- Table structure for table `division_category`
--

CREATE TABLE IF NOT EXISTS `division_category` (
  `division_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `division` varchar(125) NOT NULL,
  PRIMARY KEY (`division_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `division_category`
--

INSERT INTO `division_category` (`division_id`, `division`) VALUES
(1, 'Grocery'),
(2, 'Pet Supply'),
(3, 'Poultry'),
(4, 'Load');

-- --------------------------------------------------------

--
-- Table structure for table `eload`
--

CREATE TABLE IF NOT EXISTS `eload` (
  `load_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `network` varchar(125) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(125) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`load_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `eload`
--

INSERT INTO `eload` (`load_id`, `network`, `date`, `status`, `amount`) VALUES
(1, 'globe', '2013-06-29', 'wallet', 1300.00),
(2, 'globe', '2013-06-30', 'sales', 12.00),
(3, 'globe', '2013-06-30', 'sales', 15.00);

-- --------------------------------------------------------

--
-- Table structure for table `eload_balance`
--

CREATE TABLE IF NOT EXISTS `eload_balance` (
  `network_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `network` varchar(125) NOT NULL,
  `balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`network_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(125) DEFAULT NULL,
  `position` varchar(125) NOT NULL,
  `password` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `name`, `position`, `password`) VALUES
(1, 'Employee One', 'Cashier', 'empone'),
(2, 'Employee Two', 'Employee', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_dtr`
--

CREATE TABLE IF NOT EXISTS `employee_dtr` (
  `dtr_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `emp_id` tinyint(8) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `work_hours` decimal(10,2) NOT NULL,
  PRIMARY KEY (`dtr_id`),
  KEY `fk_dtr_employee` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `expense_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `date_expense` date NOT NULL,
  `status` varchar(125) DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`expense_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `date_expense`, `status`, `description`, `amount`) VALUES
(1, '2013-06-30', 'expense', '', 120.00),
(2, '2013-07-01', 'expense', '', 140.00),
(3, '2013-07-02', 'expense', '', 12.00);

-- --------------------------------------------------------

--
-- Table structure for table `expenses_category`
--

CREATE TABLE IF NOT EXISTS `expenses_category` (
  `expenses_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `expenses` varchar(225) NOT NULL,
  PRIMARY KEY (`expenses_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `expenses_category`
--

INSERT INTO `expenses_category` (`expenses_id`, `expenses`) VALUES
(1, 'Expenses');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_id` tinyint(8) NOT NULL AUTO_INCREMENT,
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
  `cost` decimal(10,2) NOT NULL,
  `retail_price` decimal(10,2) NOT NULL,
  `model_quantity` varchar(125) DEFAULT NULL,
  `supplier_code` varchar(125) DEFAULT NULL,
  `manufacturer` varchar(125) DEFAULT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `reorder_point` int(8) DEFAULT NULL,
  `active` tinyint(3) DEFAULT '1',
  PRIMARY KEY (`item_id`),
  UNIQUE KEY `bar_code` (`bar_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_code`, `bar_code`, `desc1`, `desc2`, `desc3`, `desc4`, `division`, `group`, `class1`, `class2`, `cost`, `retail_price`, `model_quantity`, `supplier_code`, `manufacturer`, `quantity`, `reorder_point`, `active`) VALUES
(1, 'CHA1', '4809010343024', 'Champion', 'Detergent Powder ', 'Infinity ', '70g', 'pet', 'Non-Food', 'Laundry Products- Detergent Powder', '', 40.00, 9.65, '', 'Suy Sing', 'Peerless Products Manufacturing Corp.', 241.00, 55, 1),
(2, 'DEL216', '4800047820182', 'Del Monte', 'Pineapple Juice ', 'w/ ACE', '1.36L', 'poultry', 'Food', 'RTD- Juices', '', 63.75, 63.75, '', 'Suy Sing', 'Del Monte Phils. Inc.', 269.00, 5, 1),
(3, 'IC1', '4808888413709', 'Fortune ', 'Cigarette', 'Red Soft Pack', '20''s', 'grocery', 'Non-Food', 'Cigarettes', '', 26.50, 26.50, '', 'Suy Sing', 'PMFTC Inc.', 260.00, 55, 1),
(4, 'IC2', '48037105', 'Fortune ', 'Cigarette', 'Red Soft Pack', '20''s', 'grocery', 'Non-Food', 'Cigarettes', '', 25.00, 26.50, '', 'PMFTC Inc.', 'PMFTC Inc.', 255.00, 55, 1),
(5, 'IC3', '4808680021355', 'Lady''s Choice ', 'Mayonnaise ', '', '80mL', 'grocery', 'Food', 'Salad Aids', '', 26.00, 29.75, '', 'Suy Sing', 'Unilever', 255.00, 55, 1),
(6, 'IC4', '4902430429399', 'Rejoice ', 'Shampoo ', '3 in 1 ', '70mL', 'grocery', 'Non-Food', 'Hair Care- Shampoo', '', 37.00, 43.50, '', 'Suy Sing', ' Procter & Gamble ', 256.00, 55, 1),
(7, 'IC5', '4801668601228', 'UFC Golden Fiesta', 'Corn Oil ', '', '1L', 'grocery', 'Food', 'Cooking Oil', '', 150.00, 171.00, '', 'Triple J', 'NutriAsia', 257.00, 55, 1),
(8, 'IC6', '4800016653094', 'Jack ''n Jill Mr. Chips', 'Nacho ', 'Cheese 100g', '100g', 'grocery', 'Food', 'Snacks', '', 17.00, 21.00, '', 'PGG', 'URC', 263.00, 55, 1),
(9, 'IC7', '4807770120473', 'Rebisco Super Thin ', 'Crackers', 'Cheese', '30g', 'grocery', 'Food', 'Biscuits, Cookies and Cakes', '', 4.00, 5.00, '', 'RZM', 'Republic Biscuit Corp.', 258.00, 55, 1),
(11, 'BOT1', '12345', 'Coke Bottle', '1L', '', '', 'grocery', 'bottle', 'bottle', '', 7.00, 7.00, '', 'Supplier One', 'ye', 10.00, 5, 1),
(12, 'ITEM CODE', 'BARCODE', 'DESCRIPTION 1', 'DESCRITION 2', 'DESCRIPTION 3', 'UNITS', 'DIVISION', 'GROUP', 'CLASSIFICATION 1', 'CLASSIFICATION 2', 0.00, 0.00, ' MODEL QUANTITY ', 'SUPPLIER CODE', 'MANUFACTURER', 0.00, 0, 1),
(13, 'BOOSTINA ', NULL, 'BOOSTINA ', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'PURINA', '', 90.00, 100.00, '', 'AGRICONS', '', 0.00, 0, 1),
(14, 'BIO 800', NULL, 'BIO 800', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'PURINA', '', 50.60, 54.00, '', 'AGRICONS', '', 0.00, 0, 1),
(15, 'B-100', NULL, 'B-100', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'PURINA', '', 1.00, 1.00, '', 'AGRICONS', '', 0.00, 0, 1),
(16, 'B-100', NULL, 'B-100', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'PURINA', '', 34.20, 37.00, '', 'AGRICONS', '', 0.00, 0, 1),
(17, 'B-200', NULL, 'B-200', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'PURINA', '', 1.00, 1.00, '', 'AGRICONS', '', 0.00, 0, 1),
(18, 'B-200', NULL, 'B-200', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'PURINA', '', 33.06, 36.00, '', 'AGRICONS', '', 0.00, 0, 1),
(19, 'B-300', NULL, 'B-300', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'PURINA', '', 1.00, 1.00, '', 'AGRICONS', '', 0.00, 0, 1),
(20, 'B-300', NULL, 'B-300', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'PURINA', '', 32.20, 35.50, '', 'AGRICONS', '', 0.00, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `outgoing`
--

CREATE TABLE IF NOT EXISTS `outgoing` (
  `outgoing_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `status` varchar(125) DEFAULT NULL,
  `date_out` date NOT NULL,
  `description` varchar(225) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`outgoing_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `outgoing`
--

INSERT INTO `outgoing` (`outgoing_id`, `status`, `date_out`, `description`, `amount`) VALUES
(1, 'return', '2013-06-30', '', 19.30),
(2, 'return', '2013-06-30', '', 9.65);

-- --------------------------------------------------------

--
-- Table structure for table `outgoing_category`
--

CREATE TABLE IF NOT EXISTS `outgoing_category` (
  `outgoing_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `outgoing` varchar(125) NOT NULL,
  PRIMARY KEY (`outgoing_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `outgoing_category`
--

INSERT INTO `outgoing_category` (`outgoing_id`, `outgoing`) VALUES
(1, 'Transfer'),
(2, 'Return Product'),
(3, 'Bad Order');

-- --------------------------------------------------------

--
-- Table structure for table `out_item`
--

CREATE TABLE IF NOT EXISTS `out_item` (
  `outgoing_id` tinyint(8) NOT NULL,
  `item_id` tinyint(125) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  KEY `fk_outitem_outgoing` (`outgoing_id`),
  KEY `fk_out_item` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE IF NOT EXISTS `payment_details` (
  `payment_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `customer_id` tinyint(8) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `fk_payment_customer` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(125) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`) VALUES
(1, 'Suy Sing'),
(2, 'World Power Zone'),
(3, 'PMFTC Inc.'),
(4, 'DDI'),
(5, 'RGPI'),
(6, 'Triple J'),
(7, 'PGG'),
(8, 'RZM'),
(13, 'Supplier One'),
(14, 'Supplier Two'),
(15, 'Supplier Me');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `trans_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `trans_date` date NOT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `trans_date`, `total_amount`) VALUES
(1, '2013-06-30', 12.00),
(2, '2013-06-30', 12.00),
(3, '2013-06-30', 15.00);

-- --------------------------------------------------------

--
-- Table structure for table `trans_details`
--

CREATE TABLE IF NOT EXISTS `trans_details` (
  `trans_id` tinyint(8) NOT NULL,
  `item_id` tinyint(8) NOT NULL,
  `division` varchar(125) DEFAULT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date` date DEFAULT NULL,
  KEY `fk_details_trans` (`trans_id`),
  KEY `fk_trans_item` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `check_details`
--
ALTER TABLE `check_details`
  ADD CONSTRAINT `check_details_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `check_details_ibfk_2` FOREIGN KEY (`check_id`) REFERENCES `check` (`check_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `credit`
--
ALTER TABLE `credit`
  ADD CONSTRAINT `credit_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `credit_details`
--
ALTER TABLE `credit_details`
  ADD CONSTRAINT `credit_details_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `credit_details_ibfk_2` FOREIGN KEY (`credit_id`) REFERENCES `credit` (`credit_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivered_item`
--
ALTER TABLE `delivered_item`
  ADD CONSTRAINT `delivered_item_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `delivered_item_ibfk_2` FOREIGN KEY (`delivery_id`) REFERENCES `delivery` (`delivery_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_dtr`
--
ALTER TABLE `employee_dtr`
  ADD CONSTRAINT `employee_dtr_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `out_item`
--
ALTER TABLE `out_item`
  ADD CONSTRAINT `out_item_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `out_item_ibfk_2` FOREIGN KEY (`outgoing_id`) REFERENCES `outgoing` (`outgoing_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `payment_details_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trans_details`
--
ALTER TABLE `trans_details`
  ADD CONSTRAINT `trans_details_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trans_details_ibfk_2` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`trans_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
