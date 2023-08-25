-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Aug 25, 2023 at 10:13 AM
-- Server version: 10.6.12-MariaDB-1:10.6.12+maria~ubu2004-log
-- PHP Version: 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `entities`
--

CREATE TABLE `entities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `healthPoints` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(11) NOT NULL DEFAULT 0,
  `subtype` varchar(255) NOT NULL,
  `illness` tinyint(1) NOT NULL DEFAULT 0,
  `food` int(11) NOT NULL DEFAULT 100,
  `poop` int(11) NOT NULL DEFAULT 0,
  `water` int(11) NOT NULL DEFAULT 100,
  `pee` int(11) NOT NULL DEFAULT 0,
  `asleep` tinyint(1) NOT NULL DEFAULT 0,
  `paddock_id` int(11) DEFAULT NULL,
  `zoo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entities`
--

INSERT INTO `entities` (`id`, `name`, `healthPoints`, `gender`, `age`, `subtype`, `illness`, `food`, `poop`, `water`, `pee`, `asleep`, `paddock_id`, `zoo_id`) VALUES
(1, 'tet', 33, 'male', 0, 'uranus', 0, 100, 0, 100, 0, 0, NULL, NULL),
(2, 'tets', 55, 'male', 0, 'uranus', 0, 100, 0, 100, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paddocks`
--

CREATE TABLE `paddocks` (
  `id` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `spot` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `cleanliness` int(11) NOT NULL,
  `zoo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `login`, `password`, `register_date`) VALUES
(1, 'BZ', 'elon228', '$2y$10$YBO/Cuopi39vO.3zI7f3f.a83Mrp5iesOZv5CaEDID9789Rgbz1pq', '2023-08-23');

-- --------------------------------------------------------

--
-- Table structure for table `zoo`
--

CREATE TABLE `zoo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL DEFAULT 2,
  `currentDay` int(11) NOT NULL DEFAULT 1,
  `zookeeper_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zookeepers`
--

CREATE TABLE `zookeepers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `money` int(11) DEFAULT 0,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entities`
--
ALTER TABLE `entities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paddock_id` (`paddock_id`),
  ADD KEY `zoo_id` (`zoo_id`);

--
-- Indexes for table `paddocks`
--
ALTER TABLE `paddocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zoo_id` (`zoo_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Indexes for table `zoo`
--
ALTER TABLE `zoo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zookeeper_id` (`zookeeper_id`);

--
-- Indexes for table `zookeepers`
--
ALTER TABLE `zookeepers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entities`
--
ALTER TABLE `entities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paddocks`
--
ALTER TABLE `paddocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zoo`
--
ALTER TABLE `zoo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zookeepers`
--
ALTER TABLE `zookeepers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entities`
--
ALTER TABLE `entities`
  ADD CONSTRAINT `entities_ibfk_1` FOREIGN KEY (`paddock_id`) REFERENCES `paddocks` (`id`),
  ADD CONSTRAINT `entities_ibfk_2` FOREIGN KEY (`zoo_id`) REFERENCES `zoo` (`id`);

--
-- Constraints for table `paddocks`
--
ALTER TABLE `paddocks`
  ADD CONSTRAINT `paddocks_ibfk_1` FOREIGN KEY (`zoo_id`) REFERENCES `zoo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zoo`
--
ALTER TABLE `zoo`
  ADD CONSTRAINT `zoo_ibfk_1` FOREIGN KEY (`zookeeper_id`) REFERENCES `zookeepers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zookeepers`
--
ALTER TABLE `zookeepers`
  ADD CONSTRAINT `zookeepers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
