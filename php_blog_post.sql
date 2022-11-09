-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 09, 2022 at 06:21 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_blog_post`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `video_url` varchar(400) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `slug`, `video_url`, `userid`, `date`, `image`) VALUES
(9, 'this is test blog number 8', 'please verify this to make sure it workd', 'this-is-test-blog-number-8', 'https://github.com/ushahidi/platform-client/pull/1776', 5, '2022-11-07', NULL),
(10, 'what is php', 'PHP is a general-purpose scripting language geared toward web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995. The PHP reference implementation is now produced by The PHP Group.', 'what-is-php', 'https://github.com/ushahidi/platform-client/pull/1776', 5, '2022-11-07', NULL),
(11, 'This is another post about php', 'PHP is an open-source, server-side programming language that can be used to create websites, applications, customer relationship management systems and more. It is a widely-used general-purpose language that can be embedded into HTML. This functionality with HTML means that the PHP language has remained popular with developers as it helps to simplify HTML code.\r\n\r\nWhat does PHP stand for?\r\nPHP stands for ‘PHP: Hypertext Preprocessor’, with the original PHP within this standing for ‘Personal Home Page’. The acronym has changed as the language developed since its launch in 1994 to more accurately reflect its nature. \r\n\r\nSince its release, there have been 8 versions of PHP, as of 2022, with version 8.1 currently a popular choice among those using the language on their websites.', 'This-is-another-post-about-php', 'https://github.com/ushahidi/platform-client/pull/1776', 5, '2022-11-07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(5, 'AdyBay ', 'ady@gmail.com', '$2y$10$1OgKBeicgO0DftWgXnGuUuCrdUiskdhZhmtPtzwHLQZW55CQmFz0u'),
(12, 'nfontatah73@gmail.com', 'leong@gmail.com', '$2y$10$gUxkGGhqLlHrKVfJX7BN8uSqEMnKy0fLjgV/A74Y8uL.ZnWyQGzAS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_User_Post` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_User_Post` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
