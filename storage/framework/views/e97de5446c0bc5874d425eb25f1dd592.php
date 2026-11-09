<?php $__env->startSection('title', 'Instrumen Pemantauan'); ?>

<?php $__env->startSection('page-title', 'Instrumen Pemantauan'); ?>

<?php $__env->startSection('content'); ?>

    <style>
        /* ===================== INSTRUMEN — selaras dengan desain Dashboard =====================
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
            min-width: 1000px;
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

        .i-nilai {
            font-size: 14px;
            font-weight: 800;
            letter-spacing: -.01em;
            color: var(--p-600);
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

        .b-blue {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .b-amber {
            background: #fff4d6;
            color: #a16207;
        }

        .b-red {
            background: #ffe4e6;
            color: #be123c;
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

        /* tombol nonaktif (route belum tersedia) */
        .i-act.off {
            color: #cbd5e1;
            cursor: not-allowed;
        }

        .i-act.off:hover {
            background: transparent;
            color: #cbd5e1;
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
    </style>

    <div class="i-wrap">

        
        <div>
            <h1 class="d-h1">Instrumen <b>Pemantauan</b></h1>
            <p class="d-crumb">Dashboard &nbsp;›&nbsp; Instrumen Pemantauan</p>
            <p class="d-desc">Pilih instrumen monitoring dan evaluasi yang akan digunakan.</p>
        </div>


        
        <div class="i-grid3">

            
            <div class="i-inst c-blue">

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
                                    d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
                            </svg></span>

                        <div class="i-inst-text">

                            <span class="i-badge">
                                Instrumen 01
                            </span>

                            <h3>
                                Instrumen BCKS
                            </h3>

                            <p>
                                Instrumen monitoring dan evaluasi BCKS.
                            </p>

                        </div>

                    </div>

                    <div class="i-actions">

                        <a href="<?php echo e(route('bcks.create')); ?>" class="i-btn-main">
                            <span>+</span>
                            Isi Instrumen
                        </a>

                        <button type="button" class="i-btn-ghost">
                            Cetak Blanko
                        </button>

                    </div>

                </div>

            </div>


            
            <div class="i-inst c-violet">

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
                                    d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
                            </svg></span>

                        <div class="i-inst-text">

                            <span class="i-badge">
                                Instrumen 02
                            </span>

                            <h3>
                                Instrumen BK
                            </h3>

                            <p>
                                Instrumen monitoring dan evaluasi BK.
                            </p>

                        </div>

                    </div>

                    <div class="i-actions">

                        <a href="<?php echo e(route('bk.create')); ?>" class="i-btn-main">
                            <span>+</span>
                            Isi Instrumen
                        </a>

                        <button type="button" class="i-btn-ghost">
                            Cetak Blanko
                        </button>

                    </div>

                </div>

            </div>


            
            <div class="i-inst c-emerald">

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
                                    d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
                            </svg></span>

                        <div class="i-inst-text">

                            <span class="i-badge">
                                Instrumen 03
                            </span>

                            <h3>
                                Instrumen TENDIK
                            </h3>

                            <p>
                                Instrumen monitoring dan evaluasi TENDIK.
                            </p>

                        </div>

                    </div>

                    <div class="i-actions">

                        <a href="<?php echo e(route('tendik.create')); ?>" class="i-btn-main">
                            <span>+</span>
                            Isi Instrumen
                        </a>

                        <button type="button" class="i-btn-ghost">
                            Cetak Blanko
                        </button>

                    </div>

                </div>

            </div>

        </div>

        <div class="i-grid3">
            
            <div class="i-inst c-amber">

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
                                    d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
                            </svg></span>

                        <div class="i-inst-text">

                            <span class="i-badge">
                                Instrumen 04
                            </span>

                            <h3>
                                Matematika GEMBIRA
                            </h3>

                            <p>
                                Instrumen monitoring dan evaluasi program GEMBIRA.
                            </p>

                        </div>

                    </div>

                    <div class="i-actions">
                        <a href="<?php echo e(route('gembira.create')); ?>" class="i-btn-main">
                            + Isi Instrumen
                        </a>

                        <a href="<?php echo e(route('gembira.create')); ?>" class="i-btn-ghost">
                            Cetak Blanko
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="i-inst c-cyan">

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
                                    d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
                            </svg></span>

                        <div class="i-inst-text">

                            <span class="i-badge">
                                Instrumen 05
                            </span>

                            <h3>
                                PKGSD-MBI
                            </h3>

                            <p>
                                Instrumen monitoring dan evaluasi PKGSD-MBI.
                            </p>

                        </div>

                    </div>

                    <div class="i-actions">
                        <a href="<?php echo e(route('pkgsd-mbi.create')); ?>" class="i-btn-main">
                            + Isi Instrumen
                        </a>

                        <a href="<?php echo e(route('pkgsd-mbi.create')); ?>" class="i-btn-ghost">
                            Cetak Blanko
                        </a>
                    </div>
                </div>
            </div>

            
            <div class="i-inst c-cyan">
                <svg class="i-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="i-pin"></span>

                <div class="i-inst-body">
                    <div class="i-inst-top">
                        <span class="i-inst-ico">
                            <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </span>
                        <div class="i-inst-text">
                            <span class="i-badge">Instrumen 06</span>
                            <h3>Instrumen STEM</h3>
                            <p>Instrumen monitoring dan evaluasi program STEM.</p>
                        </div>
                    </div>
                    <div class="i-actions">
                        <a href="<?php echo e(route('instrumen.stem.index')); ?>" class="i-btn-main">
                            + Isi Instrumen
                        </a>
                        <button type="button" class="i-btn-ghost">
                            Cetak Blanko
                        </button>
                    </div>
                </div>
            </div>

        </div>

        
        <form action="<?php echo e(route('instrumen.index')); ?>" method="GET" class="i-card i-filter">

            <div class="i-filter-head">
                <h2 class="i-card-h">Filter Riwayat Pengisian</h2>
                <p class="i-card-s">Cari pengisian berdasarkan jenis instrumen, status, atau kata kunci.</p>
            </div>

            <div class="i-filter-grid">

                <div>
                    <label for="jenis_instrumen" class="i-label">Jenis Instrumen</label>
                    <select id="jenis_instrumen" name="jenis_instrumen" class="i-field">
                        <option value="">Semua jenis</option>
                        <option value="BCKS" <?php if(request('jenis_instrumen') === 'BCKS'): echo 'selected'; endif; ?>>BCKS</option>
                        <option value="BK" <?php if(request('jenis_instrumen') === 'BK'): echo 'selected'; endif; ?>>BK</option>
                        <option value="TENDIK" <?php if(request('jenis_instrumen') === 'TENDIK'): echo 'selected'; endif; ?>>TENDIK</option>
                        <option value="GEMBIRA" <?php if(request('jenis_instrumen') === 'GEMBIRA'): echo 'selected'; endif; ?>>
                            Matematika GEMBIRA
                        </option>
                        <option value="PKGSD MBI" <?php if(request('jenis_instrumen') === 'PKGSD MBI'): echo 'selected'; endif; ?>>
                            PKGSD MBI
                        </option>
                        <option value="STEM" <?php if(request('jenis_instrumen') === 'STEM'): echo 'selected'; endif; ?>>
                            STEM
                        </option>
                    </select>
                </div>

                <div>
                    <label for="status" class="i-label">Status</label>
                    <select id="status" name="status" class="i-field">
                        <option value="">Semua status</option>
                        <option value="Draft" <?php if(request('status') === 'Draft'): echo 'selected'; endif; ?>>Draft</option>
                        <option value="Dalam Proses" <?php if(request('status') === 'Dalam Proses'): echo 'selected'; endif; ?>>Dalam Proses</option>
                        <option value="Final" <?php if(request('status') === 'Final'): echo 'selected'; endif; ?>>Final</option>
                    </select>
                </div>

                <div class="i-span2">
                    <label for="search" class="i-label">Pencarian</label>
                    <div class="i-search">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z" />
                        </svg>
                        <input id="search" type="text" name="search" value="<?php echo e(request('search')); ?>"
                            placeholder="Nama BCKS, BK, responden, atau unit kerja" class="i-field">
                    </div>
                </div>

            </div>

            <div class="i-filter-foot">
                <?php if(request()->hasAny(['jenis_instrumen', 'status', 'search'])): ?>
                    <a href="<?php echo e(route('instrumen.index')); ?>" class="i-btn-clear">Reset Filter</a>
                <?php endif; ?>

                <button type="submit" class="i-btn-apply">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z" />
                    </svg>
                    Terapkan Filter
                </button>
            </div>

        </form>


        

        <div class="i-card i-table-card">

            <div class="i-head">

                <h3 class="i-card-h">
                    Riwayat Pengisian
                </h3>

                <p class="i-card-s">
                    Daftar pengisian instrumen monitoring dan evaluasi yang telah dilakukan.
                </p>

            </div>


            <div class="i-scroll">

                <table class="i-table">

                    <thead>

                        <tr>

                            
                            <th>
                                Instrumen
                            </th>

                            
                            <th>
                                Responden
                            </th>

                            
                            <th>
                                Tanggal Evaluasi
                            </th>

                            
                            <th>
                                Nilai
                            </th>

                            
                            <th>
                                Predikat
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

                        <?php $__empty_1 = true; $__currentLoopData = $riwayatPengisian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $riwayat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                            <?php
                                // Satu gaya untuk semua jenis instrumen; hanya warna yang berbeda.
                                $paletInstrumen = [
                                    'BCKS' => ['bg' => '#eff6ff', 'border' => '#bfdbfe', 'text' => '#1d4ed8'],
                                    'BK' => ['bg' => '#f5f3ff', 'border' => '#ddd6fe', 'text' => '#6d28d9'],
                                    'TENDIK' => ['bg' => '#ecfdf5', 'border' => '#a7f3d0', 'text' => '#047857'],
                                    'GEMBIRA' => ['bg' => '#fffbeb', 'border' => '#fde68a', 'text' => '#b45309'],
                                    'PKGSD MBI' => ['bg' => '#ecfeff', 'border' => '#a5f3fc', 'text' => '#0e7490'],
                                    'STEM' => ['bg' => '#ecfeff', 'border' => '#a5f3fc', 'text' => '#0e7490'],
                                ];

                                $warna = $paletInstrumen[strtoupper(trim($riwayat['jenis']))]
                                    ?? ['bg' => '#f8fafc', 'border' => '#e2e8f0', 'text' => '#475569'];

                                $gayaInstrumen = "background: {$warna['bg']}; border: 1px solid {$warna['border']}; color: {$warna['text']};";
                            ?>

                            <tr class="i-row" onclick="window.location='<?php echo e($riwayat['show_route']); ?>'"
                                title="Klik untuk melihat hasil penilaian">

                                
                                <td style="min-width: 280px;">
                                    <div class="i-stack">
                                        <div class="i-ic" style="<?php echo e($gayaInstrumen); ?>">
                                            📋
                                        </div>

                                        <div style="min-width: 0;">
                                            <p class="i-name">
                                                <?php echo e($riwayat['jenis']); ?>

                                            </p>
                                            <span class="i-tag" style="<?php echo e($gayaInstrumen); ?>">
                                                <?php echo e($riwayat['instrumen']); ?>

                                            </span>
                                        </div>
                                    </div>
                                </td>

                                
                                <td style="min-width: 200px;">

                                    <p class="i-name">
                                        <?php echo e($riwayat['responden'] ?: '-'); ?>

                                    </p>

                                    <?php if($riwayat['status_responden']): ?>

                                        <p class="i-meta">
                                            <?php echo e($riwayat['status_responden']); ?>

                                        </p>

                                    <?php endif; ?>

                                </td>


                                
                                <td class="i-nowrap">

                                    <?php if($riwayat['tanggal']): ?>

                                        <p class="i-name">
                                            <?php echo e($riwayat['tanggal']->format('d/m/Y')); ?>

                                        </p>

                                    <?php else: ?>

                                        <span class="i-muted">
                                            -
                                        </span>

                                    <?php endif; ?>

                                </td>


                                
                                <td class="i-nowrap">

                                    <p class="i-nilai">
                                        <?php echo e(number_format($riwayat['nilai'], 2)); ?>

                                    </p>

                                    <p class="i-meta">
                                        <?php echo e($riwayat['skor']); ?>/<?php echo e($riwayat['skor_maksimal']); ?>

                                    </p>

                                </td>


                                
                                <td class="i-nowrap">

                                    <?php if(in_array($riwayat['jenis'], ['BCKS', 'BK'], true)): ?>

                                        <?php if($riwayat['predikat'] === 'Sangat Baik'): ?>

                                            <span class="i-b b-green">
                                                Sangat Baik
                                            </span>

                                        <?php elseif($riwayat['predikat'] === 'Baik'): ?>

                                            <span class="i-b b-blue">
                                                Baik
                                            </span>

                                        <?php elseif($riwayat['predikat'] === 'Cukup'): ?>

                                            <span class="i-b b-amber">
                                                Cukup
                                            </span>

                                        <?php elseif(in_array($riwayat['predikat'], ['Perlu Pembinaan', 'Perlu pendampingan intensif'], true)): ?>

                                            <span class="i-b b-red">
                                                <?php echo e($riwayat['predikat']); ?>

                                            </span>

                                        <?php else: ?>

                                            <span class="i-muted">
                                                <?php echo e($riwayat['predikat'] ?: '-'); ?>

                                            </span>

                                        <?php endif; ?>

                                    <?php else: ?>

                                        <?php if(str_contains($riwayat['predikat'] ?? '', 'Baik')): ?>

                                            <span class="i-b b-green">
                                                Baik / Tinggi
                                            </span>

                                        <?php else: ?>

                                            <span class="i-b b-red">
                                                Kurang / Rendah
                                            </span> 

                                        <?php endif; ?>

                                    <?php endif; ?>

                                </td>


                                
                                <td class="i-nowrap">

                                    <?php if($riwayat['status'] === 'Selesai'): ?>

                                        <span class="i-b b-green">

                                            <span class="i-dot" style="background: #10b981;"></span>

                                            Selesai

                                        </span>

                                    <?php else: ?>

                                        <span class="i-b b-amber">

                                            <span class="i-dot" style="background: #f5b82e;"></span>

                                            <?php echo e($riwayat['status']); ?>


                                        </span>

                                    <?php endif; ?>

                                </td>


                                
                                <td class="i-nowrap i-right" onclick="event.stopPropagation()">

                                    <div class="i-acts">

                                        
                                        <a href="<?php echo e($riwayat['show_route']); ?>" title="Lihat Detail" aria-label="Lihat Detail"
                                            class="i-act">
                                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>

                                        
                                        <?php if(!empty($riwayat['edit_route'])): ?>
                                            <a href="<?php echo e($riwayat['edit_route']); ?>" title="Edit" aria-label="Edit" class="i-act">
                                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                        <?php else: ?>
                                            <span title="Route edit belum tersedia" aria-label="Edit tidak tersedia"
                                                class="i-act off">
                                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </span>
                                        <?php endif; ?>

                                        
                                        <?php if(!empty($riwayat['delete_route'])): ?>
                                            <form action="<?php echo e($riwayat['delete_route']); ?>" method="POST"
                                                onsubmit="return confirm('Hapus data pengisian ini? Tindakan ini tidak dapat dibatalkan.');"
                                                class="i-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" title="Hapus" aria-label="Hapus" class="i-act danger">
                                                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        <?php else: ?>
                                            <span title="Route hapus belum tersedia" aria-label="Hapus tidak tersedia"
                                                class="i-act off">
                                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </span>
                                        <?php endif; ?>

                                    </div>

                                </td>

                            </tr>


                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                            <tr>

                                <td colspan="7" class="i-empty">

                                    <div class="i-empty-ico">
                                        📋
                                    </div>

                                    <h3>
                                        Belum Ada Riwayat Pengisian
                                    </h3>

                                    <p>
                                        Belum ada instrumen yang telah diisi.
                                    </p>

                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>


            
            <?php if($riwayatPengisian->hasPages()): ?>

                <div class="i-pag">

                    <?php echo e($riwayatPengisian->links()); ?>


                </div>

            <?php endif; ?>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Herd\bgtk-monev\resources\views/instrumen/index.blade.php ENDPATH**/ ?>