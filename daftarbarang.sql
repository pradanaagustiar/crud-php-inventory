-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Sep 2023 pada 10.43
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daftarbarang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `databarang`
--

CREATE TABLE `databarang` (
  `ID` int(11) NOT NULL,
  `no_inventaris` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `lokasi_barang` varchar(100) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `kondisi_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `databarang`
--

INSERT INTO `databarang` (`ID`, `no_inventaris`, `nama_barang`, `lokasi_barang`, `jumlah_barang`, `kondisi_barang`) VALUES
(1, '2022060001', 'Meja Kantor', 'Ruang Direktur', 2, 'Baik'),
(2, '2022060002', 'Kursi Kantor', 'Ruang Direktur', 4, 'Baik'),
(3, '2022060003', 'Laptop Lenovo Ideapad', 'Ruang Direktur', 1, 'Baik'),
(4, '2022060004', 'Monitor 21 Inch', 'Ruang Direktur', 1, 'Baik'),
(6, '2022060006', 'Wireless Keyboard', 'Ruang Direktur', 2, 'Baik'),
(8, '2022060007', 'Headphone Shure', 'Ruang Direktur', 1, 'Baik');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `databarang`
--
ALTER TABLE `databarang`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `databarang`
--
ALTER TABLE `databarang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
