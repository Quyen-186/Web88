-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 11, 2024 at 06:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phanloai`
--

CREATE TABLE `phanloai` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phanloai`
--

INSERT INTO `phanloai` (`category_id`, `category_name`) VALUES
(1, 'Weights'),
(2, 'Machines'),
(3, 'Drugs');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` varchar(20) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`product_id`, `name`, `description`, `price`, `stock_quantity`, `image_url`, `category_id`) VALUES
(68, 'Weights (1)', 'Weights for you to lift\r\n\r\nmore lift = more power', '1500000', 99, 'Ảnh sản phẩm hot nhất/1.png', 1),
(69, 'Máy chạy bộ', 'máy chạy bộ trẻ khỏe đẹp ', '15000000', 69, 'Ảnh sản phẩm hot nhất/5.png', 2),
(70, 'Tạ nhỏ vl', 'Tạ nhỏ cho mấy thằng pú sỳ', '500000', 99, 'Ảnh sản phẩm hot nhất/2.png', 1),
(71, 'Adu máy tập gym', 'quao', '500000000', 5, 'Ảnh sản phẩm hot nhất/3.png', 2),
(72, 'Adu ghế đẩy ngực ae', 'holy shit it\'s a fucking bench press', '10000000', 50, 'Ảnh sản phẩm hot nhất/4.png', 2),
(80, 'Roid 1', 'adu Roid 1', '50000', 99, 'Ảnh sản phẩm whey protein bán chạy/6.png', 3),
(81, 'Roid 2', 'adu Roid 2', '50000', 99, 'Ảnh sản phẩm whey protein bán chạy/7.png', 3),
(82, 'Roid 3', 'adu Roid 3', '50000', 99, 'Ảnh sản phẩm whey protein bán chạy/8.png', 3),
(83, 'Roid 4', 'adu Roid 4', '50000', 99, 'Ảnh sản phẩm whey protein bán chạy/9.png', 3),
(84, 'Roid 5', 'adu Roid 5', '50000', 99, 'Ảnh sản phẩm whey protein bán chạy/10.png', 3),
(85, 'Roid 6', 'afsasda', '500000', 9, 'Ảnh sản phẩm whey protein bán chạy/8.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `isadmin` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`username`, `password`, `name`, `address`, `phone`, `email`, `isadmin`, `status`) VALUES
('a', 'a', 'a', 'a', 'a', 'a', 0, 1),
('gabr4ca', '123456', 'Hồ Nguyên Minh', 'Mars, Milky Way', '0969969696', 'testtest@gmail.com', 1, 1),
('quyen', '123456', 'Thông Trung Quyền', '99/9 tên lửa bình tân', '0313131321', 'lolbruh@gmail.com', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `username` (`username`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `phanloai`
--
ALTER TABLE `phanloai`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phanloai`
--
ALTER TABLE `phanloai`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`username`) REFERENCES `taikhoan` (`username`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `sanpham` (`product_id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `phanloai` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
