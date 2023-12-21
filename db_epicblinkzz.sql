-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 09:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: db_epicblinkzz
--

-- --------------------------------------------------------

--
-- Table structure for table cart
--

CREATE TABLE cart (
  id int(11) NOT NULL,
  user_id int(11) DEFAULT NULL,
  name varchar(100) NOT NULL,
  price decimal(10,2) NOT NULL,
  image varchar(100) NOT NULL,
  quantity int(11) NOT NULL,
  created_at timestamp NOT NULL DEFAULT current_timestamp(),
  updated_at timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table orders
--

CREATE TABLE orders (
  id int(11) NOT NULL,
  user_id int(11) DEFAULT NULL,
  name varchar(100) NOT NULL,
  number varchar(15) DEFAULT NULL,
  email varchar(50) NOT NULL,
  method varchar(50) NOT NULL,
  flat varchar(50) DEFAULT NULL,
  street varchar(100) DEFAULT NULL,
  city varchar(100) DEFAULT NULL,
  province varchar(100) DEFAULT NULL,
  country varchar(100) DEFAULT NULL,
  pin_code varchar(20) DEFAULT NULL,
  total_product varchar(255) DEFAULT NULL,
  price_total decimal(10,2) DEFAULT NULL,
  created_at timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table products
--

CREATE TABLE products (
  id int(11) NOT NULL,
  name varchar(100) NOT NULL,
  price decimal(10,2) NOT NULL,
  image varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table products
--

INSERT INTO products (id, name, price, image) VALUES
(1, 'Album Born Pink 2022', 20.00, 'Album Born Pink 2022.jpeg'),
(2, 'Foto Card', 10.00, 'Foto Card.jpg'),
(3, 'Hoodie H&M x Blackpink', 40.00, 'Hoodie H&M x Blackpink.png'),
(4, 'Blackpink Lightstick Ver.2', 80.00, 'Blackpink Lightstick Ver.2.jpg'),
(5, 'Album The Album 2020', 30.00, 'Album The Album 2020.jpg'),
(6, 'Tumbler Starbucks x Blackpink', 50.00, 'Tumbler Starbucks x Blackpink.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table users
--

CREATE TABLE users (
  id int(11) NOT NULL,
  username varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  password varchar(255) NOT NULL,
  created_at timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table cart
--
ALTER TABLE cart
  ADD PRIMARY KEY (id),
  ADD KEY user_id (user_id);

--
-- Indexes for table orders
--
ALTER TABLE orders
  ADD PRIMARY KEY (id),
  ADD KEY user_id (user_id);

--
-- Indexes for table products
--
ALTER TABLE products
  ADD PRIMARY KEY (id);

--
-- Indexes for table users
--
ALTER TABLE users
  ADD PRIMARY KEY (id);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table cart
--
ALTER TABLE cart
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table orders
--
ALTER TABLE orders
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table products
--
ALTER TABLE products
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table users
--
ALTER TABLE users
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table cart
--
ALTER TABLE cart
  ADD CONSTRAINT cart_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (id);

--
-- Constraints for table orders
--
ALTER TABLE orders
  ADD CONSTRAINT orders_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (id);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;