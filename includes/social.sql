-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 22, 2018 lúc 06:56 AM
-- Phiên bản máy phục vụ: 10.1.35-MariaDB
-- Phiên bản PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `social`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social_category`
--

CREATE TABLE `social_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `category_url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `category_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category_parent` int(11) NOT NULL,
  `category_users` int(11) NOT NULL,
  `category_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `social_category`
--

INSERT INTO `social_category` (`category_id`, `category_name`, `category_url`, `category_type`, `category_parent`, `category_users`, `category_time`) VALUES
(1, 'Giải Trí', 'giai-tri', 'video', 0, 1, 1537583461),
(2, 'HOT GIRL', 'hot-girl', 'video', 0, 1, 1537583489),
(3, 'xxxxxxxxxxxx', 'xxxx', 'video', 1, 1, 1537589470),
(4, 'dshgdfh', 'fdhjfdgjfgj', 'video', 3, 1, 1537591703);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social_media`
--

CREATE TABLE `social_media` (
  `media_id` int(11) NOT NULL,
  `media_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `media_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `media_source` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `media_store` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `media_users` int(11) NOT NULL,
  `media_parent` int(11) NOT NULL,
  `media_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social_post`
--

CREATE TABLE `social_post` (
  `post_id` int(11) NOT NULL,
  `post_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `post_content` text COLLATE utf8_unicode_ci NOT NULL,
  `post_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `post_category` int(11) NOT NULL,
  `post_users` int(11) NOT NULL,
  `post_keyword` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `post_description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `post_source` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `post_store` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `post_status` int(1) NOT NULL DEFAULT '0',
  `post_show` int(1) NOT NULL DEFAULT '0',
  `post_view` int(11) NOT NULL DEFAULT '0',
  `post_url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `post_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social_users`
--

CREATE TABLE `social_users` (
  `users_id` int(11) NOT NULL,
  `users_login` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `users_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `users_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `users_role` int(2) NOT NULL DEFAULT '0',
  `users_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `users_status` int(2) NOT NULL,
  `users_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `social_users`
--

INSERT INTO `social_users` (`users_id`, `users_login`, `users_password`, `users_name`, `users_role`, `users_email`, `users_status`, `users_time`) VALUES
(1, 'dongnv', 'e10adc3949ba59abbe56e057f20f883e', 'Đông Nguyễn', 0, 'nguyenvandong242@gmail.com', 1, 1537365374);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `social_category`
--
ALTER TABLE `social_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`media_id`);

--
-- Chỉ mục cho bảng `social_post`
--
ALTER TABLE `social_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Chỉ mục cho bảng `social_users`
--
ALTER TABLE `social_users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `social_category`
--
ALTER TABLE `social_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `social_media`
--
ALTER TABLE `social_media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `social_post`
--
ALTER TABLE `social_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `social_users`
--
ALTER TABLE `social_users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
