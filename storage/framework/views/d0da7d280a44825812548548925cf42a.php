


<?php $__env->startSection('title', 'Hasil Monitoring Diseminasi'); ?>
<?php $__env->startSection('page-title', 'Hasil Monitoring Diseminasi'); ?>

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
        // Kumpulkan skor dari kolom-kolom JSON di database
        // =========================================================
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

        $jawaban = [];
        foreach ($kolomSkor as $kolom) {
            if (is_array($kolom)) {
                foreach ($kolom as $skor) {
                    $jawaban[] = $skor;
                }
            }
        }

        // =========================================================
        // Kumpulkan bukti dari kolom-kolom bukti_* (BARU)
        // =========================================================
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
        // =========================================================

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
        /* ===================== TOKEN WARNA ===================== */
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
        @media (min-width: 768px) { .d-info.c2 { grid-template-columns: repeat(2, minmax(0, 1fr)); } .d-info.c3 { grid-template-columns: repeat(3, minmax(0, 1fr)); } }
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
        .d-bukti-txt {
            font-size: 12.5px;
            line-height: 1.6;
            color: #475569;
            white-space: pre-line;
            max-width: 360px;
        }
        .d-bukti-txt.empty {
            color: #94a3b8;
            font-style: italic;
        }

        .qa-block { margin-bottom: 16px; }
        .qa-question { font-weight: 700; color: #1e293b; margin-bottom: 6px; font-size: 13px; }
        .qa-answer { color: #475569; background: #f8fafc; padding: 12px; border-radius: 10px; border: 1px solid #e2e8f0; white-space: pre-line; font-size: 13px; }
    </style>

    <div class="d-wrap">

        
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Hasil <b>Monitoring Diseminasi</b></h1>
                    <p class="d-crumb">
                        Dashboard &nbsp;›&nbsp;
                        <a href="<?php echo e(route('instrumen.index')); ?>">Instrumen</a> &nbsp;›&nbsp;
                        <a href="<?php echo e(route('instrumen.stem.index')); ?>">STEM</a> &nbsp;›&nbsp;
                        <a href="<?php echo e(route('instrumen.stem.diseminasi')); ?>">Diseminasi</a> &nbsp;›&nbsp; Hasil Monitoring
                    </p>
                </div>

                <div class="no-print d-actions">
                    <a href="<?php echo e(route('instrumen.index')); ?>" class="d-pbtn b-blue back">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                        Kembali
                    </a>

                    <a href="<?php echo e(route('instrumen.stem.diseminasi.monitoring.cetak', $monitoring->id)); ?>" target="_blank" class="d-pbtn b-mint">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 9V3h12v6M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2" />
                            <path d="M6 14h12v7H6z" />
                        </svg>
                        Cetak Hasil
                    </a>

                    <a href="<?php echo e(route('instrumen.stem.diseminasi.monitoring.edit', $monitoring->id)); ?>" class="d-pbtn b-amber">
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
                <p class="d-tile-val"><?php echo e($jumlahDinilai); ?><small> / 35</small></p>
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
                    <h2 class="d-card-h">A. Identitas Supervisi Diseminasi</h2>
                    <p class="d-card-s">Informasi pelaksanaan supervisi.</p>
                </div>
            </div>
            <div class="d-info c2">
                <div>
                    <p class="d-info-label">Nama Satuan Pendidikan</p>
                    <p class="d-info-val"><?php echo e($monitoring->nama_satuan_pendidikan ?: '-'); ?></p>
                </div>
                <div>
                    <p class="d-info-label">Kabupaten / Kota</p>
                    <p class="d-info-val"><?php echo e($monitoring->kab_kota ?: '-'); ?></p>
                </div>
                <div>
                    <p class="d-info-label">Nama Supervisor</p>
                    <p class="d-info-val"><?php echo e($monitoring->nama_supervisor ?: '-'); ?></p>
                </div>
                <div>
                    <p class="d-info-label">Jabatan / Instansi</p>
                    <p class="d-info-val"><?php echo e($monitoring->jabatan_instansi ?: '-'); ?></p>
                </div>
                <div>
                    <p class="d-info-label">Nama Fasilitator Daerah</p>
                    <p class="d-info-val"><?php echo e($monitoring->nama_fasilitator_daerah ?: '-'); ?></p>
                </div>
                <div>
                    <p class="d-info-label">Tanggal Supervisi</p>
                    <p class="d-info-val"><?php echo e($monitoring->tanggal_supervisi ? \Carbon\Carbon::parse($monitoring->tanggal_supervisi)->format('d/m/Y') : '-'); ?></p>
                </div>
                <div style="grid-column: 1 / -1;">
                    <p class="d-info-label">Tahapan yang Disupervisi</p>
                    <div style="display:flex; flex-wrap:wrap; gap:6px; margin-top: 6px;">
                        <?php if(is_array($monitoring->tahapan_dsupervisi)): ?>
                            <?php $__currentLoopData = $monitoring->tahapan_dsupervisi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahapan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="d-badge" style="background:#e0e7ff;color:#3730a3"><?php echo e($tahapan); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <span class="d-info-val">-</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">B. Detail Penilaian Instrumen A (Fasilitator)</h2>
                    <p class="d-card-s">Rincian skor dan catatan/bukti untuk setiap aspek monitoring.</p>
                </div>
            </div>
            
            <div style="overflow-x:auto">
                <table class="d-table">
                    <thead>
                        <tr>
                            <th style="width:50px">No</th>
                            <th>Indikator</th>
                            <th class="center" style="width:80px">Skor</th>
                            <th style="width:280px">Catatan / Bukti</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?>
                        <?php $__currentLoopData = $monitoringQs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelompok => $pertanyaanList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="4" class="d-group-cell" style="background: var(--p-50)">
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
                                    <td>
                                        <?php if(trim($bukti) !== ''): ?>
                                            <div class="d-bukti-txt"><?php echo e($bukti); ?></div>
                                        <?php else: ?>
                                            <div class="d-bukti-txt empty">(Belum diisi)</div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php $nomor++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </section>

        
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">C. Pertanyaan Terbuka (Wawancara)</h2>
                    <p class="d-card-s">Wawancara dengan Guru Sasaran / Peserta Diseminasi.</p>
                </div>
            </div>
            <div class="d-info" style="padding-bottom: 22px;">
                <?php $__currentLoopData = $wawancaraQs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $teks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="qa-block">
                        <div class="qa-question"><?php echo e($no); ?>. <?php echo e($teks); ?></div>
                        <div class="qa-answer"><?php echo e($monitoring->{"wawancara_guru_$no"} ?: '-'); ?></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Herd\bgtk-monev\resources\views/instrumen/stem/diseminasi/monitoring/show.blade.php ENDPATH**/ ?>