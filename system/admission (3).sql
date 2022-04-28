-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2021 at 06:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `a_id` int(10) NOT NULL,
  `id` int(11) NOT NULL,
  `umobile` varchar(15) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pocc` varchar(100) NOT NULL,
  `pmobile` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `ctole` varchar(100) NOT NULL,
  `cmun` varchar(100) NOT NULL,
  `ccity` varchar(100) NOT NULL,
  `ptole` varchar(100) NOT NULL,
  `pmun` varchar(100) NOT NULL,
  `pcity` varchar(100) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `tboard` varchar(20) NOT NULL,
  `tyear` int(10) NOT NULL,
  `tgpa` float NOT NULL,
  `bboard` varchar(20) NOT NULL,
  `byear` int(10) NOT NULL,
  `bgpa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`a_id`, `id`, `umobile`, `pname`, `pocc`, `pmobile`, `gender`, `ctole`, `cmun`, `ccity`, `ptole`, `pmun`, `pcity`, `subject`, `tboard`, `tyear`, `tgpa`, `bboard`, `byear`, `bgpa`) VALUES
(1, 2, '9843820746', 'Rita Bhurtel', 'Bussiness', '9808770040', 'Male', 'Nagdhunga', 'Chandragiri', 'Kathmandu', 'Nagdhunga', 'Chandragiri', 'KTM', 'BSW', 'SLC', 2017, 3.6, 'NEB', 2019, 3.67),
(7, 6, '000000000', 'User Parents', 'Occupation', '0000000000', 'Male', '\r\n			  Tole', 'Municipality', 'City', 'Tole', 'Municipality', 'City', 'BCA', 'SLC', 2017, 3.6, 'NEB', 2019, 3.67);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `f_id` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `photo` varbinary(25) NOT NULL,
  `slc` varbinary(25) NOT NULL,
  `character12` varbinary(25) NOT NULL,
  `trans` varbinary(25) NOT NULL,
  `citizen_f` varbinary(25) NOT NULL,
  `citizen_b` varbinary(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`f_id`, `id`, `photo`, `slc`, `character12`, `trans`, `citizen_f`, `citizen_b`) VALUES
(1, 2, 0x53637265656e73686f742028313237292e706e67, 0x534c4320436861726163746572204365727469666963617465, 0x454943204368617261637465722e706466, 0x5472616e7363726970742e706466, 0x436574697a656e736869702066726f6e7420736964652e7064, 0x436574697a656e73686970206261636b20736964652e706466),
(7, 6, 0x75736572312e6a7067, 0x7573657231322e706e67, 0x63697469622e6a7067, 0x7573657231322e706e67, 0x636974692e6a7067, 0x75736572312e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `s_id` int(5) NOT NULL,
  `id` int(100) NOT NULL,
  `status` varchar(55) NOT NULL DEFAULT 'Unknown'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`s_id`, `id`, `status`) VALUES
(1, 2, 'Accepted'),
(7, 6, 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `user_type`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '0192023a7bbd73250516f069df18b500', 'admin'),
(2, 'Sabin', 'Bhurtel', 'sabinbhurtel@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(4, 'Surakshya', 'Bhattarai', 'surakshyabhattarai235@gmail.com', '5bdb271378ae082005bf892dac42aeb0', 'user'),
(6, 'user', 'user', 'rajarambhurtel@gmail.com', '6ad14ba9986e3615423dfca256d04e3f', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `f_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `s_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
