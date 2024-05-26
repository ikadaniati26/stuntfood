-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Bulan Mei 2024 pada 05.26
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_stunting`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_makanan`
--

CREATE TABLE `data_makanan` (
  `idData_makanan` int(11) NOT NULL,
  `paket` varchar(45) NOT NULL,
  `waktu_makan` varchar(15) NOT NULL,
  `menu` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_makanan`
--

INSERT INTO `data_makanan` (`idData_makanan`, `paket`, `waktu_makan`, `menu`) VALUES
(1, 'A', 'makan pagi', 'tumis bayam'),
(2, 'A', 'makan malam', 'tumis buncis'),
(3, 'A', 'makan siang', 'sayur sop'),
(4, 'B', 'makan pagi', 'cah sawi'),
(7, 'B', 'makan siang', 'tumis pakcoy'),
(8, 'B', 'makan malam', 'oseng buncis capar'),
(10, 'A', 'selingan pagi', 'susu'),
(11, 'A', 'selingan sore', 'biskuit'),
(12, 'B', 'selingan pagi', 'lumpia'),
(13, 'B', 'selingan sore', 'pisang goreng');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `selingan`
--

CREATE TABLE `selingan` (
  `id` int(11) NOT NULL,
  `nama_selingan` varchar(20) NOT NULL,
  `protein` varchar(10) NOT NULL,
  `karbohidrat` varchar(10) NOT NULL,
  `lemak` varchar(10) NOT NULL,
  `energi` varchar(10) NOT NULL,
  `Data_makanan_idData_makanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `selingan`
--

INSERT INTO `selingan` (`id`, `nama_selingan`, `protein`, `karbohidrat`, `lemak`, `energi`, `Data_makanan_idData_makanan`) VALUES
(3, 'lumpia', '1.5', '3.3', '2.5', '2.3', 12),
(4, 'pisang goreng', '1.2', '3.1', '2.6', '2.1', 13),
(5, 'susu', '2.9', '3.3', '2.5', '2.3', 10),
(6, 'biskuit', '1.1', '3.2', '3.3', '5.5', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL,
  `nama_makanan` varchar(30) DEFAULT NULL,
  `jenis_makanan` enum('makananpokok','lauk','sayur','buah') NOT NULL,
  `protein` varchar(10) NOT NULL,
  `karbohidrat` varchar(10) NOT NULL,
  `lemak` varchar(10) NOT NULL,
  `energi` varchar(10) NOT NULL,
  `Data_makanan_idData_makanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `nama_makanan`, `jenis_makanan`, `protein`, `karbohidrat`, `lemak`, `energi`, `Data_makanan_idData_makanan`) VALUES
(1, 'nasi', 'makananpokok', '1.2', '2.2', '2.2', '2.1', 1),
(2, 'tempe', 'lauk', '2.4', '4.4', '3.3', '3.1', 1),
(3, 'tumis bayam', 'sayur', '1.1', '1.2', '1.3', '1.4', 1),
(4, 'pepaya', 'buah', '2.2', '2.3', '2.4', '2.9', 1),
(5, 'nasi', 'makananpokok', '3.3', '3.3', '4.4', '5.3', 2),
(6, 'telur dadar', 'lauk', '3.4', '4.4', '4.4', '5.5', 2),
(7, 'tumis buncis', 'sayur', '4.4', '6.6', '7.7', '4.5', 2),
(8, 'pisang', 'buah', '3.5', '5.5', '5.6', '6.7', 2),
(9, 'nasi', 'makananpokok', '3.4', '4.4', '4.2', '4.2', 3),
(10, 'sayur sop', 'sayur', '3.3', '3.2', '3.5', '5.5', 3),
(11, 'pindang', 'lauk', '4.4', '6.6', '1.3', '4.5', 3),
(12, 'buah naga', 'buah', '3.5', '1.2', '1.3', '1.4', 3),
(13, 'nasi merah', 'makananpokok', '4.4', '5.5', '4.4', '5.5', 4),
(14, 'tahu goreng', 'lauk', '1.1', '2.2', '3.3', '4.4', 4),
(15, 'cah sawi', 'sayur', '4.4', '7.4', '1.3', '4.5', 4),
(16, 'anggur', 'buah', '1.1', '1.2', '1.3', '1.4', 4),
(21, 'nasi', 'makananpokok', '1.2', '3.3', '2.5', '2.3', 7),
(22, 'telur dadar', 'lauk', '2.4', '3.2', '3.3', '5.5', 7),
(23, 'telur dadar', 'sayur', '4.4', '6.6', '1.3', '4.5', 7),
(24, 'semangka', 'buah', '1.1', '1.2', '5.6', '1.4', 7),
(25, 'nasi', 'makananpokok', '1.2', '3.3', '2.5', '2.3', 8),
(26, 'tempe menjes', 'lauk', '2.4', '3.2', '3.5', '5.5', 8),
(27, 'tumis pakcoy', 'sayur', '4.4', '6.6', '1.3', '1.1', 8),
(28, 'apel', 'buah', '1.1', '1.2', '1.3', '1.4', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_makanan`
--
ALTER TABLE `data_makanan`
  ADD PRIMARY KEY (`idData_makanan`),
  ADD UNIQUE KEY `idData_makanan_UNIQUE` (`idData_makanan`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `selingan`
--
ALTER TABLE `selingan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_selingan_Data_makanan` (`Data_makanan_idData_makanan`);

--
-- Indeks untuk tabel `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_sub_menu_Data_makanan1` (`Data_makanan_idData_makanan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_makanan`
--
ALTER TABLE `data_makanan`
  MODIFY `idData_makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `selingan`
--
ALTER TABLE `selingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `selingan`
--
ALTER TABLE `selingan`
  ADD CONSTRAINT `fk_selingan_Data_makanan` FOREIGN KEY (`Data_makanan_idData_makanan`) REFERENCES `data_makanan` (`idData_makanan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD CONSTRAINT `fk_sub_menu_Data_makanan1` FOREIGN KEY (`Data_makanan_idData_makanan`) REFERENCES `data_makanan` (`idData_makanan`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
