-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 27, 2021 at 07:24 PM
-- Server version: 10.3.29-MariaDB-log-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamalama_db_persediaan_rop`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_barang` int(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `satuan` int(11) NOT NULL,
  `jenis` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `sts` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `kode`, `nama_barang`, `satuan`, `jenis`, `stok`, `sts`) VALUES
(23, 'B000001', 'Amenities', 3, 6, 95, 0),
(24, 'B000002', 'Gula', 6, 7, 4, 0),
(25, 'B000003', 'Sunlight', 3, 8, 2, 0),
(26, 'B000004', 'Galon', 7, 2, 8, 0),
(27, 'B000005', 'Wipol', 3, 8, 5, 0),
(28, 'B000006', 'Superpel', 3, 8, 5, 0),
(29, 'B000007', 'Stella Gantung', 3, 9, 4, 0),
(30, 'B000008', 'Sendok plastik', 3, 11, 20, 0),
(31, 'B000009', 'Cling', 3, 8, 10, 0),
(32, 'B000010', 'Teh celup Tong Tji', 3, 2, 10, 0),
(33, 'B000011', 'Tisu paseo', 3, 6, 20, 0),
(34, 'B000012', 'Gas', 3, 1, 0, 0),
(35, 'B000013', 'Kopi Kapal Api', 3, 2, 20, 0),
(36, 'B000014', 'Aqua 600ml', 4, 2, 10, 0),
(37, 'B000015', 'Box Nasi', 3, 7, 20, 0),
(38, 'B000016', 'Hvs', 4, 10, 0, 0),
(39, 'B000017', 'Deterjen Laundry', 5, 8, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `kd_keluar` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `kode` varchar(111) NOT NULL,
  `waktu` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `pegawai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`kd_keluar`, `kd_barang`, `kode`, `waktu`, `jumlah`, `pegawai`) VALUES
(37, 23, 'T-BK-2102250001', '2021-02-25', 5, 'Febby Putri'),
(38, 24, 'T-BK-2102250002', '2021-02-26', 1, 'Febby Putri'),
(39, 25, 'T-BK-2102250003', '2021-02-25', 1, 'Febby Putri'),
(40, 26, 'T-BK-2102250004', '2021-02-25', 2, 'Febby Putri'),
(41, 38, 'T-BK-2102250005', '2021-02-25', 1, 'Febby Putri'),
(42, 34, 'T-BK-2102250006', '2021-02-25', 1, 'Febby Putri'),
(43, 25, 'T-BK-2102250007', '2021-02-28', 2, 'Febby Putri'),
(44, 25, 'T-BK-2102250008', '2021-03-05', 2, 'Febby Putri'),
(45, 25, 'T-BK-2102250009', '2021-03-10', 2, 'Febby Putri'),
(46, 25, 'T-BK-2102250010', '2021-03-13', 1, 'Febby Putri'),
(47, 39, 'T-BK-2102250011', '2021-02-26', 1, 'Febby Putri'),
(48, 39, 'T-BK-2102250012', '2021-03-03', 1, 'Febby Putri'),
(49, 39, 'T-BK-2102250013', '2021-03-08', 1, 'Febby Putri'),
(50, 33, 'T-BK-2102250014', '2021-03-13', 1, 'Febby Putri'),
(51, 29, 'T-BK-2102250015', '2021-02-25', 5, 'Febby Putri'),
(52, 29, 'T-BK-2102250016', '2021-03-02', 5, 'Febby Putri'),
(53, 29, 'T-BK-2102250017', '2021-03-08', 2, 'Febby Putri'),
(54, 29, 'T-BK-2102250018', '2021-03-11', 2, 'Febby Putri'),
(55, 34, 'T-BK-2102250019', '2021-03-24', 1, 'Febby Putri'),
(56, 38, 'T-BK-2102250020', '2021-04-30', 1, 'Febby Putri'),
(57, 29, 'T-BK-2102250021', '2021-03-13', 2, 'Febby Putri');

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `on_delete_keluar` AFTER DELETE ON `barang_keluar` FOR EACH ROW BEGIN 
	UPDATE barang SET stok = stok + OLD.jumlah
	WHERE OLD.kd_barang=barang.kd_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `on_insert_keluar` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN 
	UPDATE barang SET stok = stok - NEW.jumlah
	WHERE NEW.kd_barang=barang.kd_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `on_update_keluar` AFTER UPDATE ON `barang_keluar` FOR EACH ROW BEGIN 
	UPDATE barang SET stok = (stok + OLD.jumlah)- NEW.jumlah
	WHERE NEW.kd_barang=barang.kd_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `kd_masuk` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `kode` varchar(111) NOT NULL,
  `waktu` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `supplier` int(11) NOT NULL,
  `pegawai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`kd_masuk`, `kd_barang`, `kode`, `waktu`, `jumlah`, `harga`, `supplier`, `pegawai`) VALUES
