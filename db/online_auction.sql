-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 05:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidding`
--

CREATE TABLE `bidding` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `bid_price` decimal(10,0) NOT NULL,
  `details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidding`
--

INSERT INTO `bidding` (`id`, `user_id`, `product_id`, `datetime`, `bid_price`, `details`) VALUES
(1, 2, 10, '2024-05-15 14:29:09', '300', NULL),
(2, 2, 10, '2024-05-15 14:30:05', '300', NULL),
(3, 2, 10, '2024-05-15 14:31:37', '300', NULL),
(4, 2, 10, '2024-05-15 14:42:43', '300', NULL),
(5, 2, 10, '2024-05-15 14:43:21', '300', NULL),
(6, 2, 10, '2024-05-15 14:44:17', '300', NULL),
(7, 2, 10, '2024-05-15 14:44:53', '300', NULL),
(8, 1, 10, '2024-05-15 14:47:37', '300', NULL),
(9, 1, 10, '2024-05-15 14:48:12', '300', NULL),
(10, 1, 9, '2024-05-15 14:49:12', '2334', NULL),
(11, 1, 10, '2024-05-15 14:53:27', '400', NULL),
(12, 2, 10, '2024-05-15 14:55:16', '500', NULL),
(13, 1, 10, '2024-05-15 14:56:08', '600', NULL),
(14, 2, 10, '2024-05-15 14:57:23', '700', NULL),
(15, 1, 10, '2024-05-15 14:57:30', '800', NULL),
(16, 1, 9, '2024-05-15 14:57:44', '2434', NULL),
(17, 2, 9, '2024-05-15 14:57:59', '2534', NULL),
(18, 2, 9, '2024-05-15 14:58:05', '2634', NULL),
(19, 1, 10, '2024-05-15 15:00:47', '900', NULL),
(20, 2, 10, '2024-05-15 15:00:53', '1000', NULL),
(21, 2, 9, '2024-05-15 15:01:13', '2734', NULL),
(22, 2, 9, '2024-05-15 15:01:19', '2834', NULL),
(23, 1, 9, '2024-05-15 15:01:23', '2934', NULL),
(24, 1, 10, '2024-05-15 15:01:40', '1100', NULL),
(25, 2, 10, '2024-05-15 15:03:56', '1200', NULL),
(26, 1, 10, '2024-05-15 15:04:02', '1300', NULL),
(27, 1, 9, '2024-05-15 15:04:20', '3034', NULL),
(28, 2, 9, '2024-05-15 15:04:25', '3134', NULL),
(29, 2, 10, '2024-05-15 15:07:03', '1400', NULL),
(30, 1, 10, '2024-05-15 15:07:10', '1500', NULL),
(31, 1, 9, '2024-05-15 15:07:22', '3234', NULL),
(32, 2, 9, '2024-05-15 15:07:33', '3334', NULL),
(33, 1, 9, '2024-05-15 15:07:39', '3434', NULL),
(34, 2, 9, '2024-05-15 15:07:48', '3534', NULL),
(35, 1, 10, '2024-05-15 15:07:52', '1600', NULL),
(36, 2, 10, '2024-05-15 15:09:22', '1700', NULL),
(37, 1, 10, '2024-05-15 15:09:27', '1800', NULL),
(38, 2, 9, '2024-05-15 15:09:44', '3634', NULL),
(39, 1, 9, '2024-05-15 15:09:53', '3734', NULL),
(40, 1, 9, '2024-05-15 15:09:57', '3834', NULL),
(41, 1, 9, '2024-05-15 15:10:00', '3934', NULL),
(42, 1, 10, '2024-05-15 15:10:09', '1900', NULL),
(43, 2, 10, '2024-05-15 15:10:17', '2000', NULL),
(44, 2, 10, '2024-05-15 15:19:33', '2100', NULL),
(45, 1, 10, '2024-05-15 15:19:39', '2200', NULL),
(46, 1, 9, '2024-05-15 15:19:56', '4034', NULL),
(47, 2, 9, '2024-05-15 15:20:10', '4134', NULL),
(48, 2, 9, '2024-05-15 15:20:15', '4234', NULL),
(49, 1, 10, '2024-05-15 15:20:24', '2300', NULL),
(50, 2, 9, '2024-05-15 15:20:26', '4334', NULL),
(51, 2, 9, '2024-05-15 15:20:29', '4434', NULL),
(52, 2, 10, '2024-05-15 17:32:50', '2400', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bidding_control`
--

