-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2026 at 01:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bgtk_monev`
--

-- --------------------------------------------------------

--
-- Table structure for table `bcks_jawaban`
--

CREATE TABLE `bcks_jawaban` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bcks_pengisian_id` bigint(20) UNSIGNED NOT NULL,
  `nomor_indikator` tinyint(3) UNSIGNED NOT NULL,
  `level` enum('Reaction','Learning','Behavior','Results') NOT NULL,
  `skor` tinyint(3) UNSIGNED NOT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bcks_jawaban`
--

INSERT INTO `bcks_jawaban` (`id`, `bcks_pengisian_id`, `nomor_indikator`, `level`, `skor`, `catatan`, `created_at`, `updated_at`) VALUES
(571, 21, 9, 'Behavior', 4, NULL, '2026-10-21 07:30:21', '2026-10-21 07:30:21'),
(572, 21, 10, 'Behavior', 4, NULL, '2026-10-21 07:30:21', '2026-10-21 07:30:21'),
(573, 21, 11, 'Behavior', 4, NULL, '2026-10-21 07:30:21', '2026-10-21 07:30:21'),
(574, 21, 12, 'Behavior', 4, NULL, '2026-10-21 07:30:21', '2026-10-21 07:30:21'),
(575, 21, 13, 'Behavior', 4, NULL, '2026-10-21 07:30:21', '2026-10-21 07:30:21'),
(576, 21, 14, 'Behavior', 4, NULL, '2026-10-21 07:30:21', '2026-10-21 07:30:21'),
(577, 21, 15, 'Behavior', 3, NULL, '2026-10-21 07:30:21', '2026-10-21 07:30:21'),
(578, 21, 16, 'Behavior', 2, NULL, '2026-10-21 07:30:21', '2026-10-21 07:30:21'),
(579, 21, 17, 'Behavior', 4, NULL, '2026-10-21 07:30:21', '2026-10-21 07:30:21'),
(580, 21, 18, 'Behavior', 4, NULL, '2026-10-21 07:30:21', '2026-10-21 07:30:21'),
(581, 21, 19, 'Behavior', 4, NULL, '2026-10-21 07:30:21', '2026-10-21 07:30:21'),
(582, 21, 20, 'Behavior', 4, NULL, '2026-10-21 07:30:21', '2026-10-21 07:30:21'),
(583, 21, 21, 'Results', 3, NULL, '2026-10-21 07:30:21', '2026-10-21 07:30:21'),
(584, 21, 22, 'Results', 2, NULL, '2026-10-21 07:30:21', '2026-10-21 07:30:21'),
(585, 21, 23, 'Results', 3, NULL, '2026-10-21 07:30:21', '2026-10-21 07:30:21'),
(586, 21, 24, 'Results', 3, NULL, '2026-10-21 07:30:21', '2026-10-21 07:30:21'),
(587, 21, 25, 'Results', 4, NULL, '2026-10-21 07:30:21', '2026-10-21 07:30:21'),
(588, 21, 26, 'Results', 3, NULL, '2026-10-21 07:30:21', '2026-10-21 07:30:21'),
(589, 21, 27, 'Results', 3, NULL, '2026-10-21 07:30:21', '2026-10-21 07:30:21'),
(590, 20, 1, 'Reaction', 1, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(591, 20, 2, 'Reaction', 2, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(592, 20, 3, 'Reaction', 3, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(593, 20, 4, 'Reaction', 4, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(594, 20, 5, 'Learning', 2, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(595, 20, 6, 'Learning', 2, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(596, 20, 7, 'Learning', 3, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(597, 20, 8, 'Learning', 3, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(598, 20, 9, 'Behavior', 1, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(599, 20, 10, 'Behavior', 1, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(600, 20, 11, 'Behavior', 2, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(601, 20, 12, 'Behavior', 3, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(602, 20, 13, 'Behavior', 3, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(603, 20, 14, 'Behavior', 3, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(604, 20, 15, 'Behavior', 3, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(605, 20, 16, 'Behavior', 4, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(606, 20, 17, 'Behavior', 3, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(607, 20, 18, 'Behavior', 3, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(608, 20, 19, 'Behavior', 2, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(609, 20, 20, 'Behavior', 2, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(610, 20, 21, 'Results', 2, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(611, 20, 22, 'Results', 3, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(612, 20, 23, 'Results', 4, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(613, 20, 24, 'Results', 4, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(614, 20, 25, 'Results', 4, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(615, 20, 26, 'Results', 4, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(616, 20, 27, 'Results', 3, NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `bcks_pengisians`
--

CREATE TABLE `bcks_pengisians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_bcks` varchar(255) NOT NULL,
  `unit_kerja` varchar(255) DEFAULT NULL,
  `angkatan_pelatihan` varchar(255) DEFAULT NULL,
  `nama_responden` varchar(255) NOT NULL,
  `unit_kerja_responden` varchar(255) DEFAULT NULL,
  `status_responden` enum('BCKS','Atasan Langsung / Pengawas Sekolah','Perwakilan Guru / Tenaga Kependidikan') NOT NULL,
  `nama_petugas_monev` varchar(255) NOT NULL,
  `unit_kerja_petugas` varchar(255) DEFAULT NULL,
  `tanggal_evaluasi` date NOT NULL,
  `total_skor` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `nilai_akhir` decimal(5,2) NOT NULL DEFAULT 0.00,
  `predikat` enum('Sangat Baik','Baik','Cukup','Perlu Pembinaan') DEFAULT NULL,
  `dampak_implementasi_rptks` text DEFAULT NULL,
  `kendala_strategi_mitigasi` text DEFAULT NULL,
  `perubahan_pengambilan_keputusan` text DEFAULT NULL,
  `dukungan_lingkungan_sekolah` text DEFAULT NULL,
  `keberlanjutan_program_inovasi` text DEFAULT NULL,
  `status_pengisian` enum('Draft','Selesai') NOT NULL DEFAULT 'Draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bcks_pengisians`
--

INSERT INTO `bcks_pengisians` (`id`, `nama_bcks`, `unit_kerja`, `angkatan_pelatihan`, `nama_responden`, `unit_kerja_responden`, `status_responden`, `nama_petugas_monev`, `unit_kerja_petugas`, `tanggal_evaluasi`, `total_skor`, `nilai_akhir`, `predikat`, `dampak_implementasi_rptks`, `kendala_strategi_mitigasi`, `perubahan_pengambilan_keputusan`, `dukungan_lingkungan_sekolah`, `keberlanjutan_program_inovasi`, `status_pengisian`, `created_at`, `updated_at`, `sekolah_id`) VALUES
(20, 'Nabil', 'SMAN 1 Selong', '3', 'Nabil', 'SMAN 1 Selong', 'BCKS', 'Hisbullah', 'BGTK NTB', '2026-10-20', 74, 68.52, 'Cukup', NULL, NULL, NULL, NULL, NULL, 'Selesai', '2026-10-20 04:15:42', '2026-10-21 07:30:29', 43),
(21, 'Sahrul', 'SMAN 1 Dompu', '3', 'Sahrul', 'SMAN 1 Dompu', 'Perwakilan Guru / Tenaga Kependidikan', 'Hisbullah', 'BGTK NTB', '2026-10-20', 66, 86.84, 'Sangat Baik', NULL, NULL, NULL, NULL, NULL, 'Selesai', '2026-10-20 04:17:27', '2026-10-21 07:30:21', 42);

-- --------------------------------------------------------

--
-- Table structure for table `bk_answers`
--

CREATE TABLE `bk_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bk_submission_id` bigint(20) UNSIGNED NOT NULL,
  `bk_question_id` bigint(20) UNSIGNED NOT NULL,
  `jawaban` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bk_answers`
--

INSERT INTO `bk_answers` (`id`, `bk_submission_id`, `bk_question_id`, `jawaban`, `created_at`, `updated_at`) VALUES
(695, 12, 66, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(696, 12, 67, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(697, 12, 68, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(698, 12, 69, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(699, 12, 70, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(700, 12, 71, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(701, 12, 72, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(702, 12, 73, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(703, 12, 74, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(704, 12, 75, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(705, 12, 21, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(706, 12, 22, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(707, 12, 23, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(708, 12, 24, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(709, 12, 25, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(710, 12, 26, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(711, 12, 27, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(712, 12, 28, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(713, 12, 29, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(714, 12, 30, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(715, 12, 31, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(716, 12, 32, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(717, 12, 33, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(718, 12, 34, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(719, 12, 76, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(720, 12, 77, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(721, 12, 38, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(722, 12, 39, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(723, 12, 40, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(724, 12, 41, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(725, 12, 42, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(726, 12, 43, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(727, 12, 44, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(728, 12, 45, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(729, 12, 78, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(730, 12, 79, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(731, 12, 80, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(732, 12, 81, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(733, 12, 82, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(734, 12, 48, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(735, 12, 83, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(736, 12, 84, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(737, 12, 85, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(738, 12, 86, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(739, 12, 87, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(740, 12, 88, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(741, 12, 89, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(742, 12, 90, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(743, 12, 91, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(744, 12, 92, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(745, 12, 93, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(746, 12, 94, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(747, 12, 95, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(748, 12, 96, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(749, 12, 97, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(750, 12, 98, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(751, 12, 99, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(752, 12, 100, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(753, 12, 101, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(754, 12, 102, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(755, 12, 103, 1, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(756, 12, 104, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(757, 12, 105, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(758, 12, 106, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(759, 12, 107, 0, '2026-10-20 05:12:07', '2026-10-20 05:12:07'),
(848, 15, 32, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(849, 15, 33, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(850, 15, 34, 0, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(851, 15, 76, 0, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(852, 15, 77, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(853, 15, 38, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(854, 15, 39, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(855, 15, 40, 0, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(856, 15, 41, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(857, 15, 42, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(858, 15, 43, 0, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(859, 15, 44, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(860, 15, 45, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(861, 15, 78, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(862, 15, 79, 0, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(863, 15, 80, 0, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(864, 15, 81, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(865, 15, 82, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(866, 15, 48, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(867, 15, 83, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(868, 15, 84, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(869, 15, 85, 0, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(870, 15, 86, 0, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(871, 15, 87, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(872, 15, 88, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(873, 15, 89, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(874, 15, 90, 0, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(875, 15, 91, 0, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(876, 15, 92, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(877, 15, 93, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(878, 15, 94, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(879, 15, 95, 0, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(880, 15, 96, 0, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(881, 15, 97, 0, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(882, 15, 98, 0, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(883, 15, 99, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(884, 15, 100, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(885, 15, 101, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(886, 15, 102, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(887, 15, 103, 0, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(888, 15, 104, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(889, 15, 105, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(890, 15, 106, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57'),
(891, 15, 107, 1, '2026-10-20 06:19:57', '2026-10-20 06:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `bk_essay_answers`
--

CREATE TABLE `bk_essay_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bk_submission_id` bigint(20) UNSIGNED NOT NULL,
  `nomor` tinyint(3) UNSIGNED NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bk_questions`
