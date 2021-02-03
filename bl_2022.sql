-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2020 at 02:48 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bl_2022`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
CREATE DATABASE bl_2022;
use bl_2022;
CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `CompPassword` varchar(255) NOT NULL,
  `CompEmail` varchar(50) NOT NULL,
  `CompName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `Username`, `CompPassword`, `CompEmail`, `CompName`) VALUES
(1, 'bluelake123', 'faf4341aaf09e9a45cc39c87a47e5577', 'lakeb6404@gmail.com', 'Blue Lake');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `AgentID` int(11) NOT NULL,
  `FirstName` varchar(70) NOT NULL,
  `SurName` varchar(70) NOT NULL,
  `PrimaryEmail` varchar(70) NOT NULL,
  `PrimaryPhone` varchar(20) NOT NULL,
  `MyResidence` varchar(70) NOT NULL,
  `BriefBio` varchar(255) NOT NULL,
  `ProfilePic` varchar(80) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `time_posted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`AgentID`, `FirstName`, `SurName`, `PrimaryEmail`, `PrimaryPhone`, `MyResidence`, `BriefBio`, `ProfilePic`, `linkedin`, `time_posted`) VALUES
(1, 'John Venom', 'Ayomah', 'ayomahjohn111@gmail.com', '+2330547195965', 'Tamale', 'Architecht and Business Consultant', 'venom.jpg', 'https://www.linkedin.com/in/john-ayomah-243848170', '2020-11-12 17:57:00'),
(2, 'Kweku Andoh', 'Yamoah', 'kwekuandyamoah@gmail.com', '+233245031253', 'Abose - Okai', 'Software Engineer and Artiste', 'yamoah.jpg', ' https://www.linkedin.com/in/kweku-andoh-yamoah-475711170/', '2020-11-12 18:29:00'),
(3, 'Akwasi-Asante', 'Krobea', 'akwasi.asantekrobea1@gmail.com', '+233509766104', 'Kumasi', 'Web Developer and Guitarist', 'krobs.jpg', 'http://linkedin.com/in/akwasi-asante-krobea-9300a4171', '2020-11-13 06:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

CREATE TABLE `apartment` (
  `ApartmentID` int(11) NOT NULL,
  `MyDescription` varchar(255) NOT NULL,
  `MyPrice` decimal(10,2) NOT NULL,
  `MyLocation` varchar(255) NOT NULL,
  `MyImage` varchar(255) NOT NULL,
  `Approved` enum('Yes','No') DEFAULT NULL,
  `time_posted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `posted_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartment`
--

INSERT INTO `apartment` (`ApartmentID`, `MyDescription`, `MyPrice`, `MyLocation`, `MyImage`, `Approved`, `time_posted`, `posted_by`) VALUES
(1, '4 bed room house with 2 pools', '4579.00', 'Spintex', 'imageFourteen.jpg', 'Yes', '2020-11-12 15:14:17', 'percy'),
(3, 'A 5 bed room house for sale.', '29887.00', 'Cantonments', 'imageEight.jpg', 'Yes', '2020-11-14 01:39:02', 'bluelake100'),
(4, 'A 6 bed room house with boys quarters', '458.00', 'Tema', 'imageFour.jpg', 'Yes', '2020-11-14 01:39:13', 'bluelake100'),
(5, '4 bed room house for rent. Payment made annually.', '186.00', 'Kasoa', 'Margaret.jpg', 'Yes', '2020-11-14 01:39:22', 'bluelake100'),
(6, '5 bed room house for sale', '3345.00', 'Berekuso', 'imageSixteen.jpg', 'Yes', '2020-11-14 01:39:31', 'bluelake100');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `FirstName` varchar(70) NOT NULL,
  `SurName` varchar(70) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `PrimaryEmail` varchar(70) NOT NULL,
  `PrimaryPhone` varchar(20) NOT NULL,
  `MyPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `FirstName`, `SurName`, `Username`, `PrimaryEmail`, `PrimaryPhone`, `MyPassword`) VALUES
(1, 'Percy', 'Brown', 'percy', 'persiebrown285@gmail.com', '0277776087', 'a4a84e714667f266ac23c988c611b1dc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`),
  ADD UNIQUE KEY `CompEmail` (`CompEmail`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`AgentID`),
  ADD UNIQUE KEY `PrimaryEmail` (`PrimaryEmail`);

--
-- Indexes for table `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`ApartmentID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `PrimaryEmail` (`PrimaryEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `AgentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `apartment`
--
ALTER TABLE `apartment`
  MODIFY `ApartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
