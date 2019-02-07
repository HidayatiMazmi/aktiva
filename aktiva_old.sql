-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2019 at 01:43 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

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
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_aset` varchar(1000) NOT NULL,
  `kode_aset` varchar(20) NOT NULL,
  `tgl_terima` date NOT NULL,
  `masa_pemakaian` varchar(50) NOT NULL,
  `foto_fisik_aset` varchar(1000) NOT NULL,
  `kondisi_awal` varchar(100) NOT NULL,
  `nilai_aset` int(20) NOT NULL,
  `jumlah_barang` varchar(10) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_jenis` int(11) UNSIGNED NOT NULL,
  `id_kategori` int(11) UNSIGNED NOT NULL,
  `id_lokasi` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`id`, `nama_aset`, `kode_aset`, `tgl_terima`, `masa_pemakaian`, `foto_fisik_aset`, `kondisi_awal`, `nilai_aset`, `jumlah_barang`, `keterangan`, `id_user`, `id_jenis`, `id_kategori`, `id_lokasi`) VALUES
(1, 'komputer', 'A01', '2012-02-01', '8 Tahun', 'default.png', 'Baik', 4000000, '0', '', 1, 1, 1, 2),
(2, 'Meja', 'A02', '2017-01-02', '2 tahun', 'default.png', 'Baik', 100000, '0', '', 2, 2, 2, 2),
(7, 'Print', 'PRT/871/67/90', '2012-02-01', '2 Tahun', 'print1.jpg', 'Baik', 235, '5', '', 2, 1, 1, 1),
(8, 'Meja Kerja', 'mj', '2012-02-01', '10', 'desk2.jpg', 'Baik', 5000, '1 set', '', 2, 1, 4, 2),
(9, 'Meja Komputer', 'mj/kmp', '0000-00-00', '2 Tahun', 'desk11.jpg', 'baik', 5000, '1 set', '', 2, 1, 4, 2),
(10, 'Meja Rapat', 'mj/rp', '2012-02-01', '10 Tahun', 'desk3.jpg', 'Baik', 35000000, '14 bh', '', 2, 1, 4, 2),
(11, 'Sofa, meja', 'SFMJ', '2012-02-01', '10 Tahun', 'sofameja_tamu_1516629125_9f59f5fe.jpg', 'Baik', 15000, '3 set', '', 2, 1, 4, 2),
(12, 'TV', 'TV/01', '2012-02-01', '10 Tahun', 'TV.jpg', 'Baik', 10000, '1 bh', '', 2, 1, 4, 2),
(13, 'Kulkas Kecil', 'klk/01', '2012-02-01', '10 Tahun', 'klks.jpg', 'Baik', 2000, '1 bh', '', 2, 1, 4, 2),
(14, 'Almari Kaca', 'AK/01', '2012-02-01', '8 Tahun', 'ak.jpg', 'Baik', 5000000, '1 bh', '', 2, 1, 4, 2),
(15, 'Meja Kerja', 'mk/kbag/tuk/t/01', '2012-02-01', '8 Tahun', 'desk12.jpg', 'Baik', 6000000, '2 set', '', 2, 1, 4, 9),
(16, 'Meja Komputer', 'mk/kbag/tuk/t/02', '2012-02-01', '8 Tahun', 'desk21.jpg', 'Baik', 3000, '2 set', '', 2, 1, 4, 9),
(17, 'Almari Arsip', 'mk/kbag/tuk/t/03', '2012-02-01', '8 Tahun', 'al2.jpg', 'Baik', 14000000, '4 bh', '', 2, 1, 4, 3),
(18, 'Kulkas Kecil', 'kk/tuk/tan/01', '2012-02-01', '8 Tahun', 'klks1.jpg', 'Baik', 4000000, '2 bh', '', 2, 1, 4, 3),
(19, 'Meja Kursi Rapat', 'MKR/01', '2012-02-01', '8 Tahun', 'desk31.jpg', 'Baik', 17000000, '34 bh', '', 2, 1, 4, 29),
(20, 'Meja Kursi Rapat', 'MKR/02', '2012-02-01', '8 Tahun', 'desk32.jpg', 'Baik', 150000000, '60 bh', '', 2, 1, 4, 30),
(21, 'Sound System', 'SS/01', '2012-02-01', '8 Tahun', 'ss.jpg', 'Baik', 10000000, '1 set', '', 2, 1, 4, 30),
(22, 'Layar proyektor', 'lp/01', '2012-02-01', '8 Tahun', 'TV1.jpg', 'Baik', 10000000, '1 set', '', 2, 1, 4, 30),
(23, 'Meja Kursi Makan', 'mkm/01', '2012-02-01', '8 Tahun', 'mjm.jpg', 'Baik', 8000000, '4 set', '', 2, 1, 4, 27),
(24, 'Kulkas', 'kk/tuk/tan/01', '2012-02-01', '8 Tahun', 'klks2.jpg', 'Baik', 2000000, '1 bh', '', 2, 1, 4, 27),
(25, 'Meja Kursi kERJA', 'kk/tuk/tan/01', '2012-02-01', '8 Tahun', 'desk33.jpg', 'Baik', 40000000, '35 BH', '', 2, 1, 4, 3),
(26, 'Sofa, meja', 'PRT/871/67/90', '2012-02-01', '8 Tahun', 'sofameja_tamu_1516629125_9f59f5fe1.jpg', 'Baik', 15000000, '4 set', '', 2, 1, 4, 3),
(27, 'Meja Kursi Tunggu', 'PRT/871/67/19', '2012-02-01', '8 Tahun', '_1_.jpg', 'Baik', 25000000, '18  bh', '', 2, 1, 4, 3),
(28, 'Meja Kursi Kerja', 'lp/01', '2012-02-01', '8 Tahun', '12.jpg', 'Baik', 70000000, '60 bh', '', 2, 1, 4, 9),
(29, 'Kursi Tunggu', 'lp/01', '2012-02-01', '8 Tahun', '_1_1.jpg', 'Baik', 10000000, '1 bh', '', 2, 1, 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `events`
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
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `nama`, `contact`, `tanggal_mulai`, `tanggal_berakhir`, `keterangan`) VALUES
(1, 'Makan Makan', '08987654321', '2017-03-31', '2017-04-07', 'Pelepasan macan tutul'),
(2, 'Ngumpul', '08234567890', '2017-04-01', '2017-04-01', 'Lokasi @kedai Mama');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_hari` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari`
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
-- Table structure for table `jenis_asset`
--