--

CREATE TABLE `bk_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` tinyint(3) UNSIGNED NOT NULL,
  `level_nama` varchar(255) NOT NULL,
  `bagian` varchar(255) NOT NULL,
  `judul_bagian` varchar(255) NOT NULL,
  `nomor` tinyint(3) UNSIGNED NOT NULL,
  `pernyataan` text NOT NULL,
  `urutan` smallint(5) UNSIGNED NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bk_questions`
--

INSERT INTO `bk_questions` (`id`, `level`, `level_nama`, `bagian`, `judul_bagian`, `nomor`, `pernyataan`, `urutan`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 1, 'Reaksi (Reaction)', 'A', 'Iklim Kelas', 1, 'Siswa merasa aman dan nyaman dalam mengungkapkan pendapat atau pertanyaan tanpa takut dihakimi oleh guru atau teman sekelas.', 1, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(2, 1, 'Reaksi (Reaction)', 'A', 'Iklim Kelas', 2, 'Tidak ada kasus bullying, intimidasi, atau kekerasan verbal/fisik di dalam kelas', 2, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(3, 1, 'Reaksi (Reaction)', 'A', 'Iklim Kelas', 3, 'Siswa memahami dan mematuhi aturan kelas yang disepakati bersama untuk menciptakan lingkungan yang tertib dan aman.', 3, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(4, 1, 'Reaksi (Reaction)', 'A', 'Iklim Kelas', 4, 'Guru merespons dengan cepat dan adil terhadap konflik atau ketidaknyamanan yang muncul di antara siswa.', 4, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(5, 1, 'Reaksi (Reaction)', 'A', 'Iklim Kelas', 5, 'Siswa merasa dilindungi dan didukung oleh guru dan teman sekelas dalam situasi apa pun', 5, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(6, 1, 'Reaksi (Reaction)', 'B', 'Suasana Kelas Menyenangkan', 1, 'Siswa antusias dan termotivasi untuk hadir dan berpartisipasi aktif dalam pembelajaran.', 6, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(7, 1, 'Reaksi (Reaction)', 'B', 'Suasana Kelas Menyenangkan', 2, 'Pembelajaran dirancang dengan metode yang kreatif dan interaktif (misalnya permainan, proyek, atau diskusi kelompok).', 7, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(8, 1, 'Reaksi (Reaction)', 'B', 'Suasana Kelas Menyenangkan', 3, 'Suasana kelas penuh dengan tawa, semangat, dan energi positif tanpa tekanan berlebihan.', 8, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(9, 1, 'Reaksi (Reaction)', 'B', 'Suasana Kelas Menyenangkan', 4, 'Siswa merasa dihargai dan diterima apa adanya sehingga mereka lebih percaya diri.', 9, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(10, 1, 'Reaksi (Reaction)', 'B', 'Suasana Kelas Menyenangkan', 5, 'Guru menggunakan humor dan pendekatan yang ramah untuk mengurangi kecemasan siswa', 10, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(11, 1, 'Reaksi (Reaction)', 'C', 'Layanan Pembelajaran', 1, 'Siswa merasa materi pembelajaran yang disampaikan guru mudah dipahami dan relevan dengan kebutuhan.', 11, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(12, 1, 'Reaksi (Reaction)', 'C', 'Layanan Pembelajaran', 2, 'Metode pembelajaran yang digunakan guru (misalnya diskusi, proyek, atau media digital) membuat siswa lebih tertarik untuk belajar.', 12, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(13, 1, 'Reaksi (Reaction)', 'C', 'Layanan Pembelajaran', 3, 'Siswa mendapatkan umpan balik yang jelas dan bermanfaat dari guru setelah mengerjakan tugas atau ujian.', 13, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(14, 1, 'Reaksi (Reaction)', 'C', 'Layanan Pembelajaran', 4, 'Guru memberikan kesempatan kepada siswa untuk bertanya atau mengungkapkan pendapat selama pembelajaran.', 14, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(15, 1, 'Reaksi (Reaction)', 'C', 'Layanan Pembelajaran', 5, 'Pembelajaran di kelas membantu siswa mengembangkan keterampilan yang berguna untuk masa depan (misalnya berpikir kritis, kolaborasi', 15, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(16, 1, 'Reaksi (Reaction)', 'D', 'Pembimbingan', 1, 'Siswa merasa didukung oleh guru dalam mengatasi kesulitan belajar atau masalah pribadi.', 16, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(17, 1, 'Reaksi (Reaction)', 'D', 'Pembimbingan', 2, 'Guru memberikan bimbingan yang jelas tentang cara meningkatkan prestasi akademik atau keterampilan sosial siswa.', 17, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(18, 1, 'Reaksi (Reaction)', 'D', 'Pembimbingan', 3, 'Siswa merasa nyaman untuk curhat atau meminta nasihat kepada guru tanpa takut dihakimi.', 18, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(19, 1, 'Reaksi (Reaction)', 'D', 'Pembimbingan', 4, 'Guru membantu ssiswa mengenali potensi diri dan merencanakan langkah-langkah untuk mencapainya.', 19, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(20, 1, 'Reaksi (Reaction)', 'D', 'Pembimbingan', 5, 'Pembimbingan yang siswa terima membuat lebih percaya diri dan termotivasi untuk belajar', 20, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(21, 2, 'Pembelajaran (Learning)', 'A', 'Kualitas Penerapan Layanan BK', 1, 'Siswa menunjukkan peningkatan pemahaman tentang nilai-nilai kehidupan (seperti integritas, empati, dan tanggung jawab) setelah mengikuti layanan BK.', 11, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(22, 2, 'Pembelajaran (Learning)', 'A', 'Kualitas Penerapan Layanan BK', 2, 'Penurunan kasus masalah sosial dan emosional di sekolah (misalnya bullying, konflik antar-siswa) karena intervensi layanan BK yang efektif.', 12, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(23, 2, 'Pembelajaran (Learning)', 'A', 'Kualitas Penerapan Layanan BK', 3, 'Siswa lebih aktif mencari bantuan untuk masalah akademik maupun non-akademik melalui layanan BK.', 13, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(24, 2, 'Pembelajaran (Learning)', 'A', 'Kualitas Penerapan Layanan BK', 4, 'Guru BK lebih terampil dalam menggunakan metode konseling yang variatif (misalnya pendekatan CBT, solution-focused).', 14, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(25, 2, 'Pembelajaran (Learning)', 'A', 'Kualitas Penerapan Layanan BK', 5, 'Layanan BK terintegrasi dengan program sekolah (misalnya pengembangan karakter, anti-bullying)', 15, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(26, 2, 'Pembelajaran (Learning)', 'B', 'Kinerja Guru BK Selama OJL', 1, 'Mampu menyusun RPL yang jelas dan terstruktur untuk mencapai tujuan pembinaan karakter positif siswa.', 16, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(27, 2, 'Pembelajaran (Learning)', 'B', 'Kinerja Guru BK Selama OJL', 2, 'RPL yang disusun mencakup aspek pengembangan pribadi, sosial, belajar, dan karir siswa secara seimbang.', 17, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(28, 2, 'Pembelajaran (Learning)', 'B', 'Kinerja Guru BK Selama OJL', 3, 'Melibatkan data kebutuhan siswa (misalnya, hasil asesmen, masukan guru/orang tua) dalam menyusun RPL.', 18, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(29, 2, 'Pembelajaran (Learning)', 'B', 'Kinerja Guru BK Selama OJL', 4, 'Menetapkan indikator keberhasilan yang terukur dalam RPL untuk mengevaluasi dampak layanan BK.', 19, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(30, 2, 'Pembelajaran (Learning)', 'B', 'Kinerja Guru BK Selama OJL', 5, 'Menyusun RPL dengan mempertimbangkan keragaman latar belakang dan kebutuhan siswa.', 20, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(31, 2, 'Pembelajaran (Learning)', 'B', 'Kinerja Guru BK Selama OJL', 6, 'Berkolaborasi dengan guru BK ketika menemukan siswa yang memerlukan pendampingan lebih intensif terkait masalah pribadi atau sosial', 21, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(32, 3, 'Behavior', 'A', 'Keterampilan Guru BK', 1, 'Mampu merancang program BK yang efektif untuk membina karakter positif siswa.', 22, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(33, 3, 'Behavior', 'A', 'Keterampilan Guru BK', 2, 'Terampil dalam menggunakan teknik konseling (misalnya, refleksi, pertanyaan terbuka) untuk membantu siswa mengatasi masalah pribadi.', 23, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(34, 3, 'Behavior', 'A', 'Keterampilan Guru BK', 3, 'Aktif membimbing siswa dalam mengembangkan keterampilan sosial, seperti kerja sama dan komunikasi.', 24, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(35, 3, 'Behavior', 'A', 'Keterampilan Guru BK', 4, 'Memberikan pendampingan yang tepat untuk meningkatkan motivasi belajar siswa.', 35, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(36, 3, 'Behavior', 'A', 'Keterampilan Guru BK', 6, 'Mampu mengevaluasi perkembangan siswa setelah mengikuti program BK dan memberikan tindak lanjut yang sesuai.', 36, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(37, 3, 'Behavior', 'A', 'Keterampilan Guru BK', 7, 'Mampu berkolaborasi dengan guru, orang tua, dan pihak terkait untuk mendukung perkembangan siswa secara holistik', 37, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(38, 3, 'Behavior', 'B', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 1, 'Pembelajaran di kelas lebih bernuansa pengembangan diri (misalnya refleksi nilai-nilai kehidupan, diskusi kasus).', 27, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(39, 3, 'Behavior', 'B', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 2, 'Siswa mampu mengaitkan materi pembelajaran dengan aplikasi kehidupan nyata (misalnya keterampilan problem-solving).', 28, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(40, 3, 'Behavior', 'B', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 3, 'Guru menggunakan asesmen yang mencakup aspek sikap dan sosial (tidak hanya kognitif).', 29, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(41, 3, 'Behavior', 'B', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 4, 'Pembelajaran kolaboratif mendorong siswa untuk saling menghargai dan bekerja sama.', 30, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(42, 3, 'Behavior', 'B', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 5, 'Siswa lebih termotivasi untuk belajar karena merasa dipahami dan dihargai sebagai individu', 31, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(43, 3, 'Behavior', 'C', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 1, 'Pembelajaran di kelas lebih bernuansa pengembangan diri (misalnya refleksi nilai-nilai kehidupan, diskusi kasus).', 32, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(44, 3, 'Behavior', 'C', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 2, 'Siswa mampu mengaitkan materi pembelajaran dengan aplikasi kehidupan nyata (misalnya keterampilan problem-solving).', 33, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(45, 3, 'Behavior', 'C', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 3, 'Guru menggunakan asesmen yang mencakup aspek sikap dan sosial (tidak hanya kognitif).', 34, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(46, 3, 'Behavior', 'C', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 4, 'Pembelajaran kolaboratif mendorong siswa untuk saling menghargai dan bekerja sama.', 46, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(47, 3, 'Behavior', 'C', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 5, 'Siswa lebih termotivasi untuk belajar karena merasa dipahami dan dihargai sebagai individu', 47, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(48, 4, 'Hasil (Result)', 'A', 'Pengetahuan Guru BK', 1, 'Memahami implementasi 7 Jurus BK Hebat dalam Layanan BK', 40, 1, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(49, 4, 'Hasil (Result)', 'A', 'Pengetahuan Guru BK', 2, 'Memahami dengan jelas tujuan layanan BK dalam membina karakter positif siswa.', 49, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(50, 4, 'Hasil (Result)', 'A', 'Pengetahuan Guru BK', 3, 'Layanan BK yang dilakukan mencakup pengembangan pribadi, sosial, belajar, dan karir siswa secara seimbang.', 50, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(51, 4, 'Hasil (Result)', 'A', 'Pengetahuan Guru BK', 4, 'Menggunakan metode kreatif (misalnya, role-play, diskusi kelompok) untuk membangun karakter positif siswa.', 51, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(52, 4, 'Hasil (Result)', 'A', 'Pengetahuan Guru BK', 5, 'Mampu membantu siswa mengenali potensi diri dan mengatasi masalah pribadi melalui layanan BK.', 52, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(53, 4, 'Hasil (Result)', 'A', 'Pengetahuan Guru BK', 6, 'Aktif memandu siswa dalam mengeksplorasi minat dan bakat untuk perencanaan karir.', 53, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(54, 4, 'Hasil (Result)', 'B', 'Sikap Guru BK', 1, 'Mampu mengenali perubahan emosi atau perilaku siswa selama sesi konseling.', 54, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(55, 4, 'Hasil (Result)', 'B', 'Sikap Guru BK', 2, 'Menunjukkan sikap empati (misalnya, mendengarkan aktif, merespons dengan hangat) saat siswa bercerita tentang masalahnya.', 55, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(56, 4, 'Hasil (Result)', 'B', 'Sikap Guru BK', 3, 'Peka terhadap dinamika kelompok saat melakukan konseling kelompok atau kelas.', 56, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(57, 4, 'Hasil (Result)', 'B', 'Sikap Guru BK', 4, 'Menyesuaikan pendekatan konseling berdasarkan kebutuhan dan respons siswa.', 57, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(58, 4, 'Hasil (Result)', 'B', 'Sikap Guru BK', 5, 'Memberikan ruang aman bagi siswa untuk mengekspresikan perasaan atau pikiran mereka tanpa takut dihakimi.', 58, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(59, 4, 'Hasil (Result)', 'B', 'Sikap Guru BK', 6, 'Memperhatikan tanda-tanda nonverbal (ekspresi wajah, bahasa tubuh) siswa untuk memahami kondisi mereka', 59, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(60, 4, 'Hasil (Result)', 'C', 'Sikap Perubahan Positif dalam Pendekatan ke Murid', 1, 'Pendekatan terhadap siswa menjadi lebih personal dan memahami kebutuhan mereka.', 60, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(61, 4, 'Hasil (Result)', 'C', 'Sikap Perubahan Positif dalam Pendekatan ke Murid', 2, 'Lebih sering menggunakan teknik komunikasi yang mendorong keterbukaan siswa (misalnya, pertanyaan terbuka, refleksi).', 61, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(62, 4, 'Hasil (Result)', 'C', 'Sikap Perubahan Positif dalam Pendekatan ke Murid', 3, 'Adanya peningkatan keterlibatan siswa dalam proses pembelajaran atau konseling setelah perubahan pendekatan.', 62, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(63, 4, 'Hasil (Result)', 'C', 'Sikap Perubahan Positif dalam Pendekatan ke Murid', 4, 'Lebih peka dalam mengenali tanda-tanda stres atau masalah emosional pada siswa.', 63, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(64, 4, 'Hasil (Result)', 'C', 'Sikap Perubahan Positif dalam Pendekatan ke Murid', 5, 'Siswa terlihat lebih nyaman dan percaya diri saat berinteraksi dengan guru.', 64, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(65, 4, 'Hasil (Result)', 'C', 'Sikap Perubahan Positif dalam Pendekatan ke Murid', 6, 'Menerima umpan balik positif dari siswa atau rekan sejawat tentang pendekatan yang lebih empatik.', 65, 0, '2026-10-07 17:01:36', '2026-10-11 16:50:51'),
(66, 1, 'Reaksi (Reaction)', 'A', 'Materi Pelatihan', 1, 'Materi pelatihan 7 Jurus BK Hebat sesuai dengan tujuan pelatihan.', 1, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(67, 1, 'Reaksi (Reaction)', 'A', 'Materi Pelatihan', 2, 'Materi yang disampaikan sesuai dengan kebutuhan dan tugas guru BK.', 2, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(68, 1, 'Reaksi (Reaction)', 'A', 'Materi Pelatihan', 3, 'Bahan/modul pembelajaran yang diberikan membantu saya memahami 7 Jurus BK Hebat.', 3, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(69, 1, 'Reaksi (Reaction)', 'B', 'Fasilitator Pelatihan', 1, 'Fasilitator menguasai materi 7 Jurus BK Hebat yang disampaikan.', 4, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(70, 1, 'Reaksi (Reaction)', 'B', 'Fasilitator Pelatihan', 2, 'Fasilitator menyampaikan materi secara sistematis dan mudah dipahami.', 5, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(71, 1, 'Reaksi (Reaction)', 'B', 'Fasilitator Pelatihan', 3, 'Fasilitator mampu membangun suasana pembelajaran yang aktif dan menyenangkan', 6, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(72, 1, 'Reaksi (Reaction)', 'C', 'LMS Pelatihan', 1, 'Petunjuk penggunaan LMS mudah dipahami.', 7, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(73, 1, 'Reaksi (Reaction)', 'C', 'LMS Pelatihan', 2, 'Kendala teknis dalam penggunaan LMS dapat ditangani dengan baik oleh admin/pengelola', 8, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(74, 1, 'Reaksi (Reaction)', 'D', 'Kepanitiaan', 1, 'Sarana dan prasarana pada pelaksanaan luring mendukung proses pembelajaran.', 9, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(75, 1, 'Reaksi (Reaction)', 'D', 'Kepanitiaan', 2, 'Panitia/pengelola memberikan informasi dan layanan yang dibutuhkan peserta dengan baik.', 10, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(76, 3, 'Behavior', 'A', 'Keterampilan Guru BK', 5, 'Mampu mengevaluasi perkembangan siswa setelah mengikuti program BK dan memberikan tindak lanjut yang sesuai.', 25, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(77, 3, 'Behavior', 'A', 'Keterampilan Guru BK', 6, 'Mampu berkolaborasi dengan guru, orang tua, dan pihak terkait untuk mendukung perkembangan siswa secara holistik', 26, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(78, 3, 'Behavior', 'C', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 4, 'Siswa lebih termotivasi untuk belajar karena merasa dipahami dan dihargai sebagai individu', 35, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(79, 3, 'Behavior', 'D', 'Sikap Guru BK', 1, 'Mampu mengenali perubahan emosi atau perilaku siswa selama sesi konseling.', 36, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(80, 3, 'Behavior', 'D', 'Sikap Guru BK', 2, 'Menunjukkan sikap empati (misalnya, mendengarkan aktif, merespons dengan hangat) saat siswa bercerita tentang masalahnya.', 37, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(81, 3, 'Behavior', 'D', 'Sikap Guru BK', 3, 'Menyesuaikan pendekatan konseling berdasarkan kebutuhan dan respons siswa.', 38, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(82, 3, 'Behavior', 'D', 'Sikap Guru BK', 4, 'Memberikan ruang aman bagi siswa untuk mengekspresikan perasaan atau pikiran mereka tanpa takut dihakimi.', 39, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(83, 4, 'Hasil (Result)', 'A', 'Pengetahuan Guru BK', 2, 'Layanan BK yang dilakukan mencakup pengembangan pribadi, sosial, belajar, dan karir siswa secara seimbang.', 41, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(84, 4, 'Hasil (Result)', 'A', 'Pengetahuan Guru BK', 3, 'Menggunakan metode kreatif (misalnya, role-play, diskusi kelompok) untuk membangun karakter positif siswa.', 42, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(85, 4, 'Hasil (Result)', 'A', 'Pengetahuan Guru BK', 4, 'Mampu membantu siswa mengenali potensi diri dan mengatasi masalah pribadi melalui layanan BK.', 43, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(86, 4, 'Hasil (Result)', 'A', 'Pengetahuan Guru BK', 5, 'Aktif memandu siswa dalam mengeksplorasi minat dan bakat untuk perencanaan karir.', 44, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(87, 4, 'Hasil (Result)', 'B', 'Sikap Perubahan Positif dalam Pendekatan ke Murid', 1, 'Pendekatan terhadap siswa menjadi lebih personal dan memahami kebutuhan mereka.', 45, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(88, 4, 'Hasil (Result)', 'B', 'Sikap Perubahan Positif dalam Pendekatan ke Murid', 2, 'Lebih sering menggunakan teknik komunikasi yang mendorong keterbukaan siswa (misalnya, pertanyaan terbuka, refleksi).', 46, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(89, 4, 'Hasil (Result)', 'B', 'Sikap Perubahan Positif dalam Pendekatan ke Murid', 3, 'Adanya peningkatan keterlibatan siswa dalam proses pembelajaran atau konseling setelah perubahan pendekatan.', 47, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(90, 4, 'Hasil (Result)', 'B', 'Sikap Perubahan Positif dalam Pendekatan ke Murid', 4, 'Lebih peka dalam mengenali tanda-tanda stres atau masalah emosional pada siswa.', 48, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(91, 4, 'Hasil (Result)', 'B', 'Sikap Perubahan Positif dalam Pendekatan ke Murid', 5, 'Siswa terlihat lebih nyaman dan percaya diri saat berinteraksi dengan guru.', 49, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(92, 4, 'Hasil (Result)', 'C', 'Iklim Kelas', 1, 'Siswa merasa aman dan nyaman dalam mengungkapkan pendapat atau pertanyaan tanpa takut dihakimi oleh guru atau teman sekelas.', 50, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(93, 4, 'Hasil (Result)', 'C', 'Iklim Kelas', 2, 'Tidak ada kasus bullying, intimidasi, atau kekerasan verbal/fisik di dalam kelas', 51, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(94, 4, 'Hasil (Result)', 'C', 'Iklim Kelas', 3, 'Siswa memahami dan mematuhi aturan kelas yang disepakati bersama untuk menciptakan lingkungan yang tertib dan aman.', 52, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(95, 4, 'Hasil (Result)', 'C', 'Iklim Kelas', 4, 'Guru merespons dengan cepat dan adil terhadap konflik atau ketidaknyamanan yang muncul di antara siswa.', 53, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(96, 4, 'Hasil (Result)', 'D', 'Suasana Kelas Menyenangkan', 1, 'Siswa antusias dan termotivasi untuk hadir dan berpartisipasi aktif dalam pembelajaran.', 54, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(97, 4, 'Hasil (Result)', 'D', 'Suasana Kelas Menyenangkan', 2, 'Pembelajaran dirancang dengan metode yang kreatif dan interaktif (misalnya permainan, proyek, atau diskusi kelompok).', 55, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(98, 4, 'Hasil (Result)', 'D', 'Suasana Kelas Menyenangkan', 3, 'Suasana kelas penuh dengan tawa, semangat, dan energi positif tanpa tekanan berlebihan.', 56, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(99, 4, 'Hasil (Result)', 'D', 'Suasana Kelas Menyenangkan', 4, 'Siswa merasa dihargai dan diterima apa adanya sehingga mereka lebih percaya diri.', 57, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(100, 4, 'Hasil (Result)', 'E', 'Layanan Pembelajaran', 1, 'Siswa merasa materi pembelajaran yang disampaikan guru mudah dipahami dan relevan dengan kebutuhan.', 58, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(101, 4, 'Hasil (Result)', 'E', 'Layanan Pembelajaran', 2, 'Metode pembelajaran yang digunakan guru (misalnya diskusi, proyek, atau media digital) membuat siswa lebih tertarik untuk belajar.', 59, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(102, 4, 'Hasil (Result)', 'E', 'Layanan Pembelajaran', 3, 'Siswa mendapatkan umpan balik yang jelas dan bermanfaat dari guru setelah mengerjakan tugas atau ujian.', 60, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(103, 4, 'Hasil (Result)', 'E', 'Layanan Pembelajaran', 4, 'Guru memberikan kesempatan kepada siswa untuk bertanya atau mengungkapkan pendapat selama pembelajaran.', 61, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(104, 4, 'Hasil (Result)', 'F', 'Pembimbingan', 1, 'Siswa merasa didukung oleh guru dalam mengatasi kesulitan belajar atau masalah pribadi.', 62, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(105, 4, 'Hasil (Result)', 'F', 'Pembimbingan', 2, 'Guru memberikan bimbingan yang jelas tentang cara meningkatkan prestasi akademik atau keterampilan sosial siswa.', 63, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(106, 4, 'Hasil (Result)', 'F', 'Pembimbingan', 3, 'Siswa merasa nyaman untuk curhat atau meminta nasihat kepada guru tanpa takut dihakimi.', 64, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51'),
(107, 4, 'Hasil (Result)', 'F', 'Pembimbingan', 4, 'Guru membantu ssiswa mengenali potensi diri dan merencanakan langkah-langkah untuk mencapainya.', 65, 1, '2026-10-11 16:50:51', '2026-10-11 16:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `bk_submissions`
--

CREATE TABLE `bk_submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_petugas_monev` varchar(255) NOT NULL,
  `instansi_petugas` varchar(255) DEFAULT NULL,
  `lokasi_monev` varchar(255) DEFAULT NULL,
  `tanggal_pelaksanaan` date DEFAULT NULL,
  `nama_responden` varchar(255) NOT NULL,
  `instansi_responden` varchar(255) DEFAULT NULL,
  `kab_kota` varchar(255) DEFAULT NULL,
  `jumlah_soal` int(10) UNSIGNED NOT NULL DEFAULT 65,
  `jumlah_ya` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `jumlah_tidak` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `skor_persentase` decimal(5,2) NOT NULL DEFAULT 0.00,
  `kategori` enum('Baik / Kategori Tinggi','Kurang / Kategori Rendah') DEFAULT NULL,
  `status` enum('Draft','Selesai') NOT NULL DEFAULT 'Draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jabatan_responden` varchar(255) DEFAULT NULL,
  `jabatan_lainnya` varchar(255) DEFAULT NULL,
  `satuan_pendidikan` varchar(255) DEFAULT NULL,
  `masa_kerja` tinyint(3) UNSIGNED DEFAULT NULL,
  `nama_pelatihan` varchar(255) DEFAULT NULL,
  `tanggal_pengisian` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bk_submissions`
--

INSERT INTO `bk_submissions` (`id`, `nama_petugas_monev`, `instansi_petugas`, `lokasi_monev`, `tanggal_pelaksanaan`, `nama_responden`, `instansi_responden`, `kab_kota`, `jumlah_soal`, `jumlah_ya`, `jumlah_tidak`, `skor_persentase`, `kategori`, `status`, `created_at`, `updated_at`, `sekolah_id`, `jabatan_responden`, `jabatan_lainnya`, `satuan_pendidikan`, `masa_kerja`, `nama_pelatihan`, `tanggal_pengisian`) VALUES
(12, 'Bilal', 'SMKN 1 Praya', 'Lombok Tengah', '2026-10-20', 'Sadam', NULL, NULL, 65, 30, 35, 46.15, 'Kurang / Kategori Rendah', 'Selesai', '2026-10-20 05:12:07', '2026-10-20 06:20:12', NULL, 'BK', NULL, 'SMAN', 21, 'MONEV', '2026-10-20'),
(15, 'Seshar', 'BGTK NTB', 'Lombok Tengah', '2026-10-21', 'Rangga', NULL, NULL, 44, 29, 15, 65.91, 'Baik / Kategori Tinggi', 'Selesai', '2026-10-20 06:19:57', '2026-10-21 07:30:11', 41, 'Rekan Sejawat', NULL, 'SMAN 1 Praya', 30, 'MONEV', '2026-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gembira_pengisians`
--

