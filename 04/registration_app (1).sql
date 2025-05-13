-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2024 at 10:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `fuel_types`
--

CREATE TABLE `fuel_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fuel_types`
--

INSERT INTO `fuel_types` (`id`, `name`) VALUES
(1, 'gasoline'),
(2, 'diesel'),
(3, 'electric');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `name`) VALUES
(1, 'Opel Astra'),
(8, 'Golf 5'),
(9, 'Golf 7');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `vehicle_model_id` int(11) NOT NULL,
  `vehicle_type_id` int(11) NOT NULL,
  `vehicle_chassis_number` varchar(255) NOT NULL,
  `vehicle_production_year` year(4) NOT NULL,
  `registration_number` varchar(255) NOT NULL,
  `fuel_type_id` int(11) NOT NULL,
  `registration_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `vehicle_model_id`, `vehicle_type_id`, `vehicle_chassis_number`, `vehicle_production_year`, `registration_number`, `fuel_type_id`, `registration_to`) VALUES
(1, 1, 3, 'r235rf3', '2024', 'SK-3355-AU', 2, '2024-12-02'),
(2, 1, 3, 'r235rf3', '2021', 'SK-3355-AB', 2, '2024-12-02'),
(3, 8, 2, 'zcz4z4z4', '2024', 'AA-1234-BB', 2, '2005-07-08'),
(4, 9, 2, 'zcz4z4z4', '2023', 'AA-1234-CC', 1, '2026-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(0, 'admin', '$2y$10$lVXCCkiIJLJnJG3KGeT0tOcRkR2HnyFJoR4uk0kFYMO5p1rHPPoxS');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_type`
--

CREATE TABLE `vehicle_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_type`
--

INSERT INTO `vehicle_type` (`id`, `name`) VALUES
(1, 'sedan'),
(2, 'coupe'),
(3, 'hatchback'),
(4, 'suv'),
(5, 'minivan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fuel_types`
--
ALTER TABLE `fuel_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fuel_type_id` (`fuel_type_id`),
  ADD KEY `vehicle_model_id` (`vehicle_model_id`),
  ADD KEY `vehicle_type_id` (`vehicle_type_id`);

--
-- Indexes for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fuel_types`
--
ALTER TABLE `fuel_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`fuel_type_id`) REFERENCES `fuel_types` (`id`),
  ADD CONSTRAINT `registration_ibfk_2` FOREIGN KEY (`vehicle_model_id`) REFERENCES `models` (`id`),
  ADD CONSTRAINT `registration_ibfk_3` FOREIGN KEY (`vehicle_type_id`) REFERENCES `vehicle_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
