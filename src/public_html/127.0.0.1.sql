-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2018 at 02:12 PM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CSCI3300_iEvent`
--

-- --------------------------------------------------------

--
-- Table structure for table `AssignedRoles`
--

CREATE TABLE `AssignedRoles` (
  `UserID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AssignedRoles`
--

INSERT INTO `AssignedRoles` (`UserID`, `RoleID`) VALUES
(114, 2),
(115, 2),
(116, 2);

-- --------------------------------------------------------

--
-- Table structure for table `AttachedEvents`
--

CREATE TABLE `AttachedEvents` (
  `UserID` int(11) NOT NULL,
  `EventID` int(11) NOT NULL,
  `RSVP` enum('Undecided','No','Maybe','Yes') NOT NULL DEFAULT 'Undecided'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AttachedEvents`
--

INSERT INTO `AttachedEvents` (`UserID`, `EventID`, `RSVP`) VALUES
(110, 8, 'Maybe'),
(115, 4, 'Undecided'),
(109, 6, 'Undecided'),
(116, 8, 'Maybe'),
(111, 3, 'No'),
(104, 7, 'No'),
(114, 4, 'No'),
(113, 6, 'Yes'),
(113, 1, 'Yes'),
(106, 3, 'Maybe'),
(115, 3, 'Yes'),
(105, 4, 'No'),
(108, 5, 'Undecided'),
(115, 8, 'Yes'),
(106, 6, 'Undecided'),
(112, 4, 'Maybe'),
(113, 4, 'Maybe'),
(103, 6, 'No'),
(102, 6, 'No'),
(109, 7, 'No'),
(108, 3, 'No'),
(110, 4, 'Undecided'),
(114, 3, 'Yes'),
(115, 7, 'Yes'),
(109, 3, 'Yes'),
(107, 2, 'Undecided'),
(108, 1, 'No'),
(104, 1, 'Maybe'),
(106, 7, 'Undecided'),
(110, 6, 'Yes'),
(116, 5, 'Yes'),
(109, 4, 'No'),
(105, 3, 'Undecided'),
(112, 3, 'No'),
(112, 1, 'Undecided'),
(111, 8, 'No'),
(113, 7, 'Maybe'),
(111, 6, 'Yes'),
(110, 5, 'Undecided'),
(105, 2, 'Maybe'),
(105, 7, 'No'),
(114, 7, 'Maybe'),
(114, 6, 'Maybe'),
(113, 5, 'Undecided'),
(106, 2, 'No'),
(115, 5, 'Maybe'),
(103, 2, 'No'),
(106, 4, 'Yes'),
(113, 3, 'Maybe'),
(104, 4, 'No'),
(110, 3, 'No'),
(109, 2, 'No'),
(104, 5, 'Maybe'),
(107, 6, 'Undecided'),
(108, 7, 'Yes'),
(106, 8, 'Maybe'),
(114, 1, 'Maybe'),
(104, 2, 'Undecided'),
(107, 7, 'Yes'),
(111, 1, 'No'),
(115, 6, 'Maybe'),
(103, 5, 'Undecided'),
(112, 6, 'Maybe'),
(103, 3, 'Undecided'),
(107, 8, 'No'),
(112, 2, 'Undecided'),
(108, 2, 'Maybe'),
(105, 5, 'Maybe'),
(113, 2, 'Undecided'),
(116, 3, 'Maybe'),
(109, 8, 'Maybe'),
(102, 8, 'Yes'),
(103, 7, 'Yes'),
(114, 5, 'Undecided'),
(112, 5, 'Maybe'),
(104, 3, 'Yes'),
(115, 2, 'Maybe'),
(104, 8, 'Undecided'),
(102, 1, 'Yes'),
(105, 1, 'Undecided'),
(106, 1, 'Maybe'),
(108, 4, 'Maybe'),
(110, 2, 'Undecided'),
(111, 4, 'No'),
(102, 2, 'Maybe'),
(103, 8, 'Undecided'),
(113, 8, 'Maybe'),
(107, 4, 'Yes'),
(104, 6, 'No'),
(102, 3, 'No'),
(109, 5, 'Undecided'),
(114, 8, 'Yes'),
(106, 5, 'No'),
(116, 1, 'Undecided'),
(116, 7, 'Maybe'),
(116, 4, 'No'),
(111, 5, 'No'),
(110, 7, 'Maybe'),
(102, 4, 'No'),
(115, 1, 'Undecided'),
(110, 40, 'Maybe'),
(108, 40, 'Undecided'),
(104, 40, 'Undecided'),
(110, 37, 'Undecided'),
(108, 37, 'Undecided'),
(104, 37, 'Undecided'),
(111, 37, 'Yes'),
(107, 37, 'Undecided'),
(105, 37, 'Undecided'),
(109, 37, 'Undecided'),
(102, 37, 'Undecided'),
(115, 37, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE `Events` (
  `EventID` int(11) NOT NULL,
  `EventName` varchar(30) NOT NULL,
  `Owner` varchar(25) NOT NULL,
  `AttendeeCount` int(11) NOT NULL,
  `Privacy` int(11) NOT NULL,
  `StartTime` date NOT NULL,
  `EndTime` date NOT NULL,
  `Latitue` double DEFAULT NULL,
  `Longitude` double DEFAULT NULL,
  `Summary` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Events`
--

INSERT INTO `Events` (`EventID`, `EventName`, `Owner`, `AttendeeCount`, `Privacy`, `StartTime`, `EndTime`, `Latitue`, `Longitude`, `Summary`) VALUES
(1, 'nemo', '105', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Magnam voluptas officia sed consequatur.'),
(2, 'doloribus', '106', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Possimus repellendus dolor explicabo minima non.'),
(3, 'qui', '104', 1, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Sit sed voluptas natus qui aliquam voluptatem iste.'),
(4, 'enim', '104', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Quo commodi et voluptatibus fugit quia.'),
(5, 'ab', '105', 5, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Ad est iusto labore.'),
(6, 'qui', '104', 2, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Delectus sapiente autem quas reiciendis.'),
(7, 'magnam', '115', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Sint magni voluptas incidunt veniam est vel.'),
(8, 'voluptate', '110', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Excepturi nam id et facere aut et et expedita.'),
(9, 'consequatur', '104', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Sint vitae sint non nemo excepturi est non.'),
(10, 'et', '111', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Rerum minima in velit.'),
(11, 'aut', '108', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Reiciendis iste nisi magnam sint.'),
(12, 'distinctio', '110', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Fuga vitae sunt facilis deleniti nisi porro.'),
(13, 'perspiciatis', '108', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'At beatae sunt quis sit maxime velit dolor autem.'),
(14, 'in', '113', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Est impedit omnis quia ipsum qui.'),
(15, 'ullam', '115', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Soluta minima quos ad dolores.'),
(16, 'ratione', '116', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Dicta est ad voluptas omnis iusto asperiores occaecati.'),
(17, 'quibusdam', '105', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Cumque quisquam earum similique perspiciatis sed cupiditate.'),
(18, 'optio', '106', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Laudantium omnis illo fugiat sint asperiores deleniti autem.'),
(19, 'esse', '109', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Tempore quia enim eos.'),
(20, 'eos', '115', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Ipsam ratione omnis nisi repudiandae tenetur.'),
(21, 'voluptatem', '111', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Quidem repellendus repellat quia architecto ipsa qui.'),
(22, 'cum', '107', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'In fugiat quia possimus ipsa beatae.'),
(23, 'aut', '106', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Quos veritatis a dolore ut necessitatibus.'),
(24, 'quia', '107', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Aspernatur qui dolores aut exercitationem.'),
(25, 'earum', '113', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Consequatur ut dolor dolorum.'),
(26, 'voluptates', '111', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Omnis soluta unde eius doloremque veritatis voluptas.'),
(27, 'incidunt', '114', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Vero consequatur accusantium sed ut deserunt accusantium sit molestias.'),
(28, 'iure', '114', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Exercitationem qui iste consequuntur fugit cum.'),
(29, 'accusamus', '109', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Nulla eius ea distinctio.'),
(30, 'necessitatibus', '103', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Dolorum numquam id quos ut.'),
(31, 'repudiandae', '111', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Quia modi qui eos illo aut dolor et.'),
(32, 'omnis', '112', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Sequi impedit veritatis et.'),
(33, 'fuga', '111', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Quos repellendus explicabo voluptatum aperiam quia corporis.'),
(34, 'ipsa', '107', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Non sed praesentium vitae.'),
(35, 'rerum', '106', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Aperiam pariatur pariatur aut consequatur beatae perferendis.'),
(36, 'voluptas', '114', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Quos aliquid ut numquam ad sapiente eligendi vero.'),
(37, 'reiciendis', '102', 11, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Tenetur fuga nihil dolorum fugit et.'),
(38, 'molestiae', '106', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Numquam molestiae sed iure.'),
(39, 'esse', '112', 0, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Perspiciatis qui numquam expedita facilis qui aut enim.'),
(40, 'voluptatem', '102', 2, 0, '2018-11-03', '2018-11-03', NULL, NULL, 'Fugit voluptas est veritatis quia quis est sint.');

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE `Roles` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`RoleID`, `RoleName`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(128) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `LastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserID`, `Username`, `Password`, `Email`, `FirstName`, `LastName`, `LastUpdate`) VALUES
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
-- Indexes for table `AssignedRoles`
--
ALTER TABLE `AssignedRoles`
  ADD PRIMARY KEY (`UserID`,`RoleID`);

--
-- Indexes for table `AttachedEvents`
--
ALTER TABLE `AttachedEvents`
  ADD PRIMARY KEY (`UserID`,`EventID`);

--
-- Indexes for table `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`EventID`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Events`
--
ALTER TABLE `Events`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
