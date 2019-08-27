-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Agu 2019 pada 04.47
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `nik` int(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`nik`, `password`) VALUES
(1, '$2y$10$eKFszDYZcm/I0P5lR5A4a.XfyBI3HyNa.ztbcy1K419.qmbQULhFy'),
(2, '$2y$10$RpfeR2u9dMwjq/HzYIk/J.2seQ1OASsmC/ko3PzsRoM79UC14qKg2'),
(3, '$2y$10$cc0NWNiMvEt8nxtDYXAfIetBxxeRa8fIdNSAXN3B9m7mQkfH8sPha'),
(21, '$2y$10$Dv.KyVhPaMEQFPFedkp5ZuRR7qVhGvjaopP51yDLvl3ckpiZcXL8i'),
(100, '$2y$10$qrvzLXb.UYg8zPjEwXj2ketvGM/Z1vR6CycJiEf1rWHH4UIY0uEMu'),
(10000, '$2y$10$A3sqH4e9Yjhzi9CIbeOIr.TGF6VuC0rD7HkoZ3ad41PNGUA5q9YK2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapping_pengguna`
--

CREATE TABLE `mapping_pengguna` (
  `nik` int(16) NOT NULL,
  `id_posisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapping_pengguna`
--

INSERT INTO `mapping_pengguna` (`nik`, `id_posisi`) VALUES
(1, 2),
(2, 3),
(3, 4),
(21, 1),
(100, 1),
(10000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `nik` int(16) NOT NULL,
  `name` varchar(40) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` enum('Approved','Unapproved','Baru','') NOT NULL DEFAULT 'Baru',
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`nik`, `name`, `ttl`, `alamat`, `provinsi`, `email`, `status`, `waktu`) VALUES
(1, 'admin', '2910-10-29', 'kp.dkasldk', 'Bali', 'admin@gmail.com', 'Approved', '2019-07-16 04:21:54'),
(2, 'ketua', '1921-02-09', 'kp. dkjs', 'Jakarta', 'ketua@gmail.com', 'Approved', '2019-07-10 04:21:54'),
(3, 'sekretaris', '2001-07-21', 'ew', 'banten', 'banten@gmail.com', 'Approved', '2019-06-17 04:21:54'),
(21, 'Ayi', '2001-06-21', 'Kabayan', 'Banten', 'yulia@gmail.com', 'Baru', '2019-08-21 02:09:50'),
(100, 'Juned', '2001-02-19', 'KP. jsdka', 'Jawa Tengah', 'junde@gmail.com', 'Unapproved', '2019-08-21 02:37:45'),
(10000, 'Osama', '2001-10-19', 'Kp. Campuraksanta', 'Banten', 'osamaboden@gmail.com', 'Approved', '2019-08-20 04:21:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `portofolio`
--

CREATE TABLE `portofolio` (
  `nik` int(16) NOT NULL,
  `bidang_keahlian` varchar(100) NOT NULL,
  `riwayat_pelatihan` text NOT NULL,
  `sertifikasi_pelatihan` text NOT NULL,
  `riwayat_project` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `portofolio`
--

INSERT INTO `portofolio` (`nik`, `bidang_keahlian`, `riwayat_pelatihan`, `sertifikasi_pelatihan`, `riwayat_project`) VALUES
(10000, 'web deploy', 'blk\r\na', 'dts', 'banyak\r\n'),
(100, 'web deploy', 'DTS\r\nBLK', 'DTS', 'Inventaris Sarana dan prasaran\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi`
--

CREATE TABLE `posisi` (
  `id_posisi` int(11) NOT NULL,
  `posisi` enum('Admin','Ketua','Sekretariat','Anggota') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `posisi`
--

INSERT INTO `posisi` (`id_posisi`, `posisi`) VALUES
(1, 'Anggota'),
(2, 'Admin'),
(3, 'Ketua'),
(4, 'Sekretariat');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `mapping_pengguna`
--
ALTER TABLE `mapping_pengguna`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id_posisi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id_posisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
