-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 04:52 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cite`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `SN` int(200) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`SN`, `Username`, `Password`) VALUES
(1, 'admin', '$2y$10$4LheGbb11glFM8.7kKfQ1e.i85gk.7030RT8qeYvkDUcVI4kO41TO'),
(2, 'nidan', '$2y$10$bvHcS2D69STCWk9421gT3OET1V4EIaobs6fWJVqSKC8lM0nOdduxS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_members`
--

CREATE TABLE `tb_members` (
  `SN` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Position` varchar(100) NOT NULL,
  `Qualification` varchar(100) NOT NULL,
  `Experiences` varchar(200) NOT NULL,
  `Number` varchar(20) NOT NULL,
  `Flink` varchar(100) NOT NULL,
  `Tlink` varchar(100) NOT NULL,
  `Glink` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_members`
--

INSERT INTO `tb_members` (`SN`, `Image`, `Name`, `Position`, `Qualification`, `Experiences`, `Number`, `Flink`, `Tlink`, `Glink`) VALUES
(4, '1.jpg', 'Madan Prajapati', 'Chair person', 'BE', '25 year in teaching/leadership Training', '9840000000', '#', '#', '#'),
(5, '2.jpg', 'Razz Shrestha', 'Vice Chair person', 'I.A', 'Social service', '9840000000', '#', '#', '#'),
(6, '3.jpg', 'Jupiter Bade', 'Secretary', 'M.ED', 'ToT, leadership, income generation, psycho, culture, disaster, psycho- socio-counseling, school children adolescence counseling program', '9800000000', '#', '#', '#'),
(7, '4.jpg', 'Nidan Shrestha', 'Treasurer', 'IEd', 'TEACHING in 25 years.', '9840000000', '#', '#', '#'),
(8, '5.jpg', 'Suraj Kapali', 'Member', 'IEd', '25 years teaching.', '9840000000', '#', '#', '#'),
(9, '6.jpg', 'Daniel Shrestha', 'Member', 'IEd', 'Social service', '9840000000', '#', '#', '#'),
(10, '7.jpg', 'Shristee Shrestha', 'Member', 'IEd', 'Teacher', '9840000000', '#', '#', '#'),
(11, '8.jpg', 'Saru prajapati', 'Member', 'BA Sociology', 'Teacher LIFE MEMBE of Redcross', '9840000000', '#', '#', '#'),
(12, '9.jpg', 'Samjhana Rajbhandari', 'Member', 'BBS', 'Student', '9840000000', '#', '#', '#');

-- --------------------------------------------------------

--
-- Table structure for table `tb_project`
--

CREATE TABLE `tb_project` (
  `SN` int(11) NOT NULL,
  `Pname` varchar(100) NOT NULL,
  `Pcondition` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `Pimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_project`
--

INSERT INTO `tb_project` (`SN`, `Pname`, `Pcondition`, `Description`, `Pimage`) VALUES
(2, 'Literacy project', 'Ongoing', 'Literacy project is a part of Educational program of NSS which helps illiterate people to be literate in different villages of Nepal. NSS launches 8 months literacy class which helps in educating and empowering people of rural areas of Nepal. It has become a powerful way to transform peoples life positively.                                          ', '5ffdc735e6b67.jpg'),
(3, 'Love in action', 'Completed', 'On may 31, 2020 NSS in coordination with ward office launched this COVID-19 Food Relief Distribution in the East and West Nepal. About 230 households were distributed with Rice, Beaten rice, 2 litre oil, Peas, Salt, Soap, 2kg lentile at Lahan-15, Siraha district. Big thank you to local Lahan Municipality, Shuklaphata and Bedkot Munucipality, Respective Ward Office, UVN RFO Team, UVN District Representatives for your excellent cooperation, and dedicated service in the successful coordination of the food relief distribution.              ', '5ffdc77c3a637.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sliders`
--

CREATE TABLE `tb_sliders` (
  `SN` int(200) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sliders`
--

INSERT INTO `tb_sliders` (`SN`, `Image`) VALUES
(2, 'hero1.jpg'),
(3, 'hero2.jpg'),
(6, 'hero3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `tb_members`
--
ALTER TABLE `tb_members`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `tb_project`
--
ALTER TABLE `tb_project`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `tb_sliders`
--
ALTER TABLE `tb_sliders`
  ADD PRIMARY KEY (`SN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `SN` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_members`
--
ALTER TABLE `tb_members`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_project`
--
ALTER TABLE `tb_project`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_sliders`
--
ALTER TABLE `tb_sliders`
  MODIFY `SN` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
