-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2019 at 05:08 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serves`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `me_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `emali` varchar(250) NOT NULL,
  `serv_id` int(11) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `img` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `groups` tinyint(4) NOT NULL DEFAULT '0',
  `nationality` varchar(250) CHARACTER SET utf8 NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `full_name` varchar(250) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`me_id`, `name`, `emali`, `serv_id`, `phone`, `address`, `create_at`, `password`, `price`, `img`, `status`, `groups`, `nationality`, `Gender`, `full_name`) VALUES
(1, 'ali', 'ali@gmail.com', 1, '1111111', 'wwwwwww', '2019-04-09 14:32:23', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 234, '', 1, 1, 'sss', 'female', 'ali osman'),
(2, 'osman', 'osman@gmali.ocm', 1, '0988763635', 'sudan', '2019-04-09 14:56:24', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 12, '', 1, 0, '', '', 'omer'),
(3, 'omer', 'omer@gmali.com', 1, '0988763635', 'fff', '2019-04-09 14:33:50', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 23, '646482_browser-flat-black.png', 0, 0, 'sudan', 'female', 'omer ali');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `title` varchar(199) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `email` varchar(250) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `serv_id` int(11) NOT NULL,
  `me_id` int(11) NOT NULL,
  `names` varchar(100) NOT NULL,
  `phone` varchar(199) NOT NULL,
  `locations` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `serv_id`, `me_id`, `names`, `phone`, `locations`, `email`, `create_at`) VALUES
(1, 1, 1, 'ali', '0988763635', 'aaaa', 'ali@gmali.com', '2019-04-09 14:17:58'),
(2, 1, 2, 'pc', '0988763635', 'ssss', 'ali@gmali.com', '2019-04-09 14:49:15');

-- --------------------------------------------------------

--
-- Table structure for table `serv`
--

CREATE TABLE `serv` (
  `id` int(11) NOT NULL,
  `name_serves` varchar(250) NOT NULL,
  `descs` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serv`
--

INSERT INTO `serv` (`id`, `name_serves`, `descs`, `create_at`, `img`) VALUES
(1, 'tests', 'sssss', '2019-04-09 14:16:04', 'q'),
(2, 'gsfs', 'ssssss', '2019-04-09 14:15:54', '752182__45243287_05fc65d1-a6a4-4a87-8251-085db0553afc.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`me_id`),
  ADD KEY `members_ibfk_1` (`serv_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_ibfk_1` (`me_id`),
  ADD KEY `serv_id` (`serv_id`);

--
-- Indexes for table `serv`
--
ALTER TABLE `serv`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `me_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `serv`
--
ALTER TABLE `serv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`me_id`) REFERENCES `members` (`me_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`serv_id`) REFERENCES `serv` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
