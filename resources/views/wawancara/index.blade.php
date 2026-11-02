@extends('layouts.app')

@section('title', 'Lembar Wawancara')

@section('page-title', 'Lembar Wawancara')

@section('content')

    @php
        // Palet warna per jenis wawancara (sama dengan halaman Instrumen Pemantauan).
        $paletJenis = [
            'BCKS' => [
                'no' => '01',
                'judul' => 'Wawancara BCKS',
                'desk' => 'Form wawancara BCKS.',
                'solid' => '#2563eb',
                'hover' => '#1d4ed8',
                'bg' => '#eff6ff',
                'border' => '#bfdbfe',
                'text' => '#1d4ed8',
                'route' => 'wawancara.bcks.create',
                'label' => 'Wawancara BCKS',
            ],
            'BK' => [
                'no' => '02',
                'judul' => 'Wawancara BK',
                'desk' => 'Form wawancara BK.',
                'solid' => '#7c3aed',
                'hover' => '#6d28d9',
                'bg' => '#f5f3ff',
                'border' => '#ddd6fe',
                'text' => '#6d28d9',
                'route' => 'wawancara.bk.create',
                'label' => 'Wawancara BK',
            ],
            'TENDIK' => [
                'no' => '03',
                'judul' => 'Wawancara TENDIK',
                'desk' => 'Form wawancara TENDIK.',
                'solid' => '#059669',
                'hover' => '#047857',
                'bg' => '#ecfdf5',
                'border' => '#a7f3d0',
                'text' => '#047857',
                'route' => 'wawancara.tendik.create',
                'label' => 'Wawancara TENDIK',
            ],
            'GEMBIRA' => [
                'no' => '04',
                'judul' => 'Wawancara Matematika GEMBIRA',
                'desk' => 'Form wawancara program GEMBIRA.',
                'solid' => '#f59e0b',
                'hover' => '#d97706',
                'bg' => '#fffbeb',
                'border' => '#fde68a',
                'text' => '#b45309',
                'route' => 'wawancara.gembira.create',
                'label' => 'Wawancara Matematika GEMBIRA',
            ],
            'PKGSD MBI' => [
                'no' => '05',
                'judul' => 'Wawancara PKGSD MBI',
                'desk' => 'Form wawancara PKGSD MBI.',
                'solid' => '#0891b2',
                'hover' => '#0e7490',
                'bg' => '#ecfeff',
                'border' => '#a5f3fc',
                'text' => '#0e7490',
                'route' => 'wawancara.pkgsd-mbi.create',
                'label' => 'Wawancara PKGSD MBI',
            ],
        ];

        // Kelas warna pastel kartu (hanya untuk tampilan).
        $kelasWarna = [
            'BCKS' => 'c-blue',
            'BK' => 'c-violet',
            'TENDIK' => 'c-emerald',
            'GEMBIRA' => 'c-amber',
            'PKGSD MBI' => 'c-cyan',
        ];

        $barisAtas = array_slice($paletJenis, 0, 3, true);
        $barisBawah = array_slice($paletJenis, 3, null, true);
    @endphp

    <style>
        /* ===================== WAWANCARA — selaras dengan desain Dashboard =====================
                   Token warna (--p-*, --ink, --muted, --line) dan font (Plus Jakarta Sans)
                   berasal dari layout, sehingga identik dengan halaman Dashboard. */

        .i-wrap {
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        /* --- judul halaman (sama dengan Dashboard / Tindak Lanjut) --- */
        .d-h1 {
            font-size: 28px;
            font-weight: 400;
            letter-spacing: -.02em;
            line-height: 1.2;
            color: var(--ink);
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

        /* --- kartu umum --- */
        .i-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
        }

        .i-card-h {
            font-size: 16px;
            font-weight: 700;
            letter-spacing: -.01em;
            color: var(--ink);
        }

        .i-card-s {
            margin-top: 2px;
            font-size: 12.5px;
            color: var(--muted);
        }

        .i-grid3 {
            display: grid;
            gap: 20px;
            grid-template-columns: minmax(0, 1fr);
        }

        @media (min-width: 700px) {
            .i-grid3 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 1280px) {
            .i-grid3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        /* --- warna pastel tiap instrumen (satu keluarga dengan tile KPI dashboard) --- */
        .c-blue {
            --t-bg: linear-gradient(160deg, #eaf0ff 0%, #d3e1ff 100%);
            --t-line: #c6d8fb;
            --t-glow: rgba(37, 99, 235, .55);
            --t-clip: #8fa9e6;
            --c: #2563eb;
            --c-line: #c6d8fb;
            --c-text: #1d4ed8;
            --b: #3f5fe0;
            --b-d: #3450c4;
            --b-t: #ffffff;
        }

        .c-violet {
            --t-bg: linear-gradient(160deg, #f2edff 0%, #e0d6ff 100%);
            --t-line: #d6caf9;
            --t-glow: rgba(124, 58, 237, .5);
            --t-clip: #a999dc;
            --c: #7c3aed;
            --c-line: #d6caf9;
            --c-text: #6d28d9;
            --b: #7048e8;
            --b-d: #5f3dc4;
            --b-t: #ffffff;
        }

        .c-emerald {
            --t-bg: linear-gradient(160deg, #e9faf2 0%, #cdf0e0 100%);
            --t-line: #bfe8d4;
            --t-glow: rgba(5, 150, 105, .5);
            --t-clip: #86c9ae;
            --c: #059669;
            --c-line: #bfe8d4;
            --c-text: #047857;
            --b: #0c9a6a;
            --b-d: #087f57;
            --b-t: #ffffff;
        }

        .c-amber {
            --t-bg: linear-gradient(160deg, #fff7de 0%, #fde8ac 100%);
            --t-line: #f6dd9b;
            --t-glow: rgba(217, 154, 11, .5);
            --t-clip: #d3b568;
            --c: #d99a0b;
            --c-line: #f6dd9b;
            --c-text: #a16207;
            --b: #b45309;
            --b-d: #92400e;
            --b-t: #ffffff;
        }

        .c-cyan {
            --t-bg: linear-gradient(160deg, #e6f7fb 0%, #c8eaf4 100%);
            --t-line: #b9e2ee;
            --t-glow: rgba(8, 145, 178, .5);
            --t-clip: #7fbdd0;
            --c: #0891b2;
            --c-line: #b9e2ee;
            --c-text: #0e7490;
            --b: #0b8aa8;
            --b-d: #087189;
            --b-t: #ffffff;
        }

        /* --- kartu instrumen: tile pastel seperti KPI dashboard --- */
        .i-inst {
            position: relative;
            overflow: hidden;
            background: var(--t-bg);
            border: 1px solid var(--t-line);
            border-radius: 18px;
            transition: transform .3s cubic-bezier(.22, 1, .36, 1), box-shadow .3s cubic-bezier(.22, 1, .36, 1);
        }

        .i-inst:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 30px -20px var(--t-glow);
        }

        /* lingkaran lembut sebagai hiasan di dasar kartu */
        .i-inst::before,
        .i-inst::after {
            content: '';
            position: absolute;
            z-index: 0;
            border-radius: 9999px;
            pointer-events: none;
        }

        .i-inst::before {
            right: -30px;
            bottom: -42px;
            width: 124px;
            height: 124px;
            background: rgba(255, 255, 255, .38);
        }

        .i-inst::after {
            left: -26px;
            bottom: -46px;
            width: 92px;
            height: 92px;
            background: rgba(255, 255, 255, .24);
        }

        .i-clip {
            position: absolute;
            z-index: 1;
            right: 30px;
            top: 12px;
            color: var(--t-clip);
        }

        .i-pin {
            position: absolute;
            z-index: 1;
            right: 14px;
            top: 14px;
            width: 7px;
            height: 7px;
            border-radius: 9999px;
            background: var(--c);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .65);
        }

        .i-inst-body {
            position: relative;
            z-index: 1;
            padding: 22px 20px 20px;
        }

        .i-inst-top {
            display: flex;
            align-items: flex-start;
            gap: 14px;
        }

        .i-inst-text {
            min-width: 0;
            flex: 1;
            padding-top: 2px;
        }

        .i-inst-ico {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 56px;
            height: 56px;
            border-radius: 18px;
            background: #fff;
            color: var(--c);
            box-shadow: 0 8px 18px -10px var(--t-glow);
        }

        .i-badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 12px;
            border-radius: 9999px;
            background: rgba(255, 255, 255, .72);
            border: 1px solid var(--c-line);
            color: var(--c-text);
            font-size: 11.5px;
            font-weight: 700;
        }

        .i-inst h3 {
            margin-top: 8px;
            font-size: 16px;
            font-weight: 700;
            letter-spacing: -.01em;
            color: var(--ink);
        }

        .i-inst p {
            margin-top: 4px;
            font-size: 13px;
            line-height: 1.7;
            color: #55637f;
        }

        .i-actions {
            margin-top: 18px;
            padding-top: 16px;
            border-top: 1px solid rgba(255, 255, 255, .8);
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 10px;
        }

        /* tombol utama: warna pekat satu keluarga dengan kartu */
        .i-btn-main {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 14px;
            border: 0;
            border-radius: 12px;
            background: var(--b);
            color: var(--b-t);
            font-family: inherit;
            font-size: 13.5px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .22), 0 10px 18px -10px var(--b);
            transition: background .25s ease, transform .25s ease, box-shadow .25s ease;
        }

        .i-btn-main:hover {
            background: var(--b-d);
            transform: translateY(-1px);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .22), 0 14px 20px -10px var(--b);
        }

        .i-btn-main:active {
            transform: translateY(0);
        }

        .i-btn-main:focus-visible,
        .i-btn-ghost:focus-visible {
            outline: 3px solid var(--c-line);
            outline-offset: 2px;
        }

        /* tombol sekunder: putih transparan di atas latar pastel */
        .i-btn-ghost {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px 14px;
            border: 1px solid var(--c-line);
            border-radius: 12px;
            background: rgba(255, 255, 255, .7);
            color: var(--c-text);
            font-family: inherit;
            font-size: 12.5px;
            font-weight: 600;
            cursor: pointer;
            transition: background .25s ease, border-color .25s ease, transform .25s ease;
        }

        .i-btn-ghost:hover {
            background: #fff;
            border-color: var(--b);
            transform: translateY(-1px);
        }

        .i-btn-ghost:active {
            transform: translateY(0);
        }

        /* --- filter (gaya sama dengan Data Sekolah) --- */
        .i-filter {
            padding: 20px;
        }

        .i-filter-head {
            margin-bottom: 16px;
        }

        .i-filter-grid {
            display: grid;
            gap: 16px;
            grid-template-columns: minmax(0, 1fr);
        }

        @media (min-width: 768px) {
            .i-filter-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .i-span2 {
                grid-column: span 2;
            }
        }

        @media (min-width: 1280px) {
            .i-filter-grid {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }
        }

        .i-label {
            display: block;
            margin-bottom: 8px;
            font-size: 12.5px;
            font-weight: 600;
            color: var(--ink);
        }

        .i-field {
            width: 100%;
            height: 44px;
            padding: 0 14px;
            border: 1px solid var(--line);
            border-radius: 12px;
            background: #fff;
            color: #334155;
            font-family: inherit;
            font-size: 13px;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        .i-field::placeholder {
            color: #94a3b8;
        }

        .i-field:focus {
            border-color: var(--p-500);
            box-shadow: 0 0 0 4px var(--p-100);
        }

        /* kolom pencarian dengan ikon kaca pembesar */
        .i-search {
            position: relative;
        }

        .i-search svg {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
        }

        .i-search .i-field {
            padding-left: 40px;
        }

        .i-filter-foot {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 18px;
        }

        /* tombol utama: sama dengan tombol biru di Tindak Lanjut / Data Sekolah */
        .i-btn-apply {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
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

        .i-btn-apply:hover {
            background: var(--p-700);
            transform: translateY(-1px);
        }

        /* tombol sekunder */
        .i-btn-clear {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 46px;
            padding: 0 18px;
            border: 1px solid var(--line);
            border-radius: 14px;
            background: #fff;
            color: #475569;
            font-size: 13.5px;
            font-weight: 600;
            transition: background .2s, color .2s;
        }

        .i-btn-clear:hover {
            background: var(--p-50);
            color: var(--p-700);
        }

        /* --- tabel riwayat --- */
        .i-table-card {
            overflow: hidden;
        }

        .i-head {
            padding: 20px 24px;
            border-bottom: 1px solid var(--line);
        }

        .i-scroll {
            width: 100%;
            min-width: 0;
            overflow-x: auto;
            scrollbar-width: thin;
            scrollbar-color: var(--p-200) transparent;
        }

        .i-scroll::-webkit-scrollbar {
            height: 6px;
        }

        .i-scroll::-webkit-scrollbar-thumb {
            background: var(--p-200);
            border-radius: 9999px;
        }

        .i-table {
            width: 100%;
            min-width: 800px;
            border-collapse: collapse;
            text-align: left;
        }

        .i-table th {
            padding: 14px 20px;
            white-space: nowrap;
            font-size: 12px;
            font-weight: 600;
            color: var(--muted);
            border-bottom: 1px solid var(--line);
        }

        .i-table td {
            padding: 14px 20px;
            vertical-align: middle;
            border-bottom: 1px solid var(--line);
        }

        .i-table tbody tr:last-child td {
            border-bottom: 0;
        }

        .i-row {
            cursor: pointer;
            transition: background .2s;
        }

        .i-row:hover {
            background: #f7f9ff;
        }

        .i-nowrap {
            white-space: nowrap;
        }

        .i-right {
            text-align: right !important;
        }

        .i-ic {
            display: flex;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            font-size: 16px;
        }

        .i-stack {
            display: flex;
            min-width: 0;
            align-items: flex-start;
            gap: 12px;
        }

        .i-name {
            font-size: 13px;
            font-weight: 600;
            line-height: 1.4;
            color: var(--ink);
        }

        .i-meta {
            margin-top: 2px;
            font-size: 11.5px;
            line-height: 1.5;
            color: var(--muted);
        }

        .i-tag {
            display: inline-flex;
            max-width: 100%;
            align-items: center;
            margin-top: 4px;
            padding: 4px 10px;
            border-radius: 8px;
            font-size: 11.5px;
            font-weight: 600;
            line-height: 1.4;
            white-space: normal;
            word-break: break-word;
        }

        .i-muted {
            font-size: 12px;
            color: #94a3b8;
        }

        .i-b {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 10px;
            border-radius: 8px;
            font-size: 11.5px;
            font-weight: 700;
            white-space: nowrap;
        }

        .b-green {
            background: #e6f8ef;
            color: #047857;
        }

        .b-amber {
            background: #fff4d6;
            color: #a16207;
        }

        .i-dot {
            width: 6px;
            height: 6px;
            border-radius: 9999px;
        }

        /* --- tombol aksi (sama persis dengan halaman Data Sekolah) --- */
        .i-acts {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 2px;
        }

        .i-inline {
            display: inline-flex;
            margin: 0;
        }

        .i-act {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border: 0;
            border-radius: 11px;
            background: transparent;
            color: var(--ink);
            cursor: pointer;
            transition: background .2s, color .2s;
        }

        .i-act:hover {
            background: var(--p-50);
            color: var(--p-700);
        }

        .i-act.danger {
            color: #e11d48;
        }

        .i-act.danger:hover {
            background: #fff1f2;
            color: #be123c;
        }

        /* --- kosong & pagination --- */
        .i-empty {
            padding: 64px 24px;
            text-align: center;
        }

        .i-empty-ico {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 64px;
            height: 64px;
            margin: 0 auto;
            border-radius: 18px;
            background: var(--p-50);
            font-size: 26px;
        }

        .i-empty h3 {
            margin-top: 16px;
            font-size: 16px;
            font-weight: 700;
            color: var(--ink);
        }

        .i-empty p {
            margin-top: 4px;
            font-size: 13px;
            color: var(--muted);
        }

        .i-pag {
            padding: 14px 24px;
            border-top: 1px solid var(--line);
        }

        /* --- notifikasi & error --- */
        .i-alert {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 12px 16px;
            border: 1px solid;
            border-radius: 14px;
            font-size: 13px;
            font-weight: 500;
            transition: all .3s ease;
        }

        .i-alert-in {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .i-alert-x {
            flex-shrink: 0;
            border: 0;
            background: transparent;
            color: inherit;
            font-size: 20px;
            font-weight: 600;
            line-height: 1;
            opacity: .7;
            cursor: pointer;
            transition: opacity .2s;
        }

        .i-alert-x:hover {
            opacity: 1;
        }

        .i-error {
            padding: 14px 16px;
            border: 1px solid #fecdd3;
            border-radius: 14px;
            background: #fff1f2;
            color: #be123c;
            font-size: 13px;
            line-height: 1.7;
        }

        .i-error-t {
            margin-bottom: 4px;
            font-weight: 700;
        }
    </style>

    <div class="i-wrap">

        {{-- =========================================================
        HEADER
        ========================================================== --}}
        <div>
            <h1 class="d-h1">Lembar <b>Wawancara</b></h1>
            <p class="d-crumb">Dashboard &nbsp;›&nbsp; Lembar Wawancara</p>
            <p class="d-desc">Kelola lembar wawancara monitoring dan evaluasi.</p>
        </div>


        {{-- =========================================================
        NOTIFIKASI
        ========================================================== --}}
        @foreach (['success' => 'emerald', 'info' => 'blue'] as $jenisPesan => $warnaPesan)
            @if (session($jenisPesan))
                <div id="alert-{{ $jenisPesan }}" role="alert" class="i-alert"
                    style="border-color: {{ $warnaPesan === 'emerald' ? '#a7f3d0' : '#bfdbfe' }};
                                                                               background: {{ $warnaPesan === 'emerald' ? '#ecfdf5' : '#eff6ff' }};
                                                                               color: {{ $warnaPesan === 'emerald' ? '#047857' : '#1d4ed8' }};">
                    <div class="i-alert-in">
                        @if ($jenisPesan === 'success')
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" style="flex-shrink:0" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" style="flex-shrink:0" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 16v-4m0-4h.01" />
                            </svg>
                        @endif

                        <span>{{ session($jenisPesan) }}</span>
                    </div>

                    <button type="button" onclick="tutupNotifikasi('alert-{{ $jenisPesan }}')" class="i-alert-x"
                        aria-label="Tutup notifikasi">
                        &times;
                    </button>
                </div>
            @endif
        @endforeach

        {{-- ERROR VALIDASI --}}
        @if ($errors->any())
            <div class="i-error">
                <p class="i-error-t">Periksa kembali data berikut:</p>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif


        {{-- =========================================================
        KARTU JENIS WAWANCARA (3 + 2, sama seperti Instrumen Pemantauan)
        ========================================================== --}}
        @foreach ([$barisAtas, $barisBawah] as $barisKartu)
            <div class="i-grid3">

                @foreach ($barisKartu as $kode => $k)
                    <div class="i-inst {{ $kelasWarna[$kode] ?? 'c-blue' }}">

                        <svg class="i-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path
                                d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                        </svg>
                        <span class="i-pin"></span>

                        <div class="i-inst-body">

                            <div class="i-inst-top">

                                <span class="i-inst-ico"><svg width="28" height="28" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8 10h8M8 14h5M6 20l-3 1 1-3a8 8 0 111.5 1.5L6 20z" />
                                    </svg></span>

                                <div class="i-inst-text">

                                    <span class="i-badge">
                                        Instrumen {{ $k['no'] }}
                                    </span>

                                    <h3>
                                        {{ $k['judul'] }}
                                    </h3>

                                    <p>
                                        {{ $k['desk'] }}
                                    </p>

                                </div>

                            </div>

                            <div class="i-actions">

                                <a href="{{ route($k['route']) }}" class="i-btn-main">
                                    + Isi Wawancara
                                </a>

                                <a href="{{ route('wawancara.index', ['jenis_instrumen' => $kode]) }}" class="i-btn-ghost">
                                    Lihat Riwayat
                                </a>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>
        @endforeach


        {{-- =========================================================
        FILTER
        ========================================================== --}}
        <form action="{{ route('wawancara.index') }}" method="GET" class="i-card i-filter">

            <div class="i-filter-head">
                <h2 class="i-card-h">Filter Riwayat Wawancara</h2>
                <p class="i-card-s">Cari wawancara berdasarkan jenis, status, responden, atau sekolah.</p>
            </div>

            <div class="i-filter-grid">

                <div>
                    <label for="jenis_instrumen" class="i-label">Jenis Wawancara</label>
                    <select id="jenis_instrumen" name="jenis_instrumen" class="i-field">
                        <option value="">Semua jenis</option>
                        <option value="BCKS" @selected(request('jenis_instrumen') === 'BCKS')>Wawancara BCKS</option>
                        <option value="BK" @selected(request('jenis_instrumen') === 'BK')>Wawancara BK</option>
                        <option value="TENDIK" @selected(request('jenis_instrumen') === 'TENDIK')>Wawancara TENDIK
                        </option>
                        <option value="GEMBIRA" @selected(request('jenis_instrumen') === 'GEMBIRA')>
                            Wawancara Matematika GEMBIRA
                        </option>
                        <option value="PKGSD MBI" @selected(request('jenis_instrumen') === 'PKGSD MBI')>
                            Wawancara PKGSD MBI
                        </option>
                    </select>
                </div>

                <div>
                    <label for="status" class="i-label">Status</label>
                    <select id="status" name="status" class="i-field">
                        <option value="">Semua status</option>
                        <option value="Belum Dilaksanakan" @selected(request('status') === 'Belum Dilaksanakan')>Belum
                            Dilaksanakan</option>
                        <option value="Selesai" @selected(request('status') === 'Selesai')>Selesai</option>
                    </select>
                </div>

                <div class="i-span2">
                    <label for="search" class="i-label">Pencarian</label>
                    <div class="i-search">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z" />
                        </svg>
                        <input id="search" type="text" name="search" value="{{ request('search') }}"
                            placeholder="Nama, responden, atau sekolah" class="i-field">
                    </div>
                </div>

            </div>

            <div class="i-filter-foot">
                @if (request()->hasAny(['jenis_instrumen', 'status', 'search']))
                    <a href="{{ route('wawancara.index') }}" class="i-btn-clear">Reset Filter</a>
                @endif

                <button type="submit" class="i-btn-apply">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z" />
                    </svg>
                    Terapkan Filter
                </button>
            </div>

        </form>


        {{-- =========================================================
        RIWAYAT WAWANCARA
        ========================================================== --}}
        <div class="i-card i-table-card">

            <div class="i-head">

                <h3 class="i-card-h">
                    Riwayat Wawancara
                </h3>

                <p class="i-card-s">
                    Daftar wawancara monitoring dan evaluasi yang telah diisi.
                </p>

            </div>


            <div class="i-scroll">

                <table class="i-table">

                    <thead>

                        <tr>

                            <th>
                                Jenis Wawancara
                            </th>

                            <th>
                                Responden
                            </th>

                            <th>
                                Tanggal Evaluasi
                            </th>

                            <th>
                                Status
                            </th>

                            <th class="i-right">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($wawancaras as $wawancara)

                            @php
                                $jenisData = strtoupper(trim($wawancara->jenis_wawancara ?? ''));
                                $namaInstrumen = strtoupper($wawancara->instrumen->nama_instrumen ?? '');

                                if ($jenisData === 'BCKS' || str_contains($namaInstrumen, 'BCKS')) {
                                    $kodeJenis = 'BCKS';
                                } elseif (in_array($jenisData, ['BK', 'TENDIK', 'GEMBIRA', 'PKGSD MBI'], true)) {
                                    $kodeJenis = $jenisData;
                                } else {
                                    $kodeJenis = 'LAMA';
                                }

                                $labelJenis = $paletJenis[$kodeJenis]['label']
                                    ?? ($wawancara->instrumen->nama_instrumen ?? 'Wawancara Lama');

                                $warna = $paletJenis[$kodeJenis]
                                    ?? ['bg' => '#f8fafc', 'border' => '#e2e8f0', 'text' => '#475569'];

                                $gayaJenis = "background: {$warna['bg']}; border: 1px solid {$warna['border']}; color: {$warna['text']};";

                                $namaResponden = $wawancara->nama_responden
                                    ?: $wawancara->nama_narasumber
                                    ?: '-';

                                $unitResponden = $wawancara->unit_kerja_responden
                                    ?: $wawancara->jabatan_narasumber;

                                $tanggal = $wawancara->tanggal_evaluasi
                                    ?: $wawancara->tanggal_wawancara;

                                $statusWawancara = $wawancara->status ?: 'Belum Dilaksanakan';
                                $isSelesai = $statusWawancara === 'Selesai';
                            @endphp

                            <tr class="i-row" onclick="window.location='{{ route('wawancara.show', $wawancara->id) }}'"
                                title="Klik untuk melihat detail wawancara">

                                {{-- JENIS WAWANCARA --}}
                                <td style="min-width: 280px;">
                                    <div class="i-stack">
                                        <div class="i-ic" style="{{ $gayaJenis }}">
                                            📋
                                        </div>

                                        <div style="min-width: 0;">
                                            <p class="i-name">
                                                {{ $labelJenis }}
                                            </p>
                                            <span class="i-tag" style="{{ $gayaJenis }}">
                                                {{ $kodeJenis }}
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                {{-- RESPONDEN --}}
                                <td style="min-width: 200px;">
                                    <p class="i-name">{{ $namaResponden }}</p>
                                    @if ($unitResponden)
                                        <p class="i-meta">{{ $unitResponden }}</p>
                                    @endif
                                </td>

                                {{-- TANGGAL --}}
                                <td class="i-nowrap">
                                    @if ($tanggal)
                                        <p class="i-name">
                                            {{ \Illuminate\Support\Carbon::parse($tanggal)->format('d/m/Y') }}
                                        </p>
                                    @else
                                        <span class="i-muted">-</span>
                                    @endif
                                </td>

                                {{-- STATUS --}}
                                <td class="i-nowrap">
                                    @if ($isSelesai)
                                        <span class="i-b b-green">
                                            <span class="i-dot" style="background: #10b981;"></span>
                                            Selesai
                                        </span>
                                    @else
                                        <span class="i-b b-amber">
                                            <span class="i-dot" style="background: #f5b82e;"></span>
                                            {{ $statusWawancara }}
                                        </span>
                                    @endif
                                </td>

                                {{-- AKSI --}}
                                <td class="i-nowrap i-right" onclick="event.stopPropagation()">

                                    <div class="i-acts">

                                        {{-- Detail --}}
                                        <a href="{{ route('wawancara.show', $wawancara->id) }}" title="Lihat Detail"
                                            aria-label="Lihat Detail" class="i-act">
                                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>

                                        {{-- Edit --}}
                                        <a href="{{ route('wawancara.edit', $wawancara->id) }}" title="Edit" aria-label="Edit"
                                            class="i-act">
                                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        {{-- Hapus --}}
                                        <form method="POST" action="{{ route('wawancara.destroy', $wawancara->id) }}"
                                            onsubmit="return confirm('Yakin ingin menghapus data wawancara ini? Tindakan ini tidak dapat dibatalkan.');"
                                            class="i-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Hapus" aria-label="Hapus" class="i-act danger">
                                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="i-empty">

                                    <div class="i-empty-ico">
                                        📋
                                    </div>

                                    <h3>
                                        Belum Ada Data Wawancara
                                    </h3>

                                    <p>
                                        Belum ada wawancara yang telah diisi.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- =========================================================
            PAGINATION
            ========================================================== --}}
            @if ($wawancaras->hasPages())

                <div class="i-pag">

                    {{ $wawancaras->links() }}

                </div>

            @endif

        </div>

    </div>

    {{-- JAVASCRIPT NOTIFIKASI --}}
    <script>
        function tutupNotifikasi(id) {
            const elemen = document.getElementById(id);

            if (!elemen) return;

            elemen.style.opacity = '0';
            elemen.style.transform = 'translateY(-6px)';

            setTimeout(() => {
                elemen.remove();
            }, 350);
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Hilangkan notifikasi setelah 3 detik.
            ['success', 'info'].forEach(function (jenis) {
                const elemen = document.getElementById('alert-' + jenis);

                if (elemen) {
                    setTimeout(function () {
                        tutupNotifikasi('alert-' + jenis);
                    }, 3000);
                }
            });
        });
    </script>

@endsection