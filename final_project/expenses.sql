-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 04:24 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expenses`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employeeID` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lastName` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employeeID`, `firstName`, `lastName`) VALUES
(1, 'Malachi', 'Maenle'),
(2, 'Daniel', 'Maenle');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expensesID` int(10) UNSIGNED NOT NULL,
  `employeeID` int(10) UNSIGNED NOT NULL,
  `amount` decimal(18,2) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` enum('tolls','gas','food','accommodations','mileage','entertainment','car expenses','car rental','personal') NOT NULL,
  `paymentMethod` enum('cash','credit','debit') NOT NULL,
  `reimbursable` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expensesID`, `employeeID`, `amount`, `date`, `description`, `category`, `paymentMethod`, `reimbursable`) VALUES
(1, 1, '1.00', '2023-03-03', 'e', 'gas', 'credit', 1),
(2, 1, '2.00', '2023-05-09', 'e', 'gas', 'cash', 0),
(3, 1, '2.00', '2023-05-09', 'e', 'gas', 'cash', 0),
(4, 1, '2.00', '2023-05-09', 'e', 'gas', 'cash', 0),
(5, 1, '2.00', '2023-05-09', 'e', 'gas', 'cash', 0),
(6, 1, '2.00', '2023-05-09', 'e', 'gas', 'cash', 0),
(7, 1, '0.00', '2023-05-09', '1', 'tolls', 'cash', 0),
(8, 1, '0.00', '2023-05-09', '1', 'tolls', 'cash', 0),
(9, 1, '0.00', '2023-05-09', '1', 'tolls', 'cash', 0),
(21, 1, '0.00', '2023-05-09', '3', 'gas', 'credit', 0),
(22, 2, '56.00', '2023-05-09', 'r', 'food', 'credit', 0),
(23, 1, '72.76', '2023-05-10', 'test', 'car rental', 'debit', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employeeID`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expensesID`),
  ADD KEY `employeeID` (`employeeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employeeID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expensesID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `employeeID` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
