-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Jun 2025 pada 06.22
-- Versi server: 8.4.3
-- Versi PHP: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemrograman_web_contoh`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `ID` int NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `Penulis` varchar(255) NOT NULL,
  `Tahun_Terbit` int NOT NULL,
  `Harga` decimal(10,2) NOT NULL,
  `Stok` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`ID`, `Judul`, `Penulis`, `Tahun_Terbit`, `Harga`, `Stok`) VALUES
(2, 'Pembayaran P2P tanpa kepercayaan', 'Satoshi Nakamoto', 2008, 1000.00, 2),
(3, 'Ketika kamu, Cantik Pintar dan IPK Cumlaude', 'Bizantium Prihandani\'s', 2025, 15000.00, 0),
(5, 'Cinta tak harus memilki, tetapi akan sakit seumur hidup', 'Guns Anggara', 2010, 10000.00, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_terhapus`
--

CREATE TABLE `buku_terhapus` (
  `ID` int NOT NULL,
  `Judul` varchar(255) DEFAULT NULL,
  `Tanggal_Hapus` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `buku_terhapus`
--

INSERT INTO `buku_terhapus` (`ID`, `Judul`, `Tanggal_Hapus`) VALUES
(1, 'bulan', '2025-06-03 03:41:59'),
(2, 'Cinta tak harus memilki, tetapi akan sakit seumur hidup', '2025-06-03 03:57:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `Pesanan_ID` int NOT NULL,
  `Buku_ID` int NOT NULL,
  `Kuantitas` int NOT NULL,
  `Harga_Per_Satuan` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_hapus`
--

CREATE TABLE `log_hapus` (
  `ID` int DEFAULT NULL,
  `Judul` varchar(255) DEFAULT NULL,
  `Tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ID` int NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`ID`, `Nama`, `Alamat`, `Email`, `Telepon`) VALUES
(1, 'Nabilah', 'Pamulang, Banten', 'nabilah@email.com', '081234567890');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `ID` int NOT NULL,
  `Tanggal_Pesanan` date NOT NULL,
  `Pelanggan_ID` int NOT NULL,
  `Total_Harga` decimal(10,2) NOT NULL,
  `Status` enum('pending','completed') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `buku_terhapus`
--
ALTER TABLE `buku_terhapus`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`Pesanan_ID`,`Buku_ID`),
  ADD KEY `Buku_ID` (`Buku_ID`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Pelanggan_ID` (`Pelanggan_ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `buku_terhapus`
--
ALTER TABLE `buku_terhapus`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`Pesanan_ID`) REFERENCES `pesanan` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`Buku_ID`) REFERENCES `buku` (`ID`);

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`Pelanggan_ID`) REFERENCES `pelanggan` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
