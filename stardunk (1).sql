-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 13 dec 2019 om 09:15
-- Serverversie: 10.1.39-MariaDB
-- PHP-versie: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stardunk`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(20) NOT NULL,
  `customer_id` int(20) DEFAULT NULL,
  `order_status_code` varchar(100) DEFAULT NULL,
  `payment_method_code` varchar(100) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `der_order_price` decimal(65,2) DEFAULT NULL,
  `other_order_details` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customer_orders_products`
--

CREATE TABLE `customer_orders_products` (
  `order_id` int(20) DEFAULT NULL,
  `product_id` int(20) DEFAULT NULL,
  `quantity` int(20) DEFAULT NULL,
  `comments` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `product_id` int(20) NOT NULL,
  `product_type_code` int(20) DEFAULT NULL,
  `supplier_id` int(20) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_price` decimal(65,2) DEFAULT NULL,
  `other_product_details` varchar(10000) DEFAULT NULL,
  `exp_date` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`product_id`, `product_type_code`, `supplier_id`, `product_name`, `product_price`, `other_product_details`, `exp_date`) VALUES
(0, 0, 0, 'fv', '0.00', 'fv', 0),
(1, 1, 1, 'Sprinked', '1.29', '1 pc.', 0),
(2, 1, 1, 'Chocolate', '1.49', '1 pc.', 0),
(3, 1, 1, 'Maple', '1.29', '1 pc.', 0),
(4, 2, 2, 'Dunkaccino', '1.69', 'Small', 0),
(5, 3, 3, 'Steak Long Jim', '2.29', 'Steak Wrap', 0),
(6, 1, 1, 'sluduo', '1.20', 'small', 0),
(7, 0, 1, 'eieren', '1.00', 'small', 0),
(8, 0, 1, 'eieren', '1.00', 'small', 0),
(9, 0, 1, 'eieren', '1.00', 'small', 0),
(10, 0, 1, 'eieren', '1.00', 'small', 0),
(15, 0, 0, 'rte', '0.00', 'rtew', 0),
(134, 0, 0, 'g', '0.00', 'fg', 0),
(6666, 99, 6, '6', '0.00', 'vf', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexen voor tabel `customer_orders_products`
--
ALTER TABLE `customer_orders_products`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `customer_orders_products`
--
ALTER TABLE `customer_orders_products`
  ADD CONSTRAINT `customer_orders_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `customer_orders` (`order_id`),
  ADD CONSTRAINT `customer_orders_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
