-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: ictstu-db1.cc.swin.edu.au
-- Generation Time: Apr 03, 2025 at 01:23 AM
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `reference_number` varchar(10) DEFAULT NULL,
  `position_title` varchar(100) DEFAULT NULL,
  `brief_description` text,
  `salary_min` int(11) DEFAULT NULL,
  `salary_max` int(11) DEFAULT NULL,
  `reports_to` varchar(100) DEFAULT NULL,
  `responsibilities` text,
  `essential_qualifications` text,
  `preferable_qualifications` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `reference_number`, `position_title`, `brief_description`, `salary_min`, `salary_max`, `reports_to`, `responsibilities`, `essential_qualifications`, `preferable_qualifications`) VALUES
(1, 'SE123', 'Software Engineer', 'We are looking for a skilled Software Engineer to join our dynamic team...', 80000, 120000, 'Lead Software Engineer', '- Develop and maintain software applications\n- Collaborate with cross-functional teams\n- Write clean, scalable code\n- Participate in code reviews\n- Troubleshoot and debug applications', '- Bachelor\'s degree in Computer Science or related field\n- 3+ years of experience in software development\n- Proficiency in Java, Python, or C++\n- Strong problem-solving skills', '- Experience with cloud technologies\n- Knowledge of Agile methodologies\n- Excellent communication skills'),
(2, 'DS456', 'Data Scientist', 'We are seeking a Data Scientist to analyze large amounts of raw information...', 90000, 130000, 'Chief Data Officer', '- Identify valuable data sources and automate collection processes\n- Analyze large amounts of information\n- Build predictive models\n- Present information using data visualization\n- Collaborate with engineering and product development', '- Bachelor\'s degree in Data Science, Computer Science\n- 2+ years of experience as a Data Scientist\n- Experience with data mining\n- Proficiency in R, SQL, and Python', '- Experience with machine learning\n- Knowledge of visualization tools (e.g., Tableau)\n- Strong analytical and problem-solving skills'),
(3, 'CS789', 'Cyber Security Specialist', 'We are looking for a Cyber Security Specialist to protect our systems and data...', 85000, 125000, 'Chief Information Security Officer', '- Develop and implement security policies\n- Monitor and respond to incidents\n- Conduct assessments and audits\n- Collaborate with IT\n- Provide training and awareness programs', '- Bachelor\'s degree in Cyber Security\n- 3+ years experience in cyber security\n- Proficiency in security tools\n- Strong problem-solving skills', '- Experience with cloud security\n- Knowledge of compliance standards (ISO 27001, NIST)\n- Excellent communication skills');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
