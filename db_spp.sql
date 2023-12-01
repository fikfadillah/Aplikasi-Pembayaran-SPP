-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 07:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `jurusan`) VALUES
(1, 'X - RPL', 'Rekayasa Perangkat Lunak'),
(2, 'XI - RPL', 'Rekayasa Perangkat Lunak'),
(3, 'XII - RPL', 'Rekayasa Perangkat Lunak'),
(5, 'X - TKJ', 'Teknik Komputer Jaringan'),
(6, 'XI - TKJ', 'Teknik Komputer Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `role` enum('Admin','Petugas','Siswa') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `username`, `password`, `nama_lengkap`, `role`) VALUES
(1, 'Taufik', '$2y$10$L1aF.V3aJOO/Jufq1MI8XuphKrHYALrKSDfTBhbvmwjG1N.r9SuQG', 'Taufik Fadillah', 'Admin'),
(7, 'Lia', '$2y$10$pmRqJ5Eq1aFe0ZKUl1UPku2Bew1HiykyvRQ2pGsSwUqjeJEyIaHSu', 'Lianesia', 'Petugas'),
(11, 'ananda123', '$2y$10$MKXaFd4U9tHqtS5mzABQ8.sH1vNRssJJbsZKl6abbrfHoDUtmWps.', 'Nanda Riski Sinai', 'Siswa'),
(12, 'clarisa', '$2y$10$VFFZVW31/QZ9FOH.2.R54.gFzUoOSRJpSu1uHhQDTaNADKglW6NLm', 'Clarisa Niche', 'Siswa'),
(13, 'ameliachan', '$2y$10$O.7o3IHX4CeCLgacOrRfo.lPYVDu4yyy0QykZ/th8jykBXBVEdFSu', 'Amelia Kalina', 'Siswa'),
(14, 'krisana', '$2y$10$qBO49dUI9hqOg2icGraLdObXCec9AF2sVtBi5aKqH2faVGXq7svi6', 'Krisna Anatama', 'Siswa'),
(15, 'nanda', '$2y$10$c9yfX1jr2dlohc1OuVc09.ApBd49MHSlSWGCrja9aTImFs74IXzK6', 'Nanda Amando', 'Siswa'),
(17, 'moni', '$2y$10$skaXq4Kuik7AdZAfeGgWNO/a10vEFR9dtU7po2W/0WWUND6T4il7W', 'monicaa', 'Siswa'),
(18, 'monic', '$2y$10$l2dPM4n0RqWZFSlIQkC/xuk0bEPo5.rlkyKNvWukL7UmXLP8N3/ZW', 'monic', 'Siswa'),
(19, 'wilda', '$2y$10$vGn9KiBBsr0Pe5ZUdRipwepv9csaP4ldUKJfwWQCphm9hbNEAAU/u', 'wildan', 'Siswa'),
(21, 'monica', '$2y$10$hkxTIAfQ0rGSPUZ2JL9T2eOSNgMdXXmKRc82fuQOTeV.jJHyEBjBS', 'monica', 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tgl_bayar` varchar(25) DEFAULT NULL,
  `bulan_dibayar` varchar(10) DEFAULT NULL,
  `id_spp` int(11) DEFAULT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_login`, `id_siswa`, `tgl_bayar`, `bulan_dibayar`, `id_spp`, `jumlah_bayar`, `keterangan`) VALUES
(2, 1, 6, '25 November 2023, 23:48:4', 'Januari', 1, 125000, 'Lunas'),
(3, 1, 6, '26 November 2023, 00:08:0', 'Februari', 1, 125000, 'Lunas'),
(4, 1, 8, '26 November 2023, 00:08:3', 'Januari', 1, 125000, 'Lunas'),
(5, 1, 9, '30 November 2023, 16:03:1', 'Januari', 1, 125000, 'Lunas'),
(6, 1, 6, '30 November 2023, 16:26:5', 'Maret', 1, 125000, 'Lunas'),
(7, 1, 10, '30 November 2023, 16:56:0', 'Januari', 1, 125000, 'Lunas'),
(8, 1, 8, '30 November 2023, 17:08:1', 'Februari', 1, 125000, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` char(10) NOT NULL,
  `nis` char(10) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `id_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nisn`, `nis`, `nama_siswa`, `id_kelas`, `alamat`, `no_telp`, `id_spp`, `id_login`) VALUES
(6, '2023389001', '236779', 'Clarisa Niche', 2, 'Tanjung Anom', '081289098946', 1, 12),
(8, '2023297800', '233960', 'Krisna Anatama', 1, 'Binjai', '089812390911', 1, 14),
(9, '2023895700', '236904', 'Nanda Amando', 6, 'Sibolangit', '089878112901', 1, 15),
(10, '2023212300', '230216', 'monic', 2, 'medan', '089123122311', 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `tb_spp`
--

CREATE TABLE `tb_spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` varchar(11) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_spp`
--

INSERT INTO `tb_spp` (`id_spp`, `tahun`, `nominal`) VALUES
(1, '2023 / 2024', 125000),
(18, '2024 / 2025', 150000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_login` (`id_login`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_spp`
--
ALTER TABLE `tb_spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `tb_login` (`id_login`),
  ADD CONSTRAINT `tb_pembayaran_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`);

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`),
  ADD CONSTRAINT `tb_siswa_ibfk_2` FOREIGN KEY (`id_spp`) REFERENCES `tb_spp` (`id_spp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
