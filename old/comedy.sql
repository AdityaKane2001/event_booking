-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2022 at 06:35 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comedy`
--

-- --------------------------------------------------------

--
-- Table structure for table `money`
--

CREATE TABLE `money` (
  `uid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `money`
--

INSERT INTO `money` (`uid`, `tid`, `total`) VALUES
(14, 16, 28800),
(15, 17, 12500),
(16, 18, 9000),
(14, 19, 27500),
(17, 20, 12500),
(14, 21, 18500),
(14, 22, 9500),
(16, 23, 7200);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `seats` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `days` varchar(5) NOT NULL,
  `foodpass` int(11) NOT NULL,
  `uniqueid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`tid`, `uid`, `seats`, `type`, `days`, `foodpass`, `uniqueid`) VALUES
(16, 14, 4, 'standard', '2,3,4', 0, 9793270601),
(17, 15, 2, 'vip', ',,3,4', 1, 5338414852),
(18, 16, 2, 'standard', ',,2,4', 0, 9819696032),
(19, 14, 5, 'standard', '2,3,4', 1, 9793270601),
(20, 17, 2, 'vip', ',,2,3', 1, 2022331420),
(21, 14, 5, 'standard', '2,3,', 1, 9793270601),
(22, 14, 5, 'standard', '3,', 1, 9793270601),
(23, 16, 4, 'standard', '4,', 0, 9819696032);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `uniqueid` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `uniqueid`) VALUES
(14, 'aditya', 'a230b06a0387f5c697f08d83517cbb5d', 9793270601),
(15, 'Tanvesh', 'd97287d4373014493df24ba5a5bf128d', 5338414852),
(16, 'shantanu', 'ab56b4d92b40713acc5af89985d4b786', 9819696032),
(17, 'manish', 'a230b06a0387f5c697f08d83517cbb5d', 2022331420);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `phone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `email`, `address`, `pincode`, `phone`) VALUES
(14, 'Aditya Kane', 'adityakane1@gmail.com', 'saf', 222222, 2222222222),
(15, 'tanvesh', 'dff@gmail.com', 'Dhankawdi', 432223, 1233444555),
(16, 'Shantanu Deshpande', 'shantanudeshpande00@gmail.com', 'Kothrud,Pune-38', 411038, 7350322340),
(17, 'Manish Kane', 'manishmkane@gmail.com', 'sad', 222222, 2222222222);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `money`
--
ALTER TABLE `money`
  ADD KEY `fk_uid_money` (`uid`),
  ADD KEY `fk_tid_money` (`tid`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `fk_user_id` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `money`
--
ALTER TABLE `money`
  ADD CONSTRAINT `fk_tid_money` FOREIGN KEY (`tid`) REFERENCES `transactions` (`tid`),
  ADD CONSTRAINT `fk_uid_money` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `fk_id_user_info_users` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
