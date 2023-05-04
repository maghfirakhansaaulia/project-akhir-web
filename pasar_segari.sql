-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2023 at 05:17 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_phone` char(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_phone`, `admin_email`, `admin_password`) VALUES
(3, 'admin', '085252636369', 'segariku@gmail.com', '$2y$10$uFWeDtofuj24kBkKIp5/Vu9Yc2J8GTLTyGVZI7tTZBNHUPQZOySka');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `toko_id` int(11) NOT NULL,
  `toko_name` varchar(255) NOT NULL,
  `toko_phone` char(255) NOT NULL,
  `toko_shopname` varchar(255) NOT NULL,
  `toko_email` varchar(255) NOT NULL,
  `toko_address` varchar(255) NOT NULL,
  `toko_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`toko_id`, `toko_name`, `toko_phone`, `toko_shopname`, `toko_email`, `toko_address`, `toko_password`) VALUES
(1, 'salasah', '082356987451', ' toko sulasah selalu', 'sulasah@gmail.com', 'jl. meranti', '$2y$10$q18Txc/szq1Pqp7eo044TORTJbC3nCPF2UfN4gy9N/cYQRFCcFWx.'),
(2, 'gradias', '085648953214', ' bahtera dias', 'dias@gmail.com', 'jl. ulin', '$2y$10$AJ9uGpjju/gqBOCWu9UR0ekTwAsJYBxqbD7yotBBMB8zRN6yN60PC');

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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `toko_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
