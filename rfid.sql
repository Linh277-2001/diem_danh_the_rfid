-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 12, 2022 lúc 05:06 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `rfid`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_pwd`) VALUES
(1, 'Linh', 'linh@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mathe` varchar(100) NOT NULL,
  `manv` varchar(100) NOT NULL,
  `datelog` date NOT NULL,
  `timein` time NOT NULL,
  `timeout` time NOT NULL,
  `state` varchar(100) NOT NULL,
  `khoa` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `logs`
--

INSERT INTO `logs` (`id`, `name`, `mathe`, `manv`, `datelog`, `timein`, `timeout`, `state`, `khoa`) VALUES
(8, 'Abc', '5A2142B3', 'Bcv', '2022-12-05', '01:01:21', '01:11:42', 'Arrived on time and Left early', 1),
(9, 'Abc', '5A2142B3', 'Bcv', '2022-12-05', '01:11:47', '01:11:57', 'Arrived on time and Left early', 1),
(10, 'Abc', '5A2142B3', 'Bcv', '2022-12-05', '01:12:03', '01:12:08', 'Arrived on time and Left early', 1),
(11, 'Abc', '5A2142B3', 'Bcv', '2022-12-05', '01:13:42', '01:13:45', 'Arrived on time and Left early', 1),
(12, 'Abc', '5A2142B3', 'Bcv', '2022-12-05', '11:11:49', '11:11:57', 'Arrived late and Left early', 1),
(13, 'Abc', '5A2142B3', 'Bcv', '2022-12-05', '11:13:10', '11:13:14', 'Arrived late and Left early', 1),
(14, 'Abc', '5A2142B3', 'Bcv', '2022-12-05', '11:15:15', '11:16:28', 'Arrived late and Left early', 1),
(15, 'Abc', '5A2142B3', 'Bcv', '2022-12-05', '11:18:45', '11:20:12', 'Arrived late and Left early', 1),
(16, 'Abc', '5A2142B3', 'Bcv', '2022-12-05', '11:20:23', '11:27:17', 'Arrived late and Left early', 1),
(17, 'Abc', '5A2142B3', 'Bcv', '2022-12-05', '11:27:20', '11:31:24', 'Arrived late and Left early', 1),
(18, 'Abc', '5A2142B3', 'Bcv', '2022-12-05', '11:33:17', '11:33:21', 'Arrived late and Left early', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `manv` varchar(100) NOT NULL,
  `chucvu` varchar(100) CHARACTER SET utf8 NOT NULL,
  `gt` int(11) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `manv`, `chucvu`, `gt`, `sdt`, `email`) VALUES
('5A2142B3', 'Abc', 'Bcv', 'Bc', 1, '91292', 'Email@gmail.com'),
('CT040420', 'HelloOK', 'GĐ1', 'GĐ', 0, '0123456', 'hi@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
