-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 30, 2024 at 03:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `video_games`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `game_id` int(11) NOT NULL,
  `game_name` varchar(30) NOT NULL,
  `game_description` varchar(255) NOT NULL,
  `game_release_date` date NOT NULL,
  `game_website_url` varchar(120) NOT NULL,
  `game_img_url` varchar(120) NOT NULL,
  `game_genre` varchar(25) NOT NULL,
  `game_platform` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`game_id`, `game_name`, `game_description`, `game_release_date`, `game_website_url`, `game_img_url`, `game_genre`, `game_platform`) VALUES
(1, 'Halo: Combat Evolved', 'Halo: Combat Evolved was a first of it', '2001-11-15', 'https://www.halowaypoint.com/', 'model/images/Halo.jpg', 'Shooter', 'Xbox'),
(2, 'Gears of War', 'Gears of War is a 2006 third-person shooter video game developed by Epic Games and published by Microsoft Game Studios.', '2006-11-07', 'https://www.gearsofwar.com/', 'https://upload.wikimedia.org/wikipedia/en/8/82/Gears_of_war_cover_art.jpg', 'Shooter', 'Xbox'),
(3, 'Mario Kart 8', 'Mario Kart is a series of kart racing games based on the Mario franchise developed and published by Nintendo.', '2014-05-29', 'https://en.wikipedia.org/wiki/Mario_Kart_8', 'https://upload.wikimedia.org/wikipedia/en/b/b5/MarioKart8Boxart.jpg?20190118005807', 'Racing', 'Nintendo'),
(4, 'TestRecord-TestEditGame', 'Example description for TestRecord.', '2024-10-28', 'example@www.com', 'model/images/Halo.jpg', 'TestGenre/EditGame', 'PC');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_street` varchar(60) DEFAULT NULL,
  `user_city` varchar(30) DEFAULT NULL,
  `user_state` varchar(2) DEFAULT NULL,
  `user_zip` varchar(5) DEFAULT NULL,
  `user_phone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_street`, `user_city`, `user_state`, `user_zip`, `user_phone`) VALUES
(1, 'user1', 'password1', NULL, NULL, NULL, NULL, NULL),
(2, 'FullMoon', 'ILikeFullM00ns', '123 Full Moon Dr', 'Moon City', 'UT', '12345', '4178931596');

-- --------------------------------------------------------

--
-- Table structure for table `user_game`
--

CREATE TABLE `user_game` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_game`
--

INSERT INTO `user_game` (`user_id`, `game_id`) VALUES
(1, 2),
(2, 1),
(2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`),
  ADD UNIQUE KEY `game_name` (`game_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_game`
--
ALTER TABLE `user_game`
  ADD PRIMARY KEY (`user_id`,`game_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
