@extends('layouts.app')

@section('title', 'Hasil Penilaian BK')
@section('page-title', 'Hasil Penilaian BK')

@section('content')

    @php
        /* ---------- DATA TURUNAN (dihitung sekali di sini) ---------- */
        $levelNames = [1 => 'Reaction', 2 => 'Learning', 3 => 'Behavior', 4 => 'Results'];

        $levelDescriptions = [
            1 => 'Reaksi peserta terhadap pelaksanaan kegiatan.',
            2 => 'Pembelajaran dan kompetensi yang diperoleh peserta.',
            3 => 'Perubahan perilaku setelah kegiatan.',
            4 => 'Dampak atau hasil dari pelaksanaan kegiatan.',
        ];

        // Semua level memakai satu warna biru (hex inline agar tidak bergantung pada build Tailwind)
        $blue = ['bar' => '#2563eb', 'text' => '#2563eb', 'badgeBg' => '#dbeafe', 'badgeText' => '#1d4ed8', 'row' => '#eff6ff'];
        $levelStyles = [1 => $blue, 2 => $blue, 3 => $blue, 4 => $blue];

        $jabatanResponden = $submission->jabatan_responden;

        if ($jabatanResponden === 'Lainnya' && filled($submission->jabatan_lainnya)) {
            $jabatanResponden .= ' — ' . $submission->jabatan_lainnya;
        }

        $isBK = $submission->jabatan_responden === 'BK';
        $allowedLevels = $isBK ? [1, 2, 3, 4] : [3, 4];

        // ---------------------------------------------------------
        // (a) Jawaban + perhitungan skor baru
        // ---------------------------------------------------------
        $answers = $submission->answers
            ->filter(fn($a) => $a->question && in_array((int) $a->question->level, $allowedLevels, true))
            ->values();

        $scored = $answers->filter(fn($a) => $a->skor !== null);
        $adaSkor = $scored->isNotEmpty();

        $levelStats = [];
        foreach ($levelNames as $level => $name) {
            if (!in_array($level, $allowedLevels, true)) {
                continue;
            }

            $items = $scored->filter(fn($a) => (int) $a->question->level === $level);
            $max = $items->count() * 4;
            $skor = (int) $items->sum('skor');

            $levelStats[$level] = [
                'skor' => $skor,
                'max' => $max,
                'pct' => $max > 0 ? round(($skor / $max) * 100, 2) : 0,
            ];
        }

        $jumlahButirBk = $answers->count();
        $jumlahTerisiBk = $scored->count();
        $totalSkor = (int) $scored->sum('skor');
        $skorMaks = $jumlahButirBk * 4;
        $skorPersen = $skorMaks > 0 ? round(($totalSkor / $skorMaks) * 100, 2) : 0;

        $kategori = \App\Support\BkSkor::kategori($skorPersen);
        $kategoriClass = \App\Support\BkSkor::kelas($kategori);

        $statusPengisianLabel = $submission->status ?: 'Selesai';
        $statusSelesai = $statusPengisianLabel === 'Selesai';

        $responden = [
            ['Nama Responden', $submission->nama_responden],
            ['Jabatan Responden', $jabatanResponden],
            ['Satuan Pendidikan', $submission->satuan_pendidikan],
            ['Masa Kerja', $submission->masa_kerja !== null ? $submission->masa_kerja . ' tahun' : null],
            ['Nama Pelatihan', $submission->nama_pelatihan],
            ['Tanggal Pengisian', $submission->tanggal_pengisian ? $submission->tanggal_pengisian->format('d/m/Y') : null],
        ];

        $petugas = [
            ['Nama Petugas Monev', $submission->nama_petugas_monev],
            ['Instansi Petugas', $submission->instansi_petugas],
            ['Tanggal Pelaksanaan', $submission->tanggal_pelaksanaan ? $submission->tanggal_pelaksanaan->format('d/m/Y') : null],
            ['Lokasi Monev', $submission->lokasi_monev],
        ];

    @endphp



    <div class="mx-auto max-w-6xl space-y-6">

        {{-- =========================================================
        HEADER HALAMAN
        ========================================================== --}}
        <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">

            <div>
                <nav class="flex items-center gap-2 text-sm text-slate-500">
                    <a href="{{ route('instrumen.index') }}" class="transition hover:text-blue-600">Instrumen</a>
                    <span class="text-slate-300">/</span>
                    <span class="font-medium text-slate-700">Hasil Penilaian BK</span>
                </nav>

                <h1 class="mt-3 text-3xl font-bold tracking-tight text-slate-800">Hasil Penilaian BK</h1>

                <p class="mt-2 text-sm text-slate-500">
                    Detail lengkap hasil pengisian instrumen monitoring dan evaluasi BK.
                </p>
            </div>

            <div class="no-print flex flex-wrap items-center gap-3">


                {{-- Kembali (dengan ikon panah) --}}
                <a href="{{ route('instrumen.index') }}"
                    class="inline-flex h-12 items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-6 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    Kembali
                </a>

                {{-- Cetak Hasil (teks saja) --}}
                <a href="{{ route('bk.cetak', ['submission' => $submission->id]) }}"
                    class="inline-flex h-12 items-center justify-center rounded-xl bg-blue-600 px-6 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
                    Cetak Hasil
                </a>

                {{-- Gabung PDF --}}
                <a href="{{ route('cetak-gabungan.index', ['pilih' => ['bk-' . $submission->id]]) }}"
                    class="inline-flex h-12 items-center justify-center rounded-xl border border-slate-300 bg-white px-6 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50">
                    Gabung PDF
                </a>

                {{-- Edit Data --}}
                <a href="{{ route('bk.edit', ['submission' => $submission->id]) }}"
                    class="inline-flex h-12 items-center justify-center rounded-xl px-6 text-sm font-semibold text-white shadow-sm transition"
                    style="background-color: #f97316;" onmouseover="this.style.backgroundColor='#ea580c'"
                    onmouseout="this.style.backgroundColor='#f97316'">
                    Edit Data
                </a>

            </div>

        </div>


        {{-- NOTIFIKASI --}}
        @if (session('success'))
            <div class="flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4">
                <span
                    class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-500 text-xs font-bold text-white">✓</span>
                <p class="text-sm font-semibold text-emerald-700">{{ session('success') }}</p>
            </div>
        @endif


        {{-- =========================================================
        RINGKASAN HASIL (b) — kartu Total Skor, Nilai Akhir, Predikat
        ========================================================== --}}
        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm font-medium text-slate-500">Total Skor</p>
                <div class="mt-3 flex items-baseline gap-2">
                    <span class="text-4xl font-bold tracking-tight text-slate-800">{{ $adaSkor ? $totalSkor : '-' }}</span>
                    <span class="text-lg font-medium text-slate-400">/ {{ $skorMaks }}</span>
                </div>
                <p class="mt-4 text-xs text-slate-400">Akumulasi skor {{ $jumlahButirBk }} indikator (skala 1–4).</p>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm font-medium text-slate-500">Nilai Akhir</p>
                <div class="mt-3 flex items-baseline gap-1">
                    <span class="text-4xl font-bold tracking-tight text-blue-600">
                        {{ $adaSkor ? number_format($skorPersen, 2, ',', '.') : '-' }}
                    </span>
                    <span class="text-lg font-medium text-slate-400">%</span>
                </div>
                <div class="mt-5 h-2 overflow-hidden rounded-full bg-slate-100">
                    <div class="h-full rounded-full bg-blue-600" style="width: {{ $adaSkor ? $skorPersen : 0 }}%"></div>
                </div>
                <p class="mt-4 text-xs text-slate-400">Total skor ÷ skor maksimal × 100.</p>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm font-medium text-slate-500">Predikat</p>
                <div class="mt-3">
                    @if ($adaSkor)
                        <span class="inline-flex rounded-full px-4 py-2 text-sm font-bold {{ $kategoriClass }}">{{ $kategori }}</span>
                    @else
                        <span class="inline-flex rounded-full bg-slate-100 px-4 py-2 text-sm font-bold text-slate-600">Data lama (Ya/Tidak)</span>
                    @endif
                </div>
                <p class="mt-5 text-xs text-slate-400">Sesuai Pedoman Penskoran instrumen BK.</p>
            </div>
        </div>


        {{-- =========================================================
        IDENTITAS PENGISIAN
        ========================================================== --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 bg-slate-50 px-6 py-5">
                <h2 class="text-lg font-bold text-slate-800">A. Identitas Petugas Monev</h2>
                <p class="mt-1 text-sm text-slate-500">Informasi petugas pelaksana monitoring dan evaluasi.</p>
            </div>

            <div class="grid grid-cols-1 gap-x-8 gap-y-5 p-6 md:grid-cols-2">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Nama Petugas Monev</p>
                    <p class="mt-1 font-semibold text-slate-800">{{ $submission->nama_petugas_monev ?: '-' }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Instansi Petugas</p>
                    <p class="mt-1 font-semibold text-slate-800">{{ $submission->instansi_petugas ?: '-' }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Lokasi Monev</p>
                    <p class="mt-1 font-semibold text-slate-800">{{ $submission->lokasi_monev ?: '-' }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Tanggal Pelaksanaan</p>
                    <p class="mt-1 font-semibold text-slate-800">
                        {{ $submission->tanggal_pelaksanaan ? $submission->tanggal_pelaksanaan->format('d/m/Y') : '-' }}
                    </p>
                </div>
            </div>
        </section>

        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 bg-slate-50 px-6 py-5">
                <h2 class="text-lg font-bold text-slate-800">B. Identitas Responden</h2>
                <p class="mt-1 text-sm text-slate-500">Identitas responden yang mengisi instrumen BK.</p>
            </div>

            <div class="grid grid-cols-1 gap-x-8 gap-y-5 p-6 md:grid-cols-2">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Nama Responden</p>
                    <p class="mt-1 font-semibold text-slate-800">{{ $submission->nama_responden ?: '-' }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Jabatan Responden</p>
                    <p class="mt-1 font-semibold text-slate-800">{{ $jabatanResponden ?: '-' }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Satuan Pendidikan</p>
                    <p class="mt-1 font-semibold text-slate-800">{{ $submission->satuan_pendidikan ?: '-' }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Masa Kerja</p>
                    <p class="mt-1 font-semibold text-slate-800">
                        {{ $submission->masa_kerja !== null && $submission->masa_kerja !== '' ? $submission->masa_kerja . ' tahun' : '-' }}
                    </p>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Nama Kegiatan/Pelatihan</p>
                    <p class="mt-1 font-semibold text-slate-800">{{ $submission->nama_pelatihan ?: '-' }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Tanggal Pengisian</p>
                    <p class="mt-1 font-semibold text-slate-800">
                        {{ $submission->tanggal_pengisian ? $submission->tanggal_pengisian->format('d/m/Y') : '-' }}
                    </p>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Status Pengisian</p>
                    <div class="mt-1">
                        <span
                            class="inline-flex rounded-full px-3 py-1 text-xs font-bold {{ $statusSelesai ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                            {{ $statusPengisianLabel }} ({{ $jumlahTerisiBk }}/{{ $jumlahButirBk }} butir)
                        </span>
                    </div>
                </div>
            </div>
        </section>

        {{-- =========================================================
        REKAPITULASI LEVEL (c) — $st['skor'] / $st['max']
        ========================================================== --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-6 py-5">
                <h2 class="text-lg font-bold text-slate-800">Rekapitulasi Berdasarkan Level</h2>
                <p class="mt-1 text-sm text-slate-500">Ringkasan skor pada masing-masing level evaluasi.</p>
            </div>

            <div class="grid grid-cols-1 gap-4 p-6 sm:grid-cols-2 lg:grid-cols-4">

                @foreach ($levelStats as $level => $st)
                    @php
                        $levelName = $levelNames[$level];
                        $style = $levelStyles[$level];
                    @endphp

                    <div class="flex flex-col rounded-xl border border-slate-200 bg-slate-50 p-5">

                        <div>
                            <span class="inline-flex rounded-md px-3 py-1 text-xs font-bold"
                                style="background-color: {{ $style['badgeBg'] }}; color: {{ $style['badgeText'] }};">
                                Level {{ $level }}
                            </span>
                        </div>

                        <h3 class="mt-3 text-lg font-bold text-slate-800">{{ $levelName }}</h3>

                        <p class="mt-2 flex-1 text-xs leading-5 text-slate-500">{{ $levelDescriptions[$level] }}</p>

                        <div class="mt-5 flex items-end justify-between">
                            <div>
                                <span class="text-3xl font-bold" style="color: {{ $style['text'] }};">{{ $st['skor'] }}</span>
                                <span class="text-sm text-slate-400">/ {{ $st['max'] }}</span>
                            </div>

                            <span class="text-sm font-bold text-slate-700">
                                {{ number_format($st['pct'], 2, ',', '.') }}%
                            </span>
                        </div>

                        <div class="mt-3 h-2 overflow-hidden rounded-full bg-slate-200">
                            <div class="h-full rounded-full"
                                style="width: {{ min($st['pct'], 100) }}%; background-color: {{ $style['bar'] }};"></div>
                        </div>

                    </div>
                @endforeach

            </div>

        </section>


        {{-- =========================================================
        DETAIL INDIKATOR (d) — header "Skor" + badge skor
        ========================================================== --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-6 py-5">
                <h2 class="text-lg font-bold text-slate-800">Detail Penilaian {{ $jumlahButirBk }} Indikator</h2>
                <p class="mt-1 text-sm text-slate-500">Nilai setiap indikator berdasarkan hasil pengisian instrumen BK.</p>
            </div>

            <div class="overflow-x-auto">

                <table class="min-w-full border-collapse">

                    <thead>
                        <tr class="bg-slate-50">
                            <th
                                class="w-20 border-b border-slate-200 px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                No.</th>
                            <th
                                class="border-b border-slate-200 px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                Pertanyaan / Indikator</th>
                            <th
                                class="w-36 border-b border-slate-200 px-4 py-3 text-center text-xs font-bold uppercase tracking-wider text-slate-500">
                                Skor</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php
                            $currentLevel = null;
                            $currentBagian = null;
                        @endphp

                        @forelse ($answers as $answer)
                            @php
                                $question = $answer->question;
                                $lvStyle = $levelStyles[(int) $question->level] ?? $levelStyles[1];
                            @endphp

                            {{-- BARIS LEVEL --}}
                            @if ($currentLevel !== $question->level)
                                @php
                                    $currentLevel = $question->level;
                                    $currentBagian = null;
                                @endphp

                                <tr>
                                    <td colspan="3" class="border-b border-slate-200 px-6 py-3"
                                        style="background-color: {{ $lvStyle['row'] }};">
                                        <p class="text-sm font-bold text-slate-800">
                                            Level {{ $question->level }}
                                            <span class="font-medium text-slate-500">— {{ $question->level_nama }}</span>
                                        </p>
                                    </td>
                                </tr>
                            @endif

                            {{-- BARIS BAGIAN --}}
                            @if ($currentBagian !== $question->bagian)
                                @php $currentBagian = $question->bagian; @endphp

                                <tr>
                                    <td colspan="3" class="border-b border-slate-100 bg-slate-50 px-6 py-3">
                                        <p class="text-xs font-bold uppercase tracking-wide text-slate-600">
                                            {{ $question->bagian }}
                                            @if ($question->judul_bagian)
                                                <span class="font-medium normal-case tracking-normal text-slate-500">—
                                                    {{ $question->judul_bagian }}</span>
                                            @endif
                                        </p>
                                    </td>
                                </tr>
                            @endif

                            {{-- BARIS DATA --}}
                            <tr class="transition hover:bg-slate-50">

                                <td class="border-b border-slate-100 px-6 py-4 align-top">
                                    <span class="text-sm font-semibold text-slate-500">{{ $question->nomor }}</span>
                                </td>

                                <td class="border-b border-slate-100 px-6 py-4 align-top">
                                    <p class="text-sm leading-6 text-slate-700">{{ $question->pernyataan }}</p>
                                </td>

                                <td class="border-b border-slate-100 px-4 py-4 text-center align-top">
                                    @if ($answer->skor !== null)
                                        <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-blue-600 font-bold text-white">
                                            {{ $answer->skor }}
                                        </span>
                                    @else
                                        <span class="inline-block rounded-full bg-slate-100 px-3 py-2 text-xs font-bold text-slate-600">
                                            {{ $answer->jawaban ? 'Ya' : 'Tidak' }} (lama)
                                        </span>
                                    @endif
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="3" class="px-6 py-16 text-center">
                                    <p class="text-sm text-slate-400">Data indikator belum tersedia.</p>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>




        {{-- =========================================================
        PRINT STYLE
        ========================================================== --}}
            <style>
                @media print {

                    aside,
                    header,
                    .no-print {
                        display: none !important;
                    }

                    html,
                    body {
                        height: auto !important;
                        overflow: visible !important;
                        background: white !important;
                    }

                    body>div,
                    body>div>div {
                        display: block !important;
                        height: auto !important;
                    }

                    main {
                        overflow: visible !important;
                    }

                    .shadow-sm {
                        box-shadow: none !important;
                    }

                    .max-w-6xl {
                        max-width: none !important;
                    }

                    section,
                    tr {
                        break-inside: avoid;
                    }
                }
            </style>

@endsection