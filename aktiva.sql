-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jan 2019 pada 08.22
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aktiva`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset`
--

CREATE TABLE `aset` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_aset` varchar(1000) NOT NULL,
  `kode_aset` varchar(20) NOT NULL,
  `tgl_terima` date NOT NULL,
  `masa_pemakaian` varchar(50) NOT NULL,
  `foto_fisik_aset` varchar(1000) NOT NULL,
  `kondisi_awal` varchar(100) NOT NULL,
  `kondisi_aset_sekarang` varchar(20) NOT NULL,
  `nilai_aset` int(20) NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_jenis` int(11) UNSIGNED NOT NULL,
  `id_kategori` int(11) UNSIGNED NOT NULL,
  `id_lokasi` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aset`
--

INSERT INTO `aset` (`id`, `nama_aset`, `kode_aset`, `tgl_terima`, `masa_pemakaian`, `foto_fisik_aset`, `kondisi_awal`, `kondisi_aset_sekarang`, `nilai_aset`, `jumlah_barang`, `keterangan`, `id_user`, `id_jenis`, `id_kategori`, `id_lokasi`) VALUES
(1, 'komputer', 'A01', '2018-05-03', '2 tahun', 'default.png', 'Baik', '', 4000000, 0, '', 1, 1, 1, 2),
(2, 'Meja', 'A02', '2017-01-02', '2 tahun', 'default.png', 'Baik', '', 100000, 0, '', 2, 2, 2, 2),
(5, 'kursi', 'k/tuk/2001', '2019-01-10', '10 tahun', 'mappin@2x3.png', 'Baik', 'Baik', 400000, 30, '', 2, 1, 1, 3),
(6, 'Komputer', 'kom', '2019-01-30', '10 tahun', 'LAN-2.png', 'Baik', 'Baik', 400000, 30, '', 2, 1, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`id`, `nama`, `contact`, `tanggal_mulai`, `tanggal_berakhir`, `keterangan`) VALUES
(1, 'Makan Makan', '08987654321', '2017-03-31', '2017-04-07', 'Pelepasan macan tutul'),
(2, 'Ngumpul', '08234567890', '2017-04-01', '2017-04-01', 'Lokasi @kedai Mama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hari`
--

CREATE TABLE `hari` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_hari` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hari`
--

INSERT INTO `hari` (`id`, `nama_hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jum\'at'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_asset`
--

CREATE TABLE `jenis_asset` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_jenis` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_asset`
--

INSERT INTO `jenis_asset` (`id`, `nama_jenis`) VALUES
(1, 'Aset Bergerak'),
(2, 'Aset Tidak Bergerak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_kategori` varchar(1000) NOT NULL,
  `id_detail` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `id_detail`) VALUES
(1, 'Perangkat Elektronik', 0),
(2, 'Tanah', 0),
(3, 'Kendaraan', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_lokasi` varchar(1000) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id`, `nama_lokasi`, `alamat`) VALUES
(1, 'Kantor Wilayah ', 'Blitar'),
(2, 'R.Pemimpin', 'Kantor Pusat Malang'),
(3, 'R. Kabag TUK/Tanaman', 'Kantor Pusat Malang'),
(4, 'R.Rapat Kecil', 'Kantor Pusat Malang'),
(5, 'R. Rapat Besar', 'Kantor Pusat Malang'),
(6, 'R. Makan ', 'Kantor Pusat Malang'),
(7, 'Kantor Tanaman', 'Kantor Pusat Malang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeliharaan`
--

CREATE TABLE `pemeliharaan` (
  `id` int(11) UNSIGNED NOT NULL,
  `hasil_pemeliharaan` varchar(20) NOT NULL,
  `id_aset` int(11) UNSIGNED NOT NULL,
  `tanggal_pemeliharaan` date NOT NULL,
  `id_hari` int(11) UNSIGNED NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemeliharaan`
--

INSERT INTO `pemeliharaan` (`id`, `hasil_pemeliharaan`, `id_aset`, `tanggal_pemeliharaan`, `id_hari`, `keterangan`) VALUES
(1, 'Baik', 1, '2019-01-10', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `nip` varchar(1000) NOT NULL,
  `role` varchar(1000) NOT NULL,
  `photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `nip`, `role`, `photo`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1', 'Admin', 'default.png'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', '2', 'User', 'default.png'),
(3, 'ida', 'ida', 'ida', '201002', 'User', 'logoMG_(2).png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kategori` (`id_jenis`),
  ADD KEY `id_kategori_2` (`id_kategori`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indeks untuk tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_asset`
--
ALTER TABLE `jenis_asset`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_detail` (`id_detail`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aset` (`id_aset`),
  ADD KEY `id_hari` (`id_hari`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aset`
--
ALTER TABLE `aset`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `hari`
--
ALTER TABLE `hari`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jenis_asset`
--
ALTER TABLE `jenis_asset`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aset`
--
ALTER TABLE `aset`
  ADD CONSTRAINT `aset_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `aset_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_asset` (`id`),
  ADD CONSTRAINT `aset_ibfk_3` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id`),
  ADD CONSTRAINT `aset_ibfk_4` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`);

--
-- Ketidakleluasaan untuk tabel `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD CONSTRAINT `pemeliharaan_ibfk_1` FOREIGN KEY (`id_hari`) REFERENCES `hari` (`id`),
  ADD CONSTRAINT `pemeliharaan_ibfk_2` FOREIGN KEY (`id_aset`) REFERENCES `aset` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
