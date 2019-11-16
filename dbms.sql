-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2019 at 12:36 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `faculty_id` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`faculty_id`, `password`) VALUES
('admin', 'admin'),
('1701CS01', 'badrinath01'),
('1701CS02', 'dhanvanth02'),
('1701CS03', 'vijigiri03'),
('1701CS04', 'sujeeth04'),
('1701CS05', 'sagar05'),
('prabhu01', 'pr');

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE `conference` (
  `pub_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `p_year` year(4) NOT NULL,
  `end_page` int(11) DEFAULT NULL,
  `start_page` int(11) DEFAULT NULL,
  `topic` varchar(30) DEFAULT NULL,
  `conference_link` text DEFAULT NULL,
  `conference_name` varchar(100) NOT NULL,
  `p_month` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conference`
--

INSERT INTO `conference` (`pub_id`, `name`, `p_year`, `end_page`, `start_page`, `topic`, `conference_link`, `conference_name`, `p_month`) VALUES
(1, 'conf1', 2016, 355, 320, 'topic1', 'dsfdsfdwersfddsfdfdf', 'iccaconf1', 5),
(2, 'conf2', 2017, 353, 333, 'topic2', 'dsfdsfdwertsfddsfdfdf', 'iccaconf2', 6),
(3, 'conf3', 2012, 55, 34, 'topic4', 'dsfdsfdwersfddsfdfdf', 'iccaconf3', 7),
(5, 'conf5', 2019, 367, 234, 'topic5', 'dsfdsfdweryityuisfddsfdfdf', 'iccaconf5', 10);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_name`) VALUES
('Chemical'),
('Civil'),
('Computer Science'),
('Electrical'),
('Mechanical');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `ph_no` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `joinedon` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `name`, `department`, `ph_no`, `email`, `joinedon`) VALUES
('1701CS01', 'badrinath', 'Computer Science', '1111111111', 'bad@gmail.com', '2008-03-08'),
('1701CS02', 'dhanvanth', 'Civil', '1111111112', 'dhn@gmail.com', '2009-04-05'),
('1701CS03', 'vijigiri', 'Chemical', '1111111113', 'vij@gmail.com', '2010-05-04'),
('1701CS04', 'sujeeth', 'Electrical', '1111111114', 'suj@gmail.com', '2011-08-22'),
('1701CS05', 'sagar', 'Mechanical', '1111111115', 'sag@gmail.com', '2012-03-21'),
('prabhu01', 'prabhu', 'Computer Science', '9292929292', 'prabhu@gmail.com', '2019-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `pub_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `p_year` year(4) NOT NULL,
  `end_page` int(11) DEFAULT NULL,
  `start_page` int(11) DEFAULT NULL,
  `topic` varchar(30) DEFAULT NULL,
  `journal_link` text DEFAULT NULL,
  `journal_name` varchar(100) NOT NULL,
  `volume` int(10) NOT NULL,
  `issue_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`pub_id`, `name`, `p_year`, `end_page`, `start_page`, `topic`, `journal_link`, `journal_name`, `volume`, `issue_no`) VALUES
(1, 'journal1', 2010, 355, 320, 'topic1', 'dsfdsfdsfddsfdfdf', 'iccajournal1', 67, 458),
(2, 'journal2', 2013, 566, 450, 'topic2', 'dsfdsfdsfddsadsfdfdf', 'iccajournal4', 56, 645),
(3, 'journal3', 2011, 755, 620, 'topic3', 'dsfdsghjkhjkdf', 'iccajournal3', 55, 454),
(5, 'journal5', 2015, 65, 10, 'topic5', 'dsfdsfdsuyiyufdfdf', 'iccajournal5', 45, 679);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `proj_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `budget` int(10) NOT NULL,
  `topic` varchar(30) DEFAULT NULL,
  `sponsor` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`proj_id`, `name`, `start_date`, `end_date`, `budget`, `topic`, `sponsor`) VALUES