(60, 24, 'T-BM-2102250001', '2021-02-25', 5, 12500, 10, 'Febby Putri'),
(61, 35, 'T-BM-2102250002', '2021-02-25', 20, 17000, 10, 'Febby Putri'),
(62, 25, 'T-BM-2102250003', '2021-02-25', 10, 17000, 10, 'Febby Putri'),
(63, 32, 'T-BM-2102250004', '2021-02-25', 10, 17000, 10, 'Febby Putri'),
(64, 30, 'T-BM-2102250005', '2021-02-25', 20, 12500, 11, 'Febby Putri'),
(65, 37, 'T-BM-2102250006', '2021-02-25', 20, 54000, 11, 'Febby Putri'),
(66, 39, 'T-BM-2102250007', '2021-02-25', 5, 30000, 1, 'Febby Putri'),
(67, 33, 'T-BM-2102250008', '2021-02-25', 20, 53000, 10, 'Febby Putri'),
(68, 31, 'T-BM-2102250009', '2021-02-25', 10, 20000, 10, 'Febby Putri'),
(69, 27, 'T-BM-2102250010', '2021-02-25', 5, 30000, 10, 'Febby Putri'),
(70, 28, 'T-BM-2102250011', '2021-02-25', 5, 30000, 10, 'Febby Putri'),
(71, 26, 'T-BM-2102250012', '2021-02-25', 10, 7000, 9, 'Febby Putri'),
(72, 36, 'T-BM-2102250013', '2021-02-25', 10, 41000, 10, 'Febby Putri'),
(73, 38, 'T-BM-2102250014', '2021-02-25', 2, 144000, 8, 'Febby Putri'),
(74, 23, 'T-BM-2102250015', '2021-02-25', 100, 8000, 8, 'Febby Putri'),
(75, 34, 'T-BM-2102250016', '2021-02-25', 2, 260000, 11, 'Febby Putri'),
(76, 29, 'T-BM-2102250017', '2021-02-25', 20, 15000, 10, 'Febby Putri'),
(77, 0, 'T-BM-2103040018', '2021-03-04', 70, 50, 0, 'Febby Putri');

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `on_delete_masuk` AFTER DELETE ON `barang_masuk` FOR EACH ROW BEGIN 
	UPDATE barang SET stok = stok - OLD.jumlah
	WHERE OLD.kd_barang=barang.kd_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `on_insert_masuk` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN 
	UPDATE barang SET stok = stok + NEW.jumlah
	WHERE NEW.kd_barang=barang.kd_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `on_update_masuk` AFTER UPDATE ON `barang_masuk` FOR EACH ROW BEGIN 
	UPDATE barang SET stok = (stok - OLD.jumlah)+ NEW.jumlah
	WHERE NEW.kd_barang=barang.kd_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id`, `jenis`) VALUES
(1, 'Snack'),
(2, 'Minuman'),
(3, 'Alat Masak'),
(5, 'Bahan Makan'),
(6, 'Alat Kebersihan'),
(7, 'Makanan'),
(8, 'Bahan Pembersih'),
(9, 'Pengharum Ruangan'),
(10, 'Alat Tulis'),
(11, 'Alat Makan'),
(12, 'Tabung');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `tmp_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `jenkel`, `tmp_lahir`, `tgl_lahir`, `no_hp`, `alamat`) VALUES
(2, 'Risal Basri', 'L', 'ende', '1999-01-22', '08152155999', 'Jl. Pejuang Kemerdekaan no 30, Ende'),
(3, 'Masya Ashari', 'P', 'Ende', '1998-02-22', '08152159911', 'Ende'),
(4, 'Febby Putri', 'P', 'Ende', '2021-01-20', '08152155999', 'Yogyakarta'),
(9, 'Diana Prastika', 'P', 'Ende', '2021-02-01', '081521555980', 'ende\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `kd_pengajuan` int(11) NOT NULL,
  `barang` int(11) NOT NULL,
  `tgl_diajukan` date NOT NULL,
  `leadtime` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `supplier` int(11) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`kd_pengajuan`, `barang`, `tgl_diajukan`, `leadtime`, `jumlah`, `harga`, `supplier`, `ket`, `status`) VALUES
