-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220522.7701cd71da
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2022 at 02:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_sketch2`
--

-- --------------------------------------------------------

--
-- Table structure for table `sketc`
--

CREATE TABLE `sketc` (
  `id` int(11) NOT NULL,
  `cost` float DEFAULT NULL,
  `energy` float DEFAULT NULL,
  `cost_ds` int(11) DEFAULT NULL,
  `energy_ds` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `user_id` int(11) DEFAULT NULL,
  `available_balance` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sketc`
--

INSERT INTO `sketc` (`id`, `cost`, `energy`, `cost_ds`, `energy_ds`, `created_at`, `status`, `user_id`, `available_balance`) VALUES
(1, 6222, 6940, NULL, 698, '2022-10-07 00:16:55', 0, 1, 17.777142857143);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `is_admin`, `name`) VALUES
(1, 'ahmed98', '123123', 1, 'Ahmed Mohammed\r\n'),
(2, 'ali77', '123123', 0, 'Ali Najeeb\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sketc`
--
ALTER TABLE `sketc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_uid_skect` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sketc`
--
ALTER TABLE `sketc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sketc`
--
ALTER TABLE `sketc`
  ADD CONSTRAINT `user_uid_skect` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



