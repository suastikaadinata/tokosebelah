-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09 Des 2017 pada 08.08
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokosebelah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `belanja`
--

CREATE TABLE `belanja` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `iklan_id` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `pesanan` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `isReceived` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `belanja`
--

INSERT INTO `belanja` (`id`, `user_id`, `iklan_id`, `jumlah`, `pesanan`, `status`, `isReceived`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 1, 1, 1, '2017-12-08 14:19:24', '2017-12-08 14:20:28'),
(9, 3, 2, 1, 1, 1, 1, '2017-12-08 19:57:12', '2017-12-08 20:09:17'),
(10, 3, 1, 1, 1, 1, 1, '2017-12-08 20:10:17', '2017-12-08 20:12:12'),
(12, 1, 2, 1, 1, 0, 0, '2017-12-08 22:32:39', '2017-12-08 22:42:16'),
(14, 3, 2, 1, 1, 1, 1, '2017-12-08 23:51:31', '2017-12-09 00:08:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Olahraga', '2017-12-08 14:16:45', '2017-12-08 14:16:45'),
(2, 'Fashion Pria', '2017-12-08 14:16:48', '2017-12-08 14:16:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `iklan_id` int(10) UNSIGNED NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `features`
--

CREATE TABLE `features` (
  `id` int(10) UNSIGNED NOT NULL,
  `iklan_id` int(10) UNSIGNED NOT NULL,
  `fitur` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `features`
--

INSERT INTO `features` (`id`, `iklan_id`, `fitur`, `created_at`, `updated_at`) VALUES
(1, 1, 'Berkualitas tinggi', '2017-12-08 14:17:55', '2017-12-08 14:17:55'),
(2, 1, NULL, '2017-12-08 14:17:56', '2017-12-08 14:17:56'),
(3, 1, NULL, '2017-12-08 14:17:56', '2017-12-08 14:17:56'),
(4, 1, NULL, '2017-12-08 14:17:56', '2017-12-08 14:17:56'),
(5, 1, NULL, '2017-12-08 14:17:56', '2017-12-08 14:17:56'),
(6, 1, NULL, '2017-12-08 14:17:56', '2017-12-08 14:17:56'),
(7, 2, 'Berkualitas tinggi', '2017-12-08 14:18:29', '2017-12-08 14:18:29'),
(8, 2, NULL, '2017-12-08 14:18:29', '2017-12-08 14:18:29'),
(9, 2, NULL, '2017-12-08 14:18:29', '2017-12-08 14:18:29'),
(10, 2, NULL, '2017-12-08 14:18:29', '2017-12-08 14:18:29'),
(11, 2, NULL, '2017-12-08 14:18:29', '2017-12-08 14:18:29'),
(12, 2, NULL, '2017-12-08 14:18:29', '2017-12-08 14:18:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id` int(10) UNSIGNED NOT NULL,
  `iklan_id` int(10) UNSIGNED NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id`, `iklan_id`, `foto`, `created_at`, `updated_at`) VALUES
(1, 1, 'iklan/WWALjGHy82YlyiBhphHMYMSoNLFFxsP6NvLdRto6.jpeg', '2017-12-08 14:17:55', '2017-12-08 14:17:55'),
(2, 1, 'iklan/3IdasE6sN4DMajT0hJaef59mrXYnyejQOkiCJTbk.jpeg', '2017-12-08 14:17:55', '2017-12-08 14:17:55'),
(3, 2, 'iklan/EMCSAbCX7Omp4OqxHqLqX3hnaiXV1p2UHcbmZMNa.jpeg', '2017-12-08 14:18:29', '2017-12-08 14:18:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `iklan`
--

CREATE TABLE `iklan` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `kategori_id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(13,2) NOT NULL,
  `isVerified` tinyint(1) NOT NULL,
  `nomor_telepon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `like` int(11) NOT NULL,
  `dislike` int(11) NOT NULL,
  `provinsi_id` int(10) UNSIGNED NOT NULL,
  `kabupaten_id` int(10) UNSIGNED NOT NULL,
  `hapus` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `iklan`
--

INSERT INTO `iklan` (`id`, `user_id`, `kategori_id`, `judul`, `deskripsi`, `harga`, `isVerified`, `nomor_telepon`, `alamat`, `like`, `dislike`, `provinsi_id`, `kabupaten_id`, `hapus`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Sepatu Adidas', 'Sepatu adidas', '500000.00', 1, '081888222111', 'Jalan Papa Kuning', 0, 0, 11, 256, 0, '2017-12-08 14:17:55', '2017-12-08 14:18:37'),
(2, 1, 2, 'Jaket Pria', 'Jaket pria', '100000.00', 1, '081888222111', 'Jalan Papa Kuning', 0, 0, 11, 256, 0, '2017-12-08 14:18:29', '2017-12-08 14:18:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id` int(10) UNSIGNED NOT NULL,
  `provinsi_id` int(10) UNSIGNED NOT NULL,
  `kabupaten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`id`, `provinsi_id`, `kabupaten`, `tipe`, `kode_pos`) VALUES
(1, 21, 'Aceh Barat', 'Kabupaten', '23681'),
(2, 21, 'Aceh Barat Daya', 'Kabupaten', '23764'),
(3, 21, 'Aceh Besar', 'Kabupaten', '23951'),
(4, 21, 'Aceh Jaya', 'Kabupaten', '23654'),
(5, 21, 'Aceh Selatan', 'Kabupaten', '23719'),
(6, 21, 'Aceh Singkil', 'Kabupaten', '24785'),
(7, 21, 'Aceh Tamiang', 'Kabupaten', '24476'),
(8, 21, 'Aceh Tengah', 'Kabupaten', '24511'),
(9, 21, 'Aceh Tenggara', 'Kabupaten', '24611'),
(10, 21, 'Aceh Timur', 'Kabupaten', '24454'),
(11, 21, 'Aceh Utara', 'Kabupaten', '24382'),
(12, 32, 'Agam', 'Kabupaten', '26411'),
(13, 23, 'Alor', 'Kabupaten', '85811'),
(14, 19, 'Ambon', 'Kota', '97222'),
(15, 34, 'Asahan', 'Kabupaten', '21214'),
(16, 24, 'Asmat', 'Kabupaten', '99777'),
(17, 1, 'Badung', 'Kabupaten', '80351'),
(18, 13, 'Balangan', 'Kabupaten', '71611'),
(19, 15, 'Balikpapan', 'Kota', '76111'),
(20, 21, 'Banda Aceh', 'Kota', '23238'),
(21, 18, 'Bandar Lampung', 'Kota', '35139'),
(22, 9, 'Bandung', 'Kabupaten', '40311'),
(23, 9, 'Bandung', 'Kota', '40115'),
(24, 9, 'Bandung Barat', 'Kabupaten', '40721'),
(25, 29, 'Banggai', 'Kabupaten', '94711'),
(26, 29, 'Banggai Kepulauan', 'Kabupaten', '94881'),
(27, 2, 'Bangka', 'Kabupaten', '33212'),
(28, 2, 'Bangka Barat', 'Kabupaten', '33315'),
(29, 2, 'Bangka Selatan', 'Kabupaten', '33719'),
(30, 2, 'Bangka Tengah', 'Kabupaten', '33613'),
(31, 11, 'Bangkalan', 'Kabupaten', '69118'),
(32, 1, 'Bangli', 'Kabupaten', '80619'),
(33, 13, 'Banjar', 'Kabupaten', '70619'),
(34, 9, 'Banjar', 'Kota', '46311'),
(35, 13, 'Banjarbaru', 'Kota', '70712'),
(36, 13, 'Banjarmasin', 'Kota', '70117'),
(37, 10, 'Banjarnegara', 'Kabupaten', '53419'),
(38, 28, 'Bantaeng', 'Kabupaten', '92411'),
(39, 5, 'Bantul', 'Kabupaten', '55715'),
(40, 33, 'Banyuasin', 'Kabupaten', '30911'),
(41, 10, 'Banyumas', 'Kabupaten', '53114'),
(42, 11, 'Banyuwangi', 'Kabupaten', '68416'),
(43, 13, 'Barito Kuala', 'Kabupaten', '70511'),
(44, 14, 'Barito Selatan', 'Kabupaten', '73711'),
(45, 14, 'Barito Timur', 'Kabupaten', '73671'),
(46, 14, 'Barito Utara', 'Kabupaten', '73881'),
(47, 28, 'Barru', 'Kabupaten', '90719'),
(48, 17, 'Batam', 'Kota', '29413'),
(49, 10, 'Batang', 'Kabupaten', '51211'),
(50, 8, 'Batang Hari', 'Kabupaten', '36613'),
(51, 11, 'Batu', 'Kota', '65311'),
(52, 34, 'Batu Bara', 'Kabupaten', '21655'),
(53, 30, 'Bau-Bau', 'Kota', '93719'),
(54, 9, 'Bekasi', 'Kabupaten', '17837'),
(55, 9, 'Bekasi', 'Kota', '17121'),
(56, 2, 'Belitung', 'Kabupaten', '33419'),
(57, 2, 'Belitung Timur', 'Kabupaten', '33519'),
(58, 23, 'Belu', 'Kabupaten', '85711'),
(59, 21, 'Bener Meriah', 'Kabupaten', '24581'),
(60, 26, 'Bengkalis', 'Kabupaten', '28719'),
(61, 12, 'Bengkayang', 'Kabupaten', '79213'),
(62, 4, 'Bengkulu', 'Kota', '38229'),
(63, 4, 'Bengkulu Selatan', 'Kabupaten', '38519'),
(64, 4, 'Bengkulu Tengah', 'Kabupaten', '38319'),
(65, 4, 'Bengkulu Utara', 'Kabupaten', '38619'),
(66, 15, 'Berau', 'Kabupaten', '77311'),
(67, 24, 'Biak Numfor', 'Kabupaten', '98119'),
(68, 22, 'Bima', 'Kabupaten', '84171'),
(69, 22, 'Bima', 'Kota', '84139'),
(70, 34, 'Binjai', 'Kota', '20712'),
(71, 17, 'Bintan', 'Kabupaten', '29135'),
(72, 21, 'Bireuen', 'Kabupaten', '24219'),
(73, 31, 'Bitung', 'Kota', '95512'),
(74, 11, 'Blitar', 'Kabupaten', '66171'),
(75, 11, 'Blitar', 'Kota', '66124'),
(76, 10, 'Blora', 'Kabupaten', '58219'),
(77, 7, 'Boalemo', 'Kabupaten', '96319'),
(78, 9, 'Bogor', 'Kabupaten', '16911'),
(79, 9, 'Bogor', 'Kota', '16119'),
(80, 11, 'Bojonegoro', 'Kabupaten', '62119'),
(81, 31, 'Bolaang Mongondow (Bolmong)', 'Kabupaten', '95755'),
(82, 31, 'Bolaang Mongondow Selatan', 'Kabupaten', '95774'),
(83, 31, 'Bolaang Mongondow Timur', 'Kabupaten', '95783'),
(84, 31, 'Bolaang Mongondow Utara', 'Kabupaten', '95765'),
(85, 30, 'Bombana', 'Kabupaten', '93771'),
(86, 11, 'Bondowoso', 'Kabupaten', '68219'),
(87, 28, 'Bone', 'Kabupaten', '92713'),
(88, 7, 'Bone Bolango', 'Kabupaten', '96511'),
(89, 15, 'Bontang', 'Kota', '75313'),
(90, 24, 'Boven Digoel', 'Kabupaten', '99662'),
(91, 10, 'Boyolali', 'Kabupaten', '57312'),
(92, 10, 'Brebes', 'Kabupaten', '52212'),
(93, 32, 'Bukittinggi', 'Kota', '26115'),
(94, 1, 'Buleleng', 'Kabupaten', '81111'),
(95, 28, 'Bulukumba', 'Kabupaten', '92511'),
(96, 16, 'Bulungan (Bulongan)', 'Kabupaten', '77211'),
(97, 8, 'Bungo', 'Kabupaten', '37216'),
(98, 29, 'Buol', 'Kabupaten', '94564'),
(99, 19, 'Buru', 'Kabupaten', '97371'),
(100, 19, 'Buru Selatan', 'Kabupaten', '97351'),
(101, 30, 'Buton', 'Kabupaten', '93754'),
(102, 30, 'Buton Utara', 'Kabupaten', '93745'),
(103, 9, 'Ciamis', 'Kabupaten', '46211'),
(104, 9, 'Cianjur', 'Kabupaten', '43217'),
(105, 10, 'Cilacap', 'Kabupaten', '53211'),
(106, 3, 'Cilegon', 'Kota', '42417'),
(107, 9, 'Cimahi', 'Kota', '40512'),
(108, 9, 'Cirebon', 'Kabupaten', '45611'),
(109, 9, 'Cirebon', 'Kota', '45116'),
(110, 34, 'Dairi', 'Kabupaten', '22211'),
(111, 24, 'Deiyai (Deliyai)', 'Kabupaten', '98784'),
(112, 34, 'Deli Serdang', 'Kabupaten', '20511'),
(113, 10, 'Demak', 'Kabupaten', '59519'),
(114, 1, 'Denpasar', 'Kota', '80227'),
(115, 9, 'Depok', 'Kota', '16416'),
(116, 32, 'Dharmasraya', 'Kabupaten', '27612'),
(117, 24, 'Dogiyai', 'Kabupaten', '98866'),
(118, 22, 'Dompu', 'Kabupaten', '84217'),
(119, 29, 'Donggala', 'Kabupaten', '94341'),
(120, 26, 'Dumai', 'Kota', '28811'),
(121, 33, 'Empat Lawang', 'Kabupaten', '31811'),
(122, 23, 'Ende', 'Kabupaten', '86351'),
(123, 28, 'Enrekang', 'Kabupaten', '91719'),
(124, 25, 'Fakfak', 'Kabupaten', '98651'),
(125, 23, 'Flores Timur', 'Kabupaten', '86213'),
(126, 9, 'Garut', 'Kabupaten', '44126'),
(127, 21, 'Gayo Lues', 'Kabupaten', '24653'),
(128, 1, 'Gianyar', 'Kabupaten', '80519'),
(129, 7, 'Gorontalo', 'Kabupaten', '96218'),
(130, 7, 'Gorontalo', 'Kota', '96115'),
(131, 7, 'Gorontalo Utara', 'Kabupaten', '96611'),
(132, 28, 'Gowa', 'Kabupaten', '92111'),
(133, 11, 'Gresik', 'Kabupaten', '61115'),
(134, 10, 'Grobogan', 'Kabupaten', '58111'),
(135, 5, 'Gunung Kidul', 'Kabupaten', '55812'),
(136, 14, 'Gunung Mas', 'Kabupaten', '74511'),
(137, 34, 'Gunungsitoli', 'Kota', '22813'),
(138, 20, 'Halmahera Barat', 'Kabupaten', '97757'),
(139, 20, 'Halmahera Selatan', 'Kabupaten', '97911'),
(140, 20, 'Halmahera Tengah', 'Kabupaten', '97853'),
(141, 20, 'Halmahera Timur', 'Kabupaten', '97862'),
(142, 20, 'Halmahera Utara', 'Kabupaten', '97762'),
(143, 13, 'Hulu Sungai Selatan', 'Kabupaten', '71212'),
(144, 13, 'Hulu Sungai Tengah', 'Kabupaten', '71313'),
(145, 13, 'Hulu Sungai Utara', 'Kabupaten', '71419'),
(146, 34, 'Humbang Hasundutan', 'Kabupaten', '22457'),
(147, 26, 'Indragiri Hilir', 'Kabupaten', '29212'),
(148, 26, 'Indragiri Hulu', 'Kabupaten', '29319'),
(149, 9, 'Indramayu', 'Kabupaten', '45214'),
(150, 24, 'Intan Jaya', 'Kabupaten', '98771'),
(151, 6, 'Jakarta Barat', 'Kota', '11220'),
(152, 6, 'Jakarta Pusat', 'Kota', '10540'),
(153, 6, 'Jakarta Selatan', 'Kota', '12230'),
(154, 6, 'Jakarta Timur', 'Kota', '13330'),
(155, 6, 'Jakarta Utara', 'Kota', '14140'),
(156, 8, 'Jambi', 'Kota', '36111'),
(157, 24, 'Jayapura', 'Kabupaten', '99352'),
(158, 24, 'Jayapura', 'Kota', '99114'),
(159, 24, 'Jayawijaya', 'Kabupaten', '99511'),
(160, 11, 'Jember', 'Kabupaten', '68113'),
(161, 1, 'Jembrana', 'Kabupaten', '82251'),
(162, 28, 'Jeneponto', 'Kabupaten', '92319'),
(163, 10, 'Jepara', 'Kabupaten', '59419'),
(164, 11, 'Jombang', 'Kabupaten', '61415'),
(165, 25, 'Kaimana', 'Kabupaten', '98671'),
(166, 26, 'Kampar', 'Kabupaten', '28411'),
(167, 14, 'Kapuas', 'Kabupaten', '73583'),
(168, 12, 'Kapuas Hulu', 'Kabupaten', '78719'),
(169, 10, 'Karanganyar', 'Kabupaten', '57718'),
(170, 1, 'Karangasem', 'Kabupaten', '80819'),
(171, 9, 'Karawang', 'Kabupaten', '41311'),
(172, 17, 'Karimun', 'Kabupaten', '29611'),
(173, 34, 'Karo', 'Kabupaten', '22119'),
(174, 14, 'Katingan', 'Kabupaten', '74411'),
(175, 4, 'Kaur', 'Kabupaten', '38911'),
(176, 12, 'Kayong Utara', 'Kabupaten', '78852'),
(177, 10, 'Kebumen', 'Kabupaten', '54319'),
(178, 11, 'Kediri', 'Kabupaten', '64184'),
(179, 11, 'Kediri', 'Kota', '64125'),
(180, 24, 'Keerom', 'Kabupaten', '99461'),
(181, 10, 'Kendal', 'Kabupaten', '51314'),
(182, 30, 'Kendari', 'Kota', '93126'),
(183, 4, 'Kepahiang', 'Kabupaten', '39319'),
(184, 17, 'Kepulauan Anambas', 'Kabupaten', '29991'),
(185, 19, 'Kepulauan Aru', 'Kabupaten', '97681'),
(186, 32, 'Kepulauan Mentawai', 'Kabupaten', '25771'),
(187, 26, 'Kepulauan Meranti', 'Kabupaten', '28791'),
(188, 31, 'Kepulauan Sangihe', 'Kabupaten', '95819'),
(189, 6, 'Kepulauan Seribu', 'Kabupaten', '14550'),
(190, 31, 'Kepulauan Siau Tagulandang Biaro (Sitaro)', 'Kabupaten', '95862'),
(191, 20, 'Kepulauan Sula', 'Kabupaten', '97995'),
(192, 31, 'Kepulauan Talaud', 'Kabupaten', '95885'),
(193, 24, 'Kepulauan Yapen (Yapen Waropen)', 'Kabupaten', '98211'),
(194, 8, 'Kerinci', 'Kabupaten', '37167'),
(195, 12, 'Ketapang', 'Kabupaten', '78874'),
(196, 10, 'Klaten', 'Kabupaten', '57411'),
(197, 1, 'Klungkung', 'Kabupaten', '80719'),
(198, 30, 'Kolaka', 'Kabupaten', '93511'),
(199, 30, 'Kolaka Utara', 'Kabupaten', '93911'),
(200, 30, 'Konawe', 'Kabupaten', '93411'),
(201, 30, 'Konawe Selatan', 'Kabupaten', '93811'),
(202, 30, 'Konawe Utara', 'Kabupaten', '93311'),
(203, 13, 'Kotabaru', 'Kabupaten', '72119'),
(204, 31, 'Kotamobagu', 'Kota', '95711'),
(205, 14, 'Kotawaringin Barat', 'Kabupaten', '74119'),
(206, 14, 'Kotawaringin Timur', 'Kabupaten', '74364'),
(207, 26, 'Kuantan Singingi', 'Kabupaten', '29519'),
(208, 12, 'Kubu Raya', 'Kabupaten', '78311'),
(209, 10, 'Kudus', 'Kabupaten', '59311'),
(210, 5, 'Kulon Progo', 'Kabupaten', '55611'),
(211, 9, 'Kuningan', 'Kabupaten', '45511'),
(212, 23, 'Kupang', 'Kabupaten', '85362'),
(213, 23, 'Kupang', 'Kota', '85119'),
(214, 15, 'Kutai Barat', 'Kabupaten', '75711'),
(215, 15, 'Kutai Kartanegara', 'Kabupaten', '75511'),
(216, 15, 'Kutai Timur', 'Kabupaten', '75611'),
(217, 34, 'Labuhan Batu', 'Kabupaten', '21412'),
(218, 34, 'Labuhan Batu Selatan', 'Kabupaten', '21511'),
(219, 34, 'Labuhan Batu Utara', 'Kabupaten', '21711'),
(220, 33, 'Lahat', 'Kabupaten', '31419'),
(221, 14, 'Lamandau', 'Kabupaten', '74611'),
(222, 11, 'Lamongan', 'Kabupaten', '64125'),
(223, 18, 'Lampung Barat', 'Kabupaten', '34814'),
(224, 18, 'Lampung Selatan', 'Kabupaten', '35511'),
(225, 18, 'Lampung Tengah', 'Kabupaten', '34212'),
(226, 18, 'Lampung Timur', 'Kabupaten', '34319'),
(227, 18, 'Lampung Utara', 'Kabupaten', '34516'),
(228, 12, 'Landak', 'Kabupaten', '78319'),
(229, 34, 'Langkat', 'Kabupaten', '20811'),
(230, 21, 'Langsa', 'Kota', '24412'),
(231, 24, 'Lanny Jaya', 'Kabupaten', '99531'),
(232, 3, 'Lebak', 'Kabupaten', '42319'),
(233, 4, 'Lebong', 'Kabupaten', '39264'),
(234, 23, 'Lembata', 'Kabupaten', '86611'),
(235, 21, 'Lhokseumawe', 'Kota', '24352'),
(236, 32, 'Lima Puluh Koto/Kota', 'Kabupaten', '26671'),
(237, 17, 'Lingga', 'Kabupaten', '29811'),
(238, 22, 'Lombok Barat', 'Kabupaten', '83311'),
(239, 22, 'Lombok Tengah', 'Kabupaten', '83511'),
(240, 22, 'Lombok Timur', 'Kabupaten', '83612'),
(241, 22, 'Lombok Utara', 'Kabupaten', '83711'),
(242, 33, 'Lubuk Linggau', 'Kota', '31614'),
(243, 11, 'Lumajang', 'Kabupaten', '67319'),
(244, 28, 'Luwu', 'Kabupaten', '91994'),
(245, 28, 'Luwu Timur', 'Kabupaten', '92981'),
(246, 28, 'Luwu Utara', 'Kabupaten', '92911'),
(247, 11, 'Madiun', 'Kabupaten', '63153'),
(248, 11, 'Madiun', 'Kota', '63122'),
(249, 10, 'Magelang', 'Kabupaten', '56519'),
(250, 10, 'Magelang', 'Kota', '56133'),
(251, 11, 'Magetan', 'Kabupaten', '63314'),
(252, 9, 'Majalengka', 'Kabupaten', '45412'),
(253, 27, 'Majene', 'Kabupaten', '91411'),
(254, 28, 'Makassar', 'Kota', '90111'),
(255, 11, 'Malang', 'Kabupaten', '65163'),
(256, 11, 'Malang', 'Kota', '65112'),
(257, 16, 'Malinau', 'Kabupaten', '77511'),
(258, 19, 'Maluku Barat Daya', 'Kabupaten', '97451'),
(259, 19, 'Maluku Tengah', 'Kabupaten', '97513'),
(260, 19, 'Maluku Tenggara', 'Kabupaten', '97651'),
(261, 19, 'Maluku Tenggara Barat', 'Kabupaten', '97465'),
(262, 27, 'Mamasa', 'Kabupaten', '91362'),
(263, 24, 'Mamberamo Raya', 'Kabupaten', '99381'),
(264, 24, 'Mamberamo Tengah', 'Kabupaten', '99553'),
(265, 27, 'Mamuju', 'Kabupaten', '91519'),
(266, 27, 'Mamuju Utara', 'Kabupaten', '91571'),
(267, 31, 'Manado', 'Kota', '95247'),
(268, 34, 'Mandailing Natal', 'Kabupaten', '22916'),
(269, 23, 'Manggarai', 'Kabupaten', '86551'),
(270, 23, 'Manggarai Barat', 'Kabupaten', '86711'),
(271, 23, 'Manggarai Timur', 'Kabupaten', '86811'),
(272, 25, 'Manokwari', 'Kabupaten', '98311'),
(273, 25, 'Manokwari Selatan', 'Kabupaten', '98355'),
(274, 24, 'Mappi', 'Kabupaten', '99853'),
(275, 28, 'Maros', 'Kabupaten', '90511'),
(276, 22, 'Mataram', 'Kota', '83131'),
(277, 25, 'Maybrat', 'Kabupaten', '98051'),
(278, 34, 'Medan', 'Kota', '20228'),
(279, 12, 'Melawi', 'Kabupaten', '78619'),
(280, 8, 'Merangin', 'Kabupaten', '37319'),
(281, 24, 'Merauke', 'Kabupaten', '99613'),
(282, 18, 'Mesuji', 'Kabupaten', '34911'),
(283, 18, 'Metro', 'Kota', '34111'),
(284, 24, 'Mimika', 'Kabupaten', '99962'),
(285, 31, 'Minahasa', 'Kabupaten', '95614'),
(286, 31, 'Minahasa Selatan', 'Kabupaten', '95914'),
(287, 31, 'Minahasa Tenggara', 'Kabupaten', '95995'),
(288, 31, 'Minahasa Utara', 'Kabupaten', '95316'),
(289, 11, 'Mojokerto', 'Kabupaten', '61382'),
(290, 11, 'Mojokerto', 'Kota', '61316'),
(291, 29, 'Morowali', 'Kabupaten', '94911'),
(292, 33, 'Muara Enim', 'Kabupaten', '31315'),
(293, 8, 'Muaro Jambi', 'Kabupaten', '36311'),
(294, 4, 'Muko Muko', 'Kabupaten', '38715'),
(295, 30, 'Muna', 'Kabupaten', '93611'),
(296, 14, 'Murung Raya', 'Kabupaten', '73911'),
(297, 33, 'Musi Banyuasin', 'Kabupaten', '30719'),
(298, 33, 'Musi Rawas', 'Kabupaten', '31661'),
(299, 24, 'Nabire', 'Kabupaten', '98816'),
(300, 21, 'Nagan Raya', 'Kabupaten', '23674'),
(301, 23, 'Nagekeo', 'Kabupaten', '86911'),
(302, 17, 'Natuna', 'Kabupaten', '29711'),
(303, 24, 'Nduga', 'Kabupaten', '99541'),
(304, 23, 'Ngada', 'Kabupaten', '86413'),
(305, 11, 'Nganjuk', 'Kabupaten', '64414'),
(306, 11, 'Ngawi', 'Kabupaten', '63219'),
(307, 34, 'Nias', 'Kabupaten', '22876'),
(308, 34, 'Nias Barat', 'Kabupaten', '22895'),
(309, 34, 'Nias Selatan', 'Kabupaten', '22865'),
(310, 34, 'Nias Utara', 'Kabupaten', '22856'),
(311, 16, 'Nunukan', 'Kabupaten', '77421'),
(312, 33, 'Ogan Ilir', 'Kabupaten', '30811'),
(313, 33, 'Ogan Komering Ilir', 'Kabupaten', '30618'),
(314, 33, 'Ogan Komering Ulu', 'Kabupaten', '32112'),
(315, 33, 'Ogan Komering Ulu Selatan', 'Kabupaten', '32211'),
(316, 33, 'Ogan Komering Ulu Timur', 'Kabupaten', '32312'),
(317, 11, 'Pacitan', 'Kabupaten', '63512'),
(318, 32, 'Padang', 'Kota', '25112'),
(319, 34, 'Padang Lawas', 'Kabupaten', '22763'),
(320, 34, 'Padang Lawas Utara', 'Kabupaten', '22753'),
(321, 32, 'Padang Panjang', 'Kota', '27122'),
(322, 32, 'Padang Pariaman', 'Kabupaten', '25583'),
(323, 34, 'Padang Sidempuan', 'Kota', '22727'),
(324, 33, 'Pagar Alam', 'Kota', '31512'),
(325, 34, 'Pakpak Bharat', 'Kabupaten', '22272'),
(326, 14, 'Palangka Raya', 'Kota', '73112'),
(327, 33, 'Palembang', 'Kota', '31512'),
(328, 28, 'Palopo', 'Kota', '91911'),
(329, 29, 'Palu', 'Kota', '94111'),
(330, 11, 'Pamekasan', 'Kabupaten', '69319'),
(331, 3, 'Pandeglang', 'Kabupaten', '42212'),
(332, 9, 'Pangandaran', 'Kabupaten', '46511'),
(333, 28, 'Pangkajene Kepulauan', 'Kabupaten', '90611'),
(334, 2, 'Pangkal Pinang', 'Kota', '33115'),
(335, 24, 'Paniai', 'Kabupaten', '98765'),
(336, 28, 'Parepare', 'Kota', '91123'),
(337, 32, 'Pariaman', 'Kota', '25511'),
(338, 29, 'Parigi Moutong', 'Kabupaten', '94411'),
(339, 32, 'Pasaman', 'Kabupaten', '26318'),
(340, 32, 'Pasaman Barat', 'Kabupaten', '26511'),
(341, 15, 'Paser', 'Kabupaten', '76211'),
(342, 11, 'Pasuruan', 'Kabupaten', '67153'),
(343, 11, 'Pasuruan', 'Kota', '67118'),
(344, 10, 'Pati', 'Kabupaten', '59114'),
(345, 32, 'Payakumbuh', 'Kota', '26213'),
(346, 25, 'Pegunungan Arfak', 'Kabupaten', '98354'),
(347, 24, 'Pegunungan Bintang', 'Kabupaten', '99573'),
(348, 10, 'Pekalongan', 'Kabupaten', '51161'),
(349, 10, 'Pekalongan', 'Kota', '51122'),
(350, 26, 'Pekanbaru', 'Kota', '28112'),
(351, 26, 'Pelalawan', 'Kabupaten', '28311'),
(352, 10, 'Pemalang', 'Kabupaten', '52319'),
(353, 34, 'Pematang Siantar', 'Kota', '21126'),
(354, 15, 'Penajam Paser Utara', 'Kabupaten', '76311'),
(355, 18, 'Pesawaran', 'Kabupaten', '35312'),
(356, 18, 'Pesisir Barat', 'Kabupaten', '35974'),
(357, 32, 'Pesisir Selatan', 'Kabupaten', '25611'),
(358, 21, 'Pidie', 'Kabupaten', '24116'),
(359, 21, 'Pidie Jaya', 'Kabupaten', '24186'),
(360, 28, 'Pinrang', 'Kabupaten', '91251'),
(361, 7, 'Pohuwato', 'Kabupaten', '96419'),
(362, 27, 'Polewali Mandar', 'Kabupaten', '91311'),
(363, 11, 'Ponorogo', 'Kabupaten', '63411'),
(364, 12, 'Pontianak', 'Kabupaten', '78971'),
(365, 12, 'Pontianak', 'Kota', '78112'),
(366, 29, 'Poso', 'Kabupaten', '94615'),
(367, 33, 'Prabumulih', 'Kota', '31121'),
(368, 18, 'Pringsewu', 'Kabupaten', '35719'),
(369, 11, 'Probolinggo', 'Kabupaten', '67282'),
(370, 11, 'Probolinggo', 'Kota', '67215'),
(371, 14, 'Pulang Pisau', 'Kabupaten', '74811'),
(372, 20, 'Pulau Morotai', 'Kabupaten', '97771'),
(373, 24, 'Puncak', 'Kabupaten', '98981'),
(374, 24, 'Puncak Jaya', 'Kabupaten', '98979'),
(375, 10, 'Purbalingga', 'Kabupaten', '53312'),
(376, 9, 'Purwakarta', 'Kabupaten', '41119'),
(377, 10, 'Purworejo', 'Kabupaten', '54111'),
(378, 25, 'Raja Ampat', 'Kabupaten', '98489'),
(379, 4, 'Rejang Lebong', 'Kabupaten', '39112'),
(380, 10, 'Rembang', 'Kabupaten', '59219'),
(381, 26, 'Rokan Hilir', 'Kabupaten', '28992'),
(382, 26, 'Rokan Hulu', 'Kabupaten', '28511'),
(383, 23, 'Rote Ndao', 'Kabupaten', '85982'),
(384, 21, 'Sabang', 'Kota', '23512'),
(385, 23, 'Sabu Raijua', 'Kabupaten', '85391'),
(386, 10, 'Salatiga', 'Kota', '50711'),
(387, 15, 'Samarinda', 'Kota', '75133'),
(388, 12, 'Sambas', 'Kabupaten', '79453'),
(389, 34, 'Samosir', 'Kabupaten', '22392'),
(390, 11, 'Sampang', 'Kabupaten', '69219'),
(391, 12, 'Sanggau', 'Kabupaten', '78557'),
(392, 24, 'Sarmi', 'Kabupaten', '99373'),
(393, 8, 'Sarolangun', 'Kabupaten', '37419'),
(394, 32, 'Sawah Lunto', 'Kota', '27416'),
(395, 12, 'Sekadau', 'Kabupaten', '79583'),
(396, 28, 'Selayar (Kepulauan Selayar)', 'Kabupaten', '92812'),
(397, 4, 'Seluma', 'Kabupaten', '38811'),
(398, 10, 'Semarang', 'Kabupaten', '50511'),
(399, 10, 'Semarang', 'Kota', '50135'),
(400, 19, 'Seram Bagian Barat', 'Kabupaten', '97561'),
(401, 19, 'Seram Bagian Timur', 'Kabupaten', '97581'),
(402, 3, 'Serang', 'Kabupaten', '42182'),
(403, 3, 'Serang', 'Kota', '42111'),
(404, 34, 'Serdang Bedagai', 'Kabupaten', '20915'),
(405, 14, 'Seruyan', 'Kabupaten', '74211'),
(406, 26, 'Siak', 'Kabupaten', '28623'),
(407, 34, 'Sibolga', 'Kota', '22522'),
(408, 28, 'Sidenreng Rappang/Rapang', 'Kabupaten', '91613'),
(409, 11, 'Sidoarjo', 'Kabupaten', '61219'),
(410, 29, 'Sigi', 'Kabupaten', '94364'),
(411, 32, 'Sijunjung (Sawah Lunto Sijunjung)', 'Kabupaten', '27511'),
(412, 23, 'Sikka', 'Kabupaten', '86121'),
(413, 34, 'Simalungun', 'Kabupaten', '21162'),
(414, 21, 'Simeulue', 'Kabupaten', '23891'),
(415, 12, 'Singkawang', 'Kota', '79117'),
(416, 28, 'Sinjai', 'Kabupaten', '92615'),
(417, 12, 'Sintang', 'Kabupaten', '78619'),
(418, 11, 'Situbondo', 'Kabupaten', '68316'),
(419, 5, 'Sleman', 'Kabupaten', '55513'),
(420, 32, 'Solok', 'Kabupaten', '27365'),
(421, 32, 'Solok', 'Kota', '27315'),
(422, 32, 'Solok Selatan', 'Kabupaten', '27779'),
(423, 28, 'Soppeng', 'Kabupaten', '90812'),
(424, 25, 'Sorong', 'Kabupaten', '98431'),
(425, 25, 'Sorong', 'Kota', '98411'),
(426, 25, 'Sorong Selatan', 'Kabupaten', '98454'),
(427, 10, 'Sragen', 'Kabupaten', '57211'),
(428, 9, 'Subang', 'Kabupaten', '41215'),
(429, 21, 'Subulussalam', 'Kota', '24882'),
(430, 9, 'Sukabumi', 'Kabupaten', '43311'),
(431, 9, 'Sukabumi', 'Kota', '43114'),
(432, 14, 'Sukamara', 'Kabupaten', '74712'),
(433, 10, 'Sukoharjo', 'Kabupaten', '57514'),
(434, 23, 'Sumba Barat', 'Kabupaten', '87219'),
(435, 23, 'Sumba Barat Daya', 'Kabupaten', '87453'),
(436, 23, 'Sumba Tengah', 'Kabupaten', '87358'),
(437, 23, 'Sumba Timur', 'Kabupaten', '87112'),
(438, 22, 'Sumbawa', 'Kabupaten', '84315'),
(439, 22, 'Sumbawa Barat', 'Kabupaten', '84419'),
(440, 9, 'Sumedang', 'Kabupaten', '45326'),
(441, 11, 'Sumenep', 'Kabupaten', '69413'),
(442, 8, 'Sungaipenuh', 'Kota', '37113'),
(443, 24, 'Supiori', 'Kabupaten', '98164'),
(444, 11, 'Surabaya', 'Kota', '60119'),
(445, 10, 'Surakarta (Solo)', 'Kota', '57113'),
(446, 13, 'Tabalong', 'Kabupaten', '71513'),
(447, 1, 'Tabanan', 'Kabupaten', '82119'),
(448, 28, 'Takalar', 'Kabupaten', '92212'),
(449, 25, 'Tambrauw', 'Kabupaten', '98475'),
(450, 16, 'Tana Tidung', 'Kabupaten', '77611'),
(451, 28, 'Tana Toraja', 'Kabupaten', '91819'),
(452, 13, 'Tanah Bumbu', 'Kabupaten', '72211'),
(453, 32, 'Tanah Datar', 'Kabupaten', '27211'),
(454, 13, 'Tanah Laut', 'Kabupaten', '70811'),
(455, 3, 'Tangerang', 'Kabupaten', '15914'),
(456, 3, 'Tangerang', 'Kota', '15111'),
(457, 3, 'Tangerang Selatan', 'Kota', '15332'),
(458, 18, 'Tanggamus', 'Kabupaten', '35619'),
(459, 34, 'Tanjung Balai', 'Kota', '21321'),
(460, 8, 'Tanjung Jabung Barat', 'Kabupaten', '36513'),
(461, 8, 'Tanjung Jabung Timur', 'Kabupaten', '36719'),
(462, 17, 'Tanjung Pinang', 'Kota', '29111'),
(463, 34, 'Tapanuli Selatan', 'Kabupaten', '22742'),
(464, 34, 'Tapanuli Tengah', 'Kabupaten', '22611'),
(465, 34, 'Tapanuli Utara', 'Kabupaten', '22414'),
(466, 13, 'Tapin', 'Kabupaten', '71119'),
(467, 16, 'Tarakan', 'Kota', '77114'),
(468, 9, 'Tasikmalaya', 'Kabupaten', '46411'),
(469, 9, 'Tasikmalaya', 'Kota', '46116'),
(470, 34, 'Tebing Tinggi', 'Kota', '20632'),
(471, 8, 'Tebo', 'Kabupaten', '37519'),
(472, 10, 'Tegal', 'Kabupaten', '52419'),
(473, 10, 'Tegal', 'Kota', '52114'),
(474, 25, 'Teluk Bintuni', 'Kabupaten', '98551'),
(475, 25, 'Teluk Wondama', 'Kabupaten', '98591'),
(476, 10, 'Temanggung', 'Kabupaten', '56212'),
(477, 20, 'Ternate', 'Kota', '97714'),
(478, 20, 'Tidore Kepulauan', 'Kota', '97815'),
(479, 23, 'Timor Tengah Selatan', 'Kabupaten', '85562'),
(480, 23, 'Timor Tengah Utara', 'Kabupaten', '85612'),
(481, 34, 'Toba Samosir', 'Kabupaten', '22316'),
(482, 29, 'Tojo Una-Una', 'Kabupaten', '94683'),
(483, 29, 'Toli-Toli', 'Kabupaten', '94542'),
(484, 24, 'Tolikara', 'Kabupaten', '99411'),
(485, 31, 'Tomohon', 'Kota', '95416'),
(486, 28, 'Toraja Utara', 'Kabupaten', '91831'),
(487, 11, 'Trenggalek', 'Kabupaten', '66312'),
(488, 19, 'Tual', 'Kota', '97612'),
(489, 11, 'Tuban', 'Kabupaten', '62319'),
(490, 18, 'Tulang Bawang', 'Kabupaten', '34613'),
(491, 18, 'Tulang Bawang Barat', 'Kabupaten', '34419'),
(492, 11, 'Tulungagung', 'Kabupaten', '66212'),
(493, 28, 'Wajo', 'Kabupaten', '90911'),
(494, 30, 'Wakatobi', 'Kabupaten', '93791'),
(495, 24, 'Waropen', 'Kabupaten', '98269'),
(496, 18, 'Way Kanan', 'Kabupaten', '34711'),
(497, 10, 'Wonogiri', 'Kabupaten', '57619'),
(498, 10, 'Wonosobo', 'Kabupaten', '56311'),
(499, 24, 'Yahukimo', 'Kabupaten', '99041'),
(500, 24, 'Yalimo', 'Kabupaten', '99481'),
(501, 5, 'Yogyakarta', 'Kota', '55222');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_04_082100_create_provinsi_table', 1),
(4, '2017_10_04_082153_create_kabupaten_table', 1),
(5, '2017_10_04_082225_create_categories_table', 1),
(6, '2017_10_04_082314_create_iklan_table', 1),
(7, '2017_10_04_082315_create_comment_table', 1),
(8, '2017_10_04_082330_create_foto_table', 1),
(9, '2017_10_04_082350_create_pesan_table', 1),
(10, '2017_10_04_082410_create_notification_table', 1),
(11, '2017_10_31_171630_create_features_table', 1),
(12, '2017_11_05_023556_create_belanja_table', 1),
(15, '2017_11_23_044517_create_poin_table', 1),
(16, '2017_11_28_042235_create_voucher_table', 1),
(17, '2017_11_05_023720_create_pembayaran_table', 2),
(18, '2017_11_23_042119_create_pengiriman_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notification`
--

CREATE TABLE `notification` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED DEFAULT NULL,
  `pesan_id` int(10) UNSIGNED DEFAULT NULL,
  `iklan_id` int(10) UNSIGNED DEFAULT NULL,
  `like_dislike` tinyint(1) DEFAULT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `comment_id`, `pesan_id`, `iklan_id`, `like_dislike`, `read`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, NULL, NULL, 1, '2017-12-08 14:18:38', '2017-12-08 14:18:47'),
(2, 1, NULL, 2, NULL, NULL, 1, '2017-12-08 14:18:41', '2017-12-08 14:18:52'),
(3, 3, NULL, 3, NULL, NULL, 1, '2017-12-08 14:20:10', '2017-12-08 14:20:17'),
(4, 1, NULL, 4, NULL, NULL, 1, '2017-12-08 14:20:10', '2017-12-08 20:13:08'),
(5, 3, NULL, 5, NULL, NULL, 1, '2017-12-08 15:00:07', '2017-12-08 15:00:17'),
(6, 1, NULL, 6, NULL, NULL, 1, '2017-12-08 15:00:07', '2017-12-08 20:13:12'),
(7, 3, NULL, 7, NULL, NULL, 1, '2017-12-08 19:58:18', '2017-12-08 19:58:30'),
(8, 1, NULL, 8, NULL, NULL, 1, '2017-12-08 19:58:19', '2017-12-08 20:13:14'),
(9, 3, NULL, 9, NULL, NULL, 1, '2017-12-08 20:11:57', '2017-12-08 20:12:04'),
(10, 1, NULL, 10, NULL, NULL, 1, '2017-12-08 20:11:57', '2017-12-08 20:13:15'),
(11, 3, NULL, 11, NULL, NULL, 1, '2017-12-09 00:07:54', '2017-12-09 00:08:02'),
(12, 1, NULL, 12, NULL, NULL, 0, '2017-12-09 00:07:54', '2017-12-09 00:07:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `harga_awal` decimal(13,2) NOT NULL,
  `total_harga` decimal(13,2) NOT NULL,
  `foto_transaksi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isVerified` tinyint(1) NOT NULL,
  `diskon` int(11) NOT NULL,
  `voucher` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `user_id`, `harga_awal`, `total_harga`, `foto_transaksi`, `isVerified`, `diskon`, `voucher`, `created_at`, `updated_at`) VALUES
(2, 3, '100000.00', '0.00', NULL, 1, 0, 150000, '2017-12-08 19:57:37', '2017-12-08 19:58:19'),
(3, 3, '500000.00', '515000.00', 'pembayaran/N2VgJQ0qyztJusSeKzO3NR9PJ312nl6wvdY7CX8f.jpeg', 1, 0, 0, '2017-12-08 20:11:07', '2017-12-08 20:11:57'),
(4, 3, '100000.00', '0.00', NULL, 1, 0, 150000, '2017-12-08 23:51:49', '2017-12-09 00:07:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pembayaran_id` int(10) UNSIGNED DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pengiriman` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi_id` int(10) UNSIGNED NOT NULL,
  `kabupaten_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `user_id`, `pembayaran_id`, `nama`, `alamat_pengiriman`, `nomor_telepon`, `provinsi_id`, `kabupaten_id`, `created_at`, `updated_at`) VALUES
(2, 3, 2, 'Gung Adi', 'Jalan Imam Bonjol', '081888222111', 1, 114, '2017-12-08 19:57:33', '2017-12-08 19:58:19'),
(3, 3, 3, 'Intan Pradinasari', 'Jalan Papa Kuning', '08333322255', 11, 256, '2017-12-08 20:10:57', '2017-12-08 20:11:57'),
(4, 1, NULL, 'Intan Pradinasari', 'Jalan Papa Kuning', '08333322255', 15, 89, '2017-12-08 22:36:54', '2017-12-08 22:36:54'),
(5, 3, 4, 'Intan Pradinasari', 'Jalan Papa Kuning', '081888222111', 9, 149, '2017-12-08 23:51:46', '2017-12-09 00:07:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `pengirim_id` int(10) UNSIGNED NOT NULL,
  `penerima_id` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`pengirim_id`, `penerima_id`, `id`, `jenis`, `isi`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'verifikasi iklan', 'Iklan yang anda buat dengan judul Sepatu Adidas, telah di verifikasi oleh admin \n            dan secara otomatis akan mulai dipasarkan di tokosebelah.com', '2017-12-08 14:18:38', '2017-12-08 14:18:38'),
(2, 1, 2, 'verifikasi iklan', 'Iklan yang anda buat dengan judul Jaket Pria, telah di verifikasi oleh admin \n            dan secara otomatis akan mulai dipasarkan di tokosebelah.com', '2017-12-08 14:18:41', '2017-12-08 14:18:41'),
(2, 3, 3, 'pembayaran', 'Pembayaran anda telah berhasil diproses, barang pembelian anda akan segera dikirimkan ke alamat anda dan estimasi lama pengiriman adalah 1-2 minggu.', '2017-12-08 14:20:10', '2017-12-08 14:20:10'),
(2, 1, 4, 'pembelian barang', 'Joni telah membeli barang anda dengan judul iklan Sepatu Adidas.', '2017-12-08 14:20:10', '2017-12-08 14:20:10'),
(2, 3, 5, 'pembayaran', 'Pembayaran anda telah berhasil diproses, barang pembelian anda akan segera dikirimkan ke alamat anda dan estimasi lama pengiriman adalah 1-2 minggu.', '2017-12-08 15:00:07', '2017-12-08 15:00:07'),
(2, 1, 6, 'pembelian barang', 'Joni telah membeli barang anda dengan judul iklan Jaket Pria.', '2017-12-08 15:00:07', '2017-12-08 15:00:07'),
(2, 3, 7, 'pembayaran', 'Pembayaran anda telah berhasil diproses, barang pembelian anda akan segera dikirimkan ke alamat anda dan estimasi lama pengiriman adalah 1-2 minggu.', '2017-12-08 19:58:18', '2017-12-08 19:58:18'),
(2, 1, 8, 'pembelian barang', 'Joni telah membeli barang anda dengan judul iklan Jaket Pria.', '2017-12-08 19:58:18', '2017-12-08 19:58:18'),
(2, 3, 9, 'pembayaran', 'Pembayaran anda telah berhasil diproses, barang pembelian anda akan segera dikirimkan ke alamat anda dan estimasi lama pengiriman adalah 1-2 minggu.', '2017-12-08 20:11:57', '2017-12-08 20:11:57'),
(2, 1, 10, 'pembelian barang', 'Joni telah membeli barang anda dengan judul iklan Sepatu Adidas.', '2017-12-08 20:11:57', '2017-12-08 20:11:57'),
(2, 3, 11, 'pembayaran', 'Pembayaran anda telah berhasil diproses, barang pembelian anda akan segera dikirimkan ke alamat anda dan estimasi lama pengiriman adalah 1-2 minggu.', '2017-12-09 00:07:54', '2017-12-09 00:07:54'),
(2, 1, 12, 'pembelian barang', 'Joni telah membeli barang anda dengan judul iklan Jaket Pria.', '2017-12-09 00:07:54', '2017-12-09 00:07:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poin`
--

CREATE TABLE `poin` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `poin` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `poin`
--

INSERT INTO `poin` (`id`, `user_id`, `poin`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2017-12-08 14:16:05', '2017-12-08 14:16:05'),
(2, 2, 0, '2017-12-08 14:16:19', '2017-12-08 14:16:19'),
(3, 3, 9015, '2017-12-08 14:19:17', '2017-12-08 23:51:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id` int(10) UNSIGNED NOT NULL,
  `provinsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id`, `provinsi`) VALUES
(1, 'Bali'),
(2, 'Bangka Belitung'),
(3, 'Banten'),
(4, 'Bengkulu'),
(5, 'DI Yogyakarta'),
(6, 'DKI Jakarta'),
(7, 'Gorontalo'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Selatan'),
(14, 'Kalimantan Tengah'),
(15, 'Kalimantan Timur'),
(16, 'Kalimantan Utara'),
(17, 'Kepulauan Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'Nanggroe Aceh Darussalam (NAD)'),
(22, 'Nusa Tenggara Barat (NTB)'),
(23, 'Nusa Tenggara Timur (NTT)'),
(24, 'Papua'),
(25, 'Papua Barat'),
(26, 'Riau'),
(27, 'Sulawesi Barat'),
(28, 'Sulawesi Selatan'),
(29, 'Sulawesi Tengah'),
(30, 'Sulawesi Tenggara'),
(31, 'Sulawesi Utara'),
(32, 'Sumatera Barat'),
(33, 'Sumatera Selatan'),
(34, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `ttl` date NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `deskripsi`, `ttl`, `foto`, `tipe`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'suastikaadinata', 'suastikaadinata@gmail.com', '$2y$10$RY4.ExbZFX6dKkYnu6u2/Od5oFhUeAeDy23AT1aHj0gsKOFweWeA.', NULL, '2017-12-13', NULL, 'user', 'K4nbpUA5tkIDdPNgd5ujAhseqsbsKZDg3iWnKBu7lGzM3RiYbqtKHQ58LcAN', '2017-12-08 14:16:05', '2017-12-08 14:16:05'),
(2, 'adinata', 'adinata@gmail.com', '$2y$10$eMatEJrpBH3q3gTGiGkAo.7SVcqUvPsUPY0IvNNem77BaXMzB6wd2', NULL, '2017-12-12', NULL, 'admin', NULL, '2017-12-08 14:16:19', '2017-12-08 14:16:19'),
(3, 'Joni', 'joni@gmail.com', '$2y$10$/3bkk8RL9yWNYkaACOUgyu34ijZ67fE.eRFRuSPpYAMbpHdkSyOVu', NULL, '2017-12-19', NULL, 'user', 'X41bURdaaYsrRcorgG6BGfsvveJIefK8HUyoMHIcnFNwyyKgOwwbYZh5Z1al', '2017-12-08 14:19:17', '2017-12-08 14:19:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voucher`
--

CREATE TABLE `voucher` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `tipe` int(11) NOT NULL,
  `poin` int(11) NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` decimal(13,2) NOT NULL,
  `pakai` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `belanja`
--
ALTER TABLE `belanja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `belanja_user_id_foreign` (`user_id`),
  ADD KEY `belanja_iklan_id_foreign` (`iklan_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_iklan_id_foreign` (`iklan_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `features_iklan_id_foreign` (`iklan_id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foto_iklan_id_foreign` (`iklan_id`);

--
-- Indexes for table `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iklan_user_id_foreign` (`user_id`),
  ADD KEY `iklan_kategori_id_foreign` (`kategori_id`),
  ADD KEY `iklan_provinsi_id_foreign` (`provinsi_id`),
  ADD KEY `iklan_kabupaten_id_foreign` (`kabupaten_id`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kabupaten_provinsi_id_foreign` (`provinsi_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_user_id_foreign` (`user_id`),
  ADD KEY `notification_comment_id_foreign` (`comment_id`),
  ADD KEY `notification_pesan_id_foreign` (`pesan_id`),
  ADD KEY `notification_iklan_id_foreign` (`iklan_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_user_id_foreign` (`user_id`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengiriman_user_id_foreign` (`user_id`),
  ADD KEY `pengiriman_pembayaran_id_foreign` (`pembayaran_id`),
  ADD KEY `pengiriman_provinsi_id_foreign` (`provinsi_id`),
  ADD KEY `pengiriman_kabupaten_id_foreign` (`kabupaten_id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesan_pengirim_id_foreign` (`pengirim_id`),
  ADD KEY `pesan_penerima_id_foreign` (`penerima_id`);

--
-- Indexes for table `poin`
--
ALTER TABLE `poin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poin_user_id_foreign` (`user_id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voucher_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `belanja`
--
ALTER TABLE `belanja`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `iklan`
--
ALTER TABLE `iklan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `poin`
--
ALTER TABLE `poin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `belanja`
--
ALTER TABLE `belanja`
  ADD CONSTRAINT `belanja_iklan_id_foreign` FOREIGN KEY (`iklan_id`) REFERENCES `iklan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `belanja_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_iklan_id_foreign` FOREIGN KEY (`iklan_id`) REFERENCES `iklan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `features`
--
ALTER TABLE `features`
  ADD CONSTRAINT `features_iklan_id_foreign` FOREIGN KEY (`iklan_id`) REFERENCES `iklan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_iklan_id_foreign` FOREIGN KEY (`iklan_id`) REFERENCES `iklan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `iklan`
--
ALTER TABLE `iklan`
  ADD CONSTRAINT `iklan_kabupaten_id_foreign` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupaten` (`id`),
  ADD CONSTRAINT `iklan_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `iklan_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`id`),
  ADD CONSTRAINT `iklan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD CONSTRAINT `kabupaten_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`id`);

--
-- Ketidakleluasaan untuk tabel `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notification_iklan_id_foreign` FOREIGN KEY (`iklan_id`) REFERENCES `iklan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notification_pesan_id_foreign` FOREIGN KEY (`pesan_id`) REFERENCES `pesan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notification_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_kabupaten_id_foreign` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupaten` (`id`),
  ADD CONSTRAINT `pengiriman_pembayaran_id_foreign` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayaran` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengiriman_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`id`),
  ADD CONSTRAINT `pengiriman_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_penerima_id_foreign` FOREIGN KEY (`penerima_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesan_pengirim_id_foreign` FOREIGN KEY (`pengirim_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `poin`
--
ALTER TABLE `poin`
  ADD CONSTRAINT `poin_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `voucher`
--
ALTER TABLE `voucher`
  ADD CONSTRAINT `voucher_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
