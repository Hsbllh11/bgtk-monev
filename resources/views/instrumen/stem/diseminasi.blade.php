@extends('layouts.app')

@section('title', 'Instrumen STEM - Diseminasi')
@section('page-title', 'Instrumen STEM - Diseminasi')

@section('content')
    <style>
        /* ===================== TOKEN WARNA (Sama dengan Instrumen Pemantauan) ===================== */
        .i-wrap { display: flex; flex-direction: column; gap: 22px; }
        .d-h1 { font-size: 28px; font-weight: 400; letter-spacing: -.02em; line-height: 1.2; color: var(--ink); }
        .d-h1 b { font-weight: 700; }
        .d-crumb { margin-top: 4px; font-size: 12.5px; color: var(--muted); }
        .d-crumb a { color: inherit; transition: color .2s; text-decoration: none; }
        .d-crumb a:hover { color: var(--p-600); }
        .d-desc { margin-top: 10px; max-width: 640px; font-size: 13px; line-height: 1.7; color: #475569; }
        
        .d-title-row { display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; }
        @media (max-width: 640px) { .d-title-row { flex-direction: column; } }

        .d-pbtn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; flex-shrink: 0; height: 46px; padding: 0 18px; border-radius: 14px; background: var(--b-bg); border: 1px solid var(--b-line); color: var(--b-ink); font-family: inherit; font-size: 13.5px; font-weight: 700; cursor: pointer; white-space: nowrap; text-decoration: none; transition: transform .25s ease, box-shadow .25s ease, filter .25s ease; }
        .d-pbtn:hover { transform: translateY(-1px); filter: brightness(.97); box-shadow: 0 12px 22px -14px var(--b-glow); }
        .d-pbtn svg { flex-shrink: 0; transition: transform .3s ease; }
        .d-pbtn.back:hover svg { transform: translateX(-3px); }
        .b-blue { --b-bg: linear-gradient(160deg, #eaf0ff 0%, #d3e1ff 100%); --b-line: #c6d8fb; --b-ink: #1d4ed8; --b-glow: rgba(37, 99, 235, .7); }

        /* Grid diubah agar center dan membagi dua layar */
        .i-grid3 { 
            display: grid; 
            gap: 20px; 
            grid-template-columns: repeat(2, minmax(0, 1fr)); 
            max-width: 1200px; 
            margin: 0 auto; 
            width: 100%;
        }
        @media (max-width: 767px) { 
            .i-grid3 { 
                grid-template-columns: 1fr; 
            } 
        }

        /* --- warna pastel --- */
        .c-amber { --t-bg: linear-gradient(160deg, #fff7de 0%, #fde8ac 100%); --t-line: #f6dd9b; --t-glow: rgba(217, 154, 11, .5); --t-clip: #d3b568; --c: #d99a0b; --c-line: #f6dd9b; --c-text: #a16207; --b: #b45309; --b-d: #92400e; --b-t: #ffffff; }
        .c-cyan { --t-bg: linear-gradient(160deg, #e6f7fb 0%, #c8eaf4 100%); --t-line: #b9e2ee; --t-glow: rgba(8, 145, 178, .5); --t-clip: #7fbdd0; --c: #0891b2; --c-line: #b9e2ee; --c-text: #0e7490; --b: #0b8aa8; --b-d: #087189; --b-t: #ffffff; }

        .i-inst { position: relative; overflow: hidden; background: var(--t-bg); border: 1px solid var(--t-line); border-radius: 18px; transition: transform .3s cubic-bezier(.22, 1, .36, 1), box-shadow .3s cubic-bezier(.22, 1, .36, 1); }
        .i-inst:hover { transform: translateY(-3px); box-shadow: 0 18px 30px -20px var(--t-glow); }
        .i-inst::before, .i-inst::after { content: ''; position: absolute; z-index: 0; border-radius: 9999px; pointer-events: none; }
        .i-inst::before { right: -30px; bottom: -42px; width: 124px; height: 124px; background: rgba(255, 255, 255, .38); }
        .i-inst::after { left: -26px; bottom: -46px; width: 92px; height: 92px; background: rgba(255, 255, 255, .24); }
        .i-clip { position: absolute; z-index: 1; right: 30px; top: 12px; color: var(--t-clip); }
        .i-pin { position: absolute; z-index: 1; right: 14px; top: 14px; width: 7px; height: 7px; border-radius: 9999px; background: var(--c); box-shadow: 0 0 0 3px rgba(255, 255, 255, .65); }
        .i-inst-body { position: relative; z-index: 1; padding: 22px 20px 20px; }
        .i-inst-top { display: flex; align-items: flex-start; gap: 14px; }
        .i-inst-text { min-width: 0; flex: 1; padding-top: 2px; }
        .i-inst-ico { display: flex; align-items: center; justify-content: center; flex-shrink: 0; width: 56px; height: 56px; border-radius: 18px; background: #fff; color: var(--c); box-shadow: 0 8px 18px -10px var(--t-glow); }
        .i-badge { display: inline-flex; align-items: center; padding: 4px 12px; border-radius: 9999px; background: rgba(255, 255, 255, .72); border: 1px solid var(--c-line); color: var(--c-text); font-size: 11.5px; font-weight: 700; }
        .i-inst h3 { margin-top: 8px; font-size: 16px; font-weight: 700; letter-spacing: -.01em; color: var(--ink); }
        .i-inst p { margin-top: 4px; font-size: 13px; line-height: 1.7; color: #55637f; }
        .i-actions { margin-top: 18px; padding-top: 16px; border-top: 1px solid rgba(255, 255, 255, .8); display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 10px; }
        
        .i-btn-main { display: flex; align-items: center; justify-content: center; gap: 8px; padding: 12px 14px; border: 0; border-radius: 12px; background: var(--b); color: var(--b-t); font-family: inherit; font-size: 13.5px; font-weight: 700; cursor: pointer; box-shadow: inset 0 1px 0 rgba(255, 255, 255, .22), 0 10px 18px -10px var(--b); transition: background .25s ease, transform .25s ease, box-shadow .25s ease; text-decoration: none; }
        .i-btn-main:hover { background: var(--b-d); transform: translateY(-1px); box-shadow: inset 0 1px 0 rgba(255, 255, 255, .22), 0 14px 20px -10px var(--b); }
    </style>

    <div class="i-wrap">
        {{-- Judul Halaman --}}
        <div class="d-title-row">
            <div>
                <h1 class="d-h1">Diseminasi</h1>
                <p class="d-crumb">
                    Dashboard &nbsp;›&nbsp; Instrumen &nbsp;›&nbsp; 
                    <a href="{{ route('instrumen.stem.index') }}">STEM</a> &nbsp;›&nbsp; Diseminasi
                </p>
                <p class="d-desc">Pilih instrumen Diseminasi yang ingin diisi.</p>
            </div>
            <a href="{{ route('instrumen.stem.index') }}" class="d-pbtn b-blue back">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                Kembali
            </a>
        </div>

        <div class="i-grid3">
            {{-- Card Instrumen Monitoring --}}
            <div class="i-inst c-amber">
                <svg class="i-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" /></svg>
                <span class="i-pin"></span>
                <div class="i-inst-body">
                    <div class="i-inst-top">
                        <span class="i-inst-ico">
                            <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                        </span>
                        <div class="i-inst-text">
                            <span class="i-badge">Instrumen 01</span>
                            <h3>Monitoring dan Evaluasi Diseminasi</h3>
                            <p>Diisi oleh Tim BGTK NTB (Internal).</p>
                        </div>
                    </div>
                    <div class="i-actions">
                        <a href="{{ route('instrumen.stem.diseminasi.monitoring.create') }}" class="i-btn-main">+ Isi Instrumen</a>
                    </div>
                </div>
            </div>

            {{-- Card Instrumen Reaction --}}
            <div class="i-inst c-cyan">
                <svg class="i-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" /></svg>
                <span class="i-pin"></span>
                <div class="i-inst-body">
                    <div class="i-inst-top">
                        <span class="i-inst-ico">
                            <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </span>
                        <div class="i-inst-text">
                            <span class="i-badge">Instrumen 02</span>
                            <h3>Instrumen Reaction</h3>
                            <p>Diisi oleh Peserta Diseminasi.</p>
                        </div>
                    </div>
                    <div class="i-actions">
                        <a href="{{ route('instrumen.stem.diseminasi.reaction.create') }}" class="i-btn-main">+ Isi Instrumen</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection