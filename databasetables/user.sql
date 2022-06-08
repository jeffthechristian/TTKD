-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 02:28 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttkd`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(32) COLLATE utf8_latvian_ci NOT NULL,
  `lastname` varchar(32) COLLATE utf8_latvian_ci NOT NULL,
  `username` varchar(32) COLLATE utf8_latvian_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_latvian_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_latvian_ci NOT NULL,
  `user_color` varchar(10) COLLATE utf8_latvian_ci NOT NULL DEFAULT '#F66B0E'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `user_color`) VALUES
(1, 'Emīls Daivids', 'Kļaviņš', 'admin007', 'daiiviids@gmail.com', 'admin', '#F66B0E'),
(2, 'Markus', 'Laskovskis', 'markusslask', 'markuss@mail.ru', '0192023a7bbd73250516f069df18b500', '#F66B0E'),
(3, 'Sergejs', 'Ozols', 'sozols', 'sergejs@inbox.lv', 'd7e5592c22fb88b8403658240e37730d', '#F66B0E');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
