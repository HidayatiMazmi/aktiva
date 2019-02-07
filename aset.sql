-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2019 at 04:45 AM
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
