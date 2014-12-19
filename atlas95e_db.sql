-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2014 at 11:15 AM
-- Server version: 5.5.40-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `atlas95e_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `p_id` int(25) NOT NULL AUTO_INCREMENT,
  `p_img` varchar(255) NOT NULL,
  `p_tags` varchar(255) NOT NULL,
  `user_uploaded` varchar(255) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`p_id`, `p_img`, `p_tags`, `user_uploaded`) VALUES
(5, 'uploads/a5a8d6b3924f8d5315914efe1bfbfbbf.jpg', '', 'velizar'),
(6, 'uploads/711cb50aca43e356806ddab82993527e.jpg', '', 'velizar'),
(7, 'uploads/6753b29ddf176f4f8794466376477b95.jpg', '', 'velizar'),
(8, 'uploads/be50a929352ac0f8a65c19aa93cf1b62.jpg', '', 'velizar'),
(9, 'uploads/1e41fd90d621f5f50c3e61dc7304bb9b.jpg', '', 'velizar'),
(10, 'uploads/b8de8a5e52a03a5501843d7709ea2458.jpg', 'car, bmw', 'velizar'),
(11, 'uploads/ebe04b12c73f463676b162a3014a71f8.jpg', 'car, porche, epic', 'velizar'),
(12, 'uploads/3d3499c3a47aca54bc543a278ea270a0.jpg', 'browser, shit, firefox', 'velizar'),
(13, 'uploads/5b52bf296041000bfb2f6db1ae209e58.jpg', 'adidas, pederas', 'velizar'),
(14, 'uploads/aa380091448041b2b39e03e4404a26a9.jpg', 'plane, boeing, fly', 'velizar'),
(15, 'uploads/556ac2c233b100e1619ed16d8310d91a.jpg', 'xbox, game, 360', 'velizar'),
(16, 'uploads/7adc92c8bbac0435fe9d39c95e5fbf87.jpg', 'pumpkin, halloween', 'velizar'),
(17, 'uploads/7a32219f9a8533b4ee6bf6c419eaea9b.jpeg', 'snake, green, scary', 'velizar'),
(18, 'uploads/733b812a86cd17ab0ab2aebce4a42373.jpg', '', 'juji'),
(19, 'uploads/ac2ddc00b1eb3f8dce18a7c52e6658d1.jpg', 'dog', 'juji'),
(20, 'uploads/cac9b3aa6aed41a93d35eef60b170881.jpg', 'sky', 'juji'),
(21, 'uploads/232ffb01f0a6aca4327cc387293fe563.jpg', '', 'velizar'),
(22, 'uploads/e9140903e5f5eec55e10f5336cbe1b54.jpg', '', 'velizar'),
(23, 'uploads/60bf78d8ca7252687482a682adfba6a1.png', '', 'admin'),
(24, 'uploads/ce5a590f008eaeea7cac1e63987d3b00.png', '', 'admin'),
(25, 'uploads/186562bc6e6573b5a69f115ded13c4c6.jpg', '', 'admin'),
(26, 'uploads/2a51539f1deb67fb0935bb4a6b9f3c1b.png', '&lt;br&gt;', 'admin'),
(27, 'uploads/30134040a20df07802313e1d94dde700.png', '&lt;br&gt;', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `email_code` varchar(32) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `profile` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `email_code`, `active`, `profile`) VALUES
(8, 'velizar', 'e10adc3949ba59abbe56e057f20f883e', 'Velizar', '', 'vbishurov@gmail.com', 'fb87085a51368cc84c1e6d5792923016', 1, 'uploads/profile/687e366941.jpg'),
(9, 'danielcho', 'cbd15b8ec5e4fbf715074edd57352bbd', 'daniel', 'georgiev', 'daniko91@mail.bg', 'af9d3f4ae1decd69f154f3754848122f', 0, ''),
(11, 'Filkolev', 'e10adc3949ba59abbe56e057f20f883e', 'Fil', '', 'filkolev@abv.bg', '2e5d68ae1ee530dd466c086611bd2c47', 0, ''),
(12, 'Filkolev2', 'e10adc3949ba59abbe56e057f20f883e', 'Fege', '', 'fil.kolev@yahoo.com', '97dc93c753d670741f99cdcbd07de2fe', 1, ''),
(13, 'juji', '259d67192e7787914f10b1caf29b3e4f', 'Juji', '', 'jujito15@gmail.com', '4ebf953c6cf5848154a4782c18dbd3b7', 1, 'uploads/profile/6f420af9b1.jpg'),
(14, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Georgi', '', 'georgi_iliev@yahoo.com', '6e2b92e2ab3bd12272a1347d118e9fa1', 1, 'uploads/profile/32627a48c1.jpg'),
(15, 'kasskata', '4a754f51fad7641a87b59f795fa7bf60', 'kasskata', 'anana', 'kasskata@abv.bg', 'b768993974cd642ee3896434b2fad392', 0, ''),
(16, 'VenelinGrozev', 'e10adc3949ba59abbe56e057f20f883e', 'Ven', 'Grozev', 'v.grozev@outlook.com', '48964314447b00247c498aae5a9e14cd', 1, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
