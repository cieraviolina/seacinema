-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 06:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sea_cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id_balance` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id_balance`, `id_user`, `amount`) VALUES
(1, 14, '0'),
(2, 15, '0');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id_movie` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `age_rating` varchar(3) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` int(5) NOT NULL,
  `poster` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id_movie`, `title`, `age_rating`, `description`, `price`, `poster`) VALUES
(1, 'Evil Dead Rise', '18+', 'A twisted tale of two estranged sisters whose reunion is cut short by the rise of flesh-possessing d', 25000, 'evildeadrise.jpg'),
(2, 'The Boogeyman', '13+', 'Still reeling from the tragic death of their mother,...', 25000, 'theboogeyman.jpg'),
(3, 'M3gan', '13+', 'A robotics engineer at a toy company builds a life-like doll that begins to take on a life of its ow', 25000, 'm3gan.jpg'),
(4, 'The Menu', '18+', 'A young couple travels to a remote island to eat at an exclusive restaurant where the chef has prepa', 25000, 'themenu.jpg'),
(5, 'Midsommar', '18+', 'A couple travels to Northern Europe to visit a rural hometowns fabled Swedish mid-summer festival...', 25000, 'midsommar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` text NOT NULL,
  `title` varchar(50) NOT NULL,
  `time` varchar(5) NOT NULL,
  `seat` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_user`, `name`, `title`, `time`, `seat`) VALUES
(17, 14, 'asd', 'M3gan', '12:30', '3B');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `age` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `name`, `age`) VALUES
(12, 'qwer', '$2y$10$TwVcWKI7e4JL4J6TKhj4WO615fWD1aW9Khs75zX93Te/3ZeM4w2c6', 'qwer', 22),
(13, 'atun', '$2y$10$elBvhGA.XHLpukN..T/HrOZkgu8uR48c/OXA42v6yrdjuGdzjljfe', 'atun', 32),
(14, 'atuy', '$2y$10$OFZcvohyGomMeZq8t6jAJOcUW8a4cIdIT4CQ0k6Nn2oZl4AkuExMC', 'atuy', 25),
(15, 'uwi', '$2y$10$AYHbP7RjjLvAGiG/QC68reWpQggPKktoG/PJojtWE3kfMXqyGgYJG', 'uwi', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id_balance`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id_movie`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id_balance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id_movie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balance`
--
ALTER TABLE `balance`
  ADD CONSTRAINT `balance_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
