


<?php $__env->startSection('title', 'Hasil Pengisian PM KKA'); ?>
<?php $__env->startSection('page-title', 'Hasil Pengisian PM KKA'); ?>

<?php $__env->startSection('content'); ?>
    <?php
        /*
        |--------------------------------------------------------------------------
        | DATA INSTRUMEN LEVEL 1 & 2 (disalin dari create.blade.php)
        |--------------------------------------------------------------------------
        */

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

        $level2Data = [
            'indikator' => [
                ['no' => 1, 'indikator' => 'Fasilitator membangun suasana belajar yang aman, inklusif, dan menghargai pengalaman guru.', 'rubrik' => ['Tidak membangun kesepakatan atau suasana aman; respons peserta diabaikan atau dinilai secara menghakimi.', 'Menyapa peserta dan menyampaikan aturan, tetapi belum memastikan semua merasa dilibatkan.', 'Membangun kesepakatan, menggunakan bahasa yang menghargai, dan membuka ruang bagi semua guru untuk berpartisipasi.', 'Secara konsisten menciptakan suasana aman; merespons perbedaan pendapat dengan hormat dan secara aktif mengundang suara peserta yang belum terlibat.']],
                ['no' => 2, 'indikator' => 'Fasilitator menggali pengetahuan awal dan pengalaman mengajar peserta terkait pembelajaran mendalam, koding, dan kecerdasan artifisial.', 'rubrik' => ['Langsung menyampaikan materi tanpa menggali pemahaman atau pengalaman peserta.', 'Mengajukan pertanyaan umum, tetapi jawaban peserta tidak ditindaklanjuti.', 'Menggunakan pertanyaan/aktivitas awal yang relevan dan mengaitkan jawaban dengan materi pelatihan.', 'Menggali pengalaman dengan beberapa cara, memetakan variasi pemahaman/kebutuhan, lalu menyesuaikan titik awal pelatihan.']],
                ['no' => 3, 'indikator' => 'Fasilitator menjelaskan tujuan, alur, dan hasil belajar pelatihan secara jelas.', 'rubrik' => ['Tujuan dan hasil yang diharapkan tidak disampaikan.', 'Tujuan disampaikan secara umum dan tidak dijelaskan kaitannya dengan praktik guru.', 'Tujuan, alur, dan hasil belajar dijelaskan serta dikaitkan dengan tugas peserta.', 'Tujuan dibuat terukur dan dipahami peserta; fasilitator mengajak peserta mengidentifikasi relevansinya dengan kebutuhan pembelajaran di kelas.']],
                ['no' => 4, 'indikator' => 'Fasilitator mengaitkan materi dengan tantangan nyata yang dihadapi guru dan konteks sekolah.', 'rubrik' => ['Materi disampaikan abstrak tanpa contoh konteks.', 'Memberi contoh, tetapi kurang sesuai dengan kondisi atau mata pelajaran peserta.', 'Menggunakan kasus nyata yang relevan dengan jenjang, mata pelajaran, atau kondisi sekolah.', 'Mengajak peserta membawa kasusnya sendiri dan menjadikannya sumber belajar sepanjang sesi.']],
                ['no' => 5, 'indikator' => 'Fasilitator menjelaskan prinsip pembelajaran mendalam secara runtut dan mudah dipahami.', 'rubrik' => ['Penjelasan tidak terstruktur atau terdapat kekeliruan konsep yang mendasar.', 'Menjelaskan istilah/prinsip secara umum, lebih banyak ceramah dan belum menghubungkan antarkonsep.', 'Menjelaskan prinsip secara runtut dengan contoh praktik pembelajaran yang relevan.', 'Membangun pemahaman melalui contoh, pertanyaan penghubung, dan perbandingan praktik; memastikan peserta dapat menjelaskan kembali maknanya.']],
                ['no' => 6, 'indikator' => 'Fasilitator memodelkan pengalaman belajar yang mencerminkan pembelajaran mendalam.', 'rubrik' => ['Tidak memberi contoh atau model pembelajaran; hanya menyampaikan definisi.', 'Memberi contoh kegiatan, tetapi tidak menunjukkan bagaimana kegiatan membangun pemahaman, aplikasi, atau refleksi murid.', 'Memodelkan kegiatan yang menunjukkan keterlibatan aktif, pemaknaan, penerapan, dan refleksi.', 'Memodelkan secara utuh sambil mengungkapkan alasan keputusan mengajar (mengapa strategi dipilih dan bagaimana respons murid ditindaklanjuti).']],
                ['no' => 7, 'indikator' => 'Fasilitator menjelaskan konsep dasar koding dan berpikir komputasional sesuai kebutuhan guru.', 'rubrik' => ['Tidak menjelaskan konsep dasar atau penjelasan membingungkan/tidak tepat.', 'Mengenalkan istilah seperti algoritma, pola, dekomposisi, atau debugging tanpa contoh yang cukup.', 'Menjelaskan konsep dengan contoh sederhana dan sesuai konteks pembelajaran.', 'Menghubungkan konsep secara runtut, menggunakan contoh lintas mata pelajaran, serta memeriksa pemahaman peserta melalui tugas/pertanyaan.']],
                ['no' => 8, 'indikator' => 'Fasilitator memodelkan aktivitas koding secara bertahap, termasuk proses mencoba dan memperbaiki kesalahan.', 'rubrik' => ['Tidak ada demonstrasi praktik koding.', 'Demonstrasi dilakukan, tetapi langkah-langkah dan tujuan tiap langkah tidak dijelaskan.', 'Mendemonstrasikan langkah secara runtut, menjelaskan logika, dan menunjukkan cara menemukan serta memperbaiki kesalahan.', 'Memodelkan proses berpikir secara eksplisit, memberi ruang prediksi peserta, dan menunjukkan beberapa cara/solusi yang mungkin.']],
                ['no' => 9, 'indikator' => 'Fasilitator menjelaskan peluang, keterbatasan, etika, dan penggunaan kecerdasan artifisial yang bertanggung jawab.', 'rubrik' => ['Mengabaikan aspek etika, keamanan, privasi, atau keterbatasan AI; atau menyampaikan klaim yang menyesatkan.', 'Menyebutkan risiko/etika secara sepintas tanpa contoh penerapan.', 'Menjelaskan manfaat, keterbatasan, verifikasi keluaran, privasi, bias, dan integritas akademik dengan contoh.', 'Mengajak peserta menilai kasus penggunaan AI secara kritis dan merumuskan prinsip penggunaan yang bertanggung jawab.']],
                ['no' => 10, 'indikator' => 'Fasilitator mendemonstrasikan penggunaan perangkat/aplikasi digital atau AI dengan tujuan pedagogis yang jelas.', 'rubrik' => ['Demonstrasi tidak dilakukan atau hanya berfokus pada fitur tanpa tujuan pembelajaran.', 'Menunjukkan fitur dasar, tetapi belum menjelaskan kapan dan mengapa digunakan dalam pembelajaran.', 'Mendemonstrasikan alur penggunaan dan mengaitkannya dengan tujuan/aktivitas belajar murid.', 'Membandingkan pilihan alat, menjelaskan kelebihan-keterbatasan dan alternatif rendah teknologi, serta menekankan bahwa alat melayani tujuan pedagogis.']],
                ['no' => 11, 'indikator' => 'Fasilitator memberi porsi waktu yang memadai bagi peserta untuk mencoba langsung.', 'rubrik' => ['Hampir seluruh sesi berupa paparan; peserta tidak memperoleh kesempatan praktik.', 'Praktik sangat singkat atau hanya dilakukan oleh beberapa peserta.', 'Sebagian besar peserta memperoleh waktu praktik yang cukup dengan instruksi yang jelas.', 'Praktik menjadi bagian utama sesi; fasilitator mengatur waktu, sumber daya, dan dukungan agar semua peserta mencoba secara mandiri/berkelompok.']],
                ['no' => 12, 'indikator' => 'Fasilitator memberikan instruksi tugas praktik yang jelas, bertahap, dan berorientasi pada hasil.', 'rubrik' => ['Tugas tidak jelas; peserta tidak memahami apa yang harus dilakukan atau dihasilkan.', 'Instruksi disampaikan, tetapi kriteria keberhasilan atau tahapan kerja tidak jelas.', 'Instruksi, tahapan, waktu, dan hasil yang diharapkan dijelaskan dengan jelas.', 'Memastikan pemahaman instruksi, menyediakan contoh/kriteria keberhasilan, dan memberi ruang peserta mengklarifikasi atau merencanakan strategi.']],
                ['no' => 13, 'indikator' => 'Fasilitator merancang praktik yang mengintegrasikan pembelajaran mendalam dengan koding dan/atau kecerdasan artifisial secara bermakna.', 'rubrik' => ['Praktik tidak terkait dengan tujuan belajar atau hanya menggunakan teknologi sebagai hiasan.', 'Ada penggunaan koding/AI, tetapi hubungan dengan proses berpikir dan tujuan pembelajaran belum jelas.', 'Praktik menghubungkan tujuan belajar, aktivitas bermakna, dan penggunaan koding/AI yang relevan.', 'Praktik menunjukkan integrasi yang kuat; peserta menimbang kesesuaian alat, proses berpikir murid, konteks, serta dampak/risikonya.']],
                ['no' => 14, 'indikator' => 'Fasilitator mendorong kolaborasi dan pertukaran praktik antarguru.', 'rubrik' => ['Peserta bekerja sendiri tanpa kesempatan berbagi atau berdiskusi.', 'Diskusi kelompok dilakukan, tetapi tanpa tujuan/peran yang jelas atau didominasi peserta tertentu.', 'Diskusi memiliki tugas yang jelas; peserta saling berbagi ide dan memberi masukan.', 'Fasilitator memastikan kontribusi merata, memanfaatkan keragaman pengalaman, dan meminta kelompok membandingkan serta menyintesis praktik.']],
                ['no' => 15, 'indikator' => 'Fasilitator memberikan pilihan atau penyesuaian aktivitas sesuai keragaman kemampuan dan kondisi peserta.', 'rubrik' => ['Menggunakan satu cara/tempo tanpa memperhatikan perbedaan kemampuan atau akses.', 'Mengakui perbedaan peserta, tetapi belum memberi dukungan atau alternatif konkret.', 'Memberi bantuan, pilihan tingkat tantangan, atau alternatif sesuai kebutuhan peserta.', 'Secara aktif memantau kebutuhan; menyediakan scaffolding dan tantangan lanjutan serta alternatif perangkat/koneksi atau aktivitas unplugged.']],
                ['no' => 16, 'indikator' => 'Fasilitator memantau keterlibatan dan kemajuan belajar peserta selama praktik.', 'rubrik' => ['Tidak berkeliling/memantau; kesulitan peserta tidak terdeteksi.', 'Memantau secara sporadis dan lebih banyak membantu peserta yang meminta.', 'Secara berkala memantau proses, mengidentifikasi kesulitan, dan memberi bantuan yang relevan.', 'Menggunakan hasil pemantauan untuk menyesuaikan tempo/strategi dan memastikan tidak ada peserta tertinggal.']],
                ['no' => 17, 'indikator' => 'Fasilitator menggunakan pertanyaan probing untuk menggali alasan dan cara berpikir peserta.', 'rubrik' => ['Tidak mengajukan pertanyaan atau hanya menanyakan apakah peserta sudah selesai.', 'Pertanyaan terbatas pada jawaban benar/salah atau instruksi teknis.', 'Mengajukan pertanyaan seperti "mengapa memilih cara ini?", "apa yang terjadi jika...?" atau "bagaimana memeriksanya?".', 'Menggunakan pertanyaan bertingkat untuk menggali asumsi, logika, alternatif, dampak, dan hubungan dengan praktik mengajar.']],
                ['no' => 18, 'indikator' => 'Fasilitator merespons kesalahan atau kebingungan peserta secara konstruktif.', 'rubrik' => ['Menyalahkan, mempermalukan, atau langsung mengambil alih pekerjaan peserta.', 'Memberi jawaban/cara jadi tanpa membantu peserta memahami sumber kesulitan.', 'Memberi petunjuk atau pertanyaan penuntun agar peserta dapat memperbaiki sendiri.', 'Menjadikan kesalahan sebagai sumber belajar; membantu peserta menelusuri penyebab, menguji alternatif, dan merefleksikan proses debugging/pemecahan masalah.']],
                ['no' => 19, 'indikator' => 'Fasilitator memberikan umpan balik yang spesifik, tepat waktu, dan dapat ditindaklanjuti.', 'rubrik' => ['Tidak memberi umpan balik atau hanya memberi penilaian umum.', 'Umpan balik berupa pujian/koreksi umum tanpa langkah perbaikan.', 'Umpan balik merujuk pada bukti pekerjaan dan menyebutkan langkah perbaikan yang jelas.', 'Umpan balik seimbang, dialogis, dan mendorong refleksi; peserta diberi kesempatan memperbaiki hasil berdasarkan umpan balik.']],
                ['no' => 20, 'indikator' => 'Fasilitator menjaga akurasi konsep dan membantu peserta memeriksa keluaran koding/AI secara kritis.', 'rubrik' => ['Membiarkan miskonsepsi atau menerima keluaran alat/AI tanpa pemeriksaan.', 'Meluruskan kekeliruan, tetapi belum menjelaskan cara memverifikasi.', 'Memeriksa ketepatan konsep/kode/keluaran AI dan menunjukkan cara menguji atau memverifikasinya.', 'Secara konsisten mencontohkan verifikasi, menguji asumsi/hasil, mengenali bias atau kesalahan, dan mengajak peserta melakukan pemeriksaan mandiri.']],
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

        $jawabanLevel = [
            1 => $pmKka->level_1_jawaban ?? [],
            2 => $pmKka->level_2_jawaban ?? [],
        ];

        /*
        |--------------------------------------------------------------------------
        | Kategori & style
        |--------------------------------------------------------------------------
        */
        $kategoriDari = function ($rata) {
            return match (true) {
                $rata === null => 'Belum ada skor',
                $rata >= 3.50 => 'Sangat Baik',
                $rata >= 2.75 => 'Baik',
                $rata >= 2.00 => 'Cukup',
                default => 'Perlu pendampingan intensif',
            };
        };

        $kategoriStyle = function ($kategori) {
            return match ($kategori) {
                'Sangat Baik' => 'background:#d1fae5;color:#047857',
                'Baik' => 'background:#dbeafe;color:#1d4ed8',
                'Cukup' => 'background:#fef3c7;color:#b45309',
                'Belum ada skor' => 'background:#f1f5f9;color:#475569',
                default => 'background:#ffe4e6;color:#be123c',
            };
        };

        $samakanTeksIndikator = function (string $teks): string {
            $teks = strtr($teks, [
                '[' => '(',
                ']' => ')',
                'bahasa inggris' => 'bahasa Inggris',
            ]);

            return ucfirst($teks);
        };

        /*
        |--------------------------------------------------------------------------
        | Rekap per level dan keseluruhan
        |--------------------------------------------------------------------------
        */
        $rekap = [];
        $totalSemua = 0;
        $terisiSemua = 0;
        $jumlahIndikatorBerlaku = 0;

        foreach ($levelAktif as $level) {
            $total = 0;
            $terisi = 0;

            foreach ((array) $jawabanLevel[$level] as $item) {
                $skor = is_array($item) ? ($item['skor'] ?? null) : $item;

                if (is_numeric($skor) && (int) $skor >= 1 && (int) $skor <= 4) {
                    $total += (int) $skor;
                    $terisi++;
                }
            }

            $rata = $terisi > 0 ? $total / $terisi : null;

            $rekap[$level] = [
                'total' => $total,
                'terisi' => $terisi,
                'rata' => $rata,
                'persen' => $rata !== null ? ($rata / 4) * 100 : 0,
                'kategori' => $kategoriDari($rata),
            ];

            $totalSemua += $total;
            $terisiSemua += $terisi;
            $jumlahIndikatorBerlaku += $levelConfig[$level]['jumlah'];
        }

        $rataSemua = $terisiSemua > 0 ? $totalSemua / $terisiSemua : null;
        $kategoriSemua = $kategoriDari($rataSemua);

        /*
        |--------------------------------------------------------------------------
        | Rekapitulasi & Catatan Tambahan (kolom sesuai migration pm_kka_pengisians)
        |--------------------------------------------------------------------------
        */
        $rekapTambahan = [
            [
                'judul' => 'Kekuatan dalam proses Pelatihan PM KKA yang paling menonjol',
                'isi' => $pmKka->catatan_kekuatan,
                'warna' => 'background:#ecfdf5;border-color:#a7f3d0',
            ],
            [
                'judul' => 'Hal yang perlu ditingkatkan dalam proses Pelatihan PM KKA',
                'isi' => $pmKka->catatan_pengembangan,
                'warna' => 'background:#fffbeb;border-color:#fde68a',
            ],
            [
                'judul' => 'Rekomendasi perbaikan untuk pelatihan berikutnya',
                'isi' => $pmKka->rekomendasi,
                'warna' => 'background:#eff4ff;border-color:#bfd4fb',
            ],
            [
                'judul' => 'Catatan/bukti penting lainnya',
                'isi' => $pmKka->catatan_lainnya,
                'warna' => 'background:#f8fafc;border-color:#e2e8f0',
            ],
        ];
    ?>

    <style>
        /* ===================== TOKEN WARNA (sama dengan PKGSD MBI) ===================== */
        :root {
            --p-50: #eff4ff; --p-100: #dbe7fe; --p-200: #bfd4fb;
            --p-500: #3b82f6; --p-600: #2563eb; --p-700: #1d4ed8; --p-800: #1e40af;
            --accent: #f5b82e; --ink: #0f1b3d; --muted: #64748b; --line: #e6ebf5;
        }

        .d-wrap { display: flex; flex-direction: column; gap: 22px; }
        .d-card { background: #fff; border: 1px solid var(--line); border-radius: 18px; overflow: hidden; }
        .d-card-h { font-size: 16px; font-weight: 700; color: var(--ink); letter-spacing: -.01em; }
        .d-card-s { margin-top: 2px; font-size: 12.5px; color: var(--muted); }
        .d-card-top { display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; padding: 20px 20px 14px; }
        .d-pill { display: inline-flex; align-items: center; padding: 5px 10px; border-radius: 9px; background: var(--p-50); color: var(--p-700); font-size: 11.5px; font-weight: 600; white-space: nowrap; }

        .d-title-row { display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; }
        @media (max-width: 1023px) { .d-title-row { flex-direction: column; } }
        .d-h1 { font-size: 28px; font-weight: 400; letter-spacing: -.02em; color: var(--ink); line-height: 1.2; }
        .d-h1 b { font-weight: 700; }
        .d-crumb { margin-top: 4px; font-size: 12.5px; color: var(--muted); }
        .d-crumb a { color: inherit; transition: color .2s; }
        .d-crumb a:hover { color: var(--p-600); }
        .d-desc { margin-top: 10px; max-width: 640px; font-size: 13px; line-height: 1.7; color: #475569; }

        .d-actions { display: flex; flex-wrap: wrap; align-items: center; gap: 10px; }
        .d-pbtn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            flex-shrink: 0; height: 46px; padding: 0 18px; border-radius: 14px;
            background: var(--b-bg); border: 1px solid var(--b-line); color: var(--b-ink);
            font-family: inherit; font-size: 13.5px; font-weight: 700; cursor: pointer;
            white-space: nowrap; transition: transform .25s ease, box-shadow .25s ease, filter .25s ease;
        }
        .d-pbtn:hover { transform: translateY(-1px); filter: brightness(.97); box-shadow: 0 12px 22px -14px var(--b-glow); }
        .d-pbtn svg { flex-shrink: 0; transition: transform .3s ease; }
        .d-pbtn.back:hover svg { transform: translateX(-3px); }
        .b-blue { --b-bg: linear-gradient(160deg, #eaf0ff 0%, #d3e1ff 100%); --b-line: #c6d8fb; --b-ink: #1d4ed8; --b-glow: rgba(37, 99, 235, .7); }
        .b-mint { --b-bg: linear-gradient(160deg, #e9faf2 0%, #cdf0e0 100%); --b-line: #bfe8d4; --b-ink: #047857; --b-glow: rgba(5, 150, 105, .7); }
        .b-violet { --b-bg: linear-gradient(160deg, #f2edff 0%, #e0d6ff 100%); --b-line: #d6caf9; --b-ink: #6d28d9; --b-glow: rgba(124, 58, 237, .7); }
        .b-amber { --b-bg: linear-gradient(160deg, #fff7de 0%, #fde8ac 100%); --b-line: #f6dd9b; --b-ink: #b45309; --b-glow: rgba(217, 154, 11, .7); }

        .d-tiles { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px; }
        @media (max-width: 767px) { .d-tiles { grid-template-columns: 1fr; } }
        .d-tile { position: relative; text-align: center; padding: 22px 16px 18px; overflow: hidden; background: var(--t-bg, var(--p-50)); border: 1px solid var(--t-line, #dfe8fb); border-radius: 18px; transition: transform .3s cubic-bezier(.22, 1, .36, 1), box-shadow .3s cubic-bezier(.22, 1, .36, 1); }
        .d-tile:hover { transform: translateY(-3px); box-shadow: 0 18px 30px -20px var(--t-glow, rgba(37, 99, 235, .6)); }
        .d-tile-clip { position: absolute; left: 12px; top: 12px; color: var(--t-clip, #a9bde6); }
        .d-tile-dot { position: absolute; right: 14px; top: 14px; width: 7px; height: 7px; border-radius: 9999px; background: var(--p-600); z-index: 1; box-shadow: 0 0 0 3px rgba(255, 255, 255, .65); }
        .d-tile-ico { display: flex; align-items: center; justify-content: center; width: 58px; height: 58px; margin: 0 auto 10px; background: #fff; border-radius: 18px; box-shadow: 0 8px 18px -10px var(--t-glow, rgba(37, 99, 235, .55)); }
        .d-tile-label { font-size: 13.5px; font-weight: 600; color: var(--ink); }
        .d-tile-val { margin-top: 4px; font-size: 26px; font-weight: 800; letter-spacing: -.02em; color: var(--ink); }
        .d-tile-val small { font-size: 15px; font-weight: 600; color: #7f8cab; }
        .d-tile-note { margin-top: 6px; font-size: 11.5px; color: #55637f; }
        .t-blue { --t-bg: linear-gradient(160deg, #eaf0ff 0%, #d3e1ff 100%); --t-line: #c6d8fb; --t-glow: rgba(37, 99, 235, .55); --t-clip: #8fa9e6; }
        .t-mint { --t-bg: linear-gradient(160deg, #e9faf2 0%, #cdf0e0 100%); --t-line: #bfe8d4; --t-glow: rgba(5, 150, 105, .5); --t-clip: #86c9ae; }
        .t-amber { --t-bg: linear-gradient(160deg, #fff7de 0%, #fde8ac 100%); --t-line: #f6dd9b; --t-glow: rgba(217, 154, 11, .5); --t-clip: #d3b568; }
        .d-tile::before, .d-tile::after { content: ''; position: absolute; z-index: 0; border-radius: 9999px; pointer-events: none; }
        .d-tile::before { right: -30px; bottom: -42px; width: 124px; height: 124px; background: rgba(255, 255, 255, .38); }
        .d-tile::after { left: -26px; bottom: -46px; width: 92px; height: 92px; background: rgba(255, 255, 255, .24); }
        .d-tile > p, .d-tile > div, .d-tile > .d-tile-ico { position: relative; z-index: 1; }

        .d-alert { display: flex; align-items: flex-start; gap: 12px; padding: 14px 18px; border-radius: 16px; background: #ecfdf5; border: 1px solid #a7f3d0; color: #047857; font-size: 13px; font-weight: 600; line-height: 1.7; }

        .d-info { display: grid; gap: 18px 32px; padding: 6px 20px 22px; grid-template-columns: minmax(0, 1fr); }
        @media (min-width: 768px) { .d-info.c2, .d-info.c3 { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
        @media (min-width: 1024px) { .d-info.c3 { grid-template-columns: repeat(3, minmax(0, 1fr)); } }
        .d-info-label { font-size: 12px; font-weight: 600; color: var(--muted); }
        .d-info-val { margin-top: 4px; font-size: 13.5px; font-weight: 600; color: var(--ink); line-height: 1.5; }

        .d-badge { display: inline-flex; align-items: center; padding: 5px 10px; border-radius: 8px; font-size: 11.5px; font-weight: 700; text-align: center; white-space: nowrap; }
        .d-badge.lg { padding: 7px 16px; border-radius: 10px; font-size: 14px; white-space: normal; }

        .d-levels { display: grid; gap: 16px; padding: 6px 20px 22px; grid-template-columns: minmax(0, 1fr); }
        @media (min-width: 768px) { .d-levels { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
        .d-level { display: flex; flex-direction: column; padding: 16px; border: 1px solid var(--line); border-radius: 16px; background: #f9fbff; transition: transform .25s ease, box-shadow .25s ease; }
        .d-level:hover { transform: translateY(-2px); box-shadow: 0 14px 24px -18px rgba(37, 99, 235, .5); }
        .d-level-desc { flex: 1; margin-top: 8px; min-height: 38px; font-size: 12px; line-height: 1.6; color: var(--muted); }
        .d-level-row { display: flex; align-items: flex-end; justify-content: space-between; gap: 10px; margin-top: 14px; }
        .d-level-score { font-size: 24px; font-weight: 800; letter-spacing: -.02em; color: var(--ink); }
        .d-level-score small { font-size: 12px; font-weight: 600; color: #7f8cab; }
        .d-level-pct { font-size: 12px; font-weight: 600; color: #475569; }
        .d-bar { height: 8px; margin-top: 10px; overflow: hidden; border-radius: 9999px; background: #e6ebf5; }
        .d-bar > span { display: block; height: 100%; border-radius: 9999px; }
        .d-level-foot { display: flex; flex-wrap: wrap; align-items: center; gap: 8px; margin-top: 12px; font-size: 11.5px; color: var(--muted); }

        .d-table { width: 100%; border-collapse: collapse; }
        .d-table th { padding: 12px 16px; font-size: 12px; font-weight: 600; color: var(--muted); text-align: left; white-space: nowrap; border-bottom: 1px solid var(--line); }
        .d-table th.center { text-align: center; }
        .d-table td { padding: 14px 16px; border-bottom: 1px solid var(--line); vertical-align: top; }
        .d-table tbody tr.d-data { transition: background .2s; }
        .d-table tbody tr.d-data:hover { background: #f7f9ff; }
        .d-table tbody tr:last-child td { border-bottom: 0; }
        .d-table .txt { font-size: 12.5px; font-weight: 600; color: #475569; white-space: nowrap; }
        .d-table .q { font-size: 13px; line-height: 1.7; color: #334155; }
        .d-table .rubrik { margin-top: 6px; font-size: 12px; line-height: 1.6; color: var(--muted); }
        .d-table .rubrik b { font-weight: 700; color: #475569; }
        .d-table .faint { font-size: 12px; color: #94a3b8; }
        .d-table td.d-group-cell { padding: 11px 16px; }
        .d-group-t { font-size: 12.5px; font-weight: 700; color: var(--ink); }

        .d-score { display: inline-flex; align-items: center; justify-content: center; min-width: 34px; height: 34px; padding: 0 6px; border-radius: 11px; background: var(--p-600); color: #fff; font-size: 13px; font-weight: 700; }

        /* --- Rekapitulasi & Catatan Tambahan --- */
        .d-rekap { display: grid; gap: 14px; padding: 6px 20px 22px; grid-template-columns: minmax(0, 1fr); }
        @media (min-width: 768px) { .d-rekap { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
        .d-rekap-item { padding: 16px; border: 1px solid; border-radius: 14px; break-inside: avoid; }
        .d-rekap-q { font-size: 12.5px; font-weight: 700; line-height: 1.6; color: var(--ink); }
        .d-rekap-a { margin-top: 8px; font-size: 13px; line-height: 1.7; color: #334155; white-space: pre-line; overflow-wrap: anywhere; }
        .d-rekap-a.empty { color: #94a3b8; font-style: italic; }

        @media print {
            body { background: white !important; }
            aside, nav, header, .no-print { display: none !important; }
            .d-wrap { gap: 16px !important; }
            .d-card, .d-tile { break-inside: avoid; box-shadow: none !important; }
            .d-tile:hover, .d-level:hover { transform: none !important; box-shadow: none !important; }
            .d-table { min-width: 0 !important; font-size: 10px !important; }
            .d-table th, .d-table td { padding: 6px !important; }
            .d-rekap-item { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
            @page { size: A4; margin: 12mm; }
        }
    </style>

    <div class="d-wrap">

        
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Hasil Pengisian <b>PM KKA</b></h1>
                    <p class="d-crumb">
                        Dashboard &nbsp;›&nbsp;
                        <a href="<?php echo e(route('pm-kka.index')); ?>">PM KKA</a>
                        &nbsp;›&nbsp; Hasil Pengisian
                    </p>
                    <p class="d-desc">
                        Detail hasil pengisian instrumen monitoring dan evaluasi PM KKA dengan Model Kirkpatrick.
                    </p>
                </div>

                <div class="no-print d-actions">
                    <a href="<?php echo e(route('instrumen.index')); ?>" class="d-pbtn b-blue back">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        Kembali
                    </a>

                    <a href="<?php echo e(route('pm-kka.cetak', $pmKka)); ?>" target="_blank" class="d-pbtn b-mint">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 9V3h12v6M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2" />
                            <path d="M6 14h12v7H6z" />
                        </svg>
                        Cetak Hasil
                    </a>

                    <a href="<?php echo e(route('cetak-gabungan.index', ['pilih' => ['pm-kka-' . $pmKka->id]])); ?>" class="d-pbtn b-violet">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 3h7l5 5v9a2 2 0 01-2 2H9a2 2 0 01-2-2V5a2 2 0 012-2z" />
                            <path d="M16 3v5h5" />
                            <path d="M17 21H6a2 2 0 01-2-2V9" />
                        </svg>
                        Gabung PDF
                    </a>

                    <a href="<?php echo e(route('pm-kka.edit', $pmKka)); ?>" class="d-pbtn b-amber">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Data
                    </a>
                </div>
            </div>
        </section>

        
        <?php if(session('success')): ?>
            <div class="d-alert">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:3px">
                    <path d="M5 13l4 4L19 7" />
                </svg>
                <p><?php echo e(session('success')); ?></p>
            </div>
        <?php endif; ?>

        
        <div class="d-tiles">

            
            <div class="d-tile t-blue">
                <span class="d-tile-dot"></span>
                <span class="d-tile-ico" style="color:var(--p-600)">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 11l3 3L22 4" />
                        <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" />
                    </svg>
                </span>
                <p class="d-tile-label">Indikator Dinilai</p>
                <p class="d-tile-val"><?php echo e($terisiSemua); ?><small> / <?php echo e($jumlahIndikatorBerlaku); ?></small></p>
                <p class="d-tile-note">Total skor <?php echo e($totalSemua); ?> dari indikator berskor 1-4</p>
            </div>

            
            <div class="d-tile t-mint">
                <span class="d-tile-dot" style="background:#10b981"></span>
                <span class="d-tile-ico" style="color:#059669">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 3v18h18" />
                        <path d="M7 15l4-4 3 3 5-6" />
                    </svg>
                </span>
                <p class="d-tile-label">Rerata Keseluruhan</p>
                <p class="d-tile-val">
                    <?php echo e($rataSemua !== null ? number_format($rataSemua, 2, ',', '.') : '-'); ?><small> / 4</small>
                </p>
                <p class="d-tile-note">Indikator yang belum dinilai tidak dihitung dalam rerata</p>
            </div>

            
            <div class="d-tile t-amber">
                <span class="d-tile-dot" style="background:var(--accent)"></span>
                <span class="d-tile-ico" style="color:#d99a0b">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="6" />
                        <path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11" />
                    </svg>
                </span>
                <p class="d-tile-label">Kategori</p>
                <div style="margin-top:8px">
                    <span class="d-badge lg" style="<?php echo e($kategoriStyle($kategoriSemua)); ?>"><?php echo e($kategoriSemua); ?></span>
                </div>
                <p class="d-tile-note">Berdasarkan rerata keseluruhan indikator</p>
            </div>

        </div>

        
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">A. Biodata</h2>
                    <p class="d-card-s">Informasi guru dan konteks pembelajaran yang dinilai.</p>
                </div>
            </div>

            <div class="d-info c2">
                <div>
                    <p class="d-info-label">Nama Guru</p>
                    <p class="d-info-val"><?php echo e($pmKka->nama_guru ?: '-'); ?></p>
                </div>
                <div>
                    <p class="d-info-label">Nama Sekolah</p>
                    <p class="d-info-val"><?php echo e($pmKka->nama_sekolah ?: '-'); ?></p>
                </div>
                <div>
                    <p class="d-info-label">Kelas / Fase</p>
                    <p class="d-info-val"><?php echo e($pmKka->kelas_fase ?: '-'); ?></p>
                </div>
                <div>
                    <p class="d-info-label">Topik / Materi</p>
                    <p class="d-info-val"><?php echo e($pmKka->topik_materi ?: '-'); ?></p>
                </div>
            </div>
        </section>

        
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">B. Identitas Pemonev</h2>
                    <p class="d-card-s">Identitas petugas, jabatan, dan tanggal monitoring.</p>
                </div>
            </div>

            <div class="d-info c3">
                <div>
                    <p class="d-info-label">Nama Petugas Monev</p>
                    <p class="d-info-val"><?php echo e($pmKka->nama_petugas_monev ?: '-'); ?></p>
                </div>
                <div>
                    <p class="d-info-label">Jabatan Penilai</p>
                    <p class="d-info-val"><?php echo e($pmKka->jabatan_penilai ?: '-'); ?></p>
                </div>
                <div>
                    <p class="d-info-label">Tanggal Monev</p>
                    <p class="d-info-val"><?php echo e($pmKka->tanggal_monev?->format('d/m/Y') ?? '-'); ?></p>
                </div>
                <div>
                    <p class="d-info-label">Status Pengisian</p>
                    <div style="margin-top:6px">
                        
                        <span class="d-badge" style="background:#d1fae5;color:#047857"><?php echo e($pmKka->status ?? 'Selesai'); ?></span>
                    </div>
                </div>
                <div>
                    <p class="d-info-label">Sumber Data / Bukti</p>
                    <p class="d-info-val" style="white-space:pre-line"><?php echo e($pmKka->sumber_data_bukti ?: '-'); ?></p>
                </div>
            </div>
        </section>

        
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">Rekapitulasi Berdasarkan Level</h2>
                    <p class="d-card-s">Ringkasan skor untuk setiap level evaluasi.</p>
                </div>
                <span class="d-pill"><?php echo e(count($levelAktif)); ?> level</span>
            </div>

            <div class="d-levels">
                <?php $__currentLoopData = $levelAktif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $config = $levelConfig[$level];
                        $r = $rekap[$level];
                    ?>

                    <div class="d-level">
                        <div>
                            <span class="d-badge" style="<?php echo e($config['badge']); ?>"><?php echo e($config['label']); ?></span>
                        </div>
                        <p class="d-level-desc"><?php echo e($config['deskripsi']); ?></p>
                        <div class="d-level-row">
                            <div class="d-level-score">
                                <?php echo e($r['rata'] !== null ? number_format($r['rata'], 2, ',', '.') : '-'); ?><small> / 4</small>
                            </div>
                            <span class="d-level-pct"><?php echo e($r['terisi']); ?> / <?php echo e($config['jumlah']); ?> butir</span>
                        </div>
                        <div class="d-bar">
                            <span style="width: <?php echo e(min($r['persen'], 100)); ?>%;background: <?php echo e($config['bar']); ?>"></span>
                        </div>
                        <div class="d-level-foot">
                            <span class="d-badge" style="<?php echo e($kategoriStyle($r['kategori'])); ?>"><?php echo e($r['kategori']); ?></span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>

        
        <?php $__currentLoopData = $levelAktif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $config = $levelConfig[$level];
                $indikatorList = collect($config['indikator'] ?? [])->keyBy('no');
                $kelompok = $config['kelompok'] ?? [];
                $jawaban = (array) $jawabanLevel[$level];
            ?>

            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">Detail Penilaian <?php echo e($config['label']); ?></h2>
                        <p class="d-card-s"><?php echo e($config['jumlah']); ?> indikator: skor setiap indikator.</p>
                    </div>
                    <span class="d-pill"><?php echo e($rekap[$level]['terisi']); ?> dari <?php echo e($config['jumlah']); ?> terisi</span>
                </div>

                <div style="overflow-x:auto">
                    <table class="d-table" style="min-width:700px">
                        <thead>
                            <tr>
                                <th style="width:70px">No</th>
                                <th>Indikator</th>
                                <th class="center" style="width:110px">Skor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($nomor = 1; $nomor <= $config['jumlah']; $nomor++): ?>
                                <?php
                                    $item = $jawaban[$nomor] ?? [];
                                    $item = is_array($item) ? $item : ['skor' => $item];

                                    $skor = $item['skor'] ?? null;
                                    $skorAda = $skor !== null && $skor !== '';

                                    $indikator = $indikatorList->get($nomor);
                                    $teksIndikator = $samakanTeksIndikator($indikator['indikator'] ?? 'Indikator ' . $nomor);

                                    $deskripsiSkor = null;
                                    if ($indikator && $skorAda && is_numeric($skor)) {
                                        $deskripsiSkor = $indikator['rubrik'][(int) $skor - 1] ?? null;
                                    }

                                    $headerKelompok = $kelompok[$nomor] ?? ($kelompok[(string) $nomor] ?? null);
                                ?>

                                <?php if($headerKelompok): ?>
                                    <tr>
                                        <td colspan="3" class="d-group-cell" style="background: <?php echo e($config['row']); ?>">
                                            <p class="d-group-t"><?php echo e($headerKelompok); ?></p>
                                        </td>
                                    </tr>
                                <?php endif; ?>

                                <tr class="d-data">
                                    <td class="txt"><?php echo e($nomor); ?></td>
                                    <td class="q">
                                        <?php echo e($teksIndikator); ?>

                                        <?php if($deskripsiSkor): ?>
                                            <p class="rubrik">
                                                <b>Skor <?php echo e($skor); ?>:</b> <?php echo e($deskripsiSkor); ?>

                                            </p>
                                        <?php endif; ?>
                                    </td>
                                    <td style="text-align:center">
                                        <?php if($skorAda): ?>
                                            <span class="d-score"><?php echo e(strtoupper((string) $skor)); ?></span>
                                        <?php else: ?>
                                            <span class="faint">-</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">Rekapitulasi &amp; Catatan Tambahan</h2>
                    <p class="d-card-s">Kekuatan, area pengembangan, dan rekomendasi.</p>
                </div>
            </div>

            <div class="d-rekap">
                <?php $__currentLoopData = $rekapTambahan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="d-rekap-item" style="<?php echo e($r['warna']); ?>">
                        <p class="d-rekap-q"><?php echo e($r['judul']); ?></p>

                        <?php if(filled($r['isi'])): ?>
                            <p class="d-rekap-a"><?php echo e(trim($r['isi'])); ?></p>
                        <?php else: ?>
                            <p class="d-rekap-a empty">Belum diisi</p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Herd\bgtk-monev\resources\views/instrumen/pm-kka/show.blade.php ENDPATH**/ ?>