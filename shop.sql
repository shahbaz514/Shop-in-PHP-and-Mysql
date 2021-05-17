-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 05:47 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `ac_num` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `bank`, `title`, `ac_num`, `date`) VALUES
(1, 'Easy Paisa', 'Shahbaz Akhtar JAved', '+92 346 3806125', '2021-04-11 17:27:58'),
(2, 'Jazz Cash', 'Shahbaz Akhtar Javed', '+92 300 1471300', '2021-04-11 17:28:30'),
(3, 'Al Habib', 'Shahbaz Akhtar Javed', '93248947591023847', '2021-04-13 14:10:57');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `pass` text NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL,
  `education` text NOT NULL,
  `location` text NOT NULL,
  `description` text NOT NULL,
  `role` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `pass`, `name`, `img`, `education`, `location`, `description`, `role`, `date`) VALUES
(1, 'admin', 'admin@shahbaz514.com', 'Shahbaz514', 'Shahbaz Akhtar Javed', 'form-wizard.png', 'BSCS', 'Lahore', 'Web and Android Developer', 'Admin', '2021-03-30 10:01:16'),
(2, 'shahbaz514', 'info@shahbaz514.com', '123456', 'Shahbaz514, Inc.', 'form-wizard.png', '', '', '', 'Author', '2021-03-29 13:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `category` int(11) NOT NULL,
  `video` text NOT NULL,
  `description` text NOT NULL,
  `username` text NOT NULL,
  `views` int(11) NOT NULL,
  `tags` text NOT NULL,
  `keywords` text NOT NULL,
  `status` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `category`, `video`, `description`, `username`, `views`, `tags`, `keywords`, `status`, `date`) VALUES
(2, 'Syed Shah Hussain Marwandi', 1, '230283422.mp4', 'Syed Shah Hussain Marwandi popularly known as Lal Shahbaz Qalandar, was a Saint and religious-poet of present-day Pakistan and Afghanistan. He is highly regarded and respected by people of all religions.', 'admin', 0, 'Syed Shah Hussain Marwandi, Lal, Shahbaz, Qalander', 'Syed Shah Hussain Marwandi, Lal, Shahbaz, Qalander', 'Publish', '2021-04-03 04:31:26'),
(3, 'Syed Ahmed Shah Abdali', 1, '230283422.mp4', 'Syed Shah Hussain Marwandi popularly known as Lal Shahbaz Qalandar, was a Saint and religious-poet of present-day Pakistan and Afghanistan. He is highly regarded and respected by people of all religions.', 'admin', 6, 'Syed Shah Hussain Marwandi, Lal, Shahbaz, Qalander', 'Syed Shah Hussain Marwandi, Lal, Shahbaz, Qalander', 'Publish', '2021-04-13 14:16:22'),
(4, 'Hazrat Lal Shahbaz Qalander', 1, '230283422.mp4', 'Syed Shah Hussain Marwandi popularly known as Lal Shahbaz Qalandar, was a Saint and religious-poet of present-day Pakistan and Afghanistan. He is highly regarded and respected by people of all religions.', 'admin', 2, 'Syed Shah Hussain Marwandi, Lal, Shahbaz, Qalander', 'Syed Shah Hussain Marwandi, Lal, Shahbaz, Qalander', 'Publish', '2021-04-13 14:15:33'),
(5, 'Animated Short Film HD \" WATCH YOUR FEELINGS \"', 1, '328638095.mp4', 'Inspirational to watch your feelings and know the truth of hate and know that it&#39;s a real monster Subscribe https://www.youtube.com/channel/UCl3CCqjdosC1McU0...\r\n\r\n', 'admin', 4, 'HP, Laptop, Dell, Sumsung', 'HP, Laptop, Dell, Sumsung', 'Publish', '2021-04-13 14:35:14'),
(6, 'Pip | A Short Animated Film', 1, '1246146576.mp4', 'Pip | A Short Animated Film\r\n', 'admin', 3, 'Syed Shah Hussain Marwandi, Lal, Shahbaz, Qalander', 'HP, Laptop, Dell, Sumsung', 'Publish', '2021-04-13 14:00:18'),
(8, 'YOUNG WOMAN WEARING DRESS', 1, '13116782220.12019300 1618160718.mp4', 'YOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESSYOUNG WOMAN WEARING DRESS', 'shahbazakhtarjaved@gmail.com', 9, 'Syed Shah Hussain Marwandi, Lal, Shahbaz, Qalander', 'Syed Shah Hussain Marwandi, Lal, Shahbaz, Qalander', 'Publish', '2021-04-13 14:27:48');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `date`) VALUES
(2, 'Zara', '2021-04-07 10:52:39'),
(3, 'Gull Ahmed', '2021-04-07 10:56:01'),
(4, 'Polo', '2021-04-07 10:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `color` text NOT NULL,
  `size` text NOT NULL,
  `price` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL,
  `status` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `img`, `status`, `date`) VALUES
