-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 10:23 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'Sohan', 'sohan1234');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `id` int(30) NOT NULL,
  `book_date` varchar(100) NOT NULL,
  `book_status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `user_id`, `id`, `book_date`, `book_status`) VALUES
(1, 39, 6, '2023-08-16', '1'),
(3, 39, 6, '2023-08-24', ''),
(4, 39, 7, '2023-09-26', ''),
(5, 39, 7, '2023-09-26', '');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(30) NOT NULL,
  `no` varchar(200) NOT NULL,
  `name` varchar(300) NOT NULL,
  `price` varchar(100) NOT NULL,
  `place` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `book_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `no`, `name`, `price`, `place`, `image`, `book_status`) VALUES
(6, '1', 'Toyota', '3000', 'Gaindakot-01,Nawalpur', 'image/car4.png', 1),
(7, '2', 'Jaguar', '3000', 'Bharatpur-10,Chitwan', 'image/car1.jpg', 0),
(8, '3', 'Scorpio', '3000', 'Devchuli-17,Nawalpur', 'image/car5.jpg', 0),
(9, '4', 'Breeza', '3000', 'Sundhara,Kathmandu', 'image/car6.jpg', 0),
(10, '5', 'Hiace', '3000', 'New Baneshwor,Kathmandu', 'image/car7.jpg', 0),
(13, '6', 'honda', '3000', 'Devchuli-17,Nawalpur', 'image/car2.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `user_id` int(50) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `date` varchar(100) NOT NULL,
  `image_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`user_id`, `name`, `email`, `phone`, `password`, `date`, `image_path`) VALUES
(1, 'Sohan Kafle', 'kaflesohan1@gmail.com', '9812211443', 'sohan', '', ''),
(2, 'Subash Adhikari', 'suad12@gmail.com', '9845234765', 'subash', '', ''),
(3, 'Ganesh Adhikari', 'gan12@gmail.com', '9855428743', 'ganesh', '', ''),
(4, 'Aakash Kandel', 'akku123@gmail.com', '9842386532', 'aakash', '', ''),
(37, 'sohan', 'rudal321@gmail.com', '9812211443', '$2y$10$XqqipG.R5BqTWOShlmAFU.aV9OYd7W6K3Q5dMbHlCp8S96bVDyk7a', '', ''),
(38, 'Sohan Kafle', 'kaflesohan1@gmail.com', '9812211443', '$2y$10$sn11woDmchmpXf5mF8cl3uSJKbcXVafdqvEiAlETgpPTSE5W1mwEO', '', ''),
(39, 'sohan', 'sohan@gmail.com', '9847299401', '$2y$10$/veinpQECusr/2FRlj7WNelIVBtsCyLX9vsdreQ0u6HINeEBR7uHa', '2023-08-09', 'myprofile/ganesh.jpg'),
(40, 'Ganesh Adhikari', 'adhikariganesg831@gmail.com', '9742862162', '$2y$10$eDehpkjmZdPo8faQEgIfSe4hPNvlv5aJX9uUuS3uMarZ22stWcks6', '', ''),
(47, '123', '123@gmail.com', '23234234', '$2y$10$A8w.byqFthP2vlY.WF1I5eLLSPEnVm31I2jAwVgkJ4Eazq3ZWcksa', '', ''),
(48, '1233', '2332@gmail.com', '63245276', '$2y$10$LActXWSeeGN3F36NqkpNJOSsUQktfK7sbqUBXXUNyo9IO7DVsQ76m', '', ''),
(49, '134', '421@gmail.com', '625342566', '$2y$10$nDq/TMFaMLICast8W/j1wObs.mu1Xq//yNMFvCiBsTj.uiFSiiZni', '', ''),
(50, '123', 'sohan@gmail.com', '9824480601', '$2y$10$3N7zZWXLZKJk81j8EebZjeuVctaSgFLzFN51gasR6CIirPf1N4ukG', '', ''),
(51, 'sohna', '123@345.com', '8827381782', '$2y$10$vK9MumcPBDy4rL6nEJg92.n.jHsNKQ8ugEWg3lKx42FrgFBXn/hpe', '', ''),
(52, 'sohan', '123@345.com', '343554534', '$2y$10$TorgTbZpM/ts5L5gNQdQMeXtuLWS0TWR74GcowSpUK6LSjDLHsl3G', '', ''),
(53, 'sohan', '123@345.com', '343554534', '$2y$10$JvRA8HMTPT90mNZD8deKVeDGan84FKjuOMCSkmbNgO7IhKu2MvaKW', '', ''),
(54, 'Sohan', 'kaflesohan1@gmail.com', '444444444444444444444', '$2y$10$FeVYJZ3j1oN5XQ.BbMobRuCxkv948BaB1YKBCqke3w6TQMcgtEqIK', '', ''),
(55, 'Sohan', 'kaflesohan1@gmail.com', '444444444444444444444', '$2y$10$Ky9lxpNHk7k89/DDPOnAHO118caIdp.Z2ZpLrwlDBJqHcm8fg.Sby', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_status` (`book_status`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `car` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `signup` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
