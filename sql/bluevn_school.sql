-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 26, 2017 lúc 11:39 AM
-- Phiên bản máy phục vụ: 10.1.25-MariaDB
-- Phiên bản PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bluevn_school`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_setup`
--

CREATE TABLE `list_setup` (
  `list_id` int(11) NOT NULL,
  `list_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `list_parent` int(11) NOT NULL,
  `list_value` varchar(100) NOT NULL,
  `list_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `list_setup`
--

INSERT INTO `list_setup` (`list_id`, `list_name`, `list_parent`, `list_value`, `list_description`) VALUES
(1, 'status', 0, 'parent', ''),
(2, 'Hoạt động', 1, '1', ''),
(3, 'Khóa', 1, '0', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shools`
--

CREATE TABLE `shools` (
  `school_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `school_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `school_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `school_fax` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `school_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `school_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `images_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `images_url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(1) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `images_name`, `fullname`, `phone`, `address`, `images_url`, `role`, `parent_id`) VALUES
(1, 'admin', 'FKCbzU6Cx613yjiYBVF5ELqFyL8HtkMJ', '$2y$13$s2.tFaPpx6IQqdvWhOdWPek72ljAQYmEscSBWuTtyzkpQgnAxKE3a', NULL, 'thongnv@linxhq.com', 10, 1490417777, 1492971920, 'cat', 'Nguyễn Văn thông', '', '', 'cat20.jpg', 1, 0),
(2, 'admin1', 'HSYV0jg2Ylh7_CGVF-9DUxhhxoWmP96J', '$2y$13$WqLbL/agS2JJ/bVSA0YYKuoqIzCJbxGzmSZMa1ZiS0VEVxpvgqBy2', NULL, 'nvthong90@gmail.com', 10, 1492959100, 1492969240, '5b0e4288361daa840e655ffb728dcb92', 'Thông Nguyễn', '', '', '5b0e4288361daa840e655ffb728dcb9249.jpg', 2, 0),
(3, 'dung', 'CM4xglkNMAMvlGZ04kAt_-neSZ2KuqgJ', '$2y$13$Fp0bhS9Ll8pRjkK4A3lWOeLtqEYQAt3aooQeON7JNYyN1JOzMosCO', NULL, 'trungdunghbvn@gmail.com', 10, 1501036866, 1501042061, '', 'thong', '', '', '', 3, 1),
(4, 'dung12', 'fewfyhYg5EHDq0v-Ze9V8pDSQbSbR8NQ', '$2y$13$7NKSThxaJQIiIYiM5wJmPefp3gF5uBe.omIhAQP8yGtIij3UlA4.W', NULL, 'trungdungh3bvn@gmail.com', 0, 1501037149, 1501042044, '', 'tuyen', '', '', '', 3, 1),
(5, 'dung1234', 'bEE3PKsRaSsABiiFVjpFve9UYgdT-fHw', '$2y$13$AxFlQeHhEBiGx.8a2M8uHemYepmCnq.ihlJEjzSV0Xf6CKT010/ci', NULL, 'trungdungh5bvn@gmail.com', 10, 1501040415, 1501040415, '19029539_1048868261910865_7973933282149419146_n', 'dung', '0967027791', '', '19029539_1048868261910865_7973933282149419146_n40.jpg', 3, 1),
(6, 'dung12345', 'AMpXKx4f1Ff4CD2__DvVuuIWUtYvv81a', '$2y$13$7h34SOcIW.RbdZIkhV9Ob.I9b5ZgyPSzzbB27vDI4hsGg4Mk.wTP6', NULL, 'trungdungh6bvn@gmail.com', 10, 1501040543, 1501040543, '19029539_1048868261910865_7973933282149419146_n', 'dung', '0967027791', '', '19029539_1048868261910865_7973933282149419146_n42.jpg', 3, 1),
(7, 'dung123456', 'SGGFaCThGTHA8T0fH45RlgY-8zOcfAev', '$2y$13$R/uKpdoZRbf3P9hKrUvXV.5e0I9RtUYz3b4uzKqyCbxaziwXpVkuC', NULL, 'trungdungh7bvn@gmail.com', 10, 1501052921, 1501052923, '19029539_1048868261910865_7973933282149419146_n', 'Gam', '0967027791', '', '19029539_1048868261910865_7973933282149419146_n08.jpg', 2, 1),
(8, 'trungdunghbvn', 'SMsLrhlfEOe6h990Rf5Z8ugGlZ1WPezp', '$2y$13$hluhbafQDCn7/8U.BSMpDeKFXIAdU67G6QCdvdl5JjQJH57X/xi/a', NULL, 'daily@gmail.com', 10, 1501053201, 1501053202, '19029539_1048868261910865_7973933282149419146_n', 'daily', '0967027791', '', '19029539_1048868261910865_7973933282149419146_n13.jpg', 2, 1),
(11, 'test', 'DZIILdphf-hVd_FGHIVtNCRQ3nqTmX4D', '$2y$13$B4RuLfZXSuH0d/tbO.H3A.DWcSrrlMCPAZk00ZZDLi8d14i0kpW5m', NULL, 'trungdungh12bvn@gmail.com', 10, 1501056339, 1501056340, '19029539_1048868261910865_7973933282149419146_n', 'test', '0967027791', '', '19029539_1048868261910865_7973933282149419146_n05.jpg', 3, 8),
(12, 'test2', 'aKHG7_ApMJpbN4DZ2ElHBP74vnPn4GfV', '$2y$13$MFmldZ3NB1xs9idqGUl0ne1yb1NuLcLWZPI8OZpef1UyYAC0eMTE6', NULL, 'trungdungh13bvn@gmail.com', 10, 1501056722, 1501056724, '19029539_1048868261910865_7973933282149419146_n', 'dung', '0967027791', '', '19029539_1048868261910865_7973933282149419146_n12.jpg', 3, 8),
(13, 'test3', '6x4N5M7_laAcbMnAxEkcoNMlIOImVdHn', '$2y$13$MwKddtmxibQxBZXa2vv.JeEYz4FQ8A6vPzoMfzi7/agcubJbFNZJq', NULL, 'trungdungh14bvn@gmail.com', 10, 1501056888, 1501056889, '19029539_1048868261910865_7973933282149419146_n', 'test12', '0967027791', '', '19029539_1048868261910865_7973933282149419146_n14.jpg', 3, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_profile_basic`
--

CREATE TABLE `user_profile_basic` (
  `profile_basic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_basic_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `profile_basic_gender` int(1) NOT NULL,
  `profile_basic_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_basic_images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_basic_birthday` date NOT NULL,
  `profile_basic_identity_card` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `profile_basic_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_basic_birthplace` int(1) NOT NULL,
  `profile_basic_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `profile_basic_ethnic` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_school`
--

CREATE TABLE `user_school` (
  `user_school_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `user_school_role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `list_setup`
--
ALTER TABLE `list_setup`
  ADD PRIMARY KEY (`list_id`);

--
-- Chỉ mục cho bảng `shools`
--
ALTER TABLE `shools`
  ADD PRIMARY KEY (`school_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Chỉ mục cho bảng `user_profile_basic`
--
ALTER TABLE `user_profile_basic`
  ADD PRIMARY KEY (`profile_basic_id`);

--
-- Chỉ mục cho bảng `user_school`
--
ALTER TABLE `user_school`
  ADD PRIMARY KEY (`user_school_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `list_setup`
--
ALTER TABLE `list_setup`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `shools`
--
ALTER TABLE `shools`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT cho bảng `user_profile_basic`
--
ALTER TABLE `user_profile_basic`
  MODIFY `profile_basic_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `user_school`
--
ALTER TABLE `user_school`
  MODIFY `user_school_id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
