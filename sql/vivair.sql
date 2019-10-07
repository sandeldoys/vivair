-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2019 at 08:26 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vivair`
--
CREATE DATABASE IF NOT EXISTS `vivair` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `vivair`;

-- --------------------------------------------------------

--
-- Table structure for table `fares`
--

CREATE TABLE `fares` (
  `flight_no` varchar(6) NOT NULL,
  `class` varchar(3) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fares`
--

INSERT INTO `fares` (`flight_no`, `class`, `price`) VALUES
('VV 111', 'ECO', 200),
('VV 111', 'BIZ', 1000),
('VV 112', 'ECO', 500),
('VV 112', 'BIZ', 1000),
('VV 113', 'ECO', 550),
('VV 113', 'BIZ', 1000),
('VV 211', 'ECO', 200),
('VV 211', 'BIZ', 1000),
('VV 212', 'ECO', 450),
('VV 212', 'BIZ', 1000),
('VV 213', 'ECO', 500),
('VV 213', 'BIZ', 1000),
('VV 311', 'ECO', 450),
('VV 311', 'BIZ', 1000),
('VV 312', 'ECO', 500),
('VV 312', 'BIZ', 1000),
('VV 313', 'ECO', 200),
('VV 313', 'BIZ', 1000),
('VV 411', 'ECO', 200),
('VV 411', 'BIZ', 1000),
('VV 412', 'ECO', 450),
('VV 412', 'BIZ', 1000),
('VV 413', 'ECO', 500),
('VV 413', 'BIZ', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flight_no` varchar(6) NOT NULL,
  `origin` varchar(3) NOT NULL,
  `destination` varchar(3) NOT NULL,
  `dep_time` time NOT NULL,
  `arr_time` time NOT NULL,
  `aircraft_type` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flight_no`, `origin`, `destination`, `dep_time`, `arr_time`, `aircraft_type`) VALUES
('VV 111', 'YVR', 'YYC', '13:30:00', '14:00:00', 'boeing 777'),
('VV 112', 'YVR', 'YWG', '10:00:00', '13:00:00', 'boeing 777'),
('VV 113', 'YVR', 'YYZ', '17:00:00', '21:00:00', 'boeing 777'),
('VV 211', 'YYC', 'YVR', '08:00:00', '08:30:00', 'boeing 777'),
('VV 212', 'YYC', 'YWG', '14:00:00', '16:00:00', 'boeing 777'),
('VV 213', 'YYC', 'YYZ', '10:00:00', '13:30:00', 'boeing 777'),
('VV 311', 'YWG', 'YYC', '05:00:00', '08:30:00', 'boeing 777'),
('VV 312', 'YWG', 'YVR', '10:00:00', '15:45:00', 'boeing 777'),
('VV 313', 'YWG', 'YYZ', '22:00:00', '23:00:00', 'boeing 777'),
('VV 411', 'YYZ', 'YWG', '08:00:00', '09:00:00', 'boeing 777'),
('VV 412', 'YYZ', 'YYC', '15:00:00', '18:30:00', 'boeing 777'),
('VV 413', 'YYZ', 'YVR', '02:00:00', '06:00:00', 'boeing 777');

-- --------------------------------------------------------

--
-- Table structure for table `itinerary`
--

CREATE TABLE `itinerary` (
  `booking_no` varchar(6) NOT NULL,
  `flight_no` varchar(6) NOT NULL,
  `passport_no` varchar(16) NOT NULL,
  `book_dep_date` date NOT NULL,
  `book_arr_date` date NOT NULL,
  `check_in` int(1) NOT NULL,
  `cancelled` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itinerary`
--

INSERT INTO `itinerary` (`booking_no`, `flight_no`, `passport_no`, `book_dep_date`, `book_arr_date`, `check_in`, `cancelled`) VALUES
('NG0TW9', 'VV 113', 'A12321312', '2019-08-16', '2019-08-16', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `passport_no` varchar(16) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `middle_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `birthday` date NOT NULL,
  `nationality` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`passport_no`, `first_name`, `middle_name`, `last_name`, `birthday`, `nationality`, `email`, `phone`, `address`) VALUES
('A12321312', 'Chandelle', 'Valerio', 'Marquez', '1995-01-28', 'Filipino', 'chandelle@gmail.com', 1234567890, 'Vancouver\r\n		');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flight_no`);

--
-- Indexes for table `itinerary`
--
ALTER TABLE `itinerary`
  ADD PRIMARY KEY (`booking_no`),
  ADD KEY `flight_no` (`flight_no`),
  ADD KEY `passport_no` (`passport_no`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`passport_no`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `itinerary`
--
ALTER TABLE `itinerary`
  ADD CONSTRAINT `itinerary_ibfk_1` FOREIGN KEY (`flight_no`) REFERENCES `flight` (`flight_no`),
  ADD CONSTRAINT `itinerary_ibfk_2` FOREIGN KEY (`passport_no`) REFERENCES `passenger` (`passport_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
