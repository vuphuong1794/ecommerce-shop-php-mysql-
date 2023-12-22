-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2023 at 09:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlybanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `id` int(11) NOT NULL COMMENT 'mã số bình luận',
  `tensp` text NOT NULL COMMENT 'tên của sản phẩm',
  `comment` text NOT NULL COMMENT 'Bình luận',
  `ten` text NOT NULL COMMENT 'tên người dùng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danhgia`
--

INSERT INTO `danhgia` (`id`, `tensp`, `comment`, `ten`) VALUES
(1, 'Áo thun kẻ', 'Xấu, không đáng tiền', 'Tào Tháo'),
(2, 'Áo thun kẻ', 'Cưỡi ngựa gì mà giao hàng nhanh vậy?', 'Gia Cát Lượng'),
(3, 'Áo thun kẻ', 'Đẹp nhe, mới mua cho em ghệ', 'Lữ Bố'),
(12, 'Áo thun kẻ   ', 'Rất ưng, lần sau mua nữa', 'Điêu Thuyền'),
(13, 'Regular-Fit ', 'Tiền bán dép tích 1 tuần mới đủ mua, quá ưng', 'Lưu Bị'),
(14, 'Regular-Fit ', 'Đại ca sao không mượn tiền đệ', 'Trương Phi'),
(15, 'Slim-Fit ', 'Được', 'Triệu Vân'),
(16, 'Regular-Fit ', 'Hôm bữa được chủ công ban thưởng, muốn mua chiến bào mới, được người quen chỉ mua chỗ này, quá là ưng', 'Triệu Vân'),
(21, 'Áo thun kẻ ', 'Bữa đánh trận rách cái áo, được người ta chỉ lên shop này mua, quá là ưng', 'Triệu Vân');

-- --------------------------------------------------------

--
-- Table structure for table `lstk`
--

