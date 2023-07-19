-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 19 Jul 2023 pada 13.06
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rsms`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cities`
--

CREATE TABLE `tbl_cities` (
  `kode_cities` varchar(30) NOT NULL,
  `nama_cities` varchar(30) NOT NULL,
  `kode_region` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_cities`
--

INSERT INTO `tbl_cities` (`kode_cities`, `nama_cities`, `kode_region`) VALUES
('region20230719052507', 'testing region', 'testing region kode');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_district`
--

CREATE TABLE `tbl_district` (
  `kode_district` varchar(30) NOT NULL,
  `nama_district` varchar(30) NOT NULL,
  `kode_cities` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id_pasien` varchar(50) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `alamat_pasien` text NOT NULL,
  `nomor_telp` varchar(15) NOT NULL,
  `rtrw` varchar(10) NOT NULL,
  `tanggal_lahir` varchar(50) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `kode_region` varchar(30) NOT NULL,
  `kode_district` varchar(30) NOT NULL,
  `kode_subdistrict` varchar(30) NOT NULL,
  `kode_cities` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id_pasien`, `nama_pasien`, `alamat_pasien`, `nomor_telp`, `rtrw`, `tanggal_lahir`, `jenis_kelamin`, `kode_region`, `kode_district`, `kode_subdistrict`, `kode_cities`) VALUES
('2023070001', 'testing', 'testing', 'testing', 'testing', '2002', 'laki-laki', 'region28109', 'district03283', '983729', '3029830');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_region`
--

CREATE TABLE `tbl_region` (
  `kode_region` varchar(30) NOT NULL,
  `nama_region` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_subdistrict`
--

CREATE TABLE `tbl_subdistrict` (
  `kode_district` varchar(30) NOT NULL,
  `kode_subdistrict` varchar(30) NOT NULL,
  `nama_subdistrict` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `kode_user` varchar(30) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `status_user` enum('admin','operator') NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`kode_user`, `nama_user`, `status_user`, `email`, `password`, `token`) VALUES
('rscm20230719013347', 'admin name 1', 'operator', 'admin1@gmail.com', 'admin1', 'ae967aabf96944a3929608350dae2002'),
('rscm20230719112330', 'admin name', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '48a8616385e9b1114643dfa0db0179c5'),
('rsms2023071901', 'Tatang Roswandi Ganda Wijaya', 'admin', 'devgandawijaya@gmail.com', '7e2d822e4a0f411c12109f209e0a18b6', '9320bc8c73686fb176cb398433004e26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_cities`
--
ALTER TABLE `tbl_cities`
  ADD PRIMARY KEY (`kode_cities`);

--
-- Indeks untuk tabel `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`kode_district`);

--
-- Indeks untuk tabel `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `tbl_region`
--
ALTER TABLE `tbl_region`
  ADD PRIMARY KEY (`kode_region`);

--
-- Indeks untuk tabel `tbl_subdistrict`
--
ALTER TABLE `tbl_subdistrict`
  ADD PRIMARY KEY (`kode_subdistrict`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`kode_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
