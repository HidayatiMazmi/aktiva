-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Feb 2019 pada 05.31
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
  `kode` varchar(20) NOT NULL,
  `tahun_perolehan` int(10) NOT NULL,
  `masa_manfaat` int(10) NOT NULL,
  `foto_fisik_aset` varchar(1000) NOT NULL,
  `jumlah_barang` varchar(10) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_jenis` int(11) UNSIGNED NOT NULL,
  `id_kategori` int(11) UNSIGNED NOT NULL,
  `id_lokasi` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aset`
--

INSERT INTO `aset` (`id`, `nama_aset`, `kode`, `tahun_perolehan`, `masa_manfaat`, `foto_fisik_aset`, `jumlah_barang`, `keterangan`, `status`, `id_user`, `id_jenis`, `id_kategori`, `id_lokasi`) VALUES
(1, 'komputer', 'A01', 2012, 8, 'default.png', '0', '', 'Ada', 1, 1, 1, 2),
(2, 'Meja', 'A02', 2017, 2, 'default.png', '0', '', 'Ada', 2, 2, 2, 2),
(7, 'Print', 'PRT/871/67/90', 2012, 2, 'print1.jpg', '5', '', 'Ada', 2, 1, 1, 1),
(8, 'Meja Kerja', 'mj', 2012, 10, 'desk2.jpg', '1 set', '', 'Ada', 2, 1, 4, 2),
(9, 'Meja Komputer', 'mj/kmp', 2012, 2, 'desk11.jpg', '1 set', '', 'Ada', 2, 1, 4, 2),
(10, 'Meja Rapat', 'mj/rp', 2012, 10, 'desk3.jpg', '14 bh', '', 'Ada', 2, 1, 4, 2),
(11, 'Sofa, meja', 'SFMJ', 2012, 10, 'sofameja_tamu_1516629125_9f59f5fe.jpg', '3 set', '', 'Ada', 2, 1, 4, 2),
(12, 'TV', 'TV/01', 2012, 10, 'TV.jpg', '1 bh', '', 'Ada', 2, 1, 4, 2),
(13, 'Kulkas Kecil', 'klk/01', 2012, 10, 'klks.jpg', '1 bh', '', 'Ada', 2, 1, 4, 2),
(14, 'Almari Kaca', 'AK/01', 2012, 8, 'ak.jpg', '1 bh', '', 'Ada', 2, 1, 4, 2),
(15, 'Meja Kerja', 'mk/kbag/tuk/t/01', 2012, 8, 'desk12.jpg', '2 set', '', 'Ada', 2, 1, 4, 9),
(16, 'Meja Komputer', 'mk/kbag/tuk/t/02', 2012, 8, 'desk21.jpg', '2 set', '', 'Ada', 2, 1, 4, 9),
(17, 'Almari Arsip', 'mk/kbag/tuk/t/03', 2012, 8, 'al2.jpg', '4 bh', '', 'Ada', 2, 1, 4, 3),
(18, 'Kulkas Kecil', 'kk/tuk/tan/01', 2012, 8, 'klks1.jpg', '2 bh', '', 'Ada', 2, 1, 4, 3),
(19, 'Meja Kursi Rapat', 'MKR/01', 2012, 8, 'desk31.jpg', '34 bh', '', 'Ada', 2, 1, 4, 29),
(20, 'Meja Kursi Rapat', 'MKR/02', 2012, 8, 'desk32.jpg', '60 bh', '', 'Ada', 2, 1, 4, 30),
(21, '', 'SS/01', 2012, 8, 'ss.jpg', '1 set', '', 'Ada', 2, 1, 4, 30),
(22, 'Layar proyektor', 'lp/01', 2012, 8, 'TV1.jpg', '1 set', '', 'Ada', 2, 1, 4, 30),
(23, 'Meja Kursi Makan', 'mkm/01', 2012, 8, 'mjm.jpg', '4 set', '', 'Ada', 2, 1, 4, 27),
(24, 'Kulkas', 'kk/tuk/tan/01', 2012, 8, 'klks2.jpg', '1 bh', '', 'Ada', 2, 1, 4, 27),
(25, 'Meja Kursi kERJA', 'kk/tuk/tan/01', 2012, 8, 'desk33.jpg', '35 BH', '', 'Ada', 2, 1, 4, 3),
(26, 'Sofa, meja', 'PRT/871/67/90', 2012, 8, 'sofameja_tamu_1516629125_9f59f5fe1.jpg', '4 set', '', 'Ada', 2, 1, 4, 3),
(27, 'Meja Kursi Tunggu', 'PRT/871/67/19', 2012, 8, '_1_.jpg', '18  bh', '', 'Ada', 2, 1, 4, 3),
(28, 'Meja Kursi Kerja', 'lp/01', 2012, 8, '12.jpg', '60 bh', '', 'Ada', 2, 1, 4, 9),
(29, 'Kursi Tunggu', 'lp/01', 2012, 8, '_1_1.jpg', '1 bh', '', 'Ada', 2, 1, 4, 9),
(30, 'Komputer', 'KA.TUK.003.2019', 2019, 10, 'scanner1.jpg', '1', '', 'Ada', 2, 1, 1, 1),
(35, 'Truck', 'KA.TUK.001.2019', 2019, 10, '17.jpg', '1', '', 'Ada', 2, 1, 3, 1),
(36, 'Tronton', 'KA.TUK.002.2019', 2019, 10, 'al21.jpg', '1', 'oke', 'Ada', 2, 1, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_notifikasi`
--

CREATE TABLE `daftar_notifikasi` (
  `id_notifikasi` bigint(20) NOT NULL,
  `tanggal_notifikasi` date NOT NULL,
  `id_pemeliharaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(3, 'Kendaraan', 0),
(4, 'Peralatan', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
  `no_polisi` varchar(20) NOT NULL,
  `no_rangka` int(50) NOT NULL,
  `no_mesin` int(50) NOT NULL,
  `id_aset` int(11) UNSIGNED NOT NULL,
  `tanggal_pembelian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `no_polisi`, `no_rangka`, `no_mesin`, `id_aset`, `tanggal_pembelian`) VALUES
(2, 'N2019k', 10283, 2147483647, 35, '2019-12-31'),
(3, 'N2019A', 10283, 2147483647, 36, '2019-12-31');

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
(1, 'KANTOR WILAYAH', 'Blitar'),
(2, 'RUANG PEMIMPIN', 'Kantor Pusat Malang'),
(3, 'RUANG KABAG TUK', 'Kantor Pusat Malang'),
(8, 'RUANG PUSTAKA', ''),
(9, 'RUANG KABAG TANAMAN', ''),
(10, 'RUANG BIRO TANAMAN', ''),
(11, 'RUANG YUDISTIRA', ''),
(13, 'RUANG SEKRETARIAT', ''),
(14, 'RUANG KRISNA', ''),
(15, 'RUANG NAKULA-SADEWA', ''),
(17, 'BINA WILAYAH UTARA', ''),
(18, 'BINA WILAYAH SELATAN', ''),
(19, 'BINA WILAYAH TENGAH', ''),
(20, 'RUANG PANDAWA', ''),
(21, 'SEKSI KEUANGAN', ''),
(22, 'LOGISTIK', ''),
(23, 'AKUNTANSI', ''),
(24, 'KASIR DAN PELAYANAN DO', ''),
(25, 'SEKSI PERSONALIA DAN UMUM', ''),
(26, 'PERSONALIA DAN UMUM', ''),
(27, 'RUMAH TANGGA', ''),
(28, 'PDE', ''),
(29, 'RUANG RAPAT KECIL', ''),
(30, 'RUANG RAPAT BESAR', '');

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
  `keterangan` varchar(500) NOT NULL,
  `no_pemeliharaan` varchar(20) NOT NULL,
  `harga_pemeliharaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemeliharaan`
--

INSERT INTO `pemeliharaan` (`id`, `hasil_pemeliharaan`, `id_aset`, `tanggal_pemeliharaan`, `id_hari`, `keterangan`, `no_pemeliharaan`, `harga_pemeliharaan`) VALUES
(1, 'Baik', 35, '2019-01-10', 1, 'bayar pajak', 'PEM-2019-0001', '');

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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1', 'Admin', 'face123.jpg'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', '2', 'User', 'face234.jpg'),
(7, 'ida', '7f78f270e3e1129faf118ed92fdf54db', 'ida', '5476567444467690', 'Admin', 'face103.jpg'),
(8, 'gg', '73c18c59a39b18382081ec00bb456d43', 'gg', '9767576565820876', 'User', 'face162.jpg');

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
-- Indeks untuk tabel `daftar_notifikasi`
--
ALTER TABLE `daftar_notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

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
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aset` (`id_aset`);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `daftar_notifikasi`
--
ALTER TABLE `daftar_notifikasi`
  MODIFY `id_notifikasi` bigint(20) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
