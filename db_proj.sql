-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2016 at 03:12 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `pat_id` varchar(20) NOT NULL,
  `res_id` int(5) NOT NULL,
  `book_date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `no_of_seats` decimal(2,0) DEFAULT NULL,
  PRIMARY KEY (`pat_id`),
  UNIQUE KEY `res_id` (`res_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

DROP TABLE IF EXISTS `delivery`;
CREATE TABLE IF NOT EXISTS `delivery` (
  `order_id` int(5) NOT NULL AUTO_INCREMENT,
  `order_amount` decimal(4,1) DEFAULT NULL,
  `pat_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `fk5` (`pat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `rat_id` int(5) NOT NULL AUTO_INCREMENT,
  `res_id` int(5) DEFAULT NULL,
  `pat_id` varchar(20) DEFAULT NULL,
  `vfm` decimal(1,0) DEFAULT NULL,
  `fq` decimal(1,0) DEFAULT NULL,
  `service` decimal(1,0) DEFAULT NULL,
  `ambience` decimal(1,0) DEFAULT NULL,
  `review` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`rat_id`),
  KEY `fk1` (`res_id`),
  KEY `fk2` (`pat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rest`
--

DROP TABLE IF EXISTS `rest`;
CREATE TABLE IF NOT EXISTS `rest` (
  `res_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `cuisine` varchar(255) DEFAULT NULL,
  `n_table` decimal(3,0) DEFAULT NULL,
  `avg_rat` decimal(3,2) DEFAULT NULL,
  `ph_no` decimal(10,0) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`res_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rest`
--

INSERT INTO `rest` (`res_id`, `name`, `location`, `cuisine`, `n_table`, `avg_rat`, `ph_no`, `mail`) VALUES
(1, 'Dollops', 'Tiger Circle', 'Indian', '10', NULL, '9876576567', 'contact@dollops.com'),
(2, 'Snack Shack', 'Tiger Circle', 'Malay', '10', NULL, '9878998723', 'contact@snacks.com'),
(3, 'Eye Of The Tiger', 'Tiger Circle', 'Continental', '30', NULL, '6372876327', 'contact@eott.com'),
(4, 'Polar Bear', 'Udupi Road', 'Dessert', '5', NULL, '8987238273', 'contact@polar.com'),
(5, 'Basil Cafe', 'End Point Road', 'Italian', '15', NULL, '8987312347', 'contact@basil.com'),
(6, 'China Valley', 'End Point Road', 'Chinese', '15', NULL, '7839287438', 'contact@chinav.com'),
(7, 'Teaze', 'End Point Road', 'Drinks', '0', NULL, '8987382372', 'teaze@teaze.com'),
(8, 'Attil', 'Udupi Road', 'Indian', '30', NULL, '9892381827', 'contactus@attilrestaurant.com'),
(9, 'Subway', 'KMC Food Court', 'American', '0', NULL, '8987382987', 'contact@subway.in'),
(10, 'Egg Factory', 'Tiger Circle', 'Continental', '40', NULL, '9098990989', 'eggus@eggfactory.com'),
(11, 'Dominos', 'Udupi Road', 'Fast Food', '30', NULL, '8909839284', 'dominos@dominos.in');

-- --------------------------------------------------------

--
-- Stand-in structure for view `rest_deets`
--
DROP VIEW IF EXISTS `rest_deets`;
CREATE TABLE IF NOT EXISTS `rest_deets` (
`res_id` int(5)
,`name` varchar(255)
,`location` varchar(255)
,`cuisine` varchar(255)
,`avg_rat` decimal(3,2)
,`ph_no` decimal(10,0)
,`mail` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `pat_id` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `pat_name` varchar(20) NOT NULL,
  `pat_mail` varchar(20) NOT NULL,
  `pat_phone` decimal(10,0) DEFAULT NULL,
  `pat_addr` varchar(20) DEFAULT NULL,
  `pat_bday` date DEFAULT NULL,
  PRIMARY KEY (`pat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`pat_id`, `password`, `pat_name`, `pat_mail`, `pat_phone`, `pat_addr`, `pat_bday`) VALUES
('1', 'password', 'Test User', 'testuser@test.com', '9999988888', 'Manipal', '1997-11-07'),
('priya22', 'a5c05b4975be4def68ef6db798f3e1f8', 'Priyanjali Goel', 'priya@mail.com', '1265213512', 'mit', '2016-04-13');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_deets`
--
DROP VIEW IF EXISTS `user_deets`;
CREATE TABLE IF NOT EXISTS `user_deets` (
`pat_id` varchar(20)
,`pat_name` varchar(20)
,`pat_mail` varchar(20)
,`pat_phone` decimal(10,0)
,`pat_addr` varchar(20)
,`pat_bday` date
);

-- --------------------------------------------------------

--
-- Structure for view `rest_deets`
--
DROP TABLE IF EXISTS `rest_deets`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rest_deets`  AS  select `rest`.`res_id` AS `res_id`,`rest`.`name` AS `name`,`rest`.`location` AS `location`,`rest`.`cuisine` AS `cuisine`,`rest`.`avg_rat` AS `avg_rat`,`rest`.`ph_no` AS `ph_no`,`rest`.`mail` AS `mail` from `rest` ;

-- --------------------------------------------------------

--
-- Structure for view `user_deets`
--
DROP TABLE IF EXISTS `user_deets`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_deets`  AS  select `user`.`pat_id` AS `pat_id`,`user`.`pat_name` AS `pat_name`,`user`.`pat_mail` AS `pat_mail`,`user`.`pat_phone` AS `pat_phone`,`user`.`pat_addr` AS `pat_addr`,`user`.`pat_bday` AS `pat_bday` from `user` ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`res_id`) REFERENCES `rest` (`res_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk4` FOREIGN KEY (`pat_id`) REFERENCES `user` (`pat_id`) ON DELETE CASCADE;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `fk5` FOREIGN KEY (`pat_id`) REFERENCES `user` (`pat_id`) ON DELETE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`res_id`) REFERENCES `rest` (`res_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`pat_id`) REFERENCES `user` (`pat_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
