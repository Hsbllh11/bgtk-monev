
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Monev PM KKA - <?php echo e($pmKka->nama_guru); ?></title>

    <?php
// =====================================================================

        // DATA LEVEL 1: REACTION (29 Indikator)

        // =====================================================================

        $level1Data = [

            'indikator' => [

                ['no' => 1, 'indikator' => 'Kesesuaian program kegiatan dengan tujuan pelatihan'],

                ['no' => 2, 'indikator' => 'Kesesuaian bahan ajar dengan struktur program'],

                ['no' => 3, 'indikator' => 'Kesesuaian alokasi materi dengan bobot materi'],

                ['no' => 4, 'indikator' => 'Relevansi materi dengan kebutuhan peserta pelatihan dalam mendukung pelaksanaan tugas pendidik'],

                ['no' => 5, 'indikator' => 'Manfaat materi pelatihan dalam meningkatkan kompetensi peserta'],

                ['no' => 6, 'indikator' => 'Kesiapan dan ketersediaan sarana kegiatan [audio visual, LCD/laptop, papan putih, pelantang, spidol, penghapus].'],

                ['no' => 7, 'indikator' => 'Kenyamanan ruang kegiatan [ventilasi udara/AC, pencahayaan].'],

                ['no' => 8, 'indikator' => 'Kebersihan ruang kelas.'],

                ['no' => 9, 'indikator' => 'Ketersediaan sarana ibadah.'],

                ['no' => 10, 'indikator' => 'Ketersediaan akses internet'],

                ['no' => 11, 'indikator' => 'Fasilitator memfasilitasi dan mendampingi proses pembelajaran peserta.'],

                ['no' => 12, 'indikator' => 'Fasilitator menggunakan bahasa yang menghargai dan menghormati di dalam berkomunikasi dengan peserta.'],

                ['no' => 13, 'indikator' => 'Fasilitator memulai dan mengakhiri pembelajaran tepat waktu.'],

                ['no' => 14, 'indikator' => 'Fasilitator mampu menyampaikan materi dengan jelas dan tepat, sehingga peserta dapat memahami pembelajaran dengan baik.'],

                ['no' => 15, 'indikator' => 'Kemudahan dalam mengakses LMS Pembelajaran'],

                ['no' => 16, 'indikator' => 'Kemudahan dalam membaca materi/video yang ada di LMS'],

                ['no' => 17, 'indikator' => 'Kemudahan dalam mengikuti alur LMS'],

                ['no' => 18, 'indikator' => 'Kemudahan dalam pembelajaran di LMS'],

                ['no' => 19, 'indikator' => 'Kemudahan dalam berdiskusi di LMS'],

                ['no' => 20, 'indikator' => 'Kemudahan dalam mengumpulkan tugas di LMS'],

                ['no' => 21, 'indikator' => 'Kelengkapan dokumen/kit bahan kegiatan [materi, LMS, ATK]'],

                ['no' => 22, 'indikator' => 'Kualitas tampilan bahan tayang kegiatan.'],

                ['no' => 23, 'indikator' => 'Keterbacaan materi dan bahan tayang kegiatan.'],

                ['no' => 24, 'indikator' => 'Ketersediaan ilustrasi dan contoh pada bahan pembelajaran kegiatan.'],

                ['no' => 25, 'indikator' => 'Kesesuaian alokasi waktu pelaksanaan kegiatan dengan tujuan dan sasaran program kegiatan.'],

                ['no' => 26, 'indikator' => 'Ketepatan alokasi waktu untuk menyelesaikan setiap tagihan pembelajaran.'],

                ['no' => 27, 'indikator' => 'Kecukupan menu yang mendukung pemenuhan gizi.'],

                ['no' => 28, 'indikator' => 'Variasi hidangan/konsumsi.'],

                ['no' => 29, 'indikator' => 'Ketepatan waktu penyediaan konsumsi.'],

            ],

            'kelompok' => [

                '1' => 'Program dan Materi',

                '6' => 'Sarana dan Prasarana Penunjang Kegiatan',

                '11' => 'Fasilitator',

                '15' => 'Akses LMS',

                '21' => 'Bahan Kegiatan',

                '25' => 'Jangka Waktu Pelaksanaan Kegiatan',

                '27' => 'Layanan Menu',

            ],

            'label' => 'LEVEL 1 – REACTION',

            'deskripsi' => 'Nilai respons terhadap program dan pelaksanaan pelatihan.'

        ];



        // =====================================================================

        // DATA LEVEL 2: LEARNING (25 Indikator)

        // =====================================================================

        $level2Data = [

            'indikator' => [

                // TAHAP 1

                ['no' => 1, 'indikator' => 'Fasilitator membangun suasana belajar yang aman, inklusif, dan menghargai pengalaman guru.', 'rubrik' => ['Tidak membangun kesepakatan atau suasana aman; respons peserta diabaikan atau dinilai secara menghakimi.', 'Menyapa peserta dan menyampaikan aturan, tetapi belum memastikan semua merasa dilibatkan.', 'Membangun kesepakatan, menggunakan bahasa yang menghargai, dan membuka ruang bagi semua guru untuk berpartisipasi.', 'Secara konsisten menciptakan suasana aman; merespons perbedaan pendapat dengan hormat dan secara aktif mengundang suara peserta yang belum terlibat.']],

                ['no' => 2, 'indikator' => 'Fasilitator menggali pengetahuan awal dan pengalaman mengajar peserta terkait pembelajaran mendalam, koding, dan kecerdasan artifisial.', 'rubrik' => ['Langsung menyampaikan materi tanpa menggali pemahaman atau pengalaman peserta.', 'Mengajukan pertanyaan umum, tetapi jawaban peserta tidak ditindaklanjuti.', 'Menggunakan pertanyaan/aktivitas awal yang relevan dan mengaitkan jawaban dengan materi pelatihan.', 'Menggali pengalaman dengan beberapa cara, memetakan variasi pemahaman/kebutuhan, lalu menyesuaikan titik awal pelatihan.']],

                ['no' => 3, 'indikator' => 'Fasilitator menjelaskan tujuan, alur, dan hasil belajar pelatihan secara jelas.', 'rubrik' => ['Tujuan dan hasil yang diharapkan tidak disampaikan.', 'Tujuan disampaikan secara umum dan tidak dijelaskan kaitannya dengan praktik guru.', 'Tujuan, alur, dan hasil belajar dijelaskan serta dikaitkan dengan tugas peserta.', 'Tujuan dibuat terukur dan dipahami peserta; fasilitator mengajak peserta mengidentifikasi relevansinya dengan kebutuhan pembelajaran di kelas.']],

                ['no' => 4, 'indikator' => 'Fasilitator mengaitkan materi dengan tantangan nyata yang dihadapi guru dan konteks sekolah.', 'rubrik' => ['Materi disampaikan abstrak tanpa contoh konteks.', 'Memberi contoh, tetapi kurang sesuai dengan kondisi atau mata pelajaran peserta.', 'Menggunakan kasus nyata yang relevan dengan jenjang, mata pelajaran, atau kondisi sekolah.', 'Mengajak peserta membawa kasusnya sendiri dan menjadikannya sumber belajar sepanjang sesi.']],

                // TAHAP 2

                ['no' => 5, 'indikator' => 'Fasilitator menjelaskan prinsip pembelajaran mendalam secara runtut dan mudah dipahami.', 'rubrik' => ['Penjelasan tidak terstruktur atau terdapat kekeliruan konsep yang mendasar.', 'Menjelaskan istilah/prinsip secara umum, lebih banyak ceramah dan belum menghubungkan antarkonsep.', 'Menjelaskan prinsip secara runtut dengan contoh praktik pembelajaran yang relevan.', 'Membangun pemahaman melalui contoh, pertanyaan penghubung, dan perbandingan praktik; memastikan peserta dapat menjelaskan kembali maknanya.']],

                ['no' => 6, 'indikator' => 'Fasilitator memodelkan pengalaman belajar yang mencerminkan pembelajaran mendalam.', 'rubrik' => ['Tidak memberi contoh atau model pembelajaran; hanya menyampaikan definisi.', 'Memberi contoh kegiatan, tetapi tidak menunjukkan bagaimana kegiatan membangun pemahaman, aplikasi, atau refleksi murid.', 'Memodelkan kegiatan yang menunjukkan keterlibatan aktif, pemaknaan, penerapan, dan refleksi.', 'Memodelkan secara utuh sambil mengungkapkan alasan keputusan mengajar (mengapa strategi dipilih dan bagaimana respons murid ditindaklanjuti).']],

                ['no' => 7, 'indikator' => 'Fasilitator menjelaskan konsep dasar koding dan berpikir komputasional sesuai kebutuhan guru.', 'rubrik' => ['Tidak menjelaskan konsep dasar atau penjelasan membingungkan/tidak tepat.', 'Mengenalkan istilah seperti algoritma, pola, dekomposisi, atau debugging tanpa contoh yang cukup.', 'Menjelaskan konsep dengan contoh sederhana dan sesuai konteks pembelajaran.', 'Menghubungkan konsep secara runtut, menggunakan contoh lintas mata pelajaran, serta memeriksa pemahaman peserta melalui tugas/pertanyaan.']],

                ['no' => 8, 'indikator' => 'Fasilitator memodelkan aktivitas koding secara bertahap, termasuk proses mencoba dan memperbaiki kesalahan.', 'rubrik' => ['Tidak ada demonstrasi praktik koding.', 'Demonstrasi dilakukan, tetapi langkah-langkah dan tujuan tiap langkah tidak dijelaskan.', 'Mendemonstrasikan langkah secara runtut, menjelaskan logika, dan menunjukkan cara menemukan serta memperbaiki kesalahan.', 'Memodelkan proses berpikir secara eksplisit, memberi ruang prediksi peserta, dan menunjukkan beberapa cara/solusi yang mungkin.']],

                ['no' => 9, 'indikator' => 'Fasilitator menjelaskan peluang, keterbatasan, etika, dan penggunaan kecerdasan artifisial yang bertanggung jawab.', 'rubrik' => ['Mengabaikan aspek etika, keamanan, privasi, atau keterbatasan AI; atau menyampaikan klaim yang menyesatkan.', 'Menyebutkan risiko/etika secara sepintas tanpa contoh penerapan.', 'Menjelaskan manfaat, keterbatasan, verifikasi keluaran, privasi, bias, dan integritas akademik dengan contoh.', 'Mengajak peserta menilai kasus penggunaan AI secara kritis dan merumuskan prinsip penggunaan yang bertanggung jawab.']],

                ['no' => 10, 'indikator' => 'Fasilitator mendemonstrasikan penggunaan perangkat/aplikasi digital atau AI dengan tujuan pedagogis yang jelas.', 'rubrik' => ['Demonstrasi tidak dilakukan atau hanya berfokus pada fitur tanpa tujuan pembelajaran.', 'Menunjukkan fitur dasar, tetapi belum menjelaskan kapan dan mengapa digunakan dalam pembelajaran.', 'Mendemonstrasikan alur penggunaan dan mengaitkannya dengan tujuan/aktivitas belajar murid.', 'Membandingkan pilihan alat, menjelaskan kelebihan-keterbatasan dan alternatif rendah teknologi, serta menekankan bahwa alat melayani tujuan pedagogis.']],

                // TAHAP 3

                ['no' => 11, 'indikator' => 'Fasilitator memberi porsi waktu yang memadai bagi peserta untuk mencoba langsung.', 'rubrik' => ['Hampir seluruh sesi berupa paparan; peserta tidak memperoleh kesempatan praktik.', 'Praktik sangat singkat atau hanya dilakukan oleh beberapa peserta.', 'Sebagian besar peserta memperoleh waktu praktik yang cukup dengan instruksi yang jelas.', 'Praktik menjadi bagian utama sesi; fasilitator mengatur waktu, sumber daya, dan dukungan agar semua peserta mencoba secara mandiri/berkelompok.']],

                ['no' => 12, 'indikator' => 'Fasilitator memberikan instruksi tugas praktik yang jelas, bertahap, dan berorientasi pada hasil.', 'rubrik' => ['Tugas tidak jelas; peserta tidak memahami apa yang harus dilakukan atau dihasilkan.', 'Instruksi disampaikan, tetapi kriteria keberhasilan atau tahapan kerja tidak jelas.', 'Instruksi, tahapan, waktu, dan hasil yang diharapkan dijelaskan dengan jelas.', 'Memastikan pemahaman instruksi, menyediakan contoh/kriteria keberhasilan, dan memberi ruang peserta mengklarifikasi atau merencanakan strategi.']],

                ['no' => 13, 'indikator' => 'Fasilitator merancang praktik yang mengintegrasikan pembelajaran mendalam dengan koding dan/atau kecerdasan artifisial secara bermakna.', 'rubrik' => ['Praktik tidak terkait dengan tujuan belajar atau hanya menggunakan teknologi sebagai hiasan.', 'Ada penggunaan koding/AI, tetapi hubungan dengan proses berpikir dan tujuan pembelajaran belum jelas.', 'Praktik menghubungkan tujuan belajar, aktivitas bermakna, dan penggunaan koding/AI yang relevan.', 'Praktik menunjukkan integrasi yang kuat; peserta menimbang kesesuaian alat, proses berpikir murid, konteks, serta dampak/risikonya.']],

                ['no' => 14, 'indikator' => 'Fasilitator mendorong kolaborasi dan pertukaran praktik antarguru.', 'rubrik' => ['Peserta bekerja sendiri tanpa kesempatan berbagi atau berdiskusi.', 'Diskusi kelompok dilakukan, tetapi tanpa tujuan/peran yang jelas atau didominasi peserta tertentu.', 'Diskusi memiliki tugas yang jelas; peserta saling berbagi ide dan memberi masukan.', 'Fasilitator memastikan kontribusi merata, memanfaatkan keragaman pengalaman, dan meminta kelompok membandingkan serta menyintesis praktik.']],

                ['no' => 15, 'indikator' => 'Fasilitator memberikan pilihan atau penyesuaian aktivitas sesuai keragaman kemampuan dan kondisi peserta.', 'rubrik' => ['Menggunakan satu cara/tempo tanpa memperhatikan perbedaan kemampuan atau akses.', 'Mengakui perbedaan peserta, tetapi belum memberi dukungan atau alternatif konkret.', 'Memberi bantuan, pilihan tingkat tantangan, atau alternatif sesuai kebutuhan peserta.', 'Secara aktif memantau kebutuhan; menyediakan scaffolding dan tantangan lanjutan serta alternatif perangkat/koneksi atau aktivitas unplugged.']],

                // TAHAP 4

                ['no' => 16, 'indikator' => 'Fasilitator memantau keterlibatan dan kemajuan belajar peserta selama praktik.', 'rubrik' => ['Tidak berkeliling/memantau; kesulitan peserta tidak terdeteksi.', 'Memantau secara sporadis dan lebih banyak membantu peserta yang meminta.', 'Secara berkala memantau proses, mengidentifikasi kesulitan, dan memberi bantuan yang relevan.', 'Menggunakan hasil pemantauan untuk menyesuaikan tempo/strategi dan memastikan tidak ada peserta tertinggal.']],

                ['no' => 17, 'indikator' => 'Fasilitator menggunakan pertanyaan probing untuk menggali alasan dan cara berpikir peserta.', 'rubrik' => ['Tidak mengajukan pertanyaan atau hanya menanyakan apakah peserta sudah selesai.', 'Pertanyaan terbatas pada jawaban benar/salah atau instruksi teknis.', 'Mengajukan pertanyaan seperti "mengapa memilih cara ini?", "apa yang terjadi jika...?" atau "bagaimana memeriksanya?".', 'Menggunakan pertanyaan bertingkat untuk menggali asumsi, logika, alternatif, dampak, dan hubungan dengan praktik mengajar.']],

                ['no' => 18, 'indikator' => 'Fasilitator merespons kesalahan atau kebingungan peserta secara konstruktif.', 'rubrik' => ['Menyalahkan, mempermalukan, atau langsung mengambil alih pekerjaan peserta.', 'Memberi jawaban/cara jadi tanpa membantu peserta memahami sumber kesulitan.', 'Memberi petunjuk atau pertanyaan penuntun agar peserta dapat memperbaiki sendiri.', 'Menjadikan kesalahan sebagai sumber belajar; membantu peserta menelusuri penyebab, menguji alternatif, dan merefleksikan proses debugging/pemecahan masalah.']],

                ['no' => 19, 'indikator' => 'Fasilitator memberikan umpan balik yang spesifik, tepat waktu, dan dapat ditindaklanjuti.', 'rubrik' => ['Tidak memberi umpan balik atau hanya memberi penilaian umum.', 'Umpan balik berupa pujian/koreksi umum tanpa langkah perbaikan.', 'Umpan balik merujuk pada bukti pekerjaan dan menyebutkan langkah perbaikan yang jelas.', 'Umpan balik seimbang, dialogis, dan mendorong refleksi; peserta diberi kesempatan memperbaiki hasil berdasarkan umpan balik.']],

                ['no' => 20, 'indikator' => 'Fasilitator menjaga akurasi konsep dan membantu peserta memeriksa keluaran koding/AI secara kritis.', 'rubrik' => ['Membiarkan miskonsepsi atau menerima keluaran alat/AI tanpa pemeriksaan.', 'Meluruskan kekeliruan, tetapi belum menjelaskan cara memverifikasi.', 'Memeriksa ketepatan konsep/kode/keluaran AI dan menunjukkan cara menguji atau memverifikasinya.', 'Secara konsisten mencontohkan verifikasi, menguji asumsi/hasil, mengenali bias atau kesalahan, dan mengajak peserta melakukan pemeriksaan mandiri.']],

                // TAHAP 5

                ['no' => 21, 'indikator' => 'Fasilitator membimbing peserta menghasilkan rancangan penerapan di kelas.', 'rubrik' => ['Tidak ada produk/rencana penerapan yang dihasilkan peserta.', 'Peserta diminta membuat rencana umum tanpa panduan atau keterkaitan dengan kondisi kelas.', 'Membimbing peserta menyusun rancangan pembelajaran/aktivitas yang sesuai tujuan, murid, dan konteks sekolah.', 'Membimbing rancangan yang terukur dan realistis, termasuk tujuan, langkah, asesmen, kebutuhan alat, alternatif, serta aspek etika/keamanan AI.']],

                ['no' => 22, 'indikator' => 'Fasilitator mengajak peserta menilai kualitas rancangan atau produk praktik berdasarkan kriteria yang jelas.', 'rubrik' => ['Tidak ada peninjauan atau kriteria kualitas.', 'Peninjauan dilakukan secara umum tanpa kriteria yang dipahami peserta.', 'Menggunakan kriteria/rubrik sederhana dan memberi kesempatan revisi.', 'Melibatkan penilaian diri, telaah sejawat, dan revisi berbasis bukti dengan fokus pada dampak terhadap belajar murid.']],

                ['no' => 23, 'indikator' => 'Fasilitator memandu refleksi peserta tentang pembelajaran dan perubahan praktik yang akan dilakukan.', 'rubrik' => ['Tidak ada refleksi peserta.', 'Refleksi hanya berupa kesan umum atau pertanyaan "bagaimana perasaannya?"', 'Mengajukan pertanyaan spesifik tentang hal yang dipelajari, tantangan, dan penerapannya.', 'Memfasilitasi refleksi mendalam tentang perubahan pemahaman, bukti belajar, hambatan, dan langkah nyata setelah pelatihan.']],

                ['no' => 24, 'indikator' => 'Fasilitator menyepakati tindak lanjut dan cara memantau penerapan hasil pelatihan.', 'rubrik' => ['Tidak ada tindak lanjut.', 'Menyampaikan anjuran umum untuk menerapkan materi tanpa kesepakatan konkret.', 'Menyepakati langkah, waktu, atau bentuk berbagi praktik setelah pelatihan.', 'Menyusun tindak lanjut yang realistis dan terukur, termasuk dukungan/komunitas belajar, bukti penerapan, serta mekanisme umpan balik atau pendampingan.']],

                ['no' => 25, 'indikator' => 'Fasilitator menutup sesi dengan merangkum pembelajaran dan mengapresiasi proses peserta.', 'rubrik' => ['Menutup sesi tanpa rangkuman atau apresiasi.', 'Merangkum sendiri dan memberi apresiasi umum.', 'Mengajak peserta menyampaikan poin penting dan mengapresiasi usaha/proses belajar.', 'Rangkuman dibangun bersama peserta, menghubungkan konsep dengan praktik, mengapresiasi kontribusi secara spesifik, dan menegaskan langkah berikutnya.']],

            ],

            'kelompok' => [

                '1' => 'TAHAP 1. MEMBANGUN KESIAPAN DAN MENGGALI PENGALAMAN GURU',

                '5' => 'TAHAP 2. MEMODELKAN DAN MEMBANGUN PEMAHAMAN KONSEP',

                '11' => 'TAHAP 3. MEMFASILITASI PRAKTIK AKTIF DAN KOLABORASI GURU',

                '16' => 'TAHAP 4. MENDAMPINGI PROSES BERPIKIR DAN MEMBERI UMPAN BALIK',

                '21' => 'TAHAP 5. MENGUATKAN TRANSFER, REFLEKSI, DAN TINDAK LANJUT',

            ],

            'label' => 'LEVEL 2 – LEARNING',

            'deskripsi' => 'Observasi perilaku fasilitator dalam melatih guru.'

        ];



        $levelData = [

            '1' => $level1Data,

            '2' => $level2Data

        ];



        $levelPalette = [

            1 => ['badge' => 'background:#dbeafe;color:#1d4ed8', 'row' => '#eff4ff'],

            2 => ['badge' => 'background:#ede9fe;color:#6d28d9', 'row' => '#f5f1ff'],

        ];

        // Data jawaban dari database. Kedua level dihitung terpisah agar
        // nomor indikator yang sama tidak tercampur.
        $jawaban1 = is_array($pmKka->level_1_jawaban)
            ? $pmKka->level_1_jawaban
            : (json_decode($pmKka->level_1_jawaban ?? '[]', true) ?: []);

        $jawaban2 = is_array($pmKka->level_2_jawaban)
            ? $pmKka->level_2_jawaban
            : (json_decode($pmKka->level_2_jawaban ?? '[]', true) ?: []);

        $totalIndikator = count($level1Data['indikator']) + count($level2Data['indikator']);
        $totalSkor = 0;
        $jumlahDinilai = 0;

        foreach ([$jawaban1, $jawaban2] as $kumpulanJawaban) {
            foreach ($kumpulanJawaban as $item) {
                $skor = is_array($item) ? ($item['skor'] ?? null) : $item;

                if (is_numeric($skor) && (int) $skor >= 1 && (int) $skor <= 4) {
                    $totalSkor += (int) $skor;
                    $jumlahDinilai++;
                }
            }
        }

        $skorMaksimal = $jumlahDinilai * 4;
        $nilai = $skorMaksimal > 0 ? ($totalSkor / $skorMaksimal) * 100 : 0;

        $predikat = match (true) {
            $jumlahDinilai === 0 => 'Belum Dinilai',
            $nilai >= 85 => 'Sangat Baik',
            $nilai >= 70 => 'Baik',
            $nilai >= 55 => 'Cukup',
            default => 'Kurang',
        };

        $tanggalMonev = $pmKka->tanggal_monev
            ? \Illuminate\Support\Carbon::parse($pmKka->tanggal_monev)->format('d/m/Y')
            : '-';
    ?>

    <style>
        :root {
            --navy: #17365d;
            --blue: #245a91;
            --blue-light: #eaf2f8;
            --ink: #243447;
            --muted: #64748b;
            --line: #cbd5e1;
            --paper: #ffffff;
        }

        * { box-sizing: border-box; }
        html, body { margin: 0; padding: 0; background: #eef2f6; color: var(--ink); }
        body { font-family: Arial, Helvetica, sans-serif; font-size: 10pt; line-height: 1.45; }

        .print-toolbar {
            position: sticky; top: 0; z-index: 10; display: flex; justify-content: flex-end;
            gap: 10px; padding: 12px 20px; background: #fff; border-bottom: 1px solid var(--line);
        }
        .btn {
            display: inline-block; padding: 9px 15px; border: 0; border-radius: 6px;
            font-size: 13px; font-weight: 700; text-decoration: none; cursor: pointer;
        }
        .btn-back { color: #1e40af; background: #eaf0ff; }
        .btn-print { color: #fff; background: var(--blue); }

        .document {
            width: 210mm; min-height: 297mm; margin: 18px auto; padding: 17mm 16mm;
            background: var(--paper); box-shadow: 0 2px 14px rgba(15, 23, 42, .10);
        }
        .document-header {
            padding-bottom: 14px; margin-bottom: 20px; text-align: center;
            border-bottom: 3px double var(--navy);
        }
        .institution { color: var(--navy); font-size: 14pt; font-weight: 700; letter-spacing: .3px; }
        .document-title { margin: 12px 0 3px; color: var(--navy); font-size: 16pt; line-height: 1.3; }
        .document-subtitle { color: var(--muted); font-size: 10pt; }

        .section { margin-top: 18px; page-break-inside: auto; }
        .section-title {
            margin: 0 0 10px; padding: 7px 10px; color: var(--navy);
            background: var(--blue-light); border-left: 4px solid var(--blue);
            font-size: 11pt; font-weight: 700;
        }
        table { width: 100%; border-collapse: collapse; }
        .identity-table td { padding: 6px 7px; border: 1px solid var(--line); vertical-align: top; }
        .identity-table .label { width: 17%; background: #f8fafc; font-weight: 700; }
        .identity-table .value { width: 33%; overflow-wrap: anywhere; }

        .summary-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 9px; }
        .summary-card { padding: 12px 8px; text-align: center; border: 1px solid var(--line); border-radius: 6px; }
        .summary-label { color: var(--muted); font-size: 8.5pt; }
        .summary-value { margin-top: 5px; color: var(--navy); font-size: 16pt; font-weight: 700; }
        .summary-predikat { font-size: 13pt; }
        .score-total { margin-top: 8px; color: var(--muted); text-align: right; font-size: 8.5pt; }

        .indicator-table { table-layout: fixed; }
        .indicator-table th, .indicator-table td {
            padding: 6px 7px; border: 1px solid var(--line); vertical-align: top;
        }
        .indicator-table thead th { color: #fff; background: var(--navy); font-size: 8.5pt; text-align: center; }
        .indicator-table .number { width: 8%; text-align: center; }
        .indicator-table .question { width: 64%; }
        .indicator-table .score { width: 10%; text-align: center; font-weight: 700; }
        .indicator-table .rubric { width: 18%; font-size: 8pt; }
        .indicator-table tbody tr:nth-child(even):not(.group-row) { background: #fafcff; }
        .group-row td { padding: 7px 9px; color: var(--navy); background: #eaf2f8; font-weight: 700; }
        .rubric-text { color: #475569; }
        .qa-block { margin-bottom: 10px; border: 1px solid var(--line); page-break-inside: avoid; }
        .qa-question { padding: 6px 9px; color: var(--navy); background: #f1f5f9; font-weight: 700; }
        .qa-answer { min-height: 34px; padding: 8px 9px; white-space: pre-wrap; overflow-wrap: anywhere; }

        .signature-section { display: flex; justify-content: flex-end; margin-top: 35px; page-break-inside: avoid; }
        .signature-box { width: 230px; text-align: center; }
        .signature-title { font-weight: 700; }
        .signature-space { height: 65px; }
        .signature-name { padding-top: 5px; border-top: 1px solid #334155; font-weight: 700; }

        .no-print { }
        @page { size: A4 portrait; margin: 12mm; }
        @media print {
            html, body { background: #fff; }
            body { font-size: 9pt; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
            .no-print { display: none !important; }
            .document { width: auto; min-height: 0; margin: 0; padding: 0; box-shadow: none; }
            .section { page-break-inside: auto; }
            .section-title, .group-row { page-break-after: avoid; }
            thead { display: table-header-group; }
            tr { page-break-inside: avoid; }
            .summary-card, .group-row td, .section-title { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
        }
    </style>
</head>
<body>
    <div class="print-toolbar no-print">
        <a href="<?php echo e(route('pm-kka.show', $pmKka->id)); ?>" class="btn btn-back">Kembali</a>
        <button type="button" onclick="window.print()" class="btn btn-print">Cetak / Simpan PDF</button>
    </div>

    <main class="document">
        <header class="document-header">
            <div class="institution">Balai Guru dan Tenaga Kependidikan</div>
            <h1 class="document-title">HASIL MONITORING DAN EVALUASI PM KKA</h1>
            <div class="document-subtitle">Model Kirkpatrick</div>
        </header>

        <section class="section">
            <h2 class="section-title">A. Identitas</h2>
            <table class="identity-table">
                <tbody>
                    <tr>
                        <td class="label">Nama Guru</td><td class="value"><?php echo e($pmKka->nama_guru ?: '-'); ?></td>
                        <td class="label">Nama Sekolah</td><td class="value"><?php echo e($pmKka->nama_sekolah ?: '-'); ?></td>
                    </tr>
                    <tr>
                        <td class="label">Kelas / Fase</td><td class="value"><?php echo e($pmKka->kelas_fase ?: '-'); ?></td>
                        <td class="label">Topik / Materi</td><td class="value"><?php echo e($pmKka->topik_materi ?: '-'); ?></td>
                    </tr>
                    <tr>
                        <td class="label">Petugas Monev</td><td class="value"><?php echo e($pmKka->nama_petugas_monev ?: '-'); ?></td>
                        <td class="label">Jabatan Penilai</td><td class="value"><?php echo e($pmKka->jabatan_penilai ?: '-'); ?></td>
                    </tr>
                    <tr>
                        <td class="label">Tanggal Monev</td><td class="value"><?php echo e($tanggalMonev); ?></td>
                        <td class="label">Sumber Data</td><td class="value"><?php echo e($pmKka->sumber_data_bukti ?: '-'); ?></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section class="section">
            <h2 class="section-title">B. Ringkasan Hasil Evaluasi</h2>
            <div class="summary-grid">
                <div class="summary-card">
                    <div class="summary-label">Indikator Dinilai</div>
                    <div class="summary-value"><?php echo e($jumlahDinilai); ?> / <?php echo e($totalIndikator); ?></div>
                </div>
                <div class="summary-card">
                    <div class="summary-label">Nilai Akhir (100)</div>
                    <div class="summary-value"><?php echo e(number_format($nilai, 2, ',', '.')); ?></div>
                </div>
                <div class="summary-card">
                    <div class="summary-label">Predikat</div>
                    <div class="summary-value summary-predikat"><?php echo e($predikat); ?></div>
                </div>
            </div>
            <div class="score-total">Total skor: <?php echo e($totalSkor); ?> dari <?php echo e($skorMaksimal); ?> poin maksimal untuk indikator yang dinilai.</div>
        </section>

        <section class="section">
            <h2 class="section-title">C. Level 1 – Reaction</h2>
            <table class="indicator-table">
                <thead>
                    <tr>
                        <th class="number">No</th>
                        <th class="question">Pernyataan / Indikator</th>
                        <th class="score">Skor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $level1Data['indikator']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indikator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($level1Data['kelompok'][(string) $indikator['no']])): ?>
                            <tr class="group-row">
                                <td colspan="3"><?php echo e($level1Data['kelompok'][(string) $indikator['no']]); ?></td>
                            </tr>
                        <?php endif; ?>
                        <?php
                            $jawaban = $jawaban1[$indikator['no']] ?? [];
                            $skor = is_array($jawaban) ? ($jawaban['skor'] ?? '-') : ($jawaban ?: '-');
                        ?>
                        <tr>
                            <td class="number"><?php echo e($indikator['no']); ?></td>
                            <td class="question"><?php echo e($indikator['indikator']); ?></td>
                            <td class="score"><?php echo e($skor); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </section>

        <section class="section">
            <h2 class="section-title">D. Level 2 – Learning</h2>
            <table class="indicator-table">
                <thead>
                    <tr>
                        <th class="number">No</th>
                        <th class="question">Pernyataan / Indikator</th>
                        <th class="score">Skor</th>
                        <th class="rubric">Deskripsi Rubrik Terpilih</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $level2Data['indikator']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indikator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($level2Data['kelompok'][(string) $indikator['no']])): ?>
                            <tr class="group-row">
                                <td colspan="4"><?php echo e($level2Data['kelompok'][(string) $indikator['no']]); ?></td>
                            </tr>
                        <?php endif; ?>
                        <?php
                            $jawaban = $jawaban2[$indikator['no']] ?? [];
                            $skor = is_array($jawaban) ? ($jawaban['skor'] ?? null) : $jawaban;
                            $skorTampil = is_numeric($skor) ? (int) $skor : ($skor ?: '-');
                            $rubrikTerpilih = (is_numeric($skor) && isset($indikator['rubrik'][(int) $skor - 1]))
                                ? $indikator['rubrik'][(int) $skor - 1]
                                : '-';
                        ?>
                        <tr>
                            <td class="number"><?php echo e($indikator['no']); ?></td>
                            <td class="question"><?php echo e($indikator['indikator']); ?></td>
                            <td class="score"><?php echo e($skorTampil); ?></td>
                            <td class="rubric"><span class="rubric-text"><?php echo e($rubrikTerpilih); ?></span></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </section>

        <section class="section">
            <h2 class="section-title">E. Catatan & Rekomendasi</h2>
            <div class="qa-block">
                <div class="qa-question">Kekuatan dalam proses Pelatihan PM KKA yang paling menonjol?</div>
                <div class="qa-answer"><?php echo e($pmKka->catatan_kekuatan ?: '-'); ?></div>
            </div>
            <div class="qa-block">
                <div class="qa-question">Hal yang perlu ditingkatkan dalam proses Pelatihan PM KKA</div>
                <div class="qa-answer"><?php echo e($pmKka->catatan_pengembangan ?: '-'); ?></div>
            </div>
            <div class="qa-block">
                <div class="qa-question">Rekomendasi perbaikan untuk pelatihan berikutnya</div>
                <div class="qa-answer"><?php echo e($pmKka->rekomendasi ?: '-'); ?></div>
            </div>
            <div class="qa-block">
                <div class="qa-question">Catatan / bukti penting lainnya</div>
                <div class="qa-answer"><?php echo e($pmKka->catatan_lainnya ?: '-'); ?></div>
            </div>
        </section>

        <section class="signature-section">
            <div class="signature-box">
                <div class="signature-title">Petugas Monev</div>
                <div class="signature-space"></div>
                <div class="signature-name"><?php echo e($pmKka->nama_petugas_monev ?: '........................................'); ?></div>
            </div>
        </section>
    </main>
</body>
</html>
<?php /**PATH C:\Users\admin\Herd\bgtk-monev\resources\views/instrumen/pm-kka/cetak.blade.php ENDPATH**/ ?>