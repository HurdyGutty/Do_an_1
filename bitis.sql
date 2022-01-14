-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 13, 2022 at 05:42 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bitis`
--
CREATE DATABASE IF NOT EXISTS `bitis` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bitis`;

-- --------------------------------------------------------

--
-- Table structure for table `adm_list`
--

DROP TABLE IF EXISTS `adm_list`;
CREATE TABLE IF NOT EXISTS `adm_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` bit(1) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `access` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm_list`
--

INSERT INTO `adm_list` (`id`, `name`, `phone`, `address`, `gender`, `birthday`, `email`, `photo`, `password`, `access`) VALUES
(1, 'Nhat', '09771168123', 'Điện Biên Phủ, Quận 1', b'1', '1997-09-23', 'red@gmail.com', 'https://lumiere-a.akamaihd.net/v1/images/c94eed56a5e84479a2939c9172434567c0147d4f.jpeg?region=0,0,600,600', 'abc', b'1'),
(3, 'Huy', '0982224466', 'Hải Phòng', b'1', '1998-07-23', 'blue@gmail.com', '//upload.wikimedia.org/wikipedia/vi/thumb/1/1a/Mickey-Mouse.jpg/220px-Mickey-Mouse.jpg', 'abc', b'0'),
(5, 'Hùng', '0977227990', 'Vũng Tàu', b'1', '1991-02-14', 'yellow@gmail.com', 'https://bigcedar.com/wp-content/uploads/2020/12/AdobeStock_453941794-1.jpg', 'abc', b'0'),
(6, 'Hương', '0933445566', 'Lâm Đồng', b'0', '1977-06-05', 'pink@gmail.com', 'https://static.wikia.nocookie.net/disney/images/a/a3/Minnie_Mouse_transparent.png/revision/latest?cb=20210124014343', 'abc', b'1'),
(8, 'Bùi Xuân Bảo', '0988667981', '338 Hai Bà Trưng, Phường 8, 1, Thành phố Hồ Chí Minh', b'1', '1987-03-20', 'green@gmail.com', 'https://cafebiz.cafebizcdn.vn/thumb_w/600/2019/photo1557224364584-1557224364877-crop-15572243735951912688033.jpg', 'abc', b'1'),
(9, 'Đặng Thanh Phương', '0979667790', '285 Hai Bà Trưng, Phường 8, Quận 3, Thành phố Hồ Chí Minh', b'0', '1992-07-08', 'teal@gmail.com', 'https://pbs.twimg.com/media/ExMLCgWVoAQaBef?format=jpg&name=large', 'abc', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `cli_list`
--

DROP TABLE IF EXISTS `cli_list`;
CREATE TABLE IF NOT EXISTS `cli_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gender` bit(2) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `birthday` date DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cli_list`
--

