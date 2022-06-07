-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 11:16 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kunblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_id` int(2) NOT NULL DEFAULT 1,
  `role` varchar(300) NOT NULL,
  `image` text NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `status_id`, `role`, `image`, `fullname`, `email`, `mobile`, `location`, `info`) VALUES
(4, 'akinolaa', '$2y$10$jsalSA2.FLy27QuOMKWnGOacTDMyCttLwspGiZ6psjsswTcipLFne', 1, 'superadmin', 'Water Texture.jpg', 'Akinola Akinkunmi', 'kunmifab@gmail.com', 2147483647, 'Lagos, Nigeria', 'I am a person that likes to learn '),
(7, 'letsgo', '$2y$10$hccNoRm/.CDsxbyAAA8KmO5KvD.FYnfP/VZwrUXWkUKIks9Jt6rJe', 1, 'editor', 'Water.jpg', 'Yusuf Festus', 'festolag1994@gmail.com', 2147483647, 'Kubwa, Abuja', 'It is a very good challenge doing this in Challenge. Oh God, i just confused the hell out of you.'),
(8, 'mazee', '$2y$10$hoMFfpu1ku4zI2ZY2m.kX.2oGk/1Vw77kgxWewdf5TtNaOXlOZ.Z6', 1, '', '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `date`, `timestamp`) VALUES
(1, 'Football', 'abc', '2021-11-08', '2021-11-08 09:39:26.182850'),
(2, 'Swimming', 'All things swimming', '2021-11-08', '2021-11-08 10:41:48.924285');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(255) NOT NULL,
  `fullname` text NOT NULL,
  `date` date NOT NULL,
  `balance` int(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `account_number` int(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile` text NOT NULL,
  `dob` date NOT NULL,
  `nok_name` varchar(255) NOT NULL,
  `nok_mobile` text NOT NULL,
  `nok_address` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `fullname`, `date`, `balance`, `email`, `account_number`, `password`, `mobile`, `dob`, `nok_name`, `nok_mobile`, `nok_address`, `gender`) VALUES
(1, 'Geralyn Benge', '2022-04-29', 987822, 'geralynbenge1234@gmail.com', 1834321032, 'timpgreg2022', '5085384885', '1982-01-20', 'Timothy Lee Parrott', '4196305554', '2178 A Rosedale Rd Edgerton, OH USA 43517', 'Female'),
(2, 'Geralyn Benge', '2022-04-29', 987822, 'geralynbenge1234@gmail.com', 1034321032, '$2y$10$tPb2c3fkLj7bHFu4KWLGWeBUSp0o/45RDHJQuM1xy2tTBv/n1NshK', '5085384885', '1982-01-20', 'Timothy Lee Parrott', '4196305554', '2178 A Rosedale Rd Edgerton, OH USA 43517', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `post_id` int(255) NOT NULL,
  `status_id` int(2) NOT NULL DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `post_id`, `status_id`, `date`) VALUES
(5, 'Edwiz', 'edwiz@g.com', 'It was a nice experience', 4, 0, '2021-11-08'),
(6, 'KunmiFab', 'edwiz@g.com', 'kkwkkwkwaa', 4, 0, '2021-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `time` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `type`, `content`, `image`, `time`) VALUES
(1, 'A New Post: Gaming Experience', 'post', 'Lets go', 'Spotlight.jpg', '2021-11-08 11:25:46.388637'),
(2, 'New Post: Good day', 'post', 'It was a really good day today', 'Woman Jumping.jpg', '2021-11-08 13:32:41.245585'),
(3, 'New comment from: KunmiFab', 'comment', 'kkwkkwkwaa', '', '2021-11-08 13:48:38.775328');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `cat_id` int(255) NOT NULL,
  `author_id` int(255) NOT NULL,
  `status_id` int(2) NOT NULL DEFAULT 1,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image`, `cat_id`, `author_id`, `status_id`, `date`) VALUES
(4, 'My first football Experience 342', 'It was a sunny day and sun beat my head , i had headache for a whole month', 'Water.jpg', 1, 4, 0, '2021-11-08'),
(5, 'Good day', 'It was a really good day today', 'Woman Jumping.jpg', 2, 7, 1, '2021-11-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
