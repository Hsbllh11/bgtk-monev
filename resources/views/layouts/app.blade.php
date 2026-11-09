<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard Monev BGTK NTB')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* =====================================================================
           TOKEN WARNA — primary: BLUE
           ===================================================================== */
        :root {
            --p-50: #eff4ff;
            --p-100: #dbe7fe;
            --p-200: #bfd4fb;
            --p-500: #3b82f6;
            --p-600: #2563eb;
            --p-700: #1d4ed8;
            --p-800: #1e40af;
            --p-900: #1e3a8a;
            --accent: #f5b82e;
            --ink: #0f1b3d;
            --muted: #64748b;
            --line: #e6ebf5;
            --page: #1e40af;

            /* SKALA TIPOGRAFI (dipakai sidebar, topbar, dan dashboard) */
            --fs-xs: 12px;
            --fs-sm: 13px;
            --fs-base: 14px;
            --fs-md: 16px;
            --fs-lg: 18px;
            --fs-xl: 28px;
            --fw-regular: 400;
            --fw-medium: 500;
            --fw-semibold: 600;
            --fw-bold: 700;

            /* easing yang dipakai bersama */
            --ease: cubic-bezier(.22, 1, .36, 1);
        }

        html,
        body {
            font-family: 'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif;
            background: var(--page);
        }

        /* semua elemen di sidebar & topbar mewarisi font yang sama */
        .sidebar,
        .sidebar *,
        .topbar,
        .topbar * {
            font-family: inherit;
        }

        /* logo di dalam kotak putih membulat */
        .brand-logo {
            display: flex;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            width: 52px;
            height: 52px;
            padding: 7px;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 8px 18px -8px rgba(15, 27, 61, .45);
            transition: transform .45s var(--ease);
        }

        .brand-logo:hover {
            transform: scale(1.05);
        }

        .brand-title {
            font-size: var(--fs-md);
            font-weight: var(--fw-bold);
            letter-spacing: -.01em;
            line-height: 1.2;
        }

        .brand-sub {
            margin-top: 2px;
            font-size: var(--fs-xs);
            font-weight: var(--fw-regular);
            line-height: 1.35;
            color: rgba(219, 231, 254, .75);
        }

        .top-title {
            font-size: var(--fs-lg);
            font-weight: var(--fw-bold);
            letter-spacing: -.01em;
            line-height: 1.25;
            color: var(--ink);
        }

        .top-sub {
            margin-top: 2px;
            font-size: var(--fs-sm);
            font-weight: var(--fw-regular);
            color: var(--muted);
        }

        .top-name {
            font-size: var(--fs-sm);
            font-weight: var(--fw-semibold);
            color: var(--ink);
        }

        .top-role {
            font-size: var(--fs-xs);
            font-weight: var(--fw-regular);
            color: var(--muted);
        }

        /* widget jam & cuaca di topbar */
        .top-widgets {
            display: none;
            align-items: center;
            gap: 14px;
        }

        @media (min-width: 1024px) {
            .top-widgets {
                display: flex;
            }
        }

        .top-chip {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 6px 12px 6px 8px;
            border: 1px solid var(--line);
            border-radius: 14px;
            background: var(--p-50);
        }

        .top-chip-ico {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border-radius: 11px;
            background: #fff;
            color: var(--p-600);
            font-size: 18px;
            line-height: 1;
            box-shadow: 0 6px 14px -8px rgba(37, 99, 235, .55);
        }

        .top-chip-main {
            font-size: var(--fs-sm);
            font-weight: var(--fw-bold);
            line-height: 1.25;
            color: var(--ink);
            white-space: nowrap;
            font-variant-numeric: tabular-nums;
        }

        .top-chip-sub {
            font-size: var(--fs-xs);
            font-weight: var(--fw-regular);
            line-height: 1.25;
            color: var(--muted);
            white-space: nowrap;
        }

        .top-divider {
            width: 1px;
            height: 32px;
            background: var(--line);
        }

        .weather-ico {
            transition: transform .45s var(--ease);
        }

        .top-chip:hover .weather-ico {
            transform: scale(1.12) rotate(-6deg);
        }

        /* =====================================================================
           SHELL — memenuhi seluruh layar, tanpa celah di sekeliling
           ===================================================================== */
        .shell {
            height: 100vh;
            height: 100dvh;
            padding: 0;
        }

        .frame {
            position: relative;
            display: flex;
            width: 100%;
            height: 100%;
            overflow: hidden;
            border-radius: 0;
            background: linear-gradient(160deg, #1d4ed8 0%, #1e40af 55%, #1e3a8a 100%);
            box-shadow: none;
        }

        /* =====================================================================
           SIDEBAR
           ===================================================================== */
        .sidebar {
            background: linear-gradient(160deg, #1d4ed8 0%, #1e3a8a 100%);
        }

        @media (min-width: 1024px) {
            .sidebar {
                background: transparent;
            }
        }

        .brand {
            border-bottom: 1px solid rgba(255, 255, 255, .16);
        }

        .nav-clip {
            position: relative;
            flex: 1 1 0%;
            min-height: 0;
            overflow: hidden;
            container-type: inline-size;
        }

        .side-nav {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: calc(100cqw + 40px);
            overflow-x: hidden;
            overflow-y: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
            overscroll-behavior: contain;
        }

        .nav-inner {
            box-sizing: border-box;
            width: 100cqw;
            padding: 20px 0 16px 16px;
        }

        .side-nav::-webkit-scrollbar {
            display: none;
            width: 0;
            height: 0;
        }

        .nav-group {
            margin-bottom: 22px;
        }

        .nav-label {
            margin: 0 0 8px;
            padding: 0 12px;
            font-size: var(--fs-xs);
            font-weight: var(--fw-bold);
            letter-spacing: .08em;
            text-transform: uppercase;
            color: rgba(219, 231, 254, .6);
        }

        .nav-item {
            position: relative;
            display: flex;
            flex-shrink: 0;
            align-items: center;
            gap: 12px;
            width: 100%;
            min-height: 46px;
            margin-bottom: 6px;
            padding: 12px 16px;
            border: 0;
            border-radius: 9999px 0 0 9999px;
            background: transparent;
            color: #dbe7fe;
            font-family: inherit;
            font-size: var(--fs-base);
            font-weight: var(--fw-medium);
            line-height: 1.3;
            text-align: left;
            cursor: pointer;
            transition: background-color .45s var(--ease), color .45s var(--ease);
        }

        .nav-item svg,
        .nav-item span {
            transition: transform .45s var(--ease);
            will-change: transform;
        }

        .nav-item:hover {
            background-color: rgba(255, 255, 255, .12);
            color: #fff;
        }

        .nav-item:hover svg {
            transform: translateX(4px) scale(1.06);
        }

        .nav-item:hover span {
            transform: translateX(4px);
        }

        .nav-item.active {
            background: #fff;
            color: var(--p-700);
            font-weight: var(--fw-semibold);
            animation: nav-in .7s var(--ease) both;
        }

        .nav-item.active::before,
        .nav-item.active::after {
            content: '';
            position: absolute;
            right: 0;
            width: 20px;
            height: 20px;
            background: transparent;
            pointer-events: none;
        }

        .nav-item.active::before {
            top: -20px;
            border-bottom-right-radius: 20px;
            box-shadow: 8px 8px 0 8px #fff;
        }

        .nav-item.active::after {
            bottom: -20px;
            border-top-right-radius: 20px;
            box-shadow: 8px -8px 0 8px #fff;
        }

        .nav-item.active:hover svg,
        .nav-item.active:hover span {
            transform: none;
        }

        @keyframes nav-in {
            from {
                opacity: 0;
                transform: translateX(-10px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @view-transition {
            navigation: auto;
        }

        @supports (view-transition-name: none) {
            .nav-item.active {
                view-transition-name: nav-active;
                animation: none;
            }

            @media (min-width: 1024px) {
                .sidebar {
                    view-transition-name: sidebar;
                }
            }
        }

        ::view-transition-group(sidebar) {
            animation: none;
        }

        ::view-transition-old(sidebar) {
            display: none;
        }

        ::view-transition-new(sidebar) {
            animation: none;
        }

        ::view-transition-group(nav-active) {
            animation-duration: .6s;
            animation-timing-function: var(--ease);
        }

        ::view-transition-old(nav-active) {
            display: none;
        }

        ::view-transition-new(nav-active) {
            animation: none;
            opacity: 1;
        }

        ::view-transition-old(root),
        ::view-transition-new(root) {
            animation-duration: .25s;
            animation-timing-function: var(--ease);
        }

        @media (prefers-reduced-motion: reduce) {
            ::view-transition-group(*),
            ::view-transition-old(*),
            ::view-transition-new(*) {
                animation: none !important;
            }
        }

        .nav-item.danger:hover {
            background-color: rgba(239, 68, 68, .85);
        }

        @media (prefers-reduced-motion: reduce) {
            .nav-item,
            .nav-item svg,
            .nav-item span {
                transition: none;
                animation: none !important;
            }
        }

        .side-card {
            position: relative;
            overflow: hidden;
            margin: 0 16px 16px;
            padding: 16px;
            border-radius: 20px;
            color: #fff;
            background: linear-gradient(150deg, rgba(255, 255, 255, .20), rgba(255, 255, 255, .06));
            border: 1px solid rgba(255, 255, 255, .18);
        }

        .side-card::before,
        .side-card::after {
            content: '';
            position: absolute;
            border-radius: 9999px;
            background: rgba(255, 255, 255, .10);
        }

        .side-card::before {
            width: 110px;
            height: 110px;
            right: -34px;
            bottom: -40px;
        }

        .side-card::after {
            width: 64px;
            height: 64px;
            right: 34px;
            bottom: -34px;
            background: rgba(255, 255, 255, .07);
        }

        .side-card p {
            position: relative;
            z-index: 1;
        }

        /* =====================================================================
           PANEL KONTEN (putih, penuh, tanpa margin dan sudut membulat)
           ===================================================================== */
        .panel {
            display: flex;
            flex: 1 1 0%;
            flex-direction: column;
            min-width: 0;
            margin: 0;
            overflow: hidden;
            border-radius: 0;
            background: #fff;
        }

        .topbar {
            display: flex;
            flex-shrink: 0;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            height: 72px;
            padding: 0 24px;
            border-bottom: 1px solid var(--line);
            background: #fff;
        }

        @media (min-width: 1024px) {
            .topbar {
                height: 80px;
                padding: 0 32px;
            }
        }

        .avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border-radius: 9999px;
            background: linear-gradient(135deg, var(--p-500), var(--p-800));
            color: #fff;
            font-weight: 700;
            box-shadow: 0 0 0 4px var(--p-100);
        }

        .main-scroll {
            flex: 1 1 0%;
            min-height: 0;
            overflow-y: auto;
            background: #fff;
        }

        .main-scroll::-webkit-scrollbar {
            width: 8px;
        }

        .main-scroll::-webkit-scrollbar-thumb {
            background: var(--p-100);
            border-radius: 9999px;
        }

        .content-wrap {
            padding: 24px 24px;
        }

        @media (min-width: 640px) {
            .content-wrap {
                padding: 24px 64px;
            }
        }

        @media (min-width: 1024px) {
            .content-wrap {
                padding: 24px 160px;
            }
        }
    </style>
</head>

<body class="overflow-hidden antialiased" style="color: var(--ink);">

    @php
        $menu = fn(bool $active) => $active ? 'nav-item active' : 'nav-item';

        $icons = [
            'dashboard' => 'M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z',

            'instrumen' => 'M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75',

            'wawancara' => 'M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155',

            'tindak' => 'M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z',

            'sekolah' => 'M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5',

            'manajemen' => 'M16.5 7.5a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM3.75 21a8.25 8.25 0 0116.5 0M19.5 8.25a3 3 0 010 6M21.75 21a6 6 0 00-3.75-5.25',

            'panduan' => 'M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z',

            'profil' => 'M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z',

            'keluar' => 'M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9',
        ];

        $icon = fn(string $key) => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" '
            . 'style="width:20px;height:20px;flex-shrink:0;" fill="none" viewBox="0 0 24 24" '
            . 'stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
            . '<path d="' . $icons[$key] . '"/></svg>';
    @endphp

    <div class="shell">
        <div class="frame">

            {{-- BACKDROP (hanya mobile) --}}
            <div id="sidebar-backdrop" class="fixed inset-0 z-30 hidden bg-slate-900/50 lg:hidden"></div>

            {{-- =========================================================
            SIDEBAR
            ========================================================== --}}
            <aside id="sidebar"
                class="sidebar fixed inset-y-0 left-0 z-40 flex w-64 flex-shrink-0 -translate-x-full flex-col text-white transition-transform duration-200 ease-in-out lg:static lg:translate-x-0">

                {{-- Brand --}}
                <div class="brand flex h-20 flex-shrink-0 items-center justify-between px-6">
                    <div class="flex items-center">
                        {{-- LOGO --}}
                        <span class="brand-logo">
                            <img src="{{ asset('images/Logotutwurihandayani.png') }}" alt="Logo Tut Wuri Handayani"
                                class="h-full w-full object-contain">
                        </span>

                        <div class="ml-3">
                            <h1 class="brand-title">MANDALIKA</h1>
                            <p class="brand-sub">Monitoring-Analisis-Evaluasi BGTK Akurat</p>
                        </div>
                    </div>

                    {{-- Tombol tutup (mobile) --}}
                    <button type="button" id="sidebar-close"
                        class="ml-2 rounded-lg p-1.5 text-white/70 hover:bg-white/10 hover:text-white lg:hidden"
                        aria-label="Tutup menu">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {{-- Navigasi --}}
                <div class="nav-clip">
                <nav class="side-nav">
                <div class="nav-inner">

                    <div class="nav-group">
                        <p class="nav-label">Utama</p>

                        <a href="{{ url('/dashboard') }}"
                            class="{{ $menu(request()->is('/') || request()->is('dashboard') || request()->is('dashboard/*')) }}">
                            {!! $icon('dashboard') !!}
                            <span>Dashboard</span>
                        </a>
                    </div>

                    <div class="nav-group">
                        <p class="nav-label">Monitoring &amp; Evaluasi</p>

                        <a href="{{ url('/instrumen') }}" class="{{ $menu(request()->is('instrumen*')) }}">
                            {!! $icon('instrumen') !!}
                            <span>Instrumen Pemantauan</span>
                        </a>

                        {{-- MENU BARU: REKAP EVALUASI STEM --}}
                        <a href="{{ route('admin.stem.rekap.evaluasi') }}" class="{{ $menu(request()->is('admin/stem/rekap-evaluasi*')) }}">
                            {!! $icon('instrumen') !!}
                            <span>Rekap Evaluasi STEM</span>
                        </a>

                        <a href="{{ url('/wawancara') }}" class="{{ $menu(request()->is('wawancara*')) }}">
                            {!! $icon('wawancara') !!}
                            <span>Lembar Wawancara</span>
                        </a>

                        <a href="{{ url('/tindak-lanjut') }}" class="{{ $menu(request()->is('tindak-lanjut*')) }}">
                            {!! $icon('tindak') !!}
                            <span>Rencana Tindak Lanjut</span>
                        </a>

                        <a href="{{ url('/sekolah') }}" class="{{ $menu(request()->is('sekolah*')) }}">
                            {!! $icon('sekolah') !!}
                            <span>Data Sekolah</span>
                        </a>
                    </div>

                    @if (auth()->user()->isAdmin())
                        <div class="nav-group">
                            <p class="nav-label">Administrator</p>
                            <a href="{{ route('manajemen-akun.index') }}"
                                class="{{ $menu(request()->is('manajemen-akun*')) }}">
                                {!! $icon('manajemen') !!}
                                <span>Manajemen Akun</span>
                            </a>
                        </div>
                    @endif

                    <div class="nav-group">
                        <p class="nav-label">Bantuan</p>

                        <a href="{{ url('/panduan') }}" class="{{ $menu(request()->is('panduan*')) }}">
                            {!! $icon('panduan') !!}
                            <span>Panduan Pengisian</span>
                        </a>
                    </div>

                    <div class="nav-group" style="margin-bottom: 0;">
                        <p class="nav-label">Akun</p>

                        <a href="{{ url('/profil') }}" class="{{ $menu(request()->is('profil*')) }}">
                            {!! $icon('profil') !!}
                            <span>Profil Saya</span>
                        </a>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-item danger">
                                {!! $icon('keluar') !!}
                                <span>Keluar</span>
                            </button>
                        </form>
                    </div>
                </div>{{-- /nav-inner --}}
                </nav>
                </div>{{-- /nav-clip --}}

                {{-- Footer sidebar --}}
                <div class="side-card flex-shrink-0">
                    <p style="font-size: var(--fs-sm); font-weight: var(--fw-bold); line-height: 1.4;">Sistem
                        Monitoring &amp; Evaluasi</p>
                    <p style="margin-top: 4px; font-size: var(--fs-xs); color: rgba(219,231,254,.85);">BGTK Provinsi
                        NTB</p>
                </div>

            </aside>


            {{-- =========================================================
            KOLOM KANAN: header tetap + konten scroll
            ========================================================== --}}
            <div class="panel">

                {{-- HEADER --}}
                <header class="topbar">

                    <div class="flex min-w-0 items-center gap-3">
                        {{-- Hamburger (mobile) --}}
                        <button type="button" id="sidebar-open"
                            class="rounded-lg p-2 text-slate-600 hover:bg-slate-100 lg:hidden"
                            aria-label="Buka menu">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>

                        <div class="min-w-0">
                            <h2 class="top-title truncate">@yield('page-title', 'Dashboard')</h2>
                            <p class="top-sub hidden truncate sm:block">Sistem Monitoring dan Evaluasi BGTK Provinsi
                                NTB</p>
                        </div>
                    </div>

                    <div class="flex flex-shrink-0 items-center gap-3">

                        {{-- JAM & CUACA REAL TIME --}}
                        <div class="top-widgets">
                            <div class="top-chip" title="Waktu setempat">
                                <span class="top-chip-ico">
                                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="1.9" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <circle cx="12" cy="12" r="9" />
                                        <path d="M12 7v5l3 2" />
                                    </svg>
                                </span>
                                <div>
                                    <p class="top-chip-main"><span id="rt-time">--.--.--</span> <span id="rt-zone"
                                            style="font-weight:500;color:var(--muted)"></span></p>
                                    <p class="top-chip-sub" id="rt-date">&nbsp;</p>
                                </div>
                            </div>

                            <div class="top-chip" title="Cuaca saat ini">
                                <span class="top-chip-ico weather-ico" id="wx-ico">⛅</span>
                                <div>
                                    <p class="top-chip-main"><span id="wx-temp">--</span>°C <span id="wx-label"
                                            style="font-weight:500;color:var(--muted)">Memuat…</span></p>
                                    <p class="top-chip-sub" id="wx-city">Mataram, NTB</p>
                                </div>
                            </div>
                        </div>

                        <span class="top-divider hidden lg:block"></span>

                        <div class="hidden text-right sm:block">
                            <p class="top-name">
                                {{ auth()->user()->name }}
                            </p>

                            <p class="top-role">
                                {{ auth()->user()->isAdmin() ? 'Administrator' : 'Petugas Monev' }}
                            </p>
                        </div>

                        <div class="avatar">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    </div>

                </header>

                {{-- KONTEN --}}
                <main class="main-scroll">
                    <section class="w-full content-wrap">
                        @yield('content')
                    </section>
                </main>

            </div>

        </div>
    </div>

    <script>
        (function () {
            const sidebar = document.getElementById('sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');

            function buka() {
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('hidden');
            }
            function tutup() {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('hidden');
            }

            document.getElementById('sidebar-open').addEventListener('click', buka);
            document.getElementById('sidebar-close').addEventListener('click', tutup);
            backdrop.addEventListener('click', tutup);

            // Tutup otomatis setelah menu diklik (mobile)
            sidebar.querySelectorAll('a').forEach(a => a.addEventListener('click', tutup));

            // Reset bila layar diperbesar ke desktop
            window.addEventListener('resize', function () {
                if (window.innerWidth >= 1024) {
                    backdrop.classList.add('hidden');
                }
            });
        })();
    </script>

    {{-- JAM REAL TIME + CUACA (Open-Meteo, tanpa API key) --}}
    <script>
        (function () {
            const elTime = document.getElementById('rt-time');
            const elZone = document.getElementById('rt-zone');
            const elDate = document.getElementById('rt-date');
            if (!elTime) return;

            const fmtJam = new Intl.DateTimeFormat('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false });
            const fmtTgl = new Intl.DateTimeFormat('id-ID', { weekday: 'long', day: 'numeric', month: 'short', year: 'numeric' });
            const fmtZona = new Intl.DateTimeFormat('id-ID', { timeZoneName: 'short' });

            function tick() {
                const now = new Date();
                elTime.textContent = fmtJam.format(now).replace(/:/g, '.');
                elDate.textContent = fmtTgl.format(now);
                const z = fmtZona.formatToParts(now).find(p => p.type === 'timeZoneName');
                elZone.textContent = z ? z.value : '';
            }
            tick();
            setInterval(tick, 1000);

            const LAT = -8.5833, LON = 116.1167;
            const elIco = document.getElementById('wx-ico');
            const elTemp = document.getElementById('wx-temp');
            const elLabel = document.getElementById('wx-label');

            function kode(c) {
                if (c === 0) return ['Cerah', '☀️', '🌙'];
                if (c === 1) return ['Cerah berawan', '🌤️', '🌙'];
                if (c === 2) return ['Berawan', '⛅', '☁️'];
                if (c === 3) return ['Mendung', '☁️', '☁️'];
                if (c === 45 || c === 48) return ['Berkabut', '🌫️', '🌫️'];
                if (c >= 51 && c <= 57) return ['Gerimis', '🌦️', '🌧️'];
                if (c >= 61 && c <= 67) return ['Hujan', '🌧️', '🌧️'];
                if (c >= 80 && c <= 82) return ['Hujan deras', '🌧️', '🌧️'];
                if (c >= 95) return ['Badai petir', '⛈️', '⛈️'];
                return ['Berawan', '⛅', '☁️'];
            }

            async function muatCuaca() {
                try {
                    const url = 'https://api.open-meteo.com/v1/forecast?latitude=' + LAT + '&longitude=' + LON
                        + '&current=temperature_2m,weather_code,is_day&timezone=auto';
                    const res = await fetch(url);
                    if (!res.ok) throw new Error('HTTP ' + res.status);
                    const c = (await res.json()).current;
                    const [label, siang, malam] = kode(c.weather_code);
                    elIco.textContent = c.is_day ? siang : malam;
                    elTemp.textContent = Math.round(c.temperature_2m);
                    elLabel.textContent = label;
                } catch (e) {
                    elLabel.textContent = 'Tidak tersedia';
                }
            }
            muatCuaca();
            setInterval(muatCuaca, 10 * 60 * 1000);
        })();
    </script>

</body>

</html>