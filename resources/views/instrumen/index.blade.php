@extends('layouts.app')

@section('title', 'Instrumen Pemantauan')

@section('page-title', 'Instrumen Pemantauan')

@section('content')

    <div class="mx-auto max-w-7xl space-y-6">

        {{-- =========================================================
        HEADER
        ========================================================== --}}
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-800">
                Instrumen Pemantauan
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Pilih instrumen monitoring dan evaluasi yang akan digunakan.
            </p>
        </div>


        {{-- =========================================================
        3 JENIS INSTRUMEN
        ========================================================== --}}
        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">

            {{-- BCKS --}}
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="h-1.5 bg-blue-600"></div>

                <div class="p-5">

                    <span
                        class="inline-flex rounded-full border border-blue-100 bg-blue-50 px-3 py-1 text-xs font-medium text-blue-700">
                        Instrumen 01
                    </span>

                    <h3 class="mt-4 text-lg font-bold text-slate-800">
                        Instrumen BCKS
                    </h3>

                    <p class="mt-1 text-sm leading-6 text-slate-500">
                        Instrumen monitoring dan evaluasi BCKS.
                    </p>

                    <div class="mt-6 grid grid-cols-2 gap-2">

                        <a href="{{ route('bcks.create') }}"
                            class="flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold text-white hover:bg-blue-700">
                            <span>+</span>
                            Isi Instrumen
                        </a>

                        <button type="button"
                            class="rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-xs font-semibold text-slate-700">
                            Cetak Blanko
                        </button>

                    </div>

                </div>

            </div>


            {{-- BK --}}
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="h-1.5 bg-violet-600"></div>

                <div class="p-5">

                    <span
                        class="inline-flex rounded-full border border-violet-100 bg-violet-50 px-3 py-1 text-xs font-medium text-violet-700">
                        Instrumen 02
                    </span>

                    <h3 class="mt-4 text-lg font-bold text-slate-800">
                        Instrumen BK
                    </h3>

                    <p class="mt-1 text-sm leading-6 text-slate-500">
                        Instrumen monitoring dan evaluasi BK.
                    </p>

                    <div class="mt-6 grid grid-cols-2 gap-2">

                        <a href="{{ route('bk.create') }}"
                            class="flex items-center justify-center gap-2 rounded-xl bg-violet-600 px-4 py-3 text-sm font-semibold text-white hover:bg-violet-700">
                            <span>+</span>
                            Isi Instrumen
                        </a>

                        <button type="button"
                            class="rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-xs font-semibold text-slate-700">
                            Cetak Blanko
                        </button>

                    </div>

                </div>

            </div>


            {{-- TENDIK --}}
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="h-1.5 bg-emerald-600"></div>

                <div class="p-5">

                    <span
                        class="inline-flex rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1 text-xs font-medium text-emerald-700">
                        Instrumen 03
                    </span>

                    <h3 class="mt-4 text-lg font-bold text-slate-800">
                        Instrumen TENDIK
                    </h3>

                    <p class="mt-1 text-sm leading-6 text-slate-500">
                        Instrumen monitoring dan evaluasi TENDIK.
                    </p>

                    <div class="mt-6 grid grid-cols-2 gap-2">

                        <a href="{{ route('instrumen.create') }}"
                            class="flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-4 py-3 text-sm font-semibold text-white hover:bg-emerald-700">
                            <span>+</span>
                            Isi Instrumen
                        </a>

                        <button type="button"
                            class="rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-xs font-semibold text-slate-700">
                            Cetak Blanko
                        </button>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
        FILTER
        ========================================================== --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

            <form action="{{ route('instrumen.index') }}" method="GET">

                <div class="flex items-end gap-4">

                    {{-- JENIS INSTRUMEN --}}
                    <div class="w-1/4">

                        <label for="jenis_instrumen" class="mb-2 block text-sm font-semibold text-slate-700">
                            Jenis Instrumen
                        </label>

                        <select id="jenis_instrumen" name="jenis_instrumen"
                            class="h-11 w-full rounded-xl border border-slate-300 bg-white px-4 text-sm text-slate-700 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            <option value="">
                                Semua jenis
                            </option>

                            <option value="BCKS" {{ request('jenis_instrumen') === 'BCKS' ? 'selected' : '' }}>
                                BCKS
                            </option>

                            <option value="BK" {{ request('jenis_instrumen') === 'BK' ? 'selected' : '' }}>
                                BK
                            </option>

                            <option value="TENDIK" {{ request('jenis_instrumen') === 'TENDIK' ? 'selected' : '' }}>
                                TENDIK
                            </option>

                        </select>

                    </div>


                    {{-- STATUS --}}
                    <div class="w-1/4">

                        <label for="status" class="mb-2 block text-sm font-semibold text-slate-700">
                            Status
                        </label>

                        <select id="status" name="status"
                            class="h-11 w-full rounded-xl border border-slate-300 bg-white px-4 text-sm text-slate-700 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            <option value="">
                                Semua status
                            </option>

                            <option value="Draft" {{ request('status') === 'Draft' ? 'selected' : '' }}>
                                Draft
                            </option>

                            <option value="Dalam Proses" {{ request('status') === 'Dalam Proses' ? 'selected' : '' }}>
                                Dalam Proses
                            </option>

                            <option value="Final" {{ request('status') === 'Final' ? 'selected' : '' }}>
                                Final
                            </option>

                        </select>

                    </div>


                    {{-- PENCARIAN --}}
                    <div class="flex-1">

                        <label for="search" class="mb-2 block text-sm font-semibold text-slate-700">
                            Pencarian
                        </label>

                        <input id="search" type="text" name="search" value="{{ request('search') }}"
                            placeholder="Nama BCKS, BK, responden, atau unit kerja"
                            class="h-11 w-full rounded-xl border border-slate-300 px-4 text-sm text-slate-700 outline-none placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>


                    {{-- TOMBOL --}}
                    <div class="flex w-[160px] gap-2">

                        <button type="submit"
                            class="h-11 flex-1 rounded-xl bg-blue-600 px-4 text-sm font-semibold text-white hover:bg-blue-700">
                            Cari
                        </button>

                        <a href="{{ route('instrumen.index') }}"
                            class="flex h-11 items-center justify-center rounded-xl border border-slate-300 bg-white px-4 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                            Reset
                        </a>

                    </div>

                </div>

            </form>

        </div>


        {{-- =========================================================
        RIWAYAT PENGISIAN
        ========================================================== --}}
        {{-- =========================================================
        RIWAYAT PENGISIAN
        ========================================================= --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-6 py-5">

                <h3 class="text-lg font-bold text-slate-800">
                    Riwayat Pengisian
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    Daftar pengisian instrumen monitoring dan evaluasi yang telah dilakukan.
                </p>

            </div>


            <div class="overflow-x-auto">

                <table class="min-w-full text-left">

                    <thead class="bg-slate-50">

                        <tr class="border-b border-slate-200">

                            {{-- INSTRUMEN --}}
                            <th class="whitespace-nowrap px-6 py-4 text-xs font-bold uppercase text-slate-500">
                                Instrumen
                            </th>

                            {{-- NAMA / UNIT --}}
                            <th class="whitespace-nowrap px-6 py-4 text-xs font-bold uppercase text-slate-500">
                                Nama / Unit
                            </th>

                            {{-- RESPONDEN --}}
                            <th class="whitespace-nowrap px-6 py-4 text-xs font-bold uppercase text-slate-500">
                                Responden
                            </th>

                            {{-- TANGGAL --}}
                            <th class="whitespace-nowrap px-6 py-4 text-xs font-bold uppercase text-slate-500">
                                Tanggal Evaluasi
                            </th>

                            {{-- NILAI --}}
                            <th class="whitespace-nowrap px-6 py-4 text-xs font-bold uppercase text-slate-500">
                                Nilai
                            </th>

                            {{-- PREDIKAT --}}
                            <th class="whitespace-nowrap px-6 py-4 text-xs font-bold uppercase text-slate-500">
                                Predikat
                            </th>

                            {{-- STATUS --}}
                            <th class="whitespace-nowrap px-6 py-4 text-xs font-bold uppercase text-slate-500">
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        @forelse ($riwayatPengisian as $riwayat)

                                        <tr class="cursor-pointer transition hover:bg-blue-50"
                                            onclick="window.location='{{ $riwayat['show_route'] }}'"
                                            title="Klik untuk melihat hasil penilaian">

                                            {{-- =================================================
                                            INSTRUMEN
                                            ================================================== --}}
                                            <td class="whitespace-nowrap px-6 py-5">

                                                <div class="flex items-center gap-3">

                                                    <div class="flex h-10 w-10 items-center justify-center rounded-xl
                                                        {{ $riwayat['jenis'] === 'BCKS'
                            ? 'bg-blue-50 text-blue-600'
                            : 'bg-violet-50 text-violet-600' }}">
                                                        📋
                                                    </div>

                                                    <div>

                                                        <p class="text-sm font-bold text-slate-800">
                                                            {{ $riwayat['jenis'] }}
                                                        </p>

                                                        <span class="mt-1 inline-flex rounded-full px-2.5 py-1 text-xs font-medium
                                                            {{ $riwayat['jenis'] === 'BCKS'
                            ? 'border border-blue-100 bg-blue-50 text-blue-700'
                            : 'border border-violet-100 bg-violet-50 text-violet-700' }}">
                                                            {{ $riwayat['instrumen'] }}
                                                        </span>

                                                    </div>

                                                </div>

                                            </td>


                                            {{-- =================================================
                                            NAMA / UNIT
                                            ================================================== --}}
                                            <td class="min-w-[180px] px-6 py-5">

                                                <p class="text-sm font-semibold text-slate-800">
                                                    {{ $riwayat['nama'] ?: '-' }}
                                                </p>

                                                @if ($riwayat['unit_kerja'])

                                                    <p class="mt-1 text-xs text-slate-500">
                                                        {{ $riwayat['unit_kerja'] }}
                                                    </p>

                                                @endif

                                            </td>


                                            {{-- =================================================
                                            RESPONDEN
                                            ================================================== --}}
                                            <td class="min-w-[200px] px-6 py-5">

                                                <p class="text-sm font-medium text-slate-700">
                                                    {{ $riwayat['responden'] ?: '-' }}
                                                </p>

                                                @if ($riwayat['status_responden'])

                                                    <p class="mt-1 text-xs leading-5 text-slate-500">
                                                        {{ $riwayat['status_responden'] }}
                                                    </p>

                                                @endif

                                            </td>


                                            {{-- =================================================
                                            TANGGAL
                                            ================================================== --}}
                                            <td class="whitespace-nowrap px-6 py-5">

                                                @if ($riwayat['tanggal'])

                                                    <p class="text-sm font-medium text-slate-700">
                                                        {{ $riwayat['tanggal']->format('d/m/Y') }}
                                                    </p>

                                                @else

                                                    <span class="text-sm text-slate-400">
                                                        -
                                                    </span>

                                                @endif

                                            </td>


                                            {{-- =================================================
                                            NILAI
                                            ================================================== --}}
                                            <td class="whitespace-nowrap px-6 py-5">

                                                <p class="text-base font-bold text-blue-600">
                                                    {{ number_format($riwayat['nilai'], 2) }}
                                                </p>

                                                <p class="mt-1 text-xs text-slate-400">
                                                    {{ $riwayat['skor'] }}/{{ $riwayat['skor_maksimal'] }}
                                                </p>

                                            </td>


                                            {{-- =================================================
                                            PREDIKAT
                                            ================================================== --}}
                                            <td class="whitespace-nowrap px-6 py-5">

                                                @if ($riwayat['jenis'] === 'BCKS')

                                                    @if ($riwayat['predikat'] === 'Sangat Baik')

                                                        <span
                                                            class="inline-flex rounded-full bg-emerald-100 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                                                            Sangat Baik
                                                        </span>

                                                    @elseif ($riwayat['predikat'] === 'Baik')

                                                        <span
                                                            class="inline-flex rounded-full bg-blue-100 px-3 py-1.5 text-xs font-semibold text-blue-700">
                                                            Baik
                                                        </span>

                                                    @elseif ($riwayat['predikat'] === 'Cukup')

                                                        <span
                                                            class="inline-flex rounded-full bg-amber-100 px-3 py-1.5 text-xs font-semibold text-amber-700">
                                                            Cukup
                                                        </span>

                                                    @elseif ($riwayat['predikat'] === 'Perlu Pembinaan')

                                                        <span
                                                            class="inline-flex rounded-full bg-red-100 px-3 py-1.5 text-xs font-semibold text-red-700">
                                                            Perlu Pembinaan
                                                        </span>

                                                    @else

                                                        <span class="text-xs text-slate-400">
                                                            -
                                                        </span>

                                                    @endif

                                                @else

                                                    @if (str_contains($riwayat['predikat'] ?? '', 'Baik'))

                                                        <span
                                                            class="inline-flex rounded-full bg-emerald-100 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                                                            Baik / Tinggi
                                                        </span>

                                                    @else

                                                        <span
                                                            class="inline-flex rounded-full bg-red-100 px-3 py-1.5 text-xs font-semibold text-red-700">
                                                            Kurang / Rendah
                                                        </span>

                                                    @endif

                                                @endif

                                            </td>


                                            {{-- =================================================
                                            STATUS
                                            ================================================== --}}
                                            <td class="whitespace-nowrap px-6 py-5">

                                                @if ($riwayat['status'] === 'Selesai')

                                                    <span
                                                        class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-3 py-1.5 text-xs font-semibold text-emerald-700">

                                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                                        Selesai

                                                    </span>

                                                @else

                                                    <span
                                                        class="inline-flex items-center gap-1.5 rounded-full bg-amber-100 px-3 py-1.5 text-xs font-semibold text-amber-700">

                                                        <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>

                                                        {{ $riwayat['status'] }}

                                                    </span>

                                                @endif

                                            </td>

                                        </tr>


                        @empty

                            <tr>

                                <td colspan="7" class="px-6 py-16 text-center">

                                    <div class="flex flex-col items-center">

                                        <div
                                            class="flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-2xl">
                                            📋
                                        </div>

                                        <h3 class="mt-4 text-base font-bold text-slate-800">
                                            Belum Ada Riwayat Pengisian
                                        </h3>

                                        <p class="mt-1 text-sm text-slate-500">
                                            Belum ada instrumen yang telah diisi.
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- =========================================================
            PAGINATION
            ========================================================== --}}
            @if ($riwayatPengisian->hasPages())

                <div class="border-t border-slate-200 px-6 py-4">

                    {{ $riwayatPengisian->links() }}

                </div>

            @endif

        </div>

    </div>

@endsection