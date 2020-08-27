-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 27 Ağu 2020, 10:15:20
-- Sunucu sürümü: 10.4.13-MariaDB
-- PHP Sürümü: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `codeigniter_eticaret`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `name`, `mail`, `password`) VALUES
(1, 'admin', 'admin', '123456');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `topcategory` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `topcategory`) VALUES
(1, 'Pantolon', 'pantolon', '1'),
(2, 'İç Çamaşırı', 'ic-camasiri', '2'),
(3, 'Tshirt', 'tshirt', '3'),
(4, 'Gömlek', 'gomlek', '1'),
(5, 'Ceket', 'ceket', '1'),
(6, 'Hırka', 'hirka', '3'),
(7, 'Bluz', 'bluz', '2'),
(8, 'Şapka', 'sapka', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `info` varchar(100) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `config`
--

INSERT INTO `config` (`id`, `title`, `logo`, `icon`, `info`, `mail`, `facebook`, `twitter`, `instagram`, `youtube`) VALUES
(1, 'Codeigniter eticaret projesi', 'assets/uploads/config/1280x720.png', 'assets/uploads/config/700x400.png', 'Codeigniter eticaret projesi adres kısmı', 'eticaret@codeigniter', 'facebook', 'twitter', 'instagram', 'youtube');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `product` int(11) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `master` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `images`
--

INSERT INTO `images` (`id`, `product`, `path`, `master`) VALUES
(1, 1, 'assets/uploads/products/jean-erkek-pantolon1.png', 1),
(2, 1, 'assets/uploads/products/jean-erkek-pantolon11.png', 0),
(3, 1, 'assets/uploads/products/jean-erkek-pantolon12.png', 0),
(4, 2, 'assets/uploads/products/erkek-t-shirt2.png', 1),
(5, 2, 'assets/uploads/products/erkek-t-shirt21.png', 0),
(6, 2, 'assets/uploads/products/erkek-t-shirt22.png', 0),
(7, 3, 'assets/uploads/products/deri-ceket3.png', 0),
(8, 3, 'assets/uploads/products/deri-ceket31.png', 0),
(9, 3, 'assets/uploads/products/deri-ceket32.png', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `options`
--

INSERT INTO `options` (`id`, `name`, `slug`) VALUES
(1, 'Renkler', 'renkler'),
(2, 'Ayakkabı Numarası', 'ayakkabi-numarasi'),
(4, 'Beden', 'beden'),
(5, 'Yaş', 'yas');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `subcategory` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `desc` longtext DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `seo` varchar(100) DEFAULT NULL,
  `complete` int(11) DEFAULT 0,
  `active` int(11) DEFAULT 0,
  `qrcode` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `category`, `subcategory`, `title`, `desc`, `price`, `discount`, `tag`, `seo`, `complete`, `active`, `qrcode`, `date`) VALUES
(1, 1, 1, 'Jean Erkek Pantolon', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque et turpis turpis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed molestie odio non nisl tempor elementum. Aenean vitae nibh justo. Morbi et dolor et sem bibendum egestas quis ullamcorper metus. Fusce in scelerisque elit, ut convallis sem. Curabitur ut neque interdum mi condimentum ornare. Quisque convallis, nibh at tincidunt pretium, nisl neque mollis sapien, a rutrum ante mi eu dolor. Pellentesque dapibus erat leo, nec facilisis erat accumsan sed. Curabitur convallis, lorem sit amet commodo dictum, neque mauris eleifend erat, id bibendum quam lacus quis tortor. Donec vel maximus libero, a posuere leo. Vivamus ac pretium quam. Praesent sit amet varius tortor. Fusce ut turpis in magna sagittis tristique vitae ac erat. Etiam suscipit consequat mi, sit amet tempor nisi scelerisque nec.', '199.00', '179.00', 'Yeni,İndirim', 'jean-erkek-pantolon', 1, 1, 'assets/uploads/qrcode/urun1.png', '2020-08-11 16:59:55'),
(2, 1, 3, 'Erkek T-shirt', 'Erkek T-shirt', '120.00', '100.00', 'Yeni,İndirim', 'erkek-t-shirt', 1, 0, 'assets/uploads/qrcode/urun2.png', '2020-08-27 11:04:18'),
(3, 1, 5, 'Deri Ceket', 'Deri Ceket', '230.00', '190.00', 'İndirim', 'deri-ceket', 0, 0, 'assets/uploads/qrcode/urun3.png', '2020-08-27 11:06:51');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `product` int(11) DEFAULT NULL,
  `suboption` int(11) DEFAULT NULL,
  `suboption2` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `stocks`
--

INSERT INTO `stocks` (`id`, `product`, `suboption`, `suboption2`, `stock`) VALUES
(1, 1, 48, 13, 10),
(2, 1, 45, 14, 12),
(3, 1, 47, 12, 5),
(4, 1, 48, 12, 10),
(5, 1, 45, 12, 11),
(6, 1, 50, 14, 12),
(7, 1, 49, 13, 13),
(8, 2, 45, 12, 10),
(9, 2, 47, 13, 15),
(10, 2, 48, 14, 12),
(11, 2, 53, 13, 13);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stocktype`
--

CREATE TABLE `stocktype` (
  `id` int(11) NOT NULL,
  `product` int(11) DEFAULT NULL,
  `option1` int(11) DEFAULT NULL,
  `option2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `stocktype`
--

INSERT INTO `stocktype` (`id`, `product`, `option1`, `option2`) VALUES
(1, 1, 1, 4),
(2, 2, 1, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `suboptions`
--

CREATE TABLE `suboptions` (
  `id` int(11) NOT NULL,
  `option_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `suboptions`
--

INSERT INTO `suboptions` (`id`, `option_id`, `name`) VALUES
(1, 2, '35'),
(2, 2, '36'),
(3, 2, '37'),
(4, 2, '38'),
(5, 2, '39'),
(6, 2, '40'),
(7, 2, '41'),
(8, 2, '42'),
(9, 2, '43'),
(10, 2, '44'),
(11, 2, '45'),
(12, 4, 'Small (S)'),
(13, 4, 'Medium (M)'),
(14, 4, 'Large (L)'),
(15, 5, '1'),
(16, 5, '2'),
(17, 5, '3'),
(18, 5, '4'),
(19, 5, '5'),
(20, 5, '6'),
(21, 5, '7'),
(22, 5, '8'),
(23, 5, '9'),
(24, 5, '10'),
(25, 5, '11'),
(26, 5, '12'),
(27, 5, '13'),
(28, 5, '14'),
(29, 5, '15'),
(30, 5, '16'),
(31, 5, '17'),
(32, 5, '18'),
(33, 5, '19'),
(34, 5, '20'),
(35, 5, '21'),
(36, 5, '22'),
(37, 5, '23'),
(38, 5, '24'),
(39, 5, '25'),
(40, 5, '26'),
(41, 5, '27'),
(42, 5, '28'),
(43, 5, '29'),
(44, 5, '30'),
(45, 1, 'Siyah'),
(46, 1, 'Beyaz'),
(47, 1, 'Kırmızı'),
(48, 1, 'Lacivert'),
(49, 1, 'Kahverengi'),
(50, 1, 'Gri'),
(51, 1, 'Mor'),
(52, 1, 'Pembe'),
(53, 1, 'Mavi'),
(54, 1, 'Yeşil'),
(55, 1, 'Sarı');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_products_id_fk` (`product`);

--
-- Tablo için indeksler `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_products_id_fk` (`product`);

--
-- Tablo için indeksler `stocktype`
--
ALTER TABLE `stocktype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocktype_options_id_fk` (`option1`),
  ADD KEY `stocktype_products_id_fk` (`product`),
  ADD KEY `stocktype_options_id_fk_2` (`option2`);

--
-- Tablo için indeksler `suboptions`
--
ALTER TABLE `suboptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suboptions_options_id_fk` (`option_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `stocktype`
--
ALTER TABLE `stocktype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `suboptions`
--
ALTER TABLE `suboptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_products_id_fk` FOREIGN KEY (`product`) REFERENCES `products` (`id`);

--
-- Tablo kısıtlamaları `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_products_id_fk` FOREIGN KEY (`product`) REFERENCES `products` (`id`);

--
-- Tablo kısıtlamaları `stocktype`
--
ALTER TABLE `stocktype`
  ADD CONSTRAINT `stocktype_options_id_fk` FOREIGN KEY (`option1`) REFERENCES `options` (`id`),
  ADD CONSTRAINT `stocktype_options_id_fk_2` FOREIGN KEY (`option2`) REFERENCES `options` (`id`),
  ADD CONSTRAINT `stocktype_products_id_fk` FOREIGN KEY (`product`) REFERENCES `products` (`id`);

--
-- Tablo kısıtlamaları `suboptions`
--
ALTER TABLE `suboptions`
  ADD CONSTRAINT `suboptions_options_id_fk` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
