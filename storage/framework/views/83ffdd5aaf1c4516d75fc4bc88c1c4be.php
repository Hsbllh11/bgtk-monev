


<?php $__env->startSection('title', 'Edit Monitoring Diseminasi'); ?>
<?php $__env->startSection('page-title', 'Edit Monitoring Diseminasi'); ?>

<?php $__env->startSection('content'); ?>

    <?php
        $monitoringQs = [
            'Aspek 1: Persiapan Pelaksanaan' => [
                'Fasilitator Daerah telah menyiapkan skenario/rundown kegiatan untuk setiap tahapan diseminasi.',
                'Jadwal pelaksanaan disosialisasikan kepada seluruh Pendidik pada Satuan Pendidikan Sasaran.',
                'Sarana dan prasarana pendukung (ruang, alat, bahan) tersedia sesuai kebutuhan setiap tahapan.'
            ],
            'Aspek 1.2: Elaborasi Konsep STEM' => [
                'Pertemuan klasikal elaborasi konsep dilaksanakan sebanyak 1 kali sesuai alokasi 5 JP.',
                'Materi esensial dari setiap Formula (Titik Nol STEM s.d. Wahana STEM) disampaikan secara lengkap.',
                'Pre-Test dan Post-Test dilaksanakan untuk mengukur peningkatan pemahaman peserta.',
                'Diskusi elaborasi konsep berlangsung untuk membangun kesepahaman dan meluruskan miskonsepsi.',
                'Bukti pelaksanaan (presensi, dokumentasi, hasil pre-post test) tersedia dan diunggah ke LMS.'
            ],
            'Aspek 1.5: Refleksi dan Evaluasi' => [
                'Sesi refleksi dan evaluasi difasilitasi oleh Fasilitator Daerah sesuai alokasi 1 JP.',
                'Catatan Refleksi dan Evaluasi Kegiatan disusun memuat capaian, kendala, dan rekomendasi.',
                'Rencana Tindak Lanjut (RTL) keberlanjutan program dirumuskan bersama tim Pendidik.'
            ],
            'Aspek 1.6: Ruang Karya STEM' => [
                'Pendampingan persiapan pameran dilakukan paling sedikit 1 minggu sebelum pelaksanaan.',
                'Setiap peserta diseminasi menyiapkan portofolio (bahan tayang, foto/video, produk implementasi).',
                'Pameran Ruang Karya STEM terlaksana sesuai alokasi 2 JP.',
                'Kegiatan pameran memfasilitasi pertukaran praktik baik antar-Pendidik/Satuan Pendidikan.'
            ],
            'Aspek 2.1: Keterlaksanaan Keseluruhan Rangkaian' => [
                'Seluruh rangkaian kegiatan (5 tahap) dilaksanakan sesuai urutan dan alokasi waktu yang ditetapkan.',
                'Keterlibatan Pendidik pada Satuan Pendidikan Sasaran mencakup seluruh tahapan kegiatan.',
                'Tidak terdapat tahapan yang dilewati tanpa alasan yang dapat dipertanggungjawabkan.'
            ],
            'Aspek 2.2: Kelengkapan Bukti Pelaksanaan' => [
                'Seluruh dokumen bukti pelaksanaan setiap tahapan telah diunggah ke LMS Pelatihan Fasilitator Daerah.',
                'Dokumentasi (foto/video) tersedia untuk setiap tahapan kegiatan.',
                'Perangkat pembelajaran, Lembar Kerja, dan Lembar Asesmen yang dihasilkan terdokumentasi dengan baik.'
            ],
            'Aspek 1.3: Desain Aktivitas Pembelajaran STEM' => [
                'Desain aktivitas pembelajaran STEM dilaksanakan 1 kali sesuai alokasi 4 JP di Satuan Pendidikan Sasaran.',
                'Tim Pendidik berhasil menyusun Modul Ajar/Perencanaan Pembelajaran berbasis STEM.',
                'Tim Pendidik berhasil menyusun Lembar Kerja (LK) yang siap digunakan.',
                'Tim Pendidik berhasil menyusun Lembar Asesmen beserta rubrik penilaian.'
            ],
            'Aspek 1.4: Implementasi STEM di Kelompok Kerja' => [
                'Implementasi STEM dilaksanakan melalui team teaching (tim Pendidik lintas mata pelajaran).',
                'Tahap Analisis Masalah difasilitasi dengan melibatkan murid secara aktif.',
                'Tahap Perancangan Solusi menghasilkan rancangan yang mengintegrasikan Sains, Teknologi, Enjinering, dan Matematika.',
                'Tahap Implementasi dan Pengujian Solusi menghasilkan produk/prototipe yang diuji coba.',
                'Tahap Refleksi, Evaluasi, dan Tindak Lanjut dilaksanakan bersama murid pada akhir siklus.'
            ],
            'Aspek 2.3: Tindak Lanjut dan Keberlanjutan' => [
                'Rencana Tindak Lanjut (RTL) hasil sesi refleksi dan evaluasi mulai diimplementasikan.',
                'Satuan Pendidikan Sasaran memiliki rencana penerapan STEM lanjutan (intrakurikuler/kokurikuler/ekstrakurikuler).',
                'Terdapat dukungan Kepala Satuan Pendidikan terhadap keberlanjutan program STEM.',
                'Kendala keberlanjutan program teridentifikasi beserta upaya penyelesaiannya.'
            ],
            'Aspek 2.4: Dampak Awal Program' => [
                'Terdapat peningkatan pemahaman/kompetensi Pendidik terhadap pembelajaran STEM (dibandingkan hasil pre-post test).',
                'Murid menunjukkan keterlibatan aktif dan menghasilkan produk/solusi dalam pembelajaran STEM.'
            ]
        ];

        $totalIndikator = 0;
        foreach ($monitoringQs as $qs) { $totalIndikator += count($qs); }

        $wawancaraQs = [
            1 => 'Bagaimana pemahaman Bapak/Ibu mengenai pendekatan STEM (Sains, Teknologi, Enjinering, dan Matematika) setelah mengikuti kegiatan diseminasi ini?',
            2 => 'Dalam Modul Ajar yang Bapak/Ibu susun, masalah nyata atau kontekstual apa yang diangkat? Mengapa masalah tersebut dipilih sebagai fokus pembelajaran?',
            3 => 'Bisa jelaskan bagaimana Bapak/Ibu mengintegrasikan berbagai disiplin ilmu (Sains, Teknologi, Enjinering, Matematika) dalam satu rancangan pembelajaran?',
            4 => 'Terkait penerapan Engineering Design Process (EDP), bagaimana Bapak/Ibu memfasilitasi tahapan analisis masalah, perancangan solusi, implementasi/pengujian, dan refleksi kepada murid?',
            5 => 'Bagaimana Bapak/Ibu memastikan bahwa rancangan pembelajaran STEM yang dibuat memenuhi prinsip 5M (Murah, Mudah, Menggembirakan, Mindful, dan Meaningful)? Bisa berikan contoh konkret penggunaannya di kelas?',
            6 => 'Bentuk asesmen seperti apa yang Bapak/Ibu gunakan untuk menilai proses dan produk (solusi/purwarupa) yang dihasilkan oleh murid dalam pembelajaran STEM?',
            7 => 'Berdasarkan pengamatan Bapak/Ibu selama pelaksanaan pembelajaran STEM, bagaimana dampaknya terhadap keterlibatan (partisipasi aktif) dan motivasi belajar murid?',
            8 => 'Apakah Bapak/Ibu melihat adanya peningkatan pemahaman konsep pada murid setelah mereka memecahkan masalah dan membuat produk/solusi tersebut? Bisa berikan contoh spesifiknya?'
        ];

        // =========================================================
        // Ambil data skor lama
        // =========================================================
        if (old('monitoring_skor')) {
            $jawabanSkor = old('monitoring_skor');
        } else {
            $kolomSkor = [
                $monitoring->aspek_persiapan_pelaksanaan,
                $monitoring->aspek_elaborasi_konsep,
                $monitoring->aspek_refleksi_evaluasi,
                $monitoring->aspek_ruang_karya,
                $monitoring->aspek_keterlaksanaan,
                $monitoring->aspek_kelengkapan_bukti,
                $monitoring->aspek_desain_aktivitas,
                $monitoring->aspek_implementasi_stem,
                $monitoring->aspek_tindak_lanjut,
                $monitoring->aspek_dampak_awal,
            ];
            $jawabanSkor = [];
            foreach ($kolomSkor as $kolom) {
                if (is_array($kolom)) {
                    foreach ($kolom as $skor) {
                        $jawabanSkor[] = $skor;
                    }
                }
            }
        }

        // =========================================================
        // Ambil data bukti lama (BARU)
        // =========================================================
        if (old('monitoring_bukti')) {
            $jawabanBukti = old('monitoring_bukti');
        } else {
            $kolomBukti = [
                $monitoring->bukti_persiapan_pelaksanaan,
                $monitoring->bukti_elaborasi_konsep,
                $monitoring->bukti_refleksi_evaluasi,
                $monitoring->bukti_ruang_karya,
                $monitoring->bukti_keterlaksanaan,
                $monitoring->bukti_kelengkapan_bukti,
                $monitoring->bukti_desain_aktivitas,
                $monitoring->bukti_implementasi_stem,
                $monitoring->bukti_tindak_lanjut,
                $monitoring->bukti_dampak_awal,
            ];
            $jawabanBukti = [];
            foreach ($kolomBukti as $kolom) {
                // Kolom bukti disimpan sebagai JSON string
                $arr = is_array($kolom) ? $kolom : (json_decode($kolom ?? '[]', true) ?: []);
                foreach ($arr as $b) {
                    $jawabanBukti[] = $b;
                }
            }
        }

        $oldTahapan = old('tahapan_dsupervisi', $monitoring->tahapan_dsupervisi ?? []);
    ?>

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
        .b-slate { --b-bg: linear-gradient(160deg, #f6f8fc 0%, #e6ebf5 100%); --b-line: #d9e0ee; --b-ink: #475569; --b-glow: rgba(71, 85, 105, .6); }

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

        .d-note {
            display: flex; align-items: flex-start; gap: 10px; margin-top: 18px;
            padding: 12px 14px; border: 1px dashed var(--p-200); border-radius: 14px;
            background: #f5f8ff; font-size: 12.5px; line-height: 1.7; color: #475569;
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

        .d-err { margin-top: 6px; font-size: 12px; color: #e11d48; }

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

        .d-opt {
            display: flex; align-items: center; gap: 12px;
            padding: 12px 14px; border: 1px solid var(--line);
            border-radius: 14px; background: #fff; cursor: pointer;
            transition: border-color .2s, background .2s;
        }
        .d-opt:hover { border-color: var(--p-200); background: #f7f9ff; }
        .d-opt:has(input:checked) { border-color: var(--p-500); background: var(--p-50); box-shadow: 0 0 0 3px var(--p-100); }
        
        .d-opt input { margin: 0; width: 18px; height: 18px; accent-color: var(--p-600); cursor: pointer; }
        .d-opt-skor {
            display: inline-flex; align-items: center; justify-content: center;
            width: 24px; height: 24px; flex-shrink: 0; border-radius: 8px;
            background: var(--p-50); color: var(--p-700); font-size: 11.5px; font-weight: 800;
        }
        .d-opt:has(input:checked) .d-opt-skor { background: var(--p-600); color: #fff; }
        .d-opt-txt { font-size: 12.5px; line-height: 1.5; color: #475569; margin: 0; }

        /* ===================== CSS BARU: CATATAN/BUKTI ===================== */
        .d-bukti-wrap {
            margin-top: 16px;
            padding-top: 14px;
            border-top: 1px dashed var(--line);
        }
        .d-bukti-label {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 8px;
            font-size: 12px;
            font-weight: 700;
            color: var(--p-700);
        }
        .d-bukti-label svg {
            flex-shrink: 0;
        }
        .d-bukti-optional {
            margin-left: auto;
            font-size: 11px;
            font-weight: 500;
            color: var(--muted);
        }
    </style>

    <div class="d-wrap">

        
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Edit Instrumen <b>Monitoring Diseminasi</b></h1>
                    <p class="d-crumb">
                        Dashboard &nbsp;›&nbsp;
                        <a href="<?php echo e(route('instrumen.index')); ?>">Instrumen</a> &nbsp;›&nbsp;
                        <a href="<?php echo e(route('instrumen.stem.index')); ?>">STEM</a> &nbsp;›&nbsp;
                        <a href="<?php echo e(route('instrumen.stem.diseminasi')); ?>">Diseminasi</a> &nbsp;›&nbsp; Edit Monitoring
                    </p>
                </div>
                <a href="<?php echo e(route('instrumen.stem.diseminasi.monitoring.show', $monitoring->id)); ?>" class="d-pbtn b-blue back">
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
                                Instrumen diisi oleh supervisor berdasarkan hasil observasi langsung, wawancara, dan studi dokumen.
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
                                <li><b>1 = Belum Terlaksana</b></li>
                                <li><b>2 = Terlaksana Sebagian</b></li>
                                <li><b>3 = Terlaksana Baik</b></li>
                                <li><b>4 = Terlaksana Sangat Baik</b></li>
                            </ul>
                            <p style="margin-top:8px;font-size:11.5px;color:#64748b;">
                                Kolom <b>Catatan/Bukti</b> diisi dengan bukti konkret yang mendukung skor (mis. nomor dokumen, hasil wawancara singkat, atau temuan lapangan).
                            </p>
                        </div>
                    </div>
                </div>

                <div class="d-prog">
                    <div class="d-prog-row">
                        <span class="d-prog-label">Progres penilaian skor</span>
                        <span id="monitoring-progress-percent" class="d-prog-pct">0%</span>
                    </div>
                    <div class="d-bar">
                        <div id="monitoring-progress-bar" style="width: 0%"></div>
                    </div>
                    <div class="d-prog-row" style="margin-top:10px">
                        <span id="monitoring-progress-text" class="d-prog-val">0 / <?php echo e($totalIndikator); ?> butir</span>
                        <span class="d-prog-label" style="font-weight:500">Indikator</span>
                    </div>
                    <div class="d-prog-sep">
                        <p class="d-prog-label">Skor sementara</p>
                        <p id="monitoring-score-text" class="d-prog-val" style="margin-top:4px">Belum ada penilaian</p>
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

        
        <form action="<?php echo e(route('instrumen.stem.diseminasi.monitoring.update', $monitoring->id)); ?>" method="POST" class="d-form" id="monitoring-form">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">A. Identitas Supervisi Diseminasi</h2>
                        <p class="d-card-s">Informasi pelaksanaan supervisi.</p>
                    </div>
                </div>
                <div class="d-form-grid c2">
                    <div>
                        <label class="d-label">Nama Satuan Pendidikan <i>*</i></label>
                        <input type="text" name="nama_satuan_pendidikan" value="<?php echo e(old('nama_satuan_pendidikan', $monitoring->nama_satuan_pendidikan)); ?>" required class="d-field">
                    </div>
                    <div>
                        <label class="d-label">Kabupaten/Kota <i>*</i></label>
                        <input type="text" name="kab_kota" value="<?php echo e(old('kab_kota', $monitoring->kab_kota)); ?>" required class="d-field">
                    </div>
                    <div>
                        <label class="d-label">Nama Supervisor <i>*</i></label>
                        <input type="text" name="nama_supervisor" value="<?php echo e(old('nama_supervisor', $monitoring->nama_supervisor)); ?>" required class="d-field">
                    </div>
                    <div>
                        <label class="d-label">Jabatan/Instansi <i>*</i></label>
                        <input type="text" name="jabatan_instansi" value="<?php echo e(old('jabatan_instansi', $monitoring->jabatan_instansi)); ?>" required class="d-field">
                    </div>
                    <div>
                        <label class="d-label">Nama Fasilitator Daerah</label>
                        <input type="text" name="nama_fasilitator_daerah" value="<?php echo e(old('nama_fasilitator_daerah', $monitoring->nama_fasilitator_daerah)); ?>" class="d-field">
                    </div>
                    <div>
                        <label class="d-label">Tanggal Supervisi <i>*</i></label>
                        <input type="date" name="tanggal_supervisi" value="<?php echo e(old('tanggal_supervisi', $monitoring->tanggal_supervisi ? \Carbon\Carbon::parse($monitoring->tanggal_supervisi)->format('Y-m-d') : date('Y-m-d'))); ?>" required class="d-field">
                    </div>
                    <div class="span2">
                        <label class="d-label">Tahapan yang Disupervisi</label>
                        <div style="display:flex; gap: 16px; flex-wrap: wrap; font-size: 13px; margin-top: 8px;">
                            <?php
                                $tahapanList = [
                                    'Elaborasi Konsep STEM',
                                    'Desain Aktivitas Pembelajaran STEM',
                                    'Implementasi STEM',
                                    'Refleksi & Evaluasi',
                                    'Ruang Karya STEM'
                                ];
                            ?>
                            <?php $__currentLoopData = $tahapanList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label style="display:flex; align-items:center; gap:6px; cursor:pointer;">
                                    <input type="checkbox" name="tahapan_dsupervisi[]" value="<?php echo e($t); ?>" <?php if(in_array($t, $oldTahapan)): echo 'checked'; endif; ?>>
                                    <?php echo e($t); ?>

                                </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </section>

            
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">B. Instrumen A (Fasilitator)</h2>
                        <p class="d-card-s">Skala: 1 = Belum Terlaksana, 2 = Terlaksana Sebagian, 3 = Terlaksana Baik, 4 = Terlaksana Sangat Baik.</p>
                    </div>
                </div>

                <div>
                    <?php $idx = 0; ?>
                    <?php $__currentLoopData = $monitoringQs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section => $questions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-group-bar"><?php echo e($section); ?></div>
                        <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-item" data-mon-item>
                                <div>
                                    <p class="d-item-no">Indikator <?php echo e($idx + 1); ?></p>
                                    <p class="d-item-q"><?php echo e($q); ?></p>
                                </div>
                                <div class="d-opts">
                                    <?php for($i=1; $i<=4; $i++): ?>
                                        <label class="d-opt">
                                            <input type="radio" name="monitoring_skor[<?php echo e($idx); ?>]" value="<?php echo e($i); ?>" <?php if(old("monitoring_skor.$idx", $jawabanSkor[$idx] ?? null) == $i): echo 'checked'; endif; ?> required class="d-radio" data-mon-radio>
                                            <span class="d-opt-skor"><?php echo e($i); ?></span>
                                            <span class="d-opt-txt">
                                                <?php if($i == 1): ?> Belum Terlaksana
                                                <?php elseif($i == 2): ?> Terlaksana Sebagian
                                                <?php elseif($i == 3): ?> Terlaksana Baik
                                                <?php else: ?> Terlaksana Sangat Baik <?php endif; ?>
                                            </span>
                                        </label>
                                    <?php endfor; ?>
                                </div>

                                
                                <div class="d-bukti-wrap">
                                    <label class="d-bukti-label" for="monitoring_bukti_<?php echo e($idx); ?>">
                                        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Catatan/Bukti
                                        <span class="d-bukti-optional">(opsional)</span>
                                    </label>
                                    <textarea
                                        id="monitoring_bukti_<?php echo e($idx); ?>"
                                        name="monitoring_bukti[<?php echo e($idx); ?>]"
                                        rows="2"
                                        class="d-field"
                                        placeholder="Tuliskan bukti konkret pendukung skor (mis. nama dokumen, hasil wawancara, temuan lapangan)..."
                                    ><?php echo e(old("monitoring_bukti.$idx", $jawabanBukti[$idx] ?? '')); ?></textarea>
                                </div>
                            </div>
                            <?php $idx++; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </section>

            
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">C. Pertanyaan Terbuka (Wawancara)</h2>
                        <p class="d-card-s">Wawancara dengan Guru Sasaran / Peserta Diseminasi.</p>
                    </div>
                </div>
                <div class="d-form-grid">
                    <?php $__currentLoopData = $wawancaraQs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $teks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <label class="d-label"><?php echo e($no); ?>. <?php echo e($teks); ?></label>
                            <textarea name="wawancara_guru_<?php echo e($no); ?>" rows="3" class="d-field" placeholder="Tuliskan jawaban..."><?php echo e(old("wawancara_guru_$no", $monitoring->{"wawancara_guru_$no"})); ?></textarea>
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
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('monitoring-form');
            const totalIndikator = <?php echo e($totalIndikator); ?>;

            function updateProgress() {
                const checkedRadios = form.querySelectorAll('input[data-mon-radio]:checked');
                const checkedCount = checkedRadios.length;

                let totalScore = 0;
                checkedRadios.forEach(el => {
                    totalScore += Number(el.value);
                });

                const percent = totalIndikator ? Math.round(checkedCount / totalIndikator * 100) : 0;

                document.getElementById('monitoring-progress-percent').textContent = percent + '%';
                document.getElementById('monitoring-progress-bar').style.width = percent + '%';
                document.getElementById('monitoring-progress-text').textContent = checkedCount + ' / ' + totalIndikator + ' butir';
                
                document.getElementById('monitoring-score-text').textContent = checkedCount
                    ? totalScore + ' poin dari ' + checkedCount + ' indikator'
                    : 'Belum ada penilaian';
            }

            form.querySelectorAll('input[data-mon-radio]').forEach(el => {
                el.addEventListener('change', updateProgress);
            });

            updateProgress();
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Herd\bgtk-monev\resources\views/instrumen/stem/diseminasi/monitoring/edit.blade.php ENDPATH**/ ?>