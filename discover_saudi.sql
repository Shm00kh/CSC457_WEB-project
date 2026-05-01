-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2026 at 06:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discover_saudi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '08a76a2ec5240c9e3786d7f2ee7d78ec');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `info` text DEFAULT NULL,
  `landmarks` text DEFAULT NULL,
  `hero_image` varchar(255) DEFAULT NULL,
  `gallery_image1` varchar(255) DEFAULT NULL,
  `gallery_image2` varchar(255) DEFAULT NULL,
  `gallery_image3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `category`, `description`, `info`, `landmarks`, `hero_image`, `gallery_image1`, `gallery_image2`, `gallery_image3`) VALUES
(1, 'الرياض', 'central', 'عاصمة المملكة ومركزها السياسي والإداري والاقتصادي.', 'تتميز المنطقة بنمو عمراني كبير وتحتضن العديد من المراكز الثقافية.', 'برج المملكة، قصر المصمك، المتحف الوطني', 'images/regions/الرياض.jpg', 'images/Riyadh/R1.jpg', 'images/Riyadh/R2.jpg', 'images/Riyadh/R3.jpg'),
(2, 'مكة المكرمة', 'western', 'منطقة ذات مكانة دينية عظيمة وتضم مكة وجدة والطائف.', 'تتميز بمكانتها الدينية والتاريخية العظيمة.', 'المسجد الحرام، جدة التاريخية، الطائف', 'images/regions/مكة .jpg', 'images/Makkah/M1.jpg', 'images/Makkah/M2.jpg', 'images/Makkah/M3.jpg'),
(3, 'المدينة المنورة', 'western', 'منطقة تاريخية ودينية مهمة وتضم المسجد النبوي الشريف.', 'ارتبطت بتاريخ إسلامي عظيم وتعد مقصداً مهماً للزوار.', 'المسجد النبوي، جبل أحد، قباء', 'images/regions/المدينة.jpg', 'images/Madinah/M1.jpg', 'images/Madinah/M2.jpg', 'images/Madinah/M3.jpg'),
(4, 'المنطقة الشرقية', 'eastern', 'منطقة اقتصادية مهمة وتطل على الخليج العربي.', 'تضم عدداً من المدن المهمة وتعد مركزاً اقتصادياً بارزاً.', 'الدمام، الخبر، الأحساء', 'images/regions/الشرقية.jpg', 'images/Sharqiyah/S1.jpg', 'images/Sharqiyah/S2.jpg', 'images/Sharqiyah/S3.jpg'),
(5, 'عسير', 'southern', 'منطقة جبلية جميلة تشتهر بأجوائها المعتدلة وطبيعتها.', 'تعد من أبرز المناطق السياحية في المملكة.', 'أبها، رجال ألمع، السودة', 'images/regions/عسير.jpg', 'images/Asir/A1.jpg', 'images/Asir/A2.jpg', 'images/Asir/A3.jpg'),
(6, 'حائل', 'northern', 'منطقة معروفة بتاريخها وتراثها وموقعها الجغرافي.', 'ارتبطت المنطقة بعدد من الجوانب التاريخية والتراثية المهمة.', 'مدينة حائل، جبل أجا، جبل سلمى', 'images/regions/حائل.jpg', 'images/Hail/H1.jpg', 'images/Hail/H2.jpg', 'images/Hail/H3.jpg'),
(7, 'جازان', 'southern', 'منطقة ساحلية جميلة تشتهر بالطبيعة والتنوع البيئي.', 'تعد من المناطق الحيوية في جنوب المملكة.', 'جازان، فرسان، فيفاء', 'images/regions/جازان.jpg', 'images/Jazan/J1.jpg', 'images/Jazan/J2.jpg', 'images/Jazan/J3.jpg'),
(8, 'القصيم', 'central', 'تشتهر بالنشاط الزراعي والأسواق الشعبية والتراث المحلي.', 'تعد من المناطق المهمة في وسط المملكة.', 'بريدة، عنيزة، الأسواق الشعبية', 'images/regions/القصيم.jpg', 'images/Qassim/Q1.jpg', 'images/Qassim/Q2.jpg', 'images/Qassim/Q3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
