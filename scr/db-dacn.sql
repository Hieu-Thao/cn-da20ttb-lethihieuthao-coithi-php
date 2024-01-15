-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 08, 2023 lúc 11:53 AM
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
-- Cơ sở dữ liệu: `dacn`
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
(4, 'Công nghệ cơ khí'),
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
(1, 1, 'Nguyễn Văn A', '0866475515', 'Thạc sĩ', 'vana@gmail.com', '123456', './hinhanh/meo1.jpg'),
(2, 1, 'Nguyễn Hoàng Duy Thiện', '0147789963', 'Thạc sĩ', 'dthien@gmail.com', '123', './hinhanh/a1.jpg'),
(3, 2, 'Dương Phan Hoàng Vũ', '0147895632', 'Tiến sĩ', 'hvu@gmail.com', '123456', './hinhanh/a3.jpg'),
(4, 3, 'Trương Nhật Khanh', '0147999654', 'Thạc sĩ', 'nkhanh@gmail.com', '123456', './hinhanh/a2.jpg'),
(5, 4, 'Trần Văn Nam', '0897456321', 'Tiến sĩ', 'vnam@gmail.com', '123', './hinhanh/cam.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhthuc`
--

CREATE TABLE `hinhthuc` (
  `mahinhthuc` int(11) NOT NULL,
  `tenhinhthuc` varchar(100) NOT NULL,
  `thoigian` int(11) NOT NULL,
  `buoi` varchar(20) NOT NULL,
  `dongia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhthuc`
--

INSERT INTO `hinhthuc` (`mahinhthuc`, `tenhinhthuc`, `thoigian`, `buoi`, `dongia`) VALUES
(1, 'Tự luận', 60, 'Sáng', 50000),
(2, 'Tự luận', 60, 'Chiều', 50000),
(3, 'Tự luận', 60, 'Tối', 65000),
(4, 'Tự luận', 90, 'Sáng', 80000),
(5, 'Tự luận', 90, 'Chiều', 80000),
(6, 'Tự luận', 90, 'Tối', 95000),
(7, 'Thực hành', 60, 'Sáng', 50000),
(8, 'Thực hành', 60, 'Chiều', 50000),
(9, 'Thực hành', 60, 'Tối', 65000),
(10, 'Thực hành', 90, 'Sáng', 80000),
(11, 'Thực hành', 90, 'Chiều', 80000),
(12, 'Thực hành', 90, 'Tối', 95000);

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
(1, 1, 'DA20TTA', 9, 2122, 220228, 'Thi kết thúc môn lần 1', '2022-06-16', 'D71.109', 3),
(2, 1, 'DA20TTB', 4, 2223, 110079, 'Thi kết thúc môn lần 1', '2023-04-05', 'B31.205', 6),
(3, 2, 'DA20TTB', 4, 2122, 220267, 'Thi kết thúc môn lần 1', '2023-07-12', 'B31.105', 7),
(4, 2, 'DA20TTA', 3, 2122, 220101, 'Thi kết thúc môn lần 1', '2023-07-12', 'B31.202', 5);

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
('DA20XDGT', 'ĐH Công trình giao thông khóa 2020');

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
(220064, 'Chuyên đề ASP.net', 3),
(220092, 'Nhập môn công nghệ thông tin', 2),
(220096, 'Cơ sở dữ liệu', 3),
(220101, 'Hệ điều hành', 3),
(220228, 'Kỹ thuật lập trình', 4),
(220234, 'Cấu trúc dữ liệu và giải thuật', 4),
(220236, 'Thiết kế Web', 3),
(220267, 'Điện toán đám mây', 3);

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
  ADD PRIMARY KEY (`mahinhthuc`);

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
  ADD PRIMARY KEY (`mamon`);

--
-- Chỉ mục cho bảng `namhoc`
--
ALTER TABLE `namhoc`
  ADD PRIMARY KEY (`manamhoc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bomon`
--
ALTER TABLE `bomon`
  MODIFY `mabomon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `hinhthuc`
--
ALTER TABLE `hinhthuc`
  MODIFY `mahinhthuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `hocky`
--
ALTER TABLE `hocky`
  MODIFY `mahocky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lichthi`
--
ALTER TABLE `lichthi`
  MODIFY `malichthi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
