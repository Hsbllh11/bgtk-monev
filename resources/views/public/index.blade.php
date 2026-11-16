<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isi Instrumen Publik | MANDALIKA BGTK NTB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Token warna dasar diambil dari desain layout */
        :root {
            --p-50: #eff4ff; --p-100: #dbe7fe; --p-200: #bfd4fb;
            --p-500: #3b82f6; --p-600: #2563eb; --p-700: #1d4ed8;
            --ink: #0f1b3d; --muted: #64748b; --line: #e6ebf5;
        }

        body { background-color: #f8fafc; font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; }

        .i-wrap { display: flex; flex-direction: column; gap: 22px; max-width: 1000px; margin: 0 auto; }
        
        /* --- judul halaman --- */
        .d-h1 { font-size: 28px; font-weight: 400; letter-spacing: -.02em; line-height: 1.2; color: var(--ink); }
        .d-h1 b { font-weight: 700; }
        .d-crumb { margin-top: 4px; font-size: 12.5px; color: var(--muted); }
        .d-desc { margin-top: 10px; max-width: 640px; font-size: 13px; line-height: 1.7; color: #475569; }

        /* --- layout grid --- */
        .i-grid2 { display: grid; gap: 20px; grid-template-columns: minmax(0, 1fr); }
        @media (min-width: 768px) { .i-grid2 { grid-template-columns: repeat(2, minmax(0, 1fr)); } }

        /* --- warna pastel tiap instrumen --- */
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

        /* --- kartu instrumen --- */
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

        .i-inst::before, .i-inst::after {
            content: '';
            position: absolute;
            z-index: 0;
            border-radius: 9999px;
            pointer-events: none;
        }
        .i-inst::before { right: -30px; bottom: -42px; width: 124px; height: 124px; background: rgba(255, 255, 255, .38); }
        .i-inst::after { left: -26px; bottom: -46px; width: 92px; height: 92px; background: rgba(255, 255, 255, .24); }

        .i-clip { position: absolute; z-index: 1; right: 30px; top: 12px; color: var(--t-clip); }
        .i-pin { position: absolute; z-index: 1; right: 14px; top: 14px; width: 7px; height: 7px; border-radius: 9999px; background: var(--c); box-shadow: 0 0 0 3px rgba(255, 255, 255, .65); }

        .i-inst-body { position: relative; z-index: 1; padding: 22px 20px 20px; }
        .i-inst-top { display: flex; align-items: flex-start; gap: 14px; }
        .i-inst-text { min-width: 0; flex: 1; padding-top: 2px; }

        .i-inst-ico {
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0; width: 56px; height: 56px;
            border-radius: 18px; background: #fff; color: var(--c);
            box-shadow: 0 8px 18px -10px var(--t-glow);
        }

        .i-badge {
            display: inline-flex; align-items: center; padding: 4px 12px;
            border-radius: 9999px; background: rgba(255, 255, 255, .72);
            border: 1px solid var(--c-line); color: var(--c-text);
            font-size: 11.5px; font-weight: 700;
        }

        .i-inst h3 { margin-top: 8px; font-size: 16px; font-weight: 700; letter-spacing: -.01em; color: var(--ink); }
        .i-inst p { margin-top: 4px; font-size: 13px; line-height: 1.7; color: #55637f; }

        .i-actions {
            margin-top: 18px; padding-top: 16px;
            border-top: 1px solid rgba(255, 255, 255, .8);
            display: flex; /* Diubah menjadi flex agar tombol full width */
        }

        .i-btn-main {
            display: flex; align-items: center; justify-content: center; gap: 8px;
            width: 100%; padding: 12px 14px; border: 0; border-radius: 12px;
            background: var(--b); color: var(--b-t);
            font-family: inherit; font-size: 13.5px; font-weight: 700; text-decoration: none;
            cursor: pointer;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .22), 0 10px 18px -10px var(--b);
            transition: background .25s ease, transform .25s ease, box-shadow .25s ease;
        }
        .i-btn-main:hover {
            background: var(--b-d); transform: translateY(-1px);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .22), 0 14px 20px -10px var(--b);
        }
        .i-btn-main:active { transform: translateY(0); }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-center py-12 px-4 sm:px-6 lg:px-8">

    <div class="i-wrap w-full">
        
        {{-- Header Halaman --}}
        <div>
            <h1 class="d-h1">Instrumen <b>Evaluasi Publik</b></h1>
            <p class="d-crumb">Area Publik &nbsp;›&nbsp; Pilihan Instrumen</p>
            <p class="d-desc">Silakan pilih instrumen yang ingin Anda isi. Pastikan Anda mengisi seluruh pertanyaan sebelum melakukan pengiriman.</p>
        </div>

        {{-- Notifikasi Sukses --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-xl shadow-sm" role="alert">
                <strong class="font-bold block mb-1">Berhasil!</strong>
                <span class="block">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Grid Kartu Pilihan --}}
        <div class="i-grid2">

            {{-- Kartu Reaction --}}
            <div class="i-inst c-blue">
                <svg class="i-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="i-pin"></span>

                <div class="i-inst-body">
                    <div class="i-inst-top">
                        <span class="i-inst-ico">
                            <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        <div class="i-inst-text">
                            <span class="i-badge">Instrumen 01</span>
                            <h3>Instrumen Reaction</h3>
                            <p>Instrumen ini ditujukan untuk Peserta Diseminasi guna mengevaluasi jalannya kegiatan pelatihan STEM.</p>
                        </div>
                    </div>
                    <div class="i-actions">
                        <a href="{{ route('public.reaction.create') }}" class="i-btn-main">
                            <span>+</span> Isi Instrumen
                        </a>
                    </div>
                </div>
            </div>

            {{-- Kartu Evaluasi Dampak --}}
            <div class="i-inst c-emerald">
                <svg class="i-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="i-pin"></span>

                <div class="i-inst-body">
                    <div class="i-inst-top">
                        <span class="i-inst-ico">
                            <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        <div class="i-inst-text">
                            <span class="i-badge">Instrumen 02</span>
                            <h3>Evaluasi Dampak</h3>
                            <p>Instrumen ini ditujukan untuk Guru Fasda dan Murid untuk mengukur dampak dari pelatihan STEM.</p>
                        </div>
                    </div>
                    <div class="i-actions">
                        <a href="{{ route('public.evaluasi.create') }}" class="i-btn-main">
                            <span>+</span> Isi Instrumen
                        </a>
                    </div>
                </div>
            </div>

        </div>
        
        {{-- Tombol Kembali --}}
        <div class="text-center mt-8">
            <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-slate-800 font-medium text-sm transition">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                Kembali ke Halaman Login
            </a>
        </div>

    </div>

</body>
</html>