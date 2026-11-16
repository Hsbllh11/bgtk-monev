{{-- resources/views/instrumen/stem/diseminasi/reaction/cetak.blade.php --}}
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Monev STEM - Instrumen Reaction</title>

    @php
        $reactionQs = [
            'Evaluasi Program' => [
                'Kesesuaian program kegiatan dengan tujuan pelatihan',
                'Kesesuaian bahan ajar dengan struktur program',
                'Kesesuaian alokasi materi dengan bobot materi',
                'Relevansi materi dengan kebutuhan peserta pelatihan dalam mendukung pelaksanaan tugas pendidik',
                'Manfaat materi pelatihan dalam meningkatkan kompetensi peserta'
            ],
            'Sarana dan Prasarana Penunjang Kegiatan' => [
                'Kesiapan dan ketersediaan sarana kegiatan [audio visual, LCD/laptop, papan putih, pelantang, spidol, penghapus].',
                'Kenyamanan ruang kegiatan [ventilasi udara/AC, pencahayaan].',
                'Kebersihan ruang kelas.',
                'Ketersediaan sarana ibadah.',
                'Ketersediaan akses internet'
            ],
            'Fasilitator' => [
                'Fasilitator memfasilitasi dan mendampingi proses pembelajaran peserta.',
                'Fasilitator menggunakan bahasa yang menghargai dan menghormati di dalam berkomunikasi dengan peserta.',
                'Fasilitator memulai dan mengakhiri pembelajaran tepat waktu.',
                'Fasilitator mampu menyampaikan materi dengan jelas dan tepat, sehingga peserta dapat memahami pembelajaran dengan baik.'
            ],
            'Akses LMS' => [
                'Kemudahan dalam mengakses LMS Pembelajaran',
                'Kemudahan dalam membaca materi/video yang ada di LMS',
                'Kemudahan dalam mengikuti alur LMS',
                'Kemudahan dalam pembelajaran di LMS',
                'Kemudahan dalam berdiskusi di LMS',
                'Kemudahan dalam mengumpulkan tugas di LMS'
            ],
            'Bahan Kegiatan' => [
                'Kelengkapan dokumen/kit bahan kegiatan [materi, LMS, ATK]',
                'Kualitas tampilan bahan tayang kegiatan.',
                'Keterbacaan materi dan bahan tayang kegiatan.',
                'Ketersediaan ilustrasi dan contoh pada bahan pembelajaran kegiatan.'
            ],
            'Jangka Waktu Pelaksanaan Kegiatan' => [
                'Kesesuaian alokasi waktu pelaksanaan kegiatan dengan tujuan dan sasaran program kegiatan.',
                'Ketepatan alokasi waktu untuk menyelesaikan setiap tagihan pembelajaran.'
            ],
            'Layanan Menu' => [
                'Kecukupan menu yang mendukung pemenuhan gizi.',
                'Variasi hidangan/konsumsi.',
                'Ketepatan waktu penyediaan konsumsi.'
            ]
        ];

        // =========================================================
        // PERBAIKAN: Kumpulkan skor dari kolom-kolom JSON di database
        // =========================================================
        $kolomArray = [
            $reaction->evaluasi_program,
            $reaction->sarana_prasarana,
            $reaction->fasilitator,
            $reaction->akses_lms,
            $reaction->bahan_kegiatan,
            $reaction->jangka_waktu,
            $reaction->layanan_menu,
        ];

        $jawaban = [];
        foreach ($kolomArray as $kolom) {
            if (is_array($kolom)) {
                foreach ($kolom as $skor) {
                    $jawaban[] = $skor;
                }
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
    @endphp

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
        .indicator-table .question { width: 85%; }
        .indicator-table .score { width: 10%; text-align: center; font-weight: 700; color: #b45309; }
        .indicator-table .group-row td { background: #eff6ff; color: #1e3a8a; font-weight: 700; font-size: 10.5px; }

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
            .section-title, .indicator-table th, .identity-table .label, .indicator-table .group-row td {
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
    {{-- Toolbar --}}
    <div class="print-toolbar no-print">
        <div class="toolbar-left">
            <a href="{{ route('instrumen.stem.diseminasi.reaction.show', $reaction->id) }}" class="btn btn-back">
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

    {{-- Dokumen --}}
    <main class="document">
        <header class="document-header">
            <div class="institution">Balai Guru dan Tenaga Kependidikan</div>
            <h1 class="document-title">HASIL INSTRUMEN REACTION PELATIHAN STEM</h1>
            <div class="document-subtitle">Evaluasi Reaksi Peserta Terhadap Pelaksanaan Diseminasi</div>
        </header>

        {{-- A. Identitas --}}
        <section class="section">
            <h2 class="section-title">A. Identitas Responden</h2>
            <table class="identity-table">
                <tbody>
                    <tr>
                        <td class="label">Nama Responden</td>
                        <td class="value">{{ $reaction->nama_responden ?: '-' }}</td>
                        <td class="label">Asal Satuan Pendidikan</td>
                        <td class="value">{{ $reaction->asal_sekolah ?: '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">Nama Petugas Monev</td>
                        <td class="value" colspan="3">{{ $reaction->nama_petugas_monev ?: '-' }}</td>
                    </tr>
                </tbody>
            </table>
        </section>

        {{-- B. Ringkasan --}}
        <section class="section">
            <h2 class="section-title">B. Ringkasan Hasil Evaluasi</h2>
            <div class="summary-grid">
                <div class="summary-card">
                    <div class="summary-label">Indikator Dinilai</div>
                    <div class="summary-value">{{ $jumlahDinilai }} / 29</div>
                    <div class="summary-label" style="margin-top: 5px;">Total skor {{ $totalSkor }}</div>
                </div>
                <div class="summary-card">
                    <div class="summary-label">Nilai Akhir (100)</div>
                    <div class="summary-value">{{ number_format($nilai, 2, ',', '.') }}</div>
                </div>
                <div class="summary-card">
                    <div class="summary-label">Predikat</div>
                    <div class="summary-value summary-predikat">{{ $predikat }}</div>
                </div>
            </div>
            <p class="note">Nilai dihitung berdasarkan persentase skor perolehan dari skor maksimal (29 indikator × 4).</p>
        </section>

        {{-- C. Detail Penilaian --}}
        <section class="section">
            <h2 class="section-title">C. Detail Penilaian</h2>
            <table class="indicator-table">
                <thead>
                    <tr>
                        <th class="number">No</th>
                        <th class="question">Indikator</th>
                        <th class="score">Skor</th>
                    </tr>
                </thead>
                <tbody>
                    @php $nomor = 1; @endphp
                    @foreach ($reactionQs as $kelompok => $pertanyaanList)
                        <tr class="group-row">
                            <td colspan="3">{{ $kelompok }}</td>
                        </tr>
                        @foreach ($pertanyaanList as $index => $teks)
                            @php
                                $skor = $jawaban[$nomor - 1] ?? '-';
                            @endphp
                            <tr>
                                <td class="number">{{ $nomor }}</td>
                                <td class="question">{{ $teks }}</td>
                                <td class="score">{{ is_numeric($skor) ? $skor : '-' }}</td>
                            </tr>
                            @php $nomor++; @endphp
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </section>

        {{-- Tanda tangan --}}
        <section class="signature-section">
            <div class="signature-box">
                <div class="signature-title">Responden / Peserta</div>
                <div class="signature-line"></div>
                <div class="signature-name">{{ $reaction->nama_responden ?: '-' }}</div>
            </div>
            <div class="signature-box">
                <div class="signature-title">Petugas Monev</div>
                <div class="signature-line"></div>
                <div class="signature-name">{{ $reaction->nama_petugas_monev ?: '-' }}</div>
            </div>
        </section>

        <footer class="document-footer">
            Dokumen hasil Monitoring dan Evaluasi Pelatihan STEM - Instrumen Reaction
        </footer>
    </main>
</body>
</html>