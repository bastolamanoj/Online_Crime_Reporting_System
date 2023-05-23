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
-- Database: `ocrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `access` int(11) NOT NULL,
  `gender` varchar(33) NOT NULL,
  `username` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `surname`, `email`, `phone`, `access`, `gender`, `username`, `photo`, `password`, `created_at`, `updated_at`) VALUES
(1, 'manoj', 'bastola', 'manoj@gmail.com', '7897987987', 1, 'M', 'manojb', 'img_20220912_1641491663276320.jpg', '5e81f9859d223ea420aca993c647b839', '2022-08-29 12:48:07', '2022-08-29 12:48:07'),
(3, 'sanjog', 'bhandari', 'sanjog@gmail.com', '984758478', 1, 'M', 'sanjog', 'sanjog1663262207.jpg', '202cb962ac59075b964b07152d234b70', '2022-09-15 17:16:47', '2022-09-15 17:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `category` varchar(244) NOT NULL,
  `police_station` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `details` longtext NOT NULL,
  `evidence` varchar(200) NOT NULL,
  `complaint_id` int(16) NOT NULL,
  `complaint_user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `type` varchar(50) NOT NULL DEFAULT 'normal',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `title`, `category`, `police_station`, `address`, `details`, `evidence`, `complaint_id`, `complaint_user_id`, `status`, `type`, `created_at`, `updated_at`) VALUES
