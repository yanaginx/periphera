-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 11:07 AM
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
(13, 'asasas', 'asas asa s as as aa s a sas as a sa sa asas asa s as as aa s a sas as a sa sa asas asa s as as aa s a sas as a sa sa asas asa s as as aa s a sas as a sa sa ', ''),
(15, 'The Golden Age of Lalaounis', 'Amongst jewellery lovers, the name Lalaounis has almost mythical status. From the sun-bleached land of gods and olive groves, the Lalaounis we know today was founded in Greece in 1941 when the young Ilias Lalaounis was asked to take over the three-generation old family business during the war years.  Ilias had no formal training in jewellery making but he was a competent businessman and well-read intellectual who loved history. For over a decade he ran the business much as it was, producing generic jewels with little reference to his homeland. In the late 1950’s the country opened up to tourism and the glamour of Onassis and Jackie O lured the world to its sparkling sapphire waters and island idylls. These visitors to the Hellenic republic wanted to take home a jewel steeped in the country’s history.\n\nThe unmistakable Lalaounis look of all-gold jewels hand-hammered into evocative and often outsize ancient forms was inspired by Ilias’ love of antiquities. As an avid historian, his first port of call was the museums of Greece from where he copied designs and techniques bringing the beauty of antique artefacts to life in 18-carat and 22-carat gold. Lalaounis’ workshop in Athens, was at the foot of the Acropolis and benefitted from the rich tradition of jewellery-making of this city that sits at the heart of Mediterranean civilisation. The jewels proved to be a huge success but not one to stand still, Ilias refined his approach and embarked on a journey of seeing art as an inspiration be it Greek, Minoan, Hellenistic, Classical, Byzantine or even from beyond. From the classic Hellenistic Lion Head bracelet to the starkly elegant serpent bangles, Ilias Lalaounis forged a look that put Greece on the jewellery map.\n\nHand-hammering is the technique that the house is most famous for and the dint of small hammers echoes around the workshop as repeated strikes of the rounded head creates a rich pattern of soft indentations as favoured by the Ancient Greek goldsmiths. Granulation is the skill of placing small beads onto surfaces to create intricate highly textured patterns and brought up to date in collections such as Glory of Byzantium. Even older is filigree work, which uses fine threads of gold and grains to create light as lace open-work jewels or to build up elaborate patterns on a surface.  The Epirus earrings, chains and rings use an Ancient Roman technique of piercing gold called opus interassile for a fluid and feather-light big look. The Hellenistic tradition of weaving gold is deployed to create supple hand made chains such as the Hercules knot from the Hellenistic collection. Gold is embossed using the repoussé technique that dates back to the Bronze age to achieve complex, multi-level patterns as seen on the iconic animal jewels. Gemstones and diamonds are employed more liberally than in the early days of the firm, but still chosen with an eye to the past as a complement to the gold and often in soft cabochon forms and then carefully hand-set as they would have been centuries ago. But the shapes are more delicate, easier to mix and match and stack and appealing to a new generation of Lalaounis fans. With ten children between the four daughters, it is safe to say that the sisters understand a wide range of tastes and budgets.\n\n‘From beach to work to dinner under the Athens or New York sky, our jewellery works and  is designed for women to easily wear all day long, dressing it up or down according to everyone\'s individual style,’ explains Demetra Lalaounis, Director of International Business. For over 80 years, the bold forms of Lalaounis jewels are now recognised the world over, confirming that Ilias’ vision was on the mark. It’s not just the styles of the jewels themselves that evoke the arc of Greek history from Neolithic starkness, Classical Greek elegance, the opulence of Theodora’s reign, Byzantine splendour to Hellenic glamour, but the very materials and techniques that imbue them with that special Greek touch that makes Lalaounis so very unique and desirable. ', 'https://bn1304files.storage.live.com/y4mUCjUASgBDsIwPWm5rH4pU4Jx-yseeGPA4Z09QOdKc1b981jV2hGbhdCap_x-iQg3p90cgxbJuuPz7o9IhALgT52K79Xm6ssYJkk_TQwhJQXGc60JgeuCv5SMLLDGw0-pADjzgjpRWs_T2ghAsIc-OuWvnWAVd49QV4xhSLhWy7q1-_Qj6LWGkgB_3fchsO3C?width=332&height=222&c'),
(16, 'How Pomellato\'s Nudo became an icon over two decades', 'The question of what makes an icon is one that designers around the world strive to answer. Elusive and unpredictable, it is the passage of years or decades alone that grants this honour. A shining example of a time-tested design-great is Pomellato’s Nudo ring that this year celebrates its 20th anniversary. One glance at the latest arrivals and the Nudo looks as fresh as it did way back in 2001.\r\n\r\nThis witty little ring began life in a modest way, a bit of an insider joke about the state of the world in the early Noughties at the height of the vogue for ostentation and opulence.  The rebellious, unfussy Nudo with its vibrantly bright square gemstone and smooth lines was a joyous parody of the ubiquitous all-white solitaire ring.\r\n\r\nThe original five Nudo rings featured bright blocks of garnet, aquamarine, peridot, iolite and red tourmaline and to the delighted surprise of the team at Casa Pomellato, they instantly sold out.  Named Nudo for the Italian for naked or bare, the square gemstone is free from claws and appears to float on the finger thanks to a clever system of concealed fixings in the collet of the ring.   This masterpiece of abbreviation, was modernist in its inclination yet deeply rooted in the traditional craft of goldsmithing and it takes four days to make by hand each Nudo ring the house’s Milanese workshop.\r\n\r\nSince its instant success, the Nudo has been adorned with 35 different gemstones, many of them rarely seen in the world of fine jewellery.  New techniques such as the Gelé frosty finish or stone doublets add to the ever expanding range of Nudo offerings that span from zesty greens to glossy pinks and every colour in between.\r\n\r\nAs it has grown up, the Nudo includes earrings, pendants and now even a new range of bracelets and this year the addition of chocolate coloured gemstones. CEO of Pomellato Sabina Belli says: “Nudo epitomises the visionary mission of Pomellato which was born to create prêt-à-porter jewels for the emancipated woman. It was a revolutionary idea. And Nudo fully expresses the strength of this vision: quintessentially feminine, strikingly simple, Nudo is the perfect ironic answer to the solitaire ring, inclusive in the array of naked gems it uses, powerful in its essential design, Nudo is a true icon. Multifaceted, truthful, just like the Pomellato women.” Unorthodox yet always true to its original spirit, the Nudo has travelled through two decades virtually unchanged yet as powerful as the day it was born.', 'https://bn1304files.storage.live.com/y4mrcKfQ8ycNIwzPZK2BCCD_BQZdMSSiFZNhEqHEH5Npt5raR4X9hHneE_XyC4dGyMd3ET3f009irzLyiDSqJvsY6KkjL3c6sFIyBQT6yQt_eeWziq3Ddwgg57PQbOBVNuFGn1YyGqUxK9blW3udDpucbZxPosJHdYNq_HPOqLH8QH1CWDGteinprUIY14T_nFa?width=455&height=304&c'),
(17, 'Liquid luxury: Chanel’s Jewellery Eternal Collection No. 5', 'The number 5 and perfume drops are the only two motifs in Chanel’s new no.5  Eternal Jewellery Collection crafted in diamonds and white gold. The jewels are inspired by the famous fragrance created by Mademoiselle Chanel in 1921 and celebrate a centenary of success of perhaps the most famous perfume in the world.\r\n\r\nSurprisingly, the digit 5 perfectly lends itself to jewellery thanks to its pleasing combination of vertical and round forms.  Although Gabrielle Chanel did not use the number 5 herself in jewels, she was instinctively attracted to the force and versatility of its incongruous form. The number 5 was the superstitious designer’s lucky number, which is why she chose it as the name for her first perfume. And it looks like luck was on her side as the scent reaches its 100th anniversary and lies at the core of the success of the maison.\r\n\r\nChanel has also launched the No 5 high jewellery collection based around the same fragrance of one-of-a-kind jewels featuring the famous fragrance bottle, its stopper and its olfactory make-up. \r\n\r\nThe graphic force of the number 5 is most evident in the ring where it is set with diamonds and lies flush in a smooth band of gold. Minimal yet opulent, the impact is enhanced by the sizeable diamond that floats at its centre. The mood is young and carefree, as easy to wear as a splash of perfume that lingers on the skin with a glistening lightness.', 'https://bn1304files.storage.live.com/y4mgZHUdtYsYOHxcf5gfvIxWBvhCLunaeENCP6Cbnhvfq2atZb8DUSDmSkPEF75sXFay0nl5DOVOA0GcPScOx0uLqoEVwCwhyoKFoJ8_v3l3IJh-vvlSBLe-CnCKSg8Ik4e7zM09myvnEQFPYPS0rORlVFD0Zd6h5twI-Mf9Y1sBX7JQj2uKYiWfr4JIJrbzv7k?width=660&height=660&c');

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
(14, 'pepegaswiper69', '$2y$10$.n.ZA5tsH57DQNBXqt02Kubfh8Q3ivr16HGVfSQNyc9Lk2BniXlAi', 'a@b.c', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'johnd', '$2y$10$aKKVW5Nm7NC81L9gEXoRG.m/zfs34siqe.Y1y3iwctrTG3Ipd49w2', 'johndoe@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(14, 2),
(15, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
