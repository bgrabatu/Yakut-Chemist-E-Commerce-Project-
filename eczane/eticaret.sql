-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 10 Oca 2022, 22:31:58
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `eticaret`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `baslik` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(200) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `anahtarkelime` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `adres` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `facebook` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `instagram` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `youtube` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `twitter` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `logo` varchar(300) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `mesai` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `baslik`, `aciklama`, `anahtarkelime`, `telefon`, `email`, `adres`, `facebook`, `instagram`, `youtube`, `twitter`, `logo`, `mesai`) VALUES
(1, 'YAKUT ECZANESİ', 'Bilgiler', 'satış', '05388303992', 'batuhanbsr.60@gmail.com', 'İstanbul/Florya', 'Oktay Kuzu', 'oktikuzu', 'Oktay Kuzu', 'oktikzu', '308804512927139229aferinhot.png', '7/24');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_id` int(11) NOT NULL,
  `hakkimizda_baslik` varchar(300) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_detay` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_resim` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_misyon` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_vizyon` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_detay`, `hakkimizda_resim`, `hakkimizda_misyon`, `hakkimizda_vizyon`) VALUES
(1, 'Hakkımızda', 'Yakut Eczanesi', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_adi` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kategori_sira` int(11) NOT NULL,
  `kategori_durum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_adi`, `kategori_sira`, `kategori_durum`) VALUES
(18, 'Kırmızı Reçete', 2, 1),
(19, 'Yeşil Reçete', 3, 1),
(20, 'Turuncu Reçete', 4, 1),
(22, 'Reçetesiz', 6, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kullanici_ad` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_sifre` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adsoyad` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_yetki` int(2) NOT NULL,
  `kullanici_adres` varchar(300) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_il` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_ilce` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_tel` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_resim` varchar(200) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_mail` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_zaman`, `kullanici_ad`, `kullanici_sifre`, `kullanici_adsoyad`, `kullanici_yetki`, `kullanici_adres`, `kullanici_il`, `kullanici_ilce`, `kullanici_tel`, `kullanici_resim`, `kullanici_mail`) VALUES
(30, '2021-12-28 10:54:24', 'abuzittin@gmail.com', '202cb962ac59075b964b07152d234b70', 'Abuzittin Demir', 1, 'Türkiye', 'İstanbul', 'Sultanbeyli', '05388303992', '', 'abuzittinreis@gmail.com'),
(31, '2021-12-20 12:10:20', 'bgrabatu', '202cb962ac59075b964b07152d234b70', 'Batuhan Başar', 2, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisler`
--

CREATE TABLE `siparisler` (
  `siparis_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `siparis_zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `urun_adet` int(11) NOT NULL,
  `urun_fiyat` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `toplam_fiyat` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `odeme_turu` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `siparis_onay` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `siparisler`
--

INSERT INTO `siparisler` (`siparis_id`, `kullanici_id`, `urun_id`, `siparis_zaman`, `urun_adet`, `urun_fiyat`, `toplam_fiyat`, `odeme_turu`, `siparis_onay`) VALUES
(31, 30, 70, '2022-01-10 21:14:11', 1, '1.00', '335.3796', '1', 0),
(32, 30, 51, '2022-01-10 21:14:11', 1, '16.78', '335.3796', '1', 0),
(33, 30, 88, '2022-01-10 21:14:11', 4, '66.61', '335.3796', '1', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_baslik` varchar(300) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `slider_aciklama` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `slider_link` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `slider_button` varchar(200) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `slider_resim` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `slider_sira` int(11) NOT NULL,
  `slider_durum` int(11) NOT NULL,
  `slider_banner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_baslik`, `slider_aciklama`, `slider_link`, `slider_button`, `slider_resim`, `slider_sira`, `slider_durum`, `slider_banner`) VALUES
(30, 'TURKOVAC', 'Turkovac,3. dozda antikoru 4.5 kat arttırıyor', 'https://www.trthaber.com/haber/koronavirus/turkovac-ucuncu-dozda-antikoru-4-5-kat-artiriyor-638894.html', 'Habere Git', '8591440154150074', 1, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `urun_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `urun_resim` varchar(300) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_baslik` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_sira` int(11) NOT NULL,
  `urun_model` varchar(200) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_renk` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_adet` int(11) NOT NULL,
  `urun_fiyat` float(10,2) NOT NULL,
  `onecikan` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_durum` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `urun_etiket` varchar(300) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`urun_id`, `kategori_id`, `urun_resim`, `urun_baslik`, `urun_aciklama`, `urun_sira`, `urun_model`, `urun_renk`, `urun_adet`, `urun_fiyat`, `onecikan`, `urun_durum`, `urun_zaman`, `urun_etiket`) VALUES
