-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2018 at 06:08 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csci3300_ievent`
--
CREATE DATABASE IF NOT EXISTS `csci3300_ievent` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `csci3300_ievent`;

-- --------------------------------------------------------

--
-- Table structure for table `assignedroles`
--

CREATE TABLE `assignedroles` (
  `UserID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignedroles`
--

INSERT INTO `assignedroles` (`UserID`, `RoleID`) VALUES
(114, 2),
(115, 2),
(116, 2);

-- --------------------------------------------------------

--
-- Table structure for table `attachedevents`
--

CREATE TABLE `attachedevents` (
  `UserID` int(11) NOT NULL,
  `EventID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attachedevents`
--

INSERT INTO `attachedevents` (`UserID`, `EventID`) VALUES
(102, 4),
(102, 5),
(102, 6),
(102, 7),
(116, 8);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventID` int(11) NOT NULL,
  `EventName` varchar(30) NOT NULL,
  `Owner` varchar(25) NOT NULL,
  `Privacy` int(11) NOT NULL,
  `StartTime` date NOT NULL,
  `EndTime` date NOT NULL,
  `Latitue` double DEFAULT NULL,
  `Longitude` double DEFAULT NULL,
  `Summary` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventID`, `EventName`, `Owner`, `Privacy`, `StartTime`, `EndTime`, `Latitue`, `Longitude`, `Summary`) VALUES
(1, 'Event1', '102', 1, '0000-00-00', '0000-00-00', NULL, NULL, '11233122133121233123'),
(2, 'Event1', '102', 1, '0000-00-00', '0000-00-00', NULL, NULL, '11233122133121233123'),
(3, 'Event1', '102', 1, '0000-00-00', '0000-00-00', NULL, NULL, '11233122133121233123'),
(4, 'Event1', '102', 1, '0000-00-00', '0000-00-00', NULL, NULL, '11233122133121233123'),
(5, 'Test Event', '102', 1, '2010-12-19', '0000-00-00', NULL, NULL, 'This is the summary of the event'),
(6, '', '102', 1, '0000-00-00', '0000-00-00', NULL, NULL, ''),
(7, 'Test Event2', '102', 1, '0000-00-00', '0000-00-00', NULL, NULL, 'Theevent summary'),
(8, 'Test Event 3', '116', 1, '2018-10-24', '2018-10-26', NULL, NULL, 'bacllasdjkas');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`RoleID`, `RoleName`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(128) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `Email`, `FirstName`, `LastName`, `LastUpdate`) VALUES
(113, 'lukebrains', 'b781b53e988a49968bd584df10054014e40563d9d5f965c6d36245c848e95eb585ee88e1044801bec5ca6fa959684c0a9302a277978907bed91cb7207db06d55', 'test123@gmail.com', 'Luke', 'Brady', '2018-10-11 20:49:05'),
(112, 'zyang', 'a976df3b27d4df478822f419996bdf5c80a67f9aed4efe87dcbd8ad4715bd042f163d06b4c1ce0e12ebb5c86e4d14c88ac7f3354e591219bab92fc37ce5c7f4a', 'jim.liu38@yahoo.com', 'Zixin', 'Yang', '2018-10-11 13:07:52'),
(111, 'jet', 'fa50096d44c3bf525d8d2b4f67659fc6cf32b26d1111497983b61c28ee55a2efb2b426abaafaae99c5c137ba08df22e67d189da0ff4f02c3ca0ad356cc77dc2d', 'jet@ung.edu', 'J', 'T', '2018-10-11 05:16:24'),
(110, '222', '7291fad482ea214f3fa4d74e4b30872a18149d48fadd32e9eda7410244767fe086a170d8cf537d87343cc85ad577707ad95a57b53938fb2616686a09693cf5f6', 'Foo@yahoo.com', '1', '2', '2018-10-10 14:06:36'),
(109, 'KingDeDeDe', 'c66e67319ebeebc527eb66caaf9a7cc34cc736290908c9de53333bb4ad301c893957b008c727d6935d0d2b363cc3d3b5696e6e6443e997303a78a6c67819012b', 'KingDeDeDe@ung.edu', 'KingDeDeDe', 'KingDeDeDe', '2018-10-10 02:15:05'),
(108, 'joseph123', 'a3bd678cf423d79264a704e5c41fc2b20f9b827b5f78255de42ff753f44cd7c8d3b176d5cbbf8e36f68a9150e45549e5e03467db9acc1d1c8718b436eccfe976', 'joseph@mail.com', 'JOSEPH', 'THOMPSON', '2018-10-09 23:17:49'),
(107, 'joseph', 'c66e67319ebeebc527eb66caaf9a7cc34cc736290908c9de53333bb4ad301c893957b008c727d6935d0d2b363cc3d3b5696e6e6443e997303a78a6c67819012b', 'jmthom1353@ung.edu', 'joseph', 'thompson', '2018-10-09 23:15:54'),
(106, 'mawill2151', '77f02b846fba4fb12e726c233e9cd9649bbf4d157a21e189c022b80a36e775e92eb048aa0e49e809eb37552d3e8bcf353b04781ec3a72618800d91181d58b0f2', 'mawill2151@ung.edu', 'matt', 'williams', '2018-10-09 16:52:21'),
(105, 'tester', '7291fad482ea214f3fa4d74e4b30872a18149d48fadd32e9eda7410244767fe086a170d8cf537d87343cc85ad577707ad95a57b53938fb2616686a09693cf5f6', 'kmitchell@ymail.com', 'Kevin', 'Mitchell', '2018-10-07 17:34:59'),
(104, 'Derp', '7291fad482ea214f3fa4d74e4b30872a18149d48fadd32e9eda7410244767fe086a170d8cf537d87343cc85ad577707ad95a57b53938fb2616686a09693cf5f6', 'kmitchell91@ymail.com', 'Kevin', 'Mitchell', '2018-10-07 15:44:28'),
(103, '12345', '7291fad482ea214f3fa4d74e4b30872a18149d48fadd32e9eda7410244767fe086a170d8cf537d87343cc85ad577707ad95a57b53938fb2616686a09693cf5f6', 'kmitchell981@ymail.com', 'Kevin', 'Mitchell', '2018-10-06 06:14:56'),
(102, 'Administrator', '7291fad482ea214f3fa4d74e4b30872a18149d48fadd32e9eda7410244767fe086a170d8cf537d87343cc85ad577707ad95a57b53938fb2616686a09693cf5f6', 'kmitchell98@ymail.com', 'Kevin', 'Mitchell', '2018-10-06 05:52:53'),
(114, 'ThisIsAmerica', 'e7b41a0054c90d4bee580f51f31c60d9b15444ace1122851b2637c5a37101de1cffde9cf5f3b7f5cf20cbe41b5ad743831b409f7a1df446025a824e5c302696f', 'foo1234@ymail.com', 'Testi', 'Test', '2018-10-23 07:44:06'),
(115, 'ilikecoding', 'e7b41a0054c90d4bee580f51f31c60d9b15444ace1122851b2637c5a37101de1cffde9cf5f3b7f5cf20cbe41b5ad743831b409f7a1df446025a824e5c302696f', 'kmmitc9478@ung.edu', 'Kevin', 'Mitchell', '2018-10-23 07:52:03'),
(116, 'thenewuser', '7291fad482ea214f3fa4d74e4b30872a18149d48fadd32e9eda7410244767fe086a170d8cf537d87343cc85ad577707ad95a57b53938fb2616686a09693cf5f6', 'foo123@yahoo.com', 'Restister', 'User', '2018-10-23 18:42:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignedroles`
--
ALTER TABLE `assignedroles`
  ADD PRIMARY KEY (`UserID`,`RoleID`);

--
-- Indexes for table `attachedevents`
--
ALTER TABLE `attachedevents`
  ADD PRIMARY KEY (`UserID`,`EventID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
