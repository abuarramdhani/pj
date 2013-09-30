-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 30, 2013 at 01:05 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_pelita`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `Kode` varchar(22) NOT NULL,
  `Ukuran` varchar(50) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Nama2` varchar(20) NOT NULL,
  `Satuan1` varchar(6) NOT NULL,
  `Qty1` float(11,0) DEFAULT NULL,
  `QtyGudang` int(11) DEFAULT NULL,
  `Tgl_Saw` date DEFAULT NULL,
  `Saw` int(11) DEFAULT NULL,
  `SawGudang` int(11) DEFAULT NULL,
  PRIMARY KEY (`Kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`Kode`, `Ukuran`, `Nama`, `Nama2`, `Satuan1`, `Qty1`, `QtyGudang`, `Tgl_Saw`, `Saw`, `SawGudang`) VALUES
('B1307001', '200x52', 'Pipa L', 'PL22', 'Batang', 5, NULL, NULL, NULL, NULL),
('B1307002', '22x20', 'Plat', 'P22', 'Lembar', 0, NULL, NULL, NULL, NULL),
('B1307003', '25x25x25', 'Plat Segi Tiga', 'PST2', 'Meter', 55, NULL, NULL, NULL, NULL),
('B1307004', '15x12', 'Pipa Silinder X', 'PS15', 'Meter', 15, NULL, NULL, NULL, NULL),
('B1307005', '200 x 500', 'Besi Super', 'BS25', 'Roll', 25, NULL, NULL, NULL, NULL),
('B1307006', '400x500', 'Pipa Besi 3', 'Tes Data', 'Batang', 5235, NULL, NULL, NULL, NULL),
('B1309001', '5 x 12', 'Beton Ulir', '18-KS', 'Inci', 0, NULL, NULL, NULL, NULL),
('B1309002', '13 x 5', 'Besi 1', '18-KS', 'Cm', 0, NULL, NULL, NULL, NULL),
('B1309003', '2 x 2 x 3', 'Besi 2', '2KS', 'Inci', 0, NULL, NULL, NULL, NULL),
('B1309004', '3 X 3 X 6', 'Besi 3', '3KS', 'Meter', 0, NULL, NULL, NULL, NULL),
('B1309005', '4 X 4', 'Besi 4', '4BS', 'Cm', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bpb_d`
--

CREATE TABLE IF NOT EXISTS `bpb_d` (
  `No_Bpb` varchar(25) NOT NULL,
  `Kode_brg` varchar(22) NOT NULL,
  `Qty1` int(11) NOT NULL,
  `Keterangan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bpb_d`
--

INSERT INTO `bpb_d` (`No_Bpb`, `Kode_brg`, `Qty1`, `Keterangan`) VALUES
('BPB1309001', 'B1307001', 10, ''),
('BPB1309002', 'B1307002', 5, 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `bpb_h`
--

CREATE TABLE IF NOT EXISTS `bpb_h` (
  `No_Bpb` varchar(25) NOT NULL,
  `Tgl_Bpb` date NOT NULL,
  `No_Reff` varchar(25) NOT NULL,
  `Kode_Supp` varchar(25) NOT NULL,
  `Kode_Gudang` varchar(25) NOT NULL,
  PRIMARY KEY (`No_Bpb`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bpb_h`
--

INSERT INTO `bpb_h` (`No_Bpb`, `Tgl_Bpb`, `No_Reff`, `Kode_Supp`, `Kode_Gudang`) VALUES
('BPB1309001', '2013-07-01', '0001097776', 'S1307001', 'G1307002'),
('BPB1309002', '2013-07-02', '0002758', 'S1307002', 'G1307001');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `value` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`value`) VALUES
('Rupiah'),
('Dollar'),
('Yen'),
('Peso'),
('Gira');

-- --------------------------------------------------------

--
-- Table structure for table `do_d`
--

CREATE TABLE IF NOT EXISTS `do_d` (
  `No_Do` varchar(20) NOT NULL,
  `Kode_Brg` varchar(22) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Status` varchar(1) NOT NULL,
  `Keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `do_d`
--

INSERT INTO `do_d` (`No_Do`, `Kode_Brg`, `Qty`, `Harga`, `Jumlah`, `Status`, `Keterangan`) VALUES
('SO1309001', 'B1307003', 5, 1000, 5000, '', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `do_h`
--

CREATE TABLE IF NOT EXISTS `do_h` (
  `No_Do` varchar(10) NOT NULL,
  `Tgl` date NOT NULL,
  `No_Po` varchar(25) NOT NULL,
  `Tgl_Po` date NOT NULL,
  `Kode_Plg` varchar(10) NOT NULL,
  `Kode_Gudang` varchar(10) NOT NULL,
  `Kirim` varchar(1) DEFAULT NULL,
  `Otorisasi` varchar(30) NOT NULL,
  `Total` decimal(10,0) NOT NULL,
  PRIMARY KEY (`No_Do`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `do_h`
--

INSERT INTO `do_h` (`No_Do`, `Tgl`, `No_Po`, `Tgl_Po`, `Kode_Plg`, `Kode_Gudang`, `Kirim`, `Otorisasi`, `Total`) VALUES
('SO1309001', '2013-09-13', 'PO010837', '2013-09-22', '', '8', NULL, 'ssss', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE IF NOT EXISTS `gudang` (
  `Kode` varchar(22) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Alamat` varchar(30) NOT NULL,
  `Alamat2` varchar(30) DEFAULT NULL,
  `Kota` varchar(15) NOT NULL,
  `Telp` varchar(15) NOT NULL,
  `Milik_Sendiri` varchar(1) DEFAULT NULL,
  `Telp1` varchar(15) DEFAULT NULL,
  `Fax` varchar(15) NOT NULL,
  `Fax1` varchar(15) DEFAULT NULL,
  `Contac1` varchar(25) DEFAULT NULL,
  `Contac2` varchar(15) DEFAULT NULL,
  `Title1` varchar(4) DEFAULT NULL,
  `Title2` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`Kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`Kode`, `Nama`, `Alamat`, `Alamat2`, `Kota`, `Telp`, `Milik_Sendiri`, `Telp1`, `Fax`, `Fax1`, `Contac1`, `Contac2`, `Title1`, `Title2`) VALUES
('G1307001', 'Special Warehouse', 'Jl.Semesta Alam 3', NULL, 'Jakarta', '08524795555', NULL, '08125852555', '012-345', '067-890', NULL, NULL, NULL, NULL),
('G1307002', 'Gudang Murni', 'Jl.Semesta', NULL, 'Jakarta', '0123456789', NULL, '', '0551 2575', '', NULL, NULL, NULL, NULL),
('G1309001', 'Gudang Satu', 'Jl. Satu', NULL, 'Satu', '085247956204', NULL, '575475675675', '085247956204', '085247956204', NULL, NULL, NULL, NULL),
('G1309002', 'Gudag Dua', 'Jl. Belok Dua', NULL, 'Jakarta', '02547778522', NULL, '', '155288254', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE IF NOT EXISTS `issue` (
  `email` varchar(25) NOT NULL,
  `title` varchar(40) NOT NULL,
  `desc` varchar(300) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`email`, `title`, `desc`, `priority`) VALUES
('Guest', 'Bug #1', 'Sample Desc', 1),
('Sherlock', 'PDF Function Error', 'mPDF yang digunakan sebagai library untuk mencetak PDF memiliki masalah, coba ganti dengan plugin library yang lebih sesuai.', 3),
('Tony Stark', 'Performance Issue', 'setiap kali mengakses transaksi performance website menurun, Tips: atur ulang jQuery, Ajax, atau JS yang digunakan', 2),
('Eddy', 'Bug di master barang', 'master barang menampilkan property yang berbeda', 0);

-- --------------------------------------------------------

--
-- Table structure for table `muser`
--

CREATE TABLE IF NOT EXISTS `muser` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `muser`
--

INSERT INTO `muser` (`iduser`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'sip', '06b15d3af713e318d123274a98d70bc9');

-- --------------------------------------------------------

--
-- Table structure for table `os`
--

CREATE TABLE IF NOT EXISTS `os` (
  `No_Do` varchar(7) NOT NULL,
  `Kode_Brg` varchar(22) NOT NULL,
  `QtyDo` decimal(10,0) NOT NULL,
  `QtySj` decimal(10,0) NOT NULL,
  `Habis` varchar(1) NOT NULL,
  PRIMARY KEY (`No_Do`,`Kode_Brg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `Kode` varchar(20) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Nama1` varchar(30) DEFAULT NULL,
  `Perusahaan` varchar(50) NOT NULL,
  `Alamat1` varchar(40) NOT NULL,
  `Alamat2` varchar(40) DEFAULT NULL,
  `Kota` varchar(15) NOT NULL,
  `KodeP` varchar(5) NOT NULL,
  `Telp` varchar(20) NOT NULL,
  `Telp1` varchar(20) DEFAULT NULL,
  `Telp2` varchar(20) DEFAULT NULL,
  `Fax1` varchar(20) NOT NULL,
  `Fax2` varchar(20) DEFAULT NULL,
  `Limit` decimal(10,0) DEFAULT NULL,
  `Piutang` decimal(10,0) DEFAULT NULL,
  `NPWP` varchar(25) NOT NULL,
  `Lama` int(11) DEFAULT NULL,
  PRIMARY KEY (`Kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`Kode`, `Nama`, `Nama1`, `Perusahaan`, `Alamat1`, `Alamat2`, `Kota`, `KodeP`, `Telp`, `Telp1`, `Telp2`, `Fax1`, `Fax2`, `Limit`, `Piutang`, `NPWP`, `Lama`) VALUES
('P1307001', 'Tony', NULL, 'Stark', 'Jl. Alabama', NULL, 'Bekasi', '11475', '085247447', '0854444458', '-', '0551-8558', '-', NULL, NULL, '258 2587 57771', NULL),
('P1307002', 'Agung', NULL, 'Sentosa', 'Jl. Merdeka', NULL, 'Tanggerang', '11758', '085552475', '-', '-', '0221-25475', '', NULL, NULL, '7878 47125 58815', NULL),
('P1307003', 'aggagwgw', NULL, 'OK JAJA PT.', 'hesh', NULL, 'hesh', 'seh', '535253', '', '', '123456', '', NULL, NULL, '6346464326', NULL),
('P1307004', 'tes', NULL, ' SEMPURNA PT.', 'tes', NULL, 'test', 'est', 'tes', '', '', 'tes', '', NULL, NULL, 'tes', NULL),
('P1307005', 'test', NULL, 'OKJAYA PT.', 'ets', NULL, 't', 'tes', 'te', '', '', 'tes', '', NULL, NULL, 'teds', NULL),
('P1307006', 'etws', NULL, 'SENTOSOS PT.', 'fgeg', NULL, 'geg', 'gwe', 'fgw', '', '', 'gfewg', '', NULL, NULL, 'bgegb', NULL),
('P1307007', 'Soedirman', NULL, 'MERDEKA PT.', 'Jl. Pondok Indah', NULL, 'Jakarta', '11525', '0852478566', '', '', '055248885', '', NULL, NULL, '52225774441', NULL),
('P1307008', 'tes', NULL, 'tessss', 'tes', NULL, 'tes', '35555', '356346', '', '', '3', '', NULL, NULL, '346346346', NULL),
('P1307009', 'Bung Tomo', NULL, ' Bersatu Maju PT.', 'gsegseg', NULL, 'Bandung', '46333', '521353252', '', '', '634634', '', NULL, NULL, '35325', NULL),
('P1309001', 'Ogindo', NULL, 'OGINDO PRAKARSATAMA PT.', 'Jl. Ogindo', NULL, 'Bekasi', '13578', '0852479552', '6285788555822', '', '02215877', '', NULL, NULL, '487995577758852', NULL),
('P1309002', 'Kim Jong Kook', NULL, 'ABADI BARU YES', 'Jl. Gangnam No.35', NULL, 'Bekasi', '15400', '021-528444485', '', '', '021788588', '', NULL, NULL, '777858442000457', NULL),
('P1309003', 'Sidoel Ha', NULL, 'SIDO TENGGELAM', 'Jl. Pajajaran', NULL, 'Bunyu', '11710', '258552282', '52588475552', '55847852566', '258547', '24470444', NULL, NULL, '4356463646463', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `po_d`
--

CREATE TABLE IF NOT EXISTS `po_d` (
  `Kode_po` varchar(25) NOT NULL,
  `Kode_barang` varchar(25) NOT NULL,
  `Harga` decimal(10,0) DEFAULT NULL,
  `Jumlah` int(11) NOT NULL,
  `Nilai` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_d`
--

INSERT INTO `po_d` (`Kode_po`, `Kode_barang`, `Harga`, `Jumlah`, `Nilai`) VALUES
('PO1309001', 'B1307006', '5000', 10, '50000'),
('PO1309002', 'B1307004', '2000', 1, '2000'),
('PO1309002', 'B1307005', '10000', 2, '20000');

-- --------------------------------------------------------

--
-- Table structure for table `po_h`
--

CREATE TABLE IF NOT EXISTS `po_h` (
  `Kode` varchar(25) NOT NULL,
  `Tgl_po` date NOT NULL,
  `Tgl_kirim` date NOT NULL,
  `Permintaan` varchar(30) DEFAULT NULL,
  `Currency` varchar(10) NOT NULL,
  `Urgent` varchar(5) NOT NULL,
  `Kode_supplier` varchar(20) NOT NULL,
  `Kode_gudang` varchar(20) DEFAULT NULL,
  `Nama_proyek` varchar(50) DEFAULT NULL,
  `DPP` decimal(11,0) DEFAULT NULL,
  `PPN` int(11) DEFAULT NULL,
  `Total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_h`
--

INSERT INTO `po_h` (`Kode`, `Tgl_po`, `Tgl_kirim`, `Permintaan`, `Currency`, `Urgent`, `Kode_supplier`, `Kode_gudang`, `Nama_proyek`, `DPP`, `PPN`, `Total`) VALUES
('PO1309001', '2013-09-25', '2013-09-27', NULL, 'Rupiah', 'Ya', 'S1307003', 'G1307002', NULL, '100000', 0, '100000'),
('PO1309002', '2013-09-20', '2013-09-25', 'Tidak Ada', 'Rupiah', 'Ya', 'S1307002', 'G1307001', '', '22000', 2, '22040');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE IF NOT EXISTS `satuan` (
  `Value` varchar(10) NOT NULL,
  PRIMARY KEY (`Value`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`Value`) VALUES
('Batang'),
('Cm'),
('Inci'),
('Kg'),
('Lembar'),
('Meter'),
('Roll');

-- --------------------------------------------------------

--
-- Table structure for table `sj_d`
--

CREATE TABLE IF NOT EXISTS `sj_d` (
  `No_Sj` varchar(7) NOT NULL,
  `Kode_Brg` varchar(22) NOT NULL,
  `Barang` varchar(50) NOT NULL,
  `Barang_SJ` varchar(50) DEFAULT NULL,
  `Qty1` int(11) NOT NULL,
  `Status` varchar(1) NOT NULL,
  `Keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sj_d`
--

INSERT INTO `sj_d` (`No_Sj`, `Kode_Brg`, `Barang`, `Barang_SJ`, `Qty1`, `Status`, `Keterangan`) VALUES
('130701', 'B1307003', 'Plat Segi Tiga 25x25x25', 'Plat Segi Tiga', 0, '', 'tesx'),
('130701', 'B1307005', 'Besi Super 200 x 500', 'Pipa Silinder', 0, '', 'ubah data'),
('1307001', 'B1307005', 'Besi Super 200 x 500', 'Pipa L', 10, '', 'Ubah dari b1 ke b5'),
('1307001', 'B1307002', 'Plat 22x20', 'Plat', 5, '', 'tes2'),
('1307001', 'B1307003', 'Plat Segi Tiga 25x25x25', 'Plat Segi Tiga', 7, '', 'tes3');

-- --------------------------------------------------------

--
-- Table structure for table `sj_h`
--

CREATE TABLE IF NOT EXISTS `sj_h` (
  `No_Sj` varchar(7) NOT NULL,
  `Tgl` date NOT NULL,
  `No_Do` varchar(20) NOT NULL,
  `No_Po` varchar(25) NOT NULL,
  `No_Mobil` varchar(10) NOT NULL,
  `Kode_Plg` varchar(20) NOT NULL,
  `Kode_Gudang` varchar(20) NOT NULL,
  `Kirim` varchar(1) DEFAULT NULL,
  `Keterangan` varchar(20) NOT NULL,
  PRIMARY KEY (`No_Sj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sj_h`
--

INSERT INTO `sj_h` (`No_Sj`, `Tgl`, `No_Do`, `No_Po`, `No_Mobil`, `Kode_Plg`, `Kode_Gudang`, `Kirim`, `Keterangan`) VALUES
('1307001', '2013-07-19', 'SO1307001', 'PO12345', 'L 9359 K', 'P1307003', 'G1307001', NULL, 'Pelita');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `Kode` varchar(22) NOT NULL,
  `Kode_Gudang` varchar(5) NOT NULL,
  `Qty_1` decimal(10,0) NOT NULL,
  `QtyGudang` decimal(10,0) NOT NULL,
  `Tgl_Saw` date NOT NULL,
  `Saw` decimal(10,0) NOT NULL,
  `Terima` decimal(10,0) NOT NULL,
  `Ke_Do` decimal(10,0) NOT NULL,
  `Ke_Sj` decimal(10,0) NOT NULL,
  `Ke_Bpb` decimal(10,0) NOT NULL,
  PRIMARY KEY (`Kode`,`Kode_Gudang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `Kode` varchar(20) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Nama1` varchar(30) DEFAULT NULL,
  `Perusahaan` varchar(50) NOT NULL,
  `Alamat1` varchar(30) NOT NULL,
  `Alamat2` varchar(30) DEFAULT NULL,
  `Kota` varchar(15) NOT NULL,
  `Telp` varchar(20) NOT NULL,
  `Telp1` varchar(20) NOT NULL,
  `Telp2` varchar(20) DEFAULT NULL,
  `Fax1` varchar(20) NOT NULL,
  `Fax2` varchar(20) DEFAULT NULL,
  `Limit_Kredit` int(11) NOT NULL,
  PRIMARY KEY (`Kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Kode`, `Nama`, `Nama1`, `Perusahaan`, `Alamat1`, `Alamat2`, `Kota`, `Telp`, `Telp1`, `Telp2`, `Fax1`, `Fax2`, `Limit_Kredit`) VALUES
('S1307001', 'Tony Stark', NULL, 'Stark Company', 'Jl. Alabama', NULL, 'Tangerang', '085247956204', '', '', '0221 25884', '', 100000000),
('S1307002', 'Cockie', NULL, 'Hammer PT.', 'Jl. Kelma', NULL, 'Bandung', '08522257', '', '', '08547782', '', 0),
('S1307003', 'Arifin', NULL, 'Olala PT.', 'Gedung Energy', NULL, 'Jakarta', '3523362366', '', '', '0552 478855', '', 25000),
('S1309001', 'AFRO', NULL, 'AFRO PACIFIC INDAH STEEL', 'P.Jayakarta No.35', NULL, 'Jakarta', '628 6885 5524', '', '', '02158887', '', 6588558),
('S1309002', 'Ha Dong Hoon', NULL, ' HAHA PT.', 'Jl. Gangnam', NULL, 'Seoul', '0852577752', '', '', '021587745', '', 20000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
