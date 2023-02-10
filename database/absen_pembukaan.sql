-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Feb 2023 pada 22.01
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wpu_blog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_pembukaan`
--

CREATE TABLE `absen_pembukaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `absen` tinyint(1) NOT NULL,
  `mwcnu_id` bigint(20) UNSIGNED NOT NULL,
  `prnu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `komisi` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absen_pembukaan`
--

INSERT INTO `absen_pembukaan` (`id`, `absen`, `mwcnu_id`, `prnu_id`, `name`, `jabatan`, `komisi`, `photo`) VALUES
(1, 0, 13, NULL, 'H. M. FATHAN S.PD.', 'Ketua', 'Komisi Organisasi', 'photos/cRgAJNvYnvw9vOZF8lHEUKnUmBf7LsU5ytmz73Ct.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen_pembukaan`
--
ALTER TABLE `absen_pembukaan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen_pembukaan`
--
ALTER TABLE `absen_pembukaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=704;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
