-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 01:09 PM
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
-- Database: `coffee-blend`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `adminname`, `email`, `password`, `created_at`) VALUES
(1, 'Admin 1', 'usama123@gmail.com', '$2y$10$gIx1Hj8aMwmWKKtXVan/iO0B1GytAZx/J9m.H/V5IZLUybfmOGtGq', '2023-08-03 11:00:03'),
(2, 'Admin 2', 'Haitham_eltrabily@yahoo.com', '$2y$10$vXA5uibJOp6GWGo7wnh/puBsKQ.uORafd3/hIe2aydBrzajoKkn8W', '2023-08-04 05:35:05'),
(6, 'Admin 3', 'harry147@gmail.com', '$2y$10$5mLYUswH2wMMBSgY/Uz03eQjIXCkrC89/CJ8h.bGkuWIBRwfyzWCi', '2023-08-08 09:36:36');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `phone` int(255) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Pending',
  `user_id` int(7) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `first_name`, `last_name`, `date`, `time`, `phone`, `message`, `status`, `user_id`, `created_at`) VALUES
(1, 'Harry', 'Mathew', '8/25/2023', '4:30am', 6469846, 'private and cozy.', 'Confirmed', 1, '2023-08-08 03:30:50');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` varchar(10) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `description` text NOT NULL,
  `size` varchar(200) NOT NULL,
  `quantity` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `street_address` varchar(200) NOT NULL,
  `town` varchar(200) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` varchar(200) NOT NULL,
  `total_price` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `state`, `street_address`, `town`, `zip_code`, `phone`, `user_id`, `status`, `total_price`, `created_at`) VALUES
(3, 'Uzair', 'Khan', 'France', 'H # 868 st# 12A Block C', 'Paris', '147896', '0045698', 6, 'Pending', 24, '2023-08-08 04:10:19'),
(5, 'Harry', 'Mathew', 'Italy', 'Via Genova 105', 'Senago', '20030', '0339 8736897', 1, 'Pending', 19, '2023-08-08 04:37:04'),
(6, 'Harry', 'Mathew', 'Italy', 'Via Genova 105', 'Senago', '20030', '0339 8736897', 1, 'Pending', 21, '2023-08-08 09:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(10) NOT NULL,
  `category` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `price`, `category`, `created_at`) VALUES
(1, 'Cappuccino', 'menu-1.jpg', 'Indulge in our exquisite Cappuccino - a velvety-smooth blend of espresso, steamed milk, and froth. A comforting, flavorful pick-me-up that promises to delight your senses. Treat yourself today!', '4.33', 'Coffee', '2023-08-04 04:50:19'),
(2, 'Ice Coffee', 'menu-3.jpg', 'Chill out with Ice Coffee - a refreshing dance of rich coffee over glistening ice cubes. Cool sophistication, pure refreshment, and a burst of caffeine bliss in every sip.', '7', 'Coffee', '2023-08-04 04:52:34'),
(3, 'Chocolate Mocha', 'menu-2.jpg', 'Indulge in the irresistible allure of Chocolate Mocha: where velvety smoothness meets rich, decadent flavor. A heavenly blend of premium cocoa and freshly brewed espresso, this divine elixir will captivate your taste buds and awaken your senses', '2.54', 'Coffee', '2023-08-04 04:56:41'),
(4, 'Espresso', 'menu-4.jpg', 'Embrace the rich, velvety crema that crowns the dark liquid, offering a tantalizing aroma that lingers in the air. Each shot of Espresso delivers an explosion of flavor, a symphony of notes that dance on your palate, leaving behind a lingering trail of satisfaction.', '3.48', 'Coffee', '2023-08-04 05:07:46'),
(5, 'Orange Lemonade', 'drink-1.jpg', 'Experience the perfect harmony of zesty oranges and tangy lemons, beautifully blended to create a tantalizing drink that will brighten your day.', '5.01', 'Drink', '2023-08-04 05:17:20'),
(6, 'Chicken Roast', 'dish-4.jpg', 'Savor the succulence of our perfectly seasoned Chicken Roast. Tender, juicy, and packed with flavor, this mouthwatering dish is a true delight for your taste buds.', '12.4', 'Dish', '2023-08-04 05:19:13'),
(7, 'BBQ Ribs', 'dish-2.jpg', 'Each bite is a journey into smoky, savory perfection that will have you hooked from the first taste. Slow-cooked to tender perfection and glazed with our secret BBQ sauce', '11.9', 'Dish', '2023-08-04 05:21:02'),
(8, 'Fried Prawns', 'dish-5.jpg', 'Delight your senses with our crispy Fried Prawns. Plump, succulent prawns coated in a light, golden batter, fried to perfection for an irresistible crunch.', '15.99', 'Dish', '2023-08-04 05:23:01'),
(9, 'pepperoni pizza', 'image_6.jpg', 'Indulge in a symphony of flavors with our mouthwatering pepperoni pizza. Savory pepperoni slices perfectly melded with gooey melted cheese, all atop a crispy, golden crust.', '8.6', 'Fast Food', '2023-08-04 05:25:53'),
(10, 'Concha Strawberry Cake', 'dessert-1.jpg', 'A luscious fusion of moist strawberry-infused sponge cake, adorned with delicate concha crumble toppings. Each forkful reveals a harmonious blend of sweet and fruity goodness, leaving you craving for more.', '9.2', 'Dessert', '2023-08-04 05:27:42'),
(11, 'Pancakes', 'dessert-2.jpg', 'These fluffy, golden discs of joy are a breakfast favorite, perfect for starting your day with a smile. Whether you prefer them classic with maple syrup or adorned with fresh fruits and a dollop of whipped cream, pancakes never fail to charm taste buds.', '10.48', 'Dessert', '2023-08-04 05:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) NOT NULL,
  `review` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `username`, `created_at`) VALUES
(1, 'These pancakes are simply heavenly. With their fluffy texture and delightful flavor, they melt in your mouth with each bite. The golden-brown exterior adds a hint of crispness, while the subtle sweetn', 'Harry', '2023-07-14 04:23:59'),
(2, 'awesome experience had a great and fresh time', 'Harry', '2023-07-14 05:37:57'),
(3, 'Had a great and wonderful experienced.Tremendous staff and amazing service. Highly Reccomend!', 'Sara Watson', '2023-08-01 09:41:14'),
(4, 'Had a great and wonderful experienced. Highly Reccomend!', 'Harry Mathew', '2023-08-07 11:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Harry Mathew', 'harry147@gmail.com', '$2y$10$iGzYZ7B8jVRVhGny2cQjxOJQsxeKzYHF9S3Q2RHnMHIfioilO2oVO', '2023-07-14 05:21:31'),
(2, 'Sara Watson', 'sara234@yahoo.com', '$2y$10$fmBV.52RxCeBH2/X0yzAOON8eCDhuXsr5mgMSOyEUQsHs2K81RrG.', '2023-07-14 07:05:18'),
(3, 'Logan Paul', 'loganpaul654@gmail.com', '$2y$10$kUJ8BW13PZQcgrf8Sht/WOSH8wNZR06jvBFQwyMBKZIrjd25J0MYu', '2023-07-14 07:10:24'),
(6, 'Uzair Khan', 'uzairkhan333@gmail.com', '$2y$10$nXtZX.mtVob2TO8fWt.Z6OcXKLfsmnw5DVkj68SJZX02k5fbUNfti', '2023-08-08 03:36:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