(50, 18, 'dramamine.png', 'DRAMAMİNE', '<p>50mg 12 Tablet</p>\r\n', 1, 'Tablet', '', 25, 3.39, '1', '1', '2022-01-10 20:07:19', 'dramamine tablet'),
(51, 18, 'aldolan5.png', 'ALDOLAN', '<p>100mg/3ml 25 Ampül</p>\n', 2, 'Ampül', '', 10, 16.78, '1', '1', '2022-01-10 20:16:35', 'aldolan'),
(52, 18, 'aferinsinus.png', 'A-FERİN SİNÜS', '<p>500/30/1.25mg Film Kaplı Tablet</p>\r\n', 3, 'Tablet', '', 15, 18.80, '1', '1', '2022-01-10 20:16:55', 'aferin'),
(53, 18, 'aferinhot.png', 'A-FERİN HOT', '<p>10 Poşet</p>\r\n', 4, 'Poşet', '', 12, 12.77, '1', '1', '2022-01-10 20:17:05', 'aferin'),
(54, 18, 'apranax.png', 'APRANAX', '<p>275mg 10 Film Kaplı Tablet</p>\r\n', 5, 'Tablet', '', 13, 6.06, '1', '1', '2022-01-10 20:17:15', 'apranax'),
(55, 18, 'benicoldtablet.png', 'BENİCAL COLD', '<p>20 Film Tablet</p>\r\n', 6, 'Tablet', '', 26, 10.06, '1', '1', '2022-01-10 20:17:48', 'benical cold'),
(56, 18, 'abstral.png', 'ABSTRAL', '<p>10 Dilaltı Tablet</p>\r\n', 7, 'Tablet', '', 24, 105.55, '1', '1', '2022-01-10 20:18:02', 'abstral'),
(57, 18, 'eksofedtablet.png', 'EKSOFED', '<p>60mg 30 Tablet</p>\r\n', 8, 'Tablet', '', 12, 12.65, '1', '1', '2022-01-10 20:18:16', 'eksofed tablet'),
(58, 18, 'eksofedsurup.png', 'EKSOFED', '<p>150ml Şurup</p>\r\n', 9, 'Şurup', '', 24, 12.77, '1', '1', '2022-01-10 20:19:06', 'eksofed şurup'),
(59, 18, 'gabaset.png', 'GABASET', '<p>400mg 50 Tablet</p>\r\n', 10, 'Tablet', '', 15, 42.69, '1', '1', '2022-01-10 20:19:18', 'gabaset'),
(60, 19, 'contramal50mg20kapsül.png', 'CONTRAMAL', '<p>50mg 20 Kaps&uuml;l</p>\r\n\r\n<p>&nbsp;</p>\r\n', 11, 'Kapsül', '', 12, 23.17, '1', '1', '2022-01-10 20:28:30', 'contramal'),
(61, 19, 'contramal100mg30tablet.png', 'CONTRAMAL', '<p>100mg 30 Tablet</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 12, 'Tablet', '', 13, 45.20, '1', '1', '2022-01-10 20:28:59', 'contramal'),
(62, 19, 'contramal100mgçözelti.png', 'CONTRAMAL', '<p>100mg/2ml Enjeksiyonluk &Ccedil;&ouml;zelti</p>\r\n\r\n<p>&nbsp;</p>\r\n', 13, 'Çözelti', '', 15, 23.17, '1', '1', '2022-01-10 20:31:20', 'contramal'),
(63, 19, 'alond75mg.png', 'ALOND', '<p>75gr 14 Kaps&uuml;l</p>\r\n\r\n<p>&nbsp;</p>\r\n', 14, 'Kapsül', '', 20, 28.88, '1', '1', '2022-01-10 20:29:28', 'alond'),
(64, 19, 'alyse25mg.png', 'ALYSE', '<p>25mg 56 Kaps&uuml;l</p>\r\n\r\n<p>&nbsp;</p>\r\n', 15, 'Kapsül', '', 5, 20.99, '1', '1', '2022-01-10 20:29:44', 'alyse'),
(65, 19, 'begolin150.png', 'BEGOLİN PLUS', '<p>150mg/1mg 56 Film Tablet</p>\r\n\r\n<p>&nbsp;</p>\r\n', 16, 'Tablet', '', 20, 140.49, '1', '1', '2022-01-10 20:29:59', 'begolinplus'),
(66, 19, 'codefen20.png', 'CODEFEN', '<p>50/50mg 20 Efervesan Tablet</p>\r\n\r\n<p>&nbsp;</p>\r\n', 17, 'Tablet', '', 3, 14.84, '1', '1', '2022-01-10 20:31:06', 'codefen'),
(67, 19, 'contratek.png', 'CONTRATEK', '<p>100mg 30 Efersevan Tablet</p>\r\n\r\n<p>&nbsp;</p>\r\n', 18, 'Tablet', '', 5, 34.84, '1', '1', '2022-01-10 20:30:31', 'contratek'),
(68, 19, 'diaksi5.png', 'DİAKSİ', '<p>5mg/2.5ml Rektal &Ccedil;&ouml;zelti</p>\r\n\r\n<p>&nbsp;</p>\r\n', 19, 'Çözelti', '', 2, 168.20, '1', '1', '2022-01-10 20:30:44', 'diaksi'),
(69, 19, 'ativan1.png', 'ATİVAN EXPİDET', '<p>1mg 20 Tablet</p>\r\n\r\n<p>&nbsp;</p>\r\n', 20, 'Tablet', '', 6, 26.62, '1', '1', '2022-01-10 20:30:52', 'ativan'),
(70, 20, 'beriate500ıu.png', 'BERİATE', '<p>500IU UV Enjeksiyonluk</p>\r\n\r\n<p>&nbsp;</p>\r\n', 21, 'Enjeksiyonluk', '', 1, 1.00, '1', '1', '2022-01-10 20:41:55', 'beriate'),
(71, 20, 'beriate1000ıu.png', 'BERİATE', '<p>1000IU UV Enjeksiyonluk</p>\r\n\r\n<p>&nbsp;</p>\r\n', 22, 'Enjeksiyonluk', '', 2, 2.12, '1', '1', '2022-01-10 20:42:06', 'beriate'),
(73, 20, 'benefix1000ıu.png', 'BENEFİX', '<p>1000IU UV Enjeksiyonluk</p>\r\n\r\n<p>&nbsp;</p>\r\n', 23, 'Enjeksiyonluk', '', 3, 4.01, '1', '1', '2022-01-10 20:42:18', 'benefix'),
(74, 20, 'betafact1000ıu.png', 'BETAFACT', '<p>500IU/10ml 1 Flakon</p>\r\n\r\n<p>&nbsp;</p>\r\n', 24, 'Flakon', '', 1, 2.15, '1', '1', '2022-01-10 20:44:34', 'betafakt'),
(75, 20, 'cofact.png', 'COFACT', '<p>10ml IV Enjeksiyonluk</p>\r\n\r\n<p>&nbsp;</p>\r\n', 25, 'Enjeksiyonluk', '', 2, 1.60, '1', '1', '2022-01-10 20:44:42', 'cofakt'),
(76, 20, 'EMOCLOT-DI-500-IU-1-FLAKON.png', 'EMOCLOT DI', '<p>500IU 1 Flakon</p>\r\n\r\n<p>&nbsp;</p>\r\n', 26, 'Flakon', '', 2, 1.51, '1', '1', '2022-01-10 20:44:54', 'emoklot'),
(77, 20, 'FACTANE-FAKTOR-VIII-1000-IU-10-ML-1-FLAKON.png', 'FACTANE FACTOR VIII', '<p>1000IU 1 Flakon</p>\r\n\r\n<p>&nbsp;</p>\r\n', 27, 'Flakon', '', 3, 3.71, '1', '1', '2022-01-10 20:45:33', 'factane'),
(78, 20, 'FACTANE-FAKTOR-VIII-500-IU-10-ML-1-FLAKON.png', 'FACTANE DI FACTOR ', '<p>500IU 1 Flakon</p>\r\n\r\n<p>&nbsp;</p>\r\n', 28, 'Flakon', '', 2, 1.75, '1', '1', '2022-01-10 20:45:19', 'factane dı factor'),
(79, 20, 'FANHDI-1000-IU-1-FLAKON.png', 'FANHDİ', '<p>1000IU 1 Flakon</p>\r\n\r\n<p>&nbsp;</p>\r\n', 29, 'Flakon', '', 3, 2.67, '1', '1', '2022-01-10 20:45:43', 'fanhdi'),
(81, 20, 'aimafix500.png', 'AIMAFIX', '<p>500IU 1 Flakon</p>\r\n\r\n<p>&nbsp;</p>\r\n', 30, 'Flakon', '', 3, 1.26, '1', '1', '2022-01-10 20:46:12', 'aimafix'),
(82, 22, 'BEPANTHEN-20-PASTIL.png', 'BEPANTHEN', '<p>20 Pastil</p>\r\n\r\n<p>&nbsp;</p>\r\n', 31, 'Pastil', '', 20, 32.50, '1', '1', '2022-01-10 21:02:20', 'bepanthen'),
(83, 22, 'BEPANTHEN-PLUS-KREM-30-G.png', 'BEPANTHEN PLUS KREM', '<p>30mg</p>\r\n\r\n<p>&nbsp;</p>\r\n', 32, 'Krem', '', 25, 35.60, '1', '1', '2022-01-10 21:02:33', 'bepanthen krem'),
(84, 22, 'BEVITIN-C.png', 'BEVITIN-C', '<p>30mg</p>\r\n\r\n<p>&nbsp;</p>\r\n', 33, 'Hap', '', 20, 12.47, '1', '1', '2022-01-10 21:04:59', 'bevitin c'),
(85, 22, 'CAROVIT-20-MG-30-YUMUSAK-KAPSUL.png', 'CAROVİT', '<p>20mg 100 Yumuşak Kaps&uuml;l</p>\r\n\r\n<p>&nbsp;</p>\r\n', 34, 'Kapsül', '', 25, 38.32, '1', '1', '2022-01-10 21:02:52', 'carovit'),
(86, 22, 'evicap-fort-400-iu-30-yumusak-kapsul.png', 'EVİCAP-FORT', '<p>400IU 30 Yumuşak Kaps&uuml;l</p>\r\n\r\n<p>&nbsp;</p>\r\n', 35, 'Kapsül', '', 17, 68.36, '1', '1', '2022-01-10 21:03:08', 'evicap'),
(87, 22, 'EVICAP-200-IU-30-YUMUSAK-KAPSUL.png', 'EVİCAP', '<p>200IU 30 Yumuşak Kaps&uuml;l</p>\r\n\r\n<p>&nbsp;</p>\r\n', 36, 'Kapsül', '', 12, 49.12, '1', '1', '2022-01-10 21:03:30', 'evicap'),
(88, 22, 'ACE-PLUS-SELENYUM-30-YUMUSAK-KAPSUL.png', 'ACE PLUS SELENYUM', '<p>30 Yumuşak Kaps&uuml;l</p>\r\n\r\n<p>&nbsp;</p>\r\n', 37, 'Kapsül', '', 12, 66.61, '1', '1', '2022-01-10 21:03:41', 'ace plus'),
(89, 22, 'ALOPEXY-T-5-DERI-SPREYI-60-ML.png', 'ALOPEXY T-5', '<p>Deri Spreyi 60ml</p>\r\n\r\n<p>&nbsp;</p>\r\n', 38, 'Sprey', '', 16, 135.19, '1', '1', '2022-01-10 21:04:00', 'alopexy'),
(90, 22, 'ANDROVIUM-2-TOPIKAL-COZELTI.png', 'ANDROVİUM', '<p>%5 Topical &Ccedil;&ouml;zelti</p>\r\n\r\n<p>&nbsp;</p>\r\n', 39, 'Çözelti', '', 25, 171.31, '1', '1', '2022-01-10 21:04:22', 'androvium'),
(91, 22, 'BECOVITAL-C-30-YUMUSAK-KAPSUL.png', 'BECOVİTAL', '<p>30 Yumuşak Kaps&uuml;l</p>\r\n\r\n<p>&nbsp;</p>\r\n', 40, 'Kapsül', '', 11, 12.77, '1', '1', '2022-01-10 21:04:35', 'becovital');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `yorum_id` int(11) NOT NULL,
  `yorum_detay` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yorum_zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `urun_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `yorum_onay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`yorum_id`, `yorum_detay`, `yorum_zaman`, `urun_id`, `kullanici_id`, `yorum_onay`) VALUES
(8, 'Hızlı Teslimat Ve Doğru İlacı Gönderdiler Yakut Eczanesine Teşekkür Ederim :)', '2022-01-10 21:17:26', 90, 30, 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`hakkimizda_id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `siparisler`
--
ALTER TABLE `siparisler`
  ADD PRIMARY KEY (`siparis_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorum_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Tablo için AUTO_INCREMENT değeri `siparisler`
--
ALTER TABLE `siparisler`
  MODIFY `siparis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
