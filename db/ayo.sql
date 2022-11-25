-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 11:13 AM
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
-- Database: `ayo`
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
  `bukti3` varchar(128) NOT NULL,
  `bukti4` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datakecelakaan`
--

INSERT INTO `datakecelakaan` (`id`, `namapendata`, `kode`, `jeniskecelakaan`, `tanggal`, `korban`, `ket_korban`, `nama`, `namasaksi`, `detail`, `alamat`, `bukti1`, `bukti2`, `bukti3`, `bukti4`) VALUES
(1, 'Jamalul', 'sudirmantunggal1', 'Tunggal', '2022-06-06', 3, '3 luka berat', 'usa', 'ina', 'rem blong', 'jl.sudirman', 'flowchart_rle_mae.png', 'grafik1.PNG', 'hasil.PNG', 'image1.jpg'),
(4, 'Juned', '123', 'Beruntun', '2022-05-04', 4, '4 meninggal', 'asnawi', 'nada', 'tabrakan', 'aruji', 'R2.png', 'image12.jpg', 'OIP.jpg', 'tabel4.PNG'),
(5, 'Joni', '1231', 'Tunggal', '2022-07-02', 2, 'sda', 'usa', 'ina', 'rem', 'wqeqw', 'flowchart_rle_mae2.png', 'grafik3.PNG', 'hasil2.PNG', 'jadwal1.PNG'),
(6, 'monica cindy', 'hallo', 'Tunggal', '2022-07-01', 2, '3 luka berat', 'asdas', 'asik', 'rem', 'qwe', 'jadwal2.PNG', 'image11.jpg', 'R.png', 'tabel.PNG'),
(7, 'monica cindy', 'sudirmantunggal211', 'Beruntun', '2022-07-02', 3, '3 luka berat', 'usa', 'ina', 'rem', 'jl.sudirman', 'flowchart_rle_mae3.png', 'grafik4.PNG', 'tabel1.PNG', 'R1.png'),
(8, 'momo cindy', 'mmm', 'Tunggal', '2022-07-01', 4, '123sda', 'asdas', 'nadin', 'rem blong', 'qweq', 'tabel2.PNG', 'hasil3.PNG', 'grafik5.PNG', 'tabel3.PNG'),
(9, 'monica cindy', '1231', 'Beruntun', '2022-07-05', 2, 'sda', 'usa', 'nadin', 'hbshbshb', 'sudirman', 'Screenshot_(26).png', 'R3.png', 'OIP1.jpg', 'jadwal3.PNG'),
(11, 'momo cindy', 'sudirmantunggal2111', 'Beruntun', '2022-07-13', 2, 'sda', 'usa', 'qwe', 'rem blong', 'jl.sudirman 211', 'CamScanner_05-17-2022_05_37_11.jpg', 'CamScanner_05-17-2022_05_37_21.jpg', 'CamScanner_05-17-2022_05_37_31.jpg', 'CamScanner_05-17-2022_05_37_41.jpg'),
(13, 'monica cindy', '01', 'Tunggal', '2022-07-18', 2, 'ks', 'dks', 'dmns', 'dm.s', ',mds', 'flowchart_rle_mae6.png', 'grafik8.PNG', 'image13.jpg', 'R4.png'),
(14, 'monica cindy', 'sudirmantunggal211', 'Tunggal', '2022-07-18', 2, 'mwdn', 'nd`', 'sdn', 'nds', 'nsd', 'flowchart_rle_mae7.png', 'grafik9.PNG', 'hasil4.PNG', 'image14.jpg'),
(15, 'monicaaaa', 'mmmooo', 'Beruntun', '2022-07-12', 12, 'ada1', 'aku', 'aku', 'aku', 'aku', 'flowchart_rle_mae8.png', 'grafik11.PNG', 'hasil6.PNG', 'image16.jpg');

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
  `date_created` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `date_created`) VALUES
(3, 'momo cindy', 'momo@gmail.com', '1656407009355.jpg', '$2y$10$RwJ0OIEXnLLQEO7lyoi2GOxxglR/CFpEL.8mPAFQIxgkyL8TtT9bC', 2, '1655984254'),
(5, 'monica cindy', 'monica@gmail.com', '16407967599461.jpg', '$2y$10$E3DwHLrPfLjNbjL.F7l1luyit6B.hSShyMwZKEsNPu8b0SnU6IQCC', 1, '1656047103'),
(22, 'monica ahha', 'mo12@gmail.com', 'image12.jpg', '$2y$10$U/31cXhIg1Vg.6B9ZhqJYebeMSvded6QEZdX/nVEdQt9AUDv2Juma', 2, '1657263765'),
(26, 'aku', 'aku1@gmail.com', 'default.jpg', '$2y$10$11499nHLcviRkdW9BswyaeyO8BRCTZc1d9Bfx3wDgyPO5FQWzzfMW', 2, '1657347059'),
(27, 'abah', 'abah@gmail.com', 'grafik2.PNG', '$2y$10$3zT4mpj2rrf0BbbIZy3cjuVbCg1KFZDp0st2C8Wt3J.npkaEKIJgy', 1, '1658117324'),
(28, 'mo1', 'mo1@gmail.com', 'flowchart_rle_mae2.png', '$2y$10$qTryQ07r6kjeRuWR/EftH.Yn9nXXbs7I.99U0leqfpQHMM/IwrKnC', 2, '1658117577'),
(29, 'ema', 'ema@gmail.com', 'grafik3.PNG', '$2y$10$47NjeoyNmjONY8b99bs8weQ43cEbAHeb.VkHksXXnxAiqG2GlwT0q', 1, '1658119478');

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
(7, 1, 6),
(8, 1, 3),
(9, 1, 5);

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
(6, 'Profile');

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
(2, 'Member'),
(5, 'User');

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
(6, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie'),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key'),
(9, 3, 'Data Kecelakaan', 'data', 'fas fa-fw fa-inbox'),
(10, 2, 'Tambah Data Kecelakaan', 'user/tambahdatakecelakaan', 'fas fa-fw fa-database'),
(11, 3, 'Data User', 'data/user', 'fas fa-fw fa-users'),
(12, 5, 'Menu Management', 'menu', 'fas fa-fw fa-folder'),
(13, 5, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open'),
(14, 6, 'My Profile', 'profile', 'fas fa-fw fa-user'),
(15, 6, 'Edit Profile', 'profile/edit', 'fas fa-fw fa-user-edit'),
(16, 6, 'Change Password', 'profile/changepassword', 'fas fa-fw fa-key');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
