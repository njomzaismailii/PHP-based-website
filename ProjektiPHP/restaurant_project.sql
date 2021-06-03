-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 07:13 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_project`
--
create database restaurant_project;
use restaurant_project;
-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `image` varchar(2052) NOT NULL,
  `description` text NOT NULL,
  `posted_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--
INSERT INTO `menu` (`menu_id`, `title`, `image`, `description`, `posted_by`) VALUES
(52, 'Beef  $25', 'beef.jpg', 'rice,  beef dijon, garlic, vegetable oil \r\n', 'Njomza'),
(53, 'Pasta $30', 'pasta.jpg', 'onion, chopped vegetable, mashed tomatoes, chilli powder', 'Njomza'),
(54, 'Soup 25$', 'tomatoSoup.jpg', 'tomatoes, butter,onion , chicken stock, sea salt', 'Njomza'),
(55, 'Cake 20$', 'ChocoCake.jpg', 'chocolate, strawberries, pudding', 'Njomza'),
(56, 'Drink   $10', 'drink.jpg', 'fresh blueberries, banana, yogurt,teaspoon honey', 'Njomza'),
(57, 'RiceDish    $12', 'riceDish.jpg', 'rice, onion, and garlic,chilies,cilantro', 'Njomza'),
(58, 'Sandwich  $10', 'sandwich.jpg', 'deli ham,tomato,red onion,dijon mustard', 'Njomza'),
(59, 'Salmon    $20', 'salmon.jpg', 'fresh salmon,garlic,honey,lemon juice', 'Njomza'),
(60, 'Pizza $15', 'pizza2.jpg', 'pizza dough,mozzarella,tomato sauce,basil', 'Njomza');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(128) NOT NULL,
  `message` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`) VALUES
(13, 'Valdrin', 'ejupivaldrin3@gmail.com', 'Hello World!'),
(14, 'Osman', 'osman.bytyqi@student.uni-pr.edu', 'JustDoIt');

-- --------------------------------------------------------
--
-- Table structure for table `staff_info`
--

CREATE TABLE `staff_info` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_info`
--

INSERT INTO `staff_info` (`id`, `title`, `description`, `image`) VALUES
(4, 'Manager', 'After finishing masters degree in Management in University of Harvard she became the manager of the restaurant 4 years ago and since then Joana has been doing an amazing job to contributing for the better of the restaurant.', 'manager.jpg'),
(5, 'Kitchen chef', 'Ryan</b> is a chef, one of the best\r\nchefs, born and raised in China, \r\nhe had a passion for cooking since\r\nhe was a child, Ryan is 32 years \r\nold, he has completed various\r\ncertifications for chef, and today\r\nhe holds a high position in the restaurant', 'chef.jpg'),
(7, 'Owner', 'Archie is the restaurant owner,running a restaurant is a team effort and as a restaurant owner, you are the team captain. What you do sets an example for your employees.', 'owner.jpg'),
(8, 'Delivery Boy', 'Mathew is a young and very humble guy he is fast as a rocket,he is as fast as the wind it is no coincidence that consumers call it the wind  ', 'deliveryboy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(144) NOT NULL,
  `password` varchar(128) NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `created_at`) VALUES
(14, 'Valdrin', 'valdrin.ejupi@student.uni-pr.edu', '$2y$10$YkV7mCWGfBHcGg9lvPXZrOagUhxHrrywNPEVKxR8Z1w1ZFf2khEhu', 1, '2021-05-11 11:53:07');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_info`
--
ALTER TABLE `staff_info`
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
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `staff_info`
--
ALTER TABLE `staff_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
