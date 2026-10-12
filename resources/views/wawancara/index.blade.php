@extends('layouts.app')

@section('title', 'Lembar Wawancara')
@section('page-title', 'Lembar Wawancara')

@section('content')
@php
    // Warna ditulis sebagai hex lewat atribut style, karena kelas warna Tailwind seperti
    // bg-purple-600 / bg-emerald-600 tidak ada di CSS hasil build proyek ini.
    $kartu = [
        ['kode' => 'BCKS',   'no' => '01', 'solid' => '#1457f5', 'soft' => '#eef4ff', 'border' => '#dbe7ff', 'text' => '#1d4ed8'],
        ['kode' => 'BK',     'no' => '02', 'solid' => '#8b1cf5', 'soft' => '#f6efff', 'border' => '#e8d5ff', 'text' => '#7e22ce'],
        ['kode' => 'TENDIK', 'no' => '03', 'solid' => '#059669', 'soft' => '#ecfdf5', 'border' => '#c7f0dc', 'text' => '#047857'],
    ];
@endphp

<div class="w-full space-y-6 pb-8">

    {{-- Judul halaman --}}
    <div>
        <h1 class="text-2xl font-bold tracking-tight text-slate-900">Lembar Wawancara</h1>
        <p class="mt-1 text-sm text-slate-500">Pilih instrumen monitoring dan evaluasi yang akan digunakan.</p>
    </div>

    {{-- Notifikasi --}}
    @if (session('success'))
        <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
            ✓ {{ session('success') }}
        </div>
    @endif

    {{-- Kartu pilihan instrumen --}}
    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        @foreach ($kartu as $k)
            <div class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-md">
                <div class="w-full" style="height:6px;background:{{ $k['solid'] }}"></div>

                <div class="p-5">
                    <span class="inline-flex rounded-full border px-3 py-1 text-xs font-medium"
                          style="background:{{ $k['soft'] }};border-color:{{ $k['border'] }};color:{{ $k['text'] }}">
                        Instrumen {{ $k['no'] }}
                    </span>

                    <h2 class="mt-4 text-lg font-bold text-slate-900">Instrumen {{ $k['kode'] }}</h2>
                    <p class="mt-2 text-sm text-slate-500">Instrumen monitoring dan evaluasi {{ $k['kode'] }}.</p>

                    <div class="mt-5 flex gap-3">
                        <a href="{{ route('wawancara.create', ['jenis_instrumen' => $k['kode']]) }}"
                           class="wc-solid inline-flex flex-1 items-center justify-center rounded-xl px-4 text-sm font-semibold text-white"
                           style="height:44px;background:{{ $k['solid'] }}">
                            + Isi Wawancara
                        </a>

                        <button type="button"
                                onclick="window.print()"
                                class="inline-flex flex-1 items-center justify-center rounded-xl border border-slate-200 bg-white px-4 text-sm font-medium text-slate-700 hover:bg-slate-50"
                                style="height:44px">
                            Cetak Blanko
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Panel filter --}}
    <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-md">
        <form action="{{ route('wawancara.index') }}" method="GET">
            <div class="flex flex-wrap items-end gap-4">

                <div>
                    <label for="jenis_instrumen" class="mb-2 block text-sm font-medium text-slate-700">Jenis Instrumen</label>
                    <select id="jenis_instrumen" name="jenis_instrumen"
                            class="rounded-xl border border-slate-200 bg-white px-3 text-sm text-slate-700 outline-none"
                            style="height:44px;min-width:140px">
                        <option value="">Semua jenis</option>
                        <option value="BCKS" {{ request('jenis_instrumen') === 'BCKS' ? 'selected' : '' }}>BCKS</option>
                        <option value="BK" {{ request('jenis_instrumen') === 'BK' ? 'selected' : '' }}>BK</option>
                        <option value="TENDIK" {{ request('jenis_instrumen') === 'TENDIK' ? 'selected' : '' }}>TENDIK</option>
                    </select>
                </div>

                <div>
                    <label for="status" class="mb-2 block text-sm font-medium text-slate-700">Status</label>
                    <select id="status" name="status"
                            class="rounded-xl border border-slate-200 bg-white px-3 text-sm text-slate-700 outline-none"
                            style="height:44px;min-width:140px">
                        <option value="">Semua status</option>
                        <option value="Belum Dilaksanakan" {{ request('status') === 'Belum Dilaksanakan' ? 'selected' : '' }}>Belum Dilaksanakan</option>
                        <option value="Selesai" {{ request('status') === 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                <div class="flex-1" style="min-width:220px">
                    <label for="search" class="mb-2 block text-sm font-medium text-slate-700">Pencarian</label>
                    <input id="search" type="text" name="search" value="{{ request('search') }}"
                           placeholder="Nama sekolah, responden, atau unit kerja"
                           class="w-full rounded-xl border border-slate-200 px-3 text-sm text-slate-700 outline-none placeholder:text-slate-400"
                           style="height:44px">
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                            class="wc-solid inline-flex items-center justify-center rounded-xl px-5 text-sm font-semibold text-white"
                            style="height:44px;background:#1457f5">
                        Cari
                    </button>

                    <a href="{{ route('wawancara.index') }}"
                       class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-4 text-sm font-medium text-slate-700 hover:bg-slate-50"
                       style="height:44px">
                        Reset
                    </a>
                </div>
            </div>
        </form>
    </div>

    {{-- Tabel riwayat --}}
    <div class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-md">

        <div class="border-b border-slate-200 px-6 py-5">
            <h2 class="text-lg font-bold text-slate-900">Riwayat Wawancara</h2>
            <p class="mt-1 text-sm text-slate-500">Daftar pengisian wawancara monitoring dan evaluasi yang telah dilakukan.</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left" style="min-width:900px">
                <thead class="border-b border-slate-200 bg-slate-50">
                    <tr class="text-xs font-bold uppercase tracking-wide text-slate-500">
                        <th class="px-6 py-4">Instrumen</th>
                        <th class="px-6 py-4">Nama / Unit</th>
                        <th class="px-6 py-4">Responden</th>
                        <th class="px-6 py-4">Tanggal Wawancara</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse ($wawancaras as $wawancara)
                        @php
                            $namaInstrumen = strtoupper($wawancara->instrumen->nama_instrumen ?? '-');

                            if (str_contains($namaInstrumen, 'BCKS')) {
                                $labelInstrumen = 'BCKS';
                                $warna = ['bg' => '#eef4ff', 'text' => '#1d4ed8'];
                            } elseif (str_contains($namaInstrumen, 'TENDIK')) {
                                $labelInstrumen = 'TENDIK';
                                $warna = ['bg' => '#ecfdf5', 'text' => '#047857'];
                            } elseif (preg_match('/\bBK\b/', $namaInstrumen)) {
                                $labelInstrumen = 'BK';
                                $warna = ['bg' => '#f6efff', 'text' => '#7e22ce'];
                            } else {
                                $labelInstrumen = $wawancara->instrumen->nama_instrumen ?? '-';
                                $warna = ['bg' => '#f1f5f9', 'text' => '#475569'];
                            }

                            if (($wawancara->status ?? 'Belum Dilaksanakan') === 'Selesai') {
                                $labelStatus = 'Selesai';
                                $warnaStatus = ['bg' => '#d1fae5', 'text' => '#047857'];
                            } else {
                                $labelStatus = 'Belum Dilaksanakan';
                                $warnaStatus = ['bg' => '#fef3c7', 'text' => '#b45309'];
                            }
                        @endphp

                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="flex shrink-0 items-center justify-center rounded-xl"
                                         style="width:40px;height:40px;background:{{ $warna['bg'] }};color:{{ $warna['text'] }}">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="2" width="8" height="4" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M12 11h4M12 16h4M8 11h.01M8 16h.01"/></svg>
                                    </div>

                                    <div>
                                        <p class="text-sm font-bold text-slate-900">{{ $labelInstrumen }}</p>
                                        <span class="mt-1 inline-flex rounded-full px-3 py-1 text-xs font-semibold"
                                              style="background:{{ $warna['bg'] }};color:{{ $warna['text'] }}">
                                            {{ $wawancara->instrumen->nama_instrumen ?? 'Instrumen Pemantauan' }}
                                        </span>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                <p class="text-sm font-bold text-slate-900">{{ $wawancara->sekolah->nama_sekolah ?? '-' }}</p>
                                <p class="mt-1 text-xs text-slate-500">{{ $wawancara->sekolah->npsn ?? 'Unit sekolah' }}</p>
                            </td>

                            <td class="px-6 py-5">
                                <p class="text-sm font-bold text-slate-900">{{ $wawancara->nama_narasumber }}</p>
                                <p class="mt-1 text-xs text-slate-500">{{ $wawancara->jabatan_narasumber ?: 'Narasumber' }}</p>
                                <p class="mt-1 text-xs text-slate-500">Pewawancara: {{ $wawancara->nama_pewawancara }}</p>
                            </td>

                            <td class="whitespace-nowrap px-6 py-5 text-sm text-slate-700">
                                {{ $wawancara->tanggal_wawancara
                                    ? \Carbon\Carbon::parse($wawancara->tanggal_wawancara)->format('d/m/Y')
                                    : '-' }}
                            </td>

                            <td class="px-6 py-5">
                                <span class="inline-flex items-center whitespace-nowrap rounded-full px-3 py-1.5 text-xs font-semibold"
                                      style="background:{{ $warnaStatus['bg'] }};color:{{ $warnaStatus['text'] }}">
                                    <span style="margin-right:6px;font-size:8px">●</span>{{ $labelStatus }}
                                </span>
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex items-center justify-center gap-2">
                                    {{-- Lihat --}}
                                    <a href="{{ route('wawancara.show', $wawancara->id) }}" title="Lihat detail"
                                       class="inline-flex items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-500 hover:bg-blue-50 hover:text-blue-600"
                                       style="width:32px;height:32px">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>
                                    </a>

                                    {{-- Edit --}}
                                    <a href="{{ route('wawancara.edit', $wawancara->id) }}" title="Edit wawancara"
                                       class="inline-flex items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-500 hover:bg-amber-50 hover:text-amber-600"
                                       style="width:32px;height:32px">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                                    </a>

                                    {{-- Hapus --}}
                                    <form action="{{ route('wawancara.destroy', $wawancara->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus wawancara ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Hapus wawancara"
                                                class="inline-flex items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-500 hover:bg-red-50 hover:text-red-600"
                                                style="width:32px;height:32px">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M8 6V4h8v2"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6M14 11v6"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-14 text-center">
                                <p class="text-sm font-bold text-slate-700">Belum ada data wawancara</p>
                                <p class="mt-1 text-xs text-slate-500">Tambahkan wawancara untuk menampilkan riwayat di sini.</p>

                                <a href="{{ route('wawancara.create') }}"
                                   class="wc-solid mt-4 inline-flex items-center rounded-xl px-5 text-sm font-semibold text-white"
                                   style="height:44px;background:#1457f5">
                                    + Tambah Wawancara
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($wawancaras->hasPages())
            <div class="border-t border-slate-200 px-6 py-4">
                {{ $wawancaras->withQueryString()->links() }}
            </div>
        @endif
    </div>
</div>

<style>
    .wc-solid { transition: filter .15s; }
    .wc-solid:hover { filter: brightness(.92); }

    @media print {
        .wc-solid { print-color-adjust: exact; }
    }
</style>
@endsection