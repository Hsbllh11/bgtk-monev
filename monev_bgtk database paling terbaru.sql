-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2026 at 03:50 AM
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
  `jawaban` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 1, 'Reaksi (Reaction)', 'A', 'Materi Pelatihan', 1, 'Materi pelatihan 7 Jurus BK Hebat sesuai dengan tujuan pelatihan.', 1, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(2, 1, 'Reaksi (Reaction)', 'A', 'Materi Pelatihan', 2, 'Materi yang disampaikan sesuai dengan kebutuhan dan tugas guru BK.', 2, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(3, 1, 'Reaksi (Reaction)', 'A', 'Materi Pelatihan', 3, 'Bahan/modul pembelajaran yang diberikan membantu saya memahami 7 Jurus BK Hebat.', 3, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(4, 1, 'Reaksi (Reaction)', 'B', 'Fasilitator Pelatihan', 1, 'Fasilitator menguasai materi 7 Jurus BK Hebat yang disampaikan.', 4, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(5, 1, 'Reaksi (Reaction)', 'B', 'Fasilitator Pelatihan', 2, 'Fasilitator menyampaikan materi secara sistematis dan mudah dipahami.', 5, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(6, 1, 'Reaksi (Reaction)', 'B', 'Fasilitator Pelatihan', 3, 'Fasilitator mampu membangun suasana pembelajaran yang aktif dan menyenangkan', 6, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(7, 1, 'Reaksi (Reaction)', 'C', 'LMS Pelatihan', 1, 'Petunjuk penggunaan LMS mudah dipahami.', 7, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(8, 1, 'Reaksi (Reaction)', 'C', 'LMS Pelatihan', 2, 'Kendala teknis dalam penggunaan LMS dapat ditangani dengan baik oleh admin/pengelola', 8, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(9, 1, 'Reaksi (Reaction)', 'D', 'Kepanitiaan', 1, 'Sarana dan prasarana pada pelaksanaan luring mendukung proses pembelajaran.', 9, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(10, 1, 'Reaksi (Reaction)', 'D', 'Kepanitiaan', 2, 'Panitia/pengelola memberikan informasi dan layanan yang dibutuhkan peserta dengan baik.', 10, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(11, 2, 'Pembelajaran (Learning)', 'A', 'Kualitas Penerapan Layanan BK', 1, 'Siswa menunjukkan peningkatan pemahaman tentang nilai-nilai kehidupan (seperti integritas, empati, dan tanggung jawab) setelah mengikuti layanan BK.', 11, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(12, 2, 'Pembelajaran (Learning)', 'A', 'Kualitas Penerapan Layanan BK', 2, 'Penurunan kasus masalah sosial dan emosional di sekolah (misalnya bullying, konflik antar-siswa) karena intervensi layanan BK yang efektif.', 12, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(13, 2, 'Pembelajaran (Learning)', 'A', 'Kualitas Penerapan Layanan BK', 3, 'Siswa lebih aktif mencari bantuan untuk masalah akademik maupun non-akademik melalui layanan BK.', 13, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(14, 2, 'Pembelajaran (Learning)', 'A', 'Kualitas Penerapan Layanan BK', 4, 'Guru BK lebih terampil dalam menggunakan metode konseling yang variatif (misalnya pendekatan CBT, solution-focused).', 14, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(15, 2, 'Pembelajaran (Learning)', 'A', 'Kualitas Penerapan Layanan BK', 5, 'Layanan BK terintegrasi dengan program sekolah (misalnya pengembangan karakter, anti-bullying)', 15, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(16, 2, 'Pembelajaran (Learning)', 'B', 'Kinerja Guru BK Selama OJL', 1, 'Mampu menyusun RPL yang jelas dan terstruktur untuk mencapai tujuan pembinaan karakter positif siswa.', 16, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(17, 2, 'Pembelajaran (Learning)', 'B', 'Kinerja Guru BK Selama OJL', 2, 'RPL yang disusun mencakup aspek pengembangan pribadi, sosial, belajar, dan karir siswa secara seimbang.', 17, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(18, 2, 'Pembelajaran (Learning)', 'B', 'Kinerja Guru BK Selama OJL', 3, 'Melibatkan data kebutuhan siswa (misalnya, hasil asesmen, masukan guru/orang tua) dalam menyusun RPL.', 18, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(19, 2, 'Pembelajaran (Learning)', 'B', 'Kinerja Guru BK Selama OJL', 4, 'Menetapkan indikator keberhasilan yang terukur dalam RPL untuk mengevaluasi dampak layanan BK.', 19, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(20, 2, 'Pembelajaran (Learning)', 'B', 'Kinerja Guru BK Selama OJL', 5, 'Menyusun RPL dengan mempertimbangkan keragaman latar belakang dan kebutuhan siswa.', 20, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(21, 2, 'Pembelajaran (Learning)', 'B', 'Kinerja Guru BK Selama OJL', 6, 'Berkolaborasi dengan guru BK ketika menemukan siswa yang memerlukan pendampingan lebih intensif terkait masalah pribadi atau sosial', 21, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(22, 3, 'Behavior', 'A', 'Keterampilan Guru BK', 1, 'Mampu merancang program BK yang efektif untuk membina karakter positif siswa.', 22, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(23, 3, 'Behavior', 'A', 'Keterampilan Guru BK', 2, 'Terampil dalam menggunakan teknik konseling (misalnya, refleksi, pertanyaan terbuka) untuk membantu siswa mengatasi masalah pribadi.', 23, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(24, 3, 'Behavior', 'A', 'Keterampilan Guru BK', 3, 'Aktif membimbing siswa dalam mengembangkan keterampilan sosial, seperti kerja sama dan komunikasi.', 24, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(25, 3, 'Behavior', 'A', 'Keterampilan Guru BK', 5, 'Mampu mengevaluasi perkembangan siswa setelah mengikuti program BK dan memberikan tindak lanjut yang sesuai.', 25, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(26, 3, 'Behavior', 'A', 'Keterampilan Guru BK', 6, 'Mampu berkolaborasi dengan guru, orang tua, dan pihak terkait untuk mendukung perkembangan siswa secara holistik', 26, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(27, 3, 'Behavior', 'B', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 1, 'Pembelajaran di kelas lebih bernuansa pengembangan diri (misalnya refleksi nilai-nilai kehidupan, diskusi kasus).', 27, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(28, 3, 'Behavior', 'B', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 2, 'Siswa mampu mengaitkan materi pembelajaran dengan aplikasi kehidupan nyata (misalnya keterampilan problem-solving).', 28, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(29, 3, 'Behavior', 'B', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 3, 'Guru menggunakan asesmen yang mencakup aspek sikap dan sosial (tidak hanya kognitif).', 29, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(30, 3, 'Behavior', 'B', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 4, 'Pembelajaran kolaboratif mendorong siswa untuk saling menghargai dan bekerja sama.', 30, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(31, 3, 'Behavior', 'B', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 5, 'Siswa lebih termotivasi untuk belajar karena merasa dipahami dan dihargai sebagai individu', 31, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(32, 3, 'Behavior', 'C', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 1, 'Pembelajaran di kelas lebih bernuansa pengembangan diri (misalnya refleksi nilai-nilai kehidupan, diskusi kasus).', 32, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(33, 3, 'Behavior', 'C', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 2, 'Siswa mampu mengaitkan materi pembelajaran dengan aplikasi kehidupan nyata (misalnya keterampilan problem-solving).', 33, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(34, 3, 'Behavior', 'C', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 3, 'Guru menggunakan asesmen yang mencakup aspek sikap dan sosial (tidak hanya kognitif).', 34, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(35, 3, 'Behavior', 'C', 'Penerapan Layanan Pembelajaran yang Bernuansa BK', 4, 'Siswa lebih termotivasi untuk belajar karena merasa dipahami dan dihargai sebagai individu', 35, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(36, 3, 'Behavior', 'D', 'Sikap Guru BK', 1, 'Mampu mengenali perubahan emosi atau perilaku siswa selama sesi konseling.', 36, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(37, 3, 'Behavior', 'D', 'Sikap Guru BK', 2, 'Menunjukkan sikap empati (misalnya, mendengarkan aktif, merespons dengan hangat) saat siswa bercerita tentang masalahnya.', 37, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(38, 3, 'Behavior', 'D', 'Sikap Guru BK', 3, 'Menyesuaikan pendekatan konseling berdasarkan kebutuhan dan respons siswa.', 38, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(39, 3, 'Behavior', 'D', 'Sikap Guru BK', 4, 'Memberikan ruang aman bagi siswa untuk mengekspresikan perasaan atau pikiran mereka tanpa takut dihakimi.', 39, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(40, 4, 'Hasil (Result)', 'A', 'Pengetahuan Guru BK', 1, 'Memahami implementasi 7 Jurus BK Hebat dalam Layanan BK', 40, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(41, 4, 'Hasil (Result)', 'A', 'Pengetahuan Guru BK', 2, 'Layanan BK yang dilakukan mencakup pengembangan pribadi, sosial, belajar, dan karir siswa secara seimbang.', 41, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(42, 4, 'Hasil (Result)', 'A', 'Pengetahuan Guru BK', 3, 'Menggunakan metode kreatif (misalnya, role-play, diskusi kelompok) untuk membangun karakter positif siswa.', 42, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(43, 4, 'Hasil (Result)', 'A', 'Pengetahuan Guru BK', 4, 'Mampu membantu siswa mengenali potensi diri dan mengatasi masalah pribadi melalui layanan BK.', 43, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(44, 4, 'Hasil (Result)', 'A', 'Pengetahuan Guru BK', 5, 'Aktif memandu siswa dalam mengeksplorasi minat dan bakat untuk perencanaan karir.', 44, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(45, 4, 'Hasil (Result)', 'B', 'Sikap Perubahan Positif dalam Pendekatan ke Murid', 1, 'Pendekatan terhadap siswa menjadi lebih personal dan memahami kebutuhan mereka.', 45, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(46, 4, 'Hasil (Result)', 'B', 'Sikap Perubahan Positif dalam Pendekatan ke Murid', 2, 'Lebih sering menggunakan teknik komunikasi yang mendorong keterbukaan siswa (misalnya, pertanyaan terbuka, refleksi).', 46, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(47, 4, 'Hasil (Result)', 'B', 'Sikap Perubahan Positif dalam Pendekatan ke Murid', 3, 'Adanya peningkatan keterlibatan siswa dalam proses pembelajaran atau konseling setelah perubahan pendekatan.', 47, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(48, 4, 'Hasil (Result)', 'B', 'Sikap Perubahan Positif dalam Pendekatan ke Murid', 4, 'Lebih peka dalam mengenali tanda-tanda stres atau masalah emosional pada siswa.', 48, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(49, 4, 'Hasil (Result)', 'B', 'Sikap Perubahan Positif dalam Pendekatan ke Murid', 5, 'Siswa terlihat lebih nyaman dan percaya diri saat berinteraksi dengan guru.', 49, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(50, 4, 'Hasil (Result)', 'C', 'Iklim Kelas', 1, 'Siswa merasa aman dan nyaman dalam mengungkapkan pendapat atau pertanyaan tanpa takut dihakimi oleh guru atau teman sekelas.', 50, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(51, 4, 'Hasil (Result)', 'C', 'Iklim Kelas', 2, 'Tidak ada kasus bullying, intimidasi, atau kekerasan verbal/fisik di dalam kelas', 51, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(52, 4, 'Hasil (Result)', 'C', 'Iklim Kelas', 3, 'Siswa memahami dan mematuhi aturan kelas yang disepakati bersama untuk menciptakan lingkungan yang tertib dan aman.', 52, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(53, 4, 'Hasil (Result)', 'C', 'Iklim Kelas', 4, 'Guru merespons dengan cepat dan adil terhadap konflik atau ketidaknyamanan yang muncul di antara siswa.', 53, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(54, 4, 'Hasil (Result)', 'D', 'Suasana Kelas Menyenangkan', 1, 'Siswa antusias dan termotivasi untuk hadir dan berpartisipasi aktif dalam pembelajaran.', 54, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(55, 4, 'Hasil (Result)', 'D', 'Suasana Kelas Menyenangkan', 2, 'Pembelajaran dirancang dengan metode yang kreatif dan interaktif (misalnya permainan, proyek, atau diskusi kelompok).', 55, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(56, 4, 'Hasil (Result)', 'D', 'Suasana Kelas Menyenangkan', 3, 'Suasana kelas penuh dengan tawa, semangat, dan energi positif tanpa tekanan berlebihan.', 56, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(57, 4, 'Hasil (Result)', 'D', 'Suasana Kelas Menyenangkan', 4, 'Siswa merasa dihargai dan diterima apa adanya sehingga mereka lebih percaya diri.', 57, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(58, 4, 'Hasil (Result)', 'E', 'Layanan Pembelajaran', 1, 'Siswa merasa materi pembelajaran yang disampaikan guru mudah dipahami dan relevan dengan kebutuhan.', 58, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(59, 4, 'Hasil (Result)', 'E', 'Layanan Pembelajaran', 2, 'Metode pembelajaran yang digunakan guru (misalnya diskusi, proyek, atau media digital) membuat siswa lebih tertarik untuk belajar.', 59, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(60, 4, 'Hasil (Result)', 'E', 'Layanan Pembelajaran', 3, 'Siswa mendapatkan umpan balik yang jelas dan bermanfaat dari guru setelah mengerjakan tugas atau ujian.', 60, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(61, 4, 'Hasil (Result)', 'E', 'Layanan Pembelajaran', 4, 'Guru memberikan kesempatan kepada siswa untuk bertanya atau mengungkapkan pendapat selama pembelajaran.', 61, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(62, 4, 'Hasil (Result)', 'F', 'Pembimbingan', 1, 'Siswa merasa didukung oleh guru dalam mengatasi kesulitan belajar atau masalah pribadi.', 62, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(63, 4, 'Hasil (Result)', 'F', 'Pembimbingan', 2, 'Guru memberikan bimbingan yang jelas tentang cara meningkatkan prestasi akademik atau keterampilan sosial siswa.', 63, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(64, 4, 'Hasil (Result)', 'F', 'Pembimbingan', 3, 'Siswa merasa nyaman untuk curhat atau meminta nasihat kepada guru tanpa takut dihakimi.', 64, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32'),
(65, 4, 'Hasil (Result)', 'F', 'Pembimbingan', 4, 'Guru membantu ssiswa mengenali potensi diri dan merencanakan langkah-langkah untuk mencapainya.', 65, 1, '2026-10-22 19:18:32', '2026-10-22 19:18:32');

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
(25, '2026_10_23_015604_add_jawaban_6_8_to_wawancaras_table', 1);

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
('BMz5mFC1cLxZqvvAebd2IAkKYy5PLeU9VRwX452J', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.30.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJXazJpWFdyN1hDakdxNG1KaXJoc2RqWjAxSlFKU21FY0laQ0JMenUwIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvYmd0ay1tb25ldi50ZXN0XC8/aGVyZD1wcmV2aWV3In0sIl9wcmV2aW91cyI6eyJ1cmwiOiJodHRwOlwvXC9iZ3RrLW1vbmV2LnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6bnVsbH0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1792753717),
('epuO6lRWfMMdg6iw5L1ZJbvUUuYhertgJbeq9tBa', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.30.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJsd2gxMDc0RXkxUHN2WUF3VWpBZnR2MGNLMVJCeTZ3aVZpZWRTQkV4IiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvYmd0ay1tb25ldi50ZXN0XC8/aGVyZD1wcmV2aWV3In0sIl9wcmV2aW91cyI6eyJ1cmwiOiJodHRwOlwvXC9iZ3RrLW1vbmV2LnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6bnVsbH0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1792743404),
('nXh4bLYBmPFE6lk0MZCCmLfbL0YZRLf9Hoq7YO8a', 21, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0', 'eyJfdG9rZW4iOiJDYlg3elYyZWZyaDIxanRpUTNHckp5VGQ1ZHR1ckxRVUVjdlFpMXZPIiwiX2ZsYXNoIjp7Im5ldyI6W10sIm9sZCI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvYmd0ay1tb25ldi50ZXN0XC9kYXNoYm9hcmQiLCJyb3V0ZSI6ImRhc2hib2FyZCJ9LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MjEsInBhc3N3b3JkX2hhc2hfd2ViIjoiOGEyMzk3YTE0OWI0YTIxYWVhYWNhNjM4OTg2NzMwM2MwZmZhYzg0MmM4OGFiOTE3MzI4YWY0NTE5Y2M0NTE4YiJ9', 1792745955),
('o13F7ECuGPvOUeOsrEoCdXKp6wsYhFNYUIzb7WE7', 21, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0', 'eyJfdG9rZW4iOiJtekJqS0dLVkp5VWEzQk9vZ0JWWjhzV05RY1FzaG13bDlReEdyODVnIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2JndGstbW9uZXYudGVzdFwvZGFzaGJvYXJkIiwicm91dGUiOiJkYXNoYm9hcmQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MjEsInBhc3N3b3JkX2hhc2hfd2ViIjoiOGEyMzk3YTE0OWI0YTIxYWVhYWNhNjM4OTg2NzMwM2MwZmZhYzg0MmM4OGFiOTE3MzI4YWY0NTE5Y2M0NTE4YiJ9', 1792754806),
('q226fK6vAkIGm1hSlQZHtMUb7WGG55q4xEtUoqxG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.30.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJEOHgzWUlCMVNzOEUxSTFJQzM4bW84Rm5RQTRHYkVIV2UwQlQ5REgwIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2JndGstbW9uZXYudGVzdFwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1792743404),
('R6s80Gt4C5qwcGOBx5vJl5L70mb1Sw0Wbr5myqDG', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0', 'eyJfdG9rZW4iOiJDdGt0ZWQ2OFRmdTBGUGdZNGs1TFVKaGdTZmd5Z25Va2NPYUN1cmN0IiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2JndGstbW9uZXYudGVzdFwvdGVuZGlrXC9jcmVhdGUiLCJyb3V0ZSI6InRlbmRpay5jcmVhdGUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MSwicGFzc3dvcmRfaGFzaF93ZWIiOiI5ZTM4OTFhZTc5MjJmZTI1ZDRkNTlmY2RiMTc1MWEwY2FlNmE4YmYyODgwNGQ5NzIxZjc3NWVkMWQ1YjVhNTA4In0=', 1792757670),
('vu9qKvQa2TliTeIFYX5xzry8GmkjeyYffzRs1IFO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.30.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJlS1VySWY4UDFXbXVabTdxeUwxdE1mTDZtRUh5alhZY3MyaWZmRWxkIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2JndGstbW9uZXYudGVzdFwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1792753717);

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
(4, 'Adelina', 'adelina@bgtk-monev.local', NULL, '$2y$12$xkBYemJFdQYNVqZJPxPv6ezW1WMqVDAwxdeVIwlIrHfuBXLdqThUm', NULL, '2026-10-22 22:10:19', '2026-10-22 22:10:19', 'Adelina', '199902022025062009', 'petugas_monev', 1),
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bk_essay_answers`
--
ALTER TABLE `bk_essay_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bk_questions`
--
ALTER TABLE `bk_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `bk_submissions`
--
ALTER TABLE `bk_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
