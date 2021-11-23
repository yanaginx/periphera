-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 02:54 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_contains_products`
--

CREATE TABLE `order_contains_products` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `prod_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(12, 'shinyo', '$2y$10$DSFVay15T95GStyp1nvmW.dPjvQffV3IRpmDSOt1atIGVowlSZQqy', 'shinyo@periphera.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(12, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

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


-- Category
INSERT INTO `category`(`name`) VALUES ('bracelet');
INSERT INTO `category`(`name`) VALUES ('earring');
INSERT INTO `category`(`name`) VALUES ('necklet');
-- Produts
INSERT INTO `product`(`category_id`, `name`, `description`, `date_added`, `price`, `image`, `rating`, `is_featured`) 
VALUES ('1','Anchor Bracelet','An anchor bracelet is a bracelet that is made out of nylon or leather rope that is strong to be used aboard ships as rigging. They are fastened with metal clasps that are shaped like anchors, and it is the clasps that give the bracelets their name',
        DATE(NOW()), 10.00,'https://files.catbox.moe/eztfua.jpg', 3.5, 1);

INSERT INTO `product`(`category_id`, `name`, `description`, `date_added`, `price`, `image`, `rating`, `is_featured`) 
VALUES ('1','Anchor Bracelet Men version','An anchor bracelet is a bracelet that is made out of nylon or leather rope that is strong to be used aboard ships as rigging. They are fastened with metal clasps that are shaped like anchors, and it is the clasps that give the bracelets their name',
        DATE(NOW()), 15.00,'https://files.catbox.moe/h97ahk.jpg', 4.0, 0);

INSERT INTO `product`(`category_id`, `name`, `description`, `date_added`, `price`, `image`, `rating`, `is_featured`) 
VALUES ('1','Anchor Bracelet women version','An anchor bracelet is a bracelet that is made out of nylon or leather rope that is strong to be used aboard ships as rigging. They are fastened with metal clasps that are shaped like anchors, and it is the clasps that give the bracelets their name',
        DATE(NOW()), 15.00,'https://files.catbox.moe/mxo6py.jpg', 4.5, 1);

INSERT INTO `product`(`category_id`, `name`, `description`, `date_added`, `price`, `image`, `rating`, `is_featured`) 
VALUES ('1','Golden Arrow Bracelet','An anchor bracelet is a bracelet that is made out of nylon or leather rope that is strong to be used aboard ships as rigging. They are fastened with metal clasps that are shaped like anchors, and it is the clasps that give the bracelets their name',
        DATE(NOW()), 12.00,'https://files.catbox.moe/qya7ut.jpg', 4.0, 0);

INSERT INTO `product`(`category_id`, `name`, `description`, `date_added`, `price`, `image`, `rating`, `is_featured`) 
VALUES ('1','Rainbow Bracelet','An anchor bracelet is a bracelet that is made out of nylon or leather rope that is strong to be used aboard ships as rigging. They are fastened with metal clasps that are shaped like anchors, and it is the clasps that give the bracelets their name',
        DATE(NOW()), 10.00,'https://files.catbox.moe/77e4fc.jpg', 4.0, 1);

INSERT INTO `product`(`category_id`, `name`, `description`, `date_added`, `price`, `image`, `rating`, `is_featured`) 
VALUES ('1','Turban Bracelet','An anchor bracelet is a bracelet that is made out of nylon or leather rope that is strong to be used aboard ships as rigging. They are fastened with metal clasps that are shaped like anchors, and it is the clasps that give the bracelets their name',
        DATE(NOW()), 15.00,'https://files.catbox.moe/wh07w2.jpg', 4.0, 1);

INSERT INTO `product`(`category_id`, `name`, `description`, `date_added`, `price`, `image`, `rating`, `is_featured`) 
VALUES ('1','Black Buddha Bracelet','An anchor bracelet is a bracelet that is made out of nylon or leather rope that is strong to be used aboard ships as rigging. They are fastened with metal clasps that are shaped like anchors, and it is the clasps that give the bracelets their name',
        DATE(NOW()), 15.00,'https://files.catbox.moe/jlpm80.jpg', 3.0, 0);

INSERT INTO `product`(`category_id`, `name`, `description`, `date_added`, `price`, `image`, `rating`, `is_featured`) 
VALUES ('1','Boho Bracelet','An anchor bracelet is a bracelet that is made out of nylon or leather rope that is strong to be used aboard ships as rigging. They are fastened with metal clasps that are shaped like anchors, and it is the clasps that give the bracelets their name',
        DATE(NOW()), 12.00,'https://files.catbox.moe/14x83l.jpg', 4.0, 1);

INSERT INTO `product`(`category_id`, `name`, `description`, `date_added`, `price`, `image`, `rating`, `is_featured`) 
VALUES ('2','Boho Earring','Check out our boho earrings selection for the very best in unique or custom, handmade pieces from our dangle and drop earrings shops',
        DATE(NOW()), 10.00,'https://files.catbox.moe/24ms8c.jpg', 4.0, 1);

INSERT INTO `product`(`category_id`, `name`, `description`, `date_added`, `price`, `image`, `rating`, `is_featured`) 
VALUES ('2','Galaxy Earring','Check out our boho earrings selection for the very best in unique or custom, handmade pieces from our dangle and drop earrings shops',
        DATE(NOW()), 12.00,'https://files.catbox.moe/703m5c.jpg', 4.5, 1);

INSERT INTO `product`(`category_id`, `name`, `description`, `date_added`, `price`, `image`, `rating`, `is_featured`) 
VALUES ('2','Elephant Earring','Check out our boho earrings selection for the very best in unique or custom, handmade pieces from our dangle and drop earrings shops',
        DATE(NOW()), 15.00,'https://files.catbox.moe/8cugz8.jpg', 4.0, 0);

INSERT INTO `product`(`category_id`, `name`, `description`, `date_added`, `price`, `image`, `rating`, `is_featured`) 
VALUES ('2','Guardian Angel Earring','Check out our boho earrings selection for the very best in unique or custom, handmade pieces from our dangle and drop earrings shops',
        DATE(NOW()), 12.00,'https://files.catbox.moe/edprqp.jpg', 4.5, 1);

INSERT INTO `product`(`category_id`, `name`, `description`, `date_added`, `price`, `image`, `rating`, `is_featured`) 
VALUES ('3','Marble Necklet','Marble is a unique material which has been increasingly re-evaluated not only for its canonical uses in architecture and furniture but also for more particular uses a striking example of its unconventional uses is undoubtedly marble jewelry',
        DATE(NOW()), 12.00,'https://files.catbox.moe/3kcb42.jpg', 4.5, 1);

INSERT INTO `product`(`category_id`, `name`, `description`, `date_added`, `price`, `image`, `rating`, `is_featured`) 
VALUES ('3','Gold Beak Necklet','Marble is a unique material which has been increasingly re-evaluated not only for its canonical uses in architecture and furniture but also for more particular uses a striking example of its unconventional uses is undoubtedly marble jewelry',
        DATE(NOW()), 15.00,'https://files.catbox.moe/way8so.jpg', 4.0, 0);

INSERT INTO `product`(`category_id`, `name`, `description`, `date_added`, `price`, `image`, `rating`, `is_featured`) 
VALUES ('3','Purple Gemstone Necklet','Marble is a unique material which has been increasingly re-evaluated not only for its canonical uses in architecture and furniture but also for more particular uses a striking example of its unconventional uses is undoubtedly marble jewelry',
        DATE(NOW()), 12.00,'https://files.catbox.moe/tjmx19.jpg', 4.0, 0);

INSERT INTO `product`(`category_id`, `name`, `description`, `date_added`, `price`, `image`, `rating`, `is_featured`) 
VALUES ('3','Silver Origami Necklet','Marble is a unique material which has been increasingly re-evaluated not only for its canonical uses in architecture and furniture but also for more particular uses a striking example of its unconventional uses is undoubtedly marble jewelry',
        DATE(NOW()), 10.00,'https://files.catbox.moe/qwvb23.jpg', 4.5, 1);

INSERT INTO `product`(`category_id`, `name`, `description`, `date_added`, `price`, `image`, `rating`, `is_featured`) 
VALUES ('3','Blue Gemstone Necklet','Marble is a unique material which has been increasingly re-evaluated not only for its canonical uses in architecture and furniture but also for more particular uses a striking example of its unconventional uses is undoubtedly marble jewelry',
        DATE(NOW()), 15.00,'https://files.catbox.moe/43s8o0.jpg', 4.0, 1);

INSERT INTO `product`(`category_id`, `name`, `description`, `date_added`, `price`, `image`, `rating`, `is_featured`) 
VALUES ('3','Pendant Necklet','Marble is a unique material which has been increasingly re-evaluated not only for its canonical uses in architecture and furniture but also for more particular uses a striking example of its unconventional uses is undoubtedly marble jewelry',
        DATE(NOW()), 12.00,'https://files.catbox.moe/jcio9c.jpg', 4.0, 1);

INSERT INTO `product`(`category_id`, `name`, `description`, `date_added`, `price`, `image`, `rating`, `is_featured`) 
VALUES ('3','Threader Necklet','Marble is a unique material which has been increasingly re-evaluated not only for its canonical uses in architecture and furniture but also for more particular uses a striking example of its unconventional uses is undoubtedly marble jewelry',
        DATE(NOW()), 12.00,'https://files.catbox.moe/jerkpl.jpg', 4.5, 1);

INSERT INTO `product`(`category_id`, `name`, `description`, `date_added`, `price`, `image`, `rating`, `is_featured`) 
VALUES ('3','Gold Bird Necklet','Marble is a unique material which has been increasingly re-evaluated not only for its canonical uses in architecture and furniture but also for more particular uses a striking example of its unconventional uses is undoubtedly marble jewelry',
        DATE(NOW()), 15.00,'https://files.catbox.moe/6r0odw.jpg', 3.5, 0);

CREATE TABLE `comment` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `comment`
  ADD CONSTRAINT `fk_contain_user_userid` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_contain_product_prodid` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
