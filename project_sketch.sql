-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306:4306
-- Generation Time: Oct 06, 2022 at 03:37 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_sketch`
--

-- --------------------------------------------------------

--
-- Table structure for table `sketc`
--

CREATE TABLE `sketc` (
  `id_sketch` int(11) NOT NULL,
  `cost` float NOT NULL,
  `energy` float NOT NULL,
  `cost_ds` float NOT NULL,
  `energy_ds` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `available_balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sketc`
--

INSERT INTO `sketc` (`id_sketch`, `cost`, `energy`, `cost_ds`, `energy_ds`, `created_at`, `status`, `available_balance`) VALUES
(0, 0, 0, 0, 0, '2022-10-05 21:04:17', 0, 0),
(1, 0, 0, 0, 0, '2022-10-05 21:04:34', 0, 0),
(2, 0, 0, 0, 0, '2022-10-06 06:02:02', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `id_energy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `is_admin`, `name`, `id_energy`) VALUES
(1, 'ahmed98', '123456', 1, 'Ahmed Mohammed', 0),
(2, 'ali77', '123456', 0, 'Ali Najeeb', 1),
(3, 'motaz2022', '123456', 0, 'Motaz Ahmed', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sketc`
--
ALTER TABLE `sketc`
  ADD PRIMARY KEY (`id_sketch`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD KEY `id_energy_fk` (`id_energy`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_energy`) REFERENCES `sketc` (`id_sketch`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
