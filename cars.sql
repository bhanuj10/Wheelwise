-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 08:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cars`
--
CREATE DATABASE IF NOT EXISTS `cars` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cars`;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `car_id` int(5) NOT NULL,
  `car_no` varchar(10) NOT NULL,
  `car_model` varchar(30) NOT NULL,
  `place` varchar(2) NOT NULL,
  `iscab` tinyint(1) NOT NULL DEFAULT 0,
  `booked` tinyint(1) NOT NULL DEFAULT 0,
  `driver_phone` bigint(10) DEFAULT NULL,
  `cost` int(10) NOT NULL,
  `booked_period` timestamp NULL DEFAULT NULL,
  `car_image` varchar(150) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `booked_user` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`car_id`, `car_no`, `car_model`, `place`, `iscab`, `booked`, `driver_phone`, `cost`, `booked_period`, `car_image`, `timestamp`, `booked_user`) VALUES
(1, 'PY14AB2627', 'Audi A6', 'VI', 1, 1, 9678901234, 42000, '2024-06-09 18:17:54', 'PY14AB2627_Audi A6_999134.jpg', '2024-06-09 12:39:59', 0),
(2, 'PY13YZ2425', 'Mercedes-Benz E-Class', 'PY', 0, 1, 0, 38000, '2024-06-09 18:17:50', 'PY13YZ2425_Mercedes-Benz E-Class_585913.jpg', '2024-06-09 12:37:33', 0),
(3, 'PY01AB1234', 'Toyota Camry', 'PY', 1, 0, 9876543210, 30000, NULL, 'PY01AB1234_Toyota Camry_898416.png', '2024-06-09 11:49:51', 0),
(4, 'PY02CD5678', 'Honda Accord', 'VI', 0, 0, 0, 25000, NULL, 'PY02CD5678_Honda Accord_492422.jpeg', '2024-06-09 12:13:40', 0),
(5, 'PY03EF9101', 'Ford Fusion', 'CU', 1, 0, 9123456789, 28000, NULL, 'PY03EF9101_Ford Fusion_666486.jpg', '2024-06-09 12:15:13', 0),
(6, 'PY04GH2345', 'Chevrolet Malibu', 'KA', 0, 0, 0, 27000, NULL, 'PY04GH2345_Chevrolet Malibu_145369.jpg', '2024-06-09 12:17:34', 0),
(7, 'PY05IJ6789', 'Nissan Altima', 'PY', 1, 0, 9234567890, 26000, NULL, 'PY05IJ6789_Nissan Altima_693980.jpg', '2024-06-09 12:18:33', 0),
(8, 'PY06KL1011', 'Hyundai Sonata', 'CU', 0, 0, 0, 24000, NULL, 'PY06KL1011_Hyundai Sonata_404366.jpeg', '2024-06-09 12:19:20', 0),
(9, 'PY07MN1213', 'Kia Optima', 'CU', 1, 0, 9345678901, 22000, NULL, 'PY07MN1213_Kia Optima_185543.jpeg', '2024-06-09 12:25:02', 0),
(10, 'PY08OP1415', 'Subaru Legacy', 'KA', 0, 0, 0, 21000, NULL, 'PY08OP1415_Subaru Legacy_878951.jpg', '2024-06-09 12:27:59', 0),
(11, 'PY09QR1617', 'Mazda 6', 'PY', 1, 0, 9456789012, 20000, NULL, 'PY09QR1617_Mazda 6_361301.jpg', '2024-06-09 12:29:37', 0),
(12, 'PY10ST1819', 'Volkswagen Passat', 'VI', 0, 0, 0, 19000, NULL, 'PY10ST1819_Volkswagen Passat_216494.jpg', '2024-06-09 12:30:47', 0),
(13, 'PY11UV2021', 'Tesla Model 3', 'CU', 1, 0, 9567890123, 35000, NULL, 'PY11UV2021_Tesla Model 3_603896.jpg', '2024-06-09 12:32:36', 0),
(14, 'PY12WX2223', 'BMW 5 Series', 'KA', 0, 0, 0, 40000, NULL, 'PY12WX2223_BMW 5 Series_944732.jpg', '2024-06-09 12:36:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cookie_table`
--

DROP TABLE IF EXISTS `cookie_table`;
CREATE TABLE `cookie_table` (
  `id` int(10) NOT NULL,
  `value` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `id` int(5) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `fn` varchar(30) NOT NULL,
  `ln` varchar(16) DEFAULT NULL,
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) NOT NULL,
  `id` int(11) NOT NULL,
  `user_img` varchar(150) DEFAULT NULL,
  `premium` tinyint(1) NOT NULL DEFAULT 0,
  `phone` bigint(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fn`, `ln`, `user`, `pass`, `id`, `user_img`, `premium`, `phone`, `email`, `address`, `timestamp`, `last_update`) VALUES
('bhanuj', '', 'bhanuj_darks', '12345678', 1, 'bcdb34e12fa89c604a4adffc91a1d15bbhanujdarkskitten.jpg', 0, 7744118800, 'bhanuj@gmail.com', 'Pondicherry', '2024-06-09 10:05:12', '2024-06-09 10:05:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `cookie_table`
--
ALTER TABLE `cookie_table`
  ADD PRIMARY KEY (`value`) USING BTREE;

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `car_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
