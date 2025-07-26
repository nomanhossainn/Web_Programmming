-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 16, 2025 at 09:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `hire_date` date NOT NULL,
  `job_id` varchar(15) NOT NULL,
  `salary` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`email`, `phone`, `hire_date`, `job_id`, `salary`) VALUES
('SKING', '515.123.4567', '1987-06-17', 'AD_PRES', 34867),
('NKPCHHAR', '515.123.4568', '1987-06-18', 'AD_VP', 13770),
('LDEHAAN', '515.123.4569', '1987-06-19', 'AD_VP', 13770),
('AHUNOLD', '515.123.4567', '1987-06-20', 'IT_PROG', 10890),
('BERNST', '515.423.4568', '1987-06-21', 'IT_PROG', 7260),
('DAUSTIN', '515.423.4569', '1987-06-22', 'IT_PROG', 5808),
('VPATABAL', '515.423.4560', '1987-06-23', 'IT_PROG', 5808),
('DLORENTZ', '515.423.5567', '1987-06-24', 'IT_PROG', 8245);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
