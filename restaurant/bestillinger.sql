-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2022 at 08:08 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `bestillinger`
--

CREATE TABLE `bestillinger` (
  `navn` varchar(30) NOT NULL,
  `tlf` int(8) NOT NULL,
  `email` text NOT NULL,
  `antal` int(1) NOT NULL,
  `dato` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `forret` text NOT NULL,
  `hovedret` text NOT NULL,
  `dessert` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bestillinger`
--

INSERT INTO `bestillinger` (`navn`, `tlf`, `email`, `antal`, `dato`, `forret`, `hovedret`, `dessert`, `id`) VALUES
('test', 412412412, 'mail@dk.com', 3, '2022-11-16 13:45:00', 'nachos', 'asiatiske-kødboller', 'cheeseboard', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bestillinger`
--
ALTER TABLE `bestillinger`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bestillinger`
--
ALTER TABLE `bestillinger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
