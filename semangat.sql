-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2022 at 04:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `semangat`
--

-- --------------------------------------------------------

--
-- Table structure for table `datakecelakaan`
--

CREATE TABLE `datakecelakaan` (
  `id` int(11) NOT NULL,
  `namapendata` varchar(128) NOT NULL,
  `kode` varchar(128) NOT NULL,
  `jeniskecelakaan` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `korban` int(128) NOT NULL,
  `ket_korban` varchar(256) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `namasaksi` varchar(128) NOT NULL,
  `detail` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `bukti1` varchar(128) NOT NULL,
  `bukti2` varchar(128) NOT NULL,
  `bukti3` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datakecelakaan`
--

INSERT INTO `datakecelakaan` (`id`, `namapendata`, `kode`, `jeniskecelakaan`, `tanggal`, `korban`, `ket_korban`, `nama`, `namasaksi`, `detail`, `alamat`, `bukti1`, `bukti2`, `bukti3`) VALUES
(1, 'Jamalul', 'sudirmantunggal1', 'Tunggal', '2022-06-06', 3, '3 luka berat', 'usa, adi, ihan', 'ina', 'rem blong', 'jl.sudirman', 'flowchart_rle_mae.png', 'grafik1.PNG', 'hasil.PNG'),
(21, 'monica cindy', '1231', 'Tunggal', '2022-08-03', 1, '1 luka berat', 'usai', 'inaaaa', 'rem', 'sudirman', 'image1.jpg', 'OIP.jpg', 'jadwal.PNG'),
(22, 'momo cindy', '1231', 'Tunggal', '2022-09-08', 2, '3 luka berat', 'usa', 'qweq', 'qweq', 'sudirman', 'flowchart_rle_mae1.png', 'tabel.PNG', 'OIP1.jpg'),
(23, 'monica cindy', '1231', 'Tunggal', '2022-09-14', 3, '3 luka berat', 'usa', 'nadin', 'rem blong', 'jl.sudirman 211', 'e0b828ae-59ab-450a-b1cb-5aa7e0d6a526.png', '2769339.png', 'OIP.png');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `date_created`) VALUES
(3, 'momo cindy', 'momo@gmail.com', '', '$2y$10$RwJ0OIEXnLLQEO7lyoi2GOxxglR/CFpEL.8mPAFQIxgkyL8TtT9bC', 2, '24 June 2022'),
(37, 'monica cindy', 'monicacindy@gmail.com', '', '$2y$10$k7Gbhbyc2/3gKiBhCMJuU.L.vGZm7u359jFGeZjNnXn4hjnK5NMIG', 1, '04 August 2022'),
(38, 'abah', 'abah@gmail.com', '', '$2y$10$zaPAq1ggHE1RMIVna0ozXeo9dtXSGRq.sokKAYu/WAF/qKJFgYvKG', 1, '19 August 2022');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(8, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Data'),
(5, 'Menu'),
(6, 'Profile'),
(8, 'Laporan');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt'),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user'),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit'),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key'),
(9, 3, 'Data Laporan Kecelakaan', 'data', 'fas fa-fw fa-inbox'),
(10, 2, 'Data Kecelakaan', 'user/tambahdatakecelakaan', 'fas fa-fw fa-database'),
(11, 3, 'Data User', 'data/user', 'fas fa-fw fa-users'),
(12, 5, 'Menu Management', 'menu', 'fas fa-fw fa-folder'),
(13, 5, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open'),
(14, 6, 'My Profile', 'profile', 'fas fa-fw fa-user'),
(15, 6, 'Edit Profile', 'profile/edit', 'fas fa-fw fa-user-edit'),
(16, 6, 'Change Password', 'profile/changepassword', 'fas fa-fw fa-key'),
(17, 8, 'Laporan', 'ayo', 'fas fa-fw fa-file');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datakecelakaan`
--
ALTER TABLE `datakecelakaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datakecelakaan`
--
ALTER TABLE `datakecelakaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
