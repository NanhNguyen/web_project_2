-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: ictstu-db1.cc.swin.edu.au
-- Generation Time: Apr 03, 2025 at 01:20 AM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s105550018_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `eoi_id` int(11) NOT NULL,
  `job_ref` varchar(5) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `address` varchar(40) NOT NULL,
  `suburb` varchar(40) NOT NULL,
  `state` varchar(50) NOT NULL,
  `postcode` char(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `skills` text,
  `other_skills` text,
  `status` varchar(20) DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`eoi_id`, `job_ref`, `first_name`, `last_name`, `dob`, `gender`, `address`, `suburb`, `state`, `postcode`, `email`, `phone`, `skills`, `other_skills`, `status`) VALUES
(1, 'SE123', 'Nam Anh', 'Nguyen', '02/07/2006', 'male', 'Thai Thinh', 'Hanoi', 'VIC', '1000', 'nguyennamanhb52@gmail.com', '0904778888', 'HTML, CSS, Python', 'Flutter, Dart', 'Final'),
(2, 'DS456', 'Minh Thanh', 'Do', '02/07/2006', 'male', 'Thai Thinh', 'Hanoi', 'WA', '1000', 'abc@gmail.com', '0904778888', 'HTML, CSS', 'Drawing', 'New'),
(4, 'SE123', 'Thanh Vinh', 'Do', '02/04/2006', 'male', 'Rotherhithe', 'Hanoi', 'SA', '1000', 'abc12@gmail.com', '0904778888', 'HTML, CSS', '', 'New'),
(6, 'SE123', 'ABC', 'Nguyen', '01/01/1999', 'male', 'Ohio', 'Hanoi', 'VIC', '1000', 'abc@gmail.com', '0904778888', 'HTML, CSS, Other', 'Ruby, Computer System', 'Current');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`eoi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `eoi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
