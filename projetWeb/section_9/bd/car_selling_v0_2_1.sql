-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 26, 2022 at 05:06 AM
-- Server version: 8.0.29
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_selling_v0_2_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `slug` varchar(191) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `model_id` int DEFAULT NULL,
  `car_brand_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `user_id`, `name`, `slug`, `image`, `created`, `modified`, `model_id`, `car_brand_id`) VALUES
(26, 12, 'wiswis', 'wiswis', '1.png', '2022-11-30 04:14:41', '2022-11-30 04:14:41', 1, 1),
(33, 12, 'Momo', 'Momo', 'gwagon.jpg', '2022-12-01 02:18:29', '2022-12-01 02:18:29', 1, 4002);

-- --------------------------------------------------------

--
-- Table structure for table `cars_brands`
--

CREATE TABLE `cars_brands` (
  `id` int NOT NULL,
  `car_year_id` int NOT NULL,
  `car_color_dispo_id` int NOT NULL,
  `brand_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci COMMENT='car_brand';

--
-- Dumping data for table `cars_brands`
--

INSERT INTO `cars_brands` (`id`, `car_year_id`, `car_color_dispo_id`, `brand_name`) VALUES
(1, 1, 1, 'Toyotta'),
(2, 18, 3, 'Suzuki '),
(4002, 18, 4, 'Bmw'),
(4003, 18, 3, 'Mercedes');

-- --------------------------------------------------------

--
-- Table structure for table `cars_colors_dispo`
--

