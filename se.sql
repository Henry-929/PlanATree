-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2019-05-21 15:47:09
-- 服务器版本： 10.1.38-MariaDB
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `se`
--

-- --------------------------------------------------------

--
-- 表的结构 `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(255) NOT NULL,
  `cus_password` varchar(255) NOT NULL,
  `cus_fname` varchar(255) NOT NULL,
  `cus_lname` varchar(255) NOT NULL,
  `cus_gender` varchar(255) NOT NULL,
  `cus_email` varchar(255) NOT NULL,
  `cus_phone` varchar(255) NOT NULL,
  `cus_address` varchar(255) NOT NULL,
  `cus_tpq` int(255) NOT NULL,
  `special` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_password`, `cus_fname`, `cus_lname`, `cus_gender`, `cus_email`, `cus_phone`, `cus_address`, `cus_tpq`, `special`) VALUES
(1, '123', 'zzz', 'aaa', 'Male', '123@gmail.com', '0211111111', '111 Queen street', 25, ''),
(2, '123', 'aaa', 'qqq', 'Male', '456@gmail.com', '02111155', '999 queen street', 0, 'no'),
(3, '123', 'rrr', 'hhh', 'Male', '789@gmail.com', '02111199', '555 queen street', 0, 'yes');

-- --------------------------------------------------------

--
-- 表的结构 `shipment`
--

CREATE TABLE `shipment` (
  `ship_id` int(255) NOT NULL,
  `cus_id` int(255) NOT NULL,
  `tree_id` int(255) NOT NULL,
  `ship_type` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `shipment`
--

INSERT INTO `shipment` (`ship_id`, `cus_id`, `tree_id`, `ship_type`) VALUES
(1, 1, 2, 10),
(2, 1, 2, 10),
(3, 1, 1, 10),
(4, 1, 1, 10),
(5, 1, 2, 10),
(6, 1, 1, 5),
(7, 1, 1, 0),
(8, 1, 2, 5),
(9, 1, 2, 0),
(10, 1, 2, 0),
(11, 1, 0, 0),
(12, 1, 2, 0),
(13, 1, 1, 0),
(14, 1, 3, 5),
(15, 1, 4, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tree`
--

CREATE TABLE `tree` (
  `tree_id` int(255) NOT NULL,
  `tree_name` varchar(255) NOT NULL,
  `tree_price` float NOT NULL,
  `tree_category` varchar(255) NOT NULL,
  `tree_soilDrainage` varchar(255) NOT NULL,
  `tree_sun` varchar(255) NOT NULL,
  `tree_mainRequireLv` varchar(255) NOT NULL,
  `tree_des` text NOT NULL,
  `tree_maxHeight` varchar(255) NOT NULL,
  `tree_growthRate` varchar(255) NOT NULL,
  `tree_stock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tree`
--

INSERT INTO `tree` (`tree_id`, `tree_name`, `tree_price`, `tree_category`, `tree_soilDrainage`, `tree_sun`, `tree_mainRequireLv`, `tree_des`, `tree_maxHeight`, `tree_growthRate`, `tree_stock`) VALUES
(1, 'apple tree', 20, 'fruit', 'Well Drained', 'Sunny', 'High', 'An apple is a sweet, edible fruit produced by an apple tree (Malus pumila). Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today.', '5m', 'slow', 19),
(2, 'lemon', 12, 'fruit', 'Well Drained', 'Sunny', 'High', 'An apple is a sweet, edible fruit produced by an apple tree (Malus pumila). Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today.', '10m', 'slow', 15),
(3, 'Paradise Helen', 35, 'hedge', 'Well Drained', 'Sunny', 'High', 'An apple is a sweet, edible fruit produced by an apple tree (Malus pumila). Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today.', '15m', 'slow', 30),
(4, 'Little Gem Magnolia', 60, 'hedge', 'Well Drained', 'Sunny', 'High', 'An apple is a sweet, edible fruit produced by an apple tree (Malus pumila). Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today. ', '5m', 'slow', 26);

-- --------------------------------------------------------

--
-- 表的结构 `treeorder`
--

CREATE TABLE `treeorder` (
  `order_id` int(255) NOT NULL,
  `cus_id` int(255) NOT NULL,
  `tree_id` int(255) NOT NULL,
  `order_quility` int(255) NOT NULL,
  `order_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `treeorder`
--

INSERT INTO `treeorder` (`order_id`, `cus_id`, `tree_id`, `order_quility`, `order_date`) VALUES
(1, 1, 2, 21, '2019-05-21'),
(2, 1, 2, 1, '2019-05-21'),
(3, 1, 1, 1, '2019-05-21'),
(4, 1, 3, 1, '2019-05-21'),
(5, 1, 4, 1, '2019-05-21');

--
-- 转储表的索引
--

--
-- 表的索引 `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`ship_id`);

--
-- 表的索引 `tree`
--
ALTER TABLE `tree`
  ADD PRIMARY KEY (`tree_id`);

--
-- 表的索引 `treeorder`
--
ALTER TABLE `treeorder`
  ADD PRIMARY KEY (`order_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `shipment`
--
ALTER TABLE `shipment`
  MODIFY `ship_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用表AUTO_INCREMENT `tree`
--
ALTER TABLE `tree`
  MODIFY `tree_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `treeorder`
--
ALTER TABLE `treeorder`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