CREATE TABLE `gembira_pengisians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sekolah_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `kelas_fase` varchar(255) DEFAULT NULL,
  `topik_materi` varchar(255) DEFAULT NULL,
  `nama_petugas_monev` varchar(255) NOT NULL,
  `jabatan_penilai` varchar(255) DEFAULT NULL,
  `tanggal_monev` date NOT NULL,
  `sumber_data_bukti` text DEFAULT NULL,
  `level_1_jawaban` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`level_1_jawaban`)),
  `level_2_jawaban` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`level_2_jawaban`)),
  `tanggal_observasi` date DEFAULT NULL,
  `durasi_pembelajaran` varchar(255) DEFAULT NULL,
  `jumlah_murid_hadir` int(10) UNSIGNED DEFAULT NULL,
  `observasi_ke` int(10) UNSIGNED DEFAULT NULL,
  `level_3_jawaban` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`level_3_jawaban`)),
  `level_4_jawaban` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`level_4_jawaban`)),
  `status` enum('Draft','Selesai') NOT NULL DEFAULT 'Draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gembira_pengisians`
--

INSERT INTO `gembira_pengisians` (`id`, `sekolah_id`, `nama_guru`, `nama_sekolah`, `kelas_fase`, `topik_materi`, `nama_petugas_monev`, `jabatan_penilai`, `tanggal_monev`, `sumber_data_bukti`, `level_1_jawaban`, `level_2_jawaban`, `tanggal_observasi`, `durasi_pembelajaran`, `jumlah_murid_hadir`, `observasi_ke`, `level_3_jawaban`, `level_4_jawaban`, `status`, `created_at`, `updated_at`) VALUES
(9, 46, 'Ilham', 'SMAN 1 Soromandi', '3', 'Aljabar', 'Ki Agus', 'Rekan sejawat', '2026-10-21', NULL, NULL, NULL, '2026-10-22', '20', 30, 3, '{\"1\":{\"skor\":\"1\",\"bukti\":\"Contoh\"},\"2\":{\"skor\":\"2\",\"bukti\":\"Contoh\"},\"3\":{\"skor\":\"2\",\"bukti\":\"Contoh\"},\"4\":{\"skor\":\"2\",\"bukti\":\"Contoh\"},\"5\":{\"skor\":\"2\",\"bukti\":\"Contoh\"},\"6\":{\"skor\":\"3\",\"bukti\":\"Contoh\"},\"7\":{\"skor\":\"4\",\"bukti\":\"Contoh\"},\"8\":{\"skor\":\"3\",\"bukti\":\"Contoh\"},\"9\":{\"skor\":\"1\",\"bukti\":\"Contoh\"},\"10\":{\"skor\":\"4\",\"bukti\":\"Contoh\"},\"11\":{\"skor\":\"4\",\"bukti\":\"Contoh\"},\"12\":{\"skor\":\"4\",\"bukti\":\"Contoh\"},\"13\":{\"skor\":\"3\",\"bukti\":\"Contoh\"},\"14\":{\"skor\":\"4\",\"bukti\":\"Contoh\"},\"15\":{\"skor\":\"4\",\"bukti\":\"Contoh\"},\"16\":{\"skor\":\"2\",\"bukti\":\"Contoh\"},\"17\":{\"skor\":\"3\",\"bukti\":\"Contoh\"},\"18\":{\"skor\":\"4\",\"bukti\":\"Contoh\"},\"19\":{\"skor\":\"3\",\"bukti\":\"Contoh\"},\"20\":{\"skor\":\"4\",\"bukti\":\"Contoh\"},\"21\":{\"skor\":\"4\",\"bukti\":\"Contoh\"},\"22\":{\"skor\":\"4\",\"bukti\":\"Contoh\"},\"23\":{\"skor\":\"1\",\"bukti\":\"Contoh\"}}', '{\"1\":{\"skor\":\"4\",\"bukti\":\"Contoh\"},\"2\":{\"skor\":\"3\",\"bukti\":\"Contoh\"},\"3\":{\"skor\":\"4\",\"bukti\":\"Contoh\"},\"4\":{\"skor\":\"2\",\"bukti\":\"Contoh\"},\"5\":{\"skor\":\"2\",\"bukti\":\"Contoh\"},\"6\":{\"skor\":\"4\",\"bukti\":\"Contoh\"},\"7\":{\"skor\":\"4\",\"bukti\":\"Contoh\"},\"8\":{\"skor\":\"3\",\"bukti\":\"Contoh\"},\"9\":{\"skor\":\"4\",\"bukti\":\"Contoh\"},\"10\":{\"skor\":\"1\",\"bukti\":\"Contoh\"},\"11\":{\"skor\":\"2\",\"bukti\":\"Contoh\"}}', 'Selesai', '2026-10-21 08:05:10', '2026-10-21 08:19:38');

