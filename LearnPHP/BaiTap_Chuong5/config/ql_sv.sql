-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
-- Host: localhost:8889
-- Generation Time: Oct 14, 2025 at 02:05 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

 /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
 /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
 /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 /*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------
-- Database: `CSDLSV`
-- --------------------------------------------------------

-- --------------------------------------------------------
-- Table structure for table `ThongTinLop`
-- --------------------------------------------------------

CREATE TABLE `ThongTinLop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TenLop` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CVHT` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Dumping data for table `ThongTinLop`
-- --------------------------------------------------------

INSERT INTO `ThongTinLop` (`id`, `TenLop`, `CVHT`) VALUES
(641, '64.CNTT-1', 'Nguyen Van A'),
(642, '64CNTT-2', 'Pham Thi B'),
(643, '64CNTT-3', 'Can Thi C'),
(644, '64CNTT-4', 'Nguyen Hai D');

-- --------------------------------------------------------
-- Table structure for table `ThongTinSV`
-- --------------------------------------------------------

CREATE TABLE `ThongTinSV` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Ho` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaLop` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `MaLop` (`MaLop`),
  CONSTRAINT `FK_ThongTinLop_SV`
    FOREIGN KEY (`MaLop`)
    REFERENCES `ThongTinLop` (`id`)
    ON UPDATE CASCADE
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Dumping data for table `ThongTinSV`
-- --------------------------------------------------------

INSERT INTO `ThongTinSV` (`id`, `Ho`, `Ten`, `DiaChi`, `MaLop`) VALUES
(1, 'Phạm', 'Tuấn Kiệt', 'Diên Khánh', 641),
(2, 'Huỳnh', 'Minh Bảo', 'Diên Khánh', 642);

COMMIT;

 /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
 /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
 /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