CREATE TABLE `bidding_control` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `start_time` datetime NOT NULL DEFAULT current_timestamp(),
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidding_control`
--

INSERT INTO `bidding_control` (`id`, `product_id`, `start_time`, `end_time`) VALUES
(3, 10, '2024-05-13 14:00:00', '2024-05-15 10:20:00'),
(4, 10, '2024-05-15 02:24:40', '2024-05-15 02:39:40'),
(5, 10, '2024-05-15 02:29:09', '2024-05-15 02:44:09'),
(6, 10, '2024-05-15 02:30:05', '2024-05-15 02:45:05'),
(7, 10, '2024-05-15 02:31:37', '2024-05-15 14:45:00'),
(8, 10, '2024-05-15 02:42:43', '2024-05-15 02:57:43'),
(9, 10, '2024-05-15 14:43:21', '2024-05-15 14:58:21'),
(10, 10, '2024-05-15 14:44:17', '2024-05-15 14:59:17'),
(11, 10, '2024-05-15 14:44:53', '2024-05-15 14:59:53'),
(12, 10, '2024-05-15 14:47:37', '2024-05-15 15:02:37'),
(13, 10, '2024-05-15 14:48:12', '2024-05-15 15:03:12'),
(14, 9, '2024-05-15 14:49:12', '2024-05-15 15:04:12'),
(15, 10, '2024-05-15 14:53:27', '2024-05-15 15:08:27'),
(16, 10, '2024-05-15 14:55:16', '2024-05-15 15:10:16'),
(17, 10, '2024-05-15 14:56:08', '2024-05-15 15:11:08'),
(18, 10, '2024-05-15 14:57:23', '2024-05-15 15:12:23'),
(19, 10, '2024-05-15 14:57:30', '2024-05-15 15:12:30'),
(20, 9, '2024-05-15 14:57:44', '2024-05-15 15:12:44'),
(21, 9, '2024-05-15 14:57:59', '2024-05-15 15:12:59'),
(22, 9, '2024-05-15 14:58:05', '2024-05-15 15:13:05'),
(23, 10, '2024-05-15 15:00:47', '2024-05-15 15:15:47'),
(24, 10, '2024-05-15 15:00:53', '2024-05-15 15:15:53'),
(25, 9, '2024-05-15 15:01:13', '2024-05-15 15:16:13'),
(26, 9, '2024-05-15 15:01:19', '2024-05-15 15:16:19'),
(27, 9, '2024-05-15 15:01:23', '2024-05-15 15:16:23'),
(28, 10, '2024-05-15 15:01:40', '2024-05-15 15:16:40'),
(29, 10, '2024-05-15 15:03:56', '2024-05-15 15:18:56'),
(30, 10, '2024-05-15 15:04:02', '2024-05-15 15:19:02'),
(31, 9, '2024-05-15 15:04:20', '2024-05-15 15:19:20'),
(32, 9, '2024-05-15 15:04:25', '2024-05-15 15:19:25'),
(33, 10, '2024-05-15 15:07:03', '2024-05-15 15:22:03'),
(34, 10, '2024-05-15 15:07:10', '2024-05-15 15:22:10'),
(35, 9, '2024-05-15 15:07:22', '2024-05-15 15:22:22'),
(36, 9, '2024-05-15 15:07:33', '2024-05-15 15:22:33'),
(37, 9, '2024-05-15 15:07:39', '2024-05-15 15:22:39'),
(38, 9, '2024-05-15 15:07:48', '2024-05-15 15:22:48'),
(39, 10, '2024-05-15 15:07:52', '2024-05-15 15:22:52'),
(40, 10, '2024-05-15 15:09:22', '2024-05-15 15:24:22'),
(41, 10, '2024-05-15 15:09:27', '2024-05-15 15:24:27'),
(42, 9, '2024-05-15 15:09:44', '2024-05-15 15:24:44'),
(43, 9, '2024-05-15 15:09:53', '2024-05-15 15:24:53'),
(44, 9, '2024-05-15 15:09:57', '2024-05-15 15:24:57'),
(45, 9, '2024-05-15 15:10:00', '2024-05-15 15:25:00'),
(46, 10, '2024-05-15 15:10:09', '2024-05-15 15:25:09'),
(47, 10, '2024-05-15 15:10:17', '2024-05-15 15:25:17'),
(48, 10, '2024-05-15 15:19:33', '2024-05-15 15:34:33'),
(49, 10, '2024-05-15 15:19:39', '2024-05-15 15:34:39'),
(50, 9, '2024-05-15 15:19:56', '2024-05-15 15:34:56'),
(51, 9, '2024-05-15 15:20:10', '2024-05-15 15:35:10'),
(52, 9, '2024-05-15 15:20:15', '2024-05-15 15:35:15'),
(53, 10, '2024-05-15 15:20:24', '2024-05-15 15:35:24'),
(54, 9, '2024-05-15 15:20:26', '2024-05-15 15:35:26'),
(55, 9, '2024-05-15 15:20:29', '2024-05-15 15:35:29'),
(56, 10, '2024-05-15 17:32:50', '2024-05-15 17:47:50'),
(57, 6, '2024-05-15 15:01:19', '2024-05-16 10:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `preference` enum('like','dislike') NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`id`, `user_id`, `product_id`, `preference`, `datetime`) VALUES
(1, 2, 1, 'like', '2024-03-14 19:05:11'),
(2, 2, 3, 'like', '2024-03-14 20:10:39'),
(3, 2, 4, 'dislike', '2024-03-19 12:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  `details` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `image_url` varchar(128) NOT NULL,
  `base_price` decimal(10,0) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `auction_date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `details`, `type`, `image_url`, `base_price`, `datetime`, `auction_date`, `status`) VALUES
