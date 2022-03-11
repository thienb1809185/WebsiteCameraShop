-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 14, 2021 lúc 07:19 PM
-- Phiên bản máy phục vụ: 10.1.25-MariaDB
-- Phiên bản PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlydathang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `id` int(4) NOT NULL,
  `SoDonDH` int(4) DEFAULT NULL,
  `MSHH` int(4) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `GiaDatHang` int(11) DEFAULT NULL,
  `GiamGia` int(11) DEFAULT NULL,
  `TongTienHH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdathang`
--

INSERT INTO `chitietdathang` (`id`, `SoDonDH`, `MSHH`, `SoLuong`, `GiaDatHang`, `GiamGia`, `TongTienHH`) VALUES
(5, 8, 13, 1, 180000000, 18000000, 162000000),
(6, 8, 12, 1, 25000000, 2500000, 22500000),
(7, 9, 12, 1, 25000000, 2500000, 22500000),
(8, 10, 4, 1, 15000000, 1500000, 13500000),
(9, 11, 20, 1, 5000000, 500000, 4500000),
(10, 12, 11, 1, 25000000, 2500000, 22500000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(4) NOT NULL,
  `MSKH` int(11) DEFAULT NULL,
  `MSNV` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgayDH` datetime DEFAULT NULL,
  `NgayGH` datetime DEFAULT NULL,
  `TrangThaiDH` int(20) DEFAULT NULL,
  `TongTien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `NgayGH`, `TrangThaiDH`, `TongTien`) VALUES
(8, 17, 'thien26122000@gmail.com', '2021-11-14 05:43:39', '2021-11-14 05:50:32', 1, 205000000),
(9, 18, 'thien26122000@gmail.com', '2021-11-14 05:45:09', '2021-11-14 05:45:31', 1, 25000000),
(10, 19, 'thien26122000@gmail.com', '2021-11-14 05:55:14', '2021-11-14 05:55:41', 2, 15000000),
(11, 20, 'thien26122000@gmail.com', '2021-11-14 06:04:53', '2021-11-14 06:05:18', 1, 5000000),
(12, 21, 'thienb1809185@student.ctu.edu.vn', '2021-11-14 06:09:40', '2021-11-14 06:13:44', 1, 25000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachikh`
--

CREATE TABLE `diachikh` (
  `MaDC` int(4) NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MSKH` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diachikh`
--

INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
(4, 'KTX B, Đại Học Cần Thơ', 17),
(5, 'KTX A, Đại Học Cần Thơ', 18),
(6, 'Cần Thơ', 19),
(7, 'Sóc Trăng', 20),
(8, 'Cần Thơ', 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` int(4) NOT NULL,
  `TenHH` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhHangHoa` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `QuyCach` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Gia` int(11) DEFAULT NULL,
  `SoLuongHang` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL,
  `MaLoaiHang` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `HinhHangHoa`, `QuyCach`, `Gia`, `SoLuongHang`, `created_at`, `updated_at`, `deleted`, `MaLoaiHang`) VALUES
