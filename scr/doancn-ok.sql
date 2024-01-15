-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 04, 2024 lúc 10:29 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doancn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `email` varchar(100) NOT NULL,
  `pass` text NOT NULL,
  `hinhdaidien` text NOT NULL,
  `hoten` varchar(200) NOT NULL,
  `sdt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`email`, `pass`, `hinhdaidien`, `hoten`, `sdt`) VALUES
('camcoc@gmail.com', '123', './hinhanh/cam.jpg', 'Trương Nâu Phước Chiến', '0589544297'),
('hieuthao@gmail.com', '123456', './hinhanh/meo.jpg', 'Hiếu Thảo', '0147852369');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bomon`
--

CREATE TABLE `bomon` (
  `mabomon` int(11) NOT NULL,
  `tenbomon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bomon`
--

INSERT INTO `bomon` (`mabomon`, `tenbomon`) VALUES
(1, 'Công nghệ thông tin'),
(2, 'Công nghệ xây dựng'),
(3, 'Công nghệ ô tô'),
(4, 'Công nghệ cơ khí - động lực'),
(5, 'Công nghệ điện - điện tử');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `magv` int(11) NOT NULL,
  `mabomon` int(11) NOT NULL,
  `hotengv` varchar(100) NOT NULL,
  `sdtgv` varchar(10) NOT NULL,
  `hocvi` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `hinhdaidien` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`magv`, `mabomon`, `hotengv`, `sdtgv`, `hocvi`, `email`, `pass`, `hinhdaidien`) VALUES