(1, 1, 'fdjggjh', 'fegghe', 3, '1710136277-833.jpg', '2344', '2024-03-11 11:21:17', '2024-05-14 14:45:40', 0),
(2, 1, 'j.jona lasan', 'kya hi details hai', 2, '1710136704-474.jpg', '2344', '2024-03-11 11:28:24', '2024-05-13 00:00:00', 0),
(3, 2, 'House', 'This is my house', 3, '1710217371-192.jpg', '10', '2024-03-12 09:52:51', '2024-05-04 00:00:00', 4),
(4, 3, 'Ashish bro ', 'details bata do', 4, '1710222305-984.jpg', '10000', '2024-03-12 11:15:05', '2024-05-15 00:00:00', 3),
(5, 2, 'ahgdghg', 'djfhfjhfhfbfb', 2, '1715508221-442.jpg', '1234', '2024-05-12 15:33:41', '2024-05-14 03:19:00', 0),
(6, 2, 'just check 2', 'mcdjjvhjv', 3, '1715508459-713.jpg', '2334', '2024-05-12 15:37:39', '2024-05-14 03:37:00', 2),
(7, 2, 'just check 2', 'mcdjjvhjv', 3, '1715508503-951.jpg', '2334', '2024-05-12 15:38:23', '2024-05-14 03:37:00', 0),
(8, 2, 'just check 2', 'mcdjjvhjv', 3, '1715508537-204.jpg', '2334', '2024-05-12 15:38:57', '2024-05-14 03:37:00', 4),
(9, 2, 'just check 2', 'mcdjjvhjv', 3, '1715508643-607.jpg', '2334', '2024-05-12 15:40:43', '2024-05-14 03:37:00', 1),
(10, 3, 'tygefgdgv', 'jbvbfjb', 3, '1715509358-229.jpg', '300', '2024-05-12 15:52:38', '2024-05-14 14:25:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `type`) VALUES
(1, 'Vehicle'),
(2, 'Clothes '),
(3, 'Home '),
(4, 'Mobile');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `product_id`, `description`, `status`) VALUES
(1, 2, 4, 'g ha', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `datetime` datetime NOT NULL,
  `sold_price` decimal(10,0) NOT NULL,
  `details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `product_id`, `datetime`, `sold_price`, `details`) VALUES
(1, 2, 10, '2024-05-15 17:47:50', '2400', NULL),
(2, 2, 9, '2024-05-15 15:35:29', '4434', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `gender` enum('male','female','others') DEFAULT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `address` varchar(256) DEFAULT NULL,
  `phone` bigint(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `photo` varchar(256) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `email`, `password`, `address`, `phone`, `dob`, `photo`) VALUES
(1, 'kishan kumar', NULL, 'bkuchh28@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 0, NULL, 'default.jpg'),
(2, 'aman', 'male', 'kishan6436@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'semra , mairwa', 7374667567, '0000-00-00', 'default.jpg'),
(3, 'ashish', NULL, 'dikukumar55@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, '1710222166-3004.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidding`
--
ALTER TABLE `bidding`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bidding_user_index` (`user_id`),
  ADD KEY `bidding_product_index` (`product_id`);

--
-- Indexes for table `bidding_control`
--
ALTER TABLE `bidding_control`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_name_index` (`name`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `transection_product_index` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `name_index` (`name`),
  ADD KEY `email_index` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidding`
--
ALTER TABLE `bidding`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `bidding_control`
--
ALTER TABLE `bidding_control`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bidding`
--
ALTER TABLE `bidding`
  ADD CONSTRAINT `bidding_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bidding_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `preferences`
--
ALTER TABLE `preferences`
  ADD CONSTRAINT `preferences_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `preferences_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
