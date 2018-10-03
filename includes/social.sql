-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 03, 2018 lúc 11:52 AM
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
(2, 'Hot Girl', 'hot-girl', 'video', 0, 1, 1537763133),
(3, 'Troll', 'troll', 'video', 0, 1, 1537763141),
(4, 'Giải Trí', 'giai-tri', 'video', 0, 1, 1537783421),
(5, 'Động Vật', 'dong-vat', 'video', 0, 1, 1537944949);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social_group`
--

CREATE TABLE `social_group` (
  `group_id` int(11) NOT NULL,
  `group_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `group_index` int(11) NOT NULL,
  `group_value` int(11) NOT NULL,
  `group_users` int(11) NOT NULL,
  `group_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `social_group`
--

INSERT INTO `social_group` (`group_id`, `group_type`, `group_index`, `group_value`, `group_users`, `group_time`) VALUES
(1, 'post', 1, 2, 1, 1537849227),
(2, 'post', 1, 4, 1, 1537849227),
(3, 'post', 2, 2, 1, 1537931162),
(4, 'post', 2, 4, 1, 1537931162),
(5, 'post', 3, 4, 1, 1537932748),
(8, 'post', 5, 2, 1, 1537947528),
(9, 'post', 5, 4, 1, 1537947528),
(10, 'post', 6, 2, 1, 1538015877),
(11, 'post', 6, 4, 1, 1538015877),
(12, 'post', 7, 4, 1, 1538018415),
(13, 'post', 8, 2, 1, 1538032195),
(14, 'post', 9, 2, 1, 1538032452),
(15, 'post', 10, 2, 1, 1538032723),
(16, 'post', 11, 2, 1, 1538040554),
(17, 'post', 11, 3, 1, 1538040554),
(18, 'post', 11, 4, 1, 1538040554),
(19, 'post', 12, 5, 1, 1538041283),
(20, 'post', 13, 4, 1, 1538041494),
(21, 'post', 14, 4, 1, 1538041853),
(22, 'post', 14, 5, 1, 1538041853),
(23, 'post', 15, 4, 1, 1538042098),
(24, 'post', 15, 5, 1, 1538042098),
(25, 'post', 16, 2, 1, 1538042989),
(26, 'post', 17, 4, 1, 1538063887),
(27, 'post', 18, 4, 1, 1538064453),
(28, 'post', 19, 4, 1, 1538065249),
(29, 'post', 19, 2, 1, 1538130421),
(30, 'post', 20, 2, 1, 1538448230),
(31, 'post', 21, 4, 1, 1538467287),
(32, 'post', 22, 4, 1, 1538499651),
(33, 'post', 23, 2, 1, 1538499929),
(34, 'post', 23, 4, 1, 1538499929),
(35, 'post', 24, 4, 1, 1538533074),
(36, 'post', 25, 2, 1, 1538535048),
(37, 'post', 25, 4, 1, 1538535048),
(38, 'post', 26, 2, 1, 1538535991),
(39, 'post', 26, 4, 1, 1538535991),
(43, 'post', 29, 2, 1, 1538541565),
(44, 'post', 29, 4, 1, 1538541565);

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

--
-- Đang đổ dữ liệu cho bảng `social_media`
--

INSERT INTO `social_media` (`media_id`, `media_type`, `media_name`, `media_source`, `media_store`, `media_users`, `media_parent`, `media_time`) VALUES
(1, 'images', 'BER8wYaM6U3X.jpg', 'media/images/post/BER8wYaM6U3X.jpg', 'local', 1, 1, 1537849227),
(2, 'video', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86423&authkey=!ACrBky8oREtZwos', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86423&authkey=!ACrBky8oREtZwos', 'onedrive', 1, 1, 1537849227),
(3, 'images', 'LxTKYFWgfkrd.jpg', 'media/images/post/LxTKYFWgfkrd.jpg', 'local', 1, 2, 1537931162),
(4, 'video', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86473&authkey=!AJl0L_0NXcRTFjg', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86473&authkey=!AJl0L_0NXcRTFjg', 'onedrive', 1, 2, 1537931162),
(5, 'images', 'BmSYkhHWCsbI.jpg', 'media/images/post/BmSYkhHWCsbI.jpg', 'local', 1, 3, 1537932748),
(6, 'video', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86474&authkey=!AM5qTwb5xzNBFyY', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86474&authkey=!AM5qTwb5xzNBFyY', 'onedrive', 1, 3, 1537932748),
(9, 'images', 'mVgYq62JNOfy.jpg', 'media/images/post/mVgYq62JNOfy.jpg', 'local', 1, 5, 1537947528),
(10, 'video', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86476&authkey=!ABFkK0SUZ5y_55c', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86476&authkey=!ABFkK0SUZ5y_55c', 'onedrive', 1, 5, 1537947528),
(11, 'images', 'HfTJCVWUpB59.jpg', 'media/images/post/HfTJCVWUpB59.jpg', 'local', 1, 6, 1538015877),
(12, 'video', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86477&authkey=!AJl16b2Sy6l2wKc', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86478&authkey=!ALa5J4al1x3clQs', 'onedrive', 1, 6, 1538015877),
(13, 'images', 'IMelkEZsqxPw.jpg', 'media/images/post/IMelkEZsqxPw.jpg', 'local', 1, 7, 1538018415),
(14, 'video', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86479&authkey=!AMvQ8pRVCDhFz1I', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86479&authkey=!AMvQ8pRVCDhFz1I', 'onedrive', 1, 7, 1538018415),
(15, 'images', 'fQ9I0nt5rC_a.jpg', 'media/images/post/fQ9I0nt5rC_a.jpg', 'local', 1, 8, 1538032195),
(16, 'video', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86480&authkey=!AOlWtI0kgaIE7_4', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86480&authkey=!AOlWtI0kgaIE7_4', 'onedrive', 1, 8, 1538032195),
(17, 'images', 'a_VP5fs9rui2.jpg', 'media/images/post/a_VP5fs9rui2.jpg', 'local', 1, 9, 1538032452),
(18, 'video', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86481&authkey=!AGL9gALAVKATXFM', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86481&authkey=!AGL9gALAVKATXFM', 'onedrive', 1, 9, 1538032452),
(19, 'images', '0xv49MJhDziP.jpg', 'media/images/post/0xv49MJhDziP.jpg', 'local', 1, 10, 1538032723),
(20, 'video', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86482&authkey=!AJPiZOUrIs0jxwY', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86482&authkey=!AJPiZOUrIs0jxwY', 'onedrive', 1, 10, 1538032723),
(21, 'images', '1IzamiUg3owr.jpg', 'media/images/post/1IzamiUg3owr.jpg', 'local', 1, 11, 1538040554),
(22, 'video', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86483&authkey=!AG929YxfmVtrpbo', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86483&authkey=!AG929YxfmVtrpbo', 'onedrive', 1, 11, 1538040554),
(23, 'images', 'dyi6vqw0_oFs.jpg', 'media/images/post/dyi6vqw0_oFs.jpg', 'local', 1, 12, 1538041283),
(24, 'video', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86484&authkey=!AIJSiGqYwXK3RDs', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86484&authkey=!AIJSiGqYwXK3RDs', 'onedrive', 1, 12, 1538041283),
(25, 'images', 'CE5wI98LrVXf.jpg', 'media/images/post/CE5wI98LrVXf.jpg', 'local', 1, 13, 1538041494),
(26, 'video', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86485&authkey=!AFONT6HRjJL22wI', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86485&authkey=!AFONT6HRjJL22wI', 'onedrive', 1, 13, 1538041494),
(27, 'images', 'iUQCl1hfStj8.jpg', 'media/images/post/iUQCl1hfStj8.jpg', 'local', 1, 14, 1538041853),
(28, 'video', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86486&authkey=!AB1K77eWeDpnk1Q', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86486&authkey=!AB1K77eWeDpnk1Q', 'onedrive', 1, 14, 1538041853),
(29, 'images', 'sMFK3mGA6d12.jpg', 'media/images/post/sMFK3mGA6d12.jpg', 'local', 1, 15, 1538042098),
(30, 'video', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86487&authkey=!ABcmKtXd22QNszk', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86487&authkey=!ABcmKtXd22QNszk', 'onedrive', 1, 15, 1538042098),
(31, 'images', 'fomUVl_0gtd3.jpg', 'media/images/post/fomUVl_0gtd3.jpg', 'local', 1, 16, 1538042989),
(32, 'video', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86488&authkey=!AL0RB3Pc2hwHLm8', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86488&authkey=!AL0RB3Pc2hwHLm8', 'onedrive', 1, 16, 1538042989),
(33, 'images', 'PEKr5HUG06So.jpg', 'media/images/post/PEKr5HUG06So.jpg', 'local', 1, 17, 1538063887),
(34, 'video', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86489&authkey=!ABviymECF2f08bA', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86489&authkey=!ABviymECF2f08bA', 'onedrive', 1, 17, 1538063888),
(35, 'images', 'zDgLok2mXb1B.jpg', 'media/images/post/zDgLok2mXb1B.jpg', 'local', 1, 18, 1538064453),
(36, 'video', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86490&authkey=!AGJdWP3HgLVMb4M', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86490&authkey=!AGJdWP3HgLVMb4M', 'onedrive', 1, 18, 1538064453),
(37, 'images', 'bJ8MZ0nFazXI.jpg', 'media/images/post/a6my3ozOL7VE.jpg', 'local', 1, 19, 1538065249),
(38, 'video', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86491&authkey=!AHkAHA-yvR6TSbg', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86491&authkey=!AHkAHA-yvR6TSbg', 'onedrive', 1, 19, 1538065249),
(39, 'images', 'NZXEbtp3FAni.jpg', 'media/images/post/NZXEbtp3FAni.jpg', 'local', 1, 20, 1538448230),
(40, 'video', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86706&authkey=!AHa_eSYIqdwoIeM', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86706&authkey=!AHa_eSYIqdwoIeM', 'onedrive', 1, 20, 1538448230),
(41, 'images', 'hcETf7Q_LGHj.jpg', 'media/images/post/hcETf7Q_LGHj.jpg', 'local', 1, 21, 1538467287),
(42, 'video', 'https://onedrive.live.com/download?cid=&resid=&authkey=', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86722&authkey=!AISit9FwdKk1IYg', 'onedrive', 1, 21, 1538467287),
(43, 'video', 'https://aweme.snssdk.com/aweme/v1/playwm/?video_id=v0200f9a0000ben0gubc86dsktk11it0&line=0', 'v0200f9a0000ben0gubc86dsktk11it0', 'tiktok_china', 1, 21, 1538467289),
(44, 'images', 'https://p98.pstatp.com/large/ca6300015da8823241d9.jpg', 'https://p98.pstatp.com/large/ca6300015da8823241d9.jpg', 'remote', 1, 21, 1538467289),
(45, 'images', '78_2pJIn4ZdO.jpg', 'media/images/post/78_2pJIn4ZdO.jpg', 'local', 1, 22, 1538499651),
(46, 'video', 'https://onedrive.live.com/download?cid=&resid=&authkey=', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaVD8-V6VnwPpOpHRA', 'onedrive', 1, 22, 1538499651),
(47, 'video', 'v0200fc80000beaus136j2ql62g6mu00', 'v0200fc80000beaus136j2ql62g6mu00', 'tiktok_china', 1, 22, 1538499654),
(48, 'images', 'https://p3.pstatp.com/large/badf0000103723486997.jpg', 'https://p3.pstatp.com/large/badf0000103723486997.jpg', 'remote', 1, 22, 1538499654),
(49, 'images', 'VOYA8LW5aeF1.jpg', 'media/images/post/VOYA8LW5aeF1.jpg', 'local', 1, 23, 1538499929),
(50, 'video', 'https://onedrive.live.com/download?cid=&resid=&authkey=', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86724&authkey=!ABRIwf8p-Rj3WPs', 'onedrive', 1, 23, 1538499929),
(51, 'video', 'v0300f9a0000belpi84hpahona87lrv0', 'v0300f9a0000belpi84hpahona87lrv0', 'tiktok_china', 1, 23, 1538499931),
(52, 'images', 'https://p98.pstatp.com/large/c8e80006ef2e34a0f265.jpg', 'https://p98.pstatp.com/large/c8e80006ef2e34a0f265.jpg', 'remote', 1, 23, 1538499931),
(53, 'images', 'ehA7GkaXwmQK.jpg', 'media/images/post/ehA7GkaXwmQK.jpg', 'local', 1, 24, 1538533074),
(54, 'video', 'https://onedrive.live.com/download?cid=&resid=&authkey=', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86726&authkey=!ALfpBhbL3AA4MQA', 'onedrive', 1, 24, 1538533074),
(55, 'video', 'v0200f1b0000be5rr84pg62bra9vhimg', 'v0200f1b0000be5rr84pg62bra9vhimg', 'tiktok_china', 1, 24, 1538533080),
(56, 'images', 'https://p3.pstatp.com/large/b4040000f2dc16c81b80.jpg', 'https://p3.pstatp.com/large/b4040000f2dc16c81b80.jpg', 'remote', 1, 24, 1538533080),
(57, 'images', 'MHYzu2bjXvWV.jpg', 'media/images/post/MHYzu2bjXvWV.jpg', 'local', 1, 25, 1538535048),
(58, 'video', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86727&authkey=!ANtVcC_B3hcnSa0', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86727&authkey=!ANtVcC_B3hcnSa0', 'onedrive', 1, 25, 1538535048),
(59, 'video', 'v0200f500000befkbguue3mtq0vtioug', 'v0200f500000befkbguue3mtq0vtioug', 'tiktok_china', 1, 25, 1538535050),
(60, 'images', 'https://p1.pstatp.com/large/c0ab00036c025e459946.jpg', 'https://p1.pstatp.com/large/c0ab00036c025e459946.jpg', 'remote', 1, 25, 1538535050),
(61, 'images', '7H1KIaFWetqU.jpg', 'media/images/post/7H1KIaFWetqU.jpg', 'local', 1, 26, 1538535991),
(62, 'video', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86728&authkey=!AM99c53YsSZpf2I', 'https://onedrive.live.com/download?cid=0c96a527668396f3&resid=C96A527668396F3!86728&authkey=!AM99c53YsSZpf2I', 'onedrive', 1, 26, 1538535991),
(63, 'video', 'https://api.tiktokv.com/aweme/v1/playwm/?video_id=v07025590000beolmsjsqmkasla2gd60&line=0', 'https://api.tiktokv.com/aweme/v1/playwm/?video_id=v07025590000beolmsjsqmkasla2gd60&line=0', 'tiktok_vietnam', 1, 26, 1538535992),
(64, 'images', 'http://p16.tiktokcdn.com/large/v0201/babfc3f53f51498891f83c77e1bea6ac.jpg', 'http://p16.tiktokcdn.com/large/v0201/babfc3f53f51498891f83c77e1bea6ac.jpg', 'remote', 1, 26, 1538535992),
(71, 'images', 'https://img.youtube.com/vi/0hN5wEpkhhk/0.jpg', 'https://img.youtube.com/vi/0hN5wEpkhhk/0.jpg', 'remote', 1, 29, 1538541565),
(72, 'video', 'https://www.youtube.com/watch?v=0hN5wEpkhhk', 'https://www.youtube.com/watch?v=0hN5wEpkhhk', 'youtube', 1, 29, 1538541565);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social_post`
--

