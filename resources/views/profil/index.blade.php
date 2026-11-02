@extends('layouts.app')

@section('title', 'Profil Saya')

@section('page-title', 'Profil Saya')

@section('content')

    @php
        $user = auth()->user();
        $hakAkses = $user->isAdmin() ? 'Administrator' : 'Petugas Monev';

        // Daftar informasi pengguna: [label, nilai, gaya nilai, ikon (path SVG)]
        $info = [
            [
                'Nama Lengkap',
                $user->name,
                '',
                'M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z',
            ],
            [
                'Username',
                $user->username ?: '-',
                '',
                'M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207',
            ],
            [
                'NIP',
                $user->nip ?: '-',
                'mono',
                'M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z',
            ],
            [
                'Email',
                $user->email ?: '-',
                'break',
                'M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75',
            ],
            [
                'Hak Akses',
                $hakAkses,
                '',
                'M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z',
            ],
            [
                'ID Pengguna',
                $user->id,
                '',
                'M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5',
            ],
        ];
    @endphp

    <style>
        /* ===================== TOKEN WARNA (sama dengan dashboard) ===================== */
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
            max-width: 1024px;
            margin: 0 auto;
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

        /* --- judul halaman --- */
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

        /* --- tombol --- */
        .d-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex-shrink: 0;
            height: 46px;
            padding: 0 18px;
            border: 0;
            border-radius: 14px;
            background: var(--p-600);
            color: #fff;
            font-family: inherit;
            font-size: 13.5px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 10px 20px -8px rgba(37, 99, 235, .7);
            transition: transform .25s ease, background .25s ease;
        }

        .d-btn:hover {
            background: var(--p-700);
            transform: translateY(-1px);
        }

        .d-btn svg {
            transition: transform .3s ease;
        }

        .d-btn:hover svg {
            transform: translateX(3px);
        }

        /* --- banner profil (gaya tile, versi biru pekat) --- */
        .d-banner {
            position: relative;
            display: flex;
            align-items: center;
            gap: 22px;
            padding: 32px 30px;
            overflow: hidden;
            background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 55%, #3b82f6 100%);
        }

        @media (max-width: 560px) {
            .d-banner {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        .d-banner::before,
        .d-banner::after {
            content: '';
            position: absolute;
            z-index: 0;
            border-radius: 9999px;
            pointer-events: none;
        }

        .d-banner::before {
            right: -40px;
            bottom: -90px;
            width: 240px;
            height: 240px;
            background: rgba(255, 255, 255, .10);
        }

        .d-banner::after {
            right: 170px;
            bottom: -80px;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, .07);
        }

        .d-banner-clip {
            position: absolute;
            z-index: 1;
            right: 30px;
            top: 14px;
            color: rgba(255, 255, 255, .45);
        }

        .d-banner-dot {
            position: absolute;
            z-index: 1;
            right: 14px;
            top: 16px;
            width: 7px;
            height: 7px;
            border-radius: 9999px;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
        }

        .d-avatar {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 84px;
            height: 84px;
            border-radius: 24px;
            background: #fff;
            color: var(--p-600);
            font-size: 34px;
            font-weight: 800;
            box-shadow: 0 14px 26px -12px rgba(15, 27, 61, .55);
        }

        .d-banner-body {
            position: relative;
            z-index: 1;
            min-width: 0;
            flex: 1;
        }

        .d-banner-name {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -.02em;
            line-height: 1.25;
            color: #fff;
            overflow-wrap: anywhere;
        }

        .d-banner-role {
            margin-top: 6px;
            font-size: 13px;
            color: #dbe7fe;
        }

        .d-status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 14px;
            padding: 6px 12px;
            border-radius: 9999px;
            font-size: 11.5px;
            font-weight: 700;
        }

        .d-status i {
            width: 6px;
            height: 6px;
            border-radius: 9999px;
        }

        .d-status.on {
            background: #d1fae5;
            color: #047857;
        }

        .d-status.on i {
            background: #10b981;
        }

        .d-status.off {
            background: #ffe4e6;
            color: #be123c;
        }

        .d-status.off i {
            background: #f43f5e;
        }

        /* --- informasi pengguna --- */
        .d-info-wrap {
            padding: 22px 22px 24px;
        }

        .d-info-grid {
            display: grid;
            gap: 14px;
            margin-top: 18px;
            grid-template-columns: minmax(0, 1fr);
        }

        @media (min-width: 640px) {
            .d-info-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        .d-info {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 16px;
            border: 1px solid var(--line);
            border-radius: 16px;
            background: #fff;
            transition: transform .3s cubic-bezier(.22, 1, .36, 1), box-shadow .3s cubic-bezier(.22, 1, .36, 1), background .2s;
        }

        .d-info:hover {
            background: #f7f9ff;
            transform: translateY(-2px);
            box-shadow: 0 14px 26px -20px rgba(37, 99, 235, .6);
        }

        .d-info-ico {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 44px;
            height: 44px;
            border-radius: 14px;
            background: var(--p-50);
            color: var(--p-600);
        }

        .d-info-txt {
            min-width: 0;
        }

        .d-info-l {
            font-size: 12px;
            font-weight: 600;
            color: var(--muted);
        }

        .d-info-v {
            margin-top: 2px;
            font-size: 13.5px;
            font-weight: 700;
            color: var(--ink);
            overflow-wrap: anywhere;
        }

        .d-info-v.mono {
            font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace;
            font-size: 13px;
        }

        /* --- keamanan akun --- */
        .d-note {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-top: 18px;
            padding: 14px 18px;
            border-radius: 16px;
            background: var(--p-50);
            border: 1px solid var(--p-100);
            color: var(--p-800);
            font-size: 13px;
            line-height: 1.7;
        }

        .d-note strong {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: var(--ink);
        }

        .d-note p {
            color: #3b4a73;
        }

        .d-note-ico {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 32px;
            height: 32px;
            border-radius: 10px;
            background: #fff;
            color: var(--p-600);
        }

        /* --- footer kartu --- */
        .d-foot {
            display: flex;
            justify-content: flex-end;
            padding: 16px 22px;
            border-top: 1px solid var(--line);
            background: #f8faff;
        }
    </style>

    <div class="d-wrap">

        {{-- ================= JUDUL HALAMAN ================= --}}
        <section>
            <h1 class="d-h1">Profil <b>Saya</b></h1>
            <p class="d-crumb">Dashboard &nbsp;›&nbsp; Profil Saya</p>
            <p class="d-desc">Informasi akun pengguna yang sedang masuk ke sistem BGTK Monev.</p>
        </section>

        {{-- ================= KARTU PROFIL ================= --}}
        <div class="d-card">

            {{-- Banner --}}
            <div class="d-banner">
                <svg class="d-banner-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="d-banner-dot"></span>

                <div class="d-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>

                <div class="d-banner-body">
                    <h2 class="d-banner-name">{{ $user->name }}</h2>
                    <p class="d-banner-role">{{ $hakAkses }}</p>

                    @if ($user->is_active)
                        <span class="d-status on"><i></i>Akun Aktif</span>
                    @else
                        <span class="d-status off"><i></i>Akun Nonaktif</span>
                    @endif
                </div>
            </div>

            {{-- Detail profil --}}
            <div class="d-info-wrap">

                <h3 class="d-card-h">Informasi Pengguna</h3>
                <p class="d-card-s">Berikut adalah informasi akun yang terdaftar pada sistem.</p>

                <div class="d-info-grid">
                    @foreach ($info as [$label, $nilai, $gaya, $ikon])
                        <div class="d-info">
                            <span class="d-info-ico">
                                <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="{{ $ikon }}" />
                                </svg>
                            </span>

                            <div class="d-info-txt">
                                <p class="d-info-l">{{ $label }}</p>
                                <p class="d-info-v {{ $gaya === 'mono' ? 'mono' : '' }}">{{ $nilai }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Keamanan akun --}}
                <div class="d-note">
                    <span class="d-note-ico">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="12" height="10" x="6" y="10" rx="2" />
                            <path d="M8 10V7a4 4 0 018 0v3" />
                        </svg>
                    </span>

                    <div>
                        <strong>Keamanan Akun</strong>
                        <p>
                            Jangan membagikan password kepada orang lain.
                            Jika memerlukan perubahan data akun, hubungi Administrator sistem.
                        </p>
                    </div>
                </div>

            </div>

            {{-- Footer --}}
            <div class="d-foot">
                <a href="{{ route('dashboard') }}" class="d-btn">
                    Kembali ke Dashboard
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>

        </div>

    </div>

@endsection