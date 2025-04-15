-- Create the database
CREATE DATABASE IF NOT EXISTS medical_shop;
USE medical_shop;

-- Create products table
CREATE TABLE IF NOT EXISTS `products` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `price` decimal(10,2) NOT NULL,
    `image` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create doctors table
CREATE TABLE IF NOT EXISTS `doctors` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `specialization` varchar(255) NOT NULL,
    `experience` varchar(50) NOT NULL,
    `image` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create cart table
CREATE TABLE IF NOT EXISTS `cart` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `price` decimal(10,2) NOT NULL,
    `quantity` int(11) NOT NULL,
    `image` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create order table
CREATE TABLE IF NOT EXISTS `order` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `number` varchar(20) NOT NULL,
    `email` varchar(255) NOT NULL,
    `method` varchar(50) NOT NULL,
    `address` text NOT NULL,
    `total_products` text NOT NULL,
    `total_price` decimal(10,2) NOT NULL,
    `placed_on` datetime NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 