(1, 'Cannon EOS', 'https://cdn.nguyenkimmall.com/images/thumbnails/180/180/detailed/644/10036326-may-anh-canon-eos-3000d-kit-ef-s-18-55mm-den-1.jpg', 'Cảm biến CMOS, độ phân giải 18MP cho thước ảnh đẹp\r\nBộ xử lý ảnh DIGIC 4+ mạnh mẽ cho màu sắc chuẩn xác\r\nHệ thống lấy nét tự động 9 điểm cho hình ảnh cực kì sắc nét\r\nChế độ chụp ảnh chuyên nghiệp theo môi trường xung quanh\r\nCông nghệ Wi-Fi và NFC tích hợp đầy tiện ích', 8000000, 5, '2021-11-08 03:34:15', '2021-11-14 18:43:47', 0, 'CANON'),
(2, 'Canon D50', 'https://cdn.nguyenkimmall.com/images/thumbnails/600/336/detailed/624/10044647-may-anh-canon-eos-m200-ef-m-15-45mm-trang-1.jpg', 'Đặc điểm nổi bật\r\nỐng kính Canon EF-M 15-45mm đáp ứng tốt nhu cầu chụp\r\nCảm biến CMOS APS-C 24.1MP đạt được hình ảnh trong trẻo\r\nXử lý hình ảnh DIGIC 8 duy trì chất lượng ảnh tuyệt hảo\r\nDual Pixel CMOS AF với 143 điểm, phản hồi lấy nét nhanh', 10000000, 3, '2021-11-08 03:34:15', '2021-11-10 07:13:38', 0, 'CANON'),
(3, 'Máy ảnh Canon EOS M200 EF-M 15-45 BK', 'assets/photos/slider2.jpg', 'Cảm biến APS-C CMOS 24.1MP đáp ứng tốt nhu cầu chụp\r\nDual Pixel CMOS AF phản hồi lấy nét trong thời gian ngắn \r\nTốc độ cửa trập 30 - 1/4000s, nhanh chóng bắt sáng', 9000000, 3, '2021-11-08 04:25:42', '2021-11-08 04:50:43', 1, 'CANON'),
(4, 'Máy Ảnh Canon EOS 6D Mark II', 'assets/photos/cannoneos6d.jpg', 'Đặc điểm nổi bật Cảm biến CMOS, độ phân giải 18MP cho thước ảnh đẹp Bộ xử lý ảnh DIGIC 4+ mạnh mẽ cho màu sắc chuẩn xác Hệ thống lấy nét tự động 9 điểm cho hình ảnh cực kì sắc nét Chế độ chụp ảnh chuyên nghiệp theo môi trường xung quanh Công nghệ Wi-Fi và NFC tích hợp đầy tiện ích', 15000000, 2, '2021-11-08 16:54:37', '2021-11-10 09:41:37', 0, 'CANON'),
(5, 'Máy ảnh Canon EOS R6', 'assets/photos/cano_eos_R6.jpg', 'Đặc điểm nổi bật Cảm biến CMOS, độ phân giải 18MP cho thước ảnh đẹp Bộ xử lý ảnh DIGIC 4+ mạnh mẽ cho màu sắc chuẩn xác Hệ thống lấy nét tự động 9 điểm cho hình ảnh cực kì sắc nét Chế độ chụp ảnh chuyên nghiệp theo môi trường xung quanh Công nghệ Wi-Fi và NFC tích hợp đầy tiện ích<div style=\"box-siz', 17000000, 4, '2021-11-09 04:11:30', '2021-11-10 09:51:37', 0, 'CANON'),
(6, 'Máy ảnh Sony Alpha A7 Mark III', 'assets/photos/sony_aphle_A7.jpg', 'Đặc điểm nổi bật Cảm biến CMOS, độ phân giải 18MP cho thước ảnh đẹp Bộ xử lý ảnh DIGIC 4+ mạnh mẽ cho màu sắc chuẩn xác Hệ thống lấy nét tự động 9 điểm cho hình ảnh cực kì sắc nét Chế độ chụp ảnh chuyên nghiệp theo môi trường xung quanh Công nghệ Wi-Fi và NFC tích hợp đầy tiện ích<div style=\"box-siz', 15000000, 3, '2021-11-09 04:55:34', '2021-11-10 09:02:38', 0, 'SONY'),
(7, 'Máy ảnh Sony Alpha A7 Mark IV', 'assets/photos/sony_alpha_A7_IV.jpg', 'Đặc điểm nổi bật Cảm biến CMOS, độ phân giải 18MP cho thước ảnh đẹp Bộ xử lý ảnh DIGIC 4+ mạnh mẽ cho màu sắc chuẩn xác Hệ thống lấy nét tự động 9 điểm cho hình ảnh cực kì sắc nét Chế độ chụp ảnh chuyên nghiệp theo môi trường xung quanh Công nghệ Wi-Fi và NFC tích hợp đầy tiện ích<div style=\"box-siz', 50000000, 3, '2021-11-09 04:31:38', '2021-11-10 09:08:57', 0, 'SONY'),
(8, 'Máy ảnh Sony Alpha A6400 (Black)', 'assets/photos/sony_alpha_A6400.jpg', 'Đặc điểm nổi bật Cảm biến CMOS, độ phân giải 18MP cho thước ảnh đẹp Bộ xử lý ảnh DIGIC 4+ mạnh mẽ cho màu sắc chuẩn xác Hệ thống lấy nét tự động 9 điểm cho hình ảnh cực kì sắc nét Chế độ chụp ảnh chuyên nghiệp theo môi trường xung quanh Công nghệ Wi-Fi và NFC tích hợp đầy tiện ích<div style=\"box-siz', 15000000, 5, '2021-11-09 04:10:40', '2021-11-10 09:12:38', 0, 'SONY'),
(9, 'Máy ảnh Sony ZV-E10', 'assets/photos/sony_ZV.jpg', 'Đặc điểm nổi bật Cảm biến CMOS, độ phân giải 18MP cho thước ảnh đẹp Bộ xử lý ảnh DIGIC 4+ mạnh mẽ cho màu sắc chuẩn xác Hệ thống lấy nét tự động 9 điểm cho hình ảnh cực kì sắc nét Chế độ chụp ảnh chuyên nghiệp theo môi trường xung quanh Công nghệ Wi-Fi và NFC tích hợp đầy tiện ích<div style=\"box-siz', 20000000, 6, '2021-11-09 04:16:42', '2021-11-10 09:35:38', 0, 'SONY'),
(10, 'Máy ảnh Nikon Z5', 'assets/photos/nikon-z5-1-500x500.jpg', 'Đặc điểm nổi bật Cảm biến CMOS, độ phân giải 18MP cho thước ảnh đẹp Bộ xử lý ảnh DIGIC 4+ mạnh mẽ cho màu sắc chuẩn xác Hệ thống lấy nét tự động 9 điểm cho hình ảnh cực kì sắc nét Chế độ chụp ảnh chuyên nghiệp theo môi trường xung quanh Công nghệ Wi-Fi và NFC tích hợp đầy tiện ích<div style=\"box-siz', 20000000, 5, '2021-11-09 04:03:44', '2021-11-10 09:42:38', 0, 'NIKON'),
(11, 'Máy ảnh Nikon Z fc', 'assets/photos/nikon-zfc-lens-16-50mm-1-500x500.png', 'Đặc điểm nổi bật Cảm biến CMOS, độ phân giải 18MP cho thước ảnh đẹp Bộ xử lý ảnh DIGIC 4+ mạnh mẽ cho màu sắc chuẩn xác Hệ thống lấy nét tự động 9 điểm cho hình ảnh cực kì sắc nét Chế độ chụp ảnh chuyên nghiệp theo môi trường xung quanh Công nghệ Wi-Fi và NFC tích hợp đầy tiện ích<div style=\"box-siz', 25000000, 5, '2021-11-09 04:49:46', '2021-11-10 09:48:38', 0, 'NIKON'),
(12, 'Máy ảnh Nikon D750', 'assets/photos/nikon-d750-nhap-khau1-500x500.jpg', 'Đặc điểm nổi bật Cảm biến CMOS, độ phân giải 18MP cho thước ảnh đẹp Bộ xử lý ảnh DIGIC 4+ mạnh mẽ cho màu sắc chuẩn xác Hệ thống lấy nét tự động 9 điểm cho hình ảnh cực kì sắc nét Chế độ chụp ảnh chuyên nghiệp theo môi trường xung quanh Công nghệ Wi-Fi và NFC tích hợp đầy tiện ích<div style=\"box-siz', 25000000, 5, '2021-11-09 04:56:54', '2021-11-10 09:53:38', 0, 'NIKON'),
(13, 'Máy ảnh Nikon Z50', 'assets/photos/nikon-z50-500x500.jpg', 'Đặc điểm nổi bật Cảm biến CMOS, độ phân giải 18MP cho thước ảnh đẹp Bộ xử lý ảnh DIGIC 4+ mạnh mẽ cho màu sắc chuẩn xác Hệ thống lấy nét tự động 9 điểm cho hình ảnh cực kì sắc nét Chế độ chụp ảnh chuyên nghiệp theo môi trường xung quanh Công nghệ Wi-Fi và NFC tích hợp đầy tiện ích<div style=\"box-siz', 180000000, 5, '2021-11-09 04:50:57', '2021-11-10 09:59:38', 0, 'NIKON'),
(14, 'Máy ảnh Fujifilm X-E3', 'assets/photos/fujifilm-x-e3-silver-500x500.jpg', 'Đặc điểm nổi bật Cảm biến CMOS, độ phân giải 18MP cho thước ảnh đẹp Bộ xử lý ảnh DIGIC 4+ mạnh mẽ cho màu sắc chuẩn xác Hệ thống lấy nét tự động 9 điểm cho hình ảnh cực kì sắc nét Chế độ chụp ảnh chuyên nghiệp theo môi trường xung quanh Công nghệ Wi-Fi và NFC tích hợp đầy tiện ích<div style=\"box-siz', 10000000, 10, '2021-11-09 04:22:59', '2021-11-10 09:05:39', 0, 'FUJIFILM'),
(15, 'Máy ảnh Fujifilm X-S10', 'assets/photos/fujifilm-x-s10-1-1-500x500.jpg', 'Đặc điểm nổi bật Cảm biến CMOS, độ phân giải 18MP cho thước ảnh đẹp Bộ xử lý ảnh DIGIC 4+ mạnh mẽ cho màu sắc chuẩn xác Hệ thống lấy nét tự động 9 điểm cho hình ảnh cực kì sắc nét Chế độ chụp ảnh chuyên nghiệp theo môi trường xung quanh Công nghệ Wi-Fi và NFC tích hợp đầy tiện ích<div style=\"box-siz', 12000000, 15, '2021-11-09 05:31:00', '2021-11-10 09:11:39', 0, 'FUJIFILM'),
(16, 'Máy ảnh Fujifilm X-T200', 'assets/photos/fujifilm-x-T200.jpg', 'Đặc điểm nổi bật Cảm biến CMOS, độ phân giải 18MP cho thước ảnh đẹp Bộ xử lý ảnh DIGIC 4+ mạnh mẽ cho màu sắc chuẩn xác Hệ thống lấy nét tự động 9 điểm cho hình ảnh cực kì sắc nét Chế độ chụp ảnh chuyên nghiệp theo môi trường xung quanh Công nghệ Wi-Fi và NFC tích hợp đầy tiện ích<div style=\"box-siz', 16000000, 9, '2021-11-09 05:11:02', '2021-11-10 09:17:39', 0, 'FUJIFILM'),
(17, 'Máy ảnh Fujifilm X100F (Silver)', 'assets/photos/fujifilm-x100f.jpg', 'Đặc điểm nổi bật Cảm biến CMOS, độ phân giải 18MP cho thước ảnh đẹp Bộ xử lý ảnh DIGIC 4+ mạnh mẽ cho màu sắc chuẩn xác Hệ thống lấy nét tự động 9 điểm cho hình ảnh cực kì sắc nét Chế độ chụp ảnh chuyên nghiệp theo môi trường xung quanh Công nghệ Wi-Fi và NFC tích hợp đầy tiện ích<div style=\"box-siz', 14000000, 4, '2021-11-09 05:24:03', '2021-11-10 09:24:39', 0, 'FUJIFILM'),
(18, 'Máy ảnh Panasonic Lumix DC-S5', 'assets/photos/lumix-s5-500x500.png', 'Đặc điểm nổi bật Cảm biến CMOS, độ phân giải 18MP cho thước ảnh đẹp Bộ xử lý ảnh DIGIC 4+ mạnh mẽ cho màu sắc chuẩn xác Hệ thống lấy nét tự động 9 điểm cho hình ảnh cực kì sắc nét Chế độ chụp ảnh chuyên nghiệp theo môi trường xung quanh Công nghệ Wi-Fi và NFC tích hợp đầy tiện ích<div style=\"box-siz', 17000000, 5, '2021-11-09 05:55:05', '2021-11-10 09:30:39', 0, 'PANASONIC'),
(19, 'Máy ảnh Panasonic Lumix DC-S1R', 'assets/photos/panasonic-lumix-s1r.jpg', 'Đặc điểm nổi bật Cảm biến CMOS, độ phân giải 18MP cho thước ảnh đẹp Bộ xử lý ảnh DIGIC 4+ mạnh mẽ cho màu sắc chuẩn xác Hệ thống lấy nét tự động 9 điểm cho hình ảnh cực kì sắc nét Chế độ chụp ảnh chuyên nghiệp theo môi trường xung quanh Công nghệ Wi-Fi và NFC tích hợp đầy tiện ích<div style=\"box-siz', 50000000, 3, '2021-11-09 05:02:08', '2021-11-10 09:36:39', 0, 'PANASONIC'),
(20, 'Ống kính Fujifilm XF 18mm F/2', 'assets/photos/L_fujifilm-18mm-f2-500x500.jpg', 'Đặc điểm nổi bật Cảm biến CMOS, độ phân giải 18MP cho thước ảnh đẹp Bộ xử lý ảnh DIGIC 4+ mạnh mẽ cho màu sắc chuẩn xác Hệ thống lấy nét tự động 9 điểm cho hình ảnh cực kì sắc nét Chế độ chụp ảnh chuyên nghiệp theo môi trường xung quanh Công nghệ Wi-Fi và NFC tích hợp đầy tiện ích<div style=\"box-siz', 5000000, 15, '2021-11-09 05:48:09', '2021-11-10 09:42:39', 0, 'PHUKIEN'),
(21, 'Ống kính Sigma 35mm f/1.4', 'assets/photos/L_sigma-35mm-f14.jpg', 'Đặc điểm nổi bật Cảm biến CMOS, độ phân giải 18MP cho thước ảnh đẹp Bộ xử lý ảnh DIGIC 4+ mạnh mẽ cho màu sắc chuẩn xác Hệ thống lấy nét tự động 9 điểm cho hình ảnh cực kì sắc nét Chế độ chụp ảnh chuyên nghiệp theo môi trường xung quanh Công nghệ Wi-Fi và NFC tích hợp đầy tiện ích<div style=\"box-siz', 10000000, 6, '2021-11-09 05:06:11', '2021-11-10 09:48:39', 0, 'PHUKIEN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhhanghoa`
--

CREATE TABLE `hinhhanghoa` (
  `MaHinh` int(4) NOT NULL,
  `TenHinh` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MSHH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` int(4) NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `HoTenKH` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TenCongTy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoDienThoai` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` int(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `email`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `deleted`) VALUES
(17, 'thien001@gmail.com', 'Nguyễn Thanh Thiện', 'CTU', '0383835251', 0),
(18, 'thien002@gmail.com', 'Nguyễn Thanh', 'Trung Sơn', '0383835253', 0),
(19, 'thien003@gmail.com', 'Nguyen Thanh Thien', 'CTU', '1234567890', 0),
(20, 'thien004@gmail.com', 'Nguyễn Thiện', 'ABC', '1236985470', 0),
(21, 'thien005@gmail.com', 'Nguyễn Thiện', 'ABC', '0383835254', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `TenLoaiHang` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
('CANON', 'Máy Ảnh Canon'),
('FUJIFILM', 'Máy Ảnh FUJIFILM'),
('NIKON', 'Máy Ảnh Nikon'),
('PANASONIC', 'Máy Ảnh Panasonic'),
('PHUKIEN', 'Phụ Kiện Khác'),
('SONY', 'Máy Ảnh SONY');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HoTenNV` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ChucVu` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoDienThoai` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `password`, `HoTenNV`, `ChucVu`, `SoDienThoai`, `DiaChi`, `created_at`, `updated_at`, `deleted`) VALUES
('nguyenthanhthien@gmail.com', 'b4cbd48886a5331c5eb2fedadabe311c', 'Nguyễn Thiện', 'Nhân Viên', '0383835251', 'Sóc Trăng', '2021-11-14 05:34:03', '2021-11-14 05:41:48', 0),
('thienb1809185@student.ctu.edu.vn', 'b4cbd48886a5331c5eb2fedadabe311c', 'Nguyễn Thanh Thiện', 'admin', '0383835251', 'CTU Cần Thơ', '2021-11-14 05:40:49', '2021-11-14 06:13:15', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tokens`
--

CREATE TABLE `tokens` (
  `MSNV` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tokens`
--

INSERT INTO `tokens` (`MSNV`, `token`, `created_at`) VALUES
('thien001@gmail.com', '03799b354f274edbbb3a2b7d0c534261', '2021-11-02 15:34:18'),
('thien001@gmail.com', 'c5e617f75b6620c744f0f7c21e5f09ec', '2021-11-02 15:38:17'),
('thien@gmail.com', '99a5cf3a04cba8d16c02ee598919a414', '2021-11-06 02:13:47'),
('thienb1809185@student.ctu.edu.', '94820bfb0ea495e70966ec24c3909fa2', '2021-11-14 06:13:31'),
('thienb1809185@student.ctu.edu.', 'a8f4220bc7d18f4b7600f0e8e755ca5f', '2021-11-14 18:46:22');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MSHH` (`MSHH`),
  ADD KEY `SoDonDH` (`SoDonDH`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `MSKH` (`MSKH`),
  ADD KEY `MSNV` (`MSNV`);

--
-- Chỉ mục cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`MaDC`),
  ADD KEY `MSKH` (`MSKH`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `MaLoaiHang` (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD PRIMARY KEY (`MaHinh`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Chỉ mục cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  MODIFY `MaDC` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MSHH` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  MODIFY `MaHinh` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `chitietdathang_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`),
  ADD CONSTRAINT `chitietdathang_ibfk_2` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`);

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`);

--
-- Các ràng buộc cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD CONSTRAINT `diachikh_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`);

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihanghoa` (`MaLoaiHang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD CONSTRAINT `hinhhanghoa_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
