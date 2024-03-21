-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 26 May 2023, 14:25:19
-- Sunucu sürümü: 5.6.20
-- PHP Sürümü: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `erdem`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kisi`
--

CREATE TABLE IF NOT EXISTS `kisi` (
`kisi_id` int(11) NOT NULL,
  `kisi_no` varchar(11) NOT NULL,
  `kisi_ad` varchar(50) NOT NULL,
  `kisi_soyad` varchar(50) NOT NULL,
  `kisi_tip` varchar(1) NOT NULL,
  `kisi_durum` varchar(1) NOT NULL DEFAULT 'E',
  `kisi_aciklama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Tablo döküm verisi `kisi`
--

INSERT INTO `kisi` (`kisi_id`, `kisi_no`, `kisi_ad`, `kisi_soyad`, `kisi_tip`, `kisi_durum`, `kisi_aciklama`) VALUES
(1, '2022800721', 'ERDEM', 'AVLAĞI', 'O', 'E', NULL),
(2, '2022800700', 'ABUŞ', 'ABUŞOĞLU', 'O', 'H', 'Sınıfta kaldı maldonado'),
(3, '2022800701', 'Cristiano', 'Ronaldo', 'O', 'E', ''),
(4, '2022800703', 'Lionel', 'Messi', 'O', 'E', NULL),
(5, '2022800704', 'Rene', 'Higuita', 'O', 'E', NULL),
(6, '2022800702', 'Uche', 'Okechukwu', 'O', 'E', NULL),
(7, '33333333333', 'JOHN', 'TOSHACK', 'P', 'E', ''),
(8, '22222222222', 'Christoph', 'Daum', 'P', 'H', ''),
(9, '11111111111', 'METİN', 'TEKİN', 'P', 'E', NULL),
(10, '44444444444', 'TODOR', 'VESELİNOVİÇ', 'P', 'H', ''),
(11, '55555555555', 'YILMAZ', 'VURAL', 'P', 'E', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kisi_kart`
--

CREATE TABLE IF NOT EXISTS `kisi_kart` (
`kart_id` int(11) NOT NULL,
  `kisi_no` varchar(11) NOT NULL,
  `kart_no` varchar(25) NOT NULL,
  `kart_durum` varchar(1) NOT NULL DEFAULT 'E'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `kisi_kart`
--

INSERT INTO `kisi_kart` (`kart_id`, `kisi_no`, `kart_no`, `kart_durum`) VALUES
(1, '2022800721', '1352196679', 'E'),
(2, '2022800703', '3296344085', 'E'),
(3, '2022800701', '3302511397', 'E'),
(4, '2022800700', '3311630037', 'E');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE IF NOT EXISTS `kullanicilar` (
`kullanici_id` int(11) NOT NULL,
  `kullanici_sifre` varchar(6) NOT NULL DEFAULT '123456',
  `kullanici_tc` varchar(11) NOT NULL,
  `kullanici_tip` varchar(1) NOT NULL DEFAULT '1',
  `kullanici_durum` varchar(1) NOT NULL DEFAULT 'E'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`kullanici_id`, `kullanici_sifre`, `kullanici_tc`, `kullanici_tip`, `kullanici_durum`) VALUES
(1, '123456', '11111111111', '9', 'E'),
(2, '123456', '22222222222', '1', 'H'),
(3, '123456', '33333333333', '1', 'E'),
(4, '123456', '44444444444', '1', 'H');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `terminaller`
--

CREATE TABLE IF NOT EXISTS `terminaller` (
`terminal_id` int(11) NOT NULL,
  `terminal_sahibi` varchar(11) NOT NULL,
  `terminal_kod` varchar(20) NOT NULL,
  `terminal_durum` varchar(1) NOT NULL DEFAULT 'E'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `terminaller`
--

INSERT INTO `terminaller` (`terminal_id`, `terminal_sahibi`, `terminal_kod`, `terminal_durum`) VALUES
(1, '33333333333', 'ODKS0001', 'E');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yoklama_log`
--

CREATE TABLE IF NOT EXISTS `yoklama_log` (
`log_id` int(11) NOT NULL,
  `yoklama_kartno` varchar(25) NOT NULL,
  `yoklama_tarih` datetime NOT NULL,
  `yoklama_ip` varchar(15) NOT NULL,
  `yoklama_tip` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=87 ;

--
-- Tablo döküm verisi `yoklama_log`
--

INSERT INTO `yoklama_log` (`log_id`, `yoklama_kartno`, `yoklama_tarih`, `yoklama_ip`, `yoklama_tip`) VALUES
(1, '1352196679', '2023-01-11 16:01:38', '194.27.103.251', 'ODKS0001'),
(2, '1237037878', '2023-01-11 16:56:50', '194.27.103.251', 'ODKS0001'),
(3, '1352196679', '2023-01-11 16:57:10', '194.27.103.251', 'ODKS0001'),
(4, '3317593637', '2023-01-17 14:45:23', '194.27.103.251', 'ODKS0001'),
(5, '3296344085', '2023-01-17 14:45:25', '194.27.103.251', 'ODKS0001'),
(6, '3302511397', '2023-01-17 14:45:26', '194.27.103.251', 'ODKS0001'),
(7, '3311630037', '2023-01-17 14:45:27', '194.27.103.251', 'ODKS0001'),
(8, '3317593637', '2023-01-17 14:45:28', '194.27.103.251', 'ODKS0001'),
(9, '3296344085', '2023-01-17 14:45:29', '194.27.103.251', 'ODKS0001'),
(10, '3302511397', '2023-01-17 14:45:31', '194.27.103.251', 'ODKS0001'),
(11, '3311630037', '2023-01-17 14:45:32', '194.27.103.251', 'ODKS0001'),
(12, '3302511397', '2023-01-17 14:45:42', '194.27.103.251', 'ODKS0001'),
(13, '3296344085', '2023-01-17 14:45:42', '194.27.103.251', 'ODKS0001'),
(14, '3317593637', '2023-01-17 14:45:42', '194.27.103.251', 'ODKS0001'),
(15, '3311630037', '2023-01-17 14:45:42', '194.27.103.251', 'ODKS0001'),
(16, '3317593637', '2023-01-17 14:45:42', '194.27.103.251', 'ODKS0001'),
(17, '3317593637', '2023-01-17 14:45:42', '194.27.103.251', 'ODKS0001'),
(18, '3296344085', '2023-01-17 14:45:42', '194.27.103.251', 'ODKS0001'),
(19, '3302511397', '2023-01-17 14:45:44', '194.27.103.251', 'ODKS0001'),
(20, '3311630037', '2023-01-17 14:45:45', '194.27.103.251', 'ODKS0001'),
(21, '3311630037', '2023-01-17 14:45:45', '194.27.103.251', 'ODKS0001'),
(22, '3296344085', '2023-01-17 14:45:46', '194.27.103.251', 'ODKS0001'),
(23, '3317593637', '2023-01-17 14:45:48', '194.27.103.251', 'ODKS0001'),
(24, '3302511397', '2023-01-17 14:45:50', '194.27.103.251', 'ODKS0001'),
(25, '3296344085', '2023-01-17 14:45:52', '194.27.103.251', 'ODKS0001'),
(26, '3311630037', '2023-01-17 14:45:53', '194.27.103.251', 'ODKS0001'),
(27, '3296344085', '2023-01-17 14:45:55', '194.27.103.251', 'ODKS0001'),
(28, '1352196679', '2023-01-17 14:46:16', '194.27.103.251', 'ODKS0001'),
(29, '3296344085', '2023-01-17 14:46:21', '194.27.103.251', 'ODKS0001'),
(30, '3311630037', '2023-01-17 14:46:21', '194.27.103.251', 'ODKS0001'),
(31, '3302511397', '2023-01-17 14:46:21', '194.27.103.251', 'ODKS0001'),
(32, '3296344085', '2023-01-17 14:46:22', '194.27.103.251', 'ODKS0001'),
(33, '3311630037', '2023-01-17 14:46:23', '194.27.103.251', 'ODKS0001'),
(34, '1352196679', '2023-01-17 14:46:25', '194.27.103.251', 'ODKS0001'),
(35, '3311630037', '2023-01-17 14:46:27', '194.27.103.251', 'ODKS0001'),
(36, '1352196679', '2023-01-17 14:46:29', '194.27.103.251', 'ODKS0001'),
(37, '3296344085', '2023-01-17 14:46:30', '194.27.103.251', 'ODKS0001'),
(38, '3302511397', '2023-01-17 14:46:32', '194.27.103.251', 'ODKS0001'),
(39, '3296344085', '2023-01-17 14:46:33', '194.27.103.251', 'ODKS0001'),
(40, '3311630037', '2023-01-17 14:46:34', '194.27.103.251', 'ODKS0001'),
(41, '1352196679', '2023-01-17 14:46:36', '194.27.103.251', 'ODKS0001'),
(42, '3311630037', '2023-01-17 14:46:38', '194.27.103.251', 'ODKS0001'),
(43, '3296344085', '2023-01-17 14:46:39', '194.27.103.251', 'ODKS0001'),
(44, '3302511397', '2023-01-17 14:46:41', '194.27.103.251', 'ODKS0001'),
(45, '3296344085', '2023-01-17 14:46:42', '194.27.103.251', 'ODKS0001'),
(46, '3311630037', '2023-01-17 14:46:44', '194.27.103.251', 'ODKS0001'),
(47, '1352196679', '2023-01-17 14:46:45', '194.27.103.251', 'ODKS0001'),
(48, '3317593637', '2023-01-17 14:46:47', '194.27.103.251', 'ODKS0001'),
(49, '1352196679', '2023-01-17 14:46:48', '194.27.103.251', 'ODKS0001'),
(50, '3311630037', '2023-01-17 14:46:50', '194.27.103.251', 'ODKS0001'),
(51, '3296344085', '2023-01-17 14:46:51', '194.27.103.251', 'ODKS0001'),
(52, '3302511397', '2023-01-17 14:46:52', '194.27.103.251', 'ODKS0001'),
(53, '3317593637', '2023-01-17 14:46:54', '194.27.103.251', 'ODKS0001'),
(54, '3296344085', '2023-01-17 14:46:57', '194.27.103.251', 'ODKS0001'),
(55, '3311630037', '2023-01-17 14:46:58', '194.27.103.251', 'ODKS0001'),
(56, '1352196679', '2023-01-17 14:47:00', '194.27.103.251', 'ODKS0001'),
(57, '3302511397', '2023-01-17 14:47:02', '194.27.103.251', 'ODKS0001'),
(58, '1352196679', '2023-01-17 14:47:03', '194.27.103.251', 'ODKS0001'),
(59, '3311630037', '2023-01-17 14:47:04', '194.27.103.251', 'ODKS0001'),
(60, '3296344085', '2023-01-17 14:47:05', '194.27.103.251', 'ODKS0001'),
(61, '3311630037', '2023-01-17 14:47:07', '194.27.103.251', 'ODKS0001'),
(62, '1352196679', '2023-01-17 14:47:23', '194.27.103.251', 'ODKS0001'),
(63, '3302511397', '2023-01-17 14:47:31', '194.27.103.251', 'ODKS0001'),
(64, '3311630037', '2023-01-17 14:47:31', '194.27.103.251', 'ODKS0001'),
(65, '3296344085', '2023-01-17 14:47:31', '194.27.103.251', 'ODKS0001'),
(66, '3296344085', '2023-01-17 14:47:31', '194.27.103.251', 'ODKS0001'),
(67, '3311630037', '2023-01-17 14:47:31', '194.27.103.251', 'ODKS0001'),
(68, '3302511397', '2023-01-17 14:47:32', '194.27.103.251', 'ODKS0001'),
(69, '1352196679', '2023-01-17 14:47:33', '194.27.103.251', 'ODKS0001'),
(70, '3317593637', '2023-01-17 14:47:35', '194.27.103.251', 'ODKS0001'),
(71, '1352196679', '2023-01-17 14:47:37', '194.27.103.251', 'ODKS0001'),
(72, '3302511397', '2023-01-17 14:47:38', '194.27.103.251', 'ODKS0001'),
(73, '3311630037', '2023-01-17 14:47:40', '194.27.103.251', 'ODKS0001'),
(74, '3296344085', '2023-01-17 14:47:41', '194.27.103.251', 'ODKS0001'),
(75, '3311630037', '2023-01-17 14:47:51', '194.27.103.251', 'ODKS0001'),
(76, '3296344085', '2023-01-17 14:47:52', '194.27.103.251', 'ODKS0001'),
(77, '3302511397', '2023-01-17 14:47:54', '194.27.103.251', 'ODKS0001'),
(78, '1352196679', '2023-01-17 14:47:54', '194.27.103.251', 'ODKS0001'),
(79, '3311630037', '2023-01-17 14:47:56', '194.27.103.251', 'ODKS0001'),
(80, '3296344085', '2023-01-17 14:47:57', '194.27.103.251', 'ODKS0001'),
(81, '3302511397', '2023-01-17 14:47:58', '194.27.103.251', 'ODKS0001'),
(82, '3311630037', '2023-01-17 14:58:29', '194.27.103.251', 'ODKS0001'),
(83, '1352196679', '2023-01-17 15:09:29', '194.27.103.251', 'ODKS0001'),
(84, '1352196679', '2023-01-17 15:09:33', '194.27.103.251', 'ODKS0001'),
(85, '1352196679', '2023-01-17 15:16:31', '194.27.103.251', 'ODKS0001'),
(86, '1352196679', '2023-01-17 15:16:39', '194.27.103.251', 'ODKS0001');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kisi`
--
ALTER TABLE `kisi`
 ADD PRIMARY KEY (`kisi_id`);

--
-- Tablo için indeksler `kisi_kart`
--
ALTER TABLE `kisi_kart`
 ADD PRIMARY KEY (`kart_id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
 ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `terminaller`
--
ALTER TABLE `terminaller`
 ADD PRIMARY KEY (`terminal_id`);

--
-- Tablo için indeksler `yoklama_log`
--
ALTER TABLE `yoklama_log`
 ADD PRIMARY KEY (`log_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kisi`
--
ALTER TABLE `kisi`
MODIFY `kisi_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Tablo için AUTO_INCREMENT değeri `kisi_kart`
--
ALTER TABLE `kisi_kart`
MODIFY `kart_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `terminaller`
--
ALTER TABLE `terminaller`
MODIFY `terminal_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `yoklama_log`
--
ALTER TABLE `yoklama_log`
MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
