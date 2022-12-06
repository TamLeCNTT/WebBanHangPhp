-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 18, 2022 lúc 10:59 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `baitapnhomct480`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `ID` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `id_nguoidung` bigint(20) UNSIGNED NOT NULL,
  `noidungbinhluan` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`ID`, `id_sanpham`, `id_nguoidung`, `noidungbinhluan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(32, 69, 44, '\r\n Cam ngon ngọt', '2022-05-22 05:02:34', '2022-05-22 05:02:34', NULL),
(33, 69, 44, 'cam ăn khá ngon', '2022-05-22 05:02:54', '2022-05-22 05:02:54', NULL),
(34, 70, 44, '\r\n                ca chua nhỏ nhỏ xinh xinh', '2022-05-22 05:03:16', '2022-05-22 05:03:16', NULL),
(35, 71, 44, 'thịt rất tươi và thơm\r\n                ', '2022-05-22 05:03:39', '2022-05-22 05:03:39', NULL),
(36, 72, 44, '\r\n                thịt hơi khô', '2022-05-22 05:03:57', '2022-05-22 05:03:57', NULL),
(37, 74, 44, '\r\n                cá trứng nă như cá', '2022-05-22 05:05:14', '2022-05-22 05:05:14', NULL),
(38, 75, 44, '\r\n                há cảo ngon tuyệt', '2022-05-22 05:05:34', '2022-05-22 05:05:34', NULL),
(39, 73, 44, '\r\n                xuacs xích ngon quá trời', '2022-05-22 05:06:13', '2022-05-22 05:06:13', NULL),
(40, 73, 44, '\r\n                xuacs xích ngon quá trời', '2022-05-22 05:12:41', '2022-05-22 05:12:41', NULL),
(41, 73, 44, '\r\n                xuacs xích ngon quá trời', '2022-05-22 05:12:43', '2022-05-22 05:12:43', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon_chitiethoadon`
--

