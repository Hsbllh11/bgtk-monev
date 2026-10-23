@php
    use Illuminate\Support\Carbon;

    $pertanyaan = config('pkgsd_wawancara.pertanyaan');

    $namaPetugas = $wawancara->nama_petugas_monev ?: $wawancara->nama_pewawancara ?: '-';
    $namaResponden = $wawancara->nama_responden ?: $wawancara->nama_narasumber ?: '-';

    $fmt = static function ($t) {
        try {
            return $t ? Carbon::parse($t)->format('d/m/Y') : '-';
        } catch (\Throwable $e) {
            return '-';
        }
    };

    $terisi = collect(array_keys($pertanyaan))
        ->filter(fn($n) => filled($wawancara->{'jawaban_' . $n}))
        ->count();
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Wawancara PKGSD MBI - {{ $namaResponden }}</title>

    <style>
        * { box-sizing: border-box; }
        body { margin: 0; background: #eef2f7; color: #1e293b; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 1.6; }
        .print-toolbar { width: 210mm; margin: 20px auto; display: flex; justify-content: space-between; gap: 12px; }
        .btn { display: inline-flex; align-items: center; justify-content: center; min-height: 40px; padding: 0 16px; border: 1px solid #cbd5e1; border-radius: 9px; font-size: 13px; font-weight: 600; text-decoration: none; cursor: pointer; }
        .btn-back { background: #fff; color: #334155; }
        .btn-print { background: #2563eb; border-color: #2563eb; color: #fff; }
        .document { width: 210mm; min-height: 297mm; margin: 0 auto 30px; padding: 18mm 16mm; background: #fff; box-shadow: 0 5px 25px rgba(15, 23, 42, .10); }
        .document-header { margin-bottom: 22px; padding-bottom: 14px; border-bottom: 2px solid #1e40af; text-align: center; }
        .institution { margin-bottom: 5px; color: #475569; font-size: 13px; font-weight: 700; letter-spacing: .4px; text-transform: uppercase; }
        .document-title { margin: 0; color: #0f172a; font-size: 20px; font-weight: 700; }
        .document-subtitle { margin-top: 5px; color: #64748b; font-size: 11px; }
        .section { margin-top: 22px; }
        .section-title { margin: 0 0 10px; padding: 8px 10px; border-left: 4px solid #2563eb; background: #eff6ff; color: #1e3a8a; font-size: 12px; font-weight: 700; }
        .identity-table { width: 100%; border-collapse: collapse; table-layout: fixed; }
        .identity-table td { padding: 7px 8px; border: 1px solid #dbe2ea; vertical-align: top; overflow-wrap: anywhere; }
        .identity-table .label { width: 24%; background: #f8fafc; color: #475569; font-weight: 600; }
        .identity-table .value { width: 26%; }
        .question { margin-top: 14px; border: 1px solid #cbd5e1; border-radius: 4px; }
        .question-heading { padding: 9px 10px; border-bottom: 1px solid #dbe2ea; background: #f8fafc; font-size: 11px; font-weight: 700; }
        .question-number { display: block; color: #1d4ed8; }
        .question-text { margin-top: 3px; font-weight: 400; }
        .answer { min-height: 65px; padding: 10px; font-size: 11px; text-align: left; white-space: pre-wrap; overflow-wrap: anywhere; }
        .empty-answer { color: #94a3b8; font-style: italic; }
        .signature-section { display: grid; grid-template-columns: 1fr 1fr; gap: 35px; margin-top: 40px; break-inside: avoid; page-break-inside: avoid; }
        .signature-box { text-align: center; }
        .signature-title { margin-bottom: 65px; }
        .signature-line { width: 85%; margin: 0 auto; border-bottom: 1px solid #334155; }
        .signature-name { margin-top: 6px; font-size: 11px; font-weight: 700; }
        .document-footer { margin-top: 25px; padding-top: 8px; border-top: 1px solid #cbd5e1; color: #94a3b8; font-size: 9px; text-align: center; }

        @page { size: A4; margin: 10mm; }

        @media print {
            html, body { width: 100%; background: #fff; font-size: 10px; }
            .no-print { display: none !important; }
            .document { width: 100%; min-height: auto; margin: 0; padding: 0; box-shadow: none; }
            .section-title, .question-heading, .identity-table .label { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
        }
    </style>
</head>

<body>
    <div class="print-toolbar no-print">
        <a href="{{ route('wawancara.show', $wawancara->id) }}" class="btn btn-back">← Kembali</a>
        <button type="button" onclick="window.print()" class="btn btn-print">Cetak Hasil</button>
    </div>

    <main class="document">
        <header class="document-header">
            <div class="institution">Balai Guru dan Tenaga Kependidikan</div>
            <h1 class="document-title">HASIL WAWANCARA PKGSD MBI</h1>
            <div class="document-subtitle">Dokumen Monitoring dan Evaluasi Program PKGSD MBI</div>
        </header>

        <section class="section">
            <h2 class="section-title">A. Identitas Pengisian</h2>

            <table class="identity-table">
                <tbody>
                    <tr>
                        <td class="label">Nama Petugas Monev</td>
                        <td class="value">{{ $namaPetugas }}</td>
                        <td class="label">Instansi Petugas</td>
                        <td class="value">{{ $metadata['instansi_petugas'] ?? $wawancara->unit_kerja_petugas ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">Nama Responden</td>
                        <td class="value">{{ $namaResponden }}</td>
                        <td class="label">Jabatan Responden</td>
                        <td class="value">{{ $metadata['jabatan_responden'] ?? $wawancara->status_responden ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">Lokasi Monev</td>
                        <td class="value">{{ $metadata['lokasi_monev'] ?? '-' }}</td>
                        <td class="label">Tanggal Pelaksanaan</td>
                        <td class="value">{{ $fmt($metadata['tanggal_pelaksanaan'] ?? $wawancara->tanggal_evaluasi) }}</td>
                    </tr>
                    <tr>
                        <td class="label">Satuan Pendidikan</td>
                        <td class="value">{{ $metadata['satuan_pendidikan'] ?? $wawancara->unit_kerja_responden ?? '-' }}</td>
                        <td class="label">Masa Kerja</td>
                        <td class="value">{{ isset($metadata['masa_kerja']) ? $metadata['masa_kerja'] . ' tahun' : '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">Nama Kegiatan/Pelatihan</td>
                        <td class="value">{{ $metadata['nama_pelatihan'] ?? '-' }}</td>
                        <td class="label">Tanggal Pengisian</td>
                        <td class="value">{{ $fmt($wawancara->tanggal_wawancara) }}</td>
                    </tr>
                    <tr>
                        <td class="label">Status Pengisian</td>
                        <td class="value" colspan="3">
                            {{ $terisi === count($pertanyaan) ? 'Lengkap' : 'Belum Lengkap' }}
                            — {{ $terisi }} dari {{ count($pertanyaan) }} pertanyaan terisi
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section class="section">
            <h2 class="section-title">B. Hasil Wawancara Terbuka</h2>

            @foreach ($pertanyaan as $nomor => $teks)
                @php $jawaban = $wawancara->{'jawaban_' . $nomor}; @endphp

                <article class="question">
                    <div class="question-heading">
                        <span class="question-number">Pertanyaan {{ $nomor }}</span>
                        <div class="question-text">{{ $teks }}</div>
                    </div>

                    <div class="answer">@if (filled($jawaban)){{ trim($jawaban) }}@else<span class="empty-answer">Belum ada jawaban.</span>@endif</div>
                </article>
            @endforeach
        </section>

        <section class="signature-section">
            <div class="signature-box">
                <div class="signature-title">Responden</div>
                <div class="signature-line"></div>
                <div class="signature-name">{{ $namaResponden }}</div>
            </div>

            <div class="signature-box">
                <div class="signature-title">Petugas Monev</div>
                <div class="signature-line"></div>
                <div class="signature-name">{{ $namaPetugas }}</div>
            </div>
        </section>

        <footer class="document-footer">
            Dokumen hasil wawancara Monitoring dan Evaluasi PKGSD MBI
        </footer>
    </main>
</body>
</html>