@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    @php
        $persen = fn($a, $b) => $b > 0 ? min(round(($a / $b) * 100), 100) : 0;
        $delta = fn($b) => $b['ini'] - $b['lalu'];

        $pctSekolah = $persen($sekolahTerjangkau, $totalSekolah);
        $pctTl = $persen($tlSelesai, $tlTotal);
    @endphp

    <style>
        /* ===================== TOKEN WARNA DASHBOARD ===================== */
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

        /* ===================== KOMPONEN DASHBOARD ===================== */
        .d-wrap {
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .d-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 20px;
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

        .d-head {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 14px;
        }

        .d-sep {
            height: 1px;
            background: var(--line);
            margin: 0 0 6px;
        }

        .d-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
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

        .d-desc {
            margin-top: 10px;
            max-width: 640px;
            font-size: 13px;
            line-height: 1.7;
            color: #475569;
        }

        .d-desc strong {
            color: var(--ink);
        }

        .d-fab-wrap {
            position: relative;
            flex-shrink: 0;
        }

        .d-fab {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 46px;
            height: 46px;
            border: 0;
            border-radius: 14px;
            background: var(--p-600);
            color: #fff;
            cursor: pointer;
            box-shadow: 0 10px 20px -8px rgba(37, 99, 235, .7);
            transition: transform .25s ease, background .25s ease;
        }

        .d-fab svg {
            transition: transform .3s ease;
        }

        .d-fab-wrap:hover .d-fab,
        .d-fab-wrap:focus-within .d-fab {
            background: var(--p-700);
        }

        .d-fab-wrap:hover .d-fab svg,
        .d-fab-wrap:focus-within .d-fab svg {
            transform: rotate(90deg);
        }

        .d-menu {
            position: absolute;
            right: 0;
            top: 54px;
            z-index: 20;
            min-width: 220px;
            padding: 8px;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 16px;
            box-shadow: 0 18px 40px -16px rgba(15, 27, 61, .35);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-6px);
            transition: all .2s ease;
        }

        .d-fab-wrap:hover .d-menu,
        .d-fab-wrap:focus-within .d-menu {
            opacity: 1;
            visibility: visible;
            transform: none;
        }

        .d-menu a {
            display: block;
            padding: 10px 12px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            color: var(--ink);
            transition: background .2s;
        }

        .d-menu a:hover {
            background: var(--p-50);
            color: var(--p-700);
        }

        /* --- tile KPI (gaya kartu aplikasi) --- */
        .d-tiles {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        @media (min-width: 1100px) {
            .d-tiles {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }
        }

        @media (max-width: 520px) {
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
            color: #94a3b8;
        }

        .d-tile-note {
            margin-top: 6px;
            font-size: 11.5px;
            color: var(--muted);
        }

        .up {
            color: #059669;
        }

        .down {
            color: #e11d48;
        }

        /* --- warna pastel tile KPI (satu keluarga dengan tema biru) --- */
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

        /* lingkaran lembut sebagai hiasan di dasar tile */
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
        .d-tile>.d-tile-ico {
            position: relative;
            z-index: 1;
        }

        .d-tile-dot {
            z-index: 1;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .65);
        }

        /* teks catatan di atas latar pastel dibuat sedikit lebih pekat agar tetap terbaca */
        .d-tile .d-tile-note {
            color: #55637f;
        }

        .d-tile .d-tile-note.up {
            color: #047857;
        }

        .d-tile .d-tile-note.down {
            color: #be123c;
        }

        .d-tile-val small {
            color: #7f8cab;
        }

        /* --- notifikasi --- */
        .d-alert {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 18px;
            border-radius: 16px;
            background: #fff8e6;
            border: 1px solid #fde7a8;
            color: #7a5200;
            font-size: 13px;
            line-height: 1.7;
        }

        .d-alert a {
            font-weight: 700;
            text-decoration: underline;
            text-underline-offset: 2px;
        }

        /* --- grid utama 3 kolom (3 : 6 : 3) --- */
        .d-grid3 {
            display: grid;
            gap: 20px;
            grid-template-columns: minmax(0, 1fr);
            align-items: start;
        }

        @media (min-width: 1280px) {
            .d-grid3 {
                grid-template-columns: minmax(0, 3fr) minmax(0, 6fr) minmax(0, 3fr);
            }
        }

        .d-stack {
            display: flex;
            flex-direction: column;
            gap: 20px;
            min-width: 0;
        }

        .d-grid4 {
            display: grid;
            gap: 20px;
            grid-template-columns: minmax(0, 1fr);
        }

        @media (min-width: 768px) {
            .d-grid4 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 1280px) {
            .d-grid4 {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }
        }

        /* --- daftar (gaya "Environments") --- */
        .d-list-head {
            display: flex;
            gap: 14px;
            padding: 10px 4px;
            font-size: 12px;
            font-weight: 600;
            color: var(--muted);
            border-bottom: 1px solid var(--line);
        }

        .d-row {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 4px;
            border-bottom: 1px solid var(--line);
            transition: background .2s, padding .2s;
        }

        .d-row:hover {
            background: #f7f9ff;
            padding-left: 8px;
        }

        .d-row:last-child {
            border-bottom: 0;
        }

        .d-dot {
            flex-shrink: 0;
            width: 9px;
            height: 9px;
            border-radius: 9999px;
            box-shadow: 0 0 0 4px rgba(148, 163, 184, .18);
        }

        .d-ext {
            flex-shrink: 0;
            color: #94a3b8;
            transition: color .2s, transform .2s;
        }

        .d-row:hover .d-ext {
            color: var(--p-600);
            transform: translate(2px, -2px);
        }

        .d-btn-amber {
            display: block;
            width: 100%;
            margin-top: 14px;
            padding: 12px 14px;
            border-radius: 12px;
            background: var(--accent);
            color: #fff;
            font-size: 13.5px;
            font-weight: 700;
            text-align: center;
            box-shadow: 0 10px 18px -10px rgba(245, 184, 46, .9);
            transition: filter .2s, transform .2s;
        }

        .d-btn-amber:hover {
            filter: brightness(.96);
            transform: translateY(-1px);
        }

        /* --- area daftar yang bisa di-scroll --- */
        .d-scroll {
            max-height: 400px;
            overflow-y: auto;
            overscroll-behavior: contain;
            scroll-behavior: smooth;
            margin-right: -8px;
            padding-right: 8px;
            scrollbar-width: thin;
            scrollbar-color: var(--p-200) transparent;
        }

        .d-scroll::-webkit-scrollbar {
            width: 6px;
        }

        .d-scroll::-webkit-scrollbar-track {
            background: transparent;
        }

        .d-scroll::-webkit-scrollbar-thumb {
            background: var(--p-200);
            border-radius: 9999px;
        }

        .d-scroll::-webkit-scrollbar-thumb:hover {
            background: var(--p-500);
        }

        /* --- tabel (gaya "Access Requests") --- */
        .d-table-h,
        .d-tr {
            display: grid;
            grid-template-columns: 76px minmax(0, 1.6fr) minmax(0, 1fr) 96px;
            align-items: center;
            gap: 12px;
            padding: 12px 6px;
        }

        .d-table-h {
            font-size: 12px;
            font-weight: 600;
            color: var(--muted);
            border-bottom: 1px solid var(--line);
        }

        .d-tr {
            border-bottom: 1px solid var(--line);
            transition: background .2s;
        }

        .d-tr:last-child {
            border-bottom: 0;
        }

        .d-tr:hover {
            background: #f7f9ff;
        }

        .d-tr .nm {
            font-size: 13px;
            font-weight: 600;
            color: var(--ink);
        }

        .d-tr .sub {
            margin-top: 2px;
            font-size: 11.5px;
            color: var(--muted);
        }

        .d-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 8px;
            font-size: 11.5px;
            font-weight: 700;
            text-align: center;
            white-space: nowrap;
        }

        .d-tr .right {
            text-align: right;
        }

        @media (max-width: 640px) {
            .d-table-h {
                display: none;
            }

            .d-tr {
                grid-template-columns: minmax(0, 1fr) auto;
            }

            .d-tr .c-id,
            .d-tr .c-user {
                display: none;
            }
        }

        .d-ic {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 11px;
            font-size: 15px;
        }

        /* --- ring (gaya "Audit") --- */
        .d-ring {
            position: relative;
            width: 190px;
            height: 190px;
            margin: 6px auto 4px;
        }

        .d-ring svg {
            width: 100%;
            height: 100%;
            transform: rotate(-90deg);
        }

        .d-ring .track {
            stroke: var(--p-50);
        }

        .d-ring .bar {
            stroke: var(--p-600);
            stroke-linecap: round;
            animation: d-ring 1.2s ease-out both;
        }

        @keyframes d-ring {
            from {
                stroke-dasharray: 0 528;
            }
        }

        .d-ring-in {
            position: absolute;
            inset: 22px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 9999px;
            background: var(--p-50);
        }

        .d-ring-in b {
            font-size: 30px;
            font-weight: 700;
            letter-spacing: -.02em;
            color: var(--ink);
        }

        .d-ring-in span {
            margin-top: 2px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: .12em;
            color: var(--muted);
            text-transform: uppercase;
        }

        .d-stat {
            margin-top: 18px;
        }

        .d-stat .n {
            font-size: 26px;
            font-weight: 600;
            letter-spacing: -.02em;
            color: var(--ink);
        }

        .d-stat .l {
            margin-top: 1px;
            font-size: 13px;
            color: var(--muted);
        }

        .d-track {
            height: 6px;
            margin-top: 8px;
            overflow: hidden;
            border-radius: 9999px;
            background: #eef2fb;
        }

        .d-fill {
            height: 100%;
            border-radius: 9999px;
            animation: d-grow 1s ease-out both;
        }

        @keyframes d-grow {
            from {
                width: 0 !important;
            }
        }

        /* --- petugas --- */
        .d-pt {
            margin-top: 14px;
        }

        .d-pt-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 13px;
        }

        /* --- doughnut center --- */
        .d-donut {
            position: relative;
            margin: 8px auto 0;
            height: 220px;
            max-width: 280px;
        }

        .d-donut-in {
            pointer-events: none;
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding-bottom: 38px;
        }

        .d-empty {
            display: flex;
            height: 220px;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-align: center;
            font-size: 13px;
            color: #94a3b8;
        }

        .d-empty a {
            font-weight: 700;
            color: var(--p-600);
        }
    </style>

    <div class="d-wrap">

        {{-- ================= JUDUL HALAMAN ================= --}}
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">
                        {{ $salam }}, <b>{{ \Illuminate\Support\Str::of(auth()->user()->name)->before(' ') }}</b> 👋
                    </h1>
                    <p class="d-crumb">{{ $tanggalHariIni }} &nbsp;›&nbsp; Dashboard</p>
                    <p class="d-desc">
                        Ringkasan monitoring dan evaluasi BGTK Provinsi NTB:
                        <strong>{{ $totalInstrumen }}</strong> pengisian instrumen,
                        <strong>{{ $totalWawancara }}</strong> wawancara, dan
                        <strong>{{ $sekolahTerjangkau }}</strong> sekolah sudah memiliki data monev.
                    </p>
                </div>

                <div class="d-fab-wrap">
                    <button type="button" class="d-fab" aria-label="Tambah data">
                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"
                            stroke-linecap="round">
                            <path d="M12 5v14M5 12h14" />
                        </svg>
                    </button>
                    <div class="d-menu">
                        <a href="{{ route('instrumen.index') }}">+ Isi Instrumen</a>
                        <a href="{{ route('wawancara.index') }}">+ Isi Wawancara</a>
                        <a href="{{ route('cetak-gabungan.index') }}">Gabung &amp; Cetak PDF</a>
                    </div>
                </div>
            </div>
        </section>

        {{-- ================= KPI ================= --}}
        <div class="d-tiles">

            {{-- Instrumen --}}
            <div class="d-tile t-blue">
                <svg class="d-tile-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="d-tile-dot"></span>
                <span class="d-tile-ico" style="color: var(--p-600)">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
                    </svg>
                </span>
                <p class="d-tile-label">Pengisian Instrumen</p>
                <p class="d-tile-val">{{ $totalInstrumen }}</p>
                <p class="d-tile-note {{ $delta($bulanInstrumen) >= 0 ? 'up' : 'down' }}">
                    <b>{{ $delta($bulanInstrumen) >= 0 ? '▲' : '▼' }} {{ abs($delta($bulanInstrumen)) }}</b>
                    dibanding bulan lalu · {{ $bulanInstrumen['ini'] }} bulan ini
                </p>
            </div>

            {{-- Wawancara --}}
            <div class="d-tile t-mint">
                <svg class="d-tile-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="d-tile-dot" style="background:#10b981"></span>
                <span class="d-tile-ico" style="color:#059669">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 10h8M8 14h5M6 20l-3 1 1-3a8 8 0 111.5 1.5L6 20z" />
                    </svg>
                </span>
                <p class="d-tile-label">Lembar Wawancara</p>
                <p class="d-tile-val">{{ $totalWawancara }}</p>
                <p class="d-tile-note {{ $delta($bulanWawancara) >= 0 ? 'up' : 'down' }}">
                    <b>{{ $delta($bulanWawancara) >= 0 ? '▲' : '▼' }} {{ abs($delta($bulanWawancara)) }}</b>
                    dibanding bulan lalu · {{ $bulanWawancara['ini'] }} bulan ini
                </p>
            </div>

            {{-- Sekolah --}}
            <div class="d-tile t-violet">
                <svg class="d-tile-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="d-tile-dot" style="background:#8b5cf6"></span>
                <span class="d-tile-ico" style="color:#7c3aed">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6" />
                    </svg>
                </span>
                <p class="d-tile-label">Sekolah Terjangkau</p>
                <p class="d-tile-val">{{ $sekolahTerjangkau }}<small> / {{ $totalSekolah }}</small></p>
                <p class="d-tile-note">{{ $pctSekolah }}% sekolah sudah memiliki data monev</p>
            </div>

            {{-- Tindak lanjut --}}
            <div class="d-tile t-amber">
                <svg class="d-tile-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="d-tile-dot" style="background: {{ $tlTerlambat > 0 ? '#f43f5e' : 'var(--accent)' }}"></span>
                <span class="d-tile-ico" style="color:#d99a0b">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
                <p class="d-tile-label">Tindak Lanjut Selesai</p>
                <p class="d-tile-val">{{ $tlSelesai }}<small> / {{ $tlTotal }}</small></p>
                <p class="d-tile-note {{ $tlTerlambat > 0 ? 'down' : '' }}" @if($tlTerlambat > 0) style="font-weight:700"
                @endif>
                    {{ $tlTerlambat > 0 ? $tlTerlambat . ' melewati target waktu' : 'Tidak ada yang terlambat' }}
                </p>
            </div>
        </div>

        {{-- ================= PERHATIAN ================= --}}
        @if ($perluDiperbarui > 0)
            <div class="d-alert">
                <span style="font-size:18px">💡</span>
                <p>
                    <strong>{{ $perluDiperbarui }} sekolah</strong> sudah memiliki data instrumen/wawancara,
                    tetapi statusnya masih <strong>"Belum Dimonitor"</strong>.
                    <a href="{{ route('sekolah.index', ['status_monitoring' => 'Belum Dimonitor']) }}">Perbarui di Data Sekolah
                        →</a>
                </p>
            </div>
        @endif

        {{-- ================= 3 KOLOM: TINDAK LANJUT | AKTIVITAS + TREN | CAPAIAN ================= --}}
        <div class="d-grid3">

            {{-- KIRI: Tindak lanjut mendesak --}}
            <div class="d-card">
                <h2 class="d-card-h">Perlu Ditindak Lanjuti</h2>
                <p class="d-card-s">Diurutkan berdasarkan target selesai.</p>

                <div class="d-list-head" style="margin-top:14px">
                    <span style="width:34px">No.</span>
                    <span>Tindak Lanjut</span>
                </div>
                <div class="d-scroll">
                    @forelse ($tlMendesak as $i => $tl)
                        @php
                            $terlambat = $tl->target_selesai && $tl->target_selesai->isPast();
                            $dot = $tl->status === 'Dalam Proses' ? '#3b82f6' : '#f5b82e';
                        @endphp
                        <a href="{{ route('tindak-lanjut.show', $tl) }}" class="d-row">
                            <span class="d-dot" style="background: {{ $dot }}"></span>
                            <div style="min-width:0;flex:1">
                                <p class="truncate" style="font-size:13px;font-weight:600;color:var(--ink)">{{ $i + 1 }}.
                                    {{ $tl->judul_tindak_lanjut }}</p>
                                <p class="truncate" style="margin-top:2px;font-size:11.5px;color:var(--muted)">
                                    {{ $tl->sekolah->nama_sekolah ?? 'Sekolah tidak tersedia' }}</p>
                                <div
                                    style="margin-top:6px;display:flex;flex-wrap:wrap;align-items:center;gap:6px;font-size:11px">
                                    <span class="d-badge"
                                        style="padding:2px 8px;{{ $tl->status === 'Dalam Proses' ? 'background:#dbeafe;color:#1d4ed8' : 'background:#f1f5f9;color:#475569' }}">{{ $tl->status }}</span>
                                    <span class="{{ $terlambat ? 'down' : '' }}"
                                        style="{{ $terlambat ? 'font-weight:700' : 'color:#94a3b8' }}">
                                        {{ $tl->target_selesai ? ($terlambat ? 'Terlambat · ' : 'Target · ') . $tl->target_selesai->format('d/m/Y') : 'Tanpa target' }}
                                    </span>
                                </div>
                            </div>
                            <svg class="d-ext" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6M15 3h6v6M10 14L21 3" />
                            </svg>
                        </a>
                    @empty
                        <div style="padding:40px 0;text-align:center;font-size:13px;color:#94a3b8">🎉 Tidak ada tindak lanjut
                            yang tertunda.</div>
                    @endforelse
                </div>

                <a href="{{ route('tindak-lanjut.create') }}" class="d-btn-amber">+ Tambah tindak lanjut</a>
            </div>

            {{-- TENGAH: Aktivitas + Tren --}}
            <div class="d-stack">
                <div class="d-card">
                    <div class="d-head" style="margin-bottom:6px">
                        <div>
                            <h2 class="d-card-h">Aktivitas Terbaru</h2>
                            <p class="d-card-s">Pengisian instrumen dan wawancara terakhir.</p>
                        </div>
                        <a href="{{ route('instrumen.index') }}"
                            style="font-size:12.5px;font-weight:700;color:var(--p-600)">Lihat semua →</a>
                    </div>

                    <div class="d-table-h">
                        <span>Tipe</span><span>Nama</span><span>Petugas</span><span class="right"
                            style="text-align:right">Nilai</span>
                    </div>

                    @forelse ($terbaru as $a)
                        @php $meta = $jenisMeta[$a['jenis']] ?? ['solid' => '#64748b', 'soft' => '#f1f5f9', 'text' => '#475569']; @endphp
                        <a href="{{ $a['url'] }}" class="d-tr">
                            <span class="c-id">
                                <span class="d-ic" style="background: {{ $meta['soft'] }}; color: {{ $meta['text'] }}">
                                    {{ $a['tipe'] === 'Wawancara' ? '💬' : '📋' }}
                                </span>
                            </span>

                            <div style="min-width:0">
                                <p class="nm truncate">{{ $a['nama'] }}</p>
                                <p class="sub truncate">{{ $a['tipe'] }} {{ $a['jenis'] }} ·
                                    {{ $a['dibuat']?->locale('id')->diffForHumans() }}</p>
                            </div>

                            <span class="c-user truncate" style="font-size:12.5px;color:#475569">
                                @if ($a['petugas'] !== '') {{ $a['petugas'] }} @else - @endif
                            </span>

                            <div class="right">
                                @if ($a['nilai'] !== null)
                                    <span class="d-badge"
                                        style="background: {{ $meta['soft'] }}; color: {{ $meta['text'] }}">{{ number_format($a['nilai'], 1, ',', '.') }}%</span>
                                @else
                                    <span class="d-badge"
                                        style="background: {{ $meta['soft'] }}; color: {{ $meta['text'] }}">{{ $a['jenis'] }}</span>
                                @endif
                            </div>
                        </a>
                    @empty
                        <div style="padding:48px 0;text-align:center;font-size:13px;color:#94a3b8">Belum ada aktivitas monev.
                        </div>
                    @endforelse
                </div>
                <div class="d-card">
                    <div class="d-head" style="margin-bottom:0">
                        <div>
                            <h2 class="d-card-h">Tren Aktivitas Monev</h2>
                            <p class="d-card-s">Jumlah pengisian instrumen dan wawancara 6 bulan terakhir.</p>
                        </div>
                    </div>
                    <div style="height:300px;margin-top:10px"><canvas id="trenChart"></canvas></div>
                </div>
            </div>

            {{-- KANAN: Capaian ring + progres + petugas --}}
            <div class="d-stack">

                <div class="d-card">
                    @php
                        $ringPct = max(0, min(100, (float) ($rataCapaian ?? 0)));
                        $ringLen = round($ringPct * 5.278, 1);
                    @endphp
                    <div class="d-head" style="margin-bottom:0">
                        <h2 class="d-card-h">Capaian</h2>
                        <span class="d-pill">Rata-rata</span>
                    </div>

                    <div class="d-ring">
                        <svg viewBox="0 0 200 200">
                            <circle class="track" cx="100" cy="100" r="84" fill="none" stroke-width="12" />
                            <circle class="bar" cx="100" cy="100" r="84" fill="none" stroke-width="12"
                                stroke-dasharray="{{ $ringLen }} 528" />
                        </svg>
                        <div class="d-ring-in">
                            <b>{{ $rataCapaian !== null ? number_format($rataCapaian, 1, ',', '.') . '%' : '-' }}</b>
                            <span>Capaian</span>
                        </div>
                    </div>

                    <div class="d-stat">
                        <p class="n">{{ $pctSekolah }} %</p>
                        <p class="l">Sekolah Terjangkau</p>
                        <div class="d-track">
                            <div class="d-fill" style="width: {{ $pctSekolah }}%; background:#8b5cf6"></div>
                        </div>
                    </div>

                    <div class="d-stat">
                        <p class="n">{{ $pctTl }} %</p>
                        <p class="l">Tindak Lanjut Selesai</p>
                        <div class="d-track">
                            <div class="d-fill" style="width: {{ $pctTl }}%; background:#38bdf8"></div>
                        </div>
                    </div>
                </div>

                <div class="d-card">
                    <h2 class="d-card-h">Petugas Monev Teraktif</h2>
                    <p class="d-card-s">Berdasarkan jumlah pengisian.</p>

                    @php $maks = max($petugasTeraktif->max('jumlah') ?? 0, 1); @endphp
                    <div style="margin-top:6px">
                        @forelse ($petugasTeraktif as $i => $p)
                            <div class="d-pt">
                                <div class="d-pt-top">
                                    <span class="truncate" style="font-weight:600;color:#334155">{{ $i + 1 }}.
                                        {{ $p['nama'] }}</span>
                                    <span
                                        style="margin-left:12px;flex-shrink:0;font-weight:800;color:var(--ink)">{{ $p['jumlah'] }}</span>
                                </div>
                                <div class="d-track" style="height:7px">
                                    <div class="d-fill"
                                        style="width: {{ ($p['jumlah'] / $maks) * 100 }}%; background: linear-gradient(90deg, #3b82f6, #1d4ed8)">
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p style="padding:24px 0;text-align:center;font-size:13px;color:#94a3b8">Belum ada data petugas.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        {{-- ================= CHART RINCIAN ================= --}}
        <div class="d-grid4">

            <div class="d-card">
                <div class="d-head">
                    <div>
                        <h2 class="d-card-h">Rata-rata Capaian</h2>
                        <p class="d-card-s">Nilai rata-rata per instrumen (%).</p>
                    </div>
                    <span class="d-pill" style="font-weight:800">
                        {{ $rataCapaian !== null ? number_format($rataCapaian, 1, ',', '.') . '%' : '-' }}
                    </span>
                </div>
                <div style="height:240px"><canvas id="capaianChart"></canvas></div>
            </div>

            <div class="d-card">
                <h2 class="d-card-h">Wawancara per Jenis</h2>
                <p class="d-card-s">Jumlah lembar wawancara yang telah diisi.</p>
                <div style="height:240px;margin-top:14px"><canvas id="wawancaraChart"></canvas></div>
            </div>

            <div class="d-card">
                <h2 class="d-card-h">Komposisi Instrumen</h2>
                <p class="d-card-s">Pengisian berdasarkan jenis instrumen.</p>

                @if ($totalInstrumen > 0)
                    <div class="d-donut">
                        <canvas id="komposisiChart"></canvas>
                        <div class="d-donut-in">
                            <span style="font-size:30px;font-weight:800;color:var(--ink)">{{ $totalInstrumen }}</span>
                            <span style="font-size:12px;color:var(--muted)">Pengisian</span>
                        </div>
                    </div>
                @else
                    <div class="d-empty">Belum ada pengisian instrumen.</div>
                @endif
            </div>

            <div class="d-card">
                <h2 class="d-card-h">Status Tindak Lanjut</h2>
                <p class="d-card-s">Progres rencana tindak lanjut hasil monev.</p>

                @if ($tlTotal > 0)
                    <div class="d-donut">
                        <canvas id="tlChart"></canvas>
                        <div class="d-donut-in">
                            <span style="font-size:30px;font-weight:800;color:var(--p-600)">{{ $pctTl }}%</span>
                            <span style="font-size:12px;color:var(--muted)">Selesai</span>
                        </div>
                    </div>
                @else
                    <div class="d-empty">
                        Belum ada rencana tindak lanjut.
                        <a href="{{ route('tindak-lanjut.create') }}">+ Tambah tindak lanjut</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- ================= CHART.JS ================= --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const D = @json($chart);

            const FONT = "'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif";
            Chart.defaults.font.family = FONT;
            Chart.defaults.color = '#64748b';
            Chart.defaults.plugins.tooltip.backgroundColor = '#0f1b3d';
            Chart.defaults.plugins.tooltip.cornerRadius = 10;
            Chart.defaults.plugins.tooltip.padding = 10;

            const grid = { color: '#eef2f7' };
            const legendBawah = {
                position: 'bottom',
                labels: { usePointStyle: true, pointStyle: 'circle', padding: 16, font: { size: 12 } }
            };
            const buat = (id, config) => {
                const el = document.getElementById(id);
                if (el) new Chart(el, config);
            };

            // Angka di atas batang (seperti pada desain)
            const angkaBatang = {
                id: 'angkaBatang',
                afterDatasetsDraw(chart) {
                    const { ctx } = chart;
                    ctx.save();
                    ctx.font = '600 11px ' + FONT;
                    ctx.fillStyle = '#475569';
                    ctx.textAlign = 'center';
                    chart.data.datasets.forEach((ds, i) => {
                        chart.getDatasetMeta(i).data.forEach((bar, j) => {
                            const v = ds.data[j];
                            if (v !== null && v !== undefined) ctx.fillText(v, bar.x, bar.y - 6);
                        });
                    });
                    ctx.restore();
                }
            };

            // Tren (grafik garis dengan area, titik berlubang putih)
            buat('trenChart', {
                type: 'line',
                data: {
                    labels: D.bulan,
                    datasets: [
                        {
                            label: 'Instrumen',
                            data: D.trenInstrumen,
                            borderColor: '#2563eb',
                            backgroundColor: 'rgba(37, 99, 235, .14)',
                            fill: true,
                            tension: 0.4,
                            borderWidth: 3,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            pointBackgroundColor: '#fff',
                            pointBorderColor: '#2563eb',
                            pointBorderWidth: 2
                        },
                        {
                            label: 'Wawancara',
                            data: D.trenWawancara,
                            borderColor: '#10b981',
                            backgroundColor: 'rgba(16, 185, 129, .14)',
                            fill: true,
                            tension: 0.4,
                            borderWidth: 3,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            pointBackgroundColor: '#fff',
                            pointBorderColor: '#10b981',
                            pointBorderWidth: 2
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: { mode: 'index', intersect: false },
                    plugins: {
                        legend: {
                            position: 'top',
                            align: 'end',
                            labels: {
                                usePointStyle: true,
                                pointStyle: 'circle',
                                padding: 14,
                                font: { size: 12 },
                                generateLabels(chart) {
                                    return chart.data.datasets.map((ds, i) => ({
                                        text: ds.label,
                                        fillStyle: '#fff',
                                        strokeStyle: ds.borderColor,
                                        lineWidth: 2,
                                        pointStyle: 'circle',
                                        hidden: !chart.isDatasetVisible(i),
                                        datasetIndex: i,
                                        fontColor: '#64748b'
                                    }));
                                }
                            }
                        }
                    },
                    scales: {
                        y: { beginAtZero: true, grace: '6%', ticks: { precision: 0, stepSize: 2 }, grid },
                        x: { grid: { display: false } }
                    }
                }
            });

            // Komposisi instrumen
            buat('komposisiChart', {
                type: 'doughnut',
                data: { labels: D.jenis, datasets: [{ data: D.instrumen, backgroundColor: D.warna, borderWidth: 3, borderColor: '#fff', hoverOffset: 6 }] },
                options: { responsive: true, maintainAspectRatio: false, cutout: '70%', plugins: { legend: legendBawah } }
            });

            // Capaian per instrumen
            buat('capaianChart', {
                type: 'bar',
                data: { labels: D.jenis, datasets: [{ data: D.capaian, backgroundColor: D.warna, borderRadius: 8, borderSkipped: false, barThickness: 18 }] },
                options: {
                    indexAxis: 'y', responsive: true, maintainAspectRatio: false,
                    plugins: { legend: { display: false }, tooltip: { callbacks: { label: c => c.raw === null ? 'Belum ada data' : c.raw + '%' } } },
                    scales: { x: { min: 0, max: 100, ticks: { callback: v => v + '%' }, grid }, y: { grid: { display: false } } }
                }
            });

            // Wawancara per jenis
            buat('wawancaraChart', {
                type: 'bar',
                data: { labels: D.jenis, datasets: [{ data: D.wawancara, backgroundColor: D.warna, borderRadius: 8, borderSkipped: false, maxBarThickness: 34 }] },
                options: {
                    responsive: true, maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true, grace: '14%', ticks: { precision: 0 }, grid }, x: { grid: { display: false }, ticks: { font: { size: 11 } } } }
                },
                plugins: [angkaBatang]
            });

            // Tindak lanjut
            buat('tlChart', {
                type: 'doughnut',
                data: { labels: ['Belum Dimulai', 'Dalam Proses', 'Selesai'], datasets: [{ data: D.tl, backgroundColor: ['#cbd5e1', '#3b82f6', '#10b981'], borderWidth: 3, borderColor: '#fff', hoverOffset: 6 }] },
                options: { responsive: true, maintainAspectRatio: false, cutout: '70%', plugins: { legend: legendBawah } }
            });
        });
    </script>
@endsection