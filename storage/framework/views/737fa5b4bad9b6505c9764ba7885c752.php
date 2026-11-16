


<?php $__env->startSection('title', 'Instrumen Evaluasi Dampak'); ?>
<?php $__env->startSection('page-title', 'Instrumen Evaluasi Dampak'); ?>

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

        $totalPendidik = 0;
        foreach ($pendidikQs as $qs) { $totalPendidik += count($qs); }

        $totalMurid = 0;
        foreach ($muridQs as $qs) { $totalMurid += count($qs); }
    ?>

    <style>
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

        .d-info-ico {
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0; width: 44px; height: 44px;
            border-radius: 14px; background: var(--p-50); color: var(--p-600);
        }

        /* --- Desain kotak Petunjuk --- */
        .d-note {
            display: flex; align-items: flex-start; gap: 12px; margin-top: 18px;
            padding: 16px 18px; border: 1px solid var(--p-200); border-radius: 14px;
            background: #f8faff; font-size: 12.5px; line-height: 1.7; color: #334155;
        }
        .d-note b.t { display: block; font-weight: 700; color: var(--p-700); font-size: 13px; margin-bottom: 6px; }
        .d-note ul { margin: 6px 0 0 16px; list-style: disc; }
        .d-note li + li { margin-top: 6px; }
        .d-note .skor-box {
            display: inline-flex; align-items: center; justify-content: center;
            min-width: 20px; height: 20px; padding: 0 5px; border-radius: 5px;
            background: var(--p-600); color: #fff; font-size: 11px; font-weight: 700; margin-right: 5px;
        }

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

        .d-field {
            width: 100%; height: 44px; padding: 0 14px;
            border: 1px solid var(--line); border-radius: 12px;
            background: #fff; color: #334155; font-family: inherit; font-size: 13px;
            outline: none; transition: border-color .2s, box-shadow .2s;
        }
        textarea.d-field { height: auto; padding: 11px 14px; line-height: 1.6; resize: vertical; }
        .d-field::placeholder { color: #94a3b8; }
        .d-field:focus { border-color: var(--p-500); box-shadow: 0 0 0 4px var(--p-100); }
        .d-field:disabled { background: #f8fafc; color: #94a3b8; }

        .d-group-bar { padding: 11px 20px; font-size: 12.5px; font-weight: 700; color: var(--ink); border-top: 1px solid var(--line); background: #f9fbff; }
        .d-item { padding: 20px; border-top: 1px solid var(--line); }
        .d-group-bar + .d-item { border-top: 0; }
        .d-item:first-child { border-top: 0; }

        .d-item-no { font-size: 11px; font-weight: 800; letter-spacing: .06em; text-transform: uppercase; color: #94a3b8; }
        .d-item-q { margin-top: 4px; font-size: 13.5px; font-weight: 600; line-height: 1.7; color: #334155; }

        .d-opts { display: grid; gap: 10px; margin-top: 14px; grid-template-columns: minmax(0, 1fr); }
        @media (min-width: 768px) {
            .d-opts { grid-template-columns: repeat(4, minmax(0, 1fr)); }
        }

        .d-opt {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 12px; border: 1px solid var(--line);
            border-radius: 12px; background: #fff; cursor: pointer;
            transition: border-color .2s, background .2s;
        }
        .d-opt:hover { border-color: var(--p-200); background: #f7f9ff; }
        .d-opt:has(input:checked) { border-color: var(--p-500); background: var(--p-50); box-shadow: 0 0 0 3px var(--p-100); }
        
        .d-opt input { margin: 0; width: 16px; height: 16px; accent-color: var(--p-600); cursor: pointer; }
        .d-opt-skor {
            display: inline-flex; align-items: center; justify-content: center;
            width: 22px; height: 22px; flex-shrink: 0; border-radius: 6px;
            background: var(--p-50); color: var(--p-700); font-size: 11px; font-weight: 800;
        }
        .d-opt:has(input:checked) .d-opt-skor { background: var(--p-600); color: #fff; }
        .d-opt-txt { font-size: 12px; line-height: 1.4; color: #475569; margin: 0; }

        /* CSS BARU: CATATAN/BUKTI */
        .d-bukti-wrap {
            margin-top: 16px; padding-top: 14px; border-top: 1px dashed var(--line);
        }
        .d-bukti-label {
            display: flex; align-items: center; gap: 6px; margin-bottom: 8px;
            font-size: 12px; font-weight: 700; color: var(--p-700);
        }
        .d-bukti-label svg { flex-shrink: 0; }
        .d-bukti-optional { margin-left: auto; font-size: 11px; font-weight: 500; color: var(--muted); }
    </style>

    <div class="d-wrap">

        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Instrumen <b>Evaluasi Dampak</b></h1>
                    <p class="d-crumb">
                        Dashboard &nbsp;›&nbsp;
                        <a href="<?php echo e(route('instrumen.index')); ?>">Instrumen</a> &nbsp;›&nbsp;
                        <a href="<?php echo e(route('instrumen.stem.index')); ?>">STEM</a> &nbsp;›&nbsp;
                        <a href="<?php echo e(route('instrumen.stem.fasda')); ?>">Fasda</a> &nbsp;›&nbsp; Evaluasi
                    </p>
                </div>
                <a href="<?php echo e(route('instrumen.stem.fasda')); ?>" class="d-pbtn b-blue back">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                    Kembali
                </a>
            </div>
        </section>

        
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
                            <h2 class="d-card-h">Petunjuk Pengisian</h2>
                            <p class="d-card-s" style="line-height:1.7">
                                Pilih peran responden, lalu isi instrumen sesuai dengan fakta yang Anda ketahui, alami, lakukan, dan rasakan.
                            </p>
                        </div>
                    </div>

                    <div class="d-note">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:3px;color:var(--p-600)">
                            <path d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>
                        <div>
                            <b class="t">Skala Penilaian & Panduan</b>
                            <ul>
                                <li><b>Bagian Pendidik (Skor 1-4):</b> <span class="skor-box">1</span> Tidak Pernah, <span class="skor-box">2</span> Jarang, <span class="skor-box">3</span> Sering, <span class="skor-box">4</span> Selalu.</li>
                                <li><b>Bagian Murid (Skor 1-4):</b> <span class="skor-box">1</span> Sangat Tidak Setuju (STS), <span class="skor-box">2</span> Tidak Setuju (TS), <span class="skor-box">3</span> Setuju (S), <span class="skor-box">4</span> Sangat Setuju (SS).</li>
                                <li>Khusus <b>Pendidik</b>, isi kolom <b>Catatan/Bukti</b> dengan bukti konkret (mis. judul Modul Ajar/RPP, foto, atau tautan dokumen) yang mendukung skor Anda.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="d-prog">
                    <div class="d-prog-row">
                        <span class="d-prog-label">Progres pengisian</span>
                        <span id="evaluasi-progress-percent" class="d-prog-pct">0%</span>
                    </div>
                    <div class="d-bar">
                        <div id="evaluasi-progress-bar" style="width: 0%"></div>
                    </div>
                    <div class="d-prog-row" style="margin-top:10px">
                        <span id="evaluasi-progress-text" class="d-prog-val">0 / 0 butir</span>
                        <span class="d-prog-label" style="font-weight:500">Pernyataan</span>
                    </div>
                    <div class="d-prog-sep">
                        <p class="d-prog-label">Skor sementara</p>
                        <p id="evaluasi-score-text" class="d-prog-val" style="margin-top:4px">Belum ada penilaian</p>
                    </div>
                </div>
            </div>
        </div>

        <?php if($errors->any()): ?>
            <div class="d-error">
                <b>Terdapat kesalahan pada pengisian:</b>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('instrumen.stem.fasda.evaluasi.store')); ?>" method="POST" class="d-form" id="evaluasi-form">
            <?php echo csrf_field(); ?>

            
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">A. Identitas Responden</h2>
                        <p class="d-card-s">Informasi mengenai responden yang mengisi instrumen.</p>
                    </div>
                </div>
                <div class="d-form-grid c2">
                    <div>
                        <label class="d-label">Nama Responden <i>*</i></label>
                        <input type="text" name="nama_responden" value="<?php echo e(old('nama_responden')); ?>" required class="d-field" placeholder="Nama lengkap">
                    </div>
                    <div>
                        <label class="d-label">Asal Satuan Pendidikan <i>*</i></label>
                        <input type="text" name="asal_sekolah" value="<?php echo e(old('asal_sekolah')); ?>" required class="d-field" placeholder="Nama sekolah">
                    </div>
                    <div>
                        <label class="d-label">Kabupaten/Kota</label>
                        <input type="text" name="kabupaten_kota" value="<?php echo e(old('kabupaten_kota')); ?>" class="d-field" placeholder="Contoh: Mataram">
                    </div>
                    <div>
                        <label class="d-label">Provinsi</label>
                        <input type="text" name="provinsi" value="<?php echo e(old('provinsi', 'Nusa Tenggara Barat')); ?>" class="d-field">
                    </div>
                    <div class="span2">
                        <label class="d-label">Responden Ini Adalah: <i>*</i></label>
                        <select name="peran_responden" id="peran_responden" required class="d-field" onchange="togglePeran()">
                            <option value="Pendidik" <?php if(old('peran_responden') === 'Pendidik'): echo 'selected'; endif; ?>>Pendidik / Guru</option>
                            <option value="Murid" <?php if(old('peran_responden') === 'Murid'): echo 'selected'; endif; ?>>Murid</option>
                        </select>
                    </div>
                </div>
            </section>

            
            <section class="d-card" id="form-pendidik">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">B. Instrumen Pendidik</h2>
                        <p class="d-card-s">Skala: 1 = Tidak Pernah, 2 = Jarang, 3 = Sering, 4 = Selalu.</p>
                    </div>
                </div>

                <div>
                    <?php $idxP = 0; ?>
                    <?php $__currentLoopData = $pendidikQs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section => $questions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-group-bar"><?php echo e($section); ?></div>
                        <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-item" data-eval-item data-peran="pendidik">
                                <div>
                                    <p class="d-item-no">Pernyataan <?php echo e($idxP + 1); ?></p>
                                    <p class="d-item-q"><?php echo e($q); ?></p>
                                </div>
                                <div class="d-opts">
                                    <?php for($i=1; $i<=4; $i++): ?>
                                        <label class="d-opt">
                                            <input type="radio" name="pendidik_skor[<?php echo e($idxP); ?>]" value="<?php echo e($i); ?>" class="d-radio" data-eval-radio="pendidik" <?php if(old("pendidik_skor.$idxP") == $i): echo 'checked'; endif; ?>>
                                            <span class="d-opt-skor"><?php echo e($i); ?></span>
                                            <span class="d-opt-txt">
                                                <?php if($i==1): ?> Tidak Pernah
                                                <?php elseif($i==2): ?> Jarang
                                                <?php elseif($i==3): ?> Sering
                                                <?php else: ?> Selalu <?php endif; ?>
                                            </span>
                                        </label>
                                    <?php endfor; ?>
                                </div>
                                
                                
                                <div class="d-bukti-wrap">
                                    <label class="d-bukti-label" for="pendidik_bukti_<?php echo e($idxP); ?>">
                                        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Catatan/Bukti
                                        <span class="d-bukti-optional">(opsional)</span>
                                    </label>
                                    <textarea id="pendidik_bukti_<?php echo e($idxP); ?>" name="pendidik_bukti[<?php echo e($idxP); ?>]" rows="2" class="d-field" placeholder="Tuliskan bukti konkret (mis. nama dokumen, foto, atau tautan LMS)..."><?php echo e(old("pendidik_bukti.$idxP")); ?></textarea>
                                </div>
                            </div>
                            <?php $idxP++; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </section>

            
            <section class="d-card" id="form-murid">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">B. Instrumen Murid</h2>
                        <p class="d-card-s">Skala: 1 = STS, 2 = TS, 3 = S, 4 = SS.</p>
                    </div>
                </div>

                <div>
                    <?php $idxM = 0; ?>
                    <?php $__currentLoopData = $muridQs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section => $questions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-group-bar"><?php echo e($section); ?></div>
                        <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-item" data-eval-item data-peran="murid">
                                <div>
                                    <p class="d-item-no">Pernyataan <?php echo e($idxM + 1); ?></p>
                                    <p class="d-item-q"><?php echo e($q); ?></p>
                                </div>
                                <div class="d-opts">
                                    <?php for($i=1; $i<=4; $i++): ?>
                                        <label class="d-opt">
                                            <input type="radio" name="murid_skor[<?php echo e($idxM); ?>]" value="<?php echo e($i); ?>" class="d-radio" data-eval-radio="murid" <?php if(old("murid_skor.$idxM") == $i): echo 'checked'; endif; ?>>
                                            <span class="d-opt-skor"><?php echo e($i); ?></span>
                                            <span class="d-opt-txt">
                                                <?php if($i==1): ?> STS
                                                <?php elseif($i==2): ?> TS
                                                <?php elseif($i==3): ?> S
                                                <?php else: ?> SS <?php endif; ?>
                                            </span>
                                        </label>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <?php $idxM++; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </section>

            
            <div class="d-foot">
                <button type="submit" class="d-pbtn b-mint">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                        <path d="M17 21v-8H7v8M7 3v5h8" />
                    </svg>
                    Simpan Instrumen
                </button>
            </div>
        </form>
    </div>

    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const peranSelect = document.getElementById('peran_responden');
            const formPendidik = document.getElementById('form-pendidik');
            const formMurid = document.getElementById('form-murid');
            const totalPendidik = <?php echo e($totalPendidik); ?>;
            const totalMurid = <?php echo e($totalMurid); ?>;

            function togglePeran() {
                const peran = peranSelect.value;

                if (peran === 'Pendidik') {
                    formPendidik.style.display = 'block';
                    formMurid.style.display = 'none';
                    
                    formPendidik.querySelectorAll('input[type="radio"]').forEach(el => { el.required = true; el.disabled = false; });
                    formMurid.querySelectorAll('input[type="radio"]').forEach(el => { el.required = false; el.disabled = true; el.checked = false; });
                } else {
                    formPendidik.style.display = 'none';
                    formMurid.style.display = 'block';
                    
                    formPendidik.querySelectorAll('input[type="radio"]').forEach(el => { el.required = false; el.disabled = true; el.checked = false; });
                    formMurid.querySelectorAll('input[type="radio"]').forEach(el => { el.required = true; el.disabled = false; });
                }
                updateProgress();
            }

            function updateProgress() {
                const peran = peranSelect.value;
                const checkedRadios = document.querySelectorAll(`input[data-eval-radio="${peran.toLowerCase()}"]:checked`);
                
                const totalIndikator = peran === 'Pendidik' ? totalPendidik : totalMurid;
                const checkedCount = checkedRadios.length;

                let totalScore = 0;
                checkedRadios.forEach(el => {
                    totalScore += Number(el.value);
                });

                const percent = totalIndikator ? Math.round(checkedCount / totalIndikator * 100) : 0;

                document.getElementById('evaluasi-progress-percent').textContent = percent + '%';
                document.getElementById('evaluasi-progress-bar').style.width = percent + '%';
                document.getElementById('evaluasi-progress-text').textContent = checkedCount + ' / ' + totalIndikator + ' butir';
                
                document.getElementById('evaluasi-score-text').textContent = checkedCount
                    ? totalScore + ' poin dari ' + checkedCount + ' indikator'
                    : 'Belum ada penilaian';
            }

            peranSelect.addEventListener('change', togglePeran);

            document.querySelectorAll('input[type="radio"]').forEach(el => {
                el.addEventListener('change', updateProgress);
            });

            // Inisialisasi awal
            togglePeran();
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Herd\bgtk-monev\resources\views/instrumen/stem/fasda/evaluasi/create.blade.php ENDPATH**/ ?>