CREATE TABLE `hoadon_chitiethoadon` (
  `ID` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `id_nguoidung` bigint(20) UNSIGNED NOT NULL,
  `ngay` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadon_chitiethoadon`
--

INSERT INTO `hoadon_chitiethoadon` (`ID`, `id_sanpham`, `soluong`, `id_nguoidung`, `ngay`, `created_at`, `updated_at`, `deleted_at`) VALUES
(124, 70, 11, 43, '2022-05-22', '2022-05-22 06:38:15', '2022-05-22 06:38:15', NULL),
(125, 71, 1, 43, '2022-05-22', '2022-05-22 06:38:15', '2022-05-22 06:49:48', '2022-05-22 06:49:48'),
(126, 72, 1, 43, '2022-05-22', '2022-05-22 06:38:15', '2022-05-22 06:38:15', NULL),
(127, 73, 1, 43, '2022-05-22', '2022-05-22 06:38:15', '2022-05-22 06:42:28', '2022-05-22 06:42:28'),
(128, 74, 1, 43, '2022-05-22', '2022-05-22 06:38:15', '2022-05-22 06:42:25', '2022-05-22 06:42:25'),
(129, 75, 10, 43, '2022-05-22', '2022-05-22 06:38:15', '2022-05-22 06:42:23', '2022-05-22 06:42:23'),
(130, 76, 10, 43, '2022-05-22', '2022-05-22 06:38:15', '2022-05-22 06:42:21', '2022-05-22 06:42:21'),
(131, 70, 1, 44, '2022-05-22', '2022-05-22 06:43:16', '2022-05-22 06:43:16', NULL),
(132, 71, 1, 44, '2022-05-22', '2022-05-22 06:43:16', '2022-05-22 06:43:16', NULL),
(133, 72, 1, 44, '2022-05-22', '2022-05-22 06:43:16', '2022-05-22 06:49:53', '2022-05-22 06:49:53'),
(134, 69, 1, 47, '2022-05-22', '2022-05-22 06:45:11', '2022-05-22 06:45:11', NULL),
(135, 76, 1, 47, '2022-05-22', '2022-05-22 06:45:11', '2022-05-22 06:45:11', NULL),
(136, 71, 1, 47, '2022-05-22', '2022-05-22 06:45:11', '2022-05-22 06:45:11', NULL),
(137, 80, 5, 47, '2022-05-22', '2022-05-22 06:46:05', '2022-05-22 06:48:28', '2022-05-22 06:48:28'),
(138, 74, 3, 47, '2022-05-22', '2022-05-22 06:46:05', '2022-05-22 06:48:25', '2022-05-22 06:48:25'),
(139, 69, 1, 43, '2022-05-22', '2022-05-22 06:49:13', '2022-06-18 02:12:56', '2022-06-18 02:12:56'),
(140, 70, 3, 43, '2022-05-22', '2022-05-22 06:49:13', '2022-06-18 02:13:00', '2022-06-18 02:13:00'),
(141, 71, 3, 43, '2022-05-22', '2022-05-22 06:49:13', '2022-05-22 06:49:13', NULL),
(142, 72, 1, 43, '2022-05-22', '2022-05-22 06:49:13', '2022-05-22 06:49:13', NULL),
(143, 76, 1, 43, '2022-05-22', '2022-05-22 06:49:13', '2022-05-22 06:49:13', NULL),
(144, 75, 1, 43, '2022-05-22', '2022-05-22 06:49:13', '2022-05-22 06:49:13', NULL),
(145, 70, 3, 43, '2022-05-22', '2022-05-22 06:49:37', '2022-05-22 06:49:37', NULL),
(146, 71, 3, 43, '2022-05-22', '2022-05-22 06:49:37', '2022-05-22 06:49:37', NULL),
(147, 72, 2, 43, '2022-05-22', '2022-05-22 06:49:37', '2022-05-22 06:49:37', NULL),
(148, 76, 1, 43, '2022-05-22', '2022-05-22 06:49:37', '2022-05-22 06:49:37', NULL),
(149, 69, 1, 43, '2022-05-22', '2022-05-22 06:49:37', '2022-05-22 06:49:37', NULL),
(150, 73, 1, 43, '2022-05-22', '2022-05-22 06:49:37', '2022-05-22 06:49:37', NULL),
(151, 71, 1, 43, '2022-05-22', '2022-05-22 06:58:25', '2022-05-22 06:58:25', NULL),
(152, 69, 1, 43, '2022-05-22', '2022-05-22 06:58:25', '2022-05-22 06:58:25', NULL),
(153, 70, 1, 43, '2022-05-22', '2022-05-22 06:58:25', '2022-05-22 06:58:25', NULL),
(154, 74, 1, 43, '2022-05-22', '2022-05-22 06:58:25', '2022-05-22 06:58:25', NULL),
(155, 71, 1, 44, '2022-06-18', '2022-06-18 01:39:57', '2022-06-18 01:39:57', NULL),
(156, 70, 1, 44, '2022-06-18', '2022-06-18 01:39:57', '2022-06-18 01:39:57', NULL),
(157, 73, 1, 44, '2022-06-18', '2022-06-18 01:39:57', '2022-06-18 01:39:57', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `phantram` int(3) NOT NULL,
  `NgayBD` date NOT NULL,
  `NgayKT` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`id`, `id_sanpham`, `name`, `phantram`, `NgayBD`, `NgayKT`, `created_at`, `updated_at`, `deleted_at`) VALUES
(24, 70, 'Khuyến mãi cuối tuần ', 30, '2022-05-23', '2022-05-28', '2022-05-22 04:00:13', '2022-05-22 04:00:13', NULL),
(25, 73, 'Khuyến mãi tháng', 25, '2022-05-07', '2022-05-29', '2022-05-22 04:00:37', '2022-05-22 04:00:37', NULL),
(26, 74, 'Khuyến mãi dịp lễ', 20, '2022-05-13', '2022-06-05', '2022-05-22 04:01:00', '2022-05-22 07:28:38', '2022-05-22 07:28:38'),
(27, 73, 'Khuyến mãi dành riêng cho người họ LÊ', 35, '2022-05-14', '2022-05-21', '2022-05-22 04:38:53', '2022-05-22 04:38:53', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`id`, `name`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(56, 'Cam', 'Cam1.jpg', '2022-05-22 03:05:13', '2022-05-22 10:05:13', NULL),
(57, 'Rau  Củ  Trái Cây', 'loai1_raucu_traicay.jpg', '2022-05-22 03:21:33', '2022-05-22 10:21:33', NULL),
(58, 'Thịt  Trứng  Hải Sản', 'loai2_thit_trung_hai_san.jpg', '2022-05-22 03:21:53', '2022-05-22 10:21:53', NULL),
(59, 'Thực Phẩm Đông Lạnh', 'loai4_thuc_pham_dong_lanh.jpg', '2022-05-22 03:22:36', '2022-05-22 10:22:36', NULL),
(60, 'Thực Phẩm Khô  Gia Vị', 'loai5_thuc_pham_kho_gia_vi.jpg', '2022-05-22 03:22:53', '2022-05-22 10:22:53', NULL),
(61, 'Bánh Kẹo  Đồ Ăn Vặt', 'loai6_banh_keo_do_an_vat.jpg', '2022-05-22 03:23:10', '2022-05-22 10:23:10', NULL),
(62, 'Sữa  Sản Phẩm Từ Sữa', 'loai7_sua_san_pham_tu_sua.jpg', '2022-05-22 03:23:29', '2022-05-22 10:23:29', NULL),
(63, 'Đồ Uống  Giải Khát', 'loai8_do_uong_giai_khat.jpg', '2022-05-22 03:24:20', '2022-05-22 14:15:29', '2022-05-22 07:15:29'),
(64, 'Hóa Mỹ Phẩm', 'loai9_hoa_my_pham.jpg', '2022-05-22 03:24:41', '2022-06-18 10:05:34', '2022-06-18 03:05:34'),
(65, 'Chăm Sóc Cá Nhân', 'loai10_chan_soc_ca_nhan.jpg', '2022-05-22 03:25:27', '2022-05-22 10:25:27', NULL),
(66, 'Chăm Sóc Mẹ Và Bé', 'loai11_cham_soc_me_va_ve.jpg', '2022-05-22 03:25:37', '2022-05-22 10:25:37', NULL),
(67, 'COZY VẢI HOÀ TAN', 'cozy_hoa_tan_vai.jpg', '2022-05-22 03:26:46', '2022-05-22 10:26:46', NULL),
(68, 'Bưởi', 'Buoimain - Copy.jpg', '2022-05-22 03:28:07', '2022-05-22 10:28:07', NULL),
(69, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(70, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(71, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(72, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(73, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(74, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(75, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(76, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(77, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(78, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(79, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(80, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(81, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(82, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(83, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(84, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(85, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(86, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(87, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(88, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(89, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(90, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(91, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(92, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(93, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(94, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(95, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(96, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(97, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(98, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(99, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(100, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(101, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(102, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(103, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(104, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(105, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(106, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(107, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(108, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(109, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(110, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(111, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(112, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(113, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(114, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(115, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(116, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(117, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(118, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(119, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(120, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(121, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(122, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(123, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(124, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(125, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(126, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(127, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(128, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(129, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(130, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(131, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(132, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(133, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(134, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(135, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(136, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(137, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(138, 'Bưởi', 'Buoimain - Copy.jpg', NULL, NULL, NULL),
(139, 'BUOI NAM ROI', 'Buoimain - Copy.jpg', '2022-05-22 05:28:19', '2022-05-22 12:28:19', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `noisanxuat`
--

CREATE TABLE `noisanxuat` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysx` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `noisanxuat`
--

INSERT INTO `noisanxuat` (`id`, `name`, `ngaysx`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Việt Nam', '2022-05-25', NULL, NULL, NULL),
(3, 'china', '2022-05-25', NULL, '2022-05-21 23:39:57', '2022-05-21 23:39:57'),
(4, 'ggggf', '2022-04-28', '2022-05-19 21:46:57', '2022-05-21 01:07:22', '2022-05-21 01:07:22'),
(5, 'Trung Quốc', '1980-05-05', '2022-05-21 23:40:29', '2022-05-21 23:40:29', NULL),
(6, 'Ấn Độ TTNT', '1999-04-28', '2022-05-21 23:40:50', '2022-05-21 23:40:50', NULL),
(7, 'CTy của Mỹ đặt tại Việt Nam', '1987-05-06', '2022-05-21 23:41:30', '2022-05-22 07:22:36', '2022-05-22 07:22:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(265) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `username`, `location`, `firstname`, `lastname`, `email`, `phone`, `avatar`, `avatar_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(44, 43, 'Nguyễn Hoàng Thanh', '383K1A Khu vực 2', 'Thanh', 'Nguyen', 'thanhb1910139@student.ctu.edu.vn', '0832610928', 'B1910139_AnhThanhNienLamTheoLoiBac.jpg', 0, '2022-05-22 04:51:39', '2022-05-22 04:51:39', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `ID_quyen` int(11) NOT NULL,
  `quyen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`ID_quyen`, `quyen`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'Customer', NULL, NULL, NULL),
(3, 'Partner', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `id_loai` int(11) NOT NULL,
  `id_nsx` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gia` float NOT NULL,
  `soluong` int(11) NOT NULL COMMENT 'Số lượng được tính trên kg\r\n',
  `mota` varchar(500) NOT NULL,
  `baoquan` varchar(255) NOT NULL,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `id_loai`, `id_nsx`, `name`, `gia`, `soluong`, `mota`, `baoquan`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(69, 56, 1, 'Cam Hà Tĩnh', 20000, 494, 'Cam vàng Ai Cập có hàm lượng Vitamin C cao, rất tốt cho da, góp phần chống lão hóa và giảm Cholesterol, có tác dụng hồi phục sức khỏe nhanh, tăng cường chức năng tạo hồng huyết cầu và giảm căng thẳng thần kinh. Việc tiêu thụ vitamin C ở liều cao (khoảng 500mg mỗi ngày) rất tốt cho người ốm.', 'Để trong mát khoảng 30oC,tránh ánh nắng mặt trời', 'cam2.jpg', '2022-05-22 03:06:04', '2022-05-22 06:58:25', NULL),
(70, 57, 5, 'Cà Chua bi Trung Quốc', 30000, 57, 'Sản phẩm chất lượng được nhập khẩu vào Việt Nam', 'Để trong mát khoảng 30oC,tránh ánh nắng mặt trời', '1_cachuabi.jpg', '2022-05-22 03:46:17', '2022-06-18 01:39:57', NULL),
(71, 58, 5, 'Sườn thăn Meat Deli', 73465, 14, 'Thịt MEAT DELI là sản phẩm có nguồn gốc xuất xứ rõ ràng, được chăn nuôi theo hướng công nghiệp sạch, đảm bảo an toàn cho người sử dụng. Thịt được chế biến trên công nghệ dây chuyền kỹ thuật hiện đại, sạch sẽ từ khâu chế biến đến khâu, đóng gói, đông lạnh. Tất cả đều đảm bảo vệ sinh an toàn thực phẩm, mang đến cho người tiêu dùng sản phẩm có chất lượng tốt nhất.', 'Để trong tủ mát,ránh ánh nắng mặt trời', '162428206978510617958-KG-Thit-dui-heo-MeatDeli-(S).jpg', '2022-05-22 03:49:30', '2022-06-18 01:39:57', NULL),
(72, 58, 7, '   Nạc thăn heo Meat Deli (S)', 70000, 25, 'Nạc thăn heo Meat Deli được sản xuất bởi thương hiệu Meat Deli - là thương hiệu thịt sạch áp dụng Công Nghệ Oxy Fresh 9 đến từ Châu Âu mang tới những sản phẩm đảm bảo an toàn chất lượng tới tận tay người tiêu dùng. Khép kín mọi công đoạn giúp nâng cao dinh dưỡng trong bữa ăn của mỗi gia đình.', 'Để trong tủ mát,ránh ánh nắng mặt trời', '162428207058410617957-KG-Suon-vai-heo-MeatDeli-(S).jpg', '2022-05-22 03:50:22', '2022-05-22 06:49:37', NULL),
(73, 59, 5, 'Xúc xích Red tiệt trùng', 30000, 26, 'Xúc xích Red tiệt trùng CP gói 200g được sản xuất từ những nguyên liệu chọn lọc kĩ lưỡng, đảm bảo độ tươi ngon và an toàn. Các nguyên liệu được sản xuất trên dây chuyền công nghệ hiện đại, dưới sự giám sát chặt chẽ của các chuyên gia, nhằm tạo ra sản phẩm có chất lượng tốt nhất và đáp ứng các quy chuẩn vệ sinh an toàn thực phẩm.', 'Để trong tủ mát,ránh ánh nắng mặt trời', 'suajpg.jpg', '2022-05-22 03:51:35', '2022-06-18 01:39:57', NULL),
(74, 59, 1, 'Cá trứng Đôi Đũa Vàng', 116900, 15, 'Cá trứng là một món ăn chứa nhiều chất dinh dưỡng có lợi cho sức khỏe. Cơ thể cá chứa nhiều đạm, vitamin và khoáng chất như vitamin A, B1, B6 hay chứa chất sắt, kali. Thịt cá thơm, đặc biệt bụng cá (con cái) lúc nào cũng chứa đầy trứng dù không phải mùa sinh sản.', 'Để trong mát khoảng 30oC,tránh ánh nắng mặt trời', '10006535_199c80ef-4eb6-40f0-a5a3-b1848ce76058.jpg', '2022-05-22 03:53:44', '2022-05-22 06:58:25', NULL),
(75, 59, 1, 'Há cảo Thực Phẩm Cầu Tre', 6000, 33, 'Há cảo là món ăn có nguồn gốc từ Trung Quốc, đã được du nhập vào Việt Nam. Đây là món ăn rất thích hợp dùng vào bữa sáng hoặc các bữa điểm tâm do có hương vị thơm ngon, dễ ăn. Há cảo Thực Phẩm Cầu Tre được chế biến từ các nguyên liệu chất lượng cao, được lựa chọn kỹ càng, đảm bảo độ tươi ngon và tự nhiên nhất. Vì vậy, sau khi chế biến, sản phẩm vẫn giữ được nguyên hương vị và màu sắc của các nguyên liệu, đảm bảo ngon miệng khi dùng.', 'Để trong tủ mát,ránh ánh nắng mặt trời', '162428525064210006557-G1-Coy-co-rua-bep-da-nang-SLHS0521.jpg', '2022-05-22 03:54:26', '2022-05-22 06:49:13', NULL),
(76, 59, 1, 'Há cảo tôm cua Cầu Tre', 50604, 46, 'Há cảo tôm cua Thực Phẩm Cầu Tre gói 500g có thành phần từ bột há cảo, củ sắn, tôm 18%, thịt cua ghẹ 16%, cà rốt, bột bắp, đường, muối, chất điều vị, tỏi, dầu mè, tiêu… Sản phẩm được sản xuất trên quy trình hiện đại, đạt tiêu chuẩn vệ sinh an toàn thực phẩm. Bên cạnh đó, nguyên liệu được lựa chọn kỹ lưỡng, an toàn cho sức khỏe, mang đến sự an tâm cho người dùng.', '', '162428525076010006558-G1-Chà-Bung-Co-Hoi-Chà-Bung-Viet-100g.jpg', '2022-05-22 03:55:14', '2022-05-22 06:49:37', NULL),
(77, 60, 1, 'Mì Kokomi Tôm chua cay', 3900, 60, 'Mì Kokomi Đại 90 Tôm chua cay 90gr với sợi mì dai dẻo, ngay cả khi vô tình để lâu vẫn luôn dai ngon như thường (Mì giữ độ dai 7 phút kể từ khi cho nước sôi vào vắt mì) kết hợp nước súp tôm chua cay đậm đà, đặc trưng làm nên hộp mì chua cay đặc biệt cả nhà đều mê.', 'Khui ra nhớ ăn liền,ránh ánh nắng mặt trời', '162428263574010639853-G1-Mo-nau-Kokomi-Dai-gui-90g.jpg', '2022-05-22 03:56:37', '2022-05-22 05:16:59', NULL),
(78, 60, 5, 'Mì khoai tây Omachi Special', 5000, 41, 'Mì khoai tây Omachi Special bò hầm xốt vang với thịt bò tươi chọn lọc đắm mình trong xốt vang cao cấp từ bàn tay khéo léo của bậc thầy về ẩm thực, tạo ra món bò xốt vang thơm lừng cuốn hút.  ', '', '162427595691710315457-G1-Mo-khoai-toy-suon-ham-ngu-qua-thit-Omachi-113g.jpg', '2022-05-22 03:57:18', '2022-05-22 07:19:23', '2022-05-22 07:19:23'),
(79, 60, 1, 'Tương ớt Chin su', 12002, 29, 'Tương ớt CHIN-SU chai 250g được sản xuất và đóng gói bởi hãng Chin-su - là một thương hiệu được ra đời vào năm 2002, CHIN-SU Việt Nam là nhãn hiệu cao cấp với sứ mệnh đem đến những gia vị hảo hạng cho bữa ăn ngon mỗi ngày của hàng triệu gia đình Việt Nam. Tính đến thời điểm hiện tại, CHIN-SU VN là nhãn hiệu số 1 trong thị trường gia vị cao cấp với danh mục sản phẩm đa dạng, bao gồm: nước mắm, nước tương, tương ớt, tương cà.', 'Để trong mát khoảng 30oC,tránh ánh nắng mặt trời', '162428519296810008738-CHA-Bonh-Choco-Pie-Orion-hop-396g.jpg', '2022-05-22 03:58:11', '2022-05-22 05:19:49', NULL),
(80, 57, 5, 'Chuối vàng', 12450, 33, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', 'Khui ra nhớ ăn liền,ránh ánh nắng mặt trời', 'chuoi.jpg', NULL, '2022-05-22 06:46:05', NULL),
(81, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', 'Khui ra nhớ ăn liền,ránh ánh nắng mặt trời', 'chuoi.jpg', NULL, '2022-05-22 05:17:33', NULL),
(82, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(83, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, '2022-05-22 05:00:47', '2022-05-22 05:00:47'),
(84, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', 'Để trong tủ mát,ránh ánh nắng mặt trời', 'chuoi.jpg', NULL, '2022-05-22 05:17:39', NULL),
(85, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(86, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', 'Để trong tủ mát,ránh ánh nắng mặt trời', 'chuoi.jpg', NULL, '2022-05-22 05:17:44', NULL),
(87, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(88, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(89, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(90, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(91, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(92, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(93, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(94, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(95, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(96, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(97, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(98, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(99, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(100, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(101, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(102, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(103, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(104, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(105, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(106, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(107, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(108, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(109, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(110, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(111, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL),
(112, 57, 5, 'Chuối vàng', 12450, 50, 'Chuối vàng do WinMart cung cấp được trồng theo phương pháp hữu cơ, đảm bảo vệ sinh an toàn thực phẩm cho người sử dụng, đồng thời thời gian vận chuyển ngắn nên luôn giữ được độ tươi ngon khi đến tay người tiêu dùng.', '', 'chuoi.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `noidung` varchar(1000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `loaitin` varchar(50) CHARACTER SET utf8 NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id`, `name`, `noidung`, `image`, `loaitin`, `deleted_at`, `created_at`, `updated_at`) VALUES
(20, 'Khuyến mãi nhân dịp Tết Nguyên đán', 'Tết Nguyên đán đến gần khiến nhu cầu về thực phẩm của                                 người dân ngày một tăng cao. Hiện nay nhiều sản phẩm không bảo đảm an toàn thực phẩm                                 (ATTP),                                 không                                 rõ nguồn gốc, không đúng quy định về ghi nhãn hoặc có các vi phạm khác lưu đã và đang trôi nổi trên thị trường làm gia tăng nguy cơ mất ATTP, đe dọa tới sức khỏe của người dân.', '20200112_112744.jpg', 'Tết Nguyên đán đến gần khiến nhu cầu về thực phẩm ', '2022-05-22 00:00:02', '2022-05-19 23:41:07', '2022-05-22 00:00:02'),
(21, 'Trẻ mắc tay chân miệng ở TP HCM tăng gấp ba', 'Trung tâm Kiểm soát Bệnh tật TP HCM (HCDC) ghi nhận 628 ca tay chân miệng trong tuần qua, tăng gần gấp ba lần so với trung bình một tháng trước.\r\n\r\nBốn tháng đầu năm, thành phố ghi nhận gần 1.600 trường hợp mắc bệnh tay chân miệng với 96% trẻ bệnh ở độ tuổi 1-5. Số ca tăng ở cả trường hợp nhập viện điều trị nội trú và khám ngoại trú.', 'tcm.jpg', 'Trẻ mắc tay chân miệng ở TP HCM tăng gấp ba', '2022-05-22 00:04:23', '2022-05-21 04:11:56', '2022-05-22 00:04:23'),
(22, '“Trúng” hàng “dỏm” khi mua thực phẩm chức năng qua livestream', 'Đủ chiêu trò quảng cáo “thổi phồng”\r\n\r\nHình thức livestream tỏ ra có nhiều ưu điểm đối với “dân bán hàng” khi kích thích người mua “móc hầu bao” tốt hơn hẳn so nhiều phương thức bán hàng online khác. Livestream rõ tính giải trí và tạo sự tương tác cao giữa người bán hàng và khách hàng.', 'hangdom.png', ' Giải trí', '2022-05-22 00:04:28', '2022-05-20 22:00:36', '2022-05-22 00:04:28'),
(23, 'Băng dính ăn được dùng để dán thực phẩm', 'Nhóm sinh viên tại Trường Kỹ thuật Whiting thuộc Đại học Johns Hopkins ở Baltimore, bang Maryland, phát triển Tastee Tape - một loại băng dính ăn được lấy cảm hứng từ chính trải nghiệm của họ trong các bữa trưa, Newsweek hôm 18/5 đưa tin.\r\n\r\nBăng dính gồm khung sợi thực phẩm và chất kết dính hữu cơ, đảm bảo phần nhân trong món các món cuốn không rơi vãi khi nấu và ăn. Nó có thể dán vào bất cứ thực phẩm nào, bao gồm bánh tortilla, bánh taco hay gyros.', 'bầng.png', ' Giải trí', '2022-05-21 23:59:50', '2022-05-20 07:36:10', '2022-05-21 23:59:50'),
(24, 'Cá hồi tăng giá kỷ lục\r\n', 'Giá cá hồi Na Uy loại phi lê bán lẻ đã tăng gấp rưỡi từ đầu năm, hiện gần 800.000 đồng một kg - cao nhất từ trước tới nay.\r\n\r\n\"Cơn bão\" tăng giá từ năng lượng, phân bón, ngũ cốc tới thực phẩm đang diễn ra trên toàn cầu và Việt Nam cũng không đứng ngoài cuộc. Từ đầu năm đến nay, không chỉ giá xăng dầu, gas, sắt, thép, phân bón... liên tục lập đỉnh mới, giá thực phẩm như dầu ăn, lúa mì cũng tăng cao. Đặc biệt, trong nhóm thực phẩm - cá hồi, một sản phẩm thuộc phân khúc trung và cao cấp đã và đang tăng mạnh nhất trong 5 tháng đầu năm nay.', 'cahoi.png', ' Giải trí', '2022-05-22 00:04:32', '2022-05-20 07:35:58', '2022-05-22 00:04:32'),
(25, 'Những khu chợ đêm châu Á \'nổi tiếng và quyến rũ\'', 'Barbara Woolsey, một phóng viên tự do mảng du lịch và ẩm thực từ Canada, tác giả của cẩm nang nổi tiếng Lonely Planet, gợi ý du khách các khu chợ đêm mà cô đánh giá \"nổi tiếng và quyến rũ nhất\" châu Á. Đây là những nơi mà theo cô nên ghé thăm, nhất là khi các nước đã mở cửa đón khách du lịch.\r\n\r\nTheo Barbara, các khu chợ đêm ở Việt Nam luôn rực rỡ sắc màu, gây ấn tượng với những các lều nhỏ có mái che, người bán hàng luôn chân tay bên các quầy hàng bán đồ ăn nhẹ, quần áo và trang sức.\r\n\"Nhiều chợ đêm được hình thành từ những con phố đi bộ hoặc nằm trong các con phố lịch sử. Nổi tiếng nhất là chợ đêm trong phố cổ Hà Nội. Nhưng các chợ đêm ở Nha Trang, Hội An, Phú Quốc (ảnh) mang lại cho bạn cảm giác vui thích vì mang đến hương vị của biển\", nữ du khách chia sẻ', 'chodem.png', ' Giải trí', '2022-05-22 00:04:36', '2022-05-20 02:02:54', '2022-05-22 00:04:36'),
(26, 'Ám ảnh với \'ăn sạch\'\r\n', 'Với một số người, việc ăn uống lành mạnh với thực phẩm sạch là nỗi ám ảnh, phát triển thành chứng rối loạn, còn gọi là orthorexia.\r\n\r\nAlex Everakes, 25 tuổi, giám đốc phòng quan hệ công chúng tại Chicago, từng vật lộn để điều chỉnh cân nặng khi còn ở độ tuổi thiếu niên.\r\n\r\nAnh cố gắng ăn kiêng khi đã trưởng thành, tăng giảm liên tục 45kg. Khi chuyển đến Los Angele sau đại học, anh bắt đầu tập thể dục hai lần một ngày. Có thời điểm, Everakes chỉ ăn 10 loại thực phẩm là rau bina, thịt gà, lòng trắng trứng, ớt đỏ, bí, măng tây, cá hồi, quả mọng, sữa hạnh nhân không đường và bơ hạnh nhân.', 'ansach.png', ' Giải trí', '2022-05-22 00:04:46', '2022-05-20 07:34:51', '2022-05-22 00:04:46'),
(27, 'Top 10 thực phẩm giàu kẽm bạn nên ăn để tăng cường miễn dịch', 'Cung cấp đủ kẽm cho cơ thể giúp cải thiện hệ thống miễn dịch và chữa lành vết thương. Cách bổ sung kẽm an toàn và hiệu quả nhất là thông qua chế độ ăn uống. Dưới đây là 10 thực phẩm giàu kẽm bạn nên bổ sung trong bữa ăn hàng ngày.', 'kem.png', ' Giải trí', '2022-05-22 00:02:19', '2022-05-20 02:02:58', '2022-05-22 00:02:19'),
(28, 'Chi cục trưởng Chi cục An toàn vệ sinh thực phẩm Hà Nội Đặng Thanh Phong: Không nương tay với vi phạm', '(HNM) - Tháng hành động vì An toàn thực phẩm năm 2022 (diễn ra từ ngày 15-4 đến 15-5), có chủ đề “Tiếp tục nâng cao vai trò, trách nhiệm của người sản xuất, kinh doanh và tiêu dùng nông sản thực phẩm trong tình hình mới”. Phóng viên Báo Hànộimới đã có cuộc trao đổi với Chi cục trưởng Chi cục An toàn vệ sinh thực phẩm Hà Nội (Sở Y tế Hà Nội) Đặng Thanh Phong về những mục tiêu và nội dung mà thành phố triển khai trong thời gian này, trong đó khẳng định kiên quyết không nương tay với vi phạm nhằm tăng cường hiệu quả quản lý an toàn thực phẩm.', 'attp.png', ' Giải trí', '2022-05-22 00:00:14', '2022-05-20 07:34:20', '2022-05-22 00:00:14'),
(29, 'Trước Ấn Độ, một loạt quốc gia đã cấm xuất khẩu thực phẩm', 'Theo kênh CNBC, cuộc chiến ở Ukraine đã khiến giá lúa mì tăng vọt vì Nga và Ukraine là hai trong số các nước xuất khẩu mặt hàng này lớn nhất thế giới. Theo Ngân hàng Thế giới, cả hai quốc gia này chiếm 29% tổng lượng lúa mì xuất khẩu toàn cầu.\r\n\r\nGiá lúa mì tăng khoảng 6% vào ngày 16/5 sau thông báo vào cuối tuần của Ấn Độ.\r\n\r\nViện Kinh tế Quốc tế Peterson (PIIE) ở Mỹ nhận định hồi tháng 4: “Khi giá lương thực đã cao do gián đoạn chuỗi cung ứng liên quan đến dịch COVID-19 và sản lượng giảm do hạn hán vào năm ngoái, cuộc chiến ở Ukraine diễn ra vào thời điểm tồi tệ đối với thị trường lương thực toàn cầu”.', 'ando.png', ' Giải trí', '2022-05-20 07:34:12', NULL, '2022-05-20 07:34:12'),
(30, 'Những thực phẩm chống viêm tốt nhất nên ăn thường xuyên', 'Nhiều loại thực phẩm quen thuộc rất giàu chất chống oxy hóa, giúp chống lại chứng viêm mạn tính.\r\nMới đây, trang tin Insider dẫn thông tin từ tiến sĩ Andrea McGrew - chuyên gia dinh dưỡng đang làm việc tại bang Missouri, Mỹ - cho hay chứng viêm mạn tính có liên quan đến các bệnh nghiêm trọng như tim mạch hay viêm khớp. Do đó, mọi người nên ăn nhiều thực phẩm có chứa chất chống viêm tự nhiên để cơ thể luôn khỏe mạnh.', 'suckhoe.png', ' Giải trí', '2022-05-20 07:34:45', NULL, '2022-05-20 07:34:45'),
(43, 'FDFFF', 'TRTRTRRT', 'Screenshot (123).png', 'RTRTRTTR', '2022-05-21 23:59:56', '2022-05-21 23:47:50', '2022-05-21 23:59:56'),
(44, 'Thế khó trong đại dịch của ngành bán lẻ', 'Tâm lý tích trữ của người dân giúp doanh thu khả quan trong ngắn hạn nhưng không hẳn đã là tín hiệu tích cực với ngành bán lẻ lúc nà', 'new1.jpg', 'Đời sống khoa học', '2022-06-18 01:41:29', '2022-05-22 00:31:53', '2022-06-18 01:41:29'),
(45, 'Bách hóa Xanh hỗ trợ bà con miền Tây tiêu thụ nông sản', 'Hàng trăm tấn nông sản từ Đồng Tháp, Long An... nhập về Bách hóa Xanh nhằm phục vụ nhu cầu của người dân TP HCM khi giãn cách kéo dài.', 'news2.jpg', 'Đời sống khoa học', '2022-06-18 01:41:37', '2022-05-22 00:37:04', '2022-06-18 01:41:37'),
(46, 'Bách hóa Xanh hứa sẽ không tăng giá bất hợp lý', 'Lãnh đạo Bách Hóa Xanh nói không có chủ trương đẩy giá bán để tăng lợi nhuận, mà ngược lại, đang nỗ lực kiểm soát giá khi hàng hóa khan hiếm', 'hotnews2.jpg', 'Thời sự', NULL, '2022-05-22 00:37:51', '2022-05-22 00:37:51'),
(47, 'Chuỗi bán lẻ quá tải khi đơn hàng online tăng mạnh', 'Các chuỗi bán lẻ quá tải, giao hàng chậm hơn dự kiến khi người dân TP Cần Thơ tăng cường đặt nhu yếu phẩm trực tuyến vì thế chuổi bán lẻ vô cùng thu hút khách hàng', 'news4.jpg', 'Đời sống', NULL, '2022-05-22 00:38:29', '2022-05-22 00:38:29'),
(48, 'ĐĂNG KÝ THÀNH VIÊN NHẬN NGÀN ƯU ĐÃI', 'Công ty TNMTV hân hạnh mang đến chương trình \"Đăng Ký Thành Viên\" với nhiều ưu đãi độc đáo. Member Card – thẻ thành viên dành cho tất cả khách hàng đăng kí tài khoản và phát sinh đơn hàng.', 'neww.jpg', 'Khuyễn mãi', NULL, '2022-05-22 00:38:59', '2022-05-22 00:38:59'),
(49, 'TUYỂN GIÁM SÁT CHUỖI CỬA HÀNG TIỆN LỢI', 'Tuyển Giám Sát chuỗi cửa hàng: - tại khu vực TP Hải Phòng & các tỉnh lân cận - Số lượng: 01 MÔ TẢ: Giám sát hoạt động kinh doanh các cửa hàng; Kiểm tra lịch làm việc của các cửa hàng.', 'news6.jpg', 'Tuyển dụng', '2022-06-18 01:41:53', '2022-05-22 00:40:26', '2022-06-18 01:41:53'),
(50, 'KHAI TRƯƠNG HÂN HOAN - ƯU ĐÃI NGẬP TRÀN', 'Khai trương hân hoan - ưu đãi ngập tràn🥰🌈 Thêm một ngôi nhà mới của Siêu thị tiện lợi được khai trương. ', 'hotnews1.jpg', 'Khai trương cửa hàng', '2022-06-18 01:41:50', '2022-05-22 00:41:03', '2022-06-18 01:41:50'),
(51, 'Giảm Giá Mừng Giáng Sinh - Tưng Bừng Đón Năm Mới ', 'Từ ngày 10/12 - 31/12/2021, Bách hóa XANH với chương trình Giảm Giá Mừng Giáng Sinh - Tưng Bừng Đón Năm Mới giảm giá đến 50%', 'tintuc6.jpg', 'Khuyến mãi ', '2022-06-18 01:41:43', '2022-05-22 00:41:45', '2022-06-18 01:41:43'),
(52, 'Thực phẩm ngon, tha hồ chọn, giảm đến 40%', 'Từ 15/12 - 31/12/2021, giảm đến 40% một số mặt hàng thực phẩm ngon trên BachhoaXANH.com cho bạn tha hồ chọn, cùng tham gia ngay nhé', 'tintuc1.jpg', 'Khuyến mãi', '2022-05-22 07:31:20', '2022-05-22 00:42:16', '2022-05-22 07:31:20'),
(53, 'Hóa đơn 29k tặng 1 lon nước tăng lực Predator lon 330mlh', 'Từ ngày 16/12 - 31/12/2021 với hoá đơn 29.000 đồng tại Bách hoá XANH, khách hàng được tặng 1 lon nước tăng lực Predator lon 330ml', 'tintuc2.jpg', 'Khuyến mãi', '2022-05-22 07:31:02', '2022-05-22 00:42:45', '2022-05-22 07:31:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_nguoidung` bigint(20) UNSIGNED NOT NULL COMMENT 'ID',
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên đăng nhập',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mật khẩu',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email đăng ký',
  `diachi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_quyen` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL COMMENT 'TG xác nhận email',
  `activated` tinyint(1) DEFAULT 0 COMMENT 'Đã kích hoạt',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_nguoidung`, `username`, `password`, `email`, `diachi`, `sdt`, `image`, `ID_quyen`, `email_verified_at`, `activated`, `created_at`, `updated_at`, `deleted_at`) VALUES
(43, 'Thanh', '$2y$12$igz7gVDQIylHUyREJouOTe.Wu7LmIa9tPe4ec5tUihjy7Gjnl/4sO', 'thanhb1910139@student.ctu.edu.vn', '383K1A, khu vực 2, phường An Khánh, quận Ninh Kiều, thành phố Cần Thơ', '0832610928', '', 1, NULL, 0, '2022-05-22 03:02:59', '2022-05-22 03:02:59', NULL),
(44, 'tamle', '$2y$12$jkiLGpLKYPz/tJ0HG2K3ZuCcNe2WebuwcMZ1XM17aB29PTBa3NJ5O', 'tam@gmail.com', '383K1A, khu vực 2, phường An Khánh, quận Ninh Kiều, thành phố Cần Thơ', '0357525461', '', 1, NULL, 0, '2022-05-22 04:35:34', '2022-05-22 04:35:34', NULL),
(45, 'dfdfdf', '$2y$12$28JdYOGs5wVmTkfqhfvJyecOWaTOKQ/SN.A1kqzxbuS3tdvXWYSgO', 'eew/@gmai.com', 'fdrd', '0357525461', '', 1, NULL, 0, '2022-05-22 05:25:31', '2022-05-22 05:25:31', NULL),
(46, 'admin', '$2y$12$Jf0.nlgLEz3zd2qJwx1f6.HgMpK9.6QAImlvOu9rWlAm64xD9B1mG', 'CTU@ctu.edu.vn', 'Đại học Cần Thơ', '0921358121', '', 1, NULL, 0, '2022-05-22 05:51:14', '2022-05-22 05:56:39', NULL),
(47, '5tan', '$2y$12$.bFPsPLmnubs7cf1bk2PpujbT4trauRttSd3RUcvMA0yVO5fCGKcS', 'tan@gmail.com', 'Can Tho', '0123456789', '', 1, NULL, 0, '2022-05-22 06:44:29', '2022-05-22 06:44:29', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_sanpham` (`id_sanpham`),
  ADD KEY `id_nguoidung` (`id_nguoidung`);

--
-- Chỉ mục cho bảng `hoadon_chitiethoadon`
--
ALTER TABLE `hoadon_chitiethoadon`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_sanpham` (`id_sanpham`),
  ADD KEY `id_nguoidung` (`id_nguoidung`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `noisanxuat`
--
ALTER TABLE `noisanxuat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`ID_quyen`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_loai` (`id_loai`),
  ADD KEY `id_nsx` (`id_nsx`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_nguoidung`),
  ADD KEY `ID_quyen` (`ID_quyen`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `hoadon_chitiethoadon`
--
ALTER TABLE `hoadon_chitiethoadon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT cho bảng `noisanxuat`
--
ALTER TABLE `noisanxuat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `ID_quyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_nguoidung` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=48;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`id_nguoidung`) REFERENCES `users` (`id_nguoidung`);

--
-- Các ràng buộc cho bảng `hoadon_chitiethoadon`
--
ALTER TABLE `hoadon_chitiethoadon`
  ADD CONSTRAINT `hoadon_chitiethoadon_ibfk_2` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `hoadon_chitiethoadon_ibfk_3` FOREIGN KEY (`id_nguoidung`) REFERENCES `users` (`id_nguoidung`);

--
-- Các ràng buộc cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD CONSTRAINT `khuyenmai_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_nguoidung`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `id_nsx` FOREIGN KEY (`id_nsx`) REFERENCES `noisanxuat` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`ID_quyen`) REFERENCES `quyen` (`ID_quyen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
