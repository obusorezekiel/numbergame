-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2017 at 12:54 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `numbergame`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(7) NOT NULL,
  `email` varchar(100) NOT NULL,
  `num1` int(15) NOT NULL,
  `spin` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `num1`, `spin`) VALUES
(1, 'joseph11@gmail.com', 431, 'conditional');

-- --------------------------------------------------------

--
-- Table structure for table `hints`
--

CREATE TABLE `hints` (
  `id` int(5) NOT NULL,
  `email` varchar(25) NOT NULL,
  `num1` int(11) NOT NULL,
  `num2` int(11) NOT NULL,
  `num3` int(11) NOT NULL,
  `num4` int(11) NOT NULL,
  `num5` int(11) NOT NULL,
  `num6` int(11) NOT NULL,
  `num7` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hints`
--

INSERT INTO `hints` (`id`, `email`, `num1`, `num2`, `num3`, `num4`, `num5`, `num6`, `num7`) VALUES
(1, 'joseph11@gmail.com', 765, 654, 543, 432, 431, 210, 199);

-- --------------------------------------------------------

--
-- Table structure for table `num_input`
--

CREATE TABLE `num_input` (
  `email` varchar(25) NOT NULL,
  `num1` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `num_input`
--

INSERT INTO `num_input` (`email`, `num1`) VALUES
('aman@aman.com', '999'),
('aman@aman.com', '523'),
('aman@aman.com', '654'),
('obey@yahoo.com', '234'),
('aman@aman.com', '432'),
('obey@yahoo.com', '765'),
('obusoru@yahoo.com', '431');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `category` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `category`) VALUES
(1, 'umesi', 'qwert@gmail.com', 12345, 'd41d8cd98f00b204e9800998ecf8427e', ''),
(2, 'umesi', 'qwerteee@gmail.com', 12345, 'd8578edf8458ce06fbc5bb76a58c5ca4', ''),
(3, 'Umes', 'zxcv@yahoo.com', 345432343, '376c43878878ac04e05946ec1dd7a55f', 'users'),
(4, 'Joseph', 'joseph11@gmail.com', 8033392208, '02c75fb22c75b23dc963c7eb91a062cc', 'admin'),
(10, 'Aman', 'aman@aman.com', 7065362762, 'd8578edf8458ce06fbc5bb76a58c5ca4', 'users'),
(9, 'Obey', 'obey@yahoo.com', 9023426347, 'd8578edf8458ce06fbc5bb76a58c5ca4', 'users'),
(11, 'Umesi', 'obusoru@yahoo.com', 7065424399, '02c75fb22c75b23dc963c7eb91a062cc', 'users');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hints`
--
ALTER TABLE `hints`
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
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hints`
--
ALTER TABLE `hints`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
