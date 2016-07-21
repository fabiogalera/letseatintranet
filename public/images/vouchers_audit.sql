-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 15, 2016 at 06:49 AM
-- Server version: 5.7.12-0ubuntu1.1
-- PHP Version: 7.0.8-2+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homestead`
--

-- --------------------------------------------------------

--
-- Table structure for table `vouchers_audit`
--

CREATE TABLE `vouchers_audit` (
  `voucher_id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` datetime NOT NULL,
  `lista` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `listanova` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vouchers_audit`
--

INSERT INTO `vouchers_audit` (`voucher_id`, `nome`, `action`, `data`, `lista`, `listanova`, `user_id`) VALUES
(437, NULL, 'UPDATE', '2016-07-15 03:37:18', 'Testando,1,2,3,4', 'Testando,1,2,3,4', '1'),
(444, NULL, 'UPDATE', '2016-07-15 03:37:45', 'fwefwfwf,fwefwfwef', 'fwefwfwf,fwefwfwef', '1'),
(1, NULL, 'INSERT', '2016-07-15 03:41:21', '12d12d12d1', NULL, '1'),
(2, NULL, 'INSERT', '2016-07-15 03:41:41', 'd1d1d', NULL, '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
