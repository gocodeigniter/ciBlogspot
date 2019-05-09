-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 09, 2019 at 03:55 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apps_blogspot`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `subject`, `datetime`) VALUES
(9, 1, 3, 'Helo =D .', '2019-02-14 18:17:58'),
(10, 1, 1, 'Halo =D ', '2019-02-14 18:18:20'),
(11, 2, 3, 'Halo juga =D .', '2019-02-14 18:21:37'),
(12, 1, 1, 'test', '2019-02-15 00:39:48'),
(13, 1, 2, 'Kumaha kabar artikel ?', '2019-03-19 00:50:30'),
(14, 1, 6, 'Test', '2019-05-09 08:10:29'),
(15, 1, 6, 'Udah sarapan belum ? :v .', '2019-05-09 08:10:35'),
(16, 2, 6, 'Belum eung .. Tunduh :v .', '2019-05-09 08:11:20'),
(17, 2, 6, 'Kan bangke nantinya =P .', '2019-05-09 08:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `image`, `title`, `slug`, `subject`, `datetime`) VALUES
(1, 1, NULL, 'Kiriman Pertama', 'kiriman-pertama', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.</p>\r\n', '2019-02-14 17:07:29'),
(2, 1, '', 'Kiriman Kedua', 'kiriman-kedua', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.</p>\r\n', '2019-02-15 00:54:22'),
(3, 2, NULL, 'Untuk Pertama Kalinya', 'untuk-pertama-kalinya', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.</p>\r\n', '2019-02-14 18:07:37'),
(4, 2, NULL, 'Untuk Kedua Kalinya', 'untuk-kedua-kalinya', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.</p>\r\n', '2019-02-14 18:11:56'),
(6, 1, NULL, 'Kiriman Ketiga', 'kiriman-ketiga', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores nemo ratione quis nihil ipsam! Porro quis molestias ipsa id fuga expedita deleniti, amet quaerat rerum velit? Doloribus ducimus placeat porro.</p>\r\n', '2019-02-15 00:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `name`, `username`, `password`) VALUES
(1, '97f1aace061cb308.jpeg', 'Ramdhan Eka Saputra', 'ramdhaneka90', '$2y$10$gKsjKmh38gzL7BeIfKArKuW5vh2DylW4WEbCv/yHUKP9QsJuLP0km'),
(2, 'e2c0c9c2ed4eee98.png', 'Muhammad Ardhin Naufal', 'ardhinnaufal', '$2y$10$XZmAT0r5OdIQei4Pbh90Ru6bnEbz/iNjEnL.bIUZNBv9MXgbR85ue');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
