
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Monev STEM - Monitoring Diseminasi</title>

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
    ?>

    <style>
        * { box-sizing: border-box; }
        body { margin: 0; padding: 0; background: #eef2f7; color: #1e293b; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.5; }
        
        .no-print { display: block; }
        .print-toolbar { width: 210mm; margin: 20px auto; display: flex; align-items: center; justify-content: space-between; gap: 12px; }
        .toolbar-left, .toolbar-right { display: flex; align-items: center; gap: 10px; }
        .btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; min-height: 40px; padding: 0 16px; border-radius: 9px; text-decoration: none; font-family: inherit; font-size: 13px; font-weight: 600; cursor: pointer; border: 1px solid transparent; transition: all 0.2s ease; }
        .btn svg { width: 17px; height: 17px; flex-shrink: 0; }
        .btn-back { color: #334155; background: #fff; border-color: #cbd5e1; }
        .btn-back:hover { background: #f8fafc; border-color: #94a3b8; }
        .btn-print { color: #fff; background: #2563eb; border-color: #2563eb; }
        .btn-print:hover { background: #1d4ed8; }
        
        .document { width: 210mm; min-height: 297mm; margin: 0 auto 30px; padding: 18mm 16mm; background: #fff; box-shadow: 0 5px 25px rgba(15, 23, 42, 0.10); }
        .document-header { text-align: center; padding-bottom: 14px; border-bottom: 2px solid #1e40af; margin-bottom: 20px; }
        .institution { font-size: 13px; font-weight: 700; color: #475569; text-transform: uppercase; letter-spacing: 0.4px; margin-bottom: 4px; }
        .document-title { margin: 0; color: #0f172a; font-size: 20px; line-height: 1.3; font-weight: 700; }
        .document-subtitle { margin-top: 5px; color: #64748b; font-size: 12px; }
        
        .section { margin-top: 20px; }
        .section-title { margin: 0 0 10px; padding: 8px 10px; background: #eff6ff; border-left: 4px solid #2563eb; color: #1e3a8a; font-size: 13px; font-weight: 700; }
        
        .identity-table { width: 100%; border-collapse: collapse; table-layout: fixed; }
        .identity-table td { border: 1px solid #dbe2ea; padding: 7px 9px; vertical-align: top; overflow-wrap: anywhere; }
        .identity-table .label { width: 24%; background: #f8fafc; color: #475569; font-weight: 600; }
        .identity-table .value { width: 26%; color: #0f172a; }
        
        .summary-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin-bottom: 12px; }
        .summary-card { border: 1px solid #dbe2ea; border-radius: 8px; padding: 12px; text-align: center; background: #fff; break-inside: avoid; page-break-inside: avoid; }
        .summary-label { color: #64748b; font-size: 10px; text-transform: uppercase; letter-spacing: 0.4px; margin-bottom: 4px; }
        .summary-value { color: #0f172a; font-size: 18px; font-weight: 700; }
        .summary-predikat { color: #2563eb; font-size: 15px; }

        .indicator-table { width: 100%; border-collapse: collapse; table-layout: fixed; margin-bottom: 15px; }
        .indicator-table tr { break-inside: avoid; page-break-inside: avoid; }
        .indicator-table th, .indicator-table td { border: 1px solid #cbd5e1; padding: 6px 7px; vertical-align: top; overflow-wrap: anywhere; }
        .indicator-table th { background: #f1f5f9; color: #334155; font-size: 10px; font-weight: 700; text-align: center; }
        .indicator-table td { font-size: 10.5px; }
        
        .indicator-table .number { width: 5%; text-align: center; font-weight: 600; }
        .indicator-table .question { width: 50%; }
        .indicator-table .score { width: 8%; text-align: center; font-weight: 700; color: #b45309; }
        .indicator-table .bukti-cell { width: 37%; color: #475569; font-size: 10px; }
        .indicator-table .group-row td { background: #eff6ff; color: #1e3a8a; font-weight: 700; font-size: 10.5px; }

        .bukti-text { white-space: pre-line; }
        .bukti-empty { color: #94a3b8; font-style: italic; }

        .qa-block { margin-bottom: 12px; break-inside: avoid; page-break-inside: avoid; }
        .qa-question { font-weight: 700; color: #1e293b; margin-bottom: 4px; font-size: 11px; }
        .qa-answer { color: #475569; background: #f8fafc; padding: 8px; border-radius: 6px; border: 1px solid #e2e8f0; min-height: 40px; white-space: pre-line; font-size: 11px; }

        .signature-section { break-inside: avoid; page-break-inside: avoid; margin-top: 35px; display: grid; grid-template-columns: 1fr 1fr; gap: 40px; }
        .signature-box { text-align: center; }
        .signature-title { margin-bottom: 55px; font-size: 11px; }
        .signature-line { width: 80%; margin: 0 auto; border-bottom: 1px solid #334155; }
        .signature-name { margin-top: 5px; font-weight: 700; font-size: 11px; overflow-wrap: anywhere; }
        
        .document-footer { margin-top: 25px; padding-top: 8px; border-top: 1px solid #cbd5e1; text-align: center; color: #94a3b8; font-size: 9px; }
        .note { margin-top: 6px; color: #64748b; font-size: 10px; }

        @media screen and (max-width: 900px) {
            .print-toolbar { width: auto; margin: 12px; }
            .document { width: auto; min-height: auto; margin: 0 12px 20px; padding: 20px; }
        }
        @media screen and (max-width: 600px) {
            .print-toolbar { flex-direction: column; align-items: stretch; }
            .toolbar-left, .toolbar-right { width: 100%; }
            .btn { flex: 1; }
            .summary-grid { grid-template-columns: 1fr; }
            .document { margin: 0; border-radius: 0; }
            .identity-table, .identity-table tbody, .identity-table tr, .identity-table td { display: block; width: 100%; }
            .identity-table td { width: 100% !important; }
            .signature-section { grid-template-columns: 1fr; gap: 30px; }
        }
        
        @page { size: A4; margin: 10mm; }
        @media print {
            html, body { width: auto; background: #fff; }
            body { font-size: 11px; }
            .no-print { display: none !important; }
            .document { width: 100%; min-height: auto; margin: 0; padding: 0; box-shadow: none; }
            .document-header { margin-top: 0; }
            .section-title, .indicator-table th, .identity-table .label, .qa-answer, .indicator-table .group-row td {
                -webkit-print-color-adjust: exact; print-color-adjust: exact;
            }
            .section-title { background: #eff6ff !important; }
            .indicator-table th { background: #f1f5f9 !important; }
            .identity-table .label { background: #f8fafc !important; }
            .indicator-table .group-row td { background: #eff6ff !important; }
        }
    </style>
</head>

<body>
    
    <div class="print-toolbar no-print">
        <div class="toolbar-left">
            <a href="<?php echo e(route('instrumen.stem.diseminasi.monitoring.show', $monitoring->id)); ?>" class="btn btn-back">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
                Kembali
            </a>
        </div>
        <div class="toolbar-right">
            <button type="button" onclick="window.print()" class="btn btn-print">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 9V2h12v7M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2M6 14h12v8H6v-8z" /></svg>
                Cetak / Simpan PDF
            </button>
        </div>
    </div>

    
    <main class="document">
        <header class="document-header">
            <div class="institution">Balai Guru dan Tenaga Kependidikan</div>
            <h1 class="document-title">INSTRUMEN MONEV MONITORING DISEMINASI STEM</h1>
            <div class="document-subtitle">Observasi, Wawancara, dan Studi Dokumen</div>
        </header>

        
        <section class="section">
            <h2 class="section-title">A. Identitas Supervisi Diseminasi</h2>
            <table class="identity-table">
                <tbody>
                    <tr>
                        <td class="label">Nama Satuan Pendidikan</td>
                        <td class="value"><?php echo e($monitoring->nama_satuan_pendidikan ?: '-'); ?></td>
                        <td class="label">Kabupaten/Kota</td>
                        <td class="value"><?php echo e($monitoring->kab_kota ?: '-'); ?></td>
                    </tr>
                    <tr>
                        <td class="label">Nama Supervisor</td>
                        <td class="value"><?php echo e($monitoring->nama_supervisor ?: '-'); ?></td>
                        <td class="label">Jabatan/Instansi</td>
                        <td class="value"><?php echo e($monitoring->jabatan_instansi ?: '-'); ?></td>
                    </tr>
                    <tr>
                        <td class="label">Nama Fasilitator Daerah</td>
                        <td class="value"><?php echo e($monitoring->nama_fasilitator_daerah ?: '-'); ?></td>
                        <td class="label">Tanggal Supervisi</td>
                        <td class="value"><?php echo e($monitoring->tanggal_supervisi ? \Carbon\Carbon::parse($monitoring->tanggal_supervisi)->format('d/m/Y') : '-'); ?></td>
                    </tr>
                    <tr>
                        <td class="label">Tahapan yang Disupervisi</td>
                        <td class="value" colspan="3">
                            <?php echo e(is_array($monitoring->tahapan_dsupervisi) ? implode(', ', $monitoring->tahapan_dsupervisi) : '-'); ?>

                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

        
        <section class="section">
            <h2 class="section-title">B. Ringkasan Hasil Evaluasi</h2>
            <div class="summary-grid">
                <div class="summary-card">
                    <div class="summary-label">Indikator Dinilai</div>
                    <div class="summary-value"><?php echo e($jumlahDinilai); ?> / 35</div>
                    <div class="summary-label" style="margin-top: 5px;">Total skor <?php echo e($totalSkor); ?></div>
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
            <p class="note">Nilai dihitung berdasarkan persentase skor perolehan dari skor maksimal (35 indikator × 4).</p>
        </section>

        
        <section class="section">
            <h2 class="section-title">C. Detail Penilaian Instrumen A (Fasilitator)</h2>
            <table class="indicator-table">
                <thead>
                    <tr>
                        <th class="number">No</th>
                        <th class="question">Indikator</th>
                        <th class="score">Skor</th>
                        <th class="bukti-cell">Catatan / Bukti</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $__currentLoopData = $monitoringQs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelompok => $pertanyaanList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="group-row">
                            <td colspan="4"><?php echo e($kelompok); ?></td>
                        </tr>
                        <?php $__currentLoopData = $pertanyaanList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $teks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $skor = $jawaban[$nomor - 1] ?? '-';
                                $bukti = $jawabanBukti[$nomor - 1] ?? '';
                            ?>
                            <tr>
                                <td class="number"><?php echo e($nomor); ?></td>
                                <td class="question"><?php echo e($teks); ?></td>
                                <td class="score"><?php echo e(is_numeric($skor) ? $skor : '-'); ?></td>
                                <td class="bukti-cell">
                                    <?php if(trim($bukti) !== ''): ?>
                                        <div class="bukti-text"><?php echo e($bukti); ?></div>
                                    <?php else: ?>
                                        <div class="bukti-empty">-</div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php $nomor++; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </section>

        
        <section class="section">
            <h2 class="section-title">D. Pertanyaan Terbuka (Wawancara)</h2>
            <?php $__currentLoopData = $wawancaraQs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $teks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="qa-block">
                    <div class="qa-question"><?php echo e($no); ?>. <?php echo e($teks); ?></div>
                    <div class="qa-answer"><?php echo e($monitoring->{"wawancara_guru_$no"} ?: '-'); ?></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </section>

        
        <section class="signature-section">
            <div class="signature-box">
                <div class="signature-title">Supervisor</div>
                <div class="signature-line"></div>
                <div class="signature-name"><?php echo e($monitoring->nama_supervisor ?: '-'); ?></div>
            </div>
            <div class="signature-box">
                <div class="signature-title">Fasilitator Daerah</div>
                <div class="signature-line"></div>
                <div class="signature-name"><?php echo e($monitoring->nama_fasilitator_daerah ?: '-'); ?></div>
            </div>
        </section>

        <footer class="document-footer">
            Dokumen hasil Monitoring dan Evaluasi Pelatihan STEM - Instrumen Monitoring Diseminasi
        </footer>
    </main>
</body>
</html><?php /**PATH C:\Users\admin\Herd\bgtk-monev\resources\views/instrumen/stem/diseminasi/monitoring/cetak.blade.php ENDPATH**/ ?>