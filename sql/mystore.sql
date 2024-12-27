-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2024 at 09:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'ahmed', 'ahmed@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759'),
(2, 'eslam', 'eslam@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Swiggy'),
(2, 'zomato'),
(3, 'Mc Donalds'),
(5, 'Nike');

-- --------------------------------------------------------

--
-- Table structure for table `cartdetails`
--

CREATE TABLE `cartdetails` (
  `detalis_id` int(11) NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Fruits'),
(2, 'Juices'),
(3, 'Vegetabels'),
(4, 'Milk products'),
(5, 'Books'),
(6, 'Chips');

-- --------------------------------------------------------

--
-- Table structure for table `orders_panding`
--

CREATE TABLE `orders_panding` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_panding`
--

INSERT INTO `orders_panding` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 553515724, 9, 1, 'pending'),
(2, 1, 118228423, 9, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(100) NOT NULL,
  `product_keyword` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_img1` varchar(255) NOT NULL,
  `product_img2` varchar(255) NOT NULL,
  `product_img3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keyword`, `cat_id`, `brand_id`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `date`, `status`) VALUES
(2, 'tomato', 'Tomatos are always tasty. Eat once you will ask for more.', 'tomato, fresh tomato, zomato', 3, 2, 'tomato1.jpg', 'tomato2.jpg', 'tomato3.jpg', '10', '2024-12-12 12:20:17', 'True'),
(3, 'Apple', 'Apple are always tasty. Eat once you will ask for more.', 'apple, freash apple, good apple, red apple, green apple', 1, 2, 'apple.jpg', 'apple1.jpg', 'apple2.jpg', '10', '2024-12-13 11:38:48', 'True'),
(4, 'Watermelon', 'Watermelon are always tasty. Eat once you will ask for more.', 'watermelon , fresh watermelon, red watermelon', 1, 2, 'wwater.jpg', 'water1.jpg', 'water2.jpg', '12', '2024-12-13 11:42:09', 'True'),
(5, 'Strawberry', 'Strawberry are always tasty. Eat once you will ask for more.', 'strawberry, fresh strawberry, good strawberry', 1, 2, 'starberry1.jpg', 'starwberry2.jpg', 'strawberry.jpg', '7', '2024-12-13 11:43:24', 'True'),
(6, 'Onion', 'Onion are always tasty. Eat once you will ask for more.', 'onion, fresh onion, red onion', 3, 2, 'onion.jpg', 'onion1.jpeg', 'onion2.jpg', '5', '2024-12-13 11:50:52', 'True'),
(7, 'White Onion', 'White Onion are always tasty. Eat once you will ask for more.', 'onion, small onion, White Onion', 3, 2, 'whiteOn1.jpg', 'whiteOnion2.jpg', 'whiteOnion3.jpg', '3', '2024-12-13 11:52:22', 'True'),
(8, 'Peas', 'Peas are always tasty. Eat once you will ask for more.', 'peas, fresh peas, good peas, green peas', 3, 2, 'besaela1.jpg', 'besaela2.jpg', 'besaela3.jpg', '3', '2024-12-13 11:55:16', 'True'),
(9, 'Banana', 'Banana are always tasty. Eat once you will ask for more.', 'banana, fresh banana, wellow banana', 1, 2, 'Banana.jpg', 'Banana1.jpg', 'Banana2.jpg', '3', '2024-12-13 11:56:34', 'True'),
(10, 'Orange', 'Orange are always tasty. Eat once you will ask for more.', 'orange, fresh orange', 1, 2, 'oranges.jpg', 'oranges1.jpg', 'Orange3.jpg', '3', '2024-12-13 12:06:42', 'True'),
(11, 'pears', 'Pears are always tasty. Eat once you will ask for more.', 'pears, green pears, fresh pears', 1, 2, 'pears1.jpg', 'pears2.jpg', 'pears3.jpg', '5', '2024-12-13 12:08:03', 'True'),
(12, 'Peach', 'Peach are always tasty. Eat once you will ask for more.', 'peach, fresh peach, good peach', 1, 2, 'peach1.jpg', 'peach2.jpg', 'peach3.jpg', '6', '2024-12-13 12:09:00', 'True'),
(13, 'Pomegranate', 'Pomegranate are always tasty. Eat once you will ask for more.', 'pomegranate, fresh pomegranate, good pomegranate', 1, 2, 'pomegranate2.jpg', 'pomegranate1.jpg', 'pomegranate.jpg', '7', '2024-12-13 12:13:42', 'True'),
(15, 'red hot pepper', 'red hot pepper are always tasty. Eat once you will ask for more.', 'red hot pepper, fresh red hot pepper, very red hot pepper ', 3, 2, 'red hot pepper1.avif', 'red hot pepper2.webp', 'red hot pepper3.avif', '7', '2024-12-13 12:28:50', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 9, 553515724, 3, '2024-12-22 15:41:26', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `user_payment`
--

CREATE TABLE `user_payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mod` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payment`
--

INSERT INTO `user_payment` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mod`, `date`) VALUES
(1, 2, 118228423, 17, 'papal', '2024-12-22 15:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, 'ahmed', 'ahmed@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '12.jpeg', '::1', 'egypt', '01155570684'),
(2, 'eslam', 'eslam@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '10.jpeg', '::1', 'egypt', '01155570684'),
(3, 'noorhan', 'noorhan@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'istockphoto-1156703653-612x612.jpg', '::2', 'egypt', '01155570684');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cartdetails`
--
ALTER TABLE `cartdetails`
  ADD PRIMARY KEY (`detalis_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_panding`
--
ALTER TABLE `orders_panding`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `ConUser` (`user_id`),
  ADD KEY `ConProduct` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `ConUserO` (`user_id`);

--
-- Indexes for table `user_payment`
--
ALTER TABLE `user_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cartdetails`
--
ALTER TABLE `cartdetails`
  MODIFY `detalis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders_panding`
--
ALTER TABLE `orders_panding`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_payment`
--
ALTER TABLE `user_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cartdetails`
--
ALTER TABLE `cartdetails`
  ADD CONSTRAINT `cartdetails_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders_panding`
--
ALTER TABLE `orders_panding`
  ADD CONSTRAINT `ConProduct` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `ConUser` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`);

--
-- Constraints for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD CONSTRAINT `ConUserO` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