(1, 'project1', '2000-02-01', '2000-03-02', 332434, 'topic1', 'sponsor1'),
(2, 'project2', '2001-03-02', '2001-04-03', 332454, 'topic4', 'sponsor2'),
(3, 'project3', '2002-04-03', '2002-05-04', 332634, 'topic3', 'sponsor3'),
(5, 'project5', '2004-06-05', '2004-07-06', 382434, 'topic5', 'sponsor5'),
(6, 'projectp', '2019-11-15', '2019-11-04', 5678, 'blockchain', 'vrfch'),
(7, 'project1', '2019-11-15', '2019-11-08', 9788, 'tp90', 'vxhf');

-- --------------------------------------------------------

--
-- Table structure for table `published_conf_by`
--

CREATE TABLE `published_conf_by` (
  `pub_id` int(11) NOT NULL,
  `faculty_id` varchar(30) NOT NULL,
  `designation` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `published_conf_by`
--

INSERT INTO `published_conf_by` (`pub_id`, `faculty_id`, `designation`) VALUES
(1, '1701CS02', 'main'),
(1, '1701CS03', 'secondary'),
(2, '1701CS04', 'main'),
(2, '1701CS05', 'secondary'),
(3, '1701CS03', 'secondary'),
(3, '1701CS05', 'main'),
(5, '1701CS04', 'main');

-- --------------------------------------------------------

--
-- Table structure for table `published_jour_by`
--

CREATE TABLE `published_jour_by` (
  `pub_id` int(11) NOT NULL,
  `faculty_id` varchar(30) NOT NULL,
  `designation` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `published_jour_by`
--

INSERT INTO `published_jour_by` (`pub_id`, `faculty_id`, `designation`) VALUES
(1, '1701CS02', 'main'),
(1, '1701CS03', 'secondary'),
(2, '1701CS04', 'main'),
(2, '1701CS05', 'secondary'),
(3, '1701CS03', 'secondary'),
(3, '1701CS05', 'main'),
(5, '1701CS04', 'main');

-- --------------------------------------------------------

--
-- Table structure for table `worked_on`
--

CREATE TABLE `worked_on` (
  `proj_id` int(11) NOT NULL,
  `faculty_id` varchar(30) NOT NULL,
  `designation` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `worked_on`
--

INSERT INTO `worked_on` (`proj_id`, `faculty_id`, `designation`) VALUES
(1, '1701CS02', 'head'),
(1, '1701CS03', 'assitant'),
(2, '1701CS04', 'head'),
(2, '1701CS05', 'assitant'),
(3, '1701CS03', 'assitant'),
(3, '1701CS05', 'head'),
(5, '1701CS04', 'head'),
(6, '1701CS03', 'head'),
(6, '1701CS04', 'head'),
(6, 'prabhu01', 'head'),
(7, '1701CS05', 'head'),
(7, 'prabhu01', 'head');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`pub_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_name`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`),
  ADD KEY `department` (`department`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`pub_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`proj_id`);

--
-- Indexes for table `published_conf_by`
--
ALTER TABLE `published_conf_by`
  ADD PRIMARY KEY (`pub_id`,`faculty_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `published_jour_by`
--
ALTER TABLE `published_jour_by`
  ADD PRIMARY KEY (`pub_id`,`faculty_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `worked_on`
--
ALTER TABLE `worked_on`
  ADD PRIMARY KEY (`proj_id`,`faculty_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conference`
--
ALTER TABLE `conference`
  MODIFY `pub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `pub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`department`) REFERENCES `departments` (`dept_name`);

--
-- Constraints for table `published_conf_by`
--
ALTER TABLE `published_conf_by`
  ADD CONSTRAINT `published_conf_by_ibfk_1` FOREIGN KEY (`pub_id`) REFERENCES `conference` (`pub_id`),
  ADD CONSTRAINT `published_conf_by_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `published_jour_by`
--
ALTER TABLE `published_jour_by`
  ADD CONSTRAINT `published_jour_by_ibfk_1` FOREIGN KEY (`pub_id`) REFERENCES `journal` (`pub_id`),
  ADD CONSTRAINT `published_jour_by_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `worked_on`
--
ALTER TABLE `worked_on`
  ADD CONSTRAINT `worked_on_ibfk_1` FOREIGN KEY (`proj_id`) REFERENCES `projects` (`proj_id`),
  ADD CONSTRAINT `worked_on_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
