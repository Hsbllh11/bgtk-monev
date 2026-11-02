@extends('layouts.app')

@section('title', 'Detail Tindak Lanjut')

@section('page-title', 'Detail Tindak Lanjut')

@section('content')
    @php
        /*
        |--------------------------------------------------------------------------
        | Ringkasan
        |--------------------------------------------------------------------------
        */

        $statusTampil = match ($tindakLanjut->status) {
            'Selesai' => 'Selesai',
            'Dalam Proses' => 'Dalam Proses',
            default => 'Belum Dimulai',
        };

        $statusStyle = match ($statusTampil) {
            'Selesai' => 'background:#d1fae5;color:#047857',
            'Dalam Proses' => 'background:#fef3c7;color:#b45309',
            default => 'background:#f1f5f9;color:#334155',
        };

        $tileStatus = match ($statusTampil) {
            'Selesai' => 't-mint',
            'Dalam Proses' => 't-amber',
            default => 't-blue',
        };

        $dotStatus = match ($statusTampil) {
            'Selesai' => '#10b981',
            'Dalam Proses' => '#d99a0b',
            default => '#2563eb',
        };

        $icoStatus = match ($statusTampil) {
            'Selesai' => '#059669',
            'Dalam Proses' => '#b45309',
            default => '#2563eb',
        };
    @endphp

    <style>
        /* ===================== TOKEN WARNA (sama dengan Detail Sekolah) ===================== */
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
            text-decoration: none;
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

        .d-tile-val.sm {
            font-size: 18px;
            line-height: 1.4;
            letter-spacing: -.01em;
            word-break: break-word;
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

        /* --- grid info --- */
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

        .d-info-sub {
            margin-top: 2px;
            font-size: 12px;
            color: var(--muted);
        }

        .d-info-plain {
            margin-top: 4px;
            font-size: 13px;
            color: var(--muted);
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

        /* --- blok teks panjang --- */
        .d-text-list {
            padding: 6px 20px 22px;
        }

        .d-text {
            padding: 14px 16px;
            border: 1px solid var(--line);
            border-radius: 12px;
            background: #f9fbff;
            font-size: 13px;
            line-height: 1.8;
            color: #334155;
            white-space: pre-line;
        }

        .d-text.empty {
            font-style: italic;
            color: #94a3b8;
            background: #fff;
        }
    </style>

    <div class="d-wrap">

        {{-- ================= JUDUL HALAMAN ================= --}}
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Detail <b>Tindak Lanjut</b></h1>
                    <p class="d-crumb">
                        Dashboard &nbsp;›&nbsp;
                        <a href="{{ route('tindak-lanjut.index') }}">Daftar tindak lanjut</a>
                        &nbsp;›&nbsp; Detail tindak lanjut
                    </p>
                    <p class="d-desc">Informasi lengkap tindak lanjut hasil monitoring dan evaluasi.</p>
                </div>

                <div class="no-print d-actions">

                    {{-- Kembali --}}
                    <a href="{{ route('tindak-lanjut.index') }}" class="d-pbtn b-blue back">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        Kembali
                    </a>

                    {{-- Edit --}}
                    <a href="{{ route('tindak-lanjut.edit', ['tindakLanjut' => $tindakLanjut->id]) }}"
                        class="d-pbtn b-amber">
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

            {{-- Status --}}
            <div class="d-tile {{ $tileStatus }}">
                <svg class="d-tile-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="d-tile-dot" style="background:{{ $dotStatus }}"></span>
                <span class="d-tile-ico" style="color:{{ $icoStatus }}">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 12l3 3 5-6" />
                    </svg>
                </span>
                <p class="d-tile-label">Status</p>
                <div style="margin-top:8px">
                    <span class="d-badge lg" style="{{ $statusStyle }}">{{ $statusTampil }}</span>
                </div>
                <p class="d-tile-note">Status pelaksanaan tindak lanjut</p>
            </div>

            {{-- Target Selesai --}}
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
                <p class="d-tile-label">Target Selesai</p>
                <p class="d-tile-val">{{ $tindakLanjut->target_selesai?->format('d/m/Y') ?? '-' }}</p>
                <p class="d-tile-note">Batas waktu pelaksanaan</p>
            </div>

            {{-- Penanggung Jawab --}}
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
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                </span>
                <p class="d-tile-label">Penanggung Jawab</p>
                <p class="d-tile-val sm">{{ $tindakLanjut->penanggung_jawab ?: '-' }}</p>
                <p class="d-tile-note">Pihak yang melaksanakan tindak lanjut</p>
            </div>

        </div>

        {{-- ================= A. INFORMASI TINDAK LANJUT ================= --}}
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">A. Informasi Tindak Lanjut</h2>
                    <p class="d-card-s">Judul, sekolah, dan sumber tindak lanjut.</p>
                </div>
            </div>

            <div class="d-info c2">

                {{-- Judul --}}
                <div class="d-info-wide">
                    <p class="d-info-label">Judul Tindak Lanjut</p>
                    <p class="d-info-val">{{ $tindakLanjut->judul_tindak_lanjut ?: '-' }}</p>
                </div>

                {{-- Sekolah --}}
                <div>
                    <p class="d-info-label">Sekolah</p>
                    <p class="d-info-val">{{ $tindakLanjut->sekolah->nama_sekolah ?? '-' }}</p>

                    @if ($tindakLanjut->sekolah)
                        <p class="d-info-sub">NPSN: {{ $tindakLanjut->sekolah->npsn }}</p>
                    @endif
                </div>

                {{-- Wawancara --}}
                <div>
                    <p class="d-info-label">Sumber Wawancara</p>

                    @if ($tindakLanjut->wawancara)
                        <p class="d-info-val">{{ $tindakLanjut->wawancara->nama_narasumber }}</p>
                        <p class="d-info-sub">
                            {{ $tindakLanjut->wawancara->tanggal_wawancara?->format('d/m/Y') }}
                        </p>
                    @else
                        <p class="d-info-plain">Tidak terkait wawancara tertentu</p>
                    @endif
                </div>

                {{-- Penanggung Jawab --}}
                <div>
                    <p class="d-info-label">Penanggung Jawab</p>
                    <p class="d-info-val">{{ $tindakLanjut->penanggung_jawab ?: '-' }}</p>
                </div>

                {{-- Status --}}
                <div>
                    <p class="d-info-label">Status</p>
                    <div style="margin-top:6px">
                        <span class="d-badge" style="{{ $statusStyle }}">{{ $statusTampil }}</span>
                    </div>
                </div>

            </div>
        </section>

        {{-- ================= B. JADWAL PELAKSANAAN ================= --}}
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">B. Jadwal Pelaksanaan</h2>
                    <p class="d-card-s">Waktu pelaksanaan dan riwayat pencatatan data.</p>
                </div>
            </div>

            <div class="d-info c3">
                <div>
                    <p class="d-info-label">Tanggal Mulai</p>
                    <p class="d-info-val">{{ $tindakLanjut->tanggal_mulai?->format('d/m/Y') ?? '-' }}</p>
                </div>

                <div>
                    <p class="d-info-label">Target Selesai</p>
                    <p class="d-info-val">{{ $tindakLanjut->target_selesai?->format('d/m/Y') ?? '-' }}</p>
                </div>

                <div>
                    <p class="d-info-label">Dibuat</p>
                    <p class="d-info-val">{{ $tindakLanjut->created_at?->format('d/m/Y H:i') ?? '-' }}</p>
                </div>
            </div>
        </section>

        {{-- ================= C. URAIAN TINDAK LANJUT ================= --}}
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">C. Uraian Tindak Lanjut</h2>
                    <p class="d-card-s">Tindakan yang akan dilaksanakan.</p>
                </div>
            </div>

            <div class="d-text-list">
                <div class="d-text">{{ $tindakLanjut->uraian_tindak_lanjut }}</div>
            </div>
        </section>

        {{-- ================= D. KETERANGAN ================= --}}
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">D. Keterangan</h2>
                    <p class="d-card-s">Catatan atau informasi tambahan.</p>
                </div>
            </div>

            <div class="d-text-list">
                @if ($tindakLanjut->keterangan)
                    <div class="d-text">{{ $tindakLanjut->keterangan }}</div>
                @else
                    <div class="d-text empty">Tidak ada keterangan tambahan.</div>
                @endif
            </div>
        </section>

    </div>

@endsection