-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2021 at 02:37 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thehealthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_unique_id` varchar(255) NOT NULL,
  `admin_upline_id` varchar(255) NOT NULL,
  `admin_role` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_contact_number` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_gender` varchar(255) NOT NULL,
  `admin_whatsapp` varchar(255) NOT NULL,
  `admin_wechat` varchar(255) NOT NULL,
  `admin_ic_number` varchar(255) NOT NULL,
  `admin_ic_frontImage` varchar(255) NOT NULL,
  `admin_ic_backImage` varchar(255) NOT NULL,
  `admin_ic_selfImage` varchar(255) NOT NULL,
  `admin_address` varchar(255) NOT NULL,
  `admin_post_code` varchar(255) NOT NULL,
  `admin_city` varchar(255) NOT NULL,
  `admin_country` varchar(255) NOT NULL,
  `admin_profile_image` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_create_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_unique_id`, `admin_upline_id`, `admin_role`, `admin_username`, `admin_contact_number`, `admin_email`, `admin_name`, `admin_gender`, `admin_whatsapp`, `admin_wechat`, `admin_ic_number`, `admin_ic_frontImage`, `admin_ic_backImage`, `admin_ic_selfImage`, `admin_address`, `admin_post_code`, `admin_city`, `admin_country`, `admin_profile_image`, `admin_password`, `admin_create_time`) VALUES
