-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2021 at 08:21 PM
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
-- Database: `hacks`
--

-- --------------------------------------------------------

--
-- Table structure for table `committee_department`
--

CREATE TABLE `committee_department` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `did` int(255) NOT NULL,
  `committee_head` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `did` int(255) NOT NULL,
  `dname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events_society`
--

CREATE TABLE `events_society` (
  `id` int(255) NOT NULL,
  `sid` int(255) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `arranged_by` varchar(255) NOT NULL,
  `approved_by` varchar(255) DEFAULT NULL,
  `summary` text NOT NULL,
  `edate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event_faculty`
--

CREATE TABLE `event_faculty` (
  `id` int(255) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `arranged_by` varchar(255) NOT NULL,
  `approved_by` varchar(255) DEFAULT NULL,
  `department` int(255) NOT NULL,
  `summary` text NOT NULL,
  `edate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event_sbodies`
--

CREATE TABLE `event_sbodies` (
  `id` int(255) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `sbid` int(255) NOT NULL,
  `arranged_by` varchar(255) NOT NULL,
  `faculty_approved` varchar(255) DEFAULT NULL,
  `summary` text NOT NULL,
  `edate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `eid` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `depid` int(100) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `last_active` timestamp NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(255) NOT NULL,
  `cid` int(255) NOT NULL,
  `fid` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reg_dept`
--

CREATE TABLE `reg_dept` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `stud_id` varchar(255) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reg_sbody`
--

CREATE TABLE `reg_sbody` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `stud_id` varchar(255) NOT NULL,
  `sbody_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reg_society`
--

CREATE TABLE `reg_society` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `stud_id` varchar(255) NOT NULL,
  `society_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `societies`
--

CREATE TABLE `societies` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mid` varchar(255) NOT NULL,
  `staff_incharge` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `uid` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` int(10) DEFAULT 0,
  `branch` varchar(255) NOT NULL,
  `regyear` int(100) NOT NULL,
  `photo` blob NOT NULL,
  `password` varchar(100) NOT NULL,
  `lastactive` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_bodies`
--

CREATE TABLE `student_bodies` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `faculty_head` varchar(255) NOT NULL,
  `general_secretary` varchar(255) DEFAULT NULL,
  `senior_deputy` varchar(255) DEFAULT NULL,
  `junior_deputy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `id` int(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id`, `uname`, `email`, `password`) VALUES
(1, 'admin', 'PKwebogb31xdCu4J7EUv', '$2y$10$Pr82KvKNHBkg7nQkGiWUS.GzZLHoTJ62mNTeWUMEgo7Kkshi39hBC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `committee_department`
--
ALTER TABLE `committee_department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkey16` (`did`),
  ADD KEY `fkey18` (`committee_head`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `events_society`
--
ALTER TABLE `events_society`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkey13` (`approved_by`),
  ADD KEY `fkey14` (`arranged_by`),
  ADD KEY `fkey15` (`sid`);

--
-- Indexes for table `event_faculty`
--
ALTER TABLE `event_faculty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkey10` (`department`),
  ADD KEY `fkey11` (`approved_by`),
  ADD KEY `fkey12` (`arranged_by`);

--
-- Indexes for table `event_sbodies`
--
ALTER TABLE `event_sbodies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkey7` (`sbid`),
  ADD KEY `fkey8` (`arranged_by`),
  ADD KEY `fkey9` (`faculty_approved`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `fkey1` (`depid`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkey19` (`cid`),
  ADD KEY `fkey20` (`fid`);

--
-- Indexes for table `reg_dept`
--
ALTER TABLE `reg_dept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg_sbody`
--
ALTER TABLE `reg_sbody`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg_society`
--
ALTER TABLE `reg_society`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `societies`
--
ALTER TABLE `societies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkey6` (`mid`),
  ADD KEY `fkey22` (`staff_incharge`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `student_bodies`
--
ALTER TABLE `student_bodies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkey2` (`faculty_head`),
  ADD KEY `fkey3` (`general_secretary`),
  ADD KEY `fkey4` (`junior_deputy`),
  ADD KEY `fkey5` (`senior_deputy`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `committee_department`
--
ALTER TABLE `committee_department`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `did` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events_society`
--
ALTER TABLE `events_society`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_faculty`
--
ALTER TABLE `event_faculty`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `event_sbodies`
--
ALTER TABLE `event_sbodies`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reg_dept`
--
ALTER TABLE `reg_dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reg_sbody`
--
ALTER TABLE `reg_sbody`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reg_society`
--
ALTER TABLE `reg_society`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `societies`
--
ALTER TABLE `societies`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_bodies`
--
ALTER TABLE `student_bodies`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `committee_department`
--
ALTER TABLE `committee_department`
  ADD CONSTRAINT `fkey16` FOREIGN KEY (`did`) REFERENCES `department` (`did`),
  ADD CONSTRAINT `fkey18` FOREIGN KEY (`committee_head`) REFERENCES `faculty` (`eid`);

--
-- Constraints for table `events_society`
--
ALTER TABLE `events_society`
  ADD CONSTRAINT `fkey13` FOREIGN KEY (`approved_by`) REFERENCES `faculty` (`eid`),
  ADD CONSTRAINT `fkey14` FOREIGN KEY (`arranged_by`) REFERENCES `student` (`uid`),
  ADD CONSTRAINT `fkey15` FOREIGN KEY (`sid`) REFERENCES `societies` (`id`);

--
-- Constraints for table `event_faculty`
--
ALTER TABLE `event_faculty`
  ADD CONSTRAINT `fkey10` FOREIGN KEY (`department`) REFERENCES `department` (`did`),
  ADD CONSTRAINT `fkey11` FOREIGN KEY (`approved_by`) REFERENCES `faculty` (`eid`),
  ADD CONSTRAINT `fkey12` FOREIGN KEY (`arranged_by`) REFERENCES `faculty` (`eid`);

--
-- Constraints for table `event_sbodies`
--
ALTER TABLE `event_sbodies`
  ADD CONSTRAINT `fkey7` FOREIGN KEY (`sbid`) REFERENCES `student_bodies` (`id`),
  ADD CONSTRAINT `fkey8` FOREIGN KEY (`arranged_by`) REFERENCES `student` (`uid`),
  ADD CONSTRAINT `fkey9` FOREIGN KEY (`faculty_approved`) REFERENCES `faculty` (`eid`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `fkey1` FOREIGN KEY (`depid`) REFERENCES `department` (`did`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `fkey19` FOREIGN KEY (`cid`) REFERENCES `committee_department` (`id`),
  ADD CONSTRAINT `fkey20` FOREIGN KEY (`fid`) REFERENCES `faculty` (`eid`);

--
-- Constraints for table `societies`
--
ALTER TABLE `societies`
  ADD CONSTRAINT `fkey22` FOREIGN KEY (`staff_incharge`) REFERENCES `faculty` (`eid`),
  ADD CONSTRAINT `fkey6` FOREIGN KEY (`mid`) REFERENCES `student` (`uid`);

--
-- Constraints for table `student_bodies`
--
ALTER TABLE `student_bodies`
  ADD CONSTRAINT `fkey2` FOREIGN KEY (`faculty_head`) REFERENCES `faculty` (`eid`),
  ADD CONSTRAINT `fkey3` FOREIGN KEY (`general_secretary`) REFERENCES `student` (`uid`),
  ADD CONSTRAINT `fkey4` FOREIGN KEY (`junior_deputy`) REFERENCES `student` (`uid`),
  ADD CONSTRAINT `fkey5` FOREIGN KEY (`senior_deputy`) REFERENCES `student` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
