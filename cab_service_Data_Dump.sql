-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2017 at 05:37 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cab_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `ID` bigint(20) NOT NULL,
  `PASSENGER_EMAIL` varchar(500) NOT NULL,
  `VEHICLE_ID` varchar(200) NOT NULL,
  `START_POINT` varchar(200) NOT NULL,
  `END_POINT` varchar(200) NOT NULL,
  `BOOK_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`ID`, `PASSENGER_EMAIL`, `VEHICLE_ID`, `START_POINT`, `END_POINT`, `BOOK_DATE`) VALUES
(1, 'pessanger@gmail.com', 'NA-78965', 'Dodanduwa', 'hikkaduwa', '2017-07-20'),
(2, 'pessanger@gmail.com', 'NK-21648', 'colombo', 'galle', '2017-06-22'),
(3, 'pessanger@gmail.com', 'NA-78965', 'dehiwala', 'galkissa', '2017-07-27'),
(4, 'pessanger@gmail.com', 'NA-78965', 'Dodanduwa', 'hikkaduwa', '2017-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `EMAIL` varchar(500) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `PHONENO` varchar(12) NOT NULL,
  `ADDRESS` varchar(500) NOT NULL,
  `TYPE` int(2) NOT NULL,
  `PASSWORD` varchar(1000) DEFAULT NULL,
  `ACTIVE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`EMAIL`, `NAME`, `PHONENO`, `ADDRESS`, `TYPE`, `PASSWORD`, `ACTIVE`) VALUES
('admin@gmail.com', 'admin', '0710453447', 'abcd, Galle', 1, '123', 1),
('driver@gmail.com', 'driver123456', '0254781354', 'polk, Galle', 0, '', 0),
('pessanger@gmail.com', 'pessange', '074521365', 'ttrtfty, Galle', 3, '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `NUMBER` varchar(200) NOT NULL,
  `DRIVER_EMAIL` varchar(500) NOT NULL,
  `TYPE` varchar(200) NOT NULL,
  `NO_OF_SEATS` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`NUMBER`, `DRIVER_EMAIL`, `TYPE`, `NO_OF_SEATS`) VALUES
('NA-123654', 'driver@gmail.com', 'van', '15'),
('NA-78965', 'driver@gmail.com', 'van', '12'),
('NK-21648', 'driver@gmail.com', 'car', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PASSENGER_EMAIL` (`PASSENGER_EMAIL`),
  ADD KEY `VEHICLE_ID` (`VEHICLE_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`EMAIL`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`NUMBER`),
  ADD KEY `DRIVER_EMAIL` (`DRIVER_EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`PASSENGER_EMAIL`) REFERENCES `users` (`EMAIL`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`VEHICLE_ID`) REFERENCES `vehicle` (`NUMBER`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`DRIVER_EMAIL`) REFERENCES `users` (`EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
