-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 09:05 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_report`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `DID` int(4) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `DEPARTMENT` varchar(30) NOT NULL,
  `PHONE` bigint(10) NOT NULL,
  `DISIGNATION` varchar(50) NOT NULL,
  `SPECIALIZE` varchar(50) NOT NULL,
  `HID` int(6) NOT NULL,
  `PASSWORD` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`DID`, `NAME`, `EMAIL`, `DEPARTMENT`, `PHONE`, `DISIGNATION`, `SPECIALIZE`, `HID`, `PASSWORD`) VALUES
(1234, 'Arun', 'arun@gmail.com', 'Cardio', 6545324098, 'Professor', 'Heart', 123456, 'doctor'),
(1235, 'Surekha', 'surekha@gmail.com', 'Neurology', 4324239087, 'Professor', 'Brain', 123457, 'doctor'),
(1236, 'Chayapathi', 'chayapathi@gmail.com', 'Neurology', 7456549012, 'Professor', 'Muscle', 123458, 'doctor'),
(1237, 'Yogesh', 'yogesh@gmail.com', 'Skin', 9098909890, 'Professor', 'Skin', 123457, 'doctor');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `HID` int(6) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PHONE` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`HID`, `PASSWORD`, `NAME`, `EMAIL`, `PHONE`) VALUES
(123456, 'hospital', 'Manipal', 'manipal@gmail.com', 9876231200),
(123457, 'hospital', 'Fortis', 'fortis20@gmail.com', 3434343434),
(123458, 'hospital', 'Apollo', 'apollo@gmail.com', 5433245430);

-- --------------------------------------------------------

--
-- Table structure for table `hos_location`
--

CREATE TABLE `hos_location` (
  `LOCATION` varchar(30) NOT NULL,
  `HID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hos_location`
--

INSERT INTO `hos_location` (`LOCATION`, `HID`) VALUES
('Bangalore', 123456),
('Delhi', 123457),
('Mumbai', 123458);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `PID` int(10) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PHONE` bigint(10) NOT NULL,
  `ADDRESS` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `GENDER` varchar(7) NOT NULL,
  `BLOODGROUP` varchar(5) NOT NULL,
  `AGE` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`PID`, `PASSWORD`, `NAME`, `EMAIL`, `PHONE`, `ADDRESS`, `DOB`, `GENDER`, `BLOODGROUP`, `AGE`) VALUES
(1234567889, 'rahul', 'Rahul', 'rahul@gmail.com', 9155392334, 'Bihar', '1999-03-03', 'Female', 'O-', 0),
(1234567890, 'sourav', 'Sourav', 'souravk@gmail.com', 8789765423, 'Bihar', '1998-08-19', 'Male', 'O+', 0),
(1234567891, 'shaibal', 'Shaibal', 'shibal@gmail.com', 7324623360, 'Bangladesh', '2000-08-08', 'Male', 'O+', 0),
(1234567892, 'prakhar', 'Prakhar', 'prakhar@gmail.com', 7565463412, 'Orissa', '2000-05-13', 'Male', 'O-', 0),
(1234567897, 'prokosho', 'Prokosho', 'prokosho', 5324245462, 'Silliguri', '1999-07-07', 'Female', 'O+', 0);

-- --------------------------------------------------------

--
-- Table structure for table `recovery`
--

CREATE TABLE `recovery` (
  `EMAIL` varchar(30) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `ADDRESS` varchar(30) NOT NULL,
  `PHONE` bigint(10) NOT NULL,
  `PID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report_paper`
--

CREATE TABLE `report_paper` (
  `REPORT_TYPE` varchar(50) NOT NULL,
  `REPORT_NAME` varchar(50) NOT NULL,
  `REPORT_DESCRIPTION` varchar(50) NOT NULL,
  `DATE` date NOT NULL,
  `PID` int(10) NOT NULL,
  `DID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report_paper`
--

INSERT INTO `report_paper` (`REPORT_TYPE`, `REPORT_NAME`, `REPORT_DESCRIPTION`, `DATE`, `PID`, `DID`) VALUES
('Blood Test', 'TFT', 'Normal', '2019-09-20', 1234567890, 1235),
('Blood Test', 'CPK', 'Normal', '2018-04-04', 1234567891, 1234),
('Blood Test', 'CPK', 'Normal', '2019-12-12', 1234567890, 1235),
('Urine Test', 'Urine', 'Normal', '2020-08-08', 1234567892, 1236),
('xyz', 'xyz', 'xyz', '2020-09-09', 1234567891, 1234),
('Skin', 'Skin', 'Normal', '2020-08-19', 1234567890, 1237),
('asd', 'asd', 'asd', '2020-09-09', 1234567891, 1235);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `TEST_TYPE` varchar(50) NOT NULL,
  `TEST_NAME` varchar(50) NOT NULL,
  `TEST_DESCRIPTION` varchar(50) NOT NULL,
  `DATE` date NOT NULL,
  `PID` int(11) NOT NULL,
  `DID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`TEST_TYPE`, `TEST_NAME`, `TEST_DESCRIPTION`, `DATE`, `PID`, `DID`) VALUES
('X-ray', 'MRI', 'Brain', '2019-08-11', 1234567890, 1235),
('X-ray', 'Ultrasound', 'Kidney', '2020-04-05', 1234567891, 1234),
('X-ray', 'Ultrasound', 'Kidney', '2019-11-11', 1234567890, 1234),
('abc', 'abc', 'abc', '2020-08-08', 1234567890, 1234),
('Urine Test', 'Kidney', 'Normal', '2020-12-12', 1234567897, 1236),
('avc', 'avc', 'avc', '2020-09-09', 1234567891, 1235);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`DID`),
  ADD KEY `HID` (`HID`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`HID`);

--
-- Indexes for table `hos_location`
--
ALTER TABLE `hos_location`
  ADD KEY `HID` (`HID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `recovery`
--
ALTER TABLE `recovery`
  ADD KEY `PID` (`PID`);

--
-- Indexes for table `report_paper`
--
ALTER TABLE `report_paper`
  ADD KEY `PID` (`PID`),
  ADD KEY `DID` (`DID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD KEY `PID` (`PID`),
  ADD KEY `DID` (`DID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`HID`) REFERENCES `hospital` (`HID`);

--
-- Constraints for table `hos_location`
--
ALTER TABLE `hos_location`
  ADD CONSTRAINT `hos_location_ibfk_1` FOREIGN KEY (`HID`) REFERENCES `hospital` (`HID`);

--
-- Constraints for table `recovery`
--
ALTER TABLE `recovery`
  ADD CONSTRAINT `recovery_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `patient` (`PID`);

--
-- Constraints for table `report_paper`
--
ALTER TABLE `report_paper`
  ADD CONSTRAINT `report_paper_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `patient` (`PID`),
  ADD CONSTRAINT `report_paper_ibfk_2` FOREIGN KEY (`DID`) REFERENCES `doctor` (`DID`);

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `patient` (`PID`),
  ADD CONSTRAINT `test_ibfk_2` FOREIGN KEY (`DID`) REFERENCES `doctor` (`DID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