(2, 1, 'Nguyễn Hoàng Duy Thiện', '0989274222', 'Thạc sĩ', 'dthien@gmail.com', '1234', './hinhanh/a1.jpg'),
(6, 1, 'Phạm Minh Đương', '0868567268', 'Thạc sĩ', 'mduong@gmail.com', '123', './hinhanh/meo1.jpg'),
(7, 1, 'Trịnh Quốc Việt', '0354696999', 'Thạc sĩ', 'qviet@gmail.com', '123', './hinhanh/meo1.jpg'),
(8, 1, 'Nguyễn Bá Nhiệm', '0983303609', 'Tiến sĩ', 'bnhiem@gmail.com', '123', './hinhanh/meo1.jpg'),
(9, 2, 'Cao Hữu Lợi', '0365212064', 'Thạc sĩ', 'hloi@gmail.com', '123', './hinhanh/meo1.jpg'),
(10, 2, 'Đoàn Công Chánh', '0908829867', 'Thạc sĩ', 'cchanh@gmail.com', '123', './hinhanh/meo1.jpg'),
(11, 5, 'Phạm Minh Triết', '0916130123', 'Thạc sĩ', 'mtriet@gmail.com', '123', './hinhanh/meo1.jpg'),
(12, 5, 'Cao Phương Thảo', '0766719277', 'Tiến sĩ', 'pthao@gmail.com', '123', './hinhanh/meo1.jpg'),
(13, 4, 'Trương Văn Mến', '0329989169', 'Tiến sĩ', 'vmen@gmail.com', '123', './hinhanh/meo1.jpg'),
(14, 1, 'Dương Ngọc Vân Khanh', '0988332008', 'Thạc sĩ', 'vkhanh@gmail.com', '123', './hinhanh/meo1.jpg'),
(15, 1, 'Ngô Thanh Huy', '0989623237', 'Thạc sĩ', 'thuy@gmail.com', '123', './hinhanh/meo1.jpg'),
(16, 4, 'Thạch Ngọc Phúc', '0973475358', 'Thạc sĩ', 'nphuc@gmail.com', '123', './hinhanh/meo1.jpg'),
(17, 4, 'Phan Văn Tuân', '0919762700', 'Thạc sĩ', 'vtuan@gmail.com', '123', './hinhanh/meo1.jpg'),
(18, 5, 'Phạm Tấn Hưng', '0907839644', 'Thạc sĩ', 'thung@gmail.com', '123', './hinhanh/meo1.jpg'),
(19, 5, 'Đặng Hoàng Minh', '0913632937', 'Thạc sĩ', 'hminh@gmail.com', '123', './hinhanh/meo1.jpg'),
(20, 2, 'Từ Hồng Nhung', '0989006496', 'Thạc sĩ', 'hnhung@gmail.com', '123', './hinhanh/meo1.jpg'),
(21, 2, 'Nguyễn Phú Nhuận', '0907892130', 'Thạc sĩ', 'pnhuan@gmail.com', '123', './hinhanh/meo1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhthuc`
--

CREATE TABLE `hinhthuc` (
  `mahinhthuc` int(11) NOT NULL,
  `tenhinhthuc` varchar(100) NOT NULL,
  `hinhthucthi` varchar(20) NOT NULL,
  `thoigian` int(11) NOT NULL,
  `buoi` varchar(20) NOT NULL,
  `dongia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhthuc`
--

INSERT INTO `hinhthuc` (`mahinhthuc`, `tenhinhthuc`, `hinhthucthi`, `thoigian`, `buoi`, `dongia`) VALUES
(23, 'Tự luận - 40 - Sáng', 'Tự luận', 40, 'Sáng', 50000),
(24, 'Tự luận - 60 - Sáng', 'Tự luận', 60, 'Sáng', 50000),
(25, 'Tự luận - 90 - Sáng', 'Tự luận', 90, 'Sáng', 50000),
(26, 'Tự luận - 120 - Sáng', 'Tự luận', 120, 'Sáng', 350000),
(27, 'Tự luận - 40 - Chiều', 'Tự luận', 40, 'Chiều', 50000),
(28, 'Tự luận - 60 - Chiều', 'Tự luận', 60, 'Chiều', 50000),
(29, 'Tự luận - 90 - Chiều', 'Tự luận', 90, 'Chiều', 50000),
(30, 'Tự luận - 120 - Chiều', 'Tự luận', 120, 'Chiều', 50000),
(31, 'Trắc nghiệm - 40 - Sáng', 'Trắc nghiệm', 40, 'Sáng', 50000),
(32, 'Trắc nghiệm - 60 - Sáng', 'Trắc nghiệm', 60, 'Sáng', 50000),
(33, 'Trắc nghiệm - 40 - Chiều', 'Trắc nghiệm', 40, 'Chiều', 50000),
(34, 'Trắc nghiệm - 60 - Chiều', 'Trắc nghiệm', 60, 'Chiều', 50000),
(35, 'Tự luận - 40 - Tối', 'Tự luận', 40, 'Tối', 50000),
(36, 'Tự luận - 60 - Tối', 'Tự luận', 60, 'Tối', 50000),
(37, 'Tự luận - 90 - Tối', 'Tự luận', 90, 'Tối', 50000),
(38, 'Tự luận - 120 - Tối', 'Tự luận', 120, 'Tối', 50000),
(39, 'Trắc nghiệm - 40 - Tối', 'Trắc nghiệm', 40, 'Tối', 50000),
(40, 'Trắc nghiệm - 60 - Tối', 'Trắc nghiệm', 60, 'Tối', 50000),
(41, 'Thực hành - 60 - Sáng', 'Thực hành', 60, 'Sáng', 50000),
(42, 'Thực hành - 90 - Sáng', 'Thực hành', 90, 'Sáng', 50000),
(43, 'Thực hành - 120 - Sáng', 'Thực hành', 120, 'Sáng', 50000),
(44, 'Thực hành - 60 - Chiều', 'Thực hành', 60, 'Chiều', 50000),
(45, 'Thực hành - 90 - Chiều', 'Thực hành', 90, 'Chiều', 50000),
(46, 'Thực hành - 120 - Chiều', 'Thực hành', 120, 'Chiều', 50000),
(47, 'Thực hành - 60 - Tối', 'Thực hành', 60, 'Tối', 50000),
(48, 'Thực hành - 90 - Tối', 'Thực hành', 90, 'Tối', 50000),
(49, 'Thực hành - 120 - Tối', 'Thực hành', 120, 'Tối', 50000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocky`
--

CREATE TABLE `hocky` (
  `mahocky` int(11) NOT NULL,
  `tenhocky` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hocky`
--

INSERT INTO `hocky` (`mahocky`, `tenhocky`) VALUES
(1, 'Học kỳ 1'),
(2, 'Học kỳ 2'),
(3, 'Học kỳ 3'),
(4, 'Học kỳ 4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichthi`
--

CREATE TABLE `lichthi` (
  `malichthi` int(11) NOT NULL,
  `mahocky` int(11) NOT NULL,
  `malop` varchar(10) NOT NULL,
  `mahinhthuc` int(11) NOT NULL,
  `manamhoc` int(11) NOT NULL,
  `mamon` int(11) NOT NULL,
  `tenlichthi` varchar(50) NOT NULL,
  `ngaythi` date NOT NULL,
  `phongthi` varchar(20) NOT NULL,
  `tietthi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lichthi`
--

INSERT INTO `lichthi` (`malichthi`, `mahocky`, `malop`, `mahinhthuc`, `manamhoc`, `mamon`, `tenlichthi`, `ngaythi`, `phongthi`, `tietthi`) VALUES
(8, 2, 'DA20TTB', 42, 2122, 220236, 'Thi kết thúc môn lần 1', '2022-01-08', 'D71.109', 2),
(9, 2, 'DA20TTB', 36, 2122, 220101, 'Thi kết thúc môn lần 1', '2021-12-29', 'B31.205', 11),
(10, 1, 'DA20TTB', 36, 2223, 220267, 'Thi kết thúc môn lần 1', '2023-01-05', 'B31.306', 11),
(11, 2, 'DA20TTA', 45, 2223, 220060, 'Thi kết thúc môn lần 1', '2023-03-15', 'C71.206', 6),
(12, 2, 'DA21TTC', 37, 2223, 220237, 'Thi kết thúc môn lần 1', '2023-05-17', 'B31.105', 11),
(13, 2, 'DA21TTA', 25, 2324, 220242, 'Thi kết thúc môn lần 1', '2023-12-25', 'B31.203', 2),
(14, 2, 'DA20TTA', 39, 2223, 220109, 'Thi kết thúc môn lần 1', '2023-06-06', 'B31.302', 11),
(15, 2, 'DA20TTA', 29, 2122, 220096, 'Thi kết thúc môn lần 1', '2022-06-22', 'B21.105', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `malop` varchar(10) NOT NULL,
  `tenlop` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`malop`, `tenlop`) VALUES
('DA20CNOTA', 'ĐH Công nghệ ô tô A khóa 2020'),
('DA20CNOTB', 'ĐH Công nghệ ô tô B khóa 2020'),
('DA20KDA', 'ĐH CNKT Điện - điện tử A khóa 2020'),
('DA20KDB', 'ĐH CNKT Điện - điện tử B khóa 2020'),
('DA20TTA', 'ĐH Công nghệ thông tin A khóa 2020'),
('DA20TTB', 'ĐH Công nghệ thông tin B khóa 2020'),
('DA20XD', 'ĐH CNKT Công trình xây dựng khóa 2020'),
('DA20XDGT', 'ĐH Công trình giao thông khóa 2020'),
('DA21CNOTA', 'ĐH Công nghệ ô tô A khóa 2021'),
('DA21CNOTB', 'ĐH Công nghệ ô tô B khóa 2021'),
('DA21CNOTC', 'ĐH Công nghệ ô tô C khóa 2021'),
('DA21KDA', 'ĐH CNKT Điện - điện tử A khóa 2021'),
('DA21KDB', 'ĐH CNKT Điện - điện tử B khóa 2021'),
('DA21TTA', 'ĐH Công nghệ thông tin A khóa 2021'),
('DA21TTB', 'ĐH Công nghệ thông tin B khóa 2021'),
('DA21TTC', 'ĐH Công nghệ thông tin C khóa 2021'),
('DA21XD', 'ĐH CNKT Công trình xây dựng khóa 2021'),
('DA21XDGT', 'ĐH Công trình giao thông khóa 2021'),
('DA22KDA', 'ĐH CNKT Điện - điện tử A khóa 2022'),
('DA22KDB', 'ĐH CNKT Điện - điện tử B khóa 2022'),
('DA22XD', 'ĐH CNKT Công trình xây dựng khóa 2022'),
('DA22XDGT', 'ĐH Công trình giao thông khóa 2022');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `mamon` int(11) NOT NULL,
  `tenmon` varchar(100) NOT NULL,
  `sotinchi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`mamon`, `tenmon`, `sotinchi`) VALUES
(110079, 'Kiến trúc máy tính', 2),
(220055, 'Công nghệ phần mềm', 3),
(220057, 'Xử lý ảnh', 3),
(220060, 'Hệ quản trị cơ sở dữ liệu', 3),
(220064, 'Chuyên đề ASP.net', 3),
(220078, 'Quản trị dự án công nghệ thông tin', 3),
(220092, 'Nhập môn công nghệ thông tin', 2),
(220096, 'Cơ sở dữ liệu', 3),
(220100, 'Lý thuyết đồ thị', 3),
(220101, 'Hệ điều hành', 3),
(220109, 'Khai khoáng dữ liệu', 3),
(220120, 'Xây dựng phần mềm hướng đối tượng', 3),
(220126, 'An toàn và bảo mật thông tin', 3),
(220228, 'Kỹ thuật lập trình', 4),
(220234, 'Cấu trúc dữ liệu và giải thuật', 4),
(220236, 'Thiết kế Web', 3),
(220237, 'Lý thuyết xếp hàng', 3),
(220239, 'Phân tích thiết kế hệ thống thông tin', 3),
(220242, 'Cơ sở trí tuệ nhân tạo', 3),
(220250, 'Anh văn chuyên ngành Công nghệ thông tin', 3),
(220267, 'Điện toán đám mây', 3),
(220268, 'Phát triển ứng dụng hướng dịch vụ', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `namhoc`
--

CREATE TABLE `namhoc` (
  `manamhoc` int(11) NOT NULL,
  `tennamhoc` varchar(100) NOT NULL,
  `thoigianBD` date NOT NULL,
  `thoigianKT` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `namhoc`
--

INSERT INTO `namhoc` (`manamhoc`, `tennamhoc`, `thoigianBD`, `thoigianKT`) VALUES
(2021, 'Năm học 2020 - 2021', '2020-09-06', '2021-05-09'),
(2122, 'Năm học 2021 - 2022', '2021-09-12', '2022-05-08'),
(2223, 'Năm học 2022 - 2023', '2022-09-11', '2023-05-07'),
(2324, 'Năm học 2023 - 2024', '2023-09-10', '2024-05-06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phancongcoithi`
--

CREATE TABLE `phancongcoithi` (
  `malichthi` int(11) NOT NULL,
  `magv` int(11) NOT NULL,
  `tinhtrang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phancongcoithi`
--

INSERT INTO `phancongcoithi` (`malichthi`, `magv`, `tinhtrang`) VALUES
(8, 6, 'Đã duyệt'),
(9, 10, 'Đã duyệt'),
(10, 2, 'Đã duyệt'),
(11, 2, 'Đã duyệt'),
(12, 2, 'Đã duyệt'),
(13, 2, 'Đã duyệt'),
(14, 8, 'Đã duyệt'),
(15, 15, 'Đã duyệt');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `bomon`
--
ALTER TABLE `bomon`
  ADD PRIMARY KEY (`mabomon`);

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`magv`),
  ADD KEY `mabomon` (`mabomon`);

--
-- Chỉ mục cho bảng `hinhthuc`
--
ALTER TABLE `hinhthuc`
  ADD PRIMARY KEY (`mahinhthuc`),
  ADD UNIQUE KEY `tenhinhthuc` (`tenhinhthuc`),
  ADD UNIQUE KEY `tenhinhthuc_2` (`tenhinhthuc`),
  ADD UNIQUE KEY `tenhinhthuc_3` (`tenhinhthuc`);

--
-- Chỉ mục cho bảng `hocky`
--
ALTER TABLE `hocky`
  ADD PRIMARY KEY (`mahocky`);

--
-- Chỉ mục cho bảng `lichthi`
--
ALTER TABLE `lichthi`
  ADD PRIMARY KEY (`malichthi`),
  ADD KEY `mahinhthuc` (`mahinhthuc`),
  ADD KEY `mahocky` (`mahocky`),
  ADD KEY `mamon` (`mamon`),
  ADD KEY `manamhoc` (`manamhoc`),
  ADD KEY `malop` (`malop`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`malop`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`mamon`),
  ADD UNIQUE KEY `tenmon` (`tenmon`);

--
-- Chỉ mục cho bảng `namhoc`
--
ALTER TABLE `namhoc`
  ADD PRIMARY KEY (`manamhoc`);

--
-- Chỉ mục cho bảng `phancongcoithi`
--
ALTER TABLE `phancongcoithi`
  ADD PRIMARY KEY (`malichthi`),
  ADD KEY `magv` (`magv`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bomon`
--
ALTER TABLE `bomon`
  MODIFY `mabomon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  MODIFY `magv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `hinhthuc`
--
ALTER TABLE `hinhthuc`
  MODIFY `mahinhthuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `hocky`
--
ALTER TABLE `hocky`
  MODIFY `mahocky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lichthi`
--
ALTER TABLE `lichthi`
  MODIFY `malichthi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `namhoc`
--
ALTER TABLE `namhoc`
  MODIFY `manamhoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2325;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `giangvien_ibfk_1` FOREIGN KEY (`mabomon`) REFERENCES `bomon` (`mabomon`);

--
-- Các ràng buộc cho bảng `lichthi`
--
ALTER TABLE `lichthi`
  ADD CONSTRAINT `lichthi_ibfk_1` FOREIGN KEY (`mahinhthuc`) REFERENCES `hinhthuc` (`mahinhthuc`),
  ADD CONSTRAINT `lichthi_ibfk_2` FOREIGN KEY (`mahocky`) REFERENCES `hocky` (`mahocky`),
  ADD CONSTRAINT `lichthi_ibfk_3` FOREIGN KEY (`mamon`) REFERENCES `monhoc` (`mamon`),
  ADD CONSTRAINT `lichthi_ibfk_4` FOREIGN KEY (`manamhoc`) REFERENCES `namhoc` (`manamhoc`),
  ADD CONSTRAINT `lichthi_ibfk_5` FOREIGN KEY (`malop`) REFERENCES `lop` (`malop`);

--
-- Các ràng buộc cho bảng `phancongcoithi`
--
ALTER TABLE `phancongcoithi`
  ADD CONSTRAINT `phancongcoithi_ibfk_1` FOREIGN KEY (`magv`) REFERENCES `giangvien` (`magv`),
  ADD CONSTRAINT `phancongcoithi_ibfk_2` FOREIGN KEY (`malichthi`) REFERENCES `lichthi` (`malichthi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
