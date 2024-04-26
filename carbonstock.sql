-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 08:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carbonstock`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_tim`
--

CREATE TABLE `anggota_tim` (
  `id` int(11) NOT NULL,
  `id_tim` int(11) DEFAULT NULL,
  `id_user` varchar(6) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota_tim`
--

INSERT INTO `anggota_tim` (`id`, `id_tim`, `id_user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'fPohm8', '2024-04-06', '2024-04-06', NULL),
(2, 1, 'tTH0xd', '2024-04-06', '2024-04-12', NULL),
(3, 4, 'tTH0xd', '2024-04-13', '2024-04-13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hamparan`
--

CREATE TABLE `hamparan` (
  `id` int(11) NOT NULL,
  `nama_hamparan` varchar(30) DEFAULT NULL,
  `id_zona` int(11) DEFAULT NULL,
  `latitude` varchar(30) DEFAULT NULL,
  `longitude` varchar(30) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hamparan`
--

INSERT INTO `hamparan` (`id`, `nama_hamparan`, `id_zona`, `latitude`, `longitude`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'hamparan 1', 2, '123', '123', '2024-04-13', '2024-04-13', '2024-04-13'),
(2, 'hamparan 1', 2, '123', '123', '2024-04-13', '2024-04-13', NULL),
(3, 'hamparan 2', 2, '123', '123', '2024-04-13', '2024-04-13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_semai`
--

CREATE TABLE `laporan_semai` (
  `id` int(11) NOT NULL,
  `id_subplot` int(11) DEFAULT NULL,
  `berat_basah_total` varchar(5) DEFAULT NULL,
  `berat_basah_sample` varchar(5) DEFAULT NULL,
  `berat_kering_total` varchar(5) DEFAULT NULL,
  `kandungan_karbon` varchar(5) DEFAULT NULL,
  `serapan_co2` varchar(5) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `berat_kering_sample` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_serasah`
--

CREATE TABLE `laporan_serasah` (
  `id` int(11) NOT NULL,
  `id_subplot` int(11) DEFAULT NULL,
  `berat_basah_total` varchar(5) DEFAULT NULL,
  `berat_basah_sample` varchar(5) DEFAULT NULL,
  `berat_kering_total` varchar(5) DEFAULT NULL,
  `kandungan_karbon` varchar(5) DEFAULT NULL,
  `serapan_co2` varchar(5) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `berat_kering_sample` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_tumbuhan_bawah`
--

CREATE TABLE `laporan_tumbuhan_bawah` (
  `id` int(11) NOT NULL,
  `id_subplot` int(11) DEFAULT NULL,
  `berat_basah_total` varchar(5) DEFAULT NULL,
  `berat_basah_sample` varchar(5) DEFAULT NULL,
  `berat_kering_total` varchar(5) DEFAULT NULL,
  `kandungan_karbon` varchar(5) DEFAULT NULL,
  `serapan_co2` varchar(5) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `berat_kering_sample` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_hutan`
--

CREATE TABLE `master_hutan` (
  `id` int(11) NOT NULL,
  `jenis_hutan` varchar(30) DEFAULT NULL,
  `nisbah_akar_pucuk` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_hutan`
--

INSERT INTO `master_hutan` (`id`, `jenis_hutan`, `nisbah_akar_pucuk`) VALUES
(1, 'Hutan hujan tropis', 0.37),
(2, 'Hutan yang menggugurkan daun', 0.24),
(3, 'Hutan daerah kering tropis', 0.56),
(4, 'Semak tropis', 0.4),
(5, 'Hutan pegunungan tropis', 0.28);

-- --------------------------------------------------------

--
-- Table structure for table `master_plot`
--

CREATE TABLE `master_plot` (
  `id` int(11) NOT NULL,
  `nama_plot` varchar(30) DEFAULT NULL,
  `ukuran_plot` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_plot`
--

INSERT INTO `master_plot` (`id`, `nama_plot`, `ukuran_plot`) VALUES
(1, 'Bujursangkar', '20m X 20m'),
(2, 'Persegi panjang', '20m X 50m'),
(3, 'lingkaran', '');

-- --------------------------------------------------------

--
-- Table structure for table `master_subplot`
--

CREATE TABLE `master_subplot` (
  `id` int(11) NOT NULL,
  `nama_sub_plot` varchar(30) DEFAULT NULL,
  `luasan_minimal` float DEFAULT NULL,
  `id_plot` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_subplot`
--

INSERT INTO `master_subplot` (`id`, `nama_sub_plot`, `luasan_minimal`, `id_plot`) VALUES
(1, 'Serasah', 0.25, 1),
(2, 'Semai', 1, 1),
(3, 'Pancang', 25, 1),
(4, 'Tiang', 100, 1),
(5, 'Pohon', 400, 1),
(6, 'Serasah', 0.25, 2),
(7, 'Semai', 4, 2),
(8, 'Pancang', 25, 2),
(9, 'Tiang', 100, 2),
(10, 'Pohon', 1000, 2),
(11, 'Serasah', 0.25, 3),
(12, 'Semai', 4, 3),
(13, 'Pancang', 25, 3),
(14, 'Tiang', 100, 3),
(15, 'Pohon', 400, 3);

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id` int(11) NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_berakhir` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id`, `tgl_mulai`, `tgl_berakhir`, `created_at`, `updated_at`, `deleted_at`, `visible`) VALUES
(1, '2024-04-01', '2024-04-10', '2024-04-21', '2024-04-21', '2024-04-21', 0),
(2, '2024-04-01', '2024-04-10', '2024-04-21', '2024-04-21', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plot`
--

CREATE TABLE `plot` (
  `id` int(11) NOT NULL,
  `nama_plot` varchar(50) DEFAULT NULL,
  `type_plot` int(11) DEFAULT NULL,
  `latitude` varchar(30) DEFAULT NULL,
  `longitude` varchar(30) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `id_hamparan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plot`
--

INSERT INTO `plot` (`id`, `nama_plot`, `type_plot`, `latitude`, `longitude`, `created_at`, `updated_at`, `deleted_at`, `id_hamparan`) VALUES
(1, 'plot b', 1, NULL, NULL, '2024-04-13', '2024-04-13', '2024-04-13', 2),
(2, 'plot a', 1, NULL, NULL, '2024-04-15', '2024-04-15', NULL, 2),
(3, 'plot b', 2, NULL, NULL, '2024-04-15', '2024-04-15', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `regional`
--

CREATE TABLE `regional` (
  `id` int(11) NOT NULL,
  `nama_regional` varchar(100) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `jenis_hutan` int(11) DEFAULT NULL,
  `latitude` varchar(30) DEFAULT NULL,
  `longitude` varchar(30) DEFAULT NULL,
  `id_periode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regional`
--

INSERT INTO `regional` (`id`, `nama_regional`, `tanggal_mulai`, `tanggal_selesai`, `created_at`, `updated_at`, `deleted_at`, `jenis_hutan`, `latitude`, `longitude`, `id_periode`) VALUES
(1, 'regional 1', '2024-01-01', '2024-01-05', '2024-04-12', '2024-04-12', NULL, NULL, NULL, NULL, NULL),
(2, 'regional 2', '2024-01-01', '2024-01-10', '2024-04-12', '2024-04-12', NULL, NULL, NULL, NULL, NULL),
(3, 'regional 1', '2024-01-01', '2024-01-05', '2024-04-12', '2024-04-13', NULL, 1, NULL, NULL, NULL),
(4, 'regional 2', '2024-01-01', '2024-01-05', '2024-04-12', '2024-04-12', NULL, 1, '123', '123', NULL),
(5, 'regional 4', '2024-01-01', '2024-01-05', '2024-04-13', '2024-04-13', NULL, 1, '123', '123', NULL),
(6, 'regional 4', NULL, NULL, '2024-04-21', '2024-04-21', NULL, 1, '123', '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `regional_tim`
--

CREATE TABLE `regional_tim` (
  `id` int(11) NOT NULL,
  `id_regional` int(11) DEFAULT NULL,
  `id_tim` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regional_tim`
--

INSERT INTO `regional_tim` (`id`, `id_regional`, `id_tim`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, '2024-04-12', '2024-04-12', NULL),
(2, 1, 2, '2024-04-12', '2024-04-12', NULL),
(3, 1, 2, '2024-04-12', '2024-04-12', NULL),
(4, 1, 2, '2024-04-12', '2024-04-12', NULL),
(5, 3, 2, '2024-04-12', '2024-04-13', NULL),
(6, 3, 1, '2024-04-13', '2024-04-13', NULL),
(7, 5, 1, '2024-04-13', '2024-04-13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subplot`
--

CREATE TABLE `subplot` (
  `id` int(11) NOT NULL,
  `nama_subplot` varchar(50) DEFAULT NULL,
  `type_subplot` int(11) DEFAULT NULL,
  `latitude` varchar(30) DEFAULT NULL,
  `longitude` varchar(30) DEFAULT NULL,
  `id_plot` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subplot`
--

INSERT INTO `subplot` (`id`, `nama_subplot`, `type_subplot`, `latitude`, `longitude`, `id_plot`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'subplot a', 1, NULL, NULL, 2, '2024-04-15', '2024-04-15', NULL),
(2, 'subplot b', 1, NULL, NULL, 2, '2024-04-15', '2024-04-15', '2024-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `subplot_a`
--

CREATE TABLE `subplot_a` (
  `uuid` varchar(100) DEFAULT NULL,
  `plot_id` varchar(10) DEFAULT NULL,
  `area_name` varchar(100) DEFAULT NULL,
  `plot_name` varchar(100) DEFAULT NULL,
  `subplot_a_photo_url` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subplot_a`
--

INSERT INTO `subplot_a` (`uuid`, `plot_id`, `area_name`, `plot_name`, `subplot_a_photo_url`, `updated_at`) VALUES
('q1w2e3r4', '1', 'hutan', 'nama plot', NULL, '2024-04-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subplot_a_semai`
--

CREATE TABLE `subplot_a_semai` (
  `uuid` varchar(100) DEFAULT NULL,
  `uuid_subplot_a` varchar(100) DEFAULT NULL,
  `plot_id` varchar(100) DEFAULT NULL,
  `area_name` varchar(100) DEFAULT NULL,
  `plot_name` varchar(100) DEFAULT NULL,
  `basah_total` double DEFAULT NULL,
  `basah_sample` double DEFAULT NULL,
  `kering_total` double DEFAULT NULL,
  `kering_sample` double DEFAULT NULL,
  `carbon_value` double DEFAULT NULL,
  `carbon_absorb` double DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subplot_a_semai`
--

INSERT INTO `subplot_a_semai` (`uuid`, `uuid_subplot_a`, `plot_id`, `area_name`, `plot_name`, `basah_total`, `basah_sample`, `kering_total`, `kering_sample`, `carbon_value`, `carbon_absorb`, `updated_at`) VALUES
('azsxdc', '1q2w3e', '1', 'area name', 'plot name', 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, '2024-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subplot_a_seresah`
--

CREATE TABLE `subplot_a_seresah` (
  `uuid` varchar(100) DEFAULT NULL,
  `uuid_subplot_a` varchar(100) DEFAULT NULL,
  `plot_id` varchar(100) DEFAULT NULL,
  `area_name` varchar(100) DEFAULT NULL,
  `plot_name` varchar(100) DEFAULT NULL,
  `basah_total` double DEFAULT NULL,
  `basah_sample` double DEFAULT NULL,
  `kering_total` double DEFAULT NULL,
  `kering_sample` double DEFAULT NULL,
  `carbon_value` double DEFAULT NULL,
  `carbon_absorb` double DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subplot_a_seresah`
--

INSERT INTO `subplot_a_seresah` (`uuid`, `uuid_subplot_a`, `plot_id`, `area_name`, `plot_name`, `basah_total`, `basah_sample`, `kering_total`, `kering_sample`, `carbon_value`, `carbon_absorb`, `updated_at`) VALUES
('dcsxaz', '1q2w3e', '1', 'area name', 'plot name', 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, '2024-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subplot_a_tumbuhan_bawah`
--

CREATE TABLE `subplot_a_tumbuhan_bawah` (
  `uuid` varchar(100) DEFAULT NULL,
  `uuid_subplot_a` varchar(100) DEFAULT NULL,
  `plot_id` varchar(100) DEFAULT NULL,
  `area_name` varchar(100) DEFAULT NULL,
  `plot_name` varchar(100) DEFAULT NULL,
  `basah_total` double DEFAULT NULL,
  `basah_sample` double DEFAULT NULL,
  `kering_total` double DEFAULT NULL,
  `kering_sample` double DEFAULT NULL,
  `carbon_value` double DEFAULT NULL,
  `carbon_absorb` double DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subplot_a_tumbuhan_bawah`
--

INSERT INTO `subplot_a_tumbuhan_bawah` (`uuid`, `uuid_subplot_a`, `plot_id`, `area_name`, `plot_name`, `basah_total`, `basah_sample`, `kering_total`, `kering_sample`, `carbon_value`, `carbon_absorb`, `updated_at`) VALUES
('xszacd', '1q2w3e', '1', 'area name', 'plot name', 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, '2024-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subplot_b`
--

CREATE TABLE `subplot_b` (
  `uuid` varchar(100) DEFAULT NULL,
  `plot_id` varchar(100) DEFAULT NULL,
  `area_name` varchar(100) DEFAULT NULL,
  `plot_name` varchar(100) DEFAULT NULL,
  `local_name` varchar(100) DEFAULT NULL,
  `bio_name` varchar(100) DEFAULT NULL,
  `keliling` double DEFAULT NULL,
  `diameter` double DEFAULT NULL,
  `kerapatan_kayu` double DEFAULT NULL,
  `biomass` double DEFAULT NULL,
  `carbon_value` double DEFAULT NULL,
  `carbon_absorb` double DEFAULT NULL,
  `subplot_b_photo_url` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subplot_b`
--

INSERT INTO `subplot_b` (`uuid`, `plot_id`, `area_name`, `plot_name`, `local_name`, `bio_name`, `keliling`, `diameter`, `kerapatan_kayu`, `biomass`, `carbon_value`, `carbon_absorb`, `subplot_b_photo_url`, `updated_at`) VALUES
('3e2w1q', '1', 'area name', 'plot name', 'local name', 'bio name', 2, 2, 2.5, 2.5, 2.5, 2.5, NULL, '2024-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subplot_c`
--

CREATE TABLE `subplot_c` (
  `uuid` varchar(100) DEFAULT NULL,
  `plot_id` varchar(100) DEFAULT NULL,
  `area_name` varchar(100) DEFAULT NULL,
  `plot_name` varchar(100) DEFAULT NULL,
  `local_name` varchar(100) DEFAULT NULL,
  `bio_name` varchar(100) DEFAULT NULL,
  `keliling` double DEFAULT NULL,
  `diameter` double DEFAULT NULL,
  `kerapatan_kayu` double DEFAULT NULL,
  `biomass` double DEFAULT NULL,
  `carbon_value` double DEFAULT NULL,
  `carbon_absorb` double DEFAULT NULL,
  `subplot_c_photo_url` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subplot_c`
--

INSERT INTO `subplot_c` (`uuid`, `plot_id`, `area_name`, `plot_name`, `local_name`, `bio_name`, `keliling`, `diameter`, `kerapatan_kayu`, `biomass`, `carbon_value`, `carbon_absorb`, `subplot_c_photo_url`, `updated_at`) VALUES
('2w1q3e', '1', 'area name', 'plot name', 'local name', 'bio name', 2.5, 2.5, 2, 2.5, 2.5, 2.5, NULL, '2024-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subplot_d`
--

CREATE TABLE `subplot_d` (
  `uuid` varchar(100) DEFAULT NULL,
  `plot_id` varchar(10) DEFAULT NULL,
  `area_name` varchar(100) DEFAULT NULL,
  `plot_name` varchar(100) DEFAULT NULL,
  `subplot_d_photo_url` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subplot_d`
--

INSERT INTO `subplot_d` (`uuid`, `plot_id`, `area_name`, `plot_name`, `subplot_d_photo_url`, `updated_at`) VALUES
('3e1q2w', '1', 'area name', 'plot name', NULL, '2024-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subplot_d_nekromas`
--

CREATE TABLE `subplot_d_nekromas` (
  `uuid` varchar(100) DEFAULT NULL,
  `uuid_subplot_d` varchar(100) DEFAULT NULL,
  `plot_id` varchar(100) DEFAULT NULL,
  `area_name` varchar(100) DEFAULT NULL,
  `plot_name` varchar(100) DEFAULT NULL,
  `diameter_pangkal` double DEFAULT NULL,
  `diameter_ujung` double DEFAULT NULL,
  `panjang` double DEFAULT NULL,
  `volume` double DEFAULT NULL,
  `biomass` double DEFAULT NULL,
  `carbon_value` double DEFAULT NULL,
  `carbon_absorb` double DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subplot_d_nekromas`
--

INSERT INTO `subplot_d_nekromas` (`uuid`, `uuid_subplot_d`, `plot_id`, `area_name`, `plot_name`, `diameter_pangkal`, `diameter_ujung`, `panjang`, `volume`, `biomass`, `carbon_value`, `carbon_absorb`, `updated_at`) VALUES
('edwsqa', '3e1q2w', '1', 'area name', 'plot name', 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, '2024-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subplot_d_pohon`
--

CREATE TABLE `subplot_d_pohon` (
  `uuid` varchar(100) DEFAULT NULL,
  `uuid_subplot_d` varchar(100) DEFAULT NULL,
  `plot_id` varchar(100) DEFAULT NULL,
  `area_name` varchar(100) DEFAULT NULL,
  `plot_name` varchar(100) DEFAULT NULL,
  `local_name` varchar(100) DEFAULT NULL,
  `bio_name` varchar(100) DEFAULT NULL,
  `keliling` double DEFAULT NULL,
  `diameter` double DEFAULT NULL,
  `kerapatan_kayu` double DEFAULT NULL,
  `biomass` double DEFAULT NULL,
  `carbon_value` double DEFAULT NULL,
  `carbon_absorb` double DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subplot_d_pohon`
--

INSERT INTO `subplot_d_pohon` (`uuid`, `uuid_subplot_d`, `plot_id`, `area_name`, `plot_name`, `local_name`, `bio_name`, `keliling`, `diameter`, `kerapatan_kayu`, `biomass`, `carbon_value`, `carbon_absorb`, `updated_at`) VALUES
('qawsed', '3e1q2w', '1', 'area name', 'plot name', 'local name', 'bio name', 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, '2024-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subplot_d_tanah`
--

CREATE TABLE `subplot_d_tanah` (
  `uuid` varchar(100) DEFAULT NULL,
  `uuid_subplot_d` varchar(100) DEFAULT NULL,
  `plot_id` varchar(100) DEFAULT NULL,
  `area_name` varchar(100) DEFAULT NULL,
  `plot_name` varchar(100) DEFAULT NULL,
  `kedalaman_sample` double DEFAULT NULL,
  `berat_jenis_tanah` double DEFAULT NULL,
  `organik_c_tanah` double DEFAULT NULL,
  `carbon_gr_cm` double DEFAULT NULL,
  `carbon_ton_ha` double DEFAULT NULL,
  `carbon_ton` double DEFAULT NULL,
  `carbon_absorb` double DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subplot_d_tanah`
--

INSERT INTO `subplot_d_tanah` (`uuid`, `uuid_subplot_d`, `plot_id`, `area_name`, `plot_name`, `kedalaman_sample`, `berat_jenis_tanah`, `organik_c_tanah`, `carbon_gr_cm`, `carbon_ton_ha`, `carbon_ton`, `carbon_absorb`, `updated_at`) VALUES
('wsqaed', '3e1q2w', '1', 'area name', 'plot name', 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, '2024-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tim 1', '2024-04-06', '2024-04-12', NULL),
(2, 'tim 2', '2024-04-06', '2024-04-06', NULL),
(3, 'tim 3', '2024-04-13', '2024-04-13', NULL),
(4, 'tim 4', '2024-04-13', '2024-04-13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(6) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `is_active` int(11) DEFAULT 1,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `telepon`, `jenis_kelamin`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`, `is_active`, `role`) VALUES
('fPohm8', 'test', 'bandung', '2001-01-01', '08123123', 'laki-laki', 'test1@mail.com', '876c9556648fafe6c8bd15438f08bd8f', '2024-04-05', '2024-04-05', NULL, 1, NULL),
('tTH0xd', 'test', 'bandung', '2001-01-01', '08123123', 'laki-laki', 'test@mail.com', '876c9556648fafe6c8bd15438f08bd8f', '2024-04-05', '2024-04-05', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zona`
--

CREATE TABLE `zona` (
  `id` int(11) NOT NULL,
  `nama_zona` varchar(30) DEFAULT NULL,
  `jenis_hutan` int(11) DEFAULT NULL,
  `latitude` varchar(30) DEFAULT NULL,
  `longitude` varchar(30) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `id_regional` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zona`
--

INSERT INTO `zona` (`id`, `nama_zona`, `jenis_hutan`, `latitude`, `longitude`, `created_at`, `updated_at`, `deleted_at`, `id_regional`) VALUES
(1, 'zona a', NULL, '123', '321', '2024-04-12', '2024-04-13', '2024-04-13', 3),
(2, 'zona a', NULL, '123', '321', '2024-04-12', '2024-04-13', NULL, 3),
(3, 'zona a', NULL, '123', '321', '2024-04-12', '2024-04-13', NULL, 3),
(4, 'zona a', NULL, '123', '321', '2024-04-22', '2024-04-22', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `zona_tim`
--

CREATE TABLE `zona_tim` (
  `id` int(11) NOT NULL,
  `id_zona` int(11) DEFAULT NULL,
  `id_tim` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zona_tim`
--

INSERT INTO `zona_tim` (`id`, `id_zona`, `id_tim`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, '2024-04-13', '2024-04-13', '2024-04-13'),
(2, 1, 1, '2024-04-13', '2024-04-13', '2024-04-13'),
(3, 1, 2, '2024-04-13', '2024-04-13', '2024-04-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_tim`
--
ALTER TABLE `anggota_tim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hamparan`
--
ALTER TABLE `hamparan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_semai`
--
ALTER TABLE `laporan_semai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_hutan`
--
ALTER TABLE `master_hutan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_plot`
--
ALTER TABLE `master_plot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_subplot`
--
ALTER TABLE `master_subplot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_plot` (`id_plot`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plot`
--
ALTER TABLE `plot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regional`
--
ALTER TABLE `regional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regional_tim`
--
ALTER TABLE `regional_tim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subplot`
--
ALTER TABLE `subplot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zona_tim`
--
ALTER TABLE `zona_tim`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_tim`
--
ALTER TABLE `anggota_tim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hamparan`
--
ALTER TABLE `hamparan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laporan_semai`
--
ALTER TABLE `laporan_semai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_hutan`
--
ALTER TABLE `master_hutan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `master_plot`
--
ALTER TABLE `master_plot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_subplot`
--
ALTER TABLE `master_subplot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plot`
--
ALTER TABLE `plot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `regional`
--
ALTER TABLE `regional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `regional_tim`
--
ALTER TABLE `regional_tim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subplot`
--
ALTER TABLE `subplot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zona`
--
ALTER TABLE `zona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zona_tim`
--
ALTER TABLE `zona_tim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `master_subplot`
--
ALTER TABLE `master_subplot`
  ADD CONSTRAINT `master_subplot_ibfk_1` FOREIGN KEY (`id_plot`) REFERENCES `master_plot` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
