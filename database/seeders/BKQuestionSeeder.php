<?php

namespace Database\Seeders;

use App\Models\BKQuestion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BKQuestionSeeder extends Seeder
{
    public function run(): void
    {
        // Sumber: Instrumen_BK_Kirkpatrick (50 butir). Penomoran mengikuti dokumen sumber.
        $struktur = [
            1 => ['nama' => 'Reaksi (Reaction)', 'bagian' => [
                'A' => ['Materi Pelatihan', [
                    1 => 'Materi pelatihan 7 Jurus BK Hebat sesuai dengan tujuan pelatihan.',
                    2 => 'Materi yang disampaikan sesuai dengan kebutuhan dan tugas guru BK.',
                    3 => 'Bahan/modul pembelajaran yang diberikan membantu saya memahami 7 Jurus BK Hebat.',
                ]],
                'B' => ['Fasilitator Pelatihan', [
                    1 => 'Fasilitator menguasai materi 7 Jurus BK Hebat yang disampaikan.',
                    2 => 'Fasilitator menyampaikan materi secara sistematis dan mudah dipahami.',
                    3 => 'Fasilitator mampu membangun suasana pembelajaran yang aktif dan menyenangkan',
                ]],
                'C' => ['LMS Pelatihan', [
                    1 => 'Petunjuk penggunaan LMS mudah dipahami.',
                    2 => 'Kendala teknis dalam penggunaan LMS dapat ditangani dengan baik oleh admin/pengelola',
                ]],
                'D' => ['Kepanitiaan', [
                    1 => 'Sarana dan prasarana pada pelaksanaan luring mendukung proses pembelajaran.',
                    2 => 'Panitia/pengelola memberikan informasi dan layanan yang dibutuhkan peserta dengan baik.',
                ]],
            ]],

            2 => ['nama' => 'Pembelajaran (Learning)', 'bagian' => [
                'A' => ['Kualitas Penerapan Layanan BK', [
                    1 => 'Siswa menunjukkan peningkatan pemahaman tentang nilai-nilai kehidupan (seperti integritas, empati, dan tanggung jawab) setelah mengikuti layanan BK.',
                    3 => 'Siswa lebih aktif mencari bantuan untuk masalah akademik maupun non-akademik melalui layanan BK.',
                    4 => 'Guru BK lebih terampil dalam menggunakan metode konseling yang variatif (misalnya pendekatan CBT, solution-focused).',
                    5 => 'Layanan BK terintegrasi dengan program sekolah (misalnya pengembangan karakter, anti-bullying)',
                ]],
                'B' => ['Kinerja Guru BK Selama OJL', [
                    1 => 'Mampu menyusun RPL yang jelas dan terstruktur untuk mencapai tujuan pembinaan karakter positif siswa.',
                    2 => 'RPL yang disusun mencakup aspek pengembangan pribadi, sosial, belajar, dan karir siswa secara seimbang.',
                    3 => 'Melibatkan data kebutuhan siswa (misalnya, hasil asesmen, masukan guru/orang tua) dalam menyusun RPL.',
                    5 => 'Menyusun RPL dengan mempertimbangkan keragaman latar belakang dan kebutuhan siswa.',
                ]],
            ]],

            3 => ['nama' => 'Behavior', 'bagian' => [
                'A' => ['Keterampilan Guru BK', [
                    1 => 'Mampu merancang program BK yang efektif untuk membina karakter positif siswa.',
                    2 => 'Terampil dalam menggunakan teknik konseling (misalnya, refleksi, pertanyaan terbuka) untuk membantu siswa mengatasi masalah pribadi.',
                    3 => 'Aktif membimbing siswa dalam mengembangkan keterampilan sosial, seperti kerja sama dan komunikasi.',
                    4 => 'Mampu berkolaborasi dengan guru, orang tua, dan pihak terkait untuk mendukung perkembangan siswa secara holistik',
                ]],
                'B' => ['Penerapan Layanan Pembelajaran yang Bernuansa BK', [
                    1 => 'Pembelajaran di kelas lebih bernuansa pengembangan diri (misalnya refleksi nilai-nilai kehidupan, diskusi kasus).',
                    2 => 'Siswa mampu mengaitkan materi pembelajaran dengan aplikasi kehidupan nyata (misalnya keterampilan problem-solving).',
                    3 => 'Guru menggunakan asesmen yang mencakup aspek sikap dan sosial (tidak hanya kognitif).',
                    4 => 'Pembelajaran kolaboratif mendorong siswa untuk saling menghargai dan bekerja sama.',
                ]],
                'C' => ['Sikap Guru BK', [
                    1 => 'Mampu mengenali perubahan emosi atau perilaku siswa selama sesi konseling.',
                    2 => 'Menunjukkan sikap empati (misalnya, mendengarkan aktif, merespons dengan hangat) saat siswa bercerita tentang masalahnya.',
                    3 => 'Menyesuaikan pendekatan konseling berdasarkan kebutuhan dan respons siswa.',
                    4 => 'Memberikan ruang aman bagi siswa untuk mengekspresikan perasaan atau pikiran mereka tanpa takut dihakimi.',
                ]],
            ]],

            4 => ['nama' => 'Hasil (Result)', 'bagian' => [
                'A' => ['Pengetahuan Guru BK', [
                    1 => 'Memahami implementasi 7 Jurus BK Hebat dalam Layanan BK',
                    2 => 'Layanan BK yang dilakukan mencakup pengembangan pribadi, sosial, belajar, dan karir siswa secara seimbang.',
                    3 => 'Mampu membantu siswa mengenali potensi diri dan mengatasi masalah pribadi melalui layanan BK.',
                    4 => 'Aktif memandu siswa dalam mengeksplorasi minat dan bakat untuk perencanaan karir.',
                ]],
                'B' => ['Sikap Perubahan Positif dalam Pendekatan ke Murid', [
                    1 => 'Pendekatan terhadap siswa menjadi lebih personal dan memahami kebutuhan mereka.',
                    2 => 'Lebih sering menggunakan teknik komunikasi yang mendorong keterbukaan siswa (misalnya, pertanyaan terbuka, refleksi).',
                    3 => 'Adanya peningkatan keterlibatan siswa dalam proses pembelajaran atau konseling setelah perubahan pendekatan.',
                    4 => 'Siswa terlihat lebih nyaman dan percaya diri saat berinteraksi dengan guru.',
                ]],
                'C' => ['Iklim Kelas', [
                    1 => 'Siswa merasa aman dan nyaman dalam mengungkapkan pendapat atau pertanyaan tanpa takut dihakimi oleh guru atau teman sekelas.',
                    2 => 'Tidak ada kasus bullying, intimidasi, atau kekerasan verbal/fisik di dalam kelas',
                    3 => 'Siswa memahami dan mematuhi aturan kelas yang disepakati bersama untuk menciptakan lingkungan yang tertib dan aman.',
                ]],
                'D' => ['Suasana Kelas Menyenangkan', [
                    1 => 'Siswa antusias dan termotivasi untuk hadir dan berpartisipasi aktif dalam pembelajaran.',
                    2 => 'Pembelajaran dirancang dengan metode yang kreatif dan interaktif (misalnya permainan, proyek, atau diskusi kelompok).',
                    3 => 'Siswa merasa dihargai dan diterima apa adanya sehingga mereka lebih percaya diri.',
                ]],
                'E' => ['Layanan Pembelajaran', [
                    1 => 'Siswa merasa materi pembelajaran yang disampaikan guru mudah dipahami dan relevan dengan kebutuhan.',
                    2 => 'Metode pembelajaran yang digunakan guru (misalnya diskusi, proyek, atau media digital) membuat siswa lebih tertarik untuk belajar.',
                    3 => 'Guru memberikan kesempatan kepada siswa untuk bertanya atau mengungkapkan pendapat selama pembelajaran.',
                ]],
                'F' => ['Pembimbingan', [
                    1 => 'Guru memberikan bimbingan yang jelas tentang cara meningkatkan prestasi akademik atau keterampilan sosial siswa.',
                    2 => 'Siswa merasa nyaman untuk curhat atau meminta nasihat kepada guru tanpa takut dihakimi.',
                    3 => 'Guru membantu siswa mengenali potensi diri dan merencanakan langkah-langkah untuk mencapainya.',
                ]],
            ]],
        ];

        $questions = [];
        $urutan = 0;

        foreach ($struktur as $level => $lv) {
            foreach ($lv['bagian'] as $kode => [$judul, $butir]) {
                foreach ($butir as $nomor => $teks) {
                    $questions[] = [
                        'level' => $level,
                        'level_nama' => $lv['nama'],
                        'bagian' => $kode,
                        'judul_bagian' => $judul,
                        'nomor' => $nomor,
                        'pernyataan' => $teks,
                        'urutan' => ++$urutan,
                    ];
                }
            }
        }

        DB::transaction(function () use ($questions): void {
            // Nonaktifkan daftar lama; riwayat jawaban lama tetap tersimpan.
            BKQuestion::query()->update(['aktif' => false]);

            foreach ($questions as $question) {
                $existing = BKQuestion::query()
                    ->where('level', $question['level'])
                    ->where('bagian', $question['bagian'])
                    ->where('nomor', $question['nomor'])
                    ->where('pernyataan', $question['pernyataan'])
                    ->first();

                if ($existing) {
                    $existing->update(array_merge($question, ['aktif' => true]));
                } else {
                    BKQuestion::create(array_merge($question, ['aktif' => true]));
                }
            }
        });
    }
}