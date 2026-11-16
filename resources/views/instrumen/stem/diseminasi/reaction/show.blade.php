{{-- resources/views/instrumen/stem/diseminasi/reaction/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Hasil Instrumen Reaction')
@section('page-title', 'Hasil Instrumen Reaction')

@section('content')
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

        $kategoriStyle = function ($kategori) {
            return match ($kategori) {
                'Sangat Baik' => 'background:#d1fae5;color:#047857',
                'Baik' => 'background:#dbeafe;color:#1d4ed8',
                'Cukup' => 'background:#fef3c7;color:#b45309',
                default => 'background:#ffe4e6;color:#be123c',
            };
        };
    @endphp

    <style>
        /* ===================== TOKEN WARNA (Sama dengan PKGSD MBI) ===================== */
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

        /* --- judul halaman --- */
        .d-title-row { display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; }
        @media (max-width: 1023px) { .d-title-row { flex-direction: column; } }
        .d-h1 { font-size: 28px; font-weight: 400; letter-spacing: -.02em; color: var(--ink); line-height: 1.2; }
        .d-h1 b { font-weight: 700; }
        .d-crumb { margin-top: 4px; font-size: 12.5px; color: var(--muted); }
        .d-crumb a { color: inherit; transition: color .2s; text-decoration: none; }
        .d-crumb a:hover { color: var(--p-600); }
        .d-desc { margin-top: 10px; max-width: 640px; font-size: 13px; line-height: 1.7; color: #475569; }

        /* --- tombol pastel --- */
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

        /* --- tile ringkasan --- */
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

        /* --- grid info identitas --- */
        .d-info { display: grid; gap: 18px 32px; padding: 6px 20px 22px; grid-template-columns: minmax(0, 1fr); }
        @media (min-width: 768px) { .d-info.c2 { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
        .d-info-label { font-size: 12px; font-weight: 600; color: var(--muted); }
        .d-info-val { margin-top: 4px; font-size: 13.5px; font-weight: 600; color: var(--ink); line-height: 1.5; }

        /* --- badge --- */
        .d-badge { display: inline-flex; align-items: center; padding: 5px 10px; border-radius: 8px; font-size: 11.5px; font-weight: 700; text-align: center; white-space: nowrap; }
        .d-badge.lg { padding: 7px 16px; border-radius: 10px; font-size: 14px; white-space: normal; }

        /* --- tabel --- */
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
    </style>

    <div class="d-wrap">

        {{-- ================= JUDUL HALAMAN ================= --}}
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Hasil <b>Instrumen Reaction</b></h1>
                    <p class="d-crumb">
                        Dashboard &nbsp;›&nbsp;
                        <a href="{{ route('instrumen.index') }}">Instrumen</a> &nbsp;›&nbsp;
                        <a href="{{ route('instrumen.stem.index') }}">STEM</a> &nbsp;›&nbsp;
                        <a href="{{ route('instrumen.stem.diseminasi') }}">Diseminasi</a> &nbsp;›&nbsp; Hasil Reaction
                    </p>
                </div>

                <div class="no-print d-actions">
                    <a href="{{ route('instrumen.index') }}" class="d-pbtn b-blue back">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                        Kembali
                    </a>

                    <a href="{{ route('instrumen.stem.diseminasi.reaction.cetak', $reaction->id) }}" target="_blank" class="d-pbtn b-mint">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 9V3h12v6M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2" />
                            <path d="M6 14h12v7H6z" />
                        </svg>
                        Cetak Hasil
                    </a>

                    <a href="{{ route('instrumen.stem.diseminasi.reaction.edit', $reaction->id) }}" class="d-pbtn b-amber">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Data
                    </a>
                </div>
            </div>
        </section>

        {{-- ================= RINGKASAN HASIL ================= --}}
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
                <p class="d-tile-val">{{ $jumlahDinilai }}<small> / 29</small></p>
                <p class="d-tile-note">Total skor {{ $totalSkor }} dari indikator berskor 1-4</p>
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
                <p class="d-tile-val">{{ number_format($nilai, 2, ',', '.') }}</p>
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
                    <span class="d-badge lg" style="{{ $kategoriStyle($predikat) }}">{{ $predikat }}</span>
                </div>
                <p class="d-tile-note">Berdasarkan nilai akhir indikator</p>
            </div>
        </div>

        {{-- ================= A. IDENTITAS ================= --}}
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">A. Identitas Responden</h2>
                    <p class="d-card-s">Informasi peserta diseminasi.</p>
                </div>
            </div>
            <div class="d-info c2">
                <div>
                    <p class="d-info-label">Nama Responden</p>
                    <p class="d-info-val">{{ $reaction->nama_responden ?: '-' }}</p>
                </div>
                <div>
                    <p class="d-info-label">Asal Satuan Pendidikan</p>
                    <p class="d-info-val">{{ $reaction->asal_sekolah ?: '-' }}</p>
                </div>
                <div>
                    <p class="d-info-label">Nama Petugas Monev</p>
                    <p class="d-info-val">{{ $reaction->nama_petugas_monev ?: '-' }}</p>
                </div>
            </div>
        </section>

        {{-- ================= B. DETAIL PENILAIAN ================= --}}
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">B. Detail Penilaian</h2>
                    <p class="d-card-s">Rincian skor untuk setiap indikator reaksi.</p>
                </div>
            </div>
            
            <div style="overflow-x:auto">
                <table class="d-table">
                    <thead>
                        <tr>
                            <th style="width:50px">No</th>
                            <th>Indikator</th>
                            <th class="center" style="width:80px">Skor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $nomor = 1; @endphp
                        @foreach ($reactionQs as $kelompok => $pertanyaanList)
                            <tr>
                                <td colspan="3" class="d-group-cell" style="background: var(--p-50)">
                                    <p class="d-group-t">{{ $kelompok }}</p>
                                </td>
                            </tr>
                            @foreach ($pertanyaanList as $index => $teks)
                                @php
                                    $skor = $jawaban[$nomor - 1] ?? '-';
                                @endphp
                                <tr class="d-data">
                                    <td class="txt">{{ $nomor }}</td>
                                    <td class="q">{{ $teks }}</td>
                                    <td style="text-align:center">
                                        @if(is_numeric($skor))
                                            <span class="d-score">{{ $skor }}</span>
                                        @else
                                            <span class="d-score" style="background:#cbd5e1">-</span>
                                        @endif
                                    </td>
                                </tr>
                                @php $nomor++; @endphp
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

    </div>
@endsection