(36, 25, '2021-03-20', 0, 14, 17000, 10, 'Hasil Perhitungan Metode ROP', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `rop`
--

CREATE TABLE `rop` (
  `id` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `lt` int(11) NOT NULL,
  `ss` int(11) NOT NULL,
  `rop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rop`
--

INSERT INTO `rop` (`id`, `kd_barang`, `lt`, `ss`, `rop`) VALUES
(12, 24, 0, 1, 0),
(13, 35, 0, 4, 0),
(14, 25, 4, 6, 14),
(15, 32, 0, 2, 0),
(16, 30, 0, 4, 0),
(17, 37, 0, 4, 0),
(18, 39, 0, 1, 0),
(19, 33, 0, 4, 0),
(20, 31, 0, 2, 0),
(21, 27, 0, 1, 0),
(22, 28, 0, 1, 0),
(23, 26, 0, 2, 0),
(24, 36, 0, 2, 0),
(25, 38, 0, 0, 0),
(26, 23, 0, 20, 0),
(27, 34, 0, 0, 0),
(28, 29, 0, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `satuan_barang`
--

CREATE TABLE `satuan_barang` (
  `id` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan_barang`
--

INSERT INTO `satuan_barang` (`id`, `satuan`) VALUES
(1, 'Unit'),
(3, 'Pcs'),
(4, 'Kardus'),
(5, 'Liter'),
(6, 'Kilo'),
(7, 'Galon'),
(8, 'Kardus');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kd_supp` int(11) NOT NULL,
  `nama_supp` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kd_supp`, `nama_supp`, `owner`, `no_hp`, `alamat`) VALUES
(1, 'Mitade', 'Mita', '08152155999', 'Bekasi'),
(8, 'CV. Rukun Punia', 'Hesti', '08152155999', 'Jakarta'),
(9, 'Filmi Oksi', 'Mimi', '08228192873517', 'Ternate'),
(10, 'Jatiland', 'Margaret', '085168256176', 'Ternate'),
(11, 'Muara', 'Krisna', '081155247805', 'Tanah tinggi, ternate');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `role` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_pegawai`, `role`) VALUES
(1, 'admin', '$2y$10$FmO8fDbUZcPH7X9NP1NGoetVZ5YCo86uzQ2iBcOmH9UFBaNc1L86a', 0, 'admin'),
(3, 'user', '$2y$10$hWjKUbSRrHesTeyrMkt1qeruyS3m5E0OjLZtJNKEj5Njq8sduIoea', 2, 'Pegawai'),
(4, 'febby', '$2y$10$6AIKcrPScyEHDr8J/vsDv.KV298nhlYpF7Ffi/de9GlqMNyPPFG7y', 4, 'Pegawai'),
(7, 'diana111', '$2y$10$OUxUuDO1g6mkdNCfDfH5Fes5x/rF/5Tk1Idwm8XYX9OEinOSrrbLO', 9, 'pegawai'),
(8, 'manager', '$2y$10$hcWvlbjxrx.WVY3AtobXM.cG90TUfRxodgbZ4HpGaB.TKnIOodW/m', 3, 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`kd_keluar`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`kd_masuk`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`kd_pengajuan`),
  ADD KEY `barang` (`barang`);

--
-- Indexes for table `rop`
--
ALTER TABLE `rop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan_barang`
--
ALTER TABLE `satuan_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kd_supp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kd_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `kd_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `kd_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `kd_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `rop`
--
ALTER TABLE `rop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `satuan_barang`
--
ALTER TABLE `satuan_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `kd_supp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
