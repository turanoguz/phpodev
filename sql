-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 26 Ara 2021, 09:55:48
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `php`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `begeni_bilgisi`
--

CREATE TABLE `begeni_bilgisi` (
  `user_id` int(11) NOT NULL,
  `soru_id` int(11) NOT NULL,
  `bilgi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `begeni_bilgisi`
--

INSERT INTO `begeni_bilgisi` (`user_id`, `soru_id`, `bilgi`) VALUES
(1, 1, 'dislike'),
(1, 2, 'like'),
(1, 3, 'dislike'),
(1, 4, 'dislike'),
(3, 1, 'like'),
(3, 2, 'like'),
(3, 3, 'dislike'),
(5, 1, 'like'),
(5, 2, 'like'),
(5, 3, 'dislike');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sorular`
--

CREATE TABLE `sorular` (
  `soru_id` int(11) NOT NULL,
  `soru_baslık` varchar(150) COLLATE utf8mb4_turkish_ci NOT NULL,
  `soru_acıklama` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `soru_ekleyen` int(11) NOT NULL,
  `soru_sef` varchar(200) COLLATE utf8mb4_turkish_ci NOT NULL,
  `soru_kategori` varchar(200) COLLATE utf8mb4_turkish_ci NOT NULL,
  `soru_durum` int(11) NOT NULL DEFAULT 1,
  `soru_hit` int(11) NOT NULL DEFAULT 0,
  `soru_tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `sorular`
--

INSERT INTO `sorular` (`soru_id`, `soru_baslık`, `soru_acıklama`, `soru_ekleyen`, `soru_sef`, `soru_kategori`, `soru_durum`, `soru_hit`, `soru_tarih`) VALUES
(1, 'deneme sorusu', 'deneme sorusuyla başlayalım merhabalar arkadaşlar bu soru ilk deneme sorumuzdur rastgele sorular ekleyecğiz ve devam edceğiz', 1, 'edneme-sorusu', 'deneme', 1, 0, '2021-12-05 08:17:07'),
(2, 'merhaba ', 'merhabalar sorusu', 1, 'merhaba', 'merhaba', 1, 0, '2021-12-05 08:17:54'),
(3, 'son eklenen', 'soru açıklama', 3, '', 'araba', 1, 0, '2021-12-22 12:07:58'),
(4, 'ilk ', ' ilk deneme', 1, '', '', 1, 0, '2021-12-23 18:58:46'),
(5, 'ikinci deneme', '12345689874654646546 ', 3, '', '', 1, 0, '2021-12-23 19:03:39');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `ıd` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `password` varchar(30) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`ıd`, `name`, `surname`, `email`, `password`) VALUES
(1, 'semih', 'şahin', 'ssahin@gmail.com', '12345'),
(3, 'oguzhan', 'turan', 'oguzhan@gmail.com', '12345'),
(5, 'ahmet', 'mehmet', 'ahmet@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `yorum_id` int(11) NOT NULL,
  `yorum_mesaj` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `yorum_eposta` varchar(200) COLLATE utf8mb4_turkish_ci NOT NULL,
  `yorum_ekleyen` int(11) DEFAULT NULL,
  `yorum_soru_id` int(11) DEFAULT NULL,
  `yorum_tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`yorum_id`, `yorum_mesaj`, `yorum_eposta`, `yorum_ekleyen`, `yorum_soru_id`, `yorum_tarih`) VALUES
(90, '123wqeqwe', 'ssahin@gmail.com', 1, 2, '2021-12-20 07:36:08'),
(91, 'latifin amet', 'ssahin@gmail.com', 1, 2, '2021-12-21 17:58:12'),
(92, 'deneme yorumu', 'ssahin@gmail.com', 1, 3, '2021-12-22 12:43:37'),
(93, 'asd defneme', 'ssahin@gmail.com', 1, 3, '2021-12-22 12:46:32'),
(94, 'asdasdasfd3', 'ssahin@gmail.com', 1, 3, '2021-12-22 12:46:46'),
(95, 'merhaba güzel soru', 'ssahin@gmail.com', 1, 3, '2021-12-22 12:48:28'),
(96, 'asda', 'ssahin@gmail.com', 1, 3, '2021-12-22 13:49:48'),
(97, '1234', 'ssahin@gmail.com', 1, 3, '2021-12-22 18:17:28'),
(98, 'merhabalar yorumu :)))', 'oguzhan@gmail.com', 3, 3, '2021-12-23 14:18:47');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorum_begeniler`
--

CREATE TABLE `yorum_begeniler` (
  `yorum_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bilgi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `yorum_begeniler`
--

INSERT INTO `yorum_begeniler` (`yorum_id`, `user_id`, `bilgi`) VALUES
(92, 1, 'dislike'),
(92, 3, 'dislike'),
(93, 3, 'dislike'),
(94, 1, 'dislike'),
(94, 3, 'dislike'),
(95, 3, 'like'),
(96, 1, 'like'),
(96, 3, 'dislike'),
(97, 1, 'dislike'),
(97, 3, 'dislike'),
(98, 3, 'like');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `begeni_bilgisi`
--
ALTER TABLE `begeni_bilgisi`
  ADD UNIQUE KEY `user_id` (`user_id`,`soru_id`);

--
-- Tablo için indeksler `sorular`
--
ALTER TABLE `sorular`
  ADD PRIMARY KEY (`soru_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ıd`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorum_id`);

--
-- Tablo için indeksler `yorum_begeniler`
--
ALTER TABLE `yorum_begeniler`
  ADD UNIQUE KEY `yorum_id` (`yorum_id`,`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `sorular`
--
ALTER TABLE `sorular`
  MODIFY `soru_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `ıd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
