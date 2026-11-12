-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2019 at 02:05 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coderszine_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `image`, `created`, `modified`) VALUES
(12345678, 'The Hotel Crown ', '<br>\r\n<ul class=\"hotels\"><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon room appendRight5\"></span>Room Size: 9.14 X 6.1 sq.mtr</li><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon bed appendRight5\"></span>Bed Type: King Bed</li><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon balcony appendRight5\"></span>View: Sea View</li><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon defaultAmenIcon appendRight5\"></span>Air Conditioning</li><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon defaultAmenIcon appendRight5\"></span>Wi-Fi</li><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon defaultAmenIcon appendRight5\"></span>Electric Kettle</li></ul>', 12000, 'hotel1.jpg', '0000-00-00 00:00:00', '2019-01-19 08:43:04'),
(12345679, 'The Hotel Royal', '<br>\r\n<ul class=\"hotels\"><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon room appendRight5\"></span>Room Size: 15.24 X 15.24 sq.mtr</li><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon defaultAmenIcon appendRight5\"></span>Air Conditioning</li><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon defaultAmenIcon appendRight5\"></span>Wi-Fi</li><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon defaultAmenIcon appendRight5\"></span>Iron/Ironing Board</li><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon defaultAmenIcon appendRight5\"></span>Mineral Water</li><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon defaultAmenIcon appendRight5\"></span>Laundry Service</li></ul>', 15000, 'hotel2.jfif', '0000-00-00 00:00:00', '2019-01-19 08:43:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12345680;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
