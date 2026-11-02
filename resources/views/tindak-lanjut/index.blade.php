@extends('layouts.app')

@section('title', 'Rencana Tindak Lanjut')

@section('page-title', 'Rencana Tindak Lanjut')

@section('content')
    @php
        $persen = fn($a, $b) => $b > 0 ? min(round(($a / $b) * 100), 100) : 0;

        $pctBelum = $persen($belumDimulai, $totalTindakLanjut);
        $pctProses = $persen($dalamProses, $totalTindakLanjut);
        $pctSelesai = $persen($selesai, $totalTindakLanjut);
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

        /* ===================== KOMPONEN (disalin dari dashboard) ===================== */
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

        .d-title-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
        }

        @media (max-width: 640px) {
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

        .d-desc {
            margin-top: 10px;
            max-width: 640px;
            font-size: 13px;
            line-height: 1.7;
            color: #475569;
        }

        /* --- tombol utama (gaya tombol biru dashboard) --- */
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
            transform: rotate(90deg);
        }

        /* --- tile KPI --- */
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
        .d-tile>.d-tile-ico {
            position: relative;
            z-index: 1;
        }

        .d-tile-dot {
            z-index: 1;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .65);
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

        /* --- badge --- */
        .d-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 8px;
            font-size: 11.5px;
            font-weight: 700;
            text-align: center;
            white-space: nowrap;
        }

        /* --- tabel (gaya dashboard) --- */
        .d-table {
            width: 100%;
            border-collapse: collapse;
        }

        .d-table th {
            padding: 12px 20px;
            font-size: 12px;
            font-weight: 600;
            color: var(--muted);
            text-align: left;
            white-space: nowrap;
            border-bottom: 1px solid var(--line);
        }

        .d-table th.right {
            text-align: right;
        }

        .d-table td {
            padding: 14px 20px;
            border-bottom: 1px solid var(--line);
            vertical-align: middle;
        }

        .d-table tbody tr {
            transition: background .2s;
        }

        .d-table tbody tr:hover {
            background: #f7f9ff;
        }

        .d-table tbody tr:last-child td {
            border-bottom: 0;
        }

        .d-table .nm {
            font-size: 13px;
            font-weight: 600;
            color: var(--ink);
        }

        .d-table .sub {
            margin-top: 2px;
            font-size: 11.5px;
            color: var(--muted);
        }

        .d-table .txt {
            font-size: 12.5px;
            color: #475569;
            white-space: nowrap;
        }

        /* --- tombol aksi ikon --- */
        .d-act {
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

        .d-act:hover {
            background: var(--p-50);
            color: var(--p-700);
        }

        .d-act.danger {
            color: #e11d48;
        }

        .d-act.danger:hover {
            background: #fff1f2;
            color: #be123c;
        }

        /* --- empty state --- */
        .d-empty {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            padding: 56px 24px;
            text-align: center;
        }

        .d-empty-ico {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 64px;
            height: 64px;
            border-radius: 18px;
            background: var(--p-50);
            color: var(--p-600);
        }
    </style>

    <div class="d-wrap">

        {{-- ================= JUDUL HALAMAN ================= --}}
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Rencana <b>Tindak Lanjut</b></h1>
                    <p class="d-crumb">Dashboard &nbsp;›&nbsp; Tindak Lanjut</p>
                    <p class="d-desc">
                        Kelola rencana tindak lanjut hasil monitoring dan evaluasi.
                    </p>
                </div>

                <a href="{{ route('tindak-lanjut.create') }}" class="d-btn">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"
                        stroke-linecap="round">
                        <path d="M12 5v14M5 12h14" />
                    </svg>
                    Tambah Tindak Lanjut
                </a>
            </div>
        </section>

        {{-- ================= STATISTIK ================= --}}
        <div class="d-tiles">

            {{-- Total --}}
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
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0M9 5h6" />
                    </svg>
                </span>
                <p class="d-tile-label">Total RTL</p>
                <p class="d-tile-val">{{ $totalTindakLanjut }}</p>
                <p class="d-tile-note">Seluruh rencana tindak lanjut</p>
            </div>

            {{-- Belum Dimulai --}}
            <div class="d-tile t-amber">
                <svg class="d-tile-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="d-tile-dot" style="background: var(--accent)"></span>
                <span class="d-tile-ico" style="color:#d99a0b">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
                <p class="d-tile-label">Belum Dimulai</p>
                <p class="d-tile-val">{{ $belumDimulai }}<small> / {{ $totalTindakLanjut }}</small></p>
                <p class="d-tile-note">{{ $pctBelum }}% dari total RTL</p>
            </div>

            {{-- Dalam Proses --}}
            <div class="d-tile t-violet">
                <svg class="d-tile-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="d-tile-dot" style="background:#8b5cf6"></span>
                <span class="d-tile-ico" style="color:#7c3aed">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </span>
                <p class="d-tile-label">Dalam Proses</p>
                <p class="d-tile-val">{{ $dalamProses }}<small> / {{ $totalTindakLanjut }}</small></p>
                <p class="d-tile-note">{{ $pctProses }}% dari total RTL</p>
            </div>

            {{-- Selesai --}}
            <div class="d-tile t-mint">
                <svg class="d-tile-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="d-tile-dot" style="background:#10b981"></span>
                <span class="d-tile-ico" style="color:#059669">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </span>
                <p class="d-tile-label">Selesai</p>
                <p class="d-tile-val">{{ $selesai }}<small> / {{ $totalTindakLanjut }}</small></p>
                <p class="d-tile-note">{{ $pctSelesai }}% sudah diselesaikan</p>
            </div>
        </div>

        {{-- ================= NOTIFIKASI ================= --}}
        @if(session('success'))
            <div class="d-alert">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"
                    stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:3px">
                    <path d="M5 13l4 4L19 7" />
                </svg>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        {{-- ================= TABEL ================= --}}
        <div class="d-card">

            <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:12px;padding:20px 20px 14px">
                <div>
                    <h2 class="d-card-h">Daftar Rencana Tindak Lanjut</h2>
                    <p class="d-card-s">Data RTL yang tersimpan dalam sistem.</p>
                </div>

                <span
                    style="display:inline-flex;align-items:center;padding:5px 10px;border-radius:9px;background:var(--p-50);color:var(--p-700);font-size:11.5px;font-weight:600;white-space:nowrap">
                    {{ $tindakLanjuts->total() }} data
                </span>
            </div>

            @if($tindakLanjuts->count())

                <div style="overflow-x:auto">
                    <table class="d-table">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tindak Lanjut</th>
                                <th>Sekolah</th>
                                <th>Penanggung Jawab</th>
                                <th>Target</th>
                                <th>Status</th>
                                <th class="right">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($tindakLanjuts as $index => $tindakLanjut)
                                <tr>

                                    <td class="txt">{{ $tindakLanjuts->firstItem() + $index }}</td>

                                    {{-- Judul --}}
                                    <td style="min-width:250px">
                                        <p class="nm">{{ $tindakLanjut->judul_tindak_lanjut }}</p>

                                        @if($tindakLanjut->wawancara)
                                            <p class="sub">
                                                Wawancara:
                                                {{ $tindakLanjut->wawancara->tanggal_wawancara?->format('d/m/Y') }}
                                            </p>
                                        @endif
                                    </td>

                                    {{-- Sekolah --}}
                                    <td style="min-width:200px">
                                        <p class="nm">{{ $tindakLanjut->sekolah->nama_sekolah ?? '-' }}</p>

                                        @if($tindakLanjut->sekolah)
                                            <p class="sub">NPSN: {{ $tindakLanjut->sekolah->npsn }}</p>
                                        @endif
                                    </td>

                                    {{-- Penanggung Jawab --}}
                                    <td class="txt">{{ $tindakLanjut->penanggung_jawab }}</td>

                                    {{-- Target --}}
                                    <td class="txt">{{ $tindakLanjut->target_selesai?->format('d/m/Y') ?? '-' }}</td>

                                    {{-- Status --}}
                                    <td style="white-space:nowrap">
                                        @if($tindakLanjut->status === 'Selesai')
                                            <span class="d-badge" style="background:#d1fae5;color:#047857">Selesai</span>
                                        @elseif($tindakLanjut->status === 'Dalam Proses')
                                            <span class="d-badge" style="background:#dbeafe;color:#1d4ed8">Dalam Proses</span>
                                        @else
                                            <span class="d-badge" style="background:#fef3c7;color:#b45309">Belum Dimulai</span>
                                        @endif
                                    </td>

                                    {{-- Aksi --}}
                                    <td style="white-space:nowrap;text-align:right">
                                        <div style="display:flex;align-items:center;justify-content:flex-end;gap:2px">

                                            {{-- Detail --}}
                                            <a href="{{ route('tindak-lanjut.show', ['tindakLanjut' => $tindakLanjut->id]) }}"
                                                title="Lihat Detail" aria-label="Lihat Detail" class="d-act">
                                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>

                                            {{-- Edit --}}
                                            <a href="{{ route('tindak-lanjut.edit', ['tindakLanjut' => $tindakLanjut->id]) }}"
                                                title="Edit" aria-label="Edit" class="d-act">
                                                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>

                                            {{-- Hapus --}}
                                            <form
                                                action="{{ route('tindak-lanjut.destroy', ['tindakLanjut' => $tindakLanjut->id]) }}"
                                                method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data tindak lanjut ini?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" title="Hapus" aria-label="Hapus" class="d-act danger">
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
                            @endforeach
                        </tbody>

                    </table>
                </div>

                {{-- Pagination --}}
                @if($tindakLanjuts->hasPages())
                    <div style="border-top:1px solid var(--line);padding:16px 20px">
                        {{ $tindakLanjuts->links() }}
                    </div>
                @endif

            @else

                {{-- Empty State --}}
                <div class="d-empty">
                    <div class="d-empty-ico">
                        <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" />
                        </svg>
                    </div>

                    <h3 class="d-card-h" style="margin-top:6px">Belum ada data tindak lanjut</h3>

                    <p class="d-card-s" style="max-width:420px;line-height:1.7">
                        Belum terdapat rencana tindak lanjut yang tersimpan.
                        Silakan tambahkan data RTL untuk memulai pemantauan.
                    </p>

                    <a href="{{ route('tindak-lanjut.create') }}" class="d-btn" style="margin-top:8px">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2.2" stroke-linecap="round">
                            <path d="M12 5v14M5 12h14" />
                        </svg>
                        Tambah Tindak Lanjut
                    </a>
                </div>

            @endif

        </div>

    </div>
@endsection