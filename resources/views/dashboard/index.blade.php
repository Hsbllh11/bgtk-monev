@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
@php
    $persen = fn ($a, $b) => $b > 0 ? min(round(($a / $b) * 100), 100) : 0;
    $delta  = fn ($b) => $b['ini'] - $b['lalu'];

    $pctSekolah = $persen($sekolahTerjangkau, $totalSekolah);
    $pctTl      = $persen($tlSelesai, $tlTotal);
    
    // Variabel fallback jika controller belum mengirim data
    $sudahDimonitor = $sekolahSudahDimonitor ?? $sekolahTerjangkau;
    $belumDimonitor = $sekolahBelumDimonitor ?? ($totalSekolah - $sekolahTerjangkau);
@endphp

<div class="space-y-6">

    {{-- ================= HERO ================= --}}
    <section class="relative overflow-hidden rounded-3xl p-5 text-white shadow-lg sm:p-8"
             style="background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 50%, #4f46e5 100%);">

        <div class="pointer-events-none absolute -right-16 -top-20 h-64 w-64 rounded-full bg-white/10"></div>
        <div class="pointer-events-none absolute -bottom-24 right-40 h-56 w-56 rounded-full bg-white/5"></div>

        <div class="relative flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <p class="text-sm font-medium text-blue-100">{{ $tanggalHariIni }}</p>
                <h1 class="mt-1 text-2xl font-bold tracking-tight text-white sm:text-3xl">
                    {{ $salam }}, {{ \Illuminate\Support\Str::of(auth()->user()->name)->before(' ') }} 👋
                </h1>
                <p class="mt-2 max-w-xl text-sm leading-6 text-blue-100">
                    Ringkasan monitoring dan evaluasi BGTK Provinsi NTB:
                    <strong class="text-white">{{ $totalInstrumen }}</strong> pengisian instrumen,
                    <strong class="text-white">{{ $totalWawancara }}</strong> wawancara, dan
                    <strong class="text-white">{{ $sekolahTerjangkau }}</strong> sekolah sudah memiliki data monev.
                </p>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('instrumen.index') }}"
                   class="inline-flex h-11 items-center gap-2 rounded-xl bg-white px-5 text-sm font-semibold text-blue-700 shadow-sm transition hover:bg-blue-50">
                    + Isi Instrumen
                </a>
                <a href="{{ route('wawancara.index') }}"
                   class="inline-flex h-11 items-center gap-2 rounded-xl border border-white/30 bg-white/10 px-5 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/20">
                    + Isi Wawancara
                </a>
                <a href="{{ route('cetak-gabungan.index') }}"
                   class="inline-flex h-11 items-center gap-2 rounded-xl border border-white/30 bg-white/10 px-5 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/20">
                    Gabung &amp; Cetak PDF
                </a>
            </div>
        </div>
    </section>

    {{-- ================= KPI ================= --}}
    {{-- Baris 1: 3 Kolom --}}
    <div class="grid grid-cols-1 gap-5 md:grid-cols-3">

        {{-- Instrumen --}}
        <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200 transition hover:shadow-md flex flex-col justify-between">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Pengisian Instrumen</p>
                    <p class="mt-2 text-3xl font-bold text-slate-900">{{ $totalInstrumen }}</p>
                </div>
                <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"/></svg>
                </span>
            </div>
            <p class="mt-3 text-xs {{ $delta($bulanInstrumen) >= 0 ? 'text-emerald-600' : 'text-rose-600' }}">
                <span class="font-semibold">{{ $delta($bulanInstrumen) >= 0 ? '▲' : '▼' }} {{ abs($delta($bulanInstrumen)) }}</span>
                dibanding bulan lalu · {{ $bulanInstrumen['ini'] }} bulan ini
            </p>
        </div>

        {{-- Wawancara --}}
        <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200 transition hover:shadow-md flex flex-col justify-between">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Lembar Wawancara</p>
                    <p class="mt-2 text-3xl font-bold text-slate-900">{{ $totalWawancara }}</p>
                </div>
                <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M8 10h8M8 14h5M6 20l-3 1 1-3a8 8 0 111.5 1.5L6 20z"/></svg>
                </span>
            </div>
            <p class="mt-3 text-xs {{ $delta($bulanWawancara) >= 0 ? 'text-emerald-600' : 'text-rose-600' }}">
                <span class="font-semibold">{{ $delta($bulanWawancara) >= 0 ? '▲' : '▼' }} {{ abs($delta($bulanWawancara)) }}</span>
                dibanding bulan lalu · {{ $bulanWawancara['ini'] }} bulan ini
            </p>
        </div>

        {{-- Tindak Lanjut --}}
        <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200 transition hover:shadow-md flex flex-col justify-between">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Tindak Lanjut Selesai</p>
                    <p class="mt-2 text-3xl font-bold text-slate-900">
                        {{ $tlSelesai }}<span class="text-lg font-medium text-slate-400"> / {{ $tlTotal }}</span>
                    </p>
                </div>
                <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </span>
            </div>
            <div class="mt-4">
                <div class="h-2 overflow-hidden rounded-full bg-slate-100">
                    <div class="h-full rounded-full bg-amber-500" style="width: {{ $pctTl }}%"></div>
                </div>
                <p class="mt-2 text-xs {{ $tlTerlambat > 0 ? 'font-semibold text-rose-600' : 'text-slate-500' }}">
                    {{ $tlTerlambat > 0 ? $tlTerlambat . ' melewati target waktu' : 'Tidak ada yang terlambat' }}
                </p>
            </div>
        </div>

    </div>

    {{-- Baris 2: 2 Kolom Khusus Status Sekolah --}}
    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

        {{-- Sekolah Sudah Dimonitor --}}
        <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200 transition hover:shadow-md flex flex-col justify-between">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Sekolah Sudah Dimonitor</p>
                    <p class="mt-2 text-3xl font-bold text-slate-900">
                        {{ $sudahDimonitor }}<span class="text-lg font-medium text-slate-400"> / {{ $totalSekolah }}</span>
                    </p>
                </div>
                <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </span>
            </div>
            <div class="mt-4">
                <div class="h-2 overflow-hidden rounded-full bg-slate-100">
                    <div class="h-full rounded-full bg-emerald-500" style="width: {{ $persen($sudahDimonitor, $totalSekolah) }}%"></div>
                </div>
                <p class="mt-2 text-xs text-slate-500">
                    {{ $persen($sudahDimonitor, $totalSekolah) }}% dari total sekolah telah disurvei/dimonitor.
                </p>
            </div>
        </div>

        {{-- Sekolah Belum Dimonitor --}}
        <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200 transition hover:shadow-md flex flex-col justify-between">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Sekolah Belum Dimonitor</p>
                    <p class="mt-2 text-3xl font-bold text-slate-900">
                        {{ $belumDimonitor }}<span class="text-lg font-medium text-slate-400"> / {{ $totalSekolah }}</span>
                    </p>
                </div>
                <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-rose-50 text-rose-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </span>
            </div>
            <div class="mt-4">
                <div class="h-2 overflow-hidden rounded-full bg-slate-100">
                    <div class="h-full rounded-full bg-rose-500" style="width: {{ $persen($belumDimonitor, $totalSekolah) }}%"></div>
                </div>
                <p class="mt-2 text-xs text-slate-500">
                    {{ $persen($belumDimonitor, $totalSekolah) }}% sekolah masih membutuhkan kunjungan/monev.
                </p>
            </div>
        </div>

    </div>

    {{-- ================= PERHATIAN ================= --}}
    @if ($perluDiperbarui > 0)
        <div class="flex items-start gap-3 rounded-2xl border border-amber-200 bg-amber-50 px-5 py-4">
            <span class="mt-0.5 text-lg">💡</span>
            <p class="text-sm leading-6 text-amber-900">
                <strong>{{ $perluDiperbarui }} sekolah</strong> sudah memiliki data instrumen/wawancara,
                tetapi statusnya masih <strong>"Belum Dimonitor"</strong>.
                <a href="{{ route('sekolah.index', ['status_monitoring' => 'Belum Dimonitor']) }}"
                   class="font-semibold underline underline-offset-2 hover:text-amber-700">Perbarui di Data Sekolah →</a>
            </p>
        </div>
    @endif

    {{-- ================= TREN + KOMPOSISI ================= --}}
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

        <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200 xl:col-span-2">
            <div class="mb-4 flex items-start justify-between gap-4">
                <div>
                    <h2 class="text-lg font-semibold text-slate-800">Tren Aktivitas Monev</h2>
                    <p class="mt-1 text-sm text-slate-500">Jumlah pengisian instrumen dan wawancara 6 bulan terakhir.</p>
                </div>
            </div>
            <div class="h-72"><canvas id="trenChart"></canvas></div>
        </div>

        <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
            <h2 class="text-lg font-semibold text-slate-800">Komposisi Instrumen</h2>
            <p class="mt-1 text-sm text-slate-500">Pengisian berdasarkan jenis instrumen.</p>

            @if ($totalInstrumen > 0)
                <div class="relative mx-auto mt-4 h-64 max-w-xs">
                    <canvas id="komposisiChart"></canvas>
                    <div class="pointer-events-none absolute inset-0 flex flex-col items-center justify-center" style="padding-bottom: 38px">
                        <span class="text-3xl font-bold text-slate-800">{{ $totalInstrumen }}</span>
                        <span class="text-xs text-slate-500">Pengisian</span>
                    </div>
                </div>
            @else
                <div class="flex h-64 items-center justify-center text-sm text-slate-400">Belum ada pengisian instrumen.</div>
            @endif
        </div>
    </div>

    {{-- ================= CAPAIAN + WAWANCARA + TINDAK LANJUT ================= --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

        <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <h2 class="text-lg font-semibold text-slate-800">Rata-rata Capaian</h2>
                    <p class="mt-1 text-sm text-slate-500">Nilai rata-rata per instrumen (%).</p>
                </div>
                <span class="rounded-full bg-blue-50 px-3 py-1 text-sm font-bold text-blue-700">
                    {{ $rataCapaian !== null ? number_format($rataCapaian, 1, ',', '.') . '%' : '-' }}
                </span>
            </div>
            <div class="mt-4 h-64"><canvas id="capaianChart"></canvas></div>
        </div>

        <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
            <h2 class="text-lg font-semibold text-slate-800">Wawancara per Jenis</h2>
            <p class="mt-1 text-sm text-slate-500">Jumlah lembar wawancara yang telah diisi.</p>
            <div class="mt-4 h-64"><canvas id="wawancaraChart"></canvas></div>
        </div>

        <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
            <h2 class="text-lg font-semibold text-slate-800">Status Tindak Lanjut</h2>
            <p class="mt-1 text-sm text-slate-500">Progres rencana tindak lanjut hasil monev.</p>

            @if ($tlTotal > 0)
                <div class="relative mx-auto mt-4 h-64 max-w-xs">
                    <canvas id="tlChart"></canvas>
                    <div class="pointer-events-none absolute inset-0 flex flex-col items-center justify-center" style="padding-bottom: 38px">
                        <span class="text-3xl font-bold text-emerald-600">{{ $pctTl }}%</span>
                        <span class="text-xs text-slate-500">Selesai</span>
                    </div>
                </div>
            @else
                <div class="flex h-64 flex-col items-center justify-center gap-3 text-center text-sm text-slate-400">
                    Belum ada rencana tindak lanjut.
                    <a href="{{ route('tindak-lanjut.create') }}" class="font-semibold text-blue-600 hover:text-blue-800">+ Tambah tindak lanjut</a>
                </div>
            @endif
        </div>
    </div>

    {{-- ================= AKTIVITAS + SIDE ================= --}}
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

        {{-- Aktivitas terbaru --}}
        <div class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-slate-200 xl:col-span-2">
            <div class="flex items-center justify-between border-b border-slate-200 px-6 py-5">
                <div>
                    <h2 class="text-lg font-semibold text-slate-800">Aktivitas Terbaru</h2>
                    <p class="mt-1 text-sm text-slate-500">Pengisian instrumen dan wawancara terakhir.</p>
                </div>
                <a href="{{ route('instrumen.index') }}" class="text-sm font-semibold text-blue-600 hover:text-blue-800">Lihat semua →</a>
            </div>

            @forelse ($terbaru as $a)
                @php $meta = $jenisMeta[$a['jenis']] ?? ['solid' => '#64748b', 'soft' => '#f1f5f9', 'text' => '#475569']; @endphp
                <a href="{{ $a['url'] }}" class="flex items-center gap-4 border-b border-slate-100 px-6 py-4 transition last:border-0 hover:bg-slate-50">
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl text-xs font-bold"
                          style="background: {{ $meta['soft'] }}; color: {{ $meta['text'] }}">
                        {{ $a['tipe'] === 'Wawancara' ? '💬' : '📋' }}
                    </span>

                    <div class="min-w-0 flex-1">
                        <p class="truncate text-sm font-semibold text-slate-800">{{ $a['nama'] }}</p>
                        <p class="mt-0.5 truncate text-xs text-slate-500">
                            {{ $a['tipe'] }} {{ $a['jenis'] }}
                            @if ($a['petugas'] !== '') · oleh {{ $a['petugas'] }} @endif
                        </p>
                    </div>

                    <div class="shrink-0 text-right">
                        @if ($a['nilai'] !== null)
                            <p class="text-sm font-bold" style="color: {{ $meta['text'] }}">{{ number_format($a['nilai'], 1, ',', '.') }}%</p>
                        @else
                            <span class="rounded-full px-2.5 py-1 text-xs font-semibold" style="background: {{ $meta['soft'] }}; color: {{ $meta['text'] }}">{{ $a['jenis'] }}</span>
                        @endif
                        <p class="mt-1 text-xs text-slate-400">{{ $a['dibuat']?->locale('id')->diffForHumans() }}</p>
                    </div>
                </a>
            @empty
                <div class="px-6 py-14 text-center text-sm text-slate-400">Belum ada aktivitas monev.</div>
            @endforelse
        </div>

        {{-- Sisi kanan --}}
        <div class="space-y-6">

            {{-- Tindak lanjut mendesak --}}
            <div class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-slate-200">
                <div class="border-b border-slate-200 px-6 py-5">
                    <h2 class="text-lg font-semibold text-slate-800">Perlu Ditindaklanjuti</h2>
                    <p class="mt-1 text-sm text-slate-500">Diurutkan berdasarkan target selesai.</p>
                </div>

                @forelse ($tlMendesak as $tl)
                    @php $terlambat = $tl->target_selesai && $tl->target_selesai->isPast(); @endphp
                    <a href="{{ route('tindak-lanjut.show', $tl) }}" class="block border-b border-slate-100 px-6 py-4 transition last:border-0 hover:bg-slate-50">
                        <p class="truncate text-sm font-semibold text-slate-800">{{ $tl->judul_tindak_lanjut }}</p>
                        <p class="mt-0.5 truncate text-xs text-slate-500">{{ $tl->sekolah->nama_sekolah ?? 'Sekolah tidak tersedia' }}</p>
                        <div class="mt-2 flex items-center gap-2 text-xs">
                            <span class="rounded-full px-2 py-0.5 font-semibold {{ $tl->status === 'Dalam Proses' ? 'bg-blue-100 text-blue-700' : 'bg-slate-100 text-slate-600' }}">{{ $tl->status }}</span>
                            <span class="{{ $terlambat ? 'font-semibold text-rose-600' : 'text-slate-400' }}">
                                {{ $tl->target_selesai ? ($terlambat ? 'Terlambat · ' : 'Target · ') . $tl->target_selesai->format('d/m/Y') : 'Tanpa target' }}
                            </span>
                        </div>
                    </a>
                @empty
                    <div class="px-6 py-10 text-center text-sm text-slate-400">🎉 Tidak ada tindak lanjut yang tertunda.</div>
                @endforelse
            </div>

            {{-- Petugas teraktif --}}
            <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <h2 class="text-lg font-semibold text-slate-800">Petugas Monev Teraktif</h2>
                <p class="mt-1 text-sm text-slate-500">Berdasarkan jumlah pengisian.</p>

                @php $maks = max($petugasTeraktif->max('jumlah') ?? 0, 1); @endphp
                <div class="mt-4 space-y-4">
                    @forelse ($petugasTeraktif as $i => $p)
                        <div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="truncate font-medium text-slate-700">{{ $i + 1 }}. {{ $p['nama'] }}</span>
                                <span class="ml-3 shrink-0 font-bold text-slate-800">{{ $p['jumlah'] }}</span>
                            </div>
                            <div class="mt-1.5 h-2 overflow-hidden rounded-full bg-slate-100">
                                <div class="h-full rounded-full bg-gradient-to-r from-blue-500 to-indigo-500" style="width: {{ ($p['jumlah'] / $maks) * 100 }}%"></div>
                            </div>
                        </div>
                    @empty
                        <p class="py-6 text-center text-sm text-slate-400">Belum ada data petugas.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ================= CHART.JS ================= --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const D = @json($chart);

    Chart.defaults.font.family = "'Instrument Sans', ui-sans-serif, system-ui, sans-serif";
    Chart.defaults.color = '#64748b';

    const grid = { color: '#eef2f7' };
    const legendBawah = {
        position: 'bottom',
        labels: { usePointStyle: true, pointStyle: 'circle', padding: 16, font: { size: 12 } }
    };
    const buat = (id, config) => {
        const el = document.getElementById(id);
        if (el) new Chart(el, config);
    };

    // Tren
    buat('trenChart', {
        type: 'line',
        data: {
            labels: D.bulan,
            datasets: [
                { label: 'Instrumen', data: D.trenInstrumen, borderColor: '#2563eb', backgroundColor: 'rgba(37,99,235,.12)', fill: true, tension: .35, borderWidth: 3, pointRadius: 4, pointBackgroundColor: '#fff', pointBorderWidth: 2 },
                { label: 'Wawancara', data: D.trenWawancara, borderColor: '#10b981', backgroundColor: 'rgba(16,185,129,.10)', fill: true, tension: .35, borderWidth: 3, pointRadius: 4, pointBackgroundColor: '#fff', pointBorderWidth: 2 }
            ]
        },
        options: {
            responsive: true, maintainAspectRatio: false,
            interaction: { mode: 'index', intersect: false },
            plugins: { legend: { ...legendBawah, position: 'top', align: 'end' } },
            scales: { y: { beginAtZero: true, ticks: { precision: 0 }, grid }, x: { grid: { display: false } } }
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
            scales: { y: { beginAtZero: true, ticks: { precision: 0 }, grid }, x: { grid: { display: false }, ticks: { font: { size: 11 } } } }
        }
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