-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 11, 2025 at 03:16 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eaa_sports`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `court_id` int UNSIGNED NOT NULL,
  `booking_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `total_price` decimal(12,2) NOT NULL,
  `status` varchar(20) DEFAULT 'Belum Diproses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `court_id`, `booking_date`, `start_time`, `end_time`, `total_price`, `status`) VALUES
(14, 10, 1, '2025-09-01', '10:00:00', '14:00:00', '360000.00', 'Sudah Diproses'),
(15, 11, 1, '2025-09-07', '13:00:00', '15:00:00', '180000.00', 'Diproses'),
(16, 11, 1, '2025-09-02', '22:00:00', '23:00:00', '90000.00', 'Belum Diproses'),
(17, 11, 1, '2025-09-05', '08:00:00', '18:00:00', '900000.00', 'Belum Diproses'),
(18, 12, 3, '2025-09-05', '12:00:00', '15:00:00', '270000.00', 'Diproses'),
(19, 12, 2, '2025-09-01', '11:00:00', '22:00:00', '990000.00', 'Diproses'),
(20, 12, 4, '2025-09-01', '13:00:00', '20:00:00', '630000.00', 'Sudah Diproses'),
(21, 13, 3, '2025-09-06', '10:00:00', '20:00:00', '900000.00', 'Sudah Diproses'),
(22, 15, 1, '2025-09-01', '16:00:00', '18:00:00', '180000.00', 'Belum Diproses'),
(23, 15, 1, '2025-09-01', '20:00:00', '22:00:00', '180000.00', 'Belum Diproses');

-- --------------------------------------------------------

--
-- Table structure for table `courts`
--

CREATE TABLE `courts` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `price_per_hour` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courts`
--

INSERT INTO `courts` (`id`, `name`, `location`, `price_per_hour`) VALUES
(1, 'Futsal', 'Sutoyo', '90000.00'),
(2, 'Basket', 'Sutoyo', '90000.00'),
(3, 'Badminton', 'Sutoyo', '90000.00'),
(4, 'Voli', 'Sutoyo', '90000.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(10, 'abc@gmail.com', '$2y$10$K2w46t.vzblgfjiTj4Opn.ePDhejzLr.8FzqxZuiX7bZ2IE7kaOcS', 'user'),
(11, 'agus@abcd', '$2y$10$njI9uf0Vs6S64EYYFv9WPuKXRYwY0KqeyvQJeIzCjyZVQqUQaDEv.', 'user'),
(12, '135@gmail.com', '$2y$10$uRf.lL5yDzHWdL0TZ2Bp/.9xBj1nbl6QiZ7Q92n2kAC.lYjuitr8G', 'user'),
(13, 'abok@gmail.com', '$2y$10$XdvTztU6ZKO.shfRD9OwluD2c6JmtXhxBavOTLicxQWu7mNoFO7ti', 'user'),
(14, 'admin@gmail.com', '$2y$10$lOPpzDYPYJEvFCU6uXXldeEipzphhK8btFCBFPTR0HReZ1/8KaXzm', 'admin'),
(15, 'axelle@gmail.com', '$2y$10$zhfOocZ5PbiamA.hclxVJOdqsXhdGGNY/AkxJ5PHicUW9k5YljY8O', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `court_id` (`court_id`);

--
-- Indexes for table `courts`
--
ALTER TABLE `courts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `courts`
--
ALTER TABLE `courts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`court_id`) REFERENCES `courts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
