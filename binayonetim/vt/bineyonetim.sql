-- --------------------------------------------------------
-- Sunucu:                       127.0.0.1
-- Sunucu versiyonu:             10.1.19-MariaDB - mariadb.org binary distribution
-- Sunucu İşletim Sistemi:       Win32
-- HeidiSQL Sürüm:               9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- binayonetim için veritabanı yapısı dökülüyor
CREATE DATABASE IF NOT EXISTS `binayonetim` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci */;
USE `binayonetim`;


-- tablo yapısı dökülüyor binayonetim.daire
CREATE TABLE IF NOT EXISTS `daire` (
  `daireId` int(11) NOT NULL AUTO_INCREMENT,
  `siteAdi` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `blok` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `daireNo` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `mahalle` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `ilce` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `il` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `dairetip` int(11) DEFAULT NULL,
  PRIMARY KEY (`daireId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- binayonetim.daire: ~2 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `daire` DISABLE KEYS */;
INSERT INTO `daire` (`daireId`, `siteAdi`, `blok`, `daireNo`, `mahalle`, `ilce`, `il`, `dairetip`) VALUES
	(1, 'Yunus Emre', '4', '7', 'Sümer', 'merkez', 'BOLU', 2),
	(2, 'Yunus Emre', '7', '11', 'borazan', 'merkez', 'BOLU', 2);
/*!40000 ALTER TABLE `daire` ENABLE KEYS */;


-- tablo yapısı dökülüyor binayonetim.duyurular
CREATE TABLE IF NOT EXISTS `duyurular` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik` varchar(200) COLLATE utf8_turkish_ci DEFAULT NULL,
  `icerik` text COLLATE utf8_turkish_ci,
  `tarih` varchar(200) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- binayonetim.duyurular: ~0 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `duyurular` DISABLE KEYS */;
/*!40000 ALTER TABLE `duyurular` ENABLE KEYS */;


-- tablo yapısı dökülüyor binayonetim.kiraci
CREATE TABLE IF NOT EXISTS `kiraci` (
  `kulid` int(11) DEFAULT NULL,
  `daireId` int(11) DEFAULT NULL,
  `aidatMiktar` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kiraMiktar` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `oturmaTarihi` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- binayonetim.kiraci: ~2 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `kiraci` DISABLE KEYS */;
INSERT INTO `kiraci` (`kulid`, `daireId`, `aidatMiktar`, `kiraMiktar`, `oturmaTarihi`, `durum`) VALUES
	(2, 1, '-', '-', '2017-10-27 13:59:57', '1'),
	(3, 2, '-', '-', '2017-10-27 16:38:34', '1');
/*!40000 ALTER TABLE `kiraci` ENABLE KEYS */;


-- tablo yapısı dökülüyor binayonetim.kullanicilar
CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `soyad` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullaniciAdi` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sifre` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `eposta` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `telefon` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `son_giris` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `unvanId` int(11) DEFAULT NULL,
  `resim` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kullaniciAdi` (`kullaniciAdi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- binayonetim.kullanicilar: ~3 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `kullanicilar` DISABLE KEYS */;
INSERT INTO `kullanicilar` (`id`, `ad`, `soyad`, `kullaniciAdi`, `sifre`, `eposta`, `telefon`, `son_giris`, `unvanId`, `resim`) VALUES
	(1, 'Yönetici', 'Hesap', 'admin', '123', '-', '-', '-', 3, NULL),
	(2, 'yunus', 'Özdemir', 'yunusozdemir', '123', 'yunus.4@hotmail.com.tr', '05340141221', NULL, 1, 'yunusozdemir.jpg'),
	(3, 'asdas', 'asada', 'qwert', '123', 'qwer@asdsa.com', '134567', NULL, 1, 'qwert.jpg');
/*!40000 ALTER TABLE `kullanicilar` ENABLE KEYS */;


-- tablo yapısı dökülüyor binayonetim.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menuAd` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `menuAdres` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `duzey` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `ustMenu` varchar(50) COLLATE utf8_turkish_ci DEFAULT '-',
  `yetkiDuzey` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- binayonetim.menu: ~15 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `menuAd`, `menuAdres`, `duzey`, `ustMenu`, `yetkiDuzey`) VALUES
	(1, 'Anasayfa', './index.php', '1', '-', 1),
	(2, 'Kullanıcı İşlemleri', '#', '1', '-', 3),
	(3, 'Kullanıcı Listesi', './kullanicilistesi.php', '2', '2', 3),
	(4, 'Kullanıcı Ekle', './kullaniciekle.php', '2', '2', 3),
	(7, 'Duyuru İşlemleri', '#', '1', '-', 3),
	(8, 'Tüm Duyurular', './tumduyurular.php', '2', '7', 3),
	(9, 'Duyuru Ekle', './duyuruekle.php', '2', '7', 3),
	(15, 'Daire İşlemleri', '#', '1', '-', 3),
	(16, 'Daire Listesi', './dairelistesi.php', '2', '15', 3),
	(17, 'Daire Ekle', './daireekle.php', '2', '15', 3),
	(20, 'Ödeme İşlemleri', '#', '1', '-', 3),
	(21, 'Ödeme Bilgisi Ekle', './odemebilgiekle.php', '2', '20', 3),
	(22, 'Ödemeleri Sorgula', './odemegoruntule.php', '2', '20', 3),
	(23, 'Bilgi Görüntüle', './kiraodemebilgi.php', '1', '-', 1),
	(26, 'Çıkış', './cikis.php', '1', '-', 1);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


-- tablo yapısı dökülüyor binayonetim.odemeler
CREATE TABLE IF NOT EXISTS `odemeler` (
  `kulid` int(11) DEFAULT NULL,
  `daireId` int(11) DEFAULT NULL,
  `tur` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `odemeDonemi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- binayonetim.odemeler: ~1 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `odemeler` DISABLE KEYS */;
INSERT INTO `odemeler` (`kulid`, `daireId`, `tur`, `odemeDonemi`) VALUES
	(2, 1, 'kira', 201709),
	(3, 2, 'kira', 201709);
/*!40000 ALTER TABLE `odemeler` ENABLE KEYS */;


-- tablo yapısı dökülüyor binayonetim.sahiplik
CREATE TABLE IF NOT EXISTS `sahiplik` (
  `kulid` int(11) DEFAULT NULL,
  `daireId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- binayonetim.sahiplik: ~2 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `sahiplik` DISABLE KEYS */;
INSERT INTO `sahiplik` (`kulid`, `daireId`) VALUES
	(1, 1),
	(1, 2);
/*!40000 ALTER TABLE `sahiplik` ENABLE KEYS */;


-- tablo yapısı dökülüyor binayonetim.unvan
CREATE TABLE IF NOT EXISTS `unvan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unvanAd` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- binayonetim.unvan: ~2 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `unvan` DISABLE KEYS */;
INSERT INTO `unvan` (`id`, `unvanAd`) VALUES
	(1, 'Kiracı'),
	(2, 'Ev Sahibi'),
	(3, 'Yönetici');
/*!40000 ALTER TABLE `unvan` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
