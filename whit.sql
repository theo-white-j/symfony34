-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 04, 2018 at 04:51 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.2.4-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `whitetheo`
--

-- --------------------------------------------------------

--
-- Table structure for table `galerie`
--

CREATE TABLE `galerie` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `creationdate` datetime NOT NULL,
  `editiondate` datetime NOT NULL,
  `descr` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `galerie`
--

INSERT INTO `galerie` (`id`, `owner_id`, `name`, `slug`, `creationdate`, `editiondate`, `descr`) VALUES
(7, 3, 'test 3', 'test-3', '2018-04-24 16:56:06', '2018-04-24 16:56:06', '1231'),
(8, 3, 'test4', 'test4', '2018-04-24 19:56:06', '2018-04-24 19:56:06', '212'),
(11, 4, '12341234 test edit3', '12341234-test-edit3', '2018-04-30 15:08:12', '2018-05-01 16:12:29', '123444 1234 image add et sup3'),
(12, 3, 'Test not multiple', 'test-not-multiple', '2018-05-01 09:44:55', '2018-05-01 09:44:55', 'devrait lever une erreur'),
(13, 3, 'asdimage', 'asdimage', '2018-05-01 16:19:52', '2018-05-01 16:19:52', 'image?'),
(14, 3, 'another image', 'another-image', '2018-05-01 16:50:44', '2018-05-01 16:50:44', 'ass ass'),
(15, 3, 'add', 'add', '2018-05-01 16:57:03', '2018-05-01 16:57:03', 'add last');

-- --------------------------------------------------------

--
-- Table structure for table `galerie_element`
--

CREATE TABLE `galerie_element` (
  `id` int(11) NOT NULL,
  `galerie_id` int(11) NOT NULL,
  `info` longtext COLLATE utf8_unicode_ci,
  `alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creationdate` datetime NOT NULL,
  `editiondate` datetime NOT NULL,
  `ispublished` tinyint(1) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extension` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galerie_item`
--

CREATE TABLE `galerie_item` (
  `id` int(11) NOT NULL,
  `galerie_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info` longtext COLLATE utf8_unicode_ci,
  `alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creationdate` datetime NOT NULL,
  `editiondate` datetime NOT NULL,
  `ispublished` tinyint(1) NOT NULL,
  `extention` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `galerie_item`
--

INSERT INTO `galerie_item` (`id`, `galerie_id`, `name`, `info`, `alt`, `type`, `url`, `path`, `creationdate`, `editiondate`, `ispublished`, `extention`) VALUES
(5, 11, '1234 j ai editer', '123444 modif', '9kA5.gif', '0', NULL, '12341234555', '2018-04-30 15:08:12', '2018-05-01 16:12:29', 1, 'gif'),
(6, 13, NULL, NULL, 'seo-friendly-url.jpg', '1', NULL, NULL, '2018-05-01 16:19:52', '2018-05-01 16:19:52', 1, 'jpeg'),
(7, 14, 'jpeg', NULL, 'code-blurry-1000x605.jpg', '1', NULL, NULL, '2018-05-01 16:50:44', '2018-05-01 16:50:44', 1, 'jpeg'),
(8, 15, NULL, NULL, 'code.jpg', '1', NULL, NULL, '2018-05-01 16:57:03', '2018-05-01 17:03:21', 1, 'jpeg'),
(9, 15, NULL, NULL, '9kA5.gif', '2', NULL, NULL, '2018-05-01 17:03:21', '2018-05-01 17:03:21', 1, 'gif');

-- --------------------------------------------------------

--
-- Table structure for table `wt_user`
--

CREATE TABLE `wt_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wt_user`
--

INSERT INTO `wt_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(3, 'admin', 'admin', 'admin@admin.com', 'admin@admin.com', 1, 'cPSPDvgjyeaixEsVbh4YvjVd/2DZQbwgIjlS32sonhI', 'FU8nuFqMtcEN2J5iJmWhD/R9zBdwx3L3rDaGgTQBy8CG0CAK4KzehodBK6JZ/fUqm2Dev/3Z4D1xANOW4iW9eA==', NULL, NULL, NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}'),
(4, 'User', 'user', 'user@User.com', 'user@user.com', 1, 'fMDzdKtVMdf8r7TD.pWTJaQH/Nz9FxrtDWk1dHPimtc', 'npgvKW4qyT27wRWWcpqWEBj0fkZvFA+x1YnAKhpWYPRCOV2rPPKPIuKHUFlzDbY1QuXfHXIEzeHFSmqJdG/NbQ==', NULL, NULL, NULL, 'a:0:{}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galerie`
--
ALTER TABLE `galerie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_9E7D1590989D9B62` (`slug`),
  ADD UNIQUE KEY `UNIQ_9E7D15905E237E06` (`name`),
  ADD KEY `IDX_9E7D15907E3C61F9` (`owner_id`);

--
-- Indexes for table `galerie_element`
--
ALTER TABLE `galerie_element`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F6E43FB2825396CB` (`galerie_id`);

--
-- Indexes for table `galerie_item`
--
ALTER TABLE `galerie_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4714892F825396CB` (`galerie_id`);

--
-- Indexes for table `wt_user`
--
ALTER TABLE `wt_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_32842F4392FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_32842F43A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_32842F43C05FB297` (`confirmation_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galerie`
--
ALTER TABLE `galerie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `galerie_element`
--
ALTER TABLE `galerie_element`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galerie_item`
--
ALTER TABLE `galerie_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wt_user`
--
ALTER TABLE `wt_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `galerie`
--
ALTER TABLE `galerie`
  ADD CONSTRAINT `FK_9E7D15907E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `wt_user` (`id`);

--
-- Constraints for table `galerie_element`
--
ALTER TABLE `galerie_element`
  ADD CONSTRAINT `FK_F6E43FB2825396CB` FOREIGN KEY (`galerie_id`) REFERENCES `galerie` (`id`);

--
-- Constraints for table `galerie_item`
--
ALTER TABLE `galerie_item`
  ADD CONSTRAINT `FK_4714892F825396CB` FOREIGN KEY (`galerie_id`) REFERENCES `galerie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