INSERT INTO `cli_list` (`id`, `name`, `gender`, `address`, `email`, `phone`, `photo`, `password`, `birthday`, `token`) VALUES
(5, 'Lokiss', b'00', 'no', '2@2', '12', 'no', '', '2021-12-10', '695bcb9f1897e98235f64704a06753b31640178666'),
(14, '1', b'01', '', 'dokhaihung2003@gmail.com', '1', '', '$2y$10$DvjscuNyVQYCd/B3D6wnVu1NuF.CVOVyuRSBHSmsbKJozMBrVv43C', NULL, '2e617dcfc42c411fb19f6863f96d50441642042730'),
(15, '2', b'01', '', 'dokhaihung2003@gmail.com2', '2', '', '$2y$10$04FOKbl86y9Vg.qOIv1YGuFxbt7h4PqrRmwYtzhZTYL6RPLCl8kZy', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`id`, `name`, `description`, `phone`, `photo`, `address`) VALUES
(1, 'CONVERSE', '', '123', '', 'here'),
(3, 'Bitis', '', '', '', ''),
(4, 'Nike', '', '', '', ''),
(5, 'Adidas', 'Adidas là một nhà sản xuất dụng cụ thể thao của Đức, một thành viên của Adidas Group.', '0917221177', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Adidas_Logo.svg/800px-Adidas_Logo.svg.png', '1 17A ST, Aeon Mall, Aeon Binh Tan, 700000, Ho Chi Minh, Việt Nam');

-- --------------------------------------------------------

--
-- Table structure for table `out_list`
--

DROP TABLE IF EXISTS `out_list`;
CREATE TABLE IF NOT EXISTS `out_list` (
  `id` int(11) NOT NULL ,
  `client_id` int(11) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `receiver_name` varchar(50) NOT NULL,
  `receiver_phone` varchar(15) NOT NULL,
  `receiver_address` varchar(100) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_out_manufacturers_id` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `out_list`
--

INSERT INTO `out_list` (`id`, `client_id`, `order_time`, `receiver_name`, `receiver_phone`, `receiver_address`, `note`) VALUES
(1, 5, '2021-12-24 10:33:32', 'Danh', '0922113344', 'Đà Nẵng', 'mới'),
(2, 5, '2021-12-24 10:33:32', 'Danh', '0922113344', 'Đà Nẵng', 'mới'),
(3, 14, '2022-01-13 05:41:55', 'Đỗ Khải Hưng', '0367634', 'Đường Lê thành phương, Phường Hoà Vinh , Thị xã Đông Hòa , Tỉnh Phú Yên ', '');

-- --------------------------------------------------------

--
-- Table structure for table `out_product`
--

DROP TABLE IF EXISTS `out_product`;
CREATE TABLE IF NOT EXISTS `out_product` (
  `out_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`out_id`,`product_id`),
  KEY `FK_product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `out_product`
--

INSERT INTO `out_product` (`out_id`, `product_id`, `quantity`) VALUES
(1, 5, 2),
(1, 6, 12),
(2, 12, 6);
(3, 12, 1),
(3, 23, 1),
(3, 28, 3),
(3, 32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_category`
--

DROP TABLE IF EXISTS `products_category`;
CREATE TABLE IF NOT EXISTS `products_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_category`
--

INSERT INTO `products_category` (`id`, `category`) VALUES
(1, 'Giày Sandal'),
(2, 'Giày Tây'),
(3, 'Giày Thể Thao');

-- --------------------------------------------------------

--
-- Table structure for table `products_gender`
--

DROP TABLE IF EXISTS `products_gender`;
CREATE TABLE IF NOT EXISTS `products_gender` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `gender` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_gender`
--

INSERT INTO `products_gender` (`id`, `gender`) VALUES
(1, 'Nam'),
(2, 'Nữ'),
(3, 'Nam, Nữ'),
(4, 'Trẻ em');

-- --------------------------------------------------------

--
-- Table structure for table `products_list`
--

DROP TABLE IF EXISTS `products_list`;
CREATE TABLE IF NOT EXISTS `products_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `gender_id` tinyint(4) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  `manufacturers_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_products_manufacturers_id` (`manufacturers_id`),
  KEY `FK_products_gender` (`gender_id`) USING BTREE,
  KEY `FK_products_category` (`category_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_list`
--

INSERT INTO `products_list` (`id`, `name`, `price`, `quantity`, `gender_id`, `category_id`, `description`, `photo`, `manufacturers_id`) VALUES
(2, 'Run Star Hike Create Next Purpose: Sustainability Hi-Top', 2500000, 1000, 3, 3, '', 'https://www.converse.com.vn/pictures/catalog/products/sneakers/2021/ctas/171575/171575Cstandard.jpg', 1),
(5, 'Chuck Taylor All Star Lift Surface Fusion', 1500000, 1000, 3, 3, '', 'https://www.converse.com.vn/pictures/catalog/products/sneakers/2021/ctas/571670c/571670Cstandard.jpg', 1),
(6, 'Chuck Taylor All Star Crater Knit High Top', 1500000, 1000, 4, 3, '', 'https://www.converse.com.vn/pictures/catalog/products/sneakers/2021/ctas/170869c/170869Cshot2.jpg', 1),
(7, 'Giày sandal nữ Aokang 682831037', 150000, 20, 2, 1, '', 'https://img.yes24.vn/Upload/ProductImage/anvietsh/2013660_L.jpg?width=550&height=550', 4),
(8, 'Giày sandal nữ Senta SE107SH08YOHVN', 1500000, 1000, 2, 1, '', 'https://img.yes24.vn/Upload/ProductImage/SENTA/1986228_L.jpg?width=550&height=550', 3),
(9, 'Giày sandal nữ Aokang 682831080', 100000, 200, 2, 1, '', 'https://img.yes24.vn/Upload/ProductImage/anvietsh/2013639_L.jpg?width=550&height=550', 1),
(10, 'Giày sandal Adidas Adilete F35417', 1500000, 10009, 1, 1, '', 'https://img.yes24.vn/Upload/ProductImage/GmarketSport/2030428_L.jpg?width=550&height=550', 4),
(11, 'Giày Sandal Nam Aokang 182831014', 170000, 202, 1, 1, '', 'https://shop-cdn.coccoc.com/images/product/Hg/Cf/HgCfycRike.jpg', 4),
(12, 'Giày Sandal Doctor Nam BIGGBEN Da Bò Thật SD70', 200000, 999, 1, 1, '', 'https://salt.tikicdn.com/cache/400x400/ts/product/74/a2/d3/f02e8c1714cf99b458cba8269bb6d232.jpg.webp', 1),
(13, 'Sandal Eva Phun Nam Biti\'s Hunter DEMH00201XAM (Xám)', 1500000, 1000, 1, 1, '', 'https://salt.tikicdn.com/cache/400x400/ts/product/d5/1f/b6/5fb3c22b35097a46a7f46f436bbbc2e3.jpg.webp', 3),
(14, 'Giày Thể Thao Cao Cấp Nữ Biti', 15000009, 998, 2, 3, '', 'https://product.hstatic.net/1000230642/product/02800hog__2__dd6e1a064a294e108c2c90e7a728470d_1024x1024.jpg', 3),
(15, 'Giày Tây Nam Biti\'s DVM283770NAD (Nâu)', 150000, 999, 1, 2, '', 'https://product.hstatic.net/1000230642/product/dvm283770nad_dd6947c86c3049a99227e2854ddc1ef0_1024x1024.jpg', 3),
(16, 'ZX 10000 KRUSTY BURGER', 3100000, 1000, 3, 3, 'Giày thể thao năng động đầy màu sắc', 'https://assets.adidas.com/images/w_276,h_276,f_auto,q_auto:sensitive,fl_lossy,c_fill,g_auto/c59ed45d8b8c443481fcac7c01403b85_9366/ZX_10000_KRUSTY_BURGER_trang_H05783_01_standard.jpg', 5),
(17, 'Giày Superstar 82', 3500000, 999, 1, 3, 'Giày thể thao sành điệu chất chơi', 'https://assets.adidas.com/images/w_276,h_276,f_auto,q_auto:sensitive,fl_lossy,c_fill,g_auto/8c3a61df8aea41d48b16ad6500b34711_9366/Giay_Superstar_82_DJen_GX3746_01_standard.jpg', 5),
(18, 'Nike Air Zoom Alphafly NEXT%', 8059000, 1, 1, 3, '', 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/d8e174e1-0c79-47e2-b7fc-1486288af645/air-zoom-alphafly-next-road-racing-shoes-13jzhr.png', 4),
(19, 'Nike Free Run 5.0', 2929000, 5, 1, 3, '', 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/bed45cdc-fe4c-4eb1-828e-ff6a4184970c/free-run-5-road-running-shoes-m8L9mr.png', 4),
(20, 'Nike Air Zoom Pegasus 38', 3519000, 1, 2, 3, '', 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/aefbcede-5ec1-4453-adf1-e86f8fd8d94d/air-zoom-pegasus-38-road-running-shoes-D1tCt1.png', 4),
(21, 'Nike Dunk High LX', 3829000, 1, 2, 3, '', 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/aa761450-2f52-4922-890c-99f9f7f6d684/dunk-high-lx-shoes-4gJ041.png', 4),
(22, 'Nike Zoom Fly 4', 4699000, 1, 2, 3, '', 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/3dd4c47e-5edf-4bdc-aff4-edc396c3f83e/zoom-fly-4-road-running-shoes-HMG6C0.png', 4),
(23, 'Nike Air Max 97', 4999000, 1, 2, 3, '', 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/5cbc21e7-886a-4265-80a1-2494e30daf51/air-max-97-shoes-B2TV3Z.png', 4),
(24, 'Nike Star Runner 3', 1279000, 1, 4, 3, '', 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/a4552edd-3bfa-41aa-bf58-430f868f5678/star-runner-3-younger-shoes-dvMzC9.png', 4),
(25, 'Nike Flex Runner', 1149000, 2, 4, 3, '', 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/fda8133f-8444-477b-8848-fa70bc02f1c5/flex-runner-younger-shoe-J8bH4L.png', 4),
(26, 'Nike Force 1 LV8', 1789000, 1222, 4, 3, '', 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/8b09b7c9-beb7-42b8-93df-403c70a22c42/force-1-lv8-younger-shoes-CC5l2z.png', 4),
(27, 'Tour Yellow', 5589000, 999, 4, 3, '', 'https://static.nike.com/a/images/t_prod_ss/w_640,c_limit,f_auto/b0612b56-5306-4f1e-84dd-42513f5067f9/air-jordan-4-tour-yellow-release-date.jpg', 4),
(28, 'Giày Tây Da Nam Cao Cấp', 1044050, 234, 1, 2, '', 'https://product.hstatic.net/1000230642/product/dvm276880den__5__6c27b227ff064822b62bf5d95e3e0f50_1024x1024.jpg', 3),
(29, 'Biti\'s X DMM359880VDB', 1200000, 99, 1, 2, '', 'https://product.hstatic.net/1000230642/product/dmm359880vdb__6__96238fb14e1b4c94915f0cee56267286_1024x1024.jpg', 3),
(30, 'Giày Tây Da Nam Cao Cấp Biti\'s X DVM277880DEN', 1044050, 111, 1, 3, '', 'https://product.hstatic.net/1000230642/product/dvm277880den__5__50683fa5f129415f80860a029ba55354_1024x1024.jpg', 3),
(31, 'Sandal Da Thật Nữ Gosto Slinky', 854050, 99, 2, 1, '', 'https://product.hstatic.net/1000230642/product/gfw017300den__3__74f3a4a8014e4830b92292186e8f9db0_1024x1024.png', 3),
(32, 'Sandal Bé Trai Biti\'s DRB030700XNH', 275000, 999, 4, 1, '', 'https://product.hstatic.net/1000230642/product/drb030700xnh_193393af24044f4989d825bacb64a365_1024x1024.jpg', 3),
(33, 'Giày Thể Thao Bé Trai Biti\'s DSB137300TRG (Trắng)', 123456, 987, 4, 3, '', 'https://product.hstatic.net/1000230642/product/dsb137300trg28__5__0a6f100c2ced4d69821e55059c1f4efc_1024x1024.jpg', 4),
(34, 'Giày Thể Thao Si Bé Trai Biti\'s DSB131900DEN', 395000, 100, 4, 3, '', 'https://product.hstatic.net/1000230642/product/dsb131900den__5__1e63f186a9ed46cf91d0c83820fccacf_1024x1024.jpg', 3),
(35, 'Run Star Hike Pride High Top', 2500000, 25, 1, 3, '', 'https://www.converse.com.vn/pictures/catalog/products/sneakers/2021/ctas/170824v/170824Cstandard.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `receipt_history`
--

DROP TABLE IF EXISTS `receipt_history`;
CREATE TABLE IF NOT EXISTS `receipt_history` (
  `out_id` int(11) NOT NULL,
  `adm_id` int(11) DEFAULT NULL,
  `receipt_stat` enum('Đã hủy','Mới','Đã duyệt') NOT NULL,
  `work_time` datetime DEFAULT NULL,
  PRIMARY KEY (`out_id`),
  KEY `FK_out_adm_id` (`adm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt_history`
--

INSERT INTO `receipt_history` (`out_id`, `adm_id`, `receipt_stat`, `work_time`) VALUES
(1, 3, 'Đã duyệt', '2021-12-29 19:47:17'),
(2, NULL, 'Mới', NULL);


--
-- Constraints for dumped tables
--

--
-- Constraints for table `out_list`
--
ALTER TABLE `out_list`
  ADD CONSTRAINT `FK_out_client_id` FOREIGN KEY (`client_id`) REFERENCES `cli_list` (`id`);

--
-- Constraints for table `out_product`
--
ALTER TABLE `out_product`
  ADD CONSTRAINT `FK_out_list` FOREIGN KEY (`out_id`) REFERENCES `out_list` (`id`),
  ADD CONSTRAINT `FK_product_id` FOREIGN KEY (`product_id`) REFERENCES `products_list` (`id`);

--
-- Constraints for table `products_list`
--
ALTER TABLE `products_list`
  ADD CONSTRAINT `FK_products_category_id` FOREIGN KEY (`category_id`) REFERENCES `products_category` (`id`),
  ADD CONSTRAINT `FK_products_gender_id` FOREIGN KEY (`gender_id`) REFERENCES `products_gender` (`id`),
  ADD CONSTRAINT `FK_products_manufacturers_id` FOREIGN KEY (`manufacturers_id`) REFERENCES `manufactures` (`id`);

--
-- Constraints for table `receipt_history`
--
ALTER TABLE `receipt_history`
  ADD CONSTRAINT `FK_out_adm_id` FOREIGN KEY (`adm_id`) REFERENCES `adm_list` (`id`),
  ADD CONSTRAINT `FK_out_list_id` FOREIGN KEY (`out_id`) REFERENCES `out_list` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
