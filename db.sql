-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Структура на таблица `image`
--

CREATE TABLE IF NOT EXISTS `image` (
`p_id` int(25) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `p_tags` varchar(255) NOT NULL,
  `user_uploaded` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `email_code` varchar(32) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `email_code`, `active`, `profile`) VALUES
(1, 'admin', '6cb75f652a9b52798eb6cf2201057c73', 'Georgi', 'Iliev', 'georgi_iliev@yahoo.com', '', 1, 'uploads/profile/afe68c2bba.jpg'),
(4, 'locoenough', '2419c459e9ad2d94f4a5c887b3ca18cb', 'dae', 'kak', 'penchev@epedal.com', '', 1, ''),
(5, 'glavata', '2419c459e9ad2d94f4a5c887b3ca18cb', 'glavata', 'glavata', 'glavata@mail.bg', '', 0, ''),
(6, 'glavata2', '2419c459e9ad2d94f4a5c887b3ca18cb', 'dae', 'kak', 'blabla@yahoo.com', '', 0, ''),
(7, 'glavata3', 'bff82e5000d4c7a1d6e3ea0e0880ace3', 'dae', 'dae', 'onqludwaaameeen@abv.bg', 'bcacae7fedbe0e7bc5ae283380c2f36d', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image`
--
ALTER TABLE `image`
 ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
MODIFY `p_id` int(25) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
