-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Bulan Mei 2024 pada 05.20
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

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
  `waktu_makan` enum('makanpagi','makansiang','makanmalam','selinganpagi','selingansore') NOT NULL,
  `nama_makanan` varchar(45) NOT NULL,
  `protein` varchar(10) NOT NULL,
  `karbohidrat` varchar(10) NOT NULL,
  `lemak` varchar(10) NOT NULL,
  `energi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_makanan`
--

INSERT INTO `data_makanan` (`idData_makanan`, `paket`, `waktu_makan`, `nama_makanan`, `protein`, `karbohidrat`, `lemak`, `energi`) VALUES
(1, 'a', '', 'ayam', '2', '2', '2', '2'),
(2, 'b', '', 'telur', '1', '1', '1', '1'),
(3, 'a', '', 't', '2', '2', '2', '2'),
(4, 'e', '', 'g', '5', '5', '5', '5'),
(5, 'A', 'makanpagi', 'nasi', '12', '12', '12', '12');

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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_makanan`
--
ALTER TABLE `data_makanan`
  MODIFY `idData_makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
