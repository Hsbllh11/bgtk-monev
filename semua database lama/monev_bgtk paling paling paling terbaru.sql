-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2026 at 11:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monev_bgtk`
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

-- --------------------------------------------------------

--
-- Table structure for table `bk_answers`
--

CREATE TABLE `bk_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bk_submission_id` bigint(20) UNSIGNED NOT NULL,
  `bk_question_id` bigint(20) UNSIGNED NOT NULL,
  `skor` tinyint(3) UNSIGNED DEFAULT NULL,
  `jawaban` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bk_answers`
--

INSERT INTO `bk_answers` (`id`, `bk_submission_id`, `bk_question_id`, `skor`, `jawaban`, `created_at`, `updated_at`) VALUES
(391, 7, 1, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(392, 7, 2, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(393, 7, 3, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(394, 7, 4, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(395, 7, 5, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(396, 7, 6, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(397, 7, 7, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(398, 7, 8, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(399, 7, 9, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(400, 7, 10, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(401, 7, 11, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(402, 7, 12, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(403, 7, 13, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(404, 7, 14, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(405, 7, 15, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(406, 7, 16, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(407, 7, 17, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(408, 7, 18, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(409, 7, 19, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(410, 7, 20, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(411, 7, 21, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(412, 7, 22, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(413, 7, 23, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(414, 7, 24, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(415, 7, 25, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(416, 7, 26, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(417, 7, 27, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(418, 7, 28, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(419, 7, 29, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(420, 7, 30, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(421, 7, 31, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(422, 7, 32, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(423, 7, 33, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(424, 7, 34, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(425, 7, 35, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(426, 7, 36, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(427, 7, 37, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(428, 7, 38, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(429, 7, 39, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(430, 7, 40, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(431, 7, 41, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(432, 7, 42, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(433, 7, 43, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(434, 7, 44, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(435, 7, 45, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(436, 7, 46, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(437, 7, 47, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(438, 7, 48, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(439, 7, 49, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(440, 7, 50, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(441, 7, 51, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(442, 7, 52, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(443, 7, 53, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(444, 7, 54, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(445, 7, 55, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(446, 7, 56, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(447, 7, 57, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(448, 7, 58, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(449, 7, 59, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(450, 7, 60, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(451, 7, 61, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(452, 7, 62, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(453, 7, 63, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(454, 7, 64, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(455, 7, 65, 1, 4, '2026-10-25 23:51:00', '2026-10-25 23:51:00'),
(456, 8, 1, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(457, 8, 2, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(458, 8, 3, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(459, 8, 4, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(460, 8, 5, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(461, 8, 6, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(462, 8, 7, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(463, 8, 8, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(464, 8, 9, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(465, 8, 10, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(466, 8, 11, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(467, 8, 12, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(468, 8, 13, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(469, 8, 14, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(470, 8, 15, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(471, 8, 16, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(472, 8, 17, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(473, 8, 18, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(474, 8, 19, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(475, 8, 20, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(476, 8, 21, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(477, 8, 22, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(478, 8, 23, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(479, 8, 24, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(480, 8, 25, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(481, 8, 26, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(482, 8, 27, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(483, 8, 28, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(484, 8, 29, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(485, 8, 30, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(486, 8, 31, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(487, 8, 32, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(488, 8, 33, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(489, 8, 34, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(490, 8, 35, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(491, 8, 36, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(492, 8, 37, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(493, 8, 38, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(494, 8, 39, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(495, 8, 40, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(496, 8, 41, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(497, 8, 42, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(498, 8, 43, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(499, 8, 44, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(500, 8, 45, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(501, 8, 46, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(502, 8, 47, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(503, 8, 48, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(504, 8, 49, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(505, 8, 50, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(506, 8, 51, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(507, 8, 52, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(508, 8, 53, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(509, 8, 54, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(510, 8, 55, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(511, 8, 56, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(512, 8, 57, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(513, 8, 58, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(514, 8, 59, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(515, 8, 60, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(516, 8, 61, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(517, 8, 62, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(518, 8, 63, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(519, 8, 64, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(520, 8, 65, 1, 4, '2026-10-25 23:54:59', '2026-10-25 23:54:59'),
(521, 9, 1, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(522, 9, 2, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(523, 9, 3, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(524, 9, 4, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(525, 9, 5, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(526, 9, 6, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(527, 9, 7, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(528, 9, 8, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(529, 9, 9, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(530, 9, 10, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(531, 9, 11, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(532, 9, 12, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(533, 9, 13, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(534, 9, 14, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(535, 9, 15, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(536, 9, 16, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(537, 9, 17, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(538, 9, 18, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(539, 9, 19, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(540, 9, 20, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(541, 9, 21, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(542, 9, 22, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(543, 9, 23, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(544, 9, 24, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(545, 9, 25, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(546, 9, 26, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(547, 9, 27, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(548, 9, 28, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(549, 9, 29, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(550, 9, 30, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(551, 9, 31, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(552, 9, 32, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(553, 9, 33, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(554, 9, 34, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(555, 9, 35, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(556, 9, 36, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(557, 9, 37, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(558, 9, 38, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(559, 9, 39, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(560, 9, 40, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(561, 9, 41, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(562, 9, 42, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(563, 9, 43, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(564, 9, 44, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(565, 9, 45, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(566, 9, 46, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(567, 9, 47, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(568, 9, 48, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(569, 9, 49, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(570, 9, 50, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(571, 9, 51, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(572, 9, 52, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(573, 9, 53, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(574, 9, 54, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(575, 9, 55, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(576, 9, 56, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(577, 9, 57, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(578, 9, 58, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(579, 9, 59, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(580, 9, 60, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(581, 9, 61, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(582, 9, 62, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(583, 9, 63, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(584, 9, 64, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(585, 9, 65, 1, 4, '2026-10-25 23:59:58', '2026-10-25 23:59:58'),
(586, 10, 1, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(587, 10, 2, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(588, 10, 3, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(589, 10, 4, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(590, 10, 5, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(591, 10, 6, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(592, 10, 7, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(593, 10, 8, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(594, 10, 9, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(595, 10, 10, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(596, 10, 11, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(597, 10, 13, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(598, 10, 14, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(599, 10, 15, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(600, 10, 16, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(601, 10, 17, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(602, 10, 18, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(603, 10, 20, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(604, 10, 22, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(605, 10, 23, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(606, 10, 24, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(607, 10, 66, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(608, 10, 27, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(609, 10, 28, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(610, 10, 29, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(611, 10, 30, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(612, 10, 67, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(613, 10, 68, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(614, 10, 69, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(615, 10, 70, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(616, 10, 40, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(617, 10, 41, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(618, 10, 71, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(619, 10, 72, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(620, 10, 45, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(621, 10, 46, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(622, 10, 47, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(623, 10, 73, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(624, 10, 50, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(625, 10, 51, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(626, 10, 52, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(627, 10, 54, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(628, 10, 55, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(629, 10, 74, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(630, 10, 58, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(631, 10, 59, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(632, 10, 75, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(633, 10, 76, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(634, 10, 77, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(635, 10, 78, 4, NULL, '2026-10-26 00:46:18', '2026-10-26 00:46:18'),
(636, 11, 22, 3, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(637, 11, 23, 2, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(638, 11, 24, 3, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(639, 11, 66, 4, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(640, 11, 27, 3, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(641, 11, 28, 4, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(642, 11, 29, 1, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(643, 11, 30, 4, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(644, 11, 67, 4, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(645, 11, 68, 3, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(646, 11, 69, 4, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(647, 11, 70, 3, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(648, 11, 40, 3, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(649, 11, 41, 2, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(650, 11, 71, 4, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(651, 11, 72, 1, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(652, 11, 45, 4, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(653, 11, 46, 4, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(654, 11, 47, 4, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(655, 11, 73, 4, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(656, 11, 50, 3, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(657, 11, 51, 2, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(658, 11, 52, 4, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(659, 11, 54, 4, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(660, 11, 55, 4, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(661, 11, 74, 4, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(662, 11, 58, 4, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(663, 11, 59, 4, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(664, 11, 75, 4, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(665, 11, 76, 4, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(666, 11, 77, 4, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(667, 11, 78, 4, NULL, '2026-10-26 00:47:13', '2026-10-26 00:47:13'),
(668, 12, 1, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(669, 12, 2, 2, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(670, 12, 3, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(671, 12, 4, 2, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(672, 12, 5, 2, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(673, 12, 6, 2, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(674, 12, 7, 2, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(675, 12, 8, 2, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(676, 12, 9, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(677, 12, 10, 2, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(678, 12, 11, 2, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(679, 12, 13, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(680, 12, 14, 2, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(681, 12, 15, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(682, 12, 16, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(683, 12, 17, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(684, 12, 18, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(685, 12, 20, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(686, 12, 22, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(687, 12, 23, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(688, 12, 24, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(689, 12, 66, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(690, 12, 27, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(691, 12, 28, 2, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(692, 12, 29, 2, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(693, 12, 30, 2, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(694, 12, 67, 2, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(695, 12, 68, 2, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(696, 12, 69, 2, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(697, 12, 70, 2, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(698, 12, 40, 2, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(699, 12, 41, 2, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(700, 12, 71, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(701, 12, 72, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(702, 12, 45, 2, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(703, 12, 46, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(704, 12, 47, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(705, 12, 73, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(706, 12, 50, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(707, 12, 51, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(708, 12, 52, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(709, 12, 54, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(710, 12, 55, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(711, 12, 74, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(712, 12, 58, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(713, 12, 59, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(714, 12, 75, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(715, 12, 76, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(716, 12, 77, 1, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10'),
(717, 12, 78, 2, NULL, '2026-10-26 02:04:10', '2026-10-26 02:04:10');

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
(1, 1, 'Reaksi (Reaction)', 'A', 'Materi Pelatihan', 1, 'Materi pelatihan 7 Jurus BK Hebat sesuai dengan tujuan pelatihan.', 1, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(2, 1, 'Reaksi (Reaction)', 'A', 'Materi Pelatihan', 2, 'Materi yang disampaikan sesuai dengan kebutuhan dan tugas guru BK.', 2, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(3, 1, 'Reaksi (Reaction)', 'A', 'Materi Pelatihan', 3, 'Bahan/modul pembelajaran yang diberikan membantu saya memahami 7 Jurus BK Hebat.', 3, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(4, 1, 'Reaksi (Reaction)', 'B', 'Fasilitator Pelatihan', 1, 'Fasilitator menguasai materi 7 Jurus BK Hebat yang disampaikan.', 4, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(5, 1, 'Reaksi (Reaction)', 'B', 'Fasilitator Pelatihan', 2, 'Fasilitator menyampaikan materi secara sistematis dan mudah dipahami.', 5, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(6, 1, 'Reaksi (Reaction)', 'B', 'Fasilitator Pelatihan', 3, 'Fasilitator mampu membangun suasana pembelajaran yang aktif dan menyenangkan', 6, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(7, 1, 'Reaksi (Reaction)', 'C', 'LMS Pelatihan', 1, 'Petunjuk penggunaan LMS mudah dipahami.', 7, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(8, 1, 'Reaksi (Reaction)', 'C', 'LMS Pelatihan', 2, 'Kendala teknis dalam penggunaan LMS dapat ditangani dengan baik oleh admin/pengelola', 8, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(9, 1, 'Reaksi (Reaction)', 'D', 'Kepanitiaan', 1, 'Sarana dan prasarana pada pelaksanaan luring mendukung proses pembelajaran.', 9, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(10, 1, 'Reaksi (Reaction)', 'D', 'Kepanitiaan', 2, 'Panitia/pengelola memberikan informasi dan layanan yang dibutuhkan peserta dengan baik.', 10, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(11, 2, 'Pembelajaran (Learning)', 'A', 'Kualitas Penerapan Layanan BK', 1, 'Siswa menunjukkan peningkatan pemahaman tentang nilai-nilai kehidupan (seperti integritas, empati, dan tanggung jawab) setelah mengikuti layanan BK.', 11, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(12, 2, 'Pembelajaran (Learning)', 'A', 'Kualitas Penerapan Layanan BK', 2, 'Penurunan kasus masalah sosial dan emosional di sekolah (misalnya bullying, konflik antar-siswa) karena intervensi layanan BK yang efektif.', 12, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(13, 2, 'Pembelajaran (Learning)', 'A', 'Kualitas Penerapan Layanan BK', 3, 'Siswa lebih aktif mencari bantuan untuk masalah akademik maupun non-akademik melalui layanan BK.', 12, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(14, 2, 'Pembelajaran (Learning)', 'A', 'Kualitas Penerapan Layanan BK', 4, 'Guru BK lebih terampil dalam menggunakan metode konseling yang variatif (misalnya pendekatan CBT, solution-focused).', 13, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(15, 2, 'Pembelajaran (Learning)', 'A', 'Kualitas Penerapan Layanan BK', 5, 'Layanan BK terintegrasi dengan program sekolah (misalnya pengembangan karakter, anti-bullying)', 14, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(16, 2, 'Pembelajaran (Learning)', 'B', 'Kinerja Guru BK Selama OJL', 1, 'Mampu menyusun RPL yang jelas dan terstruktur untuk mencapai tujuan pembinaan karakter positif siswa.', 15, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(17, 2, 'Pembelajaran (Learning)', 'B', 'Kinerja Guru BK Selama OJL', 2, 'RPL yang disusun mencakup aspek pengembangan pribadi, sosial, belajar, dan karir siswa secara seimbang.', 16, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(18, 2, 'Pembelajaran (Learning)', 'B', 'Kinerja Guru BK Selama OJL', 3, 'Melibatkan data kebutuhan siswa (misalnya, hasil asesmen, masukan guru/orang tua) dalam menyusun RPL.', 17, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(19, 2, 'Pembelajaran (Learning)', 'B', 'Kinerja Guru BK Selama OJL', 4, 'Menetapkan indikator keberhasilan yang terukur dalam RPL untuk mengevaluasi dampak layanan BK.', 19, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(20, 2, 'Pembelajaran (Learning)', 'B', 'Kinerja Guru BK Selama OJL', 5, 'Menyusun RPL dengan mempertimbangkan keragaman latar belakang dan kebutuhan siswa.', 18, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(21, 2, 'Pembelajaran (Learning)', 'B', 'Kinerja Guru BK Selama OJL', 6, 'Berkolaborasi dengan guru BK ketika menemukan siswa yang memerlukan pendampingan lebih intensif terkait masalah pribadi atau sosial', 21, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(22, 3, 'Behavior', 'A', 'Keterampilan Guru BK', 1, 'Mampu merancang program BK yang efektif untuk membina karakter positif siswa.', 19, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(23, 3, 'Behavior', 'A', 'Keterampilan Guru BK', 2, 'Terampil dalam menggunakan teknik konseling (misalnya, refleksi, pertanyaan terbuka) untuk membantu siswa mengatasi masalah pribadi.', 20, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(24, 3, 'Behavior', 'A', 'Keterampilan Guru BK', 3, 'Aktif membimbing siswa dalam mengembangkan keterampilan sosial, seperti kerja sama dan komunikasi.', 21, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(25, 3, 'Behavior', 'A', 'Keterampilan Guru BK', 5, 'Mampu mengevaluasi perkembangan siswa setelah mengikuti program BK dan memberikan tindak lanjut yang sesuai.', 25, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(26, 3, 'Behavior', 'A', 'Keterampilan Guru BK', 6, 'Mampu berkolaborasi dengan guru, orang tua, dan pihak terkait untuk mendukung perkembangan siswa secara holistik', 26, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(27, 3, 'Behavior', 'B', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 1, 'Pembelajaran di kelas lebih bernuansa pengembangan diri (misalnya refleksi nilai-nilai kehidupan, diskusi kasus).', 23, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(28, 3, 'Behavior', 'B', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 2, 'Siswa mampu mengaitkan materi pembelajaran dengan aplikasi kehidupan nyata (misalnya keterampilan problem-solving).', 24, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(29, 3, 'Behavior', 'B', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 3, 'Guru menggunakan asesmen yang mencakup aspek sikap dan sosial (tidak hanya kognitif).', 25, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(30, 3, 'Behavior', 'B', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 4, 'Pembelajaran kolaboratif mendorong siswa untuk saling menghargai dan bekerja sama.', 26, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(31, 3, 'Behavior', 'B', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 5, 'Siswa lebih termotivasi untuk belajar karena merasa dipahami dan dihargai sebagai individu', 31, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(32, 3, 'Behavior', 'C', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 1, 'Pembelajaran di kelas lebih bernuansa pengembangan diri (misalnya refleksi nilai-nilai kehidupan, diskusi kasus).', 32, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(33, 3, 'Behavior', 'C', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 2, 'Siswa mampu mengaitkan materi pembelajaran dengan aplikasi kehidupan nyata (misalnya keterampilan problem-solving).', 33, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(34, 3, 'Behavior', 'C', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 3, 'Guru menggunakan asesmen yang mencakup aspek sikap dan sosial (tidak hanya kognitif).', 34, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(35, 3, 'Behavior', 'C', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 4, 'Siswa lebih termotivasi untuk belajar karena merasa dipahami dan dihargai sebagai individu', 35, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(36, 3, 'Behavior', 'D', 'Sikap Guru BK', 1, 'Mampu mengenali perubahan emosi atau perilaku siswa selama sesi konseling.', 36, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(37, 3, 'Behavior', 'D', 'Sikap Guru BK', 2, 'Menunjukkan sikap empati (misalnya, mendengarkan aktif, merespons dengan hangat) saat siswa bercerita tentang masalahnya.', 37, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(38, 3, 'Behavior', 'D', 'Sikap Guru BK', 3, 'Menyesuaikan pendekatan konseling berdasarkan kebutuhan dan respons siswa.', 38, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(39, 3, 'Behavior', 'D', 'Sikap Guru BK', 4, 'Memberikan ruang aman bagi siswa untuk mengekspresikan perasaan atau pikiran mereka tanpa takut dihakimi.', 39, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(40, 4, 'Hasil (Result)', 'A', 'Pengetahuan Guru BK', 1, 'Memahami implementasi 7 Jurus BK Hebat dalam Layanan BK', 31, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(41, 4, 'Hasil (Result)', 'A', 'Pengetahuan Guru BK', 2, 'Layanan BK yang dilakukan mencakup pengembangan pribadi, sosial, belajar, dan karir siswa secara seimbang.', 32, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(42, 4, 'Hasil (Result)', 'A', 'Pengetahuan Guru BK', 3, 'Menggunakan metode kreatif (misalnya, role-play, diskusi kelompok) untuk membangun karakter positif siswa.', 42, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(43, 4, 'Hasil (Result)', 'A', 'Pengetahuan Guru BK', 4, 'Mampu membantu siswa mengenali potensi diri dan mengatasi masalah pribadi melalui layanan BK.', 43, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(44, 4, 'Hasil (Result)', 'A', 'Pengetahuan Guru BK', 5, 'Aktif memandu siswa dalam mengeksplorasi minat dan bakat untuk perencanaan karir.', 44, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(45, 4, 'Hasil (Result)', 'B', 'Sikap Perubahan Positif dalam Pendekatan ke Murid', 1, 'Pendekatan terhadap siswa menjadi lebih personal dan memahami kebutuhan mereka.', 35, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(46, 4, 'Hasil (Result)', 'B', 'Sikap Perubahan Positif dalam Pendekatan ke Murid', 2, 'Lebih sering menggunakan teknik komunikasi yang mendorong keterbukaan siswa (misalnya, pertanyaan terbuka, refleksi).', 36, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(47, 4, 'Hasil (Result)', 'B', 'Sikap Perubahan Positif dalam Pendekatan ke Murid', 3, 'Adanya peningkatan keterlibatan siswa dalam proses pembelajaran atau konseling setelah perubahan pendekatan.', 37, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(48, 4, 'Hasil (Result)', 'B', 'Sikap Perubahan Positif dalam Pendekatan ke Murid', 4, 'Lebih peka dalam mengenali tanda-tanda stres atau masalah emosional pada siswa.', 48, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(49, 4, 'Hasil (Result)', 'B', 'Sikap Perubahan Positif dalam Pendekatan ke Murid', 5, 'Siswa terlihat lebih nyaman dan percaya diri saat berinteraksi dengan guru.', 49, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(50, 4, 'Hasil (Result)', 'C', 'Iklim Kelas', 1, 'Siswa merasa aman dan nyaman dalam mengungkapkan pendapat atau pertanyaan tanpa takut dihakimi oleh guru atau teman sekelas.', 39, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(51, 4, 'Hasil (Result)', 'C', 'Iklim Kelas', 2, 'Tidak ada kasus bullying, intimidasi, atau kekerasan verbal/fisik di dalam kelas', 40, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(52, 4, 'Hasil (Result)', 'C', 'Iklim Kelas', 3, 'Siswa memahami dan mematuhi aturan kelas yang disepakati bersama untuk menciptakan lingkungan yang tertib dan aman.', 41, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(53, 4, 'Hasil (Result)', 'C', 'Iklim Kelas', 4, 'Guru merespons dengan cepat dan adil terhadap konflik atau ketidaknyamanan yang muncul di antara siswa.', 53, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(54, 4, 'Hasil (Result)', 'D', 'Suasana Kelas Menyenangkan', 1, 'Siswa antusias dan termotivasi untuk hadir dan berpartisipasi aktif dalam pembelajaran.', 42, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(55, 4, 'Hasil (Result)', 'D', 'Suasana Kelas Menyenangkan', 2, 'Pembelajaran dirancang dengan metode yang kreatif dan interaktif (misalnya permainan, proyek, atau diskusi kelompok).', 43, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(56, 4, 'Hasil (Result)', 'D', 'Suasana Kelas Menyenangkan', 3, 'Suasana kelas penuh dengan tawa, semangat, dan energi positif tanpa tekanan berlebihan.', 56, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(57, 4, 'Hasil (Result)', 'D', 'Suasana Kelas Menyenangkan', 4, 'Siswa merasa dihargai dan diterima apa adanya sehingga mereka lebih percaya diri.', 57, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(58, 4, 'Hasil (Result)', 'E', 'Layanan Pembelajaran', 1, 'Siswa merasa materi pembelajaran yang disampaikan guru mudah dipahami dan relevan dengan kebutuhan.', 45, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(59, 4, 'Hasil (Result)', 'E', 'Layanan Pembelajaran', 2, 'Metode pembelajaran yang digunakan guru (misalnya diskusi, proyek, atau media digital) membuat siswa lebih tertarik untuk belajar.', 46, 1, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(60, 4, 'Hasil (Result)', 'E', 'Layanan Pembelajaran', 3, 'Siswa mendapatkan umpan balik yang jelas dan bermanfaat dari guru setelah mengerjakan tugas atau ujian.', 60, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(61, 4, 'Hasil (Result)', 'E', 'Layanan Pembelajaran', 4, 'Guru memberikan kesempatan kepada siswa untuk bertanya atau mengungkapkan pendapat selama pembelajaran.', 61, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(62, 4, 'Hasil (Result)', 'F', 'Pembimbingan', 1, 'Siswa merasa didukung oleh guru dalam mengatasi kesulitan belajar atau masalah pribadi.', 62, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(63, 4, 'Hasil (Result)', 'F', 'Pembimbingan', 2, 'Guru memberikan bimbingan yang jelas tentang cara meningkatkan prestasi akademik atau keterampilan sosial siswa.', 63, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(64, 4, 'Hasil (Result)', 'F', 'Pembimbingan', 3, 'Siswa merasa nyaman untuk curhat atau meminta nasihat kepada guru tanpa takut dihakimi.', 64, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(65, 4, 'Hasil (Result)', 'F', 'Pembimbingan', 4, 'Guru membantu ssiswa mengenali potensi diri dan merencanakan langkah-langkah untuk mencapainya.', 65, 0, '2026-10-22 19:18:32', '2026-10-26 00:35:46'),
(66, 3, 'Behavior', 'A', 'Keterampilan Guru BK', 4, 'Mampu berkolaborasi dengan guru, orang tua, dan pihak terkait untuk mendukung perkembangan siswa secara holistik', 22, 1, '2026-10-26 00:27:00', '2026-10-26 00:35:46'),
(67, 3, 'Behavior', 'C', 'Sikap Guru BK', 1, 'Mampu mengenali perubahan emosi atau perilaku siswa selama sesi konseling.', 27, 1, '2026-10-26 00:27:00', '2026-10-26 00:35:46'),
(68, 3, 'Behavior', 'C', 'Sikap Guru BK', 2, 'Menunjukkan sikap empati (misalnya, mendengarkan aktif, merespons dengan hangat) saat siswa bercerita tentang masalahnya.', 28, 1, '2026-10-26 00:27:00', '2026-10-26 00:35:46'),
(69, 3, 'Behavior', 'C', 'Sikap Guru BK', 3, 'Menyesuaikan pendekatan konseling berdasarkan kebutuhan dan respons siswa.', 29, 1, '2026-10-26 00:27:00', '2026-10-26 00:35:46'),
(70, 3, 'Behavior', 'C', 'Sikap Guru BK', 4, 'Memberikan ruang aman bagi siswa untuk mengekspresikan perasaan atau pikiran mereka tanpa takut dihakimi.', 30, 1, '2026-10-26 00:27:00', '2026-10-26 00:35:46'),
(71, 4, 'Hasil (Result)', 'A', 'Pengetahuan Guru BK', 3, 'Mampu membantu siswa mengenali potensi diri dan mengatasi masalah pribadi melalui layanan BK.', 33, 1, '2026-10-26 00:27:00', '2026-10-26 00:35:46'),
(72, 4, 'Hasil (Result)', 'A', 'Pengetahuan Guru BK', 4, 'Aktif memandu siswa dalam mengeksplorasi minat dan bakat untuk perencanaan karir.', 34, 1, '2026-10-26 00:27:00', '2026-10-26 00:35:46'),
(73, 4, 'Hasil (Result)', 'B', 'Sikap Perubahan Positif dalam Pendekatan ke Murid', 4, 'Siswa terlihat lebih nyaman dan percaya diri saat berinteraksi dengan guru.', 38, 1, '2026-10-26 00:27:00', '2026-10-26 00:35:46'),
(74, 4, 'Hasil (Result)', 'D', 'Suasana Kelas Menyenangkan', 3, 'Siswa merasa dihargai dan diterima apa adanya sehingga mereka lebih percaya diri.', 44, 1, '2026-10-26 00:27:00', '2026-10-26 00:35:46'),
(75, 4, 'Hasil (Result)', 'E', 'Layanan Pembelajaran', 3, 'Guru memberikan kesempatan kepada siswa untuk bertanya atau mengungkapkan pendapat selama pembelajaran.', 47, 1, '2026-10-26 00:27:00', '2026-10-26 00:35:46'),
(76, 4, 'Hasil (Result)', 'F', 'Pembimbingan', 1, 'Guru memberikan bimbingan yang jelas tentang cara meningkatkan prestasi akademik atau keterampilan sosial siswa.', 48, 1, '2026-10-26 00:27:00', '2026-10-26 00:35:46'),
(77, 4, 'Hasil (Result)', 'F', 'Pembimbingan', 2, 'Siswa merasa nyaman untuk curhat atau meminta nasihat kepada guru tanpa takut dihakimi.', 49, 1, '2026-10-26 00:27:00', '2026-10-26 00:35:46'),
(78, 4, 'Hasil (Result)', 'F', 'Pembimbingan', 3, 'Guru membantu siswa mengenali potensi diri dan merencanakan langkah-langkah untuk mencapainya.', 50, 1, '2026-10-26 00:27:00', '2026-10-26 00:35:46');

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
  `total_skor` smallint(5) UNSIGNED DEFAULT NULL,
  `skor_maksimal` smallint(5) UNSIGNED DEFAULT NULL,
  `skor_persentase` decimal(5,2) NOT NULL DEFAULT 0.00,
  `kategori` varchar(255) DEFAULT NULL,
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

INSERT INTO `bk_submissions` (`id`, `nama_petugas_monev`, `instansi_petugas`, `lokasi_monev`, `tanggal_pelaksanaan`, `nama_responden`, `instansi_responden`, `kab_kota`, `jumlah_soal`, `jumlah_ya`, `jumlah_tidak`, `total_skor`, `skor_maksimal`, `skor_persentase`, `kategori`, `status`, `created_at`, `updated_at`, `sekolah_id`, `jabatan_responden`, `jabatan_lainnya`, `satuan_pendidikan`, `masa_kerja`, `nama_pelatihan`, `tanggal_pengisian`) VALUES
(7, 'supaaaanigaaaaa', 'bgtk', 'ntb', '2026-10-26', 'auntyyyyy', NULL, NULL, 65, 0, 0, NULL, NULL, 100.00, 'Sangat Baik', 'Selesai', '2026-10-25 23:51:00', '2026-10-25 23:51:00', 1, 'BK', NULL, 'smp 77 mataram', 3, 'Pelatihan jadi ayam', '2026-10-26'),
(8, 'super byon', 'bgtk', 'ntb', '2026-10-26', 'babai', NULL, NULL, 65, 0, 0, NULL, NULL, 100.00, 'Sangat Baik', 'Selesai', '2026-10-25 23:54:59', '2026-10-25 23:54:59', 1, 'BK', NULL, 'smp 77 mataram', 2, 'ayam bakar', '2026-10-26'),
(9, 'supri', 'bgtk', 'ntb', '2026-10-26', 'amper', NULL, NULL, 65, 0, 0, NULL, NULL, 100.00, 'Sangat Baik', 'Selesai', '2026-10-25 23:59:58', '2026-10-25 23:59:58', 1, 'BK', NULL, 'smp 77 mataram', 6, 'ayam bakar', '2026-10-26'),
(10, 'ayam roket', 'sdssada', 'sdasdasda', '2026-10-26', 'bebek rudal', NULL, NULL, 50, 0, 0, 200, 200, 100.00, 'Sangat Baik', 'Selesai', '2026-10-26 00:46:18', '2026-10-26 00:46:18', 1, 'BK', NULL, 'smp 77 mataram', 4, 'ayam KIMPUL', '2026-10-26'),
(11, 'ayam suoper', 'sdssada', 'sdasdasda', '2026-10-26', 'bebek super', NULL, NULL, 32, 0, 0, 109, 128, 85.16, 'Sangat Baik', 'Selesai', '2026-10-26 00:47:13', '2026-10-26 00:47:13', 1, 'Kepala Sekolah', NULL, 'smp 77 mataram', 4, 'ayam KIMPUL', '2026-10-26'),
(12, 'sei lidah buaya', 'sdssada', 'sdasdasda', '2026-10-26', 'ikan kripsi', NULL, NULL, 50, 0, 0, 70, 200, 35.00, 'Perlu Pembinaan', 'Selesai', '2026-10-26 02:04:10', '2026-10-26 02:04:10', 1, 'BK', NULL, 'smp 77 mataram', 4, 'ayam KIMPUL', '2026-10-26');

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
(4, '2026_10_06_041124_create_sekolahs_table', 1),
(5, '2026_10_07_005606_create_instrumens_table', 1),
(6, '2026_10_07_020252_create_wawancaras_table', 1),
(7, '2026_10_07_023652_create_tindak_lanjuts_table', 1),
(8, '2026_10_07_070057_create_bcks_pengisians_table', 1),
(9, '2026_10_07_070202_create_bcks_jawaban_table', 1),
(10, '2026_10_08_005556_create_bk_instruments_tables', 1),
(11, '2026_10_12_013426_add_jawaban_esai_to_wawancaras_table', 1),
(12, '2026_10_12_020511_add_identitas_bcks_to_wawancaras_table', 1),
(13, '2026_10_12_021346_add_tanggal_evaluasi_to_wawancaras_table', 1),
(14, '2026_10_12_025118_add_jenis_wawancara_to_wawancaras_table', 1),
(15, '2026_10_12_034102_make_wawancara_pelaksanaan_fields_nullable', 1),
(16, '2026_10_13_024712_create_tendiks_table', 1),
(17, '2026_10_15_032612_add_username_nip_role_to_users_table', 1),
(18, '2026_10_16_053357_make_sekolah_metadata_nullable', 1),
(19, '2026_10_16_053955_add_sekolah_id_to_monev_activity_tables', 1),
(20, '2026_10_16_093452_add_lokasi_monev_to_tendiks_table', 1),
(21, '2026_10_16_102043_add_identitas_responden_to_bk_submissions_table', 1),
(22, '2026_10_20_165855_create_gembira_pengisians_table', 1),
(23, '2026_10_21_161315_add_sekolah_id_to_gembira_pengisians_table', 1),
(24, '2026_10_21_163510_create_pkgsd_mbi_pengisians_table', 1),
(25, '2026_10_23_015604_add_jawaban_6_8_to_wawancaras_table', 1),
(26, '2026_10_26_081102_add_skor_to_bk_tables', 2);

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
(1, NULL, 'ya', 'asdsd', 'sd', 'asd', 'asd', 'Peserta PKGSD MBI', '2026-10-23', 'asd', '{\"1\":{\"skor\":\"4\"},\"2\":{\"skor\":\"4\"},\"3\":{\"skor\":\"4\"},\"4\":{\"skor\":\"4\"},\"5\":{\"skor\":\"4\"},\"6\":{\"skor\":\"4\"},\"7\":{\"skor\":\"4\"},\"8\":{\"skor\":\"4\"},\"9\":{\"skor\":\"4\"},\"10\":{\"skor\":\"4\"},\"11\":{\"skor\":\"4\"},\"12\":{\"skor\":\"4\"},\"13\":{\"skor\":\"4\"},\"14\":{\"skor\":\"4\"},\"15\":{\"skor\":\"4\"},\"16\":{\"skor\":\"4\"},\"17\":{\"skor\":\"4\"},\"18\":{\"skor\":\"4\"},\"19\":{\"skor\":\"4\"},\"20\":{\"skor\":\"4\"},\"21\":{\"skor\":\"4\"},\"22\":{\"skor\":\"4\"},\"23\":{\"skor\":\"4\"},\"24\":{\"skor\":\"4\"},\"25\":{\"skor\":\"4\"},\"26\":{\"skor\":\"4\"},\"27\":{\"skor\":\"4\"},\"28\":{\"skor\":\"4\"},\"29\":{\"skor\":\"4\"}}', '{\"1\":{\"skor\":\"4\"},\"2\":{\"skor\":\"2\"},\"3\":{\"skor\":\"2\"},\"4\":{\"skor\":\"2\"},\"5\":{\"skor\":\"2\"},\"6\":{\"skor\":\"4\"},\"7\":{\"skor\":\"4\"},\"8\":{\"skor\":\"2\"},\"9\":{\"skor\":\"4\"},\"10\":{\"skor\":\"4\"}}', '{\"1\":{\"skor\":\"4\",\"bukti\":\"er\"},\"2\":{\"skor\":\"2\",\"bukti\":\"\"},\"3\":{\"skor\":\"4\",\"bukti\":\"ewr\"},\"4\":{\"skor\":\"4\",\"bukti\":\"ewr\"},\"5\":{\"skor\":\"4\",\"bukti\":\"wer\"},\"6\":{\"skor\":\"4\",\"bukti\":\"wer\"},\"7\":{\"skor\":\"4\",\"bukti\":\"wer\"},\"8\":{\"skor\":\"4\",\"bukti\":\"werwerwerw\"},\"9\":{\"skor\":\"4\",\"bukti\":\"asd\"},\"10\":{\"skor\":\"4\",\"bukti\":\"asd\"},\"11\":{\"skor\":\"4\",\"bukti\":\"asd\"},\"12\":{\"skor\":\"4\",\"bukti\":\"asd\"},\"13\":{\"skor\":\"4\",\"bukti\":\"asd\"},\"14\":{\"skor\":\"4\",\"bukti\":\"asd\"},\"15\":{\"skor\":\"4\",\"bukti\":\"asd\"},\"16\":{\"skor\":\"4\",\"bukti\":\"asd\"},\"17\":{\"skor\":\"4\",\"bukti\":\"asd\"},\"18\":{\"skor\":\"4\",\"bukti\":\"asd\"},\"19\":{\"skor\":\"4\",\"bukti\":\"asd\"},\"20\":{\"skor\":\"4\",\"bukti\":\"asd\"},\"21\":{\"skor\":\"4\",\"bukti\":\"asd\"},\"22\":{\"skor\":\"4\",\"bukti\":\"asd\"}}', '{\"1\":{\"skor\":\"4\",\"bukti\":\"asd\"},\"2\":{\"skor\":\"4\",\"bukti\":\"asd\"},\"3\":{\"skor\":\"4\",\"bukti\":\"asd\"},\"4\":{\"skor\":\"4\",\"bukti\":\"asd\"},\"5\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"6\":{\"skor\":\"4\",\"bukti\":\"asd\"},\"7\":{\"skor\":\"4\",\"bukti\":\"asd\"},\"8\":{\"skor\":\"4\",\"bukti\":\"asd\"},\"9\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"10\":{\"skor\":\"4\",\"bukti\":\"asdas\"},\"11\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"12\":{\"skor\":\"4\",\"bukti\":\"asdasd\"}}', 'Selesai', '2026-10-22 18:17:49', '2026-10-22 18:17:49'),
(2, NULL, 'asdas', 'asdsd', 'asda', 'asad', 'asdasd', 'Rekan sejawat', '2026-10-23', 'asda', NULL, NULL, '{\"1\":{\"skor\":\"4\",\"bukti\":\"sad\"},\"2\":{\"skor\":\"4\",\"bukti\":\"asda\"},\"3\":{\"skor\":\"4\",\"bukti\":\"asda\"},\"4\":{\"skor\":\"4\",\"bukti\":\"asdas\"},\"5\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"6\":{\"skor\":\"4\",\"bukti\":\"asda\"},\"7\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"8\":{\"skor\":\"4\",\"bukti\":\"asdas\"},\"9\":{\"skor\":\"4\",\"bukti\":\"asdas\"},\"10\":{\"skor\":\"4\",\"bukti\":\"asdas\"},\"11\":{\"skor\":\"4\",\"bukti\":\"asdas\"},\"12\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"13\":{\"skor\":\"4\",\"bukti\":\"ZxZaS\"},\"14\":{\"skor\":\"4\",\"bukti\":\"dads\"},\"15\":{\"skor\":\"4\",\"bukti\":\"asdas\"},\"16\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"17\":{\"skor\":\"4\",\"bukti\":\"asdas\"},\"18\":{\"skor\":\"4\",\"bukti\":\"asdas\"},\"19\":{\"skor\":\"4\",\"bukti\":\"asdas\"},\"20\":{\"skor\":\"4\",\"bukti\":\"asdas\"},\"21\":{\"skor\":\"4\",\"bukti\":\"asdas\"},\"22\":{\"skor\":\"4\",\"bukti\":\"asdas\"}}', '{\"1\":{\"skor\":\"4\",\"bukti\":\"asdas\"},\"2\":{\"skor\":\"4\",\"bukti\":\"asda\"},\"3\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"4\":{\"skor\":\"4\",\"bukti\":\"sadas\"},\"5\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"6\":{\"skor\":\"4\",\"bukti\":\"asdas\"},\"7\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"8\":{\"skor\":\"4\",\"bukti\":\"asdas\"},\"9\":{\"skor\":\"4\",\"bukti\":\"asdas\"},\"10\":{\"skor\":\"4\",\"bukti\":\"asdas\"},\"11\":{\"skor\":\"4\",\"bukti\":\"wefae\"},\"12\":{\"skor\":\"4\",\"bukti\":\"sadasda\"}}', 'Selesai', '2026-10-22 18:33:44', '2026-10-22 18:33:44'),
(3, 1, 'hisbul', 'smp 77 mataram', 'cd', 'ayam', 'dwi kayang', 'Peserta PKGSD MBI', '2026-10-23', NULL, '{\"1\":{\"skor\":\"4\"},\"2\":{\"skor\":\"4\"},\"3\":{\"skor\":\"4\"},\"4\":{\"skor\":\"4\"},\"5\":{\"skor\":\"4\"},\"6\":{\"skor\":\"4\"},\"7\":{\"skor\":\"4\"},\"8\":{\"skor\":\"4\"},\"9\":{\"skor\":\"4\"},\"10\":{\"skor\":\"4\"},\"11\":{\"skor\":\"4\"},\"12\":{\"skor\":\"4\"},\"13\":{\"skor\":\"4\"},\"14\":{\"skor\":\"4\"},\"15\":{\"skor\":\"4\"},\"16\":{\"skor\":\"4\"},\"17\":{\"skor\":\"4\"},\"18\":{\"skor\":\"4\"},\"19\":{\"skor\":\"4\"},\"20\":{\"skor\":\"4\"},\"21\":{\"skor\":\"4\"},\"22\":{\"skor\":\"4\"},\"23\":{\"skor\":\"4\"},\"24\":{\"skor\":\"4\"},\"25\":{\"skor\":\"4\"},\"26\":{\"skor\":\"4\"},\"27\":{\"skor\":\"4\"},\"28\":{\"skor\":\"4\"},\"29\":{\"skor\":\"4\"}}', '{\"1\":{\"skor\":\"4\"},\"2\":{\"skor\":\"4\"},\"3\":{\"skor\":\"4\"},\"4\":{\"skor\":\"4\"},\"5\":{\"skor\":\"4\"},\"6\":{\"skor\":\"4\"},\"7\":{\"skor\":\"4\"},\"8\":{\"skor\":\"4\"},\"9\":{\"skor\":\"4\"},\"10\":{\"skor\":\"4\"}}', '{\"1\":{\"skor\":\"4\",\"bukti\":\"wqeeq\"},\"2\":{\"skor\":\"4\",\"bukti\":\"qweqw\"},\"3\":{\"skor\":\"4\",\"bukti\":\"asdas\"},\"4\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"5\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"6\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"7\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"8\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"9\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"10\":{\"skor\":\"4\",\"bukti\":\"asdasdasd\"},\"11\":{\"skor\":\"4\",\"bukti\":\"asdasda\"},\"12\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"13\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"14\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"15\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"16\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"17\":{\"skor\":\"4\",\"bukti\":\"asda\"},\"18\":{\"skor\":\"4\",\"bukti\":\"asdasda\"},\"19\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"20\":{\"skor\":\"4\",\"bukti\":\"asdas\"},\"21\":{\"skor\":\"4\",\"bukti\":\"asdas\"},\"22\":{\"skor\":\"4\",\"bukti\":\"asdas\"}}', '{\"1\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"2\":{\"skor\":\"4\",\"bukti\":\"asdas\"},\"3\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"4\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"5\":{\"skor\":\"4\",\"bukti\":\"asdasda\"},\"6\":{\"skor\":\"4\",\"bukti\":\"asdasd\"},\"7\":{\"skor\":\"4\",\"bukti\":\"asdas\"},\"8\":{\"skor\":\"4\",\"bukti\":\"qwgyuguqw\"},\"9\":{\"skor\":\"4\",\"bukti\":\"qwbhjqwe\"},\"10\":{\"skor\":\"4\",\"bukti\":\"qweqwe\"},\"11\":{\"skor\":\"4\",\"bukti\":\"qweqwe\"},\"12\":{\"skor\":\"4\",\"bukti\":\"qweqwe\"}}', 'Selesai', '2026-10-22 18:43:42', '2026-10-22 18:43:42');

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
(1, '54e67r78', 'smp 77 mataram', 'SMP', 'hjuyi', 'nhjvb', 'jhbhbu', 'Sudah Dimonitor', '2026', '2026-10-22 18:12:46', '2026-10-23 00:46:42');

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
('BYv7X04XCajULDFsFkYdmeQDBwKU28nLDTDiRkCO', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', 'eyJfdG9rZW4iOiI1YlBzdDVEMzNvRlpnU1plMjc1Nnl5UW1sTnA4YXB5ejFsNUk1Y3dsIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2JndGstbW9uZXYudGVzdFwvYmtcLzkiLCJyb3V0ZSI6ImJrLnNob3cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MSwicGFzc3dvcmRfaGFzaF93ZWIiOiI5ZTM4OTFhZTc5MjJmZTI1ZDRkNTlmY2RiMTc1MWEwY2FlNmE4YmYyODgwNGQ5NzIxZjc3NWVkMWQ1YjVhNTA4In0=', 1793004303),
('H6Z2nixqyVSTisrMqSbNXITOAtff5nIJN1EkmWDt', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36 Edg/156.0.0.0', 'eyJfdG9rZW4iOiJENXB3Yk1hY3c0WUFlY0lld2VQN0xvaUttUXBXS2xhTEwwQlhBOFpsIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2JndGstbW9uZXYudGVzdFwvYmtcLzEyIiwicm91dGUiOiJiay5zaG93In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjEsInBhc3N3b3JkX2hhc2hfd2ViIjoiOWUzODkxYWU3OTIyZmUyNWQ0ZDU5ZmNkYjE3NTFhMGNhZTZhOGJmMjg4MDRkOTcyMWY3NzVlZDFkNWI1YTUwOCJ9', 1793009050),
('mAfZHzzTCi6xcrWYqfDWPbTYrabxEh4uO78M7NIB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.30.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiI3TmZYTzA5YlIyd2dHMnVwWnFpeDQ2V3dlaEFwa05EZFdJSnRSaVVDIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2JndGstbW9uZXYudGVzdFwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1793008916),
('nDsHJS3jjxAkJHU7zC6CnzYnFr77UKSn8Y8nkqqF', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.30.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJGZHhJa1dFUjJVVFVwQkpwaDlnb0h6cFNBUHBQODFTQ1RWeWZhUzZVIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvYmd0ay1tb25ldi50ZXN0XC8/aGVyZD1wcmV2aWV3In0sIl9wcmV2aW91cyI6eyJ1cmwiOiJodHRwOlwvXC9iZ3RrLW1vbmV2LnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6bnVsbH0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1793008916);

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
(1, 'asAS', 'DASDASDA', 'ASDA', 'Kepala Sekolah', NULL, 'smp 77 mataram', 0, 'ASDAS', '2026-10-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, NULL, 4.00, 4.00, 4.00, 'Sangat Baik', '2026-10-22 19:07:46', '2026-10-22 19:07:46', 1, 'ASDASD');

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
(1, 'admin', 'admin@bgtkntb.go.id', NULL, '$2y$12$/hwkMXmIKyej43s/fzwjcekC/ETC/08esVHZwGJqbGdYbqlx/FdT2', NULL, '2026-10-22 17:38:29', '2026-10-23 03:28:59', 'Admin', 'ADMIN', 'admin', 1),
(2, 'Test User', 'test@example.com', '2026-10-22 19:18:31', '$2y$12$IrZqt1bz845Xvh1RAHaS0O.jaS1AFJiYMlEloq8v0XIWVT0CXbJqK', 'o6WajU9vGE', '2026-10-22 19:18:32', '2026-10-22 19:18:32', NULL, NULL, 'petugas_monev', 1),
(3, 'Fauziyah', 'fauziyah@bgtk-monev.local', NULL, '$2y$12$yQWCc4CXi7BgchtRWHsio.L2IhAqAWIBIuJaCH01SK4FX1HxZkkUW', NULL, '2026-10-22 22:10:19', '2026-10-22 22:10:19', 'Fauziyah', '198910092014042002', 'petugas_monev', 1),
(5, 'Masturi', 'masturi@bgtk-monev.local', NULL, '$2y$12$misaHsozv1z1Cqh4GJx8u.KVHHtak.ks90TBjuQdtUvEaVIohUQz2', NULL, '2026-10-22 22:10:20', '2026-10-22 22:10:20', 'Masturi', '197603142002122004', 'petugas_monev', 1),
(6, 'Ki', 'ki@bgtk-monev.local', NULL, '$2y$12$jtjlXgFJug6vMd23hSVwV.t2AANvpGTWsh.H6dPx6JILvd8lwAU7G', NULL, '2026-10-22 22:10:20', '2026-10-22 22:10:20', 'Ki', '199012052015041001', 'petugas_monev', 1),
(7, 'Doni', 'doni@bgtk-monev.local', NULL, '$2y$12$T29KMDoXSl5nqhE9gDJyQOhhpFedjdkLFL9pR1U/6uiy3jqyQd5uC', NULL, '2026-10-22 22:10:21', '2026-10-22 22:10:21', 'Doni', '198205062025211051', 'petugas_monev', 1),
(8, 'Nur', 'nur@bgtk-monev.local', NULL, '$2y$12$S2NOXQACAfwv920TyoUUN.0uZ87Yd3dLEjo76qfx3vEnEpfN9TWOG', NULL, '2026-10-22 22:10:21', '2026-10-22 22:10:21', 'Nur', '198612292010122003', 'petugas_monev', 1),
(9, 'Dewi', 'dewi@bgtk-monev.local', NULL, '$2y$12$cpJybVr7BBq2khqf5y4NxeBpg0ltdqU6Yh2Kj4TAGi577ON87ogZ2', NULL, '2026-10-22 22:10:22', '2026-10-22 22:10:22', 'Dewi', '198405092008122002', 'petugas_monev', 1),
(10, 'Eliana', 'eliana@bgtk-monev.local', NULL, '$2y$12$UDQvOdAfcKwD4gcZefp7bOCjrHwFNyh6xM0SZ4sDW7GU3vyffvlhO', NULL, '2026-10-22 22:10:22', '2026-10-22 22:10:22', 'Eliana', '197612102008102001', 'petugas_monev', 1),
(11, 'Prita', 'prita@bgtk-monev.local', NULL, '$2y$12$m1Z/xB5skfTnQn3Q16hKi.EjoIuR//ZhvswS4nefS1GQlxPDVzj7W', NULL, '2026-10-22 22:10:23', '2026-10-22 22:10:23', 'Prita', '199202082019022010', 'petugas_monev', 1),
(12, 'Ibnu', 'ibnu@bgtk-monev.local', NULL, '$2y$12$z7gy6WBWpTLL22KQHVyz2eVMLs2.IqymEBXME5pTREZqc2DXxQfAi', NULL, '2026-10-22 22:10:23', '2026-10-22 22:10:23', 'Ibnu', '198407042010121004', 'petugas_monev', 1),
(13, 'Akhmad', 'akhmad@bgtk-monev.local', NULL, '$2y$12$zaMDs8ejt.qt0Mgo3Oej6OeuqGxkOF9zGWaZ2GtlKIK8eNYPoxxHi', NULL, '2026-10-22 22:10:24', '2026-10-22 22:10:24', 'Akhmad', '198108212010121002', 'petugas_monev', 1),
(14, 'Ari', 'ari@bgtk-monev.local', NULL, '$2y$12$w.aVhCYkACuVGj6ZmRA2SOYeu9FKiUX9w46J/.f9.kyBGZ5/bDXtW', NULL, '2026-10-22 22:10:24', '2026-10-22 22:10:24', 'Ari', '198608092009121005', 'petugas_monev', 1),
(15, 'Lalu', 'lalufahrurrozi@bgtk-monev.local', NULL, '$2y$12$XmbOWshhYjzPWDRtAGhWMu0jhyrsSfIkNyL8hvtTlz3653e3SezOu', NULL, '2026-10-22 22:10:24', '2026-10-22 22:10:24', 'LaluFahrurrozi', '198408282010121006', 'petugas_monev', 1),
(16, 'Lalu', 'lalumukti@bgtk-monev.local', NULL, '$2y$12$aVD7wPnmTuPwWpenexWZXuHDqvQ1vm97dmmnzfySq6FzHINBgyeie', NULL, '2026-10-22 22:10:25', '2026-10-22 22:10:25', 'LaluMukti', '198612082014041001', 'petugas_monev', 1),
(17, 'Rieza', 'rieza@bgtk-monev.local', NULL, '$2y$12$Mj55O.JRU9t48uanaRumLuUdbjVkTTn.oq18qW5evsW4OON1ox1L6', NULL, '2026-10-22 22:10:25', '2026-10-22 22:10:25', 'Rieza', '198502232025211038', 'petugas_monev', 1),
(18, 'Yandri', 'yandri@bgtk-monev.local', NULL, '$2y$12$VYTOb40DUfuW8PXrAGc7oezHSPS9tPPSaw.D2nBXy5QZCRYQzw5AW', NULL, '2026-10-22 22:10:26', '2026-10-22 22:10:26', 'Yandri', '197406012025211020', 'petugas_monev', 1),
(19, 'Rusmawati', 'rusmawati@bgtk-monev.local', NULL, '$2y$12$eXWoZCLXvWgAfnevbLQUAOIkMLFI55Sg4geLWBA/yzqqvn9YseGMW', NULL, '2026-10-22 22:10:26', '2026-10-22 22:10:26', 'Rusmawati', '198007072009122004', 'petugas_monev', 1),
(20, 'Evi', 'evi@bgtk-monev.local', NULL, '$2y$12$77WEt.603YQDkUE09597eOatOeYM3r46nMfcEMVvMAGGmF2fBwAj6', NULL, '2026-10-22 22:10:27', '2026-10-22 22:10:27', 'Evi', '199108192019022005', 'petugas_monev', 1),
(21, 'Super Admin', 'superadmin@bgtkntb.go.id', NULL, '$2y$12$kyDm0JrSHdPoHBqrKF578uUNPHyD/z/neserNWqfpQsPmuxBsRuHm', 'ppx82uJSTPHwfv3tauWXlxseUliXCSrbgMi94t4OKhKFHXYERrsiFYgI99dP', '2026-10-23 00:51:27', '2026-10-23 00:51:27', 'superadmin', 'ADMIN002', 'admin', 1);

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
  `tanggal_evaluasi` date DEFAULT NULL,
  `jawaban_6` longtext DEFAULT NULL,
  `jawaban_7` longtext DEFAULT NULL,
  `jawaban_8` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wawancaras`
--

INSERT INTO `wawancaras` (`id`, `jenis_wawancara`, `instrumen_id`, `sekolah_id`, `tanggal_wawancara`, `nama_narasumber`, `jabatan_narasumber`, `nama_pewawancara`, `status`, `hasil_wawancara`, `catatan`, `created_at`, `updated_at`, `jawaban_1`, `jawaban_2`, `jawaban_3`, `jawaban_4`, `jawaban_5`, `nama_bcks`, `unit_kerja_bcks`, `angkatan_pelatihan_bcks`, `nama_responden`, `unit_kerja_responden`, `status_responden`, `nama_petugas_monev`, `unit_kerja_petugas`, `tanggal_evaluasi`, `jawaban_6`, `jawaban_7`, `jawaban_8`) VALUES
(1, 'PKGSD MBI', NULL, 1, '2026-10-23', 'fajar', 'Guru Peserta PKGSD MBI', 'hisbul', 'Selesai', '{\"instansi_petugas\":\"bgtk\",\"lokasi_monev\":\"ntb\",\"tanggal_pelaksanaan\":\"2026-10-23\",\"jabatan_responden\":\"Guru Peserta PKGSD MBI\",\"satuan_pendidikan\":\"smp 77 mataram\",\"masa_kerja\":\"1\",\"nama_pelatihan\":\"Pelatihan PKGSD MBI\"}', NULL, '2026-10-22 18:12:46', '2026-10-22 18:12:46', 'ya', 'ya', 'aya', 'ya', 'aya', NULL, NULL, NULL, 'fajar', 'smp 77 mataram', 'Guru Peserta PKGSD MBI', 'hisbul', 'bgtk', '2026-10-23', 'ya', 'ya', 'ya'),
(2, 'PKGSD MBI', NULL, 1, '2026-10-23', 'asdas', 'Rekan Sejawat/Guru', 'asdasasda', 'Selesai', '{\"instansi_petugas\":\"asdasd\",\"lokasi_monev\":\"asdasd\",\"tanggal_pelaksanaan\":\"2026-10-23\",\"jabatan_responden\":\"Rekan Sejawat\\/Guru\",\"satuan_pendidikan\":\"smp 77 mataram\",\"masa_kerja\":\"1\",\"nama_pelatihan\":\"Pelatihan PKGSD MBI\"}', NULL, '2026-10-22 18:20:26', '2026-10-22 18:20:26', 'sdas', 'asdasd', 'asd', 'asdasa', 'asdasd', NULL, NULL, NULL, 'asdas', 'smp 77 mataram', 'Rekan Sejawat/Guru', 'asdasasda', 'asdasd', '2026-10-23', 'asdasd', 'asdasd', 'asdas');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bcks_pengisians`
--
ALTER TABLE `bcks_pengisians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bk_answers`
--
ALTER TABLE `bk_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=718;

--
-- AUTO_INCREMENT for table `bk_essay_answers`
--
ALTER TABLE `bk_essay_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bk_questions`
--
ALTER TABLE `bk_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `bk_submissions`
--
ALTER TABLE `bk_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gembira_pengisians`
--
ALTER TABLE `gembira_pengisians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instrumens`
--
ALTER TABLE `instrumens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pkgsd_mbi_pengisians`
--
ALTER TABLE `pkgsd_mbi_pengisians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sekolahs`
--
ALTER TABLE `sekolahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tendiks`
--
ALTER TABLE `tendiks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tindak_lanjuts`
--
ALTER TABLE `tindak_lanjuts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `wawancaras`
--
ALTER TABLE `wawancaras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
