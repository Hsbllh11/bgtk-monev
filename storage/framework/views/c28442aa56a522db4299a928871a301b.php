

<?php $__env->startSection('title', 'Instrumen Dampak (Wawancara)'); ?>
<?php $__env->startSection('page-title', 'Instrumen Dampak (Wawancara)'); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $skorFields = [
            'konteks_masalah' => 'Modul Ajar memuat deskripsi masalah kontekstual yang spesifik dan relevan dengan lingkungan sekitar, bukan masalah teoretis abstrak.',
            'skenario_lkpd' => 'LKPD memuat instruksi yang mengarahkan murid melakukan siklus Engineering Design Process (Analisis, Perancangan, Pengujian, Refleksi).',
            'integrasi_disiplin' => 'Terdapat alokasi waktu dan aktivitas spesifik yang mengawinkan Sains, Matematika atau konsep lain dengan proses Enjinering dan Teknologi.',
            'instrumen_asesmen' => 'Guru memiliki rubrik penilaian proses (keterampilan merancang, kerja sama) dan produk akhir, tidak hanya tes tertulis kognitif.',
            'prinsip_5m' => 'Bahan dan alat eksplorasi yang digunakan murid memanfaatkan material lokal/bekas/sehari-hari yang terjangkau.',
            'aksi_eksperimen' => 'Murid secara fisik memanipulasi bahan, membuat purwarupa, atau menguji coba solusi (hands-on).',
            'dinamika_kolaborasi' => 'Kerja kelompok terdistribusi dengan peran yang jelas. Tidak didominasi oleh 1-2 murid saja.',
            'resiliensi' => 'Saat purwarupa atau eksperimen gagal, guru memfasilitasi dialog investigasi (troubleshooting) alih-alih memberikan jawaban langsung.',
            'fungsionalitas' => 'Terdapat produk fisik atau maket solusi yang benar-benar bisa diuji coba cara kerjanya secara mekanis/logis.',
        ];

        $skorFields1 = ['konteks_masalah', 'skenario_lkpd', 'integrasi_disiplin', 'instrumen_asesmen'];
        $skorFields2 = ['prinsip_5m', 'aksi_eksperimen', 'dinamika_kolaborasi', 'resiliensi', 'fungsionalitas'];
    ?>

    <style>
        /* ===================== TOKEN WARNA (Sama dengan PKGSD MBI & BCKS) ===================== */
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
        .d-crumb a { color: inherit; transition: color .2s; }
        .d-crumb a:hover { color: var(--p-600); }

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

        .d-foot { display: flex; justify-content: flex-end; gap: 12px; flex-wrap: wrap; }

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

        /* --- radio button custom --- */
        .d-radio { width: 20px; height: 20px; margin: 0; cursor: pointer; accent-color: var(--p-600); }
        .d-radio:focus-visible { outline: 3px solid var(--p-100); outline-offset: 2px; }

        .d-opts { display: grid; gap: 10px; margin-top: 14px; grid-template-columns: minmax(0, 1fr); }
        @media (min-width: 768px) {
            .d-opts { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }

        .d-opt {
            display: flex;
            align-items: flex-start;
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
        .d-opt input { margin-top: 3px; }
    </style>

    <div class="d-wrap">
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Instrumen <b>Dampak (Wawancara)</b></h1>
                    <p class="d-crumb">
                        <a href="<?php echo e(route('instrumen.index')); ?>">Instrumen</a> &nbsp;›&nbsp;
                        <a href="<?php echo e(route('instrumen.stem.index')); ?>">STEM</a> &nbsp;›&nbsp;
                        <a href="<?php echo e(route('instrumen.stem.fasda')); ?>">Fasda</a> &nbsp;›&nbsp;
                        Dampak (Wawancara)
                    </p>
                </div>
                <a href="<?php echo e(route('instrumen.stem.fasda')); ?>" class="d-pbtn b-blue back">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                    Kembali
                </a>
            </div>
        </section>

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

        <form action="<?php echo e(route('instrumen.stem.fasda.dampak.store')); ?>" method="POST" class="d-form">
            <?php echo csrf_field(); ?>

            
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">A. Identitas Observasi</h2>
                    </div>
                </div>
                <div class="d-form-grid c2">
                    <div>
                        <label class="d-label">Nama Sekolah <i>*</i></label>
                        <input type="text" name="nama_sekolah" value="<?php echo e(old('nama_sekolah')); ?>" required class="d-field">
                    </div>
                    <div>
                        <label class="d-label">Nama Pendidik/Guru <i>*</i></label>
                        <input type="text" name="nama_pendidik" value="<?php echo e(old('nama_pendidik')); ?>" required class="d-field">
                    </div>
                    <div>
                        <label class="d-label">Mata Pelajaran</label>
                        <input type="text" name="mata_pelajaran" value="<?php echo e(old('mata_pelajaran')); ?>" class="d-field">
                    </div>
                    <div>
                        <label class="d-label">Tanggal Observasi <i>*</i></label>
                        <input type="date" name="tanggal_observasi" value="<?php echo e(old('tanggal_observasi', date('Y-m-d'))); ?>" required class="d-field">
                    </div>
                    <div class="span2">
                        <label class="d-label">Nama Petugas Monev <i>*</i></label>
                        <input type="text" name="nama_petugas_monev" value="<?php echo e(old('nama_petugas_monev')); ?>" required class="d-field">
                    </div>
                </div>
            </section>

            
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">B. Telaah Dokumen Perencanaan & Asesmen</h2>
                        <p class="d-card-s">Fokus: Memvalidasi silang dokumen modul ajar, LKPD, dan asesmen.</p>
                    </div>
                </div>
                <div class="d-form-grid">
                    <?php $__currentLoopData = $skorFields1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div style="border-top: 1px solid var(--line); padding-top: 16px;">
                            <p style="font-size: 13px; font-weight: 600; margin-bottom: 12px; color: var(--ink);"><?php echo e($skorFields[$field]); ?></p>
                            
                            <div class="d-opts">
                                <?php for($i = 1; $i <= 4; $i++): ?>
                                    <label class="d-opt">
                                        <input type="radio" name="skor_<?php echo e($field); ?>" value="<?php echo e($i); ?>" <?php if(old('skor_'.$field) == $i): echo 'checked'; endif; ?> required class="d-radio">
                                        <span style="font-size: 12.5px; font-weight: 600;">Skor <?php echo e($i); ?></span>
                                    </label>
                                <?php endfor; ?>
                            </div>

                            <div style="margin-top: 14px;">
                                <label class="d-label">Catatan Temuan & Bukti Artefak (Wajib jika Skor 3/4)</label>
                                <textarea name="bukti_<?php echo e($field); ?>" rows="2" class="d-field"><?php echo e(old('bukti_'.$field)); ?></textarea>
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
                </div>
                <div class="d-form-grid">
                    <?php $__currentLoopData = $skorFields2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div style="border-top: 1px solid var(--line); padding-top: 16px;">
                            <p style="font-size: 13px; font-weight: 600; margin-bottom: 12px; color: var(--ink);"><?php echo e($skorFields[$field]); ?></p>
                            
                            <div class="d-opts">
                                <?php for($i = 1; $i <= 4; $i++): ?>
                                    <label class="d-opt">
                                        <input type="radio" name="skor_<?php echo e($field); ?>" value="<?php echo e($i); ?>" <?php if(old('skor_'.$field) == $i): echo 'checked'; endif; ?> required class="d-radio">
                                        <span style="font-size: 12.5px; font-weight: 600;">Skor <?php echo e($i); ?></span>
                                    </label>
                                <?php endfor; ?>
                            </div>

                            <div style="margin-top: 14px;">
                                <label class="d-label">Catatan Temuan & Bukti Artefak (Wajib jika Skor 3/4)</label>
                                <textarea name="bukti_<?php echo e($field); ?>" rows="2" class="d-field"><?php echo e(old('bukti_'.$field)); ?></textarea>
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
                    <h3 style="font-size: 14px; font-weight: 700; color: var(--p-700);">Wawancara Murid</h3>
                    <div>
                        <label class="d-label">1. Bisa ceritakan karya apa yang kelompok kalian buat? Kenapa memilih bentuk atau bahan ini?</label>
                        <textarea name="wawancara_murid_1" rows="2" class="d-field"><?php echo e(old('wawancara_murid_1')); ?></textarea>
                    </div>
                    <div>
                        <label class="d-label">2. Waktu bikin alat ini, sempat ada yang gagal atau nggak jalan, kan? Waktu itu apa yang kalian lakukan buat memperbaikinya?</label>
                        <textarea name="wawancara_murid_2" rows="2" class="d-field"><?php echo e(old('wawancara_murid_2')); ?></textarea>
                    </div>
                    <div>
                        <label class="d-label">3. Di kelompok ini, tugas kamu ngapain aja? Teman yang lain ngerjain apa?</label>
                        <textarea name="wawancara_murid_3" rows="2" class="d-field"><?php echo e(old('wawancara_murid_3')); ?></textarea>
                    </div>
                    <div>
                        <label class="d-label">4. Konsep mata pelajaran apa yang kalian pakai waktu bikin karya ini?</label>
                        <textarea name="wawancara_murid_4" rows="2" class="d-field"><?php echo e(old('wawancara_murid_4')); ?></textarea>
                    </div>

                    <h3 style="font-size: 14px; font-weight: 700; color: var(--p-700); margin-top: 16px;">Wawancara Pendidik</h3>
                    <div>
                        <label class="d-label">1. Bagian mana dari siklus Engineering Design Process (EDP) yang menurut Bapak/Ibu paling menantang?</label>
                        <textarea name="wawancara_pendidik_1" rows="2" class="d-field"><?php echo e(old('wawancara_pendidik_1')); ?></textarea>
                    </div>
                    <div>
                        <label class="d-label">2. Bagaimana Bapak/Ibu memastikan bahan yang digunakan murid benar-benar memenuhi prinsip 'Murah dan Mudah' (5M)?</label>
                        <textarea name="wawancara_pendidik_2" rows="2" class="d-field"><?php echo e(old('wawancara_pendidik_2')); ?></textarea>
                    </div>
                    <div>
                        <label class="d-label">3. Bisa ceritakan satu momen saat murid mengalami kebuntuan? Bagaimana cara Bapak/Ibu memfasilitasi mereka tanpa memberikan jawaban langsung?</label>
                        <textarea name="wawancara_pendidik_3" rows="2" class="d-field"><?php echo e(old('wawancara_pendidik_3')); ?></textarea>
                    </div>
                    <div>
                        <label class="d-label">4. Terkait asesmen autentik, boleh diceritakan bagaimana cara Bapak/Ibu menilai proses kerja sama murid saat mereka sedang sibuk merakit atau berdiskusi?</label>
                        <textarea name="wawancara_pendidik_4" rows="2" class="d-field"><?php echo e(old('wawancara_pendidik_4')); ?></textarea>
                    </div>
                </div>
            </section>

            <div class="d-foot">
                <button type="submit" class="d-pbtn b-mint">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" /><path d="M17 21v-8H7v8M7 3v5h8" /></svg>
                    Simpan Instrumen
                </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Herd\bgtk-monev\resources\views/instrumen/stem/fasda/dampak/create.blade.php ENDPATH**/ ?>