CREATE TABLE `lstk` (
  `tendangnhap` text NOT NULL COMMENT 'tên tài khoản',
  `timkiem` text NOT NULL COMMENT 'nội dung tìm kiếm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lstk`
--

INSERT INTO `lstk` (`tendangnhap`, `timkiem`) VALUES
('', 'jogger'),
('', 'jogger'),
('', 'jogger'),
('', 'jogger'),
('', 'thun'),
('', 'thun'),
('', 'thun'),
('', 'thun'),
('', 'thun'),
('', 'thun'),
('', 'sơ mi'),
('', 'sơ mi');

-- --------------------------------------------------------

--
-- Table structure for table `phanhoi`
--

CREATE TABLE `phanhoi` (
  `ten` text NOT NULL COMMENT 'tên người phản hồi',
  `email` text NOT NULL COMMENT 'email',
  `sdt` text NOT NULL COMMENT 'số điện thoại người phản hồi',
  `mess` text NOT NULL COMMENT 'nội dung phản hồi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phanhoi`
--

INSERT INTO `phanhoi` (`ten`, `email`, `sdt`, `mess`) VALUES
('Khoa', 'maikhoa2015@gmail.com', '09345632223', 'Web rất hay, tôi đã thích'),
('Khoa', 'maikhoa2015@gmail.com', '09345632223', 'Test được bên Liên hệ nè'),
('Khoa', 'maikhoa2015@gmail.com', '09345632223', 'Test được bên Liên hệ nè'),
('Khoa', 'maikhoa2015@gmail.com', '09345632223', 'Web rất hay, tôi đã thích kkkkk');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` varchar(3) NOT NULL COMMENT 'Mã sản phẩm 3 kí tự, "A01" là áo, "Q01" là quần,"K01" là đồ khác',
  `tensp` text NOT NULL COMMENT 'tên sản phẩm',
  `size` varchar(4) NOT NULL COMMENT 'gồm S M L XL XXL XXXL',
  `loai` text NOT NULL COMMENT 'loại gồm ''thun'', ''somi'', ''polo'', ''sweater'', ''jogger'', ''short''.',
  `freeship` tinyint(1) NOT NULL COMMENT 'Có free ship không',
  `giaca` int(11) NOT NULL COMMENT 'Giá tiền, lưu ý không để dấu chấm hay phẩy',
  `giaship` int(11) NOT NULL COMMENT 'Nếu freeship=false thì phải giá ship ở đây',
  `pt` text NOT NULL COMMENT 'phương thức thanh toán, gồm ',
  `giamgia` float NOT NULL COMMENT 'số thập phân, ví dụ 25% thì ghi 0.25',
  `hinhanh1` text DEFAULT NULL COMMENT 'Hình ảnh 1 của sản phẩm',
  `hinhanh2` text DEFAULT NULL COMMENT 'Hình ảnh 2 của sản phẩm',
  `hinhanh3` text DEFAULT NULL COMMENT 'Hình ảnh 3 của sản phẩm',
  `bosuutap` text NOT NULL COMMENT 'nằm trong bộ sưu tập nào, nếu có',
  `mota` text NOT NULL COMMENT 'mô tả sản phẩm',
  `luotmua` int(11) NOT NULL COMMENT 'Lượt mua sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='bản quản lý sản phẩm trong hệ thống';

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `size`, `loai`, `freeship`, `giaca`, `giaship`, `pt`, `giamgia`, `hinhanh1`, `hinhanh2`, `hinhanh3`, `bosuutap`, `mota`, `luotmua`) VALUES
('A01', 'Áo thun kẻ', 'M', 'Thun', 1, 99000, 0, 'Tiền Mặt', 0.25, 'images/aothunke1.png', 'images/aothunke2.png', 'images/aothunke3.png', '🌸ĐÓN XUÂN🌸', 'Suit_able - Áo thun kẻ\n\nChất liệu: Cotton - Phiên bản bề mặt vải không đổ lông mang cảm giác thoáng mát\n\n- Kích cỡ: M/XL\n\n- Màu sắc: có hai màu đen/xanh lá\n\n\n\nBảng size\n\n- Sản phẩm được may theo thông số tiêu chuẩn tương đối của người Việt Nam.\n\n- Nếu bạn đang cân nhắc giữa hai kích cỡ, nên chọn kích cỡ lớn hơn.\n\n+ Kích cỡ M: Chiều cao từ 1m65 - 1m72, cân nặng dưới 65kg\n\n+ Kích cỡ XL: Chiều cao trên 1m72, cân nặng dưới 95kg.', 2),
('A02', 'Áo thun cổ tim', 'L', 'Thun', 0, 199000, 15000, 'Tiền Mặt', 0, 'images/aothuncotim1.png', 'images/aothuncotim2.png', 'images/aothuncotim3.png', '🌸ĐÓN XUÂN🌸', 'Suit_able - Áo thun cổ tim\n\nChất liệu: Cotton - Phiên bản bề mặt vải không đổ lông mang cảm giác thoáng mát\r\n- Kích cỡ: L/XL\r\n- Kích cỡ: Đen/Xanh dương\r\n\r\nBảng size\r\n- Sản phẩm được may theo thông số tiêu chuẩn tương đối của người Việt Nam.\r\n- Nếu bạn đang cân nhắc giữa hai kích cỡ, nên chọn kích cỡ lớn hơn.\r\n+ Kích cỡ L: Chiều cao từ 1m70 - 1m77, cân nặng dưới 80kg\r\n+ Kích cỡ XL: Chiều cao trên 1m72, cân nặng dưới 95kg.', 15),
('A03', 'Áo thun nam có túi', 'S', 'Thun', 1, 250000, 0, 'Tiền Mặt', 0.25, 'images/aothunnamcotui1.png', 'images/aothunnamcotui2.png', 'images/aothunnamcotui3.png', '', 'Suit_able - Áo thun nam có túi \r\nVới điểm nhấn là chiếc túi khóa kéo trước ngực, đây sẽ là chuếc áo giúp bạn trở nên phá cách, thu hút mọi ánh nhìn\r\nChất liệu: Cotton - Phiên bản bề mặt vải không đổ lông mang cảm giác thoáng mát\r\n- Kích cỡ: S/M/XL\r\n- Kích cỡ: Đen\r\n\r\nBảng size\r\n- Sản phẩm được may theo thông số tiêu chuẩn tương đối của người Việt Nam.\r\n- Nếu bạn đang cân nhắc giữa hai kích cỡ, nên chọn kích cỡ lớn hơn.\r\n\r\n+ Kích cỡ S: Chiều cao từ 1m50 - 1m65, cân nặng trên 55kg\r\n+ Kích cỡ M: Chiều cao từ 1m65 - 1m72, cân nặng dưới 65kg\r\n+ Kích cỡ XL: Chiều cao trên 1m72, cân nặng dưới 95kg.', 4),
('Q01', 'Quần short  kaki', 'XL', 'Short', 1, 145000, 0, 'Tiền Mặt', 0.25, 'images/quanshortkaki1.png', 'images/quanshortkaki2.png', 'images/quanshortkaki3.png', '☁️MÙA HÈ KHÔNG NÓNG☀️', 'Suit_able - Quần short kaki\r\nCòn gì tuyệt vời hơn khi mặc một chiếc quần short vào mùa hè oi bức\r\nChất liệu: vải kaki - Phiên bản bề mặt vải không đổ lông mang cảm giác thoáng mát\r\n- Kích cỡ: M/L/XL\r\n- Kích cỡ: Đen/Xanh dương\r\n\r\nBảng size\r\n- Sản phẩm được may theo thông số tiêu chuẩn tương đối của người Việt Nam.\r\n- Nếu bạn đang cân nhắc giữa hai kích cỡ, nên chọn kích cỡ lớn hơn.\r\n\r\n+ Kích cỡ M: Chiều cao từ 1m65 - 1m72, cân nặng dưới 65kg\r\n+ Kích cỡ L: Chiều cao từ 1m70 - 1m77, cân nặng dưới 80kg\r\n+ Kích cỡ XL: Chiều cao trên 1m72, cân nặng dưới 95kg.', 8),
('Q03', 'Quần short ngắn trên đầu gối', 'XL', 'Short', 1, 222000, 0, 'Tiền Mặt', 0.25, 'images/quanshortngantrendaugoi1.png', 'images/quanshortngauntrendaugoi2.png', 'images/quanshortngauntrendaugoi3.png', '☁️MÙA HÈ KHÔNG NÓNG☀️', 'Suit_able - Quần short ngắn trên đầu gối\r\nChất liệu: Cotton - Phiên bản bề mặt vải không đổ lông mang cảm giác thoáng mát\r\n- Kích cỡ: S/L/XL\r\n- Kích cỡ: Đen\r\n\r\nBảng size\r\n- Sản phẩm được may theo thông số tiêu chuẩn tương đối của người Việt Nam.\r\n- Nếu bạn đang cân nhắc giữa hai kích cỡ, nên chọn kích cỡ lớn hơn.\r\n\r\n+ Kích cỡ S: Chiều cao từ 1m50 - 1m65, cân nặng trên 55kg\r\n+ Kích cỡ L: Chiều cao từ 1m70 - 1m77, cân nặng dưới 80kg\r\n+ Kích cỡ XL: Chiều cao trên 1m72, cân nặng dưới 95kg.', 7),
('A04', 'Áo sweater lửa', 'L', 'Sweater', 1, 99000, 0, 'Tiền Mặt', 0, 'images/aosweaterlua1.png', 'images/aosweaterlua2.png', 'images/aosweaterlua3.png', '', 'Suit_able - Áo sweater lửa\r\nChất liệu: Cotton - Phiên bản bề mặt vải có đổ lông mang cảm giác ấm áp, giữ nhiệt cơ thể\r\n- Kích cỡ: M/L/XL\r\n- Kích cỡ: Đen/Trắng\r\n\r\nBảng size\r\n- Sản phẩm được may theo thông số tiêu chuẩn tương đối của người Việt Nam.\r\n- Nếu bạn đang cân nhắc giữa hai kích cỡ, nên chọn kích cỡ lớn hơn.\r\n\r\n+ Kích cỡ M: Chiều cao từ 1m65 - 1m72, cân nặng dưới 65kg\r\n+ Kích cỡ L: Chiều cao từ 1m70 - 1m77, cân nặng dưới 80kg\r\n+ Kích cỡ XL: Chiều cao trên 1m72, cân nặng dưới 95kg.', 15),
('A05', 'Áo sweater lông cừu', 'L', 'Sweater', 0, 199000, 29000, 'Tiền Mặt', 0, 'images/aosweaterlongcuu1.png', 'images/aosweaterlongcuu2.png', 'images/aosweaterlongcuu3.png', '🌝RỰC RỠ TRĂNG THU🏮', 'Suit_able - Áo sweater lông cừu\r\nChất liệu: Lông cừu\r\n- Kích cỡ: M/L\r\n- Kích cỡ: Đen/Trắng\r\n\r\nLưu ý:\r\nKhông nên giặc sản phẩm bằng máy giặc, nên giặc bằng tay để tránh làm hỏng áo\r\n\r\nBảng size\r\n- Sản phẩm được may theo thông số tiêu chuẩn tương đối của người Việt Nam.\r\n- Nếu bạn đang cân nhắc giữa hai kích cỡ, nên chọn kích cỡ lớn hơn.\r\n\r\n+ Kích cỡ M: Chiều cao từ 1m65 - 1m72, cân nặng dưới 65kg\r\n+ Kích cỡ L: Chiều cao từ 1m70 - 1m77, cân nặng dưới 80kg', 8),
('A06', 'Áo sweater dày', 'XL', 'Sweater', 1, 250000, 0, 'Tiền Mặt', 0, 'images/aosweaterday1.png', 'images/aosweaterday2.png', 'images/aosweaterday3.png', '', 'Suit_able - Áo sweater dày\r\n\r\nChất liệu: Cotton nỉ - Phiên bản bề mặt vải có đổ lông giúp giữ nhiệt, làm ấm\r\n- Kích cỡ: L/XL\r\n- Màu sắc: Đen/Xanh lá\r\n\r\n\r\nBảng size\r\n- Sản phẩm được may theo thông số tiêu chuẩn tương đối của người Việt Nam.\r\n- Nếu bạn đang cân nhắc giữa hai kích cỡ, nên chọn kích cỡ lớn hơn.\r\n\r\n+ Kích cỡ L: Chiều cao từ 1m70 - 1m77, cân nặng dưới 80kg\r\n+ Kích cỡ XL: Chiều cao trên 1m72, cân nặng dưới 95kg.', 3),
('Q04', 'Quần jogger jean', 'L', 'Jogger', 0, 167000, 28000, 'Tiền Mặt', 0, 'images/quanjoggerjean1.png', 'images/quanjoggerjean2.png', 'images/quanjoggerjean3.png', '', 'Suit_able - Quần jogger jean\r\n\r\nChất liệu: Suit_able ORIGINAL - Phiên bản bề mặt vải không đổ lông mang cảm giác thoáng mát\r\n\r\n- Suit_able Original không lông được áp dụng cho toàn bộ sản phẩm quần Jogger\r\n\r\n- Kích cỡ: M/L/XXL\r\n- Màu sắc: Xanh\r\nBảng size\r\n- Sản phẩm được may theo thông số tiêu chuẩn tương đối của người Việt Nam.\r\n- Nếu bạn đang cân nhắc giữa hai kích cỡ, nên chọn kích cỡ lớn hơn.\r\n\r\n\r\n+ Kích cỡ M: Chiều cao từ 1m65 - 1m72, cân nặng dưới 65kg\r\n\r\n+ Kích cỡ L: Chiều cao từ 1m70 - 1m77, cân nặng dưới 80kg\r\n\r\n+ Kích cỡ XXL: Chiều cao trên 1m72, cân nặng dưới 95kg.', 7),
('Q05', 'Quần jogger trơn', 'L', 'Jogger', 1, 112000, 0, 'Tiền Mặt', 0, 'images/quanjoggertron1.png', 'images/quanjoggertron2.png', 'images/quanjoggertron3.png', '🌝RỰC RỠ TRĂNG THU🏮', 'Suit_able - Quần jogger trơn\r\n\r\nChất liệu: Suit_able ORIGINAL - Phiên bản bề mặt vải không đổ lông mang cảm giác thoáng mát\r\n\r\n- Suit_able Original không lông được áp dụng cho toàn bộ sản phẩm quần Jogger\r\n\r\n- Kích cỡ: S/L/XL\r\n- Màu sắc: Đen\r\nBảng size\r\n- Sản phẩm được may theo thông số tiêu chuẩn tương đối của người Việt Nam.\r\n- Nếu bạn đang cân nhắc giữa hai kích cỡ, nên chọn kích cỡ lớn hơn.\r\n\r\n+ Kích cỡ S: Chiều cao từ 1m50 - 1m65, cân nặng trên 55kg\r\n\r\n\r\n+ Kích cỡ L: Chiều cao từ 1m70 - 1m77, cân nặng dưới 80kg\r\n\r\n+ Kích cỡ XL: Chiều cao trên 1m72, cân nặng dưới 95kg.', 13),
('Q06', 'Quần jogger thun', 'L', 'Jogger', 1, 132000, 0, 'Tiền Mặt', 0, 'images/quanjoggerthun1.png', 'images/quanjoggerthun2.png', 'images/quanjoggerthun3.png', '', 'Suit_able - Quần jogger thun\r\n\r\nChất liệu: Suit_able ORIGINAL - Phiên bản bề mặt vải không đổ lông mang cảm giác thoáng mát\r\n\r\n- Suit_able Original không lông được áp dụng cho toàn bộ sản phẩm quần Jogger\r\n\r\n- Kích cỡ: L/XL\r\n- Màu sắc: Đen/Trắng\r\nBảng size\r\n- Sản phẩm được may theo thông số tiêu chuẩn tương đối của người Việt Nam.\r\n- Nếu bạn đang cân nhắc giữa hai kích cỡ, nên chọn kích cỡ lớn hơn.\r\n\r\n+ Kích cỡ L: Chiều cao từ 1m70 - 1m77, cân nặng dưới 80kg\r\n\r\n+ Kích cỡ XL: Chiều cao trên 1m72, cân nặng dưới 95kg.', 11),
('A07', 'Slim-Fit', 'L', 'POLO', 1, 189000, 0, 'Tiền Mặt', 0, 'images/slim-fit1.png', 'images/slim-fit2.png', 'images/slim-fit3.png', '☁️MÙA HÈ KHÔNG NÓNG☀️', 'Suit_able - Polo Slim-Fit\r\n\r\nChất liệu: Cotton - Phiên bản bề mặt vải không đổ lông mang cảm giác thoáng mát\r\n\r\n- Kích cỡ: M/L/XXL\r\n- Màu sắc: Hông\r\nBảng size\r\n- Sản phẩm được may theo thông số tiêu chuẩn tương đối của người Việt Nam.\r\n- Nếu bạn đang cân nhắc giữa hai kích cỡ, nên chọn kích cỡ lớn hơn.\r\n\r\n+ Kích cỡ L: Chiều cao từ 1m65 - 1m72, cân nặng dưới 65kg\r\n\r\n+ Kích cỡ XL: Chiều cao từ 1m70 - 1m77, cân nặng dưới 80kg\r\n\r\n+ Kích cỡ XXL: Chiều cao trên 1m72, cân nặng dưới 95kg.', 6),
('A08', 'Regular-Fit', 'M', 'POLO', 0, 123000, 12000, 'Tiền Mặt', 0, 'images/regular-fit1.png', 'images/regular-fit2.png', 'images/regular-fit3.png', '☁️MÙA HÈ KHÔNG NÓNG☀️', 'Suit_able - Polo Regular-Fit\r\n\r\nChất liệu: Cotton - Phiên bản bề mặt vải không đổ lông mang cảm giác thoáng mát\r\n\r\n- Kích cỡ: M/XL\r\n- Màu sắc: Đen/Trắng\r\nBảng size\r\n- Sản phẩm được may theo thông số tiêu chuẩn tương đối của người Việt Nam.\r\n- Nếu bạn đang cân nhắc giữa hai kích cỡ, nên chọn kích cỡ lớn hơn.\r\n\r\n+ Kích cỡ M: Chiều cao từ 1m65 - 1m72, cân nặng dưới 65kg\r\n+ Kích cỡ XL: Chiều cao trên 1m72, cân nặng dưới 95kg.', 4),
('A09', 'Áo polo cổ vải', 'XL', 'POLO', 1, 132000, 0, 'Tiền Mặt', 0, 'images/aopolocovai1.png', 'images/aopolocovai2.png', 'images/aopolocovai3.png', '☁️MÙA HÈ KHÔNG NÓNG☀️', 'Suit_able - Áo polo cổ vải\r\n\r\nChất liệu: Cotton - Phiên bản bề mặt vải không đổ lông mang cảm giác thoáng mát\r\n\r\n- Kích cỡ: M/L/XL\r\n- Màu sắc: Trắng/Xám\r\nBảng size\r\n- Sản phẩm được may theo thông số tiêu chuẩn tương đối của người Việt Nam.\r\n- Nếu bạn đang cân nhắc giữa hai kích cỡ, nên chọn kích cỡ lớn hơn.\r\n\r\n+ Kích cỡ M: Chiều cao từ 1m65 - 1m72, cân nặng dưới 65kg\r\n\r\n+ Kích cỡ L: Chiều cao từ 1m70 - 1m77, cân nặng dưới 80kg\r\n\r\n+ Kích cỡ XL: Chiều cao trên 1m72, cân nặng dưới 95kg.', 7),
('Q07', 'Quần Short', 'L', 'Short', 1, 132000, 0, 'Tiền Mặt', 0, 'images/quanshort1.png', 'images/quanshort2.png', 'images/quanshort3.png', '☁️MÙA HÈ KHÔNG NÓNG☀️', 'Suit_able - Quần short\r\n\r\nChất liệu: Suit_able ORIGINAL - Phiên bản bề mặt vải không đổ lông mang cảm giác thoáng mát\r\n\r\n- Kích cỡ: S/M/L\r\n- Màu sắc: Đen/Nâu\r\nBảng size\r\n- Sản phẩm được may theo thông số tiêu chuẩn tương đối của người Việt Nam.\r\n- Nếu bạn đang cân nhắc giữa hai kích cỡ, nên chọn kích cỡ lớn hơn.\r\n\r\n+ Kích cỡ S: Chiều cao từ 1m50 - 1m65, cân nặng trên 55kg\r\n\r\n+ Kích cỡ M: Chiều cao từ 1m65 - 1m72, cân nặng dưới 65kg\r\n\r\n+ Kích cỡ L: Chiều cao từ 1m70 - 1m77, cân nặng dưới 80kg', 2),
('A10', 'Sơ mi trắng', 'M', 'Sơ Mi', 1, 222000, 0, 'Tiền Mặt', 0.25, 'images/somitrang1.png', 'images/somitrang2.png', 'images/somitrang3.png', '🌸ĐÓN XUÂN🌸', 'Suit_able - Sơ mi Trắng\r\n\r\nChất liệu: Cotton - Phiên bản bề mặt vải không đổ lông mang cảm giác thoáng mát\r\n\r\n- Kích cỡ: S/M/L\r\n- Màu sắc: Trắng\r\nBảng size\r\n- Sản phẩm được may theo thông số tiêu chuẩn tương đối của người Việt Nam.\r\n- Nếu bạn đang cân nhắc giữa hai kích cỡ, nên chọn kích cỡ lớn hơn.\r\n\r\n+ Kích cỡ S: Chiều cao từ 1m50 - 1m65, cân nặng trên 55kg\r\n\r\n+ Kích cỡ M: Chiều cao từ 1m65 - 1m72, cân nặng dưới 65kg\r\n\r\n+ Kích cỡ L: Chiều cao từ 1m70 - 1m77, cân nặng dưới 80kg', 14),
('A11', 'Sơ mi kẻ sọc lịch lãm', 'XL', 'Sơ Mi', 0, 122000, 8000, 'Tiền Mặt', 0.25, 'images/somikesoclichlam1.png', 'images/somikesoclichlam2.png', 'images/somikesoclichlam3.png', '🌸ĐÓN XUÂN🌸', 'Suit_able - Sơ mi kẻ sục lịch lãm\r\n\r\nChất liệu: Cotton - Phiên bản bề mặt vải không đổ lông mang cảm giác thoáng mát\r\n\r\n- Kích cỡ: XL/XXL\r\n- Màu sắc: Trắng/Đen/Xanh dương\r\nBảng size\r\n- Sản phẩm được may theo thông số tiêu chuẩn tương đối của người Việt Nam.\r\n- Nếu bạn đang cân nhắc giữa hai kích cỡ, nên chọn kích cỡ lớn hơn.\r\n\r\n+ Kích cỡ XL: Chiều cao từ 1m70 - 1m77, cân nặng dưới 80kg\r\n\r\n+ Kích cỡ XXL: Chiều cao trên 1m72, cân nặng dưới 95kg.', 4),
('A12', 'Sơ mi Dress Shirt', 'S', 'Sơ Mi', 0, 155000, 9000, 'Tiền Mặt', 0.25, 'images/somidressshirt1.png', 'images/somidressshirt2.png', 'images/somidressshirt3.png', '🌸ĐÓN XUÂN🌸', 'Suit_able - Sơ mi dress shirt\r\n\r\nChất liệu: Cotton - Phiên bản bề mặt vải không đổ lông mang cảm giác thoáng mát\r\n\r\n- Kích cỡ: S/M/XXL\r\n- Màu sắc: Be\r\nBảng size\r\n- Sản phẩm được may theo thông số tiêu chuẩn tương đối của người Việt Nam.\r\n- Nếu bạn đang cân nhắc giữa hai kích cỡ, nên chọn kích cỡ lớn hơn.\r\n\r\n+ Kích cỡ S: Chiều cao từ 1m50 - 1m65, cân nặng trên 55kg\r\n\r\n+ Kích cỡ M: Chiều cao từ 1m65 - 1m72, cân nặng dưới 65kg\r\n\r\n+ Kích cỡ XL: Chiều cao trên 1m72, cân nặng dưới 95kg.', 2),
('A13', 'Sơ mi cổ Cuba', 'L', 'Sơ Mi', 1, 160000, 0, 'Tiền Mặt', 0.25, 'images/somicocuba1.png', 'images/somicocuba2.png', 'images/somicocuba3.png', '🌸ĐÓN XUÂN🌸', 'Suit_able - Sơ mi cổ cuba\r\n\r\nChất liệu: Cotton - Phiên bản bề mặt vải không đổ lông mang cảm giác thoáng mát\r\n\r\n- Kích cỡ: S/L/XL\r\n- Màu sắc: Đen\r\nBảng size\r\n- Sản phẩm được may theo thông số tiêu chuẩn tương đối của người Việt Nam.\r\n- Nếu bạn đang cân nhắc giữa hai kích cỡ, nên chọn kích cỡ lớn hơn.\r\n\r\n+ Kích cỡ S: Chiều cao từ 1m50 - 1m65, cân nặng trên 55kg\r\n\r\n+ Kích cỡ L: Chiều cao từ 1m70 - 1m77, cân nặng dưới 80kg\r\n\r\n+ Kích cỡ XL: Chiều cao trên 1m72, cân nặng dưới 95kg.', 13);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `tendangnhap` varchar(30) NOT NULL COMMENT 'tên đăng nhập',
  `matkhau` varchar(15) NOT NULL COMMENT 'mật khẩu',
  `quyenhan` int(1) NOT NULL COMMENT 'Admin là 1, user là 2',
  `ten` varchar(50) NOT NULL COMMENT 'Họ tên người dùng',
  `diachi` varchar(100) NOT NULL COMMENT 'địa chỉ người dùng',
  `sdt` varchar(14) NOT NULL COMMENT 'số điện thoại người dùng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`tendangnhap`, `matkhau`, `quyenhan`, `ten`, `diachi`, `sdt`) VALUES
('', '', 2, '', '', ''),
('abc', 'asdfg', 2, 'Khoadeptrai1', 'tp Hồ Chí Minh', '0947464454'),
('ADMIN', 'ADMIN', 1, 'Quan Ly', 'Quận 12', '09xxxxxx'),
('nguoidung', '12345', 2, 'Khoadeptrai', 'tp Hồ Chí Minh', '0947464454'),
('phuong', '1234', 2, 'phuong', 'quận 12', '0869801744'),
('tester', '123', 1, 'tester', 'Quận BT', '08xxxxxxxx'),
('user1', 'user1', 2, 'Khoa bảnh bao', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_donhang`
--

CREATE TABLE `tb_donhang` (
  `ID_DonHang` int(5) NOT NULL,
  `tentaikhoan` text NOT NULL COMMENT 'tentaikhoan',
  `tenKhachHang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diaChi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `SDT` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sanPham` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `soLuong` int(11) NOT NULL,
  `size` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mausac` varchar(50) NOT NULL,
  `ngaylap` date NOT NULL,
  `tien` int(11) NOT NULL,
  `trangthai` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_donhang`
--

INSERT INTO `tb_donhang` (`ID_DonHang`, `tentaikhoan`, `tenKhachHang`, `diaChi`, `SDT`, `sanPham`, `soLuong`, `size`, `mausac`, `ngaylap`, `tien`, `trangthai`) VALUES
(82, '', '3434', '3434', '3434', 'Áo thun cổ tim', 2, 'M', '', '2023-08-06', 398000, 'Chờ duyệt'),
(84, '', 'ADMIN', 'Quận 12', '09xxxxxx', 'Áo thun cổ tim', 2, 'M', 'Trắng', '2023-08-06', 398000, 'Chờ duyệt'),
(85, '', 'ADMIN', 'Quận 12', '09xxxxxx', 'Áo thun cổ tim', 2, 'L', 'Trắng', '2023-08-06', 398000, 'Chờ duyệt'),
(87, '', 'phuong', 'quận 12', '0869801744', 'Áo sweater lông cừu', 2, 'L', 'Đen', '2023-08-06', 398000, 'Chờ duyệt'),
(88, '', 'phuong', 'quận 12', '0869801744', 'Áo polo cổ vải', 1, 'L', 'Trắng', '2023-08-06', 132000, 'Chờ duyệt'),
(89, '', 'phuong', 'quận 12', '0869801744', 'Áo polo cổ vải', 2, 'L', 'Đen', '2023-08-06', 264000, 'Chờ duyệt'),
(90, '', '', '', '', 'Áo thun cổ tim', 2, 's', 'Trắng', '2023-08-06', 398000, 'Chờ duyệt'),
(91, '', '', '', '', 'Áo sweater lửa', 1, 's', 'Trắng', '2023-08-06', 99000, 'Chờ duyệt'),
(92, '', 'phuong', 'quận 12', '0869801744', 'Áo polo cổ vải', 1, 's', 'Trắng', '2023-08-06', 132000, 'Chờ duyệt'),
(93, '', '', '', '', 'Sơ mi cổ Cuba', 3, 's', 'Đen', '2023-08-06', 480000, 'Chờ duyệt'),
(94, '', 'Khoadeptrai', 'tp Hồ Chí Minh', '0947464454', 'Quần short  kaki', 2, 's', 'Trắng', '2023-08-07', 290000, 'Chờ duyệt'),
(95, '', 'Khoadeptrai', 'tp Hồ Chí Minh', '0947464454', 'Áo polo cổ vải', 3, 'L', 'Đen', '2023-08-08', 396000, 'Chờ duyệt'),
(96, '', 'Khoadeptrai', 'tp Hồ Chí Minh', '0947464454', 'Áo polo cổ vải', 1, 's', 'Trắng', '2023-08-08', 132000, 'Chờ duyệt'),
(97, '', 'Khoadeptrai', 'tp Hồ Chí Minh', '0947464454', 'Quần jogger trơn', 4, 'XL', 'Đen', '2023-08-08', 448000, 'Chờ duyệt'),
(98, '', 'Khoadeptrai', 'tp Hồ Chí Minh', '0947464454', 'Slim-Fit', 1, 'XL', 'Đen', '2023-08-08', 189000, 'Chờ duyệt'),
(99, '', 'Khoadeptrai', 'tp Hồ Chí Minh', '0947464454', 'Áo polo cổ vải', 1, 'M', 'Đen', '2023-08-08', 132000, 'Chờ duyệt'),
(100, '', 'Khoadeptrai', 'tp Hồ Chí Minh', '0947464454', 'Áo thun cổ tim', 2, 'L', 'Đen', '2023-08-08', 398000, 'Chờ duyệt'),
(101, '', 'Khoadeptrai', 'tp Hồ Chí Minh', '0947464454', 'Sơ mi Dress Shirt', 1, 'XL', 'Đen', '2023-08-08', 155000, 'Chờ duyệt'),
(102, '', 'Khoadeptrai', 'tp Hồ Chí Minh', '0947464454', 'Sơ mi kẻ sọc lịch lãm', 3, 'XL', 'Đen', '2023-08-08', 366000, 'Chờ duyệt'),
(103, '', 'Khoadeptrai', 'tp Hồ Chí Minh', '0947464454', 'Quần jogger trơn', 3, 'L', 'Đen', '2023-08-08', 336000, 'Chờ duyệt'),
(104, '', 'Khoadeptrai', 'tp Hồ Chí Minh', '0947464454', 'Quần Short', 3, 'M', 'Đen', '2023-08-08', 396000, 'Chờ duyệt'),
(105, '', 'Khoadeptrai', 'tp Hồ Chí Minh', '0947464454', 'Quần Short', 2, 'XL', 'Đen', '2023-08-08', 264000, 'Chờ duyệt'),
(106, '', 'Khoaaaa ma đạo', 'tp Hồ Chí Minh', '0133344455', 'Quần jogger thun', 3, 'XL', 'Đen', '2023-08-08', 396000, 'Chờ duyệt'),
(107, '', 'Mai Khoa', 'tp Hồ Chí Minh', '0932235423', 'Regular-Fit', 4, 'XL', 'Đen', '2023-08-08', 492000, 'Chờ duyệt'),
(108, '', 'Mai Đăng Khoa', 'quận 12, tp Hồ Chí Minh', '0947464555', 'Quần jogger trơn', 3, 'XL', 'Đen', '2023-08-08', 336000, 'Chờ duyệt'),
(109, '', 'Mai Đăng Khoa', 'quận 12, tp Hồ Chí Minh', '0947464555', 'Quần jogger thun', 2, 'L', 'Đen', '2023-08-08', 264000, 'Chờ duyệt'),
(110, '', 'Mai Yến', 'tp Hồ Chí Minh', '0947464454', 'Quần jogger trơn', 9, 'M', 'Đen', '2023-08-08', 1008000, 'Chờ duyệt'),
(111, '', 'Anh ba miền tây', 'tp Hồ Chí Minh', '0947464454', 'Quần short ngắn trên đầu gối', 4, 'XL', 'Đen', '2023-08-08', 888000, 'Chờ duyệt'),
(112, '', 'Khoa điên', 'tp Hồ Chí Minh', '0947464454', 'Regular-Fit', 3, 'XL', 'Đen', '2023-08-08', 369000, 'Chờ duyệt'),
(113, '', 'Mai Khoa', 'tp Hồ Chí Minh', '0947464454', 'Áo thun kẻ', 3, 'L', 'Đen', '2023-08-08', 297000, 'Chờ duyệt'),
(114, '', 'Mai Khoa', 'tp Hồ Chí Minh', '0947464454', 'Áo thun cổ tim', 2, 'M', 'Đen', '2023-08-08', 398000, 'Chờ duyệt'),
(115, '', 'Mai Khoa', 'tp Hồ Chí Minh', '0947464454', 'Quần jogger thun', 2, 'M', 'Đen', '2023-08-08', 264000, 'Chờ duyệt'),
(116, '', 'Mai Khoa', 'tp Hồ Chí Minh', '0947464454', 'Sơ mi cổ Cuba', 3, 'XL', 'Đen', '2023-08-08', 480000, 'Chờ duyệt'),
(117, '', 'Khoadeptrai', 'tp Hồ Chí Minh', '0947464454', 'Sơ mi cổ Cuba', 3, 'M', 'Đen', '2023-08-08', 480000, 'Chờ duyệt'),
(118, '', 'Khoadeptrai', 'tp Hồ Chí Minh', '0947464454', 'Quần jogger thun', 2, 'M', 'Đen', '2023-08-08', 264000, 'Chờ duyệt'),
(119, '', 'Khoadeptrai', 'tp Hồ Chí Minh', '0947464454', 'Sơ mi cổ Cuba', 2, 'L', 'Đen', '2023-08-08', 320000, 'Chờ duyệt'),
(120, '', 'Khoadeptrai', 'tp Hồ Chí Minh', '0947464454', 'Sơ mi kẻ sọc lịch lãm', 2, 'M', 'Đen', '2023-08-09', 183000, 'Chờ duyệt'),
(121, '', 'MaiKHOAAAAAAAA', 'tp Hồ Chí Minh', '0947464454', 'Sơ mi kẻ sọc lịch lãm', 10, 'M', 'Đen', '2023-08-09', 915000, 'Chờ duyệt'),
(122, '', 'MAI KHOAAAAAAA', 'tp Hồ Chí Minh', '0947464454', 'Sơ mi trắng', 10, 'M', 'Đen', '2023-08-09', 1665000, 'Chờ duyệt'),
(123, '', 'KHOAAAAAAAA', 'tp Hồ Chí Minh', '0947464454', 'Sơ mi kẻ sọc lịch lãm', 10, 'M', 'Đen', '2023-08-09', 1220000, 'Chờ duyệt'),
(124, '', 'ádfghjkấdfghjhgdsdf', 'tp Hồ Chí Minh', '0947464454', 'Áo polo cổ vải', 10, 'M', 'Đen', '2023-08-09', 1320000, 'Chờ duyệt'),
(125, '', 'Khoadeptrai', 'tp Hồ Chí Minh', '0947464454', 'Quần jogger thun', 10, 'M', 'Đen', '2023-08-09', 1320000, 'Chờ duyệt'),
(126, '', 'Khoaaaaaaaaaaa', 'tp Hồ Chí Minh', '0947464454', 'Sơ mi kẻ sọc lịch lãm', 10, 'M', 'Đen', '2023-08-09', 915000, 'Chờ duyệt'),
(127, '', 'KOOO', 'tp Hồ Chí Minh', '0947464454', 'Sơ mi trắng', 10, 'XL', 'Đen', '2023-08-09', 1665000, 'Chờ duyệt'),
(128, '', 'Mai Khooooaaaa', 'tp Hồ Chí Minh', '0947464454', 'Quần short ngắn trên đầu gối', 10, 'M', 'Đen', '2023-08-09', 1665000, 'Chờ duyệt'),
(129, '', 'Mai KHOAAA', 'tp Hồ Chí Minh', '0947464454', 'Quần short  kaki', 10, 'L', 'Đen', '2023-08-09', 1087500, 'Chờ duyệt'),
(130, '', 'KHOAAAAA', 'tp Hồ Chí Minh', '0947464454', 'Quần short  kaki', 10, 'XL', 'Đen', '2023-08-09', 1087500, 'Chờ duyệt'),
(131, '', 'KHOAAAAAAAA', 'tp Hồ Chí Minh', '0947464454', 'Sơ mi kẻ sọc lịch lãm', 10, 'M', 'Đen', '2023-08-09', 915000, 'Chờ duyệt'),
(140, '', 'Khoa133', 'tp Hồ Chí Minh', '0947464454', 'Quần short ngắn trên đầu gối', 3, 'M', 'Đen', '2023-08-09', 666000, 'Chờ duyệt'),
(141, '', 'Khoa133', 'tp Hồ Chí Minh', '0947464454', 'Quần jogger jean', 2, 'M', 'Đen', '2023-08-09', 334000, 'Chờ duyệt'),
(142, '', 'Khoakungfu', 'tp Hồ Chí Minh', '0947464454', 'Quần short ngắn trên đầu gối', 4, 'L', 'Đen', '0000-00-00', 888000, 'Chờ duyệt'),
(143, '', 'Khoasiêuđẳng', 'tp Hồ Chí Minh', '0947464454', 'Sơ mi kẻ sọc lịch lãm', 5, 'M', 'Đen', '2023-08-09', 457500, 'Chờ duyệt'),
(144, 'nguoidung', 'Khoadeptrai', 'tp Hồ Chí Minh', '0947464454', 'Quần short ngắn trên đầu gối', 5, 'XX', 'Đen', '2023-08-09', 832500, 'Chờ duyệt'),
(145, 'nguoidung', 'Khoa sống đẹp', 'tp Hồ Chí Minh', '0947464454', 'Sơ mi kẻ sọc lịch lãm', 10, 'M', 'Đen', '2023-08-10', 915000, 'Chờ duyệt');

-- --------------------------------------------------------

--
-- Table structure for table `tb_giohang`
--

CREATE TABLE `tb_giohang` (
  `id` int(11) NOT NULL,
  `MaGioHang` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `masp` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `Size` varchar(50) NOT NULL,
  `mausac` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `taiKhoanID` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`tendangnhap`);

--
-- Indexes for table `tb_donhang`
--
ALTER TABLE `tb_donhang`
  ADD PRIMARY KEY (`ID_DonHang`) USING BTREE;

--
-- Indexes for table `tb_giohang`
--
ALTER TABLE `tb_giohang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã số bình luận', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_donhang`
--
ALTER TABLE `tb_donhang`
  MODIFY `ID_DonHang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `tb_giohang`
--
ALTER TABLE `tb_giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
