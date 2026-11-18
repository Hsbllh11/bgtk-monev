{{-- resources/views/instrumen/pm-kka/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Instrumen Monitoring PM KKA')
@section('page-title', 'Edit Instrumen Monitoring PM KKA')

@section('content')
    @php
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
            'deskripsi' => 'Nilai respons terhadap program dan pelaksanaan pelatihan.',
            'jumlah' => 29,
            'badge' => 'background:#dbeafe;color:#1d4ed8',
            'bar' => '#2563eb',
            'row' => '#eff4ff',
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
            'deskripsi' => 'Observasi perilaku fasilitator dalam melatih guru.',
            'jumlah' => 25,
            'badge' => 'background:#ede9fe;color:#6d28d9',
            'bar' => '#7c3aed',
            'row' => '#f5f1ff',
        ];

        $levelConfig = [1 => $level1Data, 2 => $level2Data];
        $levelAktif = [1, 2];

        $levelPalette = [
            1 => ['badge' => 'background:#dbeafe;color:#1d4ed8', 'row' => '#eff4ff'],
            2 => ['badge' => 'background:#ede9fe;color:#6d28d9', 'row' => '#f5f1ff'],
        ];

        $jawabanLevel = [
            1 => is_array($pmKka->level_1_jawaban) ? $pmKka->level_1_jawaban : [],
            2 => is_array($pmKka->level_2_jawaban) ? $pmKka->level_2_jawaban : [],
        ];
    @endphp

    <style>
        /* ===================== TOKEN WARNA ===================== */
        :root {
            --p-50: #eff4ff; --p-100: #dbe7fe; --p-200: #bfd4fb;
            --p-500: #3b82f6; --p-600: #2563eb; --p-700: #1d4ed8;
            --accent: #f5b82e; --ink: #0f1b3d; --muted: #64748b; --line: #e6ebf5;
        }

        .d-wrap { display: flex; flex-direction: column; gap: 22px; }
        .d-form { display: flex; flex-direction: column; gap: 22px; }
        .d-card { background: #fff; border: 1px solid var(--line); border-radius: 18px; overflow: hidden; }
        .d-card-h { font-size: 16px; font-weight: 700; color: var(--ink); letter-spacing: -.01em; }
        .d-card-s { margin-top: 2px; font-size: 12.5px; color: var(--muted); }
        .d-card-top { display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; padding: 20px 20px 14px; }

        .d-title-row { display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; }
        @media (max-width: 640px) { .d-title-row { flex-direction: column; } }
        .d-h1 { font-size: 28px; font-weight: 400; letter-spacing: -.02em; color: var(--ink); line-height: 1.2; }
        .d-h1 b { font-weight: 700; }
        .d-crumb { margin-top: 4px; font-size: 12.5px; color: var(--muted); }
        .d-crumb a { color: inherit; transition: color .2s; text-decoration: none; }
        .d-crumb a:hover { color: var(--p-600); }
        .d-desc { margin-top: 10px; max-width: 640px; font-size: 13px; line-height: 1.7; color: #475569; }

        .d-pbtn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            flex-shrink: 0; height: 46px; padding: 0 18px; border-radius: 14px;
            background: var(--b-bg); border: 1px solid var(--b-line); color: var(--b-ink);
            font-family: inherit; font-size: 13.5px; font-weight: 700; cursor: pointer;
            white-space: nowrap; text-decoration: none; transition: transform .25s ease, box-shadow .25s ease, filter .25s ease;
        }
        .d-pbtn:hover { transform: translateY(-1px); filter: brightness(.97); box-shadow: 0 12px 22px -14px var(--b-glow); }
        .d-pbtn svg { flex-shrink: 0; transition: transform .3s ease; }
        .d-pbtn.back:hover svg { transform: translateX(-3px); }

        .b-blue { --b-bg: linear-gradient(160deg, #eaf0ff 0%, #d3e1ff 100%); --b-line: #c6d8fb; --b-ink: #1d4ed8; --b-glow: rgba(37, 99, 235, .7); }
        .b-mint { --b-bg: linear-gradient(160deg, #e9faf2 0%, #cdf0e0 100%); --b-line: #bfe8d4; --b-ink: #047857; --b-glow: rgba(5, 150, 105, .7); }

        .d-foot { display: flex; justify-content: flex-end; gap: 12px; flex-wrap: wrap; }

        .d-info-card { display: grid; grid-template-columns: minmax(0, 1fr); }
        @media (min-width: 1024px) { .d-info-card { grid-template-columns: minmax(0, 1fr) 280px; } }
        .d-info-main { padding: 22px; border-left: 4px solid var(--p-600); }
        .d-info-head { display: flex; align-items: flex-start; gap: 14px; }
        .d-info-ico { display: flex; align-items: center; justify-content: center; flex-shrink: 0; width: 44px; height: 44px; border-radius: 14px; background: var(--p-50); color: var(--p-600); }

        .d-note { display: flex; align-items: flex-start; gap: 10px; margin-top: 18px; padding: 12px 14px; border: 1px dashed var(--p-200); border-radius: 14px; background: #f5f8ff; font-size: 12.5px; line-height: 1.7; color: #475569; }
        .d-note b.t { display: block; font-weight: 700; color: var(--p-700); }
        .d-note ul { margin: 6px 0 0 16px; list-style: disc; }
        .d-note li + li { margin-top: 3px; }

        .d-prog { padding: 22px; border-top: 1px solid var(--line); background: #f9fbff; }
        @media (min-width: 1024px) { .d-prog { border-top: 0; border-left: 1px solid var(--line); } }
        .d-prog-row { display: flex; align-items: center; justify-content: space-between; gap: 10px; }
        .d-prog-label { font-size: 12px; font-weight: 600; color: var(--muted); }
        .d-prog-pct { font-size: 12px; font-weight: 800; color: var(--p-600); }
        .d-bar { height: 8px; margin-top: 10px; overflow: hidden; border-radius: 9999px; background: #e6ebf5; }
        .d-bar > div { height: 100%; border-radius: 9999px; background: var(--p-600); transition: width .3s ease; }
        .d-prog-val { font-size: 14px; font-weight: 800; color: var(--ink); }
        .d-prog-sep { margin-top: 18px; padding-top: 16px; border-top: 1px solid var(--line); }

        .d-error { padding: 16px 20px; border-radius: 16px; background: #fff1f2; border: 1px solid #fecdd3; color: #be123c; }
        .d-error b { font-size: 13px; font-weight: 700; }
        .d-error ul { margin: 8px 0 0 18px; list-style: disc; font-size: 12.5px; line-height: 1.8; }

        .d-form-grid { display: grid; gap: 18px; padding: 6px 20px 22px; grid-template-columns: minmax(0, 1fr); }
        @media (min-width: 768px) {
            .d-form-grid.c2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .d-form-grid .span2 { grid-column: 1 / -1; }
        }

        .d-label { display: block; margin-bottom: 8px; font-size: 12.5px; font-weight: 600; color: var(--ink); }
        .d-label i { color: #e11d48; font-style: normal; }
        .d-field { width: 100%; height: 44px; padding: 0 14px; border: 1px solid var(--line); border-radius: 12px; background: #fff; color: #334155; font-family: inherit; font-size: 13px; outline: none; transition: border-color .2s, box-shadow .2s; }
        textarea.d-field { height: auto; padding: 11px 14px; line-height: 1.6; resize: vertical; }
        .d-field::placeholder { color: #94a3b8; }
        .d-field:focus { border-color: var(--p-500); box-shadow: 0 0 0 4px var(--p-100); }
        .d-err { margin-top: 6px; font-size: 12px; color: #e11d48; }

        .d-badge { display: inline-flex; align-items: center; padding: 5px 10px; border-radius: 8px; font-size: 11.5px; font-weight: 700; text-align: center; white-space: nowrap; }

        .d-table { width: 100%; border-collapse: collapse; }
        .d-table th { padding: 12px 16px; font-size: 12px; font-weight: 600; color: var(--muted); text-align: left; white-space: nowrap; border-bottom: 1px solid var(--line); }
        .d-table th.center { text-align: center; }
        .d-table td { padding: 14px 16px; border-bottom: 1px solid var(--line); vertical-align: middle; }
        .d-table tbody tr.d-data { transition: background .2s; }
        .d-table tbody tr.d-data:hover { background: #f7f9ff; }
        .d-table tbody tr:last-child td { border-bottom: 0; }
        .d-table .txt { font-size: 12.5px; font-weight: 600; color: #475569; white-space: nowrap; text-align: center; }
        .d-table .q { font-size: 13px; line-height: 1.7; color: #334155; }
        .d-table td.d-group-cell { padding: 11px 16px; font-size: 12.5px; font-weight: 700; color: var(--ink); }
        .d-radio { width: 20px; height: 20px; margin: 0; cursor: pointer; accent-color: var(--p-600); }

        .d-group-bar { padding: 11px 20px; font-size: 12.5px; font-weight: 700; color: var(--ink); border-top: 1px solid var(--line); background: #f9fbff; }
        .d-item { padding: 20px; border-top: 1px solid var(--line); }
        .d-group-bar + .d-item { border-top: 0; }
        .d-item:first-child { border-top: 0; }
        .d-item-no { font-size: 11px; font-weight: 800; letter-spacing: .06em; text-transform: uppercase; color: #94a3b8; }
        .d-item-q { margin-top: 4px; font-size: 13.5px; font-weight: 600; line-height: 1.7; color: #334155; }

        .d-opts { display: grid; gap: 10px; margin-top: 14px; grid-template-columns: minmax(0, 1fr); }
        @media (min-width: 768px) {
            .d-opts { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .d-opts .span2 { grid-column: 1 / -1; }
        }

        .d-opt { display: flex; align-items: flex-start; gap: 12px; padding: 12px 14px; border: 1px solid var(--line); border-radius: 14px; background: #fff; cursor: pointer; transition: border-color .2s, background .2s; }
        .d-opt:hover { border-color: var(--p-200); background: #f7f9ff; }
        .d-opt:has(input:checked) { border-color: var(--p-500); background: var(--p-50); box-shadow: 0 0 0 3px var(--p-100); }
        .d-opt input { margin-top: 3px; accent-color: var(--p-600); }
        .d-opt-skor { display: inline-flex; align-items: center; justify-content: center; width: 24px; height: 24px; margin-bottom: 4px; border-radius: 8px; background: var(--p-50); color: var(--p-700); font-size: 11.5px; font-weight: 800; }
        .d-opt:has(input:checked) .d-opt-skor { background: var(--p-600); color: #fff; }
        .d-opt-txt { font-size: 12.5px; line-height: 1.7; color: #475569; }
    </style>

    <div class="d-wrap">

        {{-- ================= JUDUL HALAMAN ================= --}}
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Edit Instrumen Monev <b>PM KKA</b></h1>
                    <p class="d-crumb">
                        Dashboard  › 
                        <a href="{{ route('instrumen.index') }}">Instrumen</a>
                         ›  Edit Pengisian PM KKA
                    </p>
                    <p class="d-desc">
                        Perbarui biodata, identitas pemonev, catatan kualitatif, dan penilaian Level 1 sampai 2.
                    </p>
                </div>

                <a href="{{ route('pm-kka.show', $pmKka) }}" class="d-pbtn b-blue back">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </section>

        {{-- ================= INFORMASI INSTRUMEN & PROGRES ================= --}}
        <div class="d-card">
            <div class="d-info-card">
                <div class="d-info-main">
                    <div class="d-info-head">
                        <div class="d-info-ico">
                            <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>

                        <div style="min-width:0">
                            <h2 class="d-card-h">Instrumen Monitoring dan Evaluasi PM KKA</h2>
                            <p class="d-card-s" style="line-height:1.7">
                                Instrumen ini digunakan untuk mengevaluasi efektivitas pelatihan dan perilaku fasilitator.
                            </p>
                        </div>
                    </div>

                    <div class="d-note">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:3px;color:var(--p-600)">
                            <path d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>

                        <div>
                            <b class="t">Petunjuk pengisian</b>
                            <ul>
                                <li>Pilih skor yang deskripsinya paling sesuai dengan bukti, bukan kesan umum. Jika ragu antara dua skor, pilih yang lebih rendah.</li>
                                <li>Skor 3 dan 4 sah hanya jika disertai bukti. Tanpa bukti, skor diturunkan menjadi paling tinggi 2.</li>
                                <li>Setiap indikator dinilai berdasarkan deskripsinya sendiri.</li>
                                <li>Pastikan seluruh perubahan data telah sesuai sebelum menekan tombol Simpan Perubahan.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="d-prog">
                    <div class="d-prog-row">
                        <span class="d-prog-label">Progres pengisian</span>
                        <span id="pmkka-progress-percent" class="d-prog-pct">0%</span>
                    </div>

                    <div class="d-bar">
                        <div id="pmkka-progress-bar" style="width: 0%"></div>
                    </div>

                    <div class="d-prog-row" style="margin-top:10px">
                        <span id="pmkka-progress-text" class="d-prog-val">0 / 54 butir</span>
                        <span class="d-prog-label" style="font-weight:500">Penilaian</span>
                    </div>

                    <div class="d-prog-sep">
                        <p class="d-prog-label">Skor sementara</p>
                        <p id="pmkka-score-text" class="d-prog-val" style="margin-top:4px">Belum ada penilaian</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ================= VALIDATION ERROR ================= --}}
        @if ($errors->any())
            <div class="d-error">
                <b>Terdapat kesalahan pada pengisian:</b>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ================= FORM UTAMA ================= --}}
        <form action="{{ route('pm-kka.update', $pmKka) }}" method="POST" class="d-form" id="pmkka-form">
            @csrf
            @method('PUT')

            {{-- A. IDENTITAS --}}
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">A. Identitas</h2>
                        <p class="d-card-s">Informasi guru dan konteks pembelajaran yang dinilai.</p>
                    </div>
                </div>
                <div class="d-form-grid c2">
                    <div>
                        <label class="d-label">Nama Guru <i>*</i></label>
                        <input type="text" name="nama_guru" value="{{ old('nama_guru', $pmKka->nama_guru) }}" required class="d-field">
                        @error('nama_guru') <div class="d-err">{{ $message }}</div> @enderror
                    </div>
                    <div>
                        <label class="d-label">Nama Sekolah <i>*</i></label>
                        <input type="text" name="nama_sekolah" value="{{ old('nama_sekolah', $pmKka->nama_sekolah) }}" required class="d-field">
                        @error('nama_sekolah') <div class="d-err">{{ $message }}</div> @enderror
                    </div>
                    <div>
                        <label class="d-label">Kelas / Fase</label>
                        <input type="text" name="kelas_fase" value="{{ old('kelas_fase', $pmKka->kelas_fase) }}" class="d-field">
                        @error('kelas_fase') <div class="d-err">{{ $message }}</div> @enderror
                    </div>
                    <div>
                        <label class="d-label">Topik / Materi</label>
                        <input type="text" name="topik_materi" value="{{ old('topik_materi', $pmKka->topik_materi) }}" class="d-field">
                        @error('topik_materi') <div class="d-err">{{ $message }}</div> @enderror
                    </div>
                    <div>
                        <label class="d-label">Nama Petugas Monev <i>*</i></label>
                        <input type="text" name="nama_petugas_monev" value="{{ old('nama_petugas_monev', $pmKka->nama_petugas_monev) }}" required class="d-field">
                        @error('nama_petugas_monev') <div class="d-err">{{ $message }}</div> @enderror
                    </div>
                    <div>
                        <label class="d-label">Jabatan Penilai <i>*</i></label>
                        <input type="text" name="jabatan_penilai" value="{{ old('jabatan_penilai', $pmKka->jabatan_penilai) }}" required class="d-field">
                        @error('jabatan_penilai') <div class="d-err">{{ $message }}</div> @enderror
                    </div>
                    <div>
                        <label class="d-label">Tanggal Monev <i>*</i></label>
                        <input type="date" name="tanggal_monev" value="{{ old('tanggal_monev', $pmKka->tanggal_monev?->format('Y-m-d') ?? now()->format('Y-m-d')) }}" required class="d-field">
                        @error('tanggal_monev') <div class="d-err">{{ $message }}</div> @enderror
                    </div>
                    <div>
                        <label class="d-label">Sumber Data / Bukti</label>
                        <input type="text" name="sumber_data_bukti" value="{{ old('sumber_data_bukti', $pmKka->sumber_data_bukti) }}" class="d-field">
                        @error('sumber_data_bukti') <div class="d-err">{{ $message }}</div> @enderror
                    </div>
                </div>
            </section>

            {{-- ================= LEVEL 1 & 2 ================= --}}
            @foreach ($levelConfig as $levelKey => $level)
                @php
                    $palet = $levelPalette[(int) $levelKey] ?? $levelPalette[1];
                    $jumlahIndikatorLevel = count($level['indikator'] ?? []);
                    $savedAnswers = $jawabanLevel[$levelKey] ?? [];
                @endphp

                <section class="d-card">
                    <div class="d-card-top">
                        <div>
                            <h2 class="d-card-h">{{ $level['label'] }}</h2>
                            @if (!empty($level['deskripsi']))
                                <p class="d-card-s" style="line-height:1.7">{{ $level['deskripsi'] }}</p>
                            @endif
                        </div>
                        <span class="d-badge" style="{{ $palet['badge'] }}">{{ $jumlahIndikatorLevel }} indikator</span>
                    </div>

                    @if ((string) $levelKey === '1')
                        {{-- LEVEL 1: TABEL --}}
                        <div style="overflow-x:auto">
                            <table class="d-table" style="min-width:760px">
                                <thead>
                                    <tr>
                                        <th class="center" style="width:80px">No</th>
                                        <th>Pernyataan / Indikator</th>
                                        @foreach ([1, 2, 3, 4] as $skor)
                                            <th class="center" style="width:80px">{{ $skor }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($level['indikator'] as $indikator)
                                        @php
                                            $no = $indikator['no'];
                                            $itemSaved = data_get($savedAnswers, $no);
                                            $skorSaved = is_array($itemSaved) ? ($itemSaved['skor'] ?? null) : $itemSaved;
                                            $currentSkor = (string) old("level_1_jawaban.{$no}.skor", $skorSaved);
                                        @endphp

                                        @if (isset($level['kelompok'][(string) $no]))
                                            <tr>
                                                <td colspan="6" class="d-group-cell" style="background: {{ $palet['row'] }}">
                                                    {{ $level['kelompok'][(string) $no] }}
                                                </td>
                                            </tr>
                                        @endif
                                        <tr class="d-data">
                                            <td class="txt">{{ $no }}</td>
                                            <td class="q">{{ $indikator['indikator'] }}</td>
                                            @foreach ([1, 2, 3, 4] as $skor)
                                                <td style="text-align:center">
                                                    <input type="radio" name="level_1_jawaban[{{ $no }}][skor]" value="{{ $skor }}" @checked($currentSkor === (string) $skor) class="d-radio">
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        {{-- LEVEL 2: KARTU RUBRIK --}}
                        <div>
                            @foreach ($level['indikator'] as $indikator)
                                @php
                                    $no = $indikator['no'];
                                    $itemSaved2 = data_get($savedAnswers, $no);
                                    $skorSaved2 = is_array($itemSaved2) ? ($itemSaved2['skor'] ?? null) : $itemSaved2;
                                    $currentSkor2 = (string) old("level_2_jawaban.{$no}.skor", $skorSaved2);
                                @endphp

                                @if (isset($level['kelompok'][(string) $no]))
                                    <div class="d-group-bar" style="background: {{ $palet['row'] }}">
                                        {{ $level['kelompok'][(string) $no] }}
                                    </div>
                                @endif
                                <div class="d-item" data-pmkka-item>
                                    <div>
                                        <p class="d-item-no">Indikator {{ $no }}</p>
                                        <p class="d-item-q">{{ $indikator['indikator'] }}</p>
                                    </div>
                                    <div class="d-opts">
                                        @foreach ($indikator['rubrik'] as $idx => $rubrik)
                                            <label class="d-opt">
                                                <input type="radio" name="level_2_jawaban[{{ $no }}][skor]" value="{{ $idx + 1 }}" @checked($currentSkor2 === (string) ($idx + 1)) class="d-radio">
                                                <span>
                                                    <span class="d-opt-skor">{{ $idx + 1 }}</span>
                                                    <span class="d-opt-txt" style="display:block">{{ $rubrik }}</span>
                                                </span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </section>
            @endforeach

            {{-- REKAP & CATATAN --}}
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">Rekapitulasi & Catatan Tambahan</h2>
                        <p class="d-card-s">Kekuatan, area pengembangan, dan rekomendasi.</p>
                    </div>
                </div>
                <div class="d-form-grid">
                    <div>
                        <label class="d-label">Kekuatan dalam proses Pelatihan PM KKA yang paling menonjol?</label>
                        <textarea name="catatan_kekuatan" rows="3" class="d-field">{{ old('catatan_kekuatan', $pmKka->catatan_kekuatan) }}</textarea>
                        @error('catatan_kekuatan') <div class="d-err">{{ $message }}</div> @enderror
                    </div>
                    <div>
                        <label class="d-label">Hal apa saja yang perlu ditingkatkan dalam proses Pelatihan PM KKA?</label>
                        <textarea name="catatan_pengembangan" rows="3" class="d-field">{{ old('catatan_pengembangan', $pmKka->catatan_pengembangan) }}</textarea>
                        @error('catatan_pengembangan') <div class="d-err">{{ $message }}</div> @enderror
                    </div>
                    <div>
                        <label class="d-label">Apa Rekomendasi perbaikan untuk pelatihan berikutnya?</label>
                        <textarea name="rekomendasi" rows="3" class="d-field">{{ old('rekomendasi', $pmKka->rekomendasi) }}</textarea>
                        @error('rekomendasi') <div class="d-err">{{ $message }}</div> @enderror
                    </div>
                    <div>
                        <label class="d-label">Catatan/bukti penting lainnya:</label>
                        <textarea name="catatan_lainnya" rows="3" class="d-field">{{ old('catatan_lainnya', $pmKka->catatan_lainnya) }}</textarea>
                        @error('catatan_lainnya') <div class="d-err">{{ $message }}</div> @enderror
                    </div>
                </div>
            </section>

            <div class="d-foot">
                <a href="{{ route('pm-kka.show', $pmKka) }}" class="d-pbtn b-blue back">Batal</a>
                <button type="submit" class="d-pbtn b-mint">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                        <path d="M17 21v-8H7v8M7 3v5h8" />
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    {{-- ================= JAVASCRIPT PROGRES ================= --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('pmkka-form');
            const totalIndikator = 54; // 29 Level 1 + 25 Level 2

            function updateProgress() {
                const activeRadios = [...form.querySelectorAll('input[type="radio"][name*="_jawaban"]:checked')];
                const names = [...new Set([...form.querySelectorAll('input[type="radio"][name*="_jawaban"]')].map(el => el.name))];
                
                let totalScore = 0;
                activeRadios.forEach(el => {
                    totalScore += Number(el.value);
                });

                const percent = names.length ? Math.round(activeRadios.length / names.length * 100) : 0;

                document.getElementById('pmkka-progress-percent').textContent = percent + '%';
                document.getElementById('pmkka-progress-bar').style.width = percent + '%';
                document.getElementById('pmkka-progress-text').textContent = activeRadios.length + ' / ' + names.length + ' butir';
                document.getElementById('pmkka-score-text').textContent = activeRadios.length
                    ? totalScore + ' poin dari ' + activeRadios.length + ' indikator'
                    : 'Belum ada penilaian';
            }

            form.querySelectorAll('input[type="radio"]').forEach(el => {
                el.addEventListener('change', updateProgress);
            });

            updateProgress();
        });
    </script>
@endsection