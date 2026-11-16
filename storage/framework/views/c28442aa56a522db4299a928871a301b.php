


<?php $__env->startSection('title', 'Instrumen Dampak (Wawancara)'); ?>
<?php $__env->startSection('page-title', 'Instrumen Dampak (Wawancara)'); ?>

<?php $__env->startSection('content'); ?>

    <?php
        $identitasFields = [
            ['nama_sekolah', 'Nama Sekolah / Satuan Pendidikan', 'text', true, 'Masukkan nama sekolah'],
            ['nama_pendidik', 'Nama Pendidik / Guru', 'text', true, 'Masukkan nama pendidik'],
            ['mata_pelajaran', 'Mata Pelajaran', 'text', false, 'Contoh: Matematika / IPA'],
            ['tanggal_observasi', 'Tanggal Observasi', 'date', true, now()->format('Y-m-d')],
        ];

        $bagian1 = [
            'konteks_masalah' => [
                'judul' => 'Konteks Masalah',
                'indikator' => 'Modul Ajar memuat deskripsi masalah kontekstual yang spesifik dan relevan dengan lingkungan sekitar, bukan masalah teoretis abstrak.',
            ],
            'skenario_lkpd' => [
                'judul' => 'Skenario Aktivitas (LKPD)',
                'indikator' => 'LKPD memuat instruksi yang mengarahkan murid melakukan siklus Engineering Design Process (Analisis, Perancangan, Pengujian, Refleksi).',
            ],
            'integrasi_disiplin' => [
                'judul' => 'Integrasi Disiplin Ilmu',
                'indikator' => 'Terdapat alokasi waktu dan aktivitas spesifik yang mengawinkan Sains, Matematika atau konsep lain dengan proses Enjinering dan Teknologi.',
            ],
            'instrumen_asesmen' => [
                'judul' => 'Instrumen Asesmen',
                'indikator' => 'Guru memiliki rubrik penilaian proses (keterampilan merancang, kerja sama) dan produk akhir, tidak hanya tes tertulis kognitif.',
            ],
        ];

        $bagian2 = [
            'prinsip_5m' => [
                'judul' => 'Prinsip 5M (Murah & Mudah)',
                'indikator' => 'Bahan dan alat eksplorasi yang digunakan murid memanfaatkan material lokal/bekas/sehari-hari yang terjangkau.',
            ],
            'aksi_eksperimen' => [
                'judul' => 'Aksi Eksperimen (ARKA)',
                'indikator' => 'Murid secara fisik memanipulasi bahan, membuat purwarupa, atau menguji coba solusi (hands-on).',
            ],
            'dinamika_kolaborasi' => [
                'judul' => 'Dinamika Kolaborasi',
                'indikator' => 'Kerja kelompok terdistribusi dengan peran yang jelas. Tidak didominasi oleh 1-2 murid saja.',
            ],
            'resiliensi' => [
                'judul' => 'Resiliensi & Mindful',
                'indikator' => 'Saat purwarupa atau eksperimen gagal, guru memfasilitasi dialog investigasi (troubleshooting) alih-alih memberikan jawaban langsung.',
            ],
            'fungsionalitas' => [
                'judul' => 'Fungsionalitas Purwarupa',
                'indikator' => 'Terdapat produk fisik atau maket solusi yang benar-benar bisa diuji coba cara kerjanya secara mekanis/logis.',
            ],
        ];

        $wawancaraMurid = [
            1 => 'Bisa ceritakan karya apa yang kelompok kalian buat? Kenapa memilih bentuk atau bahan ini?',
            2 => 'Waktu bikin alat ini, sempat ada yang gagal atau nggak jalan, kan? Waktu itu apa yang kalian lakukan buat memperbaikinya?',
            3 => 'Di kelompok ini, tugas kamu ngapain aja? Teman yang lain ngerjain apa?',
            4 => 'Konsep mata pelajaran apa yang kalian pakai waktu bikin karya ini?',
        ];

        $wawancaraPendidik = [
            1 => 'Bagian mana dari siklus Engineering Design Process (EDP) yang menurut Bapak/Ibu paling menantang saat diterapkan ke anak-anak?',
            2 => 'Bagaimana Bapak/Ibu memastikan bahan yang digunakan murid benar-benar memenuhi prinsip \'Murah dan Mudah\' (5M)?',
            3 => 'Bisa ceritakan satu momen saat murid mengalami kebuntuan? Bagaimana cara Bapak/Ibu memfasilitasi mereka tanpa memberikan jawaban langsung?',
            4 => 'Terkait asesmen autentik, boleh diceritakan bagaimana cara Bapak/Ibu menilai proses kerja sama murid saat mereka sedang sibuk merakit atau berdiskusi?',
        ];

        // Total indikator skor (4 dari Bagian 1 + 5 dari Bagian 2)
        $totalSkorIndikator = count($bagian1) + count($bagian2);
    ?>

    <style>
        /* ===================== TOKEN WARNA (Sama dengan PKGSD MBI) ===================== */
        :root {
            --p-50: #eff4ff;
            --p-100: #dbe7fe;
            --p-200: #bfd4fb;
            --p-500: #3b82f6;
            --p-600: #2563eb;
            --p-700: #1d4ed8;
            --p-800: #1e40af;
            --accent: #f5b82e;
            --ink: #0f1b3d;
            --muted: #64748b;
            --line: #e6ebf5;
        }

        .d-wrap { display: flex; flex-direction: column; gap: 22px; }
        .d-form { display: flex; flex-direction: column; gap: 22px; }

        .d-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            overflow: hidden;
        }

        .d-card-h { font-size: 16px; font-weight: 700; color: var(--ink); letter-spacing: -.01em; }
        .d-card-s { margin-top: 2px; font-size: 12.5px; color: var(--muted); }

        .d-card-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            padding: 20px 20px 14px;
        }

        /* --- judul halaman --- */
        .d-title-row { display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; }
        @media (max-width: 640px) { .d-title-row { flex-direction: column; } }

        .d-h1 { font-size: 28px; font-weight: 400; letter-spacing: -.02em; color: var(--ink); line-height: 1.2; }
        .d-h1 b { font-weight: 700; }
        .d-crumb { margin-top: 4px; font-size: 12.5px; color: var(--muted); }
        .d-crumb a { color: inherit; transition: color .2s; text-decoration: none; }
        .d-crumb a:hover { color: var(--p-600); }
        .d-desc { margin-top: 10px; max-width: 640px; font-size: 13px; line-height: 1.7; color: #475569; }

        /* --- tombol pastel --- */
        .d-pbtn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex-shrink: 0;
            height: 46px;
            padding: 0 18px;
            border-radius: 14px;
            background: var(--b-bg);
            border: 1px solid var(--b-line);
            color: var(--b-ink);
            font-family: inherit;
            font-size: 13.5px;
            font-weight: 700;
            cursor: pointer;
            white-space: nowrap;
            text-decoration: none;
            transition: transform .25s ease, box-shadow .25s ease, filter .25s ease;
        }
        .d-pbtn:hover {
            transform: translateY(-1px);
            filter: brightness(.97);
            box-shadow: 0 12px 22px -14px var(--b-glow);
        }
        .d-pbtn svg { flex-shrink: 0; transition: transform .3s ease; }
        .d-pbtn.back:hover svg { transform: translateX(-3px); }

        .b-blue {
            --b-bg: linear-gradient(160deg, #eaf0ff 0%, #d3e1ff 100%);
            --b-line: #c6d8fb;
            --b-ink: #1d4ed8;
            --b-glow: rgba(37, 99, 235, .7);
        }

        .b-mint {
            --b-bg: linear-gradient(160deg, #e9faf2 0%, #cdf0e0 100%);
            --b-line: #bfe8d4;
            --b-ink: #047857;
            --b-glow: rgba(5, 150, 105, .7);
        }

        .b-slate {
            --b-bg: linear-gradient(160deg, #f6f8fc 0%, #e6ebf5 100%);
            --b-line: #d9e0ee;
            --b-ink: #475569;
            --b-glow: rgba(71, 85, 105, .6);
        }

        .d-foot { display: flex; justify-content: flex-end; gap: 12px; flex-wrap: wrap; }

        /* --- info instrumen + progres --- */
        .d-info-card { display: grid; grid-template-columns: minmax(0, 1fr); }
        @media (min-width: 1024px) { .d-info-card { grid-template-columns: minmax(0, 1fr) 280px; } }

        .d-info-main { padding: 22px; border-left: 4px solid var(--p-600); }
        .d-info-head { display: flex; align-items: flex-start; gap: 14px; }

        .d-info-ico {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 44px;
            height: 44px;
            border-radius: 14px;
            background: var(--p-50);
            color: var(--p-600);
        }

        .d-note {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 18px;
            padding: 12px 14px;
            border: 1px dashed var(--p-200);
            border-radius: 14px;
            background: #f5f8ff;
            font-size: 12.5px;
            line-height: 1.7;
            color: #475569;
        }
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

        /* --- notifikasi error --- */
        .d-error { padding: 16px 20px; border-radius: 16px; background: #fff1f2; border: 1px solid #fecdd3; color: #be123c; }
        .d-error b { font-size: 13px; font-weight: 700; }
        .d-error ul { margin: 8px 0 0 18px; list-style: disc; font-size: 12.5px; line-height: 1.8; }

        /* --- form --- */
        .d-form-grid {
            display: grid;
            gap: 18px;
            padding: 6px 20px 22px;
            grid-template-columns: minmax(0, 1fr);
        }
        @media (min-width: 768px) {
            .d-form-grid.c2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .d-form-grid .span2 { grid-column: 1 / -1; }
        }

        .d-label { display: block; margin-bottom: 8px; font-size: 12.5px; font-weight: 600; color: var(--ink); }
        .d-label i { color: #e11d48; font-style: normal; }

        .d-field {
            width: 100%;
            height: 44px;
            padding: 0 14px;
            border: 1px solid var(--line);
            border-radius: 12px;
            background: #fff;
            color: #334155;
            font-family: inherit;
            font-size: 13px;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        textarea.d-field { height: auto; padding: 11px 14px; line-height: 1.6; resize: vertical; }
        .d-field::placeholder { color: #94a3b8; }
        .d-field:focus { border-color: var(--p-500); box-shadow: 0 0 0 4px var(--p-100); }
        .d-field:disabled { background: #f8fafc; color: #94a3b8; }

        .d-err { margin-top: 6px; font-size: 12px; color: #e11d48; }

        /* --- badge --- */
        .d-badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 10px;
            border-radius: 8px;
            font-size: 11.5px;
            font-weight: 700;
            text-align: center;
            white-space: nowrap;
        }

        /* --- indikator kartu rubrik --- */
        .d-group-bar { padding: 11px 20px; font-size: 12.5px; font-weight: 700; color: var(--ink); border-top: 1px solid var(--line); }
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

        /* --- OPSI RADIO (DIPERBAIKI SEJAJAR) --- */
        .d-opt {
            display: flex;
            align-items: center; /* Sejajar tengah secara vertikal */
            gap: 12px;
            padding: 12px 14px;
            border: 1px solid var(--line);
            border-radius: 14px;
            background: #fff;
            cursor: pointer;
            transition: border-color .2s, background .2s;
        }
        .d-opt:hover { border-color: var(--p-200); background: #f7f9ff; }
        .d-opt:has(input:checked) { border-color: var(--p-500); background: var(--p-50); box-shadow: 0 0 0 3px var(--p-100); }
        
        .d-opt input { 
            margin: 0; 
            width: 18px; 
            height: 18px;
            accent-color: var(--p-600); 
            cursor: pointer;
        }

        .d-opt-skor {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            flex-shrink: 0;
            border-radius: 8px;
            background: var(--p-50);
            color: var(--p-700);
            font-size: 11.5px;
            font-weight: 800;
        }
        
        .d-opt:has(input:checked) .d-opt-skor { background: var(--p-600); color: #fff; }
        
        .d-opt-txt { 
            font-size: 12.5px; 
            line-height: 1.5; 
            color: #475569; 
            margin: 0;
        }

        .d-evid { display: grid; gap: 14px; margin-top: 14px; grid-template-columns: minmax(0, 1fr); }
        @media (min-width: 768px) { .d-evid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
        .d-evid .d-label { font-size: 12px; margin-bottom: 6px; }
        .d-evid [hidden] { display: none; }
    </style>

    <div class="d-wrap">

        
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Instrumen <b>Dampak (Wawancara)</b></h1>
                    <p class="d-crumb">
                        Dashboard &nbsp;›&nbsp;
                        <a href="<?php echo e(route('instrumen.index')); ?>">Instrumen</a> &nbsp;›&nbsp;
                        <a href="<?php echo e(route('instrumen.stem.index')); ?>">STEM</a> &nbsp;›&nbsp;
                        <a href="<?php echo e(route('instrumen.stem.fasda')); ?>">Fasda</a> &nbsp;›&nbsp; Dampak
                    </p>
                    <p class="d-desc">
                        Lembar observasi, telaah artefak, dan wawancara terbuka untuk mengukur dampak pelatihan STEM pada pendidik dan murid.
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
                                Instrumen ini diisi oleh Tim BGTK NTB berdasarkan observasi langsung, wawancara, dan studi dokumen.
                            </p>
                        </div>
                    </div>

                    <div class="d-note">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:3px;color:var(--p-600)">
                            <path d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>
                        <div>
                            <b class="t">Skala Penilaian 1-4</b>
                            <ul>
                                <li><b>1 = Belum Terlihat</b> (Bukti tidak ditemukan sama sekali)</li>
                                <li><b>2 = Terlihat Sebagian</b> (Ada bukti, namun belum sepenuhnya sesuai standar)</li>
                                <li><b>3 = Sesuai Kriteria</b> (Bukti dan praktik sesuai dengan indikator)</li>
                                <li><b>4 = Sangat Sesuai</b> (Praktik dilakukan dengan sangat konsisten dan mendalam)</li>
                            </ul>
                            <p style="margin-top:8px;font-size:12px;color:var(--muted)">
                                Catatan/Bukti wajib diisi jika memberikan Skor 3 atau 4.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="d-prog">
                    <div class="d-prog-row">
                        <span class="d-prog-label">Progres penilaian skor</span>
                        <span id="dampak-progress-percent" class="d-prog-pct">0%</span>
                    </div>
                    <div class="d-bar">
                        <div id="dampak-progress-bar" style="width: 0%"></div>
                    </div>
                    <div class="d-prog-row" style="margin-top:10px">
                        <span id="dampak-progress-text" class="d-prog-val">0 / <?php echo e($totalSkorIndikator); ?> butir</span>
                        <span class="d-prog-label" style="font-weight:500">Indikator</span>
                    </div>
                    <div class="d-prog-sep">
                        <p class="d-prog-label">Skor sementara</p>
                        <p id="dampak-score-text" class="d-prog-val" style="margin-top:4px">Belum ada penilaian</p>
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

        
        <form action="<?php echo e(route('instrumen.stem.fasda.dampak.store')); ?>" method="POST" class="d-form" id="dampak-form">
            <?php echo csrf_field(); ?>

            
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">A. Identitas Observasi</h2>
                        <p class="d-card-s">Informasi sekolah dan pendidik yang diobservasi.</p>
                    </div>
                </div>
                <div class="d-form-grid c2">
                    <?php $__currentLoopData = $identitasFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$name, $label, $type, $required, $placeholder]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <label for="<?php echo e($name); ?>" class="d-label">
                                <?php echo e($label); ?> <?php if($required): ?> <i>*</i> <?php endif; ?>
                            </label>
                            <input id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" type="<?php echo e($type); ?>"
                                value="<?php echo e(old($name, $type === 'date' ? $placeholder : '')); ?>" <?php if($required): echo 'required'; endif; ?>
                                placeholder="<?php echo e($type === 'date' ? '' : $placeholder); ?>" class="d-field">
                            <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="d-err"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="span2">
                        <label for="nama_petugas_monev" class="d-label">Nama Petugas Monev <i>*</i></label>
                        <input id="nama_petugas_monev" name="nama_petugas_monev" type="text" required
                            value="<?php echo e(old('nama_petugas_monev')); ?>" placeholder="Masukkan nama petugas" class="d-field">
                        <?php $__errorArgs = ['nama_petugas_monev'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="d-err"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </section>

            
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">B. Telaah Dokumen Perencanaan & Asesmen</h2>
                        <p class="d-card-s">Fokus: Memvalidasi silang dokumen modul ajar, LKPD, dan asesmen.</p>
                    </div>
                    <span class="d-badge" style="background:#dbeafe;color:#1d4ed8"><?php echo e(count($bagian1)); ?> indikator</span>
                </div>

                <div>
                    <?php $__currentLoopData = $bagian1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-item" data-dampak-item>
                            <div>
                                <p class="d-item-no"><?php echo e($data['judul']); ?></p>
                                <p class="d-item-q"><?php echo e($data['indikator']); ?></p>
                            </div>

                            <div class="d-opts">
                                <?php for($i = 1; $i <= 4; $i++): ?>
                                    <label class="d-opt">
                                        <input type="radio" name="skor_<?php echo e($field); ?>" value="<?php echo e($i); ?>"
                                            <?php if(old('skor_'.$field) == $i): echo 'checked'; endif; ?> required class="d-radio">
                                        
                                        <span class="d-opt-skor"><?php echo e($i); ?></span>
                                        
                                        <span class="d-opt-txt">
                                            <?php if($i == 1): ?> Belum Terlihat
                                            <?php elseif($i == 2): ?> Terlihat Sebagian
                                            <?php elseif($i == 3): ?> Sesuai Kriteria
                                            <?php else: ?> Sangat Sesuai <?php endif; ?>
                                        </span>
                                    </label>
                                <?php endfor; ?>
                            </div>

                            <div class="d-evid">
                                <div>
                                    <label class="d-label">Catatan Temuan & Bukti Artefak (Wajib untuk Skor 3/4)</label>
                                    <textarea data-dampak-evidence="<?php echo e($field); ?>" name="bukti_<?php echo e($field); ?>" rows="2"
                                        placeholder="Tuliskan bukti konkret..." class="d-field"><?php echo e(old('bukti_'.$field)); ?></textarea>
                                    <?php $__errorArgs = ["bukti_{$field}"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="d-err"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </section>

            
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">C. Observasi Pelaksanaan Pembelajaran di Kelas</h2>
                        <p class="d-card-s">Fokus: Memvalidasi interaksi murid dan penerapan prinsip 5M serta ARKA.</p>
                    </div>
                    <span class="d-badge" style="background:#d1fae5;color:#047857"><?php echo e(count($bagian2)); ?> indikator</span>
                </div>

                <div>
                    <?php $__currentLoopData = $bagian2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-item" data-dampak-item>
                            <div>
                                <p class="d-item-no"><?php echo e($data['judul']); ?></p>
                                <p class="d-item-q"><?php echo e($data['indikator']); ?></p>
                            </div>

                            <div class="d-opts">
                                <?php for($i = 1; $i <= 4; $i++): ?>
                                    <label class="d-opt">
                                        <input type="radio" name="skor_<?php echo e($field); ?>" value="<?php echo e($i); ?>"
                                            <?php if(old('skor_'.$field) == $i): echo 'checked'; endif; ?> required class="d-radio">
                                        
                                        <span class="d-opt-skor"><?php echo e($i); ?></span>
                                        
                                        <span class="d-opt-txt">
                                            <?php if($i == 1): ?> Belum Terlihat
                                            <?php elseif($i == 2): ?> Terlihat Sebagian
                                            <?php elseif($i == 3): ?> Sesuai Kriteria
                                            <?php else: ?> Sangat Sesuai <?php endif; ?>
                                        </span>
                                    </label>
                                <?php endfor; ?>
                            </div>

                            <div class="d-evid">
                                <div>
                                    <label class="d-label">Catatan Temuan & Bukti Artefak (Wajib untuk Skor 3/4)</label>
                                    <textarea data-dampak-evidence="<?php echo e($field); ?>" name="bukti_<?php echo e($field); ?>" rows="2"
                                        placeholder="Tuliskan bukti konkret..." class="d-field"><?php echo e(old('bukti_'.$field)); ?></textarea>
                                    <?php $__errorArgs = ["bukti_{$field}"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="d-err"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </section>

            
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">D. Panduan Wawancara Terbuka</h2>
                        <p class="d-card-s">Fokus: Menggali data kualitatif dan pemahaman mendalam dari Pendidik dan Murid.</p>
                    </div>
                </div>
                <div class="d-form-grid">
                    <h3 style="font-size: 14px; font-weight: 700; color: var(--p-700); border-bottom: 1px solid var(--line); padding-bottom: 8px;">Wawancara Murid</h3>
                    <?php $__currentLoopData = $wawancaraMurid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $teks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <label class="d-label"><?php echo e($no); ?>. <?php echo e($teks); ?></label>
                            <textarea name="wawancara_murid_<?php echo e($no); ?>" rows="3" class="d-field" placeholder="Tuliskan jawaban murid..."><?php echo e(old("wawancara_murid_$no")); ?></textarea>
                            <?php $__errorArgs = ["wawancara_murid_$no"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="d-err"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <h3 style="font-size: 14px; font-weight: 700; color: var(--p-700); margin-top: 16px; border-bottom: 1px solid var(--line); padding-bottom: 8px;">Wawancara Pendidik</h3>
                    <?php $__currentLoopData = $wawancaraPendidik; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $teks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <label class="d-label"><?php echo e($no); ?>. <?php echo e($teks); ?></label>
                            <textarea name="wawancara_pendidik_<?php echo e($no); ?>" rows="3" class="d-field" placeholder="Tuliskan jawaban pendidik..."><?php echo e(old("wawancara_pendidik_$no")); ?></textarea>
                            <?php $__errorArgs = ["wawancara_pendidik_$no"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="d-err"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
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
            const form = document.getElementById('dampak-form');
            const totalIndikator = <?php echo e($totalSkorIndikator); ?>;

            function updateTD() {
                // Validasi bukti wajib jika skor 3/4
                document.querySelectorAll('[data-dampak-item]').forEach(item => {
                    const checkedScore = item.querySelector('input[type="radio"]:checked');
                    const evidence = item.querySelector('[data-dampak-evidence]');
                    if (evidence) {
                        const needsEvidence = !!checkedScore && ['3', '4'].includes(checkedScore.value);
                        evidence.required = needsEvidence;
                        evidence.setAttribute('aria-required', needsEvidence ? 'true' : 'false');
                    }
                });
            }

            function updateProgress() {
                const checkedRadios = form.querySelectorAll('input[type="radio"]:checked');
                const checkedCount = checkedRadios.length;

                let totalScore = 0;
                checkedRadios.forEach(el => {
                    totalScore += Number(el.value);
                });

                const percent = totalIndikator ? Math.round(checkedCount / totalIndikator * 100) : 0;

                document.getElementById('dampak-progress-percent').textContent = percent + '%';
                document.getElementById('dampak-progress-bar').style.width = percent + '%';
                document.getElementById('dampak-progress-text').textContent = checkedCount + ' / ' + totalIndikator + ' butir';
                
                document.getElementById('dampak-score-text').textContent = checkedCount
                    ? totalScore + ' poin dari ' + checkedCount + ' indikator berskor'
                    : 'Belum ada penilaian';
            }

            form.querySelectorAll('input[type="radio"]').forEach(el => {
                el.addEventListener('change', function () {
                    updateTD();
                    updateProgress();
                });
            });

            // Inisialisasi awal
            updateTD();
            updateProgress();
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Herd\bgtk-monev\resources\views/instrumen/stem/fasda/dampak/create.blade.php ENDPATH**/ ?>