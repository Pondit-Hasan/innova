-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2019 at 12:51 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `falcon`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(11) NOT NULL,
  `about_title` varchar(300) NOT NULL,
  `about_desp` text NOT NULL,
  `about_sub_title` varchar(200) NOT NULL,
  `about_features` varchar(300) NOT NULL,
  `about_img` varchar(100) NOT NULL,
  `about_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `about_title`, `about_desp`, `about_sub_title`, `about_features`, `about_img`, `about_status`) VALUES
(1, 'Who We Are', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', 'Why Choose Us?', 'year of experiance, fully insured, cost control experts, 100% satifaction guarantee', '1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `banner_title` varchar(300) NOT NULL,
  `banner_desp` text NOT NULL,
  `banner_btn` varchar(100) NOT NULL,
  `banner_img` varchar(100) NOT NULL,
  `banner_status` int(11) NOT NULL,
  `delete_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_title`, `banner_desp`, `banner_btn`, `banner_img`, `banner_status`, `delete_status`) VALUES
(1, 'Home Construction &amp; Remodeling', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'View More', '1.jpg', 2, 1),
(6, 'Where can I get some?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 'View More', '6.jpg', 1, 0),
(7, 'Home Construction &amp; Remodeling', 'Hkjgd dhfkldh dfhkd  sdfhkdfh', 'Test One', '7.jpg', 2, 1),
(8, 'Give a Title Here', 'jhhjgv', 'Click Me', '8.jpg', 2, 1),
(9, 'Home Construction &amp; Remodeling', 'khlkh;kmu sdncguydvbfm  djfuihg jmvfoik b', 'Click Me', '9.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `get_in_touch`
--

CREATE TABLE `get_in_touch` (
  `id` int(11) NOT NULL,
  `get_in_touch_title` varchar(250) NOT NULL,
  `get_in_touch_desp` text NOT NULL,
  `get_in_touch_btn` varchar(100) NOT NULL,
  `get_in_touch_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `get_in_touch`
--

INSERT INTO `get_in_touch` (`id`, `get_in_touch_title`, `get_in_touch_desp`, `get_in_touch_btn`, `get_in_touch_status`) VALUES
(1, 'Cost for your home renovation project', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is ', 'Free Estimate', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logoes`
--

CREATE TABLE `logoes` (
  `id` int(11) NOT NULL,
  `logo_img` varchar(200) NOT NULL,
  `logo_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logoes`
--

INSERT INTO `logoes` (`id`, `logo_img`, `logo_status`) VALUES
(1, '1.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `send_time` varchar(300) NOT NULL,
  `status` int(11) NOT NULL,
  `delete_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `send_time`, `status`, `delete_status`) VALUES
(1, 'Mahmudul Hasan', 'hamid@hasan.com', 'I found something important', '23-Sep-2019 16:31:31', 0, 0),
(2, 'John Doe', 'john@doe.com', 'Hello, what&#039;s up to you? aren&#039;t you coming?', '23-Sep-2019 16:34:51', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_title` varchar(200) NOT NULL,
  `service_desp` text NOT NULL,
  `service_img` varchar(200) NOT NULL,
  `service_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_title`, `service_desp`, `service_img`, `service_status`) VALUES
(1, 'Home Additions', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', '1.jpg', 1),
(2, 'Bathroom Remodels', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', '2.jpg', 1),
(3, 'Decks & Porches', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', '3.jpg', 1),
(4, 'Kitchen Remodels', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', '4.jpg', 2),
(5, 'New Home Construction', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', '5.jpg', 1),
(6, 'Kitchen Remodels', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', '6.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_icons`
--

CREATE TABLE `social_icons` (
  `id` int(11) NOT NULL,
  `social_icon_name` varchar(200) NOT NULL,
  `social_icon_link` varchar(255) NOT NULL,
  `social_icon` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_icons`
--

INSERT INTO `social_icons` (`id`, `social_icon_name`, `social_icon_link`, `social_icon`) VALUES
(2, 'Twitter', 'https://twitter.com/90Mahmudul', 'twitter'),
(3, 'google-plus', 'https://plus.google.com/', 'google-plus'),
(6, 'facebook', '', 'facebook'),
(7, 'facebook', 'https://www.facebook.com/profile.php?id=100002286346077', 'facebook'),
(8, 'youtube', 'https://www.youtube.com/channel/UC3idqoBxjlfpM1S4qNsHGEQ?view_as=subscriber', 'youtube'),
(9, 'youtube', 'https://www.youtube.com/', 'youtube');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `testimonials_desp` text NOT NULL,
  `testimonials_author` varchar(200) NOT NULL,
  `testimonials_img` varchar(200) NOT NULL,
  `testimonials_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `testimonials_desp`, `testimonials_author`, `testimonials_img`, `testimonials_status`) VALUES
(1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydne.', 'John Doe', '1.jpg', 1),
(2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots ing through the cites of the word in classical literature, discovered the undoubtable source.', 'Johnathan Doe', '2.jpg', 1),
(3, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College ', 'Mahmudul Hasan', '3.jpg', 1),
(4, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', 'Johnathan Doe', '4.jpg', 1),
(5, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots ', 'John Doe', '5.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `role` int(11) NOT NULL,
  `photo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `age`, `gender`, `role`, `photo`) VALUES
(1, 'Deepika Hasan', 'dee@pika.com', '$2y$10$pFRtEd6WGEP4DzTv9gJ8bepNcHrIqo6hctPgmTpUOBeihJPPTrgzC', 32, 'female', 1, '1.jpg'),
(4, 'Akshay Kumer', 'akshay@kumar.com', '$2y$10$NYHmG9Kb6dLuZ8OqpUMwAe3vbbSl46Cj9CpLNOXUpgvDGAQ8LjSim', 34, 'male', 2, '4.png'),
(5, 'Jack Ma', 'jack@ma.com', '$2y$10$5XRiPaOnUuRu5fbq8REOsulHPxIcYr8q6UzMHG8XgymxkIeQOjzs2', 34, 'male', 0, '5.jpeg'),
(6, 'Sumaya', 'hamid@hasan.com', '123', 30, 'female', 0, '6.jpeg'),
(7, 'Hasan Ali', 'akshay@kumar1.com', '$2y$10$gHauSTEcuB8HVrcKSP83YeUlzMsObod32E5mhLNALtMy2hm/gm7xm', 30, 'male', 2, '7.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `get_in_touch`
--
ALTER TABLE `get_in_touch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logoes`
--
ALTER TABLE `logoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_icons`
--
ALTER TABLE `social_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `get_in_touch`
--
ALTER TABLE `get_in_touch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logoes`
--
ALTER TABLE `logoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `social_icons`
--
ALTER TABLE `social_icons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