CREATE TABLE `social_post` (
  `post_id` int(11) NOT NULL,
  `post_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `post_content` text COLLATE utf8_unicode_ci NOT NULL,
  `post_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
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

--
-- Đang đổ dữ liệu cho bảng `social_post`
--

INSERT INTO `social_post` (`post_id`, `post_name`, `post_content`, `post_type`, `post_users`, `post_keyword`, `post_description`, `post_source`, `post_store`, `post_status`, `post_show`, `post_view`, `post_url`, `post_time`) VALUES
(1, 'Đã Xinh Lại Múa Đẹp', '', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://v.douyin.com/dmhfjJ/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaMXKsGTLyhES1nCiw', 1, 1, 0, 'da-xinh-lai-mua-dep', 1537849227),
(2, 'Quẩy lên anh em êi ^^ ', '<p>Quẩy l&ecirc;n anh em &ecirc;i ^^&nbsp;</p>', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://vt.tiktok.com/xNDU3/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaNJmXQv_Q1dxFMWOA', 1, 1, 0, 'quay-len-anh-em-ei', 1537931162),
(3, 'Chờ ai đó để yêu :)', '<p>Chờ ai đ&oacute; để y&ecirc;u :)</p>', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://v.douyin.com/dV2aBn/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaNKzmpPBvnHM0EXJg', 1, 1, 0, 'cho-ai-do-de-yeu', 1537932748),
(5, 'Muốn bỏ làm để đi tập Gym :D', '', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://v.douyin.com/dV1DVd/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaNMEWQrRJRnnL_nlw', 1, 1, 0, 'muon-bo-lam-de-di-tap-gym-d', 1537947528),
(6, 'Pùm Pùm Pùm ...', '<p>P&ugrave;m P&ugrave;m P&ugrave;m ...</p>', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://vt.tiktok.com/9vxUc/', 'https://1drv.ms/u/s!AvOWg2YnpZYMhaNNmXXpvZLLqXbApw', 1, 1, 0, 'pum-pum-pum', 1538015877),
(7, 'Sự thật không phải như vậy ', '<p>Sự thật kh&ocirc;ng phải như vậy&nbsp;</p>', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://v.douyin.com/d4oxxe/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaNPy9DylFUIOEXPUg', 1, 1, 0, 'su-that-khong-phai-nhu-vay-', 1538018415),
(8, 'Chào Buổi Sáng ...', '<p>Ch&agrave;o Buổi S&aacute;ng ...</p>', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://vt.tiktok.com/9KNbP/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaNQ6Va0jSSBogTv_g', 1, 1, 0, 'chao-buoi-sang', 1538032195),
(9, 'Đi Bơi Nào Anh Em', '<p>Đi Bơi N&agrave;o Anh Em</p>', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://vt.tiktok.com/9og5W/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaNRYv2AAsBUoBNcUw', 1, 1, 0, 'di-boi-nao-anh-em', 1538032452),
(10, 'Tĩnh Tâm ....', '', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://v.douyin.com/dVeY72/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaNSk-Jk5SsizSPHBg', 1, 1, 0, 'tinh-tam-yoga', 1538032723),
(11, 'Hị Hị Hị', '<p>Hị Hị Hị</p>', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://vt.tiktok.com/9wmMy/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaNTb3b1jF-ZW2ulug', 1, 1, 0, 'hi-hi-hi', 1538040554),
(12, 'Ai muốn được như này không :D', '<p>Ai muốn được như n&agrave;y kh&ocirc;ng :D</p>', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://v.douyin.com/dqJdKJ/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaNUglKIapjBcrdEOw', 1, 1, 0, 'ai-muon-duoc-nhu-nay-khong-d', 1538041283),
(13, 'Đằng Cấp hiphop', '<p>Đằng Cấp hiphop</p>', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://v.douyin.com/dVgbbN/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaNVU41PodGMkvbbAg', 1, 1, 0, 'dang-cap-hiphop', 1538041494),
(14, 'Ai cho hôm mà hôn', '', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://v.douyin.com/dVT2ME/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaNWHUrvt5Z4OmeTVA', 1, 1, 0, 'ai-cho-hom-ma-hon', 1538041853),
(15, 'Lần đầu chó được đi dép cao gót', '<p>Lần đầu ch&oacute; được đi d&eacute;p cao g&oacute;t</p>', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://v.douyin.com/dVcDSL/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaNXFyYq1d3bZA2zOQ', 1, 1, 0, 'lan-dau-cho-duoc-di-dep-cao-got', 1538042098),
(16, 'Chọn chị hay chọn em đây', '', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://v.douyin.com/dq1tAh/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaNYvREHc9zaHAcubw', 1, 1, 0, 'chon-chi-hay-chon-em-day', 1538042989),
(17, 'Đẳng cấp phi máy bay', '<p>Đẳng cấp phi m&aacute;y bay</p>', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://v.douyin.com/dqDSLD/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaNZG-LKYQIXZ_TxsA', 1, 1, 0, 'dang-cap-phi-may-bay', 1538063887),
(18, 'Đẳng cấp luộc trứng', '<p>Đẳng cấp luộc trứng</p>', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://v.douyin.com/dqhVRA/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaNaYl1Y_ceAtUxvgw', 1, 1, 0, 'dang-cap-luoc-trung', 1538064453),
(19, 'Thánh lắc mông', '<p>Th&aacute;nh lắc m&ocirc;ng</p>', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://v.douyin.com/dqjq6y/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaNbeQAcD7K9HpNJuA', 1, 1, 0, 'thanh-lac-mong', 1538065248),
(20, 'Quả mông phúc hậu :D', '<p>Quả m&ocirc;ng ph&uacute;c hậu :D</p>', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://v.douyin.com/dq9UcH/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaUydr95Jgip3Cgh4w', 1, 1, 0, 'qua-mong-phuc-hau-d', 1538448230),
(21, 'Cách tự trang trí phòng đẳng cấp', '<p>C&aacute;ch tự trang tr&iacute; ph&ograve;ng đẳng cấp</p>', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://v.douyin.com/dbNhwT/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaVChKK30XB0qTUhiA', 1, 1, 0, 'cach-tu-trang-tri-phong-dang-cap', 1538467287),
(22, 'Cách buộc giày đơn giản mà đẹp', '<p>C&aacute;ch buộc gi&agrave;y đơn giản m&agrave; đẹp</p>', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://v.douyin.com/dGY4xw/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaVD8-V6VnwPpOpHRA', 1, 1, 0, 'cach-buoc-giay-don-gian-ma-dep', 1538499651),
(23, 'Dấu hiệu của FA lâu năm', '<p>Dấu hiệu của FA l&acirc;u năm</p>', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://v.douyin.com/dsoNMw/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaVEFEjB_yn5GPdY-w', 1, 1, 0, 'dau-hieu-cua-fa-lau-nam', 1538499929),
(24, 'Tiên Cảnh Là Có Thật', '', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://v.douyin.com/dGkoNX/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaVGt-kGFsvcADgxAA', 1, 1, 0, 'tien-canh-la-co-that', 1538533074),
(25, 'Nắng Nhẹ', '', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://v.douyin.com/dGyGLN/', 'https://1drv.ms/u/s!AvOWg2YnpZYMhaVH21VwL8HeFydJrQ', 1, 1, 0, 'nang-nhe', 1538535048),
(26, 'Như Tắc Kè Hoa', '', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'http://vt.tiktok.com/Q7KvF/', 'https://1drv.ms/v/s!AvOWg2YnpZYMhaVIz31zndixJml_Yg', 1, 1, 0, 'nhu-tac-ke-hoa', 1538535991),
(29, 'Cách chống đẩy đúng cách', '', 'video', 1, 'video hay, video giai tri, video giải trí, video gai xinh, hot girl', 'Tổng hợp các Video hay, hot nhất hiện nay', 'https://www.youtube.com/watch?v=0hN5wEpkhhk', 'https://www.youtube.com/watch?v=0hN5wEpkhhk', 1, 1, 0, 'cach-chong-day-dung-cach', 1538541565);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social_users`
--

CREATE TABLE `social_users` (
  `users_id` int(11) NOT NULL,
  `users_login` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `users_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `users_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `users_avatar` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `users_role` int(2) NOT NULL DEFAULT '0',
  `users_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `users_status` int(2) NOT NULL,
  `users_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `social_users`
--

INSERT INTO `social_users` (`users_id`, `users_login`, `users_password`, `users_name`, `users_avatar`, `users_role`, `users_email`, `users_status`, `users_time`) VALUES
(1, 'dongnv', 'e10adc3949ba59abbe56e057f20f883e', 'Đông Nguyễn', '', 0, 'nguyenvandong242@gmail.com', 1, 1537365374);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `social_category`
--
ALTER TABLE `social_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `social_group`
--
ALTER TABLE `social_group`
  ADD PRIMARY KEY (`group_id`);

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `social_group`
--
ALTER TABLE `social_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `social_media`
--
ALTER TABLE `social_media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `social_post`
--
ALTER TABLE `social_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `social_users`
--
ALTER TABLE `social_users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
