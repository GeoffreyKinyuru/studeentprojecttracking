-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 10, 2018 at 06:11 AM
-- Server version: 5.5.16
-- PHP Version: 5.4.0beta2-dev

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projecttracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `approvals`
--

CREATE TABLE IF NOT EXISTS `approvals` (
  `ID` int(11) NOT NULL,
  `studentID` int(11) DEFAULT NULL,
  `projectID` int(11) DEFAULT NULL,
  `concept` varchar(20) DEFAULT NULL,
  `dfd` varchar(20) DEFAULT NULL,
  `proposal` varchar(20) DEFAULT NULL,
  `progress` varchar(20) DEFAULT NULL,
  `final` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `studentID` (`studentID`),
  KEY `projectID` (`projectID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approvals`
--

INSERT INTO `approvals` (`ID`, `studentID`, `projectID`, `concept`, `dfd`, `proposal`, `progress`, `final`) VALUES
(1812, 1591, 6474, 'Declined', '', '', '', ' '),
(5922, 6891, 5142, 'Approved', 'Declined', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `assessmentdata`
--

CREATE TABLE IF NOT EXISTS `assessmentdata` (
  `id` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `projecttitle` varchar(20) NOT NULL,
  `concepts` varchar(20) NOT NULL DEFAULT 'pending',
  `dfds` varchar(20) NOT NULL DEFAULT 'pending',
  `proposals` varchar(20) NOT NULL DEFAULT 'pending',
  `progress` varchar(20) NOT NULL DEFAULT 'pending',
  `final` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`),
  KEY `project` (`projectID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessmentdata`
--

INSERT INTO `assessmentdata` (`id`, `projectID`, `projecttitle`, `concepts`, `dfds`, `proposals`, `progress`, `final`) VALUES
(2034, 6518, 'encryption in RSA', 'pending', 'pending', 'pending', 'pending', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE IF NOT EXISTS `coordinator` (
  `cID` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `supervisorID` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`cID`),
  KEY `super` (`supervisorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coordinator`
--

INSERT INTO `coordinator` (`cID`, `fname`, `sname`, `supervisorID`, `email`, `password`) VALUES
(1567, 'jasper', 'ondulo', 1789, 'opiyo7@yahoo.com', 'jasper123');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `projectID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `projecttitle` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `year` int(10) NOT NULL,
  PRIMARY KEY (`projectID`),
  KEY `student` (`studentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectID`, `studentID`, `projecttitle`, `category`, `status`, `year`) VALUES
(4638, 3236, 'datastructure assimilation', 'Database', 'Pending', 3),
(5142, 6891, 'student project tracking system', 'Desktop applications (java $ other technologies)', 'Pending', 3),
(5225, 3236, 'mmust harvesting', 'Web Based (php)', 'Pending', 4),
(6474, 1591, 'hospital management system', 'Desktop applications (java $ other technologies)', 'Pending', 3),
(6518, 1591, 'encryption in RSA', 'Desktop applications (java $ other technologies)', 'Pending', 4),
(9043, 6891, 'mmust evoting', 'Desktop applications (java $ other technologies)', 'Pending', 4);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `studentID` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `year` int(10) NOT NULL,
  `supervisorName` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`studentID`),
  UNIQUE KEY `regno` (`regno`),
  KEY `supervisorID` (`supervisorName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`studentID`, `fname`, `sname`, `regno`, `email`, `password`, `year`, `supervisorName`) VALUES
(1591, 'emmah', 'otieno', 'COM/0039/15', 'emmaculate@yahoo.com', 'EMMAH123', 3, 'james macharia'),
(3236, 'nehemiah', 'cheburet', 'COM/0063/14', 'lemore@gmail.com', 'limo12345', 4, ''),
(6891, 'Geoffrey', 'Kinyuru', 'COM/0004/14', 'jeffmwangih@gmail.com', 'geoffrey1', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `student_supervisor`
--

CREATE TABLE IF NOT EXISTS `student_supervisor` (
  `ID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `supervisorID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `studentID` (`studentID`),
  KEY `supervisorID` (`supervisorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_supervisor`
--

INSERT INTO `student_supervisor` (`ID`, `studentID`, `supervisorID`) VALUES
(6645, 1591, 6905);

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE IF NOT EXISTS `supervisors` (
  `supervisorID` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `domain` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`supervisorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`supervisorID`, `firstname`, `lname`, `domain`, `email`) VALUES
(1789, 'jasper', 'Ondulo', 'Desktop application', 'opiyo7@yahoo.com'),
(3719, 'vincet', 'kamau', 'Android', 'kamau@yahoo.com'),
(3738, 'jeff', 'mmm', 'Android', 'lemore@gmail.com'),
(6905, 'james', 'macharia', 'Database', 'macharia@gmail.com'),
(8372, 'Laban', 'Oenga', 'Desktop applications (java $ other technologies)', 'oenga@gmail.com'),
(9389, 'kevin', 'omieno', 'Desktop applications (java $ other technologies)', 'omieno@gmail.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approvals`
--
ALTER TABLE `approvals`
  ADD CONSTRAINT `approvals_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `registration` (`studentID`),
  ADD CONSTRAINT `approvals_ibfk_2` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`);

--
-- Constraints for table `assessmentdata`
--
ALTER TABLE `assessmentdata`
  ADD CONSTRAINT `project` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`);

--
-- Constraints for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD CONSTRAINT `super` FOREIGN KEY (`supervisorID`) REFERENCES `supervisors` (`supervisorID`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `student` FOREIGN KEY (`studentID`) REFERENCES `registration` (`studentID`);

--
-- Constraints for table `student_supervisor`
--
ALTER TABLE `student_supervisor`
  ADD CONSTRAINT `student_supervisor_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `registration` (`studentID`),
  ADD CONSTRAINT `student_supervisor_ibfk_2` FOREIGN KEY (`supervisorID`) REFERENCES `supervisors` (`supervisorID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
