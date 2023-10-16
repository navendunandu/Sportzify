-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 10:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sportzify`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(15) NOT NULL,
  `admin_email` varchar(20) NOT NULL,
  `admin_password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin', 'admin@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(10) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` int(10) NOT NULL,
  `turf_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `cart_quantity` int(50) NOT NULL DEFAULT 1,
  `cart_status` int(50) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(10) NOT NULL,
  `complaint_date` int(8) NOT NULL,
  `complaint_replay` varchar(15) NOT NULL,
  `complaint_status` varchar(15) NOT NULL,
  `user_id` int(8) NOT NULL,
  `turf_id` int(8) NOT NULL,
  `complaint_details` varchar(15) NOT NULL,
  `complaint_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pbook`
--

CREATE TABLE `tbl_pbook` (
  `booking_id` int(100) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_amount` int(100) NOT NULL,
  `user_id` int(50) NOT NULL,
  `booking_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(30) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(20) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_detail` varchar(500) NOT NULL,
  `product_rate` int(10) NOT NULL,
  `product_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productrating`
--

CREATE TABLE `tbl_productrating` (
  `prating_id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `user_rating` varchar(50) NOT NULL,
  `user_review` varchar(1000) NOT NULL,
  `user_id` int(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `review_datetime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(10) NOT NULL,
  `review_date` date NOT NULL,
  `review_details` varchar(15) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `turf_id` varchar(15) NOT NULL,
  `review_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(50) NOT NULL,
  `stock_quantity` int(100) NOT NULL,
  `stock_date` date NOT NULL,
  `product_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_turf`
--

CREATE TABLE `tbl_turf` (
  `turf_id` int(15) NOT NULL,
  `turf_name` varchar(20) NOT NULL,
  `turf_details` varchar(50) NOT NULL,
  `turf_logo` varchar(300) NOT NULL,
  `turf_proof` varchar(300) NOT NULL,
  `turf_address` varchar(50) NOT NULL,
  `place_id` int(15) NOT NULL,
  `turf_5s` varchar(15) NOT NULL,
  `turf_7s` varchar(15) NOT NULL,
  `turf_11s` varchar(15) NOT NULL,
  `turf_cricket` varchar(15) NOT NULL,
  `turf_doe` date NOT NULL,
  `turf_email` varchar(100) NOT NULL,
  `turf_password` varchar(8) NOT NULL,
  `turf_vstatus` int(11) NOT NULL DEFAULT 0,
  `turf_contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_turffeedback`
--

CREATE TABLE `tbl_turffeedback` (
  `feedback_id` int(50) NOT NULL,
  `feedback_title` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `turf_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_email` varchar(15) NOT NULL,
  `user_password` varchar(8) NOT NULL,
  `user_address` varchar(25) NOT NULL,
  `user_contact` varchar(20) NOT NULL,
  `user_photo` varchar(300) NOT NULL,
  `user_dob` int(8) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_pbook`
--
ALTER TABLE `tbl_pbook`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_productrating`
--
ALTER TABLE `tbl_productrating`
  ADD PRIMARY KEY (`prating_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_turf`
--
ALTER TABLE `tbl_turf`
  ADD PRIMARY KEY (`turf_id`);

--
-- Indexes for table `tbl_turffeedback`
--
ALTER TABLE `tbl_turffeedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pbook`
--
ALTER TABLE `tbl_pbook`
  MODIFY `booking_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_productrating`
--
ALTER TABLE `tbl_productrating`
  MODIFY `prating_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_turf`
--
ALTER TABLE `tbl_turf`
  MODIFY `turf_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_turffeedback`
--
ALTER TABLE `tbl_turffeedback`
  MODIFY `feedback_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