(5, 'Women Dresses', '1353665101.jpg', 'Publish', '2021-04-06 04:48:23'),
(6, 'Men Dresses ', '1661229736.jpg', 'Publish', '2021-04-06 04:49:03'),
(7, 'Man Glasses', '1613398434.jpg', 'Publish', '2021-04-07 02:42:31'),
(8, 'Women Classes', '479653299.jpg', 'Publish', '2021-04-07 02:43:27'),
(9, 'Accessories', '881531868.jpg', 'Publish', '2021-04-09 01:45:05'),
(10, 'Shoes', '151165862.jpg', 'Publish', '2021-04-09 01:46:39'),
(11, 'Beuty Products', '1716234768.jpg', 'Publish', '2021-04-09 01:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `cat_blog`
--

CREATE TABLE `cat_blog` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cat_blog`
--

INSERT INTO `cat_blog` (`id`, `name`, `date`) VALUES
(1, 'Islamic Videos', '2021-04-03 04:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `postid` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `message`, `postid`, `date`) VALUES
(2, 'Shahbaz Akhtar Javed', 'shahbazakhtarjaved@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4, '2021-04-07 16:39:46'),
(3, 'Dr. Zahid Mehmood', 'zahid.mehmood@cs.uol.edu.pk', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4, '2021-04-07 16:40:07'),
(4, 'Shahbaz Akhtar Javed', 'shahbazakhtarjaved@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n', 4, '2021-04-07 16:44:40'),
(5, 'Shahbaz Akhtar Javed', 'shahbazakhtarjaved@gmail.com', 'Testing', 7, '2021-04-11 16:24:47'),
(6, 'Shahbaz Akhtar Javed', 'shahbazakhtarjaved@gmail.com', 'Nice Post!', 6, '2021-04-13 14:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `img` text NOT NULL,
  `address` text NOT NULL,
  `country` text NOT NULL,
  `phone` text NOT NULL,
  `cardnumber` text NOT NULL,
  `vmounth` int(11) NOT NULL,
  `vyear` int(11) NOT NULL,
  `securitycode` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `img`, `address`, `country`, `phone`, `cardnumber`, `vmounth`, `vyear`, `securitycode`, `date`) VALUES
(1, 'Shahbaz Akhtar Javed', 'shahbazakhtarjaved@gmail.com', '123456', '182511239.14584.jpg', 'Ahmed Nagar Tehsil Lalian District Chiniot', 'Pakistan', '03463806125', '4242424242424242', 12, 2021, 1234, '2021-04-13 15:57:42'),
(2, 'Shahbaz Akhtar Javed', 'zahid.mehmood@cs.uol.edu.pk', '123456', '0.94582500 1617969409.jpg', 'Ahmed Nagar Tehsil Lalian District Chiniot', 'Pakistan', '03463806125', '0', 0, 0, 0, '2021-04-09 11:56:49'),
(3, 'Shahbaz Akhtar Javed', 'maharshahbazakhtarjaved786@gmail.com', '123456', '', 'Ahmed Nagar Tehsil Lalian District Chiniot', 'Pakistan', '03463806125', '0', 0, 0, 0, '2021-04-09 11:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `img`, `date`) VALUES
(1, '1617027340.jpg', '2021-03-29 14:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `date`) VALUES
(1, 'shahbazakhtarjaved@gmail.com', '2021-04-06 05:44:55'),
(3, 'zahid@gmail.com', '2021-04-07 02:13:25'),
(5, 'ali@gmail.com', '2021-04-07 05:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `color` text NOT NULL,
  `size` text NOT NULL,
  `price` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `orderid` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `pid`, `qty`, `color`, `size`, `price`, `totalPrice`, `orderid`, `date`) VALUES
(3, 3, 4, 'Blue', 'Small', 143, 572, '1002', '2021-04-12 11:26:25'),
(4, 4, 7, 'Blue', 'Small', 118, 826, '1002', '2021-04-12 11:26:25'),
(5, 4, 4, 'Blue', 'Small', 118, 472, '1003', '2021-04-13 08:46:17'),
(6, 3, 5, 'Blue', 'Small', 143, 713, '1004', '2021-04-13 14:50:22'),
(7, 3, 4, 'Blue', 'Small', 143, 570, '1005', '2021-04-13 21:49:38');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_num` bigint(20) NOT NULL,
  `card_cvc` int(5) NOT NULL,
  `card_exp_month` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `card_exp_year` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `item_price_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'usd',
  `paid_amount` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_admins`
--

CREATE TABLE `orders_admins` (
  `id` int(11) NOT NULL,
  `orderid` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `discountprice` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `pricereceived` int(11) NOT NULL,
  `paymenttype` text NOT NULL,
  `status` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_admins`
--

INSERT INTO `orders_admins` (`id`, `orderid`, `email`, `discountprice`, `totalPrice`, `pricereceived`, `paymenttype`, `status`, `date`) VALUES
(1, '1001', 'shahbazakhtarjaved@gmail.com', 42, 1440, 1398, 'Card', 'Delivered', '2021-04-13 13:40:56'),
(2, '1002', 'shahbazakhtarjaved@gmail.com', 42, 1440, 1398, 'Card', 'Paid', '2021-04-13 13:40:40'),
(3, '1003', 'shahbazakhtarjaved@gmail.com', 8, 480, 472, 'Card', 'Cancel', '2021-04-13 13:40:50'),
(4, '1004', 'shahbazakhtarjaved@gmail.com', 37, 750, 713, 'Card', 'Pending', '2021-04-13 14:50:22'),
(5, '1005', 'shahbazakhtarjaved@gmail.com', 30, 600, 570, 'Card', 'Pending', '2021-04-13 21:49:38');

-- --------------------------------------------------------

--
-- Table structure for table `orders_customers`
--

CREATE TABLE `orders_customers` (
  `id` int(11) NOT NULL,
  `orderid` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `discountprice` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `pricereceived` int(11) NOT NULL,
  `paymenttype` text NOT NULL,
  `status` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_customers`
--

INSERT INTO `orders_customers` (`id`, `orderid`, `email`, `discountprice`, `totalPrice`, `pricereceived`, `paymenttype`, `status`, `date`) VALUES
(2, '1001', 'shahbazakhtarjaved@gmail.com', 42, 1440, 1398, 'Card', 'Delivered', '2021-04-13 15:49:04'),
(3, '1002', 'shahbazakhtarjaved@gmail.com', 42, 1440, 1398, 'Card', 'Paid', '2021-04-13 04:38:33'),
(4, '1003', 'shahbazakhtarjaved@gmail.com', 8, 480, 472, 'Card', 'Cancel', '2021-04-13 13:43:12'),
(5, '1004', 'shahbazakhtarjaved@gmail.com', 37, 750, 713, 'Card', 'Paid', '2021-04-13 21:51:15'),
(6, '1005', 'shahbazakhtarjaved@gmail.com', 30, 600, 570, 'Card', 'Paid', '2021-04-13 21:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `img` text NOT NULL,
  `img1` text NOT NULL,
  `img2` text NOT NULL,
  `category` int(11) NOT NULL,
  `brand` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `shape` int(11) NOT NULL,
  `description` text NOT NULL,
  `tags` text NOT NULL,
  `keywords` text NOT NULL,
  `reviews_count` int(11) NOT NULL,
  `reviews_value` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `status` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `username`, `img`, `img1`, `img2`, `category`, `brand`, `price`, `qty`, `discount`, `shape`, `description`, `tags`, `keywords`, `reviews_count`, `reviews_value`, `views`, `status`, `date`) VALUES
(3, 'OLD WOMAN WEARING DRESS', 'admin', '1798858442.jpg', '806113228.jpg', '806113228.jpg', 5, 3, 150, 20, 5, 3, 'On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word \"and\" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused he', 'women, gays hurgless, Diamond', 'women, hurgless', 0, 0, 18, 'Publish', '2021-04-13 21:49:20'),
(4, 'YOUNG WOMAN WEARING DRESS', 'admin', '806113228.jpg', '806113228.jpg', '806113228.jpg', 5, 2, 120, 23, 2, 5, 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'women, hurgless,Diamond', 'women, hurgless', 0, 0, 8, 'Publish', '2021-04-13 14:15:35'),
(5, 'YOUNG WOMAN WEARING DRESS', 'admin', '129984508.jpg', '1798858442.jpg', '806113228.jpg', 5, 2, 110, 19, 4, 4, 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'women, hurgless, Diamond', 'women, hurgless', 0, 0, 0, 'Publish', '2021-04-12 17:16:03'),
(6, 'YOUNG WOMAN WEARING DRESS', 'admin', '480184778.jpg', '1798858442.jpg', '806113228.jpg', 5, 2, 100, 20, 3, 3, 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'women, hurgless', 'women, hurgless', 0, 0, 0, 'Publish', '2021-04-09 03:51:52'),
(7, 'YOUNG WOMAN WEARING DRESS', 'admin', '1798858442.jpg', '129984508.jpg', '806113228.jpg', 5, 2, 150, 20, 5, 3, 'On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word \"and\" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused he', 'women, hurgless', 'women, hurgless', 0, 0, 0, 'Publish', '2021-04-09 03:51:52'),
(8, 'YOUNG WOMAN WEARING DRESS', 'admin', '806113228.jpg', '129984508.jpg', '806113228.jpg', 5, 2, 120, 23, 2, 5, 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'women, hurgless', 'women, hurgless', 0, 0, 0, 'Publish', '2021-04-09 03:51:52'),
(9, 'YOUNG WOMAN WEARING DRESS', 'admin', '129984508.jpg', '1798858442.jpg', '806113228.jpg', 5, 2, 110, 19, 4, 4, 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'women, hurgless', 'women, hurgless', 0, 0, 0, 'Publish', '2021-04-09 03:51:52'),
(10, 'YOUNG WOMAN WEARING DRESS', 'admin', '480184778.jpg', '1798858442.jpg', '806113228.jpg', 5, 2, 100, 20, 3, 3, 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'women, hurgless', 'women, hurgless', 0, 0, 3, 'Publish', '2021-04-13 14:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL,
  `o1` text NOT NULL,
  `o2` text NOT NULL,
  `o3` text NOT NULL,
  `op1` text NOT NULL,
  `op2` text NOT NULL,
  `op3` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `name`, `img`, `o1`, `o2`, `o3`, `op1`, `op2`, `op3`, `date`) VALUES
(1, 'Which of Three Images Most Relievable Your Waste?', '01.PNG', '', '', '', '', '', '', '2021-04-12 14:15:29'),
(2, 'Which is Larger Your Bust? Your Hips Or Both Same?', '02.PNG', 'Top Hourglass', 'Hourglass', '', '1', '', '', '2021-04-12 14:53:15'),
(3, 'Which of Theses Images More Relievable Your Hips?', '03.PNG', 'Spoon', 'Bottom Hourglass', 'NAN', '', '', '2', '2021-04-12 14:53:48'),
(4, 'Which is Larger Your Bust? Your Hips Or Both Same?', '04.PNG', 'Inverted Triangle', 'Rectangle', '', '', '1', '', '2021-04-12 14:53:57'),
(5, 'Which of Theses Images More Relievable Your Hips?', '03.PNG', 'Spoon', 'Triangle', 'NAN', '', '', '4', '2021-04-12 14:54:31'),
(6, 'Which is Larger Your Bust? Your Waste?', '05.PNG', 'Oval', 'Diamond', 'NAN', '', '', '1', '2021-04-12 14:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `c_email` text NOT NULL,
  `pid` int(11) NOT NULL,
  `description` text NOT NULL,
  `rating_value` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `c_email`, `pid`, `description`, `rating_value`, `date`) VALUES
(1, 'shahbazakhtarjaved@gmail.com', 3, 'On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word \"and\" and the Little Blind Text should turn around and return to its own, safe country.', 5, '2021-04-09 03:30:01'),
(2, 'shahbazakhtarjaved@gmail.com', 3, 'On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word \"and\" and the Little Blind Text should turn around and return to its own, safe country.', 4, '2021-04-09 03:38:51'),
(3, 'shahbazakhtarjaved@gmail.com', 3, 'On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word \"and\" and the Little Blind Text should turn around and return to its own, safe country.', 3, '2021-04-09 03:39:01'),
(4, 'shahbazakhtarjaved@gmail.com', 3, 'On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word \"and\" and the Little Blind Text should turn around and return to its own, safe country.', 2, '2021-04-09 03:39:15'),
(5, 'shahbazakhtarjaved@gmail.com', 3, 'On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word \"and\" and the Little Blind Text should turn around and return to its own, safe country.', 1, '2021-04-09 03:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tag` text NOT NULL,
  `views` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`, `views`, `date`) VALUES
(1, 'Womans', 0, '2021-04-07 03:04:52'),
(2, 'Mans', 0, '2021-04-07 03:04:52'),
(3, 'Kids', 0, '2021-04-07 03:05:19'),
(4, 'Watches', 0, '2021-04-07 03:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `description`, `date`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.\r\n', '2021-03-16 02:00:04'),
(2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.\r\n', '2021-03-16 02:00:02'),
(3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.\r\n', '2021-03-16 01:59:59'),
(4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.	', '2021-03-16 02:13:33'),
(5, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.	', '2021-04-13 14:12:29'),
(6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.	', '2021-04-13 14:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `pid` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `email`, `pid`, `date`) VALUES
(1, 'shahbazakhtarjaved@gmail.com', 10, '2021-04-09 12:47:27'),
(4, 'shahbazakhtarjaved@gmail.com', 9, '2021-04-09 14:35:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_blog`
--
ALTER TABLE `cat_blog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`) USING HASH;

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_admins`
--
ALTER TABLE `orders_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orderid` (`orderid`);

--
-- Indexes for table `orders_customers`
--
ALTER TABLE `orders_customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orderid` (`orderid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag` (`tag`) USING HASH;

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cat_blog`
--
ALTER TABLE `cat_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_admins`
--
ALTER TABLE `orders_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders_customers`
--
ALTER TABLE `orders_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