-- --------------------------------------------------------

--
-- Table structure for table `instrumens`
--

CREATE TABLE `instrumens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_instrumen` varchar(50) NOT NULL,
  `nama_instrumen` varchar(255) NOT NULL,
  `jenis_instrumen` enum('Pemantauan','Evaluasi','Monitoring') NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `status` enum('Draft','Aktif','Selesai') NOT NULL DEFAULT 'Draft',
  `jumlah_pertanyaan` int(11) NOT NULL DEFAULT 0,
  `capaian` decimal(5,2) NOT NULL DEFAULT 0.00,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instrumens`
--

INSERT INTO `instrumens` (`id`, `kode_instrumen`, `nama_instrumen`, `jenis_instrumen`, `deskripsi`, `status`, `jumlah_pertanyaan`, `capaian`, `tanggal_mulai`, `tanggal_selesai`, `created_at`, `updated_at`) VALUES
(1, 'INS-001', 'Instrumen Pemantauna Sekolah', 'Monitoring', 'Kami melakukan kegiatan wawancara', 'Selesai', 40, 0.00, '2026-10-09', '2026-10-19', '2026-10-06 17:09:49', '2026-10-06 17:54:38'),
(2, 'INS-002', 'Instrumen Pemantauna kominfo', 'Evaluasi', NULL, 'Aktif', 20, 10.00, '2026-10-22', '2026-10-29', '2026-10-06 17:54:32', '2026-10-06 17:54:32');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_10_06_041124_create_sekolahs_table', 2),
(5, '2026_10_07_005606_create_instrumens_table', 3),
(6, '2026_10_07_020252_create_wawancaras_table', 4),
(7, '2026_10_07_023652_create_tindak_lanjuts_table', 5),
(8, '2026_10_07_070057_create_bcks_pengisians_table', 6),
(9, '2026_10_07_070202_create_bcks_jawaban_table', 6),
(10, '2026_10_08_005556_create_bk_instruments_tables', 7),
(11, '2026_10_12_013426_add_jawaban_esai_to_wawancaras_table', 8),
(12, '2026_10_12_020511_add_identitas_bcks_to_wawancaras_table', 9),
(13, '2026_10_12_021346_add_tanggal_evaluasi_to_wawancaras_table', 10),
(14, '2026_10_12_025118_add_jenis_wawancara_to_wawancaras_table', 11),
(15, '2026_10_12_034102_make_wawancara_pelaksanaan_fields_nullable', 12),
(16, '2026_10_13_024712_create_tendiks_table', 13),
(17, '2026_10_15_032612_add_username_nip_role_to_users_table', 14),
(18, '2026_10_16_053357_make_sekolah_metadata_nullable', 15),
(19, '2026_10_16_053955_add_sekolah_id_to_monev_activity_tables', 15),
(20, '2026_10_16_093452_add_lokasi_monev_to_tendiks_table', 16),
(21, '2026_10_16_102043_add_identitas_responden_to_bk_submissions_table', 17),
(22, '2026_10_20_165855_create_gembira_pengisians_table', 18),
(23, '2026_10_21_161315_add_sekolah_id_to_gembira_pengisians_table', 19),
(24, '2026_10_21_163510_create_pkgsd_mbi_pengisians_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pkgsd_mbi_pengisians`
--

