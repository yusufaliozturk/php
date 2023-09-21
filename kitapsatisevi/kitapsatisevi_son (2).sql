-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Anamakine: localhost
-- Üretim Zamanı: 29 Aralık 2015 saat 11:54:33
-- Sunucu sürümü: 5.6.26
-- PHP Sürümü: 5.6.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Veritabanı: `kitapsatisevi2`
-- 

-- --------------------------------------------------------

-- 
-- Tablo yapısı: `forumkonu`
-- 

CREATE TABLE `forumkonu` (
  `idKonu` int(11) NOT NULL AUTO_INCREMENT,
  `idKullanici` int(11) NOT NULL,
  `Konu` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `KonuTarih` datetime NOT NULL,
  PRIMARY KEY (`idKonu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=20 ;

-- 
-- Tablo döküm verisi `forumkonu`
-- 

INSERT INTO `forumkonu` VALUES (16, 3, 'KÜRESEL ISINMA', '2015-12-28 12:06:29');
INSERT INTO `forumkonu` VALUES (17, 3, 'MODERNÇİN', '2015-12-28 12:10:00');
INSERT INTO `forumkonu` VALUES (18, 3, 'kerem', '2015-12-28 17:16:31');
INSERT INTO `forumkonu` VALUES (19, 3, 'YENİ KONU', '2015-12-29 08:12:36');

-- --------------------------------------------------------

-- 
-- Tablo yapısı: `forumyorum`
-- 

CREATE TABLE `forumyorum` (
  `idYorum` int(11) NOT NULL AUTO_INCREMENT,
  `idKonu` int(11) NOT NULL,
  `idKullanici` int(11) NOT NULL,
  `Yorum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `YorumTarih` datetime NOT NULL,
  PRIMARY KEY (`idYorum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

-- 
-- Tablo döküm verisi `forumyorum`
-- 

INSERT INTO `forumyorum` VALUES (31, 16, 3, 'BENİM ADIM KEREM ', '2015-12-28 12:06:39');
INSERT INTO `forumyorum` VALUES (32, 16, 3, 'asdasd', '2015-12-28 12:07:42');
INSERT INTO `forumyorum` VALUES (33, 16, 3, 'asdasdsa', '2015-12-28 12:08:32');
INSERT INTO `forumyorum` VALUES (34, 16, 3, 'kerem uzun', '2015-12-28 12:08:51');
INSERT INTO `forumyorum` VALUES (35, 16, 3, 'kerem uzun', '2015-12-28 12:09:09');
INSERT INTO `forumyorum` VALUES (36, 16, 3, 'kerem uzun', '2015-12-28 12:09:40');
INSERT INTO `forumyorum` VALUES (37, 17, 3, 'kerem uzn', '2015-12-28 12:10:06');
INSERT INTO `forumyorum` VALUES (38, 17, 3, 'asdasd', '2015-12-28 12:10:42');
INSERT INTO `forumyorum` VALUES (39, 17, 3, 'kerem uzun', '2015-12-28 12:10:57');
INSERT INTO `forumyorum` VALUES (40, 16, 2, 'RANAYIM BEN', '2015-12-28 12:12:12');
INSERT INTO `forumyorum` VALUES (41, 16, 3, 'kerem', '2015-12-28 13:02:51');
INSERT INTO `forumyorum` VALUES (42, 16, 3, 'asdasdasd', '2015-12-28 13:03:03');
INSERT INTO `forumyorum` VALUES (43, 18, 3, 'asd', '2015-12-28 17:16:36');
INSERT INTO `forumyorum` VALUES (44, 16, 3, 'SEA', '2015-12-28 18:31:19');
INSERT INTO `forumyorum` VALUES (45, 16, 3, 'asd', '2015-12-28 18:31:54');
INSERT INTO `forumyorum` VALUES (46, 16, 3, 'asd', '2015-12-28 18:31:58');
INSERT INTO `forumyorum` VALUES (47, 18, 3, 'kerem', '2015-12-28 18:32:37');
INSERT INTO `forumyorum` VALUES (48, 16, 3, 'kerem uzun', '2015-12-28 18:35:46');
INSERT INTO `forumyorum` VALUES (49, 19, 3, 'Bu site itp dersi kapsamında yapılmıştır. AİBÜ ', '2015-12-29 08:13:01');
INSERT INTO `forumyorum` VALUES (50, 19, 3, 'Yorumlar neden  bastığım gib eklenmiyor aşağıda spoiler veriyim', '2015-12-29 08:15:42');
INSERT INTO `forumyorum` VALUES (51, 19, 3, 'SPOİLER', '2015-12-29 08:16:02');
INSERT INTO `forumyorum` VALUES (52, 19, 3, 'EVERYBODY DANCE NOW :D', '2015-12-29 08:16:20');

-- --------------------------------------------------------

-- 
-- Tablo yapısı: `kategoriler`
-- 

CREATE TABLE `kategoriler` (
  `idKategori` int(11) NOT NULL AUTO_INCREMENT,
  `Kategori` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`idKategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=11 ;

-- 
-- Tablo döküm verisi `kategoriler`
-- 

INSERT INTO `kategoriler` VALUES (1, 'Bilim');
INSERT INTO `kategoriler` VALUES (2, 'Ekonomi');
INSERT INTO `kategoriler` VALUES (3, 'Felsefe');
INSERT INTO `kategoriler` VALUES (4, 'Din');
INSERT INTO `kategoriler` VALUES (5, 'Macera');
INSERT INTO `kategoriler` VALUES (6, 'Tarih');
INSERT INTO `kategoriler` VALUES (7, 'Sanat');
INSERT INTO `kategoriler` VALUES (8, 'Müzik');
INSERT INTO `kategoriler` VALUES (9, 'Sinema');
INSERT INTO `kategoriler` VALUES (10, 'Tiyatro');

-- --------------------------------------------------------

-- 
-- Tablo yapısı: `kitaplar`
-- 

CREATE TABLE `kitaplar` (
  `idKitap` int(11) NOT NULL AUTO_INCREMENT,
  `YazarAd` text COLLATE utf8_turkish_ci NOT NULL,
  `KitapAd` text COLLATE utf8_turkish_ci NOT NULL,
  `YayinEvi` text COLLATE utf8_turkish_ci NOT NULL,
  `BasimTarihi` date NOT NULL,
  `Adet` int(11) NOT NULL,
  `Fiyat` int(11) NOT NULL,
  `Resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `Kategori` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `EklemeTarihi` date NOT NULL,
  `Puan` int(11) NOT NULL,
  `TedarikSuresi` int(11) NOT NULL,
  PRIMARY KEY (`idKitap`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=44 ;

-- 
-- Tablo döküm verisi `kitaplar`
-- 

INSERT INTO `kitaplar` VALUES (27, 'Patrizia Castelli', 'RÖNESANS ESTETİĞİ', 'DOST', '1999-12-01', 11, 25, 'resim/as4381.jpg', 'Rönesans boyunca, estetik kategoriler, hayata ve gerçeklik kavram?na ili?kin kimi yap?lar?n tasarlanmas?nda izlenen farkl? yollar? temsil etmekteydi. “Oran”, “ölçü”, “mimesis”, “ékphrasis”, “???k” gibi kavramlar, sadece figüratif sanatlar? ba?layan esteti', 'Bilim', '0000-00-00', 0, 12);
INSERT INTO `kitaplar` VALUES (25, 'Mark Maslin', 'KÜRESEL ISINMA', 'DOST', '2000-12-13', 6, 11, 'resim/yu6848.jpg', 'Çağın üzerinde en çok tartışılan kavramlarından birini odağına alan bu çalışma, küresel ısınmanın öngörülebilir etkileri kadar, yakın bir gelecekte insanlığı bekleyen hesaba katılmadık sonuçlar konusunda da özenli bir çözümleme sunuyor. Uluslararası kurul', 'Bilim', '0000-00-00', 0, 5);
INSERT INTO `kitaplar` VALUES (28, 'Georg C. Lichtenberg', 'AFORİZMALAR', 'DOST', '1991-04-12', 4, 9, 'resim/as3884.jpg', '18. yüzyılda yaşamış Alman filozof, fizik ve astronomi profesörü Lichtenberg, dünyada aforizmanın en büyük ustalarından biri olarak tanınıyor. Nietzsche''nin, "tekrar tekrar okunacak dört Alman nesir eserinden biri" diye övdüğü bu notlar ve aforizmalar şimdi Türkçe', 'Edebiyat', '0000-00-00', 0, 3);
INSERT INTO `kitaplar` VALUES (29, 'Ali Karabayram', 'BEYHUDE', 'DOST', '2009-08-08', 7, 7, 'resim/ty456.jpg', 'Oysa bıraktığın her iz, mürekkep gönü bir sır gibi kurusa da dokununca, kanatlı bir mıh gibi dövse de çatlayan göğsünü, yine aynı kum küredikçe çoğalan, yine aynı el işten yetirdiğin, dokun ki eskisin, toprağa ayrı gömdüğün, rüzgâra ayrı sustuğun hevesin.', 'Edebiyat', '0000-00-00', 0, 4);
INSERT INTO `kitaplar` VALUES (33, 'Levend Kılıç', 'FOTOĞRAF VE SİNEMANIN TOPLUMSAL TARİHİ', 'DOST', '1999-12-12', 4, 30, 'resim/as3795.jpg', 'Bu kitapta, insanlık tarihinin belli dönemlerdeki düşünsel yapısının şekillenmesiyle birlikte fotoğraf ve sinemanın teknolojik gelişimi anlatılmaktadır.Fotoğraf ve Sinemanın Toplumsal Tarihi, fotoğraf ve sinemanın tarihiyle ilgili farklı bir anlayışı sunuyor. Fotoğraf yeni bir resmetme tekniğidir. Sinema da onun izinden gelmiştir. Bunlar aynı zamanda mekanik çoğaltma teknolojileridir ve zaman içinde sanat ortamına girmişlerdir.Bütün bunlar, toplumsal yaşamı yönlendiren olaylardan bağımsız değildir. Toplumsal yaşama yön veren düşünsel gelişmeleri görmezden gelerek, teknolojinin sağladıklarını anlamak eksik olur. Nesnelerin tarihi insanlığın tarihidir. Nesnelerin tarihini anlatmak, aynı zamanda insanlık tarihini de anlatmaktadır. Levend Kılıç bu kitabında, yüzey üzerinde optik yoluyla resmetme anlayışının fotoğraf olarak ortaya çıkışı ve hareketli görüntü olarak gelişmesini anlatırken, 1800''lü ve 1900''lü yılların düşünsel yapısını da ortaya koymuştur.', 'Sinema', '0000-00-00', 0, 3);
INSERT INTO `kitaplar` VALUES (32, 'Kurtuluş Özyazıcı', 'AKTÖR DEDİĞİN NEDİR Kİ?', 'DOST', '0000-00-00', 4, 12, 'resim/as8272.jpg', '- Münir Özkul Kitabı – Hababam Sınıfı’nın idealist ve iyi yürekli Mahmut Hoca’sı, Türk tiyatrosunun İsmail Dümbüllü’den sonraki Kavuklu’su, beyazperdenin ve sahnelerin yorulmak bilmez emekçisi, ustası… Münir Özkul’u birkaç kelimeyle anlatmak mümkün değil kuşkusuz. Özkul üzerine yazılmış incelemeleri ve tanıklıkları bir araya getiren bu küçük derleme, ünlü aktörün bu esinleyici ve cesur çabasını türlü yönleriyle değerlendirirken, Türk sinemasının ve tiyatrosunun bir dönemine de ışık tutuyor. Geleneksel tiyatro anlayışından beslenerek hem sahnede hem de sinemanın yakın geçmişindeki bir dizi unutulmaz kompozisyona imza atan Özkul, sabır ve inanç yüklü oyunculuk serüveniyle genç kuşaklar için yol gösterici olmayı sürdürüyor. Aktör Dediğin Nedir ki, Münir Özkul’un sanat yaşamının yol haritası aynı zamanda.', 'Sinema', '0000-00-00', 0, 5);
INSERT INTO `kitaplar` VALUES (34, 'Nejat Ulusay', 'MELEZ İMGELER', 'DOST', '2000-12-15', 6, 9, 'resim/fg1108.jpg', '- Sinema ve Ulusötesi Oluşumlar - Sinemanın yirminci yüzyıl sonunda geldiği nokta, yedinci sanatı kültürel alışverişin en işlek ve hareketli kavşak noktalarından biri haline getirdi. Kültürel bir araştırma sahası olarak sinemanın yaşadığı bu dönüşüm, daha kapsamlı ve geniş erimli bir bakışa gereksiniyor. Bu temel savı çıkış noktası olarak alan Ulusay, yurtdışında yaşayan Türk ve/veya Türk asıllı yönetmenler üzerinden kültürlerarasılık, kültürel aktarım gibi argümanları derinlikli biçimde çözümlüyor. Geniş ama bir o kadar kaygan ve ele avuca sığmaz bir arkaplanın belirleyiciliğini bu kültürel alışverişin temel referans noktalarının bütünlüğü içinde irdeliyor.', 'Sinema', '0000-00-00', 0, 4);
INSERT INTO `kitaplar` VALUES (35, 'Mario Pezzella', 'SİNEMADA ESTETİK  ', 'DOST', '1990-12-15', 3, 9, 'resim/ty9569.jpg', 'Modernitenin başat sanatsal ifade biçimi olarak görülen sinema, kısa tarihi boyunca yarattığı kapsayıcı etkiyle gerçek bir fenomene dönüştü. İzleyeni perdede gördükleriyle özdeşleşmeye çağıran, edilginleştirici bir kitlesel gösteri etkinliğinden eleştirel/katılımcı bir ifade ve izleme pratiğine vardı insanlık. Sinema estetiği ise sinemanın kurucu öğelerini sinematografik bir dile has görsel temsil biçimlerinden montaj ve kurgu tekniklerine uzanan bir bütünlükte yeniden çözümleyen bir araştırma alanı olarak ortaya çıktı. İcadından bir asır sonra, pazar dinamikleri içinde tüketilen seyirlik bir gösteri eyleminden hala bozulmamış kalabilen bir büyünün dayanaklarına ve kaynaklarına dek özellikli bir soruşturma.', 'Sinema', '0000-00-00', 0, 5);
INSERT INTO `kitaplar` VALUES (36, 'Keith Robbins', 'BİRİNCİ DÜNYA SAVAŞI  ', 'DOST', '2000-12-16', 4, 13, 'resim/rt2197.jpg', 'Birinci dünya Savaşı’nda siperlerdeki trajik katliam modern hafızada yer etmiştir; ne var ki, çok geçmeden ‘cesaretin işe yaramaz’ olarak algılandığı, ne için savaşıldığını ya da savaşanların ne elde ettiğini söylemenin zorlaştığı bu savaşı daha geniş boyutta kavramak gerekir. Savaş şairleri, savaşın amaçlarına ve barış çabalarına ilişkin diplomasi, lojistik ve ‘savaş deneyimi’ gibi birçok çalışmanın ihmal ettiği alanları mercek altına alan Keith Robbins, bu soruna iki açıdan yaklaşıyor: Büyük Güçler arasında yapılan ittifakların karmaşık politik ve diplomatik arka planını çözümlerken, savaş, deneyimini bireyleri ve ulusları savaşın içine çeken farklı açılardan inceleyerek, 1914-18 arasında Avrupa’daki atmosferi yakalamaya çalışıyor. Batı ve doğu cephelerindeki savaşları açık ve kronolojik bir sırayla vermeyi ihmal etmeyen “Birinci Dünya Savaşı”, çok ilginç ve okuru zorlayıcı bir çözümleme.', 'Tarih', '0000-00-00', 0, 3);
INSERT INTO `kitaplar` VALUES (37, 'R. A. C. Parker', 'İKİNCİ DÜNYA SAVAŞI   2. BASKI', 'DOST', '1990-12-15', 3, 24, 'resim/rt4962.jpg', 'Savaşın nedenlerini, kazandırdıklarını, kaybettirdiklerini ve muazzam genişlikte bir alanı etkileyen sonuçlarını araştıran “ İkinci Dünya Savaşı”, kısa ve yoğun olmasının yanında kapsamlı ve sürükleyici bir savaş tarihi. Avrupa ve Uzakdoğu’da yapılan savaşlardaki anahtar olayların izini sürerken, R. A. C. Parker, tarafların stratejilerini, bu stratejileri belirleyen ekonomileri ve toplumları, bu toplumların savaş güçlerinin direncini ve zayıflığını ana hatlarıyla anlatıyor. Kesin zaferle biten çarpışmaları sonuçlarıyla birlikte irdelerken, okurun dikkatini bu savaşa özgü bazı olgulara ( seyyar ordu, zorla göç, Yahudi katliamı, stratejik ve nükleer bombardıman) çekmeyi amaçlıyor. Belgelerin eşsiz rehberliğine dayanan, ikinci dünya Savaşı’nın nedenlerine ve seyrine dair çok dengeli bir bakış açısı sunan, savaşı farklı tüm yönleriyle anlatan usta işi bir anlatı', 'Tarih', '0000-00-00', 0, 5);
INSERT INTO `kitaplar` VALUES (38, 'Rana Mitter', 'MODERN ÇİN', 'DOST', '2000-12-01', 4, 11, 'resim/as6347.jpg', 'Modern Çin’in çelişkilerle dolu bir araştırma sahası olduğuna kuşku yok. Dünyanın en fütüristik kentlerinden bir kaçını barındıran bir köylü toplumu, modern bir kimlik arayışındaki kadim bir gelenek ve daha birçok can alıcı karşıtlık. Elinizdeki kitap, Çin’in modern zamanlarda yaşadığı baş döndürücü gelişimi bu karşıtlıklar sarmalı içindeki başat kopuş ve bağlantı noktalarını esas olarak irdeliyor. Kadın haklarından Pekin Olimpiyatları’na, Ekonomik patlamadan komünist mirasın etkilerine kadar birçok ekseni kat ederek…', 'Tarih', '0000-00-00', 0, 3);
INSERT INTO `kitaplar` VALUES (39, 'Robert J. McMahon', 'SOĞUK SAVAŞ  ', 'DOST', '1995-12-01', 4, 13, 'resim/rt8.jpg', 'İkinci Dünya Savaşı’nın ardından kutuplaşan dünyanın en can alıcı olgularından biri soğuk savaş. Dünya halklarının birçok politik, kültürel ve iktisadi çalkantıyla başa çıkmaya çalıştığı bu dönem, yakın tarihin en ihtilaflı tartışma konularından biri olmayı sürdürüyor. ABD ve Sovyet bloğunun yanı sıra üçüncü dünya için de oldukça kritik bir geçiş dönemi sayılan bu tarihsel kesiti objektif bir bakış açısıyla değerlendiriyor bu çalışma. Dönemin birçok aktörünü ve bu ihtilafın başat ideolojik kavramlarını geniş bir perspektif içinde ele alırken üçüncü binyılın kimi temel sorunlarını da irdelemeyi mümkün kılan tarihsel sonuçları gözler önüne seriyor. Soğuk savaşın türlü biçimler altında varlığını sürdürdüğü güncel bir ajandayı sorgulamayı da ihmal etmiyor.', 'Tarih', '0000-00-00', 0, 3);
INSERT INTO `kitaplar` VALUES (40, 'J. M. Robert', 'YİRMİNCİ YÜZYIL TARİHİ  ', 'DOST', '2000-12-02', 4, 55, 'resim/yu5407.jpg', 'Karışıklıklar, savaşlar ve buhranlarla dolu bir yüzyılı anlatan bu kitap, sadece tüm bu tarihsel olayların temel olduğu görünür gerçekliği değil, onların altında yatan gizli ve ikincil anlam ve itkileri de sorgulayan bir başvuru kaynağı. İnsanlık tarihinin dönüm noktalarından biri olduğunda birleşilen yirminci yüzyıl, iç içe geçmiş bir ilişkiler ağı ve çıkar ortaklıklarından karşılıklı bağımlılık ve teknolojik belirlenimciliğe uzanan türlü olguları içinde barındıran bir kesit olarak, gelecek yüzyılları da biçimleyen bir değişim dinamiğinin motoru olarak görülmekte.', 'Tarih', '0000-00-00', 0, 3);
INSERT INTO `kitaplar` VALUES (41, 'Xavier Barral', 'SANAT TARİHİ', 'DOST', '1999-12-11', 12, 9, 'resim/fg8758.jpg', 'Sanat eserinin ne olduğu ve nasıl incelenmesi gerektiği, sanat tarihi diye bildi?imiz engin alanın iki temel dayanağını oluşturuyor. Konusu ve araştırma yöntemleri itibarıyla özerk bir disiplin olarak aralıklı bir yere sahip olan sanat tarihi, kültür ve', 'Sanat', '0000-00-00', 0, 3);
INSERT INTO `kitaplar` VALUES (43, 'Kerem Yalçın', 'KEREMİN HAYATI', 'Arinna YAyıncılık', '2010-10-21', 31, 10, 'resim/ty2910.jpg', '1994 yılınca düzcede doğdu adı kerem yalçın ama  resim bulamadığımızdan kerem uzunun resmini koyduk affola SA', 'Sanat', '0000-00-00', 0, 1);

-- --------------------------------------------------------

-- 
-- Tablo yapısı: `kullanici`
-- 

CREATE TABLE `kullanici` (
  `idKullanici` int(11) NOT NULL AUTO_INCREMENT,
  `KullaniciAd` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Ad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Soyad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Eposta` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Sifre` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Dtarih` date NOT NULL,
  `Dyeri` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `OgrenimDurumu` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Meslek` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Durum` int(255) NOT NULL DEFAULT '2',
  `Onay` int(11) NOT NULL DEFAULT '0',
  `Adres` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `il` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ilce` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Gsm` int(255) NOT NULL,
  `Cinsiyet` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  `SonLogin` datetime DEFAULT NULL,
  `AbonelikTarih` int(255) DEFAULT NULL,
  `GizliSoru` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `GizliCevap` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`idKullanici`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=5 ;

-- 
-- Tablo döküm verisi `kullanici`
-- 

INSERT INTO `kullanici` VALUES (1, 'Feray', '', '', 'ferayguler26@gmail.com', '123', '0', '0000-00-00', '', '', '', 1, 1, '', '', '', 0, '', '0000-00-00 00:00:00', NULL, '', '');
INSERT INTO `kullanici` VALUES (2, 'Rana', '', '', 'ranasari@gmail.com', '222', 'resim/ku7981.png', '0000-00-00', '', '', 'böteci', 2, 1, 'çorum çorum çorum', 'Bursa', 'asdasdasd', 0, 'bos', '0000-00-00 00:00:00', NULL, 'seciniz', '');
INSERT INTO `kullanici` VALUES (3, 'kerem', 'kerem', 'uzunasdasa', 'kerem@hotmail.com', '123123123', 'resim/kb8497.png', '1993-01-31', 'yalova', 'Ortaokul', 'bote', 1, 1, 'asdasd', 'Bolu', 'merkez', 1231231, 'Bay', '0000-00-00 00:00:00', NULL, 'En sevdiginiz renk hangisidir?', 'mavi');
INSERT INTO `kullanici` VALUES (4, 'Yusuf', 'Yusuf', 'Öztürk', 'yusuf@gmail.com', '123qweasd', '', '0000-00-00', '', '', '', 1, 1, '', '', '', 0, '0', NULL, NULL, '', '');

-- --------------------------------------------------------

-- 
-- Tablo yapısı: `log`
-- 

CREATE TABLE `log` (
  `idLog` int(11) NOT NULL AUTO_INCREMENT,
  `idKullanici` int(11) NOT NULL,
  `Sayfa` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Tarih` datetime NOT NULL,
  PRIMARY KEY (`idLog`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=830 ;

-- 
-- Tablo döküm verisi `log`
-- 

INSERT INTO `log` VALUES (224, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:29:10');
INSERT INTO `log` VALUES (225, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:29:10');
INSERT INTO `log` VALUES (226, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:29:10');
INSERT INTO `log` VALUES (227, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:29:10');
INSERT INTO `log` VALUES (228, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:29:10');
INSERT INTO `log` VALUES (229, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:29:11');
INSERT INTO `log` VALUES (230, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:30:03');
INSERT INTO `log` VALUES (231, 3, 'Profiline Girdi', '2015-12-28 12:30:04');
INSERT INTO `log` VALUES (232, 3, 'Bilim. Kategorisine Girdi', '2015-12-28 12:30:05');
INSERT INTO `log` VALUES (233, 3, 'Edebiyat. Kategorisine Girdi', '2015-12-28 12:30:05');
INSERT INTO `log` VALUES (234, 3, 'Sanat. Kategorisine Girdi', '2015-12-28 12:30:06');
INSERT INTO `log` VALUES (235, 3, 'SANAT TAR?H?. Kitaba Girdi', '2015-12-28 12:30:06');
INSERT INTO `log` VALUES (236, 3, 'Sinema. Kategorisine Girdi', '2015-12-28 12:30:07');
INSERT INTO `log` VALUES (237, 3, 'AKTÖR DEDİĞİN NEDİR Kİ?. Kitaba Girdi', '2015-12-28 12:30:09');
INSERT INTO `log` VALUES (238, 3, 'rana. Kitabını Aradı', '2015-12-28 12:30:14');
INSERT INTO `log` VALUES (239, 3, 'rana. Yazarını Aradı', '2015-12-28 12:30:18');
INSERT INTO `log` VALUES (240, 3, 'Profiline Girdi', '2015-12-28 12:30:21');
INSERT INTO `log` VALUES (241, 3, 'Bilgi Güncellemeye Girdi', '2015-12-28 12:30:23');
INSERT INTO `log` VALUES (242, 3, 'Sepetime Girdi', '2015-12-28 12:30:25');
INSERT INTO `log` VALUES (243, 3, 'Foruma Girdi', '2015-12-28 12:30:26');
INSERT INTO `log` VALUES (244, 3, 'Çıkış Yaptı', '2015-12-28 12:30:30');
INSERT INTO `log` VALUES (245, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:30:36');
INSERT INTO `log` VALUES (246, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:31:04');
INSERT INTO `log` VALUES (247, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:31:12');
INSERT INTO `log` VALUES (248, 3, 'Profiline Girdi', '2015-12-28 12:31:15');
INSERT INTO `log` VALUES (249, 3, 'Bilim. Kategorisine Girdi', '2015-12-28 12:31:16');
INSERT INTO `log` VALUES (250, 3, 'Sepetime Girdi', '2015-12-28 12:31:19');
INSERT INTO `log` VALUES (251, 3, 'Foruma Girdi', '2015-12-28 12:31:20');
INSERT INTO `log` VALUES (252, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:31:29');
INSERT INTO `log` VALUES (253, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:31:55');
INSERT INTO `log` VALUES (254, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:31:58');
INSERT INTO `log` VALUES (255, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:31:58');
INSERT INTO `log` VALUES (256, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:32:16');
INSERT INTO `log` VALUES (257, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:32:17');
INSERT INTO `log` VALUES (258, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:33:03');
INSERT INTO `log` VALUES (259, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:33:06');
INSERT INTO `log` VALUES (260, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:33:18');
INSERT INTO `log` VALUES (261, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:33:26');
INSERT INTO `log` VALUES (262, 3, 'Profiline Girdi', '2015-12-28 12:33:36');
INSERT INTO `log` VALUES (263, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:33:37');
INSERT INTO `log` VALUES (264, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:34:53');
INSERT INTO `log` VALUES (265, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:35:21');
INSERT INTO `log` VALUES (266, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:49:25');
INSERT INTO `log` VALUES (267, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 12:49:40');
INSERT INTO `log` VALUES (268, 3, 'AnaSayfaya Girdi', '2015-12-28 13:01:23');
INSERT INTO `log` VALUES (269, 3, 'AnaSayfaya Girdi', '2015-12-28 13:01:41');
INSERT INTO `log` VALUES (270, 3, 'Yazarlar Sayfasına Girdi', '2015-12-28 13:01:43');
INSERT INTO `log` VALUES (271, 3, 'Yazarlar Sayfasına Girdi', '2015-12-28 13:02:20');
INSERT INTO `log` VALUES (272, 3, 'Yazarlar Sayfasına Girdi', '2015-12-28 13:02:22');
INSERT INTO `log` VALUES (273, 3, 'Sepetime Girdi', '2015-12-28 13:02:27');
INSERT INTO `log` VALUES (274, 3, 'Edebiyat. Kategorisine Girdi', '2015-12-28 13:02:29');
INSERT INTO `log` VALUES (275, 3, 'AFORİZMALAR. Kitaba Girdi', '2015-12-28 13:02:30');
INSERT INTO `log` VALUES (276, 3, 'Sepetime Girdi', '2015-12-28 13:02:33');
INSERT INTO `log` VALUES (277, 3, 'KÜRESEL ISINMA. Kitabını Aradı', '2015-12-28 13:02:39');
INSERT INTO `log` VALUES (278, 3, 'Sepetime Girdi', '2015-12-28 13:02:40');
INSERT INTO `log` VALUES (279, 3, 'Foruma Girdi', '2015-12-28 13:02:44');
INSERT INTO `log` VALUES (280, 3, 'KÜRESEL ISINMA. Konusuna Girdi', '2015-12-28 13:02:46');
INSERT INTO `log` VALUES (281, 3, 'KÜRESEL ISINMA. Konusuna Girdi', '2015-12-28 13:02:51');
INSERT INTO `log` VALUES (282, 3, 'KÜRESEL ISINMA. Konusuna Girdi', '2015-12-28 13:03:03');
INSERT INTO `log` VALUES (283, 3, 'Profiline Girdi', '2015-12-28 13:03:15');
INSERT INTO `log` VALUES (284, 3, 'Profiline Girdi', '2015-12-28 13:03:20');
INSERT INTO `log` VALUES (285, 3, 'Sepetime Girdi', '2015-12-28 13:03:23');
INSERT INTO `log` VALUES (286, 3, 'Yazarlar Sayfasına Girdi', '2015-12-28 13:03:25');
INSERT INTO `log` VALUES (287, 3, 'Foruma Girdi', '2015-12-28 13:03:27');
INSERT INTO `log` VALUES (288, 3, 'MODERNÇİN. Konusuna Girdi', '2015-12-28 13:03:28');
INSERT INTO `log` VALUES (289, 3, 'Foruma Girdi', '2015-12-28 13:03:30');
INSERT INTO `log` VALUES (290, 3, 'KÜRESEL ISINMA. Konusuna Girdi', '2015-12-28 13:03:31');
INSERT INTO `log` VALUES (291, 3, 'Profiline Girdi', '2015-12-28 13:03:34');
INSERT INTO `log` VALUES (292, 3, 'AnaSayfaya Girdi', '2015-12-28 13:03:42');
INSERT INTO `log` VALUES (293, 3, 'Yazarlar Sayfasına Girdi', '2015-12-28 13:03:43');
INSERT INTO `log` VALUES (294, 3, 'Yazarlar Sayfasına Girdi', '2015-12-28 13:04:09');
INSERT INTO `log` VALUES (295, 3, 'Yazarlar Sayfasına Girdi', '2015-12-28 13:04:23');
INSERT INTO `log` VALUES (296, 3, 'Yazarlar Sayfasına Girdi', '2015-12-28 13:08:29');
INSERT INTO `log` VALUES (297, 3, '. Kitaba Girdi', '2015-12-28 13:08:32');
INSERT INTO `log` VALUES (298, 3, 'AnaSayfaya Girdi', '2015-12-28 13:08:52');
INSERT INTO `log` VALUES (299, 3, 'Yazarlar Sayfasına Girdi', '2015-12-28 13:08:54');
INSERT INTO `log` VALUES (300, 3, 'RÖNESANS ESTETİĞİ. Kitaba Girdi', '2015-12-28 13:08:56');
INSERT INTO `log` VALUES (301, 3, 'Sepetime Girdi', '2015-12-28 13:08:59');
INSERT INTO `log` VALUES (302, 3, 'RÖNESANS ESTETİĞİ. Kitaba Girdi', '2015-12-28 13:09:01');
INSERT INTO `log` VALUES (303, 3, 'Sepetime Girdi', '2015-12-28 13:09:04');
INSERT INTO `log` VALUES (304, 3, 'Yazarlar Sayfasına Girdi', '2015-12-28 13:10:02');
INSERT INTO `log` VALUES (305, 3, 'RÖNESANS ESTETİĞİ. Kitaba Girdi', '2015-12-28 13:10:03');
INSERT INTO `log` VALUES (306, 3, 'Sepetime Girdi', '2015-12-28 13:10:05');
INSERT INTO `log` VALUES (307, 3, 'AnaSayfaya Girdi', '2015-12-28 13:10:38');
INSERT INTO `log` VALUES (308, 3, 'Çıkış Yaptı', '2015-12-28 13:10:41');
INSERT INTO `log` VALUES (309, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 13:10:47');
INSERT INTO `log` VALUES (310, 3, 'Yazarlar Sayfasına Girdi', '2015-12-28 13:10:53');
INSERT INTO `log` VALUES (311, 3, 'BİRİNCİ DÜNYA SAVAŞI  . Kitaba Girdi', '2015-12-28 13:10:54');
INSERT INTO `log` VALUES (312, 3, 'Foruma Girdi', '2015-12-28 13:10:59');
INSERT INTO `log` VALUES (313, 3, 'KÜRESEL ISINMA. Konusuna Girdi', '2015-12-28 13:11:01');
INSERT INTO `log` VALUES (314, 3, 'Sepetime Girdi', '2015-12-28 13:11:04');
INSERT INTO `log` VALUES (315, 3, 'AnaSayfaya Girdi', '2015-12-28 13:11:07');
INSERT INTO `log` VALUES (316, 3, 'AnaSayfaya Girdi', '2015-12-28 13:11:42');
INSERT INTO `log` VALUES (317, 3, 'AnaSayfaya Girdi', '2015-12-28 13:11:45');
INSERT INTO `log` VALUES (318, 3, 'AnaSayfaya Girdi', '2015-12-28 13:11:46');
INSERT INTO `log` VALUES (319, 3, 'AnaSayfaya Girdi', '2015-12-28 13:11:46');
INSERT INTO `log` VALUES (320, 3, 'Profiline Girdi', '2015-12-28 13:11:48');
INSERT INTO `log` VALUES (321, 3, 'AnaSayfaya Girdi', '2015-12-28 13:11:50');
INSERT INTO `log` VALUES (322, 3, 'Sepetime Girdi', '2015-12-28 13:11:52');
INSERT INTO `log` VALUES (323, 3, 'AnaSayfaya Girdi', '2015-12-28 13:11:58');
INSERT INTO `log` VALUES (324, 3, 'AnaSayfaya Girdi', '2015-12-28 13:13:48');
INSERT INTO `log` VALUES (325, 3, 'AnaSayfaya Girdi', '2015-12-28 13:13:58');
INSERT INTO `log` VALUES (326, 3, 'AnaSayfaya Girdi', '2015-12-28 13:14:02');
INSERT INTO `log` VALUES (327, 3, 'AnaSayfaya Girdi', '2015-12-28 13:16:25');
INSERT INTO `log` VALUES (328, 3, 'Foruma Girdi', '2015-12-28 13:16:27');
INSERT INTO `log` VALUES (329, 3, 'Sepetime Girdi', '2015-12-28 13:16:28');
INSERT INTO `log` VALUES (330, 3, 'Foruma Girdi', '2015-12-28 13:16:29');
INSERT INTO `log` VALUES (331, 3, 'AnaSayfaya Girdi', '2015-12-28 13:16:29');
INSERT INTO `log` VALUES (332, 3, 'Sepetime Girdi', '2015-12-28 13:16:30');
INSERT INTO `log` VALUES (333, 3, 'Yazarlar Sayfasına Girdi', '2015-12-28 13:16:30');
INSERT INTO `log` VALUES (334, 3, 'Yazarlar Sayfasına Girdi', '2015-12-28 13:16:51');
INSERT INTO `log` VALUES (335, 3, 'AnaSayfaya Girdi', '2015-12-28 13:17:23');
INSERT INTO `log` VALUES (336, 3, 'AnaSayfaya Girdi', '2015-12-28 13:17:24');
INSERT INTO `log` VALUES (337, 3, 'AnaSayfaya Girdi', '2015-12-28 13:17:28');
INSERT INTO `log` VALUES (338, 3, 'Yazarlar Sayfasına Girdi', '2015-12-28 13:17:32');
INSERT INTO `log` VALUES (339, 3, 'KÜRESEL ISINMA. Kitaba Girdi', '2015-12-28 13:17:34');
INSERT INTO `log` VALUES (340, 3, 'AnaSayfaya Girdi', '2015-12-28 13:17:44');
INSERT INTO `log` VALUES (341, 3, 'AnaSayfaya Girdi', '2015-12-28 13:20:34');
INSERT INTO `log` VALUES (342, 3, 'AnaSayfaya Girdi', '2015-12-28 13:20:35');
INSERT INTO `log` VALUES (343, 3, 'Sinema. Kategorisine Girdi', '2015-12-28 13:20:42');
INSERT INTO `log` VALUES (344, 3, 'AnaSayfaya Girdi', '2015-12-28 13:20:46');
INSERT INTO `log` VALUES (345, 3, 'AFORİZMALAR. Kitaba Girdi', '2015-12-28 13:20:47');
INSERT INTO `log` VALUES (346, 3, 'Sepetime Girdi', '2015-12-28 13:20:49');
INSERT INTO `log` VALUES (347, 3, 'AFORİZMALAR. Kitaba Girdi', '2015-12-28 13:20:52');
INSERT INTO `log` VALUES (348, 3, 'AnaSayfaya Girdi', '2015-12-28 13:20:56');
INSERT INTO `log` VALUES (349, 3, 'Edebiyat. Kategorisine Girdi', '2015-12-28 13:21:16');
INSERT INTO `log` VALUES (350, 3, 'AnaSayfaya Girdi', '2015-12-28 13:21:20');
INSERT INTO `log` VALUES (351, 3, 'Foruma Girdi', '2015-12-28 13:21:20');
INSERT INTO `log` VALUES (352, 3, 'Sepetime Girdi', '2015-12-28 13:21:21');
INSERT INTO `log` VALUES (353, 3, 'Yazarlar Sayfasına Girdi', '2015-12-28 13:21:25');
INSERT INTO `log` VALUES (354, 3, 'AnaSayfaya Girdi', '2015-12-28 13:21:25');
INSERT INTO `log` VALUES (355, 3, 'Çıkış Yaptı', '2015-12-28 13:21:27');
INSERT INTO `log` VALUES (356, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 13:21:32');
INSERT INTO `log` VALUES (357, 3, 'AnaSayfaya Girdi', '2015-12-28 13:22:56');
INSERT INTO `log` VALUES (358, 3, 'Çıkış Yaptı', '2015-12-28 13:22:59');
INSERT INTO `log` VALUES (359, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 13:23:05');
INSERT INTO `log` VALUES (360, 3, 'AnaSayfaya Girdi', '2015-12-28 13:23:09');
INSERT INTO `log` VALUES (361, 3, 'YİRMİNCİ YÜZYIL TARİHİ  . Kitaba Girdi', '2015-12-28 13:23:13');
INSERT INTO `log` VALUES (362, 3, 'Sepetime Girdi', '2015-12-28 13:23:17');
INSERT INTO `log` VALUES (363, 3, 'Edebiyat. Kategorisine Girdi', '2015-12-28 13:23:21');
INSERT INTO `log` VALUES (364, 3, 'Çıkış Yaptı', '2015-12-28 13:23:37');
INSERT INTO `log` VALUES (365, 0, 'Edebiyat. Kategorisine Girdi', '2015-12-28 13:23:40');
INSERT INTO `log` VALUES (366, 0, 'Edebiyat. Kategorisine Girdi', '2015-12-28 13:23:45');
INSERT INTO `log` VALUES (367, 0, 'Foruma Girdi', '2015-12-28 13:23:56');
INSERT INTO `log` VALUES (368, 0, 'Kitap Arama. Kitabını Aradı', '2015-12-28 13:24:00');
INSERT INTO `log` VALUES (369, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 13:24:07');
INSERT INTO `log` VALUES (370, 3, 'Foruma Girdi', '2015-12-28 13:24:19');
INSERT INTO `log` VALUES (371, 3, 'Sepetime Girdi', '2015-12-28 13:24:35');
INSERT INTO `log` VALUES (372, 3, 'AnaSayfaya Girdi', '2015-12-28 13:24:59');
INSERT INTO `log` VALUES (373, 0, 'AnaSayfaya Girdi', '2015-12-28 14:20:56');
INSERT INTO `log` VALUES (374, 0, 'AnaSayfaya Girdi', '2015-12-28 17:16:10');
INSERT INTO `log` VALUES (375, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 17:16:20');
INSERT INTO `log` VALUES (376, 3, 'Foruma Girdi', '2015-12-28 17:16:27');
INSERT INTO `log` VALUES (377, 3, 'Foruma Girdi', '2015-12-28 17:16:31');
INSERT INTO `log` VALUES (378, 3, 'Foruma Girdi', '2015-12-28 17:16:31');
INSERT INTO `log` VALUES (379, 3, 'kerem. Konusuna Girdi', '2015-12-28 17:16:33');
INSERT INTO `log` VALUES (380, 3, 'kerem. Konusuna Girdi', '2015-12-28 17:16:36');
INSERT INTO `log` VALUES (381, 3, 'kerem. Konusuna Girdi', '2015-12-28 17:16:36');
INSERT INTO `log` VALUES (382, 3, 'Profiline Girdi', '2015-12-28 17:16:46');
INSERT INTO `log` VALUES (383, 3, 'Foruma Girdi', '2015-12-28 17:16:49');
INSERT INTO `log` VALUES (384, 3, 'KÜRESEL ISINMA. Konusuna Girdi', '2015-12-28 17:16:51');
INSERT INTO `log` VALUES (385, 3, 'Profiline Girdi', '2015-12-28 17:16:53');
INSERT INTO `log` VALUES (386, 3, 'Profiline Girdi', '2015-12-28 17:18:11');
INSERT INTO `log` VALUES (387, 3, 'Bilgi Güncellemeye Girdi', '2015-12-28 17:18:13');
INSERT INTO `log` VALUES (388, 3, 'Bilgi Güncellemeye Girdi', '2015-12-28 17:18:20');
INSERT INTO `log` VALUES (389, 3, 'AnaSayfaya Girdi', '2015-12-28 17:18:22');
INSERT INTO `log` VALUES (390, 3, 'Profiline Girdi', '2015-12-28 17:19:49');
INSERT INTO `log` VALUES (391, 3, 'Bilgi Güncellemeye Girdi', '2015-12-28 17:19:50');
INSERT INTO `log` VALUES (392, 3, 'Foruma Girdi', '2015-12-28 17:21:09');
INSERT INTO `log` VALUES (393, 3, 'Foruma Girdi', '2015-12-28 17:24:34');
INSERT INTO `log` VALUES (394, 3, 'Foruma Girdi', '2015-12-28 17:24:49');
INSERT INTO `log` VALUES (395, 3, 'Foruma Girdi', '2015-12-28 17:25:07');
INSERT INTO `log` VALUES (396, 3, 'Foruma Girdi', '2015-12-28 17:25:07');
INSERT INTO `log` VALUES (397, 3, 'Foruma Girdi', '2015-12-28 17:25:28');
INSERT INTO `log` VALUES (398, 3, 'Foruma Girdi', '2015-12-28 17:25:28');
INSERT INTO `log` VALUES (399, 3, 'AnaSayfaya Girdi', '2015-12-28 17:27:56');
INSERT INTO `log` VALUES (400, 3, 'Foruma Girdi', '2015-12-28 17:27:59');
INSERT INTO `log` VALUES (401, 3, 'KÜRESEL ISINMA. Konusuna Girdi', '2015-12-28 17:28:02');
INSERT INTO `log` VALUES (402, 3, 'KÜRESEL ISINMA. Konusuna Girdi', '2015-12-28 17:28:49');
INSERT INTO `log` VALUES (403, 3, 'KÜRESEL ISINMA. Konusuna Girdi', '2015-12-28 17:28:51');
INSERT INTO `log` VALUES (404, 3, 'KÜRESEL ISINMA. Konusuna Girdi', '2015-12-28 17:28:51');
INSERT INTO `log` VALUES (405, 3, 'KÜRESEL ISINMA. Konusuna Girdi', '2015-12-28 17:29:09');
INSERT INTO `log` VALUES (406, 3, 'KÜRESEL ISINMA. Konusuna Girdi', '2015-12-28 17:29:32');
INSERT INTO `log` VALUES (407, 3, 'Foruma Girdi', '2015-12-28 17:29:58');
INSERT INTO `log` VALUES (408, 3, 'Sepetime Girdi', '2015-12-28 17:29:59');
INSERT INTO `log` VALUES (409, 3, 'Sepetime Girdi', '2015-12-28 17:30:31');
INSERT INTO `log` VALUES (410, 3, 'Sepetime Girdi', '2015-12-28 17:30:35');
INSERT INTO `log` VALUES (411, 3, 'Sepetime Girdi', '2015-12-28 17:30:35');
INSERT INTO `log` VALUES (412, 3, 'Sepetime Girdi', '2015-12-28 17:30:35');
INSERT INTO `log` VALUES (413, 3, 'Sepetime Girdi', '2015-12-28 17:30:36');
INSERT INTO `log` VALUES (414, 3, 'Sepetime Girdi', '2015-12-28 17:30:36');
INSERT INTO `log` VALUES (415, 3, 'Sepetime Girdi', '2015-12-28 17:30:36');
INSERT INTO `log` VALUES (416, 3, 'Sepetime Girdi', '2015-12-28 17:30:44');
INSERT INTO `log` VALUES (417, 3, 'Sepetime Girdi', '2015-12-28 17:30:45');
INSERT INTO `log` VALUES (418, 3, 'Sepetime Girdi', '2015-12-28 17:30:46');
INSERT INTO `log` VALUES (419, 3, 'Sepetime Girdi', '2015-12-28 17:30:46');
INSERT INTO `log` VALUES (420, 3, 'Sepetime Girdi', '2015-12-28 17:30:46');
INSERT INTO `log` VALUES (421, 3, 'Sepetime Girdi', '2015-12-28 17:30:46');
INSERT INTO `log` VALUES (422, 3, 'Sepetime Girdi', '2015-12-28 17:30:55');
INSERT INTO `log` VALUES (423, 3, 'AnaSayfaya Girdi', '2015-12-28 17:40:49');
INSERT INTO `log` VALUES (424, 3, 'Foruma Girdi', '2015-12-28 17:40:52');
INSERT INTO `log` VALUES (425, 3, 'KÜRESEL ISINMA. Konusuna Girdi', '2015-12-28 17:46:17');
INSERT INTO `log` VALUES (426, 3, 'Foruma Girdi', '2015-12-28 17:46:19');
INSERT INTO `log` VALUES (427, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 17:46:31');
INSERT INTO `log` VALUES (428, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 17:51:03');
INSERT INTO `log` VALUES (429, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 17:51:04');
INSERT INTO `log` VALUES (430, 3, 'Foruma Girdi', '2015-12-28 17:51:06');
INSERT INTO `log` VALUES (431, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 17:51:10');
INSERT INTO `log` VALUES (432, 3, 'Foruma Girdi', '2015-12-28 17:51:12');
INSERT INTO `log` VALUES (433, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 17:51:13');
INSERT INTO `log` VALUES (434, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 17:51:15');
INSERT INTO `log` VALUES (435, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 17:51:15');
INSERT INTO `log` VALUES (436, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 17:51:15');
INSERT INTO `log` VALUES (437, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 17:51:15');
INSERT INTO `log` VALUES (438, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 17:51:15');
INSERT INTO `log` VALUES (439, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 17:51:16');
INSERT INTO `log` VALUES (440, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 17:51:16');
INSERT INTO `log` VALUES (441, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 17:51:16');
INSERT INTO `log` VALUES (442, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 17:51:16');
INSERT INTO `log` VALUES (443, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 17:51:16');
INSERT INTO `log` VALUES (444, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 17:51:17');
INSERT INTO `log` VALUES (445, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 17:51:17');
INSERT INTO `log` VALUES (446, 3, 'Foruma Girdi', '2015-12-28 17:51:18');
INSERT INTO `log` VALUES (447, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 17:51:29');
INSERT INTO `log` VALUES (448, 3, 'Foruma Girdi', '2015-12-28 17:51:58');
INSERT INTO `log` VALUES (449, 3, 'Foruma Girdi', '2015-12-28 17:52:01');
INSERT INTO `log` VALUES (450, 3, 'Foruma Girdi', '2015-12-28 18:00:07');
INSERT INTO `log` VALUES (451, 3, 'Foruma Girdi', '2015-12-28 18:00:08');
INSERT INTO `log` VALUES (452, 3, 'Foruma Girdi', '2015-12-28 18:00:09');
INSERT INTO `log` VALUES (453, 3, 'AnaSayfaya Girdi', '2015-12-28 18:00:10');
INSERT INTO `log` VALUES (454, 3, 'Foruma Girdi', '2015-12-28 18:00:10');
INSERT INTO `log` VALUES (455, 3, 'Foruma Girdi', '2015-12-28 18:00:12');
INSERT INTO `log` VALUES (456, 3, 'Foruma Girdi', '2015-12-28 18:00:35');
INSERT INTO `log` VALUES (457, 3, 'Foruma Girdi', '2015-12-28 18:00:37');
INSERT INTO `log` VALUES (458, 3, 'Foruma Girdi', '2015-12-28 18:01:26');
INSERT INTO `log` VALUES (459, 3, 'Foruma Girdi', '2015-12-28 18:01:27');
INSERT INTO `log` VALUES (460, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 18:01:29');
INSERT INTO `log` VALUES (461, 3, 'Foruma Girdi', '2015-12-28 18:01:31');
INSERT INTO `log` VALUES (462, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 18:01:33');
INSERT INTO `log` VALUES (463, 3, 'Foruma Girdi', '2015-12-28 18:01:33');
INSERT INTO `log` VALUES (464, 3, 'Foruma Girdi', '2015-12-28 18:02:44');
INSERT INTO `log` VALUES (465, 3, 'Foruma Girdi', '2015-12-28 18:02:45');
INSERT INTO `log` VALUES (466, 3, 'Foruma Girdi', '2015-12-28 18:03:09');
INSERT INTO `log` VALUES (467, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 18:03:12');
INSERT INTO `log` VALUES (468, 3, 'Foruma Girdi', '2015-12-28 18:03:13');
INSERT INTO `log` VALUES (469, 3, 'Foruma Girdi', '2015-12-28 18:04:05');
INSERT INTO `log` VALUES (470, 3, 'Foruma Girdi', '2015-12-28 18:04:07');
INSERT INTO `log` VALUES (471, 3, 'Foruma Girdi', '2015-12-28 18:04:16');
INSERT INTO `log` VALUES (472, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 18:04:19');
INSERT INTO `log` VALUES (473, 3, 'Foruma Girdi', '2015-12-28 18:04:20');
INSERT INTO `log` VALUES (474, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 18:04:26');
INSERT INTO `log` VALUES (475, 3, 'AnaSayfaya Girdi', '2015-12-28 18:04:29');
INSERT INTO `log` VALUES (476, 3, 'Foruma Girdi', '2015-12-28 18:04:31');
INSERT INTO `log` VALUES (477, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 18:06:32');
INSERT INTO `log` VALUES (478, 3, 'Foruma Girdi', '2015-12-28 18:06:33');
INSERT INTO `log` VALUES (479, 3, 'Foruma Girdi', '2015-12-28 18:07:48');
INSERT INTO `log` VALUES (480, 3, 'Foruma Girdi', '2015-12-28 18:07:49');
INSERT INTO `log` VALUES (481, 3, 'Foruma Girdi', '2015-12-28 18:08:39');
INSERT INTO `log` VALUES (482, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 18:08:44');
INSERT INTO `log` VALUES (483, 3, 'Foruma Girdi', '2015-12-28 18:08:45');
INSERT INTO `log` VALUES (484, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 18:08:47');
INSERT INTO `log` VALUES (485, 3, 'Foruma Girdi', '2015-12-28 18:08:49');
INSERT INTO `log` VALUES (486, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 18:08:50');
INSERT INTO `log` VALUES (487, 3, 'Foruma Girdi', '2015-12-28 18:08:51');
INSERT INTO `log` VALUES (488, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 18:09:33');
INSERT INTO `log` VALUES (489, 3, 'Foruma Girdi', '2015-12-28 18:09:34');
INSERT INTO `log` VALUES (490, 3, 'Foruma Girdi', '2015-12-28 18:09:44');
INSERT INTO `log` VALUES (491, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 18:09:54');
INSERT INTO `log` VALUES (492, 3, 'Foruma Girdi', '2015-12-28 18:09:55');
INSERT INTO `log` VALUES (493, 3, 'Foruma Girdi', '2015-12-28 18:10:45');
INSERT INTO `log` VALUES (494, 3, 'Foruma Girdi', '2015-12-28 18:12:21');
INSERT INTO `log` VALUES (495, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 18:12:23');
INSERT INTO `log` VALUES (496, 3, 'Foruma Girdi', '2015-12-28 18:12:25');
INSERT INTO `log` VALUES (497, 3, 'Foruma Girdi', '2015-12-28 18:13:00');
INSERT INTO `log` VALUES (498, 3, 'Foruma Girdi', '2015-12-28 18:13:01');
INSERT INTO `log` VALUES (499, 3, 'Foruma Girdi', '2015-12-28 18:13:02');
INSERT INTO `log` VALUES (500, 3, 'Foruma Girdi', '2015-12-28 18:13:02');
INSERT INTO `log` VALUES (501, 3, 'Foruma Girdi', '2015-12-28 18:13:02');
INSERT INTO `log` VALUES (502, 3, 'Foruma Girdi', '2015-12-28 18:13:02');
INSERT INTO `log` VALUES (503, 3, 'Foruma Girdi', '2015-12-28 18:13:19');
INSERT INTO `log` VALUES (504, 3, 'Foruma Girdi', '2015-12-28 18:13:20');
INSERT INTO `log` VALUES (505, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 18:13:21');
INSERT INTO `log` VALUES (506, 3, 'Foruma Girdi', '2015-12-28 18:13:22');
INSERT INTO `log` VALUES (507, 3, 'MODERNÇİN Konusuna Girdi', '2015-12-28 18:13:24');
INSERT INTO `log` VALUES (508, 3, 'Foruma Girdi', '2015-12-28 18:13:25');
INSERT INTO `log` VALUES (509, 3, 'Foruma Girdi', '2015-12-28 18:13:45');
INSERT INTO `log` VALUES (510, 3, 'Foruma Girdi', '2015-12-28 18:14:11');
INSERT INTO `log` VALUES (511, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 18:14:13');
INSERT INTO `log` VALUES (512, 3, 'Foruma Girdi', '2015-12-28 18:14:14');
INSERT INTO `log` VALUES (513, 3, 'MODERNÇİN Konusuna Girdi', '2015-12-28 18:14:15');
INSERT INTO `log` VALUES (514, 3, 'Foruma Girdi', '2015-12-28 18:14:16');
INSERT INTO `log` VALUES (515, 3, 'kerem Konusuna Girdi', '2015-12-28 18:14:17');
INSERT INTO `log` VALUES (516, 3, 'Foruma Girdi', '2015-12-28 18:14:17');
INSERT INTO `log` VALUES (517, 3, 'Foruma Girdi', '2015-12-28 18:14:33');
INSERT INTO `log` VALUES (518, 3, 'Foruma Girdi', '2015-12-28 18:14:34');
INSERT INTO `log` VALUES (519, 3, 'Foruma Girdi', '2015-12-28 18:15:26');
INSERT INTO `log` VALUES (520, 3, 'MODERNÇİN Konusuna Girdi', '2015-12-28 18:15:27');
INSERT INTO `log` VALUES (521, 3, 'Foruma Girdi', '2015-12-28 18:15:29');
INSERT INTO `log` VALUES (522, 3, 'kerem Konusuna Girdi', '2015-12-28 18:15:34');
INSERT INTO `log` VALUES (523, 3, 'Foruma Girdi', '2015-12-28 18:15:36');
INSERT INTO `log` VALUES (524, 3, 'Foruma Girdi', '2015-12-28 18:15:58');
INSERT INTO `log` VALUES (525, 3, 'MODERNÇİN Konusuna Girdi', '2015-12-28 18:17:10');
INSERT INTO `log` VALUES (526, 3, 'Foruma Girdi', '2015-12-28 18:17:12');
INSERT INTO `log` VALUES (527, 3, 'kerem Konusuna Girdi', '2015-12-28 18:17:14');
INSERT INTO `log` VALUES (528, 3, 'Foruma Girdi', '2015-12-28 18:17:15');
INSERT INTO `log` VALUES (529, 3, 'Foruma Girdi', '2015-12-28 18:19:23');
INSERT INTO `log` VALUES (530, 3, 'Foruma Girdi', '2015-12-28 18:19:35');
INSERT INTO `log` VALUES (531, 3, 'Foruma Girdi', '2015-12-28 18:19:41');
INSERT INTO `log` VALUES (532, 3, 'AnaSayfaya Girdi', '2015-12-28 18:21:33');
INSERT INTO `log` VALUES (533, 3, 'Foruma Girdi', '2015-12-28 18:22:03');
INSERT INTO `log` VALUES (534, 3, 'Foruma Girdi', '2015-12-28 18:27:50');
INSERT INTO `log` VALUES (535, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 18:27:56');
INSERT INTO `log` VALUES (536, 3, 'Foruma Girdi', '2015-12-28 18:28:00');
INSERT INTO `log` VALUES (537, 3, 'Foruma Girdi', '2015-12-28 18:28:19');
INSERT INTO `log` VALUES (538, 3, 'Foruma Girdi', '2015-12-28 18:28:50');
INSERT INTO `log` VALUES (539, 3, 'Foruma Girdi', '2015-12-28 18:28:52');
INSERT INTO `log` VALUES (540, 3, 'Foruma Girdi', '2015-12-28 18:28:53');
INSERT INTO `log` VALUES (541, 3, 'Foruma Girdi', '2015-12-28 18:28:53');
INSERT INTO `log` VALUES (542, 3, 'Foruma Girdi', '2015-12-28 18:30:45');
INSERT INTO `log` VALUES (543, 3, 'Foruma Girdi', '2015-12-28 18:30:56');
INSERT INTO `log` VALUES (544, 3, 'Foruma Girdi', '2015-12-28 18:31:10');
INSERT INTO `log` VALUES (545, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 18:31:13');
INSERT INTO `log` VALUES (546, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 18:31:19');
INSERT INTO `log` VALUES (547, 3, 'Foruma Girdi', '2015-12-28 18:31:29');
INSERT INTO `log` VALUES (548, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 18:31:31');
INSERT INTO `log` VALUES (549, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 18:31:54');
INSERT INTO `log` VALUES (550, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 18:31:58');
INSERT INTO `log` VALUES (551, 3, 'Foruma Girdi', '2015-12-28 18:32:32');
INSERT INTO `log` VALUES (552, 3, 'kerem Konusuna Girdi', '2015-12-28 18:32:33');
INSERT INTO `log` VALUES (553, 3, 'kerem Konusuna Girdi', '2015-12-28 18:32:37');
INSERT INTO `log` VALUES (554, 3, 'kerem Konusuna Girdi', '2015-12-28 18:32:40');
INSERT INTO `log` VALUES (555, 3, 'Foruma Girdi', '2015-12-28 18:33:11');
INSERT INTO `log` VALUES (556, 3, 'kerem Konusuna Girdi', '2015-12-28 18:33:12');
INSERT INTO `log` VALUES (557, 3, 'kerem Konusuna Girdi', '2015-12-28 18:35:11');
INSERT INTO `log` VALUES (558, 3, 'kerem Konusuna Girdi', '2015-12-28 18:35:15');
INSERT INTO `log` VALUES (559, 3, 'Foruma Girdi', '2015-12-28 18:35:34');
INSERT INTO `log` VALUES (560, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 18:35:36');
INSERT INTO `log` VALUES (561, 3, 'KÜRESEL ISINMA Konusuna Girdi', '2015-12-28 18:35:45');
INSERT INTO `log` VALUES (562, 3, 'AnaSayfaya Girdi', '2015-12-28 18:35:55');
INSERT INTO `log` VALUES (563, 3, 'Foruma Girdi', '2015-12-28 18:35:56');
INSERT INTO `log` VALUES (564, 3, 'Foruma Girdi', '2015-12-28 19:28:53');
INSERT INTO `log` VALUES (565, 3, 'Çıkış Yaptı', '2015-12-28 19:28:55');
INSERT INTO `log` VALUES (566, 0, 'Çıkış Yaptı', '2015-12-28 19:29:10');
INSERT INTO `log` VALUES (567, 0, 'Foruma Girdi', '2015-12-28 19:29:16');
INSERT INTO `log` VALUES (568, 0, 'Sepetime Girdi', '2015-12-28 19:29:17');
INSERT INTO `log` VALUES (569, 0, 'AnaSayfaya Girdi', '2015-12-28 19:29:18');
INSERT INTO `log` VALUES (570, 0, 'Yazarlar Sayfasına Girdi', '2015-12-28 19:29:19');
INSERT INTO `log` VALUES (571, 0, 'AnaSayfaya Girdi', '2015-12-28 19:29:19');
INSERT INTO `log` VALUES (572, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 19:29:26');
INSERT INTO `log` VALUES (573, 3, 'Profiline Girdi', '2015-12-28 19:30:04');
INSERT INTO `log` VALUES (574, 3, 'Bilgi Güncellemeye Girdi', '2015-12-28 19:30:06');
INSERT INTO `log` VALUES (575, 3, 'Foruma Girdi', '2015-12-28 19:34:07');
INSERT INTO `log` VALUES (576, 3, 'AnaSayfaya Girdi', '2015-12-28 19:34:07');
INSERT INTO `log` VALUES (577, 3, 'Profiline Girdi', '2015-12-28 19:34:08');
INSERT INTO `log` VALUES (578, 3, 'Bilgi Güncellemeye Girdi', '2015-12-28 19:34:09');
INSERT INTO `log` VALUES (579, 3, 'Bilgi Güncellemeye Girdi', '2015-12-28 19:34:29');
INSERT INTO `log` VALUES (580, 3, 'AnaSayfaya Girdi', '2015-12-28 19:34:35');
INSERT INTO `log` VALUES (581, 3, 'Edebiyat. Kategorisine Girdi', '2015-12-28 19:34:38');
INSERT INTO `log` VALUES (582, 3, 'AnaSayfaya Girdi', '2015-12-28 19:34:39');
INSERT INTO `log` VALUES (583, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 19:35:05');
INSERT INTO `log` VALUES (584, 3, 'Üye Onaylamaya Girdi', '2015-12-28 19:35:17');
INSERT INTO `log` VALUES (585, 3, 'Yönetici Sayfasına Girdi', '2015-12-28 19:35:20');
INSERT INTO `log` VALUES (586, 3, 'AnaSayfaya Girdi', '2015-12-28 19:39:02');
INSERT INTO `log` VALUES (587, 3, 'Yönetici Sayfasına Girdi', '2015-12-29 07:44:54');
INSERT INTO `log` VALUES (588, 3, 'Yönetici Sayfasına Girdi', '2015-12-29 07:50:10');
INSERT INTO `log` VALUES (589, 3, 'Yönetici Sayfasına Girdi', '2015-12-29 07:50:34');
INSERT INTO `log` VALUES (590, 3, 'Yönetici Sayfasına Girdi', '2015-12-29 07:50:36');
INSERT INTO `log` VALUES (591, 3, 'Yönetici Sayfasına Girdi', '2015-12-29 07:50:47');
INSERT INTO `log` VALUES (592, 3, 'AnaSayfaya Girdi', '2015-12-29 07:50:51');
INSERT INTO `log` VALUES (593, 3, 'Yönetici Sayfasına Girdi', '2015-12-29 07:50:55');
INSERT INTO `log` VALUES (594, 3, 'Bilim. Kategorisine Girdi', '2015-12-29 07:51:26');
INSERT INTO `log` VALUES (595, 3, 'RÖNESANS ESTETİĞİ. Kitaba Girdi', '2015-12-29 07:51:29');
INSERT INTO `log` VALUES (596, 3, 'Yazarlar Sayfasına Girdi', '2015-12-29 07:52:04');
INSERT INTO `log` VALUES (597, 3, 'BEYHUDE. Kitaba Girdi', '2015-12-29 07:52:12');
INSERT INTO `log` VALUES (598, 3, 'Yazarlar Sayfasına Girdi', '2015-12-29 07:52:18');
INSERT INTO `log` VALUES (599, 3, 'Yönetici Sayfasına Girdi', '2015-12-29 07:53:36');
INSERT INTO `log` VALUES (600, 3, 'Yönetici Sayfasına Girdi', '2015-12-29 07:54:03');
INSERT INTO `log` VALUES (601, 3, 'Üye Silmeye  Girdi', '2015-12-29 07:54:21');
INSERT INTO `log` VALUES (602, 3, 'Yönetici Sayfasına Girdi', '2015-12-29 07:54:22');
INSERT INTO `log` VALUES (603, 3, 'Kitap Ekleye Girdi', '2015-12-29 07:54:26');
INSERT INTO `log` VALUES (604, 3, 'Yönetici Sayfasına Girdi', '2015-12-29 07:54:28');
INSERT INTO `log` VALUES (605, 3, 'Yönetici Sayfasına Girdi', '2015-12-29 07:56:05');
INSERT INTO `log` VALUES (606, 3, 'AnaSayfaya Girdi', '2015-12-29 08:01:25');
INSERT INTO `log` VALUES (607, 3, 'Yönetici Sayfasına Girdi', '2015-12-29 08:01:32');
INSERT INTO `log` VALUES (608, 3, 'Çıkış Yaptı', '2015-12-29 08:02:45');
INSERT INTO `log` VALUES (609, 2, 'AnaSayfaya Girdi', '2015-12-29 08:02:51');
INSERT INTO `log` VALUES (610, 2, 'Yönetici Sayfasına Girdi', '2015-12-29 08:02:56');
INSERT INTO `log` VALUES (611, 2, 'Yönetici Sayfasına Girdi', '2015-12-29 08:02:59');
INSERT INTO `log` VALUES (612, 2, 'Yönetici Sayfasına Girdi', '2015-12-29 08:04:38');
INSERT INTO `log` VALUES (613, 2, 'Yönetici Sayfasına Girdi', '2015-12-29 08:05:16');
INSERT INTO `log` VALUES (614, 2, 'Yönetici Sayfasına Girdi', '2015-12-29 08:05:17');
INSERT INTO `log` VALUES (615, 2, 'Yönetici Sayfasına Girdi', '2015-12-29 08:05:19');
INSERT INTO `log` VALUES (616, 2, 'Yönetici Sayfasına Girdi', '2015-12-29 08:06:57');
INSERT INTO `log` VALUES (617, 2, 'Yönetici Sayfasına Girdi', '2015-12-29 08:06:58');
INSERT INTO `log` VALUES (618, 2, 'Kitap Ekleye Girdi', '2015-12-29 08:06:59');
INSERT INTO `log` VALUES (619, 2, 'Kitap Ekleye Girdi', '2015-12-29 08:06:59');
INSERT INTO `log` VALUES (620, 2, 'Üye Silmeye  Girdi', '2015-12-29 08:07:01');
INSERT INTO `log` VALUES (621, 2, 'Yönetici Sayfasına Girdi', '2015-12-29 08:07:05');
INSERT INTO `log` VALUES (622, 2, 'Kitap Ekleye Girdi', '2015-12-29 08:07:13');
INSERT INTO `log` VALUES (623, 2, 'Üye Silmeye  Girdi', '2015-12-29 08:07:14');
INSERT INTO `log` VALUES (624, 2, 'Yönetici Sayfasına Girdi', '2015-12-29 08:07:16');
INSERT INTO `log` VALUES (625, 2, 'Yönetici Sayfasına Girdi', '2015-12-29 08:08:27');
INSERT INTO `log` VALUES (626, 2, 'AnaSayfaya Girdi', '2015-12-29 08:08:27');
INSERT INTO `log` VALUES (627, 2, 'Üye Silmeye  Girdi', '2015-12-29 08:11:32');
INSERT INTO `log` VALUES (628, 2, 'AnaSayfaya Girdi', '2015-12-29 08:11:33');
INSERT INTO `log` VALUES (629, 2, 'Kitap Ekleye Girdi', '2015-12-29 08:11:47');
INSERT INTO `log` VALUES (630, 2, 'AnaSayfaya Girdi', '2015-12-29 08:11:47');
INSERT INTO `log` VALUES (631, 2, 'Çıkış Yaptı', '2015-12-29 08:12:02');
INSERT INTO `log` VALUES (632, 3, 'Yönetici Sayfasına Girdi', '2015-12-29 08:12:08');
INSERT INTO `log` VALUES (633, 3, 'Sepetime Girdi', '2015-12-29 08:12:26');
INSERT INTO `log` VALUES (634, 3, 'Foruma Girdi', '2015-12-29 08:12:28');
INSERT INTO `log` VALUES (635, 3, 'Foruma Girdi', '2015-12-29 08:12:36');
INSERT INTO `log` VALUES (636, 3, 'Foruma Girdi', '2015-12-29 08:12:36');
INSERT INTO `log` VALUES (637, 3, 'YENİ KONU Konusuna Girdi', '2015-12-29 08:12:38');
INSERT INTO `log` VALUES (638, 3, 'YENİ KONU Konusuna Girdi', '2015-12-29 08:13:01');
INSERT INTO `log` VALUES (639, 3, 'Foruma Girdi', '2015-12-29 08:13:04');
INSERT INTO `log` VALUES (640, 3, 'YENİ KONU Konusuna Girdi', '2015-12-29 08:13:06');
INSERT INTO `log` VALUES (641, 3, 'YENİ KONU Konusuna Girdi', '2015-12-29 08:15:42');
INSERT INTO `log` VALUES (642, 3, 'YENİ KONU Konusuna Girdi', '2015-12-29 08:15:46');
INSERT INTO `log` VALUES (643, 3, 'YENİ KONU Konusuna Girdi', '2015-12-29 08:16:02');
INSERT INTO `log` VALUES (644, 3, 'YENİ KONU Konusuna Girdi', '2015-12-29 08:16:02');
INSERT INTO `log` VALUES (645, 3, 'YENİ KONU Konusuna Girdi', '2015-12-29 08:16:20');
INSERT INTO `log` VALUES (646, 3, 'YENİ KONU Konusuna Girdi', '2015-12-29 08:16:20');
INSERT INTO `log` VALUES (647, 3, 'AnaSayfaya Girdi', '2015-12-29 08:16:51');
INSERT INTO `log` VALUES (648, 3, 'Yönetici Sayfasına Girdi', '2015-12-29 08:23:56');
INSERT INTO `log` VALUES (649, 3, 'Yönetici Sayfasına Girdi', '2015-12-29 08:25:45');
INSERT INTO `log` VALUES (650, 3, 'Kitap Silmeye Girdi', '2015-12-29 08:25:48');
INSERT INTO `log` VALUES (651, 3, 'AnaSayfaya Girdi', '2015-12-29 08:25:52');
INSERT INTO `log` VALUES (652, 3, 'Yönetici Sayfasına Girdi', '2015-12-29 08:26:11');
INSERT INTO `log` VALUES (653, 3, 'Kitap Silmeye Girdi', '2015-12-29 08:26:13');
INSERT INTO `log` VALUES (654, 3, 'Yönetici Sayfasına Girdi', '2015-12-29 08:29:01');
INSERT INTO `log` VALUES (655, 3, 'Kitap Silmeye Girdi', '2015-12-29 08:29:03');
INSERT INTO `log` VALUES (656, 3, ' 42. idli kitabı sildi', '2015-12-29 08:29:07');
INSERT INTO `log` VALUES (657, 3, 'Kitap Silmeye Girdi', '2015-12-29 08:29:07');
INSERT INTO `log` VALUES (658, 3, 'Yönetici Sayfasına Girdi', '2015-12-29 08:29:14');
INSERT INTO `log` VALUES (659, 0, 'AnaSayfaya Girdi', '2015-12-29 08:57:03');
INSERT INTO `log` VALUES (660, 3, 'Yönetici Sayfasına Girdi', '2015-12-29 08:57:33');
INSERT INTO `log` VALUES (661, 3, 'Kitap Silmeye Girdi', '2015-12-29 08:57:39');
INSERT INTO `log` VALUES (662, 3, 'Çıkış Yaptı', '2015-12-29 08:57:50');
INSERT INTO `log` VALUES (663, 2, 'AnaSayfaya Girdi', '2015-12-29 08:57:57');
INSERT INTO `log` VALUES (664, 2, 'Kitap Ekleye Girdi', '2015-12-29 08:58:12');
INSERT INTO `log` VALUES (665, 2, 'AnaSayfaya Girdi', '2015-12-29 08:58:12');
INSERT INTO `log` VALUES (666, 2, 'Yönetici Sayfasına Girdi', '2015-12-29 08:58:20');
INSERT INTO `log` VALUES (667, 2, 'AnaSayfaya Girdi', '2015-12-29 08:58:20');
INSERT INTO `log` VALUES (668, 2, 'Sepetime Girdi', '2015-12-29 08:58:46');
INSERT INTO `log` VALUES (669, 2, 'Edebiyat. Kategorisine Girdi', '2015-12-29 08:58:48');
INSERT INTO `log` VALUES (670, 2, 'AFORİZMALAR. Kitaba Girdi', '2015-12-29 08:58:49');
INSERT INTO `log` VALUES (671, 2, 'Sepetime Girdi', '2015-12-29 08:58:52');
INSERT INTO `log` VALUES (672, 2, 'Çıkış Yaptı', '2015-12-29 08:59:50');
INSERT INTO `log` VALUES (673, 3, 'Yönetici Sayfasına Girdi', '2015-12-29 08:59:56');
INSERT INTO `log` VALUES (674, 3, 'Kitap Silmeye Girdi', '2015-12-29 09:01:11');
INSERT INTO `log` VALUES (675, 3, 'Foruma Girdi', '2015-12-29 09:01:16');
INSERT INTO `log` VALUES (676, 3, 'Sepetime Girdi', '2015-12-29 09:02:03');
INSERT INTO `log` VALUES (677, 0, 'RÖNESANS ESTETİĞİ. Kitaba Girdi', '2015-12-29 09:19:40');
INSERT INTO `log` VALUES (678, 3, 'Yönetici Sayfasına Girdi', '2015-12-29 09:19:48');
INSERT INTO `log` VALUES (679, 3, 'Sepetime Girdi', '2015-12-29 09:20:41');
INSERT INTO `log` VALUES (680, 3, 'Sepetime Girdi', '2015-12-29 09:21:17');
INSERT INTO `log` VALUES (681, 3, 'Sepetime Girdi', '2015-12-29 09:21:31');
INSERT INTO `log` VALUES (682, 3, 'Sepetime Girdi', '2015-12-29 09:39:22');
INSERT INTO `log` VALUES (683, 3, 'Sepetime Girdi', '2015-12-29 09:39:37');
INSERT INTO `log` VALUES (684, 3, 'Sepetime Girdi', '2015-12-29 09:40:12');
INSERT INTO `log` VALUES (685, 3, 'Sepetime Girdi', '2015-12-29 09:40:15');
INSERT INTO `log` VALUES (686, 3, 'Sepetime Girdi', '2015-12-29 09:40:23');
INSERT INTO `log` VALUES (687, 3, 'Sepetime Girdi', '2015-12-29 09:40:40');
INSERT INTO `log` VALUES (688, 3, 'Sepetime Girdi', '2015-12-29 09:40:55');
INSERT INTO `log` VALUES (689, 3, 'Sepetime Girdi', '2015-12-29 09:41:35');
INSERT INTO `log` VALUES (690, 3, 'Sepetime Girdi', '2015-12-29 09:51:14');
INSERT INTO `log` VALUES (691, 3, 'Satın al a Girdi', '2015-12-29 09:51:18');
INSERT INTO `log` VALUES (692, 3, 'Sepetime Girdi', '2015-12-29 09:51:21');
INSERT INTO `log` VALUES (693, 3, 'Satın al a Girdi', '2015-12-29 09:51:23');
INSERT INTO `log` VALUES (694, 3, 'Sepetime Girdi', '2015-12-29 09:51:25');
INSERT INTO `log` VALUES (695, 3, 'Satın al a Girdi', '2015-12-29 09:51:43');
INSERT INTO `log` VALUES (696, 3, 'Sepetime Girdi', '2015-12-29 09:51:45');
INSERT INTO `log` VALUES (697, 3, 'Satın al a Girdi', '2015-12-29 09:51:46');
INSERT INTO `log` VALUES (698, 3, 'Sepetime Girdi', '2015-12-29 09:51:48');
INSERT INTO `log` VALUES (699, 3, 'Sepetime Girdi', '2015-12-29 09:53:57');
INSERT INTO `log` VALUES (700, 3, 'Satın al a Girdi', '2015-12-29 09:53:58');
INSERT INTO `log` VALUES (701, 3, 'Sepetime Girdi', '2015-12-29 09:53:59');
INSERT INTO `log` VALUES (702, 3, 'Satın al a Girdi', '2015-12-29 09:54:01');
INSERT INTO `log` VALUES (703, 3, 'Sepetime Girdi', '2015-12-29 09:54:01');
INSERT INTO `log` VALUES (704, 3, 'Satın al a Girdi', '2015-12-29 09:54:18');
INSERT INTO `log` VALUES (705, 3, 'Sepetime Girdi', '2015-12-29 09:54:33');
INSERT INTO `log` VALUES (706, 3, 'Satın al a Girdi', '2015-12-29 09:54:35');
INSERT INTO `log` VALUES (707, 3, 'Sepetime Girdi', '2015-12-29 09:54:36');
INSERT INTO `log` VALUES (708, 3, 'Satın al a Girdi', '2015-12-29 09:56:01');
INSERT INTO `log` VALUES (709, 3, 'Foruma Girdi', '2015-12-29 09:56:03');
INSERT INTO `log` VALUES (710, 3, 'Sepetime Girdi', '2015-12-29 09:56:04');
INSERT INTO `log` VALUES (711, 3, 'Satın al a Girdi', '2015-12-29 09:58:24');
INSERT INTO `log` VALUES (712, 3, 'Sepetime Girdi', '2015-12-29 09:58:45');
INSERT INTO `log` VALUES (713, 3, 'Satın al a Girdi', '2015-12-29 09:58:48');
INSERT INTO `log` VALUES (714, 3, 'Sepetime Girdi', '2015-12-29 10:02:12');
INSERT INTO `log` VALUES (715, 3, 'Satın al a Girdi', '2015-12-29 10:02:15');
INSERT INTO `log` VALUES (716, 3, 'Satın al a Girdi', '2015-12-29 10:02:17');
INSERT INTO `log` VALUES (717, 3, 'Sepetime Girdi', '2015-12-29 10:02:18');
INSERT INTO `log` VALUES (718, 3, 'Sepetime Girdi', '2015-12-29 10:03:08');
INSERT INTO `log` VALUES (719, 3, 'Sepetime Girdi', '2015-12-29 10:03:09');
INSERT INTO `log` VALUES (720, 3, 'Satın al a Girdi', '2015-12-29 10:03:11');
INSERT INTO `log` VALUES (721, 3, 'Satın al a Girdi', '2015-12-29 10:03:15');
INSERT INTO `log` VALUES (722, 3, 'Satın al a Girdi', '2015-12-29 10:03:16');
INSERT INTO `log` VALUES (723, 3, 'Sepetime Girdi', '2015-12-29 10:03:17');
INSERT INTO `log` VALUES (724, 3, 'Satın al a Girdi', '2015-12-29 10:03:17');
INSERT INTO `log` VALUES (725, 3, 'Sepetime Girdi', '2015-12-29 10:03:18');
INSERT INTO `log` VALUES (726, 3, 'Satın al a Girdi', '2015-12-29 10:03:19');
INSERT INTO `log` VALUES (727, 3, 'Sepetime Girdi', '2015-12-29 10:05:30');
INSERT INTO `log` VALUES (728, 3, 'Satın al a Girdi', '2015-12-29 10:05:33');
INSERT INTO `log` VALUES (729, 3, 'Satın al a Girdi', '2015-12-29 10:05:34');
INSERT INTO `log` VALUES (730, 3, 'Sepetime Girdi', '2015-12-29 10:05:35');
INSERT INTO `log` VALUES (731, 3, 'Satın al a Girdi', '2015-12-29 10:05:39');
INSERT INTO `log` VALUES (732, 3, 'Sepetime Girdi', '2015-12-29 10:05:40');
INSERT INTO `log` VALUES (733, 3, 'Sepetime Girdi', '2015-12-29 10:06:18');
INSERT INTO `log` VALUES (734, 3, 'Satın al a Girdi', '2015-12-29 10:06:19');
INSERT INTO `log` VALUES (735, 3, 'Satın al a Girdi', '2015-12-29 10:06:20');
INSERT INTO `log` VALUES (736, 3, 'Sepetime Girdi', '2015-12-29 10:06:21');
INSERT INTO `log` VALUES (737, 3, 'Satın al a Girdi', '2015-12-29 10:06:21');
INSERT INTO `log` VALUES (738, 3, 'Satın al a Girdi', '2015-12-29 10:07:20');
INSERT INTO `log` VALUES (739, 3, 'Satın al a Girdi', '2015-12-29 10:07:21');
INSERT INTO `log` VALUES (740, 3, 'Sepetime Girdi', '2015-12-29 10:07:22');
INSERT INTO `log` VALUES (741, 3, 'Satın al a Girdi', '2015-12-29 10:07:22');
INSERT INTO `log` VALUES (742, 3, 'Sepetime Girdi', '2015-12-29 10:07:23');
INSERT INTO `log` VALUES (743, 3, 'Satın al a Girdi', '2015-12-29 10:07:24');
INSERT INTO `log` VALUES (744, 3, 'Sepetime Girdi', '2015-12-29 10:09:20');
INSERT INTO `log` VALUES (745, 3, 'Satın al a Girdi', '2015-12-29 10:09:22');
INSERT INTO `log` VALUES (746, 3, 'Sepetime Girdi', '2015-12-29 10:09:24');
INSERT INTO `log` VALUES (747, 3, 'Satın al a Girdi', '2015-12-29 10:09:25');
INSERT INTO `log` VALUES (748, 3, 'Sepetime Girdi', '2015-12-29 10:09:26');
INSERT INTO `log` VALUES (749, 3, 'Satın al a Girdi', '2015-12-29 10:09:27');
INSERT INTO `log` VALUES (750, 3, 'Sepetime Girdi', '2015-12-29 10:09:28');
INSERT INTO `log` VALUES (751, 3, 'Satın al a Girdi', '2015-12-29 10:09:28');
INSERT INTO `log` VALUES (752, 3, 'Satın al a Girdi', '2015-12-29 10:11:43');
INSERT INTO `log` VALUES (753, 3, 'Satın al a Girdi', '2015-12-29 10:11:51');
INSERT INTO `log` VALUES (754, 3, 'Sepetime Girdi', '2015-12-29 10:12:21');
INSERT INTO `log` VALUES (755, 3, 'Satın al a Girdi', '2015-12-29 10:12:23');
INSERT INTO `log` VALUES (756, 3, 'Satın al a Girdi', '2015-12-29 10:13:12');
INSERT INTO `log` VALUES (757, 3, 'Satın al a Girdi', '2015-12-29 10:13:34');
INSERT INTO `log` VALUES (758, 3, 'Satın al a Girdi', '2015-12-29 10:14:13');
INSERT INTO `log` VALUES (759, 3, 'Sepetime Girdi', '2015-12-29 10:14:18');
INSERT INTO `log` VALUES (760, 3, 'Sepetime Girdi', '2015-12-29 10:20:01');
INSERT INTO `log` VALUES (761, 3, 'Kitap Silmeye Girdi', '2015-12-29 10:20:05');
INSERT INTO `log` VALUES (762, 3, 'Sepetime Girdi', '2015-12-29 10:20:07');
INSERT INTO `log` VALUES (763, 3, 'Kitap Silmeye Girdi', '2015-12-29 10:20:09');
INSERT INTO `log` VALUES (764, 3, 'Sepetime Girdi', '2015-12-29 10:20:10');
INSERT INTO `log` VALUES (765, 3, 'Kitap Satın aldı', '2015-12-29 10:20:13');
INSERT INTO `log` VALUES (766, 3, 'Sepetime Girdi', '2015-12-29 10:21:28');
INSERT INTO `log` VALUES (767, 3, 'Kitap Silmeye Girdi', '2015-12-29 10:21:31');
INSERT INTO `log` VALUES (768, 3, 'Sepetime Girdi', '2015-12-29 10:21:32');
INSERT INTO `log` VALUES (769, 3, 'Kitap Silmeye Girdi', '2015-12-29 10:21:36');
INSERT INTO `log` VALUES (770, 3, 'Sepetime Girdi', '2015-12-29 10:21:38');
INSERT INTO `log` VALUES (771, 3, 'Sepetime Girdi', '2015-12-29 10:22:40');
INSERT INTO `log` VALUES (772, 3, 'Kitap Silmeye Girdi', '2015-12-29 10:22:41');
INSERT INTO `log` VALUES (773, 3, 'Sepetime Girdi', '2015-12-29 10:22:42');
INSERT INTO `log` VALUES (774, 3, 'Sepetime Girdi', '2015-12-29 10:22:55');
INSERT INTO `log` VALUES (775, 3, 'Sepetime Girdi', '2015-12-29 10:24:04');
INSERT INTO `log` VALUES (776, 3, 'Kitap Silmeye Girdi', '2015-12-29 10:24:08');
INSERT INTO `log` VALUES (777, 3, 'Sepetime Girdi', '2015-12-29 10:24:10');
INSERT INTO `log` VALUES (778, 3, 'Kitap Silmeye Girdi', '2015-12-29 10:24:12');
INSERT INTO `log` VALUES (779, 3, 'Sepetime Girdi', '2015-12-29 10:24:13');
INSERT INTO `log` VALUES (780, 3, 'Sepetime Girdi', '2015-12-29 10:26:04');
INSERT INTO `log` VALUES (781, 3, 'Kitap Silmeye Girdi', '2015-12-29 10:26:06');
INSERT INTO `log` VALUES (782, 3, 'Sepetime Girdi', '2015-12-29 10:26:06');
INSERT INTO `log` VALUES (783, 3, 'Kitap Silmeye Girdi', '2015-12-29 10:26:08');
INSERT INTO `log` VALUES (784, 3, 'Sepetime Girdi', '2015-12-29 10:26:08');
INSERT INTO `log` VALUES (785, 3, 'Kitap Silmeye Girdi', '2015-12-29 10:26:11');
INSERT INTO `log` VALUES (786, 3, 'Sepetime Girdi', '2015-12-29 10:26:11');
INSERT INTO `log` VALUES (787, 3, 'Kitap Silmeye Girdi', '2015-12-29 10:26:12');
INSERT INTO `log` VALUES (788, 3, 'Sepetime Girdi', '2015-12-29 10:26:12');
INSERT INTO `log` VALUES (789, 3, 'Kitap Silmeye Girdi', '2015-12-29 10:26:14');
INSERT INTO `log` VALUES (790, 3, 'Sepetime Girdi', '2015-12-29 10:26:14');
INSERT INTO `log` VALUES (791, 3, 'Kitap Silmeye Girdi', '2015-12-29 10:26:15');
INSERT INTO `log` VALUES (792, 3, 'Sepetime Girdi', '2015-12-29 10:26:15');
INSERT INTO `log` VALUES (793, 3, 'Kitap Silmeye Girdi', '2015-12-29 10:26:19');
INSERT INTO `log` VALUES (794, 3, 'Sepetime Girdi', '2015-12-29 10:26:19');
INSERT INTO `log` VALUES (795, 3, 'Sepetime Girdi', '2015-12-29 10:26:32');
INSERT INTO `log` VALUES (796, 3, 'Kitap Silmeye Girdi', '2015-12-29 10:26:34');
INSERT INTO `log` VALUES (797, 3, 'Sepetime Girdi', '2015-12-29 10:26:34');
INSERT INTO `log` VALUES (798, 3, 'Kitap Satın aldı', '2015-12-29 10:26:56');
INSERT INTO `log` VALUES (799, 3, 'Sepetime Girdi', '2015-12-29 10:26:58');
INSERT INTO `log` VALUES (800, 3, 'Foruma Girdi', '2015-12-29 10:26:59');
INSERT INTO `log` VALUES (801, 3, 'Sepetime Girdi', '2015-12-29 10:27:00');
INSERT INTO `log` VALUES (802, 3, 'AnaSayfaya Girdi', '2015-12-29 10:27:01');
INSERT INTO `log` VALUES (803, 3, 'AnaSayfaya Girdi', '2015-12-29 10:27:03');
INSERT INTO `log` VALUES (804, 3, 'AnaSayfaya Girdi', '2015-12-29 10:27:06');
INSERT INTO `log` VALUES (805, 3, 'Sepetime Girdi', '2015-12-29 10:27:06');
INSERT INTO `log` VALUES (806, 3, 'Kitap Satın aldı', '2015-12-29 10:27:07');
INSERT INTO `log` VALUES (807, 3, 'Kitap Satın aldı', '2015-12-29 10:27:09');
INSERT INTO `log` VALUES (808, 3, 'Sepetime Girdi', '2015-12-29 10:27:10');
INSERT INTO `log` VALUES (809, 3, 'Foruma Girdi', '2015-12-29 10:27:10');
INSERT INTO `log` VALUES (810, 3, 'Sepetime Girdi', '2015-12-29 10:28:34');
INSERT INTO `log` VALUES (811, 3, 'Yönetici Sayfasına Girdi', '2015-12-29 10:28:48');
INSERT INTO `log` VALUES (812, 3, 'Kitap Ekleye Girdi', '2015-12-29 10:28:50');
INSERT INTO `log` VALUES (813, 3, 'Kitap Ekleye Girdi', '2015-12-29 10:31:58');
INSERT INTO `log` VALUES (814, 3, 'AnaSayfaya Girdi', '2015-12-29 10:32:01');
INSERT INTO `log` VALUES (815, 3, 'AnaSayfaya Girdi', '2015-12-29 10:32:03');
INSERT INTO `log` VALUES (816, 3, 'Sanat. Kategorisine Girdi', '2015-12-29 10:32:05');
INSERT INTO `log` VALUES (817, 3, 'KEREMİN HAYATI. Kitaba Girdi', '2015-12-29 10:32:08');
INSERT INTO `log` VALUES (818, 3, 'Bilim. Kategorisine Girdi', '2015-12-29 10:32:30');
INSERT INTO `log` VALUES (819, 3, 'RÖNESANS ESTETİĞİ. Kitaba Girdi', '2015-12-29 10:32:32');
INSERT INTO `log` VALUES (820, 3, 'AnaSayfaya Girdi', '2015-12-29 10:33:52');
INSERT INTO `log` VALUES (821, 3, 'Foruma Girdi', '2015-12-29 10:33:54');
INSERT INTO `log` VALUES (822, 3, 'Sinema. Kategorisine Girdi', '2015-12-29 10:33:56');
INSERT INTO `log` VALUES (823, 3, 'Sanat. Kategorisine Girdi', '2015-12-29 10:33:59');
INSERT INTO `log` VALUES (824, 3, 'Sanat. Kategorisine Girdi', '2015-12-29 10:35:22');
INSERT INTO `log` VALUES (825, 3, 'SANAT TARİHİ. Kitaba Girdi', '2015-12-29 10:35:25');
INSERT INTO `log` VALUES (826, 3, 'Bilim. Kategorisine Girdi', '2015-12-29 10:35:27');
INSERT INTO `log` VALUES (827, 3, 'Tarih. Kategorisine Girdi', '2015-12-29 10:35:29');
INSERT INTO `log` VALUES (828, 3, 'Sinema. Kategorisine Girdi', '2015-12-29 10:35:32');
INSERT INTO `log` VALUES (829, 3, 'Edebiyat. Kategorisine Girdi', '2015-12-29 10:35:34');

-- --------------------------------------------------------

-- 
-- Tablo yapısı: `satinal`
-- 

CREATE TABLE `satinal` (
  `idSatin` int(11) NOT NULL AUTO_INCREMENT,
  `idKullanici` int(11) NOT NULL,
  `idKitap` int(11) NOT NULL,
  `Adet` int(11) NOT NULL,
  `Fiyat` int(11) NOT NULL,
  `Tarih` datetime NOT NULL,
  PRIMARY KEY (`idSatin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=8 ;

-- 
-- Tablo döküm verisi `satinal`
-- 

INSERT INTO `satinal` VALUES (3, 3, 25, 10, 11, '2015-12-29 10:02:15');
INSERT INTO `satinal` VALUES (4, 3, 25, 9, 11, '2015-12-29 10:03:12');
INSERT INTO `satinal` VALUES (5, 3, 25, 8, 11, '2015-12-29 10:05:33');
INSERT INTO `satinal` VALUES (6, 3, 27, 12, 25, '2015-12-29 10:05:39');
INSERT INTO `satinal` VALUES (7, 3, 25, 7, 11, '2015-12-29 10:09:23');

-- --------------------------------------------------------

-- 
-- Tablo yapısı: `sepetim`
-- 

CREATE TABLE `sepetim` (
  `idSepet` int(11) NOT NULL AUTO_INCREMENT,
  `idKullanici` int(255) NOT NULL,
  `idKitap` int(11) NOT NULL,
  `Tarih` date NOT NULL,
  PRIMARY KEY (`idSepet`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=36 ;

-- 
-- Tablo döküm verisi `sepetim`
-- 

INSERT INTO `sepetim` VALUES (1, 2, 28, '2015-12-26');
INSERT INTO `sepetim` VALUES (2, 2, 28, '2015-12-26');
INSERT INTO `sepetim` VALUES (20, 2, 28, '2015-12-26');
INSERT INTO `sepetim` VALUES (21, 2, 28, '2015-12-26');
INSERT INTO `sepetim` VALUES (22, 2, 41, '2015-12-26');
INSERT INTO `sepetim` VALUES (23, 2, 29, '2015-12-26');
INSERT INTO `sepetim` VALUES (24, 2, 25, '2015-12-26');
INSERT INTO `sepetim` VALUES (25, 2, 29, '2015-12-26');
INSERT INTO `sepetim` VALUES (27, 3, 34, '2015-12-27');
INSERT INTO `sepetim` VALUES (28, 3, 29, '2015-12-27');
INSERT INTO `sepetim` VALUES (29, 3, 25, '2015-12-28');
INSERT INTO `sepetim` VALUES (30, 3, 28, '2015-12-28');
INSERT INTO `sepetim` VALUES (31, 3, 25, '2015-12-28');
INSERT INTO `sepetim` VALUES (32, 3, 27, '2015-12-28');
INSERT INTO `sepetim` VALUES (33, 3, 28, '2015-12-28');
INSERT INTO `sepetim` VALUES (34, 3, 40, '2015-12-28');
INSERT INTO `sepetim` VALUES (35, 2, 28, '2015-12-29');
