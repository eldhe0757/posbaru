-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2020 at 10:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jual`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(5) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `detail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `barcode`, `nama`, `id_kategori`, `id_unit`, `harga`, `stok`, `gambar`, `detail`) VALUES
(19, 'M409D-EK302T', 'Laptop Asus M409D', 4, 9, 5975000, 4, 'barang-220820-0f24aa615d.jpg', 'Spesifikasi :\r\n-1\r\n-2\r\n-3\r\n-4\r\n-5\r\n-6\r\n-7\r\n-8\r\n-9\r\n-10'),
(20, 'X450CC-EKT000T', 'Laptop Asus X450C series', 4, 9, 4650000, 2, 'barang-220820-9536156d3f.jpg', 'sdfdsf'),
(26, 'PRCMG2570S', 'Printer Canon MG2750S', 30, 9, 575000, 6, 'barang-050920-6cc12f94f0.jpg', 'Deskripsi Printer Canon Pixma MG2570S (Print, Scan, Copy) RESMI Spesifikasi Canon PIXMA MG2570S PRINT Speed 8.0 ipm (Black) - 4.0 ipm (Color) Resolution 4800 x 600 dpi Ink Droplet 2 pl (min.) Paper Size A4, A5, B5, LTR, LGL, 4 x 6\", 5 x 7\", Envelopes (DL, COM10),');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `nama`, `judul`, `penulis`) VALUES
(2, 'sdfs', 'sdfsdwsf', 'adfdsdsfs');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `kd_cust` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `kd_cust`, `nama`, `alamat`, `no_telp`) VALUES
(1, 'CS2009150001', 'Ahmad eldhe', 'Jl. Pekapuran Raya No.37', '085252525258'),
(4, 'CS2009150002', 'Ahmad Humaidi', 'Jl. Kampung Baru no.908', '088888887888'),
(5, 'CS2009150003', 'Ahmad Rafi\'i', 'Jl. Guntung payung', '081334567654');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kd_ktg` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kd_ktg`, `nama`) VALUES
(3, 'KTG0001', 'Komputer'),
(4, 'KTG0002', 'Laptop'),
(6, 'KTG0003', 'Aksesoris Komputer'),
(7, 'KTG0004', 'Aksesoris Laptop'),
(30, 'KTG0005', 'Printer');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `diskon_barang` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_barang`, `harga`, `qty`, `diskon_barang`, `total`, `id_user`) VALUES
(1, 19, 5975000, 2, 0, 11950000, 3),
(2, 20, 4650000, 1, 0, 4650000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `no_faktur` varchar(50) NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `subtotal` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `dibayarkan` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `ket` text NOT NULL,
  `date` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `no_faktur`, `id_customer`, `subtotal`, `diskon`, `total`, `dibayarkan`, `kembalian`, `ket`, `date`, `id_user`, `created`) VALUES
(3, 'MP2008310001', NULL, 5975000, 175000, 5800000, 6000000, 200000, '', '2020-08-31', 3, '2020-08-31 16:22:24'),
(4, 'MP2009010001', 1, 11560000, 50000, 11510000, 11600000, 90000, 'Garansi Toko 7Hari', '2020-09-01', 3, '2020-09-02 05:20:04'),
(5, 'MP2009060001', 4, 575000, 5000, 570000, 600000, 30000, '', '2020-09-06', 3, '2020-09-06 16:12:44'),
(6, 'MP2009060002', 1, 575000, 75000, 500000, 500000, 0, '', '2020-09-06', 3, '2020-09-06 16:32:55'),
(7, 'MP2009120001', 1, 6440000, 40000, 6400000, 6500000, 100000, '', '2020-09-12', 3, '2020-09-12 11:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id_detail` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `diskon_barang` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id_detail`, `id_penjualan`, `id_barang`, `harga`, `qty`, `diskon_barang`, `total`) VALUES
(67, 3, 19, 5975000, 1, 0, 5975000),
(68, 4, 19, 5975000, 2, 195000, 11560000),
(69, 5, 26, 575000, 1, 0, 575000),
(70, 6, 26, 575000, 1, 0, 575000),
(71, 7, 19, 5975000, 1, 100000, 5875000),
(72, 7, 26, 575000, 1, 10000, 565000);

--
-- Triggers `penjualan_detail`
--
DELIMITER $$
CREATE TRIGGER `stok_min` AFTER INSERT ON `penjualan_detail` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok - NEW.qty WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `retur`
--

CREATE TABLE `retur` (
  `id_retur` int(11) NOT NULL,
  `no_retur` varchar(20) NOT NULL,
  `no_faktur` varchar(20) NOT NULL,
  `qty_retur` int(11) NOT NULL,
  `denda` int(20) NOT NULL,
  `total_retur` int(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `retur`
--

INSERT INTO `retur` (`id_retur`, `no_retur`, `no_faktur`, `qty_retur`, `denda`, `total_retur`, `date`) VALUES
(4, 'NR2009090001', 'MP2009010001', 1, 10, 5179500, '2020-09-09'),
(6, 'NR2009120001', 'MP2009010001', 2, 10, 10359000, '2020-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `no_service` varchar(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kategori` enum('Laptop','Printer','Komputer') NOT NULL,
  `kelengkapan` text NOT NULL,
  `keluhan` text NOT NULL,
  `kerusakan` text NOT NULL,
  `sparepart` text NOT NULL,
  `biaya_service` int(11) NOT NULL,
  `dp` int(11) NOT NULL,
  `dibayarkan` int(11) DEFAULT NULL,
  `kembalian` int(11) DEFAULT NULL,
  `id_customer` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id_service`, `no_service`, `nama_barang`, `kategori`, `kelengkapan`, `keluhan`, `kerusakan`, `sparepart`, `biaya_service`, `dp`, `dibayarkan`, `kembalian`, `id_customer`, `status`, `date`) VALUES
(101, 'SV2009100001', 'ASUS X450CC', 'Laptop', 'unit laptop', 'lcd blank hitam, bergaris', 'lcd, perlu diganti', 'LCD 14\" Slim 40 Pin', 800000, 150000, NULL, NULL, 1, 'Diproses', '2020-09-11'),
(104, 'SV2009100002', 'Asus X450CC', 'Laptop', 'Unit, charger', 'Baterai drop', 'Baterai perlu diganti', 'Baterai 2400Mah li-ion 2cell', 275000, 50000, 230000, 5000, 4, 'Diambil', '2020-09-12'),
(105, 'SV2009120001', 'Lenovo', 'Laptop', 'unit, charger', 'keyboard rusak', 'flexible keyboard, keyboard perlu diganti', 'keyboard', 235000, 50000, NULL, NULL, 1, 'Dibatalkan', '2020-09-12'),
(106, 'SV2009120002', 'Monitor LG 14\"', 'Komputer', 'unit monitor', 'port usb tidak bisa', 'konektor port usb', '-', 110000, 20000, NULL, NULL, 1, 'Selesai', '2020-09-12'),
(108, 'SV2009120003', 'asda', 'Komputer', 'asdsa', 'asdas', 'asdsas', 'asdas', 200000, 50000, 200000, 50000, 1, 'Diambil', '2020-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_stok` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `type` enum('In','Out') NOT NULL,
  `detail` text NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  `date` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id_stok`, `id_barang`, `type`, `detail`, `id_supplier`, `qty`, `date`, `id_user`) VALUES
(12, 19, 'In', 'as', 2, 5, '2020-08-31', 3),
(13, 26, 'In', 'etc', 2, 7, '2020-09-05', 3),
(14, 20, 'In', 'etc', 2, 3, '2020-09-05', 3),
(15, 19, 'In', 'etc', NULL, 4, '2020-09-05', 3),
(16, 26, 'In', 'etc', 2, 2, '2020-09-05', 3),
(17, 26, 'In', 'etc', 2, 1, '2020-09-05', 3),
(18, 26, 'Out', 'Rusak', NULL, 1, '2020-09-05', 3),
(19, 19, 'Out', 'Hilang', NULL, 1, '2020-09-05', 3),
(20, 20, 'Out', 'Hilang', NULL, 1, '2020-08-05', 3);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` text DEFAULT NULL,
  `nm_bank` varchar(20) DEFAULT NULL,
  `no_rek` bigint(20) NOT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `kd_supplier`, `nama`, `no_telp`, `alamat`, `nm_bank`, `no_rek`, `updated`) VALUES
