-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 05:38 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_phone`, `admin_email`, `admin_password`) VALUES
(1, 'yuniyah', '085250647889', 'yuniku@gmail.com', '$2y$10$0DDoTOgD6hVsoiE.t91/QeO/nCY17CY0i7EqzJyK.ovkGO.48Lw.y'),
(2, 'erpan', '084256978556', 'erpangg@gmail.com', '$2y$10$OI3fOclTkhimT7CvDH/CPu7hMtXbN8U3McbSPYl5xVxidO7rnrsOW');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `artikel_id` int(11) NOT NULL,
  `artikel_title` varchar(255) NOT NULL,
  `artikel_content` text NOT NULL,
  `artikel_date` date NOT NULL,
  `gambar_id` int(11) NOT NULL,
  `katA_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `artikel_status` varchar(255) NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `gambar_id` int(11) NOT NULL,
  `gambar_blb` blob NOT NULL,
  `gambar_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kat_artikel`
--

CREATE TABLE `kat_artikel` (
  `katA_id` int(11) NOT NULL,
  `katA_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kat_produk`
--

CREATE TABLE `kat_produk` (
  `katP_id` int(11) NOT NULL,
  `katP_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `toko_id` int(11) NOT NULL,
  `produk_name` varchar(255) NOT NULL,
  `produk_var1` varchar(255) NOT NULL,
  `produk_var2` varchar(255) NOT NULL DEFAULT 'kosong',
  `produk_var1pc` int(11) NOT NULL,
  `produk_var2pc` int(11) NOT NULL DEFAULT 0,
  `produk_description` text NOT NULL,
  `gambar_id` int(11) NOT NULL,
  `katP_id` int(11) NOT NULL,
  `produk_status` varchar(255) NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`toko_id`, `toko_name`, `toko_phone`, `toko_shopname`, `toko_email`, `toko_address`, `toko_password`) VALUES
(1, 'salasah', '082356987451', ' toko sulasah selalu', 'sulasah@gmail.com', 'jl. meranti', '$2y$10$q18Txc/szq1Pqp7eo044TORTJbC3nCPF2UfN4gy9N/cYQRFCcFWx.'),
(2, 'gradias', '085648953214', ' bahtera dias', 'dias@gmail.com', 'jl. ulin', '$2y$10$AJ9uGpjju/gqBOCWu9UR0ekTwAsJYBxqbD7yotBBMB8zRN6yN60PC');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `transaksi_date` date NOT NULL,
  `transaksi_note` text NOT NULL,
  `produk_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaksi_amount` int(11) NOT NULL,
  `transaksi_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`artikel_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `gambar_id` (`gambar_id`),
  ADD KEY `katA_id` (`katA_id`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`gambar_id`);

--
-- Indexes for table `kat_artikel`
--
ALTER TABLE `kat_artikel`
  ADD PRIMARY KEY (`katA_id`);

--
-- Indexes for table `kat_produk`
--
ALTER TABLE `kat_produk`
  ADD PRIMARY KEY (`katP_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`),
  ADD KEY `gambar_id` (`gambar_id`),
  ADD KEY `katP_id` (`katP_id`),
  ADD KEY `toko_id` (`toko_id`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`toko_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `produk_id` (`produk_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `artikel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `gambar_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kat_artikel`
--
ALTER TABLE `kat_artikel`
  MODIFY `katA_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kat_produk`
--
ALTER TABLE `kat_produk`
  MODIFY `katP_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `toko_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `artikel_ibfk_2` FOREIGN KEY (`gambar_id`) REFERENCES `gambar` (`gambar_id`),
  ADD CONSTRAINT `artikel_ibfk_3` FOREIGN KEY (`katA_id`) REFERENCES `kat_artikel` (`katA_id`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`gambar_id`) REFERENCES `gambar` (`gambar_id`),
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`katP_id`) REFERENCES `kat_produk` (`katP_id`),
  ADD CONSTRAINT `produk_ibfk_3` FOREIGN KEY (`toko_id`) REFERENCES `toko` (`toko_id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
