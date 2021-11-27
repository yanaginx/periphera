-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 08:46 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS `periphera_db`;
CREATE DATABASE `periphera_db`;
USE `periphera_db`;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `periphera_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'bracelet'),
(2, 'earring'),
(3, 'necklet');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `product_id`, `comment`, `datetime`) VALUES
(2, 14, 2, 'hey lol', '2021-11-25 14:21:06'),
(3, 14, 4, 'test', '2021-11-25 14:44:14');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `fname` varchar(128) DEFAULT NULL,
  `lname` varchar(128) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `content`, `fname`, `lname`, `email`) VALUES
(5, NULL, 'dog', 'aaaa', 'bbbb', 'a@v.x');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(64) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`) VALUES
(10, 'aaaa', 'haha lol sadge', '/'),
(13, 'asasas', 'asas asa s as as aa s a sas as a sa sa asas asa s as as aa s a sas as a sa sa asas asa s as as aa s a sas as a sa sa asas asa s as as aa s a sas as a sa sa ', '');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `date`) VALUES
(4, 14, '2021-11-25 00:00:00'),
(5, 14, '2021-11-25 00:00:00'),
(6, 14, '2021-11-25 00:00:00'),
(7, 14, '2021-11-25 08:25:15');

-- --------------------------------------------------------

--
-- Table structure for table `order_contains_products`
--

CREATE TABLE `order_contains_products` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `prod_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_contains_products`
--