(2, 'SP2009150001', 'Supplier A', '085252525252', 'Jl. Kelayan A Gg. Setuju', 'Bank Mandiri', 1234567891011, '2020-07-14 04:03:04'),
(3, 'SP2009150002', 'Supplier B', '087878787878', 'Jl. Pekapuran Raya Gg. Swadaya', 'Bank BCA', 1234567891012, '2020-08-22 07:33:46'),
(7, 'SP2009150003', 'Supplier C', '089696969696', 'Jl. Pangeran Antasari no.666', 'Bank Kalsel', 1234567891013, NULL),
(8, 'SP2009150004', 'Supplier D', '085678987767', 'Jl. Pramuka Blok. A No. 909', 'Bank Bukopin', 1234567891014, NULL),
(9, 'SP2009150005', 'Supplier E', '089655443326', 'Jl. Ahmad Yani KM. 4.5', 'Bank BRI', 1234567891015, NULL),
(10, 'SP2009150006', 'Supplier F', '082233445678', 'Jl. Guntung Manggis No. 37', 'Bank BNI', 1234567891016, NULL),
(11, 'SP2009150007', 'Supplier G', '081331235678', 'Jl. Rawa Sari Komp. Bulan Indah ', 'Bank BTPN', 1234567891017, NULL),
(12, 'SP2009150008', 'Supplier H', '085657453827', 'Jl. Pemuda Bersahaja No.55', 'Bank Kalsel', 1234567891017, NULL),
(13, 'SP2009150009', 'Supplier I', '087865432321', 'Jl. Raya Permai Blok.D3 No.77', 'Bank BNI', 1234567891019, NULL),
(14, 'SP2009150010', 'Supplier J', '085243565252', 'Jl. Pemurus Baru No.101', 'Bank Mandiri', 1234567891020, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id_unit`, `nama`) VALUES
(9, 'Buah'),
(11, 'Set'),
(12, 'Pcs');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(13) NOT NULL,
  `level` int(1) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `no_telp`, `level`, `gambar`) VALUES
(3, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'ahmad eldhe', 'Jl. Pekapuran Raya Gg. Timor-timur RT.12 No.37, Banjarmasin 70234', '085248307587', 1, 'userphoto-300820-4c9cb3b46f.jpg'),
(8, 'admin44', 'b9c003fc3924166d246b8fb5489a4a11581c49b3', 'fsdfsfssdfs', 'asdfasda', '9887856765', 2, 'userphoto-300820-6228b4dfbc.JPG'),
(10, 'ahmad1', '8003edc32f4a0d0b0c981e96f91660f558b3132f', 'ahmad ahmad', 'hh', '78687', 1, 'userphoto-140920-542d076bbc.jpg'),
(11, 'asasdsa', '68aeb8c02944e4f501a967b26125ee9dacf07edc', 'asdsadadsada', 'adsdjhsaj', '675567675675', 2, 'userphoto-140920-637c3a7c80.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `item_id` (`id_barang`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`id_retur`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `retur`
--
ALTER TABLE `retur`
  MODIFY `id_retur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stok_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`),
  ADD CONSTRAINT `stok_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
