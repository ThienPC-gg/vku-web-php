-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 07, 2023 lúc 04:50 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `coderszine_demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `image`, `created`, `modified`) VALUES
(12345678, 'The Hotel Crown ', '<br>\r\n<ul class=\"hotels\"><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon room appendRight5\"></span>Room Size: 9.14 X 6.1 sq.mtr</li><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon bed appendRight5\"></span>Bed Type: King Bed</li><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon balcony appendRight5\"></span>View: Sea View</li><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon defaultAmenIcon appendRight5\"></span>Air Conditioning</li><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon defaultAmenIcon appendRight5\"></span>Wi-Fi</li><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon defaultAmenIcon appendRight5\"></span>Electric Kettle</li></ul>', 12000, 'hotel1.jpg', '0000-00-00 00:00:00', '2019-01-19 08:43:04'),
(12345679, 'The Hotel Royal', '<br>\r\n<ul class=\"hotels\"><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon room appendRight5\"></span>Room Size: 15.24 X 15.24 sq.mtr</li><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon defaultAmenIcon appendRight5\"></span>Air Conditioning</li><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon defaultAmenIcon appendRight5\"></span>Wi-Fi</li><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon defaultAmenIcon appendRight5\"></span>Iron/Ironing Board</li><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon defaultAmenIcon appendRight5\"></span>Mineral Water</li><li class=\"makeFlex appendBottom5\"><span class=\"amenitiesSprite amenitiesIcon defaultAmenIcon appendRight5\"></span>Laundry Service</li></ul>', 15000, 'hotel2.jfif', '0000-00-00 00:00:00', '2019-01-19 08:43:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `ratingId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `ratingNumber` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Block, 0 = Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`ratingId`, `itemId`, `userId`, `ratingNumber`, `title`, `comments`, `created`, `modified`, `status`) VALUES
(14, 12345678, 1, 2, 'amazing place!', 'It\'s really amazing place!!!', '2018-08-19 09:13:01', '2018-08-19 09:13:01', 1),
(15, 12345678, 2, 5, 'Nice place', 'Really nice hotels with best facility!', '2018-08-19 09:13:37', '2018-08-19 09:13:37', 1),
(16, 12345678, 3, 1, 'Nice stay', 'its best experience.', '2018-08-19 09:14:19', '2018-08-19 09:14:19', 1),
(17, 12345678, 4, 1, 'super awesome ', 'i think its supper place.', '2018-08-19 09:18:00', '2018-08-19 09:18:00', 1),
(23, 12345678, 5, 5, 'Nice hotel', 'this is best place to stay!', '2019-01-20 17:01:37', '2019-01-20 17:01:37', 1),
(24, 12345679, 3, 1, 'really nice place', 'Good!', '2019-01-20 21:06:48', '2019-01-20 21:06:48', 1),
(25, 12345679, 3, 4, 'best place', 'I really like to stay there!', '2019-08-18 14:46:33', '2019-08-18 14:46:33', 1),
(26, 12345678, 4, 5, 'a', 'a', '2023-11-02 09:42:03', '2023-11-02 09:42:03', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating_users`
--

CREATE TABLE `rating_users` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `rating_users`
--

INSERT INTO `rating_users` (`userid`, `username`, `password`, `avatar`) VALUES
(1, 'prince', '123', 'user1.jpg'),
(2, 'jhon', '123', 'user2.jpg'),
(3, 'andy', '123', 'user3.jpg'),
(4, 'root', '123', 'user4.jpg'),
(5, 'robert', '123', 'user5.jpg'),
(6, 'steve', '123', 'user6.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`ratingId`);

--
-- Chỉ mục cho bảng `rating_users`
--
ALTER TABLE `rating_users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12345680;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `ratingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `rating_users`
--
ALTER TABLE `rating_users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
