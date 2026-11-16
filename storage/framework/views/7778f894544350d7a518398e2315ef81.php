
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Monev STEM - Instrumen Dampak (Wawancara)</title>

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

        $bagian1 = ['konteks_masalah', 'skenario_lkpd', 'integrasi_disiplin', 'instrumen_asesmen'];
        $bagian2 = ['prinsip_5m', 'aksi_eksperimen', 'dinamika_kolaborasi', 'resiliensi', 'fungsionalitas'];

        // Hitung total skor
        $totalSkor = 0;
        $jumlahDinilai = 0;
        foreach (array_merge($bagian1, $bagian2) as $field) {
            $skor = $dampak->{"skor_$field"};
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
        .indicator-table .component { width: 20%; font-weight: bold; }
        .indicator-table .question { width: 45%; }
        .indicator-table .score { width: 8%; text-align: center; font-weight: 700; color: #b45309; }
        .indicator-table .evidence { width: 22%; white-space: pre-line; }
        
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
            .section-title, .indicator-table th, .identity-table .label, .qa-answer {
                -webkit-print-color-adjust: exact; print-color-adjust: exact;
            }
            .section-title { background: #eff6ff !important; }
            .indicator-table th { background: #f1f5f9 !important; }
            .identity-table .label { background: #f8fafc !important; }
        }
    </style>
</head>

<body>
    
    <div class="print-toolbar no-print">
        <div class="toolbar-left">
            <a href="<?php echo e(route('instrumen.stem.fasda.dampak.show', $dampak->id)); ?>" class="btn btn-back">
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
            <h1 class="document-title">INSTRUMEN MONEV LAPANGAN PELATIHAN STEM</h1>
            <div class="document-subtitle">Observasi, Telaah Artefak, dan Wawancara Terbuka</div>
        </header>

        
        <section class="section">
            <h2 class="section-title">A. Identitas Observasi</h2>
            <table class="identity-table">
                <tbody>
                    <tr>
                        <td class="label">Nama Sekolah/Satuan Pendidikan</td>
                        <td class="value" colspan="3"><?php echo e($dampak->nama_sekolah ?: '-'); ?></td>
                    </tr>
                    <tr>
                        <td class="label">Nama Pendidik/Guru</td>
                        <td class="value"><?php echo e($dampak->nama_pendidik ?: '-'); ?></td>
                        <td class="label">Mata Pelajaran</td>
                        <td class="value"><?php echo e($dampak->mata_pelajaran ?: '-'); ?></td>
                    </tr>
                    <tr>
                        <td class="label">Tanggal Observasi</td>
                        <td class="value"><?php echo e($dampak->tanggal_observasi ? $dampak->tanggal_observasi->format('d/m/Y') : '-'); ?></td>
                        <td class="label">Nama Petugas Monev</td>
                        <td class="value"><?php echo e($dampak->nama_petugas_monev ?: '-'); ?></td>
                    </tr>
                </tbody>
            </table>
        </section>

        
        <section class="section">
            <h2 class="section-title">B. Ringkasan Hasil Evaluasi</h2>
            <div class="summary-grid">
                <div class="summary-card">
                    <div class="summary-label">Indikator Dinilai</div>
                    <div class="summary-value"><?php echo e($jumlahDinilai); ?> / 9</div>
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
            <p class="note">Nilai dihitung berdasarkan persentase skor perolehan dari skor maksimal (9 indikator × 4).</p>
        </section>

        
        <section class="section">
            <h2 class="section-title">C. Telaah Dokumen Perencanaan & Asesmen</h2>
            <table class="indicator-table">
                <thead>
                    <tr>
                        <th class="number">No</th>
                        <th class="component">Komponen</th>
                        <th class="question">Indikator</th>
                        <th class="score">Skor</th>
                        <th class="evidence">Catatan/Bukti</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $bagian1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="number"><?php echo e($index + 1); ?></td>
                            <td class="component"><?php echo e(str_replace('_', ' ', ucwords($field))); ?></td>
                            <td class="question"><?php echo e($skorFields[$field]); ?></td>
                            <td class="score"><?php echo e($dampak->{"skor_$field"} ?: '-'); ?></td>
                            <td class="evidence"><?php echo e($dampak->{"bukti_$field"} ?: '-'); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </section>

        
        <section class="section">
            <h2 class="section-title">D. Observasi Pelaksanaan Pembelajaran di Kelas</h2>
            <table class="indicator-table">
                <thead>
                    <tr>
                        <th class="number">No</th>
                        <th class="component">Komponen</th>
                        <th class="question">Indikator</th>
                        <th class="score">Skor</th>
                        <th class="evidence">Catatan/Bukti</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $bagian2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="number"><?php echo e($index + 1); ?></td>
                            <td class="component"><?php echo e(str_replace('_', ' ', ucwords($field))); ?></td>
                            <td class="question"><?php echo e($skorFields[$field]); ?></td>
                            <td class="score"><?php echo e($dampak->{"skor_$field"} ?: '-'); ?></td>
                            <td class="evidence"><?php echo e($dampak->{"bukti_$field"} ?: '-'); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </section>

        
        <section class="section">
            <h2 class="section-title">E. Panduan Wawancara Terbuka</h2>
            
            <h3 style="font-size: 11px; margin-bottom: 10px; color: #1e3a8a;">A. Wawancara Murid</h3>
            <div class="qa-block">
                <div class="qa-question">1. Bisa ceritakan karya apa yang kelompok kalian buat? Kenapa memilih bentuk atau bahan ini?</div>
                <div class="qa-answer"><?php echo e($dampak->wawancara_murid_1 ?: '-'); ?></div>
            </div>
            <div class="qa-block">
                <div class="qa-question">2. Waktu bikin alat ini, sempat ada yang gagal atau nggak jalan, kan? Waktu itu apa yang kalian lakukan buat memperbaikinya?</div>
                <div class="qa-answer"><?php echo e($dampak->wawancara_murid_2 ?: '-'); ?></div>
            </div>
            <div class="qa-block">
                <div class="qa-question">3. Di kelompok ini, tugas kamu ngapain aja? Teman yang lain ngerjain apa?</div>
                <div class="qa-answer"><?php echo e($dampak->wawancara_murid_3 ?: '-'); ?></div>
            </div>
            <div class="qa-block">
                <div class="qa-question">4. Konsep mata pelajaran apa yang kalian pakai waktu bikin karya ini?</div>
                <div class="qa-answer"><?php echo e($dampak->wawancara_murid_4 ?: '-'); ?></div>
            </div>

            <h3 style="font-size: 11px; margin-top: 20px; margin-bottom: 10px; color: #1e3a8a;">B. Wawancara Pendidik</h3>
            <div class="qa-block">
                <div class="qa-question">1. Bagian mana dari siklus Engineering Design Process (EDP) yang menurut Bapak/Ibu paling menantang saat diterapkan ke anak-anak?</div>
                <div class="qa-answer"><?php echo e($dampak->wawancara_pendidik_1 ?: '-'); ?></div>
            </div>
            <div class="qa-block">
                <div class="qa-question">2. Bagaimana Bapak/Ibu memastikan bahan yang digunakan murid benar-benar memenuhi prinsip 'Murah dan Mudah' (5M)?</div>
                <div class="qa-answer"><?php echo e($dampak->wawancara_pendidik_2 ?: '-'); ?></div>
            </div>
            <div class="qa-block">
                <div class="qa-question">3. Bisa ceritakan satu momen saat murid mengalami kebuntuan? Bagaimana cara Bapak/Ibu memfasilitasi mereka tanpa memberikan jawaban langsung?</div>
                <div class="qa-answer"><?php echo e($dampak->wawancara_pendidik_3 ?: '-'); ?></div>
            </div>
            <div class="qa-block">
                <div class="qa-question">4. Terkait asesmen autentik, boleh diceritakan bagaimana cara Bapak/Ibu menilai proses kerja sama murid saat mereka sedang sibuk merakit atau berdiskusi?</div>
                <div class="qa-answer"><?php echo e($dampak->wawancara_pendidik_4 ?: '-'); ?></div>
            </div>
        </section>

        
        <section class="signature-section">
            <div class="signature-box">
                <div class="signature-title">Pendidik/Guru</div>
                <div class="signature-line"></div>
                <div class="signature-name"><?php echo e($dampak->nama_pendidik ?: '-'); ?></div>
            </div>
            <div class="signature-box">
                <div class="signature-title">Petugas Monev</div>
                <div class="signature-line"></div>
                <div class="signature-name"><?php echo e($dampak->nama_petugas_monev ?: '-'); ?></div>
            </div>
        </section>

        <footer class="document-footer">
            Dokumen hasil Monitoring dan Evaluasi Pelatihan STEM - Instrumen Dampak
        </footer>
    </main>
</body>
</html><?php /**PATH C:\Users\admin\Herd\bgtk-monev\resources\views/instrumen/stem/fasda/dampak/cetak.blade.php ENDPATH**/ ?>