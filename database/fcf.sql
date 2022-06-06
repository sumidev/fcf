-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 09:32 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fcf`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_profile`
--

CREATE TABLE `admin_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_pic` varchar(300) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_profile`
--

INSERT INTO `admin_profile` (`id`, `user_id`, `profile_pic`, `age`, `gender`) VALUES
(2, 37, '', 20, 'female');

-- --------------------------------------------------------

--
-- Table structure for table `coach_profile`
--

CREATE TABLE `coach_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_pic` varchar(300) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `expertise` varchar(1000) NOT NULL,
  `summary` text NOT NULL,
  `experience` float NOT NULL,
  `certificate` varchar(1000) NOT NULL,
  `average_review` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coach_profile`
--

INSERT INTO `coach_profile` (`id`, `user_id`, `profile_pic`, `age`, `gender`, `expertise`, `summary`, `experience`, `certificate`, `average_review`) VALUES
(2, 42, '../uploads/profile_pics/1654191250cutegirlba_rkr2rjmh.jpg', 34, 'female', 'cardio', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 9.5, '', 0),
(3, 45, '../uploads/profile_pics/1654113922167778_197692943576441_187230631289339_792056_2681762_n.jpg', 33, 'male', 'muscles tone', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 8, '', 0),
(4, 46, '../uploads/profile_pics/1653847099training-gd2d36828f_1280.jpg', 30, 'female', 'cardio', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 6, '', 0),
(5, 47, '../uploads/profile_pics/1653847099training-gd2d36828f_1280.jpg', 25, 'male', 'weight gain', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 2, '', 0),
(6, 48, '../uploads/profile_pics/1653847099training-gd2d36828f_1280.jpg', 26, 'male', 'weight gain', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 5, '', 0),
(7, 49, '../uploads/profile_pics/1653847099training-gd2d36828f_1280.jpg', 40, 'male', 'muscles tone', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 15, '', 0),
(8, 40, '../uploads/profile_pics/1653847099training-gd2d36828f_1280.jpg', 23, 'male', '', 'tdgdgdfgdfg df fdg df fd dfg df', 6, '../uploads/certificates/1653847099application-appointment-converted.pdf', 0),
(11, 41, '../uploads/profile_pics/16544224931474523_524385537659301_164565707_n.jpg', 26, 'male', 'weight gain', ' is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', 9, '../uploads/certificates/1654422493__Student ID-CARD__.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coach_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coach_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `coach_id`, `created_at`) VALUES
(30, 39, 41, '2022-06-06 03:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coach_id` int(11) NOT NULL,
  `requestTo` enum('1','2') NOT NULL,
  `requestFrom` enum('1','2') NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=unseen,\r\n1=unseen',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `coach_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('1','2','3') NOT NULL COMMENT '1=user,2=coach,3=admin',
  `is_profile_completed` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=no,1=yes',
  `is_activated` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=no,1=yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `is_profile_completed`, `is_activated`) VALUES
(37, 'Anshita', 'anshita@gmail.com', '123456', '3', '0', '1'),
(39, 'sumit', 'sk.chd03@gmail.com', '123456', '1', '1', '1'),
(40, 'fsdf', 'abc@gmail.com', '123456', '2', '0', '1'),
(41, 'coach1', 'a@gmail.com', '123456', '2', '1', '1'),
(42, 'coach2', 'b@gmail.com', '123456', '2', '0', '1'),
(45, 'coach3', 'c@gmail.com', '123456', '2', '0', '1'),
(46, 'coach4', 'd@gmail.com', '123456', '2', '0', '1'),
(47, 'coach5', 'e@gmail.com', '123456', '2', '0', '1'),
(48, 'coach6', 'f@gmail.com', '123456', '2', '0', '1'),
(49, 'coach7', 'g@gmail.com', '123456', '2', '0', '1'),
(51, 'sumi', 'test@gmail.com', '123456', '1', '1', '1'),
(52, 'Sonia', 'soni@gmail.com', '123456', '1', '1', '1'),
(53, 'sumita', 'smt@gmail.com', '123456', '1', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_pic` varchar(300) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `weight` float NOT NULL,
  `height` float NOT NULL,
  `requirement` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `profile_pic`, `age`, `gender`, `weight`, `height`, `requirement`) VALUES
(22, 39, '../uploads/profile_pics/1654198381IMG-20220602-WA0002.jpg', 26, 'male', 70, 177, '[\"cardio\",\"weight gain\",\"muscles tone\"]'),
(23, 52, '../uploads/profile_pics/1654347294IMG_20220602_030229_554.jpg', 23, 'female', 55, 154, '[\"cardio\",\"weight gain\",\"muscles tone\"]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coach_profile`
--
ALTER TABLE `coach_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`coach_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`coach_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_profile`
--
ALTER TABLE `admin_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coach_profile`
--
ALTER TABLE `coach_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
