-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 08, 2024 lúc 08:55 AM
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
-- Cơ sở dữ liệu: `project_mvc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `avatar`, `description`, `status`, `created_at`, `updated_at`) VALUES
(20, 'Điện thoại', '1654851149-danh-muc-phone.jpg', '<p>Điện thoại ch&iacute;nh h&atilde;ng nguy&ecirc;n seal đảm bảo chắt lượng</p>\r\n', 1, '2023-06-10 01:52:29', '2023-06-10 15:52:29'),
(21, 'Tai nghe', '1654851225-banner-phu-3.jpg', '<p>Tai nghe gi&aacute; rẻ, chất lượng &acirc;m thanh tuyệt vời</p>\r\n', 1, '2023-06-10 01:53:45', '2023-06-10 15:53:45'),
(22, 'Đồng hồ thông minh', '1654851266-banner-phu-4.jpg', '<p>Đồng hồ th&ocirc;ng minh l&agrave; phụ kiện kh&ocirc;ng thể thiếu với một t&iacute;n đồ c&ocirc;ng nghệ</p>\r\n', 1, '2023-06-10 01:54:26', '2023-06-10 15:54:26'),
(23, 'Sạc dự phòng', '1654852224-sac-du-phong-1.jpg', '<p>Sạc dự ph&ograve;ng si&ecirc;u re, si&ecirc;u tr&acirc;u.</p>\r\n', 1, '2023-06-10 02:10:24', '2023-06-10 16:10:24'),
(24, 'Máy tính', '1654852711-macbook-pro-2021.png', '<p>M&aacute;y t&iacute;nh hiện đại, sang trọng</p>\r\n', 1, '2023-06-10 02:18:31', '2023-06-10 16:18:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `maps`
--

CREATE TABLE `maps` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `hotline` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `map_url` varchar(255) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `maps`
--

INSERT INTO `maps` (`id`, `title`, `hotline`, `fax`, `email`, `summary`, `map_url`, `status`, `created_at`, `updated_at`) VALUES
(2, 'CÔNG TY CỔ PHẦN DỊCH VỤ THƯƠNG MẠI MINH AN GROUP', '092 181 9999', '1800 6321', '', 'Văn phòng giao dịch và Showroom: 91 Nguyễn Xiển, Phường Hạ Đình, Quận Thanh Xuân, TP. Hà Nội\r\n\r\nHotline: 092 181 9999 – Tổng đài miễn phí: 1800 6321\r\n\r\n*Mặt tiền có chỗ đậu ô tô, xe máy rộng rãi và hoàn toàn miễn phí. Có bảo vệ trông xe, đảm bảo an ninh t', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3619.119088552117!2d105.80779173532078!3d20.985927934643236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad703f26693f%3A0x81cbff58cd3cadb2!2sMinh%20An%20Computer%20-%20Laptop%20', 0, '2024-05-08 06:22:00', '2024-05-08 13:37:58'),
(3, 'CÔNG TY CỔ PHẦN DỊCH VỤ THƯƠNG MẠI MINH AN GROUP', '0963 845 876', ' 1800 6321', '', 'CÔNG TY CỔ PHẦN DỊCH VỤ THƯƠNG MẠI MINH AN GROUP\r\n \r\n\r\nĐịa chỉ: 415A Đ. Trường Chinh, Phường 14, Quận Tân Bình, Thành phố Hồ Chí Minh\r\n\r\nHotline: 0963 845 876 - Mr. Thoại. Tổng đài miễn phí: 1800 6321 - nhánh 2\r\n\r\nFacebook Fanpage: https://www.facebook.co', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d244.947161492198!2d106.64068658377512!3d10.799470030514286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529afdb9a8bd1%3A0x7f5de91e4017834d!2sMinh%20An%20Computer%20HCM!5e0!3m2!1s', 0, '2024-05-08 06:24:35', '2024-05-08 13:24:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `status` tinyint(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `category_id`, `title`, `summary`, `avatar`, `content`, `status`, `created_at`, `updated_at`) VALUES
(6, 20, 'Đánh giá iPhone 13', 'iPhone 13 thiết kế vẫn vuông vức nhưng cụm camera sau độc lạ hơn. Xét về phong cách thiết kế, iPhone 13 năm nay vẫn sở hữu khung viền vuông vức giống như trên dòng iPhone 12 trước đó. Theo trải nghiệm của tác giả thì iPhone 13 vẫn mang lại cho người dùng ', '1654854525-product-banner-phu-1.jpg', '<h3>X&eacute;t về phong c&aacute;ch thiết kế, iPhone 13 năm nay vẫn sở hữu khung viền vu&ocirc;ng vức giống như tr&ecirc;n d&ograve;ng iPhone 12 trước đ&oacute;. Theo trải nghiệm của t&aacute;c giả th&igrave; iPhone 13 vẫn mang lại cho người d&ugrave;ng cảm gi&aacute;c cầm nắm thoải m&aacute;i v&agrave; chắc chắn. Ngo&agrave;i ra th&igrave; ở phần mặt sau v&agrave; mặt trước của iPhone 13 đều được trang bị một lớp k&iacute;nh nhưng chỉ c&oacute; phần mặt trước của m&aacute;y sẽ được trang bị lớp bảo vệ Ceramic Shield m&agrave; th&ocirc;i. Cụ thể th&igrave; lớp bảo vệ n&agrave;y gi&uacute;p mặt k&iacute;nh của chiếc iPhone 13 trở n&ecirc;n bền hơn, chống trầy xước v&agrave; nứt vỡ tốt hơn một ch&uacute;t so với thế hệ tiền nhiệm.</h3>\r\n', 1, '2023-06-10 02:48:45', '2023-06-10 16:55:26'),
(7, 20, 'Samsung Galaxy S22 Series có gì mới', 'Sau dòng Galaxy S21 thì Samsung đã ra mắt Galaxy S22 series trong sự kiện ngày 16/2 với giá khởi điểm từ 21.9 triệu. Bên cạnh những điểm nhấn về thiết kế, dòng Galaxy S22 cấu hình cực mạnh với Snapdragon 8 Gen 1 và đặc biệt là camera có nhiều cải tiến. Sa', '1654854741-new-banner-phu-2.jpeg', '<p>Đầu ti&ecirc;n, c&ugrave;ng m&igrave;nh điểm qua th&ocirc;ng số cấu h&igrave;nh của Galaxy S22 Ultra nh&eacute;.</p>\r\n\r\n<ul>\r\n	<li>M&agrave;n h&igrave;nh: Tấm nền Dynamic AMOLED 2X, k&iacute;ch thước 6.8 inch, độ ph&acirc;n giải QHD+ (3.088 x 1.440 pixel), mật độ điểm ảnh 500 ppi, k&iacute;nh cường lực Gorilla Glass Victus+.</li>\r\n	<li>Camera sau: 12 MP + 108 MP + 10 MP + 10 MP.</li>\r\n	<li>Camera trước: 40 MP.</li>\r\n	<li>CPU: Snapdragon 8 Gen 1.</li>\r\n	<li>RAM: 8 GB hoặc 12 GB.</li>\r\n	<li>Bộ nhớ trong: 128 GB, 256 GB v&agrave;, 512 GB.</li>\r\n	<li>Pin: 5.000 mAh, sạc nhanh 45 W, sạc ngược kh&ocirc;ng d&acirc;y.</li>\r\n	<li>Hệ điều h&agrave;nh: Android 12 (giao diện One UI 4.1)</li>\r\n</ul>\r\n', 1, '2023-06-10 02:52:09', '2023-06-10 16:54:46'),
(8, 20, 'Apple Watch Series 7 có gì mới?', 'Với Apple Watch Series 7, Apple đã loại bỏ tất cả những tin đồn và cung cấp một chiếc đồng hồ mới trông giống chiếc cũ một cách đáng kinh ngạc. Phần lớn Apple Watch Series 7 tương tự như năm ngoái, vì vậy bài đánh giá này sẽ tập trung vào tất cả những gì ', '1654855011-new-apple-watch.jpg', '<p>Rất may, Apple Watch Series 7 tu&acirc;n theo cấu tr&uacute;c gi&aacute; tương tự như Series 6. N&oacute; cũng c&oacute; sẵn từ tất cả c&aacute;c điểm nghi ngờ th&ocirc;ng thường ở tất cả c&aacute;c địa điểm th&ocirc;ng thường mỗi năm tr&ocirc;i qua. Bạn c&oacute; thể mua Apple Watch từ Apple v&agrave; một loạt c&aacute;c nh&agrave; cung cấp b&ecirc;n thứ ba tại cửa h&agrave;ng v&agrave; trực tuyến, bao gồm Amazon, Walmart, Best Buy, Adorama v&agrave; nhiều nh&agrave; cung cấp dịch vụ kh&aacute;c như Verizon v&agrave; AT&amp;T. Mặc d&ugrave; h&atilde;y thận trọng một ch&uacute;t, v&igrave; Đồng hồ được b&aacute;n qua c&aacute;c nh&agrave; mạng c&oacute; xu hướng đi k&egrave;m với g&oacute;i di động v&agrave; c&oacute; thể bạn sẽ cần một g&oacute;i hiện c&oacute; để bắt đầu. Điều đ&oacute; đang được n&oacute;i, nếu bạn th&iacute;ch nh&agrave; cung cấp dịch vụ của m&igrave;nh v&agrave; bạn đang c&acirc;n nhắc một chiếc Apple Watch di động, n&oacute; thường c&oacute; thể l&agrave; một lựa chọn tuyệt vời.</p>\r\n', 1, '2023-06-10 02:53:57', '2023-06-10 16:56:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `price_total` int(11) NOT NULL,
  `payment_status` tinyint(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `address`, `mobile`, `email`, `note`, `price_total`, `payment_status`, `created_at`, `updated_at`) VALUES
(41, 7, 'adminn', 'dai', 551565, 'admin@gmail.com', 'dai dep t5ri', 122520000, 1, '2024-05-08 06:01:22', '2024-05-08 13:01:22'),
(42, 7, 'admin', 'hà nam', 367458256, 'admin@gmail.com', 'ubfabfuabf', 72000000, 1, '2024-05-08 06:51:54', '2024-05-08 13:51:54'),
(43, 7, 'admin', 'hà nội', 121334424, 'doan6699@gmail.com', 'cho xin cái hóa đơn', 36000000, 1, '2024-05-08 06:53:17', '2024-05-08 13:53:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(20, 41, 16, 1, '2024-05-08 06:01:22', '2024-05-08 13:01:22'),
(21, 41, 24, 8, '2024-05-08 06:01:22', '2024-05-08 13:01:22'),
(22, 42, 17, 6, '2024-05-08 06:51:55', '2024-05-08 13:51:55'),
(23, 43, 23, 1, '2024-05-08 06:53:17', '2024-05-08 13:53:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `hot` varchar(255) DEFAULT NULL,
  `status` tinyint(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `avatar`, `price`, `weight`, `id_supplier`, `summary`, `content`, `hot`, `status`, `created_at`, `updated_at`) VALUES
(16, 20, 'IPhone 13 Pro ', '1654851627-product-iphone-13-pro.png', 29000000, '220 gr', 1, 'IPhone 13 Pro sang trọng, hoàn thiện.', '<p>IPhone 13 Pro năm nay c&oacute; thể sẽ kh&ocirc;ng c&oacute; nhiều sự thay đổi về thiết kế, khi m&aacute;y vẫn sở hữu kiểu d&aacute;ng tương tự như iPhone 12 Pro với c&aacute;c cạnh viền vu&ocirc;ng vắn v&agrave; hai mặt k&iacute;nh cường lực cao cấp n', '1', 1, '2023-06-10 02:00:27', '2024-05-05 09:52:16'),
(17, 22, 'Apple Watch S7 LTE 41 mm', '1654851884-product-banner-phu-4.jpg', 12000000, '120 gr', 1, 'Apple Watch S7 LTE 41 mm viền nhôm dây silicone có thiết kế được nâng cấp hơn so với phiên bản tiền nhiệm. Sở hữu vẻ ngoài sang trọng và hiện đại, Apple Watch S7 được thiết kế các góc bo tròn mềm mại với mặt đồng hồ được vác cong tạo cảm giác liền mạch ', '<p>Apple Watch S7 LTE 41 mm viền nh&ocirc;m d&acirc;y silicone c&oacute; thiết kế được n&acirc;ng cấp hơn so với phi&ecirc;n bản tiền nhiệm. Sở hữu vẻ ngo&agrave;i sang trọng v&agrave; hiện đại, Apple Watch S7 được thiết kế c&aacute;c g&oacute;c bo tr&ogr', '1', 1, '2023-06-10 02:04:44', '2024-05-05 09:52:16'),
(18, 21, 'Tai nghe bluetooth Samsung ITFIT A08C', '1654851941-product-banner-phu-3.jpg', 2400000, '80 gr', 2, 'Tai nghe bluetooth Samsung ITFIT A08C có thiết kế nhỏ gọn, âm thanh mạnh mẽ cùng thời lượng pin dài cho trải nghiệm tốt vượt bậc. Tai nghe thích hợp với nhiều đối tượng người dùng, đặc biệt là người dùng trẻ.', '<p>Tai nghe bluetooth Samsung ITFIT A08C c&oacute; thiết kế nhỏ gọn, &acirc;m thanh mạnh mẽ c&ugrave;ng thời lượng pin d&agrave;i cho trải nghiệm tốt vượt bậc. Tai nghe th&iacute;ch hợp với nhiều đối tượng người d&ugrave;ng, đặc biệt l&agrave; người d&ugr', '1', 1, '2023-06-10 02:05:41', '2024-05-05 09:52:16'),
(19, 20, 'Samsung Galaxy S22 Ultra 5G', '1654852051-product-ss-s22-ultra.png', 26500000, '250 gr', 2, 'Samsung Galaxy S22 Ultra 5G 512 GB là một \"siêu phẩm\" với bút S Pen nhanh hơn được tích hợp sẵn, nhiều cải tiến về camera, màn hình sáng hơn và sạc 45 W nhanh hơn.', '<p>Samsung Galaxy S22 Ultra 5G 512 GB l&agrave; một &quot;si&ecirc;u phẩm&quot; với b&uacute;t S Pen nhanh hơn được t&iacute;ch hợp sẵn, nhiều cải tiến về camera, m&agrave;n h&igrave;nh s&aacute;ng hơn v&agrave; sạc 45 W nhanh hơn.</p>\r\n', '1', 1, '2023-06-10 02:07:31', '2024-05-05 09:52:16'),
(20, 20, 'Xiaomi 12 Pro', '1654852439-product-xiaomi-12-pro.jpg', 16400000, '210 gr', 3, 'Điện thoại Xiaomi 12 Pro có thiết kế hiện đại, cao cấp được tạo nên từ bộ khung kim loại cực gọn nhẹ, các đường nét 3D tinh xảo tạo ra nét mượt mà và bóng bẩy. Chính điểm nhấn này đã tạo ra sự khác biệt hoàn toàn với những chiếc Flagship khác trên thị trư', '<p>Điện thoại Xiaomi 12 Pro c&oacute; thiết kế hiện đại, cao cấp được tạo n&ecirc;n từ bộ khung kim loại cực gọn nhẹ, c&aacute;c đường n&eacute;t 3D tinh xảo tạo ra n&eacute;t mượt m&agrave; v&agrave; b&oacute;ng bẩy. Ch&iacute;nh điểm nhấn n&agrave;y đ&a', '1', 1, '2023-06-10 02:08:45', '2024-05-05 09:52:16'),
(21, 23, 'Sạc Dự PhòngROBOT RT180', '1654852305-product-sac-du-phong-1.jpg', 420000, '190 gr', 4, 'Pin Sạc Dự Phòng 10.000mAh ROBOT RT180 - 2 Cổng Sạc Vào Type-C/Micro, Kích Thước Mỏng và Nhẹ - HÀNG CHÍNH HÃNG', '<h1>Pin Sạc Dự Ph&ograve;ng 10.000mAh ROBOT RT180 - 2 Cổng Sạc V&agrave;o Type-C/Micro, K&iacute;ch Thước Mỏng v&agrave; Nhẹ - H&Agrave;NG CH&Iacute;NH H&Atilde;NG</h1>\r\n', '1', 1, '2023-06-10 02:11:45', '2024-05-05 09:52:16'),
(22, 20, 'OPPO Reno6', '1654852558-product-oppo-reno-6.jpg', 22000000, '200 gr', 5, 'Nối tiếp sự thành công của dòng Reno5, OPPO mới đây đã trình làng bộ đôi siêu phẩm thuộc dòng OPPO Reno6 series có cấu hình mạnh mẽ, thiết kế ấn tượng. Trong đó, chiếc OPPO Reno6 5G với những cải tiến mới mẻ hơn thế hệ tiền nhiệm chắc chắn sẽ là một siêu ', '<h3>Nối tiếp sự th&agrave;nh c&ocirc;ng của d&ograve;ng Reno5, OPPO mới đ&acirc;y đ&atilde; tr&igrave;nh l&agrave;ng bộ đ&ocirc;i si&ecirc;u phẩm thuộc d&ograve;ng OPPO Reno6 series c&oacute; cấu h&igrave;nh mạnh mẽ, thiết kế ấn tượng.&nbsp;Trong đ&oacute', '1', 1, '2023-06-10 02:15:58', '2024-05-05 09:52:16'),
(23, 24, 'Macbook Pro 14', '1654852784-product-macbook-pro-2021.png', 36000000, '1300 gr', 1, 'Laptop Macbook Pro 14\" 2021 - M1 Pro 14 Core GPU/512GB - Chính hãng Apple VN', '<h1>Laptop Macbook Pro 14&quot; 2021 - M1 Pro 14 Core GPU/512GB - Ch&iacute;nh h&atilde;ng Apple VN</h1>\r\n', '1', 1, '2023-06-10 02:19:33', '2024-05-05 09:52:16'),
(24, 20, 'Samsung Galaxy A73 (5G)', '1655213870-product-samsung-galaxy-a73-1-600x600.jpg', 11690000, '181 gr', 2, 'Điện thoại cao cấp nhất dòng Galaxy A series sở hữu nhiều nâng cấp đáng giá so với thế hệ trước, từ ngoại hình cho đến hiệu năng, đặc biệt là hệ thống camera. Sau đây là những đánh giá chi tiết về chiếc Samsung A73 giúp bạn có cái nhìn tổng quan nhất về c', '<h2><strong>Đ&aacute;nh gi&aacute; Samsung A73 - Hiệu năng mượt m&agrave;, chụp ảnh chuy&ecirc;n nghiệp</strong></h2>\r\n\r\n<p>Điện thoại cao cấp nhất d&ograve;ng Galaxy A series sở hữu nhiều n&acirc;ng cấp đ&aacute;ng gi&aacute; so với thế hệ trước, từ ngoạ', '1', 1, '2023-06-14 06:37:50', '2024-05-05 09:52:16'),
(25, 20, 'Samsung Galaxy Note 20 Ultra 5G', '1655214142-product-sansung-note-20.jpg', 18990000, '200 gr', 2, 'Bên cạnh biên bản Galaxy Note 20 thường, Samsung còn cho ra mắt Note 20 Ultra 5G cho khả năng kết nối dữ liệu cao cùng thiết kế nguyên khối sang trọng, bắt mắt. Đây sẽ là sự lựa chọn hoàn hảo dành cho bạn để sử dụng mà không bị lỗi thời sau thời gian dài ', '<h2><strong>Điện thoại Samsung Note 20 Ultra 5G - Sang trọng, hiệu năng vượt trội</strong></h2>\r\n\r\n<p>B&ecirc;n cạnh bi&ecirc;n bản Galaxy Note 20 thường, Samsung c&ograve;n cho ra mắt&nbsp;<strong>Note 20 Ultra 5G</strong>&nbsp;cho khả năng kết nối dữ li', '1', 1, '2023-06-14 06:42:22', '2024-05-05 09:52:16'),
(26, 24, 'Asus Vivobook 13 Slate Oled T3300KA', '1655214258-product-laptop-asus-vi-13.jpg', 15790000, '1900 gr', 6, 'Laptop Asus Vivobook 13 Slate OLED T3300 là dòng laptop 2 trong 1 hiếm hoi của thương hiệu Asus. Thiết kế độc đáo này giúp cho người dùng có một trải nghiệm thú vị.', '<h2><strong>Laptop Asus Vivobook 13 Slate OLED (T3300) &ndash; laptop 2 trong 1 tiện lợi</strong></h2>\r\n\r\n<p><strong>Laptop Asus Vivobook 13 Slate OLED T3300</strong>&nbsp;l&agrave; d&ograve;ng laptop 2 trong 1 hiếm hoi của thương hiệu Asus. Thiết kế độc ', '1', 1, '2023-06-14 06:44:18', '2024-05-05 09:52:16'),
(27, 24, 'Asus TUF Gaming FA506IHR HN019W', '1655214375-product-laptop-TUF.jpg', 15990000, '2100 gr', 6, 'Laptop Asus TUF Gaming FA506IHR-HN019W một siêu phẩm mang nhiều tính năng vượt trội, thiết kế tinh tế, chiếm trọn vị trí trong lòng tín đồ công nghệ. Tìm hiểu ngay laptop Asus Gaming qua những thông tin sau đây!', '<h2><strong>Laptop Asus TUF Gaming FA506IHR-HN019W &ndash; Mạnh mẽ, bền bỉ</strong></h2>\r\n\r\n<p>Laptop Asus TUF Gaming FA506IHR-HN019W một si&ecirc;u phẩm mang nhiều t&iacute;nh năng vượt trội, thiết kế tinh tế, chiếm trọn vị tr&iacute; trong l&ograve;ng t', '1', 1, '2023-06-14 06:46:15', '2024-05-05 09:52:16'),
(28, 21, 'Tai nghe Bluetooth Samsung Galaxy Buds Pro', '1655215882-product-buds-pro_1.jpg', 2250000, '60 gr', 2, 'Tai nghe True Wireless Samsung Galaxy Buds Pro là dòng sản phẩm tai nghe không dây thế hệ mới nhất từ Samsung. Với phiên bản lần này được lột xác hoàn toàn về thiết kế cũng như chất âm xứng đáng là lựa chọn hàng đầu cho người dùng đang mong muốn tìm cho m', '<p>Tai nghe True Wireless Samsung Galaxy Buds Pro l&agrave; d&ograve;ng sản phẩm tai nghe kh&ocirc;ng d&acirc;y thế hệ mới nhất từ Samsung. Với phi&ecirc;n bản lần n&agrave;y được lột x&aacute;c ho&agrave;n to&agrave;n về thiết kế cũng như chất &acirc;m x', '1', 1, '2023-06-14 07:11:22', '2024-05-05 09:52:16'),
(29, 21, 'Tai nghe chụp tai Sony WH-1000XM4', '1655216084-product-headphone.jpg', 5890000, '190 gr', 7, 'Trong thế giới phụ kiện âm thanh nói chung và tai nghe nói riêng, Sony luôn là một trong những thương hiệu dẫn đầu. Nếu năm 2018, hãng cho ra mắt chiếc 1000XM3 được đông đảo người dùng đón nhận. Thì năm nay 2020, Sony WH-1000XM4 phụ kiện tai ngh', '<h2><strong>Sony WH-1000XM4 &ndash; Bản n&acirc;ng c&acirc;́p nhẹ của WH-1000XM3</strong></h2>\r\n\r\n<p><em>Trong th&ecirc;́ giới phụ ki&ecirc;̣n &acirc;m thanh n&oacute;i chung v&agrave; tai nghe n&oacute;i ri&ecirc;ng, Sony lu&ocirc;n l&agrave; m&ocirc;̣t ', '1', 1, '2023-06-14 07:14:44', '2024-05-05 09:52:16'),
(30, 22, 'Huawei Watch GT3 Pro', '1655216221-product-dhtt-huawei.jpg', 7990000, '160 gr', 8, 'Đồng hồ thông minh Huawei Watch GT3 Pro là sản phẩm công nghệ được mong chờ. Đồng hồ sở hữu thiết kế cổ điển với nhiều tính năng theo dõi tập luyện chuyên nghiệp cùng thời lượng pin sử dài lâu.', '<h2><strong>Đồng hồ Huawei Watch GT 3 Pro - Phong c&aacute;ch, hiện đại</strong></h2>\r\n\r\n<p>Đồng hồ th&ocirc;ng minh Huawei Watch GT3 Pro l&agrave; sản phẩm c&ocirc;ng nghệ được mong chờ. Đồng hồ sở hữu thiết kế cổ điển với nhiều t&iacute;nh năng theo d&o', '1', 1, '2023-06-14 07:17:01', '2024-05-05 13:11:01'),
(31, 22, 'Xiaomi Mi Band 6', '1655216334-product-mi-band-6.jpg', 949000, '100 gr', 3, 'Cách đây một năm, vòng đeo tay thông minh của Xiaomi đã được giới thiệu sau nhiều năm phát triển mang tên Mi Band 5. Không thể để cho thị trường này hạ nhiệt, Xiaomi lại tiếp tục cho ra mắt thế hệ tiếp theo mang tên Mi Band 6.', '<h2>Đ&aacute;nh gi&aacute; Xiaomi Mi Band 6 &ndash; Bản n&acirc;ng cấp ho&agrave;n hảo hơn Mi Band 5</h2>\r\n\r\n<p>C&aacute;ch đ&acirc;y một năm, v&ograve;ng đeo tay th&ocirc;ng minh của Xiaomi đ&atilde; được giới thiệu sau nhiều năm ph&aacute;t triển mang t', '1', 1, '2023-06-14 07:18:54', '2024-05-05 13:11:01'),
(32, 20, 'Apple Magsafe MJWY3', '1655216708-product-pin.jpg', 2290000, '300 gr', 1, 'Apple vừa cho ra mắt pin dự phòng Apple MagSafe dành cho iPhone 12 series trở lên. Đây được xem là bộ pin mở rộng thông qua giao tiếp MagSafe được tích hợp trên dòng iPhone 12, và là vật cứu cánh dành cho iPhone 12 mini với dung lượng thấp', '<h2><strong>Pin dự ph&ograve;ng Apple MagSafe - Pin sạc kh&ocirc;ng d&acirc;y đến từ Apple</strong></h2>\r\n\r\n<p>Apple vừa cho ra mắt&nbsp;<strong>pin dự ph&ograve;ng Apple MagSafe</strong>&nbsp;d&agrave;nh cho iPhone 12 series trở l&ecirc;n. Đ&acirc;y được', '1', 1, '2023-06-14 07:25:08', '2024-05-05 13:11:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `component_img` varchar(255) NOT NULL,
  `title_component` varchar(255) NOT NULL,
  `title_detail` varchar(255) NOT NULL,
  `store_img` varchar(255) NOT NULL,
  `status` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `avatar`, `position`, `component_img`, `title_component`, `title_detail`, `store_img`, `status`, `created_at`, `updated_at`) VALUES
(21, '1654850098-banner-4.jpg', 2, '1654850098-banner-phu-2.jpeg', 'Samsung Galaxy S22 Ultra', 'Samsung Galaxy S22 Ultra 5G 512 GB là một \"siêu phẩm\" với bút S Pen nhanh hơn được tích hợp sẵn, nhiều cải tiến về camera, màn hình sáng hơn và sạc 45 W nhanh hơn.', '1654850098-banner-phu-2.jpeg', 1, '2023-06-10 01:34:58', '2023-06-10 15:34:58'),
(23, '1654850323-banner-1.png', 1, '1654850323-banner-phu-4.jpg', 'Apple Watch', 'Apple Watch S7 LTE 41 mm viền nhôm dây silicone có thiết kế được nâng cấp hơn so với phiên bản tiền nhiệm. Sở hữu vẻ ngoài sang trọng và hiện đại, Apple Watch S7 được thiết kế các góc bo tròn mềm mại với mặt đồng hồ được vác cong tạo cảm giác liền mạch hơ', '1654850323-banner-phu-4.jpg', 1, '2023-06-10 01:38:43', '2023-06-10 15:38:43'),
(25, '1654850568-banner-3.png', 5, '1654850568-banner-phu-1.jpg', 'iPhone 13 Pro', 'iPhone 13 Pro năm nay có thể sẽ không có nhiều sự thay đổi về thiết kế, khi máy vẫn sở hữu kiểu dáng tương tự như iPhone 12 Pro với các cạnh viền vuông vắn và hai mặt kính cường lực cao cấp nhưng được nâng cấp mạnh mẽ về khả năng chụp ảnh.', '1654850568-banner-phu-1.jpg', 1, '2023-06-10 01:42:48', '2023-06-10 15:42:48'),
(26, '1654850675-banner-6.jpg', 4, '1654850675-banner-phu-3.jpg', 'Tai nghe bluetooth Samsung ITFIT A08C', 'Tai nghe bluetooth Samsung ITFIT A08C có thiết kế nhỏ gọn, âm thanh mạnh mẽ cùng thời lượng pin dài cho trải nghiệm tốt vượt bậc. Tai nghe thích hợp với nhiều đối tượng người dùng, đặc biệt là người dùng trẻ.', '1654850675-banner-phu-3.jpg', 1, '2023-06-10 01:44:35', '2023-06-10 15:44:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier`) VALUES
(1, 'APPLE'),
(2, 'SAMSUNG'),
(3, 'Xiaomi'),
(4, 'ROBOT'),
(5, 'OPPO'),
(6, 'Asus'),
(7, 'Sony'),
(8, 'Huawei');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `mobile`, `email`, `address`, `created_at`, `updated_at`) VALUES
(7, 'admin', '1', 0, '', '', '2024-05-04 07:53:03', '2024-05-04 14:53:03'),
(8, 'dai', '', 357024482, 'dinhdacdaickpt@gmail.com', 'phutho', '2024-05-04 07:53:16', '2024-05-05 11:15:55'),
(9, 'nam01', '1', 0, 'nam01@gmail.com', '', '2024-05-05 05:38:58', '2024-05-05 12:38:58');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_new` (`category_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_oderdetail` (`order_id`),
  ADD KEY `fk_oderdetail2` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product1` (`id_supplier`),
  ADD KEY `fk_product2` (`category_id`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `suppliers`
--
ALTER TABLE `suppliers`
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
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `maps`
--
ALTER TABLE `maps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_new` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_oderdetail` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_oderdetail2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product1` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `fk_product2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
