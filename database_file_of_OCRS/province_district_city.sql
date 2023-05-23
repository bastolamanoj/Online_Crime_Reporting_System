-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2022 at 01:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `province_district_city`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `district_id` int(11) DEFAULT NULL,
  `city` varchar(240) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `district_id`, `city`) VALUES
(1, 23, 'Pokhara'),
(2, 18, 'Budhanilkantha'),
(3, 18, 'Kathmandu Metropolitan City'),
(4, 18, 'Tarakeshwar'),
(5, 18, 'Kathmandu');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `district` varchar(240) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `province_id`, `district`) VALUES
(1, 1, '    Bhojpur \r\n  '),
(2, 1, '  Dhankuta \r\n  '),
(3, 1, '  Ilam \r\n  '),
(4, 1, '  Jhapa \r\n  '),
(5, 1, ' Terhathum \r\n  '),
(6, 1, '    Taplejung \r\n   '),
(7, 1, ' Sunsari \r\n'),
(8, 1, '  Solukhumbu \r\n   '),
(9, 1, 'Sankhuwasabha \r\n  '),
(10, 1, '  Panchthar \r\n    '),
(11, 1, '   Okhaldhunga \r\n  '),
(12, 1, '   Morang \r\n '),
(13, 1, '  Khotang \r\n '),
(14, 1, '  Udayapur '),
(15, 2, 'Bara \r\n'),
(16, 2, ' Dhanusha \r\n'),
(17, 2, 'Mahottari '),
(18, 3, 'Kathmandu'),
(19, 3, 'Lalitpur '),
(20, 3, 'Chitwan '),
(21, 3, 'Bhaktapur '),
(22, 4, 'Baglung '),
(23, 4, 'Kaski '),
(24, 4, 'Gorkha '),
(25, 5, 'Arghakhanchi '),
(26, 5, 'Banke '),
(27, 5, 'Bardiya '),
(28, 6, 'Dolpa '),
(29, 6, 'Dailekh '),
(30, 7, 'Achham '),
(31, 7, 'Baitadi '),
(32, 7, 'Bajhang ');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `province` varchar(248) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `province`) VALUES
(1, 'Province No 1'),
(2, 'Madhesh '),
(3, 'Bagmati '),
(4, 'Gandaki '),
(5, 'Lumbini '),
(6, 'Karnali '),
(7, 'Sudurpashchim ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