(2, 'normal complaints', '', 'normal complaints', 'ktm basdjkfasdj ', 'fasdf jdk fk jfaklsd faskjdfaklsdfjaskfasfas fsfasf manoj', '293991109_108883358562889_4268494095250914623_n1661944276.jpg', 12323, 1, 1, 'normal', '2022-08-31 11:11:16', '2022-08-31 11:11:16'),
(25, 'etfqwer', '', 'erqwerqwer', 'qwerqwerqw', 'qwerqwerqwerqwerqwerwer', 'cyber-crime-sketch-300x1711663250594.jpg', 2147483647, 6, 1, 'normal', '2022-09-15 14:03:14', '2022-09-15 14:03:14'),
(26, 'dammar le sun chorera bhagyo]', 'Theft', 'dammar le sun choyo', 'pkr ratna chowk', 'ajhsdfkjasd fkh asdfkjahs dfkjah sdfkajsdfhasjdf haskdf  fhasjdhfkjasdhfkjhhdjfkhsdj\r\n', 'cyber-crime-sketch-300x1711663255463.jpg', 210330, 0, 3, 'emergency', '2022-09-15 15:24:23', '2022-09-15 15:24:23'),
(27, 'Thief', '', 'Aaudhogik chetra', 'Audhogik chetra', 'Thief ', 'inbound86895173024848265751663395639.jpg', 181758, 0, 1, 'emergency', '2022-09-17 06:20:39', '2022-09-17 06:20:39'),
(28, 'bike chori', 'Theft', 'pkr', 'pkr 0km', ' afldajs f aha lkaajkldfbasd fkjddashfsad f fasddhjfl sdafas  flsahf', 'logo1663396409.png', 363217, 0, 1, 'emergency', '2022-09-17 06:33:29', '2022-09-17 06:33:29'),
(29, 'सुन जस्तो देखिने पँहेलो धातु र डलर जस्तो नोटहरु सहित मानिस पक्राउ fdafsdfsdf', 'Theft', 'pkr', 'pkr ratna chowk', 'fsadfsd dsgdsfgd fg gds gdfsg dsfg dgfdgdfg', 'cyber-crime-sketch-300x1711663398020.jpg', 4081032, 6, 2, 'normal', '2022-09-17 07:00:20', '2022-09-17 07:00:20'),
(30, '3 software developers arrested for copying source code for sale', 'Fraud', 'asdfasdfasd', 'pkr ratna chowk', 'fasdfa dafda fasd fdsafsdf', '', 6704922, 6, 1, 'normal', '2022-09-17 07:13:00', '2022-09-17 07:13:00'),
(31, 'Theft', 'Theft', 'Baidam Police Station', 'Simalchaur', 'abc', 'logo1663481398.png', 944953, 0, 1, 'emergency', '2022-09-18 06:09:58', '2022-09-18 06:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `crimes`
--

CREATE TABLE `crimes` (
  `id` int(11) NOT NULL,
  `criminal` varchar(100) NOT NULL,
  `category` varchar(199) NOT NULL,
  `prison` varchar(100) NOT NULL,
  `court` varchar(188) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `place` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crimes`
--

INSERT INTO `crimes` (`id`, `criminal`, `category`, `prison`, `court`, `date`, `place`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Sanjog', 'Cyber Crime and Online Fraud', 'pokhara', 'District Court', '2022-08-09', 'pokhara', 'dfjkasdf akjdf akfjaskdlffj aksdfjk asdfka fhdkasf akfjkasdfjkals fasjd fkkasjfkas fkasjf\r\nasdjfkasd\r\nfsh fasasdfasdfasdf\r\ndfkjasdkfp\r\nasd foasdl\r\n]f asdfl]ads fb ', '2022-08-29 13:26:46', '2022-08-29 13:26:46'),
(2, 'Nabraj', 'Theft', 'dfasdfasdf', 'Subordinate Court', '2022-09-14', 'kathmandu', 'afkja sdhfka sfhas kfashfasjf\r\nmanoj ofjasd fjaksd lf dfsdfsd', '2022-09-08 14:46:31', '2022-09-08 14:46:31'),
(3, 'sudan', 'Fraud', 'pokhara', 'District Court', '2022-09-28', 'pokhara', 'fasdfa fasdfasd fasdf asdfasdf fasdfasdf', '2022-09-16 15:23:26', '2022-09-16 15:23:26');

-- --------------------------------------------------------

--
-- Table structure for table `criminals`
--

CREATE TABLE `criminals` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `surname` varchar(80) NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `province` varchar(50) NOT NULL,
  `district` varchar(80) NOT NULL,
  `city` varchar(80) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criminals`
--

INSERT INTO `criminals` (`id`, `name`, `surname`, `height`, `weight`, `gender`, `email`, `phone`, `province`, `district`, `city`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Sanjog', 'Bhandari ', 2, 20, 'M', 'example@gmail.com', '832572384', '4', '23', '1', '293991109_108883358562889_4268494095250914623_n1661780253.jpg', '2022-08-29 13:37:33', '2022-08-29 13:37:33'),
(3, 'Nabraj', 'Poudel', 4, 40, 'M', 'nabbe@gmail.com', '45234545345345', '4', '23', '1', '178687251_276375094223847_6954273604412772784_n1663250103.jpg', '2022-09-15 13:55:03', '2022-09-15 13:55:03'),
(6, 'sudan', 'bhandari', 5, 55, 'M', 'sudan@gmail.com', '5345345', '3', '18', '5', 'sanjog1663353488.jpg', '2022-09-16 18:38:08', '2022-09-16 18:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `surname` varchar(60) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `access` int(11) NOT NULL,
  `gender` varchar(9) NOT NULL DEFAULT 'M',
  `username` varchar(80) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `password` varchar(80) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `surname`, `email`, `phone`, `access`, `gender`, `username`, `photo`, `password`, `created_at`, `updated_at`) VALUES
(2, 'dammar', 'khadayat', 'dammar@gmail.com', '5967486547', 2, 'M', 'dammar', 'img_20220416_1727031663174195.jpg', '202cb962ac59075b964b07152d234b70', '2022-09-07 07:21:00', '2022-09-07 07:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `filemanager`
--

CREATE TABLE `filemanager` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `filelink` varchar(255) NOT NULL,
  `ext` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filemanager`
--

INSERT INTO `filemanager` (`id`, `name`, `filelink`, `ext`) VALUES
(1, 'profile', '298365786_481284430491803_825195132210613500_n1661781382.jpg', 'jpg'),
(2, 'profile', 'img_20220912_1641491663261652.jpg', 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `category` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `image`, `category`, `title`, `description`, `date`) VALUES
(3, 'array1662472117.jpg', 'Theft', 'सुन जस्तो देखिने पँहेलो धातु र डलर जस्तो नोटहरु सहित मानिस पक्राउसुन जस्तो ', 'सुन जस्तो देखिने पँहेलो धातु र डलर जस्तो नोटहरु सहित मानिस पक्राउसुन जस्तो देखिने पँहेलो धातु र डलर जस्तो नोटहरु सहित मानिस पक्राउसुन जस्तो देखिने पँहेलो धातु र डलर जस्तो नोटहरु सहित मानिस पक्राउसुन जस्तो देखिने पँहेलो धातु र डलर जस्तो नोटहरु सहित मानिस पक्राउ', '2022-09-07'),
(5, 'array1662623021.jpg', 'Theft', '<b>अशोक राईदेखि मदन भण्डारीसम्मले ओढेको बर्को</b>', 'अशोक राईदेखि मदन भण्डारीसम्मले ओढेको बर्कोअशोक राईदेखि मदन भण्डारीसम्मले ओढेको बर्कोअशोक राईदेखि मदन भण्डारीसम्मले ओढेको बर्कोअशोक राईदेखि मदन भण्डारीसम्मले ओढेको बर्कोअशोक राईदेखि मदन भण्डारीसम्मले ओढेको बर्कोअशोक राईदेखि मदन भण्डारीसम्मले ओढेको बर्कोअशोक राईदेखि मदन भण्डारीसम्मले ओढेको बर्कोअशोक राईदेखि मदन भण्डारीसम्मले ओढेको बर्को', '2022-09-14'),
(6, 'array1663180566.jpg', 'Theft', '3 software developers arrested for copying source code for sale ', 'Police have arrested three software developers on the charge of copying the source code of a software programme developed by another company to create a new programme and selling it.\r\n\r\nThe suspects have been identified as Bimal KC, Shyam Bahadur Chaudhary, and Shankar Gyawali, the operators of Preface Technology Pvt Ltd.\r\n\r\nSSP Nabinda Aryal, the spokesperson of the Nepal Police Cyber Bureau, says they copied the code of the programme developed and owned by National Software and IT Solution.\r\n\r\nThey were arrested as per the Electronic Transactions Act, 2006 on Sunday. The Kathmandu District Court has remanded them in custody for six days. ', '2022-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `siteconfig`
--

CREATE TABLE `siteconfig` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `site_key` varchar(250) NOT NULL,
  `site_value` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siteconfig`
--

INSERT INTO `siteconfig` (`id`, `name`, `site_key`, `site_value`, `status`, `created_at`, `updated_at`) VALUES
(2, 'contact', 'contact', '24387523489 asdfasdf', 1, '2022-09-08 14:30:34', '2022-09-08 14:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `citizenshipno` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `phone`, `gender`, `photo`, `citizenshipno`, `province`, `district`, `city`, `password`, `created_at`, `updated_at`) VALUES
(1, 'manoj', 'bastola', 'manoj1@gmail.com ', '897898798', 'm', '293991109_108883358562889_4268494095250914623_n1661782884.jpg', '35872347659837568972', 'gandaki', 'pokhara', 'kaski', '5e81f9859d223ea420aca993c647b839', '2022-08-29 14:21:24', '2022-08-29 14:21:24'),
(2, 'Sanjog', 'Bhandari', 'sanjog@gmail.com', '98797897', 'f', 'fasci0txoaawwhz1662368735.jpg', '254324543521', 'pr', '', 'kaski', '5e81f9859d223ea420aca993c647b839', '2022-09-05 09:05:35', '2022-09-05 09:05:35'),
(6, 'manoj', 'bastola', 'manoj@gmail.com', '9806630566', 'm', 'edited_own_pic1663162057.jpg', '32452345243', 'gandaki', 'asdfasdf', 'fgasdfasd', '202cb962ac59075b964b07152d234b70', '2022-09-14 13:27:37', '2022-09-14 13:27:37'),
(7, 'Sanog', 'Bhandarri', 'sanjog@etc.com', '9806630566', 'f', 'logo1663471751.png', '112', 'gandaki', 'pokhara', 'Kaski', '202cb962ac59075b964b07152d234b70', '2022-09-18 03:29:11', '2022-09-18 03:29:11'),
(8, 'Nabraj', 'Poudel', 'abc@etc.com', '897898798', 'm', 'logo1663481497.png', '123', 'gandaki', 'pokhara', 'Kaski', '202cb962ac59075b964b07152d234b70', '2022-09-18 06:11:37', '2022-09-18 06:11:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crimes`
--
ALTER TABLE `crimes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criminals`
--
ALTER TABLE `criminals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filemanager`
--
ALTER TABLE `filemanager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siteconfig`
--
ALTER TABLE `siteconfig`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `crimes`
--
ALTER TABLE `crimes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `criminals`
--
ALTER TABLE `criminals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `filemanager`
--
ALTER TABLE `filemanager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siteconfig`
--
ALTER TABLE `siteconfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
