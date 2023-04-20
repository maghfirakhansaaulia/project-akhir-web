-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 08:37 AM
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
-- Database: `pasar_segari`
--

-- --------------------------------------------------------

--
-- Table structure for table `petani`
--

CREATE TABLE `petani` (
  `petani_id` int(11) NOT NULL,
  `petani_name` varchar(255) NOT NULL,
  `petani_phone` char(255) NOT NULL,
  `petani_email` varchar(255) NOT NULL,
  `petani_group` varchar(255) NOT NULL,
  `petani_address` varchar(255) NOT NULL,
  `petani_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petani`
--

INSERT INTO `petani` (`petani_id`, `petani_name`, `petani_phone`, `petani_email`, `petani_group`, `petani_address`, `petani_password`) VALUES
(1, 'yuniyah', '085250647889', 'yuniku@gmail.com', 'yuniyu sayuryu', 'jl. banggries', '$2y$10$0DDoTOgD6hVsoiE.t91/QeO/nCY17CY0i7EqzJyK.ovkGO.48Lw.y'),
(2, 'erpan', '084256978556', 'erpangg@gmail.com', 'erpan adagus', 'jl. antasari', '$2y$10$OI3fOclTkhimT7CvDH/CPu7hMtXbN8U3McbSPYl5xVxidO7rnrsOW');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `toko_id` int(11) NOT NULL,
  `toko_name` varchar(255) NOT NULL,
  `toko_phone` char(255) NOT NULL,
  `toko_email` varchar(255) NOT NULL,
  `toko_shopname` varchar(255) NOT NULL,
  `toko_address` varchar(255) NOT NULL,
  `toko_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`toko_id`, `toko_name`, `toko_phone`, `toko_email`, `toko_shopname`, `toko_address`, `toko_password`) VALUES
(1, 'salasah', '082356987451', ' toko sulasah selalu', 'sulasah@gmail.com', 'jl. meranti', '$2y$10$q18Txc/szq1Pqp7eo044TORTJbC3nCPF2UfN4gy9N/cYQRFCcFWx.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` char(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_phone`, `user_email`, `user_address`, `user_password`) VALUES
(1, 'ahmad lutfi', '089690742663', '1234@email', 'jl.cendana gg 15', '$2y$10$gbNZL6Uwa7PrFTkI50AXmeJwldmW0ewXUCXYzl8R6C8Q6h9SW8wAy'),
(2, 'udin', '089595742668', 'udin@email', 'jl.banggries ', '$2y$10$YxUQ8HzOYEiV3TEVcM6zZuWIt2qWrCS0QN/3Q8//UMCibCZwrgHSq'),
(3, 'asdas', '089595742668', 'ud@email', 'jl.banggries', '$2y$10$i5hcE38SExD46JhIRIpvx.f2G6bRAfM3ZdB0grRz86sML9klNa/ti'),
(4, 'ahmad', '089690743662', 'ahmad@gmail.com', 'jl. cengada', '$2y$10$T2DhY7WbkR3.djZooUqHGO20y8urjBksQeGImTYU2a4cL1alvlp6a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `petani`
--
ALTER TABLE `petani`
  ADD PRIMARY KEY (`petani_id`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`toko_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `petani`
--
ALTER TABLE `petani`
  MODIFY `petani_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `toko_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
