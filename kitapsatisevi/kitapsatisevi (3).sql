-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Anamakine: localhost
-- Üretim Zamanı: 10 Aralık 2015 saat 20:21:26
-- Sunucu sürümü: 5.6.26
-- PHP Sürümü: 5.6.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Veritabanı: `kitapsatisevi`
-- 

-- --------------------------------------------------------

-- 
-- Tablo yapısı: `favoriler`
-- 

CREATE TABLE `favoriler` (
  `idFavori` int(11) NOT NULL AUTO_INCREMENT,
  `idKullanici` int(11) NOT NULL,
  `idKitap` int(11) NOT NULL,
  PRIMARY KEY (`idFavori`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `favoriler`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `forumyorum`
-- 

CREATE TABLE `forumyorum` (
  `idYorum` int(11) NOT NULL AUTO_INCREMENT,
  `idKonu` int(11) NOT NULL,
  `Yorum` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `YorumTarih` date NOT NULL,
  `idKullanici` int(11) NOT NULL,
  PRIMARY KEY (`idYorum`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `forumyorum`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `kitaplar`
-- 

CREATE TABLE `kitaplar` (
  `idKitap` int(11) NOT NULL AUTO_INCREMENT,
  `idYazar` int(11) NOT NULL,
  `KitapAd` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Kategori` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `YayinEvi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `BasimTarihi` date NOT NULL,
  `Adet` int(11) NOT NULL,
  `Fiyat` int(11) NOT NULL,
  `Resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `EklemeTarihi` date NOT NULL,
  `Puan` int(11) NOT NULL,
  `TedarikSüresi` int(11) NOT NULL,
  PRIMARY KEY (`idKitap`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `kitaplar`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `kitapyorum`
-- 

CREATE TABLE `kitapyorum` (
  `idYorum` int(11) NOT NULL AUTO_INCREMENT,
  `idKitap` int(11) NOT NULL,
  `Yorum` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `YorumTarih` date NOT NULL,
  `idKullanici` int(11) NOT NULL,
  PRIMARY KEY (`idYorum`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `kitapyorum`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `konu`
-- 

CREATE TABLE `konu` (
  `idKonu` int(11) NOT NULL AUTO_INCREMENT,
  `Konu` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `idKullanici` int(11) NOT NULL,
  `EklemeTarihi` date NOT NULL,
  PRIMARY KEY (`idKonu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `konu`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `kullanici`
-- 

CREATE TABLE `kullanici` (
  `idKullanici` int(11) NOT NULL AUTO_INCREMENT,
  `KullaniciAd` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `KullaniciSoyad` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Eposta` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Sifre` int(10) NOT NULL,
  `Resim` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Dtarih` date NOT NULL,
  `Adres` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Gsm` int(10) NOT NULL,
  `Cinsiyet` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `OnayDurumu` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`idKullanici`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci AUTO_INCREMENT=4 ;

-- 
-- Tablo döküm verisi `kullanici`
-- 

INSERT INTO `kullanici` VALUES (1, '', '', 'asdasd', 0, '0', '0000-00-00', '', 0, '', '');
INSERT INTO `kullanici` VALUES (2, '', '', 'qweqwe', 0, '0', '0000-00-00', '', 0, '', '');
INSERT INTO `kullanici` VALUES (3, 'kerem', '', 'kerem@hotmail.com', 123123, '', '0000-00-00', '', 0, '', '');

-- --------------------------------------------------------

-- 
-- Tablo yapısı: `mesajlar`
-- 

CREATE TABLE `mesajlar` (
  `idMesaj` int(11) NOT NULL,
  `gelenMesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `gidenMesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `idKullanici` int(11) NOT NULL,
  PRIMARY KEY (`idKullanici`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- 
-- Tablo döküm verisi `mesajlar`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `siparis`
-- 

CREATE TABLE `siparis` (
  `idSiparis` int(11) NOT NULL,
  `idKitap` int(11) NOT NULL,
  `S.Tarihi` date NOT NULL,
  `T.Adresi` text COLLATE utf8_turkish_ci NOT NULL,
  `SiparisKodu` int(11) NOT NULL,
  `Tedarik` int(11) NOT NULL,
  PRIMARY KEY (`idSiparis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- 
-- Tablo döküm verisi `siparis`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `yayinevi`
-- 

CREATE TABLE `yayinevi` (
  `idYayinevi` int(11) NOT NULL AUTO_INCREMENT,
  `Yayinevi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `idKitap` int(11) NOT NULL,
  PRIMARY KEY (`idYayinevi`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `yayinevi`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `yazar`
-- 

CREATE TABLE `yazar` (
  `idYazar` int(11) NOT NULL AUTO_INCREMENT,
  `YazarAd` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `idKitap` int(11) NOT NULL,
  PRIMARY KEY (`idYazar`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `yazar`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `yonetici`
-- 

CREATE TABLE `yonetici` (
  `idYonetici` int(11) NOT NULL AUTO_INCREMENT,
  `YoneticiAd` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `YoneticiSoyad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Eposta` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Sifre` int(11) NOT NULL,
  `Resim` varchar(55) COLLATE utf8_turkish_ci NOT NULL,
  `Dtarih` date NOT NULL,
  `Dyeri` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `EgitimDurumu` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Meslek` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Adres` text COLLATE utf8_turkish_ci NOT NULL,
  `Gsm` int(11) NOT NULL,
  `Cinsiyet` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`idYonetici`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=13 ;

-- 
-- Tablo döküm verisi `yonetici`
-- 

INSERT INTO `yonetici` VALUES (1, 'kerem', 'uzun', 'kerembh4@gmail.com', 12345, '', '1993-01-31', '', '', '', 'asdasdasdasdasd', 0, 'bay');
INSERT INTO `yonetici` VALUES (10, 'rana', 'sarı', 'rana@sari.com', 123456, '149cfd6eae6ce3add9d2f047fc4a5182.png', '1999-01-01', 'corum', 'bote', 'bilgi', 'adresadı:ev1,ad:rana,soyad:sarı,tel:8123812,adres:kerem jsdnjasndjasd,il:yalova,ilçe:merkez', 8123812, 'bayan');
INSERT INTO `yonetici` VALUES (11, 'kerem', 'uzun', 'kerem@hotmail.com', 123123, '762730132912773a0f75ff677802e0d6.png', '1121-03-13', 'yalova', 'merkez', 'bote', 'adresadı:asdasd,ad:kerem,soyad:uzun,tel:1231231,adres:wkerqfqsdfnqıdfqdm,il:yalova,ilçe:merkez', 1231231, 'bayan');
INSERT INTO `yonetici` VALUES (12, 'feray', 'guler', 'feray@hotmail.com', 123123, 'b9f3ee4bc705aef4cbcd58bd5dfc77b6.png', '1993-05-23', 'maras', 'bote', 'bote', 'adresadı:feray,ad:asd,soyad:asd,tel:23452341,adres:mara merkez,il:bingöl,ilçe:göreme', 23452341, 'bayan');
