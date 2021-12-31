-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 31 Ara 2021, 06:59:58
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
(1, 13, 'dislike'),
(1, 14, 'like'),
(1, 15, 'like'),
(1, 21, 'like'),
(3, 13, 'dislike'),
(3, 14, 'like'),
(3, 15, 'like'),
(3, 16, 'like'),
(3, 17, 'dislike'),
(5, 13, 'like'),
(5, 14, 'like'),
(5, 15, 'dislike'),
(5, 16, 'like'),
(5, 17, 'dislike'),
(5, 18, 'like'),
(6, 13, 'dislike'),
(6, 14, 'dislike'),
(6, 15, 'like'),
(6, 16, 'dislike'),
(6, 17, 'like'),
(6, 18, 'like'),
(6, 19, 'like'),
(6, 20, 'dislike'),
(6, 21, 'dislike');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sorular`
--

CREATE TABLE `sorular` (
  `soru_id` int(11) NOT NULL,
  `soru_baslık` varchar(150) COLLATE utf8mb4_turkish_ci NOT NULL,
  `soru_acıklama` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `soru_ekleyen` int(11) NOT NULL,
  `soru_kategori` varchar(200) COLLATE utf8mb4_turkish_ci NOT NULL,
  `soru_tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `sorular`
--

INSERT INTO `sorular` (`soru_id`, `soru_baslık`, `soru_acıklama`, `soru_ekleyen`, `soru_kategori`, `soru_tarih`) VALUES
(13, 'Hyundai İx35 sis farı uyumu', 'İx35 2013 model led sis farı için hangisini almamız lazım ?', 1, 'Araba', '2021-12-28 12:53:09'),
(14, 'Geri vitese takarken cart sesiGeri vitese takarken cart sesi', 'Merhabalar.1998 model ford escort aracim var. Geri vitese atarken cart diye ses geliyor ve araci salliyor. Neden olabilir bu acaba?', 3, 'Araba', '2021-12-28 12:54:39'),
(15, 'Citroen Berlingo Alınır Mı?', ' Merhaba araba almak istiyorum ve tanıdık birinden\r\n\r\nCitroen Berlingo\r\n\r\n2004 model\r\n\r\n2.0 HDl Miltispace\r\n\r\n108.979 km\r\n\r\n\r\n \r\nHasar kaydı yok\r\n\r\nBoya yok\r\n\r\n30 bin diyor. Sizce almalıyım', 5, 'Araba', '2021-12-28 12:57:10'),
(16, 'Osmanlı zamanındaki paşalar orduyu nasıl yönetiyordu ?', ' Osmanlı tarihinde genel olarak savaşları padişah ve paşaları yönetirdi. Peki görevi askeriyeden olmayan bu paşalar nasıl orduyu yönetiyordu nasıl meydan savaşları yapıyorlardı vezirler nasıl orduyu yönetebiliyorlardı', 1, 'Genel', '2021-12-28 13:16:46'),
(17, 'Rüyalarımızı neden kontrol edemeyiz?', ' neden yönetemeyiz', 5, 'Genel', '2021-12-28 13:19:38'),
(18, 'Çatı akıyor ', 'Evimin çatısında delik var bu deliği nasıl kapatabilirimm ', 6, 'ev', '2021-12-28 13:23:58'),
(19, 'duvarlar rutubetli ', 'evimin duvarları rutubetli boyattırdım ama kısa bir sürede yine rutubetten boyalar döküldü ne yapabilirim ', 5, 'ev', '2021-12-28 13:25:43'),
(20, 'farcry yeni versiyon gelirmi', ' farcry yeni oyun çıkartacakmı agalar', 6, 'oyun', '2021-12-28 13:30:56'),
(21, 'aleyna tilki ', 'aleyna yeni albümünü ne zaman çıkartır  ', 1, 'müzik', '2021-12-28 13:32:11');

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
(5, 'ahmet', 'mehmet', 'ahmet@gmail.com', '12345'),
(6, 'osman', 'bıyık', 'osman@gmail.com', '12345');

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
(105, 'Merhaba,\r\nAracınızın sis farı kodu h8 olarak görünüyor araştırdığımda. Satın alırken h8 led sis farı tercih edebilirsiniz.', 'oguzhan@gmail.com', 3, 13, '2021-12-28 12:53:35'),
(106, 'Merhaba,\r\n\r\nGeri vitese takarken cart sesi gelmesinin sebebi genellikle baskı balatanın tam ayrılmamasından kaynaklanır. Debriyaja tam basıp vitesi 1’e alıp sonrasında geri vitese alırsanız daha rahat geçecektir geriye. Ayrıca araç tamamen durduktan sonra geri vitesi takmanız gerekir.\r\n\r\n\r\n \r\nBirçok modern aracın kullanma kılavuzunda araç durup 3 sn debriyaja basıldıktan sonra geriye takılması önerilir. Genellikle sorun dişlilerin tam durmamasından ötürü kaynaklanıyor.', 'ahmet@gmail.com', 5, 14, '2021-12-28 12:55:24'),
(107, 'bu araba çok sorunlu ben ustaya gittim baya bir masraf çıkardı', 'ahmet@gmail.com', 5, 13, '2021-12-28 12:55:56'),
(108, 'Merhaba,\r\n\r\nHatasız boyasız olması avantaj. Ayrıca km de orijinalse uzun süre sorunsuz kullanabilirsiniz. Dezavantajları ise ticari olması sebebiyle yüksek vergi, uzun yoldaki düşük hız limitleri ve her yıl muayene olacaktır.\r\n\r\n\r\n \r\nEğer ticari veya yük taşımak geniş bagaj için alacaksanız fiyat çok iyi.', 'ssahin@gmail.com', 1, 15, '2021-12-28 12:57:40'),
(109, 'Merhaba, öncelikle Osmanlılarda ünvanı devletin ilk dönemlerinde askeri bir ünvandır. 19. yüzyıla doğru sivillere de verilmiştir, ancak bu askeri bir ünvandan ziyade sivil bir düzeyin askeri bir denkliği şeklindedir. Hatırladığım kadarıyla klasik dönemde Beylerbeyi veya eyalet valisi düzeyinde paşa ünvanı veriliyordu. Özelikle Fatih\'ten sonra devşirme sistemiyle bu paşalar yetiştirilmeye başlandı. Bu insanlar tamamen asker ve yönetici olmaları için yetiştiriliyordu. Klasik dönemin sonlarına kadar yöneticiler genellikle asker kökenliydiler daha sonra kalemiye denilen sınıfın eline geçti. Savaşların nasıl yönetildiği ile ilgili ise herhangi bir yetkinliğim yok, bu soruya askeri tarih ile ilgilenenler daha iyi cevap verebilirler.', 'ahmet@gmail.com', 5, 16, '2021-12-28 13:17:11'),
(110, 'Rüyalarımızda yaşadığımız algıların ve duyguların farkında olsak da uyanık olduğumuz zamanki gibi bilinçli değiliz. Bu bilinçsizlik durumu nedeniyle çoğunlukla rüyalarımızı kontrol edemeyiz. Ama bazen bilinçli olma durumu ile bilinçsiz olma durumu arasında bir tür \"yarı bilinç\"li olduğumuz zamanlar da oluşabiliyor. \r\n\r\nİşte bu durumda, rüyada olduğunuzun bilincinde olduğunuz için rüyalarınızı kontrol edebiliyorsunuz. Bu tür rüyalara \"lucid rüya\" deniliyor. Her insan bunu ömrü boyunca en az bir sefer deneyimleyebiliyor.\r\n\r\nDilerseniz bu konuda kaynaklara bıraktığım bağlantıdan daha fazla bilgi alabilirsiniz.', 'osman@gmail.com', 6, 17, '2021-12-28 13:21:20'),
(111, 'nasıl yönetelim :)', 'oguzhan@gmail.com', 3, 17, '2021-12-28 13:22:00'),
(112, 'ateş tabancası ve yeni bir mebrana ihtiyacın var', 'ahmet@gmail.com', 5, 18, '2021-12-28 13:24:42'),
(113, 'evin kaç yıllık yenilenmesi gerekiyordur', 'oguzhan@gmail.com', 3, 19, '2021-12-28 13:26:15'),
(114, 'duvarlarınıza rutubet önleyici strafor köpük yapıştırıp tekrardan alçı ve boya yaptırdıktan sonra düzelecektir', 'osman@gmail.com', 6, 19, '2021-12-28 13:28:32'),
(115, 'bence çıkarmaz', 'ahmet@gmail.com', 5, 20, '2021-12-28 13:31:13'),
(116, 'ben de ümitsizim', 'ssahin@gmail.com', 1, 20, '2021-12-28 13:31:30'),
(117, 'müneccim değiliz ne bilelim :)', 'oguzhan@gmail.com', 3, 21, '2021-12-28 13:32:37'),
(118, 'bu ay çıkarır adasd', 'osman@gmail.com', 6, 21, '2021-12-28 13:33:12'),
(119, 'vazgeçtim çıkarmaaz', 'osman@gmail.com', 6, 21, '2021-12-28 13:33:28'),
(120, 'dsadada', 'ssahin@gmail.com', 1, 21, '2021-12-29 09:54:10');

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
(110, 3, 'dislike'),
(111, 3, 'like'),
(112, 5, 'like'),
(113, 5, 'like'),
(114, 5, 'like'),
(115, 1, 'dislike'),
(115, 6, 'dislike'),
(116, 1, 'like'),
(116, 6, 'dislike'),
(117, 3, 'like'),
(118, 1, 'dislike'),
(119, 1, 'like');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `begeni_bilgisi`
--
ALTER TABLE `begeni_bilgisi`
  ADD UNIQUE KEY `user_id` (`user_id`,`soru_id`),
  ADD KEY `soru_id` (`soru_id`);

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
  MODIFY `soru_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `ıd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `begeni_bilgisi`
--
ALTER TABLE `begeni_bilgisi`
  ADD CONSTRAINT `begeni_bilgisi_ibfk_1` FOREIGN KEY (`soru_id`) REFERENCES `sorular` (`soru_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
