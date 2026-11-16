<?php $__env->startSection('title', 'Pengisian Instrumen BCKS'); ?>

<?php $__env->startSection('page-title', 'Pengisian Instrumen BCKS'); ?>

<?php $__env->startSection('content'); ?>

    <?php
        $levels = config('bcks.instrumen.levels', []);
        $pertanyaanTerbuka = config('bcks.instrumen.pertanyaan_terbuka', []);

        /*
         * Rubrik penilaian per level (sumber: Instrumen Monev BCKS - Rev update).
         * Kunci array = urutan level pada $levels (1 sampai 4).
         */
        $rubrik = [
            1 => [
                'judul' => 'Level 1 Reaksi (Reaction)',
                'deskripsi' => 'Mengukur tingkat kepuasan dan persepsi peserta terhadap penyelenggaraan pelatihan.',
                'skor' => [
                    1 => ['kategori' => 'Sangat Kurang', 'kriteria' => 'Peserta menilai materi tidak relevan, metode membosankan/tidak jelas, fasilitator kurang menguasai materi, dan fasilitas/layanan pelatihan sangat menghambat.'],
                    2 => ['kategori' => 'Kurang', 'kriteria' => 'Materi kurang teoretis/aplikatif, metode kurang variatif, penyampaian fasilitator sebatas ceramah, serta fasilitas hanya memenuhi kebutuhan minimal.'],
                    3 => ['kategori' => 'Baik', 'kriteria' => 'Materi relevan dengan kebutuhan sekolah, metode interaktif (simulasi/studi kasus berjalan baik), fasilitator menguasai materi, dan fasilitas memadai.'],
                    4 => ['kategori' => 'Sangat Baik', 'kriteria' => 'Materi sangat kontekstual dengan masalah nyata sekolah, metode sangat kontekstual dan komunikatif, fasilitator highly inspiring, serta fasilitas/LMS sangat mendukung.'],
                ],
            ],
            2 => [
                'judul' => 'Level 2 Pembelajaran (Learning)',
                'deskripsi' => 'Mengukur tingkat pemahaman konseptual, kesiapan mental, dan perubahan growth mindset.',
                'skor' => [
                    1 => ['kategori' => 'Sangat Kurang', 'kriteria' => 'Tidak ada peningkatan pemahaman konseptual, tidak percaya diri memimpin, ragu terhadap perubahan, dan tidak menunjukkan peningkatan disiplin.'],
                    2 => ['kategori' => 'Kurang', 'kriteria' => 'Memahami konsep dasar tetapi masih bingung dalam penerapannya, rasa percaya diri masih rendah, serta growth mindset hanya tampak saat didorong.'],
                    3 => ['kategori' => 'Baik', 'kriteria' => 'Mampu memahami konsep kepemimpinan dengan baik, memiliki kepercayaan diri memimpin perubahan, memiliki growth mindset cukup kuat serta menunjukkan komitmen kedisiplinan yang konsisten.'],
                    4 => ['kategori' => 'Sangat Baik', 'kriteria' => 'Menguasai pemahaman konseptual secara mendalam, sangat siap dan percaya diri menjadi agen perubahan, memiliki growth mindset kuat, serta menjadi teladan kedisiplinan.'],
                ],
            ],
            3 => [
                'judul' => 'Level 3 Perubahan Perilaku dan Penerapan Kompetensi (Behavior)',
                'deskripsi' => 'Mengukur penerapan kompetensi pelatihan dalam praktik kepemimpinan sehari-hari di sekolah.',
                'skor' => [
                    1 => ['kategori' => 'Belum Tampak', 'kriteria' => 'BCKS belum menerapkan materi/kompetensi pelatihan sama sekali dalam praktik kerja sehari-hari di sekolah.'],
                    2 => ['kategori' => 'Mulai Tampak', 'kriteria' => 'Menerapkan kompetensi secara terbatas, belum konsisten, dan masih memerlukan arahan atau bimbingan intensif dari pengawas/kepala sekolah.'],
                    3 => ['kategori' => 'Konsisten', 'kriteria' => 'Menerapkan kompetensi kepemimpinan, perencanaan berbasis data, dan coaching secara mandiri, rutin, serta sesuai standar operasional.'],
                    4 => ['kategori' => 'Membudaya / Inovatif', 'kriteria' => 'Menerapkan kompetensi hingga menjadi budaya kerja, menciptakan inovasi program baru, dan mampu membimbing (mentoring) guru atau sejawat lain.'],
                ],
            ],
            4 => [
                'judul' => 'Level 4 Hasil atau Dampak Organisasi (Results)',
                'deskripsi' => 'Mengukur perubahan nyata pada mutu sekolah, budaya kerja, dan kepuasan layanan.',
                'skor' => [
                    1 => ['kategori' => 'Belum Terlihat', 'kriteria' => 'Belum ada perubahan positif pada mutu pembelajaran, budaya kerja guru, maupun tata kelola sekolah pascapelatihan.'],
                    2 => ['kategori' => 'Terlihat Sebagian', 'kriteria' => 'Terjadi perubahan kecil pada unit kerja tertentu, namun belum berdampak pada peningkatan mutu sekolah secara menyeluruh.'],
                    3 => ['kategori' => 'Terlihat Jelas', 'kriteria' => 'Perubahan positif terbukti pada indikator utama sekolah (seperti skor Rapor Pendidikan naik, efisiensi operasional meningkat, kolaborasi guru terbangun).'],
                    4 => ['kategori' => 'Terdampak luas dan berkelanjutan', 'kriteria' => 'Perubahan berdampak luas pada seluruh warga sekolah, tercipta jejaring kemitraan kuat, kepuasan pemangku kepentingan tinggi, dan program inovasi berjalan secara berkelanjutan.'],
                ],
            ],
        ];

        // Warna per level (sama dengan halaman hasil penilaian)
        $levelPalette = [
            1 => ['badge' => 'background:#dbeafe;color:#1d4ed8', 'row' => '#eff4ff'],
            2 => ['badge' => 'background:#ede9fe;color:#6d28d9', 'row' => '#f5f1ff'],
            3 => ['badge' => 'background:#d1fae5;color:#047857', 'row' => '#eefaf4'],
            4 => ['badge' => 'background:#fef3c7;color:#b45309', 'row' => '#fffaea'],
        ];
    ?>

        <style>
            /* ===================== TOKEN WARNA (sama dengan Data Sekolah) ===================== */
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

            .d-wrap {
                display: flex;
                flex-direction: column;
                gap: 22px;
            }

            .d-form {
                display: flex;
                flex-direction: column;
                gap: 22px;
            }

            .d-card {
                background: #fff;
                border: 1px solid var(--line);
                border-radius: 18px;
                overflow: hidden;
            }

            [data-bcks-level][hidden] {
                display: none;
            }

            .d-card-h {
                font-size: 16px;
                font-weight: 700;
                color: var(--ink);
                letter-spacing: -.01em;
            }

            .d-card-s {
                margin-top: 2px;
                font-size: 12.5px;
                color: var(--muted);
            }

            .d-card-top {
                display: flex;
                align-items: flex-start;
                justify-content: space-between;
                gap: 12px;
                padding: 20px 20px 14px;
            }

            .d-pill {
                display: inline-flex;
                align-items: center;
                padding: 5px 10px;
                border-radius: 9px;
                background: var(--p-50);
                color: var(--p-700);
                font-size: 11.5px;
                font-weight: 600;
                white-space: nowrap;
            }

            /* --- judul halaman --- */
            .d-title-row {
                display: flex;
                align-items: flex-start;
                justify-content: space-between;
                gap: 16px;
            }

            @media (max-width: 640px) {
                .d-title-row {
                    flex-direction: column;
                }
            }

            .d-h1 {
                font-size: 28px;
                font-weight: 400;
                letter-spacing: -.02em;
                color: var(--ink);
                line-height: 1.2;
            }

            .d-h1 b {
                font-weight: 700;
            }

            .d-crumb {
                margin-top: 4px;
                font-size: 12.5px;
                color: var(--muted);
            }

            .d-crumb a {
                color: inherit;
                transition: color .2s;
            }

            .d-crumb a:hover {
                color: var(--p-600);
            }

            .d-desc {
                margin-top: 10px;
                max-width: 640px;
                font-size: 13px;
                line-height: 1.7;
                color: #475569;
            }

            /* --- tombol pastel (warna mengikuti tile) --- */
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
                transition: transform .25s ease, box-shadow .25s ease, filter .25s ease;
            }

            .d-pbtn:hover {
                transform: translateY(-1px);
                filter: brightness(.97);
                box-shadow: 0 12px 22px -14px var(--b-glow);
            }

            .d-pbtn svg {
                flex-shrink: 0;
                transition: transform .3s ease;
            }

            .d-pbtn.back:hover svg {
                transform: translateX(-3px);
            }

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

            .d-foot {
                display: flex;
                justify-content: flex-end;
            }

            /* --- info instrumen + progres --- */
            .d-info-card {
                display: grid;
                grid-template-columns: minmax(0, 1fr);
            }

            @media (min-width: 1024px) {
                .d-info-card {
                    grid-template-columns: minmax(0, 1fr) 280px;
                }
            }

            .d-info-main {
                padding: 22px;
                border-left: 4px solid var(--p-600);
            }

            .d-info-head {
                display: flex;
                align-items: flex-start;
                gap: 14px;
            }

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

            .d-note b.t {
                display: block;
                font-weight: 700;
                color: var(--p-700);
            }

            .d-prog {
                padding: 22px;
                border-top: 1px solid var(--line);
                background: #f9fbff;
            }

            @media (min-width: 1024px) {
                .d-prog {
                    border-top: 0;
                    border-left: 1px solid var(--line);
                }
            }

            .d-prog-row {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 10px;
            }

            .d-prog-label {
                font-size: 12px;
                font-weight: 600;
                color: var(--muted);
            }

            .d-prog-pct {
                font-size: 12px;
                font-weight: 800;
                color: var(--p-600);
            }

            .d-bar {
                height: 8px;
                margin-top: 10px;
                overflow: hidden;
                border-radius: 9999px;
                background: #e6ebf5;
            }

            .d-bar>div {
                height: 100%;
                border-radius: 9999px;
                background: var(--p-600);
                transition: width .3s ease;
            }

            .d-prog-val {
                font-size: 14px;
                font-weight: 800;
                color: var(--ink);
            }

            .d-prog-sep {
                margin-top: 18px;
                padding-top: 16px;
                border-top: 1px solid var(--line);
            }

            /* --- notifikasi error --- */
            .d-error {
                padding: 16px 20px;
                border-radius: 16px;
                background: #fff1f2;
                border: 1px solid #fecdd3;
                color: #be123c;
            }

            .d-error b {
                font-size: 13px;
                font-weight: 700;
            }

            .d-error ul {
                margin: 8px 0 0 18px;
                list-style: disc;
                font-size: 12.5px;
                line-height: 1.8;
            }

            /* --- form --- */
            .d-form-grid {
                display: grid;
                gap: 18px;
                padding: 6px 20px 22px;
                grid-template-columns: minmax(0, 1fr);
            }

            @media (min-width: 768px) {
                .d-form-grid.c2 {
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                }

                .d-form-grid.c3 {
                    grid-template-columns: repeat(3, minmax(0, 1fr));
                }

                .d-form-grid .span2 {
                    grid-column: 1 / -1;
                }
            }

            .d-label {
                display: block;
                margin-bottom: 8px;
                font-size: 12.5px;
                font-weight: 600;
                color: var(--ink);
            }

            .d-label i {
                color: #e11d48;
                font-style: normal;
            }

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

            .d-field::placeholder {
                color: #94a3b8;
            }

            .d-field:focus {
                border-color: var(--p-500);
                box-shadow: 0 0 0 4px var(--p-100);
            }

            .d-err {
                margin-top: 6px;
                font-size: 12px;
                color: #e11d48;
            }

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

            /* --- tabel --- */
            .d-table {
                width: 100%;
                border-collapse: collapse;
            }

            .d-table th {
                padding: 12px 16px;
                font-size: 12px;
                font-weight: 600;
                color: var(--muted);
                text-align: left;
                white-space: nowrap;
                border-bottom: 1px solid var(--line);
            }

            .d-table th.center {
                text-align: center;
            }

            .d-table td {
                padding: 14px 16px;
                border-bottom: 1px solid var(--line);
                vertical-align: middle;
            }

            .d-table tbody tr.d-data {
                transition: background .2s;
            }

            .d-table tbody tr.d-data:hover {
                background: #f7f9ff;
            }

            .d-table tbody tr:last-child td {
                border-bottom: 0;
            }

            .d-table .txt {
                font-size: 12.5px;
                font-weight: 600;
                color: #475569;
                white-space: nowrap;
                text-align: center;
            }

            .d-table .q {
                font-size: 13px;
                line-height: 1.7;
                color: #334155;
            }

            .d-table td.d-group-cell {
                padding: 11px 16px;
                font-size: 12.5px;
                font-weight: 700;
                color: var(--ink);
            }

            .d-radio {
                width: 20px;
                height: 20px;
                margin: 0;
                cursor: pointer;
                accent-color: var(--p-600);
            }

            .d-radio:focus-visible {
                outline: 3px solid var(--p-100);
                outline-offset: 2px;
            }

            /* --- rubrik --- */
            .d-rubrik {
                padding: 20px;
                border-top: 1px solid var(--line);
                background: #f9fbff;
            }

            .d-rubrik-box {
                margin-top: 14px;
                overflow-x: auto;
                border: 1px solid var(--line);
                border-radius: 14px;
                background: #fff;
            }

            .d-rubrik-box .d-table td {
                vertical-align: top;
                padding: 12px 16px;
            }

            .d-rubrik-box .kat {
                font-size: 13px;
                font-weight: 700;
                color: #334155;
            }

            .d-rubrik-box .krit {
                font-size: 12.5px;
                line-height: 1.7;
                color: #475569;
            }

            .d-skor-chip {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 28px;
                height: 28px;
                border-radius: 9px;
                background: var(--p-50);
                color: var(--p-700);
                font-size: 12px;
                font-weight: 800;
            }
        </style>

        <div class="d-wrap">

            
            <section>
                <div class="d-title-row">
                    <div>
                        <h1 class="d-h1">Instrumen Monev <b>BCKS</b></h1>
                        <p class="d-crumb">
                            Dashboard &nbsp;›&nbsp;
                            <a href="<?php echo e(route('instrumen.index')); ?>">Instrumen</a>
                            &nbsp;›&nbsp; BCKS Instrumen
                        </p>
                        <p class="d-desc">Formulir Monitoring dan Evaluasi BCKS.</p>
                    </div>

                    
                    <a href="<?php echo e(route('instrumen.index')); ?>" class="d-pbtn b-blue back">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </section>

            
            <div class="d-card">
                <div class="d-info-card">

                    
                    <div class="d-info-main">
                        <div class="d-info-head">
                            <div class="d-info-ico">
                                <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>

                            <div style="min-width:0">
                                <h2 class="d-card-h">Instrumen Monitoring dan Evaluasi BCKS</h2>
                                <p class="d-card-s" style="line-height:1.7">
                                    Instrumen ini digunakan untuk mengevaluasi efektivitas pelatihan dan dampak penerapan
                                    kompetensi Bakal Calon Kepala Sekolah (BCKS).
                                </p>
                            </div>
                        </div>

                        <div class="d-note">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                style="flex-shrink:0;margin-top:3px;color:var(--p-600)">
                                <path d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                            </svg>

                            <div>
                                <b class="t">Petunjuk pengisian</b>
                                Bacalah setiap indikator dan rubrik penilaian, kemudian tentukan skor
                                <strong>1, 2, 3, atau 4</strong> sesuai dengan kondisi riil di lapangan.
                                Pastikan seluruh butir penilaian yang berlaku sesuai status responden telah diisi.
                            </div>
                        </div>
                    </div>

                    
                    <div class="d-prog">
                        <div class="d-prog-row">
                            <span class="d-prog-label">Progres pengisian</span>
                            <span id="bcks-progress-percent" class="d-prog-pct">0%</span>
                        </div>

                        <div class="d-bar">
                            <div id="bcks-progress-bar" style="width: 0%"></div>
                        </div>

                        <div class="d-prog-row" style="margin-top:10px">
                            <span id="bcks-progress-text" class="d-prog-val">0 / 40 butir</span>
                            <span class="d-prog-label" style="font-weight:500">Penilaian</span>
                        </div>

                        <div class="d-prog-sep">
                            <p class="d-prog-label">Skor sementara</p>
                            <p id="bcks-score-text" class="d-prog-val" style="margin-top:4px">Belum ada penilaian</p>
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

            
            <form action="<?php echo e(route('bcks.store')); ?>" method="POST" class="d-form">

                <?php echo csrf_field(); ?>

                
                <section class="d-card">
                    <div class="d-card-top">
                        <div>
                            <h2 class="d-card-h">A. Identitas Peserta BCKS</h2>
                            <p class="d-card-s">Lengkapi informasi mengenai peserta BCKS yang dievaluasi.</p>
                        </div>
                    </div>

                    <div class="d-form-grid c2">
                        <div>
                            <label for="nama_bcks" class="d-label">Nama Peserta BCKS <i>*</i></label>
                            <input id="nama_bcks" name="nama_bcks" type="text" value="<?php echo e(old('nama_bcks')); ?>" required
                                placeholder="Masukkan nama peserta BCKS" class="d-field">
                            <?php $__errorArgs = ['nama_bcks'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="d-err"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <label for="unit_kerja" class="d-label">Unit Kerja</label>
                            <input id="unit_kerja" name="unit_kerja" type="text" value="<?php echo e(old('unit_kerja')); ?>"
                                placeholder="Masukkan unit kerja BCKS" class="d-field">
                            <?php $__errorArgs = ['unit_kerja'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="d-err"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="span2">
                            <label for="angkatan_pelatihan" class="d-label">Angkatan Pelatihan BCKS</label>
                            <input id="angkatan_pelatihan" name="angkatan_pelatihan" type="text"
                                value="<?php echo e(old('angkatan_pelatihan')); ?>" placeholder="Contoh: Angkatan 1 Tahun 2025"
                                class="d-field">
                            <?php $__errorArgs = ['angkatan_pelatihan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="d-err"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </section>

                
                <section class="d-card">
                    <div class="d-card-top">
                        <div>
                            <h2 class="d-card-h">B. Identitas Responden</h2>
                            <p class="d-card-s">Informasi pihak yang memberikan jawaban.</p>
                        </div>
                    </div>

                    <div class="d-form-grid c2">
                        <div>
                            <label for="nama_responden" class="d-label">Nama Responden <i>*</i></label>
                            <input id="nama_responden" name="nama_responden" type="text" value="<?php echo e(old('nama_responden')); ?>"
                                required placeholder="Masukkan nama responden" class="d-field">
                            <?php $__errorArgs = ['nama_responden'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="d-err"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <label for="unit_kerja_responden" class="d-label">Unit Kerja Responden</label>
                            <input id="unit_kerja_responden" name="unit_kerja_responden" type="text"
                                value="<?php echo e(old('unit_kerja_responden')); ?>" placeholder="Masukkan unit kerja responden"
                                class="d-field">
                            <?php $__errorArgs = ['unit_kerja_responden'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="d-err"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="span2">
                            <label for="status_responden" class="d-label">Status Responden <i>*</i></label>

                            <select id="status_responden" name="status_responden" required class="d-field">
                                <option value="">Pilih status responden</option>

                                <option value="BCKS" <?php if(old('status_responden') === 'BCKS'): echo 'selected'; endif; ?>>
                                    BCKS
                                </option>

                                <option value="Atasan Langsung / Pengawas Sekolah" <?php if(old('status_responden') === 'Atasan Langsung / Pengawas Sekolah'): echo 'selected'; endif; ?>>
                                    Atasan Langsung / Kepala Sekolah
                                </option>

                                <option value="Perwakilan Guru / Tenaga Kependidikan"
                                    <?php if(old('status_responden') === 'Perwakilan Guru / Tenaga Kependidikan'): echo 'selected'; endif; ?>>
                                    Guru / Tenaga Kependidikan
                                </option>
                            </select>

                            <?php $__errorArgs = ['status_responden'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="d-err"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </section>

                
                <section class="d-card">
                    <div class="d-card-top">
                        <div>
                            <h2 class="d-card-h">C. Petugas Monev</h2>
                            <p class="d-card-s">Identitas petugas dan tanggal evaluasi.</p>
                        </div>
                    </div>

                    <div class="d-form-grid c3">
                        <div>
                            <label for="nama_petugas_monev" class="d-label">Nama Petugas Monev <i>*</i></label>
                            <input id="nama_petugas_monev" name="nama_petugas_monev" type="text"
                                value="<?php echo e(old('nama_petugas_monev')); ?>" required placeholder="Masukkan nama petugas"
                                class="d-field">
                            <?php $__errorArgs = ['nama_petugas_monev'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="d-err"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <label for="unit_kerja_petugas" class="d-label">Unit Kerja Petugas</label>
                            <input id="unit_kerja_petugas" name="unit_kerja_petugas" type="text"
                                value="<?php echo e(old('unit_kerja_petugas')); ?>" placeholder="Masukkan unit kerja petugas"
                                class="d-field">
                            <?php $__errorArgs = ['unit_kerja_petugas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="d-err"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <label for="tanggal_evaluasi" class="d-label">Tanggal Pelaksanaan Monev <i>*</i></label>
                            <input id="tanggal_evaluasi" name="tanggal_evaluasi" type="date"
                                value="<?php echo e(old('tanggal_evaluasi', date('Y-m-d'))); ?>" required class="d-field">
                            <?php $__errorArgs = ['tanggal_evaluasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="d-err"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </section>

                
                <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $levelKey => $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $palet = $levelPalette[$loop->iteration] ?? $levelPalette[1];
                        $jumlahIndikatorLevel = count($level['indikator'] ?? []);
                    ?>

                    <div data-bcks-level="<?php echo e($loop->iteration); ?>" class="d-card">

                        
                        <div class="d-card-top">
                            <div>
                                <h2 class="d-card-h"><?php echo e($level['label']); ?></h2>
                                <p class="d-card-s">Pilih satu skor untuk setiap indikator.</p>
                            </div>

                            <span class="d-badge" style="<?php echo e($palet['badge']); ?>"><?php echo e($jumlahIndikatorLevel); ?> indikator</span>
                        </div>

                        
                        <div style="overflow-x:auto">
                            <table class="d-table" style="min-width:900px">
                                <thead>
                                    <tr>
                                        <th class="center" style="width:80px">No</th>
                                        <th>Pertanyaan / Indikator</th>
                                        <?php for($nilai = 1; $nilai <= 4; $nilai++): ?>
                                            <th class="center" style="width:80px"><?php echo e($nilai); ?></th>
                                        <?php endfor; ?>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $level['indikator']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indikator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $kodeForm = str_replace('.', '_', $indikator['kode']);
                                        ?>

                                        <?php if(isset($level['kelompok'][$indikator['kode']])): ?>
                                            <tr>
                                                <td colspan="6" class="d-group-cell" style="background: <?php echo e($palet['row']); ?>">
                                                    <?php echo e($level['kelompok'][$indikator['kode']]); ?>

                                                </td>
                                            </tr>
                                        <?php endif; ?>

                                        <tr class="d-data">
                                            <td class="txt"><?php echo e($indikator['kode']); ?></td>

                                            <td class="q"><?php echo e($indikator['pertanyaan']); ?></td>

                                            <?php for($nilai = 1; $nilai <= 4; $nilai++): ?>
                                                <td style="text-align:center">
                                                    <input type="radio" name="skor[<?php echo e($kodeForm); ?>]" value="<?php echo e($nilai); ?>"
                                                        <?php if(old('skor.' . $kodeForm) == $nilai): echo 'checked'; endif; ?> class="d-radio"
                                                        aria-label="Skor <?php echo e($nilai); ?> untuk indikator <?php echo e($indikator['kode']); ?>">
                                                </td>
                                            <?php endfor; ?>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                        
                        <?php if(isset($rubrik[$loop->iteration])): ?>
                            <?php
                                $rubrikLevel = $rubrik[$loop->iteration];
                            ?>

                            <div class="d-rubrik">
                                <div style="display:flex;align-items:flex-start;gap:10px">
                                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        style="flex-shrink:0;margin-top:2px;color:var(--p-600)">
                                        <path d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                                    </svg>

                                    <div>
                                        <h3 class="d-card-h" style="font-size:14px">Rubrik <?php echo e($rubrikLevel['judul']); ?></h3>
                                        <p class="d-card-s" style="line-height:1.7">
                                            <?php echo e($rubrikLevel['deskripsi']); ?>

                                            Gunakan kriteria berikut sebagai acuan menentukan skor 1 sampai 4.
                                        </p>
                                    </div>
                                </div>

                                <div class="d-rubrik-box">
                                    <table class="d-table" style="min-width:640px">
                                        <thead>
                                            <tr>
                                                <th class="center" style="width:80px">Skor</th>
                                                <th style="width:200px">Kategori</th>
                                                <th>Kriteria Penilaian</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $__currentLoopData = $rubrikLevel['skor']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skor => $itemRubrik): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td style="text-align:center">
                                                        <span class="d-skor-chip"><?php echo e($skor); ?></span>
                                                    </td>

                                                    <td class="kat"><?php echo e($itemRubrik['kategori']); ?></td>

                                                    <td class="krit"><?php echo e($itemRubrik['kriteria']); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                <div class="d-foot">
                    <button type="submit" class="d-pbtn b-mint">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                            <path d="M17 21v-8H7v8M7 3v5h8" />
                        </svg>
                        Simpan Pengisian
                    </button>
                </div>

            </form>

        </div>

        
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const statusSelect = document.getElementById('status_responden');

                const progressBar = document.getElementById('bcks-progress-bar');
                const progressPercent = document.getElementById('bcks-progress-percent');
                const progressText = document.getElementById('bcks-progress-text');
                const scoreText = document.getElementById('bcks-score-text');

                const levelCards = document.querySelectorAll('[data-bcks-level]');

                function updateBcksForm() {
                    const status = statusSelect.value;
                    const isBcks = status === 'BCKS';

                    let totalIndikator = 0;
                    let jumlahDiisi = 0;
                    let totalSkor = 0;

                    levelCards.forEach(function (card) {
                        const level = Number(card.dataset.bcksLevel);

                        const aktif = isBcks || level >= 3;

                        card.hidden = !aktif;

                        const radios = card.querySelectorAll(
                            'input[type="radio"][name^="skor["]'
                        );

                        radios.forEach(function (radio) {
                            radio.disabled = !aktif;

                            if (!aktif) {
                                radio.checked = false;
                            }
                        });

                        if (aktif) {
                            const indikatorUnik = new Set();

                            radios.forEach(function (radio) {
                                indikatorUnik.add(radio.name);
                            });

                            totalIndikator += indikatorUnik.size;
                        }
                    });

                    const checked = document.querySelectorAll(
                        'input[type="radio"][name^="skor["]:checked:not(:disabled)'
                    );

                    checked.forEach(function (radio) {
                        jumlahDiisi++;
                        totalSkor += Number(radio.value);
                    });

                    const persen = totalIndikator > 0
                        ? Math.round((jumlahDiisi / totalIndikator) * 100)
                        : 0;

                    if (progressBar) {
                        progressBar.style.width = persen + '%';
                    }

                    if (progressPercent) {
                        progressPercent.textContent = persen + '%';
                    }

                    if (progressText) {
                        progressText.textContent =
                            jumlahDiisi + ' / ' + totalIndikator + ' butir';
                    }

                    if (scoreText) {
                        if (jumlahDiisi === 0) {
                            scoreText.textContent = 'Belum ada penilaian';
                        } else {
                            scoreText.textContent =
                                totalSkor + ' / ' + (totalIndikator * 4) + ' poin';
                        }
                    }
                }

                statusSelect.addEventListener('change', updateBcksForm);

                document.querySelectorAll(
                    'input[type="radio"][name^="skor["]'
                ).forEach(function (radio) {
                    radio.addEventListener('change', updateBcksForm);
                });

                updateBcksForm();
            });
        </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Herd\bgtk-monev\resources\views/bcks/create.blade.php ENDPATH**/ ?>