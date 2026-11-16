


<?php $__env->startSection('title', 'Hasil Evaluasi Dampak'); ?>
<?php $__env->startSection('page-title', 'Hasil Evaluasi Dampak'); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $pendidikQs = [
            'Perencanaan Pembelajaran Berbasis STEM' => [
                'Saya merancang pembelajaran yang mengintegrasikan sains, teknologi, enjinering, dan matematika secara terpadu.',
                'Saya menyusun tujuan pembelajaran yang menekankan pada kemampuan berpikir kritis, kreatif, dan pemecahan masalah.',
                'Saya menyiapkan bahan ajar dan proyek yang relevan dengan konteks kehidupan nyata murid.',
                'Saya mengembangkan RPP yang mendukung eksplorasi eksperimen murid.'
            ],
            'Pelaksanaan Pembelajaran STEM' => [
                'Saya memulai pembelajaran dengan masalah kontekstual yang menantang rasa ingin tahu murid.',
                'Saya memfasilitasi murid untuk melakukan eksperimen, desain, dan inovasi dalam menyelesaikan masalah.',
                'Saya mengarahkan murid untuk mengaitkan konsep dari berbagai mata pelajaran dalam proyek STEM.',
                'Saya menciptakan suasana belajar yang kolaboratif dan mendorong kerja tim antar murid.',
                'Saya memanfaatkan teknologi dan alat digital untuk mendukung kegiatan pembelajaran STEM.'
            ],
            'Evaluasi dan Refleksi Pembelajaran STEM' => [
                'Saya menggunakan berbagai bentuk asesmen (produk, proses, dan sikap) dalam menilai hasil belajar murid.',
                'Saya memberi umpan balik yang membantu murid memperbaiki dan mengembangkan solusi inovatif mereka.',
                'Saya melakukan refleksi terhadap keberhasilan dan kendala dalam pelaksanaan pembelajaran STEM.',
                'Saya menindaklanjuti hasil evaluasi untuk memperbaiki rencana pembelajaran berikutnya.'
            ],
            'Dampak Terhadap Kualitas Pembelajaran' => [
                'Penerapan pembelajaran STEM meningkatkan partisipasi dan keterlibatan aktif murid.',
                'Pembelajaran STEM membantu murid memahami konsep secara lebih mendalam dan aplikatif.',
                'Murid menunjukkan peningkatan kreativitas dan kemampuan berpikir kritis setelah penerapan STEM.',
                'Pembelajaran STEM meningkatkan kemampuan kolaborasi dan komunikasi murid.',
                'Penerapan pembelajaran STEM berkontribusi terhadap peningkatan hasil belajar murid secara keseluruhan.'
            ],
            'Pengembangan Profesional Guru' => [
                'Saya aktif mengikuti pelatihan, workshop, atau seminar terkait pembelajaran STEM.',
                'Saya berbagi praktik baik pembelajaran STEM dengan rekan sejawat di sekolah.',
                'Saya melakukan inovasi dalam pembelajaran dengan mengadaptasi pendekatan STEM sesuai kebutuhan murid.',
                'Saya terdorong untuk terus meningkatkan kompetensi dalam mengembangkan proyek pembelajaran STEM.'
            ]
        ];

        $muridQs = [
            'Iklim Kelas' => [
                'Pendidik menciptakan suasana belajar yang membuat saya semangat untuk belajar.',
                'Pendidik selalu memberikan dukungan ketika saya mengalami kesulitan memahami pelajaran.',
                'Saya merasa nyaman mengemukakan pendapat dan ide di kelas.',
                'Pendidik menghargai setiap usaha belajar yang saya lakukan.'
            ],
            'Lingkungan Belajar yang Suportif dan Memotivasi' => [
                'Pendidik membantu saya tetap bersemangat dalam belajar meskipun tugas terasa sulit.',
                'Saya merasa pendidik mendorong kami untuk berpikir, bertanya, dan mencari tahu lebih dalam.',
                'Kegiatan belajar di kelas membuat saya ingin tahu lebih banyak.',
                'Saya merasa didukung untuk terus mencoba hal-hal baru saat belajar.'
            ],
            'Kebebasan Murid dalam Mengeksplorasi Materi' => [
                'Saya diberi kesempatan mencoba berbagai cara untuk menyelesaikan tugas atau proyek.',
                'Pendidik memberi kebebasan memilih topik atau cara belajar yang sesuai dengan minat saya.',
                'Saya tidak takut mencoba ide baru meskipun bisa saja salah.',
                'Pendidik menghargai perbedaan cara berpikir antara saya dan teman-teman lain.'
            ],
            'Penghargaan terhadap Aktivitas Kolaboratif' => [
                'Pendidik mendorong kami untuk bekerja sama dalam memecahkan masalah atau membuat proyek.',
                'Dalam kelompok, saya merasa ide saya didengarkan dan dihargai.',
                'Saya belajar banyak dari hasil diskusi dan kerja sama dengan teman.',
                'Proyek kelompok membantu saya memahami pelajaran dengan lebih baik.'
            ],
            'Pembelajaran yang Menumbuhkan Keingintahuan' => [
                'Pembelajaran di kelas membuat saya tertarik mencari tahu lebih banyak tentang suatu topik.',
                'Pendidik sering memberi tantangan yang membuat saya ingin berpikir lebih dalam.',
                'Saya sering mencari informasi tambahan di luar pelajaran karena rasa ingin tahu.',
                'Saya menikmati kegiatan yang membuat saya berpikir kritis dan kreatif.'
            ],
            'Kepuasan Murid terhadap Pembelajaran STEM' => [
                'Saya merasa pembelajaran STEM membuat belajar menjadi lebih seru dan tidak membosankan.',
                'Pembelajaran STEM dan PM membuat saya lebih paham mengapa suatu konsep penting.',
                'Saya merasa lebih percaya diri untuk memecahkan masalah setelah mengikuti pembelajaran ini.',
                'Saya puas dengan cara pendidik mengajar yang menggabungkan proyek, eksperimen, dan refleksi.'
            ],
            'Prinsip Pembelajaran Mendalam' => [
                'Saya merasa gembira dan nyaman selama proses pembelajaran berlangsung.',
                'Pembelajaran di kelas membuat saya merasa terhubung dengan pengalaman hidup saya.',
                'Saya menyadari mengapa dan untuk apa saya belajar setiap materi di kelas.',
                'Pendidik membantu saya memahami makna di balik setiap kegiatan pembelajaran.',
                'Saya merasa belajar bukan hanya untuk nilai, tetapi untuk mengembangkan diri saya.'
            ],
            'Perkembangan Murid' => [
                'Saya menjadi lebih percaya diri dalam menyampaikan pendapat.',
                'Saya merasa kemampuan berpikir saya semakin berkembang.',
                'Saya belajar menjadi lebih sabar, terbuka, dan menghargai perbedaan.',
                'Saya merasa lebih bertanggung jawab terhadap tugas dan hasil belajar saya.'
            ],
            'Hasil Belajar' => [
                'Saya memahami materi pelajaran dengan baik setelah mengikuti pembelajaran.',
                'Saya dapat menerapkan apa yang saya pelajari untuk memecahkan masalah nyata.',
                'Nilai saya meningkat dibandingkan sebelumnya.'
            ]
        ];

        $isPendidik = $evaluasi->peran_responden === 'Pendidik';
        $daftarPertanyaan = $isPendidik ? $pendidikQs : $muridQs;

        // Kumpulkan skor dari kolom JSON
        if ($isPendidik) {
            $kolomArray = [
                $evaluasi->pendidik_perencanaan,
                $evaluasi->pendidik_pelaksanaan,
                $evaluasi->pendidik_evaluasi_refleksi,
                $evaluasi->pendidik_dampak_kualitas,
                $evaluasi->pendidik_pengembangan_profesional,
            ];
        } else {
            $kolomArray = [
                $evaluasi->murid_iklim_kelas,
                $evaluasi->murid_lingkungan_suportif,
                $evaluasi->murid_kebebasan_eksplorasi,
                $evaluasi->murid_penghargaan_kolaboratif,
                $evaluasi->murid_keingintahuan,
                $evaluasi->murid_kepuasan,
                $evaluasi->murid_prinsip_mendalam,
                $evaluasi->murid_perkembangan,
                $evaluasi->murid_hasil_belajar,
            ];
        }

        $jawaban = [];
        foreach ($kolomArray as $kolom) {
            if (is_array($kolom)) {
                foreach ($kolom as $skor) { $jawaban[] = $skor; }
            }
        }

        // Kumpulkan bukti (hanya untuk Pendidik)
        $jawabanBukti = [];
        if ($isPendidik && is_array($evaluasi->pendidik_catatan)) {
            $jawabanBukti = $evaluasi->pendidik_catatan;
        }

        // Hitung skor
        $totalSkor = 0;
        $jumlahDinilai = 0;

        foreach ($jawaban as $skor) {
            if (is_numeric($skor)) {
                $totalSkor += (int) $skor;
                $jumlahDinilai++;
            }
        }

        $skorMaksimal = $jumlahDinilai * 4;
        $nilai = $skorMaksimal > 0 ? ($totalSkor / $skorMaksimal) * 100 : 0;
        
        $predikat = match(true) {
            $nilai >= 85 => 'Sangat Baik',
            $nilai >= 70 => 'Baik',
            $nilai >= 55 => 'Cukup',
            default => 'Kurang',
        };

        $kategoriStyle = function ($kategori) {
            return match ($kategori) {
                'Sangat Baik' => 'background:#d1fae5;color:#047857',
                'Baik' => 'background:#dbeafe;color:#1d4ed8',
                'Cukup' => 'background:#fef3c7;color:#b45309',
                default => 'background:#ffe4e6;color:#be123c',
            };
        };
    ?>

    <style>
        :root {
            --p-50: #eff4ff; --p-100: #dbe7fe; --p-200: #bfd4fb;
            --p-500: #3b82f6; --p-600: #2563eb; --p-700: #1d4ed8;
            --accent: #f5b82e; --ink: #0f1b3d; --muted: #64748b; --line: #e6ebf5;
        }

        .d-wrap { display: flex; flex-direction: column; gap: 22px; }
        .d-card { background: #fff; border: 1px solid var(--line); border-radius: 18px; overflow: hidden; }
        .d-card-h { font-size: 16px; font-weight: 700; color: var(--ink); letter-spacing: -.01em; }
        .d-card-s { margin-top: 2px; font-size: 12.5px; color: var(--muted); }
        .d-card-top { display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; padding: 20px 20px 14px; }

        .d-title-row { display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; }
        @media (max-width: 1023px) { .d-title-row { flex-direction: column; } }
        .d-h1 { font-size: 28px; font-weight: 400; letter-spacing: -.02em; color: var(--ink); line-height: 1.2; }
        .d-h1 b { font-weight: 700; }
        .d-crumb { margin-top: 4px; font-size: 12.5px; color: var(--muted); }
        .d-crumb a { color: inherit; transition: color .2s; text-decoration: none; }
        .d-crumb a:hover { color: var(--p-600); }
        .d-desc { margin-top: 10px; max-width: 640px; font-size: 13px; line-height: 1.7; color: #475569; }

        .d-actions { display: flex; flex-wrap: wrap; align-items: center; gap: 10px; }
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
        .b-amber { --b-bg: linear-gradient(160deg, #fff7de 0%, #fde8ac 100%); --b-line: #f6dd9b; --b-ink: #b45309; --b-glow: rgba(217, 154, 11, .7); }

        .d-tiles { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px; }
        @media (max-width: 767px) { .d-tiles { grid-template-columns: 1fr; } }
        .d-tile {
            position: relative; text-align: center; padding: 22px 16px 18px; overflow: hidden;
            background: var(--t-bg, var(--p-50)); border: 1px solid var(--t-line, #dfe8fb);
            border-radius: 18px; transition: transform .3s cubic-bezier(.22, 1, .36, 1), box-shadow .3s cubic-bezier(.22, 1, .36, 1);
        }
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
        .d-tile>p, .d-tile>div, .d-tile>.d-tile-ico { position: relative; z-index: 1; }

        .d-info { display: grid; gap: 18px 32px; padding: 6px 20px 22px; grid-template-columns: minmax(0, 1fr); }
        @media (min-width: 768px) { .d-info.c2 { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
        .d-info-label { font-size: 12px; font-weight: 600; color: var(--muted); }
        .d-info-val { margin-top: 4px; font-size: 13.5px; font-weight: 600; color: var(--ink); line-height: 1.5; }

        .d-badge { display: inline-flex; align-items: center; padding: 5px 10px; border-radius: 8px; font-size: 11.5px; font-weight: 700; text-align: center; white-space: nowrap; }
        .d-badge.lg { padding: 7px 16px; border-radius: 10px; font-size: 14px; white-space: normal; }

        .d-table { width: 100%; border-collapse: collapse; }
        .d-table th { padding: 12px 16px; font-size: 12px; font-weight: 600; color: var(--muted); text-align: left; white-space: nowrap; border-bottom: 1px solid var(--line); }
        .d-table th.center { text-align: center; }
        .d-table td { padding: 14px 16px; border-bottom: 1px solid var(--line); vertical-align: top; }
        .d-table tbody tr.d-data { transition: background .2s; }
        .d-table tbody tr.d-data:hover { background: #f7f9ff; }
        .d-table tbody tr:last-child td { border-bottom: 0; }
        .d-table .txt { font-size: 12.5px; font-weight: 600; color: #475569; white-space: nowrap; text-align: center; }
        .d-table .q { font-size: 13px; line-height: 1.7; color: #334155; }
        .d-table td.d-group-cell { padding: 11px 16px; }
        .d-group-t { font-size: 12.5px; font-weight: 700; color: var(--ink); }
        
        .d-score { display: inline-flex; align-items: center; justify-content: center; min-width: 34px; height: 34px; padding: 0 6px; border-radius: 11px; background: var(--p-600); color: #fff; font-size: 13px; font-weight: 700; }

        /* ===================== CSS BARU: BUKTI ===================== */
        .d-bukti-txt { font-size: 12.5px; line-height: 1.6; color: #475569; white-space: pre-line; max-width: 360px; }
        .d-bukti-txt.empty { color: #94a3b8; font-style: italic; }
    </style>

    <div class="d-wrap">

        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Hasil <b>Evaluasi Dampak</b></h1>
                    <p class="d-crumb">
                        Dashboard &nbsp;›&nbsp;
                        <a href="<?php echo e(route('instrumen.index')); ?>">Instrumen</a> &nbsp;›&nbsp;
                        <a href="<?php echo e(route('instrumen.stem.index')); ?>">STEM</a> &nbsp;›&nbsp;
                        <a href="<?php echo e(route('instrumen.stem.fasda')); ?>">Fasda</a> &nbsp;›&nbsp; Evaluasi
                    </p>
                </div>

                <div class="no-print d-actions">
                    <a href="<?php echo e(route('instrumen.index')); ?>" class="d-pbtn b-blue back">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                        Kembali
                    </a>

                    <a href="<?php echo e(route('instrumen.stem.fasda.evaluasi.cetak', $evaluasi->id)); ?>" target="_blank" class="d-pbtn b-mint">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 9V3h12v6M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2" />
                            <path d="M6 14h12v7H6z" />
                        </svg>
                        Cetak Hasil
                    </a>

                    <a href="<?php echo e(route('instrumen.stem.fasda.evaluasi.edit', $evaluasi->id)); ?>" class="d-pbtn b-amber">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Data
                    </a>
                </div>
            </div>
        </section>

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
                <p class="d-tile-val"><?php echo e($jumlahDinilai); ?><small> / <?php echo e($isPendidik ? 22 : 36); ?></small></p>
                <p class="d-tile-note">Total skor <?php echo e($totalSkor); ?> dari indikator berskor 1-4</p>
            </div>

            <div class="d-tile t-mint">
                <span class="d-tile-dot" style="background:#10b981"></span>
                <span class="d-tile-ico" style="color:#059669">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 3v18h18" />
                        <path d="M7 15l4-4 3 3 5-6" />
                    </svg>
                </span>
                <p class="d-tile-label">Nilai Akhir (100)</p>
                <p class="d-tile-val"><?php echo e(number_format($nilai, 2, ',', '.')); ?></p>
                <p class="d-tile-note">Berdasarkan persentase dari skor maksimal</p>
            </div>

            <div class="d-tile t-amber">
                <span class="d-tile-dot" style="background:var(--accent)"></span>
                <span class="d-tile-ico" style="color:#d99a0b">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="6" />
                        <path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11" />
                    </svg>
                </span>
                <p class="d-tile-label">Predikat</p>
                <div style="margin-top:8px">
                    <span class="d-badge lg" style="<?php echo e($kategoriStyle($predikat)); ?>"><?php echo e($predikat); ?></span>
                </div>
                <p class="d-tile-note">Berdasarkan nilai akhir indikator</p>
            </div>
        </div>

        
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">A. Identitas Responden</h2>
                    <p class="d-card-s">Informasi mengenai responden yang mengisi instrumen.</p>
                </div>
            </div>
            <div class="d-info c2">
                <div>
                    <p class="d-info-label">Nama Responden</p>
                    <p class="d-info-val"><?php echo e($evaluasi->nama_responden ?: '-'); ?></p>
                </div>
                <div>
                    <p class="d-info-label">Asal Satuan Pendidikan</p>
                    <p class="d-info-val"><?php echo e($evaluasi->asal_sekolah ?: '-'); ?></p>
                </div>
                <div>
                    <p class="d-info-label">Kabupaten / Kota</p>
                    <p class="d-info-val"><?php echo e($evaluasi->kabupaten_kota ?: '-'); ?></p>
                </div>
                <div>
                    <p class="d-info-label">Provinsi</p>
                    <p class="d-info-val"><?php echo e($evaluasi->provinsi ?: '-'); ?></p>
                </div>
                <div>
                    <p class="d-info-label">Peran Responden</p>
                    <div style="margin-top: 6px;">
                        <span class="d-badge" style="background:#e0e7ff;color:#3730a3"><?php echo e($evaluasi->peran_responden); ?></span>
                    </div>
                </div>
            </div>
        </section>

        
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">B. Detail Penilaian (<?php echo e($evaluasi->peran_responden); ?>)</h2>
                    <p class="d-card-s">Berikut adalah rincian jawaban yang telah diisi.</p>
                </div>
            </div>
            
            <div style="overflow-x:auto">
                <table class="d-table">
                    <thead>
                        <tr>
                            <th style="width:50px">No</th>
                            <th>Pernyataan</th>
                            <th class="center" style="width:80px">Skor</th>
                            <?php if($isPendidik): ?>
                                <th style="width:280px">Catatan / Bukti</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?>
                        <?php $__currentLoopData = $daftarPertanyaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelompok => $pertanyaanList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="<?php echo e($isPendidik ? 4 : 3); ?>" class="d-group-cell" style="background: var(--p-50)">
                                    <p class="d-group-t"><?php echo e($kelompok); ?></p>
                                </td>
                            </tr>
                            <?php $__currentLoopData = $pertanyaanList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $teks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $skor = $jawaban[$nomor - 1] ?? '-';
                                    $bukti = $jawabanBukti[$nomor - 1] ?? '';
                                ?>
                                <tr class="d-data">
                                    <td class="txt"><?php echo e($nomor); ?></td>
                                    <td class="q"><?php echo e($teks); ?></td>
                                    <td style="text-align:center">
                                        <?php if(is_numeric($skor)): ?>
                                            <span class="d-score"><?php echo e($skor); ?></span>
                                        <?php else: ?>
                                            <span class="d-score" style="background:#cbd5e1">-</span>
                                        <?php endif; ?>
                                    </td>
                                    <?php if($isPendidik): ?>
                                        <td>
                                            <?php if(trim($bukti) !== ''): ?>
                                                <div class="d-bukti-txt"><?php echo e($bukti); ?></div>
                                            <?php else: ?>
                                                <div class="d-bukti-txt empty">(Belum diisi)</div>
                                            <?php endif; ?>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                                <?php $nomor++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </section>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Herd\bgtk-monev\resources\views/instrumen/stem/fasda/evaluasi/show.blade.php ENDPATH**/ ?>