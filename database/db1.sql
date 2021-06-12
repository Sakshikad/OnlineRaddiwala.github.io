-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 09:52 AM
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
-- Database: `db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `rating` int(1) NOT NULL,
  `comment` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `username`, `rating`, `comment`) VALUES
(1, 'sakshi kad', 5, 'good work');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`) VALUES
(1, 'pranil', 'qasw', 'pranil@gmail.com'),
(2, 'sakshi kad', 'sakshi@123', 'sakshikad51@gmail.com'),
(3, 'jagruti kad', 'jagu', 'jagruti@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pickup`
--

CREATE TABLE `pickup` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `address` varchar(20) NOT NULL,
  `area` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `date` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `scrap` varchar(200) NOT NULL,
  `postingdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pickup`
--

INSERT INTO `pickup` (`id`, `name`, `phone`, `address`, `area`, `city`, `pincode`, `date`, `time`, `scrap`, `postingdate`, `login_id`) VALUES
(1, 'pranil7', '8425049922', 'mumbai ', 'kandivali', 'kandivali', '10101', '2021-05-27', '22:00', 'Copy', '2021-05-27 12:25:59', 1),
(4, 'sakshi kad', '9545373480', 'wadki', 'Hadpsar', 'Pune', '412308', '2021-06-02', '16:28', 'Carton', '2021-05-28 06:59:00', 2),
(5, 'sakshi kad', '9545373480', 'wadki', 'saswad', 'Pune', '412308', '2021-05-05', '12:33', 'Grey Board', '2021-05-28 07:01:09', 2),
(6, 'sakshi kad', '9545373480', 'wadki', 'Hadpsar', 'Pune', '412308', '2021-04-26', '12:33', 'Newspaper', '2021-05-28 07:00:00', 2),
(7, 'sakshi kad', '9545373480', 'wadki', 'Hadpsar', 'Pune', '412308', '2021-05-28', '16:30', 'Rough paper', '2021-05-28 07:00:26', 2),
(8, 'sakshi kad', '9545373480', 'wadki', 'Hadpsar', 'Pune', '412308', '2021-05-28', '16:32', 'Plain paper', '2021-05-28 07:02:48', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickup`
--
ALTER TABLE `pickup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_pickup_1` (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pickup`
--
ALTER TABLE `pickup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