CREATE TABLE `pkgsd_mbi_pengisians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sekolah_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `kelas_fase` varchar(255) DEFAULT NULL,
  `topik_materi` varchar(255) DEFAULT NULL,
  `nama_petugas_monev` varchar(255) NOT NULL,
  `jabatan_penilai` varchar(255) NOT NULL,
  `tanggal_monev` date NOT NULL,
  `sumber_data_bukti` text DEFAULT NULL,
  `level_1_jawaban` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`level_1_jawaban`)),
  `level_2_jawaban` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`level_2_jawaban`)),
  `level_3_jawaban` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`level_3_jawaban`)),
  `level_4_jawaban` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`level_4_jawaban`)),
  `status` varchar(255) NOT NULL DEFAULT 'Selesai',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pkgsd_mbi_pengisians`
--

INSERT INTO `pkgsd_mbi_pengisians` (`id`, `sekolah_id`, `nama_guru`, `nama_sekolah`, `kelas_fase`, `topik_materi`, `nama_petugas_monev`, `jabatan_penilai`, `tanggal_monev`, `sumber_data_bukti`, `level_1_jawaban`, `level_2_jawaban`, `level_3_jawaban`, `level_4_jawaban`, `status`, `created_at`, `updated_at`) VALUES
(1, 47, 'safsa', 'af', 'v', 'asf', 'afsa', 'Rekan sejawat', '2026-10-22', 'asfd', NULL, NULL, '{\"1\":{\"skor\":\"4\",\"bukti\":\"kafaf\"},\"2\":{\"skor\":\"4\",\"bukti\":\"asfas\"},\"3\":{\"skor\":\"TD\",\"bukti\":\"asfasf\",\"alasan_td\":\"asfdsaf\"},\"4\":{\"skor\":\"4\",\"bukti\":\"afda\"},\"5\":{\"skor\":\"TD\",\"bukti\":\"asfasf\",\"alasan_td\":\"asfsa\"},\"6\":{\"skor\":\"4\",\"bukti\":\"asfasf\"},\"7\":{\"skor\":\"4\",\"bukti\":\"afasf\"},\"8\":{\"skor\":\"4\",\"bukti\":\"afasf\"},\"9\":{\"skor\":\"4\",\"bukti\":\"aafafs\"},\"10\":{\"skor\":\"4\",\"bukti\":\"afasf\"},\"11\":{\"skor\":\"4\",\"bukti\":\"afasf\"},\"12\":{\"skor\":\"4\",\"bukti\":\"afaf\"},\"13\":{\"skor\":\"TD\",\"bukti\":\"afasf\",\"alasan_td\":\"afsa\"},\"14\":{\"skor\":\"4\",\"bukti\":\"afsaf\"},\"15\":{\"skor\":\"4\",\"bukti\":\"afasf\"},\"16\":{\"skor\":\"4\",\"bukti\":\"afafs\"},\"17\":{\"skor\":\"4\",\"bukti\":\"afasf\"},\"18\":{\"skor\":\"4\",\"bukti\":\"afsaf\"},\"19\":{\"skor\":\"4\",\"bukti\":\"afsaf\"},\"20\":{\"skor\":\"4\",\"bukti\":\"afas\"},\"21\":{\"skor\":\"4\",\"bukti\":\"asfdsaf\"},\"22\":{\"skor\":\"4\",\"bukti\":\"afsaf\"}}', '{\"1\":{\"skor\":\"4\",\"bukti\":\"asfsa\"},\"2\":{\"skor\":\"4\",\"bukti\":\"asdfsa\"},\"3\":{\"skor\":\"4\",\"bukti\":\"asfasf\"},\"4\":{\"skor\":\"4\",\"bukti\":\"asfsa\"},\"5\":{\"skor\":\"4\",\"bukti\":\"asfsaf\"},\"6\":{\"skor\":\"4\",\"bukti\":\"asfsaf\"},\"7\":{\"skor\":\"4\",\"bukti\":\"asfsa\"},\"8\":{\"skor\":\"4\",\"bukti\":\"afasfd\"},\"9\":{\"skor\":\"4\",\"bukti\":\"asfdas\"},\"10\":{\"skor\":\"4\",\"bukti\":\"asfsa\"},\"11\":{\"skor\":\"4\",\"bukti\":\"asfas\"},\"12\":{\"skor\":\"4\",\"bukti\":\"afdas\"}}', 'Selesai', '2026-10-22 03:02:25', '2026-10-22 03:02:25'),
(2, 48, 'sfda', 'asf', NULL, NULL, 'asfd', 'Rekan sejawat', '2026-10-22', 'asfas', NULL, NULL, '{\"1\":{\"skor\":\"4\",\"bukti\":\"adas\"},\"2\":{\"skor\":\"4\",\"bukti\":\"daad\"},\"3\":{\"skor\":\"3\",\"bukti\":\"afssaf\"},\"4\":{\"skor\":\"1\",\"bukti\":\"asfas\"},\"5\":{\"skor\":\"3\",\"bukti\":\"asfsa\"},\"6\":{\"skor\":\"3\",\"bukti\":\"asfsa\"},\"7\":{\"skor\":\"4\",\"bukti\":\"asfsa\"},\"8\":{\"skor\":\"1\",\"bukti\":\"asfsa\"},\"9\":{\"skor\":\"4\",\"bukti\":\"asfsa\"},\"10\":{\"skor\":\"4\",\"bukti\":\"afdsa\"},\"11\":{\"skor\":\"4\",\"bukti\":\"asfsa\"},\"12\":{\"skor\":\"3\",\"bukti\":\"afsasf\"},\"13\":{\"skor\":\"3\",\"bukti\":\"asfdas\"},\"14\":{\"skor\":\"4\",\"bukti\":\"asfsa\"},\"15\":{\"skor\":\"3\",\"bukti\":\"asfsa\"},\"16\":{\"skor\":\"4\",\"bukti\":\"afsasf\"},\"17\":{\"skor\":\"4\",\"bukti\":\"asfsaf\"},\"18\":{\"skor\":\"3\",\"bukti\":\"afsaf\"},\"19\":{\"skor\":\"4\",\"bukti\":\"asfsaf\"},\"20\":{\"skor\":\"4\",\"bukti\":\"afsdsaf\"},\"21\":{\"skor\":\"3\",\"bukti\":\"asfdas\"},\"22\":{\"skor\":\"4\",\"bukti\":\"asfas\"}}', '{\"1\":{\"skor\":\"4\",\"bukti\":\"asfsa\"},\"2\":{\"skor\":\"3\",\"bukti\":\"asfsaf\"},\"3\":{\"skor\":\"4\",\"bukti\":\"asfsa\"},\"4\":{\"skor\":\"4\",\"bukti\":\"asfdsa\"},\"5\":{\"skor\":\"4\",\"bukti\":\"afssa\"},\"6\":{\"skor\":\"4\",\"bukti\":\"afssaf\"},\"7\":{\"skor\":\"4\",\"bukti\":\"asfas\"},\"8\":{\"skor\":\"2\",\"bukti\":\"afssaf\"},\"9\":{\"skor\":\"1\",\"bukti\":\"asfsa\"},\"10\":{\"skor\":\"4\",\"bukti\":\"asfafs\"},\"11\":{\"skor\":\"4\",\"bukti\":\"afsa\"},\"12\":{\"skor\":\"3\",\"bukti\":\"asfasf\"}}', 'Selesai', '2026-10-22 03:15:17', '2026-10-22 03:43:43'),
(3, 49, 'sfsa', 'asfsa', 'asfdas', 'afdsa', 'afsaf', 'Atasan langsung/Kepala Sekolah', '2026-10-22', 'asfsaf', NULL, NULL, '{\"1\":{\"skor\":\"3\",\"bukti\":\"adsas\"},\"2\":{\"skor\":\"TD\",\"bukti\":\"\",\"alasan_td\":\"asfasf\"},\"3\":{\"skor\":\"4\",\"bukti\":\"afsdsaf\"},\"4\":{\"skor\":\"4\",\"bukti\":\"asfsad\"},\"5\":{\"skor\":\"1\",\"bukti\":\"\"},\"6\":{\"skor\":\"4\",\"bukti\":\"asfasf\"},\"7\":{\"skor\":\"3\",\"bukti\":\"asfasf\"},\"8\":{\"skor\":\"4\",\"bukti\":\"asfsaf\"},\"9\":{\"skor\":\"3\",\"bukti\":\"asfsaf\"},\"10\":{\"skor\":\"TD\",\"bukti\":\"asfsa\",\"alasan_td\":\"asfdads\"},\"11\":{\"skor\":\"4\",\"bukti\":\"asfsa\"},\"12\":{\"skor\":\"4\",\"bukti\":\"adsfsaf\"},\"13\":{\"skor\":\"TD\",\"bukti\":\"asdfsad\",\"alasan_td\":\"asfsa\"},\"14\":{\"skor\":\"4\",\"bukti\":\"afssaf\"},\"15\":{\"skor\":\"4\",\"bukti\":\"asfa\"},\"16\":{\"skor\":\"3\",\"bukti\":\"asfdsaf\"},\"17\":{\"skor\":\"4\",\"bukti\":\"asfsaf\"},\"18\":{\"skor\":\"4\",\"bukti\":\"asfsa\"},\"19\":{\"skor\":\"4\",\"bukti\":\"afsa\"},\"20\":{\"skor\":\"4\",\"bukti\":\"asfsaf\"},\"21\":{\"skor\":\"4\",\"bukti\":\"asfa\"},\"22\":{\"skor\":\"4\",\"bukti\":\"afsa\"}}', '{\"1\":{\"skor\":\"3\",\"bukti\":\"asfasf\"},\"2\":{\"skor\":\"1\",\"bukti\":\"asfsaf\"},\"3\":{\"skor\":\"3\",\"bukti\":\"asfsa\"},\"4\":{\"skor\":\"4\",\"bukti\":\"afsadf\"},\"5\":{\"skor\":\"3\",\"bukti\":\"asdfsaf\"},\"6\":{\"skor\":\"4\",\"bukti\":\"asfddsaf\"},\"7\":{\"skor\":\"4\",\"bukti\":\"asdfsa\"},\"8\":{\"skor\":\"4\",\"bukti\":\"asfdsa\"},\"9\":{\"skor\":\"4\",\"bukti\":\"asdfas\"},\"10\":{\"skor\":\"4\",\"bukti\":\"asfdas\"},\"11\":{\"skor\":\"4\",\"bukti\":\"asfsa\"},\"12\":{\"skor\":\"4\",\"bukti\":\"asfdas\"}}', 'Selesai', '2026-10-22 04:23:10', '2026-10-22 04:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `sekolahs`
--

CREATE TABLE `sekolahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `npsn` varchar(20) DEFAULT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `jenjang` enum('SD','SMP','SMA','SMK') DEFAULT NULL,
  `kabupaten_kota` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `status_monitoring` enum('Sudah Dimonitor','Belum Dimonitor') NOT NULL DEFAULT 'Belum Dimonitor',
  `tahun_monitoring` year(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sekolahs`
--

INSERT INTO `sekolahs` (`id`, `npsn`, `nama_sekolah`, `jenjang`, `kabupaten_kota`, `kecamatan`, `alamat`, `status_monitoring`, `tahun_monitoring`, `created_at`, `updated_at`) VALUES
(41, NULL, 'SMAN 1 Praya', NULL, NULL, NULL, NULL, 'Belum Dimonitor', NULL, '2026-10-21 07:30:11', '2026-10-21 07:30:11'),
(42, NULL, 'SMAN 1 Dompu', NULL, NULL, NULL, NULL, 'Belum Dimonitor', NULL, '2026-10-21 07:30:21', '2026-10-21 07:30:21'),
(43, NULL, 'SMAN 1 Selong', NULL, NULL, NULL, NULL, 'Belum Dimonitor', NULL, '2026-10-21 07:30:29', '2026-10-21 07:30:29'),
(44, NULL, 'SMAN 1 Bima', NULL, NULL, NULL, NULL, 'Belum Dimonitor', NULL, '2026-10-21 07:31:06', '2026-10-21 07:31:06'),
(45, NULL, 'SMAN 1 Woja', NULL, NULL, NULL, NULL, 'Belum Dimonitor', NULL, '2026-10-21 07:32:27', '2026-10-21 07:32:27'),
(46, NULL, 'SMAN 1 Soromandi', NULL, NULL, NULL, NULL, 'Belum Dimonitor', '2026', '2026-10-21 08:19:38', '2026-10-21 08:19:38'),
(47, NULL, 'af', NULL, NULL, NULL, NULL, 'Belum Dimonitor', '2026', '2026-10-22 03:02:25', '2026-10-22 03:02:25'),
(48, NULL, 'asf', NULL, NULL, NULL, NULL, 'Belum Dimonitor', '2026', '2026-10-22 03:15:17', '2026-10-22 03:15:17'),
(49, NULL, 'asfsa', NULL, NULL, NULL, NULL, 'Belum Dimonitor', '2026', '2026-10-22 04:23:10', '2026-10-22 04:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('wK8emyohQcOxfyduPoBrClVtRTcuclNwq8luwx8B', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiIxaXJhcHdjY0kzYURUbXBmTnJVUFBrOEVyM21UbTNDYUNjY2wyYUJBIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9wa2dzZC1tYmlcL2NyZWF0ZSIsInJvdXRlIjoicGtnc2QtbWJpLmNyZWF0ZSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxLCJwYXNzd29yZF9oYXNoX3dlYiI6ImY5ZmJiY2I2MDI5MTBmNTFhYTZhYjgxNmQ4Y2EzYjFiMDZmODZhZjYxNWM0MDYxNWI4MDc4YTRiYzNkMTg4NmQifQ==', 1792674562);

-- --------------------------------------------------------

--
-- Table structure for table `tendiks`
--

CREATE TABLE `tendiks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_petugas_monev` varchar(255) NOT NULL,
  `instansi_petugas` varchar(255) NOT NULL,
  `nama_responden` varchar(255) NOT NULL,
  `jabatan_responden` varchar(255) NOT NULL,
  `jabatan_lainnya` varchar(255) DEFAULT NULL,
  `satuan_pendidikan` varchar(255) NOT NULL,
  `masa_kerja` smallint(5) UNSIGNED NOT NULL,
  `nama_pelatihan` varchar(255) NOT NULL,
  `tanggal_pengisian` date NOT NULL,
  `jawaban_1` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_2` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_3` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_4` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_5` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_6` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_7` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_8` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_9` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_10` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_11` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_12` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_13` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_14` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_15` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_16` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_17` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_18` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_19` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_20` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_21` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_22` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_23` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_24` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_25` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_26` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_27` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_28` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_29` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_30` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_31` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_32` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_33` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_34` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_35` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_36` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_37` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_38` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_39` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_40` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_41` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_42` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban_43` tinyint(3) UNSIGNED DEFAULT NULL,
  `skor_level_1` decimal(5,2) DEFAULT NULL,
  `skor_level_2` decimal(5,2) DEFAULT NULL,
  `skor_level_3` decimal(5,2) DEFAULT NULL,
  `skor_level_4` decimal(5,2) DEFAULT NULL,
  `skor_keseluruhan` decimal(5,2) DEFAULT NULL,
  `predikat` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sekolah_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lokasi_monev` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tendiks`
--

INSERT INTO `tendiks` (`id`, `nama_petugas_monev`, `instansi_petugas`, `nama_responden`, `jabatan_responden`, `jabatan_lainnya`, `satuan_pendidikan`, `masa_kerja`, `nama_pelatihan`, `tanggal_pengisian`, `jawaban_1`, `jawaban_2`, `jawaban_3`, `jawaban_4`, `jawaban_5`, `jawaban_6`, `jawaban_7`, `jawaban_8`, `jawaban_9`, `jawaban_10`, `jawaban_11`, `jawaban_12`, `jawaban_13`, `jawaban_14`, `jawaban_15`, `jawaban_16`, `jawaban_17`, `jawaban_18`, `jawaban_19`, `jawaban_20`, `jawaban_21`, `jawaban_22`, `jawaban_23`, `jawaban_24`, `jawaban_25`, `jawaban_26`, `jawaban_27`, `jawaban_28`, `jawaban_29`, `jawaban_30`, `jawaban_31`, `jawaban_32`, `jawaban_33`, `jawaban_34`, `jawaban_35`, `jawaban_36`, `jawaban_37`, `jawaban_38`, `jawaban_39`, `jawaban_40`, `jawaban_41`, `jawaban_42`, `jawaban_43`, `skor_level_1`, `skor_level_2`, `skor_level_3`, `skor_level_4`, `skor_keseluruhan`, `predikat`, `created_at`, `updated_at`, `sekolah_id`, `lokasi_monev`) VALUES
(14, 'Ki Agus', 'BGTK NTB', 'Nia', 'Operator', NULL, 'SMAN 1 Bima', 20, 'MONEV', '2026-10-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, NULL, 4.00, 4.00, 4.00, 'Sangat Baik', '2026-10-20 07:53:33', '2026-10-21 07:31:06', 44, 'Lombok Tengah');

-- --------------------------------------------------------

--
-- Table structure for table `tindak_lanjuts`
--

CREATE TABLE `tindak_lanjuts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sekolah_id` bigint(20) UNSIGNED NOT NULL,
  `wawancara_id` bigint(20) UNSIGNED DEFAULT NULL,
  `judul_tindak_lanjut` varchar(255) NOT NULL,
  `uraian_tindak_lanjut` text NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `target_selesai` date DEFAULT NULL,
  `status` enum('Belum Dimulai','Dalam Proses','Selesai') NOT NULL DEFAULT 'Belum Dimulai',
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'petugas_monev',
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `nip`, `role`, `is_active`) VALUES
(1, 'Administrator', 'admin@bgtkntb.go.id', NULL, '$2y$12$xA0nUpMJtHm8f3uaMRp2Zes2DVxTXUcW1EpMFTAoiMa9NTPsPQWvS', '3BLSyfY0IaGaoi8lePZh2XhHhf8oCP7TKdeEhn5DlEkkSNTbVmoVbiAUgkzR', '2026-10-06 20:03:52', '2026-10-14 19:53:39', 'Admin', 'ADMIN', 'admin', 1),
(2, 'Fauziyah', 'fauziyah@bgtk-monev.local', NULL, '$2y$12$XUJfJW1TQeIcrLTwPD59n.I2fCQ9PXcMjH0wv.m2YOFpplrO2ZkOG', NULL, '2026-10-14 19:46:44', '2026-10-14 19:46:44', 'Fauziyah', '198910092014042002', 'petugas_monev', 1),
(3, 'Adelina', 'adelina@bgtk-monev.local', NULL, '$2y$12$iGD.GuF59adKG34xY6wN3uzUpJZBgZ1gHUA5AejmZVo8y6veG79c6', NULL, '2026-10-14 19:46:44', '2026-10-14 21:31:27', 'Adelina', '199902022025062009', 'petugas_monev', 1),
(4, 'Masturi', 'masturi@bgtk-monev.local', NULL, '$2y$12$/kXn9hC5kA3AYtDNXq7uJe16mri0rTEMO4NscoOwNIW0gAjHjkak.', NULL, '2026-10-14 19:46:44', '2026-10-14 19:46:44', 'Masturi', '197603142002122004', 'petugas_monev', 1),
(5, 'Agus', 'agus@bgtk-monev.local', NULL, '$2y$12$upG6pDUudBnJVgnPoo80ge1SMrtRIvCrkTDrBUuJr8ynYuCT1br8.', NULL, '2026-10-14 19:46:44', '2026-10-14 19:46:44', 'Agus', '199012052015041001', 'petugas_monev', 1),
(6, 'Doni', 'doni@bgtk-monev.local', NULL, '$2y$12$Q6Mbolr8K2yBkPE6qBSn6OqRhclJJmljWSS2uPAzH3f.LZKFhuTby', NULL, '2026-10-14 19:46:45', '2026-10-14 19:46:45', 'Doni', '198205062025211051', 'petugas_monev', 1),
(7, 'Nur', 'nur@bgtk-monev.local', NULL, '$2y$12$yoIi8BlylYBWVUqVgT1pheFqLv26lvOGMZb3Izf0EpXqcweVDysTC', NULL, '2026-10-14 19:46:45', '2026-10-14 19:46:45', 'Nur', '198612292010122003', 'petugas_monev', 1),
(8, 'Dewi', 'dewi@bgtk-monev.local', NULL, '$2y$12$Fc3B5R9s4.zvC99s8br58ej/VVKmaaV81vg/nY2E2AYw/mrvUoRla', NULL, '2026-10-14 19:46:45', '2026-10-14 19:46:45', 'Dewi', '198405092008122002', 'petugas_monev', 1),
(9, 'Eliana', 'eliana@bgtk-monev.local', NULL, '$2y$12$DsC1nlAcGIHJ3z/uU/hXheE4dbzewpMw5LB1Yjfx2dypUcinf.zzS', NULL, '2026-10-14 19:46:45', '2026-10-14 19:46:45', 'Eliana', '197612102008102001', 'petugas_monev', 1),
(10, 'Prita', 'prita@bgtk-monev.local', NULL, '$2y$12$Ti7MqgXZrrIZtWe/svJwcOXq88izQprM9ihfAUWLwhnz16PXwBBH.', NULL, '2026-10-14 19:46:46', '2026-10-14 19:46:46', 'Prita', '199202082019022010', 'petugas_monev', 1),
(11, 'Ibnu', 'ibnu@bgtk-monev.local', NULL, '$2y$12$hDlJQ7RumL4ylmnK6GOHte/VQY7uqVkP/fuqNJoJSbfIKsg9t7yRm', NULL, '2026-10-14 19:46:46', '2026-10-14 19:46:46', 'Ibnu', '198407042010121004', 'petugas_monev', 1),
(12, 'Akhmad', 'akhmad@bgtk-monev.local', NULL, '$2y$12$trDR1mbeY8kSDGoibADc/u7w/c7GxiQrRYcFQLWzncE3rrQlD0KrW', NULL, '2026-10-14 19:46:46', '2026-10-14 19:46:46', 'Akhmad', '198108212010121002', 'petugas_monev', 1),
(13, 'Ari', 'ari@bgtk-monev.local', NULL, '$2y$12$4rCcYL/.34Qr1yvzeQwGqeqsdocKZsvJeopPsTNs5b/l0LfI1B.ra', NULL, '2026-10-14 19:46:46', '2026-10-14 19:46:46', 'Ari', '198608092009121005', 'petugas_monev', 1),
(14, 'Fahrurrozi', 'lalufahrurrozi@bgtk-monev.local', NULL, '$2y$12$lGJmzvRkEpEllTIk8eKYVuVmeGH8v5RDYB4Idy9nXMkBsBWoVS1Ma', NULL, '2026-10-14 19:46:46', '2026-10-14 19:46:46', 'Fahrurrozi', '198408282010121006', 'petugas_monev', 1),
(15, 'Mukti', 'lalumukti@bgtk-monev.local', NULL, '$2y$12$1Od3QrVjz5ep7UxKtrgLVOI.JR2UnK9bLp/biZGB2TeoE6ZSR/m8O', NULL, '2026-10-14 19:46:47', '2026-10-14 19:46:47', 'Mukti', '198612082014041001', 'petugas_monev', 1),
(16, 'Rieza', 'rieza@bgtk-monev.local', NULL, '$2y$12$CZnxEwMwiEejtO57guDFAu1a6b/6XqJNi.aiam6Hm6eqrwn1/xeNO', NULL, '2026-10-14 19:46:47', '2026-10-14 19:46:47', 'Rieza', '198502232025211038', 'petugas_monev', 1),
(17, 'Yandri', 'yandri@bgtk-monev.local', NULL, '$2y$12$YBUTtkhWz.AwgdJPdWQOmu49W1Ml/3lKisY72RrM/LWku3uSIDq7S', NULL, '2026-10-14 19:46:47', '2026-10-14 19:46:47', 'Yandri', '197406012025211020', 'petugas_monev', 1),
(18, 'Rusmawati', 'rusmawati@bgtk-monev.local', NULL, '$2y$12$RCz6JJtbqSKI7S2EezKJb.ry7EFcHcl7iZQC4KL5Pv.aeKaJROS1.', NULL, '2026-10-14 19:46:47', '2026-10-14 19:46:47', 'Rusmawati', '198007072009122004', 'petugas_monev', 1),
(19, 'Evi', 'evi@bgtk-monev.local', NULL, '$2y$12$4wi/L1lDnXPR5gwtCcRdNedSw6pRipj6scJPbiy34Y1Yh8r4fRpEy', NULL, '2026-10-14 19:46:48', '2026-10-14 19:46:48', 'Evi', '199108192019022005', 'petugas_monev', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wawancaras`
--

CREATE TABLE `wawancaras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_wawancara` varchar(20) DEFAULT NULL,
  `instrumen_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sekolah_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal_wawancara` date NOT NULL,
  `nama_narasumber` varchar(255) NOT NULL,
  `jabatan_narasumber` varchar(255) DEFAULT NULL,
  `nama_pewawancara` varchar(255) NOT NULL,
  `status` enum('Belum Dilaksanakan','Selesai') NOT NULL DEFAULT 'Belum Dilaksanakan',
  `hasil_wawancara` text DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jawaban_1` longtext DEFAULT NULL,
  `jawaban_2` longtext DEFAULT NULL,
  `jawaban_3` longtext DEFAULT NULL,
  `jawaban_4` longtext DEFAULT NULL,
  `jawaban_5` longtext DEFAULT NULL,
  `nama_bcks` varchar(255) DEFAULT NULL,
  `unit_kerja_bcks` varchar(255) DEFAULT NULL,
  `angkatan_pelatihan_bcks` varchar(255) DEFAULT NULL,
  `nama_responden` varchar(255) DEFAULT NULL,
  `unit_kerja_responden` varchar(255) DEFAULT NULL,
  `status_responden` varchar(255) DEFAULT NULL,
  `nama_petugas_monev` varchar(255) DEFAULT NULL,
  `unit_kerja_petugas` varchar(255) DEFAULT NULL,
  `tanggal_evaluasi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wawancaras`
--

INSERT INTO `wawancaras` (`id`, `jenis_wawancara`, `instrumen_id`, `sekolah_id`, `tanggal_wawancara`, `nama_narasumber`, `jabatan_narasumber`, `nama_pewawancara`, `status`, `hasil_wawancara`, `catatan`, `created_at`, `updated_at`, `jawaban_1`, `jawaban_2`, `jawaban_3`, `jawaban_4`, `jawaban_5`, `nama_bcks`, `unit_kerja_bcks`, `angkatan_pelatihan_bcks`, `nama_responden`, `unit_kerja_responden`, `status_responden`, `nama_petugas_monev`, `unit_kerja_petugas`, `tanggal_evaluasi`) VALUES
(40, 'GEMBIRA', NULL, 45, '2026-10-21', 'Mahfud', 'Peserta Matematika GEMBIRA', 'Ki Agus', 'Selesai', '{\"program\":\"Matematika GEMBIRA\",\"nama_guru\":\"Mahfud\",\"nama_sekolah\":\"SMAN 1 Woja\",\"kelas_fase\":\"3\",\"topik_materi\":\"Matematika\",\"jabatan_penilai\":\"Peserta Matematika GEMBIRA\",\"tanggal_monev\":\"2026-10-21\",\"sumber_data_bukti\":\"Belum ada\",\"jawaban_terbuka\":{\"1\":\"contoh\",\"2\":\"contoh\",\"3\":\"contoh\",\"4\":\"contoh\",\"5\":{\"a\":\"contoh\",\"b\":\"contoh\",\"c\":\"contoh\",\"d\":\"contoh\",\"e\":\"contoh\"},\"6\":\"contoh\",\"7\":\"contoh\"}}', 'contoh', '2026-10-21 07:32:27', '2026-10-21 07:32:27', 'contoh', 'contoh', 'contoh', 'contoh', '{\"a\":\"contoh\",\"b\":\"contoh\",\"c\":\"contoh\",\"d\":\"contoh\",\"e\":\"contoh\"}', NULL, NULL, NULL, 'Mahfud', 'SMAN 1 Woja', 'Peserta Matematika GEMBIRA', 'Ki Agus', '-', '2026-10-21'),
(41, 'GEMBIRA', NULL, 46, '2026-10-21', 'Budi', 'Rekan sejawat', 'Seshar', 'Selesai', '{\"program\":\"Matematika GEMBIRA\",\"nama_guru\":\"Budi\",\"nama_sekolah\":\"SMAN 1 Soromandi\",\"kelas_fase\":null,\"topik_materi\":\"Ekonomi\",\"jabatan_penilai\":\"Rekan sejawat\",\"tanggal_monev\":\"2026-10-21\",\"sumber_data_bukti\":\"tidak ada\",\"jawaban_terbuka\":{\"1\":\"contoh\",\"2\":\"contoh\",\"3\":\"contoh\",\"4\":\"contoh\",\"5\":{\"a\":\"contoh\",\"b\":\"contoh\",\"c\":\"contoh\",\"d\":\"contohcontoh\",\"e\":\"contoh\"},\"6\":\"contoh\",\"7\":\"contoh\"}}', 'contoh', '2026-10-21 08:22:23', '2026-10-21 08:22:23', 'contoh', 'contoh', 'contoh', 'contoh', '{\"a\":\"contoh\",\"b\":\"contoh\",\"c\":\"contoh\",\"d\":\"contohcontoh\",\"e\":\"contoh\"}', NULL, NULL, NULL, 'Budi', 'SMAN 1 Soromandi', 'Rekan sejawat', 'Seshar', '-', '2026-10-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bcks_jawaban`
--
ALTER TABLE `bcks_jawaban`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bcks_jawaban_bcks_pengisian_id_nomor_indikator_unique` (`bcks_pengisian_id`,`nomor_indikator`);

--
-- Indexes for table `bcks_pengisians`
--
ALTER TABLE `bcks_pengisians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bcks_pengisians_sekolah_id_foreign` (`sekolah_id`);

--
-- Indexes for table `bk_answers`
--
ALTER TABLE `bk_answers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bk_answers_bk_submission_id_bk_question_id_unique` (`bk_submission_id`,`bk_question_id`),
  ADD KEY `bk_answers_bk_question_id_foreign` (`bk_question_id`);

--
-- Indexes for table `bk_essay_answers`
--
ALTER TABLE `bk_essay_answers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bk_essay_answers_bk_submission_id_nomor_unique` (`bk_submission_id`,`nomor`);

--
-- Indexes for table `bk_questions`
--
ALTER TABLE `bk_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bk_questions_level_bagian_urutan_index` (`level`,`bagian`,`urutan`);

--
-- Indexes for table `bk_submissions`
--
ALTER TABLE `bk_submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bk_submissions_sekolah_id_foreign` (`sekolah_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `gembira_pengisians`
--
ALTER TABLE `gembira_pengisians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gembira_pengisians_sekolah_id_foreign` (`sekolah_id`);

--
-- Indexes for table `instrumens`
--
ALTER TABLE `instrumens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `instrumens_kode_instrumen_unique` (`kode_instrumen`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pkgsd_mbi_pengisians`
--
ALTER TABLE `pkgsd_mbi_pengisians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pkgsd_mbi_pengisians_sekolah_id_foreign` (`sekolah_id`);

--
-- Indexes for table `sekolahs`
--
ALTER TABLE `sekolahs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sekolahs_npsn_unique` (`npsn`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tendiks`
--
ALTER TABLE `tendiks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tendiks_sekolah_id_foreign` (`sekolah_id`);

--
-- Indexes for table `tindak_lanjuts`
--
ALTER TABLE `tindak_lanjuts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tindak_lanjuts_sekolah_id_foreign` (`sekolah_id`),
  ADD KEY `tindak_lanjuts_wawancara_id_foreign` (`wawancara_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_nip_unique` (`nip`);

--
-- Indexes for table `wawancaras`
--
ALTER TABLE `wawancaras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wawancaras_instrumen_id_foreign` (`instrumen_id`),
  ADD KEY `wawancaras_sekolah_id_foreign` (`sekolah_id`),
  ADD KEY `wawancaras_jenis_wawancara_index` (`jenis_wawancara`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bcks_jawaban`
--
ALTER TABLE `bcks_jawaban`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=617;

--
-- AUTO_INCREMENT for table `bcks_pengisians`
--
ALTER TABLE `bcks_pengisians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `bk_answers`
--
ALTER TABLE `bk_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=892;

--
-- AUTO_INCREMENT for table `bk_essay_answers`
--
ALTER TABLE `bk_essay_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `bk_questions`
--
ALTER TABLE `bk_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `bk_submissions`
--
ALTER TABLE `bk_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gembira_pengisians`
--
ALTER TABLE `gembira_pengisians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `instrumens`
--
ALTER TABLE `instrumens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pkgsd_mbi_pengisians`
--
ALTER TABLE `pkgsd_mbi_pengisians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sekolahs`
--
ALTER TABLE `sekolahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tendiks`
--
ALTER TABLE `tendiks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tindak_lanjuts`
--
ALTER TABLE `tindak_lanjuts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `wawancaras`
--
ALTER TABLE `wawancaras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bcks_jawaban`
--
ALTER TABLE `bcks_jawaban`
  ADD CONSTRAINT `bcks_jawaban_bcks_pengisian_id_foreign` FOREIGN KEY (`bcks_pengisian_id`) REFERENCES `bcks_pengisians` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bcks_pengisians`
--
ALTER TABLE `bcks_pengisians`
  ADD CONSTRAINT `bcks_pengisians_sekolah_id_foreign` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolahs` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `bk_answers`
--
ALTER TABLE `bk_answers`
  ADD CONSTRAINT `bk_answers_bk_question_id_foreign` FOREIGN KEY (`bk_question_id`) REFERENCES `bk_questions` (`id`),
  ADD CONSTRAINT `bk_answers_bk_submission_id_foreign` FOREIGN KEY (`bk_submission_id`) REFERENCES `bk_submissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bk_essay_answers`
--
ALTER TABLE `bk_essay_answers`
  ADD CONSTRAINT `bk_essay_answers_bk_submission_id_foreign` FOREIGN KEY (`bk_submission_id`) REFERENCES `bk_submissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bk_submissions`
--
ALTER TABLE `bk_submissions`
  ADD CONSTRAINT `bk_submissions_sekolah_id_foreign` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolahs` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `gembira_pengisians`
--
ALTER TABLE `gembira_pengisians`
  ADD CONSTRAINT `gembira_pengisians_sekolah_id_foreign` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolahs` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pkgsd_mbi_pengisians`
--
ALTER TABLE `pkgsd_mbi_pengisians`
  ADD CONSTRAINT `pkgsd_mbi_pengisians_sekolah_id_foreign` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolahs` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tendiks`
--
ALTER TABLE `tendiks`
  ADD CONSTRAINT `tendiks_sekolah_id_foreign` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolahs` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tindak_lanjuts`
--
ALTER TABLE `tindak_lanjuts`
  ADD CONSTRAINT `tindak_lanjuts_sekolah_id_foreign` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolahs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tindak_lanjuts_wawancara_id_foreign` FOREIGN KEY (`wawancara_id`) REFERENCES `wawancaras` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `wawancaras`
--
ALTER TABLE `wawancaras`
  ADD CONSTRAINT `wawancaras_instrumen_id_foreign` FOREIGN KEY (`instrumen_id`) REFERENCES `instrumens` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wawancaras_sekolah_id_foreign` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolahs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