INSERT INTO `order_contains_products` (`order_id`, `product_id`, `prod_amount`) VALUES
(4, 4, 4),
(5, 5, 1),
(6, 7, 7),
(7, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `description` tinytext DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `price` decimal(16,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT NULL,
  `is_featured` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `description`, `date_added`, `price`, `image`, `rating`, `is_featured`) VALUES
(2, 1, 'Anchor Bracelet Men version', 'An anchor bracelet is a bracelet that is made out of nylon or leather rope that is strong to be used aboard ships as rigging. They are fastened with metal clasps that are shaped like anchors, and it is the clasps that give the bracelets their name', '2021-11-24 00:00:00', '15.00', 'https://files.catbox.moe/h97ahk.jpg', '4.0', b'0'),
(3, 1, 'Anchor Bracelet women version', 'An anchor bracelet is a bracelet that is made out of nylon or leather rope that is strong to be used aboard ships as rigging. They are fastened with metal clasps that are shaped like anchors, and it is the clasps that give the bracelets their name', '2021-11-24 00:00:00', '15.00', 'https://files.catbox.moe/mxo6py.jpg', '4.5', b'1'),
(4, 1, 'Golden Arrow Bracelet', 'An anchor bracelet is a bracelet that is made out of nylon or leather rope that is strong to be used aboard ships as rigging. They are fastened with metal clasps that are shaped like anchors, and it is the clasps that give the bracelets their name', '2021-11-24 00:00:00', '12.00', 'https://files.catbox.moe/qya7ut.jpg', '4.0', b'0'),
(5, 1, 'Rainbow Bracelet', 'An anchor bracelet is a bracelet that is made out of nylon or leather rope that is strong to be used aboard ships as rigging. They are fastened with metal clasps that are shaped like anchors, and it is the clasps that give the bracelets their name', '2021-11-24 00:00:00', '10.00', 'https://files.catbox.moe/77e4fc.jpg', '4.0', b'1'),
(6, 1, 'Turban Bracelet', 'An anchor bracelet is a bracelet that is made out of nylon or leather rope that is strong to be used aboard ships as rigging. They are fastened with metal clasps that are shaped like anchors, and it is the clasps that give the bracelets their name', '2021-11-24 00:00:00', '15.00', 'https://files.catbox.moe/wh07w2.jpg', '4.0', b'1'),
(7, 1, 'Black Buddha Bracelet', 'An anchor bracelet is a bracelet that is made out of nylon or leather rope that is strong to be used aboard ships as rigging. They are fastened with metal clasps that are shaped like anchors, and it is the clasps that give the bracelets their name', '2021-11-24 00:00:00', '15.00', 'https://files.catbox.moe/jlpm80.jpg', '3.0', b'0'),
(8, 1, 'Boho Bracelet', 'An anchor bracelet is a bracelet that is made out of nylon or leather rope that is strong to be used aboard ships as rigging. They are fastened with metal clasps that are shaped like anchors, and it is the clasps that give the bracelets their name', '2021-11-24 00:00:00', '12.00', 'https://files.catbox.moe/14x83l.jpg', '4.0', b'1'),
(9, 2, 'Boho Earring', 'Check out our boho earrings selection for the very best in unique or custom, handmade pieces from our dangle and drop earrings shops', '2021-11-24 00:00:00', '10.00', 'https://files.catbox.moe/24ms8c.jpg', '4.0', b'1'),
(10, 2, 'Galaxy Earring', 'Check out our boho earrings selection for the very best in unique or custom, handmade pieces from our dangle and drop earrings shops', '2021-11-24 00:00:00', '12.00', 'https://files.catbox.moe/703m5c.jpg', '4.5', b'1'),
(11, 2, 'Elephant Earring', 'Check out our boho earrings selection for the very best in unique or custom, handmade pieces from our dangle and drop earrings shops', '2021-11-24 00:00:00', '15.00', 'https://files.catbox.moe/8cugz8.jpg', '4.0', b'0'),
(12, 2, 'Guardian Angel Earring', 'Check out our boho earrings selection for the very best in unique or custom, handmade pieces from our dangle and drop earrings shops', '2021-11-24 00:00:00', '12.00', 'https://files.catbox.moe/edprqp.jpg', '4.5', b'1'),
(13, 3, 'Marble Necklet', 'Marble is a unique material which has been increasingly re-evaluated not only for its canonical uses in architecture and furniture but also for more particular uses a striking example of its unconventional uses is undoubtedly marble jewelry', '2021-11-24 00:00:00', '12.00', 'https://files.catbox.moe/3kcb42.jpg', '4.5', b'1'),
(14, 3, 'Gold Beak Necklet', 'Marble is a unique material which has been increasingly re-evaluated not only for its canonical uses in architecture and furniture but also for more particular uses a striking example of its unconventional uses is undoubtedly marble jewelry', '2021-11-24 00:00:00', '15.00', 'https://files.catbox.moe/way8so.jpg', '4.0', b'0'),
(15, 3, 'Purple Gemstone Necklet', 'Marble is a unique material which has been increasingly re-evaluated not only for its canonical uses in architecture and furniture but also for more particular uses a striking example of its unconventional uses is undoubtedly marble jewelry', '2021-11-24 00:00:00', '12.00', 'https://files.catbox.moe/tjmx19.jpg', '4.0', b'0'),
(16, 3, 'Silver Origami Necklet', 'Marble is a unique material which has been increasingly re-evaluated not only for its canonical uses in architecture and furniture but also for more particular uses a striking example of its unconventional uses is undoubtedly marble jewelry', '2021-11-24 00:00:00', '10.00', 'https://files.catbox.moe/qwvb23.jpg', '4.5', b'1'),
(17, 3, 'Blue Gemstone Necklet', 'Marble is a unique material which has been increasingly re-evaluated not only for its canonical uses in architecture and furniture but also for more particular uses a striking example of its unconventional uses is undoubtedly marble jewelry', '2021-11-24 00:00:00', '15.00', 'https://files.catbox.moe/43s8o0.jpg', '4.0', b'1'),
(18, 3, 'Pendant Necklet', 'Marble is a unique material which has been increasingly re-evaluated not only for its canonical uses in architecture and furniture but also for more particular uses a striking example of its unconventional uses is undoubtedly marble jewelry', '2021-11-24 00:00:00', '12.00', 'https://files.catbox.moe/jcio9c.jpg', '4.0', b'1'),
(19, 3, 'Threader Necklet', 'Marble is a unique material which has been increasingly re-evaluated not only for its canonical uses in architecture and furniture but also for more particular uses a striking example of its unconventional uses is undoubtedly marble jewelry', '2021-11-24 00:00:00', '12.00', 'https://files.catbox.moe/jerkpl.jpg', '4.5', b'1'),
(20, 3, 'Gold Bird Necklet', 'Marble is a unique material which has been increasingly re-evaluated not only for its canonical uses in architecture and furniture but also for more particular uses a striking example of its unconventional uses is undoubtedly marble jewelry', '2021-11-24 00:00:00', '15.00', 'https://files.catbox.moe/6r0odw.jpg', '3.5', b'0'),
(21, 1, 'dogshit', 'lol', '2021-11-25 07:41:57', '12.00', '', '9.9', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address_1` varchar(255) DEFAULT NULL,
  `address_2` varchar(128) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `country` varchar(128) DEFAULT NULL,
  `fname` varchar(128) DEFAULT NULL,
  `lname` varchar(128) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `address_1`, `address_2`, `zipcode`, `country`, `fname`, `lname`, `phone`) VALUES
(1, 'admin', '$2y$10$/YSAjdpUgWTyZQz2fkjwS.2LsK8RwZw3GJJL17fyuE0ZRry4ussIi', 'admin@periphera.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'shinyo', '$2y$10$DSFVay15T95GStyp1nvmW.dPjvQffV3IRpmDSOt1atIGVowlSZQqy', 'shinyo@periphera.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'pepegaswiper69', '$2y$10$.n.ZA5tsH57DQNBXqt02Kubfh8Q3ivr16HGVfSQNyc9Lk2BniXlAi', 'a@b.c', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_have_roles`
--

CREATE TABLE `users_have_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_have_roles`
--

INSERT INTO `users_have_roles` (`user_id`, `role_id`) VALUES
(1, 1),
(12, 2),
(14, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contain_user_userid` (`user_id`),
  ADD KEY `fk_contain_product_prodid` (`product_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_message_user_userid` (`user_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_order_user_userid` (`user_id`);

--
-- Indexes for table `order_contains_products`
--
ALTER TABLE `order_contains_products`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `fk_contain_product_productid` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_product_category_cid` (`category_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `idx_un` (`username`);

--
-- Indexes for table `users_have_roles`
--
ALTER TABLE `users_have_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `fk_have_role_roleid` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_contain_product_prodid` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_contain_user_userid` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_user_userid` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_user_userid` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_contains_products`
--
ALTER TABLE `order_contains_products`
  ADD CONSTRAINT `fk_contain_order_orderid` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_contain_product_productid` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category_cid` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `users_have_roles`
--
ALTER TABLE `users_have_roles`
  ADD CONSTRAINT `fk_have_role_roleid` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_have_user_userid` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