CREATE TABLE `cars_colors_dispo` (
  `id` int NOT NULL,
  `car_year_id` int NOT NULL,
  `color_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cars_colors_dispo`
--

INSERT INTO `cars_colors_dispo` (`id`, `car_year_id`, `color_name`) VALUES
(1, 1, 'light Blue'),
(2, 4, 'rouge'),
(3, 18, 'noir'),
(4, 18, 'gris'),
(5, 3, 'Blanc');

-- --------------------------------------------------------

--
-- Table structure for table `cars_files`
--

CREATE TABLE `cars_files` (
  `id` int NOT NULL,
  `car_id` int NOT NULL,
  `file_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars_files`
--

INSERT INTO `cars_files` (`id`, `car_id`, `file_id`) VALUES
(1, 26, 4),
(2, 26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cars_specifications`
--

CREATE TABLE `cars_specifications` (
  `car_id` int NOT NULL,
  `specification_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars_year`
--

CREATE TABLE `cars_year` (
  `id` int NOT NULL,
  `annee` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cars_year`
--

INSERT INTO `cars_year` (`id`, `annee`) VALUES
(1, '2001'),
(2, '2002'),
(3, '2003'),
(4, '2004'),
(5, '2005'),
(6, '2006'),
(7, '2007'),
(8, '2008'),
(9, '2009'),
(10, '2010'),
(12, '2012'),
(13, '2013'),
(14, '2014'),
(15, '2015'),
(16, '2016'),
(17, '2017'),
(18, '2018'),
(38, '2019'),
(39, '2021'),
(41, '2022'),
(43, '2021'),
(44, '2023'),
(45, '2023'),
(46, '99'),
(47, '99999'),
(48, '0000');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `created`, `modified`, `status`) VALUES
(1, 'gwagon.jpg', 'cars/', '2022-12-25 03:05:10', '2022-12-25 03:46:49', 1),
(2, 'test.png', 'cars/', '2022-12-25 03:09:30', '2022-12-25 03:09:30', 1),
(4, 'Screenshot_20221216_094143.png', 'cars/', '2022-12-25 03:44:10', '2022-12-25 03:45:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `i18n`
--

CREATE TABLE `i18n` (
  `id` int NOT NULL,
  `locale` varchar(6) NOT NULL,
  `model` varchar(255) NOT NULL,
  `foreign_key` int NOT NULL,
  `field` varchar(255) NOT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(1, 'en_US', 'Cars', 11, 'image', 'from admin');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `price` float NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `name`, `price`, `created`, `modified`) VALUES
(1, 'model es', 5000, '2022-09-29 20:58:27', '2022-11-28 23:10:48');

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `id` int NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `specifications`
--

INSERT INTO `specifications` (`id`, `type`, `created`, `modified`) VALUES
(1, 'Voiture usager\r\n', '2022-09-22 20:55:53', '2022-09-30 20:55:53'),
(2, 'Voiture neuve', '2022-10-01 21:04:31', '2022-10-01 21:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `confirmed` tinyint NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `email`, `confirmed`, `password`, `name`, `created`, `modified`) VALUES
(3, '4bb01fa1-9136-445c-b6c4-9c8c2431c625', 'admin@admin.com', 0, '$2y$10$oVbtwmE15gmKM7Ckw9rOYelH310tRZ5lbxojuD7s6ZoQVY84yrXR6', 'Wisal', '2022-10-03 23:24:38', '2022-10-03 23:24:38'),
(4, '4e90ce18-3d37-4899-8ed4-3ea905a073a8', 'cakephp@gmail.com', 0, '$2y$10$xVSur3Wtbx5W2jDj6Suo..cNU1ES4XSF6IhsE1RrPaIwEj.efbsQK', 'cakephp', '2022-10-03 23:32:08', '2022-10-03 23:32:08'),
(12, '2aaa2961-667f-4f41-9850-e23830f1d8e5', 'ahmadiwisal8@gmail.com', 1, '$2y$10$Go4buTyK9X3hTc1yRGcgHeJit7OVvY8cwKmG78O42pOeKtP2KdoWC', 'Bob', '2022-11-08 18:00:46', '2022-11-08 18:01:41'),
(17, '4b4ad443-5c07-4058-9001-bd188c291778', 'avecjwt@gmail.com', 1, '$2y$10$zfyExRpaQf84IM2v7mJQe.F5l.NAXUGmYx8DhPSIiI0uDhdxWtbEG', 'testavecjwt', '2022-12-21 19:34:37', '2022-12-21 19:34:37'),
(18, 'c8b385ec-0d9e-46a3-a5ec-3c46a990a052', 'wisal.ahmadi345@gmail.com', 0, '$2y$10$guDqiEkhalUAVhouJZx.Eu48djGKqlvf3xYGfRfeV.Gn1K/oRt2Va', 'WisWis', '2022-12-22 21:05:15', '2022-12-22 21:05:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `user_key` (`user_id`),
  ADD KEY `model_key` (`model_id`),
  ADD KEY `date_voiture_id` (`car_brand_id`);

--
-- Indexes for table `cars_brands`
--
ALTER TABLE `cars_brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_year_id` (`car_year_id`),
  ADD KEY `car_color_dispo_id` (`car_color_dispo_id`);

--
-- Indexes for table `cars_colors_dispo`
--
ALTER TABLE `cars_colors_dispo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_year` (`car_year_id`);

--
-- Indexes for table `cars_files`
--
ALTER TABLE `cars_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`car_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Indexes for table `cars_specifications`
--
ALTER TABLE `cars_specifications`
  ADD PRIMARY KEY (`car_id`,`specification_id`),
  ADD KEY `build_key` (`specification_id`),
  ADD KEY `specification_key` (`specification_id`);

--
-- Indexes for table `cars_year`
--
ALTER TABLE `cars_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uuid` (`uuid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `cars_brands`
--
ALTER TABLE `cars_brands`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4004;

--
-- AUTO_INCREMENT for table `cars_colors_dispo`
--
ALTER TABLE `cars_colors_dispo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cars_files`
--
ALTER TABLE `cars_files`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cars_year`
--
ALTER TABLE `cars_year`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cars_ibfk_2` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`),
  ADD CONSTRAINT `cars_ibfk_3` FOREIGN KEY (`car_brand_id`) REFERENCES `cars_brands` (`id`);

--
-- Constraints for table `cars_brands`
--
ALTER TABLE `cars_brands`
  ADD CONSTRAINT `cars_brands_ibfk_1` FOREIGN KEY (`car_year_id`) REFERENCES `cars_year` (`id`),
  ADD CONSTRAINT `cars_brands_ibfk_2` FOREIGN KEY (`car_color_dispo_id`) REFERENCES `cars_colors_dispo` (`id`);

--
-- Constraints for table `cars_colors_dispo`
--
ALTER TABLE `cars_colors_dispo`
  ADD CONSTRAINT `cars_colors_dispo_ibfk_1` FOREIGN KEY (`car_year_id`) REFERENCES `cars_year` (`id`);

--
-- Constraints for table `cars_files`
--
ALTER TABLE `cars_files`
  ADD CONSTRAINT `Cars_files` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Files_cars` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `cars_specifications`
--
ALTER TABLE `cars_specifications`
  ADD CONSTRAINT `cars_specifications_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cars_specifications_ibfk_2` FOREIGN KEY (`specification_id`) REFERENCES `specifications` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
