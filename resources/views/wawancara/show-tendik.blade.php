@extends('layouts.app')

@section('title', 'Detail Wawancara TENDIK')
@section('page-title', 'Detail Wawancara TENDIK')

@section('content')
    @php
        $info = json_decode($wawancara->hasil_wawancara ?? '{}', true) ?? [];

        $pertanyaan = [
            1 => '(Reaksi) Hal apa dari substansi materi, fasilitator, maupun layanan penyelenggaraan yang menurut Anda paling bermanfaat dan berkesan? Mengapa?',
            2 => '(Belajar) Pengetahuan, keterampilan, atau sikap baru apa yang Anda kuasai setelah pelatihan (termasuk growth mindset dan profesionalisme), dan materi apa yang masih perlu diperdalam?',
            3 => '(Perilaku) Berikan contoh nyata penerapan hasil pelatihan dalam pekerjaan Anda sehari-hari.',
            4 => '(Perilaku) Kendala apa yang Anda hadapi dalam menerapkan hasil pelatihan, dan dukungan apa yang Anda perlukan?',
            5 => '(Hasil) Perubahan atau dampak apa yang terlihat di sekolah setelah pelatihan, dan apa saran Anda untuk perbaikan program berikutnya?',
        ];

        // Warna badge per tahap (selaras dengan badge level pada Hasil Penilaian BCKS)
        $tahapStyle = [
            'Reaksi' => 'background:#dbeafe;color:#1d4ed8',
            'Belajar' => 'background:#ede9fe;color:#6d28d9',
            'Perilaku' => 'background:#d1fae5;color:#047857',
            'Hasil' => 'background:#fef3c7;color:#b45309',
        ];

        $status = $wawancara->status ?? 'Selesai';
        $statusStyle = $status === 'Selesai'
            ? 'background:#d1fae5;color:#047857'
            : 'background:#fef3c7;color:#b45309';

        $tanggalPelaksanaan = $info['tanggal_pelaksanaan']
            ?? ($wawancara->tanggal_evaluasi?->format('Y-m-d')
                ?? $wawancara->tanggal_wawancara?->format('Y-m-d'));

        $tanggalPelaksanaanTampil = $tanggalPelaksanaan
            ? \Illuminate\Support\Carbon::parse($tanggalPelaksanaan)->format('d/m/Y')
            : '-';

        $tanggalPengisian = $wawancara->tanggal_wawancara?->format('d/m/Y') ?? '-';

        $jabatan = $info['jabatan_responden']
            ?? $wawancara->status_responden
            ?? $wawancara->jabatan_narasumber
            ?? '-';

        $jabatanTampil = $jabatan === 'Lainnya'
            ? ($info['jabatan_lainnya'] ?? $wawancara->jabatan_narasumber ?? 'Lainnya')
            : $jabatan;

        $jumlahPertanyaan = count($pertanyaan);
        $jumlahTerjawab = collect($pertanyaan)
            ->filter(fn($teks, $nomor) => filled(trim((string) $wawancara->{'jawaban_' . $nomor})))
            ->count();
    @endphp

    <style>
        /* ===================== TOKEN WARNA (sama dengan Hasil BCKS) ===================== */
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

        .d-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            overflow: hidden;
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

        @media (max-width: 1023px) {
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

        /* --- tombol pastel --- */
        .d-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
        }

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

        .b-violet {
            --b-bg: linear-gradient(160deg, #f2edff 0%, #e0d6ff 100%);
            --b-line: #d6caf9;
            --b-ink: #6d28d9;
            --b-glow: rgba(124, 58, 237, .7);
        }

        .b-amber {
            --b-bg: linear-gradient(160deg, #fff7de 0%, #fde8ac 100%);
            --b-line: #f6dd9b;
            --b-ink: #b45309;
            --b-glow: rgba(217, 154, 11, .7);
        }

        /* --- tile ringkasan --- */
        .d-tiles {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
        }

        @media (max-width: 767px) {
            .d-tiles {
                grid-template-columns: 1fr;
            }
        }

        .d-tile {
            position: relative;
            text-align: center;
            padding: 22px 16px 18px;
            overflow: hidden;
            background: var(--t-bg, var(--p-50));
            border: 1px solid var(--t-line, #dfe8fb);
            border-radius: 18px;
            transition: transform .3s cubic-bezier(.22, 1, .36, 1), box-shadow .3s cubic-bezier(.22, 1, .36, 1);
        }

        .d-tile:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 30px -20px var(--t-glow, rgba(37, 99, 235, .6));
        }

        .d-tile-clip {
            position: absolute;
            left: 12px;
            top: 12px;
            color: var(--t-clip, #a9bde6);
        }

        .d-tile-dot {
            position: absolute;
            right: 14px;
            top: 14px;
            width: 7px;
            height: 7px;
            border-radius: 9999px;
            background: var(--p-600);
            z-index: 1;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .65);
        }

        .d-tile-ico {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 58px;
            height: 58px;
            margin: 0 auto 10px;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 18px -10px var(--t-glow, rgba(37, 99, 235, .55));
        }

        .d-tile-label {
            font-size: 13.5px;
            font-weight: 600;
            color: var(--ink);
        }

        .d-tile-val {
            margin-top: 4px;
            font-size: 26px;
            font-weight: 800;
            letter-spacing: -.02em;
            color: var(--ink);
        }

        .d-tile-val small {
            font-size: 15px;
            font-weight: 600;
            color: #7f8cab;
        }

        .d-tile-note {
            margin-top: 6px;
            font-size: 11.5px;
            color: #55637f;
        }

        .t-blue {
            --t-bg: linear-gradient(160deg, #eaf0ff 0%, #d3e1ff 100%);
            --t-line: #c6d8fb;
            --t-glow: rgba(37, 99, 235, .55);
            --t-clip: #8fa9e6;
        }

        .t-mint {
            --t-bg: linear-gradient(160deg, #e9faf2 0%, #cdf0e0 100%);
            --t-line: #bfe8d4;
            --t-glow: rgba(5, 150, 105, .5);
            --t-clip: #86c9ae;
        }

        .t-violet {
            --t-bg: linear-gradient(160deg, #f2edff 0%, #e0d6ff 100%);
            --t-line: #d6caf9;
            --t-glow: rgba(124, 58, 237, .5);
            --t-clip: #a999dc;
        }

        .t-amber {
            --t-bg: linear-gradient(160deg, #fff7de 0%, #fde8ac 100%);
            --t-line: #f6dd9b;
            --t-glow: rgba(217, 154, 11, .5);
            --t-clip: #d3b568;
        }

        .d-tile::before,
        .d-tile::after {
            content: '';
            position: absolute;
            z-index: 0;
            border-radius: 9999px;
            pointer-events: none;
        }

        .d-tile::before {
            right: -30px;
            bottom: -42px;
            width: 124px;
            height: 124px;
            background: rgba(255, 255, 255, .38);
        }

        .d-tile::after {
            left: -26px;
            bottom: -46px;
            width: 92px;
            height: 92px;
            background: rgba(255, 255, 255, .24);
        }

        .d-tile>p,
        .d-tile>div,
        .d-tile>.d-tile-ico {
            position: relative;
            z-index: 1;
        }

        /* --- notifikasi sukses --- */
        .d-alert {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 18px;
            border-radius: 16px;
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #047857;
            font-size: 13px;
            font-weight: 600;
            line-height: 1.7;
        }

        /* --- grid info identitas --- */
        .d-info {
            display: grid;
            gap: 18px 32px;
            padding: 6px 20px 22px;
            grid-template-columns: minmax(0, 1fr);
        }

        @media (min-width: 768px) {
            .d-info.c2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .d-info.c3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        .d-info-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--muted);
        }

        .d-info-val {
            margin-top: 4px;
            font-size: 13.5px;
            font-weight: 600;
            color: var(--ink);
            line-height: 1.5;
        }

        .d-info-wide {
            grid-column: 1 / -1;
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

        .d-badge.lg {
            padding: 7px 16px;
            border-radius: 10px;
            font-size: 14px;
        }

        /* --- pertanyaan & jawaban wawancara --- */
        .d-qa-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
            padding: 6px 20px 22px;
        }

        .d-qa {
            padding: 16px;
            border: 1px solid var(--line);
            border-radius: 16px;
            background: #f9fbff;
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .d-qa:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 24px -18px rgba(37, 99, 235, .5);
        }

        .d-qa-q {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .d-qa-no {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 34px;
            height: 34px;
            border-radius: 11px;
            background: var(--p-600);
            color: #fff;
            font-size: 13px;
            font-weight: 700;
        }

        .d-qa-text {
            padding-top: 6px;
            font-size: 13.5px;
            font-weight: 700;
            line-height: 1.6;
            color: var(--ink);
        }

        .d-qa-badge {
            margin-top: 5px;
        }

        .d-qa-a {
            margin-top: 12px;
            padding: 14px 16px;
            border: 1px solid var(--line);
            border-radius: 12px;
            background: #fff;
            font-size: 13px;
            line-height: 1.8;
            color: #334155;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .d-qa-a.empty {
            font-style: italic;
            color: #94a3b8;
        }
    </style>

    <div class="d-wrap">

        {{-- ================= JUDUL HALAMAN ================= --}}
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Detail Wawancara <b>TENDIK</b></h1>
                    <p class="d-crumb">
                        Dashboard &nbsp;›&nbsp;
                        <a href="{{ route('wawancara.index') }}">Lembar Wawancara</a>
                        &nbsp;›&nbsp; Hasil Wawancara TENDIK
                    </p>
                    <p class="d-desc">Hasil wawancara evaluasi pelatihan tenaga kependidikan.</p>
                </div>

                <div class="no-print d-actions">

                    {{-- Kembali --}}
                    <a href="{{ route('wawancara.index') }}" class="d-pbtn b-blue back">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        Kembali
                    </a>

                    {{-- Cetak Hasil --}}
                    <a href="{{ route('wawancara.cetak', $wawancara->id) }}" class="d-pbtn b-mint">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 9V3h12v6M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2" />
                            <path d="M6 14h12v7H6z" />
                        </svg>
                        Cetak Hasil
                    </a>

                    {{-- Gabung PDF --}}
                    <a href="{{ route('cetak-gabungan.index', ['pilih' => ['wwc-' . $wawancara->id]]) }}"
                        class="d-pbtn b-violet">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 3h7l5 5v9a2 2 0 01-2 2H9a2 2 0 01-2-2V5a2 2 0 012-2z" />
                            <path d="M16 3v5h5" />
                            <path d="M17 21H6a2 2 0 01-2-2V9" />
                        </svg>
                        Gabung PDF
                    </a>

                    {{-- Edit Data --}}
                    <a href="{{ route('wawancara.edit', $wawancara->id) }}" class="d-pbtn b-amber">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Data
                    </a>

                </div>
            </div>
        </section>

        {{-- ================= NOTIFIKASI ================= --}}
        @if (session('success'))
            <div class="d-alert">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"
                    stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:3px">
                    <path d="M5 13l4 4L19 7" />
                </svg>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        {{-- ================= RINGKASAN ================= --}}
        <div class="d-tiles">

            {{-- Tanggal Pelaksanaan --}}
            <div class="d-tile t-blue">
                <svg class="d-tile-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="d-tile-dot"></span>
                <span class="d-tile-ico" style="color:var(--p-600)">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" />
                        <path d="M16 2v4M8 2v4M3 10h18" />
                    </svg>
                </span>
                <p class="d-tile-label">Tanggal Pelaksanaan</p>
                <p class="d-tile-val">{{ $tanggalPelaksanaanTampil }}</p>
                <p class="d-tile-note">Waktu pelaksanaan wawancara TENDIK</p>
            </div>

            {{-- Jawaban Terisi --}}
            <div class="d-tile t-violet">
                <svg class="d-tile-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="d-tile-dot" style="background:#7c3aed"></span>
                <span class="d-tile-ico" style="color:#6d28d9">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z" />
                    </svg>
                </span>
                <p class="d-tile-label">Jawaban Terisi</p>
                <p class="d-tile-val">{{ $jumlahTerjawab }}<small> / {{ $jumlahPertanyaan }}</small></p>
                <p class="d-tile-note">Jumlah pertanyaan yang sudah dijawab responden</p>
            </div>

            {{-- Status --}}
            <div class="d-tile t-mint">
                <svg class="d-tile-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="d-tile-dot" style="background:#10b981"></span>
                <span class="d-tile-ico" style="color:#059669">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 12l3 3 5-6" />
                    </svg>
                </span>
                <p class="d-tile-label">Status</p>
                <div style="margin-top:8px">
                    <span class="d-badge lg" style="{{ $statusStyle }}">{{ $status }}</span>
                </div>
                <p class="d-tile-note">Status pelaksanaan wawancara</p>
            </div>

        </div>

        {{-- ================= A. IDENTITAS PETUGAS MONEV ================= --}}
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">A. Identitas Petugas Monev</h2>
                    <p class="d-card-s">Identitas petugas yang melakukan monitoring dan evaluasi.</p>
                </div>
            </div>

            <div class="d-info c2">
                <div>
                    <p class="d-info-label">Nama Petugas Monev</p>
                    <p class="d-info-val">
                        {{ $wawancara->nama_petugas_monev ?: $wawancara->nama_pewawancara ?: '-' }}
                    </p>
                </div>

                <div>
                    <p class="d-info-label">Instansi Petugas</p>
                    <p class="d-info-val">
                        {{ $info['instansi_petugas'] ?? $wawancara->unit_kerja_petugas ?? '-' }}
                    </p>
                </div>

                <div>
                    <p class="d-info-label">Lokasi Monev</p>
                    <p class="d-info-val">{{ $info['lokasi_monev'] ?? '-' }}</p>
                </div>

                <div>
                    <p class="d-info-label">Tanggal Pelaksanaan</p>
                    <p class="d-info-val">{{ $tanggalPelaksanaanTampil }}</p>
                </div>
            </div>
        </section>

        {{-- ================= B. IDENTITAS RESPONDEN ================= --}}
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">B. Identitas Responden</h2>
                    <p class="d-card-s">Identitas responden yang mengisi instrumen.</p>
                </div>
            </div>

            <div class="d-info c2">
                <div>
                    <p class="d-info-label">Nama Responden</p>
                    <p class="d-info-val">
                        {{ $wawancara->nama_responden ?: $wawancara->nama_narasumber ?: '-' }}
                    </p>
                </div>

                <div>
                    <p class="d-info-label">Jabatan</p>
                    <p class="d-info-val">{{ $jabatanTampil }}</p>
                </div>

                <div>
                    <p class="d-info-label">Satuan Pendidikan</p>
                    <p class="d-info-val">
                        {{ $info['satuan_pendidikan'] ?? $wawancara->unit_kerja_responden ?? '-' }}
                    </p>
                </div>

                <div>
                    <p class="d-info-label">Masa Kerja (tahun)</p>
                    <p class="d-info-val">
                        {{ isset($info['masa_kerja']) ? $info['masa_kerja'] . ' tahun' : '-' }}
                    </p>
                </div>

                <div>
                    <p class="d-info-label">Nama Kegiatan/Pelatihan</p>
                    <p class="d-info-val">{{ $info['nama_pelatihan'] ?? '-' }}</p>
                </div>

                <div>
                    <p class="d-info-label">Tanggal Pengisian</p>
                    <p class="d-info-val">{{ $tanggalPengisian }}</p>
                </div>

                <div class="d-info-wide">
                    <p class="d-info-label">Status</p>
                    <div style="margin-top:6px">
                        <span class="d-badge" style="{{ $statusStyle }}">{{ $status }}</span>
                    </div>
                </div>
            </div>
        </section>

        {{-- ================= C. HASIL WAWANCARA ================= --}}
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">C. Hasil Wawancara</h2>
                    <p class="d-card-s">Jawaban responden berdasarkan pengalaman setelah pelatihan.</p>
                </div>

                <span class="d-pill">{{ $jumlahPertanyaan }} pertanyaan</span>
            </div>

            <div class="d-qa-list">
                @foreach ($pertanyaan as $nomor => $teks)
                    @php
                        // Pisahkan label tahap, mis. "(Reaksi) ..." -> "Reaksi" + isi pertanyaan
                        $tahap = null;
                        $isiPertanyaan = $teks;

                        if (preg_match('/^\((.+?)\)\s*(.*)$/s', $teks, $cocok)) {
                            $tahap = $cocok[1];
                            $isiPertanyaan = $cocok[2];
                        }
                    @endphp

                    <div class="d-qa">
                        <div class="d-qa-q">
                            <span class="d-qa-no">{{ $nomor }}</span>
                            <div>
                                @if ($tahap)
                                    <span class="d-badge d-qa-badge"
                                        style="{{ $tahapStyle[$tahap] ?? 'background:#f1f5f9;color:#475569' }}">
                                        {{ $tahap }}
                                    </span>
                                @endif
                                <p class="d-qa-text" @if ($tahap) style="padding-top:8px" @endif>
                                    {{ $isiPertanyaan }}
                                </p>
                            </div>
                        </div>

                        @if ($wawancara->{'jawaban_' . $nomor})
                            <div class="d-qa-a">{{ $wawancara->{'jawaban_' . $nomor} }}</div>
                        @else
                            <div class="d-qa-a empty">Belum ada jawaban.</div>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>

    </div>
@endsection