CREATE TABLE `jenis_asset` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_jenis` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_asset`
--

INSERT INTO `jenis_asset` (`id`, `nama_jenis`) VALUES
(1, 'Aset Bergerak'),
(2, 'Aset Tidak Bergerak');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_kategori` varchar(1000) NOT NULL,
  `id_detail` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `id_detail`) VALUES
(1, 'Perangkat Elektronik', 0),
(2, 'Tanah', 0),
(3, 'Kendaraan', 0),
(4, 'Peralatan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_lokasi` varchar(1000) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
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
-- Table structure for table `pemeliharaan`
--

CREATE TABLE `pemeliharaan` (
  `id` int(11) UNSIGNED NOT NULL,
  `hasil_pemeliharaan` varchar(20) NOT NULL,
  `id_aset` int(11) UNSIGNED NOT NULL,
  `tanggal_pemeliharaan` date NOT NULL,
  `id_hari` int(11) UNSIGNED NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `no_pemeliharaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeliharaan`
--

INSERT INTO `pemeliharaan` (`id`, `hasil_pemeliharaan`, `id_aset`, `tanggal_pemeliharaan`, `id_hari`, `keterangan`, `no_pemeliharaan`) VALUES
(1, 'Baik', 1, '2019-02-15', 1, 'test', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
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
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kategori` (`id_jenis`),
  ADD KEY `id_kategori_2` (`id_kategori`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_asset`
--
ALTER TABLE `jenis_asset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_detail` (`id_detail`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aset` (`id_aset`),
  ADD KEY `id_hari` (`id_hari`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenis_asset`
--
ALTER TABLE `jenis_asset`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aset`
--
ALTER TABLE `aset`
  ADD CONSTRAINT `aset_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `aset_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_asset` (`id`),
  ADD CONSTRAINT `aset_ibfk_3` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id`),
  ADD CONSTRAINT `aset_ibfk_4` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`);

--
-- Constraints for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD CONSTRAINT `pemeliharaan_ibfk_1` FOREIGN KEY (`id_hari`) REFERENCES `hari` (`id`),
  ADD CONSTRAINT `pemeliharaan_ibfk_2` FOREIGN KEY (`id_aset`) REFERENCES `aset` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
