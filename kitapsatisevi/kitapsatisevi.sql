-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 12 Ara 2015, 03:55:54
-- Sunucu sürümü: 5.6.25
-- PHP Sürümü: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kitapsatisevi`
--
CREATE DATABASE IF NOT EXISTS `kitapsatisevi` DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci;
USE `kitapsatisevi`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `forumId` int(10) unsigned NOT NULL,
  `baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `kulId` int(10) unsigned NOT NULL,
  `goruntulenme` int(10) unsigned NOT NULL,
  `tarih` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `forummesaj`
--

CREATE TABLE IF NOT EXISTS `forummesaj` (
  `mesajId` int(10) unsigned NOT NULL,
  `forumId` int(10) unsigned NOT NULL,
  `kulId` int(10) unsigned NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE IF NOT EXISTS `kategoriler` (
  `kategoriId` int(10) unsigned NOT NULL,
  `kategoriAdi` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`kategoriId`, `kategoriAdi`) VALUES
(1, 'Hukuk'),
(2, 'Psikoloji'),
(3, 'Sanat'),
(4, 'Müzik');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitaplar`
--

CREATE TABLE IF NOT EXISTS `kitaplar` (
  `kitapId` int(10) unsigned NOT NULL,
  `kitapAdi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `kitapOzet` text COLLATE utf8_turkish_ci,
  `baskiSayisi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `tedarikSuresi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yazarId` int(10) unsigned NOT NULL,
  `kategoriId` int(10) unsigned NOT NULL,
  `yayineviId` int(10) unsigned NOT NULL,
  `kitapResim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `eklenmeTarihi` datetime NOT NULL,
  `fiyat` int(10) unsigned NOT NULL,
  `satilma` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kitaplar`
--

INSERT INTO `kitaplar` (`kitapId`, `kitapAdi`, `kitapOzet`, `baskiSayisi`, `tedarikSuresi`, `yazarId`, `kategoriId`, `yayineviId`, `kitapResim`, `eklenmeTarihi`, `fiyat`, `satilma`) VALUES
(1, 'Uluslararası İlişkilere Giriş', 'Türkiye’de Uluslararası İlişkiler bölümlerinde yaşanan başlıca sorunlardan birisi yeni başlayanlara hitap eden bir üslupla kaleme alınmış ve aynı zamanda, disiplinin temel konularını kapsayan bir Uluslararası İlişkilere Giriş kitabının olmayışıdır. Bu konuda yazılmış mevcut ders kitapları bu alanla yeni tanışmış öğrenciler için ya yeterince açık değildir ya da alanın temel konularını ele alma hususunda bazı yetersizlikler göstermektedir. Bu kitap, öncelikle, bu ihtiyaçları karşılamayı hedeflemektedir.\r\nUluslararası İlişkilere Giriş, Uluslararası İlişkiler disiplininin Türkiye’deki yarım yüzyıllık tarihini göz önünde bulundurarak gerek teori ve gerekse de kavramsal düzeyde bu disipline Türkiye’den yapılan katkıları da ele alarak benzerlerinden', '5.Baskı', '5-10 gün', 2, 4, 3, 'uploads/select.jpg', '2015-12-12 04:46:01', 150, 0),
(2, 'Stratejik Derinlik', '', '28.Baskı', '1-2 gün', 1, 1, 1, 'img/kitap.png', '2015-12-12 04:48:29', 10, 0),
(3, 'Felsefe Atlası ', '', '1.Baskı', '3-5 gün', 2, 2, 3, 'uploads/select_1.jpg', '2015-12-12 04:49:52', 2000, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitapyorum`
--

CREATE TABLE IF NOT EXISTS `kitapyorum` (
  `kitapyorumId` int(10) unsigned NOT NULL,
  `kulId` int(10) unsigned NOT NULL,
  `kitapId` int(10) unsigned NOT NULL,
  `yorum` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kitapyorum`
--

INSERT INTO `kitapyorum` (`kitapyorumId`, `kulId`, `kitapId`, `yorum`, `tarih`) VALUES
(1, 1, 1, 'deneme yorumu', '2015-12-12 04:47:39');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE IF NOT EXISTS `kullanici` (
  `kulId` int(11) unsigned NOT NULL,
  `kulAdi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `eposta` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `adi` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `soyadi` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `cinsiyet` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `adres` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `dYer` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `dTarih` date DEFAULT NULL,
  `ogrenimDurumu` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `resim` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `soru` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `cevap` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `unuttumKod` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `onay` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Onaylanmadı',
  `oncekiLogin` datetime NOT NULL,
  `tur` varchar(255) COLLATE utf8_turkish_ci DEFAULT 'Kullanıcı'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kulId`, `kulAdi`, `eposta`, `sifre`, `adi`, `soyadi`, `cinsiyet`, `tel`, `adres`, `dYer`, `dTarih`, `ogrenimDurumu`, `resim`, `soru`, `cevap`, `unuttumKod`, `onay`, `oncekiLogin`, `tur`) VALUES
(1, 'arif', 'cwepicentre@gmail.com', '12345678', 'arif', 'demir', 'Bay', '5457325141', 'erzurum', 'Yalova', '1993-03-22', 'Üniversite', 'uploads/1939680_696556653721162_890300482_n.jpg', 'soru', 'cevap', '', 'Onaylandı', '2015-12-12 04:40:03', 'Admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfarapor`
--

CREATE TABLE IF NOT EXISTS `sayfarapor` (
  `raporId` int(10) unsigned NOT NULL,
  `kulId` int(10) unsigned NOT NULL,
  `girisTarihi` datetime NOT NULL,
  `aciklama` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sayfarapor`
--

INSERT INTO `sayfarapor` (`raporId`, `kulId`, `girisTarihi`, `aciklama`) VALUES
(1, 1, '2015-12-12 04:46:35', 'Anasayfaya girdi.'),
(2, 1, '2015-12-12 04:46:40', 'Uluslararası İlişkilere Giriş adlı kitabın sayfasına girdi.'),
(3, 1, '2015-12-12 04:47:19', 'Uluslararası İlişkilere Giriş adlı kitabın sayfasına girdi.'),
(4, 1, '2015-12-12 04:47:31', 'Uluslararası İlişkilere Giriş adlı kitabın sayfasına girdi.'),
(5, 1, '2015-12-12 04:47:39', 'Uluslararası İlişkilere Giriş adlı kitabın sayfasına girdi.'),
(6, 1, '2015-12-12 04:49:57', 'Anasayfaya girdi.'),
(7, 1, '2015-12-12 04:50:52', 'Anasayfaya girdi.'),
(8, 1, '2015-12-12 04:51:15', 'Anasayfaya girdi.'),
(9, 1, '2015-12-12 04:51:35', 'Anasayfaya girdi.'),
(10, 1, '2015-12-12 04:51:43', 'Sepetine kitap ekledi.'),
(11, 1, '2015-12-12 04:51:43', 'Sepetim sayfasına girdi.'),
(12, 1, '2015-12-12 04:51:53', 'Sepetinden kitap sildi.'),
(13, 1, '2015-12-12 04:51:54', 'Sepetim sayfasına girdi.'),
(14, 1, '2015-12-12 04:52:02', 'Sipariş sayfasına girdi.'),
(15, 1, '2015-12-12 04:52:08', 'Anasayfaya girdi.'),
(16, 1, '2015-12-12 04:52:10', 'Stratejik Derinlik adlı kitabın sayfasına girdi.'),
(17, 1, '2015-12-12 04:52:18', 'Anasayfaya girdi.'),
(18, 1, '2015-12-12 04:52:18', 'Yeniler sayfasına girdi.'),
(19, 1, '2015-12-12 04:52:19', 'Çok satılanlar sayfasına girdi.'),
(20, 1, '2015-12-12 04:52:20', 'Anasayfaya girdi.'),
(21, 1, '2015-12-12 04:52:22', 'Çok satılanlar sayfasına girdi.'),
(22, 1, '2015-12-12 04:52:30', 'Uluslararası İlişkilere Giriş adlı kitabın sayfasına girdi.'),
(23, 1, '2015-12-12 04:52:42', 'Sepetine kitap ekledi.'),
(24, 1, '2015-12-12 04:52:42', 'Sepetim sayfasına girdi.'),
(25, 1, '2015-12-12 04:52:45', 'Anasayfaya girdi.'),
(26, 1, '2015-12-12 04:52:46', 'Uluslararası İlişkilere Giriş adlı kitabın sayfasına girdi.'),
(27, 1, '2015-12-12 04:52:49', 'Sepetine kitap ekledi.'),
(28, 1, '2015-12-12 04:52:49', 'Sepetim sayfasına girdi.'),
(29, 1, '2015-12-12 04:52:52', 'Sepetindeki ürünleri satın alıp siparişe dönüştürdü.'),
(30, 1, '2015-12-12 04:52:52', 'Sipariş sayfasına girdi.'),
(31, 1, '2015-12-12 04:52:52', 'Sipariş sayfasına girdi.'),
(32, 1, '2015-12-12 04:54:25', 'Sipariş sayfasına girdi.'),
(33, 1, '2015-12-12 04:54:30', 'Sepetim sayfasına girdi.'),
(34, 1, '2015-12-12 04:54:31', 'Anasayfaya girdi.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

CREATE TABLE IF NOT EXISTS `sepet` (
  `sepetId` int(10) unsigned NOT NULL,
  `kulId` int(10) unsigned NOT NULL,
  `kitapId` int(10) unsigned NOT NULL,
  `adet` int(10) unsigned DEFAULT '0',
  `fiyat` int(11) NOT NULL,
  `siparisId` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sepet`
--

INSERT INTO `sepet` (`sepetId`, `kulId`, `kitapId`, `adet`, `fiyat`, `siparisId`) VALUES
(2, 1, 1, 2, 150, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE IF NOT EXISTS `siparis` (
  `siparisId` int(10) unsigned NOT NULL,
  `kulId` int(10) unsigned NOT NULL,
  `siparisAciklama` text COLLATE utf8_turkish_ci,
  `siparisOnay` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`siparisId`, `kulId`, `siparisAciklama`, `siparisOnay`, `tarih`) VALUES
(1, 1, 'Aslan parçası 2 gün içinde kargoya vericem. Verdikten sonra siparişin onay işlemini yapıcam.', 'Onaylanmadı', '2015-12-12 04:52:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yayinevleri`
--

CREATE TABLE IF NOT EXISTS `yayinevleri` (
  `yayineviId` int(10) unsigned NOT NULL,
  `yayineviAdi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yayineviAciklama` text COLLATE utf8_turkish_ci
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yayinevleri`
--

INSERT INTO `yayinevleri` (`yayineviId`, `yayineviAdi`, `yayineviAciklama`) VALUES
(1, 'ARTEMİS YAYINLARI', ''),
(2, 'YAPI KREDİ YAYINLARI', ''),
(3, 'PENA YAYINLARI', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazarlar`
--

CREATE TABLE IF NOT EXISTS `yazarlar` (
  `yazarId` int(10) unsigned NOT NULL,
  `yazarAdi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yazarAciklama` text COLLATE utf8_turkish_ci
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yazarlar`
--

INSERT INTO `yazarlar` (`yazarId`, `yazarAdi`, `yazarAciklama`) VALUES
(1, 'Aaron Ridley', 'sssssss'),
(2, 'Alain Corbin', 'nnnnn'),
(3, 'Leonard Smith', 'nnnnn');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`forumId`);

--
-- Tablo için indeksler `forummesaj`
--
ALTER TABLE `forummesaj`
  ADD PRIMARY KEY (`mesajId`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`kategoriId`);

--
-- Tablo için indeksler `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD PRIMARY KEY (`kitapId`);

--
-- Tablo için indeksler `kitapyorum`
--
ALTER TABLE `kitapyorum`
  ADD PRIMARY KEY (`kitapyorumId`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kulId`),
  ADD UNIQUE KEY `kulAdi` (`kulAdi`),
  ADD UNIQUE KEY `eposta` (`eposta`);

--
-- Tablo için indeksler `sayfarapor`
--
ALTER TABLE `sayfarapor`
  ADD PRIMARY KEY (`raporId`);

--
-- Tablo için indeksler `sepet`
--
ALTER TABLE `sepet`
  ADD PRIMARY KEY (`sepetId`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`siparisId`);

--
-- Tablo için indeksler `yayinevleri`
--
ALTER TABLE `yayinevleri`
  ADD PRIMARY KEY (`yayineviId`);

--
-- Tablo için indeksler `yazarlar`
--
ALTER TABLE `yazarlar`
  ADD PRIMARY KEY (`yazarId`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `forum`
--
ALTER TABLE `forum`
  MODIFY `forumId` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `forummesaj`
--
ALTER TABLE `forummesaj`
  MODIFY `mesajId` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `kategoriId` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `kitaplar`
--
ALTER TABLE `kitaplar`
  MODIFY `kitapId` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `kitapyorum`
--
ALTER TABLE `kitapyorum`
  MODIFY `kitapyorumId` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kulId` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `sayfarapor`
--
ALTER TABLE `sayfarapor`
  MODIFY `raporId` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- Tablo için AUTO_INCREMENT değeri `sepet`
--
ALTER TABLE `sepet`
  MODIFY `sepetId` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `siparisId` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `yayinevleri`
--
ALTER TABLE `yayinevleri`
  MODIFY `yayineviId` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `yazarlar`
--
ALTER TABLE `yazarlar`
  MODIFY `yazarId` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
