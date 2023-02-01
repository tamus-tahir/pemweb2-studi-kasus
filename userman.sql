-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 06:30 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userman`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-11-19-083355', 'App\\Database\\Migrations\\Config', 'default', 'App', 1674106180, 1),
(2, '2022-12-01-045904', 'App\\Database\\Migrations\\Navigasi', 'default', 'App', 1674106180, 1),
(3, '2022-12-07-081528', 'App\\Database\\Migrations\\Profil', 'default', 'App', 1674106180, 1),
(4, '2022-12-07-090635', 'App\\Database\\Migrations\\Akses', 'default', 'App', 1674106180, 1),
(5, '2022-12-11-180717', 'App\\Database\\Migrations\\User', 'default', 'App', 1674106180, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_akses`
--

CREATE TABLE `tabel_akses` (
  `id_akses` int(5) UNSIGNED NOT NULL,
  `id_profil` int(11) NOT NULL,
  `id_navigasi` int(11) NOT NULL,
  `akses_created_at` datetime DEFAULT NULL,
  `akses_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tabel_akses`
--

INSERT INTO `tabel_akses` (`id_akses`, `id_profil`, `id_navigasi`, `akses_created_at`, `akses_updated_at`) VALUES
(1, 1, 1, '2023-01-18 23:29:55', '2023-01-18 23:29:55'),
(2, 1, 2, '2023-01-18 23:29:55', '2023-01-18 23:29:55'),
(3, 1, 3, '2023-01-18 23:29:55', '2023-01-18 23:29:55'),
(4, 1, 4, '2023-01-18 23:29:55', '2023-01-18 23:29:55'),
(5, 1, 5, '2023-01-18 23:29:55', '2023-01-18 23:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_config`
--

CREATE TABLE `tabel_config` (
  `id_config` int(5) UNSIGNED NOT NULL,
  `appname` varchar(50) NOT NULL,
  `copyright` varchar(128) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `author` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `config_created_at` datetime DEFAULT NULL,
  `config_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tabel_config`
--

INSERT INTO `tabel_config` (`id_config`, `appname`, `copyright`, `logo`, `keywords`, `author`, `description`, `config_created_at`, `config_updated_at`) VALUES
(1, 'UserManager', '@ 2022 || Tamus D Tahir', 'logo.png', 'CI4, BS5', 'Tamus D Tahir', 'Aplikasi ini merupakan template user manager', '2023-01-18 23:29:55', '2023-01-18 23:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_navigasi`
--

CREATE TABLE `tabel_navigasi` (
  `id_navigasi` int(5) UNSIGNED NOT NULL,
  `navigasi` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `urutan` int(11) NOT NULL,
  `aktif` varchar(3) NOT NULL,
  `navigasi_created_at` datetime DEFAULT NULL,
  `navigasi_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tabel_navigasi`
--

INSERT INTO `tabel_navigasi` (`id_navigasi`, `navigasi`, `url`, `icon`, `urutan`, `aktif`, `navigasi_created_at`, `navigasi_updated_at`) VALUES
(1, 'Dashboard', 'dashboard', 'bi bi-grid', 1, 'Yes', '2023-01-18 23:29:55', '2023-01-18 23:29:55'),
(2, 'Config', 'config', 'bi bi-gear', 2, 'Yes', '2023-01-18 23:29:55', '2023-01-18 23:29:55'),
(3, 'Navigasi', 'navigasi', 'bi bi-sign-turn-right', 3, 'Yes', '2023-01-18 23:29:55', '2023-01-18 23:29:55'),
(4, 'Profil', 'profil', 'bi bi-person', 4, 'Yes', '2023-01-18 23:29:55', '2023-01-18 23:29:55'),
(5, 'User', 'user', 'bi bi-people', 5, 'Yes', '2023-01-18 23:29:55', '2023-01-18 23:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_profil`
--

CREATE TABLE `tabel_profil` (
  `id_profil` int(5) UNSIGNED NOT NULL,
  `profil` varchar(50) NOT NULL,
  `profil_created_at` datetime DEFAULT NULL,
  `profil_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tabel_profil`
--

INSERT INTO `tabel_profil` (`id_profil`, `profil`, `profil_created_at`, `profil_updated_at`) VALUES
(1, 'Superadmin', '2023-01-18 23:29:55', '2023-01-18 23:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int(5) UNSIGNED NOT NULL,
  `id_profil` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `telpon` varchar(50) DEFAULT NULL,
  `aktif` int(1) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `user_created_at` datetime DEFAULT NULL,
  `user_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `id_profil`, `username`, `password`, `nama`, `telpon`, `aktif`, `foto`, `user_created_at`, `user_updated_at`) VALUES
(1, 1, 'superadmin', '$2y$10$oqSqdsaR1BzAP9wOV02CmukY3/a0GhE00M43WxMZnZPsE46TaIB4.', 'Tamus Tahir', '0811-8888-888', 1, 'superadmin.jpg', '2023-01-18 23:29:55', '2023-01-18 23:29:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_akses`
--
ALTER TABLE `tabel_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `tabel_config`
--
ALTER TABLE `tabel_config`
  ADD PRIMARY KEY (`id_config`);

--
-- Indexes for table `tabel_navigasi`
--
ALTER TABLE `tabel_navigasi`
  ADD PRIMARY KEY (`id_navigasi`);

--
-- Indexes for table `tabel_profil`
--
ALTER TABLE `tabel_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_akses`
--
ALTER TABLE `tabel_akses`
  MODIFY `id_akses` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_config`
--
ALTER TABLE `tabel_config`
  MODIFY `id_config` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_navigasi`
--
ALTER TABLE `tabel_navigasi`
  MODIFY `id_navigasi` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_profil`
--
ALTER TABLE `tabel_profil`
  MODIFY `id_profil` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
