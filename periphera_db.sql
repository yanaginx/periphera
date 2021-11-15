DROP DATABASE IF EXISTS `periphera_db`;
CREATE DATABASE `periphera_db`;
USE `periphera_db`;


CREATE TABLE `user` (
   `id`         int UNIQUE NOT NULL AUTO_INCREMENT,
   `username`   VARCHAR(255) UNIQUE,
   `password`   VARCHAR(255),
   `email`      VARCHAR(255),
   `address_1`  VARCHAR(255) DEFAULT NULL,
   `address_2`  VARCHAR(128) DEFAULT NULL,
   `zipcode`    VARCHAR(10)  DEFAULT NULL,
   `country`    VARCHAR(128) DEFAULT NULL,
   `fname`      VARCHAR(128) DEFAULT NULL,
   `lname`      VARCHAR(128) DEFAULT NULL,
   `phone`      VARCHAR(20)  DEFAULT NULL,
    PRIMARY KEY (`id`),
    INDEX idx_un (`username`)
);

CREATE TABLE `message` (
    `id`            int UNIQUE NOT NULL AUTO_INCREMENT,
    `user_id`       int DEFAULT NULL,
    `content`       TEXT,
    `fname`         VARCHAR(128),
    `lname`         VARCHAR(128),
    `email`         VARCHAR(255),
    PRIMARY KEY (`id`)
);

CREATE TABLE `role` (
    `id`            int UNIQUE NOT NULL AUTO_INCREMENT,
    `role`          VARCHAR(64),
    PRIMARY KEY (`id`)
);

CREATE TABLE `users_have_roles` (
    `user_id`       int,
    `role_id`       int,
    PRIMARY KEY (`user_id`, `role_id`)
);

CREATE TABLE `order` (
    `id`            int UNIQUE NOT NULL AUTO_INCREMENT,
    `user_id`       int,
    `date`          DATETIME,
    PRIMARY KEY (`id`)
);

CREATE TABLE `product` (
    `id`            int UNIQUE NOT NULL AUTO_INCREMENT,
    `category_id`   int DEFAULT NULL,
    `name`          VARCHAR(128),
    `description`   TINYTEXT,
    `date_added`    DATETIME,
    `price`         DECIMAL(16,2),
    `image`         VARCHAR(255),
    `rating`        DECIMAL(2,1),
    `is_featured`   BIT,
    PRIMARY KEY (`id`)
);

CREATE TABLE `order_contains_products` (
    `order_id`      int,
    `product_id`    int,
    PRIMARY KEY (`order_id`, `product_id`)
);

CREATE TABLE `category` (
    `id`            int UNIQUE NOT NULL AUTO_INCREMENT,
    `name`          VARCHAR(64),
    PRIMARY KEY (`id`)
);

CREATE TABLE `news` (
    `id`            int UNIQUE NOT NULL AUTO_INCREMENT,
    `title`         VARCHAR(64),
    `content`       TEXT,
    `image`         VARCHAR(255),
    PRIMARY KEY (`id`)
);


-- FK Constraints --
ALTER TABLE `message`
ADD
    CONSTRAINT fk_message_user_userid FOREIGN KEY (`user_id`) 
        REFERENCES `user`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

ALTER TABLE `users_have_roles`
ADD
    CONSTRAINT fk_have_user_userid FOREIGN KEY (`user_id`)
        REFERENCES `user`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE;
ALTER TABLE `users_have_roles`
ADD
    CONSTRAINT fk_have_role_roleid FOREIGN KEY (`role_id`)
        REFERENCES `role`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

ALTER TABLE `order`
ADD
    CONSTRAINT fk_order_user_userid FOREIGN KEY (`user_id`)
        REFERENCES `user`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

ALTER TABLE `product`
ADD
    CONSTRAINT fk_product_category_cid FOREIGN KEY (`category_id`)
        REFERENCES `category`(`id`)
        ON UPDATE CASCADE
        ON DELETE SET NULL;

ALTER TABLE `order_contains_products`
ADD
    CONSTRAINT fk_contain_order_orderid FOREIGN KEY (`order_id`)
        REFERENCES `order`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE;
ALTER TABLE `order_contains_products`
ADD
    CONSTRAINT fk_contain_product_productid FOREIGN KEY (`product_id`)
        REFERENCES `product`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE;


-- CHECK constraints --
ALTER TABLE `product`
ADD 
    CONSTRAINT chk_rating CHECK (`rating` >= 0 AND `rating` <= 5);

