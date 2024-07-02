-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 10:23 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seasalon`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `BranchId` int(11) NOT NULL,
  `BranchName` varchar(255) NOT NULL,
  `BranchLocation` varchar(255) NOT NULL,
  `OpeningTime` varchar(255) NOT NULL,
  `ClosingTime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`BranchId`, `BranchName`, `BranchLocation`, `OpeningTime`, `ClosingTime`) VALUES
(1, 'SEA Salon - Branch Malang', 'Jl. Soekarno - Hatta, Mojolangu, Kec. Lowokwaru, Kota Malang, Jawa Timur', '09.00 AM', '09.00 PM'),
(3, 'SEA Salon - Branch Surabaya', 'Jl. Raya Gubeng, Gubeng, Kec. Gubeng, Surabaya, Jawa Timur 60281', '10.00 AM', '09.00 PM'),
(4, 'SEA Salon - Branch Jakarta', 'Jl. Kembangan Raya, Kembangan Utara, Kec. Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta', '09.00 AM', '08.00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `Id` int(11) NOT NULL,
  `Comment` varchar(255) DEFAULT NULL,
  `Star` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservationId` int(11) NOT NULL,
  `branchId` int(11) NOT NULL,
  `serviceId` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservationId`, `branchId`, `serviceId`, `date`, `time`) VALUES
(1, 3, 2, '2024-07-04', 'slot1'),
(2, 1, 1, '2024-07-04', 'slot3');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceId` int(11) NOT NULL,
  `serviceName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceId`, `serviceName`) VALUES
(1, 'Haircut and Styling'),
(2, 'Manicure and Pedicure'),
(3, 'Facial Treatments');

-- --------------------------------------------------------

--
-- Table structure for table `servicelist`
--

CREATE TABLE `servicelist` (
  `id` int(11) NOT NULL,
  `branchId` int(11) NOT NULL,
  `serviceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicelist`
--

INSERT INTO `servicelist` (`id`, `branchId`, `serviceId`) VALUES
(1, 1, 1),
(10, 1, 3),
(19, 3, 2),
(20, 3, 3),
(23, 4, 1),
(27, 4, 2),
(32, 4, 3),
(35, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `password`, `email`, `phone`, `role`) VALUES
(5, 'tes', '$2y$10$0waM.8rVqh8SCy6m3AJRcun/jYTrd84XabHTR/1xX.13Kvc06i12m', '1@gmail.com', '1', 'user'),
(8, 'Thomas N', '$2y$10$tfKseRpZRrsSl19Nm/8wx.LKelVklcWBJSD3vQdC5YzY0302hrCw2', 'thomas.n@compfest.id', '08123456789', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`BranchId`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservationId`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceId`);

--
-- Indexes for table `servicelist`
--
ALTER TABLE `servicelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `BranchId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1691;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `servicelist`
--
ALTER TABLE `servicelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
