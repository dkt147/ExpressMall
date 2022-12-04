-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 09:48 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_Id` int(11) NOT NULL,
  `u_Id` int(11) NOT NULL,
  `p_Id` int(11) NOT NULL,
  `is_confirm` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_Id`, `u_Id`, `p_Id`, `is_confirm`) VALUES
(9, 1, 3, 0),
(10, 1, 4, 0),
(11, 1, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_Id` int(25) NOT NULL,
  `cat_Title` varchar(50) NOT NULL,
  `dateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_Id`, `cat_Title`, `dateCreated`) VALUES
(1, 'Grocery', '2022-11-17'),
(2, 'Crockery', '2022-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_Id` int(25) NOT NULL,
  `cat_Id` int(25) NOT NULL,
  `p_Title` varchar(50) NOT NULL,
  `p_Price` int(25) NOT NULL,
  `p_Image` varchar(150) NOT NULL,
  `p_Description` varchar(500) NOT NULL,
  `p_RegisteredOn` date NOT NULL,
  `p_Status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_Id`, `cat_Id`, `p_Title`, `p_Price`, `p_Image`, `p_Description`, `p_RegisteredOn`, `p_Status`) VALUES
(1, 1, 'Almonds', 500, './imgs/Grocery/Almonds.png', 'Freshly Picked Almonds', '2022-11-17', 'Available'),
(2, 1, 'Aloe Vera Gel', 350, './imgs/Grocery/AloeVera Gel.png', '250 gram pack of Aloe Vera Gel', '2022-11-17', 'Available'),
(3, 2, 'Angle Cups', 750, './imgs/Crockery/AngleCups.png', 'White and Golden colored fancy cups', '2022-11-17', 'Available'),
(4, 1, 'Meat', 950, './imgs/Grocery/Fresh Meat.png', '1Kg pack of fresh meat', '2022-11-17', 'Available'),
(5, 2, 'Red Cups Set', 450, './imgs/Crockery/Beautiful Red Cup.png', 'A set of 6 beautiful cups set with serving plates', '2022-11-16', 'Available'),
(6, 2, 'Cutlery Set', 500, './imgs/Crockery/Black Cutlery Set.png', 'Complete set of fork and spoons', '2022-11-16', 'Available'),
(7, 1, ' Tomatoes', 180, './imgs/Grocery/Fresh Red Tomatoes.png', '1Kg pack of freshly picked to tomatoes', '2022-11-16', 'Available'),
(8, 2, 'Coffee Cups', 800, './imgs/Crockery/cup-coffee-with-standing-books-glass-table.jpg', 'Contrast Colored set of cups including serving plates', '2022-11-15', 'Available'),
(9, 2, 'Fancy Plates', 950, './imgs/Crockery/Fancy Plates Set.png', 'A set of beautiful rice plates', '2022-11-15', 'Available'),
(11, 1, 'Lemon', 180, './imgs/Grocery/Lemon.png', 'Freshly picked organic lemon', '2022-11-17', 'Available'),
(12, 1, 'Multi Vitamins', 800, './imgs/Grocery/Oragnic Capsules With Omega3.png', 'Multi Vitamin Capsules with Omega 3', '2022-11-19', 'Available'),
(13, 2, 'Fancy Stand Glasses', 750, './imgs/Crockery/Glasses.png', 'Fancy stand glasses set with 6 glasses', '2022-11-14', 'Available'),
(14, 2, ' Dinner Set', 25000, './imgs/Crockery/Green Dinner Set.png', 'Double Colored Dinner Set for 8 people', '2022-11-22', 'Available'),
(15, 2, 'IceCream Cups', 120, './imgs/Crockery/IceCream Cups.png', 'Also available in multi colors', '2022-11-22', 'Available'),
(16, 1, 'Fruits Shampoo', 500, './imgs/Grocery/Fruits Shampoo.png', 'Fruits Shampoo with multi vitamins which help to soften your hairs', '2022-11-22', 'Available'),
(17, 1, 'Fresh Oranges', 180, './imgs/Grocery/Oranges.png', 'Freshly picked oranges from farm', '2022-11-24', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `phoneNo.` int(11) NOT NULL,
  `dateRegistered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `username`, `password`, `phoneNo.`, `dateRegistered`) VALUES
(1, 'Admin', 'admin123', 314748647, '2022-11-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_Id`),
  ADD KEY `p_Index` (`u_Id`,`p_Id`),
  ADD KEY `p_Id` (`p_Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_Id`),
  ADD KEY `cat_Id` (`cat_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_Id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_Id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`u_Id`) REFERENCES `user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`p_Id`) REFERENCES `products` (`p_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_Id`) REFERENCES `category` (`cat_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