(1, 'THCADID4024350036', '', 'Super Admin', 'weichun', '010-8820074', 'weijun1430@gmail.com', 'Tan Wei Chun', 'Male', 'ewqeqw', 'weijun1430', 'sjdasjdiajdioa', '', '', '', 'No.14 Jalan Anggerik 1/3, Taman Anggerik', '81200', 'Johor Bahru', 'Johor', 'avatar-1.png', '$2y$10$zkofLe1X0AkoTPccZAr6M.ZjHqhQmNGuSMCxGmS63SD8xvOPIHWiW', '2021-07-22 09:57:38'),
(3, 'THCADID7082001603', 'THCADID9409487063', 'Admin', 'weichun', '010-8820074', 'tanweichun101@yahoo.com', 'Tan Wei Chun', 'Male', 'ewqeqw', 'qwewqeq', 'sjdasjdiajdioa', '', '', '', 'No.14 Jalan Anggerik 1/3, Taman Anggerik', '81200', 'Johor Bahru', 'Johor', 'avatar-1.png', '$2y$10$ln4MPNwXkqAorkuDRbSms.ISyXMJX6wUpjWWh8K4MKM4Dr/zMS.hm', '2021-07-26 10:23:46'),
(4, 'THCADID9409487063', '', 'Super Admin', 'THCO', '123', 'admin@admin.com', 'THCO', 'Male', '123', '123', '123', '', '', '', '12', '12', '12', '12', 'avatar-1.png', '$2y$10$FFNPItEr452Nn2Hrwfk//uTutYcQSfzh8Ca/65IgcGSyeJALkYA5W', '2021-08-13 17:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `admin_cart`
--

CREATE TABLE `admin_cart` (
  `admin_cart_id` int(11) NOT NULL,
  `admin_id` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `product_id` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `cart_quantity` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `cart_total_price` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `cart_status` varchar(255) NOT NULL,
  `cart_create_time` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_cart`
--

INSERT INTO `admin_cart` (`admin_cart_id`, `admin_id`, `product_id`, `cart_quantity`, `cart_total_price`, `cart_status`, `cart_create_time`) VALUES
(1, 'THCADID5165309103', '1', '2', '60', 'paid', '2021-07-21 14:48:03'),
(4, 'THCADID5165309103', '1', '2', '60', 'pending', '2021-07-22 14:48:03'),
(5, 'THCADID5165309103', '1', '2', '60', 'complete', '2021-07-23 14:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `admin_membership`
--

CREATE TABLE `admin_membership` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `admin_mp_point` int(11) NOT NULL,
  `admin_mp_status` varchar(255) NOT NULL,
  `admin_tp_point` int(11) NOT NULL,
  `admin_create_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_membership`
--

INSERT INTO `admin_membership` (`id`, `admin_id`, `admin_mp_point`, `admin_mp_status`, `admin_tp_point`, `admin_create_time`) VALUES
(1, 'THCADID4024350036', 150, 'bronze', 0, '2021-07-21 10:23:46'),
(3, 'THCADID7082001603', 0, 'bronze', 25, '2021-07-26 10:23:46'),
(4, 'THCADID1226607021', 0, '-', 0, '2021-08-16 17:29:04'),
(5, 'THCADID9105720538', 0, '-', 0, '2021-08-16 17:29:56'),
(6, 'THCADID1403016309', 0, '-', 0, '2021-08-16 17:32:28'),
(7, 'THCADID6368726742', 0, '-', 0, '2021-08-16 17:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `admin_sales`
--

CREATE TABLE `admin_sales` (
  `admin_sales_id` int(11) NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `admin_my_sales` varchar(255) NOT NULL,
  `admin_downline_sales` varchar(255) NOT NULL,
  `admin_total_income` varchar(255) NOT NULL,
  `sales_create_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_sales`
--

INSERT INTO `admin_sales` (`admin_sales_id`, `admin_id`, `admin_my_sales`, `admin_downline_sales`, `admin_total_income`, `sales_create_date`) VALUES
(1, 'THCADID7082001603', '100', '100', '200', '2021-07-22 09:57:38'),
(2, 'THCADID7082001603', '200', '100', '200', '2021-07-22 10:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `admin_wallet`
--

CREATE TABLE `admin_wallet` (
  `wallet_id` int(11) NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `bank_id` varchar(255) NOT NULL,
  `bank_account` varchar(255) NOT NULL,
  `bank_holdername` varchar(255) NOT NULL,
  `bank_password` varchar(255) NOT NULL,
  `bank_create_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_wallet`
--

INSERT INTO `admin_wallet` (`wallet_id`, `admin_id`, `bank_id`, `bank_account`, `bank_holdername`, `bank_password`, `bank_create_time`) VALUES
(1, 'THCADID4024350036', 'Maybank', '3193103819', 'weichun', '$2y$10$bW0FfLfKnIcW7Y6SaDkyl.hd41qBbLbtfzshatyJy3QvhUGgAeOM2', '2021-07-22 09:57:49'),
(2, 'THCADID2677817973', 'CIMB Group Holdings', '3193103819', 'weichun', '$2y$10$YVUZ8N.ZOvg1mrC1IhRdzufGw/8EgrOK.KEgCOokAUzRO406PwogW', '2021-07-22 10:00:43'),
(3, 'THCADID7082001603', 'RHB Bank', '3193103819', 'weichun', '$2y$10$HiDYBUT3mEdONiXARYK3/ua3EWeKNFBaDEx2ofR.G64q8oVvfsyxS', '2021-07-26 10:24:09'),
(7, 'THCADID6368726742', 'Maybank', '3193103819', 'weichun', '$2y$10$ps4VQJiopuhXNxTXxkITqeccMFDGEDhcHMxtajiB8lZws0VsfZCzu', '2021-08-17 17:43:33'),
(8, 'THCADID9409487063', 'Choose Bank', '3193103819', 'weichun', '$2y$10$bnAkDJUo7m0YlDP7ZjT6mOfMei.9cpXEKWoJsGyepXZOHKOGlr9dq', '2021-09-20 17:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_subject` text NOT NULL,
  `contact_message` text NOT NULL,
  `contact_create_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payment_name` varchar(255) NOT NULL,
  `payment_email_phone` varchar(255) NOT NULL,
  `payment_address` varchar(255) NOT NULL,
  `payment_post_code` varchar(255) NOT NULL,
  `payment_city` varchar(255) NOT NULL,
  `payment_state` varchar(255) NOT NULL,
  `payment_country` varchar(255) NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `shipping_id` varchar(255) NOT NULL,
  `payment_amount` varchar(255) NOT NULL,
  `deliver_status` varchar(255) NOT NULL,
  `verify_code` varchar(255) NOT NULL,
  `verify_status` varchar(255) NOT NULL,
  `payment_create_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_id`, `payment_name`, `payment_email_phone`, `payment_address`, `payment_post_code`, `payment_city`, `payment_state`, `payment_country`, `admin_id`, `product_id`, `product_quantity`, `shipping_id`, `payment_amount`, `deliver_status`, `verify_code`, `verify_status`, `payment_create_time`) VALUES
(32, '20210920202610', 'Tan Chun', 'weijun1430@gmail.com', 'No.14 Jalan Anggerik 1/3, Taman Anggerik', '81200', 'Johor Bahru', 'Johor', 'Malaysia', 'THCADID9409487063', '1', '1', '1', 'MYR 1.00', 'paid', '1234', '2', '2021-09-20 20:27:18'),
(34, '20210920202738', 'Tan Chun', 'weijun1430@gmail.com', 'No.14 Jalan Anggerik 1/3, Taman Anggerik', '81200', 'Johor Bahru', 'Johor', 'Malaysia', 'THCADID9409487063', '1', '1', '1', 'MYR 1.00', 'paid', '12345', '2', '2021-09-20 20:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_create_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `product_description`, `product_image`, `product_price`, `product_create_time`) VALUES
(1, '1', 'AIMPRO', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore repellat iusto vel blanditiis in voluptatibus error iure alias perspiciatis quis. Iusto hic sit corrupti doloremque natus fugiat libero consectetur possimus.', 'aimpro.jpg', '100', '2021-09-13 16:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`category_id`, `category_name`) VALUES
(1, 'Product A'),
(2, 'Product B');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_image`
--

CREATE TABLE `product_sub_image` (
  `image_no` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `sub_image` varchar(255) NOT NULL,
  `sub_create_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_method`
--

CREATE TABLE `shipping_method` (
  `shipping_id` int(11) NOT NULL,
  `shipping_name` varchar(255) NOT NULL,
  `shipping_price` varchar(255) NOT NULL,
  `shipping_create_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_method`
--

INSERT INTO `shipping_method` (`shipping_id`, `shipping_name`, `shipping_price`, `shipping_create_time`) VALUES
(1, 'West Malaysia', '8.00', '2021-07-13 16:52:02'),
(2, 'East Malaysia', '8.00', '2021-07-13 16:52:03'),
(3, 'International', '8.00', '2021-07-13 16:52:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_cart`
--
ALTER TABLE `admin_cart`
  ADD PRIMARY KEY (`admin_cart_id`);

--
-- Indexes for table `admin_membership`
--
ALTER TABLE `admin_membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_sales`
--
ALTER TABLE `admin_sales`
  ADD PRIMARY KEY (`admin_sales_id`);

--
-- Indexes for table `admin_wallet`
--
ALTER TABLE `admin_wallet`
  ADD PRIMARY KEY (`wallet_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product_sub_image`
--
ALTER TABLE `product_sub_image`
  ADD PRIMARY KEY (`image_no`);

--
-- Indexes for table `shipping_method`
--
ALTER TABLE `shipping_method`
  ADD PRIMARY KEY (`shipping_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_cart`
--
ALTER TABLE `admin_cart`
  MODIFY `admin_cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_membership`
--
ALTER TABLE `admin_membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin_sales`
--
ALTER TABLE `admin_sales`
  MODIFY `admin_sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_wallet`
--
ALTER TABLE `admin_wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_sub_image`
--
ALTER TABLE `product_sub_image`
  MODIFY `image_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_method`
--
ALTER TABLE `shipping_method`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
